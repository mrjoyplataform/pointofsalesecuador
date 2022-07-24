<?php
//
class form_product_snackbar_mob_apl
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
   var $id_product;
   var $product_name;
   var $product_code;
   var $id_status;
   var $id_status_1;
   var $dateproduct;
   var $dateproduct_hora;
   var $product_value;
   var $product_cost;
   var $discount;
   var $stock;
   var $id_category;
   var $id_category_1;
   var $image;
   var $image_scfile_name;
   var $image_ul_name;
   var $image_scfile_type;
   var $image_ul_type;
   var $image_limpa;
   var $image_salva;
   var $out_image;
   var $out1_image;
   var $service;
   var $kiosko;
   var $entrada;
   var $jugador;
   var $visitante;
   var $tarjeta;
   var $minutos;
   var $tokens;
   var $comida;
   var $score;
   var $poriva;
   var $cuentaventa;
   var $cuentaventa_1;
   var $unidad;
   var $tipoitem;
   var $cuentacompra;
   var $precioventa;
   var $puntoventa;
   var $orden;
   var $arcade_clasic;
   var $ultfechaventa;
   var $ultfechaventa_hora;
   var $ingrediente;
   var $combos_recetas;
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
          if (isset($this->NM_ajax_info['param']['combos_recetas']))
          {
              $this->combos_recetas = $this->NM_ajax_info['param']['combos_recetas'];
          }
          if (isset($this->NM_ajax_info['param']['comida']))
          {
              $this->comida = $this->NM_ajax_info['param']['comida'];
          }
          if (isset($this->NM_ajax_info['param']['cuentacompra']))
          {
              $this->cuentacompra = $this->NM_ajax_info['param']['cuentacompra'];
          }
          if (isset($this->NM_ajax_info['param']['cuentaventa']))
          {
              $this->cuentaventa = $this->NM_ajax_info['param']['cuentaventa'];
          }
          if (isset($this->NM_ajax_info['param']['dateproduct']))
          {
              $this->dateproduct = $this->NM_ajax_info['param']['dateproduct'];
          }
          if (isset($this->NM_ajax_info['param']['discount']))
          {
              $this->discount = $this->NM_ajax_info['param']['discount'];
          }
          if (isset($this->NM_ajax_info['param']['entrada']))
          {
              $this->entrada = $this->NM_ajax_info['param']['entrada'];
          }
          if (isset($this->NM_ajax_info['param']['id_category']))
          {
              $this->id_category = $this->NM_ajax_info['param']['id_category'];
          }
          if (isset($this->NM_ajax_info['param']['id_product']))
          {
              $this->id_product = $this->NM_ajax_info['param']['id_product'];
          }
          if (isset($this->NM_ajax_info['param']['id_status']))
          {
              $this->id_status = $this->NM_ajax_info['param']['id_status'];
          }
          if (isset($this->NM_ajax_info['param']['image']))
          {
              $this->image = $this->NM_ajax_info['param']['image'];
          }
          if (isset($this->NM_ajax_info['param']['image_limpa']))
          {
              $this->image_limpa = $this->NM_ajax_info['param']['image_limpa'];
          }
          if (isset($this->NM_ajax_info['param']['image_ul_name']))
          {
              $this->image_ul_name = $this->NM_ajax_info['param']['image_ul_name'];
          }
          if (isset($this->NM_ajax_info['param']['image_ul_type']))
          {
              $this->image_ul_type = $this->NM_ajax_info['param']['image_ul_type'];
          }
          if (isset($this->NM_ajax_info['param']['jugador']))
          {
              $this->jugador = $this->NM_ajax_info['param']['jugador'];
          }
          if (isset($this->NM_ajax_info['param']['kiosko']))
          {
              $this->kiosko = $this->NM_ajax_info['param']['kiosko'];
          }
          if (isset($this->NM_ajax_info['param']['minutos']))
          {
              $this->minutos = $this->NM_ajax_info['param']['minutos'];
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
          if (isset($this->NM_ajax_info['param']['orden']))
          {
              $this->orden = $this->NM_ajax_info['param']['orden'];
          }
          if (isset($this->NM_ajax_info['param']['poriva']))
          {
              $this->poriva = $this->NM_ajax_info['param']['poriva'];
          }
          if (isset($this->NM_ajax_info['param']['precioventa']))
          {
              $this->precioventa = $this->NM_ajax_info['param']['precioventa'];
          }
          if (isset($this->NM_ajax_info['param']['product_code']))
          {
              $this->product_code = $this->NM_ajax_info['param']['product_code'];
          }
          if (isset($this->NM_ajax_info['param']['product_cost']))
          {
              $this->product_cost = $this->NM_ajax_info['param']['product_cost'];
          }
          if (isset($this->NM_ajax_info['param']['product_name']))
          {
              $this->product_name = $this->NM_ajax_info['param']['product_name'];
          }
          if (isset($this->NM_ajax_info['param']['product_value']))
          {
              $this->product_value = $this->NM_ajax_info['param']['product_value'];
          }
          if (isset($this->NM_ajax_info['param']['puntoventa']))
          {
              $this->puntoventa = $this->NM_ajax_info['param']['puntoventa'];
          }
          if (isset($this->NM_ajax_info['param']['score']))
          {
              $this->score = $this->NM_ajax_info['param']['score'];
          }
          if (isset($this->NM_ajax_info['param']['script_case_init']))
          {
              $this->script_case_init = $this->NM_ajax_info['param']['script_case_init'];
          }
          if (isset($this->NM_ajax_info['param']['service']))
          {
              $this->service = $this->NM_ajax_info['param']['service'];
          }
          if (isset($this->NM_ajax_info['param']['stock']))
          {
              $this->stock = $this->NM_ajax_info['param']['stock'];
          }
          if (isset($this->NM_ajax_info['param']['tarjeta']))
          {
              $this->tarjeta = $this->NM_ajax_info['param']['tarjeta'];
          }
          if (isset($this->NM_ajax_info['param']['tipoitem']))
          {
              $this->tipoitem = $this->NM_ajax_info['param']['tipoitem'];
          }
          if (isset($this->NM_ajax_info['param']['tokens']))
          {
              $this->tokens = $this->NM_ajax_info['param']['tokens'];
          }
          if (isset($this->NM_ajax_info['param']['unidad']))
          {
              $this->unidad = $this->NM_ajax_info['param']['unidad'];
          }
          if (isset($this->NM_ajax_info['param']['visitante']))
          {
              $this->visitante = $this->NM_ajax_info['param']['visitante'];
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
          $_SESSION['sc_session'][$script_case_init]['form_product_snackbar_mob']['opcao']   = "novo";
          $_SESSION['sc_session'][$script_case_init]['form_product_snackbar_mob']['opc_ant'] = "inicio";
      }
      if (isset($_SESSION['sc_session'][$script_case_init]['form_product_snackbar_mob']['embutida_parms']))
      { 
          $this->nmgp_parms = $_SESSION['sc_session'][$script_case_init]['form_product_snackbar_mob']['embutida_parms'];
          unset($_SESSION['sc_session'][$script_case_init]['form_product_snackbar_mob']['embutida_parms']);
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
                 nm_limpa_str_form_product_snackbar_mob($cadapar[1]);
                 if ($cadapar[1] == "@ ") {$cadapar[1] = trim($cadapar[1]); }
                 $Tmp_par = $cadapar[0];
                 $this->$Tmp_par = $cadapar[1];
             }
             $ix++;
          }
          if (isset($this->NM_where_filter_form))
          {
              $_SESSION['sc_session'][$script_case_init]['form_product_snackbar_mob']['where_filter_form'] = $this->NM_where_filter_form;
              unset($_SESSION['sc_session'][$script_case_init]['form_product_snackbar_mob']['total']);
          }
          if (!isset($_SESSION['sc_session'][$script_case_init]['form_product_snackbar_mob']['total']))
          {
              $_SESSION['sc_session'][ $_SESSION['sc_session'][$script_case_init]['form_product_snackbar_mob']['form_product_combo_mob_script_case_init'] ]['form_product_combo_mob']['reg_start'] = "";
              unset($_SESSION['sc_session'][ $_SESSION['sc_session'][$script_case_init]['form_product_snackbar_mob']['form_product_combo_mob_script_case_init'] ]['form_product_combo_mob']['total']);
          }
          if (isset($this->sc_redir_atualiz))
          {
              $_SESSION['sc_session'][$script_case_init]['form_product_snackbar_mob']['sc_redir_atualiz'] = $this->sc_redir_atualiz;
          }
          if (isset($this->sc_redir_insert))
          {
              $_SESSION['sc_session'][$script_case_init]['form_product_snackbar_mob']['sc_redir_insert'] = $this->sc_redir_insert;
          }
      } 
      elseif (isset($script_case_init) && !empty($script_case_init) && isset($_SESSION['sc_session'][$script_case_init]['form_product_snackbar_mob']['parms']))
      {
          if ((!isset($this->nmgp_opcao) || ($this->nmgp_opcao != "incluir" && $this->nmgp_opcao != "alterar" && $this->nmgp_opcao != "excluir" && $this->nmgp_opcao != "novo" && $this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form")) && (!isset($this->NM_ajax_opcao) || $this->NM_ajax_opcao == ""))
          {
              $todox = str_replace("?#?@?@?", "?#?@ ?@?", $_SESSION['sc_session'][$script_case_init]['form_product_snackbar_mob']['parms']);
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
          $_SESSION['sc_session'][$script_case_init]['form_product_snackbar_mob']['nm_run_menu'] = 1;
      } 
      if (($this->NM_ajax_flag && 'navigate_form' == $this->NM_ajax_opcao) || (isset($this->nmgp_opcao) && $this->nmgp_opcao == "igual"))
      { }
      else
      {
          $aDtParts = explode(' ', $this->dateproduct);
          $this->dateproduct      = $aDtParts[0];
          $this->dateproduct_hora = $aDtParts[1];
      }
      if (!$this->NM_ajax_flag && 'autocomp_' == substr($this->NM_ajax_opcao, 0, 9))
      {
          $this->NM_ajax_flag = true;
      }

      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      if (isset($this->nm_evt_ret_edit) && '' != $this->nm_evt_ret_edit)
      {
          $_SESSION['sc_session'][$script_case_init]['form_product_snackbar_mob']['lig_edit_lookup']     = true;
          $_SESSION['sc_session'][$script_case_init]['form_product_snackbar_mob']['lig_edit_lookup_cb']  = $this->nm_evt_ret_edit;
          $_SESSION['sc_session'][$script_case_init]['form_product_snackbar_mob']['lig_edit_lookup_row'] = isset($this->nm_evt_ret_row) ? $this->nm_evt_ret_row : '';
      }
      if (isset($_SESSION['sc_session'][$script_case_init]['form_product_snackbar_mob']['lig_edit_lookup']) && $_SESSION['sc_session'][$script_case_init]['form_product_snackbar_mob']['lig_edit_lookup'])
      {
          $this->lig_edit_lookup     = true;
          $this->lig_edit_lookup_cb  = $_SESSION['sc_session'][$script_case_init]['form_product_snackbar_mob']['lig_edit_lookup_cb'];
          $this->lig_edit_lookup_row = $_SESSION['sc_session'][$script_case_init]['form_product_snackbar_mob']['lig_edit_lookup_row'];
      }
      if (!$this->Ini)
      { 
          $this->Ini = new form_product_snackbar_mob_ini(); 
          $this->Ini->init();
          $this->nm_data = new nm_data("es");
          $this->app_is_initializing = $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['initialize'];
          if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_product_snackbar']))
          {
              foreach ($_SESSION['scriptcase']['sc_apl_conf']['form_product_snackbar'] as $I_conf => $Conf_opt)
              {
                  $_SESSION['scriptcase']['sc_apl_conf']['form_product_snackbar_mob'][$I_conf]  = $Conf_opt;
              }
          }
      } 
      else 
      { 
         $this->nm_data = new nm_data("es");
      } 
      $_SESSION['sc_session'][$script_case_init]['form_product_snackbar_mob']['upload_field_info'] = array();

      $_SESSION['sc_session'][$script_case_init]['form_product_snackbar_mob']['upload_field_info']['image'] = array(
          'app_dir'            => $this->Ini->path_aplicacao,
          'app_name'           => 'form_product_snackbar_mob',
          'upload_dir'         => $this->Ini->root . $this->Ini->path_imag_temp . '/',
          'upload_url'         => $this->Ini->path_imag_temp . '/',
          'upload_type'        => 'single',
          'upload_allowed_type'  => '/.+$/i',
          'upload_max_size'  => null,
          'upload_file_height' => '200',
          'upload_file_width'  => '200',
          'upload_file_aspect' => 'S',
          'upload_file_type'   => 'I',
      );

      unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['masterValue']);
      $this->Change_Menu = false;
      $run_iframe = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['run_iframe']) && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['run_iframe'] == "R")) ? true : false;
      if (!$run_iframe && isset($_SESSION['scriptcase']['menu_atual']) && !$_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['embutida_call'] && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['sc_outra_jan']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['sc_outra_jan']))
      {
          $this->sc_init_menu = "x";
          if (isset($_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init']['form_product_snackbar_mob']))
          {
              $this->sc_init_menu = $_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init']['form_product_snackbar_mob'];
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
          if ($this->Ini->sc_page == $this->sc_init_menu && !isset($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['form_product_snackbar_mob']))
          {
               $_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['form_product_snackbar_mob']['link'] = $this->Ini->sc_protocolo . $this->Ini->server . $this->Ini->path_link . "" . SC_dir_app_name('form_product_snackbar_mob') . "/";
               $_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['form_product_snackbar_mob']['label'] = "Productos";
               $this->Change_Menu = true;
          }
          elseif ($this->Ini->sc_page == $this->sc_init_menu)
          {
              $achou = false;
              foreach ($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu] as $apl => $parms)
              {
                  if ($apl == "form_product_snackbar_mob")
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
      $this->nm_new_label['product_name'] = '' . $this->Ini->Nm_lang['lang_product_fld_product_name'] . '';
      $this->nm_new_label['product_code'] = '' . $this->Ini->Nm_lang['lang_product_fld_product_code'] . '';
      $this->nm_new_label['id_status'] = '' . $this->Ini->Nm_lang['lang_product_fld_id_status'] . '';
      $this->nm_new_label['dateproduct'] = '' . $this->Ini->Nm_lang['lang_product_fld_dateproduct'] . '';
      $this->nm_new_label['product_value'] = '' . $this->Ini->Nm_lang['lang_product_fld_product_value'] . '';
      $this->nm_new_label['product_cost'] = '' . $this->Ini->Nm_lang['lang_product_fld_product_cost'] . '';
      $this->nm_new_label['discount'] = '' . $this->Ini->Nm_lang['lang_product_fld_discount'] . '';
      $this->nm_new_label['stock'] = '' . $this->Ini->Nm_lang['lang_product_fld_stock'] . '';
      $this->nm_new_label['id_category'] = '' . $this->Ini->Nm_lang['lang_product_fld_id_category'] . '';
      $this->nm_new_label['image'] = '' . $this->Ini->Nm_lang['lang_product_fld_image'] . '';

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



      $_SESSION['scriptcase']['error_icon']['form_product_snackbar_mob']  = "<img src=\"" . $this->Ini->path_icones . "/scriptcase__NM__btn__NM__scriptcase9_Rhino__NM__nm_scriptcase9_Rhino_error.png\" style=\"border-width: 0px\" align=\"top\">&nbsp;";
      $_SESSION['scriptcase']['error_close']['form_product_snackbar_mob'] = "<td>" . nmButtonOutput($this->arr_buttons, "berrm_clse", "document.getElementById('id_error_display_fixed').style.display = 'none'; document.getElementById('id_error_message_fixed').innerHTML = ''; return false", "document.getElementById('id_error_display_fixed').style.display = 'none'; document.getElementById('id_error_message_fixed').innerHTML = ''; return false", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "") . "</td>";

      $this->Embutida_proc = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['embutida_proc']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['embutida_proc'] : $this->Embutida_proc;
      $this->Embutida_form = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['embutida_form']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['embutida_form'] : $this->Embutida_form;
      $this->Embutida_call = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['embutida_call']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['embutida_call'] : $this->Embutida_call;

       $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['table_refresh'] = false;

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['embutida_liga_grid_edit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['embutida_liga_grid_edit'])
      {
          $this->Grid_editavel = ('on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['embutida_liga_grid_edit']) ? true : false;
      }
      if (isset($this->Grid_editavel) && $this->Grid_editavel)
      {
          $this->Embutida_form  = true;
          $this->Embutida_ronly = true;
      }
      $this->Embutida_multi = false;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['embutida_multi']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['embutida_multi'])
      {
          $this->Grid_editavel  = false;
          $this->Embutida_form  = false;
          $this->Embutida_ronly = false;
          $this->Embutida_multi = true;
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['embutida_liga_tp_pag']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['embutida_liga_tp_pag'])
      {
          $this->form_paginacao = $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['embutida_liga_tp_pag'];
      }

      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['embutida_form']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['embutida_form'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['embutida_form'] = $this->Embutida_form;
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['embutida_liga_grid_edit']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['embutida_liga_grid_edit'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['embutida_liga_grid_edit'] = $this->Grid_editavel ? 'on' : 'off';
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['embutida_liga_grid_edit']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['embutida_liga_grid_edit'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['embutida_liga_grid_edit'] = $this->Embutida_call;
      }

      $this->Ini->cor_grid_par = $this->Ini->cor_grid_impar;
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      $this->nmgp_url_saida  = $nm_url_saida;
      $this->nmgp_form_show  = "on";
      $this->nmgp_form_empty = false;
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_valida.php", "C", "NM_Valida") ; 
      $teste_validade = new NM_Valida ;

      if (isset($this->NM_ajax_info['param']['image_ul_name']) && '' != $this->NM_ajax_info['param']['image_ul_name'])
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['upload_field_ul_name'][$this->image_ul_name]))
          {
              $this->NM_ajax_info['param']['image_ul_name'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['upload_field_ul_name'][$this->image_ul_name];
          }
          $this->image = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->NM_ajax_info['param']['image_ul_name'];
          $this->image_scfile_name = substr($this->NM_ajax_info['param']['image_ul_name'], 12);
          $this->image_scfile_type = $this->NM_ajax_info['param']['image_ul_type'];
          $this->image_ul_name = $this->NM_ajax_info['param']['image_ul_name'];
          $this->image_ul_type = $this->NM_ajax_info['param']['image_ul_type'];
      }
      elseif (isset($this->image_ul_name) && '' != $this->image_ul_name)
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['upload_field_ul_name'][$this->image_ul_name]))
          {
              $this->image_ul_name = $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['upload_field_ul_name'][$this->image_ul_name];
          }
          $this->image = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->image_ul_name;
          $this->image_scfile_name = substr($this->image_ul_name, 12);
          $this->image_scfile_type = $this->image_ul_type;
      }

      $this->loadFieldConfig();

      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['first_time'])
      {
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_product_snackbar_mob']['insert']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_product_snackbar_mob']['new']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_product_snackbar_mob']['update']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_product_snackbar_mob']['delete']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_product_snackbar_mob']['first']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_product_snackbar_mob']['back']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_product_snackbar_mob']['forward']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_product_snackbar_mob']['last']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_product_snackbar_mob']['qsearch']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_product_snackbar_mob']['dynsearch']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_product_snackbar_mob']['summary']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_product_snackbar_mob']['navpage']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_product_snackbar_mob']['goto']);
      }
      $this->NM_cancel_return_new = (isset($this->NM_cancel_return_new) && $this->NM_cancel_return_new == 1) ? "1" : "";
      $this->NM_cancel_insert_new = ((isset($this->NM_cancel_insert_new) && $this->NM_cancel_insert_new == 1) || $this->NM_cancel_return_new == 1) ? "document.F5.action='" . $nm_url_saida . "';" : "";
      if (isset($this->NM_btn_insert) && '' != $this->NM_btn_insert && (!isset($_SESSION['scriptcase']['sc_apl_conf']['form_product_snackbar_mob']['insert']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['form_product_snackbar_mob']['insert']))
      {
          if ('N' == $this->NM_btn_insert)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_product_snackbar_mob']['insert'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_product_snackbar_mob']['insert'] = 'on';
          }
      }
      if (isset($this->NM_btn_new) && 'N' == $this->NM_btn_new)
      {
          $_SESSION['scriptcase']['sc_apl_conf_lig']['form_product_snackbar_mob']['new'] = 'off';
      }
      if (isset($this->NM_btn_update) && '' != $this->NM_btn_update && (!isset($_SESSION['scriptcase']['sc_apl_conf']['form_product_snackbar_mob']['update']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['form_product_snackbar_mob']['update']))
      {
          if ('N' == $this->NM_btn_update)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_product_snackbar_mob']['update'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_product_snackbar_mob']['update'] = 'on';
          }
      }
      if (isset($this->NM_btn_delete) && '' != $this->NM_btn_delete && (!isset($_SESSION['scriptcase']['sc_apl_conf']['form_product_snackbar_mob']['delete']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['form_product_snackbar_mob']['delete']))
      {
          if ('N' == $this->NM_btn_delete)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_product_snackbar_mob']['delete'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_product_snackbar_mob']['delete'] = 'on';
          }
      }
      if (isset($this->NM_btn_navega) && '' != $this->NM_btn_navega)
      {
          if ('N' == $this->NM_btn_navega)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_product_snackbar_mob']['first']     = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_product_snackbar_mob']['back']      = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_product_snackbar_mob']['forward']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_product_snackbar_mob']['last']      = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_product_snackbar_mob']['qsearch']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_product_snackbar_mob']['dynsearch'] = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_product_snackbar_mob']['summary']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_product_snackbar_mob']['navpage']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_product_snackbar_mob']['goto']      = 'off';
              $this->Nav_permite_ava = false;
              $this->Nav_permite_ret = false;
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_product_snackbar_mob']['first']     = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_product_snackbar_mob']['back']      = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_product_snackbar_mob']['forward']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_product_snackbar_mob']['last']      = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_product_snackbar_mob']['qsearch']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_product_snackbar_mob']['dynsearch'] = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_product_snackbar_mob']['summary']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_product_snackbar_mob']['navpage']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_product_snackbar_mob']['goto']      = 'on';
          }
      }

      $this->nmgp_botoes['cancel'] = "on";
      $this->nmgp_botoes['exit'] = "on";
      $this->nmgp_botoes['qsearch'] = "on";
      $this->nmgp_botoes['new'] = "on";
      $this->nmgp_botoes['insert'] = "on";
      $this->nmgp_botoes['copy'] = "on";
      $this->nmgp_botoes['update'] = "on";
      $this->nmgp_botoes['delete'] = "off";
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
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['where_orig'] = "";
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['where_pesq']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['where_pesq'] = "";
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['where_pesq_filtro'] = "";
      }
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['where_pesq_filtro'];
      if ($this->NM_ajax_flag && 'event_' == substr($this->NM_ajax_opcao, 0, 6)) {
          $this->nmgp_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['buttonStatus'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['iframe_filtro']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['iframe_filtro'] == "S")
      {
          $this->nmgp_botoes['exit'] = "off";
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_product_snackbar_mob']['btn_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['form_product_snackbar_mob']['btn_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['form_product_snackbar_mob']['btn_display'] as $NM_cada_btn => $NM_cada_opc)
          {
              $this->nmgp_botoes[$NM_cada_btn] = $NM_cada_opc;
          }
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_product_snackbar_mob']['insert']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_product_snackbar_mob']['insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_product_snackbar_mob']['insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_product_snackbar_mob']['insert'];
          $this->nmgp_botoes['copy']   = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_product_snackbar_mob']['insert'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_product_snackbar_mob']['new']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_product_snackbar_mob']['new'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_product_snackbar_mob']['new'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_product_snackbar_mob']['update']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_product_snackbar_mob']['update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_product_snackbar_mob']['update'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_product_snackbar_mob']['delete']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_product_snackbar_mob']['delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_product_snackbar_mob']['delete'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_product_snackbar_mob']['first']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_product_snackbar_mob']['first'] != '')
      {
          $this->nmgp_botoes['first'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_product_snackbar_mob']['first'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_product_snackbar_mob']['back']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_product_snackbar_mob']['back'] != '')
      {
          $this->nmgp_botoes['back'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_product_snackbar_mob']['back'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_product_snackbar_mob']['forward']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_product_snackbar_mob']['forward'] != '')
      {
          $this->nmgp_botoes['forward'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_product_snackbar_mob']['forward'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_product_snackbar_mob']['last']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_product_snackbar_mob']['last'] != '')
      {
          $this->nmgp_botoes['last'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_product_snackbar_mob']['last'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_product_snackbar_mob']['qsearch']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_product_snackbar_mob']['qsearch'] != '')
      {
          $this->nmgp_botoes['qsearch'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_product_snackbar_mob']['qsearch'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_product_snackbar_mob']['dynsearch']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_product_snackbar_mob']['dynsearch'] != '')
      {
          $this->nmgp_botoes['dynsearch'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_product_snackbar_mob']['dynsearch'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_product_snackbar_mob']['summary']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_product_snackbar_mob']['summary'] != '')
      {
          $this->nmgp_botoes['summary'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_product_snackbar_mob']['summary'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_product_snackbar_mob']['navpage']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_product_snackbar_mob']['navpage'] != '')
      {
          $this->nmgp_botoes['navpage'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_product_snackbar_mob']['navpage'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_product_snackbar_mob']['goto']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_product_snackbar_mob']['goto'] != '')
      {
          $this->nmgp_botoes['goto'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_product_snackbar_mob']['goto'];
      }

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['embutida_liga_form_insert']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['embutida_liga_form_insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['embutida_liga_form_insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['embutida_liga_form_insert'];
          $this->nmgp_botoes['copy']   = $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['embutida_liga_form_insert'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['embutida_liga_form_update']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['embutida_liga_form_update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['embutida_liga_form_update'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['embutida_liga_form_delete']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['embutida_liga_form_delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['embutida_liga_form_delete'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['embutida_liga_form_btn_nav']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['embutida_liga_form_btn_nav'] != '')
      {
          $this->nmgp_botoes['first']   = $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['back']    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['forward'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['last']    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['embutida_liga_form_btn_nav'];
      }

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['dashboard_info']['under_dashboard'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['dashboard_info']['maximized']) {
          $tmpDashboardApp = $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['dashboard_info']['dashboard_app'];
          if (isset($_SESSION['scriptcase']['dashboard_toolbar'][$tmpDashboardApp]['form_product_snackbar_mob'])) {
              $tmpDashboardButtons = $_SESSION['scriptcase']['dashboard_toolbar'][$tmpDashboardApp]['form_product_snackbar_mob'];

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

      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_product_snackbar_mob']['insert']) && $_SESSION['scriptcase']['sc_apl_conf']['form_product_snackbar_mob']['insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf']['form_product_snackbar_mob']['insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['scriptcase']['sc_apl_conf']['form_product_snackbar_mob']['insert'];
          $this->nmgp_botoes['copy']   = $_SESSION['scriptcase']['sc_apl_conf']['form_product_snackbar_mob']['insert'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_product_snackbar_mob']['update']) && $_SESSION['scriptcase']['sc_apl_conf']['form_product_snackbar_mob']['update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['scriptcase']['sc_apl_conf']['form_product_snackbar_mob']['update'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_product_snackbar_mob']['delete']) && $_SESSION['scriptcase']['sc_apl_conf']['form_product_snackbar_mob']['delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['scriptcase']['sc_apl_conf']['form_product_snackbar_mob']['delete'];
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_product_snackbar_mob']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['form_product_snackbar_mob']['field_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['form_product_snackbar_mob']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->nmgp_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
              $this->NM_ajax_info['fieldDisplay'][$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_product_snackbar_mob']['field_readonly']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['form_product_snackbar_mob']['field_readonly']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['form_product_snackbar_mob']['field_readonly'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->nmgp_cmp_readonly[$NM_cada_field] = "on";
              $this->NM_ajax_info['readOnly'][$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_product_snackbar_mob']['exit']) && $_SESSION['scriptcase']['sc_apl_conf']['form_product_snackbar_mob']['exit'] != '')
      {
          $_SESSION['scriptcase']['sc_url_saida'][$this->Ini->sc_page]       = $_SESSION['scriptcase']['sc_apl_conf']['form_product_snackbar_mob']['exit'];
          $_SESSION['scriptcase']['sc_force_url_saida'][$this->Ini->sc_page] = true;
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['dados_form']))
      {
          $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['dados_form'];
          if (!isset($this->id_product)){$this->id_product = $this->nmgp_dados_form['id_product'];} 
          if (!isset($this->arcade_clasic)){$this->arcade_clasic = $this->nmgp_dados_form['arcade_clasic'];} 
          if (!isset($this->ultfechaventa)){$this->ultfechaventa = $this->nmgp_dados_form['ultfechaventa'];} 
          if (!isset($this->ingrediente)){$this->ingrediente = $this->nmgp_dados_form['ingrediente'];} 
      }
      $glo_senha_protect = (isset($_SESSION['scriptcase']['glo_senha_protect'])) ? $_SESSION['scriptcase']['glo_senha_protect'] : "S";
      $this->aba_iframe = false;
      if (isset($_SESSION['scriptcase']['sc_aba_iframe']))
      {
          foreach ($_SESSION['scriptcase']['sc_aba_iframe'] as $aba => $apls_aba)
          {
              if (in_array("form_product_snackbar_mob", $apls_aba))
              {
                  $this->aba_iframe = true;
                  break;
              }
          }
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['iframe_menu'] && (!isset($_SESSION['scriptcase']['menu_mobile']) || empty($_SESSION['scriptcase']['menu_mobile'])))
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
              include_once($this->Ini->path_embutida . 'form_product_snackbar/form_product_snackbar_mob_calendar.php');
          }
          else
          { 
              include_once($this->Ini->path_aplicacao . 'form_product_snackbar_mob_calendar.php');
          }
          exit;
      }

      if (is_file($this->Ini->path_aplicacao . 'form_product_snackbar_mob_help.txt'))
      {
          $arr_link_webhelp = file($this->Ini->path_aplicacao . 'form_product_snackbar_mob_help.txt');
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
          require_once($this->Ini->path_embutida . 'form_product_snackbar/form_product_snackbar_mob_erro.class.php');
      }
      else
      { 
          require_once($this->Ini->path_aplicacao . "form_product_snackbar_mob_erro.class.php"); 
      }
      $this->Erro      = new form_product_snackbar_mob_erro();
      $this->Erro->Ini = $this->Ini;
      $this->proc_fast_search = false;
      if ($this->nmgp_opcao == "fast_search")  
      {
          $this->SC_fast_search($this->nmgp_fast_search, $this->nmgp_cond_fast_search, $this->nmgp_arg_fast_search);
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['opcao'] = "inicio";
          $this->nmgp_opcao = "inicio";
          $this->proc_fast_search = true;
      } 
      if ($nm_opc_lookup != "lookup" && $nm_opc_php != "formphp")
      { 
         if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['opcao']))
         { 
             if ($this->id_product != "")   
             { 
                 $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['opcao'] = "igual" ;  
             }   
         }   
      } 
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['opcao']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['opcao']) && empty($this->nmgp_refresh_fields))
      {
          $this->nmgp_opcao = $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['opcao'];  
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['opcao'] = "" ;  
          if ($this->nmgp_opcao == "edit_novo")  
          {
             $this->nmgp_opcao = "novo";
             $this->nm_flag_saida_novo = "S";
          }
      } 
      $this->nm_Start_new = false;
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_product_snackbar_mob']['start']) && $_SESSION['scriptcase']['sc_apl_conf']['form_product_snackbar_mob']['start'] == 'new')
      {
          $this->nmgp_opcao = "novo";
          $this->nm_Start_new = true;
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['opcao'] = "novo";
          unset($_SESSION['scriptcase']['sc_apl_conf']['form_product_snackbar_mob']['start']);
      }
      if ($this->nmgp_opcao == "igual")  
      {
          $this->nmgp_opc_ant = $this->nmgp_opcao;
      } 
      else
      {
          $this->nmgp_opc_ant = $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['opc_ant'];
      } 
      if ($this->nmgp_opcao == "recarga" || $this->nmgp_opcao == "muda_form")  
      {
          $this->nmgp_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['botoes'];
          $this->Nav_permite_ret = 0 != $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['inicio'];
          $this->Nav_permite_ava = $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['total'] != $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['final'];
      }
      else
      {
      }
      $this->nm_flag_iframe = false;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['dados_form'])) 
      {
         $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['dados_form'];
      }
      if ($this->nmgp_opcao == "edit_novo")  
      {
          $this->nmgp_opcao = "novo";
          $this->nm_flag_saida_novo = "S";
      }
//
      if ($this->nmgp_opcao == "excluir")
      {
          $GLOBALS['script_case_init'] = $this->Ini->sc_page;
          $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['form_product_combo_mob_script_case_init'] ]['form_product_combo_mob']['embutida_form'] = false;
          $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['form_product_combo_mob_script_case_init'] ]['form_product_combo_mob']['embutida_proc'] = true;
          $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['form_product_combo_mob_script_case_init'] ]['form_product_combo_mob']['reg_start'] = "";
          unset($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['form_product_combo_mob_script_case_init'] ]['form_product_combo_mob']['total']);
          require_once($this->Ini->root . $this->Ini->path_link  . SC_dir_app_name('form_product_combo_mob') . "/index.php");
          require_once($this->Ini->root . $this->Ini->path_link  . SC_dir_app_name('form_product_combo_mob') . "/form_product_combo_mob_apl.php");
          $this->form_product_combo_mob = new form_product_combo_mob_apl;
      }
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
      if (isset($this->product_name)) { $this->nm_limpa_alfa($this->product_name); }
      if (isset($this->product_code)) { $this->nm_limpa_alfa($this->product_code); }
      if (isset($this->id_status)) { $this->nm_limpa_alfa($this->id_status); }
      if (isset($this->product_value)) { $this->nm_limpa_alfa($this->product_value); }
      if (isset($this->product_cost)) { $this->nm_limpa_alfa($this->product_cost); }
      if (isset($this->discount)) { $this->nm_limpa_alfa($this->discount); }
      if (isset($this->stock)) { $this->nm_limpa_alfa($this->stock); }
      if (isset($this->id_category)) { $this->nm_limpa_alfa($this->id_category); }
      if (isset($this->service)) { $this->nm_limpa_alfa($this->service); }
      if (isset($this->kiosko)) { $this->nm_limpa_alfa($this->kiosko); }
      if (isset($this->entrada)) { $this->nm_limpa_alfa($this->entrada); }
      if (isset($this->jugador)) { $this->nm_limpa_alfa($this->jugador); }
      if (isset($this->visitante)) { $this->nm_limpa_alfa($this->visitante); }
      if (isset($this->tarjeta)) { $this->nm_limpa_alfa($this->tarjeta); }
      if (isset($this->minutos)) { $this->nm_limpa_alfa($this->minutos); }
      if (isset($this->tokens)) { $this->nm_limpa_alfa($this->tokens); }
      if (isset($this->comida)) { $this->nm_limpa_alfa($this->comida); }
      if (isset($this->score)) { $this->nm_limpa_alfa($this->score); }
      if (isset($this->poriva)) { $this->nm_limpa_alfa($this->poriva); }
      if (isset($this->cuentaventa)) { $this->nm_limpa_alfa($this->cuentaventa); }
      if (isset($this->unidad)) { $this->nm_limpa_alfa($this->unidad); }
      if (isset($this->tipoitem)) { $this->nm_limpa_alfa($this->tipoitem); }
      if (isset($this->cuentacompra)) { $this->nm_limpa_alfa($this->cuentacompra); }
      if (isset($this->precioventa)) { $this->nm_limpa_alfa($this->precioventa); }
      if (isset($this->puntoventa)) { $this->nm_limpa_alfa($this->puntoventa); }
      if (isset($this->orden)) { $this->nm_limpa_alfa($this->orden); }
      if (isset($this->combos_recetas)) { $this->nm_limpa_alfa($this->combos_recetas); }
      $Campos_Crit       = "";
      $Campos_erro       = "";
      $Campos_Falta      = array();
      $Campos_Erros      = array();
      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          =  substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['opc_edit'] = true;  
     if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['dados_select'])) 
     {
        $this->nmgp_dados_select = $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['dados_select'];
     }
   }

   function loadFieldConfig()
   {
      $this->field_config = array();
      //-- dateproduct
      $this->field_config['dateproduct']                 = array();
      $this->field_config['dateproduct']['date_format']  = $_SESSION['scriptcase']['reg_conf']['date_format'] . ';' . $_SESSION['scriptcase']['reg_conf']['time_format'];
      $this->field_config['dateproduct']['date_sep']     = $_SESSION['scriptcase']['reg_conf']['date_sep'];
      $this->field_config['dateproduct']['time_sep']     = $_SESSION['scriptcase']['reg_conf']['time_sep'];
      $this->field_config['dateproduct']['date_display'] = "ddmmaaaa";
      $this->new_date_format('DH', 'dateproduct');
      //-- product_cost
      $this->field_config['product_cost']               = array();
      $this->field_config['product_cost']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_val'];
      $this->field_config['product_cost']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['product_cost']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_val'];
      $this->field_config['product_cost']['symbol_mon'] = '';
      $this->field_config['product_cost']['format_pos'] = $_SESSION['scriptcase']['reg_conf']['monet_f_pos'];
      $this->field_config['product_cost']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['monet_f_neg'];
      //-- stock
      $this->field_config['stock']               = array();
      $this->field_config['stock']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['stock']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['stock']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_num'];
      $this->field_config['stock']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['stock']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- poriva
      $this->field_config['poriva']               = array();
      $this->field_config['poriva']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['poriva']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['poriva']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_num'];
      $this->field_config['poriva']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['poriva']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- product_value
      $this->field_config['product_value']               = array();
      $this->field_config['product_value']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_val'];
      $this->field_config['product_value']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['product_value']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_val'];
      $this->field_config['product_value']['symbol_mon'] = '';
      $this->field_config['product_value']['format_pos'] = $_SESSION['scriptcase']['reg_conf']['monet_f_pos'];
      $this->field_config['product_value']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['monet_f_neg'];
      //-- discount
      $this->field_config['discount']               = array();
      $this->field_config['discount']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_val'];
      $this->field_config['discount']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['discount']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_val'];
      $this->field_config['discount']['symbol_mon'] = '';
      $this->field_config['discount']['format_pos'] = $_SESSION['scriptcase']['reg_conf']['monet_f_pos'];
      $this->field_config['discount']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['monet_f_neg'];
      //-- precioventa
      $this->field_config['precioventa']               = array();
      $this->field_config['precioventa']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['precioventa']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['precioventa']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_num'];
      $this->field_config['precioventa']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['precioventa']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- orden
      $this->field_config['orden']               = array();
      $this->field_config['orden']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['orden']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['orden']['symbol_dec'] = '';
      $this->field_config['orden']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['orden']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
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
      //-- score
      $this->field_config['score']               = array();
      $this->field_config['score']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['score']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['score']['symbol_dec'] = '';
      $this->field_config['score']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['score']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- id_product
      $this->field_config['id_product']               = array();
      $this->field_config['id_product']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['id_product']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['id_product']['symbol_dec'] = '';
      $this->field_config['id_product']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['id_product']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- arcade_clasic
      $this->field_config['arcade_clasic']               = array();
      $this->field_config['arcade_clasic']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['arcade_clasic']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['arcade_clasic']['symbol_dec'] = '';
      $this->field_config['arcade_clasic']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['arcade_clasic']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- ultfechaventa
      $this->field_config['ultfechaventa']                 = array();
      $this->field_config['ultfechaventa']['date_format']  = $_SESSION['scriptcase']['reg_conf']['date_format'] . ';' . $_SESSION['scriptcase']['reg_conf']['time_format'];
      $this->field_config['ultfechaventa']['date_sep']     = $_SESSION['scriptcase']['reg_conf']['date_sep'];
      $this->field_config['ultfechaventa']['time_sep']     = $_SESSION['scriptcase']['reg_conf']['time_sep'];
      $this->field_config['ultfechaventa']['date_display'] = "ddmmaaaa;hhiiss";
      $this->new_date_format('DH', 'ultfechaventa');
      //-- ingrediente
      $this->field_config['ingrediente']               = array();
      $this->field_config['ingrediente']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['ingrediente']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['ingrediente']['symbol_dec'] = '';
      $this->field_config['ingrediente']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['ingrediente']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
   }

   function controle()
   {
        global $nm_url_saida, $teste_validade, 
               $glo_senha_protect, $nm_apl_dependente, $nm_form_submit, $sc_check_excl, $nm_opc_form_php, $nm_call_php, $nm_opc_lookup;


      $this->ini_controle();
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['Gera_log_access'])
      {
          $this->NM_gera_log_insert("Scriptcase", "access");
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['Gera_log_access'] = false;
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
          if ('validate_product_name' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'product_name');
          }
          if ('validate_id_category' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'id_category');
          }
          if ('validate_product_code' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'product_code');
          }
          if ('validate_dateproduct' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'dateproduct');
          }
          if ('validate_product_cost' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'product_cost');
          }
          if ('validate_stock' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'stock');
          }
          if ('validate_poriva' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'poriva');
          }
          if ('validate_product_value' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'product_value');
          }
          if ('validate_discount' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'discount');
          }
          if ('validate_precioventa' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'precioventa');
          }
          if ('validate_puntoventa' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'puntoventa');
          }
          if ('validate_kiosko' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'kiosko');
          }
          if ('validate_orden' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'orden');
          }
          if ('validate_id_status' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'id_status');
          }
          if ('validate_cuentaventa' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'cuentaventa');
          }
          if ('validate_unidad' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'unidad');
          }
          if ('validate_cuentacompra' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'cuentacompra');
          }
          if ('validate_tipoitem' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'tipoitem');
          }
          if ('validate_image' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'image');
          }
          if ('validate_service' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'service');
          }
          if ('validate_jugador' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'jugador');
          }
          if ('validate_entrada' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'entrada');
          }
          if ('validate_visitante' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'visitante');
          }
          if ('validate_minutos' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'minutos');
          }
          if ('validate_tarjeta' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'tarjeta');
          }
          if ('validate_tokens' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'tokens');
          }
          if ('validate_comida' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'comida');
          }
          if ('validate_score' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'score');
          }
          if ('validate_combos_recetas' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'combos_recetas');
          }
          form_product_snackbar_mob_pack_ajax_response();
          exit;
      }
      if ($this->NM_ajax_flag && 'event_' == substr($this->NM_ajax_opcao, 0, 6))
      {
          $this->nm_tira_formatacao();
          $this->nm_converte_datas();
          if ('event_precioventa_onclick' == $this->NM_ajax_opcao)
          {
              $this->precioventa_onClick();
          }
          if ('event_product_value_onclick' == $this->NM_ajax_opcao)
          {
              $this->product_value_onClick();
          }
          form_product_snackbar_mob_pack_ajax_response();
          exit;
      }
      if (isset($this->sc_inline_call) && 'Y' == $this->sc_inline_call)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['inline_form_seq'] = $this->sc_seq_row;
          $this->nm_tira_formatacao();
          $this->nm_converte_datas();
      }
      if ($this->nmgp_opcao == "recarga" || $this->nmgp_opcao == "recarga_mobile" || $this->nmgp_opcao == "muda_form") 
      {
          $this->upload_img_doc($Campos_Crit, $Campos_Falta, $Campos_Erros) ; 
          $this->nm_tira_formatacao();
          $this->nm_converte_datas();
          $nm_sc_sv_opcao = $this->nmgp_opcao; 
          $this->nmgp_opcao = "nada"; 
          $this->nm_acessa_banco();
          if ($this->NM_ajax_flag)
          {
              $this->ajax_return_values();
              form_product_snackbar_mob_pack_ajax_response();
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
          $this->product_name = sc_strip_script($this->product_name, $_SESSION['scriptcase']['charset']);
          $this->product_name = sc_strip_tags($this->product_name, $_SESSION['scriptcase']['charset']);
          $this->product_code = sc_strip_script($this->product_code, $_SESSION['scriptcase']['charset']);
          $this->product_code = sc_strip_tags($this->product_code, $_SESSION['scriptcase']['charset']);
          $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros) ; 
          $_SESSION['scriptcase']['form_product_snackbar_mob']['contr_erro'] = 'off';
          if ($Campos_Crit != "") 
          {
              $Campos_Crit = $this->Ini->Nm_lang['lang_errm_flds'] . ' ' . $Campos_Crit ; 
          }
          if ($Campos_Crit != "" || !empty($Campos_Falta) || $this->Campos_Mens_erro != "")
          {
              if ($this->NM_ajax_flag)
              {
                  form_product_snackbar_mob_pack_ajax_response();
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
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['recarga'] = $this->nmgp_opcao;
      }
      if ($this->NM_ajax_flag && 'navigate_form' == $this->NM_ajax_opcao)
      {
          $this->ajax_return_values();
          $this->ajax_add_parameters();
          form_product_snackbar_mob_pack_ajax_response();
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
          form_product_snackbar_mob_pack_ajax_response();
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
          $Zip_name = "sc_prt_" . date("YmdHis") . "_" . rand(0, 1000) . "form_product_snackbar_mob.zip";
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
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob'][$path_doc_md5][0] = $Arq_htm;
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob'][$path_doc_md5][1] = $Zip_name;
?>
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE><?php echo strip_tags("Productos") ?></TITLE>
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
<form name="Fdown" method="get" action="form_product_snackbar_mob_download.php" target="_self" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo $this->form_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="form_product_snackbar_mob"> 
<input type="hidden" name="nm_name_doc" value="<?php echo $path_doc_md5 ?>"> 
</form>
<form name="F0" method=post action="form_product_snackbar_mob.php" target="_self" style="display: none"> 
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
       if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['SC_sep_date']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['SC_sep_date']))
       {
           $delim  = $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['SC_sep_date'];
           $delim1 = $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['SC_sep_date1'];
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
           $comando = "INSERT INTO sc_log (inserted_date, username, application, creator, ip_user, `action`, description) VALUES ($dt, " . $this->Db->qstr($usr) . ", 'form_product_snackbar_mob', '$orig', '" . $_SERVER['REMOTE_ADDR'] . "', '$evento', " . $this->Db->qstr($texto) . ")"; 
       } 
       elseif (in_array(strtolower($_SESSION['scriptcase']['glo_tpbanco']), $this->Ini->nm_bases_sqlite))
       { 
           $comando = "INSERT INTO sc_log (id, inserted_date, username, application, creator, ip_user, action, description) VALUES (NULL, $dt, " . $this->Db->qstr($usr) . ", 'form_product_snackbar_mob', '$orig', '" . $_SERVER['REMOTE_ADDR'] . "', '$evento', " . $this->Db->qstr($texto) . ")"; 
       } 
       else
       { 
           $comando = "INSERT INTO sc_log (inserted_date, username, application, creator, ip_user, action, description) VALUES ($dt, " . $this->Db->qstr($usr) . ", 'form_product_snackbar_mob', '$orig', '" . $_SERVER['REMOTE_ADDR'] . "', '$evento', " . $this->Db->qstr($texto) . ")"; 
       } 
       $_SESSION['scriptcase']['sc_sql_ult_comando'] = $comando; 
       $rlog = $this->Db->Execute($comando); 
       if ($rlog === false)  
       { 
           $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_inst'], $this->Db->ErrorMsg()); 
           if ($this->NM_ajax_flag)
           {
               form_product_snackbar_mob_pack_ajax_response();
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
           case 'product_name':
               return "" . $this->Ini->Nm_lang['lang_product_fld_product_name'] . "";
               break;
           case 'id_category':
               return "" . $this->Ini->Nm_lang['lang_product_fld_id_category'] . "";
               break;
           case 'product_code':
               return "" . $this->Ini->Nm_lang['lang_product_fld_product_code'] . "";
               break;
           case 'dateproduct':
               return "" . $this->Ini->Nm_lang['lang_product_fld_dateproduct'] . "";
               break;
           case 'product_cost':
               return "" . $this->Ini->Nm_lang['lang_product_fld_product_cost'] . "";
               break;
           case 'stock':
               return "" . $this->Ini->Nm_lang['lang_product_fld_stock'] . "";
               break;
           case 'poriva':
               return "Poriva";
               break;
           case 'product_value':
               return "" . $this->Ini->Nm_lang['lang_product_fld_product_value'] . "";
               break;
           case 'discount':
               return "" . $this->Ini->Nm_lang['lang_product_fld_discount'] . "";
               break;
           case 'precioventa':
               return "Precioventa subtotal";
               break;
           case 'puntoventa':
               return "Puntoventa";
               break;
           case 'kiosko':
               return "Kiosko";
               break;
           case 'orden':
               return "Orden";
               break;
           case 'id_status':
               return "" . $this->Ini->Nm_lang['lang_product_fld_id_status'] . "";
               break;
           case 'cuentaventa':
               return "Cuentaventa";
               break;
           case 'unidad':
               return "Unidad";
               break;
           case 'cuentacompra':
               return "Cuentacompra";
               break;
           case 'tipoitem':
               return "Tipoitem";
               break;
           case 'image':
               return "" . $this->Ini->Nm_lang['lang_product_fld_image'] . "";
               break;
           case 'service':
               return "SERVICIO";
               break;
           case 'jugador':
               return "Jugador";
               break;
           case 'entrada':
               return "Entrada";
               break;
           case 'visitante':
               return "Visitante";
               break;
           case 'minutos':
               return "Minutos";
               break;
           case 'tarjeta':
               return "Tarjeta";
               break;
           case 'tokens':
               return "Tokens";
               break;
           case 'comida':
               return "Comida";
               break;
           case 'score':
               return "Score";
               break;
           case 'combos_recetas':
               return "Combos_Recetas";
               break;
           case 'id_product':
               return "" . $this->Ini->Nm_lang['lang_product_fld_id_product'] . "";
               break;
           case 'arcade_clasic':
               return "Arcade Clasic";
               break;
           case 'ultfechaventa':
               return "Ultfechaventa";
               break;
           case 'ingrediente':
               return "Ingrediente";
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
      if ((!is_array($filtro) && ('' == $filtro || 'product_name' == $filtro)) || (is_array($filtro) && in_array('product_name', $filtro)))
        $this->ValidateField_product_name($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'id_category' == $filtro)) || (is_array($filtro) && in_array('id_category', $filtro)))
        $this->ValidateField_id_category($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'product_code' == $filtro)) || (is_array($filtro) && in_array('product_code', $filtro)))
        $this->ValidateField_product_code($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'dateproduct' == $filtro)) || (is_array($filtro) && in_array('dateproduct', $filtro)))
        $this->ValidateField_dateproduct($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'product_cost' == $filtro)) || (is_array($filtro) && in_array('product_cost', $filtro)))
        $this->ValidateField_product_cost($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'stock' == $filtro)) || (is_array($filtro) && in_array('stock', $filtro)))
        $this->ValidateField_stock($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'poriva' == $filtro)) || (is_array($filtro) && in_array('poriva', $filtro)))
        $this->ValidateField_poriva($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'product_value' == $filtro)) || (is_array($filtro) && in_array('product_value', $filtro)))
        $this->ValidateField_product_value($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'discount' == $filtro)) || (is_array($filtro) && in_array('discount', $filtro)))
        $this->ValidateField_discount($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'precioventa' == $filtro)) || (is_array($filtro) && in_array('precioventa', $filtro)))
        $this->ValidateField_precioventa($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'puntoventa' == $filtro)) || (is_array($filtro) && in_array('puntoventa', $filtro)))
        $this->ValidateField_puntoventa($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'kiosko' == $filtro)) || (is_array($filtro) && in_array('kiosko', $filtro)))
        $this->ValidateField_kiosko($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'orden' == $filtro)) || (is_array($filtro) && in_array('orden', $filtro)))
        $this->ValidateField_orden($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'id_status' == $filtro)) || (is_array($filtro) && in_array('id_status', $filtro)))
        $this->ValidateField_id_status($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'cuentaventa' == $filtro)) || (is_array($filtro) && in_array('cuentaventa', $filtro)))
        $this->ValidateField_cuentaventa($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'unidad' == $filtro)) || (is_array($filtro) && in_array('unidad', $filtro)))
        $this->ValidateField_unidad($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'cuentacompra' == $filtro)) || (is_array($filtro) && in_array('cuentacompra', $filtro)))
        $this->ValidateField_cuentacompra($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'tipoitem' == $filtro)) || (is_array($filtro) && in_array('tipoitem', $filtro)))
        $this->ValidateField_tipoitem($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'image' == $filtro)) || (is_array($filtro) && in_array('image', $filtro)))
        $this->ValidateField_image($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'service' == $filtro)) || (is_array($filtro) && in_array('service', $filtro)))
        $this->ValidateField_service($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'jugador' == $filtro)) || (is_array($filtro) && in_array('jugador', $filtro)))
        $this->ValidateField_jugador($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'entrada' == $filtro)) || (is_array($filtro) && in_array('entrada', $filtro)))
        $this->ValidateField_entrada($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'visitante' == $filtro)) || (is_array($filtro) && in_array('visitante', $filtro)))
        $this->ValidateField_visitante($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'minutos' == $filtro)) || (is_array($filtro) && in_array('minutos', $filtro)))
        $this->ValidateField_minutos($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'tarjeta' == $filtro)) || (is_array($filtro) && in_array('tarjeta', $filtro)))
        $this->ValidateField_tarjeta($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'tokens' == $filtro)) || (is_array($filtro) && in_array('tokens', $filtro)))
        $this->ValidateField_tokens($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'comida' == $filtro)) || (is_array($filtro) && in_array('comida', $filtro)))
        $this->ValidateField_comida($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'score' == $filtro)) || (is_array($filtro) && in_array('score', $filtro)))
        $this->ValidateField_score($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'combos_recetas' == $filtro)) || (is_array($filtro) && in_array('combos_recetas', $filtro)))
        $this->ValidateField_combos_recetas($Campos_Crit, $Campos_Falta, $Campos_Erros);
      $this->upload_img_doc($Campos_Crit, $Campos_Falta, $Campos_Erros);
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

    function ValidateField_product_name(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['php_cmp_required']['product_name']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['php_cmp_required']['product_name'] == "on")) 
      { 
          if ($this->product_name == "")  
          { 
              $hasError = true;
              $Campos_Falta[] =  "" . $this->Ini->Nm_lang['lang_product_fld_product_name'] . "" ; 
              if (!isset($Campos_Erros['product_name']))
              {
                  $Campos_Erros['product_name'] = array();
              }
              $Campos_Erros['product_name'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['product_name']) || !is_array($this->NM_ajax_info['errList']['product_name']))
                  {
                      $this->NM_ajax_info['errList']['product_name'] = array();
                  }
                  $this->NM_ajax_info['errList']['product_name'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          } 
      } 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->product_name) > 50) 
          { 
              $hasError = true;
              $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_product_fld_product_name'] . " " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 50 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['product_name']))
              {
                  $Campos_Erros['product_name'] = array();
              }
              $Campos_Erros['product_name'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 50 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['product_name']) || !is_array($this->NM_ajax_info['errList']['product_name']))
              {
                  $this->NM_ajax_info['errList']['product_name'] = array();
              }
              $this->NM_ajax_info['errList']['product_name'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 50 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'product_name';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_product_name

    function ValidateField_id_category(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->id_category == "" && $this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['php_cmp_required']['id_category']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['php_cmp_required']['id_category'] == "on"))
      {
          $hasError = true;
          $Campos_Falta[] = "" . $this->Ini->Nm_lang['lang_product_fld_id_category'] . "" ; 
          if (!isset($Campos_Erros['id_category']))
          {
              $Campos_Erros['id_category'] = array();
          }
          $Campos_Erros['id_category'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          if (!isset($this->NM_ajax_info['errList']['id_category']) || !is_array($this->NM_ajax_info['errList']['id_category']))
          {
              $this->NM_ajax_info['errList']['id_category'] = array();
          }
          $this->NM_ajax_info['errList']['id_category'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
      }
          if (!empty($this->id_category) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['Lookup_id_category']) && !in_array($this->id_category, $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['Lookup_id_category']))
          {
              $hasError = true;
              $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
              if (!isset($Campos_Erros['id_category']))
              {
                  $Campos_Erros['id_category'] = array();
              }
              $Campos_Erros['id_category'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
              if (!isset($this->NM_ajax_info['errList']['id_category']) || !is_array($this->NM_ajax_info['errList']['id_category']))
              {
                  $this->NM_ajax_info['errList']['id_category'] = array();
              }
              $this->NM_ajax_info['errList']['id_category'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
          }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'id_category';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_id_category

    function ValidateField_product_code(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['php_cmp_required']['product_code']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['php_cmp_required']['product_code'] == "on")) 
      { 
          if ($this->product_code == "")  
          { 
              $hasError = true;
              $Campos_Falta[] =  "" . $this->Ini->Nm_lang['lang_product_fld_product_code'] . "" ; 
              if (!isset($Campos_Erros['product_code']))
              {
                  $Campos_Erros['product_code'] = array();
              }
              $Campos_Erros['product_code'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['product_code']) || !is_array($this->NM_ajax_info['errList']['product_code']))
                  {
                      $this->NM_ajax_info['errList']['product_code'] = array();
                  }
                  $this->NM_ajax_info['errList']['product_code'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          } 
      } 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->product_code) > 50) 
          { 
              $hasError = true;
              $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_product_fld_product_code'] . " " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 50 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['product_code']))
              {
                  $Campos_Erros['product_code'] = array();
              }
              $Campos_Erros['product_code'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 50 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['product_code']) || !is_array($this->NM_ajax_info['errList']['product_code']))
              {
                  $this->NM_ajax_info['errList']['product_code'] = array();
              }
              $this->NM_ajax_info['errList']['product_code'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 50 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'product_code';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_product_code

    function ValidateField_dateproduct(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      nm_limpa_data($this->dateproduct, $this->field_config['dateproduct']['date_sep']) ; 
      $trab_dt_min = ""; 
      $trab_dt_max = ""; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          $guarda_datahora = $this->field_config['dateproduct']['date_format']; 
          if (false !== strpos($guarda_datahora, ';')) $this->field_config['dateproduct']['date_format'] = substr($guarda_datahora, 0, strpos($guarda_datahora, ';'));
          $Format_Data = $this->field_config['dateproduct']['date_format']; 
          nm_limpa_data($Format_Data, $this->field_config['dateproduct']['date_sep']) ; 
          if (trim($this->dateproduct) != "")  
          { 
              if ($teste_validade->Data($this->dateproduct, $Format_Data, $trab_dt_min, $trab_dt_max) == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_product_fld_dateproduct'] . "; " ; 
                  if (!isset($Campos_Erros['dateproduct']))
                  {
                      $Campos_Erros['dateproduct'] = array();
                  }
                  $Campos_Erros['dateproduct'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['dateproduct']) || !is_array($this->NM_ajax_info['errList']['dateproduct']))
                  {
                      $this->NM_ajax_info['errList']['dateproduct'] = array();
                  }
                  $this->NM_ajax_info['errList']['dateproduct'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
          $this->field_config['dateproduct']['date_format'] = $guarda_datahora; 
       } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'dateproduct';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
      nm_limpa_hora($this->dateproduct_hora, $this->field_config['dateproduct_hora']['time_sep']) ; 
      if ($this->nmgp_opcao != "excluir") 
      {
          $Format_Hora = $this->field_config['dateproduct_hora']['date_format']; 
          nm_limpa_hora($Format_Hora, $this->field_config['dateproduct_hora']['time_sep']) ; 
          if (trim($this->dateproduct_hora) != "")  
          { 
              if ($teste_validade->Hora($this->dateproduct_hora, $Format_Hora) == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_product_fld_dateproduct'] . "; " ; 
                  if (!isset($Campos_Erros['dateproduct_hora']))
                  {
                      $Campos_Erros['dateproduct_hora'] = array();
                  }
                  $Campos_Erros['dateproduct_hora'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['dateproduct']) || !is_array($this->NM_ajax_info['errList']['dateproduct']))
                  {
                      $this->NM_ajax_info['errList']['dateproduct'] = array();
                  }
                  $this->NM_ajax_info['errList']['dateproduct'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
      if (isset($Campos_Erros['dateproduct']) && isset($Campos_Erros['dateproduct_hora']))
      {
          $this->removeDuplicateDttmError($Campos_Erros['dateproduct'], $Campos_Erros['dateproduct_hora']);
          if (empty($Campos_Erros['dateproduct_hora']))
          {
              unset($Campos_Erros['dateproduct_hora']);
          }
          if (isset($this->NM_ajax_info['errList']['dateproduct']))
          {
              $this->NM_ajax_info['errList']['dateproduct'] = array_unique($this->NM_ajax_info['errList']['dateproduct']);
          }
      }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'dateproduct_hora';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_dateproduct_hora

    function ValidateField_product_cost(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->product_cost === "" || is_null($this->product_cost))  
      { 
          $this->product_cost = 0;
          $this->sc_force_zero[] = 'product_cost';
      } 
      if (!empty($this->field_config['product_cost']['symbol_dec']))
      {
          $this->sc_remove_currency($this->product_cost, $this->field_config['product_cost']['symbol_dec'], $this->field_config['product_cost']['symbol_grp'], $this->field_config['product_cost']['symbol_mon']); 
          nm_limpa_valor($this->product_cost, $this->field_config['product_cost']['symbol_dec'], $this->field_config['product_cost']['symbol_grp']) ; 
          if ('.' == substr($this->product_cost, 0, 1))
          {
              if ('' == str_replace('0', '', substr($this->product_cost, 1)))
              {
                  $this->product_cost = '';
              }
              else
              {
                  $this->product_cost = '0' . $this->product_cost;
              }
          }
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->product_cost != '')  
          { 
              $iTestSize = 11;
              if (strlen($this->product_cost) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_product_fld_product_cost'] . ": " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['product_cost']))
                  {
                      $Campos_Erros['product_cost'] = array();
                  }
                  $Campos_Erros['product_cost'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['product_cost']) || !is_array($this->NM_ajax_info['errList']['product_cost']))
                  {
                      $this->NM_ajax_info['errList']['product_cost'] = array();
                  }
                  $this->NM_ajax_info['errList']['product_cost'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->product_cost, 8, 2, -0, 9999999999, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_product_fld_product_cost'] . "; " ; 
                  if (!isset($Campos_Erros['product_cost']))
                  {
                      $Campos_Erros['product_cost'] = array();
                  }
                  $Campos_Erros['product_cost'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['product_cost']) || !is_array($this->NM_ajax_info['errList']['product_cost']))
                  {
                      $this->NM_ajax_info['errList']['product_cost'] = array();
                  }
                  $this->NM_ajax_info['errList']['product_cost'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'product_cost';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_product_cost

    function ValidateField_stock(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->stock === "" || is_null($this->stock))  
      { 
          $this->stock = 0;
          $this->sc_force_zero[] = 'stock';
      } 
      if (!empty($this->field_config['stock']['symbol_dec']))
      {
          nm_limpa_valor($this->stock, $this->field_config['stock']['symbol_dec'], $this->field_config['stock']['symbol_grp']) ; 
          if ('.' == substr($this->stock, 0, 1))
          {
              if ('' == str_replace('0', '', substr($this->stock, 1)))
              {
                  $this->stock = '';
              }
              else
              {
                  $this->stock = '0' . $this->stock;
              }
          }
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->stock != '')  
          { 
              $iTestSize = 12;
              if (strlen($this->stock) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_product_fld_stock'] . ": " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['stock']))
                  {
                      $Campos_Erros['stock'] = array();
                  }
                  $Campos_Erros['stock'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['stock']) || !is_array($this->NM_ajax_info['errList']['stock']))
                  {
                      $this->NM_ajax_info['errList']['stock'] = array();
                  }
                  $this->NM_ajax_info['errList']['stock'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->stock, 9, 2, -0, 99999999999, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_product_fld_stock'] . "; " ; 
                  if (!isset($Campos_Erros['stock']))
                  {
                      $Campos_Erros['stock'] = array();
                  }
                  $Campos_Erros['stock'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['stock']) || !is_array($this->NM_ajax_info['errList']['stock']))
                  {
                      $this->NM_ajax_info['errList']['stock'] = array();
                  }
                  $this->NM_ajax_info['errList']['stock'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'stock';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_stock

    function ValidateField_poriva(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->poriva === "" || is_null($this->poriva))  
      { 
          $this->poriva = 0;
          $this->sc_force_zero[] = 'poriva';
      } 
      if (!empty($this->field_config['poriva']['symbol_dec']))
      {
          nm_limpa_valor($this->poriva, $this->field_config['poriva']['symbol_dec'], $this->field_config['poriva']['symbol_grp']) ; 
          if ('.' == substr($this->poriva, 0, 1))
          {
              if ('' == str_replace('0', '', substr($this->poriva, 1)))
              {
                  $this->poriva = '';
              }
              else
              {
                  $this->poriva = '0' . $this->poriva;
              }
          }
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->poriva != '')  
          { 
              $iTestSize = 20;
              if (strlen($this->poriva) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Poriva: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['poriva']))
                  {
                      $Campos_Erros['poriva'] = array();
                  }
                  $Campos_Erros['poriva'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['poriva']) || !is_array($this->NM_ajax_info['errList']['poriva']))
                  {
                      $this->NM_ajax_info['errList']['poriva'] = array();
                  }
                  $this->NM_ajax_info['errList']['poriva'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->poriva, 17, 2, -0, 1.0E+19, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Poriva; " ; 
                  if (!isset($Campos_Erros['poriva']))
                  {
                      $Campos_Erros['poriva'] = array();
                  }
                  $Campos_Erros['poriva'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['poriva']) || !is_array($this->NM_ajax_info['errList']['poriva']))
                  {
                      $this->NM_ajax_info['errList']['poriva'] = array();
                  }
                  $this->NM_ajax_info['errList']['poriva'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'poriva';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_poriva

    function ValidateField_product_value(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->product_value === "" || is_null($this->product_value))  
      { 
          $this->product_value = 0;
          $this->sc_force_zero[] = 'product_value';
      } 
      if (!empty($this->field_config['product_value']['symbol_dec']))
      {
          $this->sc_remove_currency($this->product_value, $this->field_config['product_value']['symbol_dec'], $this->field_config['product_value']['symbol_grp'], $this->field_config['product_value']['symbol_mon']); 
          nm_limpa_valor($this->product_value, $this->field_config['product_value']['symbol_dec'], $this->field_config['product_value']['symbol_grp']) ; 
          if ('.' == substr($this->product_value, 0, 1))
          {
              if ('' == str_replace('0', '', substr($this->product_value, 1)))
              {
                  $this->product_value = '';
              }
              else
              {
                  $this->product_value = '0' . $this->product_value;
              }
          }
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->product_value != '')  
          { 
              $iTestSize = 11;
              if (strlen($this->product_value) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_product_fld_product_value'] . ": " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['product_value']))
                  {
                      $Campos_Erros['product_value'] = array();
                  }
                  $Campos_Erros['product_value'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['product_value']) || !is_array($this->NM_ajax_info['errList']['product_value']))
                  {
                      $this->NM_ajax_info['errList']['product_value'] = array();
                  }
                  $this->NM_ajax_info['errList']['product_value'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->product_value, 8, 2, -0, 9999999999, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_product_fld_product_value'] . "; " ; 
                  if (!isset($Campos_Erros['product_value']))
                  {
                      $Campos_Erros['product_value'] = array();
                  }
                  $Campos_Erros['product_value'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['product_value']) || !is_array($this->NM_ajax_info['errList']['product_value']))
                  {
                      $this->NM_ajax_info['errList']['product_value'] = array();
                  }
                  $this->NM_ajax_info['errList']['product_value'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'product_value';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_product_value

    function ValidateField_discount(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->discount === "" || is_null($this->discount))  
      { 
          $this->discount = 0;
          $this->sc_force_zero[] = 'discount';
      } 
      if (!empty($this->field_config['discount']['symbol_dec']))
      {
          $this->sc_remove_currency($this->discount, $this->field_config['discount']['symbol_dec'], $this->field_config['discount']['symbol_grp'], $this->field_config['discount']['symbol_mon']); 
          nm_limpa_valor($this->discount, $this->field_config['discount']['symbol_dec'], $this->field_config['discount']['symbol_grp']) ; 
          if ('.' == substr($this->discount, 0, 1))
          {
              if ('' == str_replace('0', '', substr($this->discount, 1)))
              {
                  $this->discount = '';
              }
              else
              {
                  $this->discount = '0' . $this->discount;
              }
          }
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->discount != '')  
          { 
              $iTestSize = 11;
              if (strlen($this->discount) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_product_fld_discount'] . ": " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['discount']))
                  {
                      $Campos_Erros['discount'] = array();
                  }
                  $Campos_Erros['discount'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['discount']) || !is_array($this->NM_ajax_info['errList']['discount']))
                  {
                      $this->NM_ajax_info['errList']['discount'] = array();
                  }
                  $this->NM_ajax_info['errList']['discount'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->discount, 8, 2, -0, 9999999999, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_product_fld_discount'] . "; " ; 
                  if (!isset($Campos_Erros['discount']))
                  {
                      $Campos_Erros['discount'] = array();
                  }
                  $Campos_Erros['discount'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['discount']) || !is_array($this->NM_ajax_info['errList']['discount']))
                  {
                      $this->NM_ajax_info['errList']['discount'] = array();
                  }
                  $this->NM_ajax_info['errList']['discount'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'discount';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_discount

    function ValidateField_precioventa(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->precioventa === "" || is_null($this->precioventa))  
      { 
          $this->precioventa = 0;
          $this->sc_force_zero[] = 'precioventa';
      } 
      if (!empty($this->field_config['precioventa']['symbol_dec']))
      {
          nm_limpa_valor($this->precioventa, $this->field_config['precioventa']['symbol_dec'], $this->field_config['precioventa']['symbol_grp']) ; 
          if ('.' == substr($this->precioventa, 0, 1))
          {
              if ('' == str_replace('0', '', substr($this->precioventa, 1)))
              {
                  $this->precioventa = '';
              }
              else
              {
                  $this->precioventa = '0' . $this->precioventa;
              }
          }
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->precioventa != '')  
          { 
              $iTestSize = 20;
              if (strlen($this->precioventa) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Precioventa subtotal: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['precioventa']))
                  {
                      $Campos_Erros['precioventa'] = array();
                  }
                  $Campos_Erros['precioventa'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['precioventa']) || !is_array($this->NM_ajax_info['errList']['precioventa']))
                  {
                      $this->NM_ajax_info['errList']['precioventa'] = array();
                  }
                  $this->NM_ajax_info['errList']['precioventa'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->precioventa, 10, 9, -0, 1.0E+19, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Precioventa subtotal; " ; 
                  if (!isset($Campos_Erros['precioventa']))
                  {
                      $Campos_Erros['precioventa'] = array();
                  }
                  $Campos_Erros['precioventa'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['precioventa']) || !is_array($this->NM_ajax_info['errList']['precioventa']))
                  {
                      $this->NM_ajax_info['errList']['precioventa'] = array();
                  }
                  $this->NM_ajax_info['errList']['precioventa'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'precioventa';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_precioventa

    function ValidateField_puntoventa(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->puntoventa == "" && $this->nmgp_opcao != "excluir")
      { 
      } 
      if ($this->puntoventa === "" || is_null($this->puntoventa))  
      { 
          $this->puntoventa = 0;
          $this->sc_force_zero[] = 'puntoventa';
      } 
      if ($this->puntoventa != "")
      { 
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['Lookup_puntoventa']) && !in_array($this->puntoventa, $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['Lookup_puntoventa']))
          {
              $hasError = true;
              $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
              if (!isset($Campos_Erros['puntoventa']))
              {
                  $Campos_Erros['puntoventa'] = array();
              }
              $Campos_Erros['puntoventa'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
              if (!isset($this->NM_ajax_info['errList']['puntoventa']) || !is_array($this->NM_ajax_info['errList']['puntoventa']))
              {
                  $this->NM_ajax_info['errList']['puntoventa'] = array();
              }
              $this->NM_ajax_info['errList']['puntoventa'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
          }
      }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'puntoventa';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_puntoventa

    function ValidateField_kiosko(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->kiosko == "" && $this->nmgp_opcao != "excluir")
      { 
      } 
      if ($this->kiosko === "" || is_null($this->kiosko))  
      { 
          $this->kiosko = 0;
          $this->sc_force_zero[] = 'kiosko';
      } 
      if ($this->kiosko != "")
      { 
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['Lookup_kiosko']) && !in_array($this->kiosko, $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['Lookup_kiosko']))
          {
              $hasError = true;
              $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
              if (!isset($Campos_Erros['kiosko']))
              {
                  $Campos_Erros['kiosko'] = array();
              }
              $Campos_Erros['kiosko'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
              if (!isset($this->NM_ajax_info['errList']['kiosko']) || !is_array($this->NM_ajax_info['errList']['kiosko']))
              {
                  $this->NM_ajax_info['errList']['kiosko'] = array();
              }
              $this->NM_ajax_info['errList']['kiosko'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
          }
      }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'kiosko';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_kiosko

    function ValidateField_orden(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->orden === "" || is_null($this->orden))  
      { 
          $this->orden = 0;
          $this->sc_force_zero[] = 'orden';
      } 
      nm_limpa_numero($this->orden, $this->field_config['orden']['symbol_grp']) ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->orden != '')  
          { 
              $iTestSize = 11;
              if (strlen($this->orden) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Orden: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['orden']))
                  {
                      $Campos_Erros['orden'] = array();
                  }
                  $Campos_Erros['orden'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['orden']) || !is_array($this->NM_ajax_info['errList']['orden']))
                  {
                      $this->NM_ajax_info['errList']['orden'] = array();
                  }
                  $this->NM_ajax_info['errList']['orden'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->orden, 11, 0, -0, 99999999999, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Orden; " ; 
                  if (!isset($Campos_Erros['orden']))
                  {
                      $Campos_Erros['orden'] = array();
                  }
                  $Campos_Erros['orden'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['orden']) || !is_array($this->NM_ajax_info['errList']['orden']))
                  {
                      $this->NM_ajax_info['errList']['orden'] = array();
                  }
                  $this->NM_ajax_info['errList']['orden'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'orden';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_orden

    function ValidateField_id_status(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
               if (!empty($this->id_status) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['Lookup_id_status']) && !in_array($this->id_status, $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['Lookup_id_status']))
               {
                   $hasError = true;
                   $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($Campos_Erros['id_status']))
                   {
                       $Campos_Erros['id_status'] = array();
                   }
                   $Campos_Erros['id_status'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($this->NM_ajax_info['errList']['id_status']) || !is_array($this->NM_ajax_info['errList']['id_status']))
                   {
                       $this->NM_ajax_info['errList']['id_status'] = array();
                   }
                   $this->NM_ajax_info['errList']['id_status'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
               }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'id_status';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_id_status

    function ValidateField_cuentaventa(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->cuentaventa == "" && $this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['php_cmp_required']['cuentaventa']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['php_cmp_required']['cuentaventa'] == "on"))
      {
          $hasError = true;
          $Campos_Falta[] = "Cuentaventa" ; 
          if (!isset($Campos_Erros['cuentaventa']))
          {
              $Campos_Erros['cuentaventa'] = array();
          }
          $Campos_Erros['cuentaventa'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          if (!isset($this->NM_ajax_info['errList']['cuentaventa']) || !is_array($this->NM_ajax_info['errList']['cuentaventa']))
          {
              $this->NM_ajax_info['errList']['cuentaventa'] = array();
          }
          $this->NM_ajax_info['errList']['cuentaventa'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
      }
          if (!empty($this->cuentaventa) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['Lookup_cuentaventa']) && !in_array($this->cuentaventa, $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['Lookup_cuentaventa']))
          {
              $hasError = true;
              $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
              if (!isset($Campos_Erros['cuentaventa']))
              {
                  $Campos_Erros['cuentaventa'] = array();
              }
              $Campos_Erros['cuentaventa'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
              if (!isset($this->NM_ajax_info['errList']['cuentaventa']) || !is_array($this->NM_ajax_info['errList']['cuentaventa']))
              {
                  $this->NM_ajax_info['errList']['cuentaventa'] = array();
              }
              $this->NM_ajax_info['errList']['cuentaventa'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
          }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'cuentaventa';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_cuentaventa

    function ValidateField_unidad(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->unidad) > 45) 
          { 
              $hasError = true;
              $Campos_Crit .= "Unidad " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 45 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['unidad']))
              {
                  $Campos_Erros['unidad'] = array();
              }
              $Campos_Erros['unidad'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 45 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['unidad']) || !is_array($this->NM_ajax_info['errList']['unidad']))
              {
                  $this->NM_ajax_info['errList']['unidad'] = array();
              }
              $this->NM_ajax_info['errList']['unidad'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 45 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'unidad';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_unidad

    function ValidateField_cuentacompra(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->cuentacompra) > 45) 
          { 
              $hasError = true;
              $Campos_Crit .= "Cuentacompra " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 45 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['cuentacompra']))
              {
                  $Campos_Erros['cuentacompra'] = array();
              }
              $Campos_Erros['cuentacompra'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 45 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['cuentacompra']) || !is_array($this->NM_ajax_info['errList']['cuentacompra']))
              {
                  $this->NM_ajax_info['errList']['cuentacompra'] = array();
              }
              $this->NM_ajax_info['errList']['cuentacompra'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 45 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'cuentacompra';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_cuentacompra

    function ValidateField_tipoitem(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->tipoitem) > 45) 
          { 
              $hasError = true;
              $Campos_Crit .= "Tipoitem " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 45 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['tipoitem']))
              {
                  $Campos_Erros['tipoitem'] = array();
              }
              $Campos_Erros['tipoitem'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 45 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['tipoitem']) || !is_array($this->NM_ajax_info['errList']['tipoitem']))
              {
                  $this->NM_ajax_info['errList']['tipoitem'] = array();
              }
              $this->NM_ajax_info['errList']['tipoitem'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 45 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'tipoitem';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_tipoitem

    function ValidateField_image(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
        if ($this->nmgp_opcao != "excluir")
        {
            $sTestFile = $this->image;
            if ("" != $this->image && "S" != $this->image_limpa && !$teste_validade->ArqExtensao($this->image, array()))
            {
                $hasError = true;
                $Campos_Crit .= "{lang_product_fld_image}: " . $this->Ini->Nm_lang['lang_errm_file_invl']; 
                if (!isset($Campos_Erros['image']))
                {
                    $Campos_Erros['image'] = array();
                }
                $Campos_Erros['image'][] = $this->Ini->Nm_lang['lang_errm_file_invl'];
                if (!isset($this->NM_ajax_info['errList']['image']) || !is_array($this->NM_ajax_info['errList']['image']))
                {
                    $this->NM_ajax_info['errList']['image'] = array();
                }
                $this->NM_ajax_info['errList']['image'][] = $this->Ini->Nm_lang['lang_errm_file_invl'];
            }
        }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'image';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_image

    function ValidateField_service(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->service == "" && $this->nmgp_opcao != "excluir")
      { 
      } 
      if ($this->service === "" || is_null($this->service))  
      { 
          $this->service = 0;
          $this->sc_force_zero[] = 'service';
      } 
      if ($this->service != "")
      { 
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['Lookup_service']) && !in_array($this->service, $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['Lookup_service']))
          {
              $hasError = true;
              $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
              if (!isset($Campos_Erros['service']))
              {
                  $Campos_Erros['service'] = array();
              }
              $Campos_Erros['service'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
              if (!isset($this->NM_ajax_info['errList']['service']) || !is_array($this->NM_ajax_info['errList']['service']))
              {
                  $this->NM_ajax_info['errList']['service'] = array();
              }
              $this->NM_ajax_info['errList']['service'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
          }
      }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'service';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_service

    function ValidateField_jugador(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->jugador == "" && $this->nmgp_opcao != "excluir")
      { 
      } 
      if ($this->jugador === "" || is_null($this->jugador))  
      { 
          $this->jugador = 0;
          $this->sc_force_zero[] = 'jugador';
      } 
      if ($this->jugador != "")
      { 
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['Lookup_jugador']) && !in_array($this->jugador, $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['Lookup_jugador']))
          {
              $hasError = true;
              $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
              if (!isset($Campos_Erros['jugador']))
              {
                  $Campos_Erros['jugador'] = array();
              }
              $Campos_Erros['jugador'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
              if (!isset($this->NM_ajax_info['errList']['jugador']) || !is_array($this->NM_ajax_info['errList']['jugador']))
              {
                  $this->NM_ajax_info['errList']['jugador'] = array();
              }
              $this->NM_ajax_info['errList']['jugador'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
          }
      }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'jugador';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_jugador

    function ValidateField_entrada(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->entrada == "" && $this->nmgp_opcao != "excluir")
      { 
      } 
      if ($this->entrada === "" || is_null($this->entrada))  
      { 
          $this->entrada = 0;
          $this->sc_force_zero[] = 'entrada';
      } 
      if ($this->entrada != "")
      { 
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['Lookup_entrada']) && !in_array($this->entrada, $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['Lookup_entrada']))
          {
              $hasError = true;
              $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
              if (!isset($Campos_Erros['entrada']))
              {
                  $Campos_Erros['entrada'] = array();
              }
              $Campos_Erros['entrada'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
              if (!isset($this->NM_ajax_info['errList']['entrada']) || !is_array($this->NM_ajax_info['errList']['entrada']))
              {
                  $this->NM_ajax_info['errList']['entrada'] = array();
              }
              $this->NM_ajax_info['errList']['entrada'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
          }
      }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'entrada';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_entrada

    function ValidateField_visitante(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->visitante == "" && $this->nmgp_opcao != "excluir")
      { 
      } 
      if ($this->visitante === "" || is_null($this->visitante))  
      { 
          $this->visitante = 0;
          $this->sc_force_zero[] = 'visitante';
      } 
      if ($this->visitante != "")
      { 
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['Lookup_visitante']) && !in_array($this->visitante, $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['Lookup_visitante']))
          {
              $hasError = true;
              $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
              if (!isset($Campos_Erros['visitante']))
              {
                  $Campos_Erros['visitante'] = array();
              }
              $Campos_Erros['visitante'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
              if (!isset($this->NM_ajax_info['errList']['visitante']) || !is_array($this->NM_ajax_info['errList']['visitante']))
              {
                  $this->NM_ajax_info['errList']['visitante'] = array();
              }
              $this->NM_ajax_info['errList']['visitante'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
          }
      }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'visitante';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_visitante

    function ValidateField_minutos(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->minutos === "" || is_null($this->minutos))  
      { 
          $this->minutos = 0;
          $this->sc_force_zero[] = 'minutos';
      } 
      nm_limpa_numero($this->minutos, $this->field_config['minutos']['symbol_grp']) ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->minutos != '')  
          { 
              $iTestSize = 11;
              if (strlen($this->minutos) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Minutos: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['minutos']))
                  {
                      $Campos_Erros['minutos'] = array();
                  }
                  $Campos_Erros['minutos'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['minutos']) || !is_array($this->NM_ajax_info['errList']['minutos']))
                  {
                      $this->NM_ajax_info['errList']['minutos'] = array();
                  }
                  $this->NM_ajax_info['errList']['minutos'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->minutos, 11, 0, -0, 99999999999, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Minutos; " ; 
                  if (!isset($Campos_Erros['minutos']))
                  {
                      $Campos_Erros['minutos'] = array();
                  }
                  $Campos_Erros['minutos'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['minutos']) || !is_array($this->NM_ajax_info['errList']['minutos']))
                  {
                      $this->NM_ajax_info['errList']['minutos'] = array();
                  }
                  $this->NM_ajax_info['errList']['minutos'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'minutos';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_minutos

    function ValidateField_tarjeta(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->tarjeta == "" && $this->nmgp_opcao != "excluir")
      { 
      } 
      if ($this->tarjeta === "" || is_null($this->tarjeta))  
      { 
          $this->tarjeta = 0;
          $this->sc_force_zero[] = 'tarjeta';
      } 
      if ($this->tarjeta != "")
      { 
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['Lookup_tarjeta']) && !in_array($this->tarjeta, $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['Lookup_tarjeta']))
          {
              $hasError = true;
              $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
              if (!isset($Campos_Erros['tarjeta']))
              {
                  $Campos_Erros['tarjeta'] = array();
              }
              $Campos_Erros['tarjeta'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
              if (!isset($this->NM_ajax_info['errList']['tarjeta']) || !is_array($this->NM_ajax_info['errList']['tarjeta']))
              {
                  $this->NM_ajax_info['errList']['tarjeta'] = array();
              }
              $this->NM_ajax_info['errList']['tarjeta'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
          }
      }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'tarjeta';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_tarjeta

    function ValidateField_tokens(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->tokens === "" || is_null($this->tokens))  
      { 
          $this->tokens = 0;
          $this->sc_force_zero[] = 'tokens';
      } 
      nm_limpa_numero($this->tokens, $this->field_config['tokens']['symbol_grp']) ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->tokens != '')  
          { 
              $iTestSize = 11;
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
              if ($teste_validade->Valor($this->tokens, 11, 0, -0, 99999999999, "N") == false)  
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

    function ValidateField_comida(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->comida == "" && $this->nmgp_opcao != "excluir")
      { 
      } 
      if ($this->comida === "" || is_null($this->comida))  
      { 
          $this->comida = 0;
          $this->sc_force_zero[] = 'comida';
      } 
      if ($this->comida != "")
      { 
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['Lookup_comida']) && !in_array($this->comida, $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['Lookup_comida']))
          {
              $hasError = true;
              $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
              if (!isset($Campos_Erros['comida']))
              {
                  $Campos_Erros['comida'] = array();
              }
              $Campos_Erros['comida'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
              if (!isset($this->NM_ajax_info['errList']['comida']) || !is_array($this->NM_ajax_info['errList']['comida']))
              {
                  $this->NM_ajax_info['errList']['comida'] = array();
              }
              $this->NM_ajax_info['errList']['comida'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
          }
      }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'comida';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_comida

    function ValidateField_score(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->score === "" || is_null($this->score))  
      { 
          $this->score = 0;
          $this->sc_force_zero[] = 'score';
      } 
      nm_limpa_numero($this->score, $this->field_config['score']['symbol_grp']) ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->score != '')  
          { 
              $iTestSize = 11;
              if (strlen($this->score) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Score: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['score']))
                  {
                      $Campos_Erros['score'] = array();
                  }
                  $Campos_Erros['score'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['score']) || !is_array($this->NM_ajax_info['errList']['score']))
                  {
                      $this->NM_ajax_info['errList']['score'] = array();
                  }
                  $this->NM_ajax_info['errList']['score'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->score, 11, 0, -0, 99999999999, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Score; " ; 
                  if (!isset($Campos_Erros['score']))
                  {
                      $Campos_Erros['score'] = array();
                  }
                  $Campos_Erros['score'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['score']) || !is_array($this->NM_ajax_info['errList']['score']))
                  {
                      $this->NM_ajax_info['errList']['score'] = array();
                  }
                  $this->NM_ajax_info['errList']['score'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'score';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_score

    function ValidateField_combos_recetas(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (trim($this->combos_recetas) != "")  
          { 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'combos_recetas';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_combos_recetas
//
//--------------------------------------------------------------------------------------
   function upload_img_doc(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros, $filtro = '') 
   {
     global $nm_browser;
     if (!empty($Campos_Crit) || !empty($Campos_Falta))
     {
          return;
     }
      if ($this->nmgp_opcao == "incluir" && $this->image == "" &&  $this->image_limpa != "S" && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['dados_clone']['image']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['dados_clone']['image']))
      { 
          $this->image = $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['dados_clone']['image'];
      } 
      elseif ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->image == "none") 
          { 
              $this->image = ""; 
          } 
          if ($this->image != "") 
          { 
              if (!function_exists('sc_upload_unprotect_chars'))
              {
                  include_once 'form_product_snackbar_mob_doc_name.php';
              }
              $this->image = sc_upload_unprotect_chars($this->image);
              $this->image_scfile_name = sc_upload_unprotect_chars($this->image_scfile_name);
              if ($nm_browser == "Opera")  
              { 
                  $this->image_scfile_type = substr($this->image_scfile_type, 0, strpos($this->image_scfile_type, ";")) ; 
              } 
              if ($this->image_scfile_type == "image/pjpeg" || $this->image_scfile_type == "image/jpeg" || $this->image_scfile_type == "image/gif" ||  
                  $this->image_scfile_type == "image/png" || $this->image_scfile_type == "image/x-png" || $this->image_scfile_type == "image/bmp")  
              { 
                  if (!is_file($this->image) && isset($_SESSION['scriptcase']['charset']) && $_SESSION['scriptcase']['charset'] != 'UTF-8') {
                      $mbConvertFileName = mb_convert_encoding($this->image, $_SESSION['scriptcase']['charset'], 'UTF-8');
                      $mbConvertScFileName = mb_convert_encoding($this->image_scfile_name, $_SESSION['scriptcase']['charset'], 'UTF-8');
                      if (is_file($mbConvertFileName)) {
                          $this->image = $mbConvertFileName;
                          $this->image_scfile_name = $mbConvertScFileName;
                      }
                  }
                  if (is_file($this->image))  
                  { 
                      $this->NM_size_docs[$this->image_scfile_name] = $this->sc_file_size($this->image);
                      $reg_image = file_get_contents($this->image); 
                      $this->image = $reg_image; 
                  } 
                  else 
                  { 
                      $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_product_fld_image'] . " " . $this->Ini->Nm_lang['lang_errm_upld']; 
                      $this->image = "";
                      if (!isset($Campos_Erros['image']))
                      {
                          $Campos_Erros['image'] = array();
                      }
                      $Campos_Erros['image'][] = $this->Ini->Nm_lang['lang_errm_upld'];
                      if (!isset($this->NM_ajax_info['errList']['image']) || !is_array($this->NM_ajax_info['errList']['image']))
                      {
                          $this->NM_ajax_info['errList']['image'] = array();
                      }
                      $this->NM_ajax_info['errList']['image'][] = $this->Ini->Nm_lang['lang_errm_upld'];
                  } 
              } 
              else 
              { 
                  if ($nm_browser == "Konqueror")  
                  { 
                      $this->image = "" ; 
                  } 
                  else 
                  { 
                     $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_product_fld_image'] . " " . $this->Ini->Nm_lang['lang_errm_ivtp'];  
                      if (!isset($Campos_Erros['image']))
                      {
                          $Campos_Erros['image'] = array();
                      }
                      $Campos_Erros['image'][] = $this->Ini->Nm_lang['lang_errm_ivtp'];
                      if (!isset($this->NM_ajax_info['errList']['image']) || !is_array($this->NM_ajax_info['errList']['image']))
                      {
                          $this->NM_ajax_info['errList']['image'] = array();
                      }
                      $this->NM_ajax_info['errList']['image'][] = $this->Ini->Nm_lang['lang_errm_ivtp'];
                  } 
              } 
          } 
          elseif (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['dados_form']['image']) && $this->image_limpa != "S")
          {
              $this->image = $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['dados_form']['image'];
          }
      } 
   }

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
    $this->nmgp_dados_form['product_name'] = $this->product_name;
    $this->nmgp_dados_form['id_category'] = $this->id_category;
    $this->nmgp_dados_form['product_code'] = $this->product_code;
    $this->nmgp_dados_form['dateproduct'] = (strlen(trim($this->dateproduct)) > 19) ? str_replace(".", ":", $this->dateproduct) : trim($this->dateproduct);
    $this->nmgp_dados_form['product_cost'] = $this->product_cost;
    $this->nmgp_dados_form['stock'] = $this->stock;
    $this->nmgp_dados_form['poriva'] = $this->poriva;
    $this->nmgp_dados_form['product_value'] = $this->product_value;
    $this->nmgp_dados_form['discount'] = $this->discount;
    $this->nmgp_dados_form['precioventa'] = $this->precioventa;
    $this->nmgp_dados_form['puntoventa'] = $this->puntoventa;
    $this->nmgp_dados_form['kiosko'] = $this->kiosko;
    $this->nmgp_dados_form['orden'] = $this->orden;
    $this->nmgp_dados_form['id_status'] = $this->id_status;
    $this->nmgp_dados_form['cuentaventa'] = $this->cuentaventa;
    $this->nmgp_dados_form['unidad'] = $this->unidad;
    $this->nmgp_dados_form['cuentacompra'] = $this->cuentacompra;
    $this->nmgp_dados_form['tipoitem'] = $this->tipoitem;
    if (empty($this->image))
    {
        $this->image = $this->nmgp_dados_form['image'];
    }
    $this->nmgp_dados_form['image'] = $this->image;
    $this->nmgp_dados_form['image_limpa'] = $this->image_limpa;
    $this->nmgp_dados_form['service'] = $this->service;
    $this->nmgp_dados_form['jugador'] = $this->jugador;
    $this->nmgp_dados_form['entrada'] = $this->entrada;
    $this->nmgp_dados_form['visitante'] = $this->visitante;
    $this->nmgp_dados_form['minutos'] = $this->minutos;
    $this->nmgp_dados_form['tarjeta'] = $this->tarjeta;
    $this->nmgp_dados_form['tokens'] = $this->tokens;
    $this->nmgp_dados_form['comida'] = $this->comida;
    $this->nmgp_dados_form['score'] = $this->score;
    $this->nmgp_dados_form['combos_recetas'] = $this->combos_recetas;
    $this->nmgp_dados_form['id_product'] = $this->id_product;
    $this->nmgp_dados_form['arcade_clasic'] = $this->arcade_clasic;
    $this->nmgp_dados_form['ultfechaventa'] = $this->ultfechaventa;
    $this->nmgp_dados_form['ingrediente'] = $this->ingrediente;
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['dados_form'] = $this->nmgp_dados_form;
   }
   function nm_tira_formatacao()
   {
      global $nm_form_submit;
         $this->Before_unformat = array();
         $this->formatado = false;
      $this->Before_unformat['dateproduct'] = $this->dateproduct;
      $this->Before_unformat['dateproduct_hora'] = $this->dateproduct_hora;
      nm_limpa_data($this->dateproduct, $this->field_config['dateproduct']['date_sep']) ; 
      nm_limpa_hora($this->dateproduct_hora, $this->field_config['dateproduct']['time_sep']) ; 
      $this->Before_unformat['product_cost'] = $this->product_cost;
      if (!empty($this->field_config['product_cost']['symbol_dec']))
      {
         $this->sc_remove_currency($this->product_cost, $this->field_config['product_cost']['symbol_dec'], $this->field_config['product_cost']['symbol_grp'], $this->field_config['product_cost']['symbol_mon']);
         nm_limpa_valor($this->product_cost, $this->field_config['product_cost']['symbol_dec'], $this->field_config['product_cost']['symbol_grp']);
      }
      $this->Before_unformat['stock'] = $this->stock;
      if (!empty($this->field_config['stock']['symbol_dec']))
      {
         nm_limpa_valor($this->stock, $this->field_config['stock']['symbol_dec'], $this->field_config['stock']['symbol_grp']);
      }
      $this->Before_unformat['poriva'] = $this->poriva;
      if (!empty($this->field_config['poriva']['symbol_dec']))
      {
         nm_limpa_valor($this->poriva, $this->field_config['poriva']['symbol_dec'], $this->field_config['poriva']['symbol_grp']);
      }
      $this->Before_unformat['product_value'] = $this->product_value;
      if (!empty($this->field_config['product_value']['symbol_dec']))
      {
         $this->sc_remove_currency($this->product_value, $this->field_config['product_value']['symbol_dec'], $this->field_config['product_value']['symbol_grp'], $this->field_config['product_value']['symbol_mon']);
         nm_limpa_valor($this->product_value, $this->field_config['product_value']['symbol_dec'], $this->field_config['product_value']['symbol_grp']);
      }
      $this->Before_unformat['discount'] = $this->discount;
      if (!empty($this->field_config['discount']['symbol_dec']))
      {
         $this->sc_remove_currency($this->discount, $this->field_config['discount']['symbol_dec'], $this->field_config['discount']['symbol_grp'], $this->field_config['discount']['symbol_mon']);
         nm_limpa_valor($this->discount, $this->field_config['discount']['symbol_dec'], $this->field_config['discount']['symbol_grp']);
      }
      $this->Before_unformat['precioventa'] = $this->precioventa;
      if (!empty($this->field_config['precioventa']['symbol_dec']))
      {
         nm_limpa_valor($this->precioventa, $this->field_config['precioventa']['symbol_dec'], $this->field_config['precioventa']['symbol_grp']);
      }
      $this->Before_unformat['orden'] = $this->orden;
      nm_limpa_numero($this->orden, $this->field_config['orden']['symbol_grp']) ; 
      $this->Before_unformat['minutos'] = $this->minutos;
      nm_limpa_numero($this->minutos, $this->field_config['minutos']['symbol_grp']) ; 
      $this->Before_unformat['tokens'] = $this->tokens;
      nm_limpa_numero($this->tokens, $this->field_config['tokens']['symbol_grp']) ; 
      $this->Before_unformat['score'] = $this->score;
      nm_limpa_numero($this->score, $this->field_config['score']['symbol_grp']) ; 
      $this->Before_unformat['id_product'] = $this->id_product;
      nm_limpa_numero($this->id_product, $this->field_config['id_product']['symbol_grp']) ; 
      $this->Before_unformat['arcade_clasic'] = $this->arcade_clasic;
      nm_limpa_numero($this->arcade_clasic, $this->field_config['arcade_clasic']['symbol_grp']) ; 
      $this->Before_unformat['ultfechaventa'] = $this->ultfechaventa;
      $this->Before_unformat['ultfechaventa_hora'] = $this->ultfechaventa_hora;
      nm_limpa_data($this->ultfechaventa, $this->field_config['ultfechaventa']['date_sep']) ; 
      nm_limpa_hora($this->ultfechaventa_hora, $this->field_config['ultfechaventa']['time_sep']) ; 
      $this->Before_unformat['ingrediente'] = $this->ingrediente;
      nm_limpa_numero($this->ingrediente, $this->field_config['ingrediente']['symbol_grp']) ; 
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
      if ($Nome_Campo == "product_cost")
      {
          if (!empty($this->field_config['product_cost']['symbol_dec']))
          {
             $this->sc_remove_currency($this->product_cost, $this->field_config['product_cost']['symbol_dec'], $this->field_config['product_cost']['symbol_grp'], $this->field_config['product_cost']['symbol_mon']);
             nm_limpa_valor($this->product_cost, $this->field_config['product_cost']['symbol_dec'], $this->field_config['product_cost']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "stock")
      {
          if (!empty($this->field_config['stock']['symbol_dec']))
          {
             nm_limpa_valor($this->stock, $this->field_config['stock']['symbol_dec'], $this->field_config['stock']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "poriva")
      {
          if (!empty($this->field_config['poriva']['symbol_dec']))
          {
             nm_limpa_valor($this->poriva, $this->field_config['poriva']['symbol_dec'], $this->field_config['poriva']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "product_value")
      {
          if (!empty($this->field_config['product_value']['symbol_dec']))
          {
             $this->sc_remove_currency($this->product_value, $this->field_config['product_value']['symbol_dec'], $this->field_config['product_value']['symbol_grp'], $this->field_config['product_value']['symbol_mon']);
             nm_limpa_valor($this->product_value, $this->field_config['product_value']['symbol_dec'], $this->field_config['product_value']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "discount")
      {
          if (!empty($this->field_config['discount']['symbol_dec']))
          {
             $this->sc_remove_currency($this->discount, $this->field_config['discount']['symbol_dec'], $this->field_config['discount']['symbol_grp'], $this->field_config['discount']['symbol_mon']);
             nm_limpa_valor($this->discount, $this->field_config['discount']['symbol_dec'], $this->field_config['discount']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "precioventa")
      {
          if (!empty($this->field_config['precioventa']['symbol_dec']))
          {
             nm_limpa_valor($this->precioventa, $this->field_config['precioventa']['symbol_dec'], $this->field_config['precioventa']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "orden")
      {
          nm_limpa_numero($this->orden, $this->field_config['orden']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "minutos")
      {
          nm_limpa_numero($this->minutos, $this->field_config['minutos']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "tokens")
      {
          nm_limpa_numero($this->tokens, $this->field_config['tokens']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "score")
      {
          nm_limpa_numero($this->score, $this->field_config['score']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "id_product")
      {
          nm_limpa_numero($this->id_product, $this->field_config['id_product']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "arcade_clasic")
      {
          nm_limpa_numero($this->arcade_clasic, $this->field_config['arcade_clasic']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "ingrediente")
      {
          nm_limpa_numero($this->ingrediente, $this->field_config['ingrediente']['symbol_grp']) ; 
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
      if ((!empty($this->dateproduct) && 'null' != $this->dateproduct) || (!empty($format_fields) && isset($format_fields['dateproduct'])))
      {
          $nm_separa_data = strpos($this->field_config['dateproduct']['date_format'], ";") ;
          $guarda_format_hora = $this->field_config['dateproduct']['date_format'];
          $this->field_config['dateproduct']['date_format'] = substr($this->field_config['dateproduct']['date_format'], 0, $nm_separa_data) ;
          $separador = strpos($this->dateproduct, " ") ; 
          $this->dateproduct_hora = substr($this->dateproduct, $separador + 1) ; 
          $this->dateproduct = substr($this->dateproduct, 0, $separador) ; 
          nm_volta_data($this->dateproduct, $this->field_config['dateproduct']['date_format']) ; 
          nmgp_Form_Datas($this->dateproduct, $this->field_config['dateproduct']['date_format'], $this->field_config['dateproduct']['date_sep']) ;  
          $this->field_config['dateproduct']['date_format'] = substr($guarda_format_hora, $nm_separa_data + 1) ;
          nm_volta_hora($this->dateproduct_hora, $this->field_config['dateproduct']['date_format']) ; 
          nmgp_Form_Hora($this->dateproduct_hora, $this->field_config['dateproduct']['date_format'], $this->field_config['dateproduct']['time_sep']) ;  
          $this->field_config['dateproduct']['date_format'] = $guarda_format_hora ;
      }
      elseif ('null' == $this->dateproduct || '' == $this->dateproduct)
      {
          $this->dateproduct_hora = '';
          $this->dateproduct = '';
      }
      if ('' !== $this->product_cost || (!empty($format_fields) && isset($format_fields['product_cost'])))
      {
          nmgp_Form_Num_Val($this->product_cost, $this->field_config['product_cost']['symbol_grp'], $this->field_config['product_cost']['symbol_dec'], "2", "S", $this->field_config['product_cost']['format_neg'], "", "", "-", $this->field_config['product_cost']['symbol_fmt']) ; 
      }
      if ('' !== $this->stock || (!empty($format_fields) && isset($format_fields['stock'])))
      {
          nmgp_Form_Num_Val($this->stock, $this->field_config['stock']['symbol_grp'], $this->field_config['stock']['symbol_dec'], "2", "S", $this->field_config['stock']['format_neg'], "", "", "-", $this->field_config['stock']['symbol_fmt']) ; 
      }
      if ('' !== $this->poriva || (!empty($format_fields) && isset($format_fields['poriva'])))
      {
          nmgp_Form_Num_Val($this->poriva, $this->field_config['poriva']['symbol_grp'], $this->field_config['poriva']['symbol_dec'], "2", "S", $this->field_config['poriva']['format_neg'], "", "", "-", $this->field_config['poriva']['symbol_fmt']) ; 
      }
      if ('' !== $this->product_value || (!empty($format_fields) && isset($format_fields['product_value'])))
      {
          nmgp_Form_Num_Val($this->product_value, $this->field_config['product_value']['symbol_grp'], $this->field_config['product_value']['symbol_dec'], "2", "S", $this->field_config['product_value']['format_neg'], "", "", "-", $this->field_config['product_value']['symbol_fmt']) ; 
      }
      if ('' !== $this->discount || (!empty($format_fields) && isset($format_fields['discount'])))
      {
          nmgp_Form_Num_Val($this->discount, $this->field_config['discount']['symbol_grp'], $this->field_config['discount']['symbol_dec'], "2", "S", $this->field_config['discount']['format_neg'], "", "", "-", $this->field_config['discount']['symbol_fmt']) ; 
      }
      if ('' !== $this->precioventa || (!empty($format_fields) && isset($format_fields['precioventa'])))
      {
          nmgp_Form_Num_Val($this->precioventa, $this->field_config['precioventa']['symbol_grp'], $this->field_config['precioventa']['symbol_dec'], "9", "S", $this->field_config['precioventa']['format_neg'], "", "", "-", $this->field_config['precioventa']['symbol_fmt']) ; 
      }
      if ('' !== $this->orden || (!empty($format_fields) && isset($format_fields['orden'])))
      {
          nmgp_Form_Num_Val($this->orden, $this->field_config['orden']['symbol_grp'], $this->field_config['orden']['symbol_dec'], "0", "S", $this->field_config['orden']['format_neg'], "", "", "-", $this->field_config['orden']['symbol_fmt']) ; 
      }
      if ('' !== $this->minutos || (!empty($format_fields) && isset($format_fields['minutos'])))
      {
          nmgp_Form_Num_Val($this->minutos, $this->field_config['minutos']['symbol_grp'], $this->field_config['minutos']['symbol_dec'], "0", "S", $this->field_config['minutos']['format_neg'], "", "", "-", $this->field_config['minutos']['symbol_fmt']) ; 
      }
      if ('' !== $this->tokens || (!empty($format_fields) && isset($format_fields['tokens'])))
      {
          nmgp_Form_Num_Val($this->tokens, $this->field_config['tokens']['symbol_grp'], $this->field_config['tokens']['symbol_dec'], "0", "S", $this->field_config['tokens']['format_neg'], "", "", "-", $this->field_config['tokens']['symbol_fmt']) ; 
      }
      if ('' !== $this->score || (!empty($format_fields) && isset($format_fields['score'])))
      {
          nmgp_Form_Num_Val($this->score, $this->field_config['score']['symbol_grp'], $this->field_config['score']['symbol_dec'], "0", "S", $this->field_config['score']['format_neg'], "", "", "-", $this->field_config['score']['symbol_fmt']) ; 
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
      $guarda_format_hora = $this->field_config['dateproduct']['date_format'];
      if ($this->dateproduct != "")  
      { 
          $nm_separa_data = strpos($this->field_config['dateproduct']['date_format'], ";") ;
          $this->field_config['dateproduct']['date_format'] = substr($this->field_config['dateproduct']['date_format'], 0, $nm_separa_data) ;
          nm_conv_data($this->dateproduct, $this->field_config['dateproduct']['date_format']) ; 
          if ('pdo_sqlsrv' == strtolower($this->Ini->nm_tpbanco) || 'pdo_dblib' == strtolower($this->Ini->nm_tpbanco))
          {
              $this->dateproduct = str_replace('-', '', $this->dateproduct);
          }
          $this->field_config['dateproduct']['date_format'] = substr($guarda_format_hora, $nm_separa_data + 1) ;
          nm_conv_hora($this->dateproduct_hora, $this->field_config['dateproduct']['date_format']) ; 
          if ($this->dateproduct_hora == "" )  
          { 
              $this->dateproduct_hora = "00:00:00:000" ; 
          }
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
          {
              $this->dateproduct_hora = substr($this->dateproduct_hora, 0, -4) . "." . substr($this->dateproduct_hora, -3);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
          {
              $this->dateproduct_hora = substr($this->dateproduct_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->dateproduct_hora = substr($this->dateproduct_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $this->dateproduct_hora = substr($this->dateproduct_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $this->dateproduct_hora = substr($this->dateproduct_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
          {
              $this->dateproduct_hora = substr($this->dateproduct_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          {
              $this->dateproduct_hora = substr($this->dateproduct_hora, 0, -4);
          }
          if ($this->dateproduct != "")  
          { 
              $this->dateproduct .= " " . $this->dateproduct_hora ; 
          }
      } 
      if ($this->dateproduct == "" && $use_null)  
      { 
          $this->dateproduct = "null" ; 
      } 
      $this->field_config['dateproduct']['date_format'] = $guarda_format_hora;
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
          $this->ajax_return_values_product_name();
          $this->ajax_return_values_id_category();
          $this->ajax_return_values_product_code();
          $this->ajax_return_values_dateproduct();
          $this->ajax_return_values_product_cost();
          $this->ajax_return_values_stock();
          $this->ajax_return_values_poriva();
          $this->ajax_return_values_product_value();
          $this->ajax_return_values_discount();
          $this->ajax_return_values_precioventa();
          $this->ajax_return_values_puntoventa();
          $this->ajax_return_values_kiosko();
          $this->ajax_return_values_orden();
          $this->ajax_return_values_id_status();
          $this->ajax_return_values_cuentaventa();
          $this->ajax_return_values_unidad();
          $this->ajax_return_values_cuentacompra();
          $this->ajax_return_values_tipoitem();
          $this->ajax_return_values_image();
          $this->ajax_return_values_service();
          $this->ajax_return_values_jugador();
          $this->ajax_return_values_entrada();
          $this->ajax_return_values_visitante();
          $this->ajax_return_values_minutos();
          $this->ajax_return_values_tarjeta();
          $this->ajax_return_values_tokens();
          $this->ajax_return_values_comida();
          $this->ajax_return_values_score();
          $this->ajax_return_values_combos_recetas();
          $this->ajax_return_values_id_product();
          if ('navigate_form' == $this->NM_ajax_opcao)
          {
              $this->NM_ajax_info['clearUpload']      = 'S';
              $this->NM_ajax_info['navStatus']['ret'] = $this->Nav_permite_ret ? 'S' : 'N';
              $this->NM_ajax_info['navStatus']['ava'] = $this->Nav_permite_ava ? 'S' : 'N';
              $this->NM_ajax_info['fldList']['id_product']['keyVal'] = form_product_snackbar_mob_pack_protect_string($this->nmgp_dados_form['id_product']);
              $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['form_product_combo_mob_script_case_init'] ]['form_product_combo_mob']['foreign_key']['idproducto'] = $this->nmgp_dados_form['id_product'];
              $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['form_product_combo_mob_script_case_init'] ]['form_product_combo_mob']['where_filter'] = "idproducto = " . $this->nmgp_dados_form['id_product'] . "";
              $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['form_product_combo_mob_script_case_init'] ]['form_product_combo_mob']['where_detal']  = "idproducto = " . $this->nmgp_dados_form['id_product'] . "";
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['total'] < 0)
              {
                  $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['form_product_combo_mob_script_case_init'] ]['form_product_combo_mob']['where_filter'] = "1 <> 1";
              }
              $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['form_product_combo_mob_script_case_init'] ]['form_product_combo_mob']['reg_start'] = "";
              unset($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['form_product_combo_mob_script_case_init'] ]['form_product_combo_mob']['total']);
              foreach ($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['form_product_combo_mob_script_case_init'] ]['form_product_combo_mob'] as $i => $v)
              {
                  $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['form_product_combo_mob_script_case_init'] ]['form_product_combo'][$i] = $v;
              }
              if (isset($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['form_product_combo_mob_script_case_init'] ]['form_product_combo_mob']['total']))
              {
                  unset($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['form_product_combo_mob_script_case_init'] ]['form_product_combo_mob']['total']);
              }
          }
   } // ajax_return_values

          //----- product_name
   function ajax_return_values_product_name($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("product_name", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->product_name);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['product_name'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- id_category
   function ajax_return_values_id_category($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("id_category", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->id_category);
              $aLookup = array();
              $this->_tmp_lookup_id_category = $this->id_category;

 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['Lookup_id_category']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['Lookup_id_category'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['Lookup_id_category']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['Lookup_id_category'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_dateproduct = $this->dateproduct;
   $old_value_dateproduct_hora = $this->dateproduct_hora;
   $old_value_product_cost = $this->product_cost;
   $old_value_stock = $this->stock;
   $old_value_poriva = $this->poriva;
   $old_value_product_value = $this->product_value;
   $old_value_discount = $this->discount;
   $old_value_precioventa = $this->precioventa;
   $old_value_orden = $this->orden;
   $old_value_minutos = $this->minutos;
   $old_value_tokens = $this->tokens;
   $old_value_score = $this->score;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_dateproduct = $this->dateproduct;
   $unformatted_value_dateproduct_hora = $this->dateproduct_hora;
   $unformatted_value_product_cost = $this->product_cost;
   $unformatted_value_stock = $this->stock;
   $unformatted_value_poriva = $this->poriva;
   $unformatted_value_product_value = $this->product_value;
   $unformatted_value_discount = $this->discount;
   $unformatted_value_precioventa = $this->precioventa;
   $unformatted_value_orden = $this->orden;
   $unformatted_value_minutos = $this->minutos;
   $unformatted_value_tokens = $this->tokens;
   $unformatted_value_score = $this->score;

   $nm_comando = "SELECT id_category, category  FROM category where id_category=2  ORDER BY category";

   $this->dateproduct = $old_value_dateproduct;
   $this->dateproduct_hora = $old_value_dateproduct_hora;
   $this->product_cost = $old_value_product_cost;
   $this->stock = $old_value_stock;
   $this->poriva = $old_value_poriva;
   $this->product_value = $old_value_product_value;
   $this->discount = $old_value_discount;
   $this->precioventa = $old_value_precioventa;
   $this->orden = $old_value_orden;
   $this->minutos = $old_value_minutos;
   $this->tokens = $old_value_tokens;
   $this->score = $old_value_score;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $aLookup[] = array(form_product_snackbar_mob_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', form_product_snackbar_mob_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['Lookup_id_category'][] = $rs->fields[0];
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
          $sSelComp = "name=\"id_category\"";
          if (isset($this->NM_ajax_info['select_html']['id_category']) && !empty($this->NM_ajax_info['select_html']['id_category']))
          {
              $sSelComp = str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['id_category']);
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

                  if ($this->id_category == $sValue)
                  {
                      $this->_tmp_lookup_id_category = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['id_category'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
               'optList' => $aLookup,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['id_category']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['id_category']['valList'][$i] = form_product_snackbar_mob_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['id_category']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['id_category']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['id_category']['labList'] = $aLabel;
          }
   }

          //----- product_code
   function ajax_return_values_product_code($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("product_code", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->product_code);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['product_code'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- dateproduct
   function ajax_return_values_dateproduct($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("dateproduct", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->dateproduct);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['dateproduct'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($this->dateproduct . ' ' . $this->dateproduct_hora),
              );
          }
   }

          //----- product_cost
   function ajax_return_values_product_cost($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("product_cost", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->product_cost);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['product_cost'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- stock
   function ajax_return_values_stock($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("stock", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->stock);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['stock'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- poriva
   function ajax_return_values_poriva($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("poriva", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->poriva);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['poriva'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- product_value
   function ajax_return_values_product_value($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("product_value", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->product_value);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['product_value'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- discount
   function ajax_return_values_discount($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("discount", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->discount);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['discount'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- precioventa
   function ajax_return_values_precioventa($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("precioventa", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->precioventa);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['precioventa'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- puntoventa
   function ajax_return_values_puntoventa($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("puntoventa", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->puntoventa);
              $aLookup = array();
              $this->_tmp_lookup_puntoventa = $this->puntoventa;

$aLookup[] = array(form_product_snackbar_mob_pack_protect_string('1') => str_replace('<', '&lt;',form_product_snackbar_mob_pack_protect_string("SI")));
$aLookup[] = array(form_product_snackbar_mob_pack_protect_string('0') => str_replace('<', '&lt;',form_product_snackbar_mob_pack_protect_string("NO")));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['Lookup_puntoventa'][] = '1';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['Lookup_puntoventa'][] = '0';
          $aLookupOrig = $aLookup;
          $sOptComp = "";
          if (isset($this->NM_ajax_info['select_html']['puntoventa']) && !empty($this->NM_ajax_info['select_html']['puntoventa']))
          {
              $sOptComp = str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['puntoventa']);
          }
          $this->NM_ajax_info['fldList']['puntoventa'] = array(
                       'row'    => '',
               'type'    => 'radio',
               'switch'  => false,
               'valList' => array($sTmpValue),
               'colNum'  => 1,
               'optComp'  => $sOptComp,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['puntoventa']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['puntoventa']['valList'][$i] = form_product_snackbar_mob_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['puntoventa']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['puntoventa']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['puntoventa']['labList'] = $aLabel;
          }
   }

          //----- kiosko
   function ajax_return_values_kiosko($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("kiosko", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->kiosko);
              $aLookup = array();
              $this->_tmp_lookup_kiosko = $this->kiosko;

$aLookup[] = array(form_product_snackbar_mob_pack_protect_string('1') => str_replace('<', '&lt;',form_product_snackbar_mob_pack_protect_string("SI")));
$aLookup[] = array(form_product_snackbar_mob_pack_protect_string('0') => str_replace('<', '&lt;',form_product_snackbar_mob_pack_protect_string("NO")));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['Lookup_kiosko'][] = '1';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['Lookup_kiosko'][] = '0';
          $aLookupOrig = $aLookup;
          $sOptComp = "";
          if (isset($this->NM_ajax_info['select_html']['kiosko']) && !empty($this->NM_ajax_info['select_html']['kiosko']))
          {
              $sOptComp = str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['kiosko']);
          }
          $this->NM_ajax_info['fldList']['kiosko'] = array(
                       'row'    => '',
               'type'    => 'radio',
               'switch'  => false,
               'valList' => array($sTmpValue),
               'colNum'  => 1,
               'optComp'  => $sOptComp,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['kiosko']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['kiosko']['valList'][$i] = form_product_snackbar_mob_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['kiosko']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['kiosko']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['kiosko']['labList'] = $aLabel;
          }
   }

          //----- orden
   function ajax_return_values_orden($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("orden", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->orden);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['orden'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- id_status
   function ajax_return_values_id_status($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("id_status", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->id_status);
              $aLookup = array();
              $this->_tmp_lookup_id_status = $this->id_status;

 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['Lookup_id_status']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['Lookup_id_status'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['Lookup_id_status']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['Lookup_id_status'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_dateproduct = $this->dateproduct;
   $old_value_dateproduct_hora = $this->dateproduct_hora;
   $old_value_product_cost = $this->product_cost;
   $old_value_stock = $this->stock;
   $old_value_poriva = $this->poriva;
   $old_value_product_value = $this->product_value;
   $old_value_discount = $this->discount;
   $old_value_precioventa = $this->precioventa;
   $old_value_orden = $this->orden;
   $old_value_minutos = $this->minutos;
   $old_value_tokens = $this->tokens;
   $old_value_score = $this->score;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_dateproduct = $this->dateproduct;
   $unformatted_value_dateproduct_hora = $this->dateproduct_hora;
   $unformatted_value_product_cost = $this->product_cost;
   $unformatted_value_stock = $this->stock;
   $unformatted_value_poriva = $this->poriva;
   $unformatted_value_product_value = $this->product_value;
   $unformatted_value_discount = $this->discount;
   $unformatted_value_precioventa = $this->precioventa;
   $unformatted_value_orden = $this->orden;
   $unformatted_value_minutos = $this->minutos;
   $unformatted_value_tokens = $this->tokens;
   $unformatted_value_score = $this->score;

   $nm_comando = "SELECT id_status, status  FROM status  ORDER BY status";

   $this->dateproduct = $old_value_dateproduct;
   $this->dateproduct_hora = $old_value_dateproduct_hora;
   $this->product_cost = $old_value_product_cost;
   $this->stock = $old_value_stock;
   $this->poriva = $old_value_poriva;
   $this->product_value = $old_value_product_value;
   $this->discount = $old_value_discount;
   $this->precioventa = $old_value_precioventa;
   $this->orden = $old_value_orden;
   $this->minutos = $old_value_minutos;
   $this->tokens = $old_value_tokens;
   $this->score = $old_value_score;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $aLookup[] = array(form_product_snackbar_mob_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', form_product_snackbar_mob_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['Lookup_id_status'][] = $rs->fields[0];
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
          $sSelComp = "name=\"id_status\"";
          if (isset($this->NM_ajax_info['select_html']['id_status']) && !empty($this->NM_ajax_info['select_html']['id_status']))
          {
              $sSelComp = str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['id_status']);
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

                  if ($this->id_status == $sValue)
                  {
                      $this->_tmp_lookup_id_status = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['id_status'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
               'optList' => $aLookup,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['id_status']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['id_status']['valList'][$i] = form_product_snackbar_mob_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['id_status']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['id_status']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['id_status']['labList'] = $aLabel;
          }
   }

          //----- cuentaventa
   function ajax_return_values_cuentaventa($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("cuentaventa", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->cuentaventa);
              $aLookup = array();
              $this->_tmp_lookup_cuentaventa = $this->cuentaventa;

 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['Lookup_cuentaventa']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['Lookup_cuentaventa'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['Lookup_cuentaventa']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['Lookup_cuentaventa'] = array(); 
}
$aLookup[] = array(form_product_snackbar_mob_pack_protect_string('') => str_replace('<', '&lt;',form_product_snackbar_mob_pack_protect_string(' ')));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['Lookup_cuentaventa'][] = '';
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_dateproduct = $this->dateproduct;
   $old_value_dateproduct_hora = $this->dateproduct_hora;
   $old_value_product_cost = $this->product_cost;
   $old_value_stock = $this->stock;
   $old_value_poriva = $this->poriva;
   $old_value_product_value = $this->product_value;
   $old_value_discount = $this->discount;
   $old_value_precioventa = $this->precioventa;
   $old_value_orden = $this->orden;
   $old_value_minutos = $this->minutos;
   $old_value_tokens = $this->tokens;
   $old_value_score = $this->score;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_dateproduct = $this->dateproduct;
   $unformatted_value_dateproduct_hora = $this->dateproduct_hora;
   $unformatted_value_product_cost = $this->product_cost;
   $unformatted_value_stock = $this->stock;
   $unformatted_value_poriva = $this->poriva;
   $unformatted_value_product_value = $this->product_value;
   $unformatted_value_discount = $this->discount;
   $unformatted_value_precioventa = $this->precioventa;
   $unformatted_value_orden = $this->orden;
   $unformatted_value_minutos = $this->minutos;
   $unformatted_value_tokens = $this->tokens;
   $unformatted_value_score = $this->score;

   $nm_comando = "SELECT codigo, descrip  FROM product_categoria  ORDER BY codigo";

   $this->dateproduct = $old_value_dateproduct;
   $this->dateproduct_hora = $old_value_dateproduct_hora;
   $this->product_cost = $old_value_product_cost;
   $this->stock = $old_value_stock;
   $this->poriva = $old_value_poriva;
   $this->product_value = $old_value_product_value;
   $this->discount = $old_value_discount;
   $this->precioventa = $old_value_precioventa;
   $this->orden = $old_value_orden;
   $this->minutos = $old_value_minutos;
   $this->tokens = $old_value_tokens;
   $this->score = $old_value_score;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $aLookup[] = array(form_product_snackbar_mob_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', form_product_snackbar_mob_pack_protect_string(NM_charset_to_utf8($rs->fields[0] . " - " . $rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[0] . " - " . $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['Lookup_cuentaventa'][] = $rs->fields[0];
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
          $sSelComp = "name=\"cuentaventa\"";
          if (isset($this->NM_ajax_info['select_html']['cuentaventa']) && !empty($this->NM_ajax_info['select_html']['cuentaventa']))
          {
              $sSelComp = str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['cuentaventa']);
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

                  if ($this->cuentaventa == $sValue)
                  {
                      $this->_tmp_lookup_cuentaventa = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['cuentaventa'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
               'optList' => $aLookup,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['cuentaventa']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['cuentaventa']['valList'][$i] = form_product_snackbar_mob_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['cuentaventa']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['cuentaventa']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['cuentaventa']['labList'] = $aLabel;
          }
   }

          //----- unidad
   function ajax_return_values_unidad($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("unidad", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->unidad);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['unidad'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- cuentacompra
   function ajax_return_values_cuentacompra($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("cuentacompra", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->cuentacompra);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['cuentacompra'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- tipoitem
   function ajax_return_values_tipoitem($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("tipoitem", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->tipoitem);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['tipoitem'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- image
   function ajax_return_values_image($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("image", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->image);
              $aLookup = array();
   $out_image = '';
   $out1_image = '';
   if ('' != $this->image_ul_name && @is_file($this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->image_ul_name))
   {
       $this->image = @file_get_contents($this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->image_ul_name);
   }
   if ($this->image != "" && $this->image != "none")   
   { 
       $out_image = $this->Ini->path_imag_temp . "/sc_image_" . $_SESSION['scriptcase']['sc_num_img'] . session_id() . ".gif" ;  
       $out1_image = $out_image; 
       $arq_image = fopen($this->Ini->root . $out_image, "w") ;  
       if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access)) 
       { 
           $nm_tmp = nm_conv_img_access(substr($this->image, 0, 12));
           if (substr($this->image, 0, 4) != "*nm*" && substr($nm_tmp, 0, 4) == "*nm*") 
           { 
               $this->image = nm_conv_img_access($this->image);
           } 
       } 
       if (substr($this->image, 0, 4) == "*nm*") 
       { 
           $this->image = substr($this->image, 4) ; 
           $this->image = base64_decode($this->image) ; 
       } 
       $img_pos_bm = strpos($this->image, "BM") ; 
       if (!$img_pos_bm === FALSE && $img_pos_bm == 78) 
       { 
           $this->image = substr($this->image, $img_pos_bm) ; 
       } 
       fwrite($arq_image, $this->image) ;  
       fclose($arq_image) ;  
       $sc_obj_img = new nm_trata_img($this->Ini->root . $out_image, true);
       $this->nmgp_return_img['image'][0] = $sc_obj_img->getHeight();
       $this->nmgp_return_img['image'][1] = $sc_obj_img->getWidth();
       $_SESSION['scriptcase']['sc_num_img']++ ; 
       $out_image = $this->Ini->path_imag_temp . "/sc_" . "image_" . $_SESSION['scriptcase']['sc_num_img'] . session_id() . ".gif" ; 
       $_SESSION['scriptcase']['sc_num_img']++ ; 
       if (!$this->Ini->Gd_missing)
       { 
           $sc_obj_img = new nm_trata_img($this->Ini->root . $out1_image, true);
           $sc_obj_img->setWidth(200);
           $sc_obj_img->setHeight(200);
           $sc_obj_img->setManterAspecto(true);
           $sc_obj_img->createImg($this->Ini->root . $out_image);
       } 
       else 
       { 
           $out_image = $out1_image;
       } 
       $_SESSION['scriptcase']['sc_num_img']++ ; 
   } 
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['image'] = array(
                       'row'    => '',
               'type'    => 'imagem',
               'valList' => array($this->Ini->Nm_lang['lang_othr_show_imgg']),
               'imgFile' => $out_image,
               'imgOrig' => $out1_image,
               'keepImg' => $sKeepImage,
              );
          }
   }

          //----- service
   function ajax_return_values_service($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("service", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->service);
              $aLookup = array();
              $this->_tmp_lookup_service = $this->service;

$aLookup[] = array(form_product_snackbar_mob_pack_protect_string('1') => str_replace('<', '&lt;',form_product_snackbar_mob_pack_protect_string("SI")));
$aLookup[] = array(form_product_snackbar_mob_pack_protect_string('0') => str_replace('<', '&lt;',form_product_snackbar_mob_pack_protect_string("NO")));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['Lookup_service'][] = '1';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['Lookup_service'][] = '0';
          $aLookupOrig = $aLookup;
          $sOptComp = "";
          if (isset($this->NM_ajax_info['select_html']['service']) && !empty($this->NM_ajax_info['select_html']['service']))
          {
              $sOptComp = str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['service']);
          }
          $this->NM_ajax_info['fldList']['service'] = array(
                       'row'    => '',
               'type'    => 'radio',
               'switch'  => false,
               'valList' => array($sTmpValue),
               'colNum'  => 1,
               'optComp'  => $sOptComp,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['service']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['service']['valList'][$i] = form_product_snackbar_mob_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['service']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['service']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['service']['labList'] = $aLabel;
          }
   }

          //----- jugador
   function ajax_return_values_jugador($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("jugador", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->jugador);
              $aLookup = array();
              $this->_tmp_lookup_jugador = $this->jugador;

$aLookup[] = array(form_product_snackbar_mob_pack_protect_string('1') => str_replace('<', '&lt;',form_product_snackbar_mob_pack_protect_string("SI")));
$aLookup[] = array(form_product_snackbar_mob_pack_protect_string('0') => str_replace('<', '&lt;',form_product_snackbar_mob_pack_protect_string("NO")));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['Lookup_jugador'][] = '1';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['Lookup_jugador'][] = '0';
          $aLookupOrig = $aLookup;
          $sOptComp = "";
          if (isset($this->NM_ajax_info['select_html']['jugador']) && !empty($this->NM_ajax_info['select_html']['jugador']))
          {
              $sOptComp = str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['jugador']);
          }
          $this->NM_ajax_info['fldList']['jugador'] = array(
                       'row'    => '',
               'type'    => 'radio',
               'switch'  => false,
               'valList' => array($sTmpValue),
               'colNum'  => 1,
               'optComp'  => $sOptComp,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['jugador']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['jugador']['valList'][$i] = form_product_snackbar_mob_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['jugador']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['jugador']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['jugador']['labList'] = $aLabel;
          }
   }

          //----- entrada
   function ajax_return_values_entrada($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("entrada", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->entrada);
              $aLookup = array();
              $this->_tmp_lookup_entrada = $this->entrada;

$aLookup[] = array(form_product_snackbar_mob_pack_protect_string('1') => str_replace('<', '&lt;',form_product_snackbar_mob_pack_protect_string("SI")));
$aLookup[] = array(form_product_snackbar_mob_pack_protect_string('0') => str_replace('<', '&lt;',form_product_snackbar_mob_pack_protect_string("NO")));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['Lookup_entrada'][] = '1';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['Lookup_entrada'][] = '0';
          $aLookupOrig = $aLookup;
          $sOptComp = "";
          if (isset($this->NM_ajax_info['select_html']['entrada']) && !empty($this->NM_ajax_info['select_html']['entrada']))
          {
              $sOptComp = str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['entrada']);
          }
          $this->NM_ajax_info['fldList']['entrada'] = array(
                       'row'    => '',
               'type'    => 'radio',
               'switch'  => false,
               'valList' => array($sTmpValue),
               'colNum'  => 1,
               'optComp'  => $sOptComp,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['entrada']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['entrada']['valList'][$i] = form_product_snackbar_mob_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['entrada']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['entrada']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['entrada']['labList'] = $aLabel;
          }
   }

          //----- visitante
   function ajax_return_values_visitante($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("visitante", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->visitante);
              $aLookup = array();
              $this->_tmp_lookup_visitante = $this->visitante;

$aLookup[] = array(form_product_snackbar_mob_pack_protect_string('1') => str_replace('<', '&lt;',form_product_snackbar_mob_pack_protect_string("SI")));
$aLookup[] = array(form_product_snackbar_mob_pack_protect_string('0') => str_replace('<', '&lt;',form_product_snackbar_mob_pack_protect_string("NO")));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['Lookup_visitante'][] = '1';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['Lookup_visitante'][] = '0';
          $aLookupOrig = $aLookup;
          $sOptComp = "";
          if (isset($this->NM_ajax_info['select_html']['visitante']) && !empty($this->NM_ajax_info['select_html']['visitante']))
          {
              $sOptComp = str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['visitante']);
          }
          $this->NM_ajax_info['fldList']['visitante'] = array(
                       'row'    => '',
               'type'    => 'radio',
               'switch'  => false,
               'valList' => array($sTmpValue),
               'colNum'  => 1,
               'optComp'  => $sOptComp,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['visitante']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['visitante']['valList'][$i] = form_product_snackbar_mob_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['visitante']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['visitante']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['visitante']['labList'] = $aLabel;
          }
   }

          //----- minutos
   function ajax_return_values_minutos($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("minutos", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->minutos);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['minutos'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- tarjeta
   function ajax_return_values_tarjeta($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("tarjeta", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->tarjeta);
              $aLookup = array();
              $this->_tmp_lookup_tarjeta = $this->tarjeta;

$aLookup[] = array(form_product_snackbar_mob_pack_protect_string('1') => str_replace('<', '&lt;',form_product_snackbar_mob_pack_protect_string("SI")));
$aLookup[] = array(form_product_snackbar_mob_pack_protect_string('0') => str_replace('<', '&lt;',form_product_snackbar_mob_pack_protect_string("NO")));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['Lookup_tarjeta'][] = '1';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['Lookup_tarjeta'][] = '0';
          $aLookupOrig = $aLookup;
          $sOptComp = "";
          if (isset($this->NM_ajax_info['select_html']['tarjeta']) && !empty($this->NM_ajax_info['select_html']['tarjeta']))
          {
              $sOptComp = str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['tarjeta']);
          }
          $this->NM_ajax_info['fldList']['tarjeta'] = array(
                       'row'    => '',
               'type'    => 'radio',
               'switch'  => false,
               'valList' => array($sTmpValue),
               'colNum'  => 1,
               'optComp'  => $sOptComp,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['tarjeta']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['tarjeta']['valList'][$i] = form_product_snackbar_mob_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['tarjeta']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['tarjeta']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['tarjeta']['labList'] = $aLabel;
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

          //----- comida
   function ajax_return_values_comida($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("comida", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->comida);
              $aLookup = array();
              $this->_tmp_lookup_comida = $this->comida;

$aLookup[] = array(form_product_snackbar_mob_pack_protect_string('1') => str_replace('<', '&lt;',form_product_snackbar_mob_pack_protect_string("SI")));
$aLookup[] = array(form_product_snackbar_mob_pack_protect_string('0') => str_replace('<', '&lt;',form_product_snackbar_mob_pack_protect_string("NO")));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['Lookup_comida'][] = '1';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['Lookup_comida'][] = '0';
          $aLookupOrig = $aLookup;
          $sOptComp = "";
          if (isset($this->NM_ajax_info['select_html']['comida']) && !empty($this->NM_ajax_info['select_html']['comida']))
          {
              $sOptComp = str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['comida']);
          }
          $this->NM_ajax_info['fldList']['comida'] = array(
                       'row'    => '',
               'type'    => 'radio',
               'switch'  => false,
               'valList' => array($sTmpValue),
               'colNum'  => 1,
               'optComp'  => $sOptComp,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['comida']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['comida']['valList'][$i] = form_product_snackbar_mob_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['comida']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['comida']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['comida']['labList'] = $aLabel;
          }
   }

          //----- score
   function ajax_return_values_score($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("score", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->score);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['score'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- combos_recetas
   function ajax_return_values_combos_recetas($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("combos_recetas", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->combos_recetas);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['combos_recetas'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- id_product
   function ajax_return_values_id_product($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("id_product", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->id_product);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['id_product'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($sTmpValue),
               'labList' => array($this->form_format_readonly("id_product", $this->form_encode_input($sTmpValue))),
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
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['upload_dir'][$fieldName]))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['upload_dir'][$fieldName] = array();
            $resDir = @opendir($uploadDir);
            if (!$resDir)
            {
                return $originalName;
            }
            while (false !== ($fileName = @readdir($resDir)))
            {
                if (@is_file($uploadDir . $fileName))
                {
                    $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['upload_dir'][$fieldName][] = $fileName;
                }
            }
            @closedir($resDir);
        }
        if (!in_array($originalName, $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['upload_dir'][$fieldName]))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['upload_dir'][$fieldName][] = $originalName;
            return $originalName;
        }
        else
        {
            $newName = $this->fetchFileNextName($originalName, $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['upload_dir'][$fieldName]);
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['upload_dir'][$fieldName][] = $newName;
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
      $this->product_cost = str_replace($sc_parm1, $sc_parm2, $this->product_cost); 
      $this->stock = str_replace($sc_parm1, $sc_parm2, $this->stock); 
      $this->poriva = str_replace($sc_parm1, $sc_parm2, $this->poriva); 
      $this->product_value = str_replace($sc_parm1, $sc_parm2, $this->product_value); 
      $this->discount = str_replace($sc_parm1, $sc_parm2, $this->discount); 
      $this->precioventa = str_replace($sc_parm1, $sc_parm2, $this->precioventa); 
   } 
   function nm_poe_aspas_decimal() 
   { 
      $this->product_cost = "'" . $this->product_cost . "'";
      $this->stock = "'" . $this->stock . "'";
      $this->poriva = "'" . $this->poriva . "'";
      $this->product_value = "'" . $this->product_value . "'";
      $this->discount = "'" . $this->discount . "'";
      $this->precioventa = "'" . $this->precioventa . "'";
   } 
   function nm_tira_aspas_decimal() 
   { 
      $this->product_cost = str_replace("'", "", $this->product_cost); 
      $this->stock = str_replace("'", "", $this->stock); 
      $this->poriva = str_replace("'", "", $this->poriva); 
      $this->product_value = str_replace("'", "", $this->product_value); 
      $this->discount = str_replace("'", "", $this->discount); 
      $this->precioventa = str_replace("'", "", $this->precioventa); 
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
      if ($this->nmgp_opcao != "incluir")  
      {
           unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['dados_clone']['image']);
      }
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
    if ("excluir" == $this->nmgp_opcao) {
      $this->sc_evento = $this->nmgp_opcao;
      $_SESSION['scriptcase']['form_product_snackbar_mob']['contr_erro'] = 'on';
              /* loss_detail */
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
      {
          $sc_cmd_dependency = "SELECT COUNT(*) AS countTest FROM loss_detail WHERE id_product = " . $this->id_product ;
      }
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      {
          $sc_cmd_dependency = "SELECT COUNT(*) AS countTest FROM loss_detail WHERE id_product = " . $this->id_product ;
      }
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
      {
          $sc_cmd_dependency = "SELECT COUNT(*) AS countTest FROM loss_detail WHERE id_product = " . $this->id_product ;
      }
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
      {
          $sc_cmd_dependency = "SELECT COUNT(*) AS countTest FROM loss_detail WHERE id_product = " . $this->id_product ;
      }
      else
      {
          $sc_cmd_dependency = "SELECT COUNT(*) AS countTest FROM loss_detail WHERE id_product = " . $this->id_product ;
      }
       
      $nm_select = $sc_cmd_dependency; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->dataset_loss_detail = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                      $this->dataset_loss_detail[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->dataset_loss_detail = false;
          $this->dataset_loss_detail_erro = $this->Db->ErrorMsg();
      } 
;

      if($this->dataset_loss_detail[0][0] > 0)
      {
          
 if (!isset($this->Campos_Mens_erro)){$this->Campos_Mens_erro = "";}
 if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= "" . $this->Ini->Nm_lang['lang_errm_dele_rhcr'] . "";
 if ('submit_form' == $this->NM_ajax_opcao || 'event_' == substr($this->NM_ajax_opcao, 0, 6) || (isset($this->wizard_action) && 'change_step' == $this->wizard_action))
 {
  if (isset($this->wizard_action) && 'change_step' == $this->wizard_action) {
   $sErrorIndex = 'geral_form_product_snackbar_mob';
  } elseif ('submit_form' == $this->NM_ajax_opcao) {
   $sErrorIndex = 'geral_form_product_snackbar_mob';
  } else {
   $sErrorIndex = substr(substr($this->NM_ajax_opcao, 0, strrpos($this->NM_ajax_opcao, '_')), 6);
  }
  $this->NM_ajax_info['errList'][$sErrorIndex][] = "" . $this->Ini->Nm_lang['lang_errm_dele_rhcr'] . "";
 }
;
      }

            /* purchase_detail */
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
      {
          $sc_cmd_dependency = "SELECT COUNT(*) AS countTest FROM purchase_detail WHERE id_product = " . $this->id_product ;
      }
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      {
          $sc_cmd_dependency = "SELECT COUNT(*) AS countTest FROM purchase_detail WHERE id_product = " . $this->id_product ;
      }
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
      {
          $sc_cmd_dependency = "SELECT COUNT(*) AS countTest FROM purchase_detail WHERE id_product = " . $this->id_product ;
      }
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
      {
          $sc_cmd_dependency = "SELECT COUNT(*) AS countTest FROM purchase_detail WHERE id_product = " . $this->id_product ;
      }
      else
      {
          $sc_cmd_dependency = "SELECT COUNT(*) AS countTest FROM purchase_detail WHERE id_product = " . $this->id_product ;
      }
       
      $nm_select = $sc_cmd_dependency; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->dataset_purchase_detail = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                      $this->dataset_purchase_detail[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->dataset_purchase_detail = false;
          $this->dataset_purchase_detail_erro = $this->Db->ErrorMsg();
      } 
;

      if($this->dataset_purchase_detail[0][0] > 0)
      {
          
 if (!isset($this->Campos_Mens_erro)){$this->Campos_Mens_erro = "";}
 if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= "" . $this->Ini->Nm_lang['lang_errm_dele_rhcr'] . "";
 if ('submit_form' == $this->NM_ajax_opcao || 'event_' == substr($this->NM_ajax_opcao, 0, 6) || (isset($this->wizard_action) && 'change_step' == $this->wizard_action))
 {
  if (isset($this->wizard_action) && 'change_step' == $this->wizard_action) {
   $sErrorIndex = 'geral_form_product_snackbar_mob';
  } elseif ('submit_form' == $this->NM_ajax_opcao) {
   $sErrorIndex = 'geral_form_product_snackbar_mob';
  } else {
   $sErrorIndex = substr(substr($this->NM_ajax_opcao, 0, strrpos($this->NM_ajax_opcao, '_')), 6);
  }
  $this->NM_ajax_info['errList'][$sErrorIndex][] = "" . $this->Ini->Nm_lang['lang_errm_dele_rhcr'] . "";
 }
;
      }
$_SESSION['scriptcase']['form_product_snackbar_mob']['contr_erro'] = 'off'; 
    }
      if (!empty($this->Campos_Mens_erro)) 
      {
          $this->Erro->mensagem(__FILE__, __LINE__, "critica", $this->Campos_Mens_erro); 
          $this->Campos_Mens_erro = ""; 
          $this->nmgp_opc_ant = $this->nmgp_opcao ; 
          if ($this->nmgp_opcao == "incluir") 
          { 
              $GLOBALS["erro_incl"] = 1; 
          }
          else
          { 
              $this->sc_evento = ""; 
          }
          if ($this->nmgp_opcao == "alterar" || $this->nmgp_opcao == "incluir" || $this->nmgp_opcao == "excluir") 
          {
              $this->nmgp_opcao = "nada"; 
          } 
          $this->NM_rollback_db(); 
          $this->Campos_Mens_erro = ""; 
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
      $NM_val_form['product_name'] = $this->product_name;
      $NM_val_form['id_category'] = $this->id_category;
      $NM_val_form['product_code'] = $this->product_code;
      $NM_val_form['dateproduct'] = $this->dateproduct;
      $NM_val_form['product_cost'] = $this->product_cost;
      $NM_val_form['stock'] = $this->stock;
      $NM_val_form['poriva'] = $this->poriva;
      $NM_val_form['product_value'] = $this->product_value;
      $NM_val_form['discount'] = $this->discount;
      $NM_val_form['precioventa'] = $this->precioventa;
      $NM_val_form['puntoventa'] = $this->puntoventa;
      $NM_val_form['kiosko'] = $this->kiosko;
      $NM_val_form['orden'] = $this->orden;
      $NM_val_form['id_status'] = $this->id_status;
      $NM_val_form['cuentaventa'] = $this->cuentaventa;
      $NM_val_form['unidad'] = $this->unidad;
      $NM_val_form['cuentacompra'] = $this->cuentacompra;
      $NM_val_form['tipoitem'] = $this->tipoitem;
      $NM_val_form['image'] = $this->image;
      $NM_val_form['service'] = $this->service;
      $NM_val_form['jugador'] = $this->jugador;
      $NM_val_form['entrada'] = $this->entrada;
      $NM_val_form['visitante'] = $this->visitante;
      $NM_val_form['minutos'] = $this->minutos;
      $NM_val_form['tarjeta'] = $this->tarjeta;
      $NM_val_form['tokens'] = $this->tokens;
      $NM_val_form['comida'] = $this->comida;
      $NM_val_form['score'] = $this->score;
      $NM_val_form['combos_recetas'] = $this->combos_recetas;
      $NM_val_form['id_product'] = $this->id_product;
      $NM_val_form['arcade_clasic'] = $this->arcade_clasic;
      $NM_val_form['ultfechaventa'] = $this->ultfechaventa;
      $NM_val_form['ingrediente'] = $this->ingrediente;
      if ($this->id_product === "" || is_null($this->id_product))  
      { 
          $this->id_product = 0;
      } 
      if ($this->id_status === "" || is_null($this->id_status))  
      { 
          $this->id_status = 0;
          $this->sc_force_zero[] = 'id_status';
      } 
      if ($this->product_value === "" || is_null($this->product_value))  
      { 
          $this->product_value = 0;
          $this->sc_force_zero[] = 'product_value';
      } 
      if ($this->product_cost === "" || is_null($this->product_cost))  
      { 
          $this->product_cost = 0;
          $this->sc_force_zero[] = 'product_cost';
      } 
      if ($this->discount === "" || is_null($this->discount))  
      { 
          $this->discount = 0;
          $this->sc_force_zero[] = 'discount';
      } 
      if ($this->stock === "" || is_null($this->stock))  
      { 
          $this->stock = 0;
          $this->sc_force_zero[] = 'stock';
      } 
      if ($this->id_category === "" || is_null($this->id_category))  
      { 
          $this->id_category = 0;
          $this->sc_force_zero[] = 'id_category';
      } 
      if ($this->service === "" || is_null($this->service))  
      { 
          $this->service = 0;
          $this->sc_force_zero[] = 'service';
      } 
      if ($this->kiosko === "" || is_null($this->kiosko))  
      { 
          $this->kiosko = 0;
          $this->sc_force_zero[] = 'kiosko';
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
      if ($this->comida === "" || is_null($this->comida))  
      { 
          $this->comida = 0;
          $this->sc_force_zero[] = 'comida';
      } 
      if ($this->score === "" || is_null($this->score))  
      { 
          $this->score = 0;
          $this->sc_force_zero[] = 'score';
      } 
      if ($this->poriva === "" || is_null($this->poriva))  
      { 
          $this->poriva = 0;
          $this->sc_force_zero[] = 'poriva';
      } 
      if ($this->precioventa === "" || is_null($this->precioventa))  
      { 
          $this->precioventa = 0;
          $this->sc_force_zero[] = 'precioventa';
      } 
      if ($this->puntoventa === "" || is_null($this->puntoventa))  
      { 
          $this->puntoventa = 0;
          $this->sc_force_zero[] = 'puntoventa';
      } 
      if ($this->orden === "" || is_null($this->orden))  
      { 
          $this->orden = 0;
          $this->sc_force_zero[] = 'orden';
      } 
      if ($this->arcade_clasic === "" || is_null($this->arcade_clasic))  
      { 
          $this->arcade_clasic = 0;
          $this->sc_force_zero[] = 'arcade_clasic';
      } 
      if ($this->ingrediente === "" || is_null($this->ingrediente))  
      { 
          $this->ingrediente = 0;
          $this->sc_force_zero[] = 'ingrediente';
      } 
      $nm_bases_lob_geral = array_merge($this->Ini->nm_bases_oracle, $this->Ini->nm_bases_ibase, $this->Ini->nm_bases_informix, $this->Ini->nm_bases_mysql, $this->Ini->nm_bases_access, $this->Ini->nm_bases_sqlite, array('pdo_ibm'), array('pdo_sqlsrv'));
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['decimal_db'] == ",") 
      {
          $this->nm_troca_decimal(".", ",");
      }
      if ($this->nmgp_opcao == "alterar" || $this->nmgp_opcao == "incluir") 
      {
          $this->product_name_before_qstr = $this->product_name;
          $this->product_name = substr($this->Db->qstr($this->product_name), 1, -1); 
          if ($this->product_name == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->product_name = "null"; 
              $NM_val_null[] = "product_name";
          } 
          $this->product_code_before_qstr = $this->product_code;
          $this->product_code = substr($this->Db->qstr($this->product_code), 1, -1); 
          if ($this->product_code == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->product_code = "null"; 
              $NM_val_null[] = "product_code";
          } 
          if ($this->dateproduct == "")  
          { 
              $this->dateproduct = "null"; 
              $NM_val_null[] = "dateproduct";
          } 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          { 
              $nm_tmp = nm_conv_img_access(substr($this->image, 0, 12));
              if (substr($this->image, 0, 4) != "*nm*" && substr($nm_tmp, 0, 4) == "*nm*") 
              { 
                  $this->image = nm_conv_img_access($this->image);
              } 
              if (!empty($this->image) && $this->image != 'null' && substr($this->image, 0, 4) != "*nm*") 
              { 
                  $this->image = "*nm*" . base64_encode($this->image) ; 
              } 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          { 
              if ($this->Ini->nm_tpbanco != "pdo_sqlsrv" && !empty($this->image) && $this->image != 'null' && substr($this->image, 0, 4) != "*nm*") 
              { 
                  $this->image = "*nm*" . base64_encode($this->image) ; 
              } 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
          { 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          { }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
          { }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          { }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          { }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
          { }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
          { 
              if ($this->Ini->nm_tpbanco != 'pdo_ibm' && !empty($this->image) && $this->image != 'null' && substr($this->image, 0, 4) != "*nm*") 
              { 
                  $this->image = "*nm*" . base64_encode($this->image) ; 
              } 
          } 
          else
          { 
              $this->image =  substr($this->Db->qstr($this->image), 1, -1);
          } 
          if ($this->image == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->image = "null"; 
              $NM_val_null[] = "image";
          } 
          $this->cuentaventa_before_qstr = $this->cuentaventa;
          $this->cuentaventa = substr($this->Db->qstr($this->cuentaventa), 1, -1); 
          if ($this->cuentaventa == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->cuentaventa = "null"; 
              $NM_val_null[] = "cuentaventa";
          } 
          $this->unidad_before_qstr = $this->unidad;
          $this->unidad = substr($this->Db->qstr($this->unidad), 1, -1); 
          if ($this->unidad == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->unidad = "null"; 
              $NM_val_null[] = "unidad";
          } 
          $this->tipoitem_before_qstr = $this->tipoitem;
          $this->tipoitem = substr($this->Db->qstr($this->tipoitem), 1, -1); 
          if ($this->tipoitem == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->tipoitem = "null"; 
              $NM_val_null[] = "tipoitem";
          } 
          $this->cuentacompra_before_qstr = $this->cuentacompra;
          $this->cuentacompra = substr($this->Db->qstr($this->cuentacompra), 1, -1); 
          if ($this->cuentacompra == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->cuentacompra = "null"; 
              $NM_val_null[] = "cuentacompra";
          } 
          if ($this->ultfechaventa == "")  
          { 
              $this->ultfechaventa = "null"; 
              $NM_val_null[] = "ultfechaventa";
          } 
          $this->combos_recetas_before_qstr = $this->combos_recetas;
          $this->combos_recetas = substr($this->Db->qstr($this->combos_recetas), 1, -1); 
          if ($this->combos_recetas == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->combos_recetas = "null"; 
              $NM_val_null[] = "combos_recetas";
          } 
      }
      if ($this->nmgp_opcao == "alterar") 
      {
          $SC_fields_update = array(); 
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['foreign_key'] as $sFKName => $sFKValue)
              {
                   if (isset($this->sc_conv_var[$sFKName]))
                   {
                       $sFKName = $this->sc_conv_var[$sFKName];
                   }
                  eval("\$this->" . $sFKName . " = \"" . $sFKValue . "\";");
              }
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['decimal_db'] == ",") 
          {
              $this->nm_poe_aspas_decimal();
          }
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where id_product = $this->id_product ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where id_product = $this->id_product "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where id_product = $this->id_product ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where id_product = $this->id_product "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where id_product = $this->id_product ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where id_product = $this->id_product "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where id_product = $this->id_product ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where id_product = $this->id_product "); 
          }  
          else  
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where id_product = $this->id_product ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where id_product = $this->id_product "); 
          }  
          if ($rs1 === false)  
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
              if ($this->NM_ajax_flag)
              {
                 form_product_snackbar_mob_pack_ajax_response();
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
                  $SC_fields_update[] = "product_name = '$this->product_name', product_code = '$this->product_code', id_status = $this->id_status, dateproduct = #$this->dateproduct#, product_value = $this->product_value, product_cost = $this->product_cost, discount = $this->discount, stock = $this->stock, id_category = $this->id_category, service = $this->service, kiosko = $this->kiosko, entrada = $this->entrada, jugador = $this->jugador, visitante = $this->visitante, tarjeta = $this->tarjeta, minutos = $this->minutos, tokens = $this->tokens, comida = $this->comida, score = $this->score, poriva = $this->poriva, cuentaventa = '$this->cuentaventa', unidad = '$this->unidad', tipoitem = '$this->tipoitem', cuentacompra = '$this->cuentacompra', precioventa = $this->precioventa, puntoventa = $this->puntoventa, orden = $this->orden"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "product_name = '$this->product_name', product_code = '$this->product_code', id_status = $this->id_status, dateproduct = " . $this->Ini->date_delim . $this->dateproduct . $this->Ini->date_delim1 . ", product_value = $this->product_value, product_cost = $this->product_cost, discount = $this->discount, stock = $this->stock, id_category = $this->id_category, service = $this->service, kiosko = $this->kiosko, entrada = $this->entrada, jugador = $this->jugador, visitante = $this->visitante, tarjeta = $this->tarjeta, minutos = $this->minutos, tokens = $this->tokens, comida = $this->comida, score = $this->score, poriva = $this->poriva, cuentaventa = '$this->cuentaventa', unidad = '$this->unidad', tipoitem = '$this->tipoitem', cuentacompra = '$this->cuentacompra', precioventa = $this->precioventa, puntoventa = $this->puntoventa, orden = $this->orden"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "product_name = '$this->product_name', product_code = '$this->product_code', id_status = $this->id_status, dateproduct = " . $this->Ini->date_delim . $this->dateproduct . $this->Ini->date_delim1 . ", product_value = $this->product_value, product_cost = $this->product_cost, discount = $this->discount, stock = $this->stock, id_category = $this->id_category, service = $this->service, kiosko = $this->kiosko, entrada = $this->entrada, jugador = $this->jugador, visitante = $this->visitante, tarjeta = $this->tarjeta, minutos = $this->minutos, tokens = $this->tokens, comida = $this->comida, score = $this->score, poriva = $this->poriva, cuentaventa = '$this->cuentaventa', unidad = '$this->unidad', tipoitem = '$this->tipoitem', cuentacompra = '$this->cuentacompra', precioventa = $this->precioventa, puntoventa = $this->puntoventa, orden = $this->orden"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "product_name = '$this->product_name', product_code = '$this->product_code', id_status = $this->id_status, dateproduct = EXTEND('$this->dateproduct', YEAR TO FRACTION), product_value = $this->product_value, product_cost = $this->product_cost, discount = $this->discount, stock = $this->stock, id_category = $this->id_category, service = $this->service, kiosko = $this->kiosko, entrada = $this->entrada, jugador = $this->jugador, visitante = $this->visitante, tarjeta = $this->tarjeta, minutos = $this->minutos, tokens = $this->tokens, comida = $this->comida, score = $this->score, poriva = $this->poriva, cuentaventa = '$this->cuentaventa', unidad = '$this->unidad', tipoitem = '$this->tipoitem', cuentacompra = '$this->cuentacompra', precioventa = $this->precioventa, puntoventa = $this->puntoventa, orden = $this->orden"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "product_name = '$this->product_name', product_code = '$this->product_code', id_status = $this->id_status, dateproduct = " . $this->Ini->date_delim . $this->dateproduct . $this->Ini->date_delim1 . ", product_value = $this->product_value, product_cost = $this->product_cost, discount = $this->discount, stock = $this->stock, id_category = $this->id_category, service = $this->service, kiosko = $this->kiosko, entrada = $this->entrada, jugador = $this->jugador, visitante = $this->visitante, tarjeta = $this->tarjeta, minutos = $this->minutos, tokens = $this->tokens, comida = $this->comida, score = $this->score, poriva = $this->poriva, cuentaventa = '$this->cuentaventa', unidad = '$this->unidad', tipoitem = '$this->tipoitem', cuentacompra = '$this->cuentacompra', precioventa = $this->precioventa, puntoventa = $this->puntoventa, orden = $this->orden"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "product_name = '$this->product_name', product_code = '$this->product_code', id_status = $this->id_status, dateproduct = " . $this->Ini->date_delim . $this->dateproduct . $this->Ini->date_delim1 . ", product_value = $this->product_value, product_cost = $this->product_cost, discount = $this->discount, stock = $this->stock, id_category = $this->id_category, service = $this->service, kiosko = $this->kiosko, entrada = $this->entrada, jugador = $this->jugador, visitante = $this->visitante, tarjeta = $this->tarjeta, minutos = $this->minutos, tokens = $this->tokens, comida = $this->comida, score = $this->score, poriva = $this->poriva, cuentaventa = '$this->cuentaventa', unidad = '$this->unidad', tipoitem = '$this->tipoitem', cuentacompra = '$this->cuentacompra', precioventa = $this->precioventa, puntoventa = $this->puntoventa, orden = $this->orden"; 
              } 
              else 
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "product_name = '$this->product_name', product_code = '$this->product_code', id_status = $this->id_status, dateproduct = " . $this->Ini->date_delim . $this->dateproduct . $this->Ini->date_delim1 . ", product_value = $this->product_value, product_cost = $this->product_cost, discount = $this->discount, stock = $this->stock, id_category = $this->id_category, service = $this->service, kiosko = $this->kiosko, entrada = $this->entrada, jugador = $this->jugador, visitante = $this->visitante, tarjeta = $this->tarjeta, minutos = $this->minutos, tokens = $this->tokens, comida = $this->comida, score = $this->score, poriva = $this->poriva, cuentaventa = '$this->cuentaventa', unidad = '$this->unidad', tipoitem = '$this->tipoitem', cuentacompra = '$this->cuentacompra', precioventa = $this->precioventa, puntoventa = $this->puntoventa, orden = $this->orden"; 
              } 
              if (isset($NM_val_form['arcade_clasic']) && $NM_val_form['arcade_clasic'] != $this->nmgp_dados_select['arcade_clasic']) 
              { 
                  $SC_fields_update[] = "arcade_clasic = $this->arcade_clasic"; 
              } 
              if (isset($NM_val_form['ultfechaventa']) && $NM_val_form['ultfechaventa'] != $this->nmgp_dados_select['ultfechaventa']) 
              { 
                  if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
                  { 
                      $SC_fields_update[] = "ultfechaventa = #$this->ultfechaventa#"; 
                  } 
                  elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
                  { 
                      $SC_fields_update[] = "ultfechaventa = EXTEND('" . $this->ultfechaventa . "', YEAR TO FRACTION)"; 
                  } 
                  else
                  { 
                      $SC_fields_update[] = "ultfechaventa = " . $this->Ini->date_delim . $this->ultfechaventa . $this->Ini->date_delim1 . ""; 
                  } 
              } 
              if (isset($NM_val_form['ingrediente']) && $NM_val_form['ingrediente'] != $this->nmgp_dados_select['ingrediente']) 
              { 
                  $SC_fields_update[] = "ingrediente = $this->ingrediente"; 
              } 
              $temp_cmd_sql = "";
              if ($this->image_limpa == "S")
              {
                  if ($this->image != "null")
                  {
                      $this->image = '';
                  }
                  if (in_array(strtolower($this->Ini->nm_tpbanco), $nm_bases_lob_geral))
                  {
                  }
                  else
                  {
                      $temp_cmd_sql = "image = '" . $this->image . "'";
                  }
                  $this->image = "";
              }
              else
              {
                  if ($this->image != "none" && $this->image != "")
                  {
                      $NM_conteudo =  $this->image;
                      if (in_array(strtolower($this->Ini->nm_tpbanco), $nm_bases_lob_geral))
                      {
                      }
                      else
                      {
                          $temp_cmd_sql .= " image = '$NM_conteudo'";
                      }
                  }
                  else
                  {
                      $aDoNotUpdate[] = "image";
                  }
              }
              if (!empty($temp_cmd_sql))
              {
                  $SC_fields_update[] = $temp_cmd_sql;
              }
              if ($this->image_limpa == "S" || ($this->image != "none" && $this->image != "" && in_array(strtolower($this->Ini->nm_tpbanco), $nm_bases_lob_geral))) 
              { 
                  if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase)) 
                  { 
                      $SC_fields_update[] = "image = ''"; 
                  } 
                  elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql)) 
                  { 
                      $SC_fields_update[] = "image = ''"; 
                  } 
                  elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access)) 
                  { 
                      $SC_fields_update[] = "image = ''"; 
                  } 
                  elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix)) 
                  { 
                      $SC_fields_update[] = "image = null"; 
                  } 
                  elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite)) 
                  { 
                      $SC_fields_update[] = "image = ''"; 
                  } 
                  else 
                  { 
                      $SC_fields_update[] = "image = empty_blob()"; 
                  } 
              } 
              $comando .= implode(",", $SC_fields_update);  
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              {
                  $comando .= " WHERE id_product = $this->id_product ";  
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
                  $comando .= " WHERE id_product = $this->id_product ";  
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              {
                  $comando .= " WHERE id_product = $this->id_product ";  
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $comando .= " WHERE id_product = $this->id_product ";  
              }  
              else  
              {
                  $comando .= " WHERE id_product = $this->id_product ";  
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
                                  form_product_snackbar_mob_pack_ajax_response();
                              }
                              exit;  
                          }   
                      }   
                  }   
              }   
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql)) 
              { 
              }   
              $this->product_name = $this->product_name_before_qstr;
              $this->product_code = $this->product_code_before_qstr;
              $this->cuentaventa = $this->cuentaventa_before_qstr;
              $this->unidad = $this->unidad_before_qstr;
              $this->tipoitem = $this->tipoitem_before_qstr;
              $this->cuentacompra = $this->cuentacompra_before_qstr;
              $this->combos_recetas = $this->combos_recetas_before_qstr;
              if (in_array(strtolower($this->Ini->nm_tpbanco), $nm_bases_lob_geral))
              { 
                  if ($this->image_limpa == "S" && !in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle) && !in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix)) 
                  { 
                      $_SESSION['scriptcase']['sc_sql_ult_comando'] = "UpdateBlob($this->Ini->nm_tabela, \"image\", \"\",  \"id_product = $this->id_product\")"; 
                      $rs = $this->Db->UpdateBlob($this->Ini->nm_tabela, "image", "",  "id_product = $this->id_product"); 
                  } 
                  else 
                  { 
                      if ($this->image != "none" && $this->image != "") 
                      { 
                          $_SESSION['scriptcase']['sc_sql_ult_comando'] = "UpdateBlob($this->Ini->nm_tabela, \"image\", $this->image,  \"id_product = $this->id_product\")"; 
                          $rs = $this->Db->UpdateBlob($this->Ini->nm_tabela, "image", $this->image,  "id_product = $this->id_product"); 
                      } 
                  } 
                  if ($rs === false) 
                  { 
                      $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_updt'], $this->Db->ErrorMsg()); 
                      $this->NM_rollback_db(); 
                      if ($this->NM_ajax_flag)
                      {
                          form_product_snackbar_mob_pack_ajax_response();
                      }
                      exit;  
                  }   
              }   
              if ($this->image_limpa == "S")
              {
                  $this->NM_ajax_info['fldList']['image_salva'] = array(
                      'row'     => '',
                      'type'    => 'text',
                      'valList' => array(''),
                  );
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

              $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['db_changed'] = true;
              if ($this->NM_ajax_flag) {
                  $this->NM_ajax_info['clearUpload'] = 'S';
                  $this->NM_ajax_info['fldList']['image_salva'] = array(
                      'row'     => '',
                      'type'    => 'text',
                      'valList' => array(''),
                  );
              }


              if     (isset($NM_val_form) && isset($NM_val_form['id_product'])) { $this->id_product = $NM_val_form['id_product']; }
              elseif (isset($this->id_product)) { $this->nm_limpa_alfa($this->id_product); }
              if     (isset($NM_val_form) && isset($NM_val_form['product_name'])) { $this->product_name = $NM_val_form['product_name']; }
              elseif (isset($this->product_name)) { $this->nm_limpa_alfa($this->product_name); }
              if     (isset($NM_val_form) && isset($NM_val_form['product_code'])) { $this->product_code = $NM_val_form['product_code']; }
              elseif (isset($this->product_code)) { $this->nm_limpa_alfa($this->product_code); }
              if     (isset($NM_val_form) && isset($NM_val_form['id_status'])) { $this->id_status = $NM_val_form['id_status']; }
              elseif (isset($this->id_status)) { $this->nm_limpa_alfa($this->id_status); }
              if     (isset($NM_val_form) && isset($NM_val_form['product_value'])) { $this->product_value = $NM_val_form['product_value']; }
              elseif (isset($this->product_value)) { $this->nm_limpa_alfa($this->product_value); }
              if     (isset($NM_val_form) && isset($NM_val_form['product_cost'])) { $this->product_cost = $NM_val_form['product_cost']; }
              elseif (isset($this->product_cost)) { $this->nm_limpa_alfa($this->product_cost); }
              if     (isset($NM_val_form) && isset($NM_val_form['discount'])) { $this->discount = $NM_val_form['discount']; }
              elseif (isset($this->discount)) { $this->nm_limpa_alfa($this->discount); }
              if     (isset($NM_val_form) && isset($NM_val_form['stock'])) { $this->stock = $NM_val_form['stock']; }
              elseif (isset($this->stock)) { $this->nm_limpa_alfa($this->stock); }
              if     (isset($NM_val_form) && isset($NM_val_form['id_category'])) { $this->id_category = $NM_val_form['id_category']; }
              elseif (isset($this->id_category)) { $this->nm_limpa_alfa($this->id_category); }
              if     (isset($NM_val_form) && isset($NM_val_form['service'])) { $this->service = $NM_val_form['service']; }
              elseif (isset($this->service)) { $this->nm_limpa_alfa($this->service); }
              if     (isset($NM_val_form) && isset($NM_val_form['kiosko'])) { $this->kiosko = $NM_val_form['kiosko']; }
              elseif (isset($this->kiosko)) { $this->nm_limpa_alfa($this->kiosko); }
              if     (isset($NM_val_form) && isset($NM_val_form['entrada'])) { $this->entrada = $NM_val_form['entrada']; }
              elseif (isset($this->entrada)) { $this->nm_limpa_alfa($this->entrada); }
              if     (isset($NM_val_form) && isset($NM_val_form['jugador'])) { $this->jugador = $NM_val_form['jugador']; }
              elseif (isset($this->jugador)) { $this->nm_limpa_alfa($this->jugador); }
              if     (isset($NM_val_form) && isset($NM_val_form['visitante'])) { $this->visitante = $NM_val_form['visitante']; }
              elseif (isset($this->visitante)) { $this->nm_limpa_alfa($this->visitante); }
              if     (isset($NM_val_form) && isset($NM_val_form['tarjeta'])) { $this->tarjeta = $NM_val_form['tarjeta']; }
              elseif (isset($this->tarjeta)) { $this->nm_limpa_alfa($this->tarjeta); }
              if     (isset($NM_val_form) && isset($NM_val_form['minutos'])) { $this->minutos = $NM_val_form['minutos']; }
              elseif (isset($this->minutos)) { $this->nm_limpa_alfa($this->minutos); }
              if     (isset($NM_val_form) && isset($NM_val_form['tokens'])) { $this->tokens = $NM_val_form['tokens']; }
              elseif (isset($this->tokens)) { $this->nm_limpa_alfa($this->tokens); }
              if     (isset($NM_val_form) && isset($NM_val_form['comida'])) { $this->comida = $NM_val_form['comida']; }
              elseif (isset($this->comida)) { $this->nm_limpa_alfa($this->comida); }
              if     (isset($NM_val_form) && isset($NM_val_form['score'])) { $this->score = $NM_val_form['score']; }
              elseif (isset($this->score)) { $this->nm_limpa_alfa($this->score); }
              if     (isset($NM_val_form) && isset($NM_val_form['poriva'])) { $this->poriva = $NM_val_form['poriva']; }
              elseif (isset($this->poriva)) { $this->nm_limpa_alfa($this->poriva); }
              if     (isset($NM_val_form) && isset($NM_val_form['cuentaventa'])) { $this->cuentaventa = $NM_val_form['cuentaventa']; }
              elseif (isset($this->cuentaventa)) { $this->nm_limpa_alfa($this->cuentaventa); }
              if     (isset($NM_val_form) && isset($NM_val_form['unidad'])) { $this->unidad = $NM_val_form['unidad']; }
              elseif (isset($this->unidad)) { $this->nm_limpa_alfa($this->unidad); }
              if     (isset($NM_val_form) && isset($NM_val_form['tipoitem'])) { $this->tipoitem = $NM_val_form['tipoitem']; }
              elseif (isset($this->tipoitem)) { $this->nm_limpa_alfa($this->tipoitem); }
              if     (isset($NM_val_form) && isset($NM_val_form['cuentacompra'])) { $this->cuentacompra = $NM_val_form['cuentacompra']; }
              elseif (isset($this->cuentacompra)) { $this->nm_limpa_alfa($this->cuentacompra); }
              if     (isset($NM_val_form) && isset($NM_val_form['precioventa'])) { $this->precioventa = $NM_val_form['precioventa']; }
              elseif (isset($this->precioventa)) { $this->nm_limpa_alfa($this->precioventa); }
              if     (isset($NM_val_form) && isset($NM_val_form['puntoventa'])) { $this->puntoventa = $NM_val_form['puntoventa']; }
              elseif (isset($this->puntoventa)) { $this->nm_limpa_alfa($this->puntoventa); }
              if     (isset($NM_val_form) && isset($NM_val_form['orden'])) { $this->orden = $NM_val_form['orden']; }
              elseif (isset($this->orden)) { $this->nm_limpa_alfa($this->orden); }
              if     (isset($NM_val_form) && isset($NM_val_form['combos_recetas'])) { $this->combos_recetas = $NM_val_form['combos_recetas']; }
              elseif (isset($this->combos_recetas)) { $this->nm_limpa_alfa($this->combos_recetas); }

              $this->nm_formatar_campos();
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
              }

              $aOldRefresh               = $this->nmgp_refresh_fields;
              $this->nmgp_refresh_fields = array_diff(array('product_name', 'id_category', 'product_code', 'dateproduct', 'product_cost', 'stock', 'poriva', 'product_value', 'discount', 'precioventa', 'puntoventa', 'kiosko', 'orden', 'id_status', 'cuentaventa', 'unidad', 'cuentacompra', 'tipoitem', 'image', 'service', 'jugador', 'entrada', 'visitante', 'minutos', 'tarjeta', 'tokens', 'comida', 'score', 'combos_recetas'), $aDoNotUpdate);
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
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['foreign_key'] as $sFKName => $sFKValue)
              {
                   if (isset($this->sc_conv_var[$sFKName]))
                   {
                       $sFKName = $this->sc_conv_var[$sFKName];
                   }
                  eval("\$this->" . $sFKName . " = \"" . $sFKValue . "\";");
              }
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['decimal_db'] == ",") 
          {
              $this->nm_poe_aspas_decimal();
          }
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
          { 
              $NM_seq_auto = "NEXT VALUE FOR product_seq, ";
              $NM_cmp_auto = "id_product, ";
          } 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          { 
              $NM_seq_auto = "product_seq.NEXTVAL, ";
              $NM_cmp_auto = "id_product, ";
          } 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
          { 
              $NM_seq_auto = "nextval('product_seq'), ";
              $NM_cmp_auto = "id_product, ";
          } 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
          { 
              $NM_seq_auto = "gen_id(product_seq, 1), ";
              $NM_cmp_auto = "id_product, ";
          } 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
          { 
              $NM_seq_auto = "NULL, ";
              $NM_cmp_auto = "id_product, ";
          } 
          $bInsertOk = true;
          $aInsertOk = array(); 
          $bInsertOk = $bInsertOk && empty($aInsertOk);
          if (!isset($_POST['nmgp_ins_valid']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['insert_validation'] != $_POST['nmgp_ins_valid'])
          {
              $bInsertOk = false;
              $this->Erro->mensagem(__FILE__, __LINE__, 'security', $this->Ini->Nm_lang['lang_errm_inst_vald']);
              if (isset($_SESSION['scriptcase']['erro_handler']) && $_SESSION['scriptcase']['erro_handler'])
              {
                  $this->nmgp_opcao = 'refresh_insert';
                  if ($this->NM_ajax_flag)
                  {
                      form_product_snackbar_mob_pack_ajax_response();
                      exit;
                  }
              }
          }
          if ($bInsertOk)
          { 
              $_test_file = $this->fetchUniqueUploadName($this->image_scfile_name, $dir_file, "image");
              if (trim($this->image_scfile_name) != $_test_file)
              {
                  $this->image_scfile_name = $_test_file;
                  $this->image = $_test_file;
              }
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              { 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (product_name, product_code, id_status, dateproduct, product_value, product_cost, discount, stock, id_category, image, service, kiosko, entrada, jugador, visitante, tarjeta, minutos, tokens, comida, score, poriva, cuentaventa, unidad, tipoitem, cuentacompra, precioventa, puntoventa, orden, arcade_clasic, ultfechaventa, ingrediente) VALUES ('$this->product_name', '$this->product_code', $this->id_status, #$this->dateproduct#, $this->product_value, $this->product_cost, $this->discount, $this->stock, $this->id_category, '$this->image', $this->service, $this->kiosko, $this->entrada, $this->jugador, $this->visitante, $this->tarjeta, $this->minutos, $this->tokens, $this->comida, $this->score, $this->poriva, '$this->cuentaventa', '$this->unidad', '$this->tipoitem', '$this->cuentacompra', $this->precioventa, $this->puntoventa, $this->orden, $this->arcade_clasic, #$this->ultfechaventa#, $this->ingrediente)"; 
              }
              elseif ($this->Ini->nm_tpbanco == "pdo_sqlsrv")
              { 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (product_name, product_code, id_status, dateproduct, product_value, product_cost, discount, stock, id_category, image, service, kiosko, entrada, jugador, visitante, tarjeta, minutos, tokens, comida, score, poriva, cuentaventa, unidad, tipoitem, cuentacompra, precioventa, puntoventa, orden, arcade_clasic, ultfechaventa, ingrediente) VALUES ('$this->product_name', '$this->product_code', $this->id_status, " . $this->Ini->date_delim . $this->dateproduct . $this->Ini->date_delim1 . ", $this->product_value, $this->product_cost, $this->discount, $this->stock, $this->id_category, '', $this->service, $this->kiosko, $this->entrada, $this->jugador, $this->visitante, $this->tarjeta, $this->minutos, $this->tokens, $this->comida, $this->score, $this->poriva, '$this->cuentaventa', '$this->unidad', '$this->tipoitem', '$this->cuentacompra', $this->precioventa, $this->puntoventa, $this->orden, $this->arcade_clasic, " . $this->Ini->date_delim . $this->ultfechaventa . $this->Ini->date_delim1 . ", $this->ingrediente)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              { 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (product_name, product_code, id_status, dateproduct, product_value, product_cost, discount, stock, id_category, image, service, kiosko, entrada, jugador, visitante, tarjeta, minutos, tokens, comida, score, poriva, cuentaventa, unidad, tipoitem, cuentacompra, precioventa, puntoventa, orden, arcade_clasic, ultfechaventa, ingrediente) VALUES ('$this->product_name', '$this->product_code', $this->id_status, " . $this->Ini->date_delim . $this->dateproduct . $this->Ini->date_delim1 . ", $this->product_value, $this->product_cost, $this->discount, $this->stock, $this->id_category, '$this->image', $this->service, $this->kiosko, $this->entrada, $this->jugador, $this->visitante, $this->tarjeta, $this->minutos, $this->tokens, $this->comida, $this->score, $this->poriva, '$this->cuentaventa', '$this->unidad', '$this->tipoitem', '$this->cuentacompra', $this->precioventa, $this->puntoventa, $this->orden, $this->arcade_clasic, " . $this->Ini->date_delim . $this->ultfechaventa . $this->Ini->date_delim1 . ", $this->ingrediente)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
              { 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (product_name, product_code, id_status, dateproduct, product_value, product_cost, discount, stock, id_category, image, service, kiosko, entrada, jugador, visitante, tarjeta, minutos, tokens, comida, score, poriva, cuentaventa, unidad, tipoitem, cuentacompra, precioventa, puntoventa, orden, arcade_clasic, ultfechaventa, ingrediente) VALUES ('$this->product_name', '$this->product_code', $this->id_status, " . $this->Ini->date_delim . $this->dateproduct . $this->Ini->date_delim1 . ", $this->product_value, $this->product_cost, $this->discount, $this->stock, $this->id_category, '$this->image', $this->service, $this->kiosko, $this->entrada, $this->jugador, $this->visitante, $this->tarjeta, $this->minutos, $this->tokens, $this->comida, $this->score, $this->poriva, '$this->cuentaventa', '$this->unidad', '$this->tipoitem', '$this->cuentacompra', $this->precioventa, $this->puntoventa, $this->orden, $this->arcade_clasic, " . $this->Ini->date_delim . $this->ultfechaventa . $this->Ini->date_delim1 . ", $this->ingrediente)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "product_name, product_code, id_status, dateproduct, product_value, product_cost, discount, stock, id_category, image, service, kiosko, entrada, jugador, visitante, tarjeta, minutos, tokens, comida, score, poriva, cuentaventa, unidad, tipoitem, cuentacompra, precioventa, puntoventa, orden, arcade_clasic, ultfechaventa, ingrediente) VALUES (" . $NM_seq_auto . "'$this->product_name', '$this->product_code', $this->id_status, " . $this->Ini->date_delim . $this->dateproduct . $this->Ini->date_delim1 . ", $this->product_value, $this->product_cost, $this->discount, $this->stock, $this->id_category, EMPTY_BLOB(), $this->service, $this->kiosko, $this->entrada, $this->jugador, $this->visitante, $this->tarjeta, $this->minutos, $this->tokens, $this->comida, $this->score, $this->poriva, '$this->cuentaventa', '$this->unidad', '$this->tipoitem', '$this->cuentacompra', $this->precioventa, $this->puntoventa, $this->orden, $this->arcade_clasic, " . $this->Ini->date_delim . $this->ultfechaventa . $this->Ini->date_delim1 . ", $this->ingrediente)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "product_name, product_code, id_status, dateproduct, product_value, product_cost, discount, stock, id_category, image, service, kiosko, entrada, jugador, visitante, tarjeta, minutos, tokens, comida, score, poriva, cuentaventa, unidad, tipoitem, cuentacompra, precioventa, puntoventa, orden, arcade_clasic, ultfechaventa, ingrediente) VALUES (" . $NM_seq_auto . "'$this->product_name', '$this->product_code', $this->id_status, EXTEND('$this->dateproduct', YEAR TO FRACTION), $this->product_value, $this->product_cost, $this->discount, $this->stock, $this->id_category, null, $this->service, $this->kiosko, $this->entrada, $this->jugador, $this->visitante, $this->tarjeta, $this->minutos, $this->tokens, $this->comida, $this->score, $this->poriva, '$this->cuentaventa', '$this->unidad', '$this->tipoitem', '$this->cuentacompra', $this->precioventa, $this->puntoventa, $this->orden, $this->arcade_clasic, EXTEND('$this->ultfechaventa', YEAR TO FRACTION), $this->ingrediente)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "product_name, product_code, id_status, dateproduct, product_value, product_cost, discount, stock, id_category, image, service, kiosko, entrada, jugador, visitante, tarjeta, minutos, tokens, comida, score, poriva, cuentaventa, unidad, tipoitem, cuentacompra, precioventa, puntoventa, orden, arcade_clasic, ultfechaventa, ingrediente) VALUES (" . $NM_seq_auto . "'$this->product_name', '$this->product_code', $this->id_status, " . $this->Ini->date_delim . $this->dateproduct . $this->Ini->date_delim1 . ", $this->product_value, $this->product_cost, $this->discount, $this->stock, $this->id_category, '', $this->service, $this->kiosko, $this->entrada, $this->jugador, $this->visitante, $this->tarjeta, $this->minutos, $this->tokens, $this->comida, $this->score, $this->poriva, '$this->cuentaventa', '$this->unidad', '$this->tipoitem', '$this->cuentacompra', $this->precioventa, $this->puntoventa, $this->orden, $this->arcade_clasic, " . $this->Ini->date_delim . $this->ultfechaventa . $this->Ini->date_delim1 . ", $this->ingrediente)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "product_name, product_code, id_status, dateproduct, product_value, product_cost, discount, stock, id_category, image, service, kiosko, entrada, jugador, visitante, tarjeta, minutos, tokens, comida, score, poriva, cuentaventa, unidad, tipoitem, cuentacompra, precioventa, puntoventa, orden, arcade_clasic, ultfechaventa, ingrediente) VALUES (" . $NM_seq_auto . "'$this->product_name', '$this->product_code', $this->id_status, " . $this->Ini->date_delim . $this->dateproduct . $this->Ini->date_delim1 . ", $this->product_value, $this->product_cost, $this->discount, $this->stock, $this->id_category, '', $this->service, $this->kiosko, $this->entrada, $this->jugador, $this->visitante, $this->tarjeta, $this->minutos, $this->tokens, $this->comida, $this->score, $this->poriva, '$this->cuentaventa', '$this->unidad', '$this->tipoitem', '$this->cuentacompra', $this->precioventa, $this->puntoventa, $this->orden, $this->arcade_clasic, " . $this->Ini->date_delim . $this->ultfechaventa . $this->Ini->date_delim1 . ", $this->ingrediente)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "product_name, product_code, id_status, dateproduct, product_value, product_cost, discount, stock, id_category, image, service, kiosko, entrada, jugador, visitante, tarjeta, minutos, tokens, comida, score, poriva, cuentaventa, unidad, tipoitem, cuentacompra, precioventa, puntoventa, orden, arcade_clasic, ultfechaventa, ingrediente) VALUES (" . $NM_seq_auto . "'$this->product_name', '$this->product_code', $this->id_status, " . $this->Ini->date_delim . $this->dateproduct . $this->Ini->date_delim1 . ", $this->product_value, $this->product_cost, $this->discount, $this->stock, $this->id_category, '', $this->service, $this->kiosko, $this->entrada, $this->jugador, $this->visitante, $this->tarjeta, $this->minutos, $this->tokens, $this->comida, $this->score, $this->poriva, '$this->cuentaventa', '$this->unidad', '$this->tipoitem', '$this->cuentacompra', $this->precioventa, $this->puntoventa, $this->orden, $this->arcade_clasic, " . $this->Ini->date_delim . $this->ultfechaventa . $this->Ini->date_delim1 . ", $this->ingrediente)"; 
              }
              elseif ($this->Ini->nm_tpbanco =='pdo_ibm')
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "product_name, product_code, id_status, dateproduct, product_value, product_cost, discount, stock, id_category, image, service, kiosko, entrada, jugador, visitante, tarjeta, minutos, tokens, comida, score, poriva, cuentaventa, unidad, tipoitem, cuentacompra, precioventa, puntoventa, orden, arcade_clasic, ultfechaventa, ingrediente) VALUES (" . $NM_seq_auto . "'$this->product_name', '$this->product_code', $this->id_status, " . $this->Ini->date_delim . $this->dateproduct . $this->Ini->date_delim1 . ", $this->product_value, $this->product_cost, $this->discount, $this->stock, $this->id_category, EMPTY_BLOB(), $this->service, $this->kiosko, $this->entrada, $this->jugador, $this->visitante, $this->tarjeta, $this->minutos, $this->tokens, $this->comida, $this->score, $this->poriva, '$this->cuentaventa', '$this->unidad', '$this->tipoitem', '$this->cuentacompra', $this->precioventa, $this->puntoventa, $this->orden, $this->arcade_clasic, " . $this->Ini->date_delim . $this->ultfechaventa . $this->Ini->date_delim1 . ", $this->ingrediente)"; 
              }
              else
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "product_name, product_code, id_status, dateproduct, product_value, product_cost, discount, stock, id_category, image, service, kiosko, entrada, jugador, visitante, tarjeta, minutos, tokens, comida, score, poriva, cuentaventa, unidad, tipoitem, cuentacompra, precioventa, puntoventa, orden, arcade_clasic, ultfechaventa, ingrediente) VALUES (" . $NM_seq_auto . "'$this->product_name', '$this->product_code', $this->id_status, " . $this->Ini->date_delim . $this->dateproduct . $this->Ini->date_delim1 . ", $this->product_value, $this->product_cost, $this->discount, $this->stock, $this->id_category, '$this->image', $this->service, $this->kiosko, $this->entrada, $this->jugador, $this->visitante, $this->tarjeta, $this->minutos, $this->tokens, $this->comida, $this->score, $this->poriva, '$this->cuentaventa', '$this->unidad', '$this->tipoitem', '$this->cuentacompra', $this->precioventa, $this->puntoventa, $this->orden, $this->arcade_clasic, " . $this->Ini->date_delim . $this->ultfechaventa . $this->Ini->date_delim1 . ", $this->ingrediente)"; 
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
                              form_product_snackbar_mob_pack_ajax_response();
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
                          form_product_snackbar_mob_pack_ajax_response();
                      }
                      exit; 
                  } 
                  $this->id_product =  $rsy->fields[0];
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
                  $this->id_product = $rsy->fields[0];
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
                  $this->id_product = $rsy->fields[0];
                  $rsy->Close(); 
              } 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              { 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select product_seq.currval from dual"; 
                  $rsy = $this->Db->Execute($_SESSION['scriptcase']['sc_sql_ult_comando']); 
                  if ($rsy === false && !$rsy->EOF)  
                  { 
                      $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
                      exit; 
                  } 
                  $this->id_product = $rsy->fields[0];
                  $rsy->Close(); 
              } 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
              { 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "values PREVVAL FOR product_seq"; 
                  $rsy = $this->Db->Execute($_SESSION['scriptcase']['sc_sql_ult_comando']); 
                  if ($rsy === false && !$rsy->EOF)  
                  { 
                      $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
                      exit; 
                  } 
                  $this->id_product = $rsy->fields[0];
                  $rsy->Close(); 
              } 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
              { 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select CURRVAL('product_seq')"; 
                  $rsy = $this->Db->Execute($_SESSION['scriptcase']['sc_sql_ult_comando']); 
                  if ($rsy === false && !$rsy->EOF)  
                  { 
                      $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
                      exit; 
                  } 
                  $this->id_product = $rsy->fields[0];
                  $rsy->Close(); 
              } 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
              { 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select gen_id(product_seq, 0) from " . $this->Ini->nm_tabela; 
                  $rsy = $this->Db->Execute($_SESSION['scriptcase']['sc_sql_ult_comando']); 
                  if ($rsy === false && !$rsy->EOF)  
                  { 
                      $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
                      exit; 
                  } 
                  $this->id_product = $rsy->fields[0];
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
                  $this->id_product = $rsy->fields[0];
                  $rsy->Close(); 
              } 
              $this->product_name = $this->product_name_before_qstr;
              $this->product_code = $this->product_code_before_qstr;
              $this->cuentaventa = $this->cuentaventa_before_qstr;
              $this->unidad = $this->unidad_before_qstr;
              $this->tipoitem = $this->tipoitem_before_qstr;
              $this->cuentacompra = $this->cuentacompra_before_qstr;
              $this->combos_recetas = $this->combos_recetas_before_qstr;
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql)) 
              { 
              }   
              if (in_array(strtolower($this->Ini->nm_tpbanco), $nm_bases_lob_geral))
              { 
                  if (trim($this->image ) != "") 
                  { 
                      $_SESSION['scriptcase']['sc_sql_ult_comando'] = "UpdateBlob(" . $this->Ini->nm_tabela . ",  image , $this->image,  \"id_product = $this->id_product\")"; 
                      $rs = $this->Db->UpdateBlob($this->Ini->nm_tabela, "image", $this->image,  "id_product = $this->id_product"); 
                      if ($rs === false)  
                      { 
                          $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_inst'], $this->Db->ErrorMsg()); 
                          $this->NM_rollback_db(); 
                          if ($this->NM_ajax_flag)
                          {
                              form_product_snackbar_mob_pack_ajax_response();
                          }
                          exit; 
                      }  
                  }  
              }  
              }

              $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['db_changed'] = true;

              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['total']))
              {
                  unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['total']);
              }

              $this->sc_evento = "insert"; 
              $this->product_name = $this->product_name_before_qstr;
              $this->product_code = $this->product_code_before_qstr;
              $this->cuentaventa = $this->cuentaventa_before_qstr;
              $this->unidad = $this->unidad_before_qstr;
              $this->tipoitem = $this->tipoitem_before_qstr;
              $this->cuentacompra = $this->cuentacompra_before_qstr;
              $this->combos_recetas = $this->combos_recetas_before_qstr;
              $this->sc_insert_on = true; 
              if (empty($this->sc_erro_insert)) {
                  $this->record_insert_ok = true;
              } 
              $this->NM_gera_log_key("incluir");
              $this->NM_gera_log_new();
              if ('refresh_insert' != $this->nmgp_opcao && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['sc_redir_insert']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['sc_redir_insert'] != "S"))
              {
              $this->nmgp_opcao   = "igual"; 
              $this->nmgp_opc_ant = "igual"; 
              }
              $this->nm_flag_iframe = true;
          } 
          if ($this->lig_edit_lookup)
          {
              $this->lig_edit_lookup_call = true;
          }
      } 
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['decimal_db'] == ",") 
      {
          $this->nm_tira_aspas_decimal();
      }
      if ($this->nmgp_opcao == "excluir") 
      { 
          $this->id_product = substr($this->Db->qstr($this->id_product), 1, -1); 

          $bDelecaoOk = true;
          $sMsgErro   = '';
          if ($bDelecaoOk)
          {
              $sDetailWhere = "idproducto = " . $this->id_product . "";
              $this->form_product_combo_mob->ini_controle();
              if ($this->form_product_combo_mob->temRegistros($sDetailWhere))
              {
                  $bDelecaoOk = false;
                  $sMsgErro   = $this->Ini->Nm_lang['lang_errm_fkvi'];
              }
          }

          if ($bDelecaoOk)
          {

          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where id_product = $this->id_product"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where id_product = $this->id_product "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where id_product = $this->id_product"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where id_product = $this->id_product "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where id_product = $this->id_product"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where id_product = $this->id_product "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where id_product = $this->id_product"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where id_product = $this->id_product "); 
          }  
          else  
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where id_product = $this->id_product"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where id_product = $this->id_product "); 
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
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where id_product = $this->id_product "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where id_product = $this->id_product "); 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where id_product = $this->id_product "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where id_product = $this->id_product "); 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              {
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where id_product = $this->id_product "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where id_product = $this->id_product "); 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where id_product = $this->id_product "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where id_product = $this->id_product "); 
              }  
              else  
              {
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where id_product = $this->id_product "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where id_product = $this->id_product "); 
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
                          form_product_snackbar_mob_pack_ajax_response();
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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['reg_start']--; 
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['reg_start'] < 0)
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['reg_start'] = 0; 
              }

              $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['db_changed'] = true;

              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['total']))
              {
                  unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['total']);
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
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['parms'] = "id_product?#?$this->id_product?@?"; 
      }
      $this->nmgp_dados_form['image'] = ""; 
      $this->image_limpa = ""; 
      $this->image_salva = ""; 
      $this->NM_commit_db(); 
      if ($this->sc_evento != "insert" && $this->sc_evento != "update" && $this->sc_evento != "delete")
      { 
          $this->id_product = null === $this->id_product ? null : substr($this->Db->qstr($this->id_product), 1, -1); 
      } 
      if (isset($this->NM_where_filter))
      {
          $this->NM_where_filter = str_replace("@percent@", "%", $this->NM_where_filter);
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['where_filter'] = trim($this->NM_where_filter);
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['total']))
          {
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['total']);
          }
      }
      $sc_where_filter = '';
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['where_filter_form']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['where_filter_form'])
      {
          $sc_where_filter = $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['where_filter_form'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['where_filter']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['where_filter'] && $sc_where_filter != $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['where_filter'])
      {
          if (empty($sc_where_filter))
          {
              $sc_where_filter = $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['where_filter'];
          }
          else
          {
              $sc_where_filter .= " and (" . $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['where_filter'] . ")";
          }
      }
//------------ 
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['run_iframe'] == "R")
      {
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['iframe_evento'] == "insert") 
          { 
               $this->nmgp_opcao = "novo"; 
               $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['select'] = "";
          } 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['iframe_evento'] = $this->sc_evento; 
      } 
      if (!isset($this->nmgp_opcao) || empty($this->nmgp_opcao)) 
      { 
          if (empty($this->id_product)) 
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
      if ($this->nmgp_opcao != "nada" && (trim($this->id_product) == "")) 
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
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['run_iframe'] == "F" && $this->sc_evento == "insert")
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
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['total']))
      { 
          $nmgp_select = "SELECT count(*) AS countTest from " . $this->Ini->nm_tabela . $sc_where; 
          $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
          $rt = $this->Db->Execute($nmgp_select) ; 
          if ($rt === false && !$rt->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
              exit ; 
          }  
          $qt_geral_reg_form_product_snackbar_mob = isset($rt->fields[0]) ? $rt->fields[0] - 1 : 0; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['total'] = $qt_geral_reg_form_product_snackbar_mob;
          $rt->Close(); 
          if ($this->nmgp_opcao == "igual" && isset($this->NM_btn_navega) && 'S' == $this->NM_btn_navega && !empty($this->id_product))
          {
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              {
                  $Key_Where = "id_product < $this->id_product "; 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
                  $Key_Where = "id_product < $this->id_product "; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              {
                  $Key_Where = "id_product < $this->id_product "; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $Key_Where = "id_product < $this->id_product "; 
              }
              else  
              {
                  $Key_Where = "id_product < $this->id_product "; 
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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['reg_start'] = $rt->fields[0];
              $rt->Close(); 
          }
      } 
      else 
      { 
          $qt_geral_reg_form_product_snackbar_mob = $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['total'];
      } 
      if ($this->nmgp_opcao == "inicio") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['reg_start'] = 0; 
      } 
      if ($this->nmgp_opcao == "avanca")  
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['reg_start']++; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['reg_start'] > $qt_geral_reg_form_product_snackbar_mob)
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['reg_start'] = $qt_geral_reg_form_product_snackbar_mob; 
          }
      } 
      if ($this->nmgp_opcao == "retorna") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['reg_start']--; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['reg_start'] < 0)
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['reg_start'] = 0; 
          }
      } 
      if ($this->nmgp_opcao == "final") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['reg_start'] = $qt_geral_reg_form_product_snackbar_mob; 
      } 
      if ($this->nmgp_opcao == "navpage" && ($this->nmgp_ordem - 1) <= $qt_geral_reg_form_product_snackbar_mob) 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['reg_start'] = $this->nmgp_ordem - 1; 
      } 
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['reg_start']) || empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['reg_start']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['reg_start'] = 0;
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['reg_qtd'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['reg_start'] + 1;
      $this->NM_ajax_info['navSummary']['reg_ini'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['reg_start'] + 1; 
      $this->NM_ajax_info['navSummary']['reg_qtd'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['reg_qtd']; 
      $this->NM_ajax_info['navSummary']['reg_tot'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['total'] + 1; 
      $this->NM_gera_nav_page(); 
      $this->NM_ajax_info['navPage'] = $this->SC_nav_page; 
      $GLOBALS["NM_ERRO_IBASE"] = 0;  
//---------- 
      if ($this->nmgp_opcao != "novo" && $this->nmgp_opcao != "nada" && $this->nmgp_opcao != "refresh_insert") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['parms'] = ""; 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
          { 
              $GLOBALS["NM_ERRO_IBASE"] = 1;  
          } 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
          { 
              $nmgp_select = "SELECT id_product, product_name, product_code, id_status, str_replace (convert(char(10),dateproduct,102), '.', '-') + ' ' + convert(char(8),dateproduct,20), product_value, product_cost, discount, stock, id_category, image, service, kiosko, entrada, jugador, visitante, tarjeta, minutos, tokens, comida, score, poriva, cuentaventa, unidad, tipoitem, cuentacompra, precioventa, puntoventa, orden, arcade_clasic, str_replace (convert(char(10),ultfechaventa,102), '.', '-') + ' ' + convert(char(8),ultfechaventa,20), ingrediente from " . $this->Ini->nm_tabela ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          { 
              $nmgp_select = "SELECT id_product, product_name, product_code, id_status, convert(char(23),dateproduct,121), product_value, product_cost, discount, stock, id_category, image, service, kiosko, entrada, jugador, visitante, tarjeta, minutos, tokens, comida, score, poriva, cuentaventa, unidad, tipoitem, cuentacompra, precioventa, puntoventa, orden, arcade_clasic, convert(char(23),ultfechaventa,121), ingrediente from " . $this->Ini->nm_tabela ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          { 
              $nmgp_select = "SELECT id_product, product_name, product_code, id_status, dateproduct, product_value, product_cost, discount, stock, id_category, image, service, kiosko, entrada, jugador, visitante, tarjeta, minutos, tokens, comida, score, poriva, cuentaventa, unidad, tipoitem, cuentacompra, precioventa, puntoventa, orden, arcade_clasic, ultfechaventa, ingrediente from " . $this->Ini->nm_tabela ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          { 
              $nmgp_select = "SELECT id_product, product_name, product_code, id_status, EXTEND(dateproduct, YEAR TO FRACTION), product_value, product_cost, discount, stock, id_category, LOTOFILE(image, '" . $this->Ini->root . $this->Ini->path_imag_temp . "/sc_blob_image', 'client'), service, kiosko, entrada, jugador, visitante, tarjeta, minutos, tokens, comida, score, poriva, cuentaventa, unidad, tipoitem, cuentacompra, precioventa, puntoventa, orden, arcade_clasic, EXTEND(ultfechaventa, YEAR TO FRACTION), ingrediente from " . $this->Ini->nm_tabela ; 
          } 
          else 
          { 
              $nmgp_select = "SELECT id_product, product_name, product_code, id_status, dateproduct, product_value, product_cost, discount, stock, id_category, image, service, kiosko, entrada, jugador, visitante, tarjeta, minutos, tokens, comida, score, poriva, cuentaventa, unidad, tipoitem, cuentacompra, precioventa, puntoventa, orden, arcade_clasic, ultfechaventa, ingrediente from " . $this->Ini->nm_tabela ; 
          } 
          $aWhere = array();
          $aWhere[] = $sc_where_filter;
          if ($this->nmgp_opcao == "igual" || (($_SESSION['sc_session'][$this->Ini->sc_page]['form_adm_clientes']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_adm_clientes']['run_iframe'] == "R") && ($this->sc_evento == "insert" || $this->sc_evento == "update")) )
          { 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              {
                  $aWhere[] = "id_product = $this->id_product"; 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
                  $aWhere[] = "id_product = $this->id_product"; 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              {
                  $aWhere[] = "id_product = $this->id_product"; 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $aWhere[] = "id_product = $this->id_product"; 
              }  
              else  
              {
                  $aWhere[] = "id_product = $this->id_product"; 
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
          $sc_order_by = "id_product";
          $sc_order_by = str_replace("order by ", "", $sc_order_by);
          $sc_order_by = str_replace("ORDER BY ", "", trim($sc_order_by));
          if (!empty($sc_order_by))
          {
              $nmgp_select .= " order by $sc_order_by "; 
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['run_iframe'] == "R")
          {
              if ($this->sc_evento == "update")
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['select'] = $nmgp_select;
                  $this->nm_gera_html();
              } 
              elseif (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['select']))
              { 
                  $nmgp_select = $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['select'];
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['select'] = ""; 
              } 
          } 
          if ($this->nmgp_opcao == "igual") 
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
              $rs = $this->Db->Execute($nmgp_select) ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "SelectLimit($nmgp_select, 1, " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['reg_start'] . ")" ; 
              $rs = $this->Db->SelectLimit($nmgp_select, 1, $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['reg_start']) ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "SelectLimit($nmgp_select, 1, " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['reg_start'] . ")" ; 
              $rs = $this->Db->SelectLimit($nmgp_select, 1, $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['reg_start']) ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "SelectLimit($nmgp_select, 1, " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['reg_start'] . ")" ; 
              $rs = $this->Db->SelectLimit($nmgp_select, 1, $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['reg_start']) ; 
          } 
          else  
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
              $rs = $this->Db->Execute($nmgp_select) ; 
              if (!$rs === false && !$rs->EOF) 
              { 
                  $rs->Move($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['reg_start']) ;  
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
              if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['where_filter']))
              {
                  $this->nmgp_form_empty        = true;
                  $this->NM_ajax_info['buttonDisplay']['first']   = $this->nmgp_botoes['first']   = "off";
                  $this->NM_ajax_info['buttonDisplay']['back']    = $this->nmgp_botoes['back']    = "off";
                  $this->NM_ajax_info['buttonDisplay']['forward'] = $this->nmgp_botoes['forward'] = "off";
                  $this->NM_ajax_info['buttonDisplay']['last']    = $this->nmgp_botoes['last']    = "off";
                  $this->NM_ajax_info['buttonDisplay']['update']  = $this->nmgp_botoes['update']  = "off";
                  $this->NM_ajax_info['buttonDisplay']['delete']  = $this->nmgp_botoes['delete']  = "off";
                  $this->NM_ajax_info['buttonDisplay']['first']   = $this->nmgp_botoes['insert']  = "off";
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['empty_filter'] = true;
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
              $this->id_product = $rs->fields[0] ; 
              $this->nmgp_dados_select['id_product'] = $this->id_product;
              $this->product_name = $rs->fields[1] ; 
              $this->nmgp_dados_select['product_name'] = $this->product_name;
              $this->product_code = $rs->fields[2] ; 
              $this->nmgp_dados_select['product_code'] = $this->product_code;
              $this->id_status = $rs->fields[3] ; 
              $this->nmgp_dados_select['id_status'] = $this->id_status;
              $this->dateproduct = $rs->fields[4] ; 
              if (substr($this->dateproduct, 10, 1) == "-") 
              { 
                 $this->dateproduct = substr($this->dateproduct, 0, 10) . " " . substr($this->dateproduct, 11);
              } 
              if (substr($this->dateproduct, 13, 1) == ".") 
              { 
                 $this->dateproduct = substr($this->dateproduct, 0, 13) . ":" . substr($this->dateproduct, 14, 2) . ":" . substr($this->dateproduct, 17);
              } 
              $this->nmgp_dados_select['dateproduct'] = $this->dateproduct;
              $this->product_value = $rs->fields[5] ; 
              $this->nmgp_dados_select['product_value'] = $this->product_value;
              $this->product_cost = $rs->fields[6] ; 
              $this->nmgp_dados_select['product_cost'] = $this->product_cost;
              $this->discount = $rs->fields[7] ; 
              $this->nmgp_dados_select['discount'] = $this->discount;
              $this->stock = $rs->fields[8] ; 
              $this->nmgp_dados_select['stock'] = $this->stock;
              $this->id_category = $rs->fields[9] ; 
              $this->nmgp_dados_select['id_category'] = $this->id_category;
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
              { 
                  $this->image = $this->Db->BlobDecode($rs->fields[10]) ; 
              } 
              elseif ($this->Ini->nm_tpbanco == 'pdo_oracle')
              { 
                  $this->image = $this->Db->BlobDecode($rs->fields[10]) ; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              { 
                  if(isset($rs->fields[10]) && !empty($rs->fields[10]) && is_file($rs->fields[10])) 
                  { 
                     $this->image = file_get_contents($rs->fields[10]);
                  }else 
                  { 
                     $this->image = ''; 
                  } 
              } 
              else
              { 
                  $this->image = $rs->fields[10] ; 
              } 
              $this->nmgp_dados_select['image'] = $this->image;
              $this->service = $rs->fields[11] ; 
              $this->nmgp_dados_select['service'] = $this->service;
              $this->kiosko = $rs->fields[12] ; 
              $this->nmgp_dados_select['kiosko'] = $this->kiosko;
              $this->entrada = $rs->fields[13] ; 
              $this->nmgp_dados_select['entrada'] = $this->entrada;
              $this->jugador = $rs->fields[14] ; 
              $this->nmgp_dados_select['jugador'] = $this->jugador;
              $this->visitante = $rs->fields[15] ; 
              $this->nmgp_dados_select['visitante'] = $this->visitante;
              $this->tarjeta = $rs->fields[16] ; 
              $this->nmgp_dados_select['tarjeta'] = $this->tarjeta;
              $this->minutos = $rs->fields[17] ; 
              $this->nmgp_dados_select['minutos'] = $this->minutos;
              $this->tokens = $rs->fields[18] ; 
              $this->nmgp_dados_select['tokens'] = $this->tokens;
              $this->comida = $rs->fields[19] ; 
              $this->nmgp_dados_select['comida'] = $this->comida;
              $this->score = $rs->fields[20] ; 
              $this->nmgp_dados_select['score'] = $this->score;
              $this->poriva = $rs->fields[21] ; 
              $this->nmgp_dados_select['poriva'] = $this->poriva;
              $this->cuentaventa = $rs->fields[22] ; 
              $this->nmgp_dados_select['cuentaventa'] = $this->cuentaventa;
              $this->unidad = $rs->fields[23] ; 
              $this->nmgp_dados_select['unidad'] = $this->unidad;
              $this->tipoitem = $rs->fields[24] ; 
              $this->nmgp_dados_select['tipoitem'] = $this->tipoitem;
              $this->cuentacompra = $rs->fields[25] ; 
              $this->nmgp_dados_select['cuentacompra'] = $this->cuentacompra;
              $this->precioventa = $rs->fields[26] ; 
              $this->nmgp_dados_select['precioventa'] = $this->precioventa;
              $this->puntoventa = $rs->fields[27] ; 
              $this->nmgp_dados_select['puntoventa'] = $this->puntoventa;
              $this->orden = $rs->fields[28] ; 
              $this->nmgp_dados_select['orden'] = $this->orden;
              $this->arcade_clasic = $rs->fields[29] ; 
              $this->nmgp_dados_select['arcade_clasic'] = $this->arcade_clasic;
              $this->ultfechaventa = $rs->fields[30] ; 
              if (substr($this->ultfechaventa, 10, 1) == "-") 
              { 
                 $this->ultfechaventa = substr($this->ultfechaventa, 0, 10) . " " . substr($this->ultfechaventa, 11);
              } 
              if (substr($this->ultfechaventa, 13, 1) == ".") 
              { 
                 $this->ultfechaventa = substr($this->ultfechaventa, 0, 13) . ":" . substr($this->ultfechaventa, 14, 2) . ":" . substr($this->ultfechaventa, 17);
              } 
              $this->nmgp_dados_select['ultfechaventa'] = $this->ultfechaventa;
              $this->ingrediente = $rs->fields[31] ; 
              $this->nmgp_dados_select['ingrediente'] = $this->ingrediente;
          $GLOBALS["NM_ERRO_IBASE"] = 0; 
              $this->nm_troca_decimal(",", ".");
              $this->id_product = (string)$this->id_product; 
              $this->id_status = (string)$this->id_status; 
              $this->product_value = (string)$this->product_value; 
              $this->product_cost = (string)$this->product_cost; 
              $this->discount = (string)$this->discount; 
              $this->stock = (string)$this->stock; 
              $this->id_category = (string)$this->id_category; 
              $this->service = (string)$this->service; 
              $this->kiosko = (string)$this->kiosko; 
              $this->entrada = (string)$this->entrada; 
              $this->jugador = (string)$this->jugador; 
              $this->visitante = (string)$this->visitante; 
              $this->tarjeta = (string)$this->tarjeta; 
              $this->minutos = (string)$this->minutos; 
              $this->tokens = (string)$this->tokens; 
              $this->comida = (string)$this->comida; 
              $this->score = (string)$this->score; 
              $this->poriva = (string)$this->poriva; 
              $this->precioventa = (string)$this->precioventa; 
              $this->puntoventa = (string)$this->puntoventa; 
              $this->orden = (string)$this->orden; 
              $this->arcade_clasic = (string)$this->arcade_clasic; 
              $this->ingrediente = (string)$this->ingrediente; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['parms'] = "id_product?#?$this->id_product?@?";
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['sub_dir'][0]  = "";
          } 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['dados_select'] = $this->nmgp_dados_select;
          if (!$this->NM_ajax_flag || 'backup_line' != $this->NM_ajax_opcao)
          {
              $this->Nav_permite_ret = 0 != $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['reg_start'];
              $this->Nav_permite_ava = $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['reg_start'] < $qt_geral_reg_form_product_snackbar_mob;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['opcao']   = '';
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
              $this->id_product = "";  
              $this->nmgp_dados_form["id_product"] = $this->id_product;
              $this->product_name = "";  
              $this->nmgp_dados_form["product_name"] = $this->product_name;
              $this->product_code = "";  
              $this->nmgp_dados_form["product_code"] = $this->product_code;
              $this->id_status = "";  
              $this->nmgp_dados_form["id_status"] = $this->id_status;
              $this->dateproduct =  date('Y') . "-" . date('m')  . "-" . date('d') . " " . date('H') . ":" . date('i') . ":" . date('s');
              $this->dateproduct_hora =  date('H') . ":" . date('i') . ":" . date('s');
              $this->nmgp_dados_form["dateproduct"] = $this->dateproduct;
              $this->product_value = "";  
              $this->nmgp_dados_form["product_value"] = $this->product_value;
              $this->product_cost = "";  
              $this->nmgp_dados_form["product_cost"] = $this->product_cost;
              $this->discount = "";  
              $this->nmgp_dados_form["discount"] = $this->discount;
              $this->stock = "";  
              $this->nmgp_dados_form["stock"] = $this->stock;
              $this->id_category = "";  
              $this->nmgp_dados_form["id_category"] = $this->id_category;
              $this->image = "";  
              $this->image_ul_name = "" ;  
              $this->image_ul_type = "" ;  
              $this->nmgp_dados_form["image"] = $this->image;
              $this->service = "";  
              $this->nmgp_dados_form["service"] = $this->service;
              $this->kiosko = "";  
              $this->nmgp_dados_form["kiosko"] = $this->kiosko;
              $this->entrada = "";  
              $this->nmgp_dados_form["entrada"] = $this->entrada;
              $this->jugador = "";  
              $this->nmgp_dados_form["jugador"] = $this->jugador;
              $this->visitante = "";  
              $this->nmgp_dados_form["visitante"] = $this->visitante;
              $this->tarjeta = "";  
              $this->nmgp_dados_form["tarjeta"] = $this->tarjeta;
              $this->minutos = "";  
              $this->nmgp_dados_form["minutos"] = $this->minutos;
              $this->tokens = "";  
              $this->nmgp_dados_form["tokens"] = $this->tokens;
              $this->comida = "";  
              $this->nmgp_dados_form["comida"] = $this->comida;
              $this->score = "";  
              $this->nmgp_dados_form["score"] = $this->score;
              $this->poriva = "12";  
              $this->nmgp_dados_form["poriva"] = $this->poriva;
              $this->cuentaventa = "";  
              $this->nmgp_dados_form["cuentaventa"] = $this->cuentaventa;
              $this->unidad = "";  
              $this->nmgp_dados_form["unidad"] = $this->unidad;
              $this->tipoitem = "";  
              $this->nmgp_dados_form["tipoitem"] = $this->tipoitem;
              $this->cuentacompra = "";  
              $this->nmgp_dados_form["cuentacompra"] = $this->cuentacompra;
              $this->precioventa = "";  
              $this->nmgp_dados_form["precioventa"] = $this->precioventa;
              $this->puntoventa = "";  
              $this->nmgp_dados_form["puntoventa"] = $this->puntoventa;
              $this->orden = "";  
              $this->nmgp_dados_form["orden"] = $this->orden;
              $this->arcade_clasic = "";  
              $this->nmgp_dados_form["arcade_clasic"] = $this->arcade_clasic;
              $this->ultfechaventa = "";  
              $this->ultfechaventa_hora = "" ;  
              $this->nmgp_dados_form["ultfechaventa"] = $this->ultfechaventa;
              $this->ingrediente = "";  
              $this->nmgp_dados_form["ingrediente"] = $this->ingrediente;
              $this->combos_recetas = "";  
              $this->nmgp_dados_form["combos_recetas"] = $this->combos_recetas;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['dados_form'] = $this->nmgp_dados_form;
              $this->formatado = false;
              if ($this->nmgp_clone != "S")
              {
                  unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['dados_clone']['image']);  
              }
              if ($this->nmgp_clone == "S" && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['dados_select']))
              {
                  $this->nmgp_dados_select = $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['dados_select'];
                  $this->product_name = $this->nmgp_dados_select['product_name'];  
                  $this->product_code = $this->nmgp_dados_select['product_code'];  
                  $this->id_status = $this->nmgp_dados_select['id_status'];  
                  $this->dateproduct = $this->nmgp_dados_select['dateproduct'];  
                  $this->product_value = $this->nmgp_dados_select['product_value'];  
                  $this->product_cost = $this->nmgp_dados_select['product_cost'];  
                  $this->discount = $this->nmgp_dados_select['discount'];  
                  $this->stock = $this->nmgp_dados_select['stock'];  
                  $this->id_category = $this->nmgp_dados_select['id_category'];  
                  $this->image = $this->nmgp_dados_select['image'];  
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['dados_clone']['image'] = $this->nmgp_dados_select['image'];  
                  $this->service = $this->nmgp_dados_select['service'];  
                  $this->kiosko = $this->nmgp_dados_select['kiosko'];  
                  $this->entrada = $this->nmgp_dados_select['entrada'];  
                  $this->jugador = $this->nmgp_dados_select['jugador'];  
                  $this->visitante = $this->nmgp_dados_select['visitante'];  
                  $this->tarjeta = $this->nmgp_dados_select['tarjeta'];  
                  $this->minutos = $this->nmgp_dados_select['minutos'];  
                  $this->tokens = $this->nmgp_dados_select['tokens'];  
                  $this->comida = $this->nmgp_dados_select['comida'];  
                  $this->score = $this->nmgp_dados_select['score'];  
                  $this->poriva = $this->nmgp_dados_select['poriva'];  
                  $this->cuentaventa = $this->nmgp_dados_select['cuentaventa'];  
                  $this->unidad = $this->nmgp_dados_select['unidad'];  
                  $this->tipoitem = $this->nmgp_dados_select['tipoitem'];  
                  $this->cuentacompra = $this->nmgp_dados_select['cuentacompra'];  
                  $this->precioventa = $this->nmgp_dados_select['precioventa'];  
                  $this->puntoventa = $this->nmgp_dados_select['puntoventa'];  
                  $this->orden = $this->nmgp_dados_select['orden'];  
                  $this->arcade_clasic = $this->nmgp_dados_select['arcade_clasic'];  
                  $this->ultfechaventa = $this->nmgp_dados_select['ultfechaventa'];  
                  $this->ingrediente = $this->nmgp_dados_select['ingrediente'];  
                  $this->combos_recetas = $this->nmgp_dados_select['combos_recetas'];  
              }
          }
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['foreign_key'] as $sFKName => $sFKValue)
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
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_combo_mob']['embutida_parms'] = "idprod*scin" . $this->nmgp_dados_form['id_product'] . "*scoutNM_btn_insert*scinS*scoutNM_btn_update*scinS*scoutNM_btn_delete*scinS*scoutNM_btn_navega*scinN*scout";
  }
// 
//-- 
   function nm_db_retorna($str_where_param = '') 
   {  
     $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
     $str_where_filter = ('' != $str_where_param) ? ' and ' . $str_where_param : '';
     if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(id_product) from " . $this->Ini->nm_tabela . " where id_product < $this->id_product" . $str_where_filter; 
         $rs = $this->Db->Execute("select max(id_product) from " . $this->Ini->nm_tabela . " where id_product < $this->id_product" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(id_product) from " . $this->Ini->nm_tabela . " where id_product < $this->id_product" . $str_where_filter; 
         $rs = $this->Db->Execute("select max(id_product) from " . $this->Ini->nm_tabela . " where id_product < $this->id_product" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(id_product) from " . $this->Ini->nm_tabela . " where id_product < $this->id_product" . $str_where_filter; 
         $rs = $this->Db->Execute("select max(id_product) from " . $this->Ini->nm_tabela . " where id_product < $this->id_product" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(id_product) from " . $this->Ini->nm_tabela . " where id_product < $this->id_product" . $str_where_filter; 
         $rs = $this->Db->Execute("select max(id_product) from " . $this->Ini->nm_tabela . " where id_product < $this->id_product" . $str_where_filter); 
     }  
     else  
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(id_product) from " . $this->Ini->nm_tabela . " where id_product < $this->id_product" . $str_where_filter; 
         $rs = $this->Db->Execute("select max(id_product) from " . $this->Ini->nm_tabela . " where id_product < $this->id_product" . $str_where_filter); 
     }  
     if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
     { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
     }  
     if (isset($rs->fields[0]) && $rs->fields[0] != "") 
     { 
         $this->id_product = substr($this->Db->qstr($rs->fields[0]), 1, -1); 
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
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(id_product) from " . $this->Ini->nm_tabela . " where id_product > $this->id_product" . $str_where_filter; 
         $rs = $this->Db->Execute("select min(id_product) from " . $this->Ini->nm_tabela . " where id_product > $this->id_product" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(id_product) from " . $this->Ini->nm_tabela . " where id_product > $this->id_product" . $str_where_filter; 
         $rs = $this->Db->Execute("select min(id_product) from " . $this->Ini->nm_tabela . " where id_product > $this->id_product" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(id_product) from " . $this->Ini->nm_tabela . " where id_product > $this->id_product" . $str_where_filter; 
         $rs = $this->Db->Execute("select min(id_product) from " . $this->Ini->nm_tabela . " where id_product > $this->id_product" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(id_product) from " . $this->Ini->nm_tabela . " where id_product > $this->id_product" . $str_where_filter; 
         $rs = $this->Db->Execute("select min(id_product) from " . $this->Ini->nm_tabela . " where id_product > $this->id_product" . $str_where_filter); 
     }  
     else  
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(id_product) from " . $this->Ini->nm_tabela . " where id_product > $this->id_product" . $str_where_filter; 
         $rs = $this->Db->Execute("select min(id_product) from " . $this->Ini->nm_tabela . " where id_product > $this->id_product" . $str_where_filter); 
     }  
     if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
     { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
     }  
     if (isset($rs->fields[0]) && $rs->fields[0] != "") 
     { 
         $this->id_product = substr($this->Db->qstr($rs->fields[0]), 1, -1); 
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
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(id_product) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select min(id_product) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(id_product) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select min(id_product) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(id_product) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select min(id_product) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(id_product) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select min(id_product) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
     }  
     else  
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(id_product) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select min(id_product) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
     }  
     if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
     { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
     }  
     if (!isset($rs->fields[0]) || $rs->EOF) 
     { 
         if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['where_filter']))
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
     $this->id_product = substr($this->Db->qstr($rs->fields[0]), 1, -1); 
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
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(id_product) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select max(id_product) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(id_product) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select max(id_product) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(id_product) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select max(id_product) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(id_product) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select max(id_product) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
     }  
     else  
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(id_product) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select max(id_product) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
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
     $this->id_product = substr($this->Db->qstr($rs->fields[0]), 1, -1); 
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
       $this->SC_log_arr['keys']['id_product'] =  $this->id_product;
   }
// 
   function NM_gera_log_old() 
   {
       if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['dados_select']))
       {
           $nmgp_dados_select = $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['dados_select'];
           $this->SC_log_arr['fields']['product_name']['0'] =  $nmgp_dados_select['product_name'];
           $this->SC_log_arr['fields']['product_code']['0'] =  $nmgp_dados_select['product_code'];
           $this->SC_log_arr['fields']['id_status']['0'] =  $nmgp_dados_select['id_status'];
           $this->SC_log_arr['fields']['dateproduct']['0'] =  $nmgp_dados_select['dateproduct'];
           $this->SC_log_arr['fields']['product_value']['0'] =  $nmgp_dados_select['product_value'];
           $this->SC_log_arr['fields']['product_cost']['0'] =  $nmgp_dados_select['product_cost'];
           $this->SC_log_arr['fields']['discount']['0'] =  $nmgp_dados_select['discount'];
           $this->SC_log_arr['fields']['stock']['0'] =  $nmgp_dados_select['stock'];
           $this->SC_log_arr['fields']['id_category']['0'] =  $nmgp_dados_select['id_category'];
           $this->SC_log_arr['fields']['service']['0'] =  $nmgp_dados_select['service'];
           $this->SC_log_arr['fields']['kiosko']['0'] =  $nmgp_dados_select['kiosko'];
           $this->SC_log_arr['fields']['entrada']['0'] =  $nmgp_dados_select['entrada'];
           $this->SC_log_arr['fields']['jugador']['0'] =  $nmgp_dados_select['jugador'];
           $this->SC_log_arr['fields']['visitante']['0'] =  $nmgp_dados_select['visitante'];
           $this->SC_log_arr['fields']['tarjeta']['0'] =  $nmgp_dados_select['tarjeta'];
           $this->SC_log_arr['fields']['minutos']['0'] =  $nmgp_dados_select['minutos'];
           $this->SC_log_arr['fields']['tokens']['0'] =  $nmgp_dados_select['tokens'];
           $this->SC_log_arr['fields']['comida']['0'] =  $nmgp_dados_select['comida'];
           $this->SC_log_arr['fields']['score']['0'] =  $nmgp_dados_select['score'];
           $this->SC_log_arr['fields']['poriva']['0'] =  $nmgp_dados_select['poriva'];
           $this->SC_log_arr['fields']['cuentaventa']['0'] =  $nmgp_dados_select['cuentaventa'];
           $this->SC_log_arr['fields']['unidad']['0'] =  $nmgp_dados_select['unidad'];
           $this->SC_log_arr['fields']['tipoitem']['0'] =  $nmgp_dados_select['tipoitem'];
           $this->SC_log_arr['fields']['cuentacompra']['0'] =  $nmgp_dados_select['cuentacompra'];
           $this->SC_log_arr['fields']['precioventa']['0'] =  $nmgp_dados_select['precioventa'];
           $this->SC_log_arr['fields']['puntoventa']['0'] =  $nmgp_dados_select['puntoventa'];
           $this->SC_log_arr['fields']['orden']['0'] =  $nmgp_dados_select['orden'];
           $this->SC_log_arr['fields']['arcade_clasic']['0'] =  $nmgp_dados_select['arcade_clasic'];
           $this->SC_log_arr['fields']['ultfechaventa']['0'] =  $nmgp_dados_select['ultfechaventa'];
           $this->SC_log_arr['fields']['ingrediente']['0'] =  $nmgp_dados_select['ingrediente'];
           $this->SC_log_arr['fields']['combos_recetas']['0'] =  $nmgp_dados_select['combos_recetas'];
       }
   }
// 
   function NM_gera_log_new() 
   {
       $this->SC_log_arr['fields']['product_name']['1'] =  $this->product_name;
       $this->SC_log_arr['fields']['product_code']['1'] =  $this->product_code;
       $this->SC_log_arr['fields']['id_status']['1'] =  $this->id_status;
       $this->SC_log_arr['fields']['dateproduct']['1'] =  $this->dateproduct;
       $this->SC_log_arr['fields']['product_value']['1'] =  $this->product_value;
       $this->SC_log_arr['fields']['product_cost']['1'] =  $this->product_cost;
       $this->SC_log_arr['fields']['discount']['1'] =  $this->discount;
       $this->SC_log_arr['fields']['stock']['1'] =  $this->stock;
       $this->SC_log_arr['fields']['id_category']['1'] =  $this->id_category;
       $this->SC_log_arr['fields']['service']['1'] =  $this->service;
       $this->SC_log_arr['fields']['kiosko']['1'] =  $this->kiosko;
       $this->SC_log_arr['fields']['entrada']['1'] =  $this->entrada;
       $this->SC_log_arr['fields']['jugador']['1'] =  $this->jugador;
       $this->SC_log_arr['fields']['visitante']['1'] =  $this->visitante;
       $this->SC_log_arr['fields']['tarjeta']['1'] =  $this->tarjeta;
       $this->SC_log_arr['fields']['minutos']['1'] =  $this->minutos;
       $this->SC_log_arr['fields']['tokens']['1'] =  $this->tokens;
       $this->SC_log_arr['fields']['comida']['1'] =  $this->comida;
       $this->SC_log_arr['fields']['score']['1'] =  $this->score;
       $this->SC_log_arr['fields']['poriva']['1'] =  $this->poriva;
       $this->SC_log_arr['fields']['cuentaventa']['1'] =  $this->cuentaventa;
       $this->SC_log_arr['fields']['unidad']['1'] =  $this->unidad;
       $this->SC_log_arr['fields']['tipoitem']['1'] =  $this->tipoitem;
       $this->SC_log_arr['fields']['cuentacompra']['1'] =  $this->cuentacompra;
       $this->SC_log_arr['fields']['precioventa']['1'] =  $this->precioventa;
       $this->SC_log_arr['fields']['puntoventa']['1'] =  $this->puntoventa;
       $this->SC_log_arr['fields']['orden']['1'] =  $this->orden;
       $this->SC_log_arr['fields']['arcade_clasic']['1'] =  $this->arcade_clasic;
       $this->SC_log_arr['fields']['ultfechaventa']['1'] =  $this->ultfechaventa;
       $this->SC_log_arr['fields']['ingrediente']['1'] =  $this->ingrediente;
       $this->SC_log_arr['fields']['combos_recetas']['1'] =  $this->combos_recetas;
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
       $Log_labels['product_name'] =  "{lang_product_fld_product_name}";
       $Log_labels['product_code'] =  "{lang_product_fld_product_code}";
       $Log_labels['id_status'] =  "{lang_product_fld_id_status}";
       $Log_labels['dateproduct'] =  "{lang_product_fld_dateproduct}";
       $Log_labels['product_value'] =  "{lang_product_fld_product_value}";
       $Log_labels['product_cost'] =  "{lang_product_fld_product_cost}";
       $Log_labels['discount'] =  "{lang_product_fld_discount}";
       $Log_labels['stock'] =  "{lang_product_fld_stock}";
       $Log_labels['id_category'] =  "{lang_product_fld_id_category}";
       $Log_labels['service'] =  "SERVICIO";
       $Log_labels['kiosko'] =  "Kiosko";
       $Log_labels['entrada'] =  "Entrada";
       $Log_labels['jugador'] =  "Jugador";
       $Log_labels['visitante'] =  "Visitante";
       $Log_labels['tarjeta'] =  "Tarjeta";
       $Log_labels['minutos'] =  "Minutos";
       $Log_labels['tokens'] =  "Tokens";
       $Log_labels['comida'] =  "Comida";
       $Log_labels['score'] =  "Score";
       $Log_labels['poriva'] =  "Poriva";
       $Log_labels['cuentaventa'] =  "Cuentaventa";
       $Log_labels['unidad'] =  "Unidad";
       $Log_labels['tipoitem'] =  "Tipoitem";
       $Log_labels['cuentacompra'] =  "Cuentacompra";
       $Log_labels['precioventa'] =  "Precioventa subtotal";
       $Log_labels['puntoventa'] =  "Puntoventa";
       $Log_labels['orden'] =  "Orden";
       $Log_labels['arcade_clasic'] =  "Arcade Clasic";
       $Log_labels['ultfechaventa'] =  "Ultfechaventa";
       $Log_labels['ingrediente'] =  "Ingrediente";
       $Log_labels['combos_recetas'] =  "Combos_Recetas";
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
       $rec_tot    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['total'] + 1;
       $rec_fim    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['reg_start'] + 1;
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
                $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar']['record_state'] = array();
        }

        function storeRecordState($sc_seq_vert = 0) {
                if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar']['record_state'])) {
                        $this->initializeRecordState();
                }
                if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar']['record_state'][$sc_seq_vert])) {
                        $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar']['record_state'][$sc_seq_vert] = array();
                }

                $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar']['record_state'][$sc_seq_vert]['buttons'] = array(
                        'delete' => $this->nmgp_botoes['delete'],
                        'update' => $this->nmgp_botoes['update']
                );
        }

        function loadRecordState($sc_seq_vert = 0) {
                if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar']['record_state']) || !isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar']['record_state'][$sc_seq_vert])) {
                        return;
                }

                if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar']['record_state'][$sc_seq_vert]['buttons']['delete'])) {
                        $this->nmgp_botoes['delete'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar']['record_state'][$sc_seq_vert]['buttons']['delete'];
                }
                if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar']['record_state'][$sc_seq_vert]['buttons']['update'])) {
                        $this->nmgp_botoes['update'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar']['record_state'][$sc_seq_vert]['buttons']['update'];
                }
        }

