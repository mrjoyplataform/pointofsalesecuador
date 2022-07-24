<?php

class pdfreport_sales_comprobante_boleto_json
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
      if (!$_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_sales_comprobante_boleto']['embutida'])
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
          $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_sales_comprobante_boleto']['opcao'] = "";
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
                   nm_limpa_str_pdfreport_sales_comprobante_boleto($cadapar[1]);
                   nm_protect_num_pdfreport_sales_comprobante_boleto($cadapar[0], $cadapar[1]);
                   if ($cadapar[1] == "@ ") {$cadapar[1] = trim($cadapar[1]); }
                   $Tmp_par   = $cadapar[0];
                   $$Tmp_par = $cadapar[1];
                   if ($Tmp_par == "nmgp_opcao")
                   {
                       $_SESSION['sc_session'][$script_case_init]['pdfreport_sales_comprobante_boleto']['opcao'] = $cadapar[1];
                   }
               }
          }
      }
      if (isset($clavesri)) 
      {
          $_SESSION['clavesri'] = $clavesri;
          nm_limpa_str_pdfreport_sales_comprobante_boleto($_SESSION["clavesri"]);
      }
      if (isset($ncomp)) 
      {
          $_SESSION['ncomp'] = $ncomp;
          nm_limpa_str_pdfreport_sales_comprobante_boleto($_SESSION["ncomp"]);
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
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_sales_comprobante_boleto']['SC_Ind_Groupby'] == "sc_free_group_by" && empty($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_sales_comprobante_boleto']['SC_Gb_Free_cmp']))
      {
          $this->Tem_json_res  = false;
      }
      if (!is_file($this->Ini->root . $this->Ini->path_link . "pdfreport_sales_comprobante_boleto/pdfreport_sales_comprobante_boleto_res_json.class.php"))
      {
          $this->Tem_json_res  = false;
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_sales_comprobante_boleto']['embutida'] && isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_sales_comprobante_boleto']['json_label']))
      {
          $this->Json_use_label = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_sales_comprobante_boleto']['json_label'];
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_sales_comprobante_boleto']['embutida'] && isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_sales_comprobante_boleto']['json_format']))
      {
          $this->Json_format = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_sales_comprobante_boleto']['json_format'];
      }
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      if (!$_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_sales_comprobante_boleto']['embutida'] && !$this->Ini->sc_export_ajax) {
          require_once($this->Ini->path_lib_php . "/sc_progress_bar.php");
          $this->pb = new scProgressBar();
          $this->pb->setRoot($this->Ini->root);
          $this->pb->setDir($_SESSION['scriptcase']['pdfreport_sales_comprobante_boleto']['glo_nm_path_imag_temp'] . "/");
          $this->pb->setProgressbarMd5($_GET['pbmd5']);
          $this->pb->initialize();
          $this->pb->setReturnUrl("./");
          $this->pb->setReturnOption($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_sales_comprobante_boleto']['json_return']);
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
      $this->Arq_zip      = $this->Arquivo . "_pdfreport_sales_comprobante_boleto.zip";
      $this->Arquivo     .= "_pdfreport_sales_comprobante_boleto";
      $this->Arquivo     .= ".json";
      $this->Tit_doc      = "pdfreport_sales_comprobante_boleto.json";
      $this->Tit_zip      = "pdfreport_sales_comprobante_boleto.zip";
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
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_sales_comprobante_boleto']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_sales_comprobante_boleto']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_sales_comprobante_boleto']['where_pesq_filtro'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_sales_comprobante_boleto']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_sales_comprobante_boleto']['campos_busca']))
      { 
          $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_sales_comprobante_boleto']['campos_busca'];
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
              $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->codpago_sri = $Busca_temp['codpago_sri']; 
          $tmp_pos = strpos($this->codpago_sri, "##@@");
          if ($tmp_pos !== false && !is_array($this->codpago_sri))
          {
              $this->codpago_sri = substr($this->codpago_sri, 0, $tmp_pos);
          }
          $this->id_sales = $Busca_temp['id_sales']; 
          $tmp_pos = strpos($this->id_sales, "##@@");
          if ($tmp_pos !== false && !is_array($this->id_sales))
          {
              $this->id_sales = substr($this->id_sales, 0, $tmp_pos);
          }
          $this->sales_price = $Busca_temp['sales_price']; 
          $tmp_pos = strpos($this->sales_price, "##@@");
          if ($tmp_pos !== false && !is_array($this->sales_price))
          {
              $this->sales_price = substr($this->sales_price, 0, $tmp_pos);
          }
          $this->sales_discount = $Busca_temp['sales_discount']; 
          $tmp_pos = strpos($this->sales_discount, "##@@");
          if ($tmp_pos !== false && !is_array($this->sales_discount))
          {
              $this->sales_discount = substr($this->sales_discount, 0, $tmp_pos);
          }
          $this->total = $Busca_temp['total']; 
          $tmp_pos = strpos($this->total, "##@@");
          if ($tmp_pos !== false && !is_array($this->total))
          {
              $this->total = substr($this->total, 0, $tmp_pos);
          }
      } 
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_sales_comprobante_boleto']['json_name']))
      {
          $Pos = strrpos($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_sales_comprobante_boleto']['json_name'], ".");
          if ($Pos === false) {
              $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_sales_comprobante_boleto']['json_name'] .= ".json";
          }
          $this->Arquivo = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_sales_comprobante_boleto']['json_name'];
          $this->Arq_zip = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_sales_comprobante_boleto']['json_name'];
          $this->Tit_doc = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_sales_comprobante_boleto']['json_name'];
          $Pos = strrpos($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_sales_comprobante_boleto']['json_name'], ".");
          if ($Pos !== false) {
              $this->Arq_zip = substr($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_sales_comprobante_boleto']['json_name'], 0, $Pos);
          }
          $this->Arq_zip .= ".zip";
          $this->Tit_zip  = $this->Arq_zip;
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_sales_comprobante_boleto']['json_name']);
      }
      $this->arr_export = array('label' => array(), 'lines' => array());
      $this->arr_span   = array();

      if (!$_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_sales_comprobante_boleto']['embutida'])
      { 
          $this->Json_f = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
          $this->Zip_f = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arq_zip;
          $json_f = fopen($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo, "w");
      }
      $this->nm_field_dinamico = array();
      $this->nm_order_dinamico = array();
      $nmgp_select_count = "SELECT count(*) AS countTest from " . $this->Ini->nm_tabela; 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
          $nmgp_select = "SELECT id_sales, sales_price, sales_discount, total, str_replace (convert(char(10),datesales,102), '.', '-') + ' ' + convert(char(8),datesales,20), id_status, idcaja, idcliente, cliente, direccion, telefono, factura, serie, clave_acceso, enviosri, str_replace (convert(char(10),fechaenvio,102), '.', '-') + ' ' + convert(char(8),fechaenvio,20), uniqueid, estado, fechaid, importe_recibido, codigoid, totalSinImpuestos, totalDescuento, baseImponible, valoriva, importeTotal, idpago, totalpago, cliente_email, idempleado, idturno, facturaxml, facturaxml64, codpago_sri from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
      { 
          $nmgp_select = "SELECT id_sales, sales_price, sales_discount, total, datesales, id_status, idcaja, idcliente, cliente, direccion, telefono, factura, serie, clave_acceso, enviosri, fechaenvio, uniqueid, estado, fechaid, importe_recibido, codigoid, totalSinImpuestos, totalDescuento, baseImponible, valoriva, importeTotal, idpago, totalpago, cliente_email, idempleado, idturno, facturaxml, facturaxml64, codpago_sri from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
       $nmgp_select = "SELECT id_sales, sales_price, sales_discount, total, convert(char(23),datesales,121), id_status, idcaja, idcliente, cliente, direccion, telefono, factura, serie, clave_acceso, enviosri, convert(char(23),fechaenvio,121), uniqueid, estado, fechaid, importe_recibido, codigoid, totalSinImpuestos, totalDescuento, baseImponible, valoriva, importeTotal, idpago, totalpago, cliente_email, idempleado, idturno, facturaxml, facturaxml64, codpago_sri from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
      { 
          $nmgp_select = "SELECT id_sales, sales_price, sales_discount, total, datesales, id_status, idcaja, idcliente, cliente, direccion, telefono, factura, serie, clave_acceso, enviosri, fechaenvio, uniqueid, estado, TO_DATE(TO_CHAR(fechaid, 'yyyy-mm-dd hh24:mi:ss'), 'yyyy-mm-dd hh24:mi:ss'), importe_recibido, codigoid, totalSinImpuestos, totalDescuento, baseImponible, valoriva, importeTotal, idpago, totalpago, cliente_email, idempleado, idturno, facturaxml, facturaxml64, codpago_sri from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
      { 
          $nmgp_select = "SELECT id_sales, sales_price, sales_discount, total, EXTEND(datesales, YEAR TO FRACTION), id_status, idcaja, idcliente, cliente, direccion, telefono, factura, serie, clave_acceso, enviosri, EXTEND(fechaenvio, YEAR TO FRACTION), uniqueid, estado, fechaid, importe_recibido, codigoid, totalSinImpuestos, totalDescuento, baseImponible, valoriva, importeTotal, idpago, totalpago, cliente_email, idempleado, idturno, facturaxml, facturaxml64, codpago_sri from " . $this->Ini->nm_tabela; 
      } 
      else 
      { 
          $nmgp_select = "SELECT id_sales, sales_price, sales_discount, total, datesales, id_status, idcaja, idcliente, cliente, direccion, telefono, factura, serie, clave_acceso, enviosri, fechaenvio, uniqueid, estado, fechaid, importe_recibido, codigoid, totalSinImpuestos, totalDescuento, baseImponible, valoriva, importeTotal, idpago, totalpago, cliente_email, idempleado, idturno, facturaxml, facturaxml64, codpago_sri from " . $this->Ini->nm_tabela; 
      } 
      $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_sales_comprobante_boleto']['where_pesq'];
      $nmgp_select_count .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_sales_comprobante_boleto']['where_pesq'];
      $nmgp_order_by = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_sales_comprobante_boleto']['order_grid'];
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
         if (!$_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_sales_comprobante_boleto']['embutida'] && !$this->Ini->sc_export_ajax) {
             $Mens_bar = NM_charset_to_utf8($this->Ini->Nm_lang['lang_othr_prcs']);
             $this->pb->setProgressbarMessage($Mens_bar . ": " . $this->SC_seq_register . $PB_tot);
             $this->pb->addSteps(1);
         }
         $this->id_sales = $rs->fields[0] ;  
         $this->id_sales = (string)$this->id_sales;
         $this->sales_price = $rs->fields[1] ;  
         $this->sales_price =  str_replace(",", ".", $this->sales_price);
         $this->sales_price = (string)$this->sales_price;
         $this->sales_discount = $rs->fields[2] ;  
         $this->sales_discount =  str_replace(",", ".", $this->sales_discount);
         $this->sales_discount = (string)$this->sales_discount;
         $this->total = $rs->fields[3] ;  
         $this->total =  str_replace(",", ".", $this->total);
         $this->total = (string)$this->total;
         $this->datesales = $rs->fields[4] ;  
         $this->id_status = $rs->fields[5] ;  
         $this->id_status = (string)$this->id_status;
         $this->idcaja = $rs->fields[6] ;  
         $this->idcaja = (string)$this->idcaja;
         $this->idcliente = $rs->fields[7] ;  
         $this->cliente = $rs->fields[8] ;  
         $this->direccion = $rs->fields[9] ;  
         $this->telefono = $rs->fields[10] ;  
         $this->factura = $rs->fields[11] ;  
         $this->factura = (string)$this->factura;
         $this->serie = $rs->fields[12] ;  
         $this->clave_acceso = $rs->fields[13] ;  
         $this->enviosri = $rs->fields[14] ;  
         $this->enviosri = (string)$this->enviosri;
         $this->fechaenvio = $rs->fields[15] ;  
         $this->uniqueid = $rs->fields[16] ;  
         $this->estado = $rs->fields[17] ;  
         $this->estado = (string)$this->estado;
         $this->fechaid = $rs->fields[18] ;  
         $this->importe_recibido = $rs->fields[19] ;  
         $this->importe_recibido =  str_replace(",", ".", $this->importe_recibido);
         $this->importe_recibido = (string)$this->importe_recibido;
         $this->codigoid = $rs->fields[20] ;  
         $this->totalsinimpuestos = $rs->fields[21] ;  
         $this->totalsinimpuestos = (string)$this->totalsinimpuestos;
         $this->totaldescuento = $rs->fields[22] ;  
         $this->totaldescuento =  str_replace(",", ".", $this->totaldescuento);
         $this->totaldescuento = (string)$this->totaldescuento;
         $this->baseimponible = $rs->fields[23] ;  
         $this->baseimponible = (string)$this->baseimponible;
         $this->valoriva = $rs->fields[24] ;  
         $this->valoriva = (string)$this->valoriva;
         $this->importetotal = $rs->fields[25] ;  
         $this->importetotal =  str_replace(",", ".", $this->importetotal);
         $this->importetotal = (string)$this->importetotal;
         $this->idpago = $rs->fields[26] ;  
         $this->idpago = (string)$this->idpago;
         $this->totalpago = $rs->fields[27] ;  
         $this->totalpago =  str_replace(",", ".", $this->totalpago);
         $this->totalpago = (string)$this->totalpago;
         $this->cliente_email = $rs->fields[28] ;  
         $this->idempleado = $rs->fields[29] ;  
         $this->idturno = $rs->fields[30] ;  
         $this->idturno = (string)$this->idturno;
         $this->facturaxml = $rs->fields[31] ;  
         $this->facturaxml64 = $rs->fields[32] ;  
         $this->codpago_sri = $rs->fields[33] ;  
         $this->sc_proc_grid = true; 
         foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_sales_comprobante_boleto']['field_order'] as $Cada_col)
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
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_sales_comprobante_boleto']['embutida'])
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
              require_once($this->Ini->path_aplicacao . "pdfreport_sales_comprobante_boleto_res_json.class.php");
              $this->Res = new pdfreport_sales_comprobante_boleto_res_json();
              $this->prep_modulos("Res");
              $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_sales_comprobante_boleto']['json_res_grid'] = true;
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
                  $Arq_res   = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_sales_comprobante_boleto']['json_res_file']['json'];
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
                  unlink($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_sales_comprobante_boleto']['json_res_file']['json']);
              }
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_sales_comprobante_boleto']['json_res_grid']);
          } 
      }
      if(isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_sales_comprobante_boleto']['export_sel_columns']['field_order']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_sales_comprobante_boleto']['field_order'] = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_sales_comprobante_boleto']['export_sel_columns']['field_order'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_sales_comprobante_boleto']['export_sel_columns']['field_order']);
      }
      if(isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_sales_comprobante_boleto']['export_sel_columns']['usr_cmp_sel']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_sales_comprobante_boleto']['usr_cmp_sel'] = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_sales_comprobante_boleto']['export_sel_columns']['usr_cmp_sel'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_sales_comprobante_boleto']['export_sel_columns']['usr_cmp_sel']);
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
   //----- sales_price
   function NM_export_sales_price()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->sales_price, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['sales_price'])) ? $this->New_label['sales_price'] : "Sales Price"; 
         }
         else
         {
             $SC_Label = "sales_price"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->sales_price;
   }
   //----- sales_discount
   function NM_export_sales_discount()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->sales_discount, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['sales_discount'])) ? $this->New_label['sales_discount'] : "Sales Discount"; 
         }
         else
         {
             $SC_Label = "sales_discount"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->sales_discount;
   }
   //----- total
   function NM_export_total()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->total, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['total'])) ? $this->New_label['total'] : "Total"; 
         }
         else
         {
             $SC_Label = "total"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->total;
   }
   //----- datesales
   function NM_export_datesales()
   {
         if ($this->Json_format)
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
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['datesales'])) ? $this->New_label['datesales'] : "Datesales"; 
         }
         else
         {
             $SC_Label = "datesales"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->datesales;
   }
   //----- id_status
   function NM_export_id_status()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->id_status, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['id_status'])) ? $this->New_label['id_status'] : "Id Status"; 
         }
         else
         {
             $SC_Label = "id_status"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->id_status;
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
   //----- idcliente
   function NM_export_idcliente()
   {
         $this->idcliente = NM_charset_to_utf8($this->idcliente);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['idcliente'])) ? $this->New_label['idcliente'] : "Idcliente"; 
         }
         else
         {
             $SC_Label = "idcliente"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->idcliente;
   }
   //----- cliente
   function NM_export_cliente()
   {
         $this->cliente = NM_charset_to_utf8($this->cliente);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['cliente'])) ? $this->New_label['cliente'] : "Cliente"; 
         }
         else
         {
             $SC_Label = "cliente"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->cliente;
   }
   //----- direccion
   function NM_export_direccion()
   {
         $this->direccion = NM_charset_to_utf8($this->direccion);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['direccion'])) ? $this->New_label['direccion'] : "Direccion"; 
         }
         else
         {
             $SC_Label = "direccion"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->direccion;
   }
   //----- telefono
   function NM_export_telefono()
   {
         $this->telefono = NM_charset_to_utf8($this->telefono);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['telefono'])) ? $this->New_label['telefono'] : "Telefono"; 
         }
         else
         {
             $SC_Label = "telefono"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->telefono;
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
   //----- serie
   function NM_export_serie()
   {
         $this->serie = NM_charset_to_utf8($this->serie);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['serie'])) ? $this->New_label['serie'] : "Serie"; 
         }
         else
         {
             $SC_Label = "serie"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->serie;
   }
   //----- clave_acceso
   function NM_export_clave_acceso()
   {
         $this->clave_acceso = NM_charset_to_utf8($this->clave_acceso);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['clave_acceso'])) ? $this->New_label['clave_acceso'] : "Clave Acceso"; 
         }
         else
         {
             $SC_Label = "clave_acceso"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->clave_acceso;
   }
   //----- enviosri
   function NM_export_enviosri()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->enviosri, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['enviosri'])) ? $this->New_label['enviosri'] : "Enviosri"; 
         }
         else
         {
             $SC_Label = "enviosri"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->enviosri;
   }
   //----- fechaenvio
   function NM_export_fechaenvio()
   {
         if ($this->Json_format)
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
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['fechaenvio'])) ? $this->New_label['fechaenvio'] : "Fechaenvio"; 
         }
         else
         {
             $SC_Label = "fechaenvio"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->fechaenvio;
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
   //----- estado
   function NM_export_estado()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->estado, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['estado'])) ? $this->New_label['estado'] : "Estado"; 
         }
         else
         {
             $SC_Label = "estado"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->estado;
   }
   //----- fechaid
   function NM_export_fechaid()
   {
         if ($this->Json_format)
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
         }
         $this->fechaid = NM_charset_to_utf8($this->fechaid);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['fechaid'])) ? $this->New_label['fechaid'] : "Fechaid"; 
         }
         else
         {
             $SC_Label = "fechaid"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->fechaid;
   }
   //----- importe_recibido
   function NM_export_importe_recibido()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->importe_recibido, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['importe_recibido'])) ? $this->New_label['importe_recibido'] : "Importe Recibido"; 
         }
         else
         {
             $SC_Label = "importe_recibido"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->importe_recibido;
   }
   //----- codigoid
   function NM_export_codigoid()
   {
         $this->codigoid = NM_charset_to_utf8($this->codigoid);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['codigoid'])) ? $this->New_label['codigoid'] : "Codigoid"; 
         }
         else
         {
             $SC_Label = "codigoid"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->codigoid;
   }
   //----- totalsinimpuestos
   function NM_export_totalsinimpuestos()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->totalsinimpuestos, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "4", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['totalsinimpuestos'])) ? $this->New_label['totalsinimpuestos'] : "Total Sin Impuestos"; 
         }
         else
         {
             $SC_Label = "totalsinimpuestos"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->totalsinimpuestos;
   }
   //----- totaldescuento
   function NM_export_totaldescuento()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->totaldescuento, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['totaldescuento'])) ? $this->New_label['totaldescuento'] : "Total Descuento"; 
         }
         else
         {
             $SC_Label = "totaldescuento"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->totaldescuento;
   }
   //----- baseimponible
   function NM_export_baseimponible()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->baseimponible, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "4", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['baseimponible'])) ? $this->New_label['baseimponible'] : "Base Imponible"; 
         }
         else
         {
             $SC_Label = "baseimponible"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->baseimponible;
   }
   //----- valoriva
   function NM_export_valoriva()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->valoriva, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "4", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['valoriva'])) ? $this->New_label['valoriva'] : "Valoriva"; 
         }
         else
         {
             $SC_Label = "valoriva"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->valoriva;
   }
   //----- importetotal
   function NM_export_importetotal()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->importetotal, "", ".", "2", "S", "2", "$", "V:3:12", "-"); 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['importetotal'])) ? $this->New_label['importetotal'] : "Importe Total"; 
         }
         else
         {
             $SC_Label = "importetotal"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->importetotal;
   }
   //----- idpago
   function NM_export_idpago()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->idpago, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['idpago'])) ? $this->New_label['idpago'] : "Idpago"; 
         }
         else
         {
             $SC_Label = "idpago"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->idpago;
   }
   //----- totalpago
   function NM_export_totalpago()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->totalpago, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['totalpago'])) ? $this->New_label['totalpago'] : "Totalpago"; 
         }
         else
         {
             $SC_Label = "totalpago"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->totalpago;
   }
   //----- cliente_email
   function NM_export_cliente_email()
   {
         $this->cliente_email = NM_charset_to_utf8($this->cliente_email);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['cliente_email'])) ? $this->New_label['cliente_email'] : "Cliente Email"; 
         }
         else
         {
             $SC_Label = "cliente_email"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->cliente_email;
   }
   //----- idempleado
   function NM_export_idempleado()
   {
         $this->idempleado = NM_charset_to_utf8($this->idempleado);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['idempleado'])) ? $this->New_label['idempleado'] : "Idempleado"; 
         }
         else
         {
             $SC_Label = "idempleado"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->idempleado;
   }
   //----- idturno
   function NM_export_idturno()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->idturno, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['idturno'])) ? $this->New_label['idturno'] : "Idturno"; 
         }
         else
         {
             $SC_Label = "idturno"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->idturno;
   }
   //----- facturaxml
   function NM_export_facturaxml()
   {
         $this->facturaxml = NM_charset_to_utf8($this->facturaxml);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['facturaxml'])) ? $this->New_label['facturaxml'] : "Facturaxml"; 
         }
         else
         {
             $SC_Label = "facturaxml"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->facturaxml;
   }
   //----- facturaxml64
   function NM_export_facturaxml64()
   {
         $this->facturaxml64 = NM_charset_to_utf8($this->facturaxml64);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['facturaxml64'])) ? $this->New_label['facturaxml64'] : "Facturaxml 64"; 
         }
         else
         {
             $SC_Label = "facturaxml64"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->facturaxml64;
   }
   //----- codpago_sri
   function NM_export_codpago_sri()
   {
         $this->codpago_sri = NM_charset_to_utf8($this->codpago_sri);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['codpago_sri'])) ? $this->New_label['codpago_sri'] : "Codpago Sri"; 
         }
         else
         {
             $SC_Label = "codpago_sri"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->codpago_sri;
   }
   //----- lineas
   function NM_export_lineas()
   {
         $this->lineas = NM_charset_to_utf8($this->lineas);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['lineas'])) ? $this->New_label['lineas'] : "lineas"; 
         }
         else
         {
             $SC_Label = "lineas"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->lineas;
   }
   //----- lineas_item_total
   function NM_export_lineas_item_total()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->lineas_item_total, "", ".", "2", "S", "2", "$", "V:3:12", "-"); 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['lineas_item_total'])) ? $this->New_label['lineas_item_total'] : "Item Total"; 
         }
         else
         {
             $SC_Label = "lineas_item_total"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->lineas_item_total;
   }
   //----- lineas_producto
   function NM_export_lineas_producto()
   {
         $this->lineas_producto = NM_charset_to_utf8($this->lineas_producto);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['lineas_producto'])) ? $this->New_label['lineas_producto'] : "Producto"; 
         }
         else
         {
             $SC_Label = "lineas_producto"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->lineas_producto;
   }
   //----- lineas_quantity
   function NM_export_lineas_quantity()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->lineas_quantity, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['lineas_quantity'])) ? $this->New_label['lineas_quantity'] : "Quantity"; 
         }
         else
         {
             $SC_Label = "lineas_quantity"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->lineas_quantity;
   }
   //----- logo
   function NM_export_logo()
   {
         $this->logo = NM_charset_to_utf8($this->logo);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['logo'])) ? $this->New_label['logo'] : "logo"; 
         }
         else
         {
             $SC_Label = "logo"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->logo;
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
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_sales_comprobante_boleto']['json_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_sales_comprobante_boleto']['json_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_sales_comprobante_boleto'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_sales_comprobante_boleto'][$path_doc_md5][1] = $this->Tit_doc;
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
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_sales_comprobante_boleto']['json_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_sales_comprobante_boleto']['json_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_sales_comprobante_boleto'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_sales_comprobante_boleto'][$path_doc_md5][1] = $this->Tit_doc;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE><?php echo $this->Ini->Nm_lang['lang_othr_chart_title'] ?> sales :: JSON</TITLE>
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
<form name="Fdown" method="get" action="pdfreport_sales_comprobante_boleto_download.php" target="_blank" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="pdfreport_sales_comprobante_boleto"> 
<input type="hidden" name="nm_name_doc" value="<?php echo $path_doc_md5 ?>"> 
</form>
<FORM name="F0" method=post action="./" style="display: none"> 
<INPUT type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<INPUT type="hidden" name="nmgp_opcao" value="<?php echo NM_encode_input($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_sales_comprobante_boleto']['json_return']); ?>"> 
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
