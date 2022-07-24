<?php
class pdfreport_sales_grid
{
   var $Ini;
   var $Erro;
   var $Pdf;
   var $Db;
   var $rs_grid;
   var $nm_grid_sem_reg;
   var $SC_seq_register;
   var $nm_location;
   var $nm_data;
   var $nm_cod_barra;
   var $sc_proc_grid; 
   var $nmgp_botoes = array();
   var $Campos_Mens_erro;
   var $NM_raiz_img; 
   var $Font_ttf; 
   var $lineas = array();
   var $lineas_id_sales_detail = array();
   var $lineas_id_sales = array();
   var $lineas_unit_cost = array();
   var $lineas_unit_value = array();
   var $lineas_quantity = array();
   var $lineas_discount = array();
   var $lineas_item_total = array();
   var $lineas_id_product = array();
   var $id_sales = array();
   var $sales_price = array();
   var $sales_discount = array();
   var $total = array();
   var $datesales = array();
   var $id_status = array();
   var $idcaja = array();
   var $idcliente = array();
   var $cliente = array();
   var $direccion = array();
   var $telefono = array();
   var $factura = array();
   var $serie = array();
   var $clave_acceso = array();
   var $enviosri = array();
   var $fechaenvio = array();
//--- 
 function monta_grid($linhas = 0)
 {

   clearstatcache();
   $this->inicializa();
   $this->grid();
 }
//--- 
 function inicializa()
 {
   global $nm_saida, 
   $rec, $nmgp_chave, $nmgp_opcao, $nmgp_ordem, $nmgp_chave_det, 
   $nmgp_quant_linhas, $nmgp_quant_colunas, $nmgp_url_saida, $nmgp_parms;
//
   $this->nm_data = new nm_data("es");
   include_once("../_lib/lib/php/nm_font_tcpdf.php");
   $this->default_font = '';
   $this->default_font_sr  = '';
   $this->default_style    = '';
   $this->default_style_sr = 'B';
   $Tp_papel = "A4";
   $old_dir = getcwd();
   $File_font_ttf     = "";
   $temp_font_ttf     = "";
   $this->Font_ttf    = false;
   $this->Font_ttf_sr = false;
   if (empty($this->default_font) && isset($arr_font_tcpdf[$this->Ini->str_lang]))
   {
       $this->default_font = $arr_font_tcpdf[$this->Ini->str_lang];
   }
   elseif (empty($this->default_font))
   {
       $this->default_font = "Times";
   }
   if (empty($this->default_font_sr) && isset($arr_font_tcpdf[$this->Ini->str_lang]))
   {
       $this->default_font_sr = $arr_font_tcpdf[$this->Ini->str_lang];
   }
   elseif (empty($this->default_font_sr))
   {
       $this->default_font_sr = "Times";
   }
   $_SESSION['scriptcase']['pdfreport_sales']['default_font'] = $this->default_font;
   chdir($this->Ini->path_third . "/tcpdf/");
   include_once("tcpdf.php");
   chdir($old_dir);
   $this->Pdf = new TCPDF('P', 'mm', $Tp_papel, true, 'UTF-8', false);
   $this->Pdf->setPrintHeader(false);
   $this->Pdf->setPrintFooter(false);
   if (!empty($File_font_ttf))
   {
       $this->Pdf->addTTFfont($File_font_ttf, "", "", 32, $_SESSION['scriptcase']['dir_temp'] . "/");
   }
   $this->Pdf->SetDisplayMode('real');
   $this->aba_iframe = false;
   if (isset($_SESSION['scriptcase']['sc_aba_iframe']))
   {
       foreach ($_SESSION['scriptcase']['sc_aba_iframe'] as $aba => $apls_aba)
       {
           if (in_array("pdfreport_sales", $apls_aba))
           {
               $this->aba_iframe = true;
               break;
           }
       }
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_sales']['iframe_menu'] && (!isset($_SESSION['scriptcase']['menu_mobile']) || empty($_SESSION['scriptcase']['menu_mobile'])))
   {
       $this->aba_iframe = true;
   }
   $this->nmgp_botoes['exit'] = "on";
   $this->sc_proc_grid = false; 
   $this->NM_raiz_img = $this->Ini->root;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
   $this->nm_where_dinamico = "";
   $this->nm_grid_colunas = 0;
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_sales']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_sales']['campos_busca']))
   { 
       $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_sales']['campos_busca'];
       if ($_SESSION['scriptcase']['charset'] != "UTF-8")
       {
           $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
       }
       $this->id_sales[0] = $Busca_temp['id_sales']; 
       $tmp_pos = strpos($this->id_sales[0], "##@@");
       if ($tmp_pos !== false && !is_array($this->id_sales[0]))
       {
           $this->id_sales[0] = substr($this->id_sales[0], 0, $tmp_pos);
       }
       $this->sales_price[0] = $Busca_temp['sales_price']; 
       $tmp_pos = strpos($this->sales_price[0], "##@@");
       if ($tmp_pos !== false && !is_array($this->sales_price[0]))
       {
           $this->sales_price[0] = substr($this->sales_price[0], 0, $tmp_pos);
       }
       $this->sales_discount[0] = $Busca_temp['sales_discount']; 
       $tmp_pos = strpos($this->sales_discount[0], "##@@");
       if ($tmp_pos !== false && !is_array($this->sales_discount[0]))
       {
           $this->sales_discount[0] = substr($this->sales_discount[0], 0, $tmp_pos);
       }
       $this->total[0] = $Busca_temp['total']; 
       $tmp_pos = strpos($this->total[0], "##@@");
       if ($tmp_pos !== false && !is_array($this->total[0]))
       {
           $this->total[0] = substr($this->total[0], 0, $tmp_pos);
       }
       $this->fechaenvio[0] = $Busca_temp['fechaenvio']; 
       $tmp_pos = strpos($this->fechaenvio[0], "##@@");
       if ($tmp_pos !== false && !is_array($this->fechaenvio[0]))
       {
           $this->fechaenvio[0] = substr($this->fechaenvio[0], 0, $tmp_pos);
       }
       $fechaenvio_2 = $Busca_temp['fechaenvio_input_2']; 
       $this->fechaenvio_2 = $Busca_temp['fechaenvio_input_2']; 
   } 
   else 
   { 
       $this->fechaenvio_2 = ""; 
   } 
   $this->nm_field_dinamico = array();
   $this->nm_order_dinamico = array();
   $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_sales']['where_orig'];
   $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_sales']['where_pesq'];
   $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_sales']['where_pesq_filtro'];
   $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
   $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
   $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
   $_SESSION['scriptcase']['contr_link_emb'] = $this->nm_location;
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_sales']['qt_col_grid'] = 1 ;  
   if (isset($_SESSION['scriptcase']['sc_apl_conf']['pdfreport_sales']['cols']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['pdfreport_sales']['cols']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_sales']['qt_col_grid'] = $_SESSION['scriptcase']['sc_apl_conf']['pdfreport_sales']['cols'];  
       unset($_SESSION['scriptcase']['sc_apl_conf']['pdfreport_sales']['cols']);
   }
   if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_sales']['ordem_select']))  
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_sales']['ordem_select'] = array(); 
   } 
   if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_sales']['ordem_quebra']))  
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_sales']['ordem_grid'] = "" ; 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_sales']['ordem_ant']  = ""; 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_sales']['ordem_desc'] = "" ; 
   }   
   if (!empty($nmgp_parms) && $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_sales']['opcao'] != "pdf")   
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_sales']['opcao'] = "igual";
       $rec = "ini";
   }
   if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_sales']['where_orig']) || $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_sales']['prim_cons'] || !empty($nmgp_parms))  
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_sales']['prim_cons'] = false;  
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_sales']['where_orig'] = " where id_sales=" . $_SESSION['idsale'] . "";  
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_sales']['where_pesq']        = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_sales']['where_orig'];  
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_sales']['where_pesq_ant']    = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_sales']['where_orig'];  
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_sales']['cond_pesq']         = ""; 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_sales']['where_pesq_filtro'] = "";
   }   
   if  (!empty($this->nm_where_dinamico)) 
   {   
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_sales']['where_pesq'] .= $this->nm_where_dinamico;
   }   
   $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_sales']['where_orig'];
   $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_sales']['where_pesq'];
   $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_sales']['where_pesq_filtro'];
