<?php

class grid_detail_sales_todo_rtf
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
                   nm_limpa_str_grid_detail_sales_todo($cadapar[1]);
                   nm_protect_num_grid_detail_sales_todo($cadapar[0], $cadapar[1]);
                   if ($cadapar[1] == "@ ") {$cadapar[1] = trim($cadapar[1]); }
                   $Tmp_par   = $cadapar[0];
                   $$Tmp_par = $cadapar[1];
                   if ($Tmp_par == "nmgp_opcao")
                   {
                       $_SESSION['sc_session'][$script_case_init]['grid_detail_sales_todo']['opcao'] = $cadapar[1];
                   }
               }
          }
      }
      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      require_once($this->Ini->path_aplicacao . "grid_detail_sales_todo_total.class.php"); 
      $this->Tot      = new grid_detail_sales_todo_total($this->Ini->sc_page);
      $this->prep_modulos("Tot");
      $Gb_geral = "quebra_geral_" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['SC_Ind_Groupby'];
      if (method_exists($this->Tot,$Gb_geral))
      {
          $this->Tot->$Gb_geral();
          $this->count_ger = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['tot_geral'][1];
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['SC_Ind_Groupby'] == "sc_free_group_by")
          {
              $this->sum_view_sales_detail_group_todo_cantidad = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['tot_geral'][2];
              $this->sum_valor = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['tot_geral'][3];
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['SC_Ind_Groupby'] == "inicial")
          {
              $this->sum_view_sales_detail_group_todo_cantidad = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['tot_geral'][2];
              $this->sum_valor = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['tot_geral'][3];
          }
      }
      if (!$this->Ini->sc_export_ajax) {
          require_once($this->Ini->path_lib_php . "/sc_progress_bar.php");
          $this->pb = new scProgressBar();
          $this->pb->setRoot($this->Ini->root);
          $this->pb->setDir($_SESSION['scriptcase']['grid_detail_sales_todo']['glo_nm_path_imag_temp'] . "/");
          $this->pb->setProgressbarMd5($_GET['pbmd5']);
          $this->pb->initialize();
          $this->pb->setReturnUrl("./");
          $this->pb->setReturnOption('volta_grid');
          $this->pb->setTotalSteps($this->count_ger);
      }
      $this->Arquivo    = "sc_rtf";
      $this->Arquivo   .= "_" . date("YmdHis") . "_" . rand(0, 1000);
      $this->Arquivo   .= "_grid_detail_sales_todo";
      $this->Arquivo   .= ".rtf";
      $this->Tit_doc    = "grid_detail_sales_todo.rtf";
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
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['grid_detail_sales_todo']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['grid_detail_sales_todo']['field_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['grid_detail_sales_todo']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['usr_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['usr_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['usr_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['php_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['php_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['php_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['where_pesq_filtro'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['campos_busca']))
      { 
          $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['campos_busca'];
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
              $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->view_sales_detail_group_todo_fecha = $Busca_temp['view_sales_detail_group_todo_fecha']; 
          $tmp_pos = strpos($this->view_sales_detail_group_todo_fecha, "##@@");
          if ($tmp_pos !== false && !is_array($this->view_sales_detail_group_todo_fecha))
          {
              $this->view_sales_detail_group_todo_fecha = substr($this->view_sales_detail_group_todo_fecha, 0, $tmp_pos);
          }
          $this->view_sales_detail_group_todo_fecha_2 = $Busca_temp['view_sales_detail_group_todo_fecha_input_2']; 
          $this->view_sales_detail_group_todo_id_product = $Busca_temp['view_sales_detail_group_todo_id_product']; 
          $tmp_pos = strpos($this->view_sales_detail_group_todo_id_product, "##@@");
          if ($tmp_pos !== false && !is_array($this->view_sales_detail_group_todo_id_product))
          {
              $this->view_sales_detail_group_todo_id_product = substr($this->view_sales_detail_group_todo_id_product, 0, $tmp_pos);
          }
      } 
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['rtf_name']))
      {
          $Pos = strrpos($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['rtf_name'], ".");
          if ($Pos === false) {
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['rtf_name'] .= ".rtf";
          }
          $this->Arquivo = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['rtf_name'];
          $this->Tit_doc = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['rtf_name'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['rtf_name']);
      }
      $this->arr_export = array('label' => array(), 'lines' => array());
      $this->arr_span   = array();

      $this->Texto_tag .= "<table>\r\n";
      $this->Texto_tag .= "<tr>\r\n";
      foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['field_order'] as $Cada_col)
      { 
          $SC_Label = (isset($this->New_label['view_sales_detail_group_todo_fecha'])) ? $this->New_label['view_sales_detail_group_todo_fecha'] : "Fecha"; 
          if ($Cada_col == "view_sales_detail_group_todo_fecha" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['view_sales_detail_group_todo_cantidad'])) ? $this->New_label['view_sales_detail_group_todo_cantidad'] : "Cantidad"; 
          if ($Cada_col == "view_sales_detail_group_todo_cantidad" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['view_sales_detail_group_todo_unit_value'])) ? $this->New_label['view_sales_detail_group_todo_unit_value'] : "Unit Value"; 
          if ($Cada_col == "view_sales_detail_group_todo_unit_value" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['view_sales_detail_group_todo_producto'])) ? $this->New_label['view_sales_detail_group_todo_producto'] : "Producto"; 
          if ($Cada_col == "view_sales_detail_group_todo_producto" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['valor'])) ? $this->New_label['valor'] : "Valor"; 
          if ($Cada_col == "valor" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['view_sales_detail_group_todo_cuentaventa'])) ? $this->New_label['view_sales_detail_group_todo_cuentaventa'] : "Cuentaventa"; 
          if ($Cada_col == "view_sales_detail_group_todo_cuentaventa" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['sales_idcliente'])) ? $this->New_label['sales_idcliente'] : "Idcliente"; 
          if ($Cada_col == "sales_idcliente" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['sales_cliente'])) ? $this->New_label['sales_cliente'] : "Cliente"; 
          if ($Cada_col == "sales_cliente" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['sales_factura'])) ? $this->New_label['sales_factura'] : "Factura"; 
          if ($Cada_col == "sales_factura" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['customer_nombre'])) ? $this->New_label['customer_nombre'] : "Nombre"; 
          if ($Cada_col == "customer_nombre" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['customer_correo'])) ? $this->New_label['customer_correo'] : "Correo"; 
          if ($Cada_col == "customer_correo" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['customer_celular'])) ? $this->New_label['customer_celular'] : "Celular"; 
          if ($Cada_col == "customer_celular" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['customer_direccion'])) ? $this->New_label['customer_direccion'] : "Direccion"; 
          if ($Cada_col == "customer_direccion" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['customer_idcustomer'])) ? $this->New_label['customer_idcustomer'] : "Idcustomer"; 
          if ($Cada_col == "customer_idcustomer" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
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
          $nmgp_select = "SELECT str_replace (convert(char(10),view_sales_detail_group_todo.fecha,102), '.', '-') + ' ' + convert(char(8),view_sales_detail_group_todo.fecha,20) as cmp_maior_30_1, view_sales_detail_group_todo.cantidad as cmp_maior_30_2, view_sales_detail_group_todo.unit_value as cmp_maior_30_3, view_sales_detail_group_todo.producto as cmp_maior_30_4, unit_value*cantidad as valor, view_sales_detail_group_todo.cuentaventa as cmp_maior_30_5, sales.idcliente as sales_idcliente, sales.cliente as sales_cliente, sales.factura as sales_factura, customer.nombre as customer_nombre, customer.correo as customer_correo, customer.celular as customer_celular, customer.direccion as customer_direccion, customer.idcustomer as customer_idcustomer from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
      { 
          $nmgp_select = "SELECT view_sales_detail_group_todo.fecha as cmp_maior_30_1, view_sales_detail_group_todo.cantidad as cmp_maior_30_2, view_sales_detail_group_todo.unit_value as cmp_maior_30_3, view_sales_detail_group_todo.producto as cmp_maior_30_4, unit_value*cantidad as valor, view_sales_detail_group_todo.cuentaventa as cmp_maior_30_5, sales.idcliente as sales_idcliente, sales.cliente as sales_cliente, sales.factura as sales_factura, customer.nombre as customer_nombre, customer.correo as customer_correo, customer.celular as customer_celular, customer.direccion as customer_direccion, customer.idcustomer as customer_idcustomer from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
       $nmgp_select = "SELECT convert(char(23),view_sales_detail_group_todo.fecha,121) as cmp_maior_30_1, view_sales_detail_group_todo.cantidad as cmp_maior_30_2, view_sales_detail_group_todo.unit_value as cmp_maior_30_3, view_sales_detail_group_todo.producto as cmp_maior_30_4, unit_value*cantidad as valor, view_sales_detail_group_todo.cuentaventa as cmp_maior_30_5, sales.idcliente as sales_idcliente, sales.cliente as sales_cliente, sales.factura as sales_factura, customer.nombre as customer_nombre, customer.correo as customer_correo, customer.celular as customer_celular, customer.direccion as customer_direccion, customer.idcustomer as customer_idcustomer from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
      { 
          $nmgp_select = "SELECT view_sales_detail_group_todo.fecha as cmp_maior_30_1, view_sales_detail_group_todo.cantidad as cmp_maior_30_2, view_sales_detail_group_todo.unit_value as cmp_maior_30_3, view_sales_detail_group_todo.producto as cmp_maior_30_4, unit_value*cantidad as valor, view_sales_detail_group_todo.cuentaventa as cmp_maior_30_5, sales.idcliente as sales_idcliente, sales.cliente as sales_cliente, sales.factura as sales_factura, customer.nombre as customer_nombre, customer.correo as customer_correo, customer.celular as customer_celular, customer.direccion as customer_direccion, customer.idcustomer as customer_idcustomer from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
      { 
          $nmgp_select = "SELECT EXTEND(view_sales_detail_group_todo.fecha, YEAR TO DAY) as cmp_maior_30_1, view_sales_detail_group_todo.cantidad as cmp_maior_30_2, view_sales_detail_group_todo.unit_value as cmp_maior_30_3, view_sales_detail_group_todo.producto as cmp_maior_30_4, unit_value*cantidad as valor, view_sales_detail_group_todo.cuentaventa as cmp_maior_30_5, sales.idcliente as sales_idcliente, sales.cliente as sales_cliente, sales.factura as sales_factura, customer.nombre as customer_nombre, customer.correo as customer_correo, customer.celular as customer_celular, customer.direccion as customer_direccion, customer.idcustomer as customer_idcustomer from " . $this->Ini->nm_tabela; 
      } 
      else 
      { 
          $nmgp_select = "SELECT view_sales_detail_group_todo.fecha as cmp_maior_30_1, view_sales_detail_group_todo.cantidad as cmp_maior_30_2, view_sales_detail_group_todo.unit_value as cmp_maior_30_3, view_sales_detail_group_todo.producto as cmp_maior_30_4, unit_value*cantidad as valor, view_sales_detail_group_todo.cuentaventa as cmp_maior_30_5, sales.idcliente as sales_idcliente, sales.cliente as sales_cliente, sales.factura as sales_factura, customer.nombre as customer_nombre, customer.correo as customer_correo, customer.celular as customer_celular, customer.direccion as customer_direccion, customer.idcustomer as customer_idcustomer from " . $this->Ini->nm_tabela; 
      } 
      $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['where_pesq'];
      $nmgp_select_count .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['where_pesq'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['where_resumo']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['where_resumo'])) 
      { 
          if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['where_pesq'])) 
          { 
              $nmgp_select .= " where " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['where_resumo']; 
              $nmgp_select_count .= " where " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['where_resumo']; 
          } 
          else
          { 
              $nmgp_select .= " and (" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['where_resumo'] . ")"; 
              $nmgp_select_count .= " and (" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['where_resumo'] . ")"; 
          } 
      } 
      $nmgp_order_by = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['order_grid'];
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
         $this->view_sales_detail_group_todo_fecha = $rs->fields[0] ;  
         $this->view_sales_detail_group_todo_cantidad = $rs->fields[1] ;  
         $this->view_sales_detail_group_todo_cantidad =  str_replace(",", ".", $this->view_sales_detail_group_todo_cantidad);
         $this->view_sales_detail_group_todo_cantidad = (string)$this->view_sales_detail_group_todo_cantidad;
         $this->view_sales_detail_group_todo_unit_value = $rs->fields[2] ;  
         $this->view_sales_detail_group_todo_unit_value =  str_replace(",", ".", $this->view_sales_detail_group_todo_unit_value);
         $this->view_sales_detail_group_todo_unit_value = (string)$this->view_sales_detail_group_todo_unit_value;
         $this->view_sales_detail_group_todo_producto = $rs->fields[3] ;  
         $this->valor = $rs->fields[4] ;  
         $this->valor =  str_replace(",", ".", $this->valor);
         $this->valor = (string)$this->valor;
         $this->view_sales_detail_group_todo_cuentaventa = $rs->fields[5] ;  
         $this->sales_idcliente = $rs->fields[6] ;  
         $this->sales_cliente = $rs->fields[7] ;  
         $this->sales_factura = $rs->fields[8] ;  
         $this->sales_factura = (string)$this->sales_factura;
         $this->customer_nombre = $rs->fields[9] ;  
         $this->customer_correo = $rs->fields[10] ;  
         $this->customer_celular = $rs->fields[11] ;  
         $this->customer_direccion = $rs->fields[12] ;  
         $this->customer_idcustomer = $rs->fields[13] ;  
         $this->sc_proc_grid = true; 
         foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['field_order'] as $Cada_col)
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
      if(isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['export_sel_columns']['field_order']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['field_order'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['export_sel_columns']['field_order'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['export_sel_columns']['field_order']);
      }
      if(isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['export_sel_columns']['usr_cmp_sel']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['usr_cmp_sel'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['export_sel_columns']['usr_cmp_sel'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['export_sel_columns']['usr_cmp_sel']);
      }
      $rs->Close();
   }
   //----- view_sales_detail_group_todo_fecha
   function NM_export_view_sales_detail_group_todo_fecha()
   {
             $conteudo_x =  $this->view_sales_detail_group_todo_fecha;
             nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD");
             if (is_numeric($conteudo_x) && strlen($conteudo_x) > 0) 
             { 
                 $this->nm_data->SetaData($this->view_sales_detail_group_todo_fecha, "YYYY-MM-DD  ");
                 $this->view_sales_detail_group_todo_fecha = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DT", "ddmmaaaa"));
             } 
         $this->view_sales_detail_group_todo_fecha = NM_charset_to_utf8($this->view_sales_detail_group_todo_fecha);
         $this->view_sales_detail_group_todo_fecha = str_replace('<', '&lt;', $this->view_sales_detail_group_todo_fecha);
         $this->view_sales_detail_group_todo_fecha = str_replace('>', '&gt;', $this->view_sales_detail_group_todo_fecha);
         $this->Texto_tag .= "<td>" . $this->view_sales_detail_group_todo_fecha . "</td>\r\n";
   }
   //----- view_sales_detail_group_todo_cantidad
   function NM_export_view_sales_detail_group_todo_cantidad()
   {
             nmgp_Form_Num_Val($this->view_sales_detail_group_todo_cantidad, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "0", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         $this->view_sales_detail_group_todo_cantidad = NM_charset_to_utf8($this->view_sales_detail_group_todo_cantidad);
         $this->view_sales_detail_group_todo_cantidad = str_replace('<', '&lt;', $this->view_sales_detail_group_todo_cantidad);
         $this->view_sales_detail_group_todo_cantidad = str_replace('>', '&gt;', $this->view_sales_detail_group_todo_cantidad);
         $this->Texto_tag .= "<td>" . $this->view_sales_detail_group_todo_cantidad . "</td>\r\n";
   }
   //----- view_sales_detail_group_todo_unit_value
   function NM_export_view_sales_detail_group_todo_unit_value()
   {
             nmgp_Form_Num_Val($this->view_sales_detail_group_todo_unit_value, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         $this->view_sales_detail_group_todo_unit_value = NM_charset_to_utf8($this->view_sales_detail_group_todo_unit_value);
         $this->view_sales_detail_group_todo_unit_value = str_replace('<', '&lt;', $this->view_sales_detail_group_todo_unit_value);
         $this->view_sales_detail_group_todo_unit_value = str_replace('>', '&gt;', $this->view_sales_detail_group_todo_unit_value);
         $this->Texto_tag .= "<td>" . $this->view_sales_detail_group_todo_unit_value . "</td>\r\n";
   }
   //----- view_sales_detail_group_todo_producto
   function NM_export_view_sales_detail_group_todo_producto()
   {
         $this->view_sales_detail_group_todo_producto = html_entity_decode($this->view_sales_detail_group_todo_producto, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->view_sales_detail_group_todo_producto = strip_tags($this->view_sales_detail_group_todo_producto);
         $this->view_sales_detail_group_todo_producto = NM_charset_to_utf8($this->view_sales_detail_group_todo_producto);
         $this->view_sales_detail_group_todo_producto = str_replace('<', '&lt;', $this->view_sales_detail_group_todo_producto);
         $this->view_sales_detail_group_todo_producto = str_replace('>', '&gt;', $this->view_sales_detail_group_todo_producto);
         $this->Texto_tag .= "<td>" . $this->view_sales_detail_group_todo_producto . "</td>\r\n";
   }
   //----- valor
   function NM_export_valor()
   {
             nmgp_Form_Num_Val($this->valor, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         $this->valor = NM_charset_to_utf8($this->valor);
         $this->valor = str_replace('<', '&lt;', $this->valor);
         $this->valor = str_replace('>', '&gt;', $this->valor);
         $this->Texto_tag .= "<td>" . $this->valor . "</td>\r\n";
   }
   //----- view_sales_detail_group_todo_cuentaventa
   function NM_export_view_sales_detail_group_todo_cuentaventa()
   {
         $this->view_sales_detail_group_todo_cuentaventa = html_entity_decode($this->view_sales_detail_group_todo_cuentaventa, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->view_sales_detail_group_todo_cuentaventa = strip_tags($this->view_sales_detail_group_todo_cuentaventa);
         $this->view_sales_detail_group_todo_cuentaventa = NM_charset_to_utf8($this->view_sales_detail_group_todo_cuentaventa);
         $this->view_sales_detail_group_todo_cuentaventa = str_replace('<', '&lt;', $this->view_sales_detail_group_todo_cuentaventa);
         $this->view_sales_detail_group_todo_cuentaventa = str_replace('>', '&gt;', $this->view_sales_detail_group_todo_cuentaventa);
         $this->Texto_tag .= "<td>" . $this->view_sales_detail_group_todo_cuentaventa . "</td>\r\n";
   }
   //----- sales_idcliente
   function NM_export_sales_idcliente()
   {
         $this->sales_idcliente = html_entity_decode($this->sales_idcliente, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->sales_idcliente = strip_tags($this->sales_idcliente);
         $this->sales_idcliente = NM_charset_to_utf8($this->sales_idcliente);
         $this->sales_idcliente = str_replace('<', '&lt;', $this->sales_idcliente);
         $this->sales_idcliente = str_replace('>', '&gt;', $this->sales_idcliente);
         $this->Texto_tag .= "<td>" . $this->sales_idcliente . "</td>\r\n";
   }
   //----- sales_cliente
   function NM_export_sales_cliente()
   {
         $this->sales_cliente = html_entity_decode($this->sales_cliente, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->sales_cliente = strip_tags($this->sales_cliente);
         $this->sales_cliente = NM_charset_to_utf8($this->sales_cliente);
         $this->sales_cliente = str_replace('<', '&lt;', $this->sales_cliente);
         $this->sales_cliente = str_replace('>', '&gt;', $this->sales_cliente);
         $this->Texto_tag .= "<td>" . $this->sales_cliente . "</td>\r\n";
   }
   //----- sales_factura
   function NM_export_sales_factura()
   {
             nmgp_Form_Num_Val($this->sales_factura, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->sales_factura = NM_charset_to_utf8($this->sales_factura);
         $this->sales_factura = str_replace('<', '&lt;', $this->sales_factura);
         $this->sales_factura = str_replace('>', '&gt;', $this->sales_factura);
         $this->Texto_tag .= "<td>" . $this->sales_factura . "</td>\r\n";
   }
   //----- customer_nombre
   function NM_export_customer_nombre()
   {
         $this->customer_nombre = html_entity_decode($this->customer_nombre, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->customer_nombre = strip_tags($this->customer_nombre);
         $this->customer_nombre = NM_charset_to_utf8($this->customer_nombre);
         $this->customer_nombre = str_replace('<', '&lt;', $this->customer_nombre);
         $this->customer_nombre = str_replace('>', '&gt;', $this->customer_nombre);
         $this->Texto_tag .= "<td>" . $this->customer_nombre . "</td>\r\n";
   }
   //----- customer_correo
   function NM_export_customer_correo()
   {
         $this->customer_correo = html_entity_decode($this->customer_correo, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->customer_correo = strip_tags($this->customer_correo);
         $this->customer_correo = NM_charset_to_utf8($this->customer_correo);
         $this->customer_correo = str_replace('<', '&lt;', $this->customer_correo);
         $this->customer_correo = str_replace('>', '&gt;', $this->customer_correo);
         $this->Texto_tag .= "<td>" . $this->customer_correo . "</td>\r\n";
   }
   //----- customer_celular
   function NM_export_customer_celular()
   {
         $this->customer_celular = html_entity_decode($this->customer_celular, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->customer_celular = strip_tags($this->customer_celular);
         $this->customer_celular = NM_charset_to_utf8($this->customer_celular);
         $this->customer_celular = str_replace('<', '&lt;', $this->customer_celular);
         $this->customer_celular = str_replace('>', '&gt;', $this->customer_celular);
         $this->Texto_tag .= "<td>" . $this->customer_celular . "</td>\r\n";
   }
   //----- customer_direccion
   function NM_export_customer_direccion()
   {
         $this->customer_direccion = html_entity_decode($this->customer_direccion, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->customer_direccion = strip_tags($this->customer_direccion);
         $this->customer_direccion = NM_charset_to_utf8($this->customer_direccion);
         $this->customer_direccion = str_replace('<', '&lt;', $this->customer_direccion);
         $this->customer_direccion = str_replace('>', '&gt;', $this->customer_direccion);
         $this->Texto_tag .= "<td>" . $this->customer_direccion . "</td>\r\n";
   }
   //----- customer_idcustomer
   function NM_export_customer_idcustomer()
   {
         $this->customer_idcustomer = html_entity_decode($this->customer_idcustomer, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->customer_idcustomer = strip_tags($this->customer_idcustomer);
         $this->customer_idcustomer = NM_charset_to_utf8($this->customer_idcustomer);
         $this->customer_idcustomer = str_replace('<', '&lt;', $this->customer_idcustomer);
         $this->customer_idcustomer = str_replace('>', '&gt;', $this->customer_idcustomer);
         $this->Texto_tag .= "<td>" . $this->customer_idcustomer . "</td>\r\n";
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
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['rtf_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['rtf_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo'][$path_doc_md5][1] = $this->Tit_doc;
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
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['rtf_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['rtf_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo'][$path_doc_md5][1] = $this->Tit_doc;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE><?php echo $this->Ini->Nm_lang['lang_othr_grid_title'] ?>  :: RTF</TITLE>
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
<form name="Fdown" method="get" action="grid_detail_sales_todo_download.php" target="_blank" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="grid_detail_sales_todo"> 
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
