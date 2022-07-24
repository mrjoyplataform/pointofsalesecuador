<?php
//
class form_matrix_registro_mob_apl
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
   var $idreg;
   var $uniqueidqr;
   var $fecha_registro;
   var $fecha_registro_hora;
   var $estado;
   var $entrada;
   var $jugador;
   var $visitante;
   var $tarjeta;
   var $comida;
   var $idprod;
   var $cantidad;
   var $fecha_entrada;
   var $fecha_entrada_hora;
   var $fecha_registro_entrada;
   var $fecha_registro_entrada_hora;
   var $fecha_salida;
   var $fecha_salida_hora;
   var $fecha_registro_salida;
   var $fecha_registro_salida_hora;
   var $fecha_entrega;
   var $fecha_entrega_hora;
   var $minutos;
   var $tokens;
   var $rfid;
   var $nombre;
   var $apellido;
   var $nickname;
   var $birth_date;
   var $genre;
   var $idcliente;
   var $parent;
   var $points1;
   var $points2;
   var $points3;
   var $ultfecha;
   var $ultfecha_hora;
   var $ult_iddevice;
   var $rentado;
   var $idcenter;
   var $phone;
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
          if (isset($this->NM_ajax_info['param']['apellido']))
          {
              $this->apellido = $this->NM_ajax_info['param']['apellido'];
          }
          if (isset($this->NM_ajax_info['param']['birth_date']))
          {
              $this->birth_date = $this->NM_ajax_info['param']['birth_date'];
          }
          if (isset($this->NM_ajax_info['param']['estado']))
          {
              $this->estado = $this->NM_ajax_info['param']['estado'];
          }
          if (isset($this->NM_ajax_info['param']['fecha_registro']))
          {
              $this->fecha_registro = $this->NM_ajax_info['param']['fecha_registro'];
          }
          if (isset($this->NM_ajax_info['param']['genre']))
          {
              $this->genre = $this->NM_ajax_info['param']['genre'];
          }
          if (isset($this->NM_ajax_info['param']['idreg']))
          {
              $this->idreg = $this->NM_ajax_info['param']['idreg'];
          }
          if (isset($this->NM_ajax_info['param']['nickname']))
          {
              $this->nickname = $this->NM_ajax_info['param']['nickname'];
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
          if (isset($this->NM_ajax_info['param']['nombre']))
          {
              $this->nombre = $this->NM_ajax_info['param']['nombre'];
          }
          if (isset($this->NM_ajax_info['param']['rfid']))
          {
              $this->rfid = $this->NM_ajax_info['param']['rfid'];
          }
          if (isset($this->NM_ajax_info['param']['script_case_init']))
          {
              $this->script_case_init = $this->NM_ajax_info['param']['script_case_init'];
          }
          if (isset($this->NM_ajax_info['param']['uniqueidqr']))
          {
              $this->uniqueidqr = $this->NM_ajax_info['param']['uniqueidqr'];
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
          $_SESSION['sc_session'][$script_case_init]['form_matrix_registro_mob']['opcao']   = "novo";
          $_SESSION['sc_session'][$script_case_init]['form_matrix_registro_mob']['opc_ant'] = "inicio";
      }
      if (isset($_SESSION['sc_session'][$script_case_init]['form_matrix_registro_mob']['embutida_parms']))
      { 
          $this->nmgp_parms = $_SESSION['sc_session'][$script_case_init]['form_matrix_registro_mob']['embutida_parms'];
          unset($_SESSION['sc_session'][$script_case_init]['form_matrix_registro_mob']['embutida_parms']);
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
                 nm_limpa_str_form_matrix_registro_mob($cadapar[1]);
                 if ($cadapar[1] == "@ ") {$cadapar[1] = trim($cadapar[1]); }
                 $Tmp_par = $cadapar[0];
                 $this->$Tmp_par = $cadapar[1];
             }
             $ix++;
          }
          if (isset($this->NM_where_filter_form))
          {
              $_SESSION['sc_session'][$script_case_init]['form_matrix_registro_mob']['where_filter_form'] = $this->NM_where_filter_form;
              unset($_SESSION['sc_session'][$script_case_init]['form_matrix_registro_mob']['total']);
          }
          if (isset($this->sc_redir_atualiz))
          {
              $_SESSION['sc_session'][$script_case_init]['form_matrix_registro_mob']['sc_redir_atualiz'] = $this->sc_redir_atualiz;
          }
          if (isset($this->sc_redir_insert))
          {
              $_SESSION['sc_session'][$script_case_init]['form_matrix_registro_mob']['sc_redir_insert'] = $this->sc_redir_insert;
          }
      } 
      elseif (isset($script_case_init) && !empty($script_case_init) && isset($_SESSION['sc_session'][$script_case_init]['form_matrix_registro_mob']['parms']))
      {
          if ((!isset($this->nmgp_opcao) || ($this->nmgp_opcao != "incluir" && $this->nmgp_opcao != "alterar" && $this->nmgp_opcao != "excluir" && $this->nmgp_opcao != "novo" && $this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form")) && (!isset($this->NM_ajax_opcao) || $this->NM_ajax_opcao == ""))
          {
              $todox = str_replace("?#?@?@?", "?#?@ ?@?", $_SESSION['sc_session'][$script_case_init]['form_matrix_registro_mob']['parms']);
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
          $_SESSION['sc_session'][$script_case_init]['form_matrix_registro_mob']['nm_run_menu'] = 1;
      } 
      if (!$this->NM_ajax_flag && 'autocomp_' == substr($this->NM_ajax_opcao, 0, 9))
      {
          $this->NM_ajax_flag = true;
      }

      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      if (isset($this->nm_evt_ret_edit) && '' != $this->nm_evt_ret_edit)
      {
          $_SESSION['sc_session'][$script_case_init]['form_matrix_registro_mob']['lig_edit_lookup']     = true;
          $_SESSION['sc_session'][$script_case_init]['form_matrix_registro_mob']['lig_edit_lookup_cb']  = $this->nm_evt_ret_edit;
          $_SESSION['sc_session'][$script_case_init]['form_matrix_registro_mob']['lig_edit_lookup_row'] = isset($this->nm_evt_ret_row) ? $this->nm_evt_ret_row : '';
      }
      if (isset($_SESSION['sc_session'][$script_case_init]['form_matrix_registro_mob']['lig_edit_lookup']) && $_SESSION['sc_session'][$script_case_init]['form_matrix_registro_mob']['lig_edit_lookup'])
      {
          $this->lig_edit_lookup     = true;
          $this->lig_edit_lookup_cb  = $_SESSION['sc_session'][$script_case_init]['form_matrix_registro_mob']['lig_edit_lookup_cb'];
          $this->lig_edit_lookup_row = $_SESSION['sc_session'][$script_case_init]['form_matrix_registro_mob']['lig_edit_lookup_row'];
      }
      if (!$this->Ini)
      { 
          $this->Ini = new form_matrix_registro_mob_ini(); 
          $this->Ini->init();
          $this->nm_data = new nm_data("es");
          $this->app_is_initializing = $_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['initialize'];
          if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_matrix_registro']))
          {
              foreach ($_SESSION['scriptcase']['sc_apl_conf']['form_matrix_registro'] as $I_conf => $Conf_opt)
              {
                  $_SESSION['scriptcase']['sc_apl_conf']['form_matrix_registro_mob'][$I_conf]  = $Conf_opt;
              }
          }
      } 
      else 
      { 
         $this->nm_data = new nm_data("es");
      } 
      $_SESSION['sc_session'][$script_case_init]['form_matrix_registro_mob']['upload_field_info'] = array();

      unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['masterValue']);
      $this->Change_Menu = false;
      $run_iframe = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['run_iframe']) && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['run_iframe'] == "R")) ? true : false;
      if (!$run_iframe && isset($_SESSION['scriptcase']['menu_atual']) && !$_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['embutida_call'] && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['sc_outra_jan']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['sc_outra_jan']))
      {
          $this->sc_init_menu = "x";
          if (isset($_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init']['form_matrix_registro_mob']))
          {
              $this->sc_init_menu = $_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init']['form_matrix_registro_mob'];
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
          if ($this->Ini->sc_page == $this->sc_init_menu && !isset($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['form_matrix_registro_mob']))
          {
               $_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['form_matrix_registro_mob']['link'] = $this->Ini->sc_protocolo . $this->Ini->server . $this->Ini->path_link . "" . SC_dir_app_name('form_matrix_registro_mob') . "/";
               $_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['form_matrix_registro_mob']['label'] = "" . $this->Ini->Nm_lang['lang_othr_frmu_title'] . " matrix";
               $this->Change_Menu = true;
          }
          elseif ($this->Ini->sc_page == $this->sc_init_menu)
          {
              $achou = false;
              foreach ($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu] as $apl => $parms)
              {
                  if ($apl == "form_matrix_registro_mob")
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



      $_SESSION['scriptcase']['error_icon']['form_matrix_registro_mob']  = "<img src=\"" . $this->Ini->path_icones . "/scriptcase__NM__btn__NM__scriptcase9_Rhino__NM__nm_scriptcase9_Rhino_error.png\" style=\"border-width: 0px\" align=\"top\">&nbsp;";
      $_SESSION['scriptcase']['error_close']['form_matrix_registro_mob'] = "<td>" . nmButtonOutput($this->arr_buttons, "berrm_clse", "document.getElementById('id_error_display_fixed').style.display = 'none'; document.getElementById('id_error_message_fixed').innerHTML = ''; return false", "document.getElementById('id_error_display_fixed').style.display = 'none'; document.getElementById('id_error_message_fixed').innerHTML = ''; return false", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "") . "</td>";

      $this->Embutida_proc = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['embutida_proc']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['embutida_proc'] : $this->Embutida_proc;
      $this->Embutida_form = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['embutida_form']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['embutida_form'] : $this->Embutida_form;
      $this->Embutida_call = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['embutida_call']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['embutida_call'] : $this->Embutida_call;

       $_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['table_refresh'] = false;

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['embutida_liga_grid_edit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['embutida_liga_grid_edit'])
      {
          $this->Grid_editavel = ('on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['embutida_liga_grid_edit']) ? true : false;
      }
      if (isset($this->Grid_editavel) && $this->Grid_editavel)
      {
          $this->Embutida_form  = true;
          $this->Embutida_ronly = true;
      }
      $this->Embutida_multi = false;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['embutida_multi']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['embutida_multi'])
      {
          $this->Grid_editavel  = false;
          $this->Embutida_form  = false;
          $this->Embutida_ronly = false;
          $this->Embutida_multi = true;
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['embutida_liga_tp_pag']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['embutida_liga_tp_pag'])
      {
          $this->form_paginacao = $_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['embutida_liga_tp_pag'];
      }

      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['embutida_form']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['embutida_form'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['embutida_form'] = $this->Embutida_form;
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['embutida_liga_grid_edit']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['embutida_liga_grid_edit'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['embutida_liga_grid_edit'] = $this->Grid_editavel ? 'on' : 'off';
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['embutida_liga_grid_edit']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['embutida_liga_grid_edit'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['embutida_liga_grid_edit'] = $this->Embutida_call;
      }

      $this->Ini->cor_grid_par = $this->Ini->cor_grid_impar;
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      $this->nmgp_url_saida  = $nm_url_saida;
      $this->nmgp_form_show  = "on";
      $this->nmgp_form_empty = false;
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_valida.php", "C", "NM_Valida") ; 
      $teste_validade = new NM_Valida ;

      $this->loadFieldConfig();

      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['first_time'])
      {
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_matrix_registro_mob']['insert']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_matrix_registro_mob']['new']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_matrix_registro_mob']['update']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_matrix_registro_mob']['delete']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_matrix_registro_mob']['first']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_matrix_registro_mob']['back']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_matrix_registro_mob']['forward']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_matrix_registro_mob']['last']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_matrix_registro_mob']['qsearch']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_matrix_registro_mob']['dynsearch']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_matrix_registro_mob']['summary']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_matrix_registro_mob']['navpage']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_matrix_registro_mob']['goto']);
      }
      $this->NM_cancel_return_new = (isset($this->NM_cancel_return_new) && $this->NM_cancel_return_new == 1) ? "1" : "";
      $this->NM_cancel_insert_new = ((isset($this->NM_cancel_insert_new) && $this->NM_cancel_insert_new == 1) || $this->NM_cancel_return_new == 1) ? "document.F5.action='" . $nm_url_saida . "';" : "";
      if (isset($this->NM_btn_insert) && '' != $this->NM_btn_insert && (!isset($_SESSION['scriptcase']['sc_apl_conf']['form_matrix_registro_mob']['insert']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['form_matrix_registro_mob']['insert']))
      {
          if ('N' == $this->NM_btn_insert)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_matrix_registro_mob']['insert'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_matrix_registro_mob']['insert'] = 'on';
          }
      }
      if (isset($this->NM_btn_new) && 'N' == $this->NM_btn_new)
      {
          $_SESSION['scriptcase']['sc_apl_conf_lig']['form_matrix_registro_mob']['new'] = 'off';
      }
      if (isset($this->NM_btn_update) && '' != $this->NM_btn_update && (!isset($_SESSION['scriptcase']['sc_apl_conf']['form_matrix_registro_mob']['update']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['form_matrix_registro_mob']['update']))
      {
          if ('N' == $this->NM_btn_update)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_matrix_registro_mob']['update'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_matrix_registro_mob']['update'] = 'on';
          }
      }
      if (isset($this->NM_btn_delete) && '' != $this->NM_btn_delete && (!isset($_SESSION['scriptcase']['sc_apl_conf']['form_matrix_registro_mob']['delete']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['form_matrix_registro_mob']['delete']))
      {
          if ('N' == $this->NM_btn_delete)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_matrix_registro_mob']['delete'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_matrix_registro_mob']['delete'] = 'on';
          }
      }
      if (isset($this->NM_btn_navega) && '' != $this->NM_btn_navega)
      {
          if ('N' == $this->NM_btn_navega)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_matrix_registro_mob']['first']     = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_matrix_registro_mob']['back']      = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_matrix_registro_mob']['forward']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_matrix_registro_mob']['last']      = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_matrix_registro_mob']['qsearch']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_matrix_registro_mob']['dynsearch'] = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_matrix_registro_mob']['summary']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_matrix_registro_mob']['navpage']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_matrix_registro_mob']['goto']      = 'off';
              $this->Nav_permite_ava = false;
              $this->Nav_permite_ret = false;
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_matrix_registro_mob']['first']     = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_matrix_registro_mob']['back']      = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_matrix_registro_mob']['forward']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_matrix_registro_mob']['last']      = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_matrix_registro_mob']['qsearch']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_matrix_registro_mob']['dynsearch'] = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_matrix_registro_mob']['summary']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_matrix_registro_mob']['navpage']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_matrix_registro_mob']['goto']      = 'on';
          }
      }

      $this->nmgp_botoes['cancel'] = "on";
      $this->nmgp_botoes['exit'] = "on";
      $this->nmgp_botoes['qsearch'] = "on";
      $this->nmgp_botoes['new'] = "on";
      $this->nmgp_botoes['insert'] = "on";
      $this->nmgp_botoes['copy'] = "off";
      $this->nmgp_botoes['update'] = "on";
      $this->nmgp_botoes['delete'] = "on";
      $this->nmgp_botoes['first'] = "on";
      $this->nmgp_botoes['back'] = "on";
      $this->nmgp_botoes['forward'] = "on";
      $this->nmgp_botoes['last'] = "on";
      $this->nmgp_botoes['summary'] = "on";
      $this->nmgp_botoes['navpage'] = "on";
      $this->nmgp_botoes['goto'] = "on";
      $this->nmgp_botoes['qtline'] = "on";
      $this->nmgp_botoes['reload'] = "off";
      if (isset($this->NM_btn_cancel) && 'N' == $this->NM_btn_cancel)
      {
          $this->nmgp_botoes['cancel'] = "off";
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['where_orig'] = "";
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['where_pesq']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['where_pesq'] = "";
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['where_pesq_filtro'] = "";
      }
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['where_pesq_filtro'];
      if ($this->NM_ajax_flag && 'event_' == substr($this->NM_ajax_opcao, 0, 6)) {
          $this->nmgp_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['buttonStatus'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['iframe_filtro']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['iframe_filtro'] == "S")
      {
          $this->nmgp_botoes['exit'] = "off";
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_matrix_registro_mob']['btn_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['form_matrix_registro_mob']['btn_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['form_matrix_registro_mob']['btn_display'] as $NM_cada_btn => $NM_cada_opc)
          {
              $this->nmgp_botoes[$NM_cada_btn] = $NM_cada_opc;
          }
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_matrix_registro_mob']['insert']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_matrix_registro_mob']['insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_matrix_registro_mob']['insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_matrix_registro_mob']['insert'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_matrix_registro_mob']['new']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_matrix_registro_mob']['new'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_matrix_registro_mob']['new'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_matrix_registro_mob']['update']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_matrix_registro_mob']['update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_matrix_registro_mob']['update'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_matrix_registro_mob']['delete']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_matrix_registro_mob']['delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_matrix_registro_mob']['delete'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_matrix_registro_mob']['first']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_matrix_registro_mob']['first'] != '')
      {
          $this->nmgp_botoes['first'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_matrix_registro_mob']['first'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_matrix_registro_mob']['back']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_matrix_registro_mob']['back'] != '')
      {
          $this->nmgp_botoes['back'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_matrix_registro_mob']['back'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_matrix_registro_mob']['forward']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_matrix_registro_mob']['forward'] != '')
      {
          $this->nmgp_botoes['forward'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_matrix_registro_mob']['forward'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_matrix_registro_mob']['last']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_matrix_registro_mob']['last'] != '')
      {
          $this->nmgp_botoes['last'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_matrix_registro_mob']['last'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_matrix_registro_mob']['qsearch']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_matrix_registro_mob']['qsearch'] != '')
      {
          $this->nmgp_botoes['qsearch'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_matrix_registro_mob']['qsearch'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_matrix_registro_mob']['dynsearch']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_matrix_registro_mob']['dynsearch'] != '')
      {
          $this->nmgp_botoes['dynsearch'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_matrix_registro_mob']['dynsearch'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_matrix_registro_mob']['summary']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_matrix_registro_mob']['summary'] != '')
      {
          $this->nmgp_botoes['summary'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_matrix_registro_mob']['summary'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_matrix_registro_mob']['navpage']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_matrix_registro_mob']['navpage'] != '')
      {
          $this->nmgp_botoes['navpage'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_matrix_registro_mob']['navpage'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_matrix_registro_mob']['goto']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_matrix_registro_mob']['goto'] != '')
      {
          $this->nmgp_botoes['goto'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_matrix_registro_mob']['goto'];
      }

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['embutida_liga_form_insert']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['embutida_liga_form_insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['embutida_liga_form_insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['embutida_liga_form_insert'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['embutida_liga_form_update']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['embutida_liga_form_update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['embutida_liga_form_update'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['embutida_liga_form_delete']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['embutida_liga_form_delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['embutida_liga_form_delete'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['embutida_liga_form_btn_nav']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['embutida_liga_form_btn_nav'] != '')
      {
          $this->nmgp_botoes['first']   = $_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['back']    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['forward'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['last']    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['embutida_liga_form_btn_nav'];
      }

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['dashboard_info']['under_dashboard'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['dashboard_info']['maximized']) {
          $tmpDashboardApp = $_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['dashboard_info']['dashboard_app'];
          if (isset($_SESSION['scriptcase']['dashboard_toolbar'][$tmpDashboardApp]['form_matrix_registro_mob'])) {
              $tmpDashboardButtons = $_SESSION['scriptcase']['dashboard_toolbar'][$tmpDashboardApp]['form_matrix_registro_mob'];

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

      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_matrix_registro_mob']['insert']) && $_SESSION['scriptcase']['sc_apl_conf']['form_matrix_registro_mob']['insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf']['form_matrix_registro_mob']['insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['scriptcase']['sc_apl_conf']['form_matrix_registro_mob']['insert'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_matrix_registro_mob']['update']) && $_SESSION['scriptcase']['sc_apl_conf']['form_matrix_registro_mob']['update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['scriptcase']['sc_apl_conf']['form_matrix_registro_mob']['update'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_matrix_registro_mob']['delete']) && $_SESSION['scriptcase']['sc_apl_conf']['form_matrix_registro_mob']['delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['scriptcase']['sc_apl_conf']['form_matrix_registro_mob']['delete'];
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_matrix_registro_mob']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['form_matrix_registro_mob']['field_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['form_matrix_registro_mob']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->nmgp_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
              $this->NM_ajax_info['fieldDisplay'][$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_matrix_registro_mob']['field_readonly']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['form_matrix_registro_mob']['field_readonly']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['form_matrix_registro_mob']['field_readonly'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->nmgp_cmp_readonly[$NM_cada_field] = "on";
              $this->NM_ajax_info['readOnly'][$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_matrix_registro_mob']['exit']) && $_SESSION['scriptcase']['sc_apl_conf']['form_matrix_registro_mob']['exit'] != '')
      {
          $_SESSION['scriptcase']['sc_url_saida'][$this->Ini->sc_page]       = $_SESSION['scriptcase']['sc_apl_conf']['form_matrix_registro_mob']['exit'];
          $_SESSION['scriptcase']['sc_force_url_saida'][$this->Ini->sc_page] = true;
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['dados_form']))
      {
          $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['dados_form'];
          if (!isset($this->idreg)){$this->idreg = $this->nmgp_dados_form['idreg'];} 
          if (!isset($this->uniqueidqr)){$this->uniqueidqr = $this->nmgp_dados_form['uniqueidqr'];} 
          if (!isset($this->fecha_registro)){$this->fecha_registro = $this->nmgp_dados_form['fecha_registro'];} 
          if (!isset($this->estado)){$this->estado = $this->nmgp_dados_form['estado'];} 
          if (!isset($this->entrada)){$this->entrada = $this->nmgp_dados_form['entrada'];} 
          if (!isset($this->jugador)){$this->jugador = $this->nmgp_dados_form['jugador'];} 
          if (!isset($this->visitante)){$this->visitante = $this->nmgp_dados_form['visitante'];} 
          if (!isset($this->tarjeta)){$this->tarjeta = $this->nmgp_dados_form['tarjeta'];} 
          if (!isset($this->comida)){$this->comida = $this->nmgp_dados_form['comida'];} 
          if (!isset($this->idprod)){$this->idprod = $this->nmgp_dados_form['idprod'];} 
          if (!isset($this->cantidad)){$this->cantidad = $this->nmgp_dados_form['cantidad'];} 
          if (!isset($this->fecha_entrada)){$this->fecha_entrada = $this->nmgp_dados_form['fecha_entrada'];} 
          if (!isset($this->fecha_registro_entrada)){$this->fecha_registro_entrada = $this->nmgp_dados_form['fecha_registro_entrada'];} 
          if (!isset($this->fecha_salida)){$this->fecha_salida = $this->nmgp_dados_form['fecha_salida'];} 
          if (!isset($this->fecha_registro_salida)){$this->fecha_registro_salida = $this->nmgp_dados_form['fecha_registro_salida'];} 
          if (!isset($this->fecha_entrega)){$this->fecha_entrega = $this->nmgp_dados_form['fecha_entrega'];} 
          if (!isset($this->minutos)){$this->minutos = $this->nmgp_dados_form['minutos'];} 
          if (!isset($this->tokens)){$this->tokens = $this->nmgp_dados_form['tokens'];} 
          if (!isset($this->rfid)){$this->rfid = $this->nmgp_dados_form['rfid'];} 
          if (!isset($this->idcliente)){$this->idcliente = $this->nmgp_dados_form['idcliente'];} 
          if (!isset($this->parent)){$this->parent = $this->nmgp_dados_form['parent'];} 
          if (!isset($this->points1)){$this->points1 = $this->nmgp_dados_form['points1'];} 
          if (!isset($this->points2)){$this->points2 = $this->nmgp_dados_form['points2'];} 
          if (!isset($this->points3)){$this->points3 = $this->nmgp_dados_form['points3'];} 
          if (!isset($this->ultfecha)){$this->ultfecha = $this->nmgp_dados_form['ultfecha'];} 
          if (!isset($this->ult_iddevice)){$this->ult_iddevice = $this->nmgp_dados_form['ult_iddevice'];} 
          if (!isset($this->rentado)){$this->rentado = $this->nmgp_dados_form['rentado'];} 
          if (!isset($this->idcenter)){$this->idcenter = $this->nmgp_dados_form['idcenter'];} 
          if (!isset($this->phone)){$this->phone = $this->nmgp_dados_form['phone'];} 
      }
      $glo_senha_protect = (isset($_SESSION['scriptcase']['glo_senha_protect'])) ? $_SESSION['scriptcase']['glo_senha_protect'] : "S";
      $this->aba_iframe = false;
      if (isset($_SESSION['scriptcase']['sc_aba_iframe']))
      {
          foreach ($_SESSION['scriptcase']['sc_aba_iframe'] as $aba => $apls_aba)
          {
              if (in_array("form_matrix_registro_mob", $apls_aba))
              {
                  $this->aba_iframe = true;
                  break;
              }
          }
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['iframe_menu'] && (!isset($_SESSION['scriptcase']['menu_mobile']) || empty($_SESSION['scriptcase']['menu_mobile'])))
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
      if (isset($_GET['nm_cal_display']))
      {
          if ($this->Embutida_proc)
          { 
              include_once($this->Ini->path_embutida . 'form_matrix_registro/form_matrix_registro_mob_calendar.php');
          }
          else
          { 
              include_once($this->Ini->path_aplicacao . 'form_matrix_registro_mob_calendar.php');
          }
          exit;
      }

      if (is_file($this->Ini->path_aplicacao . 'form_matrix_registro_mob_help.txt'))
      {
          $arr_link_webhelp = file($this->Ini->path_aplicacao . 'form_matrix_registro_mob_help.txt');
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
          require_once($this->Ini->path_embutida . 'form_matrix_registro/form_matrix_registro_mob_erro.class.php');
      }
      else
      { 
          require_once($this->Ini->path_aplicacao . "form_matrix_registro_mob_erro.class.php"); 
      }
      $this->Erro      = new form_matrix_registro_mob_erro();
      $this->Erro->Ini = $this->Ini;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['sc_max_reg']) && strtolower($_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['sc_max_reg']) == "all")
      {
          $this->form_paginacao = "total";
      }
      $this->proc_fast_search = false;
      if ($this->nmgp_opcao == "fast_search")  
      {
          $this->SC_fast_search($this->nmgp_fast_search, $this->nmgp_cond_fast_search, $this->nmgp_arg_fast_search);
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['opcao'] = "inicio";
          $this->nmgp_opcao = "inicio";
          $this->proc_fast_search = true;
      } 
      if ($nm_opc_lookup != "lookup" && $nm_opc_php != "formphp")
      { 
         if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['opcao']))
         { 
             if ($this->idreg != "" || $this->uniqueidqr != "" || $this->fecha_registro != "" || $this->estado != "" || $this->rfid != "")   
             { 
                 $_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['opcao'] = "igual" ;  
             }   
         }   
      } 
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['opcao']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['opcao']) && empty($this->nmgp_refresh_fields))
      {
          $this->nmgp_opcao = $_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['opcao'];  
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['opcao'] = "" ;  
          if ($this->nmgp_opcao == "edit_novo")  
          {
             $this->nmgp_opcao = "novo";
             $this->nm_flag_saida_novo = "S";
          }
      } 
      $this->nm_Start_new = false;
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_matrix_registro_mob']['start']) && $_SESSION['scriptcase']['sc_apl_conf']['form_matrix_registro_mob']['start'] == 'new')
      {
          $this->nmgp_opcao = "novo";
          $this->nm_Start_new = true;
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['opcao'] = "novo";
          unset($_SESSION['scriptcase']['sc_apl_conf']['form_matrix_registro_mob']['start']);
      }
      if ($this->nmgp_opcao == "igual")  
      {
          $this->nmgp_opc_ant = $this->nmgp_opcao;
      } 
      else
      {
          $this->nmgp_opc_ant = $_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['opc_ant'];
      } 
      if ($this->nmgp_opcao == "recarga" || $this->nmgp_opcao == "muda_form")  
      {
          $this->nmgp_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['botoes'];
          $this->Nav_permite_ret = 0 != $_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['inicio'];
          $this->Nav_permite_ava = $_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['total'] != $_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['final'];
      }
      else
      {
      }
      $this->nm_flag_iframe = false;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['dados_form'])) 
      {
         $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['dados_form'];
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
      if (isset($this->nombre)) { $this->nm_limpa_alfa($this->nombre); }
      if (isset($this->apellido)) { $this->nm_limpa_alfa($this->apellido); }
      if (isset($this->nickname)) { $this->nm_limpa_alfa($this->nickname); }
      if (isset($this->genre)) { $this->nm_limpa_alfa($this->genre); }
      $Campos_Crit       = "";
      $Campos_erro       = "";
      $Campos_Falta      = array();
      $Campos_Erros      = array();
      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          =  substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['opc_edit'] = true;  
     if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['dados_select'])) 
     {
        $this->nmgp_dados_select = $_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['dados_select'];
     }
   }

   function loadFieldConfig()
   {
      $this->field_config = array();
      //-- birth_date
      $this->field_config['birth_date']                 = array();
      $this->field_config['birth_date']['date_format']  = $_SESSION['scriptcase']['reg_conf']['date_format'];
      $this->field_config['birth_date']['date_sep']     = $_SESSION['scriptcase']['reg_conf']['date_sep'];
      $this->field_config['birth_date']['date_display'] = "ddmmaaaa";
      $this->new_date_format('DT', 'birth_date');
      //-- idreg
      $this->field_config['idreg']               = array();
      $this->field_config['idreg']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['idreg']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['idreg']['symbol_dec'] = '';
      $this->field_config['idreg']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['idreg']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- uniqueidqr
      $this->field_config['uniqueidqr']               = array();
      $this->field_config['uniqueidqr']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['uniqueidqr']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['uniqueidqr']['symbol_dec'] = '';
      $this->field_config['uniqueidqr']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['uniqueidqr']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- fecha_registro
      $this->field_config['fecha_registro']                 = array();
      $this->field_config['fecha_registro']['date_format']  = $_SESSION['scriptcase']['reg_conf']['date_format'] . ';' . $_SESSION['scriptcase']['reg_conf']['time_format'];
      $this->field_config['fecha_registro']['date_sep']     = $_SESSION['scriptcase']['reg_conf']['date_sep'];
      $this->field_config['fecha_registro']['time_sep']     = $_SESSION['scriptcase']['reg_conf']['time_sep'];
      $this->field_config['fecha_registro']['date_display'] = "ddmmaaaa;hhiiss";
      $this->new_date_format('DH', 'fecha_registro');
      //-- estado
      $this->field_config['estado']               = array();
      $this->field_config['estado']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['estado']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['estado']['symbol_dec'] = '';
      $this->field_config['estado']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['estado']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- entrada
      $this->field_config['entrada']               = array();
      $this->field_config['entrada']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['entrada']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['entrada']['symbol_dec'] = '';
      $this->field_config['entrada']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['entrada']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- jugador
      $this->field_config['jugador']               = array();
      $this->field_config['jugador']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['jugador']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['jugador']['symbol_dec'] = '';
      $this->field_config['jugador']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['jugador']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- visitante
      $this->field_config['visitante']               = array();
      $this->field_config['visitante']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['visitante']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['visitante']['symbol_dec'] = '';
      $this->field_config['visitante']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['visitante']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- tarjeta
      $this->field_config['tarjeta']               = array();
      $this->field_config['tarjeta']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['tarjeta']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['tarjeta']['symbol_dec'] = '';
      $this->field_config['tarjeta']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['tarjeta']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- comida
      $this->field_config['comida']               = array();
      $this->field_config['comida']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['comida']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['comida']['symbol_dec'] = '';
      $this->field_config['comida']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['comida']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- idprod
      $this->field_config['idprod']               = array();
      $this->field_config['idprod']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['idprod']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['idprod']['symbol_dec'] = '';
      $this->field_config['idprod']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['idprod']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- cantidad
      $this->field_config['cantidad']               = array();
      $this->field_config['cantidad']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['cantidad']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['cantidad']['symbol_dec'] = '';
      $this->field_config['cantidad']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['cantidad']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- fecha_entrada
      $this->field_config['fecha_entrada']                 = array();
      $this->field_config['fecha_entrada']['date_format']  = $_SESSION['scriptcase']['reg_conf']['date_format'] . ';' . $_SESSION['scriptcase']['reg_conf']['time_format'];
      $this->field_config['fecha_entrada']['date_sep']     = $_SESSION['scriptcase']['reg_conf']['date_sep'];
      $this->field_config['fecha_entrada']['time_sep']     = $_SESSION['scriptcase']['reg_conf']['time_sep'];
      $this->field_config['fecha_entrada']['date_display'] = "ddmmaaaa;hhiiss";
      $this->new_date_format('DH', 'fecha_entrada');
      //-- fecha_registro_entrada
      $this->field_config['fecha_registro_entrada']                 = array();
      $this->field_config['fecha_registro_entrada']['date_format']  = $_SESSION['scriptcase']['reg_conf']['date_format'] . ';' . $_SESSION['scriptcase']['reg_conf']['time_format'];
      $this->field_config['fecha_registro_entrada']['date_sep']     = $_SESSION['scriptcase']['reg_conf']['date_sep'];
      $this->field_config['fecha_registro_entrada']['time_sep']     = $_SESSION['scriptcase']['reg_conf']['time_sep'];
      $this->field_config['fecha_registro_entrada']['date_display'] = "ddmmaaaa;hhiiss";
      $this->new_date_format('DH', 'fecha_registro_entrada');
      //-- fecha_salida
      $this->field_config['fecha_salida']                 = array();
      $this->field_config['fecha_salida']['date_format']  = $_SESSION['scriptcase']['reg_conf']['date_format'] . ';' . $_SESSION['scriptcase']['reg_conf']['time_format'];
      $this->field_config['fecha_salida']['date_sep']     = $_SESSION['scriptcase']['reg_conf']['date_sep'];
      $this->field_config['fecha_salida']['time_sep']     = $_SESSION['scriptcase']['reg_conf']['time_sep'];
      $this->field_config['fecha_salida']['date_display'] = "ddmmaaaa;hhiiss";
      $this->new_date_format('DH', 'fecha_salida');
      //-- fecha_registro_salida
      $this->field_config['fecha_registro_salida']                 = array();
      $this->field_config['fecha_registro_salida']['date_format']  = $_SESSION['scriptcase']['reg_conf']['date_format'] . ';' . $_SESSION['scriptcase']['reg_conf']['time_format'];
      $this->field_config['fecha_registro_salida']['date_sep']     = $_SESSION['scriptcase']['reg_conf']['date_sep'];
      $this->field_config['fecha_registro_salida']['time_sep']     = $_SESSION['scriptcase']['reg_conf']['time_sep'];
      $this->field_config['fecha_registro_salida']['date_display'] = "ddmmaaaa;hhiiss";
      $this->new_date_format('DH', 'fecha_registro_salida');
      //-- fecha_entrega
      $this->field_config['fecha_entrega']                 = array();
      $this->field_config['fecha_entrega']['date_format']  = $_SESSION['scriptcase']['reg_conf']['date_format'] . ';' . $_SESSION['scriptcase']['reg_conf']['time_format'];
      $this->field_config['fecha_entrega']['date_sep']     = $_SESSION['scriptcase']['reg_conf']['date_sep'];
      $this->field_config['fecha_entrega']['time_sep']     = $_SESSION['scriptcase']['reg_conf']['time_sep'];
      $this->field_config['fecha_entrega']['date_display'] = "ddmmaaaa;hhiiss";
      $this->new_date_format('DH', 'fecha_entrega');
      //-- minutos
      $this->field_config['minutos']               = array();
      $this->field_config['minutos']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['minutos']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['minutos']['symbol_dec'] = '';
      $this->field_config['minutos']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['minutos']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- tokens
      $this->field_config['tokens']               = array();
      $this->field_config['tokens']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['tokens']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['tokens']['symbol_dec'] = '';
      $this->field_config['tokens']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['tokens']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- points1
      $this->field_config['points1']               = array();
      $this->field_config['points1']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['points1']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['points1']['symbol_dec'] = '';
      $this->field_config['points1']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['points1']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- ultfecha
      $this->field_config['ultfecha']                 = array();
      $this->field_config['ultfecha']['date_format']  = $_SESSION['scriptcase']['reg_conf']['date_format'] . ';' . $_SESSION['scriptcase']['reg_conf']['time_format'];
      $this->field_config['ultfecha']['date_sep']     = $_SESSION['scriptcase']['reg_conf']['date_sep'];
      $this->field_config['ultfecha']['time_sep']     = $_SESSION['scriptcase']['reg_conf']['time_sep'];
      $this->field_config['ultfecha']['date_display'] = "ddmmaaaa;hhiiss";
      $this->new_date_format('DH', 'ultfecha');
      //-- ult_iddevice
      $this->field_config['ult_iddevice']               = array();
      $this->field_config['ult_iddevice']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['ult_iddevice']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['ult_iddevice']['symbol_dec'] = '';
      $this->field_config['ult_iddevice']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['ult_iddevice']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- rentado
      $this->field_config['rentado']               = array();
      $this->field_config['rentado']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['rentado']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['rentado']['symbol_dec'] = '';
      $this->field_config['rentado']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['rentado']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
   }

   function controle()
   {
        global $nm_url_saida, $teste_validade, 
               $glo_senha_protect, $nm_apl_dependente, $nm_form_submit, $sc_check_excl, $nm_opc_form_php, $nm_call_php, $nm_opc_lookup;


      $this->ini_controle();

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
          if ('validate_nombre' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'nombre');
          }
          if ('validate_apellido' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'apellido');
          }
          if ('validate_genre' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'genre');
          }
          if ('validate_nickname' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'nickname');
          }
          if ('validate_birth_date' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'birth_date');
          }
          form_matrix_registro_mob_pack_ajax_response();
          exit;
      }
      if (isset($this->sc_inline_call) && 'Y' == $this->sc_inline_call)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['inline_form_seq'] = $this->sc_seq_row;
          $this->nm_tira_formatacao();
          $this->nm_converte_datas();
      }
      if ($this->nmgp_opcao == "recarga" || $this->nmgp_opcao == "recarga_mobile" || $this->nmgp_opcao == "muda_form") 
      {
          $this->nm_tira_formatacao();
          $this->nm_converte_datas();
          $nm_sc_sv_opcao = $this->nmgp_opcao; 
          $this->nmgp_opcao = "nada"; 
          $this->nm_acessa_banco();
          if ($this->NM_ajax_flag)
          {
              $this->ajax_return_values();
              form_matrix_registro_mob_pack_ajax_response();
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
          $this->nombre = sc_strip_script($this->nombre, $_SESSION['scriptcase']['charset']);
          $this->nombre = sc_strip_tags($this->nombre, $_SESSION['scriptcase']['charset']);
          $this->apellido = sc_strip_script($this->apellido, $_SESSION['scriptcase']['charset']);
          $this->apellido = sc_strip_tags($this->apellido, $_SESSION['scriptcase']['charset']);
          $this->nickname = sc_strip_script($this->nickname, $_SESSION['scriptcase']['charset']);
          $this->nickname = sc_strip_tags($this->nickname, $_SESSION['scriptcase']['charset']);
          $this->genre = sc_strip_script($this->genre, $_SESSION['scriptcase']['charset']);
          $this->genre = sc_strip_tags($this->genre, $_SESSION['scriptcase']['charset']);
          $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros) ; 
          $_SESSION['scriptcase']['form_matrix_registro_mob']['contr_erro'] = 'off';
          if ($Campos_Crit != "") 
          {
              $Campos_Crit = $this->Ini->Nm_lang['lang_errm_flds'] . ' ' . $Campos_Crit ; 
          }
          if ($Campos_Crit != "" || !empty($Campos_Falta) || $this->Campos_Mens_erro != "")
          {
              if ($this->NM_ajax_flag)
              {
                  form_matrix_registro_mob_pack_ajax_response();
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
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['recarga'] = $this->nmgp_opcao;
      }
      if ($this->NM_ajax_flag && 'navigate_form' == $this->NM_ajax_opcao)
      {
          $this->ajax_return_values();
          $this->ajax_add_parameters();
          form_matrix_registro_mob_pack_ajax_response();
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
          form_matrix_registro_mob_pack_ajax_response();
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
          $Zip_name = "sc_prt_" . date("YmdHis") . "_" . rand(0, 1000) . "form_matrix_registro_mob.zip";
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
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob'][$path_doc_md5][0] = $Arq_htm;
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob'][$path_doc_md5][1] = $Zip_name;
?>
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE><?php echo strip_tags("" . $this->Ini->Nm_lang['lang_othr_frmu_title'] . " matrix") ?></TITLE>
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
<form name="Fdown" method="get" action="form_matrix_registro_mob_download.php" target="_self" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo $this->form_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="form_matrix_registro_mob"> 
<input type="hidden" name="nm_name_doc" value="<?php echo $path_doc_md5 ?>"> 
</form>
<form name="F0" method=post action="form_matrix_registro_mob.php" target="_self" style="display: none"> 
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
           case 'nombre':
               return "Nombre";
               break;
           case 'apellido':
               return "Apellido";
               break;
           case 'genre':
               return "Genre";
               break;
           case 'nickname':
               return "Nickname";
               break;
           case 'birth_date':
               return "Birth Date";
               break;
           case 'idreg':
               return "Idreg";
               break;
           case 'uniqueidqr':
               return "Uniqueidqr";
               break;
           case 'fecha_registro':
               return "Fecha Registro";
               break;
           case 'estado':
               return "Estado";
               break;
           case 'entrada':
               return "Entrada";
               break;
           case 'jugador':
               return "Jugador";
               break;
           case 'visitante':
               return "Visitante";
               break;
           case 'tarjeta':
               return "Tarjeta";
               break;
           case 'comida':
               return "Comida";
               break;
           case 'idprod':
               return "Idprod";
               break;
           case 'cantidad':
               return "Cantidad";
               break;
           case 'fecha_entrada':
               return "Fecha Entrada";
               break;
           case 'fecha_registro_entrada':
               return "Fecha Registro Entrada";
               break;
           case 'fecha_salida':
               return "Fecha Salida";
               break;
           case 'fecha_registro_salida':
               return "Fecha Registro Salida";
               break;
           case 'fecha_entrega':
               return "Fecha Entrega";
               break;
           case 'minutos':
               return "Minutos";
               break;
           case 'tokens':
               return "Tokens";
               break;
           case 'rfid':
               return "Rfid";
               break;
           case 'idcliente':
               return "Idcliente";
               break;
           case 'parent':
               return "Parent";
               break;
           case 'points1':
               return "Points 1";
               break;
           case 'points2':
               return "Points 2";
               break;
           case 'points3':
               return "Points 3";
               break;
           case 'ultfecha':
               return "Ultfecha";
               break;
           case 'ult_iddevice':
               return "Ult Iddevice";
               break;
           case 'rentado':
               return "Rentado";
               break;
           case 'idcenter':
               return "Idcenter";
               break;
           case 'phone':
               return "Phone";
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
      if ((!is_array($filtro) && ('' == $filtro || 'nombre' == $filtro)) || (is_array($filtro) && in_array('nombre', $filtro)))
        $this->ValidateField_nombre($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'apellido' == $filtro)) || (is_array($filtro) && in_array('apellido', $filtro)))
        $this->ValidateField_apellido($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'genre' == $filtro)) || (is_array($filtro) && in_array('genre', $filtro)))
        $this->ValidateField_genre($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'nickname' == $filtro)) || (is_array($filtro) && in_array('nickname', $filtro)))
        $this->ValidateField_nickname($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'birth_date' == $filtro)) || (is_array($filtro) && in_array('birth_date', $filtro)))
        $this->ValidateField_birth_date($Campos_Crit, $Campos_Falta, $Campos_Erros);
