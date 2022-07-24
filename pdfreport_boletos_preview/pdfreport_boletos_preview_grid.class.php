<?php
class pdfreport_boletos_preview_grid
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
   var $array_factura = array();
   var $array_infolabel = array();
   var $factura = array();
   var $infolabel = array();
   var $logo = array();
   var $qrboleto = array();
   var $codrfid = array();
   var $fecha_registro = array();
   var $uidtrans = array();
   var $idsale = array();
   var $idproducto = array();
   var $ultdevice = array();
   var $ultfecha = array();
   var $estado = array();
   var $nombre = array();
   var $fecha_nacimiento = array();
   var $genero = array();
   var $username = array();
   var $fecha_activacion = array();
   var $fecha_entrada = array();
   var $fecha_salida = array();
   var $producto = array();
   var $entrada = array();
   var $jugador = array();
   var $visitante = array();
   var $tarjeta = array();
   var $tokens = array();
   var $minutos = array();
   var $comida = array();
   var $codigoboleto = array();
   var $fechasalida = array();
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
   $Tp_papel = array(83, 100);
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
   $_SESSION['scriptcase']['pdfreport_boletos_preview']['default_font'] = $this->default_font;
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
           if (in_array("pdfreport_boletos_preview", $apls_aba))
           {
               $this->aba_iframe = true;
               break;
           }
       }
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_boletos_preview']['iframe_menu'] && (!isset($_SESSION['scriptcase']['menu_mobile']) || empty($_SESSION['scriptcase']['menu_mobile'])))
   {
       $this->aba_iframe = true;
   }
   $this->nmgp_botoes['exit'] = "on";
   $this->sc_proc_grid = false; 
   $this->NM_raiz_img = $this->Ini->root;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
   $this->nm_where_dinamico = "";
   $this->nm_grid_colunas = 0;
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_boletos_preview']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_boletos_preview']['campos_busca']))
   { 
       $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_boletos_preview']['campos_busca'];
       if ($_SESSION['scriptcase']['charset'] != "UTF-8")
       {
           $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
       }
       $this->qrboleto[0] = $Busca_temp['qrboleto']; 
       $tmp_pos = strpos($this->qrboleto[0], "##@@");
       if ($tmp_pos !== false && !is_array($this->qrboleto[0]))
       {
           $this->qrboleto[0] = substr($this->qrboleto[0], 0, $tmp_pos);
       }
       $this->codrfid[0] = $Busca_temp['codrfid']; 
       $tmp_pos = strpos($this->codrfid[0], "##@@");
       if ($tmp_pos !== false && !is_array($this->codrfid[0]))
       {
           $this->codrfid[0] = substr($this->codrfid[0], 0, $tmp_pos);
       }
       $this->fecha_registro[0] = $Busca_temp['fecha_registro']; 
       $tmp_pos = strpos($this->fecha_registro[0], "##@@");
       if ($tmp_pos !== false && !is_array($this->fecha_registro[0]))
       {
           $this->fecha_registro[0] = substr($this->fecha_registro[0], 0, $tmp_pos);
       }
       $fecha_registro_2 = $Busca_temp['fecha_registro_input_2']; 
       $this->fecha_registro_2 = $Busca_temp['fecha_registro_input_2']; 
       $this->uidtrans[0] = $Busca_temp['uidtrans']; 
       $tmp_pos = strpos($this->uidtrans[0], "##@@");
       if ($tmp_pos !== false && !is_array($this->uidtrans[0]))
       {
           $this->uidtrans[0] = substr($this->uidtrans[0], 0, $tmp_pos);
       }
       $this->comida[0] = $Busca_temp['comida']; 
       $tmp_pos = strpos($this->comida[0], "##@@");
       if ($tmp_pos !== false && !is_array($this->comida[0]))
       {
           $this->comida[0] = substr($this->comida[0], 0, $tmp_pos);
       }
   } 
   else 
   { 
       $this->fecha_registro_2 = ""; 
   } 
   $this->nm_field_dinamico = array();
   $this->nm_order_dinamico = array();
   $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_boletos_preview']['where_orig'];
   $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_boletos_preview']['where_pesq'];
   $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_boletos_preview']['where_pesq_filtro'];
   $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
   $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
   $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
   $_SESSION['scriptcase']['contr_link_emb'] = $this->nm_location;
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_boletos_preview']['qt_col_grid'] = 1 ;  
   if (isset($_SESSION['scriptcase']['sc_apl_conf']['pdfreport_boletos_preview']['cols']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['pdfreport_boletos_preview']['cols']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_boletos_preview']['qt_col_grid'] = $_SESSION['scriptcase']['sc_apl_conf']['pdfreport_boletos_preview']['cols'];  
       unset($_SESSION['scriptcase']['sc_apl_conf']['pdfreport_boletos_preview']['cols']);
   }
   if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_boletos_preview']['ordem_select']))  
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_boletos_preview']['ordem_select'] = array(); 
   } 
   if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_boletos_preview']['ordem_quebra']))  
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_boletos_preview']['ordem_grid'] = "" ; 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_boletos_preview']['ordem_ant']  = ""; 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_boletos_preview']['ordem_desc'] = "" ; 
   }   
   if (!empty($nmgp_parms) && $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_boletos_preview']['opcao'] != "pdf")   
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_boletos_preview']['opcao'] = "igual";
       $rec = "ini";
   }
   if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_boletos_preview']['where_orig']) || $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_boletos_preview']['prim_cons'] || !empty($nmgp_parms))  
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_boletos_preview']['prim_cons'] = false;  
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_boletos_preview']['where_orig'] = " where qrboleto='" . $_SESSION['idboleto'] . "'";  
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_boletos_preview']['where_pesq']        = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_boletos_preview']['where_orig'];  
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_boletos_preview']['where_pesq_ant']    = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_boletos_preview']['where_orig'];  
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_boletos_preview']['cond_pesq']         = ""; 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_boletos_preview']['where_pesq_filtro'] = "";
   }   
   if  (!empty($this->nm_where_dinamico)) 
   {   
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_boletos_preview']['where_pesq'] .= $this->nm_where_dinamico;
   }   
   $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_boletos_preview']['where_orig'];
   $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_boletos_preview']['where_pesq'];
   $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_boletos_preview']['where_pesq_filtro'];
