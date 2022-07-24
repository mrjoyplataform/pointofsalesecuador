<?php
//
class form_maecom_apl
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
   var $tipodocto31;
   var $nofact31;
   var $nocte31;
   var $nomcte31;
   var $localid31;
   var $cvectenegro31;
   var $vtabta31;
   var $descto31;
   var $flete31;
   var $itm31;
   var $novend31;
   var $fecfact31;
   var $fecfact31_hora;
   var $condpag31;
   var $nopagos31;
   var $formapago31;
   var $obra31;
   var $orden31;
   var $cvnegra31;
   var $status31;
   var $cvimpto31;
   var $cvanulado31;
   var $efectivo31;
   var $cheque31;
   var $tarjeta31;
   var $acuenta31;
   var $nobanco31;
   var $nombanco31;
   var $nocheque31;
   var $notarjeta31;
   var $nomtarjeta31;
   var $cvdivisa31;
   var $valdivisa31;
   var $lineaprod31;
   var $intereses31;
   var $nopedido31;
   var $fecped31;
   var $fecped31_hora;
   var $ruc31;
   var $tel31;
   var $transpor31;
   var $cvtransfer31;
   var $fectrasfer31;
   var $desctofp31;
   var $catcte31;
   var $uid;
   var $recargos31;
   var $ice31;
   var $fecdocpr31;
   var $fecdocpr31_hora;
   var $tipocomp31;
   var $conta31;
   var $fecvencidocpr;
   var $fecvencidocpr_hora;
   var $totsiniva31;
   var $fecemb;
   var $norefrendo;
   var $baseice;
   var $ncodret43;
   var $nbaseret43;
   var $npctjeret43;
   var $contrato;
   var $compra_general;
   var $distribucion_rubros;
   var $dstoley;
   var $remgas31;
   var $estado_electronico;
   var $coddest31;
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
          if (isset($this->NM_ajax_info['param']['acuenta31']))
          {
              $this->acuenta31 = $this->NM_ajax_info['param']['acuenta31'];
          }
          if (isset($this->NM_ajax_info['param']['baseice']))
          {
              $this->baseice = $this->NM_ajax_info['param']['baseice'];
          }
          if (isset($this->NM_ajax_info['param']['catcte31']))
          {
              $this->catcte31 = $this->NM_ajax_info['param']['catcte31'];
          }
          if (isset($this->NM_ajax_info['param']['cheque31']))
          {
              $this->cheque31 = $this->NM_ajax_info['param']['cheque31'];
          }
          if (isset($this->NM_ajax_info['param']['coddest31']))
          {
              $this->coddest31 = $this->NM_ajax_info['param']['coddest31'];
          }
          if (isset($this->NM_ajax_info['param']['compra_general']))
          {
              $this->compra_general = $this->NM_ajax_info['param']['compra_general'];
          }
          if (isset($this->NM_ajax_info['param']['condpag31']))
          {
              $this->condpag31 = $this->NM_ajax_info['param']['condpag31'];
          }
          if (isset($this->NM_ajax_info['param']['conta31']))
          {
              $this->conta31 = $this->NM_ajax_info['param']['conta31'];
          }
          if (isset($this->NM_ajax_info['param']['contrato']))
          {
              $this->contrato = $this->NM_ajax_info['param']['contrato'];
          }
          if (isset($this->NM_ajax_info['param']['csrf_token']))
          {
              $this->csrf_token = $this->NM_ajax_info['param']['csrf_token'];
          }
          if (isset($this->NM_ajax_info['param']['cvanulado31']))
          {
              $this->cvanulado31 = $this->NM_ajax_info['param']['cvanulado31'];
          }
          if (isset($this->NM_ajax_info['param']['cvdivisa31']))
          {
              $this->cvdivisa31 = $this->NM_ajax_info['param']['cvdivisa31'];
          }
          if (isset($this->NM_ajax_info['param']['cvectenegro31']))
          {
              $this->cvectenegro31 = $this->NM_ajax_info['param']['cvectenegro31'];
          }
          if (isset($this->NM_ajax_info['param']['cvimpto31']))
          {
              $this->cvimpto31 = $this->NM_ajax_info['param']['cvimpto31'];
          }
          if (isset($this->NM_ajax_info['param']['cvnegra31']))
          {
              $this->cvnegra31 = $this->NM_ajax_info['param']['cvnegra31'];
          }
          if (isset($this->NM_ajax_info['param']['cvtransfer31']))
          {
              $this->cvtransfer31 = $this->NM_ajax_info['param']['cvtransfer31'];
          }
          if (isset($this->NM_ajax_info['param']['descto31']))
          {
              $this->descto31 = $this->NM_ajax_info['param']['descto31'];
          }
          if (isset($this->NM_ajax_info['param']['desctofp31']))
          {
              $this->desctofp31 = $this->NM_ajax_info['param']['desctofp31'];
          }
          if (isset($this->NM_ajax_info['param']['distribucion_rubros']))
          {
              $this->distribucion_rubros = $this->NM_ajax_info['param']['distribucion_rubros'];
          }
          if (isset($this->NM_ajax_info['param']['dstoley']))
          {
              $this->dstoley = $this->NM_ajax_info['param']['dstoley'];
          }
          if (isset($this->NM_ajax_info['param']['efectivo31']))
          {
              $this->efectivo31 = $this->NM_ajax_info['param']['efectivo31'];
          }
          if (isset($this->NM_ajax_info['param']['estado_electronico']))
          {
              $this->estado_electronico = $this->NM_ajax_info['param']['estado_electronico'];
          }
          if (isset($this->NM_ajax_info['param']['fecdocpr31']))
          {
              $this->fecdocpr31 = $this->NM_ajax_info['param']['fecdocpr31'];
          }
          if (isset($this->NM_ajax_info['param']['fecemb']))
          {
              $this->fecemb = $this->NM_ajax_info['param']['fecemb'];
          }
          if (isset($this->NM_ajax_info['param']['fecfact31']))
          {
              $this->fecfact31 = $this->NM_ajax_info['param']['fecfact31'];
          }
          if (isset($this->NM_ajax_info['param']['fecped31']))
          {
              $this->fecped31 = $this->NM_ajax_info['param']['fecped31'];
          }
          if (isset($this->NM_ajax_info['param']['fectrasfer31']))
          {
              $this->fectrasfer31 = $this->NM_ajax_info['param']['fectrasfer31'];
          }
          if (isset($this->NM_ajax_info['param']['fecvencidocpr']))
          {
              $this->fecvencidocpr = $this->NM_ajax_info['param']['fecvencidocpr'];
          }
          if (isset($this->NM_ajax_info['param']['flete31']))
          {
              $this->flete31 = $this->NM_ajax_info['param']['flete31'];
          }
          if (isset($this->NM_ajax_info['param']['formapago31']))
          {
              $this->formapago31 = $this->NM_ajax_info['param']['formapago31'];
          }
          if (isset($this->NM_ajax_info['param']['ice31']))
          {
              $this->ice31 = $this->NM_ajax_info['param']['ice31'];
          }
          if (isset($this->NM_ajax_info['param']['intereses31']))
          {
              $this->intereses31 = $this->NM_ajax_info['param']['intereses31'];
          }
          if (isset($this->NM_ajax_info['param']['itm31']))
          {
              $this->itm31 = $this->NM_ajax_info['param']['itm31'];
          }
          if (isset($this->NM_ajax_info['param']['lineaprod31']))
          {
              $this->lineaprod31 = $this->NM_ajax_info['param']['lineaprod31'];
          }
          if (isset($this->NM_ajax_info['param']['localid31']))
          {
              $this->localid31 = $this->NM_ajax_info['param']['localid31'];
          }
          if (isset($this->NM_ajax_info['param']['nbaseret43']))
          {
              $this->nbaseret43 = $this->NM_ajax_info['param']['nbaseret43'];
          }
          if (isset($this->NM_ajax_info['param']['ncodret43']))
          {
              $this->ncodret43 = $this->NM_ajax_info['param']['ncodret43'];
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
          if (isset($this->NM_ajax_info['param']['nobanco31']))
          {
              $this->nobanco31 = $this->NM_ajax_info['param']['nobanco31'];
          }
          if (isset($this->NM_ajax_info['param']['nocheque31']))
          {
              $this->nocheque31 = $this->NM_ajax_info['param']['nocheque31'];
          }
          if (isset($this->NM_ajax_info['param']['nocte31']))
          {
              $this->nocte31 = $this->NM_ajax_info['param']['nocte31'];
          }
          if (isset($this->NM_ajax_info['param']['nofact31']))
          {
              $this->nofact31 = $this->NM_ajax_info['param']['nofact31'];
          }
          if (isset($this->NM_ajax_info['param']['nombanco31']))
          {
              $this->nombanco31 = $this->NM_ajax_info['param']['nombanco31'];
          }
          if (isset($this->NM_ajax_info['param']['nomcte31']))
          {
              $this->nomcte31 = $this->NM_ajax_info['param']['nomcte31'];
          }
          if (isset($this->NM_ajax_info['param']['nomtarjeta31']))
          {
              $this->nomtarjeta31 = $this->NM_ajax_info['param']['nomtarjeta31'];
          }
          if (isset($this->NM_ajax_info['param']['nopagos31']))
          {
              $this->nopagos31 = $this->NM_ajax_info['param']['nopagos31'];
          }
          if (isset($this->NM_ajax_info['param']['nopedido31']))
          {
              $this->nopedido31 = $this->NM_ajax_info['param']['nopedido31'];
          }
          if (isset($this->NM_ajax_info['param']['norefrendo']))
          {
              $this->norefrendo = $this->NM_ajax_info['param']['norefrendo'];
          }
          if (isset($this->NM_ajax_info['param']['notarjeta31']))
          {
              $this->notarjeta31 = $this->NM_ajax_info['param']['notarjeta31'];
          }
          if (isset($this->NM_ajax_info['param']['novend31']))
          {
              $this->novend31 = $this->NM_ajax_info['param']['novend31'];
          }
          if (isset($this->NM_ajax_info['param']['npctjeret43']))
          {
              $this->npctjeret43 = $this->NM_ajax_info['param']['npctjeret43'];
          }
          if (isset($this->NM_ajax_info['param']['obra31']))
          {
              $this->obra31 = $this->NM_ajax_info['param']['obra31'];
          }
          if (isset($this->NM_ajax_info['param']['orden31']))
          {
              $this->orden31 = $this->NM_ajax_info['param']['orden31'];
          }
          if (isset($this->NM_ajax_info['param']['recargos31']))
          {
              $this->recargos31 = $this->NM_ajax_info['param']['recargos31'];
          }
          if (isset($this->NM_ajax_info['param']['remgas31']))
          {
              $this->remgas31 = $this->NM_ajax_info['param']['remgas31'];
          }
          if (isset($this->NM_ajax_info['param']['ruc31']))
          {
              $this->ruc31 = $this->NM_ajax_info['param']['ruc31'];
          }
          if (isset($this->NM_ajax_info['param']['script_case_init']))
          {
              $this->script_case_init = $this->NM_ajax_info['param']['script_case_init'];
          }
          if (isset($this->NM_ajax_info['param']['status31']))
          {
              $this->status31 = $this->NM_ajax_info['param']['status31'];
          }
          if (isset($this->NM_ajax_info['param']['tarjeta31']))
          {
              $this->tarjeta31 = $this->NM_ajax_info['param']['tarjeta31'];
          }
          if (isset($this->NM_ajax_info['param']['tel31']))
          {
              $this->tel31 = $this->NM_ajax_info['param']['tel31'];
          }
          if (isset($this->NM_ajax_info['param']['tipocomp31']))
          {
              $this->tipocomp31 = $this->NM_ajax_info['param']['tipocomp31'];
          }
          if (isset($this->NM_ajax_info['param']['tipodocto31']))
          {
              $this->tipodocto31 = $this->NM_ajax_info['param']['tipodocto31'];
          }
          if (isset($this->NM_ajax_info['param']['totsiniva31']))
          {
              $this->totsiniva31 = $this->NM_ajax_info['param']['totsiniva31'];
          }
          if (isset($this->NM_ajax_info['param']['transpor31']))
          {
              $this->transpor31 = $this->NM_ajax_info['param']['transpor31'];
          }
          if (isset($this->NM_ajax_info['param']['uid']))
          {
              $this->uid = $this->NM_ajax_info['param']['uid'];
          }
          if (isset($this->NM_ajax_info['param']['valdivisa31']))
          {
              $this->valdivisa31 = $this->NM_ajax_info['param']['valdivisa31'];
          }
          if (isset($this->NM_ajax_info['param']['vtabta31']))
          {
              $this->vtabta31 = $this->NM_ajax_info['param']['vtabta31'];
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
          $_SESSION['sc_session'][$script_case_init]['form_maecom']['opcao']   = "novo";
          $_SESSION['sc_session'][$script_case_init]['form_maecom']['opc_ant'] = "inicio";
      }
      if (isset($_SESSION['sc_session'][$script_case_init]['form_maecom']['embutida_parms']))
      { 
          $this->nmgp_parms = $_SESSION['sc_session'][$script_case_init]['form_maecom']['embutida_parms'];
          unset($_SESSION['sc_session'][$script_case_init]['form_maecom']['embutida_parms']);
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
                 nm_limpa_str_form_maecom($cadapar[1]);
                 if ($cadapar[1] == "@ ") {$cadapar[1] = trim($cadapar[1]); }
                 $Tmp_par = $cadapar[0];
                 $this->$Tmp_par = $cadapar[1];
             }
             $ix++;
          }
          if (isset($this->NM_where_filter_form))
          {
              $_SESSION['sc_session'][$script_case_init]['form_maecom']['where_filter_form'] = $this->NM_where_filter_form;
              unset($_SESSION['sc_session'][$script_case_init]['form_maecom']['total']);
          }
          if (isset($this->sc_redir_atualiz))
          {
              $_SESSION['sc_session'][$script_case_init]['form_maecom']['sc_redir_atualiz'] = $this->sc_redir_atualiz;
          }
          if (isset($this->sc_redir_insert))
          {
              $_SESSION['sc_session'][$script_case_init]['form_maecom']['sc_redir_insert'] = $this->sc_redir_insert;
          }
      } 
      elseif (isset($script_case_init) && !empty($script_case_init) && isset($_SESSION['sc_session'][$script_case_init]['form_maecom']['parms']))
      {
          if ((!isset($this->nmgp_opcao) || ($this->nmgp_opcao != "incluir" && $this->nmgp_opcao != "alterar" && $this->nmgp_opcao != "excluir" && $this->nmgp_opcao != "novo" && $this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form")) && (!isset($this->NM_ajax_opcao) || $this->NM_ajax_opcao == ""))
          {
              $todox = str_replace("?#?@?@?", "?#?@ ?@?", $_SESSION['sc_session'][$script_case_init]['form_maecom']['parms']);
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
          $_SESSION['sc_session'][$script_case_init]['form_maecom']['nm_run_menu'] = 1;
      } 
      if (($this->NM_ajax_flag && 'navigate_form' == $this->NM_ajax_opcao) || (isset($this->nmgp_opcao) && $this->nmgp_opcao == "igual"))
      { }
      else
      {
          $aDtParts = explode(' ', $this->fecfact31);
          $this->fecfact31      = $aDtParts[0];
          $this->fecfact31_hora = $aDtParts[1];
      }
      if (($this->NM_ajax_flag && 'navigate_form' == $this->NM_ajax_opcao) || (isset($this->nmgp_opcao) && $this->nmgp_opcao == "igual"))
      { }
      else
      {
          $aDtParts = explode(' ', $this->fecped31);
          $this->fecped31      = $aDtParts[0];
          $this->fecped31_hora = $aDtParts[1];
      }
      if (($this->NM_ajax_flag && 'navigate_form' == $this->NM_ajax_opcao) || (isset($this->nmgp_opcao) && $this->nmgp_opcao == "igual"))
      { }
      else
      {
          $aDtParts = explode(' ', $this->fecdocpr31);
          $this->fecdocpr31      = $aDtParts[0];
          $this->fecdocpr31_hora = $aDtParts[1];
      }
      if (($this->NM_ajax_flag && 'navigate_form' == $this->NM_ajax_opcao) || (isset($this->nmgp_opcao) && $this->nmgp_opcao == "igual"))
      { }
      else
      {
          $aDtParts = explode(' ', $this->fecvencidocpr);
          $this->fecvencidocpr      = $aDtParts[0];
          $this->fecvencidocpr_hora = $aDtParts[1];
      }
      if (!$this->NM_ajax_flag && 'autocomp_' == substr($this->NM_ajax_opcao, 0, 9))
      {
          $this->NM_ajax_flag = true;
      }

      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      if (isset($this->nm_evt_ret_edit) && '' != $this->nm_evt_ret_edit)
      {
          $_SESSION['sc_session'][$script_case_init]['form_maecom']['lig_edit_lookup']     = true;
          $_SESSION['sc_session'][$script_case_init]['form_maecom']['lig_edit_lookup_cb']  = $this->nm_evt_ret_edit;
          $_SESSION['sc_session'][$script_case_init]['form_maecom']['lig_edit_lookup_row'] = isset($this->nm_evt_ret_row) ? $this->nm_evt_ret_row : '';
      }
      if (isset($_SESSION['sc_session'][$script_case_init]['form_maecom']['lig_edit_lookup']) && $_SESSION['sc_session'][$script_case_init]['form_maecom']['lig_edit_lookup'])
      {
          $this->lig_edit_lookup     = true;
          $this->lig_edit_lookup_cb  = $_SESSION['sc_session'][$script_case_init]['form_maecom']['lig_edit_lookup_cb'];
          $this->lig_edit_lookup_row = $_SESSION['sc_session'][$script_case_init]['form_maecom']['lig_edit_lookup_row'];
      }
      if (!$this->Ini)
      { 
          $this->Ini = new form_maecom_ini(); 
          $this->Ini->init();
          $this->nm_data = new nm_data("es");
          $this->app_is_initializing = $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['initialize'];
      } 
      else 
      { 
         $this->nm_data = new nm_data("es");
      } 
      $_SESSION['sc_session'][$script_case_init]['form_maecom']['upload_field_info'] = array();

      unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['masterValue']);
      $this->Change_Menu = false;
      $run_iframe = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['run_iframe']) && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['run_iframe'] == "R")) ? true : false;
      if (!$run_iframe && isset($_SESSION['scriptcase']['menu_atual']) && !$_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['embutida_call'] && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['sc_outra_jan']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['sc_outra_jan']))
      {
          $this->sc_init_menu = "x";
          if (isset($_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init']['form_maecom']))
          {
              $this->sc_init_menu = $_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init']['form_maecom'];
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
          if ($this->Ini->sc_page == $this->sc_init_menu && !isset($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['form_maecom']))
          {
               $_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['form_maecom']['link'] = $this->Ini->sc_protocolo . $this->Ini->server . $this->Ini->path_link . "" . SC_dir_app_name('form_maecom') . "/";
               $_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['form_maecom']['label'] = "" . $this->Ini->Nm_lang['lang_othr_frmu_title'] . " maecom";
               $this->Change_Menu = true;
          }
          elseif ($this->Ini->sc_page == $this->sc_init_menu)
          {
              $achou = false;
              foreach ($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu] as $apl => $parms)
              {
                  if ($apl == "form_maecom")
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



      $_SESSION['scriptcase']['error_icon']['form_maecom']  = "<img src=\"" . $this->Ini->path_icones . "/scriptcase__NM__btn__NM__scriptcase9_Rhino__NM__nm_scriptcase9_Rhino_error.png\" style=\"border-width: 0px\" align=\"top\">&nbsp;";
      $_SESSION['scriptcase']['error_close']['form_maecom'] = "<td>" . nmButtonOutput($this->arr_buttons, "berrm_clse", "document.getElementById('id_error_display_fixed').style.display = 'none'; document.getElementById('id_error_message_fixed').innerHTML = ''; return false", "document.getElementById('id_error_display_fixed').style.display = 'none'; document.getElementById('id_error_message_fixed').innerHTML = ''; return false", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "") . "</td>";

      $this->Embutida_proc = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['embutida_proc']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['embutida_proc'] : $this->Embutida_proc;
      $this->Embutida_form = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['embutida_form']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['embutida_form'] : $this->Embutida_form;
      $this->Embutida_call = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['embutida_call']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['embutida_call'] : $this->Embutida_call;

       $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['table_refresh'] = false;

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['embutida_liga_grid_edit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['embutida_liga_grid_edit'])
      {
          $this->Grid_editavel = ('on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['embutida_liga_grid_edit']) ? true : false;
      }
      if (isset($this->Grid_editavel) && $this->Grid_editavel)
      {
          $this->Embutida_form  = true;
          $this->Embutida_ronly = true;
      }
      $this->Embutida_multi = false;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['embutida_multi']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['embutida_multi'])
      {
          $this->Grid_editavel  = false;
          $this->Embutida_form  = false;
          $this->Embutida_ronly = false;
          $this->Embutida_multi = true;
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['embutida_liga_tp_pag']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['embutida_liga_tp_pag'])
      {
          $this->form_paginacao = $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['embutida_liga_tp_pag'];
      }

      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['embutida_form']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['embutida_form'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['embutida_form'] = $this->Embutida_form;
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['embutida_liga_grid_edit']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['embutida_liga_grid_edit'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['embutida_liga_grid_edit'] = $this->Grid_editavel ? 'on' : 'off';
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['embutida_liga_grid_edit']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['embutida_liga_grid_edit'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['embutida_liga_grid_edit'] = $this->Embutida_call;
      }

      $this->Ini->cor_grid_par = $this->Ini->cor_grid_impar;
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      $this->nmgp_url_saida  = $nm_url_saida;
      $this->nmgp_form_show  = "on";
      $this->nmgp_form_empty = false;
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_valida.php", "C", "NM_Valida") ; 
      $teste_validade = new NM_Valida ;

      $this->loadFieldConfig();

      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['first_time'])
      {
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_maecom']['insert']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_maecom']['new']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_maecom']['update']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_maecom']['delete']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_maecom']['first']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_maecom']['back']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_maecom']['forward']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_maecom']['last']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_maecom']['qsearch']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_maecom']['dynsearch']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_maecom']['summary']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_maecom']['navpage']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_maecom']['goto']);
      }
      $this->NM_cancel_return_new = (isset($this->NM_cancel_return_new) && $this->NM_cancel_return_new == 1) ? "1" : "";
      $this->NM_cancel_insert_new = ((isset($this->NM_cancel_insert_new) && $this->NM_cancel_insert_new == 1) || $this->NM_cancel_return_new == 1) ? "document.F5.action='" . $nm_url_saida . "';" : "";
      if (isset($this->NM_btn_insert) && '' != $this->NM_btn_insert && (!isset($_SESSION['scriptcase']['sc_apl_conf']['form_maecom']['insert']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['form_maecom']['insert']))
      {
          if ('N' == $this->NM_btn_insert)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_maecom']['insert'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_maecom']['insert'] = 'on';
          }
      }
      if (isset($this->NM_btn_new) && 'N' == $this->NM_btn_new)
      {
          $_SESSION['scriptcase']['sc_apl_conf_lig']['form_maecom']['new'] = 'off';
      }
      if (isset($this->NM_btn_update) && '' != $this->NM_btn_update && (!isset($_SESSION['scriptcase']['sc_apl_conf']['form_maecom']['update']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['form_maecom']['update']))
      {
          if ('N' == $this->NM_btn_update)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_maecom']['update'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_maecom']['update'] = 'on';
          }
      }
      if (isset($this->NM_btn_delete) && '' != $this->NM_btn_delete && (!isset($_SESSION['scriptcase']['sc_apl_conf']['form_maecom']['delete']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['form_maecom']['delete']))
      {
          if ('N' == $this->NM_btn_delete)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_maecom']['delete'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_maecom']['delete'] = 'on';
          }
      }
      if (isset($this->NM_btn_navega) && '' != $this->NM_btn_navega)
      {
          if ('N' == $this->NM_btn_navega)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_maecom']['first']     = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_maecom']['back']      = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_maecom']['forward']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_maecom']['last']      = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_maecom']['qsearch']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_maecom']['dynsearch'] = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_maecom']['summary']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_maecom']['navpage']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_maecom']['goto']      = 'off';
              $this->Nav_permite_ava = false;
              $this->Nav_permite_ret = false;
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_maecom']['first']     = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_maecom']['back']      = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_maecom']['forward']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_maecom']['last']      = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_maecom']['qsearch']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_maecom']['dynsearch'] = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_maecom']['summary']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_maecom']['navpage']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_maecom']['goto']      = 'on';
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
      $this->nmgp_botoes['qtline'] = "off";
      $this->nmgp_botoes['reload'] = "off";
      if (isset($this->NM_btn_cancel) && 'N' == $this->NM_btn_cancel)
      {
          $this->nmgp_botoes['cancel'] = "off";
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['where_orig'] = "";
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['where_pesq']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['where_pesq'] = "";
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['where_pesq_filtro'] = "";
      }
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['where_pesq_filtro'];
      if ($this->NM_ajax_flag && 'event_' == substr($this->NM_ajax_opcao, 0, 6)) {
          $this->nmgp_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['buttonStatus'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['iframe_filtro']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['iframe_filtro'] == "S")
      {
          $this->nmgp_botoes['exit'] = "off";
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_maecom']['btn_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['form_maecom']['btn_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['form_maecom']['btn_display'] as $NM_cada_btn => $NM_cada_opc)
          {
              $this->nmgp_botoes[$NM_cada_btn] = $NM_cada_opc;
          }
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_maecom']['insert']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_maecom']['insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_maecom']['insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_maecom']['insert'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_maecom']['new']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_maecom']['new'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_maecom']['new'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_maecom']['update']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_maecom']['update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_maecom']['update'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_maecom']['delete']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_maecom']['delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_maecom']['delete'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_maecom']['first']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_maecom']['first'] != '')
      {
          $this->nmgp_botoes['first'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_maecom']['first'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_maecom']['back']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_maecom']['back'] != '')
      {
          $this->nmgp_botoes['back'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_maecom']['back'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_maecom']['forward']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_maecom']['forward'] != '')
      {
          $this->nmgp_botoes['forward'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_maecom']['forward'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_maecom']['last']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_maecom']['last'] != '')
      {
          $this->nmgp_botoes['last'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_maecom']['last'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_maecom']['qsearch']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_maecom']['qsearch'] != '')
      {
          $this->nmgp_botoes['qsearch'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_maecom']['qsearch'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_maecom']['dynsearch']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_maecom']['dynsearch'] != '')
      {
          $this->nmgp_botoes['dynsearch'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_maecom']['dynsearch'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_maecom']['summary']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_maecom']['summary'] != '')
      {
          $this->nmgp_botoes['summary'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_maecom']['summary'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_maecom']['navpage']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_maecom']['navpage'] != '')
      {
          $this->nmgp_botoes['navpage'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_maecom']['navpage'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_maecom']['goto']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_maecom']['goto'] != '')
      {
          $this->nmgp_botoes['goto'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_maecom']['goto'];
      }

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['embutida_liga_form_insert']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['embutida_liga_form_insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['embutida_liga_form_insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['embutida_liga_form_insert'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['embutida_liga_form_update']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['embutida_liga_form_update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['embutida_liga_form_update'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['embutida_liga_form_delete']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['embutida_liga_form_delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['embutida_liga_form_delete'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['embutida_liga_form_btn_nav']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['embutida_liga_form_btn_nav'] != '')
      {
          $this->nmgp_botoes['first']   = $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['back']    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['forward'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['last']    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['embutida_liga_form_btn_nav'];
      }

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['dashboard_info']['under_dashboard'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['dashboard_info']['maximized']) {
          $tmpDashboardApp = $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['dashboard_info']['dashboard_app'];
          if (isset($_SESSION['scriptcase']['dashboard_toolbar'][$tmpDashboardApp]['form_maecom'])) {
              $tmpDashboardButtons = $_SESSION['scriptcase']['dashboard_toolbar'][$tmpDashboardApp]['form_maecom'];

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

      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_maecom']['insert']) && $_SESSION['scriptcase']['sc_apl_conf']['form_maecom']['insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf']['form_maecom']['insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['scriptcase']['sc_apl_conf']['form_maecom']['insert'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_maecom']['update']) && $_SESSION['scriptcase']['sc_apl_conf']['form_maecom']['update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['scriptcase']['sc_apl_conf']['form_maecom']['update'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_maecom']['delete']) && $_SESSION['scriptcase']['sc_apl_conf']['form_maecom']['delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['scriptcase']['sc_apl_conf']['form_maecom']['delete'];
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_maecom']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['form_maecom']['field_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['form_maecom']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->nmgp_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
              $this->NM_ajax_info['fieldDisplay'][$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_maecom']['field_readonly']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['form_maecom']['field_readonly']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['form_maecom']['field_readonly'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->nmgp_cmp_readonly[$NM_cada_field] = "on";
              $this->NM_ajax_info['readOnly'][$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_maecom']['exit']) && $_SESSION['scriptcase']['sc_apl_conf']['form_maecom']['exit'] != '')
      {
          $_SESSION['scriptcase']['sc_url_saida'][$this->Ini->sc_page]       = $_SESSION['scriptcase']['sc_apl_conf']['form_maecom']['exit'];
          $_SESSION['scriptcase']['sc_force_url_saida'][$this->Ini->sc_page] = true;
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['dados_form']))
      {
          $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['dados_form'];
      }
      $glo_senha_protect = (isset($_SESSION['scriptcase']['glo_senha_protect'])) ? $_SESSION['scriptcase']['glo_senha_protect'] : "S";
      $this->aba_iframe = false;
      if (isset($_SESSION['scriptcase']['sc_aba_iframe']))
      {
          foreach ($_SESSION['scriptcase']['sc_aba_iframe'] as $aba => $apls_aba)
          {
              if (in_array("form_maecom", $apls_aba))
              {
                  $this->aba_iframe = true;
                  break;
              }
          }
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['iframe_menu'] && (!isset($_SESSION['scriptcase']['menu_mobile']) || empty($_SESSION['scriptcase']['menu_mobile'])))
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
              include_once($this->Ini->path_embutida . 'form_maecom/form_maecom_calendar.php');
          }
          else
          { 
              include_once($this->Ini->path_aplicacao . 'form_maecom_calendar.php');
          }
          exit;
      }

      if (is_file($this->Ini->path_aplicacao . 'form_maecom_help.txt'))
      {
          $arr_link_webhelp = file($this->Ini->path_aplicacao . 'form_maecom_help.txt');
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
          require_once($this->Ini->path_embutida . 'form_maecom/form_maecom_erro.class.php');
      }
      else
      { 
          require_once($this->Ini->path_aplicacao . "form_maecom_erro.class.php"); 
      }
      $this->Erro      = new form_maecom_erro();
      $this->Erro->Ini = $this->Ini;
      $this->proc_fast_search = false;
      if ($this->nmgp_opcao == "fast_search")  
      {
          $this->SC_fast_search($this->nmgp_fast_search, $this->nmgp_cond_fast_search, $this->nmgp_arg_fast_search);
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['opcao'] = "inicio";
          $this->nmgp_opcao = "inicio";
          $this->proc_fast_search = true;
      } 
      if ($nm_opc_lookup != "lookup" && $nm_opc_php != "formphp")
      { 
         if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['opcao']))
         { 
             if ($this->tipodocto31 != "" || $this->nofact31 != "")   
             { 
                 $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['opcao'] = "igual" ;  
             }   
         }   
      } 
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['opcao']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['opcao']) && empty($this->nmgp_refresh_fields))
      {
          $this->nmgp_opcao = $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['opcao'];  
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['opcao'] = "" ;  
          if ($this->nmgp_opcao == "edit_novo")  
          {
             $this->nmgp_opcao = "novo";
             $this->nm_flag_saida_novo = "S";
          }
      } 
      $this->nm_Start_new = false;
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_maecom']['start']) && $_SESSION['scriptcase']['sc_apl_conf']['form_maecom']['start'] == 'new')
      {
          $this->nmgp_opcao = "novo";
          $this->nm_Start_new = true;
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['opcao'] = "novo";
          unset($_SESSION['scriptcase']['sc_apl_conf']['form_maecom']['start']);
      }
      if ($this->nmgp_opcao == "igual")  
      {
          $this->nmgp_opc_ant = $this->nmgp_opcao;
      } 
      else
      {
          $this->nmgp_opc_ant = $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['opc_ant'];
      } 
      if ($this->nmgp_opcao == "recarga" || $this->nmgp_opcao == "muda_form")  
      {
          $this->nmgp_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['botoes'];
          $this->Nav_permite_ret = 0 != $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['inicio'];
          $this->Nav_permite_ava = $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['total'] != $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['final'];
      }
      else
      {
      }
      $this->nm_flag_iframe = false;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['dados_form'])) 
      {
         $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['dados_form'];
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
      if (isset($this->tipodocto31)) { $this->nm_limpa_alfa($this->tipodocto31); }
      if (isset($this->nofact31)) { $this->nm_limpa_alfa($this->nofact31); }
      if (isset($this->nocte31)) { $this->nm_limpa_alfa($this->nocte31); }
      if (isset($this->nomcte31)) { $this->nm_limpa_alfa($this->nomcte31); }
      if (isset($this->localid31)) { $this->nm_limpa_alfa($this->localid31); }
      if (isset($this->cvectenegro31)) { $this->nm_limpa_alfa($this->cvectenegro31); }
      if (isset($this->vtabta31)) { $this->nm_limpa_alfa($this->vtabta31); }
      if (isset($this->descto31)) { $this->nm_limpa_alfa($this->descto31); }
      if (isset($this->flete31)) { $this->nm_limpa_alfa($this->flete31); }
      if (isset($this->itm31)) { $this->nm_limpa_alfa($this->itm31); }
      if (isset($this->novend31)) { $this->nm_limpa_alfa($this->novend31); }
      if (isset($this->condpag31)) { $this->nm_limpa_alfa($this->condpag31); }
      if (isset($this->nopagos31)) { $this->nm_limpa_alfa($this->nopagos31); }
      if (isset($this->formapago31)) { $this->nm_limpa_alfa($this->formapago31); }
      if (isset($this->obra31)) { $this->nm_limpa_alfa($this->obra31); }
      if (isset($this->orden31)) { $this->nm_limpa_alfa($this->orden31); }
      if (isset($this->cvnegra31)) { $this->nm_limpa_alfa($this->cvnegra31); }
      if (isset($this->status31)) { $this->nm_limpa_alfa($this->status31); }
      if (isset($this->cvimpto31)) { $this->nm_limpa_alfa($this->cvimpto31); }
      if (isset($this->cvanulado31)) { $this->nm_limpa_alfa($this->cvanulado31); }
      if (isset($this->efectivo31)) { $this->nm_limpa_alfa($this->efectivo31); }
      if (isset($this->cheque31)) { $this->nm_limpa_alfa($this->cheque31); }
      if (isset($this->tarjeta31)) { $this->nm_limpa_alfa($this->tarjeta31); }
      if (isset($this->acuenta31)) { $this->nm_limpa_alfa($this->acuenta31); }
      if (isset($this->nobanco31)) { $this->nm_limpa_alfa($this->nobanco31); }
      if (isset($this->nombanco31)) { $this->nm_limpa_alfa($this->nombanco31); }
      if (isset($this->nocheque31)) { $this->nm_limpa_alfa($this->nocheque31); }
      if (isset($this->notarjeta31)) { $this->nm_limpa_alfa($this->notarjeta31); }
      if (isset($this->nomtarjeta31)) { $this->nm_limpa_alfa($this->nomtarjeta31); }
      if (isset($this->cvdivisa31)) { $this->nm_limpa_alfa($this->cvdivisa31); }
      if (isset($this->valdivisa31)) { $this->nm_limpa_alfa($this->valdivisa31); }
      if (isset($this->lineaprod31)) { $this->nm_limpa_alfa($this->lineaprod31); }
      if (isset($this->intereses31)) { $this->nm_limpa_alfa($this->intereses31); }
      if (isset($this->nopedido31)) { $this->nm_limpa_alfa($this->nopedido31); }
      if (isset($this->ruc31)) { $this->nm_limpa_alfa($this->ruc31); }
      if (isset($this->tel31)) { $this->nm_limpa_alfa($this->tel31); }
      if (isset($this->transpor31)) { $this->nm_limpa_alfa($this->transpor31); }
      if (isset($this->cvtransfer31)) { $this->nm_limpa_alfa($this->cvtransfer31); }
      if (isset($this->desctofp31)) { $this->nm_limpa_alfa($this->desctofp31); }
      if (isset($this->catcte31)) { $this->nm_limpa_alfa($this->catcte31); }
      if (isset($this->uid)) { $this->nm_limpa_alfa($this->uid); }
      if (isset($this->recargos31)) { $this->nm_limpa_alfa($this->recargos31); }
      if (isset($this->ice31)) { $this->nm_limpa_alfa($this->ice31); }
      if (isset($this->tipocomp31)) { $this->nm_limpa_alfa($this->tipocomp31); }
      if (isset($this->conta31)) { $this->nm_limpa_alfa($this->conta31); }
      if (isset($this->totsiniva31)) { $this->nm_limpa_alfa($this->totsiniva31); }
      if (isset($this->norefrendo)) { $this->nm_limpa_alfa($this->norefrendo); }
      if (isset($this->baseice)) { $this->nm_limpa_alfa($this->baseice); }
      if (isset($this->ncodret43)) { $this->nm_limpa_alfa($this->ncodret43); }
      if (isset($this->nbaseret43)) { $this->nm_limpa_alfa($this->nbaseret43); }
      if (isset($this->npctjeret43)) { $this->nm_limpa_alfa($this->npctjeret43); }
      if (isset($this->contrato)) { $this->nm_limpa_alfa($this->contrato); }
      if (isset($this->compra_general)) { $this->nm_limpa_alfa($this->compra_general); }
      if (isset($this->distribucion_rubros)) { $this->nm_limpa_alfa($this->distribucion_rubros); }
      if (isset($this->dstoley)) { $this->nm_limpa_alfa($this->dstoley); }
      if (isset($this->remgas31)) { $this->nm_limpa_alfa($this->remgas31); }
      if (isset($this->estado_electronico)) { $this->nm_limpa_alfa($this->estado_electronico); }
      if (isset($this->coddest31)) { $this->nm_limpa_alfa($this->coddest31); }
      $Campos_Crit       = "";
      $Campos_erro       = "";
      $Campos_Falta      = array();
      $Campos_Erros      = array();
      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          =  substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['opc_edit'] = true;  
     if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['dados_select'])) 
     {
        $this->nmgp_dados_select = $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['dados_select'];
     }
   }

   function loadFieldConfig()
   {
      $this->field_config = array();
      //-- vtabta31
      $this->field_config['vtabta31']               = array();
      $this->field_config['vtabta31']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_val'];
      $this->field_config['vtabta31']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['vtabta31']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_val'];
      $this->field_config['vtabta31']['symbol_mon'] = '';
      $this->field_config['vtabta31']['format_pos'] = $_SESSION['scriptcase']['reg_conf']['monet_f_pos'];
      $this->field_config['vtabta31']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['monet_f_neg'];
      //-- descto31
      $this->field_config['descto31']               = array();
      $this->field_config['descto31']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_val'];
      $this->field_config['descto31']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['descto31']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_val'];
      $this->field_config['descto31']['symbol_mon'] = '';
      $this->field_config['descto31']['format_pos'] = $_SESSION['scriptcase']['reg_conf']['monet_f_pos'];
      $this->field_config['descto31']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['monet_f_neg'];
      //-- flete31
      $this->field_config['flete31']               = array();
      $this->field_config['flete31']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_val'];
      $this->field_config['flete31']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['flete31']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_val'];
      $this->field_config['flete31']['symbol_mon'] = '';
      $this->field_config['flete31']['format_pos'] = $_SESSION['scriptcase']['reg_conf']['monet_f_pos'];
      $this->field_config['flete31']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['monet_f_neg'];
      //-- itm31
      $this->field_config['itm31']               = array();
      $this->field_config['itm31']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_val'];
      $this->field_config['itm31']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['itm31']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_val'];
      $this->field_config['itm31']['symbol_mon'] = '';
      $this->field_config['itm31']['format_pos'] = $_SESSION['scriptcase']['reg_conf']['monet_f_pos'];
      $this->field_config['itm31']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['monet_f_neg'];
      //-- fecfact31
      $this->field_config['fecfact31']                 = array();
      $this->field_config['fecfact31']['date_format']  = $_SESSION['scriptcase']['reg_conf']['date_format'] . ';' . $_SESSION['scriptcase']['reg_conf']['time_format'];
      $this->field_config['fecfact31']['date_sep']     = $_SESSION['scriptcase']['reg_conf']['date_sep'];
      $this->field_config['fecfact31']['time_sep']     = $_SESSION['scriptcase']['reg_conf']['time_sep'];
      $this->field_config['fecfact31']['date_display'] = "ddmmaaaa;hhiiss";
      $this->new_date_format('DH', 'fecfact31');
      //-- efectivo31
      $this->field_config['efectivo31']               = array();
      $this->field_config['efectivo31']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_val'];
      $this->field_config['efectivo31']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['efectivo31']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_val'];
      $this->field_config['efectivo31']['symbol_mon'] = '';
      $this->field_config['efectivo31']['format_pos'] = $_SESSION['scriptcase']['reg_conf']['monet_f_pos'];
      $this->field_config['efectivo31']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['monet_f_neg'];
      //-- cheque31
      $this->field_config['cheque31']               = array();
      $this->field_config['cheque31']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_val'];
      $this->field_config['cheque31']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['cheque31']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_val'];
      $this->field_config['cheque31']['symbol_mon'] = '';
      $this->field_config['cheque31']['format_pos'] = $_SESSION['scriptcase']['reg_conf']['monet_f_pos'];
      $this->field_config['cheque31']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['monet_f_neg'];
      //-- tarjeta31
      $this->field_config['tarjeta31']               = array();
      $this->field_config['tarjeta31']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_val'];
      $this->field_config['tarjeta31']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['tarjeta31']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_val'];
      $this->field_config['tarjeta31']['symbol_mon'] = '';
      $this->field_config['tarjeta31']['format_pos'] = $_SESSION['scriptcase']['reg_conf']['monet_f_pos'];
      $this->field_config['tarjeta31']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['monet_f_neg'];
      //-- acuenta31
      $this->field_config['acuenta31']               = array();
      $this->field_config['acuenta31']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_val'];
      $this->field_config['acuenta31']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['acuenta31']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_val'];
      $this->field_config['acuenta31']['symbol_mon'] = '';
      $this->field_config['acuenta31']['format_pos'] = $_SESSION['scriptcase']['reg_conf']['monet_f_pos'];
      $this->field_config['acuenta31']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['monet_f_neg'];
      //-- intereses31
      $this->field_config['intereses31']               = array();
      $this->field_config['intereses31']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_val'];
      $this->field_config['intereses31']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['intereses31']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_val'];
      $this->field_config['intereses31']['symbol_mon'] = '';
      $this->field_config['intereses31']['format_pos'] = $_SESSION['scriptcase']['reg_conf']['monet_f_pos'];
      $this->field_config['intereses31']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['monet_f_neg'];
      //-- fecped31
      $this->field_config['fecped31']                 = array();
      $this->field_config['fecped31']['date_format']  = $_SESSION['scriptcase']['reg_conf']['date_format'] . ';' . $_SESSION['scriptcase']['reg_conf']['time_format'];
      $this->field_config['fecped31']['date_sep']     = $_SESSION['scriptcase']['reg_conf']['date_sep'];
      $this->field_config['fecped31']['time_sep']     = $_SESSION['scriptcase']['reg_conf']['time_sep'];
      $this->field_config['fecped31']['date_display'] = "ddmmaaaa;hhiiss";
      $this->new_date_format('DH', 'fecped31');
      //-- fectrasfer31
      $this->field_config['fectrasfer31']                 = array();
      $this->field_config['fectrasfer31']['date_format']  = $_SESSION['scriptcase']['reg_conf']['date_format'];
      $this->field_config['fectrasfer31']['date_sep']     = $_SESSION['scriptcase']['reg_conf']['date_sep'];
      $this->field_config['fectrasfer31']['date_display'] = "ddmmaaaa";
      $this->new_date_format('DT', 'fectrasfer31');
      //-- desctofp31
      $this->field_config['desctofp31']               = array();
      $this->field_config['desctofp31']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_val'];
      $this->field_config['desctofp31']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['desctofp31']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_val'];
      $this->field_config['desctofp31']['symbol_mon'] = '';
      $this->field_config['desctofp31']['format_pos'] = $_SESSION['scriptcase']['reg_conf']['monet_f_pos'];
      $this->field_config['desctofp31']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['monet_f_neg'];
      //-- uid
      $this->field_config['uid']               = array();
      $this->field_config['uid']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['uid']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['uid']['symbol_dec'] = '';
      $this->field_config['uid']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['uid']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- recargos31
      $this->field_config['recargos31']               = array();
      $this->field_config['recargos31']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_val'];
      $this->field_config['recargos31']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['recargos31']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_val'];
      $this->field_config['recargos31']['symbol_mon'] = '';
      $this->field_config['recargos31']['format_pos'] = $_SESSION['scriptcase']['reg_conf']['monet_f_pos'];
      $this->field_config['recargos31']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['monet_f_neg'];
      //-- ice31
      $this->field_config['ice31']               = array();
      $this->field_config['ice31']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_val'];
      $this->field_config['ice31']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['ice31']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_val'];
      $this->field_config['ice31']['symbol_mon'] = '';
      $this->field_config['ice31']['format_pos'] = $_SESSION['scriptcase']['reg_conf']['monet_f_pos'];
      $this->field_config['ice31']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['monet_f_neg'];
      //-- fecdocpr31
      $this->field_config['fecdocpr31']                 = array();
      $this->field_config['fecdocpr31']['date_format']  = $_SESSION['scriptcase']['reg_conf']['date_format'] . ';' . $_SESSION['scriptcase']['reg_conf']['time_format'];
      $this->field_config['fecdocpr31']['date_sep']     = $_SESSION['scriptcase']['reg_conf']['date_sep'];
      $this->field_config['fecdocpr31']['time_sep']     = $_SESSION['scriptcase']['reg_conf']['time_sep'];
      $this->field_config['fecdocpr31']['date_display'] = "ddmmaaaa;hhiiss";
      $this->new_date_format('DH', 'fecdocpr31');
      //-- conta31
      $this->field_config['conta31']               = array();
      $this->field_config['conta31']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['conta31']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['conta31']['symbol_dec'] = '';
      $this->field_config['conta31']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['conta31']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- fecvencidocpr
      $this->field_config['fecvencidocpr']                 = array();
      $this->field_config['fecvencidocpr']['date_format']  = $_SESSION['scriptcase']['reg_conf']['date_format'] . ';' . $_SESSION['scriptcase']['reg_conf']['time_format'];
      $this->field_config['fecvencidocpr']['date_sep']     = $_SESSION['scriptcase']['reg_conf']['date_sep'];
      $this->field_config['fecvencidocpr']['time_sep']     = $_SESSION['scriptcase']['reg_conf']['time_sep'];
      $this->field_config['fecvencidocpr']['date_display'] = "ddmmaaaa;hhiiss";
      $this->new_date_format('DH', 'fecvencidocpr');
      //-- totsiniva31
      $this->field_config['totsiniva31']               = array();
      $this->field_config['totsiniva31']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_val'];
      $this->field_config['totsiniva31']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['totsiniva31']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_val'];
      $this->field_config['totsiniva31']['symbol_mon'] = '';
      $this->field_config['totsiniva31']['format_pos'] = $_SESSION['scriptcase']['reg_conf']['monet_f_pos'];
      $this->field_config['totsiniva31']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['monet_f_neg'];
      //-- fecemb
      $this->field_config['fecemb']                 = array();
      $this->field_config['fecemb']['date_format']  = $_SESSION['scriptcase']['reg_conf']['date_format'];
      $this->field_config['fecemb']['date_sep']     = $_SESSION['scriptcase']['reg_conf']['date_sep'];
      $this->field_config['fecemb']['date_display'] = "ddmmaaaa";
      $this->new_date_format('DT', 'fecemb');
      //-- baseice
      $this->field_config['baseice']               = array();
      $this->field_config['baseice']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_val'];
      $this->field_config['baseice']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['baseice']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_val'];
      $this->field_config['baseice']['symbol_mon'] = '';
      $this->field_config['baseice']['format_pos'] = $_SESSION['scriptcase']['reg_conf']['monet_f_pos'];
      $this->field_config['baseice']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['monet_f_neg'];
      //-- nbaseret43
      $this->field_config['nbaseret43']               = array();
      $this->field_config['nbaseret43']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_val'];
      $this->field_config['nbaseret43']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['nbaseret43']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_val'];
      $this->field_config['nbaseret43']['symbol_mon'] = '';
      $this->field_config['nbaseret43']['format_pos'] = $_SESSION['scriptcase']['reg_conf']['monet_f_pos'];
      $this->field_config['nbaseret43']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['monet_f_neg'];
      //-- npctjeret43
      $this->field_config['npctjeret43']               = array();
      $this->field_config['npctjeret43']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_val'];
      $this->field_config['npctjeret43']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['npctjeret43']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_val'];
      $this->field_config['npctjeret43']['symbol_mon'] = '';
      $this->field_config['npctjeret43']['format_pos'] = $_SESSION['scriptcase']['reg_conf']['monet_f_pos'];
      $this->field_config['npctjeret43']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['monet_f_neg'];
      //-- dstoley
      $this->field_config['dstoley']               = array();
      $this->field_config['dstoley']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_val'];
      $this->field_config['dstoley']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['dstoley']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_val'];
      $this->field_config['dstoley']['symbol_mon'] = '';
      $this->field_config['dstoley']['format_pos'] = $_SESSION['scriptcase']['reg_conf']['monet_f_pos'];
      $this->field_config['dstoley']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['monet_f_neg'];
      //-- estado_electronico
      $this->field_config['estado_electronico']               = array();
      $this->field_config['estado_electronico']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['estado_electronico']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['estado_electronico']['symbol_dec'] = '';
      $this->field_config['estado_electronico']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['estado_electronico']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
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
          if ('validate_tipodocto31' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'tipodocto31');
          }
          if ('validate_nofact31' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'nofact31');
          }
          if ('validate_nocte31' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'nocte31');
          }
          if ('validate_nomcte31' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'nomcte31');
          }
          if ('validate_localid31' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'localid31');
          }
          if ('validate_cvectenegro31' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'cvectenegro31');
          }
          if ('validate_vtabta31' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'vtabta31');
          }
          if ('validate_descto31' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'descto31');
          }
          if ('validate_flete31' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'flete31');
          }
          if ('validate_itm31' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'itm31');
          }
          if ('validate_novend31' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'novend31');
          }
          if ('validate_fecfact31' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'fecfact31');
          }
          if ('validate_condpag31' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'condpag31');
          }
          if ('validate_nopagos31' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'nopagos31');
          }
          if ('validate_formapago31' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'formapago31');
          }
          if ('validate_obra31' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'obra31');
          }
          if ('validate_orden31' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'orden31');
          }
          if ('validate_cvnegra31' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'cvnegra31');
          }
          if ('validate_status31' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'status31');
          }
          if ('validate_cvimpto31' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'cvimpto31');
          }
          if ('validate_cvanulado31' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'cvanulado31');
          }
          if ('validate_efectivo31' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'efectivo31');
          }
          if ('validate_cheque31' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'cheque31');
          }
          if ('validate_tarjeta31' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'tarjeta31');
          }
          if ('validate_acuenta31' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'acuenta31');
          }
          if ('validate_nobanco31' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'nobanco31');
          }
          if ('validate_nombanco31' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'nombanco31');
          }
          if ('validate_nocheque31' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'nocheque31');
          }
          if ('validate_notarjeta31' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'notarjeta31');
          }
          if ('validate_nomtarjeta31' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'nomtarjeta31');
          }
          if ('validate_cvdivisa31' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'cvdivisa31');
          }
          if ('validate_valdivisa31' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'valdivisa31');
          }
          if ('validate_lineaprod31' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'lineaprod31');
          }
          if ('validate_intereses31' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'intereses31');
          }
          if ('validate_nopedido31' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'nopedido31');
          }
          if ('validate_fecped31' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'fecped31');
          }
          if ('validate_ruc31' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'ruc31');
          }
          if ('validate_tel31' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'tel31');
          }
          if ('validate_transpor31' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'transpor31');
          }
          if ('validate_cvtransfer31' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'cvtransfer31');
          }
          if ('validate_fectrasfer31' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'fectrasfer31');
          }
          if ('validate_desctofp31' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'desctofp31');
          }
          if ('validate_catcte31' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'catcte31');
          }
          if ('validate_uid' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'uid');
          }
          if ('validate_recargos31' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'recargos31');
          }
          if ('validate_ice31' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'ice31');
          }
          if ('validate_fecdocpr31' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'fecdocpr31');
          }
          if ('validate_tipocomp31' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'tipocomp31');
          }
          if ('validate_conta31' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'conta31');
          }
          if ('validate_fecvencidocpr' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'fecvencidocpr');
          }
          if ('validate_totsiniva31' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'totsiniva31');
          }
          if ('validate_fecemb' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'fecemb');
          }
          if ('validate_norefrendo' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'norefrendo');
          }
          if ('validate_baseice' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'baseice');
          }
          if ('validate_ncodret43' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'ncodret43');
          }
          if ('validate_nbaseret43' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'nbaseret43');
          }
          if ('validate_npctjeret43' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'npctjeret43');
          }
          if ('validate_contrato' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'contrato');
          }
          if ('validate_compra_general' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'compra_general');
          }
          if ('validate_distribucion_rubros' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'distribucion_rubros');
          }
          if ('validate_dstoley' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'dstoley');
          }
          if ('validate_remgas31' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'remgas31');
          }
          if ('validate_estado_electronico' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'estado_electronico');
          }
          if ('validate_coddest31' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'coddest31');
          }
          form_maecom_pack_ajax_response();
          exit;
      }
      if (isset($this->sc_inline_call) && 'Y' == $this->sc_inline_call)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['inline_form_seq'] = $this->sc_seq_row;
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
              form_maecom_pack_ajax_response();
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
          $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros) ; 
          $_SESSION['scriptcase']['form_maecom']['contr_erro'] = 'off';
          if ($Campos_Crit != "") 
          {
              $Campos_Crit = $this->Ini->Nm_lang['lang_errm_flds'] . ' ' . $Campos_Crit ; 
          }
          if ($Campos_Crit != "" || !empty($Campos_Falta) || $this->Campos_Mens_erro != "")
          {
              if ($this->NM_ajax_flag)
              {
                  form_maecom_pack_ajax_response();
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
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['recarga'] = $this->nmgp_opcao;
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['sc_redir_insert']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['sc_redir_insert'] == "ok")
          {
              if ($this->sc_evento == "insert" || ($this->nmgp_opc_ant == "novo" && $this->nmgp_opcao == "novo" && $this->sc_evento == "novo"))
              {
                  $this->NM_close_db(); 
                  $this->nmgp_redireciona(2); 
              }
          }
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['sc_redir_atualiz']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['sc_redir_atualiz'] == "ok")
          {
              if ($this->sc_evento == "update")
              {
                  $this->NM_close_db(); 
                  $this->nmgp_redireciona(2); 
              }
              if ($this->sc_evento == "delete")
              {
                  $this->NM_close_db(); 
                  $this->nmgp_redireciona(2); 
              }
          }
      }
      if ($this->NM_ajax_flag && 'navigate_form' == $this->NM_ajax_opcao)
      {
          $this->ajax_return_values();
          $this->ajax_add_parameters();
          form_maecom_pack_ajax_response();
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
          form_maecom_pack_ajax_response();
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
          $Zip_name = "sc_prt_" . date("YmdHis") . "_" . rand(0, 1000) . "form_maecom.zip";
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
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom'][$path_doc_md5][0] = $Arq_htm;
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom'][$path_doc_md5][1] = $Zip_name;
?>
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE><?php echo strip_tags("" . $this->Ini->Nm_lang['lang_othr_frmu_title'] . " maecom") ?></TITLE>
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
<form name="Fdown" method="get" action="form_maecom_download.php" target="_self" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo $this->form_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="form_maecom"> 
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
           case 'tipodocto31':
               return "Tipodocto 31";
               break;
           case 'nofact31':
               return "Nofact 31";
               break;
           case 'nocte31':
               return "Nocte 31";
               break;
           case 'nomcte31':
               return "Nomcte 31";
               break;
           case 'localid31':
               return "Localid 31";
               break;
           case 'cvectenegro31':
               return "Cvectenegro 31";
               break;
           case 'vtabta31':
               return "Vtabta 31";
               break;
           case 'descto31':
               return "Descto 31";
               break;
           case 'flete31':
               return "Flete 31";
               break;
           case 'itm31':
               return "Itm 31";
               break;
           case 'novend31':
               return "Novend 31";
               break;
           case 'fecfact31':
               return "Fecfact 31";
               break;
           case 'condpag31':
               return "Condpag 31";
               break;
           case 'nopagos31':
               return "Nopagos 31";
               break;
           case 'formapago31':
               return "Formapago 31";
               break;
           case 'obra31':
               return "Obra 31";
               break;
           case 'orden31':
               return "Orden 31";
               break;
           case 'cvnegra31':
               return "Cvnegra 31";
               break;
           case 'status31':
               return "Status 31";
               break;
           case 'cvimpto31':
               return "Cvimpto 31";
               break;
           case 'cvanulado31':
               return "Cvanulado 31";
               break;
           case 'efectivo31':
               return "Efectivo 31";
               break;
           case 'cheque31':
               return "Cheque 31";
               break;
           case 'tarjeta31':
               return "Tarjeta 31";
               break;
           case 'acuenta31':
               return "Acuenta 31";
               break;
           case 'nobanco31':
               return "Nobanco 31";
               break;
           case 'nombanco31':
               return "Nombanco 31";
               break;
           case 'nocheque31':
               return "Nocheque 31";
               break;
           case 'notarjeta31':
               return "Notarjeta 31";
               break;
           case 'nomtarjeta31':
               return "Nomtarjeta 31";
               break;
           case 'cvdivisa31':
               return "Cvdivisa 31";
               break;
           case 'valdivisa31':
               return "Valdivisa 31";
               break;
           case 'lineaprod31':
               return "Lineaprod 31";
               break;
           case 'intereses31':
               return "Intereses 31";
               break;
           case 'nopedido31':
               return "Nopedido 31";
               break;
           case 'fecped31':
               return "Fecped 31";
               break;
           case 'ruc31':
               return "Ruc 31";
               break;
           case 'tel31':
               return "Tel 31";
               break;
           case 'transpor31':
               return "Transpor 31";
               break;
           case 'cvtransfer31':
               return "Cvtransfer 31";
               break;
           case 'fectrasfer31':
               return "Fectrasfer 31";
               break;
           case 'desctofp31':
               return "Desctofp 31";
               break;
           case 'catcte31':
               return "Catcte 31";
               break;
           case 'uid':
               return "UID";
               break;
           case 'recargos31':
               return "Recargos 31";
               break;
           case 'ice31':
               return "Ice 31";
               break;
           case 'fecdocpr31':
               return "Fecdocpr 31";
               break;
           case 'tipocomp31':
               return "Tipocomp 31";
               break;
           case 'conta31':
               return "Conta 31";
               break;
           case 'fecvencidocpr':
               return "Fecvencidocpr";
               break;
           case 'totsiniva31':
               return "Totsiniva 31";
               break;
           case 'fecemb':
               return "Fecemb";
               break;
           case 'norefrendo':
               return "Norefrendo";
               break;
           case 'baseice':
               return "Baseice";
               break;
           case 'ncodret43':
               return "Ncodret 43";
               break;
           case 'nbaseret43':
               return "Nbaseret 43";
               break;
           case 'npctjeret43':
               return "Npctjeret 43";
               break;
           case 'contrato':
               return "Contrato";
               break;
           case 'compra_general':
               return "Compra General";
               break;
           case 'distribucion_rubros':
               return "Distribucion Rubros";
               break;
           case 'dstoley':
               return "Dsto Ley";
               break;
           case 'remgas31':
               return "Rem Gas 31";
               break;
           case 'estado_electronico':
               return "Estado Electronico";
               break;
           case 'coddest31':
               return "Coddest 31";
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

     if (!is_array($filtro) && '' == $filtro && isset($this->nm_form_submit) && '1' == $this->nm_form_submit && $this->scCsrfGetToken() != $this->csrf_token)
     {
          $this->Campos_Mens_erro .= (empty($this->Campos_Mens_erro)) ? "" : "<br />";
          $this->Campos_Mens_erro .= "CSRF: " . $this->Ini->Nm_lang['lang_errm_ajax_csrf'];
          if ($this->NM_ajax_flag)
          {
              if (!isset($this->NM_ajax_info['errList']['geral_form_maecom']) || !is_array($this->NM_ajax_info['errList']['geral_form_maecom']))
              {
                  $this->NM_ajax_info['errList']['geral_form_maecom'] = array();
              }
              $this->NM_ajax_info['errList']['geral_form_maecom'][] = "CSRF: " . $this->Ini->Nm_lang['lang_errm_ajax_csrf'];
          }
     }
      if ((!is_array($filtro) && ('' == $filtro || 'tipodocto31' == $filtro)) || (is_array($filtro) && in_array('tipodocto31', $filtro)))
        $this->ValidateField_tipodocto31($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'nofact31' == $filtro)) || (is_array($filtro) && in_array('nofact31', $filtro)))
        $this->ValidateField_nofact31($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'nocte31' == $filtro)) || (is_array($filtro) && in_array('nocte31', $filtro)))
        $this->ValidateField_nocte31($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'nomcte31' == $filtro)) || (is_array($filtro) && in_array('nomcte31', $filtro)))
        $this->ValidateField_nomcte31($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'localid31' == $filtro)) || (is_array($filtro) && in_array('localid31', $filtro)))
        $this->ValidateField_localid31($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'cvectenegro31' == $filtro)) || (is_array($filtro) && in_array('cvectenegro31', $filtro)))
        $this->ValidateField_cvectenegro31($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'vtabta31' == $filtro)) || (is_array($filtro) && in_array('vtabta31', $filtro)))
        $this->ValidateField_vtabta31($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'descto31' == $filtro)) || (is_array($filtro) && in_array('descto31', $filtro)))
        $this->ValidateField_descto31($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'flete31' == $filtro)) || (is_array($filtro) && in_array('flete31', $filtro)))
        $this->ValidateField_flete31($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'itm31' == $filtro)) || (is_array($filtro) && in_array('itm31', $filtro)))
        $this->ValidateField_itm31($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'novend31' == $filtro)) || (is_array($filtro) && in_array('novend31', $filtro)))
        $this->ValidateField_novend31($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'fecfact31' == $filtro)) || (is_array($filtro) && in_array('fecfact31', $filtro)))
        $this->ValidateField_fecfact31($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'condpag31' == $filtro)) || (is_array($filtro) && in_array('condpag31', $filtro)))
        $this->ValidateField_condpag31($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'nopagos31' == $filtro)) || (is_array($filtro) && in_array('nopagos31', $filtro)))
        $this->ValidateField_nopagos31($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'formapago31' == $filtro)) || (is_array($filtro) && in_array('formapago31', $filtro)))
        $this->ValidateField_formapago31($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'obra31' == $filtro)) || (is_array($filtro) && in_array('obra31', $filtro)))
        $this->ValidateField_obra31($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'orden31' == $filtro)) || (is_array($filtro) && in_array('orden31', $filtro)))
        $this->ValidateField_orden31($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'cvnegra31' == $filtro)) || (is_array($filtro) && in_array('cvnegra31', $filtro)))
        $this->ValidateField_cvnegra31($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'status31' == $filtro)) || (is_array($filtro) && in_array('status31', $filtro)))
        $this->ValidateField_status31($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'cvimpto31' == $filtro)) || (is_array($filtro) && in_array('cvimpto31', $filtro)))
        $this->ValidateField_cvimpto31($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'cvanulado31' == $filtro)) || (is_array($filtro) && in_array('cvanulado31', $filtro)))
        $this->ValidateField_cvanulado31($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'efectivo31' == $filtro)) || (is_array($filtro) && in_array('efectivo31', $filtro)))
        $this->ValidateField_efectivo31($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'cheque31' == $filtro)) || (is_array($filtro) && in_array('cheque31', $filtro)))
        $this->ValidateField_cheque31($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'tarjeta31' == $filtro)) || (is_array($filtro) && in_array('tarjeta31', $filtro)))
        $this->ValidateField_tarjeta31($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'acuenta31' == $filtro)) || (is_array($filtro) && in_array('acuenta31', $filtro)))
        $this->ValidateField_acuenta31($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'nobanco31' == $filtro)) || (is_array($filtro) && in_array('nobanco31', $filtro)))
        $this->ValidateField_nobanco31($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'nombanco31' == $filtro)) || (is_array($filtro) && in_array('nombanco31', $filtro)))
        $this->ValidateField_nombanco31($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'nocheque31' == $filtro)) || (is_array($filtro) && in_array('nocheque31', $filtro)))
        $this->ValidateField_nocheque31($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'notarjeta31' == $filtro)) || (is_array($filtro) && in_array('notarjeta31', $filtro)))
        $this->ValidateField_notarjeta31($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'nomtarjeta31' == $filtro)) || (is_array($filtro) && in_array('nomtarjeta31', $filtro)))
        $this->ValidateField_nomtarjeta31($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'cvdivisa31' == $filtro)) || (is_array($filtro) && in_array('cvdivisa31', $filtro)))
        $this->ValidateField_cvdivisa31($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'valdivisa31' == $filtro)) || (is_array($filtro) && in_array('valdivisa31', $filtro)))
        $this->ValidateField_valdivisa31($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'lineaprod31' == $filtro)) || (is_array($filtro) && in_array('lineaprod31', $filtro)))
        $this->ValidateField_lineaprod31($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'intereses31' == $filtro)) || (is_array($filtro) && in_array('intereses31', $filtro)))
        $this->ValidateField_intereses31($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'nopedido31' == $filtro)) || (is_array($filtro) && in_array('nopedido31', $filtro)))
        $this->ValidateField_nopedido31($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'fecped31' == $filtro)) || (is_array($filtro) && in_array('fecped31', $filtro)))
        $this->ValidateField_fecped31($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'ruc31' == $filtro)) || (is_array($filtro) && in_array('ruc31', $filtro)))
        $this->ValidateField_ruc31($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'tel31' == $filtro)) || (is_array($filtro) && in_array('tel31', $filtro)))
        $this->ValidateField_tel31($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'transpor31' == $filtro)) || (is_array($filtro) && in_array('transpor31', $filtro)))
        $this->ValidateField_transpor31($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'cvtransfer31' == $filtro)) || (is_array($filtro) && in_array('cvtransfer31', $filtro)))
        $this->ValidateField_cvtransfer31($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'fectrasfer31' == $filtro)) || (is_array($filtro) && in_array('fectrasfer31', $filtro)))
        $this->ValidateField_fectrasfer31($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'desctofp31' == $filtro)) || (is_array($filtro) && in_array('desctofp31', $filtro)))
        $this->ValidateField_desctofp31($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'catcte31' == $filtro)) || (is_array($filtro) && in_array('catcte31', $filtro)))
        $this->ValidateField_catcte31($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'uid' == $filtro)) || (is_array($filtro) && in_array('uid', $filtro)))
        $this->ValidateField_uid($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'recargos31' == $filtro)) || (is_array($filtro) && in_array('recargos31', $filtro)))
        $this->ValidateField_recargos31($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'ice31' == $filtro)) || (is_array($filtro) && in_array('ice31', $filtro)))
        $this->ValidateField_ice31($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'fecdocpr31' == $filtro)) || (is_array($filtro) && in_array('fecdocpr31', $filtro)))
        $this->ValidateField_fecdocpr31($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'tipocomp31' == $filtro)) || (is_array($filtro) && in_array('tipocomp31', $filtro)))
        $this->ValidateField_tipocomp31($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'conta31' == $filtro)) || (is_array($filtro) && in_array('conta31', $filtro)))
        $this->ValidateField_conta31($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'fecvencidocpr' == $filtro)) || (is_array($filtro) && in_array('fecvencidocpr', $filtro)))
        $this->ValidateField_fecvencidocpr($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'totsiniva31' == $filtro)) || (is_array($filtro) && in_array('totsiniva31', $filtro)))
        $this->ValidateField_totsiniva31($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'fecemb' == $filtro)) || (is_array($filtro) && in_array('fecemb', $filtro)))
        $this->ValidateField_fecemb($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'norefrendo' == $filtro)) || (is_array($filtro) && in_array('norefrendo', $filtro)))
        $this->ValidateField_norefrendo($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'baseice' == $filtro)) || (is_array($filtro) && in_array('baseice', $filtro)))
        $this->ValidateField_baseice($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'ncodret43' == $filtro)) || (is_array($filtro) && in_array('ncodret43', $filtro)))
        $this->ValidateField_ncodret43($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'nbaseret43' == $filtro)) || (is_array($filtro) && in_array('nbaseret43', $filtro)))
        $this->ValidateField_nbaseret43($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'npctjeret43' == $filtro)) || (is_array($filtro) && in_array('npctjeret43', $filtro)))
        $this->ValidateField_npctjeret43($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'contrato' == $filtro)) || (is_array($filtro) && in_array('contrato', $filtro)))
        $this->ValidateField_contrato($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'compra_general' == $filtro)) || (is_array($filtro) && in_array('compra_general', $filtro)))
        $this->ValidateField_compra_general($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'distribucion_rubros' == $filtro)) || (is_array($filtro) && in_array('distribucion_rubros', $filtro)))
        $this->ValidateField_distribucion_rubros($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'dstoley' == $filtro)) || (is_array($filtro) && in_array('dstoley', $filtro)))
        $this->ValidateField_dstoley($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'remgas31' == $filtro)) || (is_array($filtro) && in_array('remgas31', $filtro)))
        $this->ValidateField_remgas31($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'estado_electronico' == $filtro)) || (is_array($filtro) && in_array('estado_electronico', $filtro)))
        $this->ValidateField_estado_electronico($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'coddest31' == $filtro)) || (is_array($filtro) && in_array('coddest31', $filtro)))
        $this->ValidateField_coddest31($Campos_Crit, $Campos_Falta, $Campos_Erros);
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

    function ValidateField_tipodocto31(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['php_cmp_required']['tipodocto31']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['php_cmp_required']['tipodocto31'] == "on")) 
      { 
          if ($this->tipodocto31 == "")  
          { 
              $hasError = true;
              $Campos_Falta[] =  "Tipodocto 31" ; 
              if (!isset($Campos_Erros['tipodocto31']))
              {
                  $Campos_Erros['tipodocto31'] = array();
              }
              $Campos_Erros['tipodocto31'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['tipodocto31']) || !is_array($this->NM_ajax_info['errList']['tipodocto31']))
                  {
                      $this->NM_ajax_info['errList']['tipodocto31'] = array();
                  }
                  $this->NM_ajax_info['errList']['tipodocto31'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          } 
      } 
      if ($this->nmgp_opcao == "incluir")
      { 
          if (NM_utf8_strlen($this->tipodocto31) > 2) 
          { 
              $hasError = true;
              $Campos_Crit .= "Tipodocto 31 " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 2 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['tipodocto31']))
              {
                  $Campos_Erros['tipodocto31'] = array();
              }
              $Campos_Erros['tipodocto31'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 2 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['tipodocto31']) || !is_array($this->NM_ajax_info['errList']['tipodocto31']))
              {
                  $this->NM_ajax_info['errList']['tipodocto31'] = array();
              }
              $this->NM_ajax_info['errList']['tipodocto31'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 2 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'tipodocto31';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_tipodocto31

    function ValidateField_nofact31(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['php_cmp_required']['nofact31']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['php_cmp_required']['nofact31'] == "on")) 
      { 
          if ($this->nofact31 == "")  
          { 
              $hasError = true;
              $Campos_Falta[] =  "Nofact 31" ; 
              if (!isset($Campos_Erros['nofact31']))
              {
                  $Campos_Erros['nofact31'] = array();
              }
              $Campos_Erros['nofact31'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['nofact31']) || !is_array($this->NM_ajax_info['errList']['nofact31']))
                  {
                      $this->NM_ajax_info['errList']['nofact31'] = array();
                  }
                  $this->NM_ajax_info['errList']['nofact31'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          } 
      } 
      if ($this->nmgp_opcao == "incluir")
      { 
          if (NM_utf8_strlen($this->nofact31) > 20) 
          { 
              $hasError = true;
              $Campos_Crit .= "Nofact 31 " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['nofact31']))
              {
                  $Campos_Erros['nofact31'] = array();
              }
              $Campos_Erros['nofact31'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['nofact31']) || !is_array($this->NM_ajax_info['errList']['nofact31']))
              {
                  $this->NM_ajax_info['errList']['nofact31'] = array();
              }
              $this->NM_ajax_info['errList']['nofact31'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'nofact31';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_nofact31

    function ValidateField_nocte31(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['php_cmp_required']['nocte31']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['php_cmp_required']['nocte31'] == "on")) 
      { 
          if ($this->nocte31 == "")  
          { 
              $hasError = true;
              $Campos_Falta[] =  "Nocte 31" ; 
              if (!isset($Campos_Erros['nocte31']))
              {
                  $Campos_Erros['nocte31'] = array();
              }
              $Campos_Erros['nocte31'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['nocte31']) || !is_array($this->NM_ajax_info['errList']['nocte31']))
                  {
                      $this->NM_ajax_info['errList']['nocte31'] = array();
                  }
                  $this->NM_ajax_info['errList']['nocte31'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          } 
      } 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->nocte31) > 15) 
          { 
              $hasError = true;
              $Campos_Crit .= "Nocte 31 " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 15 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['nocte31']))
              {
                  $Campos_Erros['nocte31'] = array();
              }
              $Campos_Erros['nocte31'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 15 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['nocte31']) || !is_array($this->NM_ajax_info['errList']['nocte31']))
              {
                  $this->NM_ajax_info['errList']['nocte31'] = array();
              }
              $this->NM_ajax_info['errList']['nocte31'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 15 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'nocte31';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_nocte31

    function ValidateField_nomcte31(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->nomcte31) > 45) 
          { 
              $hasError = true;
              $Campos_Crit .= "Nomcte 31 " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 45 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['nomcte31']))
              {
                  $Campos_Erros['nomcte31'] = array();
              }
              $Campos_Erros['nomcte31'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 45 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['nomcte31']) || !is_array($this->NM_ajax_info['errList']['nomcte31']))
              {
                  $this->NM_ajax_info['errList']['nomcte31'] = array();
              }
              $this->NM_ajax_info['errList']['nomcte31'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 45 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'nomcte31';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_nomcte31

    function ValidateField_localid31(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->localid31) > 4) 
          { 
              $hasError = true;
              $Campos_Crit .= "Localid 31 " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 4 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['localid31']))
              {
                  $Campos_Erros['localid31'] = array();
              }
              $Campos_Erros['localid31'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 4 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['localid31']) || !is_array($this->NM_ajax_info['errList']['localid31']))
              {
                  $this->NM_ajax_info['errList']['localid31'] = array();
              }
              $this->NM_ajax_info['errList']['localid31'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 4 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'localid31';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_localid31

    function ValidateField_cvectenegro31(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->cvectenegro31) > 1) 
          { 
              $hasError = true;
              $Campos_Crit .= "Cvectenegro 31 " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 1 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['cvectenegro31']))
              {
                  $Campos_Erros['cvectenegro31'] = array();
              }
              $Campos_Erros['cvectenegro31'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 1 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['cvectenegro31']) || !is_array($this->NM_ajax_info['errList']['cvectenegro31']))
              {
                  $this->NM_ajax_info['errList']['cvectenegro31'] = array();
              }
              $this->NM_ajax_info['errList']['cvectenegro31'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 1 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'cvectenegro31';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_cvectenegro31

    function ValidateField_vtabta31(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao == "alterar")
      {
      if ($this->vtabta31 === "" || is_null($this->vtabta31))  
      { 
          $this->vtabta31 = 0;
          $this->sc_force_zero[] = 'vtabta31';
      } 
      }
      if (!empty($this->field_config['vtabta31']['symbol_dec']))
      {
          $this->sc_remove_currency($this->vtabta31, $this->field_config['vtabta31']['symbol_dec'], $this->field_config['vtabta31']['symbol_grp'], $this->field_config['vtabta31']['symbol_mon']); 
          nm_limpa_valor($this->vtabta31, $this->field_config['vtabta31']['symbol_dec'], $this->field_config['vtabta31']['symbol_grp']) ; 
          if ('.' == substr($this->vtabta31, 0, 1))
          {
              if ('' == str_replace('0', '', substr($this->vtabta31, 1)))
              {
                  $this->vtabta31 = '';
              }
              else
              {
                  $this->vtabta31 = '0' . $this->vtabta31;
              }
          }
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->vtabta31 != '')  
          { 
              $iTestSize = 19;
              if (strlen($this->vtabta31) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Vtabta 31: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['vtabta31']))
                  {
                      $Campos_Erros['vtabta31'] = array();
                  }
                  $Campos_Erros['vtabta31'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['vtabta31']) || !is_array($this->NM_ajax_info['errList']['vtabta31']))
                  {
                      $this->NM_ajax_info['errList']['vtabta31'] = array();
                  }
                  $this->NM_ajax_info['errList']['vtabta31'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->vtabta31, 16, 2, 0, 0, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Vtabta 31; " ; 
                  if (!isset($Campos_Erros['vtabta31']))
                  {
                      $Campos_Erros['vtabta31'] = array();
                  }
                  $Campos_Erros['vtabta31'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['vtabta31']) || !is_array($this->NM_ajax_info['errList']['vtabta31']))
                  {
                      $this->NM_ajax_info['errList']['vtabta31'] = array();
                  }
                  $this->NM_ajax_info['errList']['vtabta31'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'vtabta31';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_vtabta31

    function ValidateField_descto31(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao == "alterar")
      {
      if ($this->descto31 === "" || is_null($this->descto31))  
      { 
          $this->descto31 = 0;
          $this->sc_force_zero[] = 'descto31';
      } 
      }
      if (!empty($this->field_config['descto31']['symbol_dec']))
      {
          $this->sc_remove_currency($this->descto31, $this->field_config['descto31']['symbol_dec'], $this->field_config['descto31']['symbol_grp'], $this->field_config['descto31']['symbol_mon']); 
          nm_limpa_valor($this->descto31, $this->field_config['descto31']['symbol_dec'], $this->field_config['descto31']['symbol_grp']) ; 
          if ('.' == substr($this->descto31, 0, 1))
          {
              if ('' == str_replace('0', '', substr($this->descto31, 1)))
              {
                  $this->descto31 = '';
              }
              else
              {
                  $this->descto31 = '0' . $this->descto31;
              }
          }
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->descto31 != '')  
          { 
              $iTestSize = 19;
              if (strlen($this->descto31) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Descto 31: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['descto31']))
                  {
                      $Campos_Erros['descto31'] = array();
                  }
                  $Campos_Erros['descto31'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['descto31']) || !is_array($this->NM_ajax_info['errList']['descto31']))
                  {
                      $this->NM_ajax_info['errList']['descto31'] = array();
                  }
                  $this->NM_ajax_info['errList']['descto31'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->descto31, 16, 2, 0, 0, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Descto 31; " ; 
                  if (!isset($Campos_Erros['descto31']))
                  {
                      $Campos_Erros['descto31'] = array();
                  }
                  $Campos_Erros['descto31'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['descto31']) || !is_array($this->NM_ajax_info['errList']['descto31']))
                  {
                      $this->NM_ajax_info['errList']['descto31'] = array();
                  }
                  $this->NM_ajax_info['errList']['descto31'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'descto31';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_descto31

    function ValidateField_flete31(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao == "alterar")
      {
      if ($this->flete31 === "" || is_null($this->flete31))  
      { 
          $this->flete31 = 0;
          $this->sc_force_zero[] = 'flete31';
      } 
      }
      if (!empty($this->field_config['flete31']['symbol_dec']))
      {
          $this->sc_remove_currency($this->flete31, $this->field_config['flete31']['symbol_dec'], $this->field_config['flete31']['symbol_grp'], $this->field_config['flete31']['symbol_mon']); 
          nm_limpa_valor($this->flete31, $this->field_config['flete31']['symbol_dec'], $this->field_config['flete31']['symbol_grp']) ; 
          if ('.' == substr($this->flete31, 0, 1))
          {
              if ('' == str_replace('0', '', substr($this->flete31, 1)))
              {
                  $this->flete31 = '';
              }
              else
              {
                  $this->flete31 = '0' . $this->flete31;
              }
          }
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->flete31 != '')  
          { 
              $iTestSize = 19;
              if (strlen($this->flete31) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Flete 31: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['flete31']))
                  {
                      $Campos_Erros['flete31'] = array();
                  }
                  $Campos_Erros['flete31'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['flete31']) || !is_array($this->NM_ajax_info['errList']['flete31']))
                  {
                      $this->NM_ajax_info['errList']['flete31'] = array();
                  }
                  $this->NM_ajax_info['errList']['flete31'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->flete31, 16, 2, 0, 0, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Flete 31; " ; 
                  if (!isset($Campos_Erros['flete31']))
                  {
                      $Campos_Erros['flete31'] = array();
                  }
                  $Campos_Erros['flete31'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['flete31']) || !is_array($this->NM_ajax_info['errList']['flete31']))
                  {
                      $this->NM_ajax_info['errList']['flete31'] = array();
                  }
                  $this->NM_ajax_info['errList']['flete31'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'flete31';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_flete31

    function ValidateField_itm31(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao == "alterar")
      {
      if ($this->itm31 === "" || is_null($this->itm31))  
      { 
          $this->itm31 = 0;
          $this->sc_force_zero[] = 'itm31';
      } 
      }
      if (!empty($this->field_config['itm31']['symbol_dec']))
      {
          $this->sc_remove_currency($this->itm31, $this->field_config['itm31']['symbol_dec'], $this->field_config['itm31']['symbol_grp'], $this->field_config['itm31']['symbol_mon']); 
          nm_limpa_valor($this->itm31, $this->field_config['itm31']['symbol_dec'], $this->field_config['itm31']['symbol_grp']) ; 
          if ('.' == substr($this->itm31, 0, 1))
          {
              if ('' == str_replace('0', '', substr($this->itm31, 1)))
              {
                  $this->itm31 = '';
              }
              else
              {
                  $this->itm31 = '0' . $this->itm31;
              }
          }
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->itm31 != '')  
          { 
              $iTestSize = 6;
              if (strlen($this->itm31) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Itm 31: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['itm31']))
                  {
                      $Campos_Erros['itm31'] = array();
                  }
                  $Campos_Erros['itm31'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['itm31']) || !is_array($this->NM_ajax_info['errList']['itm31']))
                  {
                      $this->NM_ajax_info['errList']['itm31'] = array();
                  }
                  $this->NM_ajax_info['errList']['itm31'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->itm31, 3, 2, 0, 0, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Itm 31; " ; 
                  if (!isset($Campos_Erros['itm31']))
                  {
                      $Campos_Erros['itm31'] = array();
                  }
                  $Campos_Erros['itm31'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['itm31']) || !is_array($this->NM_ajax_info['errList']['itm31']))
                  {
                      $this->NM_ajax_info['errList']['itm31'] = array();
                  }
                  $this->NM_ajax_info['errList']['itm31'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'itm31';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_itm31

    function ValidateField_novend31(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->novend31) > 4) 
          { 
              $hasError = true;
              $Campos_Crit .= "Novend 31 " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 4 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['novend31']))
              {
                  $Campos_Erros['novend31'] = array();
              }
              $Campos_Erros['novend31'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 4 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['novend31']) || !is_array($this->NM_ajax_info['errList']['novend31']))
              {
                  $this->NM_ajax_info['errList']['novend31'] = array();
              }
              $this->NM_ajax_info['errList']['novend31'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 4 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'novend31';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_novend31

    function ValidateField_fecfact31(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      nm_limpa_data($this->fecfact31, $this->field_config['fecfact31']['date_sep']) ; 
      $trab_dt_min = ""; 
      $trab_dt_max = ""; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          $guarda_datahora = $this->field_config['fecfact31']['date_format']; 
          if (false !== strpos($guarda_datahora, ';')) $this->field_config['fecfact31']['date_format'] = substr($guarda_datahora, 0, strpos($guarda_datahora, ';'));
          $Format_Data = $this->field_config['fecfact31']['date_format']; 
          nm_limpa_data($Format_Data, $this->field_config['fecfact31']['date_sep']) ; 
          if (trim($this->fecfact31) != "")  
          { 
              if ($teste_validade->Data($this->fecfact31, $Format_Data, $trab_dt_min, $trab_dt_max) == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Fecfact 31; " ; 
                  if (!isset($Campos_Erros['fecfact31']))
                  {
                      $Campos_Erros['fecfact31'] = array();
                  }
                  $Campos_Erros['fecfact31'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['fecfact31']) || !is_array($this->NM_ajax_info['errList']['fecfact31']))
                  {
                      $this->NM_ajax_info['errList']['fecfact31'] = array();
                  }
                  $this->NM_ajax_info['errList']['fecfact31'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
          $this->field_config['fecfact31']['date_format'] = $guarda_datahora; 
       } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'fecfact31';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
      nm_limpa_hora($this->fecfact31_hora, $this->field_config['fecfact31_hora']['time_sep']) ; 
      if ($this->nmgp_opcao != "excluir") 
      {
          $Format_Hora = $this->field_config['fecfact31_hora']['date_format']; 
          nm_limpa_hora($Format_Hora, $this->field_config['fecfact31_hora']['time_sep']) ; 
          if (trim($this->fecfact31_hora) != "")  
          { 
              if ($teste_validade->Hora($this->fecfact31_hora, $Format_Hora) == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Fecfact 31; " ; 
                  if (!isset($Campos_Erros['fecfact31_hora']))
                  {
                      $Campos_Erros['fecfact31_hora'] = array();
                  }
                  $Campos_Erros['fecfact31_hora'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['fecfact31']) || !is_array($this->NM_ajax_info['errList']['fecfact31']))
                  {
                      $this->NM_ajax_info['errList']['fecfact31'] = array();
                  }
                  $this->NM_ajax_info['errList']['fecfact31'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
      if (isset($Campos_Erros['fecfact31']) && isset($Campos_Erros['fecfact31_hora']))
      {
          $this->removeDuplicateDttmError($Campos_Erros['fecfact31'], $Campos_Erros['fecfact31_hora']);
          if (empty($Campos_Erros['fecfact31_hora']))
          {
              unset($Campos_Erros['fecfact31_hora']);
          }
          if (isset($this->NM_ajax_info['errList']['fecfact31']))
          {
              $this->NM_ajax_info['errList']['fecfact31'] = array_unique($this->NM_ajax_info['errList']['fecfact31']);
          }
      }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'fecfact31_hora';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_fecfact31_hora

    function ValidateField_condpag31(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->condpag31) > 255) 
          { 
              $hasError = true;
              $Campos_Crit .= "Condpag 31 " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 255 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['condpag31']))
              {
                  $Campos_Erros['condpag31'] = array();
              }
              $Campos_Erros['condpag31'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 255 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['condpag31']) || !is_array($this->NM_ajax_info['errList']['condpag31']))
              {
                  $this->NM_ajax_info['errList']['condpag31'] = array();
              }
              $this->NM_ajax_info['errList']['condpag31'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 255 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'condpag31';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_condpag31

    function ValidateField_nopagos31(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->nopagos31) > 255) 
          { 
              $hasError = true;
              $Campos_Crit .= "Nopagos 31 " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 255 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['nopagos31']))
              {
                  $Campos_Erros['nopagos31'] = array();
              }
              $Campos_Erros['nopagos31'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 255 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['nopagos31']) || !is_array($this->NM_ajax_info['errList']['nopagos31']))
              {
                  $this->NM_ajax_info['errList']['nopagos31'] = array();
              }
              $this->NM_ajax_info['errList']['nopagos31'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 255 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'nopagos31';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_nopagos31

    function ValidateField_formapago31(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->formapago31) > 255) 
          { 
              $hasError = true;
              $Campos_Crit .= "Formapago 31 " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 255 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['formapago31']))
              {
                  $Campos_Erros['formapago31'] = array();
              }
              $Campos_Erros['formapago31'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 255 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['formapago31']) || !is_array($this->NM_ajax_info['errList']['formapago31']))
              {
                  $this->NM_ajax_info['errList']['formapago31'] = array();
              }
              $this->NM_ajax_info['errList']['formapago31'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 255 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'formapago31';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_formapago31

    function ValidateField_obra31(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->obra31) > 30) 
          { 
              $hasError = true;
              $Campos_Crit .= "Obra 31 " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 30 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['obra31']))
              {
                  $Campos_Erros['obra31'] = array();
              }
              $Campos_Erros['obra31'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 30 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['obra31']) || !is_array($this->NM_ajax_info['errList']['obra31']))
              {
                  $this->NM_ajax_info['errList']['obra31'] = array();
              }
              $this->NM_ajax_info['errList']['obra31'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 30 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'obra31';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_obra31

    function ValidateField_orden31(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->orden31) > 30) 
          { 
              $hasError = true;
              $Campos_Crit .= "Orden 31 " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 30 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['orden31']))
              {
                  $Campos_Erros['orden31'] = array();
              }
              $Campos_Erros['orden31'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 30 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['orden31']) || !is_array($this->NM_ajax_info['errList']['orden31']))
              {
                  $this->NM_ajax_info['errList']['orden31'] = array();
              }
              $this->NM_ajax_info['errList']['orden31'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 30 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'orden31';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_orden31

    function ValidateField_cvnegra31(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->cvnegra31) > 255) 
          { 
              $hasError = true;
              $Campos_Crit .= "Cvnegra 31 " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 255 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['cvnegra31']))
              {
                  $Campos_Erros['cvnegra31'] = array();
              }
              $Campos_Erros['cvnegra31'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 255 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['cvnegra31']) || !is_array($this->NM_ajax_info['errList']['cvnegra31']))
              {
                  $this->NM_ajax_info['errList']['cvnegra31'] = array();
              }
              $this->NM_ajax_info['errList']['cvnegra31'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 255 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'cvnegra31';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_cvnegra31

    function ValidateField_status31(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->status31) > 255) 
          { 
              $hasError = true;
              $Campos_Crit .= "Status 31 " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 255 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['status31']))
              {
                  $Campos_Erros['status31'] = array();
              }
              $Campos_Erros['status31'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 255 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['status31']) || !is_array($this->NM_ajax_info['errList']['status31']))
              {
                  $this->NM_ajax_info['errList']['status31'] = array();
              }
              $this->NM_ajax_info['errList']['status31'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 255 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'status31';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_status31

    function ValidateField_cvimpto31(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->cvimpto31) > 255) 
          { 
              $hasError = true;
              $Campos_Crit .= "Cvimpto 31 " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 255 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['cvimpto31']))
              {
                  $Campos_Erros['cvimpto31'] = array();
              }
              $Campos_Erros['cvimpto31'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 255 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['cvimpto31']) || !is_array($this->NM_ajax_info['errList']['cvimpto31']))
              {
                  $this->NM_ajax_info['errList']['cvimpto31'] = array();
              }
              $this->NM_ajax_info['errList']['cvimpto31'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 255 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'cvimpto31';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_cvimpto31

    function ValidateField_cvanulado31(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->cvanulado31) > 255) 
          { 
              $hasError = true;
              $Campos_Crit .= "Cvanulado 31 " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 255 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['cvanulado31']))
              {
                  $Campos_Erros['cvanulado31'] = array();
              }
              $Campos_Erros['cvanulado31'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 255 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['cvanulado31']) || !is_array($this->NM_ajax_info['errList']['cvanulado31']))
              {
                  $this->NM_ajax_info['errList']['cvanulado31'] = array();
              }
              $this->NM_ajax_info['errList']['cvanulado31'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 255 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'cvanulado31';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_cvanulado31

    function ValidateField_efectivo31(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao == "alterar")
      {
      if ($this->efectivo31 === "" || is_null($this->efectivo31))  
      { 
          $this->efectivo31 = 0;
          $this->sc_force_zero[] = 'efectivo31';
      } 
      }
      if (!empty($this->field_config['efectivo31']['symbol_dec']))
      {
          $this->sc_remove_currency($this->efectivo31, $this->field_config['efectivo31']['symbol_dec'], $this->field_config['efectivo31']['symbol_grp'], $this->field_config['efectivo31']['symbol_mon']); 
          nm_limpa_valor($this->efectivo31, $this->field_config['efectivo31']['symbol_dec'], $this->field_config['efectivo31']['symbol_grp']) ; 
          if ('.' == substr($this->efectivo31, 0, 1))
          {
              if ('' == str_replace('0', '', substr($this->efectivo31, 1)))
              {
                  $this->efectivo31 = '';
              }
              else
              {
                  $this->efectivo31 = '0' . $this->efectivo31;
              }
          }
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->efectivo31 != '')  
          { 
              $iTestSize = 19;
              if (strlen($this->efectivo31) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Efectivo 31: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['efectivo31']))
                  {
                      $Campos_Erros['efectivo31'] = array();
                  }
                  $Campos_Erros['efectivo31'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['efectivo31']) || !is_array($this->NM_ajax_info['errList']['efectivo31']))
                  {
                      $this->NM_ajax_info['errList']['efectivo31'] = array();
                  }
                  $this->NM_ajax_info['errList']['efectivo31'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->efectivo31, 16, 2, 0, 0, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Efectivo 31; " ; 
                  if (!isset($Campos_Erros['efectivo31']))
                  {
                      $Campos_Erros['efectivo31'] = array();
                  }
                  $Campos_Erros['efectivo31'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['efectivo31']) || !is_array($this->NM_ajax_info['errList']['efectivo31']))
                  {
                      $this->NM_ajax_info['errList']['efectivo31'] = array();
                  }
                  $this->NM_ajax_info['errList']['efectivo31'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'efectivo31';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_efectivo31

    function ValidateField_cheque31(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao == "alterar")
      {
      if ($this->cheque31 === "" || is_null($this->cheque31))  
      { 
          $this->cheque31 = 0;
          $this->sc_force_zero[] = 'cheque31';
      } 
      }
      if (!empty($this->field_config['cheque31']['symbol_dec']))
      {
          $this->sc_remove_currency($this->cheque31, $this->field_config['cheque31']['symbol_dec'], $this->field_config['cheque31']['symbol_grp'], $this->field_config['cheque31']['symbol_mon']); 
          nm_limpa_valor($this->cheque31, $this->field_config['cheque31']['symbol_dec'], $this->field_config['cheque31']['symbol_grp']) ; 
          if ('.' == substr($this->cheque31, 0, 1))
          {
              if ('' == str_replace('0', '', substr($this->cheque31, 1)))
              {
                  $this->cheque31 = '';
              }
              else
              {
                  $this->cheque31 = '0' . $this->cheque31;
              }
          }
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->cheque31 != '')  
          { 
              $iTestSize = 19;
              if (strlen($this->cheque31) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Cheque 31: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['cheque31']))
                  {
                      $Campos_Erros['cheque31'] = array();
                  }
                  $Campos_Erros['cheque31'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['cheque31']) || !is_array($this->NM_ajax_info['errList']['cheque31']))
                  {
                      $this->NM_ajax_info['errList']['cheque31'] = array();
                  }
                  $this->NM_ajax_info['errList']['cheque31'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->cheque31, 16, 2, 0, 0, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Cheque 31; " ; 
                  if (!isset($Campos_Erros['cheque31']))
                  {
                      $Campos_Erros['cheque31'] = array();
                  }
                  $Campos_Erros['cheque31'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['cheque31']) || !is_array($this->NM_ajax_info['errList']['cheque31']))
                  {
                      $this->NM_ajax_info['errList']['cheque31'] = array();
                  }
                  $this->NM_ajax_info['errList']['cheque31'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'cheque31';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_cheque31

    function ValidateField_tarjeta31(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao == "alterar")
      {
      if ($this->tarjeta31 === "" || is_null($this->tarjeta31))  
      { 
          $this->tarjeta31 = 0;
          $this->sc_force_zero[] = 'tarjeta31';
      } 
      }
      if (!empty($this->field_config['tarjeta31']['symbol_dec']))
      {
          $this->sc_remove_currency($this->tarjeta31, $this->field_config['tarjeta31']['symbol_dec'], $this->field_config['tarjeta31']['symbol_grp'], $this->field_config['tarjeta31']['symbol_mon']); 
          nm_limpa_valor($this->tarjeta31, $this->field_config['tarjeta31']['symbol_dec'], $this->field_config['tarjeta31']['symbol_grp']) ; 
          if ('.' == substr($this->tarjeta31, 0, 1))
          {
              if ('' == str_replace('0', '', substr($this->tarjeta31, 1)))
              {
                  $this->tarjeta31 = '';
              }
              else
              {
                  $this->tarjeta31 = '0' . $this->tarjeta31;
              }
          }
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->tarjeta31 != '')  
          { 
              $iTestSize = 19;
              if (strlen($this->tarjeta31) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Tarjeta 31: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['tarjeta31']))
                  {
                      $Campos_Erros['tarjeta31'] = array();
                  }
                  $Campos_Erros['tarjeta31'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['tarjeta31']) || !is_array($this->NM_ajax_info['errList']['tarjeta31']))
                  {
                      $this->NM_ajax_info['errList']['tarjeta31'] = array();
                  }
                  $this->NM_ajax_info['errList']['tarjeta31'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->tarjeta31, 16, 2, 0, 0, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Tarjeta 31; " ; 
                  if (!isset($Campos_Erros['tarjeta31']))
                  {
                      $Campos_Erros['tarjeta31'] = array();
                  }
                  $Campos_Erros['tarjeta31'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['tarjeta31']) || !is_array($this->NM_ajax_info['errList']['tarjeta31']))
                  {
                      $this->NM_ajax_info['errList']['tarjeta31'] = array();
                  }
                  $this->NM_ajax_info['errList']['tarjeta31'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'tarjeta31';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_tarjeta31

    function ValidateField_acuenta31(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao == "alterar")
      {
      if ($this->acuenta31 === "" || is_null($this->acuenta31))  
      { 
          $this->acuenta31 = 0;
          $this->sc_force_zero[] = 'acuenta31';
      } 
      }
      if (!empty($this->field_config['acuenta31']['symbol_dec']))
      {
          $this->sc_remove_currency($this->acuenta31, $this->field_config['acuenta31']['symbol_dec'], $this->field_config['acuenta31']['symbol_grp'], $this->field_config['acuenta31']['symbol_mon']); 
          nm_limpa_valor($this->acuenta31, $this->field_config['acuenta31']['symbol_dec'], $this->field_config['acuenta31']['symbol_grp']) ; 
          if ('.' == substr($this->acuenta31, 0, 1))
          {
              if ('' == str_replace('0', '', substr($this->acuenta31, 1)))
              {
                  $this->acuenta31 = '';
              }
              else
              {
                  $this->acuenta31 = '0' . $this->acuenta31;
              }
          }
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->acuenta31 != '')  
          { 
              $iTestSize = 19;
              if (strlen($this->acuenta31) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Acuenta 31: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['acuenta31']))
                  {
                      $Campos_Erros['acuenta31'] = array();
                  }
                  $Campos_Erros['acuenta31'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['acuenta31']) || !is_array($this->NM_ajax_info['errList']['acuenta31']))
                  {
                      $this->NM_ajax_info['errList']['acuenta31'] = array();
                  }
                  $this->NM_ajax_info['errList']['acuenta31'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->acuenta31, 16, 2, 0, 0, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Acuenta 31; " ; 
                  if (!isset($Campos_Erros['acuenta31']))
                  {
                      $Campos_Erros['acuenta31'] = array();
                  }
                  $Campos_Erros['acuenta31'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['acuenta31']) || !is_array($this->NM_ajax_info['errList']['acuenta31']))
                  {
                      $this->NM_ajax_info['errList']['acuenta31'] = array();
                  }
                  $this->NM_ajax_info['errList']['acuenta31'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'acuenta31';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_acuenta31

    function ValidateField_nobanco31(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->nobanco31) > 3) 
          { 
              $hasError = true;
              $Campos_Crit .= "Nobanco 31 " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 3 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['nobanco31']))
              {
                  $Campos_Erros['nobanco31'] = array();
              }
              $Campos_Erros['nobanco31'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 3 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['nobanco31']) || !is_array($this->NM_ajax_info['errList']['nobanco31']))
              {
                  $this->NM_ajax_info['errList']['nobanco31'] = array();
              }
              $this->NM_ajax_info['errList']['nobanco31'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 3 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'nobanco31';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_nobanco31

    function ValidateField_nombanco31(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->nombanco31) > 40) 
          { 
              $hasError = true;
              $Campos_Crit .= "Nombanco 31 " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 40 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['nombanco31']))
              {
                  $Campos_Erros['nombanco31'] = array();
              }
              $Campos_Erros['nombanco31'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 40 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['nombanco31']) || !is_array($this->NM_ajax_info['errList']['nombanco31']))
              {
                  $this->NM_ajax_info['errList']['nombanco31'] = array();
              }
              $this->NM_ajax_info['errList']['nombanco31'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 40 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'nombanco31';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_nombanco31

    function ValidateField_nocheque31(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->nocheque31) > 10) 
          { 
              $hasError = true;
              $Campos_Crit .= "Nocheque 31 " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 10 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['nocheque31']))
              {
                  $Campos_Erros['nocheque31'] = array();
              }
              $Campos_Erros['nocheque31'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 10 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['nocheque31']) || !is_array($this->NM_ajax_info['errList']['nocheque31']))
              {
                  $this->NM_ajax_info['errList']['nocheque31'] = array();
              }
              $this->NM_ajax_info['errList']['nocheque31'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 10 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'nocheque31';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_nocheque31

    function ValidateField_notarjeta31(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->notarjeta31) > 20) 
          { 
              $hasError = true;
              $Campos_Crit .= "Notarjeta 31 " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['notarjeta31']))
              {
                  $Campos_Erros['notarjeta31'] = array();
              }
              $Campos_Erros['notarjeta31'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['notarjeta31']) || !is_array($this->NM_ajax_info['errList']['notarjeta31']))
              {
                  $this->NM_ajax_info['errList']['notarjeta31'] = array();
              }
              $this->NM_ajax_info['errList']['notarjeta31'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'notarjeta31';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_notarjeta31

    function ValidateField_nomtarjeta31(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->nomtarjeta31) > 40) 
          { 
              $hasError = true;
              $Campos_Crit .= "Nomtarjeta 31 " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 40 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['nomtarjeta31']))
              {
                  $Campos_Erros['nomtarjeta31'] = array();
              }
              $Campos_Erros['nomtarjeta31'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 40 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['nomtarjeta31']) || !is_array($this->NM_ajax_info['errList']['nomtarjeta31']))
              {
                  $this->NM_ajax_info['errList']['nomtarjeta31'] = array();
              }
              $this->NM_ajax_info['errList']['nomtarjeta31'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 40 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'nomtarjeta31';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_nomtarjeta31

    function ValidateField_cvdivisa31(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->cvdivisa31) > 1) 
          { 
              $hasError = true;
              $Campos_Crit .= "Cvdivisa 31 " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 1 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['cvdivisa31']))
              {
                  $Campos_Erros['cvdivisa31'] = array();
              }
              $Campos_Erros['cvdivisa31'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 1 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['cvdivisa31']) || !is_array($this->NM_ajax_info['errList']['cvdivisa31']))
              {
                  $this->NM_ajax_info['errList']['cvdivisa31'] = array();
              }
              $this->NM_ajax_info['errList']['cvdivisa31'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 1 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'cvdivisa31';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_cvdivisa31

    function ValidateField_valdivisa31(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->valdivisa31) > 6) 
          { 
              $hasError = true;
              $Campos_Crit .= "Valdivisa 31 " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 6 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['valdivisa31']))
              {
                  $Campos_Erros['valdivisa31'] = array();
              }
              $Campos_Erros['valdivisa31'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 6 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['valdivisa31']) || !is_array($this->NM_ajax_info['errList']['valdivisa31']))
              {
                  $this->NM_ajax_info['errList']['valdivisa31'] = array();
              }
              $this->NM_ajax_info['errList']['valdivisa31'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 6 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'valdivisa31';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_valdivisa31

    function ValidateField_lineaprod31(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->lineaprod31) > 255) 
          { 
              $hasError = true;
              $Campos_Crit .= "Lineaprod 31 " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 255 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['lineaprod31']))
              {
                  $Campos_Erros['lineaprod31'] = array();
              }
              $Campos_Erros['lineaprod31'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 255 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['lineaprod31']) || !is_array($this->NM_ajax_info['errList']['lineaprod31']))
              {
                  $this->NM_ajax_info['errList']['lineaprod31'] = array();
              }
              $this->NM_ajax_info['errList']['lineaprod31'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 255 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'lineaprod31';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_lineaprod31

    function ValidateField_intereses31(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao == "alterar")
      {
      if ($this->intereses31 === "" || is_null($this->intereses31))  
      { 
          $this->intereses31 = 0;
          $this->sc_force_zero[] = 'intereses31';
      } 
      }
      if (!empty($this->field_config['intereses31']['symbol_dec']))
      {
          $this->sc_remove_currency($this->intereses31, $this->field_config['intereses31']['symbol_dec'], $this->field_config['intereses31']['symbol_grp'], $this->field_config['intereses31']['symbol_mon']); 
          nm_limpa_valor($this->intereses31, $this->field_config['intereses31']['symbol_dec'], $this->field_config['intereses31']['symbol_grp']) ; 
          if ('.' == substr($this->intereses31, 0, 1))
          {
              if ('' == str_replace('0', '', substr($this->intereses31, 1)))
              {
                  $this->intereses31 = '';
              }
              else
              {
                  $this->intereses31 = '0' . $this->intereses31;
              }
          }
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->intereses31 != '')  
          { 
              $iTestSize = 19;
              if (strlen($this->intereses31) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Intereses 31: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['intereses31']))
                  {
                      $Campos_Erros['intereses31'] = array();
                  }
                  $Campos_Erros['intereses31'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['intereses31']) || !is_array($this->NM_ajax_info['errList']['intereses31']))
                  {
                      $this->NM_ajax_info['errList']['intereses31'] = array();
                  }
                  $this->NM_ajax_info['errList']['intereses31'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->intereses31, 16, 2, 0, 0, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Intereses 31; " ; 
                  if (!isset($Campos_Erros['intereses31']))
                  {
                      $Campos_Erros['intereses31'] = array();
                  }
                  $Campos_Erros['intereses31'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['intereses31']) || !is_array($this->NM_ajax_info['errList']['intereses31']))
                  {
                      $this->NM_ajax_info['errList']['intereses31'] = array();
                  }
                  $this->NM_ajax_info['errList']['intereses31'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'intereses31';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_intereses31

    function ValidateField_nopedido31(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->nopedido31) > 20) 
          { 
              $hasError = true;
              $Campos_Crit .= "Nopedido 31 " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['nopedido31']))
              {
                  $Campos_Erros['nopedido31'] = array();
              }
              $Campos_Erros['nopedido31'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['nopedido31']) || !is_array($this->NM_ajax_info['errList']['nopedido31']))
              {
                  $this->NM_ajax_info['errList']['nopedido31'] = array();
              }
              $this->NM_ajax_info['errList']['nopedido31'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'nopedido31';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_nopedido31

    function ValidateField_fecped31(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      nm_limpa_data($this->fecped31, $this->field_config['fecped31']['date_sep']) ; 
      $trab_dt_min = ""; 
      $trab_dt_max = ""; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          $guarda_datahora = $this->field_config['fecped31']['date_format']; 
          if (false !== strpos($guarda_datahora, ';')) $this->field_config['fecped31']['date_format'] = substr($guarda_datahora, 0, strpos($guarda_datahora, ';'));
          $Format_Data = $this->field_config['fecped31']['date_format']; 
          nm_limpa_data($Format_Data, $this->field_config['fecped31']['date_sep']) ; 
          if (trim($this->fecped31) != "")  
          { 
              if ($teste_validade->Data($this->fecped31, $Format_Data, $trab_dt_min, $trab_dt_max) == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Fecped 31; " ; 
                  if (!isset($Campos_Erros['fecped31']))
                  {
                      $Campos_Erros['fecped31'] = array();
                  }
                  $Campos_Erros['fecped31'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['fecped31']) || !is_array($this->NM_ajax_info['errList']['fecped31']))
                  {
                      $this->NM_ajax_info['errList']['fecped31'] = array();
                  }
                  $this->NM_ajax_info['errList']['fecped31'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
          $this->field_config['fecped31']['date_format'] = $guarda_datahora; 
       } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'fecped31';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
      nm_limpa_hora($this->fecped31_hora, $this->field_config['fecped31_hora']['time_sep']) ; 
      if ($this->nmgp_opcao != "excluir") 
      {
          $Format_Hora = $this->field_config['fecped31_hora']['date_format']; 
          nm_limpa_hora($Format_Hora, $this->field_config['fecped31_hora']['time_sep']) ; 
          if (trim($this->fecped31_hora) != "")  
          { 
              if ($teste_validade->Hora($this->fecped31_hora, $Format_Hora) == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Fecped 31; " ; 
                  if (!isset($Campos_Erros['fecped31_hora']))
                  {
                      $Campos_Erros['fecped31_hora'] = array();
                  }
                  $Campos_Erros['fecped31_hora'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['fecped31']) || !is_array($this->NM_ajax_info['errList']['fecped31']))
                  {
                      $this->NM_ajax_info['errList']['fecped31'] = array();
                  }
                  $this->NM_ajax_info['errList']['fecped31'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
      if (isset($Campos_Erros['fecped31']) && isset($Campos_Erros['fecped31_hora']))
      {
          $this->removeDuplicateDttmError($Campos_Erros['fecped31'], $Campos_Erros['fecped31_hora']);
          if (empty($Campos_Erros['fecped31_hora']))
          {
              unset($Campos_Erros['fecped31_hora']);
          }
          if (isset($this->NM_ajax_info['errList']['fecped31']))
          {
              $this->NM_ajax_info['errList']['fecped31'] = array_unique($this->NM_ajax_info['errList']['fecped31']);
          }
      }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'fecped31_hora';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_fecped31_hora

    function ValidateField_ruc31(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->ruc31) > 15) 
          { 
              $hasError = true;
              $Campos_Crit .= "Ruc 31 " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 15 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['ruc31']))
              {
                  $Campos_Erros['ruc31'] = array();
              }
              $Campos_Erros['ruc31'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 15 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['ruc31']) || !is_array($this->NM_ajax_info['errList']['ruc31']))
              {
                  $this->NM_ajax_info['errList']['ruc31'] = array();
              }
              $this->NM_ajax_info['errList']['ruc31'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 15 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'ruc31';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_ruc31

    function ValidateField_tel31(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->tel31) > 11) 
          { 
              $hasError = true;
              $Campos_Crit .= "Tel 31 " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 11 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['tel31']))
              {
                  $Campos_Erros['tel31'] = array();
              }
              $Campos_Erros['tel31'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 11 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['tel31']) || !is_array($this->NM_ajax_info['errList']['tel31']))
              {
                  $this->NM_ajax_info['errList']['tel31'] = array();
              }
              $this->NM_ajax_info['errList']['tel31'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 11 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'tel31';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_tel31

    function ValidateField_transpor31(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->transpor31) > 4) 
          { 
              $hasError = true;
              $Campos_Crit .= "Transpor 31 " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 4 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['transpor31']))
              {
                  $Campos_Erros['transpor31'] = array();
              }
              $Campos_Erros['transpor31'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 4 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['transpor31']) || !is_array($this->NM_ajax_info['errList']['transpor31']))
              {
                  $this->NM_ajax_info['errList']['transpor31'] = array();
              }
              $this->NM_ajax_info['errList']['transpor31'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 4 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'transpor31';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_transpor31

    function ValidateField_cvtransfer31(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->cvtransfer31) > 1) 
          { 
              $hasError = true;
              $Campos_Crit .= "Cvtransfer 31 " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 1 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['cvtransfer31']))
              {
                  $Campos_Erros['cvtransfer31'] = array();
              }
              $Campos_Erros['cvtransfer31'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 1 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['cvtransfer31']) || !is_array($this->NM_ajax_info['errList']['cvtransfer31']))
              {
                  $this->NM_ajax_info['errList']['cvtransfer31'] = array();
              }
              $this->NM_ajax_info['errList']['cvtransfer31'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 1 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'cvtransfer31';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_cvtransfer31

    function ValidateField_fectrasfer31(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      nm_limpa_data($this->fectrasfer31, $this->field_config['fectrasfer31']['date_sep']) ; 
      $trab_dt_min = ""; 
      $trab_dt_max = ""; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          $guarda_datahora = $this->field_config['fectrasfer31']['date_format']; 
          if (false !== strpos($guarda_datahora, ';')) $this->field_config['fectrasfer31']['date_format'] = substr($guarda_datahora, 0, strpos($guarda_datahora, ';'));
          $Format_Data = $this->field_config['fectrasfer31']['date_format']; 
          nm_limpa_data($Format_Data, $this->field_config['fectrasfer31']['date_sep']) ; 
          if (trim($this->fectrasfer31) != "")  
          { 
              if ($teste_validade->Data($this->fectrasfer31, $Format_Data, $trab_dt_min, $trab_dt_max) == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Fectrasfer 31; " ; 
                  if (!isset($Campos_Erros['fectrasfer31']))
                  {
                      $Campos_Erros['fectrasfer31'] = array();
                  }
                  $Campos_Erros['fectrasfer31'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['fectrasfer31']) || !is_array($this->NM_ajax_info['errList']['fectrasfer31']))
                  {
                      $this->NM_ajax_info['errList']['fectrasfer31'] = array();
                  }
                  $this->NM_ajax_info['errList']['fectrasfer31'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
          $this->field_config['fectrasfer31']['date_format'] = $guarda_datahora; 
       } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'fectrasfer31';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_fectrasfer31

    function ValidateField_desctofp31(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->desctofp31 === "" || is_null($this->desctofp31))  
      { 
          $this->desctofp31 = 0;
          $this->sc_force_zero[] = 'desctofp31';
      } 
      if (!empty($this->field_config['desctofp31']['symbol_dec']))
      {
          $this->sc_remove_currency($this->desctofp31, $this->field_config['desctofp31']['symbol_dec'], $this->field_config['desctofp31']['symbol_grp'], $this->field_config['desctofp31']['symbol_mon']); 
          nm_limpa_valor($this->desctofp31, $this->field_config['desctofp31']['symbol_dec'], $this->field_config['desctofp31']['symbol_grp']) ; 
          if ('.' == substr($this->desctofp31, 0, 1))
          {
              if ('' == str_replace('0', '', substr($this->desctofp31, 1)))
              {
                  $this->desctofp31 = '';
              }
              else
              {
                  $this->desctofp31 = '0' . $this->desctofp31;
              }
          }
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->desctofp31 != '')  
          { 
              $iTestSize = 19;
              if (strlen($this->desctofp31) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Desctofp 31: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['desctofp31']))
                  {
                      $Campos_Erros['desctofp31'] = array();
                  }
                  $Campos_Erros['desctofp31'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['desctofp31']) || !is_array($this->NM_ajax_info['errList']['desctofp31']))
                  {
                      $this->NM_ajax_info['errList']['desctofp31'] = array();
                  }
                  $this->NM_ajax_info['errList']['desctofp31'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->desctofp31, 16, 2, 0, 0, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Desctofp 31; " ; 
                  if (!isset($Campos_Erros['desctofp31']))
                  {
                      $Campos_Erros['desctofp31'] = array();
                  }
                  $Campos_Erros['desctofp31'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['desctofp31']) || !is_array($this->NM_ajax_info['errList']['desctofp31']))
                  {
                      $this->NM_ajax_info['errList']['desctofp31'] = array();
                  }
                  $this->NM_ajax_info['errList']['desctofp31'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'desctofp31';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_desctofp31

    function ValidateField_catcte31(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->catcte31) > 50) 
          { 
              $hasError = true;
              $Campos_Crit .= "Catcte 31 " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 50 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['catcte31']))
              {
                  $Campos_Erros['catcte31'] = array();
              }
              $Campos_Erros['catcte31'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 50 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['catcte31']) || !is_array($this->NM_ajax_info['errList']['catcte31']))
              {
                  $this->NM_ajax_info['errList']['catcte31'] = array();
              }
              $this->NM_ajax_info['errList']['catcte31'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 50 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'catcte31';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_catcte31

    function ValidateField_uid(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->uid === "" || is_null($this->uid))  
      { 
          $this->uid = 0;
          $this->sc_force_zero[] = 'uid';
      } 
      nm_limpa_numero($this->uid, $this->field_config['uid']['symbol_grp']) ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->uid != '')  
          { 
              $iTestSize = 10;
              if (strlen($this->uid) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "UID: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['uid']))
                  {
                      $Campos_Erros['uid'] = array();
                  }
                  $Campos_Erros['uid'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['uid']) || !is_array($this->NM_ajax_info['errList']['uid']))
                  {
                      $this->NM_ajax_info['errList']['uid'] = array();
                  }
                  $this->NM_ajax_info['errList']['uid'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->uid, 10, 0, 0, 0, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "UID; " ; 
                  if (!isset($Campos_Erros['uid']))
                  {
                      $Campos_Erros['uid'] = array();
                  }
                  $Campos_Erros['uid'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['uid']) || !is_array($this->NM_ajax_info['errList']['uid']))
                  {
                      $this->NM_ajax_info['errList']['uid'] = array();
                  }
                  $this->NM_ajax_info['errList']['uid'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'uid';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_uid

    function ValidateField_recargos31(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->recargos31 === "" || is_null($this->recargos31))  
      { 
          $this->recargos31 = 0;
          $this->sc_force_zero[] = 'recargos31';
      } 
      if (!empty($this->field_config['recargos31']['symbol_dec']))
      {
          $this->sc_remove_currency($this->recargos31, $this->field_config['recargos31']['symbol_dec'], $this->field_config['recargos31']['symbol_grp'], $this->field_config['recargos31']['symbol_mon']); 
          nm_limpa_valor($this->recargos31, $this->field_config['recargos31']['symbol_dec'], $this->field_config['recargos31']['symbol_grp']) ; 
          if ('.' == substr($this->recargos31, 0, 1))
          {
              if ('' == str_replace('0', '', substr($this->recargos31, 1)))
              {
                  $this->recargos31 = '';
              }
              else
              {
                  $this->recargos31 = '0' . $this->recargos31;
              }
          }
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->recargos31 != '')  
          { 
              $iTestSize = 19;
              if (strlen($this->recargos31) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Recargos 31: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['recargos31']))
                  {
                      $Campos_Erros['recargos31'] = array();
                  }
                  $Campos_Erros['recargos31'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['recargos31']) || !is_array($this->NM_ajax_info['errList']['recargos31']))
                  {
                      $this->NM_ajax_info['errList']['recargos31'] = array();
                  }
                  $this->NM_ajax_info['errList']['recargos31'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->recargos31, 16, 2, 0, 0, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Recargos 31; " ; 
                  if (!isset($Campos_Erros['recargos31']))
                  {
                      $Campos_Erros['recargos31'] = array();
                  }
                  $Campos_Erros['recargos31'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['recargos31']) || !is_array($this->NM_ajax_info['errList']['recargos31']))
                  {
                      $this->NM_ajax_info['errList']['recargos31'] = array();
                  }
                  $this->NM_ajax_info['errList']['recargos31'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'recargos31';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_recargos31

    function ValidateField_ice31(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao == "alterar")
      {
      if ($this->ice31 === "" || is_null($this->ice31))  
      { 
          $this->ice31 = 0;
          $this->sc_force_zero[] = 'ice31';
      } 
      }
      if (!empty($this->field_config['ice31']['symbol_dec']))
      {
          $this->sc_remove_currency($this->ice31, $this->field_config['ice31']['symbol_dec'], $this->field_config['ice31']['symbol_grp'], $this->field_config['ice31']['symbol_mon']); 
          nm_limpa_valor($this->ice31, $this->field_config['ice31']['symbol_dec'], $this->field_config['ice31']['symbol_grp']) ; 
          if ('.' == substr($this->ice31, 0, 1))
          {
              if ('' == str_replace('0', '', substr($this->ice31, 1)))
              {
                  $this->ice31 = '';
              }
              else
              {
                  $this->ice31 = '0' . $this->ice31;
              }
          }
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->ice31 != '')  
          { 
              $iTestSize = 19;
              if (strlen($this->ice31) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Ice 31: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['ice31']))
                  {
                      $Campos_Erros['ice31'] = array();
                  }
                  $Campos_Erros['ice31'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['ice31']) || !is_array($this->NM_ajax_info['errList']['ice31']))
                  {
                      $this->NM_ajax_info['errList']['ice31'] = array();
                  }
                  $this->NM_ajax_info['errList']['ice31'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->ice31, 16, 2, 0, 0, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Ice 31; " ; 
                  if (!isset($Campos_Erros['ice31']))
                  {
                      $Campos_Erros['ice31'] = array();
                  }
                  $Campos_Erros['ice31'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['ice31']) || !is_array($this->NM_ajax_info['errList']['ice31']))
                  {
                      $this->NM_ajax_info['errList']['ice31'] = array();
                  }
                  $this->NM_ajax_info['errList']['ice31'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'ice31';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_ice31

    function ValidateField_fecdocpr31(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      nm_limpa_data($this->fecdocpr31, $this->field_config['fecdocpr31']['date_sep']) ; 
      $trab_dt_min = ""; 
      $trab_dt_max = ""; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          $guarda_datahora = $this->field_config['fecdocpr31']['date_format']; 
          if (false !== strpos($guarda_datahora, ';')) $this->field_config['fecdocpr31']['date_format'] = substr($guarda_datahora, 0, strpos($guarda_datahora, ';'));
          $Format_Data = $this->field_config['fecdocpr31']['date_format']; 
          nm_limpa_data($Format_Data, $this->field_config['fecdocpr31']['date_sep']) ; 
          if (trim($this->fecdocpr31) != "")  
          { 
              if ($teste_validade->Data($this->fecdocpr31, $Format_Data, $trab_dt_min, $trab_dt_max) == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Fecdocpr 31; " ; 
                  if (!isset($Campos_Erros['fecdocpr31']))
                  {
                      $Campos_Erros['fecdocpr31'] = array();
                  }
                  $Campos_Erros['fecdocpr31'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['fecdocpr31']) || !is_array($this->NM_ajax_info['errList']['fecdocpr31']))
                  {
                      $this->NM_ajax_info['errList']['fecdocpr31'] = array();
                  }
                  $this->NM_ajax_info['errList']['fecdocpr31'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
          $this->field_config['fecdocpr31']['date_format'] = $guarda_datahora; 
       } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'fecdocpr31';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
      nm_limpa_hora($this->fecdocpr31_hora, $this->field_config['fecdocpr31_hora']['time_sep']) ; 
      if ($this->nmgp_opcao != "excluir") 
      {
          $Format_Hora = $this->field_config['fecdocpr31_hora']['date_format']; 
          nm_limpa_hora($Format_Hora, $this->field_config['fecdocpr31_hora']['time_sep']) ; 
          if (trim($this->fecdocpr31_hora) != "")  
          { 
              if ($teste_validade->Hora($this->fecdocpr31_hora, $Format_Hora) == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Fecdocpr 31; " ; 
                  if (!isset($Campos_Erros['fecdocpr31_hora']))
                  {
                      $Campos_Erros['fecdocpr31_hora'] = array();
                  }
                  $Campos_Erros['fecdocpr31_hora'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['fecdocpr31']) || !is_array($this->NM_ajax_info['errList']['fecdocpr31']))
                  {
                      $this->NM_ajax_info['errList']['fecdocpr31'] = array();
                  }
                  $this->NM_ajax_info['errList']['fecdocpr31'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
      if (isset($Campos_Erros['fecdocpr31']) && isset($Campos_Erros['fecdocpr31_hora']))
      {
          $this->removeDuplicateDttmError($Campos_Erros['fecdocpr31'], $Campos_Erros['fecdocpr31_hora']);
          if (empty($Campos_Erros['fecdocpr31_hora']))
          {
              unset($Campos_Erros['fecdocpr31_hora']);
          }
          if (isset($this->NM_ajax_info['errList']['fecdocpr31']))
          {
              $this->NM_ajax_info['errList']['fecdocpr31'] = array_unique($this->NM_ajax_info['errList']['fecdocpr31']);
          }
      }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'fecdocpr31_hora';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_fecdocpr31_hora

    function ValidateField_tipocomp31(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->tipocomp31) > 4) 
          { 
              $hasError = true;
              $Campos_Crit .= "Tipocomp 31 " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 4 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['tipocomp31']))
              {
                  $Campos_Erros['tipocomp31'] = array();
              }
              $Campos_Erros['tipocomp31'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 4 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['tipocomp31']) || !is_array($this->NM_ajax_info['errList']['tipocomp31']))
              {
                  $this->NM_ajax_info['errList']['tipocomp31'] = array();
              }
              $this->NM_ajax_info['errList']['tipocomp31'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 4 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'tipocomp31';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_tipocomp31

    function ValidateField_conta31(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->conta31 === "" || is_null($this->conta31))  
      { 
          $this->conta31 = 0;
          $this->sc_force_zero[] = 'conta31';
      } 
      nm_limpa_numero($this->conta31, $this->field_config['conta31']['symbol_grp']) ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->conta31 != '')  
          { 
              $iTestSize = 10;
              if (strlen($this->conta31) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Conta 31: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['conta31']))
                  {
                      $Campos_Erros['conta31'] = array();
                  }
                  $Campos_Erros['conta31'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['conta31']) || !is_array($this->NM_ajax_info['errList']['conta31']))
                  {
                      $this->NM_ajax_info['errList']['conta31'] = array();
                  }
                  $this->NM_ajax_info['errList']['conta31'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->conta31, 10, 0, 0, 0, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Conta 31; " ; 
                  if (!isset($Campos_Erros['conta31']))
                  {
                      $Campos_Erros['conta31'] = array();
                  }
                  $Campos_Erros['conta31'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['conta31']) || !is_array($this->NM_ajax_info['errList']['conta31']))
                  {
                      $this->NM_ajax_info['errList']['conta31'] = array();
                  }
                  $this->NM_ajax_info['errList']['conta31'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'conta31';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_conta31

    function ValidateField_fecvencidocpr(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      nm_limpa_data($this->fecvencidocpr, $this->field_config['fecvencidocpr']['date_sep']) ; 
      $trab_dt_min = ""; 
      $trab_dt_max = ""; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          $guarda_datahora = $this->field_config['fecvencidocpr']['date_format']; 
          if (false !== strpos($guarda_datahora, ';')) $this->field_config['fecvencidocpr']['date_format'] = substr($guarda_datahora, 0, strpos($guarda_datahora, ';'));
          $Format_Data = $this->field_config['fecvencidocpr']['date_format']; 
          nm_limpa_data($Format_Data, $this->field_config['fecvencidocpr']['date_sep']) ; 
          if (trim($this->fecvencidocpr) != "")  
          { 
              if ($teste_validade->Data($this->fecvencidocpr, $Format_Data, $trab_dt_min, $trab_dt_max) == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Fecvencidocpr; " ; 
                  if (!isset($Campos_Erros['fecvencidocpr']))
                  {
                      $Campos_Erros['fecvencidocpr'] = array();
                  }
                  $Campos_Erros['fecvencidocpr'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['fecvencidocpr']) || !is_array($this->NM_ajax_info['errList']['fecvencidocpr']))
                  {
                      $this->NM_ajax_info['errList']['fecvencidocpr'] = array();
                  }
                  $this->NM_ajax_info['errList']['fecvencidocpr'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
          $this->field_config['fecvencidocpr']['date_format'] = $guarda_datahora; 
       } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'fecvencidocpr';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
      nm_limpa_hora($this->fecvencidocpr_hora, $this->field_config['fecvencidocpr_hora']['time_sep']) ; 
      if ($this->nmgp_opcao != "excluir") 
      {
          $Format_Hora = $this->field_config['fecvencidocpr_hora']['date_format']; 
          nm_limpa_hora($Format_Hora, $this->field_config['fecvencidocpr_hora']['time_sep']) ; 
          if (trim($this->fecvencidocpr_hora) != "")  
          { 
              if ($teste_validade->Hora($this->fecvencidocpr_hora, $Format_Hora) == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Fecvencidocpr; " ; 
                  if (!isset($Campos_Erros['fecvencidocpr_hora']))
                  {
                      $Campos_Erros['fecvencidocpr_hora'] = array();
                  }
                  $Campos_Erros['fecvencidocpr_hora'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['fecvencidocpr']) || !is_array($this->NM_ajax_info['errList']['fecvencidocpr']))
                  {
                      $this->NM_ajax_info['errList']['fecvencidocpr'] = array();
                  }
                  $this->NM_ajax_info['errList']['fecvencidocpr'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
      if (isset($Campos_Erros['fecvencidocpr']) && isset($Campos_Erros['fecvencidocpr_hora']))
      {
          $this->removeDuplicateDttmError($Campos_Erros['fecvencidocpr'], $Campos_Erros['fecvencidocpr_hora']);
          if (empty($Campos_Erros['fecvencidocpr_hora']))
          {
              unset($Campos_Erros['fecvencidocpr_hora']);
          }
          if (isset($this->NM_ajax_info['errList']['fecvencidocpr']))
          {
              $this->NM_ajax_info['errList']['fecvencidocpr'] = array_unique($this->NM_ajax_info['errList']['fecvencidocpr']);
          }
      }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'fecvencidocpr_hora';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_fecvencidocpr_hora

    function ValidateField_totsiniva31(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao == "alterar")
      {
      }
      if (!empty($this->field_config['totsiniva31']['symbol_dec']))
      {
          $this->sc_remove_currency($this->totsiniva31, $this->field_config['totsiniva31']['symbol_dec'], $this->field_config['totsiniva31']['symbol_grp'], $this->field_config['totsiniva31']['symbol_mon']); 
          nm_limpa_valor($this->totsiniva31, $this->field_config['totsiniva31']['symbol_dec'], $this->field_config['totsiniva31']['symbol_grp']) ; 
          if ('.' == substr($this->totsiniva31, 0, 1))
          {
              if ('' == str_replace('0', '', substr($this->totsiniva31, 1)))
              {
                  $this->totsiniva31 = '';
              }
              else
              {
                  $this->totsiniva31 = '0' . $this->totsiniva31;
              }
          }
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->totsiniva31 != '')  
          { 
              $iTestSize = 19;
              if (strlen($this->totsiniva31) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Totsiniva 31: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['totsiniva31']))
                  {
                      $Campos_Erros['totsiniva31'] = array();
                  }
                  $Campos_Erros['totsiniva31'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['totsiniva31']) || !is_array($this->NM_ajax_info['errList']['totsiniva31']))
                  {
                      $this->NM_ajax_info['errList']['totsiniva31'] = array();
                  }
                  $this->NM_ajax_info['errList']['totsiniva31'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->totsiniva31, 16, 2, 0, 0, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Totsiniva 31; " ; 
                  if (!isset($Campos_Erros['totsiniva31']))
                  {
                      $Campos_Erros['totsiniva31'] = array();
                  }
                  $Campos_Erros['totsiniva31'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['totsiniva31']) || !is_array($this->NM_ajax_info['errList']['totsiniva31']))
                  {
                      $this->NM_ajax_info['errList']['totsiniva31'] = array();
                  }
                  $this->NM_ajax_info['errList']['totsiniva31'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
           elseif (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['php_cmp_required']['totsiniva31']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['php_cmp_required']['totsiniva31'] == "on") 
           { 
              $hasError = true;
              $Campos_Falta[] = "Totsiniva 31" ; 
              if (!isset($Campos_Erros['totsiniva31']))
              {
                  $Campos_Erros['totsiniva31'] = array();
              }
              $Campos_Erros['totsiniva31'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['totsiniva31']) || !is_array($this->NM_ajax_info['errList']['totsiniva31']))
                  {
                      $this->NM_ajax_info['errList']['totsiniva31'] = array();
                  }
                  $this->NM_ajax_info['errList']['totsiniva31'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
           } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'totsiniva31';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_totsiniva31

    function ValidateField_fecemb(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      nm_limpa_data($this->fecemb, $this->field_config['fecemb']['date_sep']) ; 
      $trab_dt_min = ""; 
      $trab_dt_max = ""; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          $guarda_datahora = $this->field_config['fecemb']['date_format']; 
          if (false !== strpos($guarda_datahora, ';')) $this->field_config['fecemb']['date_format'] = substr($guarda_datahora, 0, strpos($guarda_datahora, ';'));
          $Format_Data = $this->field_config['fecemb']['date_format']; 
          nm_limpa_data($Format_Data, $this->field_config['fecemb']['date_sep']) ; 
          if (trim($this->fecemb) != "")  
          { 
              if ($teste_validade->Data($this->fecemb, $Format_Data, $trab_dt_min, $trab_dt_max) == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Fecemb; " ; 
                  if (!isset($Campos_Erros['fecemb']))
                  {
                      $Campos_Erros['fecemb'] = array();
                  }
                  $Campos_Erros['fecemb'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['fecemb']) || !is_array($this->NM_ajax_info['errList']['fecemb']))
                  {
                      $this->NM_ajax_info['errList']['fecemb'] = array();
                  }
                  $this->NM_ajax_info['errList']['fecemb'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
          $this->field_config['fecemb']['date_format'] = $guarda_datahora; 
       } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'fecemb';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_fecemb

    function ValidateField_norefrendo(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->norefrendo) > 50) 
          { 
              $hasError = true;
              $Campos_Crit .= "Norefrendo " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 50 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['norefrendo']))
              {
                  $Campos_Erros['norefrendo'] = array();
              }
              $Campos_Erros['norefrendo'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 50 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['norefrendo']) || !is_array($this->NM_ajax_info['errList']['norefrendo']))
              {
                  $this->NM_ajax_info['errList']['norefrendo'] = array();
              }
              $this->NM_ajax_info['errList']['norefrendo'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 50 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'norefrendo';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_norefrendo

    function ValidateField_baseice(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->baseice === "" || is_null($this->baseice))  
      { 
          $this->baseice = 0;
          $this->sc_force_zero[] = 'baseice';
      } 
      if (!empty($this->field_config['baseice']['symbol_dec']))
      {
          $this->sc_remove_currency($this->baseice, $this->field_config['baseice']['symbol_dec'], $this->field_config['baseice']['symbol_grp'], $this->field_config['baseice']['symbol_mon']); 
          nm_limpa_valor($this->baseice, $this->field_config['baseice']['symbol_dec'], $this->field_config['baseice']['symbol_grp']) ; 
          if ('.' == substr($this->baseice, 0, 1))
          {
              if ('' == str_replace('0', '', substr($this->baseice, 1)))
              {
                  $this->baseice = '';
              }
              else
              {
                  $this->baseice = '0' . $this->baseice;
              }
          }
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->baseice != '')  
          { 
              $iTestSize = 19;
              if (strlen($this->baseice) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Baseice: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['baseice']))
                  {
                      $Campos_Erros['baseice'] = array();
                  }
                  $Campos_Erros['baseice'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['baseice']) || !is_array($this->NM_ajax_info['errList']['baseice']))
                  {
                      $this->NM_ajax_info['errList']['baseice'] = array();
                  }
                  $this->NM_ajax_info['errList']['baseice'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->baseice, 16, 2, 0, 0, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Baseice; " ; 
                  if (!isset($Campos_Erros['baseice']))
                  {
                      $Campos_Erros['baseice'] = array();
                  }
                  $Campos_Erros['baseice'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['baseice']) || !is_array($this->NM_ajax_info['errList']['baseice']))
                  {
                      $this->NM_ajax_info['errList']['baseice'] = array();
                  }
                  $this->NM_ajax_info['errList']['baseice'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'baseice';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_baseice

    function ValidateField_ncodret43(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['php_cmp_required']['ncodret43']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['php_cmp_required']['ncodret43'] == "on")) 
      { 
          if ($this->ncodret43 == "")  
          { 
              $hasError = true;
              $Campos_Falta[] =  "Ncodret 43" ; 
              if (!isset($Campos_Erros['ncodret43']))
              {
                  $Campos_Erros['ncodret43'] = array();
              }
              $Campos_Erros['ncodret43'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['ncodret43']) || !is_array($this->NM_ajax_info['errList']['ncodret43']))
                  {
                      $this->NM_ajax_info['errList']['ncodret43'] = array();
                  }
                  $this->NM_ajax_info['errList']['ncodret43'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          } 
      } 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->ncodret43) > 4) 
          { 
              $hasError = true;
              $Campos_Crit .= "Ncodret 43 " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 4 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['ncodret43']))
              {
                  $Campos_Erros['ncodret43'] = array();
              }
              $Campos_Erros['ncodret43'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 4 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['ncodret43']) || !is_array($this->NM_ajax_info['errList']['ncodret43']))
              {
                  $this->NM_ajax_info['errList']['ncodret43'] = array();
              }
              $this->NM_ajax_info['errList']['ncodret43'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 4 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'ncodret43';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_ncodret43

    function ValidateField_nbaseret43(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao == "alterar")
      {
      }
      if (!empty($this->field_config['nbaseret43']['symbol_dec']))
      {
          $this->sc_remove_currency($this->nbaseret43, $this->field_config['nbaseret43']['symbol_dec'], $this->field_config['nbaseret43']['symbol_grp'], $this->field_config['nbaseret43']['symbol_mon']); 
          nm_limpa_valor($this->nbaseret43, $this->field_config['nbaseret43']['symbol_dec'], $this->field_config['nbaseret43']['symbol_grp']) ; 
          if ('.' == substr($this->nbaseret43, 0, 1))
          {
              if ('' == str_replace('0', '', substr($this->nbaseret43, 1)))
              {
                  $this->nbaseret43 = '';
              }
              else
              {
                  $this->nbaseret43 = '0' . $this->nbaseret43;
              }
          }
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->nbaseret43 != '')  
          { 
              $iTestSize = 19;
              if (strlen($this->nbaseret43) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Nbaseret 43: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['nbaseret43']))
                  {
                      $Campos_Erros['nbaseret43'] = array();
                  }
                  $Campos_Erros['nbaseret43'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['nbaseret43']) || !is_array($this->NM_ajax_info['errList']['nbaseret43']))
                  {
                      $this->NM_ajax_info['errList']['nbaseret43'] = array();
                  }
                  $this->NM_ajax_info['errList']['nbaseret43'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->nbaseret43, 16, 2, 0, 0, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Nbaseret 43; " ; 
                  if (!isset($Campos_Erros['nbaseret43']))
                  {
                      $Campos_Erros['nbaseret43'] = array();
                  }
                  $Campos_Erros['nbaseret43'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['nbaseret43']) || !is_array($this->NM_ajax_info['errList']['nbaseret43']))
                  {
                      $this->NM_ajax_info['errList']['nbaseret43'] = array();
                  }
                  $this->NM_ajax_info['errList']['nbaseret43'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
           elseif (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['php_cmp_required']['nbaseret43']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['php_cmp_required']['nbaseret43'] == "on") 
           { 
              $hasError = true;
              $Campos_Falta[] = "Nbaseret 43" ; 
              if (!isset($Campos_Erros['nbaseret43']))
              {
                  $Campos_Erros['nbaseret43'] = array();
              }
              $Campos_Erros['nbaseret43'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['nbaseret43']) || !is_array($this->NM_ajax_info['errList']['nbaseret43']))
                  {
                      $this->NM_ajax_info['errList']['nbaseret43'] = array();
                  }
                  $this->NM_ajax_info['errList']['nbaseret43'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
           } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'nbaseret43';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_nbaseret43

    function ValidateField_npctjeret43(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao == "alterar")
      {
      if ($this->npctjeret43 === "" || is_null($this->npctjeret43))  
      { 
          $this->npctjeret43 = 0;
          $this->sc_force_zero[] = 'npctjeret43';
      } 
      }
      if (!empty($this->field_config['npctjeret43']['symbol_dec']))
      {
          $this->sc_remove_currency($this->npctjeret43, $this->field_config['npctjeret43']['symbol_dec'], $this->field_config['npctjeret43']['symbol_grp'], $this->field_config['npctjeret43']['symbol_mon']); 
          nm_limpa_valor($this->npctjeret43, $this->field_config['npctjeret43']['symbol_dec'], $this->field_config['npctjeret43']['symbol_grp']) ; 
          if ('.' == substr($this->npctjeret43, 0, 1))
          {
              if ('' == str_replace('0', '', substr($this->npctjeret43, 1)))
              {
                  $this->npctjeret43 = '';
              }
              else
              {
                  $this->npctjeret43 = '0' . $this->npctjeret43;
              }
          }
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->npctjeret43 != '')  
          { 
              $iTestSize = 19;
              if (strlen($this->npctjeret43) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Npctjeret 43: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['npctjeret43']))
                  {
                      $Campos_Erros['npctjeret43'] = array();
                  }
                  $Campos_Erros['npctjeret43'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['npctjeret43']) || !is_array($this->NM_ajax_info['errList']['npctjeret43']))
                  {
                      $this->NM_ajax_info['errList']['npctjeret43'] = array();
                  }
                  $this->NM_ajax_info['errList']['npctjeret43'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->npctjeret43, 16, 2, 0, 0, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Npctjeret 43; " ; 
                  if (!isset($Campos_Erros['npctjeret43']))
                  {
                      $Campos_Erros['npctjeret43'] = array();
                  }
                  $Campos_Erros['npctjeret43'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['npctjeret43']) || !is_array($this->NM_ajax_info['errList']['npctjeret43']))
                  {
                      $this->NM_ajax_info['errList']['npctjeret43'] = array();
                  }
                  $this->NM_ajax_info['errList']['npctjeret43'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'npctjeret43';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_npctjeret43

    function ValidateField_contrato(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->contrato) > 5) 
          { 
              $hasError = true;
              $Campos_Crit .= "Contrato " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 5 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['contrato']))
              {
                  $Campos_Erros['contrato'] = array();
              }
              $Campos_Erros['contrato'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 5 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['contrato']) || !is_array($this->NM_ajax_info['errList']['contrato']))
              {
                  $this->NM_ajax_info['errList']['contrato'] = array();
              }
              $this->NM_ajax_info['errList']['contrato'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 5 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'contrato';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_contrato

    function ValidateField_compra_general(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->compra_general) > 1) 
          { 
              $hasError = true;
              $Campos_Crit .= "Compra General " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 1 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['compra_general']))
              {
                  $Campos_Erros['compra_general'] = array();
              }
              $Campos_Erros['compra_general'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 1 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['compra_general']) || !is_array($this->NM_ajax_info['errList']['compra_general']))
              {
                  $this->NM_ajax_info['errList']['compra_general'] = array();
              }
              $this->NM_ajax_info['errList']['compra_general'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 1 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'compra_general';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_compra_general

    function ValidateField_distribucion_rubros(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['php_cmp_required']['distribucion_rubros']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['php_cmp_required']['distribucion_rubros'] == "on")) 
      { 
          if ($this->distribucion_rubros == "")  
          { 
              $hasError = true;
              $Campos_Falta[] =  "Distribucion Rubros" ; 
              if (!isset($Campos_Erros['distribucion_rubros']))
              {
                  $Campos_Erros['distribucion_rubros'] = array();
              }
              $Campos_Erros['distribucion_rubros'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['distribucion_rubros']) || !is_array($this->NM_ajax_info['errList']['distribucion_rubros']))
                  {
                      $this->NM_ajax_info['errList']['distribucion_rubros'] = array();
                  }
                  $this->NM_ajax_info['errList']['distribucion_rubros'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          } 
      } 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->distribucion_rubros) > 1) 
          { 
              $hasError = true;
              $Campos_Crit .= "Distribucion Rubros " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 1 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['distribucion_rubros']))
              {
                  $Campos_Erros['distribucion_rubros'] = array();
              }
              $Campos_Erros['distribucion_rubros'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 1 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['distribucion_rubros']) || !is_array($this->NM_ajax_info['errList']['distribucion_rubros']))
              {
                  $this->NM_ajax_info['errList']['distribucion_rubros'] = array();
              }
              $this->NM_ajax_info['errList']['distribucion_rubros'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 1 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'distribucion_rubros';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_distribucion_rubros

    function ValidateField_dstoley(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao == "alterar")
      {
      }
      if (!empty($this->field_config['dstoley']['symbol_dec']))
      {
          $this->sc_remove_currency($this->dstoley, $this->field_config['dstoley']['symbol_dec'], $this->field_config['dstoley']['symbol_grp'], $this->field_config['dstoley']['symbol_mon']); 
          nm_limpa_valor($this->dstoley, $this->field_config['dstoley']['symbol_dec'], $this->field_config['dstoley']['symbol_grp']) ; 
          if ('.' == substr($this->dstoley, 0, 1))
          {
              if ('' == str_replace('0', '', substr($this->dstoley, 1)))
              {
                  $this->dstoley = '';
              }
              else
              {
                  $this->dstoley = '0' . $this->dstoley;
              }
          }
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->dstoley != '')  
          { 
              $iTestSize = 17;
              if (strlen($this->dstoley) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Dsto Ley: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['dstoley']))
                  {
                      $Campos_Erros['dstoley'] = array();
                  }
                  $Campos_Erros['dstoley'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['dstoley']) || !is_array($this->NM_ajax_info['errList']['dstoley']))
                  {
                      $this->NM_ajax_info['errList']['dstoley'] = array();
                  }
                  $this->NM_ajax_info['errList']['dstoley'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->dstoley, 14, 2, 0, 0, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Dsto Ley; " ; 
                  if (!isset($Campos_Erros['dstoley']))
                  {
                      $Campos_Erros['dstoley'] = array();
                  }
                  $Campos_Erros['dstoley'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['dstoley']) || !is_array($this->NM_ajax_info['errList']['dstoley']))
                  {
                      $this->NM_ajax_info['errList']['dstoley'] = array();
                  }
                  $this->NM_ajax_info['errList']['dstoley'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
           elseif (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['php_cmp_required']['dstoley']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['php_cmp_required']['dstoley'] == "on") 
           { 
              $hasError = true;
              $Campos_Falta[] = "Dsto Ley" ; 
              if (!isset($Campos_Erros['dstoley']))
              {
                  $Campos_Erros['dstoley'] = array();
              }
              $Campos_Erros['dstoley'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['dstoley']) || !is_array($this->NM_ajax_info['errList']['dstoley']))
                  {
                      $this->NM_ajax_info['errList']['dstoley'] = array();
                  }
                  $this->NM_ajax_info['errList']['dstoley'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
           } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'dstoley';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_dstoley

    function ValidateField_remgas31(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['php_cmp_required']['remgas31']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['php_cmp_required']['remgas31'] == "on")) 
      { 
          if ($this->remgas31 == "")  
          { 
              $hasError = true;
              $Campos_Falta[] =  "Rem Gas 31" ; 
              if (!isset($Campos_Erros['remgas31']))
              {
                  $Campos_Erros['remgas31'] = array();
              }
              $Campos_Erros['remgas31'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['remgas31']) || !is_array($this->NM_ajax_info['errList']['remgas31']))
                  {
                      $this->NM_ajax_info['errList']['remgas31'] = array();
                  }
                  $this->NM_ajax_info['errList']['remgas31'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          } 
      } 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->remgas31) > 1) 
          { 
              $hasError = true;
              $Campos_Crit .= "Rem Gas 31 " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 1 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['remgas31']))
              {
                  $Campos_Erros['remgas31'] = array();
              }
              $Campos_Erros['remgas31'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 1 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['remgas31']) || !is_array($this->NM_ajax_info['errList']['remgas31']))
              {
                  $this->NM_ajax_info['errList']['remgas31'] = array();
              }
              $this->NM_ajax_info['errList']['remgas31'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 1 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'remgas31';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_remgas31

    function ValidateField_estado_electronico(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao == "alterar")
      {
      }
      nm_limpa_numero($this->estado_electronico, $this->field_config['estado_electronico']['symbol_grp']) ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->estado_electronico != '')  
          { 
              $iTestSize = 10;
              if (strlen($this->estado_electronico) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Estado Electronico: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['estado_electronico']))
                  {
                      $Campos_Erros['estado_electronico'] = array();
                  }
                  $Campos_Erros['estado_electronico'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['estado_electronico']) || !is_array($this->NM_ajax_info['errList']['estado_electronico']))
                  {
                      $this->NM_ajax_info['errList']['estado_electronico'] = array();
                  }
                  $this->NM_ajax_info['errList']['estado_electronico'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->estado_electronico, 10, 0, 0, 0, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Estado Electronico; " ; 
                  if (!isset($Campos_Erros['estado_electronico']))
                  {
                      $Campos_Erros['estado_electronico'] = array();
                  }
                  $Campos_Erros['estado_electronico'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['estado_electronico']) || !is_array($this->NM_ajax_info['errList']['estado_electronico']))
                  {
                      $this->NM_ajax_info['errList']['estado_electronico'] = array();
                  }
                  $this->NM_ajax_info['errList']['estado_electronico'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
           elseif (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['php_cmp_required']['estado_electronico']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['php_cmp_required']['estado_electronico'] == "on") 
           { 
              $hasError = true;
              $Campos_Falta[] = "Estado Electronico" ; 
              if (!isset($Campos_Erros['estado_electronico']))
              {
                  $Campos_Erros['estado_electronico'] = array();
              }
              $Campos_Erros['estado_electronico'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['estado_electronico']) || !is_array($this->NM_ajax_info['errList']['estado_electronico']))
                  {
                      $this->NM_ajax_info['errList']['estado_electronico'] = array();
                  }
                  $this->NM_ajax_info['errList']['estado_electronico'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
           } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'estado_electronico';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_estado_electronico

    function ValidateField_coddest31(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['php_cmp_required']['coddest31']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['php_cmp_required']['coddest31'] == "on")) 
      { 
          if ($this->coddest31 == "")  
          { 
              $hasError = true;
              $Campos_Falta[] =  "Coddest 31" ; 
              if (!isset($Campos_Erros['coddest31']))
              {
                  $Campos_Erros['coddest31'] = array();
              }
              $Campos_Erros['coddest31'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['coddest31']) || !is_array($this->NM_ajax_info['errList']['coddest31']))
                  {
                      $this->NM_ajax_info['errList']['coddest31'] = array();
                  }
                  $this->NM_ajax_info['errList']['coddest31'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          } 
      } 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->coddest31) > 4) 
          { 
              $hasError = true;
              $Campos_Crit .= "Coddest 31 " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 4 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['coddest31']))
              {
                  $Campos_Erros['coddest31'] = array();
              }
              $Campos_Erros['coddest31'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 4 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['coddest31']) || !is_array($this->NM_ajax_info['errList']['coddest31']))
              {
                  $this->NM_ajax_info['errList']['coddest31'] = array();
              }
              $this->NM_ajax_info['errList']['coddest31'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 4 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'coddest31';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_coddest31

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
    $this->nmgp_dados_form['tipodocto31'] = $this->tipodocto31;
    $this->nmgp_dados_form['nofact31'] = $this->nofact31;
    $this->nmgp_dados_form['nocte31'] = $this->nocte31;
    $this->nmgp_dados_form['nomcte31'] = $this->nomcte31;
    $this->nmgp_dados_form['localid31'] = $this->localid31;
    $this->nmgp_dados_form['cvectenegro31'] = $this->cvectenegro31;
    $this->nmgp_dados_form['vtabta31'] = $this->vtabta31;
    $this->nmgp_dados_form['descto31'] = $this->descto31;
    $this->nmgp_dados_form['flete31'] = $this->flete31;
    $this->nmgp_dados_form['itm31'] = $this->itm31;
    $this->nmgp_dados_form['novend31'] = $this->novend31;
    $this->nmgp_dados_form['fecfact31'] = (strlen(trim($this->fecfact31)) > 19) ? str_replace(".", ":", $this->fecfact31) : trim($this->fecfact31);
    $this->nmgp_dados_form['condpag31'] = $this->condpag31;
    $this->nmgp_dados_form['nopagos31'] = $this->nopagos31;
    $this->nmgp_dados_form['formapago31'] = $this->formapago31;
    $this->nmgp_dados_form['obra31'] = $this->obra31;
    $this->nmgp_dados_form['orden31'] = $this->orden31;
    $this->nmgp_dados_form['cvnegra31'] = $this->cvnegra31;
    $this->nmgp_dados_form['status31'] = $this->status31;
    $this->nmgp_dados_form['cvimpto31'] = $this->cvimpto31;
    $this->nmgp_dados_form['cvanulado31'] = $this->cvanulado31;
    $this->nmgp_dados_form['efectivo31'] = $this->efectivo31;
    $this->nmgp_dados_form['cheque31'] = $this->cheque31;
    $this->nmgp_dados_form['tarjeta31'] = $this->tarjeta31;
    $this->nmgp_dados_form['acuenta31'] = $this->acuenta31;
    $this->nmgp_dados_form['nobanco31'] = $this->nobanco31;
    $this->nmgp_dados_form['nombanco31'] = $this->nombanco31;
    $this->nmgp_dados_form['nocheque31'] = $this->nocheque31;
    $this->nmgp_dados_form['notarjeta31'] = $this->notarjeta31;
    $this->nmgp_dados_form['nomtarjeta31'] = $this->nomtarjeta31;
    $this->nmgp_dados_form['cvdivisa31'] = $this->cvdivisa31;
    $this->nmgp_dados_form['valdivisa31'] = $this->valdivisa31;
    $this->nmgp_dados_form['lineaprod31'] = $this->lineaprod31;
    $this->nmgp_dados_form['intereses31'] = $this->intereses31;
    $this->nmgp_dados_form['nopedido31'] = $this->nopedido31;
    $this->nmgp_dados_form['fecped31'] = (strlen(trim($this->fecped31)) > 19) ? str_replace(".", ":", $this->fecped31) : trim($this->fecped31);
    $this->nmgp_dados_form['ruc31'] = $this->ruc31;
    $this->nmgp_dados_form['tel31'] = $this->tel31;
    $this->nmgp_dados_form['transpor31'] = $this->transpor31;
    $this->nmgp_dados_form['cvtransfer31'] = $this->cvtransfer31;
    $this->nmgp_dados_form['fectrasfer31'] = (strlen(trim($this->fectrasfer31)) > 19) ? str_replace(".", ":", $this->fectrasfer31) : trim($this->fectrasfer31);
    $this->nmgp_dados_form['desctofp31'] = $this->desctofp31;
    $this->nmgp_dados_form['catcte31'] = $this->catcte31;
    $this->nmgp_dados_form['uid'] = $this->uid;
    $this->nmgp_dados_form['recargos31'] = $this->recargos31;
    $this->nmgp_dados_form['ice31'] = $this->ice31;
    $this->nmgp_dados_form['fecdocpr31'] = (strlen(trim($this->fecdocpr31)) > 19) ? str_replace(".", ":", $this->fecdocpr31) : trim($this->fecdocpr31);
    $this->nmgp_dados_form['tipocomp31'] = $this->tipocomp31;
    $this->nmgp_dados_form['conta31'] = $this->conta31;
    $this->nmgp_dados_form['fecvencidocpr'] = (strlen(trim($this->fecvencidocpr)) > 19) ? str_replace(".", ":", $this->fecvencidocpr) : trim($this->fecvencidocpr);
    $this->nmgp_dados_form['totsiniva31'] = $this->totsiniva31;
    $this->nmgp_dados_form['fecemb'] = (strlen(trim($this->fecemb)) > 19) ? str_replace(".", ":", $this->fecemb) : trim($this->fecemb);
    $this->nmgp_dados_form['norefrendo'] = $this->norefrendo;
    $this->nmgp_dados_form['baseice'] = $this->baseice;
    $this->nmgp_dados_form['ncodret43'] = $this->ncodret43;
    $this->nmgp_dados_form['nbaseret43'] = $this->nbaseret43;
    $this->nmgp_dados_form['npctjeret43'] = $this->npctjeret43;
    $this->nmgp_dados_form['contrato'] = $this->contrato;
    $this->nmgp_dados_form['compra_general'] = $this->compra_general;
    $this->nmgp_dados_form['distribucion_rubros'] = $this->distribucion_rubros;
    $this->nmgp_dados_form['dstoley'] = $this->dstoley;
    $this->nmgp_dados_form['remgas31'] = $this->remgas31;
    $this->nmgp_dados_form['estado_electronico'] = $this->estado_electronico;
    $this->nmgp_dados_form['coddest31'] = $this->coddest31;
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['dados_form'] = $this->nmgp_dados_form;
   }
   function nm_tira_formatacao()
   {
      global $nm_form_submit;
         $this->Before_unformat = array();
         $this->formatado = false;
      $this->Before_unformat['vtabta31'] = $this->vtabta31;
      if (!empty($this->field_config['vtabta31']['symbol_dec']))
      {
         $this->sc_remove_currency($this->vtabta31, $this->field_config['vtabta31']['symbol_dec'], $this->field_config['vtabta31']['symbol_grp'], $this->field_config['vtabta31']['symbol_mon']);
         nm_limpa_valor($this->vtabta31, $this->field_config['vtabta31']['symbol_dec'], $this->field_config['vtabta31']['symbol_grp']);
      }
      $this->Before_unformat['descto31'] = $this->descto31;
      if (!empty($this->field_config['descto31']['symbol_dec']))
      {
         $this->sc_remove_currency($this->descto31, $this->field_config['descto31']['symbol_dec'], $this->field_config['descto31']['symbol_grp'], $this->field_config['descto31']['symbol_mon']);
         nm_limpa_valor($this->descto31, $this->field_config['descto31']['symbol_dec'], $this->field_config['descto31']['symbol_grp']);
      }
      $this->Before_unformat['flete31'] = $this->flete31;
      if (!empty($this->field_config['flete31']['symbol_dec']))
      {
         $this->sc_remove_currency($this->flete31, $this->field_config['flete31']['symbol_dec'], $this->field_config['flete31']['symbol_grp'], $this->field_config['flete31']['symbol_mon']);
         nm_limpa_valor($this->flete31, $this->field_config['flete31']['symbol_dec'], $this->field_config['flete31']['symbol_grp']);
      }
      $this->Before_unformat['itm31'] = $this->itm31;
      if (!empty($this->field_config['itm31']['symbol_dec']))
      {
         $this->sc_remove_currency($this->itm31, $this->field_config['itm31']['symbol_dec'], $this->field_config['itm31']['symbol_grp'], $this->field_config['itm31']['symbol_mon']);
         nm_limpa_valor($this->itm31, $this->field_config['itm31']['symbol_dec'], $this->field_config['itm31']['symbol_grp']);
      }
      $this->Before_unformat['fecfact31'] = $this->fecfact31;
      $this->Before_unformat['fecfact31_hora'] = $this->fecfact31_hora;
      nm_limpa_data($this->fecfact31, $this->field_config['fecfact31']['date_sep']) ; 
      nm_limpa_hora($this->fecfact31_hora, $this->field_config['fecfact31']['time_sep']) ; 
      $this->Before_unformat['efectivo31'] = $this->efectivo31;
      if (!empty($this->field_config['efectivo31']['symbol_dec']))
      {
         $this->sc_remove_currency($this->efectivo31, $this->field_config['efectivo31']['symbol_dec'], $this->field_config['efectivo31']['symbol_grp'], $this->field_config['efectivo31']['symbol_mon']);
         nm_limpa_valor($this->efectivo31, $this->field_config['efectivo31']['symbol_dec'], $this->field_config['efectivo31']['symbol_grp']);
      }
      $this->Before_unformat['cheque31'] = $this->cheque31;
      if (!empty($this->field_config['cheque31']['symbol_dec']))
      {
         $this->sc_remove_currency($this->cheque31, $this->field_config['cheque31']['symbol_dec'], $this->field_config['cheque31']['symbol_grp'], $this->field_config['cheque31']['symbol_mon']);
         nm_limpa_valor($this->cheque31, $this->field_config['cheque31']['symbol_dec'], $this->field_config['cheque31']['symbol_grp']);
      }
      $this->Before_unformat['tarjeta31'] = $this->tarjeta31;
      if (!empty($this->field_config['tarjeta31']['symbol_dec']))
      {
         $this->sc_remove_currency($this->tarjeta31, $this->field_config['tarjeta31']['symbol_dec'], $this->field_config['tarjeta31']['symbol_grp'], $this->field_config['tarjeta31']['symbol_mon']);
         nm_limpa_valor($this->tarjeta31, $this->field_config['tarjeta31']['symbol_dec'], $this->field_config['tarjeta31']['symbol_grp']);
      }
      $this->Before_unformat['acuenta31'] = $this->acuenta31;
      if (!empty($this->field_config['acuenta31']['symbol_dec']))
      {
         $this->sc_remove_currency($this->acuenta31, $this->field_config['acuenta31']['symbol_dec'], $this->field_config['acuenta31']['symbol_grp'], $this->field_config['acuenta31']['symbol_mon']);
         nm_limpa_valor($this->acuenta31, $this->field_config['acuenta31']['symbol_dec'], $this->field_config['acuenta31']['symbol_grp']);
      }
      $this->Before_unformat['intereses31'] = $this->intereses31;
      if (!empty($this->field_config['intereses31']['symbol_dec']))
      {
         $this->sc_remove_currency($this->intereses31, $this->field_config['intereses31']['symbol_dec'], $this->field_config['intereses31']['symbol_grp'], $this->field_config['intereses31']['symbol_mon']);
         nm_limpa_valor($this->intereses31, $this->field_config['intereses31']['symbol_dec'], $this->field_config['intereses31']['symbol_grp']);
      }
      $this->Before_unformat['fecped31'] = $this->fecped31;
      $this->Before_unformat['fecped31_hora'] = $this->fecped31_hora;
      nm_limpa_data($this->fecped31, $this->field_config['fecped31']['date_sep']) ; 
      nm_limpa_hora($this->fecped31_hora, $this->field_config['fecped31']['time_sep']) ; 
      $this->Before_unformat['fectrasfer31'] = $this->fectrasfer31;
      nm_limpa_data($this->fectrasfer31, $this->field_config['fectrasfer31']['date_sep']) ; 
      $this->Before_unformat['desctofp31'] = $this->desctofp31;
      if (!empty($this->field_config['desctofp31']['symbol_dec']))
      {
         $this->sc_remove_currency($this->desctofp31, $this->field_config['desctofp31']['symbol_dec'], $this->field_config['desctofp31']['symbol_grp'], $this->field_config['desctofp31']['symbol_mon']);
         nm_limpa_valor($this->desctofp31, $this->field_config['desctofp31']['symbol_dec'], $this->field_config['desctofp31']['symbol_grp']);
      }
      $this->Before_unformat['uid'] = $this->uid;
      nm_limpa_numero($this->uid, $this->field_config['uid']['symbol_grp']) ; 
      $this->Before_unformat['recargos31'] = $this->recargos31;
      if (!empty($this->field_config['recargos31']['symbol_dec']))
      {
         $this->sc_remove_currency($this->recargos31, $this->field_config['recargos31']['symbol_dec'], $this->field_config['recargos31']['symbol_grp'], $this->field_config['recargos31']['symbol_mon']);
         nm_limpa_valor($this->recargos31, $this->field_config['recargos31']['symbol_dec'], $this->field_config['recargos31']['symbol_grp']);
      }
      $this->Before_unformat['ice31'] = $this->ice31;
      if (!empty($this->field_config['ice31']['symbol_dec']))
      {
         $this->sc_remove_currency($this->ice31, $this->field_config['ice31']['symbol_dec'], $this->field_config['ice31']['symbol_grp'], $this->field_config['ice31']['symbol_mon']);
         nm_limpa_valor($this->ice31, $this->field_config['ice31']['symbol_dec'], $this->field_config['ice31']['symbol_grp']);
      }
      $this->Before_unformat['fecdocpr31'] = $this->fecdocpr31;
      $this->Before_unformat['fecdocpr31_hora'] = $this->fecdocpr31_hora;
      nm_limpa_data($this->fecdocpr31, $this->field_config['fecdocpr31']['date_sep']) ; 
      nm_limpa_hora($this->fecdocpr31_hora, $this->field_config['fecdocpr31']['time_sep']) ; 
      $this->Before_unformat['conta31'] = $this->conta31;
      nm_limpa_numero($this->conta31, $this->field_config['conta31']['symbol_grp']) ; 
      $this->Before_unformat['fecvencidocpr'] = $this->fecvencidocpr;
      $this->Before_unformat['fecvencidocpr_hora'] = $this->fecvencidocpr_hora;
      nm_limpa_data($this->fecvencidocpr, $this->field_config['fecvencidocpr']['date_sep']) ; 
      nm_limpa_hora($this->fecvencidocpr_hora, $this->field_config['fecvencidocpr']['time_sep']) ; 
      $this->Before_unformat['totsiniva31'] = $this->totsiniva31;
      if (!empty($this->field_config['totsiniva31']['symbol_dec']))
      {
         $this->sc_remove_currency($this->totsiniva31, $this->field_config['totsiniva31']['symbol_dec'], $this->field_config['totsiniva31']['symbol_grp'], $this->field_config['totsiniva31']['symbol_mon']);
         nm_limpa_valor($this->totsiniva31, $this->field_config['totsiniva31']['symbol_dec'], $this->field_config['totsiniva31']['symbol_grp']);
      }
      $this->Before_unformat['fecemb'] = $this->fecemb;
      nm_limpa_data($this->fecemb, $this->field_config['fecemb']['date_sep']) ; 
      $this->Before_unformat['baseice'] = $this->baseice;
      if (!empty($this->field_config['baseice']['symbol_dec']))
      {
         $this->sc_remove_currency($this->baseice, $this->field_config['baseice']['symbol_dec'], $this->field_config['baseice']['symbol_grp'], $this->field_config['baseice']['symbol_mon']);
         nm_limpa_valor($this->baseice, $this->field_config['baseice']['symbol_dec'], $this->field_config['baseice']['symbol_grp']);
      }
      $this->Before_unformat['nbaseret43'] = $this->nbaseret43;
      if (!empty($this->field_config['nbaseret43']['symbol_dec']))
      {
         $this->sc_remove_currency($this->nbaseret43, $this->field_config['nbaseret43']['symbol_dec'], $this->field_config['nbaseret43']['symbol_grp'], $this->field_config['nbaseret43']['symbol_mon']);
         nm_limpa_valor($this->nbaseret43, $this->field_config['nbaseret43']['symbol_dec'], $this->field_config['nbaseret43']['symbol_grp']);
      }
      $this->Before_unformat['npctjeret43'] = $this->npctjeret43;
      if (!empty($this->field_config['npctjeret43']['symbol_dec']))
      {
         $this->sc_remove_currency($this->npctjeret43, $this->field_config['npctjeret43']['symbol_dec'], $this->field_config['npctjeret43']['symbol_grp'], $this->field_config['npctjeret43']['symbol_mon']);
         nm_limpa_valor($this->npctjeret43, $this->field_config['npctjeret43']['symbol_dec'], $this->field_config['npctjeret43']['symbol_grp']);
      }
      $this->Before_unformat['dstoley'] = $this->dstoley;
      if (!empty($this->field_config['dstoley']['symbol_dec']))
      {
         $this->sc_remove_currency($this->dstoley, $this->field_config['dstoley']['symbol_dec'], $this->field_config['dstoley']['symbol_grp'], $this->field_config['dstoley']['symbol_mon']);
         nm_limpa_valor($this->dstoley, $this->field_config['dstoley']['symbol_dec'], $this->field_config['dstoley']['symbol_grp']);
      }
      $this->Before_unformat['estado_electronico'] = $this->estado_electronico;
      nm_limpa_numero($this->estado_electronico, $this->field_config['estado_electronico']['symbol_grp']) ; 
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
      if ($Nome_Campo == "vtabta31")
      {
          if (!empty($this->field_config['vtabta31']['symbol_dec']))
          {
             $this->sc_remove_currency($this->vtabta31, $this->field_config['vtabta31']['symbol_dec'], $this->field_config['vtabta31']['symbol_grp'], $this->field_config['vtabta31']['symbol_mon']);
             nm_limpa_valor($this->vtabta31, $this->field_config['vtabta31']['symbol_dec'], $this->field_config['vtabta31']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "descto31")
      {
          if (!empty($this->field_config['descto31']['symbol_dec']))
          {
             $this->sc_remove_currency($this->descto31, $this->field_config['descto31']['symbol_dec'], $this->field_config['descto31']['symbol_grp'], $this->field_config['descto31']['symbol_mon']);
             nm_limpa_valor($this->descto31, $this->field_config['descto31']['symbol_dec'], $this->field_config['descto31']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "flete31")
      {
          if (!empty($this->field_config['flete31']['symbol_dec']))
          {
             $this->sc_remove_currency($this->flete31, $this->field_config['flete31']['symbol_dec'], $this->field_config['flete31']['symbol_grp'], $this->field_config['flete31']['symbol_mon']);
             nm_limpa_valor($this->flete31, $this->field_config['flete31']['symbol_dec'], $this->field_config['flete31']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "itm31")
      {
          if (!empty($this->field_config['itm31']['symbol_dec']))
          {
             $this->sc_remove_currency($this->itm31, $this->field_config['itm31']['symbol_dec'], $this->field_config['itm31']['symbol_grp'], $this->field_config['itm31']['symbol_mon']);
             nm_limpa_valor($this->itm31, $this->field_config['itm31']['symbol_dec'], $this->field_config['itm31']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "efectivo31")
      {
          if (!empty($this->field_config['efectivo31']['symbol_dec']))
          {
             $this->sc_remove_currency($this->efectivo31, $this->field_config['efectivo31']['symbol_dec'], $this->field_config['efectivo31']['symbol_grp'], $this->field_config['efectivo31']['symbol_mon']);
             nm_limpa_valor($this->efectivo31, $this->field_config['efectivo31']['symbol_dec'], $this->field_config['efectivo31']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "cheque31")
      {
          if (!empty($this->field_config['cheque31']['symbol_dec']))
          {
             $this->sc_remove_currency($this->cheque31, $this->field_config['cheque31']['symbol_dec'], $this->field_config['cheque31']['symbol_grp'], $this->field_config['cheque31']['symbol_mon']);
             nm_limpa_valor($this->cheque31, $this->field_config['cheque31']['symbol_dec'], $this->field_config['cheque31']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "tarjeta31")
      {
          if (!empty($this->field_config['tarjeta31']['symbol_dec']))
          {
             $this->sc_remove_currency($this->tarjeta31, $this->field_config['tarjeta31']['symbol_dec'], $this->field_config['tarjeta31']['symbol_grp'], $this->field_config['tarjeta31']['symbol_mon']);
             nm_limpa_valor($this->tarjeta31, $this->field_config['tarjeta31']['symbol_dec'], $this->field_config['tarjeta31']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "acuenta31")
      {
          if (!empty($this->field_config['acuenta31']['symbol_dec']))
          {
             $this->sc_remove_currency($this->acuenta31, $this->field_config['acuenta31']['symbol_dec'], $this->field_config['acuenta31']['symbol_grp'], $this->field_config['acuenta31']['symbol_mon']);
             nm_limpa_valor($this->acuenta31, $this->field_config['acuenta31']['symbol_dec'], $this->field_config['acuenta31']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "intereses31")
      {
          if (!empty($this->field_config['intereses31']['symbol_dec']))
          {
             $this->sc_remove_currency($this->intereses31, $this->field_config['intereses31']['symbol_dec'], $this->field_config['intereses31']['symbol_grp'], $this->field_config['intereses31']['symbol_mon']);
             nm_limpa_valor($this->intereses31, $this->field_config['intereses31']['symbol_dec'], $this->field_config['intereses31']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "desctofp31")
      {
          if (!empty($this->field_config['desctofp31']['symbol_dec']))
          {
             $this->sc_remove_currency($this->desctofp31, $this->field_config['desctofp31']['symbol_dec'], $this->field_config['desctofp31']['symbol_grp'], $this->field_config['desctofp31']['symbol_mon']);
             nm_limpa_valor($this->desctofp31, $this->field_config['desctofp31']['symbol_dec'], $this->field_config['desctofp31']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "uid")
      {
          nm_limpa_numero($this->uid, $this->field_config['uid']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "recargos31")
      {
          if (!empty($this->field_config['recargos31']['symbol_dec']))
          {
             $this->sc_remove_currency($this->recargos31, $this->field_config['recargos31']['symbol_dec'], $this->field_config['recargos31']['symbol_grp'], $this->field_config['recargos31']['symbol_mon']);
             nm_limpa_valor($this->recargos31, $this->field_config['recargos31']['symbol_dec'], $this->field_config['recargos31']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "ice31")
      {
          if (!empty($this->field_config['ice31']['symbol_dec']))
          {
             $this->sc_remove_currency($this->ice31, $this->field_config['ice31']['symbol_dec'], $this->field_config['ice31']['symbol_grp'], $this->field_config['ice31']['symbol_mon']);
             nm_limpa_valor($this->ice31, $this->field_config['ice31']['symbol_dec'], $this->field_config['ice31']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "conta31")
      {
          nm_limpa_numero($this->conta31, $this->field_config['conta31']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "totsiniva31")
      {
          if (!empty($this->field_config['totsiniva31']['symbol_dec']))
          {
             $this->sc_remove_currency($this->totsiniva31, $this->field_config['totsiniva31']['symbol_dec'], $this->field_config['totsiniva31']['symbol_grp'], $this->field_config['totsiniva31']['symbol_mon']);
             nm_limpa_valor($this->totsiniva31, $this->field_config['totsiniva31']['symbol_dec'], $this->field_config['totsiniva31']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "baseice")
      {
          if (!empty($this->field_config['baseice']['symbol_dec']))
          {
             $this->sc_remove_currency($this->baseice, $this->field_config['baseice']['symbol_dec'], $this->field_config['baseice']['symbol_grp'], $this->field_config['baseice']['symbol_mon']);
             nm_limpa_valor($this->baseice, $this->field_config['baseice']['symbol_dec'], $this->field_config['baseice']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "nbaseret43")
      {
          if (!empty($this->field_config['nbaseret43']['symbol_dec']))
          {
             $this->sc_remove_currency($this->nbaseret43, $this->field_config['nbaseret43']['symbol_dec'], $this->field_config['nbaseret43']['symbol_grp'], $this->field_config['nbaseret43']['symbol_mon']);
             nm_limpa_valor($this->nbaseret43, $this->field_config['nbaseret43']['symbol_dec'], $this->field_config['nbaseret43']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "npctjeret43")
      {
          if (!empty($this->field_config['npctjeret43']['symbol_dec']))
          {
             $this->sc_remove_currency($this->npctjeret43, $this->field_config['npctjeret43']['symbol_dec'], $this->field_config['npctjeret43']['symbol_grp'], $this->field_config['npctjeret43']['symbol_mon']);
             nm_limpa_valor($this->npctjeret43, $this->field_config['npctjeret43']['symbol_dec'], $this->field_config['npctjeret43']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "dstoley")
      {
          if (!empty($this->field_config['dstoley']['symbol_dec']))
          {
             $this->sc_remove_currency($this->dstoley, $this->field_config['dstoley']['symbol_dec'], $this->field_config['dstoley']['symbol_grp'], $this->field_config['dstoley']['symbol_mon']);
             nm_limpa_valor($this->dstoley, $this->field_config['dstoley']['symbol_dec'], $this->field_config['dstoley']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "estado_electronico")
      {
          nm_limpa_numero($this->estado_electronico, $this->field_config['estado_electronico']['symbol_grp']) ; 
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
      if ('' !== $this->vtabta31 || (!empty($format_fields) && isset($format_fields['vtabta31'])))
      {
          nmgp_Form_Num_Val($this->vtabta31, $this->field_config['vtabta31']['symbol_grp'], $this->field_config['vtabta31']['symbol_dec'], "2", "S", $this->field_config['vtabta31']['format_neg'], "", "", "-", $this->field_config['vtabta31']['symbol_fmt']) ; 
      }
      if ('' !== $this->descto31 || (!empty($format_fields) && isset($format_fields['descto31'])))
      {
          nmgp_Form_Num_Val($this->descto31, $this->field_config['descto31']['symbol_grp'], $this->field_config['descto31']['symbol_dec'], "2", "S", $this->field_config['descto31']['format_neg'], "", "", "-", $this->field_config['descto31']['symbol_fmt']) ; 
      }
      if ('' !== $this->flete31 || (!empty($format_fields) && isset($format_fields['flete31'])))
      {
          nmgp_Form_Num_Val($this->flete31, $this->field_config['flete31']['symbol_grp'], $this->field_config['flete31']['symbol_dec'], "2", "S", $this->field_config['flete31']['format_neg'], "", "", "-", $this->field_config['flete31']['symbol_fmt']) ; 
      }
      if ('' !== $this->itm31 || (!empty($format_fields) && isset($format_fields['itm31'])))
      {
          nmgp_Form_Num_Val($this->itm31, $this->field_config['itm31']['symbol_grp'], $this->field_config['itm31']['symbol_dec'], "2", "S", $this->field_config['itm31']['format_neg'], "", "", "-", $this->field_config['itm31']['symbol_fmt']) ; 
      }
      if ((!empty($this->fecfact31) && 'null' != $this->fecfact31) || (!empty($format_fields) && isset($format_fields['fecfact31'])))
      {
          $nm_separa_data = strpos($this->field_config['fecfact31']['date_format'], ";") ;
          $guarda_format_hora = $this->field_config['fecfact31']['date_format'];
          $this->field_config['fecfact31']['date_format'] = substr($this->field_config['fecfact31']['date_format'], 0, $nm_separa_data) ;
          $separador = strpos($this->fecfact31, " ") ; 
          $this->fecfact31_hora = substr($this->fecfact31, $separador + 1) ; 
          $this->fecfact31 = substr($this->fecfact31, 0, $separador) ; 
          nm_volta_data($this->fecfact31, $this->field_config['fecfact31']['date_format']) ; 
          nmgp_Form_Datas($this->fecfact31, $this->field_config['fecfact31']['date_format'], $this->field_config['fecfact31']['date_sep']) ;  
          $this->field_config['fecfact31']['date_format'] = substr($guarda_format_hora, $nm_separa_data + 1) ;
          nm_volta_hora($this->fecfact31_hora, $this->field_config['fecfact31']['date_format']) ; 
          nmgp_Form_Hora($this->fecfact31_hora, $this->field_config['fecfact31']['date_format'], $this->field_config['fecfact31']['time_sep']) ;  
          $this->field_config['fecfact31']['date_format'] = $guarda_format_hora ;
      }
      elseif ('null' == $this->fecfact31 || '' == $this->fecfact31)
      {
          $this->fecfact31_hora = '';
          $this->fecfact31 = '';
      }
      if ('' !== $this->efectivo31 || (!empty($format_fields) && isset($format_fields['efectivo31'])))
      {
          nmgp_Form_Num_Val($this->efectivo31, $this->field_config['efectivo31']['symbol_grp'], $this->field_config['efectivo31']['symbol_dec'], "2", "S", $this->field_config['efectivo31']['format_neg'], "", "", "-", $this->field_config['efectivo31']['symbol_fmt']) ; 
      }
      if ('' !== $this->cheque31 || (!empty($format_fields) && isset($format_fields['cheque31'])))
      {
          nmgp_Form_Num_Val($this->cheque31, $this->field_config['cheque31']['symbol_grp'], $this->field_config['cheque31']['symbol_dec'], "2", "S", $this->field_config['cheque31']['format_neg'], "", "", "-", $this->field_config['cheque31']['symbol_fmt']) ; 
      }
      if ('' !== $this->tarjeta31 || (!empty($format_fields) && isset($format_fields['tarjeta31'])))
      {
          nmgp_Form_Num_Val($this->tarjeta31, $this->field_config['tarjeta31']['symbol_grp'], $this->field_config['tarjeta31']['symbol_dec'], "2", "S", $this->field_config['tarjeta31']['format_neg'], "", "", "-", $this->field_config['tarjeta31']['symbol_fmt']) ; 
      }
      if ('' !== $this->acuenta31 || (!empty($format_fields) && isset($format_fields['acuenta31'])))
      {
          nmgp_Form_Num_Val($this->acuenta31, $this->field_config['acuenta31']['symbol_grp'], $this->field_config['acuenta31']['symbol_dec'], "2", "S", $this->field_config['acuenta31']['format_neg'], "", "", "-", $this->field_config['acuenta31']['symbol_fmt']) ; 
      }
      if ('' !== $this->intereses31 || (!empty($format_fields) && isset($format_fields['intereses31'])))
      {
          nmgp_Form_Num_Val($this->intereses31, $this->field_config['intereses31']['symbol_grp'], $this->field_config['intereses31']['symbol_dec'], "2", "S", $this->field_config['intereses31']['format_neg'], "", "", "-", $this->field_config['intereses31']['symbol_fmt']) ; 
      }
      if ((!empty($this->fecped31) && 'null' != $this->fecped31) || (!empty($format_fields) && isset($format_fields['fecped31'])))
      {
          $nm_separa_data = strpos($this->field_config['fecped31']['date_format'], ";") ;
          $guarda_format_hora = $this->field_config['fecped31']['date_format'];
          $this->field_config['fecped31']['date_format'] = substr($this->field_config['fecped31']['date_format'], 0, $nm_separa_data) ;
          $separador = strpos($this->fecped31, " ") ; 
          $this->fecped31_hora = substr($this->fecped31, $separador + 1) ; 
          $this->fecped31 = substr($this->fecped31, 0, $separador) ; 
          nm_volta_data($this->fecped31, $this->field_config['fecped31']['date_format']) ; 
          nmgp_Form_Datas($this->fecped31, $this->field_config['fecped31']['date_format'], $this->field_config['fecped31']['date_sep']) ;  
          $this->field_config['fecped31']['date_format'] = substr($guarda_format_hora, $nm_separa_data + 1) ;
          nm_volta_hora($this->fecped31_hora, $this->field_config['fecped31']['date_format']) ; 
          nmgp_Form_Hora($this->fecped31_hora, $this->field_config['fecped31']['date_format'], $this->field_config['fecped31']['time_sep']) ;  
          $this->field_config['fecped31']['date_format'] = $guarda_format_hora ;
      }
      elseif ('null' == $this->fecped31 || '' == $this->fecped31)
      {
          $this->fecped31_hora = '';
          $this->fecped31 = '';
      }
      if ((!empty($this->fectrasfer31) && 'null' != $this->fectrasfer31) || (!empty($format_fields) && isset($format_fields['fectrasfer31'])))
      {
          nm_volta_data($this->fectrasfer31, $this->field_config['fectrasfer31']['date_format']) ; 
          nmgp_Form_Datas($this->fectrasfer31, $this->field_config['fectrasfer31']['date_format'], $this->field_config['fectrasfer31']['date_sep']) ;  
      }
      elseif ('null' == $this->fectrasfer31 || '' == $this->fectrasfer31)
      {
          $this->fectrasfer31 = '';
      }
      if ('' !== $this->desctofp31 || (!empty($format_fields) && isset($format_fields['desctofp31'])))
      {
          nmgp_Form_Num_Val($this->desctofp31, $this->field_config['desctofp31']['symbol_grp'], $this->field_config['desctofp31']['symbol_dec'], "2", "S", $this->field_config['desctofp31']['format_neg'], "", "", "-", $this->field_config['desctofp31']['symbol_fmt']) ; 
      }
      if ('' !== $this->uid || (!empty($format_fields) && isset($format_fields['uid'])))
      {
          nmgp_Form_Num_Val($this->uid, $this->field_config['uid']['symbol_grp'], $this->field_config['uid']['symbol_dec'], "0", "S", $this->field_config['uid']['format_neg'], "", "", "-", $this->field_config['uid']['symbol_fmt']) ; 
      }
      if ('' !== $this->recargos31 || (!empty($format_fields) && isset($format_fields['recargos31'])))
      {
          nmgp_Form_Num_Val($this->recargos31, $this->field_config['recargos31']['symbol_grp'], $this->field_config['recargos31']['symbol_dec'], "2", "S", $this->field_config['recargos31']['format_neg'], "", "", "-", $this->field_config['recargos31']['symbol_fmt']) ; 
      }
      if ('' !== $this->ice31 || (!empty($format_fields) && isset($format_fields['ice31'])))
      {
          nmgp_Form_Num_Val($this->ice31, $this->field_config['ice31']['symbol_grp'], $this->field_config['ice31']['symbol_dec'], "2", "S", $this->field_config['ice31']['format_neg'], "", "", "-", $this->field_config['ice31']['symbol_fmt']) ; 
      }
      if ((!empty($this->fecdocpr31) && 'null' != $this->fecdocpr31) || (!empty($format_fields) && isset($format_fields['fecdocpr31'])))
      {
          $nm_separa_data = strpos($this->field_config['fecdocpr31']['date_format'], ";") ;
          $guarda_format_hora = $this->field_config['fecdocpr31']['date_format'];
          $this->field_config['fecdocpr31']['date_format'] = substr($this->field_config['fecdocpr31']['date_format'], 0, $nm_separa_data) ;
          $separador = strpos($this->fecdocpr31, " ") ; 
          $this->fecdocpr31_hora = substr($this->fecdocpr31, $separador + 1) ; 
          $this->fecdocpr31 = substr($this->fecdocpr31, 0, $separador) ; 
          nm_volta_data($this->fecdocpr31, $this->field_config['fecdocpr31']['date_format']) ; 
          nmgp_Form_Datas($this->fecdocpr31, $this->field_config['fecdocpr31']['date_format'], $this->field_config['fecdocpr31']['date_sep']) ;  
          $this->field_config['fecdocpr31']['date_format'] = substr($guarda_format_hora, $nm_separa_data + 1) ;
          nm_volta_hora($this->fecdocpr31_hora, $this->field_config['fecdocpr31']['date_format']) ; 
          nmgp_Form_Hora($this->fecdocpr31_hora, $this->field_config['fecdocpr31']['date_format'], $this->field_config['fecdocpr31']['time_sep']) ;  
          $this->field_config['fecdocpr31']['date_format'] = $guarda_format_hora ;
      }
      elseif ('null' == $this->fecdocpr31 || '' == $this->fecdocpr31)
      {
          $this->fecdocpr31_hora = '';
          $this->fecdocpr31 = '';
      }
      if ('' !== $this->conta31 || (!empty($format_fields) && isset($format_fields['conta31'])))
      {
          nmgp_Form_Num_Val($this->conta31, $this->field_config['conta31']['symbol_grp'], $this->field_config['conta31']['symbol_dec'], "0", "S", $this->field_config['conta31']['format_neg'], "", "", "-", $this->field_config['conta31']['symbol_fmt']) ; 
      }
      if ((!empty($this->fecvencidocpr) && 'null' != $this->fecvencidocpr) || (!empty($format_fields) && isset($format_fields['fecvencidocpr'])))
      {
          $nm_separa_data = strpos($this->field_config['fecvencidocpr']['date_format'], ";") ;
          $guarda_format_hora = $this->field_config['fecvencidocpr']['date_format'];
          $this->field_config['fecvencidocpr']['date_format'] = substr($this->field_config['fecvencidocpr']['date_format'], 0, $nm_separa_data) ;
          $separador = strpos($this->fecvencidocpr, " ") ; 
          $this->fecvencidocpr_hora = substr($this->fecvencidocpr, $separador + 1) ; 
          $this->fecvencidocpr = substr($this->fecvencidocpr, 0, $separador) ; 
          nm_volta_data($this->fecvencidocpr, $this->field_config['fecvencidocpr']['date_format']) ; 
          nmgp_Form_Datas($this->fecvencidocpr, $this->field_config['fecvencidocpr']['date_format'], $this->field_config['fecvencidocpr']['date_sep']) ;  
          $this->field_config['fecvencidocpr']['date_format'] = substr($guarda_format_hora, $nm_separa_data + 1) ;
          nm_volta_hora($this->fecvencidocpr_hora, $this->field_config['fecvencidocpr']['date_format']) ; 
          nmgp_Form_Hora($this->fecvencidocpr_hora, $this->field_config['fecvencidocpr']['date_format'], $this->field_config['fecvencidocpr']['time_sep']) ;  
          $this->field_config['fecvencidocpr']['date_format'] = $guarda_format_hora ;
      }
      elseif ('null' == $this->fecvencidocpr || '' == $this->fecvencidocpr)
      {
          $this->fecvencidocpr_hora = '';
          $this->fecvencidocpr = '';
      }
      if ('' !== $this->totsiniva31 || (!empty($format_fields) && isset($format_fields['totsiniva31'])))
      {
          nmgp_Form_Num_Val($this->totsiniva31, $this->field_config['totsiniva31']['symbol_grp'], $this->field_config['totsiniva31']['symbol_dec'], "2", "S", $this->field_config['totsiniva31']['format_neg'], "", "", "-", $this->field_config['totsiniva31']['symbol_fmt']) ; 
      }
      if ((!empty($this->fecemb) && 'null' != $this->fecemb) || (!empty($format_fields) && isset($format_fields['fecemb'])))
      {
          nm_volta_data($this->fecemb, $this->field_config['fecemb']['date_format']) ; 
          nmgp_Form_Datas($this->fecemb, $this->field_config['fecemb']['date_format'], $this->field_config['fecemb']['date_sep']) ;  
      }
      elseif ('null' == $this->fecemb || '' == $this->fecemb)
      {
          $this->fecemb = '';
      }
      if ('' !== $this->baseice || (!empty($format_fields) && isset($format_fields['baseice'])))
      {
          nmgp_Form_Num_Val($this->baseice, $this->field_config['baseice']['symbol_grp'], $this->field_config['baseice']['symbol_dec'], "2", "S", $this->field_config['baseice']['format_neg'], "", "", "-", $this->field_config['baseice']['symbol_fmt']) ; 
      }
      if ('' !== $this->nbaseret43 || (!empty($format_fields) && isset($format_fields['nbaseret43'])))
      {
          nmgp_Form_Num_Val($this->nbaseret43, $this->field_config['nbaseret43']['symbol_grp'], $this->field_config['nbaseret43']['symbol_dec'], "2", "S", $this->field_config['nbaseret43']['format_neg'], "", "", "-", $this->field_config['nbaseret43']['symbol_fmt']) ; 
      }
      if ('' !== $this->npctjeret43 || (!empty($format_fields) && isset($format_fields['npctjeret43'])))
      {
          nmgp_Form_Num_Val($this->npctjeret43, $this->field_config['npctjeret43']['symbol_grp'], $this->field_config['npctjeret43']['symbol_dec'], "2", "S", $this->field_config['npctjeret43']['format_neg'], "", "", "-", $this->field_config['npctjeret43']['symbol_fmt']) ; 
      }
      if ('' !== $this->dstoley || (!empty($format_fields) && isset($format_fields['dstoley'])))
      {
          nmgp_Form_Num_Val($this->dstoley, $this->field_config['dstoley']['symbol_grp'], $this->field_config['dstoley']['symbol_dec'], "2", "S", $this->field_config['dstoley']['format_neg'], "", "", "-", $this->field_config['dstoley']['symbol_fmt']) ; 
      }
      if ('' !== $this->estado_electronico || (!empty($format_fields) && isset($format_fields['estado_electronico'])))
      {
          nmgp_Form_Num_Val($this->estado_electronico, $this->field_config['estado_electronico']['symbol_grp'], $this->field_config['estado_electronico']['symbol_dec'], "0", "S", $this->field_config['estado_electronico']['format_neg'], "", "", "-", $this->field_config['estado_electronico']['symbol_fmt']) ; 
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
      $guarda_format_hora = $this->field_config['fecfact31']['date_format'];
      if ($this->fecfact31 != "")  
      { 
          $nm_separa_data = strpos($this->field_config['fecfact31']['date_format'], ";") ;
          $this->field_config['fecfact31']['date_format'] = substr($this->field_config['fecfact31']['date_format'], 0, $nm_separa_data) ;
          nm_conv_data($this->fecfact31, $this->field_config['fecfact31']['date_format']) ; 
          if ('pdo_sqlsrv' == strtolower($this->Ini->nm_tpbanco) || 'pdo_dblib' == strtolower($this->Ini->nm_tpbanco))
          {
              $this->fecfact31 = str_replace('-', '', $this->fecfact31);
          }
          $this->field_config['fecfact31']['date_format'] = substr($guarda_format_hora, $nm_separa_data + 1) ;
          nm_conv_hora($this->fecfact31_hora, $this->field_config['fecfact31']['date_format']) ; 
          if ($this->fecfact31_hora == "" )  
          { 
              $this->fecfact31_hora = "00:00:00:000" ; 
          }
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
          {
              $this->fecfact31_hora = substr($this->fecfact31_hora, 0, -4) . "." . substr($this->fecfact31_hora, -3);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
          {
              $this->fecfact31_hora = substr($this->fecfact31_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->fecfact31_hora = substr($this->fecfact31_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $this->fecfact31_hora = substr($this->fecfact31_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $this->fecfact31_hora = substr($this->fecfact31_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
          {
              $this->fecfact31_hora = substr($this->fecfact31_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          {
              $this->fecfact31_hora = substr($this->fecfact31_hora, 0, -4);
          }
          if ($this->fecfact31 != "")  
          { 
              $this->fecfact31 .= " " . $this->fecfact31_hora ; 
          }
      } 
      $this->field_config['fecfact31']['date_format'] = $guarda_format_hora;
      $guarda_format_hora = $this->field_config['fecped31']['date_format'];
      if ($this->fecped31 != "")  
      { 
          $nm_separa_data = strpos($this->field_config['fecped31']['date_format'], ";") ;
          $this->field_config['fecped31']['date_format'] = substr($this->field_config['fecped31']['date_format'], 0, $nm_separa_data) ;
          nm_conv_data($this->fecped31, $this->field_config['fecped31']['date_format']) ; 
          if ('pdo_sqlsrv' == strtolower($this->Ini->nm_tpbanco) || 'pdo_dblib' == strtolower($this->Ini->nm_tpbanco))
          {
              $this->fecped31 = str_replace('-', '', $this->fecped31);
          }
          $this->field_config['fecped31']['date_format'] = substr($guarda_format_hora, $nm_separa_data + 1) ;
          nm_conv_hora($this->fecped31_hora, $this->field_config['fecped31']['date_format']) ; 
          if ($this->fecped31_hora == "" )  
          { 
              $this->fecped31_hora = "00:00:00:000" ; 
          }
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
          {
              $this->fecped31_hora = substr($this->fecped31_hora, 0, -4) . "." . substr($this->fecped31_hora, -3);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
          {
              $this->fecped31_hora = substr($this->fecped31_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->fecped31_hora = substr($this->fecped31_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $this->fecped31_hora = substr($this->fecped31_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $this->fecped31_hora = substr($this->fecped31_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
          {
              $this->fecped31_hora = substr($this->fecped31_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          {
              $this->fecped31_hora = substr($this->fecped31_hora, 0, -4);
          }
          if ($this->fecped31 != "")  
          { 
              $this->fecped31 .= " " . $this->fecped31_hora ; 
          }
      } 
      $this->field_config['fecped31']['date_format'] = $guarda_format_hora;
      $guarda_format_hora = $this->field_config['fectrasfer31']['date_format'];
      if ($this->fectrasfer31 != "")  
      { 
          nm_conv_data($this->fectrasfer31, $this->field_config['fectrasfer31']['date_format']) ; 
          $this->fectrasfer31_hora = "00:00:00:000" ; 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
          {
              $this->fectrasfer31_hora = substr($this->fectrasfer31_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->fectrasfer31_hora = substr($this->fectrasfer31_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $this->fectrasfer31_hora = substr($this->fectrasfer31_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $this->fectrasfer31_hora = substr($this->fectrasfer31_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
          {
              $this->fectrasfer31_hora = substr($this->fectrasfer31_hora, 0, -4);
          }
      } 
      if ($this->fectrasfer31 == "" && $use_null)  
      { 
          $this->fectrasfer31 = "null" ; 
      } 
      $this->field_config['fectrasfer31']['date_format'] = $guarda_format_hora;
      $guarda_format_hora = $this->field_config['fecdocpr31']['date_format'];
      if ($this->fecdocpr31 != "")  
      { 
          $nm_separa_data = strpos($this->field_config['fecdocpr31']['date_format'], ";") ;
          $this->field_config['fecdocpr31']['date_format'] = substr($this->field_config['fecdocpr31']['date_format'], 0, $nm_separa_data) ;
          nm_conv_data($this->fecdocpr31, $this->field_config['fecdocpr31']['date_format']) ; 
          if ('pdo_sqlsrv' == strtolower($this->Ini->nm_tpbanco) || 'pdo_dblib' == strtolower($this->Ini->nm_tpbanco))
          {
              $this->fecdocpr31 = str_replace('-', '', $this->fecdocpr31);
          }
          $this->field_config['fecdocpr31']['date_format'] = substr($guarda_format_hora, $nm_separa_data + 1) ;
          nm_conv_hora($this->fecdocpr31_hora, $this->field_config['fecdocpr31']['date_format']) ; 
          if ($this->fecdocpr31_hora == "" )  
          { 
              $this->fecdocpr31_hora = "00:00:00:000" ; 
          }
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
          {
              $this->fecdocpr31_hora = substr($this->fecdocpr31_hora, 0, -4) . "." . substr($this->fecdocpr31_hora, -3);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
          {
              $this->fecdocpr31_hora = substr($this->fecdocpr31_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->fecdocpr31_hora = substr($this->fecdocpr31_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $this->fecdocpr31_hora = substr($this->fecdocpr31_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $this->fecdocpr31_hora = substr($this->fecdocpr31_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
          {
              $this->fecdocpr31_hora = substr($this->fecdocpr31_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          {
              $this->fecdocpr31_hora = substr($this->fecdocpr31_hora, 0, -4);
          }
          if ($this->fecdocpr31 != "")  
          { 
              $this->fecdocpr31 .= " " . $this->fecdocpr31_hora ; 
          }
      } 
      if ($this->fecdocpr31 == "" && $use_null)  
      { 
          $this->fecdocpr31 = "null" ; 
      } 
      $this->field_config['fecdocpr31']['date_format'] = $guarda_format_hora;
      $guarda_format_hora = $this->field_config['fecvencidocpr']['date_format'];
      if ($this->fecvencidocpr != "")  
      { 
          $nm_separa_data = strpos($this->field_config['fecvencidocpr']['date_format'], ";") ;
          $this->field_config['fecvencidocpr']['date_format'] = substr($this->field_config['fecvencidocpr']['date_format'], 0, $nm_separa_data) ;
          nm_conv_data($this->fecvencidocpr, $this->field_config['fecvencidocpr']['date_format']) ; 
          if ('pdo_sqlsrv' == strtolower($this->Ini->nm_tpbanco) || 'pdo_dblib' == strtolower($this->Ini->nm_tpbanco))
          {
              $this->fecvencidocpr = str_replace('-', '', $this->fecvencidocpr);
          }
          $this->field_config['fecvencidocpr']['date_format'] = substr($guarda_format_hora, $nm_separa_data + 1) ;
          nm_conv_hora($this->fecvencidocpr_hora, $this->field_config['fecvencidocpr']['date_format']) ; 
          if ($this->fecvencidocpr_hora == "" )  
          { 
              $this->fecvencidocpr_hora = "00:00:00:000" ; 
          }
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
          {
              $this->fecvencidocpr_hora = substr($this->fecvencidocpr_hora, 0, -4) . "." . substr($this->fecvencidocpr_hora, -3);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
          {
              $this->fecvencidocpr_hora = substr($this->fecvencidocpr_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->fecvencidocpr_hora = substr($this->fecvencidocpr_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $this->fecvencidocpr_hora = substr($this->fecvencidocpr_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $this->fecvencidocpr_hora = substr($this->fecvencidocpr_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
          {
              $this->fecvencidocpr_hora = substr($this->fecvencidocpr_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          {
              $this->fecvencidocpr_hora = substr($this->fecvencidocpr_hora, 0, -4);
          }
          if ($this->fecvencidocpr != "")  
          { 
              $this->fecvencidocpr .= " " . $this->fecvencidocpr_hora ; 
          }
      } 
      if ($this->fecvencidocpr == "" && $use_null)  
      { 
          $this->fecvencidocpr = "null" ; 
      } 
      $this->field_config['fecvencidocpr']['date_format'] = $guarda_format_hora;
      $guarda_format_hora = $this->field_config['fecemb']['date_format'];
      if ($this->fecemb != "")  
      { 
          nm_conv_data($this->fecemb, $this->field_config['fecemb']['date_format']) ; 
          $this->fecemb_hora = "00:00:00:000" ; 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
          {
              $this->fecemb_hora = substr($this->fecemb_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->fecemb_hora = substr($this->fecemb_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $this->fecemb_hora = substr($this->fecemb_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $this->fecemb_hora = substr($this->fecemb_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
          {
              $this->fecemb_hora = substr($this->fecemb_hora, 0, -4);
          }
      } 
      if ($this->fecemb == "" && $use_null)  
      { 
          $this->fecemb = "null" ; 
      } 
      $this->field_config['fecemb']['date_format'] = $guarda_format_hora;
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
          $this->ajax_return_values_tipodocto31();
          $this->ajax_return_values_nofact31();
          $this->ajax_return_values_nocte31();
          $this->ajax_return_values_nomcte31();
          $this->ajax_return_values_localid31();
          $this->ajax_return_values_cvectenegro31();
          $this->ajax_return_values_vtabta31();
          $this->ajax_return_values_descto31();
          $this->ajax_return_values_flete31();
          $this->ajax_return_values_itm31();
          $this->ajax_return_values_novend31();
          $this->ajax_return_values_fecfact31();
          $this->ajax_return_values_condpag31();
          $this->ajax_return_values_nopagos31();
          $this->ajax_return_values_formapago31();
          $this->ajax_return_values_obra31();
          $this->ajax_return_values_orden31();
          $this->ajax_return_values_cvnegra31();
          $this->ajax_return_values_status31();
          $this->ajax_return_values_cvimpto31();
          $this->ajax_return_values_cvanulado31();
          $this->ajax_return_values_efectivo31();
          $this->ajax_return_values_cheque31();
          $this->ajax_return_values_tarjeta31();
          $this->ajax_return_values_acuenta31();
          $this->ajax_return_values_nobanco31();
          $this->ajax_return_values_nombanco31();
          $this->ajax_return_values_nocheque31();
          $this->ajax_return_values_notarjeta31();
          $this->ajax_return_values_nomtarjeta31();
          $this->ajax_return_values_cvdivisa31();
          $this->ajax_return_values_valdivisa31();
          $this->ajax_return_values_lineaprod31();
          $this->ajax_return_values_intereses31();
          $this->ajax_return_values_nopedido31();
          $this->ajax_return_values_fecped31();
          $this->ajax_return_values_ruc31();
          $this->ajax_return_values_tel31();
          $this->ajax_return_values_transpor31();
          $this->ajax_return_values_cvtransfer31();
          $this->ajax_return_values_fectrasfer31();
          $this->ajax_return_values_desctofp31();
          $this->ajax_return_values_catcte31();
          $this->ajax_return_values_uid();
          $this->ajax_return_values_recargos31();
          $this->ajax_return_values_ice31();
          $this->ajax_return_values_fecdocpr31();
          $this->ajax_return_values_tipocomp31();
          $this->ajax_return_values_conta31();
          $this->ajax_return_values_fecvencidocpr();
          $this->ajax_return_values_totsiniva31();
          $this->ajax_return_values_fecemb();
          $this->ajax_return_values_norefrendo();
          $this->ajax_return_values_baseice();
          $this->ajax_return_values_ncodret43();
          $this->ajax_return_values_nbaseret43();
          $this->ajax_return_values_npctjeret43();
          $this->ajax_return_values_contrato();
          $this->ajax_return_values_compra_general();
          $this->ajax_return_values_distribucion_rubros();
          $this->ajax_return_values_dstoley();
          $this->ajax_return_values_remgas31();
          $this->ajax_return_values_estado_electronico();
          $this->ajax_return_values_coddest31();
          if ('navigate_form' == $this->NM_ajax_opcao)
          {
              $this->NM_ajax_info['clearUpload']      = 'S';
              $this->NM_ajax_info['navStatus']['ret'] = $this->Nav_permite_ret ? 'S' : 'N';
              $this->NM_ajax_info['navStatus']['ava'] = $this->Nav_permite_ava ? 'S' : 'N';
              $this->NM_ajax_info['fldList']['tipodocto31']['keyVal'] = form_maecom_pack_protect_string($this->nmgp_dados_form['tipodocto31']);
              $this->NM_ajax_info['fldList']['nofact31']['keyVal'] = form_maecom_pack_protect_string($this->nmgp_dados_form['nofact31']);
          }
   } // ajax_return_values

          //----- tipodocto31
   function ajax_return_values_tipodocto31($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("tipodocto31", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->tipodocto31);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['tipodocto31'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($this->form_encode_input($sTmpValue)),
               'labList' => array($this->form_format_readonly("tipodocto31", $this->form_encode_input($sTmpValue))),
              );
          }
   }

          //----- nofact31
   function ajax_return_values_nofact31($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("nofact31", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->nofact31);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['nofact31'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($this->form_encode_input($sTmpValue)),
               'labList' => array($this->form_format_readonly("nofact31", $this->form_encode_input($sTmpValue))),
              );
          }
   }

          //----- nocte31
   function ajax_return_values_nocte31($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("nocte31", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->nocte31);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['nocte31'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- nomcte31
   function ajax_return_values_nomcte31($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("nomcte31", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->nomcte31);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['nomcte31'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- localid31
   function ajax_return_values_localid31($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("localid31", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->localid31);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['localid31'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- cvectenegro31
   function ajax_return_values_cvectenegro31($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("cvectenegro31", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->cvectenegro31);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['cvectenegro31'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- vtabta31
   function ajax_return_values_vtabta31($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("vtabta31", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->vtabta31);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['vtabta31'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- descto31
   function ajax_return_values_descto31($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("descto31", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->descto31);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['descto31'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- flete31
   function ajax_return_values_flete31($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("flete31", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->flete31);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['flete31'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- itm31
   function ajax_return_values_itm31($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("itm31", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->itm31);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['itm31'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- novend31
   function ajax_return_values_novend31($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("novend31", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->novend31);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['novend31'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- fecfact31
   function ajax_return_values_fecfact31($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("fecfact31", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->fecfact31);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['fecfact31'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->fecfact31 . ' ' . $this->fecfact31_hora),
              );
          }
   }

          //----- condpag31
   function ajax_return_values_condpag31($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("condpag31", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->condpag31);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['condpag31'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- nopagos31
   function ajax_return_values_nopagos31($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("nopagos31", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->nopagos31);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['nopagos31'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- formapago31
   function ajax_return_values_formapago31($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("formapago31", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->formapago31);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['formapago31'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- obra31
   function ajax_return_values_obra31($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("obra31", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->obra31);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['obra31'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- orden31
   function ajax_return_values_orden31($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("orden31", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->orden31);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['orden31'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- cvnegra31
   function ajax_return_values_cvnegra31($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("cvnegra31", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->cvnegra31);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['cvnegra31'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- status31
   function ajax_return_values_status31($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("status31", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->status31);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['status31'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- cvimpto31
   function ajax_return_values_cvimpto31($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("cvimpto31", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->cvimpto31);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['cvimpto31'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- cvanulado31
   function ajax_return_values_cvanulado31($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("cvanulado31", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->cvanulado31);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['cvanulado31'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- efectivo31
   function ajax_return_values_efectivo31($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("efectivo31", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->efectivo31);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['efectivo31'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- cheque31
   function ajax_return_values_cheque31($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("cheque31", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->cheque31);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['cheque31'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- tarjeta31
   function ajax_return_values_tarjeta31($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("tarjeta31", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->tarjeta31);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['tarjeta31'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- acuenta31
   function ajax_return_values_acuenta31($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("acuenta31", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->acuenta31);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['acuenta31'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- nobanco31
   function ajax_return_values_nobanco31($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("nobanco31", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->nobanco31);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['nobanco31'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- nombanco31
   function ajax_return_values_nombanco31($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("nombanco31", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->nombanco31);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['nombanco31'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- nocheque31
   function ajax_return_values_nocheque31($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("nocheque31", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->nocheque31);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['nocheque31'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- notarjeta31
   function ajax_return_values_notarjeta31($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("notarjeta31", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->notarjeta31);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['notarjeta31'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- nomtarjeta31
   function ajax_return_values_nomtarjeta31($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("nomtarjeta31", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->nomtarjeta31);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['nomtarjeta31'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- cvdivisa31
   function ajax_return_values_cvdivisa31($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("cvdivisa31", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->cvdivisa31);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['cvdivisa31'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- valdivisa31
   function ajax_return_values_valdivisa31($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("valdivisa31", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->valdivisa31);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['valdivisa31'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- lineaprod31
   function ajax_return_values_lineaprod31($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("lineaprod31", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->lineaprod31);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['lineaprod31'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- intereses31
   function ajax_return_values_intereses31($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("intereses31", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->intereses31);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['intereses31'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- nopedido31
   function ajax_return_values_nopedido31($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("nopedido31", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->nopedido31);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['nopedido31'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- fecped31
   function ajax_return_values_fecped31($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("fecped31", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->fecped31);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['fecped31'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->fecped31 . ' ' . $this->fecped31_hora),
              );
          }
   }

          //----- ruc31
   function ajax_return_values_ruc31($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("ruc31", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->ruc31);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['ruc31'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- tel31
   function ajax_return_values_tel31($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("tel31", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->tel31);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['tel31'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- transpor31
   function ajax_return_values_transpor31($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("transpor31", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->transpor31);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['transpor31'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- cvtransfer31
   function ajax_return_values_cvtransfer31($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("cvtransfer31", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->cvtransfer31);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['cvtransfer31'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- fectrasfer31
   function ajax_return_values_fectrasfer31($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("fectrasfer31", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->fectrasfer31);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['fectrasfer31'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- desctofp31
   function ajax_return_values_desctofp31($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("desctofp31", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->desctofp31);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['desctofp31'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- catcte31
   function ajax_return_values_catcte31($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("catcte31", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->catcte31);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['catcte31'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- uid
   function ajax_return_values_uid($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("uid", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->uid);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['uid'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- recargos31
   function ajax_return_values_recargos31($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("recargos31", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->recargos31);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['recargos31'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- ice31
   function ajax_return_values_ice31($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("ice31", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->ice31);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['ice31'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- fecdocpr31
   function ajax_return_values_fecdocpr31($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("fecdocpr31", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->fecdocpr31);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['fecdocpr31'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->fecdocpr31 . ' ' . $this->fecdocpr31_hora),
              );
          }
   }

          //----- tipocomp31
   function ajax_return_values_tipocomp31($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("tipocomp31", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->tipocomp31);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['tipocomp31'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- conta31
   function ajax_return_values_conta31($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("conta31", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->conta31);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['conta31'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- fecvencidocpr
   function ajax_return_values_fecvencidocpr($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("fecvencidocpr", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->fecvencidocpr);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['fecvencidocpr'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->fecvencidocpr . ' ' . $this->fecvencidocpr_hora),
              );
          }
   }

          //----- totsiniva31
   function ajax_return_values_totsiniva31($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("totsiniva31", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->totsiniva31);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['totsiniva31'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- fecemb
   function ajax_return_values_fecemb($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("fecemb", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->fecemb);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['fecemb'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- norefrendo
   function ajax_return_values_norefrendo($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("norefrendo", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->norefrendo);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['norefrendo'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- baseice
   function ajax_return_values_baseice($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("baseice", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->baseice);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['baseice'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- ncodret43
   function ajax_return_values_ncodret43($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("ncodret43", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->ncodret43);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['ncodret43'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- nbaseret43
   function ajax_return_values_nbaseret43($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("nbaseret43", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->nbaseret43);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['nbaseret43'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- npctjeret43
   function ajax_return_values_npctjeret43($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("npctjeret43", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->npctjeret43);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['npctjeret43'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- contrato
   function ajax_return_values_contrato($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("contrato", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->contrato);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['contrato'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- compra_general
   function ajax_return_values_compra_general($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("compra_general", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->compra_general);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['compra_general'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- distribucion_rubros
   function ajax_return_values_distribucion_rubros($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("distribucion_rubros", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->distribucion_rubros);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['distribucion_rubros'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- dstoley
   function ajax_return_values_dstoley($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("dstoley", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->dstoley);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['dstoley'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- remgas31
   function ajax_return_values_remgas31($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("remgas31", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->remgas31);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['remgas31'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- estado_electronico
   function ajax_return_values_estado_electronico($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("estado_electronico", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->estado_electronico);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['estado_electronico'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- coddest31
   function ajax_return_values_coddest31($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("coddest31", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->coddest31);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['coddest31'] = array(
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
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['upload_dir'][$fieldName]))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['upload_dir'][$fieldName] = array();
            $resDir = @opendir($uploadDir);
            if (!$resDir)
            {
                return $originalName;
            }
            while (false !== ($fileName = @readdir($resDir)))
            {
                if (@is_file($uploadDir . $fileName))
                {
                    $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['upload_dir'][$fieldName][] = $fileName;
                }
            }
            @closedir($resDir);
        }
        if (!in_array($originalName, $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['upload_dir'][$fieldName]))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['upload_dir'][$fieldName][] = $originalName;
            return $originalName;
        }
        else
        {
            $newName = $this->fetchFileNextName($originalName, $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['upload_dir'][$fieldName]);
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['upload_dir'][$fieldName][] = $newName;
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
      $this->vtabta31 = str_replace($sc_parm1, $sc_parm2, $this->vtabta31); 
      $this->descto31 = str_replace($sc_parm1, $sc_parm2, $this->descto31); 
      $this->flete31 = str_replace($sc_parm1, $sc_parm2, $this->flete31); 
      $this->itm31 = str_replace($sc_parm1, $sc_parm2, $this->itm31); 
      $this->efectivo31 = str_replace($sc_parm1, $sc_parm2, $this->efectivo31); 
      $this->cheque31 = str_replace($sc_parm1, $sc_parm2, $this->cheque31); 
      $this->tarjeta31 = str_replace($sc_parm1, $sc_parm2, $this->tarjeta31); 
      $this->acuenta31 = str_replace($sc_parm1, $sc_parm2, $this->acuenta31); 
      $this->intereses31 = str_replace($sc_parm1, $sc_parm2, $this->intereses31); 
      $this->desctofp31 = str_replace($sc_parm1, $sc_parm2, $this->desctofp31); 
      $this->recargos31 = str_replace($sc_parm1, $sc_parm2, $this->recargos31); 
      $this->ice31 = str_replace($sc_parm1, $sc_parm2, $this->ice31); 
      $this->totsiniva31 = str_replace($sc_parm1, $sc_parm2, $this->totsiniva31); 
      $this->baseice = str_replace($sc_parm1, $sc_parm2, $this->baseice); 
      $this->nbaseret43 = str_replace($sc_parm1, $sc_parm2, $this->nbaseret43); 
      $this->npctjeret43 = str_replace($sc_parm1, $sc_parm2, $this->npctjeret43); 
      $this->dstoley = str_replace($sc_parm1, $sc_parm2, $this->dstoley); 
   } 
   function nm_poe_aspas_decimal() 
   { 
      $this->vtabta31 = "'" . $this->vtabta31 . "'";
      $this->descto31 = "'" . $this->descto31 . "'";
      $this->flete31 = "'" . $this->flete31 . "'";
      $this->itm31 = "'" . $this->itm31 . "'";
      $this->efectivo31 = "'" . $this->efectivo31 . "'";
      $this->cheque31 = "'" . $this->cheque31 . "'";
      $this->tarjeta31 = "'" . $this->tarjeta31 . "'";
      $this->acuenta31 = "'" . $this->acuenta31 . "'";
      $this->intereses31 = "'" . $this->intereses31 . "'";
      $this->desctofp31 = "'" . $this->desctofp31 . "'";
      $this->recargos31 = "'" . $this->recargos31 . "'";
      $this->ice31 = "'" . $this->ice31 . "'";
      $this->totsiniva31 = "'" . $this->totsiniva31 . "'";
      $this->baseice = "'" . $this->baseice . "'";
      $this->nbaseret43 = "'" . $this->nbaseret43 . "'";
      $this->npctjeret43 = "'" . $this->npctjeret43 . "'";
      $this->dstoley = "'" . $this->dstoley . "'";
   } 
   function nm_tira_aspas_decimal() 
   { 
      $this->vtabta31 = str_replace("'", "", $this->vtabta31); 
      $this->descto31 = str_replace("'", "", $this->descto31); 
      $this->flete31 = str_replace("'", "", $this->flete31); 
      $this->itm31 = str_replace("'", "", $this->itm31); 
      $this->efectivo31 = str_replace("'", "", $this->efectivo31); 
      $this->cheque31 = str_replace("'", "", $this->cheque31); 
      $this->tarjeta31 = str_replace("'", "", $this->tarjeta31); 
      $this->acuenta31 = str_replace("'", "", $this->acuenta31); 
      $this->intereses31 = str_replace("'", "", $this->intereses31); 
      $this->desctofp31 = str_replace("'", "", $this->desctofp31); 
      $this->recargos31 = str_replace("'", "", $this->recargos31); 
      $this->ice31 = str_replace("'", "", $this->ice31); 
      $this->totsiniva31 = str_replace("'", "", $this->totsiniva31); 
      $this->baseice = str_replace("'", "", $this->baseice); 
      $this->nbaseret43 = str_replace("'", "", $this->nbaseret43); 
      $this->npctjeret43 = str_replace("'", "", $this->npctjeret43); 
      $this->dstoley = str_replace("'", "", $this->dstoley); 
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
      $NM_val_form['tipodocto31'] = $this->tipodocto31;
      $NM_val_form['nofact31'] = $this->nofact31;
      $NM_val_form['nocte31'] = $this->nocte31;
      $NM_val_form['nomcte31'] = $this->nomcte31;
      $NM_val_form['localid31'] = $this->localid31;
      $NM_val_form['cvectenegro31'] = $this->cvectenegro31;
      $NM_val_form['vtabta31'] = $this->vtabta31;
      $NM_val_form['descto31'] = $this->descto31;
      $NM_val_form['flete31'] = $this->flete31;
      $NM_val_form['itm31'] = $this->itm31;
      $NM_val_form['novend31'] = $this->novend31;
      $NM_val_form['fecfact31'] = $this->fecfact31;
      $NM_val_form['condpag31'] = $this->condpag31;
      $NM_val_form['nopagos31'] = $this->nopagos31;
      $NM_val_form['formapago31'] = $this->formapago31;
      $NM_val_form['obra31'] = $this->obra31;
      $NM_val_form['orden31'] = $this->orden31;
      $NM_val_form['cvnegra31'] = $this->cvnegra31;
      $NM_val_form['status31'] = $this->status31;
      $NM_val_form['cvimpto31'] = $this->cvimpto31;
      $NM_val_form['cvanulado31'] = $this->cvanulado31;
      $NM_val_form['efectivo31'] = $this->efectivo31;
      $NM_val_form['cheque31'] = $this->cheque31;
      $NM_val_form['tarjeta31'] = $this->tarjeta31;
      $NM_val_form['acuenta31'] = $this->acuenta31;
      $NM_val_form['nobanco31'] = $this->nobanco31;
      $NM_val_form['nombanco31'] = $this->nombanco31;
      $NM_val_form['nocheque31'] = $this->nocheque31;
      $NM_val_form['notarjeta31'] = $this->notarjeta31;
      $NM_val_form['nomtarjeta31'] = $this->nomtarjeta31;
      $NM_val_form['cvdivisa31'] = $this->cvdivisa31;
      $NM_val_form['valdivisa31'] = $this->valdivisa31;
      $NM_val_form['lineaprod31'] = $this->lineaprod31;
      $NM_val_form['intereses31'] = $this->intereses31;
      $NM_val_form['nopedido31'] = $this->nopedido31;
      $NM_val_form['fecped31'] = $this->fecped31;
      $NM_val_form['ruc31'] = $this->ruc31;
      $NM_val_form['tel31'] = $this->tel31;
      $NM_val_form['transpor31'] = $this->transpor31;
      $NM_val_form['cvtransfer31'] = $this->cvtransfer31;
      $NM_val_form['fectrasfer31'] = $this->fectrasfer31;
      $NM_val_form['desctofp31'] = $this->desctofp31;
      $NM_val_form['catcte31'] = $this->catcte31;
      $NM_val_form['uid'] = $this->uid;
      $NM_val_form['recargos31'] = $this->recargos31;
      $NM_val_form['ice31'] = $this->ice31;
      $NM_val_form['fecdocpr31'] = $this->fecdocpr31;
      $NM_val_form['tipocomp31'] = $this->tipocomp31;
      $NM_val_form['conta31'] = $this->conta31;
      $NM_val_form['fecvencidocpr'] = $this->fecvencidocpr;
      $NM_val_form['totsiniva31'] = $this->totsiniva31;
      $NM_val_form['fecemb'] = $this->fecemb;
      $NM_val_form['norefrendo'] = $this->norefrendo;
      $NM_val_form['baseice'] = $this->baseice;
      $NM_val_form['ncodret43'] = $this->ncodret43;
      $NM_val_form['nbaseret43'] = $this->nbaseret43;
      $NM_val_form['npctjeret43'] = $this->npctjeret43;
      $NM_val_form['contrato'] = $this->contrato;
      $NM_val_form['compra_general'] = $this->compra_general;
      $NM_val_form['distribucion_rubros'] = $this->distribucion_rubros;
      $NM_val_form['dstoley'] = $this->dstoley;
      $NM_val_form['remgas31'] = $this->remgas31;
      $NM_val_form['estado_electronico'] = $this->estado_electronico;
      $NM_val_form['coddest31'] = $this->coddest31;
      if ($this->nmgp_opcao == "alterar")
      {
      if ($this->vtabta31 === "" || is_null($this->vtabta31))  
      { 
          $this->vtabta31 = 0;
          $this->sc_force_zero[] = 'vtabta31';
      } 
      }
      if ($this->nmgp_opcao == "alterar")
      {
      if ($this->descto31 === "" || is_null($this->descto31))  
      { 
          $this->descto31 = 0;
          $this->sc_force_zero[] = 'descto31';
      } 
      }
      if ($this->nmgp_opcao == "alterar")
      {
      if ($this->flete31 === "" || is_null($this->flete31))  
      { 
          $this->flete31 = 0;
          $this->sc_force_zero[] = 'flete31';
      } 
      }
      if ($this->nmgp_opcao == "alterar")
      {
      if ($this->itm31 === "" || is_null($this->itm31))  
      { 
          $this->itm31 = 0;
          $this->sc_force_zero[] = 'itm31';
      } 
      }
      if ($this->nmgp_opcao == "alterar")
      {
      }
      if ($this->condpag31 === "" || is_null($this->condpag31))  
      { 
          $this->condpag31 = 0;
          $this->sc_force_zero[] = 'condpag31';
      } 
      if ($this->nopagos31 === "" || is_null($this->nopagos31))  
      { 
          $this->nopagos31 = 0;
          $this->sc_force_zero[] = 'nopagos31';
      } 
      if ($this->formapago31 === "" || is_null($this->formapago31))  
      { 
          $this->formapago31 = 0;
          $this->sc_force_zero[] = 'formapago31';
      } 
      if ($this->cvnegra31 === "" || is_null($this->cvnegra31))  
      { 
          $this->cvnegra31 = 0;
          $this->sc_force_zero[] = 'cvnegra31';
      } 
      if ($this->nmgp_opcao == "alterar")
      {
      if ($this->status31 === "" || is_null($this->status31))  
      { 
          $this->status31 = 0;
          $this->sc_force_zero[] = 'status31';
      } 
      }
      if ($this->cvimpto31 === "" || is_null($this->cvimpto31))  
      { 
          $this->cvimpto31 = 0;
          $this->sc_force_zero[] = 'cvimpto31';
      } 
      if ($this->nmgp_opcao == "alterar")
      {
      if ($this->cvanulado31 === "" || is_null($this->cvanulado31))  
      { 
          $this->cvanulado31 = 0;
          $this->sc_force_zero[] = 'cvanulado31';
      } 
      }
      if ($this->nmgp_opcao == "alterar")
      {
      if ($this->efectivo31 === "" || is_null($this->efectivo31))  
      { 
          $this->efectivo31 = 0;
          $this->sc_force_zero[] = 'efectivo31';
      } 
      }
      if ($this->nmgp_opcao == "alterar")
      {
      if ($this->cheque31 === "" || is_null($this->cheque31))  
      { 
          $this->cheque31 = 0;
          $this->sc_force_zero[] = 'cheque31';
      } 
      }
      if ($this->nmgp_opcao == "alterar")
      {
      if ($this->tarjeta31 === "" || is_null($this->tarjeta31))  
      { 
          $this->tarjeta31 = 0;
          $this->sc_force_zero[] = 'tarjeta31';
      } 
      }
      if ($this->nmgp_opcao == "alterar")
      {
      if ($this->acuenta31 === "" || is_null($this->acuenta31))  
      { 
          $this->acuenta31 = 0;
          $this->sc_force_zero[] = 'acuenta31';
      } 
      }
      if ($this->nmgp_opcao == "alterar")
      {
      if ($this->intereses31 === "" || is_null($this->intereses31))  
      { 
          $this->intereses31 = 0;
          $this->sc_force_zero[] = 'intereses31';
      } 
      }
      if ($this->nmgp_opcao == "alterar")
      {
      }
      if ($this->nmgp_opcao == "alterar")
      {
      }
      if ($this->desctofp31 === "" || is_null($this->desctofp31))  
      { 
          $this->desctofp31 = 0;
          $this->sc_force_zero[] = 'desctofp31';
      } 
      if ($this->nmgp_opcao == "alterar")
      {
      }
      if ($this->uid === "" || is_null($this->uid))  
      { 
          $this->uid = 0;
          $this->sc_force_zero[] = 'uid';
      } 
      if ($this->recargos31 === "" || is_null($this->recargos31))  
      { 
          $this->recargos31 = 0;
          $this->sc_force_zero[] = 'recargos31';
      } 
      if ($this->nmgp_opcao == "alterar")
      {
      if ($this->ice31 === "" || is_null($this->ice31))  
      { 
          $this->ice31 = 0;
          $this->sc_force_zero[] = 'ice31';
      } 
      }
      if ($this->conta31 === "" || is_null($this->conta31))  
      { 
          $this->conta31 = 0;
          $this->sc_force_zero[] = 'conta31';
      } 
      if ($this->nmgp_opcao == "alterar")
      {
      if ($this->totsiniva31 === "" || is_null($this->totsiniva31))  
      { 
          $this->totsiniva31 = 0;
          $this->sc_force_zero[] = 'totsiniva31';
      } 
      }
      if ($this->baseice === "" || is_null($this->baseice))  
      { 
          $this->baseice = 0;
          $this->sc_force_zero[] = 'baseice';
      } 
      if ($this->nmgp_opcao == "alterar")
      {
      if ($this->nbaseret43 === "" || is_null($this->nbaseret43))  
      { 
          $this->nbaseret43 = 0;
          $this->sc_force_zero[] = 'nbaseret43';
      } 
      }
      if ($this->nmgp_opcao == "alterar")
      {
      if ($this->npctjeret43 === "" || is_null($this->npctjeret43))  
      { 
          $this->npctjeret43 = 0;
          $this->sc_force_zero[] = 'npctjeret43';
      } 
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
      if ($this->nmgp_opcao == "alterar")
      {
      if ($this->dstoley === "" || is_null($this->dstoley))  
      { 
          $this->dstoley = 0;
          $this->sc_force_zero[] = 'dstoley';
      } 
      }
      if ($this->nmgp_opcao == "alterar")
      {
      if ($this->estado_electronico === "" || is_null($this->estado_electronico))  
      { 
          $this->estado_electronico = 0;
          $this->sc_force_zero[] = 'estado_electronico';
      } 
      }
      $nm_bases_lob_geral = array_merge($this->Ini->nm_bases_oracle, $this->Ini->nm_bases_ibase, $this->Ini->nm_bases_informix, $this->Ini->nm_bases_mysql, $this->Ini->nm_bases_access, $this->Ini->nm_bases_sqlite, array('pdo_ibm'), array('pdo_sqlsrv'));
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['decimal_db'] == ",") 
      {
          $this->nm_troca_decimal(".", ",");
      }
      if ($this->nmgp_opcao == "alterar" || $this->nmgp_opcao == "incluir") 
      {
          $this->tipodocto31_before_qstr = $this->tipodocto31;
          $this->tipodocto31 = substr($this->Db->qstr($this->tipodocto31), 1, -1); 
          if ($this->tipodocto31 == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->tipodocto31 = "null"; 
              $NM_val_null[] = "tipodocto31";
          } 
          $this->nofact31_before_qstr = $this->nofact31;
          $this->nofact31 = substr($this->Db->qstr($this->nofact31), 1, -1); 
          if ($this->nofact31 == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->nofact31 = "null"; 
              $NM_val_null[] = "nofact31";
          } 
          $this->nocte31_before_qstr = $this->nocte31;
          $this->nocte31 = substr($this->Db->qstr($this->nocte31), 1, -1); 
          if ($this->nocte31 == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->nocte31 = "null"; 
              $NM_val_null[] = "nocte31";
          } 
          $this->nomcte31_before_qstr = $this->nomcte31;
          $this->nomcte31 = substr($this->Db->qstr($this->nomcte31), 1, -1); 
          if ($this->nomcte31 == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->nomcte31 = "null"; 
              $NM_val_null[] = "nomcte31";
          } 
          $this->localid31_before_qstr = $this->localid31;
          $this->localid31 = substr($this->Db->qstr($this->localid31), 1, -1); 
          if ($this->localid31 == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->localid31 = "null"; 
              $NM_val_null[] = "localid31";
          } 
          $this->cvectenegro31_before_qstr = $this->cvectenegro31;
          $this->cvectenegro31 = substr($this->Db->qstr($this->cvectenegro31), 1, -1); 
          if ($this->cvectenegro31 == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->cvectenegro31 = "null"; 
              $NM_val_null[] = "cvectenegro31";
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
          if ($this->nmgp_opcao == "alterar") 
          {
          }
          $this->novend31_before_qstr = $this->novend31;
          $this->novend31 = substr($this->Db->qstr($this->novend31), 1, -1); 
          if ($this->novend31 == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->novend31 = "null"; 
              $NM_val_null[] = "novend31";
          } 
          if ($this->nmgp_opcao == "alterar") 
          {
              if ($this->fecfact31 == "")  
              { 
                  $this->fecfact31 = "null"; 
                  $NM_val_null[] = "fecfact31";
              } 
              if ($this->fecfact31 == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
              { 
                  $this->fecfact31 = "null"; 
                  $NM_val_null[] = "fecfact31";
              } 
          }
          $this->obra31_before_qstr = $this->obra31;
          $this->obra31 = substr($this->Db->qstr($this->obra31), 1, -1); 
          if ($this->obra31 == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->obra31 = "null"; 
              $NM_val_null[] = "obra31";
          } 
          $this->orden31_before_qstr = $this->orden31;
          $this->orden31 = substr($this->Db->qstr($this->orden31), 1, -1); 
          if ($this->orden31 == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->orden31 = "null"; 
              $NM_val_null[] = "orden31";
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
          if ($this->nmgp_opcao == "alterar") 
          {
          }
          if ($this->nmgp_opcao == "alterar") 
          {
          }
          if ($this->nmgp_opcao == "alterar") 
          {
          }
          $this->nobanco31_before_qstr = $this->nobanco31;
          $this->nobanco31 = substr($this->Db->qstr($this->nobanco31), 1, -1); 
          if ($this->nobanco31 == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->nobanco31 = "null"; 
              $NM_val_null[] = "nobanco31";
          } 
          $this->nombanco31_before_qstr = $this->nombanco31;
          $this->nombanco31 = substr($this->Db->qstr($this->nombanco31), 1, -1); 
          if ($this->nombanco31 == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->nombanco31 = "null"; 
              $NM_val_null[] = "nombanco31";
          } 
          $this->nocheque31_before_qstr = $this->nocheque31;
          $this->nocheque31 = substr($this->Db->qstr($this->nocheque31), 1, -1); 
          if ($this->nocheque31 == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->nocheque31 = "null"; 
              $NM_val_null[] = "nocheque31";
          } 
          $this->notarjeta31_before_qstr = $this->notarjeta31;
          $this->notarjeta31 = substr($this->Db->qstr($this->notarjeta31), 1, -1); 
          if ($this->notarjeta31 == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->notarjeta31 = "null"; 
              $NM_val_null[] = "notarjeta31";
          } 
          $this->nomtarjeta31_before_qstr = $this->nomtarjeta31;
          $this->nomtarjeta31 = substr($this->Db->qstr($this->nomtarjeta31), 1, -1); 
          if ($this->nomtarjeta31 == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->nomtarjeta31 = "null"; 
              $NM_val_null[] = "nomtarjeta31";
          } 
          $this->cvdivisa31_before_qstr = $this->cvdivisa31;
          $this->cvdivisa31 = substr($this->Db->qstr($this->cvdivisa31), 1, -1); 
          if ($this->cvdivisa31 == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->cvdivisa31 = "null"; 
              $NM_val_null[] = "cvdivisa31";
          } 
          $this->valdivisa31_before_qstr = $this->valdivisa31;
          $this->valdivisa31 = substr($this->Db->qstr($this->valdivisa31), 1, -1); 
          if ($this->valdivisa31 == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->valdivisa31 = "null"; 
              $NM_val_null[] = "valdivisa31";
          } 
          $this->lineaprod31_before_qstr = $this->lineaprod31;
          $this->lineaprod31 = substr($this->Db->qstr($this->lineaprod31), 1, -1); 
          if ($this->lineaprod31 == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->lineaprod31 = "null"; 
              $NM_val_null[] = "lineaprod31";
          } 
          if ($this->nmgp_opcao == "alterar") 
          {
          }
          $this->nopedido31_before_qstr = $this->nopedido31;
          $this->nopedido31 = substr($this->Db->qstr($this->nopedido31), 1, -1); 
          if ($this->nopedido31 == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->nopedido31 = "null"; 
              $NM_val_null[] = "nopedido31";
          } 
          if ($this->nmgp_opcao == "alterar") 
          {
              if ($this->fecped31 == "")  
              { 
                  $this->fecped31 = "null"; 
                  $NM_val_null[] = "fecped31";
              } 
              if ($this->fecped31 == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
              { 
                  $this->fecped31 = "null"; 
                  $NM_val_null[] = "fecped31";
              } 
          }
          $this->ruc31_before_qstr = $this->ruc31;
          $this->ruc31 = substr($this->Db->qstr($this->ruc31), 1, -1); 
          if ($this->ruc31 == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->ruc31 = "null"; 
              $NM_val_null[] = "ruc31";
          } 
          $this->tel31_before_qstr = $this->tel31;
          $this->tel31 = substr($this->Db->qstr($this->tel31), 1, -1); 
          if ($this->tel31 == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->tel31 = "null"; 
              $NM_val_null[] = "tel31";
          } 
          $this->transpor31_before_qstr = $this->transpor31;
          $this->transpor31 = substr($this->Db->qstr($this->transpor31), 1, -1); 
          if ($this->transpor31 == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->transpor31 = "null"; 
              $NM_val_null[] = "transpor31";
          } 
          $this->cvtransfer31_before_qstr = $this->cvtransfer31;
          $this->cvtransfer31 = substr($this->Db->qstr($this->cvtransfer31), 1, -1); 
          if ($this->nmgp_opcao == "alterar") 
          {
              if ($this->cvtransfer31 == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
              { 
                  $this->cvtransfer31 = "null"; 
                  $NM_val_null[] = "cvtransfer31";
              } 
          }
          if ($this->fectrasfer31 == "")  
          { 
              $this->fectrasfer31 = "null"; 
              $NM_val_null[] = "fectrasfer31";
          } 
          $this->catcte31_before_qstr = $this->catcte31;
          $this->catcte31 = substr($this->Db->qstr($this->catcte31), 1, -1); 
          if ($this->nmgp_opcao == "alterar") 
          {
              if ($this->catcte31 == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
              { 
                  $this->catcte31 = "null"; 
                  $NM_val_null[] = "catcte31";
              } 
          }
          if ($this->nmgp_opcao == "alterar") 
          {
          }
          if ($this->fecdocpr31 == "")  
          { 
              $this->fecdocpr31 = "null"; 
              $NM_val_null[] = "fecdocpr31";
          } 
          $this->tipocomp31_before_qstr = $this->tipocomp31;
          $this->tipocomp31 = substr($this->Db->qstr($this->tipocomp31), 1, -1); 
          if ($this->tipocomp31 == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->tipocomp31 = "null"; 
              $NM_val_null[] = "tipocomp31";
          } 
          if ($this->fecvencidocpr == "")  
          { 
              $this->fecvencidocpr = "null"; 
              $NM_val_null[] = "fecvencidocpr";
          } 
          if ($this->nmgp_opcao == "alterar") 
          {
          }
          if ($this->fecemb == "")  
          { 
              $this->fecemb = "null"; 
              $NM_val_null[] = "fecemb";
          } 
          $this->norefrendo_before_qstr = $this->norefrendo;
          $this->norefrendo = substr($this->Db->qstr($this->norefrendo), 1, -1); 
          if ($this->norefrendo == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->norefrendo = "null"; 
              $NM_val_null[] = "norefrendo";
          } 
          $this->ncodret43_before_qstr = $this->ncodret43;
          $this->ncodret43 = substr($this->Db->qstr($this->ncodret43), 1, -1); 
          if ($this->ncodret43 == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->ncodret43 = "null"; 
              $NM_val_null[] = "ncodret43";
          } 
          if ($this->nmgp_opcao == "alterar") 
          {
          }
          if ($this->nmgp_opcao == "alterar") 
          {
          }
          $this->contrato_before_qstr = $this->contrato;
          $this->contrato = substr($this->Db->qstr($this->contrato), 1, -1); 
          if ($this->nmgp_opcao == "alterar") 
          {
              if ($this->contrato == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
              { 
                  $this->contrato = "null"; 
                  $NM_val_null[] = "contrato";
              } 
          }
          $this->compra_general_before_qstr = $this->compra_general;
          $this->compra_general = substr($this->Db->qstr($this->compra_general), 1, -1); 
          if ($this->nmgp_opcao == "alterar") 
          {
              if ($this->compra_general == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
              { 
                  $this->compra_general = "null"; 
                  $NM_val_null[] = "compra_general";
              } 
          }
          $this->distribucion_rubros_before_qstr = $this->distribucion_rubros;
          $this->distribucion_rubros = substr($this->Db->qstr($this->distribucion_rubros), 1, -1); 
          if ($this->nmgp_opcao == "alterar") 
          {
              if ($this->distribucion_rubros == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
              { 
                  $this->distribucion_rubros = "null"; 
                  $NM_val_null[] = "distribucion_rubros";
              } 
          }
          if ($this->nmgp_opcao == "alterar") 
          {
          }
          $this->remgas31_before_qstr = $this->remgas31;
          $this->remgas31 = substr($this->Db->qstr($this->remgas31), 1, -1); 
          if ($this->remgas31 == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->remgas31 = "null"; 
              $NM_val_null[] = "remgas31";
          } 
          if ($this->nmgp_opcao == "alterar") 
          {
          }
          $this->coddest31_before_qstr = $this->coddest31;
          $this->coddest31 = substr($this->Db->qstr($this->coddest31), 1, -1); 
          if ($this->coddest31 == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->coddest31 = "null"; 
              $NM_val_null[] = "coddest31";
          } 
      }
      if ($this->nmgp_opcao == "alterar") 
      {
          $SC_fields_update = array(); 
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['foreign_key'] as $sFKName => $sFKValue)
              {
                   if (isset($this->sc_conv_var[$sFKName]))
                   {
                       $sFKName = $this->sc_conv_var[$sFKName];
                   }
                  eval("\$this->" . $sFKName . " = \"" . $sFKValue . "\";");
              }
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['decimal_db'] == ",") 
          {
              $this->nm_poe_aspas_decimal();
          }
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where tipodocto31 = '$this->tipodocto31' and nofact31 = '$this->nofact31' ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where tipodocto31 = '$this->tipodocto31' and nofact31 = '$this->nofact31' "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where tipodocto31 = '$this->tipodocto31' and nofact31 = '$this->nofact31' ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where tipodocto31 = '$this->tipodocto31' and nofact31 = '$this->nofact31' "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where tipodocto31 = '$this->tipodocto31' and nofact31 = '$this->nofact31' ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where tipodocto31 = '$this->tipodocto31' and nofact31 = '$this->nofact31' "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where tipodocto31 = '$this->tipodocto31' and nofact31 = '$this->nofact31' ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where tipodocto31 = '$this->tipodocto31' and nofact31 = '$this->nofact31' "); 
          }  
          else  
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where tipodocto31 = '$this->tipodocto31' and nofact31 = '$this->nofact31' ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where tipodocto31 = '$this->tipodocto31' and nofact31 = '$this->nofact31' "); 
          }  
          if ($rs1 === false)  
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
              if ($this->NM_ajax_flag)
              {
                 form_maecom_pack_ajax_response();
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
                  $SC_fields_update[] = "nocte31 = '$this->nocte31', nomcte31 = '$this->nomcte31', localid31 = '$this->localid31', cvectenegro31 = '$this->cvectenegro31', vtabta31 = $this->vtabta31, descto31 = $this->descto31, flete31 = $this->flete31, itm31 = $this->itm31, novend31 = '$this->novend31', fecfact31 = #$this->fecfact31#, condpag31 = $this->condpag31, nopagos31 = $this->nopagos31, formapago31 = $this->formapago31, obra31 = '$this->obra31', orden31 = '$this->orden31', cvnegra31 = $this->cvnegra31, status31 = $this->status31, cvimpto31 = $this->cvimpto31, cvanulado31 = $this->cvanulado31, efectivo31 = $this->efectivo31, cheque31 = $this->cheque31, tarjeta31 = $this->tarjeta31, acuenta31 = $this->acuenta31, nobanco31 = '$this->nobanco31', nombanco31 = '$this->nombanco31', nocheque31 = '$this->nocheque31', notarjeta31 = '$this->notarjeta31', nomtarjeta31 = '$this->nomtarjeta31', cvdivisa31 = '$this->cvdivisa31', valdivisa31 = '$this->valdivisa31', lineaprod31 = '$this->lineaprod31', intereses31 = $this->intereses31, nopedido31 = '$this->nopedido31', fecped31 = #$this->fecped31#, ruc31 = '$this->ruc31', tel31 = '$this->tel31', transpor31 = '$this->transpor31', cvtransfer31 = '$this->cvtransfer31', fectrasfer31 = #$this->fectrasfer31#, desctofp31 = $this->desctofp31, catcte31 = '$this->catcte31', UID = $this->uid, recargos31 = $this->recargos31, ice31 = $this->ice31, fecdocpr31 = #$this->fecdocpr31#, tipocomp31 = '$this->tipocomp31', conta31 = $this->conta31, fecvencidocpr = #$this->fecvencidocpr#, totsiniva31 = $this->totsiniva31, fecemb = #$this->fecemb#, norefrendo = '$this->norefrendo', baseice = $this->baseice, ncodret43 = '$this->ncodret43', nbaseret43 = $this->nbaseret43, npctjeret43 = $this->npctjeret43, contrato = '$this->contrato', compra_general = '$this->compra_general', distribucion_rubros = '$this->distribucion_rubros', dstoLey = $this->dstoley, remGas31 = '$this->remgas31', estado_electronico = $this->estado_electronico, coddest31 = '$this->coddest31'"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "nocte31 = '$this->nocte31', nomcte31 = '$this->nomcte31', localid31 = '$this->localid31', cvectenegro31 = '$this->cvectenegro31', vtabta31 = $this->vtabta31, descto31 = $this->descto31, flete31 = $this->flete31, itm31 = $this->itm31, novend31 = '$this->novend31', fecfact31 = " . $this->Ini->date_delim . $this->fecfact31 . $this->Ini->date_delim1 . ", condpag31 = $this->condpag31, nopagos31 = $this->nopagos31, formapago31 = $this->formapago31, obra31 = '$this->obra31', orden31 = '$this->orden31', cvnegra31 = $this->cvnegra31, status31 = $this->status31, cvimpto31 = $this->cvimpto31, cvanulado31 = $this->cvanulado31, efectivo31 = $this->efectivo31, cheque31 = $this->cheque31, tarjeta31 = $this->tarjeta31, acuenta31 = $this->acuenta31, nobanco31 = '$this->nobanco31', nombanco31 = '$this->nombanco31', nocheque31 = '$this->nocheque31', notarjeta31 = '$this->notarjeta31', nomtarjeta31 = '$this->nomtarjeta31', cvdivisa31 = '$this->cvdivisa31', valdivisa31 = '$this->valdivisa31', lineaprod31 = '$this->lineaprod31', intereses31 = $this->intereses31, nopedido31 = '$this->nopedido31', fecped31 = " . $this->Ini->date_delim . $this->fecped31 . $this->Ini->date_delim1 . ", ruc31 = '$this->ruc31', tel31 = '$this->tel31', transpor31 = '$this->transpor31', cvtransfer31 = '$this->cvtransfer31', fectrasfer31 = " . $this->Ini->date_delim . $this->fectrasfer31 . $this->Ini->date_delim1 . ", desctofp31 = $this->desctofp31, catcte31 = '$this->catcte31', UID = $this->uid, recargos31 = $this->recargos31, ice31 = $this->ice31, fecdocpr31 = " . $this->Ini->date_delim . $this->fecdocpr31 . $this->Ini->date_delim1 . ", tipocomp31 = '$this->tipocomp31', conta31 = $this->conta31, fecvencidocpr = " . $this->Ini->date_delim . $this->fecvencidocpr . $this->Ini->date_delim1 . ", totsiniva31 = $this->totsiniva31, fecemb = " . $this->Ini->date_delim . $this->fecemb . $this->Ini->date_delim1 . ", norefrendo = '$this->norefrendo', baseice = $this->baseice, ncodret43 = '$this->ncodret43', nbaseret43 = $this->nbaseret43, npctjeret43 = $this->npctjeret43, contrato = '$this->contrato', compra_general = '$this->compra_general', distribucion_rubros = '$this->distribucion_rubros', dstoLey = $this->dstoley, remGas31 = '$this->remgas31', estado_electronico = $this->estado_electronico, coddest31 = '$this->coddest31'"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "nocte31 = '$this->nocte31', nomcte31 = '$this->nomcte31', localid31 = '$this->localid31', cvectenegro31 = '$this->cvectenegro31', vtabta31 = $this->vtabta31, descto31 = $this->descto31, flete31 = $this->flete31, itm31 = $this->itm31, novend31 = '$this->novend31', fecfact31 = " . $this->Ini->date_delim . $this->fecfact31 . $this->Ini->date_delim1 . ", condpag31 = $this->condpag31, nopagos31 = $this->nopagos31, formapago31 = $this->formapago31, obra31 = '$this->obra31', orden31 = '$this->orden31', cvnegra31 = $this->cvnegra31, status31 = $this->status31, cvimpto31 = $this->cvimpto31, cvanulado31 = $this->cvanulado31, efectivo31 = $this->efectivo31, cheque31 = $this->cheque31, tarjeta31 = $this->tarjeta31, acuenta31 = $this->acuenta31, nobanco31 = '$this->nobanco31', nombanco31 = '$this->nombanco31', nocheque31 = '$this->nocheque31', notarjeta31 = '$this->notarjeta31', nomtarjeta31 = '$this->nomtarjeta31', cvdivisa31 = '$this->cvdivisa31', valdivisa31 = '$this->valdivisa31', lineaprod31 = '$this->lineaprod31', intereses31 = $this->intereses31, nopedido31 = '$this->nopedido31', fecped31 = " . $this->Ini->date_delim . $this->fecped31 . $this->Ini->date_delim1 . ", ruc31 = '$this->ruc31', tel31 = '$this->tel31', transpor31 = '$this->transpor31', cvtransfer31 = '$this->cvtransfer31', fectrasfer31 = " . $this->Ini->date_delim . $this->fectrasfer31 . $this->Ini->date_delim1 . ", desctofp31 = $this->desctofp31, catcte31 = '$this->catcte31', UID = $this->uid, recargos31 = $this->recargos31, ice31 = $this->ice31, fecdocpr31 = " . $this->Ini->date_delim . $this->fecdocpr31 . $this->Ini->date_delim1 . ", tipocomp31 = '$this->tipocomp31', conta31 = $this->conta31, fecvencidocpr = " . $this->Ini->date_delim . $this->fecvencidocpr . $this->Ini->date_delim1 . ", totsiniva31 = $this->totsiniva31, fecemb = " . $this->Ini->date_delim . $this->fecemb . $this->Ini->date_delim1 . ", norefrendo = '$this->norefrendo', baseice = $this->baseice, ncodret43 = '$this->ncodret43', nbaseret43 = $this->nbaseret43, npctjeret43 = $this->npctjeret43, contrato = '$this->contrato', compra_general = '$this->compra_general', distribucion_rubros = '$this->distribucion_rubros', dstoLey = $this->dstoley, remGas31 = '$this->remgas31', estado_electronico = $this->estado_electronico, coddest31 = '$this->coddest31'"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "nocte31 = '$this->nocte31', nomcte31 = '$this->nomcte31', localid31 = '$this->localid31', cvectenegro31 = '$this->cvectenegro31', vtabta31 = $this->vtabta31, descto31 = $this->descto31, flete31 = $this->flete31, itm31 = $this->itm31, novend31 = '$this->novend31', fecfact31 = EXTEND('$this->fecfact31', YEAR TO FRACTION), condpag31 = $this->condpag31, nopagos31 = $this->nopagos31, formapago31 = $this->formapago31, obra31 = '$this->obra31', orden31 = '$this->orden31', cvnegra31 = $this->cvnegra31, status31 = $this->status31, cvimpto31 = $this->cvimpto31, cvanulado31 = $this->cvanulado31, efectivo31 = $this->efectivo31, cheque31 = $this->cheque31, tarjeta31 = $this->tarjeta31, acuenta31 = $this->acuenta31, nobanco31 = '$this->nobanco31', nombanco31 = '$this->nombanco31', nocheque31 = '$this->nocheque31', notarjeta31 = '$this->notarjeta31', nomtarjeta31 = '$this->nomtarjeta31', cvdivisa31 = '$this->cvdivisa31', valdivisa31 = '$this->valdivisa31', lineaprod31 = '$this->lineaprod31', intereses31 = $this->intereses31, nopedido31 = '$this->nopedido31', fecped31 = EXTEND('$this->fecped31', YEAR TO FRACTION), ruc31 = '$this->ruc31', tel31 = '$this->tel31', transpor31 = '$this->transpor31', cvtransfer31 = '$this->cvtransfer31', fectrasfer31 = EXTEND('$this->fectrasfer31', YEAR TO DAY), desctofp31 = $this->desctofp31, catcte31 = '$this->catcte31', UID = $this->uid, recargos31 = $this->recargos31, ice31 = $this->ice31, fecdocpr31 = EXTEND('$this->fecdocpr31', YEAR TO FRACTION), tipocomp31 = '$this->tipocomp31', conta31 = $this->conta31, fecvencidocpr = EXTEND('$this->fecvencidocpr', YEAR TO FRACTION), totsiniva31 = $this->totsiniva31, fecemb = EXTEND('$this->fecemb', YEAR TO DAY), norefrendo = '$this->norefrendo', baseice = $this->baseice, ncodret43 = '$this->ncodret43', nbaseret43 = $this->nbaseret43, npctjeret43 = $this->npctjeret43, contrato = '$this->contrato', compra_general = '$this->compra_general', distribucion_rubros = '$this->distribucion_rubros', dstoLey = $this->dstoley, remGas31 = '$this->remgas31', estado_electronico = $this->estado_electronico, coddest31 = '$this->coddest31'"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "nocte31 = '$this->nocte31', nomcte31 = '$this->nomcte31', localid31 = '$this->localid31', cvectenegro31 = '$this->cvectenegro31', vtabta31 = $this->vtabta31, descto31 = $this->descto31, flete31 = $this->flete31, itm31 = $this->itm31, novend31 = '$this->novend31', fecfact31 = " . $this->Ini->date_delim . $this->fecfact31 . $this->Ini->date_delim1 . ", condpag31 = $this->condpag31, nopagos31 = $this->nopagos31, formapago31 = $this->formapago31, obra31 = '$this->obra31', orden31 = '$this->orden31', cvnegra31 = $this->cvnegra31, status31 = $this->status31, cvimpto31 = $this->cvimpto31, cvanulado31 = $this->cvanulado31, efectivo31 = $this->efectivo31, cheque31 = $this->cheque31, tarjeta31 = $this->tarjeta31, acuenta31 = $this->acuenta31, nobanco31 = '$this->nobanco31', nombanco31 = '$this->nombanco31', nocheque31 = '$this->nocheque31', notarjeta31 = '$this->notarjeta31', nomtarjeta31 = '$this->nomtarjeta31', cvdivisa31 = '$this->cvdivisa31', valdivisa31 = '$this->valdivisa31', lineaprod31 = '$this->lineaprod31', intereses31 = $this->intereses31, nopedido31 = '$this->nopedido31', fecped31 = " . $this->Ini->date_delim . $this->fecped31 . $this->Ini->date_delim1 . ", ruc31 = '$this->ruc31', tel31 = '$this->tel31', transpor31 = '$this->transpor31', cvtransfer31 = '$this->cvtransfer31', fectrasfer31 = " . $this->Ini->date_delim . $this->fectrasfer31 . $this->Ini->date_delim1 . ", desctofp31 = $this->desctofp31, catcte31 = '$this->catcte31', UID = $this->uid, recargos31 = $this->recargos31, ice31 = $this->ice31, fecdocpr31 = " . $this->Ini->date_delim . $this->fecdocpr31 . $this->Ini->date_delim1 . ", tipocomp31 = '$this->tipocomp31', conta31 = $this->conta31, fecvencidocpr = " . $this->Ini->date_delim . $this->fecvencidocpr . $this->Ini->date_delim1 . ", totsiniva31 = $this->totsiniva31, fecemb = " . $this->Ini->date_delim . $this->fecemb . $this->Ini->date_delim1 . ", norefrendo = '$this->norefrendo', baseice = $this->baseice, ncodret43 = '$this->ncodret43', nbaseret43 = $this->nbaseret43, npctjeret43 = $this->npctjeret43, contrato = '$this->contrato', compra_general = '$this->compra_general', distribucion_rubros = '$this->distribucion_rubros', dstoLey = $this->dstoley, remGas31 = '$this->remgas31', estado_electronico = $this->estado_electronico, coddest31 = '$this->coddest31'"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "nocte31 = '$this->nocte31', nomcte31 = '$this->nomcte31', localid31 = '$this->localid31', cvectenegro31 = '$this->cvectenegro31', vtabta31 = $this->vtabta31, descto31 = $this->descto31, flete31 = $this->flete31, itm31 = $this->itm31, novend31 = '$this->novend31', fecfact31 = " . $this->Ini->date_delim . $this->fecfact31 . $this->Ini->date_delim1 . ", condpag31 = $this->condpag31, nopagos31 = $this->nopagos31, formapago31 = $this->formapago31, obra31 = '$this->obra31', orden31 = '$this->orden31', cvnegra31 = $this->cvnegra31, status31 = $this->status31, cvimpto31 = $this->cvimpto31, cvanulado31 = $this->cvanulado31, efectivo31 = $this->efectivo31, cheque31 = $this->cheque31, tarjeta31 = $this->tarjeta31, acuenta31 = $this->acuenta31, nobanco31 = '$this->nobanco31', nombanco31 = '$this->nombanco31', nocheque31 = '$this->nocheque31', notarjeta31 = '$this->notarjeta31', nomtarjeta31 = '$this->nomtarjeta31', cvdivisa31 = '$this->cvdivisa31', valdivisa31 = '$this->valdivisa31', lineaprod31 = '$this->lineaprod31', intereses31 = $this->intereses31, nopedido31 = '$this->nopedido31', fecped31 = " . $this->Ini->date_delim . $this->fecped31 . $this->Ini->date_delim1 . ", ruc31 = '$this->ruc31', tel31 = '$this->tel31', transpor31 = '$this->transpor31', cvtransfer31 = '$this->cvtransfer31', fectrasfer31 = " . $this->Ini->date_delim . $this->fectrasfer31 . $this->Ini->date_delim1 . ", desctofp31 = $this->desctofp31, catcte31 = '$this->catcte31', UID = $this->uid, recargos31 = $this->recargos31, ice31 = $this->ice31, fecdocpr31 = " . $this->Ini->date_delim . $this->fecdocpr31 . $this->Ini->date_delim1 . ", tipocomp31 = '$this->tipocomp31', conta31 = $this->conta31, fecvencidocpr = " . $this->Ini->date_delim . $this->fecvencidocpr . $this->Ini->date_delim1 . ", totsiniva31 = $this->totsiniva31, fecemb = " . $this->Ini->date_delim . $this->fecemb . $this->Ini->date_delim1 . ", norefrendo = '$this->norefrendo', baseice = $this->baseice, ncodret43 = '$this->ncodret43', nbaseret43 = $this->nbaseret43, npctjeret43 = $this->npctjeret43, contrato = '$this->contrato', compra_general = '$this->compra_general', distribucion_rubros = '$this->distribucion_rubros', dstoLey = $this->dstoley, remGas31 = '$this->remgas31', estado_electronico = $this->estado_electronico, coddest31 = '$this->coddest31'"; 
              } 
              else 
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "nocte31 = '$this->nocte31', nomcte31 = '$this->nomcte31', localid31 = '$this->localid31', cvectenegro31 = '$this->cvectenegro31', vtabta31 = $this->vtabta31, descto31 = $this->descto31, flete31 = $this->flete31, itm31 = $this->itm31, novend31 = '$this->novend31', fecfact31 = " . $this->Ini->date_delim . $this->fecfact31 . $this->Ini->date_delim1 . ", condpag31 = $this->condpag31, nopagos31 = $this->nopagos31, formapago31 = $this->formapago31, obra31 = '$this->obra31', orden31 = '$this->orden31', cvnegra31 = $this->cvnegra31, status31 = $this->status31, cvimpto31 = $this->cvimpto31, cvanulado31 = $this->cvanulado31, efectivo31 = $this->efectivo31, cheque31 = $this->cheque31, tarjeta31 = $this->tarjeta31, acuenta31 = $this->acuenta31, nobanco31 = '$this->nobanco31', nombanco31 = '$this->nombanco31', nocheque31 = '$this->nocheque31', notarjeta31 = '$this->notarjeta31', nomtarjeta31 = '$this->nomtarjeta31', cvdivisa31 = '$this->cvdivisa31', valdivisa31 = '$this->valdivisa31', lineaprod31 = '$this->lineaprod31', intereses31 = $this->intereses31, nopedido31 = '$this->nopedido31', fecped31 = " . $this->Ini->date_delim . $this->fecped31 . $this->Ini->date_delim1 . ", ruc31 = '$this->ruc31', tel31 = '$this->tel31', transpor31 = '$this->transpor31', cvtransfer31 = '$this->cvtransfer31', fectrasfer31 = " . $this->Ini->date_delim . $this->fectrasfer31 . $this->Ini->date_delim1 . ", desctofp31 = $this->desctofp31, catcte31 = '$this->catcte31', UID = $this->uid, recargos31 = $this->recargos31, ice31 = $this->ice31, fecdocpr31 = " . $this->Ini->date_delim . $this->fecdocpr31 . $this->Ini->date_delim1 . ", tipocomp31 = '$this->tipocomp31', conta31 = $this->conta31, fecvencidocpr = " . $this->Ini->date_delim . $this->fecvencidocpr . $this->Ini->date_delim1 . ", totsiniva31 = $this->totsiniva31, fecemb = " . $this->Ini->date_delim . $this->fecemb . $this->Ini->date_delim1 . ", norefrendo = '$this->norefrendo', baseice = $this->baseice, ncodret43 = '$this->ncodret43', nbaseret43 = $this->nbaseret43, npctjeret43 = $this->npctjeret43, contrato = '$this->contrato', compra_general = '$this->compra_general', distribucion_rubros = '$this->distribucion_rubros', dstoLey = $this->dstoley, remGas31 = '$this->remgas31', estado_electronico = $this->estado_electronico, coddest31 = '$this->coddest31'"; 
              } 
              $comando .= implode(",", $SC_fields_update);  
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              {
                  $comando .= " WHERE tipodocto31 = '$this->tipodocto31' and nofact31 = '$this->nofact31' ";  
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
                  $comando .= " WHERE tipodocto31 = '$this->tipodocto31' and nofact31 = '$this->nofact31' ";  
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              {
                  $comando .= " WHERE tipodocto31 = '$this->tipodocto31' and nofact31 = '$this->nofact31' ";  
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $comando .= " WHERE tipodocto31 = '$this->tipodocto31' and nofact31 = '$this->nofact31' ";  
              }  
              else  
              {
                  $comando .= " WHERE tipodocto31 = '$this->tipodocto31' and nofact31 = '$this->nofact31' ";  
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
                                  form_maecom_pack_ajax_response();
                              }
                              exit;  
                          }   
                      }   
                  }   
              }   
              $this->tipodocto31 = $this->tipodocto31_before_qstr;
              $this->nofact31 = $this->nofact31_before_qstr;
              $this->nocte31 = $this->nocte31_before_qstr;
              $this->nomcte31 = $this->nomcte31_before_qstr;
              $this->localid31 = $this->localid31_before_qstr;
              $this->cvectenegro31 = $this->cvectenegro31_before_qstr;
              $this->novend31 = $this->novend31_before_qstr;
              $this->obra31 = $this->obra31_before_qstr;
              $this->orden31 = $this->orden31_before_qstr;
              $this->nobanco31 = $this->nobanco31_before_qstr;
              $this->nombanco31 = $this->nombanco31_before_qstr;
              $this->nocheque31 = $this->nocheque31_before_qstr;
              $this->notarjeta31 = $this->notarjeta31_before_qstr;
              $this->nomtarjeta31 = $this->nomtarjeta31_before_qstr;
              $this->cvdivisa31 = $this->cvdivisa31_before_qstr;
              $this->valdivisa31 = $this->valdivisa31_before_qstr;
              $this->lineaprod31 = $this->lineaprod31_before_qstr;
              $this->nopedido31 = $this->nopedido31_before_qstr;
              $this->ruc31 = $this->ruc31_before_qstr;
              $this->tel31 = $this->tel31_before_qstr;
              $this->transpor31 = $this->transpor31_before_qstr;
              $this->cvtransfer31 = $this->cvtransfer31_before_qstr;
              $this->catcte31 = $this->catcte31_before_qstr;
              $this->tipocomp31 = $this->tipocomp31_before_qstr;
              $this->norefrendo = $this->norefrendo_before_qstr;
              $this->ncodret43 = $this->ncodret43_before_qstr;
              $this->contrato = $this->contrato_before_qstr;
              $this->compra_general = $this->compra_general_before_qstr;
              $this->distribucion_rubros = $this->distribucion_rubros_before_qstr;
              $this->remgas31 = $this->remgas31_before_qstr;
              $this->coddest31 = $this->coddest31_before_qstr;
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

              $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['db_changed'] = true;
              if ($this->NM_ajax_flag) {
                  $this->NM_ajax_info['clearUpload'] = 'S';
              }


              if     (isset($NM_val_form) && isset($NM_val_form['tipodocto31'])) { $this->tipodocto31 = $NM_val_form['tipodocto31']; }
              elseif (isset($this->tipodocto31)) { $this->nm_limpa_alfa($this->tipodocto31); }
              if     (isset($NM_val_form) && isset($NM_val_form['nofact31'])) { $this->nofact31 = $NM_val_form['nofact31']; }
              elseif (isset($this->nofact31)) { $this->nm_limpa_alfa($this->nofact31); }
              if     (isset($NM_val_form) && isset($NM_val_form['nocte31'])) { $this->nocte31 = $NM_val_form['nocte31']; }
              elseif (isset($this->nocte31)) { $this->nm_limpa_alfa($this->nocte31); }
              if     (isset($NM_val_form) && isset($NM_val_form['nomcte31'])) { $this->nomcte31 = $NM_val_form['nomcte31']; }
              elseif (isset($this->nomcte31)) { $this->nm_limpa_alfa($this->nomcte31); }
              if     (isset($NM_val_form) && isset($NM_val_form['localid31'])) { $this->localid31 = $NM_val_form['localid31']; }
              elseif (isset($this->localid31)) { $this->nm_limpa_alfa($this->localid31); }
              if     (isset($NM_val_form) && isset($NM_val_form['cvectenegro31'])) { $this->cvectenegro31 = $NM_val_form['cvectenegro31']; }
              elseif (isset($this->cvectenegro31)) { $this->nm_limpa_alfa($this->cvectenegro31); }
              if     (isset($NM_val_form) && isset($NM_val_form['vtabta31'])) { $this->vtabta31 = $NM_val_form['vtabta31']; }
              elseif (isset($this->vtabta31)) { $this->nm_limpa_alfa($this->vtabta31); }
              if     (isset($NM_val_form) && isset($NM_val_form['descto31'])) { $this->descto31 = $NM_val_form['descto31']; }
              elseif (isset($this->descto31)) { $this->nm_limpa_alfa($this->descto31); }
              if     (isset($NM_val_form) && isset($NM_val_form['flete31'])) { $this->flete31 = $NM_val_form['flete31']; }
              elseif (isset($this->flete31)) { $this->nm_limpa_alfa($this->flete31); }
              if     (isset($NM_val_form) && isset($NM_val_form['itm31'])) { $this->itm31 = $NM_val_form['itm31']; }
              elseif (isset($this->itm31)) { $this->nm_limpa_alfa($this->itm31); }
              if     (isset($NM_val_form) && isset($NM_val_form['novend31'])) { $this->novend31 = $NM_val_form['novend31']; }
              elseif (isset($this->novend31)) { $this->nm_limpa_alfa($this->novend31); }
              if     (isset($NM_val_form) && isset($NM_val_form['condpag31'])) { $this->condpag31 = $NM_val_form['condpag31']; }
              elseif (isset($this->condpag31)) { $this->nm_limpa_alfa($this->condpag31); }
              if     (isset($NM_val_form) && isset($NM_val_form['nopagos31'])) { $this->nopagos31 = $NM_val_form['nopagos31']; }
              elseif (isset($this->nopagos31)) { $this->nm_limpa_alfa($this->nopagos31); }
              if     (isset($NM_val_form) && isset($NM_val_form['formapago31'])) { $this->formapago31 = $NM_val_form['formapago31']; }
              elseif (isset($this->formapago31)) { $this->nm_limpa_alfa($this->formapago31); }
              if     (isset($NM_val_form) && isset($NM_val_form['obra31'])) { $this->obra31 = $NM_val_form['obra31']; }
              elseif (isset($this->obra31)) { $this->nm_limpa_alfa($this->obra31); }
              if     (isset($NM_val_form) && isset($NM_val_form['orden31'])) { $this->orden31 = $NM_val_form['orden31']; }
              elseif (isset($this->orden31)) { $this->nm_limpa_alfa($this->orden31); }
              if     (isset($NM_val_form) && isset($NM_val_form['cvnegra31'])) { $this->cvnegra31 = $NM_val_form['cvnegra31']; }
              elseif (isset($this->cvnegra31)) { $this->nm_limpa_alfa($this->cvnegra31); }
              if     (isset($NM_val_form) && isset($NM_val_form['status31'])) { $this->status31 = $NM_val_form['status31']; }
              elseif (isset($this->status31)) { $this->nm_limpa_alfa($this->status31); }
              if     (isset($NM_val_form) && isset($NM_val_form['cvimpto31'])) { $this->cvimpto31 = $NM_val_form['cvimpto31']; }
              elseif (isset($this->cvimpto31)) { $this->nm_limpa_alfa($this->cvimpto31); }
              if     (isset($NM_val_form) && isset($NM_val_form['cvanulado31'])) { $this->cvanulado31 = $NM_val_form['cvanulado31']; }
              elseif (isset($this->cvanulado31)) { $this->nm_limpa_alfa($this->cvanulado31); }
              if     (isset($NM_val_form) && isset($NM_val_form['efectivo31'])) { $this->efectivo31 = $NM_val_form['efectivo31']; }
              elseif (isset($this->efectivo31)) { $this->nm_limpa_alfa($this->efectivo31); }
              if     (isset($NM_val_form) && isset($NM_val_form['cheque31'])) { $this->cheque31 = $NM_val_form['cheque31']; }
              elseif (isset($this->cheque31)) { $this->nm_limpa_alfa($this->cheque31); }
              if     (isset($NM_val_form) && isset($NM_val_form['tarjeta31'])) { $this->tarjeta31 = $NM_val_form['tarjeta31']; }
              elseif (isset($this->tarjeta31)) { $this->nm_limpa_alfa($this->tarjeta31); }
              if     (isset($NM_val_form) && isset($NM_val_form['acuenta31'])) { $this->acuenta31 = $NM_val_form['acuenta31']; }
              elseif (isset($this->acuenta31)) { $this->nm_limpa_alfa($this->acuenta31); }
              if     (isset($NM_val_form) && isset($NM_val_form['nobanco31'])) { $this->nobanco31 = $NM_val_form['nobanco31']; }
              elseif (isset($this->nobanco31)) { $this->nm_limpa_alfa($this->nobanco31); }
              if     (isset($NM_val_form) && isset($NM_val_form['nombanco31'])) { $this->nombanco31 = $NM_val_form['nombanco31']; }
              elseif (isset($this->nombanco31)) { $this->nm_limpa_alfa($this->nombanco31); }
              if     (isset($NM_val_form) && isset($NM_val_form['nocheque31'])) { $this->nocheque31 = $NM_val_form['nocheque31']; }
              elseif (isset($this->nocheque31)) { $this->nm_limpa_alfa($this->nocheque31); }
              if     (isset($NM_val_form) && isset($NM_val_form['notarjeta31'])) { $this->notarjeta31 = $NM_val_form['notarjeta31']; }
              elseif (isset($this->notarjeta31)) { $this->nm_limpa_alfa($this->notarjeta31); }
              if     (isset($NM_val_form) && isset($NM_val_form['nomtarjeta31'])) { $this->nomtarjeta31 = $NM_val_form['nomtarjeta31']; }
              elseif (isset($this->nomtarjeta31)) { $this->nm_limpa_alfa($this->nomtarjeta31); }
              if     (isset($NM_val_form) && isset($NM_val_form['cvdivisa31'])) { $this->cvdivisa31 = $NM_val_form['cvdivisa31']; }
              elseif (isset($this->cvdivisa31)) { $this->nm_limpa_alfa($this->cvdivisa31); }
              if     (isset($NM_val_form) && isset($NM_val_form['valdivisa31'])) { $this->valdivisa31 = $NM_val_form['valdivisa31']; }
              elseif (isset($this->valdivisa31)) { $this->nm_limpa_alfa($this->valdivisa31); }
              if     (isset($NM_val_form) && isset($NM_val_form['lineaprod31'])) { $this->lineaprod31 = $NM_val_form['lineaprod31']; }
              elseif (isset($this->lineaprod31)) { $this->nm_limpa_alfa($this->lineaprod31); }
              if     (isset($NM_val_form) && isset($NM_val_form['intereses31'])) { $this->intereses31 = $NM_val_form['intereses31']; }
              elseif (isset($this->intereses31)) { $this->nm_limpa_alfa($this->intereses31); }
              if     (isset($NM_val_form) && isset($NM_val_form['nopedido31'])) { $this->nopedido31 = $NM_val_form['nopedido31']; }
              elseif (isset($this->nopedido31)) { $this->nm_limpa_alfa($this->nopedido31); }
              if     (isset($NM_val_form) && isset($NM_val_form['ruc31'])) { $this->ruc31 = $NM_val_form['ruc31']; }
              elseif (isset($this->ruc31)) { $this->nm_limpa_alfa($this->ruc31); }
              if     (isset($NM_val_form) && isset($NM_val_form['tel31'])) { $this->tel31 = $NM_val_form['tel31']; }
              elseif (isset($this->tel31)) { $this->nm_limpa_alfa($this->tel31); }
              if     (isset($NM_val_form) && isset($NM_val_form['transpor31'])) { $this->transpor31 = $NM_val_form['transpor31']; }
              elseif (isset($this->transpor31)) { $this->nm_limpa_alfa($this->transpor31); }
              if     (isset($NM_val_form) && isset($NM_val_form['cvtransfer31'])) { $this->cvtransfer31 = $NM_val_form['cvtransfer31']; }
              elseif (isset($this->cvtransfer31)) { $this->nm_limpa_alfa($this->cvtransfer31); }
              if     (isset($NM_val_form) && isset($NM_val_form['desctofp31'])) { $this->desctofp31 = $NM_val_form['desctofp31']; }
              elseif (isset($this->desctofp31)) { $this->nm_limpa_alfa($this->desctofp31); }
              if     (isset($NM_val_form) && isset($NM_val_form['catcte31'])) { $this->catcte31 = $NM_val_form['catcte31']; }
              elseif (isset($this->catcte31)) { $this->nm_limpa_alfa($this->catcte31); }
              if     (isset($NM_val_form) && isset($NM_val_form['uid'])) { $this->uid = $NM_val_form['uid']; }
              elseif (isset($this->uid)) { $this->nm_limpa_alfa($this->uid); }
              if     (isset($NM_val_form) && isset($NM_val_form['recargos31'])) { $this->recargos31 = $NM_val_form['recargos31']; }
              elseif (isset($this->recargos31)) { $this->nm_limpa_alfa($this->recargos31); }
              if     (isset($NM_val_form) && isset($NM_val_form['ice31'])) { $this->ice31 = $NM_val_form['ice31']; }
              elseif (isset($this->ice31)) { $this->nm_limpa_alfa($this->ice31); }
              if     (isset($NM_val_form) && isset($NM_val_form['tipocomp31'])) { $this->tipocomp31 = $NM_val_form['tipocomp31']; }
              elseif (isset($this->tipocomp31)) { $this->nm_limpa_alfa($this->tipocomp31); }
              if     (isset($NM_val_form) && isset($NM_val_form['conta31'])) { $this->conta31 = $NM_val_form['conta31']; }
              elseif (isset($this->conta31)) { $this->nm_limpa_alfa($this->conta31); }
              if     (isset($NM_val_form) && isset($NM_val_form['totsiniva31'])) { $this->totsiniva31 = $NM_val_form['totsiniva31']; }
              elseif (isset($this->totsiniva31)) { $this->nm_limpa_alfa($this->totsiniva31); }
              if     (isset($NM_val_form) && isset($NM_val_form['norefrendo'])) { $this->norefrendo = $NM_val_form['norefrendo']; }
              elseif (isset($this->norefrendo)) { $this->nm_limpa_alfa($this->norefrendo); }
              if     (isset($NM_val_form) && isset($NM_val_form['baseice'])) { $this->baseice = $NM_val_form['baseice']; }
              elseif (isset($this->baseice)) { $this->nm_limpa_alfa($this->baseice); }
              if     (isset($NM_val_form) && isset($NM_val_form['ncodret43'])) { $this->ncodret43 = $NM_val_form['ncodret43']; }
              elseif (isset($this->ncodret43)) { $this->nm_limpa_alfa($this->ncodret43); }
              if     (isset($NM_val_form) && isset($NM_val_form['nbaseret43'])) { $this->nbaseret43 = $NM_val_form['nbaseret43']; }
              elseif (isset($this->nbaseret43)) { $this->nm_limpa_alfa($this->nbaseret43); }
              if     (isset($NM_val_form) && isset($NM_val_form['npctjeret43'])) { $this->npctjeret43 = $NM_val_form['npctjeret43']; }
              elseif (isset($this->npctjeret43)) { $this->nm_limpa_alfa($this->npctjeret43); }
              if     (isset($NM_val_form) && isset($NM_val_form['contrato'])) { $this->contrato = $NM_val_form['contrato']; }
              elseif (isset($this->contrato)) { $this->nm_limpa_alfa($this->contrato); }
              if     (isset($NM_val_form) && isset($NM_val_form['compra_general'])) { $this->compra_general = $NM_val_form['compra_general']; }
              elseif (isset($this->compra_general)) { $this->nm_limpa_alfa($this->compra_general); }
              if     (isset($NM_val_form) && isset($NM_val_form['distribucion_rubros'])) { $this->distribucion_rubros = $NM_val_form['distribucion_rubros']; }
              elseif (isset($this->distribucion_rubros)) { $this->nm_limpa_alfa($this->distribucion_rubros); }
              if     (isset($NM_val_form) && isset($NM_val_form['dstoley'])) { $this->dstoley = $NM_val_form['dstoley']; }
              elseif (isset($this->dstoley)) { $this->nm_limpa_alfa($this->dstoley); }
              if     (isset($NM_val_form) && isset($NM_val_form['remgas31'])) { $this->remgas31 = $NM_val_form['remgas31']; }
              elseif (isset($this->remgas31)) { $this->nm_limpa_alfa($this->remgas31); }
              if     (isset($NM_val_form) && isset($NM_val_form['estado_electronico'])) { $this->estado_electronico = $NM_val_form['estado_electronico']; }
              elseif (isset($this->estado_electronico)) { $this->nm_limpa_alfa($this->estado_electronico); }
              if     (isset($NM_val_form) && isset($NM_val_form['coddest31'])) { $this->coddest31 = $NM_val_form['coddest31']; }
              elseif (isset($this->coddest31)) { $this->nm_limpa_alfa($this->coddest31); }

              $this->nm_formatar_campos();
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
              }

              $aOldRefresh               = $this->nmgp_refresh_fields;
              $this->nmgp_refresh_fields = array_diff(array('tipodocto31', 'nofact31', 'nocte31', 'nomcte31', 'localid31', 'cvectenegro31', 'vtabta31', 'descto31', 'flete31', 'itm31', 'novend31', 'fecfact31', 'condpag31', 'nopagos31', 'formapago31', 'obra31', 'orden31', 'cvnegra31', 'status31', 'cvimpto31', 'cvanulado31', 'efectivo31', 'cheque31', 'tarjeta31', 'acuenta31', 'nobanco31', 'nombanco31', 'nocheque31', 'notarjeta31', 'nomtarjeta31', 'cvdivisa31', 'valdivisa31', 'lineaprod31', 'intereses31', 'nopedido31', 'fecped31', 'ruc31', 'tel31', 'transpor31', 'cvtransfer31', 'fectrasfer31', 'desctofp31', 'catcte31', 'uid', 'recargos31', 'ice31', 'fecdocpr31', 'tipocomp31', 'conta31', 'fecvencidocpr', 'totsiniva31', 'fecemb', 'norefrendo', 'baseice', 'ncodret43', 'nbaseret43', 'npctjeret43', 'contrato', 'compra_general', 'distribucion_rubros', 'dstoley', 'remgas31', 'estado_electronico', 'coddest31'), $aDoNotUpdate);
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
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['foreign_key'] as $sFKName => $sFKValue)
              {
                   if (isset($this->sc_conv_var[$sFKName]))
                   {
                       $sFKName = $this->sc_conv_var[$sFKName];
                   }
                  eval("\$this->" . $sFKName . " = \"" . $sFKValue . "\";");
              }
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['decimal_db'] == ",") 
          {
              $this->nm_poe_aspas_decimal();
          }
          $bInsertOk = true;
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where tipodocto31 = '$this->tipodocto31' and nofact31 = '$this->nofact31' "; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where tipodocto31 = '$this->tipodocto31' and nofact31 = '$this->nofact31' "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where tipodocto31 = '$this->tipodocto31' and nofact31 = '$this->nofact31' "; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where tipodocto31 = '$this->tipodocto31' and nofact31 = '$this->nofact31' "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where tipodocto31 = '$this->tipodocto31' and nofact31 = '$this->nofact31' "; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where tipodocto31 = '$this->tipodocto31' and nofact31 = '$this->nofact31' "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where tipodocto31 = '$this->tipodocto31' and nofact31 = '$this->nofact31' "; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where tipodocto31 = '$this->tipodocto31' and nofact31 = '$this->nofact31' "); 
          }  
          else  
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where tipodocto31 = '$this->tipodocto31' and nofact31 = '$this->nofact31' "; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where tipodocto31 = '$this->tipodocto31' and nofact31 = '$this->nofact31' "); 
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
          if (!isset($_POST['nmgp_ins_valid']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['insert_validation'] != $_POST['nmgp_ins_valid'])
          {
              $bInsertOk = false;
              $this->Erro->mensagem(__FILE__, __LINE__, 'security', $this->Ini->Nm_lang['lang_errm_inst_vald']);
              if (isset($_SESSION['scriptcase']['erro_handler']) && $_SESSION['scriptcase']['erro_handler'])
              {
                  $this->nmgp_opcao = 'refresh_insert';
                  if ($this->NM_ajax_flag)
                  {
                      form_maecom_pack_ajax_response();
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
                  if ($this->vtabta31 != "")
                  { 
                       $compl_insert     .= ", vtabta31";
                       $compl_insert_val .= ", $this->vtabta31";
                  } 
                  if ($this->descto31 != "")
                  { 
                       $compl_insert     .= ", descto31";
                       $compl_insert_val .= ", $this->descto31";
                  } 
                  if ($this->flete31 != "")
                  { 
                       $compl_insert     .= ", flete31";
                       $compl_insert_val .= ", $this->flete31";
                  } 
                  if ($this->itm31 != "")
                  { 
                       $compl_insert     .= ", itm31";
                       $compl_insert_val .= ", $this->itm31";
                  } 
                  if ($this->fecfact31 != "")
                  { 
                       $compl_insert     .= ", fecfact31";
                       $compl_insert_val .= ", #$this->fecfact31#";
                  } 
                  if ($this->status31 != "")
                  { 
                       $compl_insert     .= ", status31";
                       $compl_insert_val .= ", $this->status31";
                  } 
                  if ($this->cvanulado31 != "")
                  { 
                       $compl_insert     .= ", cvanulado31";
                       $compl_insert_val .= ", $this->cvanulado31";
                  } 
                  if ($this->efectivo31 != "")
                  { 
                       $compl_insert     .= ", efectivo31";
                       $compl_insert_val .= ", $this->efectivo31";
                  } 
                  if ($this->cheque31 != "")
                  { 
                       $compl_insert     .= ", cheque31";
                       $compl_insert_val .= ", $this->cheque31";
                  } 
                  if ($this->tarjeta31 != "")
                  { 
                       $compl_insert     .= ", tarjeta31";
                       $compl_insert_val .= ", $this->tarjeta31";
                  } 
                  if ($this->acuenta31 != "")
                  { 
                       $compl_insert     .= ", acuenta31";
                       $compl_insert_val .= ", $this->acuenta31";
                  } 
                  if ($this->intereses31 != "")
                  { 
                       $compl_insert     .= ", intereses31";
                       $compl_insert_val .= ", $this->intereses31";
                  } 
                  if ($this->fecped31 != "")
                  { 
                       $compl_insert     .= ", fecped31";
                       $compl_insert_val .= ", #$this->fecped31#";
                  } 
                  if ($this->cvtransfer31 != "")
                  { 
                       $compl_insert     .= ", cvtransfer31";
                       $compl_insert_val .= ", '$this->cvtransfer31'";
                  } 
                  if ($this->catcte31 != "")
                  { 
                       $compl_insert     .= ", catcte31";
                       $compl_insert_val .= ", '$this->catcte31'";
                  } 
                  if ($this->ice31 != "")
                  { 
                       $compl_insert     .= ", ice31";
                       $compl_insert_val .= ", $this->ice31";
                  } 
                  if ($this->totsiniva31 != "")
                  { 
                       $compl_insert     .= ", totsiniva31";
                       $compl_insert_val .= ", $this->totsiniva31";
                  } 
                  if ($this->nbaseret43 != "")
                  { 
                       $compl_insert     .= ", nbaseret43";
                       $compl_insert_val .= ", $this->nbaseret43";
                  } 
                  if ($this->npctjeret43 != "")
                  { 
                       $compl_insert     .= ", npctjeret43";
                       $compl_insert_val .= ", $this->npctjeret43";
                  } 
                  if ($this->contrato != "")
                  { 
                       $compl_insert     .= ", contrato";
                       $compl_insert_val .= ", '$this->contrato'";
                  } 
                  if ($this->compra_general != "")
                  { 
                       $compl_insert     .= ", compra_general";
                       $compl_insert_val .= ", '$this->compra_general'";
                  } 
                  if ($this->distribucion_rubros != "")
                  { 
                       $compl_insert     .= ", distribucion_rubros";
                       $compl_insert_val .= ", '$this->distribucion_rubros'";
                  } 
                  if ($this->dstoley != "")
                  { 
                       $compl_insert     .= ", dstoLey";
                       $compl_insert_val .= ", $this->dstoley";
                  } 
                  if ($this->estado_electronico != "")
                  { 
                       $compl_insert     .= ", estado_electronico";
                       $compl_insert_val .= ", $this->estado_electronico";
                  } 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (tipodocto31, nofact31, nocte31, nomcte31, localid31, cvectenegro31, novend31, condpag31, nopagos31, formapago31, obra31, orden31, cvnegra31, cvimpto31, nobanco31, nombanco31, nocheque31, notarjeta31, nomtarjeta31, cvdivisa31, valdivisa31, lineaprod31, nopedido31, ruc31, tel31, transpor31, fectrasfer31, desctofp31, UID, recargos31, fecdocpr31, tipocomp31, conta31, fecvencidocpr, fecemb, norefrendo, baseice, ncodret43, remGas31, coddest31 $compl_insert) VALUES ('$this->tipodocto31', '$this->nofact31', '$this->nocte31', '$this->nomcte31', '$this->localid31', '$this->cvectenegro31', '$this->novend31', $this->condpag31, $this->nopagos31, $this->formapago31, '$this->obra31', '$this->orden31', $this->cvnegra31, $this->cvimpto31, '$this->nobanco31', '$this->nombanco31', '$this->nocheque31', '$this->notarjeta31', '$this->nomtarjeta31', '$this->cvdivisa31', '$this->valdivisa31', '$this->lineaprod31', '$this->nopedido31', '$this->ruc31', '$this->tel31', '$this->transpor31', #$this->fectrasfer31#, $this->desctofp31, $this->uid, $this->recargos31, #$this->fecdocpr31#, '$this->tipocomp31', $this->conta31, #$this->fecvencidocpr#, #$this->fecemb#, '$this->norefrendo', $this->baseice, '$this->ncodret43', '$this->remgas31', '$this->coddest31' $compl_insert_val)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              { 
                  $compl_insert     = ""; 
                  $compl_insert_val = ""; 
                  if ($this->vtabta31 != "")
                  { 
                       $compl_insert     .= ", vtabta31";
                       $compl_insert_val .= ", $this->vtabta31";
                  } 
                  if ($this->descto31 != "")
                  { 
                       $compl_insert     .= ", descto31";
                       $compl_insert_val .= ", $this->descto31";
                  } 
                  if ($this->flete31 != "")
                  { 
                       $compl_insert     .= ", flete31";
                       $compl_insert_val .= ", $this->flete31";
                  } 
                  if ($this->itm31 != "")
                  { 
                       $compl_insert     .= ", itm31";
                       $compl_insert_val .= ", $this->itm31";
                  } 
                  if ($this->fecfact31 != "")
                  { 
                       $compl_insert     .= ", fecfact31";
                       $compl_insert_val .= ", " . $this->Ini->date_delim . $this->fecfact31 . $this->Ini->date_delim1 . "";
                  } 
                  if ($this->status31 != "")
                  { 
                       $compl_insert     .= ", status31";
                       $compl_insert_val .= ", $this->status31";
                  } 
                  if ($this->cvanulado31 != "")
                  { 
                       $compl_insert     .= ", cvanulado31";
                       $compl_insert_val .= ", $this->cvanulado31";
                  } 
                  if ($this->efectivo31 != "")
                  { 
                       $compl_insert     .= ", efectivo31";
                       $compl_insert_val .= ", $this->efectivo31";
                  } 
                  if ($this->cheque31 != "")
                  { 
                       $compl_insert     .= ", cheque31";
                       $compl_insert_val .= ", $this->cheque31";
                  } 
                  if ($this->tarjeta31 != "")
                  { 
                       $compl_insert     .= ", tarjeta31";
                       $compl_insert_val .= ", $this->tarjeta31";
                  } 
                  if ($this->acuenta31 != "")
                  { 
                       $compl_insert     .= ", acuenta31";
                       $compl_insert_val .= ", $this->acuenta31";
                  } 
                  if ($this->intereses31 != "")
                  { 
                       $compl_insert     .= ", intereses31";
                       $compl_insert_val .= ", $this->intereses31";
                  } 
                  if ($this->fecped31 != "")
                  { 
                       $compl_insert     .= ", fecped31";
                       $compl_insert_val .= ", " . $this->Ini->date_delim . $this->fecped31 . $this->Ini->date_delim1 . "";
                  } 
                  if ($this->cvtransfer31 != "")
                  { 
                       $compl_insert     .= ", cvtransfer31";
                       $compl_insert_val .= ", '$this->cvtransfer31'";
                  } 
                  if ($this->catcte31 != "")
                  { 
                       $compl_insert     .= ", catcte31";
                       $compl_insert_val .= ", '$this->catcte31'";
                  } 
                  if ($this->ice31 != "")
                  { 
                       $compl_insert     .= ", ice31";
                       $compl_insert_val .= ", $this->ice31";
                  } 
                  if ($this->totsiniva31 != "")
                  { 
                       $compl_insert     .= ", totsiniva31";
                       $compl_insert_val .= ", $this->totsiniva31";
                  } 
                  if ($this->nbaseret43 != "")
                  { 
                       $compl_insert     .= ", nbaseret43";
                       $compl_insert_val .= ", $this->nbaseret43";
                  } 
                  if ($this->npctjeret43 != "")
                  { 
                       $compl_insert     .= ", npctjeret43";
                       $compl_insert_val .= ", $this->npctjeret43";
                  } 
                  if ($this->contrato != "")
                  { 
                       $compl_insert     .= ", contrato";
                       $compl_insert_val .= ", '$this->contrato'";
                  } 
                  if ($this->compra_general != "")
                  { 
                       $compl_insert     .= ", compra_general";
                       $compl_insert_val .= ", '$this->compra_general'";
                  } 
                  if ($this->distribucion_rubros != "")
                  { 
                       $compl_insert     .= ", distribucion_rubros";
                       $compl_insert_val .= ", '$this->distribucion_rubros'";
                  } 
                  if ($this->dstoley != "")
                  { 
                       $compl_insert     .= ", dstoLey";
                       $compl_insert_val .= ", $this->dstoley";
                  } 
                  if ($this->estado_electronico != "")
                  { 
                       $compl_insert     .= ", estado_electronico";
                       $compl_insert_val .= ", $this->estado_electronico";
                  } 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "tipodocto31, nofact31, nocte31, nomcte31, localid31, cvectenegro31, novend31, condpag31, nopagos31, formapago31, obra31, orden31, cvnegra31, cvimpto31, nobanco31, nombanco31, nocheque31, notarjeta31, nomtarjeta31, cvdivisa31, valdivisa31, lineaprod31, nopedido31, ruc31, tel31, transpor31, fectrasfer31, desctofp31, UID, recargos31, fecdocpr31, tipocomp31, conta31, fecvencidocpr, fecemb, norefrendo, baseice, ncodret43, remGas31, coddest31 $compl_insert) VALUES (" . $NM_seq_auto . "'$this->tipodocto31', '$this->nofact31', '$this->nocte31', '$this->nomcte31', '$this->localid31', '$this->cvectenegro31', '$this->novend31', $this->condpag31, $this->nopagos31, $this->formapago31, '$this->obra31', '$this->orden31', $this->cvnegra31, $this->cvimpto31, '$this->nobanco31', '$this->nombanco31', '$this->nocheque31', '$this->notarjeta31', '$this->nomtarjeta31', '$this->cvdivisa31', '$this->valdivisa31', '$this->lineaprod31', '$this->nopedido31', '$this->ruc31', '$this->tel31', '$this->transpor31', " . $this->Ini->date_delim . $this->fectrasfer31 . $this->Ini->date_delim1 . ", $this->desctofp31, $this->uid, $this->recargos31, " . $this->Ini->date_delim . $this->fecdocpr31 . $this->Ini->date_delim1 . ", '$this->tipocomp31', $this->conta31, " . $this->Ini->date_delim . $this->fecvencidocpr . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->fecemb . $this->Ini->date_delim1 . ", '$this->norefrendo', $this->baseice, '$this->ncodret43', '$this->remgas31', '$this->coddest31' $compl_insert_val)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
              { 
                  $compl_insert     = ""; 
                  $compl_insert_val = ""; 
                  if ($this->vtabta31 != "")
                  { 
                       $compl_insert     .= ", vtabta31";
                       $compl_insert_val .= ", $this->vtabta31";
                  } 
                  if ($this->descto31 != "")
                  { 
                       $compl_insert     .= ", descto31";
                       $compl_insert_val .= ", $this->descto31";
                  } 
                  if ($this->flete31 != "")
                  { 
                       $compl_insert     .= ", flete31";
                       $compl_insert_val .= ", $this->flete31";
                  } 
                  if ($this->itm31 != "")
                  { 
                       $compl_insert     .= ", itm31";
                       $compl_insert_val .= ", $this->itm31";
                  } 
                  if ($this->fecfact31 != "")
                  { 
                       $compl_insert     .= ", fecfact31";
                       $compl_insert_val .= ", " . $this->Ini->date_delim . $this->fecfact31 . $this->Ini->date_delim1 . "";
                  } 
                  if ($this->status31 != "")
                  { 
                       $compl_insert     .= ", status31";
                       $compl_insert_val .= ", $this->status31";
                  } 
                  if ($this->cvanulado31 != "")
                  { 
                       $compl_insert     .= ", cvanulado31";
                       $compl_insert_val .= ", $this->cvanulado31";
                  } 
                  if ($this->efectivo31 != "")
                  { 
                       $compl_insert     .= ", efectivo31";
                       $compl_insert_val .= ", $this->efectivo31";
                  } 
                  if ($this->cheque31 != "")
                  { 
                       $compl_insert     .= ", cheque31";
                       $compl_insert_val .= ", $this->cheque31";
                  } 
                  if ($this->tarjeta31 != "")
                  { 
                       $compl_insert     .= ", tarjeta31";
                       $compl_insert_val .= ", $this->tarjeta31";
                  } 
                  if ($this->acuenta31 != "")
                  { 
                       $compl_insert     .= ", acuenta31";
                       $compl_insert_val .= ", $this->acuenta31";
                  } 
                  if ($this->intereses31 != "")
                  { 
                       $compl_insert     .= ", intereses31";
                       $compl_insert_val .= ", $this->intereses31";
                  } 
                  if ($this->fecped31 != "")
                  { 
                       $compl_insert     .= ", fecped31";
                       $compl_insert_val .= ", " . $this->Ini->date_delim . $this->fecped31 . $this->Ini->date_delim1 . "";
                  } 
                  if ($this->cvtransfer31 != "")
                  { 
                       $compl_insert     .= ", cvtransfer31";
                       $compl_insert_val .= ", '$this->cvtransfer31'";
                  } 
                  if ($this->catcte31 != "")
                  { 
                       $compl_insert     .= ", catcte31";
                       $compl_insert_val .= ", '$this->catcte31'";
                  } 
                  if ($this->ice31 != "")
                  { 
                       $compl_insert     .= ", ice31";
                       $compl_insert_val .= ", $this->ice31";
                  } 
                  if ($this->totsiniva31 != "")
                  { 
                       $compl_insert     .= ", totsiniva31";
                       $compl_insert_val .= ", $this->totsiniva31";
                  } 
                  if ($this->nbaseret43 != "")
                  { 
                       $compl_insert     .= ", nbaseret43";
                       $compl_insert_val .= ", $this->nbaseret43";
                  } 
                  if ($this->npctjeret43 != "")
                  { 
                       $compl_insert     .= ", npctjeret43";
                       $compl_insert_val .= ", $this->npctjeret43";
                  } 
                  if ($this->contrato != "")
                  { 
                       $compl_insert     .= ", contrato";
                       $compl_insert_val .= ", '$this->contrato'";
                  } 
                  if ($this->compra_general != "")
                  { 
                       $compl_insert     .= ", compra_general";
                       $compl_insert_val .= ", '$this->compra_general'";
                  } 
                  if ($this->distribucion_rubros != "")
                  { 
                       $compl_insert     .= ", distribucion_rubros";
                       $compl_insert_val .= ", '$this->distribucion_rubros'";
                  } 
                  if ($this->dstoley != "")
                  { 
                       $compl_insert     .= ", dstoLey";
                       $compl_insert_val .= ", $this->dstoley";
                  } 
                  if ($this->estado_electronico != "")
                  { 
                       $compl_insert     .= ", estado_electronico";
                       $compl_insert_val .= ", $this->estado_electronico";
                  } 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "tipodocto31, nofact31, nocte31, nomcte31, localid31, cvectenegro31, novend31, condpag31, nopagos31, formapago31, obra31, orden31, cvnegra31, cvimpto31, nobanco31, nombanco31, nocheque31, notarjeta31, nomtarjeta31, cvdivisa31, valdivisa31, lineaprod31, nopedido31, ruc31, tel31, transpor31, fectrasfer31, desctofp31, UID, recargos31, fecdocpr31, tipocomp31, conta31, fecvencidocpr, fecemb, norefrendo, baseice, ncodret43, remGas31, coddest31 $compl_insert) VALUES (" . $NM_seq_auto . "'$this->tipodocto31', '$this->nofact31', '$this->nocte31', '$this->nomcte31', '$this->localid31', '$this->cvectenegro31', '$this->novend31', $this->condpag31, $this->nopagos31, $this->formapago31, '$this->obra31', '$this->orden31', $this->cvnegra31, $this->cvimpto31, '$this->nobanco31', '$this->nombanco31', '$this->nocheque31', '$this->notarjeta31', '$this->nomtarjeta31', '$this->cvdivisa31', '$this->valdivisa31', '$this->lineaprod31', '$this->nopedido31', '$this->ruc31', '$this->tel31', '$this->transpor31', " . $this->Ini->date_delim . $this->fectrasfer31 . $this->Ini->date_delim1 . ", $this->desctofp31, $this->uid, $this->recargos31, " . $this->Ini->date_delim . $this->fecdocpr31 . $this->Ini->date_delim1 . ", '$this->tipocomp31', $this->conta31, " . $this->Ini->date_delim . $this->fecvencidocpr . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->fecemb . $this->Ini->date_delim1 . ", '$this->norefrendo', $this->baseice, '$this->ncodret43', '$this->remgas31', '$this->coddest31' $compl_insert_val)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              {
                  $compl_insert     = ""; 
                  $compl_insert_val = ""; 
                  if ($this->vtabta31 != "")
                  { 
                       $compl_insert     .= ", vtabta31";
                       $compl_insert_val .= ", $this->vtabta31";
                  } 
                  if ($this->descto31 != "")
                  { 
                       $compl_insert     .= ", descto31";
                       $compl_insert_val .= ", $this->descto31";
                  } 
                  if ($this->flete31 != "")
                  { 
                       $compl_insert     .= ", flete31";
                       $compl_insert_val .= ", $this->flete31";
                  } 
                  if ($this->itm31 != "")
                  { 
                       $compl_insert     .= ", itm31";
                       $compl_insert_val .= ", $this->itm31";
                  } 
                  if ($this->fecfact31 != "")
                  { 
                       $compl_insert     .= ", fecfact31";
                       $compl_insert_val .= ", " . $this->Ini->date_delim . $this->fecfact31 . $this->Ini->date_delim1 . "";
                  } 
                  if ($this->status31 != "")
                  { 
                       $compl_insert     .= ", status31";
                       $compl_insert_val .= ", $this->status31";
                  } 
                  if ($this->cvanulado31 != "")
                  { 
                       $compl_insert     .= ", cvanulado31";
                       $compl_insert_val .= ", $this->cvanulado31";
                  } 
                  if ($this->efectivo31 != "")
                  { 
                       $compl_insert     .= ", efectivo31";
                       $compl_insert_val .= ", $this->efectivo31";
                  } 
                  if ($this->cheque31 != "")
                  { 
                       $compl_insert     .= ", cheque31";
                       $compl_insert_val .= ", $this->cheque31";
                  } 
                  if ($this->tarjeta31 != "")
                  { 
                       $compl_insert     .= ", tarjeta31";
                       $compl_insert_val .= ", $this->tarjeta31";
                  } 
                  if ($this->acuenta31 != "")
                  { 
                       $compl_insert     .= ", acuenta31";
                       $compl_insert_val .= ", $this->acuenta31";
                  } 
                  if ($this->intereses31 != "")
                  { 
                       $compl_insert     .= ", intereses31";
                       $compl_insert_val .= ", $this->intereses31";
                  } 
                  if ($this->fecped31 != "")
                  { 
                       $compl_insert     .= ", fecped31";
                       $compl_insert_val .= ", " . $this->Ini->date_delim . $this->fecped31 . $this->Ini->date_delim1 . "";
                  } 
                  if ($this->cvtransfer31 != "")
                  { 
                       $compl_insert     .= ", cvtransfer31";
                       $compl_insert_val .= ", '$this->cvtransfer31'";
                  } 
                  if ($this->catcte31 != "")
                  { 
                       $compl_insert     .= ", catcte31";
                       $compl_insert_val .= ", '$this->catcte31'";
                  } 
                  if ($this->ice31 != "")
                  { 
                       $compl_insert     .= ", ice31";
                       $compl_insert_val .= ", $this->ice31";
                  } 
                  if ($this->totsiniva31 != "")
                  { 
                       $compl_insert     .= ", totsiniva31";
                       $compl_insert_val .= ", $this->totsiniva31";
                  } 
                  if ($this->nbaseret43 != "")
                  { 
                       $compl_insert     .= ", nbaseret43";
                       $compl_insert_val .= ", $this->nbaseret43";
                  } 
                  if ($this->npctjeret43 != "")
                  { 
                       $compl_insert     .= ", npctjeret43";
                       $compl_insert_val .= ", $this->npctjeret43";
                  } 
                  if ($this->contrato != "")
                  { 
                       $compl_insert     .= ", contrato";
                       $compl_insert_val .= ", '$this->contrato'";
                  } 
                  if ($this->compra_general != "")
                  { 
                       $compl_insert     .= ", compra_general";
                       $compl_insert_val .= ", '$this->compra_general'";
                  } 
                  if ($this->distribucion_rubros != "")
                  { 
                       $compl_insert     .= ", distribucion_rubros";
                       $compl_insert_val .= ", '$this->distribucion_rubros'";
                  } 
                  if ($this->dstoley != "")
                  { 
                       $compl_insert     .= ", dstoLey";
                       $compl_insert_val .= ", $this->dstoley";
                  } 
                  if ($this->estado_electronico != "")
                  { 
                       $compl_insert     .= ", estado_electronico";
                       $compl_insert_val .= ", $this->estado_electronico";
                  } 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "tipodocto31, nofact31, nocte31, nomcte31, localid31, cvectenegro31, novend31, condpag31, nopagos31, formapago31, obra31, orden31, cvnegra31, cvimpto31, nobanco31, nombanco31, nocheque31, notarjeta31, nomtarjeta31, cvdivisa31, valdivisa31, lineaprod31, nopedido31, ruc31, tel31, transpor31, fectrasfer31, desctofp31, UID, recargos31, fecdocpr31, tipocomp31, conta31, fecvencidocpr, fecemb, norefrendo, baseice, ncodret43, remGas31, coddest31 $compl_insert) VALUES (" . $NM_seq_auto . "'$this->tipodocto31', '$this->nofact31', '$this->nocte31', '$this->nomcte31', '$this->localid31', '$this->cvectenegro31', '$this->novend31', $this->condpag31, $this->nopagos31, $this->formapago31, '$this->obra31', '$this->orden31', $this->cvnegra31, $this->cvimpto31, '$this->nobanco31', '$this->nombanco31', '$this->nocheque31', '$this->notarjeta31', '$this->nomtarjeta31', '$this->cvdivisa31', '$this->valdivisa31', '$this->lineaprod31', '$this->nopedido31', '$this->ruc31', '$this->tel31', '$this->transpor31', " . $this->Ini->date_delim . $this->fectrasfer31 . $this->Ini->date_delim1 . ", $this->desctofp31, $this->uid, $this->recargos31, " . $this->Ini->date_delim . $this->fecdocpr31 . $this->Ini->date_delim1 . ", '$this->tipocomp31', $this->conta31, " . $this->Ini->date_delim . $this->fecvencidocpr . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->fecemb . $this->Ini->date_delim1 . ", '$this->norefrendo', $this->baseice, '$this->ncodret43', '$this->remgas31', '$this->coddest31' $compl_insert_val)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $compl_insert     = ""; 
                  $compl_insert_val = ""; 
                  if ($this->vtabta31 != "")
                  { 
                       $compl_insert     .= ", vtabta31";
                       $compl_insert_val .= ", $this->vtabta31";
                  } 
                  if ($this->descto31 != "")
                  { 
                       $compl_insert     .= ", descto31";
                       $compl_insert_val .= ", $this->descto31";
                  } 
                  if ($this->flete31 != "")
                  { 
                       $compl_insert     .= ", flete31";
                       $compl_insert_val .= ", $this->flete31";
                  } 
                  if ($this->itm31 != "")
                  { 
                       $compl_insert     .= ", itm31";
                       $compl_insert_val .= ", $this->itm31";
                  } 
                  if ($this->fecfact31 != "")
                  { 
                       $compl_insert     .= ", fecfact31";
                       $compl_insert_val .= ", EXTEND('$this->fecfact31', YEAR TO FRACTION)";
                  } 
                  if ($this->status31 != "")
                  { 
                       $compl_insert     .= ", status31";
                       $compl_insert_val .= ", $this->status31";
                  } 
                  if ($this->cvanulado31 != "")
                  { 
                       $compl_insert     .= ", cvanulado31";
                       $compl_insert_val .= ", $this->cvanulado31";
                  } 
                  if ($this->efectivo31 != "")
                  { 
                       $compl_insert     .= ", efectivo31";
                       $compl_insert_val .= ", $this->efectivo31";
                  } 
                  if ($this->cheque31 != "")
                  { 
                       $compl_insert     .= ", cheque31";
                       $compl_insert_val .= ", $this->cheque31";
                  } 
                  if ($this->tarjeta31 != "")
                  { 
                       $compl_insert     .= ", tarjeta31";
                       $compl_insert_val .= ", $this->tarjeta31";
                  } 
                  if ($this->acuenta31 != "")
                  { 
                       $compl_insert     .= ", acuenta31";
                       $compl_insert_val .= ", $this->acuenta31";
                  } 
                  if ($this->intereses31 != "")
                  { 
                       $compl_insert     .= ", intereses31";
                       $compl_insert_val .= ", $this->intereses31";
                  } 
                  if ($this->fecped31 != "")
                  { 
                       $compl_insert     .= ", fecped31";
                       $compl_insert_val .= ", EXTEND('$this->fecped31', YEAR TO FRACTION)";
                  } 
                  if ($this->cvtransfer31 != "")
                  { 
                       $compl_insert     .= ", cvtransfer31";
                       $compl_insert_val .= ", '$this->cvtransfer31'";
                  } 
                  if ($this->catcte31 != "")
                  { 
                       $compl_insert     .= ", catcte31";
                       $compl_insert_val .= ", '$this->catcte31'";
                  } 
                  if ($this->ice31 != "")
                  { 
                       $compl_insert     .= ", ice31";
                       $compl_insert_val .= ", $this->ice31";
                  } 
                  if ($this->totsiniva31 != "")
                  { 
                       $compl_insert     .= ", totsiniva31";
                       $compl_insert_val .= ", $this->totsiniva31";
                  } 
                  if ($this->nbaseret43 != "")
                  { 
                       $compl_insert     .= ", nbaseret43";
                       $compl_insert_val .= ", $this->nbaseret43";
                  } 
                  if ($this->npctjeret43 != "")
                  { 
                       $compl_insert     .= ", npctjeret43";
                       $compl_insert_val .= ", $this->npctjeret43";
                  } 
                  if ($this->contrato != "")
                  { 
                       $compl_insert     .= ", contrato";
                       $compl_insert_val .= ", '$this->contrato'";
                  } 
                  if ($this->compra_general != "")
                  { 
                       $compl_insert     .= ", compra_general";
                       $compl_insert_val .= ", '$this->compra_general'";
                  } 
                  if ($this->distribucion_rubros != "")
                  { 
                       $compl_insert     .= ", distribucion_rubros";
                       $compl_insert_val .= ", '$this->distribucion_rubros'";
                  } 
                  if ($this->dstoley != "")
                  { 
                       $compl_insert     .= ", dstoLey";
                       $compl_insert_val .= ", $this->dstoley";
                  } 
                  if ($this->estado_electronico != "")
                  { 
                       $compl_insert     .= ", estado_electronico";
                       $compl_insert_val .= ", $this->estado_electronico";
                  } 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "tipodocto31, nofact31, nocte31, nomcte31, localid31, cvectenegro31, novend31, condpag31, nopagos31, formapago31, obra31, orden31, cvnegra31, cvimpto31, nobanco31, nombanco31, nocheque31, notarjeta31, nomtarjeta31, cvdivisa31, valdivisa31, lineaprod31, nopedido31, ruc31, tel31, transpor31, fectrasfer31, desctofp31, UID, recargos31, fecdocpr31, tipocomp31, conta31, fecvencidocpr, fecemb, norefrendo, baseice, ncodret43, remGas31, coddest31 $compl_insert) VALUES (" . $NM_seq_auto . "'$this->tipodocto31', '$this->nofact31', '$this->nocte31', '$this->nomcte31', '$this->localid31', '$this->cvectenegro31', '$this->novend31', $this->condpag31, $this->nopagos31, $this->formapago31, '$this->obra31', '$this->orden31', $this->cvnegra31, $this->cvimpto31, '$this->nobanco31', '$this->nombanco31', '$this->nocheque31', '$this->notarjeta31', '$this->nomtarjeta31', '$this->cvdivisa31', '$this->valdivisa31', '$this->lineaprod31', '$this->nopedido31', '$this->ruc31', '$this->tel31', '$this->transpor31', EXTEND('$this->fectrasfer31', YEAR TO DAY), $this->desctofp31, $this->uid, $this->recargos31, EXTEND('$this->fecdocpr31', YEAR TO FRACTION), '$this->tipocomp31', $this->conta31, EXTEND('$this->fecvencidocpr', YEAR TO FRACTION), EXTEND('$this->fecemb', YEAR TO DAY), '$this->norefrendo', $this->baseice, '$this->ncodret43', '$this->remgas31', '$this->coddest31' $compl_insert_val)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
              {
                  $compl_insert     = ""; 
                  $compl_insert_val = ""; 
                  if ($this->vtabta31 != "")
                  { 
                       $compl_insert     .= ", vtabta31";
                       $compl_insert_val .= ", $this->vtabta31";
                  } 
                  if ($this->descto31 != "")
                  { 
                       $compl_insert     .= ", descto31";
                       $compl_insert_val .= ", $this->descto31";
                  } 
                  if ($this->flete31 != "")
                  { 
                       $compl_insert     .= ", flete31";
                       $compl_insert_val .= ", $this->flete31";
                  } 
                  if ($this->itm31 != "")
                  { 
                       $compl_insert     .= ", itm31";
                       $compl_insert_val .= ", $this->itm31";
                  } 
                  if ($this->fecfact31 != "")
                  { 
                       $compl_insert     .= ", fecfact31";
                       $compl_insert_val .= ", " . $this->Ini->date_delim . $this->fecfact31 . $this->Ini->date_delim1 . "";
                  } 
                  if ($this->status31 != "")
                  { 
                       $compl_insert     .= ", status31";
                       $compl_insert_val .= ", $this->status31";
                  } 
                  if ($this->cvanulado31 != "")
                  { 
                       $compl_insert     .= ", cvanulado31";
                       $compl_insert_val .= ", $this->cvanulado31";
                  } 
                  if ($this->efectivo31 != "")
                  { 
                       $compl_insert     .= ", efectivo31";
                       $compl_insert_val .= ", $this->efectivo31";
                  } 
                  if ($this->cheque31 != "")
                  { 
                       $compl_insert     .= ", cheque31";
                       $compl_insert_val .= ", $this->cheque31";
                  } 
                  if ($this->tarjeta31 != "")
                  { 
                       $compl_insert     .= ", tarjeta31";
                       $compl_insert_val .= ", $this->tarjeta31";
                  } 
                  if ($this->acuenta31 != "")
                  { 
                       $compl_insert     .= ", acuenta31";
                       $compl_insert_val .= ", $this->acuenta31";
                  } 
                  if ($this->intereses31 != "")
                  { 
                       $compl_insert     .= ", intereses31";
                       $compl_insert_val .= ", $this->intereses31";
                  } 
                  if ($this->fecped31 != "")
                  { 
                       $compl_insert     .= ", fecped31";
                       $compl_insert_val .= ", " . $this->Ini->date_delim . $this->fecped31 . $this->Ini->date_delim1 . "";
                  } 
                  if ($this->cvtransfer31 != "")
                  { 
                       $compl_insert     .= ", cvtransfer31";
                       $compl_insert_val .= ", '$this->cvtransfer31'";
                  } 
                  if ($this->catcte31 != "")
                  { 
                       $compl_insert     .= ", catcte31";
                       $compl_insert_val .= ", '$this->catcte31'";
                  } 
                  if ($this->ice31 != "")
                  { 
                       $compl_insert     .= ", ice31";
                       $compl_insert_val .= ", $this->ice31";
                  } 
                  if ($this->totsiniva31 != "")
                  { 
                       $compl_insert     .= ", totsiniva31";
                       $compl_insert_val .= ", $this->totsiniva31";
                  } 
                  if ($this->nbaseret43 != "")
                  { 
                       $compl_insert     .= ", nbaseret43";
                       $compl_insert_val .= ", $this->nbaseret43";
                  } 
                  if ($this->npctjeret43 != "")
                  { 
                       $compl_insert     .= ", npctjeret43";
                       $compl_insert_val .= ", $this->npctjeret43";
                  } 
                  if ($this->contrato != "")
                  { 
                       $compl_insert     .= ", contrato";
                       $compl_insert_val .= ", '$this->contrato'";
                  } 
                  if ($this->compra_general != "")
                  { 
                       $compl_insert     .= ", compra_general";
                       $compl_insert_val .= ", '$this->compra_general'";
                  } 
                  if ($this->distribucion_rubros != "")
                  { 
                       $compl_insert     .= ", distribucion_rubros";
                       $compl_insert_val .= ", '$this->distribucion_rubros'";
                  } 
                  if ($this->dstoley != "")
                  { 
                       $compl_insert     .= ", dstoLey";
                       $compl_insert_val .= ", $this->dstoley";
                  } 
                  if ($this->estado_electronico != "")
                  { 
                       $compl_insert     .= ", estado_electronico";
                       $compl_insert_val .= ", $this->estado_electronico";
                  } 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "tipodocto31, nofact31, nocte31, nomcte31, localid31, cvectenegro31, novend31, condpag31, nopagos31, formapago31, obra31, orden31, cvnegra31, cvimpto31, nobanco31, nombanco31, nocheque31, notarjeta31, nomtarjeta31, cvdivisa31, valdivisa31, lineaprod31, nopedido31, ruc31, tel31, transpor31, fectrasfer31, desctofp31, UID, recargos31, fecdocpr31, tipocomp31, conta31, fecvencidocpr, fecemb, norefrendo, baseice, ncodret43, remGas31, coddest31 $compl_insert) VALUES (" . $NM_seq_auto . "'$this->tipodocto31', '$this->nofact31', '$this->nocte31', '$this->nomcte31', '$this->localid31', '$this->cvectenegro31', '$this->novend31', $this->condpag31, $this->nopagos31, $this->formapago31, '$this->obra31', '$this->orden31', $this->cvnegra31, $this->cvimpto31, '$this->nobanco31', '$this->nombanco31', '$this->nocheque31', '$this->notarjeta31', '$this->nomtarjeta31', '$this->cvdivisa31', '$this->valdivisa31', '$this->lineaprod31', '$this->nopedido31', '$this->ruc31', '$this->tel31', '$this->transpor31', " . $this->Ini->date_delim . $this->fectrasfer31 . $this->Ini->date_delim1 . ", $this->desctofp31, $this->uid, $this->recargos31, " . $this->Ini->date_delim . $this->fecdocpr31 . $this->Ini->date_delim1 . ", '$this->tipocomp31', $this->conta31, " . $this->Ini->date_delim . $this->fecvencidocpr . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->fecemb . $this->Ini->date_delim1 . ", '$this->norefrendo', $this->baseice, '$this->ncodret43', '$this->remgas31', '$this->coddest31' $compl_insert_val)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
              {
                  $compl_insert     = ""; 
                  $compl_insert_val = ""; 
                  if ($this->vtabta31 != "")
                  { 
                       $compl_insert     .= ", vtabta31";
                       $compl_insert_val .= ", $this->vtabta31";
                  } 
                  if ($this->descto31 != "")
                  { 
                       $compl_insert     .= ", descto31";
                       $compl_insert_val .= ", $this->descto31";
                  } 
                  if ($this->flete31 != "")
                  { 
                       $compl_insert     .= ", flete31";
                       $compl_insert_val .= ", $this->flete31";
                  } 
                  if ($this->itm31 != "")
                  { 
                       $compl_insert     .= ", itm31";
                       $compl_insert_val .= ", $this->itm31";
                  } 
                  if ($this->fecfact31 != "")
                  { 
                       $compl_insert     .= ", fecfact31";
                       $compl_insert_val .= ", " . $this->Ini->date_delim . $this->fecfact31 . $this->Ini->date_delim1 . "";
                  } 
                  if ($this->status31 != "")
                  { 
                       $compl_insert     .= ", status31";
                       $compl_insert_val .= ", $this->status31";
                  } 
                  if ($this->cvanulado31 != "")
                  { 
                       $compl_insert     .= ", cvanulado31";
                       $compl_insert_val .= ", $this->cvanulado31";
                  } 
                  if ($this->efectivo31 != "")
                  { 
                       $compl_insert     .= ", efectivo31";
                       $compl_insert_val .= ", $this->efectivo31";
                  } 
                  if ($this->cheque31 != "")
                  { 
                       $compl_insert     .= ", cheque31";
                       $compl_insert_val .= ", $this->cheque31";
                  } 
                  if ($this->tarjeta31 != "")
                  { 
                       $compl_insert     .= ", tarjeta31";
                       $compl_insert_val .= ", $this->tarjeta31";
                  } 
                  if ($this->acuenta31 != "")
                  { 
                       $compl_insert     .= ", acuenta31";
                       $compl_insert_val .= ", $this->acuenta31";
                  } 
                  if ($this->intereses31 != "")
                  { 
                       $compl_insert     .= ", intereses31";
                       $compl_insert_val .= ", $this->intereses31";
                  } 
                  if ($this->fecped31 != "")
                  { 
                       $compl_insert     .= ", fecped31";
                       $compl_insert_val .= ", " . $this->Ini->date_delim . $this->fecped31 . $this->Ini->date_delim1 . "";
                  } 
                  if ($this->cvtransfer31 != "")
                  { 
                       $compl_insert     .= ", cvtransfer31";
                       $compl_insert_val .= ", '$this->cvtransfer31'";
                  } 
                  if ($this->catcte31 != "")
                  { 
                       $compl_insert     .= ", catcte31";
                       $compl_insert_val .= ", '$this->catcte31'";
                  } 
                  if ($this->ice31 != "")
                  { 
                       $compl_insert     .= ", ice31";
                       $compl_insert_val .= ", $this->ice31";
                  } 
                  if ($this->totsiniva31 != "")
                  { 
                       $compl_insert     .= ", totsiniva31";
                       $compl_insert_val .= ", $this->totsiniva31";
                  } 
                  if ($this->nbaseret43 != "")
                  { 
                       $compl_insert     .= ", nbaseret43";
                       $compl_insert_val .= ", $this->nbaseret43";
                  } 
                  if ($this->npctjeret43 != "")
                  { 
                       $compl_insert     .= ", npctjeret43";
                       $compl_insert_val .= ", $this->npctjeret43";
                  } 
                  if ($this->contrato != "")
                  { 
                       $compl_insert     .= ", contrato";
                       $compl_insert_val .= ", '$this->contrato'";
                  } 
                  if ($this->compra_general != "")
                  { 
                       $compl_insert     .= ", compra_general";
                       $compl_insert_val .= ", '$this->compra_general'";
                  } 
                  if ($this->distribucion_rubros != "")
                  { 
                       $compl_insert     .= ", distribucion_rubros";
                       $compl_insert_val .= ", '$this->distribucion_rubros'";
                  } 
                  if ($this->dstoley != "")
                  { 
                       $compl_insert     .= ", dstoLey";
                       $compl_insert_val .= ", $this->dstoley";
                  } 
                  if ($this->estado_electronico != "")
                  { 
                       $compl_insert     .= ", estado_electronico";
                       $compl_insert_val .= ", $this->estado_electronico";
                  } 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "tipodocto31, nofact31, nocte31, nomcte31, localid31, cvectenegro31, novend31, condpag31, nopagos31, formapago31, obra31, orden31, cvnegra31, cvimpto31, nobanco31, nombanco31, nocheque31, notarjeta31, nomtarjeta31, cvdivisa31, valdivisa31, lineaprod31, nopedido31, ruc31, tel31, transpor31, fectrasfer31, desctofp31, UID, recargos31, fecdocpr31, tipocomp31, conta31, fecvencidocpr, fecemb, norefrendo, baseice, ncodret43, remGas31, coddest31 $compl_insert) VALUES (" . $NM_seq_auto . "'$this->tipodocto31', '$this->nofact31', '$this->nocte31', '$this->nomcte31', '$this->localid31', '$this->cvectenegro31', '$this->novend31', $this->condpag31, $this->nopagos31, $this->formapago31, '$this->obra31', '$this->orden31', $this->cvnegra31, $this->cvimpto31, '$this->nobanco31', '$this->nombanco31', '$this->nocheque31', '$this->notarjeta31', '$this->nomtarjeta31', '$this->cvdivisa31', '$this->valdivisa31', '$this->lineaprod31', '$this->nopedido31', '$this->ruc31', '$this->tel31', '$this->transpor31', " . $this->Ini->date_delim . $this->fectrasfer31 . $this->Ini->date_delim1 . ", $this->desctofp31, $this->uid, $this->recargos31, " . $this->Ini->date_delim . $this->fecdocpr31 . $this->Ini->date_delim1 . ", '$this->tipocomp31', $this->conta31, " . $this->Ini->date_delim . $this->fecvencidocpr . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->fecemb . $this->Ini->date_delim1 . ", '$this->norefrendo', $this->baseice, '$this->ncodret43', '$this->remgas31', '$this->coddest31' $compl_insert_val)"; 
              }
              elseif ($this->Ini->nm_tpbanco == 'pdo_ibm')
              {
                  $compl_insert     = ""; 
                  $compl_insert_val = ""; 
                  if ($this->vtabta31 != "")
                  { 
                       $compl_insert     .= ", vtabta31";
                       $compl_insert_val .= ", $this->vtabta31";
                  } 
                  if ($this->descto31 != "")
                  { 
                       $compl_insert     .= ", descto31";
                       $compl_insert_val .= ", $this->descto31";
                  } 
                  if ($this->flete31 != "")
                  { 
                       $compl_insert     .= ", flete31";
                       $compl_insert_val .= ", $this->flete31";
                  } 
                  if ($this->itm31 != "")
                  { 
                       $compl_insert     .= ", itm31";
                       $compl_insert_val .= ", $this->itm31";
                  } 
                  if ($this->fecfact31 != "")
                  { 
                       $compl_insert     .= ", fecfact31";
                       $compl_insert_val .= ", " . $this->Ini->date_delim . $this->fecfact31 . $this->Ini->date_delim1 . "";
                  } 
                  if ($this->status31 != "")
                  { 
                       $compl_insert     .= ", status31";
                       $compl_insert_val .= ", $this->status31";
                  } 
                  if ($this->cvanulado31 != "")
                  { 
                       $compl_insert     .= ", cvanulado31";
                       $compl_insert_val .= ", $this->cvanulado31";
                  } 
                  if ($this->efectivo31 != "")
                  { 
                       $compl_insert     .= ", efectivo31";
                       $compl_insert_val .= ", $this->efectivo31";
                  } 
                  if ($this->cheque31 != "")
                  { 
                       $compl_insert     .= ", cheque31";
                       $compl_insert_val .= ", $this->cheque31";
                  } 
                  if ($this->tarjeta31 != "")
                  { 
                       $compl_insert     .= ", tarjeta31";
                       $compl_insert_val .= ", $this->tarjeta31";
                  } 
                  if ($this->acuenta31 != "")
                  { 
                       $compl_insert     .= ", acuenta31";
                       $compl_insert_val .= ", $this->acuenta31";
                  } 
                  if ($this->intereses31 != "")
                  { 
                       $compl_insert     .= ", intereses31";
                       $compl_insert_val .= ", $this->intereses31";
                  } 
                  if ($this->fecped31 != "")
                  { 
                       $compl_insert     .= ", fecped31";
                       $compl_insert_val .= ", " . $this->Ini->date_delim . $this->fecped31 . $this->Ini->date_delim1 . "";
                  } 
                  if ($this->cvtransfer31 != "")
                  { 
                       $compl_insert     .= ", cvtransfer31";
                       $compl_insert_val .= ", '$this->cvtransfer31'";
                  } 
                  if ($this->catcte31 != "")
                  { 
                       $compl_insert     .= ", catcte31";
                       $compl_insert_val .= ", '$this->catcte31'";
                  } 
                  if ($this->ice31 != "")
                  { 
                       $compl_insert     .= ", ice31";
                       $compl_insert_val .= ", $this->ice31";
                  } 
                  if ($this->totsiniva31 != "")
                  { 
                       $compl_insert     .= ", totsiniva31";
                       $compl_insert_val .= ", $this->totsiniva31";
                  } 
                  if ($this->nbaseret43 != "")
                  { 
                       $compl_insert     .= ", nbaseret43";
                       $compl_insert_val .= ", $this->nbaseret43";
                  } 
                  if ($this->npctjeret43 != "")
                  { 
                       $compl_insert     .= ", npctjeret43";
                       $compl_insert_val .= ", $this->npctjeret43";
                  } 
                  if ($this->contrato != "")
                  { 
                       $compl_insert     .= ", contrato";
                       $compl_insert_val .= ", '$this->contrato'";
                  } 
                  if ($this->compra_general != "")
                  { 
                       $compl_insert     .= ", compra_general";
                       $compl_insert_val .= ", '$this->compra_general'";
                  } 
                  if ($this->distribucion_rubros != "")
                  { 
                       $compl_insert     .= ", distribucion_rubros";
                       $compl_insert_val .= ", '$this->distribucion_rubros'";
                  } 
                  if ($this->dstoley != "")
                  { 
                       $compl_insert     .= ", dstoLey";
                       $compl_insert_val .= ", $this->dstoley";
                  } 
                  if ($this->estado_electronico != "")
                  { 
                       $compl_insert     .= ", estado_electronico";
                       $compl_insert_val .= ", $this->estado_electronico";
                  } 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "tipodocto31, nofact31, nocte31, nomcte31, localid31, cvectenegro31, novend31, condpag31, nopagos31, formapago31, obra31, orden31, cvnegra31, cvimpto31, nobanco31, nombanco31, nocheque31, notarjeta31, nomtarjeta31, cvdivisa31, valdivisa31, lineaprod31, nopedido31, ruc31, tel31, transpor31, fectrasfer31, desctofp31, UID, recargos31, fecdocpr31, tipocomp31, conta31, fecvencidocpr, fecemb, norefrendo, baseice, ncodret43, remGas31, coddest31 $compl_insert) VALUES (" . $NM_seq_auto . "'$this->tipodocto31', '$this->nofact31', '$this->nocte31', '$this->nomcte31', '$this->localid31', '$this->cvectenegro31', '$this->novend31', $this->condpag31, $this->nopagos31, $this->formapago31, '$this->obra31', '$this->orden31', $this->cvnegra31, $this->cvimpto31, '$this->nobanco31', '$this->nombanco31', '$this->nocheque31', '$this->notarjeta31', '$this->nomtarjeta31', '$this->cvdivisa31', '$this->valdivisa31', '$this->lineaprod31', '$this->nopedido31', '$this->ruc31', '$this->tel31', '$this->transpor31', " . $this->Ini->date_delim . $this->fectrasfer31 . $this->Ini->date_delim1 . ", $this->desctofp31, $this->uid, $this->recargos31, " . $this->Ini->date_delim . $this->fecdocpr31 . $this->Ini->date_delim1 . ", '$this->tipocomp31', $this->conta31, " . $this->Ini->date_delim . $this->fecvencidocpr . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->fecemb . $this->Ini->date_delim1 . ", '$this->norefrendo', $this->baseice, '$this->ncodret43', '$this->remgas31', '$this->coddest31' $compl_insert_val)"; 
              }
              else
              {
                  $compl_insert     = ""; 
                  $compl_insert_val = ""; 
                  if ($this->vtabta31 != "")
                  { 
                       $compl_insert     .= ", vtabta31";
                       $compl_insert_val .= ", $this->vtabta31";
                  } 
                  if ($this->descto31 != "")
                  { 
                       $compl_insert     .= ", descto31";
                       $compl_insert_val .= ", $this->descto31";
                  } 
                  if ($this->flete31 != "")
                  { 
                       $compl_insert     .= ", flete31";
                       $compl_insert_val .= ", $this->flete31";
                  } 
                  if ($this->itm31 != "")
                  { 
                       $compl_insert     .= ", itm31";
                       $compl_insert_val .= ", $this->itm31";
                  } 
                  if ($this->fecfact31 != "")
                  { 
                       $compl_insert     .= ", fecfact31";
                       $compl_insert_val .= ", " . $this->Ini->date_delim . $this->fecfact31 . $this->Ini->date_delim1 . "";
                  } 
                  if ($this->status31 != "")
                  { 
                       $compl_insert     .= ", status31";
                       $compl_insert_val .= ", $this->status31";
                  } 
                  if ($this->cvanulado31 != "")
                  { 
                       $compl_insert     .= ", cvanulado31";
                       $compl_insert_val .= ", $this->cvanulado31";
                  } 
                  if ($this->efectivo31 != "")
                  { 
                       $compl_insert     .= ", efectivo31";
                       $compl_insert_val .= ", $this->efectivo31";
                  } 
                  if ($this->cheque31 != "")
                  { 
                       $compl_insert     .= ", cheque31";
                       $compl_insert_val .= ", $this->cheque31";
                  } 
                  if ($this->tarjeta31 != "")
                  { 
                       $compl_insert     .= ", tarjeta31";
                       $compl_insert_val .= ", $this->tarjeta31";
                  } 
                  if ($this->acuenta31 != "")
                  { 
                       $compl_insert     .= ", acuenta31";
                       $compl_insert_val .= ", $this->acuenta31";
                  } 
                  if ($this->intereses31 != "")
                  { 
                       $compl_insert     .= ", intereses31";
                       $compl_insert_val .= ", $this->intereses31";
                  } 
                  if ($this->fecped31 != "")
                  { 
                       $compl_insert     .= ", fecped31";
                       $compl_insert_val .= ", " . $this->Ini->date_delim . $this->fecped31 . $this->Ini->date_delim1 . "";
                  } 
                  if ($this->cvtransfer31 != "")
                  { 
                       $compl_insert     .= ", cvtransfer31";
                       $compl_insert_val .= ", '$this->cvtransfer31'";
                  } 
                  if ($this->catcte31 != "")
                  { 
                       $compl_insert     .= ", catcte31";
                       $compl_insert_val .= ", '$this->catcte31'";
                  } 
                  if ($this->ice31 != "")
                  { 
                       $compl_insert     .= ", ice31";
                       $compl_insert_val .= ", $this->ice31";
                  } 
                  if ($this->totsiniva31 != "")
                  { 
                       $compl_insert     .= ", totsiniva31";
                       $compl_insert_val .= ", $this->totsiniva31";
                  } 
                  if ($this->nbaseret43 != "")
                  { 
                       $compl_insert     .= ", nbaseret43";
                       $compl_insert_val .= ", $this->nbaseret43";
                  } 
                  if ($this->npctjeret43 != "")
                  { 
                       $compl_insert     .= ", npctjeret43";
                       $compl_insert_val .= ", $this->npctjeret43";
                  } 
                  if ($this->contrato != "")
                  { 
                       $compl_insert     .= ", contrato";
                       $compl_insert_val .= ", '$this->contrato'";
                  } 
                  if ($this->compra_general != "")
                  { 
                       $compl_insert     .= ", compra_general";
                       $compl_insert_val .= ", '$this->compra_general'";
                  } 
                  if ($this->distribucion_rubros != "")
                  { 
                       $compl_insert     .= ", distribucion_rubros";
                       $compl_insert_val .= ", '$this->distribucion_rubros'";
                  } 
                  if ($this->dstoley != "")
                  { 
                       $compl_insert     .= ", dstoLey";
                       $compl_insert_val .= ", $this->dstoley";
                  } 
                  if ($this->estado_electronico != "")
                  { 
                       $compl_insert     .= ", estado_electronico";
                       $compl_insert_val .= ", $this->estado_electronico";
                  } 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "tipodocto31, nofact31, nocte31, nomcte31, localid31, cvectenegro31, novend31, condpag31, nopagos31, formapago31, obra31, orden31, cvnegra31, cvimpto31, nobanco31, nombanco31, nocheque31, notarjeta31, nomtarjeta31, cvdivisa31, valdivisa31, lineaprod31, nopedido31, ruc31, tel31, transpor31, fectrasfer31, desctofp31, UID, recargos31, fecdocpr31, tipocomp31, conta31, fecvencidocpr, fecemb, norefrendo, baseice, ncodret43, remGas31, coddest31 $compl_insert) VALUES (" . $NM_seq_auto . "'$this->tipodocto31', '$this->nofact31', '$this->nocte31', '$this->nomcte31', '$this->localid31', '$this->cvectenegro31', '$this->novend31', $this->condpag31, $this->nopagos31, $this->formapago31, '$this->obra31', '$this->orden31', $this->cvnegra31, $this->cvimpto31, '$this->nobanco31', '$this->nombanco31', '$this->nocheque31', '$this->notarjeta31', '$this->nomtarjeta31', '$this->cvdivisa31', '$this->valdivisa31', '$this->lineaprod31', '$this->nopedido31', '$this->ruc31', '$this->tel31', '$this->transpor31', " . $this->Ini->date_delim . $this->fectrasfer31 . $this->Ini->date_delim1 . ", $this->desctofp31, $this->uid, $this->recargos31, " . $this->Ini->date_delim . $this->fecdocpr31 . $this->Ini->date_delim1 . ", '$this->tipocomp31', $this->conta31, " . $this->Ini->date_delim . $this->fecvencidocpr . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->fecemb . $this->Ini->date_delim1 . ", '$this->norefrendo', $this->baseice, '$this->ncodret43', '$this->remgas31', '$this->coddest31' $compl_insert_val)"; 
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
                              form_maecom_pack_ajax_response();
                              exit; 
                          }
                      }  
                  }  
              }  
              if ('refresh_insert' != $this->nmgp_opcao)
              {
              $this->tipodocto31 = $this->tipodocto31_before_qstr;
              $this->nofact31 = $this->nofact31_before_qstr;
              $this->nocte31 = $this->nocte31_before_qstr;
              $this->nomcte31 = $this->nomcte31_before_qstr;
              $this->localid31 = $this->localid31_before_qstr;
              $this->cvectenegro31 = $this->cvectenegro31_before_qstr;
              $this->novend31 = $this->novend31_before_qstr;
              $this->obra31 = $this->obra31_before_qstr;
              $this->orden31 = $this->orden31_before_qstr;
              $this->nobanco31 = $this->nobanco31_before_qstr;
              $this->nombanco31 = $this->nombanco31_before_qstr;
              $this->nocheque31 = $this->nocheque31_before_qstr;
              $this->notarjeta31 = $this->notarjeta31_before_qstr;
              $this->nomtarjeta31 = $this->nomtarjeta31_before_qstr;
              $this->cvdivisa31 = $this->cvdivisa31_before_qstr;
              $this->valdivisa31 = $this->valdivisa31_before_qstr;
              $this->lineaprod31 = $this->lineaprod31_before_qstr;
              $this->nopedido31 = $this->nopedido31_before_qstr;
              $this->ruc31 = $this->ruc31_before_qstr;
              $this->tel31 = $this->tel31_before_qstr;
              $this->transpor31 = $this->transpor31_before_qstr;
              $this->cvtransfer31 = $this->cvtransfer31_before_qstr;
              $this->catcte31 = $this->catcte31_before_qstr;
              $this->tipocomp31 = $this->tipocomp31_before_qstr;
              $this->norefrendo = $this->norefrendo_before_qstr;
              $this->ncodret43 = $this->ncodret43_before_qstr;
              $this->contrato = $this->contrato_before_qstr;
              $this->compra_general = $this->compra_general_before_qstr;
              $this->distribucion_rubros = $this->distribucion_rubros_before_qstr;
              $this->remgas31 = $this->remgas31_before_qstr;
              $this->coddest31 = $this->coddest31_before_qstr;
              }

              $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['db_changed'] = true;

              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['total']))
              {
                  unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['total']);
              }

              $this->sc_evento = "insert"; 
              $this->tipodocto31 = $this->tipodocto31_before_qstr;
              $this->nofact31 = $this->nofact31_before_qstr;
              $this->nocte31 = $this->nocte31_before_qstr;
              $this->nomcte31 = $this->nomcte31_before_qstr;
              $this->localid31 = $this->localid31_before_qstr;
              $this->cvectenegro31 = $this->cvectenegro31_before_qstr;
              $this->novend31 = $this->novend31_before_qstr;
              $this->obra31 = $this->obra31_before_qstr;
              $this->orden31 = $this->orden31_before_qstr;
              $this->nobanco31 = $this->nobanco31_before_qstr;
              $this->nombanco31 = $this->nombanco31_before_qstr;
              $this->nocheque31 = $this->nocheque31_before_qstr;
              $this->notarjeta31 = $this->notarjeta31_before_qstr;
              $this->nomtarjeta31 = $this->nomtarjeta31_before_qstr;
              $this->cvdivisa31 = $this->cvdivisa31_before_qstr;
              $this->valdivisa31 = $this->valdivisa31_before_qstr;
              $this->lineaprod31 = $this->lineaprod31_before_qstr;
              $this->nopedido31 = $this->nopedido31_before_qstr;
              $this->ruc31 = $this->ruc31_before_qstr;
              $this->tel31 = $this->tel31_before_qstr;
              $this->transpor31 = $this->transpor31_before_qstr;
              $this->cvtransfer31 = $this->cvtransfer31_before_qstr;
              $this->catcte31 = $this->catcte31_before_qstr;
              $this->tipocomp31 = $this->tipocomp31_before_qstr;
              $this->norefrendo = $this->norefrendo_before_qstr;
              $this->ncodret43 = $this->ncodret43_before_qstr;
              $this->contrato = $this->contrato_before_qstr;
              $this->compra_general = $this->compra_general_before_qstr;
              $this->distribucion_rubros = $this->distribucion_rubros_before_qstr;
              $this->remgas31 = $this->remgas31_before_qstr;
              $this->coddest31 = $this->coddest31_before_qstr;
              $this->sc_insert_on = true; 
              if (empty($this->sc_erro_insert)) {
                  $this->record_insert_ok = true;
              } 
              if ('refresh_insert' != $this->nmgp_opcao && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['sc_redir_insert']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['sc_redir_insert'] != "S"))
              {
              $this->nmgp_opcao = "novo"; 
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['run_iframe'] == "R")
              { 
                   $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['return_edit'] = "new";
              } 
              }
              $this->nm_flag_iframe = true;
          } 
          if ($this->lig_edit_lookup)
          {
              $this->lig_edit_lookup_call = true;
          }
      } 
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['decimal_db'] == ",") 
      {
          $this->nm_tira_aspas_decimal();
      }
      if ($this->nmgp_opcao == "excluir") 
      { 
          $this->tipodocto31 = substr($this->Db->qstr($this->tipodocto31), 1, -1); 
          $this->nofact31 = substr($this->Db->qstr($this->nofact31), 1, -1); 

          $bDelecaoOk = true;
          $sMsgErro   = '';

          if ($bDelecaoOk)
          {

          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where tipodocto31 = '$this->tipodocto31' and nofact31 = '$this->nofact31'"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where tipodocto31 = '$this->tipodocto31' and nofact31 = '$this->nofact31' "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where tipodocto31 = '$this->tipodocto31' and nofact31 = '$this->nofact31'"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where tipodocto31 = '$this->tipodocto31' and nofact31 = '$this->nofact31' "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where tipodocto31 = '$this->tipodocto31' and nofact31 = '$this->nofact31'"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where tipodocto31 = '$this->tipodocto31' and nofact31 = '$this->nofact31' "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where tipodocto31 = '$this->tipodocto31' and nofact31 = '$this->nofact31'"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where tipodocto31 = '$this->tipodocto31' and nofact31 = '$this->nofact31' "); 
          }  
          else  
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where tipodocto31 = '$this->tipodocto31' and nofact31 = '$this->nofact31'"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where tipodocto31 = '$this->tipodocto31' and nofact31 = '$this->nofact31' "); 
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
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where tipodocto31 = '$this->tipodocto31' and nofact31 = '$this->nofact31' "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where tipodocto31 = '$this->tipodocto31' and nofact31 = '$this->nofact31' "); 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where tipodocto31 = '$this->tipodocto31' and nofact31 = '$this->nofact31' "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where tipodocto31 = '$this->tipodocto31' and nofact31 = '$this->nofact31' "); 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              {
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where tipodocto31 = '$this->tipodocto31' and nofact31 = '$this->nofact31' "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where tipodocto31 = '$this->tipodocto31' and nofact31 = '$this->nofact31' "); 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where tipodocto31 = '$this->tipodocto31' and nofact31 = '$this->nofact31' "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where tipodocto31 = '$this->tipodocto31' and nofact31 = '$this->nofact31' "); 
              }  
              else  
              {
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where tipodocto31 = '$this->tipodocto31' and nofact31 = '$this->nofact31' "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where tipodocto31 = '$this->tipodocto31' and nofact31 = '$this->nofact31' "); 
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
                          form_maecom_pack_ajax_response();
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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['reg_start']--; 
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['reg_start'] < 0)
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['reg_start'] = 0; 
              }

              $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['db_changed'] = true;

              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['total']))
              {
                  unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['total']);
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
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['parms'] = "tipodocto31?#?$this->tipodocto31?@?nofact31?#?$this->nofact31?@?"; 
      }
      $this->NM_commit_db(); 
      if ($this->sc_evento != "insert" && $this->sc_evento != "update" && $this->sc_evento != "delete")
      { 
          $this->tipodocto31 = null === $this->tipodocto31 ? null : substr($this->Db->qstr($this->tipodocto31), 1, -1); 
          $this->nofact31 = null === $this->nofact31 ? null : substr($this->Db->qstr($this->nofact31), 1, -1); 
      } 
      if (isset($this->NM_where_filter))
      {
          $this->NM_where_filter = str_replace("@percent@", "%", $this->NM_where_filter);
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['where_filter'] = trim($this->NM_where_filter);
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['total']))
          {
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['total']);
          }
      }
      $sc_where_filter = '';
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['where_filter_form']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['where_filter_form'])
      {
          $sc_where_filter = $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['where_filter_form'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['where_filter']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['where_filter'] && $sc_where_filter != $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['where_filter'])
      {
          if (empty($sc_where_filter))
          {
              $sc_where_filter = $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['where_filter'];
          }
          else
          {
              $sc_where_filter .= " and (" . $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['where_filter'] . ")";
          }
      }
//------------ 
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['run_iframe'] == "R")
      {
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['iframe_evento'] == "insert") 
          { 
               $this->nmgp_opcao = "novo"; 
               $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['select'] = "";
          } 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['iframe_evento'] = $this->sc_evento; 
      } 
      if (!isset($this->nmgp_opcao) || empty($this->nmgp_opcao)) 
      { 
          if (empty($this->tipodocto31) && empty($this->nofact31)) 
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
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
      { 
          $GLOBALS["NM_ERRO_IBASE"] = 1;  
      } 
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['run_iframe'] == "F" && $this->sc_evento == "insert")
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
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['total']))
      { 
          $nmgp_select = "SELECT count(*) AS countTest from " . $this->Ini->nm_tabela . $sc_where; 
          $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
          $rt = $this->Db->Execute($nmgp_select) ; 
          if ($rt === false && !$rt->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
              exit ; 
          }  
          $qt_geral_reg_form_maecom = isset($rt->fields[0]) ? $rt->fields[0] - 1 : 0; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['total'] = $qt_geral_reg_form_maecom;
          $rt->Close(); 
          if ($this->nmgp_opcao == "igual" && isset($this->NM_btn_navega) && 'S' == $this->NM_btn_navega && !empty($this->tipodocto31) && !empty($this->nofact31))
          {
              $Reg_OK      = false;
              $Count_start = -1;
              $sc_order_by = "";
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
                  $Sel_Chave = "tipodocto31, nofact31"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              {
                  $Sel_Chave = "tipodocto31, nofact31"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $Sel_Chave = "tipodocto31, nofact31"; 
              }
              else  
              {
                  $Sel_Chave = "tipodocto31, nofact31"; 
              }
              $nmgp_select = "SELECT " . $Sel_Chave . " from " . $this->Ini->nm_tabela . $sc_where; 
              $sc_order_by = "tipodocto31, nofact31";
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
                  if ($rt->fields[0] == $this->tipodocto31 && $rt->fields[1] == $this->nofact31)
                  { 
                      $Reg_OK = true;
                  }  
                  $Count_start++;
                  $rt->MoveNext();
              }  
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['reg_start'] = $Count_start;
              $rt->Close(); 
          }
      } 
      else 
      { 
          $qt_geral_reg_form_maecom = $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['total'];
      } 
      if ($this->nmgp_opcao == "inicio") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['reg_start'] = 0; 
      } 
      if ($this->nmgp_opcao == "avanca")  
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['reg_start']++; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['reg_start'] > $qt_geral_reg_form_maecom)
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['reg_start'] = $qt_geral_reg_form_maecom; 
          }
      } 
      if ($this->nmgp_opcao == "retorna") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['reg_start']--; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['reg_start'] < 0)
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['reg_start'] = 0; 
          }
      } 
      if ($this->nmgp_opcao == "final") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['reg_start'] = $qt_geral_reg_form_maecom; 
      } 
      if ($this->nmgp_opcao == "navpage" && ($this->nmgp_ordem - 1) <= $qt_geral_reg_form_maecom) 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['reg_start'] = $this->nmgp_ordem - 1; 
      } 
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['reg_start']) || empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['reg_start']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['reg_start'] = 0;
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['reg_qtd'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['reg_start'] + 1;
      $this->NM_ajax_info['navSummary']['reg_ini'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['reg_start'] + 1; 
      $this->NM_ajax_info['navSummary']['reg_qtd'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['reg_qtd']; 
      $this->NM_ajax_info['navSummary']['reg_tot'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['total'] + 1; 
      $this->NM_gera_nav_page(); 
      $this->NM_ajax_info['navPage'] = $this->SC_nav_page; 
      $GLOBALS["NM_ERRO_IBASE"] = 0;  
//---------- 
      if ($this->nmgp_opcao != "novo" && $this->nmgp_opcao != "nada" && $this->nmgp_opcao != "refresh_insert") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['parms'] = ""; 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
          { 
              $GLOBALS["NM_ERRO_IBASE"] = 1;  
          } 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
          { 
              $nmgp_select = "SELECT tipodocto31, nofact31, nocte31, nomcte31, localid31, cvectenegro31, vtabta31, descto31, flete31, itm31, novend31, str_replace (convert(char(10),fecfact31,102), '.', '-') + ' ' + convert(char(8),fecfact31,20), condpag31, nopagos31, formapago31, obra31, orden31, cvnegra31, status31, cvimpto31, cvanulado31, efectivo31, cheque31, tarjeta31, acuenta31, nobanco31, nombanco31, nocheque31, notarjeta31, nomtarjeta31, cvdivisa31, valdivisa31, lineaprod31, intereses31, nopedido31, str_replace (convert(char(10),fecped31,102), '.', '-') + ' ' + convert(char(8),fecped31,20), ruc31, tel31, transpor31, cvtransfer31, str_replace (convert(char(10),fectrasfer31,102), '.', '-') + ' ' + convert(char(8),fectrasfer31,20), desctofp31, catcte31, UID, recargos31, ice31, str_replace (convert(char(10),fecdocpr31,102), '.', '-') + ' ' + convert(char(8),fecdocpr31,20), tipocomp31, conta31, str_replace (convert(char(10),fecvencidocpr,102), '.', '-') + ' ' + convert(char(8),fecvencidocpr,20), totsiniva31, str_replace (convert(char(10),fecemb,102), '.', '-') + ' ' + convert(char(8),fecemb,20), norefrendo, baseice, ncodret43, nbaseret43, npctjeret43, contrato, compra_general, distribucion_rubros, dstoLey, remGas31, estado_electronico, coddest31 from " . $this->Ini->nm_tabela ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          { 
              $nmgp_select = "SELECT tipodocto31, nofact31, nocte31, nomcte31, localid31, cvectenegro31, vtabta31, descto31, flete31, itm31, novend31, convert(char(23),fecfact31,121), condpag31, nopagos31, formapago31, obra31, orden31, cvnegra31, status31, cvimpto31, cvanulado31, efectivo31, cheque31, tarjeta31, acuenta31, nobanco31, nombanco31, nocheque31, notarjeta31, nomtarjeta31, cvdivisa31, valdivisa31, lineaprod31, intereses31, nopedido31, convert(char(23),fecped31,121), ruc31, tel31, transpor31, cvtransfer31, convert(char(23),fectrasfer31,121), desctofp31, catcte31, UID, recargos31, ice31, convert(char(23),fecdocpr31,121), tipocomp31, conta31, convert(char(23),fecvencidocpr,121), totsiniva31, convert(char(23),fecemb,121), norefrendo, baseice, ncodret43, nbaseret43, npctjeret43, contrato, compra_general, distribucion_rubros, dstoLey, remGas31, estado_electronico, coddest31 from " . $this->Ini->nm_tabela ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          { 
              $nmgp_select = "SELECT tipodocto31, nofact31, nocte31, nomcte31, localid31, cvectenegro31, vtabta31, descto31, flete31, itm31, novend31, fecfact31, condpag31, nopagos31, formapago31, obra31, orden31, cvnegra31, status31, cvimpto31, cvanulado31, efectivo31, cheque31, tarjeta31, acuenta31, nobanco31, nombanco31, nocheque31, notarjeta31, nomtarjeta31, cvdivisa31, valdivisa31, lineaprod31, intereses31, nopedido31, fecped31, ruc31, tel31, transpor31, cvtransfer31, fectrasfer31, desctofp31, catcte31, UID, recargos31, ice31, fecdocpr31, tipocomp31, conta31, fecvencidocpr, totsiniva31, fecemb, norefrendo, baseice, ncodret43, nbaseret43, npctjeret43, contrato, compra_general, distribucion_rubros, dstoLey, remGas31, estado_electronico, coddest31 from " . $this->Ini->nm_tabela ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          { 
              $nmgp_select = "SELECT tipodocto31, nofact31, nocte31, nomcte31, localid31, cvectenegro31, vtabta31, descto31, flete31, itm31, novend31, EXTEND(fecfact31, YEAR TO FRACTION), condpag31, nopagos31, formapago31, obra31, orden31, cvnegra31, status31, cvimpto31, cvanulado31, efectivo31, cheque31, tarjeta31, acuenta31, nobanco31, nombanco31, nocheque31, notarjeta31, nomtarjeta31, cvdivisa31, valdivisa31, lineaprod31, intereses31, nopedido31, EXTEND(fecped31, YEAR TO FRACTION), ruc31, tel31, transpor31, cvtransfer31, EXTEND(fectrasfer31, YEAR TO DAY), desctofp31, catcte31, UID, recargos31, ice31, EXTEND(fecdocpr31, YEAR TO FRACTION), tipocomp31, conta31, EXTEND(fecvencidocpr, YEAR TO FRACTION), totsiniva31, EXTEND(fecemb, YEAR TO DAY), norefrendo, baseice, ncodret43, nbaseret43, npctjeret43, contrato, compra_general, distribucion_rubros, dstoLey, remGas31, estado_electronico, coddest31 from " . $this->Ini->nm_tabela ; 
          } 
          else 
          { 
              $nmgp_select = "SELECT tipodocto31, nofact31, nocte31, nomcte31, localid31, cvectenegro31, vtabta31, descto31, flete31, itm31, novend31, fecfact31, condpag31, nopagos31, formapago31, obra31, orden31, cvnegra31, status31, cvimpto31, cvanulado31, efectivo31, cheque31, tarjeta31, acuenta31, nobanco31, nombanco31, nocheque31, notarjeta31, nomtarjeta31, cvdivisa31, valdivisa31, lineaprod31, intereses31, nopedido31, fecped31, ruc31, tel31, transpor31, cvtransfer31, fectrasfer31, desctofp31, catcte31, UID, recargos31, ice31, fecdocpr31, tipocomp31, conta31, fecvencidocpr, totsiniva31, fecemb, norefrendo, baseice, ncodret43, nbaseret43, npctjeret43, contrato, compra_general, distribucion_rubros, dstoLey, remGas31, estado_electronico, coddest31 from " . $this->Ini->nm_tabela ; 
          } 
          $aWhere = array();
          $aWhere[] = $sc_where_filter;
          if ($this->nmgp_opcao == "igual" || (($_SESSION['sc_session'][$this->Ini->sc_page]['form_adm_clientes']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_adm_clientes']['run_iframe'] == "R") && ($this->sc_evento == "insert" || $this->sc_evento == "update")) )
          { 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              {
                  $aWhere[] = "tipodocto31 = '$this->tipodocto31' and nofact31 = '$this->nofact31'"; 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
                  $aWhere[] = "tipodocto31 = '$this->tipodocto31' and nofact31 = '$this->nofact31'"; 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              {
                  $aWhere[] = "tipodocto31 = '$this->tipodocto31' and nofact31 = '$this->nofact31'"; 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $aWhere[] = "tipodocto31 = '$this->tipodocto31' and nofact31 = '$this->nofact31'"; 
              }  
              else  
              {
                  $aWhere[] = "tipodocto31 = '$this->tipodocto31' and nofact31 = '$this->nofact31'"; 
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
          $sc_order_by = "tipodocto31, nofact31";
          $sc_order_by = str_replace("order by ", "", $sc_order_by);
          $sc_order_by = str_replace("ORDER BY ", "", trim($sc_order_by));
          if (!empty($sc_order_by))
          {
              $nmgp_select .= " order by $sc_order_by "; 
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['run_iframe'] == "R")
          {
              if ($this->sc_evento == "update")
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['select'] = $nmgp_select;
                  $this->nm_gera_html();
              } 
              elseif (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['select']))
              { 
                  $nmgp_select = $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['select'];
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['select'] = ""; 
              } 
          } 
          if ($this->nmgp_opcao == "igual") 
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
              $rs = $this->Db->Execute($nmgp_select) ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "SelectLimit($nmgp_select, 1, " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['reg_start'] . ")" ; 
              $rs = $this->Db->SelectLimit($nmgp_select, 1, $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['reg_start']) ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "SelectLimit($nmgp_select, 1, " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['reg_start'] . ")" ; 
              $rs = $this->Db->SelectLimit($nmgp_select, 1, $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['reg_start']) ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "SelectLimit($nmgp_select, 1, " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['reg_start'] . ")" ; 
              $rs = $this->Db->SelectLimit($nmgp_select, 1, $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['reg_start']) ; 
          } 
          else  
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
              $rs = $this->Db->Execute($nmgp_select) ; 
              if (!$rs === false && !$rs->EOF) 
              { 
                  $rs->Move($_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['reg_start']) ;  
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
              if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['where_filter']))
              {
                  $this->nmgp_form_empty        = true;
                  $this->NM_ajax_info['buttonDisplay']['first']   = $this->nmgp_botoes['first']   = "off";
                  $this->NM_ajax_info['buttonDisplay']['back']    = $this->nmgp_botoes['back']    = "off";
                  $this->NM_ajax_info['buttonDisplay']['forward'] = $this->nmgp_botoes['forward'] = "off";
                  $this->NM_ajax_info['buttonDisplay']['last']    = $this->nmgp_botoes['last']    = "off";
                  $this->NM_ajax_info['buttonDisplay']['update']  = $this->nmgp_botoes['update']  = "off";
                  $this->NM_ajax_info['buttonDisplay']['delete']  = $this->nmgp_botoes['delete']  = "off";
                  $this->NM_ajax_info['buttonDisplay']['first']   = $this->nmgp_botoes['insert']  = "off";
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['empty_filter'] = true;
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
              $this->tipodocto31 = $rs->fields[0] ; 
              $this->nmgp_dados_select['tipodocto31'] = $this->tipodocto31;
              $this->nofact31 = $rs->fields[1] ; 
              $this->nmgp_dados_select['nofact31'] = $this->nofact31;
              $this->nocte31 = $rs->fields[2] ; 
              $this->nmgp_dados_select['nocte31'] = $this->nocte31;
              $this->nomcte31 = $rs->fields[3] ; 
              $this->nmgp_dados_select['nomcte31'] = $this->nomcte31;
              $this->localid31 = $rs->fields[4] ; 
              $this->nmgp_dados_select['localid31'] = $this->localid31;
              $this->cvectenegro31 = $rs->fields[5] ; 
              $this->nmgp_dados_select['cvectenegro31'] = $this->cvectenegro31;
              $this->vtabta31 = trim($rs->fields[6]) ; 
              $this->nmgp_dados_select['vtabta31'] = $this->vtabta31;
              $this->descto31 = trim($rs->fields[7]) ; 
              $this->nmgp_dados_select['descto31'] = $this->descto31;
              $this->flete31 = trim($rs->fields[8]) ; 
              $this->nmgp_dados_select['flete31'] = $this->flete31;
              $this->itm31 = trim($rs->fields[9]) ; 
              $this->nmgp_dados_select['itm31'] = $this->itm31;
              $this->novend31 = $rs->fields[10] ; 
              $this->nmgp_dados_select['novend31'] = $this->novend31;
              $this->fecfact31 = $rs->fields[11] ; 
              if (substr($this->fecfact31, 10, 1) == "-") 
              { 
                 $this->fecfact31 = substr($this->fecfact31, 0, 10) . " " . substr($this->fecfact31, 11);
              } 
              if (substr($this->fecfact31, 13, 1) == ".") 
              { 
                 $this->fecfact31 = substr($this->fecfact31, 0, 13) . ":" . substr($this->fecfact31, 14, 2) . ":" . substr($this->fecfact31, 17);
              } 
              $this->nmgp_dados_select['fecfact31'] = $this->fecfact31;
              $this->condpag31 = $rs->fields[12] ; 
              $this->nmgp_dados_select['condpag31'] = $this->condpag31;
              $this->nopagos31 = $rs->fields[13] ; 
              $this->nmgp_dados_select['nopagos31'] = $this->nopagos31;
              $this->formapago31 = $rs->fields[14] ; 
              $this->nmgp_dados_select['formapago31'] = $this->formapago31;
              $this->obra31 = $rs->fields[15] ; 
              $this->nmgp_dados_select['obra31'] = $this->obra31;
              $this->orden31 = $rs->fields[16] ; 
              $this->nmgp_dados_select['orden31'] = $this->orden31;
              $this->cvnegra31 = $rs->fields[17] ; 
              $this->nmgp_dados_select['cvnegra31'] = $this->cvnegra31;
              $this->status31 = $rs->fields[18] ; 
              $this->nmgp_dados_select['status31'] = $this->status31;
              $this->cvimpto31 = $rs->fields[19] ; 
              $this->nmgp_dados_select['cvimpto31'] = $this->cvimpto31;
              $this->cvanulado31 = $rs->fields[20] ; 
              $this->nmgp_dados_select['cvanulado31'] = $this->cvanulado31;
              $this->efectivo31 = trim($rs->fields[21]) ; 
              $this->nmgp_dados_select['efectivo31'] = $this->efectivo31;
              $this->cheque31 = trim($rs->fields[22]) ; 
              $this->nmgp_dados_select['cheque31'] = $this->cheque31;
              $this->tarjeta31 = trim($rs->fields[23]) ; 
              $this->nmgp_dados_select['tarjeta31'] = $this->tarjeta31;
              $this->acuenta31 = trim($rs->fields[24]) ; 
              $this->nmgp_dados_select['acuenta31'] = $this->acuenta31;
              $this->nobanco31 = $rs->fields[25] ; 
              $this->nmgp_dados_select['nobanco31'] = $this->nobanco31;
              $this->nombanco31 = $rs->fields[26] ; 
              $this->nmgp_dados_select['nombanco31'] = $this->nombanco31;
              $this->nocheque31 = $rs->fields[27] ; 
              $this->nmgp_dados_select['nocheque31'] = $this->nocheque31;
              $this->notarjeta31 = $rs->fields[28] ; 
              $this->nmgp_dados_select['notarjeta31'] = $this->notarjeta31;
              $this->nomtarjeta31 = $rs->fields[29] ; 
              $this->nmgp_dados_select['nomtarjeta31'] = $this->nomtarjeta31;
              $this->cvdivisa31 = $rs->fields[30] ; 
              $this->nmgp_dados_select['cvdivisa31'] = $this->cvdivisa31;
              $this->valdivisa31 = $rs->fields[31] ; 
              $this->nmgp_dados_select['valdivisa31'] = $this->valdivisa31;
              $this->lineaprod31 = $rs->fields[32] ; 
              $this->nmgp_dados_select['lineaprod31'] = $this->lineaprod31;
              $this->intereses31 = trim($rs->fields[33]) ; 
              $this->nmgp_dados_select['intereses31'] = $this->intereses31;
              $this->nopedido31 = $rs->fields[34] ; 
              $this->nmgp_dados_select['nopedido31'] = $this->nopedido31;
              $this->fecped31 = $rs->fields[35] ; 
              if (substr($this->fecped31, 10, 1) == "-") 
              { 
                 $this->fecped31 = substr($this->fecped31, 0, 10) . " " . substr($this->fecped31, 11);
              } 
              if (substr($this->fecped31, 13, 1) == ".") 
              { 
                 $this->fecped31 = substr($this->fecped31, 0, 13) . ":" . substr($this->fecped31, 14, 2) . ":" . substr($this->fecped31, 17);
              } 
              $this->nmgp_dados_select['fecped31'] = $this->fecped31;
              $this->ruc31 = $rs->fields[36] ; 
              $this->nmgp_dados_select['ruc31'] = $this->ruc31;
              $this->tel31 = $rs->fields[37] ; 
              $this->nmgp_dados_select['tel31'] = $this->tel31;
              $this->transpor31 = $rs->fields[38] ; 
              $this->nmgp_dados_select['transpor31'] = $this->transpor31;
              $this->cvtransfer31 = $rs->fields[39] ; 
              $this->nmgp_dados_select['cvtransfer31'] = $this->cvtransfer31;
              $this->fectrasfer31 = $rs->fields[40] ; 
              $this->nmgp_dados_select['fectrasfer31'] = $this->fectrasfer31;
              $this->desctofp31 = trim($rs->fields[41]) ; 
              $this->nmgp_dados_select['desctofp31'] = $this->desctofp31;
              $this->catcte31 = $rs->fields[42] ; 
              $this->nmgp_dados_select['catcte31'] = $this->catcte31;
              $this->uid = $rs->fields[43] ; 
              $this->nmgp_dados_select['uid'] = $this->uid;
              $this->recargos31 = trim($rs->fields[44]) ; 
              $this->nmgp_dados_select['recargos31'] = $this->recargos31;
              $this->ice31 = trim($rs->fields[45]) ; 
              $this->nmgp_dados_select['ice31'] = $this->ice31;
              $this->fecdocpr31 = $rs->fields[46] ; 
              if (substr($this->fecdocpr31, 10, 1) == "-") 
              { 
                 $this->fecdocpr31 = substr($this->fecdocpr31, 0, 10) . " " . substr($this->fecdocpr31, 11);
              } 
              if (substr($this->fecdocpr31, 13, 1) == ".") 
              { 
                 $this->fecdocpr31 = substr($this->fecdocpr31, 0, 13) . ":" . substr($this->fecdocpr31, 14, 2) . ":" . substr($this->fecdocpr31, 17);
              } 
              $this->nmgp_dados_select['fecdocpr31'] = $this->fecdocpr31;
              $this->tipocomp31 = $rs->fields[47] ; 
              $this->nmgp_dados_select['tipocomp31'] = $this->tipocomp31;
              $this->conta31 = $rs->fields[48] ; 
              $this->nmgp_dados_select['conta31'] = $this->conta31;
              $this->fecvencidocpr = $rs->fields[49] ; 
              if (substr($this->fecvencidocpr, 10, 1) == "-") 
              { 
                 $this->fecvencidocpr = substr($this->fecvencidocpr, 0, 10) . " " . substr($this->fecvencidocpr, 11);
              } 
              if (substr($this->fecvencidocpr, 13, 1) == ".") 
              { 
                 $this->fecvencidocpr = substr($this->fecvencidocpr, 0, 13) . ":" . substr($this->fecvencidocpr, 14, 2) . ":" . substr($this->fecvencidocpr, 17);
              } 
              $this->nmgp_dados_select['fecvencidocpr'] = $this->fecvencidocpr;
              $this->totsiniva31 = trim($rs->fields[50]) ; 
              $this->nmgp_dados_select['totsiniva31'] = $this->totsiniva31;
              $this->fecemb = $rs->fields[51] ; 
              $this->nmgp_dados_select['fecemb'] = $this->fecemb;
              $this->norefrendo = $rs->fields[52] ; 
              $this->nmgp_dados_select['norefrendo'] = $this->norefrendo;
              $this->baseice = trim($rs->fields[53]) ; 
              $this->nmgp_dados_select['baseice'] = $this->baseice;
              $this->ncodret43 = $rs->fields[54] ; 
              $this->nmgp_dados_select['ncodret43'] = $this->ncodret43;
              $this->nbaseret43 = trim($rs->fields[55]) ; 
              $this->nmgp_dados_select['nbaseret43'] = $this->nbaseret43;
              $this->npctjeret43 = trim($rs->fields[56]) ; 
              $this->nmgp_dados_select['npctjeret43'] = $this->npctjeret43;
              $this->contrato = $rs->fields[57] ; 
              $this->nmgp_dados_select['contrato'] = $this->contrato;
              $this->compra_general = $rs->fields[58] ; 
              $this->nmgp_dados_select['compra_general'] = $this->compra_general;
              $this->distribucion_rubros = $rs->fields[59] ; 
              $this->nmgp_dados_select['distribucion_rubros'] = $this->distribucion_rubros;
              $this->dstoley = trim($rs->fields[60]) ; 
              $this->nmgp_dados_select['dstoley'] = $this->dstoley;
              $this->remgas31 = $rs->fields[61] ; 
              $this->nmgp_dados_select['remgas31'] = $this->remgas31;
              $this->estado_electronico = $rs->fields[62] ; 
              $this->nmgp_dados_select['estado_electronico'] = $this->estado_electronico;
              $this->coddest31 = $rs->fields[63] ; 
              $this->nmgp_dados_select['coddest31'] = $this->coddest31;
          $GLOBALS["NM_ERRO_IBASE"] = 0; 
              $this->nm_troca_decimal(",", ".");
              $this->vtabta31 = (strpos(strtolower($this->vtabta31), "e")) ? (float)$this->vtabta31 : $this->vtabta31; 
              $this->vtabta31 = (string)$this->vtabta31; 
              $this->descto31 = (strpos(strtolower($this->descto31), "e")) ? (float)$this->descto31 : $this->descto31; 
              $this->descto31 = (string)$this->descto31; 
              $this->flete31 = (strpos(strtolower($this->flete31), "e")) ? (float)$this->flete31 : $this->flete31; 
              $this->flete31 = (string)$this->flete31; 
              $this->itm31 = (strpos(strtolower($this->itm31), "e")) ? (float)$this->itm31 : $this->itm31; 
              $this->itm31 = (string)$this->itm31; 
              $this->condpag31 = (string)$this->condpag31; 
              $this->nopagos31 = (string)$this->nopagos31; 
              $this->formapago31 = (string)$this->formapago31; 
              $this->cvnegra31 = (string)$this->cvnegra31; 
              $this->status31 = (string)$this->status31; 
              $this->cvimpto31 = (string)$this->cvimpto31; 
              $this->cvanulado31 = (string)$this->cvanulado31; 
              $this->efectivo31 = (strpos(strtolower($this->efectivo31), "e")) ? (float)$this->efectivo31 : $this->efectivo31; 
              $this->efectivo31 = (string)$this->efectivo31; 
              $this->cheque31 = (strpos(strtolower($this->cheque31), "e")) ? (float)$this->cheque31 : $this->cheque31; 
              $this->cheque31 = (string)$this->cheque31; 
              $this->tarjeta31 = (strpos(strtolower($this->tarjeta31), "e")) ? (float)$this->tarjeta31 : $this->tarjeta31; 
              $this->tarjeta31 = (string)$this->tarjeta31; 
              $this->acuenta31 = (strpos(strtolower($this->acuenta31), "e")) ? (float)$this->acuenta31 : $this->acuenta31; 
              $this->acuenta31 = (string)$this->acuenta31; 
              $this->intereses31 = (strpos(strtolower($this->intereses31), "e")) ? (float)$this->intereses31 : $this->intereses31; 
              $this->intereses31 = (string)$this->intereses31; 
              $this->desctofp31 = (strpos(strtolower($this->desctofp31), "e")) ? (float)$this->desctofp31 : $this->desctofp31; 
              $this->desctofp31 = (string)$this->desctofp31; 
              $this->uid = (string)$this->uid; 
              $this->recargos31 = (strpos(strtolower($this->recargos31), "e")) ? (float)$this->recargos31 : $this->recargos31; 
              $this->recargos31 = (string)$this->recargos31; 
              $this->ice31 = (strpos(strtolower($this->ice31), "e")) ? (float)$this->ice31 : $this->ice31; 
              $this->ice31 = (string)$this->ice31; 
              $this->conta31 = (string)$this->conta31; 
              $this->totsiniva31 = (strpos(strtolower($this->totsiniva31), "e")) ? (float)$this->totsiniva31 : $this->totsiniva31; 
              $this->totsiniva31 = (string)$this->totsiniva31; 
              $this->baseice = (strpos(strtolower($this->baseice), "e")) ? (float)$this->baseice : $this->baseice; 
              $this->baseice = (string)$this->baseice; 
              $this->nbaseret43 = (strpos(strtolower($this->nbaseret43), "e")) ? (float)$this->nbaseret43 : $this->nbaseret43; 
              $this->nbaseret43 = (string)$this->nbaseret43; 
              $this->npctjeret43 = (strpos(strtolower($this->npctjeret43), "e")) ? (float)$this->npctjeret43 : $this->npctjeret43; 
              $this->npctjeret43 = (string)$this->npctjeret43; 
              $this->dstoley = (strpos(strtolower($this->dstoley), "e")) ? (float)$this->dstoley : $this->dstoley; 
              $this->dstoley = (string)$this->dstoley; 
              $this->estado_electronico = (string)$this->estado_electronico; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['parms'] = "tipodocto31?#?$this->tipodocto31?@?nofact31?#?$this->nofact31?@?";
          } 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['dados_select'] = $this->nmgp_dados_select;
          if (!$this->NM_ajax_flag || 'backup_line' != $this->NM_ajax_opcao)
          {
              $this->Nav_permite_ret = 0 != $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['reg_start'];
              $this->Nav_permite_ava = $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['reg_start'] < $qt_geral_reg_form_maecom;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['opcao']   = '';
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
              $this->tipodocto31 = "";  
              $this->nmgp_dados_form["tipodocto31"] = $this->tipodocto31;
              $this->nofact31 = "";  
              $this->nmgp_dados_form["nofact31"] = $this->nofact31;
              $this->nocte31 = "";  
              $this->nmgp_dados_form["nocte31"] = $this->nocte31;
              $this->nomcte31 = "";  
              $this->nmgp_dados_form["nomcte31"] = $this->nomcte31;
              $this->localid31 = "";  
              $this->nmgp_dados_form["localid31"] = $this->localid31;
              $this->cvectenegro31 = "";  
              $this->nmgp_dados_form["cvectenegro31"] = $this->cvectenegro31;
              $this->vtabta31 = "";  
              $this->nmgp_dados_form["vtabta31"] = $this->vtabta31;
              $this->descto31 = "";  
              $this->nmgp_dados_form["descto31"] = $this->descto31;
              $this->flete31 = "";  
              $this->nmgp_dados_form["flete31"] = $this->flete31;
              $this->itm31 = "";  
              $this->nmgp_dados_form["itm31"] = $this->itm31;
              $this->novend31 = "";  
              $this->nmgp_dados_form["novend31"] = $this->novend31;
              $this->fecfact31 = "";  
              $this->fecfact31_hora = "" ;  
              $this->nmgp_dados_form["fecfact31"] = $this->fecfact31;
              $this->condpag31 = "";  
              $this->nmgp_dados_form["condpag31"] = $this->condpag31;
              $this->nopagos31 = "";  
              $this->nmgp_dados_form["nopagos31"] = $this->nopagos31;
              $this->formapago31 = "";  
              $this->nmgp_dados_form["formapago31"] = $this->formapago31;
              $this->obra31 = "";  
              $this->nmgp_dados_form["obra31"] = $this->obra31;
              $this->orden31 = "";  
              $this->nmgp_dados_form["orden31"] = $this->orden31;
              $this->cvnegra31 = "";  
              $this->nmgp_dados_form["cvnegra31"] = $this->cvnegra31;
              $this->status31 = "";  
              $this->nmgp_dados_form["status31"] = $this->status31;
              $this->cvimpto31 = "";  
              $this->nmgp_dados_form["cvimpto31"] = $this->cvimpto31;
              $this->cvanulado31 = "";  
              $this->nmgp_dados_form["cvanulado31"] = $this->cvanulado31;
              $this->efectivo31 = "";  
              $this->nmgp_dados_form["efectivo31"] = $this->efectivo31;
              $this->cheque31 = "";  
              $this->nmgp_dados_form["cheque31"] = $this->cheque31;
              $this->tarjeta31 = "";  
              $this->nmgp_dados_form["tarjeta31"] = $this->tarjeta31;
              $this->acuenta31 = "";  
              $this->nmgp_dados_form["acuenta31"] = $this->acuenta31;
              $this->nobanco31 = "";  
              $this->nmgp_dados_form["nobanco31"] = $this->nobanco31;
              $this->nombanco31 = "";  
              $this->nmgp_dados_form["nombanco31"] = $this->nombanco31;
              $this->nocheque31 = "";  
              $this->nmgp_dados_form["nocheque31"] = $this->nocheque31;
              $this->notarjeta31 = "";  
              $this->nmgp_dados_form["notarjeta31"] = $this->notarjeta31;
              $this->nomtarjeta31 = "";  
              $this->nmgp_dados_form["nomtarjeta31"] = $this->nomtarjeta31;
              $this->cvdivisa31 = "";  
              $this->nmgp_dados_form["cvdivisa31"] = $this->cvdivisa31;
              $this->valdivisa31 = "";  
              $this->nmgp_dados_form["valdivisa31"] = $this->valdivisa31;
              $this->lineaprod31 = "";  
              $this->nmgp_dados_form["lineaprod31"] = $this->lineaprod31;
              $this->intereses31 = "";  
              $this->nmgp_dados_form["intereses31"] = $this->intereses31;
              $this->nopedido31 = "";  
              $this->nmgp_dados_form["nopedido31"] = $this->nopedido31;
              $this->fecped31 = "";  
              $this->fecped31_hora = "" ;  
              $this->nmgp_dados_form["fecped31"] = $this->fecped31;
              $this->ruc31 = "";  
              $this->nmgp_dados_form["ruc31"] = $this->ruc31;
              $this->tel31 = "";  
              $this->nmgp_dados_form["tel31"] = $this->tel31;
              $this->transpor31 = "";  
              $this->nmgp_dados_form["transpor31"] = $this->transpor31;
              $this->cvtransfer31 = "";  
              $this->nmgp_dados_form["cvtransfer31"] = $this->cvtransfer31;
              $this->fectrasfer31 = "";  
              $this->fectrasfer31_hora = "" ;  
              $this->nmgp_dados_form["fectrasfer31"] = $this->fectrasfer31;
              $this->desctofp31 = "";  
              $this->nmgp_dados_form["desctofp31"] = $this->desctofp31;
              $this->catcte31 = "";  
              $this->nmgp_dados_form["catcte31"] = $this->catcte31;
              $this->uid = "";  
              $this->nmgp_dados_form["uid"] = $this->uid;
              $this->recargos31 = "";  
              $this->nmgp_dados_form["recargos31"] = $this->recargos31;
              $this->ice31 = "";  
              $this->nmgp_dados_form["ice31"] = $this->ice31;
              $this->fecdocpr31 = "";  
              $this->fecdocpr31_hora = "" ;  
              $this->nmgp_dados_form["fecdocpr31"] = $this->fecdocpr31;
              $this->tipocomp31 = "";  
              $this->nmgp_dados_form["tipocomp31"] = $this->tipocomp31;
              $this->conta31 = "";  
              $this->nmgp_dados_form["conta31"] = $this->conta31;
              $this->fecvencidocpr = "";  
              $this->fecvencidocpr_hora = "" ;  
              $this->nmgp_dados_form["fecvencidocpr"] = $this->fecvencidocpr;
              $this->totsiniva31 = "";  
              $this->nmgp_dados_form["totsiniva31"] = $this->totsiniva31;
              $this->fecemb = "";  
              $this->fecemb_hora = "" ;  
              $this->nmgp_dados_form["fecemb"] = $this->fecemb;
              $this->norefrendo = "";  
              $this->nmgp_dados_form["norefrendo"] = $this->norefrendo;
              $this->baseice = "";  
              $this->nmgp_dados_form["baseice"] = $this->baseice;
              $this->ncodret43 = "";  
              $this->nmgp_dados_form["ncodret43"] = $this->ncodret43;
              $this->nbaseret43 = "";  
              $this->nmgp_dados_form["nbaseret43"] = $this->nbaseret43;
              $this->npctjeret43 = "";  
              $this->nmgp_dados_form["npctjeret43"] = $this->npctjeret43;
              $this->contrato = "";  
              $this->nmgp_dados_form["contrato"] = $this->contrato;
              $this->compra_general = "";  
              $this->nmgp_dados_form["compra_general"] = $this->compra_general;
              $this->distribucion_rubros = "";  
              $this->nmgp_dados_form["distribucion_rubros"] = $this->distribucion_rubros;
              $this->dstoley = "";  
              $this->nmgp_dados_form["dstoley"] = $this->dstoley;
              $this->remgas31 = "";  
              $this->nmgp_dados_form["remgas31"] = $this->remgas31;
              $this->estado_electronico = "";  
              $this->nmgp_dados_form["estado_electronico"] = $this->estado_electronico;
              $this->coddest31 = "";  
              $this->nmgp_dados_form["coddest31"] = $this->coddest31;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['dados_form'] = $this->nmgp_dados_form;
              $this->formatado = false;
          }
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['foreign_key'] as $sFKName => $sFKValue)
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
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(nofact31) from " . $this->Ini->nm_tabela . " where tipodocto31 = '$this->tipodocto31' and nofact31 < '$this->nofact31'" . $str_where_filter; 
         $rs = $this->Db->Execute("select max(nofact31) from " . $this->Ini->nm_tabela . " where tipodocto31 = '$this->tipodocto31' and nofact31 < '$this->nofact31'" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(nofact31) from " . $this->Ini->nm_tabela . " where tipodocto31 = '$this->tipodocto31' and nofact31 < '$this->nofact31'" . $str_where_filter; 
         $rs = $this->Db->Execute("select max(nofact31) from " . $this->Ini->nm_tabela . " where tipodocto31 = '$this->tipodocto31' and nofact31 < '$this->nofact31'" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(nofact31) from " . $this->Ini->nm_tabela . " where tipodocto31 = '$this->tipodocto31' and nofact31 < '$this->nofact31'" . $str_where_filter; 
         $rs = $this->Db->Execute("select max(nofact31) from " . $this->Ini->nm_tabela . " where tipodocto31 = '$this->tipodocto31' and nofact31 < '$this->nofact31'" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(nofact31) from " . $this->Ini->nm_tabela . " where tipodocto31 = '$this->tipodocto31' and nofact31 < '$this->nofact31'" . $str_where_filter; 
         $rs = $this->Db->Execute("select max(nofact31) from " . $this->Ini->nm_tabela . " where tipodocto31 = '$this->tipodocto31' and nofact31 < '$this->nofact31'" . $str_where_filter); 
     }  
     else  
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(nofact31) from " . $this->Ini->nm_tabela . " where tipodocto31 = '$this->tipodocto31' and nofact31 < '$this->nofact31'" . $str_where_filter; 
         $rs = $this->Db->Execute("select max(nofact31) from " . $this->Ini->nm_tabela . " where tipodocto31 = '$this->tipodocto31' and nofact31 < '$this->nofact31'" . $str_where_filter); 
     }  
     if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
     { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
     }  
     if (isset($rs->fields[0]) && $rs->fields[0] != "") 
     { 
         $this->nofact31 = substr($this->Db->qstr($rs->fields[0]), 1, -1); 
         $rs->Close();  
         $this->nmgp_opcao = "igual";  
         return ;  
     } 
     $str_where_filter = ('' != $str_where_param) ? ' and ' . $str_where_param : '';
     if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(tipodocto31) from " . $this->Ini->nm_tabela . " where tipodocto31 < '$this->tipodocto31'" . $str_where_filter; 
         $rs = $this->Db->Execute("select max(tipodocto31) from " . $this->Ini->nm_tabela . " where tipodocto31 < '$this->tipodocto31'" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(tipodocto31) from " . $this->Ini->nm_tabela . " where tipodocto31 < '$this->tipodocto31'" . $str_where_filter; 
         $rs = $this->Db->Execute("select max(tipodocto31) from " . $this->Ini->nm_tabela . " where tipodocto31 < '$this->tipodocto31'" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(tipodocto31) from " . $this->Ini->nm_tabela . " where tipodocto31 < '$this->tipodocto31'" . $str_where_filter; 
         $rs = $this->Db->Execute("select max(tipodocto31) from " . $this->Ini->nm_tabela . " where tipodocto31 < '$this->tipodocto31'" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(tipodocto31) from " . $this->Ini->nm_tabela . " where tipodocto31 < '$this->tipodocto31'" . $str_where_filter; 
         $rs = $this->Db->Execute("select max(tipodocto31) from " . $this->Ini->nm_tabela . " where tipodocto31 < '$this->tipodocto31'" . $str_where_filter); 
     }  
     else  
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(tipodocto31) from " . $this->Ini->nm_tabela . " where tipodocto31 < '$this->tipodocto31'" . $str_where_filter; 
         $rs = $this->Db->Execute("select max(tipodocto31) from " . $this->Ini->nm_tabela . " where tipodocto31 < '$this->tipodocto31'" . $str_where_filter); 
     }  
     if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
     { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
     }  
     if (isset($rs->fields[0]) && $rs->fields[0] != "") 
     { 
         $this->tipodocto31 = substr($this->Db->qstr($rs->fields[0]), 1, -1); 
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
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(nofact31) from " . $this->Ini->nm_tabela . " where tipodocto31 = '$this->tipodocto31'" . $str_where_filter; 
         $rs = $this->Db->Execute("select max(nofact31) from " . $this->Ini->nm_tabela . " where tipodocto31 = '$this->tipodocto31'" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(nofact31) from " . $this->Ini->nm_tabela . " where tipodocto31 = '$this->tipodocto31'" . $str_where_filter; 
         $rs = $this->Db->Execute("select max(nofact31) from " . $this->Ini->nm_tabela . " where tipodocto31 = '$this->tipodocto31'" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(nofact31) from " . $this->Ini->nm_tabela . " where tipodocto31 = '$this->tipodocto31'" . $str_where_filter; 
         $rs = $this->Db->Execute("select max(nofact31) from " . $this->Ini->nm_tabela . " where tipodocto31 = '$this->tipodocto31'" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(nofact31) from " . $this->Ini->nm_tabela . " where tipodocto31 = '$this->tipodocto31'" . $str_where_filter; 
         $rs = $this->Db->Execute("select max(nofact31) from " . $this->Ini->nm_tabela . " where tipodocto31 = '$this->tipodocto31'" . $str_where_filter); 
     }  
     else  
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(nofact31) from " . $this->Ini->nm_tabela . " where tipodocto31 = '$this->tipodocto31'" . $str_where_filter; 
         $rs = $this->Db->Execute("select max(nofact31) from " . $this->Ini->nm_tabela . " where tipodocto31 = '$this->tipodocto31'" . $str_where_filter); 
     }  
     $this->nofact31 = substr($this->Db->qstr($rs->fields[0]), 1, -1); 
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
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(nofact31) from " . $this->Ini->nm_tabela . " where tipodocto31 = '$this->tipodocto31' and nofact31 > '$this->nofact31'" . $str_where_filter; 
         $rs = $this->Db->Execute("select min(nofact31) from " . $this->Ini->nm_tabela . " where tipodocto31 = '$this->tipodocto31' and nofact31 > '$this->nofact31'" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(nofact31) from " . $this->Ini->nm_tabela . " where tipodocto31 = '$this->tipodocto31' and nofact31 > '$this->nofact31'" . $str_where_filter; 
         $rs = $this->Db->Execute("select min(nofact31) from " . $this->Ini->nm_tabela . " where tipodocto31 = '$this->tipodocto31' and nofact31 > '$this->nofact31'" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(nofact31) from " . $this->Ini->nm_tabela . " where tipodocto31 = '$this->tipodocto31' and nofact31 > '$this->nofact31'" . $str_where_filter; 
         $rs = $this->Db->Execute("select min(nofact31) from " . $this->Ini->nm_tabela . " where tipodocto31 = '$this->tipodocto31' and nofact31 > '$this->nofact31'" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(nofact31) from " . $this->Ini->nm_tabela . " where tipodocto31 = '$this->tipodocto31' and nofact31 > '$this->nofact31'" . $str_where_filter; 
         $rs = $this->Db->Execute("select min(nofact31) from " . $this->Ini->nm_tabela . " where tipodocto31 = '$this->tipodocto31' and nofact31 > '$this->nofact31'" . $str_where_filter); 
     }  
     else  
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(nofact31) from " . $this->Ini->nm_tabela . " where tipodocto31 = '$this->tipodocto31' and nofact31 > '$this->nofact31'" . $str_where_filter; 
         $rs = $this->Db->Execute("select min(nofact31) from " . $this->Ini->nm_tabela . " where tipodocto31 = '$this->tipodocto31' and nofact31 > '$this->nofact31'" . $str_where_filter); 
     }  
     if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
     { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
     }  
     if (isset($rs->fields[0]) && $rs->fields[0] != "") 
     { 
         $this->nofact31 = substr($this->Db->qstr($rs->fields[0]), 1, -1); 
         $rs->Close();  
         $this->nmgp_opcao = "igual";  
         return ;  
     } 
     $str_where_filter = ('' != $str_where_param) ? ' and ' . $str_where_param : '';
     if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(tipodocto31) from " . $this->Ini->nm_tabela . " where tipodocto31 > '$this->tipodocto31'" . $str_where_filter; 
         $rs = $this->Db->Execute("select min(tipodocto31) from " . $this->Ini->nm_tabela . " where tipodocto31 > '$this->tipodocto31'" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(tipodocto31) from " . $this->Ini->nm_tabela . " where tipodocto31 > '$this->tipodocto31'" . $str_where_filter; 
         $rs = $this->Db->Execute("select min(tipodocto31) from " . $this->Ini->nm_tabela . " where tipodocto31 > '$this->tipodocto31'" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(tipodocto31) from " . $this->Ini->nm_tabela . " where tipodocto31 > '$this->tipodocto31'" . $str_where_filter; 
         $rs = $this->Db->Execute("select min(tipodocto31) from " . $this->Ini->nm_tabela . " where tipodocto31 > '$this->tipodocto31'" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(tipodocto31) from " . $this->Ini->nm_tabela . " where tipodocto31 > '$this->tipodocto31'" . $str_where_filter; 
         $rs = $this->Db->Execute("select min(tipodocto31) from " . $this->Ini->nm_tabela . " where tipodocto31 > '$this->tipodocto31'" . $str_where_filter); 
     }  
     else  
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(tipodocto31) from " . $this->Ini->nm_tabela . " where tipodocto31 > '$this->tipodocto31'" . $str_where_filter; 
         $rs = $this->Db->Execute("select min(tipodocto31) from " . $this->Ini->nm_tabela . " where tipodocto31 > '$this->tipodocto31'" . $str_where_filter); 
     }  
     if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
     { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
     }  
     if (isset($rs->fields[0]) && $rs->fields[0] != "") 
     { 
         $this->tipodocto31 = substr($this->Db->qstr($rs->fields[0]), 1, -1); 
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
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(nofact31) from " . $this->Ini->nm_tabela . " where tipodocto31 = '$this->tipodocto31'" . $str_where_filter; 
         $rs = $this->Db->Execute("select min(nofact31) from " . $this->Ini->nm_tabela . " where tipodocto31 = '$this->tipodocto31'" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(nofact31) from " . $this->Ini->nm_tabela . " where tipodocto31 = '$this->tipodocto31'" . $str_where_filter; 
         $rs = $this->Db->Execute("select min(nofact31) from " . $this->Ini->nm_tabela . " where tipodocto31 = '$this->tipodocto31'" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(nofact31) from " . $this->Ini->nm_tabela . " where tipodocto31 = '$this->tipodocto31'" . $str_where_filter; 
         $rs = $this->Db->Execute("select min(nofact31) from " . $this->Ini->nm_tabela . " where tipodocto31 = '$this->tipodocto31'" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(nofact31) from " . $this->Ini->nm_tabela . " where tipodocto31 = '$this->tipodocto31'" . $str_where_filter; 
         $rs = $this->Db->Execute("select min(nofact31) from " . $this->Ini->nm_tabela . " where tipodocto31 = '$this->tipodocto31'" . $str_where_filter); 
     }  
     else  
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(nofact31) from " . $this->Ini->nm_tabela . " where tipodocto31 = '$this->tipodocto31'" . $str_where_filter; 
         $rs = $this->Db->Execute("select min(nofact31) from " . $this->Ini->nm_tabela . " where tipodocto31 = '$this->tipodocto31'" . $str_where_filter); 
     }  
     $this->nofact31 = substr($this->Db->qstr($rs->fields[0]), 1, -1); 
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
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(tipodocto31) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select min(tipodocto31) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(tipodocto31) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select min(tipodocto31) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(tipodocto31) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select min(tipodocto31) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(tipodocto31) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select min(tipodocto31) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
     }  
     else  
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(tipodocto31) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select min(tipodocto31) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
     }  
     if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
     { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
     }  
     if (!isset($rs->fields[0]) || $rs->EOF) 
     { 
         if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['where_filter']))
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
     $this->tipodocto31 = substr($this->Db->qstr($rs->fields[0]), 1, -1); 
     $rs->Close();  
     $str_where_filter = ('' != $str_where_param) ? ' and ' . $str_where_param : '';
     if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(nofact31) from " . $this->Ini->nm_tabela . "  where tipodocto31 = '$this->tipodocto31'" . $str_where_filter; 
         $rs = $this->Db->Execute("select min(nofact31) from " . $this->Ini->nm_tabela . "  where tipodocto31 = '$this->tipodocto31'" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(nofact31) from " . $this->Ini->nm_tabela . "  where tipodocto31 = '$this->tipodocto31'" . $str_where_filter; 
         $rs = $this->Db->Execute("select min(nofact31) from " . $this->Ini->nm_tabela . "  where tipodocto31 = '$this->tipodocto31'" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(nofact31) from " . $this->Ini->nm_tabela . "  where tipodocto31 = '$this->tipodocto31'" . $str_where_filter; 
         $rs = $this->Db->Execute("select min(nofact31) from " . $this->Ini->nm_tabela . "  where tipodocto31 = '$this->tipodocto31'" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(nofact31) from " . $this->Ini->nm_tabela . "  where tipodocto31 = '$this->tipodocto31'" . $str_where_filter; 
         $rs = $this->Db->Execute("select min(nofact31) from " . $this->Ini->nm_tabela . "  where tipodocto31 = '$this->tipodocto31'" . $str_where_filter); 
     }  
     else  
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(nofact31) from " . $this->Ini->nm_tabela . "  where tipodocto31 = '$this->tipodocto31'" . $str_where_filter; 
         $rs = $this->Db->Execute("select min(nofact31) from " . $this->Ini->nm_tabela . "  where tipodocto31 = '$this->tipodocto31'" . $str_where_filter); 
     }  
     if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
     { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
     }  
     $this->nofact31 = substr($this->Db->qstr($rs->fields[0]), 1, -1); 
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
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(tipodocto31) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select max(tipodocto31) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(tipodocto31) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select max(tipodocto31) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(tipodocto31) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select max(tipodocto31) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(tipodocto31) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select max(tipodocto31) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
     }  
     else  
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(tipodocto31) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select max(tipodocto31) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
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
     $this->tipodocto31 = substr($this->Db->qstr($rs->fields[0]), 1, -1); 
     $rs->Close();  
     $str_where_filter = ('' != $str_where_param) ? ' and ' . $str_where_param : '';
     if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(nofact31) from " . $this->Ini->nm_tabela . "  where tipodocto31 = '$this->tipodocto31'" . $str_where_filter; 
         $rs = $this->Db->Execute("select max(nofact31) from " . $this->Ini->nm_tabela . "  where tipodocto31 = '$this->tipodocto31'" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(nofact31) from " . $this->Ini->nm_tabela . "  where tipodocto31 = '$this->tipodocto31'" . $str_where_filter; 
         $rs = $this->Db->Execute("select max(nofact31) from " . $this->Ini->nm_tabela . "  where tipodocto31 = '$this->tipodocto31'" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(nofact31) from " . $this->Ini->nm_tabela . "  where tipodocto31 = '$this->tipodocto31'" . $str_where_filter; 
         $rs = $this->Db->Execute("select max(nofact31) from " . $this->Ini->nm_tabela . "  where tipodocto31 = '$this->tipodocto31'" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(nofact31) from " . $this->Ini->nm_tabela . "  where tipodocto31 = '$this->tipodocto31'" . $str_where_filter; 
         $rs = $this->Db->Execute("select max(nofact31) from " . $this->Ini->nm_tabela . "  where tipodocto31 = '$this->tipodocto31'" . $str_where_filter); 
     }  
     else  
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(nofact31) from " . $this->Ini->nm_tabela . "  where tipodocto31 = '$this->tipodocto31'" . $str_where_filter; 
         $rs = $this->Db->Execute("select max(nofact31) from " . $this->Ini->nm_tabela . "  where tipodocto31 = '$this->tipodocto31'" . $str_where_filter); 
     }  
     if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
     { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
     }  
     $this->nofact31 = substr($this->Db->qstr($rs->fields[0]), 1, -1); 
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
       $rec_tot    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['total'] + 1;
       $rec_fim    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['reg_start'] + 1;
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
                $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['record_state'] = array();
        }

        function storeRecordState($sc_seq_vert = 0) {
                if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['record_state'])) {
                        $this->initializeRecordState();
                }
                if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['record_state'][$sc_seq_vert])) {
                        $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['record_state'][$sc_seq_vert] = array();
                }

                $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['record_state'][$sc_seq_vert]['buttons'] = array(
                        'delete' => $this->nmgp_botoes['delete'],
                        'update' => $this->nmgp_botoes['update']
                );
        }

        function loadRecordState($sc_seq_vert = 0) {
                if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['record_state']) || !isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['record_state'][$sc_seq_vert])) {
                        return;
                }

                if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['record_state'][$sc_seq_vert]['buttons']['delete'])) {
                        $this->nmgp_botoes['delete'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['record_state'][$sc_seq_vert]['buttons']['delete'];
                }
                if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['record_state'][$sc_seq_vert]['buttons']['update'])) {
                        $this->nmgp_botoes['update'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['record_state'][$sc_seq_vert]['buttons']['update'];
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
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['botoes'] = $this->nmgp_botoes;
     if ($this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form")
     {
         $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['opc_ant'] = $this->nmgp_opcao;
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
     if (($_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['run_iframe'] == "R") && $this->nm_flag_iframe && empty($this->nm_todas_criticas))
     {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['run_iframe_ajax']))
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['retorno_edit'] = array("edit", "");
          }
          else
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['retorno_edit'] .= "&nmgp_opcao=edit";
          }
          if ($this->sc_evento == "insert" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['run_iframe'] == "F")
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['run_iframe_ajax']))
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['retorno_edit'] = array("edit", "fim");
              }
              else
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['retorno_edit'] .= "&rec=fim";
              }
          }
          $this->NM_close_db(); 
          $sJsParent = '';
          if ($this->NM_ajax_flag && isset($this->NM_ajax_info['param']['buffer_output']) && $this->NM_ajax_info['param']['buffer_output'])
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['run_iframe_ajax']))
              {
                  $this->NM_ajax_info['ajaxJavascript'][] = array("parent.ajax_navigate", $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['retorno_edit']);
              }
              else
              {
                  $sJsParent .= 'parent';
                  $this->NM_ajax_info['redir']['metodo'] = 'location';
                  $this->NM_ajax_info['redir']['action'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['retorno_edit'];
                  $this->NM_ajax_info['redir']['target'] = $sJsParent;
              }
              form_maecom_pack_ajax_response();
              exit;
          }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">

         <html><body>
         <script type="text/javascript">
<?php
    
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['run_iframe_ajax']))
    {
        $opc = ($_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['run_iframe'] == "F" && $this->sc_evento == "insert") ? "fim" : "";
        echo "parent.ajax_navigate('edit', '" .$opc . "');";
    }
    else
    {
        echo $sJsParent . "parent.location = '" . $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['retorno_edit'] . "';";
    }
?>
         </script>
         </body></html>
<?php
         exit;
     }
        $this->initFormPages();
    include_once("form_maecom_form0.php");
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
        if ('SC_all_Cmp' == $this->nmgp_fast_search && in_array($field, array("tipodocto31", "nofact31", "nocte31", "nomcte31", "localid31", "cvectenegro31", "vtabta31", "descto31", "flete31", "itm31", "novend31", "fecfact31", "condpag31", "nopagos31", "formapago31", "obra31", "orden31", "cvnegra31", "status31", "cvimpto31", "cvanulado31", "efectivo31", "cheque31", "tarjeta31", "acuenta31", "nobanco31", "nombanco31", "nocheque31", "notarjeta31", "nomtarjeta31", "cvdivisa31", "valdivisa31", "lineaprod31", "intereses31", "nopedido31", "fecped31", "ruc31", "tel31", "transpor31", "cvtransfer31", "fectrasfer31", "desctofp31", "catcte31", "uid", "recargos31", "ice31", "fecdocpr31", "tipocomp31", "conta31", "fecvencidocpr", "totsiniva31", "fecemb", "norefrendo", "baseice", "ncodret43", "nbaseret43", "npctjeret43", "contrato", "compra_general", "distribucion_rubros", "dstoley", "remgas31", "estado_electronico", "coddest31"))) {
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
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['table_refresh']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['table_refresh'])
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


    function scCsrfGetToken()
    {
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['csrf_token']))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['csrf_token'] = $this->scCsrfGenerateToken();
        }

        return $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['csrf_token'];
    }

    function scCsrfGenerateToken()
    {
        $aSources = array(
            'abcdefghijklmnopqrstuvwxyz',
            'ABCDEFGHIJKLMNOPQRSTUVWXYZ',
            '1234567890',
            '!@$*()-_[]{},.;:'
        );

        $sRandom = '';

        $aSourcesSizes = array();
        $iSourceSize   = sizeof($aSources) - 1;
        for ($i = 0; $i <= $iSourceSize; $i++)
        {
            $aSourcesSizes[$i] = strlen($aSources[$i]) - 1;
        }

        for ($i = 0; $i < 64; $i++)
        {
            $iSource = $this->scCsrfRandom(0, $iSourceSize);
            $sRandom .= substr($aSources[$iSource], $this->scCsrfRandom(0, $aSourcesSizes[$iSource]), 1);
        }

        return $sRandom;
    }

    function scCsrfRandom($iMin, $iMax)
    {
        return mt_rand($iMin, $iMax);
    }

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
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['where_filter']);
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['total']);
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['fast_search']);
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['where_detal']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['where_detal'])) 
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['where_filter'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['where_detal'];
          }
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['empty_filter']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['empty_filter'])
          {
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['empty_filter']);
              $this->NM_ajax_info['empty_filter'] = 'ok';
              form_maecom_pack_ajax_response();
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
              $this->SC_monta_condicao($comando, "tipodocto31", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "nofact31", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "nocte31", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "nomcte31", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "localid31", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "cvectenegro31", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "vtabta31", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "descto31", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "flete31", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "itm31", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "novend31", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "fecfact31", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "condpag31", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "nopagos31", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "formapago31", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "obra31", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "orden31", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "cvnegra31", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "status31", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "cvimpto31", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "cvanulado31", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "efectivo31", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "cheque31", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "tarjeta31", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "acuenta31", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "nobanco31", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "nombanco31", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "nocheque31", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "notarjeta31", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "nomtarjeta31", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "cvdivisa31", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "valdivisa31", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "lineaprod31", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "intereses31", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "nopedido31", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "fecped31", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "ruc31", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "tel31", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "transpor31", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "cvtransfer31", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "fectrasfer31", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "desctofp31", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "catcte31", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "UID", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "recargos31", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "ice31", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "fecdocpr31", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "tipocomp31", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "conta31", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "fecvencidocpr", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "totsiniva31", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "fecemb", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "norefrendo", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "baseice", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "ncodret43", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "nbaseret43", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "npctjeret43", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "contrato", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "compra_general", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "distribucion_rubros", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "dstoLey", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "remGas31", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "estado_electronico", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "coddest31", $arg_search, $data_search);
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['where_detal']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['where_detal']) && !empty($comando)) 
      {
          $comando = $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['where_detal'] . " and (" .  $comando . ")";
      }
      if (empty($comando)) 
      {
          $comando = " 1 <> 1 "; 
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['where_filter_form']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['where_filter_form'])
      {
          $sc_where = " where " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['where_filter_form'] . " and (" . $comando . ")";
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
      $qt_geral_reg_form_maecom = isset($rt->fields[0]) ? $rt->fields[0] - 1 : 0; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['total'] = $qt_geral_reg_form_maecom;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['where_filter'] = $comando;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['fast_search'][0] = $field;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['fast_search'][1] = $arg_search;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['fast_search'][2] = $sv_data;
      $rt->Close(); 
      if (isset($rt->fields[0]) && $rt->fields[0] > 0 &&  isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['empty_filter']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['empty_filter'])
      {
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['empty_filter']);
          $this->NM_ajax_info['empty_filter'] = 'ok';
          form_maecom_pack_ajax_response();
          exit;
      }
      elseif (!isset($rt->fields[0]) || $rt->fields[0] == 0)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['empty_filter'] = true;
          $this->NM_ajax_info['empty_filter'] = 'ok';
          form_maecom_pack_ajax_response();
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
      $nm_numeric[] = "vtabta31";$nm_numeric[] = "descto31";$nm_numeric[] = "flete31";$nm_numeric[] = "itm31";$nm_numeric[] = "condpag31";$nm_numeric[] = "nopagos31";$nm_numeric[] = "formapago31";$nm_numeric[] = "cvnegra31";$nm_numeric[] = "status31";$nm_numeric[] = "cvimpto31";$nm_numeric[] = "cvanulado31";$nm_numeric[] = "efectivo31";$nm_numeric[] = "cheque31";$nm_numeric[] = "tarjeta31";$nm_numeric[] = "acuenta31";$nm_numeric[] = "intereses31";$nm_numeric[] = "desctofp31";$nm_numeric[] = "uid";$nm_numeric[] = "recargos31";$nm_numeric[] = "ice31";$nm_numeric[] = "conta31";$nm_numeric[] = "totsiniva31";$nm_numeric[] = "baseice";$nm_numeric[] = "nbaseret43";$nm_numeric[] = "npctjeret43";$nm_numeric[] = "dstoley";$nm_numeric[] = "estado_electronico";
      if (in_array($campo_join, $nm_numeric))
      {
         if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['decimal_db'] == ".")
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
      $Nm_datas["fecfact31"] = "datetime";$Nm_datas["fecped31"] = "datetime";$Nm_datas["fectrasfer31"] = "date";$Nm_datas["fecdocpr31"] = "datetime";$Nm_datas["fecvencidocpr"] = "datetime";$Nm_datas["fecemb"] = "date";
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
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['SC_sep_date']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['SC_sep_date']))
              {
                  $nm_aspas  = $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['SC_sep_date'];
                  $nm_aspas1 = $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['SC_sep_date1'];
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
       $nmgp_saida_form = "form_maecom_fim.php";
   }
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['redir']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['redir'] == 'redir')
   {
       unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']);
   }
   unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['opc_ant']);
   if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['nm_run_menu']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['nm_run_menu'] == 1)
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['nm_run_menu'] = 2;
       $nmgp_saida_form = "form_maecom_fim.php";
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
       form_maecom_pack_ajax_response();
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
   if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['sc_modal'])
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
if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['masterValue']))
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['dashboard_info']['under_dashboard']) {
?>
var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['dashboard_info']['parent_widget']; ?>']");
if (dbParentFrame && dbParentFrame[0] && dbParentFrame[0].contentWindow.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['masterValue'] as $cmp_master => $val_master)
        {
?>
    dbParentFrame[0].contentWindow.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['masterValue']);
?>
}
<?php
    }
    else {
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['masterValue'] as $cmp_master => $val_master)
        {
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['masterValue']);
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
                return array("sc_b_new_t.sc-unique-btn-1");
                break;
            case "insert":
                return array("sc_b_ins_t.sc-unique-btn-2");
                break;
            case "bcancelar":
                return array("sc_b_sai_t.sc-unique-btn-3");
                break;
            case "update":
                return array("sc_b_upd_t.sc-unique-btn-4");
                break;
            case "delete":
                return array("sc_b_del_t.sc-unique-btn-5");
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
    }

    function displayAppFooter()
    {
    }

    function displayAppToolbars()
    {
        if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['run_iframe'] != "R") {
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
        if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['ordem_cmp'] == $fieldName) {
            $orderColName = $fieldName;
            if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['ordem_ord'] == " desc") {
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
            case "vtabta31":
                return true;
            case "descto31":
                return true;
            case "flete31":
                return true;
            case "itm31":
                return true;
            case "efectivo31":
                return true;
            case "cheque31":
                return true;
            case "tarjeta31":
                return true;
            case "acuenta31":
                return true;
            case "intereses31":
                return true;
            case "desctofp31":
                return true;
            case "UID":
                return true;
            case "recargos31":
                return true;
            case "ice31":
                return true;
            case "conta31":
                return true;
            case "totsiniva31":
                return true;
            case "baseice":
                return true;
            case "nbaseret43":
                return true;
            case "npctjeret43":
                return true;
            case "dstoLey":
                return true;
            case "estado_electronico":
                return true;
            default:
                return false;
        }
        return false;
    }

    function scGetDefaultFieldOrder($fieldName)
    {
        switch ($fieldName) {
            case "vtabta31":
                return 'desc';
            case "descto31":
                return 'desc';
            case "flete31":
                return 'desc';
            case "itm31":
                return 'desc';
            case "fecfact31":
                return 'desc';
            case "efectivo31":
                return 'desc';
            case "cheque31":
                return 'desc';
            case "tarjeta31":
                return 'desc';
            case "acuenta31":
                return 'desc';
            case "intereses31":
                return 'desc';
            case "fecped31":
                return 'desc';
            case "fectrasfer31":
                return 'desc';
            case "desctofp31":
                return 'desc';
            case "UID":
                return 'desc';
            case "recargos31":
                return 'desc';
            case "ice31":
                return 'desc';
            case "fecdocpr31":
                return 'desc';
            case "conta31":
                return 'desc';
            case "fecvencidocpr":
                return 'desc';
            case "totsiniva31":
                return 'desc';
            case "fecemb":
                return 'desc';
            case "baseice":
                return 'desc';
            case "nbaseret43":
                return 'desc';
            case "npctjeret43":
                return 'desc';
            case "dstoLey":
                return 'desc';
            case "estado_electronico":
                return 'desc';
            default:
                return 'asc';
        }
        return 'asc';
    }
}
?>
