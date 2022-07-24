<?php

class pdfreport_boletos_preview_rtf
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
                   nm_limpa_str_pdfreport_boletos_preview($cadapar[1]);
                   nm_protect_num_pdfreport_boletos_preview($cadapar[0], $cadapar[1]);
                   if ($cadapar[1] == "@ ") {$cadapar[1] = trim($cadapar[1]); }
                   $Tmp_par   = $cadapar[0];
                   $$Tmp_par = $cadapar[1];
                   if ($Tmp_par == "nmgp_opcao")
                   {
                       $_SESSION['sc_session'][$script_case_init]['pdfreport_boletos_preview']['opcao'] = $cadapar[1];
                   }
               }
          }
      }
      if (isset($idboleto)) 
      {
          $_SESSION['idboleto'] = $idboleto;
          nm_limpa_str_pdfreport_boletos_preview($_SESSION["idboleto"]);
      }
      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      require_once($this->Ini->path_aplicacao . "pdfreport_boletos_preview_total.class.php"); 
      $this->Tot      = new pdfreport_boletos_preview_total($this->Ini->sc_page);
      $this->prep_modulos("Tot");
      $Gb_geral = "quebra_geral_" . $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_boletos_preview']['SC_Ind_Groupby'];
      if (method_exists($this->Tot,$Gb_geral))
      {
          $this->Tot->$Gb_geral();
          $this->count_ger = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_boletos_preview']['tot_geral'][1];
      }
      if (!$this->Ini->sc_export_ajax) {
          require_once($this->Ini->path_lib_php . "/sc_progress_bar.php");
          $this->pb = new scProgressBar();
          $this->pb->setRoot($this->Ini->root);
          $this->pb->setDir($_SESSION['scriptcase']['pdfreport_boletos_preview']['glo_nm_path_imag_temp'] . "/");
          $this->pb->setProgressbarMd5($_GET['pbmd5']);
          $this->pb->initialize();
          $this->pb->setReturnUrl("./");
          $this->pb->setReturnOption('volta_grid');
          $this->pb->setTotalSteps($this->count_ger);
      }
      $this->Arquivo    = "sc_rtf";
      $this->Arquivo   .= "_" . date("YmdHis") . "_" . rand(0, 1000);
      $this->Arquivo   .= "_pdfreport_boletos_preview";
      $this->Arquivo   .= ".rtf";
      $this->Tit_doc    = "pdfreport_boletos_preview.rtf";
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
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_boletos_preview']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_boletos_preview']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_boletos_preview']['where_pesq_filtro'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_boletos_preview']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_boletos_preview']['campos_busca']))
      { 
          $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_boletos_preview']['campos_busca'];
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
              $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->comida = $Busca_temp['comida']; 
          $tmp_pos = strpos($this->comida, "##@@");
          if ($tmp_pos !== false && !is_array($this->comida))
          {
              $this->comida = substr($this->comida, 0, $tmp_pos);
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
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_boletos_preview']['rtf_name']))
      {
          $Pos = strrpos($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_boletos_preview']['rtf_name'], ".");
          if ($Pos === false) {
              $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_boletos_preview']['rtf_name'] .= ".rtf";
          }
          $this->Arquivo = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_boletos_preview']['rtf_name'];
          $this->Tit_doc = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_boletos_preview']['rtf_name'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_boletos_preview']['rtf_name']);
      }
      $this->arr_export = array('label' => array(), 'lines' => array());
      $this->arr_span   = array();

      $this->Texto_tag .= "<table>\r\n";
      $this->Texto_tag .= "<tr>\r\n";
      foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_boletos_preview']['field_order'] as $Cada_col)
      { 
          $SC_Label = (isset($this->New_label['qrboleto'])) ? $this->New_label['qrboleto'] : "Qrboleto"; 
          if ($Cada_col == "qrboleto" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['codrfid'])) ? $this->New_label['codrfid'] : "Codrfid"; 
          if ($Cada_col == "codrfid" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['fecha_registro'])) ? $this->New_label['fecha_registro'] : "Fecha Registro"; 
          if ($Cada_col == "fecha_registro" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['uidtrans'])) ? $this->New_label['uidtrans'] : "Uidtrans"; 
          if ($Cada_col == "uidtrans" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['idsale'])) ? $this->New_label['idsale'] : "Idsale"; 
          if ($Cada_col == "idsale" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['idproducto'])) ? $this->New_label['idproducto'] : "Idproducto"; 
          if ($Cada_col == "idproducto" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['ultdevice'])) ? $this->New_label['ultdevice'] : "Ultdevice"; 
          if ($Cada_col == "ultdevice" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['ultfecha'])) ? $this->New_label['ultfecha'] : "Ultfecha"; 
          if ($Cada_col == "ultfecha" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
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
          $SC_Label = (isset($this->New_label['nombre'])) ? $this->New_label['nombre'] : "Nombre"; 
          if ($Cada_col == "nombre" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['fecha_nacimiento'])) ? $this->New_label['fecha_nacimiento'] : "Fecha Nacimiento"; 
          if ($Cada_col == "fecha_nacimiento" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['genero'])) ? $this->New_label['genero'] : "Genero"; 
          if ($Cada_col == "genero" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['username'])) ? $this->New_label['username'] : "Username"; 
          if ($Cada_col == "username" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['fecha_activacion'])) ? $this->New_label['fecha_activacion'] : "Fecha Activacion"; 
          if ($Cada_col == "fecha_activacion" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['fecha_entrada'])) ? $this->New_label['fecha_entrada'] : "Fecha Entrada"; 
          if ($Cada_col == "fecha_entrada" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['fecha_salida'])) ? $this->New_label['fecha_salida'] : "Fecha Salida"; 
          if ($Cada_col == "fecha_salida" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
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
          $SC_Label = (isset($this->New_label['codigoboleto'])) ? $this->New_label['codigoboleto'] : "Codigoboleto"; 
          if ($Cada_col == "codigoboleto" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['fechasalida'])) ? $this->New_label['fechasalida'] : "Fechasalida"; 
          if ($Cada_col == "fechasalida" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['factura'])) ? $this->New_label['factura'] : "factura"; 
          if ($Cada_col == "factura" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['infolabel'])) ? $this->New_label['infolabel'] : "infolabel"; 
          if ($Cada_col == "infolabel" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['logo'])) ? $this->New_label['logo'] : "logo"; 
          if ($Cada_col == "logo" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
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
      $nmgp_select_count .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_boletos_preview']['where_pesq'];
      $nmgp_order_by = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_boletos_preview']['order_grid'];
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
         $this->qrboleto = $rs->fields[0] ;  
         $this->codrfid = $rs->fields[1] ;  
         $this->fecha_registro = $rs->fields[2] ;  
         $this->uidtrans = $rs->fields[3] ;  
         $this->idsale = $rs->fields[4] ;  
         $this->idsale = (string)$this->idsale;
         $this->idproducto = $rs->fields[5] ;  
         $this->idproducto = (string)$this->idproducto;
         $this->ultdevice = $rs->fields[6] ;  
         $this->ultdevice = (string)$this->ultdevice;
         $this->ultfecha = $rs->fields[7] ;  
         $this->estado = $rs->fields[8] ;  
         $this->estado = (string)$this->estado;
         $this->nombre = $rs->fields[9] ;  
         $this->fecha_nacimiento = $rs->fields[10] ;  
         $this->genero = $rs->fields[11] ;  
         $this->username = $rs->fields[12] ;  
         $this->fecha_activacion = $rs->fields[13] ;  
         $this->fecha_entrada = $rs->fields[14] ;  
         $this->fecha_salida = $rs->fields[15] ;  
         $this->producto = $rs->fields[16] ;  
         $this->entrada = $rs->fields[17] ;  
         $this->entrada = (string)$this->entrada;
         $this->jugador = $rs->fields[18] ;  
         $this->jugador = (string)$this->jugador;
         $this->visitante = $rs->fields[19] ;  
         $this->visitante = (string)$this->visitante;
         $this->tarjeta = $rs->fields[20] ;  
         $this->tarjeta = (string)$this->tarjeta;
         $this->tokens = $rs->fields[21] ;  
         $this->tokens = (string)$this->tokens;
         $this->minutos = $rs->fields[22] ;  
         $this->minutos = (string)$this->minutos;
         $this->comida = $rs->fields[23] ;  
         $this->comida = (string)$this->comida;
         $this->codigoboleto = $rs->fields[24] ;  
         $this->fechasalida = $rs->fields[25] ;  
         //----- lookup - idproducto
         $this->look_idproducto = $this->idproducto; 
         $this->Lookup->lookup_idproducto($this->look_idproducto, $this->idproducto) ; 
         $this->look_idproducto = ($this->look_idproducto == "&nbsp;") ? "" : $this->look_idproducto; 
         $this->sc_proc_grid = true; 
         //----- lookup - factura
         $this->Lookup->lookup_factura($this->factura, $this->uidtrans, $this->array_factura); 
         $this->factura = str_replace("<br>", " ", $this->factura); 
         $this->factura = ($this->factura == "&nbsp;") ? "" : $this->factura; 
         //----- lookup - infolabel
         $this->Lookup->lookup_infolabel($this->infolabel, $this->array_infolabel); 
         $this->infolabel = str_replace("<br>", " ", $this->infolabel); 
         $this->infolabel = ($this->infolabel == "&nbsp;") ? "" : $this->infolabel; 
         foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_boletos_preview']['field_order'] as $Cada_col)
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
      if(isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_boletos_preview']['export_sel_columns']['field_order']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_boletos_preview']['field_order'] = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_boletos_preview']['export_sel_columns']['field_order'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_boletos_preview']['export_sel_columns']['field_order']);
      }
      if(isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_boletos_preview']['export_sel_columns']['usr_cmp_sel']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_boletos_preview']['usr_cmp_sel'] = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_boletos_preview']['export_sel_columns']['usr_cmp_sel'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_boletos_preview']['export_sel_columns']['usr_cmp_sel']);
      }
      $rs->Close();
   }
   //----- qrboleto
   function NM_export_qrboleto()
   {
         $this->qrboleto = NM_charset_to_utf8($this->qrboleto);
         $this->qrboleto = str_replace('<', '&lt;', $this->qrboleto);
         $this->qrboleto = str_replace('>', '&gt;', $this->qrboleto);
         $this->Texto_tag .= "<td>" . $this->qrboleto . "</td>\r\n";
   }
   //----- codrfid
   function NM_export_codrfid()
   {
         $this->codrfid = html_entity_decode($this->codrfid, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->codrfid = strip_tags($this->codrfid);
         $this->codrfid = NM_charset_to_utf8($this->codrfid);
         $this->codrfid = str_replace('<', '&lt;', $this->codrfid);
         $this->codrfid = str_replace('>', '&gt;', $this->codrfid);
         $this->Texto_tag .= "<td>" . $this->codrfid . "</td>\r\n";
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
                 $this->fecha_registro = $this->nm_data->FormataSaida("d-m-Y H:i");
             } 
         $this->fecha_registro = NM_charset_to_utf8($this->fecha_registro);
         $this->fecha_registro = str_replace('<', '&lt;', $this->fecha_registro);
         $this->fecha_registro = str_replace('>', '&gt;', $this->fecha_registro);
         $this->Texto_tag .= "<td>" . $this->fecha_registro . "</td>\r\n";
   }
   //----- uidtrans
   function NM_export_uidtrans()
   {
         $this->uidtrans = html_entity_decode($this->uidtrans, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->uidtrans = strip_tags($this->uidtrans);
         $this->uidtrans = NM_charset_to_utf8($this->uidtrans);
         $this->uidtrans = str_replace('<', '&lt;', $this->uidtrans);
         $this->uidtrans = str_replace('>', '&gt;', $this->uidtrans);
         $this->Texto_tag .= "<td>" . $this->uidtrans . "</td>\r\n";
   }
   //----- idsale
   function NM_export_idsale()
   {
             nmgp_Form_Num_Val($this->idsale, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->idsale = NM_charset_to_utf8($this->idsale);
         $this->idsale = str_replace('<', '&lt;', $this->idsale);
         $this->idsale = str_replace('>', '&gt;', $this->idsale);
         $this->Texto_tag .= "<td>" . $this->idsale . "</td>\r\n";
   }
   //----- idproducto
   function NM_export_idproducto()
   {
         nmgp_Form_Num_Val($this->look_idproducto, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->look_idproducto = NM_charset_to_utf8($this->look_idproducto);
         $this->look_idproducto = str_replace('<', '&lt;', $this->look_idproducto);
         $this->look_idproducto = str_replace('>', '&gt;', $this->look_idproducto);
         $this->Texto_tag .= "<td>" . $this->look_idproducto . "</td>\r\n";
   }
   //----- ultdevice
   function NM_export_ultdevice()
   {
             nmgp_Form_Num_Val($this->ultdevice, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->ultdevice = NM_charset_to_utf8($this->ultdevice);
         $this->ultdevice = str_replace('<', '&lt;', $this->ultdevice);
         $this->ultdevice = str_replace('>', '&gt;', $this->ultdevice);
         $this->Texto_tag .= "<td>" . $this->ultdevice . "</td>\r\n";
   }
   //----- ultfecha
   function NM_export_ultfecha()
   {
             if (substr($this->ultfecha, 10, 1) == "-") 
             { 
                 $this->ultfecha = substr($this->ultfecha, 0, 10) . " " . substr($this->ultfecha, 11);
             } 
             if (substr($this->ultfecha, 13, 1) == ".") 
             { 
                $this->ultfecha = substr($this->ultfecha, 0, 13) . ":" . substr($this->ultfecha, 14, 2) . ":" . substr($this->ultfecha, 17);
             } 
             $conteudo_x =  $this->ultfecha;
             nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD HH:II:SS");
             if (is_numeric($conteudo_x) && strlen($conteudo_x) > 0) 
             { 
                 $this->nm_data->SetaData($this->ultfecha, "YYYY-MM-DD HH:II:SS  ");
                 $this->ultfecha = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DH", "ddmmaaaa;hhiiss"));
             } 
         $this->ultfecha = NM_charset_to_utf8($this->ultfecha);
         $this->ultfecha = str_replace('<', '&lt;', $this->ultfecha);
         $this->ultfecha = str_replace('>', '&gt;', $this->ultfecha);
         $this->Texto_tag .= "<td>" . $this->ultfecha . "</td>\r\n";
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
   //----- nombre
   function NM_export_nombre()
   {
         $this->nombre = html_entity_decode($this->nombre, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->nombre = strip_tags($this->nombre);
         $this->nombre = NM_charset_to_utf8($this->nombre);
         $this->nombre = str_replace('<', '&lt;', $this->nombre);
         $this->nombre = str_replace('>', '&gt;', $this->nombre);
         $this->Texto_tag .= "<td>" . $this->nombre . "</td>\r\n";
   }
   //----- fecha_nacimiento
   function NM_export_fecha_nacimiento()
   {
             $conteudo_x =  $this->fecha_nacimiento;
             nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD");
             if (is_numeric($conteudo_x) && strlen($conteudo_x) > 0) 
             { 
                 $this->nm_data->SetaData($this->fecha_nacimiento, "YYYY-MM-DD  ");
                 $this->fecha_nacimiento = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DT", "ddmmaaaa"));
             } 
         $this->fecha_nacimiento = NM_charset_to_utf8($this->fecha_nacimiento);
         $this->fecha_nacimiento = str_replace('<', '&lt;', $this->fecha_nacimiento);
         $this->fecha_nacimiento = str_replace('>', '&gt;', $this->fecha_nacimiento);
         $this->Texto_tag .= "<td>" . $this->fecha_nacimiento . "</td>\r\n";
   }
   //----- genero
   function NM_export_genero()
   {
         $this->genero = html_entity_decode($this->genero, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->genero = strip_tags($this->genero);
         $this->genero = NM_charset_to_utf8($this->genero);
         $this->genero = str_replace('<', '&lt;', $this->genero);
         $this->genero = str_replace('>', '&gt;', $this->genero);
         $this->Texto_tag .= "<td>" . $this->genero . "</td>\r\n";
   }
   //----- username
   function NM_export_username()
   {
         $this->username = html_entity_decode($this->username, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->username = strip_tags($this->username);
         $this->username = NM_charset_to_utf8($this->username);
         $this->username = str_replace('<', '&lt;', $this->username);
         $this->username = str_replace('>', '&gt;', $this->username);
         $this->Texto_tag .= "<td>" . $this->username . "</td>\r\n";
   }
   //----- fecha_activacion
   function NM_export_fecha_activacion()
   {
             if (substr($this->fecha_activacion, 10, 1) == "-") 
             { 
                 $this->fecha_activacion = substr($this->fecha_activacion, 0, 10) . " " . substr($this->fecha_activacion, 11);
             } 
             if (substr($this->fecha_activacion, 13, 1) == ".") 
             { 
                $this->fecha_activacion = substr($this->fecha_activacion, 0, 13) . ":" . substr($this->fecha_activacion, 14, 2) . ":" . substr($this->fecha_activacion, 17);
             } 
             $conteudo_x =  $this->fecha_activacion;
             nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD HH:II:SS");
             if (is_numeric($conteudo_x) && strlen($conteudo_x) > 0) 
             { 
                 $this->nm_data->SetaData($this->fecha_activacion, "YYYY-MM-DD HH:II:SS  ");
                 $this->fecha_activacion = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DH", "ddmmaaaa;hhiiss"));
             } 
         $this->fecha_activacion = NM_charset_to_utf8($this->fecha_activacion);
         $this->fecha_activacion = str_replace('<', '&lt;', $this->fecha_activacion);
         $this->fecha_activacion = str_replace('>', '&gt;', $this->fecha_activacion);
         $this->Texto_tag .= "<td>" . $this->fecha_activacion . "</td>\r\n";
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
         $this->fecha_entrada = NM_charset_to_utf8($this->fecha_entrada);
         $this->fecha_entrada = str_replace('<', '&lt;', $this->fecha_entrada);
         $this->fecha_entrada = str_replace('>', '&gt;', $this->fecha_entrada);
         $this->Texto_tag .= "<td>" . $this->fecha_entrada . "</td>\r\n";
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
                 $this->fecha_salida = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DH", "ddmmaaaa;hhii"));
             } 
         $this->fecha_salida = NM_charset_to_utf8($this->fecha_salida);
         $this->fecha_salida = str_replace('<', '&lt;', $this->fecha_salida);
         $this->fecha_salida = str_replace('>', '&gt;', $this->fecha_salida);
         $this->Texto_tag .= "<td>" . $this->fecha_salida . "</td>\r\n";
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
   //----- codigoboleto
   function NM_export_codigoboleto()
   {
         $this->codigoboleto = html_entity_decode($this->codigoboleto, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->codigoboleto = strip_tags($this->codigoboleto);
         $this->codigoboleto = NM_charset_to_utf8($this->codigoboleto);
         $this->codigoboleto = str_replace('<', '&lt;', $this->codigoboleto);
         $this->codigoboleto = str_replace('>', '&gt;', $this->codigoboleto);
         $this->Texto_tag .= "<td>" . $this->codigoboleto . "</td>\r\n";
   }
   //----- fechasalida
   function NM_export_fechasalida()
   {
             $this->fechasalida = substr($this->fechasalida, 11) ;  
             if (substr($this->fechasalida, 2, 1) == ".") 
             { 
                 $this->fechasalida = substr($this->fechasalida, 0, 2) . ":" . substr($this->fechasalida, 3, 2) . ":" . substr($this->fechasalida, 6);
             } 
             $conteudo_x =  $this->fechasalida;
             nm_conv_limpa_dado($conteudo_x, "HH:II:SS");
             if (is_numeric($conteudo_x) && strlen($conteudo_x) > 0) 
             { 
                 $this->nm_data->SetaData($this->fechasalida, "HH:II:SS  ");
                 $this->fechasalida = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("HH", "hhiiss"));
             } 
         $this->fechasalida = NM_charset_to_utf8($this->fechasalida);
         $this->fechasalida = str_replace('<', '&lt;', $this->fechasalida);
         $this->fechasalida = str_replace('>', '&gt;', $this->fechasalida);
         $this->Texto_tag .= "<td>" . $this->fechasalida . "</td>\r\n";
   }
   //----- factura
   function NM_export_factura()
   {
         $this->factura = NM_charset_to_utf8($this->factura);
         $this->factura = str_replace('<', '&lt;', $this->factura);
         $this->factura = str_replace('>', '&gt;', $this->factura);
         $this->Texto_tag .= "<td>" . $this->factura . "</td>\r\n";
   }
   //----- infolabel
   function NM_export_infolabel()
   {
         $this->infolabel = NM_charset_to_utf8($this->infolabel);
         $this->infolabel = str_replace('<', '&lt;', $this->infolabel);
         $this->infolabel = str_replace('>', '&gt;', $this->infolabel);
         $this->Texto_tag .= "<td>" . $this->infolabel . "</td>\r\n";
   }
   //----- logo
   function NM_export_logo()
   {
         $this->logo = NM_charset_to_utf8($this->logo);
         $this->logo = str_replace('<', '&lt;', $this->logo);
         $this->logo = str_replace('>', '&gt;', $this->logo);
         $this->Texto_tag .= "<td>" . $this->logo . "</td>\r\n";
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
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_boletos_preview']['rtf_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_boletos_preview']['rtf_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_boletos_preview'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_boletos_preview'][$path_doc_md5][1] = $this->Tit_doc;
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
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_boletos_preview']['rtf_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_boletos_preview']['rtf_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_boletos_preview'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_boletos_preview'][$path_doc_md5][1] = $this->Tit_doc;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE><?php echo $this->Ini->Nm_lang['lang_othr_chart_title'] ?> boletos :: RTF</TITLE>
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
<form name="Fdown" method="get" action="pdfreport_boletos_preview_download.php" target="_blank" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="pdfreport_boletos_preview"> 
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
