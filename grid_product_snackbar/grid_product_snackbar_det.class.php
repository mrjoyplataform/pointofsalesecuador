<?php
//--- 
class grid_product_snackbar_det
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
   var $id_product;
   var $product_name;
   var $product_code;
   var $id_status;
   var $stock;
   var $product_value;
   var $kiosko;
   var $entrada;
   var $jugador;
   var $visitante;
   var $service;
   var $tarjeta;
   var $minutos;
   var $tokens;
   var $comida;
   var $score;
   var $poriva;
   var $cuentaventa;
   var $unidad;
   var $tipoitem;
   var $cuentacompra;
   var $precioventa;
   var $puntoventa;
   var $orden;
   var $id_category;
   var $dateproduct;
   var $product_cost;
   var $discount;
   var $image;
   var $arcade_clasic;
   var $ultfechaventa;
   var $ingrediente;
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
    if (isset($_SESSION['scriptcase']['sc_apl_conf']['grid_product_snackbar']['btn_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['grid_product_snackbar']['btn_display']))
    {
        foreach ($_SESSION['scriptcase']['sc_apl_conf']['grid_product_snackbar']['btn_display'] as $NM_cada_btn => $NM_cada_opc)
        {
            $this->nmgp_botoes[$NM_cada_btn] = $NM_cada_opc;
        }
    }
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_product_snackbar']['embutida_form']) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_product_snackbar']['embutida_form'])
    {
    $this->nmgp_botoes['det_pdf']   = "off";
    $this->nmgp_botoes['det_print'] = "off";
    }
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_product_snackbar']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_product_snackbar']['campos_busca']))
    { 
        $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_product_snackbar']['campos_busca'];
        if ($_SESSION['scriptcase']['charset'] != "UTF-8")
        {
            $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
        }
        $this->id_status = $Busca_temp['id_status']; 
        $tmp_pos = strpos($this->id_status, "##@@");
        if ($tmp_pos !== false && !is_array($this->id_status))
        {
            $this->id_status = substr($this->id_status, 0, $tmp_pos);
        }
        $this->id_product = $Busca_temp['id_product']; 
        $tmp_pos = strpos($this->id_product, "##@@");
        if ($tmp_pos !== false && !is_array($this->id_product))
        {
            $this->id_product = substr($this->id_product, 0, $tmp_pos);
        }
        $this->product_name = $Busca_temp['product_name']; 
        $tmp_pos = strpos($this->product_name, "##@@");
        if ($tmp_pos !== false && !is_array($this->product_name))
        {
            $this->product_name = substr($this->product_name, 0, $tmp_pos);
        }
        $this->product_code = $Busca_temp['product_code']; 
        $tmp_pos = strpos($this->product_code, "##@@");
        if ($tmp_pos !== false && !is_array($this->product_code))
        {
            $this->product_code = substr($this->product_code, 0, $tmp_pos);
        }
    } 
    $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_product_snackbar']['where_orig'];
    $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_product_snackbar']['where_pesq'];
    $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_product_snackbar']['where_pesq_filtro'];
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
    $_SESSION['sc_session'][$this->Ini->sc_page]['grid_product_snackbar']['seq_dir'] = 0; 
    $_SESSION['sc_session'][$this->Ini->sc_page]['grid_product_snackbar']['sub_dir'] = array(); 
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
       $nmgp_select = "SELECT id_product, product_name, product_code, id_status, str_replace (convert(char(10),dateproduct,102), '.', '-') + ' ' + convert(char(8),dateproduct,20), product_value, product_cost, stock, id_category, image, service, kiosko, entrada, jugador, visitante, tarjeta, minutos, tokens, comida, score, poriva, cuentaventa, unidad, tipoitem, cuentacompra, precioventa, puntoventa, orden, arcade_clasic, str_replace (convert(char(10),ultfechaventa,102), '.', '-') + ' ' + convert(char(8),ultfechaventa,20), ingrediente from " . $this->Ini->nm_tabela; 
   } 
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql)) 
   { 
       $nmgp_select = "SELECT id_product, product_name, product_code, id_status, convert(char(23),dateproduct,121), product_value, product_cost, stock, id_category, image, service, kiosko, entrada, jugador, visitante, tarjeta, minutos, tokens, comida, score, poriva, cuentaventa, unidad, tipoitem, cuentacompra, precioventa, puntoventa, orden, arcade_clasic, convert(char(23),ultfechaventa,121), ingrediente from " . $this->Ini->nm_tabela; 
   } 
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle)) 
   { 
       $nmgp_select = "SELECT id_product, product_name, product_code, id_status, dateproduct, product_value, product_cost, stock, id_category, image, service, kiosko, entrada, jugador, visitante, tarjeta, minutos, tokens, comida, score, poriva, cuentaventa, unidad, tipoitem, cuentacompra, precioventa, puntoventa, orden, arcade_clasic, ultfechaventa, ingrediente from " . $this->Ini->nm_tabela; 
   } 
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix)) 
   { 
       $nmgp_select = "SELECT id_product, product_name, product_code, id_status, EXTEND(dateproduct, YEAR TO FRACTION), product_value, product_cost, stock, id_category, image, service, kiosko, entrada, jugador, visitante, tarjeta, minutos, tokens, comida, score, poriva, cuentaventa, unidad, tipoitem, cuentacompra, precioventa, puntoventa, orden, arcade_clasic, EXTEND(ultfechaventa, YEAR TO FRACTION), ingrediente from " . $this->Ini->nm_tabela; 
   } 
   else 
   { 
       $nmgp_select = "SELECT id_product, product_name, product_code, id_status, dateproduct, product_value, product_cost, stock, id_category, image, service, kiosko, entrada, jugador, visitante, tarjeta, minutos, tokens, comida, score, poriva, cuentaventa, unidad, tipoitem, cuentacompra, precioventa, puntoventa, orden, arcade_clasic, ultfechaventa, ingrediente from " . $this->Ini->nm_tabela; 
   } 
   $parms_det = explode("*PDet*", $_SESSION['sc_session'][$this->Ini->sc_page]['grid_product_snackbar']['chave_det']) ; 
   foreach ($parms_det as $key => $cada_par)
   {
       $parms_det[$key] = $this->Db->qstr($parms_det[$key]);
       $parms_det[$key] = substr($parms_det[$key], 1, strlen($parms_det[$key]) - 2);
   } 
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
   {
       $nmgp_select .= " where  id_product = $parms_det[0]" ;  
   } 
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
   {
       $nmgp_select .= " where  id_product = $parms_det[0]" ;  
   } 
   else 
   { 
       $nmgp_select .= " where  id_product = $parms_det[0]" ;  
   } 
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
   $rs = $this->Db->Execute($nmgp_select) ; 
   if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
   { 
       $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit ; 
   }  
   $this->id_product = $rs->fields[0] ;  
   $this->id_product = (string)$this->id_product;
   $this->product_name = $rs->fields[1] ;  
   $this->product_code = $rs->fields[2] ;  
   $this->id_status = $rs->fields[3] ;  
   $this->id_status = (string)$this->id_status;
   $this->dateproduct = $rs->fields[4] ;  
   $this->product_value = $rs->fields[5] ;  
   $this->product_value = str_replace(",", ".", $this->product_value);
   $this->product_value = (string)$this->product_value;
   $this->product_cost = $rs->fields[6] ;  
   $this->product_cost = str_replace(",", ".", $this->product_cost);
   $this->product_cost = (string)$this->product_cost;
   $this->stock = $rs->fields[7] ;  
   $this->stock = (string)$this->stock;
   $this->id_category = $rs->fields[8] ;  
   $this->id_category = (string)$this->id_category;
   $this->image = $rs->fields[9] ;  
   $this->service = $rs->fields[10] ;  
   $this->service = (string)$this->service;
   $this->kiosko = $rs->fields[11] ;  
   $this->kiosko = (string)$this->kiosko;
   $this->entrada = $rs->fields[12] ;  
   $this->entrada = (string)$this->entrada;
   $this->jugador = $rs->fields[13] ;  
   $this->jugador = (string)$this->jugador;
   $this->visitante = $rs->fields[14] ;  
   $this->visitante = (string)$this->visitante;
   $this->tarjeta = $rs->fields[15] ;  
   $this->tarjeta = (string)$this->tarjeta;
   $this->minutos = $rs->fields[16] ;  
   $this->minutos = (string)$this->minutos;
   $this->tokens = $rs->fields[17] ;  
   $this->tokens = (string)$this->tokens;
   $this->comida = $rs->fields[18] ;  
   $this->comida = (string)$this->comida;
   $this->score = $rs->fields[19] ;  
   $this->score = (string)$this->score;
   $this->poriva = $rs->fields[20] ;  
   $this->poriva = str_replace(",", ".", $this->poriva);
   $this->poriva = (string)$this->poriva;
   $this->cuentaventa = $rs->fields[21] ;  
   $this->unidad = $rs->fields[22] ;  
   $this->tipoitem = $rs->fields[23] ;  
   $this->cuentacompra = $rs->fields[24] ;  
   $this->precioventa = $rs->fields[25] ;  
   $this->precioventa = (string)$this->precioventa;
   $this->puntoventa = $rs->fields[26] ;  
   $this->puntoventa = (string)$this->puntoventa;
   $this->orden = $rs->fields[27] ;  
   $this->orden = (string)$this->orden;
   $this->arcade_clasic = $rs->fields[28] ;  
   $this->arcade_clasic = (string)$this->arcade_clasic;
   $this->ultfechaventa = $rs->fields[29] ;  
   $this->ingrediente = $rs->fields[30] ;  
   $this->ingrediente = (string)$this->ingrediente;
   $this->New_label['id_product'] = "" . $this->Ini->Nm_lang['lang_product_fld_id_product'] . "";
   $this->New_label['product_name'] = "" . $this->Ini->Nm_lang['lang_product_fld_product_name'] . "";
   $this->New_label['product_code'] = "" . $this->Ini->Nm_lang['lang_product_fld_product_code'] . "";
   $this->New_label['id_status'] = "" . $this->Ini->Nm_lang['lang_product_fld_id_status'] . "";
   $this->New_label['stock'] = "" . $this->Ini->Nm_lang['lang_product_fld_stock'] . "";
   $this->New_label['product_value'] = "" . $this->Ini->Nm_lang['lang_product_fld_product_value'] . "";
   $this->New_label['id_category'] = "" . $this->Ini->Nm_lang['lang_product_fld_id_category'] . "";
   $this->New_label['dateproduct'] = "" . $this->Ini->Nm_lang['lang_product_fld_dateproduct'] . "";
   $this->New_label['product_cost'] = "" . $this->Ini->Nm_lang['lang_product_fld_product_cost'] . "";
   $this->New_label['image'] = "" . $this->Ini->Nm_lang['lang_product_fld_image'] . "";
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_product_snackbar']['cmp_acum']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_product_snackbar']['cmp_acum']))
   {
       $parms_acum = explode(";", $_SESSION['sc_session'][$this->Ini->sc_page]['grid_product_snackbar']['cmp_acum']);
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
   $nm_saida->saida("   <TITLE>" . $this->Ini->Nm_lang['lang_othr_grid_title'] . " " . $this->Ini->Nm_lang['lang_tbl_product'] . "</TITLE>\r\n");
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

           $nm_saida->saida("   <script type=\"text/javascript\" src=\"grid_product_snackbar_jquery-3.6.0.min.js\"></script>\r\n");
           $nm_saida->saida("   <script type=\"text/javascript\" src=\"grid_product_snackbar_ajax.js\"></script>\r\n");
           $nm_saida->saida("   <script type=\"text/javascript\" src=\"grid_product_snackbar_message.js\"></script>\r\n");
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
   if (($this->Ini->sc_export_ajax || $this->Ini->Export_det_zip) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_product_snackbar']['det_print'] == "print")
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
       $NM_css_cmp  = $this->Ini->path_link . "grid_product_snackbar/grid_product_snackbar_det_" . strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) . ".css";
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
   elseif (($_SESSION['sc_session'][$this->Ini->sc_page]['grid_product_snackbar']['det_print'] == "print" && strtoupper($nmgp_cor_print) == "PB") || $nmgp_tipo_pdf == "pb")
   {
       $nm_saida->saida(" <link rel=\"stylesheet\" type=\"text/css\" href=\"" . $this->Ini->path_link . "_lib/css/" . $this->Ini->str_schema_all . "_grid_bw.css\" /> \r\n");
       $nm_saida->saida(" <link rel=\"stylesheet\" type=\"text/css\" href=\"" . $this->Ini->path_link . "_lib/css/" . $this->Ini->str_schema_all . "_grid_bw" . $_SESSION['scriptcase']['reg_conf']['css_dir'] . ".css\" /> \r\n");
       $nm_saida->saida(" <link rel=\"stylesheet\" type=\"text/css\" href=\"" . $this->Ini->path_link . "grid_product_snackbar/grid_product_snackbar_det_" . strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) . ".css\" />\r\n");
   }
   else
   {
       $nm_saida->saida(" <link rel=\"stylesheet\" type=\"text/css\" href=\"" . $this->Ini->path_link . "_lib/css/" . $this->Ini->str_schema_all . "_grid.css\" /> \r\n");
       $nm_saida->saida(" <link rel=\"stylesheet\" type=\"text/css\" href=\"" . $this->Ini->path_link . "_lib/css/" . $this->Ini->str_schema_all . "_grid" . $_SESSION['scriptcase']['reg_conf']['css_dir'] . ".css\" /> \r\n");
       $nm_saida->saida(" <link rel=\"stylesheet\" type=\"text/css\" href=\"" . $this->Ini->path_link . "grid_product_snackbar/grid_product_snackbar_det_" . strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) . ".css\" />\r\n");
   }
       $nm_saida->saida(" <link rel=\"stylesheet\" href=\"" . $this->Ini->path_prod . "/third/font-awesome/css/all.min.css\" type=\"text/css\" media=\"screen\" />\r\n");
   if(isset($this->Ini->str_google_fonts) && !empty($this->Ini->str_google_fonts)) 
   { 
       $nm_saida->saida(" <link href=\"" . $this->Ini->str_google_fonts . "\" rel=\"stylesheet\" /> \r\n");
   } 
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_product_snackbar']['pdf_det'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_product_snackbar']['det_print'] != "print")
   {
       $nm_saida->saida(" <link rel=\"stylesheet\" type=\"text/css\" href=\"../_lib/buttons/" . $this->Ini->Str_btn_css . "\" /> \r\n");
       $nm_saida->saida(" <link rel=\"stylesheet\" href=\"../_lib/css/" . $_SESSION['scriptcase']['erro']['str_schema'] . "\" type=\"text/css\" media=\"screen\" />\r\n");
       $nm_saida->saida(" <link rel=\"stylesheet\" href=\"../_lib/css/" . $_SESSION['scriptcase']['erro']['str_schema_dir'] . "\" type=\"text/css\" media=\"screen\" />\r\n");
   }
   $nm_saida->saida("</HEAD>\r\n");
    $removeMargin = isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_product_snackbar']['link_info']['remove_margin']) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_product_snackbar']['link_info']['remove_margin'] ? 'margin: 0;' : '';
    $removeBorder = isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_product_snackbar']['link_info']['remove_border']) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_product_snackbar']['link_info']['remove_border'] ? 'border-width: 0' : '';
   if (!$this->Ini->Export_html_zip && !$this->Ini->Export_det_zip && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_product_snackbar']['det_print'] == "print")
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
   if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_product_snackbar']['link_info']['compact_mode']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_product_snackbar']['link_info']['compact_mode']) {
   $nm_saida->saida("<tr><td class=\"scGridTabelaTd scGridPage\">\r\n");
   $nm_saida->saida("        <style>\r\n");
   $nm_saida->saida("                .td_corner { width:3px; height:3px; }\r\n");
   $nm_saida->saida("        </style>\r\n");
   $nm_saida->saida("   <TABLE width=\"100%\" class=\"scGridHeader\" cellpadding=\"0\" cellspacing=\"0\">\r\n");
   $nm_saida->saida("    <TR>\r\n");
   $nm_saida->saida("     <TD class=\"td_corner\"><img width=\"3px\" height=\"3px\" src=\"" . $this->ini->path_img_modelo . "/nm_round_te.gif\" border=\"0px\"   alt=\"\" /></TD>\r\n");
   $nm_saida->saida("     <TD width=\"*\" bgcolor=\"#000000\"></TD>\r\n");
   $nm_saida->saida("     <TD class=\"td_corner\"><img width=\"3px\" height=\"3px\" src=\"" . $this->ini->path_img_modelo . "/nm_round_td.gif\" border=\"0px\"   alt=\"\" /></TD>\r\n");
   $nm_saida->saida("    </TR>\r\n");
   $nm_saida->saida("    <TR>\r\n");
   $nm_saida->saida("     <TD  bgcolor=\"#000000\"></TD>\r\n");
   $nm_saida->saida("     <TD style=\"padding: 0px\">\r\n");
   $nm_saida->saida("      <TABLE style=\"padding: 2px; border-spacing: 1px; border-width: 0px;\" width=\"100%\" class=\"scGridHeader\">\r\n");
   $nm_saida->saida("       <TR align=\"center\" class=\"scGridHeaderFont\">\r\n");
   $nm_saida->saida("        <TD>\r\n");
   $nm_saida->saida("         <TABLE style=\"padding: 0px; border-spacing: 0px; border-width: 0px;\" width=\"100%\">\r\n");
   $nm_saida->saida("          <TR align=\"center\" valign=\"middle\">\r\n");
   $nm_saida->saida("           <TD align=\"left\" rowspan=\"2\">\r\n");
   $nm_saida->saida("               \r\n");
   $nm_saida->saida("           </TD>\r\n");
   $nm_saida->saida("           <TD class=\"scGridHeaderFont\">\r\n");
   $nm_saida->saida("               \r\n");
   $nm_saida->saida("           </TD>\r\n");
   $nm_saida->saida("          </TR>\r\n");
   $nm_saida->saida("          <TR align=\"right\" valign=\"middle\">\r\n");
   $nm_saida->saida("           <TD class=\"scGridHeaderFont\">\r\n");
   $nm_saida->saida("               \r\n");
   $nm_saida->saida("           </TD>\r\n");
   $nm_saida->saida("          </TR>\r\n");
   $nm_saida->saida("         </TABLE>\r\n");
   $nm_saida->saida("        </TD>\r\n");
   $nm_saida->saida("       </TR>\r\n");
   $nm_saida->saida("      </TABLE>\r\n");
   $nm_saida->saida("     </TD>\r\n");
   $nm_saida->saida("     <TD  bgcolor=\"#000000\"></TD>\r\n");
   $nm_saida->saida("    </TR>\r\n");
   $nm_saida->saida("    <TR>\r\n");
   $nm_saida->saida("     <TD class=\"td_corner\"><img width=\"3px\" height=\"3px\" src=\"" . $this->ini->path_img_modelo . "/nm_round_be.gif\" border=\"0px\"   alt=\"\" /></TD>\r\n");
   $nm_saida->saida("     <TD width=\"*\" bgcolor=\"#000000\"></TD>\r\n");
   $nm_saida->saida("     <TD class=\"td_corner\"><img width=\"3px\" height=\"3px\" src=\"" . $this->ini->path_img_modelo . "/nm_round_bd.gif\" border=\"0px\"   alt=\"\" /></TD>\r\n");
   $nm_saida->saida("    </TR>\r\n");
   $nm_saida->saida("   </TABLE>\r\n");
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
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_product_snackbar']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['id_product'])) ? $this->New_label['id_product'] : ""; 
   $conteudo = trim(NM_encode_input($this->id_product)); 
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
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_id_product_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_id_product_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_product_snackbar']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['product_name'])) ? $this->New_label['product_name'] : ""; 
   $conteudo = trim($this->product_name); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_product_name_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_product_name_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_product_snackbar']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['product_code'])) ? $this->New_label['product_code'] : ""; 
   $conteudo = trim($this->product_code); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_product_code_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_product_code_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_product_snackbar']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['id_status'])) ? $this->New_label['id_status'] : ""; 
   $conteudo = trim(NM_encode_input($this->id_status)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $this->Lookup->lookup_id_status($conteudo , $this->id_status) ; 
          $str_tem_display = $conteudo;
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_id_status_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_id_status_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_product_snackbar']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['dateproduct'])) ? $this->New_label['dateproduct'] : ""; 
   $conteudo = trim(NM_encode_input($this->dateproduct)); 
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
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_dateproduct_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_dateproduct_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_product_snackbar']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['product_value'])) ? $this->New_label['product_value'] : ""; 
   $conteudo = trim(NM_encode_input($this->product_value)); 
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
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_product_value_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_product_value_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_product_snackbar']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['product_cost'])) ? $this->New_label['product_cost'] : ""; 
   $conteudo = trim(NM_encode_input($this->product_cost)); 
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
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_product_cost_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_product_cost_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_product_snackbar']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['stock'])) ? $this->New_label['stock'] : ""; 
   $conteudo = trim(NM_encode_input($this->stock)); 
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
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_stock_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_stock_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_product_snackbar']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['id_category'])) ? $this->New_label['id_category'] : ""; 
   $conteudo = trim(NM_encode_input($this->id_category)); 
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
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_id_category_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_id_category_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_product_snackbar']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['image'])) ? $this->New_label['image'] : ""; 
   $conteudo = $this->image; 
   $conteudo_original = ''; 
          if (empty($this->image) || $this->image == "none") 
          { 
              $conteudo = "&nbsp;" ; 
              $out_image = "" ; 
          } 
          elseif ($this->Ini->Gd_missing)
          { 
              $conteudo = "<span class=\"scErrorLine\">" . $this->Ini->Nm_lang['lang_errm_gd'] . "</span>";
              $out_image = "" ; 
          } 
          else   
          { 
              $out_image = $this->Ini->path_imag_temp . "/sc_" . "image_" . $_SESSION['scriptcase']['sc_num_img'] . session_id() . ".gif" ; 
              $_SESSION['scriptcase']['sc_num_img']++ ; 
              $arq_image = fopen($this->Ini->root. "/" . $out_image, "w") ;  
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access)) 
              { 
                  $nm_tmp = nm_conv_img_access(substr($conteudo, 0, 12));
                  if (substr($nm_tmp, 0, 4) == "*nm*") 
                  { 
                      $conteudo = nm_conv_img_access($conteudo);
                  } 
              } 
              if (substr($conteudo, 0, 4) == "*nm*") 
              { 
                  $conteudo = substr($conteudo, 4) ; 
                  $conteudo = base64_decode($conteudo) ; 
              } 
              $img_pos_bm = strpos($conteudo, "BM") ; 
              if (!$img_pos_bm === FALSE && $img_pos_bm == 78) 
              { 
                  $conteudo = substr($conteudo, $img_pos_bm) ; 
              } 
              fwrite($arq_image, $conteudo) ;  
              fclose($arq_image) ;  
              $sc_obj_img = new nm_trata_img($this->Ini->root . $out_image);
              $img_larg = $sc_obj_img->getWidth();
              $img_alt = $sc_obj_img->getHeight();
              $out1_image = $out_image; 
              $out_image = $this->Ini->path_imag_temp . "/sc_" . "image_" . $_SESSION['scriptcase']['sc_num_img'] . session_id() . ".gif" ; 
              $_SESSION['scriptcase']['sc_num_img']++ ; 
              $sc_obj_img = new nm_trata_img($this->Ini->root . $out1_image);
              $sc_obj_img->setWidth(150);
              $sc_obj_img->setHeight(150);
              $sc_obj_img->setManterAspecto(true);
              $sc_obj_img->createImg($this->Ini->root . $out_image);
              $loc_img_word = $this->Ini->root . $out_image;
              if ($this->Ini->sc_export_ajax_img) 
              { 
                  $tmp_image = fopen($loc_img_word, "rb"); 
                  $reg_image = fread($tmp_image, filesize($loc_img_word)); 
                  fclose($tmp_image);  
              } 
          } 
          if (!empty($out_image)) 
          { 
              if ($this->Ini->Export_img_zip)
              {
                  $this->Ini->Img_export_zip[] = $this->Ini->root . "/" . $out_image;
                  $Clear_path_img = str_replace($this->Ini->path_imag_temp . "/", "", $out_image);
                  $conteudo = "<img border=\"0\" src=\"" . $Clear_path_img . "\">"; 
              }
              elseif ($this->Ini->sc_export_ajax_img) 
              { 
                  $conteudo = "<img border=\"0\" src=\"data:image/jpeg;base64," . base64_encode($reg_image) . "\"/>" ; 
              } 
              elseif ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_product_snackbar']['opcao'] != "pdf") 
              { 
                  $conteudo = "<a href=\"javascript:nm_mostra_img('" . $out1_image . "', '$img_alt', '$img_larg')\"><img border=\"0\" src=\"$out_image\"></a>"; 
              } 
              else 
              { 
                  $conteudo = "<img border=\"0\" src=\"" . $this->NM_raiz_img . $out_image . "\">"; 
              } 
          }  
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_image_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_image_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_product_snackbar']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['service'])) ? $this->New_label['service'] : "Service"; 
   $conteudo = trim(NM_encode_input($this->service)); 
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
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_service_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_service_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_product_snackbar']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['kiosko'])) ? $this->New_label['kiosko'] : "Kiosko"; 
   $conteudo = trim(NM_encode_input($this->kiosko)); 
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
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_kiosko_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_kiosko_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_product_snackbar']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['entrada'])) ? $this->New_label['entrada'] : "Entrada"; 
   $conteudo = trim(NM_encode_input($this->entrada)); 
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
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_entrada_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_entrada_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_product_snackbar']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['jugador'])) ? $this->New_label['jugador'] : "Jugador"; 
   $conteudo = trim(NM_encode_input($this->jugador)); 
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
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_jugador_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_jugador_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_product_snackbar']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['visitante'])) ? $this->New_label['visitante'] : "Visitante"; 
   $conteudo = trim(NM_encode_input($this->visitante)); 
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
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_visitante_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_visitante_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_product_snackbar']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['tarjeta'])) ? $this->New_label['tarjeta'] : "Tarjeta"; 
   $conteudo = trim(NM_encode_input($this->tarjeta)); 
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
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_tarjeta_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_tarjeta_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_product_snackbar']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['minutos'])) ? $this->New_label['minutos'] : "Minutos"; 
   $conteudo = trim(NM_encode_input($this->minutos)); 
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
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_minutos_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_minutos_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_product_snackbar']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['tokens'])) ? $this->New_label['tokens'] : "Tokens"; 
   $conteudo = trim(NM_encode_input($this->tokens)); 
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
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_tokens_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_tokens_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_product_snackbar']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['comida'])) ? $this->New_label['comida'] : "Comida"; 
   $conteudo = trim(NM_encode_input($this->comida)); 
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
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_comida_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_comida_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_product_snackbar']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['score'])) ? $this->New_label['score'] : "Score"; 
   $conteudo = trim(NM_encode_input($this->score)); 
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
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_score_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_score_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_product_snackbar']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['poriva'])) ? $this->New_label['poriva'] : "Poriva"; 
   $conteudo = trim(NM_encode_input($this->poriva)); 
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
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_poriva_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_poriva_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_product_snackbar']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['cuentaventa'])) ? $this->New_label['cuentaventa'] : "Cuentaventa"; 
   $conteudo = trim(sc_strip_script($this->cuentaventa)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_cuentaventa_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_cuentaventa_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_product_snackbar']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['unidad'])) ? $this->New_label['unidad'] : "Unidad"; 
   $conteudo = trim(sc_strip_script($this->unidad)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_unidad_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_unidad_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_product_snackbar']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['tipoitem'])) ? $this->New_label['tipoitem'] : "Tipoitem"; 
   $conteudo = trim(sc_strip_script($this->tipoitem)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_tipoitem_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_tipoitem_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_product_snackbar']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['cuentacompra'])) ? $this->New_label['cuentacompra'] : "Cuentacompra"; 
   $conteudo = trim(sc_strip_script($this->cuentacompra)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_cuentacompra_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_cuentacompra_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_product_snackbar']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['precioventa'])) ? $this->New_label['precioventa'] : "Precioventa"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->precioventa))); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "9", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $str_tem_display = $conteudo;
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_precioventa_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_precioventa_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_product_snackbar']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['puntoventa'])) ? $this->New_label['puntoventa'] : "Puntoventa"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->puntoventa))); 
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
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_puntoventa_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_puntoventa_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_product_snackbar']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['orden'])) ? $this->New_label['orden'] : "Orden"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->orden))); 
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
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_orden_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_orden_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_product_snackbar']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['arcade_clasic'])) ? $this->New_label['arcade_clasic'] : "Arcade Clasic"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->arcade_clasic))); 
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
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_arcade_clasic_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_arcade_clasic_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_product_snackbar']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['ultfechaventa'])) ? $this->New_label['ultfechaventa'] : "Ultfechaventa"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->ultfechaventa))); 
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
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_ultfechaventa_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_ultfechaventa_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_product_snackbar']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['ingrediente'])) ? $this->New_label['ingrediente'] : "Ingrediente"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->ingrediente))); 
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
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_ingrediente_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_ingrediente_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
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
   $nm_saida->saida("                  action=\"grid_product_snackbar_iframe_prt.php\" \r\n");
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
   $nm_saida->saida("       NovaJanela = window.open (\"grid_product_snackbar_doc.php?nmgp_parms=\" + campo1, \"ScriptCase\", \"resizable\");\r\n");
   $nm_saida->saida("   }\r\n");
   $nm_saida->saida("   function nm_gp_move(x, y, z, p, g, crt, ajax, chart_level, page_break_pdf, SC_module_export, use_pass_pdf, pdf_all_cab, pdf_all_label, pdf_label_group, pdf_zip) \r\n");
   $nm_saida->saida("   {\r\n");
   $nm_saida->saida("       if (\"pdf_det\" == x && \"S\" == ajax)\r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("           $('#TB_window').remove();\r\n");
   $nm_saida->saida("           $('body').append(\"<div id='TB_window'></div>\");\r\n");
   $nm_saida->saida("               nm_submit_modal(\"" . $this->Ini->path_link . "grid_product_snackbar/grid_product_snackbar_export_email.php?script_case_init={$this->Ini->sc_page}&path_img={$this->Ini->path_img_global}&path_btn={$this->Ini->path_botoes}&sType=pdf_det&sAdd=__E__nmgp_tipo_pdf=\" + z + \"__E__sc_parms_pdf=\" + p + \"__E__sc_create_charts=\" + crt + \"__E__sc_graf_pdf=\" + g + \"__E__chart_level=\" + chart_level + \"__E__Det_use_pass_pdf=\" + use_pass_pdf + \"__E__Det_pdf_zip=\" + pdf_zip + \"&nm_opc=pdf_det&KeepThis=true&TB_iframe=true&modal=true\", '');\r\n");
   $nm_saida->saida("       }\r\n");
   $nm_saida->saida("       else\r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("           window.location = \"" . $this->Ini->path_link . "grid_product_snackbar/index.php?nmgp_opcao=pdf_det&nmgp_tipo_pdf=\" + z + \"&nmgp_parms_pdf=\" + p +  \"&nmgp_graf_pdf=\" + g + \"&Det_use_pass_pdf=\" + use_pass_pdf + \"&Det_pdf_zip=\" + pdf_zip + \"&script_case_init=" . NM_encode_input($this->Ini->sc_page) . "\";\r\n");
   $nm_saida->saida("       }\r\n");
   $nm_saida->saida("   }\r\n");
   $nm_saida->saida("   function nm_gp_print_conf(tp, cor, res_cons, password, ajax, str_type, bol_param)\r\n");
   $nm_saida->saida("   {\r\n");
   $nm_saida->saida("       if (\"D\" == ajax)\r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("           $('#TB_window').remove();\r\n");
   $nm_saida->saida("           $('body').append(\"<div id='TB_window'></div>\");\r\n");
   $nm_saida->saida("               nm_submit_modal(\"" . $this->Ini->path_link . "grid_product_snackbar/grid_product_snackbar_export_email.php?script_case_init={$this->Ini->sc_page}&path_img={$this->Ini->path_img_global}&path_btn={$this->Ini->path_botoes}&sType=\"+ str_type +\"&sAdd=__E__nmgp_tipo_print=\" + tp + \"__E__nmgp_cor_print=\" + cor + \"&KeepThis=true&TB_iframe=true&modal=true\", bol_param);\r\n");
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
   $nm_saida->saida("   function nm_mostra_img(imagem, altura, largura)\r\n");
   $nm_saida->saida("   {\r\n");
   $nm_saida->saida("       tb_show(\"\", imagem, \"\");\r\n");
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
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_product_snackbar']['det_print'] != "print" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_product_snackbar']['pdf_det']) 
   { 
       $nm_saida->saida("   <tr  id=\"obj_barra_top\"><td class=\"scGridTabelaTd\">\r\n");
       $nm_saida->saida("    <table class=\"scGridToolbar\" style=\"padding: 0px; border-spacing: 0px; border-width: 0px; vertical-align: top;\" valign=\"top\" width=\"100%\"><tr>\r\n");
       $nm_saida->saida("     <td class=\"scGridToolbarPadding\" nowrap valign=\"middle\" align=\"left\" width=\"33%\">\r\n");
       $nm_saida->saida("         </td> \r\n");
       $nm_saida->saida("          <td class=\"scGridToolbarPadding\" nowrap valign=\"middle\" align=\"center\" width=\"33%\"> \r\n");
       if ($this->nmgp_botoes['det_pdf'] == "on")
       {
         $this->nm_btn_exist['det_pdf'][] = "Dpdf_top";
         $Cod_Btn = nmButtonOutput($this->arr_buttons, "bpdf", "", "", "Dpdf_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "thickbox", "" . $this->Ini->path_link . "grid_product_snackbar/grid_product_snackbar_config_pdf.php?nm_opc=pdf_det&nm_target=0&nm_cor=cor&papel=1&orientacao=1&largura=1200&conf_larg=S&conf_fonte=10&language=es&conf_socor=N&sc_ver_93=" . s . "&password=n&pdf_zip=N&KeepThis=false&TB_iframe=true&modal=true", "", "only_text", "text_right", "", "", "", "", "", "", "");
         $nm_saida->saida("           $Cod_Btn \r\n");
       }
       if ($this->nmgp_botoes['det_print'] == "on")
       {
         $this->nm_btn_exist['det_print'][] = "Dprint_top";
         $Cod_Btn = nmButtonOutput($this->arr_buttons, "bprint", "", "", "Dprint_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "thickbox", "" . $this->Ini->path_link . "grid_product_snackbar/grid_product_snackbar_config_print.php?nm_opc=detalhe&nm_cor=CO&password=n&language=es&KeepThis=true&TB_iframe=true&modal=true", "", "only_text", "text_right", "", "", "", "", "", "", "");
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
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_product_snackbar']['det_print'] != "print" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_product_snackbar']['pdf_det']) 
   { 
       $nm_saida->saida("   <tr  id=\"obj_barra_top\"><td class=\"scGridTabelaTd\">\r\n");
       $nm_saida->saida("    <table class=\"scGridToolbar\" style=\"padding: 0px; border-spacing: 0px; border-width: 0px; vertical-align: top;\" valign=\"top\" width=\"100%\"><tr>\r\n");
       $nm_saida->saida("     <td class=\"scGridToolbarPadding\" nowrap valign=\"middle\" align=\"left\" width=\"33%\">\r\n");
       if ($this->nmgp_botoes['det_pdf'] == "on")
       {
         $this->nm_btn_exist['det_pdf'][] = "Dpdf_top";
         $Cod_Btn = nmButtonOutput($this->arr_buttons, "bpdf", "", "", "Dpdf_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "thickbox", "" . $this->Ini->path_link . "grid_product_snackbar/grid_product_snackbar_config_pdf.php?nm_opc=pdf_det&nm_target=0&nm_cor=cor&papel=1&orientacao=1&largura=1200&conf_larg=S&conf_fonte=10&language=es&conf_socor=N&sc_ver_93=" . s . "&password=n&pdf_zip=N&KeepThis=false&TB_iframe=true&modal=true", "", "only_text", "text_right", "", "", "", "", "", "", "");
         $nm_saida->saida("           $Cod_Btn \r\n");
       }
       if ($this->nmgp_botoes['det_print'] == "on")
       {
         $this->nm_btn_exist['det_print'][] = "Dprint_top";
         $Cod_Btn = nmButtonOutput($this->arr_buttons, "bprint", "", "", "Dprint_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "thickbox", "" . $this->Ini->path_link . "grid_product_snackbar/grid_product_snackbar_config_print.php?nm_opc=detalhe&nm_cor=CO&password=n&language=es&KeepThis=true&TB_iframe=true&modal=true", "", "only_text", "text_right", "", "", "", "", "", "", "");
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
