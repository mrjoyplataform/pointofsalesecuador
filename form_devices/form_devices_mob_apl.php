<?php
//
class form_devices_mob_apl
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
   var $cod_device;
   var $cod_activo;
   var $cod_grupo;
   var $cod_grupo_1;
   var $device_name;
   var $activa;
   var $estado;
   var $ult_rfid;
   var $ult_fecha;
   var $ult_fecha_hora;
   var $valor_default;
   var $acepta_tiempo;
   var $acepta_tokens;
   var $dev_ip;
   var $tipo_dev;
   var $direccion_torno;
   var $timeout_rfid;
   var $discapacitado;
   var $numcaja;
   var $empleado;
   var $tokens;
   var $serialrfid;
   var $bidireccion;
   var $cod_devicee;
   var $url_1;
   var $url_2;
   var $url_3;
   var $foto1;
   var $foto1_scfile_name;
   var $foto1_ul_name;
   var $foto1_scfile_type;
   var $foto1_ul_type;
   var $foto1_limpa;
   var $foto1_salva;
   var $out_foto1;
   var $foto2;
   var $foto2_scfile_name;
   var $foto2_ul_name;
   var $foto2_scfile_type;
   var $foto2_ul_type;
   var $foto2_limpa;
   var $foto2_salva;
   var $out_foto2;
   var $foto3;
   var $foto3_scfile_name;
   var $foto3_ul_name;
   var $foto3_scfile_type;
   var $foto3_ul_type;
   var $foto3_limpa;
   var $foto3_salva;
   var $out_foto3;
   var $pin_relay1;
   var $pin_relay2;
   var $rfid_read;
   var $rfid_estado;
   var $rfid_fecha;
   var $rfid_fecha_hora;
   var $url_accion;
   var $url_atraccion;
   var $nm_data;
   var $nmgp_opcao;
   var $nmgp_opc_ant;
   var $sc_evento;
   var $sc_insert_on;
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
               $glo_senha_protect, $nm_apl_dependente, $nm_form_submit, $sc_check_excl, $nm_opc_form_php, $nm_call_php, $nm_opc_lookup;


      if ($this->NM_ajax_flag)
      {
          if (isset($this->NM_ajax_info['param']['acepta_tokens']))
          {
              $this->acepta_tokens = $this->NM_ajax_info['param']['acepta_tokens'];
          }
          if (isset($this->NM_ajax_info['param']['activa']))
          {
              $this->activa = $this->NM_ajax_info['param']['activa'];
          }
          if (isset($this->NM_ajax_info['param']['cod_activo']))
          {
              $this->cod_activo = $this->NM_ajax_info['param']['cod_activo'];
          }
          if (isset($this->NM_ajax_info['param']['cod_device']))
          {
              $this->cod_device = $this->NM_ajax_info['param']['cod_device'];
          }
          if (isset($this->NM_ajax_info['param']['cod_grupo']))
          {
              $this->cod_grupo = $this->NM_ajax_info['param']['cod_grupo'];
          }
          if (isset($this->NM_ajax_info['param']['dev_ip']))
          {
              $this->dev_ip = $this->NM_ajax_info['param']['dev_ip'];
          }
          if (isset($this->NM_ajax_info['param']['device_name']))
          {
              $this->device_name = $this->NM_ajax_info['param']['device_name'];
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
          if (isset($this->NM_ajax_info['param']['nmgp_url_saida']))
          {
              $this->nmgp_url_saida = $this->NM_ajax_info['param']['nmgp_url_saida'];
          }
          if (isset($this->NM_ajax_info['param']['pin_relay1']))
          {
              $this->pin_relay1 = $this->NM_ajax_info['param']['pin_relay1'];
          }
          if (isset($this->NM_ajax_info['param']['pin_relay2']))
          {
              $this->pin_relay2 = $this->NM_ajax_info['param']['pin_relay2'];
          }
          if (isset($this->NM_ajax_info['param']['script_case_init']))
          {
              $this->script_case_init = $this->NM_ajax_info['param']['script_case_init'];
          }
          if (isset($this->NM_ajax_info['param']['tokens']))
          {
              $this->tokens = $this->NM_ajax_info['param']['tokens'];
          }
          if (isset($this->NM_ajax_info['param']['url_accion']))
          {
              $this->url_accion = $this->NM_ajax_info['param']['url_accion'];
          }
          if (isset($this->NM_ajax_info['param']['url_atraccion']))
          {
              $this->url_atraccion = $this->NM_ajax_info['param']['url_atraccion'];
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
          $_SESSION['sc_session'][$script_case_init]['form_devices_mob']['opcao']   = "novo";
          $_SESSION['sc_session'][$script_case_init]['form_devices_mob']['opc_ant'] = "inicio";
      }
      if (isset($_SESSION['sc_session'][$script_case_init]['form_devices_mob']['embutida_parms']))
      { 
          $this->nmgp_parms = $_SESSION['sc_session'][$script_case_init]['form_devices_mob']['embutida_parms'];
          unset($_SESSION['sc_session'][$script_case_init]['form_devices_mob']['embutida_parms']);
      } 
      if (isset($this->nmgp_parms) && !empty($this->nmgp_parms)) 
      { 
          if (isset($_SESSION['nm_aba_bg_color'])) 
          { 
              unset($_SESSION['nm_aba_bg_color']);
          }   
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
                 nm_limpa_str_form_devices_mob($cadapar[1]);
                 if ($cadapar[1] == "@ ") {$cadapar[1] = trim($cadapar[1]); }
                 $Tmp_par = $cadapar[0];
                 $this->$Tmp_par = $cadapar[1];
             }
             $ix++;
          }
          if (isset($this->NM_where_filter_form))
          {
              $_SESSION['sc_session'][$script_case_init]['form_devices_mob']['where_filter_form'] = $this->NM_where_filter_form;
              unset($_SESSION['sc_session'][$script_case_init]['form_devices_mob']['total']);
          }
          if (isset($this->sc_redir_atualiz))
          {
              $_SESSION['sc_session'][$script_case_init]['form_devices_mob']['sc_redir_atualiz'] = $this->sc_redir_atualiz;
          }
          if (isset($this->sc_redir_insert))
          {
              $_SESSION['sc_session'][$script_case_init]['form_devices_mob']['sc_redir_insert'] = $this->sc_redir_insert;
          }
      } 
      elseif (isset($script_case_init) && !empty($script_case_init) && isset($_SESSION['sc_session'][$script_case_init]['form_devices_mob']['parms']))
      {
          if ((!isset($this->nmgp_opcao) || ($this->nmgp_opcao != "incluir" && $this->nmgp_opcao != "alterar" && $this->nmgp_opcao != "excluir" && $this->nmgp_opcao != "novo" && $this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form")) && (!isset($this->NM_ajax_opcao) || $this->NM_ajax_opcao == ""))
          {
              $todox = str_replace("?#?@?@?", "?#?@ ?@?", $_SESSION['sc_session'][$script_case_init]['form_devices_mob']['parms']);
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
          $_SESSION['sc_session'][$script_case_init]['form_devices_mob']['nm_run_menu'] = 1;
      } 
      if (!$this->NM_ajax_flag && 'autocomp_' == substr($this->NM_ajax_opcao, 0, 9))
      {
          $this->NM_ajax_flag = true;
      }

      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      if (isset($this->nm_evt_ret_edit) && '' != $this->nm_evt_ret_edit)
      {
          $_SESSION['sc_session'][$script_case_init]['form_devices_mob']['lig_edit_lookup']     = true;
          $_SESSION['sc_session'][$script_case_init]['form_devices_mob']['lig_edit_lookup_cb']  = $this->nm_evt_ret_edit;
          $_SESSION['sc_session'][$script_case_init]['form_devices_mob']['lig_edit_lookup_row'] = isset($this->nm_evt_ret_row) ? $this->nm_evt_ret_row : '';
      }
      if (isset($_SESSION['sc_session'][$script_case_init]['form_devices_mob']['lig_edit_lookup']) && $_SESSION['sc_session'][$script_case_init]['form_devices_mob']['lig_edit_lookup'])
      {
          $this->lig_edit_lookup     = true;
          $this->lig_edit_lookup_cb  = $_SESSION['sc_session'][$script_case_init]['form_devices_mob']['lig_edit_lookup_cb'];
          $this->lig_edit_lookup_row = $_SESSION['sc_session'][$script_case_init]['form_devices_mob']['lig_edit_lookup_row'];
      }
      if (!$this->Ini)
      { 
          $this->Ini = new form_devices_mob_ini(); 
          $this->Ini->init();
          $this->nm_data = new nm_data("es");
          $this->app_is_initializing = $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['initialize'];
          if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_devices']))
          {
              foreach ($_SESSION['scriptcase']['sc_apl_conf']['form_devices'] as $I_conf => $Conf_opt)
              {
                  $_SESSION['scriptcase']['sc_apl_conf']['form_devices_mob'][$I_conf]  = $Conf_opt;
              }
          }
      } 
      else 
      { 
         $this->nm_data = new nm_data("es");
      } 
      $_SESSION['sc_session'][$script_case_init]['form_devices_mob']['upload_field_info'] = array();

      $_SESSION['sc_session'][$script_case_init]['form_devices_mob']['upload_field_info']['foto1'] = array(
          'app_dir'            => $this->Ini->path_aplicacao,
          'app_name'           => 'form_devices_mob',
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

      $_SESSION['sc_session'][$script_case_init]['form_devices_mob']['upload_field_info']['foto2'] = array(
          'app_dir'            => $this->Ini->path_aplicacao,
          'app_name'           => 'form_devices_mob',
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

      $_SESSION['sc_session'][$script_case_init]['form_devices_mob']['upload_field_info']['foto3'] = array(
          'app_dir'            => $this->Ini->path_aplicacao,
          'app_name'           => 'form_devices_mob',
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

      unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['masterValue']);
      $this->Change_Menu = false;
      $run_iframe = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['run_iframe']) && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['run_iframe'] == "R")) ? true : false;
      if (!$run_iframe && isset($_SESSION['scriptcase']['menu_atual']) && !$_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['embutida_call'] && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['sc_outra_jan']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['sc_outra_jan']))
      {
          $this->sc_init_menu = "x";
          if (isset($_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init']['form_devices_mob']))
          {
              $this->sc_init_menu = $_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init']['form_devices_mob'];
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
          if ($this->Ini->sc_page == $this->sc_init_menu && !isset($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['form_devices_mob']))
          {
               $_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['form_devices_mob']['link'] = $this->Ini->sc_protocolo . $this->Ini->server . $this->Ini->path_link . "" . SC_dir_app_name('form_devices_mob') . "/";
               $_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['form_devices_mob']['label'] = "" . $this->Ini->Nm_lang['lang_othr_frmu_title'] . " devices";
               $this->Change_Menu = true;
          }
          elseif ($this->Ini->sc_page == $this->sc_init_menu)
          {
              $achou = false;
              foreach ($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu] as $apl => $parms)
              {
                  if ($apl == "form_devices_mob")
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
      $this->Ini->Str_btn_form = (isset($_SESSION['scriptcase']['str_button_all'])) ? $_SESSION['scriptcase']['str_button_all'] : "roundboton";
      $_SESSION['scriptcase']['str_button_all'] = $this->Ini->Str_btn_form;
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
      $this->Ini->Img_status_ok       = "" == trim($str_img_status_ok)   ? ""     : $str_img_status_ok;
      $this->Ini->Img_status_err      = "" == trim($str_img_status_err)  ? ""     : $str_img_status_err;
      $this->Ini->Css_status          = "scFormInputError";
      $this->Ini->Css_status_pwd_box  = "scFormInputErrorPwdBox";
      $this->Ini->Css_status_pwd_text = "scFormInputErrorPwdText";
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



      $_SESSION['scriptcase']['error_icon']['form_devices_mob']  = "<img src=\"" . $this->Ini->path_icones . "/scriptcase__NM__btn__NM__scriptcase9_Rhino__NM__nm_scriptcase9_Rhino_error.png\" style=\"border-width: 0px\" align=\"top\">&nbsp;";
      $_SESSION['scriptcase']['error_close']['form_devices_mob'] = "<td>" . nmButtonOutput($this->arr_buttons, "berrm_clse", "document.getElementById('id_error_display_fixed').style.display = 'none'; document.getElementById('id_error_message_fixed').innerHTML = ''; return false", "document.getElementById('id_error_display_fixed').style.display = 'none'; document.getElementById('id_error_message_fixed').innerHTML = ''; return false", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "") . "</td>";

      $this->Embutida_proc = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['embutida_proc']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['embutida_proc'] : $this->Embutida_proc;
      $this->Embutida_form = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['embutida_form']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['embutida_form'] : $this->Embutida_form;
      $this->Embutida_call = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['embutida_call']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['embutida_call'] : $this->Embutida_call;

       $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['table_refresh'] = false;

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['embutida_liga_grid_edit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['embutida_liga_grid_edit'])
      {
          $this->Grid_editavel = ('on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['embutida_liga_grid_edit']) ? true : false;
      }
      if (isset($this->Grid_editavel) && $this->Grid_editavel)
      {
          $this->Embutida_form  = true;
          $this->Embutida_ronly = true;
      }
      $this->Embutida_multi = false;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['embutida_multi']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['embutida_multi'])
      {
          $this->Grid_editavel  = false;
          $this->Embutida_form  = false;
          $this->Embutida_ronly = false;
          $this->Embutida_multi = true;
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['embutida_liga_tp_pag']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['embutida_liga_tp_pag'])
      {
          $this->form_paginacao = $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['embutida_liga_tp_pag'];
      }

      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['embutida_form']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['embutida_form'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['embutida_form'] = $this->Embutida_form;
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['embutida_liga_grid_edit']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['embutida_liga_grid_edit'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['embutida_liga_grid_edit'] = $this->Grid_editavel ? 'on' : 'off';
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['embutida_liga_grid_edit']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['embutida_liga_grid_edit'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['embutida_liga_grid_edit'] = $this->Embutida_call;
      }

      $this->Ini->cor_grid_par = $this->Ini->cor_grid_impar;
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      $this->nmgp_url_saida  = $nm_url_saida;
      $this->nmgp_form_show  = "on";
      $this->nmgp_form_empty = false;
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_valida.php", "C", "NM_Valida") ; 
      $teste_validade = new NM_Valida ;

      $this->loadFieldConfig();

      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['first_time'])
      {
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_devices_mob']['insert']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_devices_mob']['new']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_devices_mob']['update']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_devices_mob']['delete']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_devices_mob']['first']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_devices_mob']['back']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_devices_mob']['forward']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_devices_mob']['last']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_devices_mob']['qsearch']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_devices_mob']['dynsearch']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_devices_mob']['summary']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_devices_mob']['navpage']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_devices_mob']['goto']);
      }
      $this->NM_cancel_return_new = (isset($this->NM_cancel_return_new) && $this->NM_cancel_return_new == 1) ? "1" : "";
      $this->NM_cancel_insert_new = ((isset($this->NM_cancel_insert_new) && $this->NM_cancel_insert_new == 1) || $this->NM_cancel_return_new == 1) ? "document.F5.action='" . $nm_url_saida . "';" : "";
      if (isset($this->NM_btn_insert) && '' != $this->NM_btn_insert && (!isset($_SESSION['scriptcase']['sc_apl_conf']['form_devices_mob']['insert']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['form_devices_mob']['insert']))
      {
          if ('N' == $this->NM_btn_insert)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_devices_mob']['insert'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_devices_mob']['insert'] = 'on';
          }
      }
      if (isset($this->NM_btn_new) && 'N' == $this->NM_btn_new)
      {
          $_SESSION['scriptcase']['sc_apl_conf_lig']['form_devices_mob']['new'] = 'off';
      }
      if (isset($this->NM_btn_update) && '' != $this->NM_btn_update && (!isset($_SESSION['scriptcase']['sc_apl_conf']['form_devices_mob']['update']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['form_devices_mob']['update']))
      {
          if ('N' == $this->NM_btn_update)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_devices_mob']['update'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_devices_mob']['update'] = 'on';
          }
      }
      if (isset($this->NM_btn_delete) && '' != $this->NM_btn_delete && (!isset($_SESSION['scriptcase']['sc_apl_conf']['form_devices_mob']['delete']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['form_devices_mob']['delete']))
      {
          if ('N' == $this->NM_btn_delete)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_devices_mob']['delete'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_devices_mob']['delete'] = 'on';
          }
      }
      if (isset($this->NM_btn_navega) && '' != $this->NM_btn_navega)
      {
          if ('N' == $this->NM_btn_navega)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_devices_mob']['first']     = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_devices_mob']['back']      = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_devices_mob']['forward']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_devices_mob']['last']      = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_devices_mob']['qsearch']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_devices_mob']['dynsearch'] = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_devices_mob']['summary']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_devices_mob']['navpage']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_devices_mob']['goto']      = 'off';
              $this->Nav_permite_ava = false;
              $this->Nav_permite_ret = false;
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_devices_mob']['first']     = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_devices_mob']['back']      = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_devices_mob']['forward']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_devices_mob']['last']      = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_devices_mob']['qsearch']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_devices_mob']['dynsearch'] = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_devices_mob']['summary']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_devices_mob']['navpage']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_devices_mob']['goto']      = 'on';
          }
      }

      $this->nmgp_botoes['cancel'] = "on";
      $this->nmgp_botoes['exit'] = "on";
      $this->nmgp_botoes['qsearch'] = "on";
      $this->nmgp_botoes['new'] = "on";
      $this->nmgp_botoes['insert'] = "on";
      $this->nmgp_botoes['copy'] = "on";
      $this->nmgp_botoes['update'] = "on";
      $this->nmgp_botoes['delete'] = "on";
      $this->nmgp_botoes['first'] = "on";
      $this->nmgp_botoes['back'] = "on";
      $this->nmgp_botoes['forward'] = "on";
      $this->nmgp_botoes['last'] = "on";
      $this->nmgp_botoes['summary'] = "on";
      $this->nmgp_botoes['navpage'] = "on";
      $this->nmgp_botoes['goto'] = "on";
      $this->nmgp_botoes['qtline'] = "off";
      $this->nmgp_botoes['reload'] = "off";
      if (isset($this->NM_btn_cancel) && 'N' == $this->NM_btn_cancel)
      {
          $this->nmgp_botoes['cancel'] = "off";
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['where_orig'] = "";
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['where_pesq']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['where_pesq'] = "";
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['where_pesq_filtro'] = "";
      }
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['where_pesq_filtro'];
      if ($this->NM_ajax_flag && 'event_' == substr($this->NM_ajax_opcao, 0, 6)) {
          $this->nmgp_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['buttonStatus'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['iframe_filtro']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['iframe_filtro'] == "S")
      {
          $this->nmgp_botoes['exit'] = "off";
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_devices_mob']['btn_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['form_devices_mob']['btn_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['form_devices_mob']['btn_display'] as $NM_cada_btn => $NM_cada_opc)
          {
              $this->nmgp_botoes[$NM_cada_btn] = $NM_cada_opc;
          }
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_devices_mob']['insert']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_devices_mob']['insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_devices_mob']['insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_devices_mob']['insert'];
          $this->nmgp_botoes['copy']   = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_devices_mob']['insert'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_devices_mob']['new']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_devices_mob']['new'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_devices_mob']['new'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_devices_mob']['update']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_devices_mob']['update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_devices_mob']['update'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_devices_mob']['delete']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_devices_mob']['delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_devices_mob']['delete'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_devices_mob']['first']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_devices_mob']['first'] != '')
      {
          $this->nmgp_botoes['first'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_devices_mob']['first'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_devices_mob']['back']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_devices_mob']['back'] != '')
      {
          $this->nmgp_botoes['back'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_devices_mob']['back'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_devices_mob']['forward']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_devices_mob']['forward'] != '')
      {
          $this->nmgp_botoes['forward'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_devices_mob']['forward'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_devices_mob']['last']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_devices_mob']['last'] != '')
      {
          $this->nmgp_botoes['last'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_devices_mob']['last'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_devices_mob']['qsearch']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_devices_mob']['qsearch'] != '')
      {
          $this->nmgp_botoes['qsearch'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_devices_mob']['qsearch'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_devices_mob']['dynsearch']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_devices_mob']['dynsearch'] != '')
      {
          $this->nmgp_botoes['dynsearch'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_devices_mob']['dynsearch'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_devices_mob']['summary']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_devices_mob']['summary'] != '')
      {
          $this->nmgp_botoes['summary'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_devices_mob']['summary'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_devices_mob']['navpage']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_devices_mob']['navpage'] != '')
      {
          $this->nmgp_botoes['navpage'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_devices_mob']['navpage'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_devices_mob']['goto']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_devices_mob']['goto'] != '')
      {
          $this->nmgp_botoes['goto'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_devices_mob']['goto'];
      }

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['embutida_liga_form_insert']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['embutida_liga_form_insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['embutida_liga_form_insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['embutida_liga_form_insert'];
          $this->nmgp_botoes['copy']   = $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['embutida_liga_form_insert'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['embutida_liga_form_update']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['embutida_liga_form_update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['embutida_liga_form_update'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['embutida_liga_form_delete']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['embutida_liga_form_delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['embutida_liga_form_delete'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['embutida_liga_form_btn_nav']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['embutida_liga_form_btn_nav'] != '')
      {
          $this->nmgp_botoes['first']   = $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['back']    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['forward'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['last']    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['embutida_liga_form_btn_nav'];
      }

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['dashboard_info']['under_dashboard'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['dashboard_info']['maximized']) {
          $tmpDashboardApp = $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['dashboard_info']['dashboard_app'];
          if (isset($_SESSION['scriptcase']['dashboard_toolbar'][$tmpDashboardApp]['form_devices_mob'])) {
              $tmpDashboardButtons = $_SESSION['scriptcase']['dashboard_toolbar'][$tmpDashboardApp]['form_devices_mob'];

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

      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_devices_mob']['insert']) && $_SESSION['scriptcase']['sc_apl_conf']['form_devices_mob']['insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf']['form_devices_mob']['insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['scriptcase']['sc_apl_conf']['form_devices_mob']['insert'];
          $this->nmgp_botoes['copy']   = $_SESSION['scriptcase']['sc_apl_conf']['form_devices_mob']['insert'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_devices_mob']['update']) && $_SESSION['scriptcase']['sc_apl_conf']['form_devices_mob']['update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['scriptcase']['sc_apl_conf']['form_devices_mob']['update'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_devices_mob']['delete']) && $_SESSION['scriptcase']['sc_apl_conf']['form_devices_mob']['delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['scriptcase']['sc_apl_conf']['form_devices_mob']['delete'];
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_devices_mob']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['form_devices_mob']['field_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['form_devices_mob']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->nmgp_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
              $this->NM_ajax_info['fieldDisplay'][$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_devices_mob']['field_readonly']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['form_devices_mob']['field_readonly']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['form_devices_mob']['field_readonly'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->nmgp_cmp_readonly[$NM_cada_field] = "on";
              $this->NM_ajax_info['readOnly'][$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_devices_mob']['exit']) && $_SESSION['scriptcase']['sc_apl_conf']['form_devices_mob']['exit'] != '')
      {
          $_SESSION['scriptcase']['sc_url_saida'][$this->Ini->sc_page]       = $_SESSION['scriptcase']['sc_apl_conf']['form_devices_mob']['exit'];
          $_SESSION['scriptcase']['sc_force_url_saida'][$this->Ini->sc_page] = true;
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['dados_form']))
      {
          $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['dados_form'];
          if (!isset($this->estado)){$this->estado = $this->nmgp_dados_form['estado'];} 
          if (!isset($this->ult_rfid)){$this->ult_rfid = $this->nmgp_dados_form['ult_rfid'];} 
          if (!isset($this->ult_fecha)){$this->ult_fecha = $this->nmgp_dados_form['ult_fecha'];} 
          if (!isset($this->valor_default)){$this->valor_default = $this->nmgp_dados_form['valor_default'];} 
          if (!isset($this->acepta_tiempo)){$this->acepta_tiempo = $this->nmgp_dados_form['acepta_tiempo'];} 
          if (!isset($this->tipo_dev)){$this->tipo_dev = $this->nmgp_dados_form['tipo_dev'];} 
          if (!isset($this->direccion_torno)){$this->direccion_torno = $this->nmgp_dados_form['direccion_torno'];} 
          if (!isset($this->timeout_rfid)){$this->timeout_rfid = $this->nmgp_dados_form['timeout_rfid'];} 
          if (!isset($this->discapacitado)){$this->discapacitado = $this->nmgp_dados_form['discapacitado'];} 
          if (!isset($this->numcaja)){$this->numcaja = $this->nmgp_dados_form['numcaja'];} 
          if (!isset($this->empleado)){$this->empleado = $this->nmgp_dados_form['empleado'];} 
          if (!isset($this->serialrfid)){$this->serialrfid = $this->nmgp_dados_form['serialrfid'];} 
          if (!isset($this->bidireccion)){$this->bidireccion = $this->nmgp_dados_form['bidireccion'];} 
          if (!isset($this->cod_devicee)){$this->cod_devicee = $this->nmgp_dados_form['cod_devicee'];} 
          if (!isset($this->url_1)){$this->url_1 = $this->nmgp_dados_form['url_1'];} 
          if (!isset($this->url_2)){$this->url_2 = $this->nmgp_dados_form['url_2'];} 
          if (!isset($this->url_3)){$this->url_3 = $this->nmgp_dados_form['url_3'];} 
          if (!isset($this->foto1)){$this->foto1 = $this->nmgp_dados_form['foto1'];} 
          if (!isset($this->foto2)){$this->foto2 = $this->nmgp_dados_form['foto2'];} 
          if (!isset($this->foto3)){$this->foto3 = $this->nmgp_dados_form['foto3'];} 
          if (!isset($this->rfid_read)){$this->rfid_read = $this->nmgp_dados_form['rfid_read'];} 
          if (!isset($this->rfid_estado)){$this->rfid_estado = $this->nmgp_dados_form['rfid_estado'];} 
          if (!isset($this->rfid_fecha)){$this->rfid_fecha = $this->nmgp_dados_form['rfid_fecha'];} 
      }
      $glo_senha_protect = (isset($_SESSION['scriptcase']['glo_senha_protect'])) ? $_SESSION['scriptcase']['glo_senha_protect'] : "S";
      $this->aba_iframe = false;
      if (isset($_SESSION['scriptcase']['sc_aba_iframe']))
      {
          foreach ($_SESSION['scriptcase']['sc_aba_iframe'] as $aba => $apls_aba)
          {
              if (in_array("form_devices_mob", $apls_aba))
              {
                  $this->aba_iframe = true;
                  break;
              }
          }
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['iframe_menu'] && (!isset($_SESSION['scriptcase']['menu_mobile']) || empty($_SESSION['scriptcase']['menu_mobile'])))
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

      if (is_file($this->Ini->path_aplicacao . 'form_devices_mob_help.txt'))
      {
          $arr_link_webhelp = file($this->Ini->path_aplicacao . 'form_devices_mob_help.txt');
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
          require_once($this->Ini->path_embutida . 'form_devices/form_devices_mob_erro.class.php');
      }
      else
      { 
          require_once($this->Ini->path_aplicacao . "form_devices_mob_erro.class.php"); 
      }
      $this->Erro      = new form_devices_mob_erro();
      $this->Erro->Ini = $this->Ini;
      $this->proc_fast_search = false;
      if ($this->nmgp_opcao == "fast_search")  
      {
          $this->SC_fast_search($this->nmgp_fast_search, $this->nmgp_cond_fast_search, $this->nmgp_arg_fast_search);
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['opcao'] = "inicio";
          $this->nmgp_opcao = "inicio";
          $this->proc_fast_search = true;
      } 
      if ($nm_opc_lookup != "lookup" && $nm_opc_php != "formphp")
      { 
         if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['opcao']))
         { 
             if ($this->cod_device != "")   
             { 
                 $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['opcao'] = "igual" ;  
             }   
         }   
      } 
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['opcao']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['opcao']) && empty($this->nmgp_refresh_fields))
      {
          $this->nmgp_opcao = $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['opcao'];  
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['opcao'] = "" ;  
          if ($this->nmgp_opcao == "edit_novo")  
          {
             $this->nmgp_opcao = "novo";
             $this->nm_flag_saida_novo = "S";
          }
      } 
      $this->nm_Start_new = false;
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_devices_mob']['start']) && $_SESSION['scriptcase']['sc_apl_conf']['form_devices_mob']['start'] == 'new')
      {
          $this->nmgp_opcao = "novo";
          $this->nm_Start_new = true;
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['opcao'] = "novo";
          unset($_SESSION['scriptcase']['sc_apl_conf']['form_devices_mob']['start']);
      }
      if ($this->nmgp_opcao == "igual")  
      {
          $this->nmgp_opc_ant = $this->nmgp_opcao;
      } 
      else
      {
          $this->nmgp_opc_ant = $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['opc_ant'];
      } 
      if ($this->nmgp_opcao == "recarga" || $this->nmgp_opcao == "muda_form")  
      {
          $this->nmgp_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['botoes'];
          $this->Nav_permite_ret = 0 != $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['inicio'];
          $this->Nav_permite_ava = $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['total'] != $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['final'];
      }
      else
      {
      }
      $this->nm_flag_iframe = false;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['dados_form'])) 
      {
         $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['dados_form'];
      }
      if ($this->nmgp_opcao == "edit_novo")  
      {
          $this->nmgp_opcao = "novo";
          $this->nm_flag_saida_novo = "S";
      }
//
      $this->NM_case_insensitive = false;
      $this->sc_evento = $this->nmgp_opcao;
      $this->sc_insert_on = false;
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
      if (isset($this->cod_device)) { $this->nm_limpa_alfa($this->cod_device); }
      if (isset($this->cod_activo)) { $this->nm_limpa_alfa($this->cod_activo); }
      if (isset($this->cod_grupo)) { $this->nm_limpa_alfa($this->cod_grupo); }
      if (isset($this->device_name)) { $this->nm_limpa_alfa($this->device_name); }
      if (isset($this->activa)) { $this->nm_limpa_alfa($this->activa); }
      if (isset($this->acepta_tokens)) { $this->nm_limpa_alfa($this->acepta_tokens); }
      if (isset($this->dev_ip)) { $this->nm_limpa_alfa($this->dev_ip); }
      if (isset($this->tokens)) { $this->nm_limpa_alfa($this->tokens); }
      if (isset($this->pin_relay1)) { $this->nm_limpa_alfa($this->pin_relay1); }
      if (isset($this->pin_relay2)) { $this->nm_limpa_alfa($this->pin_relay2); }
      $Campos_Crit       = "";
      $Campos_erro       = "";
      $Campos_Falta      = array();
      $Campos_Erros      = array();
      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          =  substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['opc_edit'] = true;  
     if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['dados_select'])) 
     {
        $this->nmgp_dados_select = $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['dados_select'];
     }
   }

   function loadFieldConfig()
   {
      $this->field_config = array();
      //-- cod_device
      $this->field_config['cod_device']               = array();
      $this->field_config['cod_device']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['cod_device']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['cod_device']['symbol_dec'] = '';
      $this->field_config['cod_device']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['cod_device']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- tokens
      $this->field_config['tokens']               = array();
      $this->field_config['tokens']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['tokens']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['tokens']['symbol_dec'] = '';
      $this->field_config['tokens']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['tokens']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- pin_relay1
      $this->field_config['pin_relay1']               = array();
      $this->field_config['pin_relay1']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['pin_relay1']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['pin_relay1']['symbol_dec'] = '';
      $this->field_config['pin_relay1']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['pin_relay1']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- pin_relay2
      $this->field_config['pin_relay2']               = array();
      $this->field_config['pin_relay2']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['pin_relay2']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['pin_relay2']['symbol_dec'] = '';
      $this->field_config['pin_relay2']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['pin_relay2']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- estado
      $this->field_config['estado']               = array();
      $this->field_config['estado']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['estado']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['estado']['symbol_dec'] = '';
      $this->field_config['estado']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['estado']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- ult_fecha
      $this->field_config['ult_fecha']                 = array();
      $this->field_config['ult_fecha']['date_format']  = $_SESSION['scriptcase']['reg_conf']['date_format'] . ';' . $_SESSION['scriptcase']['reg_conf']['time_format'];
      $this->field_config['ult_fecha']['date_sep']     = $_SESSION['scriptcase']['reg_conf']['date_sep'];
      $this->field_config['ult_fecha']['time_sep']     = $_SESSION['scriptcase']['reg_conf']['time_sep'];
      $this->field_config['ult_fecha']['date_display'] = "ddmmaaaa;hhiiss";
      $this->new_date_format('DH', 'ult_fecha');
      //-- valor_default
      $this->field_config['valor_default']               = array();
      $this->field_config['valor_default']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_val'];
      $this->field_config['valor_default']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['valor_default']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_val'];
      $this->field_config['valor_default']['symbol_mon'] = '';
      $this->field_config['valor_default']['format_pos'] = $_SESSION['scriptcase']['reg_conf']['monet_f_pos'];
      $this->field_config['valor_default']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['monet_f_neg'];
      //-- acepta_tiempo
      $this->field_config['acepta_tiempo']               = array();
      $this->field_config['acepta_tiempo']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['acepta_tiempo']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['acepta_tiempo']['symbol_dec'] = '';
      $this->field_config['acepta_tiempo']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['acepta_tiempo']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- tipo_dev
      $this->field_config['tipo_dev']               = array();
      $this->field_config['tipo_dev']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['tipo_dev']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['tipo_dev']['symbol_dec'] = '';
      $this->field_config['tipo_dev']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['tipo_dev']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- direccion_torno
      $this->field_config['direccion_torno']               = array();
      $this->field_config['direccion_torno']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['direccion_torno']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['direccion_torno']['symbol_dec'] = '';
      $this->field_config['direccion_torno']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['direccion_torno']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- timeout_rfid
      $this->field_config['timeout_rfid']               = array();
      $this->field_config['timeout_rfid']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['timeout_rfid']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['timeout_rfid']['symbol_dec'] = '';
      $this->field_config['timeout_rfid']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['timeout_rfid']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- discapacitado
      $this->field_config['discapacitado']               = array();
      $this->field_config['discapacitado']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['discapacitado']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['discapacitado']['symbol_dec'] = '';
      $this->field_config['discapacitado']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['discapacitado']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- numcaja
      $this->field_config['numcaja']               = array();
      $this->field_config['numcaja']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['numcaja']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['numcaja']['symbol_dec'] = '';
      $this->field_config['numcaja']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['numcaja']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- empleado
      $this->field_config['empleado']               = array();
      $this->field_config['empleado']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['empleado']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['empleado']['symbol_dec'] = '';
      $this->field_config['empleado']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['empleado']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- bidireccion
      $this->field_config['bidireccion']               = array();
      $this->field_config['bidireccion']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['bidireccion']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['bidireccion']['symbol_dec'] = '';
      $this->field_config['bidireccion']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['bidireccion']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- cod_devicee
      $this->field_config['cod_devicee']               = array();
      $this->field_config['cod_devicee']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['cod_devicee']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['cod_devicee']['symbol_dec'] = '';
      $this->field_config['cod_devicee']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['cod_devicee']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- rfid_estado
      $this->field_config['rfid_estado']               = array();
      $this->field_config['rfid_estado']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['rfid_estado']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['rfid_estado']['symbol_dec'] = '';
      $this->field_config['rfid_estado']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['rfid_estado']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- rfid_fecha
      $this->field_config['rfid_fecha']                 = array();
      $this->field_config['rfid_fecha']['date_format']  = $_SESSION['scriptcase']['reg_conf']['date_format'] . ';' . $_SESSION['scriptcase']['reg_conf']['time_format'];
      $this->field_config['rfid_fecha']['date_sep']     = $_SESSION['scriptcase']['reg_conf']['date_sep'];
      $this->field_config['rfid_fecha']['time_sep']     = $_SESSION['scriptcase']['reg_conf']['time_sep'];
      $this->field_config['rfid_fecha']['date_display'] = "ddmmaaaa;hhiiss";
      $this->new_date_format('DH', 'rfid_fecha');
   }

   function controle()
   {
        global $nm_url_saida, $teste_validade, 
               $glo_senha_protect, $nm_apl_dependente, $nm_form_submit, $sc_check_excl, $nm_opc_form_php, $nm_call_php, $nm_opc_lookup;


      $this->ini_controle();
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['Gera_log_access'])
      {
          $this->NM_gera_log_insert("Scriptcase", "access");
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['Gera_log_access'] = false;
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

      if ($nm_form_submit == 1 && ($this->nmgp_opcao == 'inicio' || $this->nmgp_opcao == 'igual'))
      {
          $this->nm_tira_formatacao();
      }
      if (!$this->NM_ajax_flag || 'alterar' != $this->nmgp_opcao || 'submit_form' != $this->NM_ajax_opcao)
      {
      }
//
//-----> 
//
      if ($this->NM_ajax_flag && 'validate_' == substr($this->NM_ajax_opcao, 0, 9))
      {
          if ('validate_cod_device' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'cod_device');
          }
          if ('validate_dev_ip' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'dev_ip');
          }
          if ('validate_cod_grupo' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'cod_grupo');
          }
          if ('validate_url_atraccion' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'url_atraccion');
          }
          if ('validate_url_accion' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'url_accion');
          }
          if ('validate_device_name' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'device_name');
          }
          if ('validate_activa' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'activa');
          }
          if ('validate_acepta_tokens' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'acepta_tokens');
          }
          if ('validate_tokens' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'tokens');
          }
          if ('validate_pin_relay1' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'pin_relay1');
          }
          if ('validate_pin_relay2' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'pin_relay2');
          }
          if ('validate_cod_activo' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'cod_activo');
          }
          form_devices_mob_pack_ajax_response();
          exit;
      }
      if ($this->NM_ajax_flag && 'event_' == substr($this->NM_ajax_opcao, 0, 6))
      {
          $this->nm_tira_formatacao();
          if ('event_cod_grupo_onchange' == $this->NM_ajax_opcao)
          {
              $this->cod_grupo_onChange();
          }
          form_devices_mob_pack_ajax_response();
          exit;
      }
      if (isset($this->sc_inline_call) && 'Y' == $this->sc_inline_call)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['inline_form_seq'] = $this->sc_seq_row;
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
              form_devices_mob_pack_ajax_response();
              exit;
          }
          $this->nm_formatar_campos();
          $this->nmgp_opcao = $nm_sc_sv_opcao; 
          $this->nm_gera_html();
          $this->NM_close_db(); 
          $this->nmgp_opcao = ""; 
          exit; 
      }
      if ($this->nmgp_opcao == "incluir" || $this->nmgp_opcao == "alterar" || $this->nmgp_opcao == "excluir") 
      {
          $this->cod_activo = sc_strip_script($this->cod_activo, $_SESSION['scriptcase']['charset']);
          $this->cod_activo = sc_strip_tags($this->cod_activo, $_SESSION['scriptcase']['charset']);
          $this->device_name = sc_strip_script($this->device_name, $_SESSION['scriptcase']['charset']);
          $this->device_name = sc_strip_tags($this->device_name, $_SESSION['scriptcase']['charset']);
          $this->dev_ip = sc_strip_script($this->dev_ip, $_SESSION['scriptcase']['charset']);
          $this->dev_ip = sc_strip_tags($this->dev_ip, $_SESSION['scriptcase']['charset']);
          $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros) ; 
          $_SESSION['scriptcase']['form_devices_mob']['contr_erro'] = 'off';
          if ($Campos_Crit != "") 
          {
              $Campos_Crit = $this->Ini->Nm_lang['lang_errm_flds'] . ' ' . $Campos_Crit ; 
          }
          if ($Campos_Crit != "" || !empty($Campos_Falta) || $this->Campos_Mens_erro != "")
          {
              if ($this->NM_ajax_flag)
              {
                  form_devices_mob_pack_ajax_response();
                  exit;
              }
              $campos_erro = $this->Formata_Erros($Campos_Crit, $Campos_Falta, $Campos_Erros, 4);
              $this->Campos_Mens_erro = ""; 
              $this->Erro->mensagem(__FILE__, __LINE__, "critica", $campos_erro); 
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
      if ($this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form" && !$this->Apl_com_erro)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['recarga'] = $this->nmgp_opcao;
      }
      if ($this->NM_ajax_flag && 'navigate_form' == $this->NM_ajax_opcao)
      {
          $this->ajax_return_values();
          $this->ajax_add_parameters();
          form_devices_mob_pack_ajax_response();
          exit;
      }
      $this->nm_formatar_campos();
      if ($this->NM_ajax_flag)
      {
          $this->NM_ajax_info['result'] = 'OK';
          if ('alterar' == $this->NM_ajax_info['param']['nmgp_opcao'])
          {
              $this->NM_ajax_info['msgDisplay'] = NM_charset_to_utf8($this->Ini->Nm_lang['lang_othr_ajax_frmu']);
          }
          form_devices_mob_pack_ajax_response();
          exit;
      }
      $this->nm_gera_html();
      $this->NM_close_db(); 
      $this->nmgp_opcao = ""; 
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
  function html_export_print($nm_arquivo_html, $nmgp_password)
  {
      $Html_password = "";
          $Arq_base  = $this->Ini->root . $this->Ini->path_imag_temp . $nm_arquivo_html;
          $Parm_pass = ($Html_password != "") ? " -p" : "";
          $Zip_name = "sc_prt_" . date("YmdHis") . "_" . rand(0, 1000) . "form_devices_mob.zip";
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
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob'][$path_doc_md5][0] = $Arq_htm;
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob'][$path_doc_md5][1] = $Zip_name;
?>
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE><?php echo strip_tags("" . $this->Ini->Nm_lang['lang_othr_frmu_title'] . " devices") ?></TITLE>
 <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
<?php

if (isset($_SESSION['scriptcase']['device_mobile']) && $_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile'])
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
<form name="Fdown" method="get" action="form_devices_mob_download.php" target="_self" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo $this->form_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="form_devices_mob"> 
<input type="hidden" name="nm_name_doc" value="<?php echo $path_doc_md5 ?>"> 
</form>
<form name="F0" method=post action="form_devices_mob.php" target="_self" style="display: none"> 
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
       if ($this->SC_log_atv)
       {
           $this->NM_gera_log_output();
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
   function NM_gera_log_insert($orig="Scriptcase", $evento="", $texto="")
   {
       $delim  = "'";
       $delim1 = "'";
       if (in_array(strtolower($_SESSION['scriptcase']['glo_tpbanco']), $this->Ini->nm_bases_access))
       { 
           $delim  = "#";
           $delim1 = "#";
       } 
       if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['SC_sep_date']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['SC_sep_date']))
       {
           $delim  = $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['SC_sep_date'];
           $delim1 = $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['SC_sep_date1'];
       }
       $dt  = $delim . date('Y-m-d H:i:s') . $delim1;
       $usr = isset($_SESSION['usr_login']) ? $_SESSION['usr_login'] : "";
       if (strtolower($_SESSION['scriptcase']['glo_tpbanco']) == 'pdo_sqlsrv' || strtolower($_SESSION['scriptcase']['glo_tpbanco']) == 'pdo_dblib')
       { 
           $dt  = $delim . date('Ymd H:i:s') . $delim1;
       } 
       if (in_array(strtolower($_SESSION['scriptcase']['glo_tpbanco']), $this->Ini->nm_bases_access))
       { 
           $dt  = $delim . date('Y-m-d H:i:s') . $delim1;
       } 
       if (in_array(strtolower($_SESSION['scriptcase']['glo_tpbanco']), $this->Ini->nm_bases_informix))
       { 
           $dt  = "EXTEND(" . $dt . ", YEAR TO FRACTION)";
       } 
       if (in_array(strtolower($_SESSION['scriptcase']['glo_tpbanco']), $this->Ini->nm_bases_access))
       { 
           $comando = "INSERT INTO sc_log (inserted_date, username, application, creator, ip_user, `action`, description) VALUES ($dt, " . $this->Db->qstr($usr) . ", 'form_devices_mob', '$orig', '" . $_SERVER['REMOTE_ADDR'] . "', '$evento', " . $this->Db->qstr($texto) . ")"; 
       } 
       elseif (in_array(strtolower($_SESSION['scriptcase']['glo_tpbanco']), $this->Ini->nm_bases_sqlite))
       { 
           $comando = "INSERT INTO sc_log (id, inserted_date, username, application, creator, ip_user, action, description) VALUES (NULL, $dt, " . $this->Db->qstr($usr) . ", 'form_devices_mob', '$orig', '" . $_SERVER['REMOTE_ADDR'] . "', '$evento', " . $this->Db->qstr($texto) . ")"; 
       } 
       else
       { 
           $comando = "INSERT INTO sc_log (inserted_date, username, application, creator, ip_user, action, description) VALUES ($dt, " . $this->Db->qstr($usr) . ", 'form_devices_mob', '$orig', '" . $_SERVER['REMOTE_ADDR'] . "', '$evento', " . $this->Db->qstr($texto) . ")"; 
       } 
       $_SESSION['scriptcase']['sc_sql_ult_comando'] = $comando; 
       $rlog = $this->Db->Execute($comando); 
       if ($rlog === false)  
       { 
           $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_inst'], $this->Db->ErrorMsg()); 
           if ($this->NM_ajax_flag)
           {
               form_devices_mob_pack_ajax_response();
               exit; 
           }
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
           case 'cod_device':
               return "Cod Device";
               break;
           case 'dev_ip':
               return "Dev Ip";
               break;
           case 'cod_grupo':
               return "Tipo/Grupo";
               break;
           case 'url_atraccion':
               return "Url Atraccion";
               break;
           case 'url_accion':
               return "Url Accion";
               break;
           case 'device_name':
               return "Device Name";
               break;
           case 'activa':
               return "Activa";
               break;
           case 'acepta_tokens':
               return "Acepta Tokens";
               break;
           case 'tokens':
               return "Tokens";
               break;
           case 'pin_relay1':
               return "Pin Relay 1";
               break;
           case 'pin_relay2':
               return "Pin Relay 2";
               break;
           case 'cod_activo':
               return "Cod Activo";
               break;
           case 'estado':
               return "Estado";
               break;
           case 'ult_rfid':
               return "Ult Rfid";
               break;
           case 'ult_fecha':
               return "Ult Fecha";
               break;
           case 'valor_default':
               return "Valor Default";
               break;
           case 'acepta_tiempo':
               return "Acepta Tiempo";
               break;
           case 'tipo_dev':
               return "Tipo Dev";
               break;
           case 'direccion_torno':
               return "Direccion Torno";
               break;
           case 'timeout_rfid':
               return "Timeout Rfid";
               break;
           case 'discapacitado':
               return "Discapacitado";
               break;
           case 'numcaja':
               return "Numcaja";
               break;
           case 'empleado':
               return "Empleado";
               break;
           case 'serialrfid':
               return "Serialrfid";
               break;
           case 'bidireccion':
               return "Bidireccion";
               break;
           case 'cod_devicee':
               return "Cod Device E";
               break;
           case 'url_1':
               return "Url 1";
               break;
           case 'url_2':
               return "Url 2";
               break;
           case 'url_3':
               return "Url 3";
               break;
           case 'foto1':
               return "Foto 1";
               break;
           case 'foto2':
               return "Foto 2";
               break;
           case 'foto3':
               return "Foto 3";
               break;
           case 'rfid_read':
               return "Rfid Read";
               break;
           case 'rfid_estado':
               return "Rfid Estado";
               break;
           case 'rfid_fecha':
               return "Rfid Fecha";
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
     global $nm_browser, $teste_validade;
     if (is_array($filtro) && empty($filtro)) {
         $filtro = '';
     }
//---------------------------------------------------------
     $this->sc_force_zero = array();
      if ((!is_array($filtro) && ('' == $filtro || 'cod_device' == $filtro)) || (is_array($filtro) && in_array('cod_device', $filtro)))
        $this->ValidateField_cod_device($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'dev_ip' == $filtro)) || (is_array($filtro) && in_array('dev_ip', $filtro)))
        $this->ValidateField_dev_ip($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'cod_grupo' == $filtro)) || (is_array($filtro) && in_array('cod_grupo', $filtro)))
        $this->ValidateField_cod_grupo($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'url_atraccion' == $filtro)) || (is_array($filtro) && in_array('url_atraccion', $filtro)))
        $this->ValidateField_url_atraccion($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'url_accion' == $filtro)) || (is_array($filtro) && in_array('url_accion', $filtro)))
        $this->ValidateField_url_accion($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'device_name' == $filtro)) || (is_array($filtro) && in_array('device_name', $filtro)))
        $this->ValidateField_device_name($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'activa' == $filtro)) || (is_array($filtro) && in_array('activa', $filtro)))
        $this->ValidateField_activa($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'acepta_tokens' == $filtro)) || (is_array($filtro) && in_array('acepta_tokens', $filtro)))
        $this->ValidateField_acepta_tokens($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'tokens' == $filtro)) || (is_array($filtro) && in_array('tokens', $filtro)))
        $this->ValidateField_tokens($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'pin_relay1' == $filtro)) || (is_array($filtro) && in_array('pin_relay1', $filtro)))
        $this->ValidateField_pin_relay1($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'pin_relay2' == $filtro)) || (is_array($filtro) && in_array('pin_relay2', $filtro)))
        $this->ValidateField_pin_relay2($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'cod_activo' == $filtro)) || (is_array($filtro) && in_array('cod_activo', $filtro)))
        $this->ValidateField_cod_activo($Campos_Crit, $Campos_Falta, $Campos_Erros);
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

    function ValidateField_cod_device(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->cod_device === "" || is_null($this->cod_device))  
      { 
          $this->cod_device = 0;
      } 
      nm_limpa_numero($this->cod_device, $this->field_config['cod_device']['symbol_grp']) ; 
      if ($this->nmgp_opcao == "incluir")
      { 
          if ($this->cod_device != '')  
          { 
              $iTestSize = 11;
              if (strlen($this->cod_device) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Cod Device: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['cod_device']))
                  {
                      $Campos_Erros['cod_device'] = array();
                  }
                  $Campos_Erros['cod_device'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['cod_device']) || !is_array($this->NM_ajax_info['errList']['cod_device']))
                  {
                      $this->NM_ajax_info['errList']['cod_device'] = array();
                  }
                  $this->NM_ajax_info['errList']['cod_device'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->cod_device, 11, 0, 0, 0, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Cod Device; " ; 
                  if (!isset($Campos_Erros['cod_device']))
                  {
                      $Campos_Erros['cod_device'] = array();
                  }
                  $Campos_Erros['cod_device'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['cod_device']) || !is_array($this->NM_ajax_info['errList']['cod_device']))
                  {
                      $this->NM_ajax_info['errList']['cod_device'] = array();
                  }
                  $this->NM_ajax_info['errList']['cod_device'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'cod_device';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_cod_device

    function ValidateField_dev_ip(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->dev_ip) > 120) 
          { 
              $hasError = true;
              $Campos_Crit .= "Dev Ip " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 120 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['dev_ip']))
              {
                  $Campos_Erros['dev_ip'] = array();
              }
              $Campos_Erros['dev_ip'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 120 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['dev_ip']) || !is_array($this->NM_ajax_info['errList']['dev_ip']))
              {
                  $this->NM_ajax_info['errList']['dev_ip'] = array();
              }
              $this->NM_ajax_info['errList']['dev_ip'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 120 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'dev_ip';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_dev_ip

    function ValidateField_cod_grupo(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->cod_grupo == "" && $this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['php_cmp_required']['cod_grupo']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['php_cmp_required']['cod_grupo'] == "on"))
      {
          $hasError = true;
          $Campos_Falta[] = "Tipo/Grupo" ; 
          if (!isset($Campos_Erros['cod_grupo']))
          {
              $Campos_Erros['cod_grupo'] = array();
          }
          $Campos_Erros['cod_grupo'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          if (!isset($this->NM_ajax_info['errList']['cod_grupo']) || !is_array($this->NM_ajax_info['errList']['cod_grupo']))
          {
              $this->NM_ajax_info['errList']['cod_grupo'] = array();
          }
          $this->NM_ajax_info['errList']['cod_grupo'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
      }
          if (!empty($this->cod_grupo) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['Lookup_cod_grupo']) && !in_array($this->cod_grupo, $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['Lookup_cod_grupo']))
          {
              $hasError = true;
              $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
              if (!isset($Campos_Erros['cod_grupo']))
              {
                  $Campos_Erros['cod_grupo'] = array();
              }
              $Campos_Erros['cod_grupo'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
              if (!isset($this->NM_ajax_info['errList']['cod_grupo']) || !is_array($this->NM_ajax_info['errList']['cod_grupo']))
              {
                  $this->NM_ajax_info['errList']['cod_grupo'] = array();
              }
              $this->NM_ajax_info['errList']['cod_grupo'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
          }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'cod_grupo';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_cod_grupo

    function ValidateField_url_atraccion(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (trim($this->url_atraccion) != "")  
          { 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'url_atraccion';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_url_atraccion

    function ValidateField_url_accion(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (trim($this->url_accion) != "")  
          { 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'url_accion';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_url_accion

    function ValidateField_device_name(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->device_name) > 150) 
          { 
              $hasError = true;
              $Campos_Crit .= "Device Name " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 150 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['device_name']))
              {
                  $Campos_Erros['device_name'] = array();
              }
              $Campos_Erros['device_name'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 150 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['device_name']) || !is_array($this->NM_ajax_info['errList']['device_name']))
              {
                  $this->NM_ajax_info['errList']['device_name'] = array();
              }
              $this->NM_ajax_info['errList']['device_name'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 150 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'device_name';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_device_name

    function ValidateField_activa(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->activa == "" && $this->nmgp_opcao != "excluir")
      { 
      } 
      if ($this->activa === "" || is_null($this->activa))  
      { 
          $this->activa = 0;
          $this->sc_force_zero[] = 'activa';
      } 
      if ($this->activa != "")
      { 
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['Lookup_activa']) && !in_array($this->activa, $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['Lookup_activa']))
          {
              $hasError = true;
              $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
              if (!isset($Campos_Erros['activa']))
              {
                  $Campos_Erros['activa'] = array();
              }
              $Campos_Erros['activa'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
              if (!isset($this->NM_ajax_info['errList']['activa']) || !is_array($this->NM_ajax_info['errList']['activa']))
              {
                  $this->NM_ajax_info['errList']['activa'] = array();
              }
              $this->NM_ajax_info['errList']['activa'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
          }
      }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'activa';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_activa

    function ValidateField_acepta_tokens(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->acepta_tokens == "" && $this->nmgp_opcao != "excluir")
      { 
      } 
      if ($this->acepta_tokens === "" || is_null($this->acepta_tokens))  
      { 
          $this->acepta_tokens = 0;
          $this->sc_force_zero[] = 'acepta_tokens';
      } 
      if ($this->acepta_tokens != "")
      { 
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['Lookup_acepta_tokens']) && !in_array($this->acepta_tokens, $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['Lookup_acepta_tokens']))
          {
              $hasError = true;
              $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
              if (!isset($Campos_Erros['acepta_tokens']))
              {
                  $Campos_Erros['acepta_tokens'] = array();
              }
              $Campos_Erros['acepta_tokens'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
              if (!isset($this->NM_ajax_info['errList']['acepta_tokens']) || !is_array($this->NM_ajax_info['errList']['acepta_tokens']))
              {
                  $this->NM_ajax_info['errList']['acepta_tokens'] = array();
              }
              $this->NM_ajax_info['errList']['acepta_tokens'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
          }
      }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'acepta_tokens';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_acepta_tokens

    function ValidateField_tokens(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao == "alterar")
      {
      if ($this->tokens === "" || is_null($this->tokens))  
      { 
          $this->tokens = 0;
          $this->sc_force_zero[] = 'tokens';
      } 
      }
      nm_limpa_numero($this->tokens, $this->field_config['tokens']['symbol_grp']) ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->tokens != '')  
          { 
              $iTestSize = 19;
              if (strlen($this->tokens) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Tokens: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['tokens']))
                  {
                      $Campos_Erros['tokens'] = array();
                  }
                  $Campos_Erros['tokens'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['tokens']) || !is_array($this->NM_ajax_info['errList']['tokens']))
                  {
                      $this->NM_ajax_info['errList']['tokens'] = array();
                  }
                  $this->NM_ajax_info['errList']['tokens'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->tokens, 19, 0, -0, 1.0E+19, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Tokens; " ; 
                  if (!isset($Campos_Erros['tokens']))
                  {
                      $Campos_Erros['tokens'] = array();
                  }
                  $Campos_Erros['tokens'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['tokens']) || !is_array($this->NM_ajax_info['errList']['tokens']))
                  {
                      $this->NM_ajax_info['errList']['tokens'] = array();
                  }
                  $this->NM_ajax_info['errList']['tokens'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'tokens';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_tokens

    function ValidateField_pin_relay1(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->pin_relay1 === "" || is_null($this->pin_relay1))  
      { 
          $this->pin_relay1 = 0;
          $this->sc_force_zero[] = 'pin_relay1';
      } 
      nm_limpa_numero($this->pin_relay1, $this->field_config['pin_relay1']['symbol_grp']) ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->pin_relay1 != '')  
          { 
              $iTestSize = 11;
              if (strlen($this->pin_relay1) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Pin Relay 1: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['pin_relay1']))
                  {
                      $Campos_Erros['pin_relay1'] = array();
                  }
                  $Campos_Erros['pin_relay1'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['pin_relay1']) || !is_array($this->NM_ajax_info['errList']['pin_relay1']))
                  {
                      $this->NM_ajax_info['errList']['pin_relay1'] = array();
                  }
                  $this->NM_ajax_info['errList']['pin_relay1'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->pin_relay1, 11, 0, -0, 99999999999, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Pin Relay 1; " ; 
                  if (!isset($Campos_Erros['pin_relay1']))
                  {
                      $Campos_Erros['pin_relay1'] = array();
                  }
                  $Campos_Erros['pin_relay1'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['pin_relay1']) || !is_array($this->NM_ajax_info['errList']['pin_relay1']))
                  {
                      $this->NM_ajax_info['errList']['pin_relay1'] = array();
                  }
                  $this->NM_ajax_info['errList']['pin_relay1'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'pin_relay1';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_pin_relay1

    function ValidateField_pin_relay2(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->pin_relay2 === "" || is_null($this->pin_relay2))  
      { 
          $this->pin_relay2 = 0;
          $this->sc_force_zero[] = 'pin_relay2';
      } 
      nm_limpa_numero($this->pin_relay2, $this->field_config['pin_relay2']['symbol_grp']) ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->pin_relay2 != '')  
          { 
              $iTestSize = 11;
              if (strlen($this->pin_relay2) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Pin Relay 2: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['pin_relay2']))
                  {
                      $Campos_Erros['pin_relay2'] = array();
                  }
                  $Campos_Erros['pin_relay2'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['pin_relay2']) || !is_array($this->NM_ajax_info['errList']['pin_relay2']))
                  {
                      $this->NM_ajax_info['errList']['pin_relay2'] = array();
                  }
                  $this->NM_ajax_info['errList']['pin_relay2'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->pin_relay2, 11, 0, -0, 99999999999, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Pin Relay 2; " ; 
                  if (!isset($Campos_Erros['pin_relay2']))
                  {
                      $Campos_Erros['pin_relay2'] = array();
                  }
                  $Campos_Erros['pin_relay2'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['pin_relay2']) || !is_array($this->NM_ajax_info['errList']['pin_relay2']))
                  {
                      $this->NM_ajax_info['errList']['pin_relay2'] = array();
                  }
                  $this->NM_ajax_info['errList']['pin_relay2'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'pin_relay2';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_pin_relay2

    function ValidateField_cod_activo(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->cod_activo) > 45) 
          { 
              $hasError = true;
              $Campos_Crit .= "Cod Activo " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 45 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['cod_activo']))
              {
                  $Campos_Erros['cod_activo'] = array();
              }
              $Campos_Erros['cod_activo'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 45 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['cod_activo']) || !is_array($this->NM_ajax_info['errList']['cod_activo']))
              {
                  $this->NM_ajax_info['errList']['cod_activo'] = array();
              }
              $this->NM_ajax_info['errList']['cod_activo'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 45 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'cod_activo';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_cod_activo

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
    $this->nmgp_dados_form['cod_device'] = $this->cod_device;
    $this->nmgp_dados_form['dev_ip'] = $this->dev_ip;
    $this->nmgp_dados_form['cod_grupo'] = $this->cod_grupo;
    $this->nmgp_dados_form['url_atraccion'] = $this->url_atraccion;
    $this->nmgp_dados_form['url_accion'] = $this->url_accion;
    $this->nmgp_dados_form['device_name'] = $this->device_name;
    $this->nmgp_dados_form['activa'] = $this->activa;
    $this->nmgp_dados_form['acepta_tokens'] = $this->acepta_tokens;
    $this->nmgp_dados_form['tokens'] = $this->tokens;
    $this->nmgp_dados_form['pin_relay1'] = $this->pin_relay1;
    $this->nmgp_dados_form['pin_relay2'] = $this->pin_relay2;
    $this->nmgp_dados_form['cod_activo'] = $this->cod_activo;
    $this->nmgp_dados_form['estado'] = $this->estado;
    $this->nmgp_dados_form['ult_rfid'] = $this->ult_rfid;
    $this->nmgp_dados_form['ult_fecha'] = $this->ult_fecha;
    $this->nmgp_dados_form['valor_default'] = $this->valor_default;
    $this->nmgp_dados_form['acepta_tiempo'] = $this->acepta_tiempo;
    $this->nmgp_dados_form['tipo_dev'] = $this->tipo_dev;
    $this->nmgp_dados_form['direccion_torno'] = $this->direccion_torno;
    $this->nmgp_dados_form['timeout_rfid'] = $this->timeout_rfid;
    $this->nmgp_dados_form['discapacitado'] = $this->discapacitado;
    $this->nmgp_dados_form['numcaja'] = $this->numcaja;
    $this->nmgp_dados_form['empleado'] = $this->empleado;
    $this->nmgp_dados_form['serialrfid'] = $this->serialrfid;
    $this->nmgp_dados_form['bidireccion'] = $this->bidireccion;
    $this->nmgp_dados_form['cod_devicee'] = $this->cod_devicee;
    $this->nmgp_dados_form['url_1'] = $this->url_1;
    $this->nmgp_dados_form['url_2'] = $this->url_2;
    $this->nmgp_dados_form['url_3'] = $this->url_3;
    if (empty($this->foto1))
    {
        $this->foto1 = $this->nmgp_dados_form['foto1'];
    }
    $this->nmgp_dados_form['foto1'] = $this->foto1;
    $this->nmgp_dados_form['foto1_limpa'] = $this->foto1_limpa;
    if (empty($this->foto2))
    {
        $this->foto2 = $this->nmgp_dados_form['foto2'];
    }
    $this->nmgp_dados_form['foto2'] = $this->foto2;
    $this->nmgp_dados_form['foto2_limpa'] = $this->foto2_limpa;
    if (empty($this->foto3))
    {
        $this->foto3 = $this->nmgp_dados_form['foto3'];
    }
    $this->nmgp_dados_form['foto3'] = $this->foto3;
    $this->nmgp_dados_form['foto3_limpa'] = $this->foto3_limpa;
    $this->nmgp_dados_form['rfid_read'] = $this->rfid_read;
    $this->nmgp_dados_form['rfid_estado'] = $this->rfid_estado;
    $this->nmgp_dados_form['rfid_fecha'] = $this->rfid_fecha;
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['dados_form'] = $this->nmgp_dados_form;
   }
   function nm_tira_formatacao()
   {
      global $nm_form_submit;
         $this->Before_unformat = array();
         $this->formatado = false;
      $this->Before_unformat['cod_device'] = $this->cod_device;
      nm_limpa_numero($this->cod_device, $this->field_config['cod_device']['symbol_grp']) ; 
      $this->Before_unformat['tokens'] = $this->tokens;
      nm_limpa_numero($this->tokens, $this->field_config['tokens']['symbol_grp']) ; 
      $this->Before_unformat['pin_relay1'] = $this->pin_relay1;
      nm_limpa_numero($this->pin_relay1, $this->field_config['pin_relay1']['symbol_grp']) ; 
      $this->Before_unformat['pin_relay2'] = $this->pin_relay2;
      nm_limpa_numero($this->pin_relay2, $this->field_config['pin_relay2']['symbol_grp']) ; 
      $this->Before_unformat['estado'] = $this->estado;
      nm_limpa_numero($this->estado, $this->field_config['estado']['symbol_grp']) ; 
      $this->Before_unformat['ult_fecha'] = $this->ult_fecha;
      $this->Before_unformat['ult_fecha_hora'] = $this->ult_fecha_hora;
      nm_limpa_data($this->ult_fecha, $this->field_config['ult_fecha']['date_sep']) ; 
      nm_limpa_hora($this->ult_fecha_hora, $this->field_config['ult_fecha']['time_sep']) ; 
      $this->Before_unformat['valor_default'] = $this->valor_default;
      if (!empty($this->field_config['valor_default']['symbol_dec']))
      {
         $this->sc_remove_currency($this->valor_default, $this->field_config['valor_default']['symbol_dec'], $this->field_config['valor_default']['symbol_grp'], $this->field_config['valor_default']['symbol_mon']);
         nm_limpa_valor($this->valor_default, $this->field_config['valor_default']['symbol_dec'], $this->field_config['valor_default']['symbol_grp']);
      }
      $this->Before_unformat['acepta_tiempo'] = $this->acepta_tiempo;
      nm_limpa_numero($this->acepta_tiempo, $this->field_config['acepta_tiempo']['symbol_grp']) ; 
      $this->Before_unformat['tipo_dev'] = $this->tipo_dev;
      nm_limpa_numero($this->tipo_dev, $this->field_config['tipo_dev']['symbol_grp']) ; 
      $this->Before_unformat['direccion_torno'] = $this->direccion_torno;
      nm_limpa_numero($this->direccion_torno, $this->field_config['direccion_torno']['symbol_grp']) ; 
      $this->Before_unformat['timeout_rfid'] = $this->timeout_rfid;
      nm_limpa_numero($this->timeout_rfid, $this->field_config['timeout_rfid']['symbol_grp']) ; 
      $this->Before_unformat['discapacitado'] = $this->discapacitado;
      nm_limpa_numero($this->discapacitado, $this->field_config['discapacitado']['symbol_grp']) ; 
      $this->Before_unformat['numcaja'] = $this->numcaja;
      nm_limpa_numero($this->numcaja, $this->field_config['numcaja']['symbol_grp']) ; 
      $this->Before_unformat['empleado'] = $this->empleado;
      nm_limpa_numero($this->empleado, $this->field_config['empleado']['symbol_grp']) ; 
      $this->Before_unformat['bidireccion'] = $this->bidireccion;
      nm_limpa_numero($this->bidireccion, $this->field_config['bidireccion']['symbol_grp']) ; 
      $this->Before_unformat['cod_devicee'] = $this->cod_devicee;
      nm_limpa_numero($this->cod_devicee, $this->field_config['cod_devicee']['symbol_grp']) ; 
      $this->Before_unformat['rfid_estado'] = $this->rfid_estado;
      nm_limpa_numero($this->rfid_estado, $this->field_config['rfid_estado']['symbol_grp']) ; 
      $this->Before_unformat['rfid_fecha'] = $this->rfid_fecha;
      $this->Before_unformat['rfid_fecha_hora'] = $this->rfid_fecha_hora;
      nm_limpa_data($this->rfid_fecha, $this->field_config['rfid_fecha']['date_sep']) ; 
      nm_limpa_hora($this->rfid_fecha_hora, $this->field_config['rfid_fecha']['time_sep']) ; 
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
      if ($Nome_Campo == "cod_device")
      {
          nm_limpa_numero($this->cod_device, $this->field_config['cod_device']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "tokens")
      {
          nm_limpa_numero($this->tokens, $this->field_config['tokens']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "pin_relay1")
      {
          nm_limpa_numero($this->pin_relay1, $this->field_config['pin_relay1']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "pin_relay2")
      {
          nm_limpa_numero($this->pin_relay2, $this->field_config['pin_relay2']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "estado")
      {
          nm_limpa_numero($this->estado, $this->field_config['estado']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "valor_default")
      {
          if (!empty($this->field_config['valor_default']['symbol_dec']))
          {
             $this->sc_remove_currency($this->valor_default, $this->field_config['valor_default']['symbol_dec'], $this->field_config['valor_default']['symbol_grp'], $this->field_config['valor_default']['symbol_mon']);
             nm_limpa_valor($this->valor_default, $this->field_config['valor_default']['symbol_dec'], $this->field_config['valor_default']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "acepta_tiempo")
      {
          nm_limpa_numero($this->acepta_tiempo, $this->field_config['acepta_tiempo']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "tipo_dev")
      {
          nm_limpa_numero($this->tipo_dev, $this->field_config['tipo_dev']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "direccion_torno")
      {
          nm_limpa_numero($this->direccion_torno, $this->field_config['direccion_torno']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "timeout_rfid")
      {
          nm_limpa_numero($this->timeout_rfid, $this->field_config['timeout_rfid']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "discapacitado")
      {
          nm_limpa_numero($this->discapacitado, $this->field_config['discapacitado']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "numcaja")
      {
          nm_limpa_numero($this->numcaja, $this->field_config['numcaja']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "empleado")
      {
          nm_limpa_numero($this->empleado, $this->field_config['empleado']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "bidireccion")
      {
          nm_limpa_numero($this->bidireccion, $this->field_config['bidireccion']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "cod_devicee")
      {
          nm_limpa_numero($this->cod_devicee, $this->field_config['cod_devicee']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "rfid_estado")
      {
          nm_limpa_numero($this->rfid_estado, $this->field_config['rfid_estado']['symbol_grp']) ; 
      }
   }
   function nm_formatar_campos($format_fields = array())
   {
      global $nm_form_submit;
     if (isset($this->formatado) && $this->formatado)
     {
         return;
     }
     $this->formatado = true;
      if ('' !== $this->cod_device || (!empty($format_fields) && isset($format_fields['cod_device'])))
      {
          nmgp_Form_Num_Val($this->cod_device, $this->field_config['cod_device']['symbol_grp'], $this->field_config['cod_device']['symbol_dec'], "0", "S", $this->field_config['cod_device']['format_neg'], "", "", "-", $this->field_config['cod_device']['symbol_fmt']) ; 
      }
      if ('' !== $this->tokens || (!empty($format_fields) && isset($format_fields['tokens'])))
      {
          nmgp_Form_Num_Val($this->tokens, $this->field_config['tokens']['symbol_grp'], $this->field_config['tokens']['symbol_dec'], "0", "S", $this->field_config['tokens']['format_neg'], "", "", "-", $this->field_config['tokens']['symbol_fmt']) ; 
      }
      if ('' !== $this->pin_relay1 || (!empty($format_fields) && isset($format_fields['pin_relay1'])))
      {
          nmgp_Form_Num_Val($this->pin_relay1, $this->field_config['pin_relay1']['symbol_grp'], $this->field_config['pin_relay1']['symbol_dec'], "0", "S", $this->field_config['pin_relay1']['format_neg'], "", "", "-", $this->field_config['pin_relay1']['symbol_fmt']) ; 
      }
      if ('' !== $this->pin_relay2 || (!empty($format_fields) && isset($format_fields['pin_relay2'])))
      {
          nmgp_Form_Num_Val($this->pin_relay2, $this->field_config['pin_relay2']['symbol_grp'], $this->field_config['pin_relay2']['symbol_dec'], "0", "S", $this->field_config['pin_relay2']['format_neg'], "", "", "-", $this->field_config['pin_relay2']['symbol_fmt']) ; 
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
          $this->ajax_return_values_cod_device();
          $this->ajax_return_values_dev_ip();
          $this->ajax_return_values_cod_grupo();
          $this->ajax_return_values_url_atraccion();
          $this->ajax_return_values_url_accion();
          $this->ajax_return_values_device_name();
          $this->ajax_return_values_activa();
          $this->ajax_return_values_acepta_tokens();
          $this->ajax_return_values_tokens();
          $this->ajax_return_values_pin_relay1();
          $this->ajax_return_values_pin_relay2();
          $this->ajax_return_values_cod_activo();
          if ('navigate_form' == $this->NM_ajax_opcao)
          {
              $this->NM_ajax_info['clearUpload']      = 'S';
              $this->NM_ajax_info['navStatus']['ret'] = $this->Nav_permite_ret ? 'S' : 'N';
              $this->NM_ajax_info['navStatus']['ava'] = $this->Nav_permite_ava ? 'S' : 'N';
              $this->NM_ajax_info['fldList']['cod_device']['keyVal'] = form_devices_mob_pack_protect_string($this->nmgp_dados_form['cod_device']);
          }
   } // ajax_return_values

          //----- cod_device
   function ajax_return_values_cod_device($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("cod_device", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->cod_device);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['cod_device'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($sTmpValue),
               'labList' => array($this->form_format_readonly("cod_device", $this->form_encode_input($sTmpValue))),
              );
          }
   }

          //----- dev_ip
   function ajax_return_values_dev_ip($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("dev_ip", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->dev_ip);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['dev_ip'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- cod_grupo
   function ajax_return_values_cod_grupo($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("cod_grupo", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->cod_grupo);
              $aLookup = array();
              $this->_tmp_lookup_cod_grupo = $this->cod_grupo;

 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['Lookup_cod_grupo']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['Lookup_cod_grupo'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['Lookup_cod_grupo']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['Lookup_cod_grupo'] = array(); 
}
$aLookup[] = array(form_devices_mob_pack_protect_string('') => str_replace('<', '&lt;',form_devices_mob_pack_protect_string(' ')));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['Lookup_cod_grupo'][] = '';
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_cod_device = $this->cod_device;
   $old_value_tokens = $this->tokens;
   $old_value_pin_relay1 = $this->pin_relay1;
   $old_value_pin_relay2 = $this->pin_relay2;
   $this->nm_tira_formatacao();


   $unformatted_value_cod_device = $this->cod_device;
   $unformatted_value_tokens = $this->tokens;
   $unformatted_value_pin_relay1 = $this->pin_relay1;
   $unformatted_value_pin_relay2 = $this->pin_relay2;

   $nm_comando = "SELECT codgrupo, descrip  FROM grupos  ORDER BY codgrupo";

   $this->cod_device = $old_value_cod_device;
   $this->tokens = $old_value_tokens;
   $this->pin_relay1 = $old_value_pin_relay1;
   $this->pin_relay2 = $old_value_pin_relay2;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $aLookup[] = array(form_devices_mob_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', form_devices_mob_pack_protect_string(NM_charset_to_utf8($rs->fields[0] . " - " . $rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[0] . " - " . $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['Lookup_cod_grupo'][] = $rs->fields[0];
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
          $sSelComp = "name=\"cod_grupo\"";
          if (isset($this->NM_ajax_info['select_html']['cod_grupo']) && !empty($this->NM_ajax_info['select_html']['cod_grupo']))
          {
              $sSelComp = str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['cod_grupo']);
          }
          $sLookup = '';
          if (empty($aLookup))
          {
              $aLookup[] = array('' => '');
          }
          foreach ($aLookup as $aOption)
          {
              foreach ($aOption as $sValue => $sLabel)
              {

                  if ($this->cod_grupo == $sValue)
                  {
                      $this->_tmp_lookup_cod_grupo = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['cod_grupo'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
               'optList' => $aLookup,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['cod_grupo']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['cod_grupo']['valList'][$i] = form_devices_mob_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['cod_grupo']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['cod_grupo']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['cod_grupo']['labList'] = $aLabel;
          }
   }

          //----- url_atraccion
   function ajax_return_values_url_atraccion($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("url_atraccion", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->url_atraccion);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['url_atraccion'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- url_accion
   function ajax_return_values_url_accion($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("url_accion", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->url_accion);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['url_accion'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- device_name
   function ajax_return_values_device_name($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("device_name", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->device_name);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['device_name'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- activa
   function ajax_return_values_activa($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("activa", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->activa);
              $aLookup = array();
              $this->_tmp_lookup_activa = $this->activa;

$aLookup[] = array(form_devices_mob_pack_protect_string('1') => str_replace('<', '&lt;',form_devices_mob_pack_protect_string("SI")));
$aLookup[] = array(form_devices_mob_pack_protect_string('0') => str_replace('<', '&lt;',form_devices_mob_pack_protect_string("NO")));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['Lookup_activa'][] = '1';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['Lookup_activa'][] = '0';
          $aLookupOrig = $aLookup;
          $sOptComp = "";
          if (isset($this->NM_ajax_info['select_html']['activa']) && !empty($this->NM_ajax_info['select_html']['activa']))
          {
              $sOptComp = str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['activa']);
          }
          $this->NM_ajax_info['fldList']['activa'] = array(
                       'row'    => '',
               'type'    => 'radio',
               'switch'  => false,
               'valList' => array($sTmpValue),
               'colNum'  => 1,
               'optComp'  => $sOptComp,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['activa']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['activa']['valList'][$i] = form_devices_mob_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['activa']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['activa']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['activa']['labList'] = $aLabel;
          }
   }

          //----- acepta_tokens
   function ajax_return_values_acepta_tokens($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("acepta_tokens", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->acepta_tokens);
              $aLookup = array();
              $this->_tmp_lookup_acepta_tokens = $this->acepta_tokens;

$aLookup[] = array(form_devices_mob_pack_protect_string('1') => str_replace('<', '&lt;',form_devices_mob_pack_protect_string("SI")));
$aLookup[] = array(form_devices_mob_pack_protect_string('0') => str_replace('<', '&lt;',form_devices_mob_pack_protect_string("NO")));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['Lookup_acepta_tokens'][] = '1';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['Lookup_acepta_tokens'][] = '0';
          $aLookupOrig = $aLookup;
          $sOptComp = "";
          if (isset($this->NM_ajax_info['select_html']['acepta_tokens']) && !empty($this->NM_ajax_info['select_html']['acepta_tokens']))
          {
              $sOptComp = str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['acepta_tokens']);
          }
          $this->NM_ajax_info['fldList']['acepta_tokens'] = array(
                       'row'    => '',
               'type'    => 'radio',
               'switch'  => false,
               'valList' => array($sTmpValue),
               'colNum'  => 1,
               'optComp'  => $sOptComp,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['acepta_tokens']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['acepta_tokens']['valList'][$i] = form_devices_mob_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['acepta_tokens']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['acepta_tokens']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['acepta_tokens']['labList'] = $aLabel;
          }
   }

          //----- tokens
   function ajax_return_values_tokens($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("tokens", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->tokens);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['tokens'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- pin_relay1
   function ajax_return_values_pin_relay1($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("pin_relay1", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->pin_relay1);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['pin_relay1'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- pin_relay2
   function ajax_return_values_pin_relay2($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("pin_relay2", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->pin_relay2);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['pin_relay2'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- cod_activo
   function ajax_return_values_cod_activo($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("cod_activo", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->cod_activo);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['cod_activo'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
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
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['upload_dir'][$fieldName]))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['upload_dir'][$fieldName] = array();
            $resDir = @opendir($uploadDir);
            if (!$resDir)
            {
                return $originalName;
            }
            while (false !== ($fileName = @readdir($resDir)))
            {
                if (@is_file($uploadDir . $fileName))
                {
                    $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['upload_dir'][$fieldName][] = $fileName;
                }
            }
            @closedir($resDir);
        }
        if (!in_array($originalName, $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['upload_dir'][$fieldName]))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['upload_dir'][$fieldName][] = $originalName;
            return $originalName;
        }
        else
        {
            $newName = $this->fetchFileNextName($originalName, $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['upload_dir'][$fieldName]);
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['upload_dir'][$fieldName][] = $newName;
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
      $this->valor_default = str_replace($sc_parm1, $sc_parm2, $this->valor_default); 
   } 
   function nm_poe_aspas_decimal() 
   { 
      $this->valor_default = "'" . $this->valor_default . "'";
   } 
   function nm_tira_aspas_decimal() 
   { 
      $this->valor_default = str_replace("'", "", $this->valor_default); 
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
      global  $nm_form_submit, $teste_validade, $sc_where;
 
      $NM_val_null = array();
      $NM_val_form = array();
      $this->sc_erro_insert = "";
      $this->sc_erro_update = "";
      $this->sc_erro_delete = "";
      $this->SC_log_atv = false;
      if ("alterar" == $this->nmgp_opcao || "excluir" == $this->nmgp_opcao)
      {
          $this->NM_gera_log_key($this->nmgp_opcao);
      }
      if ("alterar" == $this->nmgp_opcao || "excluir" == $this->nmgp_opcao)
      {
          $this->NM_gera_log_old();
      }
      if (!empty($this->sc_force_zero))
      {
          foreach ($this->sc_force_zero as $i_force_zero => $sc_force_zero_field)
          {
              eval('if ($this->' . $sc_force_zero_field . ' == 0) {$this->' . $sc_force_zero_field . ' = "";}');
          }
      }
      $this->sc_force_zero = array();
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
      $NM_val_form['cod_device'] = $this->cod_device;
      $NM_val_form['dev_ip'] = $this->dev_ip;
      $NM_val_form['cod_grupo'] = $this->cod_grupo;
      $NM_val_form['url_atraccion'] = $this->url_atraccion;
      $NM_val_form['url_accion'] = $this->url_accion;
      $NM_val_form['device_name'] = $this->device_name;
      $NM_val_form['activa'] = $this->activa;
      $NM_val_form['acepta_tokens'] = $this->acepta_tokens;
      $NM_val_form['tokens'] = $this->tokens;
      $NM_val_form['pin_relay1'] = $this->pin_relay1;
      $NM_val_form['pin_relay2'] = $this->pin_relay2;
      $NM_val_form['cod_activo'] = $this->cod_activo;
      $NM_val_form['estado'] = $this->estado;
      $NM_val_form['ult_rfid'] = $this->ult_rfid;
      $NM_val_form['ult_fecha'] = $this->ult_fecha;
      $NM_val_form['valor_default'] = $this->valor_default;
      $NM_val_form['acepta_tiempo'] = $this->acepta_tiempo;
      $NM_val_form['tipo_dev'] = $this->tipo_dev;
      $NM_val_form['direccion_torno'] = $this->direccion_torno;
      $NM_val_form['timeout_rfid'] = $this->timeout_rfid;
      $NM_val_form['discapacitado'] = $this->discapacitado;
      $NM_val_form['numcaja'] = $this->numcaja;
      $NM_val_form['empleado'] = $this->empleado;
      $NM_val_form['serialrfid'] = $this->serialrfid;
      $NM_val_form['bidireccion'] = $this->bidireccion;
      $NM_val_form['cod_devicee'] = $this->cod_devicee;
      $NM_val_form['url_1'] = $this->url_1;
      $NM_val_form['url_2'] = $this->url_2;
      $NM_val_form['url_3'] = $this->url_3;
      $NM_val_form['foto1'] = $this->foto1;
      $NM_val_form['foto2'] = $this->foto2;
      $NM_val_form['foto3'] = $this->foto3;
      $NM_val_form['rfid_read'] = $this->rfid_read;
      $NM_val_form['rfid_estado'] = $this->rfid_estado;
      $NM_val_form['rfid_fecha'] = $this->rfid_fecha;
      if ($this->cod_device === "" || is_null($this->cod_device))  
      { 
          $this->cod_device = 0;
      } 
      if ($this->nmgp_opcao == "alterar")
      {
      if ($this->activa === "" || is_null($this->activa))  
      { 
          $this->activa = 0;
          $this->sc_force_zero[] = 'activa';
      } 
      }
      if ($this->estado === "" || is_null($this->estado))  
      { 
          $this->estado = 0;
          $this->sc_force_zero[] = 'estado';
      } 
      if ($this->nmgp_opcao == "alterar")
      {
      if ($this->valor_default === "" || is_null($this->valor_default))  
      { 
          $this->valor_default = 0;
          $this->sc_force_zero[] = 'valor_default';
      } 
      }
      if ($this->acepta_tiempo === "" || is_null($this->acepta_tiempo))  
      { 
          $this->acepta_tiempo = 0;
          $this->sc_force_zero[] = 'acepta_tiempo';
      } 
      if ($this->acepta_tokens === "" || is_null($this->acepta_tokens))  
      { 
          $this->acepta_tokens = 0;
          $this->sc_force_zero[] = 'acepta_tokens';
      } 
      if ($this->nmgp_opcao == "alterar")
      {
      if ($this->tipo_dev === "" || is_null($this->tipo_dev))  
      { 
          $this->tipo_dev = 0;
          $this->sc_force_zero[] = 'tipo_dev';
      } 
      }
      if ($this->nmgp_opcao == "alterar")
      {
      if ($this->direccion_torno === "" || is_null($this->direccion_torno))  
      { 
          $this->direccion_torno = 0;
          $this->sc_force_zero[] = 'direccion_torno';
      } 
      }
      if ($this->timeout_rfid === "" || is_null($this->timeout_rfid))  
      { 
          $this->timeout_rfid = 0;
          $this->sc_force_zero[] = 'timeout_rfid';
      } 
      if ($this->discapacitado === "" || is_null($this->discapacitado))  
      { 
          $this->discapacitado = 0;
          $this->sc_force_zero[] = 'discapacitado';
      } 
      if ($this->numcaja === "" || is_null($this->numcaja))  
      { 
          $this->numcaja = 0;
          $this->sc_force_zero[] = 'numcaja';
      } 
      if ($this->empleado === "" || is_null($this->empleado))  
      { 
          $this->empleado = 0;
          $this->sc_force_zero[] = 'empleado';
      } 
      if ($this->nmgp_opcao == "alterar")
      {
      if ($this->tokens === "" || is_null($this->tokens))  
      { 
          $this->tokens = 0;
          $this->sc_force_zero[] = 'tokens';
      } 
      }
      if ($this->bidireccion === "" || is_null($this->bidireccion))  
      { 
          $this->bidireccion = 0;
          $this->sc_force_zero[] = 'bidireccion';
      } 
      if ($this->cod_devicee === "" || is_null($this->cod_devicee))  
      { 
          $this->cod_devicee = 0;
          $this->sc_force_zero[] = 'cod_devicee';
      } 
      if ($this->pin_relay1 === "" || is_null($this->pin_relay1))  
      { 
          $this->pin_relay1 = 0;
          $this->sc_force_zero[] = 'pin_relay1';
      } 
      if ($this->pin_relay2 === "" || is_null($this->pin_relay2))  
      { 
          $this->pin_relay2 = 0;
          $this->sc_force_zero[] = 'pin_relay2';
      } 
      if ($this->rfid_estado === "" || is_null($this->rfid_estado))  
      { 
          $this->rfid_estado = 0;
          $this->sc_force_zero[] = 'rfid_estado';
      } 
      $nm_bases_lob_geral = array_merge($this->Ini->nm_bases_oracle, $this->Ini->nm_bases_ibase, $this->Ini->nm_bases_informix, $this->Ini->nm_bases_mysql, $this->Ini->nm_bases_access, $this->Ini->nm_bases_sqlite, array('pdo_ibm'), array('pdo_sqlsrv'));
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['decimal_db'] == ",") 
      {
          $this->nm_troca_decimal(".", ",");
      }
      if ($this->nmgp_opcao == "alterar" || $this->nmgp_opcao == "incluir") 
      {
          $this->cod_activo_before_qstr = $this->cod_activo;
          $this->cod_activo = substr($this->Db->qstr($this->cod_activo), 1, -1); 
          if ($this->cod_activo == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->cod_activo = "null"; 
              $NM_val_null[] = "cod_activo";
          } 
          $this->cod_grupo_before_qstr = $this->cod_grupo;
          $this->cod_grupo = substr($this->Db->qstr($this->cod_grupo), 1, -1); 
          if ($this->cod_grupo == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->cod_grupo = "null"; 
              $NM_val_null[] = "cod_grupo";
          } 
          $this->device_name_before_qstr = $this->device_name;
          $this->device_name = substr($this->Db->qstr($this->device_name), 1, -1); 
          if ($this->device_name == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->device_name = "null"; 
              $NM_val_null[] = "device_name";
          } 
          if ($this->nmgp_opcao == "alterar") 
          {
          }
          $this->ult_rfid_before_qstr = $this->ult_rfid;
          $this->ult_rfid = substr($this->Db->qstr($this->ult_rfid), 1, -1); 
          if ($this->ult_rfid == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->ult_rfid = "null"; 
              $NM_val_null[] = "ult_rfid";
          } 
          if ($this->ult_fecha == "")  
          { 
              $this->ult_fecha = "null"; 
              $NM_val_null[] = "ult_fecha";
          } 
          if ($this->nmgp_opcao == "alterar") 
          {
          }
          $this->dev_ip_before_qstr = $this->dev_ip;
          $this->dev_ip = substr($this->Db->qstr($this->dev_ip), 1, -1); 
          if ($this->dev_ip == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->dev_ip = "null"; 
              $NM_val_null[] = "dev_ip";
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
          $this->serialrfid_before_qstr = $this->serialrfid;
          $this->serialrfid = substr($this->Db->qstr($this->serialrfid), 1, -1); 
          if ($this->serialrfid == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->serialrfid = "null"; 
              $NM_val_null[] = "serialrfid";
          } 
          $this->url_1_before_qstr = $this->url_1;
          $this->url_1 = substr($this->Db->qstr($this->url_1), 1, -1); 
          if ($this->url_1 == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->url_1 = "null"; 
              $NM_val_null[] = "url_1";
          } 
          $this->url_2_before_qstr = $this->url_2;
          $this->url_2 = substr($this->Db->qstr($this->url_2), 1, -1); 
          if ($this->url_2 == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->url_2 = "null"; 
              $NM_val_null[] = "url_2";
          } 
          $this->url_3_before_qstr = $this->url_3;
          $this->url_3 = substr($this->Db->qstr($this->url_3), 1, -1); 
          if ($this->url_3 == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->url_3 = "null"; 
              $NM_val_null[] = "url_3";
          } 
          if ($this->foto1 == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->foto1 = "null"; 
              $NM_val_null[] = "foto1";
          } 
          if ($this->foto2 == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->foto2 = "null"; 
              $NM_val_null[] = "foto2";
          } 
          if ($this->foto3 == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->foto3 = "null"; 
              $NM_val_null[] = "foto3";
          } 
          $this->rfid_read_before_qstr = $this->rfid_read;
          $this->rfid_read = substr($this->Db->qstr($this->rfid_read), 1, -1); 
          if ($this->rfid_read == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->rfid_read = "null"; 
              $NM_val_null[] = "rfid_read";
          } 
          if ($this->rfid_fecha == "")  
          { 
              $this->rfid_fecha = "null"; 
              $NM_val_null[] = "rfid_fecha";
          } 
          $this->url_accion_before_qstr = $this->url_accion;
          $this->url_accion = substr($this->Db->qstr($this->url_accion), 1, -1); 
          if ($this->url_accion == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->url_accion = "null"; 
              $NM_val_null[] = "url_accion";
          } 
          $this->url_atraccion_before_qstr = $this->url_atraccion;
          $this->url_atraccion = substr($this->Db->qstr($this->url_atraccion), 1, -1); 
          if ($this->url_atraccion == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->url_atraccion = "null"; 
              $NM_val_null[] = "url_atraccion";
          } 
      }
      if ($this->nmgp_opcao == "alterar") 
      {
          $SC_fields_update = array(); 
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['foreign_key'] as $sFKName => $sFKValue)
              {
                   if (isset($this->sc_conv_var[$sFKName]))
                   {
                       $sFKName = $this->sc_conv_var[$sFKName];
                   }
                  eval("\$this->" . $sFKName . " = \"" . $sFKValue . "\";");
              }
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['decimal_db'] == ",") 
          {
              $this->nm_poe_aspas_decimal();
          }
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where cod_device = $this->cod_device ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where cod_device = $this->cod_device "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where cod_device = $this->cod_device ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where cod_device = $this->cod_device "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where cod_device = $this->cod_device ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where cod_device = $this->cod_device "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where cod_device = $this->cod_device ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where cod_device = $this->cod_device "); 
          }  
          else  
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where cod_device = $this->cod_device ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where cod_device = $this->cod_device "); 
          }  
          if ($rs1 === false)  
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
              if ($this->NM_ajax_flag)
              {
                 form_devices_mob_pack_ajax_response();
              }
              exit; 
          }  
          $bUpdateOk = true;
          $tmp_result = (int) $rs1->fields[0]; 
          if ($tmp_result != 1) 
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "critica", $this->Ini->Nm_lang['lang_errm_nfnd']); 
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
                  $SC_fields_update[] = "cod_activo = '$this->cod_activo', cod_grupo = '$this->cod_grupo', device_name = '$this->device_name', activa = $this->activa, acepta_tokens = $this->acepta_tokens, dev_ip = '$this->dev_ip', tokens = $this->tokens, pin_relay1 = $this->pin_relay1, pin_relay2 = $this->pin_relay2, url_accion = '$this->url_accion', url_atraccion = '$this->url_atraccion'"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "cod_activo = '$this->cod_activo', cod_grupo = '$this->cod_grupo', device_name = '$this->device_name', activa = $this->activa, acepta_tokens = $this->acepta_tokens, dev_ip = '$this->dev_ip', tokens = $this->tokens, pin_relay1 = $this->pin_relay1, pin_relay2 = $this->pin_relay2, url_accion = '$this->url_accion', url_atraccion = '$this->url_atraccion'"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "cod_activo = '$this->cod_activo', cod_grupo = '$this->cod_grupo', device_name = '$this->device_name', activa = $this->activa, acepta_tokens = $this->acepta_tokens, dev_ip = '$this->dev_ip', tokens = $this->tokens, pin_relay1 = $this->pin_relay1, pin_relay2 = $this->pin_relay2, url_accion = '$this->url_accion', url_atraccion = '$this->url_atraccion'"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "cod_activo = '$this->cod_activo', cod_grupo = '$this->cod_grupo', device_name = '$this->device_name', activa = $this->activa, acepta_tokens = $this->acepta_tokens, dev_ip = '$this->dev_ip', tokens = $this->tokens, pin_relay1 = $this->pin_relay1, pin_relay2 = $this->pin_relay2, url_accion = '$this->url_accion', url_atraccion = '$this->url_atraccion'"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "cod_activo = '$this->cod_activo', cod_grupo = '$this->cod_grupo', device_name = '$this->device_name', activa = $this->activa, acepta_tokens = $this->acepta_tokens, dev_ip = '$this->dev_ip', tokens = $this->tokens, pin_relay1 = $this->pin_relay1, pin_relay2 = $this->pin_relay2, url_accion = '$this->url_accion', url_atraccion = '$this->url_atraccion'"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "cod_activo = '$this->cod_activo', cod_grupo = '$this->cod_grupo', device_name = '$this->device_name', activa = $this->activa, acepta_tokens = $this->acepta_tokens, dev_ip = '$this->dev_ip', tokens = $this->tokens, pin_relay1 = $this->pin_relay1, pin_relay2 = $this->pin_relay2, url_accion = '$this->url_accion', url_atraccion = '$this->url_atraccion'"; 
              } 
              else 
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "cod_activo = '$this->cod_activo', cod_grupo = '$this->cod_grupo', device_name = '$this->device_name', activa = $this->activa, acepta_tokens = $this->acepta_tokens, dev_ip = '$this->dev_ip', tokens = $this->tokens, pin_relay1 = $this->pin_relay1, pin_relay2 = $this->pin_relay2, url_accion = '$this->url_accion', url_atraccion = '$this->url_atraccion'"; 
              } 
              if (isset($NM_val_form['estado']) && $NM_val_form['estado'] != $this->nmgp_dados_select['estado']) 
              { 
                  $SC_fields_update[] = "estado = $this->estado"; 
              } 
              if (isset($NM_val_form['ult_rfid']) && $NM_val_form['ult_rfid'] != $this->nmgp_dados_select['ult_rfid']) 
              { 
                  $SC_fields_update[] = "ult_rfid = '$this->ult_rfid'"; 
              } 
              if (isset($NM_val_form['ult_fecha']) && $NM_val_form['ult_fecha'] != $this->nmgp_dados_select['ult_fecha']) 
              { 
                  if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
                  { 
                      $SC_fields_update[] = "ult_fecha = #$this->ult_fecha#"; 
                  } 
                  elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
                  { 
                      $SC_fields_update[] = "ult_fecha = EXTEND('" . $this->ult_fecha . "', YEAR TO FRACTION)"; 
                  } 
                  else
                  { 
                      $SC_fields_update[] = "ult_fecha = " . $this->Ini->date_delim . $this->ult_fecha . $this->Ini->date_delim1 . ""; 
                  } 
              } 
              if (isset($NM_val_form['valor_default']) && $NM_val_form['valor_default'] != $this->nmgp_dados_select['valor_default']) 
              { 
                  $SC_fields_update[] = "valor_default = $this->valor_default"; 
              } 
              if (isset($NM_val_form['acepta_tiempo']) && $NM_val_form['acepta_tiempo'] != $this->nmgp_dados_select['acepta_tiempo']) 
              { 
                  $SC_fields_update[] = "acepta_tiempo = $this->acepta_tiempo"; 
              } 
              if (isset($NM_val_form['tipo_dev']) && $NM_val_form['tipo_dev'] != $this->nmgp_dados_select['tipo_dev']) 
              { 
                  $SC_fields_update[] = "tipo_dev = $this->tipo_dev"; 
              } 
              if (isset($NM_val_form['direccion_torno']) && $NM_val_form['direccion_torno'] != $this->nmgp_dados_select['direccion_torno']) 
              { 
                  $SC_fields_update[] = "direccion_torno = $this->direccion_torno"; 
              } 
              if (isset($NM_val_form['timeout_rfid']) && $NM_val_form['timeout_rfid'] != $this->nmgp_dados_select['timeout_rfid']) 
              { 
                  $SC_fields_update[] = "timeout_rfid = $this->timeout_rfid"; 
              } 
              if (isset($NM_val_form['discapacitado']) && $NM_val_form['discapacitado'] != $this->nmgp_dados_select['discapacitado']) 
              { 
                  $SC_fields_update[] = "discapacitado = $this->discapacitado"; 
              } 
              if (isset($NM_val_form['numcaja']) && $NM_val_form['numcaja'] != $this->nmgp_dados_select['numcaja']) 
              { 
                  $SC_fields_update[] = "numcaja = $this->numcaja"; 
              } 
              if (isset($NM_val_form['empleado']) && $NM_val_form['empleado'] != $this->nmgp_dados_select['empleado']) 
              { 
                  $SC_fields_update[] = "empleado = $this->empleado"; 
              } 
              if (isset($NM_val_form['serialrfid']) && $NM_val_form['serialrfid'] != $this->nmgp_dados_select['serialrfid']) 
              { 
                  $SC_fields_update[] = "serialrfid = '$this->serialrfid'"; 
              } 
              if (isset($NM_val_form['bidireccion']) && $NM_val_form['bidireccion'] != $this->nmgp_dados_select['bidireccion']) 
              { 
                  $SC_fields_update[] = "bidireccion = $this->bidireccion"; 
              } 
              if (isset($NM_val_form['cod_devicee']) && $NM_val_form['cod_devicee'] != $this->nmgp_dados_select['cod_devicee']) 
              { 
                  $SC_fields_update[] = "cod_deviceE = $this->cod_devicee"; 
              } 
              if (isset($NM_val_form['url_1']) && $NM_val_form['url_1'] != $this->nmgp_dados_select['url_1']) 
              { 
                  $SC_fields_update[] = "url_1 = '$this->url_1'"; 
              } 
              if (isset($NM_val_form['url_2']) && $NM_val_form['url_2'] != $this->nmgp_dados_select['url_2']) 
              { 
                  $SC_fields_update[] = "url_2 = '$this->url_2'"; 
              } 
              if (isset($NM_val_form['url_3']) && $NM_val_form['url_3'] != $this->nmgp_dados_select['url_3']) 
              { 
                  $SC_fields_update[] = "url_3 = '$this->url_3'"; 
              } 
              if (isset($NM_val_form['rfid_read']) && $NM_val_form['rfid_read'] != $this->nmgp_dados_select['rfid_read']) 
              { 
                  $SC_fields_update[] = "rfid_read = '$this->rfid_read'"; 
              } 
              if (isset($NM_val_form['rfid_estado']) && $NM_val_form['rfid_estado'] != $this->nmgp_dados_select['rfid_estado']) 
              { 
                  $SC_fields_update[] = "rfid_estado = $this->rfid_estado"; 
              } 
              if (isset($NM_val_form['rfid_fecha']) && $NM_val_form['rfid_fecha'] != $this->nmgp_dados_select['rfid_fecha']) 
              { 
                   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
                  { 
                      $SC_fields_update[] = "rfid_fecha = TO_DATE('$this->rfid_fecha', 'yyyy-mm-dd hh24:mi:ss')"; 
                  } 
                  else
                  { 
                      $SC_fields_update[] = "rfid_fecha = '$this->rfid_fecha'"; 
                  } 
              } 
              $comando .= implode(",", $SC_fields_update);  
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              {
                  $comando .= " WHERE cod_device = $this->cod_device ";  
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
                  $comando .= " WHERE cod_device = $this->cod_device ";  
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              {
                  $comando .= " WHERE cod_device = $this->cod_device ";  
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $comando .= " WHERE cod_device = $this->cod_device ";  
              }  
              else  
              {
                  $comando .= " WHERE cod_device = $this->cod_device ";  
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
                                  form_devices_mob_pack_ajax_response();
                              }
                              exit;  
                          }   
                      }   
                  }   
              }   
              $this->cod_activo = $this->cod_activo_before_qstr;
              $this->cod_grupo = $this->cod_grupo_before_qstr;
              $this->device_name = $this->device_name_before_qstr;
              $this->ult_rfid = $this->ult_rfid_before_qstr;
              $this->dev_ip = $this->dev_ip_before_qstr;
              $this->serialrfid = $this->serialrfid_before_qstr;
              $this->url_1 = $this->url_1_before_qstr;
              $this->url_2 = $this->url_2_before_qstr;
              $this->url_3 = $this->url_3_before_qstr;
              $this->rfid_read = $this->rfid_read_before_qstr;
              $this->url_accion = $this->url_accion_before_qstr;
              $this->url_atraccion = $this->url_atraccion_before_qstr;
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
              $this->NM_gera_log_new();
              $this->NM_gera_log_compress();

              $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['db_changed'] = true;
              if ($this->NM_ajax_flag) {
                  $this->NM_ajax_info['clearUpload'] = 'S';
              }


              if     (isset($NM_val_form) && isset($NM_val_form['cod_device'])) { $this->cod_device = $NM_val_form['cod_device']; }
              elseif (isset($this->cod_device)) { $this->nm_limpa_alfa($this->cod_device); }
              if     (isset($NM_val_form) && isset($NM_val_form['cod_activo'])) { $this->cod_activo = $NM_val_form['cod_activo']; }
              elseif (isset($this->cod_activo)) { $this->nm_limpa_alfa($this->cod_activo); }
              if     (isset($NM_val_form) && isset($NM_val_form['cod_grupo'])) { $this->cod_grupo = $NM_val_form['cod_grupo']; }
              elseif (isset($this->cod_grupo)) { $this->nm_limpa_alfa($this->cod_grupo); }
              if     (isset($NM_val_form) && isset($NM_val_form['device_name'])) { $this->device_name = $NM_val_form['device_name']; }
              elseif (isset($this->device_name)) { $this->nm_limpa_alfa($this->device_name); }
              if     (isset($NM_val_form) && isset($NM_val_form['activa'])) { $this->activa = $NM_val_form['activa']; }
              elseif (isset($this->activa)) { $this->nm_limpa_alfa($this->activa); }
              if     (isset($NM_val_form) && isset($NM_val_form['acepta_tokens'])) { $this->acepta_tokens = $NM_val_form['acepta_tokens']; }
              elseif (isset($this->acepta_tokens)) { $this->nm_limpa_alfa($this->acepta_tokens); }
              if     (isset($NM_val_form) && isset($NM_val_form['dev_ip'])) { $this->dev_ip = $NM_val_form['dev_ip']; }
              elseif (isset($this->dev_ip)) { $this->nm_limpa_alfa($this->dev_ip); }
              if     (isset($NM_val_form) && isset($NM_val_form['tokens'])) { $this->tokens = $NM_val_form['tokens']; }
              elseif (isset($this->tokens)) { $this->nm_limpa_alfa($this->tokens); }
              if     (isset($NM_val_form) && isset($NM_val_form['pin_relay1'])) { $this->pin_relay1 = $NM_val_form['pin_relay1']; }
              elseif (isset($this->pin_relay1)) { $this->nm_limpa_alfa($this->pin_relay1); }
              if     (isset($NM_val_form) && isset($NM_val_form['pin_relay2'])) { $this->pin_relay2 = $NM_val_form['pin_relay2']; }
              elseif (isset($this->pin_relay2)) { $this->nm_limpa_alfa($this->pin_relay2); }

              $this->nm_formatar_campos();
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
              }

              $aOldRefresh               = $this->nmgp_refresh_fields;
              $this->nmgp_refresh_fields = array_diff(array('cod_device', 'dev_ip', 'cod_grupo', 'url_atraccion', 'url_accion', 'device_name', 'activa', 'acepta_tokens', 'tokens', 'pin_relay1', 'pin_relay2', 'cod_activo'), $aDoNotUpdate);
              $this->ajax_return_values();
              $this->nmgp_refresh_fields = $aOldRefresh;

              $this->nm_tira_formatacao();
          }  
      }  
      if ($this->nmgp_opcao == "incluir") 
      { 
          $NM_cmp_auto = "";
          $NM_seq_auto = "";
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['foreign_key'] as $sFKName => $sFKValue)
              {
                   if (isset($this->sc_conv_var[$sFKName]))
                   {
                       $sFKName = $this->sc_conv_var[$sFKName];
                   }
                  eval("\$this->" . $sFKName . " = \"" . $sFKValue . "\";");
              }
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['decimal_db'] == ",") 
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
          if (!isset($_POST['nmgp_ins_valid']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['insert_validation'] != $_POST['nmgp_ins_valid'])
          {
              $bInsertOk = false;
              $this->Erro->mensagem(__FILE__, __LINE__, 'security', $this->Ini->Nm_lang['lang_errm_inst_vald']);
              if (isset($_SESSION['scriptcase']['erro_handler']) && $_SESSION['scriptcase']['erro_handler'])
              {
                  $this->nmgp_opcao = 'refresh_insert';
                  if ($this->NM_ajax_flag)
                  {
                      form_devices_mob_pack_ajax_response();
                      exit;
                  }
              }
          }
          if ($bInsertOk)
          { 
              $_test_file = $this->fetchUniqueUploadName($this->foto1_scfile_name, $dir_file, "foto1");
              if (trim($this->foto1_scfile_name) != $_test_file)
              {
                  $this->foto1_scfile_name = $_test_file;
                  $this->foto1 = $_test_file;
              }
              $_test_file = $this->fetchUniqueUploadName($this->foto2_scfile_name, $dir_file, "foto2");
              if (trim($this->foto2_scfile_name) != $_test_file)
              {
                  $this->foto2_scfile_name = $_test_file;
                  $this->foto2 = $_test_file;
              }
              $_test_file = $this->fetchUniqueUploadName($this->foto3_scfile_name, $dir_file, "foto3");
              if (trim($this->foto3_scfile_name) != $_test_file)
              {
                  $this->foto3_scfile_name = $_test_file;
                  $this->foto3 = $_test_file;
              }
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              { 
                  $compl_insert     = ""; 
                  $compl_insert_val = ""; 
                  if ($this->activa != "")
                  { 
                       $compl_insert     .= ", activa";
                       $compl_insert_val .= ", $this->activa";
                  } 
                  if ($this->valor_default != "")
                  { 
                       $compl_insert     .= ", valor_default";
                       $compl_insert_val .= ", $this->valor_default";
                  } 
                  if ($this->tipo_dev != "")
                  { 
                       $compl_insert     .= ", tipo_dev";
                       $compl_insert_val .= ", $this->tipo_dev";
                  } 
                  if ($this->direccion_torno != "")
                  { 
                       $compl_insert     .= ", direccion_torno";
                       $compl_insert_val .= ", $this->direccion_torno";
                  } 
                  if ($this->tokens != "")
                  { 
                       $compl_insert     .= ", tokens";
                       $compl_insert_val .= ", $this->tokens";
                  } 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (cod_activo, cod_grupo, device_name, estado, ult_rfid, ult_fecha, acepta_tiempo, acepta_tokens, dev_ip, timeout_rfid, discapacitado, numcaja, empleado, serialrfid, bidireccion, cod_deviceE, url_1, url_2, url_3, foto1, foto2, foto3, pin_relay1, pin_relay2, rfid_read, rfid_estado, rfid_fecha, url_accion, url_atraccion $compl_insert) VALUES ('$this->cod_activo', '$this->cod_grupo', '$this->device_name', $this->estado, '$this->ult_rfid', #$this->ult_fecha#, $this->acepta_tiempo, $this->acepta_tokens, '$this->dev_ip', $this->timeout_rfid, $this->discapacitado, $this->numcaja, $this->empleado, '$this->serialrfid', $this->bidireccion, $this->cod_devicee, '$this->url_1', '$this->url_2', '$this->url_3', '$this->foto1', '$this->foto2', '$this->foto3', $this->pin_relay1, $this->pin_relay2, '$this->rfid_read', $this->rfid_estado, '$this->rfid_fecha', '$this->url_accion', '$this->url_atraccion' $compl_insert_val)"; 
              }
              elseif ($this->Ini->nm_tpbanco == "pdo_sqlsrv")
              { 
                  $compl_insert     = ""; 
                  $compl_insert_val = ""; 
                  if ($this->activa != "")
                  { 
                       $compl_insert     .= ", activa";
                       $compl_insert_val .= ", $this->activa";
                  } 
                  if ($this->valor_default != "")
                  { 
                       $compl_insert     .= ", valor_default";
                       $compl_insert_val .= ", $this->valor_default";
                  } 
                  if ($this->tipo_dev != "")
                  { 
                       $compl_insert     .= ", tipo_dev";
                       $compl_insert_val .= ", $this->tipo_dev";
                  } 
                  if ($this->direccion_torno != "")
                  { 
                       $compl_insert     .= ", direccion_torno";
                       $compl_insert_val .= ", $this->direccion_torno";
                  } 
                  if ($this->tokens != "")
                  { 
                       $compl_insert     .= ", tokens";
                       $compl_insert_val .= ", $this->tokens";
                  } 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (cod_activo, cod_grupo, device_name, estado, ult_rfid, ult_fecha, acepta_tiempo, acepta_tokens, dev_ip, timeout_rfid, discapacitado, numcaja, empleado, serialrfid, bidireccion, cod_deviceE, url_1, url_2, url_3, foto1, foto2, foto3, pin_relay1, pin_relay2, rfid_read, rfid_estado, rfid_fecha, url_accion, url_atraccion $compl_insert) VALUES ('$this->cod_activo', '$this->cod_grupo', '$this->device_name', $this->estado, '$this->ult_rfid', " . $this->Ini->date_delim . $this->ult_fecha . $this->Ini->date_delim1 . ", $this->acepta_tiempo, $this->acepta_tokens, '$this->dev_ip', $this->timeout_rfid, $this->discapacitado, $this->numcaja, $this->empleado, '$this->serialrfid', $this->bidireccion, $this->cod_devicee, '$this->url_1', '$this->url_2', '$this->url_3', '', '', '', $this->pin_relay1, $this->pin_relay2, '$this->rfid_read', $this->rfid_estado, '$this->rfid_fecha', '$this->url_accion', '$this->url_atraccion' $compl_insert_val)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              { 
                  $compl_insert     = ""; 
                  $compl_insert_val = ""; 
                  if ($this->activa != "")
                  { 
                       $compl_insert     .= ", activa";
                       $compl_insert_val .= ", $this->activa";
                  } 
                  if ($this->valor_default != "")
                  { 
                       $compl_insert     .= ", valor_default";
                       $compl_insert_val .= ", $this->valor_default";
                  } 
                  if ($this->tipo_dev != "")
                  { 
                       $compl_insert     .= ", tipo_dev";
                       $compl_insert_val .= ", $this->tipo_dev";
                  } 
                  if ($this->direccion_torno != "")
                  { 
                       $compl_insert     .= ", direccion_torno";
                       $compl_insert_val .= ", $this->direccion_torno";
                  } 
                  if ($this->tokens != "")
                  { 
                       $compl_insert     .= ", tokens";
                       $compl_insert_val .= ", $this->tokens";
                  } 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (cod_activo, cod_grupo, device_name, estado, ult_rfid, ult_fecha, acepta_tiempo, acepta_tokens, dev_ip, timeout_rfid, discapacitado, numcaja, empleado, serialrfid, bidireccion, cod_deviceE, url_1, url_2, url_3, foto1, foto2, foto3, pin_relay1, pin_relay2, rfid_read, rfid_estado, rfid_fecha, url_accion, url_atraccion $compl_insert) VALUES ('$this->cod_activo', '$this->cod_grupo', '$this->device_name', $this->estado, '$this->ult_rfid', " . $this->Ini->date_delim . $this->ult_fecha . $this->Ini->date_delim1 . ", $this->acepta_tiempo, $this->acepta_tokens, '$this->dev_ip', $this->timeout_rfid, $this->discapacitado, $this->numcaja, $this->empleado, '$this->serialrfid', $this->bidireccion, $this->cod_devicee, '$this->url_1', '$this->url_2', '$this->url_3', '$this->foto1', '$this->foto2', '$this->foto3', $this->pin_relay1, $this->pin_relay2, '$this->rfid_read', $this->rfid_estado, '$this->rfid_fecha', '$this->url_accion', '$this->url_atraccion' $compl_insert_val)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
              { 
                  $compl_insert     = ""; 
                  $compl_insert_val = ""; 
                  if ($this->activa != "")
                  { 
                       $compl_insert     .= ", activa";
                       $compl_insert_val .= ", $this->activa";
                  } 
                  if ($this->valor_default != "")
                  { 
                       $compl_insert     .= ", valor_default";
                       $compl_insert_val .= ", $this->valor_default";
                  } 
                  if ($this->tipo_dev != "")
                  { 
                       $compl_insert     .= ", tipo_dev";
                       $compl_insert_val .= ", $this->tipo_dev";
                  } 
                  if ($this->direccion_torno != "")
                  { 
                       $compl_insert     .= ", direccion_torno";
                       $compl_insert_val .= ", $this->direccion_torno";
                  } 
                  if ($this->tokens != "")
                  { 
                       $compl_insert     .= ", tokens";
                       $compl_insert_val .= ", $this->tokens";
                  } 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (cod_activo, cod_grupo, device_name, estado, ult_rfid, ult_fecha, acepta_tiempo, acepta_tokens, dev_ip, timeout_rfid, discapacitado, numcaja, empleado, serialrfid, bidireccion, cod_deviceE, url_1, url_2, url_3, foto1, foto2, foto3, pin_relay1, pin_relay2, rfid_read, rfid_estado, rfid_fecha, url_accion, url_atraccion $compl_insert) VALUES ('$this->cod_activo', '$this->cod_grupo', '$this->device_name', $this->estado, '$this->ult_rfid', " . $this->Ini->date_delim . $this->ult_fecha . $this->Ini->date_delim1 . ", $this->acepta_tiempo, $this->acepta_tokens, '$this->dev_ip', $this->timeout_rfid, $this->discapacitado, $this->numcaja, $this->empleado, '$this->serialrfid', $this->bidireccion, $this->cod_devicee, '$this->url_1', '$this->url_2', '$this->url_3', '$this->foto1', '$this->foto2', '$this->foto3', $this->pin_relay1, $this->pin_relay2, '$this->rfid_read', $this->rfid_estado, '$this->rfid_fecha', '$this->url_accion', '$this->url_atraccion' $compl_insert_val)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              {
                  $compl_insert     = ""; 
                  $compl_insert_val = ""; 
                  if ($this->activa != "")
                  { 
                       $compl_insert     .= ", activa";
                       $compl_insert_val .= ", $this->activa";
                  } 
                  if ($this->valor_default != "")
                  { 
                       $compl_insert     .= ", valor_default";
                       $compl_insert_val .= ", $this->valor_default";
                  } 
                  if ($this->tipo_dev != "")
                  { 
                       $compl_insert     .= ", tipo_dev";
                       $compl_insert_val .= ", $this->tipo_dev";
                  } 
                  if ($this->direccion_torno != "")
                  { 
                       $compl_insert     .= ", direccion_torno";
                       $compl_insert_val .= ", $this->direccion_torno";
                  } 
                  if ($this->tokens != "")
                  { 
                       $compl_insert     .= ", tokens";
                       $compl_insert_val .= ", $this->tokens";
                  } 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "cod_activo, cod_grupo, device_name, estado, ult_rfid, ult_fecha, acepta_tiempo, acepta_tokens, dev_ip, timeout_rfid, discapacitado, numcaja, empleado, serialrfid, bidireccion, cod_deviceE, url_1, url_2, url_3, foto1, foto2, foto3, pin_relay1, pin_relay2, rfid_read, rfid_estado, rfid_fecha, url_accion, url_atraccion $compl_insert) VALUES (" . $NM_seq_auto . "'$this->cod_activo', '$this->cod_grupo', '$this->device_name', $this->estado, '$this->ult_rfid', " . $this->Ini->date_delim . $this->ult_fecha . $this->Ini->date_delim1 . ", $this->acepta_tiempo, $this->acepta_tokens, '$this->dev_ip', $this->timeout_rfid, $this->discapacitado, $this->numcaja, $this->empleado, '$this->serialrfid', $this->bidireccion, $this->cod_devicee, '$this->url_1', '$this->url_2', '$this->url_3', EMPTY_BLOB(), EMPTY_BLOB(), EMPTY_BLOB(), $this->pin_relay1, $this->pin_relay2, '$this->rfid_read', $this->rfid_estado, TO_DATE('$this->rfid_fecha', 'yyyy-mm-dd hh24:mi:ss'), '$this->url_accion', '$this->url_atraccion' $compl_insert_val)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $compl_insert     = ""; 
                  $compl_insert_val = ""; 
                  if ($this->activa != "")
                  { 
                       $compl_insert     .= ", activa";
                       $compl_insert_val .= ", $this->activa";
                  } 
                  if ($this->valor_default != "")
                  { 
                       $compl_insert     .= ", valor_default";
                       $compl_insert_val .= ", $this->valor_default";
                  } 
                  if ($this->tipo_dev != "")
                  { 
                       $compl_insert     .= ", tipo_dev";
                       $compl_insert_val .= ", $this->tipo_dev";
                  } 
                  if ($this->direccion_torno != "")
                  { 
                       $compl_insert     .= ", direccion_torno";
                       $compl_insert_val .= ", $this->direccion_torno";
                  } 
                  if ($this->tokens != "")
                  { 
                       $compl_insert     .= ", tokens";
                       $compl_insert_val .= ", $this->tokens";
                  } 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "cod_activo, cod_grupo, device_name, estado, ult_rfid, ult_fecha, acepta_tiempo, acepta_tokens, dev_ip, timeout_rfid, discapacitado, numcaja, empleado, serialrfid, bidireccion, cod_deviceE, url_1, url_2, url_3, foto1, foto2, foto3, pin_relay1, pin_relay2, rfid_read, rfid_estado, rfid_fecha, url_accion, url_atraccion $compl_insert) VALUES (" . $NM_seq_auto . "'$this->cod_activo', '$this->cod_grupo', '$this->device_name', $this->estado, '$this->ult_rfid', EXTEND('$this->ult_fecha', YEAR TO FRACTION), $this->acepta_tiempo, $this->acepta_tokens, '$this->dev_ip', $this->timeout_rfid, $this->discapacitado, $this->numcaja, $this->empleado, '$this->serialrfid', $this->bidireccion, $this->cod_devicee, '$this->url_1', '$this->url_2', '$this->url_3', null, null, null, $this->pin_relay1, $this->pin_relay2, '$this->rfid_read', $this->rfid_estado, '$this->rfid_fecha', '$this->url_accion', '$this->url_atraccion' $compl_insert_val)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
              {
                  $compl_insert     = ""; 
                  $compl_insert_val = ""; 
                  if ($this->activa != "")
                  { 
                       $compl_insert     .= ", activa";
                       $compl_insert_val .= ", $this->activa";
                  } 
                  if ($this->valor_default != "")
                  { 
                       $compl_insert     .= ", valor_default";
                       $compl_insert_val .= ", $this->valor_default";
                  } 
                  if ($this->tipo_dev != "")
                  { 
                       $compl_insert     .= ", tipo_dev";
                       $compl_insert_val .= ", $this->tipo_dev";
                  } 
                  if ($this->direccion_torno != "")
                  { 
                       $compl_insert     .= ", direccion_torno";
                       $compl_insert_val .= ", $this->direccion_torno";
                  } 
                  if ($this->tokens != "")
                  { 
                       $compl_insert     .= ", tokens";
                       $compl_insert_val .= ", $this->tokens";
                  } 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "cod_activo, cod_grupo, device_name, estado, ult_rfid, ult_fecha, acepta_tiempo, acepta_tokens, dev_ip, timeout_rfid, discapacitado, numcaja, empleado, serialrfid, bidireccion, cod_deviceE, url_1, url_2, url_3, foto1, foto2, foto3, pin_relay1, pin_relay2, rfid_read, rfid_estado, rfid_fecha, url_accion, url_atraccion $compl_insert) VALUES (" . $NM_seq_auto . "'$this->cod_activo', '$this->cod_grupo', '$this->device_name', $this->estado, '$this->ult_rfid', " . $this->Ini->date_delim . $this->ult_fecha . $this->Ini->date_delim1 . ", $this->acepta_tiempo, $this->acepta_tokens, '$this->dev_ip', $this->timeout_rfid, $this->discapacitado, $this->numcaja, $this->empleado, '$this->serialrfid', $this->bidireccion, $this->cod_devicee, '$this->url_1', '$this->url_2', '$this->url_3', '', '', '', $this->pin_relay1, $this->pin_relay2, '$this->rfid_read', $this->rfid_estado, '$this->rfid_fecha', '$this->url_accion', '$this->url_atraccion' $compl_insert_val)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
              {
                  $compl_insert     = ""; 
                  $compl_insert_val = ""; 
                  if ($this->activa != "")
                  { 
                       $compl_insert     .= ", activa";
                       $compl_insert_val .= ", $this->activa";
                  } 
                  if ($this->valor_default != "")
                  { 
                       $compl_insert     .= ", valor_default";
                       $compl_insert_val .= ", $this->valor_default";
                  } 
                  if ($this->tipo_dev != "")
                  { 
                       $compl_insert     .= ", tipo_dev";
                       $compl_insert_val .= ", $this->tipo_dev";
                  } 
                  if ($this->direccion_torno != "")
                  { 
                       $compl_insert     .= ", direccion_torno";
                       $compl_insert_val .= ", $this->direccion_torno";
                  } 
                  if ($this->tokens != "")
                  { 
                       $compl_insert     .= ", tokens";
                       $compl_insert_val .= ", $this->tokens";
                  } 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "cod_activo, cod_grupo, device_name, estado, ult_rfid, ult_fecha, acepta_tiempo, acepta_tokens, dev_ip, timeout_rfid, discapacitado, numcaja, empleado, serialrfid, bidireccion, cod_deviceE, url_1, url_2, url_3, foto1, foto2, foto3, pin_relay1, pin_relay2, rfid_read, rfid_estado, rfid_fecha, url_accion, url_atraccion $compl_insert) VALUES (" . $NM_seq_auto . "'$this->cod_activo', '$this->cod_grupo', '$this->device_name', $this->estado, '$this->ult_rfid', " . $this->Ini->date_delim . $this->ult_fecha . $this->Ini->date_delim1 . ", $this->acepta_tiempo, $this->acepta_tokens, '$this->dev_ip', $this->timeout_rfid, $this->discapacitado, $this->numcaja, $this->empleado, '$this->serialrfid', $this->bidireccion, $this->cod_devicee, '$this->url_1', '$this->url_2', '$this->url_3', '', '', '', $this->pin_relay1, $this->pin_relay2, '$this->rfid_read', $this->rfid_estado, '$this->rfid_fecha', '$this->url_accion', '$this->url_atraccion' $compl_insert_val)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
              {
                  $compl_insert     = ""; 
                  $compl_insert_val = ""; 
                  if ($this->activa != "")
                  { 
                       $compl_insert     .= ", activa";
                       $compl_insert_val .= ", $this->activa";
                  } 
                  if ($this->valor_default != "")
                  { 
                       $compl_insert     .= ", valor_default";
                       $compl_insert_val .= ", $this->valor_default";
                  } 
                  if ($this->tipo_dev != "")
                  { 
                       $compl_insert     .= ", tipo_dev";
                       $compl_insert_val .= ", $this->tipo_dev";
                  } 
                  if ($this->direccion_torno != "")
                  { 
                       $compl_insert     .= ", direccion_torno";
                       $compl_insert_val .= ", $this->direccion_torno";
                  } 
                  if ($this->tokens != "")
                  { 
                       $compl_insert     .= ", tokens";
                       $compl_insert_val .= ", $this->tokens";
                  } 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "cod_activo, cod_grupo, device_name, estado, ult_rfid, ult_fecha, acepta_tiempo, acepta_tokens, dev_ip, timeout_rfid, discapacitado, numcaja, empleado, serialrfid, bidireccion, cod_deviceE, url_1, url_2, url_3, foto1, foto2, foto3, pin_relay1, pin_relay2, rfid_read, rfid_estado, rfid_fecha, url_accion, url_atraccion $compl_insert) VALUES (" . $NM_seq_auto . "'$this->cod_activo', '$this->cod_grupo', '$this->device_name', $this->estado, '$this->ult_rfid', " . $this->Ini->date_delim . $this->ult_fecha . $this->Ini->date_delim1 . ", $this->acepta_tiempo, $this->acepta_tokens, '$this->dev_ip', $this->timeout_rfid, $this->discapacitado, $this->numcaja, $this->empleado, '$this->serialrfid', $this->bidireccion, $this->cod_devicee, '$this->url_1', '$this->url_2', '$this->url_3', '', '', '', $this->pin_relay1, $this->pin_relay2, '$this->rfid_read', $this->rfid_estado, '$this->rfid_fecha', '$this->url_accion', '$this->url_atraccion' $compl_insert_val)"; 
              }
              elseif ($this->Ini->nm_tpbanco =='pdo_ibm')
              {
                  $compl_insert     = ""; 
                  $compl_insert_val = ""; 
                  if ($this->activa != "")
                  { 
                       $compl_insert     .= ", activa";
                       $compl_insert_val .= ", $this->activa";
                  } 
                  if ($this->valor_default != "")
                  { 
                       $compl_insert     .= ", valor_default";
                       $compl_insert_val .= ", $this->valor_default";
                  } 
                  if ($this->tipo_dev != "")
                  { 
                       $compl_insert     .= ", tipo_dev";
                       $compl_insert_val .= ", $this->tipo_dev";
                  } 
                  if ($this->direccion_torno != "")
                  { 
                       $compl_insert     .= ", direccion_torno";
                       $compl_insert_val .= ", $this->direccion_torno";
                  } 
                  if ($this->tokens != "")
                  { 
                       $compl_insert     .= ", tokens";
                       $compl_insert_val .= ", $this->tokens";
                  } 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "cod_activo, cod_grupo, device_name, estado, ult_rfid, ult_fecha, acepta_tiempo, acepta_tokens, dev_ip, timeout_rfid, discapacitado, numcaja, empleado, serialrfid, bidireccion, cod_deviceE, url_1, url_2, url_3, foto1, foto2, foto3, pin_relay1, pin_relay2, rfid_read, rfid_estado, rfid_fecha, url_accion, url_atraccion $compl_insert) VALUES (" . $NM_seq_auto . "'$this->cod_activo', '$this->cod_grupo', '$this->device_name', $this->estado, '$this->ult_rfid', " . $this->Ini->date_delim . $this->ult_fecha . $this->Ini->date_delim1 . ", $this->acepta_tiempo, $this->acepta_tokens, '$this->dev_ip', $this->timeout_rfid, $this->discapacitado, $this->numcaja, $this->empleado, '$this->serialrfid', $this->bidireccion, $this->cod_devicee, '$this->url_1', '$this->url_2', '$this->url_3', EMPTY_BLOB(), EMPTY_BLOB(), EMPTY_BLOB(), $this->pin_relay1, $this->pin_relay2, '$this->rfid_read', $this->rfid_estado, TO_DATE('$this->rfid_fecha', 'yyyy-mm-dd hh24:mi:ss'), '$this->url_accion', '$this->url_atraccion' $compl_insert_val)"; 
              }
              else
              {
                  $compl_insert     = ""; 
                  $compl_insert_val = ""; 
                  if ($this->activa != "")
                  { 
                       $compl_insert     .= ", activa";
                       $compl_insert_val .= ", $this->activa";
                  } 
                  if ($this->valor_default != "")
                  { 
                       $compl_insert     .= ", valor_default";
                       $compl_insert_val .= ", $this->valor_default";
                  } 
                  if ($this->tipo_dev != "")
                  { 
                       $compl_insert     .= ", tipo_dev";
                       $compl_insert_val .= ", $this->tipo_dev";
                  } 
                  if ($this->direccion_torno != "")
                  { 
                       $compl_insert     .= ", direccion_torno";
                       $compl_insert_val .= ", $this->direccion_torno";
                  } 
                  if ($this->tokens != "")
                  { 
                       $compl_insert     .= ", tokens";
                       $compl_insert_val .= ", $this->tokens";
                  } 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "cod_activo, cod_grupo, device_name, estado, ult_rfid, ult_fecha, acepta_tiempo, acepta_tokens, dev_ip, timeout_rfid, discapacitado, numcaja, empleado, serialrfid, bidireccion, cod_deviceE, url_1, url_2, url_3, foto1, foto2, foto3, pin_relay1, pin_relay2, rfid_read, rfid_estado, rfid_fecha, url_accion, url_atraccion $compl_insert) VALUES (" . $NM_seq_auto . "'$this->cod_activo', '$this->cod_grupo', '$this->device_name', $this->estado, '$this->ult_rfid', " . $this->Ini->date_delim . $this->ult_fecha . $this->Ini->date_delim1 . ", $this->acepta_tiempo, $this->acepta_tokens, '$this->dev_ip', $this->timeout_rfid, $this->discapacitado, $this->numcaja, $this->empleado, '$this->serialrfid', $this->bidireccion, $this->cod_devicee, '$this->url_1', '$this->url_2', '$this->url_3', '$this->foto1', '$this->foto2', '$this->foto3', $this->pin_relay1, $this->pin_relay2, '$this->rfid_read', $this->rfid_estado, '$this->rfid_fecha', '$this->url_accion', '$this->url_atraccion' $compl_insert_val)"; 
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
                              form_devices_mob_pack_ajax_response();
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
                          form_devices_mob_pack_ajax_response();
                      }
                      exit; 
                  } 
                  $this->cod_device =  $rsy->fields[0];
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
                  $this->cod_device = $rsy->fields[0];
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
                  $this->cod_device = $rsy->fields[0];
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
                  $this->cod_device = $rsy->fields[0];
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
                  $this->cod_device = $rsy->fields[0];
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
                  $this->cod_device = $rsy->fields[0];
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
                  $this->cod_device = $rsy->fields[0];
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
                  $this->cod_device = $rsy->fields[0];
                  $rsy->Close(); 
              } 
              $this->cod_activo = $this->cod_activo_before_qstr;
              $this->cod_grupo = $this->cod_grupo_before_qstr;
              $this->device_name = $this->device_name_before_qstr;
              $this->ult_rfid = $this->ult_rfid_before_qstr;
              $this->dev_ip = $this->dev_ip_before_qstr;
              $this->serialrfid = $this->serialrfid_before_qstr;
              $this->url_1 = $this->url_1_before_qstr;
              $this->url_2 = $this->url_2_before_qstr;
              $this->url_3 = $this->url_3_before_qstr;
              $this->rfid_read = $this->rfid_read_before_qstr;
              $this->url_accion = $this->url_accion_before_qstr;
              $this->url_atraccion = $this->url_atraccion_before_qstr;
              if (in_array(strtolower($this->Ini->nm_tpbanco), $nm_bases_lob_geral))
              { 
                  if (trim($this->foto1 ) != "") 
                  { 
                      $_SESSION['scriptcase']['sc_sql_ult_comando'] = "UpdateBlob(" . $this->Ini->nm_tabela . ",  foto1 , $this->foto1,  \"cod_device = $this->cod_device\")"; 
                      $rs = $this->Db->UpdateBlob($this->Ini->nm_tabela, "foto1", $this->foto1,  "cod_device = $this->cod_device"); 
                      if ($rs === false)  
                      { 
                          $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_inst'], $this->Db->ErrorMsg()); 
                          $this->NM_rollback_db(); 
                          if ($this->NM_ajax_flag)
                          {
                              form_devices_mob_pack_ajax_response();
                          }
                          exit; 
                      }  
                  }  
                  if (trim($this->foto2 ) != "") 
                  { 
                      $_SESSION['scriptcase']['sc_sql_ult_comando'] = "UpdateBlob(" . $this->Ini->nm_tabela . ",  foto2 , $this->foto2,  \"cod_device = $this->cod_device\")"; 
                      $rs = $this->Db->UpdateBlob($this->Ini->nm_tabela, "foto2", $this->foto2,  "cod_device = $this->cod_device"); 
                      if ($rs === false)  
                      { 
                          $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_inst'], $this->Db->ErrorMsg()); 
                          $this->NM_rollback_db(); 
                          if ($this->NM_ajax_flag)
                          {
                              form_devices_mob_pack_ajax_response();
                          }
                          exit; 
                      }  
                  }  
                  if (trim($this->foto3 ) != "") 
                  { 
                      $_SESSION['scriptcase']['sc_sql_ult_comando'] = "UpdateBlob(" . $this->Ini->nm_tabela . ",  foto3 , $this->foto3,  \"cod_device = $this->cod_device\")"; 
                      $rs = $this->Db->UpdateBlob($this->Ini->nm_tabela, "foto3", $this->foto3,  "cod_device = $this->cod_device"); 
                      if ($rs === false)  
                      { 
                          $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_inst'], $this->Db->ErrorMsg()); 
                          $this->NM_rollback_db(); 
                          if ($this->NM_ajax_flag)
                          {
                              form_devices_mob_pack_ajax_response();
                          }
                          exit; 
                      }  
                  }  
              }  
              }

              $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['db_changed'] = true;

              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['total']))
              {
                  unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['total']);
              }

              $this->sc_evento = "insert"; 
              $this->cod_activo = $this->cod_activo_before_qstr;
              $this->cod_grupo = $this->cod_grupo_before_qstr;
              $this->device_name = $this->device_name_before_qstr;
              $this->ult_rfid = $this->ult_rfid_before_qstr;
              $this->dev_ip = $this->dev_ip_before_qstr;
              $this->serialrfid = $this->serialrfid_before_qstr;
              $this->url_1 = $this->url_1_before_qstr;
              $this->url_2 = $this->url_2_before_qstr;
              $this->url_3 = $this->url_3_before_qstr;
              $this->rfid_read = $this->rfid_read_before_qstr;
              $this->url_accion = $this->url_accion_before_qstr;
              $this->url_atraccion = $this->url_atraccion_before_qstr;
              $this->sc_insert_on = true; 
              if (empty($this->sc_erro_insert)) {
                  $this->record_insert_ok = true;
              } 
              $this->NM_gera_log_key("incluir");
              $this->NM_gera_log_new();
              if ('refresh_insert' != $this->nmgp_opcao && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['sc_redir_insert']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['sc_redir_insert'] != "S"))
              {
              $this->nmgp_opcao = "novo"; 
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['run_iframe'] == "R")
              { 
                   $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['return_edit'] = "new";
              } 
              }
              $this->nm_flag_iframe = true;
          } 
          if ($this->lig_edit_lookup)
          {
              $this->lig_edit_lookup_call = true;
          }
      } 
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['decimal_db'] == ",") 
      {
          $this->nm_tira_aspas_decimal();
      }
      if ($this->nmgp_opcao == "excluir") 
      { 
          $this->cod_device = substr($this->Db->qstr($this->cod_device), 1, -1); 

          $bDelecaoOk = true;
          $sMsgErro   = '';

          if ($bDelecaoOk)
          {

          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where cod_device = $this->cod_device"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where cod_device = $this->cod_device "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where cod_device = $this->cod_device"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where cod_device = $this->cod_device "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where cod_device = $this->cod_device"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where cod_device = $this->cod_device "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where cod_device = $this->cod_device"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where cod_device = $this->cod_device "); 
          }  
          else  
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where cod_device = $this->cod_device"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where cod_device = $this->cod_device "); 
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
              $this->Erro->mensagem (__FILE__, __LINE__, "critica", $this->Ini->Nm_lang['lang_errm_dele_nfnd']); 
              $this->nmgp_opcao = "nada"; 
              $this->sc_evento = 'delete';
          } 
          else 
          { 
              $rs1->Close(); 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              {
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where cod_device = $this->cod_device "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where cod_device = $this->cod_device "); 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where cod_device = $this->cod_device "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where cod_device = $this->cod_device "); 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              {
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where cod_device = $this->cod_device "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where cod_device = $this->cod_device "); 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where cod_device = $this->cod_device "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where cod_device = $this->cod_device "); 
              }  
              else  
              {
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where cod_device = $this->cod_device "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where cod_device = $this->cod_device "); 
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
                          form_devices_mob_pack_ajax_response();
                          exit; 
                      }
                  } 
              } 
              $this->sc_evento = "delete"; 
              if (empty($this->sc_erro_delete)) {
                  $this->record_delete_ok = true;
              }
              $this->nmgp_opcao = "avanca"; 
              $this->nm_flag_iframe = true;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['reg_start']--; 
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['reg_start'] < 0)
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['reg_start'] = 0; 
              }

              $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['db_changed'] = true;

              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['total']))
              {
                  unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['total']);
              }

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
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['parms'] = "cod_device?#?$this->cod_device?@?"; 
      }
      $this->NM_commit_db(); 
      if ($this->sc_evento != "insert" && $this->sc_evento != "update" && $this->sc_evento != "delete")
      { 
          $this->cod_device = null === $this->cod_device ? null : substr($this->Db->qstr($this->cod_device), 1, -1); 
      } 
      if (isset($this->NM_where_filter))
      {
          $this->NM_where_filter = str_replace("@percent@", "%", $this->NM_where_filter);
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['where_filter'] = trim($this->NM_where_filter);
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['total']))
          {
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['total']);
          }
      }
      $sc_where_filter = '';
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['where_filter_form']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['where_filter_form'])
      {
          $sc_where_filter = $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['where_filter_form'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['where_filter']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['where_filter'] && $sc_where_filter != $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['where_filter'])
      {
          if (empty($sc_where_filter))
          {
              $sc_where_filter = $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['where_filter'];
          }
          else
          {
              $sc_where_filter .= " and (" . $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['where_filter'] . ")";
          }
      }
//------------ 
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['run_iframe'] == "R")
      {
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['iframe_evento'] == "insert") 
          { 
               $this->nmgp_opcao = "novo"; 
               $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['select'] = "";
          } 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['iframe_evento'] = $this->sc_evento; 
      } 
      if (!isset($this->nmgp_opcao) || empty($this->nmgp_opcao)) 
      { 
          if (empty($this->cod_device)) 
          { 
              $this->nmgp_opcao = "inicio"; 
          } 
          else 
          { 
              $this->nmgp_opcao = "igual"; 
          } 
      } 
      if (isset($_POST['master_nav']) && 'on' == $_POST['master_nav']) 
      { 
          $this->nmgp_opcao = "inicio";
      } 
      if ($this->nmgp_opcao != "nada" && (trim($this->cod_device) == "")) 
      { 
          if ($this->nmgp_opcao == "avanca")  
          { 
              $this->nmgp_opcao = "final"; 
          } 
          elseif ($this->nmgp_opcao != "novo")
          { 
              $this->nmgp_opcao = "inicio"; 
          } 
      } 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
      { 
          $GLOBALS["NM_ERRO_IBASE"] = 1;  
      } 
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['run_iframe'] == "F" && $this->sc_evento == "insert")
      {
          $this->nmgp_opcao = "final";
      }
      $sc_where = trim("");
      if (substr(strtolower($sc_where), 0, 5) == "where")
      {
          $sc_where  = substr($sc_where , 5);
      }
      if (!empty($sc_where))
      {
          $sc_where = " where " . $sc_where . " ";
      }
      if ('' != $sc_where_filter)
      {
          $sc_where = ('' != $sc_where) ? $sc_where . ' and (' . $sc_where_filter . ')' : ' where ' . $sc_where_filter;
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['total']))
      { 
          $nmgp_select = "SELECT count(*) AS countTest from " . $this->Ini->nm_tabela . $sc_where; 
          $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
          $rt = $this->Db->Execute($nmgp_select) ; 
          if ($rt === false && !$rt->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
              exit ; 
          }  
          $qt_geral_reg_form_devices_mob = isset($rt->fields[0]) ? $rt->fields[0] - 1 : 0; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['total'] = $qt_geral_reg_form_devices_mob;
          $rt->Close(); 
          if ($this->nmgp_opcao == "igual" && isset($this->NM_btn_navega) && 'S' == $this->NM_btn_navega && !empty($this->cod_device))
          {
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              {
                  $Key_Where = "cod_device < $this->cod_device "; 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
                  $Key_Where = "cod_device < $this->cod_device "; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              {
                  $Key_Where = "cod_device < $this->cod_device "; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $Key_Where = "cod_device < $this->cod_device "; 
              }
              else  
              {
                  $Key_Where = "cod_device < $this->cod_device "; 
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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['reg_start'] = $rt->fields[0];
              $rt->Close(); 
          }
      } 
      else 
      { 
          $qt_geral_reg_form_devices_mob = $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['total'];
      } 
      if ($this->nmgp_opcao == "inicio") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['reg_start'] = 0; 
      } 
      if ($this->nmgp_opcao == "avanca")  
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['reg_start']++; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['reg_start'] > $qt_geral_reg_form_devices_mob)
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['reg_start'] = $qt_geral_reg_form_devices_mob; 
          }
      } 
      if ($this->nmgp_opcao == "retorna") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['reg_start']--; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['reg_start'] < 0)
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['reg_start'] = 0; 
          }
      } 
      if ($this->nmgp_opcao == "final") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['reg_start'] = $qt_geral_reg_form_devices_mob; 
      } 
      if ($this->nmgp_opcao == "navpage" && ($this->nmgp_ordem - 1) <= $qt_geral_reg_form_devices_mob) 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['reg_start'] = $this->nmgp_ordem - 1; 
      } 
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['reg_start']) || empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['reg_start']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['reg_start'] = 0;
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['reg_qtd'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['reg_start'] + 1;
      $this->NM_ajax_info['navSummary']['reg_ini'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['reg_start'] + 1; 
      $this->NM_ajax_info['navSummary']['reg_qtd'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['reg_qtd']; 
      $this->NM_ajax_info['navSummary']['reg_tot'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['total'] + 1; 
      $this->NM_gera_nav_page(); 
      $this->NM_ajax_info['navPage'] = $this->SC_nav_page; 
      $GLOBALS["NM_ERRO_IBASE"] = 0;  
//---------- 
      if ($this->nmgp_opcao != "novo" && $this->nmgp_opcao != "nada" && $this->nmgp_opcao != "refresh_insert") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['parms'] = ""; 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
          { 
              $GLOBALS["NM_ERRO_IBASE"] = 1;  
          } 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
          { 
              $nmgp_select = "SELECT cod_device, cod_activo, cod_grupo, device_name, activa, estado, ult_rfid, str_replace (convert(char(10),ult_fecha,102), '.', '-') + ' ' + convert(char(8),ult_fecha,20), valor_default, acepta_tiempo, acepta_tokens, dev_ip, tipo_dev, direccion_torno, timeout_rfid, discapacitado, numcaja, empleado, tokens, serialrfid, bidireccion, cod_deviceE, url_1, url_2, url_3, foto1, foto2, foto3, pin_relay1, pin_relay2, rfid_read, rfid_estado, rfid_fecha, url_accion, url_atraccion from " . $this->Ini->nm_tabela ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          { 
              $nmgp_select = "SELECT cod_device, cod_activo, cod_grupo, device_name, activa, estado, ult_rfid, convert(char(23),ult_fecha,121), valor_default, acepta_tiempo, acepta_tokens, dev_ip, tipo_dev, direccion_torno, timeout_rfid, discapacitado, numcaja, empleado, tokens, serialrfid, bidireccion, cod_deviceE, url_1, url_2, url_3, foto1, foto2, foto3, pin_relay1, pin_relay2, rfid_read, rfid_estado, rfid_fecha, url_accion, url_atraccion from " . $this->Ini->nm_tabela ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          { 
              $nmgp_select = "SELECT cod_device, cod_activo, cod_grupo, device_name, activa, estado, ult_rfid, ult_fecha, valor_default, acepta_tiempo, acepta_tokens, dev_ip, tipo_dev, direccion_torno, timeout_rfid, discapacitado, numcaja, empleado, tokens, serialrfid, bidireccion, cod_deviceE, url_1, url_2, url_3, foto1, foto2, foto3, pin_relay1, pin_relay2, rfid_read, rfid_estado, TO_DATE(TO_CHAR(rfid_fecha, 'yyyy-mm-dd hh24:mi:ss'), 'yyyy-mm-dd hh24:mi:ss'), url_accion, url_atraccion from " . $this->Ini->nm_tabela ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          { 
              $nmgp_select = "SELECT cod_device, cod_activo, cod_grupo, device_name, activa, estado, ult_rfid, EXTEND(ult_fecha, YEAR TO FRACTION), valor_default, acepta_tiempo, acepta_tokens, dev_ip, tipo_dev, direccion_torno, timeout_rfid, discapacitado, numcaja, empleado, tokens, serialrfid, bidireccion, cod_deviceE, url_1, url_2, url_3, LOTOFILE(foto1, '" . $this->Ini->root . $this->Ini->path_imag_temp . "/sc_blob_foto1', 'client'), LOTOFILE(foto2, '" . $this->Ini->root . $this->Ini->path_imag_temp . "/sc_blob_foto2', 'client'), LOTOFILE(foto3, '" . $this->Ini->root . $this->Ini->path_imag_temp . "/sc_blob_foto3', 'client'), pin_relay1, pin_relay2, rfid_read, rfid_estado, rfid_fecha, url_accion, url_atraccion from " . $this->Ini->nm_tabela ; 
          } 
          else 
          { 
              $nmgp_select = "SELECT cod_device, cod_activo, cod_grupo, device_name, activa, estado, ult_rfid, ult_fecha, valor_default, acepta_tiempo, acepta_tokens, dev_ip, tipo_dev, direccion_torno, timeout_rfid, discapacitado, numcaja, empleado, tokens, serialrfid, bidireccion, cod_deviceE, url_1, url_2, url_3, foto1, foto2, foto3, pin_relay1, pin_relay2, rfid_read, rfid_estado, rfid_fecha, url_accion, url_atraccion from " . $this->Ini->nm_tabela ; 
          } 
          $aWhere = array();
          $aWhere[] = $sc_where_filter;
          if ($this->nmgp_opcao == "igual" || (($_SESSION['sc_session'][$this->Ini->sc_page]['form_adm_clientes']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_adm_clientes']['run_iframe'] == "R") && ($this->sc_evento == "insert" || $this->sc_evento == "update")) )
          { 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              {
                  $aWhere[] = "cod_device = $this->cod_device"; 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
                  $aWhere[] = "cod_device = $this->cod_device"; 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              {
                  $aWhere[] = "cod_device = $this->cod_device"; 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $aWhere[] = "cod_device = $this->cod_device"; 
              }  
              else  
              {
                  $aWhere[] = "cod_device = $this->cod_device"; 
              }  
              if (!empty($sc_where_filter))  
              {
                  $teste_select = $nmgp_select . $this->returnWhere($aWhere);
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = $teste_select; 
                  $rs = $this->Db->Execute($teste_select); 
                  if ($rs->EOF)
                  {
                     $aWhere = array($sc_where_filter);
                  }  
                  $rs->Close(); 
              }  
          } 
          $nmgp_select .= $this->returnWhere($aWhere) . ' ';
          $sc_order_by = "";
          $sc_order_by = "cod_device";
          $sc_order_by = str_replace("order by ", "", $sc_order_by);
          $sc_order_by = str_replace("ORDER BY ", "", trim($sc_order_by));
          if (!empty($sc_order_by))
          {
              $nmgp_select .= " order by $sc_order_by "; 
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['run_iframe'] == "R")
          {
              if ($this->sc_evento == "update")
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['select'] = $nmgp_select;
                  $this->nm_gera_html();
              } 
              elseif (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['select']))
              { 
                  $nmgp_select = $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['select'];
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['select'] = ""; 
              } 
          } 
          if ($this->nmgp_opcao == "igual") 
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
              $rs = $this->Db->Execute($nmgp_select) ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "SelectLimit($nmgp_select, 1, " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['reg_start'] . ")" ; 
              $rs = $this->Db->SelectLimit($nmgp_select, 1, $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['reg_start']) ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "SelectLimit($nmgp_select, 1, " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['reg_start'] . ")" ; 
              $rs = $this->Db->SelectLimit($nmgp_select, 1, $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['reg_start']) ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "SelectLimit($nmgp_select, 1, " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['reg_start'] . ")" ; 
              $rs = $this->Db->SelectLimit($nmgp_select, 1, $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['reg_start']) ; 
          } 
          else  
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
              $rs = $this->Db->Execute($nmgp_select) ; 
              if (!$rs === false && !$rs->EOF) 
              { 
                  $rs->Move($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['reg_start']) ;  
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
          if ($rs->EOF) 
          { 
              if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['where_filter']))
              {
                  $this->nmgp_form_empty        = true;
                  $this->NM_ajax_info['buttonDisplay']['first']   = $this->nmgp_botoes['first']   = "off";
                  $this->NM_ajax_info['buttonDisplay']['back']    = $this->nmgp_botoes['back']    = "off";
                  $this->NM_ajax_info['buttonDisplay']['forward'] = $this->nmgp_botoes['forward'] = "off";
                  $this->NM_ajax_info['buttonDisplay']['last']    = $this->nmgp_botoes['last']    = "off";
                  $this->NM_ajax_info['buttonDisplay']['update']  = $this->nmgp_botoes['update']  = "off";
                  $this->NM_ajax_info['buttonDisplay']['delete']  = $this->nmgp_botoes['delete']  = "off";
                  $this->NM_ajax_info['buttonDisplay']['first']   = $this->nmgp_botoes['insert']  = "off";
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['empty_filter'] = true;
                  return; 
              }
              if ($this->nmgp_botoes['insert'] != "on")
              {
                  $this->nmgp_form_empty        = true;
                  $this->NM_ajax_info['buttonDisplay']['first']   = $this->nmgp_botoes['first']   = "off";
                  $this->NM_ajax_info['buttonDisplay']['back']    = $this->nmgp_botoes['back']    = "off";
                  $this->NM_ajax_info['buttonDisplay']['forward'] = $this->nmgp_botoes['forward'] = "off";
                  $this->NM_ajax_info['buttonDisplay']['last']    = $this->nmgp_botoes['last']    = "off";
              }
              $this->nmgp_opcao = "novo"; 
              $this->nm_flag_saida_novo = "S"; 
              $rs->Close(); 
              if ($this->aba_iframe)
              {
                  $this->NM_ajax_info['buttonDisplay']['exit'] = $this->nmgp_botoes['exit'] = 'off';
              }
          } 
          if ($rs === false && $GLOBALS["NM_ERRO_IBASE"] == 1) 
          { 
              $GLOBALS["NM_ERRO_IBASE"] = 0; 
              $this->Erro->mensagem (__FILE__, __LINE__, "critica", $this->Ini->Nm_lang['lang_errm_nfnd_extr']); 
              $this->nmgp_opcao = "novo"; 
          }  
          if ($this->nmgp_opcao != "novo") 
          { 
              $this->cod_device = $rs->fields[0] ; 
              $this->nmgp_dados_select['cod_device'] = $this->cod_device;
              $this->cod_activo = $rs->fields[1] ; 
              $this->nmgp_dados_select['cod_activo'] = $this->cod_activo;
              $this->cod_grupo = $rs->fields[2] ; 
              $this->nmgp_dados_select['cod_grupo'] = $this->cod_grupo;
              $this->device_name = $rs->fields[3] ; 
              $this->nmgp_dados_select['device_name'] = $this->device_name;
              $this->activa = $rs->fields[4] ; 
              $this->nmgp_dados_select['activa'] = $this->activa;
              $this->estado = $rs->fields[5] ; 
              $this->nmgp_dados_select['estado'] = $this->estado;
              $this->ult_rfid = $rs->fields[6] ; 
              $this->nmgp_dados_select['ult_rfid'] = $this->ult_rfid;
              $this->ult_fecha = $rs->fields[7] ; 
              if (substr($this->ult_fecha, 10, 1) == "-") 
              { 
                 $this->ult_fecha = substr($this->ult_fecha, 0, 10) . " " . substr($this->ult_fecha, 11);
              } 
              if (substr($this->ult_fecha, 13, 1) == ".") 
              { 
                 $this->ult_fecha = substr($this->ult_fecha, 0, 13) . ":" . substr($this->ult_fecha, 14, 2) . ":" . substr($this->ult_fecha, 17);
              } 
              $this->nmgp_dados_select['ult_fecha'] = $this->ult_fecha;
              $this->valor_default = $rs->fields[8] ; 
              $this->nmgp_dados_select['valor_default'] = $this->valor_default;
              $this->acepta_tiempo = $rs->fields[9] ; 
              $this->nmgp_dados_select['acepta_tiempo'] = $this->acepta_tiempo;
              $this->acepta_tokens = $rs->fields[10] ; 
              $this->nmgp_dados_select['acepta_tokens'] = $this->acepta_tokens;
              $this->dev_ip = $rs->fields[11] ; 
              $this->nmgp_dados_select['dev_ip'] = $this->dev_ip;
              $this->tipo_dev = $rs->fields[12] ; 
              $this->nmgp_dados_select['tipo_dev'] = $this->tipo_dev;
              $this->direccion_torno = $rs->fields[13] ; 
              $this->nmgp_dados_select['direccion_torno'] = $this->direccion_torno;
              $this->timeout_rfid = $rs->fields[14] ; 
              $this->nmgp_dados_select['timeout_rfid'] = $this->timeout_rfid;
              $this->discapacitado = $rs->fields[15] ; 
              $this->nmgp_dados_select['discapacitado'] = $this->discapacitado;
              $this->numcaja = $rs->fields[16] ; 
              $this->nmgp_dados_select['numcaja'] = $this->numcaja;
              $this->empleado = $rs->fields[17] ; 
              $this->nmgp_dados_select['empleado'] = $this->empleado;
              $this->tokens = $rs->fields[18] ; 
              $this->nmgp_dados_select['tokens'] = $this->tokens;
              $this->serialrfid = $rs->fields[19] ; 
              $this->nmgp_dados_select['serialrfid'] = $this->serialrfid;
              $this->bidireccion = $rs->fields[20] ; 
              $this->nmgp_dados_select['bidireccion'] = $this->bidireccion;
              $this->cod_devicee = $rs->fields[21] ; 
              $this->nmgp_dados_select['cod_devicee'] = $this->cod_devicee;
              $this->url_1 = $rs->fields[22] ; 
              $this->nmgp_dados_select['url_1'] = $this->url_1;
              $this->url_2 = $rs->fields[23] ; 
              $this->nmgp_dados_select['url_2'] = $this->url_2;
              $this->url_3 = $rs->fields[24] ; 
              $this->nmgp_dados_select['url_3'] = $this->url_3;
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
              { 
                  $this->foto1 = $this->Db->BlobDecode($rs->fields[25]) ; 
              } 
              elseif ($this->Ini->nm_tpbanco == 'pdo_oracle')
              { 
                  $this->foto1 = $this->Db->BlobDecode($rs->fields[25]) ; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              { 
                  if(isset($rs->fields[25]) && !empty($rs->fields[25]) && is_file($rs->fields[25])) 
                  { 
                     $this->foto1 = file_get_contents($rs->fields[25]);
                  }else 
                  { 
                     $this->foto1 = ''; 
                  } 
              } 
              else
              { 
                  $this->foto1 = $rs->fields[25] ; 
              } 
              $this->nmgp_dados_select['foto1'] = $this->foto1;
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
              { 
                  $this->foto2 = $this->Db->BlobDecode($rs->fields[26]) ; 
              } 
              elseif ($this->Ini->nm_tpbanco == 'pdo_oracle')
              { 
                  $this->foto2 = $this->Db->BlobDecode($rs->fields[26]) ; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              { 
                  if(isset($rs->fields[26]) && !empty($rs->fields[26]) && is_file($rs->fields[26])) 
                  { 
                     $this->foto2 = file_get_contents($rs->fields[26]);
                  }else 
                  { 
                     $this->foto2 = ''; 
                  } 
              } 
              else
              { 
                  $this->foto2 = $rs->fields[26] ; 
              } 
              $this->nmgp_dados_select['foto2'] = $this->foto2;
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
              { 
                  $this->foto3 = $this->Db->BlobDecode($rs->fields[27]) ; 
              } 
              elseif ($this->Ini->nm_tpbanco == 'pdo_oracle')
              { 
                  $this->foto3 = $this->Db->BlobDecode($rs->fields[27]) ; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              { 
                  if(isset($rs->fields[27]) && !empty($rs->fields[27]) && is_file($rs->fields[27])) 
                  { 
                     $this->foto3 = file_get_contents($rs->fields[27]);
                  }else 
                  { 
                     $this->foto3 = ''; 
                  } 
              } 
              else
              { 
                  $this->foto3 = $rs->fields[27] ; 
              } 
              $this->nmgp_dados_select['foto3'] = $this->foto3;
              $this->pin_relay1 = $rs->fields[28] ; 
              $this->nmgp_dados_select['pin_relay1'] = $this->pin_relay1;
              $this->pin_relay2 = $rs->fields[29] ; 
              $this->nmgp_dados_select['pin_relay2'] = $this->pin_relay2;
              $this->rfid_read = $rs->fields[30] ; 
              $this->nmgp_dados_select['rfid_read'] = $this->rfid_read;
              $this->rfid_estado = $rs->fields[31] ; 
              $this->nmgp_dados_select['rfid_estado'] = $this->rfid_estado;
              $this->rfid_fecha = $rs->fields[32] ; 
              if (substr($this->rfid_fecha, 10, 1) == "-") 
              { 
                 $this->rfid_fecha = substr($this->rfid_fecha, 0, 10) . " " . substr($this->rfid_fecha, 11);
              } 
              if (substr($this->rfid_fecha, 13, 1) == ".") 
              { 
                 $this->rfid_fecha = substr($this->rfid_fecha, 0, 13) . ":" . substr($this->rfid_fecha, 14, 2) . ":" . substr($this->rfid_fecha, 17);
              } 
              $this->nmgp_dados_select['rfid_fecha'] = $this->rfid_fecha;
              $this->url_accion = $rs->fields[33] ; 
              $this->nmgp_dados_select['url_accion'] = $this->url_accion;
              $this->url_atraccion = $rs->fields[34] ; 
              $this->nmgp_dados_select['url_atraccion'] = $this->url_atraccion;
          $GLOBALS["NM_ERRO_IBASE"] = 0; 
              $this->nm_troca_decimal(",", ".");
              $this->cod_device = (string)$this->cod_device; 
              $this->activa = (string)$this->activa; 
              $this->estado = (string)$this->estado; 
              $this->valor_default = (string)$this->valor_default; 
              $this->acepta_tiempo = (string)$this->acepta_tiempo; 
              $this->acepta_tokens = (string)$this->acepta_tokens; 
              $this->tipo_dev = (string)$this->tipo_dev; 
              $this->direccion_torno = (string)$this->direccion_torno; 
              $this->timeout_rfid = (string)$this->timeout_rfid; 
              $this->discapacitado = (string)$this->discapacitado; 
              $this->numcaja = (string)$this->numcaja; 
              $this->empleado = (string)$this->empleado; 
              $this->tokens = (string)$this->tokens; 
              $this->bidireccion = (string)$this->bidireccion; 
              $this->cod_devicee = (string)$this->cod_devicee; 
              $this->pin_relay1 = (string)$this->pin_relay1; 
              $this->pin_relay2 = (string)$this->pin_relay2; 
              $this->rfid_estado = (string)$this->rfid_estado; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['parms'] = "cod_device?#?$this->cod_device?@?";
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['sub_dir'][0]  = "";
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['sub_dir'][1]  = "";
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['sub_dir'][2]  = "";
          } 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['dados_select'] = $this->nmgp_dados_select;
          if (!$this->NM_ajax_flag || 'backup_line' != $this->NM_ajax_opcao)
          {
              $this->Nav_permite_ret = 0 != $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['reg_start'];
              $this->Nav_permite_ava = $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['reg_start'] < $qt_geral_reg_form_devices_mob;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['opcao']   = '';
          }
      } 
      if ($this->nmgp_opcao == "novo" || $this->nmgp_opcao == "refresh_insert") 
      { 
          $this->sc_evento_old = $this->sc_evento;
          $this->sc_evento = "novo";
          if ('refresh_insert' == $this->nmgp_opcao)
          {
              $this->nmgp_opcao = 'novo';
          }
          else
          {
              $this->nm_formatar_campos();
              $this->cod_device = "";  
              $this->nmgp_dados_form["cod_device"] = $this->cod_device;
              $this->cod_activo = "";  
              $this->nmgp_dados_form["cod_activo"] = $this->cod_activo;
              $this->cod_grupo = "";  
              $this->nmgp_dados_form["cod_grupo"] = $this->cod_grupo;
              $this->device_name = "";  
              $this->nmgp_dados_form["device_name"] = $this->device_name;
              $this->activa = "";  
              $this->nmgp_dados_form["activa"] = $this->activa;
              $this->estado = "";  
              $this->nmgp_dados_form["estado"] = $this->estado;
              $this->ult_rfid = "";  
              $this->nmgp_dados_form["ult_rfid"] = $this->ult_rfid;
              $this->ult_fecha = "";  
              $this->ult_fecha_hora = "" ;  
              $this->nmgp_dados_form["ult_fecha"] = $this->ult_fecha;
              $this->valor_default = "";  
              $this->nmgp_dados_form["valor_default"] = $this->valor_default;
              $this->acepta_tiempo = "";  
              $this->nmgp_dados_form["acepta_tiempo"] = $this->acepta_tiempo;
              $this->acepta_tokens = "";  
              $this->nmgp_dados_form["acepta_tokens"] = $this->acepta_tokens;
              $this->dev_ip = "";  
              $this->nmgp_dados_form["dev_ip"] = $this->dev_ip;
              $this->tipo_dev = "";  
              $this->nmgp_dados_form["tipo_dev"] = $this->tipo_dev;
              $this->direccion_torno = "";  
              $this->nmgp_dados_form["direccion_torno"] = $this->direccion_torno;
              $this->timeout_rfid = "";  
              $this->nmgp_dados_form["timeout_rfid"] = $this->timeout_rfid;
              $this->discapacitado = "";  
              $this->nmgp_dados_form["discapacitado"] = $this->discapacitado;
              $this->numcaja = "";  
              $this->nmgp_dados_form["numcaja"] = $this->numcaja;
              $this->empleado = "";  
              $this->nmgp_dados_form["empleado"] = $this->empleado;
              $this->tokens = "";  
              $this->nmgp_dados_form["tokens"] = $this->tokens;
              $this->serialrfid = "";  
              $this->nmgp_dados_form["serialrfid"] = $this->serialrfid;
              $this->bidireccion = "";  
              $this->nmgp_dados_form["bidireccion"] = $this->bidireccion;
              $this->cod_devicee = "";  
              $this->nmgp_dados_form["cod_devicee"] = $this->cod_devicee;
              $this->url_1 = "";  
              $this->nmgp_dados_form["url_1"] = $this->url_1;
              $this->url_2 = "";  
              $this->nmgp_dados_form["url_2"] = $this->url_2;
              $this->url_3 = "";  
              $this->nmgp_dados_form["url_3"] = $this->url_3;
              $this->foto1 = "";  
              $this->foto1_ul_name = "" ;  
              $this->foto1_ul_type = "" ;  
              $this->nmgp_dados_form["foto1"] = $this->foto1;
              $this->foto2 = "";  
              $this->foto2_ul_name = "" ;  
              $this->foto2_ul_type = "" ;  
              $this->nmgp_dados_form["foto2"] = $this->foto2;
              $this->foto3 = "";  
              $this->foto3_ul_name = "" ;  
              $this->foto3_ul_type = "" ;  
              $this->nmgp_dados_form["foto3"] = $this->foto3;
              $this->pin_relay1 = "";  
              $this->nmgp_dados_form["pin_relay1"] = $this->pin_relay1;
              $this->pin_relay2 = "";  
              $this->nmgp_dados_form["pin_relay2"] = $this->pin_relay2;
              $this->rfid_read = "";  
              $this->nmgp_dados_form["rfid_read"] = $this->rfid_read;
              $this->rfid_estado = "";  
              $this->nmgp_dados_form["rfid_estado"] = $this->rfid_estado;
              $this->rfid_fecha = "";  
              $this->rfid_fecha_hora = "" ;  
              $this->nmgp_dados_form["rfid_fecha"] = $this->rfid_fecha;
              $this->url_accion = "";  
              $this->nmgp_dados_form["url_accion"] = $this->url_accion;
              $this->url_atraccion = "";  
              $this->nmgp_dados_form["url_atraccion"] = $this->url_atraccion;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['dados_form'] = $this->nmgp_dados_form;
              $this->formatado = false;
              if ($this->nmgp_clone != "S")
              {
                  unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['dados_clone']['foto1']);  
                  unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['dados_clone']['foto2']);  
                  unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['dados_clone']['foto3']);  
              }
              if ($this->nmgp_clone == "S" && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['dados_select']))
              {
                  $this->nmgp_dados_select = $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['dados_select'];
                  $this->cod_activo = $this->nmgp_dados_select['cod_activo'];  
                  $this->cod_grupo = $this->nmgp_dados_select['cod_grupo'];  
                  $this->device_name = $this->nmgp_dados_select['device_name'];  
                  $this->activa = $this->nmgp_dados_select['activa'];  
                  $this->estado = $this->nmgp_dados_select['estado'];  
                  $this->ult_rfid = $this->nmgp_dados_select['ult_rfid'];  
                  $this->ult_fecha = $this->nmgp_dados_select['ult_fecha'];  
                  $this->valor_default = $this->nmgp_dados_select['valor_default'];  
                  $this->acepta_tiempo = $this->nmgp_dados_select['acepta_tiempo'];  
                  $this->acepta_tokens = $this->nmgp_dados_select['acepta_tokens'];  
                  $this->dev_ip = $this->nmgp_dados_select['dev_ip'];  
                  $this->tipo_dev = $this->nmgp_dados_select['tipo_dev'];  
                  $this->direccion_torno = $this->nmgp_dados_select['direccion_torno'];  
                  $this->timeout_rfid = $this->nmgp_dados_select['timeout_rfid'];  
                  $this->discapacitado = $this->nmgp_dados_select['discapacitado'];  
                  $this->numcaja = $this->nmgp_dados_select['numcaja'];  
                  $this->empleado = $this->nmgp_dados_select['empleado'];  
                  $this->tokens = $this->nmgp_dados_select['tokens'];  
                  $this->serialrfid = $this->nmgp_dados_select['serialrfid'];  
                  $this->bidireccion = $this->nmgp_dados_select['bidireccion'];  
                  $this->cod_devicee = $this->nmgp_dados_select['cod_devicee'];  
                  $this->url_1 = $this->nmgp_dados_select['url_1'];  
                  $this->url_2 = $this->nmgp_dados_select['url_2'];  
                  $this->url_3 = $this->nmgp_dados_select['url_3'];  
                  $this->foto1 = $this->nmgp_dados_select['foto1'];  
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['dados_clone']['foto1'] = $this->nmgp_dados_select['foto1'];  
                  $this->foto2 = $this->nmgp_dados_select['foto2'];  
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['dados_clone']['foto2'] = $this->nmgp_dados_select['foto2'];  
                  $this->foto3 = $this->nmgp_dados_select['foto3'];  
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['dados_clone']['foto3'] = $this->nmgp_dados_select['foto3'];  
                  $this->pin_relay1 = $this->nmgp_dados_select['pin_relay1'];  
                  $this->pin_relay2 = $this->nmgp_dados_select['pin_relay2'];  
                  $this->rfid_read = $this->nmgp_dados_select['rfid_read'];  
                  $this->rfid_estado = $this->nmgp_dados_select['rfid_estado'];  
                  $this->rfid_fecha = $this->nmgp_dados_select['rfid_fecha'];  
                  $this->url_accion = $this->nmgp_dados_select['url_accion'];  
                  $this->url_atraccion = $this->nmgp_dados_select['url_atraccion'];  
              }
          }
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['foreign_key'] as $sFKName => $sFKValue)
              {
                   if (isset($this->sc_conv_var[$sFKName]))
                   {
                       $sFKName = $this->sc_conv_var[$sFKName];
                   }
                  eval("\$this->" . $sFKName . " = \"" . $sFKValue . "\";");
              }
          }
      }  
//
//
//-- 
      if ($this->nmgp_opcao != "novo") 
      {
      }
      if (!isset($this->nmgp_refresh_fields)) 
      { 
          $this->nm_proc_onload();
      }
  }
// 
//-- 
   function nm_db_retorna($str_where_param = '') 
   {  
     $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
     $str_where_filter = ('' != $str_where_param) ? ' and ' . $str_where_param : '';
     if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(cod_device) from " . $this->Ini->nm_tabela . " where cod_device < $this->cod_device" . $str_where_filter; 
         $rs = $this->Db->Execute("select max(cod_device) from " . $this->Ini->nm_tabela . " where cod_device < $this->cod_device" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(cod_device) from " . $this->Ini->nm_tabela . " where cod_device < $this->cod_device" . $str_where_filter; 
         $rs = $this->Db->Execute("select max(cod_device) from " . $this->Ini->nm_tabela . " where cod_device < $this->cod_device" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(cod_device) from " . $this->Ini->nm_tabela . " where cod_device < $this->cod_device" . $str_where_filter; 
         $rs = $this->Db->Execute("select max(cod_device) from " . $this->Ini->nm_tabela . " where cod_device < $this->cod_device" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(cod_device) from " . $this->Ini->nm_tabela . " where cod_device < $this->cod_device" . $str_where_filter; 
         $rs = $this->Db->Execute("select max(cod_device) from " . $this->Ini->nm_tabela . " where cod_device < $this->cod_device" . $str_where_filter); 
     }  
     else  
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(cod_device) from " . $this->Ini->nm_tabela . " where cod_device < $this->cod_device" . $str_where_filter; 
         $rs = $this->Db->Execute("select max(cod_device) from " . $this->Ini->nm_tabela . " where cod_device < $this->cod_device" . $str_where_filter); 
     }  
     if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
     { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
     }  
     if (isset($rs->fields[0]) && $rs->fields[0] != "") 
     { 
         $this->cod_device = substr($this->Db->qstr($rs->fields[0]), 1, -1); 
         $rs->Close();  
         $this->nmgp_opcao = "igual";  
         return ;  
     } 
     else 
     { 
        $this->nmgp_opcao = "inicio";  
        $rs->Close();  
        return ; 
     } 
   } 
// 
//-- 
   function nm_db_avanca($str_where_param = '') 
   {  
     $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
     $str_where_filter = ('' != $str_where_param) ? ' and ' . $str_where_param : '';
     if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(cod_device) from " . $this->Ini->nm_tabela . " where cod_device > $this->cod_device" . $str_where_filter; 
         $rs = $this->Db->Execute("select min(cod_device) from " . $this->Ini->nm_tabela . " where cod_device > $this->cod_device" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(cod_device) from " . $this->Ini->nm_tabela . " where cod_device > $this->cod_device" . $str_where_filter; 
         $rs = $this->Db->Execute("select min(cod_device) from " . $this->Ini->nm_tabela . " where cod_device > $this->cod_device" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(cod_device) from " . $this->Ini->nm_tabela . " where cod_device > $this->cod_device" . $str_where_filter; 
         $rs = $this->Db->Execute("select min(cod_device) from " . $this->Ini->nm_tabela . " where cod_device > $this->cod_device" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(cod_device) from " . $this->Ini->nm_tabela . " where cod_device > $this->cod_device" . $str_where_filter; 
         $rs = $this->Db->Execute("select min(cod_device) from " . $this->Ini->nm_tabela . " where cod_device > $this->cod_device" . $str_where_filter); 
     }  
     else  
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(cod_device) from " . $this->Ini->nm_tabela . " where cod_device > $this->cod_device" . $str_where_filter; 
         $rs = $this->Db->Execute("select min(cod_device) from " . $this->Ini->nm_tabela . " where cod_device > $this->cod_device" . $str_where_filter); 
     }  
     if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
     { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
     }  
     if (isset($rs->fields[0]) && $rs->fields[0] != "") 
     { 
         $this->cod_device = substr($this->Db->qstr($rs->fields[0]), 1, -1); 
         $rs->Close();  
         $this->nmgp_opcao = "igual";  
         return ;  
     } 
     else 
     { 
        $this->nmgp_opcao = "final";  
        $rs->Close();  
        return ; 
     } 
   } 
// 
//-- 
   function nm_db_inicio($str_where_param = '') 
   {   
     $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
     $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela; 
     $rs = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela);
     if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
     { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
     }  
     if ($rs->fields[0] == 0) 
     { 
         $this->nmgp_opcao = "novo"; 
         $this->nm_flag_saida_novo = "S"; 
         $rs->Close(); 
         if ($this->aba_iframe)
         {
             $this->nmgp_botoes['exit'] = 'off';
         }
         return;
     }
     $str_where_filter = ('' != $str_where_param) ? ' where ' . $str_where_param : '';
     if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(cod_device) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select min(cod_device) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(cod_device) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select min(cod_device) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(cod_device) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select min(cod_device) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(cod_device) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select min(cod_device) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
     }  
     else  
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(cod_device) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select min(cod_device) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
     }  
     if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
     { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
     }  
     if (!isset($rs->fields[0]) || $rs->EOF) 
     { 
         if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['where_filter']))
         { 
             $rs->Close();  
             return ; 
         } 
         $this->nm_flag_saida_novo = "S"; 
         $this->nmgp_opcao = "novo";  
         $rs->Close();  
         if ($this->aba_iframe)
         {
             $this->nmgp_botoes['exit'] = 'off';
         }
         return ; 
     } 
     $this->cod_device = substr($this->Db->qstr($rs->fields[0]), 1, -1); 
     $rs->Close();  
     $this->nmgp_opcao = "igual";  
     return ;  
   } 