//
function precioventa_onClick()
{
$_SESSION['scriptcase']['form_product_snackbar_mob']['contr_erro'] = 'on';
  
$original_poriva = $this->poriva;
$original_precioventa = $this->precioventa;
$original_product_value = $this->product_value;
$original_product_value = $this->product_value;
$original_precioventa = $this->precioventa;
$original_poriva = $this->poriva;

$factoriva=($this->poriva /100)+1;

$this->precioventa =$this->product_value /$factoriva;

$modificado_poriva = $this->poriva;
$modificado_precioventa = $this->precioventa;
$modificado_product_value = $this->product_value;
$modificado_product_value = $this->product_value;
$modificado_precioventa = $this->precioventa;
$modificado_poriva = $this->poriva;
$this->nm_formatar_campos('poriva', 'precioventa', 'product_value');
if ($original_poriva !== $modificado_poriva || isset($this->nmgp_cmp_readonly['poriva']) || (isset($bFlagRead_poriva) && $bFlagRead_poriva))
{
    $this->ajax_return_values_poriva(true);
}
if ($original_precioventa !== $modificado_precioventa || isset($this->nmgp_cmp_readonly['precioventa']) || (isset($bFlagRead_precioventa) && $bFlagRead_precioventa))
{
    $this->ajax_return_values_precioventa(true);
}
if ($original_product_value !== $modificado_product_value || isset($this->nmgp_cmp_readonly['product_value']) || (isset($bFlagRead_product_value) && $bFlagRead_product_value))
{
    $this->ajax_return_values_product_value(true);
}
if ($original_product_value !== $modificado_product_value || isset($this->nmgp_cmp_readonly['product_value']) || (isset($bFlagRead_product_value) && $bFlagRead_product_value))
{
    $this->ajax_return_values_product_value(true);
}
if ($original_precioventa !== $modificado_precioventa || isset($this->nmgp_cmp_readonly['precioventa']) || (isset($bFlagRead_precioventa) && $bFlagRead_precioventa))
{
    $this->ajax_return_values_precioventa(true);
}
if ($original_poriva !== $modificado_poriva || isset($this->nmgp_cmp_readonly['poriva']) || (isset($bFlagRead_poriva) && $bFlagRead_poriva))
{
    $this->ajax_return_values_poriva(true);
}
$this->NM_ajax_info['event_field'] = 'precioventa';
form_product_snackbar_mob_pack_ajax_response();
exit;


$_SESSION['scriptcase']['form_product_snackbar_mob']['contr_erro'] = 'off';
}
function product_value_onClick()
{
$_SESSION['scriptcase']['form_product_snackbar_mob']['contr_erro'] = 'on';
  
$original_poriva = $this->poriva;
$original_precioventa = $this->precioventa;
$original_product_value = $this->product_value;
$original_product_value = $this->product_value;
$original_precioventa = $this->precioventa;
$original_poriva = $this->poriva;


$factoriva=($this->poriva /100)+1;

$this->precioventa =$this->product_value /$factoriva;




$modificado_poriva = $this->poriva;
$modificado_precioventa = $this->precioventa;
$modificado_product_value = $this->product_value;
$modificado_product_value = $this->product_value;
$modificado_precioventa = $this->precioventa;
$modificado_poriva = $this->poriva;
$this->nm_formatar_campos('poriva', 'precioventa', 'product_value');
if ($original_poriva !== $modificado_poriva || isset($this->nmgp_cmp_readonly['poriva']) || (isset($bFlagRead_poriva) && $bFlagRead_poriva))
{
    $this->ajax_return_values_poriva(true);
}
if ($original_precioventa !== $modificado_precioventa || isset($this->nmgp_cmp_readonly['precioventa']) || (isset($bFlagRead_precioventa) && $bFlagRead_precioventa))
{
    $this->ajax_return_values_precioventa(true);
}
if ($original_product_value !== $modificado_product_value || isset($this->nmgp_cmp_readonly['product_value']) || (isset($bFlagRead_product_value) && $bFlagRead_product_value))
{
    $this->ajax_return_values_product_value(true);
}
if ($original_product_value !== $modificado_product_value || isset($this->nmgp_cmp_readonly['product_value']) || (isset($bFlagRead_product_value) && $bFlagRead_product_value))
{
    $this->ajax_return_values_product_value(true);
}
if ($original_precioventa !== $modificado_precioventa || isset($this->nmgp_cmp_readonly['precioventa']) || (isset($bFlagRead_precioventa) && $bFlagRead_precioventa))
{
    $this->ajax_return_values_precioventa(true);
}
if ($original_poriva !== $modificado_poriva || isset($this->nmgp_cmp_readonly['poriva']) || (isset($bFlagRead_poriva) && $bFlagRead_poriva))
{
    $this->ajax_return_values_poriva(true);
}
$this->NM_ajax_info['event_field'] = 'product';
form_product_snackbar_mob_pack_ajax_response();
exit;


$_SESSION['scriptcase']['form_product_snackbar_mob']['contr_erro'] = 'off';
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
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['botoes'] = $this->nmgp_botoes;
     if ($this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form")
     {
         $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['opc_ant'] = $this->nmgp_opcao;
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
     if (($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['run_iframe'] == "R") && $this->nm_flag_iframe && empty($this->nm_todas_criticas))
     {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['run_iframe_ajax']))
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['retorno_edit'] = array("edit", "");
          }
          else
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['retorno_edit'] .= "&nmgp_opcao=edit";
          }
          if ($this->sc_evento == "insert" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['run_iframe'] == "F")
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['run_iframe_ajax']))
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['retorno_edit'] = array("edit", "fim");
              }
              else
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['retorno_edit'] .= "&rec=fim";
              }
          }
          $this->NM_close_db(); 
          $sJsParent = '';
          if ($this->NM_ajax_flag && isset($this->NM_ajax_info['param']['buffer_output']) && $this->NM_ajax_info['param']['buffer_output'])
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['run_iframe_ajax']))
              {
                  $this->NM_ajax_info['ajaxJavascript'][] = array("parent.ajax_navigate", $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['retorno_edit']);
              }
              else
              {
                  $sJsParent .= 'parent';
                  $this->NM_ajax_info['redir']['metodo'] = 'location';
                  $this->NM_ajax_info['redir']['action'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['retorno_edit'];
                  $this->NM_ajax_info['redir']['target'] = $sJsParent;
              }
              form_product_snackbar_mob_pack_ajax_response();
              exit;
          }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">

         <html><body>
         <script type="text/javascript">
