<?php
//--- 
class grid_detail_sales_todo_det
{
   var $Ini;
   var $Erro;
   var $Db;
   var $nm_data;
   var $NM_raiz_img; 
   var $nmgp_botoes     = array(); 
   var $nm_btn_exist    = array(); 
   var $nm_btn_label    = array(); 
   var $nm_btn_disabled = array(); 
   var $nm_location;
   var $view_sales_detail_group_todo_fecha;
   var $view_sales_detail_group_todo_cantidad;
   var $view_sales_detail_group_todo_unit_value;
   var $view_sales_detail_group_todo_producto;
   var $valor;
   var $view_sales_detail_group_todo_cuentaventa;
   var $sales_idcliente;
   var $sales_cliente;
   var $sales_factura;
   var $customer_nombre;
   var $customer_correo;
   var $customer_celular;
   var $customer_direccion;
   var $customer_idcustomer;
   var $view_sales_detail_group_todo_id_product;
   var $view_sales_detail_group_todo_uniqueid;
   var $view_sales_detail_group_todo_entrada;
   var $view_sales_detail_group_todo_jugador;
   var $view_sales_detail_group_todo_visitante;
   var $view_sales_detail_group_todo_tarjeta;
   var $view_sales_detail_group_todo_tokens;
   var $view_sales_detail_group_todo_minutos;
   var $view_sales_detail_group_todo_comida;
   var $sales_id_sales;
   var $sales_sales_price;
   var $sales_sales_discount;
   var $sales_total;
   var $sales_datesales;
   var $sales_id_status;
   var $sales_idcaja;
   var $sales_direccion;
   var $sales_telefono;
   var $sales_serie;
   var $sales_clave_acceso;
   var $sales_enviosri;
   var $sales_fechaenvio;
   var $sales_uniqueid;
   var $sales_estado;
   var $sales_fechaid;
   var $sales_importe_recibido;
   var $sales_codigoid;
   var $sales_totalsinimpuestos;
   var $sales_totaldescuento;
   var $sales_baseimponible;
   var $sales_valoriva;
   var $sales_importetotal;
   var $sales_idpago;
   var $sales_totalpago;
   var $sales_cliente_email;
   var $sales_idempleado;
   var $sales_idturno;
   var $sales_facturaxml;
   var $sales_facturaxml64;
   var $sales_codpago_sri;
   var $sales_imprime;
   var $sales_comprobante;
   var $sales_facturapdf;
   var $customer_idinterno;
   var $customer_tipodoc;
   var $customer_ult_fecha;
    function getFieldHighlight($filter_type, $field, $str_value, $str_value_original='')
    {
        $str_html_ini = '<div class="highlight">';
        $str_html_fim = '</div>';

        if($filter_type == 'advanced_search')
        {
            if (
                isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['campos_busca'][ $field ]) &&
                isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['campos_busca'][ $field . "_cond" ]) &&
                !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['campos_busca'][ $field ]) &&
                (
                    $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['campos_busca'][ $field . "_cond"] == 'qp' ||
                    $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['campos_busca'][ $field . "_cond"] == 'eq' ||
                    $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['campos_busca'][ $field . "_cond"] == 'ii'
                )
            )
            {
                if($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['campos_busca'][ $field . "_cond"] == 'qp')
                {
                    if(strcasecmp($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['campos_busca'][ $field ], $str_value) == 0)
                    {
                        $str_value = $str_html_ini. $str_value .$str_html_fim;
                    }
                    elseif(strcasecmp($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['campos_busca'][ $field ], $str_value_original) == 0)
                    {
                        $str_value = $str_html_ini. $str_value .$str_html_fim;
                    }
                    else
                    {
                        $keywords = preg_quote($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['campos_busca'][ $field ], '/');
                        $str_value = preg_replace('/'. $keywords .'/i', $str_html_ini . '$0' . $str_html_fim, $str_value);
                    }
                }
                elseif($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['campos_busca'][ $field . "_cond"] == 'eq')
                {
                    if(strcasecmp($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['campos_busca'][ $field ], $str_value) == 0)
                    {
                        $str_value = $str_html_ini. $str_value .$str_html_fim;
                    }
                    elseif(strcasecmp($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['campos_busca'][ $field ], $str_value_original) == 0)
                    {
                        $str_value = $str_html_ini. $str_value .$str_html_fim;
                    }
                }
                elseif($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['campos_busca'][ $field . "_cond"] == 'ii')
                {
                    if(strcasecmp($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['campos_busca'][ $field ], substr($str_value, 0, strlen($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['campos_busca'][ $field ]))) == 0)
                    {
                        $str_value = $str_html_ini. substr($str_value, 0, strlen($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['campos_busca'][ $field ])) .$str_html_fim . substr($str_value, strlen($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['campos_busca'][ $field ]));
                    }
                }
            }
        }
        elseif($filter_type == 'quicksearch')
        {
            if(
                isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['fast_search'][0]) &&
                (
                    (
                    $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['fast_search'][0] == 'SC_all_Cmp' &&
                    in_array($field, array('sales_id_sales', 'sales_sales_price', 'sales_sales_discount', 'sales_total', 'sales_datesales', 'sales_id_status', 'sales_idcaja', 'sales_idcliente', 'sales_cliente', 'sales_direccion', 'sales_telefono', 'sales_factura', 'sales_serie', 'sales_clave_acceso', 'sales_enviosri', 'sales_fechaenvio', 'sales_uniqueid', 'sales_estado', 'sales_fechaid', 'sales_importe_recibido', 'sales_codigoid', 'sales_totalsinimpuestos', 'sales_totaldescuento', 'sales_baseimponible', 'sales_valoriva', 'sales_importetotal', 'sales_idpago', 'sales_totalpago', 'sales_cliente_email', 'sales_idempleado', 'sales_idturno', 'sales_facturaxml', 'sales_facturaxml64', 'sales_codpago_sri', 'sales_imprime', 'sales_comprobante', 'sales_facturapdf'))
                    ) ||
                    $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['fast_search'][0] == $field ||
                    strpos($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['fast_search'][0], $field . '_VLS_') !== false ||
                    strpos($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['fast_search'][0], '_VLS_' . $field) !== false
                )
            )
            {
                if($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['fast_search'][1] == 'qp')
                {
                    if(strcasecmp($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['fast_search'][2], $str_value) == 0)
                    {
                        $str_value = $str_html_ini. $str_value .$str_html_fim;
                    }
                    elseif(!empty($str_value_original) && $str_value_original != '&nbsp;' && strcasecmp($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['fast_search'][2], $str_value_original) == 0)
                    {
                        $str_value = $str_html_ini. $str_value .$str_html_fim;
                    }
                    else
                    {
                        $keywords = preg_quote($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['fast_search'][2], '/');
                        $str_value = preg_replace('/'. $keywords .'/i', $str_html_ini . '$0' . $str_html_fim, $str_value);
                    }
                }
                elseif($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['fast_search'][1] == 'eq')
                {
                    if(strcasecmp($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['fast_search'][2], $str_value) == 0)
                    {
                        $str_value = $str_html_ini. $str_value .$str_html_fim;
                    }
                    elseif(!empty($str_value_original) && $str_value_original != '&nbsp;' && strcasecmp($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['fast_search'][2], $str_value_original) == 0)
                    {
                        $str_value = $str_html_ini. $str_value .$str_html_fim;
                    }
                }
            }
        }
        return $str_value;
    }
 function monta_det()
 {
    global 
           $nm_saida, $nm_lang, $nmgp_cor_print, $nmgp_tipo_pdf;
    $this->nmgp_botoes['det_pdf'] = "on";
    $this->nmgp_botoes['pdf'] = "on";
    $this->nmgp_botoes['det_print'] = "on";
    $this->nmgp_botoes['print'] = "on";
    $this->nmgp_botoes['html'] = "on";
    $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
    if (isset($_SESSION['scriptcase']['sc_apl_conf']['grid_detail_sales_todo']['btn_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['grid_detail_sales_todo']['btn_display']))
    {
        foreach ($_SESSION['scriptcase']['sc_apl_conf']['grid_detail_sales_todo']['btn_display'] as $NM_cada_btn => $NM_cada_opc)
        {
            $this->nmgp_botoes[$NM_cada_btn] = $NM_cada_opc;
        }
    }
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['embutida_form']) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['embutida_form'])
    {
    $this->nmgp_botoes['det_pdf']   = "off";
    $this->nmgp_botoes['det_print'] = "off";
    }
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
    else 
    { 
        $this->view_sales_detail_group_todo_fecha_2 = ""; 
    } 
    $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['where_orig'];
    $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['where_pesq'];
    $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['where_pesq_filtro'];
    $this->nm_field_dinamico = array();
    $this->nm_order_dinamico = array();
    $this->nm_data = new nm_data("es_es");
    $this->NM_raiz_img  = ""; 
    if ($this->Ini->sc_export_ajax_img)
    { 
        $this->NM_raiz_img = $this->Ini->root; 
    } 
    $this->sc_proc_grid = false; 
    include($this->Ini->path_btn . $this->Ini->Str_btn_grid);
    $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['seq_dir'] = 0; 
    $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['sub_dir'] = array(); 
   if ($_SESSION['scriptcase']['proc_mobile']) {
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_conv_dados.php", "F", "nm_conv_limpa_dado") ; 
   }
   $Str_date = strtolower($_SESSION['scriptcase']['reg_conf']['date_format']);
   $Lim   = strlen($Str_date);
   $Ult   = "";
   $Arr_D = array();
   for ($I = 0; $I < $Lim; $I++)
   {
       $Char = substr($Str_date, $I, 1);
       if ($Char != $Ult)
       {
           $Arr_D[] = $Char;
       }
       $Ult = $Char;
   }
   $Prim = true;
   $Str  = "";
   foreach ($Arr_D as $Cada_d)
   {
       $Str .= (!$Prim) ? $_SESSION['scriptcase']['reg_conf']['date_sep'] : "";
       $Str .= $Cada_d;
       $Prim = false;
   }
   $Str = str_replace("a", "Y", $Str);
   $Str = str_replace("y", "Y", $Str);
   $nm_data_fixa = date($Str); 
   $this->nm_data->SetaData(date("Y/m/d H:i:s"), "YYYY/MM/DD HH:II:SS"); 
   $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_edit.php", "F", "nmgp_Form_Num_Val") ; 
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase)) 
   { 
       $nmgp_select = "SELECT view_sales_detail_group_todo.cantidad as cmp_maior_30_2, view_sales_detail_group_todo.id_product as cmp_maior_30_6, view_sales_detail_group_todo.unit_value as cmp_maior_30_3, view_sales_detail_group_todo.producto as cmp_maior_30_4, view_sales_detail_group_todo.uniqueid as cmp_maior_30_7, str_replace (convert(char(10),view_sales_detail_group_todo.fecha,102), '.', '-') + ' ' + convert(char(8),view_sales_detail_group_todo.fecha,20), view_sales_detail_group_todo.entrada as cmp_maior_30_8, view_sales_detail_group_todo.jugador as cmp_maior_30_9, view_sales_detail_group_todo.visitante as cmp_maior_30_10, view_sales_detail_group_todo.tarjeta as cmp_maior_30_11, view_sales_detail_group_todo.tokens as cmp_maior_30_12, view_sales_detail_group_todo.minutos as cmp_maior_30_13, view_sales_detail_group_todo.comida as cmp_maior_30_14, view_sales_detail_group_todo.cuentaventa as cmp_maior_30_5, sales.id_sales as sales_id_sales, sales.sales_price as sales_sales_price, sales.sales_discount as sales_sales_discount, sales.total as sales_total, str_replace (convert(char(10),sales.datesales,102), '.', '-') + ' ' + convert(char(8),sales.datesales,20), sales.id_status as sales_id_status, sales.idcaja as sales_idcaja, sales.idcliente as sales_idcliente, sales.cliente as sales_cliente, sales.direccion as sales_direccion, sales.telefono as sales_telefono, sales.factura as sales_factura, sales.serie as sales_serie, sales.clave_acceso as sales_clave_acceso, sales.enviosri as sales_enviosri, str_replace (convert(char(10),sales.fechaenvio,102), '.', '-') + ' ' + convert(char(8),sales.fechaenvio,20), sales.uniqueid as sales_uniqueid, sales.estado as sales_estado, sales.fechaid as sales_fechaid, sales.importe_recibido as sales_importe_recibido, sales.codigoid as sales_codigoid, sales.totalSinImpuestos as sales_totalsinimpuestos, sales.totalDescuento as sales_totaldescuento, sales.baseImponible as sales_baseimponible, sales.valoriva as sales_valoriva, sales.importeTotal as sales_importetotal, sales.idpago as sales_idpago, sales.totalpago as sales_totalpago, sales.cliente_email as sales_cliente_email, sales.idempleado as sales_idempleado, sales.idturno as sales_idturno, sales.facturaxml as sales_facturaxml, sales.facturaxml64 as sales_facturaxml64, sales.codpago_sri as sales_codpago_sri, sales.imprime as sales_imprime, sales.comprobante as sales_comprobante, sales.facturapdf as sales_facturapdf, customer.idcustomer as customer_idcustomer, customer.nombre as customer_nombre, customer.correo as customer_correo, customer.celular as customer_celular, customer.idinterno as customer_idinterno, customer.direccion as customer_direccion, customer.tipodoc as customer_tipodoc, str_replace (convert(char(10),customer.ult_fecha,102), '.', '-') + ' ' + convert(char(8),customer.ult_fecha,20), unit_value*cantidad as valor from " . $this->Ini->nm_tabela; 
   } 
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql)) 
   { 
       $nmgp_select = "SELECT view_sales_detail_group_todo.cantidad as cmp_maior_30_2, view_sales_detail_group_todo.id_product as cmp_maior_30_6, view_sales_detail_group_todo.unit_value as cmp_maior_30_3, view_sales_detail_group_todo.producto as cmp_maior_30_4, view_sales_detail_group_todo.uniqueid as cmp_maior_30_7, convert(char(23),view_sales_detail_group_todo.fecha,121), view_sales_detail_group_todo.entrada as cmp_maior_30_8, view_sales_detail_group_todo.jugador as cmp_maior_30_9, view_sales_detail_group_todo.visitante as cmp_maior_30_10, view_sales_detail_group_todo.tarjeta as cmp_maior_30_11, view_sales_detail_group_todo.tokens as cmp_maior_30_12, view_sales_detail_group_todo.minutos as cmp_maior_30_13, view_sales_detail_group_todo.comida as cmp_maior_30_14, view_sales_detail_group_todo.cuentaventa as cmp_maior_30_5, sales.id_sales as sales_id_sales, sales.sales_price as sales_sales_price, sales.sales_discount as sales_sales_discount, sales.total as sales_total, convert(char(23),sales.datesales,121), sales.id_status as sales_id_status, sales.idcaja as sales_idcaja, sales.idcliente as sales_idcliente, sales.cliente as sales_cliente, sales.direccion as sales_direccion, sales.telefono as sales_telefono, sales.factura as sales_factura, sales.serie as sales_serie, sales.clave_acceso as sales_clave_acceso, sales.enviosri as sales_enviosri, convert(char(23),sales.fechaenvio,121), sales.uniqueid as sales_uniqueid, sales.estado as sales_estado, sales.fechaid as sales_fechaid, sales.importe_recibido as sales_importe_recibido, sales.codigoid as sales_codigoid, sales.totalSinImpuestos as sales_totalsinimpuestos, sales.totalDescuento as sales_totaldescuento, sales.baseImponible as sales_baseimponible, sales.valoriva as sales_valoriva, sales.importeTotal as sales_importetotal, sales.idpago as sales_idpago, sales.totalpago as sales_totalpago, sales.cliente_email as sales_cliente_email, sales.idempleado as sales_idempleado, sales.idturno as sales_idturno, sales.facturaxml as sales_facturaxml, sales.facturaxml64 as sales_facturaxml64, sales.codpago_sri as sales_codpago_sri, sales.imprime as sales_imprime, sales.comprobante as sales_comprobante, sales.facturapdf as sales_facturapdf, customer.idcustomer as customer_idcustomer, customer.nombre as customer_nombre, customer.correo as customer_correo, customer.celular as customer_celular, customer.idinterno as customer_idinterno, customer.direccion as customer_direccion, customer.tipodoc as customer_tipodoc, convert(char(23),customer.ult_fecha,121), unit_value*cantidad as valor from " . $this->Ini->nm_tabela; 
   } 
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle)) 
   { 
       $nmgp_select = "SELECT view_sales_detail_group_todo.cantidad as cmp_maior_30_2, view_sales_detail_group_todo.id_product as cmp_maior_30_6, view_sales_detail_group_todo.unit_value as cmp_maior_30_3, view_sales_detail_group_todo.producto as cmp_maior_30_4, view_sales_detail_group_todo.uniqueid as cmp_maior_30_7, view_sales_detail_group_todo.fecha as cmp_maior_30_1, view_sales_detail_group_todo.entrada as cmp_maior_30_8, view_sales_detail_group_todo.jugador as cmp_maior_30_9, view_sales_detail_group_todo.visitante as cmp_maior_30_10, view_sales_detail_group_todo.tarjeta as cmp_maior_30_11, view_sales_detail_group_todo.tokens as cmp_maior_30_12, view_sales_detail_group_todo.minutos as cmp_maior_30_13, view_sales_detail_group_todo.comida as cmp_maior_30_14, view_sales_detail_group_todo.cuentaventa as cmp_maior_30_5, sales.id_sales as sales_id_sales, sales.sales_price as sales_sales_price, sales.sales_discount as sales_sales_discount, sales.total as sales_total, sales.datesales as sales_datesales, sales.id_status as sales_id_status, sales.idcaja as sales_idcaja, sales.idcliente as sales_idcliente, sales.cliente as sales_cliente, sales.direccion as sales_direccion, sales.telefono as sales_telefono, sales.factura as sales_factura, sales.serie as sales_serie, sales.clave_acceso as sales_clave_acceso, sales.enviosri as sales_enviosri, sales.fechaenvio as sales_fechaenvio, sales.uniqueid as sales_uniqueid, sales.estado as sales_estado, TO_DATE(TO_CHAR(sales.fechaid, 'yyyy-mm-dd hh24:mi:ss'), 'yyyy-mm-dd hh24:mi:ss'), sales.importe_recibido as sales_importe_recibido, sales.codigoid as sales_codigoid, sales.totalSinImpuestos as sales_totalsinimpuestos, sales.totalDescuento as sales_totaldescuento, sales.baseImponible as sales_baseimponible, sales.valoriva as sales_valoriva, sales.importeTotal as sales_importetotal, sales.idpago as sales_idpago, sales.totalpago as sales_totalpago, sales.cliente_email as sales_cliente_email, sales.idempleado as sales_idempleado, sales.idturno as sales_idturno, sales.facturaxml as sales_facturaxml, sales.facturaxml64 as sales_facturaxml64, sales.codpago_sri as sales_codpago_sri, sales.imprime as sales_imprime, sales.comprobante as sales_comprobante, sales.facturapdf as sales_facturapdf, customer.idcustomer as customer_idcustomer, customer.nombre as customer_nombre, customer.correo as customer_correo, customer.celular as customer_celular, customer.idinterno as customer_idinterno, customer.direccion as customer_direccion, customer.tipodoc as customer_tipodoc, customer.ult_fecha as customer_ult_fecha, unit_value*cantidad as valor from " . $this->Ini->nm_tabela; 
   } 
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix)) 
   { 
       $nmgp_select = "SELECT view_sales_detail_group_todo.cantidad as cmp_maior_30_2, view_sales_detail_group_todo.id_product as cmp_maior_30_6, view_sales_detail_group_todo.unit_value as cmp_maior_30_3, view_sales_detail_group_todo.producto as cmp_maior_30_4, view_sales_detail_group_todo.uniqueid as cmp_maior_30_7, EXTEND(view_sales_detail_group_todo.fecha, YEAR TO DAY), view_sales_detail_group_todo.entrada as cmp_maior_30_8, view_sales_detail_group_todo.jugador as cmp_maior_30_9, view_sales_detail_group_todo.visitante as cmp_maior_30_10, view_sales_detail_group_todo.tarjeta as cmp_maior_30_11, view_sales_detail_group_todo.tokens as cmp_maior_30_12, view_sales_detail_group_todo.minutos as cmp_maior_30_13, view_sales_detail_group_todo.comida as cmp_maior_30_14, view_sales_detail_group_todo.cuentaventa as cmp_maior_30_5, sales.id_sales as sales_id_sales, sales.sales_price as sales_sales_price, sales.sales_discount as sales_sales_discount, sales.total as sales_total, EXTEND(sales.datesales, YEAR TO FRACTION), sales.id_status as sales_id_status, sales.idcaja as sales_idcaja, sales.idcliente as sales_idcliente, sales.cliente as sales_cliente, sales.direccion as sales_direccion, sales.telefono as sales_telefono, sales.factura as sales_factura, sales.serie as sales_serie, sales.clave_acceso as sales_clave_acceso, sales.enviosri as sales_enviosri, EXTEND(sales.fechaenvio, YEAR TO FRACTION), sales.uniqueid as sales_uniqueid, sales.estado as sales_estado, sales.fechaid as sales_fechaid, sales.importe_recibido as sales_importe_recibido, sales.codigoid as sales_codigoid, sales.totalSinImpuestos as sales_totalsinimpuestos, sales.totalDescuento as sales_totaldescuento, sales.baseImponible as sales_baseimponible, sales.valoriva as sales_valoriva, sales.importeTotal as sales_importetotal, sales.idpago as sales_idpago, sales.totalpago as sales_totalpago, sales.cliente_email as sales_cliente_email, sales.idempleado as sales_idempleado, sales.idturno as sales_idturno, sales.facturaxml as sales_facturaxml, sales.facturaxml64 as sales_facturaxml64, sales.codpago_sri as sales_codpago_sri, sales.imprime as sales_imprime, sales.comprobante as sales_comprobante, sales.facturapdf as sales_facturapdf, customer.idcustomer as customer_idcustomer, customer.nombre as customer_nombre, customer.correo as customer_correo, customer.celular as customer_celular, customer.idinterno as customer_idinterno, customer.direccion as customer_direccion, customer.tipodoc as customer_tipodoc, EXTEND(customer.ult_fecha, YEAR TO FRACTION), unit_value*cantidad as valor from " . $this->Ini->nm_tabela; 
   } 
   else 
   { 
       $nmgp_select = "SELECT view_sales_detail_group_todo.cantidad as cmp_maior_30_2, view_sales_detail_group_todo.id_product as cmp_maior_30_6, view_sales_detail_group_todo.unit_value as cmp_maior_30_3, view_sales_detail_group_todo.producto as cmp_maior_30_4, view_sales_detail_group_todo.uniqueid as cmp_maior_30_7, view_sales_detail_group_todo.fecha as cmp_maior_30_1, view_sales_detail_group_todo.entrada as cmp_maior_30_8, view_sales_detail_group_todo.jugador as cmp_maior_30_9, view_sales_detail_group_todo.visitante as cmp_maior_30_10, view_sales_detail_group_todo.tarjeta as cmp_maior_30_11, view_sales_detail_group_todo.tokens as cmp_maior_30_12, view_sales_detail_group_todo.minutos as cmp_maior_30_13, view_sales_detail_group_todo.comida as cmp_maior_30_14, view_sales_detail_group_todo.cuentaventa as cmp_maior_30_5, sales.id_sales as sales_id_sales, sales.sales_price as sales_sales_price, sales.sales_discount as sales_sales_discount, sales.total as sales_total, sales.datesales as sales_datesales, sales.id_status as sales_id_status, sales.idcaja as sales_idcaja, sales.idcliente as sales_idcliente, sales.cliente as sales_cliente, sales.direccion as sales_direccion, sales.telefono as sales_telefono, sales.factura as sales_factura, sales.serie as sales_serie, sales.clave_acceso as sales_clave_acceso, sales.enviosri as sales_enviosri, sales.fechaenvio as sales_fechaenvio, sales.uniqueid as sales_uniqueid, sales.estado as sales_estado, sales.fechaid as sales_fechaid, sales.importe_recibido as sales_importe_recibido, sales.codigoid as sales_codigoid, sales.totalSinImpuestos as sales_totalsinimpuestos, sales.totalDescuento as sales_totaldescuento, sales.baseImponible as sales_baseimponible, sales.valoriva as sales_valoriva, sales.importeTotal as sales_importetotal, sales.idpago as sales_idpago, sales.totalpago as sales_totalpago, sales.cliente_email as sales_cliente_email, sales.idempleado as sales_idempleado, sales.idturno as sales_idturno, sales.facturaxml as sales_facturaxml, sales.facturaxml64 as sales_facturaxml64, sales.codpago_sri as sales_codpago_sri, sales.imprime as sales_imprime, sales.comprobante as sales_comprobante, sales.facturapdf as sales_facturapdf, customer.idcustomer as customer_idcustomer, customer.nombre as customer_nombre, customer.correo as customer_correo, customer.celular as customer_celular, customer.idinterno as customer_idinterno, customer.direccion as customer_direccion, customer.tipodoc as customer_tipodoc, customer.ult_fecha as customer_ult_fecha, unit_value*cantidad as valor from " . $this->Ini->nm_tabela; 
   } 
   $parms_det = explode("*PDet*", $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['chave_det']) ; 
   foreach ($parms_det as $key => $cada_par)
   {
       $parms_det[$key] = $this->Db->qstr($parms_det[$key]);
       $parms_det[$key] = substr($parms_det[$key], 1, strlen($parms_det[$key]) - 2);
   } 
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
   {
       $nmgp_select .= " where  view_sales_detail_group_todo.cantidad = $parms_det[0] and view_sales_detail_group_todo.unit_value = $parms_det[1] and view_sales_detail_group_todo.producto = '$parms_det[2]' and unit_value*cantidad = $parms_det[3] and view_sales_detail_group_todo.cuentaventa = '$parms_det[4]' and sales.idcliente = '$parms_det[5]' and sales.cliente = '$parms_det[6]' and sales.factura = $parms_det[7] and customer.nombre = '$parms_det[8]' and customer.correo = '$parms_det[9]' and customer.celular = '$parms_det[10]' and customer.direccion = '$parms_det[11]' and customer.idcustomer = '$parms_det[12]'" ;  
   } 
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
   {
       $nmgp_select .= " where  view_sales_detail_group_todo.cantidad = $parms_det[0] and view_sales_detail_group_todo.unit_value = $parms_det[1] and view_sales_detail_group_todo.producto = '$parms_det[2]' and unit_value*cantidad = $parms_det[3] and view_sales_detail_group_todo.cuentaventa = '$parms_det[4]' and sales.idcliente = '$parms_det[5]' and sales.cliente = '$parms_det[6]' and sales.factura = $parms_det[7] and customer.nombre = '$parms_det[8]' and customer.correo = '$parms_det[9]' and customer.celular = '$parms_det[10]' and customer.direccion = '$parms_det[11]' and customer.idcustomer = '$parms_det[12]'" ;  
   } 
   else 
   { 
       $nmgp_select .= " where  view_sales_detail_group_todo.cantidad = $parms_det[0] and view_sales_detail_group_todo.unit_value = $parms_det[1] and view_sales_detail_group_todo.producto = '$parms_det[2]' and unit_value*cantidad = $parms_det[3] and view_sales_detail_group_todo.cuentaventa = '$parms_det[4]' and sales.idcliente = '$parms_det[5]' and sales.cliente = '$parms_det[6]' and sales.factura = $parms_det[7] and customer.nombre = '$parms_det[8]' and customer.correo = '$parms_det[9]' and customer.celular = '$parms_det[10]' and customer.direccion = '$parms_det[11]' and customer.idcustomer = '$parms_det[12]'" ;  
   } 
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
   $rs = $this->Db->Execute($nmgp_select) ; 
   if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
   { 
       $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit ; 
   }  
   $this->view_sales_detail_group_todo_cantidad = $rs->fields[0] ;  
   $this->view_sales_detail_group_todo_cantidad = str_replace(",", ".", $this->view_sales_detail_group_todo_cantidad);
   $this->view_sales_detail_group_todo_cantidad = (string)$this->view_sales_detail_group_todo_cantidad;
   $this->view_sales_detail_group_todo_id_product = $rs->fields[1] ;  
   $this->view_sales_detail_group_todo_id_product = (string)$this->view_sales_detail_group_todo_id_product;
   $this->view_sales_detail_group_todo_unit_value = $rs->fields[2] ;  
   $this->view_sales_detail_group_todo_unit_value = str_replace(",", ".", $this->view_sales_detail_group_todo_unit_value);
   $this->view_sales_detail_group_todo_unit_value = (string)$this->view_sales_detail_group_todo_unit_value;
   $this->view_sales_detail_group_todo_producto = $rs->fields[3] ;  
   $this->view_sales_detail_group_todo_uniqueid = $rs->fields[4] ;  
   $this->view_sales_detail_group_todo_fecha = $rs->fields[5] ;  
   $this->view_sales_detail_group_todo_entrada = $rs->fields[6] ;  
   $this->view_sales_detail_group_todo_entrada = (string)$this->view_sales_detail_group_todo_entrada;
   $this->view_sales_detail_group_todo_jugador = $rs->fields[7] ;  
   $this->view_sales_detail_group_todo_jugador = (string)$this->view_sales_detail_group_todo_jugador;
   $this->view_sales_detail_group_todo_visitante = $rs->fields[8] ;  
   $this->view_sales_detail_group_todo_visitante = (string)$this->view_sales_detail_group_todo_visitante;
   $this->view_sales_detail_group_todo_tarjeta = $rs->fields[9] ;  
   $this->view_sales_detail_group_todo_tarjeta = (string)$this->view_sales_detail_group_todo_tarjeta;
   $this->view_sales_detail_group_todo_tokens = $rs->fields[10] ;  
   $this->view_sales_detail_group_todo_tokens = (string)$this->view_sales_detail_group_todo_tokens;
   $this->view_sales_detail_group_todo_minutos = $rs->fields[11] ;  
   $this->view_sales_detail_group_todo_minutos = (string)$this->view_sales_detail_group_todo_minutos;
   $this->view_sales_detail_group_todo_comida = $rs->fields[12] ;  
   $this->view_sales_detail_group_todo_comida = (string)$this->view_sales_detail_group_todo_comida;
   $this->view_sales_detail_group_todo_cuentaventa = $rs->fields[13] ;  
   $this->sales_id_sales = $rs->fields[14] ;  
   $this->sales_id_sales = (string)$this->sales_id_sales;
   $this->sales_sales_price = $rs->fields[15] ;  
   $this->sales_sales_price = str_replace(",", ".", $this->sales_sales_price);
   $this->sales_sales_price = (string)$this->sales_sales_price;
   $this->sales_sales_discount = $rs->fields[16] ;  
   $this->sales_sales_discount = str_replace(",", ".", $this->sales_sales_discount);
   $this->sales_sales_discount = (string)$this->sales_sales_discount;
   $this->sales_total = $rs->fields[17] ;  
   $this->sales_total = str_replace(",", ".", $this->sales_total);
   $this->sales_total = (string)$this->sales_total;
   $this->sales_datesales = $rs->fields[18] ;  
   $this->sales_id_status = $rs->fields[19] ;  
   $this->sales_id_status = (string)$this->sales_id_status;
   $this->sales_idcaja = $rs->fields[20] ;  
   $this->sales_idcaja = (string)$this->sales_idcaja;
   $this->sales_idcliente = $rs->fields[21] ;  
   $this->sales_cliente = $rs->fields[22] ;  
   $this->sales_direccion = $rs->fields[23] ;  
   $this->sales_telefono = $rs->fields[24] ;  
   $this->sales_factura = $rs->fields[25] ;  
   $this->sales_factura = (string)$this->sales_factura;
   $this->sales_serie = $rs->fields[26] ;  
   $this->sales_clave_acceso = $rs->fields[27] ;  
   $this->sales_enviosri = $rs->fields[28] ;  
   $this->sales_enviosri = (string)$this->sales_enviosri;
   $this->sales_fechaenvio = $rs->fields[29] ;  
   $this->sales_uniqueid = $rs->fields[30] ;  
   $this->sales_estado = $rs->fields[31] ;  
   $this->sales_estado = (string)$this->sales_estado;
   $this->sales_fechaid = $rs->fields[32] ;  
   $this->sales_importe_recibido = $rs->fields[33] ;  
   $this->sales_importe_recibido = str_replace(",", ".", $this->sales_importe_recibido);
   $this->sales_importe_recibido = (string)$this->sales_importe_recibido;
   $this->sales_codigoid = $rs->fields[34] ;  
   $this->sales_totalsinimpuestos = $rs->fields[35] ;  
   $this->sales_totalsinimpuestos = (string)$this->sales_totalsinimpuestos;
   $this->sales_totaldescuento = $rs->fields[36] ;  
   $this->sales_totaldescuento = str_replace(",", ".", $this->sales_totaldescuento);
   $this->sales_totaldescuento = (string)$this->sales_totaldescuento;
   $this->sales_baseimponible = $rs->fields[37] ;  
   $this->sales_baseimponible = (string)$this->sales_baseimponible;
   $this->sales_valoriva = $rs->fields[38] ;  
   $this->sales_valoriva = (string)$this->sales_valoriva;
   $this->sales_importetotal = $rs->fields[39] ;  
   $this->sales_importetotal = str_replace(",", ".", $this->sales_importetotal);
   $this->sales_importetotal = (string)$this->sales_importetotal;
   $this->sales_idpago = $rs->fields[40] ;  
   $this->sales_idpago = (string)$this->sales_idpago;
   $this->sales_totalpago = $rs->fields[41] ;  
   $this->sales_totalpago = str_replace(",", ".", $this->sales_totalpago);
   $this->sales_totalpago = (string)$this->sales_totalpago;
   $this->sales_cliente_email = $rs->fields[42] ;  
   $this->sales_idempleado = $rs->fields[43] ;  
   $this->sales_idturno = $rs->fields[44] ;  
   $this->sales_idturno = (string)$this->sales_idturno;
   $this->sales_facturaxml = $rs->fields[45] ;  
   $this->sales_facturaxml64 = $rs->fields[46] ;  
   $this->sales_codpago_sri = $rs->fields[47] ;  
   $this->sales_imprime = $rs->fields[48] ;  
   $this->sales_imprime = (string)$this->sales_imprime;
   $this->sales_comprobante = $rs->fields[49] ;  
   $this->sales_facturapdf = $rs->fields[50] ;  
   $this->customer_idcustomer = $rs->fields[51] ;  
   $this->customer_nombre = $rs->fields[52] ;  
   $this->customer_correo = $rs->fields[53] ;  
   $this->customer_celular = $rs->fields[54] ;  
   $this->customer_idinterno = $rs->fields[55] ;  
   $this->customer_direccion = $rs->fields[56] ;  
   $this->customer_tipodoc = $rs->fields[57] ;  
   $this->customer_ult_fecha = $rs->fields[58] ;  
   $this->valor = $rs->fields[59] ;  
   $this->valor = str_replace(",", ".", $this->valor);
   $this->valor = (string)$this->valor;
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['cmp_acum']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['cmp_acum']))
   {
       $parms_acum = explode(";", $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['cmp_acum']);
       foreach ($parms_acum as $cada_par)
       {
          $cada_val = explode("=", $cada_par);
          $this->$cada_val[0] = $cada_val[1];
       }
   }