// 
//-- 
   function nm_db_final($str_where_param = '') 
   { 
     $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
     $str_where_filter = ('' != $str_where_param) ? ' where ' . $str_where_param : '';
     if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(cod_device) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select max(cod_device) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(cod_device) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select max(cod_device) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(cod_device) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select max(cod_device) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(cod_device) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select max(cod_device) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
     }  
     else  
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(cod_device) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select max(cod_device) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
     }  
     if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
     { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
     }  
     if (!isset($rs->fields[0]) || $rs->EOF) 
     { 
         $this->nm_flag_saida_novo = "S"; 
         $this->nmgp_opcao = "novo";  
         $rs->Close();  
         if ($this->aba_iframe)
         {
             $this->nmgp_botoes['exit'] = 'off';
         }
         return ; 
     } 
     $this->cod_device = substr($this->Db->qstr($rs->fields[0]), 1, -1); 
     $rs->Close();  
     $this->nmgp_opcao = "igual";  
     return ;  
   } 
// 
   function NM_gera_log_key($evt) 
   {
       $this->SC_log_arr = array();
       $this->SC_log_atv = true;
       if ($evt == "incluir")
       {
           $this->SC_log_evt = "insert";
       }
       if ($evt == "alterar")
       {
           $this->SC_log_evt = "update";
       }
       if ($evt == "excluir")
       {
           $this->SC_log_evt = "delete";
       }
       $this->SC_log_arr['keys']['cod_device'] =  $this->cod_device;
   }