//
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_sales']['tot_geral'][1])) 
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_sales']['sc_total'] = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_sales']['tot_geral'][1] ;  
   }
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_sales']['where_pesq_ant'] = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_sales']['where_pesq'];  
//----- 
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
   { 
       $nmgp_select = "SELECT id_sales, sales_price, sales_discount, total, str_replace (convert(char(10),datesales,102), '.', '-') + ' ' + convert(char(8),datesales,20), id_status, idcaja, idcliente, cliente, direccion, telefono, factura, serie, clave_acceso, enviosri, str_replace (convert(char(10),fechaenvio,102), '.', '-') + ' ' + convert(char(8),fechaenvio,20) from " . $this->Ini->nm_tabela; 
   } 
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
   { 
       $nmgp_select = "SELECT id_sales, sales_price, sales_discount, total, datesales, id_status, idcaja, idcliente, cliente, direccion, telefono, factura, serie, clave_acceso, enviosri, fechaenvio from " . $this->Ini->nm_tabela; 
   } 
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
   { 
       $nmgp_select = "SELECT id_sales, sales_price, sales_discount, total, convert(char(23),datesales,121), id_status, idcaja, idcliente, cliente, direccion, telefono, factura, serie, clave_acceso, enviosri, convert(char(23),fechaenvio,121) from " . $this->Ini->nm_tabela; 
   } 
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
   { 
       $nmgp_select = "SELECT id_sales, sales_price, sales_discount, total, datesales, id_status, idcaja, idcliente, cliente, direccion, telefono, factura, serie, clave_acceso, enviosri, fechaenvio from " . $this->Ini->nm_tabela; 
   } 
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
   { 
       $nmgp_select = "SELECT id_sales, sales_price, sales_discount, total, EXTEND(datesales, YEAR TO FRACTION), id_status, idcaja, idcliente, cliente, direccion, telefono, factura, serie, clave_acceso, enviosri, EXTEND(fechaenvio, YEAR TO FRACTION) from " . $this->Ini->nm_tabela; 
   } 
   else 
   { 
       $nmgp_select = "SELECT id_sales, sales_price, sales_discount, total, datesales, id_status, idcaja, idcliente, cliente, direccion, telefono, factura, serie, clave_acceso, enviosri, fechaenvio from " . $this->Ini->nm_tabela; 
   } 
   $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_sales']['where_pesq']; 
   $nmgp_order_by = ""; 
   $campos_order_select = "";
   foreach($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_sales']['ordem_select'] as $campo => $ordem) 
   {
        if ($campo != $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_sales']['ordem_grid']) 
        {
           if (!empty($campos_order_select)) 
           {
               $campos_order_select .= ", ";
           }
           $campos_order_select .= $campo . " " . $ordem;
        }
   }
   if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_sales']['ordem_grid'])) 
   { 
       $nmgp_order_by = " order by " . $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_sales']['ordem_grid'] . $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_sales']['ordem_desc']; 
   } 
   if (!empty($campos_order_select)) 
   { 
       if (!empty($nmgp_order_by)) 
       { 
          $nmgp_order_by .= ", " . $campos_order_select; 
       } 
       else 
       { 
          $nmgp_order_by = " order by $campos_order_select"; 
       } 
   } 
   $nmgp_select .= $nmgp_order_by; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_sales']['order_grid'] = $nmgp_order_by;
   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
   $this->rs_grid = $this->Db->Execute($nmgp_select) ; 
   if ($this->rs_grid === false && !$this->rs_grid->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
   { 
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit ; 
   }  
   if ($this->rs_grid->EOF || ($this->rs_grid === false && $GLOBALS["NM_ERRO_IBASE"] == 1)) 
   { 
       $this->nm_grid_sem_reg = $this->SC_conv_utf8($this->Ini->Nm_lang['lang_errm_empt']); 
   }  
// 
 }  
// 
 function Pdf_init()
 {
     if ($_SESSION['scriptcase']['reg_conf']['css_dir'] == "RTL")
     {
         $this->Pdf->setRTL(true);
     }
     $this->Pdf->setHeaderMargin(0);
     $this->Pdf->setFooterMargin(0);
     if ($this->Font_ttf)
     {
         $this->Pdf->SetFont($this->default_font, $this->default_style, 12, $this->def_TTF);
     }
     else
     {
         $this->Pdf->SetFont($this->default_font, $this->default_style, 12);
     }
     $this->Pdf->SetTextColor(0, 0, 0);
 }
// 
//----- 
 function grid($linhas = 0)
 {
    global 
           $nm_saida, $nm_url_saida;
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_sales']['labels']['id_sales'] = "Id Sales";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_sales']['labels']['sales_price'] = "Sales Price";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_sales']['labels']['sales_discount'] = "Sales Discount";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_sales']['labels']['total'] = "Total";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_sales']['labels']['datesales'] = "Datesales";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_sales']['labels']['id_status'] = "Id Status";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_sales']['labels']['idcaja'] = "Idcaja";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_sales']['labels']['idcliente'] = "Idcliente";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_sales']['labels']['cliente'] = "Cliente";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_sales']['labels']['direccion'] = "Direccion";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_sales']['labels']['telefono'] = "Telefono";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_sales']['labels']['factura'] = "Factura";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_sales']['labels']['serie'] = "Serie";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_sales']['labels']['clave_acceso'] = "Clave Acceso";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_sales']['labels']['enviosri'] = "Enviosri";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_sales']['labels']['fechaenvio'] = "Fechaenvio";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_sales']['labels']['lineas'] = "lineas";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_sales']['labels']['lineas_id_sales_detail'] = "Id Sales Detail";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_sales']['labels']['lineas_id_sales'] = "Id Sales";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_sales']['labels']['lineas_unit_cost'] = "Unit Cost";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_sales']['labels']['lineas_unit_value'] = "Unit Value";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_sales']['labels']['lineas_quantity'] = "Quantity";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_sales']['labels']['lineas_discount'] = "Discount";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_sales']['labels']['lineas_item_total'] = "Item Total";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_sales']['labels']['lineas_id_product'] = "Id Product";
   $HTTP_REFERER = (isset($_SERVER['HTTP_REFERER'])) ? $_SERVER['HTTP_REFERER'] : ""; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_sales']['seq_dir'] = 0; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_sales']['sub_dir'] = array(); 
   $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_sales']['where_orig'];
   $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_sales']['where_pesq'];
   $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_sales']['where_pesq_filtro'];
   if (isset($_SESSION['scriptcase']['sc_apl_conf']['pdfreport_sales']['lig_edit']) && $_SESSION['scriptcase']['sc_apl_conf']['pdfreport_sales']['lig_edit'] != '')
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_sales']['mostra_edit'] = $_SESSION['scriptcase']['sc_apl_conf']['pdfreport_sales']['lig_edit'];
   }
   if (!empty($this->nm_grid_sem_reg))
   {
       $this->Pdf_init();
       $this->Pdf->AddPage();
       if ($this->Font_ttf_sr)
       {
           $this->Pdf->SetFont($this->default_font_sr, 'B', 12, $this->def_TTF);
       }
       else
       {
           $this->Pdf->SetFont($this->default_font_sr, 'B', 12);
       }
       $this->Pdf->Text(0.000000, 0.000000, html_entity_decode($this->nm_grid_sem_reg, ENT_COMPAT, $_SESSION['scriptcase']['charset']));
       $this->Pdf->Output($this->Ini->root . $this->Ini->nm_path_pdf, 'F');
       return;
   }
