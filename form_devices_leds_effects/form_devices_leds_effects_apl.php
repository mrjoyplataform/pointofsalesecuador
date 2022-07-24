<?php
//
class form_devices_leds_effects_apl
{
   var $has_where_params = false;
   var $NM_is_redirected = false;
   var $NM_non_ajax_info = false;
   var $formatado = false;
   var $use_100perc_fields = false;
   var $classes_100perc_fields = array();
   var $close_modal_after_insert = false;
   var $NM_ajax_flag    = false;
   var $NM_ajax_opcao   = '';
   var $NM_ajax_retorno = '';
   var $NM_ajax_info    = array('result'            => '',
                                'param'             => array(),
                                'autoComp'          => '',
                                'rsSize'            => '',
                                'msgDisplay'        => '',
                                'errList'           => array(),
                                'fldList'           => array(),
                                'varList'           => array(),
                                'focus'             => '',
                                'navStatus'         => array(),
                                'navSummary'        => array(),
                                'navPage'           => array(),
                                'redir'             => array(),
                                'blockDisplay'      => array(),
                                'fieldDisplay'      => array(),
                                'fieldLabel'        => array(),
                                'readOnly'          => array(),
                                'btnVars'           => array(),
                                'ajaxAlert'         => array(),
                                'ajaxMessage'       => array(),
                                'ajaxJavascript'    => array(),
                                'buttonDisplay'     => array(),
                                'buttonDisplayVert' => array(),
                                'calendarReload'    => false,
                                'quickSearchRes'    => false,
                                'displayMsg'        => false,
                                'displayMsgTxt'     => '',
                                'dyn_search'        => array(),
                                'empty_filter'      => '',
                                'event_field'       => '',
                                'fieldsWithErrors'  => array(),
                               );
   var $NM_ajax_force_values = false;
   var $Nav_permite_ava     = true;
   var $Nav_permite_ret     = true;
   var $Apl_com_erro        = false;
   var $app_is_initializing = false;
   var $Ini;
   var $Erro;
   var $Db;
   var $cod_device_;
   var $cod_activo_;
   var $cod_grupo_;
   var $device_name_;
   var $activa_;
   var $estado_;
   var $ult_rfid_;
   var $ult_fecha_;
   var $ult_fecha__hora;
   var $valor_default_;
   var $acepta_tiempo_;
   var $acepta_tokens_;
   var $dev_ip_;
   var $tipo_dev_;
   var $direccion_torno_;
   var $timeout_rfid_;
   var $discapacitado_;
   var $numcaja_;
   var $empleado_;
   var $tokens_;
   var $serialrfid_;
   var $bidireccion_;
   var $cod_devicee_;
   var $url_1_;
   var $url_2_;
   var $url_3_;
   var $foto1_;
   var $foto1__scfile_name;
   var $foto1__ul_name;
   var $foto1__scfile_type;
   var $foto1__ul_type;
   var $foto1__limpa;
   var $foto1__salva;
   var $out_foto1_;
   var $foto2_;
   var $foto2__scfile_name;
   var $foto2__ul_name;
   var $foto2__scfile_type;
   var $foto2__ul_type;
   var $foto2__limpa;
   var $foto2__salva;
   var $out_foto2_;
   var $foto3_;
   var $foto3__scfile_name;
   var $foto3__ul_name;
   var $foto3__scfile_type;
   var $foto3__ul_type;
   var $foto3__limpa;
   var $foto3__salva;
   var $out_foto3_;
   var $pin_relay1_;
   var $pin_relay2_;
   var $rfid_read_;
   var $rfid_estado_;
   var $rfid_fecha_;
   var $rfid_fecha__hora;
   var $url_accion_;
   var $url_atraccion_;
   var $uhfip_;
   var $url_reader_;
   var $cod_rfid900_;
   var $mensaje_;
   var $tipolector_;
   var $url_accion_bg_;
   var $url_inicio_;
   var $ledstripe1_;
   var $ledstripe1__1;
   var $ledstripe2_;
   var $ledstripe3_;
   var $ledstripe4_;
   var $lasteffect_;
   var $color_;
   var $nm_data;
   var $nmgp_opcao;
   var $nmgp_opc_ant;
   var $sc_evento;
   var $nmgp_clone;
   var $nmgp_return_img = array();
   var $nmgp_dados_form = array();
   var $nmgp_dados_select = array();
   var $nm_location;
   var $nm_flag_iframe;
   var $nm_flag_saida_novo;
   var $nmgp_botoes = array();
   var $nmgp_url_saida;
   var $nmgp_form_show;
   var $nmgp_form_empty;
   var $nmgp_cmp_readonly = array();
   var $nmgp_cmp_hidden = array();
   var $sc_teve_incl = false;
   var $sc_teve_excl = false;
   var $sc_teve_alt  = false;
   var $sc_after_all_insert = false;
   var $sc_after_all_update = false;
   var $sc_after_all_delete = false;
   var $sc_max_reg = 10; 
   var $sc_max_reg_incl = 10; 
   var $form_vert_form_devices_leds_effects = array();
   var $form_paginacao = 'parcial';
   var $lig_edit_lookup      = false;
   var $lig_edit_lookup_call = false;
   var $lig_edit_lookup_cb   = '';
   var $lig_edit_lookup_row  = '';
   var $is_calendar_app = false;
   var $Embutida_call  = false;
   var $Embutida_ronly = false;
   var $Embutida_proc  = false;
   var $Embutida_form  = false;
   var $Grid_editavel  = false;
   var $url_webhelp = '';
   var $nm_todas_criticas;
   var $Campos_Mens_erro;
   var $nm_new_label = array();
   var $record_insert_ok = false;
   var $record_delete_ok = false;
//
//----- 
   function ini_controle()
   {
        global $nm_url_saida, $teste_validade, $script_case_init, 
               $GLOBALS, $Campos_Crit, $Campos_Falta, $Campos_Erros, $sc_seq_vert, $sc_check_incl, 
               $glo_senha_protect, $nm_apl_dependente, $nm_form_submit, $sc_check_excl, $nm_opc_form_php, $nm_call_php, $nm_opc_lookup;


      if ($this->NM_ajax_flag)
      {
          if (isset($this->NM_ajax_info['param']['cod_device_']))
          {
              $this->cod_device_ = $this->NM_ajax_info['param']['cod_device_'];
          }
          if (isset($this->NM_ajax_info['param']['color_']))
          {
              $this->color_ = $this->NM_ajax_info['param']['color_'];
          }
          if (isset($this->NM_ajax_info['param']['device_name_']))
          {
              $this->device_name_ = $this->NM_ajax_info['param']['device_name_'];
          }
          if (isset($this->NM_ajax_info['param']['ledstripe1_']))
          {
              $this->ledstripe1_ = $this->NM_ajax_info['param']['ledstripe1_'];
          }
          if (isset($this->NM_ajax_info['param']['ledstripe2_']))
          {
              $this->ledstripe2_ = $this->NM_ajax_info['param']['ledstripe2_'];
          }
          if (isset($this->NM_ajax_info['param']['ledstripe3_']))
          {
              $this->ledstripe3_ = $this->NM_ajax_info['param']['ledstripe3_'];
          }
          if (isset($this->NM_ajax_info['param']['ledstripe4_']))
          {
              $this->ledstripe4_ = $this->NM_ajax_info['param']['ledstripe4_'];
          }
          if (isset($this->NM_ajax_info['param']['nm_form_submit']))
          {
              $this->nm_form_submit = $this->NM_ajax_info['param']['nm_form_submit'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_ancora']))
          {
              $this->nmgp_ancora = $this->NM_ajax_info['param']['nmgp_ancora'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_arg_dyn_search']))
          {
              $this->nmgp_arg_dyn_search = $this->NM_ajax_info['param']['nmgp_arg_dyn_search'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_arg_fast_search']))
          {
              $this->nmgp_arg_fast_search = $this->NM_ajax_info['param']['nmgp_arg_fast_search'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_cond_fast_search']))
          {
              $this->nmgp_cond_fast_search = $this->NM_ajax_info['param']['nmgp_cond_fast_search'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_fast_search']))
          {
              $this->nmgp_fast_search = $this->NM_ajax_info['param']['nmgp_fast_search'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_num_form']))
          {
              $this->nmgp_num_form = $this->NM_ajax_info['param']['nmgp_num_form'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_opcao']))
          {
              $this->nmgp_opcao = $this->NM_ajax_info['param']['nmgp_opcao'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_ordem']))
          {
              $this->nmgp_ordem = $this->NM_ajax_info['param']['nmgp_ordem'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_parms']))
          {
              $this->nmgp_parms = $this->NM_ajax_info['param']['nmgp_parms'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_refresh_row']))
          {
              $this->nmgp_refresh_row = $this->NM_ajax_info['param']['nmgp_refresh_row'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_url_saida']))
          {
              $this->nmgp_url_saida = $this->NM_ajax_info['param']['nmgp_url_saida'];
          }
          if (isset($this->NM_ajax_info['param']['sc_clone']))
          {
              $this->sc_clone = $this->NM_ajax_info['param']['sc_clone'];
          }
          if (isset($this->NM_ajax_info['param']['sc_seq_clone']))
          {
              $this->sc_seq_clone = $this->NM_ajax_info['param']['sc_seq_clone'];
          }
          if (isset($this->NM_ajax_info['param']['sc_seq_vert']))
          {
              $this->sc_seq_vert = $this->NM_ajax_info['param']['sc_seq_vert'];
          }
          if (isset($this->NM_ajax_info['param']['script_case_init']))
          {
              $this->script_case_init = $this->NM_ajax_info['param']['script_case_init'];
          }
          if (isset($this->nmgp_refresh_fields))
          {
              $this->nmgp_refresh_fields = explode('_#fld#_', $this->nmgp_refresh_fields);
              $this->nmgp_opcao          = 'recarga';
          }
          if (!isset($this->nmgp_refresh_row))
          {
              $this->nmgp_refresh_row = '';
          }
      }

      $this->scSajaxReservedWords = array('rs', 'rst', 'rsrnd', 'rsargs');
      $this->sc_conv_var = array();
      $this->sc_conv_var['cod_device'] = "cod_device_";
      $this->sc_conv_var['cod_activo'] = "cod_activo_";
      $this->sc_conv_var['cod_grupo'] = "cod_grupo_";
      $this->sc_conv_var['device_name'] = "device_name_";
      $this->sc_conv_var['activa'] = "activa_";
      $this->sc_conv_var['estado'] = "estado_";
      $this->sc_conv_var['ult_rfid'] = "ult_rfid_";
      $this->sc_conv_var['ult_fecha'] = "ult_fecha_";
      $this->sc_conv_var['valor_default'] = "valor_default_";
      $this->sc_conv_var['acepta_tiempo'] = "acepta_tiempo_";
      $this->sc_conv_var['acepta_tokens'] = "acepta_tokens_";
      $this->sc_conv_var['dev_ip'] = "dev_ip_";
      $this->sc_conv_var['tipo_dev'] = "tipo_dev_";
      $this->sc_conv_var['direccion_torno'] = "direccion_torno_";
      $this->sc_conv_var['timeout_rfid'] = "timeout_rfid_";
      $this->sc_conv_var['discapacitado'] = "discapacitado_";
      $this->sc_conv_var['numcaja'] = "numcaja_";
      $this->sc_conv_var['empleado'] = "empleado_";
      $this->sc_conv_var['tokens'] = "tokens_";
      $this->sc_conv_var['serialrfid'] = "serialrfid_";
      $this->sc_conv_var['bidireccion'] = "bidireccion_";
      $this->sc_conv_var['cod_devicee'] = "cod_devicee_";
      $this->sc_conv_var['url_1'] = "url_1_";
      $this->sc_conv_var['url_2'] = "url_2_";
      $this->sc_conv_var['url_3'] = "url_3_";
      $this->sc_conv_var['foto1'] = "foto1_";
      $this->sc_conv_var['foto2'] = "foto2_";
      $this->sc_conv_var['foto3'] = "foto3_";
      $this->sc_conv_var['pin_relay1'] = "pin_relay1_";
      $this->sc_conv_var['pin_relay2'] = "pin_relay2_";
      $this->sc_conv_var['rfid_read'] = "rfid_read_";
      $this->sc_conv_var['rfid_estado'] = "rfid_estado_";
      $this->sc_conv_var['rfid_fecha'] = "rfid_fecha_";
      $this->sc_conv_var['url_accion'] = "url_accion_";
      $this->sc_conv_var['url_atraccion'] = "url_atraccion_";
      $this->sc_conv_var['uhfip'] = "uhfip_";
      $this->sc_conv_var['url_reader'] = "url_reader_";
      $this->sc_conv_var['cod_rfid900'] = "cod_rfid900_";
      $this->sc_conv_var['mensaje'] = "mensaje_";
      $this->sc_conv_var['tipolector'] = "tipolector_";
      $this->sc_conv_var['url_accion_bg'] = "url_accion_bg_";
      $this->sc_conv_var['url_inicio'] = "url_inicio_";
      $this->sc_conv_var['ledstripe1'] = "ledstripe1_";
      $this->sc_conv_var['ledstripe2'] = "ledstripe2_";
      $this->sc_conv_var['ledstripe3'] = "ledstripe3_";
      $this->sc_conv_var['ledstripe4'] = "ledstripe4_";
      $this->sc_conv_var['lasteffect'] = "lasteffect_";
      $this->sc_conv_var['color'] = "color_";
      if (!empty($_FILES))
      {
          foreach ($_FILES as $nmgp_campo => $nmgp_valores)
          {
               if (!in_array(strtolower($nmgp_campo), $this->scSajaxReservedWords)) {
                   if (isset($this->sc_conv_var[$nmgp_campo]))
                   {
                       $nmgp_campo = $this->sc_conv_var[$nmgp_campo];
                   }
                   elseif (isset($this->sc_conv_var[strtolower($nmgp_campo)]))
                   {
                       $nmgp_campo = $this->sc_conv_var[strtolower($nmgp_campo)];
                   }
               }
               $tmp_scfile_name     = $nmgp_campo . "_scfile_name";
               $tmp_scfile_type     = $nmgp_campo . "_scfile_type";
               $this->$nmgp_campo = is_array($nmgp_valores['tmp_name']) ? $nmgp_valores['tmp_name'][0] : $nmgp_valores['tmp_name'];
               $this->$tmp_scfile_type   = is_array($nmgp_valores['type'])     ? $nmgp_valores['type'][0]     : $nmgp_valores['type'];
               $this->$tmp_scfile_name   = is_array($nmgp_valores['name'])     ? $nmgp_valores['name'][0]     : $nmgp_valores['name'];
          }
      }
      $Sc_lig_md5 = false;
      if (!empty($_POST))
      {
          foreach ($_POST as $nmgp_var => $nmgp_val)
          {
               if (substr($nmgp_var, 0, 11) == "SC_glo_par_")
               {
                   $nmgp_var = substr($nmgp_var, 11);
                   $nmgp_val = $_SESSION[$nmgp_val];
               }
              if ($nmgp_var == "nmgp_parms" && substr($nmgp_val, 0, 8) == "@SC_par@")
              {
                  $SC_Ind_Val = explode("@SC_par@", $nmgp_val);
                  if (count($SC_Ind_Val) == 4 && isset($_SESSION['sc_session'][$SC_Ind_Val[1]][$SC_Ind_Val[2]]['Lig_Md5'][$SC_Ind_Val[3]]))
                  {
                      $nmgp_val = $_SESSION['sc_session'][$SC_Ind_Val[1]][$SC_Ind_Val[2]]['Lig_Md5'][$SC_Ind_Val[3]];
                      $Sc_lig_md5 = true;
                  }
                  else
                  {
                      $_SESSION['sc_session']['SC_parm_violation'] = true;
                  }
              }
               if (!in_array(strtolower($nmgp_var), $this->scSajaxReservedWords)) {
                   if (isset($this->sc_conv_var[$nmgp_var]))
                   {
                       $nmgp_var = $this->sc_conv_var[$nmgp_var];
                   }
                   elseif (isset($this->sc_conv_var[strtolower($nmgp_var)]))
                   {
                       $nmgp_var = $this->sc_conv_var[strtolower($nmgp_var)];
                   }
               }
               $nmgp_val = NM_decode_input($nmgp_val);
               $this->$nmgp_var = $nmgp_val;
          }
      }
      if (!empty($_GET))
      {
          foreach ($_GET as $nmgp_var => $nmgp_val)
          {
               if (substr($nmgp_var, 0, 11) == "SC_glo_par_")
               {
                   $nmgp_var = substr($nmgp_var, 11);
                   $nmgp_val = $_SESSION[$nmgp_val];
               }
              if ($nmgp_var == "nmgp_parms" && substr($nmgp_val, 0, 8) == "@SC_par@")
              {
                  $SC_Ind_Val = explode("@SC_par@", $nmgp_val);
                  if (count($SC_Ind_Val) == 4 && isset($_SESSION['sc_session'][$SC_Ind_Val[1]][$SC_Ind_Val[2]]['Lig_Md5'][$SC_Ind_Val[3]]))
                  {
                      $nmgp_val = $_SESSION['sc_session'][$SC_Ind_Val[1]][$SC_Ind_Val[2]]['Lig_Md5'][$SC_Ind_Val[3]];
                      $Sc_lig_md5 = true;
                  }
                  else
                  {
                       $_SESSION['sc_session']['SC_parm_violation'] = true;
                  }
              }
               if (!in_array(strtolower($nmgp_var), $this->scSajaxReservedWords)) {
                   if (isset($this->sc_conv_var[$nmgp_var]))
                   {
                       $nmgp_var = $this->sc_conv_var[$nmgp_var];
                   }
                   elseif (isset($this->sc_conv_var[strtolower($nmgp_var)]))
                   {
                       $nmgp_var = $this->sc_conv_var[strtolower($nmgp_var)];
                   }
               }
               $nmgp_val = NM_decode_input($nmgp_val);
               $this->$nmgp_var = $nmgp_val;
          }
      }
      if (isset($SC_lig_apl_orig) && !$Sc_lig_md5 && (!isset($nmgp_parms) || ($nmgp_parms != "SC_null" && substr($nmgp_parms, 0, 8) != "OrScLink")))
      {
          $_SESSION['sc_session']['SC_parm_violation'] = true;
      }
      if (isset($nmgp_parms) && $nmgp_parms == "SC_null")
      {
          $nmgp_parms = "";
      }
      if (isset($this->nmgp_opcao) && $this->nmgp_opcao == "reload_novo") {
          $_POST['nmgp_opcao'] = "novo";
          $this->nmgp_opcao    = "novo";
          $_SESSION['sc_session'][$script_case_init]['form_devices_leds_effects']['opcao']   = "novo";
          $_SESSION['sc_session'][$script_case_init]['form_devices_leds_effects']['opc_ant'] = "inicio";
      }
      if (isset($_SESSION['sc_session'][$script_case_init]['form_devices_leds_effects']['embutida_parms']))
      { 
          $this->nmgp_parms = $_SESSION['sc_session'][$script_case_init]['form_devices_leds_effects']['embutida_parms'];
          unset($_SESSION['sc_session'][$script_case_init]['form_devices_leds_effects']['embutida_parms']);
      } 
      if (isset($this->nmgp_parms) && !empty($this->nmgp_parms)) 
      { 
          if (isset($_SESSION['nm_aba_bg_color'])) 
          { 
              unset($_SESSION['nm_aba_bg_color']);
          }   
          $this->NM_where_filter = "";
          $tem_where_parms       = false;
          $nmgp_parms = NM_decode_input($nmgp_parms);
          $nmgp_parms = str_replace("@aspass@", "'", $this->nmgp_parms);
          $nmgp_parms = str_replace("*scout", "?@?", $nmgp_parms);
          $nmgp_parms = str_replace("*scin", "?#?", $nmgp_parms);
          $todox = str_replace("?#?@?@?", "?#?@ ?@?", $nmgp_parms);
          $todo  = explode("?@?", $todox);
          $ix = 0;
          while (!empty($todo[$ix]))
          {
             $cadapar = explode("?#?", $todo[$ix]);
             if (1 < sizeof($cadapar))
             {
                if (substr($cadapar[0], 0, 11) == "SC_glo_par_")
                {
                    $cadapar[0] = substr($cadapar[0], 11);
                    $cadapar[1] = $_SESSION[$cadapar[1]];
                }
                 if (isset($this->sc_conv_var[$cadapar[0]]))
                 {
                     $cadapar[0] = $this->sc_conv_var[$cadapar[0]];
                 }
                 elseif (isset($this->sc_conv_var[strtolower($cadapar[0])]))
                 {
                     $cadapar[0] = $this->sc_conv_var[strtolower($cadapar[0])];
                 }
                 nm_limpa_str_form_devices_leds_effects($cadapar[1]);
                 if ($cadapar[1] == "@ ") {$cadapar[1] = trim($cadapar[1]); }
                 $Tmp_par = $cadapar[0];
                 $this->$Tmp_par = $cadapar[1];
                 if ($cadapar[0] == "cod_device_")
                 {
                     $this->NM_where_filter .= (empty($this->NM_where_filter)) ? "(" : " and ";
                     $this->NM_where_filter .= "cod_device = " . $this->cod_device_;
                     $this->has_where_params = true;
                     $tem_where_parms        = true;
                 }
                 elseif ($cadapar[0] == "NM_where_filter")
                 {
                     $this->has_where_params = false;
                     $tem_where_parms        = false;
                 }
             }
             $ix++;
          }
          if ($tem_where_parms)
          {
              $this->NM_where_filter .= ")";
          }
          elseif (empty($this->NM_where_filter))
          {
              unset($this->NM_where_filter);
          }
          if (isset($this->NM_where_filter_form))
          {
              $_SESSION['sc_session'][$script_case_init]['form_devices_leds_effects']['where_filter_form'] = $this->NM_where_filter_form;
              unset($_SESSION['sc_session'][$script_case_init]['form_devices_leds_effects']['total']);
          }
          if (isset($this->sc_redir_atualiz))
          {
              $_SESSION['sc_session'][$script_case_init]['form_devices_leds_effects']['sc_redir_atualiz'] = $this->sc_redir_atualiz;
          }
          if (isset($this->sc_redir_insert))
          {
              $_SESSION['sc_session'][$script_case_init]['form_devices_leds_effects']['sc_redir_insert'] = $this->sc_redir_insert;
          }
      } 
      elseif (isset($script_case_init) && !empty($script_case_init) && isset($_SESSION['sc_session'][$script_case_init]['form_devices_leds_effects']['parms']))
      {
          if ((!isset($this->nmgp_opcao) || ($this->nmgp_opcao != "incluir" && $this->nmgp_opcao != "alterar" && $this->nmgp_opcao != "excluir" && $this->nmgp_opcao != "novo" && $this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form")) && (!isset($this->NM_ajax_opcao) || $this->NM_ajax_opcao == ""))
          {
              $todox = str_replace("?#?@?@?", "?#?@ ?@?", $_SESSION['sc_session'][$script_case_init]['form_devices_leds_effects']['parms']);
              $todo  = explode("?@?", $todox);
              $ix = 0;
              while (!empty($todo[$ix]))
              {
                 $cadapar = explode("?#?", $todo[$ix]);
                 if (substr($cadapar[0], 0, 11) == "SC_glo_par_")
                 {
                     $cadapar[0] = substr($cadapar[0], 11);
                     $cadapar[1] = $_SESSION[$cadapar[1]];
                 }
                 if ($cadapar[1] == "@ ") {$cadapar[1] = trim($cadapar[1]); }
                 $Tmp_par = $cadapar[0];
                 $this->$Tmp_par = $cadapar[1];
                 $ix++;
              }
          }
      } 

      if (isset($this->nm_run_menu) && $this->nm_run_menu == 1)
      { 
          $_SESSION['sc_session'][$script_case_init]['form_devices_leds_effects']['nm_run_menu'] = 1;
      } 
      if (!$this->NM_ajax_flag && 'autocomp_' == substr($this->NM_ajax_opcao, 0, 9))
      {
          $this->NM_ajax_flag = true;
      }

      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      if (isset($this->nm_evt_ret_edit) && '' != $this->nm_evt_ret_edit)
      {
          $_SESSION['sc_session'][$script_case_init]['form_devices_leds_effects']['lig_edit_lookup']     = true;
          $_SESSION['sc_session'][$script_case_init]['form_devices_leds_effects']['lig_edit_lookup_cb']  = $this->nm_evt_ret_edit;
          $_SESSION['sc_session'][$script_case_init]['form_devices_leds_effects']['lig_edit_lookup_row'] = isset($this->nm_evt_ret_row) ? $this->nm_evt_ret_row : '';
      }
      if (isset($_SESSION['sc_session'][$script_case_init]['form_devices_leds_effects']['lig_edit_lookup']) && $_SESSION['sc_session'][$script_case_init]['form_devices_leds_effects']['lig_edit_lookup'])
      {
          $this->lig_edit_lookup     = true;
          $this->lig_edit_lookup_cb  = $_SESSION['sc_session'][$script_case_init]['form_devices_leds_effects']['lig_edit_lookup_cb'];
          $this->lig_edit_lookup_row = $_SESSION['sc_session'][$script_case_init]['form_devices_leds_effects']['lig_edit_lookup_row'];
      }
      if (!$this->Ini)
      { 
          $this->Ini = new form_devices_leds_effects_ini(); 
          $this->Ini->init();
          $this->nm_data = new nm_data("es");
          $this->app_is_initializing = $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['initialize'];
      } 
      else 
      { 
         $this->nm_data = new nm_data("es");
      } 
      $_SESSION['sc_session'][$script_case_init]['form_devices_leds_effects']['upload_field_info'] = array();

      $_SESSION['sc_session'][$script_case_init]['form_devices_leds_effects']['upload_field_info']['foto1_'] = array(
          'app_dir'            => $this->Ini->path_aplicacao,
          'app_name'           => 'form_devices_leds_effects',
          'upload_dir'         => $this->Ini->root . $this->Ini->path_imag_temp . '/',
          'upload_url'         => $this->Ini->path_imag_temp . '/',
          'upload_type'        => 'single',
          'upload_allowed_type'  => '/.+$/i',
          'upload_max_size'  => null,
          'upload_file_height' => '0',
          'upload_file_width'  => '0',
          'upload_file_aspect' => 'S',
          'upload_file_type'   => 'I',
      );

      $_SESSION['sc_session'][$script_case_init]['form_devices_leds_effects']['upload_field_info']['foto2_'] = array(
          'app_dir'            => $this->Ini->path_aplicacao,
          'app_name'           => 'form_devices_leds_effects',
          'upload_dir'         => $this->Ini->root . $this->Ini->path_imag_temp . '/',
          'upload_url'         => $this->Ini->path_imag_temp . '/',
          'upload_type'        => 'single',
          'upload_allowed_type'  => '/.+$/i',
          'upload_max_size'  => null,
          'upload_file_height' => '0',
          'upload_file_width'  => '0',
          'upload_file_aspect' => 'S',
          'upload_file_type'   => 'I',
      );

      $_SESSION['sc_session'][$script_case_init]['form_devices_leds_effects']['upload_field_info']['foto3_'] = array(
          'app_dir'            => $this->Ini->path_aplicacao,
          'app_name'           => 'form_devices_leds_effects',
          'upload_dir'         => $this->Ini->root . $this->Ini->path_imag_temp . '/',
          'upload_url'         => $this->Ini->path_imag_temp . '/',
          'upload_type'        => 'single',
          'upload_allowed_type'  => '/.+$/i',
          'upload_max_size'  => null,
          'upload_file_height' => '0',
          'upload_file_width'  => '0',
          'upload_file_aspect' => 'S',
          'upload_file_type'   => 'I',
      );

      unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['masterValue']);
      $this->Change_Menu = false;
      $run_iframe = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['run_iframe']) && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['run_iframe'] == "R")) ? true : false;
      if (!$run_iframe && isset($_SESSION['scriptcase']['menu_atual']) && !$_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['embutida_call'] && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['sc_outra_jan']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['sc_outra_jan']))
      {
          $this->sc_init_menu = "x";
          if (isset($_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init']['form_devices_leds_effects']))
          {
              $this->sc_init_menu = $_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init']['form_devices_leds_effects'];
          }
          elseif (isset($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']]))
          {
              foreach ($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']] as $init => $resto)
              {
                  if ($this->Ini->sc_page == $init)
                  {
                      $this->sc_init_menu = $init;
                      break;
                  }
              }
          }
          if ($this->Ini->sc_page == $this->sc_init_menu && !isset($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['form_devices_leds_effects']))
          {
               $_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['form_devices_leds_effects']['link'] = $this->Ini->sc_protocolo . $this->Ini->server . $this->Ini->path_link . "" . SC_dir_app_name('form_devices_leds_effects') . "/";
               $_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['form_devices_leds_effects']['label'] = "" . $this->Ini->Nm_lang['lang_othr_frmu_title'] . " devices";
               $this->Change_Menu = true;
          }
          elseif ($this->Ini->sc_page == $this->sc_init_menu)
          {
              $achou = false;
              foreach ($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu] as $apl => $parms)
              {
                  if ($apl == "form_devices_leds_effects")
                  {
                      $achou = true;
                  }
                  elseif ($achou)
                  {
                      unset($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu][$apl]);
                      $this->Change_Menu = true;
                  }
              }
          }
      }
      if (!function_exists("nmButtonOutput"))
      {
          include_once($this->Ini->path_lib_php . "nm_gp_config_btn.php");
      }
      include("../_lib/css/" . $this->Ini->str_schema_all . "_form.php");
      $this->Ini->Str_btn_form    = trim($str_button);
      include($this->Ini->path_btn . $this->Ini->Str_btn_form . '/' . $this->Ini->Str_btn_form . $_SESSION['scriptcase']['reg_conf']['css_dir'] . '.php');
      $_SESSION['scriptcase']['css_form_help'] = '../_lib/css/' . $this->Ini->str_schema_all . "_form.css";
      $_SESSION['scriptcase']['css_form_help_dir'] = '../_lib/css/' . $this->Ini->str_schema_all . "_form" . $_SESSION['scriptcase']['reg_conf']['css_dir'] . ".css";
      $this->Db = $this->Ini->Db; 
      $this->Ini->str_google_fonts = isset($str_google_fonts)?$str_google_fonts:'';
      $this->Ini->Img_sep_form    = "/" . trim($str_toolbar_separator);
      $this->Ini->Color_bg_ajax   = "" == trim($str_ajax_bg)         ? "#000" : $str_ajax_bg;
      $this->Ini->Border_c_ajax   = "" == trim($str_ajax_border_c)   ? ""     : $str_ajax_border_c;
      $this->Ini->Border_s_ajax   = "" == trim($str_ajax_border_s)   ? ""     : $str_ajax_border_s;
      $this->Ini->Border_w_ajax   = "" == trim($str_ajax_border_w)   ? ""     : $str_ajax_border_w;
      $this->Ini->Block_img_exp   = "" == trim($str_block_exp)       ? ""     : $str_block_exp;
      $this->Ini->Block_img_col   = "" == trim($str_block_col)       ? ""     : $str_block_col;
      $this->Ini->Msg_ico_title   = "" == trim($str_msg_ico_title)   ? ""     : $str_msg_ico_title;
      $this->Ini->Msg_ico_body    = "" == trim($str_msg_ico_body)    ? ""     : $str_msg_ico_body;
      $this->Ini->Err_ico_title   = "" == trim($str_err_ico_title)   ? ""     : $str_err_ico_title;
      $this->Ini->Err_ico_body    = "" == trim($str_err_ico_body)    ? ""     : $str_err_ico_body;
      $this->Ini->Cal_ico_back    = "" == trim($str_cal_ico_back)    ? ""     : $str_cal_ico_back;
      $this->Ini->Cal_ico_for     = "" == trim($str_cal_ico_for)     ? ""     : $str_cal_ico_for;
      $this->Ini->Cal_ico_close   = "" == trim($str_cal_ico_close)   ? ""     : $str_cal_ico_close;
      $this->Ini->Tab_space       = "" == trim($str_tab_space)       ? ""     : $str_tab_space;
      $this->Ini->Bubble_tail     = "" == trim($str_bubble_tail)     ? ""     : $str_bubble_tail;
      $this->Ini->Label_sort_pos  = "" == trim($str_label_sort_pos)  ? ""     : $str_label_sort_pos;
      $this->Ini->Label_sort      = "" == trim($str_label_sort)      ? ""     : $str_label_sort;
      $this->Ini->Label_sort_asc  = "" == trim($str_label_sort_asc)  ? ""     : $str_label_sort_asc;
      $this->Ini->Label_sort_desc = "" == trim($str_label_sort_desc) ? ""     : $str_label_sort_desc;
      $this->Ini->Img_status_ok       = "" == trim($str_img_status_ok_mult)   ? ""     : $str_img_status_ok_mult;
      $this->Ini->Img_status_err      = "" == trim($str_img_status_err_mult)  ? ""     : $str_img_status_err_mult;
      $this->Ini->Css_status          = "scFormInputErrorMult";
      $this->Ini->Css_status_pwd_box  = "scFormInputErrorMultPwdBox";
      $this->Ini->Css_status_pwd_text = "scFormInputErrorMultPwdText";
      $this->Ini->Error_icon_span = "" == trim($str_error_icon_span) ? false  : "message" == $str_error_icon_span;
      $this->Ini->Img_qs_search        = "" == trim($img_qs_search)        ? "scriptcase__NM__qs_lupa.png"  : $img_qs_search;
      $this->Ini->Img_qs_clean         = "" == trim($img_qs_clean)         ? "scriptcase__NM__qs_close.png" : $img_qs_clean;
      $this->Ini->Str_qs_image_padding = "" == trim($str_qs_image_padding) ? "0"                            : $str_qs_image_padding;
      $this->Ini->App_div_tree_img_col = trim($app_div_str_tree_col);
      $this->Ini->App_div_tree_img_exp = trim($app_div_str_tree_exp);
      $this->Ini->form_table_width     = isset($str_form_table_width) && '' != trim($str_form_table_width) ? $str_form_table_width : '';

        $this->classes_100perc_fields['table'] = '';
        $this->classes_100perc_fields['input'] = '';
        $this->classes_100perc_fields['span_input'] = '';
        $this->classes_100perc_fields['span_select'] = '';
        $this->classes_100perc_fields['style_category'] = '';
        $this->classes_100perc_fields['keep_field_size'] = true;



      $_SESSION['scriptcase']['error_icon']['form_devices_leds_effects']  = "<img src=\"" . $this->Ini->path_icones . "/scriptcase__NM__btn__NM__scriptcase9_Lemon__NM__nm_scriptcase9_Lemon_error.png\" style=\"border-width: 0px\" align=\"top\">&nbsp;";
      $_SESSION['scriptcase']['error_close']['form_devices_leds_effects'] = "<td>" . nmButtonOutput($this->arr_buttons, "berrm_clse", "document.getElementById('id_error_display_fixed').style.display = 'none'; document.getElementById('id_error_message_fixed').innerHTML = ''; return false", "document.getElementById('id_error_display_fixed').style.display = 'none'; document.getElementById('id_error_message_fixed').innerHTML = ''; return false", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "") . "</td>";

      $this->Embutida_proc = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['embutida_proc']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['embutida_proc'] : $this->Embutida_proc;
      $this->Embutida_form = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['embutida_form']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['embutida_form'] : $this->Embutida_form;
      $this->Embutida_call = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['embutida_call']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['embutida_call'] : $this->Embutida_call;

       $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['table_refresh'] = false;

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['embutida_liga_grid_edit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['embutida_liga_grid_edit'])
      {
          $this->Grid_editavel = ('on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['embutida_liga_grid_edit']) ? true : false;
      }
      if (isset($this->Grid_editavel) && $this->Grid_editavel)
      {
          $this->Embutida_form  = true;
          $this->Embutida_ronly = true;
      }
      $this->Embutida_multi = false;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['embutida_multi']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['embutida_multi'])
      {
          $this->Grid_editavel  = false;
          $this->Embutida_form  = false;
          $this->Embutida_ronly = false;
          $this->Embutida_multi = true;
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['embutida_liga_tp_pag']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['embutida_liga_tp_pag'])
      {
          $this->form_paginacao = $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['embutida_liga_tp_pag'];
      }

      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['embutida_form']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['embutida_form'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['embutida_form'] = $this->Embutida_form;
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['embutida_liga_grid_edit']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['embutida_liga_grid_edit'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['embutida_liga_grid_edit'] = $this->Grid_editavel ? 'on' : 'off';
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['embutida_liga_grid_edit']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['embutida_liga_grid_edit'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['embutida_liga_grid_edit'] = $this->Embutida_call;
      }

      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      $this->nmgp_url_saida  = $nm_url_saida;
      $this->nmgp_form_show  = "on";
      $this->nmgp_form_empty = false;
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_valida.php", "C", "NM_Valida") ; 
      $teste_validade = new NM_Valida ;

      $this->loadFieldConfig();

      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['first_time'])
      {
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_devices_leds_effects']['insert']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_devices_leds_effects']['new']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_devices_leds_effects']['update']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_devices_leds_effects']['delete']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_devices_leds_effects']['first']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_devices_leds_effects']['back']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_devices_leds_effects']['forward']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_devices_leds_effects']['last']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_devices_leds_effects']['qsearch']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_devices_leds_effects']['dynsearch']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_devices_leds_effects']['summary']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_devices_leds_effects']['navpage']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_devices_leds_effects']['goto']);
      }
      $this->NM_cancel_return_new = (isset($this->NM_cancel_return_new) && $this->NM_cancel_return_new == 1) ? "1" : "";
      $this->NM_cancel_insert_new = ((isset($this->NM_cancel_insert_new) && $this->NM_cancel_insert_new == 1) || $this->NM_cancel_return_new == 1) ? "document.F5.action='" . $nm_url_saida . "';" : "";
      if (isset($this->NM_btn_insert) && '' != $this->NM_btn_insert && (!isset($_SESSION['scriptcase']['sc_apl_conf']['form_devices_leds_effects']['insert']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['form_devices_leds_effects']['insert']))
      {
          if ('N' == $this->NM_btn_insert)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_devices_leds_effects']['insert'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_devices_leds_effects']['insert'] = 'on';
          }
      }
      if (isset($this->NM_btn_new) && 'N' == $this->NM_btn_new)
      {
          $_SESSION['scriptcase']['sc_apl_conf_lig']['form_devices_leds_effects']['new'] = 'off';
      }
      if (isset($this->NM_btn_update) && '' != $this->NM_btn_update && (!isset($_SESSION['scriptcase']['sc_apl_conf']['form_devices_leds_effects']['update']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['form_devices_leds_effects']['update']))
      {
          if ('N' == $this->NM_btn_update)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_devices_leds_effects']['update'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_devices_leds_effects']['update'] = 'on';
          }
      }
      if (isset($this->NM_btn_delete) && '' != $this->NM_btn_delete && (!isset($_SESSION['scriptcase']['sc_apl_conf']['form_devices_leds_effects']['delete']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['form_devices_leds_effects']['delete']))
      {
          if ('N' == $this->NM_btn_delete)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_devices_leds_effects']['delete'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_devices_leds_effects']['delete'] = 'on';
          }
      }
      if (isset($this->NM_btn_navega) && '' != $this->NM_btn_navega)
      {
          if ('N' == $this->NM_btn_navega)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_devices_leds_effects']['first']     = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_devices_leds_effects']['back']      = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_devices_leds_effects']['forward']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_devices_leds_effects']['last']      = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_devices_leds_effects']['qsearch']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_devices_leds_effects']['dynsearch'] = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_devices_leds_effects']['summary']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_devices_leds_effects']['navpage']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_devices_leds_effects']['goto']      = 'off';
              $this->Nav_permite_ava = false;
              $this->Nav_permite_ret = false;
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_devices_leds_effects']['first']     = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_devices_leds_effects']['back']      = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_devices_leds_effects']['forward']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_devices_leds_effects']['last']      = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_devices_leds_effects']['qsearch']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_devices_leds_effects']['dynsearch'] = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_devices_leds_effects']['summary']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_devices_leds_effects']['navpage']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_devices_leds_effects']['goto']      = 'on';
          }
      }

      $this->nmgp_botoes['cancel'] = "on";
      $this->nmgp_botoes['exit'] = "on";
      $this->nmgp_botoes['qsearch'] = "on";
      $this->nmgp_botoes['new']  = "off";
      $this->nmgp_botoes['copy'] = "off";
      $this->nmgp_botoes['insert'] = "off";
      $this->nmgp_botoes['update'] = "on";
      $this->nmgp_botoes['delete'] = "off";
      if ('total' == $this->form_paginacao)
      {
          $this->nmgp_botoes['first']   = "off";
          $this->nmgp_botoes['back']    = "off";
          $this->nmgp_botoes['forward'] = "off";
          $this->nmgp_botoes['last']    = "off";
          $this->nmgp_botoes['navpage'] = "off";
          $this->nmgp_botoes['goto']    = "off";
          $this->nmgp_botoes['qtline']  = "off";
          $this->nmgp_botoes['summary'] = "on";
      }
      else
      {
      $this->nmgp_botoes['first'] = "on";
      $this->nmgp_botoes['back'] = "on";
      $this->nmgp_botoes['forward'] = "on";
      $this->nmgp_botoes['last'] = "on";
      $this->nmgp_botoes['summary'] = "on";
      $this->nmgp_botoes['navpage'] = "on";
      $this->nmgp_botoes['goto'] = "on";
      $this->nmgp_botoes['qtline'] = "on";
      $this->nmgp_botoes['reload'] = "off";
      }
      if (isset($this->NM_btn_cancel) && 'N' == $this->NM_btn_cancel)
      {
          $this->nmgp_botoes['cancel'] = "off";
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['where_orig'] = "";
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['where_pesq']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['where_pesq'] = "";
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['where_pesq_filtro'] = "";
      }
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['where_pesq_filtro'];
      if ($this->NM_ajax_flag && 'event_' == substr($this->NM_ajax_opcao, 0, 6)) {
          $this->nmgp_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['buttonStatus'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['iframe_filtro']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['iframe_filtro'] == "S")
      {
          $this->nmgp_botoes['exit'] = "off";
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_devices_leds_effects']['btn_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['form_devices_leds_effects']['btn_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['form_devices_leds_effects']['btn_display'] as $NM_cada_btn => $NM_cada_opc)
          {
              $this->nmgp_botoes[$NM_cada_btn] = $NM_cada_opc;
          }
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_devices_leds_effects']['insert']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_devices_leds_effects']['insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_devices_leds_effects']['insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_devices_leds_effects']['insert'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_devices_leds_effects']['new']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_devices_leds_effects']['new'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_devices_leds_effects']['new'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_devices_leds_effects']['update']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_devices_leds_effects']['update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_devices_leds_effects']['update'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_devices_leds_effects']['delete']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_devices_leds_effects']['delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_devices_leds_effects']['delete'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_devices_leds_effects']['first']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_devices_leds_effects']['first'] != '')
      {
          $this->nmgp_botoes['first'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_devices_leds_effects']['first'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_devices_leds_effects']['back']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_devices_leds_effects']['back'] != '')
      {
          $this->nmgp_botoes['back'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_devices_leds_effects']['back'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_devices_leds_effects']['forward']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_devices_leds_effects']['forward'] != '')
      {
          $this->nmgp_botoes['forward'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_devices_leds_effects']['forward'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_devices_leds_effects']['last']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_devices_leds_effects']['last'] != '')
      {
          $this->nmgp_botoes['last'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_devices_leds_effects']['last'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_devices_leds_effects']['qsearch']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_devices_leds_effects']['qsearch'] != '')
      {
          $this->nmgp_botoes['qsearch'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_devices_leds_effects']['qsearch'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_devices_leds_effects']['dynsearch']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_devices_leds_effects']['dynsearch'] != '')
      {
          $this->nmgp_botoes['dynsearch'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_devices_leds_effects']['dynsearch'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_devices_leds_effects']['summary']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_devices_leds_effects']['summary'] != '')
      {
          $this->nmgp_botoes['summary'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_devices_leds_effects']['summary'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_devices_leds_effects']['navpage']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_devices_leds_effects']['navpage'] != '')
      {
          $this->nmgp_botoes['navpage'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_devices_leds_effects']['navpage'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_devices_leds_effects']['goto']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_devices_leds_effects']['goto'] != '')
      {
          $this->nmgp_botoes['goto'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_devices_leds_effects']['goto'];
      }

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['embutida_liga_form_insert']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['embutida_liga_form_insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['embutida_liga_form_insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['embutida_liga_form_insert'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['embutida_liga_form_update']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['embutida_liga_form_update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['embutida_liga_form_update'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['embutida_liga_form_delete']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['embutida_liga_form_delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['embutida_liga_form_delete'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['embutida_liga_form_btn_nav']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['embutida_liga_form_btn_nav'] != '')
      {
          $this->nmgp_botoes['first']   = $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['back']    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['forward'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['last']    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['embutida_liga_form_btn_nav'];
      }

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['dashboard_info']['under_dashboard'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['dashboard_info']['maximized']) {
          $tmpDashboardApp = $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['dashboard_info']['dashboard_app'];
          if (isset($_SESSION['scriptcase']['dashboard_toolbar'][$tmpDashboardApp]['form_devices_leds_effects'])) {
              $tmpDashboardButtons = $_SESSION['scriptcase']['dashboard_toolbar'][$tmpDashboardApp]['form_devices_leds_effects'];

              $this->nmgp_botoes['update']     = $tmpDashboardButtons['form_update']    ? 'on' : 'off';
              $this->nmgp_botoes['new']        = $tmpDashboardButtons['form_insert']    ? 'on' : 'off';
              $this->nmgp_botoes['insert']     = $tmpDashboardButtons['form_insert']    ? 'on' : 'off';
              $this->nmgp_botoes['delete']     = $tmpDashboardButtons['form_delete']    ? 'on' : 'off';
              $this->nmgp_botoes['copy']       = $tmpDashboardButtons['form_copy']      ? 'on' : 'off';
              $this->nmgp_botoes['first']      = $tmpDashboardButtons['form_navigate']  ? 'on' : 'off';
              $this->nmgp_botoes['back']       = $tmpDashboardButtons['form_navigate']  ? 'on' : 'off';
              $this->nmgp_botoes['last']       = $tmpDashboardButtons['form_navigate']  ? 'on' : 'off';
              $this->nmgp_botoes['forward']    = $tmpDashboardButtons['form_navigate']  ? 'on' : 'off';
              $this->nmgp_botoes['navpage']    = $tmpDashboardButtons['form_navpage']   ? 'on' : 'off';
              $this->nmgp_botoes['goto']       = $tmpDashboardButtons['form_goto']      ? 'on' : 'off';
              $this->nmgp_botoes['qtline']     = $tmpDashboardButtons['form_lineqty']   ? 'on' : 'off';
              $this->nmgp_botoes['summary']    = $tmpDashboardButtons['form_summary']   ? 'on' : 'off';
              $this->nmgp_botoes['qsearch']    = $tmpDashboardButtons['form_qsearch']   ? 'on' : 'off';
              $this->nmgp_botoes['dynsearch']  = $tmpDashboardButtons['form_dynsearch'] ? 'on' : 'off';
              $this->nmgp_botoes['reload']     = $tmpDashboardButtons['form_reload']    ? 'on' : 'off';
          }
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_devices_leds_effects']['insert']) && $_SESSION['scriptcase']['sc_apl_conf']['form_devices_leds_effects']['insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf']['form_devices_leds_effects']['insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['scriptcase']['sc_apl_conf']['form_devices_leds_effects']['insert'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_devices_leds_effects']['update']) && $_SESSION['scriptcase']['sc_apl_conf']['form_devices_leds_effects']['update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['scriptcase']['sc_apl_conf']['form_devices_leds_effects']['update'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_devices_leds_effects']['delete']) && $_SESSION['scriptcase']['sc_apl_conf']['form_devices_leds_effects']['delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['scriptcase']['sc_apl_conf']['form_devices_leds_effects']['delete'];
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_devices_leds_effects']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['form_devices_leds_effects']['field_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['form_devices_leds_effects']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->nmgp_cmp_hidden[$NM_cada_field . "_"] = $NM_cada_opc;
              $this->NM_ajax_info['fieldDisplay'][$NM_cada_field . "_"] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_devices_leds_effects']['field_readonly']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['form_devices_leds_effects']['field_readonly']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['form_devices_leds_effects']['field_readonly'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->nmgp_cmp_readonly[$NM_cada_field . "_"] = "on";
              $this->NM_ajax_info['readOnly'][$NM_cada_field . "_"] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_devices_leds_effects']['exit']) && $_SESSION['scriptcase']['sc_apl_conf']['form_devices_leds_effects']['exit'] != '')
      {
          $_SESSION['scriptcase']['sc_url_saida'][$this->Ini->sc_page]       = $_SESSION['scriptcase']['sc_apl_conf']['form_devices_leds_effects']['exit'];
          $_SESSION['scriptcase']['sc_force_url_saida'][$this->Ini->sc_page] = true;
      }
      $glo_senha_protect = (isset($_SESSION['scriptcase']['glo_senha_protect'])) ? $_SESSION['scriptcase']['glo_senha_protect'] : "S";
      $this->aba_iframe = false;
      if (isset($_SESSION['scriptcase']['sc_aba_iframe']))
      {
          foreach ($_SESSION['scriptcase']['sc_aba_iframe'] as $aba => $apls_aba)
          {
              if (in_array("form_devices_leds_effects", $apls_aba))
              {
                  $this->aba_iframe = true;
                  break;
              }
          }
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['iframe_menu'] && (!isset($_SESSION['scriptcase']['menu_mobile']) || empty($_SESSION['scriptcase']['menu_mobile'])))
      {
          $this->aba_iframe = true;
      }
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_gp_limpa.php", "F", "nm_limpa_valor") ; 
      $this->Ini->sc_Include($this->Ini->path_libs . "/nm_gc.php", "F", "nm_gc") ; 
      $_SESSION['scriptcase']['sc_tab_meses']['int'] = array(
                                      $this->Ini->Nm_lang['lang_mnth_janu'],
                                      $this->Ini->Nm_lang['lang_mnth_febr'],
                                      $this->Ini->Nm_lang['lang_mnth_marc'],
                                      $this->Ini->Nm_lang['lang_mnth_apri'],
                                      $this->Ini->Nm_lang['lang_mnth_mayy'],
                                      $this->Ini->Nm_lang['lang_mnth_june'],
                                      $this->Ini->Nm_lang['lang_mnth_july'],
                                      $this->Ini->Nm_lang['lang_mnth_augu'],
                                      $this->Ini->Nm_lang['lang_mnth_sept'],
                                      $this->Ini->Nm_lang['lang_mnth_octo'],
                                      $this->Ini->Nm_lang['lang_mnth_nove'],
                                      $this->Ini->Nm_lang['lang_mnth_dece']);
      $_SESSION['scriptcase']['sc_tab_meses']['abr'] = array(
                                      $this->Ini->Nm_lang['lang_shrt_mnth_janu'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_febr'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_marc'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_apri'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_mayy'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_june'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_july'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_augu'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_sept'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_octo'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_nove'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_dece']);
      $_SESSION['scriptcase']['sc_tab_dias']['int'] = array(
                                      $this->Ini->Nm_lang['lang_days_sund'],
                                      $this->Ini->Nm_lang['lang_days_mond'],
                                      $this->Ini->Nm_lang['lang_days_tued'],
                                      $this->Ini->Nm_lang['lang_days_wend'],
                                      $this->Ini->Nm_lang['lang_days_thud'],
                                      $this->Ini->Nm_lang['lang_days_frid'],
                                      $this->Ini->Nm_lang['lang_days_satd']);
      $_SESSION['scriptcase']['sc_tab_dias']['abr'] = array(
                                      $this->Ini->Nm_lang['lang_shrt_days_sund'],
                                      $this->Ini->Nm_lang['lang_shrt_days_mond'],
                                      $this->Ini->Nm_lang['lang_shrt_days_tued'],
                                      $this->Ini->Nm_lang['lang_shrt_days_wend'],
                                      $this->Ini->Nm_lang['lang_shrt_days_thud'],
                                      $this->Ini->Nm_lang['lang_shrt_days_frid'],
                                      $this->Ini->Nm_lang['lang_shrt_days_satd']);
      nm_gc($this->Ini->path_libs);
      $this->Ini->Gd_missing  = true;
      if(function_exists("getProdVersion"))
      {
         $_SESSION['scriptcase']['sc_prod_Version'] = str_replace(".", "", getProdVersion($this->Ini->path_libs));
         if(function_exists("gd_info"))
         {
            $this->Ini->Gd_missing = false;
         }
      }
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_trata_img.php", "C", "nm_trata_img") ; 

      if (is_file($this->Ini->path_aplicacao . 'form_devices_leds_effects_help.txt'))
      {
          $arr_link_webhelp = file($this->Ini->path_aplicacao . 'form_devices_leds_effects_help.txt');
          if ($arr_link_webhelp)
          {
              foreach ($arr_link_webhelp as $str_link_webhelp)
              {
                  $str_link_webhelp = trim($str_link_webhelp);
                  if ('form:' == substr($str_link_webhelp, 0, 5))
                  {
                      $arr_link_parts = explode(':', $str_link_webhelp);
                      if ('' != $arr_link_parts[1] && is_file($this->Ini->root . $this->Ini->path_help . $arr_link_parts[1]))
                      {
                          $this->url_webhelp = $this->Ini->path_help . $arr_link_parts[1];
                      }
                  }
              }
          }
      }

      if (is_dir($this->Ini->path_aplicacao . 'img'))
      {
          $Res_dir_img = @opendir($this->Ini->path_aplicacao . 'img');
          if ($Res_dir_img)
          {
              while (FALSE !== ($Str_arquivo = @readdir($Res_dir_img))) 
              {
                 if (@is_file($this->Ini->path_aplicacao . 'img/' . $Str_arquivo) && '.' != $Str_arquivo && '..' != $this->Ini->path_aplicacao . 'img/' . $Str_arquivo)
                 {
                     @unlink($this->Ini->path_aplicacao . 'img/' . $Str_arquivo);
                 }
              }
          }
          @closedir($Res_dir_img);
          rmdir($this->Ini->path_aplicacao . 'img');
      }

      if ($this->Embutida_proc)
      { 
          require_once($this->Ini->path_embutida . 'form_devices_leds_effects/form_devices_leds_effects_erro.class.php');
      }
      else
      { 
          require_once($this->Ini->path_aplicacao . "form_devices_leds_effects_erro.class.php"); 
      }
      $this->Erro      = new form_devices_leds_effects_erro();
      $this->Erro->Ini = $this->Ini;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['sc_max_reg']) && strtolower($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['sc_max_reg']) == "all")
      {
          $this->form_paginacao = "total";
      }
      $this->proc_fast_search = false;
      if ($this->nmgp_opcao == "fast_search")  
      {
          $this->SC_fast_search($this->nmgp_fast_search, $this->nmgp_cond_fast_search, $this->nmgp_arg_fast_search);
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['opcao'] = "inicio";
          $this->nmgp_opcao = "inicio";
          $this->proc_fast_search = true;
      } 
      if ($nm_opc_lookup != "lookup" && $nm_opc_php != "formphp")
      { 
         if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['opcao']))
         { 
             if ($this->cod_device_ != "")   
             { 
                 $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['opcao'] = "igual" ;  
             }   
         }   
      } 
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['opcao']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['opcao']) && empty($this->nmgp_refresh_fields))
      {
          $this->nmgp_opcao = $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['opcao'];  
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['opcao'] = "" ;  
          if ($this->nmgp_opcao == "edit_novo")  
          {
             $this->nmgp_opcao = "novo";
             $this->nm_flag_saida_novo = "S";
          }
      } 
      $this->nm_Start_new = false;
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_devices_leds_effects']['start']) && $_SESSION['scriptcase']['sc_apl_conf']['form_devices_leds_effects']['start'] == 'new')
      {
          $this->nmgp_opcao = "novo";
          $this->nm_Start_new = true;
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['opcao'] = "novo";
          unset($_SESSION['scriptcase']['sc_apl_conf']['form_devices_leds_effects']['start']);
      }
      if ($this->nmgp_opcao == "igual")  
      {
          $this->nmgp_opc_ant = $this->nmgp_opcao;
      } 
      else
      {
          $this->nmgp_opc_ant = $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['opc_ant'];
      } 
      if ($this->nmgp_opcao == "recarga" || $this->nmgp_opcao == "muda_form")  
      {
          $this->nmgp_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['botoes'];
          $this->Nav_permite_ret = 0 != $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['inicio'];
          $this->Nav_permite_ava = $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['total'] != $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['final'];
      }
      else
      {
      }
      $this->nm_flag_iframe = false;
      if ($this->nmgp_opcao == "edit_novo")  
      {
          $this->nmgp_opcao = "novo";
          $this->nm_flag_saida_novo = "S";
      }
//
      $this->NM_case_insensitive = false;
      $this->sc_evento = $this->nmgp_opcao;
            if ('ajax_check_file' == $this->nmgp_opcao ){
                 ob_start(); 
                 include_once("../_lib/lib/php/nm_api.php"); 
            switch( $_POST['rsargs'] ){
               default:
                   echo 0;exit;
               break;
               }
            copy($__file_download, $_SERVER['DOCUMENT_ROOT'].$out1_img_cache);
            $sc_obj_img = new nm_trata_img($_SERVER['DOCUMENT_ROOT'].$out1_img_cache, true);

            if(!empty($img_width) && !empty($img_height)){
                $sc_obj_img->setWidth($img_width);
                $sc_obj_img->setHeight($img_height);
            }
                $sc_obj_img->setManterAspecto(true);
            $sc_obj_img->createImg($_SERVER['DOCUMENT_ROOT'].$out1_img_cache);
            echo $out1_img_cache;
               exit;
            }
   }

   function loadFieldConfig()
   {
      $this->field_config = array();
      //-- cod_device_
      $this->field_config['cod_device_']               = array();
      $this->field_config['cod_device_']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['cod_device_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['cod_device_']['symbol_dec'] = '';
      $this->field_config['cod_device_']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['cod_device_']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- activa_
      $this->field_config['activa_']               = array();
      $this->field_config['activa_']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['activa_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['activa_']['symbol_dec'] = '';
      $this->field_config['activa_']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['activa_']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- estado_
      $this->field_config['estado_']               = array();
      $this->field_config['estado_']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['estado_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['estado_']['symbol_dec'] = '';
      $this->field_config['estado_']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['estado_']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- ult_fecha_
      $this->field_config['ult_fecha_']                 = array();
      $this->field_config['ult_fecha_']['date_format']  = $_SESSION['scriptcase']['reg_conf']['date_format'] . ';' . $_SESSION['scriptcase']['reg_conf']['time_format'];
      $this->field_config['ult_fecha_']['date_sep']     = $_SESSION['scriptcase']['reg_conf']['date_sep'];
      $this->field_config['ult_fecha_']['time_sep']     = $_SESSION['scriptcase']['reg_conf']['time_sep'];
      $this->field_config['ult_fecha_']['date_display'] = "ddmmaaaa;hhiiss";
      $this->new_date_format('DH', 'ult_fecha_');
      //-- valor_default_
      $this->field_config['valor_default_']               = array();
      $this->field_config['valor_default_']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_val'];
      $this->field_config['valor_default_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['valor_default_']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_val'];
      $this->field_config['valor_default_']['symbol_mon'] = '';
      $this->field_config['valor_default_']['format_pos'] = $_SESSION['scriptcase']['reg_conf']['monet_f_pos'];
      $this->field_config['valor_default_']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['monet_f_neg'];
      //-- acepta_tiempo_
      $this->field_config['acepta_tiempo_']               = array();
      $this->field_config['acepta_tiempo_']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['acepta_tiempo_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['acepta_tiempo_']['symbol_dec'] = '';
      $this->field_config['acepta_tiempo_']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['acepta_tiempo_']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- acepta_tokens_
      $this->field_config['acepta_tokens_']               = array();
      $this->field_config['acepta_tokens_']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['acepta_tokens_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['acepta_tokens_']['symbol_dec'] = '';
      $this->field_config['acepta_tokens_']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['acepta_tokens_']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- tipo_dev_
      $this->field_config['tipo_dev_']               = array();
      $this->field_config['tipo_dev_']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['tipo_dev_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['tipo_dev_']['symbol_dec'] = '';
      $this->field_config['tipo_dev_']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['tipo_dev_']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- direccion_torno_
      $this->field_config['direccion_torno_']               = array();
      $this->field_config['direccion_torno_']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['direccion_torno_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['direccion_torno_']['symbol_dec'] = '';
      $this->field_config['direccion_torno_']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['direccion_torno_']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- timeout_rfid_
      $this->field_config['timeout_rfid_']               = array();
      $this->field_config['timeout_rfid_']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['timeout_rfid_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['timeout_rfid_']['symbol_dec'] = '';
      $this->field_config['timeout_rfid_']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['timeout_rfid_']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- discapacitado_
      $this->field_config['discapacitado_']               = array();
      $this->field_config['discapacitado_']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['discapacitado_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['discapacitado_']['symbol_dec'] = '';
      $this->field_config['discapacitado_']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['discapacitado_']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- numcaja_
      $this->field_config['numcaja_']               = array();
      $this->field_config['numcaja_']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['numcaja_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['numcaja_']['symbol_dec'] = '';
      $this->field_config['numcaja_']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['numcaja_']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- empleado_
      $this->field_config['empleado_']               = array();
      $this->field_config['empleado_']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['empleado_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['empleado_']['symbol_dec'] = '';
      $this->field_config['empleado_']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['empleado_']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- tokens_
      $this->field_config['tokens_']               = array();
      $this->field_config['tokens_']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_val'];
      $this->field_config['tokens_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['tokens_']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_val'];
      $this->field_config['tokens_']['symbol_mon'] = '';
      $this->field_config['tokens_']['format_pos'] = $_SESSION['scriptcase']['reg_conf']['monet_f_pos'];
      $this->field_config['tokens_']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['monet_f_neg'];
      //-- bidireccion_
      $this->field_config['bidireccion_']               = array();
      $this->field_config['bidireccion_']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['bidireccion_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['bidireccion_']['symbol_dec'] = '';
      $this->field_config['bidireccion_']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['bidireccion_']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- cod_devicee_
      $this->field_config['cod_devicee_']               = array();
      $this->field_config['cod_devicee_']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['cod_devicee_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['cod_devicee_']['symbol_dec'] = '';
      $this->field_config['cod_devicee_']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['cod_devicee_']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- pin_relay1_
      $this->field_config['pin_relay1_']               = array();
      $this->field_config['pin_relay1_']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['pin_relay1_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['pin_relay1_']['symbol_dec'] = '';
      $this->field_config['pin_relay1_']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['pin_relay1_']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- pin_relay2_
      $this->field_config['pin_relay2_']               = array();
      $this->field_config['pin_relay2_']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['pin_relay2_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['pin_relay2_']['symbol_dec'] = '';
      $this->field_config['pin_relay2_']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['pin_relay2_']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- rfid_estado_
      $this->field_config['rfid_estado_']               = array();
      $this->field_config['rfid_estado_']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['rfid_estado_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['rfid_estado_']['symbol_dec'] = '';
      $this->field_config['rfid_estado_']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['rfid_estado_']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- rfid_fecha_
      $this->field_config['rfid_fecha_']                 = array();
      $this->field_config['rfid_fecha_']['date_format']  = $_SESSION['scriptcase']['reg_conf']['date_format'] . ';' . $_SESSION['scriptcase']['reg_conf']['time_format'];
      $this->field_config['rfid_fecha_']['date_sep']     = $_SESSION['scriptcase']['reg_conf']['date_sep'];
      $this->field_config['rfid_fecha_']['time_sep']     = $_SESSION['scriptcase']['reg_conf']['time_sep'];
      $this->field_config['rfid_fecha_']['date_display'] = "ddmmaaaa;hhiiss";
      $this->new_date_format('DH', 'rfid_fecha_');
   }

   function controle()
   {
        global $nm_url_saida, $teste_validade, 
               $GLOBALS, $Campos_Crit, $Campos_Falta, $Campos_Erros, $sc_seq_vert, $sc_check_incl, 
               $glo_senha_protect, $nm_apl_dependente, $nm_form_submit, $sc_check_excl, $nm_opc_form_php, $nm_call_php, $nm_opc_lookup;


      $this->ini_controle();
      if ($this->nmgp_opcao == "change_qtd_line")
      {
          $this->NM_btn_navega = "N";
          if (strtolower($this->nmgp_max_line) == "all")
          {
              $this->nmgp_opcao = "inicio";
              $this->form_paginacao = "total";
          }
          else
          {
              $this->nmgp_opcao = "igual";
              $this->form_paginacao = "parcial";
          }
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['sc_max_reg'] = $this->nmgp_max_line;
      }
      if ('' != $_SESSION['scriptcase']['change_regional_old'])
      {
          $_SESSION['scriptcase']['str_conf_reg'] = $_SESSION['scriptcase']['change_regional_old'];
          $this->Ini->regionalDefault($_SESSION['scriptcase']['str_conf_reg']);
          $this->loadFieldConfig();
          $this->nm_tira_formatacao();

          $_SESSION['scriptcase']['str_conf_reg'] = $_SESSION['scriptcase']['change_regional_new'];
          $this->Ini->regionalDefault($_SESSION['scriptcase']['str_conf_reg']);
          $this->loadFieldConfig();
          $guarda_formatado = $this->formatado;
          $this->nm_formatar_campos();
          $this->formatado = $guarda_formatado;

          $_SESSION['scriptcase']['change_regional_old'] = '';
          $_SESSION['scriptcase']['change_regional_new'] = '';
      }

      $Campos_Crit       = "";
      $Campos_erro       = "";
      $Campos_Falta      = array();
      $Campos_Erros      = array();
      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          =  substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['opc_edit'] = true;  
      $sc_contr_vert = (isset($GLOBALS["sc_contr_vert"])) ? $GLOBALS["sc_contr_vert"] : "";
      $sc_seq_vert   = 1; 
      $sc_opc_salva  = $this->nmgp_opcao; 
      $sc_todas_Crit = "";
      $sc_check_excl = array(); 
      $sc_check_incl = array(); 
      if (isset($GLOBALS["sc_check_vert"]) && is_array($GLOBALS["sc_check_vert"])) 
      { 
          if ($this->nmgp_opcao == "incluir" || ($this->nmgp_opcao == "recarga" && $this->nmgp_opc_ant == "novo"))
          {
              $sc_check_incl = $GLOBALS["sc_check_vert"]; 
          }
          elseif ($this->nmgp_opcao == "alterar" || $this->nmgp_opcao == "excluir" || $this->nmgp_opcao == "recarga")
          {
              $sc_check_excl = $GLOBALS["sc_check_vert"]; 
          }
      } 
      elseif ($this->nmgp_opcao == 'incluir' && isset($_POST['upload_file_row']) && '' != $_POST['upload_file_row'])
      {
          $sc_check_incl = array($_POST['upload_file_row']);
      }
      if (empty($this->nmgp_opcao)) 
      { 
          $this->nmgp_opcao = "inicio";
      } 
      if ($this->NM_ajax_flag && 'add_new_line' == $this->NM_ajax_opcao)
      {
         $this->nmgp_opcao = "novo";
         $this->nm_select_banco();
         $this->nm_gera_html();
         $this->NM_ajax_info['newline'] = NM_utf8_urldecode($this->New_Line);
         $this->NM_close_db();
         form_devices_leds_effects_pack_ajax_response();
         exit;
      }
      if ($this->NM_ajax_flag && 'backup_line' == $this->NM_ajax_opcao)
      {
         $this->nmgp_opcao = "igual";
         $this->nm_tira_formatacao();
         $this->nm_select_banco();
         $this->ajax_return_values();
         $this->NM_close_db();
         form_devices_leds_effects_pack_ajax_response();
         exit;
      }
      if ($this->NM_ajax_flag && 'submit_form' == $this->NM_ajax_opcao)
      {
         if (isset($this->cod_device_)) { $this->nm_limpa_alfa($this->cod_device_); }
         if (isset($this->device_name_)) { $this->nm_limpa_alfa($this->device_name_); }
         if (isset($this->ledstripe1_)) { $this->nm_limpa_alfa($this->ledstripe1_); }
         if (isset($this->ledstripe2_)) { $this->nm_limpa_alfa($this->ledstripe2_); }
         if (isset($this->ledstripe3_)) { $this->nm_limpa_alfa($this->ledstripe3_); }
         if (isset($this->ledstripe4_)) { $this->nm_limpa_alfa($this->ledstripe4_); }
         if (isset($this->color_)) { $this->nm_limpa_alfa($this->color_); }
         if (isset($this->Sc_num_lin_alt) && $this->Sc_num_lin_alt > 0) 
         {
             $sc_seq_vert = $this->Sc_num_lin_alt;
         }
         if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['dados_form'][$sc_seq_vert]))
         {
             $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['dados_form'][$sc_seq_vert];
             $this->cod_activo_ = $this->nmgp_dados_form['cod_activo_']; 
             $this->cod_grupo_ = $this->nmgp_dados_form['cod_grupo_']; 
             $this->activa_ = $this->nmgp_dados_form['activa_']; 
             $this->estado_ = $this->nmgp_dados_form['estado_']; 
             $this->ult_rfid_ = $this->nmgp_dados_form['ult_rfid_']; 
             $this->ult_fecha_ = $this->nmgp_dados_form['ult_fecha_']; 
             $this->valor_default_ = $this->nmgp_dados_form['valor_default_']; 
             $this->acepta_tiempo_ = $this->nmgp_dados_form['acepta_tiempo_']; 
             $this->acepta_tokens_ = $this->nmgp_dados_form['acepta_tokens_']; 
             $this->dev_ip_ = $this->nmgp_dados_form['dev_ip_']; 
             $this->tipo_dev_ = $this->nmgp_dados_form['tipo_dev_']; 
             $this->direccion_torno_ = $this->nmgp_dados_form['direccion_torno_']; 
             $this->timeout_rfid_ = $this->nmgp_dados_form['timeout_rfid_']; 
             $this->discapacitado_ = $this->nmgp_dados_form['discapacitado_']; 
             $this->numcaja_ = $this->nmgp_dados_form['numcaja_']; 
             $this->empleado_ = $this->nmgp_dados_form['empleado_']; 
             $this->tokens_ = $this->nmgp_dados_form['tokens_']; 
             $this->serialrfid_ = $this->nmgp_dados_form['serialrfid_']; 
             $this->bidireccion_ = $this->nmgp_dados_form['bidireccion_']; 
             $this->cod_devicee_ = $this->nmgp_dados_form['cod_devicee_']; 
             $this->url_1_ = $this->nmgp_dados_form['url_1_']; 
             $this->url_2_ = $this->nmgp_dados_form['url_2_']; 
             $this->url_3_ = $this->nmgp_dados_form['url_3_']; 
             $this->foto1_ = $this->nmgp_dados_form['foto1_']; 
             $this->foto2_ = $this->nmgp_dados_form['foto2_']; 
             $this->foto3_ = $this->nmgp_dados_form['foto3_']; 
             $this->pin_relay1_ = $this->nmgp_dados_form['pin_relay1_']; 
             $this->pin_relay2_ = $this->nmgp_dados_form['pin_relay2_']; 
             $this->rfid_read_ = $this->nmgp_dados_form['rfid_read_']; 
             $this->rfid_estado_ = $this->nmgp_dados_form['rfid_estado_']; 
             $this->rfid_fecha_ = $this->nmgp_dados_form['rfid_fecha_']; 
             $this->url_accion_ = $this->nmgp_dados_form['url_accion_']; 
             $this->url_atraccion_ = $this->nmgp_dados_form['url_atraccion_']; 
             $this->uhfip_ = $this->nmgp_dados_form['uhfip_']; 
             $this->url_reader_ = $this->nmgp_dados_form['url_reader_']; 
             $this->cod_rfid900_ = $this->nmgp_dados_form['cod_rfid900_']; 
             $this->mensaje_ = $this->nmgp_dados_form['mensaje_']; 
             $this->tipolector_ = $this->nmgp_dados_form['tipolector_']; 
             $this->url_accion_bg_ = $this->nmgp_dados_form['url_accion_bg_']; 
             $this->url_inicio_ = $this->nmgp_dados_form['url_inicio_']; 
             $this->lasteffect_ = $this->nmgp_dados_form['lasteffect_']; 
         }
         $this->controle_form_vert();
         if ($Campos_Crit != "" || !empty($Campos_Falta) || $this->Campos_Mens_erro != "")
         {
             $this->NM_rollback_db();
              if ($this->NM_ajax_flag)
              {
                  if (!isset($this->NM_ajax_info['errList']['geral_form_devices_leds_effects']) || !is_array($this->NM_ajax_info['errList']['geral_form_devices_leds_effects']))
                  {
                      $this->NM_ajax_info['errList']['geral_form_devices_leds_effects'] = array();
                  }
                  if ($Campos_Crit != "")
                  {
                      $this->NM_ajax_info['errList']['geral_form_devices_leds_effects'][] = $Campos_Crit;
                  }
                  if (!empty($Campos_Falta))
                  {
                      $this->NM_ajax_info['errList']['geral_form_devices_leds_effects'][] = $this->Formata_Campos_Falta($Campos_Falta);
                  }
                  if ($this->Campos_Mens_erro != "")
                  {
                      $this->NM_ajax_info['errList']['geral_form_devices_leds_effects'][] = $this->Campos_Mens_erro;
                  }
              }
         }
         else
         {
             $this->NM_commit_db();
         }
         if ($this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form" && !$this->Apl_com_erro)
         {
             $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['recarga'] = $this->nmgp_opcao;
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['sc_redir_insert']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['sc_redir_insert'] == "ok")
          {
              if ($this->sc_teve_incl && empty($sc_todas_Crit))
              {
                  $this->NM_close_db(); 
                  $this->nmgp_redireciona(2); 
              }
          }
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['sc_redir_atualiz']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['sc_redir_atualiz'] == "ok")
          {
              if ($this->sc_teve_alt && empty($sc_todas_Crit))
              {
                  $this->NM_close_db(); 
                  $this->nmgp_redireciona(2); 
              }
              if ($this->sc_teve_excl && empty($sc_todas_Crit))
              {
                  $this->NM_close_db(); 
                  $this->nmgp_redireciona(2); 
              }
          }
         }
         $this->NM_close_db();
		if ('alterar' == $this->NM_ajax_info['param']['nmgp_opcao'] && 'ERROR' != $this->NM_ajax_info['result']) {
			$this->NM_ajax_info['msgDisplay'] = NM_charset_to_utf8($this->Ini->Nm_lang['lang_othr_ajax_frmu']);
		}
		if ('incluir' == $this->NM_ajax_info['param']['nmgp_opcao'] && 'ERROR' != $this->NM_ajax_info['result']) {
			$this->NM_ajax_info['msgDisplay'] = NM_charset_to_utf8($this->Ini->Nm_lang['lang_othr_ajax_frmi']);
		}
		if ('excluir' == $this->NM_ajax_info['param']['nmgp_opcao'] && 'ERROR' != $this->NM_ajax_info['result']) {
			$this->NM_ajax_info['msgDisplay'] = NM_charset_to_utf8($this->Ini->Nm_lang['lang_othr_ajax_frmd']);
		}
         form_devices_leds_effects_pack_ajax_response();
         exit;
      }
      if ($this->NM_ajax_flag && 'validate_' == substr($this->NM_ajax_opcao, 0, 9))
      {
         $Campos_Crit  = "";
         $Campos_Falta = array();
         $Campos_Erros = array();
          if ('validate_cod_device_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'cod_device_');
          }
          if ('validate_device_name_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'device_name_');
          }
          if ('validate_ledstripe1_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'ledstripe1_');
          }
          if ('validate_ledstripe2_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'ledstripe2_');
          }
          if ('validate_ledstripe3_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'ledstripe3_');
          }
          if ('validate_ledstripe4_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'ledstripe4_');
          }
          if ('validate_color_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'color_');
          }
          form_devices_leds_effects_pack_ajax_response();
          exit;
      }
      while ($sc_contr_vert > $sc_seq_vert) 
      { 
         $Campos_Crit  = "";
         $Campos_Falta = array();
         $Campos_Erros = array();
         $this->cod_device_ = $GLOBALS["cod_device_" . $sc_seq_vert]; 
         $this->device_name_ = $GLOBALS["device_name_" . $sc_seq_vert]; 
         $this->ledstripe1_ = $GLOBALS["ledstripe1_" . $sc_seq_vert]; 
         $this->ledstripe2_ = $GLOBALS["ledstripe2_" . $sc_seq_vert]; 
         $this->ledstripe3_ = $GLOBALS["ledstripe3_" . $sc_seq_vert]; 
         $this->ledstripe4_ = $GLOBALS["ledstripe4_" . $sc_seq_vert]; 
         $this->color_ = $GLOBALS["color_" . $sc_seq_vert]; 
         if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['dados_form'][$sc_seq_vert]))
         {
             $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['dados_form'][$sc_seq_vert];
             $this->cod_activo_ = $this->nmgp_dados_form['cod_activo_']; 
             $this->cod_grupo_ = $this->nmgp_dados_form['cod_grupo_']; 
             $this->activa_ = $this->nmgp_dados_form['activa_']; 
             $this->estado_ = $this->nmgp_dados_form['estado_']; 
             $this->ult_rfid_ = $this->nmgp_dados_form['ult_rfid_']; 
             $this->ult_fecha_ = $this->nmgp_dados_form['ult_fecha_']; 
             $this->valor_default_ = $this->nmgp_dados_form['valor_default_']; 
             $this->acepta_tiempo_ = $this->nmgp_dados_form['acepta_tiempo_']; 
             $this->acepta_tokens_ = $this->nmgp_dados_form['acepta_tokens_']; 
             $this->dev_ip_ = $this->nmgp_dados_form['dev_ip_']; 
             $this->tipo_dev_ = $this->nmgp_dados_form['tipo_dev_']; 
             $this->direccion_torno_ = $this->nmgp_dados_form['direccion_torno_']; 
             $this->timeout_rfid_ = $this->nmgp_dados_form['timeout_rfid_']; 
             $this->discapacitado_ = $this->nmgp_dados_form['discapacitado_']; 
             $this->numcaja_ = $this->nmgp_dados_form['numcaja_']; 
             $this->empleado_ = $this->nmgp_dados_form['empleado_']; 
             $this->tokens_ = $this->nmgp_dados_form['tokens_']; 
             $this->serialrfid_ = $this->nmgp_dados_form['serialrfid_']; 
             $this->bidireccion_ = $this->nmgp_dados_form['bidireccion_']; 
             $this->cod_devicee_ = $this->nmgp_dados_form['cod_devicee_']; 
             $this->url_1_ = $this->nmgp_dados_form['url_1_']; 
             $this->url_2_ = $this->nmgp_dados_form['url_2_']; 
             $this->url_3_ = $this->nmgp_dados_form['url_3_']; 
             $this->foto1_ = $this->nmgp_dados_form['foto1_']; 
             $this->foto2_ = $this->nmgp_dados_form['foto2_']; 
             $this->foto3_ = $this->nmgp_dados_form['foto3_']; 
             $this->pin_relay1_ = $this->nmgp_dados_form['pin_relay1_']; 
             $this->pin_relay2_ = $this->nmgp_dados_form['pin_relay2_']; 
             $this->rfid_read_ = $this->nmgp_dados_form['rfid_read_']; 
             $this->rfid_estado_ = $this->nmgp_dados_form['rfid_estado_']; 
             $this->rfid_fecha_ = $this->nmgp_dados_form['rfid_fecha_']; 
             $this->url_accion_ = $this->nmgp_dados_form['url_accion_']; 
             $this->url_atraccion_ = $this->nmgp_dados_form['url_atraccion_']; 
             $this->uhfip_ = $this->nmgp_dados_form['uhfip_']; 
             $this->url_reader_ = $this->nmgp_dados_form['url_reader_']; 
             $this->cod_rfid900_ = $this->nmgp_dados_form['cod_rfid900_']; 
             $this->mensaje_ = $this->nmgp_dados_form['mensaje_']; 
             $this->tipolector_ = $this->nmgp_dados_form['tipolector_']; 
             $this->url_accion_bg_ = $this->nmgp_dados_form['url_accion_bg_']; 
             $this->url_inicio_ = $this->nmgp_dados_form['url_inicio_']; 
             $this->lasteffect_ = $this->nmgp_dados_form['lasteffect_']; 
         }
         if (isset($this->cod_device_)) { $this->nm_limpa_alfa($this->cod_device_); }
         if (isset($this->device_name_)) { $this->nm_limpa_alfa($this->device_name_); }
         if (isset($this->ledstripe1_)) { $this->nm_limpa_alfa($this->ledstripe1_); }
         if (isset($this->ledstripe2_)) { $this->nm_limpa_alfa($this->ledstripe2_); }
         if (isset($this->ledstripe3_)) { $this->nm_limpa_alfa($this->ledstripe3_); }
         if (isset($this->ledstripe4_)) { $this->nm_limpa_alfa($this->ledstripe4_); }
         if (isset($this->color_)) { $this->nm_limpa_alfa($this->color_); }
         if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['dados_form'])) 
         {
            $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['dados_form'][$sc_seq_vert];
         }
         if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['dados_select'])) 
         {
            $this->nmgp_dados_select = $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['dados_select'][$sc_seq_vert];
         }
         if ($this->nmgp_opcao != "recarga" && (!in_array($sc_seq_vert, $sc_check_excl) && !in_array($sc_seq_vert, $sc_check_incl) ))
         { }
         else
         {
             $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['sc_disabled'] = array();
             $this->controle_form_vert(); 
             $this->nmgp_opcao = $sc_opc_salva; 
             if ($this->nmgp_opcao != "recarga"  && $this->nmgp_opcao != "muda_form" && ($Campos_Crit != "" || !empty($Campos_Falta) || $this->Campos_Mens_erro != ""))
             {
                 $sc_todas_Crit .= (!empty($sc_todas_Crit)) ? "<br>" : ""; 
                 $sc_todas_Crit .= "<B>" . $this->Ini->Nm_lang['lang_errm_line'] . $sc_seq_vert . "</B>: "; 
                 $sc_todas_Crit .= $this->Formata_Erros($Campos_Crit, $Campos_Falta, $Campos_Erros);
                 $this->Campos_Mens_erro = ""; 
             }
             if ($this->nmgp_opcao != "recarga") 
             {
                $this->nm_guardar_campos();
                $this->nm_formatar_campos();
             }
             $this->form_vert_form_devices_leds_effects[$sc_seq_vert]['cod_device_'] =  $this->cod_device_; 
             $this->form_vert_form_devices_leds_effects[$sc_seq_vert]['device_name_'] =  $this->device_name_; 
             $this->form_vert_form_devices_leds_effects[$sc_seq_vert]['ledstripe1_'] =  $this->ledstripe1_; 
             $this->form_vert_form_devices_leds_effects[$sc_seq_vert]['ledstripe2_'] =  $this->ledstripe2_; 
             $this->form_vert_form_devices_leds_effects[$sc_seq_vert]['ledstripe3_'] =  $this->ledstripe3_; 
             $this->form_vert_form_devices_leds_effects[$sc_seq_vert]['ledstripe4_'] =  $this->ledstripe4_; 
             $this->form_vert_form_devices_leds_effects[$sc_seq_vert]['color_'] =  $this->color_; 
             $this->form_vert_form_devices_leds_effects[$sc_seq_vert]['cod_activo_'] =  $this->cod_activo_; 
             $this->form_vert_form_devices_leds_effects[$sc_seq_vert]['cod_grupo_'] =  $this->cod_grupo_; 
             $this->form_vert_form_devices_leds_effects[$sc_seq_vert]['activa_'] =  $this->activa_; 
             $this->form_vert_form_devices_leds_effects[$sc_seq_vert]['estado_'] =  $this->estado_; 
             $this->form_vert_form_devices_leds_effects[$sc_seq_vert]['ult_rfid_'] =  $this->ult_rfid_; 
             $this->form_vert_form_devices_leds_effects[$sc_seq_vert]['ult_fecha_'] =  $this->ult_fecha_; 
             $this->form_vert_form_devices_leds_effects[$sc_seq_vert]['ult_fecha__hora'] =  $this->ult_fecha__hora; 
             $this->form_vert_form_devices_leds_effects[$sc_seq_vert]['valor_default_'] =  $this->valor_default_; 
             $this->form_vert_form_devices_leds_effects[$sc_seq_vert]['acepta_tiempo_'] =  $this->acepta_tiempo_; 
             $this->form_vert_form_devices_leds_effects[$sc_seq_vert]['acepta_tokens_'] =  $this->acepta_tokens_; 
             $this->form_vert_form_devices_leds_effects[$sc_seq_vert]['dev_ip_'] =  $this->dev_ip_; 
             $this->form_vert_form_devices_leds_effects[$sc_seq_vert]['tipo_dev_'] =  $this->tipo_dev_; 
             $this->form_vert_form_devices_leds_effects[$sc_seq_vert]['direccion_torno_'] =  $this->direccion_torno_; 
             $this->form_vert_form_devices_leds_effects[$sc_seq_vert]['timeout_rfid_'] =  $this->timeout_rfid_; 
             $this->form_vert_form_devices_leds_effects[$sc_seq_vert]['discapacitado_'] =  $this->discapacitado_; 
             $this->form_vert_form_devices_leds_effects[$sc_seq_vert]['numcaja_'] =  $this->numcaja_; 
             $this->form_vert_form_devices_leds_effects[$sc_seq_vert]['empleado_'] =  $this->empleado_; 
             $this->form_vert_form_devices_leds_effects[$sc_seq_vert]['tokens_'] =  $this->tokens_; 
             $this->form_vert_form_devices_leds_effects[$sc_seq_vert]['serialrfid_'] =  $this->serialrfid_; 
             $this->form_vert_form_devices_leds_effects[$sc_seq_vert]['bidireccion_'] =  $this->bidireccion_; 
             $this->form_vert_form_devices_leds_effects[$sc_seq_vert]['cod_devicee_'] =  $this->cod_devicee_; 
             $this->form_vert_form_devices_leds_effects[$sc_seq_vert]['url_1_'] =  $this->url_1_; 
             $this->form_vert_form_devices_leds_effects[$sc_seq_vert]['url_2_'] =  $this->url_2_; 
             $this->form_vert_form_devices_leds_effects[$sc_seq_vert]['url_3_'] =  $this->url_3_; 
             $this->form_vert_form_devices_leds_effects[$sc_seq_vert]['foto1_'] =  $this->foto1_; 
             $this->form_vert_form_devices_leds_effects[$sc_seq_vert]['foto1__limpa'] =  $this->foto1__limpa; 
             $this->form_vert_form_devices_leds_effects[$sc_seq_vert]['foto2_'] =  $this->foto2_; 
             $this->form_vert_form_devices_leds_effects[$sc_seq_vert]['foto2__limpa'] =  $this->foto2__limpa; 
             $this->form_vert_form_devices_leds_effects[$sc_seq_vert]['foto3_'] =  $this->foto3_; 
             $this->form_vert_form_devices_leds_effects[$sc_seq_vert]['foto3__limpa'] =  $this->foto3__limpa; 
             $this->form_vert_form_devices_leds_effects[$sc_seq_vert]['pin_relay1_'] =  $this->pin_relay1_; 
             $this->form_vert_form_devices_leds_effects[$sc_seq_vert]['pin_relay2_'] =  $this->pin_relay2_; 
             $this->form_vert_form_devices_leds_effects[$sc_seq_vert]['rfid_read_'] =  $this->rfid_read_; 
             $this->form_vert_form_devices_leds_effects[$sc_seq_vert]['rfid_estado_'] =  $this->rfid_estado_; 
             $this->form_vert_form_devices_leds_effects[$sc_seq_vert]['rfid_fecha_'] =  $this->rfid_fecha_; 
             $this->form_vert_form_devices_leds_effects[$sc_seq_vert]['rfid_fecha__hora'] =  $this->rfid_fecha__hora; 
             $this->form_vert_form_devices_leds_effects[$sc_seq_vert]['url_accion_'] =  $this->url_accion_; 
             $this->form_vert_form_devices_leds_effects[$sc_seq_vert]['url_atraccion_'] =  $this->url_atraccion_; 
             $this->form_vert_form_devices_leds_effects[$sc_seq_vert]['uhfip_'] =  $this->uhfip_; 
             $this->form_vert_form_devices_leds_effects[$sc_seq_vert]['url_reader_'] =  $this->url_reader_; 
             $this->form_vert_form_devices_leds_effects[$sc_seq_vert]['cod_rfid900_'] =  $this->cod_rfid900_; 
             $this->form_vert_form_devices_leds_effects[$sc_seq_vert]['mensaje_'] =  $this->mensaje_; 
             $this->form_vert_form_devices_leds_effects[$sc_seq_vert]['tipolector_'] =  $this->tipolector_; 
             $this->form_vert_form_devices_leds_effects[$sc_seq_vert]['url_accion_bg_'] =  $this->url_accion_bg_; 
             $this->form_vert_form_devices_leds_effects[$sc_seq_vert]['url_inicio_'] =  $this->url_inicio_; 
             $this->form_vert_form_devices_leds_effects[$sc_seq_vert]['lasteffect_'] =  $this->lasteffect_; 
         }
         $sc_seq_vert++; 
      } 
      if (!empty($sc_todas_Crit)) 
      { 
          $this->Erro->mensagem(__FILE__, __LINE__, "critica", $sc_todas_Crit); 
          if ($this->nmgp_opcao == "incluir")
          { 
              $this->nmgp_opcao = "novo"; 
          }
      } 
      elseif ($this->nmgp_opcao == "incluir")
      { 
          $this->nmgp_opcao = "novo"; 
      }
      if ($this->nmgp_opcao == 'incluir' && isset($_POST['upload_file_row']) && '' != $_POST['upload_file_row'])
      {
          $this->nmgp_opcao = 'igual';
      }
      if ($this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form") 
      { 
          if ($this->sc_teve_incl) 
          { 
              $this->sc_after_all_insert = true;
          }
          if ($this->sc_teve_alt) 
          { 
              $this->sc_after_all_update = true;
          }
          if ($this->sc_teve_excl) 
          { 
              $this->sc_after_all_delete = true;
          }
          if (empty($sc_todas_Crit)) 
          { 
              $this->NM_commit_db(); 
              $this->nm_select_banco();
              $sc_check_excl = array(); 
          } 
          else
          { 
              $this->NM_rollback_db(); 
          } 
      } 
      if ($this->nmgp_opcao == "recarga") 
      { 
          $this->NM_gera_nav_page(); 
      } 
      if ($this->NM_ajax_flag && ('navigate_form' == $this->NM_ajax_opcao || !empty($this->nmgp_refresh_fields)))
      {
          $this->ajax_return_values();
          $this->ajax_add_parameters();
          $this->NM_close_db();
          form_devices_leds_effects_pack_ajax_response();
          exit;
      }
      if ($this->NM_ajax_flag && 'table_refresh' == $this->NM_ajax_opcao)
      {
          $this->nm_gera_html();
          $this->NM_ajax_info['tableRefresh'] = NM_charset_to_utf8($this->Table_refresh . $this->New_Line) . '</table>';
          $this->NM_ajax_info['navStatus']['ret'] = $this->Nav_permite_ret ? 'S' : 'N';
          $this->NM_ajax_info['navStatus']['ava'] = $this->Nav_permite_ava ? 'S' : 'N';
          $this->NM_ajax_info['rsSize'] = sizeof($this->form_vert_form_devices_leds_effects);
          $this->NM_ajax_info['fldList']['cod_device_']['keyVal'] = sc_htmlentities($this->nmgp_dados_form['cod_device_']);
          $this->NM_close_db();
          form_devices_leds_effects_pack_ajax_response();
          exit;
      }
      if ($this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form" && !$this->Apl_com_erro)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['recarga'] = $this->nmgp_opcao;
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['sc_redir_insert']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['sc_redir_insert'] == "ok")
          {
              if ($this->sc_teve_incl && empty($sc_todas_Crit))
              {
                  $this->NM_close_db(); 
                  $this->nmgp_redireciona(2); 
              }
          }
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['sc_redir_atualiz']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['sc_redir_atualiz'] == "ok")
          {
              if ($this->sc_teve_alt && empty($sc_todas_Crit))
              {
                  $this->NM_close_db(); 
                  $this->nmgp_redireciona(2); 
              }
              if ($this->sc_teve_excl && empty($sc_todas_Crit))
              {
                  $this->NM_close_db(); 
                  $this->nmgp_redireciona(2); 
              }
          }
      }
      $this->nm_todas_criticas = $sc_todas_Crit;
      $this->nm_gera_html();
      $this->NM_close_db(); 
      if ($this->Change_Menu)
      {
          $apl_menu  = $_SESSION['scriptcase']['menu_atual'];
          $Arr_rastro = array();
          if (isset($_SESSION['scriptcase']['menu_apls'][$apl_menu][$this->sc_init_menu]) && count($_SESSION['scriptcase']['menu_apls'][$apl_menu][$this->sc_init_menu]) > 1)
          {
              foreach ($_SESSION['scriptcase']['menu_apls'][$apl_menu][$this->sc_init_menu] as $menu => $apls)
              {
                 $Arr_rastro[] = "'<a href=\"" . $apls['link'] . "?script_case_init=" . $this->sc_init_menu . "\" target=\"#NMIframe#\">" . $apls['label'] . "</a>'";
              }
              $ult_apl = count($Arr_rastro) - 1;
              unset($Arr_rastro[$ult_apl]);
              $rastro = implode(",", $Arr_rastro);
?>
  <script type="text/javascript">
     link_atual = new Array (<?php echo $rastro ?>);
     parent.writeFastMenu(link_atual);
  </script>
<?php
          }
          else
          {
?>
  <script type="text/javascript">
     parent.clearFastMenu();
  </script>
<?php
          }
      }
   }
   function controle_form_vert()
   {
     global $nm_opc_lookup,$Campos_Crit, $Campos_Falta, $Campos_Erros, 
            $glo_senha_protect, $nm_apl_dependente, $nm_form_submit;

//
//-----> 
//
      if (isset($this->sc_inline_call) && 'Y' == $this->sc_inline_call)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['inline_form_seq'] = $this->sc_seq_row;
          $this->nm_tira_formatacao();
      }
      if ($this->nmgp_opcao == "recarga" || $this->nmgp_opcao == "recarga_mobile" || $this->nmgp_opcao == "muda_form") 
      {
          $this->nm_tira_formatacao();
          $nm_sc_sv_opcao = $this->nmgp_opcao; 
          $this->nmgp_opcao = "nada"; 
          $this->nm_acessa_banco();
          if ($this->NM_ajax_flag)
          {
              $this->ajax_return_values();
              form_devices_leds_effects_pack_ajax_response();
              exit;
          }
          $this->nm_formatar_campos();
          $this->nmgp_opcao = $nm_sc_sv_opcao; 
          return; 
      }
      if ($this->nmgp_opcao == "incluir" || $this->nmgp_opcao == "alterar" || $this->nmgp_opcao == "excluir") 
      {
          $this->device_name_ = sc_strip_script($this->device_name_, $_SESSION['scriptcase']['charset']);
          $this->device_name_ = sc_strip_tags($this->device_name_, $_SESSION['scriptcase']['charset']);
          $this->ledstripe2_ = sc_strip_script($this->ledstripe2_, $_SESSION['scriptcase']['charset']);
          $this->ledstripe2_ = sc_strip_tags($this->ledstripe2_, $_SESSION['scriptcase']['charset']);
          $this->ledstripe3_ = sc_strip_script($this->ledstripe3_, $_SESSION['scriptcase']['charset']);
          $this->ledstripe3_ = sc_strip_tags($this->ledstripe3_, $_SESSION['scriptcase']['charset']);
          $this->ledstripe4_ = sc_strip_script($this->ledstripe4_, $_SESSION['scriptcase']['charset']);
          $this->ledstripe4_ = sc_strip_tags($this->ledstripe4_, $_SESSION['scriptcase']['charset']);
          $this->color_ = sc_strip_script($this->color_, $_SESSION['scriptcase']['charset']);
          $this->color_ = sc_strip_tags($this->color_, $_SESSION['scriptcase']['charset']);
          $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros) ; 
          $_SESSION['scriptcase']['form_devices_leds_effects']['contr_erro'] = 'off';
          if ($Campos_Crit != "") 
          {
              $Campos_Crit = $this->Ini->Nm_lang['lang_errm_flds'] . ' ' . $Campos_Crit ; 
          }
          if ($Campos_Crit != "" || !empty($Campos_Falta) || $this->Campos_Mens_erro != "")
          {
              $this->nmgp_opc_ant = $this->nmgp_opcao ; 
              if ($this->nmgp_opcao == "incluir" && $nm_apl_dependente == 1) 
              { 
                  $this->nm_flag_saida_novo = "S";; 
              }
              if ($this->nmgp_opcao == "incluir") 
              { 
                  $GLOBALS["erro_incl"] = 1; 
              }
              $this->nmgp_opcao = "nada" ; 
          }
      }
      elseif (isset($nm_form_submit) && 1 == $nm_form_submit && $this->nmgp_opcao != "menu_link" && $this->nmgp_opcao != "recarga_mobile")
      {
      }
//
      if ($this->nmgp_opcao != "nada")
      {
          $this->nm_acessa_banco();
      }
      else
      {
           if ($this->nmgp_opc_ant == "incluir") 
           { 
               $this->nm_proc_onload(false);
           }
           else
           { 
              $this->nm_guardar_campos();
           }
      }
   }
  function html_export_print($nm_arquivo_html, $nmgp_password)
  {
      $Html_password = "";
          $Arq_base  = $this->Ini->root . $this->Ini->path_imag_temp . $nm_arquivo_html;
          $Parm_pass = ($Html_password != "") ? " -p" : "";
          $Zip_name = "sc_prt_" . date("YmdHis") . "_" . rand(0, 1000) . "form_devices_leds_effects.zip";
          $Arq_htm = $this->Ini->path_imag_temp . "/" . $Zip_name;
          $Arq_zip = $this->Ini->root . $Arq_htm;
          $Zip_f     = (FALSE !== strpos($Arq_zip, ' ')) ? " \"" . $Arq_zip . "\"" :  $Arq_zip;
          $Arq_input = (FALSE !== strpos($Arq_base, ' ')) ? " \"" . $Arq_base . "\"" :  $Arq_base;
           if (is_file($Arq_zip)) {
               unlink($Arq_zip);
           }
           $str_zip = "";
           if (FALSE !== strpos(strtolower(php_uname()), 'windows')) 
           {
               chdir($this->Ini->path_third . "/zip/windows");
               $str_zip = "zip.exe " . strtoupper($Parm_pass) . " -j " . $Html_password . " " . $Zip_f . " " . $Arq_input;
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
               $str_zip = "./7za " . $Parm_pass . $Html_password . " a " . $Zip_f . " " . $Arq_input;
           }
           elseif (FALSE !== strpos(strtolower(php_uname()), 'darwin'))
           {
               chdir($this->Ini->path_third . "/zip/mac/bin");
               $str_zip = "./7za " . $Parm_pass . $Html_password . " a " . $Zip_f . " " . $Arq_input;
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
           foreach ($this->Ini->Img_export_zip as $cada_img_zip)
           {
               $str_zip      = "";
              $cada_img_zip = '"' . $cada_img_zip . '"';
               if (FALSE !== strpos(strtolower(php_uname()), 'windows')) 
               {
                   $str_zip = "zip.exe " . strtoupper($Parm_pass) . " -j -u " . $Html_password . " " . $Zip_f . " " . $cada_img_zip;
               }
               elseif (FALSE !== strpos(strtolower(php_uname()), 'linux')) 
               {
                   $str_zip = "./7za " . $Parm_pass . $Html_password . " a " . $Zip_f . " " . $cada_img_zip;
               }
               elseif (FALSE !== strpos(strtolower(php_uname()), 'darwin'))
               {
                   $str_zip = "./7za " . $Parm_pass . $Html_password . " a " . $Zip_f . " " . $cada_img_zip;
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
           }
           if (is_file($Arq_zip)) {
               unlink($Arq_base);
           } 
          $path_doc_md5 = md5($Arq_htm);
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects'][$path_doc_md5][0] = $Arq_htm;
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects'][$path_doc_md5][1] = $Zip_name;
?>
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE><?php echo strip_tags("" . $this->Ini->Nm_lang['lang_othr_frmu_title'] . " devices") ?></TITLE>
 <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
 <META http-equiv="Expires" content="Fri, Jan 01 1900 00:00:00 GMT"/>
 <META http-equiv="Last-Modified" content="<?php echo gmdate("D, d M Y H:i:s"); ?> GMT"/>
 <META http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate"/>
 <META http-equiv="Cache-Control" content="post-check=0, pre-check=0"/>
 <META http-equiv="Pragma" content="no-cache"/>
  <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_all ?>_export.css" /> 
  <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_all ?>_export<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" /> 
  <link rel="stylesheet" type="text/css" href="../_lib/buttons/<?php echo $this->Ini->Str_btn_form . '/' . $this->Ini->Str_btn_form ?>.css" /> 
  <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_prod; ?>/third/font-awesome/css/all.min.css" /> 
  <link rel="shortcut icon" href="../_lib/img/scriptcase__NM__ico__NM__favicon.ico">
</HEAD>
<BODY class="scExportPage">
<table style="border-collapse: collapse; border-width: 0; height: 100%; width: 100%"><tr><td style="padding: 0; text-align: center; vertical-align: top">
 <table class="scExportTable" align="center">
  <tr>
   <td class="scExportTitle" style="height: 25px">PRINT</td>
  </tr>
  <tr>
   <td class="scExportLine" style="width: 100%">
    <table style="border-collapse: collapse; border-width: 0; width: 100%"><tr><td class="scExportLineFont" style="padding: 3px 0 0 0" id="idMessage">
    <?php echo $this->Ini->Nm_lang['lang_othr_file_msge'] ?>
    </td><td class="scExportLineFont" style="text-align:right; padding: 3px 0 0 0">
   <?php echo nmButtonOutput($this->arr_buttons, "bexportview", "document.Fview.submit()", "document.Fview.submit()", "idBtnView", "", "", "", "absmiddle", "", "0", $this->Ini->path_botoes, "", "", "", "", "");?>

   <?php echo nmButtonOutput($this->arr_buttons, "bdownload", "document.Fdown.submit()", "document.Fdown.submit()", "idBtnDown", "", "", "", "absmiddle", "", "0", $this->Ini->path_botoes, "", "", "", "", "");?>

   <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "document.F0.submit()", "document.F0.submit()", "idBtnBack", "", "", "", "absmiddle", "", "0", $this->Ini->path_botoes, "", "", "", "", "");?>

    </td></tr></table>
   </td>
  </tr>
 </table>
</td></tr></table>
<form name="Fview" method="get" action="<?php echo  $this->form_encode_input($Arq_htm) ?>" target="_self" style="display: none"> 
</form>
<form name="Fdown" method="get" action="form_devices_leds_effects_download.php" target="_self" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo $this->form_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="form_devices_leds_effects"> 
<input type="hidden" name="nm_name_doc" value="<?php echo $path_doc_md5 ?>"> 
</form>
<form name="F0" method=post action="./" target="_self" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo $this->form_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nmgp_opcao" value="<?php echo $this->nmgp_opcao ?>"> 
</form> 
         </BODY>
         </HTML>
<?php
          exit;
  }
//
//--------------------------------------------------------------------------------------
   function NM_has_trans()
   {
       return !in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access);
   }
//
//--------------------------------------------------------------------------------------
   function NM_commit_db()
   {
       if ($this->Ini->sc_tem_trans_banco && !$this->Embutida_proc)
       { 
           $this->Db->CommitTrans(); 
           $this->Ini->sc_tem_trans_banco = false;
       } 
   }
//
//--------------------------------------------------------------------------------------
   function NM_rollback_db()
   {
       if ($this->Ini->sc_tem_trans_banco && !$this->Embutida_proc)
       { 
           $this->Db->RollbackTrans(); 
           $this->Ini->sc_tem_trans_banco = false;
       } 
   }
//
//--------------------------------------------------------------------------------------
   function NM_close_db()
   {
       if ($this->Db && !$this->Embutida_proc)
       { 
           $this->Db->Close(); 
       } 
   }
//
//--------------------------------------------------------------------------------------
   function Formata_Erros($Campos_Crit, $Campos_Falta, $Campos_Erros, $mode = 3) 
   {
       switch ($mode)
       {
           case 1:
               $campos_erro = array();
               if (!empty($Campos_Crit))
               {
                   $campos_erro[] = $Campos_Crit;
               }
               if (!empty($Campos_Falta))
               {
                   $campos_erro[] = $this->Formata_Campos_Falta($Campos_Falta);
               }
               if (!empty($this->Campos_Mens_erro))
               {
                   $campos_erro[] = $this->Campos_Mens_erro;
               }
               return implode('<br />', $campos_erro);
               break;

           case 2:
               $campos_erro = array();
               if (!empty($Campos_Crit))
               {
                   $campos_erro[] = $Campos_Crit;
               }
               if (!empty($Campos_Falta))
               {
                   $campos_erro[] = $this->Formata_Campos_Falta($Campos_Falta, true);
               }
               if (!empty($this->Campos_Mens_erro))
               {
                   $campos_erro[] = $this->Campos_Mens_erro;
               }
               return implode('<br />', $campos_erro);
               break;

           case 3:
               $campos_erro = array();
               if (!empty($Campos_Erros))
               {
                   $campos_erro[] = $this->Formata_Campos_Erros($Campos_Erros);
               }
               if (!empty($this->Campos_Mens_erro))
               {
                   $campos_mens_erro = str_replace(array('<br />', '<br>', '<BR />'), array('<BR>', '<BR>', '<BR>'), $this->Campos_Mens_erro);
                   $campos_mens_erro = explode('<BR>', $campos_mens_erro);
                   foreach ($campos_mens_erro as $msg_erro)
                   {
                       if ('' != $msg_erro && !in_array($msg_erro, $campos_erro))
                       {
                           $campos_erro[] = $msg_erro;
                       }
                   }
               }
               return implode('<br />', $campos_erro);
               break;

           case 4:
               $campos_erro = array();
               if (!empty($Campos_Erros))
               {
                   $campos_erro[] = $this->Formata_Campos_Erros_SweetAlert($Campos_Erros);
               }
               if (!empty($this->Campos_Mens_erro))
               {
                   $campos_mens_erro = str_replace(array('<br />', '<br>', '<BR />'), array('<BR>', '<BR>', '<BR>'), $this->Campos_Mens_erro);
                   $campos_mens_erro = explode('<BR>', $campos_mens_erro);
                   foreach ($campos_mens_erro as $msg_erro)
                   {
                       if ('' != $msg_erro && !in_array($msg_erro, $campos_erro))
                       {
                           $campos_erro[] = $msg_erro;
                       }
                   }
               }
               return implode('<br />', $campos_erro);
               break;
       }
   }

   function Formata_Campos_Falta($Campos_Falta, $table = false) 
   {
       $Campos_Falta = array_unique($Campos_Falta);

       if (!$table)
       {
           return $this->Ini->Nm_lang['lang_errm_reqd'] . ' ' . implode('; ', $Campos_Falta);
       }

       $aCols  = array();
       $iTotal = sizeof($Campos_Falta);
       $iCols  = 6 > $iTotal ? 1 : (11 > $iTotal ? 2 : (16 > $iTotal ? 3 : 4));
       $iItems = ceil($iTotal / $iCols);
       $iNowC  = 0;
       $iNowI  = 0;

       foreach ($Campos_Falta as $campo)
       {
           $aCols[$iNowC][] = $campo;
           if ($iItems == ++$iNowI)
           {
               $iNowC++;
               $iNowI = 0;
           }
       }

       $sError  = '<table style="border-collapse: collapse; border-width: 0px">';
       $sError .= '<tr>';
       $sError .= '<td class="scFormErrorMessageFont" style="padding: 0; vertical-align: top; white-space: nowrap">' . $this->Ini->Nm_lang['lang_errm_reqd'] . '</td>';
       foreach ($aCols as $aCol)
       {
           $sError .= '<td class="scFormErrorMessageFont" style="padding: 0 6px; vertical-align: top; white-space: nowrap">' . implode('<br />', $aCol) . '</td>';
       }
       $sError .= '</tr>';
       $sError .= '</table>';

       return $sError;
   }

   function Formata_Campos_Crit($Campos_Crit, $table = false) 
   {
       $Campos_Crit = array_unique($Campos_Crit);

       if (!$table)
       {
           return $this->Ini->Nm_lang['lang_errm_flds'] . ' ' . implode('; ', $Campos_Crit);
       }

       $aCols  = array();
       $iTotal = sizeof($Campos_Crit);
       $iCols  = 6 > $iTotal ? 1 : (11 > $iTotal ? 2 : (16 > $iTotal ? 3 : 4));
       $iItems = ceil($iTotal / $iCols);
       $iNowC  = 0;
       $iNowI  = 0;

       foreach ($Campos_Crit as $campo)
       {
           $aCols[$iNowC][] = $campo;
           if ($iItems == ++$iNowI)
           {
               $iNowC++;
               $iNowI = 0;
           }
       }

       $sError  = '<table style="border-collapse: collapse; border-width: 0px">';
       $sError .= '<tr>';
       $sError .= '<td class="scFormErrorMessageFont" style="padding: 0; vertical-align: top; white-space: nowrap">' . $this->Ini->Nm_lang['lang_errm_flds'] . '</td>';
       foreach ($aCols as $aCol)
       {
           $sError .= '<td class="scFormErrorMessageFont" style="padding: 0 6px; vertical-align: top; white-space: nowrap">' . implode('<br />', $aCol) . '</td>';
       }
       $sError .= '</tr>';
       $sError .= '</table>';

       return $sError;
   }

   function Formata_Campos_Erros($Campos_Erros) 
   {
       $sError  = '<table style="border-collapse: collapse; border-width: 0px">';

       foreach ($Campos_Erros as $campo => $erros)
       {
           $sError .= '<tr>';
           $sError .= '<td class="scFormErrorMessageFont" style="padding: 0; vertical-align: top; white-space: nowrap">' . $this->Recupera_Nome_Campo($campo) . ':</td>';
           $sError .= '<td class="scFormErrorMessageFont" style="padding: 0 6px; vertical-align: top; white-space: nowrap">' . implode('<br />', array_unique($erros)) . '</td>';
           $sError .= '</tr>';
       }

       $sError .= '</table>';

       return $sError;
   }

   function Formata_Campos_Erros_SweetAlert($Campos_Erros) 
   {
       $sError  = '';

       foreach ($Campos_Erros as $campo => $erros)
       {
           $sError .= $this->Recupera_Nome_Campo($campo) . ': ' . implode('<br />', array_unique($erros)) . '<br />';
       }

       return $sError;
   }

   function Recupera_Nome_Campo($campo) 
   {
       switch($campo)
       {
           case 'cod_device_':
               return "Cod Device";
               break;
           case 'device_name_':
               return "Device Name";
               break;
           case 'ledstripe1_':
               return "Ledstripe 1";
               break;
           case 'ledstripe2_':
               return "Ledstripe 2";
               break;
           case 'ledstripe3_':
               return "Ledstripe 3";
               break;
           case 'ledstripe4_':
               return "Ledstripe 4";
               break;
           case 'color_':
               return "Color";
               break;
           case 'cod_activo_':
               return "Cod Activo";
               break;
           case 'cod_grupo_':
               return "Cod Grupo";
               break;
           case 'activa_':
               return "Activa";
               break;
           case 'estado_':
               return "Estado";
               break;
           case 'ult_rfid_':
               return "Ult Rfid";
               break;
           case 'ult_fecha_':
               return "Ult Fecha";
               break;
           case 'valor_default_':
               return "Valor Default";
               break;
           case 'acepta_tiempo_':
               return "Acepta Tiempo";
               break;
           case 'acepta_tokens_':
               return "Acepta Tokens";
               break;
           case 'dev_ip_':
               return "Dev Ip";
               break;
           case 'tipo_dev_':
               return "Tipo Dev";
               break;
           case 'direccion_torno_':
               return "Direccion Torno";
               break;
           case 'timeout_rfid_':
               return "Timeout Rfid";
               break;
           case 'discapacitado_':
               return "Discapacitado";
               break;
           case 'numcaja_':
               return "Numcaja";
               break;
           case 'empleado_':
               return "Empleado";
               break;
           case 'tokens_':
               return "Tokens";
               break;
           case 'serialrfid_':
               return "Serialrfid";
               break;
           case 'bidireccion_':
               return "Bidireccion";
               break;
           case 'cod_devicee_':
               return "Cod Device E";
               break;
           case 'url_1_':
               return "Url 1";
               break;
           case 'url_2_':
               return "Url 2";
               break;
           case 'url_3_':
               return "Url 3";
               break;
           case 'foto1_':
               return "Foto 1";
               break;
           case 'foto2_':
               return "Foto 2";
               break;
           case 'foto3_':
               return "Foto 3";
               break;
           case 'pin_relay1_':
               return "Pin Relay 1";
               break;
           case 'pin_relay2_':
               return "Pin Relay 2";
               break;
           case 'rfid_read_':
               return "Rfid Read";
               break;
           case 'rfid_estado_':
               return "Rfid Estado";
               break;
           case 'rfid_fecha_':
               return "Rfid Fecha";
               break;
           case 'url_accion_':
               return "Url Accion";
               break;
           case 'url_atraccion_':
               return "Url Atraccion";
               break;
           case 'uhfip_':
               return "Uhfip";
               break;
           case 'url_reader_':
               return "Url Reader";
               break;
           case 'cod_rfid900_':
               return "Cod Rfid 900";
               break;
           case 'mensaje_':
               return "Mensaje";
               break;
           case 'tipolector_':
               return "Tipolector";
               break;
           case 'url_accion_bg_':
               return "Url Accion Bg";
               break;
           case 'url_inicio_':
               return "Url Inicio";
               break;
           case 'lasteffect_':
               return "Lasteffect";
               break;
       }

       return $campo;
   }

   function dateDefaultFormat()
   {
       if (isset($this->Ini->Nm_conf_reg[$this->Ini->str_conf_reg]['data_format']))
       {
           $sDate = str_replace('yyyy', 'Y', $this->Ini->Nm_conf_reg[$this->Ini->str_conf_reg]['data_format']);
           $sDate = str_replace('mm',   'm', $sDate);
           $sDate = str_replace('dd',   'd', $sDate);
           return substr(chunk_split($sDate, 1, $this->Ini->Nm_conf_reg[$this->Ini->str_conf_reg]['data_sep']), 0, -1);
       }
       elseif ('en_us' == $this->Ini->str_lang)
       {
           return 'm/d/Y';
       }
       else
       {
           return 'd/m/Y';
       }
   } // dateDefaultFormat

//
//--------------------------------------------------------------------------------------
   function Valida_campos(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros, $filtro = '') 
   {
     global $nm_browser, $teste_validade, $sc_seq_vert;
     if (is_array($filtro) && empty($filtro)) {
         $filtro = '';
     }
//---------------------------------------------------------
     $this->sc_force_zero = array();
      if ((!is_array($filtro) && ('' == $filtro || 'cod_device_' == $filtro)) || (is_array($filtro) && in_array('cod_device_', $filtro)))
        $this->ValidateField_cod_device_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'device_name_' == $filtro)) || (is_array($filtro) && in_array('device_name_', $filtro)))
        $this->ValidateField_device_name_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'ledstripe1_' == $filtro)) || (is_array($filtro) && in_array('ledstripe1_', $filtro)))
        $this->ValidateField_ledstripe1_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'ledstripe2_' == $filtro)) || (is_array($filtro) && in_array('ledstripe2_', $filtro)))
        $this->ValidateField_ledstripe2_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'ledstripe3_' == $filtro)) || (is_array($filtro) && in_array('ledstripe3_', $filtro)))
        $this->ValidateField_ledstripe3_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'ledstripe4_' == $filtro)) || (is_array($filtro) && in_array('ledstripe4_', $filtro)))
        $this->ValidateField_ledstripe4_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'color_' == $filtro)) || (is_array($filtro) && in_array('color_', $filtro)))
        $this->ValidateField_color_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if (!empty($Campos_Crit) || !empty($Campos_Falta) || !empty($this->Campos_Mens_erro))
      {
          if (!empty($this->sc_force_zero))
          {
              foreach ($this->sc_force_zero as $i_force_zero => $sc_force_zero_field)
              {
                  eval('$this->' . $sc_force_zero_field . ' = "";');
                  unset($this->sc_force_zero[$i_force_zero]);
              }
          }
      }
   }

    function ValidateField_cod_device_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->cod_device_ === "" || is_null($this->cod_device_))  
      { 
          $this->cod_device_ = 0;
      } 
      nm_limpa_numero($this->cod_device_, $this->field_config['cod_device_']['symbol_grp']) ; 
      if ($this->nmgp_opcao == "incluir")
      { 
          if ($this->cod_device_ != '')  
          { 
              $iTestSize = 11;
              if (strlen($this->cod_device_) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Cod Device: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['cod_device_']))
                  {
                      $Campos_Erros['cod_device_'] = array();
                  }
                  $Campos_Erros['cod_device_'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['cod_device_']) || !is_array($this->NM_ajax_info['errList']['cod_device_']))
                  {
                      $this->NM_ajax_info['errList']['cod_device_'] = array();
                  }
                  $this->NM_ajax_info['errList']['cod_device_'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->cod_device_, 11, 0, 0, 0, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Cod Device; " ; 
                  if (!isset($Campos_Erros['cod_device_']))
                  {
                      $Campos_Erros['cod_device_'] = array();
                  }
                  $Campos_Erros['cod_device_'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['cod_device_']) || !is_array($this->NM_ajax_info['errList']['cod_device_']))
                  {
                      $this->NM_ajax_info['errList']['cod_device_'] = array();
                  }
                  $this->NM_ajax_info['errList']['cod_device_'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'cod_device_';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_cod_device_

    function ValidateField_device_name_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao == "incluir")
      { 
          if (NM_utf8_strlen($this->device_name_) > 150) 
          { 
              $hasError = true;
              $Campos_Crit .= "Device Name " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 150 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['device_name_']))
              {
                  $Campos_Erros['device_name_'] = array();
              }
              $Campos_Erros['device_name_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 150 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['device_name_']) || !is_array($this->NM_ajax_info['errList']['device_name_']))
              {
                  $this->NM_ajax_info['errList']['device_name_'] = array();
              }
              $this->NM_ajax_info['errList']['device_name_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 150 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'device_name_';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_device_name_

    function ValidateField_ledstripe1_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
               if (!empty($this->ledstripe1_) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['Lookup_ledstripe1_']) && !in_array($this->ledstripe1_, $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['Lookup_ledstripe1_']))
               {
                   $hasError = true;
                   $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($Campos_Erros['ledstripe1_']))
                   {
                       $Campos_Erros['ledstripe1_'] = array();
                   }
                   $Campos_Erros['ledstripe1_'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($this->NM_ajax_info['errList']['ledstripe1_']) || !is_array($this->NM_ajax_info['errList']['ledstripe1_']))
                   {
                       $this->NM_ajax_info['errList']['ledstripe1_'] = array();
                   }
                   $this->NM_ajax_info['errList']['ledstripe1_'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
               }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'ledstripe1_';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_ledstripe1_

    function ValidateField_ledstripe2_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->ledstripe2_) > 45) 
          { 
              $hasError = true;
              $Campos_Crit .= "Ledstripe 2 " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 45 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['ledstripe2_']))
              {
                  $Campos_Erros['ledstripe2_'] = array();
              }
              $Campos_Erros['ledstripe2_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 45 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['ledstripe2_']) || !is_array($this->NM_ajax_info['errList']['ledstripe2_']))
              {
                  $this->NM_ajax_info['errList']['ledstripe2_'] = array();
              }
              $this->NM_ajax_info['errList']['ledstripe2_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 45 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'ledstripe2_';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_ledstripe2_

    function ValidateField_ledstripe3_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->ledstripe3_) > 45) 
          { 
              $hasError = true;
              $Campos_Crit .= "Ledstripe 3 " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 45 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['ledstripe3_']))
              {
                  $Campos_Erros['ledstripe3_'] = array();
              }
              $Campos_Erros['ledstripe3_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 45 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['ledstripe3_']) || !is_array($this->NM_ajax_info['errList']['ledstripe3_']))
              {
                  $this->NM_ajax_info['errList']['ledstripe3_'] = array();
              }
              $this->NM_ajax_info['errList']['ledstripe3_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 45 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'ledstripe3_';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_ledstripe3_

    function ValidateField_ledstripe4_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->ledstripe4_) > 45) 
          { 
              $hasError = true;
              $Campos_Crit .= "Ledstripe 4 " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 45 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['ledstripe4_']))
              {
                  $Campos_Erros['ledstripe4_'] = array();
              }
              $Campos_Erros['ledstripe4_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 45 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['ledstripe4_']) || !is_array($this->NM_ajax_info['errList']['ledstripe4_']))
              {
                  $this->NM_ajax_info['errList']['ledstripe4_'] = array();
              }
              $this->NM_ajax_info['errList']['ledstripe4_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 45 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'ledstripe4_';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_ledstripe4_

    function ValidateField_color_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->color_) > 45) 
          { 
              $hasError = true;
              $Campos_Crit .= "Color " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 45 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['color_']))
              {
                  $Campos_Erros['color_'] = array();
              }
              $Campos_Erros['color_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 45 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['color_']) || !is_array($this->NM_ajax_info['errList']['color_']))
              {
                  $this->NM_ajax_info['errList']['color_'] = array();
              }
              $this->NM_ajax_info['errList']['color_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 45 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'color_';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_color_

    function removeDuplicateDttmError($aErrDate, &$aErrTime)
    {
        if (empty($aErrDate) || empty($aErrTime))
        {
            return;
        }

        foreach ($aErrDate as $sErrDate)
        {
            foreach ($aErrTime as $iErrTime => $sErrTime)
            {
                if ($sErrDate == $sErrTime)
                {
                    unset($aErrTime[$iErrTime]);
                }
            }
        }
    } // removeDuplicateDttmError

   function nm_guardar_campos()
   {
    global
           $sc_seq_vert;
    $this->nmgp_dados_form['cod_device_'] = $this->cod_device_;
    $this->nmgp_dados_form['device_name_'] = $this->device_name_;
    $this->nmgp_dados_form['ledstripe1_'] = $this->ledstripe1_;
    $this->nmgp_dados_form['ledstripe2_'] = $this->ledstripe2_;
    $this->nmgp_dados_form['ledstripe3_'] = $this->ledstripe3_;
    $this->nmgp_dados_form['ledstripe4_'] = $this->ledstripe4_;
    $this->nmgp_dados_form['color_'] = $this->color_;
    $this->nmgp_dados_form['cod_activo_'] = $this->cod_activo_;
    $this->nmgp_dados_form['cod_grupo_'] = $this->cod_grupo_;
    $this->nmgp_dados_form['activa_'] = $this->activa_;
    $this->nmgp_dados_form['estado_'] = $this->estado_;
    $this->nmgp_dados_form['ult_rfid_'] = $this->ult_rfid_;
    $this->nmgp_dados_form['ult_fecha_'] = $this->ult_fecha_;
    $this->nmgp_dados_form['valor_default_'] = $this->valor_default_;
    $this->nmgp_dados_form['acepta_tiempo_'] = $this->acepta_tiempo_;
    $this->nmgp_dados_form['acepta_tokens_'] = $this->acepta_tokens_;
    $this->nmgp_dados_form['dev_ip_'] = $this->dev_ip_;
    $this->nmgp_dados_form['tipo_dev_'] = $this->tipo_dev_;
    $this->nmgp_dados_form['direccion_torno_'] = $this->direccion_torno_;
    $this->nmgp_dados_form['timeout_rfid_'] = $this->timeout_rfid_;
    $this->nmgp_dados_form['discapacitado_'] = $this->discapacitado_;
    $this->nmgp_dados_form['numcaja_'] = $this->numcaja_;
    $this->nmgp_dados_form['empleado_'] = $this->empleado_;
    $this->nmgp_dados_form['tokens_'] = $this->tokens_;
    $this->nmgp_dados_form['serialrfid_'] = $this->serialrfid_;
    $this->nmgp_dados_form['bidireccion_'] = $this->bidireccion_;
    $this->nmgp_dados_form['cod_devicee_'] = $this->cod_devicee_;
    $this->nmgp_dados_form['url_1_'] = $this->url_1_;
    $this->nmgp_dados_form['url_2_'] = $this->url_2_;
    $this->nmgp_dados_form['url_3_'] = $this->url_3_;
    $this->nmgp_dados_form['foto1_'] = $this->foto1_;
    $this->nmgp_dados_form['foto1__limpa'] = $this->foto1__limpa;
    $this->nmgp_dados_form['foto2_'] = $this->foto2_;
    $this->nmgp_dados_form['foto2__limpa'] = $this->foto2__limpa;
    $this->nmgp_dados_form['foto3_'] = $this->foto3_;
    $this->nmgp_dados_form['foto3__limpa'] = $this->foto3__limpa;
    $this->nmgp_dados_form['pin_relay1_'] = $this->pin_relay1_;
    $this->nmgp_dados_form['pin_relay2_'] = $this->pin_relay2_;
    $this->nmgp_dados_form['rfid_read_'] = $this->rfid_read_;
    $this->nmgp_dados_form['rfid_estado_'] = $this->rfid_estado_;
    $this->nmgp_dados_form['rfid_fecha_'] = $this->rfid_fecha_;
    $this->nmgp_dados_form['url_accion_'] = $this->url_accion_;
    $this->nmgp_dados_form['url_atraccion_'] = $this->url_atraccion_;
    $this->nmgp_dados_form['uhfip_'] = $this->uhfip_;
    $this->nmgp_dados_form['url_reader_'] = $this->url_reader_;
    $this->nmgp_dados_form['cod_rfid900_'] = $this->cod_rfid900_;
    $this->nmgp_dados_form['mensaje_'] = $this->mensaje_;
    $this->nmgp_dados_form['tipolector_'] = $this->tipolector_;
    $this->nmgp_dados_form['url_accion_bg_'] = $this->url_accion_bg_;
    $this->nmgp_dados_form['url_inicio_'] = $this->url_inicio_;
    $this->nmgp_dados_form['lasteffect_'] = $this->lasteffect_;
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['dados_form'][$sc_seq_vert] = $this->nmgp_dados_form;
   }
   function nm_tira_formatacao()
   {
      global $nm_form_submit;
         $this->Before_unformat = array();
         $this->formatado = false;
      $this->Before_unformat['cod_device_'] = $this->cod_device_;
      nm_limpa_numero($this->cod_device_, $this->field_config['cod_device_']['symbol_grp']) ; 
      $this->Before_unformat['activa_'] = $this->activa_;
      nm_limpa_numero($this->activa_, $this->field_config['activa_']['symbol_grp']) ; 
      $this->Before_unformat['estado_'] = $this->estado_;
      nm_limpa_numero($this->estado_, $this->field_config['estado_']['symbol_grp']) ; 
      $this->Before_unformat['ult_fecha_'] = $this->ult_fecha_;
      $this->Before_unformat['ult_fecha__hora'] = $this->ult_fecha__hora;
      nm_limpa_data($this->ult_fecha_, $this->field_config['ult_fecha_']['date_sep']) ; 
      nm_limpa_hora($this->ult_fecha__hora, $this->field_config['ult_fecha_']['time_sep']) ; 
      $this->Before_unformat['valor_default_'] = $this->valor_default_;
      if (!empty($this->field_config['valor_default_']['symbol_dec']))
      {
         $this->sc_remove_currency($this->valor_default_, $this->field_config['valor_default_']['symbol_dec'], $this->field_config['valor_default_']['symbol_grp'], $this->field_config['valor_default_']['symbol_mon']);
         nm_limpa_valor($this->valor_default_, $this->field_config['valor_default_']['symbol_dec'], $this->field_config['valor_default_']['symbol_grp']);
      }
      $this->Before_unformat['acepta_tiempo_'] = $this->acepta_tiempo_;
      nm_limpa_numero($this->acepta_tiempo_, $this->field_config['acepta_tiempo_']['symbol_grp']) ; 
      $this->Before_unformat['acepta_tokens_'] = $this->acepta_tokens_;
      nm_limpa_numero($this->acepta_tokens_, $this->field_config['acepta_tokens_']['symbol_grp']) ; 
      $this->Before_unformat['tipo_dev_'] = $this->tipo_dev_;
      nm_limpa_numero($this->tipo_dev_, $this->field_config['tipo_dev_']['symbol_grp']) ; 
      $this->Before_unformat['direccion_torno_'] = $this->direccion_torno_;
      nm_limpa_numero($this->direccion_torno_, $this->field_config['direccion_torno_']['symbol_grp']) ; 
      $this->Before_unformat['timeout_rfid_'] = $this->timeout_rfid_;
      nm_limpa_numero($this->timeout_rfid_, $this->field_config['timeout_rfid_']['symbol_grp']) ; 
      $this->Before_unformat['discapacitado_'] = $this->discapacitado_;
      nm_limpa_numero($this->discapacitado_, $this->field_config['discapacitado_']['symbol_grp']) ; 
      $this->Before_unformat['numcaja_'] = $this->numcaja_;
      nm_limpa_numero($this->numcaja_, $this->field_config['numcaja_']['symbol_grp']) ; 
      $this->Before_unformat['empleado_'] = $this->empleado_;
      nm_limpa_numero($this->empleado_, $this->field_config['empleado_']['symbol_grp']) ; 
      $this->Before_unformat['tokens_'] = $this->tokens_;
      if (!empty($this->field_config['tokens_']['symbol_dec']))
      {
         $this->sc_remove_currency($this->tokens_, $this->field_config['tokens_']['symbol_dec'], $this->field_config['tokens_']['symbol_grp'], $this->field_config['tokens_']['symbol_mon']);
         nm_limpa_valor($this->tokens_, $this->field_config['tokens_']['symbol_dec'], $this->field_config['tokens_']['symbol_grp']);
      }
      $this->Before_unformat['bidireccion_'] = $this->bidireccion_;
      nm_limpa_numero($this->bidireccion_, $this->field_config['bidireccion_']['symbol_grp']) ; 
      $this->Before_unformat['cod_devicee_'] = $this->cod_devicee_;
      nm_limpa_numero($this->cod_devicee_, $this->field_config['cod_devicee_']['symbol_grp']) ; 
      $this->Before_unformat['pin_relay1_'] = $this->pin_relay1_;
      nm_limpa_numero($this->pin_relay1_, $this->field_config['pin_relay1_']['symbol_grp']) ; 
      $this->Before_unformat['pin_relay2_'] = $this->pin_relay2_;
      nm_limpa_numero($this->pin_relay2_, $this->field_config['pin_relay2_']['symbol_grp']) ; 
      $this->Before_unformat['rfid_estado_'] = $this->rfid_estado_;
      nm_limpa_numero($this->rfid_estado_, $this->field_config['rfid_estado_']['symbol_grp']) ; 
      $this->Before_unformat['rfid_fecha_'] = $this->rfid_fecha_;
      $this->Before_unformat['rfid_fecha__hora'] = $this->rfid_fecha__hora;
      nm_limpa_data($this->rfid_fecha_, $this->field_config['rfid_fecha_']['date_sep']) ; 
      nm_limpa_hora($this->rfid_fecha__hora, $this->field_config['rfid_fecha_']['time_sep']) ; 
   }
   function sc_add_currency(&$value, $symbol, $pos)
   {
       if ('' == $value)
       {
           return;
       }
       $value = (1 == $pos || 3 == $pos) ? $symbol . ' ' . $value : $value . ' ' . $symbol;
   }
   function sc_remove_currency(&$value, $symbol_dec, $symbol_tho, $symbol_mon)
   {
       $value = preg_replace('~&#x0*([0-9a-f]+);~i', '', $value);
       $sNew  = str_replace($symbol_mon, '', $value);
       if ($sNew != $value)
       {
           $value = str_replace(' ', '', $sNew);
           return;
       }
       $aTest = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9', '-', $symbol_dec, $symbol_tho);
       $sNew  = '';
       for ($i = 0; $i < strlen($value); $i++)
       {
           if ($this->sc_test_currency_char($value[$i], $aTest))
           {
               $sNew .= $value[$i];
           }
       }
       $value = $sNew;
   }
   function sc_test_currency_char($char, $test)
   {
       $found = false;
       foreach ($test as $test_char)
       {
           if ($char === $test_char)
           {
               $found = true;
           }
       }
       return $found;
   }
   function nm_clear_val($Nome_Campo)
   {
      if ($Nome_Campo == "cod_device_")
      {
          nm_limpa_numero($this->cod_device_, $this->field_config['cod_device_']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "activa_")
      {
          nm_limpa_numero($this->activa_, $this->field_config['activa_']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "estado_")
      {
          nm_limpa_numero($this->estado_, $this->field_config['estado_']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "valor_default_")
      {
          if (!empty($this->field_config['valor_default_']['symbol_dec']))
          {
             $this->sc_remove_currency($this->valor_default_, $this->field_config['valor_default_']['symbol_dec'], $this->field_config['valor_default_']['symbol_grp'], $this->field_config['valor_default_']['symbol_mon']);
             nm_limpa_valor($this->valor_default_, $this->field_config['valor_default_']['symbol_dec'], $this->field_config['valor_default_']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "acepta_tiempo_")
      {
          nm_limpa_numero($this->acepta_tiempo_, $this->field_config['acepta_tiempo_']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "acepta_tokens_")
      {
          nm_limpa_numero($this->acepta_tokens_, $this->field_config['acepta_tokens_']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "tipo_dev_")
      {
          nm_limpa_numero($this->tipo_dev_, $this->field_config['tipo_dev_']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "direccion_torno_")
      {
          nm_limpa_numero($this->direccion_torno_, $this->field_config['direccion_torno_']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "timeout_rfid_")
      {
          nm_limpa_numero($this->timeout_rfid_, $this->field_config['timeout_rfid_']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "discapacitado_")
      {
          nm_limpa_numero($this->discapacitado_, $this->field_config['discapacitado_']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "numcaja_")
      {
          nm_limpa_numero($this->numcaja_, $this->field_config['numcaja_']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "empleado_")
      {
          nm_limpa_numero($this->empleado_, $this->field_config['empleado_']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "tokens_")
      {
          if (!empty($this->field_config['tokens_']['symbol_dec']))
          {
             $this->sc_remove_currency($this->tokens_, $this->field_config['tokens_']['symbol_dec'], $this->field_config['tokens_']['symbol_grp'], $this->field_config['tokens_']['symbol_mon']);
             nm_limpa_valor($this->tokens_, $this->field_config['tokens_']['symbol_dec'], $this->field_config['tokens_']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "bidireccion_")
      {
          nm_limpa_numero($this->bidireccion_, $this->field_config['bidireccion_']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "cod_devicee_")
      {
          nm_limpa_numero($this->cod_devicee_, $this->field_config['cod_devicee_']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "pin_relay1_")
      {
          nm_limpa_numero($this->pin_relay1_, $this->field_config['pin_relay1_']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "pin_relay2_")
      {
          nm_limpa_numero($this->pin_relay2_, $this->field_config['pin_relay2_']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "rfid_estado_")
      {
          nm_limpa_numero($this->rfid_estado_, $this->field_config['rfid_estado_']['symbol_grp']) ; 
      }
   }
   function nm_formatar_campos($format_fields = array())
   {
      global $nm_form_submit;
      if ('' !== $this->cod_device_ || (!empty($format_fields) && isset($format_fields['cod_device_'])))
      {
          nmgp_Form_Num_Val($this->cod_device_, $this->field_config['cod_device_']['symbol_grp'], $this->field_config['cod_device_']['symbol_dec'], "0", "S", $this->field_config['cod_device_']['format_neg'], "", "", "-", $this->field_config['cod_device_']['symbol_fmt']) ; 
      }
   }
   function nm_gera_mask(&$nm_campo, $nm_mask)
   { 
      $trab_campo = $nm_campo;
      $trab_mask  = $nm_mask;
      $tam_campo  = strlen($nm_campo);
      $trab_saida = "";

      if (false !== strpos($nm_mask, '9') || false !== strpos($nm_mask, 'a') || false !== strpos($nm_mask, '*'))
      {
          $new_campo = '';
          $a_mask_ord  = array();
          $i_mask_size = -1;

          foreach (explode(';', $nm_mask) as $str_mask)
          {
              $a_mask_ord[ $this->nm_conta_mask_chars($str_mask) ] = $str_mask;
          }
          ksort($a_mask_ord);

          foreach ($a_mask_ord as $i_size => $s_mask)
          {
              if (-1 == $i_mask_size)
              {
                  $i_mask_size = $i_size;
              }
              elseif (strlen($nm_campo) >= $i_size && strlen($nm_campo) > $i_mask_size)
              {
                  $i_mask_size = $i_size;
              }
          }
          $nm_mask = $a_mask_ord[$i_mask_size];

          for ($i = 0; $i < strlen($nm_mask); $i++)
          {
              $test_mask = substr($nm_mask, $i, 1);
              
              if ('9' == $test_mask || 'a' == $test_mask || '*' == $test_mask)
              {
                  $new_campo .= substr($nm_campo, 0, 1);
                  $nm_campo   = substr($nm_campo, 1);
              }
              else
              {
                  $new_campo .= $test_mask;
              }
          }

                  $nm_campo = $new_campo;

          return;
      }

      $mask_num = false;
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
              if ($cont1 < $cont2 && $tam_campo <= $cont2 && $tam_campo > $cont1)
              {
                  $trab_mask = $ver_duas[1];
              }
              elseif ($cont1 > $cont2 && $tam_campo <= $cont2)
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
          $nm_campo = $trab_saida;
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
      $nm_campo = $trab_saida;
   } 
   function nm_conta_mask_chars($sMask)
   {
       $iLength = 0;

       for ($i = 0; $i < strlen($sMask); $i++)
       {
           if (in_array($sMask[$i], array('9', 'a', '*')))
           {
               $iLength++;
           }
       }

       return $iLength;
   }
   function nm_tira_mask(&$nm_campo, $nm_mask, $nm_chars = '')
   { 
      $mask_dados = $nm_campo;
      $trab_mask  = $nm_mask;
      $tam_campo  = strlen($nm_campo);
      $tam_mask   = strlen($nm_mask);
      $trab_saida = "";

      if (false !== strpos($nm_mask, '9') || false !== strpos($nm_mask, 'a') || false !== strpos($nm_mask, '*'))
      {
          $raw_campo = $this->sc_clear_mask($nm_campo, $nm_chars);
          $raw_mask  = $this->sc_clear_mask($nm_mask, $nm_chars);
          $new_campo = '';

          $test_mask = substr($raw_mask, 0, 1);
          $raw_mask  = substr($raw_mask, 1);

          while ('' != $raw_campo)
          {
              $test_val  = substr($raw_campo, 0, 1);
              $raw_campo = substr($raw_campo, 1);
              $ord       = ord($test_val);
              $found     = false;

              switch ($test_mask)
              {
                  case '9':
                      if (48 <= $ord && 57 >= $ord)
                      {
                          $new_campo .= $test_val;
                          $found      = true;
                      }
                      break;

                  case 'a':
                      if ((65 <= $ord && 90 >= $ord) || (97 <= $ord && 122 >= $ord))
                      {
                          $new_campo .= $test_val;
                          $found      = true;
                      }
                      break;

                  case '*':
                      if ((48 <= $ord && 57 >= $ord) || (65 <= $ord && 90 >= $ord) || (97 <= $ord && 122 >= $ord))
                      {
                          $new_campo .= $test_val;
                          $found      = true;
                      }
                      break;
              }

              if ($found)
              {
                  $test_mask = substr($raw_mask, 0, 1);
                  $raw_mask  = substr($raw_mask, 1);
              }
          }

          $nm_campo = $new_campo;

          return;
      }

      $mask_num = false;
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
          for ($x=0; $x < strlen($mask_dados); $x++)
          {
              if (is_numeric(substr($mask_dados, $x, 1)))
              {
                  $trab_saida .= substr($mask_dados, $x, 1);
              }
          }
          $nm_campo = $trab_saida;
          return;
      }
      if ($tam_mask > $tam_campo)
      {
         $mask_desfaz = "";
         for ($mask_ind = 0; $tam_mask > $tam_campo; $mask_ind++)
         {
              $mask_char = substr($trab_mask, $mask_ind, 1);
              if ($mask_char == "z")
              {
                  $tam_mask--;
              }
              else
              {
                  $mask_desfaz .= $mask_char;
              }
              if ($mask_ind == $tam_campo)
              {
                  $tam_mask = $tam_campo;
              }
         }
         $trab_mask = $mask_desfaz . substr($trab_mask, $mask_ind);
      }
      $mask_saida = "";
      for ($mask_ind = strlen($trab_mask); $mask_ind > 0; $mask_ind--)
      {
          $mask_char = substr($trab_mask, $mask_ind - 1, 1);
          if ($mask_char == "x" || $mask_char == "z")
          {
              if ($tam_campo > 0)
              {
                  $mask_saida = substr($mask_dados, $tam_campo - 1, 1) . $mask_saida;
              }
          }
          else
          {
              if ($mask_char != substr($mask_dados, $tam_campo - 1, 1) && $tam_campo > 0)
              {
                  $mask_saida = substr($mask_dados, $tam_campo - 1, 1) . $mask_saida;
                  $mask_ind--;
              }
          }
          $tam_campo--;
      }
      if ($tam_campo > 0)
      {
         $mask_saida = substr($mask_dados, 0, $tam_campo) . $mask_saida;
      }
      $nm_campo = $mask_saida;
   }

   function sc_clear_mask($value, $chars)
   {
       $new = '';

       for ($i = 0; $i < strlen($value); $i++)
       {
           if (false === strpos($chars, $value[$i]))
           {
               $new .= $value[$i];
           }
       }

       return $new;
   }
//
   function nm_limpa_alfa(&$str)
   {
   }
   function nm_conv_data_db($dt_in, $form_in, $form_out, $replaces = array())
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
           nm_conv_form_data($dt_out, $form_in, $form_out, $replaces);
           return $dt_out;
       }
   }

   function returnWhere($aCond, $sOp = 'AND')
   {
       $aWhere = array();
       foreach ($aCond as $sCond)
       {
           $this->handleWhereCond($sCond);
           if ('' != $sCond)
           {
               $aWhere[] = $sCond;
           }
       }
       if (empty($aWhere))
       {
           return '';
       }
       else
       {
           return ' WHERE (' . implode(') ' . $sOp . ' (', $aWhere) . ')';
       }
   } // returnWhere

   function handleWhereCond(&$sCond)
   {
       $sCond = trim($sCond);
       if ('where' == strtolower(substr($sCond, 0, 5)))
       {
           $sCond = trim(substr($sCond, 5));
       }
   } // handleWhereCond

   function ajax_return_values()
   {
          $this->ajax_return_values_all_vert();
          if ('navigate_form' == $this->NM_ajax_opcao)
          {
              $this->NM_ajax_info['clearUpload']      = 'S';
              $this->NM_ajax_info['navStatus']['ret'] = $this->Nav_permite_ret ? 'S' : 'N';
              $this->NM_ajax_info['navStatus']['ava'] = $this->Nav_permite_ava ? 'S' : 'N';
              $this->NM_ajax_info['fldList']['cod_device_']['keyVal'] = form_devices_leds_effects_pack_protect_string($this->nmgp_dados_form['cod_device_']);
          }
   } // ajax_return_values
   function ajax_return_values_all_vert()
   {
          if (isset($this->nmgp_refresh_fields) && isset($this->nmgp_refresh_row) && '' != $this->nmgp_refresh_row)
          {
              $this->form_vert_form_devices_leds_effects[$this->nmgp_refresh_row] = $this->NM_ajax_info['param'];
              if ((isset($this->Embutida_ronly) && $this->Embutida_ronly) || $this->NM_ajax_force_values)
              {
                  if (isset($this->NM_ajax_changed['cod_device_']) && $this->NM_ajax_changed['cod_device_'])
                  {
                      $this->form_vert_form_devices_leds_effects[$this->nmgp_refresh_row]['cod_device_'] = $this->cod_device_;
                  }
                  if (isset($this->NM_ajax_changed['device_name_']) && $this->NM_ajax_changed['device_name_'])
                  {
                      $this->form_vert_form_devices_leds_effects[$this->nmgp_refresh_row]['device_name_'] = $this->device_name_;
                  }
                  if (isset($this->NM_ajax_changed['ledstripe1_']) && $this->NM_ajax_changed['ledstripe1_'])
                  {
                      $this->form_vert_form_devices_leds_effects[$this->nmgp_refresh_row]['ledstripe1_'] = $this->ledstripe1_;
                  }
                  if (isset($this->NM_ajax_changed['ledstripe2_']) && $this->NM_ajax_changed['ledstripe2_'])
                  {
                      $this->form_vert_form_devices_leds_effects[$this->nmgp_refresh_row]['ledstripe2_'] = $this->ledstripe2_;
                  }
                  if (isset($this->NM_ajax_changed['ledstripe3_']) && $this->NM_ajax_changed['ledstripe3_'])
                  {
                      $this->form_vert_form_devices_leds_effects[$this->nmgp_refresh_row]['ledstripe3_'] = $this->ledstripe3_;
                  }
                  if (isset($this->NM_ajax_changed['ledstripe4_']) && $this->NM_ajax_changed['ledstripe4_'])
                  {
                      $this->form_vert_form_devices_leds_effects[$this->nmgp_refresh_row]['ledstripe4_'] = $this->ledstripe4_;
                  }
                  if (isset($this->NM_ajax_changed['color_']) && $this->NM_ajax_changed['color_'])
                  {
                      $this->form_vert_form_devices_leds_effects[$this->nmgp_refresh_row]['color_'] = $this->color_;
                  }
              }
          }
          if (isset($this->nmgp_refresh_row) && '' != $this->nmgp_refresh_row)
          {
              $this->form_vert_form_devices_leds_effects[$this->nmgp_refresh_row]['device_name_'] = $this->device_name_;
              $this->form_vert_form_devices_leds_effects[$this->nmgp_refresh_row]['ledstripe1_'] = $this->ledstripe1_;
              $this->form_vert_form_devices_leds_effects[$this->nmgp_refresh_row]['ledstripe2_'] = $this->ledstripe2_;
              $this->form_vert_form_devices_leds_effects[$this->nmgp_refresh_row]['ledstripe3_'] = $this->ledstripe3_;
              $this->form_vert_form_devices_leds_effects[$this->nmgp_refresh_row]['ledstripe4_'] = $this->ledstripe4_;
              $this->form_vert_form_devices_leds_effects[$this->nmgp_refresh_row]['color_'] = $this->color_;
          }
          $this->NM_ajax_info['rsSize']            = sizeof($this->form_vert_form_devices_leds_effects);
          $this->NM_ajax_info['buttonDisplayVert'] = array();
          foreach($this->form_vert_form_devices_leds_effects as $sc_seq_vert => $aRecData)
          {
              $this->loadRecordState($sc_seq_vert);
              if ('navigate_form' == $this->NM_ajax_opcao) {
                  $this->NM_ajax_info['buttonDisplayVert'][] = array(
                      'seq'      => $sc_seq_vert,
                      'gridView' => false,
                      'delete'   => $this->nmgp_botoes['delete'],
                      'update'   => $this->nmgp_botoes['update'],
                  );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("cod_device_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['cod_device_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['cod_device_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'label',
                       'valList' => array($sTmpValue),
                       );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("device_name_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['device_name_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['device_name_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'label',
                       'valList' => array($this->form_encode_input($sTmpValue)),
                       );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("ledstripe1_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['ledstripe1_']);
                  $aLookup = array();
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['Lookup_ledstripe1_']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['Lookup_ledstripe1_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['Lookup_ledstripe1_']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['Lookup_ledstripe1_'] = array(); 
}
$aLookup[] = array(form_devices_leds_effects_pack_protect_string('') => str_replace('<', '&lt;',form_devices_leds_effects_pack_protect_string(' ')));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['Lookup_ledstripe1_'][] = '';
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_cod_device_ = $this->cod_device_;
   $this->nm_tira_formatacao();


   $unformatted_value_cod_device_ = $this->cod_device_;

   $nm_comando = "SELECT comando, descrip  FROM ledeffects  ORDER BY descrip";

   $this->cod_device_ = $old_value_cod_device_;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $aLookup[] = array(form_devices_leds_effects_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', form_devices_leds_effects_pack_protect_string(NM_charset_to_utf8($rs->fields[0] . " - " . $rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[0] . " - " . $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['Lookup_ledstripe1_'][] = $rs->fields[0];
              $rs->MoveNext() ; 
       } 
       $rs->Close() ; 
   } 
   elseif ($GLOBALS["NM_ERRO_IBASE"] != 1 && $nm_comando != "")  
   {  
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit; 
   } 
   $GLOBALS["NM_ERRO_IBASE"] = 0; 
          $aLookupOrig = $aLookup;
          $sSelComp = "name=\"ledstripe1_\"";
          if (isset($this->NM_ajax_info['select_html']['ledstripe1_']) && !empty($this->NM_ajax_info['select_html']['ledstripe1_']))
          {
              eval("\$sSelComp = \"" . str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['ledstripe1_']) . "\";");
          }
          $sLookup = '';
          foreach ($aLookup as $aOption)
          {
              foreach ($aOption as $sValue => $sLabel)
              {
                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
                  $this->NM_ajax_info['fldList']['ledstripe1_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'select',
                       'valList' => array($sTmpValue),
               'optList' => $aLookup,
                       );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['ledstripe1_' . $sc_seq_vert]['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['ledstripe1_' . $sc_seq_vert]['valList'][$i] = form_devices_leds_effects_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['ledstripe1_' . $sc_seq_vert]['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['ledstripe1_' . $sc_seq_vert]['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['ledstripe1_' . $sc_seq_vert]['labList'] = $aLabel;
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("ledstripe2_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['ledstripe2_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['ledstripe2_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'text',
                       'valList' => array($this->form_encode_input($sTmpValue)),
                       );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("ledstripe3_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['ledstripe3_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['ledstripe3_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'text',
                       'valList' => array($this->form_encode_input($sTmpValue)),
                       );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("ledstripe4_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['ledstripe4_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['ledstripe4_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'text',
                       'valList' => array($this->form_encode_input($sTmpValue)),
                       );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("color_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['color_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['color_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'text',
                       'valList' => array($this->form_encode_input($sTmpValue)),
                       );
              }
          }
   }

    function fetchUniqueUploadName($originalName, $uploadDir, $fieldName)
    {
        $originalName = trim($originalName);
        if ('' == $originalName)
        {
            return $originalName;
        }
        if (!@is_dir($uploadDir))
        {
            return $originalName;
        }
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['upload_dir'][$fieldName]))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['upload_dir'][$fieldName] = array();
            $resDir = @opendir($uploadDir);
            if (!$resDir)
            {
                return $originalName;
            }
            while (false !== ($fileName = @readdir($resDir)))
            {
                if (@is_file($uploadDir . $fileName))
                {
                    $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['upload_dir'][$fieldName][] = $fileName;
                }
            }
            @closedir($resDir);
        }
        if (!in_array($originalName, $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['upload_dir'][$fieldName]))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['upload_dir'][$fieldName][] = $originalName;
            return $originalName;
        }
        else
        {
            $newName = $this->fetchFileNextName($originalName, $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['upload_dir'][$fieldName]);
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['upload_dir'][$fieldName][] = $newName;
            return $newName;
        }
    } // fetchUniqueUploadName

    function fetchFileNextName($uniqueName, $uniqueList)
    {
        $aPathinfo     = pathinfo($uniqueName);
        $fileExtension = $aPathinfo['extension'];
        $fileName      = $aPathinfo['filename'];
        $foundName     = false;
        $nameIt        = 1;
        if ('' != $fileExtension)
        {
            $fileExtension = '.' . $fileExtension;
        }
        while (!$foundName)
        {
            $testName = $fileName . '(' . $nameIt . ')' . $fileExtension;
            if (in_array($testName, $uniqueList))
            {
                $nameIt++;
            }
            else
            {
                $foundName = true;
                return $testName;
            }
        }
    } // fetchFileNextName

   function ajax_add_parameters()
   {
   } // ajax_add_parameters
  function nm_proc_onload_record($sc_seq_vert=0)
  {
      if ($this->sc_evento == "novo" || $this->sc_evento == "incluir" || ($this->nmgp_opcao == "nada" && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['opc_ant']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['opc_ant'] == "novo"))
      {
          if (!isset($this->nmgp_cmp_hidden["ledstripe1_"]))
          {
              $this->nmgp_cmp_hidden["ledstripe1_"] = "off"; $this->NM_ajax_info['fieldDisplay']['ledstripe1_'] = 'off';
          }
          if (!isset($this->nmgp_cmp_hidden["ledstripe2_"]))
          {
              $this->nmgp_cmp_hidden["ledstripe2_"] = "off"; $this->NM_ajax_info['fieldDisplay']['ledstripe2_'] = 'off';
          }
          if (!isset($this->nmgp_cmp_hidden["ledstripe3_"]))
          {
              $this->nmgp_cmp_hidden["ledstripe3_"] = "off"; $this->NM_ajax_info['fieldDisplay']['ledstripe3_'] = 'off';
          }
          if (!isset($this->nmgp_cmp_hidden["ledstripe4_"]))
          {
              $this->nmgp_cmp_hidden["ledstripe4_"] = "off"; $this->NM_ajax_info['fieldDisplay']['ledstripe4_'] = 'off';
          }
          if (!isset($this->nmgp_cmp_hidden["color_"]))
          {
              $this->nmgp_cmp_hidden["color_"] = "off"; $this->NM_ajax_info['fieldDisplay']['color_'] = 'off';
          }
      }
      else
      {
      }
  }
  function nm_proc_onload($bFormat = true)
  {
      $this->nm_guardar_campos();
      if ($bFormat) $this->nm_formatar_campos();
  }
//
//----------------------------------------------------
//-----> 
//----------------------------------------------------
//
   function nm_troca_decimal($sc_parm1, $sc_parm2) 
   { 
      $this->valor_default_ = str_replace($sc_parm1, $sc_parm2, $this->valor_default_); 
      $this->tokens_ = str_replace($sc_parm1, $sc_parm2, $this->tokens_); 
   } 
   function nm_poe_aspas_decimal() 
   { 
      $this->valor_default_ = "'" . $this->valor_default_ . "'";
      $this->tokens_ = "'" . $this->tokens_ . "'";
   } 
   function nm_tira_aspas_decimal() 
   { 
      $this->valor_default_ = str_replace("'", "", $this->valor_default_); 
      $this->tokens_ = str_replace("'", "", $this->tokens_); 
   } 
//----------- 


   function temRegistros($sWhere)
   {
       if ('' == $sWhere)
       {
           return false;
       }
       $nmgp_sel_count = 'SELECT COUNT(*) AS countTest FROM ' . $this->Ini->nm_tabela . ' WHERE ' . $sWhere;
       $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_sel_count; 
       $rsc = $this->Db->Execute($nmgp_sel_count); 
       if ($rsc === false && !$rsc->EOF)
       {
           $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg());
           exit; 
       }
       $iTotal = $rsc->fields[0];
       $rsc->Close();
       return 0 < $iTotal;
   } // temRegistros

   function deletaRegistros($sWhere)
   {
       if ('' == $sWhere)
       {
           return false;
       }
       $nmgp_sel_count = 'DELETE FROM ' . $this->Ini->nm_tabela . ' WHERE ' . $sWhere;
       $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_sel_count; 
       $rsc = $this->Db->Execute($nmgp_sel_count); 
       $bResult = $rsc;
       $rsc->Close();
       return $bResult == true;
   } // deletaRegistros
    function handleDbErrorMessage(&$dbErrorMessage, $dbErrorCode)
    {
        if (1267 == $dbErrorCode) {
            $dbErrorMessage = $this->Ini->Nm_lang['lang_errm_db_invalid_collation'];
        }
    }


   function nm_acessa_banco() 
   { 
      global $sc_seq_vert,  $nm_form_submit, $teste_validade, $sc_where;
 
      $NM_val_null = array();
      $NM_val_form = array();
      $this->sc_erro_insert = "";
      $this->sc_erro_update = "";
      $this->sc_erro_delete = "";
      if (!empty($this->sc_force_zero))
      {
          foreach ($this->sc_force_zero as $i_force_zero => $sc_force_zero_field)
          {
              eval('if ($this->' . $sc_force_zero_field . ' == 0) {$this->' . $sc_force_zero_field . ' = "";}');
          }
      }
      $this->sc_force_zero = array();
      if ($this->nmgp_opcao == "alterar")
      {
          $this->nmgp_dados_select = $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['dados_select'][$sc_seq_vert];
          if ($this->nmgp_dados_select['cod_device_'] == $this->cod_device_ &&
              $this->nmgp_dados_select['device_name_'] == $this->device_name_ &&
              $this->nmgp_dados_select['ledstripe1_'] == $this->ledstripe1_ &&
              $this->nmgp_dados_select['ledstripe2_'] == $this->ledstripe2_ &&
              $this->nmgp_dados_select['ledstripe3_'] == $this->ledstripe3_ &&
              $this->nmgp_dados_select['ledstripe4_'] == $this->ledstripe4_ &&
              $this->nmgp_dados_select['color_'] == $this->color_)
          { }
          else
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['dados_select'][$sc_seq_vert]['cod_device_'] = $this->cod_device_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['dados_select'][$sc_seq_vert]['device_name_'] = $this->device_name_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['dados_select'][$sc_seq_vert]['ledstripe1_'] = $this->ledstripe1_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['dados_select'][$sc_seq_vert]['ledstripe2_'] = $this->ledstripe2_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['dados_select'][$sc_seq_vert]['ledstripe3_'] = $this->ledstripe3_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['dados_select'][$sc_seq_vert]['ledstripe4_'] = $this->ledstripe4_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['dados_select'][$sc_seq_vert]['color_'] = $this->color_;
          }
      }
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $salva_opcao = $this->nmgp_opcao; 
      if ($this->sc_evento != "novo" && $this->sc_evento != "incluir") 
      { 
          $this->sc_evento = ""; 
      } 
      if (!in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access) && !$this->Ini->sc_tem_trans_banco && in_array($this->nmgp_opcao, array('excluir', 'incluir', 'alterar')))
      { 
          $this->Ini->sc_tem_trans_banco = $this->Db->BeginTrans(); 
      } 
      $NM_val_form['cod_device_'] = $this->cod_device_;
      $NM_val_form['device_name_'] = $this->device_name_;
      $NM_val_form['ledstripe1_'] = $this->ledstripe1_;
      $NM_val_form['ledstripe2_'] = $this->ledstripe2_;
      $NM_val_form['ledstripe3_'] = $this->ledstripe3_;
      $NM_val_form['ledstripe4_'] = $this->ledstripe4_;
      $NM_val_form['color_'] = $this->color_;
      $NM_val_form['cod_activo_'] = $this->cod_activo_;
      $NM_val_form['cod_grupo_'] = $this->cod_grupo_;
      $NM_val_form['activa_'] = $this->activa_;
      $NM_val_form['estado_'] = $this->estado_;
      $NM_val_form['ult_rfid_'] = $this->ult_rfid_;
      $NM_val_form['ult_fecha_'] = $this->ult_fecha_;
      $NM_val_form['valor_default_'] = $this->valor_default_;
      $NM_val_form['acepta_tiempo_'] = $this->acepta_tiempo_;
      $NM_val_form['acepta_tokens_'] = $this->acepta_tokens_;
      $NM_val_form['dev_ip_'] = $this->dev_ip_;
      $NM_val_form['tipo_dev_'] = $this->tipo_dev_;
      $NM_val_form['direccion_torno_'] = $this->direccion_torno_;
      $NM_val_form['timeout_rfid_'] = $this->timeout_rfid_;
      $NM_val_form['discapacitado_'] = $this->discapacitado_;
      $NM_val_form['numcaja_'] = $this->numcaja_;
      $NM_val_form['empleado_'] = $this->empleado_;
      $NM_val_form['tokens_'] = $this->tokens_;
      $NM_val_form['serialrfid_'] = $this->serialrfid_;
      $NM_val_form['bidireccion_'] = $this->bidireccion_;
      $NM_val_form['cod_devicee_'] = $this->cod_devicee_;
      $NM_val_form['url_1_'] = $this->url_1_;
      $NM_val_form['url_2_'] = $this->url_2_;
      $NM_val_form['url_3_'] = $this->url_3_;
      $NM_val_form['foto1_'] = $this->foto1_;
      $NM_val_form['foto2_'] = $this->foto2_;
      $NM_val_form['foto3_'] = $this->foto3_;
      $NM_val_form['pin_relay1_'] = $this->pin_relay1_;
      $NM_val_form['pin_relay2_'] = $this->pin_relay2_;
      $NM_val_form['rfid_read_'] = $this->rfid_read_;
      $NM_val_form['rfid_estado_'] = $this->rfid_estado_;
      $NM_val_form['rfid_fecha_'] = $this->rfid_fecha_;
      $NM_val_form['url_accion_'] = $this->url_accion_;
      $NM_val_form['url_atraccion_'] = $this->url_atraccion_;
      $NM_val_form['uhfip_'] = $this->uhfip_;
      $NM_val_form['url_reader_'] = $this->url_reader_;
      $NM_val_form['cod_rfid900_'] = $this->cod_rfid900_;
      $NM_val_form['mensaje_'] = $this->mensaje_;
      $NM_val_form['tipolector_'] = $this->tipolector_;
      $NM_val_form['url_accion_bg_'] = $this->url_accion_bg_;
      $NM_val_form['url_inicio_'] = $this->url_inicio_;
      $NM_val_form['lasteffect_'] = $this->lasteffect_;
      if ($this->cod_device_ === "" || is_null($this->cod_device_))  
      { 
          $this->cod_device_ = 0;
      } 
      if ($this->nmgp_opcao == "alterar")
      {
      if ($this->activa_ === "" || is_null($this->activa_))  
      { 
          $this->activa_ = 0;
          $this->sc_force_zero[] = 'activa_';
      } 
      }
      if ($this->estado_ === "" || is_null($this->estado_))  
      { 
          $this->estado_ = 0;
          $this->sc_force_zero[] = 'estado_';
      } 
      if ($this->nmgp_opcao == "alterar")
      {
      if ($this->valor_default_ === "" || is_null($this->valor_default_))  
      { 
          $this->valor_default_ = 0;
          $this->sc_force_zero[] = 'valor_default_';
      } 
      }
      if ($this->acepta_tiempo_ === "" || is_null($this->acepta_tiempo_))  
      { 
          $this->acepta_tiempo_ = 0;
          $this->sc_force_zero[] = 'acepta_tiempo_';
      } 
      if ($this->acepta_tokens_ === "" || is_null($this->acepta_tokens_))  
      { 
          $this->acepta_tokens_ = 0;
          $this->sc_force_zero[] = 'acepta_tokens_';
      } 
      if ($this->nmgp_opcao == "alterar")
      {
      if ($this->tipo_dev_ === "" || is_null($this->tipo_dev_))  
      { 
          $this->tipo_dev_ = 0;
          $this->sc_force_zero[] = 'tipo_dev_';
      } 
      }
      if ($this->nmgp_opcao == "alterar")
      {
      if ($this->direccion_torno_ === "" || is_null($this->direccion_torno_))  
      { 
          $this->direccion_torno_ = 0;
          $this->sc_force_zero[] = 'direccion_torno_';
      } 
      }
      if ($this->timeout_rfid_ === "" || is_null($this->timeout_rfid_))  
      { 
          $this->timeout_rfid_ = 0;
          $this->sc_force_zero[] = 'timeout_rfid_';
      } 
      if ($this->discapacitado_ === "" || is_null($this->discapacitado_))  
      { 
          $this->discapacitado_ = 0;
          $this->sc_force_zero[] = 'discapacitado_';
      } 
      if ($this->numcaja_ === "" || is_null($this->numcaja_))  
      { 
          $this->numcaja_ = 0;
          $this->sc_force_zero[] = 'numcaja_';
      } 
      if ($this->empleado_ === "" || is_null($this->empleado_))  
      { 
          $this->empleado_ = 0;
          $this->sc_force_zero[] = 'empleado_';
      } 
      if ($this->nmgp_opcao == "alterar")
      {
      if ($this->tokens_ === "" || is_null($this->tokens_))  
      { 
          $this->tokens_ = 0;
          $this->sc_force_zero[] = 'tokens_';
      } 
      }
      if ($this->bidireccion_ === "" || is_null($this->bidireccion_))  
      { 
          $this->bidireccion_ = 0;
          $this->sc_force_zero[] = 'bidireccion_';
      } 
      if ($this->cod_devicee_ === "" || is_null($this->cod_devicee_))  
      { 
          $this->cod_devicee_ = 0;
          $this->sc_force_zero[] = 'cod_devicee_';
      } 
      if ($this->pin_relay1_ === "" || is_null($this->pin_relay1_))  
      { 
          $this->pin_relay1_ = 0;
          $this->sc_force_zero[] = 'pin_relay1_';
      } 
      if ($this->pin_relay2_ === "" || is_null($this->pin_relay2_))  
      { 
          $this->pin_relay2_ = 0;
          $this->sc_force_zero[] = 'pin_relay2_';
      } 
      if ($this->rfid_estado_ === "" || is_null($this->rfid_estado_))  
      { 
          $this->rfid_estado_ = 0;
          $this->sc_force_zero[] = 'rfid_estado_';
      } 
      if ($this->nmgp_opcao == "alterar")
      {
      }
      $nm_bases_lob_geral = array_merge($this->Ini->nm_bases_oracle, $this->Ini->nm_bases_ibase, $this->Ini->nm_bases_informix, $this->Ini->nm_bases_mysql, $this->Ini->nm_bases_access, $this->Ini->nm_bases_sqlite, array('pdo_ibm'), array('pdo_sqlsrv'));
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['decimal_db'] == ",") 
      {
          $this->nm_troca_decimal(".", ",");
      }
      if ($this->nmgp_opcao == "alterar" || $this->nmgp_opcao == "incluir") 
      {
          $this->cod_activo__before_qstr = $this->cod_activo_;
          $this->cod_activo_ = substr($this->Db->qstr($this->cod_activo_), 1, -1); 
          if ($this->cod_activo_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->cod_activo_ = "null"; 
              $NM_val_null[] = "cod_activo_";
          } 
          $this->cod_grupo__before_qstr = $this->cod_grupo_;
          $this->cod_grupo_ = substr($this->Db->qstr($this->cod_grupo_), 1, -1); 
          if ($this->cod_grupo_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->cod_grupo_ = "null"; 
              $NM_val_null[] = "cod_grupo_";
          } 
          $this->device_name__before_qstr = $this->device_name_;
          $this->device_name_ = substr($this->Db->qstr($this->device_name_), 1, -1); 
          if ($this->device_name_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->device_name_ = "null"; 
              $NM_val_null[] = "device_name_";
          } 
          if ($this->nmgp_opcao == "alterar") 
          {
          }
          $this->ult_rfid__before_qstr = $this->ult_rfid_;
          $this->ult_rfid_ = substr($this->Db->qstr($this->ult_rfid_), 1, -1); 
          if ($this->ult_rfid_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->ult_rfid_ = "null"; 
              $NM_val_null[] = "ult_rfid_";
          } 
          if ($this->ult_fecha_ == "")  
          { 
              $this->ult_fecha_ = "null"; 
              $NM_val_null[] = "ult_fecha_";
          } 
          if ($this->nmgp_opcao == "alterar") 
          {
          }
          $this->dev_ip__before_qstr = $this->dev_ip_;
          $this->dev_ip_ = substr($this->Db->qstr($this->dev_ip_), 1, -1); 
          if ($this->dev_ip_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->dev_ip_ = "null"; 
              $NM_val_null[] = "dev_ip_";
          } 
          if ($this->nmgp_opcao == "alterar") 
          {
          }
          if ($this->nmgp_opcao == "alterar") 
          {
          }
          if ($this->nmgp_opcao == "alterar") 
          {
          }
          $this->serialrfid__before_qstr = $this->serialrfid_;
          $this->serialrfid_ = substr($this->Db->qstr($this->serialrfid_), 1, -1); 
          if ($this->serialrfid_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->serialrfid_ = "null"; 
              $NM_val_null[] = "serialrfid_";
          } 
          $this->url_1__before_qstr = $this->url_1_;
          $this->url_1_ = substr($this->Db->qstr($this->url_1_), 1, -1); 
          if ($this->url_1_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->url_1_ = "null"; 
              $NM_val_null[] = "url_1_";
          } 
          $this->url_2__before_qstr = $this->url_2_;
          $this->url_2_ = substr($this->Db->qstr($this->url_2_), 1, -1); 
          if ($this->url_2_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->url_2_ = "null"; 
              $NM_val_null[] = "url_2_";
          } 
          $this->url_3__before_qstr = $this->url_3_;
          $this->url_3_ = substr($this->Db->qstr($this->url_3_), 1, -1); 
          if ($this->url_3_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->url_3_ = "null"; 
              $NM_val_null[] = "url_3_";
          } 
          if ($this->foto1_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->foto1_ = "null"; 
              $NM_val_null[] = "foto1_";
          } 
          if ($this->foto2_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->foto2_ = "null"; 
              $NM_val_null[] = "foto2_";
          } 
          if ($this->foto3_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->foto3_ = "null"; 
              $NM_val_null[] = "foto3_";
          } 
          $this->rfid_read__before_qstr = $this->rfid_read_;
          $this->rfid_read_ = substr($this->Db->qstr($this->rfid_read_), 1, -1); 
          if ($this->rfid_read_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->rfid_read_ = "null"; 
              $NM_val_null[] = "rfid_read_";
          } 
          if ($this->rfid_fecha_ == "")  
          { 
              $this->rfid_fecha_ = "null"; 
              $NM_val_null[] = "rfid_fecha_";
          } 
          $this->url_accion__before_qstr = $this->url_accion_;
          $this->url_accion_ = substr($this->Db->qstr($this->url_accion_), 1, -1); 
          if ($this->url_accion_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->url_accion_ = "null"; 
              $NM_val_null[] = "url_accion_";
          } 
          $this->url_atraccion__before_qstr = $this->url_atraccion_;
          $this->url_atraccion_ = substr($this->Db->qstr($this->url_atraccion_), 1, -1); 
          if ($this->url_atraccion_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->url_atraccion_ = "null"; 
              $NM_val_null[] = "url_atraccion_";
          } 
          $this->uhfip__before_qstr = $this->uhfip_;
          $this->uhfip_ = substr($this->Db->qstr($this->uhfip_), 1, -1); 
          if ($this->uhfip_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->uhfip_ = "null"; 
              $NM_val_null[] = "uhfip_";
          } 
          $this->url_reader__before_qstr = $this->url_reader_;
          $this->url_reader_ = substr($this->Db->qstr($this->url_reader_), 1, -1); 
          if ($this->url_reader_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->url_reader_ = "null"; 
              $NM_val_null[] = "url_reader_";
          } 
          $this->cod_rfid900__before_qstr = $this->cod_rfid900_;
          $this->cod_rfid900_ = substr($this->Db->qstr($this->cod_rfid900_), 1, -1); 
          if ($this->cod_rfid900_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->cod_rfid900_ = "null"; 
              $NM_val_null[] = "cod_rfid900_";
          } 
          $this->mensaje__before_qstr = $this->mensaje_;
          $this->mensaje_ = substr($this->Db->qstr($this->mensaje_), 1, -1); 
          if ($this->mensaje_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->mensaje_ = "null"; 
              $NM_val_null[] = "mensaje_";
          } 
          $this->tipolector__before_qstr = $this->tipolector_;
          $this->tipolector_ = substr($this->Db->qstr($this->tipolector_), 1, -1); 
          if ($this->nmgp_opcao == "alterar") 
          {
              if ($this->tipolector_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
              { 
                  $this->tipolector_ = "null"; 
                  $NM_val_null[] = "tipolector_";
              } 
          }
          $this->url_accion_bg__before_qstr = $this->url_accion_bg_;
          $this->url_accion_bg_ = substr($this->Db->qstr($this->url_accion_bg_), 1, -1); 
          if ($this->url_accion_bg_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->url_accion_bg_ = "null"; 
              $NM_val_null[] = "url_accion_bg_";
          } 
          $this->url_inicio__before_qstr = $this->url_inicio_;
          $this->url_inicio_ = substr($this->Db->qstr($this->url_inicio_), 1, -1); 
          if ($this->url_inicio_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->url_inicio_ = "null"; 
              $NM_val_null[] = "url_inicio_";
          } 
          $this->ledstripe1__before_qstr = $this->ledstripe1_;
          $this->ledstripe1_ = substr($this->Db->qstr($this->ledstripe1_), 1, -1); 
          if ($this->ledstripe1_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->ledstripe1_ = "null"; 
              $NM_val_null[] = "ledstripe1_";
          } 
          $this->ledstripe2__before_qstr = $this->ledstripe2_;
          $this->ledstripe2_ = substr($this->Db->qstr($this->ledstripe2_), 1, -1); 
          if ($this->ledstripe2_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->ledstripe2_ = "null"; 
              $NM_val_null[] = "ledstripe2_";
          } 
          $this->ledstripe3__before_qstr = $this->ledstripe3_;
          $this->ledstripe3_ = substr($this->Db->qstr($this->ledstripe3_), 1, -1); 
          if ($this->ledstripe3_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->ledstripe3_ = "null"; 
              $NM_val_null[] = "ledstripe3_";
          } 
          $this->ledstripe4__before_qstr = $this->ledstripe4_;
          $this->ledstripe4_ = substr($this->Db->qstr($this->ledstripe4_), 1, -1); 
          if ($this->ledstripe4_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->ledstripe4_ = "null"; 
              $NM_val_null[] = "ledstripe4_";
          } 
          $this->lasteffect__before_qstr = $this->lasteffect_;
          $this->lasteffect_ = substr($this->Db->qstr($this->lasteffect_), 1, -1); 
          if ($this->lasteffect_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->lasteffect_ = "null"; 
              $NM_val_null[] = "lasteffect_";
          } 
          $this->color__before_qstr = $this->color_;
          $this->color_ = substr($this->Db->qstr($this->color_), 1, -1); 
          if ($this->color_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->color_ = "null"; 
              $NM_val_null[] = "color_";
          } 
      }
      if ($this->nmgp_opcao == "alterar") 
      {
          $SC_fields_update = array(); 
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['foreign_key'] as $sFKName => $sFKValue)
              {
                   if (isset($this->sc_conv_var[$sFKName]))
                   {
                       $sFKName = $this->sc_conv_var[$sFKName];
                   }
                  eval("\$this->" . $sFKName . " = \"" . $sFKValue . "\";");
              }
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['decimal_db'] == ",") 
          {
              $this->nm_poe_aspas_decimal();
          }
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where cod_device = $this->cod_device_ ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where cod_device = $this->cod_device_ "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where cod_device = $this->cod_device_ ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where cod_device = $this->cod_device_ "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where cod_device = $this->cod_device_ ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where cod_device = $this->cod_device_ "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where cod_device = $this->cod_device_ ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where cod_device = $this->cod_device_ "); 
          }  
          else  
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where cod_device = $this->cod_device_ ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where cod_device = $this->cod_device_ "); 
          }  
          if ($rs1 === false)  
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
              if ($this->NM_ajax_flag)
              {
                 form_devices_leds_effects_pack_ajax_response();
              }
              exit; 
          }  
          $bUpdateOk = true;
          $tmp_result = (int) $rs1->fields[0]; 
          if ($tmp_result != 1) 
          { 
              $this->Campos_Mens_erro = $this->Ini->Nm_lang['lang_errm_nfnd']; 
              $this->nmgp_opcao = "nada"; 
              $bUpdateOk = false;
              $this->sc_evento = 'update';
          } 
          $aUpdateOk = array();
          $bUpdateOk = $bUpdateOk && empty($aUpdateOk);
          if ($bUpdateOk)
          { 
              $rs1->Close(); 
              $aDoNotUpdate = array();
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "ledstripe1 = '$this->ledstripe1_', ledstripe2 = '$this->ledstripe2_', ledstripe3 = '$this->ledstripe3_', ledstripe4 = '$this->ledstripe4_', color = '$this->color_'"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "ledstripe1 = '$this->ledstripe1_', ledstripe2 = '$this->ledstripe2_', ledstripe3 = '$this->ledstripe3_', ledstripe4 = '$this->ledstripe4_', color = '$this->color_'"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "ledstripe1 = '$this->ledstripe1_', ledstripe2 = '$this->ledstripe2_', ledstripe3 = '$this->ledstripe3_', ledstripe4 = '$this->ledstripe4_', color = '$this->color_'"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "ledstripe1 = '$this->ledstripe1_', ledstripe2 = '$this->ledstripe2_', ledstripe3 = '$this->ledstripe3_', ledstripe4 = '$this->ledstripe4_', color = '$this->color_'"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "ledstripe1 = '$this->ledstripe1_', ledstripe2 = '$this->ledstripe2_', ledstripe3 = '$this->ledstripe3_', ledstripe4 = '$this->ledstripe4_', color = '$this->color_'"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "ledstripe1 = '$this->ledstripe1_', ledstripe2 = '$this->ledstripe2_', ledstripe3 = '$this->ledstripe3_', ledstripe4 = '$this->ledstripe4_', color = '$this->color_'"; 
              } 
              else 
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "ledstripe1 = '$this->ledstripe1_', ledstripe2 = '$this->ledstripe2_', ledstripe3 = '$this->ledstripe3_', ledstripe4 = '$this->ledstripe4_', color = '$this->color_'"; 
              } 
              if (isset($NM_val_form['cod_activo_']) && $NM_val_form['cod_activo_'] != $this->nmgp_dados_select['cod_activo_']) 
              { 
                  $SC_fields_update[] = "cod_activo = '$this->cod_activo_'"; 
              } 
              if (isset($NM_val_form['cod_grupo_']) && $NM_val_form['cod_grupo_'] != $this->nmgp_dados_select['cod_grupo_']) 
              { 
                  $SC_fields_update[] = "cod_grupo = '$this->cod_grupo_'"; 
              } 
              if (isset($NM_val_form['device_name_']) && $NM_val_form['device_name_'] != $this->nmgp_dados_select['device_name_']) 
              { 
                  $SC_fields_update[] = "device_name = '$this->device_name_'"; 
              } 
              if (isset($NM_val_form['activa_']) && $NM_val_form['activa_'] != $this->nmgp_dados_select['activa_']) 
              { 
                  $SC_fields_update[] = "activa = $this->activa_"; 
              } 
              if (isset($NM_val_form['estado_']) && $NM_val_form['estado_'] != $this->nmgp_dados_select['estado_']) 
              { 
                  $SC_fields_update[] = "estado = $this->estado_"; 
              } 
              if (isset($NM_val_form['ult_rfid_']) && $NM_val_form['ult_rfid_'] != $this->nmgp_dados_select['ult_rfid_']) 
              { 
                  $SC_fields_update[] = "ult_rfid = '$this->ult_rfid_'"; 
              } 
              if (isset($NM_val_form['ult_fecha_']) && $NM_val_form['ult_fecha_'] != $this->nmgp_dados_select['ult_fecha_']) 
              { 
                  if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
                  { 
                      $SC_fields_update[] = "ult_fecha = #$this->ult_fecha_#"; 
                  } 
                  elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
                  { 
                      $SC_fields_update[] = "ult_fecha = EXTEND('" . $this->ult_fecha_ . "', YEAR TO FRACTION)"; 
                  } 
                  else
                  { 
                      $SC_fields_update[] = "ult_fecha = " . $this->Ini->date_delim . $this->ult_fecha_ . $this->Ini->date_delim1 . ""; 
                  } 
              } 
              if (isset($NM_val_form['valor_default_']) && $NM_val_form['valor_default_'] != $this->nmgp_dados_select['valor_default_']) 
              { 
                  $SC_fields_update[] = "valor_default = $this->valor_default_"; 
              } 
              if (isset($NM_val_form['acepta_tiempo_']) && $NM_val_form['acepta_tiempo_'] != $this->nmgp_dados_select['acepta_tiempo_']) 
              { 
                  $SC_fields_update[] = "acepta_tiempo = $this->acepta_tiempo_"; 
              } 
              if (isset($NM_val_form['acepta_tokens_']) && $NM_val_form['acepta_tokens_'] != $this->nmgp_dados_select['acepta_tokens_']) 
              { 
                  $SC_fields_update[] = "acepta_tokens = $this->acepta_tokens_"; 
              } 
              if (isset($NM_val_form['dev_ip_']) && $NM_val_form['dev_ip_'] != $this->nmgp_dados_select['dev_ip_']) 
              { 
                  $SC_fields_update[] = "dev_ip = '$this->dev_ip_'"; 
              } 
              if (isset($NM_val_form['tipo_dev_']) && $NM_val_form['tipo_dev_'] != $this->nmgp_dados_select['tipo_dev_']) 
              { 
                  $SC_fields_update[] = "tipo_dev = $this->tipo_dev_"; 
              } 
              if (isset($NM_val_form['direccion_torno_']) && $NM_val_form['direccion_torno_'] != $this->nmgp_dados_select['direccion_torno_']) 
              { 
                  $SC_fields_update[] = "direccion_torno = $this->direccion_torno_"; 
              } 
              if (isset($NM_val_form['timeout_rfid_']) && $NM_val_form['timeout_rfid_'] != $this->nmgp_dados_select['timeout_rfid_']) 
              { 
                  $SC_fields_update[] = "timeout_rfid = $this->timeout_rfid_"; 
              } 
              if (isset($NM_val_form['discapacitado_']) && $NM_val_form['discapacitado_'] != $this->nmgp_dados_select['discapacitado_']) 
              { 
                  $SC_fields_update[] = "discapacitado = $this->discapacitado_"; 
              } 
              if (isset($NM_val_form['numcaja_']) && $NM_val_form['numcaja_'] != $this->nmgp_dados_select['numcaja_']) 
              { 
                  $SC_fields_update[] = "numcaja = $this->numcaja_"; 
              } 
              if (isset($NM_val_form['empleado_']) && $NM_val_form['empleado_'] != $this->nmgp_dados_select['empleado_']) 
              { 
                  $SC_fields_update[] = "empleado = $this->empleado_"; 
              } 
              if (isset($NM_val_form['tokens_']) && $NM_val_form['tokens_'] != $this->nmgp_dados_select['tokens_']) 
              { 
                  $SC_fields_update[] = "tokens = $this->tokens_"; 
              } 
              if (isset($NM_val_form['serialrfid_']) && $NM_val_form['serialrfid_'] != $this->nmgp_dados_select['serialrfid_']) 
              { 
                  $SC_fields_update[] = "serialrfid = '$this->serialrfid_'"; 
              } 
              if (isset($NM_val_form['bidireccion_']) && $NM_val_form['bidireccion_'] != $this->nmgp_dados_select['bidireccion_']) 
              { 
                  $SC_fields_update[] = "bidireccion = $this->bidireccion_"; 
              } 
              if (isset($NM_val_form['cod_devicee_']) && $NM_val_form['cod_devicee_'] != $this->nmgp_dados_select['cod_devicee_']) 
              { 
                  $SC_fields_update[] = "cod_deviceE = $this->cod_devicee_"; 
              } 
              if (isset($NM_val_form['url_1_']) && $NM_val_form['url_1_'] != $this->nmgp_dados_select['url_1_']) 
              { 
                  $SC_fields_update[] = "url_1 = '$this->url_1_'"; 
              } 
              if (isset($NM_val_form['url_2_']) && $NM_val_form['url_2_'] != $this->nmgp_dados_select['url_2_']) 
              { 
                  $SC_fields_update[] = "url_2 = '$this->url_2_'"; 
              } 
              if (isset($NM_val_form['url_3_']) && $NM_val_form['url_3_'] != $this->nmgp_dados_select['url_3_']) 
              { 
                  $SC_fields_update[] = "url_3 = '$this->url_3_'"; 
              } 
              if (isset($NM_val_form['pin_relay1_']) && $NM_val_form['pin_relay1_'] != $this->nmgp_dados_select['pin_relay1_']) 
              { 
                  $SC_fields_update[] = "pin_relay1 = $this->pin_relay1_"; 
              } 
              if (isset($NM_val_form['pin_relay2_']) && $NM_val_form['pin_relay2_'] != $this->nmgp_dados_select['pin_relay2_']) 
              { 
                  $SC_fields_update[] = "pin_relay2 = $this->pin_relay2_"; 
              } 
              if (isset($NM_val_form['rfid_read_']) && $NM_val_form['rfid_read_'] != $this->nmgp_dados_select['rfid_read_']) 
              { 
                  $SC_fields_update[] = "rfid_read = '$this->rfid_read_'"; 
              } 
              if (isset($NM_val_form['rfid_estado_']) && $NM_val_form['rfid_estado_'] != $this->nmgp_dados_select['rfid_estado_']) 
              { 
                  $SC_fields_update[] = "rfid_estado = $this->rfid_estado_"; 
              } 
              if (isset($NM_val_form['rfid_fecha_']) && $NM_val_form['rfid_fecha_'] != $this->nmgp_dados_select['rfid_fecha_']) 
              { 
                   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
                  { 
                      $SC_fields_update[] = "rfid_fecha = TO_DATE('$this->rfid_fecha_', 'yyyy-mm-dd hh24:mi:ss')"; 
                  } 
                  else
                  { 
                      $SC_fields_update[] = "rfid_fecha = '$this->rfid_fecha_'"; 
                  } 
              } 
              if (isset($NM_val_form['url_accion_']) && $NM_val_form['url_accion_'] != $this->nmgp_dados_select['url_accion_']) 
              { 
                  $SC_fields_update[] = "url_accion = '$this->url_accion_'"; 
              } 
              if (isset($NM_val_form['url_atraccion_']) && $NM_val_form['url_atraccion_'] != $this->nmgp_dados_select['url_atraccion_']) 
              { 
                  $SC_fields_update[] = "url_atraccion = '$this->url_atraccion_'"; 
              } 
              if (isset($NM_val_form['uhfip_']) && $NM_val_form['uhfip_'] != $this->nmgp_dados_select['uhfip_']) 
              { 
                  $SC_fields_update[] = "uhfip = '$this->uhfip_'"; 
              } 
              if (isset($NM_val_form['url_reader_']) && $NM_val_form['url_reader_'] != $this->nmgp_dados_select['url_reader_']) 
              { 
                  $SC_fields_update[] = "url_reader = '$this->url_reader_'"; 
              } 
              if (isset($NM_val_form['cod_rfid900_']) && $NM_val_form['cod_rfid900_'] != $this->nmgp_dados_select['cod_rfid900_']) 
              { 
                  $SC_fields_update[] = "cod_rfid900 = '$this->cod_rfid900_'"; 
              } 
              if (isset($NM_val_form['mensaje_']) && $NM_val_form['mensaje_'] != $this->nmgp_dados_select['mensaje_']) 
              { 
                  $SC_fields_update[] = "mensaje = '$this->mensaje_'"; 
              } 
              if (isset($NM_val_form['tipolector_']) && $NM_val_form['tipolector_'] != $this->nmgp_dados_select['tipolector_']) 
              { 
                  $SC_fields_update[] = "tipolector = '$this->tipolector_'"; 
              } 
              if (isset($NM_val_form['url_accion_bg_']) && $NM_val_form['url_accion_bg_'] != $this->nmgp_dados_select['url_accion_bg_']) 
              { 
                  $SC_fields_update[] = "url_accion_bg = '$this->url_accion_bg_'"; 
              } 
              if (isset($NM_val_form['url_inicio_']) && $NM_val_form['url_inicio_'] != $this->nmgp_dados_select['url_inicio_']) 
              { 
                  $SC_fields_update[] = "url_inicio = '$this->url_inicio_'"; 
              } 
              if (isset($NM_val_form['lasteffect_']) && $NM_val_form['lasteffect_'] != $this->nmgp_dados_select['lasteffect_']) 
              { 
                  $SC_fields_update[] = "lasteffect = '$this->lasteffect_'"; 
              } 
              $comando .= implode(",", $SC_fields_update);  
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              {
                  $comando .= " WHERE cod_device = $this->cod_device_ ";  
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
                  $comando .= " WHERE cod_device = $this->cod_device_ ";  
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              {
                  $comando .= " WHERE cod_device = $this->cod_device_ ";  
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $comando .= " WHERE cod_device = $this->cod_device_ ";  
              }  
              else  
              {
                  $comando .= " WHERE cod_device = $this->cod_device_ ";  
              }  
              $comando = str_replace("N'null'", "null", $comando) ; 
              $comando = str_replace("'null'", "null", $comando) ; 
              $comando = str_replace("#null#", "null", $comando) ; 
              $comando = str_replace($this->Ini->date_delim . "null" . $this->Ini->date_delim1, "null", $comando) ; 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                $comando = str_replace("EXTEND('', YEAR TO FRACTION)", "null", $comando) ; 
                $comando = str_replace("EXTEND(null, YEAR TO FRACTION)", "null", $comando) ; 
                $comando = str_replace("EXTEND('', YEAR TO DAY)", "null", $comando) ; 
                $comando = str_replace("EXTEND(null, YEAR TO DAY)", "null", $comando) ; 
              }  
              $useUpdateProcedure = false;
              if (!empty($SC_fields_update) || $useUpdateProcedure)
              { 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = $comando; 
                  $rs = $this->Db->Execute($comando);  
                  if ($rs === false) 
                  { 
                      if (FALSE === strpos(strtoupper($this->Db->ErrorMsg()), "MAIL SENT") && FALSE === strpos(strtoupper($this->Db->ErrorMsg()), "WARNING"))
                      {
                          $dbErrorMessage = $this->Db->ErrorMsg();
                          $dbErrorCode = $this->Db->ErrorNo();
                          $this->handleDbErrorMessage($dbErrorMessage, $dbErrorCode);
                          $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_updt'], $dbErrorMessage, true);
                          if (isset($_SESSION['scriptcase']['erro_handler']) && $_SESSION['scriptcase']['erro_handler']) 
                          { 
                              $this->sc_erro_update = $dbErrorMessage;
                              $this->NM_rollback_db(); 
                              if ($this->NM_ajax_flag)
                              {
                                  form_devices_leds_effects_pack_ajax_response();
                              }
                              exit;  
                          }   
                      }   
                  }   
              }   
              $this->cod_activo_ = $this->cod_activo__before_qstr;
              $this->cod_grupo_ = $this->cod_grupo__before_qstr;
              $this->device_name_ = $this->device_name__before_qstr;
              $this->ult_rfid_ = $this->ult_rfid__before_qstr;
              $this->dev_ip_ = $this->dev_ip__before_qstr;
              $this->serialrfid_ = $this->serialrfid__before_qstr;
              $this->url_1_ = $this->url_1__before_qstr;
              $this->url_2_ = $this->url_2__before_qstr;
              $this->url_3_ = $this->url_3__before_qstr;
              $this->rfid_read_ = $this->rfid_read__before_qstr;
              $this->url_accion_ = $this->url_accion__before_qstr;
              $this->url_atraccion_ = $this->url_atraccion__before_qstr;
              $this->uhfip_ = $this->uhfip__before_qstr;
              $this->url_reader_ = $this->url_reader__before_qstr;
              $this->cod_rfid900_ = $this->cod_rfid900__before_qstr;
              $this->mensaje_ = $this->mensaje__before_qstr;
              $this->tipolector_ = $this->tipolector__before_qstr;
              $this->url_accion_bg_ = $this->url_accion_bg__before_qstr;
              $this->url_inicio_ = $this->url_inicio__before_qstr;
              $this->ledstripe1_ = $this->ledstripe1__before_qstr;
              $this->ledstripe2_ = $this->ledstripe2__before_qstr;
              $this->ledstripe3_ = $this->ledstripe3__before_qstr;
              $this->ledstripe4_ = $this->ledstripe4__before_qstr;
              $this->lasteffect_ = $this->lasteffect__before_qstr;
              $this->color_ = $this->color__before_qstr;
              if (in_array(strtolower($this->Ini->nm_tpbanco), $nm_bases_lob_geral))
              { 
              }   
              $this->sc_evento = "update"; 
              $this->nmgp_opcao = "igual"; 
              $this->nm_flag_iframe = true;
              if ($this->lig_edit_lookup)
              {
                  $this->lig_edit_lookup_call = true;
              }

              $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['db_changed'] = true;
              if ($this->NM_ajax_flag) {
                  $this->NM_ajax_info['clearUpload'] = 'S';
              }

              $this->sc_teve_alt = true; 
              if     (isset($NM_val_form) && isset($NM_val_form['cod_device_'])) { $this->cod_device_ = $NM_val_form['cod_device_']; }
              elseif (isset($this->cod_device_)) { $this->nm_limpa_alfa($this->cod_device_); }
              if     (isset($NM_val_form) && isset($NM_val_form['device_name_'])) { $this->device_name_ = $NM_val_form['device_name_']; }
              elseif (isset($this->device_name_)) { $this->nm_limpa_alfa($this->device_name_); }
              if     (isset($NM_val_form) && isset($NM_val_form['ledstripe1_'])) { $this->ledstripe1_ = $NM_val_form['ledstripe1_']; }
              elseif (isset($this->ledstripe1_)) { $this->nm_limpa_alfa($this->ledstripe1_); }
              if     (isset($NM_val_form) && isset($NM_val_form['ledstripe2_'])) { $this->ledstripe2_ = $NM_val_form['ledstripe2_']; }
              elseif (isset($this->ledstripe2_)) { $this->nm_limpa_alfa($this->ledstripe2_); }
              if     (isset($NM_val_form) && isset($NM_val_form['ledstripe3_'])) { $this->ledstripe3_ = $NM_val_form['ledstripe3_']; }
              elseif (isset($this->ledstripe3_)) { $this->nm_limpa_alfa($this->ledstripe3_); }
              if     (isset($NM_val_form) && isset($NM_val_form['ledstripe4_'])) { $this->ledstripe4_ = $NM_val_form['ledstripe4_']; }
              elseif (isset($this->ledstripe4_)) { $this->nm_limpa_alfa($this->ledstripe4_); }
              if     (isset($NM_val_form) && isset($NM_val_form['color_'])) { $this->color_ = $NM_val_form['color_']; }
              elseif (isset($this->color_)) { $this->nm_limpa_alfa($this->color_); }

              $this->nm_formatar_campos();
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
              }

              $aOldRefresh               = $this->nmgp_refresh_fields;
              $this->nmgp_refresh_fields = array_diff(array('cod_device_', 'device_name_', 'ledstripe1_', 'ledstripe2_', 'ledstripe3_', 'ledstripe4_', 'color_'), $aDoNotUpdate);
              $this->nmgp_refresh_fields = $aOldRefresh;

              if (isset($this->Embutida_ronly) && $this->Embutida_ronly)
              {

                  $this->NM_ajax_info['readOnly']['cod_device_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['device_name_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['ledstripe1_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['ledstripe2_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['ledstripe3_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['ledstripe4_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['color_' . $this->nmgp_refresh_row] = 'on';


                  $this->NM_ajax_info['closeLine'] = $this->nmgp_refresh_row;
              }

              $this->nm_tira_formatacao();
          }  
      }  
      if ($this->nmgp_opcao == "incluir") 
      { 
          $NM_cmp_auto = "";
          $NM_seq_auto = "";
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['foreign_key'] as $sFKName => $sFKValue)
              {
                   if (isset($this->sc_conv_var[$sFKName]))
                   {
                       $sFKName = $this->sc_conv_var[$sFKName];
                   }
                  eval("\$this->" . $sFKName . " = \"" . $sFKValue . "\";");
              }
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['decimal_db'] == ",") 
          {
              $this->nm_poe_aspas_decimal();
          }
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
          { 
              $NM_seq_auto = "NULL, ";
              $NM_cmp_auto = "cod_device, ";
          } 
          $bInsertOk = true;
          $aInsertOk = array(); 
          $bInsertOk = $bInsertOk && empty($aInsertOk);
          if ($bInsertOk)
          { 
              $_test_file = $this->fetchUniqueUploadName($this->foto1__scfile_name, $dir_file, "foto1_");
              if (trim($this->foto1__scfile_name) != $_test_file)
              {
                  $this->foto1__scfile_name = $_test_file;
                  $this->foto1_ = $_test_file;
              }
              $_test_file = $this->fetchUniqueUploadName($this->foto2__scfile_name, $dir_file, "foto2_");
              if (trim($this->foto2__scfile_name) != $_test_file)
              {
                  $this->foto2__scfile_name = $_test_file;
                  $this->foto2_ = $_test_file;
              }
              $_test_file = $this->fetchUniqueUploadName($this->foto3__scfile_name, $dir_file, "foto3_");
              if (trim($this->foto3__scfile_name) != $_test_file)
              {
                  $this->foto3__scfile_name = $_test_file;
                  $this->foto3_ = $_test_file;
              }
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              { 
                  $compl_insert     = ""; 
                  $compl_insert_val = ""; 
                  if ($this->activa_ != "")
                  { 
                       $compl_insert     .= ", activa";
                       $compl_insert_val .= ", $this->activa_";
                  } 
                  if ($this->valor_default_ != "")
                  { 
                       $compl_insert     .= ", valor_default";
                       $compl_insert_val .= ", $this->valor_default_";
                  } 
                  if ($this->tipo_dev_ != "")
                  { 
                       $compl_insert     .= ", tipo_dev";
                       $compl_insert_val .= ", $this->tipo_dev_";
                  } 
                  if ($this->direccion_torno_ != "")
                  { 
                       $compl_insert     .= ", direccion_torno";
                       $compl_insert_val .= ", $this->direccion_torno_";
                  } 
                  if ($this->tokens_ != "")
                  { 
                       $compl_insert     .= ", tokens";
                       $compl_insert_val .= ", $this->tokens_";
                  } 
                  if ($this->tipolector_ != "")
                  { 
                       $compl_insert     .= ", tipolector";
                       $compl_insert_val .= ", '$this->tipolector_'";
                  } 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (cod_activo, cod_grupo, device_name, estado, ult_rfid, ult_fecha, acepta_tiempo, acepta_tokens, dev_ip, timeout_rfid, discapacitado, numcaja, empleado, serialrfid, bidireccion, cod_deviceE, url_1, url_2, url_3, foto1, foto2, foto3, pin_relay1, pin_relay2, rfid_read, rfid_estado, rfid_fecha, url_accion, url_atraccion, uhfip, url_reader, cod_rfid900, mensaje, url_accion_bg, url_inicio, ledstripe1, ledstripe2, ledstripe3, ledstripe4, lasteffect, color $compl_insert) VALUES ('$this->cod_activo_', '$this->cod_grupo_', '$this->device_name_', $this->estado_, '$this->ult_rfid_', #$this->ult_fecha_#, $this->acepta_tiempo_, $this->acepta_tokens_, '$this->dev_ip_', $this->timeout_rfid_, $this->discapacitado_, $this->numcaja_, $this->empleado_, '$this->serialrfid_', $this->bidireccion_, $this->cod_devicee_, '$this->url_1_', '$this->url_2_', '$this->url_3_', '$this->foto1_', '$this->foto2_', '$this->foto3_', $this->pin_relay1_, $this->pin_relay2_, '$this->rfid_read_', $this->rfid_estado_, '$this->rfid_fecha_', '$this->url_accion_', '$this->url_atraccion_', '$this->uhfip_', '$this->url_reader_', '$this->cod_rfid900_', '$this->mensaje_', '$this->url_accion_bg_', '$this->url_inicio_', '$this->ledstripe1_', '$this->ledstripe2_', '$this->ledstripe3_', '$this->ledstripe4_', '$this->lasteffect_', '$this->color_' $compl_insert_val)"; 
              }
              elseif ($this->Ini->nm_tpbanco == "pdo_sqlsrv")
              { 
                  $compl_insert     = ""; 
                  $compl_insert_val = ""; 
                  if ($this->activa_ != "")
                  { 
                       $compl_insert     .= ", activa";
                       $compl_insert_val .= ", $this->activa_";
                  } 
                  if ($this->valor_default_ != "")
                  { 
                       $compl_insert     .= ", valor_default";
                       $compl_insert_val .= ", $this->valor_default_";
                  } 
                  if ($this->tipo_dev_ != "")
                  { 
                       $compl_insert     .= ", tipo_dev";
                       $compl_insert_val .= ", $this->tipo_dev_";
                  } 
                  if ($this->direccion_torno_ != "")
                  { 
                       $compl_insert     .= ", direccion_torno";
                       $compl_insert_val .= ", $this->direccion_torno_";
                  } 
                  if ($this->tokens_ != "")
                  { 
                       $compl_insert     .= ", tokens";
                       $compl_insert_val .= ", $this->tokens_";
                  } 
                  if ($this->tipolector_ != "")
                  { 
                       $compl_insert     .= ", tipolector";
                       $compl_insert_val .= ", '$this->tipolector_'";
                  } 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (cod_activo, cod_grupo, device_name, estado, ult_rfid, ult_fecha, acepta_tiempo, acepta_tokens, dev_ip, timeout_rfid, discapacitado, numcaja, empleado, serialrfid, bidireccion, cod_deviceE, url_1, url_2, url_3, foto1, foto2, foto3, pin_relay1, pin_relay2, rfid_read, rfid_estado, rfid_fecha, url_accion, url_atraccion, uhfip, url_reader, cod_rfid900, mensaje, url_accion_bg, url_inicio, ledstripe1, ledstripe2, ledstripe3, ledstripe4, lasteffect, color $compl_insert) VALUES ('$this->cod_activo_', '$this->cod_grupo_', '$this->device_name_', $this->estado_, '$this->ult_rfid_', " . $this->Ini->date_delim . $this->ult_fecha_ . $this->Ini->date_delim1 . ", $this->acepta_tiempo_, $this->acepta_tokens_, '$this->dev_ip_', $this->timeout_rfid_, $this->discapacitado_, $this->numcaja_, $this->empleado_, '$this->serialrfid_', $this->bidireccion_, $this->cod_devicee_, '$this->url_1_', '$this->url_2_', '$this->url_3_', '', '', '', $this->pin_relay1_, $this->pin_relay2_, '$this->rfid_read_', $this->rfid_estado_, '$this->rfid_fecha_', '$this->url_accion_', '$this->url_atraccion_', '$this->uhfip_', '$this->url_reader_', '$this->cod_rfid900_', '$this->mensaje_', '$this->url_accion_bg_', '$this->url_inicio_', '$this->ledstripe1_', '$this->ledstripe2_', '$this->ledstripe3_', '$this->ledstripe4_', '$this->lasteffect_', '$this->color_' $compl_insert_val)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              { 
                  $compl_insert     = ""; 
                  $compl_insert_val = ""; 
                  if ($this->activa_ != "")
                  { 
                       $compl_insert     .= ", activa";
                       $compl_insert_val .= ", $this->activa_";
                  } 
                  if ($this->valor_default_ != "")
                  { 
                       $compl_insert     .= ", valor_default";
                       $compl_insert_val .= ", $this->valor_default_";
                  } 
                  if ($this->tipo_dev_ != "")
                  { 
                       $compl_insert     .= ", tipo_dev";
                       $compl_insert_val .= ", $this->tipo_dev_";
                  } 
                  if ($this->direccion_torno_ != "")
                  { 
                       $compl_insert     .= ", direccion_torno";
                       $compl_insert_val .= ", $this->direccion_torno_";
                  } 
                  if ($this->tokens_ != "")
                  { 
                       $compl_insert     .= ", tokens";
                       $compl_insert_val .= ", $this->tokens_";
                  } 
                  if ($this->tipolector_ != "")
                  { 
                       $compl_insert     .= ", tipolector";
                       $compl_insert_val .= ", '$this->tipolector_'";
                  } 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (cod_activo, cod_grupo, device_name, estado, ult_rfid, ult_fecha, acepta_tiempo, acepta_tokens, dev_ip, timeout_rfid, discapacitado, numcaja, empleado, serialrfid, bidireccion, cod_deviceE, url_1, url_2, url_3, foto1, foto2, foto3, pin_relay1, pin_relay2, rfid_read, rfid_estado, rfid_fecha, url_accion, url_atraccion, uhfip, url_reader, cod_rfid900, mensaje, url_accion_bg, url_inicio, ledstripe1, ledstripe2, ledstripe3, ledstripe4, lasteffect, color $compl_insert) VALUES ('$this->cod_activo_', '$this->cod_grupo_', '$this->device_name_', $this->estado_, '$this->ult_rfid_', " . $this->Ini->date_delim . $this->ult_fecha_ . $this->Ini->date_delim1 . ", $this->acepta_tiempo_, $this->acepta_tokens_, '$this->dev_ip_', $this->timeout_rfid_, $this->discapacitado_, $this->numcaja_, $this->empleado_, '$this->serialrfid_', $this->bidireccion_, $this->cod_devicee_, '$this->url_1_', '$this->url_2_', '$this->url_3_', '$this->foto1_', '$this->foto2_', '$this->foto3_', $this->pin_relay1_, $this->pin_relay2_, '$this->rfid_read_', $this->rfid_estado_, '$this->rfid_fecha_', '$this->url_accion_', '$this->url_atraccion_', '$this->uhfip_', '$this->url_reader_', '$this->cod_rfid900_', '$this->mensaje_', '$this->url_accion_bg_', '$this->url_inicio_', '$this->ledstripe1_', '$this->ledstripe2_', '$this->ledstripe3_', '$this->ledstripe4_', '$this->lasteffect_', '$this->color_' $compl_insert_val)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
              { 
                  $compl_insert     = ""; 
                  $compl_insert_val = ""; 
                  if ($this->activa_ != "")
                  { 
                       $compl_insert     .= ", activa";
                       $compl_insert_val .= ", $this->activa_";
                  } 
                  if ($this->valor_default_ != "")
                  { 
                       $compl_insert     .= ", valor_default";
                       $compl_insert_val .= ", $this->valor_default_";
                  } 
                  if ($this->tipo_dev_ != "")
                  { 
                       $compl_insert     .= ", tipo_dev";
                       $compl_insert_val .= ", $this->tipo_dev_";
                  } 
                  if ($this->direccion_torno_ != "")
                  { 
                       $compl_insert     .= ", direccion_torno";
                       $compl_insert_val .= ", $this->direccion_torno_";
                  } 
                  if ($this->tokens_ != "")
                  { 
                       $compl_insert     .= ", tokens";
                       $compl_insert_val .= ", $this->tokens_";
                  } 
                  if ($this->tipolector_ != "")
                  { 
                       $compl_insert     .= ", tipolector";
                       $compl_insert_val .= ", '$this->tipolector_'";
                  } 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (cod_activo, cod_grupo, device_name, estado, ult_rfid, ult_fecha, acepta_tiempo, acepta_tokens, dev_ip, timeout_rfid, discapacitado, numcaja, empleado, serialrfid, bidireccion, cod_deviceE, url_1, url_2, url_3, foto1, foto2, foto3, pin_relay1, pin_relay2, rfid_read, rfid_estado, rfid_fecha, url_accion, url_atraccion, uhfip, url_reader, cod_rfid900, mensaje, url_accion_bg, url_inicio, ledstripe1, ledstripe2, ledstripe3, ledstripe4, lasteffect, color $compl_insert) VALUES ('$this->cod_activo_', '$this->cod_grupo_', '$this->device_name_', $this->estado_, '$this->ult_rfid_', " . $this->Ini->date_delim . $this->ult_fecha_ . $this->Ini->date_delim1 . ", $this->acepta_tiempo_, $this->acepta_tokens_, '$this->dev_ip_', $this->timeout_rfid_, $this->discapacitado_, $this->numcaja_, $this->empleado_, '$this->serialrfid_', $this->bidireccion_, $this->cod_devicee_, '$this->url_1_', '$this->url_2_', '$this->url_3_', '$this->foto1_', '$this->foto2_', '$this->foto3_', $this->pin_relay1_, $this->pin_relay2_, '$this->rfid_read_', $this->rfid_estado_, '$this->rfid_fecha_', '$this->url_accion_', '$this->url_atraccion_', '$this->uhfip_', '$this->url_reader_', '$this->cod_rfid900_', '$this->mensaje_', '$this->url_accion_bg_', '$this->url_inicio_', '$this->ledstripe1_', '$this->ledstripe2_', '$this->ledstripe3_', '$this->ledstripe4_', '$this->lasteffect_', '$this->color_' $compl_insert_val)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              {
                  $compl_insert     = ""; 
                  $compl_insert_val = ""; 
                  if ($this->activa_ != "")
                  { 
                       $compl_insert     .= ", activa";
                       $compl_insert_val .= ", $this->activa_";
                  } 
                  if ($this->valor_default_ != "")
                  { 
                       $compl_insert     .= ", valor_default";
                       $compl_insert_val .= ", $this->valor_default_";
                  } 
                  if ($this->tipo_dev_ != "")
                  { 
                       $compl_insert     .= ", tipo_dev";
                       $compl_insert_val .= ", $this->tipo_dev_";
                  } 
                  if ($this->direccion_torno_ != "")
                  { 
                       $compl_insert     .= ", direccion_torno";
                       $compl_insert_val .= ", $this->direccion_torno_";
                  } 
                  if ($this->tokens_ != "")
                  { 
                       $compl_insert     .= ", tokens";
                       $compl_insert_val .= ", $this->tokens_";
                  } 
                  if ($this->tipolector_ != "")
                  { 
                       $compl_insert     .= ", tipolector";
                       $compl_insert_val .= ", '$this->tipolector_'";
                  } 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "cod_activo, cod_grupo, device_name, estado, ult_rfid, ult_fecha, acepta_tiempo, acepta_tokens, dev_ip, timeout_rfid, discapacitado, numcaja, empleado, serialrfid, bidireccion, cod_deviceE, url_1, url_2, url_3, foto1, foto2, foto3, pin_relay1, pin_relay2, rfid_read, rfid_estado, rfid_fecha, url_accion, url_atraccion, uhfip, url_reader, cod_rfid900, mensaje, url_accion_bg, url_inicio, ledstripe1, ledstripe2, ledstripe3, ledstripe4, lasteffect, color $compl_insert) VALUES (" . $NM_seq_auto . "'$this->cod_activo_', '$this->cod_grupo_', '$this->device_name_', $this->estado_, '$this->ult_rfid_', " . $this->Ini->date_delim . $this->ult_fecha_ . $this->Ini->date_delim1 . ", $this->acepta_tiempo_, $this->acepta_tokens_, '$this->dev_ip_', $this->timeout_rfid_, $this->discapacitado_, $this->numcaja_, $this->empleado_, '$this->serialrfid_', $this->bidireccion_, $this->cod_devicee_, '$this->url_1_', '$this->url_2_', '$this->url_3_', EMPTY_BLOB(), EMPTY_BLOB(), EMPTY_BLOB(), $this->pin_relay1_, $this->pin_relay2_, '$this->rfid_read_', $this->rfid_estado_, TO_DATE('$this->rfid_fecha_', 'yyyy-mm-dd hh24:mi:ss'), '$this->url_accion_', '$this->url_atraccion_', '$this->uhfip_', '$this->url_reader_', '$this->cod_rfid900_', '$this->mensaje_', '$this->url_accion_bg_', '$this->url_inicio_', '$this->ledstripe1_', '$this->ledstripe2_', '$this->ledstripe3_', '$this->ledstripe4_', '$this->lasteffect_', '$this->color_' $compl_insert_val)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $compl_insert     = ""; 
                  $compl_insert_val = ""; 
                  if ($this->activa_ != "")
                  { 
                       $compl_insert     .= ", activa";
                       $compl_insert_val .= ", $this->activa_";
                  } 
                  if ($this->valor_default_ != "")
                  { 
                       $compl_insert     .= ", valor_default";
                       $compl_insert_val .= ", $this->valor_default_";
                  } 
                  if ($this->tipo_dev_ != "")
                  { 
                       $compl_insert     .= ", tipo_dev";
                       $compl_insert_val .= ", $this->tipo_dev_";
                  } 
                  if ($this->direccion_torno_ != "")
                  { 
                       $compl_insert     .= ", direccion_torno";
                       $compl_insert_val .= ", $this->direccion_torno_";
                  } 
                  if ($this->tokens_ != "")
                  { 
                       $compl_insert     .= ", tokens";
                       $compl_insert_val .= ", $this->tokens_";
                  } 
                  if ($this->tipolector_ != "")
                  { 
                       $compl_insert     .= ", tipolector";
                       $compl_insert_val .= ", '$this->tipolector_'";
                  } 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "cod_activo, cod_grupo, device_name, estado, ult_rfid, ult_fecha, acepta_tiempo, acepta_tokens, dev_ip, timeout_rfid, discapacitado, numcaja, empleado, serialrfid, bidireccion, cod_deviceE, url_1, url_2, url_3, foto1, foto2, foto3, pin_relay1, pin_relay2, rfid_read, rfid_estado, rfid_fecha, url_accion, url_atraccion, uhfip, url_reader, cod_rfid900, mensaje, url_accion_bg, url_inicio, ledstripe1, ledstripe2, ledstripe3, ledstripe4, lasteffect, color $compl_insert) VALUES (" . $NM_seq_auto . "'$this->cod_activo_', '$this->cod_grupo_', '$this->device_name_', $this->estado_, '$this->ult_rfid_', EXTEND('$this->ult_fecha_', YEAR TO FRACTION), $this->acepta_tiempo_, $this->acepta_tokens_, '$this->dev_ip_', $this->timeout_rfid_, $this->discapacitado_, $this->numcaja_, $this->empleado_, '$this->serialrfid_', $this->bidireccion_, $this->cod_devicee_, '$this->url_1_', '$this->url_2_', '$this->url_3_', null, null, null, $this->pin_relay1_, $this->pin_relay2_, '$this->rfid_read_', $this->rfid_estado_, '$this->rfid_fecha_', '$this->url_accion_', '$this->url_atraccion_', '$this->uhfip_', '$this->url_reader_', '$this->cod_rfid900_', '$this->mensaje_', '$this->url_accion_bg_', '$this->url_inicio_', '$this->ledstripe1_', '$this->ledstripe2_', '$this->ledstripe3_', '$this->ledstripe4_', '$this->lasteffect_', '$this->color_' $compl_insert_val)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
              {
                  $compl_insert     = ""; 
                  $compl_insert_val = ""; 
                  if ($this->activa_ != "")
                  { 
                       $compl_insert     .= ", activa";
                       $compl_insert_val .= ", $this->activa_";
                  } 
                  if ($this->valor_default_ != "")
                  { 
                       $compl_insert     .= ", valor_default";
                       $compl_insert_val .= ", $this->valor_default_";
                  } 
                  if ($this->tipo_dev_ != "")
                  { 
                       $compl_insert     .= ", tipo_dev";
                       $compl_insert_val .= ", $this->tipo_dev_";
                  } 
                  if ($this->direccion_torno_ != "")
                  { 
                       $compl_insert     .= ", direccion_torno";
                       $compl_insert_val .= ", $this->direccion_torno_";
                  } 
                  if ($this->tokens_ != "")
                  { 
                       $compl_insert     .= ", tokens";
                       $compl_insert_val .= ", $this->tokens_";
                  } 
                  if ($this->tipolector_ != "")
                  { 
                       $compl_insert     .= ", tipolector";
                       $compl_insert_val .= ", '$this->tipolector_'";
                  } 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "cod_activo, cod_grupo, device_name, estado, ult_rfid, ult_fecha, acepta_tiempo, acepta_tokens, dev_ip, timeout_rfid, discapacitado, numcaja, empleado, serialrfid, bidireccion, cod_deviceE, url_1, url_2, url_3, foto1, foto2, foto3, pin_relay1, pin_relay2, rfid_read, rfid_estado, rfid_fecha, url_accion, url_atraccion, uhfip, url_reader, cod_rfid900, mensaje, url_accion_bg, url_inicio, ledstripe1, ledstripe2, ledstripe3, ledstripe4, lasteffect, color $compl_insert) VALUES (" . $NM_seq_auto . "'$this->cod_activo_', '$this->cod_grupo_', '$this->device_name_', $this->estado_, '$this->ult_rfid_', " . $this->Ini->date_delim . $this->ult_fecha_ . $this->Ini->date_delim1 . ", $this->acepta_tiempo_, $this->acepta_tokens_, '$this->dev_ip_', $this->timeout_rfid_, $this->discapacitado_, $this->numcaja_, $this->empleado_, '$this->serialrfid_', $this->bidireccion_, $this->cod_devicee_, '$this->url_1_', '$this->url_2_', '$this->url_3_', '', '', '', $this->pin_relay1_, $this->pin_relay2_, '$this->rfid_read_', $this->rfid_estado_, '$this->rfid_fecha_', '$this->url_accion_', '$this->url_atraccion_', '$this->uhfip_', '$this->url_reader_', '$this->cod_rfid900_', '$this->mensaje_', '$this->url_accion_bg_', '$this->url_inicio_', '$this->ledstripe1_', '$this->ledstripe2_', '$this->ledstripe3_', '$this->ledstripe4_', '$this->lasteffect_', '$this->color_' $compl_insert_val)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
              {
                  $compl_insert     = ""; 
                  $compl_insert_val = ""; 
                  if ($this->activa_ != "")
                  { 
                       $compl_insert     .= ", activa";
                       $compl_insert_val .= ", $this->activa_";
                  } 
                  if ($this->valor_default_ != "")
                  { 
                       $compl_insert     .= ", valor_default";
                       $compl_insert_val .= ", $this->valor_default_";
                  } 
                  if ($this->tipo_dev_ != "")
                  { 
                       $compl_insert     .= ", tipo_dev";
                       $compl_insert_val .= ", $this->tipo_dev_";
                  } 
                  if ($this->direccion_torno_ != "")
                  { 
                       $compl_insert     .= ", direccion_torno";
                       $compl_insert_val .= ", $this->direccion_torno_";
                  } 
                  if ($this->tokens_ != "")
                  { 
                       $compl_insert     .= ", tokens";
                       $compl_insert_val .= ", $this->tokens_";
                  } 
                  if ($this->tipolector_ != "")
                  { 
                       $compl_insert     .= ", tipolector";
                       $compl_insert_val .= ", '$this->tipolector_'";
                  } 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "cod_activo, cod_grupo, device_name, estado, ult_rfid, ult_fecha, acepta_tiempo, acepta_tokens, dev_ip, timeout_rfid, discapacitado, numcaja, empleado, serialrfid, bidireccion, cod_deviceE, url_1, url_2, url_3, foto1, foto2, foto3, pin_relay1, pin_relay2, rfid_read, rfid_estado, rfid_fecha, url_accion, url_atraccion, uhfip, url_reader, cod_rfid900, mensaje, url_accion_bg, url_inicio, ledstripe1, ledstripe2, ledstripe3, ledstripe4, lasteffect, color $compl_insert) VALUES (" . $NM_seq_auto . "'$this->cod_activo_', '$this->cod_grupo_', '$this->device_name_', $this->estado_, '$this->ult_rfid_', " . $this->Ini->date_delim . $this->ult_fecha_ . $this->Ini->date_delim1 . ", $this->acepta_tiempo_, $this->acepta_tokens_, '$this->dev_ip_', $this->timeout_rfid_, $this->discapacitado_, $this->numcaja_, $this->empleado_, '$this->serialrfid_', $this->bidireccion_, $this->cod_devicee_, '$this->url_1_', '$this->url_2_', '$this->url_3_', '', '', '', $this->pin_relay1_, $this->pin_relay2_, '$this->rfid_read_', $this->rfid_estado_, '$this->rfid_fecha_', '$this->url_accion_', '$this->url_atraccion_', '$this->uhfip_', '$this->url_reader_', '$this->cod_rfid900_', '$this->mensaje_', '$this->url_accion_bg_', '$this->url_inicio_', '$this->ledstripe1_', '$this->ledstripe2_', '$this->ledstripe3_', '$this->ledstripe4_', '$this->lasteffect_', '$this->color_' $compl_insert_val)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
              {
                  $compl_insert     = ""; 
                  $compl_insert_val = ""; 
                  if ($this->activa_ != "")
                  { 
                       $compl_insert     .= ", activa";
                       $compl_insert_val .= ", $this->activa_";
                  } 
                  if ($this->valor_default_ != "")
                  { 
                       $compl_insert     .= ", valor_default";
                       $compl_insert_val .= ", $this->valor_default_";
                  } 
                  if ($this->tipo_dev_ != "")
                  { 
                       $compl_insert     .= ", tipo_dev";
                       $compl_insert_val .= ", $this->tipo_dev_";
                  } 
                  if ($this->direccion_torno_ != "")
                  { 
                       $compl_insert     .= ", direccion_torno";
                       $compl_insert_val .= ", $this->direccion_torno_";
                  } 
                  if ($this->tokens_ != "")
                  { 
                       $compl_insert     .= ", tokens";
                       $compl_insert_val .= ", $this->tokens_";
                  } 
                  if ($this->tipolector_ != "")
                  { 
                       $compl_insert     .= ", tipolector";
                       $compl_insert_val .= ", '$this->tipolector_'";
                  } 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "cod_activo, cod_grupo, device_name, estado, ult_rfid, ult_fecha, acepta_tiempo, acepta_tokens, dev_ip, timeout_rfid, discapacitado, numcaja, empleado, serialrfid, bidireccion, cod_deviceE, url_1, url_2, url_3, foto1, foto2, foto3, pin_relay1, pin_relay2, rfid_read, rfid_estado, rfid_fecha, url_accion, url_atraccion, uhfip, url_reader, cod_rfid900, mensaje, url_accion_bg, url_inicio, ledstripe1, ledstripe2, ledstripe3, ledstripe4, lasteffect, color $compl_insert) VALUES (" . $NM_seq_auto . "'$this->cod_activo_', '$this->cod_grupo_', '$this->device_name_', $this->estado_, '$this->ult_rfid_', " . $this->Ini->date_delim . $this->ult_fecha_ . $this->Ini->date_delim1 . ", $this->acepta_tiempo_, $this->acepta_tokens_, '$this->dev_ip_', $this->timeout_rfid_, $this->discapacitado_, $this->numcaja_, $this->empleado_, '$this->serialrfid_', $this->bidireccion_, $this->cod_devicee_, '$this->url_1_', '$this->url_2_', '$this->url_3_', '', '', '', $this->pin_relay1_, $this->pin_relay2_, '$this->rfid_read_', $this->rfid_estado_, '$this->rfid_fecha_', '$this->url_accion_', '$this->url_atraccion_', '$this->uhfip_', '$this->url_reader_', '$this->cod_rfid900_', '$this->mensaje_', '$this->url_accion_bg_', '$this->url_inicio_', '$this->ledstripe1_', '$this->ledstripe2_', '$this->ledstripe3_', '$this->ledstripe4_', '$this->lasteffect_', '$this->color_' $compl_insert_val)"; 
              }
              elseif ($this->Ini->nm_tpbanco =='pdo_ibm')
              {
                  $compl_insert     = ""; 
                  $compl_insert_val = ""; 
                  if ($this->activa_ != "")
                  { 
                       $compl_insert     .= ", activa";
                       $compl_insert_val .= ", $this->activa_";
                  } 
                  if ($this->valor_default_ != "")
                  { 
                       $compl_insert     .= ", valor_default";
                       $compl_insert_val .= ", $this->valor_default_";
                  } 
                  if ($this->tipo_dev_ != "")
                  { 
                       $compl_insert     .= ", tipo_dev";
                       $compl_insert_val .= ", $this->tipo_dev_";
                  } 
                  if ($this->direccion_torno_ != "")
                  { 
                       $compl_insert     .= ", direccion_torno";
                       $compl_insert_val .= ", $this->direccion_torno_";
                  } 
                  if ($this->tokens_ != "")
                  { 
                       $compl_insert     .= ", tokens";
                       $compl_insert_val .= ", $this->tokens_";
                  } 
                  if ($this->tipolector_ != "")
                  { 
                       $compl_insert     .= ", tipolector";
                       $compl_insert_val .= ", '$this->tipolector_'";
                  } 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "cod_activo, cod_grupo, device_name, estado, ult_rfid, ult_fecha, acepta_tiempo, acepta_tokens, dev_ip, timeout_rfid, discapacitado, numcaja, empleado, serialrfid, bidireccion, cod_deviceE, url_1, url_2, url_3, foto1, foto2, foto3, pin_relay1, pin_relay2, rfid_read, rfid_estado, rfid_fecha, url_accion, url_atraccion, uhfip, url_reader, cod_rfid900, mensaje, url_accion_bg, url_inicio, ledstripe1, ledstripe2, ledstripe3, ledstripe4, lasteffect, color $compl_insert) VALUES (" . $NM_seq_auto . "'$this->cod_activo_', '$this->cod_grupo_', '$this->device_name_', $this->estado_, '$this->ult_rfid_', " . $this->Ini->date_delim . $this->ult_fecha_ . $this->Ini->date_delim1 . ", $this->acepta_tiempo_, $this->acepta_tokens_, '$this->dev_ip_', $this->timeout_rfid_, $this->discapacitado_, $this->numcaja_, $this->empleado_, '$this->serialrfid_', $this->bidireccion_, $this->cod_devicee_, '$this->url_1_', '$this->url_2_', '$this->url_3_', EMPTY_BLOB(), EMPTY_BLOB(), EMPTY_BLOB(), $this->pin_relay1_, $this->pin_relay2_, '$this->rfid_read_', $this->rfid_estado_, TO_DATE('$this->rfid_fecha_', 'yyyy-mm-dd hh24:mi:ss'), '$this->url_accion_', '$this->url_atraccion_', '$this->uhfip_', '$this->url_reader_', '$this->cod_rfid900_', '$this->mensaje_', '$this->url_accion_bg_', '$this->url_inicio_', '$this->ledstripe1_', '$this->ledstripe2_', '$this->ledstripe3_', '$this->ledstripe4_', '$this->lasteffect_', '$this->color_' $compl_insert_val)"; 
              }
              else
              {
                  $compl_insert     = ""; 
                  $compl_insert_val = ""; 
                  if ($this->activa_ != "")
                  { 
                       $compl_insert     .= ", activa";
                       $compl_insert_val .= ", $this->activa_";
                  } 
                  if ($this->valor_default_ != "")
                  { 
                       $compl_insert     .= ", valor_default";
                       $compl_insert_val .= ", $this->valor_default_";
                  } 
                  if ($this->tipo_dev_ != "")
                  { 
                       $compl_insert     .= ", tipo_dev";
                       $compl_insert_val .= ", $this->tipo_dev_";
                  } 
                  if ($this->direccion_torno_ != "")
                  { 
                       $compl_insert     .= ", direccion_torno";
                       $compl_insert_val .= ", $this->direccion_torno_";
                  } 
                  if ($this->tokens_ != "")
                  { 
                       $compl_insert     .= ", tokens";
                       $compl_insert_val .= ", $this->tokens_";
                  } 
                  if ($this->tipolector_ != "")
                  { 
                       $compl_insert     .= ", tipolector";
                       $compl_insert_val .= ", '$this->tipolector_'";
                  } 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "cod_activo, cod_grupo, device_name, estado, ult_rfid, ult_fecha, acepta_tiempo, acepta_tokens, dev_ip, timeout_rfid, discapacitado, numcaja, empleado, serialrfid, bidireccion, cod_deviceE, url_1, url_2, url_3, foto1, foto2, foto3, pin_relay1, pin_relay2, rfid_read, rfid_estado, rfid_fecha, url_accion, url_atraccion, uhfip, url_reader, cod_rfid900, mensaje, url_accion_bg, url_inicio, ledstripe1, ledstripe2, ledstripe3, ledstripe4, lasteffect, color $compl_insert) VALUES (" . $NM_seq_auto . "'$this->cod_activo_', '$this->cod_grupo_', '$this->device_name_', $this->estado_, '$this->ult_rfid_', " . $this->Ini->date_delim . $this->ult_fecha_ . $this->Ini->date_delim1 . ", $this->acepta_tiempo_, $this->acepta_tokens_, '$this->dev_ip_', $this->timeout_rfid_, $this->discapacitado_, $this->numcaja_, $this->empleado_, '$this->serialrfid_', $this->bidireccion_, $this->cod_devicee_, '$this->url_1_', '$this->url_2_', '$this->url_3_', '$this->foto1_', '$this->foto2_', '$this->foto3_', $this->pin_relay1_, $this->pin_relay2_, '$this->rfid_read_', $this->rfid_estado_, '$this->rfid_fecha_', '$this->url_accion_', '$this->url_atraccion_', '$this->uhfip_', '$this->url_reader_', '$this->cod_rfid900_', '$this->mensaje_', '$this->url_accion_bg_', '$this->url_inicio_', '$this->ledstripe1_', '$this->ledstripe2_', '$this->ledstripe3_', '$this->ledstripe4_', '$this->lasteffect_', '$this->color_' $compl_insert_val)"; 
              }
              $comando = str_replace("N'null'", "null", $comando) ; 
              $comando = str_replace("'null'", "null", $comando) ; 
              $comando = str_replace("#null#", "null", $comando) ; 
              $comando = str_replace($this->Ini->date_delim . "null" . $this->Ini->date_delim1, "null", $comando) ; 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                $comando = str_replace("EXTEND('', YEAR TO FRACTION)", "null", $comando) ; 
                $comando = str_replace("EXTEND(null, YEAR TO FRACTION)", "null", $comando) ; 
                $comando = str_replace("EXTEND('', YEAR TO DAY)", "null", $comando) ; 
                $comando = str_replace("EXTEND(null, YEAR TO DAY)", "null", $comando) ; 
              }  
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = $comando; 
              $rs = $this->Db->Execute($comando); 
              if ($rs === false)  
              { 
                  if (FALSE === strpos(strtoupper($this->Db->ErrorMsg()), "MAIL SENT") && FALSE === strpos(strtoupper($this->Db->ErrorMsg()), "WARNING"))
                  {
                      $dbErrorMessage = $this->Db->ErrorMsg();
                      $dbErrorCode = $this->Db->ErrorNo();
                      $this->handleDbErrorMessage($dbErrorMessage, $dbErrorCode);
                      $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_inst'], $dbErrorMessage, true);
                      if (isset($_SESSION['scriptcase']['erro_handler']) && $_SESSION['scriptcase']['erro_handler'])
                      { 
                          $this->sc_erro_insert = $dbErrorMessage;
                          $this->nmgp_opcao     = 'refresh_insert';
                          $this->NM_rollback_db(); 
                          if ($this->NM_ajax_flag)
                          {
                              form_devices_leds_effects_pack_ajax_response();
                              exit; 
                          }
                      }  
                  }  
              }  
              if ('refresh_insert' != $this->nmgp_opcao)
              {
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase)) 
              { 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select @@identity"; 
                  $rsy = $this->Db->Execute($_SESSION['scriptcase']['sc_sql_ult_comando']); 
                  if ($rsy === false && !$rsy->EOF)  
                  { 
                      $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
                      $this->NM_rollback_db(); 
                      if ($this->NM_ajax_flag)
                      {
                          form_devices_leds_effects_pack_ajax_response();
                      }
                      exit; 
                  } 
                  $this->cod_device_ =  $rsy->fields[0];
                 $rsy->Close(); 
              } 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
              { 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select last_insert_id()"; 
                  $rsy = $this->Db->Execute($_SESSION['scriptcase']['sc_sql_ult_comando']); 
                  if ($rsy === false && !$rsy->EOF)  
                  { 
                      $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
                      exit; 
                  } 
                  $this->cod_device_ = $rsy->fields[0];
                  $rsy->Close(); 
              } 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              { 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "SELECT dbinfo('sqlca.sqlerrd1') FROM " . $this->Ini->nm_tabela; 
                  $rsy = $this->Db->Execute($_SESSION['scriptcase']['sc_sql_ult_comando']); 
                  if ($rsy === false && !$rsy->EOF)  
                  { 
                      $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
                      exit; 
                  } 
                  $this->cod_device_ = $rsy->fields[0];
                  $rsy->Close(); 
              } 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              { 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select .currval from dual"; 
                  $rsy = $this->Db->Execute($_SESSION['scriptcase']['sc_sql_ult_comando']); 
                  if ($rsy === false && !$rsy->EOF)  
                  { 
                      $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
                      exit; 
                  } 
                  $this->cod_device_ = $rsy->fields[0];
                  $rsy->Close(); 
              } 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
              { 
                  $str_tabela = "SYSIBM.SYSDUMMY1"; 
                  if($this->Ini->nm_con_use_schema == "N") 
                  { 
                          $str_tabela = "SYSDUMMY1"; 
                  } 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "SELECT IDENTITY_VAL_LOCAL() FROM " . $str_tabela; 
                  $rsy = $this->Db->Execute($_SESSION['scriptcase']['sc_sql_ult_comando']); 
                  if ($rsy === false && !$rsy->EOF)  
                  { 
                      $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
                      exit; 
                  } 
                  $this->cod_device_ = $rsy->fields[0];
                  $rsy->Close(); 
              } 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
              { 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select CURRVAL('')"; 
                  $rsy = $this->Db->Execute($_SESSION['scriptcase']['sc_sql_ult_comando']); 
                  if ($rsy === false && !$rsy->EOF)  
                  { 
                      $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
                      exit; 
                  } 
                  $this->cod_device_ = $rsy->fields[0];
                  $rsy->Close(); 
              } 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
              { 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select gen_id(, 0) from " . $this->Ini->nm_tabela; 
                  $rsy = $this->Db->Execute($_SESSION['scriptcase']['sc_sql_ult_comando']); 
                  if ($rsy === false && !$rsy->EOF)  
                  { 
                      $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
                      exit; 
                  } 
                  $this->cod_device_ = $rsy->fields[0];
                  $rsy->Close(); 
              } 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
              { 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select last_insert_rowid()"; 
                  $rsy = $this->Db->Execute($_SESSION['scriptcase']['sc_sql_ult_comando']); 
                  if ($rsy === false && !$rsy->EOF)  
                  { 
                      $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
                      exit; 
                  } 
                  $this->cod_device_ = $rsy->fields[0];
                  $rsy->Close(); 
              } 
              $this->cod_activo_ = $this->cod_activo__before_qstr;
              $this->cod_grupo_ = $this->cod_grupo__before_qstr;
              $this->device_name_ = $this->device_name__before_qstr;
              $this->ult_rfid_ = $this->ult_rfid__before_qstr;
              $this->dev_ip_ = $this->dev_ip__before_qstr;
              $this->serialrfid_ = $this->serialrfid__before_qstr;
              $this->url_1_ = $this->url_1__before_qstr;
              $this->url_2_ = $this->url_2__before_qstr;
              $this->url_3_ = $this->url_3__before_qstr;
              $this->rfid_read_ = $this->rfid_read__before_qstr;
              $this->url_accion_ = $this->url_accion__before_qstr;
              $this->url_atraccion_ = $this->url_atraccion__before_qstr;
              $this->uhfip_ = $this->uhfip__before_qstr;
              $this->url_reader_ = $this->url_reader__before_qstr;
              $this->cod_rfid900_ = $this->cod_rfid900__before_qstr;
              $this->mensaje_ = $this->mensaje__before_qstr;
              $this->tipolector_ = $this->tipolector__before_qstr;
              $this->url_accion_bg_ = $this->url_accion_bg__before_qstr;
              $this->url_inicio_ = $this->url_inicio__before_qstr;
              $this->ledstripe1_ = $this->ledstripe1__before_qstr;
              $this->ledstripe2_ = $this->ledstripe2__before_qstr;
              $this->ledstripe3_ = $this->ledstripe3__before_qstr;
              $this->ledstripe4_ = $this->ledstripe4__before_qstr;
              $this->lasteffect_ = $this->lasteffect__before_qstr;
              $this->color_ = $this->color__before_qstr;
              if (in_array(strtolower($this->Ini->nm_tpbanco), $nm_bases_lob_geral))
              { 
                  if (trim($this->foto1_ ) != "") 
                  { 
                      $_SESSION['scriptcase']['sc_sql_ult_comando'] = "UpdateBlob(" . $this->Ini->nm_tabela . ",  foto1 , $this->foto1_,  \"cod_device = $this->cod_device_\")"; 
                      $rs = $this->Db->UpdateBlob($this->Ini->nm_tabela, "foto1", $this->foto1_,  "cod_device = $this->cod_device_"); 
                      if ($rs === false)  
                      { 
                          $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_inst'], $this->Db->ErrorMsg()); 
                          $this->NM_rollback_db(); 
                          if ($this->NM_ajax_flag)
                          {
                              form_devices_leds_effects_pack_ajax_response();
                          }
                          exit; 
                      }  
                  }  
                  if (trim($this->foto2_ ) != "") 
                  { 
                      $_SESSION['scriptcase']['sc_sql_ult_comando'] = "UpdateBlob(" . $this->Ini->nm_tabela . ",  foto2 , $this->foto2_,  \"cod_device = $this->cod_device_\")"; 
                      $rs = $this->Db->UpdateBlob($this->Ini->nm_tabela, "foto2", $this->foto2_,  "cod_device = $this->cod_device_"); 
                      if ($rs === false)  
                      { 
                          $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_inst'], $this->Db->ErrorMsg()); 
                          $this->NM_rollback_db(); 
                          if ($this->NM_ajax_flag)
                          {
                              form_devices_leds_effects_pack_ajax_response();
                          }
                          exit; 
                      }  
                  }  
                  if (trim($this->foto3_ ) != "") 
                  { 
                      $_SESSION['scriptcase']['sc_sql_ult_comando'] = "UpdateBlob(" . $this->Ini->nm_tabela . ",  foto3 , $this->foto3_,  \"cod_device = $this->cod_device_\")"; 
                      $rs = $this->Db->UpdateBlob($this->Ini->nm_tabela, "foto3", $this->foto3_,  "cod_device = $this->cod_device_"); 
                      if ($rs === false)  
                      { 
                          $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_inst'], $this->Db->ErrorMsg()); 
                          $this->NM_rollback_db(); 
                          if ($this->NM_ajax_flag)
                          {
                              form_devices_leds_effects_pack_ajax_response();
                          }
                          exit; 
                      }  
                  }  
              }  
              }

              $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['db_changed'] = true;

              $this->sc_evento = "insert"; 
              $this->cod_activo_ = $this->cod_activo__before_qstr;
              $this->cod_grupo_ = $this->cod_grupo__before_qstr;
              $this->device_name_ = $this->device_name__before_qstr;
              $this->ult_rfid_ = $this->ult_rfid__before_qstr;
              $this->dev_ip_ = $this->dev_ip__before_qstr;
              $this->serialrfid_ = $this->serialrfid__before_qstr;
              $this->url_1_ = $this->url_1__before_qstr;
              $this->url_2_ = $this->url_2__before_qstr;
              $this->url_3_ = $this->url_3__before_qstr;
              $this->rfid_read_ = $this->rfid_read__before_qstr;
              $this->url_accion_ = $this->url_accion__before_qstr;
              $this->url_atraccion_ = $this->url_atraccion__before_qstr;
              $this->uhfip_ = $this->uhfip__before_qstr;
              $this->url_reader_ = $this->url_reader__before_qstr;
              $this->cod_rfid900_ = $this->cod_rfid900__before_qstr;
              $this->mensaje_ = $this->mensaje__before_qstr;
              $this->tipolector_ = $this->tipolector__before_qstr;
              $this->url_accion_bg_ = $this->url_accion_bg__before_qstr;
              $this->url_inicio_ = $this->url_inicio__before_qstr;
              $this->ledstripe1_ = $this->ledstripe1__before_qstr;
              $this->ledstripe2_ = $this->ledstripe2__before_qstr;
              $this->ledstripe3_ = $this->ledstripe3__before_qstr;
              $this->ledstripe4_ = $this->ledstripe4__before_qstr;
              $this->lasteffect_ = $this->lasteffect__before_qstr;
              $this->color_ = $this->color__before_qstr;
              $this->sc_teve_incl = true; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['dados_select'][$sc_seq_vert]['cod_device_'] = $this->cod_device_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['dados_select'][$sc_seq_vert]['device_name_'] = $this->device_name_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['dados_select'][$sc_seq_vert]['ledstripe1_'] = $this->ledstripe1_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['dados_select'][$sc_seq_vert]['ledstripe2_'] = $this->ledstripe2_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['dados_select'][$sc_seq_vert]['ledstripe3_'] = $this->ledstripe3_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['dados_select'][$sc_seq_vert]['ledstripe4_'] = $this->ledstripe4_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['dados_select'][$sc_seq_vert]['color_'] = $this->color_;
              if (!empty($this->sc_force_zero))
              {
                  foreach ($this->sc_force_zero as $i_force_zero => $sc_force_zero_field)
                  {
                      eval('if ($this->' . $sc_force_zero_field . ' == 0) {$this->' . $sc_force_zero_field . ' = "";}');
                  }
              }
              $this->sc_force_zero = array();
              if (!empty($NM_val_null))
              {
                  foreach ($NM_val_null as $i_val_null => $sc_val_null_field)
                  {
                      eval('$this->' . $sc_val_null_field . ' = "";');
                  }
              }
              if (isset($this->cod_device_)) { $this->nm_limpa_alfa($this->cod_device_); }
              if (isset($this->device_name_)) { $this->nm_limpa_alfa($this->device_name_); }
              if (isset($this->ledstripe1_)) { $this->nm_limpa_alfa($this->ledstripe1_); }
              if (isset($this->ledstripe2_)) { $this->nm_limpa_alfa($this->ledstripe2_); }
              if (isset($this->ledstripe3_)) { $this->nm_limpa_alfa($this->ledstripe3_); }
              if (isset($this->ledstripe4_)) { $this->nm_limpa_alfa($this->ledstripe4_); }
              if (isset($this->color_)) { $this->nm_limpa_alfa($this->color_); }
              if (isset($this->Embutida_form) && $this->Embutida_form)
              {
                  $this->nm_guardar_campos();
                  $this->nm_formatar_campos();

                  $tmpLabel_cod_device_ = $this->cod_device_;
                  $this->NM_ajax_info['fldList']['cod_device_' . $this->nmgp_refresh_row]['type']    = 'label';
                  $this->NM_ajax_info['fldList']['cod_device_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input(NM_charset_to_utf8($this->cod_device_)));
                  $this->NM_ajax_info['fldList']['cod_device_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input(NM_charset_to_utf8($tmpLabel_cod_device_)));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['cod_device_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['cod_device_' . $this->nmgp_refresh_row] = "on";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['cod_device_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['cod_device_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $this->NM_ajax_info['fldList']['device_name_' . $this->nmgp_refresh_row]['type']    = 'text';
                  $this->NM_ajax_info['fldList']['device_name_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input(NM_charset_to_utf8($this->device_name_)));
                  $this->NM_ajax_info['fldList']['device_name_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input(NM_charset_to_utf8($tmpLabel_device_name_)));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['device_name_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['device_name_' . $this->nmgp_refresh_row] = "on";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['device_name_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['device_name_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $aLookup = array();
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['Lookup_ledstripe1_']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['Lookup_ledstripe1_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['Lookup_ledstripe1_']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['Lookup_ledstripe1_'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_cod_device_ = $this->cod_device_;
   $this->nm_tira_formatacao();


   $unformatted_value_cod_device_ = $this->cod_device_;

   $nm_comando = "SELECT comando, descrip  FROM ledeffects  ORDER BY descrip";

   $this->cod_device_ = $old_value_cod_device_;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $aLookup[] = array(form_devices_leds_effects_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', form_devices_leds_effects_pack_protect_string(NM_charset_to_utf8($rs->fields[0] . " - " . $rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[0] . " - " . $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['Lookup_ledstripe1_'][] = $rs->fields[0];
              $rs->MoveNext() ; 
       } 
       $rs->Close() ; 
   } 
   elseif ($GLOBALS["NM_ERRO_IBASE"] != 1 && $nm_comando != "")  
   {  
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit; 
   } 
   $GLOBALS["NM_ERRO_IBASE"] = 0; 
          $sLabelTemp = '';
          foreach ($aLookup as $aValData)
          {
              if (key($aValData) == form_devices_leds_effects_pack_protect_string(NM_charset_to_utf8($this->ledstripe1_)))
              {
                  $sLabelTemp = current($aValData);
              }
          }
          $tmpLabel_ledstripe1_ = $sLabelTemp;
                  $this->NM_ajax_info['fldList']['ledstripe1_' . $this->nmgp_refresh_row]['type']    = 'select';
                  $this->NM_ajax_info['fldList']['ledstripe1_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input(NM_charset_to_utf8($this->ledstripe1_)));
                  $this->NM_ajax_info['fldList']['ledstripe1_' . $this->nmgp_refresh_row]['labList'] = array($tmpLabel_ledstripe1_);

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['ledstripe1_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['ledstripe1_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['ledstripe1_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['ledstripe1_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $this->NM_ajax_info['fldList']['ledstripe2_' . $this->nmgp_refresh_row]['type']    = 'text';
                  $this->NM_ajax_info['fldList']['ledstripe2_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input(NM_charset_to_utf8($this->ledstripe2_)));
                  $this->NM_ajax_info['fldList']['ledstripe2_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input(NM_charset_to_utf8($tmpLabel_ledstripe2_)));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['ledstripe2_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['ledstripe2_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['ledstripe2_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['ledstripe2_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $this->NM_ajax_info['fldList']['ledstripe3_' . $this->nmgp_refresh_row]['type']    = 'text';
                  $this->NM_ajax_info['fldList']['ledstripe3_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input(NM_charset_to_utf8($this->ledstripe3_)));
                  $this->NM_ajax_info['fldList']['ledstripe3_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input(NM_charset_to_utf8($tmpLabel_ledstripe3_)));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['ledstripe3_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['ledstripe3_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['ledstripe3_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['ledstripe3_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $this->NM_ajax_info['fldList']['ledstripe4_' . $this->nmgp_refresh_row]['type']    = 'text';
                  $this->NM_ajax_info['fldList']['ledstripe4_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input(NM_charset_to_utf8($this->ledstripe4_)));
                  $this->NM_ajax_info['fldList']['ledstripe4_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input(NM_charset_to_utf8($tmpLabel_ledstripe4_)));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['ledstripe4_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['ledstripe4_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['ledstripe4_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['ledstripe4_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $this->NM_ajax_info['fldList']['color_' . $this->nmgp_refresh_row]['type']    = 'text';
                  $this->NM_ajax_info['fldList']['color_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input(NM_charset_to_utf8($this->color_)));
                  $this->NM_ajax_info['fldList']['color_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input(NM_charset_to_utf8($tmpLabel_color_)));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['color_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['color_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['color_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['color_' . $this->nmgp_refresh_row] = "on";
                      }
                  }


                  $this->nm_tira_formatacao();

                  $this->NM_ajax_info['closeLine'] = $this->nmgp_refresh_row;
              }
              if ('refresh_insert' != $this->nmgp_opcao && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['sc_redir_insert']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['sc_redir_insert'] != "S"))
              {
              $this->nmgp_opcao = "novo"; 
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['run_iframe'] == "R")
              { 
                   $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['return_edit'] = "new";
              } 
              }
              $this->nm_flag_iframe = true;
          } 
          if ($this->lig_edit_lookup)
          {
              $this->lig_edit_lookup_call = true;
          }
      } 
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['decimal_db'] == ",") 
      {
          $this->nm_tira_aspas_decimal();
      }
      if ($this->nmgp_opcao == "excluir") 
      { 
          $this->cod_device_ = substr($this->Db->qstr($this->cod_device_), 1, -1); 

          $bDelecaoOk = true;
          $sMsgErro   = '';

          if ($bDelecaoOk)
          {

          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where cod_device = $this->cod_device_"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where cod_device = $this->cod_device_ "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where cod_device = $this->cod_device_"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where cod_device = $this->cod_device_ "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where cod_device = $this->cod_device_"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where cod_device = $this->cod_device_ "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where cod_device = $this->cod_device_"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where cod_device = $this->cod_device_ "); 
          }  
          else  
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where cod_device = $this->cod_device_"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where cod_device = $this->cod_device_ "); 
          }  
          if ($rs1 === false)  
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
              exit; 
          }  
          if ($rs1 === false)  
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
              exit; 
          }  
          $tmp_result = (int) $rs1->fields[0]; 
          if ($tmp_result != 1) 
          { 
              $this->Campos_Mens_erro = $this->Ini->Nm_lang['lang_errm_dele_nfnd']; 
              $this->nmgp_opcao = "nada"; 
              $this->sc_evento = 'delete';
          } 
          else 
          { 
              $rs1->Close(); 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              {
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where cod_device = $this->cod_device_ "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where cod_device = $this->cod_device_ "); 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where cod_device = $this->cod_device_ "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where cod_device = $this->cod_device_ "); 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              {
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where cod_device = $this->cod_device_ "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where cod_device = $this->cod_device_ "); 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where cod_device = $this->cod_device_ "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where cod_device = $this->cod_device_ "); 
              }  
              else  
              {
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where cod_device = $this->cod_device_ "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where cod_device = $this->cod_device_ "); 
              }  
              if ($rs === false) 
              { 
                  $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dele'], $this->Db->ErrorMsg(), true); 
                  if (isset($_SESSION['scriptcase']['erro_handler']) && $_SESSION['scriptcase']['erro_handler']) 
                  { 
                      $this->sc_erro_delete = $this->Db->ErrorMsg();  
                      $this->NM_rollback_db(); 
                      if ($this->NM_ajax_flag)
                      {
                          form_devices_leds_effects_pack_ajax_response();
                          exit; 
                      }
                  } 
              } 
              $this->sc_evento = "delete"; 
              $this->nmgp_opcao = "avanca"; 
              $this->nm_flag_iframe = true;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['reg_start']--; 
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['reg_start'] < 0)
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['reg_start'] = 0; 
              }

              $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['db_changed'] = true;

              $this->sc_teve_excl = true; 
              if ($this->lig_edit_lookup)
              {
                  $this->lig_edit_lookup_call = true;
              }
          }

          }
          else
          {
              $this->sc_evento = "delete"; 
              $this->nmgp_opcao = "igual"; 
              $this->Erro->mensagem(__FILE__, __LINE__, "critica", $sMsgErro); 
          }

      }  
      if (!empty($this->sc_force_zero))
      {
          foreach ($this->sc_force_zero as $i_force_zero => $sc_force_zero_field)
          {
              eval('if ($this->' . $sc_force_zero_field . ' == 0) {$this->' . $sc_force_zero_field . ' = "";}');
          }
      }
      $this->sc_force_zero = array();
      if (!empty($NM_val_null))
      {
          foreach ($NM_val_null as $i_val_null => $sc_val_null_field)
          {
              eval('$this->' . $sc_val_null_field . ' = "";');
          }
      }
      if ($salva_opcao == "incluir" && $GLOBALS["erro_incl"] != 1) 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['parms'] = "cod_device_?#?$this->cod_device_?@?"; 
      }
      if ($this->sc_evento != "insert" && $this->sc_evento != "update" && $this->sc_evento != "delete")
      { 
          $this->cod_device_ = null === $this->cod_device_ ? null : substr($this->Db->qstr($this->cod_device_), 1, -1); 
      } 
   }
//---------- 
   function nm_select_banco() 
   { 
      global $nm_form_submit, $sc_seq_vert, $sc_check_incl, $teste_validade, $sc_where;
 
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_devices_leds_effects']['rows']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['form_devices_leds_effects']['rows']))
      {
          $this->sc_max_reg = $_SESSION['scriptcase']['sc_apl_conf']['form_devices_leds_effects']['rows'];
      } 
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_devices_leds_effects']['rows_ins']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['form_devices_leds_effects']['rows_ins']))
      {
          $this->sc_max_reg_incl = $_SESSION['scriptcase']['sc_apl_conf']['form_devices_leds_effects']['rows_ins'];
      } 
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['embutida_liga_qtd_reg']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['embutida_liga_qtd_reg'])
      {
          $this->sc_max_reg = $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['embutida_liga_qtd_reg'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['sc_max_reg']) && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['sc_max_reg'] > 0 || strtolower($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['sc_max_reg']) == "all"))
      {
          $this->sc_max_reg = $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['sc_max_reg'];
      } 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $GLOBALS["NM_ERRO_IBASE"] = 0;  
      $this->form_vert_form_devices_leds_effects = array();
      if ($this->nmgp_opcao != "novo") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['parms'] = ""; 
      } 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
      { 
          $GLOBALS["NM_ERRO_IBASE"] = 1;  
      } 
      if ($this->sc_teve_excl)
      {
          $this->nmgp_opcao = "avanca";
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['reg_start'] -= $this->sc_max_reg;
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['reg_start']) || empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['reg_start']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['reg_start'] = 0;
      }
      if (isset($this->NM_where_filter))
      {
          $this->NM_where_filter = str_replace("@percent@", "%", $this->NM_where_filter);
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['where_filter'] = trim($this->NM_where_filter);
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['total']))
          {
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['total']);
          }
      }
      $sc_where_filter = '';
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['where_filter_form']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['where_filter_form'])
      {
          $sc_where_filter = $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['where_filter_form'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['where_filter']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['where_filter'] && $sc_where_filter != $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['where_filter'])
      {
          if (empty($sc_where_filter))
          {
              $sc_where_filter = $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['where_filter'];
          }
          else
          {
              $sc_where_filter .= " and (" . $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['where_filter'] . ")";
          }
      }
      $sc_where = "";
      if ('' != $sc_where_filter)
      {
          $sc_where = (isset($sc_where) && '' != $sc_where) ? $sc_where . ' and (' . $sc_where_filter . ')' : ' where ' . $sc_where_filter;
      }
      if (((isset($this->NM_ajax_opcao) && 'backup_line' == $this->NM_ajax_opcao) || (isset($this->NM_btn_navega) && 'N' == $this->NM_btn_navega)) && !$this->has_where_params && 'novo' != $this->nmgp_opcao)
      {
          $aNewWhereCond = array();
          if (null != $this->cod_device_)
          {
              $aNewWhereCond[] = "cod_device = " . $this->cod_device_;
          }
          if (!$this->NM_ajax_flag)
          {
              $this->NM_btn_navega = "S";
          }
          elseif (!empty($aNewWhereCond))
          {
              if ('' == $sc_where)
              {
                  $sc_where = " where (";
              }
              else
              {
                  $sc_where .= " and (";
              }
              $sc_where .= implode(" and ", $aNewWhereCond) . ")";
          }
      }
      if ('total' != $this->form_paginacao)
      {
          if ($this->app_is_initializing || $this->sc_teve_excl || $this->sc_teve_incl || (isset($_POST['master_nav']) && 'on' == $_POST['master_nav']) || !isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['total']))
          {
              $nmgp_select = "SELECT count(*) AS countTest from " . $this->Ini->nm_tabela . $sc_where;
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select;
              $rt = $this->Db->Execute($nmgp_select);
              if ($rt === false && !$rt->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1)
              {
                  $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
                  exit;
              }
              $qt_geral_reg_form_devices_leds_effects = isset($rt->fields[0]) ? $rt->fields[0] - 1 : 0;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['total'] = $qt_geral_reg_form_devices_leds_effects;
              $rt->Close();
          }
      if ((isset($_POST['master_nav']) && 'on' == $_POST['master_nav']) || !isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['total']) || $this->sc_teve_excl || $this->sc_teve_incl)
      { 
          if (!$this->sc_teve_excl && !$this->sc_teve_incl) 
          { 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['reg_start'] = 0; 
          } 
          if ($this->nmgp_opcao == "igual" && isset($this->NM_btn_navega) && 'S' == $this->NM_btn_navega && !empty($this->cod_device_))
          {
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              {
                  $Key_Where = "cod_device < $this->cod_device_ "; 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
                  $Key_Where = "cod_device < $this->cod_device_ "; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              {
                  $Key_Where = "cod_device < $this->cod_device_ "; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $Key_Where = "cod_device < $this->cod_device_ "; 
              }
              else  
              {
                  $Key_Where = "cod_device < $this->cod_device_ "; 
              }
              $Where_Start = (empty($sc_where)) ? " where " . $Key_Where :  $sc_where . " and (" . $Key_Where . ")";
              $nmgp_select = "SELECT count(*) AS countTest from " . $this->Ini->nm_tabela . $Where_Start; 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
              $rt = $this->Db->Execute($nmgp_select) ; 
              if ($rt === false && !$rt->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
              { 
                  $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
                  exit ; 
              }  
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['reg_start'] = $rt->fields[0];
              $rt->Close(); 
          }
      } 
      else 
      { 
          $qt_geral_reg_form_devices_leds_effects = $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['total'];
      } 
      if ($this->nmgp_opcao == "inicio" || $this->nmgp_opcao == "ordem") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['reg_start'] = 0; 
      } 
      if ($this->nmgp_opcao == "navpage" && ($this->nmgp_ordem - 1) <= $qt_geral_reg_form_devices_leds_effects) 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['reg_start'] = $this->nmgp_ordem - 1; 
      } 
      if ($this->nmgp_opcao == "avanca")  
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['reg_start'] += $this->sc_max_reg; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['reg_start'] > $qt_geral_reg_form_devices_leds_effects)
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['reg_start'] = $qt_geral_reg_form_devices_leds_effects - $this->sc_max_reg; 
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['reg_start'] < 0)
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['reg_start'] = 0; 
              }
          }
      } 
      if ($this->nmgp_opcao == "retorna") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['reg_start'] -= $this->sc_max_reg; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['reg_start'] < 0)
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['reg_start'] = 0; 
          }
      } 
      if ($this->nmgp_opcao == "final") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['reg_start'] = ($qt_geral_reg_form_devices_leds_effects + 1) - $this->sc_max_reg; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['reg_start'] < 0)
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['reg_start'] = 0; 
          }
      } 
      }
      $Cmps_ord_def = array();
      $sc_order_by  = "";
      $sc_order_by = "cod_device";
      $sc_order_by = str_replace("order by ", "", $sc_order_by);
      $sc_order_by = str_replace("ORDER BY ", "", trim($sc_order_by));
      if (!empty($sc_order_by))
      {
          $sc_order_by = " order by $sc_order_by "; 
      }
      if ($this->nmgp_opcao == "ordem" && in_array($this->nmgp_ordem, $Cmps_ord_def)) 
      { 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['ordem_cmp'] != $this->nmgp_ordem)
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['ordem_cmp'] = $this->nmgp_ordem; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['ordem_ord'] = ' asc'; 
              switch ($this->nmgp_ordem) {
                  case "cod_device":
                      $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['ordem_ord'] = ' desc';
                      break;
                  case "activa":
                      $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['ordem_ord'] = ' desc';
                      break;
                  case "estado":
                      $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['ordem_ord'] = ' desc';
                      break;
                  case "ult_fecha":
                      $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['ordem_ord'] = ' desc';
                      break;
                  case "valor_default":
                      $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['ordem_ord'] = ' desc';
                      break;
                  case "acepta_tiempo":
                      $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['ordem_ord'] = ' desc';
                      break;
                  case "acepta_tokens":
                      $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['ordem_ord'] = ' desc';
                      break;
                  case "tipo_dev":
                      $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['ordem_ord'] = ' desc';
                      break;
                  case "direccion_torno":
                      $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['ordem_ord'] = ' desc';
                      break;
                  case "timeout_rfid":
                      $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['ordem_ord'] = ' desc';
                      break;
                  case "discapacitado":
                      $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['ordem_ord'] = ' desc';
                      break;
                  case "numcaja":
                      $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['ordem_ord'] = ' desc';
                      break;
                  case "empleado":
                      $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['ordem_ord'] = ' desc';
                      break;
                  case "tokens":
                      $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['ordem_ord'] = ' desc';
                      break;
                  case "bidireccion":
                      $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['ordem_ord'] = ' desc';
                      break;
                  case "cod_deviceE":
                      $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['ordem_ord'] = ' desc';
                      break;
                  case "pin_relay1":
                      $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['ordem_ord'] = ' desc';
                      break;
                  case "pin_relay2":
                      $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['ordem_ord'] = ' desc';
                      break;
                  case "rfid_estado":
                      $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['ordem_ord'] = ' desc';
                      break;
                  case "rfid_fecha":
                      $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['ordem_ord'] = ' desc';
                      break;
                  default:
                      $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['ordem_ord'] = ' asc';
                      break;
              }
          }
          elseif ($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['ordem_ord'] == ' asc')
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['ordem_ord'] = ' desc'; 
          }
          else
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['ordem_ord'] = ' asc'; 
          }
      } 
      if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['ordem_cmp'])) 
      { 
          $sc_order_by = " order by " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['ordem_cmp'] . $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['ordem_ord']; 
      } 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
          $nmgp_select = "SELECT cod_device, cod_activo, cod_grupo, device_name, activa, estado, ult_rfid, str_replace (convert(char(10),ult_fecha,102), '.', '-') + ' ' + convert(char(8),ult_fecha,20), valor_default, acepta_tiempo, acepta_tokens, dev_ip, tipo_dev, direccion_torno, timeout_rfid, discapacitado, numcaja, empleado, tokens, serialrfid, bidireccion, cod_deviceE, url_1, url_2, url_3, foto1, foto2, foto3, pin_relay1, pin_relay2, rfid_read, rfid_estado, rfid_fecha, url_accion, url_atraccion, uhfip, url_reader, cod_rfid900, mensaje, tipolector, url_accion_bg, url_inicio, ledstripe1, ledstripe2, ledstripe3, ledstripe4, lasteffect, color from " . $this->Ini->nm_tabela . $sc_where . $sc_order_by; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nmgp_select = "SELECT cod_device, cod_activo, cod_grupo, device_name, activa, estado, ult_rfid, convert(char(23),ult_fecha,121), valor_default, acepta_tiempo, acepta_tokens, dev_ip, tipo_dev, direccion_torno, timeout_rfid, discapacitado, numcaja, empleado, tokens, serialrfid, bidireccion, cod_deviceE, url_1, url_2, url_3, foto1, foto2, foto3, pin_relay1, pin_relay2, rfid_read, rfid_estado, rfid_fecha, url_accion, url_atraccion, uhfip, url_reader, cod_rfid900, mensaje, tipolector, url_accion_bg, url_inicio, ledstripe1, ledstripe2, ledstripe3, ledstripe4, lasteffect, color from " . $this->Ini->nm_tabela . $sc_where . $sc_order_by; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
      { 
          $nmgp_select = "SELECT cod_device, cod_activo, cod_grupo, device_name, activa, estado, ult_rfid, ult_fecha, valor_default, acepta_tiempo, acepta_tokens, dev_ip, tipo_dev, direccion_torno, timeout_rfid, discapacitado, numcaja, empleado, tokens, serialrfid, bidireccion, cod_deviceE, url_1, url_2, url_3, foto1, foto2, foto3, pin_relay1, pin_relay2, rfid_read, rfid_estado, TO_DATE(TO_CHAR(rfid_fecha, 'yyyy-mm-dd hh24:mi:ss'), 'yyyy-mm-dd hh24:mi:ss'), url_accion, url_atraccion, uhfip, url_reader, cod_rfid900, mensaje, tipolector, url_accion_bg, url_inicio, ledstripe1, ledstripe2, ledstripe3, ledstripe4, lasteffect, color from " . $this->Ini->nm_tabela . $sc_where . $sc_order_by; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
      { 
          $nmgp_select = "SELECT cod_device, cod_activo, cod_grupo, device_name, activa, estado, ult_rfid, EXTEND(ult_fecha, YEAR TO FRACTION), valor_default, acepta_tiempo, acepta_tokens, dev_ip, tipo_dev, direccion_torno, timeout_rfid, discapacitado, numcaja, empleado, tokens, serialrfid, bidireccion, cod_deviceE, url_1, url_2, url_3, LOTOFILE(foto1, '" . $this->Ini->root . $this->Ini->path_imag_temp . "/sc_blob_foto1', 'client'), LOTOFILE(foto2, '" . $this->Ini->root . $this->Ini->path_imag_temp . "/sc_blob_foto2', 'client'), LOTOFILE(foto3, '" . $this->Ini->root . $this->Ini->path_imag_temp . "/sc_blob_foto3', 'client'), pin_relay1, pin_relay2, rfid_read, rfid_estado, rfid_fecha, url_accion, url_atraccion, uhfip, url_reader, cod_rfid900, mensaje, tipolector, url_accion_bg, url_inicio, ledstripe1, ledstripe2, ledstripe3, ledstripe4, lasteffect, color from " . $this->Ini->nm_tabela . $sc_where . $sc_order_by; 
      } 
      else 
      { 
          $nmgp_select = "SELECT cod_device, cod_activo, cod_grupo, device_name, activa, estado, ult_rfid, ult_fecha, valor_default, acepta_tiempo, acepta_tokens, dev_ip, tipo_dev, direccion_torno, timeout_rfid, discapacitado, numcaja, empleado, tokens, serialrfid, bidireccion, cod_deviceE, url_1, url_2, url_3, foto1, foto2, foto3, pin_relay1, pin_relay2, rfid_read, rfid_estado, rfid_fecha, url_accion, url_atraccion, uhfip, url_reader, cod_rfid900, mensaje, tipolector, url_accion_bg, url_inicio, ledstripe1, ledstripe2, ledstripe3, ledstripe4, lasteffect, color from " . $this->Ini->nm_tabela . $sc_where . $sc_order_by; 
      } 
      if ($this->nmgp_opcao != "novo") 
      { 
      if (isset($this->NM_ajax_opcao) && 'backup_line' == $this->NM_ajax_opcao)
      {
          $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select;
          $rs = $this->Db->Execute($nmgp_select) ;
      }
      elseif ('total' == $this->form_paginacao)
      {
          $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
          $rs = $this->Db->Execute($nmgp_select) ; 
      }
      else
      {
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['run_iframe'] == "R")
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
              $rs = $this->Db->Execute($nmgp_select) ; 
          } 
          else 
          { 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
              { 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "SelectLimit($nmgp_select, $this->sc_max_reg, " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['reg_start'] . ")" ; 
                  $rs = $this->Db->SelectLimit($nmgp_select, $this->sc_max_reg, $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['reg_start']) ; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              { 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "SelectLimit($nmgp_select, $this->sc_max_reg, " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['reg_start'] . ")" ; 
                  $rs = $this->Db->SelectLimit($nmgp_select, $this->sc_max_reg, $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['reg_start']) ; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              { 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "SelectLimit($nmgp_select, $this->sc_max_reg, " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['reg_start'] . ")" ; 
                  $rs = $this->Db->SelectLimit($nmgp_select, $this->sc_max_reg, $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['reg_start']) ; 
              } 
              else  
              { 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
                  $rs = $this->Db->Execute($nmgp_select) ; 
                  if (!$rs === false && !$rs->EOF) 
                  { 
                      $rs->Move($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['reg_start']) ;  
                  } 
              } 
          } 
      }
          if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
              exit ; 
          }  
          if ($rs === false && $GLOBALS["NM_ERRO_IBASE"] == 1) 
          { 
              $GLOBALS["NM_ERRO_IBASE"] = 0; 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_nfnd_extr'], $this->Db->ErrorMsg()); 
              exit ; 
          }  
          if ($rs->EOF && $this->nmgp_botoes['new'] != "on" && !$this->proc_fast_search)
          {
              $this->nmgp_form_empty = true;
          }
          if ($rs->EOF)
          {
              $sc_seq_vert = 0; 
              if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['where_filter']))
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['empty_filter'] = true;
              }
          }
          else
          {
              $sc_seq_vert = 1; 
          }
          if ('total' == $this->form_paginacao)
          {
              $bPagTest = true;
              $this->sc_max_reg = 0;
          }
          else
          {
              $bPagTest = $sc_seq_vert <= $this->sc_max_reg;
          }
          while (!$rs->EOF && $bPagTest)
          { 
              if ('total' == $this->form_paginacao)
              {
                  $this->sc_max_reg++;
              }
              if (isset($this->NM_ajax_opcao) && 'backup_line' == $this->NM_ajax_opcao)
              {
                  $guard_seq_vert = $sc_seq_vert;
                  $sc_seq_vert    = $this->nmgp_refresh_row;
              }
              if ('total' != $this->form_paginacao)
              {
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['run_iframe'] == "R")
              { 
                  $this->sc_max_reg++;
              } 
              }
              $this->cod_device_ = $rs->fields[0] ; 
              $this->nmgp_dados_select['cod_device_'] = $this->cod_device_;
              $this->cod_activo_ = $rs->fields[1] ; 
              $this->nmgp_dados_select['cod_activo_'] = $this->cod_activo_;
              $this->cod_grupo_ = $rs->fields[2] ; 
              $this->nmgp_dados_select['cod_grupo_'] = $this->cod_grupo_;
              $this->device_name_ = $rs->fields[3] ; 
              $this->nmgp_dados_select['device_name_'] = $this->device_name_;
              $this->activa_ = $rs->fields[4] ; 
              $this->nmgp_dados_select['activa_'] = $this->activa_;
              $this->estado_ = $rs->fields[5] ; 
              $this->nmgp_dados_select['estado_'] = $this->estado_;
              $this->ult_rfid_ = $rs->fields[6] ; 
              $this->nmgp_dados_select['ult_rfid_'] = $this->ult_rfid_;
              $this->ult_fecha_ = $rs->fields[7] ; 
              if (substr($this->ult_fecha_, 10, 1) == "-") 
              { 
                 $this->ult_fecha_ = substr($this->ult_fecha_, 0, 10) . " " . substr($this->ult_fecha_, 11);
              } 
              if (substr($this->ult_fecha_, 13, 1) == ".") 
              { 
                 $this->ult_fecha_ = substr($this->ult_fecha_, 0, 13) . ":" . substr($this->ult_fecha_, 14, 2) . ":" . substr($this->ult_fecha_, 17);
              } 
              $this->nmgp_dados_select['ult_fecha_'] = $this->ult_fecha_;
              $this->valor_default_ = $rs->fields[8] ; 
              $this->nmgp_dados_select['valor_default_'] = $this->valor_default_;
              $this->acepta_tiempo_ = $rs->fields[9] ; 
              $this->nmgp_dados_select['acepta_tiempo_'] = $this->acepta_tiempo_;
              $this->acepta_tokens_ = $rs->fields[10] ; 
              $this->nmgp_dados_select['acepta_tokens_'] = $this->acepta_tokens_;
              $this->dev_ip_ = $rs->fields[11] ; 
              $this->nmgp_dados_select['dev_ip_'] = $this->dev_ip_;
              $this->tipo_dev_ = $rs->fields[12] ; 
              $this->nmgp_dados_select['tipo_dev_'] = $this->tipo_dev_;
              $this->direccion_torno_ = $rs->fields[13] ; 
              $this->nmgp_dados_select['direccion_torno_'] = $this->direccion_torno_;
              $this->timeout_rfid_ = $rs->fields[14] ; 
              $this->nmgp_dados_select['timeout_rfid_'] = $this->timeout_rfid_;
              $this->discapacitado_ = $rs->fields[15] ; 
              $this->nmgp_dados_select['discapacitado_'] = $this->discapacitado_;
              $this->numcaja_ = $rs->fields[16] ; 
              $this->nmgp_dados_select['numcaja_'] = $this->numcaja_;
              $this->empleado_ = $rs->fields[17] ; 
              $this->nmgp_dados_select['empleado_'] = $this->empleado_;
              $this->tokens_ = $rs->fields[18] ; 
              $this->nmgp_dados_select['tokens_'] = $this->tokens_;
              $this->serialrfid_ = $rs->fields[19] ; 
              $this->nmgp_dados_select['serialrfid_'] = $this->serialrfid_;
              $this->bidireccion_ = $rs->fields[20] ; 
              $this->nmgp_dados_select['bidireccion_'] = $this->bidireccion_;
              $this->cod_devicee_ = $rs->fields[21] ; 
              $this->nmgp_dados_select['cod_devicee_'] = $this->cod_devicee_;
              $this->url_1_ = $rs->fields[22] ; 
              $this->nmgp_dados_select['url_1_'] = $this->url_1_;
              $this->url_2_ = $rs->fields[23] ; 
              $this->nmgp_dados_select['url_2_'] = $this->url_2_;
              $this->url_3_ = $rs->fields[24] ; 
              $this->nmgp_dados_select['url_3_'] = $this->url_3_;
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
              { 
                  $this->foto1_ = $this->Db->BlobDecode($rs->fields[25]) ; 
              } 
              elseif ($this->Ini->nm_tpbanco == 'pdo_oracle')
              { 
                  $this->foto1_ = $this->Db->BlobDecode($rs->fields[25]) ; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              { 
                  if(isset($rs->fields[25]) && !empty($rs->fields[25]) && is_file($rs->fields[25])) 
                  { 
                     $this->foto1_ = file_get_contents($rs->fields[25]); 
                  }else 
                  { 
                     $this->foto1_ = ''; 
                  } 
              } 
              else
              { 
                  $this->foto1_ = $rs->fields[25] ; 
              } 
              $this->nmgp_dados_select['foto1_'] = $this->foto1_;
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
              { 
                  $this->foto2_ = $this->Db->BlobDecode($rs->fields[26]) ; 
              } 
              elseif ($this->Ini->nm_tpbanco == 'pdo_oracle')
              { 
                  $this->foto2_ = $this->Db->BlobDecode($rs->fields[26]) ; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              { 
                  if(isset($rs->fields[26]) && !empty($rs->fields[26]) && is_file($rs->fields[26])) 
                  { 
                     $this->foto2_ = file_get_contents($rs->fields[26]); 
                  }else 
                  { 
                     $this->foto2_ = ''; 
                  } 
              } 
              else
              { 
                  $this->foto2_ = $rs->fields[26] ; 
              } 
              $this->nmgp_dados_select['foto2_'] = $this->foto2_;
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
              { 
                  $this->foto3_ = $this->Db->BlobDecode($rs->fields[27]) ; 
              } 
              elseif ($this->Ini->nm_tpbanco == 'pdo_oracle')
              { 
                  $this->foto3_ = $this->Db->BlobDecode($rs->fields[27]) ; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              { 
                  if(isset($rs->fields[27]) && !empty($rs->fields[27]) && is_file($rs->fields[27])) 
                  { 
                     $this->foto3_ = file_get_contents($rs->fields[27]); 
                  }else 
                  { 
                     $this->foto3_ = ''; 
                  } 
              } 
              else
              { 
                  $this->foto3_ = $rs->fields[27] ; 
              } 
              $this->nmgp_dados_select['foto3_'] = $this->foto3_;
              $this->pin_relay1_ = $rs->fields[28] ; 
              $this->nmgp_dados_select['pin_relay1_'] = $this->pin_relay1_;
              $this->pin_relay2_ = $rs->fields[29] ; 
              $this->nmgp_dados_select['pin_relay2_'] = $this->pin_relay2_;
              $this->rfid_read_ = $rs->fields[30] ; 
              $this->nmgp_dados_select['rfid_read_'] = $this->rfid_read_;
              $this->rfid_estado_ = $rs->fields[31] ; 
              $this->nmgp_dados_select['rfid_estado_'] = $this->rfid_estado_;
              $this->rfid_fecha_ = $rs->fields[32] ; 
              if (substr($this->rfid_fecha_, 10, 1) == "-") 
              { 
                 $this->rfid_fecha_ = substr($this->rfid_fecha_, 0, 10) . " " . substr($this->rfid_fecha_, 11);
              } 
              if (substr($this->rfid_fecha_, 13, 1) == ".") 
              { 
                 $this->rfid_fecha_ = substr($this->rfid_fecha_, 0, 13) . ":" . substr($this->rfid_fecha_, 14, 2) . ":" . substr($this->rfid_fecha_, 17);
              } 
              $this->nmgp_dados_select['rfid_fecha_'] = $this->rfid_fecha_;
              $this->url_accion_ = $rs->fields[33] ; 
              $this->nmgp_dados_select['url_accion_'] = $this->url_accion_;
              $this->url_atraccion_ = $rs->fields[34] ; 
              $this->nmgp_dados_select['url_atraccion_'] = $this->url_atraccion_;
              $this->uhfip_ = $rs->fields[35] ; 
              $this->nmgp_dados_select['uhfip_'] = $this->uhfip_;
              $this->url_reader_ = $rs->fields[36] ; 
              $this->nmgp_dados_select['url_reader_'] = $this->url_reader_;
              $this->cod_rfid900_ = $rs->fields[37] ; 
              $this->nmgp_dados_select['cod_rfid900_'] = $this->cod_rfid900_;
              $this->mensaje_ = $rs->fields[38] ; 
              $this->nmgp_dados_select['mensaje_'] = $this->mensaje_;
              $this->tipolector_ = $rs->fields[39] ; 
              $this->nmgp_dados_select['tipolector_'] = $this->tipolector_;
              $this->url_accion_bg_ = $rs->fields[40] ; 
              $this->nmgp_dados_select['url_accion_bg_'] = $this->url_accion_bg_;
              $this->url_inicio_ = $rs->fields[41] ; 
              $this->nmgp_dados_select['url_inicio_'] = $this->url_inicio_;
              $this->ledstripe1_ = $rs->fields[42] ; 
              $this->nmgp_dados_select['ledstripe1_'] = $this->ledstripe1_;
              $this->ledstripe2_ = $rs->fields[43] ; 
              $this->nmgp_dados_select['ledstripe2_'] = $this->ledstripe2_;
              $this->ledstripe3_ = $rs->fields[44] ; 
              $this->nmgp_dados_select['ledstripe3_'] = $this->ledstripe3_;
              $this->ledstripe4_ = $rs->fields[45] ; 
              $this->nmgp_dados_select['ledstripe4_'] = $this->ledstripe4_;
              $this->lasteffect_ = $rs->fields[46] ; 
              $this->nmgp_dados_select['lasteffect_'] = $this->lasteffect_;
              $this->color_ = $rs->fields[47] ; 
              $this->nmgp_dados_select['color_'] = $this->color_;
              $GLOBALS["NM_ERRO_IBASE"] = 0; 
              $this->nm_troca_decimal(",", ".");
              $this->cod_device_ = (string)$this->cod_device_; 
              $this->activa_ = (string)$this->activa_; 
              $this->estado_ = (string)$this->estado_; 
              $this->valor_default_ = (string)$this->valor_default_; 
              $this->acepta_tiempo_ = (string)$this->acepta_tiempo_; 
              $this->acepta_tokens_ = (string)$this->acepta_tokens_; 
              $this->tipo_dev_ = (string)$this->tipo_dev_; 
              $this->direccion_torno_ = (string)$this->direccion_torno_; 
              $this->timeout_rfid_ = (string)$this->timeout_rfid_; 
              $this->discapacitado_ = (string)$this->discapacitado_; 
              $this->numcaja_ = (string)$this->numcaja_; 
              $this->empleado_ = (string)$this->empleado_; 
              $this->tokens_ = (string)$this->tokens_; 
              $this->bidireccion_ = (string)$this->bidireccion_; 
              $this->cod_devicee_ = (string)$this->cod_devicee_; 
              $this->pin_relay1_ = (string)$this->pin_relay1_; 
              $this->pin_relay2_ = (string)$this->pin_relay2_; 
              $this->rfid_estado_ = (string)$this->rfid_estado_; 
              if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['parms'])) 
              { 
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['parms'] = "cod_device_?#?$this->cod_device_?@?";
              } 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['sub_dir'][0]  = "";
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['sub_dir'][1]  = "";
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['sub_dir'][2]  = "";
              $this->nm_proc_onload_record($sc_seq_vert);
              $this->storeRecordState($sc_seq_vert);
//
//-- 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['dados_select'][$sc_seq_vert] = $this->nmgp_dados_select;
              $this->nm_guardar_campos();
              $this->nm_formatar_campos();
             $this->form_vert_form_devices_leds_effects[$sc_seq_vert]['cod_device_'] =  $this->cod_device_; 
             $this->form_vert_form_devices_leds_effects[$sc_seq_vert]['device_name_'] =  $this->device_name_; 
             $this->form_vert_form_devices_leds_effects[$sc_seq_vert]['ledstripe1_'] =  $this->ledstripe1_; 
             $this->form_vert_form_devices_leds_effects[$sc_seq_vert]['ledstripe2_'] =  $this->ledstripe2_; 
             $this->form_vert_form_devices_leds_effects[$sc_seq_vert]['ledstripe3_'] =  $this->ledstripe3_; 
             $this->form_vert_form_devices_leds_effects[$sc_seq_vert]['ledstripe4_'] =  $this->ledstripe4_; 
             $this->form_vert_form_devices_leds_effects[$sc_seq_vert]['color_'] =  $this->color_; 
             $this->form_vert_form_devices_leds_effects[$sc_seq_vert]['cod_activo_'] =  $this->cod_activo_; 
             $this->form_vert_form_devices_leds_effects[$sc_seq_vert]['cod_grupo_'] =  $this->cod_grupo_; 
             $this->form_vert_form_devices_leds_effects[$sc_seq_vert]['activa_'] =  $this->activa_; 
             $this->form_vert_form_devices_leds_effects[$sc_seq_vert]['estado_'] =  $this->estado_; 
             $this->form_vert_form_devices_leds_effects[$sc_seq_vert]['ult_rfid_'] =  $this->ult_rfid_; 
             $this->form_vert_form_devices_leds_effects[$sc_seq_vert]['ult_fecha_'] =  $this->ult_fecha_; 
             $this->form_vert_form_devices_leds_effects[$sc_seq_vert]['ult_fecha__hora'] =  $this->ult_fecha__hora; 
             $this->form_vert_form_devices_leds_effects[$sc_seq_vert]['valor_default_'] =  $this->valor_default_; 
             $this->form_vert_form_devices_leds_effects[$sc_seq_vert]['acepta_tiempo_'] =  $this->acepta_tiempo_; 
             $this->form_vert_form_devices_leds_effects[$sc_seq_vert]['acepta_tokens_'] =  $this->acepta_tokens_; 
             $this->form_vert_form_devices_leds_effects[$sc_seq_vert]['dev_ip_'] =  $this->dev_ip_; 
             $this->form_vert_form_devices_leds_effects[$sc_seq_vert]['tipo_dev_'] =  $this->tipo_dev_; 
             $this->form_vert_form_devices_leds_effects[$sc_seq_vert]['direccion_torno_'] =  $this->direccion_torno_; 
             $this->form_vert_form_devices_leds_effects[$sc_seq_vert]['timeout_rfid_'] =  $this->timeout_rfid_; 
             $this->form_vert_form_devices_leds_effects[$sc_seq_vert]['discapacitado_'] =  $this->discapacitado_; 
             $this->form_vert_form_devices_leds_effects[$sc_seq_vert]['numcaja_'] =  $this->numcaja_; 
             $this->form_vert_form_devices_leds_effects[$sc_seq_vert]['empleado_'] =  $this->empleado_; 
             $this->form_vert_form_devices_leds_effects[$sc_seq_vert]['tokens_'] =  $this->tokens_; 
             $this->form_vert_form_devices_leds_effects[$sc_seq_vert]['serialrfid_'] =  $this->serialrfid_; 
             $this->form_vert_form_devices_leds_effects[$sc_seq_vert]['bidireccion_'] =  $this->bidireccion_; 
             $this->form_vert_form_devices_leds_effects[$sc_seq_vert]['cod_devicee_'] =  $this->cod_devicee_; 
             $this->form_vert_form_devices_leds_effects[$sc_seq_vert]['url_1_'] =  $this->url_1_; 
             $this->form_vert_form_devices_leds_effects[$sc_seq_vert]['url_2_'] =  $this->url_2_; 
             $this->form_vert_form_devices_leds_effects[$sc_seq_vert]['url_3_'] =  $this->url_3_; 
             $this->form_vert_form_devices_leds_effects[$sc_seq_vert]['foto1_'] =  $this->foto1_; 
             $this->form_vert_form_devices_leds_effects[$sc_seq_vert]['foto1__limpa'] =  $this->foto1__limpa; 
             $this->form_vert_form_devices_leds_effects[$sc_seq_vert]['foto2_'] =  $this->foto2_; 
             $this->form_vert_form_devices_leds_effects[$sc_seq_vert]['foto2__limpa'] =  $this->foto2__limpa; 
             $this->form_vert_form_devices_leds_effects[$sc_seq_vert]['foto3_'] =  $this->foto3_; 
             $this->form_vert_form_devices_leds_effects[$sc_seq_vert]['foto3__limpa'] =  $this->foto3__limpa; 
             $this->form_vert_form_devices_leds_effects[$sc_seq_vert]['pin_relay1_'] =  $this->pin_relay1_; 
             $this->form_vert_form_devices_leds_effects[$sc_seq_vert]['pin_relay2_'] =  $this->pin_relay2_; 
             $this->form_vert_form_devices_leds_effects[$sc_seq_vert]['rfid_read_'] =  $this->rfid_read_; 
             $this->form_vert_form_devices_leds_effects[$sc_seq_vert]['rfid_estado_'] =  $this->rfid_estado_; 
             $this->form_vert_form_devices_leds_effects[$sc_seq_vert]['rfid_fecha_'] =  $this->rfid_fecha_; 
             $this->form_vert_form_devices_leds_effects[$sc_seq_vert]['rfid_fecha__hora'] =  $this->rfid_fecha__hora; 
             $this->form_vert_form_devices_leds_effects[$sc_seq_vert]['url_accion_'] =  $this->url_accion_; 
             $this->form_vert_form_devices_leds_effects[$sc_seq_vert]['url_atraccion_'] =  $this->url_atraccion_; 
             $this->form_vert_form_devices_leds_effects[$sc_seq_vert]['uhfip_'] =  $this->uhfip_; 
             $this->form_vert_form_devices_leds_effects[$sc_seq_vert]['url_reader_'] =  $this->url_reader_; 
             $this->form_vert_form_devices_leds_effects[$sc_seq_vert]['cod_rfid900_'] =  $this->cod_rfid900_; 
             $this->form_vert_form_devices_leds_effects[$sc_seq_vert]['mensaje_'] =  $this->mensaje_; 
             $this->form_vert_form_devices_leds_effects[$sc_seq_vert]['tipolector_'] =  $this->tipolector_; 
             $this->form_vert_form_devices_leds_effects[$sc_seq_vert]['url_accion_bg_'] =  $this->url_accion_bg_; 
             $this->form_vert_form_devices_leds_effects[$sc_seq_vert]['url_inicio_'] =  $this->url_inicio_; 
             $this->form_vert_form_devices_leds_effects[$sc_seq_vert]['lasteffect_'] =  $this->lasteffect_; 
              $sc_seq_vert++; 
              $rs->MoveNext() ; 
              if (isset($this->NM_ajax_opcao) && 'backup_line' == $this->NM_ajax_opcao)
              {
                  $sc_seq_vert = $guard_seq_vert;
              }
              if ('total' != $this->form_paginacao)
              {
                  $bPagTest = $sc_seq_vert <= $this->sc_max_reg;
              }
          } 
          ksort ($this->form_vert_form_devices_leds_effects); 
          $rs->Close(); 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['reg_qtd'] = $sc_seq_vert + $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['reg_start'] - 1;
          if ('total' == $this->form_paginacao)
          {
              $this->NM_ajax_info['navSummary']['reg_ini'] = 1; 
              $this->NM_ajax_info['navSummary']['reg_qtd'] = $this->sc_max_reg; 
              $this->NM_ajax_info['navSummary']['reg_tot'] = $this->sc_max_reg; 
          }
          else
          {
              $this->NM_ajax_info['navSummary']['reg_ini'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['reg_start'] + 1; 
              $this->NM_ajax_info['navSummary']['reg_qtd'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['reg_qtd']; 
              $this->NM_ajax_info['navSummary']['reg_tot'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['total'] + 1; 
          }
          if ($this->form_paginacao == "total")
          {
              $this->SC_nav_page = "";
          }
          else
          {
              $this->NM_gera_nav_page(); 
          }
          $this->NM_ajax_info['navPage'] = $this->SC_nav_page; 
          if (!$this->NM_ajax_flag || 'backup_line' != $this->NM_ajax_opcao)
          {
              $this->Nav_permite_ret = 0 != $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['reg_start'];
              $this->Nav_permite_ava = $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['reg_start'] < (($qt_geral_reg_form_devices_leds_effects + 1) - $this->sc_max_reg);
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['opcao'] = '';
          }
      } 
      if ($this->nmgp_opcao == "novo") 
      { 
          $sc_seq_vert = 1; 
          $sc_check_incl = array(); 
          if ($this->NM_ajax_flag && 'add_new_line' == $this->NM_ajax_opcao) 
          { 
              $sc_seq_vert = $this->sc_seq_vert; 
              $this->sc_evento = "novo"; 
              $this->sc_max_reg_incl = $this->sc_seq_vert; 
          } 
          elseif (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['embutida_multi']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['embutida_multi']) 
          { 
          } 
          elseif ($this->Embutida_form) 
          { 
              $this->sc_max_reg_incl = 0; 
          } 
          while ($sc_seq_vert <= $this->sc_max_reg_incl) 
          { 
              $this->cod_device_ = "";  
              $this->device_name_ = "";  
              $this->ledstripe1_ = "";  
              $this->ledstripe2_ = "";  
              $this->ledstripe3_ = "";  
              $this->ledstripe4_ = "";  
              $this->color_ = "";  
              $this->nm_proc_onload_record($sc_seq_vert);
              if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['foreign_key']))
              {
                  foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['foreign_key'] as $sFKName => $sFKValue)
                  {
                      if (isset($this->sc_conv_var[$sFKName]))
                      {
                          $sFKName = $this->sc_conv_var[$sFKName];
                      }
                      eval("\$this->" . $sFKName . " = \"" . $sFKValue . "\";");
                  }
              }
              $this->nm_guardar_campos();
              $this->nm_formatar_campos();
             $this->form_vert_form_devices_leds_effects[$sc_seq_vert]['cod_device_'] =  $this->cod_device_; 
             $this->form_vert_form_devices_leds_effects[$sc_seq_vert]['device_name_'] =  $this->device_name_; 
             $this->form_vert_form_devices_leds_effects[$sc_seq_vert]['ledstripe1_'] =  $this->ledstripe1_; 
             $this->form_vert_form_devices_leds_effects[$sc_seq_vert]['ledstripe2_'] =  $this->ledstripe2_; 
             $this->form_vert_form_devices_leds_effects[$sc_seq_vert]['ledstripe3_'] =  $this->ledstripe3_; 
             $this->form_vert_form_devices_leds_effects[$sc_seq_vert]['ledstripe4_'] =  $this->ledstripe4_; 
             $this->form_vert_form_devices_leds_effects[$sc_seq_vert]['color_'] =  $this->color_; 
             $this->form_vert_form_devices_leds_effects[$sc_seq_vert]['cod_activo_'] =  $this->cod_activo_; 
             $this->form_vert_form_devices_leds_effects[$sc_seq_vert]['cod_grupo_'] =  $this->cod_grupo_; 
             $this->form_vert_form_devices_leds_effects[$sc_seq_vert]['activa_'] =  $this->activa_; 
             $this->form_vert_form_devices_leds_effects[$sc_seq_vert]['estado_'] =  $this->estado_; 
             $this->form_vert_form_devices_leds_effects[$sc_seq_vert]['ult_rfid_'] =  $this->ult_rfid_; 
             $this->form_vert_form_devices_leds_effects[$sc_seq_vert]['ult_fecha_'] =  $this->ult_fecha_; 
             $this->form_vert_form_devices_leds_effects[$sc_seq_vert]['ult_fecha__hora'] =  $this->ult_fecha__hora; 
             $this->form_vert_form_devices_leds_effects[$sc_seq_vert]['valor_default_'] =  $this->valor_default_; 
             $this->form_vert_form_devices_leds_effects[$sc_seq_vert]['acepta_tiempo_'] =  $this->acepta_tiempo_; 
             $this->form_vert_form_devices_leds_effects[$sc_seq_vert]['acepta_tokens_'] =  $this->acepta_tokens_; 
             $this->form_vert_form_devices_leds_effects[$sc_seq_vert]['dev_ip_'] =  $this->dev_ip_; 
             $this->form_vert_form_devices_leds_effects[$sc_seq_vert]['tipo_dev_'] =  $this->tipo_dev_; 
             $this->form_vert_form_devices_leds_effects[$sc_seq_vert]['direccion_torno_'] =  $this->direccion_torno_; 
             $this->form_vert_form_devices_leds_effects[$sc_seq_vert]['timeout_rfid_'] =  $this->timeout_rfid_; 
             $this->form_vert_form_devices_leds_effects[$sc_seq_vert]['discapacitado_'] =  $this->discapacitado_; 
             $this->form_vert_form_devices_leds_effects[$sc_seq_vert]['numcaja_'] =  $this->numcaja_; 
             $this->form_vert_form_devices_leds_effects[$sc_seq_vert]['empleado_'] =  $this->empleado_; 
             $this->form_vert_form_devices_leds_effects[$sc_seq_vert]['tokens_'] =  $this->tokens_; 
             $this->form_vert_form_devices_leds_effects[$sc_seq_vert]['serialrfid_'] =  $this->serialrfid_; 
             $this->form_vert_form_devices_leds_effects[$sc_seq_vert]['bidireccion_'] =  $this->bidireccion_; 
             $this->form_vert_form_devices_leds_effects[$sc_seq_vert]['cod_devicee_'] =  $this->cod_devicee_; 
             $this->form_vert_form_devices_leds_effects[$sc_seq_vert]['url_1_'] =  $this->url_1_; 
             $this->form_vert_form_devices_leds_effects[$sc_seq_vert]['url_2_'] =  $this->url_2_; 
             $this->form_vert_form_devices_leds_effects[$sc_seq_vert]['url_3_'] =  $this->url_3_; 
             $this->form_vert_form_devices_leds_effects[$sc_seq_vert]['foto1_'] =  $this->foto1_; 
             $this->form_vert_form_devices_leds_effects[$sc_seq_vert]['foto1__limpa'] =  $this->foto1__limpa; 
             $this->form_vert_form_devices_leds_effects[$sc_seq_vert]['foto2_'] =  $this->foto2_; 
             $this->form_vert_form_devices_leds_effects[$sc_seq_vert]['foto2__limpa'] =  $this->foto2__limpa; 
             $this->form_vert_form_devices_leds_effects[$sc_seq_vert]['foto3_'] =  $this->foto3_; 
             $this->form_vert_form_devices_leds_effects[$sc_seq_vert]['foto3__limpa'] =  $this->foto3__limpa; 
             $this->form_vert_form_devices_leds_effects[$sc_seq_vert]['pin_relay1_'] =  $this->pin_relay1_; 
             $this->form_vert_form_devices_leds_effects[$sc_seq_vert]['pin_relay2_'] =  $this->pin_relay2_; 
             $this->form_vert_form_devices_leds_effects[$sc_seq_vert]['rfid_read_'] =  $this->rfid_read_; 
             $this->form_vert_form_devices_leds_effects[$sc_seq_vert]['rfid_estado_'] =  $this->rfid_estado_; 
             $this->form_vert_form_devices_leds_effects[$sc_seq_vert]['rfid_fecha_'] =  $this->rfid_fecha_; 
             $this->form_vert_form_devices_leds_effects[$sc_seq_vert]['rfid_fecha__hora'] =  $this->rfid_fecha__hora; 
             $this->form_vert_form_devices_leds_effects[$sc_seq_vert]['url_accion_'] =  $this->url_accion_; 
             $this->form_vert_form_devices_leds_effects[$sc_seq_vert]['url_atraccion_'] =  $this->url_atraccion_; 
             $this->form_vert_form_devices_leds_effects[$sc_seq_vert]['uhfip_'] =  $this->uhfip_; 
             $this->form_vert_form_devices_leds_effects[$sc_seq_vert]['url_reader_'] =  $this->url_reader_; 
             $this->form_vert_form_devices_leds_effects[$sc_seq_vert]['cod_rfid900_'] =  $this->cod_rfid900_; 
             $this->form_vert_form_devices_leds_effects[$sc_seq_vert]['mensaje_'] =  $this->mensaje_; 
             $this->form_vert_form_devices_leds_effects[$sc_seq_vert]['tipolector_'] =  $this->tipolector_; 
             $this->form_vert_form_devices_leds_effects[$sc_seq_vert]['url_accion_bg_'] =  $this->url_accion_bg_; 
             $this->form_vert_form_devices_leds_effects[$sc_seq_vert]['url_inicio_'] =  $this->url_inicio_; 
             $this->form_vert_form_devices_leds_effects[$sc_seq_vert]['lasteffect_'] =  $this->lasteffect_; 
              $sc_seq_vert++; 
          } 
      }  
  }
   function NM_gera_nav_page() 
   {
       $this->SC_nav_page = "";
       $Arr_result        = array();
       $Ind_result        = 0;
       $Reg_Page   = $this->sc_max_reg;
       $Max_link   = 5;
       $Mid_link   = ceil($Max_link / 2);
       $Corr_link  = (($Max_link % 2) == 0) ? 0 : 1;
       $rec_tot    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['total'] + 1;
       $rec_fim    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['reg_start'] + $this->sc_max_reg;
       $rec_fim    = ($rec_fim > $rec_tot) ? $rec_tot : $rec_fim;
       if ($rec_tot == 0)
       {
           return;
       }
       $Qtd_Pages  = ceil($rec_tot / $Reg_Page);
       $Page_Atu   = ceil($rec_fim / $Reg_Page);
       $Link_ini   = 1;
       if ($Page_Atu > $Max_link)
       {
           $Link_ini = $Page_Atu - $Mid_link + $Corr_link;
       }
       elseif ($Page_Atu > $Mid_link)
       {
           $Link_ini = $Page_Atu - $Mid_link + $Corr_link;
       }
       if (($Qtd_Pages - $Link_ini) < $Max_link)
       {
           $Link_ini = ($Qtd_Pages - $Max_link) + 1;
       }
       if ($Link_ini < 1)
       {
           $Link_ini = 1;
       }
       for ($x = 0; $x < $Max_link && $Link_ini <= $Qtd_Pages; $x++)
       {
           $rec = (($Link_ini - 1) * $Reg_Page) + 1;
           if ($Link_ini == $Page_Atu)
           {
               $Arr_result[$Ind_result] = '<span class="scFormToolbarNavOpen" style="vertical-align: middle;">' . $Link_ini . '</span>';
           }
           else
           {
               $Arr_result[$Ind_result] = '<a class="scFormToolbarNav" style="vertical-align: middle;" href="javascript: nm_navpage(' . $rec . ')">' . $Link_ini . '</a>';
           }
           $Link_ini++;
           $Ind_result++;
           if (($x + 1) < $Max_link && $Link_ini <= $Qtd_Pages && '' != $this->Ini->Str_toolbarnav_separator && @is_file($this->Ini->root . $this->Ini->path_img_global . $this->Ini->Str_toolbarnav_separator))
           {
               $Arr_result[$Ind_result] = '<img src="' . $this->Ini->path_img_global . $this->Ini->Str_toolbarnav_separator . '" align="absmiddle" style="vertical-align: middle;">';
               $Ind_result++;
           }
       }
       if ($_SESSION['scriptcase']['reg_conf']['css_dir'] == "RTL")
       {
           krsort($Arr_result);
       }
       foreach ($Arr_result as $Ind_result => $Lin_result)
       {
           $this->SC_nav_page .= $Lin_result;
       }
   }
        function initializeRecordState() {
                $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['record_state'] = array();
        }

        function storeRecordState($sc_seq_vert = 0) {
                if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['record_state'])) {
                        $this->initializeRecordState();
                }
                if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['record_state'][$sc_seq_vert])) {
                        $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['record_state'][$sc_seq_vert] = array();
                }

                $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['record_state'][$sc_seq_vert]['buttons'] = array(
                        'delete' => $this->nmgp_botoes['delete'],
                        'update' => $this->nmgp_botoes['update']
                );
        }

        function loadRecordState($sc_seq_vert = 0) {
                if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['record_state']) || !isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['record_state'][$sc_seq_vert])) {
                        return;
                }

                if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['record_state'][$sc_seq_vert]['buttons']['delete'])) {
                        $this->nmgp_botoes['delete'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['record_state'][$sc_seq_vert]['buttons']['delete'];
                }
                if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['record_state'][$sc_seq_vert]['buttons']['update'])) {
                        $this->nmgp_botoes['update'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['record_state'][$sc_seq_vert]['buttons']['update'];
                }
        }

//
 function nm_gera_html()
 {
    global
           $nm_url_saida, $nmgp_url_saida, $nm_saida_global, $nm_apl_dependente, $glo_subst, $sc_check_excl, $sc_check_incl, $nmgp_num_form, $NM_run_iframe;
     if ($this->Embutida_proc)
     {
         return;
     }
     if ($this->nmgp_form_show == 'off')
     {
         exit;
     }
      if (isset($NM_run_iframe) && $NM_run_iframe == 1)
      {
          $this->nmgp_botoes['exit'] = "off";
      }
     $HTTP_REFERER = (isset($_SERVER['HTTP_REFERER'])) ? $_SERVER['HTTP_REFERER'] : ""; 
     $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['botoes'] = $this->nmgp_botoes;
     if ($this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form")
     {
         $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['opc_ant'] = $this->nmgp_opcao;
     }
     else
     {
         $this->nmgp_opcao = $this->nmgp_opc_ant;
     }
     if (!empty($this->Campos_Mens_erro)) 
     {
         $this->Erro->mensagem(__FILE__, __LINE__, "critica", $this->Campos_Mens_erro); 
         $this->Campos_Mens_erro = "";
     }
     if (($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['run_iframe'] == "R") && $this->nm_flag_iframe && empty($this->nm_todas_criticas))
     {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['run_iframe_ajax']))
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['retorno_edit'] = array("edit", "");
          }
          else
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['retorno_edit'] .= "&nmgp_opcao=edit";
          }
          if ($this->sc_evento == "insert" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['run_iframe'] == "F")
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['run_iframe_ajax']))
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['retorno_edit'] = array("edit", "fim");
              }
              else
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['retorno_edit'] .= "&rec=fim";
              }
          }
          $this->NM_close_db(); 
          $sJsParent = '';
          if ($this->NM_ajax_flag && isset($this->NM_ajax_info['param']['buffer_output']) && $this->NM_ajax_info['param']['buffer_output'])
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['run_iframe_ajax']))
              {
                  $this->NM_ajax_info['ajaxJavascript'][] = array("parent.ajax_navigate", $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['retorno_edit']);
              }
              else
              {
                  $sJsParent .= 'parent';
                  $this->NM_ajax_info['redir']['metodo'] = 'location';
                  $this->NM_ajax_info['redir']['action'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['retorno_edit'];
                  $this->NM_ajax_info['redir']['target'] = $sJsParent;
              }
              form_devices_leds_effects_pack_ajax_response();
              exit;
          }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">

         <html><body>
         <script type="text/javascript">
<?php
    
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['run_iframe_ajax']))
    {
        $opc = ($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['run_iframe'] == "F" && $this->sc_evento == "insert") ? "fim" : "";
        echo "parent.ajax_navigate('edit', '" .$opc . "');";
    }
    else
    {
        echo $sJsParent . "parent.location = '" . $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['retorno_edit'] . "';";
    }
?>
         </script>
         </body></html>
<?php
         exit;
     }
        $this->initFormPages();
   if ($this->NM_ajax_flag && 'add_new_line' == $this->NM_ajax_opcao)
   {
        $this->Form_Corpo(true);
   }
   elseif ($this->NM_ajax_flag && 'table_refresh' == $this->NM_ajax_opcao)
   {
        $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['table_refresh'] = true;
        $this->Form_Table(true);
        $this->Form_Corpo(false, true);
   }
   else
   {
        $this->Form_Init();
        $this->Form_Table();
        $this->Form_Corpo();
        $this->Form_Fim();
   }
        $this->hideFormPages();
 }

        function initFormPages() {
        } // initFormPages

        function hideFormPages() {
        } // hideFormPages

    function form_format_readonly($field, $value)
    {
        $result = $value;

        $this->form_highlight_search($result, $field, $value);

        return $result;
    }

    function form_highlight_search(&$result, $field, $value)
    {
        if ($this->proc_fast_search) {
            $this->form_highlight_search_quicksearch($result, $field, $value);
        }
    }

    function form_highlight_search_quicksearch(&$result, $field, $value)
    {
        $searchOk = false;
        if ('SC_all_Cmp' == $this->nmgp_fast_search && in_array($field, array("cod_device_", "cod_activo_", "cod_grupo_", "device_name_", "activa_", "estado_", "ult_rfid_", "ult_fecha_", "valor_default_", "acepta_tiempo_", "acepta_tokens_", "dev_ip_", "tipo_dev_", "direccion_torno_", "timeout_rfid_", "discapacitado_", "numcaja_", "empleado_", "tokens_", "serialrfid_", "bidireccion_", "cod_devicee_", "url_1_", "url_2_", "url_3_", "foto1_", "foto2_", "foto3_", "pin_relay1_", "pin_relay2_", "rfid_read_", "rfid_estado_", "rfid_fecha_", "url_accion_", "url_atraccion_", "uhfip_", "url_reader_", "cod_rfid900_", "mensaje_", "tipolector_", "url_accion_bg_", "url_inicio_", "ledstripe1_", "ledstripe2_", "ledstripe3_", "ledstripe4_", "lasteffect_", "color_"))) {
            $searchOk = true;
        }
        elseif ($field == $this->nmgp_fast_search && in_array($field, array(""))) {
            $searchOk = true;
        }

        if (!$searchOk || '' == $this->nmgp_arg_fast_search) {
            return;
        }

        $htmlIni = '<div class="highlight" style="background-color: #fafaca; display: inline-block">';
        $htmlFim = '</div>';

        if ('qp' == $this->nmgp_cond_fast_search) {
            $keywords = preg_quote($this->nmgp_arg_fast_search, '/');
            $result = preg_replace('/'. $keywords .'/i', $htmlIni . '$0' . $htmlFim, $result);
        } elseif ('eq' == $this->nmgp_cond_fast_search) {
            if (strcasecmp($this->nmgp_arg_fast_search, $value) == 0) {
                $result = $htmlIni. $result .$htmlFim;
            }
        }
    }


    function form_encode_input($string)
    {
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['table_refresh']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['table_refresh'])
        {
            return NM_encode_input(NM_encode_input($string));
        }
        else
        {
            return NM_encode_input($string);
        }
    } // form_encode_input

   function jqueryCalendarDtFormat($sFormat, $sSep)
   {
       $sFormat = chunk_split(str_replace('yyyy', 'yy', $sFormat), 2, $sSep);

       if ($sSep == substr($sFormat, -1))
       {
           $sFormat = substr($sFormat, 0, -1);
       }

       return $sFormat;
   } // jqueryCalendarDtFormat

   function jqueryCalendarTimeStart($sFormat)
   {
       $aDateParts = explode(';', $sFormat);

       if (2 == sizeof($aDateParts))
       {
           $sTime = $aDateParts[1];
       }
       else
       {
           $sTime = 'hh:mm:ss';
       }

       return str_replace(array('h', 'm', 'i', 's'), array('0', '0', '0', '0'), $sTime);
   } // jqueryCalendarTimeStart

   function jqueryCalendarWeekInit($sDay)
   {
       switch ($sDay) {
           case 'MO': return 1; break;
           case 'TU': return 2; break;
           case 'WE': return 3; break;
           case 'TH': return 4; break;
           case 'FR': return 5; break;
           case 'SA': return 6; break;
           default  : return 7; break;
       }
   } // jqueryCalendarWeekInit

   function jqueryIconFile($sModule)
   {
       $sImage = '';
       if ('calendar' == $sModule)
       {
           if (isset($this->arr_buttons['bcalendario']) && isset($this->arr_buttons['bcalendario']['type']) && 'image' == $this->arr_buttons['bcalendario']['type'] && 'only_fontawesomeicon' != $this->arr_buttons['bcalendario']['display'])
           {
               $sImage = $this->arr_buttons['bcalendario']['image'];
           }
       }
       elseif ('calculator' == $sModule)
       {
           if (isset($this->arr_buttons['bcalculadora']) && isset($this->arr_buttons['bcalculadora']['type']) && 'image' == $this->arr_buttons['bcalculadora']['type'] && 'only_fontawesomeicon' != $this->arr_buttons['bcalculadora']['display'])
           {
               $sImage = $this->arr_buttons['bcalculadora']['image'];
           }
       }

       return '' == $sImage ? '' : $this->Ini->path_icones . '/' . $sImage;
   } // jqueryIconFile

   function jqueryFAFile($sModule)
   {
       $sFA = '';
       if ('calendar' == $sModule)
       {
           if (isset($this->arr_buttons['bcalendario']) && isset($this->arr_buttons['bcalendario']['type']) && ('image' == $this->arr_buttons['bcalendario']['type'] || 'button' == $this->arr_buttons['bcalendario']['type']) && 'only_fontawesomeicon' == $this->arr_buttons['bcalendario']['display'])
           {
               $sFA = $this->arr_buttons['bcalendario']['fontawesomeicon'];
           }
       }
       elseif ('calculator' == $sModule)
       {
           if (isset($this->arr_buttons['bcalculadora']) && isset($this->arr_buttons['bcalculadora']['type']) && ('image' == $this->arr_buttons['bcalculadora']['type'] || 'button' == $this->arr_buttons['bcalculadora']['type']) && 'only_fontawesomeicon' == $this->arr_buttons['bcalculadora']['display'])
           {
               $sFA = $this->arr_buttons['bcalculadora']['fontawesomeicon'];
           }
       }

       return '' == $sFA ? '' : "<span class='scButton_fontawesome " . $sFA . "'></span>";
   } // jqueryFAFile

   function jqueryButtonText($sModule)
   {
       $sClass = '';
       $sText  = '';
       if ('calendar' == $sModule)
       {
           if (isset($this->arr_buttons['bcalendario']) && isset($this->arr_buttons['bcalendario']['type']) && ('image' == $this->arr_buttons['bcalendario']['type'] || 'button' == $this->arr_buttons['bcalendario']['type']))
           {
               if ('only_text' == $this->arr_buttons['bcalendario']['display'])
               {
                   $sClass = 'scButton_' . $this->arr_buttons['bcalendario']['style'];
                   $sText  = $this->arr_buttons['bcalendario']['value'];
               }
               elseif ('text_fontawesomeicon' == $this->arr_buttons['bcalendario']['display'])
               {
                   $sClass = 'scButton_' . $this->arr_buttons['bcalendario']['style'];
                   if ('text_right' == $this->arr_buttons['bcalendario']['display_position'])
                   {
                       $sText = "<i class='icon_fa " . $this->arr_buttons['bcalendario']['fontawesomeicon'] . "'></i> " . $this->arr_buttons['bcalendario']['value'];
                   }
                   else
                   {
                       $sText = $this->arr_buttons['bcalendario']['value'] . " <i class='icon_fa " . $this->arr_buttons['bcalendario']['fontawesomeicon'] . "'></i>";
                   }
               }
           }
       }
       elseif ('calculator' == $sModule)
       {
           if (isset($this->arr_buttons['bcalculadora']) && isset($this->arr_buttons['bcalculadora']['type']) && ('image' == $this->arr_buttons['bcalculadora']['type'] || 'button' == $this->arr_buttons['bcalculadora']['type']))
           {
               if ('only_text' == $this->arr_buttons['bcalculadora']['display'])
               {
                   $sClass = 'scButton_' . $this->arr_buttons['bcalendario']['style'];
                   $sText  = $this->arr_buttons['bcalculadora']['value'];
               }
               elseif ('text_fontawesomeicon' == $this->arr_buttons['bcalculadora']['display'])
               {
                   $sClass = 'scButton_' . $this->arr_buttons['bcalendario']['style'];
                   if ('text_right' == $this->arr_buttons['bcalendario']['display_position'])
                   {
                       $sText = "<i class='icon_fa " . $this->arr_buttons['bcalculadora']['fontawesomeicon'] . "'></i> " . $this->arr_buttons['bcalculadora']['value'];
                   }
                   else
                   {
                       $sText = $this->arr_buttons['bcalculadora']['value'] . " <i class='icon_fa " . $this->arr_buttons['bcalculadora']['fontawesomeicon'] . "'></i> ";
                   }
               }
           }
       }

       return '' == $sText ? array('', '') : array($sText, $sClass);
   } // jqueryButtonText


        function addUrlParam($url, $param, $value) {
                $urlParts  = explode('?', $url);
                $urlParams = isset($urlParts[1]) ? explode('&', $urlParts[1]) : array();
                $objParams = array();
                foreach ($urlParams as $paramInfo) {
                        $paramParts = explode('=', $paramInfo);
                        $objParams[ $paramParts[0] ] = isset($paramParts[1]) ? $paramParts[1] : '';
                }
                $objParams[$param] = $value;
                $urlParams = array();
                foreach ($objParams as $paramName => $paramValue) {
                        $urlParams[] = $paramName . '=' . $paramValue;
                }
                return $urlParts[0] . '?' . implode('&', $urlParams);
        }
 function allowedCharsCharset($charlist)
 {
     if ($_SESSION['scriptcase']['charset'] != 'UTF-8')
     {
         $charlist = NM_conv_charset($charlist, $_SESSION['scriptcase']['charset'], 'UTF-8');
     }
     return str_replace("'", "\'", $charlist);
 }

function sc_file_size($file, $format = false)
{
    if ('' == $file) {
        return '';
    }
    if (!@is_file($file)) {
        return '';
    }
    $fileSize = @filesize($file);
    if ($format) {
        $suffix = '';
        if (1024 >= $fileSize) {
            $fileSize /= 1024;
            $suffix    = ' KB';
        }
        if (1024 >= $fileSize) {
            $fileSize /= 1024;
            $suffix    = ' MB';
        }
        if (1024 >= $fileSize) {
            $fileSize /= 1024;
            $suffix    = ' GB';
        }
        $fileSize = $fileSize . $suffix;
    }
    return $fileSize;
}


 function new_date_format($type, $field)
 {
     $new_date_format_out = '';

     if ('DT' == $type)
     {
         $date_format  = $this->field_config[$field]['date_format'];
         $date_sep     = $this->field_config[$field]['date_sep'];
         $date_display = $this->field_config[$field]['date_display'];
         $time_format  = '';
         $time_sep     = '';
         $time_display = '';
     }
     elseif ('DH' == $type)
     {
         $date_format  = false !== strpos($this->field_config[$field]['date_format'] , ';') ? substr($this->field_config[$field]['date_format'] , 0, strpos($this->field_config[$field]['date_format'] , ';')) : $this->field_config[$field]['date_format'];
         $date_sep     = $this->field_config[$field]['date_sep'];
         $date_display = false !== strpos($this->field_config[$field]['date_display'], ';') ? substr($this->field_config[$field]['date_display'], 0, strpos($this->field_config[$field]['date_display'], ';')) : $this->field_config[$field]['date_display'];
         $time_format  = false !== strpos($this->field_config[$field]['date_format'] , ';') ? substr($this->field_config[$field]['date_format'] , strpos($this->field_config[$field]['date_format'] , ';') + 1) : '';
         $time_sep     = $this->field_config[$field]['time_sep'];
         $time_display = false !== strpos($this->field_config[$field]['date_display'], ';') ? substr($this->field_config[$field]['date_display'], strpos($this->field_config[$field]['date_display'], ';') + 1) : '';
     }
     elseif ('HH' == $type)
     {
         $date_format  = '';
         $date_sep     = '';
         $date_display = '';
         $time_format  = $this->field_config[$field]['date_format'];
         $time_sep     = $this->field_config[$field]['time_sep'];
         $time_display = $this->field_config[$field]['date_display'];
     }

     if ('DT' == $type || 'DH' == $type)
     {
         $date_array = array();
         $date_index = 0;
         $date_ult   = '';
         for ($i = 0; $i < strlen($date_format); $i++)
         {
             $char = strtolower(substr($date_format, $i, 1));
             if (in_array($char, array('d', 'm', 'y', 'a')))
             {
                 if ('a' == $char)
                 {
                     $char = 'y';
                 }
                 if ($char == $date_ult)
                 {
                     $date_array[$date_index] .= $char;
                 }
                 else
                 {
                     if ('' != $date_ult)
                     {
                         $date_index++;
                     }
                     $date_array[$date_index] = $char;
                 }
             }
             $date_ult = $char;
         }

         $disp_array = array();
         $date_index = 0;
         $date_ult   = '';
         for ($i = 0; $i < strlen($date_display); $i++)
         {
             $char = strtolower(substr($date_display, $i, 1));
             if (in_array($char, array('d', 'm', 'y', 'a')))
             {
                 if ('a' == $char)
                 {
                     $char = 'y';
                 }
                 if ($char == $date_ult)
                 {
                     $disp_array[$date_index] .= $char;
                 }
                 else
                 {
                     if ('' != $date_ult)
                     {
                         $date_index++;
                     }
                     $disp_array[$date_index] = $char;
                 }
             }
             $date_ult = $char;
         }

         $date_final = array();
         foreach ($date_array as $date_part)
         {
             if (in_array($date_part, $disp_array))
             {
                 $date_final[] = $date_part;
             }
         }

         $date_format = implode($date_sep, $date_final);
     }
     if ('HH' == $type || 'DH' == $type)
     {
         $time_array = array();
         $time_index = 0;
         $time_ult   = '';
         for ($i = 0; $i < strlen($time_format); $i++)
         {
             $char = strtolower(substr($time_format, $i, 1));
             if (in_array($char, array('h', 'i', 's')))
             {
                 if ($char == $time_ult)
                 {
                     $time_array[$time_index] .= $char;
                 }
                 else
                 {
                     if ('' != $time_ult)
                     {
                         $time_index++;
                     }
                     $time_array[$time_index] = $char;
                 }
             }
             $time_ult = $char;
         }

         $disp_array = array();
         $time_index = 0;
         $time_ult   = '';
         for ($i = 0; $i < strlen($time_display); $i++)
         {
             $char = strtolower(substr($time_display, $i, 1));
             if (in_array($char, array('h', 'i', 's')))
             {
                 if ($char == $time_ult)
                 {
                     $disp_array[$time_index] .= $char;
                 }
                 else
                 {
                     if ('' != $time_ult)
                     {
                         $time_index++;
                     }
                     $disp_array[$time_index] = $char;
                 }
             }
             $time_ult = $char;
         }

         $time_final = array();
         foreach ($time_array as $time_part)
         {
             if (in_array($time_part, $disp_array))
             {
                 $time_final[] = $time_part;
             }
         }

         $time_format = implode($time_sep, $time_final);
     }

     if ('DT' == $type)
     {
         $old_date_format = $date_format;
     }
     elseif ('DH' == $type)
     {
         $old_date_format = $date_format . ';' . $time_format;
     }
     elseif ('HH' == $type)
     {
         $old_date_format = $time_format;
     }

     for ($i = 0; $i < strlen($old_date_format); $i++)
     {
         $char = substr($old_date_format, $i, 1);
         if ('/' == $char)
         {
             $new_date_format_out .= $date_sep;
         }
         elseif (':' == $char)
         {
             $new_date_format_out .= $time_sep;
         }
         else
         {
             $new_date_format_out .= $char;
         }
     }

     $this->field_config[$field]['date_format'] = $new_date_format_out;
     if ('DH' == $type)
     {
         $new_date_format_out                                  = explode(';', $new_date_format_out);
         $this->field_config[$field]['date_format_js']        = $new_date_format_out[0];
         $this->field_config[$field . '_hora']['date_format'] = $new_date_format_out[1];
         $this->field_config[$field . '_hora']['time_sep']    = $this->field_config[$field]['time_sep'];
     }
 } // new_date_format

   function Form_lookup_ledstripe1_()
   {
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['Lookup_ledstripe1_']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['Lookup_ledstripe1_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['Lookup_ledstripe1_']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['Lookup_ledstripe1_'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['Lookup_ledstripe1_']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['Lookup_ledstripe1_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['Lookup_ledstripe1_']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['Lookup_ledstripe1_'] = array(); 
    }

   $old_value_cod_device_ = $this->cod_device_;
   $this->nm_tira_formatacao();


   $unformatted_value_cod_device_ = $this->cod_device_;

   $nm_comando = "SELECT comando, descrip  FROM ledeffects  ORDER BY descrip";

   $this->cod_device_ = $old_value_cod_device_;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $nmgp_def_dados .= $rs->fields[0] . " - " . $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['Lookup_ledstripe1_'][] = $rs->fields[0];
              $rs->MoveNext() ; 
       } 
       $rs->Close() ; 
   } 
   elseif ($GLOBALS["NM_ERRO_IBASE"] != 1 && $nm_comando != "")  
   {  
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit; 
   } 
   $GLOBALS["NM_ERRO_IBASE"] = 0; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   return $todo;

   }
   function SC_fast_search($in_fields, $arg_search, $data_search)
   {
      $fields = (strpos($in_fields, "SC_all_Cmp") !== false) ? array("SC_all_Cmp") : explode(";", $in_fields);
      $this->NM_case_insensitive = false;
      if (empty($data_search)) 
      {
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['where_filter']);
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['total']);
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['fast_search']);
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['where_detal']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['where_detal'])) 
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['where_filter'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['where_detal'];
          }
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['empty_filter']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['empty_filter'])
          {
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['empty_filter']);
              $this->NM_ajax_info['empty_filter'] = 'ok';
              form_devices_leds_effects_pack_ajax_response();
              exit;
          }
          return;
      }
      $comando = "";
      if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($data_search))
      {
          $data_search = NM_conv_charset($data_search, $_SESSION['scriptcase']['charset'], "UTF-8");
      }
      $sv_data = $data_search;
      foreach ($fields as $field) {
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "cod_device", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "cod_activo", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "cod_grupo", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "device_name", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "activa", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "estado", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "ult_rfid", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "ult_fecha", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "valor_default", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "acepta_tiempo", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "acepta_tokens", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "dev_ip", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "tipo_dev", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "direccion_torno", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "timeout_rfid", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "discapacitado", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "numcaja", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "empleado", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "tokens", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "serialrfid", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "bidireccion", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "cod_deviceE", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "url_1", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "url_2", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "url_3", $arg_search, $data_search);
          }
          {
              $this->SC_monta_condicao($comando, "foto1", $arg_search, $data_search);
          }
          {
              $this->SC_monta_condicao($comando, "foto2", $arg_search, $data_search);
          }
          {
              $this->SC_monta_condicao($comando, "foto3", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "pin_relay1", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "pin_relay2", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "rfid_read", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "rfid_estado", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "rfid_fecha", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "url_accion", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "url_atraccion", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "uhfip", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "url_reader", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "cod_rfid900", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "mensaje", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "tipolector", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "url_accion_bg", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "url_inicio", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $data_lookup = $this->SC_lookup_ledstripe1_($arg_search, $data_search);
              if (is_array($data_lookup) && !empty($data_lookup)) 
              {
                  $this->SC_monta_condicao($comando, "ledstripe1", $arg_search, $data_lookup);
              }
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "ledstripe2", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "ledstripe3", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "ledstripe4", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "lasteffect", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "color", $arg_search, $data_search);
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['where_detal']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['where_detal']) && !empty($comando)) 
      {
          $comando = $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['where_detal'] . " and (" .  $comando . ")";
      }
      if (empty($comando)) 
      {
          $comando = " 1 <> 1 "; 
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['where_filter_form']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['where_filter_form'])
      {
          $sc_where = " where " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['where_filter_form'] . " and (" . $comando . ")";
      }
      else
      {
         $sc_where = " where " . $comando;
      }
      $nmgp_select = "SELECT count(*) AS countTest from " . $this->Ini->nm_tabela . $sc_where; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
      $rt = $this->Db->Execute($nmgp_select) ; 
      if ($rt === false && !$rt->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
      { 
          $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
          exit ; 
      }  
      $qt_geral_reg_form_devices_leds_effects = isset($rt->fields[0]) ? $rt->fields[0] - 1 : 0; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['total'] = $qt_geral_reg_form_devices_leds_effects;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['where_filter'] = $comando;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['fast_search'][0] = $field;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['fast_search'][1] = $arg_search;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['fast_search'][2] = $sv_data;
      $rt->Close(); 
      if (isset($rt->fields[0]) && $rt->fields[0] > 0 &&  isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['empty_filter']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['empty_filter'])
      {
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['empty_filter']);
          $this->NM_ajax_info['empty_filter'] = 'ok';
          form_devices_leds_effects_pack_ajax_response();
          exit;
      }
      elseif (!isset($rt->fields[0]) || $rt->fields[0] == 0)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['empty_filter'] = true;
          $this->NM_ajax_info['empty_filter'] = 'ok';
          form_devices_leds_effects_pack_ajax_response();
          exit;
      }
   }
   function SC_monta_condicao(&$comando, $nome, $condicao, $campo, $tp_campo="")
   {
      $nm_aspas   = "'";
      $nm_aspas1  = "'";
      $nm_numeric = array();
      $Nm_datas   = array();
      $nm_esp_postgres = array();
      $campo_join = strtolower(str_replace(".", "_", $nome));
      $nm_ini_lower = "";
      $nm_fim_lower = "";
      $nm_numeric[] = "cod_device";$nm_numeric[] = "activa";$nm_numeric[] = "estado";$nm_numeric[] = "valor_default";$nm_numeric[] = "acepta_tiempo";$nm_numeric[] = "acepta_tokens";$nm_numeric[] = "tipo_dev";$nm_numeric[] = "direccion_torno";$nm_numeric[] = "timeout_rfid";$nm_numeric[] = "discapacitado";$nm_numeric[] = "numcaja";$nm_numeric[] = "empleado";$nm_numeric[] = "tokens";$nm_numeric[] = "bidireccion";$nm_numeric[] = "cod_devicee";$nm_numeric[] = "pin_relay1";$nm_numeric[] = "pin_relay2";$nm_numeric[] = "rfid_estado";
      if (in_array($campo_join, $nm_numeric))
      {
         if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['decimal_db'] == ".")
         {
             $nm_aspas  = "";
             $nm_aspas1 = "";
         }
         if (is_array($campo))
         {
             foreach ($campo as $Ind => $Cmp)
             {
                if (!is_numeric($Cmp))
                {
                    return;
                }
                if ($Cmp == "")
                {
                    $campo[$Ind] = 0;
                }
             }
         }
         else
         {
             if (!is_numeric($campo))
             {
                 return;
             }
             if ($campo == "")
             {
                $campo = 0;
             }
         }
      }
         if (in_array($campo_join, $nm_numeric) && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres) && (strtoupper($condicao) == "II" || strtoupper($condicao) == "QP" || strtoupper($condicao) == "NP"))
         {
             $nome      = "CAST ($nome AS TEXT)";
             $nm_aspas  = "'";
             $nm_aspas1 = "'";
         }
         if (in_array($campo_join, $nm_esp_postgres) && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
         {
             $nome      = "CAST ($nome AS TEXT)";
             $nm_aspas  = "'";
             $nm_aspas1 = "'";
         }
         if (in_array($campo_join, $nm_numeric) && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase) && (strtoupper($condicao) == "II" || strtoupper($condicao) == "QP" || strtoupper($condicao) == "NP"))
         {
             $nome      = "CAST ($nome AS VARCHAR)";
             $nm_aspas  = "'";
             $nm_aspas1 = "'";
         }
         if (in_array($campo_join, $nm_numeric) && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_progress) && (strtoupper($condicao) == "II" || strtoupper($condicao) == "QP" || strtoupper($condicao) == "NP"))
         {
             $nome      = "CAST ($nome AS VARCHAR(255))";
             $nm_aspas  = "'";
             $nm_aspas1 = "'";
         }
      $Nm_datas["ult_fecha"] = "datetime";$Nm_datas["rfid_fecha"] = "timestamp";
         if (isset($Nm_datas[$campo_join]))
         {
             for ($x = 0; $x < strlen($campo); $x++)
             {
                 $tst = substr($campo, $x, 1);
                 if (!is_numeric($tst) && ($tst != "-" && $tst != ":" && $tst != " "))
                 {
                     return;
                 }
             }
         }
          if (isset($Nm_datas[$campo_join]))
          {
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
             $nm_aspas  = "#";
             $nm_aspas1 = "#";
          }
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['SC_sep_date']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['SC_sep_date']))
              {
                  $nm_aspas  = $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['SC_sep_date'];
                  $nm_aspas1 = $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['SC_sep_date1'];
              }
          }
      if (isset($Nm_datas[$campo_join]) && (strtoupper($condicao) == "II" || strtoupper($condicao) == "QP" || strtoupper($condicao) == "NP" || strtoupper($condicao) == "DF"))
      {
          if (strtoupper($condicao) == "DF")
          {
              $condicao = "NP";
          }
          if (($Nm_datas[$campo_join] == "datetime" || $Nm_datas[$campo_join] == "timestamp") && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
          {
              $nome = "to_char (" . $nome . ", 'YYYY-MM-DD hh24:mi:ss')";
          }
          elseif ($Nm_datas[$campo_join] == "date" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
          {
              $nome = "to_char (" . $nome . ", 'YYYY-MM-DD')";
          }
          elseif ($Nm_datas[$campo_join] == "time" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
          {
              $nome = "to_char (" . $nome . ", 'hh24:mi:ss')";
          }
          elseif ($Nm_datas[$campo_join] == "date" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          {
              $nome = "convert(char(10)," . $nome . ",121)";
          }
          elseif (($Nm_datas[$campo_join] == "datetime" || $Nm_datas[$campo_join] == "timestamp") && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          {
              $nome = "convert(char(19)," . $nome . ",121)";
          }
          elseif (($Nm_datas[$campo_join] == "times" || $Nm_datas[$campo_join] == "datetime" || $Nm_datas[$campo_join] == "timestamp") && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $nome  = "TO_DATE(TO_CHAR(" . $nome . ", 'yyyy-mm-dd hh24:mi:ss'), 'yyyy-mm-dd hh24:mi:ss')";
          }
          elseif ($Nm_datas[$campo_join] == "datetime" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          {
              $nome = "EXTEND(" . $nome . ", YEAR TO FRACTION)";
          }
          elseif ($Nm_datas[$campo_join] == "date" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          {
              $nome = "EXTEND(" . $nome . ", YEAR TO DAY)";
          }
          elseif ($Nm_datas[$campo_join] == "datetime" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_progress))
          {
              $nome = "to_char (" . $nome . ", 'YYYY-MM-DD hh24:mi:ss')";
          }
          elseif ($Nm_datas[$campo_join] == "date" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_progress))
          {
              $nome = "to_char (" . $nome . ", 'YYYY-MM-DD')";
          }
      }
         $comando .= (!empty($comando) ? " or " : "");
         if (is_array($campo))
         {
             $prep = "";
             foreach ($campo as $Ind => $Cmp)
             {
                 $prep .= (!empty($prep)) ? "," : "";
                 $Cmp   = substr($this->Db->qstr($Cmp), 1, -1);
                 $prep .= $nm_ini_lower . $nm_aspas . $Cmp . $nm_aspas1 . $nm_fim_lower;
             }
             $prep .= (empty($prep)) ? $nm_aspas . $nm_aspas1 : "";
             $comando .= $nm_ini_lower . $nome . $nm_fim_lower . " in (" . $prep . ")";
             return;
         }
         $campo  = substr($this->Db->qstr($campo), 1, -1);
         $cond_tst = strtoupper($condicao);
         if ($cond_tst == "II" || $cond_tst == "QP" || $cond_tst == "NP")
         {
             if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres) && $this->NM_case_insensitive)
             {
                 $op_like      = " ilike ";
                 $nm_ini_lower = "";
                 $nm_fim_lower = "";
             }
             else
             {
                 $op_like = " like ";
             }
         }
         switch ($cond_tst)
         {
            case "EQ":     // 
               $comando        .= $nm_ini_lower . $nome . $nm_fim_lower . " = " . $nm_ini_lower . $nm_aspas . $campo . $nm_aspas1 . $nm_fim_lower;
            break;
            case "II":     // 
               $comando        .= $nm_ini_lower . $nome . $nm_fim_lower . $op_like . $nm_ini_lower . "'" . $campo . "%'" . $nm_fim_lower;
            break;
            case "QP":     // 
               $comando        .= $nm_ini_lower . $nome . $nm_fim_lower . $op_like . $nm_ini_lower . "'%" . $campo . "%'" . $nm_fim_lower;
            break;
            case "NP":     // 
               $comando        .= $nm_ini_lower . $nome . $nm_fim_lower . " not" . $op_like . $nm_ini_lower . "'%" . $campo . "%'" . $nm_fim_lower;
            break;
            case "DF":     // 
               $comando        .= $nm_ini_lower . $nome . $nm_fim_lower . " <> " . $nm_ini_lower . $nm_aspas . $campo . $nm_aspas1 . $nm_fim_lower;
            break;
            case "GT":     // 
               $comando        .= $nm_ini_lower . $nome . $nm_fim_lower . " > " . $nm_ini_lower . $nm_aspas . $campo . $nm_aspas1 . $nm_fim_lower;
            break;
            case "GE":     // 
               $comando        .= $nm_ini_lower . $nome . $nm_fim_lower . " >= " . $nm_ini_lower . $nm_aspas . $campo . $nm_aspas1 . $nm_fim_lower;
            break;
            case "LT":     // 
               $comando        .= $nm_ini_lower . $nome . $nm_fim_lower . " < " . $nm_ini_lower . $nm_aspas . $campo . $nm_aspas1 . $nm_fim_lower;
            break;
            case "LE":     // 
               $comando        .= $nm_ini_lower . $nome . $nm_fim_lower . " <= " . $nm_ini_lower . $nm_aspas . $campo . $nm_aspas1 . $nm_fim_lower;
            break;
         }
   }
   function SC_lookup_ledstripe1_($condicao, $campo)
   {
       $result = array();
       $campo_orig = $campo;
       $campo  = substr($this->Db->qstr($campo), 1, -1);
       $nm_comando = "SELECT descrip, comando FROM ledeffects WHERE (descrip LIKE '%$campo%')" ; 
       if ($condicao == "ii")
       {
           $nm_comando = str_replace("LIKE '%$campo%'", "LIKE '$campo%'", $nm_comando);
       }
       if ($condicao == "df" || $condicao == "np")
       {
           $nm_comando = str_replace("LIKE '%$campo%'", "NOT LIKE '%$campo%'", $nm_comando);
       }
       if ($condicao == "gt")
       {
           $nm_comando = str_replace("LIKE '%$campo%'", "> '$campo'", $nm_comando);
       }
       if ($condicao == "ge")
       {
           $nm_comando = str_replace("LIKE '%$campo%'", ">= '$campo'", $nm_comando);
       }
       if ($condicao == "lt")
       {
           $nm_comando = str_replace("LIKE '%$campo%'", "< '$campo'", $nm_comando);
       }
       if ($condicao == "le")
       {
           $nm_comando = str_replace("LIKE '%$campo%'", "<= '$campo'", $nm_comando);
       }
       $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
       $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
       if ($rx = $this->Db->Execute($nm_comando)) 
       { 
           $campo = $campo_orig;
           while (!$rx->EOF) 
           { 
               $chave = $rx->fields[1];
               $label = $rx->fields[0];
               if ($condicao == "eq" && $campo == $label)
               {
                   $result[] = $chave;
               }
               if ($condicao == "ii" && $campo == substr($label, 0, strlen($campo)))
               {
                   $result[] = $chave;
               }
               if ($condicao == "qp" && strstr($label, $campo))
               {
                   $result[] = $chave;
               }
               if ($condicao == "np" && !strstr($label, $campo))
               {
                   $result[] = $chave;
               }
               if ($condicao == "df" && $campo != $label)
               {
                   $result[] = $chave;
               }
               if ($condicao == "gt" && $label > $campo )
               {
                   $result[] = $chave;
               }
               if ($condicao == "ge" && $label >= $campo)
               {
                   $result[] = $chave;
               }
               if ($condicao == "lt" && $label < $campo)
               {
                   $result[] = $chave;
               }
               if ($condicao == "le" && $label <= $campo)
               {
                   $result[] = $chave;
               }
               $rx->MoveNext() ;
           }  
           return $result;
       }  
       elseif ($GLOBALS["NM_ERRO_IBASE"] != 1)  
       { 
           $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
           exit; 
       } 
   }
function nmgp_redireciona($tipo=0)
{
   global $nm_apl_dependente;
   if (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && $_SESSION['scriptcase']['sc_tp_saida'] != "D" && $nm_apl_dependente != 1) 
   {
       $nmgp_saida_form = $_SESSION['scriptcase']['nm_sc_retorno'];
   }
   else
   {
       $nmgp_saida_form = $_SESSION['scriptcase']['sc_url_saida'][$this->Ini->sc_page];
   }
   if ($tipo == 2)
   {
       $nmgp_saida_form = "form_devices_leds_effects_fim.php";
   }
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['redir']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['redir'] == 'redir')
   {
       unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']);
   }
   unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['opc_ant']);
   if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['nm_run_menu']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['nm_run_menu'] == 1)
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['nm_run_menu'] = 2;
       $nmgp_saida_form = "form_devices_leds_effects_fim.php";
   }
   $diretorio = explode("/", $nmgp_saida_form);
   $cont = count($diretorio);
   $apl = $diretorio[$cont - 1];
   $apl = str_replace(".php", "", $apl);
   $pos = strpos($apl, "?");
   if ($pos !== false)
   {
       $apl = substr($apl, 0, $pos);
   }
   if ($tipo != 1 && $tipo != 2)
   {
       unset($_SESSION['sc_session'][$this->Ini->sc_page][$apl]['where_orig']);
   }
   if ($this->NM_ajax_flag)
   {
       $sTarget = '_self';
       $this->NM_ajax_info['redir']['metodo']              = 'post';
       $this->NM_ajax_info['redir']['action']              = $nmgp_saida_form;
       $this->NM_ajax_info['redir']['target']              = $sTarget;
       $this->NM_ajax_info['redir']['script_case_init']    = $this->Ini->sc_page;
       if (0 == $tipo)
       {
           $this->NM_ajax_info['redir']['nmgp_url_saida'] = $this->nm_location;
       }
       form_devices_leds_effects_pack_ajax_response();
       exit;
   }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">

   <HTML>
   <HEAD>
    <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
    <META http-equiv="Expires" content="Fri, Jan 01 1900 00:00:00 GMT"/>
    <META http-equiv="Last-Modified" content="<?php echo gmdate("D, d M Y H:i:s"); ?> GMT"/>
    <META http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate"/>
    <META http-equiv="Cache-Control" content="post-check=0, pre-check=0"/>
    <META http-equiv="Pragma" content="no-cache"/>
    <link rel="shortcut icon" href="../_lib/img/scriptcase__NM__ico__NM__favicon.ico">
   </HEAD>
   <BODY>
   <FORM name="form_ok" method="POST" action="<?php echo $this->form_encode_input($nmgp_saida_form); ?>" target="_self">
<?php
   if ($tipo == 0)
   {
?>
     <INPUT type="hidden" name="nmgp_url_saida" value="<?php echo $this->form_encode_input($this->nm_location); ?>"> 
<?php
   }
?>
     <INPUT type="hidden" name="script_case_init" value="<?php echo $this->form_encode_input($this->Ini->sc_page); ?>"> 
   </FORM>
   <SCRIPT type="text/javascript">
      bLigEditLookupCall = <?php if ($this->lig_edit_lookup_call) { ?>true<?php } else { ?>false<?php } ?>;
      function scLigEditLookupCall()
      {
<?php
   if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['sc_modal'])
   {
?>
        parent.<?php echo $this->lig_edit_lookup_cb; ?>(<?php echo $this->lig_edit_lookup_row; ?>);
<?php
   }
   elseif ($this->lig_edit_lookup)
   {
?>
        opener.<?php echo $this->lig_edit_lookup_cb; ?>(<?php echo $this->lig_edit_lookup_row; ?>);
<?php
   }
?>
      }
      if (bLigEditLookupCall)
      {
        scLigEditLookupCall();
      }
<?php
if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['masterValue']))
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['dashboard_info']['under_dashboard']) {
?>
var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['dashboard_info']['parent_widget']; ?>']");
if (dbParentFrame && dbParentFrame[0] && dbParentFrame[0].contentWindow.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['masterValue'] as $cmp_master => $val_master)
        {
?>
    dbParentFrame[0].contentWindow.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['masterValue']);
?>
}
<?php
    }
    else {
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['masterValue'] as $cmp_master => $val_master)
        {
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['masterValue']);
?>
}
<?php
    }
}
?>
      document.form_ok.submit();
   </SCRIPT>
   </BODY>
   </HTML>
<?php
  exit;
}
    function getButtonIds($buttonName) {
        switch ($buttonName) {
            case "balterarsel":
                return array("sc_b_upd_t.sc-unique-btn-1");
                break;
            case "help":
                return array("sc_b_hlp_t");
                break;
            case "exit":
                return array("sc_b_sai_t.sc-unique-btn-2", "sc_b_sai_t.sc-unique-btn-4", "sc_b_sai_t.sc-unique-btn-3");
                break;
            case "birpara":
                return array("brec_b");
                break;
            case "first":
                return array("sc_b_ini_b.sc-unique-btn-5");
                break;
            case "back":
                return array("sc_b_ret_b.sc-unique-btn-6");
                break;
            case "forward":
                return array("sc_b_avc_b.sc-unique-btn-7");
                break;
            case "last":
                return array("sc_b_fim_b.sc-unique-btn-8");
                break;
        }

        return array($buttonName);
    } // getButtonIds

    function displayAppHeader()
    {
    }

    function displayAppFooter()
    {
    }

    function displayAppToolbars()
    {
        if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['run_iframe'] != "R") {
        } else {
            return false;
        }
        return true;
    } // displayAppToolbars

    function displayTopToolbar()
    {
        if (!$this->displayAppToolbars()) {
            return;
        }
    } // displayTopToolbar

    function displayBottomToolbar()
    {
        if (!$this->displayAppToolbars()) {
            return;
        }
    } // displayBottomToolbar

    function scGetColumnOrderRule($fieldName, &$orderColName, &$orderColOrient, &$orderColRule)
    {
        $sortRule = 'nosort';
        if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['ordem_cmp'] == $fieldName) {
            $orderColName = $fieldName;
            if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['ordem_ord'] == " desc") {
                $orderColOrient = $nome_img = $this->Ini->Label_sort_desc;
                $orderColRule = $sortRule = 'desc';
            } else {
                $orderColOrient = $nome_img = $this->Ini->Label_sort_asc;
                $orderColRule = $sortRule = 'asc';
            }
        }
        return $sortRule;
    }

    function scGetColumnOrderIcon($fieldName, $sortRule)
    {        if ('desc' == $sortRule) {
            return "<img src=\"" . $this->Ini->path_img_global . "/" . $this->Ini->Label_sort_desc . "\" class=\"sc-ui-img-order-column\" id=\"sc-id-img-order-" . $fieldName . "\" />";
        } elseif ('asc' == $sortRule) {
            return "<img src=\"" . $this->Ini->path_img_global . "/" . $this->Ini->Label_sort_asc . "\" class=\"sc-ui-img-order-column\" id=\"sc-id-img-order-" . $fieldName . "\" />";
        } elseif ('' != $this->Ini->Label_sort) {
            return "<img src=\"" . $this->Ini->path_img_global . "/" . $this->Ini->Label_sort . "\" class=\"sc-ui-img-order-column\" id=\"sc-id-img-order-" . $fieldName . "\" />";
        } else {
            return '';
        }
    }

    function scIsFieldNumeric($fieldName)
    {
        switch ($fieldName) {
            case "cod_device":
                return true;
            case "activa":
                return true;
            case "estado":
                return true;
            case "valor_default":
                return true;
            case "acepta_tiempo":
                return true;
            case "acepta_tokens":
                return true;
            case "tipo_dev":
                return true;
            case "direccion_torno":
                return true;
            case "timeout_rfid":
                return true;
            case "discapacitado":
                return true;
            case "numcaja":
                return true;
            case "empleado":
                return true;
            case "tokens":
                return true;
            case "bidireccion":
                return true;
            case "cod_deviceE":
                return true;
            case "pin_relay1":
                return true;
            case "pin_relay2":
                return true;
            case "rfid_estado":
                return true;
            default:
                return false;
        }
        return false;
    }

    function scGetDefaultFieldOrder($fieldName)
    {
        switch ($fieldName) {
            case "cod_device":
                return 'desc';
            case "activa":
                return 'desc';
            case "estado":
                return 'desc';
            case "ult_fecha":
                return 'desc';
            case "valor_default":
                return 'desc';
            case "acepta_tiempo":
                return 'desc';
            case "acepta_tokens":
                return 'desc';
            case "tipo_dev":
                return 'desc';
            case "direccion_torno":
                return 'desc';
            case "timeout_rfid":
                return 'desc';
            case "discapacitado":
                return 'desc';
            case "numcaja":
                return 'desc';
            case "empleado":
                return 'desc';
            case "tokens":
                return 'desc';
            case "bidireccion":
                return 'desc';
            case "cod_deviceE":
                return 'desc';
            case "pin_relay1":
                return 'desc';
            case "pin_relay2":
                return 'desc';
            case "rfid_estado":
                return 'desc';
            case "rfid_fecha":
                return 'desc';
            default:
                return 'asc';
        }
        return 'asc';
    }
}
?>