// 
   function NM_gera_log_old() 
   {
       if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['dados_select']))
       {
           $nmgp_dados_select = $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['dados_select'];
           $this->SC_log_arr['fields']['cod_activo']['0'] =  $nmgp_dados_select['cod_activo'];
           $this->SC_log_arr['fields']['cod_grupo']['0'] =  $nmgp_dados_select['cod_grupo'];
           $this->SC_log_arr['fields']['device_name']['0'] =  $nmgp_dados_select['device_name'];
           $this->SC_log_arr['fields']['activa']['0'] =  $nmgp_dados_select['activa'];
           $this->SC_log_arr['fields']['estado']['0'] =  $nmgp_dados_select['estado'];
           $this->SC_log_arr['fields']['ult_rfid']['0'] =  $nmgp_dados_select['ult_rfid'];
           $this->SC_log_arr['fields']['ult_fecha']['0'] =  $nmgp_dados_select['ult_fecha'];
           $this->SC_log_arr['fields']['valor_default']['0'] =  $nmgp_dados_select['valor_default'];
           $this->SC_log_arr['fields']['acepta_tiempo']['0'] =  $nmgp_dados_select['acepta_tiempo'];
           $this->SC_log_arr['fields']['acepta_tokens']['0'] =  $nmgp_dados_select['acepta_tokens'];
           $this->SC_log_arr['fields']['dev_ip']['0'] =  $nmgp_dados_select['dev_ip'];
           $this->SC_log_arr['fields']['tipo_dev']['0'] =  $nmgp_dados_select['tipo_dev'];
           $this->SC_log_arr['fields']['direccion_torno']['0'] =  $nmgp_dados_select['direccion_torno'];
           $this->SC_log_arr['fields']['timeout_rfid']['0'] =  $nmgp_dados_select['timeout_rfid'];
           $this->SC_log_arr['fields']['discapacitado']['0'] =  $nmgp_dados_select['discapacitado'];
           $this->SC_log_arr['fields']['numcaja']['0'] =  $nmgp_dados_select['numcaja'];
           $this->SC_log_arr['fields']['empleado']['0'] =  $nmgp_dados_select['empleado'];
           $this->SC_log_arr['fields']['tokens']['0'] =  $nmgp_dados_select['tokens'];
           $this->SC_log_arr['fields']['serialrfid']['0'] =  $nmgp_dados_select['serialrfid'];
           $this->SC_log_arr['fields']['bidireccion']['0'] =  $nmgp_dados_select['bidireccion'];
           $this->SC_log_arr['fields']['cod_deviceE']['0'] =  $nmgp_dados_select['cod_devicee'];
           $this->SC_log_arr['fields']['url_1']['0'] =  $nmgp_dados_select['url_1'];
           $this->SC_log_arr['fields']['url_2']['0'] =  $nmgp_dados_select['url_2'];
           $this->SC_log_arr['fields']['url_3']['0'] =  $nmgp_dados_select['url_3'];
           $this->SC_log_arr['fields']['pin_relay1']['0'] =  $nmgp_dados_select['pin_relay1'];
           $this->SC_log_arr['fields']['pin_relay2']['0'] =  $nmgp_dados_select['pin_relay2'];
           $this->SC_log_arr['fields']['rfid_read']['0'] =  $nmgp_dados_select['rfid_read'];
           $this->SC_log_arr['fields']['rfid_estado']['0'] =  $nmgp_dados_select['rfid_estado'];
           $this->SC_log_arr['fields']['rfid_fecha']['0'] =  $nmgp_dados_select['rfid_fecha'];
           $this->SC_log_arr['fields']['url_accion']['0'] =  $nmgp_dados_select['url_accion'];
           $this->SC_log_arr['fields']['url_atraccion']['0'] =  $nmgp_dados_select['url_atraccion'];
       }
   }