// 
   $Init_Pdf = true;
   $this->SC_seq_register = 0; 
   while (!$this->rs_grid->EOF) 
   {  
      $this->nm_grid_colunas = 0; 
      $nm_quant_linhas = 0;
      $this->Pdf->setImageScale(1.33);
      $this->Pdf->AddPage();
      $this->Pdf_init();
      while (!$this->rs_grid->EOF && $nm_quant_linhas < $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_sales']['qt_col_grid']) 
      {  
          $this->sc_proc_grid = true;
          $this->SC_seq_register++; 
          $this->id_sales[$this->nm_grid_colunas] = $this->rs_grid->fields[0] ;  
          $this->id_sales[$this->nm_grid_colunas] = (string)$this->id_sales[$this->nm_grid_colunas];
          $this->sales_price[$this->nm_grid_colunas] = $this->rs_grid->fields[1] ;  
          $this->sales_price[$this->nm_grid_colunas] =  str_replace(",", ".", $this->sales_price[$this->nm_grid_colunas]);
          $this->sales_price[$this->nm_grid_colunas] = (string)$this->sales_price[$this->nm_grid_colunas];
          $this->sales_discount[$this->nm_grid_colunas] = $this->rs_grid->fields[2] ;  
          $this->sales_discount[$this->nm_grid_colunas] =  str_replace(",", ".", $this->sales_discount[$this->nm_grid_colunas]);
          $this->sales_discount[$this->nm_grid_colunas] = (string)$this->sales_discount[$this->nm_grid_colunas];
          $this->total[$this->nm_grid_colunas] = $this->rs_grid->fields[3] ;  
          $this->total[$this->nm_grid_colunas] =  str_replace(",", ".", $this->total[$this->nm_grid_colunas]);
          $this->total[$this->nm_grid_colunas] = (string)$this->total[$this->nm_grid_colunas];
          $this->datesales[$this->nm_grid_colunas] = $this->rs_grid->fields[4] ;  
          $this->id_status[$this->nm_grid_colunas] = $this->rs_grid->fields[5] ;  
          $this->id_status[$this->nm_grid_colunas] = (string)$this->id_status[$this->nm_grid_colunas];
          $this->idcaja[$this->nm_grid_colunas] = $this->rs_grid->fields[6] ;  
          $this->idcaja[$this->nm_grid_colunas] = (string)$this->idcaja[$this->nm_grid_colunas];
          $this->idcliente[$this->nm_grid_colunas] = $this->rs_grid->fields[7] ;  
          $this->cliente[$this->nm_grid_colunas] = $this->rs_grid->fields[8] ;  
          $this->direccion[$this->nm_grid_colunas] = $this->rs_grid->fields[9] ;  
          $this->telefono[$this->nm_grid_colunas] = $this->rs_grid->fields[10] ;  
          $this->factura[$this->nm_grid_colunas] = $this->rs_grid->fields[11] ;  
          $this->factura[$this->nm_grid_colunas] = (string)$this->factura[$this->nm_grid_colunas];
          $this->serie[$this->nm_grid_colunas] = $this->rs_grid->fields[12] ;  
          $this->clave_acceso[$this->nm_grid_colunas] = $this->rs_grid->fields[13] ;  
          $this->enviosri[$this->nm_grid_colunas] = $this->rs_grid->fields[14] ;  
          $this->enviosri[$this->nm_grid_colunas] = (string)$this->enviosri[$this->nm_grid_colunas];
          $this->fechaenvio[$this->nm_grid_colunas] = $this->rs_grid->fields[15] ;  
          $this->lineas_id_sales_detail[$this->nm_grid_colunas] = array();
          $this->lineas_id_sales[$this->nm_grid_colunas] = array();
          $this->lineas_unit_cost[$this->nm_grid_colunas] = array();
          $this->lineas_unit_value[$this->nm_grid_colunas] = array();
          $this->lineas_quantity[$this->nm_grid_colunas] = array();
          $this->lineas_discount[$this->nm_grid_colunas] = array();
          $this->lineas_item_total[$this->nm_grid_colunas] = array();
          $this->lineas_id_product[$this->nm_grid_colunas] = array();
          $this->Lookup->lookup_lineas($this->lineas[$this->nm_grid_colunas], $array_lineas); 
          $NM_ind = 0;
          $this->lineas = array();
          foreach ($array_lineas as $cada_subselect) 
          {
              $this->lineas[$this->nm_grid_colunas][$NM_ind] = "";
              $this->lineas_id_sales_detail[$this->nm_grid_colunas][$NM_ind] = $cada_subselect[0];
              $this->lineas_id_sales[$this->nm_grid_colunas][$NM_ind] = $cada_subselect[1];
              $this->lineas_unit_cost[$this->nm_grid_colunas][$NM_ind] = $cada_subselect[2];
              $this->lineas_unit_value[$this->nm_grid_colunas][$NM_ind] = $cada_subselect[3];
              $this->lineas_quantity[$this->nm_grid_colunas][$NM_ind] = $cada_subselect[4];
              $this->lineas_discount[$this->nm_grid_colunas][$NM_ind] = $cada_subselect[5];
              $this->lineas_item_total[$this->nm_grid_colunas][$NM_ind] = $cada_subselect[6];
              $this->lineas_id_product[$this->nm_grid_colunas][$NM_ind] = $cada_subselect[7];
              $NM_ind++;
          }
          $this->id_sales[$this->nm_grid_colunas] = $this->id_sales[$this->nm_grid_colunas];
          if ($this->id_sales[$this->nm_grid_colunas] === "") 
          { 
              $this->id_sales[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->id_sales[$this->nm_grid_colunas], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $this->id_sales[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->id_sales[$this->nm_grid_colunas]);
          $this->sales_price[$this->nm_grid_colunas] = $this->sales_price[$this->nm_grid_colunas];
          if ($this->sales_price[$this->nm_grid_colunas] === "") 
          { 
              $this->sales_price[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->sales_price[$this->nm_grid_colunas], $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
          } 
          $this->sales_price[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->sales_price[$this->nm_grid_colunas]);
          $this->sales_discount[$this->nm_grid_colunas] = $this->sales_discount[$this->nm_grid_colunas];
          if ($this->sales_discount[$this->nm_grid_colunas] === "") 
          { 
              $this->sales_discount[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->sales_discount[$this->nm_grid_colunas], $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
          } 
          $this->sales_discount[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->sales_discount[$this->nm_grid_colunas]);
          $this->total[$this->nm_grid_colunas] = $this->total[$this->nm_grid_colunas];
          if ($this->total[$this->nm_grid_colunas] === "") 
          { 
              $this->total[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->total[$this->nm_grid_colunas], $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
          } 
          $this->total[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->total[$this->nm_grid_colunas]);
          $this->datesales[$this->nm_grid_colunas] = $this->datesales[$this->nm_grid_colunas];
          if ($this->datesales[$this->nm_grid_colunas] === "") 
          { 
              $this->datesales[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
               if (substr($this->datesales[$this->nm_grid_colunas], 10, 1) == "-") 
               { 
                  $this->datesales[$this->nm_grid_colunas] = substr($this->datesales[$this->nm_grid_colunas], 0, 10) . " " . substr($this->datesales[$this->nm_grid_colunas], 11);
               } 
               if (substr($this->datesales[$this->nm_grid_colunas], 13, 1) == ".") 
               { 
                  $this->datesales[$this->nm_grid_colunas] = substr($this->datesales[$this->nm_grid_colunas], 0, 13) . ":" . substr($this->datesales[$this->nm_grid_colunas], 14, 2) . ":" . substr($this->datesales[$this->nm_grid_colunas], 17);
               } 
               $datesales_x =  $this->datesales[$this->nm_grid_colunas];
               nm_conv_limpa_dado($datesales_x, "YYYY-MM-DD HH:II:SS");
               if (is_numeric($datesales_x) && strlen($datesales_x) > 0) 
               { 
                   $this->nm_data->SetaData($this->datesales[$this->nm_grid_colunas], "YYYY-MM-DD HH:II:SS");
                   $this->datesales[$this->nm_grid_colunas] = html_entity_decode($this->nm_data->FormataSaida($this->nm_data->FormatRegion("DH", "ddmmaaaa;hhiiss")), ENT_COMPAT, $_SESSION['scriptcase']['charset']);
               } 
          } 
          $this->datesales[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->datesales[$this->nm_grid_colunas]);
          $this->id_status[$this->nm_grid_colunas] = $this->id_status[$this->nm_grid_colunas];
          if ($this->id_status[$this->nm_grid_colunas] === "") 
          { 
              $this->id_status[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->id_status[$this->nm_grid_colunas], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $this->id_status[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->id_status[$this->nm_grid_colunas]);
          $this->idcaja[$this->nm_grid_colunas] = $this->idcaja[$this->nm_grid_colunas];
          if ($this->idcaja[$this->nm_grid_colunas] === "") 
          { 
              $this->idcaja[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->idcaja[$this->nm_grid_colunas], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $this->idcaja[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->idcaja[$this->nm_grid_colunas]);
          $this->idcliente[$this->nm_grid_colunas] = $this->idcliente[$this->nm_grid_colunas];
          if ($this->idcliente[$this->nm_grid_colunas] === "") 
          { 
              $this->idcliente[$this->nm_grid_colunas] = "" ;  
          } 
          $this->idcliente[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->idcliente[$this->nm_grid_colunas]);
          $this->cliente[$this->nm_grid_colunas] = $this->cliente[$this->nm_grid_colunas];
          if ($this->cliente[$this->nm_grid_colunas] === "") 
          { 
              $this->cliente[$this->nm_grid_colunas] = "" ;  
          } 
          $this->cliente[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->cliente[$this->nm_grid_colunas]);
          $this->direccion[$this->nm_grid_colunas] = $this->direccion[$this->nm_grid_colunas];
          if ($this->direccion[$this->nm_grid_colunas] === "") 
          { 
              $this->direccion[$this->nm_grid_colunas] = "" ;  
          } 
          $this->direccion[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->direccion[$this->nm_grid_colunas]);
          $this->telefono[$this->nm_grid_colunas] = $this->telefono[$this->nm_grid_colunas];
          if ($this->telefono[$this->nm_grid_colunas] === "") 
          { 
              $this->telefono[$this->nm_grid_colunas] = "" ;  
          } 
          $this->telefono[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->telefono[$this->nm_grid_colunas]);
          $this->factura[$this->nm_grid_colunas] = $this->factura[$this->nm_grid_colunas];
          if ($this->factura[$this->nm_grid_colunas] === "") 
          { 
              $this->factura[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->factura[$this->nm_grid_colunas], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $this->factura[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->factura[$this->nm_grid_colunas]);
          $this->serie[$this->nm_grid_colunas] = $this->serie[$this->nm_grid_colunas];
          if ($this->serie[$this->nm_grid_colunas] === "") 
          { 
              $this->serie[$this->nm_grid_colunas] = "" ;  
          } 
          $this->serie[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->serie[$this->nm_grid_colunas]);
          $this->clave_acceso[$this->nm_grid_colunas] = $this->clave_acceso[$this->nm_grid_colunas];
          if ($this->clave_acceso[$this->nm_grid_colunas] === "") 
          { 
              $this->clave_acceso[$this->nm_grid_colunas] = "" ;  
          } 
          $this->clave_acceso[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->clave_acceso[$this->nm_grid_colunas]);
          $this->enviosri[$this->nm_grid_colunas] = $this->enviosri[$this->nm_grid_colunas];
          if ($this->enviosri[$this->nm_grid_colunas] === "") 
          { 
              $this->enviosri[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->enviosri[$this->nm_grid_colunas], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $this->enviosri[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->enviosri[$this->nm_grid_colunas]);
          $this->fechaenvio[$this->nm_grid_colunas] = $this->fechaenvio[$this->nm_grid_colunas];
          if ($this->fechaenvio[$this->nm_grid_colunas] === "") 
          { 
              $this->fechaenvio[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
               if (substr($this->fechaenvio[$this->nm_grid_colunas], 10, 1) == "-") 
               { 
                  $this->fechaenvio[$this->nm_grid_colunas] = substr($this->fechaenvio[$this->nm_grid_colunas], 0, 10) . " " . substr($this->fechaenvio[$this->nm_grid_colunas], 11);
               } 
               if (substr($this->fechaenvio[$this->nm_grid_colunas], 13, 1) == ".") 
               { 
                  $this->fechaenvio[$this->nm_grid_colunas] = substr($this->fechaenvio[$this->nm_grid_colunas], 0, 13) . ":" . substr($this->fechaenvio[$this->nm_grid_colunas], 14, 2) . ":" . substr($this->fechaenvio[$this->nm_grid_colunas], 17);
               } 
               $fechaenvio_x =  $this->fechaenvio[$this->nm_grid_colunas];
               nm_conv_limpa_dado($fechaenvio_x, "YYYY-MM-DD HH:II:SS");
               if (is_numeric($fechaenvio_x) && strlen($fechaenvio_x) > 0) 
               { 
                   $this->nm_data->SetaData($this->fechaenvio[$this->nm_grid_colunas], "YYYY-MM-DD HH:II:SS");
                   $this->fechaenvio[$this->nm_grid_colunas] = html_entity_decode($this->nm_data->FormataSaida($this->nm_data->FormatRegion("DH", "ddmmaaaa;hhiiss")), ENT_COMPAT, $_SESSION['scriptcase']['charset']);
               } 
          } 
          $this->fechaenvio[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->fechaenvio[$this->nm_grid_colunas]);
          foreach ($this->lineas_id_sales_detail[$this->nm_grid_colunas] as $NM_ind => $Dados) 
          {
          if ($this->lineas_id_sales_detail[$this->nm_grid_colunas][$NM_ind] === "") 
          { 
              $this->lineas_id_sales_detail[$this->nm_grid_colunas][$NM_ind] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->lineas_id_sales_detail[$this->nm_grid_colunas][$NM_ind], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
              $this->lineas_id_sales_detail[$this->nm_grid_colunas][$NM_ind] = $this->SC_conv_utf8($this->lineas_id_sales_detail[$this->nm_grid_colunas][$NM_ind]);
          }
          foreach ($this->lineas_id_sales[$this->nm_grid_colunas] as $NM_ind => $Dados) 
          {
          if ($this->lineas_id_sales[$this->nm_grid_colunas][$NM_ind] === "") 
          { 
              $this->lineas_id_sales[$this->nm_grid_colunas][$NM_ind] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->lineas_id_sales[$this->nm_grid_colunas][$NM_ind], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
              $this->lineas_id_sales[$this->nm_grid_colunas][$NM_ind] = $this->SC_conv_utf8($this->lineas_id_sales[$this->nm_grid_colunas][$NM_ind]);
          }
          foreach ($this->lineas_unit_cost[$this->nm_grid_colunas] as $NM_ind => $Dados) 
          {
          if ($this->lineas_unit_cost[$this->nm_grid_colunas][$NM_ind] === "") 
          { 
              $this->lineas_unit_cost[$this->nm_grid_colunas][$NM_ind] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->lineas_unit_cost[$this->nm_grid_colunas][$NM_ind], $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
          } 
              $this->lineas_unit_cost[$this->nm_grid_colunas][$NM_ind] = $this->SC_conv_utf8($this->lineas_unit_cost[$this->nm_grid_colunas][$NM_ind]);
          }
          foreach ($this->lineas_unit_value[$this->nm_grid_colunas] as $NM_ind => $Dados) 
          {
          if ($this->lineas_unit_value[$this->nm_grid_colunas][$NM_ind] === "") 
          { 
              $this->lineas_unit_value[$this->nm_grid_colunas][$NM_ind] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->lineas_unit_value[$this->nm_grid_colunas][$NM_ind], $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
          } 
              $this->lineas_unit_value[$this->nm_grid_colunas][$NM_ind] = $this->SC_conv_utf8($this->lineas_unit_value[$this->nm_grid_colunas][$NM_ind]);
          }
          foreach ($this->lineas_quantity[$this->nm_grid_colunas] as $NM_ind => $Dados) 
          {
          if ($this->lineas_quantity[$this->nm_grid_colunas][$NM_ind] === "") 
          { 
              $this->lineas_quantity[$this->nm_grid_colunas][$NM_ind] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->lineas_quantity[$this->nm_grid_colunas][$NM_ind], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
              $this->lineas_quantity[$this->nm_grid_colunas][$NM_ind] = $this->SC_conv_utf8($this->lineas_quantity[$this->nm_grid_colunas][$NM_ind]);
          }
          foreach ($this->lineas_discount[$this->nm_grid_colunas] as $NM_ind => $Dados) 
          {
          if ($this->lineas_discount[$this->nm_grid_colunas][$NM_ind] === "") 
          { 
              $this->lineas_discount[$this->nm_grid_colunas][$NM_ind] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->lineas_discount[$this->nm_grid_colunas][$NM_ind], $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
          } 
              $this->lineas_discount[$this->nm_grid_colunas][$NM_ind] = $this->SC_conv_utf8($this->lineas_discount[$this->nm_grid_colunas][$NM_ind]);
          }
          foreach ($this->lineas_item_total[$this->nm_grid_colunas] as $NM_ind => $Dados) 
          {
          if ($this->lineas_item_total[$this->nm_grid_colunas][$NM_ind] === "") 
          { 
              $this->lineas_item_total[$this->nm_grid_colunas][$NM_ind] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->lineas_item_total[$this->nm_grid_colunas][$NM_ind], $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
          } 
              $this->lineas_item_total[$this->nm_grid_colunas][$NM_ind] = $this->SC_conv_utf8($this->lineas_item_total[$this->nm_grid_colunas][$NM_ind]);
          }
          foreach ($this->lineas_id_product[$this->nm_grid_colunas] as $NM_ind => $Dados) 
          {
          if ($this->lineas_id_product[$this->nm_grid_colunas][$NM_ind] === "") 
          { 
              $this->lineas_id_product[$this->nm_grid_colunas][$NM_ind] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->lineas_id_product[$this->nm_grid_colunas][$NM_ind], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
              $this->lineas_id_product[$this->nm_grid_colunas][$NM_ind] = $this->SC_conv_utf8($this->lineas_id_product[$this->nm_grid_colunas][$NM_ind]);
          }
            $cell_id_sales = array('posx' => '164.24830624997927', 'posy' => '7.3504424999990725', 'data' => $this->id_sales[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_sales_price = array('posx' => '148.90247291664787', 'posy' => '138.00084583331594', 'data' => $this->sales_price[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_sales_discount = array('posx' => '140.171222916649', 'posy' => '148.26588541664796', 'data' => $this->sales_discount[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_total = array('posx' => '160.8087229166464', 'posy' => '158.26634166664672', 'data' => $this->total[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_datesales = array('posx' => '118.7399729166517', 'posy' => '23.275131249997063', 'data' => $this->datesales[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_id_status = array('posx' => '10', 'posy' => '60', 'data' => $this->id_status[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_idcaja = array('posx' => '165.83580624997907', 'posy' => '15.49466145833138', 'data' => $this->idcaja[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_idcliente = array('posx' => '24.548306249996905', 'posy' => '15.440924583331386', 'data' => $this->idcliente[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_cliente = array('posx' => '25.342056249996805', 'posy' => '7.978827916665661', 'data' => $this->cliente[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_direccion = array('posx' => '25.077472916663506', 'posy' => '23.266929166663733', 'data' => $this->direccion[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_telefono = array('posx' => '25.342056249996805', 'posy' => '31.94420416666264', 'data' => $this->telefono[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_factura = array('posx' => '163.98372291664597', 'posy' => '22.63007708333048', 'data' => $this->factura[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_serie = array('posx' => '119.5337229166516', 'posy' => '15.168059791664756', 'data' => $this->serie[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_lineas_id_sales_detail = array('posx' => '23.283333333330397', 'posy' => '81.22099791665642', 'data' => $this->lineas_id_sales_detail[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_lineas_id_sales = array('posx' => '0', 'posy' => '81.22099791665642', 'data' => $this->lineas_id_sales[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_lineas_unit_cost = array('posx' => '0', 'posy' => '81.22099791665642', 'data' => $this->lineas_unit_cost[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_lineas_unit_value = array('posx' => '0', 'posy' => '81.22099791665642', 'data' => $this->lineas_unit_value[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_lineas_quantity = array('posx' => '0', 'posy' => '81.22099791665642', 'data' => $this->lineas_quantity[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_lineas_discount = array('posx' => '3.4350854166662326', 'posy' => '81.22099791665642', 'data' => $this->lineas_discount[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_lineas_item_total = array('posx' => '107.94999999998639', 'posy' => '81.22099791665642', 'data' => $this->lineas_item_total[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_lineas_id_product = array('posx' => '119.59166666665159', 'posy' => '81.22099791665642', 'data' => $this->lineas_id_product[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);


            $this->Pdf->SetFont($cell_id_sales['font_type'], $cell_id_sales['font_style'], $cell_id_sales['font_size']);
            $this->pdf_text_color($cell_id_sales['data'], $cell_id_sales['color_r'], $cell_id_sales['color_g'], $cell_id_sales['color_b']);
            if (!empty($cell_id_sales['posx']) && !empty($cell_id_sales['posy']))
            {
                $this->Pdf->SetXY($cell_id_sales['posx'], $cell_id_sales['posy']);
            }
            elseif (!empty($cell_id_sales['posx']))
            {
                $this->Pdf->SetX($cell_id_sales['posx']);
            }
            elseif (!empty($cell_id_sales['posy']))
            {
                $this->Pdf->SetY($cell_id_sales['posy']);
            }
            $this->Pdf->Cell($cell_id_sales['width'], 0, $cell_id_sales['data'], 0, 0, $cell_id_sales['align']);

            $this->Pdf->SetFont($cell_sales_price['font_type'], $cell_sales_price['font_style'], $cell_sales_price['font_size']);
            $this->pdf_text_color($cell_sales_price['data'], $cell_sales_price['color_r'], $cell_sales_price['color_g'], $cell_sales_price['color_b']);
            if (!empty($cell_sales_price['posx']) && !empty($cell_sales_price['posy']))
            {
                $this->Pdf->SetXY($cell_sales_price['posx'], $cell_sales_price['posy']);
            }
            elseif (!empty($cell_sales_price['posx']))
            {
                $this->Pdf->SetX($cell_sales_price['posx']);
            }
            elseif (!empty($cell_sales_price['posy']))
            {
                $this->Pdf->SetY($cell_sales_price['posy']);
            }
            $this->Pdf->Cell($cell_sales_price['width'], 0, $cell_sales_price['data'], 0, 0, $cell_sales_price['align']);

            $this->Pdf->SetFont($cell_sales_discount['font_type'], $cell_sales_discount['font_style'], $cell_sales_discount['font_size']);
            $this->pdf_text_color($cell_sales_discount['data'], $cell_sales_discount['color_r'], $cell_sales_discount['color_g'], $cell_sales_discount['color_b']);
            if (!empty($cell_sales_discount['posx']) && !empty($cell_sales_discount['posy']))
            {
                $this->Pdf->SetXY($cell_sales_discount['posx'], $cell_sales_discount['posy']);
            }
            elseif (!empty($cell_sales_discount['posx']))
            {
                $this->Pdf->SetX($cell_sales_discount['posx']);
            }
            elseif (!empty($cell_sales_discount['posy']))
            {
                $this->Pdf->SetY($cell_sales_discount['posy']);
            }
            $this->Pdf->Cell($cell_sales_discount['width'], 0, $cell_sales_discount['data'], 0, 0, $cell_sales_discount['align']);

            $this->Pdf->SetFont($cell_total['font_type'], $cell_total['font_style'], $cell_total['font_size']);
            $this->pdf_text_color($cell_total['data'], $cell_total['color_r'], $cell_total['color_g'], $cell_total['color_b']);
            if (!empty($cell_total['posx']) && !empty($cell_total['posy']))
            {
                $this->Pdf->SetXY($cell_total['posx'], $cell_total['posy']);
            }
            elseif (!empty($cell_total['posx']))
            {
                $this->Pdf->SetX($cell_total['posx']);
            }
            elseif (!empty($cell_total['posy']))
            {
                $this->Pdf->SetY($cell_total['posy']);
            }
            $this->Pdf->Cell($cell_total['width'], 0, $cell_total['data'], 0, 0, $cell_total['align']);

            $this->Pdf->SetFont($cell_datesales['font_type'], $cell_datesales['font_style'], $cell_datesales['font_size']);
            $this->pdf_text_color($cell_datesales['data'], $cell_datesales['color_r'], $cell_datesales['color_g'], $cell_datesales['color_b']);
            if (!empty($cell_datesales['posx']) && !empty($cell_datesales['posy']))
            {
                $this->Pdf->SetXY($cell_datesales['posx'], $cell_datesales['posy']);
            }
            elseif (!empty($cell_datesales['posx']))
            {
                $this->Pdf->SetX($cell_datesales['posx']);
            }
            elseif (!empty($cell_datesales['posy']))
            {
                $this->Pdf->SetY($cell_datesales['posy']);
            }
            $this->Pdf->Cell($cell_datesales['width'], 0, $cell_datesales['data'], 0, 0, $cell_datesales['align']);

            $this->Pdf->SetFont($cell_id_status['font_type'], $cell_id_status['font_style'], $cell_id_status['font_size']);
            $this->pdf_text_color($cell_id_status['data'], $cell_id_status['color_r'], $cell_id_status['color_g'], $cell_id_status['color_b']);
            if (!empty($cell_id_status['posx']) && !empty($cell_id_status['posy']))
            {
                $this->Pdf->SetXY($cell_id_status['posx'], $cell_id_status['posy']);
            }
            elseif (!empty($cell_id_status['posx']))
            {
                $this->Pdf->SetX($cell_id_status['posx']);
            }
            elseif (!empty($cell_id_status['posy']))
            {
                $this->Pdf->SetY($cell_id_status['posy']);
            }
            $this->Pdf->Cell($cell_id_status['width'], 0, $cell_id_status['data'], 0, 0, $cell_id_status['align']);

            $this->Pdf->SetFont($cell_idcaja['font_type'], $cell_idcaja['font_style'], $cell_idcaja['font_size']);
            $this->pdf_text_color($cell_idcaja['data'], $cell_idcaja['color_r'], $cell_idcaja['color_g'], $cell_idcaja['color_b']);
            if (!empty($cell_idcaja['posx']) && !empty($cell_idcaja['posy']))
            {
                $this->Pdf->SetXY($cell_idcaja['posx'], $cell_idcaja['posy']);
            }
            elseif (!empty($cell_idcaja['posx']))
            {
                $this->Pdf->SetX($cell_idcaja['posx']);
            }
            elseif (!empty($cell_idcaja['posy']))
            {
                $this->Pdf->SetY($cell_idcaja['posy']);
            }
            $this->Pdf->Cell($cell_idcaja['width'], 0, $cell_idcaja['data'], 0, 0, $cell_idcaja['align']);

            $this->Pdf->SetFont($cell_idcliente['font_type'], $cell_idcliente['font_style'], $cell_idcliente['font_size']);
            $this->pdf_text_color($cell_idcliente['data'], $cell_idcliente['color_r'], $cell_idcliente['color_g'], $cell_idcliente['color_b']);
            if (!empty($cell_idcliente['posx']) && !empty($cell_idcliente['posy']))
            {
                $this->Pdf->SetXY($cell_idcliente['posx'], $cell_idcliente['posy']);
            }
            elseif (!empty($cell_idcliente['posx']))
            {
                $this->Pdf->SetX($cell_idcliente['posx']);
            }
            elseif (!empty($cell_idcliente['posy']))
            {
                $this->Pdf->SetY($cell_idcliente['posy']);
            }
            $this->Pdf->Cell($cell_idcliente['width'], 0, $cell_idcliente['data'], 0, 0, $cell_idcliente['align']);

            $this->Pdf->SetFont($cell_cliente['font_type'], $cell_cliente['font_style'], $cell_cliente['font_size']);
            $this->pdf_text_color($cell_cliente['data'], $cell_cliente['color_r'], $cell_cliente['color_g'], $cell_cliente['color_b']);
            if (!empty($cell_cliente['posx']) && !empty($cell_cliente['posy']))
            {
                $this->Pdf->SetXY($cell_cliente['posx'], $cell_cliente['posy']);
            }
            elseif (!empty($cell_cliente['posx']))
            {
                $this->Pdf->SetX($cell_cliente['posx']);
            }
            elseif (!empty($cell_cliente['posy']))
            {
                $this->Pdf->SetY($cell_cliente['posy']);
            }
            $this->Pdf->Cell($cell_cliente['width'], 0, $cell_cliente['data'], 0, 0, $cell_cliente['align']);

            $this->Pdf->SetFont($cell_direccion['font_type'], $cell_direccion['font_style'], $cell_direccion['font_size']);
            $this->pdf_text_color($cell_direccion['data'], $cell_direccion['color_r'], $cell_direccion['color_g'], $cell_direccion['color_b']);
            if (!empty($cell_direccion['posx']) && !empty($cell_direccion['posy']))
            {
                $this->Pdf->SetXY($cell_direccion['posx'], $cell_direccion['posy']);
            }
            elseif (!empty($cell_direccion['posx']))
            {
                $this->Pdf->SetX($cell_direccion['posx']);
            }
            elseif (!empty($cell_direccion['posy']))
            {
                $this->Pdf->SetY($cell_direccion['posy']);
            }
            $this->Pdf->Cell($cell_direccion['width'], 0, $cell_direccion['data'], 0, 0, $cell_direccion['align']);

            $this->Pdf->SetFont($cell_telefono['font_type'], $cell_telefono['font_style'], $cell_telefono['font_size']);
            $this->pdf_text_color($cell_telefono['data'], $cell_telefono['color_r'], $cell_telefono['color_g'], $cell_telefono['color_b']);
            if (!empty($cell_telefono['posx']) && !empty($cell_telefono['posy']))
            {
                $this->Pdf->SetXY($cell_telefono['posx'], $cell_telefono['posy']);
            }
            elseif (!empty($cell_telefono['posx']))
            {
                $this->Pdf->SetX($cell_telefono['posx']);
            }
            elseif (!empty($cell_telefono['posy']))
            {
                $this->Pdf->SetY($cell_telefono['posy']);
            }
            $this->Pdf->Cell($cell_telefono['width'], 0, $cell_telefono['data'], 0, 0, $cell_telefono['align']);

            $this->Pdf->SetFont($cell_factura['font_type'], $cell_factura['font_style'], $cell_factura['font_size']);
            $this->pdf_text_color($cell_factura['data'], $cell_factura['color_r'], $cell_factura['color_g'], $cell_factura['color_b']);
            if (!empty($cell_factura['posx']) && !empty($cell_factura['posy']))
            {
                $this->Pdf->SetXY($cell_factura['posx'], $cell_factura['posy']);
            }
            elseif (!empty($cell_factura['posx']))
            {
                $this->Pdf->SetX($cell_factura['posx']);
            }
            elseif (!empty($cell_factura['posy']))
            {
                $this->Pdf->SetY($cell_factura['posy']);
            }
            $this->Pdf->Cell($cell_factura['width'], 0, $cell_factura['data'], 0, 0, $cell_factura['align']);

            $this->Pdf->SetFont($cell_serie['font_type'], $cell_serie['font_style'], $cell_serie['font_size']);
            $this->pdf_text_color($cell_serie['data'], $cell_serie['color_r'], $cell_serie['color_g'], $cell_serie['color_b']);
            if (!empty($cell_serie['posx']) && !empty($cell_serie['posy']))
            {
                $this->Pdf->SetXY($cell_serie['posx'], $cell_serie['posy']);
            }
            elseif (!empty($cell_serie['posx']))
            {
                $this->Pdf->SetX($cell_serie['posx']);
            }
            elseif (!empty($cell_serie['posy']))
            {
                $this->Pdf->SetY($cell_serie['posy']);
            }
            $this->Pdf->Cell($cell_serie['width'], 0, $cell_serie['data'], 0, 0, $cell_serie['align']);

            $this->Pdf->SetY(81.22099791665642);
            foreach ($this->lineas[$this->nm_grid_colunas] as $NM_ind => $Dados)
            {
                $this->Pdf->SetFont($cell_lineas_id_sales_detail['font_type'], $cell_lineas_id_sales_detail['font_style'], $cell_lineas_id_sales_detail['font_size']);
                if (!empty($cell_lineas_id_sales_detail['posx']))
                {
                    $this->Pdf->SetX($cell_lineas_id_sales_detail['posx']);
                }
                $this->pdf_text_color($this->lineas_id_sales_detail[$this->nm_grid_colunas][$NM_ind], $cell_lineas_id_sales_detail['color_r'], $cell_lineas_id_sales_detail['color_g'], $cell_lineas_id_sales_detail['color_b']);
                $this->Pdf->Cell($cell_lineas_id_sales_detail['width'], 0, $this->lineas_id_sales_detail[$this->nm_grid_colunas][$NM_ind], 0, 0, $cell_lineas_id_sales_detail['align']);
                $this->Pdf->SetFont($cell_lineas_id_sales['font_type'], $cell_lineas_id_sales['font_style'], $cell_lineas_id_sales['font_size']);
                if (!empty($cell_lineas_id_sales['posx']))
                {
                    $this->Pdf->SetX($cell_lineas_id_sales['posx']);
                }
                $this->pdf_text_color($this->lineas_id_sales[$this->nm_grid_colunas][$NM_ind], $cell_lineas_id_sales['color_r'], $cell_lineas_id_sales['color_g'], $cell_lineas_id_sales['color_b']);
                $this->Pdf->Cell($cell_lineas_id_sales['width'], 0, $this->lineas_id_sales[$this->nm_grid_colunas][$NM_ind], 0, 0, $cell_lineas_id_sales['align']);
                $this->Pdf->SetFont($cell_lineas_unit_cost['font_type'], $cell_lineas_unit_cost['font_style'], $cell_lineas_unit_cost['font_size']);
                if (!empty($cell_lineas_unit_cost['posx']))
                {
                    $this->Pdf->SetX($cell_lineas_unit_cost['posx']);
                }
                $this->pdf_text_color($this->lineas_unit_cost[$this->nm_grid_colunas][$NM_ind], $cell_lineas_unit_cost['color_r'], $cell_lineas_unit_cost['color_g'], $cell_lineas_unit_cost['color_b']);
                $this->Pdf->Cell($cell_lineas_unit_cost['width'], 0, $this->lineas_unit_cost[$this->nm_grid_colunas][$NM_ind], 0, 0, $cell_lineas_unit_cost['align']);
                $this->Pdf->SetFont($cell_lineas_unit_value['font_type'], $cell_lineas_unit_value['font_style'], $cell_lineas_unit_value['font_size']);
                if (!empty($cell_lineas_unit_value['posx']))
                {
                    $this->Pdf->SetX($cell_lineas_unit_value['posx']);
                }
                $this->pdf_text_color($this->lineas_unit_value[$this->nm_grid_colunas][$NM_ind], $cell_lineas_unit_value['color_r'], $cell_lineas_unit_value['color_g'], $cell_lineas_unit_value['color_b']);
                $this->Pdf->Cell($cell_lineas_unit_value['width'], 0, $this->lineas_unit_value[$this->nm_grid_colunas][$NM_ind], 0, 0, $cell_lineas_unit_value['align']);
                $this->Pdf->SetFont($cell_lineas_quantity['font_type'], $cell_lineas_quantity['font_style'], $cell_lineas_quantity['font_size']);
                if (!empty($cell_lineas_quantity['posx']))
                {
                    $this->Pdf->SetX($cell_lineas_quantity['posx']);
                }
                $this->pdf_text_color($this->lineas_quantity[$this->nm_grid_colunas][$NM_ind], $cell_lineas_quantity['color_r'], $cell_lineas_quantity['color_g'], $cell_lineas_quantity['color_b']);
                $this->Pdf->Cell($cell_lineas_quantity['width'], 0, $this->lineas_quantity[$this->nm_grid_colunas][$NM_ind], 0, 0, $cell_lineas_quantity['align']);
                $this->Pdf->SetFont($cell_lineas_discount['font_type'], $cell_lineas_discount['font_style'], $cell_lineas_discount['font_size']);
                if (!empty($cell_lineas_discount['posx']))
                {
                    $this->Pdf->SetX($cell_lineas_discount['posx']);
                }
                $this->pdf_text_color($this->lineas_discount[$this->nm_grid_colunas][$NM_ind], $cell_lineas_discount['color_r'], $cell_lineas_discount['color_g'], $cell_lineas_discount['color_b']);
                $this->Pdf->Cell($cell_lineas_discount['width'], 0, $this->lineas_discount[$this->nm_grid_colunas][$NM_ind], 0, 0, $cell_lineas_discount['align']);
                $this->Pdf->SetFont($cell_lineas_item_total['font_type'], $cell_lineas_item_total['font_style'], $cell_lineas_item_total['font_size']);
                if (!empty($cell_lineas_item_total['posx']))
                {
                    $this->Pdf->SetX($cell_lineas_item_total['posx']);
                }
                $this->pdf_text_color($this->lineas_item_total[$this->nm_grid_colunas][$NM_ind], $cell_lineas_item_total['color_r'], $cell_lineas_item_total['color_g'], $cell_lineas_item_total['color_b']);
                $this->Pdf->Cell($cell_lineas_item_total['width'], 0, $this->lineas_item_total[$this->nm_grid_colunas][$NM_ind], 0, 0, $cell_lineas_item_total['align']);
                $this->Pdf->SetFont($cell_lineas_id_product['font_type'], $cell_lineas_id_product['font_style'], $cell_lineas_id_product['font_size']);
                if (!empty($cell_lineas_id_product['posx']))
                {
                    $this->Pdf->SetX($cell_lineas_id_product['posx']);
                }
                $this->pdf_text_color($this->lineas_id_product[$this->nm_grid_colunas][$NM_ind], $cell_lineas_id_product['color_r'], $cell_lineas_id_product['color_g'], $cell_lineas_id_product['color_b']);
                $this->Pdf->Cell($cell_lineas_id_product['width'], 0, $this->lineas_id_product[$this->nm_grid_colunas][$NM_ind], 0, 0, $cell_lineas_id_product['align']);
                if (!isset($max_Y) || empty($max_Y) || $this->Pdf->GetY() < $max_Y )
                {
                    $max_Y = $this->Pdf->GetY();
                }
                $max_Y += 5;
                $this->Pdf->SetY($max_Y);

            }
          $max_Y = 0;
          $this->rs_grid->MoveNext();
          $this->sc_proc_grid = false;
          $nm_quant_linhas++ ;
      }  
   }  
   $this->rs_grid->Close();
   $this->Pdf->Output($this->Ini->root . $this->Ini->nm_path_pdf, 'F');
 }
 function pdf_text_color(&$val, $r, $g, $b)
 {
     $pos = strpos($val, "@SCNEG#");
     if ($pos !== false)
     {
         $cor = trim(substr($val, $pos + 7));
         $val = substr($val, 0, $pos);
         $cor = (substr($cor, 0, 1) == "#") ? substr($cor, 1) : $cor;
         if (strlen($cor) == 6)
         {
             $r = hexdec(substr($cor, 0, 2));
             $g = hexdec(substr($cor, 2, 2));
             $b = hexdec(substr($cor, 4, 2));
         }
     }
     $this->Pdf->SetTextColor($r, $g, $b);
 }
 function SC_conv_utf8($input)
 {
     if ($_SESSION['scriptcase']['charset'] != "UTF-8" && !NM_is_utf8($input))
     {
         $input = sc_convert_encoding($input, "UTF-8", $_SESSION['scriptcase']['charset']);
     }
     return $input;
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
