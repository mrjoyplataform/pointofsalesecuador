<?php

class grid_sales_detail_reporte_rtf
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
                   nm_limpa_str_grid_sales_detail_reporte($cadapar[1]);
                   nm_protect_num_grid_sales_detail_reporte($cadapar[0], $cadapar[1]);
                   if ($cadapar[1] == "@ ") {$cadapar[1] = trim($cadapar[1]); }
                   $Tmp_par   = $cadapar[0];
                   $$Tmp_par = $cadapar[1];
                   if ($Tmp_par == "nmgp_opcao")
                   {
                       $_SESSION['sc_session'][$script_case_init]['grid_sales_detail_reporte']['opcao'] = $cadapar[1];
                   }
               }
          }
      }
      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      require_once($this->Ini->path_aplicacao . "grid_sales_detail_reporte_total.class.php"); 
      $this->Tot      = new grid_sales_detail_reporte_total($this->Ini->sc_page);
      $this->prep_modulos("Tot");
      $Gb_geral = "quebra_geral_" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_sales_detail_reporte']['SC_Ind_Groupby'];
      if (method_exists($this->Tot,$Gb_geral))
      {
          $this->Tot->$Gb_geral();
          $this->count_ger = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_sales_detail_reporte']['tot_geral'][1];
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_sales_detail_reporte']['SC_Ind_Groupby'] == "consolidadoy")
          {
              $this->sum_quantity = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_sales_detail_reporte']['tot_geral'][2];
              $this->sum_item_total = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_sales_detail_reporte']['tot_geral'][3];
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_sales_detail_reporte']['SC_Ind_Groupby'] == "consolidado")
          {
              $this->sum_quantity = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_sales_detail_reporte']['tot_geral'][2];
              $this->sum_item_total = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_sales_detail_reporte']['tot_geral'][3];
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_sales_detail_reporte']['SC_Ind_Groupby'] == "fechatrans_cuentaventa_producto")
          {
              $this->sum_quantity = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_sales_detail_reporte']['tot_geral'][2];
              $this->sum_item_total = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_sales_detail_reporte']['tot_geral'][3];
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_sales_detail_reporte']['SC_Ind_Groupby'] == "fechacuentaproduct")
          {
              $this->sum_quantity = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_sales_detail_reporte']['tot_geral'][2];
              $this->sum_item_total = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_sales_detail_reporte']['tot_geral'][3];
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_sales_detail_reporte']['SC_Ind_Groupby'] == "sc_free_group_by")
          {
              $this->sum_quantity = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_sales_detail_reporte']['tot_geral'][2];
              $this->sum_item_total = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_sales_detail_reporte']['tot_geral'][3];
              $this->sum_valor_siniva = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_sales_detail_reporte']['tot_geral'][4];
          }
      }
      if (!$this->Ini->sc_export_ajax) {
          require_once($this->Ini->path_lib_php . "/sc_progress_bar.php");
          $this->pb = new scProgressBar();
          $this->pb->setRoot($this->Ini->root);
          $this->pb->setDir($_SESSION['scriptcase']['grid_sales_detail_reporte']['glo_nm_path_imag_temp'] . "/");
          $this->pb->setProgressbarMd5($_GET['pbmd5']);
          $this->pb->initialize();
          $this->pb->setReturnUrl("./");
          $this->pb->setReturnOption('volta_grid');
          $this->pb->setTotalSteps($this->count_ger);
      }
      $this->Arquivo    = "sc_rtf";
      $this->Arquivo   .= "_" . date("YmdHis") . "_" . rand(0, 1000);
      $this->Arquivo   .= "_grid_sales_detail_reporte";
      $this->Arquivo   .= ".rtf";
      $this->Tit_doc    = "grid_sales_detail_reporte.rtf";
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
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['grid_sales_detail_reporte']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['grid_sales_detail_reporte']['field_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['grid_sales_detail_reporte']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_sales_detail_reporte']['usr_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_sales_detail_reporte']['usr_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_sales_detail_reporte']['usr_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_sales_detail_reporte']['php_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_sales_detail_reporte']['php_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_sales_detail_reporte']['php_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_sales_detail_reporte']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_sales_detail_reporte']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_sales_detail_reporte']['where_pesq_filtro'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_sales_detail_reporte']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_sales_detail_reporte']['campos_busca']))
      { 
          $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_sales_detail_reporte']['campos_busca'];
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
              $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->fechatrans = $Busca_temp['fechatrans']; 
          $tmp_pos = strpos($this->fechatrans, "##@@");
          if ($tmp_pos !== false && !is_array($this->fechatrans))
          {
              $this->fechatrans = substr($this->fechatrans, 0, $tmp_pos);
          }
          $this->fechatrans_2 = $Busca_temp['fechatrans_input_2']; 
          $this->producto = $Busca_temp['producto']; 
          $tmp_pos = strpos($this->producto, "##@@");
          if ($tmp_pos !== false && !is_array($this->producto))
          {
              $this->producto = substr($this->producto, 0, $tmp_pos);
          }
          $this->id_product = $Busca_temp['id_product']; 
          $tmp_pos = strpos($this->id_product, "##@@");
          if ($tmp_pos !== false && !is_array($this->id_product))
          {
              $this->id_product = substr($this->id_product, 0, $tmp_pos);
          }
      } 
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_sales_detail_reporte']['rtf_name']))
      {
          $Pos = strrpos($_SESSION['sc_session'][$this->Ini->sc_page]['grid_sales_detail_reporte']['rtf_name'], ".");
          if ($Pos === false) {
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_sales_detail_reporte']['rtf_name'] .= ".rtf";
          }
          $this->Arquivo = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_sales_detail_reporte']['rtf_name'];
          $this->Tit_doc = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_sales_detail_reporte']['rtf_name'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_sales_detail_reporte']['rtf_name']);
      }
      $this->arr_export = array('label' => array(), 'lines' => array());
      $this->arr_span   = array();

      $this->Texto_tag .= "<table>\r\n";
      $this->Texto_tag .= "<tr>\r\n";
      foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_sales_detail_reporte']['field_order'] as $Cada_col)
      { 
          $SC_Label = (isset($this->New_label['id_sales'])) ? $this->New_label['id_sales'] : "Id Sales"; 
          if ($Cada_col == "id_sales" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
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
          $SC_Label = (isset($this->New_label['quantity'])) ? $this->New_label['quantity'] : "Quantity"; 
          if ($Cada_col == "quantity" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
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
          $SC_Label = (isset($this->New_label['cuentaventa'])) ? $this->New_label['cuentaventa'] : "Cuentaventa"; 
          if ($Cada_col == "cuentaventa" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
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
          $SC_Label = (isset($this->New_label['factura'])) ? $this->New_label['factura'] : "Factura"; 
          if ($Cada_col == "factura" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
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
          $SC_Label = (isset($this->New_label['tarjetarfid'])) ? $this->New_label['tarjetarfid'] : "Tarjetarfid"; 
          if ($Cada_col == "tarjetarfid" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['rfid_pulsera'])) ? $this->New_label['rfid_pulsera'] : "Rfid Pulsera"; 
          if ($Cada_col == "rfid_pulsera" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
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
          $SC_Label = (isset($this->New_label['discount'])) ? $this->New_label['discount'] : "Discount"; 
          if ($Cada_col == "discount" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
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
      $nmgp_select_count = "SELECT count(*) AS countTest from (SELECT     id_sales_detail,     id_sales,     unit_cost,     unit_value,     quantity,     discount,     item_total,     id_product,     idcaja,     uniqueid,     uniqueidtrans,     fechatrans,     estado,     valor_siniva,     valor_unitario,     codproducto,     factura,     producto,     entrada,     jugador,     visitante,     tarjeta,     tokens,     minutos,     comida,     tarjetarfid,     rfid_pulsera,(select cuentaventa from product where product.id_product=sales_detail.id_product) as cuentaventa FROM     sales_detail) nm_sel_esp"; 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
          $nmgp_select = "SELECT id_sales, fechatrans, codproducto, producto, quantity, item_total, valor_siniva, valor_unitario, cuentaventa, idcaja, factura, uniqueid, entrada, jugador, visitante, tarjeta, tokens, minutos, comida, tarjetarfid, rfid_pulsera, id_sales_detail, unit_cost, unit_value, discount, uniqueidtrans from (SELECT     id_sales_detail,     id_sales,     unit_cost,     unit_value,     quantity,     discount,     item_total,     id_product,     idcaja,     uniqueid,     uniqueidtrans,     fechatrans,     estado,     valor_siniva,     valor_unitario,     codproducto,     factura,     producto,     entrada,     jugador,     visitante,     tarjeta,     tokens,     minutos,     comida,     tarjetarfid,     rfid_pulsera,(select cuentaventa from product where product.id_product=sales_detail.id_product) as cuentaventa FROM     sales_detail) nm_sel_esp"; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
      { 
          $nmgp_select = "SELECT id_sales, fechatrans, codproducto, producto, quantity, item_total, valor_siniva, valor_unitario, cuentaventa, idcaja, factura, uniqueid, entrada, jugador, visitante, tarjeta, tokens, minutos, comida, tarjetarfid, rfid_pulsera, id_sales_detail, unit_cost, unit_value, discount, uniqueidtrans from (SELECT     id_sales_detail,     id_sales,     unit_cost,     unit_value,     quantity,     discount,     item_total,     id_product,     idcaja,     uniqueid,     uniqueidtrans,     fechatrans,     estado,     valor_siniva,     valor_unitario,     codproducto,     factura,     producto,     entrada,     jugador,     visitante,     tarjeta,     tokens,     minutos,     comida,     tarjetarfid,     rfid_pulsera,(select cuentaventa from product where product.id_product=sales_detail.id_product) as cuentaventa FROM     sales_detail) nm_sel_esp"; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nmgp_select = "SELECT id_sales, fechatrans, codproducto, producto, quantity, item_total, valor_siniva, valor_unitario, cuentaventa, idcaja, factura, uniqueid, entrada, jugador, visitante, tarjeta, tokens, minutos, comida, tarjetarfid, rfid_pulsera, id_sales_detail, unit_cost, unit_value, discount, uniqueidtrans from (SELECT     id_sales_detail,     id_sales,     unit_cost,     unit_value,     quantity,     discount,     item_total,     id_product,     idcaja,     uniqueid,     uniqueidtrans,     fechatrans,     estado,     valor_siniva,     valor_unitario,     codproducto,     factura,     producto,     entrada,     jugador,     visitante,     tarjeta,     tokens,     minutos,     comida,     tarjetarfid,     rfid_pulsera,(select cuentaventa from product where product.id_product=sales_detail.id_product) as cuentaventa FROM     sales_detail) nm_sel_esp"; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
      { 
          $nmgp_select = "SELECT id_sales, TO_DATE(TO_CHAR(fechatrans, 'yyyy-mm-dd hh24:mi:ss'), 'yyyy-mm-dd hh24:mi:ss'), codproducto, producto, quantity, item_total, valor_siniva, valor_unitario, cuentaventa, idcaja, factura, uniqueid, entrada, jugador, visitante, tarjeta, tokens, minutos, comida, tarjetarfid, rfid_pulsera, id_sales_detail, unit_cost, unit_value, discount, uniqueidtrans from (SELECT     id_sales_detail,     id_sales,     unit_cost,     unit_value,     quantity,     discount,     item_total,     id_product,     idcaja,     uniqueid,     uniqueidtrans,     fechatrans,     estado,     valor_siniva,     valor_unitario,     codproducto,     factura,     producto,     entrada,     jugador,     visitante,     tarjeta,     tokens,     minutos,     comida,     tarjetarfid,     rfid_pulsera,(select cuentaventa from product where product.id_product=sales_detail.id_product) as cuentaventa FROM     sales_detail) nm_sel_esp"; 
       } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
      { 
          $nmgp_select = "SELECT id_sales, fechatrans, codproducto, producto, quantity, item_total, valor_siniva, valor_unitario, cuentaventa, idcaja, factura, uniqueid, entrada, jugador, visitante, tarjeta, tokens, minutos, comida, tarjetarfid, rfid_pulsera, id_sales_detail, unit_cost, unit_value, discount, uniqueidtrans from (SELECT     id_sales_detail,     id_sales,     unit_cost,     unit_value,     quantity,     discount,     item_total,     id_product,     idcaja,     uniqueid,     uniqueidtrans,     fechatrans,     estado,     valor_siniva,     valor_unitario,     codproducto,     factura,     producto,     entrada,     jugador,     visitante,     tarjeta,     tokens,     minutos,     comida,     tarjetarfid,     rfid_pulsera,(select cuentaventa from product where product.id_product=sales_detail.id_product) as cuentaventa FROM     sales_detail) nm_sel_esp"; 
       } 
      else 
      { 
          $nmgp_select = "SELECT id_sales, fechatrans, codproducto, producto, quantity, item_total, valor_siniva, valor_unitario, cuentaventa, idcaja, factura, uniqueid, entrada, jugador, visitante, tarjeta, tokens, minutos, comida, tarjetarfid, rfid_pulsera, id_sales_detail, unit_cost, unit_value, discount, uniqueidtrans from (SELECT     id_sales_detail,     id_sales,     unit_cost,     unit_value,     quantity,     discount,     item_total,     id_product,     idcaja,     uniqueid,     uniqueidtrans,     fechatrans,     estado,     valor_siniva,     valor_unitario,     codproducto,     factura,     producto,     entrada,     jugador,     visitante,     tarjeta,     tokens,     minutos,     comida,     tarjetarfid,     rfid_pulsera,(select cuentaventa from product where product.id_product=sales_detail.id_product) as cuentaventa FROM     sales_detail) nm_sel_esp"; 
      } 
      $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_sales_detail_reporte']['where_pesq'];
      $nmgp_select_count .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_sales_detail_reporte']['where_pesq'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_sales_detail_reporte']['where_resumo']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_sales_detail_reporte']['where_resumo'])) 
      { 
          if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_sales_detail_reporte']['where_pesq'])) 
          { 
              $nmgp_select .= " where " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_sales_detail_reporte']['where_resumo']; 
              $nmgp_select_count .= " where " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_sales_detail_reporte']['where_resumo']; 
          } 
          else
          { 
              $nmgp_select .= " and (" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_sales_detail_reporte']['where_resumo'] . ")"; 
              $nmgp_select_count .= " and (" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_sales_detail_reporte']['where_resumo'] . ")"; 
          } 
      } 
      $nmgp_order_by = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_sales_detail_reporte']['order_grid'];
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
         $this->id_sales = $rs->fields[0] ;  
         $this->id_sales = (string)$this->id_sales;
         $this->fechatrans = $rs->fields[1] ;  
         $this->codproducto = $rs->fields[2] ;  
         $this->producto = $rs->fields[3] ;  
         $this->quantity = $rs->fields[4] ;  
         $this->quantity = (string)$this->quantity;
         $this->item_total = $rs->fields[5] ;  
         $this->item_total =  str_replace(",", ".", $this->item_total);
         $this->item_total = (strpos(strtolower($this->item_total), "e")) ? (float)$this->item_total : $this->item_total; 
         $this->item_total = (string)$this->item_total;
         $this->valor_siniva = $rs->fields[6] ;  
         $this->valor_siniva = (strpos(strtolower($this->valor_siniva), "e")) ? (float)$this->valor_siniva : $this->valor_siniva; 
         $this->valor_siniva = (string)$this->valor_siniva;
         $this->valor_unitario = $rs->fields[7] ;  
         $this->valor_unitario = (strpos(strtolower($this->valor_unitario), "e")) ? (float)$this->valor_unitario : $this->valor_unitario; 
         $this->valor_unitario = (string)$this->valor_unitario;
         $this->cuentaventa = $rs->fields[8] ;  
         $this->idcaja = $rs->fields[9] ;  
         $this->idcaja = (string)$this->idcaja;
         $this->factura = $rs->fields[10] ;  
         $this->factura = (string)$this->factura;
         $this->uniqueid = $rs->fields[11] ;  
         $this->entrada = $rs->fields[12] ;  
         $this->entrada = (string)$this->entrada;
         $this->jugador = $rs->fields[13] ;  
         $this->jugador = (string)$this->jugador;
         $this->visitante = $rs->fields[14] ;  
         $this->visitante = (string)$this->visitante;
         $this->tarjeta = $rs->fields[15] ;  
         $this->tarjeta = (string)$this->tarjeta;
         $this->tokens = $rs->fields[16] ;  
         $this->tokens = (string)$this->tokens;
         $this->minutos = $rs->fields[17] ;  
         $this->minutos = (string)$this->minutos;
         $this->comida = $rs->fields[18] ;  
         $this->comida = (string)$this->comida;
         $this->tarjetarfid = $rs->fields[19] ;  
         $this->rfid_pulsera = $rs->fields[20] ;  
         $this->id_sales_detail = $rs->fields[21] ;  
         $this->id_sales_detail = (string)$this->id_sales_detail;
         $this->unit_cost = $rs->fields[22] ;  
         $this->unit_cost =  str_replace(",", ".", $this->unit_cost);
         $this->unit_cost = (strpos(strtolower($this->unit_cost), "e")) ? (float)$this->unit_cost : $this->unit_cost; 
         $this->unit_cost = (string)$this->unit_cost;
         $this->unit_value = $rs->fields[23] ;  
         $this->unit_value =  str_replace(",", ".", $this->unit_value);
         $this->unit_value = (strpos(strtolower($this->unit_value), "e")) ? (float)$this->unit_value : $this->unit_value; 
         $this->unit_value = (string)$this->unit_value;
         $this->discount = $rs->fields[24] ;  
         $this->discount =  str_replace(",", ".", $this->discount);
         $this->discount = (strpos(strtolower($this->discount), "e")) ? (float)$this->discount : $this->discount; 
         $this->discount = (string)$this->discount;
         $this->uniqueidtrans = $rs->fields[25] ;  
         //----- lookup - cuentaventa
         $this->look_cuentaventa = $this->cuentaventa; 
         $this->Lookup->lookup_cuentaventa($this->look_cuentaventa, $this->cuentaventa) ; 
         $this->look_cuentaventa = ($this->look_cuentaventa == "&nbsp;") ? "" : $this->look_cuentaventa; 
         $this->sc_proc_grid = true; 
         foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_sales_detail_reporte']['field_order'] as $Cada_col)
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
      if(isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_sales_detail_reporte']['export_sel_columns']['field_order']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_sales_detail_reporte']['field_order'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_sales_detail_reporte']['export_sel_columns']['field_order'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_sales_detail_reporte']['export_sel_columns']['field_order']);
      }
      if(isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_sales_detail_reporte']['export_sel_columns']['usr_cmp_sel']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_sales_detail_reporte']['usr_cmp_sel'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_sales_detail_reporte']['export_sel_columns']['usr_cmp_sel'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_sales_detail_reporte']['export_sel_columns']['usr_cmp_sel']);
      }
      $rs->Close();
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
   //----- quantity
   function NM_export_quantity()
   {
             nmgp_Form_Num_Val($this->quantity, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->quantity = NM_charset_to_utf8($this->quantity);
         $this->quantity = str_replace('<', '&lt;', $this->quantity);
         $this->quantity = str_replace('>', '&gt;', $this->quantity);
         $this->Texto_tag .= "<td>" . $this->quantity . "</td>\r\n";
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
   //----- valor_siniva
   function NM_export_valor_siniva()
   {
             nmgp_Form_Num_Val($this->valor_siniva, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "4", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
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
   //----- idcaja
   function NM_export_idcaja()
   {
             nmgp_Form_Num_Val($this->idcaja, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->idcaja = NM_charset_to_utf8($this->idcaja);
         $this->idcaja = str_replace('<', '&lt;', $this->idcaja);
         $this->idcaja = str_replace('>', '&gt;', $this->idcaja);
         $this->Texto_tag .= "<td>" . $this->idcaja . "</td>\r\n";
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
   //----- tarjetarfid
   function NM_export_tarjetarfid()
   {
         $this->tarjetarfid = html_entity_decode($this->tarjetarfid, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->tarjetarfid = strip_tags($this->tarjetarfid);
         $this->tarjetarfid = NM_charset_to_utf8($this->tarjetarfid);
         $this->tarjetarfid = str_replace('<', '&lt;', $this->tarjetarfid);
         $this->tarjetarfid = str_replace('>', '&gt;', $this->tarjetarfid);
         $this->Texto_tag .= "<td>" . $this->tarjetarfid . "</td>\r\n";
   }
   //----- rfid_pulsera
   function NM_export_rfid_pulsera()
   {
         $this->rfid_pulsera = html_entity_decode($this->rfid_pulsera, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->rfid_pulsera = strip_tags($this->rfid_pulsera);
         $this->rfid_pulsera = NM_charset_to_utf8($this->rfid_pulsera);
         $this->rfid_pulsera = str_replace('<', '&lt;', $this->rfid_pulsera);
         $this->rfid_pulsera = str_replace('>', '&gt;', $this->rfid_pulsera);
         $this->Texto_tag .= "<td>" . $this->rfid_pulsera . "</td>\r\n";
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
   //----- discount
   function NM_export_discount()
   {
             nmgp_Form_Num_Val($this->discount, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         $this->discount = NM_charset_to_utf8($this->discount);
         $this->discount = str_replace('<', '&lt;', $this->discount);
         $this->discount = str_replace('>', '&gt;', $this->discount);
         $this->Texto_tag .= "<td>" . $this->discount . "</td>\r\n";
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
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_sales_detail_reporte']['rtf_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_sales_detail_reporte']['rtf_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_sales_detail_reporte'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_sales_detail_reporte'][$path_doc_md5][1] = $this->Tit_doc;
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
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_sales_detail_reporte']['rtf_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_sales_detail_reporte']['rtf_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_sales_detail_reporte'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_sales_detail_reporte'][$path_doc_md5][1] = $this->Tit_doc;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE><?php echo $this->Ini->Nm_lang['lang_othr_grid_title'] ?> sales_detail :: RTF</TITLE>
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
<form name="Fdown" method="get" action="grid_sales_detail_reporte_download.php" target="_blank" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="grid_sales_detail_reporte"> 
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