// 
   function NM_gera_log_new() 
   {
       $this->SC_log_arr['fields']['cod_activo']['1'] =  $this->cod_activo;
       $this->SC_log_arr['fields']['cod_grupo']['1'] =  $this->cod_grupo;
       $this->SC_log_arr['fields']['device_name']['1'] =  $this->device_name;
       $this->SC_log_arr['fields']['activa']['1'] =  $this->activa;
       $this->SC_log_arr['fields']['estado']['1'] =  $this->estado;
       $this->SC_log_arr['fields']['ult_rfid']['1'] =  $this->ult_rfid;
       $this->SC_log_arr['fields']['ult_fecha']['1'] =  $this->ult_fecha;
       $this->SC_log_arr['fields']['valor_default']['1'] =  $this->valor_default;
       $this->SC_log_arr['fields']['acepta_tiempo']['1'] =  $this->acepta_tiempo;
       $this->SC_log_arr['fields']['acepta_tokens']['1'] =  $this->acepta_tokens;
       $this->SC_log_arr['fields']['dev_ip']['1'] =  $this->dev_ip;
       $this->SC_log_arr['fields']['tipo_dev']['1'] =  $this->tipo_dev;
       $this->SC_log_arr['fields']['direccion_torno']['1'] =  $this->direccion_torno;
       $this->SC_log_arr['fields']['timeout_rfid']['1'] =  $this->timeout_rfid;
       $this->SC_log_arr['fields']['discapacitado']['1'] =  $this->discapacitado;
       $this->SC_log_arr['fields']['numcaja']['1'] =  $this->numcaja;
       $this->SC_log_arr['fields']['empleado']['1'] =  $this->empleado;
       $this->SC_log_arr['fields']['tokens']['1'] =  $this->tokens;
       $this->SC_log_arr['fields']['serialrfid']['1'] =  $this->serialrfid;
       $this->SC_log_arr['fields']['bidireccion']['1'] =  $this->bidireccion;
       $this->SC_log_arr['fields']['cod_deviceE']['1'] =  $this->cod_devicee;
       $this->SC_log_arr['fields']['url_1']['1'] =  $this->url_1;
       $this->SC_log_arr['fields']['url_2']['1'] =  $this->url_2;
       $this->SC_log_arr['fields']['url_3']['1'] =  $this->url_3;
       $this->SC_log_arr['fields']['pin_relay1']['1'] =  $this->pin_relay1;
       $this->SC_log_arr['fields']['pin_relay2']['1'] =  $this->pin_relay2;
       $this->SC_log_arr['fields']['rfid_read']['1'] =  $this->rfid_read;
       $this->SC_log_arr['fields']['rfid_estado']['1'] =  $this->rfid_estado;
       $this->SC_log_arr['fields']['rfid_fecha']['1'] =  $this->rfid_fecha;
       $this->SC_log_arr['fields']['url_accion']['1'] =  $this->url_accion;
       $this->SC_log_arr['fields']['url_atraccion']['1'] =  $this->url_atraccion;
   }