//
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_boletos_preview']['tot_geral'][1])) 
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_boletos_preview']['sc_total'] = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_boletos_preview']['tot_geral'][1] ;  
   }
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_boletos_preview']['where_pesq_ant'] = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_boletos_preview']['where_pesq'];  
//----- 
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
   { 
       $nmgp_select = "SELECT qrboleto, codrfid, fecha_registro, uidtrans, idsale, idproducto, ultdevice, str_replace (convert(char(10),ultfecha,102), '.', '-') + ' ' + convert(char(8),ultfecha,20), estado, nombre, str_replace (convert(char(10),fecha_nacimiento,102), '.', '-') + ' ' + convert(char(8),fecha_nacimiento,20), genero, username, str_replace (convert(char(10),fecha_activacion,102), '.', '-') + ' ' + convert(char(8),fecha_activacion,20), str_replace (convert(char(10),fecha_entrada,102), '.', '-') + ' ' + convert(char(8),fecha_entrada,20), str_replace (convert(char(10),fecha_salida,102), '.', '-') + ' ' + convert(char(8),fecha_salida,20), producto, entrada, jugador, visitante, tarjeta, tokens, minutos, comida, right(qrboleto,42) as codigoboleto, str_replace (convert(char(10),DATE_ADD(fecha_registro,INTERVAL minutos+5 minute),102), '.', '-') + ' ' + convert(char(8),DATE_ADD(fecha_registro,INTERVAL minutos+5 minute),20) as fechasalida from " . $this->Ini->nm_tabela; 
   } 
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
   { 
       $nmgp_select = "SELECT qrboleto, codrfid, fecha_registro, uidtrans, idsale, idproducto, ultdevice, ultfecha, estado, nombre, fecha_nacimiento, genero, username, fecha_activacion, fecha_entrada, fecha_salida, producto, entrada, jugador, visitante, tarjeta, tokens, minutos, comida, right(qrboleto,42) as codigoboleto, DATE_ADD(fecha_registro,INTERVAL minutos+5 minute) as fechasalida from " . $this->Ini->nm_tabela; 
   } 
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
   { 
       $nmgp_select = "SELECT qrboleto, codrfid, fecha_registro, uidtrans, idsale, idproducto, ultdevice, convert(char(23),ultfecha,121), estado, nombre, convert(char(23),fecha_nacimiento,121), genero, username, convert(char(23),fecha_activacion,121), convert(char(23),fecha_entrada,121), convert(char(23),fecha_salida,121), producto, entrada, jugador, visitante, tarjeta, tokens, minutos, comida, right(qrboleto,42) as codigoboleto, convert(char(23),DATE_ADD(fecha_registro,INTERVAL minutos+5 minute),121) as fechasalida from " . $this->Ini->nm_tabela; 
   } 
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
   { 
       $nmgp_select = "SELECT qrboleto, codrfid, TO_DATE(TO_CHAR(fecha_registro, 'yyyy-mm-dd hh24:mi:ss'), 'yyyy-mm-dd hh24:mi:ss'), uidtrans, idsale, idproducto, ultdevice, ultfecha, estado, nombre, fecha_nacimiento, genero, username, fecha_activacion, fecha_entrada, fecha_salida, producto, entrada, jugador, visitante, tarjeta, tokens, minutos, comida, right(qrboleto,42) as codigoboleto, DATE_ADD(fecha_registro,INTERVAL minutos+5 minute) as fechasalida from " . $this->Ini->nm_tabela; 
   } 
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
   { 
       $nmgp_select = "SELECT qrboleto, codrfid, fecha_registro, uidtrans, idsale, idproducto, ultdevice, EXTEND(ultfecha, YEAR TO FRACTION), estado, nombre, EXTEND(fecha_nacimiento, YEAR TO DAY), genero, username, EXTEND(fecha_activacion, YEAR TO FRACTION), EXTEND(fecha_entrada, YEAR TO FRACTION), EXTEND(fecha_salida, YEAR TO FRACTION), producto, entrada, jugador, visitante, tarjeta, tokens, minutos, comida, right(qrboleto,42) as codigoboleto, EXTEND(DATE_ADD(fecha_registro,INTERVAL minutos+5 minute), YEAR TO FRACTION) as fechasalida from " . $this->Ini->nm_tabela; 
   } 
   else 
   { 
       $nmgp_select = "SELECT qrboleto, codrfid, fecha_registro, uidtrans, idsale, idproducto, ultdevice, ultfecha, estado, nombre, fecha_nacimiento, genero, username, fecha_activacion, fecha_entrada, fecha_salida, producto, entrada, jugador, visitante, tarjeta, tokens, minutos, comida, right(qrboleto,42) as codigoboleto, DATE_ADD(fecha_registro,INTERVAL minutos+5 minute) as fechasalida from " . $this->Ini->nm_tabela; 
   } 
   $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_boletos_preview']['where_pesq']; 
   $nmgp_order_by = ""; 
   $campos_order_select = "";
   foreach($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_boletos_preview']['ordem_select'] as $campo => $ordem) 
   {
        if ($campo != $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_boletos_preview']['ordem_grid']) 
        {
           if (!empty($campos_order_select)) 
           {
               $campos_order_select .= ", ";
           }
           $campos_order_select .= $campo . " " . $ordem;
        }
   }
   if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_boletos_preview']['ordem_grid'])) 
   { 
       $nmgp_order_by = " order by " . $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_boletos_preview']['ordem_grid'] . $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_boletos_preview']['ordem_desc']; 
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
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_boletos_preview']['order_grid'] = $nmgp_order_by;
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
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_boletos_preview']['labels']['qrboleto'] = "Qrboleto";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_boletos_preview']['labels']['codrfid'] = "Codrfid";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_boletos_preview']['labels']['fecha_registro'] = "Fecha Registro";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_boletos_preview']['labels']['uidtrans'] = "Uidtrans";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_boletos_preview']['labels']['idsale'] = "Idsale";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_boletos_preview']['labels']['idproducto'] = "Idproducto";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_boletos_preview']['labels']['ultdevice'] = "Ultdevice";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_boletos_preview']['labels']['ultfecha'] = "Ultfecha";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_boletos_preview']['labels']['estado'] = "Estado";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_boletos_preview']['labels']['nombre'] = "Nombre";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_boletos_preview']['labels']['fecha_nacimiento'] = "Fecha Nacimiento";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_boletos_preview']['labels']['genero'] = "Genero";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_boletos_preview']['labels']['username'] = "Username";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_boletos_preview']['labels']['fecha_activacion'] = "Fecha Activacion";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_boletos_preview']['labels']['fecha_entrada'] = "Fecha Entrada";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_boletos_preview']['labels']['fecha_salida'] = "Fecha Salida";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_boletos_preview']['labels']['producto'] = "Producto";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_boletos_preview']['labels']['entrada'] = "Entrada";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_boletos_preview']['labels']['jugador'] = "Jugador";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_boletos_preview']['labels']['visitante'] = "Visitante";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_boletos_preview']['labels']['tarjeta'] = "Tarjeta";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_boletos_preview']['labels']['tokens'] = "Tokens";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_boletos_preview']['labels']['minutos'] = "Minutos";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_boletos_preview']['labels']['comida'] = "Comida";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_boletos_preview']['labels']['codigoboleto'] = "Codigoboleto";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_boletos_preview']['labels']['fechasalida'] = "Fechasalida";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_boletos_preview']['labels']['factura'] = "factura";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_boletos_preview']['labels']['infolabel'] = "infolabel";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_boletos_preview']['labels']['logo'] = "logo";
   $HTTP_REFERER = (isset($_SERVER['HTTP_REFERER'])) ? $_SERVER['HTTP_REFERER'] : ""; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_boletos_preview']['seq_dir'] = 0; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_boletos_preview']['sub_dir'] = array(); 
   $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_boletos_preview']['where_orig'];
   $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_boletos_preview']['where_pesq'];
   $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_boletos_preview']['where_pesq_filtro'];
   if (isset($_SESSION['scriptcase']['sc_apl_conf']['pdfreport_boletos_preview']['lig_edit']) && $_SESSION['scriptcase']['sc_apl_conf']['pdfreport_boletos_preview']['lig_edit'] != '')
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_boletos_preview']['mostra_edit'] = $_SESSION['scriptcase']['sc_apl_conf']['pdfreport_boletos_preview']['lig_edit'];
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
      while (!$this->rs_grid->EOF && $nm_quant_linhas < $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_boletos_preview']['qt_col_grid']) 
      {  
          $this->sc_proc_grid = true;
          $this->SC_seq_register++; 
          $this->qrboleto[$this->nm_grid_colunas] = $this->rs_grid->fields[0] ;  
          $this->codrfid[$this->nm_grid_colunas] = $this->rs_grid->fields[1] ;  
          $this->fecha_registro[$this->nm_grid_colunas] = $this->rs_grid->fields[2] ;  
          $this->uidtrans[$this->nm_grid_colunas] = $this->rs_grid->fields[3] ;  
          $this->idsale[$this->nm_grid_colunas] = $this->rs_grid->fields[4] ;  
          $this->idsale[$this->nm_grid_colunas] = (string)$this->idsale[$this->nm_grid_colunas];
          $this->idproducto[$this->nm_grid_colunas] = $this->rs_grid->fields[5] ;  
          $this->idproducto[$this->nm_grid_colunas] = (string)$this->idproducto[$this->nm_grid_colunas];
          $this->ultdevice[$this->nm_grid_colunas] = $this->rs_grid->fields[6] ;  
          $this->ultdevice[$this->nm_grid_colunas] = (string)$this->ultdevice[$this->nm_grid_colunas];
          $this->ultfecha[$this->nm_grid_colunas] = $this->rs_grid->fields[7] ;  
          $this->estado[$this->nm_grid_colunas] = $this->rs_grid->fields[8] ;  
          $this->estado[$this->nm_grid_colunas] = (string)$this->estado[$this->nm_grid_colunas];
          $this->nombre[$this->nm_grid_colunas] = $this->rs_grid->fields[9] ;  
          $this->fecha_nacimiento[$this->nm_grid_colunas] = $this->rs_grid->fields[10] ;  
          $this->genero[$this->nm_grid_colunas] = $this->rs_grid->fields[11] ;  
          $this->username[$this->nm_grid_colunas] = $this->rs_grid->fields[12] ;  
          $this->fecha_activacion[$this->nm_grid_colunas] = $this->rs_grid->fields[13] ;  
          $this->fecha_entrada[$this->nm_grid_colunas] = $this->rs_grid->fields[14] ;  
          $this->fecha_salida[$this->nm_grid_colunas] = $this->rs_grid->fields[15] ;  
          $this->producto[$this->nm_grid_colunas] = $this->rs_grid->fields[16] ;  
          $this->entrada[$this->nm_grid_colunas] = $this->rs_grid->fields[17] ;  
          $this->entrada[$this->nm_grid_colunas] = (string)$this->entrada[$this->nm_grid_colunas];
          $this->jugador[$this->nm_grid_colunas] = $this->rs_grid->fields[18] ;  
          $this->jugador[$this->nm_grid_colunas] = (string)$this->jugador[$this->nm_grid_colunas];
          $this->visitante[$this->nm_grid_colunas] = $this->rs_grid->fields[19] ;  
          $this->visitante[$this->nm_grid_colunas] = (string)$this->visitante[$this->nm_grid_colunas];
          $this->tarjeta[$this->nm_grid_colunas] = $this->rs_grid->fields[20] ;  
          $this->tarjeta[$this->nm_grid_colunas] = (string)$this->tarjeta[$this->nm_grid_colunas];
          $this->tokens[$this->nm_grid_colunas] = $this->rs_grid->fields[21] ;  
          $this->tokens[$this->nm_grid_colunas] = (string)$this->tokens[$this->nm_grid_colunas];
          $this->minutos[$this->nm_grid_colunas] = $this->rs_grid->fields[22] ;  
          $this->minutos[$this->nm_grid_colunas] = (string)$this->minutos[$this->nm_grid_colunas];
          $this->comida[$this->nm_grid_colunas] = $this->rs_grid->fields[23] ;  
          $this->comida[$this->nm_grid_colunas] = (string)$this->comida[$this->nm_grid_colunas];
          $this->codigoboleto[$this->nm_grid_colunas] = $this->rs_grid->fields[24] ;  
          $this->fechasalida[$this->nm_grid_colunas] = $this->rs_grid->fields[25] ;  
          $this->factura[$this->nm_grid_colunas] = "";
          $this->infolabel[$this->nm_grid_colunas] = "";
          $this->logo[$this->nm_grid_colunas] = "";
          $this->Lookup->lookup_factura($this->factura[$this->nm_grid_colunas], $this->uidtrans[$this->nm_grid_colunas], $this->array_factura); 
          $this->Lookup->lookup_infolabel($this->infolabel[$this->nm_grid_colunas], $this->array_infolabel); 
          $this->qrboleto[$this->nm_grid_colunas] = $this->qrboleto[$this->nm_grid_colunas]; 
          if (empty($this->qrboleto[$this->nm_grid_colunas]) || $this->qrboleto[$this->nm_grid_colunas] == "none" || $this->qrboleto[$this->nm_grid_colunas] == "*nm*") 
          { 
              $this->qrboleto[$this->nm_grid_colunas] = "" ;  
              $out_qrboleto = "" ; 
          } 
          elseif ($this->Ini->Gd_missing)
          { 
              $this->qrboleto[$this->nm_grid_colunas] = "<span class=\"scErrorLine\">" . $this->Ini->Nm_lang['lang_errm_gd'] . "</span>";
              $out_qrboleto = "" ; 
          } 
          else   
          { 
              $out_qrboleto = $this->Ini->path_imag_temp . "/sc_qrboleto_" . $_SESSION['scriptcase']['sc_num_img'] . session_id() . ".png";   
              QRcode::png($this->qrboleto[$this->nm_grid_colunas], $this->Ini->root . $out_qrboleto, 0,4,1);
              $_SESSION['scriptcase']['sc_num_img']++;
          } 
              $this->qrboleto[$this->nm_grid_colunas] = $this->NM_raiz_img . $out_qrboleto;
          $this->qrboleto[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->qrboleto[$this->nm_grid_colunas]);
          $this->codrfid[$this->nm_grid_colunas] = $this->codrfid[$this->nm_grid_colunas];
          if ($this->codrfid[$this->nm_grid_colunas] === "") 
          { 
              $this->codrfid[$this->nm_grid_colunas] = "" ;  
          } 
          $this->codrfid[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->codrfid[$this->nm_grid_colunas]);
          $this->fecha_registro[$this->nm_grid_colunas] = $this->fecha_registro[$this->nm_grid_colunas];
          if ($this->fecha_registro[$this->nm_grid_colunas] === "") 
          { 
              $this->fecha_registro[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
               if (substr($this->fecha_registro[$this->nm_grid_colunas], 10, 1) == "-") 
               { 
                  $this->fecha_registro[$this->nm_grid_colunas] = substr($this->fecha_registro[$this->nm_grid_colunas], 0, 10) . " " . substr($this->fecha_registro[$this->nm_grid_colunas], 11);
               } 
               if (substr($this->fecha_registro[$this->nm_grid_colunas], 13, 1) == ".") 
               { 
                  $this->fecha_registro[$this->nm_grid_colunas] = substr($this->fecha_registro[$this->nm_grid_colunas], 0, 13) . ":" . substr($this->fecha_registro[$this->nm_grid_colunas], 14, 2) . ":" . substr($this->fecha_registro[$this->nm_grid_colunas], 17);
               } 
               $fecha_registro_x =  $this->fecha_registro[$this->nm_grid_colunas];
               nm_conv_limpa_dado($fecha_registro_x, "YYYY-MM-DD HH:II:SS");
               if (is_numeric($fecha_registro_x) && strlen($fecha_registro_x) > 0) 
               { 
                   $this->nm_data->SetaData($this->fecha_registro[$this->nm_grid_colunas], "YYYY-MM-DD HH:II:SS");
                   $this->fecha_registro[$this->nm_grid_colunas] = html_entity_decode($this->nm_data->FormataSaida("d-m-Y H:i"), ENT_COMPAT, $_SESSION['scriptcase']['charset']);
               } 
          } 
          $this->fecha_registro[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->fecha_registro[$this->nm_grid_colunas]);
          $this->uidtrans[$this->nm_grid_colunas] = $this->uidtrans[$this->nm_grid_colunas];
          if ($this->uidtrans[$this->nm_grid_colunas] === "") 
          { 
              $this->uidtrans[$this->nm_grid_colunas] = "" ;  
          } 
          $this->uidtrans[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->uidtrans[$this->nm_grid_colunas]);
          $this->idsale[$this->nm_grid_colunas] = $this->idsale[$this->nm_grid_colunas];
          if ($this->idsale[$this->nm_grid_colunas] === "") 
          { 
              $this->idsale[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->idsale[$this->nm_grid_colunas], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $this->idsale[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->idsale[$this->nm_grid_colunas]);
          $this->Lookup->lookup_idproducto($this->idproducto[$this->nm_grid_colunas] , $this->idproducto[$this->nm_grid_colunas]) ; 
          $this->idproducto[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->idproducto[$this->nm_grid_colunas]);
          $this->ultdevice[$this->nm_grid_colunas] = $this->ultdevice[$this->nm_grid_colunas];
          if ($this->ultdevice[$this->nm_grid_colunas] === "") 
          { 
              $this->ultdevice[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->ultdevice[$this->nm_grid_colunas], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $this->ultdevice[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->ultdevice[$this->nm_grid_colunas]);
          $this->ultfecha[$this->nm_grid_colunas] = $this->ultfecha[$this->nm_grid_colunas];
          if ($this->ultfecha[$this->nm_grid_colunas] === "") 
          { 
              $this->ultfecha[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
               if (substr($this->ultfecha[$this->nm_grid_colunas], 10, 1) == "-") 
               { 
                  $this->ultfecha[$this->nm_grid_colunas] = substr($this->ultfecha[$this->nm_grid_colunas], 0, 10) . " " . substr($this->ultfecha[$this->nm_grid_colunas], 11);
               } 
               if (substr($this->ultfecha[$this->nm_grid_colunas], 13, 1) == ".") 
               { 
                  $this->ultfecha[$this->nm_grid_colunas] = substr($this->ultfecha[$this->nm_grid_colunas], 0, 13) . ":" . substr($this->ultfecha[$this->nm_grid_colunas], 14, 2) . ":" . substr($this->ultfecha[$this->nm_grid_colunas], 17);
               } 
               $ultfecha_x =  $this->ultfecha[$this->nm_grid_colunas];
               nm_conv_limpa_dado($ultfecha_x, "YYYY-MM-DD HH:II:SS");
               if (is_numeric($ultfecha_x) && strlen($ultfecha_x) > 0) 
               { 
                   $this->nm_data->SetaData($this->ultfecha[$this->nm_grid_colunas], "YYYY-MM-DD HH:II:SS");
                   $this->ultfecha[$this->nm_grid_colunas] = html_entity_decode($this->nm_data->FormataSaida($this->nm_data->FormatRegion("DH", "ddmmaaaa;hhiiss")), ENT_COMPAT, $_SESSION['scriptcase']['charset']);
               } 
          } 
          $this->ultfecha[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->ultfecha[$this->nm_grid_colunas]);
          $this->estado[$this->nm_grid_colunas] = $this->estado[$this->nm_grid_colunas];
          if ($this->estado[$this->nm_grid_colunas] === "") 
          { 
              $this->estado[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->estado[$this->nm_grid_colunas], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $this->estado[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->estado[$this->nm_grid_colunas]);
          $this->nombre[$this->nm_grid_colunas] = $this->nombre[$this->nm_grid_colunas];
          if ($this->nombre[$this->nm_grid_colunas] === "") 
          { 
              $this->nombre[$this->nm_grid_colunas] = "" ;  
          } 
          $this->nombre[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->nombre[$this->nm_grid_colunas]);
          $this->fecha_nacimiento[$this->nm_grid_colunas] = $this->fecha_nacimiento[$this->nm_grid_colunas];
          if ($this->fecha_nacimiento[$this->nm_grid_colunas] === "") 
          { 
              $this->fecha_nacimiento[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
               $fecha_nacimiento_x =  $this->fecha_nacimiento[$this->nm_grid_colunas];
               nm_conv_limpa_dado($fecha_nacimiento_x, "YYYY-MM-DD");
               if (is_numeric($fecha_nacimiento_x) && strlen($fecha_nacimiento_x) > 0) 
               { 
                   $this->nm_data->SetaData($this->fecha_nacimiento[$this->nm_grid_colunas], "YYYY-MM-DD");
                   $this->fecha_nacimiento[$this->nm_grid_colunas] = html_entity_decode($this->nm_data->FormataSaida($this->nm_data->FormatRegion("DT", "ddmmaaaa")), ENT_COMPAT, $_SESSION['scriptcase']['charset']);
               } 
          } 
          $this->fecha_nacimiento[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->fecha_nacimiento[$this->nm_grid_colunas]);
          $this->genero[$this->nm_grid_colunas] = $this->genero[$this->nm_grid_colunas];
          if ($this->genero[$this->nm_grid_colunas] === "") 
          { 
              $this->genero[$this->nm_grid_colunas] = "" ;  
          } 
          $this->genero[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->genero[$this->nm_grid_colunas]);
          $this->username[$this->nm_grid_colunas] = $this->username[$this->nm_grid_colunas];
          if ($this->username[$this->nm_grid_colunas] === "") 
          { 
              $this->username[$this->nm_grid_colunas] = "" ;  
          } 
          $this->username[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->username[$this->nm_grid_colunas]);
          $this->fecha_activacion[$this->nm_grid_colunas] = $this->fecha_activacion[$this->nm_grid_colunas];
          if ($this->fecha_activacion[$this->nm_grid_colunas] === "") 
          { 
              $this->fecha_activacion[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
               if (substr($this->fecha_activacion[$this->nm_grid_colunas], 10, 1) == "-") 
               { 
                  $this->fecha_activacion[$this->nm_grid_colunas] = substr($this->fecha_activacion[$this->nm_grid_colunas], 0, 10) . " " . substr($this->fecha_activacion[$this->nm_grid_colunas], 11);
               } 
               if (substr($this->fecha_activacion[$this->nm_grid_colunas], 13, 1) == ".") 
               { 
                  $this->fecha_activacion[$this->nm_grid_colunas] = substr($this->fecha_activacion[$this->nm_grid_colunas], 0, 13) . ":" . substr($this->fecha_activacion[$this->nm_grid_colunas], 14, 2) . ":" . substr($this->fecha_activacion[$this->nm_grid_colunas], 17);
               } 
               $fecha_activacion_x =  $this->fecha_activacion[$this->nm_grid_colunas];
               nm_conv_limpa_dado($fecha_activacion_x, "YYYY-MM-DD HH:II:SS");
               if (is_numeric($fecha_activacion_x) && strlen($fecha_activacion_x) > 0) 
               { 
                   $this->nm_data->SetaData($this->fecha_activacion[$this->nm_grid_colunas], "YYYY-MM-DD HH:II:SS");
                   $this->fecha_activacion[$this->nm_grid_colunas] = html_entity_decode($this->nm_data->FormataSaida($this->nm_data->FormatRegion("DH", "ddmmaaaa;hhiiss")), ENT_COMPAT, $_SESSION['scriptcase']['charset']);
               } 
          } 
          $this->fecha_activacion[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->fecha_activacion[$this->nm_grid_colunas]);
          $this->fecha_entrada[$this->nm_grid_colunas] = $this->fecha_entrada[$this->nm_grid_colunas];
          if ($this->fecha_entrada[$this->nm_grid_colunas] === "") 
          { 
              $this->fecha_entrada[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
               if (substr($this->fecha_entrada[$this->nm_grid_colunas], 10, 1) == "-") 
               { 
                  $this->fecha_entrada[$this->nm_grid_colunas] = substr($this->fecha_entrada[$this->nm_grid_colunas], 0, 10) . " " . substr($this->fecha_entrada[$this->nm_grid_colunas], 11);
               } 
               if (substr($this->fecha_entrada[$this->nm_grid_colunas], 13, 1) == ".") 
               { 
                  $this->fecha_entrada[$this->nm_grid_colunas] = substr($this->fecha_entrada[$this->nm_grid_colunas], 0, 13) . ":" . substr($this->fecha_entrada[$this->nm_grid_colunas], 14, 2) . ":" . substr($this->fecha_entrada[$this->nm_grid_colunas], 17);
               } 
               $fecha_entrada_x =  $this->fecha_entrada[$this->nm_grid_colunas];
               nm_conv_limpa_dado($fecha_entrada_x, "YYYY-MM-DD HH:II:SS");
               if (is_numeric($fecha_entrada_x) && strlen($fecha_entrada_x) > 0) 
               { 
                   $this->nm_data->SetaData($this->fecha_entrada[$this->nm_grid_colunas], "YYYY-MM-DD HH:II:SS");
                   $this->fecha_entrada[$this->nm_grid_colunas] = html_entity_decode($this->nm_data->FormataSaida($this->nm_data->FormatRegion("DH", "ddmmaaaa;hhiiss")), ENT_COMPAT, $_SESSION['scriptcase']['charset']);
               } 
          } 
          $this->fecha_entrada[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->fecha_entrada[$this->nm_grid_colunas]);
          $this->fecha_salida[$this->nm_grid_colunas] = $this->fecha_salida[$this->nm_grid_colunas];
          if ($this->fecha_salida[$this->nm_grid_colunas] === "") 
          { 
              $this->fecha_salida[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
               if (substr($this->fecha_salida[$this->nm_grid_colunas], 10, 1) == "-") 
               { 
                  $this->fecha_salida[$this->nm_grid_colunas] = substr($this->fecha_salida[$this->nm_grid_colunas], 0, 10) . " " . substr($this->fecha_salida[$this->nm_grid_colunas], 11);
               } 
               if (substr($this->fecha_salida[$this->nm_grid_colunas], 13, 1) == ".") 
               { 
                  $this->fecha_salida[$this->nm_grid_colunas] = substr($this->fecha_salida[$this->nm_grid_colunas], 0, 13) . ":" . substr($this->fecha_salida[$this->nm_grid_colunas], 14, 2) . ":" . substr($this->fecha_salida[$this->nm_grid_colunas], 17);
               } 
               $fecha_salida_x =  $this->fecha_salida[$this->nm_grid_colunas];
               nm_conv_limpa_dado($fecha_salida_x, "YYYY-MM-DD HH:II:SS");
               if (is_numeric($fecha_salida_x) && strlen($fecha_salida_x) > 0) 
               { 
                   $this->nm_data->SetaData($this->fecha_salida[$this->nm_grid_colunas], "YYYY-MM-DD HH:II:SS");
                   $this->fecha_salida[$this->nm_grid_colunas] = html_entity_decode($this->nm_data->FormataSaida($this->nm_data->FormatRegion("DH", "ddmmaaaa;hhii")), ENT_COMPAT, $_SESSION['scriptcase']['charset']);
               } 
          } 
          $this->fecha_salida[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->fecha_salida[$this->nm_grid_colunas]);
          $this->producto[$this->nm_grid_colunas] = $this->producto[$this->nm_grid_colunas];
          if ($this->producto[$this->nm_grid_colunas] === "") 
          { 
              $this->producto[$this->nm_grid_colunas] = "" ;  
          } 
          $this->producto[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->producto[$this->nm_grid_colunas]);
          $this->entrada[$this->nm_grid_colunas] = $this->entrada[$this->nm_grid_colunas];
          if ($this->entrada[$this->nm_grid_colunas] === "") 
          { 
              $this->entrada[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->entrada[$this->nm_grid_colunas], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $this->entrada[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->entrada[$this->nm_grid_colunas]);
          $this->jugador[$this->nm_grid_colunas] = $this->jugador[$this->nm_grid_colunas];
          if ($this->jugador[$this->nm_grid_colunas] === "") 
          { 
              $this->jugador[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->jugador[$this->nm_grid_colunas], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $this->jugador[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->jugador[$this->nm_grid_colunas]);
          $this->visitante[$this->nm_grid_colunas] = $this->visitante[$this->nm_grid_colunas];
          if ($this->visitante[$this->nm_grid_colunas] === "") 
          { 
              $this->visitante[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->visitante[$this->nm_grid_colunas], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $this->visitante[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->visitante[$this->nm_grid_colunas]);
          $this->tarjeta[$this->nm_grid_colunas] = $this->tarjeta[$this->nm_grid_colunas];
          if ($this->tarjeta[$this->nm_grid_colunas] === "") 
          { 
              $this->tarjeta[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->tarjeta[$this->nm_grid_colunas], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $this->tarjeta[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->tarjeta[$this->nm_grid_colunas]);
          $this->tokens[$this->nm_grid_colunas] = $this->tokens[$this->nm_grid_colunas];
          if ($this->tokens[$this->nm_grid_colunas] === "") 
          { 
              $this->tokens[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->tokens[$this->nm_grid_colunas], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $this->tokens[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->tokens[$this->nm_grid_colunas]);
          $this->minutos[$this->nm_grid_colunas] = $this->minutos[$this->nm_grid_colunas];
          if ($this->minutos[$this->nm_grid_colunas] === "") 
          { 
              $this->minutos[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->minutos[$this->nm_grid_colunas], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $this->minutos[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->minutos[$this->nm_grid_colunas]);
          $this->comida[$this->nm_grid_colunas] = $this->comida[$this->nm_grid_colunas];
          if ($this->comida[$this->nm_grid_colunas] === "") 
          { 
              $this->comida[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->comida[$this->nm_grid_colunas], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $this->comida[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->comida[$this->nm_grid_colunas]);
          $this->codigoboleto[$this->nm_grid_colunas] = $this->codigoboleto[$this->nm_grid_colunas];
          if ($this->codigoboleto[$this->nm_grid_colunas] === "") 
          { 
              $this->codigoboleto[$this->nm_grid_colunas] = "" ;  
          } 
          $this->codigoboleto[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->codigoboleto[$this->nm_grid_colunas]);
          $this->fechasalida[$this->nm_grid_colunas] = sc_strip_script($this->fechasalida[$this->nm_grid_colunas]);
          if ($this->fechasalida[$this->nm_grid_colunas] === "") 
          { 
              $this->fechasalida[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
               $this->fechasalida[$this->nm_grid_colunas] = substr($this->fechasalida[$this->nm_grid_colunas], 11) ;  
               if (substr($this->fechasalida[$this->nm_grid_colunas], 2, 1) == ".") 
               { 
                  $this->fechasalida[$this->nm_grid_colunas] = substr($this->fechasalida[$this->nm_grid_colunas], 0, 2) . ":" . substr($this->fechasalida[$this->nm_grid_colunas], 3, 2) . ":" . substr($this->fechasalida[$this->nm_grid_colunas], 6);
               } 
               $fechasalida_x =  $this->fechasalida[$this->nm_grid_colunas];
               nm_conv_limpa_dado($fechasalida_x, "HH:II:SS");
               if (is_numeric($fechasalida_x) && strlen($fechasalida_x) > 0) 
               { 
                   $this->nm_data->SetaData($this->fechasalida[$this->nm_grid_colunas], "HH:II:SS");
                   $this->fechasalida[$this->nm_grid_colunas] = html_entity_decode($this->nm_data->FormataSaida($this->nm_data->FormatRegion("HH", "hhiiss")), ENT_COMPAT, $_SESSION['scriptcase']['charset']);
               } 
          } 
          $this->fechasalida[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->fechasalida[$this->nm_grid_colunas]);
          $this->Lookup->lookup_factura($this->factura[$this->nm_grid_colunas], $this->uidtrans[$this->nm_grid_colunas], $this->array_factura); 
          $this->factura[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->factura[$this->nm_grid_colunas]);
          $this->Lookup->lookup_infolabel($this->infolabel[$this->nm_grid_colunas], $this->array_infolabel); 
          $this->infolabel[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->infolabel[$this->nm_grid_colunas]);
          if ($this->logo[$this->nm_grid_colunas] === "") 
          { 
              $this->logo[$this->nm_grid_colunas] = "" ;  
          } 
          if (!is_file($this->Ini->root  . $this->Ini->path_imag_cab . "/grp__NM__img__NM__logomrjoy.png"))
          { 
              $this->logo[$this->nm_grid_colunas] = "" ;  
          } 
          else 
          { 
              $this->logo[$this->nm_grid_colunas] = $this->NM_raiz_img  . $this->Ini->path_imag_cab . "/grp__NM__img__NM__logomrjoy.png"; 
          } 
          $this->logo[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->logo[$this->nm_grid_colunas]);
            $cell_logo = array('posx' => '30.691666666662798', 'posy' => '5.820833333332599', 'data' => $this->logo[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_factura = array('posx' => '50.270833333327', 'posy' => '1.5874999999997998', 'data' => $this->factura[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '10', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => B);
            $cell_fecha_registro = array('posx' => '0.2645833333333', 'posy' => '2.9104166666662996', 'data' => $this->fecha_registro[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'C', 'font_type'  => $this->default_font, 'font_size'  => '9', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => B);
            $cell_idproducto = array('posx' => '0', 'posy' => '19.292622916664236', 'data' => $this->idproducto[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'C', 'font_type'  => 'helvetica', 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => B);
            $cell_codigoboleto = array('posx' => '0', 'posy' => '26.996231249996594', 'data' => $this->codigoboleto[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'C', 'font_type'  => $this->default_font, 'font_size'  => '10', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => B);
            $cell_qrboleto = array('posx' => '25.664583333330096', 'posy' => '31.60897708332935', 'data' => $this->qrboleto[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_salida = array('posx' => '18.520833333330998', 'posy' => '71.96666666665759', 'data' => $this->fechasalida[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '10', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => B);
            $cell_textosalida = array('posx' => '18.785416666664297', 'posy' => '65.61666666665839', 'data' => $this->SC_conv_utf8('HORA DE SALIDA'), 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '10', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => B);

            if (isset($cell_logo['data']) && !empty($cell_logo['data']) && is_file($cell_logo['data']))
            {
                $Finfo_img = finfo_open(FILEINFO_MIME_TYPE);
                $Tipo_img  = finfo_file($Finfo_img, $cell_logo['data']);
                finfo_close($Finfo_img);
                if (substr($Tipo_img, 0, 5) == "image")
                {
                    $this->Pdf->Image($cell_logo['data'], $cell_logo['posx'], $cell_logo['posy'], 30, 0);
                }
            }

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

            $this->Pdf->SetFont($cell_fecha_registro['font_type'], $cell_fecha_registro['font_style'], $cell_fecha_registro['font_size']);
            $this->pdf_text_color($cell_fecha_registro['data'], $cell_fecha_registro['color_r'], $cell_fecha_registro['color_g'], $cell_fecha_registro['color_b']);
            if (!empty($cell_fecha_registro['posx']) && !empty($cell_fecha_registro['posy']))
            {
                $this->Pdf->SetXY($cell_fecha_registro['posx'], $cell_fecha_registro['posy']);
            }
            elseif (!empty($cell_fecha_registro['posx']))
            {
                $this->Pdf->SetX($cell_fecha_registro['posx']);
            }
            elseif (!empty($cell_fecha_registro['posy']))
            {
                $this->Pdf->SetY($cell_fecha_registro['posy']);
            }
            $this->Pdf->Cell($cell_fecha_registro['width'], 0, $cell_fecha_registro['data'], 0, 0, $cell_fecha_registro['align']);

            $this->Pdf->SetFont($cell_idproducto['font_type'], $cell_idproducto['font_style'], $cell_idproducto['font_size']);
            $this->pdf_text_color($cell_idproducto['data'], $cell_idproducto['color_r'], $cell_idproducto['color_g'], $cell_idproducto['color_b']);
            if (!empty($cell_idproducto['posx']) && !empty($cell_idproducto['posy']))
            {
                $this->Pdf->SetXY($cell_idproducto['posx'], $cell_idproducto['posy']);
            }
            elseif (!empty($cell_idproducto['posx']))
            {
                $this->Pdf->SetX($cell_idproducto['posx']);
            }
            elseif (!empty($cell_idproducto['posy']))
            {
                $this->Pdf->SetY($cell_idproducto['posy']);
            }
            $this->Pdf->Cell($cell_idproducto['width'], 0, $cell_idproducto['data'], 0, 0, $cell_idproducto['align']);

            $this->Pdf->SetFont($cell_codigoboleto['font_type'], $cell_codigoboleto['font_style'], $cell_codigoboleto['font_size']);
            $this->pdf_text_color($cell_codigoboleto['data'], $cell_codigoboleto['color_r'], $cell_codigoboleto['color_g'], $cell_codigoboleto['color_b']);
            if (!empty($cell_codigoboleto['posx']) && !empty($cell_codigoboleto['posy']))
            {
                $this->Pdf->SetXY($cell_codigoboleto['posx'], $cell_codigoboleto['posy']);
            }
            elseif (!empty($cell_codigoboleto['posx']))
            {
                $this->Pdf->SetX($cell_codigoboleto['posx']);
            }
            elseif (!empty($cell_codigoboleto['posy']))
            {
                $this->Pdf->SetY($cell_codigoboleto['posy']);
            }
            $this->Pdf->Cell($cell_codigoboleto['width'], 0, $cell_codigoboleto['data'], 0, 0, $cell_codigoboleto['align']);

            if (isset($cell_qrboleto['data']) && !empty($cell_qrboleto['data']) && is_file($cell_qrboleto['data']))
            {
                $Finfo_img = finfo_open(FILEINFO_MIME_TYPE);
                $Tipo_img  = finfo_file($Finfo_img, $cell_qrboleto['data']);
                finfo_close($Finfo_img);
                if (substr($Tipo_img, 0, 5) == "image")
                {
                    $this->Pdf->Image($cell_qrboleto['data'], $cell_qrboleto['posx'], $cell_qrboleto['posy'], 0, 0);
                }
            }

            $this->Pdf->SetFont($cell_salida['font_type'], $cell_salida['font_style'], $cell_salida['font_size']);
            $this->pdf_text_color($cell_salida['data'], $cell_salida['color_r'], $cell_salida['color_g'], $cell_salida['color_b']);
            if (!empty($cell_salida['posx']) && !empty($cell_salida['posy']))
            {
                $this->Pdf->SetXY($cell_salida['posx'], $cell_salida['posy']);
            }
            elseif (!empty($cell_salida['posx']))
            {
                $this->Pdf->SetX($cell_salida['posx']);
            }
            elseif (!empty($cell_salida['posy']))
            {
                $this->Pdf->SetY($cell_salida['posy']);
            }
            $this->Pdf->Cell($cell_salida['width'], 0, $cell_salida['data'], 0, 0, $cell_salida['align']);

            $this->Pdf->SetFont($cell_textosalida['font_type'], $cell_textosalida['font_style'], $cell_textosalida['font_size']);
            $this->pdf_text_color($cell_textosalida['data'], $cell_textosalida['color_r'], $cell_textosalida['color_g'], $cell_textosalida['color_b']);
            if (!empty($cell_textosalida['posx']) && !empty($cell_textosalida['posy']))
            {
                $this->Pdf->SetXY($cell_textosalida['posx'], $cell_textosalida['posy']);
            }
            elseif (!empty($cell_textosalida['posx']))
            {
                $this->Pdf->SetX($cell_textosalida['posx']);
            }
            elseif (!empty($cell_textosalida['posy']))
            {
                $this->Pdf->SetY($cell_textosalida['posy']);
            }
            $this->Pdf->Cell($cell_textosalida['width'], 0, $cell_textosalida['data'], 0, 0, $cell_textosalida['align']);

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
