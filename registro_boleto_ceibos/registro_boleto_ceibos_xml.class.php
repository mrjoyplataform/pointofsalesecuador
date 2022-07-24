<?php

class registro_boleto_ceibos_xml
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
   var $count_ger;
   var $sum_puntos;

   //---- 
   function __construct()
   {
      $this->nm_data   = new nm_data("es");
   }

   //---- 
   function monta_xml()
   {
      $this->inicializa_vars();
      $this->grava_arquivo();
      if (!$_SESSION['sc_session'][$this->Ini->sc_page]['registro_boleto_ceibos']['embutida'])
      {
          if ($this->Ini->sc_export_ajax)
          {
              $this->Arr_result['file_export']  = NM_charset_to_utf8($this->Xml_f);
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
      else
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['registro_boleto_ceibos']['opcao'] = "";
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
                   nm_limpa_str_registro_boleto_ceibos($cadapar[1]);
                   nm_protect_num_registro_boleto_ceibos($cadapar[0], $cadapar[1]);
                   if ($cadapar[1] == "@ ") {$cadapar[1] = trim($cadapar[1]); }
                   $Tmp_par   = $cadapar[0];
                   $$Tmp_par = $cadapar[1];
                   if ($Tmp_par == "nmgp_opcao")
                   {
                       $_SESSION['sc_session'][$script_case_init]['registro_boleto_ceibos']['opcao'] = $cadapar[1];
                   }
               }
          }
      }
      if (isset($boletoqr)) 
      {
          $_SESSION['boletoqr'] = $boletoqr;
          nm_limpa_str_registro_boleto_ceibos($_SESSION["boletoqr"]);
      }
      if (isset($fullphone)) 
      {
          $_SESSION['fullphone'] = $fullphone;
          nm_limpa_str_registro_boleto_ceibos($_SESSION["fullphone"]);
      }
      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      $this->New_Format  = true;
      $this->Xml_tag_label = true;
      $this->Tem_xml_res = false;
      $this->Xml_password = "";
      if (isset($_REQUEST['nm_xml_tag']) && !empty($_REQUEST['nm_xml_tag']))
      {
          $this->New_Format = ($_REQUEST['nm_xml_tag'] == "tag") ? true : false;
      }
      if (isset($_REQUEST['nm_xml_label']) && !empty($_REQUEST['nm_xml_label']))
      {
          $this->Xml_tag_label = ($_REQUEST['nm_xml_label'] == "S") ? true : false;
      }
      $this->Tem_xml_res  = true;
      if (isset($_REQUEST['SC_module_export']) && $_REQUEST['SC_module_export'] != "")
      { 
          $this->Tem_xml_res = (strpos(" " . $_REQUEST['SC_module_export'], "resume") !== false) ? true : false;
      } 
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['registro_boleto_ceibos']['SC_Ind_Groupby'] == "sc_free_total")
      {
          $this->Tem_xml_res  = false;
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['registro_boleto_ceibos']['SC_Ind_Groupby'] == "sc_free_group_by" && empty($_SESSION['sc_session'][$this->Ini->sc_page]['registro_boleto_ceibos']['SC_Gb_Free_cmp']))
      {
          $this->Tem_xml_res  = false;
      }
      if (!is_file($this->Ini->root . $this->Ini->path_link . "registro_boleto_ceibos/registro_boleto_ceibos_res_xml.class.php"))
      {
          $this->Tem_xml_res  = false;
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['registro_boleto_ceibos']['embutida'] && isset($_SESSION['sc_session'][$this->Ini->sc_page]['registro_boleto_ceibos']['xml_label']))
      {
          $this->Xml_tag_label = $_SESSION['sc_session'][$this->Ini->sc_page]['registro_boleto_ceibos']['xml_label'];
          $this->New_Format    = true;
      }
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      require_once($this->Ini->path_aplicacao . "registro_boleto_ceibos_total.class.php"); 
      $this->Tot      = new registro_boleto_ceibos_total($this->Ini->sc_page);
      $this->prep_modulos("Tot");
      $Gb_geral = "quebra_geral_" . $_SESSION['sc_session'][$this->Ini->sc_page]['registro_boleto_ceibos']['SC_Ind_Groupby'];
      if (method_exists($this->Tot,$Gb_geral))
      {
          $this->Tot->$Gb_geral();
          $this->count_ger = $_SESSION['sc_session'][$this->Ini->sc_page]['registro_boleto_ceibos']['tot_geral'][1];
          $this->sum_puntos = $_SESSION['sc_session'][$this->Ini->sc_page]['registro_boleto_ceibos']['tot_geral'][2];
      }
      if (!$_SESSION['sc_session'][$this->Ini->sc_page]['registro_boleto_ceibos']['embutida'] && !$this->Ini->sc_export_ajax) {
          require_once($this->Ini->path_lib_php . "/sc_progress_bar.php");
          $this->pb = new scProgressBar();
          $this->pb->setRoot($this->Ini->root);
          $this->pb->setDir($_SESSION['scriptcase']['registro_boleto_ceibos']['glo_nm_path_imag_temp'] . "/");
          $this->pb->setProgressbarMd5($_GET['pbmd5']);
          $this->pb->initialize();
          $this->pb->setReturnUrl("./");
          $this->pb->setReturnOption($_SESSION['sc_session'][$this->Ini->sc_page]['registro_boleto_ceibos']['xml_return']);
          if ($this->Tem_xml_res) {
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
      $this->nm_data    = new nm_data("es");
      $this->Arquivo      = "sc_xml";
      $this->Arquivo     .= "_" . date("YmdHis") . "_" . rand(0, 1000);
      $this->Arq_zip      = $this->Arquivo . "_registro_boleto_ceibos.zip";
      $this->Arquivo     .= "_registro_boleto_ceibos";
      $this->Arquivo_view = $this->Arquivo . "_view.xml";
      $this->Arquivo     .= ".xml";
      $this->Tit_doc      = "registro_boleto_ceibos.xml";
      $this->Tit_zip      = "registro_boleto_ceibos.zip";
      $this->Grava_view   = false;
      if (strtolower($_SESSION['scriptcase']['charset']) != strtolower($_SESSION['scriptcase']['charset_html']))
      {
          $this->Grava_view = true;
      }
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
   function grava_arquivo()
   {
      global $nm_lang;
      global $nm_nada, $nm_lang;

      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->sc_proc_grid = false; 
      $nm_raiz_img  = ""; 
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['registro_boleto_ceibos']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['registro_boleto_ceibos']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['registro_boleto_ceibos']['where_pesq_filtro'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['registro_boleto_ceibos']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['registro_boleto_ceibos']['campos_busca']))
      { 
          $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['registro_boleto_ceibos']['campos_busca'];
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
              $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->qrboleto = $Busca_temp['qrboleto']; 
          $tmp_pos = strpos($this->qrboleto, "##@@");
          if ($tmp_pos !== false && !is_array($this->qrboleto))
          {
              $this->qrboleto = substr($this->qrboleto, 0, $tmp_pos);
          }
          $this->codrfid = $Busca_temp['codrfid']; 
          $tmp_pos = strpos($this->codrfid, "##@@");
          if ($tmp_pos !== false && !is_array($this->codrfid))
          {
              $this->codrfid = substr($this->codrfid, 0, $tmp_pos);
          }
          $this->fecha_registro = $Busca_temp['fecha_registro']; 
          $tmp_pos = strpos($this->fecha_registro, "##@@");
          if ($tmp_pos !== false && !is_array($this->fecha_registro))
          {
              $this->fecha_registro = substr($this->fecha_registro, 0, $tmp_pos);
          }
          $this->fecha_registro_2 = $Busca_temp['fecha_registro_input_2']; 
          $this->uidtrans = $Busca_temp['uidtrans']; 
          $tmp_pos = strpos($this->uidtrans, "##@@");
          if ($tmp_pos !== false && !is_array($this->uidtrans))
          {
              $this->uidtrans = substr($this->uidtrans, 0, $tmp_pos);
          }
      } 
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['registro_boleto_ceibos']['xml_name']))
      {
          $Pos = strrpos($_SESSION['sc_session'][$this->Ini->sc_page]['registro_boleto_ceibos']['xml_name'], ".");
          if ($Pos === false) {
              $_SESSION['sc_session'][$this->Ini->sc_page]['registro_boleto_ceibos']['xml_name'] .= ".xml";
          }
          $this->Arquivo = $_SESSION['sc_session'][$this->Ini->sc_page]['registro_boleto_ceibos']['xml_name'];
          $this->Arq_zip = $_SESSION['sc_session'][$this->Ini->sc_page]['registro_boleto_ceibos']['xml_name'];
          $this->Tit_doc = $_SESSION['sc_session'][$this->Ini->sc_page]['registro_boleto_ceibos']['xml_name'];
          $Pos = strrpos($_SESSION['sc_session'][$this->Ini->sc_page]['registro_boleto_ceibos']['xml_name'], ".");
          if ($Pos !== false) {
              $this->Arq_zip = substr($_SESSION['sc_session'][$this->Ini->sc_page]['registro_boleto_ceibos']['xml_name'], 0, $Pos);
          }
          $this->Arq_zip .= ".zip";
          $this->Tit_zip  = $this->Arq_zip;
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['registro_boleto_ceibos']['xml_name']);
      }
      if (!$this->Grava_view)
      {
          $this->Arquivo_view = $this->Arquivo;
      }
      $this->arr_export = array('label' => array(), 'lines' => array());
      $this->arr_span   = array();

      if (!$_SESSION['sc_session'][$this->Ini->sc_page]['registro_boleto_ceibos']['embutida'])
      { 
          $xml_charset = $_SESSION['scriptcase']['charset'];
          $this->Xml_f = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
          $this->Zip_f = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arq_zip;
          $xml_f = fopen($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo, "w");
          fwrite($xml_f, "<?xml version=\"1.0\" encoding=\"$xml_charset\" ?>\r\n");
          fwrite($xml_f, "<root>\r\n");
          if ($this->Grava_view)
          {
              $xml_charset_v = $_SESSION['scriptcase']['charset_html'];
              $xml_v         = fopen($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo_view, "w");
              fwrite($xml_v, "<?xml version=\"1.0\" encoding=\"$xml_charset_v\" ?>\r\n");
              fwrite($xml_v, "<root>\r\n");
          }
      }
      $this->nm_field_dinamico = array();
      $this->nm_order_dinamico = array();
      $nmgp_select_count = "SELECT count(*) AS countTest from (SELECT     qrboleto,     codrfid,     fecha_registro,     uidtrans,      idsale,     idproducto,     ultdevice,     ultfecha,     estado,     nombre,     fecha_nacimiento,     genero,     username,     fecha_activacion,     fecha_entrada,     fecha_salida,     producto,     entrada,     jugador,     visitante,       minutos,      puntos ,  (date_format( now(), '%Y' ) - date_format( fecha_nacimiento, '%Y' ) -   ( date_format( now(), '00-%m-%d') < date_format( fecha_nacimiento, '00-%m-%d' ) )) as edad  , idchar , registro ,   (select picture_char from charplayers where id_char=idchar) as characterpic , cliente, idcliente, telefono, cliente_email , serie       FROM     view_boletos_sales where (qrboleto='" . $_SESSION['boletoqr'] . "'    ) ) nm_sel_esp"; 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
          $nmgp_select = "SELECT qrboleto, idproducto, characterpic, nombre, edad, genero, puntos, fecha_registro, str_replace (convert(char(10),fecha_entrada,102), '.', '-') + ' ' + convert(char(8),fecha_entrada,20), str_replace (convert(char(10),fecha_salida,102), '.', '-') + ' ' + convert(char(8),fecha_salida,20), cliente, idcliente, telefono, cliente_email, serie, registro, codrfid from (SELECT     qrboleto,     codrfid,     fecha_registro,     uidtrans,      idsale,     idproducto,     ultdevice,     ultfecha,     estado,     nombre,     fecha_nacimiento,     genero,     username,     fecha_activacion,     fecha_entrada,     fecha_salida,     producto,     entrada,     jugador,     visitante,       minutos,      puntos ,  (date_format( now(), '%Y' ) - date_format( fecha_nacimiento, '%Y' ) -   ( date_format( now(), '00-%m-%d') < date_format( fecha_nacimiento, '00-%m-%d' ) )) as edad  , idchar , registro ,   (select picture_char from charplayers where id_char=idchar) as characterpic , cliente, idcliente, telefono, cliente_email , serie       FROM     view_boletos_sales where (qrboleto='" . $_SESSION['boletoqr'] . "'    ) ) nm_sel_esp"; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
      { 
          $nmgp_select = "SELECT qrboleto, idproducto, characterpic, nombre, edad, genero, puntos, fecha_registro, fecha_entrada, fecha_salida, cliente, idcliente, telefono, cliente_email, serie, registro, codrfid from (SELECT     qrboleto,     codrfid,     fecha_registro,     uidtrans,      idsale,     idproducto,     ultdevice,     ultfecha,     estado,     nombre,     fecha_nacimiento,     genero,     username,     fecha_activacion,     fecha_entrada,     fecha_salida,     producto,     entrada,     jugador,     visitante,       minutos,      puntos ,  (date_format( now(), '%Y' ) - date_format( fecha_nacimiento, '%Y' ) -   ( date_format( now(), '00-%m-%d') < date_format( fecha_nacimiento, '00-%m-%d' ) )) as edad  , idchar , registro ,   (select picture_char from charplayers where id_char=idchar) as characterpic , cliente, idcliente, telefono, cliente_email , serie       FROM     view_boletos_sales where (qrboleto='" . $_SESSION['boletoqr'] . "'    ) ) nm_sel_esp"; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nmgp_select = "SELECT qrboleto, idproducto, characterpic, nombre, edad, genero, puntos, fecha_registro, convert(char(23),fecha_entrada,121), convert(char(23),fecha_salida,121), cliente, idcliente, telefono, cliente_email, serie, registro, codrfid from (SELECT     qrboleto,     codrfid,     fecha_registro,     uidtrans,      idsale,     idproducto,     ultdevice,     ultfecha,     estado,     nombre,     fecha_nacimiento,     genero,     username,     fecha_activacion,     fecha_entrada,     fecha_salida,     producto,     entrada,     jugador,     visitante,       minutos,      puntos ,  (date_format( now(), '%Y' ) - date_format( fecha_nacimiento, '%Y' ) -   ( date_format( now(), '00-%m-%d') < date_format( fecha_nacimiento, '00-%m-%d' ) )) as edad  , idchar , registro ,   (select picture_char from charplayers where id_char=idchar) as characterpic , cliente, idcliente, telefono, cliente_email , serie       FROM     view_boletos_sales where (qrboleto='" . $_SESSION['boletoqr'] . "'    ) ) nm_sel_esp"; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
      { 
          $nmgp_select = "SELECT qrboleto, idproducto, characterpic, nombre, edad, genero, puntos, TO_DATE(TO_CHAR(fecha_registro, 'yyyy-mm-dd hh24:mi:ss'), 'yyyy-mm-dd hh24:mi:ss'), fecha_entrada, fecha_salida, cliente, idcliente, telefono, cliente_email, serie, registro, codrfid from (SELECT     qrboleto,     codrfid,     fecha_registro,     uidtrans,      idsale,     idproducto,     ultdevice,     ultfecha,     estado,     nombre,     fecha_nacimiento,     genero,     username,     fecha_activacion,     fecha_entrada,     fecha_salida,     producto,     entrada,     jugador,     visitante,       minutos,      puntos ,  (date_format( now(), '%Y' ) - date_format( fecha_nacimiento, '%Y' ) -   ( date_format( now(), '00-%m-%d') < date_format( fecha_nacimiento, '00-%m-%d' ) )) as edad  , idchar , registro ,   (select picture_char from charplayers where id_char=idchar) as characterpic , cliente, idcliente, telefono, cliente_email , serie       FROM     view_boletos_sales where (qrboleto='" . $_SESSION['boletoqr'] . "'    ) ) nm_sel_esp"; 
       } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
      { 
          $nmgp_select = "SELECT qrboleto, idproducto, characterpic, nombre, edad, genero, puntos, fecha_registro, EXTEND(fecha_entrada, YEAR TO FRACTION), EXTEND(fecha_salida, YEAR TO FRACTION), cliente, idcliente, telefono, cliente_email, serie, registro, codrfid from (SELECT     qrboleto,     codrfid,     fecha_registro,     uidtrans,      idsale,     idproducto,     ultdevice,     ultfecha,     estado,     nombre,     fecha_nacimiento,     genero,     username,     fecha_activacion,     fecha_entrada,     fecha_salida,     producto,     entrada,     jugador,     visitante,       minutos,      puntos ,  (date_format( now(), '%Y' ) - date_format( fecha_nacimiento, '%Y' ) -   ( date_format( now(), '00-%m-%d') < date_format( fecha_nacimiento, '00-%m-%d' ) )) as edad  , idchar , registro ,   (select picture_char from charplayers where id_char=idchar) as characterpic , cliente, idcliente, telefono, cliente_email , serie       FROM     view_boletos_sales where (qrboleto='" . $_SESSION['boletoqr'] . "'    ) ) nm_sel_esp"; 
       } 
      else 
      { 
          $nmgp_select = "SELECT qrboleto, idproducto, characterpic, nombre, edad, genero, puntos, fecha_registro, fecha_entrada, fecha_salida, cliente, idcliente, telefono, cliente_email, serie, registro, codrfid from (SELECT     qrboleto,     codrfid,     fecha_registro,     uidtrans,      idsale,     idproducto,     ultdevice,     ultfecha,     estado,     nombre,     fecha_nacimiento,     genero,     username,     fecha_activacion,     fecha_entrada,     fecha_salida,     producto,     entrada,     jugador,     visitante,       minutos,      puntos ,  (date_format( now(), '%Y' ) - date_format( fecha_nacimiento, '%Y' ) -   ( date_format( now(), '00-%m-%d') < date_format( fecha_nacimiento, '00-%m-%d' ) )) as edad  , idchar , registro ,   (select picture_char from charplayers where id_char=idchar) as characterpic , cliente, idcliente, telefono, cliente_email , serie       FROM     view_boletos_sales where (qrboleto='" . $_SESSION['boletoqr'] . "'    ) ) nm_sel_esp"; 
      } 
      $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['registro_boleto_ceibos']['where_pesq'];
      $nmgp_select_count .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['registro_boleto_ceibos']['where_pesq'];
      $nmgp_order_by = $_SESSION['sc_session'][$this->Ini->sc_page]['registro_boleto_ceibos']['order_grid'];
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
      $this->xml_registro = "";
      $PB_tot = (isset($this->count_ger) && $this->count_ger > 0) ? "/" . $this->count_ger : "";
      while (!$rs->EOF)
      {
         $this->SC_seq_register++;
         if (!$_SESSION['sc_session'][$this->Ini->sc_page]['registro_boleto_ceibos']['embutida'] && !$this->Ini->sc_export_ajax) {
             $Mens_bar = NM_charset_to_utf8($this->Ini->Nm_lang['lang_othr_prcs']);
             $this->pb->setProgressbarMessage($Mens_bar . ": " . $this->SC_seq_register . $PB_tot);
             $this->pb->addSteps(1);
         }
         if ($_SESSION['sc_session'][$this->Ini->sc_page]['registro_boleto_ceibos']['embutida'])
         { 
             $this->xml_registro .= "<" . $_SESSION['sc_session'][$this->Ini->sc_page]['registro_boleto_ceibos']['embutida_tit'] . ">\r\n";
         }
         elseif ($this->New_Format)
         {
             $this->xml_registro = "<registro_boleto_ceibos>\r\n";
         }
         else
         {
             $this->xml_registro = "<registro_boleto_ceibos";
         }
         $this->qrboleto = $rs->fields[0] ;  
         $this->idproducto = $rs->fields[1] ;  
         $this->idproducto = (string)$this->idproducto;
         $this->characterpic = $rs->fields[2] ;  
         $this->nombre = $rs->fields[3] ;  
         $this->edad = $rs->fields[4] ;  
         $this->edad = (strpos(strtolower($this->edad), "e")) ? (float)$this->edad : $this->edad; 
         $this->edad = (string)$this->edad;
         $this->genero = $rs->fields[5] ;  
         $this->puntos = $rs->fields[6] ;  
         $this->puntos = (string)$this->puntos;
         $this->fecha_registro = $rs->fields[7] ;  
         $this->fecha_entrada = $rs->fields[8] ;  
         $this->fecha_salida = $rs->fields[9] ;  
         $this->cliente = $rs->fields[10] ;  
         $this->idcliente = $rs->fields[11] ;  
         $this->telefono = $rs->fields[12] ;  
         $this->cliente_email = $rs->fields[13] ;  
         $this->serie = $rs->fields[14] ;  
         $this->registro = $rs->fields[15] ;  
         $this->registro = (string)$this->registro;
         $this->codrfid = $rs->fields[16] ;  
         //----- lookup - idproducto
         $this->look_idproducto = $this->idproducto; 
         $this->Lookup->lookup_idproducto($this->look_idproducto, $this->idproducto) ; 
         $this->look_idproducto = ($this->look_idproducto == "&nbsp;") ? "" : $this->look_idproducto; 
         $this->characterpic = "";
         $this->sc_proc_grid = true; 
         $_SESSION['scriptcase']['registro_boleto_ceibos']['contr_erro'] = 'on';
if (!isset($_SESSION['boletoqr'])) {$_SESSION['boletoqr'] = "";}
if (!isset($this->sc_temp_boletoqr)) {$this->sc_temp_boletoqr = (isset($_SESSION['boletoqr'])) ? $_SESSION['boletoqr'] : "";}
 $this->NM_cmp_hidden["boletopic"] = "on";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['registro_boleto_ceibos']['php_cmp_sel']["boletopic"] = "on"; }



$this->NM_cmp_hidden["coin"] = "off";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['registro_boleto_ceibos']['php_cmp_sel']["coin"] = "off"; }