// 
   function NM_gera_log_compress() 
   {
       foreach ($this->SC_log_arr['fields'] as $fild => $data_f)
       {
           if ($data_f[0] == $data_f[1] || ($data_f[0] == "" && $data_f[1] == "null"))
           {
               unset($this->SC_log_arr['fields'][$fild]);
           }
       }
   }
// 
   function NM_gera_log_output() 
   {
       $Log_output = "";
       $prim_delim = "";
       $Log_labels = array();
       $Log_labels['cod_activo'] =  "Cod Activo";
       $Log_labels['cod_grupo'] =  "Tipo/Grupo";
       $Log_labels['device_name'] =  "Device Name";
       $Log_labels['activa'] =  "Activa";
       $Log_labels['estado'] =  "Estado";
       $Log_labels['ult_rfid'] =  "Ult Rfid";
       $Log_labels['ult_fecha'] =  "Ult Fecha";
       $Log_labels['valor_default'] =  "Valor Default";
       $Log_labels['acepta_tiempo'] =  "Acepta Tiempo";
       $Log_labels['acepta_tokens'] =  "Acepta Tokens";
       $Log_labels['dev_ip'] =  "Dev Ip";
       $Log_labels['tipo_dev'] =  "Tipo Dev";
       $Log_labels['direccion_torno'] =  "Direccion Torno";
       $Log_labels['timeout_rfid'] =  "Timeout Rfid";
       $Log_labels['discapacitado'] =  "Discapacitado";
       $Log_labels['numcaja'] =  "Numcaja";
       $Log_labels['empleado'] =  "Empleado";
       $Log_labels['tokens'] =  "Tokens";
       $Log_labels['serialrfid'] =  "Serialrfid";
       $Log_labels['bidireccion'] =  "Bidireccion";
       $Log_labels['cod_deviceE'] =  "Cod Device E";
       $Log_labels['url_1'] =  "Url 1";
       $Log_labels['url_2'] =  "Url 2";
       $Log_labels['url_3'] =  "Url 3";
       $Log_labels['pin_relay1'] =  "Pin Relay 1";
       $Log_labels['pin_relay2'] =  "Pin Relay 2";
       $Log_labels['rfid_read'] =  "Rfid Read";
       $Log_labels['rfid_estado'] =  "Rfid Estado";
       $Log_labels['rfid_fecha'] =  "Rfid Fecha";
       $Log_labels['url_accion'] =  "Url Accion";
       $Log_labels['url_atraccion'] =  "Url Atraccion";
       foreach ($this->SC_log_arr as $type => $dats)
       {
           if ($type == "keys")
           {
               $Log_output .= "--> keys <-- ";
               foreach ($dats as $key => $data)
               {
                   $Log_output .=  $prim_delim . $key . " : " . $data;
                   $prim_delim  = "||";
               }
           }
           if ($type == "fields")
           {
               $Log_output .= $prim_delim . "--> fields <-- ";
               $prim_delim = "";
               if (empty($dats) && $this->SC_log_evt == "update")
               {
                   return;
               }
               foreach ($dats as $key => $data)
               {
                   foreach ($data as $tp => $val)
                   {
                      $tpok = ($tp == 0) ? " (old) " : " (new) ";
                      $Log_output .= $prim_delim . $key . $tpok . " : " . $val;
                      $prim_delim  = "||";
                   }
                   $Log_output .= $prim_delim . $key . " (label) " . " : " . $Log_labels[$key];
               }
           }
       }
       $this->NM_gera_log_insert("Scriptcase", $this->SC_log_evt, $Log_output);
   }
   function NM_gera_nav_page() 
   {
       $this->SC_nav_page = "";
       $Arr_result        = array();
       $Ind_result        = 0;
       $Reg_Page   = 1;
       $Max_link   = 5;
       $Mid_link   = ceil($Max_link / 2);
       $Corr_link  = (($Max_link % 2) == 0) ? 0 : 1;
       $rec_tot    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['total'] + 1;
       $rec_fim    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['reg_start'] + 1;
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
                $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices']['record_state'] = array();
        }

        function storeRecordState($sc_seq_vert = 0) {
                if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices']['record_state'])) {
                        $this->initializeRecordState();
                }
                if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices']['record_state'][$sc_seq_vert])) {
                        $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices']['record_state'][$sc_seq_vert] = array();
                }

                $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices']['record_state'][$sc_seq_vert]['buttons'] = array(
                        'delete' => $this->nmgp_botoes['delete'],
                        'update' => $this->nmgp_botoes['update']
                );
        }

        function loadRecordState($sc_seq_vert = 0) {
                if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices']['record_state']) || !isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices']['record_state'][$sc_seq_vert])) {
                        return;
                }

                if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices']['record_state'][$sc_seq_vert]['buttons']['delete'])) {
                        $this->nmgp_botoes['delete'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices']['record_state'][$sc_seq_vert]['buttons']['delete'];
                }
                if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices']['record_state'][$sc_seq_vert]['buttons']['update'])) {
                        $this->nmgp_botoes['update'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices']['record_state'][$sc_seq_vert]['buttons']['update'];
                }
        }