//--- 
   $nm_saida->saida("<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.01 Transitional//EN\"\r\n");
   $nm_saida->saida("            \"http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd\">\r\n");
   $nm_saida->saida("<html" . $_SESSION['scriptcase']['reg_conf']['html_dir'] . ">\r\n");
   $nm_saida->saida("<HEAD>\r\n");
   $nm_saida->saida("   <TITLE>" . $this->Ini->Nm_lang['lang_othr_detl_title'] . " </TITLE>\r\n");
   $nm_saida->saida(" <META http-equiv=\"Content-Type\" content=\"text/html; charset=" . $_SESSION['scriptcase']['charset_html'] . "\" />\r\n");
   $nm_saida->saida(" <META http-equiv=\"Expires\" content=\"Fri, Jan 01 1900 00:00:00 GMT\"/>\r\n");
   $nm_saida->saida(" <META http-equiv=\"Last-Modified\" content=\"" . gmdate("D, d M Y H:i:s") . " GMT\"/>\r\n");
   $nm_saida->saida(" <META http-equiv=\"Cache-Control\" content=\"no-store, no-cache, must-revalidate\"/>\r\n");
   $nm_saida->saida(" <META http-equiv=\"Cache-Control\" content=\"post-check=0, pre-check=0\"/>\r\n");
   $nm_saida->saida(" <META http-equiv=\"Pragma\" content=\"no-cache\"/>\r\n");
   $nm_saida->saida(" <link rel=\"shortcut icon\" href=\"../_lib/img/scriptcase__NM__ico__NM__favicon.ico\">\r\n");
   if ($_SESSION['scriptcase']['proc_mobile'])
   {
       $nm_saida->saida(" <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0\" />\r\n");
   }

           $nm_saida->saida("   <script type=\"text/javascript\" src=\"grid_detail_sales_todo_jquery-3.6.0.min.js\"></script>\r\n");
           $nm_saida->saida("   <script type=\"text/javascript\" src=\"grid_detail_sales_todo_ajax.js\"></script>\r\n");
           $nm_saida->saida("   <script type=\"text/javascript\" src=\"grid_detail_sales_todo_message.js\"></script>\r\n");
           $nm_saida->saida("   <script type=\"text/javascript\">\r\n");
           $nm_saida->saida("     var applicationKeys = '';\r\n");
           $nm_saida->saida("     applicationKeys += 'alt+q';\r\n");
           $nm_saida->saida("     applicationKeys += ',';\r\n");
           $nm_saida->saida("     applicationKeys += 'alt+p';\r\n");
           $nm_saida->saida("     applicationKeys += ',';\r\n");
           $nm_saida->saida("     applicationKeys += 'ctrl+p';\r\n");
           $nm_saida->saida("     applicationKeys += ',';\r\n");
           $nm_saida->saida("     applicationKeys += 'f1';\r\n");
           $nm_saida->saida("     applicationKeys += ',';\r\n");
           $nm_saida->saida("     applicationKeys += 'alt+shift+p';\r\n");
           $nm_saida->saida("     applicationKeys += ',';\r\n");
           $nm_saida->saida("     applicationKeys += 'alt+shift+h';\r\n");
           $nm_saida->saida("     var hotkeyList = '';\r\n");
           $nm_saida->saida("     function execHotKey(e, h) {\r\n");
           $nm_saida->saida("         var hotkey_fired = false\r\n");
           $nm_saida->saida("         switch (true) {\r\n");
           $nm_saida->saida("             case (['alt+q'].indexOf(h.key) > -1):\r\n");
           $nm_saida->saida("                 hotkey_fired = process_hotkeys('sys_format_sai');\r\n");
           $nm_saida->saida("                 break;\r\n");
           $nm_saida->saida("             case (['alt+p'].indexOf(h.key) > -1):\r\n");
           $nm_saida->saida("                 hotkey_fired = process_hotkeys('sys_format_pdf');\r\n");
           $nm_saida->saida("                 break;\r\n");
           $nm_saida->saida("             case (['ctrl+p'].indexOf(h.key) > -1):\r\n");
           $nm_saida->saida("                 hotkey_fired = process_hotkeys('sys_format_imp');\r\n");
           $nm_saida->saida("                 break;\r\n");
           $nm_saida->saida("             case (['f1'].indexOf(h.key) > -1):\r\n");
           $nm_saida->saida("                 hotkey_fired = process_hotkeys('sys_format_webh');\r\n");
           $nm_saida->saida("                 break;\r\n");
           $nm_saida->saida("             case (['alt+shift+p'].indexOf(h.key) > -1):\r\n");
           $nm_saida->saida("                 hotkey_fired = process_hotkeys('sys_format_email_pdf');\r\n");
           $nm_saida->saida("                 break;\r\n");
           $nm_saida->saida("             case (['alt+shift+h'].indexOf(h.key) > -1):\r\n");
           $nm_saida->saida("                 hotkey_fired = process_hotkeys('sys_format_email_html');\r\n");
           $nm_saida->saida("                 break;\r\n");
           $nm_saida->saida("         }\r\n");
           $nm_saida->saida("         if (hotkey_fired) {\r\n");
           $nm_saida->saida("             e.preventDefault();\r\n");
           $nm_saida->saida("             return false;\r\n");
           $nm_saida->saida("         } else {\r\n");
           $nm_saida->saida("             return true;\r\n");
           $nm_saida->saida("         }\r\n");
           $nm_saida->saida("     }\r\n");
           $nm_saida->saida("   </script>\r\n");
           $nm_saida->saida("   <script type=\"text/javascript\" src=\"../_lib/lib/js/hotkeys.inc.js\"></script>\r\n");
           $nm_saida->saida("   <script type=\"text/javascript\" src=\"../_lib/lib/js/hotkeys_setup.js\"></script>\r\n");
   $nm_saida->saida(" <script type=\"text/javascript\" src=\"../_lib/lib/js/jquery-3.6.0.min.js\"></script>\r\n");
           $nm_saida->saida("   <link rel=\"stylesheet\" type=\"text/css\" href=\"" . $this->Ini->path_prod . "/third/jquery_plugin/viewerjs/viewer.css\" />\r\n");
           $nm_saida->saida("   <script type=\"text/javascript\" src=\"" . $this->Ini->path_prod . "/third/jquery_plugin/viewerjs/viewer.js\"></script>\r\n");
