<?php
//
class form_movpag_apl
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
   var $codcte43;
   var $tipodoc43;
   var $numdoc43;
   var $ocurren43;
   var $cocte43;
   var $fecdoc43;
   var $fecdoc43_hora;
   var $tipdoc43;
   var $numvencob43;
   var $fedoc43;
   var $fedoc43_hora;
   var $totdoc43;
   var $detalle43;
   var $cvanioant43;
   var $cvdivisa43;
   var $valdivisa43;
   var $valdivisaori43;
   var $factcompra43;
   var $seriecompra43;
   var $autocompra43;
   var $codret43;
   var $valini43;
   var $numcuotasord43;
   var $valormov43;
   var $saldoregmov43;
   var $feccobro43;
   var $codpagounif43;
   var $tipodocdb43;
   var $numdocdb43;
   var $ocurrecdocdb43;
   var $numrecibo43;
   var $valorabono43;
   var $efectcheque43;
   var $saldoexceso43;
   var $saldocte43;
   var $codpago43;
   var $numdocpago43;
   var $obsdocpago43;
   var $uid;
   var $cvtransfer43;
   var $fectransfer43;
   var $tipoimp43;
   var $porcimp43;
   var $bienserv43;
   var $credgast43;
   var $fecvencompra43;
   var $fecvenret43;
   var $numautoret43;
   var $sdoexeact43;
   var $sdoregact43;
   var $conta43;
   var $cvanulado43;
   var $baseret43;
   var $ret_con_iva43;
   var $retenciones43;
   var $idb;
   var $tipocomptehis;
   var $banco;
   var $numero_transferencia;
   var $estado_electronico;
   var $proyecto;
   var $rubro;
   var $categoria;
   var $tipo_documento_atado;
   var $numero_documento_atado;
   var $valor_superior_al_maximo;
   var $distribucion_retencion;
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
          if (isset($this->NM_ajax_info['param']['autocompra43']))
          {
              $this->autocompra43 = $this->NM_ajax_info['param']['autocompra43'];
          }
          if (isset($this->NM_ajax_info['param']['banco']))
          {
              $this->banco = $this->NM_ajax_info['param']['banco'];
          }
          if (isset($this->NM_ajax_info['param']['baseret43']))
          {
              $this->baseret43 = $this->NM_ajax_info['param']['baseret43'];
          }
          if (isset($this->NM_ajax_info['param']['bienserv43']))
          {
              $this->bienserv43 = $this->NM_ajax_info['param']['bienserv43'];
          }
          if (isset($this->NM_ajax_info['param']['categoria']))
          {
              $this->categoria = $this->NM_ajax_info['param']['categoria'];
          }
          if (isset($this->NM_ajax_info['param']['cocte43']))
          {
              $this->cocte43 = $this->NM_ajax_info['param']['cocte43'];
          }
          if (isset($this->NM_ajax_info['param']['codcte43']))
          {
              $this->codcte43 = $this->NM_ajax_info['param']['codcte43'];
          }
          if (isset($this->NM_ajax_info['param']['codpago43']))
          {
              $this->codpago43 = $this->NM_ajax_info['param']['codpago43'];
          }
          if (isset($this->NM_ajax_info['param']['codpagounif43']))
          {
              $this->codpagounif43 = $this->NM_ajax_info['param']['codpagounif43'];
          }
          if (isset($this->NM_ajax_info['param']['codret43']))
          {
              $this->codret43 = $this->NM_ajax_info['param']['codret43'];
          }
          if (isset($this->NM_ajax_info['param']['conta43']))
          {
              $this->conta43 = $this->NM_ajax_info['param']['conta43'];
          }
          if (isset($this->NM_ajax_info['param']['credgast43']))
          {
              $this->credgast43 = $this->NM_ajax_info['param']['credgast43'];
          }
          if (isset($this->NM_ajax_info['param']['csrf_token']))
          {
              $this->csrf_token = $this->NM_ajax_info['param']['csrf_token'];
          }
          if (isset($this->NM_ajax_info['param']['cvanioant43']))
          {
              $this->cvanioant43 = $this->NM_ajax_info['param']['cvanioant43'];
          }
          if (isset($this->NM_ajax_info['param']['cvanulado43']))
          {
              $this->cvanulado43 = $this->NM_ajax_info['param']['cvanulado43'];
          }
          if (isset($this->NM_ajax_info['param']['cvdivisa43']))
          {
              $this->cvdivisa43 = $this->NM_ajax_info['param']['cvdivisa43'];
          }
          if (isset($this->NM_ajax_info['param']['cvtransfer43']))
          {
              $this->cvtransfer43 = $this->NM_ajax_info['param']['cvtransfer43'];
          }
          if (isset($this->NM_ajax_info['param']['detalle43']))
          {
              $this->detalle43 = $this->NM_ajax_info['param']['detalle43'];
          }
          if (isset($this->NM_ajax_info['param']['distribucion_retencion']))
          {
              $this->distribucion_retencion = $this->NM_ajax_info['param']['distribucion_retencion'];
          }
          if (isset($this->NM_ajax_info['param']['efectcheque43']))
          {
              $this->efectcheque43 = $this->NM_ajax_info['param']['efectcheque43'];
          }
          if (isset($this->NM_ajax_info['param']['estado_electronico']))
          {
              $this->estado_electronico = $this->NM_ajax_info['param']['estado_electronico'];
          }
          if (isset($this->NM_ajax_info['param']['factcompra43']))
          {
              $this->factcompra43 = $this->NM_ajax_info['param']['factcompra43'];
          }
          if (isset($this->NM_ajax_info['param']['feccobro43']))
          {
              $this->feccobro43 = $this->NM_ajax_info['param']['feccobro43'];
          }
          if (isset($this->NM_ajax_info['param']['fecdoc43']))
          {
              $this->fecdoc43 = $this->NM_ajax_info['param']['fecdoc43'];
          }
          if (isset($this->NM_ajax_info['param']['fectransfer43']))
          {
              $this->fectransfer43 = $this->NM_ajax_info['param']['fectransfer43'];
          }
          if (isset($this->NM_ajax_info['param']['fecvencompra43']))
          {
              $this->fecvencompra43 = $this->NM_ajax_info['param']['fecvencompra43'];
          }
          if (isset($this->NM_ajax_info['param']['fecvenret43']))
          {
              $this->fecvenret43 = $this->NM_ajax_info['param']['fecvenret43'];
          }
          if (isset($this->NM_ajax_info['param']['fedoc43']))
          {
              $this->fedoc43 = $this->NM_ajax_info['param']['fedoc43'];
          }
          if (isset($this->NM_ajax_info['param']['idb']))
          {
              $this->idb = $this->NM_ajax_info['param']['idb'];
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
          if (isset($this->NM_ajax_info['param']['numautoret43']))
          {
              $this->numautoret43 = $this->NM_ajax_info['param']['numautoret43'];
          }
          if (isset($this->NM_ajax_info['param']['numcuotasord43']))
          {
              $this->numcuotasord43 = $this->NM_ajax_info['param']['numcuotasord43'];
          }
          if (isset($this->NM_ajax_info['param']['numdoc43']))
          {
              $this->numdoc43 = $this->NM_ajax_info['param']['numdoc43'];
          }
          if (isset($this->NM_ajax_info['param']['numdocdb43']))
          {
              $this->numdocdb43 = $this->NM_ajax_info['param']['numdocdb43'];
          }
          if (isset($this->NM_ajax_info['param']['numdocpago43']))
          {
              $this->numdocpago43 = $this->NM_ajax_info['param']['numdocpago43'];
          }
          if (isset($this->NM_ajax_info['param']['numero_documento_atado']))
          {
              $this->numero_documento_atado = $this->NM_ajax_info['param']['numero_documento_atado'];
          }
          if (isset($this->NM_ajax_info['param']['numero_transferencia']))
          {
              $this->numero_transferencia = $this->NM_ajax_info['param']['numero_transferencia'];
          }
          if (isset($this->NM_ajax_info['param']['numrecibo43']))
          {
              $this->numrecibo43 = $this->NM_ajax_info['param']['numrecibo43'];
          }
          if (isset($this->NM_ajax_info['param']['numvencob43']))
          {
              $this->numvencob43 = $this->NM_ajax_info['param']['numvencob43'];
          }
          if (isset($this->NM_ajax_info['param']['obsdocpago43']))
          {
              $this->obsdocpago43 = $this->NM_ajax_info['param']['obsdocpago43'];
          }
          if (isset($this->NM_ajax_info['param']['ocurrecdocdb43']))
          {
              $this->ocurrecdocdb43 = $this->NM_ajax_info['param']['ocurrecdocdb43'];
          }
          if (isset($this->NM_ajax_info['param']['ocurren43']))
          {
              $this->ocurren43 = $this->NM_ajax_info['param']['ocurren43'];
          }
          if (isset($this->NM_ajax_info['param']['porcimp43']))
          {
              $this->porcimp43 = $this->NM_ajax_info['param']['porcimp43'];
          }
          if (isset($this->NM_ajax_info['param']['proyecto']))
          {
              $this->proyecto = $this->NM_ajax_info['param']['proyecto'];
          }
          if (isset($this->NM_ajax_info['param']['ret_con_iva43']))
          {
              $this->ret_con_iva43 = $this->NM_ajax_info['param']['ret_con_iva43'];
          }
          if (isset($this->NM_ajax_info['param']['retenciones43']))
          {
              $this->retenciones43 = $this->NM_ajax_info['param']['retenciones43'];
          }
          if (isset($this->NM_ajax_info['param']['rubro']))
          {
              $this->rubro = $this->NM_ajax_info['param']['rubro'];
          }
          if (isset($this->NM_ajax_info['param']['saldocte43']))
          {
              $this->saldocte43 = $this->NM_ajax_info['param']['saldocte43'];
          }
          if (isset($this->NM_ajax_info['param']['saldoexceso43']))
          {
              $this->saldoexceso43 = $this->NM_ajax_info['param']['saldoexceso43'];
          }
          if (isset($this->NM_ajax_info['param']['saldoregmov43']))
          {
              $this->saldoregmov43 = $this->NM_ajax_info['param']['saldoregmov43'];
          }
          if (isset($this->NM_ajax_info['param']['script_case_init']))
          {
              $this->script_case_init = $this->NM_ajax_info['param']['script_case_init'];
          }
          if (isset($this->NM_ajax_info['param']['sdoexeact43']))
          {
              $this->sdoexeact43 = $this->NM_ajax_info['param']['sdoexeact43'];
          }
          if (isset($this->NM_ajax_info['param']['sdoregact43']))
          {
              $this->sdoregact43 = $this->NM_ajax_info['param']['sdoregact43'];
          }
          if (isset($this->NM_ajax_info['param']['seriecompra43']))
          {
              $this->seriecompra43 = $this->NM_ajax_info['param']['seriecompra43'];
          }
          if (isset($this->NM_ajax_info['param']['tipdoc43']))
          {
              $this->tipdoc43 = $this->NM_ajax_info['param']['tipdoc43'];
          }
          if (isset($this->NM_ajax_info['param']['tipo_documento_atado']))
          {
              $this->tipo_documento_atado = $this->NM_ajax_info['param']['tipo_documento_atado'];
          }
          if (isset($this->NM_ajax_info['param']['tipocomptehis']))
          {
              $this->tipocomptehis = $this->NM_ajax_info['param']['tipocomptehis'];
          }
          if (isset($this->NM_ajax_info['param']['tipodoc43']))
          {
              $this->tipodoc43 = $this->NM_ajax_info['param']['tipodoc43'];
          }
          if (isset($this->NM_ajax_info['param']['tipodocdb43']))
          {
              $this->tipodocdb43 = $this->NM_ajax_info['param']['tipodocdb43'];
          }
          if (isset($this->NM_ajax_info['param']['tipoimp43']))
          {
              $this->tipoimp43 = $this->NM_ajax_info['param']['tipoimp43'];
          }
          if (isset($this->NM_ajax_info['param']['totdoc43']))
          {
              $this->totdoc43 = $this->NM_ajax_info['param']['totdoc43'];
          }
          if (isset($this->NM_ajax_info['param']['uid']))
          {
              $this->uid = $this->NM_ajax_info['param']['uid'];
          }
          if (isset($this->NM_ajax_info['param']['valdivisa43']))
          {
              $this->valdivisa43 = $this->NM_ajax_info['param']['valdivisa43'];
          }
          if (isset($this->NM_ajax_info['param']['valdivisaori43']))
          {
              $this->valdivisaori43 = $this->NM_ajax_info['param']['valdivisaori43'];
          }
          if (isset($this->NM_ajax_info['param']['valini43']))
          {
              $this->valini43 = $this->NM_ajax_info['param']['valini43'];
          }
          if (isset($this->NM_ajax_info['param']['valor_superior_al_maximo']))
          {
              $this->valor_superior_al_maximo = $this->NM_ajax_info['param']['valor_superior_al_maximo'];
          }
          if (isset($this->NM_ajax_info['param']['valorabono43']))
          {
              $this->valorabono43 = $this->NM_ajax_info['param']['valorabono43'];
          }
          if (isset($this->NM_ajax_info['param']['valormov43']))
          {
              $this->valormov43 = $this->NM_ajax_info['param']['valormov43'];
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
          $_SESSION['sc_session'][$script_case_init]['form_movpag']['opcao']   = "novo";
          $_SESSION['sc_session'][$script_case_init]['form_movpag']['opc_ant'] = "inicio";
      }
      if (isset($_SESSION['sc_session'][$script_case_init]['form_movpag']['embutida_parms']))
      { 
          $this->nmgp_parms = $_SESSION['sc_session'][$script_case_init]['form_movpag']['embutida_parms'];
          unset($_SESSION['sc_session'][$script_case_init]['form_movpag']['embutida_parms']);
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
                 nm_limpa_str_form_movpag($cadapar[1]);
                 if ($cadapar[1] == "@ ") {$cadapar[1] = trim($cadapar[1]); }
                 $Tmp_par = $cadapar[0];
                 $this->$Tmp_par = $cadapar[1];
             }
             $ix++;
          }
          if (isset($this->NM_where_filter_form))
          {
              $_SESSION['sc_session'][$script_case_init]['form_movpag']['where_filter_form'] = $this->NM_where_filter_form;
              unset($_SESSION['sc_session'][$script_case_init]['form_movpag']['total']);
          }
          if (isset($this->sc_redir_atualiz))
          {
              $_SESSION['sc_session'][$script_case_init]['form_movpag']['sc_redir_atualiz'] = $this->sc_redir_atualiz;
          }
          if (isset($this->sc_redir_insert))
          {
              $_SESSION['sc_session'][$script_case_init]['form_movpag']['sc_redir_insert'] = $this->sc_redir_insert;
          }
      } 
      elseif (isset($script_case_init) && !empty($script_case_init) && isset($_SESSION['sc_session'][$script_case_init]['form_movpag']['parms']))
      {
          if ((!isset($this->nmgp_opcao) || ($this->nmgp_opcao != "incluir" && $this->nmgp_opcao != "alterar" && $this->nmgp_opcao != "excluir" && $this->nmgp_opcao != "novo" && $this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form")) && (!isset($this->NM_ajax_opcao) || $this->NM_ajax_opcao == ""))
          {
              $todox = str_replace("?#?@?@?", "?#?@ ?@?", $_SESSION['sc_session'][$script_case_init]['form_movpag']['parms']);
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
          $_SESSION['sc_session'][$script_case_init]['form_movpag']['nm_run_menu'] = 1;
      } 
      if (($this->NM_ajax_flag && 'navigate_form' == $this->NM_ajax_opcao) || (isset($this->nmgp_opcao) && $this->nmgp_opcao == "igual"))
      { }
      else
      {
          $aDtParts = explode(' ', $this->fecdoc43);
          $this->fecdoc43      = $aDtParts[0];
          $this->fecdoc43_hora = $aDtParts[1];
      }
      if (($this->NM_ajax_flag && 'navigate_form' == $this->NM_ajax_opcao) || (isset($this->nmgp_opcao) && $this->nmgp_opcao == "igual"))
      { }
      else
      {
          $aDtParts = explode(' ', $this->fedoc43);
          $this->fedoc43      = $aDtParts[0];
          $this->fedoc43_hora = $aDtParts[1];
      }
      if (!$this->NM_ajax_flag && 'autocomp_' == substr($this->NM_ajax_opcao, 0, 9))
      {
          $this->NM_ajax_flag = true;
      }

      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      if (isset($this->nm_evt_ret_edit) && '' != $this->nm_evt_ret_edit)
      {
          $_SESSION['sc_session'][$script_case_init]['form_movpag']['lig_edit_lookup']     = true;
          $_SESSION['sc_session'][$script_case_init]['form_movpag']['lig_edit_lookup_cb']  = $this->nm_evt_ret_edit;
          $_SESSION['sc_session'][$script_case_init]['form_movpag']['lig_edit_lookup_row'] = isset($this->nm_evt_ret_row) ? $this->nm_evt_ret_row : '';
      }
      if (isset($_SESSION['sc_session'][$script_case_init]['form_movpag']['lig_edit_lookup']) && $_SESSION['sc_session'][$script_case_init]['form_movpag']['lig_edit_lookup'])
      {
          $this->lig_edit_lookup     = true;
          $this->lig_edit_lookup_cb  = $_SESSION['sc_session'][$script_case_init]['form_movpag']['lig_edit_lookup_cb'];
          $this->lig_edit_lookup_row = $_SESSION['sc_session'][$script_case_init]['form_movpag']['lig_edit_lookup_row'];
      }
      if (!$this->Ini)
      { 
          $this->Ini = new form_movpag_ini(); 
          $this->Ini->init();
          $this->nm_data = new nm_data("es");
          $this->app_is_initializing = $_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['initialize'];
      } 
      else 
      { 
         $this->nm_data = new nm_data("es");
      } 
      $_SESSION['sc_session'][$script_case_init]['form_movpag']['upload_field_info'] = array();

      unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['masterValue']);
      $this->Change_Menu = false;
      $run_iframe = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['run_iframe']) && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['run_iframe'] == "R")) ? true : false;
      if (!$run_iframe && isset($_SESSION['scriptcase']['menu_atual']) && !$_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['embutida_call'] && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['sc_outra_jan']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['sc_outra_jan']))
      {
          $this->sc_init_menu = "x";
          if (isset($_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init']['form_movpag']))
          {
              $this->sc_init_menu = $_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init']['form_movpag'];
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
          if ($this->Ini->sc_page == $this->sc_init_menu && !isset($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['form_movpag']))
          {
               $_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['form_movpag']['link'] = $this->Ini->sc_protocolo . $this->Ini->server . $this->Ini->path_link . "" . SC_dir_app_name('form_movpag') . "/";
               $_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['form_movpag']['label'] = "" . $this->Ini->Nm_lang['lang_othr_frmu_title'] . " movpag";
               $this->Change_Menu = true;
          }
          elseif ($this->Ini->sc_page == $this->sc_init_menu)
          {
              $achou = false;
              foreach ($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu] as $apl => $parms)
              {
                  if ($apl == "form_movpag")
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



      $_SESSION['scriptcase']['error_icon']['form_movpag']  = "<img src=\"" . $this->Ini->path_icones . "/scriptcase__NM__btn__NM__scriptcase9_Rhino__NM__nm_scriptcase9_Rhino_error.png\" style=\"border-width: 0px\" align=\"top\">&nbsp;";
      $_SESSION['scriptcase']['error_close']['form_movpag'] = "<td>" . nmButtonOutput($this->arr_buttons, "berrm_clse", "document.getElementById('id_error_display_fixed').style.display = 'none'; document.getElementById('id_error_message_fixed').innerHTML = ''; return false", "document.getElementById('id_error_display_fixed').style.display = 'none'; document.getElementById('id_error_message_fixed').innerHTML = ''; return false", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "") . "</td>";

      $this->Embutida_proc = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['embutida_proc']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['embutida_proc'] : $this->Embutida_proc;
      $this->Embutida_form = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['embutida_form']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['embutida_form'] : $this->Embutida_form;
      $this->Embutida_call = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['embutida_call']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['embutida_call'] : $this->Embutida_call;

       $_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['table_refresh'] = false;

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['embutida_liga_grid_edit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['embutida_liga_grid_edit'])
      {
          $this->Grid_editavel = ('on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['embutida_liga_grid_edit']) ? true : false;
      }
      if (isset($this->Grid_editavel) && $this->Grid_editavel)
      {
          $this->Embutida_form  = true;
          $this->Embutida_ronly = true;
      }
      $this->Embutida_multi = false;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['embutida_multi']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['embutida_multi'])
      {
          $this->Grid_editavel  = false;
          $this->Embutida_form  = false;
          $this->Embutida_ronly = false;
          $this->Embutida_multi = true;
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['embutida_liga_tp_pag']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['embutida_liga_tp_pag'])
      {
          $this->form_paginacao = $_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['embutida_liga_tp_pag'];
      }

      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['embutida_form']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['embutida_form'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['embutida_form'] = $this->Embutida_form;
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['embutida_liga_grid_edit']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['embutida_liga_grid_edit'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['embutida_liga_grid_edit'] = $this->Grid_editavel ? 'on' : 'off';
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['embutida_liga_grid_edit']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['embutida_liga_grid_edit'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['embutida_liga_grid_edit'] = $this->Embutida_call;
      }

      $this->Ini->cor_grid_par = $this->Ini->cor_grid_impar;
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      $this->nmgp_url_saida  = $nm_url_saida;
      $this->nmgp_form_show  = "on";
      $this->nmgp_form_empty = false;
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_valida.php", "C", "NM_Valida") ; 
      $teste_validade = new NM_Valida ;

      $this->loadFieldConfig();

      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['first_time'])
      {
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_movpag']['insert']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_movpag']['new']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_movpag']['update']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_movpag']['delete']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_movpag']['first']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_movpag']['back']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_movpag']['forward']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_movpag']['last']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_movpag']['qsearch']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_movpag']['dynsearch']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_movpag']['summary']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_movpag']['navpage']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_movpag']['goto']);
      }
      $this->NM_cancel_return_new = (isset($this->NM_cancel_return_new) && $this->NM_cancel_return_new == 1) ? "1" : "";
      $this->NM_cancel_insert_new = ((isset($this->NM_cancel_insert_new) && $this->NM_cancel_insert_new == 1) || $this->NM_cancel_return_new == 1) ? "document.F5.action='" . $nm_url_saida . "';" : "";
      if (isset($this->NM_btn_insert) && '' != $this->NM_btn_insert && (!isset($_SESSION['scriptcase']['sc_apl_conf']['form_movpag']['insert']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['form_movpag']['insert']))
      {
          if ('N' == $this->NM_btn_insert)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_movpag']['insert'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_movpag']['insert'] = 'on';
          }
      }
      if (isset($this->NM_btn_new) && 'N' == $this->NM_btn_new)
      {
          $_SESSION['scriptcase']['sc_apl_conf_lig']['form_movpag']['new'] = 'off';
      }
      if (isset($this->NM_btn_update) && '' != $this->NM_btn_update && (!isset($_SESSION['scriptcase']['sc_apl_conf']['form_movpag']['update']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['form_movpag']['update']))
      {
          if ('N' == $this->NM_btn_update)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_movpag']['update'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_movpag']['update'] = 'on';
          }
      }
      if (isset($this->NM_btn_delete) && '' != $this->NM_btn_delete && (!isset($_SESSION['scriptcase']['sc_apl_conf']['form_movpag']['delete']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['form_movpag']['delete']))
      {
          if ('N' == $this->NM_btn_delete)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_movpag']['delete'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_movpag']['delete'] = 'on';
          }
      }
      if (isset($this->NM_btn_navega) && '' != $this->NM_btn_navega)
      {
          if ('N' == $this->NM_btn_navega)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_movpag']['first']     = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_movpag']['back']      = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_movpag']['forward']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_movpag']['last']      = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_movpag']['qsearch']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_movpag']['dynsearch'] = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_movpag']['summary']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_movpag']['navpage']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_movpag']['goto']      = 'off';
              $this->Nav_permite_ava = false;
              $this->Nav_permite_ret = false;
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_movpag']['first']     = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_movpag']['back']      = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_movpag']['forward']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_movpag']['last']      = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_movpag']['qsearch']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_movpag']['dynsearch'] = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_movpag']['summary']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_movpag']['navpage']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_movpag']['goto']      = 'on';
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
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['where_orig'] = "";
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['where_pesq']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['where_pesq'] = "";
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['where_pesq_filtro'] = "";
      }
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['where_pesq_filtro'];
      if ($this->NM_ajax_flag && 'event_' == substr($this->NM_ajax_opcao, 0, 6)) {
          $this->nmgp_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['buttonStatus'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['iframe_filtro']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['iframe_filtro'] == "S")
      {
          $this->nmgp_botoes['exit'] = "off";
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_movpag']['btn_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['form_movpag']['btn_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['form_movpag']['btn_display'] as $NM_cada_btn => $NM_cada_opc)
          {
              $this->nmgp_botoes[$NM_cada_btn] = $NM_cada_opc;
          }
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_movpag']['insert']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_movpag']['insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_movpag']['insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_movpag']['insert'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_movpag']['new']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_movpag']['new'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_movpag']['new'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_movpag']['update']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_movpag']['update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_movpag']['update'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_movpag']['delete']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_movpag']['delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_movpag']['delete'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_movpag']['first']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_movpag']['first'] != '')
      {
          $this->nmgp_botoes['first'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_movpag']['first'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_movpag']['back']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_movpag']['back'] != '')
      {
          $this->nmgp_botoes['back'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_movpag']['back'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_movpag']['forward']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_movpag']['forward'] != '')
      {
          $this->nmgp_botoes['forward'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_movpag']['forward'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_movpag']['last']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_movpag']['last'] != '')
      {
          $this->nmgp_botoes['last'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_movpag']['last'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_movpag']['qsearch']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_movpag']['qsearch'] != '')
      {
          $this->nmgp_botoes['qsearch'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_movpag']['qsearch'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_movpag']['dynsearch']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_movpag']['dynsearch'] != '')
      {
          $this->nmgp_botoes['dynsearch'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_movpag']['dynsearch'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_movpag']['summary']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_movpag']['summary'] != '')
      {
          $this->nmgp_botoes['summary'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_movpag']['summary'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_movpag']['navpage']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_movpag']['navpage'] != '')
      {
          $this->nmgp_botoes['navpage'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_movpag']['navpage'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_movpag']['goto']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_movpag']['goto'] != '')
      {
          $this->nmgp_botoes['goto'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_movpag']['goto'];
      }

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['embutida_liga_form_insert']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['embutida_liga_form_insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['embutida_liga_form_insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['embutida_liga_form_insert'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['embutida_liga_form_update']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['embutida_liga_form_update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['embutida_liga_form_update'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['embutida_liga_form_delete']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['embutida_liga_form_delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['embutida_liga_form_delete'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['embutida_liga_form_btn_nav']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['embutida_liga_form_btn_nav'] != '')
      {
          $this->nmgp_botoes['first']   = $_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['back']    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['forward'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['last']    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['embutida_liga_form_btn_nav'];
      }

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['dashboard_info']['under_dashboard'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['dashboard_info']['maximized']) {
          $tmpDashboardApp = $_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['dashboard_info']['dashboard_app'];
          if (isset($_SESSION['scriptcase']['dashboard_toolbar'][$tmpDashboardApp]['form_movpag'])) {
              $tmpDashboardButtons = $_SESSION['scriptcase']['dashboard_toolbar'][$tmpDashboardApp]['form_movpag'];

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

      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_movpag']['insert']) && $_SESSION['scriptcase']['sc_apl_conf']['form_movpag']['insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf']['form_movpag']['insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['scriptcase']['sc_apl_conf']['form_movpag']['insert'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_movpag']['update']) && $_SESSION['scriptcase']['sc_apl_conf']['form_movpag']['update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['scriptcase']['sc_apl_conf']['form_movpag']['update'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_movpag']['delete']) && $_SESSION['scriptcase']['sc_apl_conf']['form_movpag']['delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['scriptcase']['sc_apl_conf']['form_movpag']['delete'];
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_movpag']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['form_movpag']['field_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['form_movpag']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->nmgp_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
              $this->NM_ajax_info['fieldDisplay'][$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_movpag']['field_readonly']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['form_movpag']['field_readonly']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['form_movpag']['field_readonly'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->nmgp_cmp_readonly[$NM_cada_field] = "on";
              $this->NM_ajax_info['readOnly'][$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_movpag']['exit']) && $_SESSION['scriptcase']['sc_apl_conf']['form_movpag']['exit'] != '')
      {
          $_SESSION['scriptcase']['sc_url_saida'][$this->Ini->sc_page]       = $_SESSION['scriptcase']['sc_apl_conf']['form_movpag']['exit'];
          $_SESSION['scriptcase']['sc_force_url_saida'][$this->Ini->sc_page] = true;
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['dados_form']))
      {
          $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['dados_form'];
      }
      $glo_senha_protect = (isset($_SESSION['scriptcase']['glo_senha_protect'])) ? $_SESSION['scriptcase']['glo_senha_protect'] : "S";
      $this->aba_iframe = false;
      if (isset($_SESSION['scriptcase']['sc_aba_iframe']))
      {
          foreach ($_SESSION['scriptcase']['sc_aba_iframe'] as $aba => $apls_aba)
          {
              if (in_array("form_movpag", $apls_aba))
              {
                  $this->aba_iframe = true;
                  break;
              }
          }
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['iframe_menu'] && (!isset($_SESSION['scriptcase']['menu_mobile']) || empty($_SESSION['scriptcase']['menu_mobile'])))
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
              include_once($this->Ini->path_embutida . 'form_movpag/form_movpag_calendar.php');
          }
          else
          { 
              include_once($this->Ini->path_aplicacao . 'form_movpag_calendar.php');
          }
          exit;
      }

      if (is_file($this->Ini->path_aplicacao . 'form_movpag_help.txt'))
      {
          $arr_link_webhelp = file($this->Ini->path_aplicacao . 'form_movpag_help.txt');
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
          require_once($this->Ini->path_embutida . 'form_movpag/form_movpag_erro.class.php');
      }
      else
      { 
          require_once($this->Ini->path_aplicacao . "form_movpag_erro.class.php"); 
      }
      $this->Erro      = new form_movpag_erro();
      $this->Erro->Ini = $this->Ini;
      $this->proc_fast_search = false;
      if ($this->nmgp_opcao == "fast_search")  
      {
          $this->SC_fast_search($this->nmgp_fast_search, $this->nmgp_cond_fast_search, $this->nmgp_arg_fast_search);
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['opcao'] = "inicio";
          $this->nmgp_opcao = "inicio";
          $this->proc_fast_search = true;
      } 
      if ($nm_opc_lookup != "lookup" && $nm_opc_php != "formphp")
      { 
         if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['opcao']))
         { 
             if ($this->codcte43 != "" || $this->tipodoc43 != "" || $this->numdoc43 != "" || $this->ocurren43 != "")   
             { 
                 $_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['opcao'] = "igual" ;  
             }   
         }   
      } 
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['opcao']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['opcao']) && empty($this->nmgp_refresh_fields))
      {
          $this->nmgp_opcao = $_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['opcao'];  
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['opcao'] = "" ;  
          if ($this->nmgp_opcao == "edit_novo")  
          {
             $this->nmgp_opcao = "novo";
             $this->nm_flag_saida_novo = "S";
          }
      } 
      $this->nm_Start_new = false;
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_movpag']['start']) && $_SESSION['scriptcase']['sc_apl_conf']['form_movpag']['start'] == 'new')
      {
          $this->nmgp_opcao = "novo";
          $this->nm_Start_new = true;
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['opcao'] = "novo";
          unset($_SESSION['scriptcase']['sc_apl_conf']['form_movpag']['start']);
      }
      if ($this->nmgp_opcao == "igual")  
      {
          $this->nmgp_opc_ant = $this->nmgp_opcao;
      } 
      else
      {
          $this->nmgp_opc_ant = $_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['opc_ant'];
      } 
      if ($this->nmgp_opcao == "recarga" || $this->nmgp_opcao == "muda_form")  
      {
          $this->nmgp_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['botoes'];
          $this->Nav_permite_ret = 0 != $_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['inicio'];
          $this->Nav_permite_ava = $_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['total'] != $_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['final'];
      }
      else
      {
      }
      $this->nm_flag_iframe = false;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['dados_form'])) 
      {
         $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['dados_form'];
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
      if (isset($this->codcte43)) { $this->nm_limpa_alfa($this->codcte43); }
      if (isset($this->tipodoc43)) { $this->nm_limpa_alfa($this->tipodoc43); }
      if (isset($this->numdoc43)) { $this->nm_limpa_alfa($this->numdoc43); }
      if (isset($this->ocurren43)) { $this->nm_limpa_alfa($this->ocurren43); }
      if (isset($this->cocte43)) { $this->nm_limpa_alfa($this->cocte43); }
      if (isset($this->tipdoc43)) { $this->nm_limpa_alfa($this->tipdoc43); }
      if (isset($this->numvencob43)) { $this->nm_limpa_alfa($this->numvencob43); }
      if (isset($this->totdoc43)) { $this->nm_limpa_alfa($this->totdoc43); }
      if (isset($this->detalle43)) { $this->nm_limpa_alfa($this->detalle43); }
      if (isset($this->cvanioant43)) { $this->nm_limpa_alfa($this->cvanioant43); }
      if (isset($this->cvdivisa43)) { $this->nm_limpa_alfa($this->cvdivisa43); }
      if (isset($this->valdivisa43)) { $this->nm_limpa_alfa($this->valdivisa43); }
      if (isset($this->valdivisaori43)) { $this->nm_limpa_alfa($this->valdivisaori43); }
      if (isset($this->factcompra43)) { $this->nm_limpa_alfa($this->factcompra43); }
      if (isset($this->seriecompra43)) { $this->nm_limpa_alfa($this->seriecompra43); }
      if (isset($this->autocompra43)) { $this->nm_limpa_alfa($this->autocompra43); }
      if (isset($this->codret43)) { $this->nm_limpa_alfa($this->codret43); }
      if (isset($this->valini43)) { $this->nm_limpa_alfa($this->valini43); }
      if (isset($this->numcuotasord43)) { $this->nm_limpa_alfa($this->numcuotasord43); }
      if (isset($this->valormov43)) { $this->nm_limpa_alfa($this->valormov43); }
      if (isset($this->saldoregmov43)) { $this->nm_limpa_alfa($this->saldoregmov43); }
      if (isset($this->codpagounif43)) { $this->nm_limpa_alfa($this->codpagounif43); }
      if (isset($this->tipodocdb43)) { $this->nm_limpa_alfa($this->tipodocdb43); }
      if (isset($this->numdocdb43)) { $this->nm_limpa_alfa($this->numdocdb43); }
      if (isset($this->ocurrecdocdb43)) { $this->nm_limpa_alfa($this->ocurrecdocdb43); }
      if (isset($this->numrecibo43)) { $this->nm_limpa_alfa($this->numrecibo43); }
      if (isset($this->valorabono43)) { $this->nm_limpa_alfa($this->valorabono43); }
      if (isset($this->efectcheque43)) { $this->nm_limpa_alfa($this->efectcheque43); }
      if (isset($this->saldoexceso43)) { $this->nm_limpa_alfa($this->saldoexceso43); }
      if (isset($this->saldocte43)) { $this->nm_limpa_alfa($this->saldocte43); }
      if (isset($this->codpago43)) { $this->nm_limpa_alfa($this->codpago43); }
      if (isset($this->numdocpago43)) { $this->nm_limpa_alfa($this->numdocpago43); }
      if (isset($this->obsdocpago43)) { $this->nm_limpa_alfa($this->obsdocpago43); }
      if (isset($this->uid)) { $this->nm_limpa_alfa($this->uid); }
      if (isset($this->cvtransfer43)) { $this->nm_limpa_alfa($this->cvtransfer43); }
      if (isset($this->tipoimp43)) { $this->nm_limpa_alfa($this->tipoimp43); }
      if (isset($this->porcimp43)) { $this->nm_limpa_alfa($this->porcimp43); }
      if (isset($this->bienserv43)) { $this->nm_limpa_alfa($this->bienserv43); }
      if (isset($this->credgast43)) { $this->nm_limpa_alfa($this->credgast43); }
      if (isset($this->numautoret43)) { $this->nm_limpa_alfa($this->numautoret43); }
      if (isset($this->sdoexeact43)) { $this->nm_limpa_alfa($this->sdoexeact43); }
      if (isset($this->sdoregact43)) { $this->nm_limpa_alfa($this->sdoregact43); }
      if (isset($this->conta43)) { $this->nm_limpa_alfa($this->conta43); }
      if (isset($this->cvanulado43)) { $this->nm_limpa_alfa($this->cvanulado43); }
      if (isset($this->baseret43)) { $this->nm_limpa_alfa($this->baseret43); }
      if (isset($this->ret_con_iva43)) { $this->nm_limpa_alfa($this->ret_con_iva43); }
      if (isset($this->retenciones43)) { $this->nm_limpa_alfa($this->retenciones43); }
      if (isset($this->idb)) { $this->nm_limpa_alfa($this->idb); }
      if (isset($this->tipocomptehis)) { $this->nm_limpa_alfa($this->tipocomptehis); }
      if (isset($this->banco)) { $this->nm_limpa_alfa($this->banco); }
      if (isset($this->numero_transferencia)) { $this->nm_limpa_alfa($this->numero_transferencia); }
      if (isset($this->estado_electronico)) { $this->nm_limpa_alfa($this->estado_electronico); }
      if (isset($this->proyecto)) { $this->nm_limpa_alfa($this->proyecto); }
      if (isset($this->rubro)) { $this->nm_limpa_alfa($this->rubro); }
      if (isset($this->categoria)) { $this->nm_limpa_alfa($this->categoria); }
      if (isset($this->tipo_documento_atado)) { $this->nm_limpa_alfa($this->tipo_documento_atado); }
      if (isset($this->numero_documento_atado)) { $this->nm_limpa_alfa($this->numero_documento_atado); }
      if (isset($this->valor_superior_al_maximo)) { $this->nm_limpa_alfa($this->valor_superior_al_maximo); }
      if (isset($this->distribucion_retencion)) { $this->nm_limpa_alfa($this->distribucion_retencion); }
      $Campos_Crit       = "";
      $Campos_erro       = "";
      $Campos_Falta      = array();
      $Campos_Erros      = array();
      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          =  substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['opc_edit'] = true;  
     if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['dados_select'])) 
     {
        $this->nmgp_dados_select = $_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['dados_select'];
     }
   }

   function loadFieldConfig()
   {
      $this->field_config = array();
      //-- fecdoc43
      $this->field_config['fecdoc43']                 = array();
      $this->field_config['fecdoc43']['date_format']  = $_SESSION['scriptcase']['reg_conf']['date_format'] . ';' . $_SESSION['scriptcase']['reg_conf']['time_format'];
      $this->field_config['fecdoc43']['date_sep']     = $_SESSION['scriptcase']['reg_conf']['date_sep'];
      $this->field_config['fecdoc43']['time_sep']     = $_SESSION['scriptcase']['reg_conf']['time_sep'];
      $this->field_config['fecdoc43']['date_display'] = "ddmmaaaa;hhiiss";
      $this->new_date_format('DH', 'fecdoc43');
      //-- fedoc43
      $this->field_config['fedoc43']                 = array();
      $this->field_config['fedoc43']['date_format']  = $_SESSION['scriptcase']['reg_conf']['date_format'] . ';' . $_SESSION['scriptcase']['reg_conf']['time_format'];
      $this->field_config['fedoc43']['date_sep']     = $_SESSION['scriptcase']['reg_conf']['date_sep'];
      $this->field_config['fedoc43']['time_sep']     = $_SESSION['scriptcase']['reg_conf']['time_sep'];
      $this->field_config['fedoc43']['date_display'] = "ddmmaaaa;hhiiss";
      $this->new_date_format('DH', 'fedoc43');
      //-- totdoc43
      $this->field_config['totdoc43']               = array();
      $this->field_config['totdoc43']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_val'];
      $this->field_config['totdoc43']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['totdoc43']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_val'];
      $this->field_config['totdoc43']['symbol_mon'] = '';
      $this->field_config['totdoc43']['format_pos'] = $_SESSION['scriptcase']['reg_conf']['monet_f_pos'];
      $this->field_config['totdoc43']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['monet_f_neg'];
      //-- valdivisa43
      $this->field_config['valdivisa43']               = array();
      $this->field_config['valdivisa43']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['valdivisa43']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['valdivisa43']['symbol_dec'] = '';
      $this->field_config['valdivisa43']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['valdivisa43']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- valdivisaori43
      $this->field_config['valdivisaori43']               = array();
      $this->field_config['valdivisaori43']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['valdivisaori43']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['valdivisaori43']['symbol_dec'] = '';
      $this->field_config['valdivisaori43']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['valdivisaori43']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- valini43
      $this->field_config['valini43']               = array();
      $this->field_config['valini43']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_val'];
      $this->field_config['valini43']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['valini43']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_val'];
      $this->field_config['valini43']['symbol_mon'] = '';
      $this->field_config['valini43']['format_pos'] = $_SESSION['scriptcase']['reg_conf']['monet_f_pos'];
      $this->field_config['valini43']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['monet_f_neg'];
      //-- valormov43
      $this->field_config['valormov43']               = array();
      $this->field_config['valormov43']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_val'];
      $this->field_config['valormov43']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['valormov43']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_val'];
      $this->field_config['valormov43']['symbol_mon'] = '';
      $this->field_config['valormov43']['format_pos'] = $_SESSION['scriptcase']['reg_conf']['monet_f_pos'];
      $this->field_config['valormov43']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['monet_f_neg'];
      //-- saldoregmov43
      $this->field_config['saldoregmov43']               = array();
      $this->field_config['saldoregmov43']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_val'];
      $this->field_config['saldoregmov43']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['saldoregmov43']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_val'];
      $this->field_config['saldoregmov43']['symbol_mon'] = '';
      $this->field_config['saldoregmov43']['format_pos'] = $_SESSION['scriptcase']['reg_conf']['monet_f_pos'];
      $this->field_config['saldoregmov43']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['monet_f_neg'];
      //-- feccobro43
      $this->field_config['feccobro43']                 = array();
      $this->field_config['feccobro43']['date_format']  = $_SESSION['scriptcase']['reg_conf']['date_format'];
      $this->field_config['feccobro43']['date_sep']     = $_SESSION['scriptcase']['reg_conf']['date_sep'];
      $this->field_config['feccobro43']['date_display'] = "ddmmaaaa";
      $this->new_date_format('DT', 'feccobro43');
      //-- valorabono43
      $this->field_config['valorabono43']               = array();
      $this->field_config['valorabono43']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_val'];
      $this->field_config['valorabono43']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['valorabono43']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_val'];
      $this->field_config['valorabono43']['symbol_mon'] = '';
      $this->field_config['valorabono43']['format_pos'] = $_SESSION['scriptcase']['reg_conf']['monet_f_pos'];
      $this->field_config['valorabono43']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['monet_f_neg'];
      //-- saldoexceso43
      $this->field_config['saldoexceso43']               = array();
      $this->field_config['saldoexceso43']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_val'];
      $this->field_config['saldoexceso43']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['saldoexceso43']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_val'];
      $this->field_config['saldoexceso43']['symbol_mon'] = '';
      $this->field_config['saldoexceso43']['format_pos'] = $_SESSION['scriptcase']['reg_conf']['monet_f_pos'];
      $this->field_config['saldoexceso43']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['monet_f_neg'];
      //-- saldocte43
      $this->field_config['saldocte43']               = array();
      $this->field_config['saldocte43']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_val'];
      $this->field_config['saldocte43']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['saldocte43']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_val'];
      $this->field_config['saldocte43']['symbol_mon'] = '';
      $this->field_config['saldocte43']['format_pos'] = $_SESSION['scriptcase']['reg_conf']['monet_f_pos'];
      $this->field_config['saldocte43']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['monet_f_neg'];
      //-- fectransfer43
      $this->field_config['fectransfer43']                 = array();
      $this->field_config['fectransfer43']['date_format']  = $_SESSION['scriptcase']['reg_conf']['date_format'];
      $this->field_config['fectransfer43']['date_sep']     = $_SESSION['scriptcase']['reg_conf']['date_sep'];
      $this->field_config['fectransfer43']['date_display'] = "ddmmaaaa";
      $this->new_date_format('DT', 'fectransfer43');
      //-- tipoimp43
      $this->field_config['tipoimp43']               = array();
      $this->field_config['tipoimp43']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['tipoimp43']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['tipoimp43']['symbol_dec'] = '';
      $this->field_config['tipoimp43']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['tipoimp43']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- porcimp43
      $this->field_config['porcimp43']               = array();
      $this->field_config['porcimp43']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_val'];
      $this->field_config['porcimp43']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['porcimp43']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_val'];
      $this->field_config['porcimp43']['symbol_mon'] = '';
      $this->field_config['porcimp43']['format_pos'] = $_SESSION['scriptcase']['reg_conf']['monet_f_pos'];
      $this->field_config['porcimp43']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['monet_f_neg'];
      //-- fecvencompra43
      $this->field_config['fecvencompra43']                 = array();
      $this->field_config['fecvencompra43']['date_format']  = $_SESSION['scriptcase']['reg_conf']['date_format'];
      $this->field_config['fecvencompra43']['date_sep']     = $_SESSION['scriptcase']['reg_conf']['date_sep'];
      $this->field_config['fecvencompra43']['date_display'] = "ddmmaaaa";
      $this->new_date_format('DT', 'fecvencompra43');
      //-- fecvenret43
      $this->field_config['fecvenret43']                 = array();
      $this->field_config['fecvenret43']['date_format']  = $_SESSION['scriptcase']['reg_conf']['date_format'];
      $this->field_config['fecvenret43']['date_sep']     = $_SESSION['scriptcase']['reg_conf']['date_sep'];
      $this->field_config['fecvenret43']['date_display'] = "ddmmaaaa";
      $this->new_date_format('DT', 'fecvenret43');
      //-- sdoexeact43
      $this->field_config['sdoexeact43']               = array();
      $this->field_config['sdoexeact43']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_val'];
      $this->field_config['sdoexeact43']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['sdoexeact43']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_val'];
      $this->field_config['sdoexeact43']['symbol_mon'] = '';
      $this->field_config['sdoexeact43']['format_pos'] = $_SESSION['scriptcase']['reg_conf']['monet_f_pos'];
      $this->field_config['sdoexeact43']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['monet_f_neg'];
      //-- sdoregact43
      $this->field_config['sdoregact43']               = array();
      $this->field_config['sdoregact43']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_val'];
      $this->field_config['sdoregact43']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['sdoregact43']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_val'];
      $this->field_config['sdoregact43']['symbol_mon'] = '';
      $this->field_config['sdoregact43']['format_pos'] = $_SESSION['scriptcase']['reg_conf']['monet_f_pos'];
      $this->field_config['sdoregact43']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['monet_f_neg'];
      //-- baseret43
      $this->field_config['baseret43']               = array();
      $this->field_config['baseret43']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_val'];
      $this->field_config['baseret43']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['baseret43']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_val'];
      $this->field_config['baseret43']['symbol_mon'] = '';
      $this->field_config['baseret43']['format_pos'] = $_SESSION['scriptcase']['reg_conf']['monet_f_pos'];
      $this->field_config['baseret43']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['monet_f_neg'];
      //-- numero_transferencia
      $this->field_config['numero_transferencia']               = array();
      $this->field_config['numero_transferencia']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['numero_transferencia']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['numero_transferencia']['symbol_dec'] = '';
      $this->field_config['numero_transferencia']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['numero_transferencia']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- estado_electronico
      $this->field_config['estado_electronico']               = array();
      $this->field_config['estado_electronico']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['estado_electronico']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['estado_electronico']['symbol_dec'] = '';
      $this->field_config['estado_electronico']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['estado_electronico']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- valor_superior_al_maximo
      $this->field_config['valor_superior_al_maximo']               = array();
      $this->field_config['valor_superior_al_maximo']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['valor_superior_al_maximo']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['valor_superior_al_maximo']['symbol_dec'] = '';
      $this->field_config['valor_superior_al_maximo']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['valor_superior_al_maximo']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
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
          if ('validate_codcte43' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'codcte43');
          }
          if ('validate_tipodoc43' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'tipodoc43');
          }
          if ('validate_numdoc43' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'numdoc43');
          }
          if ('validate_ocurren43' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'ocurren43');
          }
          if ('validate_cocte43' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'cocte43');
          }
          if ('validate_fecdoc43' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'fecdoc43');
          }
          if ('validate_tipdoc43' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'tipdoc43');
          }
          if ('validate_numvencob43' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'numvencob43');
          }
          if ('validate_fedoc43' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'fedoc43');
          }
          if ('validate_totdoc43' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'totdoc43');
          }
          if ('validate_detalle43' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'detalle43');
          }
          if ('validate_cvanioant43' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'cvanioant43');
          }
          if ('validate_cvdivisa43' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'cvdivisa43');
          }
          if ('validate_valdivisa43' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'valdivisa43');
          }
          if ('validate_valdivisaori43' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'valdivisaori43');
          }
          if ('validate_factcompra43' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'factcompra43');
          }
          if ('validate_seriecompra43' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'seriecompra43');
          }
          if ('validate_autocompra43' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'autocompra43');
          }
          if ('validate_codret43' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'codret43');
          }
          if ('validate_valini43' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'valini43');
          }
          if ('validate_numcuotasord43' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'numcuotasord43');
          }
          if ('validate_valormov43' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'valormov43');
          }
          if ('validate_saldoregmov43' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'saldoregmov43');
          }
          if ('validate_feccobro43' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'feccobro43');
          }
          if ('validate_codpagounif43' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'codpagounif43');
          }
          if ('validate_tipodocdb43' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'tipodocdb43');
          }
          if ('validate_numdocdb43' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'numdocdb43');
          }
          if ('validate_ocurrecdocdb43' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'ocurrecdocdb43');
          }
          if ('validate_numrecibo43' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'numrecibo43');
          }
          if ('validate_valorabono43' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'valorabono43');
          }
          if ('validate_efectcheque43' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'efectcheque43');
          }
          if ('validate_saldoexceso43' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'saldoexceso43');
          }
          if ('validate_saldocte43' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'saldocte43');
          }
          if ('validate_codpago43' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'codpago43');
          }
          if ('validate_numdocpago43' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'numdocpago43');
          }
          if ('validate_obsdocpago43' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'obsdocpago43');
          }
          if ('validate_uid' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'uid');
          }
          if ('validate_cvtransfer43' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'cvtransfer43');
          }
          if ('validate_fectransfer43' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'fectransfer43');
          }
          if ('validate_tipoimp43' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'tipoimp43');
          }
          if ('validate_porcimp43' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'porcimp43');
          }
          if ('validate_bienserv43' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'bienserv43');
          }
          if ('validate_credgast43' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'credgast43');
          }
          if ('validate_fecvencompra43' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'fecvencompra43');
          }
          if ('validate_fecvenret43' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'fecvenret43');
          }
          if ('validate_numautoret43' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'numautoret43');
          }
          if ('validate_sdoexeact43' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'sdoexeact43');
          }
          if ('validate_sdoregact43' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'sdoregact43');
          }
          if ('validate_conta43' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'conta43');
          }
          if ('validate_cvanulado43' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'cvanulado43');
          }
          if ('validate_baseret43' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'baseret43');
          }
          if ('validate_ret_con_iva43' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'ret_con_iva43');
          }
          if ('validate_retenciones43' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'retenciones43');
          }
          if ('validate_idb' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'idb');
          }
          if ('validate_tipocomptehis' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'tipocomptehis');
          }
          if ('validate_banco' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'banco');
          }
          if ('validate_numero_transferencia' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'numero_transferencia');
          }
          if ('validate_estado_electronico' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'estado_electronico');
          }
          if ('validate_proyecto' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'proyecto');
          }
          if ('validate_rubro' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'rubro');
          }
          if ('validate_categoria' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'categoria');
          }
          if ('validate_tipo_documento_atado' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'tipo_documento_atado');
          }
          if ('validate_numero_documento_atado' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'numero_documento_atado');
          }
          if ('validate_valor_superior_al_maximo' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'valor_superior_al_maximo');
          }
          if ('validate_distribucion_retencion' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'distribucion_retencion');
          }
          form_movpag_pack_ajax_response();
          exit;
      }
      if (isset($this->sc_inline_call) && 'Y' == $this->sc_inline_call)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['inline_form_seq'] = $this->sc_seq_row;
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
              form_movpag_pack_ajax_response();
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
          $_SESSION['scriptcase']['form_movpag']['contr_erro'] = 'off';
          if ($Campos_Crit != "") 
          {
              $Campos_Crit = $this->Ini->Nm_lang['lang_errm_flds'] . ' ' . $Campos_Crit ; 
          }
          if ($Campos_Crit != "" || !empty($Campos_Falta) || $this->Campos_Mens_erro != "")
          {
              if ($this->NM_ajax_flag)
              {
                  form_movpag_pack_ajax_response();
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
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['recarga'] = $this->nmgp_opcao;
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['sc_redir_insert']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['sc_redir_insert'] == "ok")
          {
              if ($this->sc_evento == "insert" || ($this->nmgp_opc_ant == "novo" && $this->nmgp_opcao == "novo" && $this->sc_evento == "novo"))
              {
                  $this->NM_close_db(); 
                  $this->nmgp_redireciona(2); 
              }
          }
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['sc_redir_atualiz']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['sc_redir_atualiz'] == "ok")
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
          form_movpag_pack_ajax_response();
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
          form_movpag_pack_ajax_response();
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
          $Zip_name = "sc_prt_" . date("YmdHis") . "_" . rand(0, 1000) . "form_movpag.zip";
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
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag'][$path_doc_md5][0] = $Arq_htm;
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag'][$path_doc_md5][1] = $Zip_name;
?>
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE><?php echo strip_tags("" . $this->Ini->Nm_lang['lang_othr_frmu_title'] . " movpag") ?></TITLE>
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
<form name="Fdown" method="get" action="form_movpag_download.php" target="_self" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo $this->form_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="form_movpag"> 
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
           case 'codcte43':
               return "Codcte 43";
               break;
           case 'tipodoc43':
               return "Tipodoc 43";
               break;
           case 'numdoc43':
               return "Numdoc 43";
               break;
           case 'ocurren43':
               return "Ocurren 43";
               break;
           case 'cocte43':
               return "Cocte 43";
               break;
           case 'fecdoc43':
               return "Fecdoc 43";
               break;
           case 'tipdoc43':
               return "Tipdoc 43";
               break;
           case 'numvencob43':
               return "Numvencob 43";
               break;
           case 'fedoc43':
               return "Fedoc 43";
               break;
           case 'totdoc43':
               return "Totdoc 43";
               break;
           case 'detalle43':
               return "Detalle 43";
               break;
           case 'cvanioant43':
               return "Cvanioant 43";
               break;
           case 'cvdivisa43':
               return "Cvdivisa 43";
               break;
           case 'valdivisa43':
               return "Valdivisa 43";
               break;
           case 'valdivisaori43':
               return "Valdivisaori 43";
               break;
           case 'factcompra43':
               return "Factcompra 43";
               break;
           case 'seriecompra43':
               return "Seriecompra 43";
               break;
           case 'autocompra43':
               return "Autocompra 43";
               break;
           case 'codret43':
               return "Codret 43";
               break;
           case 'valini43':
               return "Valini 43";
               break;
           case 'numcuotasord43':
               return "Numcuotasord 43";
               break;
           case 'valormov43':
               return "Valormov 43";
               break;
           case 'saldoregmov43':
               return "Saldoregmov 43";
               break;
           case 'feccobro43':
               return "Feccobro 43";
               break;
           case 'codpagounif43':
               return "Codpagounif 43";
               break;
           case 'tipodocdb43':
               return "Tipodocdb 43";
               break;
           case 'numdocdb43':
               return "Numdocdb 43";
               break;
           case 'ocurrecdocdb43':
               return "Ocurrecdocdb 43";
               break;
           case 'numrecibo43':
               return "Numrecibo 43";
               break;
           case 'valorabono43':
               return "Valorabono 43";
               break;
           case 'efectcheque43':
               return "Efectcheque 43";
               break;
           case 'saldoexceso43':
               return "Saldoexceso 43";
               break;
           case 'saldocte43':
               return "Saldocte 43";
               break;
           case 'codpago43':
               return "Codpago 43";
               break;
           case 'numdocpago43':
               return "Numdocpago 43";
               break;
           case 'obsdocpago43':
               return "Obsdocpago 43";
               break;
           case 'uid':
               return "UID";
               break;
           case 'cvtransfer43':
               return "Cvtransfer 43";
               break;
           case 'fectransfer43':
               return "Fectransfer 43";
               break;
           case 'tipoimp43':
               return "Tipoimp 43";
               break;
           case 'porcimp43':
               return "Porcimp 43";
               break;
           case 'bienserv43':
               return "Bienserv 43";
               break;
           case 'credgast43':
               return "Credgast 43";
               break;
           case 'fecvencompra43':
               return "Fecvencompra 43";
               break;
           case 'fecvenret43':
               return "Fecvenret 43";
               break;
           case 'numautoret43':
               return "Numautoret 43";
               break;
           case 'sdoexeact43':
               return "Sdoexeact 43";
               break;
           case 'sdoregact43':
               return "Sdoregact 43";
               break;
           case 'conta43':
               return "Conta 43";
               break;
           case 'cvanulado43':
               return "Cvanulado 43";
               break;
           case 'baseret43':
               return "Baseret 43";
               break;
           case 'ret_con_iva43':
               return "Ret Con Iva 43";
               break;
           case 'retenciones43':
               return "Retenciones 43";
               break;
           case 'idb':
               return "IDB";
               break;
           case 'tipocomptehis':
               return "Tipocomptehis";
               break;
           case 'banco':
               return "Banco";
               break;
           case 'numero_transferencia':
               return "Numero Transferencia";
               break;
           case 'estado_electronico':
               return "Estado Electronico";
               break;
           case 'proyecto':
               return "Proyecto";
               break;
           case 'rubro':
               return "Rubro";
               break;
           case 'categoria':
               return "Categoria";
               break;
           case 'tipo_documento_atado':
               return "Tipo Documento Atado";
               break;
           case 'numero_documento_atado':
               return "Numero Documento Atado";
               break;
           case 'valor_superior_al_maximo':
               return "Valor Superior Al Maximo";
               break;
           case 'distribucion_retencion':
               return "Distribucion Retencion";
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
              if (!isset($this->NM_ajax_info['errList']['geral_form_movpag']) || !is_array($this->NM_ajax_info['errList']['geral_form_movpag']))
              {
                  $this->NM_ajax_info['errList']['geral_form_movpag'] = array();
              }
              $this->NM_ajax_info['errList']['geral_form_movpag'][] = "CSRF: " . $this->Ini->Nm_lang['lang_errm_ajax_csrf'];
          }
     }
      if ((!is_array($filtro) && ('' == $filtro || 'codcte43' == $filtro)) || (is_array($filtro) && in_array('codcte43', $filtro)))
        $this->ValidateField_codcte43($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'tipodoc43' == $filtro)) || (is_array($filtro) && in_array('tipodoc43', $filtro)))
        $this->ValidateField_tipodoc43($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'numdoc43' == $filtro)) || (is_array($filtro) && in_array('numdoc43', $filtro)))
        $this->ValidateField_numdoc43($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'ocurren43' == $filtro)) || (is_array($filtro) && in_array('ocurren43', $filtro)))
        $this->ValidateField_ocurren43($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'cocte43' == $filtro)) || (is_array($filtro) && in_array('cocte43', $filtro)))
        $this->ValidateField_cocte43($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'fecdoc43' == $filtro)) || (is_array($filtro) && in_array('fecdoc43', $filtro)))
        $this->ValidateField_fecdoc43($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'tipdoc43' == $filtro)) || (is_array($filtro) && in_array('tipdoc43', $filtro)))
        $this->ValidateField_tipdoc43($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'numvencob43' == $filtro)) || (is_array($filtro) && in_array('numvencob43', $filtro)))
        $this->ValidateField_numvencob43($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'fedoc43' == $filtro)) || (is_array($filtro) && in_array('fedoc43', $filtro)))
        $this->ValidateField_fedoc43($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'totdoc43' == $filtro)) || (is_array($filtro) && in_array('totdoc43', $filtro)))
        $this->ValidateField_totdoc43($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'detalle43' == $filtro)) || (is_array($filtro) && in_array('detalle43', $filtro)))
        $this->ValidateField_detalle43($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'cvanioant43' == $filtro)) || (is_array($filtro) && in_array('cvanioant43', $filtro)))
        $this->ValidateField_cvanioant43($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'cvdivisa43' == $filtro)) || (is_array($filtro) && in_array('cvdivisa43', $filtro)))
        $this->ValidateField_cvdivisa43($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'valdivisa43' == $filtro)) || (is_array($filtro) && in_array('valdivisa43', $filtro)))
        $this->ValidateField_valdivisa43($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'valdivisaori43' == $filtro)) || (is_array($filtro) && in_array('valdivisaori43', $filtro)))
        $this->ValidateField_valdivisaori43($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'factcompra43' == $filtro)) || (is_array($filtro) && in_array('factcompra43', $filtro)))
        $this->ValidateField_factcompra43($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'seriecompra43' == $filtro)) || (is_array($filtro) && in_array('seriecompra43', $filtro)))
        $this->ValidateField_seriecompra43($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'autocompra43' == $filtro)) || (is_array($filtro) && in_array('autocompra43', $filtro)))
        $this->ValidateField_autocompra43($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'codret43' == $filtro)) || (is_array($filtro) && in_array('codret43', $filtro)))
        $this->ValidateField_codret43($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'valini43' == $filtro)) || (is_array($filtro) && in_array('valini43', $filtro)))
        $this->ValidateField_valini43($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'numcuotasord43' == $filtro)) || (is_array($filtro) && in_array('numcuotasord43', $filtro)))
        $this->ValidateField_numcuotasord43($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'valormov43' == $filtro)) || (is_array($filtro) && in_array('valormov43', $filtro)))
        $this->ValidateField_valormov43($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'saldoregmov43' == $filtro)) || (is_array($filtro) && in_array('saldoregmov43', $filtro)))
        $this->ValidateField_saldoregmov43($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'feccobro43' == $filtro)) || (is_array($filtro) && in_array('feccobro43', $filtro)))
        $this->ValidateField_feccobro43($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'codpagounif43' == $filtro)) || (is_array($filtro) && in_array('codpagounif43', $filtro)))
        $this->ValidateField_codpagounif43($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'tipodocdb43' == $filtro)) || (is_array($filtro) && in_array('tipodocdb43', $filtro)))
        $this->ValidateField_tipodocdb43($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'numdocdb43' == $filtro)) || (is_array($filtro) && in_array('numdocdb43', $filtro)))
        $this->ValidateField_numdocdb43($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'ocurrecdocdb43' == $filtro)) || (is_array($filtro) && in_array('ocurrecdocdb43', $filtro)))
        $this->ValidateField_ocurrecdocdb43($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'numrecibo43' == $filtro)) || (is_array($filtro) && in_array('numrecibo43', $filtro)))
        $this->ValidateField_numrecibo43($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'valorabono43' == $filtro)) || (is_array($filtro) && in_array('valorabono43', $filtro)))
        $this->ValidateField_valorabono43($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'efectcheque43' == $filtro)) || (is_array($filtro) && in_array('efectcheque43', $filtro)))
        $this->ValidateField_efectcheque43($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'saldoexceso43' == $filtro)) || (is_array($filtro) && in_array('saldoexceso43', $filtro)))
        $this->ValidateField_saldoexceso43($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'saldocte43' == $filtro)) || (is_array($filtro) && in_array('saldocte43', $filtro)))
        $this->ValidateField_saldocte43($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'codpago43' == $filtro)) || (is_array($filtro) && in_array('codpago43', $filtro)))
        $this->ValidateField_codpago43($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'numdocpago43' == $filtro)) || (is_array($filtro) && in_array('numdocpago43', $filtro)))
        $this->ValidateField_numdocpago43($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'obsdocpago43' == $filtro)) || (is_array($filtro) && in_array('obsdocpago43', $filtro)))
        $this->ValidateField_obsdocpago43($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'uid' == $filtro)) || (is_array($filtro) && in_array('uid', $filtro)))
        $this->ValidateField_uid($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'cvtransfer43' == $filtro)) || (is_array($filtro) && in_array('cvtransfer43', $filtro)))
        $this->ValidateField_cvtransfer43($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'fectransfer43' == $filtro)) || (is_array($filtro) && in_array('fectransfer43', $filtro)))
        $this->ValidateField_fectransfer43($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'tipoimp43' == $filtro)) || (is_array($filtro) && in_array('tipoimp43', $filtro)))
        $this->ValidateField_tipoimp43($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'porcimp43' == $filtro)) || (is_array($filtro) && in_array('porcimp43', $filtro)))
        $this->ValidateField_porcimp43($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'bienserv43' == $filtro)) || (is_array($filtro) && in_array('bienserv43', $filtro)))
        $this->ValidateField_bienserv43($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'credgast43' == $filtro)) || (is_array($filtro) && in_array('credgast43', $filtro)))
        $this->ValidateField_credgast43($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'fecvencompra43' == $filtro)) || (is_array($filtro) && in_array('fecvencompra43', $filtro)))
        $this->ValidateField_fecvencompra43($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'fecvenret43' == $filtro)) || (is_array($filtro) && in_array('fecvenret43', $filtro)))
        $this->ValidateField_fecvenret43($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'numautoret43' == $filtro)) || (is_array($filtro) && in_array('numautoret43', $filtro)))
        $this->ValidateField_numautoret43($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'sdoexeact43' == $filtro)) || (is_array($filtro) && in_array('sdoexeact43', $filtro)))
        $this->ValidateField_sdoexeact43($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'sdoregact43' == $filtro)) || (is_array($filtro) && in_array('sdoregact43', $filtro)))
        $this->ValidateField_sdoregact43($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'conta43' == $filtro)) || (is_array($filtro) && in_array('conta43', $filtro)))
        $this->ValidateField_conta43($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'cvanulado43' == $filtro)) || (is_array($filtro) && in_array('cvanulado43', $filtro)))
        $this->ValidateField_cvanulado43($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'baseret43' == $filtro)) || (is_array($filtro) && in_array('baseret43', $filtro)))
        $this->ValidateField_baseret43($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'ret_con_iva43' == $filtro)) || (is_array($filtro) && in_array('ret_con_iva43', $filtro)))
        $this->ValidateField_ret_con_iva43($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'retenciones43' == $filtro)) || (is_array($filtro) && in_array('retenciones43', $filtro)))
        $this->ValidateField_retenciones43($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'idb' == $filtro)) || (is_array($filtro) && in_array('idb', $filtro)))
        $this->ValidateField_idb($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'tipocomptehis' == $filtro)) || (is_array($filtro) && in_array('tipocomptehis', $filtro)))
        $this->ValidateField_tipocomptehis($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'banco' == $filtro)) || (is_array($filtro) && in_array('banco', $filtro)))
        $this->ValidateField_banco($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'numero_transferencia' == $filtro)) || (is_array($filtro) && in_array('numero_transferencia', $filtro)))
        $this->ValidateField_numero_transferencia($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'estado_electronico' == $filtro)) || (is_array($filtro) && in_array('estado_electronico', $filtro)))
        $this->ValidateField_estado_electronico($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'proyecto' == $filtro)) || (is_array($filtro) && in_array('proyecto', $filtro)))
        $this->ValidateField_proyecto($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'rubro' == $filtro)) || (is_array($filtro) && in_array('rubro', $filtro)))
        $this->ValidateField_rubro($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'categoria' == $filtro)) || (is_array($filtro) && in_array('categoria', $filtro)))
        $this->ValidateField_categoria($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'tipo_documento_atado' == $filtro)) || (is_array($filtro) && in_array('tipo_documento_atado', $filtro)))
        $this->ValidateField_tipo_documento_atado($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'numero_documento_atado' == $filtro)) || (is_array($filtro) && in_array('numero_documento_atado', $filtro)))
        $this->ValidateField_numero_documento_atado($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'valor_superior_al_maximo' == $filtro)) || (is_array($filtro) && in_array('valor_superior_al_maximo', $filtro)))
        $this->ValidateField_valor_superior_al_maximo($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'distribucion_retencion' == $filtro)) || (is_array($filtro) && in_array('distribucion_retencion', $filtro)))
        $this->ValidateField_distribucion_retencion($Campos_Crit, $Campos_Falta, $Campos_Erros);
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

    function ValidateField_codcte43(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['php_cmp_required']['codcte43']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['php_cmp_required']['codcte43'] == "on")) 
      { 
          if ($this->codcte43 == "")  
          { 
              $hasError = true;
              $Campos_Falta[] =  "Codcte 43" ; 
              if (!isset($Campos_Erros['codcte43']))
              {
                  $Campos_Erros['codcte43'] = array();
              }
              $Campos_Erros['codcte43'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['codcte43']) || !is_array($this->NM_ajax_info['errList']['codcte43']))
                  {
                      $this->NM_ajax_info['errList']['codcte43'] = array();
                  }
                  $this->NM_ajax_info['errList']['codcte43'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          } 
      } 
      if ($this->nmgp_opcao == "incluir")
      { 
          if (NM_utf8_strlen($this->codcte43) > 15) 
          { 
              $hasError = true;
              $Campos_Crit .= "Codcte 43 " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 15 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['codcte43']))
              {
                  $Campos_Erros['codcte43'] = array();
              }
              $Campos_Erros['codcte43'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 15 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['codcte43']) || !is_array($this->NM_ajax_info['errList']['codcte43']))
              {
                  $this->NM_ajax_info['errList']['codcte43'] = array();
              }
              $this->NM_ajax_info['errList']['codcte43'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 15 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'codcte43';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_codcte43

    function ValidateField_tipodoc43(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['php_cmp_required']['tipodoc43']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['php_cmp_required']['tipodoc43'] == "on")) 
      { 
          if ($this->tipodoc43 == "")  
          { 
              $hasError = true;
              $Campos_Falta[] =  "Tipodoc 43" ; 
              if (!isset($Campos_Erros['tipodoc43']))
              {
                  $Campos_Erros['tipodoc43'] = array();
              }
              $Campos_Erros['tipodoc43'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['tipodoc43']) || !is_array($this->NM_ajax_info['errList']['tipodoc43']))
                  {
                      $this->NM_ajax_info['errList']['tipodoc43'] = array();
                  }
                  $this->NM_ajax_info['errList']['tipodoc43'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          } 
      } 
      if ($this->nmgp_opcao == "incluir")
      { 
          if (NM_utf8_strlen($this->tipodoc43) > 4) 
          { 
              $hasError = true;
              $Campos_Crit .= "Tipodoc 43 " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 4 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['tipodoc43']))
              {
                  $Campos_Erros['tipodoc43'] = array();
              }
              $Campos_Erros['tipodoc43'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 4 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['tipodoc43']) || !is_array($this->NM_ajax_info['errList']['tipodoc43']))
              {
                  $this->NM_ajax_info['errList']['tipodoc43'] = array();
              }
              $this->NM_ajax_info['errList']['tipodoc43'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 4 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'tipodoc43';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_tipodoc43

    function ValidateField_numdoc43(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['php_cmp_required']['numdoc43']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['php_cmp_required']['numdoc43'] == "on")) 
      { 
          if ($this->numdoc43 == "")  
          { 
              $hasError = true;
              $Campos_Falta[] =  "Numdoc 43" ; 
              if (!isset($Campos_Erros['numdoc43']))
              {
                  $Campos_Erros['numdoc43'] = array();
              }
              $Campos_Erros['numdoc43'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['numdoc43']) || !is_array($this->NM_ajax_info['errList']['numdoc43']))
                  {
                      $this->NM_ajax_info['errList']['numdoc43'] = array();
                  }
                  $this->NM_ajax_info['errList']['numdoc43'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          } 
      } 
      if ($this->nmgp_opcao == "incluir")
      { 
          if (NM_utf8_strlen($this->numdoc43) > 20) 
          { 
              $hasError = true;
              $Campos_Crit .= "Numdoc 43 " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['numdoc43']))
              {
                  $Campos_Erros['numdoc43'] = array();
              }
              $Campos_Erros['numdoc43'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['numdoc43']) || !is_array($this->NM_ajax_info['errList']['numdoc43']))
              {
                  $this->NM_ajax_info['errList']['numdoc43'] = array();
              }
              $this->NM_ajax_info['errList']['numdoc43'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'numdoc43';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_numdoc43

    function ValidateField_ocurren43(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['php_cmp_required']['ocurren43']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['php_cmp_required']['ocurren43'] == "on")) 
      { 
          if ($this->ocurren43 == "")  
          { 
              $hasError = true;
              $Campos_Falta[] =  "Ocurren 43" ; 
              if (!isset($Campos_Erros['ocurren43']))
              {
                  $Campos_Erros['ocurren43'] = array();
              }
              $Campos_Erros['ocurren43'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['ocurren43']) || !is_array($this->NM_ajax_info['errList']['ocurren43']))
                  {
                      $this->NM_ajax_info['errList']['ocurren43'] = array();
                  }
                  $this->NM_ajax_info['errList']['ocurren43'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          } 
      } 
      if ($this->nmgp_opcao == "incluir")
      { 
          if (NM_utf8_strlen($this->ocurren43) > 4) 
          { 
              $hasError = true;
              $Campos_Crit .= "Ocurren 43 " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 4 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['ocurren43']))
              {
                  $Campos_Erros['ocurren43'] = array();
              }
              $Campos_Erros['ocurren43'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 4 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['ocurren43']) || !is_array($this->NM_ajax_info['errList']['ocurren43']))
              {
                  $this->NM_ajax_info['errList']['ocurren43'] = array();
              }
              $this->NM_ajax_info['errList']['ocurren43'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 4 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'ocurren43';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_ocurren43

    function ValidateField_cocte43(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->cocte43) > 15) 
          { 
              $hasError = true;
              $Campos_Crit .= "Cocte 43 " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 15 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['cocte43']))
              {
                  $Campos_Erros['cocte43'] = array();
              }
              $Campos_Erros['cocte43'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 15 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['cocte43']) || !is_array($this->NM_ajax_info['errList']['cocte43']))
              {
                  $this->NM_ajax_info['errList']['cocte43'] = array();
              }
              $this->NM_ajax_info['errList']['cocte43'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 15 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'cocte43';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_cocte43

    function ValidateField_fecdoc43(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      nm_limpa_data($this->fecdoc43, $this->field_config['fecdoc43']['date_sep']) ; 
      $trab_dt_min = ""; 
      $trab_dt_max = ""; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          $guarda_datahora = $this->field_config['fecdoc43']['date_format']; 
          if (false !== strpos($guarda_datahora, ';')) $this->field_config['fecdoc43']['date_format'] = substr($guarda_datahora, 0, strpos($guarda_datahora, ';'));
          $Format_Data = $this->field_config['fecdoc43']['date_format']; 
          nm_limpa_data($Format_Data, $this->field_config['fecdoc43']['date_sep']) ; 
          if (trim($this->fecdoc43) != "")  
          { 
              if ($teste_validade->Data($this->fecdoc43, $Format_Data, $trab_dt_min, $trab_dt_max) == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Fecdoc 43; " ; 
                  if (!isset($Campos_Erros['fecdoc43']))
                  {
                      $Campos_Erros['fecdoc43'] = array();
                  }
                  $Campos_Erros['fecdoc43'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['fecdoc43']) || !is_array($this->NM_ajax_info['errList']['fecdoc43']))
                  {
                      $this->NM_ajax_info['errList']['fecdoc43'] = array();
                  }
                  $this->NM_ajax_info['errList']['fecdoc43'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
          $this->field_config['fecdoc43']['date_format'] = $guarda_datahora; 
       } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'fecdoc43';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
      nm_limpa_hora($this->fecdoc43_hora, $this->field_config['fecdoc43_hora']['time_sep']) ; 
      if ($this->nmgp_opcao != "excluir") 
      {
          $Format_Hora = $this->field_config['fecdoc43_hora']['date_format']; 
          nm_limpa_hora($Format_Hora, $this->field_config['fecdoc43_hora']['time_sep']) ; 
          if (trim($this->fecdoc43_hora) != "")  
          { 
              if ($teste_validade->Hora($this->fecdoc43_hora, $Format_Hora) == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Fecdoc 43; " ; 
                  if (!isset($Campos_Erros['fecdoc43_hora']))
                  {
                      $Campos_Erros['fecdoc43_hora'] = array();
                  }
                  $Campos_Erros['fecdoc43_hora'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['fecdoc43']) || !is_array($this->NM_ajax_info['errList']['fecdoc43']))
                  {
                      $this->NM_ajax_info['errList']['fecdoc43'] = array();
                  }
                  $this->NM_ajax_info['errList']['fecdoc43'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
      if (isset($Campos_Erros['fecdoc43']) && isset($Campos_Erros['fecdoc43_hora']))
      {
          $this->removeDuplicateDttmError($Campos_Erros['fecdoc43'], $Campos_Erros['fecdoc43_hora']);
          if (empty($Campos_Erros['fecdoc43_hora']))
          {
              unset($Campos_Erros['fecdoc43_hora']);
          }
          if (isset($this->NM_ajax_info['errList']['fecdoc43']))
          {
              $this->NM_ajax_info['errList']['fecdoc43'] = array_unique($this->NM_ajax_info['errList']['fecdoc43']);
          }
      }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'fecdoc43_hora';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_fecdoc43_hora

    function ValidateField_tipdoc43(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->tipdoc43) > 4) 
          { 
              $hasError = true;
              $Campos_Crit .= "Tipdoc 43 " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 4 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['tipdoc43']))
              {
                  $Campos_Erros['tipdoc43'] = array();
              }
              $Campos_Erros['tipdoc43'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 4 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['tipdoc43']) || !is_array($this->NM_ajax_info['errList']['tipdoc43']))
              {
                  $this->NM_ajax_info['errList']['tipdoc43'] = array();
              }
              $this->NM_ajax_info['errList']['tipdoc43'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 4 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'tipdoc43';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_tipdoc43

    function ValidateField_numvencob43(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->numvencob43) > 4) 
          { 
              $hasError = true;
              $Campos_Crit .= "Numvencob 43 " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 4 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['numvencob43']))
              {
                  $Campos_Erros['numvencob43'] = array();
              }
              $Campos_Erros['numvencob43'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 4 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['numvencob43']) || !is_array($this->NM_ajax_info['errList']['numvencob43']))
              {
                  $this->NM_ajax_info['errList']['numvencob43'] = array();
              }
              $this->NM_ajax_info['errList']['numvencob43'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 4 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'numvencob43';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_numvencob43

    function ValidateField_fedoc43(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      nm_limpa_data($this->fedoc43, $this->field_config['fedoc43']['date_sep']) ; 
      $trab_dt_min = ""; 
      $trab_dt_max = ""; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          $guarda_datahora = $this->field_config['fedoc43']['date_format']; 
          if (false !== strpos($guarda_datahora, ';')) $this->field_config['fedoc43']['date_format'] = substr($guarda_datahora, 0, strpos($guarda_datahora, ';'));
          $Format_Data = $this->field_config['fedoc43']['date_format']; 
          nm_limpa_data($Format_Data, $this->field_config['fedoc43']['date_sep']) ; 
          if (trim($this->fedoc43) != "")  
          { 
              if ($teste_validade->Data($this->fedoc43, $Format_Data, $trab_dt_min, $trab_dt_max) == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Fedoc 43; " ; 
                  if (!isset($Campos_Erros['fedoc43']))
                  {
                      $Campos_Erros['fedoc43'] = array();
                  }
                  $Campos_Erros['fedoc43'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['fedoc43']) || !is_array($this->NM_ajax_info['errList']['fedoc43']))
                  {
                      $this->NM_ajax_info['errList']['fedoc43'] = array();
                  }
                  $this->NM_ajax_info['errList']['fedoc43'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
          $this->field_config['fedoc43']['date_format'] = $guarda_datahora; 
       } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'fedoc43';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
      nm_limpa_hora($this->fedoc43_hora, $this->field_config['fedoc43_hora']['time_sep']) ; 
      if ($this->nmgp_opcao != "excluir") 
      {
          $Format_Hora = $this->field_config['fedoc43_hora']['date_format']; 
          nm_limpa_hora($Format_Hora, $this->field_config['fedoc43_hora']['time_sep']) ; 
          if (trim($this->fedoc43_hora) != "")  
          { 
              if ($teste_validade->Hora($this->fedoc43_hora, $Format_Hora) == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Fedoc 43; " ; 
                  if (!isset($Campos_Erros['fedoc43_hora']))
                  {
                      $Campos_Erros['fedoc43_hora'] = array();
                  }
                  $Campos_Erros['fedoc43_hora'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['fedoc43']) || !is_array($this->NM_ajax_info['errList']['fedoc43']))
                  {
                      $this->NM_ajax_info['errList']['fedoc43'] = array();
                  }
                  $this->NM_ajax_info['errList']['fedoc43'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
      if (isset($Campos_Erros['fedoc43']) && isset($Campos_Erros['fedoc43_hora']))
      {
          $this->removeDuplicateDttmError($Campos_Erros['fedoc43'], $Campos_Erros['fedoc43_hora']);
          if (empty($Campos_Erros['fedoc43_hora']))
          {
              unset($Campos_Erros['fedoc43_hora']);
          }
          if (isset($this->NM_ajax_info['errList']['fedoc43']))
          {
              $this->NM_ajax_info['errList']['fedoc43'] = array_unique($this->NM_ajax_info['errList']['fedoc43']);
          }
      }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'fedoc43_hora';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_fedoc43_hora

    function ValidateField_totdoc43(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->totdoc43 === "" || is_null($this->totdoc43))  
      { 
          $this->totdoc43 = 0;
          $this->sc_force_zero[] = 'totdoc43';
      } 
      if (!empty($this->field_config['totdoc43']['symbol_dec']))
      {
          $this->sc_remove_currency($this->totdoc43, $this->field_config['totdoc43']['symbol_dec'], $this->field_config['totdoc43']['symbol_grp'], $this->field_config['totdoc43']['symbol_mon']); 
          nm_limpa_valor($this->totdoc43, $this->field_config['totdoc43']['symbol_dec'], $this->field_config['totdoc43']['symbol_grp']) ; 
          if ('.' == substr($this->totdoc43, 0, 1))
          {
              if ('' == str_replace('0', '', substr($this->totdoc43, 1)))
              {
                  $this->totdoc43 = '';
              }
              else
              {
                  $this->totdoc43 = '0' . $this->totdoc43;
              }
          }
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->totdoc43 != '')  
          { 
              $iTestSize = 19;
              if (strlen($this->totdoc43) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Totdoc 43: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['totdoc43']))
                  {
                      $Campos_Erros['totdoc43'] = array();
                  }
                  $Campos_Erros['totdoc43'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['totdoc43']) || !is_array($this->NM_ajax_info['errList']['totdoc43']))
                  {
                      $this->NM_ajax_info['errList']['totdoc43'] = array();
                  }
                  $this->NM_ajax_info['errList']['totdoc43'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->totdoc43, 16, 2, 0, 0, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Totdoc 43; " ; 
                  if (!isset($Campos_Erros['totdoc43']))
                  {
                      $Campos_Erros['totdoc43'] = array();
                  }
                  $Campos_Erros['totdoc43'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['totdoc43']) || !is_array($this->NM_ajax_info['errList']['totdoc43']))
                  {
                      $this->NM_ajax_info['errList']['totdoc43'] = array();
                  }
                  $this->NM_ajax_info['errList']['totdoc43'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'totdoc43';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_totdoc43

    function ValidateField_detalle43(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->detalle43) > 255) 
          { 
              $hasError = true;
              $Campos_Crit .= "Detalle 43 " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 255 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['detalle43']))
              {
                  $Campos_Erros['detalle43'] = array();
              }
              $Campos_Erros['detalle43'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 255 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['detalle43']) || !is_array($this->NM_ajax_info['errList']['detalle43']))
              {
                  $this->NM_ajax_info['errList']['detalle43'] = array();
              }
              $this->NM_ajax_info['errList']['detalle43'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 255 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'detalle43';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_detalle43

    function ValidateField_cvanioant43(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->cvanioant43) > 1) 
          { 
              $hasError = true;
              $Campos_Crit .= "Cvanioant 43 " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 1 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['cvanioant43']))
              {
                  $Campos_Erros['cvanioant43'] = array();
              }
              $Campos_Erros['cvanioant43'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 1 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['cvanioant43']) || !is_array($this->NM_ajax_info['errList']['cvanioant43']))
              {
                  $this->NM_ajax_info['errList']['cvanioant43'] = array();
              }
              $this->NM_ajax_info['errList']['cvanioant43'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 1 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'cvanioant43';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_cvanioant43

    function ValidateField_cvdivisa43(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->cvdivisa43) > 1) 
          { 
              $hasError = true;
              $Campos_Crit .= "Cvdivisa 43 " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 1 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['cvdivisa43']))
              {
                  $Campos_Erros['cvdivisa43'] = array();
              }
              $Campos_Erros['cvdivisa43'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 1 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['cvdivisa43']) || !is_array($this->NM_ajax_info['errList']['cvdivisa43']))
              {
                  $this->NM_ajax_info['errList']['cvdivisa43'] = array();
              }
              $this->NM_ajax_info['errList']['cvdivisa43'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 1 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'cvdivisa43';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_cvdivisa43

    function ValidateField_valdivisa43(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->valdivisa43 === "" || is_null($this->valdivisa43))  
      { 
          $this->valdivisa43 = 0;
          $this->sc_force_zero[] = 'valdivisa43';
      } 
      nm_limpa_numero($this->valdivisa43, $this->field_config['valdivisa43']['symbol_grp']) ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->valdivisa43 != '')  
          { 
              $iTestSize = 10;
              if (strlen($this->valdivisa43) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Valdivisa 43: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['valdivisa43']))
                  {
                      $Campos_Erros['valdivisa43'] = array();
                  }
                  $Campos_Erros['valdivisa43'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['valdivisa43']) || !is_array($this->NM_ajax_info['errList']['valdivisa43']))
                  {
                      $this->NM_ajax_info['errList']['valdivisa43'] = array();
                  }
                  $this->NM_ajax_info['errList']['valdivisa43'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->valdivisa43, 10, 0, 0, 0, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Valdivisa 43; " ; 
                  if (!isset($Campos_Erros['valdivisa43']))
                  {
                      $Campos_Erros['valdivisa43'] = array();
                  }
                  $Campos_Erros['valdivisa43'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['valdivisa43']) || !is_array($this->NM_ajax_info['errList']['valdivisa43']))
                  {
                      $this->NM_ajax_info['errList']['valdivisa43'] = array();
                  }
                  $this->NM_ajax_info['errList']['valdivisa43'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'valdivisa43';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_valdivisa43

    function ValidateField_valdivisaori43(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->valdivisaori43 === "" || is_null($this->valdivisaori43))  
      { 
          $this->valdivisaori43 = 0;
          $this->sc_force_zero[] = 'valdivisaori43';
      } 
      nm_limpa_numero($this->valdivisaori43, $this->field_config['valdivisaori43']['symbol_grp']) ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->valdivisaori43 != '')  
          { 
              $iTestSize = 10;
              if (strlen($this->valdivisaori43) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Valdivisaori 43: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['valdivisaori43']))
                  {
                      $Campos_Erros['valdivisaori43'] = array();
                  }
                  $Campos_Erros['valdivisaori43'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['valdivisaori43']) || !is_array($this->NM_ajax_info['errList']['valdivisaori43']))
                  {
                      $this->NM_ajax_info['errList']['valdivisaori43'] = array();
                  }
                  $this->NM_ajax_info['errList']['valdivisaori43'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->valdivisaori43, 10, 0, 0, 0, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Valdivisaori 43; " ; 
                  if (!isset($Campos_Erros['valdivisaori43']))
                  {
                      $Campos_Erros['valdivisaori43'] = array();
                  }
                  $Campos_Erros['valdivisaori43'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['valdivisaori43']) || !is_array($this->NM_ajax_info['errList']['valdivisaori43']))
                  {
                      $this->NM_ajax_info['errList']['valdivisaori43'] = array();
                  }
                  $this->NM_ajax_info['errList']['valdivisaori43'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'valdivisaori43';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_valdivisaori43

    function ValidateField_factcompra43(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->factcompra43) > 20) 
          { 
              $hasError = true;
              $Campos_Crit .= "Factcompra 43 " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['factcompra43']))
              {
                  $Campos_Erros['factcompra43'] = array();
              }
              $Campos_Erros['factcompra43'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['factcompra43']) || !is_array($this->NM_ajax_info['errList']['factcompra43']))
              {
                  $this->NM_ajax_info['errList']['factcompra43'] = array();
              }
              $this->NM_ajax_info['errList']['factcompra43'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'factcompra43';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_factcompra43

    function ValidateField_seriecompra43(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->seriecompra43) > 8) 
          { 
              $hasError = true;
              $Campos_Crit .= "Seriecompra 43 " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 8 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['seriecompra43']))
              {
                  $Campos_Erros['seriecompra43'] = array();
              }
              $Campos_Erros['seriecompra43'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 8 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['seriecompra43']) || !is_array($this->NM_ajax_info['errList']['seriecompra43']))
              {
                  $this->NM_ajax_info['errList']['seriecompra43'] = array();
              }
              $this->NM_ajax_info['errList']['seriecompra43'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 8 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'seriecompra43';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_seriecompra43

    function ValidateField_autocompra43(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->autocompra43) > 49) 
          { 
              $hasError = true;
              $Campos_Crit .= "Autocompra 43 " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 49 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['autocompra43']))
              {
                  $Campos_Erros['autocompra43'] = array();
              }
              $Campos_Erros['autocompra43'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 49 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['autocompra43']) || !is_array($this->NM_ajax_info['errList']['autocompra43']))
              {
                  $this->NM_ajax_info['errList']['autocompra43'] = array();
              }
              $this->NM_ajax_info['errList']['autocompra43'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 49 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'autocompra43';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_autocompra43

    function ValidateField_codret43(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->codret43) > 15) 
          { 
              $hasError = true;
              $Campos_Crit .= "Codret 43 " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 15 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['codret43']))
              {
                  $Campos_Erros['codret43'] = array();
              }
              $Campos_Erros['codret43'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 15 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['codret43']) || !is_array($this->NM_ajax_info['errList']['codret43']))
              {
                  $this->NM_ajax_info['errList']['codret43'] = array();
              }
              $this->NM_ajax_info['errList']['codret43'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 15 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'codret43';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_codret43

    function ValidateField_valini43(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->valini43 === "" || is_null($this->valini43))  
      { 
          $this->valini43 = 0;
          $this->sc_force_zero[] = 'valini43';
      } 
      if (!empty($this->field_config['valini43']['symbol_dec']))
      {
          $this->sc_remove_currency($this->valini43, $this->field_config['valini43']['symbol_dec'], $this->field_config['valini43']['symbol_grp'], $this->field_config['valini43']['symbol_mon']); 
          nm_limpa_valor($this->valini43, $this->field_config['valini43']['symbol_dec'], $this->field_config['valini43']['symbol_grp']) ; 
          if ('.' == substr($this->valini43, 0, 1))
          {
              if ('' == str_replace('0', '', substr($this->valini43, 1)))
              {
                  $this->valini43 = '';
              }
              else
              {
                  $this->valini43 = '0' . $this->valini43;
              }
          }
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->valini43 != '')  
          { 
              $iTestSize = 19;
              if (strlen($this->valini43) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Valini 43: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['valini43']))
                  {
                      $Campos_Erros['valini43'] = array();
                  }
                  $Campos_Erros['valini43'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['valini43']) || !is_array($this->NM_ajax_info['errList']['valini43']))
                  {
                      $this->NM_ajax_info['errList']['valini43'] = array();
                  }
                  $this->NM_ajax_info['errList']['valini43'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->valini43, 16, 2, 0, 0, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Valini 43; " ; 
                  if (!isset($Campos_Erros['valini43']))
                  {
                      $Campos_Erros['valini43'] = array();
                  }
                  $Campos_Erros['valini43'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['valini43']) || !is_array($this->NM_ajax_info['errList']['valini43']))
                  {
                      $this->NM_ajax_info['errList']['valini43'] = array();
                  }
                  $this->NM_ajax_info['errList']['valini43'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'valini43';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_valini43

    function ValidateField_numcuotasord43(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->numcuotasord43) > 255) 
          { 
              $hasError = true;
              $Campos_Crit .= "Numcuotasord 43 " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 255 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['numcuotasord43']))
              {
                  $Campos_Erros['numcuotasord43'] = array();
              }
              $Campos_Erros['numcuotasord43'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 255 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['numcuotasord43']) || !is_array($this->NM_ajax_info['errList']['numcuotasord43']))
              {
                  $this->NM_ajax_info['errList']['numcuotasord43'] = array();
              }
              $this->NM_ajax_info['errList']['numcuotasord43'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 255 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'numcuotasord43';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_numcuotasord43

    function ValidateField_valormov43(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->valormov43 === "" || is_null($this->valormov43))  
      { 
          $this->valormov43 = 0;
          $this->sc_force_zero[] = 'valormov43';
      } 
      if (!empty($this->field_config['valormov43']['symbol_dec']))
      {
          $this->sc_remove_currency($this->valormov43, $this->field_config['valormov43']['symbol_dec'], $this->field_config['valormov43']['symbol_grp'], $this->field_config['valormov43']['symbol_mon']); 
          nm_limpa_valor($this->valormov43, $this->field_config['valormov43']['symbol_dec'], $this->field_config['valormov43']['symbol_grp']) ; 
          if ('.' == substr($this->valormov43, 0, 1))
          {
              if ('' == str_replace('0', '', substr($this->valormov43, 1)))
              {
                  $this->valormov43 = '';
              }
              else
              {
                  $this->valormov43 = '0' . $this->valormov43;
              }
          }
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->valormov43 != '')  
          { 
              $iTestSize = 19;
              if (strlen($this->valormov43) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Valormov 43: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['valormov43']))
                  {
                      $Campos_Erros['valormov43'] = array();
                  }
                  $Campos_Erros['valormov43'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['valormov43']) || !is_array($this->NM_ajax_info['errList']['valormov43']))
                  {
                      $this->NM_ajax_info['errList']['valormov43'] = array();
                  }
                  $this->NM_ajax_info['errList']['valormov43'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->valormov43, 16, 2, 0, 0, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Valormov 43; " ; 
                  if (!isset($Campos_Erros['valormov43']))
                  {
                      $Campos_Erros['valormov43'] = array();
                  }
                  $Campos_Erros['valormov43'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['valormov43']) || !is_array($this->NM_ajax_info['errList']['valormov43']))
                  {
                      $this->NM_ajax_info['errList']['valormov43'] = array();
                  }
                  $this->NM_ajax_info['errList']['valormov43'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'valormov43';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_valormov43

    function ValidateField_saldoregmov43(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->saldoregmov43 === "" || is_null($this->saldoregmov43))  
      { 
          $this->saldoregmov43 = 0;
          $this->sc_force_zero[] = 'saldoregmov43';
      } 
      if (!empty($this->field_config['saldoregmov43']['symbol_dec']))
      {
          $this->sc_remove_currency($this->saldoregmov43, $this->field_config['saldoregmov43']['symbol_dec'], $this->field_config['saldoregmov43']['symbol_grp'], $this->field_config['saldoregmov43']['symbol_mon']); 
          nm_limpa_valor($this->saldoregmov43, $this->field_config['saldoregmov43']['symbol_dec'], $this->field_config['saldoregmov43']['symbol_grp']) ; 
          if ('.' == substr($this->saldoregmov43, 0, 1))
          {
              if ('' == str_replace('0', '', substr($this->saldoregmov43, 1)))
              {
                  $this->saldoregmov43 = '';
              }
              else
              {
                  $this->saldoregmov43 = '0' . $this->saldoregmov43;
              }
          }
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->saldoregmov43 != '')  
          { 
              $iTestSize = 19;
              if (strlen($this->saldoregmov43) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Saldoregmov 43: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['saldoregmov43']))
                  {
                      $Campos_Erros['saldoregmov43'] = array();
                  }
                  $Campos_Erros['saldoregmov43'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['saldoregmov43']) || !is_array($this->NM_ajax_info['errList']['saldoregmov43']))
                  {
                      $this->NM_ajax_info['errList']['saldoregmov43'] = array();
                  }
                  $this->NM_ajax_info['errList']['saldoregmov43'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->saldoregmov43, 16, 2, 0, 0, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Saldoregmov 43; " ; 
                  if (!isset($Campos_Erros['saldoregmov43']))
                  {
                      $Campos_Erros['saldoregmov43'] = array();
                  }
                  $Campos_Erros['saldoregmov43'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['saldoregmov43']) || !is_array($this->NM_ajax_info['errList']['saldoregmov43']))
                  {
                      $this->NM_ajax_info['errList']['saldoregmov43'] = array();
                  }
                  $this->NM_ajax_info['errList']['saldoregmov43'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'saldoregmov43';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_saldoregmov43

    function ValidateField_feccobro43(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      nm_limpa_data($this->feccobro43, $this->field_config['feccobro43']['date_sep']) ; 
      $trab_dt_min = ""; 
      $trab_dt_max = ""; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          $guarda_datahora = $this->field_config['feccobro43']['date_format']; 
          if (false !== strpos($guarda_datahora, ';')) $this->field_config['feccobro43']['date_format'] = substr($guarda_datahora, 0, strpos($guarda_datahora, ';'));
          $Format_Data = $this->field_config['feccobro43']['date_format']; 
          nm_limpa_data($Format_Data, $this->field_config['feccobro43']['date_sep']) ; 
          if (trim($this->feccobro43) != "")  
          { 
              if ($teste_validade->Data($this->feccobro43, $Format_Data, $trab_dt_min, $trab_dt_max) == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Feccobro 43; " ; 
                  if (!isset($Campos_Erros['feccobro43']))
                  {
                      $Campos_Erros['feccobro43'] = array();
                  }
                  $Campos_Erros['feccobro43'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['feccobro43']) || !is_array($this->NM_ajax_info['errList']['feccobro43']))
                  {
                      $this->NM_ajax_info['errList']['feccobro43'] = array();
                  }
                  $this->NM_ajax_info['errList']['feccobro43'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
          $this->field_config['feccobro43']['date_format'] = $guarda_datahora; 
       } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'feccobro43';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_feccobro43

    function ValidateField_codpagounif43(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->codpagounif43) > 4) 
          { 
              $hasError = true;
              $Campos_Crit .= "Codpagounif 43 " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 4 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['codpagounif43']))
              {
                  $Campos_Erros['codpagounif43'] = array();
              }
              $Campos_Erros['codpagounif43'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 4 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['codpagounif43']) || !is_array($this->NM_ajax_info['errList']['codpagounif43']))
              {
                  $this->NM_ajax_info['errList']['codpagounif43'] = array();
              }
              $this->NM_ajax_info['errList']['codpagounif43'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 4 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'codpagounif43';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_codpagounif43

    function ValidateField_tipodocdb43(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->tipodocdb43) > 4) 
          { 
              $hasError = true;
              $Campos_Crit .= "Tipodocdb 43 " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 4 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['tipodocdb43']))
              {
                  $Campos_Erros['tipodocdb43'] = array();
              }
              $Campos_Erros['tipodocdb43'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 4 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['tipodocdb43']) || !is_array($this->NM_ajax_info['errList']['tipodocdb43']))
              {
                  $this->NM_ajax_info['errList']['tipodocdb43'] = array();
              }
              $this->NM_ajax_info['errList']['tipodocdb43'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 4 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'tipodocdb43';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_tipodocdb43

    function ValidateField_numdocdb43(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->numdocdb43) > 20) 
          { 
              $hasError = true;
              $Campos_Crit .= "Numdocdb 43 " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['numdocdb43']))
              {
                  $Campos_Erros['numdocdb43'] = array();
              }
              $Campos_Erros['numdocdb43'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['numdocdb43']) || !is_array($this->NM_ajax_info['errList']['numdocdb43']))
              {
                  $this->NM_ajax_info['errList']['numdocdb43'] = array();
              }
              $this->NM_ajax_info['errList']['numdocdb43'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'numdocdb43';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_numdocdb43

    function ValidateField_ocurrecdocdb43(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->ocurrecdocdb43) > 4) 
          { 
              $hasError = true;
              $Campos_Crit .= "Ocurrecdocdb 43 " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 4 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['ocurrecdocdb43']))
              {
                  $Campos_Erros['ocurrecdocdb43'] = array();
              }
              $Campos_Erros['ocurrecdocdb43'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 4 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['ocurrecdocdb43']) || !is_array($this->NM_ajax_info['errList']['ocurrecdocdb43']))
              {
                  $this->NM_ajax_info['errList']['ocurrecdocdb43'] = array();
              }
              $this->NM_ajax_info['errList']['ocurrecdocdb43'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 4 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'ocurrecdocdb43';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_ocurrecdocdb43

    function ValidateField_numrecibo43(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->numrecibo43) > 20) 
          { 
              $hasError = true;
              $Campos_Crit .= "Numrecibo 43 " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['numrecibo43']))
              {
                  $Campos_Erros['numrecibo43'] = array();
              }
              $Campos_Erros['numrecibo43'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['numrecibo43']) || !is_array($this->NM_ajax_info['errList']['numrecibo43']))
              {
                  $this->NM_ajax_info['errList']['numrecibo43'] = array();
              }
              $this->NM_ajax_info['errList']['numrecibo43'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'numrecibo43';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_numrecibo43

    function ValidateField_valorabono43(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->valorabono43 === "" || is_null($this->valorabono43))  
      { 
          $this->valorabono43 = 0;
          $this->sc_force_zero[] = 'valorabono43';
      } 
      if (!empty($this->field_config['valorabono43']['symbol_dec']))
      {
          $this->sc_remove_currency($this->valorabono43, $this->field_config['valorabono43']['symbol_dec'], $this->field_config['valorabono43']['symbol_grp'], $this->field_config['valorabono43']['symbol_mon']); 
          nm_limpa_valor($this->valorabono43, $this->field_config['valorabono43']['symbol_dec'], $this->field_config['valorabono43']['symbol_grp']) ; 
          if ('.' == substr($this->valorabono43, 0, 1))
          {
              if ('' == str_replace('0', '', substr($this->valorabono43, 1)))
              {
                  $this->valorabono43 = '';
              }
              else
              {
                  $this->valorabono43 = '0' . $this->valorabono43;
              }
          }
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->valorabono43 != '')  
          { 
              $iTestSize = 19;
              if (strlen($this->valorabono43) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Valorabono 43: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['valorabono43']))
                  {
                      $Campos_Erros['valorabono43'] = array();
                  }
                  $Campos_Erros['valorabono43'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['valorabono43']) || !is_array($this->NM_ajax_info['errList']['valorabono43']))
                  {
                      $this->NM_ajax_info['errList']['valorabono43'] = array();
                  }
                  $this->NM_ajax_info['errList']['valorabono43'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->valorabono43, 16, 2, 0, 0, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Valorabono 43; " ; 
                  if (!isset($Campos_Erros['valorabono43']))
                  {
                      $Campos_Erros['valorabono43'] = array();
                  }
                  $Campos_Erros['valorabono43'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['valorabono43']) || !is_array($this->NM_ajax_info['errList']['valorabono43']))
                  {
                      $this->NM_ajax_info['errList']['valorabono43'] = array();
                  }
                  $this->NM_ajax_info['errList']['valorabono43'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'valorabono43';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_valorabono43

    function ValidateField_efectcheque43(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->efectcheque43) > 4) 
          { 
              $hasError = true;
              $Campos_Crit .= "Efectcheque 43 " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 4 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['efectcheque43']))
              {
                  $Campos_Erros['efectcheque43'] = array();
              }
              $Campos_Erros['efectcheque43'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 4 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['efectcheque43']) || !is_array($this->NM_ajax_info['errList']['efectcheque43']))
              {
                  $this->NM_ajax_info['errList']['efectcheque43'] = array();
              }
              $this->NM_ajax_info['errList']['efectcheque43'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 4 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'efectcheque43';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_efectcheque43

    function ValidateField_saldoexceso43(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->saldoexceso43 === "" || is_null($this->saldoexceso43))  
      { 
          $this->saldoexceso43 = 0;
          $this->sc_force_zero[] = 'saldoexceso43';
      } 
      if (!empty($this->field_config['saldoexceso43']['symbol_dec']))
      {
          $this->sc_remove_currency($this->saldoexceso43, $this->field_config['saldoexceso43']['symbol_dec'], $this->field_config['saldoexceso43']['symbol_grp'], $this->field_config['saldoexceso43']['symbol_mon']); 
          nm_limpa_valor($this->saldoexceso43, $this->field_config['saldoexceso43']['symbol_dec'], $this->field_config['saldoexceso43']['symbol_grp']) ; 
          if ('.' == substr($this->saldoexceso43, 0, 1))
          {
              if ('' == str_replace('0', '', substr($this->saldoexceso43, 1)))
              {
                  $this->saldoexceso43 = '';
              }
              else
              {
                  $this->saldoexceso43 = '0' . $this->saldoexceso43;
              }
          }
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->saldoexceso43 != '')  
          { 
              $iTestSize = 19;
              if (strlen($this->saldoexceso43) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Saldoexceso 43: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['saldoexceso43']))
                  {
                      $Campos_Erros['saldoexceso43'] = array();
                  }
                  $Campos_Erros['saldoexceso43'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['saldoexceso43']) || !is_array($this->NM_ajax_info['errList']['saldoexceso43']))
                  {
                      $this->NM_ajax_info['errList']['saldoexceso43'] = array();
                  }
                  $this->NM_ajax_info['errList']['saldoexceso43'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->saldoexceso43, 16, 2, 0, 0, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Saldoexceso 43; " ; 
                  if (!isset($Campos_Erros['saldoexceso43']))
                  {
                      $Campos_Erros['saldoexceso43'] = array();
                  }
                  $Campos_Erros['saldoexceso43'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['saldoexceso43']) || !is_array($this->NM_ajax_info['errList']['saldoexceso43']))
                  {
                      $this->NM_ajax_info['errList']['saldoexceso43'] = array();
                  }
                  $this->NM_ajax_info['errList']['saldoexceso43'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'saldoexceso43';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_saldoexceso43

    function ValidateField_saldocte43(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->saldocte43 === "" || is_null($this->saldocte43))  
      { 
          $this->saldocte43 = 0;
          $this->sc_force_zero[] = 'saldocte43';
      } 
      if (!empty($this->field_config['saldocte43']['symbol_dec']))
      {
          $this->sc_remove_currency($this->saldocte43, $this->field_config['saldocte43']['symbol_dec'], $this->field_config['saldocte43']['symbol_grp'], $this->field_config['saldocte43']['symbol_mon']); 
          nm_limpa_valor($this->saldocte43, $this->field_config['saldocte43']['symbol_dec'], $this->field_config['saldocte43']['symbol_grp']) ; 
          if ('.' == substr($this->saldocte43, 0, 1))
          {
              if ('' == str_replace('0', '', substr($this->saldocte43, 1)))
              {
                  $this->saldocte43 = '';
              }
              else
              {
                  $this->saldocte43 = '0' . $this->saldocte43;
              }
          }
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->saldocte43 != '')  
          { 
              $iTestSize = 19;
              if (strlen($this->saldocte43) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Saldocte 43: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['saldocte43']))
                  {
                      $Campos_Erros['saldocte43'] = array();
                  }
                  $Campos_Erros['saldocte43'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['saldocte43']) || !is_array($this->NM_ajax_info['errList']['saldocte43']))
                  {
                      $this->NM_ajax_info['errList']['saldocte43'] = array();
                  }
                  $this->NM_ajax_info['errList']['saldocte43'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->saldocte43, 16, 2, 0, 0, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Saldocte 43; " ; 
                  if (!isset($Campos_Erros['saldocte43']))
                  {
                      $Campos_Erros['saldocte43'] = array();
                  }
                  $Campos_Erros['saldocte43'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['saldocte43']) || !is_array($this->NM_ajax_info['errList']['saldocte43']))
                  {
                      $this->NM_ajax_info['errList']['saldocte43'] = array();
                  }
                  $this->NM_ajax_info['errList']['saldocte43'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'saldocte43';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_saldocte43

    function ValidateField_codpago43(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->codpago43) > 4) 
          { 
              $hasError = true;
              $Campos_Crit .= "Codpago 43 " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 4 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['codpago43']))
              {
                  $Campos_Erros['codpago43'] = array();
              }
              $Campos_Erros['codpago43'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 4 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['codpago43']) || !is_array($this->NM_ajax_info['errList']['codpago43']))
              {
                  $this->NM_ajax_info['errList']['codpago43'] = array();
              }
              $this->NM_ajax_info['errList']['codpago43'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 4 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'codpago43';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_codpago43

    function ValidateField_numdocpago43(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->numdocpago43) > 255) 
          { 
              $hasError = true;
              $Campos_Crit .= "Numdocpago 43 " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 255 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['numdocpago43']))
              {
                  $Campos_Erros['numdocpago43'] = array();
              }
              $Campos_Erros['numdocpago43'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 255 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['numdocpago43']) || !is_array($this->NM_ajax_info['errList']['numdocpago43']))
              {
                  $this->NM_ajax_info['errList']['numdocpago43'] = array();
              }
              $this->NM_ajax_info['errList']['numdocpago43'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 255 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'numdocpago43';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_numdocpago43

    function ValidateField_obsdocpago43(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->obsdocpago43) > 255) 
          { 
              $hasError = true;
              $Campos_Crit .= "Obsdocpago 43 " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 255 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['obsdocpago43']))
              {
                  $Campos_Erros['obsdocpago43'] = array();
              }
              $Campos_Erros['obsdocpago43'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 255 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['obsdocpago43']) || !is_array($this->NM_ajax_info['errList']['obsdocpago43']))
              {
                  $this->NM_ajax_info['errList']['obsdocpago43'] = array();
              }
              $this->NM_ajax_info['errList']['obsdocpago43'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 255 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'obsdocpago43';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_obsdocpago43

    function ValidateField_uid(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->uid) > 255) 
          { 
              $hasError = true;
              $Campos_Crit .= "UID " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 255 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['uid']))
              {
                  $Campos_Erros['uid'] = array();
              }
              $Campos_Erros['uid'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 255 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['uid']) || !is_array($this->NM_ajax_info['errList']['uid']))
              {
                  $this->NM_ajax_info['errList']['uid'] = array();
              }
              $this->NM_ajax_info['errList']['uid'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 255 " . $this->Ini->Nm_lang['lang_errm_nchr'];
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

    function ValidateField_cvtransfer43(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->cvtransfer43) > 1) 
          { 
              $hasError = true;
              $Campos_Crit .= "Cvtransfer 43 " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 1 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['cvtransfer43']))
              {
                  $Campos_Erros['cvtransfer43'] = array();
              }
              $Campos_Erros['cvtransfer43'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 1 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['cvtransfer43']) || !is_array($this->NM_ajax_info['errList']['cvtransfer43']))
              {
                  $this->NM_ajax_info['errList']['cvtransfer43'] = array();
              }
              $this->NM_ajax_info['errList']['cvtransfer43'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 1 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'cvtransfer43';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_cvtransfer43

    function ValidateField_fectransfer43(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      nm_limpa_data($this->fectransfer43, $this->field_config['fectransfer43']['date_sep']) ; 
      $trab_dt_min = ""; 
      $trab_dt_max = ""; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          $guarda_datahora = $this->field_config['fectransfer43']['date_format']; 
          if (false !== strpos($guarda_datahora, ';')) $this->field_config['fectransfer43']['date_format'] = substr($guarda_datahora, 0, strpos($guarda_datahora, ';'));
          $Format_Data = $this->field_config['fectransfer43']['date_format']; 
          nm_limpa_data($Format_Data, $this->field_config['fectransfer43']['date_sep']) ; 
          if (trim($this->fectransfer43) != "")  
          { 
              if ($teste_validade->Data($this->fectransfer43, $Format_Data, $trab_dt_min, $trab_dt_max) == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Fectransfer 43; " ; 
                  if (!isset($Campos_Erros['fectransfer43']))
                  {
                      $Campos_Erros['fectransfer43'] = array();
                  }
                  $Campos_Erros['fectransfer43'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['fectransfer43']) || !is_array($this->NM_ajax_info['errList']['fectransfer43']))
                  {
                      $this->NM_ajax_info['errList']['fectransfer43'] = array();
                  }
                  $this->NM_ajax_info['errList']['fectransfer43'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
          $this->field_config['fectransfer43']['date_format'] = $guarda_datahora; 
       } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'fectransfer43';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_fectransfer43

    function ValidateField_tipoimp43(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->tipoimp43 === "" || is_null($this->tipoimp43))  
      { 
          $this->tipoimp43 = 0;
          $this->sc_force_zero[] = 'tipoimp43';
      } 
      nm_limpa_numero($this->tipoimp43, $this->field_config['tipoimp43']['symbol_grp']) ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->tipoimp43 != '')  
          { 
              $iTestSize = 10;
              if (strlen($this->tipoimp43) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Tipoimp 43: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['tipoimp43']))
                  {
                      $Campos_Erros['tipoimp43'] = array();
                  }
                  $Campos_Erros['tipoimp43'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['tipoimp43']) || !is_array($this->NM_ajax_info['errList']['tipoimp43']))
                  {
                      $this->NM_ajax_info['errList']['tipoimp43'] = array();
                  }
                  $this->NM_ajax_info['errList']['tipoimp43'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->tipoimp43, 10, 0, 0, 0, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Tipoimp 43; " ; 
                  if (!isset($Campos_Erros['tipoimp43']))
                  {
                      $Campos_Erros['tipoimp43'] = array();
                  }
                  $Campos_Erros['tipoimp43'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['tipoimp43']) || !is_array($this->NM_ajax_info['errList']['tipoimp43']))
                  {
                      $this->NM_ajax_info['errList']['tipoimp43'] = array();
                  }
                  $this->NM_ajax_info['errList']['tipoimp43'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'tipoimp43';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_tipoimp43

    function ValidateField_porcimp43(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao == "alterar")
      {
      if ($this->porcimp43 === "" || is_null($this->porcimp43))  
      { 
          $this->porcimp43 = 0;
          $this->sc_force_zero[] = 'porcimp43';
      } 
      }
      if (!empty($this->field_config['porcimp43']['symbol_dec']))
      {
          $this->sc_remove_currency($this->porcimp43, $this->field_config['porcimp43']['symbol_dec'], $this->field_config['porcimp43']['symbol_grp'], $this->field_config['porcimp43']['symbol_mon']); 
          nm_limpa_valor($this->porcimp43, $this->field_config['porcimp43']['symbol_dec'], $this->field_config['porcimp43']['symbol_grp']) ; 
          if ('.' == substr($this->porcimp43, 0, 1))
          {
              if ('' == str_replace('0', '', substr($this->porcimp43, 1)))
              {
                  $this->porcimp43 = '';
              }
              else
              {
                  $this->porcimp43 = '0' . $this->porcimp43;
              }
          }
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->porcimp43 != '')  
          { 
              $iTestSize = 6;
              if (strlen($this->porcimp43) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Porcimp 43: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['porcimp43']))
                  {
                      $Campos_Erros['porcimp43'] = array();
                  }
                  $Campos_Erros['porcimp43'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['porcimp43']) || !is_array($this->NM_ajax_info['errList']['porcimp43']))
                  {
                      $this->NM_ajax_info['errList']['porcimp43'] = array();
                  }
                  $this->NM_ajax_info['errList']['porcimp43'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->porcimp43, 3, 2, 0, 0, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Porcimp 43; " ; 
                  if (!isset($Campos_Erros['porcimp43']))
                  {
                      $Campos_Erros['porcimp43'] = array();
                  }
                  $Campos_Erros['porcimp43'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['porcimp43']) || !is_array($this->NM_ajax_info['errList']['porcimp43']))
                  {
                      $this->NM_ajax_info['errList']['porcimp43'] = array();
                  }
                  $this->NM_ajax_info['errList']['porcimp43'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'porcimp43';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_porcimp43

    function ValidateField_bienserv43(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->bienserv43) > 255) 
          { 
              $hasError = true;
              $Campos_Crit .= "Bienserv 43 " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 255 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['bienserv43']))
              {
                  $Campos_Erros['bienserv43'] = array();
              }
              $Campos_Erros['bienserv43'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 255 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['bienserv43']) || !is_array($this->NM_ajax_info['errList']['bienserv43']))
              {
                  $this->NM_ajax_info['errList']['bienserv43'] = array();
              }
              $this->NM_ajax_info['errList']['bienserv43'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 255 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'bienserv43';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_bienserv43

    function ValidateField_credgast43(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->credgast43) > 2) 
          { 
              $hasError = true;
              $Campos_Crit .= "Credgast 43 " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 2 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['credgast43']))
              {
                  $Campos_Erros['credgast43'] = array();
              }
              $Campos_Erros['credgast43'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 2 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['credgast43']) || !is_array($this->NM_ajax_info['errList']['credgast43']))
              {
                  $this->NM_ajax_info['errList']['credgast43'] = array();
              }
              $this->NM_ajax_info['errList']['credgast43'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 2 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'credgast43';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_credgast43

    function ValidateField_fecvencompra43(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      nm_limpa_data($this->fecvencompra43, $this->field_config['fecvencompra43']['date_sep']) ; 
      $trab_dt_min = ""; 
      $trab_dt_max = ""; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          $guarda_datahora = $this->field_config['fecvencompra43']['date_format']; 
          if (false !== strpos($guarda_datahora, ';')) $this->field_config['fecvencompra43']['date_format'] = substr($guarda_datahora, 0, strpos($guarda_datahora, ';'));
          $Format_Data = $this->field_config['fecvencompra43']['date_format']; 
          nm_limpa_data($Format_Data, $this->field_config['fecvencompra43']['date_sep']) ; 
          if (trim($this->fecvencompra43) != "")  
          { 
              if ($teste_validade->Data($this->fecvencompra43, $Format_Data, $trab_dt_min, $trab_dt_max) == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Fecvencompra 43; " ; 
                  if (!isset($Campos_Erros['fecvencompra43']))
                  {
                      $Campos_Erros['fecvencompra43'] = array();
                  }
                  $Campos_Erros['fecvencompra43'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['fecvencompra43']) || !is_array($this->NM_ajax_info['errList']['fecvencompra43']))
                  {
                      $this->NM_ajax_info['errList']['fecvencompra43'] = array();
                  }
                  $this->NM_ajax_info['errList']['fecvencompra43'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
          $this->field_config['fecvencompra43']['date_format'] = $guarda_datahora; 
       } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'fecvencompra43';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_fecvencompra43

    function ValidateField_fecvenret43(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      nm_limpa_data($this->fecvenret43, $this->field_config['fecvenret43']['date_sep']) ; 
      $trab_dt_min = ""; 
      $trab_dt_max = ""; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          $guarda_datahora = $this->field_config['fecvenret43']['date_format']; 
          if (false !== strpos($guarda_datahora, ';')) $this->field_config['fecvenret43']['date_format'] = substr($guarda_datahora, 0, strpos($guarda_datahora, ';'));
          $Format_Data = $this->field_config['fecvenret43']['date_format']; 
          nm_limpa_data($Format_Data, $this->field_config['fecvenret43']['date_sep']) ; 
          if (trim($this->fecvenret43) != "")  
          { 
              if ($teste_validade->Data($this->fecvenret43, $Format_Data, $trab_dt_min, $trab_dt_max) == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Fecvenret 43; " ; 
                  if (!isset($Campos_Erros['fecvenret43']))
                  {
                      $Campos_Erros['fecvenret43'] = array();
                  }
                  $Campos_Erros['fecvenret43'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['fecvenret43']) || !is_array($this->NM_ajax_info['errList']['fecvenret43']))
                  {
                      $this->NM_ajax_info['errList']['fecvenret43'] = array();
                  }
                  $this->NM_ajax_info['errList']['fecvenret43'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
          $this->field_config['fecvenret43']['date_format'] = $guarda_datahora; 
       } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'fecvenret43';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_fecvenret43

    function ValidateField_numautoret43(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->numautoret43) > 40) 
          { 
              $hasError = true;
              $Campos_Crit .= "Numautoret 43 " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 40 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['numautoret43']))
              {
                  $Campos_Erros['numautoret43'] = array();
              }
              $Campos_Erros['numautoret43'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 40 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['numautoret43']) || !is_array($this->NM_ajax_info['errList']['numautoret43']))
              {
                  $this->NM_ajax_info['errList']['numautoret43'] = array();
              }
              $this->NM_ajax_info['errList']['numautoret43'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 40 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'numautoret43';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_numautoret43

    function ValidateField_sdoexeact43(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao == "alterar")
      {
      }
      if (!empty($this->field_config['sdoexeact43']['symbol_dec']))
      {
          $this->sc_remove_currency($this->sdoexeact43, $this->field_config['sdoexeact43']['symbol_dec'], $this->field_config['sdoexeact43']['symbol_grp'], $this->field_config['sdoexeact43']['symbol_mon']); 
          nm_limpa_valor($this->sdoexeact43, $this->field_config['sdoexeact43']['symbol_dec'], $this->field_config['sdoexeact43']['symbol_grp']) ; 
          if ('.' == substr($this->sdoexeact43, 0, 1))
          {
              if ('' == str_replace('0', '', substr($this->sdoexeact43, 1)))
              {
                  $this->sdoexeact43 = '';
              }
              else
              {
                  $this->sdoexeact43 = '0' . $this->sdoexeact43;
              }
          }
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->sdoexeact43 != '')  
          { 
              $iTestSize = 19;
              if (strlen($this->sdoexeact43) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Sdoexeact 43: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['sdoexeact43']))
                  {
                      $Campos_Erros['sdoexeact43'] = array();
                  }
                  $Campos_Erros['sdoexeact43'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['sdoexeact43']) || !is_array($this->NM_ajax_info['errList']['sdoexeact43']))
                  {
                      $this->NM_ajax_info['errList']['sdoexeact43'] = array();
                  }
                  $this->NM_ajax_info['errList']['sdoexeact43'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->sdoexeact43, 16, 2, 0, 0, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Sdoexeact 43; " ; 
                  if (!isset($Campos_Erros['sdoexeact43']))
                  {
                      $Campos_Erros['sdoexeact43'] = array();
                  }
                  $Campos_Erros['sdoexeact43'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['sdoexeact43']) || !is_array($this->NM_ajax_info['errList']['sdoexeact43']))
                  {
                      $this->NM_ajax_info['errList']['sdoexeact43'] = array();
                  }
                  $this->NM_ajax_info['errList']['sdoexeact43'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
           elseif (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['php_cmp_required']['sdoexeact43']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['php_cmp_required']['sdoexeact43'] == "on") 
           { 
              $hasError = true;
              $Campos_Falta[] = "Sdoexeact 43" ; 
              if (!isset($Campos_Erros['sdoexeact43']))
              {
                  $Campos_Erros['sdoexeact43'] = array();
              }
              $Campos_Erros['sdoexeact43'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['sdoexeact43']) || !is_array($this->NM_ajax_info['errList']['sdoexeact43']))
                  {
                      $this->NM_ajax_info['errList']['sdoexeact43'] = array();
                  }
                  $this->NM_ajax_info['errList']['sdoexeact43'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
           } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'sdoexeact43';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_sdoexeact43

    function ValidateField_sdoregact43(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao == "alterar")
      {
      }
      if (!empty($this->field_config['sdoregact43']['symbol_dec']))
      {
          $this->sc_remove_currency($this->sdoregact43, $this->field_config['sdoregact43']['symbol_dec'], $this->field_config['sdoregact43']['symbol_grp'], $this->field_config['sdoregact43']['symbol_mon']); 
          nm_limpa_valor($this->sdoregact43, $this->field_config['sdoregact43']['symbol_dec'], $this->field_config['sdoregact43']['symbol_grp']) ; 
          if ('.' == substr($this->sdoregact43, 0, 1))
          {
              if ('' == str_replace('0', '', substr($this->sdoregact43, 1)))
              {
                  $this->sdoregact43 = '';
              }
              else
              {
                  $this->sdoregact43 = '0' . $this->sdoregact43;
              }
          }
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->sdoregact43 != '')  
          { 
              $iTestSize = 19;
              if (strlen($this->sdoregact43) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Sdoregact 43: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['sdoregact43']))
                  {
                      $Campos_Erros['sdoregact43'] = array();
                  }
                  $Campos_Erros['sdoregact43'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['sdoregact43']) || !is_array($this->NM_ajax_info['errList']['sdoregact43']))
                  {
                      $this->NM_ajax_info['errList']['sdoregact43'] = array();
                  }
                  $this->NM_ajax_info['errList']['sdoregact43'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->sdoregact43, 16, 2, 0, 0, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Sdoregact 43; " ; 
                  if (!isset($Campos_Erros['sdoregact43']))
                  {
                      $Campos_Erros['sdoregact43'] = array();
                  }
                  $Campos_Erros['sdoregact43'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['sdoregact43']) || !is_array($this->NM_ajax_info['errList']['sdoregact43']))
                  {
                      $this->NM_ajax_info['errList']['sdoregact43'] = array();
                  }
                  $this->NM_ajax_info['errList']['sdoregact43'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
           elseif (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['php_cmp_required']['sdoregact43']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['php_cmp_required']['sdoregact43'] == "on") 
           { 
              $hasError = true;
              $Campos_Falta[] = "Sdoregact 43" ; 
              if (!isset($Campos_Erros['sdoregact43']))
              {
                  $Campos_Erros['sdoregact43'] = array();
              }
              $Campos_Erros['sdoregact43'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['sdoregact43']) || !is_array($this->NM_ajax_info['errList']['sdoregact43']))
                  {
                      $this->NM_ajax_info['errList']['sdoregact43'] = array();
                  }
                  $this->NM_ajax_info['errList']['sdoregact43'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
           } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'sdoregact43';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_sdoregact43

    function ValidateField_conta43(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['php_cmp_required']['conta43']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['php_cmp_required']['conta43'] == "on")) 
      { 
          if ($this->conta43 == "")  
          { 
              $hasError = true;
              $Campos_Falta[] =  "Conta 43" ; 
              if (!isset($Campos_Erros['conta43']))
              {
                  $Campos_Erros['conta43'] = array();
              }
              $Campos_Erros['conta43'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['conta43']) || !is_array($this->NM_ajax_info['errList']['conta43']))
                  {
                      $this->NM_ajax_info['errList']['conta43'] = array();
                  }
                  $this->NM_ajax_info['errList']['conta43'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          } 
      } 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->conta43) > 1) 
          { 
              $hasError = true;
              $Campos_Crit .= "Conta 43 " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 1 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['conta43']))
              {
                  $Campos_Erros['conta43'] = array();
              }
              $Campos_Erros['conta43'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 1 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['conta43']) || !is_array($this->NM_ajax_info['errList']['conta43']))
              {
                  $this->NM_ajax_info['errList']['conta43'] = array();
              }
              $this->NM_ajax_info['errList']['conta43'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 1 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'conta43';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_conta43

    function ValidateField_cvanulado43(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['php_cmp_required']['cvanulado43']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['php_cmp_required']['cvanulado43'] == "on")) 
      { 
          if ($this->cvanulado43 == "")  
          { 
              $hasError = true;
              $Campos_Falta[] =  "Cvanulado 43" ; 
              if (!isset($Campos_Erros['cvanulado43']))
              {
                  $Campos_Erros['cvanulado43'] = array();
              }
              $Campos_Erros['cvanulado43'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['cvanulado43']) || !is_array($this->NM_ajax_info['errList']['cvanulado43']))
                  {
                      $this->NM_ajax_info['errList']['cvanulado43'] = array();
                  }
                  $this->NM_ajax_info['errList']['cvanulado43'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          } 
      } 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->cvanulado43) > 1) 
          { 
              $hasError = true;
              $Campos_Crit .= "Cvanulado 43 " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 1 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['cvanulado43']))
              {
                  $Campos_Erros['cvanulado43'] = array();
              }
              $Campos_Erros['cvanulado43'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 1 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['cvanulado43']) || !is_array($this->NM_ajax_info['errList']['cvanulado43']))
              {
                  $this->NM_ajax_info['errList']['cvanulado43'] = array();
              }
              $this->NM_ajax_info['errList']['cvanulado43'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 1 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'cvanulado43';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_cvanulado43

    function ValidateField_baseret43(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao == "alterar")
      {
      }
      if (!empty($this->field_config['baseret43']['symbol_dec']))
      {
          $this->sc_remove_currency($this->baseret43, $this->field_config['baseret43']['symbol_dec'], $this->field_config['baseret43']['symbol_grp'], $this->field_config['baseret43']['symbol_mon']); 
          nm_limpa_valor($this->baseret43, $this->field_config['baseret43']['symbol_dec'], $this->field_config['baseret43']['symbol_grp']) ; 
          if ('.' == substr($this->baseret43, 0, 1))
          {
              if ('' == str_replace('0', '', substr($this->baseret43, 1)))
              {
                  $this->baseret43 = '';
              }
              else
              {
                  $this->baseret43 = '0' . $this->baseret43;
              }
          }
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->baseret43 != '')  
          { 
              $iTestSize = 19;
              if (strlen($this->baseret43) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Baseret 43: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['baseret43']))
                  {
                      $Campos_Erros['baseret43'] = array();
                  }
                  $Campos_Erros['baseret43'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['baseret43']) || !is_array($this->NM_ajax_info['errList']['baseret43']))
                  {
                      $this->NM_ajax_info['errList']['baseret43'] = array();
                  }
                  $this->NM_ajax_info['errList']['baseret43'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->baseret43, 16, 2, 0, 0, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Baseret 43; " ; 
                  if (!isset($Campos_Erros['baseret43']))
                  {
                      $Campos_Erros['baseret43'] = array();
                  }
                  $Campos_Erros['baseret43'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['baseret43']) || !is_array($this->NM_ajax_info['errList']['baseret43']))
                  {
                      $this->NM_ajax_info['errList']['baseret43'] = array();
                  }
                  $this->NM_ajax_info['errList']['baseret43'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
           elseif (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['php_cmp_required']['baseret43']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['php_cmp_required']['baseret43'] == "on") 
           { 
              $hasError = true;
              $Campos_Falta[] = "Baseret 43" ; 
              if (!isset($Campos_Erros['baseret43']))
              {
                  $Campos_Erros['baseret43'] = array();
              }
              $Campos_Erros['baseret43'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['baseret43']) || !is_array($this->NM_ajax_info['errList']['baseret43']))
                  {
                      $this->NM_ajax_info['errList']['baseret43'] = array();
                  }
                  $this->NM_ajax_info['errList']['baseret43'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
           } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'baseret43';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_baseret43

    function ValidateField_ret_con_iva43(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['php_cmp_required']['ret_con_iva43']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['php_cmp_required']['ret_con_iva43'] == "on")) 
      { 
          if ($this->ret_con_iva43 == "")  
          { 
              $hasError = true;
              $Campos_Falta[] =  "Ret Con Iva 43" ; 
              if (!isset($Campos_Erros['ret_con_iva43']))
              {
                  $Campos_Erros['ret_con_iva43'] = array();
              }
              $Campos_Erros['ret_con_iva43'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['ret_con_iva43']) || !is_array($this->NM_ajax_info['errList']['ret_con_iva43']))
                  {
                      $this->NM_ajax_info['errList']['ret_con_iva43'] = array();
                  }
                  $this->NM_ajax_info['errList']['ret_con_iva43'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          } 
      } 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->ret_con_iva43) > 1) 
          { 
              $hasError = true;
              $Campos_Crit .= "Ret Con Iva 43 " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 1 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['ret_con_iva43']))
              {
                  $Campos_Erros['ret_con_iva43'] = array();
              }
              $Campos_Erros['ret_con_iva43'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 1 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['ret_con_iva43']) || !is_array($this->NM_ajax_info['errList']['ret_con_iva43']))
              {
                  $this->NM_ajax_info['errList']['ret_con_iva43'] = array();
              }
              $this->NM_ajax_info['errList']['ret_con_iva43'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 1 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'ret_con_iva43';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_ret_con_iva43

    function ValidateField_retenciones43(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->retenciones43) > 255) 
          { 
              $hasError = true;
              $Campos_Crit .= "Retenciones 43 " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 255 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['retenciones43']))
              {
                  $Campos_Erros['retenciones43'] = array();
              }
              $Campos_Erros['retenciones43'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 255 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['retenciones43']) || !is_array($this->NM_ajax_info['errList']['retenciones43']))
              {
                  $this->NM_ajax_info['errList']['retenciones43'] = array();
              }
              $this->NM_ajax_info['errList']['retenciones43'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 255 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'retenciones43';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_retenciones43

    function ValidateField_idb(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->idb) > 5) 
          { 
              $hasError = true;
              $Campos_Crit .= "IDB " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 5 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['idb']))
              {
                  $Campos_Erros['idb'] = array();
              }
              $Campos_Erros['idb'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 5 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['idb']) || !is_array($this->NM_ajax_info['errList']['idb']))
              {
                  $this->NM_ajax_info['errList']['idb'] = array();
              }
              $this->NM_ajax_info['errList']['idb'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 5 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'idb';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_idb

    function ValidateField_tipocomptehis(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->tipocomptehis) > 5) 
          { 
              $hasError = true;
              $Campos_Crit .= "Tipocomptehis " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 5 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['tipocomptehis']))
              {
                  $Campos_Erros['tipocomptehis'] = array();
              }
              $Campos_Erros['tipocomptehis'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 5 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['tipocomptehis']) || !is_array($this->NM_ajax_info['errList']['tipocomptehis']))
              {
                  $this->NM_ajax_info['errList']['tipocomptehis'] = array();
              }
              $this->NM_ajax_info['errList']['tipocomptehis'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 5 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'tipocomptehis';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_tipocomptehis

    function ValidateField_banco(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['php_cmp_required']['banco']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['php_cmp_required']['banco'] == "on")) 
      { 
          if ($this->banco == "")  
          { 
              $hasError = true;
              $Campos_Falta[] =  "Banco" ; 
              if (!isset($Campos_Erros['banco']))
              {
                  $Campos_Erros['banco'] = array();
              }
              $Campos_Erros['banco'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['banco']) || !is_array($this->NM_ajax_info['errList']['banco']))
                  {
                      $this->NM_ajax_info['errList']['banco'] = array();
                  }
                  $this->NM_ajax_info['errList']['banco'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          } 
      } 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->banco) > 5) 
          { 
              $hasError = true;
              $Campos_Crit .= "Banco " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 5 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['banco']))
              {
                  $Campos_Erros['banco'] = array();
              }
              $Campos_Erros['banco'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 5 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['banco']) || !is_array($this->NM_ajax_info['errList']['banco']))
              {
                  $this->NM_ajax_info['errList']['banco'] = array();
              }
              $this->NM_ajax_info['errList']['banco'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 5 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'banco';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_banco

    function ValidateField_numero_transferencia(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      nm_limpa_numero($this->numero_transferencia, $this->field_config['numero_transferencia']['symbol_grp']) ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->numero_transferencia != '')  
          { 
              $iTestSize = 10;
              if (strlen($this->numero_transferencia) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Numero Transferencia: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['numero_transferencia']))
                  {
                      $Campos_Erros['numero_transferencia'] = array();
                  }
                  $Campos_Erros['numero_transferencia'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['numero_transferencia']) || !is_array($this->NM_ajax_info['errList']['numero_transferencia']))
                  {
                      $this->NM_ajax_info['errList']['numero_transferencia'] = array();
                  }
                  $this->NM_ajax_info['errList']['numero_transferencia'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->numero_transferencia, 10, 0, 0, 0, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Numero Transferencia; " ; 
                  if (!isset($Campos_Erros['numero_transferencia']))
                  {
                      $Campos_Erros['numero_transferencia'] = array();
                  }
                  $Campos_Erros['numero_transferencia'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['numero_transferencia']) || !is_array($this->NM_ajax_info['errList']['numero_transferencia']))
                  {
                      $this->NM_ajax_info['errList']['numero_transferencia'] = array();
                  }
                  $this->NM_ajax_info['errList']['numero_transferencia'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
           elseif (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['php_cmp_required']['numero_transferencia']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['php_cmp_required']['numero_transferencia'] == "on") 
           { 
              $hasError = true;
              $Campos_Falta[] = "Numero Transferencia" ; 
              if (!isset($Campos_Erros['numero_transferencia']))
              {
                  $Campos_Erros['numero_transferencia'] = array();
              }
              $Campos_Erros['numero_transferencia'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['numero_transferencia']) || !is_array($this->NM_ajax_info['errList']['numero_transferencia']))
                  {
                      $this->NM_ajax_info['errList']['numero_transferencia'] = array();
                  }
                  $this->NM_ajax_info['errList']['numero_transferencia'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
           } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'numero_transferencia';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_numero_transferencia

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
           elseif (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['php_cmp_required']['estado_electronico']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['php_cmp_required']['estado_electronico'] == "on") 
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

    function ValidateField_proyecto(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->proyecto) > 100) 
          { 
              $hasError = true;
              $Campos_Crit .= "Proyecto " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 100 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['proyecto']))
              {
                  $Campos_Erros['proyecto'] = array();
              }
              $Campos_Erros['proyecto'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 100 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['proyecto']) || !is_array($this->NM_ajax_info['errList']['proyecto']))
              {
                  $this->NM_ajax_info['errList']['proyecto'] = array();
              }
              $this->NM_ajax_info['errList']['proyecto'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 100 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'proyecto';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_proyecto

    function ValidateField_rubro(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->rubro) > 100) 
          { 
              $hasError = true;
              $Campos_Crit .= "Rubro " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 100 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['rubro']))
              {
                  $Campos_Erros['rubro'] = array();
              }
              $Campos_Erros['rubro'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 100 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['rubro']) || !is_array($this->NM_ajax_info['errList']['rubro']))
              {
                  $this->NM_ajax_info['errList']['rubro'] = array();
              }
              $this->NM_ajax_info['errList']['rubro'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 100 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'rubro';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_rubro

    function ValidateField_categoria(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->categoria) > 100) 
          { 
              $hasError = true;
              $Campos_Crit .= "Categoria " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 100 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['categoria']))
              {
                  $Campos_Erros['categoria'] = array();
              }
              $Campos_Erros['categoria'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 100 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['categoria']) || !is_array($this->NM_ajax_info['errList']['categoria']))
              {
                  $this->NM_ajax_info['errList']['categoria'] = array();
              }
              $this->NM_ajax_info['errList']['categoria'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 100 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'categoria';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_categoria

    function ValidateField_tipo_documento_atado(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->tipo_documento_atado) > 25) 
          { 
              $hasError = true;
              $Campos_Crit .= "Tipo Documento Atado " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 25 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['tipo_documento_atado']))
              {
                  $Campos_Erros['tipo_documento_atado'] = array();
              }
              $Campos_Erros['tipo_documento_atado'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 25 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['tipo_documento_atado']) || !is_array($this->NM_ajax_info['errList']['tipo_documento_atado']))
              {
                  $this->NM_ajax_info['errList']['tipo_documento_atado'] = array();
              }
              $this->NM_ajax_info['errList']['tipo_documento_atado'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 25 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'tipo_documento_atado';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_tipo_documento_atado

    function ValidateField_numero_documento_atado(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->numero_documento_atado) > 25) 
          { 
              $hasError = true;
              $Campos_Crit .= "Numero Documento Atado " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 25 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['numero_documento_atado']))
              {
                  $Campos_Erros['numero_documento_atado'] = array();
              }
              $Campos_Erros['numero_documento_atado'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 25 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['numero_documento_atado']) || !is_array($this->NM_ajax_info['errList']['numero_documento_atado']))
              {
                  $this->NM_ajax_info['errList']['numero_documento_atado'] = array();
              }
              $this->NM_ajax_info['errList']['numero_documento_atado'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 25 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'numero_documento_atado';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_numero_documento_atado

    function ValidateField_valor_superior_al_maximo(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      nm_limpa_numero($this->valor_superior_al_maximo, $this->field_config['valor_superior_al_maximo']['symbol_grp']) ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->valor_superior_al_maximo != '')  
          { 
              $iTestSize = 3;
              if (strlen($this->valor_superior_al_maximo) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Valor Superior Al Maximo: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['valor_superior_al_maximo']))
                  {
                      $Campos_Erros['valor_superior_al_maximo'] = array();
                  }
                  $Campos_Erros['valor_superior_al_maximo'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['valor_superior_al_maximo']) || !is_array($this->NM_ajax_info['errList']['valor_superior_al_maximo']))
                  {
                      $this->NM_ajax_info['errList']['valor_superior_al_maximo'] = array();
                  }
                  $this->NM_ajax_info['errList']['valor_superior_al_maximo'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->valor_superior_al_maximo, 3, 0, 0, 0, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Valor Superior Al Maximo; " ; 
                  if (!isset($Campos_Erros['valor_superior_al_maximo']))
                  {
                      $Campos_Erros['valor_superior_al_maximo'] = array();
                  }
                  $Campos_Erros['valor_superior_al_maximo'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['valor_superior_al_maximo']) || !is_array($this->NM_ajax_info['errList']['valor_superior_al_maximo']))
                  {
                      $this->NM_ajax_info['errList']['valor_superior_al_maximo'] = array();
                  }
                  $this->NM_ajax_info['errList']['valor_superior_al_maximo'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
           elseif (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['php_cmp_required']['valor_superior_al_maximo']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['php_cmp_required']['valor_superior_al_maximo'] == "on") 
           { 
              $hasError = true;
              $Campos_Falta[] = "Valor Superior Al Maximo" ; 
              if (!isset($Campos_Erros['valor_superior_al_maximo']))
              {
                  $Campos_Erros['valor_superior_al_maximo'] = array();
              }
              $Campos_Erros['valor_superior_al_maximo'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['valor_superior_al_maximo']) || !is_array($this->NM_ajax_info['errList']['valor_superior_al_maximo']))
                  {
                      $this->NM_ajax_info['errList']['valor_superior_al_maximo'] = array();
                  }
                  $this->NM_ajax_info['errList']['valor_superior_al_maximo'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
           } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'valor_superior_al_maximo';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_valor_superior_al_maximo

    function ValidateField_distribucion_retencion(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->distribucion_retencion) > 25) 
          { 
              $hasError = true;
              $Campos_Crit .= "Distribucion Retencion " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 25 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['distribucion_retencion']))
              {
                  $Campos_Erros['distribucion_retencion'] = array();
              }
              $Campos_Erros['distribucion_retencion'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 25 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['distribucion_retencion']) || !is_array($this->NM_ajax_info['errList']['distribucion_retencion']))
              {
                  $this->NM_ajax_info['errList']['distribucion_retencion'] = array();
              }
              $this->NM_ajax_info['errList']['distribucion_retencion'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 25 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'distribucion_retencion';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_distribucion_retencion

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
    $this->nmgp_dados_form['codcte43'] = $this->codcte43;
    $this->nmgp_dados_form['tipodoc43'] = $this->tipodoc43;
    $this->nmgp_dados_form['numdoc43'] = $this->numdoc43;
    $this->nmgp_dados_form['ocurren43'] = $this->ocurren43;
    $this->nmgp_dados_form['cocte43'] = $this->cocte43;
    $this->nmgp_dados_form['fecdoc43'] = (strlen(trim($this->fecdoc43)) > 19) ? str_replace(".", ":", $this->fecdoc43) : trim($this->fecdoc43);
    $this->nmgp_dados_form['tipdoc43'] = $this->tipdoc43;
    $this->nmgp_dados_form['numvencob43'] = $this->numvencob43;
    $this->nmgp_dados_form['fedoc43'] = (strlen(trim($this->fedoc43)) > 19) ? str_replace(".", ":", $this->fedoc43) : trim($this->fedoc43);
    $this->nmgp_dados_form['totdoc43'] = $this->totdoc43;
    $this->nmgp_dados_form['detalle43'] = $this->detalle43;
    $this->nmgp_dados_form['cvanioant43'] = $this->cvanioant43;
    $this->nmgp_dados_form['cvdivisa43'] = $this->cvdivisa43;
    $this->nmgp_dados_form['valdivisa43'] = $this->valdivisa43;
    $this->nmgp_dados_form['valdivisaori43'] = $this->valdivisaori43;
    $this->nmgp_dados_form['factcompra43'] = $this->factcompra43;
    $this->nmgp_dados_form['seriecompra43'] = $this->seriecompra43;
    $this->nmgp_dados_form['autocompra43'] = $this->autocompra43;
    $this->nmgp_dados_form['codret43'] = $this->codret43;
    $this->nmgp_dados_form['valini43'] = $this->valini43;
    $this->nmgp_dados_form['numcuotasord43'] = $this->numcuotasord43;
    $this->nmgp_dados_form['valormov43'] = $this->valormov43;
    $this->nmgp_dados_form['saldoregmov43'] = $this->saldoregmov43;
    $this->nmgp_dados_form['feccobro43'] = (strlen(trim($this->feccobro43)) > 19) ? str_replace(".", ":", $this->feccobro43) : trim($this->feccobro43);
    $this->nmgp_dados_form['codpagounif43'] = $this->codpagounif43;
    $this->nmgp_dados_form['tipodocdb43'] = $this->tipodocdb43;
    $this->nmgp_dados_form['numdocdb43'] = $this->numdocdb43;
    $this->nmgp_dados_form['ocurrecdocdb43'] = $this->ocurrecdocdb43;
    $this->nmgp_dados_form['numrecibo43'] = $this->numrecibo43;
    $this->nmgp_dados_form['valorabono43'] = $this->valorabono43;
    $this->nmgp_dados_form['efectcheque43'] = $this->efectcheque43;
    $this->nmgp_dados_form['saldoexceso43'] = $this->saldoexceso43;
    $this->nmgp_dados_form['saldocte43'] = $this->saldocte43;
    $this->nmgp_dados_form['codpago43'] = $this->codpago43;
    $this->nmgp_dados_form['numdocpago43'] = $this->numdocpago43;
    $this->nmgp_dados_form['obsdocpago43'] = $this->obsdocpago43;
    $this->nmgp_dados_form['uid'] = $this->uid;
    $this->nmgp_dados_form['cvtransfer43'] = $this->cvtransfer43;
    $this->nmgp_dados_form['fectransfer43'] = (strlen(trim($this->fectransfer43)) > 19) ? str_replace(".", ":", $this->fectransfer43) : trim($this->fectransfer43);
    $this->nmgp_dados_form['tipoimp43'] = $this->tipoimp43;
    $this->nmgp_dados_form['porcimp43'] = $this->porcimp43;
    $this->nmgp_dados_form['bienserv43'] = $this->bienserv43;
    $this->nmgp_dados_form['credgast43'] = $this->credgast43;
    $this->nmgp_dados_form['fecvencompra43'] = (strlen(trim($this->fecvencompra43)) > 19) ? str_replace(".", ":", $this->fecvencompra43) : trim($this->fecvencompra43);
    $this->nmgp_dados_form['fecvenret43'] = (strlen(trim($this->fecvenret43)) > 19) ? str_replace(".", ":", $this->fecvenret43) : trim($this->fecvenret43);
    $this->nmgp_dados_form['numautoret43'] = $this->numautoret43;
    $this->nmgp_dados_form['sdoexeact43'] = $this->sdoexeact43;
    $this->nmgp_dados_form['sdoregact43'] = $this->sdoregact43;
    $this->nmgp_dados_form['conta43'] = $this->conta43;
    $this->nmgp_dados_form['cvanulado43'] = $this->cvanulado43;
    $this->nmgp_dados_form['baseret43'] = $this->baseret43;
    $this->nmgp_dados_form['ret_con_iva43'] = $this->ret_con_iva43;
    $this->nmgp_dados_form['retenciones43'] = $this->retenciones43;
    $this->nmgp_dados_form['idb'] = $this->idb;
    $this->nmgp_dados_form['tipocomptehis'] = $this->tipocomptehis;
    $this->nmgp_dados_form['banco'] = $this->banco;
    $this->nmgp_dados_form['numero_transferencia'] = $this->numero_transferencia;
    $this->nmgp_dados_form['estado_electronico'] = $this->estado_electronico;
    $this->nmgp_dados_form['proyecto'] = $this->proyecto;
    $this->nmgp_dados_form['rubro'] = $this->rubro;
    $this->nmgp_dados_form['categoria'] = $this->categoria;
    $this->nmgp_dados_form['tipo_documento_atado'] = $this->tipo_documento_atado;
    $this->nmgp_dados_form['numero_documento_atado'] = $this->numero_documento_atado;
    $this->nmgp_dados_form['valor_superior_al_maximo'] = $this->valor_superior_al_maximo;
    $this->nmgp_dados_form['distribucion_retencion'] = $this->distribucion_retencion;
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['dados_form'] = $this->nmgp_dados_form;
   }
   function nm_tira_formatacao()
   {
      global $nm_form_submit;
         $this->Before_unformat = array();
         $this->formatado = false;
      $this->Before_unformat['fecdoc43'] = $this->fecdoc43;
      $this->Before_unformat['fecdoc43_hora'] = $this->fecdoc43_hora;
      nm_limpa_data($this->fecdoc43, $this->field_config['fecdoc43']['date_sep']) ; 
      nm_limpa_hora($this->fecdoc43_hora, $this->field_config['fecdoc43']['time_sep']) ; 
      $this->Before_unformat['fedoc43'] = $this->fedoc43;
      $this->Before_unformat['fedoc43_hora'] = $this->fedoc43_hora;
      nm_limpa_data($this->fedoc43, $this->field_config['fedoc43']['date_sep']) ; 
      nm_limpa_hora($this->fedoc43_hora, $this->field_config['fedoc43']['time_sep']) ; 
      $this->Before_unformat['totdoc43'] = $this->totdoc43;
      if (!empty($this->field_config['totdoc43']['symbol_dec']))
      {
         $this->sc_remove_currency($this->totdoc43, $this->field_config['totdoc43']['symbol_dec'], $this->field_config['totdoc43']['symbol_grp'], $this->field_config['totdoc43']['symbol_mon']);
         nm_limpa_valor($this->totdoc43, $this->field_config['totdoc43']['symbol_dec'], $this->field_config['totdoc43']['symbol_grp']);
      }
      $this->Before_unformat['valdivisa43'] = $this->valdivisa43;
      nm_limpa_numero($this->valdivisa43, $this->field_config['valdivisa43']['symbol_grp']) ; 
      $this->Before_unformat['valdivisaori43'] = $this->valdivisaori43;
      nm_limpa_numero($this->valdivisaori43, $this->field_config['valdivisaori43']['symbol_grp']) ; 
      $this->Before_unformat['valini43'] = $this->valini43;
      if (!empty($this->field_config['valini43']['symbol_dec']))
      {
         $this->sc_remove_currency($this->valini43, $this->field_config['valini43']['symbol_dec'], $this->field_config['valini43']['symbol_grp'], $this->field_config['valini43']['symbol_mon']);
         nm_limpa_valor($this->valini43, $this->field_config['valini43']['symbol_dec'], $this->field_config['valini43']['symbol_grp']);
      }
      $this->Before_unformat['valormov43'] = $this->valormov43;
      if (!empty($this->field_config['valormov43']['symbol_dec']))
      {
         $this->sc_remove_currency($this->valormov43, $this->field_config['valormov43']['symbol_dec'], $this->field_config['valormov43']['symbol_grp'], $this->field_config['valormov43']['symbol_mon']);
         nm_limpa_valor($this->valormov43, $this->field_config['valormov43']['symbol_dec'], $this->field_config['valormov43']['symbol_grp']);
      }
      $this->Before_unformat['saldoregmov43'] = $this->saldoregmov43;
      if (!empty($this->field_config['saldoregmov43']['symbol_dec']))
      {
         $this->sc_remove_currency($this->saldoregmov43, $this->field_config['saldoregmov43']['symbol_dec'], $this->field_config['saldoregmov43']['symbol_grp'], $this->field_config['saldoregmov43']['symbol_mon']);
         nm_limpa_valor($this->saldoregmov43, $this->field_config['saldoregmov43']['symbol_dec'], $this->field_config['saldoregmov43']['symbol_grp']);
      }
      $this->Before_unformat['feccobro43'] = $this->feccobro43;
      nm_limpa_data($this->feccobro43, $this->field_config['feccobro43']['date_sep']) ; 
      $this->Before_unformat['valorabono43'] = $this->valorabono43;
      if (!empty($this->field_config['valorabono43']['symbol_dec']))
      {
         $this->sc_remove_currency($this->valorabono43, $this->field_config['valorabono43']['symbol_dec'], $this->field_config['valorabono43']['symbol_grp'], $this->field_config['valorabono43']['symbol_mon']);
         nm_limpa_valor($this->valorabono43, $this->field_config['valorabono43']['symbol_dec'], $this->field_config['valorabono43']['symbol_grp']);
      }
      $this->Before_unformat['saldoexceso43'] = $this->saldoexceso43;
      if (!empty($this->field_config['saldoexceso43']['symbol_dec']))
      {
         $this->sc_remove_currency($this->saldoexceso43, $this->field_config['saldoexceso43']['symbol_dec'], $this->field_config['saldoexceso43']['symbol_grp'], $this->field_config['saldoexceso43']['symbol_mon']);
         nm_limpa_valor($this->saldoexceso43, $this->field_config['saldoexceso43']['symbol_dec'], $this->field_config['saldoexceso43']['symbol_grp']);
      }
      $this->Before_unformat['saldocte43'] = $this->saldocte43;
      if (!empty($this->field_config['saldocte43']['symbol_dec']))
      {
         $this->sc_remove_currency($this->saldocte43, $this->field_config['saldocte43']['symbol_dec'], $this->field_config['saldocte43']['symbol_grp'], $this->field_config['saldocte43']['symbol_mon']);
         nm_limpa_valor($this->saldocte43, $this->field_config['saldocte43']['symbol_dec'], $this->field_config['saldocte43']['symbol_grp']);
      }
      $this->Before_unformat['fectransfer43'] = $this->fectransfer43;
      nm_limpa_data($this->fectransfer43, $this->field_config['fectransfer43']['date_sep']) ; 
      $this->Before_unformat['tipoimp43'] = $this->tipoimp43;
      nm_limpa_numero($this->tipoimp43, $this->field_config['tipoimp43']['symbol_grp']) ; 
      $this->Before_unformat['porcimp43'] = $this->porcimp43;
      if (!empty($this->field_config['porcimp43']['symbol_dec']))
      {
         $this->sc_remove_currency($this->porcimp43, $this->field_config['porcimp43']['symbol_dec'], $this->field_config['porcimp43']['symbol_grp'], $this->field_config['porcimp43']['symbol_mon']);
         nm_limpa_valor($this->porcimp43, $this->field_config['porcimp43']['symbol_dec'], $this->field_config['porcimp43']['symbol_grp']);
      }
      $this->Before_unformat['fecvencompra43'] = $this->fecvencompra43;
      nm_limpa_data($this->fecvencompra43, $this->field_config['fecvencompra43']['date_sep']) ; 
      $this->Before_unformat['fecvenret43'] = $this->fecvenret43;
      nm_limpa_data($this->fecvenret43, $this->field_config['fecvenret43']['date_sep']) ; 
      $this->Before_unformat['sdoexeact43'] = $this->sdoexeact43;
      if (!empty($this->field_config['sdoexeact43']['symbol_dec']))
      {
         $this->sc_remove_currency($this->sdoexeact43, $this->field_config['sdoexeact43']['symbol_dec'], $this->field_config['sdoexeact43']['symbol_grp'], $this->field_config['sdoexeact43']['symbol_mon']);
         nm_limpa_valor($this->sdoexeact43, $this->field_config['sdoexeact43']['symbol_dec'], $this->field_config['sdoexeact43']['symbol_grp']);
      }
      $this->Before_unformat['sdoregact43'] = $this->sdoregact43;
      if (!empty($this->field_config['sdoregact43']['symbol_dec']))
      {
         $this->sc_remove_currency($this->sdoregact43, $this->field_config['sdoregact43']['symbol_dec'], $this->field_config['sdoregact43']['symbol_grp'], $this->field_config['sdoregact43']['symbol_mon']);
         nm_limpa_valor($this->sdoregact43, $this->field_config['sdoregact43']['symbol_dec'], $this->field_config['sdoregact43']['symbol_grp']);
      }
      $this->Before_unformat['baseret43'] = $this->baseret43;
      if (!empty($this->field_config['baseret43']['symbol_dec']))
      {
         $this->sc_remove_currency($this->baseret43, $this->field_config['baseret43']['symbol_dec'], $this->field_config['baseret43']['symbol_grp'], $this->field_config['baseret43']['symbol_mon']);
         nm_limpa_valor($this->baseret43, $this->field_config['baseret43']['symbol_dec'], $this->field_config['baseret43']['symbol_grp']);
      }
      $this->Before_unformat['numero_transferencia'] = $this->numero_transferencia;
      nm_limpa_numero($this->numero_transferencia, $this->field_config['numero_transferencia']['symbol_grp']) ; 
      $this->Before_unformat['estado_electronico'] = $this->estado_electronico;
      nm_limpa_numero($this->estado_electronico, $this->field_config['estado_electronico']['symbol_grp']) ; 
      $this->Before_unformat['valor_superior_al_maximo'] = $this->valor_superior_al_maximo;
      nm_limpa_numero($this->valor_superior_al_maximo, $this->field_config['valor_superior_al_maximo']['symbol_grp']) ; 
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
      if ($Nome_Campo == "totdoc43")
      {
          if (!empty($this->field_config['totdoc43']['symbol_dec']))
          {
             $this->sc_remove_currency($this->totdoc43, $this->field_config['totdoc43']['symbol_dec'], $this->field_config['totdoc43']['symbol_grp'], $this->field_config['totdoc43']['symbol_mon']);
             nm_limpa_valor($this->totdoc43, $this->field_config['totdoc43']['symbol_dec'], $this->field_config['totdoc43']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "valdivisa43")
      {
          nm_limpa_numero($this->valdivisa43, $this->field_config['valdivisa43']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "valdivisaori43")
      {
          nm_limpa_numero($this->valdivisaori43, $this->field_config['valdivisaori43']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "valini43")
      {
          if (!empty($this->field_config['valini43']['symbol_dec']))
          {
             $this->sc_remove_currency($this->valini43, $this->field_config['valini43']['symbol_dec'], $this->field_config['valini43']['symbol_grp'], $this->field_config['valini43']['symbol_mon']);
             nm_limpa_valor($this->valini43, $this->field_config['valini43']['symbol_dec'], $this->field_config['valini43']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "valormov43")
      {
          if (!empty($this->field_config['valormov43']['symbol_dec']))
          {
             $this->sc_remove_currency($this->valormov43, $this->field_config['valormov43']['symbol_dec'], $this->field_config['valormov43']['symbol_grp'], $this->field_config['valormov43']['symbol_mon']);
             nm_limpa_valor($this->valormov43, $this->field_config['valormov43']['symbol_dec'], $this->field_config['valormov43']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "saldoregmov43")
      {
          if (!empty($this->field_config['saldoregmov43']['symbol_dec']))
          {
             $this->sc_remove_currency($this->saldoregmov43, $this->field_config['saldoregmov43']['symbol_dec'], $this->field_config['saldoregmov43']['symbol_grp'], $this->field_config['saldoregmov43']['symbol_mon']);
             nm_limpa_valor($this->saldoregmov43, $this->field_config['saldoregmov43']['symbol_dec'], $this->field_config['saldoregmov43']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "valorabono43")
      {
          if (!empty($this->field_config['valorabono43']['symbol_dec']))
          {
             $this->sc_remove_currency($this->valorabono43, $this->field_config['valorabono43']['symbol_dec'], $this->field_config['valorabono43']['symbol_grp'], $this->field_config['valorabono43']['symbol_mon']);
             nm_limpa_valor($this->valorabono43, $this->field_config['valorabono43']['symbol_dec'], $this->field_config['valorabono43']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "saldoexceso43")
      {
          if (!empty($this->field_config['saldoexceso43']['symbol_dec']))
          {
             $this->sc_remove_currency($this->saldoexceso43, $this->field_config['saldoexceso43']['symbol_dec'], $this->field_config['saldoexceso43']['symbol_grp'], $this->field_config['saldoexceso43']['symbol_mon']);
             nm_limpa_valor($this->saldoexceso43, $this->field_config['saldoexceso43']['symbol_dec'], $this->field_config['saldoexceso43']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "saldocte43")
      {
          if (!empty($this->field_config['saldocte43']['symbol_dec']))
          {
             $this->sc_remove_currency($this->saldocte43, $this->field_config['saldocte43']['symbol_dec'], $this->field_config['saldocte43']['symbol_grp'], $this->field_config['saldocte43']['symbol_mon']);
             nm_limpa_valor($this->saldocte43, $this->field_config['saldocte43']['symbol_dec'], $this->field_config['saldocte43']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "tipoimp43")
      {
          nm_limpa_numero($this->tipoimp43, $this->field_config['tipoimp43']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "porcimp43")
      {
          if (!empty($this->field_config['porcimp43']['symbol_dec']))
          {
             $this->sc_remove_currency($this->porcimp43, $this->field_config['porcimp43']['symbol_dec'], $this->field_config['porcimp43']['symbol_grp'], $this->field_config['porcimp43']['symbol_mon']);
             nm_limpa_valor($this->porcimp43, $this->field_config['porcimp43']['symbol_dec'], $this->field_config['porcimp43']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "sdoexeact43")
      {
          if (!empty($this->field_config['sdoexeact43']['symbol_dec']))
          {
             $this->sc_remove_currency($this->sdoexeact43, $this->field_config['sdoexeact43']['symbol_dec'], $this->field_config['sdoexeact43']['symbol_grp'], $this->field_config['sdoexeact43']['symbol_mon']);
             nm_limpa_valor($this->sdoexeact43, $this->field_config['sdoexeact43']['symbol_dec'], $this->field_config['sdoexeact43']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "sdoregact43")
      {
          if (!empty($this->field_config['sdoregact43']['symbol_dec']))
          {
             $this->sc_remove_currency($this->sdoregact43, $this->field_config['sdoregact43']['symbol_dec'], $this->field_config['sdoregact43']['symbol_grp'], $this->field_config['sdoregact43']['symbol_mon']);
             nm_limpa_valor($this->sdoregact43, $this->field_config['sdoregact43']['symbol_dec'], $this->field_config['sdoregact43']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "baseret43")
      {
          if (!empty($this->field_config['baseret43']['symbol_dec']))
          {
             $this->sc_remove_currency($this->baseret43, $this->field_config['baseret43']['symbol_dec'], $this->field_config['baseret43']['symbol_grp'], $this->field_config['baseret43']['symbol_mon']);
             nm_limpa_valor($this->baseret43, $this->field_config['baseret43']['symbol_dec'], $this->field_config['baseret43']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "numero_transferencia")
      {
          nm_limpa_numero($this->numero_transferencia, $this->field_config['numero_transferencia']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "estado_electronico")
      {
          nm_limpa_numero($this->estado_electronico, $this->field_config['estado_electronico']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "valor_superior_al_maximo")
      {
          nm_limpa_numero($this->valor_superior_al_maximo, $this->field_config['valor_superior_al_maximo']['symbol_grp']) ; 
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
      if ((!empty($this->fecdoc43) && 'null' != $this->fecdoc43) || (!empty($format_fields) && isset($format_fields['fecdoc43'])))
      {
          $nm_separa_data = strpos($this->field_config['fecdoc43']['date_format'], ";") ;
          $guarda_format_hora = $this->field_config['fecdoc43']['date_format'];
          $this->field_config['fecdoc43']['date_format'] = substr($this->field_config['fecdoc43']['date_format'], 0, $nm_separa_data) ;
          $separador = strpos($this->fecdoc43, " ") ; 
          $this->fecdoc43_hora = substr($this->fecdoc43, $separador + 1) ; 
          $this->fecdoc43 = substr($this->fecdoc43, 0, $separador) ; 
          nm_volta_data($this->fecdoc43, $this->field_config['fecdoc43']['date_format']) ; 
          nmgp_Form_Datas($this->fecdoc43, $this->field_config['fecdoc43']['date_format'], $this->field_config['fecdoc43']['date_sep']) ;  
          $this->field_config['fecdoc43']['date_format'] = substr($guarda_format_hora, $nm_separa_data + 1) ;
          nm_volta_hora($this->fecdoc43_hora, $this->field_config['fecdoc43']['date_format']) ; 
          nmgp_Form_Hora($this->fecdoc43_hora, $this->field_config['fecdoc43']['date_format'], $this->field_config['fecdoc43']['time_sep']) ;  
          $this->field_config['fecdoc43']['date_format'] = $guarda_format_hora ;
      }
      elseif ('null' == $this->fecdoc43 || '' == $this->fecdoc43)
      {
          $this->fecdoc43_hora = '';
          $this->fecdoc43 = '';
      }
      if ((!empty($this->fedoc43) && 'null' != $this->fedoc43) || (!empty($format_fields) && isset($format_fields['fedoc43'])))
      {
          $nm_separa_data = strpos($this->field_config['fedoc43']['date_format'], ";") ;
          $guarda_format_hora = $this->field_config['fedoc43']['date_format'];
          $this->field_config['fedoc43']['date_format'] = substr($this->field_config['fedoc43']['date_format'], 0, $nm_separa_data) ;
          $separador = strpos($this->fedoc43, " ") ; 
          $this->fedoc43_hora = substr($this->fedoc43, $separador + 1) ; 
          $this->fedoc43 = substr($this->fedoc43, 0, $separador) ; 
          nm_volta_data($this->fedoc43, $this->field_config['fedoc43']['date_format']) ; 
          nmgp_Form_Datas($this->fedoc43, $this->field_config['fedoc43']['date_format'], $this->field_config['fedoc43']['date_sep']) ;  
          $this->field_config['fedoc43']['date_format'] = substr($guarda_format_hora, $nm_separa_data + 1) ;
          nm_volta_hora($this->fedoc43_hora, $this->field_config['fedoc43']['date_format']) ; 
          nmgp_Form_Hora($this->fedoc43_hora, $this->field_config['fedoc43']['date_format'], $this->field_config['fedoc43']['time_sep']) ;  
          $this->field_config['fedoc43']['date_format'] = $guarda_format_hora ;
      }
      elseif ('null' == $this->fedoc43 || '' == $this->fedoc43)
      {
          $this->fedoc43_hora = '';
          $this->fedoc43 = '';
      }
      if ('' !== $this->totdoc43 || (!empty($format_fields) && isset($format_fields['totdoc43'])))
      {
          nmgp_Form_Num_Val($this->totdoc43, $this->field_config['totdoc43']['symbol_grp'], $this->field_config['totdoc43']['symbol_dec'], "2", "S", $this->field_config['totdoc43']['format_neg'], "", "", "-", $this->field_config['totdoc43']['symbol_fmt']) ; 
      }
      if ('' !== $this->valdivisa43 || (!empty($format_fields) && isset($format_fields['valdivisa43'])))
      {
          nmgp_Form_Num_Val($this->valdivisa43, $this->field_config['valdivisa43']['symbol_grp'], $this->field_config['valdivisa43']['symbol_dec'], "0", "S", $this->field_config['valdivisa43']['format_neg'], "", "", "-", $this->field_config['valdivisa43']['symbol_fmt']) ; 
      }
      if ('' !== $this->valdivisaori43 || (!empty($format_fields) && isset($format_fields['valdivisaori43'])))
      {
          nmgp_Form_Num_Val($this->valdivisaori43, $this->field_config['valdivisaori43']['symbol_grp'], $this->field_config['valdivisaori43']['symbol_dec'], "0", "S", $this->field_config['valdivisaori43']['format_neg'], "", "", "-", $this->field_config['valdivisaori43']['symbol_fmt']) ; 
      }
      if ('' !== $this->valini43 || (!empty($format_fields) && isset($format_fields['valini43'])))
      {
          nmgp_Form_Num_Val($this->valini43, $this->field_config['valini43']['symbol_grp'], $this->field_config['valini43']['symbol_dec'], "2", "S", $this->field_config['valini43']['format_neg'], "", "", "-", $this->field_config['valini43']['symbol_fmt']) ; 
      }
      if ('' !== $this->valormov43 || (!empty($format_fields) && isset($format_fields['valormov43'])))
      {
          nmgp_Form_Num_Val($this->valormov43, $this->field_config['valormov43']['symbol_grp'], $this->field_config['valormov43']['symbol_dec'], "2", "S", $this->field_config['valormov43']['format_neg'], "", "", "-", $this->field_config['valormov43']['symbol_fmt']) ; 
      }
      if ('' !== $this->saldoregmov43 || (!empty($format_fields) && isset($format_fields['saldoregmov43'])))
      {
          nmgp_Form_Num_Val($this->saldoregmov43, $this->field_config['saldoregmov43']['symbol_grp'], $this->field_config['saldoregmov43']['symbol_dec'], "2", "S", $this->field_config['saldoregmov43']['format_neg'], "", "", "-", $this->field_config['saldoregmov43']['symbol_fmt']) ; 
      }
      if ((!empty($this->feccobro43) && 'null' != $this->feccobro43) || (!empty($format_fields) && isset($format_fields['feccobro43'])))
      {
          nm_volta_data($this->feccobro43, $this->field_config['feccobro43']['date_format']) ; 
          nmgp_Form_Datas($this->feccobro43, $this->field_config['feccobro43']['date_format'], $this->field_config['feccobro43']['date_sep']) ;  
      }
      elseif ('null' == $this->feccobro43 || '' == $this->feccobro43)
      {
          $this->feccobro43 = '';
      }
      if ('' !== $this->valorabono43 || (!empty($format_fields) && isset($format_fields['valorabono43'])))
      {
          nmgp_Form_Num_Val($this->valorabono43, $this->field_config['valorabono43']['symbol_grp'], $this->field_config['valorabono43']['symbol_dec'], "2", "S", $this->field_config['valorabono43']['format_neg'], "", "", "-", $this->field_config['valorabono43']['symbol_fmt']) ; 
      }
      if ('' !== $this->saldoexceso43 || (!empty($format_fields) && isset($format_fields['saldoexceso43'])))
      {
          nmgp_Form_Num_Val($this->saldoexceso43, $this->field_config['saldoexceso43']['symbol_grp'], $this->field_config['saldoexceso43']['symbol_dec'], "2", "S", $this->field_config['saldoexceso43']['format_neg'], "", "", "-", $this->field_config['saldoexceso43']['symbol_fmt']) ; 
      }
      if ('' !== $this->saldocte43 || (!empty($format_fields) && isset($format_fields['saldocte43'])))
      {
          nmgp_Form_Num_Val($this->saldocte43, $this->field_config['saldocte43']['symbol_grp'], $this->field_config['saldocte43']['symbol_dec'], "2", "S", $this->field_config['saldocte43']['format_neg'], "", "", "-", $this->field_config['saldocte43']['symbol_fmt']) ; 
      }
      if ((!empty($this->fectransfer43) && 'null' != $this->fectransfer43) || (!empty($format_fields) && isset($format_fields['fectransfer43'])))
      {
          nm_volta_data($this->fectransfer43, $this->field_config['fectransfer43']['date_format']) ; 
          nmgp_Form_Datas($this->fectransfer43, $this->field_config['fectransfer43']['date_format'], $this->field_config['fectransfer43']['date_sep']) ;  
      }
      elseif ('null' == $this->fectransfer43 || '' == $this->fectransfer43)
      {
          $this->fectransfer43 = '';
      }
      if ('' !== $this->tipoimp43 || (!empty($format_fields) && isset($format_fields['tipoimp43'])))
      {
          nmgp_Form_Num_Val($this->tipoimp43, $this->field_config['tipoimp43']['symbol_grp'], $this->field_config['tipoimp43']['symbol_dec'], "0", "S", $this->field_config['tipoimp43']['format_neg'], "", "", "-", $this->field_config['tipoimp43']['symbol_fmt']) ; 
      }
      if ('' !== $this->porcimp43 || (!empty($format_fields) && isset($format_fields['porcimp43'])))
      {
          nmgp_Form_Num_Val($this->porcimp43, $this->field_config['porcimp43']['symbol_grp'], $this->field_config['porcimp43']['symbol_dec'], "2", "S", $this->field_config['porcimp43']['format_neg'], "", "", "-", $this->field_config['porcimp43']['symbol_fmt']) ; 
      }
      if ((!empty($this->fecvencompra43) && 'null' != $this->fecvencompra43) || (!empty($format_fields) && isset($format_fields['fecvencompra43'])))
      {
          nm_volta_data($this->fecvencompra43, $this->field_config['fecvencompra43']['date_format']) ; 
          nmgp_Form_Datas($this->fecvencompra43, $this->field_config['fecvencompra43']['date_format'], $this->field_config['fecvencompra43']['date_sep']) ;  
      }
      elseif ('null' == $this->fecvencompra43 || '' == $this->fecvencompra43)
      {
          $this->fecvencompra43 = '';
      }
      if ((!empty($this->fecvenret43) && 'null' != $this->fecvenret43) || (!empty($format_fields) && isset($format_fields['fecvenret43'])))
      {
          nm_volta_data($this->fecvenret43, $this->field_config['fecvenret43']['date_format']) ; 
          nmgp_Form_Datas($this->fecvenret43, $this->field_config['fecvenret43']['date_format'], $this->field_config['fecvenret43']['date_sep']) ;  
      }
      elseif ('null' == $this->fecvenret43 || '' == $this->fecvenret43)
      {
          $this->fecvenret43 = '';
      }
      if ('' !== $this->sdoexeact43 || (!empty($format_fields) && isset($format_fields['sdoexeact43'])))
      {
          nmgp_Form_Num_Val($this->sdoexeact43, $this->field_config['sdoexeact43']['symbol_grp'], $this->field_config['sdoexeact43']['symbol_dec'], "2", "S", $this->field_config['sdoexeact43']['format_neg'], "", "", "-", $this->field_config['sdoexeact43']['symbol_fmt']) ; 
      }
      if ('' !== $this->sdoregact43 || (!empty($format_fields) && isset($format_fields['sdoregact43'])))
      {
          nmgp_Form_Num_Val($this->sdoregact43, $this->field_config['sdoregact43']['symbol_grp'], $this->field_config['sdoregact43']['symbol_dec'], "2", "S", $this->field_config['sdoregact43']['format_neg'], "", "", "-", $this->field_config['sdoregact43']['symbol_fmt']) ; 
      }
      if ('' !== $this->baseret43 || (!empty($format_fields) && isset($format_fields['baseret43'])))
      {
          nmgp_Form_Num_Val($this->baseret43, $this->field_config['baseret43']['symbol_grp'], $this->field_config['baseret43']['symbol_dec'], "2", "S", $this->field_config['baseret43']['format_neg'], "", "", "-", $this->field_config['baseret43']['symbol_fmt']) ; 
      }
      if ('' !== $this->numero_transferencia || (!empty($format_fields) && isset($format_fields['numero_transferencia'])))
      {
          nmgp_Form_Num_Val($this->numero_transferencia, $this->field_config['numero_transferencia']['symbol_grp'], $this->field_config['numero_transferencia']['symbol_dec'], "0", "S", $this->field_config['numero_transferencia']['format_neg'], "", "", "-", $this->field_config['numero_transferencia']['symbol_fmt']) ; 
      }
      if ('' !== $this->estado_electronico || (!empty($format_fields) && isset($format_fields['estado_electronico'])))
      {
          nmgp_Form_Num_Val($this->estado_electronico, $this->field_config['estado_electronico']['symbol_grp'], $this->field_config['estado_electronico']['symbol_dec'], "0", "S", $this->field_config['estado_electronico']['format_neg'], "", "", "-", $this->field_config['estado_electronico']['symbol_fmt']) ; 
      }
      if ('' !== $this->valor_superior_al_maximo || (!empty($format_fields) && isset($format_fields['valor_superior_al_maximo'])))
      {
          nmgp_Form_Num_Val($this->valor_superior_al_maximo, $this->field_config['valor_superior_al_maximo']['symbol_grp'], $this->field_config['valor_superior_al_maximo']['symbol_dec'], "0", "S", $this->field_config['valor_superior_al_maximo']['format_neg'], "", "", "-", $this->field_config['valor_superior_al_maximo']['symbol_fmt']) ; 
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
      $guarda_format_hora = $this->field_config['fecdoc43']['date_format'];
      if ($this->fecdoc43 != "")  
      { 
          $nm_separa_data = strpos($this->field_config['fecdoc43']['date_format'], ";") ;
          $this->field_config['fecdoc43']['date_format'] = substr($this->field_config['fecdoc43']['date_format'], 0, $nm_separa_data) ;
          nm_conv_data($this->fecdoc43, $this->field_config['fecdoc43']['date_format']) ; 
          if ('pdo_sqlsrv' == strtolower($this->Ini->nm_tpbanco) || 'pdo_dblib' == strtolower($this->Ini->nm_tpbanco))
          {
              $this->fecdoc43 = str_replace('-', '', $this->fecdoc43);
          }
          $this->field_config['fecdoc43']['date_format'] = substr($guarda_format_hora, $nm_separa_data + 1) ;
          nm_conv_hora($this->fecdoc43_hora, $this->field_config['fecdoc43']['date_format']) ; 
          if ($this->fecdoc43_hora == "" )  
          { 
              $this->fecdoc43_hora = "00:00:00:000" ; 
          }
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
          {
              $this->fecdoc43_hora = substr($this->fecdoc43_hora, 0, -4) . "." . substr($this->fecdoc43_hora, -3);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
          {
              $this->fecdoc43_hora = substr($this->fecdoc43_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->fecdoc43_hora = substr($this->fecdoc43_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $this->fecdoc43_hora = substr($this->fecdoc43_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $this->fecdoc43_hora = substr($this->fecdoc43_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
          {
              $this->fecdoc43_hora = substr($this->fecdoc43_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          {
              $this->fecdoc43_hora = substr($this->fecdoc43_hora, 0, -4);
          }
          if ($this->fecdoc43 != "")  
          { 
              $this->fecdoc43 .= " " . $this->fecdoc43_hora ; 
          }
      } 
      if ($this->fecdoc43 == "" && $use_null)  
      { 
          $this->fecdoc43 = "null" ; 
      } 
      $this->field_config['fecdoc43']['date_format'] = $guarda_format_hora;
      $guarda_format_hora = $this->field_config['fedoc43']['date_format'];
      if ($this->fedoc43 != "")  
      { 
          $nm_separa_data = strpos($this->field_config['fedoc43']['date_format'], ";") ;
          $this->field_config['fedoc43']['date_format'] = substr($this->field_config['fedoc43']['date_format'], 0, $nm_separa_data) ;
          nm_conv_data($this->fedoc43, $this->field_config['fedoc43']['date_format']) ; 
          if ('pdo_sqlsrv' == strtolower($this->Ini->nm_tpbanco) || 'pdo_dblib' == strtolower($this->Ini->nm_tpbanco))
          {
              $this->fedoc43 = str_replace('-', '', $this->fedoc43);
          }
          $this->field_config['fedoc43']['date_format'] = substr($guarda_format_hora, $nm_separa_data + 1) ;
          nm_conv_hora($this->fedoc43_hora, $this->field_config['fedoc43']['date_format']) ; 
          if ($this->fedoc43_hora == "" )  
          { 
              $this->fedoc43_hora = "00:00:00:000" ; 
          }
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
          {
              $this->fedoc43_hora = substr($this->fedoc43_hora, 0, -4) . "." . substr($this->fedoc43_hora, -3);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
          {
              $this->fedoc43_hora = substr($this->fedoc43_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->fedoc43_hora = substr($this->fedoc43_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $this->fedoc43_hora = substr($this->fedoc43_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $this->fedoc43_hora = substr($this->fedoc43_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
          {
              $this->fedoc43_hora = substr($this->fedoc43_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          {
              $this->fedoc43_hora = substr($this->fedoc43_hora, 0, -4);
          }
          if ($this->fedoc43 != "")  
          { 
              $this->fedoc43 .= " " . $this->fedoc43_hora ; 
          }
      } 
      if ($this->fedoc43 == "" && $use_null)  
      { 
          $this->fedoc43 = "null" ; 
      } 
      $this->field_config['fedoc43']['date_format'] = $guarda_format_hora;
      $guarda_format_hora = $this->field_config['feccobro43']['date_format'];
      if ($this->feccobro43 != "")  
      { 
          nm_conv_data($this->feccobro43, $this->field_config['feccobro43']['date_format']) ; 
          $this->feccobro43_hora = "00:00:00:000" ; 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
          {
              $this->feccobro43_hora = substr($this->feccobro43_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->feccobro43_hora = substr($this->feccobro43_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $this->feccobro43_hora = substr($this->feccobro43_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $this->feccobro43_hora = substr($this->feccobro43_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
          {
              $this->feccobro43_hora = substr($this->feccobro43_hora, 0, -4);
          }
      } 
      if ($this->feccobro43 == "" && $use_null)  
      { 
          $this->feccobro43 = "null" ; 
      } 
      $this->field_config['feccobro43']['date_format'] = $guarda_format_hora;
      $guarda_format_hora = $this->field_config['fectransfer43']['date_format'];
      if ($this->fectransfer43 != "")  
      { 
          nm_conv_data($this->fectransfer43, $this->field_config['fectransfer43']['date_format']) ; 
          $this->fectransfer43_hora = "00:00:00:000" ; 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
          {
              $this->fectransfer43_hora = substr($this->fectransfer43_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->fectransfer43_hora = substr($this->fectransfer43_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $this->fectransfer43_hora = substr($this->fectransfer43_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $this->fectransfer43_hora = substr($this->fectransfer43_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
          {
              $this->fectransfer43_hora = substr($this->fectransfer43_hora, 0, -4);
          }
      } 
      if ($this->fectransfer43 == "" && $use_null)  
      { 
          $this->fectransfer43 = "null" ; 
      } 
      $this->field_config['fectransfer43']['date_format'] = $guarda_format_hora;
      $guarda_format_hora = $this->field_config['fecvencompra43']['date_format'];
      if ($this->fecvencompra43 != "")  
      { 
          nm_conv_data($this->fecvencompra43, $this->field_config['fecvencompra43']['date_format']) ; 
          $this->fecvencompra43_hora = "00:00:00:000" ; 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
          {
              $this->fecvencompra43_hora = substr($this->fecvencompra43_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->fecvencompra43_hora = substr($this->fecvencompra43_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $this->fecvencompra43_hora = substr($this->fecvencompra43_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $this->fecvencompra43_hora = substr($this->fecvencompra43_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
          {
              $this->fecvencompra43_hora = substr($this->fecvencompra43_hora, 0, -4);
          }
      } 
      if ($this->fecvencompra43 == "" && $use_null)  
      { 
          $this->fecvencompra43 = "null" ; 
      } 
      $this->field_config['fecvencompra43']['date_format'] = $guarda_format_hora;
      $guarda_format_hora = $this->field_config['fecvenret43']['date_format'];
      if ($this->fecvenret43 != "")  
      { 
          nm_conv_data($this->fecvenret43, $this->field_config['fecvenret43']['date_format']) ; 
          $this->fecvenret43_hora = "00:00:00:000" ; 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
          {
              $this->fecvenret43_hora = substr($this->fecvenret43_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->fecvenret43_hora = substr($this->fecvenret43_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $this->fecvenret43_hora = substr($this->fecvenret43_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $this->fecvenret43_hora = substr($this->fecvenret43_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
          {
              $this->fecvenret43_hora = substr($this->fecvenret43_hora, 0, -4);
          }
      } 
      if ($this->fecvenret43 == "" && $use_null)  
      { 
          $this->fecvenret43 = "null" ; 
      } 
      $this->field_config['fecvenret43']['date_format'] = $guarda_format_hora;
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
          $this->ajax_return_values_codcte43();
          $this->ajax_return_values_tipodoc43();
          $this->ajax_return_values_numdoc43();
          $this->ajax_return_values_ocurren43();
          $this->ajax_return_values_cocte43();
          $this->ajax_return_values_fecdoc43();
          $this->ajax_return_values_tipdoc43();
          $this->ajax_return_values_numvencob43();
          $this->ajax_return_values_fedoc43();
          $this->ajax_return_values_totdoc43();
          $this->ajax_return_values_detalle43();
          $this->ajax_return_values_cvanioant43();
          $this->ajax_return_values_cvdivisa43();
          $this->ajax_return_values_valdivisa43();
          $this->ajax_return_values_valdivisaori43();
          $this->ajax_return_values_factcompra43();
          $this->ajax_return_values_seriecompra43();
          $this->ajax_return_values_autocompra43();
          $this->ajax_return_values_codret43();
          $this->ajax_return_values_valini43();
          $this->ajax_return_values_numcuotasord43();
          $this->ajax_return_values_valormov43();
          $this->ajax_return_values_saldoregmov43();
          $this->ajax_return_values_feccobro43();
          $this->ajax_return_values_codpagounif43();
          $this->ajax_return_values_tipodocdb43();
          $this->ajax_return_values_numdocdb43();
          $this->ajax_return_values_ocurrecdocdb43();
          $this->ajax_return_values_numrecibo43();
          $this->ajax_return_values_valorabono43();
          $this->ajax_return_values_efectcheque43();
          $this->ajax_return_values_saldoexceso43();
          $this->ajax_return_values_saldocte43();
          $this->ajax_return_values_codpago43();
          $this->ajax_return_values_numdocpago43();
          $this->ajax_return_values_obsdocpago43();
          $this->ajax_return_values_uid();
          $this->ajax_return_values_cvtransfer43();
          $this->ajax_return_values_fectransfer43();
          $this->ajax_return_values_tipoimp43();
          $this->ajax_return_values_porcimp43();
          $this->ajax_return_values_bienserv43();
          $this->ajax_return_values_credgast43();
          $this->ajax_return_values_fecvencompra43();
          $this->ajax_return_values_fecvenret43();
          $this->ajax_return_values_numautoret43();
          $this->ajax_return_values_sdoexeact43();
          $this->ajax_return_values_sdoregact43();
          $this->ajax_return_values_conta43();
          $this->ajax_return_values_cvanulado43();
          $this->ajax_return_values_baseret43();
          $this->ajax_return_values_ret_con_iva43();
          $this->ajax_return_values_retenciones43();
          $this->ajax_return_values_idb();
          $this->ajax_return_values_tipocomptehis();
          $this->ajax_return_values_banco();
          $this->ajax_return_values_numero_transferencia();
          $this->ajax_return_values_estado_electronico();
          $this->ajax_return_values_proyecto();
          $this->ajax_return_values_rubro();
          $this->ajax_return_values_categoria();
          $this->ajax_return_values_tipo_documento_atado();
          $this->ajax_return_values_numero_documento_atado();
          $this->ajax_return_values_valor_superior_al_maximo();
          $this->ajax_return_values_distribucion_retencion();
          if ('navigate_form' == $this->NM_ajax_opcao)
          {
              $this->NM_ajax_info['clearUpload']      = 'S';
              $this->NM_ajax_info['navStatus']['ret'] = $this->Nav_permite_ret ? 'S' : 'N';
              $this->NM_ajax_info['navStatus']['ava'] = $this->Nav_permite_ava ? 'S' : 'N';
              $this->NM_ajax_info['fldList']['codcte43']['keyVal'] = form_movpag_pack_protect_string($this->nmgp_dados_form['codcte43']);
              $this->NM_ajax_info['fldList']['tipodoc43']['keyVal'] = form_movpag_pack_protect_string($this->nmgp_dados_form['tipodoc43']);
              $this->NM_ajax_info['fldList']['numdoc43']['keyVal'] = form_movpag_pack_protect_string($this->nmgp_dados_form['numdoc43']);
              $this->NM_ajax_info['fldList']['ocurren43']['keyVal'] = form_movpag_pack_protect_string($this->nmgp_dados_form['ocurren43']);
          }
   } // ajax_return_values

          //----- codcte43
   function ajax_return_values_codcte43($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("codcte43", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->codcte43);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['codcte43'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($this->form_encode_input($sTmpValue)),
               'labList' => array($this->form_format_readonly("codcte43", $this->form_encode_input($sTmpValue))),
              );
          }
   }

          //----- tipodoc43
   function ajax_return_values_tipodoc43($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("tipodoc43", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->tipodoc43);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['tipodoc43'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($this->form_encode_input($sTmpValue)),
               'labList' => array($this->form_format_readonly("tipodoc43", $this->form_encode_input($sTmpValue))),
              );
          }
   }

          //----- numdoc43
   function ajax_return_values_numdoc43($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("numdoc43", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->numdoc43);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['numdoc43'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($this->form_encode_input($sTmpValue)),
               'labList' => array($this->form_format_readonly("numdoc43", $this->form_encode_input($sTmpValue))),
              );
          }
   }

          //----- ocurren43
   function ajax_return_values_ocurren43($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("ocurren43", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->ocurren43);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['ocurren43'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($this->form_encode_input($sTmpValue)),
               'labList' => array($this->form_format_readonly("ocurren43", $this->form_encode_input($sTmpValue))),
              );
          }
   }

          //----- cocte43
   function ajax_return_values_cocte43($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("cocte43", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->cocte43);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['cocte43'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- fecdoc43
   function ajax_return_values_fecdoc43($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("fecdoc43", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->fecdoc43);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['fecdoc43'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->fecdoc43 . ' ' . $this->fecdoc43_hora),
              );
          }
   }

          //----- tipdoc43
   function ajax_return_values_tipdoc43($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("tipdoc43", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->tipdoc43);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['tipdoc43'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- numvencob43
   function ajax_return_values_numvencob43($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("numvencob43", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->numvencob43);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['numvencob43'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- fedoc43
   function ajax_return_values_fedoc43($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("fedoc43", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->fedoc43);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['fedoc43'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->fedoc43 . ' ' . $this->fedoc43_hora),
              );
          }
   }

          //----- totdoc43
   function ajax_return_values_totdoc43($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("totdoc43", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->totdoc43);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['totdoc43'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- detalle43
   function ajax_return_values_detalle43($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("detalle43", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->detalle43);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['detalle43'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- cvanioant43
   function ajax_return_values_cvanioant43($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("cvanioant43", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->cvanioant43);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['cvanioant43'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- cvdivisa43
   function ajax_return_values_cvdivisa43($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("cvdivisa43", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->cvdivisa43);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['cvdivisa43'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- valdivisa43
   function ajax_return_values_valdivisa43($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("valdivisa43", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->valdivisa43);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['valdivisa43'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- valdivisaori43
   function ajax_return_values_valdivisaori43($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("valdivisaori43", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->valdivisaori43);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['valdivisaori43'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- factcompra43
   function ajax_return_values_factcompra43($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("factcompra43", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->factcompra43);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['factcompra43'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- seriecompra43
   function ajax_return_values_seriecompra43($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("seriecompra43", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->seriecompra43);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['seriecompra43'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- autocompra43
   function ajax_return_values_autocompra43($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("autocompra43", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->autocompra43);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['autocompra43'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- codret43
   function ajax_return_values_codret43($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("codret43", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->codret43);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['codret43'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- valini43
   function ajax_return_values_valini43($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("valini43", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->valini43);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['valini43'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- numcuotasord43
   function ajax_return_values_numcuotasord43($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("numcuotasord43", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->numcuotasord43);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['numcuotasord43'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- valormov43
   function ajax_return_values_valormov43($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("valormov43", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->valormov43);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['valormov43'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- saldoregmov43
   function ajax_return_values_saldoregmov43($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("saldoregmov43", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->saldoregmov43);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['saldoregmov43'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- feccobro43
   function ajax_return_values_feccobro43($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("feccobro43", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->feccobro43);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['feccobro43'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- codpagounif43
   function ajax_return_values_codpagounif43($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("codpagounif43", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->codpagounif43);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['codpagounif43'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- tipodocdb43
   function ajax_return_values_tipodocdb43($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("tipodocdb43", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->tipodocdb43);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['tipodocdb43'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- numdocdb43
   function ajax_return_values_numdocdb43($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("numdocdb43", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->numdocdb43);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['numdocdb43'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- ocurrecdocdb43
   function ajax_return_values_ocurrecdocdb43($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("ocurrecdocdb43", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->ocurrecdocdb43);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['ocurrecdocdb43'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- numrecibo43
   function ajax_return_values_numrecibo43($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("numrecibo43", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->numrecibo43);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['numrecibo43'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- valorabono43
   function ajax_return_values_valorabono43($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("valorabono43", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->valorabono43);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['valorabono43'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- efectcheque43
   function ajax_return_values_efectcheque43($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("efectcheque43", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->efectcheque43);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['efectcheque43'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- saldoexceso43
   function ajax_return_values_saldoexceso43($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("saldoexceso43", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->saldoexceso43);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['saldoexceso43'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- saldocte43
   function ajax_return_values_saldocte43($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("saldocte43", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->saldocte43);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['saldocte43'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- codpago43
   function ajax_return_values_codpago43($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("codpago43", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->codpago43);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['codpago43'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- numdocpago43
   function ajax_return_values_numdocpago43($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("numdocpago43", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->numdocpago43);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['numdocpago43'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- obsdocpago43
   function ajax_return_values_obsdocpago43($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("obsdocpago43", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->obsdocpago43);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['obsdocpago43'] = array(
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
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- cvtransfer43
   function ajax_return_values_cvtransfer43($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("cvtransfer43", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->cvtransfer43);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['cvtransfer43'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- fectransfer43
   function ajax_return_values_fectransfer43($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("fectransfer43", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->fectransfer43);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['fectransfer43'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- tipoimp43
   function ajax_return_values_tipoimp43($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("tipoimp43", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->tipoimp43);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['tipoimp43'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- porcimp43
   function ajax_return_values_porcimp43($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("porcimp43", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->porcimp43);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['porcimp43'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- bienserv43
   function ajax_return_values_bienserv43($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("bienserv43", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->bienserv43);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['bienserv43'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- credgast43
   function ajax_return_values_credgast43($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("credgast43", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->credgast43);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['credgast43'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- fecvencompra43
   function ajax_return_values_fecvencompra43($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("fecvencompra43", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->fecvencompra43);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['fecvencompra43'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- fecvenret43
   function ajax_return_values_fecvenret43($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("fecvenret43", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->fecvenret43);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['fecvenret43'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- numautoret43
   function ajax_return_values_numautoret43($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("numautoret43", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->numautoret43);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['numautoret43'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- sdoexeact43
   function ajax_return_values_sdoexeact43($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("sdoexeact43", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->sdoexeact43);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['sdoexeact43'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- sdoregact43
   function ajax_return_values_sdoregact43($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("sdoregact43", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->sdoregact43);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['sdoregact43'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- conta43
   function ajax_return_values_conta43($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("conta43", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->conta43);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['conta43'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- cvanulado43
   function ajax_return_values_cvanulado43($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("cvanulado43", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->cvanulado43);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['cvanulado43'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- baseret43
   function ajax_return_values_baseret43($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("baseret43", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->baseret43);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['baseret43'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- ret_con_iva43
   function ajax_return_values_ret_con_iva43($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("ret_con_iva43", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->ret_con_iva43);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['ret_con_iva43'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- retenciones43
   function ajax_return_values_retenciones43($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("retenciones43", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->retenciones43);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['retenciones43'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- idb
   function ajax_return_values_idb($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("idb", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->idb);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['idb'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- tipocomptehis
   function ajax_return_values_tipocomptehis($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("tipocomptehis", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->tipocomptehis);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['tipocomptehis'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- banco
   function ajax_return_values_banco($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("banco", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->banco);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['banco'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- numero_transferencia
   function ajax_return_values_numero_transferencia($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("numero_transferencia", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->numero_transferencia);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['numero_transferencia'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
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

          //----- proyecto
   function ajax_return_values_proyecto($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("proyecto", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->proyecto);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['proyecto'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- rubro
   function ajax_return_values_rubro($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("rubro", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->rubro);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['rubro'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- categoria
   function ajax_return_values_categoria($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("categoria", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->categoria);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['categoria'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- tipo_documento_atado
   function ajax_return_values_tipo_documento_atado($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("tipo_documento_atado", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->tipo_documento_atado);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['tipo_documento_atado'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- numero_documento_atado
   function ajax_return_values_numero_documento_atado($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("numero_documento_atado", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->numero_documento_atado);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['numero_documento_atado'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- valor_superior_al_maximo
   function ajax_return_values_valor_superior_al_maximo($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("valor_superior_al_maximo", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->valor_superior_al_maximo);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['valor_superior_al_maximo'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- distribucion_retencion
   function ajax_return_values_distribucion_retencion($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("distribucion_retencion", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->distribucion_retencion);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['distribucion_retencion'] = array(
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
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['upload_dir'][$fieldName]))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['upload_dir'][$fieldName] = array();
            $resDir = @opendir($uploadDir);
            if (!$resDir)
            {
                return $originalName;
            }
            while (false !== ($fileName = @readdir($resDir)))
            {
                if (@is_file($uploadDir . $fileName))
                {
                    $_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['upload_dir'][$fieldName][] = $fileName;
                }
            }
            @closedir($resDir);
        }
        if (!in_array($originalName, $_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['upload_dir'][$fieldName]))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['upload_dir'][$fieldName][] = $originalName;
            return $originalName;
        }
        else
        {
            $newName = $this->fetchFileNextName($originalName, $_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['upload_dir'][$fieldName]);
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['upload_dir'][$fieldName][] = $newName;
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
      $this->totdoc43 = str_replace($sc_parm1, $sc_parm2, $this->totdoc43); 
      $this->valini43 = str_replace($sc_parm1, $sc_parm2, $this->valini43); 
      $this->valormov43 = str_replace($sc_parm1, $sc_parm2, $this->valormov43); 
      $this->saldoregmov43 = str_replace($sc_parm1, $sc_parm2, $this->saldoregmov43); 
      $this->valorabono43 = str_replace($sc_parm1, $sc_parm2, $this->valorabono43); 
      $this->saldoexceso43 = str_replace($sc_parm1, $sc_parm2, $this->saldoexceso43); 
      $this->saldocte43 = str_replace($sc_parm1, $sc_parm2, $this->saldocte43); 
      $this->porcimp43 = str_replace($sc_parm1, $sc_parm2, $this->porcimp43); 
      $this->sdoexeact43 = str_replace($sc_parm1, $sc_parm2, $this->sdoexeact43); 
      $this->sdoregact43 = str_replace($sc_parm1, $sc_parm2, $this->sdoregact43); 
      $this->baseret43 = str_replace($sc_parm1, $sc_parm2, $this->baseret43); 
   } 
   function nm_poe_aspas_decimal() 
   { 
      $this->totdoc43 = "'" . $this->totdoc43 . "'";
      $this->valini43 = "'" . $this->valini43 . "'";
      $this->valormov43 = "'" . $this->valormov43 . "'";
      $this->saldoregmov43 = "'" . $this->saldoregmov43 . "'";
      $this->valorabono43 = "'" . $this->valorabono43 . "'";
      $this->saldoexceso43 = "'" . $this->saldoexceso43 . "'";
      $this->saldocte43 = "'" . $this->saldocte43 . "'";
      $this->porcimp43 = "'" . $this->porcimp43 . "'";
      $this->sdoexeact43 = "'" . $this->sdoexeact43 . "'";
      $this->sdoregact43 = "'" . $this->sdoregact43 . "'";
      $this->baseret43 = "'" . $this->baseret43 . "'";
   } 
   function nm_tira_aspas_decimal() 
   { 
      $this->totdoc43 = str_replace("'", "", $this->totdoc43); 
      $this->valini43 = str_replace("'", "", $this->valini43); 
      $this->valormov43 = str_replace("'", "", $this->valormov43); 
      $this->saldoregmov43 = str_replace("'", "", $this->saldoregmov43); 
      $this->valorabono43 = str_replace("'", "", $this->valorabono43); 
      $this->saldoexceso43 = str_replace("'", "", $this->saldoexceso43); 
      $this->saldocte43 = str_replace("'", "", $this->saldocte43); 
      $this->porcimp43 = str_replace("'", "", $this->porcimp43); 
      $this->sdoexeact43 = str_replace("'", "", $this->sdoexeact43); 
      $this->sdoregact43 = str_replace("'", "", $this->sdoregact43); 
      $this->baseret43 = str_replace("'", "", $this->baseret43); 
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
      $NM_val_form['codcte43'] = $this->codcte43;
      $NM_val_form['tipodoc43'] = $this->tipodoc43;
      $NM_val_form['numdoc43'] = $this->numdoc43;
      $NM_val_form['ocurren43'] = $this->ocurren43;
      $NM_val_form['cocte43'] = $this->cocte43;
      $NM_val_form['fecdoc43'] = $this->fecdoc43;
      $NM_val_form['tipdoc43'] = $this->tipdoc43;
      $NM_val_form['numvencob43'] = $this->numvencob43;
      $NM_val_form['fedoc43'] = $this->fedoc43;
      $NM_val_form['totdoc43'] = $this->totdoc43;
      $NM_val_form['detalle43'] = $this->detalle43;
      $NM_val_form['cvanioant43'] = $this->cvanioant43;
      $NM_val_form['cvdivisa43'] = $this->cvdivisa43;
      $NM_val_form['valdivisa43'] = $this->valdivisa43;
      $NM_val_form['valdivisaori43'] = $this->valdivisaori43;
      $NM_val_form['factcompra43'] = $this->factcompra43;
      $NM_val_form['seriecompra43'] = $this->seriecompra43;
      $NM_val_form['autocompra43'] = $this->autocompra43;
      $NM_val_form['codret43'] = $this->codret43;
      $NM_val_form['valini43'] = $this->valini43;
      $NM_val_form['numcuotasord43'] = $this->numcuotasord43;
      $NM_val_form['valormov43'] = $this->valormov43;
      $NM_val_form['saldoregmov43'] = $this->saldoregmov43;
      $NM_val_form['feccobro43'] = $this->feccobro43;
      $NM_val_form['codpagounif43'] = $this->codpagounif43;
      $NM_val_form['tipodocdb43'] = $this->tipodocdb43;
      $NM_val_form['numdocdb43'] = $this->numdocdb43;
      $NM_val_form['ocurrecdocdb43'] = $this->ocurrecdocdb43;
      $NM_val_form['numrecibo43'] = $this->numrecibo43;
      $NM_val_form['valorabono43'] = $this->valorabono43;
      $NM_val_form['efectcheque43'] = $this->efectcheque43;
      $NM_val_form['saldoexceso43'] = $this->saldoexceso43;
      $NM_val_form['saldocte43'] = $this->saldocte43;
      $NM_val_form['codpago43'] = $this->codpago43;
      $NM_val_form['numdocpago43'] = $this->numdocpago43;
      $NM_val_form['obsdocpago43'] = $this->obsdocpago43;
      $NM_val_form['uid'] = $this->uid;
      $NM_val_form['cvtransfer43'] = $this->cvtransfer43;
      $NM_val_form['fectransfer43'] = $this->fectransfer43;
      $NM_val_form['tipoimp43'] = $this->tipoimp43;
      $NM_val_form['porcimp43'] = $this->porcimp43;
      $NM_val_form['bienserv43'] = $this->bienserv43;
      $NM_val_form['credgast43'] = $this->credgast43;
      $NM_val_form['fecvencompra43'] = $this->fecvencompra43;
      $NM_val_form['fecvenret43'] = $this->fecvenret43;
      $NM_val_form['numautoret43'] = $this->numautoret43;
      $NM_val_form['sdoexeact43'] = $this->sdoexeact43;
      $NM_val_form['sdoregact43'] = $this->sdoregact43;
      $NM_val_form['conta43'] = $this->conta43;
      $NM_val_form['cvanulado43'] = $this->cvanulado43;
      $NM_val_form['baseret43'] = $this->baseret43;
      $NM_val_form['ret_con_iva43'] = $this->ret_con_iva43;
      $NM_val_form['retenciones43'] = $this->retenciones43;
      $NM_val_form['idb'] = $this->idb;
      $NM_val_form['tipocomptehis'] = $this->tipocomptehis;
      $NM_val_form['banco'] = $this->banco;
      $NM_val_form['numero_transferencia'] = $this->numero_transferencia;
      $NM_val_form['estado_electronico'] = $this->estado_electronico;
      $NM_val_form['proyecto'] = $this->proyecto;
      $NM_val_form['rubro'] = $this->rubro;
      $NM_val_form['categoria'] = $this->categoria;
      $NM_val_form['tipo_documento_atado'] = $this->tipo_documento_atado;
      $NM_val_form['numero_documento_atado'] = $this->numero_documento_atado;
      $NM_val_form['valor_superior_al_maximo'] = $this->valor_superior_al_maximo;
      $NM_val_form['distribucion_retencion'] = $this->distribucion_retencion;
      if ($this->totdoc43 === "" || is_null($this->totdoc43))  
      { 
          $this->totdoc43 = 0;
          $this->sc_force_zero[] = 'totdoc43';
      } 
      if ($this->valdivisa43 === "" || is_null($this->valdivisa43))  
      { 
          $this->valdivisa43 = 0;
          $this->sc_force_zero[] = 'valdivisa43';
      } 
      if ($this->valdivisaori43 === "" || is_null($this->valdivisaori43))  
      { 
          $this->valdivisaori43 = 0;
          $this->sc_force_zero[] = 'valdivisaori43';
      } 
      if ($this->valini43 === "" || is_null($this->valini43))  
      { 
          $this->valini43 = 0;
          $this->sc_force_zero[] = 'valini43';
      } 
      if ($this->numcuotasord43 === "" || is_null($this->numcuotasord43))  
      { 
          $this->numcuotasord43 = 0;
          $this->sc_force_zero[] = 'numcuotasord43';
      } 
      if ($this->valormov43 === "" || is_null($this->valormov43))  
      { 
          $this->valormov43 = 0;
          $this->sc_force_zero[] = 'valormov43';
      } 
      if ($this->saldoregmov43 === "" || is_null($this->saldoregmov43))  
      { 
          $this->saldoregmov43 = 0;
          $this->sc_force_zero[] = 'saldoregmov43';
      } 
      if ($this->valorabono43 === "" || is_null($this->valorabono43))  
      { 
          $this->valorabono43 = 0;
          $this->sc_force_zero[] = 'valorabono43';
      } 
      if ($this->saldoexceso43 === "" || is_null($this->saldoexceso43))  
      { 
          $this->saldoexceso43 = 0;
          $this->sc_force_zero[] = 'saldoexceso43';
      } 
      if ($this->saldocte43 === "" || is_null($this->saldocte43))  
      { 
          $this->saldocte43 = 0;
          $this->sc_force_zero[] = 'saldocte43';
      } 
      if ($this->uid === "" || is_null($this->uid))  
      { 
          $this->uid = 0;
          $this->sc_force_zero[] = 'uid';
      } 
      if ($this->nmgp_opcao == "alterar")
      {
      }
      if ($this->tipoimp43 === "" || is_null($this->tipoimp43))  
      { 
          $this->tipoimp43 = 0;
          $this->sc_force_zero[] = 'tipoimp43';
      } 
      if ($this->nmgp_opcao == "alterar")
      {
      if ($this->porcimp43 === "" || is_null($this->porcimp43))  
      { 
          $this->porcimp43 = 0;
          $this->sc_force_zero[] = 'porcimp43';
      } 
      }
      if ($this->bienserv43 === "" || is_null($this->bienserv43))  
      { 
          $this->bienserv43 = 0;
          $this->sc_force_zero[] = 'bienserv43';
      } 
      if ($this->nmgp_opcao == "alterar")
      {
      }
      if ($this->nmgp_opcao == "alterar")
      {
      if ($this->sdoexeact43 === "" || is_null($this->sdoexeact43))  
      { 
          $this->sdoexeact43 = 0;
          $this->sc_force_zero[] = 'sdoexeact43';
      } 
      }
      if ($this->nmgp_opcao == "alterar")
      {
      if ($this->sdoregact43 === "" || is_null($this->sdoregact43))  
      { 
          $this->sdoregact43 = 0;
          $this->sc_force_zero[] = 'sdoregact43';
      } 
      }
      if ($this->nmgp_opcao == "alterar")
      {
      }
      if ($this->nmgp_opcao == "alterar")
      {
      if ($this->baseret43 === "" || is_null($this->baseret43))  
      { 
          $this->baseret43 = 0;
          $this->sc_force_zero[] = 'baseret43';
      } 
      }
      if ($this->numero_transferencia === "" || is_null($this->numero_transferencia))  
      { 
          $this->numero_transferencia = 0;
          $this->sc_force_zero[] = 'numero_transferencia';
      } 
      if ($this->nmgp_opcao == "alterar")
      {
      if ($this->estado_electronico === "" || is_null($this->estado_electronico))  
      { 
          $this->estado_electronico = 0;
          $this->sc_force_zero[] = 'estado_electronico';
      } 
      }
      if ($this->valor_superior_al_maximo === "" || is_null($this->valor_superior_al_maximo))  
      { 
          $this->valor_superior_al_maximo = 0;
          $this->sc_force_zero[] = 'valor_superior_al_maximo';
      } 
      $nm_bases_lob_geral = array_merge($this->Ini->nm_bases_oracle, $this->Ini->nm_bases_ibase, $this->Ini->nm_bases_informix, $this->Ini->nm_bases_mysql, $this->Ini->nm_bases_access, $this->Ini->nm_bases_sqlite, array('pdo_ibm'), array('pdo_sqlsrv'));
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['decimal_db'] == ",") 
      {
          $this->nm_troca_decimal(".", ",");
      }
      if ($this->nmgp_opcao == "alterar" || $this->nmgp_opcao == "incluir") 
      {
          $this->codcte43_before_qstr = $this->codcte43;
          $this->codcte43 = substr($this->Db->qstr($this->codcte43), 1, -1); 
          if ($this->codcte43 == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->codcte43 = "null"; 
              $NM_val_null[] = "codcte43";
          } 
          $this->tipodoc43_before_qstr = $this->tipodoc43;
          $this->tipodoc43 = substr($this->Db->qstr($this->tipodoc43), 1, -1); 
          if ($this->tipodoc43 == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->tipodoc43 = "null"; 
              $NM_val_null[] = "tipodoc43";
          } 
          $this->numdoc43_before_qstr = $this->numdoc43;
          $this->numdoc43 = substr($this->Db->qstr($this->numdoc43), 1, -1); 
          if ($this->numdoc43 == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->numdoc43 = "null"; 
              $NM_val_null[] = "numdoc43";
          } 
          $this->ocurren43_before_qstr = $this->ocurren43;
          $this->ocurren43 = substr($this->Db->qstr($this->ocurren43), 1, -1); 
          if ($this->ocurren43 == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->ocurren43 = "null"; 
              $NM_val_null[] = "ocurren43";
          } 
          $this->cocte43_before_qstr = $this->cocte43;
          $this->cocte43 = substr($this->Db->qstr($this->cocte43), 1, -1); 
          if ($this->cocte43 == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->cocte43 = "null"; 
              $NM_val_null[] = "cocte43";
          } 
          if ($this->fecdoc43 == "")  
          { 
              $this->fecdoc43 = "null"; 
              $NM_val_null[] = "fecdoc43";
          } 
          $this->tipdoc43_before_qstr = $this->tipdoc43;
          $this->tipdoc43 = substr($this->Db->qstr($this->tipdoc43), 1, -1); 
          if ($this->tipdoc43 == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->tipdoc43 = "null"; 
              $NM_val_null[] = "tipdoc43";
          } 
          $this->numvencob43_before_qstr = $this->numvencob43;
          $this->numvencob43 = substr($this->Db->qstr($this->numvencob43), 1, -1); 
          if ($this->numvencob43 == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->numvencob43 = "null"; 
              $NM_val_null[] = "numvencob43";
          } 
          if ($this->fedoc43 == "")  
          { 
              $this->fedoc43 = "null"; 
              $NM_val_null[] = "fedoc43";
          } 
          $this->detalle43_before_qstr = $this->detalle43;
          $this->detalle43 = substr($this->Db->qstr($this->detalle43), 1, -1); 
          if ($this->detalle43 == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->detalle43 = "null"; 
              $NM_val_null[] = "detalle43";
          } 
          $this->cvanioant43_before_qstr = $this->cvanioant43;
          $this->cvanioant43 = substr($this->Db->qstr($this->cvanioant43), 1, -1); 
          if ($this->cvanioant43 == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->cvanioant43 = "null"; 
              $NM_val_null[] = "cvanioant43";
          } 
          $this->cvdivisa43_before_qstr = $this->cvdivisa43;
          $this->cvdivisa43 = substr($this->Db->qstr($this->cvdivisa43), 1, -1); 
          if ($this->cvdivisa43 == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->cvdivisa43 = "null"; 
              $NM_val_null[] = "cvdivisa43";
          } 
          $this->factcompra43_before_qstr = $this->factcompra43;
          $this->factcompra43 = substr($this->Db->qstr($this->factcompra43), 1, -1); 
          if ($this->factcompra43 == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->factcompra43 = "null"; 
              $NM_val_null[] = "factcompra43";
          } 
          $this->seriecompra43_before_qstr = $this->seriecompra43;
          $this->seriecompra43 = substr($this->Db->qstr($this->seriecompra43), 1, -1); 
          if ($this->seriecompra43 == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->seriecompra43 = "null"; 
              $NM_val_null[] = "seriecompra43";
          } 
          $this->autocompra43_before_qstr = $this->autocompra43;
          $this->autocompra43 = substr($this->Db->qstr($this->autocompra43), 1, -1); 
          if ($this->autocompra43 == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->autocompra43 = "null"; 
              $NM_val_null[] = "autocompra43";
          } 
          $this->codret43_before_qstr = $this->codret43;
          $this->codret43 = substr($this->Db->qstr($this->codret43), 1, -1); 
          if ($this->codret43 == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->codret43 = "null"; 
              $NM_val_null[] = "codret43";
          } 
          if ($this->feccobro43 == "")  
          { 
              $this->feccobro43 = "null"; 
              $NM_val_null[] = "feccobro43";
          } 
          $this->codpagounif43_before_qstr = $this->codpagounif43;
          $this->codpagounif43 = substr($this->Db->qstr($this->codpagounif43), 1, -1); 
          if ($this->codpagounif43 == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->codpagounif43 = "null"; 
              $NM_val_null[] = "codpagounif43";
          } 
          $this->tipodocdb43_before_qstr = $this->tipodocdb43;
          $this->tipodocdb43 = substr($this->Db->qstr($this->tipodocdb43), 1, -1); 
          if ($this->tipodocdb43 == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->tipodocdb43 = "null"; 
              $NM_val_null[] = "tipodocdb43";
          } 
          $this->numdocdb43_before_qstr = $this->numdocdb43;
          $this->numdocdb43 = substr($this->Db->qstr($this->numdocdb43), 1, -1); 
          if ($this->numdocdb43 == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->numdocdb43 = "null"; 
              $NM_val_null[] = "numdocdb43";
          } 
          $this->ocurrecdocdb43_before_qstr = $this->ocurrecdocdb43;
          $this->ocurrecdocdb43 = substr($this->Db->qstr($this->ocurrecdocdb43), 1, -1); 
          if ($this->ocurrecdocdb43 == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->ocurrecdocdb43 = "null"; 
              $NM_val_null[] = "ocurrecdocdb43";
          } 
          $this->numrecibo43_before_qstr = $this->numrecibo43;
          $this->numrecibo43 = substr($this->Db->qstr($this->numrecibo43), 1, -1); 
          if ($this->numrecibo43 == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->numrecibo43 = "null"; 
              $NM_val_null[] = "numrecibo43";
          } 
          $this->efectcheque43_before_qstr = $this->efectcheque43;
          $this->efectcheque43 = substr($this->Db->qstr($this->efectcheque43), 1, -1); 
          if ($this->efectcheque43 == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->efectcheque43 = "null"; 
              $NM_val_null[] = "efectcheque43";
          } 
          $this->codpago43_before_qstr = $this->codpago43;
          $this->codpago43 = substr($this->Db->qstr($this->codpago43), 1, -1); 
          if ($this->codpago43 == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->codpago43 = "null"; 
              $NM_val_null[] = "codpago43";
          } 
          $this->numdocpago43_before_qstr = $this->numdocpago43;
          $this->numdocpago43 = substr($this->Db->qstr($this->numdocpago43), 1, -1); 
          if ($this->numdocpago43 == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->numdocpago43 = "null"; 
              $NM_val_null[] = "numdocpago43";
          } 
          $this->obsdocpago43_before_qstr = $this->obsdocpago43;
          $this->obsdocpago43 = substr($this->Db->qstr($this->obsdocpago43), 1, -1); 
          if ($this->obsdocpago43 == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->obsdocpago43 = "null"; 
              $NM_val_null[] = "obsdocpago43";
          } 
          $this->cvtransfer43_before_qstr = $this->cvtransfer43;
          $this->cvtransfer43 = substr($this->Db->qstr($this->cvtransfer43), 1, -1); 
          if ($this->nmgp_opcao == "alterar") 
          {
              if ($this->cvtransfer43 == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
              { 
                  $this->cvtransfer43 = "null"; 
                  $NM_val_null[] = "cvtransfer43";
              } 
          }
          if ($this->fectransfer43 == "")  
          { 
              $this->fectransfer43 = "null"; 
              $NM_val_null[] = "fectransfer43";
          } 
          if ($this->nmgp_opcao == "alterar") 
          {
          }
          $this->credgast43_before_qstr = $this->credgast43;
          $this->credgast43 = substr($this->Db->qstr($this->credgast43), 1, -1); 
          if ($this->nmgp_opcao == "alterar") 
          {
              if ($this->credgast43 == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
              { 
                  $this->credgast43 = "null"; 
                  $NM_val_null[] = "credgast43";
              } 
          }
          if ($this->fecvencompra43 == "")  
          { 
              $this->fecvencompra43 = "null"; 
              $NM_val_null[] = "fecvencompra43";
          } 
          if ($this->fecvenret43 == "")  
          { 
              $this->fecvenret43 = "null"; 
              $NM_val_null[] = "fecvenret43";
          } 
          $this->numautoret43_before_qstr = $this->numautoret43;
          $this->numautoret43 = substr($this->Db->qstr($this->numautoret43), 1, -1); 
          if ($this->numautoret43 == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->numautoret43 = "null"; 
              $NM_val_null[] = "numautoret43";
          } 
          if ($this->nmgp_opcao == "alterar") 
          {
          }
          if ($this->nmgp_opcao == "alterar") 
          {
          }
          $this->conta43_before_qstr = $this->conta43;
          $this->conta43 = substr($this->Db->qstr($this->conta43), 1, -1); 
          if ($this->conta43 == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->conta43 = "null"; 
              $NM_val_null[] = "conta43";
          } 
          $this->cvanulado43_before_qstr = $this->cvanulado43;
          $this->cvanulado43 = substr($this->Db->qstr($this->cvanulado43), 1, -1); 
          if ($this->nmgp_opcao == "alterar") 
          {
              if ($this->cvanulado43 == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
              { 
                  $this->cvanulado43 = "null"; 
                  $NM_val_null[] = "cvanulado43";
              } 
          }
          if ($this->nmgp_opcao == "alterar") 
          {
          }
          $this->ret_con_iva43_before_qstr = $this->ret_con_iva43;
          $this->ret_con_iva43 = substr($this->Db->qstr($this->ret_con_iva43), 1, -1); 
          if ($this->ret_con_iva43 == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->ret_con_iva43 = "null"; 
              $NM_val_null[] = "ret_con_iva43";
          } 
          $this->retenciones43_before_qstr = $this->retenciones43;
          $this->retenciones43 = substr($this->Db->qstr($this->retenciones43), 1, -1); 
          if ($this->retenciones43 == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->retenciones43 = "null"; 
              $NM_val_null[] = "retenciones43";
          } 
          $this->idb_before_qstr = $this->idb;
          $this->idb = substr($this->Db->qstr($this->idb), 1, -1); 
          if ($this->idb == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->idb = "null"; 
              $NM_val_null[] = "idb";
          } 
          $this->tipocomptehis_before_qstr = $this->tipocomptehis;
          $this->tipocomptehis = substr($this->Db->qstr($this->tipocomptehis), 1, -1); 
          if ($this->tipocomptehis == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->tipocomptehis = "null"; 
              $NM_val_null[] = "tipocomptehis";
          } 
          $this->banco_before_qstr = $this->banco;
          $this->banco = substr($this->Db->qstr($this->banco), 1, -1); 
          if ($this->banco == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->banco = "null"; 
              $NM_val_null[] = "banco";
          } 
          if ($this->nmgp_opcao == "alterar") 
          {
          }
          $this->proyecto_before_qstr = $this->proyecto;
          $this->proyecto = substr($this->Db->qstr($this->proyecto), 1, -1); 
          if ($this->proyecto == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->proyecto = "null"; 
              $NM_val_null[] = "proyecto";
          } 
          $this->rubro_before_qstr = $this->rubro;
          $this->rubro = substr($this->Db->qstr($this->rubro), 1, -1); 
          if ($this->rubro == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->rubro = "null"; 
              $NM_val_null[] = "rubro";
          } 
          $this->categoria_before_qstr = $this->categoria;
          $this->categoria = substr($this->Db->qstr($this->categoria), 1, -1); 
          if ($this->categoria == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->categoria = "null"; 
              $NM_val_null[] = "categoria";
          } 
          $this->tipo_documento_atado_before_qstr = $this->tipo_documento_atado;
          $this->tipo_documento_atado = substr($this->Db->qstr($this->tipo_documento_atado), 1, -1); 
          if ($this->tipo_documento_atado == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->tipo_documento_atado = "null"; 
              $NM_val_null[] = "tipo_documento_atado";
          } 
          $this->numero_documento_atado_before_qstr = $this->numero_documento_atado;
          $this->numero_documento_atado = substr($this->Db->qstr($this->numero_documento_atado), 1, -1); 
          if ($this->numero_documento_atado == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->numero_documento_atado = "null"; 
              $NM_val_null[] = "numero_documento_atado";
          } 
          $this->distribucion_retencion_before_qstr = $this->distribucion_retencion;
          $this->distribucion_retencion = substr($this->Db->qstr($this->distribucion_retencion), 1, -1); 
          if ($this->distribucion_retencion == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->distribucion_retencion = "null"; 
              $NM_val_null[] = "distribucion_retencion";
          } 
      }
      if ($this->nmgp_opcao == "alterar") 
      {
          $SC_fields_update = array(); 
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['foreign_key'] as $sFKName => $sFKValue)
              {
                   if (isset($this->sc_conv_var[$sFKName]))
                   {
                       $sFKName = $this->sc_conv_var[$sFKName];
                   }
                  eval("\$this->" . $sFKName . " = \"" . $sFKValue . "\";");
              }
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['decimal_db'] == ",") 
          {
              $this->nm_poe_aspas_decimal();
          }
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where codcte43 = '$this->codcte43' and tipodoc43 = '$this->tipodoc43' and numdoc43 = '$this->numdoc43' and ocurren43 = '$this->ocurren43' ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where codcte43 = '$this->codcte43' and tipodoc43 = '$this->tipodoc43' and numdoc43 = '$this->numdoc43' and ocurren43 = '$this->ocurren43' "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where codcte43 = '$this->codcte43' and tipodoc43 = '$this->tipodoc43' and numdoc43 = '$this->numdoc43' and ocurren43 = '$this->ocurren43' ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where codcte43 = '$this->codcte43' and tipodoc43 = '$this->tipodoc43' and numdoc43 = '$this->numdoc43' and ocurren43 = '$this->ocurren43' "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where codcte43 = '$this->codcte43' and tipodoc43 = '$this->tipodoc43' and numdoc43 = '$this->numdoc43' and ocurren43 = '$this->ocurren43' ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where codcte43 = '$this->codcte43' and tipodoc43 = '$this->tipodoc43' and numdoc43 = '$this->numdoc43' and ocurren43 = '$this->ocurren43' "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where codcte43 = '$this->codcte43' and tipodoc43 = '$this->tipodoc43' and numdoc43 = '$this->numdoc43' and ocurren43 = '$this->ocurren43' ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where codcte43 = '$this->codcte43' and tipodoc43 = '$this->tipodoc43' and numdoc43 = '$this->numdoc43' and ocurren43 = '$this->ocurren43' "); 
          }  
          else  
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where codcte43 = '$this->codcte43' and tipodoc43 = '$this->tipodoc43' and numdoc43 = '$this->numdoc43' and ocurren43 = '$this->ocurren43' ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where codcte43 = '$this->codcte43' and tipodoc43 = '$this->tipodoc43' and numdoc43 = '$this->numdoc43' and ocurren43 = '$this->ocurren43' "); 
          }  
          if ($rs1 === false)  
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
              if ($this->NM_ajax_flag)
              {
                 form_movpag_pack_ajax_response();
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
                  $SC_fields_update[] = "cocte43 = '$this->cocte43', fecdoc43 = #$this->fecdoc43#, tipdoc43 = '$this->tipdoc43', numvencob43 = '$this->numvencob43', fedoc43 = #$this->fedoc43#, totdoc43 = $this->totdoc43, detalle43 = '$this->detalle43', cvanioant43 = '$this->cvanioant43', cvdivisa43 = '$this->cvdivisa43', valdivisa43 = $this->valdivisa43, valdivisaori43 = $this->valdivisaori43, factcompra43 = '$this->factcompra43', seriecompra43 = '$this->seriecompra43', autocompra43 = '$this->autocompra43', codret43 = '$this->codret43', valini43 = $this->valini43, numcuotasord43 = $this->numcuotasord43, valormov43 = $this->valormov43, saldoregmov43 = $this->saldoregmov43, feccobro43 = #$this->feccobro43#, codpagounif43 = '$this->codpagounif43', tipodocdb43 = '$this->tipodocdb43', numdocdb43 = '$this->numdocdb43', ocurrecdocdb43 = '$this->ocurrecdocdb43', numrecibo43 = '$this->numrecibo43', valorabono43 = $this->valorabono43, efectcheque43 = '$this->efectcheque43', saldoexceso43 = $this->saldoexceso43, saldocte43 = $this->saldocte43, codpago43 = '$this->codpago43', numdocpago43 = '$this->numdocpago43', obsdocpago43 = '$this->obsdocpago43', UID = $this->uid, cvtransfer43 = '$this->cvtransfer43', fectransfer43 = #$this->fectransfer43#, tipoimp43 = $this->tipoimp43, porcimp43 = $this->porcimp43, bienserv43 = $this->bienserv43, credgast43 = '$this->credgast43', fecvencompra43 = #$this->fecvencompra43#, fecvenret43 = #$this->fecvenret43#, numautoret43 = '$this->numautoret43', sdoexeact43 = $this->sdoexeact43, sdoregact43 = $this->sdoregact43, conta43 = '$this->conta43', cvanulado43 = '$this->cvanulado43', baseret43 = $this->baseret43, ret_con_iva43 = '$this->ret_con_iva43', retenciones43 = '$this->retenciones43', IDB = '$this->idb', tipocomptehis = '$this->tipocomptehis', banco = '$this->banco', numero_transferencia = $this->numero_transferencia, estado_electronico = $this->estado_electronico, proyecto = '$this->proyecto', rubro = '$this->rubro', categoria = '$this->categoria', tipo_documento_atado = '$this->tipo_documento_atado', numero_documento_atado = '$this->numero_documento_atado', valor_superior_al_maximo = $this->valor_superior_al_maximo, distribucion_retencion = '$this->distribucion_retencion'"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "cocte43 = '$this->cocte43', fecdoc43 = " . $this->Ini->date_delim . $this->fecdoc43 . $this->Ini->date_delim1 . ", tipdoc43 = '$this->tipdoc43', numvencob43 = '$this->numvencob43', fedoc43 = " . $this->Ini->date_delim . $this->fedoc43 . $this->Ini->date_delim1 . ", totdoc43 = $this->totdoc43, detalle43 = '$this->detalle43', cvanioant43 = '$this->cvanioant43', cvdivisa43 = '$this->cvdivisa43', valdivisa43 = $this->valdivisa43, valdivisaori43 = $this->valdivisaori43, factcompra43 = '$this->factcompra43', seriecompra43 = '$this->seriecompra43', autocompra43 = '$this->autocompra43', codret43 = '$this->codret43', valini43 = $this->valini43, numcuotasord43 = $this->numcuotasord43, valormov43 = $this->valormov43, saldoregmov43 = $this->saldoregmov43, feccobro43 = " . $this->Ini->date_delim . $this->feccobro43 . $this->Ini->date_delim1 . ", codpagounif43 = '$this->codpagounif43', tipodocdb43 = '$this->tipodocdb43', numdocdb43 = '$this->numdocdb43', ocurrecdocdb43 = '$this->ocurrecdocdb43', numrecibo43 = '$this->numrecibo43', valorabono43 = $this->valorabono43, efectcheque43 = '$this->efectcheque43', saldoexceso43 = $this->saldoexceso43, saldocte43 = $this->saldocte43, codpago43 = '$this->codpago43', numdocpago43 = '$this->numdocpago43', obsdocpago43 = '$this->obsdocpago43', UID = $this->uid, cvtransfer43 = '$this->cvtransfer43', fectransfer43 = " . $this->Ini->date_delim . $this->fectransfer43 . $this->Ini->date_delim1 . ", tipoimp43 = $this->tipoimp43, porcimp43 = $this->porcimp43, bienserv43 = $this->bienserv43, credgast43 = '$this->credgast43', fecvencompra43 = " . $this->Ini->date_delim . $this->fecvencompra43 . $this->Ini->date_delim1 . ", fecvenret43 = " . $this->Ini->date_delim . $this->fecvenret43 . $this->Ini->date_delim1 . ", numautoret43 = '$this->numautoret43', sdoexeact43 = $this->sdoexeact43, sdoregact43 = $this->sdoregact43, conta43 = '$this->conta43', cvanulado43 = '$this->cvanulado43', baseret43 = $this->baseret43, ret_con_iva43 = '$this->ret_con_iva43', retenciones43 = '$this->retenciones43', IDB = '$this->idb', tipocomptehis = '$this->tipocomptehis', banco = '$this->banco', numero_transferencia = $this->numero_transferencia, estado_electronico = $this->estado_electronico, proyecto = '$this->proyecto', rubro = '$this->rubro', categoria = '$this->categoria', tipo_documento_atado = '$this->tipo_documento_atado', numero_documento_atado = '$this->numero_documento_atado', valor_superior_al_maximo = $this->valor_superior_al_maximo, distribucion_retencion = '$this->distribucion_retencion'"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "cocte43 = '$this->cocte43', fecdoc43 = " . $this->Ini->date_delim . $this->fecdoc43 . $this->Ini->date_delim1 . ", tipdoc43 = '$this->tipdoc43', numvencob43 = '$this->numvencob43', fedoc43 = " . $this->Ini->date_delim . $this->fedoc43 . $this->Ini->date_delim1 . ", totdoc43 = $this->totdoc43, detalle43 = '$this->detalle43', cvanioant43 = '$this->cvanioant43', cvdivisa43 = '$this->cvdivisa43', valdivisa43 = $this->valdivisa43, valdivisaori43 = $this->valdivisaori43, factcompra43 = '$this->factcompra43', seriecompra43 = '$this->seriecompra43', autocompra43 = '$this->autocompra43', codret43 = '$this->codret43', valini43 = $this->valini43, numcuotasord43 = $this->numcuotasord43, valormov43 = $this->valormov43, saldoregmov43 = $this->saldoregmov43, feccobro43 = " . $this->Ini->date_delim . $this->feccobro43 . $this->Ini->date_delim1 . ", codpagounif43 = '$this->codpagounif43', tipodocdb43 = '$this->tipodocdb43', numdocdb43 = '$this->numdocdb43', ocurrecdocdb43 = '$this->ocurrecdocdb43', numrecibo43 = '$this->numrecibo43', valorabono43 = $this->valorabono43, efectcheque43 = '$this->efectcheque43', saldoexceso43 = $this->saldoexceso43, saldocte43 = $this->saldocte43, codpago43 = '$this->codpago43', numdocpago43 = '$this->numdocpago43', obsdocpago43 = '$this->obsdocpago43', UID = $this->uid, cvtransfer43 = '$this->cvtransfer43', fectransfer43 = " . $this->Ini->date_delim . $this->fectransfer43 . $this->Ini->date_delim1 . ", tipoimp43 = $this->tipoimp43, porcimp43 = $this->porcimp43, bienserv43 = $this->bienserv43, credgast43 = '$this->credgast43', fecvencompra43 = " . $this->Ini->date_delim . $this->fecvencompra43 . $this->Ini->date_delim1 . ", fecvenret43 = " . $this->Ini->date_delim . $this->fecvenret43 . $this->Ini->date_delim1 . ", numautoret43 = '$this->numautoret43', sdoexeact43 = $this->sdoexeact43, sdoregact43 = $this->sdoregact43, conta43 = '$this->conta43', cvanulado43 = '$this->cvanulado43', baseret43 = $this->baseret43, ret_con_iva43 = '$this->ret_con_iva43', retenciones43 = '$this->retenciones43', IDB = '$this->idb', tipocomptehis = '$this->tipocomptehis', banco = '$this->banco', numero_transferencia = $this->numero_transferencia, estado_electronico = $this->estado_electronico, proyecto = '$this->proyecto', rubro = '$this->rubro', categoria = '$this->categoria', tipo_documento_atado = '$this->tipo_documento_atado', numero_documento_atado = '$this->numero_documento_atado', valor_superior_al_maximo = $this->valor_superior_al_maximo, distribucion_retencion = '$this->distribucion_retencion'"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "cocte43 = '$this->cocte43', fecdoc43 = EXTEND('$this->fecdoc43', YEAR TO FRACTION), tipdoc43 = '$this->tipdoc43', numvencob43 = '$this->numvencob43', fedoc43 = EXTEND('$this->fedoc43', YEAR TO FRACTION), totdoc43 = $this->totdoc43, detalle43 = '$this->detalle43', cvanioant43 = '$this->cvanioant43', cvdivisa43 = '$this->cvdivisa43', valdivisa43 = $this->valdivisa43, valdivisaori43 = $this->valdivisaori43, factcompra43 = '$this->factcompra43', seriecompra43 = '$this->seriecompra43', autocompra43 = '$this->autocompra43', codret43 = '$this->codret43', valini43 = $this->valini43, numcuotasord43 = $this->numcuotasord43, valormov43 = $this->valormov43, saldoregmov43 = $this->saldoregmov43, feccobro43 = EXTEND('$this->feccobro43', YEAR TO DAY), codpagounif43 = '$this->codpagounif43', tipodocdb43 = '$this->tipodocdb43', numdocdb43 = '$this->numdocdb43', ocurrecdocdb43 = '$this->ocurrecdocdb43', numrecibo43 = '$this->numrecibo43', valorabono43 = $this->valorabono43, efectcheque43 = '$this->efectcheque43', saldoexceso43 = $this->saldoexceso43, saldocte43 = $this->saldocte43, codpago43 = '$this->codpago43', numdocpago43 = '$this->numdocpago43', obsdocpago43 = '$this->obsdocpago43', UID = $this->uid, cvtransfer43 = '$this->cvtransfer43', fectransfer43 = EXTEND('$this->fectransfer43', YEAR TO DAY), tipoimp43 = $this->tipoimp43, porcimp43 = $this->porcimp43, bienserv43 = $this->bienserv43, credgast43 = '$this->credgast43', fecvencompra43 = EXTEND('$this->fecvencompra43', YEAR TO DAY), fecvenret43 = EXTEND('$this->fecvenret43', YEAR TO DAY), numautoret43 = '$this->numautoret43', sdoexeact43 = $this->sdoexeact43, sdoregact43 = $this->sdoregact43, conta43 = '$this->conta43', cvanulado43 = '$this->cvanulado43', baseret43 = $this->baseret43, ret_con_iva43 = '$this->ret_con_iva43', retenciones43 = '$this->retenciones43', IDB = '$this->idb', tipocomptehis = '$this->tipocomptehis', banco = '$this->banco', numero_transferencia = $this->numero_transferencia, estado_electronico = $this->estado_electronico, proyecto = '$this->proyecto', rubro = '$this->rubro', categoria = '$this->categoria', tipo_documento_atado = '$this->tipo_documento_atado', numero_documento_atado = '$this->numero_documento_atado', valor_superior_al_maximo = $this->valor_superior_al_maximo, distribucion_retencion = '$this->distribucion_retencion'"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "cocte43 = '$this->cocte43', fecdoc43 = " . $this->Ini->date_delim . $this->fecdoc43 . $this->Ini->date_delim1 . ", tipdoc43 = '$this->tipdoc43', numvencob43 = '$this->numvencob43', fedoc43 = " . $this->Ini->date_delim . $this->fedoc43 . $this->Ini->date_delim1 . ", totdoc43 = $this->totdoc43, detalle43 = '$this->detalle43', cvanioant43 = '$this->cvanioant43', cvdivisa43 = '$this->cvdivisa43', valdivisa43 = $this->valdivisa43, valdivisaori43 = $this->valdivisaori43, factcompra43 = '$this->factcompra43', seriecompra43 = '$this->seriecompra43', autocompra43 = '$this->autocompra43', codret43 = '$this->codret43', valini43 = $this->valini43, numcuotasord43 = $this->numcuotasord43, valormov43 = $this->valormov43, saldoregmov43 = $this->saldoregmov43, feccobro43 = " . $this->Ini->date_delim . $this->feccobro43 . $this->Ini->date_delim1 . ", codpagounif43 = '$this->codpagounif43', tipodocdb43 = '$this->tipodocdb43', numdocdb43 = '$this->numdocdb43', ocurrecdocdb43 = '$this->ocurrecdocdb43', numrecibo43 = '$this->numrecibo43', valorabono43 = $this->valorabono43, efectcheque43 = '$this->efectcheque43', saldoexceso43 = $this->saldoexceso43, saldocte43 = $this->saldocte43, codpago43 = '$this->codpago43', numdocpago43 = '$this->numdocpago43', obsdocpago43 = '$this->obsdocpago43', UID = $this->uid, cvtransfer43 = '$this->cvtransfer43', fectransfer43 = " . $this->Ini->date_delim . $this->fectransfer43 . $this->Ini->date_delim1 . ", tipoimp43 = $this->tipoimp43, porcimp43 = $this->porcimp43, bienserv43 = $this->bienserv43, credgast43 = '$this->credgast43', fecvencompra43 = " . $this->Ini->date_delim . $this->fecvencompra43 . $this->Ini->date_delim1 . ", fecvenret43 = " . $this->Ini->date_delim . $this->fecvenret43 . $this->Ini->date_delim1 . ", numautoret43 = '$this->numautoret43', sdoexeact43 = $this->sdoexeact43, sdoregact43 = $this->sdoregact43, conta43 = '$this->conta43', cvanulado43 = '$this->cvanulado43', baseret43 = $this->baseret43, ret_con_iva43 = '$this->ret_con_iva43', retenciones43 = '$this->retenciones43', IDB = '$this->idb', tipocomptehis = '$this->tipocomptehis', banco = '$this->banco', numero_transferencia = $this->numero_transferencia, estado_electronico = $this->estado_electronico, proyecto = '$this->proyecto', rubro = '$this->rubro', categoria = '$this->categoria', tipo_documento_atado = '$this->tipo_documento_atado', numero_documento_atado = '$this->numero_documento_atado', valor_superior_al_maximo = $this->valor_superior_al_maximo, distribucion_retencion = '$this->distribucion_retencion'"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "cocte43 = '$this->cocte43', fecdoc43 = " . $this->Ini->date_delim . $this->fecdoc43 . $this->Ini->date_delim1 . ", tipdoc43 = '$this->tipdoc43', numvencob43 = '$this->numvencob43', fedoc43 = " . $this->Ini->date_delim . $this->fedoc43 . $this->Ini->date_delim1 . ", totdoc43 = $this->totdoc43, detalle43 = '$this->detalle43', cvanioant43 = '$this->cvanioant43', cvdivisa43 = '$this->cvdivisa43', valdivisa43 = $this->valdivisa43, valdivisaori43 = $this->valdivisaori43, factcompra43 = '$this->factcompra43', seriecompra43 = '$this->seriecompra43', autocompra43 = '$this->autocompra43', codret43 = '$this->codret43', valini43 = $this->valini43, numcuotasord43 = $this->numcuotasord43, valormov43 = $this->valormov43, saldoregmov43 = $this->saldoregmov43, feccobro43 = " . $this->Ini->date_delim . $this->feccobro43 . $this->Ini->date_delim1 . ", codpagounif43 = '$this->codpagounif43', tipodocdb43 = '$this->tipodocdb43', numdocdb43 = '$this->numdocdb43', ocurrecdocdb43 = '$this->ocurrecdocdb43', numrecibo43 = '$this->numrecibo43', valorabono43 = $this->valorabono43, efectcheque43 = '$this->efectcheque43', saldoexceso43 = $this->saldoexceso43, saldocte43 = $this->saldocte43, codpago43 = '$this->codpago43', numdocpago43 = '$this->numdocpago43', obsdocpago43 = '$this->obsdocpago43', UID = $this->uid, cvtransfer43 = '$this->cvtransfer43', fectransfer43 = " . $this->Ini->date_delim . $this->fectransfer43 . $this->Ini->date_delim1 . ", tipoimp43 = $this->tipoimp43, porcimp43 = $this->porcimp43, bienserv43 = $this->bienserv43, credgast43 = '$this->credgast43', fecvencompra43 = " . $this->Ini->date_delim . $this->fecvencompra43 . $this->Ini->date_delim1 . ", fecvenret43 = " . $this->Ini->date_delim . $this->fecvenret43 . $this->Ini->date_delim1 . ", numautoret43 = '$this->numautoret43', sdoexeact43 = $this->sdoexeact43, sdoregact43 = $this->sdoregact43, conta43 = '$this->conta43', cvanulado43 = '$this->cvanulado43', baseret43 = $this->baseret43, ret_con_iva43 = '$this->ret_con_iva43', retenciones43 = '$this->retenciones43', IDB = '$this->idb', tipocomptehis = '$this->tipocomptehis', banco = '$this->banco', numero_transferencia = $this->numero_transferencia, estado_electronico = $this->estado_electronico, proyecto = '$this->proyecto', rubro = '$this->rubro', categoria = '$this->categoria', tipo_documento_atado = '$this->tipo_documento_atado', numero_documento_atado = '$this->numero_documento_atado', valor_superior_al_maximo = $this->valor_superior_al_maximo, distribucion_retencion = '$this->distribucion_retencion'"; 
              } 
              else 
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "cocte43 = '$this->cocte43', fecdoc43 = " . $this->Ini->date_delim . $this->fecdoc43 . $this->Ini->date_delim1 . ", tipdoc43 = '$this->tipdoc43', numvencob43 = '$this->numvencob43', fedoc43 = " . $this->Ini->date_delim . $this->fedoc43 . $this->Ini->date_delim1 . ", totdoc43 = $this->totdoc43, detalle43 = '$this->detalle43', cvanioant43 = '$this->cvanioant43', cvdivisa43 = '$this->cvdivisa43', valdivisa43 = $this->valdivisa43, valdivisaori43 = $this->valdivisaori43, factcompra43 = '$this->factcompra43', seriecompra43 = '$this->seriecompra43', autocompra43 = '$this->autocompra43', codret43 = '$this->codret43', valini43 = $this->valini43, numcuotasord43 = $this->numcuotasord43, valormov43 = $this->valormov43, saldoregmov43 = $this->saldoregmov43, feccobro43 = " . $this->Ini->date_delim . $this->feccobro43 . $this->Ini->date_delim1 . ", codpagounif43 = '$this->codpagounif43', tipodocdb43 = '$this->tipodocdb43', numdocdb43 = '$this->numdocdb43', ocurrecdocdb43 = '$this->ocurrecdocdb43', numrecibo43 = '$this->numrecibo43', valorabono43 = $this->valorabono43, efectcheque43 = '$this->efectcheque43', saldoexceso43 = $this->saldoexceso43, saldocte43 = $this->saldocte43, codpago43 = '$this->codpago43', numdocpago43 = '$this->numdocpago43', obsdocpago43 = '$this->obsdocpago43', UID = $this->uid, cvtransfer43 = '$this->cvtransfer43', fectransfer43 = " . $this->Ini->date_delim . $this->fectransfer43 . $this->Ini->date_delim1 . ", tipoimp43 = $this->tipoimp43, porcimp43 = $this->porcimp43, bienserv43 = $this->bienserv43, credgast43 = '$this->credgast43', fecvencompra43 = " . $this->Ini->date_delim . $this->fecvencompra43 . $this->Ini->date_delim1 . ", fecvenret43 = " . $this->Ini->date_delim . $this->fecvenret43 . $this->Ini->date_delim1 . ", numautoret43 = '$this->numautoret43', sdoexeact43 = $this->sdoexeact43, sdoregact43 = $this->sdoregact43, conta43 = '$this->conta43', cvanulado43 = '$this->cvanulado43', baseret43 = $this->baseret43, ret_con_iva43 = '$this->ret_con_iva43', retenciones43 = '$this->retenciones43', IDB = '$this->idb', tipocomptehis = '$this->tipocomptehis', banco = '$this->banco', numero_transferencia = $this->numero_transferencia, estado_electronico = $this->estado_electronico, proyecto = '$this->proyecto', rubro = '$this->rubro', categoria = '$this->categoria', tipo_documento_atado = '$this->tipo_documento_atado', numero_documento_atado = '$this->numero_documento_atado', valor_superior_al_maximo = $this->valor_superior_al_maximo, distribucion_retencion = '$this->distribucion_retencion'"; 
              } 
              $comando .= implode(",", $SC_fields_update);  
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              {
                  $comando .= " WHERE codcte43 = '$this->codcte43' and tipodoc43 = '$this->tipodoc43' and numdoc43 = '$this->numdoc43' and ocurren43 = '$this->ocurren43' ";  
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
                  $comando .= " WHERE codcte43 = '$this->codcte43' and tipodoc43 = '$this->tipodoc43' and numdoc43 = '$this->numdoc43' and ocurren43 = '$this->ocurren43' ";  
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              {
                  $comando .= " WHERE codcte43 = '$this->codcte43' and tipodoc43 = '$this->tipodoc43' and numdoc43 = '$this->numdoc43' and ocurren43 = '$this->ocurren43' ";  
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $comando .= " WHERE codcte43 = '$this->codcte43' and tipodoc43 = '$this->tipodoc43' and numdoc43 = '$this->numdoc43' and ocurren43 = '$this->ocurren43' ";  
              }  
              else  
              {
                  $comando .= " WHERE codcte43 = '$this->codcte43' and tipodoc43 = '$this->tipodoc43' and numdoc43 = '$this->numdoc43' and ocurren43 = '$this->ocurren43' ";  
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
                                  form_movpag_pack_ajax_response();
                              }
                              exit;  
                          }   
                      }   
                  }   
              }   
              $this->codcte43 = $this->codcte43_before_qstr;
              $this->tipodoc43 = $this->tipodoc43_before_qstr;
              $this->numdoc43 = $this->numdoc43_before_qstr;
              $this->ocurren43 = $this->ocurren43_before_qstr;
              $this->cocte43 = $this->cocte43_before_qstr;
              $this->tipdoc43 = $this->tipdoc43_before_qstr;
              $this->numvencob43 = $this->numvencob43_before_qstr;
              $this->detalle43 = $this->detalle43_before_qstr;
              $this->cvanioant43 = $this->cvanioant43_before_qstr;
              $this->cvdivisa43 = $this->cvdivisa43_before_qstr;
              $this->factcompra43 = $this->factcompra43_before_qstr;
              $this->seriecompra43 = $this->seriecompra43_before_qstr;
              $this->autocompra43 = $this->autocompra43_before_qstr;
              $this->codret43 = $this->codret43_before_qstr;
              $this->codpagounif43 = $this->codpagounif43_before_qstr;
              $this->tipodocdb43 = $this->tipodocdb43_before_qstr;
              $this->numdocdb43 = $this->numdocdb43_before_qstr;
              $this->ocurrecdocdb43 = $this->ocurrecdocdb43_before_qstr;
              $this->numrecibo43 = $this->numrecibo43_before_qstr;
              $this->efectcheque43 = $this->efectcheque43_before_qstr;
              $this->codpago43 = $this->codpago43_before_qstr;
              $this->numdocpago43 = $this->numdocpago43_before_qstr;
              $this->obsdocpago43 = $this->obsdocpago43_before_qstr;
              $this->cvtransfer43 = $this->cvtransfer43_before_qstr;
              $this->credgast43 = $this->credgast43_before_qstr;
              $this->numautoret43 = $this->numautoret43_before_qstr;
              $this->conta43 = $this->conta43_before_qstr;
              $this->cvanulado43 = $this->cvanulado43_before_qstr;
              $this->ret_con_iva43 = $this->ret_con_iva43_before_qstr;
              $this->retenciones43 = $this->retenciones43_before_qstr;
              $this->idb = $this->idb_before_qstr;
              $this->tipocomptehis = $this->tipocomptehis_before_qstr;
              $this->banco = $this->banco_before_qstr;
              $this->proyecto = $this->proyecto_before_qstr;
              $this->rubro = $this->rubro_before_qstr;
              $this->categoria = $this->categoria_before_qstr;
              $this->tipo_documento_atado = $this->tipo_documento_atado_before_qstr;
              $this->numero_documento_atado = $this->numero_documento_atado_before_qstr;
              $this->distribucion_retencion = $this->distribucion_retencion_before_qstr;
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

              $_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['db_changed'] = true;
              if ($this->NM_ajax_flag) {
                  $this->NM_ajax_info['clearUpload'] = 'S';
              }


              if     (isset($NM_val_form) && isset($NM_val_form['codcte43'])) { $this->codcte43 = $NM_val_form['codcte43']; }
              elseif (isset($this->codcte43)) { $this->nm_limpa_alfa($this->codcte43); }
              if     (isset($NM_val_form) && isset($NM_val_form['tipodoc43'])) { $this->tipodoc43 = $NM_val_form['tipodoc43']; }
              elseif (isset($this->tipodoc43)) { $this->nm_limpa_alfa($this->tipodoc43); }
              if     (isset($NM_val_form) && isset($NM_val_form['numdoc43'])) { $this->numdoc43 = $NM_val_form['numdoc43']; }
              elseif (isset($this->numdoc43)) { $this->nm_limpa_alfa($this->numdoc43); }
              if     (isset($NM_val_form) && isset($NM_val_form['ocurren43'])) { $this->ocurren43 = $NM_val_form['ocurren43']; }
              elseif (isset($this->ocurren43)) { $this->nm_limpa_alfa($this->ocurren43); }
              if     (isset($NM_val_form) && isset($NM_val_form['cocte43'])) { $this->cocte43 = $NM_val_form['cocte43']; }
              elseif (isset($this->cocte43)) { $this->nm_limpa_alfa($this->cocte43); }
              if     (isset($NM_val_form) && isset($NM_val_form['tipdoc43'])) { $this->tipdoc43 = $NM_val_form['tipdoc43']; }
              elseif (isset($this->tipdoc43)) { $this->nm_limpa_alfa($this->tipdoc43); }
              if     (isset($NM_val_form) && isset($NM_val_form['numvencob43'])) { $this->numvencob43 = $NM_val_form['numvencob43']; }
              elseif (isset($this->numvencob43)) { $this->nm_limpa_alfa($this->numvencob43); }
              if     (isset($NM_val_form) && isset($NM_val_form['totdoc43'])) { $this->totdoc43 = $NM_val_form['totdoc43']; }
              elseif (isset($this->totdoc43)) { $this->nm_limpa_alfa($this->totdoc43); }
              if     (isset($NM_val_form) && isset($NM_val_form['detalle43'])) { $this->detalle43 = $NM_val_form['detalle43']; }
              elseif (isset($this->detalle43)) { $this->nm_limpa_alfa($this->detalle43); }
              if     (isset($NM_val_form) && isset($NM_val_form['cvanioant43'])) { $this->cvanioant43 = $NM_val_form['cvanioant43']; }
              elseif (isset($this->cvanioant43)) { $this->nm_limpa_alfa($this->cvanioant43); }
              if     (isset($NM_val_form) && isset($NM_val_form['cvdivisa43'])) { $this->cvdivisa43 = $NM_val_form['cvdivisa43']; }
              elseif (isset($this->cvdivisa43)) { $this->nm_limpa_alfa($this->cvdivisa43); }
              if     (isset($NM_val_form) && isset($NM_val_form['valdivisa43'])) { $this->valdivisa43 = $NM_val_form['valdivisa43']; }
              elseif (isset($this->valdivisa43)) { $this->nm_limpa_alfa($this->valdivisa43); }
              if     (isset($NM_val_form) && isset($NM_val_form['valdivisaori43'])) { $this->valdivisaori43 = $NM_val_form['valdivisaori43']; }
              elseif (isset($this->valdivisaori43)) { $this->nm_limpa_alfa($this->valdivisaori43); }
              if     (isset($NM_val_form) && isset($NM_val_form['factcompra43'])) { $this->factcompra43 = $NM_val_form['factcompra43']; }
              elseif (isset($this->factcompra43)) { $this->nm_limpa_alfa($this->factcompra43); }
              if     (isset($NM_val_form) && isset($NM_val_form['seriecompra43'])) { $this->seriecompra43 = $NM_val_form['seriecompra43']; }
              elseif (isset($this->seriecompra43)) { $this->nm_limpa_alfa($this->seriecompra43); }
              if     (isset($NM_val_form) && isset($NM_val_form['autocompra43'])) { $this->autocompra43 = $NM_val_form['autocompra43']; }
              elseif (isset($this->autocompra43)) { $this->nm_limpa_alfa($this->autocompra43); }
              if     (isset($NM_val_form) && isset($NM_val_form['codret43'])) { $this->codret43 = $NM_val_form['codret43']; }
              elseif (isset($this->codret43)) { $this->nm_limpa_alfa($this->codret43); }
              if     (isset($NM_val_form) && isset($NM_val_form['valini43'])) { $this->valini43 = $NM_val_form['valini43']; }
              elseif (isset($this->valini43)) { $this->nm_limpa_alfa($this->valini43); }
              if     (isset($NM_val_form) && isset($NM_val_form['numcuotasord43'])) { $this->numcuotasord43 = $NM_val_form['numcuotasord43']; }
              elseif (isset($this->numcuotasord43)) { $this->nm_limpa_alfa($this->numcuotasord43); }
              if     (isset($NM_val_form) && isset($NM_val_form['valormov43'])) { $this->valormov43 = $NM_val_form['valormov43']; }
              elseif (isset($this->valormov43)) { $this->nm_limpa_alfa($this->valormov43); }
              if     (isset($NM_val_form) && isset($NM_val_form['saldoregmov43'])) { $this->saldoregmov43 = $NM_val_form['saldoregmov43']; }
              elseif (isset($this->saldoregmov43)) { $this->nm_limpa_alfa($this->saldoregmov43); }
              if     (isset($NM_val_form) && isset($NM_val_form['codpagounif43'])) { $this->codpagounif43 = $NM_val_form['codpagounif43']; }
              elseif (isset($this->codpagounif43)) { $this->nm_limpa_alfa($this->codpagounif43); }
              if     (isset($NM_val_form) && isset($NM_val_form['tipodocdb43'])) { $this->tipodocdb43 = $NM_val_form['tipodocdb43']; }
              elseif (isset($this->tipodocdb43)) { $this->nm_limpa_alfa($this->tipodocdb43); }
              if     (isset($NM_val_form) && isset($NM_val_form['numdocdb43'])) { $this->numdocdb43 = $NM_val_form['numdocdb43']; }
              elseif (isset($this->numdocdb43)) { $this->nm_limpa_alfa($this->numdocdb43); }
              if     (isset($NM_val_form) && isset($NM_val_form['ocurrecdocdb43'])) { $this->ocurrecdocdb43 = $NM_val_form['ocurrecdocdb43']; }
              elseif (isset($this->ocurrecdocdb43)) { $this->nm_limpa_alfa($this->ocurrecdocdb43); }
              if     (isset($NM_val_form) && isset($NM_val_form['numrecibo43'])) { $this->numrecibo43 = $NM_val_form['numrecibo43']; }
              elseif (isset($this->numrecibo43)) { $this->nm_limpa_alfa($this->numrecibo43); }
              if     (isset($NM_val_form) && isset($NM_val_form['valorabono43'])) { $this->valorabono43 = $NM_val_form['valorabono43']; }
              elseif (isset($this->valorabono43)) { $this->nm_limpa_alfa($this->valorabono43); }
              if     (isset($NM_val_form) && isset($NM_val_form['efectcheque43'])) { $this->efectcheque43 = $NM_val_form['efectcheque43']; }
              elseif (isset($this->efectcheque43)) { $this->nm_limpa_alfa($this->efectcheque43); }
              if     (isset($NM_val_form) && isset($NM_val_form['saldoexceso43'])) { $this->saldoexceso43 = $NM_val_form['saldoexceso43']; }
              elseif (isset($this->saldoexceso43)) { $this->nm_limpa_alfa($this->saldoexceso43); }
              if     (isset($NM_val_form) && isset($NM_val_form['saldocte43'])) { $this->saldocte43 = $NM_val_form['saldocte43']; }
              elseif (isset($this->saldocte43)) { $this->nm_limpa_alfa($this->saldocte43); }
              if     (isset($NM_val_form) && isset($NM_val_form['codpago43'])) { $this->codpago43 = $NM_val_form['codpago43']; }
              elseif (isset($this->codpago43)) { $this->nm_limpa_alfa($this->codpago43); }
              if     (isset($NM_val_form) && isset($NM_val_form['numdocpago43'])) { $this->numdocpago43 = $NM_val_form['numdocpago43']; }
              elseif (isset($this->numdocpago43)) { $this->nm_limpa_alfa($this->numdocpago43); }
              if     (isset($NM_val_form) && isset($NM_val_form['obsdocpago43'])) { $this->obsdocpago43 = $NM_val_form['obsdocpago43']; }
              elseif (isset($this->obsdocpago43)) { $this->nm_limpa_alfa($this->obsdocpago43); }
              if     (isset($NM_val_form) && isset($NM_val_form['uid'])) { $this->uid = $NM_val_form['uid']; }
              elseif (isset($this->uid)) { $this->nm_limpa_alfa($this->uid); }
              if     (isset($NM_val_form) && isset($NM_val_form['cvtransfer43'])) { $this->cvtransfer43 = $NM_val_form['cvtransfer43']; }
              elseif (isset($this->cvtransfer43)) { $this->nm_limpa_alfa($this->cvtransfer43); }
              if     (isset($NM_val_form) && isset($NM_val_form['tipoimp43'])) { $this->tipoimp43 = $NM_val_form['tipoimp43']; }
              elseif (isset($this->tipoimp43)) { $this->nm_limpa_alfa($this->tipoimp43); }
              if     (isset($NM_val_form) && isset($NM_val_form['porcimp43'])) { $this->porcimp43 = $NM_val_form['porcimp43']; }
              elseif (isset($this->porcimp43)) { $this->nm_limpa_alfa($this->porcimp43); }
              if     (isset($NM_val_form) && isset($NM_val_form['bienserv43'])) { $this->bienserv43 = $NM_val_form['bienserv43']; }
              elseif (isset($this->bienserv43)) { $this->nm_limpa_alfa($this->bienserv43); }
              if     (isset($NM_val_form) && isset($NM_val_form['credgast43'])) { $this->credgast43 = $NM_val_form['credgast43']; }
              elseif (isset($this->credgast43)) { $this->nm_limpa_alfa($this->credgast43); }
              if     (isset($NM_val_form) && isset($NM_val_form['numautoret43'])) { $this->numautoret43 = $NM_val_form['numautoret43']; }
              elseif (isset($this->numautoret43)) { $this->nm_limpa_alfa($this->numautoret43); }
              if     (isset($NM_val_form) && isset($NM_val_form['sdoexeact43'])) { $this->sdoexeact43 = $NM_val_form['sdoexeact43']; }
              elseif (isset($this->sdoexeact43)) { $this->nm_limpa_alfa($this->sdoexeact43); }
              if     (isset($NM_val_form) && isset($NM_val_form['sdoregact43'])) { $this->sdoregact43 = $NM_val_form['sdoregact43']; }
              elseif (isset($this->sdoregact43)) { $this->nm_limpa_alfa($this->sdoregact43); }
              if     (isset($NM_val_form) && isset($NM_val_form['conta43'])) { $this->conta43 = $NM_val_form['conta43']; }
              elseif (isset($this->conta43)) { $this->nm_limpa_alfa($this->conta43); }
              if     (isset($NM_val_form) && isset($NM_val_form['cvanulado43'])) { $this->cvanulado43 = $NM_val_form['cvanulado43']; }
              elseif (isset($this->cvanulado43)) { $this->nm_limpa_alfa($this->cvanulado43); }
              if     (isset($NM_val_form) && isset($NM_val_form['baseret43'])) { $this->baseret43 = $NM_val_form['baseret43']; }
              elseif (isset($this->baseret43)) { $this->nm_limpa_alfa($this->baseret43); }
              if     (isset($NM_val_form) && isset($NM_val_form['ret_con_iva43'])) { $this->ret_con_iva43 = $NM_val_form['ret_con_iva43']; }
              elseif (isset($this->ret_con_iva43)) { $this->nm_limpa_alfa($this->ret_con_iva43); }
              if     (isset($NM_val_form) && isset($NM_val_form['retenciones43'])) { $this->retenciones43 = $NM_val_form['retenciones43']; }
              elseif (isset($this->retenciones43)) { $this->nm_limpa_alfa($this->retenciones43); }
              if     (isset($NM_val_form) && isset($NM_val_form['idb'])) { $this->idb = $NM_val_form['idb']; }
              elseif (isset($this->idb)) { $this->nm_limpa_alfa($this->idb); }
              if     (isset($NM_val_form) && isset($NM_val_form['tipocomptehis'])) { $this->tipocomptehis = $NM_val_form['tipocomptehis']; }
              elseif (isset($this->tipocomptehis)) { $this->nm_limpa_alfa($this->tipocomptehis); }
              if     (isset($NM_val_form) && isset($NM_val_form['banco'])) { $this->banco = $NM_val_form['banco']; }
              elseif (isset($this->banco)) { $this->nm_limpa_alfa($this->banco); }
              if     (isset($NM_val_form) && isset($NM_val_form['numero_transferencia'])) { $this->numero_transferencia = $NM_val_form['numero_transferencia']; }
              elseif (isset($this->numero_transferencia)) { $this->nm_limpa_alfa($this->numero_transferencia); }
              if     (isset($NM_val_form) && isset($NM_val_form['estado_electronico'])) { $this->estado_electronico = $NM_val_form['estado_electronico']; }
              elseif (isset($this->estado_electronico)) { $this->nm_limpa_alfa($this->estado_electronico); }
              if     (isset($NM_val_form) && isset($NM_val_form['proyecto'])) { $this->proyecto = $NM_val_form['proyecto']; }
              elseif (isset($this->proyecto)) { $this->nm_limpa_alfa($this->proyecto); }
              if     (isset($NM_val_form) && isset($NM_val_form['rubro'])) { $this->rubro = $NM_val_form['rubro']; }
              elseif (isset($this->rubro)) { $this->nm_limpa_alfa($this->rubro); }
              if     (isset($NM_val_form) && isset($NM_val_form['categoria'])) { $this->categoria = $NM_val_form['categoria']; }
              elseif (isset($this->categoria)) { $this->nm_limpa_alfa($this->categoria); }
              if     (isset($NM_val_form) && isset($NM_val_form['tipo_documento_atado'])) { $this->tipo_documento_atado = $NM_val_form['tipo_documento_atado']; }
              elseif (isset($this->tipo_documento_atado)) { $this->nm_limpa_alfa($this->tipo_documento_atado); }
              if     (isset($NM_val_form) && isset($NM_val_form['numero_documento_atado'])) { $this->numero_documento_atado = $NM_val_form['numero_documento_atado']; }
              elseif (isset($this->numero_documento_atado)) { $this->nm_limpa_alfa($this->numero_documento_atado); }
              if     (isset($NM_val_form) && isset($NM_val_form['valor_superior_al_maximo'])) { $this->valor_superior_al_maximo = $NM_val_form['valor_superior_al_maximo']; }
              elseif (isset($this->valor_superior_al_maximo)) { $this->nm_limpa_alfa($this->valor_superior_al_maximo); }
              if     (isset($NM_val_form) && isset($NM_val_form['distribucion_retencion'])) { $this->distribucion_retencion = $NM_val_form['distribucion_retencion']; }
              elseif (isset($this->distribucion_retencion)) { $this->nm_limpa_alfa($this->distribucion_retencion); }

              $this->nm_formatar_campos();
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
              }

              $aOldRefresh               = $this->nmgp_refresh_fields;
              $this->nmgp_refresh_fields = array_diff(array('codcte43', 'tipodoc43', 'numdoc43', 'ocurren43', 'cocte43', 'fecdoc43', 'tipdoc43', 'numvencob43', 'fedoc43', 'totdoc43', 'detalle43', 'cvanioant43', 'cvdivisa43', 'valdivisa43', 'valdivisaori43', 'factcompra43', 'seriecompra43', 'autocompra43', 'codret43', 'valini43', 'numcuotasord43', 'valormov43', 'saldoregmov43', 'feccobro43', 'codpagounif43', 'tipodocdb43', 'numdocdb43', 'ocurrecdocdb43', 'numrecibo43', 'valorabono43', 'efectcheque43', 'saldoexceso43', 'saldocte43', 'codpago43', 'numdocpago43', 'obsdocpago43', 'uid', 'cvtransfer43', 'fectransfer43', 'tipoimp43', 'porcimp43', 'bienserv43', 'credgast43', 'fecvencompra43', 'fecvenret43', 'numautoret43', 'sdoexeact43', 'sdoregact43', 'conta43', 'cvanulado43', 'baseret43', 'ret_con_iva43', 'retenciones43', 'idb', 'tipocomptehis', 'banco', 'numero_transferencia', 'estado_electronico', 'proyecto', 'rubro', 'categoria', 'tipo_documento_atado', 'numero_documento_atado', 'valor_superior_al_maximo', 'distribucion_retencion'), $aDoNotUpdate);
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
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['foreign_key'] as $sFKName => $sFKValue)
              {
                   if (isset($this->sc_conv_var[$sFKName]))
                   {
                       $sFKName = $this->sc_conv_var[$sFKName];
                   }
                  eval("\$this->" . $sFKName . " = \"" . $sFKValue . "\";");
              }
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['decimal_db'] == ",") 
          {
              $this->nm_poe_aspas_decimal();
          }
          $bInsertOk = true;
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where codcte43 = '$this->codcte43' and tipodoc43 = '$this->tipodoc43' and numdoc43 = '$this->numdoc43' and ocurren43 = '$this->ocurren43' "; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where codcte43 = '$this->codcte43' and tipodoc43 = '$this->tipodoc43' and numdoc43 = '$this->numdoc43' and ocurren43 = '$this->ocurren43' "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where codcte43 = '$this->codcte43' and tipodoc43 = '$this->tipodoc43' and numdoc43 = '$this->numdoc43' and ocurren43 = '$this->ocurren43' "; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where codcte43 = '$this->codcte43' and tipodoc43 = '$this->tipodoc43' and numdoc43 = '$this->numdoc43' and ocurren43 = '$this->ocurren43' "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where codcte43 = '$this->codcte43' and tipodoc43 = '$this->tipodoc43' and numdoc43 = '$this->numdoc43' and ocurren43 = '$this->ocurren43' "; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where codcte43 = '$this->codcte43' and tipodoc43 = '$this->tipodoc43' and numdoc43 = '$this->numdoc43' and ocurren43 = '$this->ocurren43' "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where codcte43 = '$this->codcte43' and tipodoc43 = '$this->tipodoc43' and numdoc43 = '$this->numdoc43' and ocurren43 = '$this->ocurren43' "; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where codcte43 = '$this->codcte43' and tipodoc43 = '$this->tipodoc43' and numdoc43 = '$this->numdoc43' and ocurren43 = '$this->ocurren43' "); 
          }  
          else  
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where codcte43 = '$this->codcte43' and tipodoc43 = '$this->tipodoc43' and numdoc43 = '$this->numdoc43' and ocurren43 = '$this->ocurren43' "; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where codcte43 = '$this->codcte43' and tipodoc43 = '$this->tipodoc43' and numdoc43 = '$this->numdoc43' and ocurren43 = '$this->ocurren43' "); 
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
          if (!isset($_POST['nmgp_ins_valid']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['insert_validation'] != $_POST['nmgp_ins_valid'])
          {
              $bInsertOk = false;
              $this->Erro->mensagem(__FILE__, __LINE__, 'security', $this->Ini->Nm_lang['lang_errm_inst_vald']);
              if (isset($_SESSION['scriptcase']['erro_handler']) && $_SESSION['scriptcase']['erro_handler'])
              {
                  $this->nmgp_opcao = 'refresh_insert';
                  if ($this->NM_ajax_flag)
                  {
                      form_movpag_pack_ajax_response();
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
                  if ($this->cvtransfer43 != "")
                  { 
                       $compl_insert     .= ", cvtransfer43";
                       $compl_insert_val .= ", '$this->cvtransfer43'";
                  } 
                  if ($this->porcimp43 != "")
                  { 
                       $compl_insert     .= ", porcimp43";
                       $compl_insert_val .= ", $this->porcimp43";
                  } 
                  if ($this->credgast43 != "")
                  { 
                       $compl_insert     .= ", credgast43";
                       $compl_insert_val .= ", '$this->credgast43'";
                  } 
                  if ($this->sdoexeact43 != "")
                  { 
                       $compl_insert     .= ", sdoexeact43";
                       $compl_insert_val .= ", $this->sdoexeact43";
                  } 
                  if ($this->sdoregact43 != "")
                  { 
                       $compl_insert     .= ", sdoregact43";
                       $compl_insert_val .= ", $this->sdoregact43";
                  } 
                  if ($this->cvanulado43 != "")
                  { 
                       $compl_insert     .= ", cvanulado43";
                       $compl_insert_val .= ", '$this->cvanulado43'";
                  } 
                  if ($this->baseret43 != "")
                  { 
                       $compl_insert     .= ", baseret43";
                       $compl_insert_val .= ", $this->baseret43";
                  } 
                  if ($this->estado_electronico != "")
                  { 
                       $compl_insert     .= ", estado_electronico";
                       $compl_insert_val .= ", $this->estado_electronico";
                  } 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (codcte43, tipodoc43, numdoc43, ocurren43, cocte43, fecdoc43, tipdoc43, numvencob43, fedoc43, totdoc43, detalle43, cvanioant43, cvdivisa43, valdivisa43, valdivisaori43, factcompra43, seriecompra43, autocompra43, codret43, valini43, numcuotasord43, valormov43, saldoregmov43, feccobro43, codpagounif43, tipodocdb43, numdocdb43, ocurrecdocdb43, numrecibo43, valorabono43, efectcheque43, saldoexceso43, saldocte43, codpago43, numdocpago43, obsdocpago43, UID, fectransfer43, tipoimp43, bienserv43, fecvencompra43, fecvenret43, numautoret43, conta43, ret_con_iva43, retenciones43, IDB, tipocomptehis, banco, numero_transferencia, proyecto, rubro, categoria, tipo_documento_atado, numero_documento_atado, valor_superior_al_maximo, distribucion_retencion $compl_insert) VALUES ('$this->codcte43', '$this->tipodoc43', '$this->numdoc43', '$this->ocurren43', '$this->cocte43', #$this->fecdoc43#, '$this->tipdoc43', '$this->numvencob43', #$this->fedoc43#, $this->totdoc43, '$this->detalle43', '$this->cvanioant43', '$this->cvdivisa43', $this->valdivisa43, $this->valdivisaori43, '$this->factcompra43', '$this->seriecompra43', '$this->autocompra43', '$this->codret43', $this->valini43, $this->numcuotasord43, $this->valormov43, $this->saldoregmov43, #$this->feccobro43#, '$this->codpagounif43', '$this->tipodocdb43', '$this->numdocdb43', '$this->ocurrecdocdb43', '$this->numrecibo43', $this->valorabono43, '$this->efectcheque43', $this->saldoexceso43, $this->saldocte43, '$this->codpago43', '$this->numdocpago43', '$this->obsdocpago43', $this->uid, #$this->fectransfer43#, $this->tipoimp43, $this->bienserv43, #$this->fecvencompra43#, #$this->fecvenret43#, '$this->numautoret43', '$this->conta43', '$this->ret_con_iva43', '$this->retenciones43', '$this->idb', '$this->tipocomptehis', '$this->banco', $this->numero_transferencia, '$this->proyecto', '$this->rubro', '$this->categoria', '$this->tipo_documento_atado', '$this->numero_documento_atado', $this->valor_superior_al_maximo, '$this->distribucion_retencion' $compl_insert_val)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              { 
                  $compl_insert     = ""; 
                  $compl_insert_val = ""; 
                  if ($this->cvtransfer43 != "")
                  { 
                       $compl_insert     .= ", cvtransfer43";
                       $compl_insert_val .= ", '$this->cvtransfer43'";
                  } 
                  if ($this->porcimp43 != "")
                  { 
                       $compl_insert     .= ", porcimp43";
                       $compl_insert_val .= ", $this->porcimp43";
                  } 
                  if ($this->credgast43 != "")
                  { 
                       $compl_insert     .= ", credgast43";
                       $compl_insert_val .= ", '$this->credgast43'";
                  } 
                  if ($this->sdoexeact43 != "")
                  { 
                       $compl_insert     .= ", sdoexeact43";
                       $compl_insert_val .= ", $this->sdoexeact43";
                  } 
                  if ($this->sdoregact43 != "")
                  { 
                       $compl_insert     .= ", sdoregact43";
                       $compl_insert_val .= ", $this->sdoregact43";
                  } 
                  if ($this->cvanulado43 != "")
                  { 
                       $compl_insert     .= ", cvanulado43";
                       $compl_insert_val .= ", '$this->cvanulado43'";
                  } 
                  if ($this->baseret43 != "")
                  { 
                       $compl_insert     .= ", baseret43";
                       $compl_insert_val .= ", $this->baseret43";
                  } 
                  if ($this->estado_electronico != "")
                  { 
                       $compl_insert     .= ", estado_electronico";
                       $compl_insert_val .= ", $this->estado_electronico";
                  } 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "codcte43, tipodoc43, numdoc43, ocurren43, cocte43, fecdoc43, tipdoc43, numvencob43, fedoc43, totdoc43, detalle43, cvanioant43, cvdivisa43, valdivisa43, valdivisaori43, factcompra43, seriecompra43, autocompra43, codret43, valini43, numcuotasord43, valormov43, saldoregmov43, feccobro43, codpagounif43, tipodocdb43, numdocdb43, ocurrecdocdb43, numrecibo43, valorabono43, efectcheque43, saldoexceso43, saldocte43, codpago43, numdocpago43, obsdocpago43, UID, fectransfer43, tipoimp43, bienserv43, fecvencompra43, fecvenret43, numautoret43, conta43, ret_con_iva43, retenciones43, IDB, tipocomptehis, banco, numero_transferencia, proyecto, rubro, categoria, tipo_documento_atado, numero_documento_atado, valor_superior_al_maximo, distribucion_retencion $compl_insert) VALUES (" . $NM_seq_auto . "'$this->codcte43', '$this->tipodoc43', '$this->numdoc43', '$this->ocurren43', '$this->cocte43', " . $this->Ini->date_delim . $this->fecdoc43 . $this->Ini->date_delim1 . ", '$this->tipdoc43', '$this->numvencob43', " . $this->Ini->date_delim . $this->fedoc43 . $this->Ini->date_delim1 . ", $this->totdoc43, '$this->detalle43', '$this->cvanioant43', '$this->cvdivisa43', $this->valdivisa43, $this->valdivisaori43, '$this->factcompra43', '$this->seriecompra43', '$this->autocompra43', '$this->codret43', $this->valini43, $this->numcuotasord43, $this->valormov43, $this->saldoregmov43, " . $this->Ini->date_delim . $this->feccobro43 . $this->Ini->date_delim1 . ", '$this->codpagounif43', '$this->tipodocdb43', '$this->numdocdb43', '$this->ocurrecdocdb43', '$this->numrecibo43', $this->valorabono43, '$this->efectcheque43', $this->saldoexceso43, $this->saldocte43, '$this->codpago43', '$this->numdocpago43', '$this->obsdocpago43', $this->uid, " . $this->Ini->date_delim . $this->fectransfer43 . $this->Ini->date_delim1 . ", $this->tipoimp43, $this->bienserv43, " . $this->Ini->date_delim . $this->fecvencompra43 . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->fecvenret43 . $this->Ini->date_delim1 . ", '$this->numautoret43', '$this->conta43', '$this->ret_con_iva43', '$this->retenciones43', '$this->idb', '$this->tipocomptehis', '$this->banco', $this->numero_transferencia, '$this->proyecto', '$this->rubro', '$this->categoria', '$this->tipo_documento_atado', '$this->numero_documento_atado', $this->valor_superior_al_maximo, '$this->distribucion_retencion' $compl_insert_val)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
              { 
                  $compl_insert     = ""; 
                  $compl_insert_val = ""; 
                  if ($this->cvtransfer43 != "")
                  { 
                       $compl_insert     .= ", cvtransfer43";
                       $compl_insert_val .= ", '$this->cvtransfer43'";
                  } 
                  if ($this->porcimp43 != "")
                  { 
                       $compl_insert     .= ", porcimp43";
                       $compl_insert_val .= ", $this->porcimp43";
                  } 
                  if ($this->credgast43 != "")
                  { 
                       $compl_insert     .= ", credgast43";
                       $compl_insert_val .= ", '$this->credgast43'";
                  } 
                  if ($this->sdoexeact43 != "")
                  { 
                       $compl_insert     .= ", sdoexeact43";
                       $compl_insert_val .= ", $this->sdoexeact43";
                  } 
                  if ($this->sdoregact43 != "")
                  { 
                       $compl_insert     .= ", sdoregact43";
                       $compl_insert_val .= ", $this->sdoregact43";
                  } 
                  if ($this->cvanulado43 != "")
                  { 
                       $compl_insert     .= ", cvanulado43";
                       $compl_insert_val .= ", '$this->cvanulado43'";
                  } 
                  if ($this->baseret43 != "")
                  { 
                       $compl_insert     .= ", baseret43";
                       $compl_insert_val .= ", $this->baseret43";
                  } 
                  if ($this->estado_electronico != "")
                  { 
                       $compl_insert     .= ", estado_electronico";
                       $compl_insert_val .= ", $this->estado_electronico";
                  } 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "codcte43, tipodoc43, numdoc43, ocurren43, cocte43, fecdoc43, tipdoc43, numvencob43, fedoc43, totdoc43, detalle43, cvanioant43, cvdivisa43, valdivisa43, valdivisaori43, factcompra43, seriecompra43, autocompra43, codret43, valini43, numcuotasord43, valormov43, saldoregmov43, feccobro43, codpagounif43, tipodocdb43, numdocdb43, ocurrecdocdb43, numrecibo43, valorabono43, efectcheque43, saldoexceso43, saldocte43, codpago43, numdocpago43, obsdocpago43, UID, fectransfer43, tipoimp43, bienserv43, fecvencompra43, fecvenret43, numautoret43, conta43, ret_con_iva43, retenciones43, IDB, tipocomptehis, banco, numero_transferencia, proyecto, rubro, categoria, tipo_documento_atado, numero_documento_atado, valor_superior_al_maximo, distribucion_retencion $compl_insert) VALUES (" . $NM_seq_auto . "'$this->codcte43', '$this->tipodoc43', '$this->numdoc43', '$this->ocurren43', '$this->cocte43', " . $this->Ini->date_delim . $this->fecdoc43 . $this->Ini->date_delim1 . ", '$this->tipdoc43', '$this->numvencob43', " . $this->Ini->date_delim . $this->fedoc43 . $this->Ini->date_delim1 . ", $this->totdoc43, '$this->detalle43', '$this->cvanioant43', '$this->cvdivisa43', $this->valdivisa43, $this->valdivisaori43, '$this->factcompra43', '$this->seriecompra43', '$this->autocompra43', '$this->codret43', $this->valini43, $this->numcuotasord43, $this->valormov43, $this->saldoregmov43, " . $this->Ini->date_delim . $this->feccobro43 . $this->Ini->date_delim1 . ", '$this->codpagounif43', '$this->tipodocdb43', '$this->numdocdb43', '$this->ocurrecdocdb43', '$this->numrecibo43', $this->valorabono43, '$this->efectcheque43', $this->saldoexceso43, $this->saldocte43, '$this->codpago43', '$this->numdocpago43', '$this->obsdocpago43', $this->uid, " . $this->Ini->date_delim . $this->fectransfer43 . $this->Ini->date_delim1 . ", $this->tipoimp43, $this->bienserv43, " . $this->Ini->date_delim . $this->fecvencompra43 . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->fecvenret43 . $this->Ini->date_delim1 . ", '$this->numautoret43', '$this->conta43', '$this->ret_con_iva43', '$this->retenciones43', '$this->idb', '$this->tipocomptehis', '$this->banco', $this->numero_transferencia, '$this->proyecto', '$this->rubro', '$this->categoria', '$this->tipo_documento_atado', '$this->numero_documento_atado', $this->valor_superior_al_maximo, '$this->distribucion_retencion' $compl_insert_val)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              {
                  $compl_insert     = ""; 
                  $compl_insert_val = ""; 
                  if ($this->cvtransfer43 != "")
                  { 
                       $compl_insert     .= ", cvtransfer43";
                       $compl_insert_val .= ", '$this->cvtransfer43'";
                  } 
                  if ($this->porcimp43 != "")
                  { 
                       $compl_insert     .= ", porcimp43";
                       $compl_insert_val .= ", $this->porcimp43";
                  } 
                  if ($this->credgast43 != "")
                  { 
                       $compl_insert     .= ", credgast43";
                       $compl_insert_val .= ", '$this->credgast43'";
                  } 
                  if ($this->sdoexeact43 != "")
                  { 
                       $compl_insert     .= ", sdoexeact43";
                       $compl_insert_val .= ", $this->sdoexeact43";
                  } 
                  if ($this->sdoregact43 != "")
                  { 
                       $compl_insert     .= ", sdoregact43";
                       $compl_insert_val .= ", $this->sdoregact43";
                  } 
                  if ($this->cvanulado43 != "")
                  { 
                       $compl_insert     .= ", cvanulado43";
                       $compl_insert_val .= ", '$this->cvanulado43'";
                  } 
                  if ($this->baseret43 != "")
                  { 
                       $compl_insert     .= ", baseret43";
                       $compl_insert_val .= ", $this->baseret43";
                  } 
                  if ($this->estado_electronico != "")
                  { 
                       $compl_insert     .= ", estado_electronico";
                       $compl_insert_val .= ", $this->estado_electronico";
                  } 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "codcte43, tipodoc43, numdoc43, ocurren43, cocte43, fecdoc43, tipdoc43, numvencob43, fedoc43, totdoc43, detalle43, cvanioant43, cvdivisa43, valdivisa43, valdivisaori43, factcompra43, seriecompra43, autocompra43, codret43, valini43, numcuotasord43, valormov43, saldoregmov43, feccobro43, codpagounif43, tipodocdb43, numdocdb43, ocurrecdocdb43, numrecibo43, valorabono43, efectcheque43, saldoexceso43, saldocte43, codpago43, numdocpago43, obsdocpago43, UID, fectransfer43, tipoimp43, bienserv43, fecvencompra43, fecvenret43, numautoret43, conta43, ret_con_iva43, retenciones43, IDB, tipocomptehis, banco, numero_transferencia, proyecto, rubro, categoria, tipo_documento_atado, numero_documento_atado, valor_superior_al_maximo, distribucion_retencion $compl_insert) VALUES (" . $NM_seq_auto . "'$this->codcte43', '$this->tipodoc43', '$this->numdoc43', '$this->ocurren43', '$this->cocte43', " . $this->Ini->date_delim . $this->fecdoc43 . $this->Ini->date_delim1 . ", '$this->tipdoc43', '$this->numvencob43', " . $this->Ini->date_delim . $this->fedoc43 . $this->Ini->date_delim1 . ", $this->totdoc43, '$this->detalle43', '$this->cvanioant43', '$this->cvdivisa43', $this->valdivisa43, $this->valdivisaori43, '$this->factcompra43', '$this->seriecompra43', '$this->autocompra43', '$this->codret43', $this->valini43, $this->numcuotasord43, $this->valormov43, $this->saldoregmov43, " . $this->Ini->date_delim . $this->feccobro43 . $this->Ini->date_delim1 . ", '$this->codpagounif43', '$this->tipodocdb43', '$this->numdocdb43', '$this->ocurrecdocdb43', '$this->numrecibo43', $this->valorabono43, '$this->efectcheque43', $this->saldoexceso43, $this->saldocte43, '$this->codpago43', '$this->numdocpago43', '$this->obsdocpago43', $this->uid, " . $this->Ini->date_delim . $this->fectransfer43 . $this->Ini->date_delim1 . ", $this->tipoimp43, $this->bienserv43, " . $this->Ini->date_delim . $this->fecvencompra43 . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->fecvenret43 . $this->Ini->date_delim1 . ", '$this->numautoret43', '$this->conta43', '$this->ret_con_iva43', '$this->retenciones43', '$this->idb', '$this->tipocomptehis', '$this->banco', $this->numero_transferencia, '$this->proyecto', '$this->rubro', '$this->categoria', '$this->tipo_documento_atado', '$this->numero_documento_atado', $this->valor_superior_al_maximo, '$this->distribucion_retencion' $compl_insert_val)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $compl_insert     = ""; 
                  $compl_insert_val = ""; 
                  if ($this->cvtransfer43 != "")
                  { 
                       $compl_insert     .= ", cvtransfer43";
                       $compl_insert_val .= ", '$this->cvtransfer43'";
                  } 
                  if ($this->porcimp43 != "")
                  { 
                       $compl_insert     .= ", porcimp43";
                       $compl_insert_val .= ", $this->porcimp43";
                  } 
                  if ($this->credgast43 != "")
                  { 
                       $compl_insert     .= ", credgast43";
                       $compl_insert_val .= ", '$this->credgast43'";
                  } 
                  if ($this->sdoexeact43 != "")
                  { 
                       $compl_insert     .= ", sdoexeact43";
                       $compl_insert_val .= ", $this->sdoexeact43";
                  } 
                  if ($this->sdoregact43 != "")
                  { 
                       $compl_insert     .= ", sdoregact43";
                       $compl_insert_val .= ", $this->sdoregact43";
                  } 
                  if ($this->cvanulado43 != "")
                  { 
                       $compl_insert     .= ", cvanulado43";
                       $compl_insert_val .= ", '$this->cvanulado43'";
                  } 
                  if ($this->baseret43 != "")
                  { 
                       $compl_insert     .= ", baseret43";
                       $compl_insert_val .= ", $this->baseret43";
                  } 
                  if ($this->estado_electronico != "")
                  { 
                       $compl_insert     .= ", estado_electronico";
                       $compl_insert_val .= ", $this->estado_electronico";
                  } 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "codcte43, tipodoc43, numdoc43, ocurren43, cocte43, fecdoc43, tipdoc43, numvencob43, fedoc43, totdoc43, detalle43, cvanioant43, cvdivisa43, valdivisa43, valdivisaori43, factcompra43, seriecompra43, autocompra43, codret43, valini43, numcuotasord43, valormov43, saldoregmov43, feccobro43, codpagounif43, tipodocdb43, numdocdb43, ocurrecdocdb43, numrecibo43, valorabono43, efectcheque43, saldoexceso43, saldocte43, codpago43, numdocpago43, obsdocpago43, UID, fectransfer43, tipoimp43, bienserv43, fecvencompra43, fecvenret43, numautoret43, conta43, ret_con_iva43, retenciones43, IDB, tipocomptehis, banco, numero_transferencia, proyecto, rubro, categoria, tipo_documento_atado, numero_documento_atado, valor_superior_al_maximo, distribucion_retencion $compl_insert) VALUES (" . $NM_seq_auto . "'$this->codcte43', '$this->tipodoc43', '$this->numdoc43', '$this->ocurren43', '$this->cocte43', EXTEND('$this->fecdoc43', YEAR TO FRACTION), '$this->tipdoc43', '$this->numvencob43', EXTEND('$this->fedoc43', YEAR TO FRACTION), $this->totdoc43, '$this->detalle43', '$this->cvanioant43', '$this->cvdivisa43', $this->valdivisa43, $this->valdivisaori43, '$this->factcompra43', '$this->seriecompra43', '$this->autocompra43', '$this->codret43', $this->valini43, $this->numcuotasord43, $this->valormov43, $this->saldoregmov43, EXTEND('$this->feccobro43', YEAR TO DAY), '$this->codpagounif43', '$this->tipodocdb43', '$this->numdocdb43', '$this->ocurrecdocdb43', '$this->numrecibo43', $this->valorabono43, '$this->efectcheque43', $this->saldoexceso43, $this->saldocte43, '$this->codpago43', '$this->numdocpago43', '$this->obsdocpago43', $this->uid, EXTEND('$this->fectransfer43', YEAR TO DAY), $this->tipoimp43, $this->bienserv43, EXTEND('$this->fecvencompra43', YEAR TO DAY), EXTEND('$this->fecvenret43', YEAR TO DAY), '$this->numautoret43', '$this->conta43', '$this->ret_con_iva43', '$this->retenciones43', '$this->idb', '$this->tipocomptehis', '$this->banco', $this->numero_transferencia, '$this->proyecto', '$this->rubro', '$this->categoria', '$this->tipo_documento_atado', '$this->numero_documento_atado', $this->valor_superior_al_maximo, '$this->distribucion_retencion' $compl_insert_val)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
              {
                  $compl_insert     = ""; 
                  $compl_insert_val = ""; 
                  if ($this->cvtransfer43 != "")
                  { 
                       $compl_insert     .= ", cvtransfer43";
                       $compl_insert_val .= ", '$this->cvtransfer43'";
                  } 
                  if ($this->porcimp43 != "")
                  { 
                       $compl_insert     .= ", porcimp43";
                       $compl_insert_val .= ", $this->porcimp43";
                  } 
                  if ($this->credgast43 != "")
                  { 
                       $compl_insert     .= ", credgast43";
                       $compl_insert_val .= ", '$this->credgast43'";
                  } 
                  if ($this->sdoexeact43 != "")
                  { 
                       $compl_insert     .= ", sdoexeact43";
                       $compl_insert_val .= ", $this->sdoexeact43";
                  } 
                  if ($this->sdoregact43 != "")
                  { 
                       $compl_insert     .= ", sdoregact43";
                       $compl_insert_val .= ", $this->sdoregact43";
                  } 
                  if ($this->cvanulado43 != "")
                  { 
                       $compl_insert     .= ", cvanulado43";
                       $compl_insert_val .= ", '$this->cvanulado43'";
                  } 
                  if ($this->baseret43 != "")
                  { 
                       $compl_insert     .= ", baseret43";
                       $compl_insert_val .= ", $this->baseret43";
                  } 
                  if ($this->estado_electronico != "")
                  { 
                       $compl_insert     .= ", estado_electronico";
                       $compl_insert_val .= ", $this->estado_electronico";
                  } 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "codcte43, tipodoc43, numdoc43, ocurren43, cocte43, fecdoc43, tipdoc43, numvencob43, fedoc43, totdoc43, detalle43, cvanioant43, cvdivisa43, valdivisa43, valdivisaori43, factcompra43, seriecompra43, autocompra43, codret43, valini43, numcuotasord43, valormov43, saldoregmov43, feccobro43, codpagounif43, tipodocdb43, numdocdb43, ocurrecdocdb43, numrecibo43, valorabono43, efectcheque43, saldoexceso43, saldocte43, codpago43, numdocpago43, obsdocpago43, UID, fectransfer43, tipoimp43, bienserv43, fecvencompra43, fecvenret43, numautoret43, conta43, ret_con_iva43, retenciones43, IDB, tipocomptehis, banco, numero_transferencia, proyecto, rubro, categoria, tipo_documento_atado, numero_documento_atado, valor_superior_al_maximo, distribucion_retencion $compl_insert) VALUES (" . $NM_seq_auto . "'$this->codcte43', '$this->tipodoc43', '$this->numdoc43', '$this->ocurren43', '$this->cocte43', " . $this->Ini->date_delim . $this->fecdoc43 . $this->Ini->date_delim1 . ", '$this->tipdoc43', '$this->numvencob43', " . $this->Ini->date_delim . $this->fedoc43 . $this->Ini->date_delim1 . ", $this->totdoc43, '$this->detalle43', '$this->cvanioant43', '$this->cvdivisa43', $this->valdivisa43, $this->valdivisaori43, '$this->factcompra43', '$this->seriecompra43', '$this->autocompra43', '$this->codret43', $this->valini43, $this->numcuotasord43, $this->valormov43, $this->saldoregmov43, " . $this->Ini->date_delim . $this->feccobro43 . $this->Ini->date_delim1 . ", '$this->codpagounif43', '$this->tipodocdb43', '$this->numdocdb43', '$this->ocurrecdocdb43', '$this->numrecibo43', $this->valorabono43, '$this->efectcheque43', $this->saldoexceso43, $this->saldocte43, '$this->codpago43', '$this->numdocpago43', '$this->obsdocpago43', $this->uid, " . $this->Ini->date_delim . $this->fectransfer43 . $this->Ini->date_delim1 . ", $this->tipoimp43, $this->bienserv43, " . $this->Ini->date_delim . $this->fecvencompra43 . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->fecvenret43 . $this->Ini->date_delim1 . ", '$this->numautoret43', '$this->conta43', '$this->ret_con_iva43', '$this->retenciones43', '$this->idb', '$this->tipocomptehis', '$this->banco', $this->numero_transferencia, '$this->proyecto', '$this->rubro', '$this->categoria', '$this->tipo_documento_atado', '$this->numero_documento_atado', $this->valor_superior_al_maximo, '$this->distribucion_retencion' $compl_insert_val)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
              {
                  $compl_insert     = ""; 
                  $compl_insert_val = ""; 
                  if ($this->cvtransfer43 != "")
                  { 
                       $compl_insert     .= ", cvtransfer43";
                       $compl_insert_val .= ", '$this->cvtransfer43'";
                  } 
                  if ($this->porcimp43 != "")
                  { 
                       $compl_insert     .= ", porcimp43";
                       $compl_insert_val .= ", $this->porcimp43";
                  } 
                  if ($this->credgast43 != "")
                  { 
                       $compl_insert     .= ", credgast43";
                       $compl_insert_val .= ", '$this->credgast43'";
                  } 
                  if ($this->sdoexeact43 != "")
                  { 
                       $compl_insert     .= ", sdoexeact43";
                       $compl_insert_val .= ", $this->sdoexeact43";
                  } 
                  if ($this->sdoregact43 != "")
                  { 
                       $compl_insert     .= ", sdoregact43";
                       $compl_insert_val .= ", $this->sdoregact43";
                  } 
                  if ($this->cvanulado43 != "")
                  { 
                       $compl_insert     .= ", cvanulado43";
                       $compl_insert_val .= ", '$this->cvanulado43'";
                  } 
                  if ($this->baseret43 != "")
                  { 
                       $compl_insert     .= ", baseret43";
                       $compl_insert_val .= ", $this->baseret43";
                  } 
                  if ($this->estado_electronico != "")
                  { 
                       $compl_insert     .= ", estado_electronico";
                       $compl_insert_val .= ", $this->estado_electronico";
                  } 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "codcte43, tipodoc43, numdoc43, ocurren43, cocte43, fecdoc43, tipdoc43, numvencob43, fedoc43, totdoc43, detalle43, cvanioant43, cvdivisa43, valdivisa43, valdivisaori43, factcompra43, seriecompra43, autocompra43, codret43, valini43, numcuotasord43, valormov43, saldoregmov43, feccobro43, codpagounif43, tipodocdb43, numdocdb43, ocurrecdocdb43, numrecibo43, valorabono43, efectcheque43, saldoexceso43, saldocte43, codpago43, numdocpago43, obsdocpago43, UID, fectransfer43, tipoimp43, bienserv43, fecvencompra43, fecvenret43, numautoret43, conta43, ret_con_iva43, retenciones43, IDB, tipocomptehis, banco, numero_transferencia, proyecto, rubro, categoria, tipo_documento_atado, numero_documento_atado, valor_superior_al_maximo, distribucion_retencion $compl_insert) VALUES (" . $NM_seq_auto . "'$this->codcte43', '$this->tipodoc43', '$this->numdoc43', '$this->ocurren43', '$this->cocte43', " . $this->Ini->date_delim . $this->fecdoc43 . $this->Ini->date_delim1 . ", '$this->tipdoc43', '$this->numvencob43', " . $this->Ini->date_delim . $this->fedoc43 . $this->Ini->date_delim1 . ", $this->totdoc43, '$this->detalle43', '$this->cvanioant43', '$this->cvdivisa43', $this->valdivisa43, $this->valdivisaori43, '$this->factcompra43', '$this->seriecompra43', '$this->autocompra43', '$this->codret43', $this->valini43, $this->numcuotasord43, $this->valormov43, $this->saldoregmov43, " . $this->Ini->date_delim . $this->feccobro43 . $this->Ini->date_delim1 . ", '$this->codpagounif43', '$this->tipodocdb43', '$this->numdocdb43', '$this->ocurrecdocdb43', '$this->numrecibo43', $this->valorabono43, '$this->efectcheque43', $this->saldoexceso43, $this->saldocte43, '$this->codpago43', '$this->numdocpago43', '$this->obsdocpago43', $this->uid, " . $this->Ini->date_delim . $this->fectransfer43 . $this->Ini->date_delim1 . ", $this->tipoimp43, $this->bienserv43, " . $this->Ini->date_delim . $this->fecvencompra43 . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->fecvenret43 . $this->Ini->date_delim1 . ", '$this->numautoret43', '$this->conta43', '$this->ret_con_iva43', '$this->retenciones43', '$this->idb', '$this->tipocomptehis', '$this->banco', $this->numero_transferencia, '$this->proyecto', '$this->rubro', '$this->categoria', '$this->tipo_documento_atado', '$this->numero_documento_atado', $this->valor_superior_al_maximo, '$this->distribucion_retencion' $compl_insert_val)"; 
              }
              elseif ($this->Ini->nm_tpbanco == 'pdo_ibm')
              {
                  $compl_insert     = ""; 
                  $compl_insert_val = ""; 
                  if ($this->cvtransfer43 != "")
                  { 
                       $compl_insert     .= ", cvtransfer43";
                       $compl_insert_val .= ", '$this->cvtransfer43'";
                  } 
                  if ($this->porcimp43 != "")
                  { 
                       $compl_insert     .= ", porcimp43";
                       $compl_insert_val .= ", $this->porcimp43";
                  } 
                  if ($this->credgast43 != "")
                  { 
                       $compl_insert     .= ", credgast43";
                       $compl_insert_val .= ", '$this->credgast43'";
                  } 
                  if ($this->sdoexeact43 != "")
                  { 
                       $compl_insert     .= ", sdoexeact43";
                       $compl_insert_val .= ", $this->sdoexeact43";
                  } 
                  if ($this->sdoregact43 != "")
                  { 
                       $compl_insert     .= ", sdoregact43";
                       $compl_insert_val .= ", $this->sdoregact43";
                  } 
                  if ($this->cvanulado43 != "")
                  { 
                       $compl_insert     .= ", cvanulado43";
                       $compl_insert_val .= ", '$this->cvanulado43'";
                  } 
                  if ($this->baseret43 != "")
                  { 
                       $compl_insert     .= ", baseret43";
                       $compl_insert_val .= ", $this->baseret43";
                  } 
                  if ($this->estado_electronico != "")
                  { 
                       $compl_insert     .= ", estado_electronico";
                       $compl_insert_val .= ", $this->estado_electronico";
                  } 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "codcte43, tipodoc43, numdoc43, ocurren43, cocte43, fecdoc43, tipdoc43, numvencob43, fedoc43, totdoc43, detalle43, cvanioant43, cvdivisa43, valdivisa43, valdivisaori43, factcompra43, seriecompra43, autocompra43, codret43, valini43, numcuotasord43, valormov43, saldoregmov43, feccobro43, codpagounif43, tipodocdb43, numdocdb43, ocurrecdocdb43, numrecibo43, valorabono43, efectcheque43, saldoexceso43, saldocte43, codpago43, numdocpago43, obsdocpago43, UID, fectransfer43, tipoimp43, bienserv43, fecvencompra43, fecvenret43, numautoret43, conta43, ret_con_iva43, retenciones43, IDB, tipocomptehis, banco, numero_transferencia, proyecto, rubro, categoria, tipo_documento_atado, numero_documento_atado, valor_superior_al_maximo, distribucion_retencion $compl_insert) VALUES (" . $NM_seq_auto . "'$this->codcte43', '$this->tipodoc43', '$this->numdoc43', '$this->ocurren43', '$this->cocte43', " . $this->Ini->date_delim . $this->fecdoc43 . $this->Ini->date_delim1 . ", '$this->tipdoc43', '$this->numvencob43', " . $this->Ini->date_delim . $this->fedoc43 . $this->Ini->date_delim1 . ", $this->totdoc43, '$this->detalle43', '$this->cvanioant43', '$this->cvdivisa43', $this->valdivisa43, $this->valdivisaori43, '$this->factcompra43', '$this->seriecompra43', '$this->autocompra43', '$this->codret43', $this->valini43, $this->numcuotasord43, $this->valormov43, $this->saldoregmov43, " . $this->Ini->date_delim . $this->feccobro43 . $this->Ini->date_delim1 . ", '$this->codpagounif43', '$this->tipodocdb43', '$this->numdocdb43', '$this->ocurrecdocdb43', '$this->numrecibo43', $this->valorabono43, '$this->efectcheque43', $this->saldoexceso43, $this->saldocte43, '$this->codpago43', '$this->numdocpago43', '$this->obsdocpago43', $this->uid, " . $this->Ini->date_delim . $this->fectransfer43 . $this->Ini->date_delim1 . ", $this->tipoimp43, $this->bienserv43, " . $this->Ini->date_delim . $this->fecvencompra43 . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->fecvenret43 . $this->Ini->date_delim1 . ", '$this->numautoret43', '$this->conta43', '$this->ret_con_iva43', '$this->retenciones43', '$this->idb', '$this->tipocomptehis', '$this->banco', $this->numero_transferencia, '$this->proyecto', '$this->rubro', '$this->categoria', '$this->tipo_documento_atado', '$this->numero_documento_atado', $this->valor_superior_al_maximo, '$this->distribucion_retencion' $compl_insert_val)"; 
              }
              else
              {
                  $compl_insert     = ""; 
                  $compl_insert_val = ""; 
                  if ($this->cvtransfer43 != "")
                  { 
                       $compl_insert     .= ", cvtransfer43";
                       $compl_insert_val .= ", '$this->cvtransfer43'";
                  } 
                  if ($this->porcimp43 != "")
                  { 
                       $compl_insert     .= ", porcimp43";
                       $compl_insert_val .= ", $this->porcimp43";
                  } 
                  if ($this->credgast43 != "")
                  { 
                       $compl_insert     .= ", credgast43";
                       $compl_insert_val .= ", '$this->credgast43'";
                  } 
                  if ($this->sdoexeact43 != "")
                  { 
                       $compl_insert     .= ", sdoexeact43";
                       $compl_insert_val .= ", $this->sdoexeact43";
                  } 
                  if ($this->sdoregact43 != "")
                  { 
                       $compl_insert     .= ", sdoregact43";
                       $compl_insert_val .= ", $this->sdoregact43";
                  } 
                  if ($this->cvanulado43 != "")
                  { 
                       $compl_insert     .= ", cvanulado43";
                       $compl_insert_val .= ", '$this->cvanulado43'";
                  } 
                  if ($this->baseret43 != "")
                  { 
                       $compl_insert     .= ", baseret43";
                       $compl_insert_val .= ", $this->baseret43";
                  } 
                  if ($this->estado_electronico != "")
                  { 
                       $compl_insert     .= ", estado_electronico";
                       $compl_insert_val .= ", $this->estado_electronico";
                  } 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "codcte43, tipodoc43, numdoc43, ocurren43, cocte43, fecdoc43, tipdoc43, numvencob43, fedoc43, totdoc43, detalle43, cvanioant43, cvdivisa43, valdivisa43, valdivisaori43, factcompra43, seriecompra43, autocompra43, codret43, valini43, numcuotasord43, valormov43, saldoregmov43, feccobro43, codpagounif43, tipodocdb43, numdocdb43, ocurrecdocdb43, numrecibo43, valorabono43, efectcheque43, saldoexceso43, saldocte43, codpago43, numdocpago43, obsdocpago43, UID, fectransfer43, tipoimp43, bienserv43, fecvencompra43, fecvenret43, numautoret43, conta43, ret_con_iva43, retenciones43, IDB, tipocomptehis, banco, numero_transferencia, proyecto, rubro, categoria, tipo_documento_atado, numero_documento_atado, valor_superior_al_maximo, distribucion_retencion $compl_insert) VALUES (" . $NM_seq_auto . "'$this->codcte43', '$this->tipodoc43', '$this->numdoc43', '$this->ocurren43', '$this->cocte43', " . $this->Ini->date_delim . $this->fecdoc43 . $this->Ini->date_delim1 . ", '$this->tipdoc43', '$this->numvencob43', " . $this->Ini->date_delim . $this->fedoc43 . $this->Ini->date_delim1 . ", $this->totdoc43, '$this->detalle43', '$this->cvanioant43', '$this->cvdivisa43', $this->valdivisa43, $this->valdivisaori43, '$this->factcompra43', '$this->seriecompra43', '$this->autocompra43', '$this->codret43', $this->valini43, $this->numcuotasord43, $this->valormov43, $this->saldoregmov43, " . $this->Ini->date_delim . $this->feccobro43 . $this->Ini->date_delim1 . ", '$this->codpagounif43', '$this->tipodocdb43', '$this->numdocdb43', '$this->ocurrecdocdb43', '$this->numrecibo43', $this->valorabono43, '$this->efectcheque43', $this->saldoexceso43, $this->saldocte43, '$this->codpago43', '$this->numdocpago43', '$this->obsdocpago43', $this->uid, " . $this->Ini->date_delim . $this->fectransfer43 . $this->Ini->date_delim1 . ", $this->tipoimp43, $this->bienserv43, " . $this->Ini->date_delim . $this->fecvencompra43 . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->fecvenret43 . $this->Ini->date_delim1 . ", '$this->numautoret43', '$this->conta43', '$this->ret_con_iva43', '$this->retenciones43', '$this->idb', '$this->tipocomptehis', '$this->banco', $this->numero_transferencia, '$this->proyecto', '$this->rubro', '$this->categoria', '$this->tipo_documento_atado', '$this->numero_documento_atado', $this->valor_superior_al_maximo, '$this->distribucion_retencion' $compl_insert_val)"; 
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
                              form_movpag_pack_ajax_response();
                              exit; 
                          }
                      }  
                  }  
              }  
              if ('refresh_insert' != $this->nmgp_opcao)
              {
              $this->codcte43 = $this->codcte43_before_qstr;
              $this->tipodoc43 = $this->tipodoc43_before_qstr;
              $this->numdoc43 = $this->numdoc43_before_qstr;
              $this->ocurren43 = $this->ocurren43_before_qstr;
              $this->cocte43 = $this->cocte43_before_qstr;
              $this->tipdoc43 = $this->tipdoc43_before_qstr;
              $this->numvencob43 = $this->numvencob43_before_qstr;
              $this->detalle43 = $this->detalle43_before_qstr;
              $this->cvanioant43 = $this->cvanioant43_before_qstr;
              $this->cvdivisa43 = $this->cvdivisa43_before_qstr;
              $this->factcompra43 = $this->factcompra43_before_qstr;
              $this->seriecompra43 = $this->seriecompra43_before_qstr;
              $this->autocompra43 = $this->autocompra43_before_qstr;
              $this->codret43 = $this->codret43_before_qstr;
              $this->codpagounif43 = $this->codpagounif43_before_qstr;
              $this->tipodocdb43 = $this->tipodocdb43_before_qstr;
              $this->numdocdb43 = $this->numdocdb43_before_qstr;
              $this->ocurrecdocdb43 = $this->ocurrecdocdb43_before_qstr;
              $this->numrecibo43 = $this->numrecibo43_before_qstr;
              $this->efectcheque43 = $this->efectcheque43_before_qstr;
              $this->codpago43 = $this->codpago43_before_qstr;
              $this->numdocpago43 = $this->numdocpago43_before_qstr;
              $this->obsdocpago43 = $this->obsdocpago43_before_qstr;
              $this->cvtransfer43 = $this->cvtransfer43_before_qstr;
              $this->credgast43 = $this->credgast43_before_qstr;
              $this->numautoret43 = $this->numautoret43_before_qstr;
              $this->conta43 = $this->conta43_before_qstr;
              $this->cvanulado43 = $this->cvanulado43_before_qstr;
              $this->ret_con_iva43 = $this->ret_con_iva43_before_qstr;
              $this->retenciones43 = $this->retenciones43_before_qstr;
              $this->idb = $this->idb_before_qstr;
              $this->tipocomptehis = $this->tipocomptehis_before_qstr;
              $this->banco = $this->banco_before_qstr;
              $this->proyecto = $this->proyecto_before_qstr;
              $this->rubro = $this->rubro_before_qstr;
              $this->categoria = $this->categoria_before_qstr;
              $this->tipo_documento_atado = $this->tipo_documento_atado_before_qstr;
              $this->numero_documento_atado = $this->numero_documento_atado_before_qstr;
              $this->distribucion_retencion = $this->distribucion_retencion_before_qstr;
              }

              $_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['db_changed'] = true;

              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['total']))
              {
                  unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['total']);
              }

              $this->sc_evento = "insert"; 
              $this->codcte43 = $this->codcte43_before_qstr;
              $this->tipodoc43 = $this->tipodoc43_before_qstr;
              $this->numdoc43 = $this->numdoc43_before_qstr;
              $this->ocurren43 = $this->ocurren43_before_qstr;
              $this->cocte43 = $this->cocte43_before_qstr;
              $this->tipdoc43 = $this->tipdoc43_before_qstr;
              $this->numvencob43 = $this->numvencob43_before_qstr;
              $this->detalle43 = $this->detalle43_before_qstr;
              $this->cvanioant43 = $this->cvanioant43_before_qstr;
              $this->cvdivisa43 = $this->cvdivisa43_before_qstr;
              $this->factcompra43 = $this->factcompra43_before_qstr;
              $this->seriecompra43 = $this->seriecompra43_before_qstr;
              $this->autocompra43 = $this->autocompra43_before_qstr;
              $this->codret43 = $this->codret43_before_qstr;
              $this->codpagounif43 = $this->codpagounif43_before_qstr;
              $this->tipodocdb43 = $this->tipodocdb43_before_qstr;
              $this->numdocdb43 = $this->numdocdb43_before_qstr;
              $this->ocurrecdocdb43 = $this->ocurrecdocdb43_before_qstr;
              $this->numrecibo43 = $this->numrecibo43_before_qstr;
              $this->efectcheque43 = $this->efectcheque43_before_qstr;
              $this->codpago43 = $this->codpago43_before_qstr;
              $this->numdocpago43 = $this->numdocpago43_before_qstr;
              $this->obsdocpago43 = $this->obsdocpago43_before_qstr;
              $this->cvtransfer43 = $this->cvtransfer43_before_qstr;
              $this->credgast43 = $this->credgast43_before_qstr;
              $this->numautoret43 = $this->numautoret43_before_qstr;
              $this->conta43 = $this->conta43_before_qstr;
              $this->cvanulado43 = $this->cvanulado43_before_qstr;
              $this->ret_con_iva43 = $this->ret_con_iva43_before_qstr;
              $this->retenciones43 = $this->retenciones43_before_qstr;
              $this->idb = $this->idb_before_qstr;
              $this->tipocomptehis = $this->tipocomptehis_before_qstr;
              $this->banco = $this->banco_before_qstr;
              $this->proyecto = $this->proyecto_before_qstr;
              $this->rubro = $this->rubro_before_qstr;
              $this->categoria = $this->categoria_before_qstr;
              $this->tipo_documento_atado = $this->tipo_documento_atado_before_qstr;
              $this->numero_documento_atado = $this->numero_documento_atado_before_qstr;
              $this->distribucion_retencion = $this->distribucion_retencion_before_qstr;
              $this->sc_insert_on = true; 
              if (empty($this->sc_erro_insert)) {
                  $this->record_insert_ok = true;
              } 
              if ('refresh_insert' != $this->nmgp_opcao && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['sc_redir_insert']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['sc_redir_insert'] != "S"))
              {
              $this->nmgp_opcao = "novo"; 
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['run_iframe'] == "R")
              { 
                   $_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['return_edit'] = "new";
              } 
              }
              $this->nm_flag_iframe = true;
          } 
          if ($this->lig_edit_lookup)
          {
              $this->lig_edit_lookup_call = true;
          }
      } 
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['decimal_db'] == ",") 
      {
          $this->nm_tira_aspas_decimal();
      }
      if ($this->nmgp_opcao == "excluir") 
      { 
          $this->codcte43 = substr($this->Db->qstr($this->codcte43), 1, -1); 
          $this->tipodoc43 = substr($this->Db->qstr($this->tipodoc43), 1, -1); 
          $this->numdoc43 = substr($this->Db->qstr($this->numdoc43), 1, -1); 
          $this->ocurren43 = substr($this->Db->qstr($this->ocurren43), 1, -1); 

          $bDelecaoOk = true;
          $sMsgErro   = '';

          if ($bDelecaoOk)
          {

          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where codcte43 = '$this->codcte43' and tipodoc43 = '$this->tipodoc43' and numdoc43 = '$this->numdoc43' and ocurren43 = '$this->ocurren43'"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where codcte43 = '$this->codcte43' and tipodoc43 = '$this->tipodoc43' and numdoc43 = '$this->numdoc43' and ocurren43 = '$this->ocurren43' "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where codcte43 = '$this->codcte43' and tipodoc43 = '$this->tipodoc43' and numdoc43 = '$this->numdoc43' and ocurren43 = '$this->ocurren43'"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where codcte43 = '$this->codcte43' and tipodoc43 = '$this->tipodoc43' and numdoc43 = '$this->numdoc43' and ocurren43 = '$this->ocurren43' "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where codcte43 = '$this->codcte43' and tipodoc43 = '$this->tipodoc43' and numdoc43 = '$this->numdoc43' and ocurren43 = '$this->ocurren43'"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where codcte43 = '$this->codcte43' and tipodoc43 = '$this->tipodoc43' and numdoc43 = '$this->numdoc43' and ocurren43 = '$this->ocurren43' "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where codcte43 = '$this->codcte43' and tipodoc43 = '$this->tipodoc43' and numdoc43 = '$this->numdoc43' and ocurren43 = '$this->ocurren43'"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where codcte43 = '$this->codcte43' and tipodoc43 = '$this->tipodoc43' and numdoc43 = '$this->numdoc43' and ocurren43 = '$this->ocurren43' "); 
          }  
          else  
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where codcte43 = '$this->codcte43' and tipodoc43 = '$this->tipodoc43' and numdoc43 = '$this->numdoc43' and ocurren43 = '$this->ocurren43'"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where codcte43 = '$this->codcte43' and tipodoc43 = '$this->tipodoc43' and numdoc43 = '$this->numdoc43' and ocurren43 = '$this->ocurren43' "); 
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
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where codcte43 = '$this->codcte43' and tipodoc43 = '$this->tipodoc43' and numdoc43 = '$this->numdoc43' and ocurren43 = '$this->ocurren43' "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where codcte43 = '$this->codcte43' and tipodoc43 = '$this->tipodoc43' and numdoc43 = '$this->numdoc43' and ocurren43 = '$this->ocurren43' "); 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where codcte43 = '$this->codcte43' and tipodoc43 = '$this->tipodoc43' and numdoc43 = '$this->numdoc43' and ocurren43 = '$this->ocurren43' "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where codcte43 = '$this->codcte43' and tipodoc43 = '$this->tipodoc43' and numdoc43 = '$this->numdoc43' and ocurren43 = '$this->ocurren43' "); 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              {
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where codcte43 = '$this->codcte43' and tipodoc43 = '$this->tipodoc43' and numdoc43 = '$this->numdoc43' and ocurren43 = '$this->ocurren43' "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where codcte43 = '$this->codcte43' and tipodoc43 = '$this->tipodoc43' and numdoc43 = '$this->numdoc43' and ocurren43 = '$this->ocurren43' "); 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where codcte43 = '$this->codcte43' and tipodoc43 = '$this->tipodoc43' and numdoc43 = '$this->numdoc43' and ocurren43 = '$this->ocurren43' "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where codcte43 = '$this->codcte43' and tipodoc43 = '$this->tipodoc43' and numdoc43 = '$this->numdoc43' and ocurren43 = '$this->ocurren43' "); 
              }  
              else  
              {
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where codcte43 = '$this->codcte43' and tipodoc43 = '$this->tipodoc43' and numdoc43 = '$this->numdoc43' and ocurren43 = '$this->ocurren43' "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where codcte43 = '$this->codcte43' and tipodoc43 = '$this->tipodoc43' and numdoc43 = '$this->numdoc43' and ocurren43 = '$this->ocurren43' "); 
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
                          form_movpag_pack_ajax_response();
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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['reg_start']--; 
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['reg_start'] < 0)
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['reg_start'] = 0; 
              }

              $_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['db_changed'] = true;

              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['total']))
              {
                  unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['total']);
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
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['parms'] = "codcte43?#?$this->codcte43?@?tipodoc43?#?$this->tipodoc43?@?numdoc43?#?$this->numdoc43?@?ocurren43?#?$this->ocurren43?@?"; 
      }
      $this->NM_commit_db(); 
      if ($this->sc_evento != "insert" && $this->sc_evento != "update" && $this->sc_evento != "delete")
      { 
          $this->codcte43 = null === $this->codcte43 ? null : substr($this->Db->qstr($this->codcte43), 1, -1); 
          $this->tipodoc43 = null === $this->tipodoc43 ? null : substr($this->Db->qstr($this->tipodoc43), 1, -1); 
          $this->numdoc43 = null === $this->numdoc43 ? null : substr($this->Db->qstr($this->numdoc43), 1, -1); 
          $this->ocurren43 = null === $this->ocurren43 ? null : substr($this->Db->qstr($this->ocurren43), 1, -1); 
      } 
      if (isset($this->NM_where_filter))
      {
          $this->NM_where_filter = str_replace("@percent@", "%", $this->NM_where_filter);
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['where_filter'] = trim($this->NM_where_filter);
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['total']))
          {
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['total']);
          }
      }
      $sc_where_filter = '';
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['where_filter_form']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['where_filter_form'])
      {
          $sc_where_filter = $_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['where_filter_form'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['where_filter']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['where_filter'] && $sc_where_filter != $_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['where_filter'])
      {
          if (empty($sc_where_filter))
          {
              $sc_where_filter = $_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['where_filter'];
          }
          else
          {
              $sc_where_filter .= " and (" . $_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['where_filter'] . ")";
          }
      }
//------------ 
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['run_iframe'] == "R")
      {
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['iframe_evento'] == "insert") 
          { 
               $this->nmgp_opcao = "novo"; 
               $_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['select'] = "";
          } 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['iframe_evento'] = $this->sc_evento; 
      } 
      if (!isset($this->nmgp_opcao) || empty($this->nmgp_opcao)) 
      { 
          if (empty($this->codcte43) && empty($this->tipodoc43) && empty($this->numdoc43) && empty($this->ocurren43)) 
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
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['run_iframe'] == "F" && $this->sc_evento == "insert")
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
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['total']))
      { 
          $nmgp_select = "SELECT count(*) AS countTest from " . $this->Ini->nm_tabela . $sc_where; 
          $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
          $rt = $this->Db->Execute($nmgp_select) ; 
          if ($rt === false && !$rt->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
              exit ; 
          }  
          $qt_geral_reg_form_movpag = isset($rt->fields[0]) ? $rt->fields[0] - 1 : 0; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['total'] = $qt_geral_reg_form_movpag;
          $rt->Close(); 
          if ($this->nmgp_opcao == "igual" && isset($this->NM_btn_navega) && 'S' == $this->NM_btn_navega && !empty($this->codcte43) && !empty($this->tipodoc43) && !empty($this->numdoc43) && !empty($this->ocurren43))
          {
              $Reg_OK      = false;
              $Count_start = -1;
              $sc_order_by = "";
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
                  $Sel_Chave = "codcte43, tipodoc43, numdoc43, ocurren43"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              {
                  $Sel_Chave = "codcte43, tipodoc43, numdoc43, ocurren43"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $Sel_Chave = "codcte43, tipodoc43, numdoc43, ocurren43"; 
              }
              else  
              {
                  $Sel_Chave = "codcte43, tipodoc43, numdoc43, ocurren43"; 
              }
              $nmgp_select = "SELECT " . $Sel_Chave . " from " . $this->Ini->nm_tabela . $sc_where; 
              $sc_order_by = "codcte43, tipodoc43, numdoc43, ocurren43";
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
                  if ($rt->fields[0] == $this->codcte43 && $rt->fields[1] == $this->tipodoc43 && $rt->fields[2] == $this->numdoc43 && $rt->fields[3] == $this->ocurren43)
                  { 
                      $Reg_OK = true;
                  }  
                  $Count_start++;
                  $rt->MoveNext();
              }  
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['reg_start'] = $Count_start;
              $rt->Close(); 
          }
      } 
      else 
      { 
          $qt_geral_reg_form_movpag = $_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['total'];
      } 
      if ($this->nmgp_opcao == "inicio") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['reg_start'] = 0; 
      } 
      if ($this->nmgp_opcao == "avanca")  
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['reg_start']++; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['reg_start'] > $qt_geral_reg_form_movpag)
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['reg_start'] = $qt_geral_reg_form_movpag; 
          }
      } 
      if ($this->nmgp_opcao == "retorna") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['reg_start']--; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['reg_start'] < 0)
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['reg_start'] = 0; 
          }
      } 
      if ($this->nmgp_opcao == "final") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['reg_start'] = $qt_geral_reg_form_movpag; 
      } 
      if ($this->nmgp_opcao == "navpage" && ($this->nmgp_ordem - 1) <= $qt_geral_reg_form_movpag) 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['reg_start'] = $this->nmgp_ordem - 1; 
      } 
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['reg_start']) || empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['reg_start']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['reg_start'] = 0;
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['reg_qtd'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['reg_start'] + 1;
      $this->NM_ajax_info['navSummary']['reg_ini'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['reg_start'] + 1; 
      $this->NM_ajax_info['navSummary']['reg_qtd'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['reg_qtd']; 
      $this->NM_ajax_info['navSummary']['reg_tot'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['total'] + 1; 
      $this->NM_gera_nav_page(); 
      $this->NM_ajax_info['navPage'] = $this->SC_nav_page; 
      $GLOBALS["NM_ERRO_IBASE"] = 0;  
//---------- 
      if ($this->nmgp_opcao != "novo" && $this->nmgp_opcao != "nada" && $this->nmgp_opcao != "refresh_insert") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['parms'] = ""; 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
          { 
              $GLOBALS["NM_ERRO_IBASE"] = 1;  
          } 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
          { 
              $nmgp_select = "SELECT codcte43, tipodoc43, numdoc43, ocurren43, cocte43, str_replace (convert(char(10),fecdoc43,102), '.', '-') + ' ' + convert(char(8),fecdoc43,20), tipdoc43, numvencob43, str_replace (convert(char(10),fedoc43,102), '.', '-') + ' ' + convert(char(8),fedoc43,20), totdoc43, detalle43, cvanioant43, cvdivisa43, valdivisa43, valdivisaori43, factcompra43, seriecompra43, autocompra43, codret43, valini43, numcuotasord43, valormov43, saldoregmov43, str_replace (convert(char(10),feccobro43,102), '.', '-') + ' ' + convert(char(8),feccobro43,20), codpagounif43, tipodocdb43, numdocdb43, ocurrecdocdb43, numrecibo43, valorabono43, efectcheque43, saldoexceso43, saldocte43, codpago43, numdocpago43, obsdocpago43, UID, cvtransfer43, str_replace (convert(char(10),fectransfer43,102), '.', '-') + ' ' + convert(char(8),fectransfer43,20), tipoimp43, porcimp43, bienserv43, credgast43, str_replace (convert(char(10),fecvencompra43,102), '.', '-') + ' ' + convert(char(8),fecvencompra43,20), str_replace (convert(char(10),fecvenret43,102), '.', '-') + ' ' + convert(char(8),fecvenret43,20), numautoret43, sdoexeact43, sdoregact43, conta43, cvanulado43, baseret43, ret_con_iva43, retenciones43, IDB, tipocomptehis, banco, numero_transferencia, estado_electronico, proyecto, rubro, categoria, tipo_documento_atado, numero_documento_atado, valor_superior_al_maximo, distribucion_retencion from " . $this->Ini->nm_tabela ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          { 
              $nmgp_select = "SELECT codcte43, tipodoc43, numdoc43, ocurren43, cocte43, convert(char(23),fecdoc43,121), tipdoc43, numvencob43, convert(char(23),fedoc43,121), totdoc43, detalle43, cvanioant43, cvdivisa43, valdivisa43, valdivisaori43, factcompra43, seriecompra43, autocompra43, codret43, valini43, numcuotasord43, valormov43, saldoregmov43, convert(char(23),feccobro43,121), codpagounif43, tipodocdb43, numdocdb43, ocurrecdocdb43, numrecibo43, valorabono43, efectcheque43, saldoexceso43, saldocte43, codpago43, numdocpago43, obsdocpago43, UID, cvtransfer43, convert(char(23),fectransfer43,121), tipoimp43, porcimp43, bienserv43, credgast43, convert(char(23),fecvencompra43,121), convert(char(23),fecvenret43,121), numautoret43, sdoexeact43, sdoregact43, conta43, cvanulado43, baseret43, ret_con_iva43, retenciones43, IDB, tipocomptehis, banco, numero_transferencia, estado_electronico, proyecto, rubro, categoria, tipo_documento_atado, numero_documento_atado, valor_superior_al_maximo, distribucion_retencion from " . $this->Ini->nm_tabela ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          { 
              $nmgp_select = "SELECT codcte43, tipodoc43, numdoc43, ocurren43, cocte43, fecdoc43, tipdoc43, numvencob43, fedoc43, totdoc43, detalle43, cvanioant43, cvdivisa43, valdivisa43, valdivisaori43, factcompra43, seriecompra43, autocompra43, codret43, valini43, numcuotasord43, valormov43, saldoregmov43, feccobro43, codpagounif43, tipodocdb43, numdocdb43, ocurrecdocdb43, numrecibo43, valorabono43, efectcheque43, saldoexceso43, saldocte43, codpago43, numdocpago43, obsdocpago43, UID, cvtransfer43, fectransfer43, tipoimp43, porcimp43, bienserv43, credgast43, fecvencompra43, fecvenret43, numautoret43, sdoexeact43, sdoregact43, conta43, cvanulado43, baseret43, ret_con_iva43, retenciones43, IDB, tipocomptehis, banco, numero_transferencia, estado_electronico, proyecto, rubro, categoria, tipo_documento_atado, numero_documento_atado, valor_superior_al_maximo, distribucion_retencion from " . $this->Ini->nm_tabela ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          { 
              $nmgp_select = "SELECT codcte43, tipodoc43, numdoc43, ocurren43, cocte43, EXTEND(fecdoc43, YEAR TO FRACTION), tipdoc43, numvencob43, EXTEND(fedoc43, YEAR TO FRACTION), totdoc43, detalle43, cvanioant43, cvdivisa43, valdivisa43, valdivisaori43, factcompra43, seriecompra43, autocompra43, codret43, valini43, numcuotasord43, valormov43, saldoregmov43, EXTEND(feccobro43, YEAR TO DAY), codpagounif43, tipodocdb43, numdocdb43, ocurrecdocdb43, numrecibo43, valorabono43, efectcheque43, saldoexceso43, saldocte43, codpago43, numdocpago43, obsdocpago43, UID, cvtransfer43, EXTEND(fectransfer43, YEAR TO DAY), tipoimp43, porcimp43, bienserv43, credgast43, EXTEND(fecvencompra43, YEAR TO DAY), EXTEND(fecvenret43, YEAR TO DAY), numautoret43, sdoexeact43, sdoregact43, conta43, cvanulado43, baseret43, ret_con_iva43, retenciones43, IDB, tipocomptehis, banco, numero_transferencia, estado_electronico, proyecto, rubro, categoria, tipo_documento_atado, numero_documento_atado, valor_superior_al_maximo, distribucion_retencion from " . $this->Ini->nm_tabela ; 
          } 
          else 
          { 
              $nmgp_select = "SELECT codcte43, tipodoc43, numdoc43, ocurren43, cocte43, fecdoc43, tipdoc43, numvencob43, fedoc43, totdoc43, detalle43, cvanioant43, cvdivisa43, valdivisa43, valdivisaori43, factcompra43, seriecompra43, autocompra43, codret43, valini43, numcuotasord43, valormov43, saldoregmov43, feccobro43, codpagounif43, tipodocdb43, numdocdb43, ocurrecdocdb43, numrecibo43, valorabono43, efectcheque43, saldoexceso43, saldocte43, codpago43, numdocpago43, obsdocpago43, UID, cvtransfer43, fectransfer43, tipoimp43, porcimp43, bienserv43, credgast43, fecvencompra43, fecvenret43, numautoret43, sdoexeact43, sdoregact43, conta43, cvanulado43, baseret43, ret_con_iva43, retenciones43, IDB, tipocomptehis, banco, numero_transferencia, estado_electronico, proyecto, rubro, categoria, tipo_documento_atado, numero_documento_atado, valor_superior_al_maximo, distribucion_retencion from " . $this->Ini->nm_tabela ; 
          } 
          $aWhere = array();
          $aWhere[] = $sc_where_filter;
          if ($this->nmgp_opcao == "igual" || (($_SESSION['sc_session'][$this->Ini->sc_page]['form_adm_clientes']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_adm_clientes']['run_iframe'] == "R") && ($this->sc_evento == "insert" || $this->sc_evento == "update")) )
          { 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              {
                  $aWhere[] = "codcte43 = '$this->codcte43' and tipodoc43 = '$this->tipodoc43' and numdoc43 = '$this->numdoc43' and ocurren43 = '$this->ocurren43'"; 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
                  $aWhere[] = "codcte43 = '$this->codcte43' and tipodoc43 = '$this->tipodoc43' and numdoc43 = '$this->numdoc43' and ocurren43 = '$this->ocurren43'"; 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              {
                  $aWhere[] = "codcte43 = '$this->codcte43' and tipodoc43 = '$this->tipodoc43' and numdoc43 = '$this->numdoc43' and ocurren43 = '$this->ocurren43'"; 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $aWhere[] = "codcte43 = '$this->codcte43' and tipodoc43 = '$this->tipodoc43' and numdoc43 = '$this->numdoc43' and ocurren43 = '$this->ocurren43'"; 
              }  
              else  
              {
                  $aWhere[] = "codcte43 = '$this->codcte43' and tipodoc43 = '$this->tipodoc43' and numdoc43 = '$this->numdoc43' and ocurren43 = '$this->ocurren43'"; 
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
          $sc_order_by = "codcte43, tipodoc43, numdoc43, ocurren43";
          $sc_order_by = str_replace("order by ", "", $sc_order_by);
          $sc_order_by = str_replace("ORDER BY ", "", trim($sc_order_by));
          if (!empty($sc_order_by))
          {
              $nmgp_select .= " order by $sc_order_by "; 
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['run_iframe'] == "R")
          {
              if ($this->sc_evento == "update")
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['select'] = $nmgp_select;
                  $this->nm_gera_html();
              } 
              elseif (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['select']))
              { 
                  $nmgp_select = $_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['select'];
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['select'] = ""; 
              } 
          } 
          if ($this->nmgp_opcao == "igual") 
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
              $rs = $this->Db->Execute($nmgp_select) ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "SelectLimit($nmgp_select, 1, " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['reg_start'] . ")" ; 
              $rs = $this->Db->SelectLimit($nmgp_select, 1, $_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['reg_start']) ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "SelectLimit($nmgp_select, 1, " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['reg_start'] . ")" ; 
              $rs = $this->Db->SelectLimit($nmgp_select, 1, $_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['reg_start']) ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "SelectLimit($nmgp_select, 1, " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['reg_start'] . ")" ; 
              $rs = $this->Db->SelectLimit($nmgp_select, 1, $_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['reg_start']) ; 
          } 
          else  
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
              $rs = $this->Db->Execute($nmgp_select) ; 
              if (!$rs === false && !$rs->EOF) 
              { 
                  $rs->Move($_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['reg_start']) ;  
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
              if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['where_filter']))
              {
                  $this->nmgp_form_empty        = true;
                  $this->NM_ajax_info['buttonDisplay']['first']   = $this->nmgp_botoes['first']   = "off";
                  $this->NM_ajax_info['buttonDisplay']['back']    = $this->nmgp_botoes['back']    = "off";
                  $this->NM_ajax_info['buttonDisplay']['forward'] = $this->nmgp_botoes['forward'] = "off";
                  $this->NM_ajax_info['buttonDisplay']['last']    = $this->nmgp_botoes['last']    = "off";
                  $this->NM_ajax_info['buttonDisplay']['update']  = $this->nmgp_botoes['update']  = "off";
                  $this->NM_ajax_info['buttonDisplay']['delete']  = $this->nmgp_botoes['delete']  = "off";
                  $this->NM_ajax_info['buttonDisplay']['first']   = $this->nmgp_botoes['insert']  = "off";
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['empty_filter'] = true;
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
              $this->codcte43 = $rs->fields[0] ; 
              $this->nmgp_dados_select['codcte43'] = $this->codcte43;
              $this->tipodoc43 = $rs->fields[1] ; 
              $this->nmgp_dados_select['tipodoc43'] = $this->tipodoc43;
              $this->numdoc43 = $rs->fields[2] ; 
              $this->nmgp_dados_select['numdoc43'] = $this->numdoc43;
              $this->ocurren43 = $rs->fields[3] ; 
              $this->nmgp_dados_select['ocurren43'] = $this->ocurren43;
              $this->cocte43 = $rs->fields[4] ; 
              $this->nmgp_dados_select['cocte43'] = $this->cocte43;
              $this->fecdoc43 = $rs->fields[5] ; 
              if (substr($this->fecdoc43, 10, 1) == "-") 
              { 
                 $this->fecdoc43 = substr($this->fecdoc43, 0, 10) . " " . substr($this->fecdoc43, 11);
              } 
              if (substr($this->fecdoc43, 13, 1) == ".") 
              { 
                 $this->fecdoc43 = substr($this->fecdoc43, 0, 13) . ":" . substr($this->fecdoc43, 14, 2) . ":" . substr($this->fecdoc43, 17);
              } 
              $this->nmgp_dados_select['fecdoc43'] = $this->fecdoc43;
              $this->tipdoc43 = $rs->fields[6] ; 
              $this->nmgp_dados_select['tipdoc43'] = $this->tipdoc43;
              $this->numvencob43 = $rs->fields[7] ; 
              $this->nmgp_dados_select['numvencob43'] = $this->numvencob43;
              $this->fedoc43 = $rs->fields[8] ; 
              if (substr($this->fedoc43, 10, 1) == "-") 
              { 
                 $this->fedoc43 = substr($this->fedoc43, 0, 10) . " " . substr($this->fedoc43, 11);
              } 
              if (substr($this->fedoc43, 13, 1) == ".") 
              { 
                 $this->fedoc43 = substr($this->fedoc43, 0, 13) . ":" . substr($this->fedoc43, 14, 2) . ":" . substr($this->fedoc43, 17);
              } 
              $this->nmgp_dados_select['fedoc43'] = $this->fedoc43;
              $this->totdoc43 = trim($rs->fields[9]) ; 
              $this->nmgp_dados_select['totdoc43'] = $this->totdoc43;
              $this->detalle43 = $rs->fields[10] ; 
              $this->nmgp_dados_select['detalle43'] = $this->detalle43;
              $this->cvanioant43 = $rs->fields[11] ; 
              $this->nmgp_dados_select['cvanioant43'] = $this->cvanioant43;
              $this->cvdivisa43 = $rs->fields[12] ; 
              $this->nmgp_dados_select['cvdivisa43'] = $this->cvdivisa43;
              $this->valdivisa43 = $rs->fields[13] ; 
              $this->nmgp_dados_select['valdivisa43'] = $this->valdivisa43;
              $this->valdivisaori43 = $rs->fields[14] ; 
              $this->nmgp_dados_select['valdivisaori43'] = $this->valdivisaori43;
              $this->factcompra43 = $rs->fields[15] ; 
              $this->nmgp_dados_select['factcompra43'] = $this->factcompra43;
              $this->seriecompra43 = $rs->fields[16] ; 
              $this->nmgp_dados_select['seriecompra43'] = $this->seriecompra43;
              $this->autocompra43 = $rs->fields[17] ; 
              $this->nmgp_dados_select['autocompra43'] = $this->autocompra43;
              $this->codret43 = $rs->fields[18] ; 
              $this->nmgp_dados_select['codret43'] = $this->codret43;
              $this->valini43 = trim($rs->fields[19]) ; 
              $this->nmgp_dados_select['valini43'] = $this->valini43;
              $this->numcuotasord43 = $rs->fields[20] ; 
              $this->nmgp_dados_select['numcuotasord43'] = $this->numcuotasord43;
              $this->valormov43 = trim($rs->fields[21]) ; 
              $this->nmgp_dados_select['valormov43'] = $this->valormov43;
              $this->saldoregmov43 = trim($rs->fields[22]) ; 
              $this->nmgp_dados_select['saldoregmov43'] = $this->saldoregmov43;
              $this->feccobro43 = $rs->fields[23] ; 
              $this->nmgp_dados_select['feccobro43'] = $this->feccobro43;
              $this->codpagounif43 = $rs->fields[24] ; 
              $this->nmgp_dados_select['codpagounif43'] = $this->codpagounif43;
              $this->tipodocdb43 = $rs->fields[25] ; 
              $this->nmgp_dados_select['tipodocdb43'] = $this->tipodocdb43;
              $this->numdocdb43 = $rs->fields[26] ; 
              $this->nmgp_dados_select['numdocdb43'] = $this->numdocdb43;
              $this->ocurrecdocdb43 = $rs->fields[27] ; 
              $this->nmgp_dados_select['ocurrecdocdb43'] = $this->ocurrecdocdb43;
              $this->numrecibo43 = $rs->fields[28] ; 
              $this->nmgp_dados_select['numrecibo43'] = $this->numrecibo43;
              $this->valorabono43 = trim($rs->fields[29]) ; 
              $this->nmgp_dados_select['valorabono43'] = $this->valorabono43;
              $this->efectcheque43 = $rs->fields[30] ; 
              $this->nmgp_dados_select['efectcheque43'] = $this->efectcheque43;
              $this->saldoexceso43 = trim($rs->fields[31]) ; 
              $this->nmgp_dados_select['saldoexceso43'] = $this->saldoexceso43;
              $this->saldocte43 = trim($rs->fields[32]) ; 
              $this->nmgp_dados_select['saldocte43'] = $this->saldocte43;
              $this->codpago43 = $rs->fields[33] ; 
              $this->nmgp_dados_select['codpago43'] = $this->codpago43;
              $this->numdocpago43 = $rs->fields[34] ; 
              $this->nmgp_dados_select['numdocpago43'] = $this->numdocpago43;
              $this->obsdocpago43 = $rs->fields[35] ; 
              $this->nmgp_dados_select['obsdocpago43'] = $this->obsdocpago43;
              $this->uid = $rs->fields[36] ; 
              $this->nmgp_dados_select['uid'] = $this->uid;
              $this->cvtransfer43 = $rs->fields[37] ; 
              $this->nmgp_dados_select['cvtransfer43'] = $this->cvtransfer43;
              $this->fectransfer43 = $rs->fields[38] ; 
              $this->nmgp_dados_select['fectransfer43'] = $this->fectransfer43;
              $this->tipoimp43 = $rs->fields[39] ; 
              $this->nmgp_dados_select['tipoimp43'] = $this->tipoimp43;
              $this->porcimp43 = trim($rs->fields[40]) ; 
              $this->nmgp_dados_select['porcimp43'] = $this->porcimp43;
              $this->bienserv43 = $rs->fields[41] ; 
              $this->nmgp_dados_select['bienserv43'] = $this->bienserv43;
              $this->credgast43 = $rs->fields[42] ; 
              $this->nmgp_dados_select['credgast43'] = $this->credgast43;
              $this->fecvencompra43 = $rs->fields[43] ; 
              $this->nmgp_dados_select['fecvencompra43'] = $this->fecvencompra43;
              $this->fecvenret43 = $rs->fields[44] ; 
              $this->nmgp_dados_select['fecvenret43'] = $this->fecvenret43;
              $this->numautoret43 = $rs->fields[45] ; 
              $this->nmgp_dados_select['numautoret43'] = $this->numautoret43;
              $this->sdoexeact43 = trim($rs->fields[46]) ; 
              $this->nmgp_dados_select['sdoexeact43'] = $this->sdoexeact43;
              $this->sdoregact43 = trim($rs->fields[47]) ; 
              $this->nmgp_dados_select['sdoregact43'] = $this->sdoregact43;
              $this->conta43 = $rs->fields[48] ; 
              $this->nmgp_dados_select['conta43'] = $this->conta43;
              $this->cvanulado43 = $rs->fields[49] ; 
              $this->nmgp_dados_select['cvanulado43'] = $this->cvanulado43;
              $this->baseret43 = trim($rs->fields[50]) ; 
              $this->nmgp_dados_select['baseret43'] = $this->baseret43;
              $this->ret_con_iva43 = $rs->fields[51] ; 
              $this->nmgp_dados_select['ret_con_iva43'] = $this->ret_con_iva43;
              $this->retenciones43 = $rs->fields[52] ; 
              $this->nmgp_dados_select['retenciones43'] = $this->retenciones43;
              $this->idb = $rs->fields[53] ; 
              $this->nmgp_dados_select['idb'] = $this->idb;
              $this->tipocomptehis = $rs->fields[54] ; 
              $this->nmgp_dados_select['tipocomptehis'] = $this->tipocomptehis;
              $this->banco = $rs->fields[55] ; 
              $this->nmgp_dados_select['banco'] = $this->banco;
              $this->numero_transferencia = $rs->fields[56] ; 
              $this->nmgp_dados_select['numero_transferencia'] = $this->numero_transferencia;
              $this->estado_electronico = $rs->fields[57] ; 
              $this->nmgp_dados_select['estado_electronico'] = $this->estado_electronico;
              $this->proyecto = $rs->fields[58] ; 
              $this->nmgp_dados_select['proyecto'] = $this->proyecto;
              $this->rubro = $rs->fields[59] ; 
              $this->nmgp_dados_select['rubro'] = $this->rubro;
              $this->categoria = $rs->fields[60] ; 
              $this->nmgp_dados_select['categoria'] = $this->categoria;
              $this->tipo_documento_atado = $rs->fields[61] ; 
              $this->nmgp_dados_select['tipo_documento_atado'] = $this->tipo_documento_atado;
              $this->numero_documento_atado = $rs->fields[62] ; 
              $this->nmgp_dados_select['numero_documento_atado'] = $this->numero_documento_atado;
              $this->valor_superior_al_maximo = $rs->fields[63] ; 
              $this->nmgp_dados_select['valor_superior_al_maximo'] = $this->valor_superior_al_maximo;
              $this->distribucion_retencion = $rs->fields[64] ; 
              $this->nmgp_dados_select['distribucion_retencion'] = $this->distribucion_retencion;
          $GLOBALS["NM_ERRO_IBASE"] = 0; 
              $this->nm_troca_decimal(",", ".");
              $this->totdoc43 = (strpos(strtolower($this->totdoc43), "e")) ? (float)$this->totdoc43 : $this->totdoc43; 
              $this->totdoc43 = (string)$this->totdoc43; 
              $this->valdivisa43 = (string)$this->valdivisa43; 
              $this->valdivisaori43 = (string)$this->valdivisaori43; 
              $this->valini43 = (strpos(strtolower($this->valini43), "e")) ? (float)$this->valini43 : $this->valini43; 
              $this->valini43 = (string)$this->valini43; 
              $this->numcuotasord43 = (string)$this->numcuotasord43; 
              $this->valormov43 = (strpos(strtolower($this->valormov43), "e")) ? (float)$this->valormov43 : $this->valormov43; 
              $this->valormov43 = (string)$this->valormov43; 
              $this->saldoregmov43 = (strpos(strtolower($this->saldoregmov43), "e")) ? (float)$this->saldoregmov43 : $this->saldoregmov43; 
              $this->saldoregmov43 = (string)$this->saldoregmov43; 
              $this->valorabono43 = (strpos(strtolower($this->valorabono43), "e")) ? (float)$this->valorabono43 : $this->valorabono43; 
              $this->valorabono43 = (string)$this->valorabono43; 
              $this->saldoexceso43 = (strpos(strtolower($this->saldoexceso43), "e")) ? (float)$this->saldoexceso43 : $this->saldoexceso43; 
              $this->saldoexceso43 = (string)$this->saldoexceso43; 
              $this->saldocte43 = (strpos(strtolower($this->saldocte43), "e")) ? (float)$this->saldocte43 : $this->saldocte43; 
              $this->saldocte43 = (string)$this->saldocte43; 
              $this->uid = (string)$this->uid; 
              $this->tipoimp43 = (string)$this->tipoimp43; 
              $this->porcimp43 = (strpos(strtolower($this->porcimp43), "e")) ? (float)$this->porcimp43 : $this->porcimp43; 
              $this->porcimp43 = (string)$this->porcimp43; 
              $this->bienserv43 = (string)$this->bienserv43; 
              $this->sdoexeact43 = (strpos(strtolower($this->sdoexeact43), "e")) ? (float)$this->sdoexeact43 : $this->sdoexeact43; 
              $this->sdoexeact43 = (string)$this->sdoexeact43; 
              $this->sdoregact43 = (strpos(strtolower($this->sdoregact43), "e")) ? (float)$this->sdoregact43 : $this->sdoregact43; 
              $this->sdoregact43 = (string)$this->sdoregact43; 
              $this->baseret43 = (strpos(strtolower($this->baseret43), "e")) ? (float)$this->baseret43 : $this->baseret43; 
              $this->baseret43 = (string)$this->baseret43; 
              $this->numero_transferencia = (string)$this->numero_transferencia; 
              $this->estado_electronico = (string)$this->estado_electronico; 
              $this->valor_superior_al_maximo = (string)$this->valor_superior_al_maximo; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['parms'] = "codcte43?#?$this->codcte43?@?tipodoc43?#?$this->tipodoc43?@?numdoc43?#?$this->numdoc43?@?ocurren43?#?$this->ocurren43?@?";
          } 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['dados_select'] = $this->nmgp_dados_select;
          if (!$this->NM_ajax_flag || 'backup_line' != $this->NM_ajax_opcao)
          {
              $this->Nav_permite_ret = 0 != $_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['reg_start'];
              $this->Nav_permite_ava = $_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['reg_start'] < $qt_geral_reg_form_movpag;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['opcao']   = '';
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
              $this->codcte43 = "";  
              $this->nmgp_dados_form["codcte43"] = $this->codcte43;
              $this->tipodoc43 = "";  
              $this->nmgp_dados_form["tipodoc43"] = $this->tipodoc43;
              $this->numdoc43 = "";  
              $this->nmgp_dados_form["numdoc43"] = $this->numdoc43;
              $this->ocurren43 = "";  
              $this->nmgp_dados_form["ocurren43"] = $this->ocurren43;
              $this->cocte43 = "";  
              $this->nmgp_dados_form["cocte43"] = $this->cocte43;
              $this->fecdoc43 = "";  
              $this->fecdoc43_hora = "" ;  
              $this->nmgp_dados_form["fecdoc43"] = $this->fecdoc43;
              $this->tipdoc43 = "";  
              $this->nmgp_dados_form["tipdoc43"] = $this->tipdoc43;
              $this->numvencob43 = "";  
              $this->nmgp_dados_form["numvencob43"] = $this->numvencob43;
              $this->fedoc43 = "";  
              $this->fedoc43_hora = "" ;  
              $this->nmgp_dados_form["fedoc43"] = $this->fedoc43;
              $this->totdoc43 = "";  
              $this->nmgp_dados_form["totdoc43"] = $this->totdoc43;
              $this->detalle43 = "";  
              $this->nmgp_dados_form["detalle43"] = $this->detalle43;
              $this->cvanioant43 = "";  
              $this->nmgp_dados_form["cvanioant43"] = $this->cvanioant43;
              $this->cvdivisa43 = "";  
              $this->nmgp_dados_form["cvdivisa43"] = $this->cvdivisa43;
              $this->valdivisa43 = "";  
              $this->nmgp_dados_form["valdivisa43"] = $this->valdivisa43;
              $this->valdivisaori43 = "";  
              $this->nmgp_dados_form["valdivisaori43"] = $this->valdivisaori43;
              $this->factcompra43 = "";  
              $this->nmgp_dados_form["factcompra43"] = $this->factcompra43;
              $this->seriecompra43 = "";  
              $this->nmgp_dados_form["seriecompra43"] = $this->seriecompra43;
              $this->autocompra43 = "";  
              $this->nmgp_dados_form["autocompra43"] = $this->autocompra43;
              $this->codret43 = "";  
              $this->nmgp_dados_form["codret43"] = $this->codret43;
              $this->valini43 = "";  
              $this->nmgp_dados_form["valini43"] = $this->valini43;
              $this->numcuotasord43 = "";  
              $this->nmgp_dados_form["numcuotasord43"] = $this->numcuotasord43;
              $this->valormov43 = "";  
              $this->nmgp_dados_form["valormov43"] = $this->valormov43;
              $this->saldoregmov43 = "";  
              $this->nmgp_dados_form["saldoregmov43"] = $this->saldoregmov43;
              $this->feccobro43 = "";  
              $this->feccobro43_hora = "" ;  
              $this->nmgp_dados_form["feccobro43"] = $this->feccobro43;
              $this->codpagounif43 = "";  
              $this->nmgp_dados_form["codpagounif43"] = $this->codpagounif43;
              $this->tipodocdb43 = "";  
              $this->nmgp_dados_form["tipodocdb43"] = $this->tipodocdb43;
              $this->numdocdb43 = "";  
              $this->nmgp_dados_form["numdocdb43"] = $this->numdocdb43;
              $this->ocurrecdocdb43 = "";  
              $this->nmgp_dados_form["ocurrecdocdb43"] = $this->ocurrecdocdb43;
              $this->numrecibo43 = "";  
              $this->nmgp_dados_form["numrecibo43"] = $this->numrecibo43;
              $this->valorabono43 = "";  
              $this->nmgp_dados_form["valorabono43"] = $this->valorabono43;
              $this->efectcheque43 = "";  
              $this->nmgp_dados_form["efectcheque43"] = $this->efectcheque43;
              $this->saldoexceso43 = "";  
              $this->nmgp_dados_form["saldoexceso43"] = $this->saldoexceso43;
              $this->saldocte43 = "";  
              $this->nmgp_dados_form["saldocte43"] = $this->saldocte43;
              $this->codpago43 = "";  
              $this->nmgp_dados_form["codpago43"] = $this->codpago43;
              $this->numdocpago43 = "";  
              $this->nmgp_dados_form["numdocpago43"] = $this->numdocpago43;
              $this->obsdocpago43 = "";  
              $this->nmgp_dados_form["obsdocpago43"] = $this->obsdocpago43;
              $this->uid = "";  
              $this->nmgp_dados_form["uid"] = $this->uid;
              $this->cvtransfer43 = "";  
              $this->nmgp_dados_form["cvtransfer43"] = $this->cvtransfer43;
              $this->fectransfer43 = "";  
              $this->fectransfer43_hora = "" ;  
              $this->nmgp_dados_form["fectransfer43"] = $this->fectransfer43;
              $this->tipoimp43 = "";  
              $this->nmgp_dados_form["tipoimp43"] = $this->tipoimp43;
              $this->porcimp43 = "";  
              $this->nmgp_dados_form["porcimp43"] = $this->porcimp43;
              $this->bienserv43 = "";  
              $this->nmgp_dados_form["bienserv43"] = $this->bienserv43;
              $this->credgast43 = "";  
              $this->nmgp_dados_form["credgast43"] = $this->credgast43;
              $this->fecvencompra43 = "";  
              $this->fecvencompra43_hora = "" ;  
              $this->nmgp_dados_form["fecvencompra43"] = $this->fecvencompra43;
              $this->fecvenret43 = "";  
              $this->fecvenret43_hora = "" ;  
              $this->nmgp_dados_form["fecvenret43"] = $this->fecvenret43;
              $this->numautoret43 = "";  
              $this->nmgp_dados_form["numautoret43"] = $this->numautoret43;
              $this->sdoexeact43 = "";  
              $this->nmgp_dados_form["sdoexeact43"] = $this->sdoexeact43;
              $this->sdoregact43 = "";  
              $this->nmgp_dados_form["sdoregact43"] = $this->sdoregact43;
              $this->conta43 = "";  
              $this->nmgp_dados_form["conta43"] = $this->conta43;
              $this->cvanulado43 = "";  
              $this->nmgp_dados_form["cvanulado43"] = $this->cvanulado43;
              $this->baseret43 = "";  
              $this->nmgp_dados_form["baseret43"] = $this->baseret43;
              $this->ret_con_iva43 = "";  
              $this->nmgp_dados_form["ret_con_iva43"] = $this->ret_con_iva43;
              $this->retenciones43 = "";  
              $this->nmgp_dados_form["retenciones43"] = $this->retenciones43;
              $this->idb = "";  
              $this->nmgp_dados_form["idb"] = $this->idb;
              $this->tipocomptehis = "";  
              $this->nmgp_dados_form["tipocomptehis"] = $this->tipocomptehis;
              $this->banco = "";  
              $this->nmgp_dados_form["banco"] = $this->banco;
              $this->numero_transferencia = "";  
              $this->nmgp_dados_form["numero_transferencia"] = $this->numero_transferencia;
              $this->estado_electronico = "";  
              $this->nmgp_dados_form["estado_electronico"] = $this->estado_electronico;
              $this->proyecto = "";  
              $this->nmgp_dados_form["proyecto"] = $this->proyecto;
              $this->rubro = "";  
              $this->nmgp_dados_form["rubro"] = $this->rubro;
              $this->categoria = "";  
              $this->nmgp_dados_form["categoria"] = $this->categoria;
              $this->tipo_documento_atado = "";  
              $this->nmgp_dados_form["tipo_documento_atado"] = $this->tipo_documento_atado;
              $this->numero_documento_atado = "";  
              $this->nmgp_dados_form["numero_documento_atado"] = $this->numero_documento_atado;
              $this->valor_superior_al_maximo = "";  
              $this->nmgp_dados_form["valor_superior_al_maximo"] = $this->valor_superior_al_maximo;
              $this->distribucion_retencion = "";  
              $this->nmgp_dados_form["distribucion_retencion"] = $this->distribucion_retencion;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['dados_form'] = $this->nmgp_dados_form;
              $this->formatado = false;
          }
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['foreign_key'] as $sFKName => $sFKValue)
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
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(ocurren43) from " . $this->Ini->nm_tabela . " where codcte43 = '$this->codcte43' and tipodoc43 = '$this->tipodoc43' and numdoc43 = '$this->numdoc43' and ocurren43 < '$this->ocurren43'" . $str_where_filter; 
         $rs = $this->Db->Execute("select max(ocurren43) from " . $this->Ini->nm_tabela . " where codcte43 = '$this->codcte43' and tipodoc43 = '$this->tipodoc43' and numdoc43 = '$this->numdoc43' and ocurren43 < '$this->ocurren43'" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(ocurren43) from " . $this->Ini->nm_tabela . " where codcte43 = '$this->codcte43' and tipodoc43 = '$this->tipodoc43' and numdoc43 = '$this->numdoc43' and ocurren43 < '$this->ocurren43'" . $str_where_filter; 
         $rs = $this->Db->Execute("select max(ocurren43) from " . $this->Ini->nm_tabela . " where codcte43 = '$this->codcte43' and tipodoc43 = '$this->tipodoc43' and numdoc43 = '$this->numdoc43' and ocurren43 < '$this->ocurren43'" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(ocurren43) from " . $this->Ini->nm_tabela . " where codcte43 = '$this->codcte43' and tipodoc43 = '$this->tipodoc43' and numdoc43 = '$this->numdoc43' and ocurren43 < '$this->ocurren43'" . $str_where_filter; 
         $rs = $this->Db->Execute("select max(ocurren43) from " . $this->Ini->nm_tabela . " where codcte43 = '$this->codcte43' and tipodoc43 = '$this->tipodoc43' and numdoc43 = '$this->numdoc43' and ocurren43 < '$this->ocurren43'" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(ocurren43) from " . $this->Ini->nm_tabela . " where codcte43 = '$this->codcte43' and tipodoc43 = '$this->tipodoc43' and numdoc43 = '$this->numdoc43' and ocurren43 < '$this->ocurren43'" . $str_where_filter; 
         $rs = $this->Db->Execute("select max(ocurren43) from " . $this->Ini->nm_tabela . " where codcte43 = '$this->codcte43' and tipodoc43 = '$this->tipodoc43' and numdoc43 = '$this->numdoc43' and ocurren43 < '$this->ocurren43'" . $str_where_filter); 
     }  
     else  
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(ocurren43) from " . $this->Ini->nm_tabela . " where codcte43 = '$this->codcte43' and tipodoc43 = '$this->tipodoc43' and numdoc43 = '$this->numdoc43' and ocurren43 < '$this->ocurren43'" . $str_where_filter; 
         $rs = $this->Db->Execute("select max(ocurren43) from " . $this->Ini->nm_tabela . " where codcte43 = '$this->codcte43' and tipodoc43 = '$this->tipodoc43' and numdoc43 = '$this->numdoc43' and ocurren43 < '$this->ocurren43'" . $str_where_filter); 
     }  
     if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
     { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
     }  
     if (isset($rs->fields[0]) && $rs->fields[0] != "") 
     { 
         $this->ocurren43 = substr($this->Db->qstr($rs->fields[0]), 1, -1); 
         $rs->Close();  
         $this->nmgp_opcao = "igual";  
         return ;  
     } 
     $str_where_filter = ('' != $str_where_param) ? ' and ' . $str_where_param : '';
     if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(numdoc43) from " . $this->Ini->nm_tabela . " where codcte43 = '$this->codcte43' and tipodoc43 = '$this->tipodoc43' and numdoc43 < '$this->numdoc43'" . $str_where_filter; 
         $rs = $this->Db->Execute("select max(numdoc43) from " . $this->Ini->nm_tabela . " where codcte43 = '$this->codcte43' and tipodoc43 = '$this->tipodoc43' and numdoc43 < '$this->numdoc43'" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(numdoc43) from " . $this->Ini->nm_tabela . " where codcte43 = '$this->codcte43' and tipodoc43 = '$this->tipodoc43' and numdoc43 < '$this->numdoc43'" . $str_where_filter; 
         $rs = $this->Db->Execute("select max(numdoc43) from " . $this->Ini->nm_tabela . " where codcte43 = '$this->codcte43' and tipodoc43 = '$this->tipodoc43' and numdoc43 < '$this->numdoc43'" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(numdoc43) from " . $this->Ini->nm_tabela . " where codcte43 = '$this->codcte43' and tipodoc43 = '$this->tipodoc43' and numdoc43 < '$this->numdoc43'" . $str_where_filter; 
         $rs = $this->Db->Execute("select max(numdoc43) from " . $this->Ini->nm_tabela . " where codcte43 = '$this->codcte43' and tipodoc43 = '$this->tipodoc43' and numdoc43 < '$this->numdoc43'" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(numdoc43) from " . $this->Ini->nm_tabela . " where codcte43 = '$this->codcte43' and tipodoc43 = '$this->tipodoc43' and numdoc43 < '$this->numdoc43'" . $str_where_filter; 
         $rs = $this->Db->Execute("select max(numdoc43) from " . $this->Ini->nm_tabela . " where codcte43 = '$this->codcte43' and tipodoc43 = '$this->tipodoc43' and numdoc43 < '$this->numdoc43'" . $str_where_filter); 
     }  
     else  
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(numdoc43) from " . $this->Ini->nm_tabela . " where codcte43 = '$this->codcte43' and tipodoc43 = '$this->tipodoc43' and numdoc43 < '$this->numdoc43'" . $str_where_filter; 
         $rs = $this->Db->Execute("select max(numdoc43) from " . $this->Ini->nm_tabela . " where codcte43 = '$this->codcte43' and tipodoc43 = '$this->tipodoc43' and numdoc43 < '$this->numdoc43'" . $str_where_filter); 
     }  
     if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
     { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
     }  
     if (isset($rs->fields[0]) && $rs->fields[0] != "") 
     { 
         $this->numdoc43 = substr($this->Db->qstr($rs->fields[0]), 1, -1); 
         $rs->Close();  
     $str_where_filter = ('' != $str_where_param) ? ' and ' . $str_where_param : '';
         if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
         {
             $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(ocurren43) from " . $this->Ini->nm_tabela . " where codcte43 = '$this->codcte43' and tipodoc43 = '$this->tipodoc43' and numdoc43 = '$this->numdoc43'" . $str_where_filter; 
             $rs = $this->Db->Execute("select max(ocurren43) from " . $this->Ini->nm_tabela . " where codcte43 = '$this->codcte43' and tipodoc43 = '$this->tipodoc43' and numdoc43 = '$this->numdoc43'" . $str_where_filter); 
         }  
         elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
         {
             $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(ocurren43) from " . $this->Ini->nm_tabela . " where codcte43 = '$this->codcte43' and tipodoc43 = '$this->tipodoc43' and numdoc43 = '$this->numdoc43'" . $str_where_filter; 
             $rs = $this->Db->Execute("select max(ocurren43) from " . $this->Ini->nm_tabela . " where codcte43 = '$this->codcte43' and tipodoc43 = '$this->tipodoc43' and numdoc43 = '$this->numdoc43'" . $str_where_filter); 
         }  
         elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
         {
             $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(ocurren43) from " . $this->Ini->nm_tabela . " where codcte43 = '$this->codcte43' and tipodoc43 = '$this->tipodoc43' and numdoc43 = '$this->numdoc43'" . $str_where_filter; 
             $rs = $this->Db->Execute("select max(ocurren43) from " . $this->Ini->nm_tabela . " where codcte43 = '$this->codcte43' and tipodoc43 = '$this->tipodoc43' and numdoc43 = '$this->numdoc43'" . $str_where_filter); 
         }  
         elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
         {
             $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(ocurren43) from " . $this->Ini->nm_tabela . " where codcte43 = '$this->codcte43' and tipodoc43 = '$this->tipodoc43' and numdoc43 = '$this->numdoc43'" . $str_where_filter; 
             $rs = $this->Db->Execute("select max(ocurren43) from " . $this->Ini->nm_tabela . " where codcte43 = '$this->codcte43' and tipodoc43 = '$this->tipodoc43' and numdoc43 = '$this->numdoc43'" . $str_where_filter); 
         }  
         else  
         {
             $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(ocurren43) from " . $this->Ini->nm_tabela . " where codcte43 = '$this->codcte43' and tipodoc43 = '$this->tipodoc43' and numdoc43 = '$this->numdoc43'" . $str_where_filter; 
             $rs = $this->Db->Execute("select max(ocurren43) from " . $this->Ini->nm_tabela . " where codcte43 = '$this->codcte43' and tipodoc43 = '$this->tipodoc43' and numdoc43 = '$this->numdoc43'" . $str_where_filter); 
         }  
         $this->ocurren43 = substr($this->Db->qstr($rs->fields[0]), 1, -1); 
         $rs->Close();  
         $this->nmgp_opcao = "igual";  
         return ;  
     } 
     $str_where_filter = ('' != $str_where_param) ? ' and ' . $str_where_param : '';
     if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(tipodoc43) from " . $this->Ini->nm_tabela . " where codcte43 = '$this->codcte43' and tipodoc43 < '$this->tipodoc43'" . $str_where_filter; 
         $rs = $this->Db->Execute("select max(tipodoc43) from " . $this->Ini->nm_tabela . " where codcte43 = '$this->codcte43' and tipodoc43 < '$this->tipodoc43'" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(tipodoc43) from " . $this->Ini->nm_tabela . " where codcte43 = '$this->codcte43' and tipodoc43 < '$this->tipodoc43'" . $str_where_filter; 
         $rs = $this->Db->Execute("select max(tipodoc43) from " . $this->Ini->nm_tabela . " where codcte43 = '$this->codcte43' and tipodoc43 < '$this->tipodoc43'" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(tipodoc43) from " . $this->Ini->nm_tabela . " where codcte43 = '$this->codcte43' and tipodoc43 < '$this->tipodoc43'" . $str_where_filter; 
         $rs = $this->Db->Execute("select max(tipodoc43) from " . $this->Ini->nm_tabela . " where codcte43 = '$this->codcte43' and tipodoc43 < '$this->tipodoc43'" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(tipodoc43) from " . $this->Ini->nm_tabela . " where codcte43 = '$this->codcte43' and tipodoc43 < '$this->tipodoc43'" . $str_where_filter; 
         $rs = $this->Db->Execute("select max(tipodoc43) from " . $this->Ini->nm_tabela . " where codcte43 = '$this->codcte43' and tipodoc43 < '$this->tipodoc43'" . $str_where_filter); 
     }  
     else  
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(tipodoc43) from " . $this->Ini->nm_tabela . " where codcte43 = '$this->codcte43' and tipodoc43 < '$this->tipodoc43'" . $str_where_filter; 
         $rs = $this->Db->Execute("select max(tipodoc43) from " . $this->Ini->nm_tabela . " where codcte43 = '$this->codcte43' and tipodoc43 < '$this->tipodoc43'" . $str_where_filter); 
     }  
     if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
     { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
     }  
     if (isset($rs->fields[0]) && $rs->fields[0] != "") 
     { 
         $this->tipodoc43 = substr($this->Db->qstr($rs->fields[0]), 1, -1); 
         $rs->Close();  
     $str_where_filter = ('' != $str_where_param) ? ' and ' . $str_where_param : '';
         if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
         {
             $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(numdoc43) from " . $this->Ini->nm_tabela . " where codcte43 = '$this->codcte43' and tipodoc43 = '$this->tipodoc43'" . $str_where_filter; 
             $rs = $this->Db->Execute("select max(numdoc43) from " . $this->Ini->nm_tabela . " where codcte43 = '$this->codcte43' and tipodoc43 = '$this->tipodoc43'" . $str_where_filter); 
         }  
         elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
         {
             $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(numdoc43) from " . $this->Ini->nm_tabela . " where codcte43 = '$this->codcte43' and tipodoc43 = '$this->tipodoc43'" . $str_where_filter; 
             $rs = $this->Db->Execute("select max(numdoc43) from " . $this->Ini->nm_tabela . " where codcte43 = '$this->codcte43' and tipodoc43 = '$this->tipodoc43'" . $str_where_filter); 
         }  
         elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
         {
             $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(numdoc43) from " . $this->Ini->nm_tabela . " where codcte43 = '$this->codcte43' and tipodoc43 = '$this->tipodoc43'" . $str_where_filter; 
             $rs = $this->Db->Execute("select max(numdoc43) from " . $this->Ini->nm_tabela . " where codcte43 = '$this->codcte43' and tipodoc43 = '$this->tipodoc43'" . $str_where_filter); 
         }  
         elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
         {
             $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(numdoc43) from " . $this->Ini->nm_tabela . " where codcte43 = '$this->codcte43' and tipodoc43 = '$this->tipodoc43'" . $str_where_filter; 
             $rs = $this->Db->Execute("select max(numdoc43) from " . $this->Ini->nm_tabela . " where codcte43 = '$this->codcte43' and tipodoc43 = '$this->tipodoc43'" . $str_where_filter); 
         }  
         else  
         {
             $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(numdoc43) from " . $this->Ini->nm_tabela . " where codcte43 = '$this->codcte43' and tipodoc43 = '$this->tipodoc43'" . $str_where_filter; 
             $rs = $this->Db->Execute("select max(numdoc43) from " . $this->Ini->nm_tabela . " where codcte43 = '$this->codcte43' and tipodoc43 = '$this->tipodoc43'" . $str_where_filter); 
         }  
         $this->numdoc43 = substr($this->Db->qstr($rs->fields[0]), 1, -1); 
         $rs->Close();  
     $str_where_filter = ('' != $str_where_param) ? ' and ' . $str_where_param : '';
         if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
         {
             $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(ocurren43) from " . $this->Ini->nm_tabela . " where codcte43 = '$this->codcte43' and tipodoc43 = '$this->tipodoc43' and numdoc43 = '$this->numdoc43'" . $str_where_filter; 
             $rs = $this->Db->Execute("select max(ocurren43) from " . $this->Ini->nm_tabela . " where codcte43 = '$this->codcte43' and tipodoc43 = '$this->tipodoc43' and numdoc43 = '$this->numdoc43'" . $str_where_filter); 
         }  
         elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
         {
             $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(ocurren43) from " . $this->Ini->nm_tabela . " where codcte43 = '$this->codcte43' and tipodoc43 = '$this->tipodoc43' and numdoc43 = '$this->numdoc43'" . $str_where_filter; 
             $rs = $this->Db->Execute("select max(ocurren43) from " . $this->Ini->nm_tabela . " where codcte43 = '$this->codcte43' and tipodoc43 = '$this->tipodoc43' and numdoc43 = '$this->numdoc43'" . $str_where_filter); 
         }  
         elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
         {
             $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(ocurren43) from " . $this->Ini->nm_tabela . " where codcte43 = '$this->codcte43' and tipodoc43 = '$this->tipodoc43' and numdoc43 = '$this->numdoc43'" . $str_where_filter; 
             $rs = $this->Db->Execute("select max(ocurren43) from " . $this->Ini->nm_tabela . " where codcte43 = '$this->codcte43' and tipodoc43 = '$this->tipodoc43' and numdoc43 = '$this->numdoc43'" . $str_where_filter); 
         }  
         elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
         {
             $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(ocurren43) from " . $this->Ini->nm_tabela . " where codcte43 = '$this->codcte43' and tipodoc43 = '$this->tipodoc43' and numdoc43 = '$this->numdoc43'" . $str_where_filter; 
             $rs = $this->Db->Execute("select max(ocurren43) from " . $this->Ini->nm_tabela . " where codcte43 = '$this->codcte43' and tipodoc43 = '$this->tipodoc43' and numdoc43 = '$this->numdoc43'" . $str_where_filter); 
         }  
         else  
         {
             $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(ocurren43) from " . $this->Ini->nm_tabela . " where codcte43 = '$this->codcte43' and tipodoc43 = '$this->tipodoc43' and numdoc43 = '$this->numdoc43'" . $str_where_filter; 
             $rs = $this->Db->Execute("select max(ocurren43) from " . $this->Ini->nm_tabela . " where codcte43 = '$this->codcte43' and tipodoc43 = '$this->tipodoc43' and numdoc43 = '$this->numdoc43'" . $str_where_filter); 
         }  
         $this->ocurren43 = substr($this->Db->qstr($rs->fields[0]), 1, -1); 
         $rs->Close();  
         $this->nmgp_opcao = "igual";  
         return ;  
     } 
     $str_where_filter = ('' != $str_where_param) ? ' and ' . $str_where_param : '';
     if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(codcte43) from " . $this->Ini->nm_tabela . " where codcte43 < '$this->codcte43'" . $str_where_filter; 
         $rs = $this->Db->Execute("select max(codcte43) from " . $this->Ini->nm_tabela . " where codcte43 < '$this->codcte43'" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(codcte43) from " . $this->Ini->nm_tabela . " where codcte43 < '$this->codcte43'" . $str_where_filter; 
         $rs = $this->Db->Execute("select max(codcte43) from " . $this->Ini->nm_tabela . " where codcte43 < '$this->codcte43'" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(codcte43) from " . $this->Ini->nm_tabela . " where codcte43 < '$this->codcte43'" . $str_where_filter; 
         $rs = $this->Db->Execute("select max(codcte43) from " . $this->Ini->nm_tabela . " where codcte43 < '$this->codcte43'" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(codcte43) from " . $this->Ini->nm_tabela . " where codcte43 < '$this->codcte43'" . $str_where_filter; 
         $rs = $this->Db->Execute("select max(codcte43) from " . $this->Ini->nm_tabela . " where codcte43 < '$this->codcte43'" . $str_where_filter); 
     }  
     else  
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(codcte43) from " . $this->Ini->nm_tabela . " where codcte43 < '$this->codcte43'" . $str_where_filter; 
         $rs = $this->Db->Execute("select max(codcte43) from " . $this->Ini->nm_tabela . " where codcte43 < '$this->codcte43'" . $str_where_filter); 
     }  
     if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
     { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
     }  
     if (isset($rs->fields[0]) && $rs->fields[0] != "") 
     { 
         $this->codcte43 = substr($this->Db->qstr($rs->fields[0]), 1, -1); 
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
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(tipodoc43) from " . $this->Ini->nm_tabela . " where codcte43 = '$this->codcte43'" . $str_where_filter; 
         $rs = $this->Db->Execute("select max(tipodoc43) from " . $this->Ini->nm_tabela . " where codcte43 = '$this->codcte43'" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(tipodoc43) from " . $this->Ini->nm_tabela . " where codcte43 = '$this->codcte43'" . $str_where_filter; 
         $rs = $this->Db->Execute("select max(tipodoc43) from " . $this->Ini->nm_tabela . " where codcte43 = '$this->codcte43'" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(tipodoc43) from " . $this->Ini->nm_tabela . " where codcte43 = '$this->codcte43'" . $str_where_filter; 
         $rs = $this->Db->Execute("select max(tipodoc43) from " . $this->Ini->nm_tabela . " where codcte43 = '$this->codcte43'" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(tipodoc43) from " . $this->Ini->nm_tabela . " where codcte43 = '$this->codcte43'" . $str_where_filter; 
         $rs = $this->Db->Execute("select max(tipodoc43) from " . $this->Ini->nm_tabela . " where codcte43 = '$this->codcte43'" . $str_where_filter); 
     }  
     else  
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(tipodoc43) from " . $this->Ini->nm_tabela . " where codcte43 = '$this->codcte43'" . $str_where_filter; 
         $rs = $this->Db->Execute("select max(tipodoc43) from " . $this->Ini->nm_tabela . " where codcte43 = '$this->codcte43'" . $str_where_filter); 
     }  
     $this->tipodoc43 = substr($this->Db->qstr($rs->fields[0]), 1, -1); 
     $rs->Close();  
     $str_where_filter = ('' != $str_where_param) ? ' and ' . $str_where_param : '';
     if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(numdoc43) from " . $this->Ini->nm_tabela . " where codcte43 = '$this->codcte43' and tipodoc43 = '$this->tipodoc43'" . $str_where_filter; 
         $rs = $this->Db->Execute("select max(numdoc43) from " . $this->Ini->nm_tabela . " where codcte43 = '$this->codcte43' and tipodoc43 = '$this->tipodoc43'" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(numdoc43) from " . $this->Ini->nm_tabela . " where codcte43 = '$this->codcte43' and tipodoc43 = '$this->tipodoc43'" . $str_where_filter; 
         $rs = $this->Db->Execute("select max(numdoc43) from " . $this->Ini->nm_tabela . " where codcte43 = '$this->codcte43' and tipodoc43 = '$this->tipodoc43'" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(numdoc43) from " . $this->Ini->nm_tabela . " where codcte43 = '$this->codcte43' and tipodoc43 = '$this->tipodoc43'" . $str_where_filter; 
         $rs = $this->Db->Execute("select max(numdoc43) from " . $this->Ini->nm_tabela . " where codcte43 = '$this->codcte43' and tipodoc43 = '$this->tipodoc43'" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(numdoc43) from " . $this->Ini->nm_tabela . " where codcte43 = '$this->codcte43' and tipodoc43 = '$this->tipodoc43'" . $str_where_filter; 
         $rs = $this->Db->Execute("select max(numdoc43) from " . $this->Ini->nm_tabela . " where codcte43 = '$this->codcte43' and tipodoc43 = '$this->tipodoc43'" . $str_where_filter); 
     }  
     else  
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(numdoc43) from " . $this->Ini->nm_tabela . " where codcte43 = '$this->codcte43' and tipodoc43 = '$this->tipodoc43'" . $str_where_filter; 
         $rs = $this->Db->Execute("select max(numdoc43) from " . $this->Ini->nm_tabela . " where codcte43 = '$this->codcte43' and tipodoc43 = '$this->tipodoc43'" . $str_where_filter); 
     }  
     $this->numdoc43 = substr($this->Db->qstr($rs->fields[0]), 1, -1); 
     $rs->Close();  
     $str_where_filter = ('' != $str_where_param) ? ' and ' . $str_where_param : '';
     if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(ocurren43) from " . $this->Ini->nm_tabela . " where codcte43 = '$this->codcte43' and tipodoc43 = '$this->tipodoc43' and numdoc43 = '$this->numdoc43'" . $str_where_filter; 
         $rs = $this->Db->Execute("select max(ocurren43) from " . $this->Ini->nm_tabela . " where codcte43 = '$this->codcte43' and tipodoc43 = '$this->tipodoc43' and numdoc43 = '$this->numdoc43'" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(ocurren43) from " . $this->Ini->nm_tabela . " where codcte43 = '$this->codcte43' and tipodoc43 = '$this->tipodoc43' and numdoc43 = '$this->numdoc43'" . $str_where_filter; 
         $rs = $this->Db->Execute("select max(ocurren43) from " . $this->Ini->nm_tabela . " where codcte43 = '$this->codcte43' and tipodoc43 = '$this->tipodoc43' and numdoc43 = '$this->numdoc43'" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(ocurren43) from " . $this->Ini->nm_tabela . " where codcte43 = '$this->codcte43' and tipodoc43 = '$this->tipodoc43' and numdoc43 = '$this->numdoc43'" . $str_where_filter; 
         $rs = $this->Db->Execute("select max(ocurren43) from " . $this->Ini->nm_tabela . " where codcte43 = '$this->codcte43' and tipodoc43 = '$this->tipodoc43' and numdoc43 = '$this->numdoc43'" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(ocurren43) from " . $this->Ini->nm_tabela . " where codcte43 = '$this->codcte43' and tipodoc43 = '$this->tipodoc43' and numdoc43 = '$this->numdoc43'" . $str_where_filter; 
         $rs = $this->Db->Execute("select max(ocurren43) from " . $this->Ini->nm_tabela . " where codcte43 = '$this->codcte43' and tipodoc43 = '$this->tipodoc43' and numdoc43 = '$this->numdoc43'" . $str_where_filter); 
     }  
     else  
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(ocurren43) from " . $this->Ini->nm_tabela . " where codcte43 = '$this->codcte43' and tipodoc43 = '$this->tipodoc43' and numdoc43 = '$this->numdoc43'" . $str_where_filter; 
         $rs = $this->Db->Execute("select max(ocurren43) from " . $this->Ini->nm_tabela . " where codcte43 = '$this->codcte43' and tipodoc43 = '$this->tipodoc43' and numdoc43 = '$this->numdoc43'" . $str_where_filter); 
     }  
     $this->ocurren43 = substr($this->Db->qstr($rs->fields[0]), 1, -1); 
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
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(ocurren43) from " . $this->Ini->nm_tabela . " where codcte43 = '$this->codcte43' and tipodoc43 = '$this->tipodoc43' and numdoc43 = '$this->numdoc43' and ocurren43 > '$this->ocurren43'" . $str_where_filter; 
         $rs = $this->Db->Execute("select min(ocurren43) from " . $this->Ini->nm_tabela . " where codcte43 = '$this->codcte43' and tipodoc43 = '$this->tipodoc43' and numdoc43 = '$this->numdoc43' and ocurren43 > '$this->ocurren43'" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(ocurren43) from " . $this->Ini->nm_tabela . " where codcte43 = '$this->codcte43' and tipodoc43 = '$this->tipodoc43' and numdoc43 = '$this->numdoc43' and ocurren43 > '$this->ocurren43'" . $str_where_filter; 
         $rs = $this->Db->Execute("select min(ocurren43) from " . $this->Ini->nm_tabela . " where codcte43 = '$this->codcte43' and tipodoc43 = '$this->tipodoc43' and numdoc43 = '$this->numdoc43' and ocurren43 > '$this->ocurren43'" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(ocurren43) from " . $this->Ini->nm_tabela . " where codcte43 = '$this->codcte43' and tipodoc43 = '$this->tipodoc43' and numdoc43 = '$this->numdoc43' and ocurren43 > '$this->ocurren43'" . $str_where_filter; 
         $rs = $this->Db->Execute("select min(ocurren43) from " . $this->Ini->nm_tabela . " where codcte43 = '$this->codcte43' and tipodoc43 = '$this->tipodoc43' and numdoc43 = '$this->numdoc43' and ocurren43 > '$this->ocurren43'" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(ocurren43) from " . $this->Ini->nm_tabela . " where codcte43 = '$this->codcte43' and tipodoc43 = '$this->tipodoc43' and numdoc43 = '$this->numdoc43' and ocurren43 > '$this->ocurren43'" . $str_where_filter; 
         $rs = $this->Db->Execute("select min(ocurren43) from " . $this->Ini->nm_tabela . " where codcte43 = '$this->codcte43' and tipodoc43 = '$this->tipodoc43' and numdoc43 = '$this->numdoc43' and ocurren43 > '$this->ocurren43'" . $str_where_filter); 
     }  
     else  
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(ocurren43) from " . $this->Ini->nm_tabela . " where codcte43 = '$this->codcte43' and tipodoc43 = '$this->tipodoc43' and numdoc43 = '$this->numdoc43' and ocurren43 > '$this->ocurren43'" . $str_where_filter; 
         $rs = $this->Db->Execute("select min(ocurren43) from " . $this->Ini->nm_tabela . " where codcte43 = '$this->codcte43' and tipodoc43 = '$this->tipodoc43' and numdoc43 = '$this->numdoc43' and ocurren43 > '$this->ocurren43'" . $str_where_filter); 
     }  
     if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
     { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
     }  
     if (isset($rs->fields[0]) && $rs->fields[0] != "") 
     { 
         $this->ocurren43 = substr($this->Db->qstr($rs->fields[0]), 1, -1); 
         $rs->Close();  
         $this->nmgp_opcao = "igual";  
         return ;  
     } 
     $str_where_filter = ('' != $str_where_param) ? ' and ' . $str_where_param : '';
     if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(numdoc43) from " . $this->Ini->nm_tabela . " where codcte43 = '$this->codcte43' and tipodoc43 = '$this->tipodoc43' and numdoc43 > '$this->numdoc43'" . $str_where_filter; 
         $rs = $this->Db->Execute("select min(numdoc43) from " . $this->Ini->nm_tabela . " where codcte43 = '$this->codcte43' and tipodoc43 = '$this->tipodoc43' and numdoc43 > '$this->numdoc43'" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(numdoc43) from " . $this->Ini->nm_tabela . " where codcte43 = '$this->codcte43' and tipodoc43 = '$this->tipodoc43' and numdoc43 > '$this->numdoc43'" . $str_where_filter; 
         $rs = $this->Db->Execute("select min(numdoc43) from " . $this->Ini->nm_tabela . " where codcte43 = '$this->codcte43' and tipodoc43 = '$this->tipodoc43' and numdoc43 > '$this->numdoc43'" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(numdoc43) from " . $this->Ini->nm_tabela . " where codcte43 = '$this->codcte43' and tipodoc43 = '$this->tipodoc43' and numdoc43 > '$this->numdoc43'" . $str_where_filter; 
         $rs = $this->Db->Execute("select min(numdoc43) from " . $this->Ini->nm_tabela . " where codcte43 = '$this->codcte43' and tipodoc43 = '$this->tipodoc43' and numdoc43 > '$this->numdoc43'" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(numdoc43) from " . $this->Ini->nm_tabela . " where codcte43 = '$this->codcte43' and tipodoc43 = '$this->tipodoc43' and numdoc43 > '$this->numdoc43'" . $str_where_filter; 
         $rs = $this->Db->Execute("select min(numdoc43) from " . $this->Ini->nm_tabela . " where codcte43 = '$this->codcte43' and tipodoc43 = '$this->tipodoc43' and numdoc43 > '$this->numdoc43'" . $str_where_filter); 
     }  
     else  
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(numdoc43) from " . $this->Ini->nm_tabela . " where codcte43 = '$this->codcte43' and tipodoc43 = '$this->tipodoc43' and numdoc43 > '$this->numdoc43'" . $str_where_filter; 
         $rs = $this->Db->Execute("select min(numdoc43) from " . $this->Ini->nm_tabela . " where codcte43 = '$this->codcte43' and tipodoc43 = '$this->tipodoc43' and numdoc43 > '$this->numdoc43'" . $str_where_filter); 
     }  
     if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
     { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
     }  
     if (isset($rs->fields[0]) && $rs->fields[0] != "") 
     { 
         $this->numdoc43 = substr($this->Db->qstr($rs->fields[0]), 1, -1); 
         $rs->Close();  
     $str_where_filter = ('' != $str_where_param) ? ' and ' . $str_where_param : '';
         if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
         {
             $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(ocurren43) from " . $this->Ini->nm_tabela . " where codcte43 = '$this->codcte43' and tipodoc43 = '$this->tipodoc43' and numdoc43 = '$this->numdoc43'" . $str_where_filter; 
             $rs = $this->Db->Execute("select min(ocurren43) from " . $this->Ini->nm_tabela . " where codcte43 = '$this->codcte43' and tipodoc43 = '$this->tipodoc43' and numdoc43 = '$this->numdoc43'" . $str_where_filter); 
         }  
         elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
         {
             $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(ocurren43) from " . $this->Ini->nm_tabela . " where codcte43 = '$this->codcte43' and tipodoc43 = '$this->tipodoc43' and numdoc43 = '$this->numdoc43'" . $str_where_filter; 
             $rs = $this->Db->Execute("select min(ocurren43) from " . $this->Ini->nm_tabela . " where codcte43 = '$this->codcte43' and tipodoc43 = '$this->tipodoc43' and numdoc43 = '$this->numdoc43'" . $str_where_filter); 
         }  
         elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
         {
             $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(ocurren43) from " . $this->Ini->nm_tabela . " where codcte43 = '$this->codcte43' and tipodoc43 = '$this->tipodoc43' and numdoc43 = '$this->numdoc43'" . $str_where_filter; 
             $rs = $this->Db->Execute("select min(ocurren43) from " . $this->Ini->nm_tabela . " where codcte43 = '$this->codcte43' and tipodoc43 = '$this->tipodoc43' and numdoc43 = '$this->numdoc43'" . $str_where_filter); 
         }  
         elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
         {
             $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(ocurren43) from " . $this->Ini->nm_tabela . " where codcte43 = '$this->codcte43' and tipodoc43 = '$this->tipodoc43' and numdoc43 = '$this->numdoc43'" . $str_where_filter; 
             $rs = $this->Db->Execute("select min(ocurren43) from " . $this->Ini->nm_tabela . " where codcte43 = '$this->codcte43' and tipodoc43 = '$this->tipodoc43' and numdoc43 = '$this->numdoc43'" . $str_where_filter); 
         }  
         else  
         {
             $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(ocurren43) from " . $this->Ini->nm_tabela . " where codcte43 = '$this->codcte43' and tipodoc43 = '$this->tipodoc43' and numdoc43 = '$this->numdoc43'" . $str_where_filter; 
             $rs = $this->Db->Execute("select min(ocurren43) from " . $this->Ini->nm_tabela . " where codcte43 = '$this->codcte43' and tipodoc43 = '$this->tipodoc43' and numdoc43 = '$this->numdoc43'" . $str_where_filter); 
         }  
         $this->ocurren43 = substr($this->Db->qstr($rs->fields[0]), 1, -1); 
         $this->nmgp_opcao = "igual";  
         return ;  
     } 
     $str_where_filter = ('' != $str_where_param) ? ' and ' . $str_where_param : '';
     if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(tipodoc43) from " . $this->Ini->nm_tabela . " where codcte43 = '$this->codcte43' and tipodoc43 > '$this->tipodoc43'" . $str_where_filter; 
         $rs = $this->Db->Execute("select min(tipodoc43) from " . $this->Ini->nm_tabela . " where codcte43 = '$this->codcte43' and tipodoc43 > '$this->tipodoc43'" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(tipodoc43) from " . $this->Ini->nm_tabela . " where codcte43 = '$this->codcte43' and tipodoc43 > '$this->tipodoc43'" . $str_where_filter; 
         $rs = $this->Db->Execute("select min(tipodoc43) from " . $this->Ini->nm_tabela . " where codcte43 = '$this->codcte43' and tipodoc43 > '$this->tipodoc43'" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(tipodoc43) from " . $this->Ini->nm_tabela . " where codcte43 = '$this->codcte43' and tipodoc43 > '$this->tipodoc43'" . $str_where_filter; 
         $rs = $this->Db->Execute("select min(tipodoc43) from " . $this->Ini->nm_tabela . " where codcte43 = '$this->codcte43' and tipodoc43 > '$this->tipodoc43'" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(tipodoc43) from " . $this->Ini->nm_tabela . " where codcte43 = '$this->codcte43' and tipodoc43 > '$this->tipodoc43'" . $str_where_filter; 
         $rs = $this->Db->Execute("select min(tipodoc43) from " . $this->Ini->nm_tabela . " where codcte43 = '$this->codcte43' and tipodoc43 > '$this->tipodoc43'" . $str_where_filter); 
     }  
     else  
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(tipodoc43) from " . $this->Ini->nm_tabela . " where codcte43 = '$this->codcte43' and tipodoc43 > '$this->tipodoc43'" . $str_where_filter; 
         $rs = $this->Db->Execute("select min(tipodoc43) from " . $this->Ini->nm_tabela . " where codcte43 = '$this->codcte43' and tipodoc43 > '$this->tipodoc43'" . $str_where_filter); 
     }  
     if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
     { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
     }  
     if (isset($rs->fields[0]) && $rs->fields[0] != "") 
     { 
         $this->tipodoc43 = substr($this->Db->qstr($rs->fields[0]), 1, -1); 
         $rs->Close();  
     $str_where_filter = ('' != $str_where_param) ? ' and ' . $str_where_param : '';
         if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
         {
             $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(numdoc43) from " . $this->Ini->nm_tabela . " where codcte43 = '$this->codcte43' and tipodoc43 = '$this->tipodoc43'" . $str_where_filter; 
             $rs = $this->Db->Execute("select min(numdoc43) from " . $this->Ini->nm_tabela . " where codcte43 = '$this->codcte43' and tipodoc43 = '$this->tipodoc43'" . $str_where_filter); 
         }  
         elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
         {
             $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(numdoc43) from " . $this->Ini->nm_tabela . " where codcte43 = '$this->codcte43' and tipodoc43 = '$this->tipodoc43'" . $str_where_filter; 
             $rs = $this->Db->Execute("select min(numdoc43) from " . $this->Ini->nm_tabela . " where codcte43 = '$this->codcte43' and tipodoc43 = '$this->tipodoc43'" . $str_where_filter); 
         }  
         elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
         {
             $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(numdoc43) from " . $this->Ini->nm_tabela . " where codcte43 = '$this->codcte43' and tipodoc43 = '$this->tipodoc43'" . $str_where_filter; 
             $rs = $this->Db->Execute("select min(numdoc43) from " . $this->Ini->nm_tabela . " where codcte43 = '$this->codcte43' and tipodoc43 = '$this->tipodoc43'" . $str_where_filter); 
         }  
         elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
         {
             $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(numdoc43) from " . $this->Ini->nm_tabela . " where codcte43 = '$this->codcte43' and tipodoc43 = '$this->tipodoc43'" . $str_where_filter; 
             $rs = $this->Db->Execute("select min(numdoc43) from " . $this->Ini->nm_tabela . " where codcte43 = '$this->codcte43' and tipodoc43 = '$this->tipodoc43'" . $str_where_filter); 
         }  
         else  
         {
             $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(numdoc43) from " . $this->Ini->nm_tabela . " where codcte43 = '$this->codcte43' and tipodoc43 = '$this->tipodoc43'" . $str_where_filter; 
             $rs = $this->Db->Execute("select min(numdoc43) from " . $this->Ini->nm_tabela . " where codcte43 = '$this->codcte43' and tipodoc43 = '$this->tipodoc43'" . $str_where_filter); 
         }  
         $this->numdoc43 = substr($this->Db->qstr($rs->fields[0]), 1, -1); 
     $str_where_filter = ('' != $str_where_param) ? ' and ' . $str_where_param : '';
         if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
         {
             $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(ocurren43) from " . $this->Ini->nm_tabela . " where codcte43 = '$this->codcte43' and tipodoc43 = '$this->tipodoc43' and numdoc43 = '$this->numdoc43'" . $str_where_filter; 
             $rs = $this->Db->Execute("select min(ocurren43) from " . $this->Ini->nm_tabela . " where codcte43 = '$this->codcte43' and tipodoc43 = '$this->tipodoc43' and numdoc43 = '$this->numdoc43'" . $str_where_filter); 
         }  
         elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
         {
             $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(ocurren43) from " . $this->Ini->nm_tabela . " where codcte43 = '$this->codcte43' and tipodoc43 = '$this->tipodoc43' and numdoc43 = '$this->numdoc43'" . $str_where_filter; 
             $rs = $this->Db->Execute("select min(ocurren43) from " . $this->Ini->nm_tabela . " where codcte43 = '$this->codcte43' and tipodoc43 = '$this->tipodoc43' and numdoc43 = '$this->numdoc43'" . $str_where_filter); 
         }  
         elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
         {
             $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(ocurren43) from " . $this->Ini->nm_tabela . " where codcte43 = '$this->codcte43' and tipodoc43 = '$this->tipodoc43' and numdoc43 = '$this->numdoc43'" . $str_where_filter; 
             $rs = $this->Db->Execute("select min(ocurren43) from " . $this->Ini->nm_tabela . " where codcte43 = '$this->codcte43' and tipodoc43 = '$this->tipodoc43' and numdoc43 = '$this->numdoc43'" . $str_where_filter); 
         }  
         elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
         {
             $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(ocurren43) from " . $this->Ini->nm_tabela . " where codcte43 = '$this->codcte43' and tipodoc43 = '$this->tipodoc43' and numdoc43 = '$this->numdoc43'" . $str_where_filter; 
             $rs = $this->Db->Execute("select min(ocurren43) from " . $this->Ini->nm_tabela . " where codcte43 = '$this->codcte43' and tipodoc43 = '$this->tipodoc43' and numdoc43 = '$this->numdoc43'" . $str_where_filter); 
         }  
         else  
         {
             $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(ocurren43) from " . $this->Ini->nm_tabela . " where codcte43 = '$this->codcte43' and tipodoc43 = '$this->tipodoc43' and numdoc43 = '$this->numdoc43'" . $str_where_filter; 
             $rs = $this->Db->Execute("select min(ocurren43) from " . $this->Ini->nm_tabela . " where codcte43 = '$this->codcte43' and tipodoc43 = '$this->tipodoc43' and numdoc43 = '$this->numdoc43'" . $str_where_filter); 
         }  
         $this->ocurren43 = substr($this->Db->qstr($rs->fields[0]), 1, -1); 
         $this->nmgp_opcao = "igual";  
         return ;  
     } 
     $str_where_filter = ('' != $str_where_param) ? ' and ' . $str_where_param : '';
     if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(codcte43) from " . $this->Ini->nm_tabela . " where codcte43 > '$this->codcte43'" . $str_where_filter; 
         $rs = $this->Db->Execute("select min(codcte43) from " . $this->Ini->nm_tabela . " where codcte43 > '$this->codcte43'" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(codcte43) from " . $this->Ini->nm_tabela . " where codcte43 > '$this->codcte43'" . $str_where_filter; 
         $rs = $this->Db->Execute("select min(codcte43) from " . $this->Ini->nm_tabela . " where codcte43 > '$this->codcte43'" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(codcte43) from " . $this->Ini->nm_tabela . " where codcte43 > '$this->codcte43'" . $str_where_filter; 
         $rs = $this->Db->Execute("select min(codcte43) from " . $this->Ini->nm_tabela . " where codcte43 > '$this->codcte43'" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(codcte43) from " . $this->Ini->nm_tabela . " where codcte43 > '$this->codcte43'" . $str_where_filter; 
         $rs = $this->Db->Execute("select min(codcte43) from " . $this->Ini->nm_tabela . " where codcte43 > '$this->codcte43'" . $str_where_filter); 
     }  
     else  
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(codcte43) from " . $this->Ini->nm_tabela . " where codcte43 > '$this->codcte43'" . $str_where_filter; 
         $rs = $this->Db->Execute("select min(codcte43) from " . $this->Ini->nm_tabela . " where codcte43 > '$this->codcte43'" . $str_where_filter); 
     }  
     if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
     { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
     }  
     if (isset($rs->fields[0]) && $rs->fields[0] != "") 
     { 
         $this->codcte43 = substr($this->Db->qstr($rs->fields[0]), 1, -1); 
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
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(tipodoc43) from " . $this->Ini->nm_tabela . " where codcte43 = '$this->codcte43'" . $str_where_filter; 
         $rs = $this->Db->Execute("select min(tipodoc43) from " . $this->Ini->nm_tabela . " where codcte43 = '$this->codcte43'" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(tipodoc43) from " . $this->Ini->nm_tabela . " where codcte43 = '$this->codcte43'" . $str_where_filter; 
         $rs = $this->Db->Execute("select min(tipodoc43) from " . $this->Ini->nm_tabela . " where codcte43 = '$this->codcte43'" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(tipodoc43) from " . $this->Ini->nm_tabela . " where codcte43 = '$this->codcte43'" . $str_where_filter; 
         $rs = $this->Db->Execute("select min(tipodoc43) from " . $this->Ini->nm_tabela . " where codcte43 = '$this->codcte43'" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(tipodoc43) from " . $this->Ini->nm_tabela . " where codcte43 = '$this->codcte43'" . $str_where_filter; 
         $rs = $this->Db->Execute("select min(tipodoc43) from " . $this->Ini->nm_tabela . " where codcte43 = '$this->codcte43'" . $str_where_filter); 
     }  
     else  
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(tipodoc43) from " . $this->Ini->nm_tabela . " where codcte43 = '$this->codcte43'" . $str_where_filter; 
         $rs = $this->Db->Execute("select min(tipodoc43) from " . $this->Ini->nm_tabela . " where codcte43 = '$this->codcte43'" . $str_where_filter); 
     }  
     $this->tipodoc43 = substr($this->Db->qstr($rs->fields[0]), 1, -1); 
     $rs->Close();  
     $str_where_filter = ('' != $str_where_param) ? ' and ' . $str_where_param : '';
     if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(numdoc43) from " . $this->Ini->nm_tabela . " where codcte43 = '$this->codcte43' and tipodoc43 = '$this->tipodoc43'" . $str_where_filter; 
         $rs = $this->Db->Execute("select min(numdoc43) from " . $this->Ini->nm_tabela . " where codcte43 = '$this->codcte43' and tipodoc43 = '$this->tipodoc43'" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(numdoc43) from " . $this->Ini->nm_tabela . " where codcte43 = '$this->codcte43' and tipodoc43 = '$this->tipodoc43'" . $str_where_filter; 
         $rs = $this->Db->Execute("select min(numdoc43) from " . $this->Ini->nm_tabela . " where codcte43 = '$this->codcte43' and tipodoc43 = '$this->tipodoc43'" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(numdoc43) from " . $this->Ini->nm_tabela . " where codcte43 = '$this->codcte43' and tipodoc43 = '$this->tipodoc43'" . $str_where_filter; 
         $rs = $this->Db->Execute("select min(numdoc43) from " . $this->Ini->nm_tabela . " where codcte43 = '$this->codcte43' and tipodoc43 = '$this->tipodoc43'" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(numdoc43) from " . $this->Ini->nm_tabela . " where codcte43 = '$this->codcte43' and tipodoc43 = '$this->tipodoc43'" . $str_where_filter; 
         $rs = $this->Db->Execute("select min(numdoc43) from " . $this->Ini->nm_tabela . " where codcte43 = '$this->codcte43' and tipodoc43 = '$this->tipodoc43'" . $str_where_filter); 
     }  
     else  
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(numdoc43) from " . $this->Ini->nm_tabela . " where codcte43 = '$this->codcte43' and tipodoc43 = '$this->tipodoc43'" . $str_where_filter; 
         $rs = $this->Db->Execute("select min(numdoc43) from " . $this->Ini->nm_tabela . " where codcte43 = '$this->codcte43' and tipodoc43 = '$this->tipodoc43'" . $str_where_filter); 
     }  
     $this->numdoc43 = substr($this->Db->qstr($rs->fields[0]), 1, -1); 
     $rs->Close();  
     $str_where_filter = ('' != $str_where_param) ? ' and ' . $str_where_param : '';
     if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(ocurren43) from " . $this->Ini->nm_tabela . " where codcte43 = '$this->codcte43' and tipodoc43 = '$this->tipodoc43' and numdoc43 = '$this->numdoc43'" . $str_where_filter; 
         $rs = $this->Db->Execute("select min(ocurren43) from " . $this->Ini->nm_tabela . " where codcte43 = '$this->codcte43' and tipodoc43 = '$this->tipodoc43' and numdoc43 = '$this->numdoc43'" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(ocurren43) from " . $this->Ini->nm_tabela . " where codcte43 = '$this->codcte43' and tipodoc43 = '$this->tipodoc43' and numdoc43 = '$this->numdoc43'" . $str_where_filter; 
         $rs = $this->Db->Execute("select min(ocurren43) from " . $this->Ini->nm_tabela . " where codcte43 = '$this->codcte43' and tipodoc43 = '$this->tipodoc43' and numdoc43 = '$this->numdoc43'" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(ocurren43) from " . $this->Ini->nm_tabela . " where codcte43 = '$this->codcte43' and tipodoc43 = '$this->tipodoc43' and numdoc43 = '$this->numdoc43'" . $str_where_filter; 
         $rs = $this->Db->Execute("select min(ocurren43) from " . $this->Ini->nm_tabela . " where codcte43 = '$this->codcte43' and tipodoc43 = '$this->tipodoc43' and numdoc43 = '$this->numdoc43'" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(ocurren43) from " . $this->Ini->nm_tabela . " where codcte43 = '$this->codcte43' and tipodoc43 = '$this->tipodoc43' and numdoc43 = '$this->numdoc43'" . $str_where_filter; 
         $rs = $this->Db->Execute("select min(ocurren43) from " . $this->Ini->nm_tabela . " where codcte43 = '$this->codcte43' and tipodoc43 = '$this->tipodoc43' and numdoc43 = '$this->numdoc43'" . $str_where_filter); 
     }  
     else  
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(ocurren43) from " . $this->Ini->nm_tabela . " where codcte43 = '$this->codcte43' and tipodoc43 = '$this->tipodoc43' and numdoc43 = '$this->numdoc43'" . $str_where_filter; 
         $rs = $this->Db->Execute("select min(ocurren43) from " . $this->Ini->nm_tabela . " where codcte43 = '$this->codcte43' and tipodoc43 = '$this->tipodoc43' and numdoc43 = '$this->numdoc43'" . $str_where_filter); 
     }  
     $this->ocurren43 = substr($this->Db->qstr($rs->fields[0]), 1, -1); 
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
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(codcte43) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select min(codcte43) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(codcte43) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select min(codcte43) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(codcte43) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select min(codcte43) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(codcte43) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select min(codcte43) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
     }  
     else  
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(codcte43) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select min(codcte43) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
     }  
     if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
     { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
     }  
     if (!isset($rs->fields[0]) || $rs->EOF) 
     { 
         if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['where_filter']))
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
     $this->codcte43 = substr($this->Db->qstr($rs->fields[0]), 1, -1); 
     $rs->Close();  
     $str_where_filter = ('' != $str_where_param) ? ' and ' . $str_where_param : '';
     if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(tipodoc43) from " . $this->Ini->nm_tabela . "  where codcte43 = '$this->codcte43'" . $str_where_filter; 
         $rs = $this->Db->Execute("select min(tipodoc43) from " . $this->Ini->nm_tabela . "  where codcte43 = '$this->codcte43'" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(tipodoc43) from " . $this->Ini->nm_tabela . "  where codcte43 = '$this->codcte43'" . $str_where_filter; 
         $rs = $this->Db->Execute("select min(tipodoc43) from " . $this->Ini->nm_tabela . "  where codcte43 = '$this->codcte43'" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(tipodoc43) from " . $this->Ini->nm_tabela . "  where codcte43 = '$this->codcte43'" . $str_where_filter; 
         $rs = $this->Db->Execute("select min(tipodoc43) from " . $this->Ini->nm_tabela . "  where codcte43 = '$this->codcte43'" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(tipodoc43) from " . $this->Ini->nm_tabela . "  where codcte43 = '$this->codcte43'" . $str_where_filter; 
         $rs = $this->Db->Execute("select min(tipodoc43) from " . $this->Ini->nm_tabela . "  where codcte43 = '$this->codcte43'" . $str_where_filter); 
     }  
     else  
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(tipodoc43) from " . $this->Ini->nm_tabela . "  where codcte43 = '$this->codcte43'" . $str_where_filter; 
         $rs = $this->Db->Execute("select min(tipodoc43) from " . $this->Ini->nm_tabela . "  where codcte43 = '$this->codcte43'" . $str_where_filter); 
     }  
     if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
     { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
     }  
     $this->tipodoc43 = substr($this->Db->qstr($rs->fields[0]), 1, -1); 
     $rs->Close();  
     $str_where_filter = ('' != $str_where_param) ? ' and ' . $str_where_param : '';
     if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(numdoc43) from " . $this->Ini->nm_tabela . "  where codcte43 = '$this->codcte43' and tipodoc43 = '$this->tipodoc43'" . $str_where_filter; 
         $rs = $this->Db->Execute("select min(numdoc43) from " . $this->Ini->nm_tabela . "  where codcte43 = '$this->codcte43' and tipodoc43 = '$this->tipodoc43'" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(numdoc43) from " . $this->Ini->nm_tabela . "  where codcte43 = '$this->codcte43' and tipodoc43 = '$this->tipodoc43'" . $str_where_filter; 
         $rs = $this->Db->Execute("select min(numdoc43) from " . $this->Ini->nm_tabela . "  where codcte43 = '$this->codcte43' and tipodoc43 = '$this->tipodoc43'" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(numdoc43) from " . $this->Ini->nm_tabela . "  where codcte43 = '$this->codcte43' and tipodoc43 = '$this->tipodoc43'" . $str_where_filter; 
         $rs = $this->Db->Execute("select min(numdoc43) from " . $this->Ini->nm_tabela . "  where codcte43 = '$this->codcte43' and tipodoc43 = '$this->tipodoc43'" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(numdoc43) from " . $this->Ini->nm_tabela . "  where codcte43 = '$this->codcte43' and tipodoc43 = '$this->tipodoc43'" . $str_where_filter; 
         $rs = $this->Db->Execute("select min(numdoc43) from " . $this->Ini->nm_tabela . "  where codcte43 = '$this->codcte43' and tipodoc43 = '$this->tipodoc43'" . $str_where_filter); 
     }  
     else  
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(numdoc43) from " . $this->Ini->nm_tabela . "  where codcte43 = '$this->codcte43' and tipodoc43 = '$this->tipodoc43'" . $str_where_filter; 
         $rs = $this->Db->Execute("select min(numdoc43) from " . $this->Ini->nm_tabela . "  where codcte43 = '$this->codcte43' and tipodoc43 = '$this->tipodoc43'" . $str_where_filter); 
     }  
     if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
     { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
     }  
     $this->numdoc43 = substr($this->Db->qstr($rs->fields[0]), 1, -1); 
     $rs->Close();  
     $str_where_filter = ('' != $str_where_param) ? ' and ' . $str_where_param : '';
     if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(ocurren43) from " . $this->Ini->nm_tabela . "  where codcte43 = '$this->codcte43' and tipodoc43 = '$this->tipodoc43' and numdoc43 = '$this->numdoc43'" . $str_where_filter; 
         $rs = $this->Db->Execute("select min(ocurren43) from " . $this->Ini->nm_tabela . "  where codcte43 = '$this->codcte43' and tipodoc43 = '$this->tipodoc43' and numdoc43 = '$this->numdoc43'" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(ocurren43) from " . $this->Ini->nm_tabela . "  where codcte43 = '$this->codcte43' and tipodoc43 = '$this->tipodoc43' and numdoc43 = '$this->numdoc43'" . $str_where_filter; 
         $rs = $this->Db->Execute("select min(ocurren43) from " . $this->Ini->nm_tabela . "  where codcte43 = '$this->codcte43' and tipodoc43 = '$this->tipodoc43' and numdoc43 = '$this->numdoc43'" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(ocurren43) from " . $this->Ini->nm_tabela . "  where codcte43 = '$this->codcte43' and tipodoc43 = '$this->tipodoc43' and numdoc43 = '$this->numdoc43'" . $str_where_filter; 
         $rs = $this->Db->Execute("select min(ocurren43) from " . $this->Ini->nm_tabela . "  where codcte43 = '$this->codcte43' and tipodoc43 = '$this->tipodoc43' and numdoc43 = '$this->numdoc43'" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(ocurren43) from " . $this->Ini->nm_tabela . "  where codcte43 = '$this->codcte43' and tipodoc43 = '$this->tipodoc43' and numdoc43 = '$this->numdoc43'" . $str_where_filter; 
         $rs = $this->Db->Execute("select min(ocurren43) from " . $this->Ini->nm_tabela . "  where codcte43 = '$this->codcte43' and tipodoc43 = '$this->tipodoc43' and numdoc43 = '$this->numdoc43'" . $str_where_filter); 
     }  
     else  
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(ocurren43) from " . $this->Ini->nm_tabela . "  where codcte43 = '$this->codcte43' and tipodoc43 = '$this->tipodoc43' and numdoc43 = '$this->numdoc43'" . $str_where_filter; 
         $rs = $this->Db->Execute("select min(ocurren43) from " . $this->Ini->nm_tabela . "  where codcte43 = '$this->codcte43' and tipodoc43 = '$this->tipodoc43' and numdoc43 = '$this->numdoc43'" . $str_where_filter); 
     }  
     if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
     { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
     }  
     $this->ocurren43 = substr($this->Db->qstr($rs->fields[0]), 1, -1); 
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
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(codcte43) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select max(codcte43) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(codcte43) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select max(codcte43) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(codcte43) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select max(codcte43) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(codcte43) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select max(codcte43) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
     }  
     else  
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(codcte43) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select max(codcte43) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
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
     $this->codcte43 = substr($this->Db->qstr($rs->fields[0]), 1, -1); 
     $rs->Close();  
     $str_where_filter = ('' != $str_where_param) ? ' and ' . $str_where_param : '';
     if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(tipodoc43) from " . $this->Ini->nm_tabela . "  where codcte43 = '$this->codcte43'" . $str_where_filter; 
         $rs = $this->Db->Execute("select max(tipodoc43) from " . $this->Ini->nm_tabela . "  where codcte43 = '$this->codcte43'" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(tipodoc43) from " . $this->Ini->nm_tabela . "  where codcte43 = '$this->codcte43'" . $str_where_filter; 
         $rs = $this->Db->Execute("select max(tipodoc43) from " . $this->Ini->nm_tabela . "  where codcte43 = '$this->codcte43'" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(tipodoc43) from " . $this->Ini->nm_tabela . "  where codcte43 = '$this->codcte43'" . $str_where_filter; 
         $rs = $this->Db->Execute("select max(tipodoc43) from " . $this->Ini->nm_tabela . "  where codcte43 = '$this->codcte43'" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(tipodoc43) from " . $this->Ini->nm_tabela . "  where codcte43 = '$this->codcte43'" . $str_where_filter; 
         $rs = $this->Db->Execute("select max(tipodoc43) from " . $this->Ini->nm_tabela . "  where codcte43 = '$this->codcte43'" . $str_where_filter); 
     }  
     else  
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(tipodoc43) from " . $this->Ini->nm_tabela . "  where codcte43 = '$this->codcte43'" . $str_where_filter; 
         $rs = $this->Db->Execute("select max(tipodoc43) from " . $this->Ini->nm_tabela . "  where codcte43 = '$this->codcte43'" . $str_where_filter); 
     }  
     if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
     { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
     }  
     $this->tipodoc43 = substr($this->Db->qstr($rs->fields[0]), 1, -1); 
     $rs->Close();  
     $str_where_filter = ('' != $str_where_param) ? ' and ' . $str_where_param : '';
     if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(numdoc43) from " . $this->Ini->nm_tabela . "  where codcte43 = '$this->codcte43' and tipodoc43 = '$this->tipodoc43'" . $str_where_filter; 
         $rs = $this->Db->Execute("select max(numdoc43) from " . $this->Ini->nm_tabela . "  where codcte43 = '$this->codcte43' and tipodoc43 = '$this->tipodoc43'" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(numdoc43) from " . $this->Ini->nm_tabela . "  where codcte43 = '$this->codcte43' and tipodoc43 = '$this->tipodoc43'" . $str_where_filter; 
         $rs = $this->Db->Execute("select max(numdoc43) from " . $this->Ini->nm_tabela . "  where codcte43 = '$this->codcte43' and tipodoc43 = '$this->tipodoc43'" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(numdoc43) from " . $this->Ini->nm_tabela . "  where codcte43 = '$this->codcte43' and tipodoc43 = '$this->tipodoc43'" . $str_where_filter; 
         $rs = $this->Db->Execute("select max(numdoc43) from " . $this->Ini->nm_tabela . "  where codcte43 = '$this->codcte43' and tipodoc43 = '$this->tipodoc43'" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(numdoc43) from " . $this->Ini->nm_tabela . "  where codcte43 = '$this->codcte43' and tipodoc43 = '$this->tipodoc43'" . $str_where_filter; 
         $rs = $this->Db->Execute("select max(numdoc43) from " . $this->Ini->nm_tabela . "  where codcte43 = '$this->codcte43' and tipodoc43 = '$this->tipodoc43'" . $str_where_filter); 
     }  
     else  
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(numdoc43) from " . $this->Ini->nm_tabela . "  where codcte43 = '$this->codcte43' and tipodoc43 = '$this->tipodoc43'" . $str_where_filter; 
         $rs = $this->Db->Execute("select max(numdoc43) from " . $this->Ini->nm_tabela . "  where codcte43 = '$this->codcte43' and tipodoc43 = '$this->tipodoc43'" . $str_where_filter); 
     }  
     if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
     { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
     }  
     $this->numdoc43 = substr($this->Db->qstr($rs->fields[0]), 1, -1); 
     $rs->Close();  
     $str_where_filter = ('' != $str_where_param) ? ' and ' . $str_where_param : '';
     if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(ocurren43) from " . $this->Ini->nm_tabela . "  where codcte43 = '$this->codcte43' and tipodoc43 = '$this->tipodoc43' and numdoc43 = '$this->numdoc43'" . $str_where_filter; 
         $rs = $this->Db->Execute("select max(ocurren43) from " . $this->Ini->nm_tabela . "  where codcte43 = '$this->codcte43' and tipodoc43 = '$this->tipodoc43' and numdoc43 = '$this->numdoc43'" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(ocurren43) from " . $this->Ini->nm_tabela . "  where codcte43 = '$this->codcte43' and tipodoc43 = '$this->tipodoc43' and numdoc43 = '$this->numdoc43'" . $str_where_filter; 
         $rs = $this->Db->Execute("select max(ocurren43) from " . $this->Ini->nm_tabela . "  where codcte43 = '$this->codcte43' and tipodoc43 = '$this->tipodoc43' and numdoc43 = '$this->numdoc43'" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(ocurren43) from " . $this->Ini->nm_tabela . "  where codcte43 = '$this->codcte43' and tipodoc43 = '$this->tipodoc43' and numdoc43 = '$this->numdoc43'" . $str_where_filter; 
         $rs = $this->Db->Execute("select max(ocurren43) from " . $this->Ini->nm_tabela . "  where codcte43 = '$this->codcte43' and tipodoc43 = '$this->tipodoc43' and numdoc43 = '$this->numdoc43'" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(ocurren43) from " . $this->Ini->nm_tabela . "  where codcte43 = '$this->codcte43' and tipodoc43 = '$this->tipodoc43' and numdoc43 = '$this->numdoc43'" . $str_where_filter; 
         $rs = $this->Db->Execute("select max(ocurren43) from " . $this->Ini->nm_tabela . "  where codcte43 = '$this->codcte43' and tipodoc43 = '$this->tipodoc43' and numdoc43 = '$this->numdoc43'" . $str_where_filter); 
     }  
     else  
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(ocurren43) from " . $this->Ini->nm_tabela . "  where codcte43 = '$this->codcte43' and tipodoc43 = '$this->tipodoc43' and numdoc43 = '$this->numdoc43'" . $str_where_filter; 
         $rs = $this->Db->Execute("select max(ocurren43) from " . $this->Ini->nm_tabela . "  where codcte43 = '$this->codcte43' and tipodoc43 = '$this->tipodoc43' and numdoc43 = '$this->numdoc43'" . $str_where_filter); 
     }  
     if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
     { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
     }  
     $this->ocurren43 = substr($this->Db->qstr($rs->fields[0]), 1, -1); 
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
       $rec_tot    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['total'] + 1;
       $rec_fim    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['reg_start'] + 1;
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
                $_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['record_state'] = array();
        }

        function storeRecordState($sc_seq_vert = 0) {
                if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['record_state'])) {
                        $this->initializeRecordState();
                }
                if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['record_state'][$sc_seq_vert])) {
                        $_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['record_state'][$sc_seq_vert] = array();
                }

                $_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['record_state'][$sc_seq_vert]['buttons'] = array(
                        'delete' => $this->nmgp_botoes['delete'],
                        'update' => $this->nmgp_botoes['update']
                );
        }

        function loadRecordState($sc_seq_vert = 0) {
                if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['record_state']) || !isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['record_state'][$sc_seq_vert])) {
                        return;
                }

                if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['record_state'][$sc_seq_vert]['buttons']['delete'])) {
                        $this->nmgp_botoes['delete'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['record_state'][$sc_seq_vert]['buttons']['delete'];
                }
                if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['record_state'][$sc_seq_vert]['buttons']['update'])) {
                        $this->nmgp_botoes['update'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['record_state'][$sc_seq_vert]['buttons']['update'];
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
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['botoes'] = $this->nmgp_botoes;
     if ($this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form")
     {
         $_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['opc_ant'] = $this->nmgp_opcao;
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
     if (($_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['run_iframe'] == "R") && $this->nm_flag_iframe && empty($this->nm_todas_criticas))
     {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['run_iframe_ajax']))
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['retorno_edit'] = array("edit", "");
          }
          else
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['retorno_edit'] .= "&nmgp_opcao=edit";
          }
          if ($this->sc_evento == "insert" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['run_iframe'] == "F")
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['run_iframe_ajax']))
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['retorno_edit'] = array("edit", "fim");
              }
              else
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['retorno_edit'] .= "&rec=fim";
              }
          }
          $this->NM_close_db(); 
          $sJsParent = '';
          if ($this->NM_ajax_flag && isset($this->NM_ajax_info['param']['buffer_output']) && $this->NM_ajax_info['param']['buffer_output'])
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['run_iframe_ajax']))
              {
                  $this->NM_ajax_info['ajaxJavascript'][] = array("parent.ajax_navigate", $_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['retorno_edit']);
              }
              else
              {
                  $sJsParent .= 'parent';
                  $this->NM_ajax_info['redir']['metodo'] = 'location';
                  $this->NM_ajax_info['redir']['action'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['retorno_edit'];
                  $this->NM_ajax_info['redir']['target'] = $sJsParent;
              }
              form_movpag_pack_ajax_response();
              exit;
          }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">

         <html><body>
         <script type="text/javascript">
<?php
    
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['run_iframe_ajax']))
    {
        $opc = ($_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['run_iframe'] == "F" && $this->sc_evento == "insert") ? "fim" : "";
        echo "parent.ajax_navigate('edit', '" .$opc . "');";
    }
    else
    {
        echo $sJsParent . "parent.location = '" . $_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['retorno_edit'] . "';";
    }
?>
         </script>
         </body></html>
<?php
         exit;
     }
        $this->initFormPages();
    include_once("form_movpag_form0.php");
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
        if ('SC_all_Cmp' == $this->nmgp_fast_search && in_array($field, array("codcte43", "tipodoc43", "numdoc43", "ocurren43", "cocte43", "fecdoc43", "tipdoc43", "numvencob43", "fedoc43", "totdoc43", "detalle43", "cvanioant43", "cvdivisa43", "valdivisa43", "valdivisaori43", "factcompra43", "seriecompra43", "autocompra43", "codret43", "valini43", "numcuotasord43", "valormov43", "saldoregmov43", "feccobro43", "codpagounif43", "tipodocdb43", "numdocdb43", "ocurrecdocdb43", "numrecibo43", "valorabono43", "efectcheque43", "saldoexceso43", "saldocte43", "codpago43", "numdocpago43", "obsdocpago43", "uid", "cvtransfer43", "fectransfer43", "tipoimp43", "porcimp43", "bienserv43", "credgast43", "fecvencompra43", "fecvenret43", "numautoret43", "sdoexeact43", "sdoregact43", "conta43", "cvanulado43", "baseret43", "ret_con_iva43", "retenciones43", "idb", "tipocomptehis", "banco", "numero_transferencia", "estado_electronico", "proyecto", "rubro", "categoria", "tipo_documento_atado", "numero_documento_atado", "valor_superior_al_maximo", "distribucion_retencion"))) {
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
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['table_refresh']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['table_refresh'])
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
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['csrf_token']))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['csrf_token'] = $this->scCsrfGenerateToken();
        }

        return $_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['csrf_token'];
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
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['where_filter']);
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['total']);
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['fast_search']);
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['where_detal']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['where_detal'])) 
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['where_filter'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['where_detal'];
          }
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['empty_filter']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['empty_filter'])
          {
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['empty_filter']);
              $this->NM_ajax_info['empty_filter'] = 'ok';
              form_movpag_pack_ajax_response();
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
              $this->SC_monta_condicao($comando, "codcte43", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "tipodoc43", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "numdoc43", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "ocurren43", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "cocte43", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "fecdoc43", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "tipdoc43", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "numvencob43", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "fedoc43", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "totdoc43", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "detalle43", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "cvanioant43", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "cvdivisa43", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "valdivisa43", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "valdivisaori43", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "factcompra43", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "seriecompra43", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "autocompra43", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "codret43", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "valini43", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "numcuotasord43", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "valormov43", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "saldoregmov43", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "feccobro43", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "codpagounif43", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "tipodocdb43", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "numdocdb43", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "ocurrecdocdb43", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "numrecibo43", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "valorabono43", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "efectcheque43", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "saldoexceso43", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "saldocte43", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "codpago43", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "numdocpago43", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "obsdocpago43", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "UID", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "cvtransfer43", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "fectransfer43", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "tipoimp43", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "porcimp43", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "bienserv43", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "credgast43", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "fecvencompra43", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "fecvenret43", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "numautoret43", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "sdoexeact43", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "sdoregact43", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "conta43", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "cvanulado43", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "baseret43", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "ret_con_iva43", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "retenciones43", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "IDB", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "tipocomptehis", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "banco", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "numero_transferencia", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "estado_electronico", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "proyecto", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "rubro", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "categoria", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "tipo_documento_atado", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "numero_documento_atado", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "valor_superior_al_maximo", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "distribucion_retencion", $arg_search, $data_search);
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['where_detal']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['where_detal']) && !empty($comando)) 
      {
          $comando = $_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['where_detal'] . " and (" .  $comando . ")";
      }
      if (empty($comando)) 
      {
          $comando = " 1 <> 1 "; 
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['where_filter_form']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['where_filter_form'])
      {
          $sc_where = " where " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['where_filter_form'] . " and (" . $comando . ")";
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
      $qt_geral_reg_form_movpag = isset($rt->fields[0]) ? $rt->fields[0] - 1 : 0; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['total'] = $qt_geral_reg_form_movpag;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['where_filter'] = $comando;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['fast_search'][0] = $field;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['fast_search'][1] = $arg_search;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['fast_search'][2] = $sv_data;
      $rt->Close(); 
      if (isset($rt->fields[0]) && $rt->fields[0] > 0 &&  isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['empty_filter']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['empty_filter'])
      {
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['empty_filter']);
          $this->NM_ajax_info['empty_filter'] = 'ok';
          form_movpag_pack_ajax_response();
          exit;
      }
      elseif (!isset($rt->fields[0]) || $rt->fields[0] == 0)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['empty_filter'] = true;
          $this->NM_ajax_info['empty_filter'] = 'ok';
          form_movpag_pack_ajax_response();
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
      $nm_numeric[] = "totdoc43";$nm_numeric[] = "valdivisa43";$nm_numeric[] = "valdivisaori43";$nm_numeric[] = "valini43";$nm_numeric[] = "numcuotasord43";$nm_numeric[] = "valormov43";$nm_numeric[] = "saldoregmov43";$nm_numeric[] = "valorabono43";$nm_numeric[] = "saldoexceso43";$nm_numeric[] = "saldocte43";$nm_numeric[] = "uid";$nm_numeric[] = "tipoimp43";$nm_numeric[] = "porcimp43";$nm_numeric[] = "bienserv43";$nm_numeric[] = "sdoexeact43";$nm_numeric[] = "sdoregact43";$nm_numeric[] = "baseret43";$nm_numeric[] = "numero_transferencia";$nm_numeric[] = "estado_electronico";$nm_numeric[] = "valor_superior_al_maximo";
      if (in_array($campo_join, $nm_numeric))
      {
         if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['decimal_db'] == ".")
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
      $Nm_datas["fecdoc43"] = "datetime";$Nm_datas["fedoc43"] = "datetime";$Nm_datas["feccobro43"] = "date";$Nm_datas["fectransfer43"] = "date";$Nm_datas["fecvencompra43"] = "date";$Nm_datas["fecvenret43"] = "date";
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
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['SC_sep_date']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['SC_sep_date']))
              {
                  $nm_aspas  = $_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['SC_sep_date'];
                  $nm_aspas1 = $_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['SC_sep_date1'];
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
       $nmgp_saida_form = "form_movpag_fim.php";
   }
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['redir']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['redir'] == 'redir')
   {
       unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']);
   }
   unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['opc_ant']);
   if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['nm_run_menu']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['nm_run_menu'] == 1)
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['nm_run_menu'] = 2;
       $nmgp_saida_form = "form_movpag_fim.php";
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
       form_movpag_pack_ajax_response();
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
   if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['sc_modal'])
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
if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['masterValue']))
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['dashboard_info']['under_dashboard']) {
?>
var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['dashboard_info']['parent_widget']; ?>']");
if (dbParentFrame && dbParentFrame[0] && dbParentFrame[0].contentWindow.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['masterValue'] as $cmp_master => $val_master)
        {
?>
    dbParentFrame[0].contentWindow.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['masterValue']);
?>
}
<?php
    }
    else {
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['masterValue'] as $cmp_master => $val_master)
        {
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['masterValue']);
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
        if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['run_iframe'] != "R") {
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
        if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['ordem_cmp'] == $fieldName) {
            $orderColName = $fieldName;
            if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_movpag']['ordem_ord'] == " desc") {
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
            case "totdoc43":
                return true;
            case "valdivisa43":
                return true;
            case "valdivisaori43":
                return true;
            case "valini43":
                return true;
            case "valormov43":
                return true;
            case "saldoregmov43":
                return true;
            case "valorabono43":
                return true;
            case "saldoexceso43":
                return true;
            case "saldocte43":
                return true;
            case "tipoimp43":
                return true;
            case "porcimp43":
                return true;
            case "sdoexeact43":
                return true;
            case "sdoregact43":
                return true;
            case "baseret43":
                return true;
            case "numero_transferencia":
                return true;
            case "estado_electronico":
                return true;
            case "valor_superior_al_maximo":
                return true;
            default:
                return false;
        }
        return false;
    }

    function scGetDefaultFieldOrder($fieldName)
    {
        switch ($fieldName) {
            case "fecdoc43":
                return 'desc';
            case "fedoc43":
                return 'desc';
            case "totdoc43":
                return 'desc';
            case "valdivisa43":
                return 'desc';
            case "valdivisaori43":
                return 'desc';
            case "valini43":
                return 'desc';
            case "valormov43":
                return 'desc';
            case "saldoregmov43":
                return 'desc';
            case "feccobro43":
                return 'desc';
            case "valorabono43":
                return 'desc';
            case "saldoexceso43":
                return 'desc';
            case "saldocte43":
                return 'desc';
            case "fectransfer43":
                return 'desc';
            case "tipoimp43":
                return 'desc';
            case "porcimp43":
                return 'desc';
            case "fecvencompra43":
                return 'desc';
            case "fecvenret43":
                return 'desc';
            case "sdoexeact43":
                return 'desc';
            case "sdoregact43":
                return 'desc';
            case "baseret43":
                return 'desc';
            case "numero_transferencia":
                return 'desc';
            case "estado_electronico":
                return 'desc';
            case "valor_superior_al_maximo":
                return 'desc';
            default:
                return 'asc';
        }
        return 'asc';
    }
}
?>