//
function cod_grupo_onChange()
{
$_SESSION['scriptcase']['form_devices_mob']['contr_erro'] = 'on';
  
$original_cod_grupo = $this->cod_grupo;
$original_url_atraccion = $this->url_atraccion;
$original_url_accion = $this->url_accion;
$original_url_atraccion = $this->url_atraccion;
$original_url_accion = $this->url_accion;
$original_cod_grupo = $this->cod_grupo;

$sql="select url_atraccion,url_accion from grupos where cod_grupo='$this->cod_grupo'";


 
      $nm_select = $sql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->rs = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                      $this->rs[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->rs = false;
          $this->rs_erro = $this->Db->ErrorMsg();
      } 
;

if (isset($this->rs[0][0]))     
{
    $this->url_atraccion  = $this->rs[0][0];
    $this->url_accion  = $this->rs[0][1];
}



$modificado_cod_grupo = $this->cod_grupo;
$modificado_url_atraccion = $this->url_atraccion;
$modificado_url_accion = $this->url_accion;
$modificado_url_atraccion = $this->url_atraccion;
$modificado_url_accion = $this->url_accion;
$modificado_cod_grupo = $this->cod_grupo;
$this->nm_formatar_campos('cod_grupo', 'url_atraccion', 'url_accion');
if ($original_cod_grupo !== $modificado_cod_grupo || isset($this->nmgp_cmp_readonly['cod_grupo']) || (isset($bFlagRead_cod_grupo) && $bFlagRead_cod_grupo))
{
    $this->ajax_return_values_cod_grupo(true);
}
if ($original_url_atraccion !== $modificado_url_atraccion || isset($this->nmgp_cmp_readonly['url_atraccion']) || (isset($bFlagRead_url_atraccion) && $bFlagRead_url_atraccion))
{
    $this->ajax_return_values_url_atraccion(true);
}
if ($original_url_accion !== $modificado_url_accion || isset($this->nmgp_cmp_readonly['url_accion']) || (isset($bFlagRead_url_accion) && $bFlagRead_url_accion))
{
    $this->ajax_return_values_url_accion(true);
}
if ($original_url_atraccion !== $modificado_url_atraccion || isset($this->nmgp_cmp_readonly['url_atraccion']) || (isset($bFlagRead_url_atraccion) && $bFlagRead_url_atraccion))
{
    $this->ajax_return_values_url_atraccion(true);
}
if ($original_url_accion !== $modificado_url_accion || isset($this->nmgp_cmp_readonly['url_accion']) || (isset($bFlagRead_url_accion) && $bFlagRead_url_accion))
{
    $this->ajax_return_values_url_accion(true);
}
if ($original_cod_grupo !== $modificado_cod_grupo || isset($this->nmgp_cmp_readonly['cod_grupo']) || (isset($bFlagRead_cod_grupo) && $bFlagRead_cod_grupo))
{
    $this->ajax_return_values_cod_grupo(true);
}
$this->NM_ajax_info['event_field'] = 'cod';
form_devices_mob_pack_ajax_response();
exit;
$_SESSION['scriptcase']['form_devices_mob']['contr_erro'] = 'off';
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
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['botoes'] = $this->nmgp_botoes;
     if ($this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form")
     {
         $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['opc_ant'] = $this->nmgp_opcao;
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
     if (($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['run_iframe'] == "R") && $this->nm_flag_iframe && empty($this->nm_todas_criticas))
     {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['run_iframe_ajax']))
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['retorno_edit'] = array("edit", "");
          }
          else
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['retorno_edit'] .= "&nmgp_opcao=edit";
          }
          if ($this->sc_evento == "insert" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['run_iframe'] == "F")
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['run_iframe_ajax']))
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['retorno_edit'] = array("edit", "fim");
              }
              else
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['retorno_edit'] .= "&rec=fim";
              }
          }
          $this->NM_close_db(); 
          $sJsParent = '';
          if ($this->NM_ajax_flag && isset($this->NM_ajax_info['param']['buffer_output']) && $this->NM_ajax_info['param']['buffer_output'])
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['run_iframe_ajax']))
              {
                  $this->NM_ajax_info['ajaxJavascript'][] = array("parent.ajax_navigate", $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['retorno_edit']);
              }
              else
              {
                  $sJsParent .= 'parent';
                  $this->NM_ajax_info['redir']['metodo'] = 'location';
                  $this->NM_ajax_info['redir']['action'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['retorno_edit'];
                  $this->NM_ajax_info['redir']['target'] = $sJsParent;
              }
              form_devices_mob_pack_ajax_response();
              exit;
          }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">

         <html><body>
         <script type="text/javascript">