<?php
    
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['run_iframe_ajax']))
    {
        $opc = ($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['run_iframe'] == "F" && $this->sc_evento == "insert") ? "fim" : "";
        echo "parent.ajax_navigate('edit', '" .$opc . "');";
    }
    else
    {
        echo $sJsParent . "parent.location = '" . $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['retorno_edit'] . "';";
    }
?>
         </script>
         </body></html>
<?php
         exit;
     }
//-- 
   if ($this->nmgp_opcao == "novo")
   { 
       $out_image = "";  
   } 
   else 
   { 
       $out_image = $this->image;  
   } 
   if ($this->image != "" && $this->image != "none")   
   { 
       $out_image = $this->Ini->path_imag_temp . "/sc_image_" . $_SESSION['scriptcase']['sc_num_img'] . session_id() . ".gif" ;  
       $arq_image = fopen($this->Ini->root . $out_image, "w") ;  
       if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access)) 
       { 
           $nm_tmp = nm_conv_img_access(substr($this->image, 0, 12));
           if (substr($this->image, 0, 4) != "*nm*" && substr($nm_tmp, 0, 4) == "*nm*") 
           { 
               $this->image = nm_conv_img_access($this->image);
           } 
       } 
       if (substr($this->image, 0, 4) == "*nm*") 
       { 
           $this->image = substr($this->image, 4) ; 
           $this->image = base64_decode($this->image) ; 
       } 
       $img_pos_bm = strpos($this->image, "BM") ; 
       if (!$img_pos_bm === FALSE && $img_pos_bm == 78) 
       { 
           $this->image = substr($this->image, $img_pos_bm) ; 
       } 
       fwrite($arq_image, $this->image) ;  
       fclose($arq_image) ;  
       $sc_obj_img = new nm_trata_img($this->Ini->root . $out_image, true);
       $this->nmgp_return_img['image'][0] = $sc_obj_img->getHeight();
       $this->nmgp_return_img['image'][1] = $sc_obj_img->getWidth();
       $out1_image = $out_image; 
       $_SESSION['scriptcase']['sc_num_img']++ ; 
       $out_image = $this->Ini->path_imag_temp . "/sc_" . "image_" . $_SESSION['scriptcase']['sc_num_img'] . session_id() . ".gif" ; 
       $_SESSION['scriptcase']['sc_num_img']++ ; 
       if (!$this->Ini->Gd_missing)
       { 
           $sc_obj_img = new nm_trata_img($this->Ini->root . $out1_image, true);
           $sc_obj_img->setWidth(200);
           $sc_obj_img->setHeight(200);
           $sc_obj_img->setManterAspecto(true);
           $sc_obj_img->createImg($this->Ini->root . $out_image);
       } 
       else 
       { 
           $out_image = $out1_image;
       } 
       if ($this->Ini->Export_img_zip) {
           $this->Ini->Img_export_zip[] = $this->Ini->root . $out_image;
           $out_image = str_replace($this->Ini->path_imag_temp . "/", "", $out_image);
       } 
       $_SESSION['scriptcase']['sc_num_img']++ ; 
   } 
   if (isset($_POST['nmgp_opcao']) && 'excluir' == $_POST['nmgp_opcao'] && $this->sc_evento != "delete" && (!isset($this->sc_evento_old) || 'delete' != $this->sc_evento_old))
   {
       global $temp_out_image;
       if (isset($temp_out_image))
       {
           $out_image = $temp_out_image;
       }
       global $temp_out1_image;
       if (isset($temp_out1_image))
       {
           $out1_image = $temp_out1_image;
       }
   }
        $this->initFormPages();
    include_once("form_product_snackbar_mob_form0.php");
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
        if ('SC_all_Cmp' == $this->nmgp_fast_search && in_array($field, array("id_product", "product_name", "product_code", "id_status", "product_value", "product_cost", "stock", "id_category"))) {
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
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['table_refresh']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['table_refresh'])
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

   function Form_lookup_id_category()
   {
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['Lookup_id_category']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['Lookup_id_category'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['Lookup_id_category']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['Lookup_id_category'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['Lookup_id_category']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['Lookup_id_category'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['Lookup_id_category']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['Lookup_id_category'] = array(); 
    }

   $old_value_dateproduct = $this->dateproduct;
   $old_value_dateproduct_hora = $this->dateproduct_hora;
   $old_value_product_cost = $this->product_cost;
   $old_value_stock = $this->stock;
   $old_value_poriva = $this->poriva;
   $old_value_product_value = $this->product_value;
   $old_value_discount = $this->discount;
   $old_value_precioventa = $this->precioventa;
   $old_value_orden = $this->orden;
   $old_value_minutos = $this->minutos;
   $old_value_tokens = $this->tokens;
   $old_value_score = $this->score;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_dateproduct = $this->dateproduct;
   $unformatted_value_dateproduct_hora = $this->dateproduct_hora;
   $unformatted_value_product_cost = $this->product_cost;
   $unformatted_value_stock = $this->stock;
   $unformatted_value_poriva = $this->poriva;
   $unformatted_value_product_value = $this->product_value;
   $unformatted_value_discount = $this->discount;
   $unformatted_value_precioventa = $this->precioventa;
   $unformatted_value_orden = $this->orden;
   $unformatted_value_minutos = $this->minutos;
   $unformatted_value_tokens = $this->tokens;
   $unformatted_value_score = $this->score;

   $nm_comando = "SELECT id_category, category  FROM category where id_category=2  ORDER BY category";

   $this->dateproduct = $old_value_dateproduct;
   $this->dateproduct_hora = $old_value_dateproduct_hora;
   $this->product_cost = $old_value_product_cost;
   $this->stock = $old_value_stock;
   $this->poriva = $old_value_poriva;
   $this->product_value = $old_value_product_value;
   $this->discount = $old_value_discount;
   $this->precioventa = $old_value_precioventa;
   $this->orden = $old_value_orden;
   $this->minutos = $old_value_minutos;
   $this->tokens = $old_value_tokens;
   $this->score = $old_value_score;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['Lookup_id_category'][] = $rs->fields[0];
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
   function Form_lookup_puntoventa()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "SI?#?1?#?S?@?";
       $nmgp_def_dados .= "NO?#?0?#??@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_kiosko()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "SI?#?1?#??@?";
       $nmgp_def_dados .= "NO?#?0?#??@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_id_status()
   {
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['Lookup_id_status']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['Lookup_id_status'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['Lookup_id_status']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['Lookup_id_status'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['Lookup_id_status']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['Lookup_id_status'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['Lookup_id_status']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['Lookup_id_status'] = array(); 
    }

   $old_value_dateproduct = $this->dateproduct;
   $old_value_dateproduct_hora = $this->dateproduct_hora;
   $old_value_product_cost = $this->product_cost;
   $old_value_stock = $this->stock;
   $old_value_poriva = $this->poriva;
   $old_value_product_value = $this->product_value;
   $old_value_discount = $this->discount;
   $old_value_precioventa = $this->precioventa;
   $old_value_orden = $this->orden;
   $old_value_minutos = $this->minutos;
   $old_value_tokens = $this->tokens;
   $old_value_score = $this->score;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_dateproduct = $this->dateproduct;
   $unformatted_value_dateproduct_hora = $this->dateproduct_hora;
   $unformatted_value_product_cost = $this->product_cost;
   $unformatted_value_stock = $this->stock;
   $unformatted_value_poriva = $this->poriva;
   $unformatted_value_product_value = $this->product_value;
   $unformatted_value_discount = $this->discount;
   $unformatted_value_precioventa = $this->precioventa;
   $unformatted_value_orden = $this->orden;
   $unformatted_value_minutos = $this->minutos;
   $unformatted_value_tokens = $this->tokens;
   $unformatted_value_score = $this->score;

   $nm_comando = "SELECT id_status, status  FROM status  ORDER BY status";

   $this->dateproduct = $old_value_dateproduct;
   $this->dateproduct_hora = $old_value_dateproduct_hora;
   $this->product_cost = $old_value_product_cost;
   $this->stock = $old_value_stock;
   $this->poriva = $old_value_poriva;
   $this->product_value = $old_value_product_value;
   $this->discount = $old_value_discount;
   $this->precioventa = $old_value_precioventa;
   $this->orden = $old_value_orden;
   $this->minutos = $old_value_minutos;
   $this->tokens = $old_value_tokens;
   $this->score = $old_value_score;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['Lookup_id_status'][] = $rs->fields[0];
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
   function Form_lookup_cuentaventa()
   {
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['Lookup_cuentaventa']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['Lookup_cuentaventa'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['Lookup_cuentaventa']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['Lookup_cuentaventa'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['Lookup_cuentaventa']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['Lookup_cuentaventa'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['Lookup_cuentaventa']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['Lookup_cuentaventa'] = array(); 
    }

   $old_value_dateproduct = $this->dateproduct;
   $old_value_dateproduct_hora = $this->dateproduct_hora;
   $old_value_product_cost = $this->product_cost;
   $old_value_stock = $this->stock;
   $old_value_poriva = $this->poriva;
   $old_value_product_value = $this->product_value;
   $old_value_discount = $this->discount;
   $old_value_precioventa = $this->precioventa;
   $old_value_orden = $this->orden;
   $old_value_minutos = $this->minutos;
   $old_value_tokens = $this->tokens;
   $old_value_score = $this->score;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_dateproduct = $this->dateproduct;
   $unformatted_value_dateproduct_hora = $this->dateproduct_hora;
   $unformatted_value_product_cost = $this->product_cost;
   $unformatted_value_stock = $this->stock;
   $unformatted_value_poriva = $this->poriva;
   $unformatted_value_product_value = $this->product_value;
   $unformatted_value_discount = $this->discount;
   $unformatted_value_precioventa = $this->precioventa;
   $unformatted_value_orden = $this->orden;
   $unformatted_value_minutos = $this->minutos;
   $unformatted_value_tokens = $this->tokens;
   $unformatted_value_score = $this->score;

   $nm_comando = "SELECT codigo, descrip  FROM product_categoria  ORDER BY codigo";

   $this->dateproduct = $old_value_dateproduct;
   $this->dateproduct_hora = $old_value_dateproduct_hora;
   $this->product_cost = $old_value_product_cost;
   $this->stock = $old_value_stock;
   $this->poriva = $old_value_poriva;
   $this->product_value = $old_value_product_value;
   $this->discount = $old_value_discount;
   $this->precioventa = $old_value_precioventa;
   $this->orden = $old_value_orden;
   $this->minutos = $old_value_minutos;
   $this->tokens = $old_value_tokens;
   $this->score = $old_value_score;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $nmgp_def_dados .= $rs->fields[0] . " - " . $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['Lookup_cuentaventa'][] = $rs->fields[0];
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
   function Form_lookup_service()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "SI?#?1?#??@?";
       $nmgp_def_dados .= "NO?#?0?#?S?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_jugador()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "SI?#?1?#??@?";
       $nmgp_def_dados .= "NO?#?0?#?S?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_entrada()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "SI?#?1?#??@?";
       $nmgp_def_dados .= "NO?#?0?#??@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_visitante()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "SI?#?1?#??@?";
       $nmgp_def_dados .= "NO?#?0?#??@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_tarjeta()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "SI?#?1?#??@?";
       $nmgp_def_dados .= "NO?#?0?#??@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_comida()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "SI?#?1?#??@?";
       $nmgp_def_dados .= "NO?#?0?#??@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function SC_fast_search($in_fields, $arg_search, $data_search)
   {
      $fields = (strpos($in_fields, "SC_all_Cmp") !== false) ? array("SC_all_Cmp") : explode(";", $in_fields);
      $this->NM_case_insensitive = false;
      if (empty($data_search)) 
      {
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['where_filter']);
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['total']);
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['fast_search']);
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['where_detal']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['where_detal'])) 
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['where_filter'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['where_detal'];
          }
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['empty_filter']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['empty_filter'])
          {
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['empty_filter']);
              $this->NM_ajax_info['empty_filter'] = 'ok';
              form_product_snackbar_mob_pack_ajax_response();
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
              $this->SC_monta_condicao($comando, "id_product", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "product_name", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "product_code", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $data_lookup = $this->SC_lookup_id_status($arg_search, $data_search);
              if (is_array($data_lookup) && !empty($data_lookup)) 
              {
                  $this->SC_monta_condicao($comando, "id_status", $arg_search, $data_lookup);
              }
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "product_value", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "product_cost", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "stock", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $data_lookup = $this->SC_lookup_id_category($arg_search, $data_search);
              if (is_array($data_lookup) && !empty($data_lookup)) 
              {
                  $this->SC_monta_condicao($comando, "id_category", $arg_search, $data_lookup);
              }
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['where_detal']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['where_detal']) && !empty($comando)) 
      {
          $comando = $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['where_detal'] . " and (" .  $comando . ")";
      }
      if (empty($comando)) 
      {
          $comando = " 1 <> 1 "; 
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['where_filter_form']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['where_filter_form'])
      {
          $sc_where = " where " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['where_filter_form'] . " and (" . $comando . ")";
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
      $qt_geral_reg_form_product_snackbar_mob = isset($rt->fields[0]) ? $rt->fields[0] - 1 : 0; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['total'] = $qt_geral_reg_form_product_snackbar_mob;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['where_filter'] = $comando;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['fast_search'][0] = $field;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['fast_search'][1] = $arg_search;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['fast_search'][2] = $sv_data;
      $rt->Close(); 
      if (isset($rt->fields[0]) && $rt->fields[0] > 0 &&  isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['empty_filter']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['empty_filter'])
      {
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['empty_filter']);
          $this->NM_ajax_info['empty_filter'] = 'ok';
          form_product_snackbar_mob_pack_ajax_response();
          exit;
      }
      elseif (!isset($rt->fields[0]) || $rt->fields[0] == 0)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['empty_filter'] = true;
          $this->NM_ajax_info['empty_filter'] = 'ok';
          form_product_snackbar_mob_pack_ajax_response();
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
      $nm_numeric[] = "id_product";$nm_numeric[] = "id_status";$nm_numeric[] = "product_value";$nm_numeric[] = "product_cost";$nm_numeric[] = "discount";$nm_numeric[] = "stock";$nm_numeric[] = "id_category";$nm_numeric[] = "service";$nm_numeric[] = "kiosko";$nm_numeric[] = "entrada";$nm_numeric[] = "jugador";$nm_numeric[] = "visitante";$nm_numeric[] = "tarjeta";$nm_numeric[] = "minutos";$nm_numeric[] = "tokens";$nm_numeric[] = "comida";$nm_numeric[] = "score";$nm_numeric[] = "poriva";$nm_numeric[] = "precioventa";$nm_numeric[] = "puntoventa";$nm_numeric[] = "orden";$nm_numeric[] = "arcade_clasic";$nm_numeric[] = "ingrediente";
      if (in_array($campo_join, $nm_numeric))
      {
         if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['decimal_db'] == ".")
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
      $Nm_datas["dateproduct"] = "datetime";$Nm_datas["ultfechaventa"] = "datetime";
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
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['SC_sep_date']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['SC_sep_date']))
              {
                  $nm_aspas  = $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['SC_sep_date'];
                  $nm_aspas1 = $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['SC_sep_date1'];
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
   function SC_lookup_id_status($condicao, $campo)
   {
       $result = array();
       $campo_orig = $campo;
       $campo  = substr($this->Db->qstr($campo), 1, -1);
       $nm_comando = "SELECT status, id_status FROM status WHERE (status LIKE '%$campo%')" ; 
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
   function SC_lookup_id_category($condicao, $campo)
   {
       $result = array();
       $campo_orig = $campo;
       $campo  = substr($this->Db->qstr($campo), 1, -1);
       if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres) && ($condicao == "eq" || $condicao == "qp" || $condicao == "np" || $condicao == "ii" || $condicao == "df"))
       {
           $nm_comando = "SELECT category, id_category FROM category WHERE (CAST (id_category AS TEXT) LIKE '%$campo%') AND (id_category=2)" ; 
       }
       else
       {
           $nm_comando = "SELECT category, id_category FROM category WHERE (category LIKE '%$campo%') AND (id_category=2)" ; 
       }
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
       $nmgp_saida_form = "form_product_snackbar_mob_fim.php";
   }
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['redir']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['redir'] == 'redir')
   {
       unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']);
   }
   unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['opc_ant']);
   if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['nm_run_menu']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['nm_run_menu'] == 1)
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['nm_run_menu'] = 2;
       $nmgp_saida_form = "form_product_snackbar_mob_fim.php";
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
       form_product_snackbar_mob_pack_ajax_response();
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
   if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['sc_modal'])
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
if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['masterValue']))
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['dashboard_info']['under_dashboard']) {
?>
var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['dashboard_info']['parent_widget']; ?>']");
if (dbParentFrame && dbParentFrame[0] && dbParentFrame[0].contentWindow.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['masterValue'] as $cmp_master => $val_master)
        {
?>
    dbParentFrame[0].contentWindow.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['masterValue']);
?>
}
<?php
    }
    else {
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['masterValue'] as $cmp_master => $val_master)
        {
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['masterValue']);
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
            case "copy":
                return array("sc_b_clone_t.sc-unique-btn-1", "sc_b_clone_t.sc-unique-btn-15");
                break;
            case "new":
                return array("sc_b_new_t.sc-unique-btn-2", "sc_b_new_t.sc-unique-btn-16");
                break;
            case "insert":
                return array("sc_b_ins_t.sc-unique-btn-3", "sc_b_ins_t.sc-unique-btn-17");
                break;
            case "bcancelar":
                return array("sc_b_sai_t.sc-unique-btn-4", "sc_b_sai_t.sc-unique-btn-18");
                break;
            case "update":
                return array("sc_b_upd_t.sc-unique-btn-5", "sc_b_upd_t.sc-unique-btn-19");
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
        if ($this->Embutida_call) {
            return;
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar']['mostra_cab']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar']['mostra_cab'] == "N") {
            return;
        }
        if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['dashboard_info']['under_dashboard'] && $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['dashboard_info']['compact_mode'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['dashboard_info']['maximized']) {
            return;
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['link_info']['compact_mode']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['link_info']['compact_mode']) {
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
        if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['run_iframe'] != "R") {
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
        if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['ordem_cmp'] == $fieldName) {
            $orderColName = $fieldName;
            if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_snackbar_mob']['ordem_ord'] == " desc") {
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
            case "product_cost":
                return true;
            case "stock":
                return true;
            case "poriva":
                return true;
            case "product_value":
                return true;
            case "discount":
                return true;
            case "precioventa":
                return true;
            case "orden":
                return true;
            case "minutos":
                return true;
            case "tokens":
                return true;
            case "score":
                return true;
            case "id_product":
                return true;
            case "arcade_clasic":
                return true;
            case "ingrediente":
                return true;
            default:
                return false;
        }
        return false;
    }

    function scGetDefaultFieldOrder($fieldName)
    {
        switch ($fieldName) {
            case "id_category":
                return 'desc';
            case "dateproduct":
                return 'desc';
            case "product_cost":
                return 'desc';
            case "stock":
                return 'desc';
            case "poriva":
                return 'desc';
            case "product_value":
                return 'desc';
            case "discount":
                return 'desc';
            case "precioventa":
                return 'desc';
            case "puntoventa":
                return 'desc';
            case "kiosko":
                return 'desc';
            case "orden":
                return 'desc';
            case "id_status":
                return 'desc';
            case "service":
                return 'desc';
            case "jugador":
                return 'desc';
            case "entrada":
                return 'desc';
            case "visitante":
                return 'desc';
            case "minutos":
                return 'desc';
            case "tarjeta":
                return 'desc';
            case "tokens":
                return 'desc';
            case "comida":
                return 'desc';
            case "score":
                return 'desc';
            case "id_product":
                return 'desc';
            case "arcade_clasic":
                return 'desc';
            case "ultfechaventa":
                return 'desc';
            case "ingrediente":
                return 'desc';
            default:
                return 'asc';
        }
        return 'asc';
    }
}
?>