$nm_saida->saida("<script>\r\n");
$nm_saida->saida("function ajax_check_file(img_name, field , i , p, p_cache){\r\n");
$nm_saida->saida("    $(document).ready(function(){\r\n");
$nm_saida->saida("        $('#id_sc_field_'+ field +'_'+i+'> img').attr('src', '" . $this->Ini->path_icones . "/ scriptcase__NM__ajax_load.gif');\r\n");
$nm_saida->saida("        $('#id_sc_field_'+ field +'_'+i+' > a > img').attr('src', '" . $this->Ini->path_icones . "/scriptcase__NM__ajax_load.gif');\r\n");
$nm_saida->saida("        $('#id_sc_field_'+ field +'_'+i+' > span > a > img').attr('src', '" . $this->Ini->path_icones . "/scriptcase__NM__ajax_load.gif');\r\n");
$nm_saida->saida("    var rs =$.ajax({\r\n");
$nm_saida->saida("                type: \"POST\",\r\n");
$nm_saida->saida("                url: 'index.php?script_case_init=" . $this->Ini->sc_page . "',\r\n");
$nm_saida->saida("                async: true,\r\n");
$nm_saida->saida("                data: 'nmgp_opcao=ajax_check_file&AjaxCheckImg=' + img_name +'&rsargs='+ field + '&p='+ p + '&p_cache='+ p_cache,\r\n");
$nm_saida->saida("            }).done(function (rs) {\r\n");
$nm_saida->saida("                    if(rs.indexOf('</span>') != -1){\r\n");
$nm_saida->saida("                        rs = rs.substr(rs.indexOf('</span>')  + 7);\r\n");
$nm_saida->saida("                    }\r\n");
$nm_saida->saida("                    if (rs != 0) {\r\n");
$nm_saida->saida("                        rs = rs.trim();\r\n");
$nm_saida->saida("                        if( $('.css_'+field+'_det_line a img').length > 0){\r\n");
$nm_saida->saida("                            $('.css_'+field+'_det_line a img').attr('src', rs.split('_@@NM@@_')[1]);\r\n");
$nm_saida->saida("                            var __tmp = $('.css_'+field+'_det_line a').attr('href').split(\"',\")\r\n");
$nm_saida->saida("                            __tmp[0] = \"javascript:nm_mostra_img('\" + rs.split('_@@NM@@_')[0];\r\n");
$nm_saida->saida("                            $('.css_'+field+'_det_line a').attr('href',__tmp.join(\"',\"));\r\n");
$nm_saida->saida("                        }else if($('.css_'+field+'_det_line a').length > 0){\r\n");
$nm_saida->saida("                            var __tmp = $('.css_'+field+'_det_line a').attr('href').split(\"',\");\r\n");
$nm_saida->saida("                            var __file_doc = __tmp[0].split('@SC_par@');\r\n");
$nm_saida->saida("                            var ___file_doc = __file_doc[3].split(\"'\");\r\n");
$nm_saida->saida("                            ___file_doc[0] = rs.split('_@@NM@@_')[1];\r\n");
$nm_saida->saida("                            __file_doc[3] = ___file_doc.join(\"'\");\r\n");
$nm_saida->saida("                            __tmp[0] = __file_doc.join('@SC_par@');\r\n");
$nm_saida->saida("                            $('.css_'+field+'_det_line a').attr('href', __tmp.join(\"',\"));\r\n");
$nm_saida->saida("                        }\r\n");
$nm_saida->saida("                    }\r\n");
$nm_saida->saida("                });\r\n");
$nm_saida->saida("    });\r\n");
$nm_saida->saida("}\r\n");
$nm_saida->saida("</script>\r\n");
   $nm_saida->saida(" <script type=\"text/javascript\" src=\"" . $this->Ini->path_prod . "/third/jquery_plugin/malsup-blockui/jquery.blockUI.js\"></script>\r\n");
           $nm_saida->saida(" <script type=\"text/javascript\">\r\n");
           $nm_saida->saida("  var sc_pathToTB = '" . $this->Ini->path_prod . "/third/jquery_plugin/thickbox/';\r\n");
           $nm_saida->saida("  var sc_tbLangClose = \"" . html_entity_decode($this->Ini->Nm_lang['lang_tb_close'], ENT_COMPAT, $_SESSION['scriptcase']['charset']) . "\";\r\n");
           $nm_saida->saida("  var sc_tbLangEsc = \"" . html_entity_decode($this->Ini->Nm_lang['lang_tb_esc'], ENT_COMPAT, $_SESSION['scriptcase']['charset']) . "\";\r\n");
           $nm_saida->saida(" </script>\r\n");
   $nm_saida->saida(" <script type=\"text/javascript\" src=\"" . $this->Ini->path_prod . "/third/jquery_plugin/thickbox/thickbox-compressed.js\"></script>\r\n");
           $nm_saida->saida("   <script type=\"text/javascript\">\r\n");
           $nm_saida->saida("     var sc_ajaxBg = '" . $this->Ini->Color_bg_ajax . "';\r\n");
           $nm_saida->saida("     var sc_ajaxBordC = '" . $this->Ini->Border_c_ajax . "';\r\n");
           $nm_saida->saida("     var sc_ajaxBordS = '" . $this->Ini->Border_s_ajax . "';\r\n");
           $nm_saida->saida("     var sc_ajaxBordW = '" . $this->Ini->Border_w_ajax . "';\r\n");
           $nm_saida->saida("   </script>\r\n");
   $nm_saida->saida(" <link rel=\"stylesheet\" href=\"" . $this->Ini->path_prod . "/third/jquery_plugin/thickbox/thickbox.css\" type=\"text/css\" media=\"screen\" />\r\n");
   if (($this->Ini->sc_export_ajax || $this->Ini->Export_det_zip) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['det_print'] == "print")
   {
       if (strtoupper($nmgp_cor_print) == "PB")
       {
           $NM_css_file = $this->Ini->str_schema_all . "_grid_bw.css";
           $NM_css_dir  = $this->Ini->str_schema_all . "_grid_bw" . $_SESSION['scriptcase']['reg_conf']['css_dir'] . ".css";
       }
       else
       {
           $NM_css_file = $this->Ini->str_schema_all . "_grid.css";
           $NM_css_dir  = $this->Ini->str_schema_all . "_grid" . $_SESSION['scriptcase']['reg_conf']['css_dir'] . ".css";
       }
       $NM_css_cmp  = $this->Ini->path_link . "grid_detail_sales_todo/grid_detail_sales_todo_det_" . strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) . ".css";
       $nm_saida->saida("  <style type=\"text/css\">\r\n");
       if (is_file($this->Ini->path_css . $NM_css_file))
       {
           $NM_css_attr = file($this->Ini->path_css . $NM_css_file);
           foreach ($NM_css_attr as $NM_line_css)
           {
               $nm_saida->saida(" " . $NM_line_css . " \r\n");
           }
       }
       if (is_file($this->Ini->path_css . $NM_css_dir))
       {
           $NM_css_attr = file($this->Ini->path_css . $NM_css_dir);
           foreach ($NM_css_attr as $NM_line_css)
           {
               $nm_saida->saida(" " . $NM_line_css . " \r\n");
           }
       }
       if (is_file($this->Ini->root . $NM_css_cmp))
       {
           $NM_css_attr = file($this->Ini->root . $NM_css_cmp);
           foreach ($NM_css_attr as $NM_line_css)
           {
               $nm_saida->saida(" " . $NM_line_css . " \r\n");
           }
       }
       $nm_saida->saida("  </style>\r\n");
   }
   elseif (($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['det_print'] == "print" && strtoupper($nmgp_cor_print) == "PB") || $nmgp_tipo_pdf == "pb")
   {
       $nm_saida->saida(" <link rel=\"stylesheet\" type=\"text/css\" href=\"" . $this->Ini->path_link . "_lib/css/" . $this->Ini->str_schema_all . "_grid_bw.css\" /> \r\n");
       $nm_saida->saida(" <link rel=\"stylesheet\" type=\"text/css\" href=\"" . $this->Ini->path_link . "_lib/css/" . $this->Ini->str_schema_all . "_grid_bw" . $_SESSION['scriptcase']['reg_conf']['css_dir'] . ".css\" /> \r\n");
       $nm_saida->saida(" <link rel=\"stylesheet\" type=\"text/css\" href=\"" . $this->Ini->path_link . "grid_detail_sales_todo/grid_detail_sales_todo_det_" . strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) . ".css\" />\r\n");
   }
   else
   {
       $nm_saida->saida(" <link rel=\"stylesheet\" type=\"text/css\" href=\"" . $this->Ini->path_link . "_lib/css/" . $this->Ini->str_schema_all . "_grid.css\" /> \r\n");
       $nm_saida->saida(" <link rel=\"stylesheet\" type=\"text/css\" href=\"" . $this->Ini->path_link . "_lib/css/" . $this->Ini->str_schema_all . "_grid" . $_SESSION['scriptcase']['reg_conf']['css_dir'] . ".css\" /> \r\n");
       $nm_saida->saida(" <link rel=\"stylesheet\" type=\"text/css\" href=\"" . $this->Ini->path_link . "grid_detail_sales_todo/grid_detail_sales_todo_det_" . strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) . ".css\" />\r\n");
   }
       $nm_saida->saida(" <link rel=\"stylesheet\" href=\"" . $this->Ini->path_prod . "/third/font-awesome/css/all.min.css\" type=\"text/css\" media=\"screen\" />\r\n");
   if(isset($this->Ini->str_google_fonts) && !empty($this->Ini->str_google_fonts)) 
   { 
       $nm_saida->saida(" <link href=\"" . $this->Ini->str_google_fonts . "\" rel=\"stylesheet\" /> \r\n");
   } 
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['pdf_det'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['det_print'] != "print")
   {
       $nm_saida->saida(" <link rel=\"stylesheet\" type=\"text/css\" href=\"../_lib/buttons/" . $this->Ini->Str_btn_css . "\" /> \r\n");
       $nm_saida->saida(" <link rel=\"stylesheet\" href=\"../_lib/css/" . $_SESSION['scriptcase']['erro']['str_schema'] . "\" type=\"text/css\" media=\"screen\" />\r\n");
       $nm_saida->saida(" <link rel=\"stylesheet\" href=\"../_lib/css/" . $_SESSION['scriptcase']['erro']['str_schema_dir'] . "\" type=\"text/css\" media=\"screen\" />\r\n");
   }
   $nm_saida->saida("</HEAD>\r\n");
    $removeMargin = isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['link_info']['remove_margin']) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['link_info']['remove_margin'] ? 'margin: 0;' : '';
    $removeBorder = isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['link_info']['remove_border']) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['link_info']['remove_border'] ? 'border-width: 0' : '';
   if (!$this->Ini->Export_html_zip && !$this->Ini->Export_det_zip && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['det_print'] == "print")
   {
       $nm_saida->saida(" <link rel=\"stylesheet\" type=\"text/css\" href=\"../_lib/buttons/" . $this->Ini->Str_btn_css . "\" /> \r\n");
       $nm_saida->saida("  <body id=\"grid_detail\" class=\"scGridPage\"  style=\"-webkit-print-color-adjust: exact;" . $removeMargin . "\">\r\n");
       $nm_saida->saida("   <TABLE id=\"sc_table_print\" cellspacing=0 cellpadding=0 align=\"center\" valign=\"top\" >\r\n");
       $nm_saida->saida("     <TR>\r\n");
       $nm_saida->saida("       <TD>\r\n");
       $Cod_Btn = nmButtonOutput($this->arr_buttons, "bprint", "prit_web_page()", "prit_web_page()", "Bprint_print", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
       $nm_saida->saida("           $Cod_Btn \r\n");
       $nm_saida->saida("       </TD>\r\n");
       $nm_saida->saida("     </TR>\r\n");
       $nm_saida->saida("   </TABLE>\r\n");
       $nm_saida->saida("  <script type=\"text/javascript\">\r\n");
       $nm_saida->saida("     function prit_web_page()\r\n");
       $nm_saida->saida("     {\r\n");
       $nm_saida->saida("        document.getElementById('sc_table_print').style.display = 'none';\r\n");
       $nm_saida->saida("        var is_safari = navigator.userAgent.indexOf(\"Safari\") > -1;\r\n");
       $nm_saida->saida("        var is_chrome = navigator.userAgent.indexOf('Chrome') > -1\r\n");
       $nm_saida->saida("        if ((is_chrome) && (is_safari)) {is_safari=false;}\r\n");
       $nm_saida->saida("        window.print();\r\n");
       $nm_saida->saida("        if (is_safari) {setTimeout(\"window.close()\", 1000);} else {window.close();}\r\n");
       $nm_saida->saida("     }\r\n");
       $nm_saida->saida("  </script>\r\n");
   }
   else
   {
       $nm_saida->saida("  <body id=\"grid_detail\" class=\"scGridPage\" style=\"" . $removeMargin . "\">\r\n");
   }
   $nm_saida->saida("  " . $this->Ini->Ajax_result_set . "\r\n");
           $nm_saida->saida("  <div id=\"id_div_process\" style=\"display: none; margin: 10px; whitespace: nowrap\" class=\"scFormProcessFixed\"><span class=\"scFormProcess\"><img border=\"0\" src=\"" . $this->Ini->path_icones . "/scriptcase__NM__ajax_load.gif\" align=\"absmiddle\" />&nbsp;" . $this->Ini->Nm_lang['lang_othr_prcs'] . "...</span></div>\r\n");
           $nm_saida->saida("  <div id=\"id_div_process_block\" style=\"display: none; margin: 10px; whitespace: nowrap\"><span class=\"scFormProcess\"><img border=\"0\" src=\"" . $this->Ini->path_icones . "/scriptcase__NM__ajax_load.gif\" align=\"absmiddle\" />&nbsp;" . $this->Ini->Nm_lang['lang_othr_prcs'] . "...</span></div>\r\n");
   $nm_saida->saida("<table border=0 align=\"center\" valign=\"top\" ><tr><td style=\"padding: 0px\"><div class=\"scGridBorder\" style=\"" . $removeBorder . "\"><table width='100%' cellspacing=0 cellpadding=0><tr><td>\r\n");
   if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['link_info']['compact_mode']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['link_info']['compact_mode']) {
   $nm_saida->saida("<tr><td class=\"scGridTabelaTd scGridPage\">\r\n");
   $nm_saida->saida("<style>\r\n");
   $nm_saida->saida("    .scMenuTHeaderFont img, .scGridHeaderFont img , .scFormHeaderFont img , .scTabHeaderFont img , .scContainerHeaderFont img , .scFilterHeaderFont img { height:23px;}\r\n");
   $nm_saida->saida("</style>\r\n");
   $nm_saida->saida("<div class=\"scGridHeader\" style=\"height: 54px; padding: 17px 15px; box-sizing: border-box;margin: -1px 0px 0px 0px;width: 100%;\">\r\n");
   $nm_saida->saida("    <div class=\"scGridHeaderFont\" style=\"float: left; text-transform: uppercase;\"></div>\r\n");
   $nm_saida->saida("    <div class=\"scGridHeaderFont\" style=\"float: right;\"></div>\r\n");
   $nm_saida->saida("</div>\r\n");
   $nm_saida->saida("  </TD>\r\n");
   $nm_saida->saida(" </TR>\r\n");
   }
   if(isset($_SESSION['scriptcase']['proc_mobile']) && $_SESSION['scriptcase']['proc_mobile'])
   {
       $this->nmgp_barra_det_top_mobile();
   }
   else
   {
       $this->nmgp_barra_det_top_normal();
   }
   $nm_saida->saida("<tr><td class=\"scGridTabelaTd\" id='idDetailTable'>\r\n");
   $nm_saida->saida("<TABLE style=\"padding: 0px; spacing: 0px; border-width: 0px;\" class=\"scGridTabela\" align=\"center\" valign=\"top\" width=\"100%\">\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['view_sales_detail_group_todo_cantidad'])) ? $this->New_label['view_sales_detail_group_todo_cantidad'] : "Cantidad"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->view_sales_detail_group_todo_cantidad))); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "0", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'view_sales_detail_group_todo_cantidad', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'view_sales_detail_group_todo_cantidad', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_view_sales_detail_group_todo_cantidad_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_view_sales_detail_group_todo_cantidad_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['view_sales_detail_group_todo_id_product'])) ? $this->New_label['view_sales_detail_group_todo_id_product'] : "Id Product"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->view_sales_detail_group_todo_id_product))); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'view_sales_detail_group_todo_id_product', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'view_sales_detail_group_todo_id_product', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_view_sales_detail_group_todo_id_product_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_view_sales_detail_group_todo_id_product_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['view_sales_detail_group_todo_unit_value'])) ? $this->New_label['view_sales_detail_group_todo_unit_value'] : "Unit Value"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->view_sales_detail_group_todo_unit_value))); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'view_sales_detail_group_todo_unit_value', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'view_sales_detail_group_todo_unit_value', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_view_sales_detail_group_todo_unit_value_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_view_sales_detail_group_todo_unit_value_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['view_sales_detail_group_todo_producto'])) ? $this->New_label['view_sales_detail_group_todo_producto'] : "Producto"; 
   $conteudo = trim(sc_strip_script($this->view_sales_detail_group_todo_producto)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'view_sales_detail_group_todo_producto', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'view_sales_detail_group_todo_producto', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_view_sales_detail_group_todo_producto_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_view_sales_detail_group_todo_producto_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['view_sales_detail_group_todo_uniqueid'])) ? $this->New_label['view_sales_detail_group_todo_uniqueid'] : "Uniqueid"; 
   $conteudo = trim(sc_strip_script($this->view_sales_detail_group_todo_uniqueid)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'view_sales_detail_group_todo_uniqueid', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'view_sales_detail_group_todo_uniqueid', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_view_sales_detail_group_todo_uniqueid_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_view_sales_detail_group_todo_uniqueid_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['view_sales_detail_group_todo_fecha'])) ? $this->New_label['view_sales_detail_group_todo_fecha'] : "Fecha"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->view_sales_detail_group_todo_fecha))); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
               $conteudo_x =  $conteudo;
               nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD");
               if (is_numeric($conteudo_x) && $conteudo_x > 0) 
               { 
                   $this->nm_data->SetaData($conteudo, "YYYY-MM-DD");
                   $conteudo = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DT", "ddmmaaaa"));
               } 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'view_sales_detail_group_todo_fecha', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'view_sales_detail_group_todo_fecha', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_view_sales_detail_group_todo_fecha_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_view_sales_detail_group_todo_fecha_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['view_sales_detail_group_todo_entrada'])) ? $this->New_label['view_sales_detail_group_todo_entrada'] : "Entrada"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->view_sales_detail_group_todo_entrada))); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'view_sales_detail_group_todo_entrada', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'view_sales_detail_group_todo_entrada', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_view_sales_detail_group_todo_entrada_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_view_sales_detail_group_todo_entrada_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['view_sales_detail_group_todo_jugador'])) ? $this->New_label['view_sales_detail_group_todo_jugador'] : "Jugador"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->view_sales_detail_group_todo_jugador))); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'view_sales_detail_group_todo_jugador', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'view_sales_detail_group_todo_jugador', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_view_sales_detail_group_todo_jugador_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_view_sales_detail_group_todo_jugador_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['view_sales_detail_group_todo_visitante'])) ? $this->New_label['view_sales_detail_group_todo_visitante'] : "Visitante"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->view_sales_detail_group_todo_visitante))); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'view_sales_detail_group_todo_visitante', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'view_sales_detail_group_todo_visitante', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_view_sales_detail_group_todo_visitante_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_view_sales_detail_group_todo_visitante_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['view_sales_detail_group_todo_tarjeta'])) ? $this->New_label['view_sales_detail_group_todo_tarjeta'] : "Tarjeta"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->view_sales_detail_group_todo_tarjeta))); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'view_sales_detail_group_todo_tarjeta', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'view_sales_detail_group_todo_tarjeta', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_view_sales_detail_group_todo_tarjeta_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_view_sales_detail_group_todo_tarjeta_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['view_sales_detail_group_todo_tokens'])) ? $this->New_label['view_sales_detail_group_todo_tokens'] : "Tokens"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->view_sales_detail_group_todo_tokens))); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'view_sales_detail_group_todo_tokens', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'view_sales_detail_group_todo_tokens', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_view_sales_detail_group_todo_tokens_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_view_sales_detail_group_todo_tokens_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['view_sales_detail_group_todo_minutos'])) ? $this->New_label['view_sales_detail_group_todo_minutos'] : "Minutos"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->view_sales_detail_group_todo_minutos))); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'view_sales_detail_group_todo_minutos', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'view_sales_detail_group_todo_minutos', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_view_sales_detail_group_todo_minutos_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_view_sales_detail_group_todo_minutos_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['view_sales_detail_group_todo_comida'])) ? $this->New_label['view_sales_detail_group_todo_comida'] : "Comida"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->view_sales_detail_group_todo_comida))); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'view_sales_detail_group_todo_comida', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'view_sales_detail_group_todo_comida', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_view_sales_detail_group_todo_comida_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_view_sales_detail_group_todo_comida_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['view_sales_detail_group_todo_cuentaventa'])) ? $this->New_label['view_sales_detail_group_todo_cuentaventa'] : "Cuentaventa"; 
   $conteudo = trim(sc_strip_script($this->view_sales_detail_group_todo_cuentaventa)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'view_sales_detail_group_todo_cuentaventa', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'view_sales_detail_group_todo_cuentaventa', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_view_sales_detail_group_todo_cuentaventa_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_view_sales_detail_group_todo_cuentaventa_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['sales_id_sales'])) ? $this->New_label['sales_id_sales'] : "Id Sales"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->sales_id_sales))); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'sales_id_sales', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'sales_id_sales', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_sales_id_sales_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_sales_id_sales_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['sales_sales_price'])) ? $this->New_label['sales_sales_price'] : "Sales Price"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->sales_sales_price))); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'sales_sales_price', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'sales_sales_price', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_sales_sales_price_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_sales_sales_price_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['sales_sales_discount'])) ? $this->New_label['sales_sales_discount'] : "Sales Discount"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->sales_sales_discount))); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'sales_sales_discount', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'sales_sales_discount', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_sales_sales_discount_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_sales_sales_discount_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['sales_total'])) ? $this->New_label['sales_total'] : "Total"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->sales_total))); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'sales_total', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'sales_total', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_sales_total_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_sales_total_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['sales_datesales'])) ? $this->New_label['sales_datesales'] : "Datesales"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->sales_datesales))); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
               if (substr($conteudo, 10, 1) == "-") 
               { 
                  $conteudo = substr($conteudo, 0, 10) . " " . substr($conteudo, 11);
               } 
               if (substr($conteudo, 13, 1) == ".") 
               { 
                  $conteudo = substr($conteudo, 0, 13) . ":" . substr($conteudo, 14, 2) . ":" . substr($conteudo, 17);
               } 
               $conteudo_x =  $conteudo;
               nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD HH:II:SS");
               if (is_numeric($conteudo_x) && $conteudo_x > 0) 
               { 
                   $this->nm_data->SetaData($conteudo, "YYYY-MM-DD HH:II:SS");
                   $conteudo = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DH", "ddmmaaaa;hhiiss"));
               } 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'sales_datesales', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'sales_datesales', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_sales_datesales_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_sales_datesales_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['sales_id_status'])) ? $this->New_label['sales_id_status'] : "Id Status"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->sales_id_status))); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'sales_id_status', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'sales_id_status', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_sales_id_status_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_sales_id_status_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['sales_idcaja'])) ? $this->New_label['sales_idcaja'] : "Idcaja"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->sales_idcaja))); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'sales_idcaja', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'sales_idcaja', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_sales_idcaja_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_sales_idcaja_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['sales_idcliente'])) ? $this->New_label['sales_idcliente'] : "Idcliente"; 
   $conteudo = trim(sc_strip_script($this->sales_idcliente)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'sales_idcliente', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'sales_idcliente', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_sales_idcliente_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_sales_idcliente_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['sales_cliente'])) ? $this->New_label['sales_cliente'] : "Cliente"; 
   $conteudo = trim(sc_strip_script($this->sales_cliente)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'sales_cliente', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'sales_cliente', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_sales_cliente_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_sales_cliente_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['sales_direccion'])) ? $this->New_label['sales_direccion'] : "Direccion"; 
   $conteudo = trim(sc_strip_script($this->sales_direccion)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'sales_direccion', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'sales_direccion', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_sales_direccion_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_sales_direccion_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['sales_telefono'])) ? $this->New_label['sales_telefono'] : "Telefono"; 
   $conteudo = trim(sc_strip_script($this->sales_telefono)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'sales_telefono', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'sales_telefono', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_sales_telefono_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_sales_telefono_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['sales_factura'])) ? $this->New_label['sales_factura'] : "Factura"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->sales_factura))); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'sales_factura', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'sales_factura', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_sales_factura_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_sales_factura_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['sales_serie'])) ? $this->New_label['sales_serie'] : "Serie"; 
   $conteudo = trim(sc_strip_script($this->sales_serie)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'sales_serie', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'sales_serie', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_sales_serie_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_sales_serie_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['sales_clave_acceso'])) ? $this->New_label['sales_clave_acceso'] : "Clave Acceso"; 
   $conteudo = trim(sc_strip_script($this->sales_clave_acceso)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'sales_clave_acceso', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'sales_clave_acceso', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_sales_clave_acceso_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_sales_clave_acceso_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['sales_enviosri'])) ? $this->New_label['sales_enviosri'] : "Enviosri"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->sales_enviosri))); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'sales_enviosri', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'sales_enviosri', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_sales_enviosri_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_sales_enviosri_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['sales_fechaenvio'])) ? $this->New_label['sales_fechaenvio'] : "Fechaenvio"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->sales_fechaenvio))); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
               if (substr($conteudo, 10, 1) == "-") 
               { 
                  $conteudo = substr($conteudo, 0, 10) . " " . substr($conteudo, 11);
               } 
               if (substr($conteudo, 13, 1) == ".") 
               { 
                  $conteudo = substr($conteudo, 0, 13) . ":" . substr($conteudo, 14, 2) . ":" . substr($conteudo, 17);
               } 
               $conteudo_x =  $conteudo;
               nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD HH:II:SS");
               if (is_numeric($conteudo_x) && $conteudo_x > 0) 
               { 
                   $this->nm_data->SetaData($conteudo, "YYYY-MM-DD HH:II:SS");
                   $conteudo = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DH", "ddmmaaaa;hhiiss"));
               } 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'sales_fechaenvio', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'sales_fechaenvio', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_sales_fechaenvio_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_sales_fechaenvio_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['sales_uniqueid'])) ? $this->New_label['sales_uniqueid'] : "Uniqueid"; 
   $conteudo = trim(sc_strip_script($this->sales_uniqueid)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'sales_uniqueid', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'sales_uniqueid', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_sales_uniqueid_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_sales_uniqueid_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['sales_estado'])) ? $this->New_label['sales_estado'] : "Estado"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->sales_estado))); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'sales_estado', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'sales_estado', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_sales_estado_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_sales_estado_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['sales_fechaid'])) ? $this->New_label['sales_fechaid'] : "Fechaid"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->sales_fechaid))); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
               if (substr($conteudo, 10, 1) == "-") 
               { 
                  $conteudo = substr($conteudo, 0, 10) . " " . substr($conteudo, 11);
               } 
               if (substr($conteudo, 13, 1) == ".") 
               { 
                  $conteudo = substr($conteudo, 0, 13) . ":" . substr($conteudo, 14, 2) . ":" . substr($conteudo, 17);
               } 
               $conteudo_x =  $conteudo;
               nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD HH:II:SS");
               if (is_numeric($conteudo_x) && $conteudo_x > 0) 
               { 
                   $this->nm_data->SetaData($conteudo, "YYYY-MM-DD HH:II:SS");
                   $conteudo = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DH", "ddmmaaaa;hhiiss"));
               } 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'sales_fechaid', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'sales_fechaid', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_sales_fechaid_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_sales_fechaid_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['sales_importe_recibido'])) ? $this->New_label['sales_importe_recibido'] : "Importe Recibido"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->sales_importe_recibido))); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'sales_importe_recibido', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'sales_importe_recibido', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_sales_importe_recibido_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_sales_importe_recibido_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['sales_codigoid'])) ? $this->New_label['sales_codigoid'] : "Codigoid"; 
   $conteudo = trim(sc_strip_script($this->sales_codigoid)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'sales_codigoid', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'sales_codigoid', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_sales_codigoid_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_sales_codigoid_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['sales_totalsinimpuestos'])) ? $this->New_label['sales_totalsinimpuestos'] : "Total Sin Impuestos"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->sales_totalsinimpuestos))); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "4", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'sales_totalsinimpuestos', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'sales_totalsinimpuestos', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_sales_totalsinimpuestos_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_sales_totalsinimpuestos_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['sales_totaldescuento'])) ? $this->New_label['sales_totaldescuento'] : "Total Descuento"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->sales_totaldescuento))); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'sales_totaldescuento', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'sales_totaldescuento', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_sales_totaldescuento_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_sales_totaldescuento_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['sales_baseimponible'])) ? $this->New_label['sales_baseimponible'] : "Base Imponible"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->sales_baseimponible))); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "4", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'sales_baseimponible', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'sales_baseimponible', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_sales_baseimponible_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_sales_baseimponible_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['sales_valoriva'])) ? $this->New_label['sales_valoriva'] : "Valoriva"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->sales_valoriva))); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "4", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'sales_valoriva', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'sales_valoriva', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_sales_valoriva_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_sales_valoriva_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['sales_importetotal'])) ? $this->New_label['sales_importetotal'] : "Importe Total"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->sales_importetotal))); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'sales_importetotal', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'sales_importetotal', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_sales_importetotal_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_sales_importetotal_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['sales_idpago'])) ? $this->New_label['sales_idpago'] : "Idpago"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->sales_idpago))); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'sales_idpago', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'sales_idpago', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_sales_idpago_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_sales_idpago_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['sales_totalpago'])) ? $this->New_label['sales_totalpago'] : "Totalpago"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->sales_totalpago))); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'sales_totalpago', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'sales_totalpago', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_sales_totalpago_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_sales_totalpago_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['sales_cliente_email'])) ? $this->New_label['sales_cliente_email'] : "Cliente Email"; 
   $conteudo = trim(sc_strip_script($this->sales_cliente_email)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'sales_cliente_email', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'sales_cliente_email', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_sales_cliente_email_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_sales_cliente_email_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['sales_idempleado'])) ? $this->New_label['sales_idempleado'] : "Idempleado"; 
   $conteudo = trim(sc_strip_script($this->sales_idempleado)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'sales_idempleado', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'sales_idempleado', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_sales_idempleado_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_sales_idempleado_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['sales_idturno'])) ? $this->New_label['sales_idturno'] : "Idturno"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->sales_idturno))); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'sales_idturno', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'sales_idturno', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_sales_idturno_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_sales_idturno_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['sales_facturaxml'])) ? $this->New_label['sales_facturaxml'] : "Facturaxml"; 
   $conteudo = trim(sc_strip_script($this->sales_facturaxml)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'sales_facturaxml', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'sales_facturaxml', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_sales_facturaxml_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_sales_facturaxml_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['sales_facturaxml64'])) ? $this->New_label['sales_facturaxml64'] : "Facturaxml 64"; 
   $conteudo = trim(sc_strip_script($this->sales_facturaxml64)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'sales_facturaxml64', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'sales_facturaxml64', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_sales_facturaxml64_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_sales_facturaxml64_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['sales_codpago_sri'])) ? $this->New_label['sales_codpago_sri'] : "Codpago Sri"; 
   $conteudo = trim(sc_strip_script($this->sales_codpago_sri)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'sales_codpago_sri', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'sales_codpago_sri', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_sales_codpago_sri_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_sales_codpago_sri_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['sales_imprime'])) ? $this->New_label['sales_imprime'] : "Imprime"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->sales_imprime))); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'sales_imprime', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'sales_imprime', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_sales_imprime_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_sales_imprime_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['sales_comprobante'])) ? $this->New_label['sales_comprobante'] : "Comprobante"; 
   $conteudo = trim(sc_strip_script($this->sales_comprobante)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'sales_comprobante', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'sales_comprobante', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_sales_comprobante_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_sales_comprobante_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['sales_facturapdf'])) ? $this->New_label['sales_facturapdf'] : "Facturapdf"; 
   $conteudo = trim(sc_strip_script($this->sales_facturapdf)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'sales_facturapdf', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'sales_facturapdf', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_sales_facturapdf_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_sales_facturapdf_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['customer_idcustomer'])) ? $this->New_label['customer_idcustomer'] : "Idcustomer"; 
   $conteudo = trim(sc_strip_script($this->customer_idcustomer)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'customer_idcustomer', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'customer_idcustomer', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_customer_idcustomer_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_customer_idcustomer_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['customer_nombre'])) ? $this->New_label['customer_nombre'] : "Nombre"; 
   $conteudo = trim(sc_strip_script($this->customer_nombre)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'customer_nombre', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'customer_nombre', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_customer_nombre_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_customer_nombre_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['customer_correo'])) ? $this->New_label['customer_correo'] : "Correo"; 
   $conteudo = trim(sc_strip_script($this->customer_correo)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'customer_correo', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'customer_correo', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_customer_correo_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_customer_correo_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['customer_celular'])) ? $this->New_label['customer_celular'] : "Celular"; 
   $conteudo = trim(sc_strip_script($this->customer_celular)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'customer_celular', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'customer_celular', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_customer_celular_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_customer_celular_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['customer_idinterno'])) ? $this->New_label['customer_idinterno'] : "Idinterno"; 
   $conteudo = trim(sc_strip_script($this->customer_idinterno)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'customer_idinterno', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'customer_idinterno', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_customer_idinterno_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_customer_idinterno_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['customer_direccion'])) ? $this->New_label['customer_direccion'] : "Direccion"; 
   $conteudo = trim(sc_strip_script($this->customer_direccion)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'customer_direccion', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'customer_direccion', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_customer_direccion_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_customer_direccion_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['customer_tipodoc'])) ? $this->New_label['customer_tipodoc'] : "Tipodoc"; 
   $conteudo = trim(sc_strip_script($this->customer_tipodoc)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'customer_tipodoc', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'customer_tipodoc', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_customer_tipodoc_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_customer_tipodoc_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['customer_ult_fecha'])) ? $this->New_label['customer_ult_fecha'] : "Ult Fecha"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->customer_ult_fecha))); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
               if (substr($conteudo, 10, 1) == "-") 
               { 
                  $conteudo = substr($conteudo, 0, 10) . " " . substr($conteudo, 11);
               } 
               if (substr($conteudo, 13, 1) == ".") 
               { 
                  $conteudo = substr($conteudo, 0, 13) . ":" . substr($conteudo, 14, 2) . ":" . substr($conteudo, 17);
               } 
               $conteudo_x =  $conteudo;
               nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD HH:II:SS");
               if (is_numeric($conteudo_x) && $conteudo_x > 0) 
               { 
                   $this->nm_data->SetaData($conteudo, "YYYY-MM-DD HH:II:SS");
                   $conteudo = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DH", "ddmmaaaa;hhiiss"));
               } 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'customer_ult_fecha', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'customer_ult_fecha', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_customer_ult_fecha_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_customer_ult_fecha_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['valor'])) ? $this->New_label['valor'] : "Valor"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->valor))); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'valor', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'valor', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_valor_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_valor_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("</TABLE>\r\n");
   if(isset($_SESSION['scriptcase']['proc_mobile']) && $_SESSION['scriptcase']['proc_mobile'])
   {
   }
   $rs->Close(); 
   if (!$_SESSION['scriptcase']['proc_mobile']) {
       $nm_saida->saida("  </td>\r\n");
       $nm_saida->saida(" </tr>\r\n");
       $nm_saida->saida(" </table>\r\n");
       $nm_saida->saida(" </div>\r\n");
       $nm_saida->saida("  </td>\r\n");
       $nm_saida->saida(" </tr>\r\n");
       $nm_saida->saida(" </table>\r\n");
   }
   if (!$_SESSION['scriptcase']['proc_mobile']) {
       $nm_saida->saida("  </td>\r\n");
       $nm_saida->saida(" </tr>\r\n");
       $nm_saida->saida(" </table>\r\n");
       $nm_saida->saida(" </div>\r\n");
       $nm_saida->saida("  </td>\r\n");
       $nm_saida->saida(" </tr>\r\n");
       $nm_saida->saida(" </table>\r\n");
   }
   if ($_SESSION['scriptcase']['proc_mobile']) {
       $nm_saida->saida("  </td>\r\n");
       $nm_saida->saida(" </tr>\r\n");
       $nm_saida->saida(" </table>\r\n");
       $nm_saida->saida(" </div>\r\n");
       $nm_saida->saida("  </td>\r\n");
       $nm_saida->saida(" </tr>\r\n");
       $nm_saida->saida(" </table>\r\n");
   }