$this->NM_cmp_hidden["puntos"] = "off";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['registro_boleto_ceibos']['php_cmp_sel']["puntos"] = "off"; }


$this->NM_cmp_hidden["nombre"] = "off";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['registro_boleto_ceibos']['php_cmp_sel']["nombre"] = "off"; }


if ($this->registro ==1){
 	$this->NM_cmp_hidden["boletopic"] = "off";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['registro_boleto_ceibos']['php_cmp_sel']["boletopic"] = "off"; }
	
	
	$this->NM_cmp_hidden["coin"] = "on";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['registro_boleto_ceibos']['php_cmp_sel']["coin"] = "on"; }

   $this->NM_cmp_hidden["puntos"] = "on";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['registro_boleto_ceibos']['php_cmp_sel']["puntos"] = "on"; }
	
	$this->NM_cmp_hidden["nombre"] = "on";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['registro_boleto_ceibos']['php_cmp_sel']["nombre"] = "on"; }

	
	
}
echo $this->sc_temp_boletoqr;
if (isset($this->sc_temp_boletoqr)) {$_SESSION['boletoqr'] = $this->sc_temp_boletoqr;}
$_SESSION['scriptcase']['registro_boleto_ceibos']['contr_erro'] = 'off'; 
         foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['registro_boleto_ceibos']['field_order'] as $Cada_col)
         { 
            if (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off")
            { 
                $NM_func_exp = "NM_export_" . $Cada_col;
                $this->$NM_func_exp();
            } 
         } 
         if ($_SESSION['sc_session'][$this->Ini->sc_page]['registro_boleto_ceibos']['embutida'])
         { 
             $this->xml_registro .= "</" . $_SESSION['sc_session'][$this->Ini->sc_page]['registro_boleto_ceibos']['embutida_tit'] . ">\r\n";
         }
         elseif ($this->New_Format)
         {
             $this->xml_registro .= "</registro_boleto_ceibos>\r\n";
         }
         else
         {
             $this->xml_registro .= " />\r\n";
         }
         if (!$_SESSION['sc_session'][$this->Ini->sc_page]['registro_boleto_ceibos']['embutida'])
         { 
             fwrite($xml_f, $this->xml_registro);
             if ($this->Grava_view)
             {
                fwrite($xml_v, $this->xml_registro);
             }
         }
         $rs->MoveNext();
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['registro_boleto_ceibos']['embutida'])
      { 
          if (!$this->New_Format)
          {
              $this->xml_registro = "";
          }
          $_SESSION['scriptcase']['export_return'] = $this->xml_registro;
      }
      else
      { 
          fwrite($xml_f, "</root>");
          fclose($xml_f);
          if ($this->Grava_view)
          {
             fwrite($xml_v, "</root>");
             fclose($xml_v);
          }
          if ($this->Tem_xml_res)
          { 
              if (!$this->Ini->sc_export_ajax) {
                  $this->PB_dif = intval ($this->PB_dif / 2);
                  $Mens_bar  = NM_charset_to_utf8($this->Ini->Nm_lang['lang_othr_prcs']);
                  $Mens_smry = NM_charset_to_utf8($this->Ini->Nm_lang['lang_othr_smry_titl']);
                  $this->pb->setProgressbarMessage($Mens_bar . ": " . $Mens_smry);
                  $this->pb->addSteps($this->PB_dif);
              }
              require_once($this->Ini->path_aplicacao . "registro_boleto_ceibos_res_xml.class.php");
              $this->Res = new registro_boleto_ceibos_res_xml();
              $this->prep_modulos("Res");
              $_SESSION['sc_session'][$this->Ini->sc_page]['registro_boleto_ceibos']['xml_res_grid'] = true;
              $this->Res->monta_xml();
          } 
          if (!$this->Ini->sc_export_ajax) {
              $Mens_bar = NM_charset_to_utf8($this->Ini->Nm_lang['lang_btns_export_finished']);
              $this->pb->setProgressbarMessage($Mens_bar);
              $this->pb->addSteps($this->PB_dif);
          }
          if ($this->Xml_password != "" || $this->Tem_xml_res)
          { 
              $str_zip    = "";
              $Parm_pass  = ($this->Xml_password != "") ? " -p" : "";
              $Zip_f      = (FALSE !== strpos($this->Zip_f, ' ')) ? " \"" . $this->Zip_f . "\"" :  $this->Zip_f;
              $Arq_input  = (FALSE !== strpos($this->Xml_f, ' ')) ? " \"" . $this->Xml_f . "\"" :  $this->Xml_f;
              if (is_file($Zip_f)) {
                  unlink($Zip_f);
              }
              if (FALSE !== strpos(strtolower(php_uname()), 'windows')) 
              {
                  chdir($this->Ini->path_third . "/zip/windows");
                  $str_zip = "zip.exe " . strtoupper($Parm_pass) . " -j " . $this->Xml_password . " " . $Zip_f . " " . $Arq_input;
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
                  $str_zip = "./7za " . $Parm_pass . $this->Xml_password . " a " . $Zip_f . " " . $Arq_input;
              }
              elseif (FALSE !== strpos(strtolower(php_uname()), 'darwin'))
              {
                  chdir($this->Ini->path_third . "/zip/mac/bin");
                  $str_zip = "./7za " . $Parm_pass . $this->Xml_password . " a " . $Zip_f . " " . $Arq_input;
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
              $this->Xml_f   = $this->Zip_f;
              $this->Tit_doc = $this->Tit_zip;
              if ($this->Tem_xml_res)
              { 
                  $str_zip   = "";
                  $Arq_res   = $_SESSION['sc_session'][$this->Ini->sc_page]['registro_boleto_ceibos']['xml_res_file']['xml'];
                  $Arq_input = (FALSE !== strpos($Arq_res, ' ')) ? " \"" . $Arq_res . "\"" :  $Arq_res;
                  if (FALSE !== strpos(strtolower(php_uname()), 'windows')) 
                  {
                      $str_zip = "zip.exe " . strtoupper($Parm_pass) . " -j -u " . $this->Xml_password . " " . $Zip_f . " " . $Arq_input;
                  }
                  elseif (FALSE !== strpos(strtolower(php_uname()), 'linux')) 
                  {
                      $str_zip = "./7za " . $Parm_pass . $this->Xml_password . " a " . $Zip_f . " " . $Arq_input;
                  }
                  elseif (FALSE !== strpos(strtolower(php_uname()), 'darwin'))
                  {
                      $str_zip = "./7za " . $Parm_pass . $this->Xml_password . " a " . $Zip_f . " " . $Arq_input;
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
                  unlink($_SESSION['sc_session'][$this->Ini->sc_page]['registro_boleto_ceibos']['xml_res_file']['xml']);
              }
              if ($this->Grava_view)
              {
                  $str_zip    = "";
                  $xml_view_f = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo_view;
                  $zip_view_f = str_replace(".zip", "_view.zip", $this->Zip_f);
                  $zip_arq_v  = str_replace(".zip", "_view.zip", $this->Arq_zip);
                  $Zip_f      = (FALSE !== strpos($zip_view_f, ' ')) ? " \"" . $zip_view_f . "\"" :  $zip_view_f;
                  $Arq_input  = (FALSE !== strpos($xml_view_ff, ' ')) ? " \"" . $xml_view_f . "\"" :  $xml_view_f;
                  if (is_file($Zip_f)) {
                      unlink($Zip_f);
                  }
                  if (FALSE !== strpos(strtolower(php_uname()), 'windows')) 
                  {
                      chdir($this->Ini->path_third . "/zip/windows");
                      $str_zip = "zip.exe " . strtoupper($Parm_pass) . " -j " . $this->Xml_password . " " . $Zip_f . " " . $Arq_input;
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
                      $str_zip = "./7za " . $Parm_pass . $this->Xml_password . " a " . $Zip_f . " " . $Arq_input;
                  }
                  elseif (FALSE !== strpos(strtolower(php_uname()), 'darwin'))
                  {
                      chdir($this->Ini->path_third . "/zip/mac/bin");
                      $str_zip = "./7za " . $Parm_pass . $this->Xml_password . " a " . $Zip_f . " " . $Arq_input;
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
                  unlink($Arq_input);
                  $this->Arquivo_view = $zip_arq_v;
                  if ($this->Tem_xml_res)
                  { 
                      $str_zip   = "";
                      $Arq_res   = $_SESSION['sc_session'][$this->Ini->sc_page]['registro_boleto_ceibos']['xml_res_file']['view'];
                      $Arq_input = (FALSE !== strpos($Arq_res, ' ')) ? " \"" . $Arq_res . "\"" :  $Arq_res;
                      if (FALSE !== strpos(strtolower(php_uname()), 'windows')) 
                      {
                          $str_zip = "zip.exe " . strtoupper($Parm_pass) . " -j -u " . $this->Xml_password . " " . $Zip_f . " " . $Arq_input;
                      }
                      elseif (FALSE !== strpos(strtolower(php_uname()), 'linux')) 
                      {
                          $str_zip = "./7za " . $Parm_pass . $this->Xml_password . " a " . $Zip_f . " " . $Arq_input;
                      }
                      elseif (FALSE !== strpos(strtolower(php_uname()), 'darwin'))
                      {
                          $str_zip = "./7za " . $Parm_pass . $this->Xml_password . " a " . $Zip_f . " " . $Arq_input;
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
                      unlink($_SESSION['sc_session'][$this->Ini->sc_page]['registro_boleto_ceibos']['xml_res_file']['view']);
                  }
              } 
              else 
              {
                  $this->Arquivo_view = $this->Arq_zip;
              } 
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['registro_boleto_ceibos']['xml_res_grid']);
          } 
      }
      if(isset($_SESSION['sc_session'][$this->Ini->sc_page]['registro_boleto_ceibos']['export_sel_columns']['field_order']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['registro_boleto_ceibos']['field_order'] = $_SESSION['sc_session'][$this->Ini->sc_page]['registro_boleto_ceibos']['export_sel_columns']['field_order'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['registro_boleto_ceibos']['export_sel_columns']['field_order']);
      }
      if(isset($_SESSION['sc_session'][$this->Ini->sc_page]['registro_boleto_ceibos']['export_sel_columns']['usr_cmp_sel']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['registro_boleto_ceibos']['usr_cmp_sel'] = $_SESSION['sc_session'][$this->Ini->sc_page]['registro_boleto_ceibos']['export_sel_columns']['usr_cmp_sel'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['registro_boleto_ceibos']['export_sel_columns']['usr_cmp_sel']);
      }
      $rs->Close();
   }
   //----- boletopic
   function NM_export_boletopic()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->boletopic))
         {
             $this->boletopic = sc_convert_encoding($this->boletopic, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         if ($this->Xml_tag_label)
         {
             $SC_Label = (isset($this->New_label['boletopic'])) ? $this->New_label['boletopic'] : ""; 
         }
         else
         {
             $SC_Label = "boletopic"; 
         }
         $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->boletopic) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->boletopic) . "\"";
         }
   }
   //----- qrboleto
   function NM_export_qrboleto()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->qrboleto))
         {
             $this->qrboleto = sc_convert_encoding($this->qrboleto, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         if ($this->Xml_tag_label)
         {
             $SC_Label = (isset($this->New_label['qrboleto'])) ? $this->New_label['qrboleto'] : ""; 
         }
         else
         {
             $SC_Label = "qrboleto"; 
         }
         $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->qrboleto) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->qrboleto) . "\"";
         }
   }
   //----- idproducto
   function NM_export_idproducto()
   {
         nmgp_Form_Num_Val($this->look_idproducto, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->look_idproducto))
         {
             $this->look_idproducto = sc_convert_encoding($this->look_idproducto, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         if ($this->Xml_tag_label)
         {
             $SC_Label = (isset($this->New_label['idproducto'])) ? $this->New_label['idproducto'] : ""; 
         }
         else
         {
             $SC_Label = "idproducto"; 
         }
         $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->look_idproducto) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->look_idproducto) . "\"";
         }
   }
   //----- characterpic
   function NM_export_characterpic()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->characterpic))
         {
             $this->characterpic = sc_convert_encoding($this->characterpic, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         if ($this->Xml_tag_label)
         {
             $SC_Label = (isset($this->New_label['characterpic'])) ? $this->New_label['characterpic'] : ""; 
         }
         else
         {
             $SC_Label = "characterpic"; 
         }
         $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->characterpic) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->characterpic) . "\"";
         }
   }
   //----- nombre
   function NM_export_nombre()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->nombre))
         {
             $this->nombre = sc_convert_encoding($this->nombre, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         if ($this->Xml_tag_label)
         {
             $SC_Label = (isset($this->New_label['nombre'])) ? $this->New_label['nombre'] : "Nombre"; 
         }
         else
         {
             $SC_Label = "nombre"; 
         }
         $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->nombre) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->nombre) . "\"";
         }
   }
   //----- edad
   function NM_export_edad()
   {
             nmgp_Form_Num_Val($this->edad, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if ($this->Xml_tag_label)
         {
             $SC_Label = (isset($this->New_label['edad'])) ? $this->New_label['edad'] : "Edad"; 
         }
         else
         {
             $SC_Label = "edad"; 
         }
         $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->edad) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->edad) . "\"";
         }
   }
   //----- genero
   function NM_export_genero()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->genero))
         {
             $this->genero = sc_convert_encoding($this->genero, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         if ($this->Xml_tag_label)
         {
             $SC_Label = (isset($this->New_label['genero'])) ? $this->New_label['genero'] : "Genero"; 
         }
         else
         {
             $SC_Label = "genero"; 
         }
         $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->genero) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->genero) . "\"";
         }
   }
   //----- coin
   function NM_export_coin()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->coin))
         {
             $this->coin = sc_convert_encoding($this->coin, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         if ($this->Xml_tag_label)
         {
             $SC_Label = (isset($this->New_label['coin'])) ? $this->New_label['coin'] : ""; 
         }
         else
         {
             $SC_Label = "coin"; 
         }
         $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->coin) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->coin) . "\"";
         }
   }
   //----- puntos
   function NM_export_puntos()
   {
             nmgp_Form_Num_Val($this->puntos, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if ($this->Xml_tag_label)
         {
             $SC_Label = (isset($this->New_label['puntos'])) ? $this->New_label['puntos'] : "JoyCoins"; 
         }
         else
         {
             $SC_Label = "puntos"; 
         }
         $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->puntos) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->puntos) . "\"";
         }
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
                 $this->fecha_registro = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DH", "ddmmaaaa;hhii"));
             } 
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->fecha_registro))
         {
             $this->fecha_registro = sc_convert_encoding($this->fecha_registro, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         if ($this->Xml_tag_label)
         {
             $SC_Label = (isset($this->New_label['fecha_registro'])) ? $this->New_label['fecha_registro'] : "Fecha Compra"; 
         }
         else
         {
             $SC_Label = "fecha_registro"; 
         }
         $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->fecha_registro) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->fecha_registro) . "\"";
         }
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
         if ($this->Xml_tag_label)
         {
             $SC_Label = (isset($this->New_label['fecha_entrada'])) ? $this->New_label['fecha_entrada'] : "Fecha Entrada"; 
         }
         else
         {
             $SC_Label = "fecha_entrada"; 
         }
         $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->fecha_entrada) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->fecha_entrada) . "\"";
         }
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
         if ($this->Xml_tag_label)
         {
             $SC_Label = (isset($this->New_label['fecha_salida'])) ? $this->New_label['fecha_salida'] : "Fecha Salida"; 
         }
         else
         {
             $SC_Label = "fecha_salida"; 
         }
         $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->fecha_salida) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->fecha_salida) . "\"";
         }
   }
   //----- cliente
   function NM_export_cliente()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->cliente))
         {
             $this->cliente = sc_convert_encoding($this->cliente, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         if ($this->Xml_tag_label)
         {
             $SC_Label = (isset($this->New_label['cliente'])) ? $this->New_label['cliente'] : "Cliente"; 
         }
         else
         {
             $SC_Label = "cliente"; 
         }
         $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->cliente) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->cliente) . "\"";
         }
   }
   //----- idcliente
   function NM_export_idcliente()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->idcliente))
         {
             $this->idcliente = sc_convert_encoding($this->idcliente, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         if ($this->Xml_tag_label)
         {
             $SC_Label = (isset($this->New_label['idcliente'])) ? $this->New_label['idcliente'] : "Idcliente"; 
         }
         else
         {
             $SC_Label = "idcliente"; 
         }
         $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->idcliente) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->idcliente) . "\"";
         }
   }
   //----- telefono
   function NM_export_telefono()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->telefono))
         {
             $this->telefono = sc_convert_encoding($this->telefono, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         if ($this->Xml_tag_label)
         {
             $SC_Label = (isset($this->New_label['telefono'])) ? $this->New_label['telefono'] : "Telefono"; 
         }
         else
         {
             $SC_Label = "telefono"; 
         }
         $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->telefono) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->telefono) . "\"";
         }
   }
   //----- cliente_email
   function NM_export_cliente_email()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->cliente_email))
         {
             $this->cliente_email = sc_convert_encoding($this->cliente_email, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         if ($this->Xml_tag_label)
         {
             $SC_Label = (isset($this->New_label['cliente_email'])) ? $this->New_label['cliente_email'] : "Cliente Email"; 
         }
         else
         {
             $SC_Label = "cliente_email"; 
         }
         $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->cliente_email) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->cliente_email) . "\"";
         }
   }
   //----- serie
   function NM_export_serie()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->serie))
         {
             $this->serie = sc_convert_encoding($this->serie, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         if ($this->Xml_tag_label)
         {
             $SC_Label = (isset($this->New_label['serie'])) ? $this->New_label['serie'] : "Factura"; 
         }
         else
         {
             $SC_Label = "serie"; 
         }
         $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->serie) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->serie) . "\"";
         }
   }

   //----- 
   function trata_dados($conteudo)
   {
      $str_temp =  $conteudo;
      $str_temp =  str_replace("<br />", "",  $str_temp);
      $str_temp =  str_replace("&", "&amp;",  $str_temp);
      $str_temp =  str_replace("<", "&lt;",   $str_temp);
      $str_temp =  str_replace(">", "&gt;",   $str_temp);
      $str_temp =  str_replace("'", "&apos;", $str_temp);
      $str_temp =  str_replace('"', "&quot;",  $str_temp);
      $str_temp =  str_replace('(', "_",  $str_temp);
      $str_temp =  str_replace(')', "",  $str_temp);
      return ($str_temp);
   }

   function clear_tag(&$conteudo)
   {
      $out = (is_numeric(substr($conteudo, 0, 1)) || substr($conteudo, 0, 1) == "") ? "_" : "";
      $str_temp = "abcdefghijklmnopqrstuvwxyz0123456789";
      for ($i = 0; $i < strlen($conteudo); $i++)
      {
          $char = substr($conteudo, $i, 1);
          $ok = false;
          for ($z = 0; $z < strlen($str_temp); $z++)
          {
              if (strtolower($char) == substr($str_temp, $z, 1))
              {
                  $ok = true;
                  break;
              }
          }
          $out .= ($ok) ? $char : "_";
      }
      $conteudo = $out;
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
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['registro_boleto_ceibos']['xml_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['registro_boleto_ceibos']['xml_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['registro_boleto_ceibos'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['registro_boleto_ceibos'][$path_doc_md5][1] = $this->Tit_doc;
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
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['registro_boleto_ceibos']['xml_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['registro_boleto_ceibos']['xml_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['registro_boleto_ceibos'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['registro_boleto_ceibos'][$path_doc_md5][1] = $this->Tit_doc;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE>Registro de Boletos <?php echo $_SESSION['fullphone'] ?> :: XML</TITLE>
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
   <td class="scExportTitle" style="height: 25px">XML</td>
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
<form name="Fview" method="get" action="<?php echo $this->Ini->path_imag_temp . "/" . $this->Arquivo_view ?>" target="_blank" style="display: none"> 
</form>
<form name="Fdown" method="get" action="registro_boleto_ceibos_download.php" target="_blank" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="registro_boleto_ceibos"> 
<input type="hidden" name="nm_name_doc" value="<?php echo $path_doc_md5 ?>"> 
</form>
<FORM name="F0" method=post action="./" style="display: none"> 
<INPUT type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<INPUT type="hidden" name="nmgp_opcao" value="<?php echo NM_encode_input($_SESSION['sc_session'][$this->Ini->sc_page]['registro_boleto_ceibos']['xml_return']); ?>"> 
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