//-- converter datas   
          $this->nm_converte_datas();
//---
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

    function ValidateField_nombre(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->nombre) > 145) 
          { 
              $hasError = true;
              $Campos_Crit .= "Nombre " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 145 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['nombre']))
              {
                  $Campos_Erros['nombre'] = array();
              }
              $Campos_Erros['nombre'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 145 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['nombre']) || !is_array($this->NM_ajax_info['errList']['nombre']))
              {
                  $this->NM_ajax_info['errList']['nombre'] = array();
              }
              $this->NM_ajax_info['errList']['nombre'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 145 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'nombre';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_nombre

    function ValidateField_apellido(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->apellido) > 145) 
          { 
              $hasError = true;
              $Campos_Crit .= "Apellido " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 145 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['apellido']))
              {
                  $Campos_Erros['apellido'] = array();
              }
              $Campos_Erros['apellido'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 145 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['apellido']) || !is_array($this->NM_ajax_info['errList']['apellido']))
              {
                  $this->NM_ajax_info['errList']['apellido'] = array();
              }
              $this->NM_ajax_info['errList']['apellido'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 145 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'apellido';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_apellido

    function ValidateField_genre(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->genre) > 45) 
          { 
              $hasError = true;
              $Campos_Crit .= "Genre " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 45 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['genre']))
              {
                  $Campos_Erros['genre'] = array();
              }
              $Campos_Erros['genre'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 45 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['genre']) || !is_array($this->NM_ajax_info['errList']['genre']))
              {
                  $this->NM_ajax_info['errList']['genre'] = array();
              }
              $this->NM_ajax_info['errList']['genre'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 45 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'genre';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_genre

    function ValidateField_nickname(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->nickname) > 145) 
          { 
              $hasError = true;
              $Campos_Crit .= "Nickname " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 145 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['nickname']))
              {
                  $Campos_Erros['nickname'] = array();
              }
              $Campos_Erros['nickname'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 145 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['nickname']) || !is_array($this->NM_ajax_info['errList']['nickname']))
              {
                  $this->NM_ajax_info['errList']['nickname'] = array();
              }
              $this->NM_ajax_info['errList']['nickname'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 145 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'nickname';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_nickname

    function ValidateField_birth_date(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      nm_limpa_data($this->birth_date, $this->field_config['birth_date']['date_sep']) ; 
      $trab_dt_min = ""; 
      $trab_dt_max = ""; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          $guarda_datahora = $this->field_config['birth_date']['date_format']; 
          if (false !== strpos($guarda_datahora, ';')) $this->field_config['birth_date']['date_format'] = substr($guarda_datahora, 0, strpos($guarda_datahora, ';'));
          $Format_Data = $this->field_config['birth_date']['date_format']; 
          nm_limpa_data($Format_Data, $this->field_config['birth_date']['date_sep']) ; 
          if (trim($this->birth_date) != "")  
          { 
              if ($teste_validade->Data($this->birth_date, $Format_Data, $trab_dt_min, $trab_dt_max) == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Birth Date; " ; 
                  if (!isset($Campos_Erros['birth_date']))
                  {
                      $Campos_Erros['birth_date'] = array();
                  }
                  $Campos_Erros['birth_date'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['birth_date']) || !is_array($this->NM_ajax_info['errList']['birth_date']))
                  {
                      $this->NM_ajax_info['errList']['birth_date'] = array();
                  }
                  $this->NM_ajax_info['errList']['birth_date'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
          $this->field_config['birth_date']['date_format'] = $guarda_datahora; 
       } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'birth_date';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_birth_date

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
    $this->nmgp_dados_form['nombre'] = $this->nombre;
    $this->nmgp_dados_form['apellido'] = $this->apellido;
    $this->nmgp_dados_form['genre'] = $this->genre;
    $this->nmgp_dados_form['nickname'] = $this->nickname;
    $this->nmgp_dados_form['birth_date'] = (strlen(trim($this->birth_date)) > 19) ? str_replace(".", ":", $this->birth_date) : trim($this->birth_date);
    $this->nmgp_dados_form['idreg'] = $this->idreg;
    $this->nmgp_dados_form['uniqueidqr'] = $this->uniqueidqr;
    $this->nmgp_dados_form['fecha_registro'] = $this->fecha_registro;
    $this->nmgp_dados_form['estado'] = $this->estado;
    $this->nmgp_dados_form['entrada'] = $this->entrada;
    $this->nmgp_dados_form['jugador'] = $this->jugador;
    $this->nmgp_dados_form['visitante'] = $this->visitante;
    $this->nmgp_dados_form['tarjeta'] = $this->tarjeta;
    $this->nmgp_dados_form['comida'] = $this->comida;
    $this->nmgp_dados_form['idprod'] = $this->idprod;
    $this->nmgp_dados_form['cantidad'] = $this->cantidad;
    $this->nmgp_dados_form['fecha_entrada'] = $this->fecha_entrada;
    $this->nmgp_dados_form['fecha_registro_entrada'] = $this->fecha_registro_entrada;
    $this->nmgp_dados_form['fecha_salida'] = $this->fecha_salida;
    $this->nmgp_dados_form['fecha_registro_salida'] = $this->fecha_registro_salida;
    $this->nmgp_dados_form['fecha_entrega'] = $this->fecha_entrega;
    $this->nmgp_dados_form['minutos'] = $this->minutos;
    $this->nmgp_dados_form['tokens'] = $this->tokens;
    $this->nmgp_dados_form['rfid'] = $this->rfid;
    $this->nmgp_dados_form['idcliente'] = $this->idcliente;
    $this->nmgp_dados_form['parent'] = $this->parent;
    $this->nmgp_dados_form['points1'] = $this->points1;
    $this->nmgp_dados_form['points2'] = $this->points2;
    $this->nmgp_dados_form['points3'] = $this->points3;
    $this->nmgp_dados_form['ultfecha'] = $this->ultfecha;
    $this->nmgp_dados_form['ult_iddevice'] = $this->ult_iddevice;
    $this->nmgp_dados_form['rentado'] = $this->rentado;
    $this->nmgp_dados_form['idcenter'] = $this->idcenter;
    $this->nmgp_dados_form['phone'] = $this->phone;
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['dados_form'] = $this->nmgp_dados_form;
   }
   function nm_tira_formatacao()
   {
      global $nm_form_submit;
         $this->Before_unformat = array();
         $this->formatado = false;
      $this->Before_unformat['birth_date'] = $this->birth_date;
      nm_limpa_data($this->birth_date, $this->field_config['birth_date']['date_sep']) ; 
      $this->Before_unformat['idreg'] = $this->idreg;
      nm_limpa_numero($this->idreg, $this->field_config['idreg']['symbol_grp']) ; 
      $this->Before_unformat['uniqueidqr'] = $this->uniqueidqr;
      nm_limpa_numero($this->uniqueidqr, $this->field_config['uniqueidqr']['symbol_grp']) ; 
      $this->Before_unformat['fecha_registro'] = $this->fecha_registro;
      $this->Before_unformat['fecha_registro_hora'] = $this->fecha_registro_hora;
      nm_limpa_data($this->fecha_registro, $this->field_config['fecha_registro']['date_sep']) ; 
      nm_limpa_hora($this->fecha_registro_hora, $this->field_config['fecha_registro']['time_sep']) ; 
      $this->Before_unformat['estado'] = $this->estado;
      nm_limpa_numero($this->estado, $this->field_config['estado']['symbol_grp']) ; 
      $this->Before_unformat['entrada'] = $this->entrada;
      nm_limpa_numero($this->entrada, $this->field_config['entrada']['symbol_grp']) ; 
      $this->Before_unformat['jugador'] = $this->jugador;
      nm_limpa_numero($this->jugador, $this->field_config['jugador']['symbol_grp']) ; 
      $this->Before_unformat['visitante'] = $this->visitante;
      nm_limpa_numero($this->visitante, $this->field_config['visitante']['symbol_grp']) ; 
      $this->Before_unformat['tarjeta'] = $this->tarjeta;
      nm_limpa_numero($this->tarjeta, $this->field_config['tarjeta']['symbol_grp']) ; 
      $this->Before_unformat['comida'] = $this->comida;
      nm_limpa_numero($this->comida, $this->field_config['comida']['symbol_grp']) ; 
      $this->Before_unformat['idprod'] = $this->idprod;
      nm_limpa_numero($this->idprod, $this->field_config['idprod']['symbol_grp']) ; 
      $this->Before_unformat['cantidad'] = $this->cantidad;
      nm_limpa_numero($this->cantidad, $this->field_config['cantidad']['symbol_grp']) ; 
      $this->Before_unformat['fecha_entrada'] = $this->fecha_entrada;
      $this->Before_unformat['fecha_entrada_hora'] = $this->fecha_entrada_hora;
      nm_limpa_data($this->fecha_entrada, $this->field_config['fecha_entrada']['date_sep']) ; 
      nm_limpa_hora($this->fecha_entrada_hora, $this->field_config['fecha_entrada']['time_sep']) ; 
      $this->Before_unformat['fecha_registro_entrada'] = $this->fecha_registro_entrada;
      $this->Before_unformat['fecha_registro_entrada_hora'] = $this->fecha_registro_entrada_hora;
      nm_limpa_data($this->fecha_registro_entrada, $this->field_config['fecha_registro_entrada']['date_sep']) ; 
      nm_limpa_hora($this->fecha_registro_entrada_hora, $this->field_config['fecha_registro_entrada']['time_sep']) ; 
      $this->Before_unformat['fecha_salida'] = $this->fecha_salida;
      $this->Before_unformat['fecha_salida_hora'] = $this->fecha_salida_hora;
      nm_limpa_data($this->fecha_salida, $this->field_config['fecha_salida']['date_sep']) ; 
      nm_limpa_hora($this->fecha_salida_hora, $this->field_config['fecha_salida']['time_sep']) ; 
      $this->Before_unformat['fecha_registro_salida'] = $this->fecha_registro_salida;
      $this->Before_unformat['fecha_registro_salida_hora'] = $this->fecha_registro_salida_hora;
      nm_limpa_data($this->fecha_registro_salida, $this->field_config['fecha_registro_salida']['date_sep']) ; 
      nm_limpa_hora($this->fecha_registro_salida_hora, $this->field_config['fecha_registro_salida']['time_sep']) ; 
      $this->Before_unformat['fecha_entrega'] = $this->fecha_entrega;
      $this->Before_unformat['fecha_entrega_hora'] = $this->fecha_entrega_hora;
      nm_limpa_data($this->fecha_entrega, $this->field_config['fecha_entrega']['date_sep']) ; 
      nm_limpa_hora($this->fecha_entrega_hora, $this->field_config['fecha_entrega']['time_sep']) ; 
      $this->Before_unformat['minutos'] = $this->minutos;
      nm_limpa_numero($this->minutos, $this->field_config['minutos']['symbol_grp']) ; 
      $this->Before_unformat['tokens'] = $this->tokens;
      nm_limpa_numero($this->tokens, $this->field_config['tokens']['symbol_grp']) ; 
      $this->Before_unformat['points1'] = $this->points1;
      nm_limpa_numero($this->points1, $this->field_config['points1']['symbol_grp']) ; 
      $this->Before_unformat['ultfecha'] = $this->ultfecha;
      $this->Before_unformat['ultfecha_hora'] = $this->ultfecha_hora;
      nm_limpa_data($this->ultfecha, $this->field_config['ultfecha']['date_sep']) ; 
      nm_limpa_hora($this->ultfecha_hora, $this->field_config['ultfecha']['time_sep']) ; 
      $this->Before_unformat['ult_iddevice'] = $this->ult_iddevice;
      nm_limpa_numero($this->ult_iddevice, $this->field_config['ult_iddevice']['symbol_grp']) ; 
      $this->Before_unformat['rentado'] = $this->rentado;
      nm_limpa_numero($this->rentado, $this->field_config['rentado']['symbol_grp']) ; 
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
      if ($Nome_Campo == "idreg")
      {
          nm_limpa_numero($this->idreg, $this->field_config['idreg']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "uniqueidqr")
      {
          nm_limpa_numero($this->uniqueidqr, $this->field_config['uniqueidqr']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "estado")
      {
          nm_limpa_numero($this->estado, $this->field_config['estado']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "entrada")
      {
          nm_limpa_numero($this->entrada, $this->field_config['entrada']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "jugador")
      {
          nm_limpa_numero($this->jugador, $this->field_config['jugador']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "visitante")
      {
          nm_limpa_numero($this->visitante, $this->field_config['visitante']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "tarjeta")
      {
          nm_limpa_numero($this->tarjeta, $this->field_config['tarjeta']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "comida")
      {
          nm_limpa_numero($this->comida, $this->field_config['comida']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "idprod")
      {
          nm_limpa_numero($this->idprod, $this->field_config['idprod']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "cantidad")
      {
          nm_limpa_numero($this->cantidad, $this->field_config['cantidad']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "minutos")
      {
          nm_limpa_numero($this->minutos, $this->field_config['minutos']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "tokens")
      {
          nm_limpa_numero($this->tokens, $this->field_config['tokens']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "points1")
      {
          nm_limpa_numero($this->points1, $this->field_config['points1']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "ult_iddevice")
      {
          nm_limpa_numero($this->ult_iddevice, $this->field_config['ult_iddevice']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "rentado")
      {
          nm_limpa_numero($this->rentado, $this->field_config['rentado']['symbol_grp']) ; 
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
      if ((!empty($this->birth_date) && 'null' != $this->birth_date) || (!empty($format_fields) && isset($format_fields['birth_date'])))
      {
          nm_volta_data($this->birth_date, $this->field_config['birth_date']['date_format']) ; 
          nmgp_Form_Datas($this->birth_date, $this->field_config['birth_date']['date_format'], $this->field_config['birth_date']['date_sep']) ;  
      }
      elseif ('null' == $this->birth_date || '' == $this->birth_date)
      {
          $this->birth_date = '';
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
//
//-- 
   function nm_converte_datas($use_null = true, $bForce = false)
   {
      $guarda_format_hora = $this->field_config['birth_date']['date_format'];
      if ($this->birth_date != "")  
      { 
          nm_conv_data($this->birth_date, $this->field_config['birth_date']['date_format']) ; 
          $this->birth_date_hora = "00:00:00:000" ; 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
          {
              $this->birth_date_hora = substr($this->birth_date_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->birth_date_hora = substr($this->birth_date_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $this->birth_date_hora = substr($this->birth_date_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $this->birth_date_hora = substr($this->birth_date_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
          {
              $this->birth_date_hora = substr($this->birth_date_hora, 0, -4);
          }
      } 
      if ($this->birth_date == "" && $use_null)  
      { 
          $this->birth_date = "null" ; 
      } 
      $this->field_config['birth_date']['date_format'] = $guarda_format_hora;
   }
//
   function nm_prep_date_change($cmp_date, $format_dt)
   {
       $vl_return  = "";
       if ($cmp_date != 'null') {
           $vl_return .= (strpos($format_dt, "yy") !== false) ? substr($cmp_date,  0, 4) : "";
           $vl_return .= (strpos($format_dt, "mm") !== false) ? substr($cmp_date,  5, 2) : "";
           $vl_return .= (strpos($format_dt, "dd") !== false) ? substr($cmp_date,  8, 2) : "";
           $vl_return .= (strpos($format_dt, "hh") !== false) ? substr($cmp_date, 11, 2) : "";
           $vl_return .= (strpos($format_dt, "ii") !== false) ? substr($cmp_date, 14, 2) : "";
           $vl_return .= (strpos($format_dt, "ss") !== false) ? substr($cmp_date, 17, 2) : "";
       }
       return $vl_return;
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
          $this->ajax_return_values_nombre();
          $this->ajax_return_values_apellido();
          $this->ajax_return_values_genre();
          $this->ajax_return_values_nickname();
          $this->ajax_return_values_birth_date();
          $this->ajax_return_values_idreg();
          $this->ajax_return_values_uniqueidqr();
          $this->ajax_return_values_fecha_registro();
          $this->ajax_return_values_estado();
          $this->ajax_return_values_rfid();
          if ('navigate_form' == $this->NM_ajax_opcao)
          {
              $this->NM_ajax_info['clearUpload']      = 'S';
              $this->NM_ajax_info['navStatus']['ret'] = $this->Nav_permite_ret ? 'S' : 'N';
              $this->NM_ajax_info['navStatus']['ava'] = $this->Nav_permite_ava ? 'S' : 'N';
              $this->NM_ajax_info['fldList']['idreg']['keyVal'] = form_matrix_registro_mob_pack_protect_string($this->nmgp_dados_form['idreg']);
              $this->NM_ajax_info['fldList']['uniqueidqr']['keyVal'] = form_matrix_registro_mob_pack_protect_string($this->nmgp_dados_form['uniqueidqr']);
              $this->NM_ajax_info['fldList']['fecha_registro']['keyVal'] = form_matrix_registro_mob_pack_protect_string($this->nmgp_dados_form['fecha_registro']);
              $this->NM_ajax_info['fldList']['estado']['keyVal'] = form_matrix_registro_mob_pack_protect_string($this->nmgp_dados_form['estado']);
              $this->NM_ajax_info['fldList']['rfid']['keyVal'] = form_matrix_registro_mob_pack_protect_string($this->nmgp_dados_form['rfid']);
          }
   } // ajax_return_values

          //----- nombre
   function ajax_return_values_nombre($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("nombre", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->nombre);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['nombre'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- apellido
   function ajax_return_values_apellido($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("apellido", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->apellido);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['apellido'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- genre
   function ajax_return_values_genre($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("genre", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->genre);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['genre'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- nickname
   function ajax_return_values_nickname($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("nickname", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->nickname);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['nickname'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- birth_date
   function ajax_return_values_birth_date($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("birth_date", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->birth_date);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['birth_date'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- idreg
   function ajax_return_values_idreg($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("idreg", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->idreg);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['idreg'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($sTmpValue),
               'labList' => array($this->form_format_readonly("idreg", $this->form_encode_input($sTmpValue))),
              );
          }
   }

          //----- uniqueidqr
   function ajax_return_values_uniqueidqr($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("uniqueidqr", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->uniqueidqr);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['uniqueidqr'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($sTmpValue),
               'labList' => array($this->form_format_readonly("uniqueidqr", $this->form_encode_input($sTmpValue))),
              );
          }
   }

          //----- fecha_registro
   function ajax_return_values_fecha_registro($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("fecha_registro", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->fecha_registro);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['fecha_registro'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($this->fecha_registro . ' ' . $this->fecha_registro_hora),
               'labList' => array($this->form_format_readonly("fecha_registro", $this->form_encode_input($sTmpValue))),
              );
          }
   }

          //----- estado
   function ajax_return_values_estado($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("estado", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->estado);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['estado'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($sTmpValue),
               'labList' => array($this->form_format_readonly("estado", $this->form_encode_input($sTmpValue))),
              );
          }
   }

          //----- rfid
   function ajax_return_values_rfid($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("rfid", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->rfid);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['rfid'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($this->form_encode_input($sTmpValue)),
               'labList' => array($this->form_format_readonly("rfid", $this->form_encode_input($sTmpValue))),
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
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['upload_dir'][$fieldName]))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['upload_dir'][$fieldName] = array();
            $resDir = @opendir($uploadDir);
            if (!$resDir)
            {
                return $originalName;
            }
            while (false !== ($fileName = @readdir($resDir)))
            {
                if (@is_file($uploadDir . $fileName))
                {
                    $_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['upload_dir'][$fieldName][] = $fileName;
                }
            }
            @closedir($resDir);
        }
        if (!in_array($originalName, $_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['upload_dir'][$fieldName]))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['upload_dir'][$fieldName][] = $originalName;
            return $originalName;
        }
        else
        {
            $newName = $this->fetchFileNextName($originalName, $_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['upload_dir'][$fieldName]);
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['upload_dir'][$fieldName][] = $newName;
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
      $NM_val_form['nombre'] = $this->nombre;
      $NM_val_form['apellido'] = $this->apellido;
      $NM_val_form['genre'] = $this->genre;
      $NM_val_form['nickname'] = $this->nickname;
      $NM_val_form['birth_date'] = $this->birth_date;
      $NM_val_form['idreg'] = $this->idreg;
      $NM_val_form['uniqueidqr'] = $this->uniqueidqr;
      $NM_val_form['fecha_registro'] = $this->fecha_registro;
      $NM_val_form['estado'] = $this->estado;
      $NM_val_form['entrada'] = $this->entrada;
      $NM_val_form['jugador'] = $this->jugador;
      $NM_val_form['visitante'] = $this->visitante;
      $NM_val_form['tarjeta'] = $this->tarjeta;
      $NM_val_form['comida'] = $this->comida;
      $NM_val_form['idprod'] = $this->idprod;
      $NM_val_form['cantidad'] = $this->cantidad;
      $NM_val_form['fecha_entrada'] = $this->fecha_entrada;
      $NM_val_form['fecha_registro_entrada'] = $this->fecha_registro_entrada;
      $NM_val_form['fecha_salida'] = $this->fecha_salida;
      $NM_val_form['fecha_registro_salida'] = $this->fecha_registro_salida;
      $NM_val_form['fecha_entrega'] = $this->fecha_entrega;
      $NM_val_form['minutos'] = $this->minutos;
      $NM_val_form['tokens'] = $this->tokens;
      $NM_val_form['rfid'] = $this->rfid;
      $NM_val_form['idcliente'] = $this->idcliente;
      $NM_val_form['parent'] = $this->parent;
      $NM_val_form['points1'] = $this->points1;
      $NM_val_form['points2'] = $this->points2;
      $NM_val_form['points3'] = $this->points3;
      $NM_val_form['ultfecha'] = $this->ultfecha;
      $NM_val_form['ult_iddevice'] = $this->ult_iddevice;
      $NM_val_form['rentado'] = $this->rentado;
      $NM_val_form['idcenter'] = $this->idcenter;
      $NM_val_form['phone'] = $this->phone;
      if ($this->idreg === "" || is_null($this->idreg))  
      { 
          $this->idreg = 0;
      } 
      if ($this->uniqueidqr === "" || is_null($this->uniqueidqr))  
      { 
          $this->uniqueidqr = 0;
      } 
      if ($this->nmgp_opcao == "alterar")
      {
      }
      if ($this->estado === "" || is_null($this->estado))  
      { 
          $this->estado = 0;
      } 
      if ($this->entrada === "" || is_null($this->entrada))  
      { 
          $this->entrada = 0;
          $this->sc_force_zero[] = 'entrada';
      } 
      if ($this->jugador === "" || is_null($this->jugador))  
      { 
          $this->jugador = 0;
          $this->sc_force_zero[] = 'jugador';
      } 
      if ($this->visitante === "" || is_null($this->visitante))  
      { 
          $this->visitante = 0;
          $this->sc_force_zero[] = 'visitante';
      } 
      if ($this->tarjeta === "" || is_null($this->tarjeta))  
      { 
          $this->tarjeta = 0;
          $this->sc_force_zero[] = 'tarjeta';
      } 
      if ($this->comida === "" || is_null($this->comida))  
      { 
          $this->comida = 0;
          $this->sc_force_zero[] = 'comida';
      } 
      if ($this->idprod === "" || is_null($this->idprod))  
      { 
          $this->idprod = 0;
          $this->sc_force_zero[] = 'idprod';
      } 
      if ($this->nmgp_opcao == "alterar")
      {
      if ($this->cantidad === "" || is_null($this->cantidad))  
      { 
          $this->cantidad = 0;
          $this->sc_force_zero[] = 'cantidad';
      } 
      }
      if ($this->minutos === "" || is_null($this->minutos))  
      { 
          $this->minutos = 0;
          $this->sc_force_zero[] = 'minutos';
      } 
      if ($this->tokens === "" || is_null($this->tokens))  
      { 
          $this->tokens = 0;
          $this->sc_force_zero[] = 'tokens';
      } 
      if ($this->points1 === "" || is_null($this->points1))  
      { 
          $this->points1 = 0;
          $this->sc_force_zero[] = 'points1';
      } 
      if ($this->nmgp_opcao == "alterar")
      {
      }
      if ($this->ult_iddevice === "" || is_null($this->ult_iddevice))  
      { 
          $this->ult_iddevice = 0;
          $this->sc_force_zero[] = 'ult_iddevice';
      } 
      if ($this->rentado === "" || is_null($this->rentado))  
      { 
          $this->rentado = 0;
          $this->sc_force_zero[] = 'rentado';
      } 
      $nm_bases_lob_geral = array_merge($this->Ini->nm_bases_oracle, $this->Ini->nm_bases_ibase, $this->Ini->nm_bases_informix, $this->Ini->nm_bases_mysql, $this->Ini->nm_bases_access, $this->Ini->nm_bases_sqlite, array('pdo_ibm'), array('pdo_sqlsrv'));
      if ($this->nmgp_opcao == "alterar" || $this->nmgp_opcao == "incluir") 
      {
          if ($this->nmgp_opcao == "alterar") 
          {
              if ($this->fecha_registro == "")  
              { 
                  $this->fecha_registro = "null"; 
                  $NM_val_null[] = "fecha_registro";
              } 
              if ($this->fecha_registro == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
              { 
                  $this->fecha_registro = "null"; 
                  $NM_val_null[] = "fecha_registro";
              } 
          }
          if ($this->nmgp_opcao == "alterar") 
          {
          }
          if ($this->fecha_entrada == "")  
          { 
              $this->fecha_entrada = "null"; 
              $NM_val_null[] = "fecha_entrada";
          } 
          if ($this->fecha_registro_entrada == "")  
          { 
              $this->fecha_registro_entrada = "null"; 
              $NM_val_null[] = "fecha_registro_entrada";
          } 
          if ($this->fecha_salida == "")  
          { 
              $this->fecha_salida = "null"; 
              $NM_val_null[] = "fecha_salida";
          } 
          if ($this->fecha_registro_salida == "")  
          { 
              $this->fecha_registro_salida = "null"; 
              $NM_val_null[] = "fecha_registro_salida";
          } 
          if ($this->fecha_entrega == "")  
          { 
              $this->fecha_entrega = "null"; 
              $NM_val_null[] = "fecha_entrega";
          } 
          $this->rfid_before_qstr = $this->rfid;
          $this->rfid = substr($this->Db->qstr($this->rfid), 1, -1); 
          if ($this->rfid == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->rfid = "null"; 
              $NM_val_null[] = "rfid";
          } 
          $this->nombre_before_qstr = $this->nombre;
          $this->nombre = substr($this->Db->qstr($this->nombre), 1, -1); 
          if ($this->nombre == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->nombre = "null"; 
              $NM_val_null[] = "nombre";
          } 
          $this->apellido_before_qstr = $this->apellido;
          $this->apellido = substr($this->Db->qstr($this->apellido), 1, -1); 
          if ($this->apellido == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->apellido = "null"; 
              $NM_val_null[] = "apellido";
          } 
          $this->nickname_before_qstr = $this->nickname;
          $this->nickname = substr($this->Db->qstr($this->nickname), 1, -1); 
          if ($this->nickname == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->nickname = "null"; 
              $NM_val_null[] = "nickname";
          } 
          if ($this->birth_date == "")  
          { 
              $this->birth_date = "null"; 
              $NM_val_null[] = "birth_date";
          } 
          $this->genre_before_qstr = $this->genre;
          $this->genre = substr($this->Db->qstr($this->genre), 1, -1); 
          if ($this->genre == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->genre = "null"; 
              $NM_val_null[] = "genre";
          } 
          $this->idcliente_before_qstr = $this->idcliente;
          $this->idcliente = substr($this->Db->qstr($this->idcliente), 1, -1); 
          if ($this->idcliente == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->idcliente = "null"; 
              $NM_val_null[] = "idcliente";
          } 
          $this->parent_before_qstr = $this->parent;
          $this->parent = substr($this->Db->qstr($this->parent), 1, -1); 
          if ($this->parent == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->parent = "null"; 
              $NM_val_null[] = "parent";
          } 
          $this->points2_before_qstr = $this->points2;
          $this->points2 = substr($this->Db->qstr($this->points2), 1, -1); 
          if ($this->points2 == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->points2 = "null"; 
              $NM_val_null[] = "points2";
          } 
          $this->points3_before_qstr = $this->points3;
          $this->points3 = substr($this->Db->qstr($this->points3), 1, -1); 
          if ($this->points3 == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->points3 = "null"; 
              $NM_val_null[] = "points3";
          } 
          if ($this->nmgp_opcao == "alterar") 
          {
              if ($this->ultfecha == "")  
              { 
                  $this->ultfecha = "null"; 
                  $NM_val_null[] = "ultfecha";
              } 
              if ($this->ultfecha == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
              { 
                  $this->ultfecha = "null"; 
                  $NM_val_null[] = "ultfecha";
              } 
          }
          $this->idcenter_before_qstr = $this->idcenter;
          $this->idcenter = substr($this->Db->qstr($this->idcenter), 1, -1); 
          if ($this->idcenter == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->idcenter = "null"; 
              $NM_val_null[] = "idcenter";
          } 
          $this->phone_before_qstr = $this->phone;
          $this->phone = substr($this->Db->qstr($this->phone), 1, -1); 
          if ($this->phone == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->phone = "null"; 
              $NM_val_null[] = "phone";
          } 
      }
      if ($this->nmgp_opcao == "alterar") 
      {
          $SC_fields_update = array(); 
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['foreign_key'] as $sFKName => $sFKValue)
              {
                   if (isset($this->sc_conv_var[$sFKName]))
                   {
                       $sFKName = $this->sc_conv_var[$sFKName];
                   }
                  eval("\$this->" . $sFKName . " = \"" . $sFKValue . "\";");
              }
          }
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and fecha_registro = '$this->fecha_registro' and estado = $this->estado and rfid = '$this->rfid' ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and fecha_registro = '$this->fecha_registro' and estado = $this->estado and rfid = '$this->rfid' "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and fecha_registro = '$this->fecha_registro' and estado = $this->estado and rfid = '$this->rfid' ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and fecha_registro = '$this->fecha_registro' and estado = $this->estado and rfid = '$this->rfid' "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and TO_DATE(TO_CHAR(fecha_registro, 'yyyy-mm-dd hh24:mi:ss'), 'yyyy-mm-dd hh24:mi:ss') = '$this->fecha_registro' and estado = $this->estado and rfid = '$this->rfid' ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and TO_DATE(TO_CHAR(fecha_registro, 'yyyy-mm-dd hh24:mi:ss'), 'yyyy-mm-dd hh24:mi:ss') = '$this->fecha_registro' and estado = $this->estado and rfid = '$this->rfid' "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and fecha_registro = '$this->fecha_registro' and estado = $this->estado and rfid = '$this->rfid' ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and fecha_registro = '$this->fecha_registro' and estado = $this->estado and rfid = '$this->rfid' "); 
          }  
          else  
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and fecha_registro = '$this->fecha_registro' and estado = $this->estado and rfid = '$this->rfid' ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and fecha_registro = '$this->fecha_registro' and estado = $this->estado and rfid = '$this->rfid' "); 
          }  
          if ($rs1 === false)  
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
              if ($this->NM_ajax_flag)
              {
                 form_matrix_registro_mob_pack_ajax_response();
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
                  $SC_fields_update[] = "nombre = '$this->nombre', apellido = '$this->apellido', nickname = '$this->nickname', birth_date = #$this->birth_date#, genre = '$this->genre'"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "nombre = '$this->nombre', apellido = '$this->apellido', nickname = '$this->nickname', birth_date = " . $this->Ini->date_delim . $this->birth_date . $this->Ini->date_delim1 . ", genre = '$this->genre'"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "nombre = '$this->nombre', apellido = '$this->apellido', nickname = '$this->nickname', birth_date = " . $this->Ini->date_delim . $this->birth_date . $this->Ini->date_delim1 . ", genre = '$this->genre'"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "nombre = '$this->nombre', apellido = '$this->apellido', nickname = '$this->nickname', birth_date = EXTEND('$this->birth_date', YEAR TO DAY), genre = '$this->genre'"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "nombre = '$this->nombre', apellido = '$this->apellido', nickname = '$this->nickname', birth_date = " . $this->Ini->date_delim . $this->birth_date . $this->Ini->date_delim1 . ", genre = '$this->genre'"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "nombre = '$this->nombre', apellido = '$this->apellido', nickname = '$this->nickname', birth_date = " . $this->Ini->date_delim . $this->birth_date . $this->Ini->date_delim1 . ", genre = '$this->genre'"; 
              } 
              else 
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "nombre = '$this->nombre', apellido = '$this->apellido', nickname = '$this->nickname', birth_date = " . $this->Ini->date_delim . $this->birth_date . $this->Ini->date_delim1 . ", genre = '$this->genre'"; 
              } 
              if (isset($NM_val_form['entrada']) && $NM_val_form['entrada'] != $this->nmgp_dados_select['entrada']) 
              { 
                  $SC_fields_update[] = "entrada = $this->entrada"; 
              } 
              if (isset($NM_val_form['jugador']) && $NM_val_form['jugador'] != $this->nmgp_dados_select['jugador']) 
              { 
                  $SC_fields_update[] = "jugador = $this->jugador"; 
              } 
              if (isset($NM_val_form['visitante']) && $NM_val_form['visitante'] != $this->nmgp_dados_select['visitante']) 
              { 
                  $SC_fields_update[] = "visitante = $this->visitante"; 
              } 
              if (isset($NM_val_form['tarjeta']) && $NM_val_form['tarjeta'] != $this->nmgp_dados_select['tarjeta']) 
              { 
                  $SC_fields_update[] = "tarjeta = $this->tarjeta"; 
              } 
              if (isset($NM_val_form['comida']) && $NM_val_form['comida'] != $this->nmgp_dados_select['comida']) 
              { 
                  $SC_fields_update[] = "comida = $this->comida"; 
              } 
              if (isset($NM_val_form['idprod']) && $NM_val_form['idprod'] != $this->nmgp_dados_select['idprod']) 
              { 
                  $SC_fields_update[] = "idprod = $this->idprod"; 
              } 
              if (isset($NM_val_form['cantidad']) && $NM_val_form['cantidad'] != $this->nmgp_dados_select['cantidad']) 
              { 
                  $SC_fields_update[] = "cantidad = $this->cantidad"; 
              } 
              if (isset($NM_val_form['fecha_entrada']) && $NM_val_form['fecha_entrada'] != $this->nmgp_dados_select['fecha_entrada']) 
              { 
                  if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
                  { 
                      $SC_fields_update[] = "fecha_entrada = #$this->fecha_entrada#"; 
                  } 
                  elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
                  { 
                      $SC_fields_update[] = "fecha_entrada = EXTEND('" . $this->fecha_entrada . "', YEAR TO FRACTION)"; 
                  } 
                  else
                  { 
                      $SC_fields_update[] = "fecha_entrada = " . $this->Ini->date_delim . $this->fecha_entrada . $this->Ini->date_delim1 . ""; 
                  } 
              } 
              if (isset($NM_val_form['fecha_registro_entrada']) && $NM_val_form['fecha_registro_entrada'] != $this->nmgp_dados_select['fecha_registro_entrada']) 
              { 
                  if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
                  { 
                      $SC_fields_update[] = "fecha_registro_entrada = #$this->fecha_registro_entrada#"; 
                  } 
                  elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
                  { 
                      $SC_fields_update[] = "fecha_registro_entrada = EXTEND('" . $this->fecha_registro_entrada . "', YEAR TO FRACTION)"; 
                  } 
                  else
                  { 
                      $SC_fields_update[] = "fecha_registro_entrada = " . $this->Ini->date_delim . $this->fecha_registro_entrada . $this->Ini->date_delim1 . ""; 
                  } 
              } 
              if (isset($NM_val_form['fecha_salida']) && $NM_val_form['fecha_salida'] != $this->nmgp_dados_select['fecha_salida']) 
              { 
                  if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
                  { 
                      $SC_fields_update[] = "fecha_salida = #$this->fecha_salida#"; 
                  } 
                  elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
                  { 
                      $SC_fields_update[] = "fecha_salida = EXTEND('" . $this->fecha_salida . "', YEAR TO FRACTION)"; 
                  } 
                  else
                  { 
                      $SC_fields_update[] = "fecha_salida = " . $this->Ini->date_delim . $this->fecha_salida . $this->Ini->date_delim1 . ""; 
                  } 
              } 
              if (isset($NM_val_form['fecha_registro_salida']) && $NM_val_form['fecha_registro_salida'] != $this->nmgp_dados_select['fecha_registro_salida']) 
              { 
                  if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
                  { 
                      $SC_fields_update[] = "fecha_registro_salida = #$this->fecha_registro_salida#"; 
                  } 
                  elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
                  { 
                      $SC_fields_update[] = "fecha_registro_salida = EXTEND('" . $this->fecha_registro_salida . "', YEAR TO FRACTION)"; 
                  } 
                  else
                  { 
                      $SC_fields_update[] = "fecha_registro_salida = " . $this->Ini->date_delim . $this->fecha_registro_salida . $this->Ini->date_delim1 . ""; 
                  } 
              } 
              if (isset($NM_val_form['fecha_entrega']) && $NM_val_form['fecha_entrega'] != $this->nmgp_dados_select['fecha_entrega']) 
              { 
                  if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
                  { 
                      $SC_fields_update[] = "fecha_entrega = #$this->fecha_entrega#"; 
                  } 
                  elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
                  { 
                      $SC_fields_update[] = "fecha_entrega = EXTEND('" . $this->fecha_entrega . "', YEAR TO FRACTION)"; 
                  } 
                  else
                  { 
                      $SC_fields_update[] = "fecha_entrega = " . $this->Ini->date_delim . $this->fecha_entrega . $this->Ini->date_delim1 . ""; 
                  } 
              } 
              if (isset($NM_val_form['minutos']) && $NM_val_form['minutos'] != $this->nmgp_dados_select['minutos']) 
              { 
                  $SC_fields_update[] = "minutos = $this->minutos"; 
              } 
              if (isset($NM_val_form['tokens']) && $NM_val_form['tokens'] != $this->nmgp_dados_select['tokens']) 
              { 
                  $SC_fields_update[] = "tokens = $this->tokens"; 
              } 
              if (isset($NM_val_form['idcliente']) && $NM_val_form['idcliente'] != $this->nmgp_dados_select['idcliente']) 
              { 
                  $SC_fields_update[] = "idcliente = '$this->idcliente'"; 
              } 
              if (isset($NM_val_form['parent']) && $NM_val_form['parent'] != $this->nmgp_dados_select['parent']) 
              { 
                  $SC_fields_update[] = "parent = '$this->parent'"; 
              } 
              if (isset($NM_val_form['points1']) && $NM_val_form['points1'] != $this->nmgp_dados_select['points1']) 
              { 
                  $SC_fields_update[] = "points1 = $this->points1"; 
              } 
              if (isset($NM_val_form['points2']) && $NM_val_form['points2'] != $this->nmgp_dados_select['points2']) 
              { 
                  $SC_fields_update[] = "points2 = '$this->points2'"; 
              } 
              if (isset($NM_val_form['points3']) && $NM_val_form['points3'] != $this->nmgp_dados_select['points3']) 
              { 
                  $SC_fields_update[] = "points3 = '$this->points3'"; 
              } 
              if (isset($NM_val_form['ultfecha']) && $NM_val_form['ultfecha'] != $this->nmgp_dados_select['ultfecha']) 
              { 
                  if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
                  { 
                      $SC_fields_update[] = "ultfecha = #$this->ultfecha#"; 
                  } 
                  elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
                  { 
                      $SC_fields_update[] = "ultfecha = EXTEND('" . $this->ultfecha . "', YEAR TO FRACTION)"; 
                  } 
                  else
                  { 
                      $SC_fields_update[] = "ultfecha = " . $this->Ini->date_delim . $this->ultfecha . $this->Ini->date_delim1 . ""; 
                  } 
              } 
              if (isset($NM_val_form['ult_iddevice']) && $NM_val_form['ult_iddevice'] != $this->nmgp_dados_select['ult_iddevice']) 
              { 
                  $SC_fields_update[] = "ult_iddevice = $this->ult_iddevice"; 
              } 
              if (isset($NM_val_form['rentado']) && $NM_val_form['rentado'] != $this->nmgp_dados_select['rentado']) 
              { 
                  $SC_fields_update[] = "rentado = $this->rentado"; 
              } 
              if (isset($NM_val_form['idcenter']) && $NM_val_form['idcenter'] != $this->nmgp_dados_select['idcenter']) 
              { 
                  $SC_fields_update[] = "idcenter = '$this->idcenter'"; 
              } 
              if (isset($NM_val_form['phone']) && $NM_val_form['phone'] != $this->nmgp_dados_select['phone']) 
              { 
                  $SC_fields_update[] = "phone = '$this->phone'"; 
              } 
              $comando .= implode(",", $SC_fields_update);  
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              {
                  $comando .= " WHERE idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and fecha_registro = '$this->fecha_registro' and estado = $this->estado and rfid = '$this->rfid' ";  
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
                  $comando .= " WHERE idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and fecha_registro = '$this->fecha_registro' and estado = $this->estado and rfid = '$this->rfid' ";  
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              {
                  $comando .= " WHERE idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and TO_DATE(TO_CHAR(fecha_registro, 'yyyy-mm-dd hh24:mi:ss'), 'yyyy-mm-dd hh24:mi:ss') = '$this->fecha_registro' and estado = $this->estado and rfid = '$this->rfid' ";  
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $comando .= " WHERE idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and fecha_registro = '$this->fecha_registro' and estado = $this->estado and rfid = '$this->rfid' ";  
              }  
              else  
              {
                  $comando .= " WHERE idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and fecha_registro = '$this->fecha_registro' and estado = $this->estado and rfid = '$this->rfid' ";  
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
                                  form_matrix_registro_mob_pack_ajax_response();
                              }
                              exit;  
                          }   
                      }   
                  }   
              }   
              $this->rfid = $this->rfid_before_qstr;
              $this->nombre = $this->nombre_before_qstr;
              $this->apellido = $this->apellido_before_qstr;
              $this->nickname = $this->nickname_before_qstr;
              $this->genre = $this->genre_before_qstr;
              $this->idcliente = $this->idcliente_before_qstr;
              $this->parent = $this->parent_before_qstr;
              $this->points2 = $this->points2_before_qstr;
              $this->points3 = $this->points3_before_qstr;
              $this->idcenter = $this->idcenter_before_qstr;
              $this->phone = $this->phone_before_qstr;
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

              $_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['db_changed'] = true;
              if ($this->NM_ajax_flag) {
                  $this->NM_ajax_info['clearUpload'] = 'S';
              }


              if     (isset($NM_val_form) && isset($NM_val_form['idreg'])) { $this->idreg = $NM_val_form['idreg']; }
              elseif (isset($this->idreg)) { $this->nm_limpa_alfa($this->idreg); }
              if     (isset($NM_val_form) && isset($NM_val_form['uniqueidqr'])) { $this->uniqueidqr = $NM_val_form['uniqueidqr']; }
              elseif (isset($this->uniqueidqr)) { $this->nm_limpa_alfa($this->uniqueidqr); }
              if     (isset($NM_val_form) && isset($NM_val_form['estado'])) { $this->estado = $NM_val_form['estado']; }
              elseif (isset($this->estado)) { $this->nm_limpa_alfa($this->estado); }
              if     (isset($NM_val_form) && isset($NM_val_form['rfid'])) { $this->rfid = $NM_val_form['rfid']; }
              elseif (isset($this->rfid)) { $this->nm_limpa_alfa($this->rfid); }
              if     (isset($NM_val_form) && isset($NM_val_form['nombre'])) { $this->nombre = $NM_val_form['nombre']; }
              elseif (isset($this->nombre)) { $this->nm_limpa_alfa($this->nombre); }
              if     (isset($NM_val_form) && isset($NM_val_form['apellido'])) { $this->apellido = $NM_val_form['apellido']; }
              elseif (isset($this->apellido)) { $this->nm_limpa_alfa($this->apellido); }
              if     (isset($NM_val_form) && isset($NM_val_form['nickname'])) { $this->nickname = $NM_val_form['nickname']; }
              elseif (isset($this->nickname)) { $this->nm_limpa_alfa($this->nickname); }
              if     (isset($NM_val_form) && isset($NM_val_form['genre'])) { $this->genre = $NM_val_form['genre']; }
              elseif (isset($this->genre)) { $this->nm_limpa_alfa($this->genre); }

              $this->nm_formatar_campos();
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
              }

              $aOldRefresh               = $this->nmgp_refresh_fields;
              $this->nmgp_refresh_fields = array_diff(array('nombre', 'apellido', 'genre', 'nickname', 'birth_date'), $aDoNotUpdate);
              $this->ajax_return_values();
              $this->nmgp_refresh_fields = $aOldRefresh;

              $this->nm_tira_formatacao();
              $this->nm_converte_datas();
          }  
      }  
      if ($this->nmgp_opcao == "incluir") 
      { 
          $NM_cmp_auto = "";
          $NM_seq_auto = "";
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['foreign_key'] as $sFKName => $sFKValue)
              {
                   if (isset($this->sc_conv_var[$sFKName]))
                   {
                       $sFKName = $this->sc_conv_var[$sFKName];
                   }
                  eval("\$this->" . $sFKName . " = \"" . $sFKValue . "\";");
              }
          }
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
          { 
              $NM_seq_auto = "NULL, ";
              $NM_cmp_auto = "idreg, ";
          } 
          $bInsertOk = true;
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and fecha_registro = '$this->fecha_registro' and estado = $this->estado and rfid = '$this->rfid' "; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and fecha_registro = '$this->fecha_registro' and estado = $this->estado and rfid = '$this->rfid' "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and fecha_registro = '$this->fecha_registro' and estado = $this->estado and rfid = '$this->rfid' "; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and fecha_registro = '$this->fecha_registro' and estado = $this->estado and rfid = '$this->rfid' "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and TO_DATE(TO_CHAR(fecha_registro, 'yyyy-mm-dd hh24:mi:ss'), 'yyyy-mm-dd hh24:mi:ss') = '$this->fecha_registro' and estado = $this->estado and rfid = '$this->rfid' "; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and TO_DATE(TO_CHAR(fecha_registro, 'yyyy-mm-dd hh24:mi:ss'), 'yyyy-mm-dd hh24:mi:ss') = '$this->fecha_registro' and estado = $this->estado and rfid = '$this->rfid' "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and fecha_registro = '$this->fecha_registro' and estado = $this->estado and rfid = '$this->rfid' "; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and fecha_registro = '$this->fecha_registro' and estado = $this->estado and rfid = '$this->rfid' "); 
          }  
          else  
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and fecha_registro = '$this->fecha_registro' and estado = $this->estado and rfid = '$this->rfid' "; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and fecha_registro = '$this->fecha_registro' and estado = $this->estado and rfid = '$this->rfid' "); 
          }  
          if ($rs1 === false)  
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
              exit; 
          }  
          $tmp_result = (int) $rs1->fields[0]; 
          if ($tmp_result != 0) 
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "critica", $this->Ini->Nm_lang['lang_errm_pkey']); 
              $this->nmgp_opcao = "nada"; 
              $GLOBALS["erro_incl"] = 1; 
              $bInsertOk = false;
              $this->sc_evento = 'insert';
          } 
          $rs1->Close(); 
          $aInsertOk = array(); 
          $bInsertOk = $bInsertOk && empty($aInsertOk);
          if (!isset($_POST['nmgp_ins_valid']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['insert_validation'] != $_POST['nmgp_ins_valid'])
          {
              $bInsertOk = false;
              $this->Erro->mensagem(__FILE__, __LINE__, 'security', $this->Ini->Nm_lang['lang_errm_inst_vald']);
              if (isset($_SESSION['scriptcase']['erro_handler']) && $_SESSION['scriptcase']['erro_handler'])
              {
                  $this->nmgp_opcao = 'refresh_insert';
                  if ($this->NM_ajax_flag)
                  {
                      form_matrix_registro_mob_pack_ajax_response();
                      exit;
                  }
              }
          }
          if ($bInsertOk)
          { 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              { 
                  $compl_insert     = ""; 
                  $compl_insert_val = ""; 
                  if ($this->fecha_registro != "")
                  { 
                       $compl_insert     .= ", fecha_registro";
                       $compl_insert_val .= ", '$this->fecha_registro'";
                  } 
                  if ($this->cantidad != "")
                  { 
                       $compl_insert     .= ", cantidad";
                       $compl_insert_val .= ", $this->cantidad";
                  } 
                  if ($this->ultfecha != "")
                  { 
                       $compl_insert     .= ", ultfecha";
                       $compl_insert_val .= ", #$this->ultfecha#";
                  } 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (uniqueidqr, estado, entrada, jugador, visitante, tarjeta, comida, idprod, fecha_entrada, fecha_registro_entrada, fecha_salida, fecha_registro_salida, fecha_entrega, minutos, tokens, rfid, nombre, apellido, nickname, birth_date, genre, idcliente, parent, points1, points2, points3, ult_iddevice, rentado, idcenter, phone $compl_insert) VALUES ($this->uniqueidqr, $this->estado, $this->entrada, $this->jugador, $this->visitante, $this->tarjeta, $this->comida, $this->idprod, #$this->fecha_entrada#, #$this->fecha_registro_entrada#, #$this->fecha_salida#, #$this->fecha_registro_salida#, #$this->fecha_entrega#, $this->minutos, $this->tokens, '$this->rfid', '$this->nombre', '$this->apellido', '$this->nickname', #$this->birth_date#, '$this->genre', '$this->idcliente', '$this->parent', $this->points1, '$this->points2', '$this->points3', $this->ult_iddevice, $this->rentado, '$this->idcenter', '$this->phone' $compl_insert_val)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              { 
                  $compl_insert     = ""; 
                  $compl_insert_val = ""; 
                  if ($this->fecha_registro != "")
                  { 
                       $compl_insert     .= ", fecha_registro";
                       $compl_insert_val .= ", '$this->fecha_registro'";
                  } 
                  if ($this->cantidad != "")
                  { 
                       $compl_insert     .= ", cantidad";
                       $compl_insert_val .= ", $this->cantidad";
                  } 
                  if ($this->ultfecha != "")
                  { 
                       $compl_insert     .= ", ultfecha";
                       $compl_insert_val .= ", " . $this->Ini->date_delim . $this->ultfecha . $this->Ini->date_delim1 . "";
                  } 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "uniqueidqr, estado, entrada, jugador, visitante, tarjeta, comida, idprod, fecha_entrada, fecha_registro_entrada, fecha_salida, fecha_registro_salida, fecha_entrega, minutos, tokens, rfid, nombre, apellido, nickname, birth_date, genre, idcliente, parent, points1, points2, points3, ult_iddevice, rentado, idcenter, phone $compl_insert) VALUES (" . $NM_seq_auto . "$this->uniqueidqr, $this->estado, $this->entrada, $this->jugador, $this->visitante, $this->tarjeta, $this->comida, $this->idprod, " . $this->Ini->date_delim . $this->fecha_entrada . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->fecha_registro_entrada . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->fecha_salida . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->fecha_registro_salida . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->fecha_entrega . $this->Ini->date_delim1 . ", $this->minutos, $this->tokens, '$this->rfid', '$this->nombre', '$this->apellido', '$this->nickname', " . $this->Ini->date_delim . $this->birth_date . $this->Ini->date_delim1 . ", '$this->genre', '$this->idcliente', '$this->parent', $this->points1, '$this->points2', '$this->points3', $this->ult_iddevice, $this->rentado, '$this->idcenter', '$this->phone' $compl_insert_val)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
              { 
                  $compl_insert     = ""; 
                  $compl_insert_val = ""; 
                  if ($this->fecha_registro != "")
                  { 
                       $compl_insert     .= ", fecha_registro";
                       $compl_insert_val .= ", '$this->fecha_registro'";
                  } 
                  if ($this->cantidad != "")
                  { 
                       $compl_insert     .= ", cantidad";
                       $compl_insert_val .= ", $this->cantidad";
                  } 
                  if ($this->ultfecha != "")
                  { 
                       $compl_insert     .= ", ultfecha";
                       $compl_insert_val .= ", " . $this->Ini->date_delim . $this->ultfecha . $this->Ini->date_delim1 . "";
                  } 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "uniqueidqr, estado, entrada, jugador, visitante, tarjeta, comida, idprod, fecha_entrada, fecha_registro_entrada, fecha_salida, fecha_registro_salida, fecha_entrega, minutos, tokens, rfid, nombre, apellido, nickname, birth_date, genre, idcliente, parent, points1, points2, points3, ult_iddevice, rentado, idcenter, phone $compl_insert) VALUES (" . $NM_seq_auto . "$this->uniqueidqr, $this->estado, $this->entrada, $this->jugador, $this->visitante, $this->tarjeta, $this->comida, $this->idprod, " . $this->Ini->date_delim . $this->fecha_entrada . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->fecha_registro_entrada . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->fecha_salida . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->fecha_registro_salida . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->fecha_entrega . $this->Ini->date_delim1 . ", $this->minutos, $this->tokens, '$this->rfid', '$this->nombre', '$this->apellido', '$this->nickname', " . $this->Ini->date_delim . $this->birth_date . $this->Ini->date_delim1 . ", '$this->genre', '$this->idcliente', '$this->parent', $this->points1, '$this->points2', '$this->points3', $this->ult_iddevice, $this->rentado, '$this->idcenter', '$this->phone' $compl_insert_val)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              {
                  $compl_insert     = ""; 
                  $compl_insert_val = ""; 
                  if ($this->fecha_registro != "")
                  { 
                       $compl_insert     .= ", fecha_registro";
                       $compl_insert_val .= ", TO_DATE('$this->fecha_registro', 'yyyy-mm-dd hh24:mi:ss')";
                  } 
                  if ($this->cantidad != "")
                  { 
                       $compl_insert     .= ", cantidad";
                       $compl_insert_val .= ", $this->cantidad";
                  } 
                  if ($this->ultfecha != "")
                  { 
                       $compl_insert     .= ", ultfecha";
                       $compl_insert_val .= ", " . $this->Ini->date_delim . $this->ultfecha . $this->Ini->date_delim1 . "";
                  } 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "uniqueidqr, estado, entrada, jugador, visitante, tarjeta, comida, idprod, fecha_entrada, fecha_registro_entrada, fecha_salida, fecha_registro_salida, fecha_entrega, minutos, tokens, rfid, nombre, apellido, nickname, birth_date, genre, idcliente, parent, points1, points2, points3, ult_iddevice, rentado, idcenter, phone $compl_insert) VALUES (" . $NM_seq_auto . "$this->uniqueidqr, $this->estado, $this->entrada, $this->jugador, $this->visitante, $this->tarjeta, $this->comida, $this->idprod, " . $this->Ini->date_delim . $this->fecha_entrada . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->fecha_registro_entrada . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->fecha_salida . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->fecha_registro_salida . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->fecha_entrega . $this->Ini->date_delim1 . ", $this->minutos, $this->tokens, '$this->rfid', '$this->nombre', '$this->apellido', '$this->nickname', " . $this->Ini->date_delim . $this->birth_date . $this->Ini->date_delim1 . ", '$this->genre', '$this->idcliente', '$this->parent', $this->points1, '$this->points2', '$this->points3', $this->ult_iddevice, $this->rentado, '$this->idcenter', '$this->phone' $compl_insert_val)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $compl_insert     = ""; 
                  $compl_insert_val = ""; 
                  if ($this->fecha_registro != "")
                  { 
                       $compl_insert     .= ", fecha_registro";
                       $compl_insert_val .= ", '$this->fecha_registro'";
                  } 
                  if ($this->cantidad != "")
                  { 
                       $compl_insert     .= ", cantidad";
                       $compl_insert_val .= ", $this->cantidad";
                  } 
                  if ($this->ultfecha != "")
                  { 
                       $compl_insert     .= ", ultfecha";
                       $compl_insert_val .= ", EXTEND('$this->ultfecha', YEAR TO FRACTION)";
                  } 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "uniqueidqr, estado, entrada, jugador, visitante, tarjeta, comida, idprod, fecha_entrada, fecha_registro_entrada, fecha_salida, fecha_registro_salida, fecha_entrega, minutos, tokens, rfid, nombre, apellido, nickname, birth_date, genre, idcliente, parent, points1, points2, points3, ult_iddevice, rentado, idcenter, phone $compl_insert) VALUES (" . $NM_seq_auto . "$this->uniqueidqr, $this->estado, $this->entrada, $this->jugador, $this->visitante, $this->tarjeta, $this->comida, $this->idprod, EXTEND('$this->fecha_entrada', YEAR TO FRACTION), EXTEND('$this->fecha_registro_entrada', YEAR TO FRACTION), EXTEND('$this->fecha_salida', YEAR TO FRACTION), EXTEND('$this->fecha_registro_salida', YEAR TO FRACTION), EXTEND('$this->fecha_entrega', YEAR TO FRACTION), $this->minutos, $this->tokens, '$this->rfid', '$this->nombre', '$this->apellido', '$this->nickname', EXTEND('$this->birth_date', YEAR TO DAY), '$this->genre', '$this->idcliente', '$this->parent', $this->points1, '$this->points2', '$this->points3', $this->ult_iddevice, $this->rentado, '$this->idcenter', '$this->phone' $compl_insert_val)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
              {
                  $compl_insert     = ""; 
                  $compl_insert_val = ""; 
                  if ($this->fecha_registro != "")
                  { 
                       $compl_insert     .= ", fecha_registro";
                       $compl_insert_val .= ", '$this->fecha_registro'";
                  } 
                  if ($this->cantidad != "")
                  { 
                       $compl_insert     .= ", cantidad";
                       $compl_insert_val .= ", $this->cantidad";
                  } 
                  if ($this->ultfecha != "")
                  { 
                       $compl_insert     .= ", ultfecha";
                       $compl_insert_val .= ", " . $this->Ini->date_delim . $this->ultfecha . $this->Ini->date_delim1 . "";
                  } 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "uniqueidqr, estado, entrada, jugador, visitante, tarjeta, comida, idprod, fecha_entrada, fecha_registro_entrada, fecha_salida, fecha_registro_salida, fecha_entrega, minutos, tokens, rfid, nombre, apellido, nickname, birth_date, genre, idcliente, parent, points1, points2, points3, ult_iddevice, rentado, idcenter, phone $compl_insert) VALUES (" . $NM_seq_auto . "$this->uniqueidqr, $this->estado, $this->entrada, $this->jugador, $this->visitante, $this->tarjeta, $this->comida, $this->idprod, " . $this->Ini->date_delim . $this->fecha_entrada . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->fecha_registro_entrada . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->fecha_salida . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->fecha_registro_salida . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->fecha_entrega . $this->Ini->date_delim1 . ", $this->minutos, $this->tokens, '$this->rfid', '$this->nombre', '$this->apellido', '$this->nickname', " . $this->Ini->date_delim . $this->birth_date . $this->Ini->date_delim1 . ", '$this->genre', '$this->idcliente', '$this->parent', $this->points1, '$this->points2', '$this->points3', $this->ult_iddevice, $this->rentado, '$this->idcenter', '$this->phone' $compl_insert_val)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
              {
                  $compl_insert     = ""; 
                  $compl_insert_val = ""; 
                  if ($this->fecha_registro != "")
                  { 
                       $compl_insert     .= ", fecha_registro";
                       $compl_insert_val .= ", '$this->fecha_registro'";
                  } 
                  if ($this->cantidad != "")
                  { 
                       $compl_insert     .= ", cantidad";
                       $compl_insert_val .= ", $this->cantidad";
                  } 
                  if ($this->ultfecha != "")
                  { 
                       $compl_insert     .= ", ultfecha";
                       $compl_insert_val .= ", " . $this->Ini->date_delim . $this->ultfecha . $this->Ini->date_delim1 . "";
                  } 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "uniqueidqr, estado, entrada, jugador, visitante, tarjeta, comida, idprod, fecha_entrada, fecha_registro_entrada, fecha_salida, fecha_registro_salida, fecha_entrega, minutos, tokens, rfid, nombre, apellido, nickname, birth_date, genre, idcliente, parent, points1, points2, points3, ult_iddevice, rentado, idcenter, phone $compl_insert) VALUES (" . $NM_seq_auto . "$this->uniqueidqr, $this->estado, $this->entrada, $this->jugador, $this->visitante, $this->tarjeta, $this->comida, $this->idprod, " . $this->Ini->date_delim . $this->fecha_entrada . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->fecha_registro_entrada . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->fecha_salida . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->fecha_registro_salida . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->fecha_entrega . $this->Ini->date_delim1 . ", $this->minutos, $this->tokens, '$this->rfid', '$this->nombre', '$this->apellido', '$this->nickname', " . $this->Ini->date_delim . $this->birth_date . $this->Ini->date_delim1 . ", '$this->genre', '$this->idcliente', '$this->parent', $this->points1, '$this->points2', '$this->points3', $this->ult_iddevice, $this->rentado, '$this->idcenter', '$this->phone' $compl_insert_val)"; 
              }
              elseif ($this->Ini->nm_tpbanco == 'pdo_ibm')
              {
                  $compl_insert     = ""; 
                  $compl_insert_val = ""; 
                  if ($this->fecha_registro != "")
                  { 
                       $compl_insert     .= ", fecha_registro";
                       $compl_insert_val .= ", TO_DATE('$this->fecha_registro', 'yyyy-mm-dd hh24:mi:ss')";
                  } 
                  if ($this->cantidad != "")
                  { 
                       $compl_insert     .= ", cantidad";
                       $compl_insert_val .= ", $this->cantidad";
                  } 
                  if ($this->ultfecha != "")
                  { 
                       $compl_insert     .= ", ultfecha";
                       $compl_insert_val .= ", " . $this->Ini->date_delim . $this->ultfecha . $this->Ini->date_delim1 . "";
                  } 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "uniqueidqr, estado, entrada, jugador, visitante, tarjeta, comida, idprod, fecha_entrada, fecha_registro_entrada, fecha_salida, fecha_registro_salida, fecha_entrega, minutos, tokens, rfid, nombre, apellido, nickname, birth_date, genre, idcliente, parent, points1, points2, points3, ult_iddevice, rentado, idcenter, phone $compl_insert) VALUES (" . $NM_seq_auto . "$this->uniqueidqr, $this->estado, $this->entrada, $this->jugador, $this->visitante, $this->tarjeta, $this->comida, $this->idprod, " . $this->Ini->date_delim . $this->fecha_entrada . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->fecha_registro_entrada . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->fecha_salida . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->fecha_registro_salida . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->fecha_entrega . $this->Ini->date_delim1 . ", $this->minutos, $this->tokens, '$this->rfid', '$this->nombre', '$this->apellido', '$this->nickname', " . $this->Ini->date_delim . $this->birth_date . $this->Ini->date_delim1 . ", '$this->genre', '$this->idcliente', '$this->parent', $this->points1, '$this->points2', '$this->points3', $this->ult_iddevice, $this->rentado, '$this->idcenter', '$this->phone' $compl_insert_val)"; 
              }
              else
              {
                  $compl_insert     = ""; 
                  $compl_insert_val = ""; 
                  if ($this->fecha_registro != "")
                  { 
                       $compl_insert     .= ", fecha_registro";
                       $compl_insert_val .= ", '$this->fecha_registro'";
                  } 
                  if ($this->cantidad != "")
                  { 
                       $compl_insert     .= ", cantidad";
                       $compl_insert_val .= ", $this->cantidad";
                  } 
                  if ($this->ultfecha != "")
                  { 
                       $compl_insert     .= ", ultfecha";
                       $compl_insert_val .= ", " . $this->Ini->date_delim . $this->ultfecha . $this->Ini->date_delim1 . "";
                  } 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "uniqueidqr, estado, entrada, jugador, visitante, tarjeta, comida, idprod, fecha_entrada, fecha_registro_entrada, fecha_salida, fecha_registro_salida, fecha_entrega, minutos, tokens, rfid, nombre, apellido, nickname, birth_date, genre, idcliente, parent, points1, points2, points3, ult_iddevice, rentado, idcenter, phone $compl_insert) VALUES (" . $NM_seq_auto . "$this->uniqueidqr, $this->estado, $this->entrada, $this->jugador, $this->visitante, $this->tarjeta, $this->comida, $this->idprod, " . $this->Ini->date_delim . $this->fecha_entrada . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->fecha_registro_entrada . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->fecha_salida . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->fecha_registro_salida . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->fecha_entrega . $this->Ini->date_delim1 . ", $this->minutos, $this->tokens, '$this->rfid', '$this->nombre', '$this->apellido', '$this->nickname', " . $this->Ini->date_delim . $this->birth_date . $this->Ini->date_delim1 . ", '$this->genre', '$this->idcliente', '$this->parent', $this->points1, '$this->points2', '$this->points3', $this->ult_iddevice, $this->rentado, '$this->idcenter', '$this->phone' $compl_insert_val)"; 
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
                              form_matrix_registro_mob_pack_ajax_response();
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
                          form_matrix_registro_mob_pack_ajax_response();
                      }
                      exit; 
                  } 
                  $this->idreg =  $rsy->fields[0];
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
                  $this->idreg = $rsy->fields[0];
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
                  $this->idreg = $rsy->fields[0];
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
                  $this->idreg = $rsy->fields[0];
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
                  $this->idreg = $rsy->fields[0];
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
                  $this->idreg = $rsy->fields[0];
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
                  $this->idreg = $rsy->fields[0];
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
                  $this->idreg = $rsy->fields[0];
                  $rsy->Close(); 
              } 
              $this->rfid = $this->rfid_before_qstr;
              $this->nombre = $this->nombre_before_qstr;
              $this->apellido = $this->apellido_before_qstr;
              $this->nickname = $this->nickname_before_qstr;
              $this->genre = $this->genre_before_qstr;
              $this->idcliente = $this->idcliente_before_qstr;
              $this->parent = $this->parent_before_qstr;
              $this->points2 = $this->points2_before_qstr;
              $this->points3 = $this->points3_before_qstr;
              $this->idcenter = $this->idcenter_before_qstr;
              $this->phone = $this->phone_before_qstr;
              }

              $_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['db_changed'] = true;

              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['total']))
              {
                  unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['total']);
              }

              $this->sc_evento = "insert"; 
              $this->rfid = $this->rfid_before_qstr;
              $this->nombre = $this->nombre_before_qstr;
              $this->apellido = $this->apellido_before_qstr;
              $this->nickname = $this->nickname_before_qstr;
              $this->genre = $this->genre_before_qstr;
              $this->idcliente = $this->idcliente_before_qstr;
              $this->parent = $this->parent_before_qstr;
              $this->points2 = $this->points2_before_qstr;
              $this->points3 = $this->points3_before_qstr;
              $this->idcenter = $this->idcenter_before_qstr;
              $this->phone = $this->phone_before_qstr;
              $this->sc_insert_on = true; 
              if (empty($this->sc_erro_insert)) {
                  $this->record_insert_ok = true;
              } 
              if ('refresh_insert' != $this->nmgp_opcao && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['sc_redir_insert']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['sc_redir_insert'] != "S"))
              {
              $this->nmgp_opcao = "novo"; 
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['run_iframe'] == "R")
              { 
                   $_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['return_edit'] = "new";
              } 
              }
              $this->nm_flag_iframe = true;
          } 
          if ($this->lig_edit_lookup)
          {
              $this->lig_edit_lookup_call = true;
          }
      } 
      if ($this->nmgp_opcao == "excluir") 
      { 
          $this->idreg = substr($this->Db->qstr($this->idreg), 1, -1); 
          $this->uniqueidqr = substr($this->Db->qstr($this->uniqueidqr), 1, -1); 
          $this->fecha_registro = substr($this->Db->qstr($this->fecha_registro), 1, -1); 
          $this->estado = substr($this->Db->qstr($this->estado), 1, -1); 
          $this->rfid = substr($this->Db->qstr($this->rfid), 1, -1); 

          $bDelecaoOk = true;
          $sMsgErro   = '';

          if ($bDelecaoOk)
          {

          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and fecha_registro = '$this->fecha_registro' and estado = $this->estado and rfid = '$this->rfid'"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and fecha_registro = '$this->fecha_registro' and estado = $this->estado and rfid = '$this->rfid' "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and fecha_registro = '$this->fecha_registro' and estado = $this->estado and rfid = '$this->rfid'"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and fecha_registro = '$this->fecha_registro' and estado = $this->estado and rfid = '$this->rfid' "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and TO_DATE(TO_CHAR(fecha_registro, 'yyyy-mm-dd hh24:mi:ss'), 'yyyy-mm-dd hh24:mi:ss') = '$this->fecha_registro' and estado = $this->estado and rfid = '$this->rfid'"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and TO_DATE(TO_CHAR(fecha_registro, 'yyyy-mm-dd hh24:mi:ss'), 'yyyy-mm-dd hh24:mi:ss') = '$this->fecha_registro' and estado = $this->estado and rfid = '$this->rfid' "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and fecha_registro = '$this->fecha_registro' and estado = $this->estado and rfid = '$this->rfid'"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and fecha_registro = '$this->fecha_registro' and estado = $this->estado and rfid = '$this->rfid' "); 
          }  
          else  
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and fecha_registro = '$this->fecha_registro' and estado = $this->estado and rfid = '$this->rfid'"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and fecha_registro = '$this->fecha_registro' and estado = $this->estado and rfid = '$this->rfid' "); 
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
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and fecha_registro = '$this->fecha_registro' and estado = $this->estado and rfid = '$this->rfid' "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and fecha_registro = '$this->fecha_registro' and estado = $this->estado and rfid = '$this->rfid' "); 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and fecha_registro = '$this->fecha_registro' and estado = $this->estado and rfid = '$this->rfid' "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and fecha_registro = '$this->fecha_registro' and estado = $this->estado and rfid = '$this->rfid' "); 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              {
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and TO_DATE(TO_CHAR(fecha_registro, 'yyyy-mm-dd hh24:mi:ss'), 'yyyy-mm-dd hh24:mi:ss') = '$this->fecha_registro' and estado = $this->estado and rfid = '$this->rfid' "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and TO_DATE(TO_CHAR(fecha_registro, 'yyyy-mm-dd hh24:mi:ss'), 'yyyy-mm-dd hh24:mi:ss') = '$this->fecha_registro' and estado = $this->estado and rfid = '$this->rfid' "); 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and fecha_registro = '$this->fecha_registro' and estado = $this->estado and rfid = '$this->rfid' "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and fecha_registro = '$this->fecha_registro' and estado = $this->estado and rfid = '$this->rfid' "); 
              }  
              else  
              {
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and fecha_registro = '$this->fecha_registro' and estado = $this->estado and rfid = '$this->rfid' "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and fecha_registro = '$this->fecha_registro' and estado = $this->estado and rfid = '$this->rfid' "); 
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
                          form_matrix_registro_mob_pack_ajax_response();
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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['reg_start']--; 
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['reg_start'] < 0)
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['reg_start'] = 0; 
              }

              $_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['db_changed'] = true;

              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['total']))
              {
                  unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['total']);
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
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['parms'] = "idreg?#?$this->idreg?@?uniqueidqr?#?$this->uniqueidqr?@?fecha_registro?#?$this->fecha_registro?@?estado?#?$this->estado?@?rfid?#?$this->rfid?@?"; 
      }
      $this->NM_commit_db(); 
      if ($this->sc_evento != "insert" && $this->sc_evento != "update" && $this->sc_evento != "delete")
      { 
          $this->idreg = null === $this->idreg ? null : substr($this->Db->qstr($this->idreg), 1, -1); 
          $this->uniqueidqr = null === $this->uniqueidqr ? null : substr($this->Db->qstr($this->uniqueidqr), 1, -1); 
          $this->fecha_registro = null === $this->fecha_registro ? null : substr($this->Db->qstr($this->fecha_registro), 1, -1); 
          $this->estado = null === $this->estado ? null : substr($this->Db->qstr($this->estado), 1, -1); 
          $this->rfid = null === $this->rfid ? null : substr($this->Db->qstr($this->rfid), 1, -1); 
      } 
      if (isset($this->NM_where_filter))
      {
          $this->NM_where_filter = str_replace("@percent@", "%", $this->NM_where_filter);
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['where_filter'] = trim($this->NM_where_filter);
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['total']))
          {
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['total']);
          }
      }
      $sc_where_filter = '';
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['where_filter_form']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['where_filter_form'])
      {
          $sc_where_filter = $_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['where_filter_form'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['where_filter']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['where_filter'] && $sc_where_filter != $_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['where_filter'])
      {
          if (empty($sc_where_filter))
          {
              $sc_where_filter = $_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['where_filter'];
          }
          else
          {
              $sc_where_filter .= " and (" . $_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['where_filter'] . ")";
          }
      }
//------------ 
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['run_iframe'] == "R")
      {
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['iframe_evento'] == "insert") 
          { 
               $this->nmgp_opcao = "novo"; 
               $_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['select'] = "";
          } 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['iframe_evento'] = $this->sc_evento; 
      } 
      if (!isset($this->nmgp_opcao) || empty($this->nmgp_opcao)) 
      { 
          if (empty($this->idreg) && empty($this->uniqueidqr) && empty($this->fecha_registro) && empty($this->estado) && empty($this->rfid)) 
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
      if ($this->nmgp_opcao != "nada" && (trim($this->idreg) == "" || trim($this->uniqueidqr) == "" || trim($this->estado) == "")) 
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
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['run_iframe'] == "F" && $this->sc_evento == "insert")
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
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['total']))
      { 
          $nmgp_select = "SELECT count(*) AS countTest from " . $this->Ini->nm_tabela . $sc_where; 
          $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
          $rt = $this->Db->Execute($nmgp_select) ; 
          if ($rt === false && !$rt->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
              exit ; 
          }  
          $qt_geral_reg_form_matrix_registro_mob = isset($rt->fields[0]) ? $rt->fields[0] - 1 : 0; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['total'] = $qt_geral_reg_form_matrix_registro_mob;
          $rt->Close(); 
          if ($this->nmgp_opcao == "igual" && isset($this->NM_btn_navega) && 'S' == $this->NM_btn_navega && !empty($this->idreg) && !empty($this->uniqueidqr) && !empty($this->fecha_registro) && !empty($this->estado) && !empty($this->rfid))
          {
              $Reg_OK      = false;
              $Count_start = -1;
              $sc_order_by = "";
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
                  $Sel_Chave = "idreg, uniqueidqr, fecha_registro, estado, rfid"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              {
                  $Sel_Chave = "idreg, uniqueidqr, TO_DATE(TO_CHAR(fecha_registro, 'yyyy-mm-dd hh24:mi:ss'), 'yyyy-mm-dd hh24:mi:ss'), estado, rfid"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $Sel_Chave = "idreg, uniqueidqr, fecha_registro, estado, rfid"; 
              }
              else  
              {
                  $Sel_Chave = "idreg, uniqueidqr, fecha_registro, estado, rfid"; 
              }
              $nmgp_select = "SELECT " . $Sel_Chave . " from " . $this->Ini->nm_tabela . $sc_where; 
              $sc_order_by = "idreg, uniqueidqr, fecha_registro, estado, rfid";
              $sc_order_by = str_replace("order by ", "", $sc_order_by);
              $sc_order_by = str_replace("ORDER BY ", "", trim($sc_order_by));
              if (!empty($sc_order_by))
              {
                  $nmgp_select .= " order by $sc_order_by "; 
              }
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
              $rt = $this->Db->Execute($nmgp_select) ; 
              if ($rt === false && !$rt->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
              { 
                  $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
                  exit ; 
              }  
              while (!$rt->EOF && !$Reg_OK)
              { 
                  if ($rt->fields[0] == $this->idreg && $rt->fields[1] == $this->uniqueidqr && $rt->fields[2] == $this->fecha_registro && $rt->fields[3] == $this->estado && $rt->fields[4] == $this->rfid)
                  { 
                      $Reg_OK = true;
                  }  
                  $Count_start++;
                  $rt->MoveNext();
              }  
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['reg_start'] = $Count_start;
              $rt->Close(); 
          }
      } 
      else 
      { 
          $qt_geral_reg_form_matrix_registro_mob = $_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['total'];
      } 
      if ($this->nmgp_opcao == "inicio") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['reg_start'] = 0; 
      } 
      if ($this->nmgp_opcao == "avanca")  
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['reg_start']++; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['reg_start'] > $qt_geral_reg_form_matrix_registro_mob)
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['reg_start'] = $qt_geral_reg_form_matrix_registro_mob; 
          }
      } 
      if ($this->nmgp_opcao == "retorna") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['reg_start']--; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['reg_start'] < 0)
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['reg_start'] = 0; 
          }
      } 
      if ($this->nmgp_opcao == "final") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['reg_start'] = $qt_geral_reg_form_matrix_registro_mob; 
      } 
      if ($this->nmgp_opcao == "navpage" && ($this->nmgp_ordem - 1) <= $qt_geral_reg_form_matrix_registro_mob) 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['reg_start'] = $this->nmgp_ordem - 1; 
      } 
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['reg_start']) || empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['reg_start']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['reg_start'] = 0;
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['reg_qtd'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['reg_start'] + 1;
      $this->NM_ajax_info['navSummary']['reg_ini'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['reg_start'] + 1; 
      $this->NM_ajax_info['navSummary']['reg_qtd'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['reg_qtd']; 
      $this->NM_ajax_info['navSummary']['reg_tot'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['total'] + 1; 
      $this->NM_gera_nav_page(); 
      $this->NM_ajax_info['navPage'] = $this->SC_nav_page; 
      $GLOBALS["NM_ERRO_IBASE"] = 0;  
//---------- 
      if ($this->nmgp_opcao != "novo" && $this->nmgp_opcao != "nada" && $this->nmgp_opcao != "refresh_insert") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['parms'] = ""; 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
          { 
              $GLOBALS["NM_ERRO_IBASE"] = 1;  
          } 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
          { 
              $nmgp_select = "SELECT idreg, uniqueidqr, fecha_registro, estado, entrada, jugador, visitante, tarjeta, comida, idprod, cantidad, str_replace (convert(char(10),fecha_entrada,102), '.', '-') + ' ' + convert(char(8),fecha_entrada,20), str_replace (convert(char(10),fecha_registro_entrada,102), '.', '-') + ' ' + convert(char(8),fecha_registro_entrada,20), str_replace (convert(char(10),fecha_salida,102), '.', '-') + ' ' + convert(char(8),fecha_salida,20), str_replace (convert(char(10),fecha_registro_salida,102), '.', '-') + ' ' + convert(char(8),fecha_registro_salida,20), str_replace (convert(char(10),fecha_entrega,102), '.', '-') + ' ' + convert(char(8),fecha_entrega,20), minutos, tokens, rfid, nombre, apellido, nickname, str_replace (convert(char(10),birth_date,102), '.', '-') + ' ' + convert(char(8),birth_date,20), genre, idcliente, parent, points1, points2, points3, str_replace (convert(char(10),ultfecha,102), '.', '-') + ' ' + convert(char(8),ultfecha,20), ult_iddevice, rentado, idcenter, phone from " . $this->Ini->nm_tabela ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          { 
              $nmgp_select = "SELECT idreg, uniqueidqr, fecha_registro, estado, entrada, jugador, visitante, tarjeta, comida, idprod, cantidad, convert(char(23),fecha_entrada,121), convert(char(23),fecha_registro_entrada,121), convert(char(23),fecha_salida,121), convert(char(23),fecha_registro_salida,121), convert(char(23),fecha_entrega,121), minutos, tokens, rfid, nombre, apellido, nickname, convert(char(23),birth_date,121), genre, idcliente, parent, points1, points2, points3, convert(char(23),ultfecha,121), ult_iddevice, rentado, idcenter, phone from " . $this->Ini->nm_tabela ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          { 
              $nmgp_select = "SELECT idreg, uniqueidqr, TO_DATE(TO_CHAR(fecha_registro, 'yyyy-mm-dd hh24:mi:ss'), 'yyyy-mm-dd hh24:mi:ss'), estado, entrada, jugador, visitante, tarjeta, comida, idprod, cantidad, fecha_entrada, fecha_registro_entrada, fecha_salida, fecha_registro_salida, fecha_entrega, minutos, tokens, rfid, nombre, apellido, nickname, birth_date, genre, idcliente, parent, points1, points2, points3, ultfecha, ult_iddevice, rentado, idcenter, phone from " . $this->Ini->nm_tabela ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          { 
              $nmgp_select = "SELECT idreg, uniqueidqr, fecha_registro, estado, entrada, jugador, visitante, tarjeta, comida, idprod, cantidad, EXTEND(fecha_entrada, YEAR TO FRACTION), EXTEND(fecha_registro_entrada, YEAR TO FRACTION), EXTEND(fecha_salida, YEAR TO FRACTION), EXTEND(fecha_registro_salida, YEAR TO FRACTION), EXTEND(fecha_entrega, YEAR TO FRACTION), minutos, tokens, rfid, nombre, apellido, nickname, EXTEND(birth_date, YEAR TO DAY), genre, idcliente, parent, points1, points2, points3, EXTEND(ultfecha, YEAR TO FRACTION), ult_iddevice, rentado, idcenter, phone from " . $this->Ini->nm_tabela ; 
          } 
          else 
          { 
              $nmgp_select = "SELECT idreg, uniqueidqr, fecha_registro, estado, entrada, jugador, visitante, tarjeta, comida, idprod, cantidad, fecha_entrada, fecha_registro_entrada, fecha_salida, fecha_registro_salida, fecha_entrega, minutos, tokens, rfid, nombre, apellido, nickname, birth_date, genre, idcliente, parent, points1, points2, points3, ultfecha, ult_iddevice, rentado, idcenter, phone from " . $this->Ini->nm_tabela ; 
          } 
          $aWhere = array();
          $aWhere[] = $sc_where_filter;
          if ($this->nmgp_opcao == "igual" || (($_SESSION['sc_session'][$this->Ini->sc_page]['form_adm_clientes']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_adm_clientes']['run_iframe'] == "R") && ($this->sc_evento == "insert" || $this->sc_evento == "update")) )
          { 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              {
                  $aWhere[] = "idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and fecha_registro = '$this->fecha_registro' and estado = $this->estado and rfid = '$this->rfid'"; 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
                  $aWhere[] = "idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and fecha_registro = '$this->fecha_registro' and estado = $this->estado and rfid = '$this->rfid'"; 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              {
                  $aWhere[] = "idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and TO_DATE(TO_CHAR(fecha_registro, 'yyyy-mm-dd hh24:mi:ss'), 'yyyy-mm-dd hh24:mi:ss') = '$this->fecha_registro' and estado = $this->estado and rfid = '$this->rfid'"; 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $aWhere[] = "idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and fecha_registro = '$this->fecha_registro' and estado = $this->estado and rfid = '$this->rfid'"; 
              }  
              else  
              {
                  $aWhere[] = "idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and fecha_registro = '$this->fecha_registro' and estado = $this->estado and rfid = '$this->rfid'"; 
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
          $sc_order_by = "idreg, uniqueidqr, fecha_registro, estado, rfid";
          $sc_order_by = str_replace("order by ", "", $sc_order_by);
          $sc_order_by = str_replace("ORDER BY ", "", trim($sc_order_by));
          if (!empty($sc_order_by))
          {
              $nmgp_select .= " order by $sc_order_by "; 
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['run_iframe'] == "R")
          {
              if ($this->sc_evento == "update")
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['select'] = $nmgp_select;
                  $this->nm_gera_html();
              } 
              elseif (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['select']))
              { 
                  $nmgp_select = $_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['select'];
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['select'] = ""; 
              } 
          } 
          if ($this->nmgp_opcao == "igual") 
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
              $rs = $this->Db->Execute($nmgp_select) ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "SelectLimit($nmgp_select, 1, " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['reg_start'] . ")" ; 
              $rs = $this->Db->SelectLimit($nmgp_select, 1, $_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['reg_start']) ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "SelectLimit($nmgp_select, 1, " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['reg_start'] . ")" ; 
              $rs = $this->Db->SelectLimit($nmgp_select, 1, $_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['reg_start']) ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "SelectLimit($nmgp_select, 1, " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['reg_start'] . ")" ; 
              $rs = $this->Db->SelectLimit($nmgp_select, 1, $_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['reg_start']) ; 
          } 
          else  
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
              $rs = $this->Db->Execute($nmgp_select) ; 
              if (!$rs === false && !$rs->EOF) 
              { 
                  $rs->Move($_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['reg_start']) ;  
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
              if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['where_filter']))
              {
                  $this->nmgp_form_empty        = true;
                  $this->NM_ajax_info['buttonDisplay']['first']   = $this->nmgp_botoes['first']   = "off";
                  $this->NM_ajax_info['buttonDisplay']['back']    = $this->nmgp_botoes['back']    = "off";
                  $this->NM_ajax_info['buttonDisplay']['forward'] = $this->nmgp_botoes['forward'] = "off";
                  $this->NM_ajax_info['buttonDisplay']['last']    = $this->nmgp_botoes['last']    = "off";
                  $this->NM_ajax_info['buttonDisplay']['update']  = $this->nmgp_botoes['update']  = "off";
                  $this->NM_ajax_info['buttonDisplay']['delete']  = $this->nmgp_botoes['delete']  = "off";
                  $this->NM_ajax_info['buttonDisplay']['first']   = $this->nmgp_botoes['insert']  = "off";
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['empty_filter'] = true;
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
              $this->idreg = $rs->fields[0] ; 
              $this->nmgp_dados_select['idreg'] = $this->idreg;
              $this->uniqueidqr = $rs->fields[1] ; 
              $this->nmgp_dados_select['uniqueidqr'] = $this->uniqueidqr;
              $this->fecha_registro = $rs->fields[2] ; 
              if (substr($this->fecha_registro, 10, 1) == "-") 
              { 
                 $this->fecha_registro = substr($this->fecha_registro, 0, 10) . " " . substr($this->fecha_registro, 11);
              } 
              if (substr($this->fecha_registro, 13, 1) == ".") 
              { 
                 $this->fecha_registro = substr($this->fecha_registro, 0, 13) . ":" . substr($this->fecha_registro, 14, 2) . ":" . substr($this->fecha_registro, 17);
              } 
              $this->nmgp_dados_select['fecha_registro'] = $this->fecha_registro;
              $this->estado = $rs->fields[3] ; 
              $this->nmgp_dados_select['estado'] = $this->estado;
              $this->entrada = $rs->fields[4] ; 
              $this->nmgp_dados_select['entrada'] = $this->entrada;
              $this->jugador = $rs->fields[5] ; 
              $this->nmgp_dados_select['jugador'] = $this->jugador;
              $this->visitante = $rs->fields[6] ; 
              $this->nmgp_dados_select['visitante'] = $this->visitante;
              $this->tarjeta = $rs->fields[7] ; 
              $this->nmgp_dados_select['tarjeta'] = $this->tarjeta;
              $this->comida = $rs->fields[8] ; 
              $this->nmgp_dados_select['comida'] = $this->comida;
              $this->idprod = $rs->fields[9] ; 
              $this->nmgp_dados_select['idprod'] = $this->idprod;
              $this->cantidad = $rs->fields[10] ; 
              $this->nmgp_dados_select['cantidad'] = $this->cantidad;
              $this->fecha_entrada = $rs->fields[11] ; 
              if (substr($this->fecha_entrada, 10, 1) == "-") 
              { 
                 $this->fecha_entrada = substr($this->fecha_entrada, 0, 10) . " " . substr($this->fecha_entrada, 11);
              } 
              if (substr($this->fecha_entrada, 13, 1) == ".") 
              { 
                 $this->fecha_entrada = substr($this->fecha_entrada, 0, 13) . ":" . substr($this->fecha_entrada, 14, 2) . ":" . substr($this->fecha_entrada, 17);
              } 
              $this->nmgp_dados_select['fecha_entrada'] = $this->fecha_entrada;
              $this->fecha_registro_entrada = $rs->fields[12] ; 
              if (substr($this->fecha_registro_entrada, 10, 1) == "-") 
              { 
                 $this->fecha_registro_entrada = substr($this->fecha_registro_entrada, 0, 10) . " " . substr($this->fecha_registro_entrada, 11);
              } 
              if (substr($this->fecha_registro_entrada, 13, 1) == ".") 
              { 
                 $this->fecha_registro_entrada = substr($this->fecha_registro_entrada, 0, 13) . ":" . substr($this->fecha_registro_entrada, 14, 2) . ":" . substr($this->fecha_registro_entrada, 17);
              } 
              $this->nmgp_dados_select['fecha_registro_entrada'] = $this->fecha_registro_entrada;
              $this->fecha_salida = $rs->fields[13] ; 
              if (substr($this->fecha_salida, 10, 1) == "-") 
              { 
                 $this->fecha_salida = substr($this->fecha_salida, 0, 10) . " " . substr($this->fecha_salida, 11);
              } 
              if (substr($this->fecha_salida, 13, 1) == ".") 
              { 
                 $this->fecha_salida = substr($this->fecha_salida, 0, 13) . ":" . substr($this->fecha_salida, 14, 2) . ":" . substr($this->fecha_salida, 17);
              } 
              $this->nmgp_dados_select['fecha_salida'] = $this->fecha_salida;
              $this->fecha_registro_salida = $rs->fields[14] ; 
              if (substr($this->fecha_registro_salida, 10, 1) == "-") 
              { 
                 $this->fecha_registro_salida = substr($this->fecha_registro_salida, 0, 10) . " " . substr($this->fecha_registro_salida, 11);
              } 
              if (substr($this->fecha_registro_salida, 13, 1) == ".") 
              { 
                 $this->fecha_registro_salida = substr($this->fecha_registro_salida, 0, 13) . ":" . substr($this->fecha_registro_salida, 14, 2) . ":" . substr($this->fecha_registro_salida, 17);
              } 
              $this->nmgp_dados_select['fecha_registro_salida'] = $this->fecha_registro_salida;
              $this->fecha_entrega = $rs->fields[15] ; 
              if (substr($this->fecha_entrega, 10, 1) == "-") 
              { 
                 $this->fecha_entrega = substr($this->fecha_entrega, 0, 10) . " " . substr($this->fecha_entrega, 11);
              } 
              if (substr($this->fecha_entrega, 13, 1) == ".") 
              { 
                 $this->fecha_entrega = substr($this->fecha_entrega, 0, 13) . ":" . substr($this->fecha_entrega, 14, 2) . ":" . substr($this->fecha_entrega, 17);
              } 
              $this->nmgp_dados_select['fecha_entrega'] = $this->fecha_entrega;
              $this->minutos = $rs->fields[16] ; 
              $this->nmgp_dados_select['minutos'] = $this->minutos;
              $this->tokens = $rs->fields[17] ; 
              $this->nmgp_dados_select['tokens'] = $this->tokens;
              $this->rfid = $rs->fields[18] ; 
              $this->nmgp_dados_select['rfid'] = $this->rfid;
              $this->nombre = $rs->fields[19] ; 
              $this->nmgp_dados_select['nombre'] = $this->nombre;
              $this->apellido = $rs->fields[20] ; 
              $this->nmgp_dados_select['apellido'] = $this->apellido;
              $this->nickname = $rs->fields[21] ; 
              $this->nmgp_dados_select['nickname'] = $this->nickname;
              $this->birth_date = $rs->fields[22] ; 
              $this->nmgp_dados_select['birth_date'] = $this->birth_date;
              $this->genre = $rs->fields[23] ; 
              $this->nmgp_dados_select['genre'] = $this->genre;
              $this->idcliente = $rs->fields[24] ; 
              $this->nmgp_dados_select['idcliente'] = $this->idcliente;
              $this->parent = $rs->fields[25] ; 
              $this->nmgp_dados_select['parent'] = $this->parent;
              $this->points1 = $rs->fields[26] ; 
              $this->nmgp_dados_select['points1'] = $this->points1;
              $this->points2 = $rs->fields[27] ; 
              $this->nmgp_dados_select['points2'] = $this->points2;
              $this->points3 = $rs->fields[28] ; 
              $this->nmgp_dados_select['points3'] = $this->points3;
              $this->ultfecha = $rs->fields[29] ; 
              if (substr($this->ultfecha, 10, 1) == "-") 
              { 
                 $this->ultfecha = substr($this->ultfecha, 0, 10) . " " . substr($this->ultfecha, 11);
              } 
              if (substr($this->ultfecha, 13, 1) == ".") 
              { 
                 $this->ultfecha = substr($this->ultfecha, 0, 13) . ":" . substr($this->ultfecha, 14, 2) . ":" . substr($this->ultfecha, 17);
              } 
              $this->nmgp_dados_select['ultfecha'] = $this->ultfecha;
              $this->ult_iddevice = $rs->fields[30] ; 
              $this->nmgp_dados_select['ult_iddevice'] = $this->ult_iddevice;
              $this->rentado = $rs->fields[31] ; 
              $this->nmgp_dados_select['rentado'] = $this->rentado;
              $this->idcenter = $rs->fields[32] ; 
              $this->nmgp_dados_select['idcenter'] = $this->idcenter;
              $this->phone = $rs->fields[33] ; 
              $this->nmgp_dados_select['phone'] = $this->phone;
          $GLOBALS["NM_ERRO_IBASE"] = 0; 
              $this->idreg = (string)$this->idreg; 
              $this->uniqueidqr = (string)$this->uniqueidqr; 
              $this->estado = (string)$this->estado; 
              $this->entrada = (string)$this->entrada; 
              $this->jugador = (string)$this->jugador; 
              $this->visitante = (string)$this->visitante; 
              $this->tarjeta = (string)$this->tarjeta; 
              $this->comida = (string)$this->comida; 
              $this->idprod = (string)$this->idprod; 
              $this->cantidad = (string)$this->cantidad; 
              $this->minutos = (string)$this->minutos; 
              $this->tokens = (string)$this->tokens; 
              $this->points1 = (string)$this->points1; 
              $this->ult_iddevice = (string)$this->ult_iddevice; 
              $this->rentado = (string)$this->rentado; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['parms'] = "idreg?#?$this->idreg?@?uniqueidqr?#?$this->uniqueidqr?@?fecha_registro?#?$this->fecha_registro?@?estado?#?$this->estado?@?rfid?#?$this->rfid?@?";
          } 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['dados_select'] = $this->nmgp_dados_select;
          if (!$this->NM_ajax_flag || 'backup_line' != $this->NM_ajax_opcao)
          {
              $this->Nav_permite_ret = 0 != $_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['reg_start'];
              $this->Nav_permite_ava = $_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['reg_start'] < $qt_geral_reg_form_matrix_registro_mob;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['opcao']   = '';
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
              $this->idreg = "";  
              $this->nmgp_dados_form["idreg"] = $this->idreg;
              $this->uniqueidqr = "";  
              $this->nmgp_dados_form["uniqueidqr"] = $this->uniqueidqr;
              $this->fecha_registro = "";  
              $this->fecha_registro_hora = "" ;  
              $this->nmgp_dados_form["fecha_registro"] = $this->fecha_registro;
              $this->estado = "";  
              $this->nmgp_dados_form["estado"] = $this->estado;
              $this->entrada = "";  
              $this->nmgp_dados_form["entrada"] = $this->entrada;
              $this->jugador = "";  
              $this->nmgp_dados_form["jugador"] = $this->jugador;
              $this->visitante = "";  
              $this->nmgp_dados_form["visitante"] = $this->visitante;
              $this->tarjeta = "";  
              $this->nmgp_dados_form["tarjeta"] = $this->tarjeta;
              $this->comida = "";  
              $this->nmgp_dados_form["comida"] = $this->comida;
              $this->idprod = "";  
              $this->nmgp_dados_form["idprod"] = $this->idprod;
              $this->cantidad = "";  
              $this->nmgp_dados_form["cantidad"] = $this->cantidad;
              $this->fecha_entrada = "";  
              $this->fecha_entrada_hora = "" ;  
              $this->nmgp_dados_form["fecha_entrada"] = $this->fecha_entrada;
              $this->fecha_registro_entrada = "";  
              $this->fecha_registro_entrada_hora = "" ;  
              $this->nmgp_dados_form["fecha_registro_entrada"] = $this->fecha_registro_entrada;
              $this->fecha_salida = "";  
              $this->fecha_salida_hora = "" ;  
              $this->nmgp_dados_form["fecha_salida"] = $this->fecha_salida;
              $this->fecha_registro_salida = "";  
              $this->fecha_registro_salida_hora = "" ;  
              $this->nmgp_dados_form["fecha_registro_salida"] = $this->fecha_registro_salida;
              $this->fecha_entrega = "";  
              $this->fecha_entrega_hora = "" ;  
              $this->nmgp_dados_form["fecha_entrega"] = $this->fecha_entrega;
              $this->minutos = "";  
              $this->nmgp_dados_form["minutos"] = $this->minutos;
              $this->tokens = "";  
              $this->nmgp_dados_form["tokens"] = $this->tokens;
              $this->rfid = "";  
              $this->nmgp_dados_form["rfid"] = $this->rfid;
              $this->nombre = "";  
              $this->nmgp_dados_form["nombre"] = $this->nombre;
              $this->apellido = "";  
              $this->nmgp_dados_form["apellido"] = $this->apellido;
              $this->nickname = "";  
              $this->nmgp_dados_form["nickname"] = $this->nickname;
              $this->birth_date = "";  
              $this->birth_date_hora = "" ;  
              $this->nmgp_dados_form["birth_date"] = $this->birth_date;
              $this->genre = "";  
              $this->nmgp_dados_form["genre"] = $this->genre;
              $this->idcliente = "";  
              $this->nmgp_dados_form["idcliente"] = $this->idcliente;
              $this->parent = "";  
              $this->nmgp_dados_form["parent"] = $this->parent;
              $this->points1 = "";  
              $this->nmgp_dados_form["points1"] = $this->points1;
              $this->points2 = "";  
              $this->nmgp_dados_form["points2"] = $this->points2;
              $this->points3 = "";  
              $this->nmgp_dados_form["points3"] = $this->points3;
              $this->ultfecha = "";  
              $this->ultfecha_hora = "" ;  
              $this->nmgp_dados_form["ultfecha"] = $this->ultfecha;
              $this->ult_iddevice = "";  
              $this->nmgp_dados_form["ult_iddevice"] = $this->ult_iddevice;
              $this->rentado = "";  
              $this->nmgp_dados_form["rentado"] = $this->rentado;
              $this->idcenter = "";  
              $this->nmgp_dados_form["idcenter"] = $this->idcenter;
              $this->phone = "";  
              $this->nmgp_dados_form["phone"] = $this->phone;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['dados_form'] = $this->nmgp_dados_form;
              $this->formatado = false;
          }
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['foreign_key'] as $sFKName => $sFKValue)
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
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(rfid) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and fecha_registro = '$this->fecha_registro' and estado = $this->estado and rfid < '$this->rfid'" . $str_where_filter; 
         $rs = $this->Db->Execute("select max(rfid) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and fecha_registro = '$this->fecha_registro' and estado = $this->estado and rfid < '$this->rfid'" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(rfid) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and fecha_registro = '$this->fecha_registro' and estado = $this->estado and rfid < '$this->rfid'" . $str_where_filter; 
         $rs = $this->Db->Execute("select max(rfid) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and fecha_registro = '$this->fecha_registro' and estado = $this->estado and rfid < '$this->rfid'" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(rfid) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and TO_DATE(TO_CHAR(fecha_registro, 'yyyy-mm-dd hh24:hi:ss'), 'yyyy-mm-dd hh24:hi:ss') = '$this->fecha_registro' and estado = $this->estado and rfid < '$this->rfid'" . $str_where_filter; 
         $rs = $this->Db->Execute("select max(rfid) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and TO_DATE(TO_CHAR(fecha_registro, 'yyyy-mm-dd hh24:hi:ss'), 'yyyy-mm-dd hh24:hi:ss') = '$this->fecha_registro' and estado = $this->estado and rfid < '$this->rfid'" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(rfid) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and fecha_registro = '$this->fecha_registro' and estado = $this->estado and rfid < '$this->rfid'" . $str_where_filter; 
         $rs = $this->Db->Execute("select max(rfid) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and fecha_registro = '$this->fecha_registro' and estado = $this->estado and rfid < '$this->rfid'" . $str_where_filter); 
     }  
     else  
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(rfid) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and fecha_registro = '$this->fecha_registro' and estado = $this->estado and rfid < '$this->rfid'" . $str_where_filter; 
         $rs = $this->Db->Execute("select max(rfid) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and fecha_registro = '$this->fecha_registro' and estado = $this->estado and rfid < '$this->rfid'" . $str_where_filter); 
     }  
     if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
     { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
     }  
     if (isset($rs->fields[0]) && $rs->fields[0] != "") 
     { 
         $this->rfid = substr($this->Db->qstr($rs->fields[0]), 1, -1); 
         $rs->Close();  
         $this->nmgp_opcao = "igual";  
         return ;  
     } 
     $str_where_filter = ('' != $str_where_param) ? ' and ' . $str_where_param : '';
     if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(estado) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and fecha_registro = '$this->fecha_registro' and estado < $this->estado" . $str_where_filter; 
         $rs = $this->Db->Execute("select max(estado) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and fecha_registro = '$this->fecha_registro' and estado < $this->estado" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(estado) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and fecha_registro = '$this->fecha_registro' and estado < $this->estado" . $str_where_filter; 
         $rs = $this->Db->Execute("select max(estado) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and fecha_registro = '$this->fecha_registro' and estado < $this->estado" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(estado) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and TO_DATE(TO_CHAR(fecha_registro, 'yyyy-mm-dd hh24:hi:ss'), 'yyyy-mm-dd hh24:hi:ss') = '$this->fecha_registro' and estado < $this->estado" . $str_where_filter; 
         $rs = $this->Db->Execute("select max(estado) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and TO_DATE(TO_CHAR(fecha_registro, 'yyyy-mm-dd hh24:hi:ss'), 'yyyy-mm-dd hh24:hi:ss') = '$this->fecha_registro' and estado < $this->estado" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(estado) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and fecha_registro = '$this->fecha_registro' and estado < $this->estado" . $str_where_filter; 
         $rs = $this->Db->Execute("select max(estado) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and fecha_registro = '$this->fecha_registro' and estado < $this->estado" . $str_where_filter); 
     }  
     else  
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(estado) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and fecha_registro = '$this->fecha_registro' and estado < $this->estado" . $str_where_filter; 
         $rs = $this->Db->Execute("select max(estado) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and fecha_registro = '$this->fecha_registro' and estado < $this->estado" . $str_where_filter); 
     }  
     if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
     { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
     }  
     if (isset($rs->fields[0]) && $rs->fields[0] != "") 
     { 
         $this->estado = substr($this->Db->qstr($rs->fields[0]), 1, -1); 
         $rs->Close();  
     $str_where_filter = ('' != $str_where_param) ? ' and ' . $str_where_param : '';
         if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
         {
             $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(rfid) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and fecha_registro = '$this->fecha_registro' and estado = $this->estado" . $str_where_filter; 
             $rs = $this->Db->Execute("select max(rfid) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and fecha_registro = '$this->fecha_registro' and estado = $this->estado" . $str_where_filter); 
         }  
         elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
         {
             $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(rfid) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and fecha_registro = '$this->fecha_registro' and estado = $this->estado" . $str_where_filter; 
             $rs = $this->Db->Execute("select max(rfid) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and fecha_registro = '$this->fecha_registro' and estado = $this->estado" . $str_where_filter); 
         }  
         elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
         {
             $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(rfid) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and TO_DATE(TO_CHAR(fecha_registro, 'yyyy-mm-dd hh24:mi:ss'), 'yyyy-mm-dd hh24:mi:ss') = '$this->fecha_registro' and estado = $this->estado" . $str_where_filter; 
             $rs = $this->Db->Execute("select max(rfid) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and TO_DATE(TO_CHAR(fecha_registro, 'yyyy-mm-dd hh24:mi:ss'), 'yyyy-mm-dd hh24:mi:ss') = '$this->fecha_registro' and estado = $this->estado" . $str_where_filter); 
         }  
         elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
         {
             $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(rfid) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and fecha_registro = '$this->fecha_registro' and estado = $this->estado" . $str_where_filter; 
             $rs = $this->Db->Execute("select max(rfid) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and fecha_registro = '$this->fecha_registro' and estado = $this->estado" . $str_where_filter); 
         }  
         else  
         {
             $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(rfid) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and fecha_registro = '$this->fecha_registro' and estado = $this->estado" . $str_where_filter; 
             $rs = $this->Db->Execute("select max(rfid) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and fecha_registro = '$this->fecha_registro' and estado = $this->estado" . $str_where_filter); 
         }  
         $this->rfid = substr($this->Db->qstr($rs->fields[0]), 1, -1); 
         $rs->Close();  
         $this->nmgp_opcao = "igual";  
         return ;  
     } 
     $str_where_filter = ('' != $str_where_param) ? ' and ' . $str_where_param : '';
     if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(fecha_registro) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and fecha_registro < '$this->fecha_registro'" . $str_where_filter; 
         $rs = $this->Db->Execute("select max(fecha_registro) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and fecha_registro < '$this->fecha_registro'" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(fecha_registro) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and fecha_registro < '$this->fecha_registro'" . $str_where_filter; 
         $rs = $this->Db->Execute("select max(fecha_registro) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and fecha_registro < '$this->fecha_registro'" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(TO_DATE(TO_CHAR(fecha_registro, 'yyyy-mm-dd hh24:mi:ss'), 'yyyy-mm-dd hh24:mi:ss')) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and TO_DATE(TO_CHAR(fecha_registro, 'yyyy-mm-dd hh24:mi:ss'), 'yyyy-mm-dd hh24:mi:ss') < '$this->fecha_registro'" . $str_where_filter; 
         $rs = $this->Db->Execute("select max(TO_DATE(TO_CHAR(fecha_registro, 'yyyy-mm-dd hh24:mi:ss'), 'yyyy-mm-dd hh24:mi:ss')) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and TO_DATE(TO_CHAR(fecha_registro, 'yyyy-mm-dd hh24:mi:ss'), 'yyyy-mm-dd hh24:mi:ss') < '$this->fecha_registro'" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(fecha_registro) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and fecha_registro < '$this->fecha_registro'" . $str_where_filter; 
         $rs = $this->Db->Execute("select max(fecha_registro) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and fecha_registro < '$this->fecha_registro'" . $str_where_filter); 
     }  
     else  
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(fecha_registro) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and fecha_registro < '$this->fecha_registro'" . $str_where_filter; 
         $rs = $this->Db->Execute("select max(fecha_registro) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and fecha_registro < '$this->fecha_registro'" . $str_where_filter); 
     }  
     if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
     { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
     }  
     if (isset($rs->fields[0]) && $rs->fields[0] != "") 
     { 
         $this->fecha_registro = substr($this->Db->qstr($rs->fields[0]), 1, -1); 
         $rs->Close();  
     $str_where_filter = ('' != $str_where_param) ? ' and ' . $str_where_param : '';
         if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
         {
             $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(estado) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and fecha_registro = '$this->fecha_registro'" . $str_where_filter; 
             $rs = $this->Db->Execute("select max(estado) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and fecha_registro = '$this->fecha_registro'" . $str_where_filter); 
         }  
         elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
         {
             $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(estado) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and fecha_registro = '$this->fecha_registro'" . $str_where_filter; 
             $rs = $this->Db->Execute("select max(estado) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and fecha_registro = '$this->fecha_registro'" . $str_where_filter); 
         }  
         elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
         {
             $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(estado) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and TO_DATE(TO_CHAR(fecha_registro, 'yyyy-mm-dd hh24:mi:ss'), 'yyyy-mm-dd hh24:mi:ss') = '$this->fecha_registro'" . $str_where_filter; 
             $rs = $this->Db->Execute("select max(estado) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and TO_DATE(TO_CHAR(fecha_registro, 'yyyy-mm-dd hh24:mi:ss'), 'yyyy-mm-dd hh24:mi:ss') = '$this->fecha_registro'" . $str_where_filter); 
         }  
         elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
         {
             $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(estado) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and fecha_registro = '$this->fecha_registro'" . $str_where_filter; 
             $rs = $this->Db->Execute("select max(estado) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and fecha_registro = '$this->fecha_registro'" . $str_where_filter); 
         }  
         else  
         {
             $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(estado) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and fecha_registro = '$this->fecha_registro'" . $str_where_filter; 
             $rs = $this->Db->Execute("select max(estado) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and fecha_registro = '$this->fecha_registro'" . $str_where_filter); 
         }  
         $this->estado = substr($this->Db->qstr($rs->fields[0]), 1, -1); 
         $rs->Close();  
     $str_where_filter = ('' != $str_where_param) ? ' and ' . $str_where_param : '';
         if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
         {
             $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(rfid) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and fecha_registro = '$this->fecha_registro' and estado = $this->estado" . $str_where_filter; 
             $rs = $this->Db->Execute("select max(rfid) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and fecha_registro = '$this->fecha_registro' and estado = $this->estado" . $str_where_filter); 
         }  
         elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
         {
             $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(rfid) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and fecha_registro = '$this->fecha_registro' and estado = $this->estado" . $str_where_filter; 
             $rs = $this->Db->Execute("select max(rfid) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and fecha_registro = '$this->fecha_registro' and estado = $this->estado" . $str_where_filter); 
         }  
         elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
         {
             $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(rfid) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and TO_DATE(TO_CHAR(fecha_registro, 'yyyy-mm-dd hh24:mi:ss'), 'yyyy-mm-dd hh24:mi:ss') = '$this->fecha_registro' and estado = $this->estado" . $str_where_filter; 
             $rs = $this->Db->Execute("select max(rfid) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and TO_DATE(TO_CHAR(fecha_registro, 'yyyy-mm-dd hh24:mi:ss'), 'yyyy-mm-dd hh24:mi:ss') = '$this->fecha_registro' and estado = $this->estado" . $str_where_filter); 
         }  
         elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
         {
             $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(rfid) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and fecha_registro = '$this->fecha_registro' and estado = $this->estado" . $str_where_filter; 
             $rs = $this->Db->Execute("select max(rfid) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and fecha_registro = '$this->fecha_registro' and estado = $this->estado" . $str_where_filter); 
         }  
         else  
         {
             $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(rfid) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and fecha_registro = '$this->fecha_registro' and estado = $this->estado" . $str_where_filter; 
             $rs = $this->Db->Execute("select max(rfid) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and fecha_registro = '$this->fecha_registro' and estado = $this->estado" . $str_where_filter); 
         }  
         $this->rfid = substr($this->Db->qstr($rs->fields[0]), 1, -1); 
         $rs->Close();  
         $this->nmgp_opcao = "igual";  
         return ;  
     } 
     $str_where_filter = ('' != $str_where_param) ? ' and ' . $str_where_param : '';
     if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(uniqueidqr) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr < $this->uniqueidqr" . $str_where_filter; 
         $rs = $this->Db->Execute("select max(uniqueidqr) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr < $this->uniqueidqr" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(uniqueidqr) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr < $this->uniqueidqr" . $str_where_filter; 
         $rs = $this->Db->Execute("select max(uniqueidqr) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr < $this->uniqueidqr" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(uniqueidqr) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr < $this->uniqueidqr" . $str_where_filter; 
         $rs = $this->Db->Execute("select max(uniqueidqr) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr < $this->uniqueidqr" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(uniqueidqr) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr < $this->uniqueidqr" . $str_where_filter; 
         $rs = $this->Db->Execute("select max(uniqueidqr) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr < $this->uniqueidqr" . $str_where_filter); 
     }  
     else  
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(uniqueidqr) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr < $this->uniqueidqr" . $str_where_filter; 
         $rs = $this->Db->Execute("select max(uniqueidqr) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr < $this->uniqueidqr" . $str_where_filter); 
     }  
     if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
     { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
     }  
     if (isset($rs->fields[0]) && $rs->fields[0] != "") 
     { 
         $this->uniqueidqr = substr($this->Db->qstr($rs->fields[0]), 1, -1); 
         $rs->Close();  
     $str_where_filter = ('' != $str_where_param) ? ' and ' . $str_where_param : '';
         if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
         {
             $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(fecha_registro) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr" . $str_where_filter; 
             $rs = $this->Db->Execute("select max(fecha_registro) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr" . $str_where_filter); 
         }  
         elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
         {
             $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(fecha_registro) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr" . $str_where_filter; 
             $rs = $this->Db->Execute("select max(fecha_registro) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr" . $str_where_filter); 
         }  
         elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
         {
             $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(TO_DATE(TO_CHAR(fecha_registro, 'yyyy-mm-dd hh24:mi:ss'), 'yyyy-mm-dd hh24:mi:ss')) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr" . $str_where_filter; 
             $rs = $this->Db->Execute("select max(TO_DATE(TO_CHAR(fecha_registro, 'yyyy-mm-dd hh24:mi:ss'), 'yyyy-mm-dd hh24:mi:ss')) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr" . $str_where_filter); 
         }  
         elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
         {
             $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(fecha_registro) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr" . $str_where_filter; 
             $rs = $this->Db->Execute("select max(fecha_registro) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr" . $str_where_filter); 
         }  
         else  
         {
             $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(fecha_registro) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr" . $str_where_filter; 
             $rs = $this->Db->Execute("select max(fecha_registro) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr" . $str_where_filter); 
         }  
         $this->fecha_registro = substr($this->Db->qstr($rs->fields[0]), 1, -1); 
         $rs->Close();  
     $str_where_filter = ('' != $str_where_param) ? ' and ' . $str_where_param : '';
         if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
         {
             $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(estado) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and fecha_registro = '$this->fecha_registro'" . $str_where_filter; 
             $rs = $this->Db->Execute("select max(estado) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and fecha_registro = '$this->fecha_registro'" . $str_where_filter); 
         }  
         elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
         {
             $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(estado) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and fecha_registro = '$this->fecha_registro'" . $str_where_filter; 
             $rs = $this->Db->Execute("select max(estado) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and fecha_registro = '$this->fecha_registro'" . $str_where_filter); 
         }  
         elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
         {
             $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(estado) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and TO_DATE(TO_CHAR(fecha_registro, 'yyyy-mm-dd hh24:mi:ss'), 'yyyy-mm-dd hh24:mi:ss') = '$this->fecha_registro'" . $str_where_filter; 
             $rs = $this->Db->Execute("select max(estado) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and TO_DATE(TO_CHAR(fecha_registro, 'yyyy-mm-dd hh24:mi:ss'), 'yyyy-mm-dd hh24:mi:ss') = '$this->fecha_registro'" . $str_where_filter); 
         }  
         elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
         {
             $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(estado) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and fecha_registro = '$this->fecha_registro'" . $str_where_filter; 
             $rs = $this->Db->Execute("select max(estado) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and fecha_registro = '$this->fecha_registro'" . $str_where_filter); 
         }  
         else  
         {
             $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(estado) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and fecha_registro = '$this->fecha_registro'" . $str_where_filter; 
             $rs = $this->Db->Execute("select max(estado) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and fecha_registro = '$this->fecha_registro'" . $str_where_filter); 
         }  
         $this->estado = substr($this->Db->qstr($rs->fields[0]), 1, -1); 
         $rs->Close();  
     $str_where_filter = ('' != $str_where_param) ? ' and ' . $str_where_param : '';
         if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
         {
             $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(rfid) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and fecha_registro = '$this->fecha_registro' and estado = $this->estado" . $str_where_filter; 
             $rs = $this->Db->Execute("select max(rfid) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and fecha_registro = '$this->fecha_registro' and estado = $this->estado" . $str_where_filter); 
         }  
         elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
         {
             $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(rfid) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and fecha_registro = '$this->fecha_registro' and estado = $this->estado" . $str_where_filter; 
             $rs = $this->Db->Execute("select max(rfid) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and fecha_registro = '$this->fecha_registro' and estado = $this->estado" . $str_where_filter); 
         }  
         elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
         {
             $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(rfid) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and TO_DATE(TO_CHAR(fecha_registro, 'yyyy-mm-dd hh24:mi:ss'), 'yyyy-mm-dd hh24:mi:ss') = '$this->fecha_registro' and estado = $this->estado" . $str_where_filter; 
             $rs = $this->Db->Execute("select max(rfid) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and TO_DATE(TO_CHAR(fecha_registro, 'yyyy-mm-dd hh24:mi:ss'), 'yyyy-mm-dd hh24:mi:ss') = '$this->fecha_registro' and estado = $this->estado" . $str_where_filter); 
         }  
         elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
         {
             $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(rfid) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and fecha_registro = '$this->fecha_registro' and estado = $this->estado" . $str_where_filter; 
             $rs = $this->Db->Execute("select max(rfid) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and fecha_registro = '$this->fecha_registro' and estado = $this->estado" . $str_where_filter); 
         }  
         else  
         {
             $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(rfid) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and fecha_registro = '$this->fecha_registro' and estado = $this->estado" . $str_where_filter; 
             $rs = $this->Db->Execute("select max(rfid) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and fecha_registro = '$this->fecha_registro' and estado = $this->estado" . $str_where_filter); 
         }  
         $this->rfid = substr($this->Db->qstr($rs->fields[0]), 1, -1); 
         $rs->Close();  
         $this->nmgp_opcao = "igual";  
         return ;  
     } 
     $str_where_filter = ('' != $str_where_param) ? ' and ' . $str_where_param : '';
     if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(idreg) from " . $this->Ini->nm_tabela . " where idreg < $this->idreg" . $str_where_filter; 
         $rs = $this->Db->Execute("select max(idreg) from " . $this->Ini->nm_tabela . " where idreg < $this->idreg" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(idreg) from " . $this->Ini->nm_tabela . " where idreg < $this->idreg" . $str_where_filter; 
         $rs = $this->Db->Execute("select max(idreg) from " . $this->Ini->nm_tabela . " where idreg < $this->idreg" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(idreg) from " . $this->Ini->nm_tabela . " where idreg < $this->idreg" . $str_where_filter; 
         $rs = $this->Db->Execute("select max(idreg) from " . $this->Ini->nm_tabela . " where idreg < $this->idreg" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(idreg) from " . $this->Ini->nm_tabela . " where idreg < $this->idreg" . $str_where_filter; 
         $rs = $this->Db->Execute("select max(idreg) from " . $this->Ini->nm_tabela . " where idreg < $this->idreg" . $str_where_filter); 
     }  
     else  
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(idreg) from " . $this->Ini->nm_tabela . " where idreg < $this->idreg" . $str_where_filter; 
         $rs = $this->Db->Execute("select max(idreg) from " . $this->Ini->nm_tabela . " where idreg < $this->idreg" . $str_where_filter); 
     }  
     if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
     { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
     }  
     if (isset($rs->fields[0]) && $rs->fields[0] != "") 
     { 
         $this->idreg = substr($this->Db->qstr($rs->fields[0]), 1, -1); 
         $rs->Close();  
     } 
     else 
     { 
        $this->nmgp_opcao = "inicio";  
        $rs->Close();  
        return ; 
     } 
     $str_where_filter = ('' != $str_where_param) ? ' and ' . $str_where_param : '';
     if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(uniqueidqr) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg" . $str_where_filter; 
         $rs = $this->Db->Execute("select max(uniqueidqr) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(uniqueidqr) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg" . $str_where_filter; 
         $rs = $this->Db->Execute("select max(uniqueidqr) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(uniqueidqr) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg" . $str_where_filter; 
         $rs = $this->Db->Execute("select max(uniqueidqr) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(uniqueidqr) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg" . $str_where_filter; 
         $rs = $this->Db->Execute("select max(uniqueidqr) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg" . $str_where_filter); 
     }  
     else  
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(uniqueidqr) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg" . $str_where_filter; 
         $rs = $this->Db->Execute("select max(uniqueidqr) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg" . $str_where_filter); 
     }  
     $this->uniqueidqr = substr($this->Db->qstr($rs->fields[0]), 1, -1); 
     $rs->Close();  
     $str_where_filter = ('' != $str_where_param) ? ' and ' . $str_where_param : '';
     if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(fecha_registro) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr" . $str_where_filter; 
         $rs = $this->Db->Execute("select max(fecha_registro) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(fecha_registro) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr" . $str_where_filter; 
         $rs = $this->Db->Execute("select max(fecha_registro) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(TO_DATE(TO_CHAR(fecha_registro, 'yyyy-mm-dd hh24:mi:ss'), 'yyyy-mm-dd hh24:mi:ss')) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr" . $str_where_filter; 
         $rs = $this->Db->Execute("select max(TO_DATE(TO_CHAR(fecha_registro, 'yyyy-mm-dd hh24:mi:ss'), 'yyyy-mm-dd hh24:mi:ss')) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(fecha_registro) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr" . $str_where_filter; 
         $rs = $this->Db->Execute("select max(fecha_registro) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr" . $str_where_filter); 
     }  
     else  
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(fecha_registro) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr" . $str_where_filter; 
         $rs = $this->Db->Execute("select max(fecha_registro) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr" . $str_where_filter); 
     }  
     $this->fecha_registro = substr($this->Db->qstr($rs->fields[0]), 1, -1); 
     $rs->Close();  
     $str_where_filter = ('' != $str_where_param) ? ' and ' . $str_where_param : '';
     if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(estado) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and fecha_registro = '$this->fecha_registro'" . $str_where_filter; 
         $rs = $this->Db->Execute("select max(estado) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and fecha_registro = '$this->fecha_registro'" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(estado) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and fecha_registro = '$this->fecha_registro'" . $str_where_filter; 
         $rs = $this->Db->Execute("select max(estado) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and fecha_registro = '$this->fecha_registro'" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(estado) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and TO_DATE(TO_CHAR(fecha_registro, 'yyyy-mm-dd hh24:mi:ss'), 'yyyy-mm-dd hh24:mi:ss') = '$this->fecha_registro'" . $str_where_filter; 
         $rs = $this->Db->Execute("select max(estado) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and TO_DATE(TO_CHAR(fecha_registro, 'yyyy-mm-dd hh24:mi:ss'), 'yyyy-mm-dd hh24:mi:ss') = '$this->fecha_registro'" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(estado) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and fecha_registro = '$this->fecha_registro'" . $str_where_filter; 
         $rs = $this->Db->Execute("select max(estado) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and fecha_registro = '$this->fecha_registro'" . $str_where_filter); 
     }  
     else  
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(estado) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and fecha_registro = '$this->fecha_registro'" . $str_where_filter; 
         $rs = $this->Db->Execute("select max(estado) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and fecha_registro = '$this->fecha_registro'" . $str_where_filter); 
     }  
     $this->estado = substr($this->Db->qstr($rs->fields[0]), 1, -1); 
     $rs->Close();  
     $str_where_filter = ('' != $str_where_param) ? ' and ' . $str_where_param : '';
     if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(rfid) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and fecha_registro = '$this->fecha_registro' and estado = $this->estado" . $str_where_filter; 
         $rs = $this->Db->Execute("select max(rfid) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and fecha_registro = '$this->fecha_registro' and estado = $this->estado" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(rfid) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and fecha_registro = '$this->fecha_registro' and estado = $this->estado" . $str_where_filter; 
         $rs = $this->Db->Execute("select max(rfid) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and fecha_registro = '$this->fecha_registro' and estado = $this->estado" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(rfid) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and TO_DATE(TO_CHAR(fecha_registro, 'yyyy-mm-dd hh24:mi:ss'), 'yyyy-mm-dd hh24:mi:ss') = '$this->fecha_registro' and estado = $this->estado" . $str_where_filter; 
         $rs = $this->Db->Execute("select max(rfid) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and TO_DATE(TO_CHAR(fecha_registro, 'yyyy-mm-dd hh24:mi:ss'), 'yyyy-mm-dd hh24:mi:ss') = '$this->fecha_registro' and estado = $this->estado" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(rfid) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and fecha_registro = '$this->fecha_registro' and estado = $this->estado" . $str_where_filter; 
         $rs = $this->Db->Execute("select max(rfid) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and fecha_registro = '$this->fecha_registro' and estado = $this->estado" . $str_where_filter); 
     }  
     else  
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(rfid) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and fecha_registro = '$this->fecha_registro' and estado = $this->estado" . $str_where_filter; 
         $rs = $this->Db->Execute("select max(rfid) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and fecha_registro = '$this->fecha_registro' and estado = $this->estado" . $str_where_filter); 
     }  
     $this->rfid = substr($this->Db->qstr($rs->fields[0]), 1, -1); 
     $rs->Close();  
     $this->nmgp_opcao = "igual";  
     return ;  
   } 
// 
//-- 
   function nm_db_avanca($str_where_param = '') 
   {  
     $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
     $str_where_filter = ('' != $str_where_param) ? ' and ' . $str_where_param : '';
     if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(rfid) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and fecha_registro = '$this->fecha_registro' and estado = $this->estado and rfid > '$this->rfid'" . $str_where_filter; 
         $rs = $this->Db->Execute("select min(rfid) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and fecha_registro = '$this->fecha_registro' and estado = $this->estado and rfid > '$this->rfid'" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(rfid) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and fecha_registro = '$this->fecha_registro' and estado = $this->estado and rfid > '$this->rfid'" . $str_where_filter; 
         $rs = $this->Db->Execute("select min(rfid) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and fecha_registro = '$this->fecha_registro' and estado = $this->estado and rfid > '$this->rfid'" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(rfid) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and TO_DATE(TO_CHAR(fecha_registro, 'yyyy-mm-dd hh24:mi:ss') = '$this->fecha_registro' and estado = $this->estado and rfid > '$this->rfid'" . $str_where_filter; 
         $rs = $this->Db->Execute("select min(rfid) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and TO_DATE(TO_CHAR(fecha_registro, 'yyyy-mm-dd hh24:mi:ss') = '$this->fecha_registro' and estado = $this->estado and rfid > '$this->rfid'" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(rfid) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and fecha_registro = '$this->fecha_registro' and estado = $this->estado and rfid > '$this->rfid'" . $str_where_filter; 
         $rs = $this->Db->Execute("select min(rfid) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and fecha_registro = '$this->fecha_registro' and estado = $this->estado and rfid > '$this->rfid'" . $str_where_filter); 
     }  
     else  
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(rfid) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and fecha_registro = '$this->fecha_registro' and estado = $this->estado and rfid > '$this->rfid'" . $str_where_filter; 
         $rs = $this->Db->Execute("select min(rfid) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and fecha_registro = '$this->fecha_registro' and estado = $this->estado and rfid > '$this->rfid'" . $str_where_filter); 
     }  
     if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
     { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
     }  
     if (isset($rs->fields[0]) && $rs->fields[0] != "") 
     { 
         $this->rfid = substr($this->Db->qstr($rs->fields[0]), 1, -1); 
         $rs->Close();  
         $this->nmgp_opcao = "igual";  
         return ;  
     } 
     $str_where_filter = ('' != $str_where_param) ? ' and ' . $str_where_param : '';
     if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(estado) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and fecha_registro = '$this->fecha_registro' and estado > $this->estado" . $str_where_filter; 
         $rs = $this->Db->Execute("select min(estado) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and fecha_registro = '$this->fecha_registro' and estado > $this->estado" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(estado) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and fecha_registro = '$this->fecha_registro' and estado > $this->estado" . $str_where_filter; 
         $rs = $this->Db->Execute("select min(estado) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and fecha_registro = '$this->fecha_registro' and estado > $this->estado" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(estado) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and TO_DATE(TO_CHAR(fecha_registro, 'yyyy-mm-dd hh24:mi:ss') = '$this->fecha_registro' and estado > $this->estado" . $str_where_filter; 
         $rs = $this->Db->Execute("select min(estado) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and TO_DATE(TO_CHAR(fecha_registro, 'yyyy-mm-dd hh24:mi:ss') = '$this->fecha_registro' and estado > $this->estado" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(estado) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and fecha_registro = '$this->fecha_registro' and estado > $this->estado" . $str_where_filter; 
         $rs = $this->Db->Execute("select min(estado) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and fecha_registro = '$this->fecha_registro' and estado > $this->estado" . $str_where_filter); 
     }  
     else  
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(estado) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and fecha_registro = '$this->fecha_registro' and estado > $this->estado" . $str_where_filter; 
         $rs = $this->Db->Execute("select min(estado) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and fecha_registro = '$this->fecha_registro' and estado > $this->estado" . $str_where_filter); 
     }  
     if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
     { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
     }  
     if (isset($rs->fields[0]) && $rs->fields[0] != "") 
     { 
         $this->estado = substr($this->Db->qstr($rs->fields[0]), 1, -1); 
         $rs->Close();  
     $str_where_filter = ('' != $str_where_param) ? ' and ' . $str_where_param : '';
         if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
         {
             $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(rfid) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and fecha_registro = '$this->fecha_registro' and estado = $this->estado" . $str_where_filter; 
             $rs = $this->Db->Execute("select min(rfid) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and fecha_registro = '$this->fecha_registro' and estado = $this->estado" . $str_where_filter); 
         }  
         elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
         {
             $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(rfid) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and fecha_registro = '$this->fecha_registro' and estado = $this->estado" . $str_where_filter; 
             $rs = $this->Db->Execute("select min(rfid) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and fecha_registro = '$this->fecha_registro' and estado = $this->estado" . $str_where_filter); 
         }  
         elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
         {
             $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(rfid) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and TO_DATE(TO_CHAR(fecha_registro, 'yyyy-mm-dd hh24:mi:ss'), 'yyyy-mm-dd hh24:mi:ss') = '$this->fecha_registro' and estado = $this->estado" . $str_where_filter; 
             $rs = $this->Db->Execute("select min(rfid) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and TO_DATE(TO_CHAR(fecha_registro, 'yyyy-mm-dd hh24:mi:ss'), 'yyyy-mm-dd hh24:mi:ss') = '$this->fecha_registro' and estado = $this->estado" . $str_where_filter); 
         }  
         elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
         {
             $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(rfid) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and fecha_registro = '$this->fecha_registro' and estado = $this->estado" . $str_where_filter; 
             $rs = $this->Db->Execute("select min(rfid) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and fecha_registro = '$this->fecha_registro' and estado = $this->estado" . $str_where_filter); 
         }  
         else  
         {
             $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(rfid) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and fecha_registro = '$this->fecha_registro' and estado = $this->estado" . $str_where_filter; 
             $rs = $this->Db->Execute("select min(rfid) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and fecha_registro = '$this->fecha_registro' and estado = $this->estado" . $str_where_filter); 
         }  
         $this->rfid = substr($this->Db->qstr($rs->fields[0]), 1, -1); 
         $this->nmgp_opcao = "igual";  
         return ;  
     } 
     $str_where_filter = ('' != $str_where_param) ? ' and ' . $str_where_param : '';
     if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(fecha_registro) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and fecha_registro > '$this->fecha_registro'" . $str_where_filter; 
         $rs = $this->Db->Execute("select min(fecha_registro) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and fecha_registro > '$this->fecha_registro'" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(fecha_registro) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and fecha_registro > '$this->fecha_registro'" . $str_where_filter; 
         $rs = $this->Db->Execute("select min(fecha_registro) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and fecha_registro > '$this->fecha_registro'" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(TO_DATE(TO_CHAR(fecha_registro, 'yyyy-mm-dd hh24:mi:ss'), 'yyyy-mm-dd hh24:mi:ss')) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and TO_DATE(TO_CHAR(fecha_registro, 'yyyy-mm-dd hh24:mi:ss'), 'yyyy-mm-dd hh24:mi:ss') > '$this->fecha_registro'" . $str_where_filter; 
         $rs = $this->Db->Execute("select min(TO_DATE(TO_CHAR(fecha_registro, 'yyyy-mm-dd hh24:mi:ss'), 'yyyy-mm-dd hh24:mi:ss')) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and TO_DATE(TO_CHAR(fecha_registro, 'yyyy-mm-dd hh24:mi:ss'), 'yyyy-mm-dd hh24:mi:ss') > '$this->fecha_registro'" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(fecha_registro) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and fecha_registro > '$this->fecha_registro'" . $str_where_filter; 
         $rs = $this->Db->Execute("select min(fecha_registro) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and fecha_registro > '$this->fecha_registro'" . $str_where_filter); 
     }  
     else  
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(fecha_registro) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and fecha_registro > '$this->fecha_registro'" . $str_where_filter; 
         $rs = $this->Db->Execute("select min(fecha_registro) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and fecha_registro > '$this->fecha_registro'" . $str_where_filter); 
     }  
     if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
     { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
     }  
     if (isset($rs->fields[0]) && $rs->fields[0] != "") 
     { 
         $this->fecha_registro = substr($this->Db->qstr($rs->fields[0]), 1, -1); 
         $rs->Close();  
     $str_where_filter = ('' != $str_where_param) ? ' and ' . $str_where_param : '';
         if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
         {
             $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(estado) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and fecha_registro = '$this->fecha_registro'" . $str_where_filter; 
             $rs = $this->Db->Execute("select min(estado) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and fecha_registro = '$this->fecha_registro'" . $str_where_filter); 
         }  
         elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
         {
             $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(estado) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and fecha_registro = '$this->fecha_registro'" . $str_where_filter; 
             $rs = $this->Db->Execute("select min(estado) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and fecha_registro = '$this->fecha_registro'" . $str_where_filter); 
         }  
         elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
         {
             $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(estado) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and TO_DATE(TO_CHAR(fecha_registro, 'yyyy-mm-dd hh24:mi:ss'), 'yyyy-mm-dd hh24:mi:ss') = '$this->fecha_registro'" . $str_where_filter; 
             $rs = $this->Db->Execute("select min(estado) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and TO_DATE(TO_CHAR(fecha_registro, 'yyyy-mm-dd hh24:mi:ss'), 'yyyy-mm-dd hh24:mi:ss') = '$this->fecha_registro'" . $str_where_filter); 
         }  
         elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
         {
             $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(estado) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and fecha_registro = '$this->fecha_registro'" . $str_where_filter; 
             $rs = $this->Db->Execute("select min(estado) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and fecha_registro = '$this->fecha_registro'" . $str_where_filter); 
         }  
         else  
         {
             $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(estado) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and fecha_registro = '$this->fecha_registro'" . $str_where_filter; 
             $rs = $this->Db->Execute("select min(estado) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and fecha_registro = '$this->fecha_registro'" . $str_where_filter); 
         }  
         $this->estado = substr($this->Db->qstr($rs->fields[0]), 1, -1); 
     $str_where_filter = ('' != $str_where_param) ? ' and ' . $str_where_param : '';
         if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
         {
             $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(rfid) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and fecha_registro = '$this->fecha_registro' and estado = $this->estado" . $str_where_filter; 
             $rs = $this->Db->Execute("select min(rfid) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and fecha_registro = '$this->fecha_registro' and estado = $this->estado" . $str_where_filter); 
         }  
         elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
         {
             $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(rfid) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and fecha_registro = '$this->fecha_registro' and estado = $this->estado" . $str_where_filter; 
             $rs = $this->Db->Execute("select min(rfid) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and fecha_registro = '$this->fecha_registro' and estado = $this->estado" . $str_where_filter); 
         }  
         elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
         {
             $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(rfid) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and TO_DATE(TO_CHAR(fecha_registro, 'yyyy-mm-dd hh24:mi:ss'), 'yyyy-mm-dd hh24:mi:ss') = '$this->fecha_registro' and estado = $this->estado" . $str_where_filter; 
             $rs = $this->Db->Execute("select min(rfid) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and TO_DATE(TO_CHAR(fecha_registro, 'yyyy-mm-dd hh24:mi:ss'), 'yyyy-mm-dd hh24:mi:ss') = '$this->fecha_registro' and estado = $this->estado" . $str_where_filter); 
         }  
         elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
         {
             $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(rfid) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and fecha_registro = '$this->fecha_registro' and estado = $this->estado" . $str_where_filter; 
             $rs = $this->Db->Execute("select min(rfid) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and fecha_registro = '$this->fecha_registro' and estado = $this->estado" . $str_where_filter); 
         }  
         else  
         {
             $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(rfid) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and fecha_registro = '$this->fecha_registro' and estado = $this->estado" . $str_where_filter; 
             $rs = $this->Db->Execute("select min(rfid) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and fecha_registro = '$this->fecha_registro' and estado = $this->estado" . $str_where_filter); 
         }  
         $this->rfid = substr($this->Db->qstr($rs->fields[0]), 1, -1); 
         $this->nmgp_opcao = "igual";  
         return ;  
     } 
     $str_where_filter = ('' != $str_where_param) ? ' and ' . $str_where_param : '';
     if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(uniqueidqr) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr > $this->uniqueidqr" . $str_where_filter; 
         $rs = $this->Db->Execute("select min(uniqueidqr) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr > $this->uniqueidqr" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(uniqueidqr) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr > $this->uniqueidqr" . $str_where_filter; 
         $rs = $this->Db->Execute("select min(uniqueidqr) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr > $this->uniqueidqr" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(uniqueidqr) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr > $this->uniqueidqr" . $str_where_filter; 
         $rs = $this->Db->Execute("select min(uniqueidqr) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr > $this->uniqueidqr" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(uniqueidqr) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr > $this->uniqueidqr" . $str_where_filter; 
         $rs = $this->Db->Execute("select min(uniqueidqr) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr > $this->uniqueidqr" . $str_where_filter); 
     }  
     else  
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(uniqueidqr) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr > $this->uniqueidqr" . $str_where_filter; 
         $rs = $this->Db->Execute("select min(uniqueidqr) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr > $this->uniqueidqr" . $str_where_filter); 
     }  
     if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
     { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
     }  
     if (isset($rs->fields[0]) && $rs->fields[0] != "") 
     { 
         $this->uniqueidqr = substr($this->Db->qstr($rs->fields[0]), 1, -1); 
         $rs->Close();  
     $str_where_filter = ('' != $str_where_param) ? ' and ' . $str_where_param : '';
         if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
         {
             $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(fecha_registro) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr" . $str_where_filter; 
             $rs = $this->Db->Execute("select min(fecha_registro) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr" . $str_where_filter); 
         }  
         elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
         {
             $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(fecha_registro) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr" . $str_where_filter; 
             $rs = $this->Db->Execute("select min(fecha_registro) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr" . $str_where_filter); 
         }  
         elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
         {
             $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(TO_DATE(TO_CHAR(fecha_registro, 'yyyy-mm-dd hh24:mi:ss'), 'yyyy-mm-dd hh24:mi:ss')) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr" . $str_where_filter; 
             $rs = $this->Db->Execute("select min(TO_DATE(TO_CHAR(fecha_registro, 'yyyy-mm-dd hh24:mi:ss'), 'yyyy-mm-dd hh24:mi:ss')) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr" . $str_where_filter); 
         }  
         elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
         {
             $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(fecha_registro) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr" . $str_where_filter; 
             $rs = $this->Db->Execute("select min(fecha_registro) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr" . $str_where_filter); 
         }  
         else  
         {
             $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(fecha_registro) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr" . $str_where_filter; 
             $rs = $this->Db->Execute("select min(fecha_registro) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr" . $str_where_filter); 
         }  
         $this->fecha_registro = substr($this->Db->qstr($rs->fields[0]), 1, -1); 
     $str_where_filter = ('' != $str_where_param) ? ' and ' . $str_where_param : '';
         if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
         {
             $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(estado) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and fecha_registro = '$this->fecha_registro'" . $str_where_filter; 
             $rs = $this->Db->Execute("select min(estado) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and fecha_registro = '$this->fecha_registro'" . $str_where_filter); 
         }  
         elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
         {
             $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(estado) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and fecha_registro = '$this->fecha_registro'" . $str_where_filter; 
             $rs = $this->Db->Execute("select min(estado) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and fecha_registro = '$this->fecha_registro'" . $str_where_filter); 
         }  
         elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
         {
             $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(estado) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and TO_DATE(TO_CHAR(fecha_registro, 'yyyy-mm-dd hh24:mi:ss'), 'yyyy-mm-dd hh24:mi:ss') = '$this->fecha_registro'" . $str_where_filter; 
             $rs = $this->Db->Execute("select min(estado) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and TO_DATE(TO_CHAR(fecha_registro, 'yyyy-mm-dd hh24:mi:ss'), 'yyyy-mm-dd hh24:mi:ss') = '$this->fecha_registro'" . $str_where_filter); 
         }  
         elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
         {
             $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(estado) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and fecha_registro = '$this->fecha_registro'" . $str_where_filter; 
             $rs = $this->Db->Execute("select min(estado) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and fecha_registro = '$this->fecha_registro'" . $str_where_filter); 
         }  
         else  
         {
             $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(estado) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and fecha_registro = '$this->fecha_registro'" . $str_where_filter; 
             $rs = $this->Db->Execute("select min(estado) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and fecha_registro = '$this->fecha_registro'" . $str_where_filter); 
         }  
         $this->estado = substr($this->Db->qstr($rs->fields[0]), 1, -1); 
     $str_where_filter = ('' != $str_where_param) ? ' and ' . $str_where_param : '';
         if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
         {
             $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(rfid) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and fecha_registro = '$this->fecha_registro' and estado = $this->estado" . $str_where_filter; 
             $rs = $this->Db->Execute("select min(rfid) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and fecha_registro = '$this->fecha_registro' and estado = $this->estado" . $str_where_filter); 
         }  
         elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
         {
             $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(rfid) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and fecha_registro = '$this->fecha_registro' and estado = $this->estado" . $str_where_filter; 
             $rs = $this->Db->Execute("select min(rfid) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and fecha_registro = '$this->fecha_registro' and estado = $this->estado" . $str_where_filter); 
         }  
         elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
         {
             $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(rfid) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and TO_DATE(TO_CHAR(fecha_registro, 'yyyy-mm-dd hh24:mi:ss'), 'yyyy-mm-dd hh24:mi:ss') = '$this->fecha_registro' and estado = $this->estado" . $str_where_filter; 
             $rs = $this->Db->Execute("select min(rfid) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and TO_DATE(TO_CHAR(fecha_registro, 'yyyy-mm-dd hh24:mi:ss'), 'yyyy-mm-dd hh24:mi:ss') = '$this->fecha_registro' and estado = $this->estado" . $str_where_filter); 
         }  
         elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
         {
             $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(rfid) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and fecha_registro = '$this->fecha_registro' and estado = $this->estado" . $str_where_filter; 
             $rs = $this->Db->Execute("select min(rfid) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and fecha_registro = '$this->fecha_registro' and estado = $this->estado" . $str_where_filter); 
         }  
         else  
         {
             $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(rfid) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and fecha_registro = '$this->fecha_registro' and estado = $this->estado" . $str_where_filter; 
             $rs = $this->Db->Execute("select min(rfid) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and fecha_registro = '$this->fecha_registro' and estado = $this->estado" . $str_where_filter); 
         }  
         $this->rfid = substr($this->Db->qstr($rs->fields[0]), 1, -1); 
         $this->nmgp_opcao = "igual";  
         return ;  
     } 
     $str_where_filter = ('' != $str_where_param) ? ' and ' . $str_where_param : '';
     if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(idreg) from " . $this->Ini->nm_tabela . " where idreg > $this->idreg" . $str_where_filter; 
         $rs = $this->Db->Execute("select min(idreg) from " . $this->Ini->nm_tabela . " where idreg > $this->idreg" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(idreg) from " . $this->Ini->nm_tabela . " where idreg > $this->idreg" . $str_where_filter; 
         $rs = $this->Db->Execute("select min(idreg) from " . $this->Ini->nm_tabela . " where idreg > $this->idreg" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(idreg) from " . $this->Ini->nm_tabela . " where idreg > $this->idreg" . $str_where_filter; 
         $rs = $this->Db->Execute("select min(idreg) from " . $this->Ini->nm_tabela . " where idreg > $this->idreg" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(idreg) from " . $this->Ini->nm_tabela . " where idreg > $this->idreg" . $str_where_filter; 
         $rs = $this->Db->Execute("select min(idreg) from " . $this->Ini->nm_tabela . " where idreg > $this->idreg" . $str_where_filter); 
     }  
     else  
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(idreg) from " . $this->Ini->nm_tabela . " where idreg > $this->idreg" . $str_where_filter; 
         $rs = $this->Db->Execute("select min(idreg) from " . $this->Ini->nm_tabela . " where idreg > $this->idreg" . $str_where_filter); 
     }  
     if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
     { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
     }  
     if (isset($rs->fields[0]) && $rs->fields[0] != "") 
     { 
         $this->idreg = substr($this->Db->qstr($rs->fields[0]), 1, -1); 
         $rs->Close();  
     } 
     else 
     { 
        $this->nmgp_opcao = "final";  
        $rs->Close();  
        return ; 
     } 
     $str_where_filter = ('' != $str_where_param) ? ' and ' . $str_where_param : '';
     if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(uniqueidqr) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg" . $str_where_filter; 
         $rs = $this->Db->Execute("select min(uniqueidqr) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(uniqueidqr) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg" . $str_where_filter; 
         $rs = $this->Db->Execute("select min(uniqueidqr) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(uniqueidqr) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg" . $str_where_filter; 
         $rs = $this->Db->Execute("select min(uniqueidqr) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(uniqueidqr) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg" . $str_where_filter; 
         $rs = $this->Db->Execute("select min(uniqueidqr) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg" . $str_where_filter); 
     }  
     else  
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(uniqueidqr) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg" . $str_where_filter; 
         $rs = $this->Db->Execute("select min(uniqueidqr) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg" . $str_where_filter); 
     }  
     $this->uniqueidqr = substr($this->Db->qstr($rs->fields[0]), 1, -1); 
     $rs->Close();  
     $str_where_filter = ('' != $str_where_param) ? ' and ' . $str_where_param : '';
     if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(fecha_registro) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr" . $str_where_filter; 
         $rs = $this->Db->Execute("select min(fecha_registro) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(fecha_registro) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr" . $str_where_filter; 
         $rs = $this->Db->Execute("select min(fecha_registro) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(TO_DATE(TO_CHAR(fecha_registro, 'yyyy-mm-dd hh24:mi:ss'), 'yyyy-mm-dd hh24:mi:ss')) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr" . $str_where_filter; 
         $rs = $this->Db->Execute("select min(TO_DATE(TO_CHAR(fecha_registro, 'yyyy-mm-dd hh24:mi:ss'), 'yyyy-mm-dd hh24:mi:ss')) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(fecha_registro) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr" . $str_where_filter; 
         $rs = $this->Db->Execute("select min(fecha_registro) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr" . $str_where_filter); 
     }  
     else  
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(fecha_registro) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr" . $str_where_filter; 
         $rs = $this->Db->Execute("select min(fecha_registro) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr" . $str_where_filter); 
     }  
     $this->fecha_registro = substr($this->Db->qstr($rs->fields[0]), 1, -1); 
     $rs->Close();  
     $str_where_filter = ('' != $str_where_param) ? ' and ' . $str_where_param : '';
     if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(estado) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and fecha_registro = '$this->fecha_registro'" . $str_where_filter; 
         $rs = $this->Db->Execute("select min(estado) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and fecha_registro = '$this->fecha_registro'" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(estado) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and fecha_registro = '$this->fecha_registro'" . $str_where_filter; 
         $rs = $this->Db->Execute("select min(estado) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and fecha_registro = '$this->fecha_registro'" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(estado) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and TO_DATE(TO_CHAR(fecha_registro, 'yyyy-mm-dd hh24:mi:ss'), 'yyyy-mm-dd hh24:mi:ss') = '$this->fecha_registro'" . $str_where_filter; 
         $rs = $this->Db->Execute("select min(estado) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and TO_DATE(TO_CHAR(fecha_registro, 'yyyy-mm-dd hh24:mi:ss'), 'yyyy-mm-dd hh24:mi:ss') = '$this->fecha_registro'" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(estado) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and fecha_registro = '$this->fecha_registro'" . $str_where_filter; 
         $rs = $this->Db->Execute("select min(estado) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and fecha_registro = '$this->fecha_registro'" . $str_where_filter); 
     }  
     else  
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(estado) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and fecha_registro = '$this->fecha_registro'" . $str_where_filter; 
         $rs = $this->Db->Execute("select min(estado) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and fecha_registro = '$this->fecha_registro'" . $str_where_filter); 
     }  
     $this->estado = substr($this->Db->qstr($rs->fields[0]), 1, -1); 
     $rs->Close();  
     $str_where_filter = ('' != $str_where_param) ? ' and ' . $str_where_param : '';
     if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(rfid) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and fecha_registro = '$this->fecha_registro' and estado = $this->estado" . $str_where_filter; 
         $rs = $this->Db->Execute("select min(rfid) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and fecha_registro = '$this->fecha_registro' and estado = $this->estado" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(rfid) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and fecha_registro = '$this->fecha_registro' and estado = $this->estado" . $str_where_filter; 
         $rs = $this->Db->Execute("select min(rfid) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and fecha_registro = '$this->fecha_registro' and estado = $this->estado" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(rfid) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and TO_DATE(TO_CHAR(fecha_registro, 'yyyy-mm-dd hh24:mi:ss'), 'yyyy-mm-dd hh24:mi:ss') = '$this->fecha_registro' and estado = $this->estado" . $str_where_filter; 
         $rs = $this->Db->Execute("select min(rfid) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and TO_DATE(TO_CHAR(fecha_registro, 'yyyy-mm-dd hh24:mi:ss'), 'yyyy-mm-dd hh24:mi:ss') = '$this->fecha_registro' and estado = $this->estado" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(rfid) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and fecha_registro = '$this->fecha_registro' and estado = $this->estado" . $str_where_filter; 
         $rs = $this->Db->Execute("select min(rfid) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and fecha_registro = '$this->fecha_registro' and estado = $this->estado" . $str_where_filter); 
     }  
     else  
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(rfid) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and fecha_registro = '$this->fecha_registro' and estado = $this->estado" . $str_where_filter; 
         $rs = $this->Db->Execute("select min(rfid) from " . $this->Ini->nm_tabela . " where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and fecha_registro = '$this->fecha_registro' and estado = $this->estado" . $str_where_filter); 
     }  
     $this->rfid = substr($this->Db->qstr($rs->fields[0]), 1, -1); 
     $rs->Close();  
     $this->nmgp_opcao = "igual";  
     return ;  
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
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(idreg) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select min(idreg) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(idreg) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select min(idreg) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(idreg) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select min(idreg) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(idreg) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select min(idreg) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
     }  
     else  
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(idreg) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select min(idreg) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
     }  
     if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
     { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
     }  
     if (!isset($rs->fields[0]) || $rs->EOF) 
     { 
         if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['where_filter']))
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
     $this->idreg = substr($this->Db->qstr($rs->fields[0]), 1, -1); 
     $rs->Close();  
     $str_where_filter = ('' != $str_where_param) ? ' and ' . $str_where_param : '';
     if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(uniqueidqr) from " . $this->Ini->nm_tabela . "  where idreg = $this->idreg" . $str_where_filter; 
         $rs = $this->Db->Execute("select min(uniqueidqr) from " . $this->Ini->nm_tabela . "  where idreg = $this->idreg" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(uniqueidqr) from " . $this->Ini->nm_tabela . "  where idreg = $this->idreg" . $str_where_filter; 
         $rs = $this->Db->Execute("select min(uniqueidqr) from " . $this->Ini->nm_tabela . "  where idreg = $this->idreg" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(uniqueidqr) from " . $this->Ini->nm_tabela . "  where idreg = $this->idreg" . $str_where_filter; 
         $rs = $this->Db->Execute("select min(uniqueidqr) from " . $this->Ini->nm_tabela . "  where idreg = $this->idreg" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(uniqueidqr) from " . $this->Ini->nm_tabela . "  where idreg = $this->idreg" . $str_where_filter; 
         $rs = $this->Db->Execute("select min(uniqueidqr) from " . $this->Ini->nm_tabela . "  where idreg = $this->idreg" . $str_where_filter); 
     }  
     else  
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(uniqueidqr) from " . $this->Ini->nm_tabela . "  where idreg = $this->idreg" . $str_where_filter; 
         $rs = $this->Db->Execute("select min(uniqueidqr) from " . $this->Ini->nm_tabela . "  where idreg = $this->idreg" . $str_where_filter); 
     }  
     if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
     { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
     }  
     $this->uniqueidqr = substr($this->Db->qstr($rs->fields[0]), 1, -1); 
     $rs->Close();  
     $str_where_filter = ('' != $str_where_param) ? ' and ' . $str_where_param : '';
     if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(fecha_registro) from " . $this->Ini->nm_tabela . "  where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr" . $str_where_filter; 
         $rs = $this->Db->Execute("select min(fecha_registro) from " . $this->Ini->nm_tabela . "  where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(fecha_registro) from " . $this->Ini->nm_tabela . "  where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr" . $str_where_filter; 
         $rs = $this->Db->Execute("select min(fecha_registro) from " . $this->Ini->nm_tabela . "  where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(TO_DATE(TO_CHAR(fecha_registro, 'yyyy-mm-dd hh24:mi:ss'), 'yyyy-mm-dd hh24:mi:ss')) from " . $this->Ini->nm_tabela . "  where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr" . $str_where_filter; 
         $rs = $this->Db->Execute("select min(TO_DATE(TO_CHAR(fecha_registro, 'yyyy-mm-dd hh24:mi:ss'), 'yyyy-mm-dd hh24:mi:ss')) from " . $this->Ini->nm_tabela . "  where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(fecha_registro) from " . $this->Ini->nm_tabela . "  where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr" . $str_where_filter; 
         $rs = $this->Db->Execute("select min(fecha_registro) from " . $this->Ini->nm_tabela . "  where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr" . $str_where_filter); 
     }  
     else  
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(fecha_registro) from " . $this->Ini->nm_tabela . "  where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr" . $str_where_filter; 
         $rs = $this->Db->Execute("select min(fecha_registro) from " . $this->Ini->nm_tabela . "  where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr" . $str_where_filter); 
     }  
     if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
     { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
     }  
     $this->fecha_registro = substr($this->Db->qstr($rs->fields[0]), 1, -1); 
     $rs->Close();  
     $str_where_filter = ('' != $str_where_param) ? ' and ' . $str_where_param : '';
     if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(estado) from " . $this->Ini->nm_tabela . "  where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and fecha_registro = '$this->fecha_registro'" . $str_where_filter; 
         $rs = $this->Db->Execute("select min(estado) from " . $this->Ini->nm_tabela . "  where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and fecha_registro = '$this->fecha_registro'" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(estado) from " . $this->Ini->nm_tabela . "  where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and fecha_registro = '$this->fecha_registro'" . $str_where_filter; 
         $rs = $this->Db->Execute("select min(estado) from " . $this->Ini->nm_tabela . "  where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and fecha_registro = '$this->fecha_registro'" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(estado) from " . $this->Ini->nm_tabela . "  where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and TO_DATE(TO_CHAR(fecha_registro, 'yyyy-mm-dd hh24:mi:ss'), 'yyyy-mm-dd hh24:mi:ss') = '$this->fecha_registro'" . $str_where_filter; 
         $rs = $this->Db->Execute("select min(estado) from " . $this->Ini->nm_tabela . "  where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and TO_DATE(TO_CHAR(fecha_registro, 'yyyy-mm-dd hh24:mi:ss'), 'yyyy-mm-dd hh24:mi:ss') = '$this->fecha_registro'" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(estado) from " . $this->Ini->nm_tabela . "  where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and fecha_registro = '$this->fecha_registro'" . $str_where_filter; 
         $rs = $this->Db->Execute("select min(estado) from " . $this->Ini->nm_tabela . "  where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and fecha_registro = '$this->fecha_registro'" . $str_where_filter); 
     }  
     else  
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(estado) from " . $this->Ini->nm_tabela . "  where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and fecha_registro = '$this->fecha_registro'" . $str_where_filter; 
         $rs = $this->Db->Execute("select min(estado) from " . $this->Ini->nm_tabela . "  where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and fecha_registro = '$this->fecha_registro'" . $str_where_filter); 
     }  
     if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
     { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
     }  
     $this->estado = substr($this->Db->qstr($rs->fields[0]), 1, -1); 
     $rs->Close();  
     $str_where_filter = ('' != $str_where_param) ? ' and ' . $str_where_param : '';
     if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(rfid) from " . $this->Ini->nm_tabela . "  where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and fecha_registro = '$this->fecha_registro' and estado = $this->estado" . $str_where_filter; 
         $rs = $this->Db->Execute("select min(rfid) from " . $this->Ini->nm_tabela . "  where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and fecha_registro = '$this->fecha_registro' and estado = $this->estado" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(rfid) from " . $this->Ini->nm_tabela . "  where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and fecha_registro = '$this->fecha_registro' and estado = $this->estado" . $str_where_filter; 
         $rs = $this->Db->Execute("select min(rfid) from " . $this->Ini->nm_tabela . "  where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and fecha_registro = '$this->fecha_registro' and estado = $this->estado" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(rfid) from " . $this->Ini->nm_tabela . "  where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and TO_DATE(TO_CHAR(fecha_registro, 'yyyy-mm-dd hh24:mi:ss'), 'yyyy-mm-dd hh24:mi:ss') = '$this->fecha_registro' and estado = $this->estado" . $str_where_filter; 
         $rs = $this->Db->Execute("select min(rfid) from " . $this->Ini->nm_tabela . "  where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and TO_DATE(TO_CHAR(fecha_registro, 'yyyy-mm-dd hh24:mi:ss'), 'yyyy-mm-dd hh24:mi:ss') = '$this->fecha_registro' and estado = $this->estado" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(rfid) from " . $this->Ini->nm_tabela . "  where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and fecha_registro = '$this->fecha_registro' and estado = $this->estado" . $str_where_filter; 
         $rs = $this->Db->Execute("select min(rfid) from " . $this->Ini->nm_tabela . "  where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and fecha_registro = '$this->fecha_registro' and estado = $this->estado" . $str_where_filter); 
     }  
     else  
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(rfid) from " . $this->Ini->nm_tabela . "  where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and fecha_registro = '$this->fecha_registro' and estado = $this->estado" . $str_where_filter; 
         $rs = $this->Db->Execute("select min(rfid) from " . $this->Ini->nm_tabela . "  where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and fecha_registro = '$this->fecha_registro' and estado = $this->estado" . $str_where_filter); 
     }  
     if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
     { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
     }  
     $this->rfid = substr($this->Db->qstr($rs->fields[0]), 1, -1); 
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
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(idreg) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select max(idreg) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(idreg) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select max(idreg) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(idreg) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select max(idreg) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(idreg) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select max(idreg) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
     }  
     else  
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(idreg) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select max(idreg) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
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
     $this->idreg = substr($this->Db->qstr($rs->fields[0]), 1, -1); 
     $rs->Close();  
     $str_where_filter = ('' != $str_where_param) ? ' and ' . $str_where_param : '';
     if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(uniqueidqr) from " . $this->Ini->nm_tabela . "  where idreg = $this->idreg" . $str_where_filter; 
         $rs = $this->Db->Execute("select max(uniqueidqr) from " . $this->Ini->nm_tabela . "  where idreg = $this->idreg" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(uniqueidqr) from " . $this->Ini->nm_tabela . "  where idreg = $this->idreg" . $str_where_filter; 
         $rs = $this->Db->Execute("select max(uniqueidqr) from " . $this->Ini->nm_tabela . "  where idreg = $this->idreg" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(uniqueidqr) from " . $this->Ini->nm_tabela . "  where idreg = $this->idreg" . $str_where_filter; 
         $rs = $this->Db->Execute("select max(uniqueidqr) from " . $this->Ini->nm_tabela . "  where idreg = $this->idreg" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(uniqueidqr) from " . $this->Ini->nm_tabela . "  where idreg = $this->idreg" . $str_where_filter; 
         $rs = $this->Db->Execute("select max(uniqueidqr) from " . $this->Ini->nm_tabela . "  where idreg = $this->idreg" . $str_where_filter); 
     }  
     else  
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(uniqueidqr) from " . $this->Ini->nm_tabela . "  where idreg = $this->idreg" . $str_where_filter; 
         $rs = $this->Db->Execute("select max(uniqueidqr) from " . $this->Ini->nm_tabela . "  where idreg = $this->idreg" . $str_where_filter); 
     }  
     if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
     { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
     }  
     $this->uniqueidqr = substr($this->Db->qstr($rs->fields[0]), 1, -1); 
     $rs->Close();  
     $str_where_filter = ('' != $str_where_param) ? ' and ' . $str_where_param : '';
     if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(fecha_registro) from " . $this->Ini->nm_tabela . "  where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr" . $str_where_filter; 
         $rs = $this->Db->Execute("select max(fecha_registro) from " . $this->Ini->nm_tabela . "  where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(fecha_registro) from " . $this->Ini->nm_tabela . "  where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr" . $str_where_filter; 
         $rs = $this->Db->Execute("select max(fecha_registro) from " . $this->Ini->nm_tabela . "  where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(TO_DATE(TO_CHAR(fecha_registro, 'yyyy-mm-dd hh24:mi:ss'), 'yyyy-mm-dd hh24:mi:ss')) from " . $this->Ini->nm_tabela . "  where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr" . $str_where_filter; 
         $rs = $this->Db->Execute("select max(TO_DATE(TO_CHAR(fecha_registro, 'yyyy-mm-dd hh24:mi:ss'), 'yyyy-mm-dd hh24:mi:ss')) from " . $this->Ini->nm_tabela . "  where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(fecha_registro) from " . $this->Ini->nm_tabela . "  where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr" . $str_where_filter; 
         $rs = $this->Db->Execute("select max(fecha_registro) from " . $this->Ini->nm_tabela . "  where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr" . $str_where_filter); 
     }  
     else  
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(fecha_registro) from " . $this->Ini->nm_tabela . "  where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr" . $str_where_filter; 
         $rs = $this->Db->Execute("select max(fecha_registro) from " . $this->Ini->nm_tabela . "  where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr" . $str_where_filter); 
     }  
     if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
     { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
     }  
     $this->fecha_registro = substr($this->Db->qstr($rs->fields[0]), 1, -1); 
     $rs->Close();  
     $str_where_filter = ('' != $str_where_param) ? ' and ' . $str_where_param : '';
     if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(estado) from " . $this->Ini->nm_tabela . "  where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and fecha_registro = '$this->fecha_registro'" . $str_where_filter; 
         $rs = $this->Db->Execute("select max(estado) from " . $this->Ini->nm_tabela . "  where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and fecha_registro = '$this->fecha_registro'" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(estado) from " . $this->Ini->nm_tabela . "  where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and fecha_registro = '$this->fecha_registro'" . $str_where_filter; 
         $rs = $this->Db->Execute("select max(estado) from " . $this->Ini->nm_tabela . "  where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and fecha_registro = '$this->fecha_registro'" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(estado) from " . $this->Ini->nm_tabela . "  where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and TO_DATE(TO_CHAR(fecha_registro, 'yyyy-mm-dd hh24:mi:ss') = '$this->fecha_registro'" . $str_where_filter; 
         $rs = $this->Db->Execute("select max(estado) from " . $this->Ini->nm_tabela . "  where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and TO_DATE(TO_CHAR(fecha_registro, 'yyyy-mm-dd hh24:mi:ss') = '$this->fecha_registro'" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(estado) from " . $this->Ini->nm_tabela . "  where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and fecha_registro = '$this->fecha_registro'" . $str_where_filter; 
         $rs = $this->Db->Execute("select max(estado) from " . $this->Ini->nm_tabela . "  where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and fecha_registro = '$this->fecha_registro'" . $str_where_filter); 
     }  
     else  
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(estado) from " . $this->Ini->nm_tabela . "  where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and fecha_registro = '$this->fecha_registro'" . $str_where_filter; 
         $rs = $this->Db->Execute("select max(estado) from " . $this->Ini->nm_tabela . "  where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and fecha_registro = '$this->fecha_registro'" . $str_where_filter); 
     }  
     if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
     { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
     }  
     $this->estado = substr($this->Db->qstr($rs->fields[0]), 1, -1); 
     $rs->Close();  
     $str_where_filter = ('' != $str_where_param) ? ' and ' . $str_where_param : '';
     if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(rfid) from " . $this->Ini->nm_tabela . "  where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and fecha_registro = '$this->fecha_registro' and estado = $this->estado" . $str_where_filter; 
         $rs = $this->Db->Execute("select max(rfid) from " . $this->Ini->nm_tabela . "  where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and fecha_registro = '$this->fecha_registro' and estado = $this->estado" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(rfid) from " . $this->Ini->nm_tabela . "  where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and fecha_registro = '$this->fecha_registro' and estado = $this->estado" . $str_where_filter; 
         $rs = $this->Db->Execute("select max(rfid) from " . $this->Ini->nm_tabela . "  where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and fecha_registro = '$this->fecha_registro' and estado = $this->estado" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(rfid) from " . $this->Ini->nm_tabela . "  where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and TO_DATE(TO_CHAR(fecha_registro, 'yyyy-mm-dd hh24:mi:ss') = '$this->fecha_registro' and estado = $this->estado" . $str_where_filter; 
         $rs = $this->Db->Execute("select max(rfid) from " . $this->Ini->nm_tabela . "  where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and TO_DATE(TO_CHAR(fecha_registro, 'yyyy-mm-dd hh24:mi:ss') = '$this->fecha_registro' and estado = $this->estado" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(rfid) from " . $this->Ini->nm_tabela . "  where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and fecha_registro = '$this->fecha_registro' and estado = $this->estado" . $str_where_filter; 
         $rs = $this->Db->Execute("select max(rfid) from " . $this->Ini->nm_tabela . "  where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and fecha_registro = '$this->fecha_registro' and estado = $this->estado" . $str_where_filter); 
     }  
     else  
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(rfid) from " . $this->Ini->nm_tabela . "  where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and fecha_registro = '$this->fecha_registro' and estado = $this->estado" . $str_where_filter; 
         $rs = $this->Db->Execute("select max(rfid) from " . $this->Ini->nm_tabela . "  where idreg = $this->idreg and uniqueidqr = $this->uniqueidqr and fecha_registro = '$this->fecha_registro' and estado = $this->estado" . $str_where_filter); 
     }  
     if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
     { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
     }  
     $this->rfid = substr($this->Db->qstr($rs->fields[0]), 1, -1); 
     $rs->Close();  
     $this->nmgp_opcao = "igual";  
     return ;  
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
       $rec_tot    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['total'] + 1;
       $rec_fim    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['reg_start'] + 1;
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
                $_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro']['record_state'] = array();
        }

        function storeRecordState($sc_seq_vert = 0) {
                if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro']['record_state'])) {
                        $this->initializeRecordState();
                }
                if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro']['record_state'][$sc_seq_vert])) {
                        $_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro']['record_state'][$sc_seq_vert] = array();
                }

                $_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro']['record_state'][$sc_seq_vert]['buttons'] = array(
                        'delete' => $this->nmgp_botoes['delete'],
                        'update' => $this->nmgp_botoes['update']
                );
        }

        function loadRecordState($sc_seq_vert = 0) {
                if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro']['record_state']) || !isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro']['record_state'][$sc_seq_vert])) {
                        return;
                }

                if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro']['record_state'][$sc_seq_vert]['buttons']['delete'])) {
                        $this->nmgp_botoes['delete'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro']['record_state'][$sc_seq_vert]['buttons']['delete'];
                }
                if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro']['record_state'][$sc_seq_vert]['buttons']['update'])) {
                        $this->nmgp_botoes['update'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro']['record_state'][$sc_seq_vert]['buttons']['update'];
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
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['botoes'] = $this->nmgp_botoes;
     if ($this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form")
     {
         $_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['opc_ant'] = $this->nmgp_opcao;
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
     if (($_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['run_iframe'] == "R") && $this->nm_flag_iframe && empty($this->nm_todas_criticas))
     {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['run_iframe_ajax']))
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['retorno_edit'] = array("edit", "");
          }
          else
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['retorno_edit'] .= "&nmgp_opcao=edit";
          }
          if ($this->sc_evento == "insert" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['run_iframe'] == "F")
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['run_iframe_ajax']))
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['retorno_edit'] = array("edit", "fim");
              }
              else
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['retorno_edit'] .= "&rec=fim";
              }
          }
          $this->NM_close_db(); 
          $sJsParent = '';
          if ($this->NM_ajax_flag && isset($this->NM_ajax_info['param']['buffer_output']) && $this->NM_ajax_info['param']['buffer_output'])
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['run_iframe_ajax']))
              {
                  $this->NM_ajax_info['ajaxJavascript'][] = array("parent.ajax_navigate", $_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['retorno_edit']);
              }
              else
              {
                  $sJsParent .= 'parent';
                  $this->NM_ajax_info['redir']['metodo'] = 'location';
                  $this->NM_ajax_info['redir']['action'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['retorno_edit'];
                  $this->NM_ajax_info['redir']['target'] = $sJsParent;
              }
              form_matrix_registro_mob_pack_ajax_response();
              exit;
          }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">

         <html><body>
         <script type="text/javascript">
<?php
    
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['run_iframe_ajax']))
    {
        $opc = ($_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['run_iframe'] == "F" && $this->sc_evento == "insert") ? "fim" : "";
        echo "parent.ajax_navigate('edit', '" .$opc . "');";
    }
    else
    {
        echo $sJsParent . "parent.location = '" . $_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['retorno_edit'] . "';";
    }
?>
         </script>
         </body></html>
<?php
         exit;
     }
        $this->initFormPages();
    include_once("form_matrix_registro_mob_form0.php");
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
        if ('SC_all_Cmp' == $this->nmgp_fast_search && in_array($field, array("idreg", "uniqueidqr", "fecha_registro", "estado", "entrada", "jugador", "visitante", "tarjeta", "comida", "idprod", "cantidad", "fecha_entrada", "fecha_registro_entrada", "fecha_salida", "fecha_registro_salida", "fecha_entrega", "minutos", "tokens", "rfid", "nombre", "apellido", "nickname", "birth_date", "genre", "idcliente", "parent", "points1", "points2", "points3", "ultfecha", "ult_iddevice", "rentado", "idcenter", "phone"))) {
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
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['table_refresh']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['table_refresh'])
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

   function SC_fast_search($in_fields, $arg_search, $data_search)
   {
      $fields = (strpos($in_fields, "SC_all_Cmp") !== false) ? array("SC_all_Cmp") : explode(";", $in_fields);
      $this->NM_case_insensitive = false;
      if (empty($data_search)) 
      {
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['where_filter']);
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['total']);
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['fast_search']);
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['where_detal']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['where_detal'])) 
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['where_filter'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['where_detal'];
          }
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['empty_filter']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['empty_filter'])
          {
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['empty_filter']);
              $this->NM_ajax_info['empty_filter'] = 'ok';
              form_matrix_registro_mob_pack_ajax_response();
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
              $this->SC_monta_condicao($comando, "idreg", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "uniqueidqr", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "fecha_registro", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "estado", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "entrada", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "jugador", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "visitante", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "tarjeta", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "comida", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "idprod", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "cantidad", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "fecha_entrada", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "fecha_registro_entrada", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "fecha_salida", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "fecha_registro_salida", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "fecha_entrega", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "minutos", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "tokens", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "rfid", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "nombre", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "apellido", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "nickname", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "birth_date", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "genre", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "idcliente", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "parent", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "points1", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "points2", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "points3", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "ultfecha", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "ult_iddevice", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "rentado", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "idcenter", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "phone", $arg_search, $data_search);
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['where_detal']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['where_detal']) && !empty($comando)) 
      {
          $comando = $_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['where_detal'] . " and (" .  $comando . ")";
      }
      if (empty($comando)) 
      {
          $comando = " 1 <> 1 "; 
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['where_filter_form']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['where_filter_form'])
      {
          $sc_where = " where " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['where_filter_form'] . " and (" . $comando . ")";
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
      $qt_geral_reg_form_matrix_registro_mob = isset($rt->fields[0]) ? $rt->fields[0] - 1 : 0; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['total'] = $qt_geral_reg_form_matrix_registro_mob;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['where_filter'] = $comando;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['fast_search'][0] = $field;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['fast_search'][1] = $arg_search;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['fast_search'][2] = $sv_data;
      $rt->Close(); 
      if (isset($rt->fields[0]) && $rt->fields[0] > 0 &&  isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['empty_filter']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['empty_filter'])
      {
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['empty_filter']);
          $this->NM_ajax_info['empty_filter'] = 'ok';
          form_matrix_registro_mob_pack_ajax_response();
          exit;
      }
      elseif (!isset($rt->fields[0]) || $rt->fields[0] == 0)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['empty_filter'] = true;
          $this->NM_ajax_info['empty_filter'] = 'ok';
          form_matrix_registro_mob_pack_ajax_response();
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
      $nm_numeric[] = "idreg";$nm_numeric[] = "uniqueidqr";$nm_numeric[] = "estado";$nm_numeric[] = "entrada";$nm_numeric[] = "jugador";$nm_numeric[] = "visitante";$nm_numeric[] = "tarjeta";$nm_numeric[] = "comida";$nm_numeric[] = "idprod";$nm_numeric[] = "cantidad";$nm_numeric[] = "minutos";$nm_numeric[] = "tokens";$nm_numeric[] = "points1";$nm_numeric[] = "ult_iddevice";$nm_numeric[] = "rentado";
      if (in_array($campo_join, $nm_numeric))
      {
         if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['decimal_db'] == ".")
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
      $Nm_datas["fecha_registro"] = "timestamp";$Nm_datas["fecha_entrada"] = "datetime";$Nm_datas["fecha_registro_entrada"] = "datetime";$Nm_datas["fecha_salida"] = "datetime";$Nm_datas["fecha_registro_salida"] = "datetime";$Nm_datas["fecha_entrega"] = "datetime";$Nm_datas["birth_date"] = "date";$Nm_datas["ultfecha"] = "datetime";
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
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['SC_sep_date']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['SC_sep_date']))
              {
                  $nm_aspas  = $_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['SC_sep_date'];
                  $nm_aspas1 = $_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['SC_sep_date1'];
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
       $nmgp_saida_form = "form_matrix_registro_mob_fim.php";
   }
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['redir']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['redir'] == 'redir')
   {
       unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']);
   }
   unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['opc_ant']);
   if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['nm_run_menu']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['nm_run_menu'] == 1)
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['nm_run_menu'] = 2;
       $nmgp_saida_form = "form_matrix_registro_mob_fim.php";
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
       form_matrix_registro_mob_pack_ajax_response();
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
   if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['sc_modal'])
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
if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['masterValue']))
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['dashboard_info']['under_dashboard']) {
?>
var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['dashboard_info']['parent_widget']; ?>']");
if (dbParentFrame && dbParentFrame[0] && dbParentFrame[0].contentWindow.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['masterValue'] as $cmp_master => $val_master)
        {
?>
    dbParentFrame[0].contentWindow.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['masterValue']);
?>
}
<?php
    }
    else {
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['masterValue'] as $cmp_master => $val_master)
        {
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['masterValue']);
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
                return array("sc_b_new_t.sc-unique-btn-1", "sc_b_new_t.sc-unique-btn-15");
                break;
            case "insert":
                return array("sc_b_ins_t.sc-unique-btn-2", "sc_b_ins_t.sc-unique-btn-16");
                break;
            case "bcancelar":
                return array("sc_b_sai_t.sc-unique-btn-3", "sc_b_sai_t.sc-unique-btn-17");
                break;
            case "update":
                return array("sc_b_upd_t.sc-unique-btn-4", "sc_b_upd_t.sc-unique-btn-18");
                break;
            case "delete":
                return array("sc_b_del_t.sc-unique-btn-5", "sc_b_del_t.sc-unique-btn-19");
                break;
            case "help":
                return array("sc_b_hlp_t");
                break;
            case "exit":
                return array("sc_b_sai_t.sc-unique-btn-6", "sc_b_sai_t.sc-unique-btn-7", "sc_b_sai_t.sc-unique-btn-9", "sc_b_sai_t.sc-unique-btn-20", "sc_b_sai_t.sc-unique-btn-21", "sc_b_sai_t.sc-unique-btn-23", "sc_b_sai_t.sc-unique-btn-8", "sc_b_sai_t.sc-unique-btn-10", "sc_b_sai_t.sc-unique-btn-22", "sc_b_sai_t.sc-unique-btn-24");
                break;
            case "birpara":
                return array("brec_b");
                break;
            case "first":
                return array("sc_b_ini_b.sc-unique-btn-11", "sc_b_ini_b.sc-unique-btn-25");
                break;
            case "back":
                return array("sc_b_ret_b.sc-unique-btn-12", "sc_b_ret_b.sc-unique-btn-26");
                break;
            case "forward":
                return array("sc_b_avc_b.sc-unique-btn-13", "sc_b_avc_b.sc-unique-btn-27");
                break;
            case "last":
                return array("sc_b_fim_b.sc-unique-btn-14", "sc_b_fim_b.sc-unique-btn-28");
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
        if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['run_iframe'] != "R") {
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
        if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['ordem_cmp'] == $fieldName) {
            $orderColName = $fieldName;
            if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_matrix_registro_mob']['ordem_ord'] == " desc") {
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
            case "idreg":
                return true;
            case "uniqueidqr":
                return true;
            case "estado":
                return true;
            case "entrada":
                return true;
            case "jugador":
                return true;
            case "visitante":
                return true;
            case "tarjeta":
                return true;
            case "comida":
                return true;
            case "idprod":
                return true;
            case "cantidad":
                return true;
            case "minutos":
                return true;
            case "tokens":
                return true;
            case "points1":
                return true;
            case "ult_iddevice":
                return true;
            case "rentado":
                return true;
            default:
                return false;
        }
        return false;
    }

    function scGetDefaultFieldOrder($fieldName)
    {
        switch ($fieldName) {
            case "birth_date":
                return 'desc';
            case "idreg":
                return 'desc';
            case "uniqueidqr":
                return 'desc';
            case "fecha_registro":
                return 'desc';
            case "estado":
                return 'desc';
            case "entrada":
                return 'desc';
            case "jugador":
                return 'desc';
            case "visitante":
                return 'desc';
            case "tarjeta":
                return 'desc';
            case "comida":
                return 'desc';
            case "idprod":
                return 'desc';
            case "cantidad":
                return 'desc';
            case "fecha_entrada":
                return 'desc';
            case "fecha_registro_entrada":
                return 'desc';
            case "fecha_salida":
                return 'desc';
            case "fecha_registro_salida":
                return 'desc';
            case "fecha_entrega":
                return 'desc';
            case "minutos":
                return 'desc';
            case "tokens":
                return 'desc';
            case "points1":
                return 'desc';
            case "ultfecha":
                return 'desc';
            case "ult_iddevice":
                return 'desc';
            case "rentado":
                return 'desc';
            default:
                return 'asc';
        }
        return 'asc';
    }
}
?>