//--- 
//--- 
   $nm_saida->saida("<form name=\"F3\" method=post\r\n");
   $nm_saida->saida("                  target=\"_self\"\r\n");
   $nm_saida->saida("                  action=\"./\">\r\n");
   $nm_saida->saida("<input type=hidden name=\"nmgp_opcao\" value=\"igual\"/>\r\n");
   $nm_saida->saida("<input type=hidden name=\"script_case_init\" value=\"" . NM_encode_input($this->Ini->sc_page) . "\"/>\r\n");
   $nm_saida->saida("</form>\r\n");
   $nm_saida->saida("<form name=\"F6\" method=\"post\" \r\n");
   $nm_saida->saida("                  action=\"./\" \r\n");
   $nm_saida->saida("                  target=\"_self\" style=\"display: none\"> \r\n");
   $nm_saida->saida(" <input type=\"hidden\" name=\"script_case_init\" value=\"" . NM_encode_input($this->Ini->sc_page) . "\"/> \r\n");
   $nm_saida->saida("</form> \r\n");
   $nm_saida->saida("<form name=\"Fprint\" method=\"post\" \r\n");
   $nm_saida->saida("                  action=\"grid_detail_sales_todo_iframe_prt.php\" \r\n");
   $nm_saida->saida("                  target=\"jan_print\" style=\"display: none\"> \r\n");
   $nm_saida->saida(" <input type=\"hidden\" name=\"path_botoes\" value=\"" . $this->Ini->path_botoes . "\"/> \r\n");
   $nm_saida->saida(" <input type=\"hidden\" name=\"opcao\" value=\"det_print\"/>\r\n");
   $nm_saida->saida(" <input type=\"hidden\" name=\"nmgp_opcao\" value=\"det_print\"/>\r\n");
   $nm_saida->saida(" <input type=\"hidden\" name=\"cor_print\" value=\"CO\"/>\r\n");
   $nm_saida->saida(" <input type=\"hidden\" name=\"nmgp_cor_print\" value=\"CO\"/>\r\n");
   $nm_saida->saida(" <input type=\"hidden\" name=\"nmgp_password\" value=\"\"/>\r\n");
   $nm_saida->saida(" <input type=\"hidden\" name=\"script_case_init\" value=\"" . NM_encode_input($this->Ini->sc_page) . "\"/> \r\n");
   $nm_saida->saida("</form> \r\n");
   $nm_saida->saida("<script language=JavaScript>\r\n");
   $nm_saida->saida("   $(function(){ \r\n");
   $nm_saida->saida("       NM_btn_disable();\r\n");
   $nm_saida->saida("   }); \r\n");
   $nm_saida->saida("   function nm_submit_modal(parms, t_parent) \r\n");
   $nm_saida->saida("   { \r\n");
   $nm_saida->saida("      if (t_parent == 'S' && typeof parent.tb_show == 'function')\r\n");
   $nm_saida->saida("      { \r\n");
   $nm_saida->saida("           parent.tb_show('', parms, '');\r\n");
   $nm_saida->saida("      } \r\n");
   $nm_saida->saida("      else\r\n");
   $nm_saida->saida("      { \r\n");
   $nm_saida->saida("         tb_show('', parms, '');\r\n");
   $nm_saida->saida("      } \r\n");
   $nm_saida->saida("   } \r\n");
   $nm_saida->saida("   function nm_move(tipo) \r\n");
   $nm_saida->saida("   { \r\n");
   $nm_saida->saida("      document.F6.target = \"_self\"; \r\n");
   $nm_saida->saida("      document.F6.submit() ;\r\n");
   $nm_saida->saida("      return;\r\n");
   $nm_saida->saida("   } \r\n");
   $nm_saida->saida("   function nm_mostra_doc(campo1)\r\n");
   $nm_saida->saida("   {\r\n");
   $nm_saida->saida("       NovaJanela = window.open (\"grid_detail_sales_todo_doc.php?nmgp_parms=\" + campo1, \"ScriptCase\", \"resizable\");\r\n");
   $nm_saida->saida("   }\r\n");
   $nm_saida->saida("   function nm_gp_move(x, y, z, p, g, crt, ajax, chart_level, page_break_pdf, SC_module_export, use_pass_pdf, pdf_all_cab, pdf_all_label, pdf_label_group, pdf_zip) \r\n");
   $nm_saida->saida("   {\r\n");
   $nm_saida->saida("       if (\"pdf_det\" == x && \"S\" == ajax)\r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("           $('#TB_window').remove();\r\n");
   $nm_saida->saida("           $('body').append(\"<div id='TB_window'></div>\");\r\n");
   $nm_saida->saida("               nm_submit_modal(\"" . $this->Ini->path_link . "grid_detail_sales_todo/grid_detail_sales_todo_export_email.php?script_case_init={$this->Ini->sc_page}&path_img={$this->Ini->path_img_global}&path_btn={$this->Ini->path_botoes}&sType=pdf_det&sAdd=__E__nmgp_tipo_pdf=\" + z + \"__E__sc_parms_pdf=\" + p + \"__E__sc_create_charts=\" + crt + \"__E__sc_graf_pdf=\" + g + \"__E__chart_level=\" + chart_level + \"__E__Det_use_pass_pdf=\" + use_pass_pdf + \"__E__Det_pdf_zip=\" + pdf_zip + \"&nm_opc=pdf_det&KeepThis=true&TB_iframe=true&modal=true\", '');\r\n");
   $nm_saida->saida("       }\r\n");
   $nm_saida->saida("       else\r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("           window.location = \"" . $this->Ini->path_link . "grid_detail_sales_todo/index.php?nmgp_opcao=pdf_det&nmgp_tipo_pdf=\" + z + \"&nmgp_parms_pdf=\" + p +  \"&nmgp_graf_pdf=\" + g + \"&Det_use_pass_pdf=\" + use_pass_pdf + \"&Det_pdf_zip=\" + pdf_zip + \"&script_case_init=" . NM_encode_input($this->Ini->sc_page) . "\";\r\n");
   $nm_saida->saida("       }\r\n");
   $nm_saida->saida("   }\r\n");
   $nm_saida->saida("   function nm_gp_print_conf(tp, cor, res_cons, password, ajax, str_type, bol_param)\r\n");
   $nm_saida->saida("   {\r\n");
   $nm_saida->saida("       if (\"D\" == ajax)\r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("           $('#TB_window').remove();\r\n");
   $nm_saida->saida("           $('body').append(\"<div id='TB_window'></div>\");\r\n");
   $nm_saida->saida("               nm_submit_modal(\"" . $this->Ini->path_link . "grid_detail_sales_todo/grid_detail_sales_todo_export_email.php?script_case_init={$this->Ini->sc_page}&path_img={$this->Ini->path_img_global}&path_btn={$this->Ini->path_botoes}&sType=\"+ str_type +\"&sAdd=__E__nmgp_tipo_print=\" + tp + \"__E__nmgp_cor_print=\" + cor + \"&KeepThis=true&TB_iframe=true&modal=true\", bol_param);\r\n");
   $nm_saida->saida("       }\r\n");
   $nm_saida->saida("       else\r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("          document.Fprint.nmgp_password.value = password;\r\n");
   $nm_saida->saida("          document.Fprint.cor_print.value = cor;\r\n");
   $nm_saida->saida("          document.Fprint.nmgp_cor_print.value = cor;\r\n");
   $nm_saida->saida("          if (password != \"\")\r\n");
   $nm_saida->saida("          {\r\n");
   $nm_saida->saida("              document.Fprint.action=\"./\";\r\n");
   $nm_saida->saida("              document.Fprint.target=\"_self\";\r\n");
   $nm_saida->saida("          }\r\n");
   $nm_saida->saida("          else\r\n");
   $nm_saida->saida("          {\r\n");
   $nm_saida->saida("              window.open('','jan_print','location=no,menubar=no,resizable,scrollbars,status=no,toolbar=no');\r\n");
   $nm_saida->saida("          }\r\n");
   $nm_saida->saida("          document.Fprint.submit() ;\r\n");
   $nm_saida->saida("      }\r\n");
   $nm_saida->saida("   }\r\n");
   $nm_saida->saida("   function process_hotkeys(hotkey)\r\n");
   $nm_saida->saida("   {\r\n");
   $nm_saida->saida("   return false;\r\n");
   $nm_saida->saida("   }\r\n");
   $nm_saida->saida("   function NM_btn_disable()\r\n");
   $nm_saida->saida("   {\r\n");
   foreach ($this->nm_btn_disabled as $cod_btn => $st_btn) {
      if (isset($this->nm_btn_exist[$cod_btn]) && $st_btn == 'on') {
         foreach ($this->nm_btn_exist[$cod_btn] as $cada_id) {
           $nm_saida->saida("     $('#" . $cada_id . "').prop('onclick', null).off('click').addClass('disabled').removeAttr('href');\r\n");
         }
      }
   }
   $nm_saida->saida("   }\r\n");
   $nm_saida->saida("</script>\r\n");
   $nm_saida->saida("</body>\r\n");
   $nm_saida->saida("</html>\r\n");
 }
   function nmgp_barra_det_top_normal()
   {
      global $nm_saida;
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['det_print'] != "print" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['pdf_det']) 
   { 
       $nm_saida->saida("   <tr  id=\"obj_barra_top\"><td class=\"scGridTabelaTd\">\r\n");
       $nm_saida->saida("    <table class=\"scGridToolbar\" style=\"padding: 0px; border-spacing: 0px; border-width: 0px; vertical-align: top;\" valign=\"top\" width=\"100%\"><tr>\r\n");
       $nm_saida->saida("     <td class=\"scGridToolbarPadding\" nowrap valign=\"middle\" align=\"left\" width=\"33%\">\r\n");
       $nm_saida->saida("         </td> \r\n");
       $nm_saida->saida("          <td class=\"scGridToolbarPadding\" nowrap valign=\"middle\" align=\"center\" width=\"33%\"> \r\n");
       if ($this->nmgp_botoes['det_pdf'] == "on")
       {
         $this->nm_btn_exist['det_pdf'][] = "Dpdf_top";
         $Cod_Btn = nmButtonOutput($this->arr_buttons, "bpdf", "", "", "Dpdf_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "thickbox", "" . $this->Ini->path_link . "grid_detail_sales_todo/grid_detail_sales_todo_config_pdf.php?nm_opc=pdf_det&nm_target=0&nm_cor=cor&papel=8&orientacao=1&largura=1200&conf_larg=S&conf_fonte=10&language=es&conf_socor=N&sc_ver_93=" . s . "&password=n&pdf_zip=N&KeepThis=false&TB_iframe=true&modal=true", "", "only_text", "text_right", "", "", "", "", "", "", "");
         $nm_saida->saida("           $Cod_Btn \r\n");
       }
       if ($this->nmgp_botoes['det_print'] == "on")
       {
         $this->nm_btn_exist['det_print'][] = "Dprint_top";
         $Cod_Btn = nmButtonOutput($this->arr_buttons, "bprint", "", "", "Dprint_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "thickbox", "" . $this->Ini->path_link . "grid_detail_sales_todo/grid_detail_sales_todo_config_print.php?nm_opc=detalhe&nm_cor=CO&password=n&language=es&KeepThis=true&TB_iframe=true&modal=true", "", "only_text", "text_right", "", "", "", "", "", "", "");
         $nm_saida->saida("           $Cod_Btn \r\n");
       }
         $this->nm_btn_exist['det_exit'][] = "sc_b_sai_top";
       $Cod_Btn = nmButtonOutput($this->arr_buttons, "bvoltar", "document.F3.submit();", "document.F3.submit();", "sc_b_sai_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
       if ($_SESSION['scriptcase']['proc_mobile']) {
           $Cod_Btn = nmButtonOutput($this->arr_buttons, "bsair", "self.parent.tb_remove();", "self.parent.tb_remove();", "sc_b_sai_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
       }
       $nm_saida->saida("           $Cod_Btn \r\n");
       $nm_saida->saida("         </td> \r\n");
       $nm_saida->saida("          <td class=\"scGridToolbarPadding\" nowrap valign=\"middle\" align=\"right\" width=\"33%\"> \r\n");
       $nm_saida->saida("     </td>\r\n");
       $nm_saida->saida("    </tr></table>\r\n");
       $nm_saida->saida("   </td></tr>\r\n");
   } 
   }
   function nmgp_barra_det_top_mobile()
   {
      global $nm_saida;
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['det_print'] != "print" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['pdf_det']) 
   { 
       $nm_saida->saida("   <tr  id=\"obj_barra_top\"><td class=\"scGridTabelaTd\">\r\n");
       $nm_saida->saida("    <table class=\"scGridToolbar\" style=\"padding: 0px; border-spacing: 0px; border-width: 0px; vertical-align: top;\" valign=\"top\" width=\"100%\"><tr>\r\n");
       $nm_saida->saida("     <td class=\"scGridToolbarPadding\" nowrap valign=\"middle\" align=\"left\" width=\"33%\">\r\n");
       if ($this->nmgp_botoes['det_pdf'] == "on")
       {
         $this->nm_btn_exist['det_pdf'][] = "Dpdf_top";
         $Cod_Btn = nmButtonOutput($this->arr_buttons, "bpdf", "", "", "Dpdf_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "thickbox", "" . $this->Ini->path_link . "grid_detail_sales_todo/grid_detail_sales_todo_config_pdf.php?nm_opc=pdf_det&nm_target=0&nm_cor=cor&papel=8&orientacao=1&largura=1200&conf_larg=S&conf_fonte=10&language=es&conf_socor=N&sc_ver_93=" . s . "&password=n&pdf_zip=N&KeepThis=false&TB_iframe=true&modal=true", "", "only_text", "text_right", "", "", "", "", "", "", "");
         $nm_saida->saida("           $Cod_Btn \r\n");
       }
       if ($this->nmgp_botoes['det_print'] == "on")
       {
         $this->nm_btn_exist['det_print'][] = "Dprint_top";
         $Cod_Btn = nmButtonOutput($this->arr_buttons, "bprint", "", "", "Dprint_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "thickbox", "" . $this->Ini->path_link . "grid_detail_sales_todo/grid_detail_sales_todo_config_print.php?nm_opc=detalhe&nm_cor=CO&password=n&language=es&KeepThis=true&TB_iframe=true&modal=true", "", "only_text", "text_right", "", "", "", "", "", "", "");
         $nm_saida->saida("           $Cod_Btn \r\n");
       }
         $this->nm_btn_exist['det_exit'][] = "sc_b_sai_top";
       $Cod_Btn = nmButtonOutput($this->arr_buttons, "bvoltar", "document.F3.submit();", "document.F3.submit();", "sc_b_sai_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
       if ($_SESSION['scriptcase']['proc_mobile']) {
           $Cod_Btn = nmButtonOutput($this->arr_buttons, "bsair", "self.parent.tb_remove();", "self.parent.tb_remove();", "sc_b_sai_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
       }
       $nm_saida->saida("           $Cod_Btn \r\n");
       $nm_saida->saida("     </td>\r\n");
       $nm_saida->saida("    </tr></table>\r\n");
       $nm_saida->saida("   </td></tr>\r\n");
   } 
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
}
