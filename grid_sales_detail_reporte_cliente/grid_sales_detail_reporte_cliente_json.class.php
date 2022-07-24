<?php

class grid_sales_detail_reporte_cliente_json
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
      if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_sales_detail_reporte_cliente']['embutida'])
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
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_sales_detail_reporte_cliente']['opcao'] = "";
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
                   nm_limpa_str_grid_sales_detail_reporte_cliente($cadapar[1]);
                   nm_protect_num_grid_sales_detail_reporte_cliente($cadapar[0], $cadapar[1]);
                   if ($cadapar[1] == "@ ") {$cadapar[1] = trim($cadapar[1]); }
                   $Tmp_par   = $cadapar[0];
                   $$Tmp_par = $cadapar[1];
                   if ($Tmp_par == "nmgp_opcao")
                   {
                       $_SESSION['sc_session'][$script_case_init]['grid_sales_detail_reporte_cliente']['opcao'] = $cadapar[1];
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
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_sales_detail_reporte_cliente']['SC_Ind_Groupby'] == "sc_free_group_by" && empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_sales_detail_reporte_cliente']['SC_Gb_Free_cmp']))
      {
          $this->Tem_json_res  = false;
      }
      if (!is_file($this->Ini->root . $this->Ini->path_link . "grid_sales_detail_reporte_cliente/grid_sales_detail_reporte_cliente_res_json.class.php"))
      {
          $this->Tem_json_res  = false;
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_sales_detail_reporte_cliente']['embutida'] && isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_sales_detail_reporte_cliente']['json_label']))
      {
          $this->Json_use_label = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_sales_detail_reporte_cliente']['json_label'];
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_sales_detail_reporte_cliente']['embutida'] && isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_sales_detail_reporte_cliente']['json_format']))
      {
          $this->Json_format = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_sales_detail_reporte_cliente']['json_format'];
      }
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_sales_detail_reporte_cliente']['embutida'] && !$this->Ini->sc_export_ajax) {
          require_once($this->Ini->path_lib_php . "/sc_progress_bar.php");
          $this->pb = new scProgressBar();
          $this->pb->setRoot($this->Ini->root);
          $this->pb->setDir($_SESSION['scriptcase']['grid_sales_detail_reporte_cliente']['glo_nm_path_imag_temp'] . "/");
          $this->pb->setProgressbarMd5($_GET['pbmd5']);
          $this->pb->initialize();
          $this->pb->setReturnUrl("./");
          $this->pb->setReturnOption($_SESSION['sc_session'][$this->Ini->sc_page]['grid_sales_detail_reporte_cliente']['json_return']);
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
      $this->Arq_zip      = $this->Arquivo . "_grid_sales_detail_reporte_cliente.zip";
      $this->Arquivo     .= "_grid_sales_detail_reporte_cliente";
      $this->Arquivo     .= ".json";
      $this->Tit_doc      = "grid_sales_detail_reporte_cliente.json";
      $this->Tit_zip      = "grid_sales_detail_reporte_cliente.zip";
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
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['grid_sales_detail_reporte_cliente']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['grid_sales_detail_reporte_cliente']['field_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['grid_sales_detail_reporte_cliente']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_sales_detail_reporte_cliente']['usr_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_sales_detail_reporte_cliente']['usr_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_sales_detail_reporte_cliente']['usr_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_sales_detail_reporte_cliente']['php_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_sales_detail_reporte_cliente']['php_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_sales_detail_reporte_cliente']['php_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_sales_detail_reporte_cliente']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_sales_detail_reporte_cliente']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_sales_detail_reporte_cliente']['where_pesq_filtro'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_sales_detail_reporte_cliente']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_sales_detail_reporte_cliente']['campos_busca']))
      { 
          $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_sales_detail_reporte_cliente']['campos_busca'];
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
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_sales_detail_reporte_cliente']['json_name']))
      {
          $Pos = strrpos($_SESSION['sc_session'][$this->Ini->sc_page]['grid_sales_detail_reporte_cliente']['json_name'], ".");
          if ($Pos === false) {
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_sales_detail_reporte_cliente']['json_name'] .= ".json";
          }
          $this->Arquivo = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_sales_detail_reporte_cliente']['json_name'];
          $this->Arq_zip = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_sales_detail_reporte_cliente']['json_name'];
          $this->Tit_doc = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_sales_detail_reporte_cliente']['json_name'];
          $Pos = strrpos($_SESSION['sc_session'][$this->Ini->sc_page]['grid_sales_detail_reporte_cliente']['json_name'], ".");
          if ($Pos !== false) {
              $this->Arq_zip = substr($_SESSION['sc_session'][$this->Ini->sc_page]['grid_sales_detail_reporte_cliente']['json_name'], 0, $Pos);
          }
          $this->Arq_zip .= ".zip";
          $this->Tit_zip  = $this->Arq_zip;
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_sales_detail_reporte_cliente']['json_name']);
      }
      $this->arr_export = array('label' => array(), 'lines' => array());
      $this->arr_span   = array();

      if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_sales_detail_reporte_cliente']['embutida'])
      { 
          $this->Json_f = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
          $this->Zip_f = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arq_zip;
          $json_f = fopen($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo, "w");
      }
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
      $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_sales_detail_reporte_cliente']['where_pesq'];
      $nmgp_select_count .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_sales_detail_reporte_cliente']['where_pesq'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_sales_detail_reporte_cliente']['where_resumo']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_sales_detail_reporte_cliente']['where_resumo'])) 
      { 
          if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_sales_detail_reporte_cliente']['where_pesq'])) 
          { 
              $nmgp_select .= " where " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_sales_detail_reporte_cliente']['where_resumo']; 
              $nmgp_select_count .= " where " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_sales_detail_reporte_cliente']['where_resumo']; 
          } 
          else
          { 
              $nmgp_select .= " and (" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_sales_detail_reporte_cliente']['where_resumo'] . ")"; 
              $nmgp_select_count .= " and (" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_sales_detail_reporte_cliente']['where_resumo'] . ")"; 
          } 
      } 
      $nmgp_order_by = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_sales_detail_reporte_cliente']['order_grid'];
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
         if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_sales_detail_reporte_cliente']['embutida'] && !$this->Ini->sc_export_ajax) {
             $Mens_bar = NM_charset_to_utf8($this->Ini->Nm_lang['lang_othr_prcs']);
             $this->pb->setProgressbarMessage($Mens_bar . ": " . $this->SC_seq_register . $PB_tot);
             $this->pb->addSteps(1);
         }
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
         foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_sales_detail_reporte_cliente']['field_order'] as $Cada_col)
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
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_sales_detail_reporte_cliente']['embutida'])
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
              require_once($this->Ini->path_aplicacao . "grid_sales_detail_reporte_cliente_res_json.class.php");
              $this->Res = new grid_sales_detail_reporte_cliente_res_json();
              $this->prep_modulos("Res");
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_sales_detail_reporte_cliente']['json_res_grid'] = true;
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
                  $Arq_res   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_sales_detail_reporte_cliente']['json_res_file']['json'];
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
                  unlink($_SESSION['sc_session'][$this->Ini->sc_page]['grid_sales_detail_reporte_cliente']['json_res_file']['json']);
              }
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_sales_detail_reporte_cliente']['json_res_grid']);
          } 
      }
      if(isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_sales_detail_reporte_cliente']['export_sel_columns']['field_order']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_sales_detail_reporte_cliente']['field_order'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_sales_detail_reporte_cliente']['export_sel_columns']['field_order'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_sales_detail_reporte_cliente']['export_sel_columns']['field_order']);
      }
      if(isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_sales_detail_reporte_cliente']['export_sel_columns']['usr_cmp_sel']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_sales_detail_reporte_cliente']['usr_cmp_sel'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_sales_detail_reporte_cliente']['export_sel_columns']['usr_cmp_sel'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_sales_detail_reporte_cliente']['export_sel_columns']['usr_cmp_sel']);
      }
      $rs->Close();
   }
   //----- id_sales
   function NM_export_id_sales()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->id_sales, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['id_sales'])) ? $this->New_label['id_sales'] : "Id Sales"; 
         }
         else
         {
             $SC_Label = "id_sales"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->id_sales;
   }
   //----- fechatrans
   function NM_export_fechatrans()
   {
         if ($this->Json_format)
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
         }
         $this->fechatrans = NM_charset_to_utf8($this->fechatrans);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['fechatrans'])) ? $this->New_label['fechatrans'] : "Fechatrans"; 
         }
         else
         {
             $SC_Label = "fechatrans"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->fechatrans;
   }
   //----- codproducto
   function NM_export_codproducto()
   {
         $this->codproducto = NM_charset_to_utf8($this->codproducto);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['codproducto'])) ? $this->New_label['codproducto'] : "Codproducto"; 
         }
         else
         {
             $SC_Label = "codproducto"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->codproducto;
   }
   //----- producto
   function NM_export_producto()
   {
         $this->producto = NM_charset_to_utf8($this->producto);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['producto'])) ? $this->New_label['producto'] : "Producto"; 
         }
         else
         {
             $SC_Label = "producto"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->producto;
   }
   //----- quantity
   function NM_export_quantity()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->quantity, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['quantity'])) ? $this->New_label['quantity'] : "Quantity"; 
         }
         else
         {
             $SC_Label = "quantity"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->quantity;
   }
   //----- item_total
   function NM_export_item_total()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->item_total, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['item_total'])) ? $this->New_label['item_total'] : "Item Total"; 
         }
         else
         {
             $SC_Label = "item_total"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->item_total;
   }
   //----- valor_siniva
   function NM_export_valor_siniva()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->valor_siniva, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "4", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['valor_siniva'])) ? $this->New_label['valor_siniva'] : "Valor Siniva"; 
         }
         else
         {
             $SC_Label = "valor_siniva"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->valor_siniva;
   }
   //----- valor_unitario
   function NM_export_valor_unitario()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->valor_unitario, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "4", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['valor_unitario'])) ? $this->New_label['valor_unitario'] : "Valor Unitario"; 
         }
         else
         {
             $SC_Label = "valor_unitario"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->valor_unitario;
   }
   //----- cuentaventa
   function NM_export_cuentaventa()
   {
         $this->look_cuentaventa = NM_charset_to_utf8($this->look_cuentaventa);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['cuentaventa'])) ? $this->New_label['cuentaventa'] : "Cuentaventa"; 
         }
         else
         {
             $SC_Label = "cuentaventa"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->look_cuentaventa;
   }
   //----- idcaja
   function NM_export_idcaja()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->idcaja, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['idcaja'])) ? $this->New_label['idcaja'] : "Idcaja"; 
         }
         else
         {
             $SC_Label = "idcaja"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->idcaja;
   }
   //----- factura
   function NM_export_factura()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->factura, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['factura'])) ? $this->New_label['factura'] : "Factura"; 
         }
         else
         {
             $SC_Label = "factura"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->factura;
   }
   //----- uniqueid
   function NM_export_uniqueid()
   {
         $this->uniqueid = NM_charset_to_utf8($this->uniqueid);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['uniqueid'])) ? $this->New_label['uniqueid'] : "Uniqueid"; 
         }
         else
         {
             $SC_Label = "uniqueid"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->uniqueid;
   }
   //----- entrada
   function NM_export_entrada()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->entrada, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['entrada'])) ? $this->New_label['entrada'] : "Entrada"; 
         }
         else
         {
             $SC_Label = "entrada"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->entrada;
   }
   //----- jugador
   function NM_export_jugador()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->jugador, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['jugador'])) ? $this->New_label['jugador'] : "Jugador"; 
         }
         else
         {
             $SC_Label = "jugador"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->jugador;
   }
   //----- visitante
   function NM_export_visitante()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->visitante, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['visitante'])) ? $this->New_label['visitante'] : "Visitante"; 
         }
         else
         {
             $SC_Label = "visitante"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->visitante;
   }
   //----- tarjeta
   function NM_export_tarjeta()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->tarjeta, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['tarjeta'])) ? $this->New_label['tarjeta'] : "Tarjeta"; 
         }
         else
         {
             $SC_Label = "tarjeta"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->tarjeta;
   }
   //----- tokens
   function NM_export_tokens()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->tokens, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
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
   //----- minutos
   function NM_export_minutos()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->minutos, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['minutos'])) ? $this->New_label['minutos'] : "Minutos"; 
         }
         else
         {
             $SC_Label = "minutos"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->minutos;
   }
   //----- comida
   function NM_export_comida()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->comida, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['comida'])) ? $this->New_label['comida'] : "Comida"; 
         }
         else
         {
             $SC_Label = "comida"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->comida;
   }
   //----- tarjetarfid
   function NM_export_tarjetarfid()
   {
         $this->tarjetarfid = NM_charset_to_utf8($this->tarjetarfid);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['tarjetarfid'])) ? $this->New_label['tarjetarfid'] : "Tarjetarfid"; 
         }
         else
         {
             $SC_Label = "tarjetarfid"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->tarjetarfid;
   }
   //----- rfid_pulsera
   function NM_export_rfid_pulsera()
   {
         $this->rfid_pulsera = NM_charset_to_utf8($this->rfid_pulsera);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['rfid_pulsera'])) ? $this->New_label['rfid_pulsera'] : "Rfid Pulsera"; 
         }
         else
         {
             $SC_Label = "rfid_pulsera"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->rfid_pulsera;
   }
   //----- id_sales_detail
   function NM_export_id_sales_detail()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->id_sales_detail, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['id_sales_detail'])) ? $this->New_label['id_sales_detail'] : "Id Sales Detail"; 
         }
         else
         {
             $SC_Label = "id_sales_detail"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->id_sales_detail;
   }
   //----- unit_cost
   function NM_export_unit_cost()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->unit_cost, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['unit_cost'])) ? $this->New_label['unit_cost'] : "Unit Cost"; 
         }
         else
         {
             $SC_Label = "unit_cost"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->unit_cost;
   }
   //----- unit_value
   function NM_export_unit_value()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->unit_value, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['unit_value'])) ? $this->New_label['unit_value'] : "Unit Value"; 
         }
         else
         {
             $SC_Label = "unit_value"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->unit_value;
   }
   //----- discount
   function NM_export_discount()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->discount, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['discount'])) ? $this->New_label['discount'] : "Discount"; 
         }
         else
         {
             $SC_Label = "discount"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->discount;
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
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_sales_detail_reporte_cliente']['json_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_sales_detail_reporte_cliente']['json_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_sales_detail_reporte_cliente'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_sales_detail_reporte_cliente'][$path_doc_md5][1] = $this->Tit_doc;
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
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_sales_detail_reporte_cliente']['json_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_sales_detail_reporte_cliente']['json_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_sales_detail_reporte_cliente'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_sales_detail_reporte_cliente'][$path_doc_md5][1] = $this->Tit_doc;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE><?php echo $this->Ini->Nm_lang['lang_othr_grid_title'] ?> sales_detail :: JSON</TITLE>
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
<form name="Fdown" method="get" action="grid_sales_detail_reporte_cliente_download.php" target="_blank" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="grid_sales_detail_reporte_cliente"> 
<input type="hidden" name="nm_name_doc" value="<?php echo $path_doc_md5 ?>"> 
</form>
<FORM name="F0" method=post action="./" style="display: none"> 
<INPUT type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<INPUT type="hidden" name="nmgp_opcao" value="<?php echo NM_encode_input($_SESSION['sc_session'][$this->Ini->sc_page]['grid_sales_detail_reporte_cliente']['json_return']); ?>"> 
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