<?php
    
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['run_iframe_ajax']))
    {
        $opc = ($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['run_iframe'] == "F" && $this->sc_evento == "insert") ? "fim" : "";
        echo "parent.ajax_navigate('edit', '" .$opc . "');";
    }
    else
    {
        echo $sJsParent . "parent.location = '" . $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['retorno_edit'] . "';";
    }
?>
         </script>
         </body></html>
<?php
         exit;
     }
        $this->initFormPages();
    include_once("form_devices_mob_form0.php");
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
        if ('SC_all_Cmp' == $this->nmgp_fast_search && in_array($field, array(""))) {
            $searchOk = true;
        }
        elseif ($field == $this->nmgp_fast_search && in_array($field, array("cod_device", "dev_ip", "cod_grupo", "url_atraccion", "url_accion", "device_name", "activa", "acepta_tokens", "tokens", "pin_relay1", "pin_relay2", "cod_activo"))) {
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
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['table_refresh']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['table_refresh'])
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

   function Form_lookup_cod_grupo()
   {
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['Lookup_cod_grupo']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['Lookup_cod_grupo'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['Lookup_cod_grupo']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['Lookup_cod_grupo'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['Lookup_cod_grupo']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['Lookup_cod_grupo'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['Lookup_cod_grupo']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['Lookup_cod_grupo'] = array(); 
    }

   $old_value_cod_device = $this->cod_device;
   $old_value_tokens = $this->tokens;
   $old_value_pin_relay1 = $this->pin_relay1;
   $old_value_pin_relay2 = $this->pin_relay2;
   $this->nm_tira_formatacao();


   $unformatted_value_cod_device = $this->cod_device;
   $unformatted_value_tokens = $this->tokens;
   $unformatted_value_pin_relay1 = $this->pin_relay1;
   $unformatted_value_pin_relay2 = $this->pin_relay2;

   $nm_comando = "SELECT codgrupo, descrip  FROM grupos  ORDER BY codgrupo";

   $this->cod_device = $old_value_cod_device;
   $this->tokens = $old_value_tokens;
   $this->pin_relay1 = $old_value_pin_relay1;
   $this->pin_relay2 = $old_value_pin_relay2;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $nmgp_def_dados .= $rs->fields[0] . " - " . $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['Lookup_cod_grupo'][] = $rs->fields[0];
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
   function Form_lookup_activa()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "SI?#?1?#?S?@?";
       $nmgp_def_dados .= "NO?#?0?#??@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_acepta_tokens()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "SI?#?1?#??@?";
       $nmgp_def_dados .= "NO?#?0?#?S?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function SC_fast_search($in_fields, $arg_search, $data_search)
   {
      $fields = (strpos($in_fields, "SC_all_Cmp") !== false) ? array("SC_all_Cmp") : explode(";", $in_fields);
      $this->NM_case_insensitive = false;
      if (empty($data_search)) 
      {
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['where_filter']);
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['total']);
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['fast_search']);
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['where_detal']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['where_detal'])) 
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['where_filter'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['where_detal'];
          }
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['empty_filter']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['empty_filter'])
          {
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['empty_filter']);
              $this->NM_ajax_info['empty_filter'] = 'ok';
              form_devices_mob_pack_ajax_response();
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
          if ($field == "cod_device") 
          {
              $this->SC_monta_condicao($comando, "cod_device", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "dev_ip") 
          {
              $this->SC_monta_condicao($comando, "dev_ip", $arg_search, $data_search);
          }
          if ($field == "cod_grupo") 
          {
              $data_lookup = $this->SC_lookup_cod_grupo($arg_search, $data_search);
              if (is_array($data_lookup) && !empty($data_lookup)) 
              {
                  $this->SC_monta_condicao($comando, "cod_grupo", $arg_search, $data_lookup);
              }
          }
          if ($field == "url_atraccion") 
          {
              $this->SC_monta_condicao($comando, "url_atraccion", $arg_search, $data_search);
          }
          if ($field == "url_accion") 
          {
              $this->SC_monta_condicao($comando, "url_accion", $arg_search, $data_search);
          }
          if ($field == "device_name") 
          {
              $this->SC_monta_condicao($comando, "device_name", $arg_search, $data_search);
          }
          if ($field == "activa") 
          {
              $data_lookup = $this->SC_lookup_activa($arg_search, $data_search);
              if (is_array($data_lookup) && !empty($data_lookup)) 
              {
                  $this->SC_monta_condicao($comando, "activa", $arg_search, $data_lookup);
              }
          }
          if ($field == "acepta_tokens") 
          {
              $data_lookup = $this->SC_lookup_acepta_tokens($arg_search, $data_search);
              if (is_array($data_lookup) && !empty($data_lookup)) 
              {
                  $this->SC_monta_condicao($comando, "acepta_tokens", $arg_search, $data_lookup);
              }
          }
          if ($field == "tokens") 
          {
              $this->SC_monta_condicao($comando, "tokens", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "pin_relay1") 
          {
              $this->SC_monta_condicao($comando, "pin_relay1", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "pin_relay2") 
          {
              $this->SC_monta_condicao($comando, "pin_relay2", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "cod_activo") 
          {
              $this->SC_monta_condicao($comando, "cod_activo", $arg_search, $data_search);
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['where_detal']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['where_detal']) && !empty($comando)) 
      {
          $comando = $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['where_detal'] . " and (" .  $comando . ")";
      }
      if (empty($comando)) 
      {
          $comando = " 1 <> 1 "; 
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['where_filter_form']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['where_filter_form'])
      {
          $sc_where = " where " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['where_filter_form'] . " and (" . $comando . ")";
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
      $qt_geral_reg_form_devices_mob = isset($rt->fields[0]) ? $rt->fields[0] - 1 : 0; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['total'] = $qt_geral_reg_form_devices_mob;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['where_filter'] = $comando;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['fast_search'][0] = $field;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['fast_search'][1] = $arg_search;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['fast_search'][2] = $sv_data;
      $rt->Close(); 
      if (isset($rt->fields[0]) && $rt->fields[0] > 0 &&  isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['empty_filter']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['empty_filter'])
      {
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['empty_filter']);
          $this->NM_ajax_info['empty_filter'] = 'ok';
          form_devices_mob_pack_ajax_response();
          exit;
      }
      elseif (!isset($rt->fields[0]) || $rt->fields[0] == 0)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['empty_filter'] = true;
          $this->NM_ajax_info['empty_filter'] = 'ok';
          form_devices_mob_pack_ajax_response();
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
         if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['decimal_db'] == ".")
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
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['SC_sep_date']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['SC_sep_date']))
              {
                  $nm_aspas  = $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['SC_sep_date'];
                  $nm_aspas1 = $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['SC_sep_date1'];
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
   function SC_lookup_cod_grupo($condicao, $campo)
   {
       $result = array();
       $campo_orig = $campo;
       $campo  = substr($this->Db->qstr($campo), 1, -1);
       $nm_comando = "SELECT descrip, codgrupo FROM grupos WHERE (descrip LIKE '%$campo%')" ; 
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
   function SC_lookup_activa($condicao, $campo)
   {
       $data_look = array();
       $campo  = substr($this->Db->qstr($campo), 1, -1);
       $data_look['1'] = "SI";
       $data_look['0'] = "NO";
       $result = array();
       foreach ($data_look as $chave => $label) 
       {
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
          
       }
       return $result;
   }
   function SC_lookup_acepta_tokens($condicao, $campo)
   {
       $data_look = array();
       $campo  = substr($this->Db->qstr($campo), 1, -1);
       $data_look['1'] = "SI";
       $data_look['0'] = "NO";
       $result = array();
       foreach ($data_look as $chave => $label) 
       {
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
          
       }
       return $result;
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
       $nmgp_saida_form = "form_devices_mob_fim.php";
   }
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['redir']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['redir'] == 'redir')
   {
       unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']);
   }
   unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['opc_ant']);
   if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['nm_run_menu']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['nm_run_menu'] == 1)
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['nm_run_menu'] = 2;
       $nmgp_saida_form = "form_devices_mob_fim.php";
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
       form_devices_mob_pack_ajax_response();
       exit;
   }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">

   <HTML>
   <HEAD>
    <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
