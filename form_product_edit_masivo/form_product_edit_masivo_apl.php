<?php
//
class form_product_edit_masivo_apl
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
   var $id_product_;
   var $product_name_;
   var $product_code_;
   var $id_status_;
   var $id_status__1;
   var $dateproduct_;
   var $dateproduct__hora;
   var $product_value_;
   var $product_cost_;
   var $discount_;
   var $stock_;
   var $id_category_;
   var $id_category__1;
   var $image_;
   var $image__scfile_name;
   var $image__ul_name;
   var $image__scfile_type;
   var $image__ul_type;
   var $image__limpa;
   var $image__salva;
   var $out_image_;
   var $out1_image_;
   var $service_;
   var $kiosko_;
   var $entrada_;
   var $jugador_;
   var $visitante_;
   var $tarjeta_;
   var $minutos_;
   var $tokens_;
   var $comida_;
   var $score_;
   var $poriva_;
   var $cuentaventa_;
   var $unidad_;
   var $tipoitem_;
   var $cuentacompra_;
   var $precioventa_;
   var $puntoventa_;
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
   var $sc_max_reg = 30; 
   var $sc_max_reg_incl = 1; 
   var $form_vert_form_product_edit_masivo = array();
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
          if (isset($this->NM_ajax_info['param']['comida_']))
          {
              $this->comida_ = $this->NM_ajax_info['param']['comida_'];
          }
          if (isset($this->NM_ajax_info['param']['cuentacompra_']))
          {
              $this->cuentacompra_ = $this->NM_ajax_info['param']['cuentacompra_'];
          }
          if (isset($this->NM_ajax_info['param']['cuentaventa_']))
          {
              $this->cuentaventa_ = $this->NM_ajax_info['param']['cuentaventa_'];
          }
          if (isset($this->NM_ajax_info['param']['dateproduct_']))
          {
              $this->dateproduct_ = $this->NM_ajax_info['param']['dateproduct_'];
          }
          if (isset($this->NM_ajax_info['param']['discount_']))
          {
              $this->discount_ = $this->NM_ajax_info['param']['discount_'];
          }
          if (isset($this->NM_ajax_info['param']['entrada_']))
          {
              $this->entrada_ = $this->NM_ajax_info['param']['entrada_'];
          }
          if (isset($this->NM_ajax_info['param']['id_category_']))
          {
              $this->id_category_ = $this->NM_ajax_info['param']['id_category_'];
          }
          if (isset($this->NM_ajax_info['param']['id_product_']))
          {
              $this->id_product_ = $this->NM_ajax_info['param']['id_product_'];
          }
          if (isset($this->NM_ajax_info['param']['id_status_']))
          {
              $this->id_status_ = $this->NM_ajax_info['param']['id_status_'];
          }
          if (isset($this->NM_ajax_info['param']['image_']))
          {
              $this->image_ = $this->NM_ajax_info['param']['image_'];
          }
          if (isset($this->NM_ajax_info['param']['image__limpa']))
          {
              $this->image__limpa = $this->NM_ajax_info['param']['image__limpa'];
          }
          if (isset($this->NM_ajax_info['param']['image__ul_name']))
          {
              $this->image__ul_name = $this->NM_ajax_info['param']['image__ul_name'];
          }
          if (isset($this->NM_ajax_info['param']['image__ul_type']))
          {
              $this->image__ul_type = $this->NM_ajax_info['param']['image__ul_type'];
          }
          if (isset($this->NM_ajax_info['param']['jugador_']))
          {
              $this->jugador_ = $this->NM_ajax_info['param']['jugador_'];
          }
          if (isset($this->NM_ajax_info['param']['kiosko_']))
          {
              $this->kiosko_ = $this->NM_ajax_info['param']['kiosko_'];
          }
          if (isset($this->NM_ajax_info['param']['minutos_']))
          {
              $this->minutos_ = $this->NM_ajax_info['param']['minutos_'];
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
          if (isset($this->NM_ajax_info['param']['poriva_']))
          {
              $this->poriva_ = $this->NM_ajax_info['param']['poriva_'];
          }
          if (isset($this->NM_ajax_info['param']['precioventa_']))
          {
              $this->precioventa_ = $this->NM_ajax_info['param']['precioventa_'];
          }
          if (isset($this->NM_ajax_info['param']['product_code_']))
          {
              $this->product_code_ = $this->NM_ajax_info['param']['product_code_'];
          }
          if (isset($this->NM_ajax_info['param']['product_cost_']))
          {
              $this->product_cost_ = $this->NM_ajax_info['param']['product_cost_'];
          }
          if (isset($this->NM_ajax_info['param']['product_name_']))
          {
              $this->product_name_ = $this->NM_ajax_info['param']['product_name_'];
          }
          if (isset($this->NM_ajax_info['param']['product_value_']))
          {
              $this->product_value_ = $this->NM_ajax_info['param']['product_value_'];
          }
          if (isset($this->NM_ajax_info['param']['puntoventa_']))
          {
              $this->puntoventa_ = $this->NM_ajax_info['param']['puntoventa_'];
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
          if (isset($this->NM_ajax_info['param']['score_']))
          {
              $this->score_ = $this->NM_ajax_info['param']['score_'];
          }
          if (isset($this->NM_ajax_info['param']['script_case_init']))
          {
              $this->script_case_init = $this->NM_ajax_info['param']['script_case_init'];
          }
          if (isset($this->NM_ajax_info['param']['service_']))
          {
              $this->service_ = $this->NM_ajax_info['param']['service_'];
          }
          if (isset($this->NM_ajax_info['param']['stock_']))
          {
              $this->stock_ = $this->NM_ajax_info['param']['stock_'];
          }
          if (isset($this->NM_ajax_info['param']['tarjeta_']))
          {
              $this->tarjeta_ = $this->NM_ajax_info['param']['tarjeta_'];
          }
          if (isset($this->NM_ajax_info['param']['tipoitem_']))
          {
              $this->tipoitem_ = $this->NM_ajax_info['param']['tipoitem_'];
          }
          if (isset($this->NM_ajax_info['param']['tokens_']))
          {
              $this->tokens_ = $this->NM_ajax_info['param']['tokens_'];
          }
          if (isset($this->NM_ajax_info['param']['unidad_']))
          {
              $this->unidad_ = $this->NM_ajax_info['param']['unidad_'];
          }
          if (isset($this->NM_ajax_info['param']['visitante_']))
          {
              $this->visitante_ = $this->NM_ajax_info['param']['visitante_'];
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
      $this->sc_conv_var['id_product'] = "id_product_";
      $this->sc_conv_var['product_name'] = "product_name_";
      $this->sc_conv_var['product_code'] = "product_code_";
      $this->sc_conv_var['id_status'] = "id_status_";
      $this->sc_conv_var['dateproduct'] = "dateproduct_";
      $this->sc_conv_var['product_value'] = "product_value_";
      $this->sc_conv_var['product_cost'] = "product_cost_";
      $this->sc_conv_var['discount'] = "discount_";
      $this->sc_conv_var['stock'] = "stock_";
      $this->sc_conv_var['id_category'] = "id_category_";
      $this->sc_conv_var['image'] = "image_";
      $this->sc_conv_var['service'] = "service_";
      $this->sc_conv_var['kiosko'] = "kiosko_";
      $this->sc_conv_var['entrada'] = "entrada_";
      $this->sc_conv_var['jugador'] = "jugador_";
      $this->sc_conv_var['visitante'] = "visitante_";
      $this->sc_conv_var['tarjeta'] = "tarjeta_";
      $this->sc_conv_var['minutos'] = "minutos_";
      $this->sc_conv_var['tokens'] = "tokens_";
      $this->sc_conv_var['comida'] = "comida_";
      $this->sc_conv_var['score'] = "score_";
      $this->sc_conv_var['poriva'] = "poriva_";
      $this->sc_conv_var['cuentaventa'] = "cuentaventa_";
      $this->sc_conv_var['unidad'] = "unidad_";
      $this->sc_conv_var['tipoitem'] = "tipoitem_";
      $this->sc_conv_var['cuentacompra'] = "cuentacompra_";
      $this->sc_conv_var['precioventa'] = "precioventa_";
      $this->sc_conv_var['puntoventa'] = "puntoventa_";
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
          $_SESSION['sc_session'][$script_case_init]['form_product_edit_masivo']['opcao']   = "novo";
          $_SESSION['sc_session'][$script_case_init]['form_product_edit_masivo']['opc_ant'] = "inicio";
      }
      if (isset($_SESSION['sc_session'][$script_case_init]['form_product_edit_masivo']['embutida_parms']))
      { 
          $this->nmgp_parms = $_SESSION['sc_session'][$script_case_init]['form_product_edit_masivo']['embutida_parms'];
          unset($_SESSION['sc_session'][$script_case_init]['form_product_edit_masivo']['embutida_parms']);
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
                 nm_limpa_str_form_product_edit_masivo($cadapar[1]);
                 if ($cadapar[1] == "@ ") {$cadapar[1] = trim($cadapar[1]); }
                 $Tmp_par = $cadapar[0];
                 $this->$Tmp_par = $cadapar[1];
                 if ($cadapar[0] == "id_product_")
                 {
                     $this->NM_where_filter .= (empty($this->NM_where_filter)) ? "(" : " and ";
                     $this->NM_where_filter .= "id_product = " . $this->id_product_;
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
              $_SESSION['sc_session'][$script_case_init]['form_product_edit_masivo']['where_filter_form'] = $this->NM_where_filter_form;
              unset($_SESSION['sc_session'][$script_case_init]['form_product_edit_masivo']['total']);
          }
          if (isset($this->sc_redir_atualiz))
          {
              $_SESSION['sc_session'][$script_case_init]['form_product_edit_masivo']['sc_redir_atualiz'] = $this->sc_redir_atualiz;
          }
          if (isset($this->sc_redir_insert))
          {
              $_SESSION['sc_session'][$script_case_init]['form_product_edit_masivo']['sc_redir_insert'] = $this->sc_redir_insert;
          }
      } 
      elseif (isset($script_case_init) && !empty($script_case_init) && isset($_SESSION['sc_session'][$script_case_init]['form_product_edit_masivo']['parms']))
      {
          if ((!isset($this->nmgp_opcao) || ($this->nmgp_opcao != "incluir" && $this->nmgp_opcao != "alterar" && $this->nmgp_opcao != "excluir" && $this->nmgp_opcao != "novo" && $this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form")) && (!isset($this->NM_ajax_opcao) || $this->NM_ajax_opcao == ""))
          {
              $todox = str_replace("?#?@?@?", "?#?@ ?@?", $_SESSION['sc_session'][$script_case_init]['form_product_edit_masivo']['parms']);
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
          $_SESSION['sc_session'][$script_case_init]['form_product_edit_masivo']['nm_run_menu'] = 1;
      } 
      if (($this->NM_ajax_flag && 'navigate_form' == $this->NM_ajax_opcao) || (isset($this->nmgp_opcao) && $this->nmgp_opcao == "igual"))
      { }
      else
      {
          $aDtParts = explode(' ', $this->dateproduct_);
          $this->dateproduct_      = $aDtParts[0];
          $this->dateproduct__hora = $aDtParts[1];
          for ($ix = 1; $ix <= $GLOBALS["sc_contr_vert"]; $ix++)
          {
              $aDtParts = explode(' ', $GLOBALS["dateproduct_" . $ix]);
              $GLOBALS["dateproduct_" . $ix]      = $aDtParts[0];
              $GLOBALS["dateproduct__hora" . $ix] = $aDtParts[1];
          }
      }
      if (!$this->NM_ajax_flag && 'autocomp_' == substr($this->NM_ajax_opcao, 0, 9))
      {
          $this->NM_ajax_flag = true;
      }

      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      if (isset($this->nm_evt_ret_edit) && '' != $this->nm_evt_ret_edit)
      {
          $_SESSION['sc_session'][$script_case_init]['form_product_edit_masivo']['lig_edit_lookup']     = true;
          $_SESSION['sc_session'][$script_case_init]['form_product_edit_masivo']['lig_edit_lookup_cb']  = $this->nm_evt_ret_edit;
          $_SESSION['sc_session'][$script_case_init]['form_product_edit_masivo']['lig_edit_lookup_row'] = isset($this->nm_evt_ret_row) ? $this->nm_evt_ret_row : '';
      }
      if (isset($_SESSION['sc_session'][$script_case_init]['form_product_edit_masivo']['lig_edit_lookup']) && $_SESSION['sc_session'][$script_case_init]['form_product_edit_masivo']['lig_edit_lookup'])
      {
          $this->lig_edit_lookup     = true;
          $this->lig_edit_lookup_cb  = $_SESSION['sc_session'][$script_case_init]['form_product_edit_masivo']['lig_edit_lookup_cb'];
          $this->lig_edit_lookup_row = $_SESSION['sc_session'][$script_case_init]['form_product_edit_masivo']['lig_edit_lookup_row'];
      }
      if (!$this->Ini)
      { 
          $this->Ini = new form_product_edit_masivo_ini(); 
          $this->Ini->init();
          $this->nm_data = new nm_data("es");
          $this->app_is_initializing = $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['initialize'];
      } 
      else 
      { 
         $this->nm_data = new nm_data("es");
      } 
      $_SESSION['sc_session'][$script_case_init]['form_product_edit_masivo']['upload_field_info'] = array();

      $_SESSION['sc_session'][$script_case_init]['form_product_edit_masivo']['upload_field_info']['image_'] = array(
          'app_dir'            => $this->Ini->path_aplicacao,
          'app_name'           => 'form_product_edit_masivo',
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

      unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['masterValue']);
      $this->Change_Menu = false;
      $run_iframe = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['run_iframe']) && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['run_iframe'] == "R")) ? true : false;
      if (!$run_iframe && isset($_SESSION['scriptcase']['menu_atual']) && !$_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['embutida_call'] && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['sc_outra_jan']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['sc_outra_jan']))
      {
          $this->sc_init_menu = "x";
          if (isset($_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init']['form_product_edit_masivo']))
          {
              $this->sc_init_menu = $_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init']['form_product_edit_masivo'];
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
          if ($this->Ini->sc_page == $this->sc_init_menu && !isset($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['form_product_edit_masivo']))
          {
               $_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['form_product_edit_masivo']['link'] = $this->Ini->sc_protocolo . $this->Ini->server . $this->Ini->path_link . "" . SC_dir_app_name('form_product_edit_masivo') . "/";
               $_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['form_product_edit_masivo']['label'] = "" . $this->Ini->Nm_lang['lang_othr_frmu_title'] . " " . $this->Ini->Nm_lang['lang_tbl_product'] . "";
               $this->Change_Menu = true;
          }
          elseif ($this->Ini->sc_page == $this->sc_init_menu)
          {
              $achou = false;
              foreach ($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu] as $apl => $parms)
              {
                  if ($apl == "form_product_edit_masivo")
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
      $this->nm_new_label['product_name_'] = '' . $this->Ini->Nm_lang['lang_product_fld_product_name'] . '';
      $this->nm_new_label['product_code_'] = '' . $this->Ini->Nm_lang['lang_product_fld_product_code'] . '';
      $this->nm_new_label['id_status_'] = '' . $this->Ini->Nm_lang['lang_product_fld_id_status'] . '';
      $this->nm_new_label['dateproduct_'] = '' . $this->Ini->Nm_lang['lang_product_fld_dateproduct'] . '';
      $this->nm_new_label['product_value_'] = '' . $this->Ini->Nm_lang['lang_product_fld_product_value'] . '';
      $this->nm_new_label['product_cost_'] = '' . $this->Ini->Nm_lang['lang_product_fld_product_cost'] . '';
      $this->nm_new_label['discount_'] = '' . $this->Ini->Nm_lang['lang_product_fld_discount'] . '';
      $this->nm_new_label['stock_'] = '' . $this->Ini->Nm_lang['lang_product_fld_stock'] . '';
      $this->nm_new_label['id_category_'] = '' . $this->Ini->Nm_lang['lang_product_fld_id_category'] . '';
      $this->nm_new_label['image_'] = '' . $this->Ini->Nm_lang['lang_product_fld_image'] . '';

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



      $_SESSION['scriptcase']['error_icon']['form_product_edit_masivo']  = "<img src=\"" . $this->Ini->path_icones . "/scriptcase__NM__btn__NM__scriptcase9_Rhino__NM__nm_scriptcase9_Rhino_error.png\" style=\"border-width: 0px\" align=\"top\">&nbsp;";
      $_SESSION['scriptcase']['error_close']['form_product_edit_masivo'] = "<td>" . nmButtonOutput($this->arr_buttons, "berrm_clse", "document.getElementById('id_error_display_fixed').style.display = 'none'; document.getElementById('id_error_message_fixed').innerHTML = ''; return false", "document.getElementById('id_error_display_fixed').style.display = 'none'; document.getElementById('id_error_message_fixed').innerHTML = ''; return false", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "") . "</td>";

      $this->Embutida_proc = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['embutida_proc']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['embutida_proc'] : $this->Embutida_proc;
      $this->Embutida_form = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['embutida_form']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['embutida_form'] : $this->Embutida_form;
      $this->Embutida_call = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['embutida_call']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['embutida_call'] : $this->Embutida_call;

       $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['table_refresh'] = false;

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['embutida_liga_grid_edit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['embutida_liga_grid_edit'])
      {
          $this->Grid_editavel = ('on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['embutida_liga_grid_edit']) ? true : false;
      }
      if (isset($this->Grid_editavel) && $this->Grid_editavel)
      {
          $this->Embutida_form  = true;
          $this->Embutida_ronly = true;
      }
      $this->Embutida_multi = false;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['embutida_multi']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['embutida_multi'])
      {
          $this->Grid_editavel  = false;
          $this->Embutida_form  = false;
          $this->Embutida_ronly = false;
          $this->Embutida_multi = true;
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['embutida_liga_tp_pag']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['embutida_liga_tp_pag'])
      {
          $this->form_paginacao = $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['embutida_liga_tp_pag'];
      }

      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['embutida_form']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['embutida_form'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['embutida_form'] = $this->Embutida_form;
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['embutida_liga_grid_edit']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['embutida_liga_grid_edit'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['embutida_liga_grid_edit'] = $this->Grid_editavel ? 'on' : 'off';
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['embutida_liga_grid_edit']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['embutida_liga_grid_edit'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['embutida_liga_grid_edit'] = $this->Embutida_call;
      }

      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      $this->nmgp_url_saida  = $nm_url_saida;
      $this->nmgp_form_show  = "on";
      $this->nmgp_form_empty = false;
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_valida.php", "C", "NM_Valida") ; 
      $teste_validade = new NM_Valida ;

      if (isset($this->NM_ajax_info['param']['image__ul_name']) && '' != $this->NM_ajax_info['param']['image__ul_name'])
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['upload_field_ul_name'][$this->image__ul_name]))
          {
              $this->NM_ajax_info['param']['image__ul_name'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['upload_field_ul_name'][$this->image__ul_name];
          }
          $this->image_ = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->NM_ajax_info['param']['image__ul_name'];
          $this->image__scfile_name = substr($this->NM_ajax_info['param']['image__ul_name'], 12);
          $this->image__scfile_type = $this->NM_ajax_info['param']['image__ul_type'];
          $this->image__ul_name = $this->NM_ajax_info['param']['image__ul_name'];
          $this->image__ul_type = $this->NM_ajax_info['param']['image__ul_type'];
      }
      elseif (isset($this->image__ul_name) && '' != $this->image__ul_name)
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['upload_field_ul_name'][$this->image__ul_name]))
          {
              $this->image__ul_name = $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['upload_field_ul_name'][$this->image__ul_name];
          }
          $this->image_ = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->image__ul_name;
          $this->image__scfile_name = substr($this->image__ul_name, 12);
          $this->image__scfile_type = $this->image__ul_type;
      }
      if (isset($this->NM_ajax_info['param']['image__ul_name1']) && '' != $this->NM_ajax_info['param']['image__ul_name1'])
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['upload_field_ul_name'][$this->image__ul_name1]))
          {
              $this->NM_ajax_info['param']['image__ul_name1'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['upload_field_ul_name'][$this->image__ul_name1];
          }
          $this->image_1      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->NM_ajax_info['param']['image__ul_name1'];
          $this->image_1_scfile_name = substr($this->NM_ajax_info['param']['image__ul_name1'], 12);
          $this->image_1_scfile_type = $this->NM_ajax_info['param']['image__ul_type1'];
      }
      elseif (isset($this->image__ul_name1) && '' != $this->image__ul_name1)
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['upload_field_ul_name'][$this->image__ul_name1]))
          {
              $this->image__ul_name1 = $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['upload_field_ul_name'][$this->image__ul_name1];
          }
          $this->image_1      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->image__ul_name1;
          $this->image_1_scfile_name = substr($this->image__ul_name1, 12);
          $this->image_1_scfile_type = $this->image__ul_type1;
      }
      if (isset($this->image_1))
      {
          $GLOBALS['image_1']      = $this->image_1;
          $GLOBALS['image_1_scfile_name'] = $this->image_1_scfile_name;
          $GLOBALS['image_1_scfile_type'] = $this->image_1_scfile_type;
      }
      if (isset($this->NM_ajax_info['param']['image__ul_name2']) && '' != $this->NM_ajax_info['param']['image__ul_name2'])
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['upload_field_ul_name'][$this->image__ul_name2]))
          {
              $this->NM_ajax_info['param']['image__ul_name2'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['upload_field_ul_name'][$this->image__ul_name2];
          }
          $this->image_2      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->NM_ajax_info['param']['image__ul_name2'];
          $this->image_2_scfile_name = substr($this->NM_ajax_info['param']['image__ul_name2'], 12);
          $this->image_2_scfile_type = $this->NM_ajax_info['param']['image__ul_type2'];
      }
      elseif (isset($this->image__ul_name2) && '' != $this->image__ul_name2)
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['upload_field_ul_name'][$this->image__ul_name2]))
          {
              $this->image__ul_name2 = $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['upload_field_ul_name'][$this->image__ul_name2];
          }
          $this->image_2      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->image__ul_name2;
          $this->image_2_scfile_name = substr($this->image__ul_name2, 12);
          $this->image_2_scfile_type = $this->image__ul_type2;
      }
      if (isset($this->image_2))
      {
          $GLOBALS['image_2']      = $this->image_2;
          $GLOBALS['image_2_scfile_name'] = $this->image_2_scfile_name;
          $GLOBALS['image_2_scfile_type'] = $this->image_2_scfile_type;
      }
      if (isset($this->NM_ajax_info['param']['image__ul_name3']) && '' != $this->NM_ajax_info['param']['image__ul_name3'])
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['upload_field_ul_name'][$this->image__ul_name3]))
          {
              $this->NM_ajax_info['param']['image__ul_name3'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['upload_field_ul_name'][$this->image__ul_name3];
          }
          $this->image_3      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->NM_ajax_info['param']['image__ul_name3'];
          $this->image_3_scfile_name = substr($this->NM_ajax_info['param']['image__ul_name3'], 12);
          $this->image_3_scfile_type = $this->NM_ajax_info['param']['image__ul_type3'];
      }
      elseif (isset($this->image__ul_name3) && '' != $this->image__ul_name3)
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['upload_field_ul_name'][$this->image__ul_name3]))
          {
              $this->image__ul_name3 = $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['upload_field_ul_name'][$this->image__ul_name3];
          }
          $this->image_3      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->image__ul_name3;
          $this->image_3_scfile_name = substr($this->image__ul_name3, 12);
          $this->image_3_scfile_type = $this->image__ul_type3;
      }
      if (isset($this->image_3))
      {
          $GLOBALS['image_3']      = $this->image_3;
          $GLOBALS['image_3_scfile_name'] = $this->image_3_scfile_name;
          $GLOBALS['image_3_scfile_type'] = $this->image_3_scfile_type;
      }
      if (isset($this->NM_ajax_info['param']['image__ul_name4']) && '' != $this->NM_ajax_info['param']['image__ul_name4'])
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['upload_field_ul_name'][$this->image__ul_name4]))
          {
              $this->NM_ajax_info['param']['image__ul_name4'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['upload_field_ul_name'][$this->image__ul_name4];
          }
          $this->image_4      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->NM_ajax_info['param']['image__ul_name4'];
          $this->image_4_scfile_name = substr($this->NM_ajax_info['param']['image__ul_name4'], 12);
          $this->image_4_scfile_type = $this->NM_ajax_info['param']['image__ul_type4'];
      }
      elseif (isset($this->image__ul_name4) && '' != $this->image__ul_name4)
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['upload_field_ul_name'][$this->image__ul_name4]))
          {
              $this->image__ul_name4 = $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['upload_field_ul_name'][$this->image__ul_name4];
          }
          $this->image_4      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->image__ul_name4;
          $this->image_4_scfile_name = substr($this->image__ul_name4, 12);
          $this->image_4_scfile_type = $this->image__ul_type4;
      }
      if (isset($this->image_4))
      {
          $GLOBALS['image_4']      = $this->image_4;
          $GLOBALS['image_4_scfile_name'] = $this->image_4_scfile_name;
          $GLOBALS['image_4_scfile_type'] = $this->image_4_scfile_type;
      }
      if (isset($this->NM_ajax_info['param']['image__ul_name5']) && '' != $this->NM_ajax_info['param']['image__ul_name5'])
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['upload_field_ul_name'][$this->image__ul_name5]))
          {
              $this->NM_ajax_info['param']['image__ul_name5'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['upload_field_ul_name'][$this->image__ul_name5];
          }
          $this->image_5      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->NM_ajax_info['param']['image__ul_name5'];
          $this->image_5_scfile_name = substr($this->NM_ajax_info['param']['image__ul_name5'], 12);
          $this->image_5_scfile_type = $this->NM_ajax_info['param']['image__ul_type5'];
      }
      elseif (isset($this->image__ul_name5) && '' != $this->image__ul_name5)
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['upload_field_ul_name'][$this->image__ul_name5]))
          {
              $this->image__ul_name5 = $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['upload_field_ul_name'][$this->image__ul_name5];
          }
          $this->image_5      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->image__ul_name5;
          $this->image_5_scfile_name = substr($this->image__ul_name5, 12);
          $this->image_5_scfile_type = $this->image__ul_type5;
      }
      if (isset($this->image_5))
      {
          $GLOBALS['image_5']      = $this->image_5;
          $GLOBALS['image_5_scfile_name'] = $this->image_5_scfile_name;
          $GLOBALS['image_5_scfile_type'] = $this->image_5_scfile_type;
      }
      if (isset($this->NM_ajax_info['param']['image__ul_name6']) && '' != $this->NM_ajax_info['param']['image__ul_name6'])
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['upload_field_ul_name'][$this->image__ul_name6]))
          {
              $this->NM_ajax_info['param']['image__ul_name6'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['upload_field_ul_name'][$this->image__ul_name6];
          }
          $this->image_6      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->NM_ajax_info['param']['image__ul_name6'];
          $this->image_6_scfile_name = substr($this->NM_ajax_info['param']['image__ul_name6'], 12);
          $this->image_6_scfile_type = $this->NM_ajax_info['param']['image__ul_type6'];
      }
      elseif (isset($this->image__ul_name6) && '' != $this->image__ul_name6)
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['upload_field_ul_name'][$this->image__ul_name6]))
          {
              $this->image__ul_name6 = $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['upload_field_ul_name'][$this->image__ul_name6];
          }
          $this->image_6      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->image__ul_name6;
          $this->image_6_scfile_name = substr($this->image__ul_name6, 12);
          $this->image_6_scfile_type = $this->image__ul_type6;
      }
      if (isset($this->image_6))
      {
          $GLOBALS['image_6']      = $this->image_6;
          $GLOBALS['image_6_scfile_name'] = $this->image_6_scfile_name;
          $GLOBALS['image_6_scfile_type'] = $this->image_6_scfile_type;
      }
      if (isset($this->NM_ajax_info['param']['image__ul_name7']) && '' != $this->NM_ajax_info['param']['image__ul_name7'])
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['upload_field_ul_name'][$this->image__ul_name7]))
          {
              $this->NM_ajax_info['param']['image__ul_name7'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['upload_field_ul_name'][$this->image__ul_name7];
          }
          $this->image_7      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->NM_ajax_info['param']['image__ul_name7'];
          $this->image_7_scfile_name = substr($this->NM_ajax_info['param']['image__ul_name7'], 12);
          $this->image_7_scfile_type = $this->NM_ajax_info['param']['image__ul_type7'];
      }
      elseif (isset($this->image__ul_name7) && '' != $this->image__ul_name7)
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['upload_field_ul_name'][$this->image__ul_name7]))
          {
              $this->image__ul_name7 = $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['upload_field_ul_name'][$this->image__ul_name7];
          }
          $this->image_7      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->image__ul_name7;
          $this->image_7_scfile_name = substr($this->image__ul_name7, 12);
          $this->image_7_scfile_type = $this->image__ul_type7;
      }
      if (isset($this->image_7))
      {
          $GLOBALS['image_7']      = $this->image_7;
          $GLOBALS['image_7_scfile_name'] = $this->image_7_scfile_name;
          $GLOBALS['image_7_scfile_type'] = $this->image_7_scfile_type;
      }
      if (isset($this->NM_ajax_info['param']['image__ul_name8']) && '' != $this->NM_ajax_info['param']['image__ul_name8'])
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['upload_field_ul_name'][$this->image__ul_name8]))
          {
              $this->NM_ajax_info['param']['image__ul_name8'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['upload_field_ul_name'][$this->image__ul_name8];
          }
          $this->image_8      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->NM_ajax_info['param']['image__ul_name8'];
          $this->image_8_scfile_name = substr($this->NM_ajax_info['param']['image__ul_name8'], 12);
          $this->image_8_scfile_type = $this->NM_ajax_info['param']['image__ul_type8'];
      }
      elseif (isset($this->image__ul_name8) && '' != $this->image__ul_name8)
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['upload_field_ul_name'][$this->image__ul_name8]))
          {
              $this->image__ul_name8 = $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['upload_field_ul_name'][$this->image__ul_name8];
          }
          $this->image_8      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->image__ul_name8;
          $this->image_8_scfile_name = substr($this->image__ul_name8, 12);
          $this->image_8_scfile_type = $this->image__ul_type8;
      }
      if (isset($this->image_8))
      {
          $GLOBALS['image_8']      = $this->image_8;
          $GLOBALS['image_8_scfile_name'] = $this->image_8_scfile_name;
          $GLOBALS['image_8_scfile_type'] = $this->image_8_scfile_type;
      }
      if (isset($this->NM_ajax_info['param']['image__ul_name9']) && '' != $this->NM_ajax_info['param']['image__ul_name9'])
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['upload_field_ul_name'][$this->image__ul_name9]))
          {
              $this->NM_ajax_info['param']['image__ul_name9'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['upload_field_ul_name'][$this->image__ul_name9];
          }
          $this->image_9      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->NM_ajax_info['param']['image__ul_name9'];
          $this->image_9_scfile_name = substr($this->NM_ajax_info['param']['image__ul_name9'], 12);
          $this->image_9_scfile_type = $this->NM_ajax_info['param']['image__ul_type9'];
      }
      elseif (isset($this->image__ul_name9) && '' != $this->image__ul_name9)
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['upload_field_ul_name'][$this->image__ul_name9]))
          {
              $this->image__ul_name9 = $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['upload_field_ul_name'][$this->image__ul_name9];
          }
          $this->image_9      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->image__ul_name9;
          $this->image_9_scfile_name = substr($this->image__ul_name9, 12);
          $this->image_9_scfile_type = $this->image__ul_type9;
      }
      if (isset($this->image_9))
      {
          $GLOBALS['image_9']      = $this->image_9;
          $GLOBALS['image_9_scfile_name'] = $this->image_9_scfile_name;
          $GLOBALS['image_9_scfile_type'] = $this->image_9_scfile_type;
      }
      if (isset($this->NM_ajax_info['param']['image__ul_name10']) && '' != $this->NM_ajax_info['param']['image__ul_name10'])
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['upload_field_ul_name'][$this->image__ul_name10]))
          {
              $this->NM_ajax_info['param']['image__ul_name10'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['upload_field_ul_name'][$this->image__ul_name10];
          }
          $this->image_10      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->NM_ajax_info['param']['image__ul_name10'];
          $this->image_10_scfile_name = substr($this->NM_ajax_info['param']['image__ul_name10'], 12);
          $this->image_10_scfile_type = $this->NM_ajax_info['param']['image__ul_type10'];
      }
      elseif (isset($this->image__ul_name10) && '' != $this->image__ul_name10)
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['upload_field_ul_name'][$this->image__ul_name10]))
          {
              $this->image__ul_name10 = $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['upload_field_ul_name'][$this->image__ul_name10];
          }
          $this->image_10      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->image__ul_name10;
          $this->image_10_scfile_name = substr($this->image__ul_name10, 12);
          $this->image_10_scfile_type = $this->image__ul_type10;
      }
      if (isset($this->image_10))
      {
          $GLOBALS['image_10']      = $this->image_10;
          $GLOBALS['image_10_scfile_name'] = $this->image_10_scfile_name;
          $GLOBALS['image_10_scfile_type'] = $this->image_10_scfile_type;
      }
      if (isset($this->NM_ajax_info['param']['image__ul_name11']) && '' != $this->NM_ajax_info['param']['image__ul_name11'])
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['upload_field_ul_name'][$this->image__ul_name11]))
          {
              $this->NM_ajax_info['param']['image__ul_name11'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['upload_field_ul_name'][$this->image__ul_name11];
          }
          $this->image_11      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->NM_ajax_info['param']['image__ul_name11'];
          $this->image_11_scfile_name = substr($this->NM_ajax_info['param']['image__ul_name11'], 12);
          $this->image_11_scfile_type = $this->NM_ajax_info['param']['image__ul_type11'];
      }
      elseif (isset($this->image__ul_name11) && '' != $this->image__ul_name11)
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['upload_field_ul_name'][$this->image__ul_name11]))
          {
              $this->image__ul_name11 = $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['upload_field_ul_name'][$this->image__ul_name11];
          }
          $this->image_11      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->image__ul_name11;
          $this->image_11_scfile_name = substr($this->image__ul_name11, 12);
          $this->image_11_scfile_type = $this->image__ul_type11;
      }
      if (isset($this->image_11))
      {
          $GLOBALS['image_11']      = $this->image_11;
          $GLOBALS['image_11_scfile_name'] = $this->image_11_scfile_name;
          $GLOBALS['image_11_scfile_type'] = $this->image_11_scfile_type;
      }
      if (isset($this->NM_ajax_info['param']['image__ul_name12']) && '' != $this->NM_ajax_info['param']['image__ul_name12'])
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['upload_field_ul_name'][$this->image__ul_name12]))
          {
              $this->NM_ajax_info['param']['image__ul_name12'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['upload_field_ul_name'][$this->image__ul_name12];
          }
          $this->image_12      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->NM_ajax_info['param']['image__ul_name12'];
          $this->image_12_scfile_name = substr($this->NM_ajax_info['param']['image__ul_name12'], 12);
          $this->image_12_scfile_type = $this->NM_ajax_info['param']['image__ul_type12'];
      }
      elseif (isset($this->image__ul_name12) && '' != $this->image__ul_name12)
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['upload_field_ul_name'][$this->image__ul_name12]))
          {
              $this->image__ul_name12 = $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['upload_field_ul_name'][$this->image__ul_name12];
          }
          $this->image_12      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->image__ul_name12;
          $this->image_12_scfile_name = substr($this->image__ul_name12, 12);
          $this->image_12_scfile_type = $this->image__ul_type12;
      }
      if (isset($this->image_12))
      {
          $GLOBALS['image_12']      = $this->image_12;
          $GLOBALS['image_12_scfile_name'] = $this->image_12_scfile_name;
          $GLOBALS['image_12_scfile_type'] = $this->image_12_scfile_type;
      }
      if (isset($this->NM_ajax_info['param']['image__ul_name13']) && '' != $this->NM_ajax_info['param']['image__ul_name13'])
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['upload_field_ul_name'][$this->image__ul_name13]))
          {
              $this->NM_ajax_info['param']['image__ul_name13'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['upload_field_ul_name'][$this->image__ul_name13];
          }
          $this->image_13      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->NM_ajax_info['param']['image__ul_name13'];
          $this->image_13_scfile_name = substr($this->NM_ajax_info['param']['image__ul_name13'], 12);
          $this->image_13_scfile_type = $this->NM_ajax_info['param']['image__ul_type13'];
      }
      elseif (isset($this->image__ul_name13) && '' != $this->image__ul_name13)
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['upload_field_ul_name'][$this->image__ul_name13]))
          {
              $this->image__ul_name13 = $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['upload_field_ul_name'][$this->image__ul_name13];
          }
          $this->image_13      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->image__ul_name13;
          $this->image_13_scfile_name = substr($this->image__ul_name13, 12);
          $this->image_13_scfile_type = $this->image__ul_type13;
      }
      if (isset($this->image_13))
      {
          $GLOBALS['image_13']      = $this->image_13;
          $GLOBALS['image_13_scfile_name'] = $this->image_13_scfile_name;
          $GLOBALS['image_13_scfile_type'] = $this->image_13_scfile_type;
      }
      if (isset($this->NM_ajax_info['param']['image__ul_name14']) && '' != $this->NM_ajax_info['param']['image__ul_name14'])
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['upload_field_ul_name'][$this->image__ul_name14]))
          {
              $this->NM_ajax_info['param']['image__ul_name14'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['upload_field_ul_name'][$this->image__ul_name14];
          }
          $this->image_14      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->NM_ajax_info['param']['image__ul_name14'];
          $this->image_14_scfile_name = substr($this->NM_ajax_info['param']['image__ul_name14'], 12);
          $this->image_14_scfile_type = $this->NM_ajax_info['param']['image__ul_type14'];
      }
      elseif (isset($this->image__ul_name14) && '' != $this->image__ul_name14)
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['upload_field_ul_name'][$this->image__ul_name14]))
          {
              $this->image__ul_name14 = $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['upload_field_ul_name'][$this->image__ul_name14];
          }
          $this->image_14      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->image__ul_name14;
          $this->image_14_scfile_name = substr($this->image__ul_name14, 12);
          $this->image_14_scfile_type = $this->image__ul_type14;
      }
      if (isset($this->image_14))
      {
          $GLOBALS['image_14']      = $this->image_14;
          $GLOBALS['image_14_scfile_name'] = $this->image_14_scfile_name;
          $GLOBALS['image_14_scfile_type'] = $this->image_14_scfile_type;
      }
      if (isset($this->NM_ajax_info['param']['image__ul_name15']) && '' != $this->NM_ajax_info['param']['image__ul_name15'])
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['upload_field_ul_name'][$this->image__ul_name15]))
          {
              $this->NM_ajax_info['param']['image__ul_name15'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['upload_field_ul_name'][$this->image__ul_name15];
          }
          $this->image_15      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->NM_ajax_info['param']['image__ul_name15'];
          $this->image_15_scfile_name = substr($this->NM_ajax_info['param']['image__ul_name15'], 12);
          $this->image_15_scfile_type = $this->NM_ajax_info['param']['image__ul_type15'];
      }
      elseif (isset($this->image__ul_name15) && '' != $this->image__ul_name15)
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['upload_field_ul_name'][$this->image__ul_name15]))
          {
              $this->image__ul_name15 = $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['upload_field_ul_name'][$this->image__ul_name15];
          }
          $this->image_15      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->image__ul_name15;
          $this->image_15_scfile_name = substr($this->image__ul_name15, 12);
          $this->image_15_scfile_type = $this->image__ul_type15;
      }
      if (isset($this->image_15))
      {
          $GLOBALS['image_15']      = $this->image_15;
          $GLOBALS['image_15_scfile_name'] = $this->image_15_scfile_name;
          $GLOBALS['image_15_scfile_type'] = $this->image_15_scfile_type;
      }
      if (isset($this->NM_ajax_info['param']['image__ul_name16']) && '' != $this->NM_ajax_info['param']['image__ul_name16'])
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['upload_field_ul_name'][$this->image__ul_name16]))
          {
              $this->NM_ajax_info['param']['image__ul_name16'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['upload_field_ul_name'][$this->image__ul_name16];
          }
          $this->image_16      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->NM_ajax_info['param']['image__ul_name16'];
          $this->image_16_scfile_name = substr($this->NM_ajax_info['param']['image__ul_name16'], 12);
          $this->image_16_scfile_type = $this->NM_ajax_info['param']['image__ul_type16'];
      }
      elseif (isset($this->image__ul_name16) && '' != $this->image__ul_name16)
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['upload_field_ul_name'][$this->image__ul_name16]))
          {
              $this->image__ul_name16 = $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['upload_field_ul_name'][$this->image__ul_name16];
          }
          $this->image_16      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->image__ul_name16;
          $this->image_16_scfile_name = substr($this->image__ul_name16, 12);
          $this->image_16_scfile_type = $this->image__ul_type16;
      }
      if (isset($this->image_16))
      {
          $GLOBALS['image_16']      = $this->image_16;
          $GLOBALS['image_16_scfile_name'] = $this->image_16_scfile_name;
          $GLOBALS['image_16_scfile_type'] = $this->image_16_scfile_type;
      }
      if (isset($this->NM_ajax_info['param']['image__ul_name17']) && '' != $this->NM_ajax_info['param']['image__ul_name17'])
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['upload_field_ul_name'][$this->image__ul_name17]))
          {
              $this->NM_ajax_info['param']['image__ul_name17'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['upload_field_ul_name'][$this->image__ul_name17];
          }
          $this->image_17      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->NM_ajax_info['param']['image__ul_name17'];
          $this->image_17_scfile_name = substr($this->NM_ajax_info['param']['image__ul_name17'], 12);
          $this->image_17_scfile_type = $this->NM_ajax_info['param']['image__ul_type17'];
      }
      elseif (isset($this->image__ul_name17) && '' != $this->image__ul_name17)
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['upload_field_ul_name'][$this->image__ul_name17]))
          {
              $this->image__ul_name17 = $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['upload_field_ul_name'][$this->image__ul_name17];
          }
          $this->image_17      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->image__ul_name17;
          $this->image_17_scfile_name = substr($this->image__ul_name17, 12);
          $this->image_17_scfile_type = $this->image__ul_type17;
      }
      if (isset($this->image_17))
      {
          $GLOBALS['image_17']      = $this->image_17;
          $GLOBALS['image_17_scfile_name'] = $this->image_17_scfile_name;
          $GLOBALS['image_17_scfile_type'] = $this->image_17_scfile_type;
      }
      if (isset($this->NM_ajax_info['param']['image__ul_name18']) && '' != $this->NM_ajax_info['param']['image__ul_name18'])
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['upload_field_ul_name'][$this->image__ul_name18]))
          {
              $this->NM_ajax_info['param']['image__ul_name18'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['upload_field_ul_name'][$this->image__ul_name18];
          }
          $this->image_18      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->NM_ajax_info['param']['image__ul_name18'];
          $this->image_18_scfile_name = substr($this->NM_ajax_info['param']['image__ul_name18'], 12);
          $this->image_18_scfile_type = $this->NM_ajax_info['param']['image__ul_type18'];
      }
      elseif (isset($this->image__ul_name18) && '' != $this->image__ul_name18)
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['upload_field_ul_name'][$this->image__ul_name18]))
          {
              $this->image__ul_name18 = $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['upload_field_ul_name'][$this->image__ul_name18];
          }
          $this->image_18      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->image__ul_name18;
          $this->image_18_scfile_name = substr($this->image__ul_name18, 12);
          $this->image_18_scfile_type = $this->image__ul_type18;
      }
      if (isset($this->image_18))
      {
          $GLOBALS['image_18']      = $this->image_18;
          $GLOBALS['image_18_scfile_name'] = $this->image_18_scfile_name;
          $GLOBALS['image_18_scfile_type'] = $this->image_18_scfile_type;
      }
      if (isset($this->NM_ajax_info['param']['image__ul_name19']) && '' != $this->NM_ajax_info['param']['image__ul_name19'])
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['upload_field_ul_name'][$this->image__ul_name19]))
          {
              $this->NM_ajax_info['param']['image__ul_name19'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['upload_field_ul_name'][$this->image__ul_name19];
          }
          $this->image_19      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->NM_ajax_info['param']['image__ul_name19'];
          $this->image_19_scfile_name = substr($this->NM_ajax_info['param']['image__ul_name19'], 12);
          $this->image_19_scfile_type = $this->NM_ajax_info['param']['image__ul_type19'];
      }
      elseif (isset($this->image__ul_name19) && '' != $this->image__ul_name19)
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['upload_field_ul_name'][$this->image__ul_name19]))
          {
              $this->image__ul_name19 = $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['upload_field_ul_name'][$this->image__ul_name19];
          }
          $this->image_19      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->image__ul_name19;
          $this->image_19_scfile_name = substr($this->image__ul_name19, 12);
          $this->image_19_scfile_type = $this->image__ul_type19;
      }
      if (isset($this->image_19))
      {
          $GLOBALS['image_19']      = $this->image_19;
          $GLOBALS['image_19_scfile_name'] = $this->image_19_scfile_name;
          $GLOBALS['image_19_scfile_type'] = $this->image_19_scfile_type;
      }
      if (isset($this->NM_ajax_info['param']['image__ul_name20']) && '' != $this->NM_ajax_info['param']['image__ul_name20'])
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['upload_field_ul_name'][$this->image__ul_name20]))
          {
              $this->NM_ajax_info['param']['image__ul_name20'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['upload_field_ul_name'][$this->image__ul_name20];
          }
          $this->image_20      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->NM_ajax_info['param']['image__ul_name20'];
          $this->image_20_scfile_name = substr($this->NM_ajax_info['param']['image__ul_name20'], 12);
          $this->image_20_scfile_type = $this->NM_ajax_info['param']['image__ul_type20'];
      }
      elseif (isset($this->image__ul_name20) && '' != $this->image__ul_name20)
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['upload_field_ul_name'][$this->image__ul_name20]))
          {
              $this->image__ul_name20 = $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['upload_field_ul_name'][$this->image__ul_name20];
          }
          $this->image_20      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->image__ul_name20;
          $this->image_20_scfile_name = substr($this->image__ul_name20, 12);
          $this->image_20_scfile_type = $this->image__ul_type20;
      }
      if (isset($this->image_20))
      {
          $GLOBALS['image_20']      = $this->image_20;
          $GLOBALS['image_20_scfile_name'] = $this->image_20_scfile_name;
          $GLOBALS['image_20_scfile_type'] = $this->image_20_scfile_type;
      }
      if (isset($this->NM_ajax_info['param']['image__ul_name21']) && '' != $this->NM_ajax_info['param']['image__ul_name21'])
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['upload_field_ul_name'][$this->image__ul_name21]))
          {
              $this->NM_ajax_info['param']['image__ul_name21'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['upload_field_ul_name'][$this->image__ul_name21];
          }
          $this->image_21      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->NM_ajax_info['param']['image__ul_name21'];
          $this->image_21_scfile_name = substr($this->NM_ajax_info['param']['image__ul_name21'], 12);
          $this->image_21_scfile_type = $this->NM_ajax_info['param']['image__ul_type21'];
      }
      elseif (isset($this->image__ul_name21) && '' != $this->image__ul_name21)
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['upload_field_ul_name'][$this->image__ul_name21]))
          {
              $this->image__ul_name21 = $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['upload_field_ul_name'][$this->image__ul_name21];
          }
          $this->image_21      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->image__ul_name21;
          $this->image_21_scfile_name = substr($this->image__ul_name21, 12);
          $this->image_21_scfile_type = $this->image__ul_type21;
      }
      if (isset($this->image_21))
      {
          $GLOBALS['image_21']      = $this->image_21;
          $GLOBALS['image_21_scfile_name'] = $this->image_21_scfile_name;
          $GLOBALS['image_21_scfile_type'] = $this->image_21_scfile_type;
      }
      if (isset($this->NM_ajax_info['param']['image__ul_name22']) && '' != $this->NM_ajax_info['param']['image__ul_name22'])
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['upload_field_ul_name'][$this->image__ul_name22]))
          {
              $this->NM_ajax_info['param']['image__ul_name22'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['upload_field_ul_name'][$this->image__ul_name22];
          }
          $this->image_22      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->NM_ajax_info['param']['image__ul_name22'];
          $this->image_22_scfile_name = substr($this->NM_ajax_info['param']['image__ul_name22'], 12);
          $this->image_22_scfile_type = $this->NM_ajax_info['param']['image__ul_type22'];
      }
      elseif (isset($this->image__ul_name22) && '' != $this->image__ul_name22)
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['upload_field_ul_name'][$this->image__ul_name22]))
          {
              $this->image__ul_name22 = $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['upload_field_ul_name'][$this->image__ul_name22];
          }
          $this->image_22      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->image__ul_name22;
          $this->image_22_scfile_name = substr($this->image__ul_name22, 12);
          $this->image_22_scfile_type = $this->image__ul_type22;
      }
      if (isset($this->image_22))
      {
          $GLOBALS['image_22']      = $this->image_22;
          $GLOBALS['image_22_scfile_name'] = $this->image_22_scfile_name;
          $GLOBALS['image_22_scfile_type'] = $this->image_22_scfile_type;
      }
      if (isset($this->NM_ajax_info['param']['image__ul_name23']) && '' != $this->NM_ajax_info['param']['image__ul_name23'])
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['upload_field_ul_name'][$this->image__ul_name23]))
          {
              $this->NM_ajax_info['param']['image__ul_name23'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['upload_field_ul_name'][$this->image__ul_name23];
          }
          $this->image_23      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->NM_ajax_info['param']['image__ul_name23'];
          $this->image_23_scfile_name = substr($this->NM_ajax_info['param']['image__ul_name23'], 12);
          $this->image_23_scfile_type = $this->NM_ajax_info['param']['image__ul_type23'];
      }
      elseif (isset($this->image__ul_name23) && '' != $this->image__ul_name23)
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['upload_field_ul_name'][$this->image__ul_name23]))
          {
              $this->image__ul_name23 = $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['upload_field_ul_name'][$this->image__ul_name23];
          }
          $this->image_23      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->image__ul_name23;
          $this->image_23_scfile_name = substr($this->image__ul_name23, 12);
          $this->image_23_scfile_type = $this->image__ul_type23;
      }
      if (isset($this->image_23))
      {
          $GLOBALS['image_23']      = $this->image_23;
          $GLOBALS['image_23_scfile_name'] = $this->image_23_scfile_name;
          $GLOBALS['image_23_scfile_type'] = $this->image_23_scfile_type;
      }
      if (isset($this->NM_ajax_info['param']['image__ul_name24']) && '' != $this->NM_ajax_info['param']['image__ul_name24'])
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['upload_field_ul_name'][$this->image__ul_name24]))
          {
              $this->NM_ajax_info['param']['image__ul_name24'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['upload_field_ul_name'][$this->image__ul_name24];
          }
          $this->image_24      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->NM_ajax_info['param']['image__ul_name24'];
          $this->image_24_scfile_name = substr($this->NM_ajax_info['param']['image__ul_name24'], 12);
          $this->image_24_scfile_type = $this->NM_ajax_info['param']['image__ul_type24'];
      }
      elseif (isset($this->image__ul_name24) && '' != $this->image__ul_name24)
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['upload_field_ul_name'][$this->image__ul_name24]))
          {
              $this->image__ul_name24 = $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['upload_field_ul_name'][$this->image__ul_name24];
          }
          $this->image_24      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->image__ul_name24;
          $this->image_24_scfile_name = substr($this->image__ul_name24, 12);
          $this->image_24_scfile_type = $this->image__ul_type24;
      }
      if (isset($this->image_24))
      {
          $GLOBALS['image_24']      = $this->image_24;
          $GLOBALS['image_24_scfile_name'] = $this->image_24_scfile_name;
          $GLOBALS['image_24_scfile_type'] = $this->image_24_scfile_type;
      }
      if (isset($this->NM_ajax_info['param']['image__ul_name25']) && '' != $this->NM_ajax_info['param']['image__ul_name25'])
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['upload_field_ul_name'][$this->image__ul_name25]))
          {
              $this->NM_ajax_info['param']['image__ul_name25'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['upload_field_ul_name'][$this->image__ul_name25];
          }
          $this->image_25      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->NM_ajax_info['param']['image__ul_name25'];
          $this->image_25_scfile_name = substr($this->NM_ajax_info['param']['image__ul_name25'], 12);
          $this->image_25_scfile_type = $this->NM_ajax_info['param']['image__ul_type25'];
      }
      elseif (isset($this->image__ul_name25) && '' != $this->image__ul_name25)
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['upload_field_ul_name'][$this->image__ul_name25]))
          {
              $this->image__ul_name25 = $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['upload_field_ul_name'][$this->image__ul_name25];
          }
          $this->image_25      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->image__ul_name25;
          $this->image_25_scfile_name = substr($this->image__ul_name25, 12);
          $this->image_25_scfile_type = $this->image__ul_type25;
      }
      if (isset($this->image_25))
      {
          $GLOBALS['image_25']      = $this->image_25;
          $GLOBALS['image_25_scfile_name'] = $this->image_25_scfile_name;
          $GLOBALS['image_25_scfile_type'] = $this->image_25_scfile_type;
      }
      if (isset($this->NM_ajax_info['param']['image__ul_name26']) && '' != $this->NM_ajax_info['param']['image__ul_name26'])
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['upload_field_ul_name'][$this->image__ul_name26]))
          {
              $this->NM_ajax_info['param']['image__ul_name26'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['upload_field_ul_name'][$this->image__ul_name26];
          }
          $this->image_26      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->NM_ajax_info['param']['image__ul_name26'];
          $this->image_26_scfile_name = substr($this->NM_ajax_info['param']['image__ul_name26'], 12);
          $this->image_26_scfile_type = $this->NM_ajax_info['param']['image__ul_type26'];
      }
      elseif (isset($this->image__ul_name26) && '' != $this->image__ul_name26)
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['upload_field_ul_name'][$this->image__ul_name26]))
          {
              $this->image__ul_name26 = $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['upload_field_ul_name'][$this->image__ul_name26];
          }
          $this->image_26      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->image__ul_name26;
          $this->image_26_scfile_name = substr($this->image__ul_name26, 12);
          $this->image_26_scfile_type = $this->image__ul_type26;
      }
      if (isset($this->image_26))
      {
          $GLOBALS['image_26']      = $this->image_26;
          $GLOBALS['image_26_scfile_name'] = $this->image_26_scfile_name;
          $GLOBALS['image_26_scfile_type'] = $this->image_26_scfile_type;
      }
      if (isset($this->NM_ajax_info['param']['image__ul_name27']) && '' != $this->NM_ajax_info['param']['image__ul_name27'])
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['upload_field_ul_name'][$this->image__ul_name27]))
          {
              $this->NM_ajax_info['param']['image__ul_name27'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['upload_field_ul_name'][$this->image__ul_name27];
          }
          $this->image_27      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->NM_ajax_info['param']['image__ul_name27'];
          $this->image_27_scfile_name = substr($this->NM_ajax_info['param']['image__ul_name27'], 12);
          $this->image_27_scfile_type = $this->NM_ajax_info['param']['image__ul_type27'];
      }
      elseif (isset($this->image__ul_name27) && '' != $this->image__ul_name27)
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['upload_field_ul_name'][$this->image__ul_name27]))
          {
              $this->image__ul_name27 = $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['upload_field_ul_name'][$this->image__ul_name27];
          }
          $this->image_27      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->image__ul_name27;
          $this->image_27_scfile_name = substr($this->image__ul_name27, 12);
          $this->image_27_scfile_type = $this->image__ul_type27;
      }
      if (isset($this->image_27))
      {
          $GLOBALS['image_27']      = $this->image_27;
          $GLOBALS['image_27_scfile_name'] = $this->image_27_scfile_name;
          $GLOBALS['image_27_scfile_type'] = $this->image_27_scfile_type;
      }
      if (isset($this->NM_ajax_info['param']['image__ul_name28']) && '' != $this->NM_ajax_info['param']['image__ul_name28'])
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['upload_field_ul_name'][$this->image__ul_name28]))
          {
              $this->NM_ajax_info['param']['image__ul_name28'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['upload_field_ul_name'][$this->image__ul_name28];
          }
          $this->image_28      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->NM_ajax_info['param']['image__ul_name28'];
          $this->image_28_scfile_name = substr($this->NM_ajax_info['param']['image__ul_name28'], 12);
          $this->image_28_scfile_type = $this->NM_ajax_info['param']['image__ul_type28'];
      }
      elseif (isset($this->image__ul_name28) && '' != $this->image__ul_name28)
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['upload_field_ul_name'][$this->image__ul_name28]))
          {
              $this->image__ul_name28 = $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['upload_field_ul_name'][$this->image__ul_name28];
          }
          $this->image_28      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->image__ul_name28;
          $this->image_28_scfile_name = substr($this->image__ul_name28, 12);
          $this->image_28_scfile_type = $this->image__ul_type28;
      }
      if (isset($this->image_28))
      {
          $GLOBALS['image_28']      = $this->image_28;
          $GLOBALS['image_28_scfile_name'] = $this->image_28_scfile_name;
          $GLOBALS['image_28_scfile_type'] = $this->image_28_scfile_type;
      }
      if (isset($this->NM_ajax_info['param']['image__ul_name29']) && '' != $this->NM_ajax_info['param']['image__ul_name29'])
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['upload_field_ul_name'][$this->image__ul_name29]))
          {
              $this->NM_ajax_info['param']['image__ul_name29'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['upload_field_ul_name'][$this->image__ul_name29];
          }
          $this->image_29      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->NM_ajax_info['param']['image__ul_name29'];
          $this->image_29_scfile_name = substr($this->NM_ajax_info['param']['image__ul_name29'], 12);
          $this->image_29_scfile_type = $this->NM_ajax_info['param']['image__ul_type29'];
      }
      elseif (isset($this->image__ul_name29) && '' != $this->image__ul_name29)
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['upload_field_ul_name'][$this->image__ul_name29]))
          {
              $this->image__ul_name29 = $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['upload_field_ul_name'][$this->image__ul_name29];
          }
          $this->image_29      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->image__ul_name29;
          $this->image_29_scfile_name = substr($this->image__ul_name29, 12);
          $this->image_29_scfile_type = $this->image__ul_type29;
      }
      if (isset($this->image_29))
      {
          $GLOBALS['image_29']      = $this->image_29;
          $GLOBALS['image_29_scfile_name'] = $this->image_29_scfile_name;
          $GLOBALS['image_29_scfile_type'] = $this->image_29_scfile_type;
      }
      if (isset($this->NM_ajax_info['param']['image__ul_name30']) && '' != $this->NM_ajax_info['param']['image__ul_name30'])
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['upload_field_ul_name'][$this->image__ul_name30]))
          {
              $this->NM_ajax_info['param']['image__ul_name30'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['upload_field_ul_name'][$this->image__ul_name30];
          }
          $this->image_30      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->NM_ajax_info['param']['image__ul_name30'];
          $this->image_30_scfile_name = substr($this->NM_ajax_info['param']['image__ul_name30'], 12);
          $this->image_30_scfile_type = $this->NM_ajax_info['param']['image__ul_type30'];
      }
      elseif (isset($this->image__ul_name30) && '' != $this->image__ul_name30)
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['upload_field_ul_name'][$this->image__ul_name30]))
          {
              $this->image__ul_name30 = $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['upload_field_ul_name'][$this->image__ul_name30];
          }
          $this->image_30      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->image__ul_name30;
          $this->image_30_scfile_name = substr($this->image__ul_name30, 12);
          $this->image_30_scfile_type = $this->image__ul_type30;
      }
      if (isset($this->image_30))
      {
          $GLOBALS['image_30']      = $this->image_30;
          $GLOBALS['image_30_scfile_name'] = $this->image_30_scfile_name;
          $GLOBALS['image_30_scfile_type'] = $this->image_30_scfile_type;
      }
      if (isset($this->NM_ajax_info['param']['image__ul_name31']) && '' != $this->NM_ajax_info['param']['image__ul_name31'])
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['upload_field_ul_name'][$this->image__ul_name31]))
          {
              $this->NM_ajax_info['param']['image__ul_name31'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['upload_field_ul_name'][$this->image__ul_name31];
          }
          $this->image_31      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->NM_ajax_info['param']['image__ul_name31'];
          $this->image_31_scfile_name = substr($this->NM_ajax_info['param']['image__ul_name31'], 12);
          $this->image_31_scfile_type = $this->NM_ajax_info['param']['image__ul_type31'];
      }
      elseif (isset($this->image__ul_name31) && '' != $this->image__ul_name31)
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['upload_field_ul_name'][$this->image__ul_name31]))
          {
              $this->image__ul_name31 = $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['upload_field_ul_name'][$this->image__ul_name31];
          }
          $this->image_31      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->image__ul_name31;
          $this->image_31_scfile_name = substr($this->image__ul_name31, 12);
          $this->image_31_scfile_type = $this->image__ul_type31;
      }
      if (isset($this->image_31))
      {
          $GLOBALS['image_31']      = $this->image_31;
          $GLOBALS['image_31_scfile_name'] = $this->image_31_scfile_name;
          $GLOBALS['image_31_scfile_type'] = $this->image_31_scfile_type;
      }
      if (isset($this->NM_ajax_info['param']['image__ul_name32']) && '' != $this->NM_ajax_info['param']['image__ul_name32'])
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['upload_field_ul_name'][$this->image__ul_name32]))
          {
              $this->NM_ajax_info['param']['image__ul_name32'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['upload_field_ul_name'][$this->image__ul_name32];
          }
          $this->image_32      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->NM_ajax_info['param']['image__ul_name32'];
          $this->image_32_scfile_name = substr($this->NM_ajax_info['param']['image__ul_name32'], 12);
          $this->image_32_scfile_type = $this->NM_ajax_info['param']['image__ul_type32'];
      }
      elseif (isset($this->image__ul_name32) && '' != $this->image__ul_name32)
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['upload_field_ul_name'][$this->image__ul_name32]))
          {
              $this->image__ul_name32 = $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['upload_field_ul_name'][$this->image__ul_name32];
          }
          $this->image_32      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->image__ul_name32;
          $this->image_32_scfile_name = substr($this->image__ul_name32, 12);
          $this->image_32_scfile_type = $this->image__ul_type32;
      }
      if (isset($this->image_32))
      {
          $GLOBALS['image_32']      = $this->image_32;
          $GLOBALS['image_32_scfile_name'] = $this->image_32_scfile_name;
          $GLOBALS['image_32_scfile_type'] = $this->image_32_scfile_type;
      }
      if (isset($this->NM_ajax_info['param']['image__ul_name33']) && '' != $this->NM_ajax_info['param']['image__ul_name33'])
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['upload_field_ul_name'][$this->image__ul_name33]))
          {
              $this->NM_ajax_info['param']['image__ul_name33'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['upload_field_ul_name'][$this->image__ul_name33];
          }
          $this->image_33      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->NM_ajax_info['param']['image__ul_name33'];
          $this->image_33_scfile_name = substr($this->NM_ajax_info['param']['image__ul_name33'], 12);
          $this->image_33_scfile_type = $this->NM_ajax_info['param']['image__ul_type33'];
      }
      elseif (isset($this->image__ul_name33) && '' != $this->image__ul_name33)
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['upload_field_ul_name'][$this->image__ul_name33]))
          {
              $this->image__ul_name33 = $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['upload_field_ul_name'][$this->image__ul_name33];
          }
          $this->image_33      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->image__ul_name33;
          $this->image_33_scfile_name = substr($this->image__ul_name33, 12);
          $this->image_33_scfile_type = $this->image__ul_type33;
      }
      if (isset($this->image_33))
      {
          $GLOBALS['image_33']      = $this->image_33;
          $GLOBALS['image_33_scfile_name'] = $this->image_33_scfile_name;
          $GLOBALS['image_33_scfile_type'] = $this->image_33_scfile_type;
      }
      if (isset($this->NM_ajax_info['param']['image__ul_name34']) && '' != $this->NM_ajax_info['param']['image__ul_name34'])
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['upload_field_ul_name'][$this->image__ul_name34]))
          {
              $this->NM_ajax_info['param']['image__ul_name34'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['upload_field_ul_name'][$this->image__ul_name34];
          }
          $this->image_34      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->NM_ajax_info['param']['image__ul_name34'];
          $this->image_34_scfile_name = substr($this->NM_ajax_info['param']['image__ul_name34'], 12);
          $this->image_34_scfile_type = $this->NM_ajax_info['param']['image__ul_type34'];
      }
      elseif (isset($this->image__ul_name34) && '' != $this->image__ul_name34)
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['upload_field_ul_name'][$this->image__ul_name34]))
          {
              $this->image__ul_name34 = $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['upload_field_ul_name'][$this->image__ul_name34];
          }
          $this->image_34      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->image__ul_name34;
          $this->image_34_scfile_name = substr($this->image__ul_name34, 12);
          $this->image_34_scfile_type = $this->image__ul_type34;
      }
      if (isset($this->image_34))
      {
          $GLOBALS['image_34']      = $this->image_34;
          $GLOBALS['image_34_scfile_name'] = $this->image_34_scfile_name;
          $GLOBALS['image_34_scfile_type'] = $this->image_34_scfile_type;
      }
      if (isset($this->NM_ajax_info['param']['image__ul_name35']) && '' != $this->NM_ajax_info['param']['image__ul_name35'])
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['upload_field_ul_name'][$this->image__ul_name35]))
          {
              $this->NM_ajax_info['param']['image__ul_name35'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['upload_field_ul_name'][$this->image__ul_name35];
          }
          $this->image_35      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->NM_ajax_info['param']['image__ul_name35'];
          $this->image_35_scfile_name = substr($this->NM_ajax_info['param']['image__ul_name35'], 12);
          $this->image_35_scfile_type = $this->NM_ajax_info['param']['image__ul_type35'];
      }
      elseif (isset($this->image__ul_name35) && '' != $this->image__ul_name35)
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['upload_field_ul_name'][$this->image__ul_name35]))
          {
              $this->image__ul_name35 = $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['upload_field_ul_name'][$this->image__ul_name35];
          }
          $this->image_35      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->image__ul_name35;
          $this->image_35_scfile_name = substr($this->image__ul_name35, 12);
          $this->image_35_scfile_type = $this->image__ul_type35;
      }
      if (isset($this->image_35))
      {
          $GLOBALS['image_35']      = $this->image_35;
          $GLOBALS['image_35_scfile_name'] = $this->image_35_scfile_name;
          $GLOBALS['image_35_scfile_type'] = $this->image_35_scfile_type;
      }
      if (isset($this->NM_ajax_info['param']['image__ul_name36']) && '' != $this->NM_ajax_info['param']['image__ul_name36'])
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['upload_field_ul_name'][$this->image__ul_name36]))
          {
              $this->NM_ajax_info['param']['image__ul_name36'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['upload_field_ul_name'][$this->image__ul_name36];
          }
          $this->image_36      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->NM_ajax_info['param']['image__ul_name36'];
          $this->image_36_scfile_name = substr($this->NM_ajax_info['param']['image__ul_name36'], 12);
          $this->image_36_scfile_type = $this->NM_ajax_info['param']['image__ul_type36'];
      }
      elseif (isset($this->image__ul_name36) && '' != $this->image__ul_name36)
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['upload_field_ul_name'][$this->image__ul_name36]))
          {
              $this->image__ul_name36 = $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['upload_field_ul_name'][$this->image__ul_name36];
          }
          $this->image_36      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->image__ul_name36;
          $this->image_36_scfile_name = substr($this->image__ul_name36, 12);
          $this->image_36_scfile_type = $this->image__ul_type36;
      }
      if (isset($this->image_36))
      {
          $GLOBALS['image_36']      = $this->image_36;
          $GLOBALS['image_36_scfile_name'] = $this->image_36_scfile_name;
          $GLOBALS['image_36_scfile_type'] = $this->image_36_scfile_type;
      }
      if (isset($this->NM_ajax_info['param']['image__ul_name37']) && '' != $this->NM_ajax_info['param']['image__ul_name37'])
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['upload_field_ul_name'][$this->image__ul_name37]))
          {
              $this->NM_ajax_info['param']['image__ul_name37'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['upload_field_ul_name'][$this->image__ul_name37];
          }
          $this->image_37      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->NM_ajax_info['param']['image__ul_name37'];
          $this->image_37_scfile_name = substr($this->NM_ajax_info['param']['image__ul_name37'], 12);
          $this->image_37_scfile_type = $this->NM_ajax_info['param']['image__ul_type37'];
      }
      elseif (isset($this->image__ul_name37) && '' != $this->image__ul_name37)
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['upload_field_ul_name'][$this->image__ul_name37]))
          {
              $this->image__ul_name37 = $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['upload_field_ul_name'][$this->image__ul_name37];
          }
          $this->image_37      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->image__ul_name37;
          $this->image_37_scfile_name = substr($this->image__ul_name37, 12);
          $this->image_37_scfile_type = $this->image__ul_type37;
      }
      if (isset($this->image_37))
      {
          $GLOBALS['image_37']      = $this->image_37;
          $GLOBALS['image_37_scfile_name'] = $this->image_37_scfile_name;
          $GLOBALS['image_37_scfile_type'] = $this->image_37_scfile_type;
      }
      if (isset($this->NM_ajax_info['param']['image__ul_name38']) && '' != $this->NM_ajax_info['param']['image__ul_name38'])
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['upload_field_ul_name'][$this->image__ul_name38]))
          {
              $this->NM_ajax_info['param']['image__ul_name38'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['upload_field_ul_name'][$this->image__ul_name38];
          }
          $this->image_38      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->NM_ajax_info['param']['image__ul_name38'];
          $this->image_38_scfile_name = substr($this->NM_ajax_info['param']['image__ul_name38'], 12);
          $this->image_38_scfile_type = $this->NM_ajax_info['param']['image__ul_type38'];
      }
      elseif (isset($this->image__ul_name38) && '' != $this->image__ul_name38)
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['upload_field_ul_name'][$this->image__ul_name38]))
          {
              $this->image__ul_name38 = $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['upload_field_ul_name'][$this->image__ul_name38];
          }
          $this->image_38      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->image__ul_name38;
          $this->image_38_scfile_name = substr($this->image__ul_name38, 12);
          $this->image_38_scfile_type = $this->image__ul_type38;
      }
      if (isset($this->image_38))
      {
          $GLOBALS['image_38']      = $this->image_38;
          $GLOBALS['image_38_scfile_name'] = $this->image_38_scfile_name;
          $GLOBALS['image_38_scfile_type'] = $this->image_38_scfile_type;
      }
      if (isset($this->NM_ajax_info['param']['image__ul_name39']) && '' != $this->NM_ajax_info['param']['image__ul_name39'])
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['upload_field_ul_name'][$this->image__ul_name39]))
          {
              $this->NM_ajax_info['param']['image__ul_name39'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['upload_field_ul_name'][$this->image__ul_name39];
          }
          $this->image_39      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->NM_ajax_info['param']['image__ul_name39'];
          $this->image_39_scfile_name = substr($this->NM_ajax_info['param']['image__ul_name39'], 12);
          $this->image_39_scfile_type = $this->NM_ajax_info['param']['image__ul_type39'];
      }
      elseif (isset($this->image__ul_name39) && '' != $this->image__ul_name39)
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['upload_field_ul_name'][$this->image__ul_name39]))
          {
              $this->image__ul_name39 = $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['upload_field_ul_name'][$this->image__ul_name39];
          }
          $this->image_39      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->image__ul_name39;
          $this->image_39_scfile_name = substr($this->image__ul_name39, 12);
          $this->image_39_scfile_type = $this->image__ul_type39;
      }
      if (isset($this->image_39))
      {
          $GLOBALS['image_39']      = $this->image_39;
          $GLOBALS['image_39_scfile_name'] = $this->image_39_scfile_name;
          $GLOBALS['image_39_scfile_type'] = $this->image_39_scfile_type;
      }
      if (isset($this->NM_ajax_info['param']['image__ul_name40']) && '' != $this->NM_ajax_info['param']['image__ul_name40'])
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['upload_field_ul_name'][$this->image__ul_name40]))
          {
              $this->NM_ajax_info['param']['image__ul_name40'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['upload_field_ul_name'][$this->image__ul_name40];
          }
          $this->image_40      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->NM_ajax_info['param']['image__ul_name40'];
          $this->image_40_scfile_name = substr($this->NM_ajax_info['param']['image__ul_name40'], 12);
          $this->image_40_scfile_type = $this->NM_ajax_info['param']['image__ul_type40'];
      }
      elseif (isset($this->image__ul_name40) && '' != $this->image__ul_name40)
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['upload_field_ul_name'][$this->image__ul_name40]))
          {
              $this->image__ul_name40 = $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['upload_field_ul_name'][$this->image__ul_name40];
          }
          $this->image_40      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->image__ul_name40;
          $this->image_40_scfile_name = substr($this->image__ul_name40, 12);
          $this->image_40_scfile_type = $this->image__ul_type40;
      }
      if (isset($this->image_40))
      {
          $GLOBALS['image_40']      = $this->image_40;
          $GLOBALS['image_40_scfile_name'] = $this->image_40_scfile_name;
          $GLOBALS['image_40_scfile_type'] = $this->image_40_scfile_type;
      }
      if (isset($this->NM_ajax_info['param']['image__ul_name41']) && '' != $this->NM_ajax_info['param']['image__ul_name41'])
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['upload_field_ul_name'][$this->image__ul_name41]))
          {
              $this->NM_ajax_info['param']['image__ul_name41'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['upload_field_ul_name'][$this->image__ul_name41];
          }
          $this->image_41      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->NM_ajax_info['param']['image__ul_name41'];
          $this->image_41_scfile_name = substr($this->NM_ajax_info['param']['image__ul_name41'], 12);
          $this->image_41_scfile_type = $this->NM_ajax_info['param']['image__ul_type41'];
      }
      elseif (isset($this->image__ul_name41) && '' != $this->image__ul_name41)
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['upload_field_ul_name'][$this->image__ul_name41]))
          {
              $this->image__ul_name41 = $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['upload_field_ul_name'][$this->image__ul_name41];
          }
          $this->image_41      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->image__ul_name41;
          $this->image_41_scfile_name = substr($this->image__ul_name41, 12);
          $this->image_41_scfile_type = $this->image__ul_type41;
      }
      if (isset($this->image_41))
      {
          $GLOBALS['image_41']      = $this->image_41;
          $GLOBALS['image_41_scfile_name'] = $this->image_41_scfile_name;
          $GLOBALS['image_41_scfile_type'] = $this->image_41_scfile_type;
      }
      if (isset($this->NM_ajax_info['param']['image__ul_name42']) && '' != $this->NM_ajax_info['param']['image__ul_name42'])
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['upload_field_ul_name'][$this->image__ul_name42]))
          {
              $this->NM_ajax_info['param']['image__ul_name42'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['upload_field_ul_name'][$this->image__ul_name42];
          }
          $this->image_42      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->NM_ajax_info['param']['image__ul_name42'];
          $this->image_42_scfile_name = substr($this->NM_ajax_info['param']['image__ul_name42'], 12);
          $this->image_42_scfile_type = $this->NM_ajax_info['param']['image__ul_type42'];
      }
      elseif (isset($this->image__ul_name42) && '' != $this->image__ul_name42)
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['upload_field_ul_name'][$this->image__ul_name42]))
          {
              $this->image__ul_name42 = $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['upload_field_ul_name'][$this->image__ul_name42];
          }
          $this->image_42      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->image__ul_name42;
          $this->image_42_scfile_name = substr($this->image__ul_name42, 12);
          $this->image_42_scfile_type = $this->image__ul_type42;
      }
      if (isset($this->image_42))
      {
          $GLOBALS['image_42']      = $this->image_42;
          $GLOBALS['image_42_scfile_name'] = $this->image_42_scfile_name;
          $GLOBALS['image_42_scfile_type'] = $this->image_42_scfile_type;
      }
      if (isset($this->NM_ajax_info['param']['image__ul_name43']) && '' != $this->NM_ajax_info['param']['image__ul_name43'])
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['upload_field_ul_name'][$this->image__ul_name43]))
          {
              $this->NM_ajax_info['param']['image__ul_name43'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['upload_field_ul_name'][$this->image__ul_name43];
          }
          $this->image_43      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->NM_ajax_info['param']['image__ul_name43'];
          $this->image_43_scfile_name = substr($this->NM_ajax_info['param']['image__ul_name43'], 12);
          $this->image_43_scfile_type = $this->NM_ajax_info['param']['image__ul_type43'];
      }
      elseif (isset($this->image__ul_name43) && '' != $this->image__ul_name43)
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['upload_field_ul_name'][$this->image__ul_name43]))
          {
              $this->image__ul_name43 = $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['upload_field_ul_name'][$this->image__ul_name43];
          }
          $this->image_43      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->image__ul_name43;
          $this->image_43_scfile_name = substr($this->image__ul_name43, 12);
          $this->image_43_scfile_type = $this->image__ul_type43;
      }
      if (isset($this->image_43))
      {
          $GLOBALS['image_43']      = $this->image_43;
          $GLOBALS['image_43_scfile_name'] = $this->image_43_scfile_name;
          $GLOBALS['image_43_scfile_type'] = $this->image_43_scfile_type;
      }
      if (isset($this->NM_ajax_info['param']['image__ul_name44']) && '' != $this->NM_ajax_info['param']['image__ul_name44'])
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['upload_field_ul_name'][$this->image__ul_name44]))
          {
              $this->NM_ajax_info['param']['image__ul_name44'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['upload_field_ul_name'][$this->image__ul_name44];
          }
          $this->image_44      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->NM_ajax_info['param']['image__ul_name44'];
          $this->image_44_scfile_name = substr($this->NM_ajax_info['param']['image__ul_name44'], 12);
          $this->image_44_scfile_type = $this->NM_ajax_info['param']['image__ul_type44'];
      }
      elseif (isset($this->image__ul_name44) && '' != $this->image__ul_name44)
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['upload_field_ul_name'][$this->image__ul_name44]))
          {
              $this->image__ul_name44 = $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['upload_field_ul_name'][$this->image__ul_name44];
          }
          $this->image_44      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->image__ul_name44;
          $this->image_44_scfile_name = substr($this->image__ul_name44, 12);
          $this->image_44_scfile_type = $this->image__ul_type44;
      }
      if (isset($this->image_44))
      {
          $GLOBALS['image_44']      = $this->image_44;
          $GLOBALS['image_44_scfile_name'] = $this->image_44_scfile_name;
          $GLOBALS['image_44_scfile_type'] = $this->image_44_scfile_type;
      }
      if (isset($this->NM_ajax_info['param']['image__ul_name45']) && '' != $this->NM_ajax_info['param']['image__ul_name45'])
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['upload_field_ul_name'][$this->image__ul_name45]))
          {
              $this->NM_ajax_info['param']['image__ul_name45'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['upload_field_ul_name'][$this->image__ul_name45];
          }
          $this->image_45      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->NM_ajax_info['param']['image__ul_name45'];
          $this->image_45_scfile_name = substr($this->NM_ajax_info['param']['image__ul_name45'], 12);
          $this->image_45_scfile_type = $this->NM_ajax_info['param']['image__ul_type45'];
      }
      elseif (isset($this->image__ul_name45) && '' != $this->image__ul_name45)
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['upload_field_ul_name'][$this->image__ul_name45]))
          {
              $this->image__ul_name45 = $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['upload_field_ul_name'][$this->image__ul_name45];
          }
          $this->image_45      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->image__ul_name45;
          $this->image_45_scfile_name = substr($this->image__ul_name45, 12);
          $this->image_45_scfile_type = $this->image__ul_type45;
      }
      if (isset($this->image_45))
      {
          $GLOBALS['image_45']      = $this->image_45;
          $GLOBALS['image_45_scfile_name'] = $this->image_45_scfile_name;
          $GLOBALS['image_45_scfile_type'] = $this->image_45_scfile_type;
      }

      $this->loadFieldConfig();

      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['first_time'])
      {
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_product_edit_masivo']['insert']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_product_edit_masivo']['new']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_product_edit_masivo']['update']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_product_edit_masivo']['delete']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_product_edit_masivo']['first']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_product_edit_masivo']['back']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_product_edit_masivo']['forward']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_product_edit_masivo']['last']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_product_edit_masivo']['qsearch']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_product_edit_masivo']['dynsearch']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_product_edit_masivo']['summary']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_product_edit_masivo']['navpage']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_product_edit_masivo']['goto']);
      }
      $this->NM_cancel_return_new = (isset($this->NM_cancel_return_new) && $this->NM_cancel_return_new == 1) ? "1" : "";
      $this->NM_cancel_insert_new = ((isset($this->NM_cancel_insert_new) && $this->NM_cancel_insert_new == 1) || $this->NM_cancel_return_new == 1) ? "document.F5.action='" . $nm_url_saida . "';" : "";
      if (isset($this->NM_btn_insert) && '' != $this->NM_btn_insert && (!isset($_SESSION['scriptcase']['sc_apl_conf']['form_product_edit_masivo']['insert']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['form_product_edit_masivo']['insert']))
      {
          if ('N' == $this->NM_btn_insert)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_product_edit_masivo']['insert'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_product_edit_masivo']['insert'] = 'on';
          }
      }
      if (isset($this->NM_btn_new) && 'N' == $this->NM_btn_new)
      {
          $_SESSION['scriptcase']['sc_apl_conf_lig']['form_product_edit_masivo']['new'] = 'off';
      }
      if (isset($this->NM_btn_update) && '' != $this->NM_btn_update && (!isset($_SESSION['scriptcase']['sc_apl_conf']['form_product_edit_masivo']['update']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['form_product_edit_masivo']['update']))
      {
          if ('N' == $this->NM_btn_update)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_product_edit_masivo']['update'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_product_edit_masivo']['update'] = 'on';
          }
      }
      if (isset($this->NM_btn_delete) && '' != $this->NM_btn_delete && (!isset($_SESSION['scriptcase']['sc_apl_conf']['form_product_edit_masivo']['delete']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['form_product_edit_masivo']['delete']))
      {
          if ('N' == $this->NM_btn_delete)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_product_edit_masivo']['delete'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_product_edit_masivo']['delete'] = 'on';
          }
      }
      if (isset($this->NM_btn_navega) && '' != $this->NM_btn_navega)
      {
          if ('N' == $this->NM_btn_navega)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_product_edit_masivo']['first']     = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_product_edit_masivo']['back']      = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_product_edit_masivo']['forward']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_product_edit_masivo']['last']      = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_product_edit_masivo']['qsearch']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_product_edit_masivo']['dynsearch'] = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_product_edit_masivo']['summary']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_product_edit_masivo']['navpage']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_product_edit_masivo']['goto']      = 'off';
              $this->Nav_permite_ava = false;
              $this->Nav_permite_ret = false;
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_product_edit_masivo']['first']     = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_product_edit_masivo']['back']      = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_product_edit_masivo']['forward']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_product_edit_masivo']['last']      = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_product_edit_masivo']['qsearch']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_product_edit_masivo']['dynsearch'] = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_product_edit_masivo']['summary']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_product_edit_masivo']['navpage']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_product_edit_masivo']['goto']      = 'on';
          }
      }

      $this->nmgp_botoes['cancel'] = "on";
      $this->nmgp_botoes['exit'] = "on";
      $this->nmgp_botoes['qsearch'] = "on";
      $this->nmgp_botoes['new'] = "on";
      $this->nmgp_botoes['insert'] = "on";
      $this->nmgp_botoes['copy'] = "off";
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
      $this->nmgp_botoes['qtline'] = "off";
      $this->nmgp_botoes['reload'] = "off";
      }
      if (isset($this->NM_btn_cancel) && 'N' == $this->NM_btn_cancel)
      {
          $this->nmgp_botoes['cancel'] = "off";
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['where_orig'] = "";
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['where_pesq']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['where_pesq'] = "";
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['where_pesq_filtro'] = "";
      }
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['where_pesq_filtro'];
      if ($this->NM_ajax_flag && 'event_' == substr($this->NM_ajax_opcao, 0, 6)) {
          $this->nmgp_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['buttonStatus'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['iframe_filtro']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['iframe_filtro'] == "S")
      {
          $this->nmgp_botoes['exit'] = "off";
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_product_edit_masivo']['btn_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['form_product_edit_masivo']['btn_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['form_product_edit_masivo']['btn_display'] as $NM_cada_btn => $NM_cada_opc)
          {
              $this->nmgp_botoes[$NM_cada_btn] = $NM_cada_opc;
          }
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_product_edit_masivo']['insert']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_product_edit_masivo']['insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_product_edit_masivo']['insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_product_edit_masivo']['insert'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_product_edit_masivo']['new']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_product_edit_masivo']['new'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_product_edit_masivo']['new'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_product_edit_masivo']['update']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_product_edit_masivo']['update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_product_edit_masivo']['update'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_product_edit_masivo']['delete']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_product_edit_masivo']['delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_product_edit_masivo']['delete'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_product_edit_masivo']['first']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_product_edit_masivo']['first'] != '')
      {
          $this->nmgp_botoes['first'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_product_edit_masivo']['first'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_product_edit_masivo']['back']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_product_edit_masivo']['back'] != '')
      {
          $this->nmgp_botoes['back'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_product_edit_masivo']['back'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_product_edit_masivo']['forward']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_product_edit_masivo']['forward'] != '')
      {
          $this->nmgp_botoes['forward'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_product_edit_masivo']['forward'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_product_edit_masivo']['last']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_product_edit_masivo']['last'] != '')
      {
          $this->nmgp_botoes['last'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_product_edit_masivo']['last'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_product_edit_masivo']['qsearch']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_product_edit_masivo']['qsearch'] != '')
      {
          $this->nmgp_botoes['qsearch'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_product_edit_masivo']['qsearch'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_product_edit_masivo']['dynsearch']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_product_edit_masivo']['dynsearch'] != '')
      {
          $this->nmgp_botoes['dynsearch'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_product_edit_masivo']['dynsearch'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_product_edit_masivo']['summary']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_product_edit_masivo']['summary'] != '')
      {
          $this->nmgp_botoes['summary'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_product_edit_masivo']['summary'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_product_edit_masivo']['navpage']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_product_edit_masivo']['navpage'] != '')
      {
          $this->nmgp_botoes['navpage'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_product_edit_masivo']['navpage'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_product_edit_masivo']['goto']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_product_edit_masivo']['goto'] != '')
      {
          $this->nmgp_botoes['goto'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_product_edit_masivo']['goto'];
      }

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['embutida_liga_form_insert']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['embutida_liga_form_insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['embutida_liga_form_insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['embutida_liga_form_insert'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['embutida_liga_form_update']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['embutida_liga_form_update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['embutida_liga_form_update'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['embutida_liga_form_delete']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['embutida_liga_form_delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['embutida_liga_form_delete'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['embutida_liga_form_btn_nav']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['embutida_liga_form_btn_nav'] != '')
      {
          $this->nmgp_botoes['first']   = $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['back']    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['forward'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['last']    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['embutida_liga_form_btn_nav'];
      }

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['dashboard_info']['under_dashboard'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['dashboard_info']['maximized']) {
          $tmpDashboardApp = $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['dashboard_info']['dashboard_app'];
          if (isset($_SESSION['scriptcase']['dashboard_toolbar'][$tmpDashboardApp]['form_product_edit_masivo'])) {
              $tmpDashboardButtons = $_SESSION['scriptcase']['dashboard_toolbar'][$tmpDashboardApp]['form_product_edit_masivo'];

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

      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_product_edit_masivo']['insert']) && $_SESSION['scriptcase']['sc_apl_conf']['form_product_edit_masivo']['insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf']['form_product_edit_masivo']['insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['scriptcase']['sc_apl_conf']['form_product_edit_masivo']['insert'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_product_edit_masivo']['update']) && $_SESSION['scriptcase']['sc_apl_conf']['form_product_edit_masivo']['update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['scriptcase']['sc_apl_conf']['form_product_edit_masivo']['update'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_product_edit_masivo']['delete']) && $_SESSION['scriptcase']['sc_apl_conf']['form_product_edit_masivo']['delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['scriptcase']['sc_apl_conf']['form_product_edit_masivo']['delete'];
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_product_edit_masivo']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['form_product_edit_masivo']['field_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['form_product_edit_masivo']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->nmgp_cmp_hidden[$NM_cada_field . "_"] = $NM_cada_opc;
              $this->NM_ajax_info['fieldDisplay'][$NM_cada_field . "_"] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_product_edit_masivo']['field_readonly']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['form_product_edit_masivo']['field_readonly']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['form_product_edit_masivo']['field_readonly'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->nmgp_cmp_readonly[$NM_cada_field . "_"] = "on";
              $this->NM_ajax_info['readOnly'][$NM_cada_field . "_"] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_product_edit_masivo']['exit']) && $_SESSION['scriptcase']['sc_apl_conf']['form_product_edit_masivo']['exit'] != '')
      {
          $_SESSION['scriptcase']['sc_url_saida'][$this->Ini->sc_page]       = $_SESSION['scriptcase']['sc_apl_conf']['form_product_edit_masivo']['exit'];
          $_SESSION['scriptcase']['sc_force_url_saida'][$this->Ini->sc_page] = true;
      }
      $glo_senha_protect = (isset($_SESSION['scriptcase']['glo_senha_protect'])) ? $_SESSION['scriptcase']['glo_senha_protect'] : "S";
      $this->aba_iframe = false;
      if (isset($_SESSION['scriptcase']['sc_aba_iframe']))
      {
          foreach ($_SESSION['scriptcase']['sc_aba_iframe'] as $aba => $apls_aba)
          {
              if (in_array("form_product_edit_masivo", $apls_aba))
              {
                  $this->aba_iframe = true;
                  break;
              }
          }
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['iframe_menu'] && (!isset($_SESSION['scriptcase']['menu_mobile']) || empty($_SESSION['scriptcase']['menu_mobile'])))
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
              include_once($this->Ini->path_embutida . 'form_product_edit_masivo/form_product_edit_masivo_calendar.php');
          }
          else
          { 
              include_once($this->Ini->path_aplicacao . 'form_product_edit_masivo_calendar.php');
          }
          exit;
      }

      if (is_file($this->Ini->path_aplicacao . 'form_product_edit_masivo_help.txt'))
      {
          $arr_link_webhelp = file($this->Ini->path_aplicacao . 'form_product_edit_masivo_help.txt');
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
          require_once($this->Ini->path_embutida . 'form_product_edit_masivo/form_product_edit_masivo_erro.class.php');
      }
      else
      { 
          require_once($this->Ini->path_aplicacao . "form_product_edit_masivo_erro.class.php"); 
      }
      $this->Erro      = new form_product_edit_masivo_erro();
      $this->Erro->Ini = $this->Ini;
      $this->proc_fast_search = false;
      if ($this->nmgp_opcao == "fast_search")  
      {
          $this->SC_fast_search($this->nmgp_fast_search, $this->nmgp_cond_fast_search, $this->nmgp_arg_fast_search);
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['opcao'] = "inicio";
          $this->nmgp_opcao = "inicio";
          $this->proc_fast_search = true;
      } 
      if ($nm_opc_lookup != "lookup" && $nm_opc_php != "formphp")
      { 
         if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['opcao']))
         { 
             if ($this->id_product_ != "")   
             { 
                 $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['opcao'] = "igual" ;  
             }   
         }   
      } 
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['opcao']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['opcao']) && empty($this->nmgp_refresh_fields))
      {
          $this->nmgp_opcao = $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['opcao'];  
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['opcao'] = "" ;  
          if ($this->nmgp_opcao == "edit_novo")  
          {
             $this->nmgp_opcao = "novo";
             $this->nm_flag_saida_novo = "S";
          }
      } 
      $this->nm_Start_new = false;
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_product_edit_masivo']['start']) && $_SESSION['scriptcase']['sc_apl_conf']['form_product_edit_masivo']['start'] == 'new')
      {
          $this->nmgp_opcao = "novo";
          $this->nm_Start_new = true;
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['opcao'] = "novo";
          unset($_SESSION['scriptcase']['sc_apl_conf']['form_product_edit_masivo']['start']);
      }
      if ($this->nmgp_opcao == "igual")  
      {
          $this->nmgp_opc_ant = $this->nmgp_opcao;
      } 
      else
      {
          $this->nmgp_opc_ant = $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['opc_ant'];
      } 
      if ($this->nmgp_opcao == "recarga" || $this->nmgp_opcao == "muda_form")  
      {
          $this->nmgp_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['botoes'];
          $this->Nav_permite_ret = 0 != $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['inicio'];
          $this->Nav_permite_ava = $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['total'] != $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['final'];
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
      //-- dateproduct_
      $this->field_config['dateproduct_']                 = array();
      $this->field_config['dateproduct_']['date_format']  = $_SESSION['scriptcase']['reg_conf']['date_format'] . ';' . $_SESSION['scriptcase']['reg_conf']['time_format'];
      $this->field_config['dateproduct_']['date_sep']     = $_SESSION['scriptcase']['reg_conf']['date_sep'];
      $this->field_config['dateproduct_']['time_sep']     = $_SESSION['scriptcase']['reg_conf']['time_sep'];
      $this->field_config['dateproduct_']['date_display'] = "ddmmaaaa";
      $this->new_date_format('DH', 'dateproduct_');
      //-- product_cost_
      $this->field_config['product_cost_']               = array();
      $this->field_config['product_cost_']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_val'];
      $this->field_config['product_cost_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['product_cost_']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_val'];
      $this->field_config['product_cost_']['symbol_mon'] = '';
      $this->field_config['product_cost_']['format_pos'] = $_SESSION['scriptcase']['reg_conf']['monet_f_pos'];
      $this->field_config['product_cost_']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['monet_f_neg'];
      //-- stock_
      $this->field_config['stock_']               = array();
      $this->field_config['stock_']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['stock_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['stock_']['symbol_dec'] = '';
      $this->field_config['stock_']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['stock_']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- product_value_
      $this->field_config['product_value_']               = array();
      $this->field_config['product_value_']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_val'];
      $this->field_config['product_value_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['product_value_']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_val'];
      $this->field_config['product_value_']['symbol_mon'] = '';
      $this->field_config['product_value_']['format_pos'] = $_SESSION['scriptcase']['reg_conf']['monet_f_pos'];
      $this->field_config['product_value_']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['monet_f_neg'];
      //-- discount_
      $this->field_config['discount_']               = array();
      $this->field_config['discount_']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_val'];
      $this->field_config['discount_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['discount_']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_val'];
      $this->field_config['discount_']['symbol_mon'] = '';
      $this->field_config['discount_']['format_pos'] = $_SESSION['scriptcase']['reg_conf']['monet_f_pos'];
      $this->field_config['discount_']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['monet_f_neg'];
      //-- poriva_
      $this->field_config['poriva_']               = array();
      $this->field_config['poriva_']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['poriva_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['poriva_']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_num'];
      $this->field_config['poriva_']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['poriva_']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- precioventa_
      $this->field_config['precioventa_']               = array();
      $this->field_config['precioventa_']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['precioventa_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['precioventa_']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_num'];
      $this->field_config['precioventa_']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['precioventa_']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- minutos_
      $this->field_config['minutos_']               = array();
      $this->field_config['minutos_']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['minutos_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['minutos_']['symbol_dec'] = '';
      $this->field_config['minutos_']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['minutos_']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- tokens_
      $this->field_config['tokens_']               = array();
      $this->field_config['tokens_']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['tokens_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['tokens_']['symbol_dec'] = '';
      $this->field_config['tokens_']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['tokens_']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- score_
      $this->field_config['score_']               = array();
      $this->field_config['score_']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['score_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['score_']['symbol_dec'] = '';
      $this->field_config['score_']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['score_']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- id_product_
      $this->field_config['id_product_']               = array();
      $this->field_config['id_product_']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['id_product_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['id_product_']['symbol_dec'] = '';
      $this->field_config['id_product_']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['id_product_']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
   }

   function controle()
   {
        global $nm_url_saida, $teste_validade, 
               $GLOBALS, $Campos_Crit, $Campos_Falta, $Campos_Erros, $sc_seq_vert, $sc_check_incl, 
               $glo_senha_protect, $nm_apl_dependente, $nm_form_submit, $sc_check_excl, $nm_opc_form_php, $nm_call_php, $nm_opc_lookup;


      $this->ini_controle();
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['Gera_log_access'])
      {
          $this->NM_gera_log_insert("Scriptcase", "access");
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['Gera_log_access'] = false;
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
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['opc_edit'] = true;  
      $this->SC_log_arr_vert = array();
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
         form_product_edit_masivo_pack_ajax_response();
         exit;
      }
      if ($this->NM_ajax_flag && 'backup_line' == $this->NM_ajax_opcao)
      {
         $this->nmgp_opcao = "igual";
         $this->nm_tira_formatacao();
         $this->nm_converte_datas();
         $this->nm_select_banco();
         $this->ajax_return_values();
         $this->NM_close_db();
         form_product_edit_masivo_pack_ajax_response();
         exit;
      }
      if ($this->NM_ajax_flag && 'submit_form' == $this->NM_ajax_opcao)
      {
         if (isset($this->product_name_)) { $this->nm_limpa_alfa($this->product_name_); }
         if (isset($this->product_code_)) { $this->nm_limpa_alfa($this->product_code_); }
         if (isset($this->id_status_)) { $this->nm_limpa_alfa($this->id_status_); }
         if (isset($this->product_value_)) { $this->nm_limpa_alfa($this->product_value_); }
         if (isset($this->product_cost_)) { $this->nm_limpa_alfa($this->product_cost_); }
         if (isset($this->discount_)) { $this->nm_limpa_alfa($this->discount_); }
         if (isset($this->stock_)) { $this->nm_limpa_alfa($this->stock_); }
         if (isset($this->id_category_)) { $this->nm_limpa_alfa($this->id_category_); }
         if (isset($this->service_)) { $this->nm_limpa_alfa($this->service_); }
         if (isset($this->kiosko_)) { $this->nm_limpa_alfa($this->kiosko_); }
         if (isset($this->entrada_)) { $this->nm_limpa_alfa($this->entrada_); }
         if (isset($this->jugador_)) { $this->nm_limpa_alfa($this->jugador_); }
         if (isset($this->visitante_)) { $this->nm_limpa_alfa($this->visitante_); }
         if (isset($this->tarjeta_)) { $this->nm_limpa_alfa($this->tarjeta_); }
         if (isset($this->minutos_)) { $this->nm_limpa_alfa($this->minutos_); }
         if (isset($this->tokens_)) { $this->nm_limpa_alfa($this->tokens_); }
         if (isset($this->comida_)) { $this->nm_limpa_alfa($this->comida_); }
         if (isset($this->score_)) { $this->nm_limpa_alfa($this->score_); }
         if (isset($this->poriva_)) { $this->nm_limpa_alfa($this->poriva_); }
         if (isset($this->cuentaventa_)) { $this->nm_limpa_alfa($this->cuentaventa_); }
         if (isset($this->unidad_)) { $this->nm_limpa_alfa($this->unidad_); }
         if (isset($this->tipoitem_)) { $this->nm_limpa_alfa($this->tipoitem_); }
         if (isset($this->cuentacompra_)) { $this->nm_limpa_alfa($this->cuentacompra_); }
         if (isset($this->precioventa_)) { $this->nm_limpa_alfa($this->precioventa_); }
         if (isset($this->puntoventa_)) { $this->nm_limpa_alfa($this->puntoventa_); }
         if (isset($this->Sc_num_lin_alt) && $this->Sc_num_lin_alt > 0) 
         {
             $sc_seq_vert = $this->Sc_num_lin_alt;
         }
         if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['dados_form'][$sc_seq_vert]))
         {
             $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['dados_form'][$sc_seq_vert];
             $this->id_product_ = $this->nmgp_dados_form['id_product_']; 
         }
         $this->controle_form_vert();
         if ($Campos_Crit != "" || !empty($Campos_Falta) || $this->Campos_Mens_erro != "")
         {
             $this->NM_rollback_db();
              if ($this->NM_ajax_flag)
              {
                  if (!isset($this->NM_ajax_info['errList']['geral_form_product_edit_masivo']) || !is_array($this->NM_ajax_info['errList']['geral_form_product_edit_masivo']))
                  {
                      $this->NM_ajax_info['errList']['geral_form_product_edit_masivo'] = array();
                  }
                  if ($Campos_Crit != "")
                  {
                      $this->NM_ajax_info['errList']['geral_form_product_edit_masivo'][] = $Campos_Crit;
                  }
                  if (!empty($Campos_Falta))
                  {
                      $this->NM_ajax_info['errList']['geral_form_product_edit_masivo'][] = $this->Formata_Campos_Falta($Campos_Falta);
                  }
                  if ($this->Campos_Mens_erro != "")
                  {
                      $this->NM_ajax_info['errList']['geral_form_product_edit_masivo'][] = $this->Campos_Mens_erro;
                  }
              }
         }
         else
         {
             if ($this->SC_log_atv)
             {
                 $this->SC_log_arr_vert[] = $this->SC_log_arr;
                 $this->SC_log_atv = false;
             }
             $this->NM_commit_db();
         }
         if ($this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form" && !$this->Apl_com_erro)
         {
             $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['recarga'] = $this->nmgp_opcao;
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['sc_redir_insert']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['sc_redir_insert'] == "ok")
          {
              if ($this->sc_teve_incl && empty($sc_todas_Crit))
              {
                  $this->NM_close_db(); 
                  $this->nmgp_redireciona(2); 
              }
          }
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['sc_redir_atualiz']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['sc_redir_atualiz'] == "ok")
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
         form_product_edit_masivo_pack_ajax_response();
         exit;
      }
      if ($this->NM_ajax_flag && 'validate_' == substr($this->NM_ajax_opcao, 0, 9))
      {
         $Campos_Crit  = "";
         $Campos_Falta = array();
         $Campos_Erros = array();
          if ('validate_product_name_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'product_name_');
          }
          if ('validate_id_category_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'id_category_');
          }
          if ('validate_product_code_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'product_code_');
          }
          if ('validate_dateproduct_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'dateproduct_');
          }
          if ('validate_product_cost_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'product_cost_');
          }
          if ('validate_stock_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'stock_');
          }
          if ('validate_product_value_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'product_value_');
          }
          if ('validate_discount_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'discount_');
          }
          if ('validate_poriva_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'poriva_');
          }
          if ('validate_cuentaventa_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'cuentaventa_');
          }
          if ('validate_unidad_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'unidad_');
          }
          if ('validate_tipoitem_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'tipoitem_');
          }
          if ('validate_cuentacompra_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'cuentacompra_');
          }
          if ('validate_precioventa_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'precioventa_');
          }
          if ('validate_puntoventa_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'puntoventa_');
          }
          if ('validate_id_status_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'id_status_');
          }
          if ('validate_image_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'image_');
          }
          if ('validate_entrada_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'entrada_');
          }
          if ('validate_service_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'service_');
          }
          if ('validate_kiosko_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'kiosko_');
          }
          if ('validate_jugador_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'jugador_');
          }
          if ('validate_visitante_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'visitante_');
          }
          if ('validate_minutos_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'minutos_');
          }
          if ('validate_tarjeta_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'tarjeta_');
          }
          if ('validate_tokens_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'tokens_');
          }
          if ('validate_comida_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'comida_');
          }
          if ('validate_score_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'score_');
          }
          form_product_edit_masivo_pack_ajax_response();
          exit;
      }
      while ($sc_contr_vert > $sc_seq_vert) 
      { 
         $Campos_Crit  = "";
         $Campos_Falta = array();
         $Campos_Erros = array();
         $this->product_name_ = $GLOBALS["product_name_" . $sc_seq_vert]; 
         $this->id_category_ = $GLOBALS["id_category_" . $sc_seq_vert]; 
         $this->product_code_ = $GLOBALS["product_code_" . $sc_seq_vert]; 
         $this->dateproduct_ = $GLOBALS["dateproduct_" . $sc_seq_vert]; 
         $this->dateproduct__hora = $GLOBALS["dateproduct__hora" . $sc_seq_vert]; 
         $this->product_cost_ = $GLOBALS["product_cost_" . $sc_seq_vert]; 
         $this->stock_ = $GLOBALS["stock_" . $sc_seq_vert]; 
         $this->product_value_ = $GLOBALS["product_value_" . $sc_seq_vert]; 
         $this->discount_ = $GLOBALS["discount_" . $sc_seq_vert]; 
         $this->poriva_ = $GLOBALS["poriva_" . $sc_seq_vert]; 
         $this->cuentaventa_ = $GLOBALS["cuentaventa_" . $sc_seq_vert]; 
         $this->unidad_ = $GLOBALS["unidad_" . $sc_seq_vert]; 
         $this->tipoitem_ = $GLOBALS["tipoitem_" . $sc_seq_vert]; 
         $this->cuentacompra_ = $GLOBALS["cuentacompra_" . $sc_seq_vert]; 
         $this->precioventa_ = $GLOBALS["precioventa_" . $sc_seq_vert]; 
         $this->puntoventa_ = $GLOBALS["puntoventa_" . $sc_seq_vert]; 
         $this->id_status_ = $GLOBALS["id_status_" . $sc_seq_vert]; 
         $this->image_ = $GLOBALS["image_" . $sc_seq_vert]; 
         $this->image__scfile_type = $GLOBALS["image_"  . $sc_seq_vert . "_scfile_type"]; 
         $this->image__scfile_name = $GLOBALS["image_"  . $sc_seq_vert . "_scfile_name"]; 
         $this->image__limpa = $GLOBALS["image__limpa" . $sc_seq_vert]; 
         $this->image__salva = $GLOBALS["image_"  . $sc_seq_vert . "_salva"]; 
         $this->entrada_ = $GLOBALS["entrada_" . $sc_seq_vert]; 
         $this->service_ = $GLOBALS["service_" . $sc_seq_vert]; 
         $this->kiosko_ = $GLOBALS["kiosko_" . $sc_seq_vert]; 
         $this->jugador_ = $GLOBALS["jugador_" . $sc_seq_vert]; 
         $this->visitante_ = $GLOBALS["visitante_" . $sc_seq_vert]; 
         $this->minutos_ = $GLOBALS["minutos_" . $sc_seq_vert]; 
         $this->tarjeta_ = $GLOBALS["tarjeta_" . $sc_seq_vert]; 
         $this->tokens_ = $GLOBALS["tokens_" . $sc_seq_vert]; 
         $this->comida_ = $GLOBALS["comida_" . $sc_seq_vert]; 
         $this->score_ = $GLOBALS["score_" . $sc_seq_vert]; 
         if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['dados_form'][$sc_seq_vert]))
         {
             $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['dados_form'][$sc_seq_vert];
             $this->id_product_ = $this->nmgp_dados_form['id_product_']; 
         }
         if (isset($this->product_name_)) { $this->nm_limpa_alfa($this->product_name_); }
         if (isset($this->product_code_)) { $this->nm_limpa_alfa($this->product_code_); }
         if (isset($this->id_status_)) { $this->nm_limpa_alfa($this->id_status_); }
         if (isset($this->product_value_)) { $this->nm_limpa_alfa($this->product_value_); }
         if (isset($this->product_cost_)) { $this->nm_limpa_alfa($this->product_cost_); }
         if (isset($this->discount_)) { $this->nm_limpa_alfa($this->discount_); }
         if (isset($this->stock_)) { $this->nm_limpa_alfa($this->stock_); }
         if (isset($this->id_category_)) { $this->nm_limpa_alfa($this->id_category_); }
         if (isset($this->service_)) { $this->nm_limpa_alfa($this->service_); }
         if (isset($this->kiosko_)) { $this->nm_limpa_alfa($this->kiosko_); }
         if (isset($this->entrada_)) { $this->nm_limpa_alfa($this->entrada_); }
         if (isset($this->jugador_)) { $this->nm_limpa_alfa($this->jugador_); }
         if (isset($this->visitante_)) { $this->nm_limpa_alfa($this->visitante_); }
         if (isset($this->tarjeta_)) { $this->nm_limpa_alfa($this->tarjeta_); }
         if (isset($this->minutos_)) { $this->nm_limpa_alfa($this->minutos_); }
         if (isset($this->tokens_)) { $this->nm_limpa_alfa($this->tokens_); }
         if (isset($this->comida_)) { $this->nm_limpa_alfa($this->comida_); }
         if (isset($this->score_)) { $this->nm_limpa_alfa($this->score_); }
         if (isset($this->poriva_)) { $this->nm_limpa_alfa($this->poriva_); }
         if (isset($this->cuentaventa_)) { $this->nm_limpa_alfa($this->cuentaventa_); }
         if (isset($this->unidad_)) { $this->nm_limpa_alfa($this->unidad_); }
         if (isset($this->tipoitem_)) { $this->nm_limpa_alfa($this->tipoitem_); }
         if (isset($this->cuentacompra_)) { $this->nm_limpa_alfa($this->cuentacompra_); }
         if (isset($this->precioventa_)) { $this->nm_limpa_alfa($this->precioventa_); }
         if (isset($this->puntoventa_)) { $this->nm_limpa_alfa($this->puntoventa_); }
         if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['dados_form'])) 
         {
            $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['dados_form'][$sc_seq_vert];
         }
         if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['dados_select'])) 
         {
            $this->nmgp_dados_select = $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['dados_select'][$sc_seq_vert];
         }
         if ($this->nmgp_opcao != "recarga" && (!in_array($sc_seq_vert, $sc_check_excl) && !in_array($sc_seq_vert, $sc_check_incl) ))
         { }
         else
         {
             $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['sc_disabled'] = array();
             $this->controle_form_vert(); 
             $this->nmgp_opcao = $sc_opc_salva; 
             if ($this->nmgp_opcao != "recarga"  && $this->nmgp_opcao != "muda_form" && ($Campos_Crit != "" || !empty($Campos_Falta) || $this->Campos_Mens_erro != ""))
             {
                 $sc_todas_Crit .= (!empty($sc_todas_Crit)) ? "<br>" : ""; 
                 $sc_todas_Crit .= "<B>" . $this->Ini->Nm_lang['lang_errm_line'] . $sc_seq_vert . "</B>: "; 
                 $sc_todas_Crit .= $this->Formata_Erros($Campos_Crit, $Campos_Falta, $Campos_Erros);
                 $this->Campos_Mens_erro = ""; 
             }
             elseif ($this->SC_log_atv)
             {
                 $this->SC_log_arr_vert[] = $this->SC_log_arr;
                 $this->SC_log_atv = false;
             }
             if ($this->nmgp_opcao != "recarga") 
             {
                $this->nm_guardar_campos();
                $this->nm_formatar_campos();
             }
             $this->form_vert_form_product_edit_masivo[$sc_seq_vert]['product_name_'] =  $this->product_name_; 
             $this->form_vert_form_product_edit_masivo[$sc_seq_vert]['id_category_'] =  $this->id_category_; 
             $this->form_vert_form_product_edit_masivo[$sc_seq_vert]['product_code_'] =  $this->product_code_; 
             $this->form_vert_form_product_edit_masivo[$sc_seq_vert]['dateproduct_'] =  $this->dateproduct_; 
             $this->form_vert_form_product_edit_masivo[$sc_seq_vert]['dateproduct__hora'] =  $this->dateproduct__hora; 
             $this->form_vert_form_product_edit_masivo[$sc_seq_vert]['product_cost_'] =  $this->product_cost_; 
             $this->form_vert_form_product_edit_masivo[$sc_seq_vert]['stock_'] =  $this->stock_; 
             $this->form_vert_form_product_edit_masivo[$sc_seq_vert]['product_value_'] =  $this->product_value_; 
             $this->form_vert_form_product_edit_masivo[$sc_seq_vert]['discount_'] =  $this->discount_; 
             $this->form_vert_form_product_edit_masivo[$sc_seq_vert]['poriva_'] =  $this->poriva_; 
             $this->form_vert_form_product_edit_masivo[$sc_seq_vert]['cuentaventa_'] =  $this->cuentaventa_; 
             $this->form_vert_form_product_edit_masivo[$sc_seq_vert]['unidad_'] =  $this->unidad_; 
             $this->form_vert_form_product_edit_masivo[$sc_seq_vert]['tipoitem_'] =  $this->tipoitem_; 
             $this->form_vert_form_product_edit_masivo[$sc_seq_vert]['cuentacompra_'] =  $this->cuentacompra_; 
             $this->form_vert_form_product_edit_masivo[$sc_seq_vert]['precioventa_'] =  $this->precioventa_; 
             $this->form_vert_form_product_edit_masivo[$sc_seq_vert]['puntoventa_'] =  $this->puntoventa_; 
             $this->form_vert_form_product_edit_masivo[$sc_seq_vert]['id_status_'] =  $this->id_status_; 
             $this->form_vert_form_product_edit_masivo[$sc_seq_vert]['image_'] =  $this->image_; 
             $this->form_vert_form_product_edit_masivo[$sc_seq_vert]['image__limpa'] =  $this->image__limpa; 
             $this->form_vert_form_product_edit_masivo[$sc_seq_vert]['entrada_'] =  $this->entrada_; 
             $this->form_vert_form_product_edit_masivo[$sc_seq_vert]['service_'] =  $this->service_; 
             $this->form_vert_form_product_edit_masivo[$sc_seq_vert]['kiosko_'] =  $this->kiosko_; 
             $this->form_vert_form_product_edit_masivo[$sc_seq_vert]['jugador_'] =  $this->jugador_; 
             $this->form_vert_form_product_edit_masivo[$sc_seq_vert]['visitante_'] =  $this->visitante_; 
             $this->form_vert_form_product_edit_masivo[$sc_seq_vert]['minutos_'] =  $this->minutos_; 
             $this->form_vert_form_product_edit_masivo[$sc_seq_vert]['tarjeta_'] =  $this->tarjeta_; 
             $this->form_vert_form_product_edit_masivo[$sc_seq_vert]['tokens_'] =  $this->tokens_; 
             $this->form_vert_form_product_edit_masivo[$sc_seq_vert]['comida_'] =  $this->comida_; 
             $this->form_vert_form_product_edit_masivo[$sc_seq_vert]['score_'] =  $this->score_; 
             $this->form_vert_form_product_edit_masivo[$sc_seq_vert]['id_product_'] =  $this->id_product_; 
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
          form_product_edit_masivo_pack_ajax_response();
          exit;
      }
      if ($this->NM_ajax_flag && 'table_refresh' == $this->NM_ajax_opcao)
      {
          $this->nm_gera_html();
          $this->NM_ajax_info['tableRefresh'] = NM_charset_to_utf8($this->Table_refresh . $this->New_Line) . '</table>';
          $this->NM_ajax_info['navStatus']['ret'] = $this->Nav_permite_ret ? 'S' : 'N';
          $this->NM_ajax_info['navStatus']['ava'] = $this->Nav_permite_ava ? 'S' : 'N';
          $this->NM_ajax_info['rsSize'] = sizeof($this->form_vert_form_product_edit_masivo);
          $this->NM_ajax_info['fldList']['id_product_']['keyVal'] = sc_htmlentities($this->nmgp_dados_form['id_product_']);
          $this->NM_close_db();
          form_product_edit_masivo_pack_ajax_response();
          exit;
      }
      if ($this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form" && !$this->Apl_com_erro)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['recarga'] = $this->nmgp_opcao;
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['sc_redir_insert']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['sc_redir_insert'] == "ok")
          {
              if ($this->sc_teve_incl && empty($sc_todas_Crit))
              {
                  $this->NM_close_db(); 
                  $this->nmgp_redireciona(2); 
              }
          }
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['sc_redir_atualiz']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['sc_redir_atualiz'] == "ok")
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
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['inline_form_seq'] = $this->sc_seq_row;
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
              form_product_edit_masivo_pack_ajax_response();
              exit;
          }
          $this->nm_formatar_campos();
          $this->nmgp_opcao = $nm_sc_sv_opcao; 
          return; 
      }
      if ($this->nmgp_opcao == "incluir" || $this->nmgp_opcao == "alterar" || $this->nmgp_opcao == "excluir") 
      {
          $this->product_name_ = sc_strip_script($this->product_name_, $_SESSION['scriptcase']['charset']);
          $this->product_name_ = sc_strip_tags($this->product_name_, $_SESSION['scriptcase']['charset']);
          $this->product_code_ = sc_strip_script($this->product_code_, $_SESSION['scriptcase']['charset']);
          $this->product_code_ = sc_strip_tags($this->product_code_, $_SESSION['scriptcase']['charset']);
          $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros) ; 
          $_SESSION['scriptcase']['form_product_edit_masivo']['contr_erro'] = 'off';
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
          $Zip_name = "sc_prt_" . date("YmdHis") . "_" . rand(0, 1000) . "form_product_edit_masivo.zip";
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
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo'][$path_doc_md5][0] = $Arq_htm;
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo'][$path_doc_md5][1] = $Zip_name;
?>
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE><?php echo strip_tags("" . $this->Ini->Nm_lang['lang_othr_frmu_title'] . " " . $this->Ini->Nm_lang['lang_tbl_product'] . "") ?></TITLE>
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
<form name="Fdown" method="get" action="form_product_edit_masivo_download.php" target="_self" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo $this->form_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="form_product_edit_masivo"> 
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
       foreach ($this->SC_log_arr_vert as $this->SC_log_arr)
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
       if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['SC_sep_date']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['SC_sep_date']))
       {
           $delim  = $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['SC_sep_date'];
           $delim1 = $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['SC_sep_date1'];
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
           $comando = "INSERT INTO sc_log (inserted_date, username, application, creator, ip_user, `action`, description) VALUES ($dt, " . $this->Db->qstr($usr) . ", 'form_product_edit_masivo', '$orig', '" . $_SERVER['REMOTE_ADDR'] . "', '$evento', " . $this->Db->qstr($texto) . ")"; 
       } 
       elseif (in_array(strtolower($_SESSION['scriptcase']['glo_tpbanco']), $this->Ini->nm_bases_sqlite))
       { 
           $comando = "INSERT INTO sc_log (id, inserted_date, username, application, creator, ip_user, action, description) VALUES (NULL, $dt, " . $this->Db->qstr($usr) . ", 'form_product_edit_masivo', '$orig', '" . $_SERVER['REMOTE_ADDR'] . "', '$evento', " . $this->Db->qstr($texto) . ")"; 
       } 
       else
       { 
           $comando = "INSERT INTO sc_log (inserted_date, username, application, creator, ip_user, action, description) VALUES ($dt, " . $this->Db->qstr($usr) . ", 'form_product_edit_masivo', '$orig', '" . $_SERVER['REMOTE_ADDR'] . "', '$evento', " . $this->Db->qstr($texto) . ")"; 
       } 
       $_SESSION['scriptcase']['sc_sql_ult_comando'] = $comando; 
       $rlog = $this->Db->Execute($comando); 
       if ($rlog === false)  
       { 
           $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_inst'], $this->Db->ErrorMsg()); 
           if ($this->NM_ajax_flag)
           {
               form_product_edit_masivo_pack_ajax_response();
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
           case 'product_name_':
               return "" . $this->Ini->Nm_lang['lang_product_fld_product_name'] . "";
               break;
           case 'id_category_':
               return "" . $this->Ini->Nm_lang['lang_product_fld_id_category'] . "";
               break;
           case 'product_code_':
               return "" . $this->Ini->Nm_lang['lang_product_fld_product_code'] . "";
               break;
           case 'dateproduct_':
               return "" . $this->Ini->Nm_lang['lang_product_fld_dateproduct'] . "";
               break;
           case 'product_cost_':
               return "" . $this->Ini->Nm_lang['lang_product_fld_product_cost'] . "";
               break;
           case 'stock_':
               return "" . $this->Ini->Nm_lang['lang_product_fld_stock'] . "";
               break;
           case 'product_value_':
               return "" . $this->Ini->Nm_lang['lang_product_fld_product_value'] . "";
               break;
           case 'discount_':
               return "" . $this->Ini->Nm_lang['lang_product_fld_discount'] . "";
               break;
           case 'poriva_':
               return "Poriva";
               break;
           case 'cuentaventa_':
               return "Cuentaventa";
               break;
           case 'unidad_':
               return "Unidad";
               break;
           case 'tipoitem_':
               return "Tipoitem";
               break;
           case 'cuentacompra_':
               return "Cuentacompra";
               break;
           case 'precioventa_':
               return "Precioventa";
               break;
           case 'puntoventa_':
               return "Puntoventa";
               break;
           case 'id_status_':
               return "" . $this->Ini->Nm_lang['lang_product_fld_id_status'] . "";
               break;
           case 'image_':
               return "" . $this->Ini->Nm_lang['lang_product_fld_image'] . "";
               break;
           case 'entrada_':
               return "Entrada";
               break;
           case 'service_':
               return "Service";
               break;
           case 'kiosko_':
               return "Kiosko";
               break;
           case 'jugador_':
               return "Jugador";
               break;
           case 'visitante_':
               return "Visitante";
               break;
           case 'minutos_':
               return "Minutos";
               break;
           case 'tarjeta_':
               return "Tarjeta";
               break;
           case 'tokens_':
               return "Tokens";
               break;
           case 'comida_':
               return "Comida";
               break;
           case 'score_':
               return "Score";
               break;
           case 'id_product_':
               return "" . $this->Ini->Nm_lang['lang_product_fld_id_product'] . "";
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
      if ((!is_array($filtro) && ('' == $filtro || 'product_name_' == $filtro)) || (is_array($filtro) && in_array('product_name_', $filtro)))
        $this->ValidateField_product_name_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'id_category_' == $filtro)) || (is_array($filtro) && in_array('id_category_', $filtro)))
        $this->ValidateField_id_category_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'product_code_' == $filtro)) || (is_array($filtro) && in_array('product_code_', $filtro)))
        $this->ValidateField_product_code_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'dateproduct_' == $filtro)) || (is_array($filtro) && in_array('dateproduct_', $filtro)))
        $this->ValidateField_dateproduct_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'product_cost_' == $filtro)) || (is_array($filtro) && in_array('product_cost_', $filtro)))
        $this->ValidateField_product_cost_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'stock_' == $filtro)) || (is_array($filtro) && in_array('stock_', $filtro)))
        $this->ValidateField_stock_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'product_value_' == $filtro)) || (is_array($filtro) && in_array('product_value_', $filtro)))
        $this->ValidateField_product_value_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'discount_' == $filtro)) || (is_array($filtro) && in_array('discount_', $filtro)))
        $this->ValidateField_discount_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'poriva_' == $filtro)) || (is_array($filtro) && in_array('poriva_', $filtro)))
        $this->ValidateField_poriva_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'cuentaventa_' == $filtro)) || (is_array($filtro) && in_array('cuentaventa_', $filtro)))
        $this->ValidateField_cuentaventa_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'unidad_' == $filtro)) || (is_array($filtro) && in_array('unidad_', $filtro)))
        $this->ValidateField_unidad_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'tipoitem_' == $filtro)) || (is_array($filtro) && in_array('tipoitem_', $filtro)))
        $this->ValidateField_tipoitem_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'cuentacompra_' == $filtro)) || (is_array($filtro) && in_array('cuentacompra_', $filtro)))
        $this->ValidateField_cuentacompra_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'precioventa_' == $filtro)) || (is_array($filtro) && in_array('precioventa_', $filtro)))
        $this->ValidateField_precioventa_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'puntoventa_' == $filtro)) || (is_array($filtro) && in_array('puntoventa_', $filtro)))
        $this->ValidateField_puntoventa_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'id_status_' == $filtro)) || (is_array($filtro) && in_array('id_status_', $filtro)))
        $this->ValidateField_id_status_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'image_' == $filtro)) || (is_array($filtro) && in_array('image_', $filtro)))
        $this->ValidateField_image_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'entrada_' == $filtro)) || (is_array($filtro) && in_array('entrada_', $filtro)))
        $this->ValidateField_entrada_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'service_' == $filtro)) || (is_array($filtro) && in_array('service_', $filtro)))
        $this->ValidateField_service_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'kiosko_' == $filtro)) || (is_array($filtro) && in_array('kiosko_', $filtro)))
        $this->ValidateField_kiosko_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'jugador_' == $filtro)) || (is_array($filtro) && in_array('jugador_', $filtro)))
        $this->ValidateField_jugador_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'visitante_' == $filtro)) || (is_array($filtro) && in_array('visitante_', $filtro)))
        $this->ValidateField_visitante_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'minutos_' == $filtro)) || (is_array($filtro) && in_array('minutos_', $filtro)))
        $this->ValidateField_minutos_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'tarjeta_' == $filtro)) || (is_array($filtro) && in_array('tarjeta_', $filtro)))
        $this->ValidateField_tarjeta_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'tokens_' == $filtro)) || (is_array($filtro) && in_array('tokens_', $filtro)))
        $this->ValidateField_tokens_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'comida_' == $filtro)) || (is_array($filtro) && in_array('comida_', $filtro)))
        $this->ValidateField_comida_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'score_' == $filtro)) || (is_array($filtro) && in_array('score_', $filtro)))
        $this->ValidateField_score_($Campos_Crit, $Campos_Falta, $Campos_Erros);
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

    function ValidateField_product_name_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->product_name_) > 50) 
          { 
              $hasError = true;
              $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_product_fld_product_name'] . " " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 50 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['product_name_']))
              {
                  $Campos_Erros['product_name_'] = array();
              }
              $Campos_Erros['product_name_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 50 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['product_name_']) || !is_array($this->NM_ajax_info['errList']['product_name_']))
              {
                  $this->NM_ajax_info['errList']['product_name_'] = array();
              }
              $this->NM_ajax_info['errList']['product_name_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 50 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'product_name_';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_product_name_

    function ValidateField_id_category_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
               if (!empty($this->id_category_) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['Lookup_id_category_']) && !in_array($this->id_category_, $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['Lookup_id_category_']))
               {
                   $hasError = true;
                   $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($Campos_Erros['id_category_']))
                   {
                       $Campos_Erros['id_category_'] = array();
                   }
                   $Campos_Erros['id_category_'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($this->NM_ajax_info['errList']['id_category_']) || !is_array($this->NM_ajax_info['errList']['id_category_']))
                   {
                       $this->NM_ajax_info['errList']['id_category_'] = array();
                   }
                   $this->NM_ajax_info['errList']['id_category_'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
               }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'id_category_';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_id_category_

    function ValidateField_product_code_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->product_code_) > 50) 
          { 
              $hasError = true;
              $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_product_fld_product_code'] . " " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 50 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['product_code_']))
              {
                  $Campos_Erros['product_code_'] = array();
              }
              $Campos_Erros['product_code_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 50 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['product_code_']) || !is_array($this->NM_ajax_info['errList']['product_code_']))
              {
                  $this->NM_ajax_info['errList']['product_code_'] = array();
              }
              $this->NM_ajax_info['errList']['product_code_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 50 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'product_code_';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_product_code_

    function ValidateField_dateproduct_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      nm_limpa_data($this->dateproduct_, $this->field_config['dateproduct_']['date_sep']) ; 
      $trab_dt_min = ""; 
      $trab_dt_max = ""; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          $guarda_datahora = $this->field_config['dateproduct_']['date_format']; 
          if (false !== strpos($guarda_datahora, ';')) $this->field_config['dateproduct_']['date_format'] = substr($guarda_datahora, 0, strpos($guarda_datahora, ';'));
          $Format_Data = $this->field_config['dateproduct_']['date_format']; 
          nm_limpa_data($Format_Data, $this->field_config['dateproduct_']['date_sep']) ; 
          if (trim($this->dateproduct_) != "")  
          { 
              if ($teste_validade->Data($this->dateproduct_, $Format_Data, $trab_dt_min, $trab_dt_max) == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_product_fld_dateproduct'] . "; " ; 
                  if (!isset($Campos_Erros['dateproduct_']))
                  {
                      $Campos_Erros['dateproduct_'] = array();
                  }
                  $Campos_Erros['dateproduct_'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['dateproduct_']) || !is_array($this->NM_ajax_info['errList']['dateproduct_']))
                  {
                      $this->NM_ajax_info['errList']['dateproduct_'] = array();
                  }
                  $this->NM_ajax_info['errList']['dateproduct_'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
          $this->field_config['dateproduct_']['date_format'] = $guarda_datahora; 
       } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'dateproduct_';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
      nm_limpa_hora($this->dateproduct__hora, $this->field_config['dateproduct__hora']['time_sep']) ; 
      if ($this->nmgp_opcao != "excluir") 
      {
          $Format_Hora = $this->field_config['dateproduct__hora']['date_format']; 
          nm_limpa_hora($Format_Hora, $this->field_config['dateproduct__hora']['time_sep']) ; 
          if (trim($this->dateproduct__hora) != "")  
          { 
              if ($teste_validade->Hora($this->dateproduct__hora, $Format_Hora) == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_product_fld_dateproduct'] . "; " ; 
                  if (!isset($Campos_Erros['dateproduct__hora']))
                  {
                      $Campos_Erros['dateproduct__hora'] = array();
                  }
                  $Campos_Erros['dateproduct__hora'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['dateproduct_']) || !is_array($this->NM_ajax_info['errList']['dateproduct_']))
                  {
                      $this->NM_ajax_info['errList']['dateproduct_'] = array();
                  }
                  $this->NM_ajax_info['errList']['dateproduct_'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
      if (isset($Campos_Erros['dateproduct_']) && isset($Campos_Erros['dateproduct__hora']))
      {
          $this->removeDuplicateDttmError($Campos_Erros['dateproduct_'], $Campos_Erros['dateproduct__hora']);
          if (empty($Campos_Erros['dateproduct__hora']))
          {
              unset($Campos_Erros['dateproduct__hora']);
          }
          if (isset($this->NM_ajax_info['errList']['dateproduct_']))
          {
              $this->NM_ajax_info['errList']['dateproduct_'] = array_unique($this->NM_ajax_info['errList']['dateproduct_']);
          }
      }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'dateproduct__hora';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_dateproduct__hora

    function ValidateField_product_cost_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->product_cost_ === "" || is_null($this->product_cost_))  
      { 
          $this->product_cost_ = 0;
          $this->sc_force_zero[] = 'product_cost_';
      } 
      if (!empty($this->field_config['product_cost_']['symbol_dec']))
      {
          $this->sc_remove_currency($this->product_cost_, $this->field_config['product_cost_']['symbol_dec'], $this->field_config['product_cost_']['symbol_grp'], $this->field_config['product_cost_']['symbol_mon']); 
          nm_limpa_valor($this->product_cost_, $this->field_config['product_cost_']['symbol_dec'], $this->field_config['product_cost_']['symbol_grp']) ; 
          if ('.' == substr($this->product_cost_, 0, 1))
          {
              if ('' == str_replace('0', '', substr($this->product_cost_, 1)))
              {
                  $this->product_cost_ = '';
              }
              else
              {
                  $this->product_cost_ = '0' . $this->product_cost_;
              }
          }
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->product_cost_ != '')  
          { 
              $iTestSize = 11;
              if (strlen($this->product_cost_) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_product_fld_product_cost'] . ": " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['product_cost_']))
                  {
                      $Campos_Erros['product_cost_'] = array();
                  }
                  $Campos_Erros['product_cost_'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['product_cost_']) || !is_array($this->NM_ajax_info['errList']['product_cost_']))
                  {
                      $this->NM_ajax_info['errList']['product_cost_'] = array();
                  }
                  $this->NM_ajax_info['errList']['product_cost_'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->product_cost_, 8, 2, 0, 0, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_product_fld_product_cost'] . "; " ; 
                  if (!isset($Campos_Erros['product_cost_']))
                  {
                      $Campos_Erros['product_cost_'] = array();
                  }
                  $Campos_Erros['product_cost_'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['product_cost_']) || !is_array($this->NM_ajax_info['errList']['product_cost_']))
                  {
                      $this->NM_ajax_info['errList']['product_cost_'] = array();
                  }
                  $this->NM_ajax_info['errList']['product_cost_'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'product_cost_';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_product_cost_

    function ValidateField_stock_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->stock_ === "" || is_null($this->stock_))  
      { 
          $this->stock_ = 0;
          $this->sc_force_zero[] = 'stock_';
      } 
      nm_limpa_numero($this->stock_, $this->field_config['stock_']['symbol_grp']) ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->stock_ != '')  
          { 
              $iTestSize = 11;
              if (strlen($this->stock_) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_product_fld_stock'] . ": " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['stock_']))
                  {
                      $Campos_Erros['stock_'] = array();
                  }
                  $Campos_Erros['stock_'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['stock_']) || !is_array($this->NM_ajax_info['errList']['stock_']))
                  {
                      $this->NM_ajax_info['errList']['stock_'] = array();
                  }
                  $this->NM_ajax_info['errList']['stock_'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->stock_, 11, 0, 0, 0, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_product_fld_stock'] . "; " ; 
                  if (!isset($Campos_Erros['stock_']))
                  {
                      $Campos_Erros['stock_'] = array();
                  }
                  $Campos_Erros['stock_'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['stock_']) || !is_array($this->NM_ajax_info['errList']['stock_']))
                  {
                      $this->NM_ajax_info['errList']['stock_'] = array();
                  }
                  $this->NM_ajax_info['errList']['stock_'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'stock_';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_stock_

    function ValidateField_product_value_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->product_value_ === "" || is_null($this->product_value_))  
      { 
          $this->product_value_ = 0;
          $this->sc_force_zero[] = 'product_value_';
      } 
      if (!empty($this->field_config['product_value_']['symbol_dec']))
      {
          $this->sc_remove_currency($this->product_value_, $this->field_config['product_value_']['symbol_dec'], $this->field_config['product_value_']['symbol_grp'], $this->field_config['product_value_']['symbol_mon']); 
          nm_limpa_valor($this->product_value_, $this->field_config['product_value_']['symbol_dec'], $this->field_config['product_value_']['symbol_grp']) ; 
          if ('.' == substr($this->product_value_, 0, 1))
          {
              if ('' == str_replace('0', '', substr($this->product_value_, 1)))
              {
                  $this->product_value_ = '';
              }
              else
              {
                  $this->product_value_ = '0' . $this->product_value_;
              }
          }
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->product_value_ != '')  
          { 
              $iTestSize = 11;
              if (strlen($this->product_value_) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_product_fld_product_value'] . ": " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['product_value_']))
                  {
                      $Campos_Erros['product_value_'] = array();
                  }
                  $Campos_Erros['product_value_'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['product_value_']) || !is_array($this->NM_ajax_info['errList']['product_value_']))
                  {
                      $this->NM_ajax_info['errList']['product_value_'] = array();
                  }
                  $this->NM_ajax_info['errList']['product_value_'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->product_value_, 8, 2, 0, 0, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_product_fld_product_value'] . "; " ; 
                  if (!isset($Campos_Erros['product_value_']))
                  {
                      $Campos_Erros['product_value_'] = array();
                  }
                  $Campos_Erros['product_value_'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['product_value_']) || !is_array($this->NM_ajax_info['errList']['product_value_']))
                  {
                      $this->NM_ajax_info['errList']['product_value_'] = array();
                  }
                  $this->NM_ajax_info['errList']['product_value_'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'product_value_';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_product_value_

    function ValidateField_discount_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->discount_ === "" || is_null($this->discount_))  
      { 
          $this->discount_ = 0;
          $this->sc_force_zero[] = 'discount_';
      } 
      if (!empty($this->field_config['discount_']['symbol_dec']))
      {
          $this->sc_remove_currency($this->discount_, $this->field_config['discount_']['symbol_dec'], $this->field_config['discount_']['symbol_grp'], $this->field_config['discount_']['symbol_mon']); 
          nm_limpa_valor($this->discount_, $this->field_config['discount_']['symbol_dec'], $this->field_config['discount_']['symbol_grp']) ; 
          if ('.' == substr($this->discount_, 0, 1))
          {
              if ('' == str_replace('0', '', substr($this->discount_, 1)))
              {
                  $this->discount_ = '';
              }
              else
              {
                  $this->discount_ = '0' . $this->discount_;
              }
          }
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->discount_ != '')  
          { 
              $iTestSize = 11;
              if (strlen($this->discount_) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_product_fld_discount'] . ": " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['discount_']))
                  {
                      $Campos_Erros['discount_'] = array();
                  }
                  $Campos_Erros['discount_'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['discount_']) || !is_array($this->NM_ajax_info['errList']['discount_']))
                  {
                      $this->NM_ajax_info['errList']['discount_'] = array();
                  }
                  $this->NM_ajax_info['errList']['discount_'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->discount_, 8, 2, 0, 0, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_product_fld_discount'] . "; " ; 
                  if (!isset($Campos_Erros['discount_']))
                  {
                      $Campos_Erros['discount_'] = array();
                  }
                  $Campos_Erros['discount_'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['discount_']) || !is_array($this->NM_ajax_info['errList']['discount_']))
                  {
                      $this->NM_ajax_info['errList']['discount_'] = array();
                  }
                  $this->NM_ajax_info['errList']['discount_'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'discount_';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_discount_

    function ValidateField_poriva_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->poriva_ === "" || is_null($this->poriva_))  
      { 
          $this->poriva_ = 0;
          $this->sc_force_zero[] = 'poriva_';
      } 
      if (!empty($this->field_config['poriva_']['symbol_dec']))
      {
          nm_limpa_valor($this->poriva_, $this->field_config['poriva_']['symbol_dec'], $this->field_config['poriva_']['symbol_grp']) ; 
          if ('.' == substr($this->poriva_, 0, 1))
          {
              if ('' == str_replace('0', '', substr($this->poriva_, 1)))
              {
                  $this->poriva_ = '';
              }
              else
              {
                  $this->poriva_ = '0' . $this->poriva_;
              }
          }
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->poriva_ != '')  
          { 
              $iTestSize = 20;
              if (strlen($this->poriva_) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Poriva: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['poriva_']))
                  {
                      $Campos_Erros['poriva_'] = array();
                  }
                  $Campos_Erros['poriva_'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['poriva_']) || !is_array($this->NM_ajax_info['errList']['poriva_']))
                  {
                      $this->NM_ajax_info['errList']['poriva_'] = array();
                  }
                  $this->NM_ajax_info['errList']['poriva_'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->poriva_, 17, 2, 0, 0, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Poriva; " ; 
                  if (!isset($Campos_Erros['poriva_']))
                  {
                      $Campos_Erros['poriva_'] = array();
                  }
                  $Campos_Erros['poriva_'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['poriva_']) || !is_array($this->NM_ajax_info['errList']['poriva_']))
                  {
                      $this->NM_ajax_info['errList']['poriva_'] = array();
                  }
                  $this->NM_ajax_info['errList']['poriva_'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'poriva_';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_poriva_

    function ValidateField_cuentaventa_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->cuentaventa_) > 45) 
          { 
              $hasError = true;
              $Campos_Crit .= "Cuentaventa " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 45 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['cuentaventa_']))
              {
                  $Campos_Erros['cuentaventa_'] = array();
              }
              $Campos_Erros['cuentaventa_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 45 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['cuentaventa_']) || !is_array($this->NM_ajax_info['errList']['cuentaventa_']))
              {
                  $this->NM_ajax_info['errList']['cuentaventa_'] = array();
              }
              $this->NM_ajax_info['errList']['cuentaventa_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 45 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'cuentaventa_';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_cuentaventa_

    function ValidateField_unidad_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->unidad_) > 45) 
          { 
              $hasError = true;
              $Campos_Crit .= "Unidad " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 45 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['unidad_']))
              {
                  $Campos_Erros['unidad_'] = array();
              }
              $Campos_Erros['unidad_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 45 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['unidad_']) || !is_array($this->NM_ajax_info['errList']['unidad_']))
              {
                  $this->NM_ajax_info['errList']['unidad_'] = array();
              }
              $this->NM_ajax_info['errList']['unidad_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 45 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'unidad_';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_unidad_

    function ValidateField_tipoitem_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->tipoitem_) > 45) 
          { 
              $hasError = true;
              $Campos_Crit .= "Tipoitem " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 45 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['tipoitem_']))
              {
                  $Campos_Erros['tipoitem_'] = array();
              }
              $Campos_Erros['tipoitem_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 45 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['tipoitem_']) || !is_array($this->NM_ajax_info['errList']['tipoitem_']))
              {
                  $this->NM_ajax_info['errList']['tipoitem_'] = array();
              }
              $this->NM_ajax_info['errList']['tipoitem_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 45 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'tipoitem_';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_tipoitem_

    function ValidateField_cuentacompra_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->cuentacompra_) > 45) 
          { 
              $hasError = true;
              $Campos_Crit .= "Cuentacompra " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 45 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['cuentacompra_']))
              {
                  $Campos_Erros['cuentacompra_'] = array();
              }
              $Campos_Erros['cuentacompra_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 45 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['cuentacompra_']) || !is_array($this->NM_ajax_info['errList']['cuentacompra_']))
              {
                  $this->NM_ajax_info['errList']['cuentacompra_'] = array();
              }
              $this->NM_ajax_info['errList']['cuentacompra_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 45 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'cuentacompra_';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_cuentacompra_

    function ValidateField_precioventa_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->precioventa_ === "" || is_null($this->precioventa_))  
      { 
          $this->precioventa_ = 0;
          $this->sc_force_zero[] = 'precioventa_';
      } 
      if (!empty($this->field_config['precioventa_']['symbol_dec']))
      {
          nm_limpa_valor($this->precioventa_, $this->field_config['precioventa_']['symbol_dec'], $this->field_config['precioventa_']['symbol_grp']) ; 
          if ('.' == substr($this->precioventa_, 0, 1))
          {
              if ('' == str_replace('0', '', substr($this->precioventa_, 1)))
              {
                  $this->precioventa_ = '';
              }
              else
              {
                  $this->precioventa_ = '0' . $this->precioventa_;
              }
          }
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->precioventa_ != '')  
          { 
              $iTestSize = 20;
              if (strlen($this->precioventa_) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Precioventa: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['precioventa_']))
                  {
                      $Campos_Erros['precioventa_'] = array();
                  }
                  $Campos_Erros['precioventa_'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['precioventa_']) || !is_array($this->NM_ajax_info['errList']['precioventa_']))
                  {
                      $this->NM_ajax_info['errList']['precioventa_'] = array();
                  }
                  $this->NM_ajax_info['errList']['precioventa_'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->precioventa_, 10, 9, 0, 0, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Precioventa; " ; 
                  if (!isset($Campos_Erros['precioventa_']))
                  {
                      $Campos_Erros['precioventa_'] = array();
                  }
                  $Campos_Erros['precioventa_'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['precioventa_']) || !is_array($this->NM_ajax_info['errList']['precioventa_']))
                  {
                      $this->NM_ajax_info['errList']['precioventa_'] = array();
                  }
                  $this->NM_ajax_info['errList']['precioventa_'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'precioventa_';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_precioventa_

    function ValidateField_puntoventa_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->puntoventa_ == "" && $this->nmgp_opcao != "excluir")
      { 
      } 
      if ($this->puntoventa_ === "" || is_null($this->puntoventa_))  
      { 
          $this->puntoventa_ = 0;
          $this->sc_force_zero[] = 'puntoventa_';
      } 
      if ($this->puntoventa_ != "")
      { 
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['Lookup_puntoventa_']) && !in_array($this->puntoventa_, $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['Lookup_puntoventa_']))
          {
              $hasError = true;
              $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
              if (!isset($Campos_Erros['puntoventa_']))
              {
                  $Campos_Erros['puntoventa_'] = array();
              }
              $Campos_Erros['puntoventa_'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
              if (!isset($this->NM_ajax_info['errList']['puntoventa_']) || !is_array($this->NM_ajax_info['errList']['puntoventa_']))
              {
                  $this->NM_ajax_info['errList']['puntoventa_'] = array();
              }
              $this->NM_ajax_info['errList']['puntoventa_'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
          }
      }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'puntoventa_';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_puntoventa_

    function ValidateField_id_status_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
               if (!empty($this->id_status_) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['Lookup_id_status_']) && !in_array($this->id_status_, $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['Lookup_id_status_']))
               {
                   $hasError = true;
                   $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($Campos_Erros['id_status_']))
                   {
                       $Campos_Erros['id_status_'] = array();
                   }
                   $Campos_Erros['id_status_'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($this->NM_ajax_info['errList']['id_status_']) || !is_array($this->NM_ajax_info['errList']['id_status_']))
                   {
                       $this->NM_ajax_info['errList']['id_status_'] = array();
                   }
                   $this->NM_ajax_info['errList']['id_status_'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
               }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'id_status_';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_id_status_

    function ValidateField_image_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
        if ($this->nmgp_opcao != "excluir")
        {
            $sTestFile = $this->image_;
            if ("" != $this->image_ && "S" != $this->image__limpa && !$teste_validade->ArqExtensao($this->image_, array()))
            {
                $hasError = true;
                $Campos_Crit .= "{lang_product_fld_image}: " . $this->Ini->Nm_lang['lang_errm_file_invl']; 
                if (!isset($Campos_Erros['image_']))
                {
                    $Campos_Erros['image_'] = array();
                }
                $Campos_Erros['image_'][] = $this->Ini->Nm_lang['lang_errm_file_invl'];
                if (!isset($this->NM_ajax_info['errList']['image_']) || !is_array($this->NM_ajax_info['errList']['image_']))
                {
                    $this->NM_ajax_info['errList']['image_'] = array();
                }
                $this->NM_ajax_info['errList']['image_'][] = $this->Ini->Nm_lang['lang_errm_file_invl'];
            }
        }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'image_';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_image_

    function ValidateField_entrada_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->entrada_ == "" && $this->nmgp_opcao != "excluir")
      { 
      } 
      if ($this->entrada_ === "" || is_null($this->entrada_))  
      { 
          $this->entrada_ = 0;
          $this->sc_force_zero[] = 'entrada_';
      } 
      if ($this->entrada_ != "")
      { 
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['Lookup_entrada_']) && !in_array($this->entrada_, $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['Lookup_entrada_']))
          {
              $hasError = true;
              $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
              if (!isset($Campos_Erros['entrada_']))
              {
                  $Campos_Erros['entrada_'] = array();
              }
              $Campos_Erros['entrada_'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
              if (!isset($this->NM_ajax_info['errList']['entrada_']) || !is_array($this->NM_ajax_info['errList']['entrada_']))
              {
                  $this->NM_ajax_info['errList']['entrada_'] = array();
              }
              $this->NM_ajax_info['errList']['entrada_'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
          }
      }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'entrada_';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_entrada_

    function ValidateField_service_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->service_ == "" && $this->nmgp_opcao != "excluir")
      { 
      } 
      if ($this->service_ === "" || is_null($this->service_))  
      { 
          $this->service_ = 0;
          $this->sc_force_zero[] = 'service_';
      } 
      if ($this->service_ != "")
      { 
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['Lookup_service_']) && !in_array($this->service_, $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['Lookup_service_']))
          {
              $hasError = true;
              $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
              if (!isset($Campos_Erros['service_']))
              {
                  $Campos_Erros['service_'] = array();
              }
              $Campos_Erros['service_'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
              if (!isset($this->NM_ajax_info['errList']['service_']) || !is_array($this->NM_ajax_info['errList']['service_']))
              {
                  $this->NM_ajax_info['errList']['service_'] = array();
              }
              $this->NM_ajax_info['errList']['service_'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
          }
      }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'service_';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_service_

    function ValidateField_kiosko_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->kiosko_ == "" && $this->nmgp_opcao != "excluir")
      { 
      } 
      if ($this->kiosko_ === "" || is_null($this->kiosko_))  
      { 
          $this->kiosko_ = 0;
          $this->sc_force_zero[] = 'kiosko_';
      } 
      if ($this->kiosko_ != "")
      { 
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['Lookup_kiosko_']) && !in_array($this->kiosko_, $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['Lookup_kiosko_']))
          {
              $hasError = true;
              $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
              if (!isset($Campos_Erros['kiosko_']))
              {
                  $Campos_Erros['kiosko_'] = array();
              }
              $Campos_Erros['kiosko_'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
              if (!isset($this->NM_ajax_info['errList']['kiosko_']) || !is_array($this->NM_ajax_info['errList']['kiosko_']))
              {
                  $this->NM_ajax_info['errList']['kiosko_'] = array();
              }
              $this->NM_ajax_info['errList']['kiosko_'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
          }
      }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'kiosko_';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_kiosko_

    function ValidateField_jugador_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->jugador_ == "" && $this->nmgp_opcao != "excluir")
      { 
      } 
      if ($this->jugador_ === "" || is_null($this->jugador_))  
      { 
          $this->jugador_ = 0;
          $this->sc_force_zero[] = 'jugador_';
      } 
      if ($this->jugador_ != "")
      { 
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['Lookup_jugador_']) && !in_array($this->jugador_, $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['Lookup_jugador_']))
          {
              $hasError = true;
              $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
              if (!isset($Campos_Erros['jugador_']))
              {
                  $Campos_Erros['jugador_'] = array();
              }
              $Campos_Erros['jugador_'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
              if (!isset($this->NM_ajax_info['errList']['jugador_']) || !is_array($this->NM_ajax_info['errList']['jugador_']))
              {
                  $this->NM_ajax_info['errList']['jugador_'] = array();
              }
              $this->NM_ajax_info['errList']['jugador_'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
          }
      }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'jugador_';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_jugador_

    function ValidateField_visitante_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->visitante_ == "" && $this->nmgp_opcao != "excluir")
      { 
      } 
      if ($this->visitante_ === "" || is_null($this->visitante_))  
      { 
          $this->visitante_ = 0;
          $this->sc_force_zero[] = 'visitante_';
      } 
      if ($this->visitante_ != "")
      { 
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['Lookup_visitante_']) && !in_array($this->visitante_, $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['Lookup_visitante_']))
          {
              $hasError = true;
              $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
              if (!isset($Campos_Erros['visitante_']))
              {
                  $Campos_Erros['visitante_'] = array();
              }
              $Campos_Erros['visitante_'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
              if (!isset($this->NM_ajax_info['errList']['visitante_']) || !is_array($this->NM_ajax_info['errList']['visitante_']))
              {
                  $this->NM_ajax_info['errList']['visitante_'] = array();
              }
              $this->NM_ajax_info['errList']['visitante_'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
          }
      }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'visitante_';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_visitante_

    function ValidateField_minutos_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->minutos_ === "" || is_null($this->minutos_))  
      { 
          $this->minutos_ = 0;
          $this->sc_force_zero[] = 'minutos_';
      } 
      nm_limpa_numero($this->minutos_, $this->field_config['minutos_']['symbol_grp']) ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->minutos_ != '')  
          { 
              $iTestSize = 11;
              if (strlen($this->minutos_) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Minutos: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['minutos_']))
                  {
                      $Campos_Erros['minutos_'] = array();
                  }
                  $Campos_Erros['minutos_'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['minutos_']) || !is_array($this->NM_ajax_info['errList']['minutos_']))
                  {
                      $this->NM_ajax_info['errList']['minutos_'] = array();
                  }
                  $this->NM_ajax_info['errList']['minutos_'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->minutos_, 11, 0, 0, 0, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Minutos; " ; 
                  if (!isset($Campos_Erros['minutos_']))
                  {
                      $Campos_Erros['minutos_'] = array();
                  }
                  $Campos_Erros['minutos_'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['minutos_']) || !is_array($this->NM_ajax_info['errList']['minutos_']))
                  {
                      $this->NM_ajax_info['errList']['minutos_'] = array();
                  }
                  $this->NM_ajax_info['errList']['minutos_'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'minutos_';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_minutos_

    function ValidateField_tarjeta_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->tarjeta_ == "" && $this->nmgp_opcao != "excluir")
      { 
      } 
      if ($this->tarjeta_ === "" || is_null($this->tarjeta_))  
      { 
          $this->tarjeta_ = 0;
          $this->sc_force_zero[] = 'tarjeta_';
      } 
      if ($this->tarjeta_ != "")
      { 
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['Lookup_tarjeta_']) && !in_array($this->tarjeta_, $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['Lookup_tarjeta_']))
          {
              $hasError = true;
              $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
              if (!isset($Campos_Erros['tarjeta_']))
              {
                  $Campos_Erros['tarjeta_'] = array();
              }
              $Campos_Erros['tarjeta_'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
              if (!isset($this->NM_ajax_info['errList']['tarjeta_']) || !is_array($this->NM_ajax_info['errList']['tarjeta_']))
              {
                  $this->NM_ajax_info['errList']['tarjeta_'] = array();
              }
              $this->NM_ajax_info['errList']['tarjeta_'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
          }
      }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'tarjeta_';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_tarjeta_

    function ValidateField_tokens_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->tokens_ === "" || is_null($this->tokens_))  
      { 
          $this->tokens_ = 0;
          $this->sc_force_zero[] = 'tokens_';
      } 
      nm_limpa_numero($this->tokens_, $this->field_config['tokens_']['symbol_grp']) ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->tokens_ != '')  
          { 
              $iTestSize = 11;
              if (strlen($this->tokens_) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Tokens: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['tokens_']))
                  {
                      $Campos_Erros['tokens_'] = array();
                  }
                  $Campos_Erros['tokens_'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['tokens_']) || !is_array($this->NM_ajax_info['errList']['tokens_']))
                  {
                      $this->NM_ajax_info['errList']['tokens_'] = array();
                  }
                  $this->NM_ajax_info['errList']['tokens_'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->tokens_, 11, 0, 0, 0, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Tokens; " ; 
                  if (!isset($Campos_Erros['tokens_']))
                  {
                      $Campos_Erros['tokens_'] = array();
                  }
                  $Campos_Erros['tokens_'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['tokens_']) || !is_array($this->NM_ajax_info['errList']['tokens_']))
                  {
                      $this->NM_ajax_info['errList']['tokens_'] = array();
                  }
                  $this->NM_ajax_info['errList']['tokens_'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'tokens_';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_tokens_

    function ValidateField_comida_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->comida_ == "" && $this->nmgp_opcao != "excluir")
      { 
      } 
      if ($this->comida_ === "" || is_null($this->comida_))  
      { 
          $this->comida_ = 0;
          $this->sc_force_zero[] = 'comida_';
      } 
      if ($this->comida_ != "")
      { 
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['Lookup_comida_']) && !in_array($this->comida_, $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['Lookup_comida_']))
          {
              $hasError = true;
              $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
              if (!isset($Campos_Erros['comida_']))
              {
                  $Campos_Erros['comida_'] = array();
              }
              $Campos_Erros['comida_'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
              if (!isset($this->NM_ajax_info['errList']['comida_']) || !is_array($this->NM_ajax_info['errList']['comida_']))
              {
                  $this->NM_ajax_info['errList']['comida_'] = array();
              }
              $this->NM_ajax_info['errList']['comida_'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
          }
      }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'comida_';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_comida_

    function ValidateField_score_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->score_ === "" || is_null($this->score_))  
      { 
          $this->score_ = 0;
          $this->sc_force_zero[] = 'score_';
      } 
      nm_limpa_numero($this->score_, $this->field_config['score_']['symbol_grp']) ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->score_ != '')  
          { 
              $iTestSize = 11;
              if (strlen($this->score_) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Score: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['score_']))
                  {
                      $Campos_Erros['score_'] = array();
                  }
                  $Campos_Erros['score_'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['score_']) || !is_array($this->NM_ajax_info['errList']['score_']))
                  {
                      $this->NM_ajax_info['errList']['score_'] = array();
                  }
                  $this->NM_ajax_info['errList']['score_'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->score_, 11, 0, 0, 0, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Score; " ; 
                  if (!isset($Campos_Erros['score_']))
                  {
                      $Campos_Erros['score_'] = array();
                  }
                  $Campos_Erros['score_'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['score_']) || !is_array($this->NM_ajax_info['errList']['score_']))
                  {
                      $this->NM_ajax_info['errList']['score_'] = array();
                  }
                  $this->NM_ajax_info['errList']['score_'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'score_';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_score_
//
//--------------------------------------------------------------------------------------
   function upload_img_doc(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros, $filtro = '') 
   {
     global $nm_browser;
     if (!empty($Campos_Crit) || !empty($Campos_Falta))
     {
          return;
     }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->image_ == "none") 
          { 
              $this->image_ = ""; 
          } 
          if ($this->image_ != "") 
          { 
              if (!function_exists('sc_upload_unprotect_chars'))
              {
                  include_once 'form_product_edit_masivo_doc_name.php';
              }
              $this->image_ = sc_upload_unprotect_chars($this->image_);
              $this->image__scfile_name = sc_upload_unprotect_chars($this->image__scfile_name);
              if ($nm_browser == "Opera")  
              { 
                  $this->image__scfile_type = substr($this->image__scfile_type, 0, strpos($this->image__scfile_type, ";")) ; 
              } 
              if ($this->image__scfile_type == "image/pjpeg" || $this->image__scfile_type == "image/jpeg" || $this->image__scfile_type == "image/gif" ||  
                  $this->image__scfile_type == "image/png" || $this->image__scfile_type == "image/x-png" || $this->image__scfile_type == "image/bmp")  
              { 
                  if (!is_file($this->image_) && isset($_SESSION['scriptcase']['charset']) && $_SESSION['scriptcase']['charset'] != 'UTF-8') {
                      $mbConvertFileName = mb_convert_encoding($this->image_, $_SESSION['scriptcase']['charset'], 'UTF-8');
                      $mbConvertScFileName = mb_convert_encoding($this->image__scfile_name, $_SESSION['scriptcase']['charset'], 'UTF-8');
                      if (is_file($mbConvertFileName)) {
                          $this->image_ = $mbConvertFileName;
                          $this->image__scfile_name = $mbConvertScFileName;
                      }
                  }
                  if (is_file($this->image_))  
                  { 
                      $this->NM_size_docs[$this->image__scfile_name] = $this->sc_file_size($this->image_);
                      $reg_image_ = file_get_contents($this->image_); 
                      $this->image_ = $reg_image_; 
                  } 
                  else 
                  { 
                      $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_product_fld_image'] . " " . $this->Ini->Nm_lang['lang_errm_upld']; 
                      $this->image_ = "";
                      if (!isset($Campos_Erros['image_']))
                      {
                          $Campos_Erros['image_'] = array();
                      }
                      $Campos_Erros['image_'][] = $this->Ini->Nm_lang['lang_errm_upld'];
                      if (!isset($this->NM_ajax_info['errList']['image_']) || !is_array($this->NM_ajax_info['errList']['image_']))
                      {
                          $this->NM_ajax_info['errList']['image_'] = array();
                      }
                      $this->NM_ajax_info['errList']['image_'][] = $this->Ini->Nm_lang['lang_errm_upld'];
                  } 
              } 
              else 
              { 
                  if ($nm_browser == "Konqueror")  
                  { 
                      $this->image_ = "" ; 
                  } 
                  else 
                  { 
                     $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_product_fld_image'] . " " . $this->Ini->Nm_lang['lang_errm_ivtp'];  
                      if (!isset($Campos_Erros['image_']))
                      {
                          $Campos_Erros['image_'] = array();
                      }
                      $Campos_Erros['image_'][] = $this->Ini->Nm_lang['lang_errm_ivtp'];
                      if (!isset($this->NM_ajax_info['errList']['image_']) || !is_array($this->NM_ajax_info['errList']['image_']))
                      {
                          $this->NM_ajax_info['errList']['image_'] = array();
                      }
                      $this->NM_ajax_info['errList']['image_'][] = $this->Ini->Nm_lang['lang_errm_ivtp'];
                  } 
              } 
          } 
          elseif (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['dados_form']['image_']) && $this->image__limpa != "S")
          {
              $this->image_ = $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['dados_form']['image_'];
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
    $this->nmgp_dados_form['product_name_'] = $this->product_name_;
    $this->nmgp_dados_form['id_category_'] = $this->id_category_;
    $this->nmgp_dados_form['product_code_'] = $this->product_code_;
    $this->nmgp_dados_form['dateproduct_'] = (strlen(trim($this->dateproduct_)) > 19) ? str_replace(".", ":", $this->dateproduct_) : trim($this->dateproduct_);
    $this->nmgp_dados_form['product_cost_'] = $this->product_cost_;
    $this->nmgp_dados_form['stock_'] = $this->stock_;
    $this->nmgp_dados_form['product_value_'] = $this->product_value_;
    $this->nmgp_dados_form['discount_'] = $this->discount_;
    $this->nmgp_dados_form['poriva_'] = $this->poriva_;
    $this->nmgp_dados_form['cuentaventa_'] = $this->cuentaventa_;
    $this->nmgp_dados_form['unidad_'] = $this->unidad_;
    $this->nmgp_dados_form['tipoitem_'] = $this->tipoitem_;
    $this->nmgp_dados_form['cuentacompra_'] = $this->cuentacompra_;
    $this->nmgp_dados_form['precioventa_'] = $this->precioventa_;
    $this->nmgp_dados_form['puntoventa_'] = $this->puntoventa_;
    $this->nmgp_dados_form['id_status_'] = $this->id_status_;
    $this->nmgp_dados_form['image_'] = $this->image_;
    $this->nmgp_dados_form['image__limpa'] = $this->image__limpa;
    $this->nmgp_dados_form['entrada_'] = $this->entrada_;
    $this->nmgp_dados_form['service_'] = $this->service_;
    $this->nmgp_dados_form['kiosko_'] = $this->kiosko_;
    $this->nmgp_dados_form['jugador_'] = $this->jugador_;
    $this->nmgp_dados_form['visitante_'] = $this->visitante_;
    $this->nmgp_dados_form['minutos_'] = $this->minutos_;
    $this->nmgp_dados_form['tarjeta_'] = $this->tarjeta_;
    $this->nmgp_dados_form['tokens_'] = $this->tokens_;
    $this->nmgp_dados_form['comida_'] = $this->comida_;
    $this->nmgp_dados_form['score_'] = $this->score_;
    $this->nmgp_dados_form['id_product_'] = $this->id_product_;
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['dados_form'][$sc_seq_vert] = $this->nmgp_dados_form;
   }
   function nm_tira_formatacao()
   {
      global $nm_form_submit;
         $this->Before_unformat = array();
         $this->formatado = false;
      $this->Before_unformat['dateproduct_'] = $this->dateproduct_;
      $this->Before_unformat['dateproduct__hora'] = $this->dateproduct__hora;
      nm_limpa_data($this->dateproduct_, $this->field_config['dateproduct_']['date_sep']) ; 
      nm_limpa_hora($this->dateproduct__hora, $this->field_config['dateproduct_']['time_sep']) ; 
      $this->Before_unformat['product_cost_'] = $this->product_cost_;
      if (!empty($this->field_config['product_cost_']['symbol_dec']))
      {
         $this->sc_remove_currency($this->product_cost_, $this->field_config['product_cost_']['symbol_dec'], $this->field_config['product_cost_']['symbol_grp'], $this->field_config['product_cost_']['symbol_mon']);
         nm_limpa_valor($this->product_cost_, $this->field_config['product_cost_']['symbol_dec'], $this->field_config['product_cost_']['symbol_grp']);
      }
      $this->Before_unformat['stock_'] = $this->stock_;
      nm_limpa_numero($this->stock_, $this->field_config['stock_']['symbol_grp']) ; 
      $this->Before_unformat['product_value_'] = $this->product_value_;
      if (!empty($this->field_config['product_value_']['symbol_dec']))
      {
         $this->sc_remove_currency($this->product_value_, $this->field_config['product_value_']['symbol_dec'], $this->field_config['product_value_']['symbol_grp'], $this->field_config['product_value_']['symbol_mon']);
         nm_limpa_valor($this->product_value_, $this->field_config['product_value_']['symbol_dec'], $this->field_config['product_value_']['symbol_grp']);
      }
      $this->Before_unformat['discount_'] = $this->discount_;
      if (!empty($this->field_config['discount_']['symbol_dec']))
      {
         $this->sc_remove_currency($this->discount_, $this->field_config['discount_']['symbol_dec'], $this->field_config['discount_']['symbol_grp'], $this->field_config['discount_']['symbol_mon']);
         nm_limpa_valor($this->discount_, $this->field_config['discount_']['symbol_dec'], $this->field_config['discount_']['symbol_grp']);
      }
      $this->Before_unformat['poriva_'] = $this->poriva_;
      if (!empty($this->field_config['poriva_']['symbol_dec']))
      {
         nm_limpa_valor($this->poriva_, $this->field_config['poriva_']['symbol_dec'], $this->field_config['poriva_']['symbol_grp']);
      }
      $this->Before_unformat['precioventa_'] = $this->precioventa_;
      if (!empty($this->field_config['precioventa_']['symbol_dec']))
      {
         nm_limpa_valor($this->precioventa_, $this->field_config['precioventa_']['symbol_dec'], $this->field_config['precioventa_']['symbol_grp']);
      }
      $this->Before_unformat['minutos_'] = $this->minutos_;
      nm_limpa_numero($this->minutos_, $this->field_config['minutos_']['symbol_grp']) ; 
      $this->Before_unformat['tokens_'] = $this->tokens_;
      nm_limpa_numero($this->tokens_, $this->field_config['tokens_']['symbol_grp']) ; 
      $this->Before_unformat['score_'] = $this->score_;
      nm_limpa_numero($this->score_, $this->field_config['score_']['symbol_grp']) ; 
      $this->Before_unformat['id_product_'] = $this->id_product_;
      nm_limpa_numero($this->id_product_, $this->field_config['id_product_']['symbol_grp']) ; 
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
      if ($Nome_Campo == "product_cost_")
      {
          if (!empty($this->field_config['product_cost_']['symbol_dec']))
          {
             $this->sc_remove_currency($this->product_cost_, $this->field_config['product_cost_']['symbol_dec'], $this->field_config['product_cost_']['symbol_grp'], $this->field_config['product_cost_']['symbol_mon']);
             nm_limpa_valor($this->product_cost_, $this->field_config['product_cost_']['symbol_dec'], $this->field_config['product_cost_']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "stock_")
      {
          nm_limpa_numero($this->stock_, $this->field_config['stock_']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "product_value_")
      {
          if (!empty($this->field_config['product_value_']['symbol_dec']))
          {
             $this->sc_remove_currency($this->product_value_, $this->field_config['product_value_']['symbol_dec'], $this->field_config['product_value_']['symbol_grp'], $this->field_config['product_value_']['symbol_mon']);
             nm_limpa_valor($this->product_value_, $this->field_config['product_value_']['symbol_dec'], $this->field_config['product_value_']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "discount_")
      {
          if (!empty($this->field_config['discount_']['symbol_dec']))
          {
             $this->sc_remove_currency($this->discount_, $this->field_config['discount_']['symbol_dec'], $this->field_config['discount_']['symbol_grp'], $this->field_config['discount_']['symbol_mon']);
             nm_limpa_valor($this->discount_, $this->field_config['discount_']['symbol_dec'], $this->field_config['discount_']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "poriva_")
      {
          if (!empty($this->field_config['poriva_']['symbol_dec']))
          {
             nm_limpa_valor($this->poriva_, $this->field_config['poriva_']['symbol_dec'], $this->field_config['poriva_']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "precioventa_")
      {
          if (!empty($this->field_config['precioventa_']['symbol_dec']))
          {
             nm_limpa_valor($this->precioventa_, $this->field_config['precioventa_']['symbol_dec'], $this->field_config['precioventa_']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "minutos_")
      {
          nm_limpa_numero($this->minutos_, $this->field_config['minutos_']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "tokens_")
      {
          nm_limpa_numero($this->tokens_, $this->field_config['tokens_']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "score_")
      {
          nm_limpa_numero($this->score_, $this->field_config['score_']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "id_product_")
      {
          nm_limpa_numero($this->id_product_, $this->field_config['id_product_']['symbol_grp']) ; 
      }
   }
   function nm_formatar_campos($format_fields = array())
   {
      global $nm_form_submit;
      if ((!empty($this->dateproduct_) && 'null' != $this->dateproduct_) || (!empty($format_fields) && isset($format_fields['dateproduct_'])))
      {
          $nm_separa_data = strpos($this->field_config['dateproduct_']['date_format'], ";") ;
          $guarda_format_hora = $this->field_config['dateproduct_']['date_format'];
          $this->field_config['dateproduct_']['date_format'] = substr($this->field_config['dateproduct_']['date_format'], 0, $nm_separa_data) ;
          $separador = strpos($this->dateproduct_, " ") ; 
          $this->dateproduct__hora = substr($this->dateproduct_, $separador + 1) ; 
          $this->dateproduct_ = substr($this->dateproduct_, 0, $separador) ; 
          nm_volta_data($this->dateproduct_, $this->field_config['dateproduct_']['date_format']) ; 
          nmgp_Form_Datas($this->dateproduct_, $this->field_config['dateproduct_']['date_format'], $this->field_config['dateproduct_']['date_sep']) ;  
          $this->field_config['dateproduct_']['date_format'] = substr($guarda_format_hora, $nm_separa_data + 1) ;
          nm_volta_hora($this->dateproduct__hora, $this->field_config['dateproduct_']['date_format']) ; 
          nmgp_Form_Hora($this->dateproduct__hora, $this->field_config['dateproduct_']['date_format'], $this->field_config['dateproduct_']['time_sep']) ;  
          $this->field_config['dateproduct_']['date_format'] = $guarda_format_hora ;
      }
      elseif ('null' == $this->dateproduct_ || '' == $this->dateproduct_)
      {
          $this->dateproduct__hora = '';
          $this->dateproduct_ = '';
      }
      if ('' !== $this->product_cost_ || (!empty($format_fields) && isset($format_fields['product_cost_'])))
      {
          nmgp_Form_Num_Val($this->product_cost_, $this->field_config['product_cost_']['symbol_grp'], $this->field_config['product_cost_']['symbol_dec'], "2", "S", $this->field_config['product_cost_']['format_neg'], "", "", "-", $this->field_config['product_cost_']['symbol_fmt']) ; 
      }
      if ('' !== $this->stock_ || (!empty($format_fields) && isset($format_fields['stock_'])))
      {
          nmgp_Form_Num_Val($this->stock_, $this->field_config['stock_']['symbol_grp'], $this->field_config['stock_']['symbol_dec'], "0", "S", $this->field_config['stock_']['format_neg'], "", "", "-", $this->field_config['stock_']['symbol_fmt']) ; 
      }
      if ('' !== $this->product_value_ || (!empty($format_fields) && isset($format_fields['product_value_'])))
      {
          nmgp_Form_Num_Val($this->product_value_, $this->field_config['product_value_']['symbol_grp'], $this->field_config['product_value_']['symbol_dec'], "2", "S", $this->field_config['product_value_']['format_neg'], "", "", "-", $this->field_config['product_value_']['symbol_fmt']) ; 
      }
      if ('' !== $this->discount_ || (!empty($format_fields) && isset($format_fields['discount_'])))
      {
          nmgp_Form_Num_Val($this->discount_, $this->field_config['discount_']['symbol_grp'], $this->field_config['discount_']['symbol_dec'], "2", "S", $this->field_config['discount_']['format_neg'], "", "", "-", $this->field_config['discount_']['symbol_fmt']) ; 
      }
      if ('' !== $this->poriva_ || (!empty($format_fields) && isset($format_fields['poriva_'])))
      {
          nmgp_Form_Num_Val($this->poriva_, $this->field_config['poriva_']['symbol_grp'], $this->field_config['poriva_']['symbol_dec'], "2", "S", $this->field_config['poriva_']['format_neg'], "", "", "-", $this->field_config['poriva_']['symbol_fmt']) ; 
      }
      if ('' !== $this->precioventa_ || (!empty($format_fields) && isset($format_fields['precioventa_'])))
      {
          nmgp_Form_Num_Val($this->precioventa_, $this->field_config['precioventa_']['symbol_grp'], $this->field_config['precioventa_']['symbol_dec'], "9", "S", $this->field_config['precioventa_']['format_neg'], "", "", "-", $this->field_config['precioventa_']['symbol_fmt']) ; 
      }
      if ('' !== $this->minutos_ || (!empty($format_fields) && isset($format_fields['minutos_'])))
      {
          nmgp_Form_Num_Val($this->minutos_, $this->field_config['minutos_']['symbol_grp'], $this->field_config['minutos_']['symbol_dec'], "0", "S", $this->field_config['minutos_']['format_neg'], "", "", "-", $this->field_config['minutos_']['symbol_fmt']) ; 
      }
      if ('' !== $this->tokens_ || (!empty($format_fields) && isset($format_fields['tokens_'])))
      {
          nmgp_Form_Num_Val($this->tokens_, $this->field_config['tokens_']['symbol_grp'], $this->field_config['tokens_']['symbol_dec'], "0", "S", $this->field_config['tokens_']['format_neg'], "", "", "-", $this->field_config['tokens_']['symbol_fmt']) ; 
      }
      if ('' !== $this->score_ || (!empty($format_fields) && isset($format_fields['score_'])))
      {
          nmgp_Form_Num_Val($this->score_, $this->field_config['score_']['symbol_grp'], $this->field_config['score_']['symbol_dec'], "0", "S", $this->field_config['score_']['format_neg'], "", "", "-", $this->field_config['score_']['symbol_fmt']) ; 
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
      $guarda_format_hora = $this->field_config['dateproduct_']['date_format'];
      if ($this->dateproduct_ != "")  
      { 
          $nm_separa_data = strpos($this->field_config['dateproduct_']['date_format'], ";") ;
          $this->field_config['dateproduct_']['date_format'] = substr($this->field_config['dateproduct_']['date_format'], 0, $nm_separa_data) ;
          nm_conv_data($this->dateproduct_, $this->field_config['dateproduct_']['date_format']) ; 
          if ('pdo_sqlsrv' == strtolower($this->Ini->nm_tpbanco) || 'pdo_dblib' == strtolower($this->Ini->nm_tpbanco))
          {
              $this->dateproduct_ = str_replace('-', '', $this->dateproduct_);
          }
          $this->field_config['dateproduct_']['date_format'] = substr($guarda_format_hora, $nm_separa_data + 1) ;
          nm_conv_hora($this->dateproduct__hora, $this->field_config['dateproduct_']['date_format']) ; 
          if ($this->dateproduct__hora == "" )  
          { 
              $this->dateproduct__hora = "00:00:00:000" ; 
          }
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
          {
              $this->dateproduct__hora = substr($this->dateproduct__hora, 0, -4) . "." . substr($this->dateproduct__hora, -3);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
          {
              $this->dateproduct__hora = substr($this->dateproduct__hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->dateproduct__hora = substr($this->dateproduct__hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $this->dateproduct__hora = substr($this->dateproduct__hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $this->dateproduct__hora = substr($this->dateproduct__hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
          {
              $this->dateproduct__hora = substr($this->dateproduct__hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          {
              $this->dateproduct__hora = substr($this->dateproduct__hora, 0, -4);
          }
          if ($this->dateproduct_ != "")  
          { 
              $this->dateproduct_ .= " " . $this->dateproduct__hora ; 
          }
      } 
      if ($this->dateproduct_ == "" && $use_null)  
      { 
          $this->dateproduct_ = "null" ; 
      } 
      $this->field_config['dateproduct_']['date_format'] = $guarda_format_hora;
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
          $this->ajax_return_values_all_vert();
          if ('navigate_form' == $this->NM_ajax_opcao)
          {
              $this->NM_ajax_info['clearUpload']      = 'S';
              $this->NM_ajax_info['navStatus']['ret'] = $this->Nav_permite_ret ? 'S' : 'N';
              $this->NM_ajax_info['navStatus']['ava'] = $this->Nav_permite_ava ? 'S' : 'N';
              $this->NM_ajax_info['fldList']['id_product_']['keyVal'] = form_product_edit_masivo_pack_protect_string($this->nmgp_dados_form['id_product_']);
          }
   } // ajax_return_values
   function ajax_return_values_all_vert()
   {
          if (isset($this->nmgp_refresh_fields) && isset($this->nmgp_refresh_row) && '' != $this->nmgp_refresh_row)
          {
              $this->form_vert_form_product_edit_masivo[$this->nmgp_refresh_row] = $this->NM_ajax_info['param'];
              if ((isset($this->Embutida_ronly) && $this->Embutida_ronly) || $this->NM_ajax_force_values)
              {
                  if (isset($this->NM_ajax_changed['product_name_']) && $this->NM_ajax_changed['product_name_'])
                  {
                      $this->form_vert_form_product_edit_masivo[$this->nmgp_refresh_row]['product_name_'] = $this->product_name_;
                  }
                  if (isset($this->NM_ajax_changed['id_category_']) && $this->NM_ajax_changed['id_category_'])
                  {
                      $this->form_vert_form_product_edit_masivo[$this->nmgp_refresh_row]['id_category_'] = $this->id_category_;
                  }
                  if (isset($this->NM_ajax_changed['product_code_']) && $this->NM_ajax_changed['product_code_'])
                  {
                      $this->form_vert_form_product_edit_masivo[$this->nmgp_refresh_row]['product_code_'] = $this->product_code_;
                  }
                  if (isset($this->NM_ajax_changed['dateproduct_']) && $this->NM_ajax_changed['dateproduct_'])
                  {
                      $this->form_vert_form_product_edit_masivo[$this->nmgp_refresh_row]['dateproduct_'] = $this->dateproduct_;
                      $this->form_vert_form_product_edit_masivo[$this->nmgp_refresh_row]['dateproduct__hora'] = $this->dateproduct__hora;
                  }
                  if (isset($this->NM_ajax_changed['product_cost_']) && $this->NM_ajax_changed['product_cost_'])
                  {
                      $this->form_vert_form_product_edit_masivo[$this->nmgp_refresh_row]['product_cost_'] = $this->product_cost_;
                  }
                  if (isset($this->NM_ajax_changed['stock_']) && $this->NM_ajax_changed['stock_'])
                  {
                      $this->form_vert_form_product_edit_masivo[$this->nmgp_refresh_row]['stock_'] = $this->stock_;
                  }
                  if (isset($this->NM_ajax_changed['product_value_']) && $this->NM_ajax_changed['product_value_'])
                  {
                      $this->form_vert_form_product_edit_masivo[$this->nmgp_refresh_row]['product_value_'] = $this->product_value_;
                  }
                  if (isset($this->NM_ajax_changed['discount_']) && $this->NM_ajax_changed['discount_'])
                  {
                      $this->form_vert_form_product_edit_masivo[$this->nmgp_refresh_row]['discount_'] = $this->discount_;
                  }
                  if (isset($this->NM_ajax_changed['poriva_']) && $this->NM_ajax_changed['poriva_'])
                  {
                      $this->form_vert_form_product_edit_masivo[$this->nmgp_refresh_row]['poriva_'] = $this->poriva_;
                  }
                  if (isset($this->NM_ajax_changed['cuentaventa_']) && $this->NM_ajax_changed['cuentaventa_'])
                  {
                      $this->form_vert_form_product_edit_masivo[$this->nmgp_refresh_row]['cuentaventa_'] = $this->cuentaventa_;
                  }
                  if (isset($this->NM_ajax_changed['unidad_']) && $this->NM_ajax_changed['unidad_'])
                  {
                      $this->form_vert_form_product_edit_masivo[$this->nmgp_refresh_row]['unidad_'] = $this->unidad_;
                  }
                  if (isset($this->NM_ajax_changed['tipoitem_']) && $this->NM_ajax_changed['tipoitem_'])
                  {
                      $this->form_vert_form_product_edit_masivo[$this->nmgp_refresh_row]['tipoitem_'] = $this->tipoitem_;
                  }
                  if (isset($this->NM_ajax_changed['cuentacompra_']) && $this->NM_ajax_changed['cuentacompra_'])
                  {
                      $this->form_vert_form_product_edit_masivo[$this->nmgp_refresh_row]['cuentacompra_'] = $this->cuentacompra_;
                  }
                  if (isset($this->NM_ajax_changed['precioventa_']) && $this->NM_ajax_changed['precioventa_'])
                  {
                      $this->form_vert_form_product_edit_masivo[$this->nmgp_refresh_row]['precioventa_'] = $this->precioventa_;
                  }
                  if (isset($this->NM_ajax_changed['puntoventa_']) && $this->NM_ajax_changed['puntoventa_'])
                  {
                      $this->form_vert_form_product_edit_masivo[$this->nmgp_refresh_row]['puntoventa_'] = $this->puntoventa_;
                  }
                  if (isset($this->NM_ajax_changed['id_status_']) && $this->NM_ajax_changed['id_status_'])
                  {
                      $this->form_vert_form_product_edit_masivo[$this->nmgp_refresh_row]['id_status_'] = $this->id_status_;
                  }
                  if (isset($this->NM_ajax_changed['image_']) && $this->NM_ajax_changed['image_'])
                  {
                      $this->form_vert_form_product_edit_masivo[$this->nmgp_refresh_row]['image_'] = $this->image_;
                  }
                  if (isset($this->NM_ajax_changed['entrada_']) && $this->NM_ajax_changed['entrada_'])
                  {
                      $this->form_vert_form_product_edit_masivo[$this->nmgp_refresh_row]['entrada_'] = $this->entrada_;
                  }
                  if (isset($this->NM_ajax_changed['service_']) && $this->NM_ajax_changed['service_'])
                  {
                      $this->form_vert_form_product_edit_masivo[$this->nmgp_refresh_row]['service_'] = $this->service_;
                  }
                  if (isset($this->NM_ajax_changed['kiosko_']) && $this->NM_ajax_changed['kiosko_'])
                  {
                      $this->form_vert_form_product_edit_masivo[$this->nmgp_refresh_row]['kiosko_'] = $this->kiosko_;
                  }
                  if (isset($this->NM_ajax_changed['jugador_']) && $this->NM_ajax_changed['jugador_'])
                  {
                      $this->form_vert_form_product_edit_masivo[$this->nmgp_refresh_row]['jugador_'] = $this->jugador_;
                  }
                  if (isset($this->NM_ajax_changed['visitante_']) && $this->NM_ajax_changed['visitante_'])
                  {
                      $this->form_vert_form_product_edit_masivo[$this->nmgp_refresh_row]['visitante_'] = $this->visitante_;
                  }
                  if (isset($this->NM_ajax_changed['minutos_']) && $this->NM_ajax_changed['minutos_'])
                  {
                      $this->form_vert_form_product_edit_masivo[$this->nmgp_refresh_row]['minutos_'] = $this->minutos_;
                  }
                  if (isset($this->NM_ajax_changed['tarjeta_']) && $this->NM_ajax_changed['tarjeta_'])
                  {
                      $this->form_vert_form_product_edit_masivo[$this->nmgp_refresh_row]['tarjeta_'] = $this->tarjeta_;
                  }
                  if (isset($this->NM_ajax_changed['tokens_']) && $this->NM_ajax_changed['tokens_'])
                  {
                      $this->form_vert_form_product_edit_masivo[$this->nmgp_refresh_row]['tokens_'] = $this->tokens_;
                  }
                  if (isset($this->NM_ajax_changed['comida_']) && $this->NM_ajax_changed['comida_'])
                  {
                      $this->form_vert_form_product_edit_masivo[$this->nmgp_refresh_row]['comida_'] = $this->comida_;
                  }
                  if (isset($this->NM_ajax_changed['score_']) && $this->NM_ajax_changed['score_'])
                  {
                      $this->form_vert_form_product_edit_masivo[$this->nmgp_refresh_row]['score_'] = $this->score_;
                  }
              }
          }
          if (isset($this->nmgp_refresh_row) && '' != $this->nmgp_refresh_row)
          {
              $this->form_vert_form_product_edit_masivo[$this->nmgp_refresh_row]['product_name_'] = $this->product_name_;
              $this->form_vert_form_product_edit_masivo[$this->nmgp_refresh_row]['product_code_'] = $this->product_code_;
              $this->form_vert_form_product_edit_masivo[$this->nmgp_refresh_row]['cuentaventa_'] = $this->cuentaventa_;
              $this->form_vert_form_product_edit_masivo[$this->nmgp_refresh_row]['unidad_'] = $this->unidad_;
              $this->form_vert_form_product_edit_masivo[$this->nmgp_refresh_row]['tipoitem_'] = $this->tipoitem_;
              $this->form_vert_form_product_edit_masivo[$this->nmgp_refresh_row]['cuentacompra_'] = $this->cuentacompra_;
              if ('' == $this->form_vert_form_product_edit_masivo[$this->nmgp_refresh_row]['image_'] && '' != $this->image_)
              {
                  $this->form_vert_form_product_edit_masivo[$this->nmgp_refresh_row]['image_'] = $this->image_;
              }
          }
          $this->NM_ajax_info['rsSize']            = sizeof($this->form_vert_form_product_edit_masivo);
          $this->NM_ajax_info['buttonDisplayVert'] = array();
          foreach($this->form_vert_form_product_edit_masivo as $sc_seq_vert => $aRecData)
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
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("product_name_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['product_name_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['product_name_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'text',
                       'valList' => array($this->form_encode_input($sTmpValue)),
                       );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("id_category_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['id_category_']);
                  $aLookup = array();
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['Lookup_id_category_']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['Lookup_id_category_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['Lookup_id_category_']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['Lookup_id_category_'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_dateproduct_ = $this->dateproduct_;
   $old_value_dateproduct__hora = $this->dateproduct__hora;
   $old_value_product_cost_ = $this->product_cost_;
   $old_value_stock_ = $this->stock_;
   $old_value_product_value_ = $this->product_value_;
   $old_value_discount_ = $this->discount_;
   $old_value_poriva_ = $this->poriva_;
   $old_value_precioventa_ = $this->precioventa_;
   $old_value_minutos_ = $this->minutos_;
   $old_value_tokens_ = $this->tokens_;
   $old_value_score_ = $this->score_;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_dateproduct_ = $this->dateproduct_;
   $unformatted_value_dateproduct__hora = $this->dateproduct__hora;
   $unformatted_value_product_cost_ = $this->product_cost_;
   $unformatted_value_stock_ = $this->stock_;
   $unformatted_value_product_value_ = $this->product_value_;
   $unformatted_value_discount_ = $this->discount_;
   $unformatted_value_poriva_ = $this->poriva_;
   $unformatted_value_precioventa_ = $this->precioventa_;
   $unformatted_value_minutos_ = $this->minutos_;
   $unformatted_value_tokens_ = $this->tokens_;
   $unformatted_value_score_ = $this->score_;

   $nm_comando = "SELECT id_category, category  FROM category  ORDER BY category";

   $this->dateproduct_ = $old_value_dateproduct_;
   $this->dateproduct__hora = $old_value_dateproduct__hora;
   $this->product_cost_ = $old_value_product_cost_;
   $this->stock_ = $old_value_stock_;
   $this->product_value_ = $old_value_product_value_;
   $this->discount_ = $old_value_discount_;
   $this->poriva_ = $old_value_poriva_;
   $this->precioventa_ = $old_value_precioventa_;
   $this->minutos_ = $old_value_minutos_;
   $this->tokens_ = $old_value_tokens_;
   $this->score_ = $old_value_score_;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $aLookup[] = array(form_product_edit_masivo_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', form_product_edit_masivo_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['Lookup_id_category_'][] = $rs->fields[0];
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
          $sSelComp = "name=\"id_category_\"";
          if (isset($this->NM_ajax_info['select_html']['id_category_']) && !empty($this->NM_ajax_info['select_html']['id_category_']))
          {
              eval("\$sSelComp = \"" . str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['id_category_']) . "\";");
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
                  $this->NM_ajax_info['fldList']['id_category_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'select',
                       'valList' => array($sTmpValue),
               'optList' => $aLookup,
                       );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['id_category_' . $sc_seq_vert]['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['id_category_' . $sc_seq_vert]['valList'][$i] = form_product_edit_masivo_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['id_category_' . $sc_seq_vert]['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['id_category_' . $sc_seq_vert]['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['id_category_' . $sc_seq_vert]['labList'] = $aLabel;
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("product_code_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['product_code_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['product_code_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'text',
                       'valList' => array($this->form_encode_input($sTmpValue)),
                       );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("dateproduct_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['dateproduct_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['dateproduct_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'label',
                       'valList' => array($aRecData['dateproduct_'] . ' ' . $aRecData['dateproduct__hora']),
                       );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("product_cost_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['product_cost_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['product_cost_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'text',
                       'valList' => array($sTmpValue),
                       );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("stock_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['stock_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['stock_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'text',
                       'valList' => array($sTmpValue),
                       );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("product_value_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['product_value_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['product_value_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'text',
                       'valList' => array($sTmpValue),
                       );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("discount_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['discount_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['discount_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'text',
                       'valList' => array($sTmpValue),
                       );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("poriva_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['poriva_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['poriva_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'text',
                       'valList' => array($sTmpValue),
                       );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("cuentaventa_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['cuentaventa_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['cuentaventa_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'text',
                       'valList' => array($this->form_encode_input($sTmpValue)),
                       );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("unidad_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['unidad_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['unidad_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'text',
                       'valList' => array($this->form_encode_input($sTmpValue)),
                       );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("tipoitem_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['tipoitem_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['tipoitem_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'text',
                       'valList' => array($this->form_encode_input($sTmpValue)),
                       );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("cuentacompra_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['cuentacompra_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['cuentacompra_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'text',
                       'valList' => array($this->form_encode_input($sTmpValue)),
                       );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("precioventa_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['precioventa_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['precioventa_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'text',
                       'valList' => array($sTmpValue),
                       );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("puntoventa_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['puntoventa_']);
                  $aLookup = array();
$aLookup[] = array(form_product_edit_masivo_pack_protect_string('1') => str_replace('<', '&lt;',form_product_edit_masivo_pack_protect_string("SI")));
$aLookup[] = array(form_product_edit_masivo_pack_protect_string('0') => str_replace('<', '&lt;',form_product_edit_masivo_pack_protect_string("NO")));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['Lookup_puntoventa_'][] = '1';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['Lookup_puntoventa_'][] = '0';
          $aLookupOrig = $aLookup;
          $sOptComp = "";
          if (isset($this->NM_ajax_info['select_html']['puntoventa_']) && !empty($this->NM_ajax_info['select_html']['puntoventa_']))
          {
              eval("\$sOptComp = \"" . str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['puntoventa_']) . "\";");
          }
                  $this->NM_ajax_info['fldList']['puntoventa_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'radio',
                       'switch'  => false,
                       'valList' => array($sTmpValue),
               'colNum'  => 1,
               'optComp'  => $sOptComp,
                       );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['puntoventa_' . $sc_seq_vert]['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['puntoventa_' . $sc_seq_vert]['valList'][$i] = form_product_edit_masivo_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['puntoventa_' . $sc_seq_vert]['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['puntoventa_' . $sc_seq_vert]['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['puntoventa_' . $sc_seq_vert]['labList'] = $aLabel;
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("id_status_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['id_status_']);
                  $aLookup = array();
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['Lookup_id_status_']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['Lookup_id_status_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['Lookup_id_status_']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['Lookup_id_status_'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_dateproduct_ = $this->dateproduct_;
   $old_value_dateproduct__hora = $this->dateproduct__hora;
   $old_value_product_cost_ = $this->product_cost_;
   $old_value_stock_ = $this->stock_;
   $old_value_product_value_ = $this->product_value_;
   $old_value_discount_ = $this->discount_;
   $old_value_poriva_ = $this->poriva_;
   $old_value_precioventa_ = $this->precioventa_;
   $old_value_minutos_ = $this->minutos_;
   $old_value_tokens_ = $this->tokens_;
   $old_value_score_ = $this->score_;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_dateproduct_ = $this->dateproduct_;
   $unformatted_value_dateproduct__hora = $this->dateproduct__hora;
   $unformatted_value_product_cost_ = $this->product_cost_;
   $unformatted_value_stock_ = $this->stock_;
   $unformatted_value_product_value_ = $this->product_value_;
   $unformatted_value_discount_ = $this->discount_;
   $unformatted_value_poriva_ = $this->poriva_;
   $unformatted_value_precioventa_ = $this->precioventa_;
   $unformatted_value_minutos_ = $this->minutos_;
   $unformatted_value_tokens_ = $this->tokens_;
   $unformatted_value_score_ = $this->score_;

   $nm_comando = "SELECT id_status, status  FROM status  ORDER BY status";

   $this->dateproduct_ = $old_value_dateproduct_;
   $this->dateproduct__hora = $old_value_dateproduct__hora;
   $this->product_cost_ = $old_value_product_cost_;
   $this->stock_ = $old_value_stock_;
   $this->product_value_ = $old_value_product_value_;
   $this->discount_ = $old_value_discount_;
   $this->poriva_ = $old_value_poriva_;
   $this->precioventa_ = $old_value_precioventa_;
   $this->minutos_ = $old_value_minutos_;
   $this->tokens_ = $old_value_tokens_;
   $this->score_ = $old_value_score_;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $aLookup[] = array(form_product_edit_masivo_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', form_product_edit_masivo_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['Lookup_id_status_'][] = $rs->fields[0];
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
          $sSelComp = "name=\"id_status_\"";
          if (isset($this->NM_ajax_info['select_html']['id_status_']) && !empty($this->NM_ajax_info['select_html']['id_status_']))
          {
              eval("\$sSelComp = \"" . str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['id_status_']) . "\";");
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
                  $this->NM_ajax_info['fldList']['id_status_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'select',
                       'valList' => array($sTmpValue),
               'optList' => $aLookup,
                       );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['id_status_' . $sc_seq_vert]['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['id_status_' . $sc_seq_vert]['valList'][$i] = form_product_edit_masivo_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['id_status_' . $sc_seq_vert]['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['id_status_' . $sc_seq_vert]['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['id_status_' . $sc_seq_vert]['labList'] = $aLabel;
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("image_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['image_']);
                  $aLookup = array();
   $sKeepImage = 'N';
   if ('' == $aRecData['image_'] && isset($aRecData['image__limpa']) && 'N' == $aRecData['image__limpa'])
   {
       $sKeepImage = 'S';
   }
   $out_image_ = '';
   $out1_image_ = '';
   $guarda_image_ = $this->image_;
   $this->image_  = $aRecData['image_'];
   if ($this->image_ != "" && $this->image_ != "none")   
   { 
       $out_image_ = $this->Ini->path_imag_temp . "/sc_image__" . $_SESSION['scriptcase']['sc_num_img'] . session_id() . ".gif" ;  
       $out1_image_ = $out_image_; 
       $arq_image_ = fopen($this->Ini->root . $out_image_, "w") ;  
       if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access)) 
       { 
           $nm_tmp = nm_conv_img_access(substr($this->image_, 0, 12));
           if (substr($this->image_, 0, 4) != "*nm*" && substr($nm_tmp, 0, 4) == "*nm*") 
           { 
               $this->image_ = nm_conv_img_access($this->image_);
           } 
       } 
       if (substr($this->image_, 0, 4) == "*nm*") 
       { 
           $this->image_ = substr($this->image_, 4) ; 
           $this->image_ = base64_decode($this->image_) ; 
       } 
       $img_pos_bm = strpos($this->image_, "BM") ; 
       if (!$img_pos_bm === FALSE && $img_pos_bm == 78) 
       { 
           $this->image_ = substr($this->image_, $img_pos_bm) ; 
       } 
       fwrite($arq_image_, $this->image_) ;  
       fclose($arq_image_) ;  
       $sc_obj_img = new nm_trata_img($this->Ini->root . $out_image_, true);
       $this->nmgp_return_img['image_'][0] = $sc_obj_img->getHeight();
       $this->nmgp_return_img['image_'][1] = $sc_obj_img->getWidth();
       $_SESSION['scriptcase']['sc_num_img']++ ; 
       $out_image_ = $this->Ini->path_imag_temp . "/sc_" . "image__" . $_SESSION['scriptcase']['sc_num_img'] . session_id() . ".gif" ; 
       $_SESSION['scriptcase']['sc_num_img']++ ; 
       if (!$this->Ini->Gd_missing)
       { 
           $sc_obj_img = new nm_trata_img($this->Ini->root . $out1_image_, true);
           $sc_obj_img->setWidth(200);
           $sc_obj_img->setHeight(200);
           $sc_obj_img->setManterAspecto(true);
           $sc_obj_img->createImg($this->Ini->root . $out_image_);
       } 
       else 
       { 
           $out_image_ = $out1_image_;
       } 
       $_SESSION['scriptcase']['sc_num_img']++ ; 
   } 
   $this->image_  = $guarda_image_;
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['image_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'imagem',
                       'valList' => array($this->Ini->Nm_lang['lang_othr_show_imgg']),
                       'imgFile' => $out_image_,
                       'imgOrig' => $out1_image_,
               'keepImg' => $sKeepImage,
                       );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("entrada_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['entrada_']);
                  $aLookup = array();
$aLookup[] = array(form_product_edit_masivo_pack_protect_string('1') => str_replace('<', '&lt;',form_product_edit_masivo_pack_protect_string("SI")));
$aLookup[] = array(form_product_edit_masivo_pack_protect_string('0') => str_replace('<', '&lt;',form_product_edit_masivo_pack_protect_string("NO")));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['Lookup_entrada_'][] = '1';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['Lookup_entrada_'][] = '0';
          $aLookupOrig = $aLookup;
          $sOptComp = "";
          if (isset($this->NM_ajax_info['select_html']['entrada_']) && !empty($this->NM_ajax_info['select_html']['entrada_']))
          {
              eval("\$sOptComp = \"" . str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['entrada_']) . "\";");
          }
                  $this->NM_ajax_info['fldList']['entrada_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'radio',
                       'switch'  => false,
                       'valList' => array($sTmpValue),
               'colNum'  => 1,
               'optComp'  => $sOptComp,
                       );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['entrada_' . $sc_seq_vert]['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['entrada_' . $sc_seq_vert]['valList'][$i] = form_product_edit_masivo_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['entrada_' . $sc_seq_vert]['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['entrada_' . $sc_seq_vert]['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['entrada_' . $sc_seq_vert]['labList'] = $aLabel;
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("service_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['service_']);
                  $aLookup = array();
$aLookup[] = array(form_product_edit_masivo_pack_protect_string('1') => str_replace('<', '&lt;',form_product_edit_masivo_pack_protect_string("SI")));
$aLookup[] = array(form_product_edit_masivo_pack_protect_string('0') => str_replace('<', '&lt;',form_product_edit_masivo_pack_protect_string("NO")));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['Lookup_service_'][] = '1';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['Lookup_service_'][] = '0';
          $aLookupOrig = $aLookup;
          $sOptComp = "";
          if (isset($this->NM_ajax_info['select_html']['service_']) && !empty($this->NM_ajax_info['select_html']['service_']))
          {
              eval("\$sOptComp = \"" . str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['service_']) . "\";");
          }
                  $this->NM_ajax_info['fldList']['service_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'radio',
                       'switch'  => false,
                       'valList' => array($sTmpValue),
               'colNum'  => 1,
               'optComp'  => $sOptComp,
                       );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['service_' . $sc_seq_vert]['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['service_' . $sc_seq_vert]['valList'][$i] = form_product_edit_masivo_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['service_' . $sc_seq_vert]['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['service_' . $sc_seq_vert]['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['service_' . $sc_seq_vert]['labList'] = $aLabel;
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("kiosko_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['kiosko_']);
                  $aLookup = array();
$aLookup[] = array(form_product_edit_masivo_pack_protect_string('1') => str_replace('<', '&lt;',form_product_edit_masivo_pack_protect_string("SI")));
$aLookup[] = array(form_product_edit_masivo_pack_protect_string('0') => str_replace('<', '&lt;',form_product_edit_masivo_pack_protect_string("NO")));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['Lookup_kiosko_'][] = '1';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['Lookup_kiosko_'][] = '0';
          $aLookupOrig = $aLookup;
          $sOptComp = "";
          if (isset($this->NM_ajax_info['select_html']['kiosko_']) && !empty($this->NM_ajax_info['select_html']['kiosko_']))
          {
              eval("\$sOptComp = \"" . str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['kiosko_']) . "\";");
          }
                  $this->NM_ajax_info['fldList']['kiosko_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'radio',
                       'switch'  => false,
                       'valList' => array($sTmpValue),
               'colNum'  => 1,
               'optComp'  => $sOptComp,
                       );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['kiosko_' . $sc_seq_vert]['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['kiosko_' . $sc_seq_vert]['valList'][$i] = form_product_edit_masivo_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['kiosko_' . $sc_seq_vert]['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['kiosko_' . $sc_seq_vert]['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['kiosko_' . $sc_seq_vert]['labList'] = $aLabel;
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("jugador_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['jugador_']);
                  $aLookup = array();
$aLookup[] = array(form_product_edit_masivo_pack_protect_string('1') => str_replace('<', '&lt;',form_product_edit_masivo_pack_protect_string("SI")));
$aLookup[] = array(form_product_edit_masivo_pack_protect_string('0') => str_replace('<', '&lt;',form_product_edit_masivo_pack_protect_string("NO")));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['Lookup_jugador_'][] = '1';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['Lookup_jugador_'][] = '0';
          $aLookupOrig = $aLookup;
          $sOptComp = "";
          if (isset($this->NM_ajax_info['select_html']['jugador_']) && !empty($this->NM_ajax_info['select_html']['jugador_']))
          {
              eval("\$sOptComp = \"" . str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['jugador_']) . "\";");
          }
                  $this->NM_ajax_info['fldList']['jugador_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'radio',
                       'switch'  => false,
                       'valList' => array($sTmpValue),
               'colNum'  => 1,
               'optComp'  => $sOptComp,
                       );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['jugador_' . $sc_seq_vert]['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['jugador_' . $sc_seq_vert]['valList'][$i] = form_product_edit_masivo_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['jugador_' . $sc_seq_vert]['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['jugador_' . $sc_seq_vert]['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['jugador_' . $sc_seq_vert]['labList'] = $aLabel;
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("visitante_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['visitante_']);
                  $aLookup = array();
$aLookup[] = array(form_product_edit_masivo_pack_protect_string('1') => str_replace('<', '&lt;',form_product_edit_masivo_pack_protect_string("SI")));
$aLookup[] = array(form_product_edit_masivo_pack_protect_string('0') => str_replace('<', '&lt;',form_product_edit_masivo_pack_protect_string("NO")));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['Lookup_visitante_'][] = '1';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['Lookup_visitante_'][] = '0';
          $aLookupOrig = $aLookup;
          $sOptComp = "";
          if (isset($this->NM_ajax_info['select_html']['visitante_']) && !empty($this->NM_ajax_info['select_html']['visitante_']))
          {
              eval("\$sOptComp = \"" . str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['visitante_']) . "\";");
          }
                  $this->NM_ajax_info['fldList']['visitante_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'radio',
                       'switch'  => false,
                       'valList' => array($sTmpValue),
               'colNum'  => 1,
               'optComp'  => $sOptComp,
                       );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['visitante_' . $sc_seq_vert]['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['visitante_' . $sc_seq_vert]['valList'][$i] = form_product_edit_masivo_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['visitante_' . $sc_seq_vert]['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['visitante_' . $sc_seq_vert]['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['visitante_' . $sc_seq_vert]['labList'] = $aLabel;
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("minutos_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['minutos_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['minutos_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'text',
                       'valList' => array($sTmpValue),
                       );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("tarjeta_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['tarjeta_']);
                  $aLookup = array();
$aLookup[] = array(form_product_edit_masivo_pack_protect_string('1') => str_replace('<', '&lt;',form_product_edit_masivo_pack_protect_string("SI")));
$aLookup[] = array(form_product_edit_masivo_pack_protect_string('0') => str_replace('<', '&lt;',form_product_edit_masivo_pack_protect_string("NO")));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['Lookup_tarjeta_'][] = '1';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['Lookup_tarjeta_'][] = '0';
          $aLookupOrig = $aLookup;
          $sOptComp = "";
          if (isset($this->NM_ajax_info['select_html']['tarjeta_']) && !empty($this->NM_ajax_info['select_html']['tarjeta_']))
          {
              eval("\$sOptComp = \"" . str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['tarjeta_']) . "\";");
          }
                  $this->NM_ajax_info['fldList']['tarjeta_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'radio',
                       'switch'  => false,
                       'valList' => array($sTmpValue),
               'colNum'  => 1,
               'optComp'  => $sOptComp,
                       );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['tarjeta_' . $sc_seq_vert]['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['tarjeta_' . $sc_seq_vert]['valList'][$i] = form_product_edit_masivo_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['tarjeta_' . $sc_seq_vert]['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['tarjeta_' . $sc_seq_vert]['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['tarjeta_' . $sc_seq_vert]['labList'] = $aLabel;
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("tokens_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['tokens_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['tokens_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'text',
                       'valList' => array($sTmpValue),
                       );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("comida_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['comida_']);
                  $aLookup = array();
$aLookup[] = array(form_product_edit_masivo_pack_protect_string('1') => str_replace('<', '&lt;',form_product_edit_masivo_pack_protect_string("SI")));
$aLookup[] = array(form_product_edit_masivo_pack_protect_string('0') => str_replace('<', '&lt;',form_product_edit_masivo_pack_protect_string("NO")));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['Lookup_comida_'][] = '1';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['Lookup_comida_'][] = '0';
          $aLookupOrig = $aLookup;
          $sOptComp = "";
          if (isset($this->NM_ajax_info['select_html']['comida_']) && !empty($this->NM_ajax_info['select_html']['comida_']))
          {
              eval("\$sOptComp = \"" . str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['comida_']) . "\";");
          }
                  $this->NM_ajax_info['fldList']['comida_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'radio',
                       'switch'  => false,
                       'valList' => array($sTmpValue),
               'colNum'  => 1,
               'optComp'  => $sOptComp,
                       );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['comida_' . $sc_seq_vert]['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['comida_' . $sc_seq_vert]['valList'][$i] = form_product_edit_masivo_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['comida_' . $sc_seq_vert]['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['comida_' . $sc_seq_vert]['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['comida_' . $sc_seq_vert]['labList'] = $aLabel;
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("score_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['score_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['score_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'text',
                       'valList' => array($sTmpValue),
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
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['upload_dir'][$fieldName]))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['upload_dir'][$fieldName] = array();
            $resDir = @opendir($uploadDir);
            if (!$resDir)
            {
                return $originalName;
            }
            while (false !== ($fileName = @readdir($resDir)))
            {
                if (@is_file($uploadDir . $fileName))
                {
                    $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['upload_dir'][$fieldName][] = $fileName;
                }
            }
            @closedir($resDir);
        }
        if (!in_array($originalName, $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['upload_dir'][$fieldName]))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['upload_dir'][$fieldName][] = $originalName;
            return $originalName;
        }
        else
        {
            $newName = $this->fetchFileNextName($originalName, $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['upload_dir'][$fieldName]);
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['upload_dir'][$fieldName][] = $newName;
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
      $this->product_cost_ = str_replace($sc_parm1, $sc_parm2, $this->product_cost_); 
      $this->product_value_ = str_replace($sc_parm1, $sc_parm2, $this->product_value_); 
      $this->discount_ = str_replace($sc_parm1, $sc_parm2, $this->discount_); 
      $this->poriva_ = str_replace($sc_parm1, $sc_parm2, $this->poriva_); 
      $this->precioventa_ = str_replace($sc_parm1, $sc_parm2, $this->precioventa_); 
   } 
   function nm_poe_aspas_decimal() 
   { 
      $this->product_cost_ = "'" . $this->product_cost_ . "'";
      $this->product_value_ = "'" . $this->product_value_ . "'";
      $this->discount_ = "'" . $this->discount_ . "'";
      $this->poriva_ = "'" . $this->poriva_ . "'";
      $this->precioventa_ = "'" . $this->precioventa_ . "'";
   } 
   function nm_tira_aspas_decimal() 
   { 
      $this->product_cost_ = str_replace("'", "", $this->product_cost_); 
      $this->product_value_ = str_replace("'", "", $this->product_value_); 
      $this->discount_ = str_replace("'", "", $this->discount_); 
      $this->poriva_ = str_replace("'", "", $this->poriva_); 
      $this->precioventa_ = str_replace("'", "", $this->precioventa_); 
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
      $this->SC_log_atv = false;
      if ("alterar" == $this->nmgp_opcao || "excluir" == $this->nmgp_opcao)
      {
          $this->NM_gera_log_key($this->nmgp_opcao);
      }
      if ("alterar" == $this->nmgp_opcao || "excluir" == $this->nmgp_opcao)
      {
          $this->NM_gera_log_old($sc_seq_vert);
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
      $_SESSION['scriptcase']['form_product_edit_masivo']['contr_erro'] = 'on';
             /* loss_detail */
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
      {
          $sc_cmd_dependency = "SELECT COUNT(*) AS countTest FROM loss_detail WHERE id_product = " . $this->id_product_ ;
      }
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      {
          $sc_cmd_dependency = "SELECT COUNT(*) AS countTest FROM loss_detail WHERE id_product = " . $this->id_product_ ;
      }
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
      {
          $sc_cmd_dependency = "SELECT COUNT(*) AS countTest FROM loss_detail WHERE id_product = " . $this->id_product_ ;
      }
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
      {
          $sc_cmd_dependency = "SELECT COUNT(*) AS countTest FROM loss_detail WHERE id_product = " . $this->id_product_ ;
      }
      else
      {
          $sc_cmd_dependency = "SELECT COUNT(*) AS countTest FROM loss_detail WHERE id_product = " . $this->id_product_ ;
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
   $sErrorIndex = 'geral_form_product_edit_masivo';
  } elseif ('submit_form' == $this->NM_ajax_opcao) {
   $sErrorIndex = 'geral_form_product_edit_masivo';
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
          $sc_cmd_dependency = "SELECT COUNT(*) AS countTest FROM purchase_detail WHERE id_product = " . $this->id_product_ ;
      }
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      {
          $sc_cmd_dependency = "SELECT COUNT(*) AS countTest FROM purchase_detail WHERE id_product = " . $this->id_product_ ;
      }
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
      {
          $sc_cmd_dependency = "SELECT COUNT(*) AS countTest FROM purchase_detail WHERE id_product = " . $this->id_product_ ;
      }
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
      {
          $sc_cmd_dependency = "SELECT COUNT(*) AS countTest FROM purchase_detail WHERE id_product = " . $this->id_product_ ;
      }
      else
      {
          $sc_cmd_dependency = "SELECT COUNT(*) AS countTest FROM purchase_detail WHERE id_product = " . $this->id_product_ ;
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
   $sErrorIndex = 'geral_form_product_edit_masivo';
  } elseif ('submit_form' == $this->NM_ajax_opcao) {
   $sErrorIndex = 'geral_form_product_edit_masivo';
  } else {
   $sErrorIndex = substr(substr($this->NM_ajax_opcao, 0, strrpos($this->NM_ajax_opcao, '_')), 6);
  }
  $this->NM_ajax_info['errList'][$sErrorIndex][] = "" . $this->Ini->Nm_lang['lang_errm_dele_rhcr'] . "";
 }
;
      }
$_SESSION['scriptcase']['form_product_edit_masivo']['contr_erro'] = 'off'; 
    }
      if (!empty($this->Campos_Mens_erro)) 
      {
          return;
      }
      if ($this->nmgp_opcao == "alterar")
      {
          $this->nmgp_dados_select = $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['dados_select'][$sc_seq_vert];
          if ($this->nmgp_dados_select['product_name_'] == $this->product_name_ &&
              $this->nmgp_dados_select['id_category_'] == $this->id_category_ &&
              $this->nmgp_dados_select['product_code_'] == $this->product_code_ &&
              $this->nmgp_dados_select['dateproduct_'] == $this->dateproduct_ &&
              $this->nmgp_dados_select['product_cost_'] == $this->product_cost_ &&
              $this->nmgp_dados_select['stock_'] == $this->stock_ &&
              $this->nmgp_dados_select['product_value_'] == $this->product_value_ &&
              $this->nmgp_dados_select['discount_'] == $this->discount_ &&
              $this->nmgp_dados_select['poriva_'] == $this->poriva_ &&
              $this->nmgp_dados_select['cuentaventa_'] == $this->cuentaventa_ &&
              $this->nmgp_dados_select['unidad_'] == $this->unidad_ &&
              $this->nmgp_dados_select['tipoitem_'] == $this->tipoitem_ &&
              $this->nmgp_dados_select['cuentacompra_'] == $this->cuentacompra_ &&
              $this->nmgp_dados_select['precioventa_'] == $this->precioventa_ &&
              $this->nmgp_dados_select['puntoventa_'] == $this->puntoventa_ &&
              $this->nmgp_dados_select['id_status_'] == $this->id_status_ &&
              $this->nmgp_dados_select['image_'] == $this->image_ &&
              $this->nmgp_dados_select['entrada_'] == $this->entrada_ &&
              $this->nmgp_dados_select['service_'] == $this->service_ &&
              $this->nmgp_dados_select['kiosko_'] == $this->kiosko_ &&
              $this->nmgp_dados_select['jugador_'] == $this->jugador_ &&
              $this->nmgp_dados_select['visitante_'] == $this->visitante_ &&
              $this->nmgp_dados_select['minutos_'] == $this->minutos_ &&
              $this->nmgp_dados_select['tarjeta_'] == $this->tarjeta_ &&
              $this->nmgp_dados_select['tokens_'] == $this->tokens_ &&
              $this->nmgp_dados_select['comida_'] == $this->comida_ &&
              $this->nmgp_dados_select['score_'] == $this->score_)
          { }
          else
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['dados_select'][$sc_seq_vert]['product_name_'] = $this->product_name_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['dados_select'][$sc_seq_vert]['id_category_'] = $this->id_category_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['dados_select'][$sc_seq_vert]['product_code_'] = $this->product_code_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['dados_select'][$sc_seq_vert]['dateproduct_'] = $this->dateproduct_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['dados_select'][$sc_seq_vert]['product_cost_'] = $this->product_cost_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['dados_select'][$sc_seq_vert]['stock_'] = $this->stock_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['dados_select'][$sc_seq_vert]['product_value_'] = $this->product_value_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['dados_select'][$sc_seq_vert]['discount_'] = $this->discount_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['dados_select'][$sc_seq_vert]['poriva_'] = $this->poriva_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['dados_select'][$sc_seq_vert]['cuentaventa_'] = $this->cuentaventa_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['dados_select'][$sc_seq_vert]['unidad_'] = $this->unidad_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['dados_select'][$sc_seq_vert]['tipoitem_'] = $this->tipoitem_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['dados_select'][$sc_seq_vert]['cuentacompra_'] = $this->cuentacompra_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['dados_select'][$sc_seq_vert]['precioventa_'] = $this->precioventa_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['dados_select'][$sc_seq_vert]['puntoventa_'] = $this->puntoventa_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['dados_select'][$sc_seq_vert]['id_status_'] = $this->id_status_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['dados_select'][$sc_seq_vert]['image_'] = $this->image_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['dados_select'][$sc_seq_vert]['entrada_'] = $this->entrada_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['dados_select'][$sc_seq_vert]['service_'] = $this->service_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['dados_select'][$sc_seq_vert]['kiosko_'] = $this->kiosko_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['dados_select'][$sc_seq_vert]['jugador_'] = $this->jugador_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['dados_select'][$sc_seq_vert]['visitante_'] = $this->visitante_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['dados_select'][$sc_seq_vert]['minutos_'] = $this->minutos_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['dados_select'][$sc_seq_vert]['tarjeta_'] = $this->tarjeta_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['dados_select'][$sc_seq_vert]['tokens_'] = $this->tokens_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['dados_select'][$sc_seq_vert]['comida_'] = $this->comida_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['dados_select'][$sc_seq_vert]['score_'] = $this->score_;
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
      $NM_val_form['product_name_'] = $this->product_name_;
      $NM_val_form['id_category_'] = $this->id_category_;
      $NM_val_form['product_code_'] = $this->product_code_;
      $NM_val_form['dateproduct_'] = $this->dateproduct_;
      $NM_val_form['product_cost_'] = $this->product_cost_;
      $NM_val_form['stock_'] = $this->stock_;
      $NM_val_form['product_value_'] = $this->product_value_;
      $NM_val_form['discount_'] = $this->discount_;
      $NM_val_form['poriva_'] = $this->poriva_;
      $NM_val_form['cuentaventa_'] = $this->cuentaventa_;
      $NM_val_form['unidad_'] = $this->unidad_;
      $NM_val_form['tipoitem_'] = $this->tipoitem_;
      $NM_val_form['cuentacompra_'] = $this->cuentacompra_;
      $NM_val_form['precioventa_'] = $this->precioventa_;
      $NM_val_form['puntoventa_'] = $this->puntoventa_;
      $NM_val_form['id_status_'] = $this->id_status_;
      $NM_val_form['image_'] = $this->image_;
      $NM_val_form['entrada_'] = $this->entrada_;
      $NM_val_form['service_'] = $this->service_;
      $NM_val_form['kiosko_'] = $this->kiosko_;
      $NM_val_form['jugador_'] = $this->jugador_;
      $NM_val_form['visitante_'] = $this->visitante_;
      $NM_val_form['minutos_'] = $this->minutos_;
      $NM_val_form['tarjeta_'] = $this->tarjeta_;
      $NM_val_form['tokens_'] = $this->tokens_;
      $NM_val_form['comida_'] = $this->comida_;
      $NM_val_form['score_'] = $this->score_;
      $NM_val_form['id_product_'] = $this->id_product_;
      if ($this->id_product_ === "" || is_null($this->id_product_))  
      { 
          $this->id_product_ = 0;
      } 
      if ($this->id_status_ === "" || is_null($this->id_status_))  
      { 
          $this->id_status_ = 0;
          $this->sc_force_zero[] = 'id_status_';
      } 
      if ($this->product_value_ === "" || is_null($this->product_value_))  
      { 
          $this->product_value_ = 0;
          $this->sc_force_zero[] = 'product_value_';
      } 
      if ($this->product_cost_ === "" || is_null($this->product_cost_))  
      { 
          $this->product_cost_ = 0;
          $this->sc_force_zero[] = 'product_cost_';
      } 
      if ($this->discount_ === "" || is_null($this->discount_))  
      { 
          $this->discount_ = 0;
          $this->sc_force_zero[] = 'discount_';
      } 
      if ($this->stock_ === "" || is_null($this->stock_))  
      { 
          $this->stock_ = 0;
          $this->sc_force_zero[] = 'stock_';
      } 
      if ($this->id_category_ === "" || is_null($this->id_category_))  
      { 
          $this->id_category_ = 0;
          $this->sc_force_zero[] = 'id_category_';
      } 
      if ($this->service_ === "" || is_null($this->service_))  
      { 
          $this->service_ = 0;
          $this->sc_force_zero[] = 'service_';
      } 
      if ($this->kiosko_ === "" || is_null($this->kiosko_))  
      { 
          $this->kiosko_ = 0;
          $this->sc_force_zero[] = 'kiosko_';
      } 
      if ($this->entrada_ === "" || is_null($this->entrada_))  
      { 
          $this->entrada_ = 0;
          $this->sc_force_zero[] = 'entrada_';
      } 
      if ($this->jugador_ === "" || is_null($this->jugador_))  
      { 
          $this->jugador_ = 0;
          $this->sc_force_zero[] = 'jugador_';
      } 
      if ($this->visitante_ === "" || is_null($this->visitante_))  
      { 
          $this->visitante_ = 0;
          $this->sc_force_zero[] = 'visitante_';
      } 
      if ($this->tarjeta_ === "" || is_null($this->tarjeta_))  
      { 
          $this->tarjeta_ = 0;
          $this->sc_force_zero[] = 'tarjeta_';
      } 
      if ($this->minutos_ === "" || is_null($this->minutos_))  
      { 
          $this->minutos_ = 0;
          $this->sc_force_zero[] = 'minutos_';
      } 
      if ($this->tokens_ === "" || is_null($this->tokens_))  
      { 
          $this->tokens_ = 0;
          $this->sc_force_zero[] = 'tokens_';
      } 
      if ($this->comida_ === "" || is_null($this->comida_))  
      { 
          $this->comida_ = 0;
          $this->sc_force_zero[] = 'comida_';
      } 
      if ($this->score_ === "" || is_null($this->score_))  
      { 
          $this->score_ = 0;
          $this->sc_force_zero[] = 'score_';
      } 
      if ($this->poriva_ === "" || is_null($this->poriva_))  
      { 
          $this->poriva_ = 0;
          $this->sc_force_zero[] = 'poriva_';
      } 
      if ($this->precioventa_ === "" || is_null($this->precioventa_))  
      { 
          $this->precioventa_ = 0;
          $this->sc_force_zero[] = 'precioventa_';
      } 
      if ($this->puntoventa_ === "" || is_null($this->puntoventa_))  
      { 
          $this->puntoventa_ = 0;
          $this->sc_force_zero[] = 'puntoventa_';
      } 
      $nm_bases_lob_geral = array_merge($this->Ini->nm_bases_oracle, $this->Ini->nm_bases_ibase, $this->Ini->nm_bases_informix, $this->Ini->nm_bases_mysql, $this->Ini->nm_bases_access, $this->Ini->nm_bases_sqlite, array('pdo_ibm'), array('pdo_sqlsrv'));
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['decimal_db'] == ",") 
      {
          $this->nm_troca_decimal(".", ",");
      }
      if ($this->nmgp_opcao == "alterar" || $this->nmgp_opcao == "incluir") 
      {
          $this->product_name__before_qstr = $this->product_name_;
          $this->product_name_ = substr($this->Db->qstr($this->product_name_), 1, -1); 
          if ($this->product_name_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->product_name_ = "null"; 
              $NM_val_null[] = "product_name_";
          } 
          $this->product_code__before_qstr = $this->product_code_;
          $this->product_code_ = substr($this->Db->qstr($this->product_code_), 1, -1); 
          if ($this->product_code_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->product_code_ = "null"; 
              $NM_val_null[] = "product_code_";
          } 
          if ($this->dateproduct_ == "")  
          { 
              $this->dateproduct_ = "null"; 
              $NM_val_null[] = "dateproduct_";
          } 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          { 
              $nm_tmp = nm_conv_img_access(substr($this->image_, 0, 12));
              if (substr($this->image_, 0, 4) != "*nm*" && substr($nm_tmp, 0, 4) == "*nm*") 
              { 
                  $this->image_ = nm_conv_img_access($this->image_);
              } 
              if (!empty($this->image_) && $this->image_ != 'null' && substr($this->image_, 0, 4) != "*nm*") 
              { 
                  $this->image_ = "*nm*" . base64_encode($this->image_) ; 
              } 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          { 
              if ($this->Ini->nm_tpbanco != "pdo_sqlsrv" && !empty($this->image_) && $this->image_ != 'null' && substr($this->image_, 0, 4) != "*nm*") 
              { 
                  $this->image_ = "*nm*" . base64_encode($this->image_) ; 
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
              if ($this->Ini->nm_tpbanco != 'pdo_ibm' && !empty($this->image_) && $this->image_ != 'null' && substr($this->image_, 0, 4) != "*nm*") 
              { 
                  $this->image_ = "*nm*" . base64_encode($this->image_) ; 
              } 
          } 
          else
          { 
              $this->image_ =  substr($this->Db->qstr($this->image_), 1, -1);
          } 
          if ($this->image_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->image_ = "null"; 
              $NM_val_null[] = "image_";
          } 
          $this->cuentaventa__before_qstr = $this->cuentaventa_;
          $this->cuentaventa_ = substr($this->Db->qstr($this->cuentaventa_), 1, -1); 
          if ($this->cuentaventa_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->cuentaventa_ = "null"; 
              $NM_val_null[] = "cuentaventa_";
          } 
          $this->unidad__before_qstr = $this->unidad_;
          $this->unidad_ = substr($this->Db->qstr($this->unidad_), 1, -1); 
          if ($this->unidad_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->unidad_ = "null"; 
              $NM_val_null[] = "unidad_";
          } 
          $this->tipoitem__before_qstr = $this->tipoitem_;
          $this->tipoitem_ = substr($this->Db->qstr($this->tipoitem_), 1, -1); 
          if ($this->tipoitem_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->tipoitem_ = "null"; 
              $NM_val_null[] = "tipoitem_";
          } 
          $this->cuentacompra__before_qstr = $this->cuentacompra_;
          $this->cuentacompra_ = substr($this->Db->qstr($this->cuentacompra_), 1, -1); 
          if ($this->cuentacompra_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->cuentacompra_ = "null"; 
              $NM_val_null[] = "cuentacompra_";
          } 
      }
      if ($this->nmgp_opcao == "alterar") 
      {
          $SC_fields_update = array(); 
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['foreign_key'] as $sFKName => $sFKValue)
              {
                   if (isset($this->sc_conv_var[$sFKName]))
                   {
                       $sFKName = $this->sc_conv_var[$sFKName];
                   }
                  eval("\$this->" . $sFKName . " = \"" . $sFKValue . "\";");
              }
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['decimal_db'] == ",") 
          {
              $this->nm_poe_aspas_decimal();
          }
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where id_product = $this->id_product_ ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where id_product = $this->id_product_ "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where id_product = $this->id_product_ ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where id_product = $this->id_product_ "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where id_product = $this->id_product_ ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where id_product = $this->id_product_ "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where id_product = $this->id_product_ ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where id_product = $this->id_product_ "); 
          }  
          else  
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where id_product = $this->id_product_ ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where id_product = $this->id_product_ "); 
          }  
          if ($rs1 === false)  
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
              if ($this->NM_ajax_flag)
              {
                 form_product_edit_masivo_pack_ajax_response();
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
                  $SC_fields_update[] = "product_name = '$this->product_name_', product_code = '$this->product_code_', id_status = $this->id_status_, dateproduct = #$this->dateproduct_#, product_value = $this->product_value_, product_cost = $this->product_cost_, discount = $this->discount_, stock = $this->stock_, id_category = $this->id_category_, service = $this->service_, kiosko = $this->kiosko_, entrada = $this->entrada_, jugador = $this->jugador_, visitante = $this->visitante_, tarjeta = $this->tarjeta_, minutos = $this->minutos_, tokens = $this->tokens_, comida = $this->comida_, score = $this->score_, poriva = $this->poriva_, cuentaventa = '$this->cuentaventa_', unidad = '$this->unidad_', tipoitem = '$this->tipoitem_', cuentacompra = '$this->cuentacompra_', precioventa = $this->precioventa_, puntoventa = $this->puntoventa_"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "product_name = '$this->product_name_', product_code = '$this->product_code_', id_status = $this->id_status_, dateproduct = " . $this->Ini->date_delim . $this->dateproduct_ . $this->Ini->date_delim1 . ", product_value = $this->product_value_, product_cost = $this->product_cost_, discount = $this->discount_, stock = $this->stock_, id_category = $this->id_category_, service = $this->service_, kiosko = $this->kiosko_, entrada = $this->entrada_, jugador = $this->jugador_, visitante = $this->visitante_, tarjeta = $this->tarjeta_, minutos = $this->minutos_, tokens = $this->tokens_, comida = $this->comida_, score = $this->score_, poriva = $this->poriva_, cuentaventa = '$this->cuentaventa_', unidad = '$this->unidad_', tipoitem = '$this->tipoitem_', cuentacompra = '$this->cuentacompra_', precioventa = $this->precioventa_, puntoventa = $this->puntoventa_"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "product_name = '$this->product_name_', product_code = '$this->product_code_', id_status = $this->id_status_, dateproduct = " . $this->Ini->date_delim . $this->dateproduct_ . $this->Ini->date_delim1 . ", product_value = $this->product_value_, product_cost = $this->product_cost_, discount = $this->discount_, stock = $this->stock_, id_category = $this->id_category_, service = $this->service_, kiosko = $this->kiosko_, entrada = $this->entrada_, jugador = $this->jugador_, visitante = $this->visitante_, tarjeta = $this->tarjeta_, minutos = $this->minutos_, tokens = $this->tokens_, comida = $this->comida_, score = $this->score_, poriva = $this->poriva_, cuentaventa = '$this->cuentaventa_', unidad = '$this->unidad_', tipoitem = '$this->tipoitem_', cuentacompra = '$this->cuentacompra_', precioventa = $this->precioventa_, puntoventa = $this->puntoventa_"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "product_name = '$this->product_name_', product_code = '$this->product_code_', id_status = $this->id_status_, dateproduct = EXTEND('$this->dateproduct_', YEAR TO FRACTION), product_value = $this->product_value_, product_cost = $this->product_cost_, discount = $this->discount_, stock = $this->stock_, id_category = $this->id_category_, service = $this->service_, kiosko = $this->kiosko_, entrada = $this->entrada_, jugador = $this->jugador_, visitante = $this->visitante_, tarjeta = $this->tarjeta_, minutos = $this->minutos_, tokens = $this->tokens_, comida = $this->comida_, score = $this->score_, poriva = $this->poriva_, cuentaventa = '$this->cuentaventa_', unidad = '$this->unidad_', tipoitem = '$this->tipoitem_', cuentacompra = '$this->cuentacompra_', precioventa = $this->precioventa_, puntoventa = $this->puntoventa_"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "product_name = '$this->product_name_', product_code = '$this->product_code_', id_status = $this->id_status_, dateproduct = " . $this->Ini->date_delim . $this->dateproduct_ . $this->Ini->date_delim1 . ", product_value = $this->product_value_, product_cost = $this->product_cost_, discount = $this->discount_, stock = $this->stock_, id_category = $this->id_category_, service = $this->service_, kiosko = $this->kiosko_, entrada = $this->entrada_, jugador = $this->jugador_, visitante = $this->visitante_, tarjeta = $this->tarjeta_, minutos = $this->minutos_, tokens = $this->tokens_, comida = $this->comida_, score = $this->score_, poriva = $this->poriva_, cuentaventa = '$this->cuentaventa_', unidad = '$this->unidad_', tipoitem = '$this->tipoitem_', cuentacompra = '$this->cuentacompra_', precioventa = $this->precioventa_, puntoventa = $this->puntoventa_"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "product_name = '$this->product_name_', product_code = '$this->product_code_', id_status = $this->id_status_, dateproduct = " . $this->Ini->date_delim . $this->dateproduct_ . $this->Ini->date_delim1 . ", product_value = $this->product_value_, product_cost = $this->product_cost_, discount = $this->discount_, stock = $this->stock_, id_category = $this->id_category_, service = $this->service_, kiosko = $this->kiosko_, entrada = $this->entrada_, jugador = $this->jugador_, visitante = $this->visitante_, tarjeta = $this->tarjeta_, minutos = $this->minutos_, tokens = $this->tokens_, comida = $this->comida_, score = $this->score_, poriva = $this->poriva_, cuentaventa = '$this->cuentaventa_', unidad = '$this->unidad_', tipoitem = '$this->tipoitem_', cuentacompra = '$this->cuentacompra_', precioventa = $this->precioventa_, puntoventa = $this->puntoventa_"; 
              } 
              else 
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "product_name = '$this->product_name_', product_code = '$this->product_code_', id_status = $this->id_status_, dateproduct = " . $this->Ini->date_delim . $this->dateproduct_ . $this->Ini->date_delim1 . ", product_value = $this->product_value_, product_cost = $this->product_cost_, discount = $this->discount_, stock = $this->stock_, id_category = $this->id_category_, service = $this->service_, kiosko = $this->kiosko_, entrada = $this->entrada_, jugador = $this->jugador_, visitante = $this->visitante_, tarjeta = $this->tarjeta_, minutos = $this->minutos_, tokens = $this->tokens_, comida = $this->comida_, score = $this->score_, poriva = $this->poriva_, cuentaventa = '$this->cuentaventa_', unidad = '$this->unidad_', tipoitem = '$this->tipoitem_', cuentacompra = '$this->cuentacompra_', precioventa = $this->precioventa_, puntoventa = $this->puntoventa_"; 
              } 
              $temp_cmd_sql = "";
              if ($this->image__limpa == "S")
              {
                  if ($this->image_ != "null")
                  {
                      $this->image_ = '';
                  }
                  if (in_array(strtolower($this->Ini->nm_tpbanco), $nm_bases_lob_geral))
                  {
                  }
                  else
                  {
                      $temp_cmd_sql = "image = '" . $this->image_ . "'";
                  }
                  $this->image_ = "";
              }
              else
              {
                  if ($this->image_ != "none" && $this->image_ != "")
                  {
                      $NM_conteudo =  $this->image_;
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
                      $aDoNotUpdate[] = "image_";
                  }
              }
              if (!empty($temp_cmd_sql))
              {
                  $SC_fields_update[] = $temp_cmd_sql;
              }
              if ($this->image__limpa == "S" || ($this->image_ != "none" && $this->image_ != "" && in_array(strtolower($this->Ini->nm_tpbanco), $nm_bases_lob_geral))) 
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
                  $comando .= " WHERE id_product = $this->id_product_ ";  
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
                  $comando .= " WHERE id_product = $this->id_product_ ";  
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              {
                  $comando .= " WHERE id_product = $this->id_product_ ";  
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $comando .= " WHERE id_product = $this->id_product_ ";  
              }  
              else  
              {
                  $comando .= " WHERE id_product = $this->id_product_ ";  
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
                                  form_product_edit_masivo_pack_ajax_response();
                              }
                              exit;  
                          }   
                      }   
                  }   
              }   
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql)) 
              { 
              }   
              $this->product_name_ = $this->product_name__before_qstr;
              $this->product_code_ = $this->product_code__before_qstr;
              $this->cuentaventa_ = $this->cuentaventa__before_qstr;
              $this->unidad_ = $this->unidad__before_qstr;
              $this->tipoitem_ = $this->tipoitem__before_qstr;
              $this->cuentacompra_ = $this->cuentacompra__before_qstr;
              if (in_array(strtolower($this->Ini->nm_tpbanco), $nm_bases_lob_geral))
              { 
                  if ($this->image__limpa == "S" && !in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle) && !in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix)) 
                  { 
                      $_SESSION['scriptcase']['sc_sql_ult_comando'] = "UpdateBlob($this->Ini->nm_tabela, \"image\", \"\",  \"id_product = $this->id_product_\")"; 
                      $rs = $this->Db->UpdateBlob($this->Ini->nm_tabela, "image", "",  "id_product = $this->id_product_"); 
                  } 
                  else 
                  { 
                      if ($this->image_ != "none" && $this->image_ != "") 
                      { 
                          $_SESSION['scriptcase']['sc_sql_ult_comando'] = "UpdateBlob($this->Ini->nm_tabela, \"image\", $this->image_,  \"id_product = $this->id_product_\")"; 
                          $rs = $this->Db->UpdateBlob($this->Ini->nm_tabela, "image", $this->image_,  "id_product = $this->id_product_"); 
                      } 
                  } 
                  if ($rs === false) 
                  { 
                      $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_updt'], $this->Db->ErrorMsg()); 
                      $this->NM_rollback_db(); 
                      if ($this->NM_ajax_flag)
                      {
                          form_product_edit_masivo_pack_ajax_response();
                      }
                      exit;  
                  }   
              }   
              if ($this->image__limpa == "S")
              {
                  $this->NM_ajax_info['fldList']['image__salva'] = array(
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

              $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['db_changed'] = true;
              if ($this->NM_ajax_flag) {
                  $this->NM_ajax_info['clearUpload'] = 'S';
                  $this->NM_ajax_info['fldList']['image__salva'] = array(
                      'row'     => '',
                      'type'    => 'text',
                      'valList' => array(''),
                  );
              }

              $this->sc_teve_alt = true; 
              if     (isset($NM_val_form) && isset($NM_val_form['product_name_'])) { $this->product_name_ = $NM_val_form['product_name_']; }
              elseif (isset($this->product_name_)) { $this->nm_limpa_alfa($this->product_name_); }
              if     (isset($NM_val_form) && isset($NM_val_form['product_code_'])) { $this->product_code_ = $NM_val_form['product_code_']; }
              elseif (isset($this->product_code_)) { $this->nm_limpa_alfa($this->product_code_); }
              if     (isset($NM_val_form) && isset($NM_val_form['id_status_'])) { $this->id_status_ = $NM_val_form['id_status_']; }
              elseif (isset($this->id_status_)) { $this->nm_limpa_alfa($this->id_status_); }
              if     (isset($NM_val_form) && isset($NM_val_form['product_value_'])) { $this->product_value_ = $NM_val_form['product_value_']; }
              elseif (isset($this->product_value_)) { $this->nm_limpa_alfa($this->product_value_); }
              if     (isset($NM_val_form) && isset($NM_val_form['product_cost_'])) { $this->product_cost_ = $NM_val_form['product_cost_']; }
              elseif (isset($this->product_cost_)) { $this->nm_limpa_alfa($this->product_cost_); }
              if     (isset($NM_val_form) && isset($NM_val_form['discount_'])) { $this->discount_ = $NM_val_form['discount_']; }
              elseif (isset($this->discount_)) { $this->nm_limpa_alfa($this->discount_); }
              if     (isset($NM_val_form) && isset($NM_val_form['stock_'])) { $this->stock_ = $NM_val_form['stock_']; }
              elseif (isset($this->stock_)) { $this->nm_limpa_alfa($this->stock_); }
              if     (isset($NM_val_form) && isset($NM_val_form['id_category_'])) { $this->id_category_ = $NM_val_form['id_category_']; }
              elseif (isset($this->id_category_)) { $this->nm_limpa_alfa($this->id_category_); }
              if     (isset($NM_val_form) && isset($NM_val_form['service_'])) { $this->service_ = $NM_val_form['service_']; }
              elseif (isset($this->service_)) { $this->nm_limpa_alfa($this->service_); }
              if     (isset($NM_val_form) && isset($NM_val_form['kiosko_'])) { $this->kiosko_ = $NM_val_form['kiosko_']; }
              elseif (isset($this->kiosko_)) { $this->nm_limpa_alfa($this->kiosko_); }
              if     (isset($NM_val_form) && isset($NM_val_form['entrada_'])) { $this->entrada_ = $NM_val_form['entrada_']; }
              elseif (isset($this->entrada_)) { $this->nm_limpa_alfa($this->entrada_); }
              if     (isset($NM_val_form) && isset($NM_val_form['jugador_'])) { $this->jugador_ = $NM_val_form['jugador_']; }
              elseif (isset($this->jugador_)) { $this->nm_limpa_alfa($this->jugador_); }
              if     (isset($NM_val_form) && isset($NM_val_form['visitante_'])) { $this->visitante_ = $NM_val_form['visitante_']; }
              elseif (isset($this->visitante_)) { $this->nm_limpa_alfa($this->visitante_); }
              if     (isset($NM_val_form) && isset($NM_val_form['tarjeta_'])) { $this->tarjeta_ = $NM_val_form['tarjeta_']; }
              elseif (isset($this->tarjeta_)) { $this->nm_limpa_alfa($this->tarjeta_); }
              if     (isset($NM_val_form) && isset($NM_val_form['minutos_'])) { $this->minutos_ = $NM_val_form['minutos_']; }
              elseif (isset($this->minutos_)) { $this->nm_limpa_alfa($this->minutos_); }
              if     (isset($NM_val_form) && isset($NM_val_form['tokens_'])) { $this->tokens_ = $NM_val_form['tokens_']; }
              elseif (isset($this->tokens_)) { $this->nm_limpa_alfa($this->tokens_); }
              if     (isset($NM_val_form) && isset($NM_val_form['comida_'])) { $this->comida_ = $NM_val_form['comida_']; }
              elseif (isset($this->comida_)) { $this->nm_limpa_alfa($this->comida_); }
              if     (isset($NM_val_form) && isset($NM_val_form['score_'])) { $this->score_ = $NM_val_form['score_']; }
              elseif (isset($this->score_)) { $this->nm_limpa_alfa($this->score_); }
              if     (isset($NM_val_form) && isset($NM_val_form['poriva_'])) { $this->poriva_ = $NM_val_form['poriva_']; }
              elseif (isset($this->poriva_)) { $this->nm_limpa_alfa($this->poriva_); }
              if     (isset($NM_val_form) && isset($NM_val_form['cuentaventa_'])) { $this->cuentaventa_ = $NM_val_form['cuentaventa_']; }
              elseif (isset($this->cuentaventa_)) { $this->nm_limpa_alfa($this->cuentaventa_); }
              if     (isset($NM_val_form) && isset($NM_val_form['unidad_'])) { $this->unidad_ = $NM_val_form['unidad_']; }
              elseif (isset($this->unidad_)) { $this->nm_limpa_alfa($this->unidad_); }
              if     (isset($NM_val_form) && isset($NM_val_form['tipoitem_'])) { $this->tipoitem_ = $NM_val_form['tipoitem_']; }
              elseif (isset($this->tipoitem_)) { $this->nm_limpa_alfa($this->tipoitem_); }
              if     (isset($NM_val_form) && isset($NM_val_form['cuentacompra_'])) { $this->cuentacompra_ = $NM_val_form['cuentacompra_']; }
              elseif (isset($this->cuentacompra_)) { $this->nm_limpa_alfa($this->cuentacompra_); }
              if     (isset($NM_val_form) && isset($NM_val_form['precioventa_'])) { $this->precioventa_ = $NM_val_form['precioventa_']; }
              elseif (isset($this->precioventa_)) { $this->nm_limpa_alfa($this->precioventa_); }
              if     (isset($NM_val_form) && isset($NM_val_form['puntoventa_'])) { $this->puntoventa_ = $NM_val_form['puntoventa_']; }
              elseif (isset($this->puntoventa_)) { $this->nm_limpa_alfa($this->puntoventa_); }

              $this->nm_formatar_campos();
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
              }

              $aOldRefresh               = $this->nmgp_refresh_fields;
              $this->nmgp_refresh_fields = array_diff(array('product_name_', 'id_category_', 'product_code_', 'dateproduct_', 'product_cost_', 'stock_', 'product_value_', 'discount_', 'poriva_', 'cuentaventa_', 'unidad_', 'tipoitem_', 'cuentacompra_', 'precioventa_', 'puntoventa_', 'id_status_', 'entrada_', 'service_', 'kiosko_', 'jugador_', 'visitante_', 'minutos_', 'tarjeta_', 'tokens_', 'comida_', 'score_'), $aDoNotUpdate);
              $this->nmgp_refresh_fields = $aOldRefresh;

              if (isset($this->Embutida_ronly) && $this->Embutida_ronly)
              {

                  $this->NM_ajax_info['readOnly']['product_name_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['id_category_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['product_code_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['dateproduct_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['product_cost_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['stock_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['product_value_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['discount_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['poriva_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['cuentaventa_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['unidad_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['tipoitem_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['cuentacompra_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['precioventa_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['puntoventa_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['id_status_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['image_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['entrada_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['service_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['kiosko_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['jugador_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['visitante_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['minutos_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['tarjeta_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['tokens_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['comida_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['score_' . $this->nmgp_refresh_row] = 'on';


                  $this->NM_ajax_info['closeLine'] = $this->nmgp_refresh_row;
              }

              $this->nm_tira_formatacao();
              $this->nm_converte_datas();
          }  
      }  
      if ($this->nmgp_opcao == "incluir") 
      { 
          $NM_cmp_auto = "";
          $NM_seq_auto = "";
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['foreign_key'] as $sFKName => $sFKValue)
              {
                   if (isset($this->sc_conv_var[$sFKName]))
                   {
                       $sFKName = $this->sc_conv_var[$sFKName];
                   }
                  eval("\$this->" . $sFKName . " = \"" . $sFKValue . "\";");
              }
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['decimal_db'] == ",") 
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
          if ($bInsertOk)
          { 
              $_test_file = $this->fetchUniqueUploadName($this->image__scfile_name, $dir_file, "image_");
              if (trim($this->image__scfile_name) != $_test_file)
              {
                  $this->image__scfile_name = $_test_file;
                  $this->image_ = $_test_file;
              }
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              { 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (product_name, product_code, id_status, dateproduct, product_value, product_cost, discount, stock, id_category, image, service, kiosko, entrada, jugador, visitante, tarjeta, minutos, tokens, comida, score, poriva, cuentaventa, unidad, tipoitem, cuentacompra, precioventa, puntoventa) VALUES ('$this->product_name_', '$this->product_code_', $this->id_status_, #$this->dateproduct_#, $this->product_value_, $this->product_cost_, $this->discount_, $this->stock_, $this->id_category_, '$this->image_', $this->service_, $this->kiosko_, $this->entrada_, $this->jugador_, $this->visitante_, $this->tarjeta_, $this->minutos_, $this->tokens_, $this->comida_, $this->score_, $this->poriva_, '$this->cuentaventa_', '$this->unidad_', '$this->tipoitem_', '$this->cuentacompra_', $this->precioventa_, $this->puntoventa_)"; 
              }
              elseif ($this->Ini->nm_tpbanco == "pdo_sqlsrv")
              { 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (product_name, product_code, id_status, dateproduct, product_value, product_cost, discount, stock, id_category, image, service, kiosko, entrada, jugador, visitante, tarjeta, minutos, tokens, comida, score, poriva, cuentaventa, unidad, tipoitem, cuentacompra, precioventa, puntoventa) VALUES ('$this->product_name_', '$this->product_code_', $this->id_status_, " . $this->Ini->date_delim . $this->dateproduct_ . $this->Ini->date_delim1 . ", $this->product_value_, $this->product_cost_, $this->discount_, $this->stock_, $this->id_category_, '', $this->service_, $this->kiosko_, $this->entrada_, $this->jugador_, $this->visitante_, $this->tarjeta_, $this->minutos_, $this->tokens_, $this->comida_, $this->score_, $this->poriva_, '$this->cuentaventa_', '$this->unidad_', '$this->tipoitem_', '$this->cuentacompra_', $this->precioventa_, $this->puntoventa_)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              { 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (product_name, product_code, id_status, dateproduct, product_value, product_cost, discount, stock, id_category, image, service, kiosko, entrada, jugador, visitante, tarjeta, minutos, tokens, comida, score, poriva, cuentaventa, unidad, tipoitem, cuentacompra, precioventa, puntoventa) VALUES ('$this->product_name_', '$this->product_code_', $this->id_status_, " . $this->Ini->date_delim . $this->dateproduct_ . $this->Ini->date_delim1 . ", $this->product_value_, $this->product_cost_, $this->discount_, $this->stock_, $this->id_category_, '$this->image_', $this->service_, $this->kiosko_, $this->entrada_, $this->jugador_, $this->visitante_, $this->tarjeta_, $this->minutos_, $this->tokens_, $this->comida_, $this->score_, $this->poriva_, '$this->cuentaventa_', '$this->unidad_', '$this->tipoitem_', '$this->cuentacompra_', $this->precioventa_, $this->puntoventa_)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
              { 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (product_name, product_code, id_status, dateproduct, product_value, product_cost, discount, stock, id_category, image, service, kiosko, entrada, jugador, visitante, tarjeta, minutos, tokens, comida, score, poriva, cuentaventa, unidad, tipoitem, cuentacompra, precioventa, puntoventa) VALUES ('$this->product_name_', '$this->product_code_', $this->id_status_, " . $this->Ini->date_delim . $this->dateproduct_ . $this->Ini->date_delim1 . ", $this->product_value_, $this->product_cost_, $this->discount_, $this->stock_, $this->id_category_, '$this->image_', $this->service_, $this->kiosko_, $this->entrada_, $this->jugador_, $this->visitante_, $this->tarjeta_, $this->minutos_, $this->tokens_, $this->comida_, $this->score_, $this->poriva_, '$this->cuentaventa_', '$this->unidad_', '$this->tipoitem_', '$this->cuentacompra_', $this->precioventa_, $this->puntoventa_)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "product_name, product_code, id_status, dateproduct, product_value, product_cost, discount, stock, id_category, image, service, kiosko, entrada, jugador, visitante, tarjeta, minutos, tokens, comida, score, poriva, cuentaventa, unidad, tipoitem, cuentacompra, precioventa, puntoventa) VALUES (" . $NM_seq_auto . "'$this->product_name_', '$this->product_code_', $this->id_status_, " . $this->Ini->date_delim . $this->dateproduct_ . $this->Ini->date_delim1 . ", $this->product_value_, $this->product_cost_, $this->discount_, $this->stock_, $this->id_category_, EMPTY_BLOB(), $this->service_, $this->kiosko_, $this->entrada_, $this->jugador_, $this->visitante_, $this->tarjeta_, $this->minutos_, $this->tokens_, $this->comida_, $this->score_, $this->poriva_, '$this->cuentaventa_', '$this->unidad_', '$this->tipoitem_', '$this->cuentacompra_', $this->precioventa_, $this->puntoventa_)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "product_name, product_code, id_status, dateproduct, product_value, product_cost, discount, stock, id_category, image, service, kiosko, entrada, jugador, visitante, tarjeta, minutos, tokens, comida, score, poriva, cuentaventa, unidad, tipoitem, cuentacompra, precioventa, puntoventa) VALUES (" . $NM_seq_auto . "'$this->product_name_', '$this->product_code_', $this->id_status_, EXTEND('$this->dateproduct_', YEAR TO FRACTION), $this->product_value_, $this->product_cost_, $this->discount_, $this->stock_, $this->id_category_, null, $this->service_, $this->kiosko_, $this->entrada_, $this->jugador_, $this->visitante_, $this->tarjeta_, $this->minutos_, $this->tokens_, $this->comida_, $this->score_, $this->poriva_, '$this->cuentaventa_', '$this->unidad_', '$this->tipoitem_', '$this->cuentacompra_', $this->precioventa_, $this->puntoventa_)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "product_name, product_code, id_status, dateproduct, product_value, product_cost, discount, stock, id_category, image, service, kiosko, entrada, jugador, visitante, tarjeta, minutos, tokens, comida, score, poriva, cuentaventa, unidad, tipoitem, cuentacompra, precioventa, puntoventa) VALUES (" . $NM_seq_auto . "'$this->product_name_', '$this->product_code_', $this->id_status_, " . $this->Ini->date_delim . $this->dateproduct_ . $this->Ini->date_delim1 . ", $this->product_value_, $this->product_cost_, $this->discount_, $this->stock_, $this->id_category_, '', $this->service_, $this->kiosko_, $this->entrada_, $this->jugador_, $this->visitante_, $this->tarjeta_, $this->minutos_, $this->tokens_, $this->comida_, $this->score_, $this->poriva_, '$this->cuentaventa_', '$this->unidad_', '$this->tipoitem_', '$this->cuentacompra_', $this->precioventa_, $this->puntoventa_)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "product_name, product_code, id_status, dateproduct, product_value, product_cost, discount, stock, id_category, image, service, kiosko, entrada, jugador, visitante, tarjeta, minutos, tokens, comida, score, poriva, cuentaventa, unidad, tipoitem, cuentacompra, precioventa, puntoventa) VALUES (" . $NM_seq_auto . "'$this->product_name_', '$this->product_code_', $this->id_status_, " . $this->Ini->date_delim . $this->dateproduct_ . $this->Ini->date_delim1 . ", $this->product_value_, $this->product_cost_, $this->discount_, $this->stock_, $this->id_category_, '', $this->service_, $this->kiosko_, $this->entrada_, $this->jugador_, $this->visitante_, $this->tarjeta_, $this->minutos_, $this->tokens_, $this->comida_, $this->score_, $this->poriva_, '$this->cuentaventa_', '$this->unidad_', '$this->tipoitem_', '$this->cuentacompra_', $this->precioventa_, $this->puntoventa_)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "product_name, product_code, id_status, dateproduct, product_value, product_cost, discount, stock, id_category, image, service, kiosko, entrada, jugador, visitante, tarjeta, minutos, tokens, comida, score, poriva, cuentaventa, unidad, tipoitem, cuentacompra, precioventa, puntoventa) VALUES (" . $NM_seq_auto . "'$this->product_name_', '$this->product_code_', $this->id_status_, " . $this->Ini->date_delim . $this->dateproduct_ . $this->Ini->date_delim1 . ", $this->product_value_, $this->product_cost_, $this->discount_, $this->stock_, $this->id_category_, '', $this->service_, $this->kiosko_, $this->entrada_, $this->jugador_, $this->visitante_, $this->tarjeta_, $this->minutos_, $this->tokens_, $this->comida_, $this->score_, $this->poriva_, '$this->cuentaventa_', '$this->unidad_', '$this->tipoitem_', '$this->cuentacompra_', $this->precioventa_, $this->puntoventa_)"; 
              }
              elseif ($this->Ini->nm_tpbanco =='pdo_ibm')
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "product_name, product_code, id_status, dateproduct, product_value, product_cost, discount, stock, id_category, image, service, kiosko, entrada, jugador, visitante, tarjeta, minutos, tokens, comida, score, poriva, cuentaventa, unidad, tipoitem, cuentacompra, precioventa, puntoventa) VALUES (" . $NM_seq_auto . "'$this->product_name_', '$this->product_code_', $this->id_status_, " . $this->Ini->date_delim . $this->dateproduct_ . $this->Ini->date_delim1 . ", $this->product_value_, $this->product_cost_, $this->discount_, $this->stock_, $this->id_category_, EMPTY_BLOB(), $this->service_, $this->kiosko_, $this->entrada_, $this->jugador_, $this->visitante_, $this->tarjeta_, $this->minutos_, $this->tokens_, $this->comida_, $this->score_, $this->poriva_, '$this->cuentaventa_', '$this->unidad_', '$this->tipoitem_', '$this->cuentacompra_', $this->precioventa_, $this->puntoventa_)"; 
              }
              else
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "product_name, product_code, id_status, dateproduct, product_value, product_cost, discount, stock, id_category, image, service, kiosko, entrada, jugador, visitante, tarjeta, minutos, tokens, comida, score, poriva, cuentaventa, unidad, tipoitem, cuentacompra, precioventa, puntoventa) VALUES (" . $NM_seq_auto . "'$this->product_name_', '$this->product_code_', $this->id_status_, " . $this->Ini->date_delim . $this->dateproduct_ . $this->Ini->date_delim1 . ", $this->product_value_, $this->product_cost_, $this->discount_, $this->stock_, $this->id_category_, '$this->image_', $this->service_, $this->kiosko_, $this->entrada_, $this->jugador_, $this->visitante_, $this->tarjeta_, $this->minutos_, $this->tokens_, $this->comida_, $this->score_, $this->poriva_, '$this->cuentaventa_', '$this->unidad_', '$this->tipoitem_', '$this->cuentacompra_', $this->precioventa_, $this->puntoventa_)"; 
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
                              form_product_edit_masivo_pack_ajax_response();
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
                          form_product_edit_masivo_pack_ajax_response();
                      }
                      exit; 
                  } 
                  $this->id_product_ =  $rsy->fields[0];
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
                  $this->id_product_ = $rsy->fields[0];
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
                  $this->id_product_ = $rsy->fields[0];
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
                  $this->id_product_ = $rsy->fields[0];
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
                  $this->id_product_ = $rsy->fields[0];
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
                  $this->id_product_ = $rsy->fields[0];
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
                  $this->id_product_ = $rsy->fields[0];
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
                  $this->id_product_ = $rsy->fields[0];
                  $rsy->Close(); 
              } 
              $this->product_name_ = $this->product_name__before_qstr;
              $this->product_code_ = $this->product_code__before_qstr;
              $this->cuentaventa_ = $this->cuentaventa__before_qstr;
              $this->unidad_ = $this->unidad__before_qstr;
              $this->tipoitem_ = $this->tipoitem__before_qstr;
              $this->cuentacompra_ = $this->cuentacompra__before_qstr;
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql)) 
              { 
              }   
              if (in_array(strtolower($this->Ini->nm_tpbanco), $nm_bases_lob_geral))
              { 
                  if (trim($this->image_ ) != "") 
                  { 
                      $_SESSION['scriptcase']['sc_sql_ult_comando'] = "UpdateBlob(" . $this->Ini->nm_tabela . ",  image , $this->image_,  \"id_product = $this->id_product_\")"; 
                      $rs = $this->Db->UpdateBlob($this->Ini->nm_tabela, "image", $this->image_,  "id_product = $this->id_product_"); 
                      if ($rs === false)  
                      { 
                          $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_inst'], $this->Db->ErrorMsg()); 
                          $this->NM_rollback_db(); 
                          if ($this->NM_ajax_flag)
                          {
                              form_product_edit_masivo_pack_ajax_response();
                          }
                          exit; 
                      }  
                  }  
              }  
              }

              $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['db_changed'] = true;

              $this->sc_evento = "insert"; 
              $this->product_name_ = $this->product_name__before_qstr;
              $this->product_code_ = $this->product_code__before_qstr;
              $this->cuentaventa_ = $this->cuentaventa__before_qstr;
              $this->unidad_ = $this->unidad__before_qstr;
              $this->tipoitem_ = $this->tipoitem__before_qstr;
              $this->cuentacompra_ = $this->cuentacompra__before_qstr;
              $this->NM_gera_log_key("incluir");
              $this->NM_gera_log_new();
              $this->sc_teve_incl = true; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['dados_select'][$sc_seq_vert]['product_name_'] = $this->product_name_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['dados_select'][$sc_seq_vert]['id_category_'] = $this->id_category_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['dados_select'][$sc_seq_vert]['product_code_'] = $this->product_code_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['dados_select'][$sc_seq_vert]['dateproduct_'] = $this->dateproduct_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['dados_select'][$sc_seq_vert]['product_cost_'] = $this->product_cost_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['dados_select'][$sc_seq_vert]['stock_'] = $this->stock_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['dados_select'][$sc_seq_vert]['product_value_'] = $this->product_value_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['dados_select'][$sc_seq_vert]['discount_'] = $this->discount_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['dados_select'][$sc_seq_vert]['poriva_'] = $this->poriva_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['dados_select'][$sc_seq_vert]['cuentaventa_'] = $this->cuentaventa_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['dados_select'][$sc_seq_vert]['unidad_'] = $this->unidad_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['dados_select'][$sc_seq_vert]['tipoitem_'] = $this->tipoitem_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['dados_select'][$sc_seq_vert]['cuentacompra_'] = $this->cuentacompra_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['dados_select'][$sc_seq_vert]['precioventa_'] = $this->precioventa_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['dados_select'][$sc_seq_vert]['puntoventa_'] = $this->puntoventa_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['dados_select'][$sc_seq_vert]['id_status_'] = $this->id_status_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['dados_select'][$sc_seq_vert]['image_'] = $this->image_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['dados_select'][$sc_seq_vert]['entrada_'] = $this->entrada_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['dados_select'][$sc_seq_vert]['service_'] = $this->service_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['dados_select'][$sc_seq_vert]['kiosko_'] = $this->kiosko_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['dados_select'][$sc_seq_vert]['jugador_'] = $this->jugador_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['dados_select'][$sc_seq_vert]['visitante_'] = $this->visitante_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['dados_select'][$sc_seq_vert]['minutos_'] = $this->minutos_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['dados_select'][$sc_seq_vert]['tarjeta_'] = $this->tarjeta_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['dados_select'][$sc_seq_vert]['tokens_'] = $this->tokens_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['dados_select'][$sc_seq_vert]['comida_'] = $this->comida_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['dados_select'][$sc_seq_vert]['score_'] = $this->score_;
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
              if (isset($this->product_name_)) { $this->nm_limpa_alfa($this->product_name_); }
              if (isset($this->product_code_)) { $this->nm_limpa_alfa($this->product_code_); }
              if (isset($this->id_status_)) { $this->nm_limpa_alfa($this->id_status_); }
              if (isset($this->product_value_)) { $this->nm_limpa_alfa($this->product_value_); }
              if (isset($this->product_cost_)) { $this->nm_limpa_alfa($this->product_cost_); }
              if (isset($this->discount_)) { $this->nm_limpa_alfa($this->discount_); }
              if (isset($this->stock_)) { $this->nm_limpa_alfa($this->stock_); }
              if (isset($this->id_category_)) { $this->nm_limpa_alfa($this->id_category_); }
              if (isset($this->service_)) { $this->nm_limpa_alfa($this->service_); }
              if (isset($this->kiosko_)) { $this->nm_limpa_alfa($this->kiosko_); }
              if (isset($this->entrada_)) { $this->nm_limpa_alfa($this->entrada_); }
              if (isset($this->jugador_)) { $this->nm_limpa_alfa($this->jugador_); }
              if (isset($this->visitante_)) { $this->nm_limpa_alfa($this->visitante_); }
              if (isset($this->tarjeta_)) { $this->nm_limpa_alfa($this->tarjeta_); }
              if (isset($this->minutos_)) { $this->nm_limpa_alfa($this->minutos_); }
              if (isset($this->tokens_)) { $this->nm_limpa_alfa($this->tokens_); }
              if (isset($this->comida_)) { $this->nm_limpa_alfa($this->comida_); }
              if (isset($this->score_)) { $this->nm_limpa_alfa($this->score_); }
              if (isset($this->poriva_)) { $this->nm_limpa_alfa($this->poriva_); }
              if (isset($this->cuentaventa_)) { $this->nm_limpa_alfa($this->cuentaventa_); }
              if (isset($this->unidad_)) { $this->nm_limpa_alfa($this->unidad_); }
              if (isset($this->tipoitem_)) { $this->nm_limpa_alfa($this->tipoitem_); }
              if (isset($this->cuentacompra_)) { $this->nm_limpa_alfa($this->cuentacompra_); }
              if (isset($this->precioventa_)) { $this->nm_limpa_alfa($this->precioventa_); }
              if (isset($this->puntoventa_)) { $this->nm_limpa_alfa($this->puntoventa_); }
              if (isset($this->Embutida_form) && $this->Embutida_form)
              {
                  $this->nm_guardar_campos();
                  $this->nm_formatar_campos();

                  $this->NM_ajax_info['fldList']['product_name_' . $this->nmgp_refresh_row]['type']    = 'text';
                  $this->NM_ajax_info['fldList']['product_name_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input(NM_charset_to_utf8($this->product_name_)));
                  $this->NM_ajax_info['fldList']['product_name_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input(NM_charset_to_utf8($tmpLabel_product_name_)));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['product_name_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['product_name_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['product_name_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['product_name_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $aLookup = array();
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['Lookup_id_category_']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['Lookup_id_category_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['Lookup_id_category_']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['Lookup_id_category_'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_dateproduct_ = $this->dateproduct_;
   $old_value_dateproduct__hora = $this->dateproduct__hora;
   $old_value_product_cost_ = $this->product_cost_;
   $old_value_stock_ = $this->stock_;
   $old_value_product_value_ = $this->product_value_;
   $old_value_discount_ = $this->discount_;
   $old_value_poriva_ = $this->poriva_;
   $old_value_precioventa_ = $this->precioventa_;
   $old_value_minutos_ = $this->minutos_;
   $old_value_tokens_ = $this->tokens_;
   $old_value_score_ = $this->score_;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_dateproduct_ = $this->dateproduct_;
   $unformatted_value_dateproduct__hora = $this->dateproduct__hora;
   $unformatted_value_product_cost_ = $this->product_cost_;
   $unformatted_value_stock_ = $this->stock_;
   $unformatted_value_product_value_ = $this->product_value_;
   $unformatted_value_discount_ = $this->discount_;
   $unformatted_value_poriva_ = $this->poriva_;
   $unformatted_value_precioventa_ = $this->precioventa_;
   $unformatted_value_minutos_ = $this->minutos_;
   $unformatted_value_tokens_ = $this->tokens_;
   $unformatted_value_score_ = $this->score_;

   $nm_comando = "SELECT id_category, category  FROM category  ORDER BY category";

   $this->dateproduct_ = $old_value_dateproduct_;
   $this->dateproduct__hora = $old_value_dateproduct__hora;
   $this->product_cost_ = $old_value_product_cost_;
   $this->stock_ = $old_value_stock_;
   $this->product_value_ = $old_value_product_value_;
   $this->discount_ = $old_value_discount_;
   $this->poriva_ = $old_value_poriva_;
   $this->precioventa_ = $old_value_precioventa_;
   $this->minutos_ = $old_value_minutos_;
   $this->tokens_ = $old_value_tokens_;
   $this->score_ = $old_value_score_;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $aLookup[] = array(form_product_edit_masivo_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', form_product_edit_masivo_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['Lookup_id_category_'][] = $rs->fields[0];
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
              if (key($aValData) == form_product_edit_masivo_pack_protect_string(NM_charset_to_utf8($this->id_category_)))
              {
                  $sLabelTemp = current($aValData);
              }
          }
          $tmpLabel_id_category_ = $sLabelTemp;
                  $this->NM_ajax_info['fldList']['id_category_' . $this->nmgp_refresh_row]['type']    = 'select';
                  $this->NM_ajax_info['fldList']['id_category_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input(NM_charset_to_utf8($this->id_category_)));
                  $this->NM_ajax_info['fldList']['id_category_' . $this->nmgp_refresh_row]['labList'] = array($tmpLabel_id_category_);

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['id_category_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['id_category_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['id_category_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['id_category_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $this->NM_ajax_info['fldList']['product_code_' . $this->nmgp_refresh_row]['type']    = 'text';
                  $this->NM_ajax_info['fldList']['product_code_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input(NM_charset_to_utf8($this->product_code_)));
                  $this->NM_ajax_info['fldList']['product_code_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input(NM_charset_to_utf8($tmpLabel_product_code_)));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['product_code_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['product_code_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['product_code_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['product_code_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $tmpLabel_dateproduct_ = $this->dateproduct_;
                  $this->NM_ajax_info['fldList']['dateproduct_' . $this->nmgp_refresh_row]['type']    = 'label';
                  $this->NM_ajax_info['fldList']['dateproduct_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input($this->dateproduct_ . ' ' . $this->dateproduct__hora));
                  $this->NM_ajax_info['fldList']['dateproduct_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input($this->dateproduct_ . ' ' . $this->dateproduct__hora));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['dateproduct_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['dateproduct_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['dateproduct_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['dateproduct_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $this->NM_ajax_info['fldList']['product_cost_' . $this->nmgp_refresh_row]['type']    = 'text';
                  $this->NM_ajax_info['fldList']['product_cost_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input(NM_charset_to_utf8($this->product_cost_)));
                  $this->NM_ajax_info['fldList']['product_cost_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input(NM_charset_to_utf8($tmpLabel_product_cost_)));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['product_cost_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['product_cost_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['product_cost_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['product_cost_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $this->NM_ajax_info['fldList']['stock_' . $this->nmgp_refresh_row]['type']    = 'text';
                  $this->NM_ajax_info['fldList']['stock_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input(NM_charset_to_utf8($this->stock_)));
                  $this->NM_ajax_info['fldList']['stock_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input(NM_charset_to_utf8($tmpLabel_stock_)));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['stock_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['stock_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['stock_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['stock_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $this->NM_ajax_info['fldList']['product_value_' . $this->nmgp_refresh_row]['type']    = 'text';
                  $this->NM_ajax_info['fldList']['product_value_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input(NM_charset_to_utf8($this->product_value_)));
                  $this->NM_ajax_info['fldList']['product_value_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input(NM_charset_to_utf8($tmpLabel_product_value_)));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['product_value_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['product_value_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['product_value_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['product_value_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $this->NM_ajax_info['fldList']['discount_' . $this->nmgp_refresh_row]['type']    = 'text';
                  $this->NM_ajax_info['fldList']['discount_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input(NM_charset_to_utf8($this->discount_)));
                  $this->NM_ajax_info['fldList']['discount_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input(NM_charset_to_utf8($tmpLabel_discount_)));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['discount_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['discount_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['discount_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['discount_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $this->NM_ajax_info['fldList']['poriva_' . $this->nmgp_refresh_row]['type']    = 'text';
                  $this->NM_ajax_info['fldList']['poriva_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input(NM_charset_to_utf8($this->poriva_)));
                  $this->NM_ajax_info['fldList']['poriva_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input(NM_charset_to_utf8($tmpLabel_poriva_)));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['poriva_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['poriva_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['poriva_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['poriva_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $this->NM_ajax_info['fldList']['cuentaventa_' . $this->nmgp_refresh_row]['type']    = 'text';
                  $this->NM_ajax_info['fldList']['cuentaventa_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input(NM_charset_to_utf8($this->cuentaventa_)));
                  $this->NM_ajax_info['fldList']['cuentaventa_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input(NM_charset_to_utf8($tmpLabel_cuentaventa_)));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['cuentaventa_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['cuentaventa_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['cuentaventa_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['cuentaventa_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $this->NM_ajax_info['fldList']['unidad_' . $this->nmgp_refresh_row]['type']    = 'text';
                  $this->NM_ajax_info['fldList']['unidad_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input(NM_charset_to_utf8($this->unidad_)));
                  $this->NM_ajax_info['fldList']['unidad_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input(NM_charset_to_utf8($tmpLabel_unidad_)));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['unidad_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['unidad_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['unidad_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['unidad_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $this->NM_ajax_info['fldList']['tipoitem_' . $this->nmgp_refresh_row]['type']    = 'text';
                  $this->NM_ajax_info['fldList']['tipoitem_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input(NM_charset_to_utf8($this->tipoitem_)));
                  $this->NM_ajax_info['fldList']['tipoitem_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input(NM_charset_to_utf8($tmpLabel_tipoitem_)));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['tipoitem_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['tipoitem_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['tipoitem_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['tipoitem_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $this->NM_ajax_info['fldList']['cuentacompra_' . $this->nmgp_refresh_row]['type']    = 'text';
                  $this->NM_ajax_info['fldList']['cuentacompra_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input(NM_charset_to_utf8($this->cuentacompra_)));
                  $this->NM_ajax_info['fldList']['cuentacompra_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input(NM_charset_to_utf8($tmpLabel_cuentacompra_)));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['cuentacompra_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['cuentacompra_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['cuentacompra_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['cuentacompra_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $this->NM_ajax_info['fldList']['precioventa_' . $this->nmgp_refresh_row]['type']    = 'text';
                  $this->NM_ajax_info['fldList']['precioventa_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input(NM_charset_to_utf8($this->precioventa_)));
                  $this->NM_ajax_info['fldList']['precioventa_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input(NM_charset_to_utf8($tmpLabel_precioventa_)));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['precioventa_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['precioventa_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['precioventa_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['precioventa_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $aLookup = array();
$aLookup[] = array(form_product_edit_masivo_pack_protect_string('1') => str_replace('<', '&lt;',form_product_edit_masivo_pack_protect_string("SI")));
$aLookup[] = array(form_product_edit_masivo_pack_protect_string('0') => str_replace('<', '&lt;',form_product_edit_masivo_pack_protect_string("NO")));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['Lookup_puntoventa_'][] = '1';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['Lookup_puntoventa_'][] = '0';
          $sLabelTemp = '';
          foreach ($aLookup as $aValData)
          {
              if (key($aValData) == form_product_edit_masivo_pack_protect_string(NM_charset_to_utf8($this->puntoventa_)))
              {
                  $sLabelTemp = current($aValData);
              }
          }
          $tmpLabel_puntoventa_ = $sLabelTemp;
                  $this->NM_ajax_info['fldList']['puntoventa_' . $this->nmgp_refresh_row]['type']    = 'radio';
                  $this->NM_ajax_info['fldList']['puntoventa_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input(NM_charset_to_utf8($this->puntoventa_)));
                  $this->NM_ajax_info['fldList']['puntoventa_' . $this->nmgp_refresh_row]['labList'] = array($tmpLabel_puntoventa_);

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['puntoventa_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['puntoventa_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['puntoventa_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['puntoventa_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $aLookup = array();
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['Lookup_id_status_']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['Lookup_id_status_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['Lookup_id_status_']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['Lookup_id_status_'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_dateproduct_ = $this->dateproduct_;
   $old_value_dateproduct__hora = $this->dateproduct__hora;
   $old_value_product_cost_ = $this->product_cost_;
   $old_value_stock_ = $this->stock_;
   $old_value_product_value_ = $this->product_value_;
   $old_value_discount_ = $this->discount_;
   $old_value_poriva_ = $this->poriva_;
   $old_value_precioventa_ = $this->precioventa_;
   $old_value_minutos_ = $this->minutos_;
   $old_value_tokens_ = $this->tokens_;
   $old_value_score_ = $this->score_;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_dateproduct_ = $this->dateproduct_;
   $unformatted_value_dateproduct__hora = $this->dateproduct__hora;
   $unformatted_value_product_cost_ = $this->product_cost_;
   $unformatted_value_stock_ = $this->stock_;
   $unformatted_value_product_value_ = $this->product_value_;
   $unformatted_value_discount_ = $this->discount_;
   $unformatted_value_poriva_ = $this->poriva_;
   $unformatted_value_precioventa_ = $this->precioventa_;
   $unformatted_value_minutos_ = $this->minutos_;
   $unformatted_value_tokens_ = $this->tokens_;
   $unformatted_value_score_ = $this->score_;

   $nm_comando = "SELECT id_status, status  FROM status  ORDER BY status";

   $this->dateproduct_ = $old_value_dateproduct_;
   $this->dateproduct__hora = $old_value_dateproduct__hora;
   $this->product_cost_ = $old_value_product_cost_;
   $this->stock_ = $old_value_stock_;
   $this->product_value_ = $old_value_product_value_;
   $this->discount_ = $old_value_discount_;
   $this->poriva_ = $old_value_poriva_;
   $this->precioventa_ = $old_value_precioventa_;
   $this->minutos_ = $old_value_minutos_;
   $this->tokens_ = $old_value_tokens_;
   $this->score_ = $old_value_score_;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $aLookup[] = array(form_product_edit_masivo_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', form_product_edit_masivo_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['Lookup_id_status_'][] = $rs->fields[0];
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
              if (key($aValData) == form_product_edit_masivo_pack_protect_string(NM_charset_to_utf8($this->id_status_)))
              {
                  $sLabelTemp = current($aValData);
              }
          }
          $tmpLabel_id_status_ = $sLabelTemp;
                  $this->NM_ajax_info['fldList']['id_status_' . $this->nmgp_refresh_row]['type']    = 'select';
                  $this->NM_ajax_info['fldList']['id_status_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input(NM_charset_to_utf8($this->id_status_)));
                  $this->NM_ajax_info['fldList']['id_status_' . $this->nmgp_refresh_row]['labList'] = array($tmpLabel_id_status_);

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['id_status_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['id_status_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['id_status_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['id_status_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

   if ($this->image_ != "" && $this->image_ != "none")   
   { 
       $this->image_ = $NM_val_form['image_'];
       $out_image_ = $this->Ini->path_imag_temp . "/sc_image__" . $_SESSION['scriptcase']['sc_num_img'] . session_id() . ".gif" ;  
       $out1_image_ = $out_image_; 
       $arq_image_ = fopen($this->Ini->root . $out_image_, "w") ;  
       $img_pos_bm = strpos($this->image_, "BM") ; 
       if (!$img_pos_bm === FALSE && $img_pos_bm == 78) 
       { 
           $this->image_ = substr($this->image_, $img_pos_bm) ; 
       } 
       fwrite($arq_image_, $this->image_) ;  
       fclose($arq_image_) ;  
       $sc_obj_img = new nm_trata_img($this->Ini->root . $out_image_, true);
       $this->nmgp_return_img['image_'][0] = $sc_obj_img->getHeight();
       $this->nmgp_return_img['image_'][1] = $sc_obj_img->getWidth();
       $_SESSION['scriptcase']['sc_num_img']++ ; 
       $out_image_ = $this->Ini->path_imag_temp . "/sc_" . "image__" . $_SESSION['scriptcase']['sc_num_img'] . session_id() . ".gif" ; 
       $_SESSION['scriptcase']['sc_num_img']++ ; 
       if (!$this->Ini->Gd_missing)
       { 
           $sc_obj_img = new nm_trata_img($this->Ini->root . $out1_image_, true);
           $sc_obj_img->setWidth(200);
           $sc_obj_img->setHeight(200);
           $sc_obj_img->setManterAspecto(true);
           $sc_obj_img->createImg($this->Ini->root . $out_image_);
       } 
       else 
       { 
           $out_image_ = $out1_image_;
       } 
       $_SESSION['scriptcase']['sc_num_img']++ ; 
   } 
   if ($this->Embutida_ronly)
   {
       $this->NM_ajax_info['fldList']['image_' . $this->nmgp_refresh_row]['keepImg'] = 'S';
   }
                  $this->NM_ajax_info['fldList']['image_' . $this->nmgp_refresh_row]['imgFile'] = $out_image_;
                  $this->NM_ajax_info['fldList']['image_' . $this->nmgp_refresh_row]['imgOrig'] = $out1_image_;
                  $this->NM_ajax_info['fldList']['image_' . $this->nmgp_refresh_row]['type']    = 'imagem';
                  $this->NM_ajax_info['fldList']['image_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input(NM_charset_to_utf8($this->image_)));
                  $this->NM_ajax_info['fldList']['image_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input(NM_charset_to_utf8($tmpLabel_image_)));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['image_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['image_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['image_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['image_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $aLookup = array();
$aLookup[] = array(form_product_edit_masivo_pack_protect_string('1') => str_replace('<', '&lt;',form_product_edit_masivo_pack_protect_string("SI")));
$aLookup[] = array(form_product_edit_masivo_pack_protect_string('0') => str_replace('<', '&lt;',form_product_edit_masivo_pack_protect_string("NO")));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['Lookup_entrada_'][] = '1';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['Lookup_entrada_'][] = '0';
          $sLabelTemp = '';
          foreach ($aLookup as $aValData)
          {
              if (key($aValData) == form_product_edit_masivo_pack_protect_string(NM_charset_to_utf8($this->entrada_)))
              {
                  $sLabelTemp = current($aValData);
              }
          }
          $tmpLabel_entrada_ = $sLabelTemp;
                  $this->NM_ajax_info['fldList']['entrada_' . $this->nmgp_refresh_row]['type']    = 'radio';
                  $this->NM_ajax_info['fldList']['entrada_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input(NM_charset_to_utf8($this->entrada_)));
                  $this->NM_ajax_info['fldList']['entrada_' . $this->nmgp_refresh_row]['labList'] = array($tmpLabel_entrada_);

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['entrada_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['entrada_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['entrada_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['entrada_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $aLookup = array();
$aLookup[] = array(form_product_edit_masivo_pack_protect_string('1') => str_replace('<', '&lt;',form_product_edit_masivo_pack_protect_string("SI")));
$aLookup[] = array(form_product_edit_masivo_pack_protect_string('0') => str_replace('<', '&lt;',form_product_edit_masivo_pack_protect_string("NO")));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['Lookup_service_'][] = '1';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['Lookup_service_'][] = '0';
          $sLabelTemp = '';
          foreach ($aLookup as $aValData)
          {
              if (key($aValData) == form_product_edit_masivo_pack_protect_string(NM_charset_to_utf8($this->service_)))
              {
                  $sLabelTemp = current($aValData);
              }
          }
          $tmpLabel_service_ = $sLabelTemp;
                  $this->NM_ajax_info['fldList']['service_' . $this->nmgp_refresh_row]['type']    = 'radio';
                  $this->NM_ajax_info['fldList']['service_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input(NM_charset_to_utf8($this->service_)));
                  $this->NM_ajax_info['fldList']['service_' . $this->nmgp_refresh_row]['labList'] = array($tmpLabel_service_);

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['service_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['service_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['service_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['service_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $aLookup = array();
$aLookup[] = array(form_product_edit_masivo_pack_protect_string('1') => str_replace('<', '&lt;',form_product_edit_masivo_pack_protect_string("SI")));
$aLookup[] = array(form_product_edit_masivo_pack_protect_string('0') => str_replace('<', '&lt;',form_product_edit_masivo_pack_protect_string("NO")));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['Lookup_kiosko_'][] = '1';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['Lookup_kiosko_'][] = '0';
          $sLabelTemp = '';
          foreach ($aLookup as $aValData)
          {
              if (key($aValData) == form_product_edit_masivo_pack_protect_string(NM_charset_to_utf8($this->kiosko_)))
              {
                  $sLabelTemp = current($aValData);
              }
          }
          $tmpLabel_kiosko_ = $sLabelTemp;
                  $this->NM_ajax_info['fldList']['kiosko_' . $this->nmgp_refresh_row]['type']    = 'radio';
                  $this->NM_ajax_info['fldList']['kiosko_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input(NM_charset_to_utf8($this->kiosko_)));
                  $this->NM_ajax_info['fldList']['kiosko_' . $this->nmgp_refresh_row]['labList'] = array($tmpLabel_kiosko_);

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['kiosko_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['kiosko_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['kiosko_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['kiosko_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $aLookup = array();
$aLookup[] = array(form_product_edit_masivo_pack_protect_string('1') => str_replace('<', '&lt;',form_product_edit_masivo_pack_protect_string("SI")));
$aLookup[] = array(form_product_edit_masivo_pack_protect_string('0') => str_replace('<', '&lt;',form_product_edit_masivo_pack_protect_string("NO")));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['Lookup_jugador_'][] = '1';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['Lookup_jugador_'][] = '0';
          $sLabelTemp = '';
          foreach ($aLookup as $aValData)
          {
              if (key($aValData) == form_product_edit_masivo_pack_protect_string(NM_charset_to_utf8($this->jugador_)))
              {
                  $sLabelTemp = current($aValData);
              }
          }
          $tmpLabel_jugador_ = $sLabelTemp;
                  $this->NM_ajax_info['fldList']['jugador_' . $this->nmgp_refresh_row]['type']    = 'radio';
                  $this->NM_ajax_info['fldList']['jugador_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input(NM_charset_to_utf8($this->jugador_)));
                  $this->NM_ajax_info['fldList']['jugador_' . $this->nmgp_refresh_row]['labList'] = array($tmpLabel_jugador_);

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['jugador_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['jugador_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['jugador_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['jugador_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $aLookup = array();
$aLookup[] = array(form_product_edit_masivo_pack_protect_string('1') => str_replace('<', '&lt;',form_product_edit_masivo_pack_protect_string("SI")));
$aLookup[] = array(form_product_edit_masivo_pack_protect_string('0') => str_replace('<', '&lt;',form_product_edit_masivo_pack_protect_string("NO")));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['Lookup_visitante_'][] = '1';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['Lookup_visitante_'][] = '0';
          $sLabelTemp = '';
          foreach ($aLookup as $aValData)
          {
              if (key($aValData) == form_product_edit_masivo_pack_protect_string(NM_charset_to_utf8($this->visitante_)))
              {
                  $sLabelTemp = current($aValData);
              }
          }
          $tmpLabel_visitante_ = $sLabelTemp;
                  $this->NM_ajax_info['fldList']['visitante_' . $this->nmgp_refresh_row]['type']    = 'radio';
                  $this->NM_ajax_info['fldList']['visitante_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input(NM_charset_to_utf8($this->visitante_)));
                  $this->NM_ajax_info['fldList']['visitante_' . $this->nmgp_refresh_row]['labList'] = array($tmpLabel_visitante_);

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['visitante_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['visitante_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['visitante_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['visitante_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $this->NM_ajax_info['fldList']['minutos_' . $this->nmgp_refresh_row]['type']    = 'text';
                  $this->NM_ajax_info['fldList']['minutos_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input(NM_charset_to_utf8($this->minutos_)));
                  $this->NM_ajax_info['fldList']['minutos_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input(NM_charset_to_utf8($tmpLabel_minutos_)));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['minutos_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['minutos_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['minutos_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['minutos_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $aLookup = array();
$aLookup[] = array(form_product_edit_masivo_pack_protect_string('1') => str_replace('<', '&lt;',form_product_edit_masivo_pack_protect_string("SI")));
$aLookup[] = array(form_product_edit_masivo_pack_protect_string('0') => str_replace('<', '&lt;',form_product_edit_masivo_pack_protect_string("NO")));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['Lookup_tarjeta_'][] = '1';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['Lookup_tarjeta_'][] = '0';
          $sLabelTemp = '';
          foreach ($aLookup as $aValData)
          {
              if (key($aValData) == form_product_edit_masivo_pack_protect_string(NM_charset_to_utf8($this->tarjeta_)))
              {
                  $sLabelTemp = current($aValData);
              }
          }
          $tmpLabel_tarjeta_ = $sLabelTemp;
                  $this->NM_ajax_info['fldList']['tarjeta_' . $this->nmgp_refresh_row]['type']    = 'radio';
                  $this->NM_ajax_info['fldList']['tarjeta_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input(NM_charset_to_utf8($this->tarjeta_)));
                  $this->NM_ajax_info['fldList']['tarjeta_' . $this->nmgp_refresh_row]['labList'] = array($tmpLabel_tarjeta_);

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['tarjeta_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['tarjeta_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['tarjeta_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['tarjeta_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $this->NM_ajax_info['fldList']['tokens_' . $this->nmgp_refresh_row]['type']    = 'text';
                  $this->NM_ajax_info['fldList']['tokens_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input(NM_charset_to_utf8($this->tokens_)));
                  $this->NM_ajax_info['fldList']['tokens_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input(NM_charset_to_utf8($tmpLabel_tokens_)));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['tokens_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['tokens_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['tokens_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['tokens_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $aLookup = array();
$aLookup[] = array(form_product_edit_masivo_pack_protect_string('1') => str_replace('<', '&lt;',form_product_edit_masivo_pack_protect_string("SI")));
$aLookup[] = array(form_product_edit_masivo_pack_protect_string('0') => str_replace('<', '&lt;',form_product_edit_masivo_pack_protect_string("NO")));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['Lookup_comida_'][] = '1';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['Lookup_comida_'][] = '0';
          $sLabelTemp = '';
          foreach ($aLookup as $aValData)
          {
              if (key($aValData) == form_product_edit_masivo_pack_protect_string(NM_charset_to_utf8($this->comida_)))
              {
                  $sLabelTemp = current($aValData);
              }
          }
          $tmpLabel_comida_ = $sLabelTemp;
                  $this->NM_ajax_info['fldList']['comida_' . $this->nmgp_refresh_row]['type']    = 'radio';
                  $this->NM_ajax_info['fldList']['comida_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input(NM_charset_to_utf8($this->comida_)));
                  $this->NM_ajax_info['fldList']['comida_' . $this->nmgp_refresh_row]['labList'] = array($tmpLabel_comida_);

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['comida_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['comida_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['comida_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['comida_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $this->NM_ajax_info['fldList']['score_' . $this->nmgp_refresh_row]['type']    = 'text';
                  $this->NM_ajax_info['fldList']['score_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input(NM_charset_to_utf8($this->score_)));
                  $this->NM_ajax_info['fldList']['score_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input(NM_charset_to_utf8($tmpLabel_score_)));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['score_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['score_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['score_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['score_' . $this->nmgp_refresh_row] = "on";
                      }
                  }


                  $this->nm_tira_formatacao();
                  $this->nm_converte_datas();

                  $this->NM_ajax_info['closeLine'] = $this->nmgp_refresh_row;
              }
              if ('refresh_insert' != $this->nmgp_opcao && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['sc_redir_insert']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['sc_redir_insert'] != "S"))
              {
              $this->nmgp_opcao = "novo"; 
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['run_iframe'] == "R")
              { 
                   $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['return_edit'] = "new";
              } 
              }
              $this->nm_flag_iframe = true;
          } 
          if ($this->lig_edit_lookup)
          {
              $this->lig_edit_lookup_call = true;
          }
      } 
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['decimal_db'] == ",") 
      {
          $this->nm_tira_aspas_decimal();
      }
      if ($this->nmgp_opcao == "excluir") 
      { 
          $this->id_product_ = substr($this->Db->qstr($this->id_product_), 1, -1); 

          $bDelecaoOk = true;
          $sMsgErro   = '';

          if ($bDelecaoOk)
          {

          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where id_product = $this->id_product_"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where id_product = $this->id_product_ "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where id_product = $this->id_product_"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where id_product = $this->id_product_ "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where id_product = $this->id_product_"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where id_product = $this->id_product_ "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where id_product = $this->id_product_"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where id_product = $this->id_product_ "); 
          }  
          else  
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where id_product = $this->id_product_"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where id_product = $this->id_product_ "); 
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
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where id_product = $this->id_product_ "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where id_product = $this->id_product_ "); 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where id_product = $this->id_product_ "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where id_product = $this->id_product_ "); 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              {
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where id_product = $this->id_product_ "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where id_product = $this->id_product_ "); 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where id_product = $this->id_product_ "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where id_product = $this->id_product_ "); 
              }  
              else  
              {
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where id_product = $this->id_product_ "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where id_product = $this->id_product_ "); 
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
                          form_product_edit_masivo_pack_ajax_response();
                          exit; 
                      }
                  } 
              } 
              $this->sc_evento = "delete"; 
              $this->nmgp_opcao = "avanca"; 
              $this->nm_flag_iframe = true;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['reg_start']--; 
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['reg_start'] < 0)
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['reg_start'] = 0; 
              }

              $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['db_changed'] = true;

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
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['parms'] = "id_product_?#?$this->id_product_?@?"; 
      }
      $this->nmgp_dados_form['image_'] = ""; 
      $this->image__limpa = ""; 
      $this->image__salva = ""; 
      if ($this->sc_evento != "insert" && $this->sc_evento != "update" && $this->sc_evento != "delete")
      { 
          $this->id_product_ = null === $this->id_product_ ? null : substr($this->Db->qstr($this->id_product_), 1, -1); 
      } 
   }
//---------- 
   function nm_select_banco() 
   { 
      global $nm_form_submit, $sc_seq_vert, $sc_check_incl, $teste_validade, $sc_where;
 
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_product_edit_masivo']['rows']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['form_product_edit_masivo']['rows']))
      {
          $this->sc_max_reg = $_SESSION['scriptcase']['sc_apl_conf']['form_product_edit_masivo']['rows'];
      } 
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_product_edit_masivo']['rows_ins']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['form_product_edit_masivo']['rows_ins']))
      {
          $this->sc_max_reg_incl = $_SESSION['scriptcase']['sc_apl_conf']['form_product_edit_masivo']['rows_ins'];
      } 
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['embutida_liga_qtd_reg']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['embutida_liga_qtd_reg'])
      {
          $this->sc_max_reg = $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['embutida_liga_qtd_reg'];
      }
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $GLOBALS["NM_ERRO_IBASE"] = 0;  
      $this->form_vert_form_product_edit_masivo = array();
      if ($this->nmgp_opcao != "novo") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['parms'] = ""; 
      } 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
      { 
          $GLOBALS["NM_ERRO_IBASE"] = 1;  
      } 
      if ($this->sc_teve_excl)
      {
          $this->nmgp_opcao = "avanca";
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['reg_start'] -= $this->sc_max_reg;
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['reg_start']) || empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['reg_start']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['reg_start'] = 0;
      }
      if (isset($this->NM_where_filter))
      {
          $this->NM_where_filter = str_replace("@percent@", "%", $this->NM_where_filter);
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['where_filter'] = trim($this->NM_where_filter);
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['total']))
          {
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['total']);
          }
      }
      $sc_where_filter = '';
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['where_filter_form']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['where_filter_form'])
      {
          $sc_where_filter = $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['where_filter_form'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['where_filter']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['where_filter'] && $sc_where_filter != $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['where_filter'])
      {
          if (empty($sc_where_filter))
          {
              $sc_where_filter = $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['where_filter'];
          }
          else
          {
              $sc_where_filter .= " and (" . $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['where_filter'] . ")";
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
          if (null != $this->id_product_)
          {
              $aNewWhereCond[] = "id_product = " . $this->id_product_;
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
          if ($this->app_is_initializing || $this->sc_teve_excl || $this->sc_teve_incl || (isset($_POST['master_nav']) && 'on' == $_POST['master_nav']) || !isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['total']))
          {
              $nmgp_select = "SELECT count(*) AS countTest from " . $this->Ini->nm_tabela . $sc_where;
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select;
              $rt = $this->Db->Execute($nmgp_select);
              if ($rt === false && !$rt->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1)
              {
                  $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
                  exit;
              }
              $qt_geral_reg_form_product_edit_masivo = isset($rt->fields[0]) ? $rt->fields[0] - 1 : 0;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['total'] = $qt_geral_reg_form_product_edit_masivo;
              $rt->Close();
          }
      if ((isset($_POST['master_nav']) && 'on' == $_POST['master_nav']) || !isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['total']) || $this->sc_teve_excl || $this->sc_teve_incl)
      { 
          if (!$this->sc_teve_excl && !$this->sc_teve_incl) 
          { 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['reg_start'] = 0; 
          } 
          if ($this->nmgp_opcao == "igual" && isset($this->NM_btn_navega) && 'S' == $this->NM_btn_navega && !empty($this->id_product_))
          {
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              {
                  $Key_Where = "id_product < $this->id_product_ "; 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
                  $Key_Where = "id_product < $this->id_product_ "; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              {
                  $Key_Where = "id_product < $this->id_product_ "; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $Key_Where = "id_product < $this->id_product_ "; 
              }
              else  
              {
                  $Key_Where = "id_product < $this->id_product_ "; 
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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['reg_start'] = $rt->fields[0];
              $rt->Close(); 
          }
      } 
      else 
      { 
          $qt_geral_reg_form_product_edit_masivo = $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['total'];
      } 
      if ($this->nmgp_opcao == "inicio" || $this->nmgp_opcao == "ordem") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['reg_start'] = 0; 
      } 
      if ($this->nmgp_opcao == "navpage" && ($this->nmgp_ordem - 1) <= $qt_geral_reg_form_product_edit_masivo) 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['reg_start'] = $this->nmgp_ordem - 1; 
      } 
      if ($this->nmgp_opcao == "avanca")  
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['reg_start'] += $this->sc_max_reg; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['reg_start'] > $qt_geral_reg_form_product_edit_masivo)
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['reg_start'] = $qt_geral_reg_form_product_edit_masivo - $this->sc_max_reg; 
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['reg_start'] < 0)
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['reg_start'] = 0; 
              }
          }
      } 
      if ($this->nmgp_opcao == "retorna") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['reg_start'] -= $this->sc_max_reg; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['reg_start'] < 0)
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['reg_start'] = 0; 
          }
      } 
      if ($this->nmgp_opcao == "final") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['reg_start'] = ($qt_geral_reg_form_product_edit_masivo + 1) - $this->sc_max_reg; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['reg_start'] < 0)
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['reg_start'] = 0; 
          }
      } 
      }
      $Cmps_ord_def = array();
      $sc_order_by  = "";
      $sc_order_by = "id_product";
      $sc_order_by = str_replace("order by ", "", $sc_order_by);
      $sc_order_by = str_replace("ORDER BY ", "", trim($sc_order_by));
      if (!empty($sc_order_by))
      {
          $sc_order_by = " order by $sc_order_by "; 
      }
      if ($this->nmgp_opcao == "ordem" && in_array($this->nmgp_ordem, $Cmps_ord_def)) 
      { 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['ordem_cmp'] != $this->nmgp_ordem)
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['ordem_cmp'] = $this->nmgp_ordem; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['ordem_ord'] = ' asc'; 
              switch ($this->nmgp_ordem) {
                  case "id_category":
                      $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['ordem_ord'] = ' desc';
                      break;
                  case "dateproduct":
                      $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['ordem_ord'] = ' desc';
                      break;
                  case "product_cost":
                      $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['ordem_ord'] = ' desc';
                      break;
                  case "stock":
                      $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['ordem_ord'] = ' desc';
                      break;
                  case "product_value":
                      $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['ordem_ord'] = ' desc';
                      break;
                  case "discount":
                      $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['ordem_ord'] = ' desc';
                      break;
                  case "poriva":
                      $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['ordem_ord'] = ' desc';
                      break;
                  case "precioventa":
                      $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['ordem_ord'] = ' desc';
                      break;
                  case "puntoventa":
                      $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['ordem_ord'] = ' desc';
                      break;
                  case "id_status":
                      $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['ordem_ord'] = ' desc';
                      break;
                  case "entrada":
                      $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['ordem_ord'] = ' desc';
                      break;
                  case "service":
                      $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['ordem_ord'] = ' desc';
                      break;
                  case "kiosko":
                      $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['ordem_ord'] = ' desc';
                      break;
                  case "jugador":
                      $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['ordem_ord'] = ' desc';
                      break;
                  case "visitante":
                      $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['ordem_ord'] = ' desc';
                      break;
                  case "minutos":
                      $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['ordem_ord'] = ' desc';
                      break;
                  case "tarjeta":
                      $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['ordem_ord'] = ' desc';
                      break;
                  case "tokens":
                      $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['ordem_ord'] = ' desc';
                      break;
                  case "comida":
                      $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['ordem_ord'] = ' desc';
                      break;
                  case "score":
                      $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['ordem_ord'] = ' desc';
                      break;
                  case "id_product":
                      $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['ordem_ord'] = ' desc';
                      break;
                  default:
                      $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['ordem_ord'] = ' asc';
                      break;
              }
          }
          elseif ($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['ordem_ord'] == ' asc')
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['ordem_ord'] = ' desc'; 
          }
          else
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['ordem_ord'] = ' asc'; 
          }
      } 
      if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['ordem_cmp'])) 
      { 
          $sc_order_by = " order by " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['ordem_cmp'] . $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['ordem_ord']; 
      } 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
          $nmgp_select = "SELECT id_product, product_name, product_code, id_status, str_replace (convert(char(10),dateproduct,102), '.', '-') + ' ' + convert(char(8),dateproduct,20), product_value, product_cost, discount, stock, id_category, image, service, kiosko, entrada, jugador, visitante, tarjeta, minutos, tokens, comida, score, poriva, cuentaventa, unidad, tipoitem, cuentacompra, precioventa, puntoventa from " . $this->Ini->nm_tabela . $sc_where . $sc_order_by; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nmgp_select = "SELECT id_product, product_name, product_code, id_status, convert(char(23),dateproduct,121), product_value, product_cost, discount, stock, id_category, image, service, kiosko, entrada, jugador, visitante, tarjeta, minutos, tokens, comida, score, poriva, cuentaventa, unidad, tipoitem, cuentacompra, precioventa, puntoventa from " . $this->Ini->nm_tabela . $sc_where . $sc_order_by; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
      { 
          $nmgp_select = "SELECT id_product, product_name, product_code, id_status, dateproduct, product_value, product_cost, discount, stock, id_category, image, service, kiosko, entrada, jugador, visitante, tarjeta, minutos, tokens, comida, score, poriva, cuentaventa, unidad, tipoitem, cuentacompra, precioventa, puntoventa from " . $this->Ini->nm_tabela . $sc_where . $sc_order_by; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
      { 
          $nmgp_select = "SELECT id_product, product_name, product_code, id_status, EXTEND(dateproduct, YEAR TO FRACTION), product_value, product_cost, discount, stock, id_category, LOTOFILE(image, '" . $this->Ini->root . $this->Ini->path_imag_temp . "/sc_blob_image', 'client'), service, kiosko, entrada, jugador, visitante, tarjeta, minutos, tokens, comida, score, poriva, cuentaventa, unidad, tipoitem, cuentacompra, precioventa, puntoventa from " . $this->Ini->nm_tabela . $sc_where . $sc_order_by; 
      } 
      else 
      { 
          $nmgp_select = "SELECT id_product, product_name, product_code, id_status, dateproduct, product_value, product_cost, discount, stock, id_category, image, service, kiosko, entrada, jugador, visitante, tarjeta, minutos, tokens, comida, score, poriva, cuentaventa, unidad, tipoitem, cuentacompra, precioventa, puntoventa from " . $this->Ini->nm_tabela . $sc_where . $sc_order_by; 
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
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['run_iframe'] == "R")
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
              $rs = $this->Db->Execute($nmgp_select) ; 
          } 
          else 
          { 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
              { 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "SelectLimit($nmgp_select, $this->sc_max_reg, " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['reg_start'] . ")" ; 
                  $rs = $this->Db->SelectLimit($nmgp_select, $this->sc_max_reg, $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['reg_start']) ; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              { 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "SelectLimit($nmgp_select, $this->sc_max_reg, " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['reg_start'] . ")" ; 
                  $rs = $this->Db->SelectLimit($nmgp_select, $this->sc_max_reg, $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['reg_start']) ; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              { 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "SelectLimit($nmgp_select, $this->sc_max_reg, " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['reg_start'] . ")" ; 
                  $rs = $this->Db->SelectLimit($nmgp_select, $this->sc_max_reg, $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['reg_start']) ; 
              } 
              else  
              { 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
                  $rs = $this->Db->Execute($nmgp_select) ; 
                  if (!$rs === false && !$rs->EOF) 
                  { 
                      $rs->Move($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['reg_start']) ;  
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
          if ($rs->EOF && !$this->proc_fast_search && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['empty_filter']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['empty_filter'])) 
          { 
              $this->nm_flag_saida_novo = "S"; 
              $this->nmgp_opcao = "novo"; 
              $this->sc_evento  = "novo"; 
              if ($this->aba_iframe)
              {
                  $this->nmgp_botoes['exit'] = 'off';
              }
          } 
          if ($rs->EOF && $this->nmgp_botoes['new'] != "on" && !$this->proc_fast_search)
          {
              $this->nmgp_form_empty = true;
          }
          if ($rs->EOF)
          {
              $sc_seq_vert = 0; 
              if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['where_filter']))
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['empty_filter'] = true;
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
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['run_iframe'] == "R")
              { 
                  $this->sc_max_reg++;
              } 
              }
              $this->id_product_ = $rs->fields[0] ; 
              $this->nmgp_dados_select['id_product_'] = $this->id_product_;
              $this->product_name_ = $rs->fields[1] ; 
              $this->nmgp_dados_select['product_name_'] = $this->product_name_;
              $this->product_code_ = $rs->fields[2] ; 
              $this->nmgp_dados_select['product_code_'] = $this->product_code_;
              $this->id_status_ = $rs->fields[3] ; 
              $this->nmgp_dados_select['id_status_'] = $this->id_status_;
              $this->dateproduct_ = $rs->fields[4] ; 
              if (substr($this->dateproduct_, 10, 1) == "-") 
              { 
                 $this->dateproduct_ = substr($this->dateproduct_, 0, 10) . " " . substr($this->dateproduct_, 11);
              } 
              if (substr($this->dateproduct_, 13, 1) == ".") 
              { 
                 $this->dateproduct_ = substr($this->dateproduct_, 0, 13) . ":" . substr($this->dateproduct_, 14, 2) . ":" . substr($this->dateproduct_, 17);
              } 
              $this->nmgp_dados_select['dateproduct_'] = $this->dateproduct_;
              $this->product_value_ = $rs->fields[5] ; 
              $this->nmgp_dados_select['product_value_'] = $this->product_value_;
              $this->product_cost_ = $rs->fields[6] ; 
              $this->nmgp_dados_select['product_cost_'] = $this->product_cost_;
              $this->discount_ = $rs->fields[7] ; 
              $this->nmgp_dados_select['discount_'] = $this->discount_;
              $this->stock_ = $rs->fields[8] ; 
              $this->nmgp_dados_select['stock_'] = $this->stock_;
              $this->id_category_ = $rs->fields[9] ; 
              $this->nmgp_dados_select['id_category_'] = $this->id_category_;
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
              { 
                  $this->image_ = $this->Db->BlobDecode($rs->fields[10]) ; 
              } 
              elseif ($this->Ini->nm_tpbanco == 'pdo_oracle')
              { 
                  $this->image_ = $this->Db->BlobDecode($rs->fields[10]) ; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              { 
                  if(isset($rs->fields[10]) && !empty($rs->fields[10]) && is_file($rs->fields[10])) 
                  { 
                     $this->image_ = file_get_contents($rs->fields[10]); 
                  }else 
                  { 
                     $this->image_ = ''; 
                  } 
              } 
              else
              { 
                  $this->image_ = $rs->fields[10] ; 
              } 
              $this->nmgp_dados_select['image_'] = $this->image_;
              $this->service_ = $rs->fields[11] ; 
              $this->nmgp_dados_select['service_'] = $this->service_;
              $this->kiosko_ = $rs->fields[12] ; 
              $this->nmgp_dados_select['kiosko_'] = $this->kiosko_;
              $this->entrada_ = $rs->fields[13] ; 
              $this->nmgp_dados_select['entrada_'] = $this->entrada_;
              $this->jugador_ = $rs->fields[14] ; 
              $this->nmgp_dados_select['jugador_'] = $this->jugador_;
              $this->visitante_ = $rs->fields[15] ; 
              $this->nmgp_dados_select['visitante_'] = $this->visitante_;
              $this->tarjeta_ = $rs->fields[16] ; 
              $this->nmgp_dados_select['tarjeta_'] = $this->tarjeta_;
              $this->minutos_ = $rs->fields[17] ; 
              $this->nmgp_dados_select['minutos_'] = $this->minutos_;
              $this->tokens_ = $rs->fields[18] ; 
              $this->nmgp_dados_select['tokens_'] = $this->tokens_;
              $this->comida_ = $rs->fields[19] ; 
              $this->nmgp_dados_select['comida_'] = $this->comida_;
              $this->score_ = $rs->fields[20] ; 
              $this->nmgp_dados_select['score_'] = $this->score_;
              $this->poriva_ = $rs->fields[21] ; 
              $this->nmgp_dados_select['poriva_'] = $this->poriva_;
              $this->cuentaventa_ = $rs->fields[22] ; 
              $this->nmgp_dados_select['cuentaventa_'] = $this->cuentaventa_;
              $this->unidad_ = $rs->fields[23] ; 
              $this->nmgp_dados_select['unidad_'] = $this->unidad_;
              $this->tipoitem_ = $rs->fields[24] ; 
              $this->nmgp_dados_select['tipoitem_'] = $this->tipoitem_;
              $this->cuentacompra_ = $rs->fields[25] ; 
              $this->nmgp_dados_select['cuentacompra_'] = $this->cuentacompra_;
              $this->precioventa_ = $rs->fields[26] ; 
              $this->nmgp_dados_select['precioventa_'] = $this->precioventa_;
              $this->puntoventa_ = $rs->fields[27] ; 
              $this->nmgp_dados_select['puntoventa_'] = $this->puntoventa_;
              $GLOBALS["NM_ERRO_IBASE"] = 0; 
              $this->nm_troca_decimal(",", ".");
              $this->id_product_ = (string)$this->id_product_; 
              $this->id_status_ = (string)$this->id_status_; 
              $this->product_value_ = (string)$this->product_value_; 
              $this->product_cost_ = (string)$this->product_cost_; 
              $this->discount_ = (string)$this->discount_; 
              $this->stock_ = (string)$this->stock_; 
              $this->id_category_ = (string)$this->id_category_; 
              $this->service_ = (string)$this->service_; 
              $this->kiosko_ = (string)$this->kiosko_; 
              $this->entrada_ = (string)$this->entrada_; 
              $this->jugador_ = (string)$this->jugador_; 
              $this->visitante_ = (string)$this->visitante_; 
              $this->tarjeta_ = (string)$this->tarjeta_; 
              $this->minutos_ = (string)$this->minutos_; 
              $this->tokens_ = (string)$this->tokens_; 
              $this->comida_ = (string)$this->comida_; 
              $this->score_ = (string)$this->score_; 
              $this->poriva_ = (string)$this->poriva_; 
              $this->precioventa_ = (string)$this->precioventa_; 
              $this->puntoventa_ = (string)$this->puntoventa_; 
              if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['parms'])) 
              { 
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['parms'] = "id_product_?#?$this->id_product_?@?";
              } 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['sub_dir'][0]  = "";
              $this->nm_proc_onload_record($sc_seq_vert);
              $this->storeRecordState($sc_seq_vert);
//
//-- 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['dados_select'][$sc_seq_vert] = $this->nmgp_dados_select;
              $this->nm_guardar_campos();
              $this->nm_formatar_campos();
             $this->form_vert_form_product_edit_masivo[$sc_seq_vert]['product_name_'] =  $this->product_name_; 
             $this->form_vert_form_product_edit_masivo[$sc_seq_vert]['id_category_'] =  $this->id_category_; 
             $this->form_vert_form_product_edit_masivo[$sc_seq_vert]['product_code_'] =  $this->product_code_; 
             $this->form_vert_form_product_edit_masivo[$sc_seq_vert]['dateproduct_'] =  $this->dateproduct_; 
             $this->form_vert_form_product_edit_masivo[$sc_seq_vert]['dateproduct__hora'] =  $this->dateproduct__hora; 
             $this->form_vert_form_product_edit_masivo[$sc_seq_vert]['product_cost_'] =  $this->product_cost_; 
             $this->form_vert_form_product_edit_masivo[$sc_seq_vert]['stock_'] =  $this->stock_; 
             $this->form_vert_form_product_edit_masivo[$sc_seq_vert]['product_value_'] =  $this->product_value_; 
             $this->form_vert_form_product_edit_masivo[$sc_seq_vert]['discount_'] =  $this->discount_; 
             $this->form_vert_form_product_edit_masivo[$sc_seq_vert]['poriva_'] =  $this->poriva_; 
             $this->form_vert_form_product_edit_masivo[$sc_seq_vert]['cuentaventa_'] =  $this->cuentaventa_; 
             $this->form_vert_form_product_edit_masivo[$sc_seq_vert]['unidad_'] =  $this->unidad_; 
             $this->form_vert_form_product_edit_masivo[$sc_seq_vert]['tipoitem_'] =  $this->tipoitem_; 
             $this->form_vert_form_product_edit_masivo[$sc_seq_vert]['cuentacompra_'] =  $this->cuentacompra_; 
             $this->form_vert_form_product_edit_masivo[$sc_seq_vert]['precioventa_'] =  $this->precioventa_; 
             $this->form_vert_form_product_edit_masivo[$sc_seq_vert]['puntoventa_'] =  $this->puntoventa_; 
             $this->form_vert_form_product_edit_masivo[$sc_seq_vert]['id_status_'] =  $this->id_status_; 
             $this->form_vert_form_product_edit_masivo[$sc_seq_vert]['image_'] =  $this->image_; 
             $this->form_vert_form_product_edit_masivo[$sc_seq_vert]['image__limpa'] =  $this->image__limpa; 
             $this->form_vert_form_product_edit_masivo[$sc_seq_vert]['entrada_'] =  $this->entrada_; 
             $this->form_vert_form_product_edit_masivo[$sc_seq_vert]['service_'] =  $this->service_; 
             $this->form_vert_form_product_edit_masivo[$sc_seq_vert]['kiosko_'] =  $this->kiosko_; 
             $this->form_vert_form_product_edit_masivo[$sc_seq_vert]['jugador_'] =  $this->jugador_; 
             $this->form_vert_form_product_edit_masivo[$sc_seq_vert]['visitante_'] =  $this->visitante_; 
             $this->form_vert_form_product_edit_masivo[$sc_seq_vert]['minutos_'] =  $this->minutos_; 
             $this->form_vert_form_product_edit_masivo[$sc_seq_vert]['tarjeta_'] =  $this->tarjeta_; 
             $this->form_vert_form_product_edit_masivo[$sc_seq_vert]['tokens_'] =  $this->tokens_; 
             $this->form_vert_form_product_edit_masivo[$sc_seq_vert]['comida_'] =  $this->comida_; 
             $this->form_vert_form_product_edit_masivo[$sc_seq_vert]['score_'] =  $this->score_; 
             $this->form_vert_form_product_edit_masivo[$sc_seq_vert]['id_product_'] =  $this->id_product_; 
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
          ksort ($this->form_vert_form_product_edit_masivo); 
          $rs->Close(); 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['reg_qtd'] = $sc_seq_vert + $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['reg_start'] - 1;
          if ('total' == $this->form_paginacao)
          {
              $this->NM_ajax_info['navSummary']['reg_ini'] = 1; 
              $this->NM_ajax_info['navSummary']['reg_qtd'] = $this->sc_max_reg; 
              $this->NM_ajax_info['navSummary']['reg_tot'] = $this->sc_max_reg; 
          }
          else
          {
              $this->NM_ajax_info['navSummary']['reg_ini'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['reg_start'] + 1; 
              $this->NM_ajax_info['navSummary']['reg_qtd'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['reg_qtd']; 
              $this->NM_ajax_info['navSummary']['reg_tot'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['total'] + 1; 
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
              $this->Nav_permite_ret = 0 != $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['reg_start'];
              $this->Nav_permite_ava = $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['reg_start'] < (($qt_geral_reg_form_product_edit_masivo + 1) - $this->sc_max_reg);
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['opcao'] = '';
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
          elseif (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['embutida_multi']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['embutida_multi']) 
          { 
          } 
          elseif ($this->Embutida_form) 
          { 
              $this->sc_max_reg_incl = 0; 
          } 
          while ($sc_seq_vert <= $this->sc_max_reg_incl) 
          { 
              $this->product_name_ = "";  
              $this->product_code_ = "";  
              $this->id_status_ = "";  
              $this->dateproduct_ =  date('Y') . "-" . date('m')  . "-" . date('d') . " " . date('H') . ":" . date('i') . ":" . date('s');
              $this->dateproduct__hora =  date('H') . ":" . date('i') . ":" . date('s');
              $this->product_value_ = "";  
              $this->product_cost_ = "";  
              $this->discount_ = "";  
              $this->stock_ = "";  
              $this->id_category_ = "";  
              $this->image_ = "";  
              $this->service_ = "";  
              $this->kiosko_ = "";  
              $this->entrada_ = "";  
              $this->jugador_ = "";  
              $this->visitante_ = "";  
              $this->tarjeta_ = "";  
              $this->minutos_ = "";  
              $this->tokens_ = "";  
              $this->comida_ = "";  
              $this->score_ = "";  
              $this->poriva_ = "";  
              $this->cuentaventa_ = "";  
              $this->unidad_ = "";  
              $this->tipoitem_ = "";  
              $this->cuentacompra_ = "";  
              $this->precioventa_ = "";  
              $this->puntoventa_ = "";  
              $this->nm_proc_onload_record($sc_seq_vert);
              if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['foreign_key']))
              {
                  foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['foreign_key'] as $sFKName => $sFKValue)
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
             $this->form_vert_form_product_edit_masivo[$sc_seq_vert]['product_name_'] =  $this->product_name_; 
             $this->form_vert_form_product_edit_masivo[$sc_seq_vert]['id_category_'] =  $this->id_category_; 
             $this->form_vert_form_product_edit_masivo[$sc_seq_vert]['product_code_'] =  $this->product_code_; 
             $this->form_vert_form_product_edit_masivo[$sc_seq_vert]['dateproduct_'] =  $this->dateproduct_; 
             $this->form_vert_form_product_edit_masivo[$sc_seq_vert]['dateproduct__hora'] =  $this->dateproduct__hora; 
             $this->form_vert_form_product_edit_masivo[$sc_seq_vert]['product_cost_'] =  $this->product_cost_; 
             $this->form_vert_form_product_edit_masivo[$sc_seq_vert]['stock_'] =  $this->stock_; 
             $this->form_vert_form_product_edit_masivo[$sc_seq_vert]['product_value_'] =  $this->product_value_; 
             $this->form_vert_form_product_edit_masivo[$sc_seq_vert]['discount_'] =  $this->discount_; 
             $this->form_vert_form_product_edit_masivo[$sc_seq_vert]['poriva_'] =  $this->poriva_; 
             $this->form_vert_form_product_edit_masivo[$sc_seq_vert]['cuentaventa_'] =  $this->cuentaventa_; 
             $this->form_vert_form_product_edit_masivo[$sc_seq_vert]['unidad_'] =  $this->unidad_; 
             $this->form_vert_form_product_edit_masivo[$sc_seq_vert]['tipoitem_'] =  $this->tipoitem_; 
             $this->form_vert_form_product_edit_masivo[$sc_seq_vert]['cuentacompra_'] =  $this->cuentacompra_; 
             $this->form_vert_form_product_edit_masivo[$sc_seq_vert]['precioventa_'] =  $this->precioventa_; 
             $this->form_vert_form_product_edit_masivo[$sc_seq_vert]['puntoventa_'] =  $this->puntoventa_; 
             $this->form_vert_form_product_edit_masivo[$sc_seq_vert]['id_status_'] =  $this->id_status_; 
             $this->form_vert_form_product_edit_masivo[$sc_seq_vert]['image_'] =  $this->image_; 
             $this->form_vert_form_product_edit_masivo[$sc_seq_vert]['image__limpa'] =  $this->image__limpa; 
             $this->form_vert_form_product_edit_masivo[$sc_seq_vert]['entrada_'] =  $this->entrada_; 
             $this->form_vert_form_product_edit_masivo[$sc_seq_vert]['service_'] =  $this->service_; 
             $this->form_vert_form_product_edit_masivo[$sc_seq_vert]['kiosko_'] =  $this->kiosko_; 
             $this->form_vert_form_product_edit_masivo[$sc_seq_vert]['jugador_'] =  $this->jugador_; 
             $this->form_vert_form_product_edit_masivo[$sc_seq_vert]['visitante_'] =  $this->visitante_; 
             $this->form_vert_form_product_edit_masivo[$sc_seq_vert]['minutos_'] =  $this->minutos_; 
             $this->form_vert_form_product_edit_masivo[$sc_seq_vert]['tarjeta_'] =  $this->tarjeta_; 
             $this->form_vert_form_product_edit_masivo[$sc_seq_vert]['tokens_'] =  $this->tokens_; 
             $this->form_vert_form_product_edit_masivo[$sc_seq_vert]['comida_'] =  $this->comida_; 
             $this->form_vert_form_product_edit_masivo[$sc_seq_vert]['score_'] =  $this->score_; 
             $this->form_vert_form_product_edit_masivo[$sc_seq_vert]['id_product_'] =  $this->id_product_; 
              $sc_seq_vert++; 
          } 
      }  
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
       $this->SC_log_arr['keys']['id_product'] =  $this->id_product_;
   }
// 
   function NM_gera_log_old($sc_seq_vert) 
   {
       if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['dados_select'][$sc_seq_vert] ))
       {
           $nmgp_dados_select = $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['dados_select'][$sc_seq_vert] ;
           $this->SC_log_arr['fields']['product_name']['0'] =  $nmgp_dados_select['product_name_'];
           $this->SC_log_arr['fields']['product_code']['0'] =  $nmgp_dados_select['product_code_'];
           $this->SC_log_arr['fields']['id_status']['0'] =  $nmgp_dados_select['id_status_'];
           $this->SC_log_arr['fields']['dateproduct']['0'] =  $nmgp_dados_select['dateproduct_'];
           $this->SC_log_arr['fields']['product_value']['0'] =  $nmgp_dados_select['product_value_'];
           $this->SC_log_arr['fields']['product_cost']['0'] =  $nmgp_dados_select['product_cost_'];
           $this->SC_log_arr['fields']['discount']['0'] =  $nmgp_dados_select['discount_'];
           $this->SC_log_arr['fields']['stock']['0'] =  $nmgp_dados_select['stock_'];
           $this->SC_log_arr['fields']['id_category']['0'] =  $nmgp_dados_select['id_category_'];
           $this->SC_log_arr['fields']['service']['0'] =  $nmgp_dados_select['service_'];
           $this->SC_log_arr['fields']['kiosko']['0'] =  $nmgp_dados_select['kiosko_'];
           $this->SC_log_arr['fields']['entrada']['0'] =  $nmgp_dados_select['entrada_'];
           $this->SC_log_arr['fields']['jugador']['0'] =  $nmgp_dados_select['jugador_'];
           $this->SC_log_arr['fields']['visitante']['0'] =  $nmgp_dados_select['visitante_'];
           $this->SC_log_arr['fields']['tarjeta']['0'] =  $nmgp_dados_select['tarjeta_'];
           $this->SC_log_arr['fields']['minutos']['0'] =  $nmgp_dados_select['minutos_'];
           $this->SC_log_arr['fields']['tokens']['0'] =  $nmgp_dados_select['tokens_'];
           $this->SC_log_arr['fields']['comida']['0'] =  $nmgp_dados_select['comida_'];
           $this->SC_log_arr['fields']['score']['0'] =  $nmgp_dados_select['score_'];
           $this->SC_log_arr['fields']['poriva']['0'] =  $nmgp_dados_select['poriva_'];
           $this->SC_log_arr['fields']['cuentaventa']['0'] =  $nmgp_dados_select['cuentaventa_'];
           $this->SC_log_arr['fields']['unidad']['0'] =  $nmgp_dados_select['unidad_'];
           $this->SC_log_arr['fields']['tipoitem']['0'] =  $nmgp_dados_select['tipoitem_'];
           $this->SC_log_arr['fields']['cuentacompra']['0'] =  $nmgp_dados_select['cuentacompra_'];
           $this->SC_log_arr['fields']['precioventa']['0'] =  $nmgp_dados_select['precioventa_'];
           $this->SC_log_arr['fields']['puntoventa']['0'] =  $nmgp_dados_select['puntoventa_'];
       }
   }
// 
   function NM_gera_log_new() 
   {
       $this->SC_log_arr['fields']['product_name']['1'] =  $this->product_name_;
       $this->SC_log_arr['fields']['product_code']['1'] =  $this->product_code_;
       $this->SC_log_arr['fields']['id_status']['1'] =  $this->id_status_;
       $this->SC_log_arr['fields']['dateproduct']['1'] =  $this->dateproduct_;
       $this->SC_log_arr['fields']['product_value']['1'] =  $this->product_value_;
       $this->SC_log_arr['fields']['product_cost']['1'] =  $this->product_cost_;
       $this->SC_log_arr['fields']['discount']['1'] =  $this->discount_;
       $this->SC_log_arr['fields']['stock']['1'] =  $this->stock_;
       $this->SC_log_arr['fields']['id_category']['1'] =  $this->id_category_;
       $this->SC_log_arr['fields']['service']['1'] =  $this->service_;
       $this->SC_log_arr['fields']['kiosko']['1'] =  $this->kiosko_;
       $this->SC_log_arr['fields']['entrada']['1'] =  $this->entrada_;
       $this->SC_log_arr['fields']['jugador']['1'] =  $this->jugador_;
       $this->SC_log_arr['fields']['visitante']['1'] =  $this->visitante_;
       $this->SC_log_arr['fields']['tarjeta']['1'] =  $this->tarjeta_;
       $this->SC_log_arr['fields']['minutos']['1'] =  $this->minutos_;
       $this->SC_log_arr['fields']['tokens']['1'] =  $this->tokens_;
       $this->SC_log_arr['fields']['comida']['1'] =  $this->comida_;
       $this->SC_log_arr['fields']['score']['1'] =  $this->score_;
       $this->SC_log_arr['fields']['poriva']['1'] =  $this->poriva_;
       $this->SC_log_arr['fields']['cuentaventa']['1'] =  $this->cuentaventa_;
       $this->SC_log_arr['fields']['unidad']['1'] =  $this->unidad_;
       $this->SC_log_arr['fields']['tipoitem']['1'] =  $this->tipoitem_;
       $this->SC_log_arr['fields']['cuentacompra']['1'] =  $this->cuentacompra_;
       $this->SC_log_arr['fields']['precioventa']['1'] =  $this->precioventa_;
       $this->SC_log_arr['fields']['puntoventa']['1'] =  $this->puntoventa_;
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
       $Log_labels['service'] =  "Service";
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
       $Log_labels['precioventa'] =  "Precioventa";
       $Log_labels['puntoventa'] =  "Puntoventa";
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
       $Reg_Page   = $this->sc_max_reg;
       $Max_link   = 5;
       $Mid_link   = ceil($Max_link / 2);
       $Corr_link  = (($Max_link % 2) == 0) ? 0 : 1;
       $rec_tot    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['total'] + 1;
       $rec_fim    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['reg_start'] + $this->sc_max_reg;
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
                $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['record_state'] = array();
        }

        function storeRecordState($sc_seq_vert = 0) {
                if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['record_state'])) {
                        $this->initializeRecordState();
                }
                if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['record_state'][$sc_seq_vert])) {
                        $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['record_state'][$sc_seq_vert] = array();
                }

                $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['record_state'][$sc_seq_vert]['buttons'] = array(
                        'delete' => $this->nmgp_botoes['delete'],
                        'update' => $this->nmgp_botoes['update']
                );
        }

        function loadRecordState($sc_seq_vert = 0) {
                if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['record_state']) || !isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['record_state'][$sc_seq_vert])) {
                        return;
                }

                if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['record_state'][$sc_seq_vert]['buttons']['delete'])) {
                        $this->nmgp_botoes['delete'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['record_state'][$sc_seq_vert]['buttons']['delete'];
                }
                if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['record_state'][$sc_seq_vert]['buttons']['update'])) {
                        $this->nmgp_botoes['update'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['record_state'][$sc_seq_vert]['buttons']['update'];
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
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['botoes'] = $this->nmgp_botoes;
     if ($this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form")
     {
         $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['opc_ant'] = $this->nmgp_opcao;
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
     if (($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['run_iframe'] == "R") && $this->nm_flag_iframe && empty($this->nm_todas_criticas))
     {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['run_iframe_ajax']))
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['retorno_edit'] = array("edit", "");
          }
          else
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['retorno_edit'] .= "&nmgp_opcao=edit";
          }
          if ($this->sc_evento == "insert" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['run_iframe'] == "F")
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['run_iframe_ajax']))
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['retorno_edit'] = array("edit", "fim");
              }
              else
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['retorno_edit'] .= "&rec=fim";
              }
          }
          $this->NM_close_db(); 
          $sJsParent = '';
          if ($this->NM_ajax_flag && isset($this->NM_ajax_info['param']['buffer_output']) && $this->NM_ajax_info['param']['buffer_output'])
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['run_iframe_ajax']))
              {
                  $this->NM_ajax_info['ajaxJavascript'][] = array("parent.ajax_navigate", $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['retorno_edit']);
              }
              else
              {
                  $sJsParent .= 'parent';
                  $this->NM_ajax_info['redir']['metodo'] = 'location';
                  $this->NM_ajax_info['redir']['action'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['retorno_edit'];
                  $this->NM_ajax_info['redir']['target'] = $sJsParent;
              }
              form_product_edit_masivo_pack_ajax_response();
              exit;
          }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">

         <html><body>
         <script type="text/javascript">
<?php
    
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['run_iframe_ajax']))
    {
        $opc = ($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['run_iframe'] == "F" && $this->sc_evento == "insert") ? "fim" : "";
        echo "parent.ajax_navigate('edit', '" .$opc . "');";
    }
    else
    {
        echo $sJsParent . "parent.location = '" . $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['retorno_edit'] . "';";
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
        $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['table_refresh'] = true;
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
        if ('SC_all_Cmp' == $this->nmgp_fast_search && in_array($field, array("id_product_", "product_name_", "product_code_", "id_status_", "product_value_", "product_cost_", "stock_", "id_category_"))) {
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
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['table_refresh']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['table_refresh'])
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

   function Form_lookup_id_category_()
   {
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['Lookup_id_category_']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['Lookup_id_category_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['Lookup_id_category_']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['Lookup_id_category_'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['Lookup_id_category_']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['Lookup_id_category_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['Lookup_id_category_']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['Lookup_id_category_'] = array(); 
    }

   $old_value_dateproduct_ = $this->dateproduct_;
   $old_value_dateproduct__hora = $this->dateproduct__hora;
   $old_value_product_cost_ = $this->product_cost_;
   $old_value_stock_ = $this->stock_;
   $old_value_product_value_ = $this->product_value_;
   $old_value_discount_ = $this->discount_;
   $old_value_poriva_ = $this->poriva_;
   $old_value_precioventa_ = $this->precioventa_;
   $old_value_minutos_ = $this->minutos_;
   $old_value_tokens_ = $this->tokens_;
   $old_value_score_ = $this->score_;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_dateproduct_ = $this->dateproduct_;
   $unformatted_value_dateproduct__hora = $this->dateproduct__hora;
   $unformatted_value_product_cost_ = $this->product_cost_;
   $unformatted_value_stock_ = $this->stock_;
   $unformatted_value_product_value_ = $this->product_value_;
   $unformatted_value_discount_ = $this->discount_;
   $unformatted_value_poriva_ = $this->poriva_;
   $unformatted_value_precioventa_ = $this->precioventa_;
   $unformatted_value_minutos_ = $this->minutos_;
   $unformatted_value_tokens_ = $this->tokens_;
   $unformatted_value_score_ = $this->score_;

   $nm_comando = "SELECT id_category, category  FROM category  ORDER BY category";

   $this->dateproduct_ = $old_value_dateproduct_;
   $this->dateproduct__hora = $old_value_dateproduct__hora;
   $this->product_cost_ = $old_value_product_cost_;
   $this->stock_ = $old_value_stock_;
   $this->product_value_ = $old_value_product_value_;
   $this->discount_ = $old_value_discount_;
   $this->poriva_ = $old_value_poriva_;
   $this->precioventa_ = $old_value_precioventa_;
   $this->minutos_ = $old_value_minutos_;
   $this->tokens_ = $old_value_tokens_;
   $this->score_ = $old_value_score_;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['Lookup_id_category_'][] = $rs->fields[0];
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
   function Form_lookup_puntoventa_()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "SI?#?1?#?S?@?";
       $nmgp_def_dados .= "NO?#?0?#??@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_id_status_()
   {
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['Lookup_id_status_']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['Lookup_id_status_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['Lookup_id_status_']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['Lookup_id_status_'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['Lookup_id_status_']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['Lookup_id_status_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['Lookup_id_status_']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['Lookup_id_status_'] = array(); 
    }

   $old_value_dateproduct_ = $this->dateproduct_;
   $old_value_dateproduct__hora = $this->dateproduct__hora;
   $old_value_product_cost_ = $this->product_cost_;
   $old_value_stock_ = $this->stock_;
   $old_value_product_value_ = $this->product_value_;
   $old_value_discount_ = $this->discount_;
   $old_value_poriva_ = $this->poriva_;
   $old_value_precioventa_ = $this->precioventa_;
   $old_value_minutos_ = $this->minutos_;
   $old_value_tokens_ = $this->tokens_;
   $old_value_score_ = $this->score_;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_dateproduct_ = $this->dateproduct_;
   $unformatted_value_dateproduct__hora = $this->dateproduct__hora;
   $unformatted_value_product_cost_ = $this->product_cost_;
   $unformatted_value_stock_ = $this->stock_;
   $unformatted_value_product_value_ = $this->product_value_;
   $unformatted_value_discount_ = $this->discount_;
   $unformatted_value_poriva_ = $this->poriva_;
   $unformatted_value_precioventa_ = $this->precioventa_;
   $unformatted_value_minutos_ = $this->minutos_;
   $unformatted_value_tokens_ = $this->tokens_;
   $unformatted_value_score_ = $this->score_;

   $nm_comando = "SELECT id_status, status  FROM status  ORDER BY status";

   $this->dateproduct_ = $old_value_dateproduct_;
   $this->dateproduct__hora = $old_value_dateproduct__hora;
   $this->product_cost_ = $old_value_product_cost_;
   $this->stock_ = $old_value_stock_;
   $this->product_value_ = $old_value_product_value_;
   $this->discount_ = $old_value_discount_;
   $this->poriva_ = $old_value_poriva_;
   $this->precioventa_ = $old_value_precioventa_;
   $this->minutos_ = $old_value_minutos_;
   $this->tokens_ = $old_value_tokens_;
   $this->score_ = $old_value_score_;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['Lookup_id_status_'][] = $rs->fields[0];
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
   function Form_lookup_entrada_()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "SI?#?1?#??@?";
       $nmgp_def_dados .= "NO?#?0?#??@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_service_()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "SI?#?1?#??@?";
       $nmgp_def_dados .= "NO?#?0?#?S?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_kiosko_()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "SI?#?1?#??@?";
       $nmgp_def_dados .= "NO?#?0?#??@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_jugador_()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "SI?#?1?#??@?";
       $nmgp_def_dados .= "NO?#?0?#?S?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_visitante_()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "SI?#?1?#??@?";
       $nmgp_def_dados .= "NO?#?0?#??@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_tarjeta_()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "SI?#?1?#??@?";
       $nmgp_def_dados .= "NO?#?0?#??@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_comida_()
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
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['where_filter']);
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['total']);
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['fast_search']);
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['where_detal']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['where_detal'])) 
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['where_filter'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['where_detal'];
          }
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['empty_filter']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['empty_filter'])
          {
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['empty_filter']);
              $this->NM_ajax_info['empty_filter'] = 'ok';
              form_product_edit_masivo_pack_ajax_response();
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
              $data_lookup = $this->SC_lookup_id_status_($arg_search, $data_search);
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
              $data_lookup = $this->SC_lookup_id_category_($arg_search, $data_search);
              if (is_array($data_lookup) && !empty($data_lookup)) 
              {
                  $this->SC_monta_condicao($comando, "id_category", $arg_search, $data_lookup);
              }
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['where_detal']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['where_detal']) && !empty($comando)) 
      {
          $comando = $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['where_detal'] . " and (" .  $comando . ")";
      }
      if (empty($comando)) 
      {
          $comando = " 1 <> 1 "; 
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['where_filter_form']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['where_filter_form'])
      {
          $sc_where = " where " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['where_filter_form'] . " and (" . $comando . ")";
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
      $qt_geral_reg_form_product_edit_masivo = isset($rt->fields[0]) ? $rt->fields[0] - 1 : 0; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['total'] = $qt_geral_reg_form_product_edit_masivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['where_filter'] = $comando;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['fast_search'][0] = $field;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['fast_search'][1] = $arg_search;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['fast_search'][2] = $sv_data;
      $rt->Close(); 
      if (isset($rt->fields[0]) && $rt->fields[0] > 0 &&  isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['empty_filter']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['empty_filter'])
      {
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['empty_filter']);
          $this->NM_ajax_info['empty_filter'] = 'ok';
          form_product_edit_masivo_pack_ajax_response();
          exit;
      }
      elseif (!isset($rt->fields[0]) || $rt->fields[0] == 0)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['empty_filter'] = true;
          $this->NM_ajax_info['empty_filter'] = 'ok';
          form_product_edit_masivo_pack_ajax_response();
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
      $nm_numeric[] = "id_product";$nm_numeric[] = "id_status";$nm_numeric[] = "product_value";$nm_numeric[] = "product_cost";$nm_numeric[] = "discount";$nm_numeric[] = "stock";$nm_numeric[] = "id_category";$nm_numeric[] = "service";$nm_numeric[] = "kiosko";$nm_numeric[] = "entrada";$nm_numeric[] = "jugador";$nm_numeric[] = "visitante";$nm_numeric[] = "tarjeta";$nm_numeric[] = "minutos";$nm_numeric[] = "tokens";$nm_numeric[] = "comida";$nm_numeric[] = "score";$nm_numeric[] = "poriva";$nm_numeric[] = "precioventa";$nm_numeric[] = "puntoventa";
      if (in_array($campo_join, $nm_numeric))
      {
         if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['decimal_db'] == ".")
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
      $Nm_datas["dateproduct"] = "datetime";
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
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['SC_sep_date']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['SC_sep_date']))
              {
                  $nm_aspas  = $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['SC_sep_date'];
                  $nm_aspas1 = $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['SC_sep_date1'];
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
   function SC_lookup_id_status_($condicao, $campo)
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
   function SC_lookup_id_category_($condicao, $campo)
   {
       $result = array();
       $campo_orig = $campo;
       $campo  = substr($this->Db->qstr($campo), 1, -1);
       $nm_comando = "SELECT category, id_category FROM category WHERE (category LIKE '%$campo%')" ; 
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
       $nmgp_saida_form = "form_product_edit_masivo_fim.php";
   }
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['redir']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['redir'] == 'redir')
   {
       unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']);
   }
   unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['opc_ant']);
   if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['nm_run_menu']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['nm_run_menu'] == 1)
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['nm_run_menu'] = 2;
       $nmgp_saida_form = "form_product_edit_masivo_fim.php";
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
       form_product_edit_masivo_pack_ajax_response();
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
   if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['sc_modal'])
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
if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['masterValue']))
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['dashboard_info']['under_dashboard']) {
?>
var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['dashboard_info']['parent_widget']; ?>']");
if (dbParentFrame && dbParentFrame[0] && dbParentFrame[0].contentWindow.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['masterValue'] as $cmp_master => $val_master)
        {
?>
    dbParentFrame[0].contentWindow.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['masterValue']);
?>
}
<?php
    }
    else {
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['masterValue'] as $cmp_master => $val_master)
        {
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['masterValue']);
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
                return array("sc_b_new_t.sc-unique-btn-1", "sc_b_new_t.sc-unique-btn-2");
                break;
            case "insert":
                return array("sc_b_ins_t.sc-unique-btn-3");
                break;
            case "bcancelar":
                return array("sc_b_sai_t.sc-unique-btn-4");
                break;
            case "balterarsel":
                return array("sc_b_upd_t.sc-unique-btn-5");
                break;
            case "help":
                return array("sc_b_hlp_t");
                break;
            case "exit":
                return array("sc_b_sai_t.sc-unique-btn-6", "sc_b_sai_t.sc-unique-btn-7", "sc_b_sai_t.sc-unique-btn-9", "sc_b_sai_t.sc-unique-btn-8", "sc_b_sai_t.sc-unique-btn-10");
                break;
            case "birpara":
                return array("brec_b");
                break;
            case "first":
                return array("sc_b_ini_b.sc-unique-btn-11");
                break;
            case "back":
                return array("sc_b_ret_b.sc-unique-btn-12");
                break;
            case "forward":
                return array("sc_b_avc_b.sc-unique-btn-13");
                break;
            case "last":
                return array("sc_b_fim_b.sc-unique-btn-14");
                break;
        }

        return array($buttonName);
    } // getButtonIds

    function displayAppHeader()
    {
        if ($this->Embutida_call) {
            return;
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['mostra_cab']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['mostra_cab'] == "N") {
            return;
        }
        if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['dashboard_info']['under_dashboard'] && $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['dashboard_info']['compact_mode'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['dashboard_info']['maximized']) {
            return;
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['link_info']['compact_mode']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['link_info']['compact_mode']) {
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
        if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['run_iframe'] != "R") {
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
        if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['ordem_cmp'] == $fieldName) {
            $orderColName = $fieldName;
            if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['ordem_ord'] == " desc") {
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
            case "product_value":
                return true;
            case "discount":
                return true;
            case "poriva":
                return true;
            case "precioventa":
                return true;
            case "minutos":
                return true;
            case "tokens":
                return true;
            case "score":
                return true;
            case "id_product":
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
            case "product_value":
                return 'desc';
            case "discount":
                return 'desc';
            case "poriva":
                return 'desc';
            case "precioventa":
                return 'desc';
            case "puntoventa":
                return 'desc';
            case "id_status":
                return 'desc';
            case "entrada":
                return 'desc';
            case "service":
                return 'desc';
            case "kiosko":
                return 'desc';
            case "jugador":
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
            default:
                return 'asc';
        }
        return 'asc';
    }
}
?>