<?php

   if (isset($_SESSION['scriptcase']['device_mobile']) && $_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile'])
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
   if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['sc_modal'])
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
if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['masterValue']))
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['dashboard_info']['under_dashboard']) {
?>
var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['dashboard_info']['parent_widget']; ?>']");
if (dbParentFrame && dbParentFrame[0] && dbParentFrame[0].contentWindow.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['masterValue'] as $cmp_master => $val_master)
        {
?>
    dbParentFrame[0].contentWindow.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['masterValue']);
?>
}
<?php
    }
    else {
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['masterValue'] as $cmp_master => $val_master)
        {
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['masterValue']);
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
            case "new":
                return array("sc_b_new_t.sc-unique-btn-1", "sc_b_new_t.sc-unique-btn-16");
                break;
            case "insert":
                return array("sc_b_ins_t.sc-unique-btn-2", "sc_b_ins_t.sc-unique-btn-17");
                break;
            case "copy":
                return array("sc_b_clone_t.sc-unique-btn-3", "sc_b_clone_t.sc-unique-btn-18");
                break;
            case "bcancelar":
                return array("sc_b_sai_t.sc-unique-btn-4", "sc_b_sai_t.sc-unique-btn-19");
                break;
            case "update":
                return array("sc_b_upd_t.sc-unique-btn-5", "sc_b_upd_t.sc-unique-btn-20");
                break;
            case "delete":
                return array("sc_b_del_t.sc-unique-btn-6", "sc_b_del_t.sc-unique-btn-21");
                break;
            case "help":
                return array("sc_b_hlp_t");
                break;
            case "exit":
                return array("sc_b_sai_t.sc-unique-btn-7", "sc_b_sai_t.sc-unique-btn-8", "sc_b_sai_t.sc-unique-btn-10", "sc_b_sai_t.sc-unique-btn-22", "sc_b_sai_t.sc-unique-btn-23", "sc_b_sai_t.sc-unique-btn-25", "sc_b_sai_t.sc-unique-btn-9", "sc_b_sai_t.sc-unique-btn-11", "sc_b_sai_t.sc-unique-btn-24", "sc_b_sai_t.sc-unique-btn-26");
                break;
            case "birpara":
                return array("brec_b");
                break;
            case "first":
                return array("sc_b_ini_b.sc-unique-btn-12", "sc_b_ini_b.sc-unique-btn-27");
                break;
            case "back":
                return array("sc_b_ret_b.sc-unique-btn-13", "sc_b_ret_b.sc-unique-btn-28");
                break;
            case "forward":
                return array("sc_b_avc_b.sc-unique-btn-14", "sc_b_avc_b.sc-unique-btn-29");
                break;
            case "last":
                return array("sc_b_fim_b.sc-unique-btn-15", "sc_b_fim_b.sc-unique-btn-30");
                break;
        }

        return array($buttonName);
    } // getButtonIds

    function displayAppHeader()
    {
        if ($this->Embutida_call) {
            return;
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices']['mostra_cab']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices']['mostra_cab'] == "N") {
            return;
        }
        if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['dashboard_info']['under_dashboard'] && $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['dashboard_info']['compact_mode'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['dashboard_info']['maximized']) {
            return;
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['link_info']['compact_mode']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['link_info']['compact_mode']) {
            return;
        }
?>
    <tr><td class="sc-app-header">
        <style>
                .td_corner { width:3px; height:3px; }
        </style>
   <TABLE width="100%" class="scFormHeader" cellpadding="0" cellspacing="0">
    <TR>
     <TD class="td_corner"><img width="3px" height="3px" src="<?php echo $this->ini->path_img_modelo ?>/nm_round_te.gif" border="0px"   alt="" /></TD>
     <TD width="*" bgcolor="#000000"></TD>
     <TD class="td_corner"><img width="3px" height="3px" src="<?php echo $this->ini->path_img_modelo ?>/nm_round_td.gif" border="0px"   alt="" /></TD>
    </TR>
    <TR>
     <TD  bgcolor="#000000"></TD>
     <TD style="padding: 0px">
      <TABLE style="padding: 2px; border-spacing: 1px; border-width: 0px;" width="100%" class="scFormHeader">
       <TR align="center" class="scFormHeaderFont">
        <TD>
         <TABLE style="padding: 0px; border-spacing: 0px; border-width: 0px;" width="100%">
          <TR align="center" valign="middle">
           <TD align="left" rowspan="2">
               
           </TD>
           <TD class="scFormHeaderFont">
               
           </TD>
          </TR>
          <TR align="right" valign="middle">
           <TD class="scFormHeaderFont">
               
           </TD>
          </TR>
         </TABLE>
        </TD>
       </TR>
      </TABLE>
     </TD>
     <TD  bgcolor="#000000"></TD>
    </TR>
    <TR>
     <TD class="td_corner"><img width="3px" height="3px" src="<?php echo $this->ini->path_img_modelo ?>/nm_round_be.gif" border="0px"   alt="" /></TD>
     <TD width="*" bgcolor="#000000"></TD>
     <TD class="td_corner"><img width="3px" height="3px" src="<?php echo $this->ini->path_img_modelo ?>/nm_round_bd.gif" border="0px"   alt="" /></TD>
    </TR>
   </TABLE>
    </td></tr>
<?php
    }

    function displayAppFooter()
    {
    }

    function displayAppToolbars()
    {
        if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['run_iframe'] != "R") {
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
        if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['ordem_cmp'] == $fieldName) {
            $orderColName = $fieldName;
            if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_mob']['ordem_ord'] == " desc") {
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
            case "tokens":
                return true;
            case "pin_relay1":
                return true;
            case "pin_relay2":
                return true;
            case "estado":
                return true;
            case "valor_default":
                return true;
            case "acepta_tiempo":
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
            case "bidireccion":
                return true;
            case "cod_deviceE":
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
            case "acepta_tokens":
                return 'desc';
            case "tokens":
                return 'desc';
            case "pin_relay1":
                return 'desc';
            case "pin_relay2":
                return 'desc';
            case "estado":
                return 'desc';
            case "ult_fecha":
                return 'desc';
            case "valor_default":
                return 'desc';
            case "acepta_tiempo":
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
            case "bidireccion":
                return 'desc';
            case "cod_deviceE":
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
