<?php
//
class form_maepag_apl
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
   var $codcte01;
   var $nomcte01;
   var $cv1cte01;
   var $cv2cte01;
   var $tipcte01;
   var $ofienccte01;
   var $vendcte01;
   var $cobrcte01;
   var $loccte01;
   var $dircte01;
   var $telcte01;
   var $cascte01;
   var $fecing01;
   var $fecing01_hora;
   var $condpag01;
   var $desctocte01;
   var $limcred01;
   var $desppar01;
   var $cheqpro01;
   var $sdoeje01;
   var $sdoant01;
   var $sdoact01;
   var $acudbm01;
   var $acucrm01;
   var $acudbe01;
   var $acucre01;
   var $comentcte01;
   var $statuscte01;
   var $identcte01;
   var $cordcte01;
   var $limcant01;
   var $pagleg01;
   var $telcte01b;
   var $telcte01c;
   var $emailcte01;
   var $ctacgcte01;
   var $obsercte01;
   var $totexceso01;
   var $imagencte01;
   var $block;
   var $uid;
   var $ultimoacceso;
   var $idcli;
   var $catcte01;
   var $numautosri01;
   var $seriedoc01;
   var $fecvencdoc01;
   var $repleg01;
   var $coddest01;
   var $longitud01;
   var $latitud01;
   var $zoom01;
   var $coniva01;
   var $conret01;
   var $tipo_identificacion;
   var $es_padre;
   var $bonos;
   var $rendimiento;
   var $parterel01;
   var $clase_contribuyente;
   var $tipo_contribuyente;
   var $lleva_contabilidad;
   var $ctacgant01;
   var $residentefiscal01;
   var $es_cliente;
   var $grupos;
   var $codigo_banco;
   var $tipo_cuenta_banco;
   var $nro_cuenta_banco;
   var $pago_transferencia;
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
          if (isset($this->NM_ajax_info['param']['acucre01']))
          {
              $this->acucre01 = $this->NM_ajax_info['param']['acucre01'];
          }
          if (isset($this->NM_ajax_info['param']['acucrm01']))
          {
              $this->acucrm01 = $this->NM_ajax_info['param']['acucrm01'];
          }
          if (isset($this->NM_ajax_info['param']['acudbe01']))
          {
              $this->acudbe01 = $this->NM_ajax_info['param']['acudbe01'];
          }
          if (isset($this->NM_ajax_info['param']['acudbm01']))
          {
              $this->acudbm01 = $this->NM_ajax_info['param']['acudbm01'];
          }
          if (isset($this->NM_ajax_info['param']['block']))
          {
              $this->block = $this->NM_ajax_info['param']['block'];
          }
          if (isset($this->NM_ajax_info['param']['bonos']))
          {
              $this->bonos = $this->NM_ajax_info['param']['bonos'];
          }
          if (isset($this->NM_ajax_info['param']['cascte01']))
          {
              $this->cascte01 = $this->NM_ajax_info['param']['cascte01'];
          }
          if (isset($this->NM_ajax_info['param']['catcte01']))
          {
              $this->catcte01 = $this->NM_ajax_info['param']['catcte01'];
          }
          if (isset($this->NM_ajax_info['param']['cheqpro01']))
          {
              $this->cheqpro01 = $this->NM_ajax_info['param']['cheqpro01'];
          }
          if (isset($this->NM_ajax_info['param']['clase_contribuyente']))
          {
              $this->clase_contribuyente = $this->NM_ajax_info['param']['clase_contribuyente'];
          }
          if (isset($this->NM_ajax_info['param']['cobrcte01']))
          {
              $this->cobrcte01 = $this->NM_ajax_info['param']['cobrcte01'];
          }
          if (isset($this->NM_ajax_info['param']['codcte01']))
          {
              $this->codcte01 = $this->NM_ajax_info['param']['codcte01'];
          }
          if (isset($this->NM_ajax_info['param']['coddest01']))
          {
              $this->coddest01 = $this->NM_ajax_info['param']['coddest01'];
          }
          if (isset($this->NM_ajax_info['param']['codigo_banco']))
          {
              $this->codigo_banco = $this->NM_ajax_info['param']['codigo_banco'];
          }
          if (isset($this->NM_ajax_info['param']['comentcte01']))
          {
              $this->comentcte01 = $this->NM_ajax_info['param']['comentcte01'];
          }
          if (isset($this->NM_ajax_info['param']['condpag01']))
          {
              $this->condpag01 = $this->NM_ajax_info['param']['condpag01'];
          }
          if (isset($this->NM_ajax_info['param']['coniva01']))
          {
              $this->coniva01 = $this->NM_ajax_info['param']['coniva01'];
          }
          if (isset($this->NM_ajax_info['param']['conret01']))
          {
              $this->conret01 = $this->NM_ajax_info['param']['conret01'];
          }
          if (isset($this->NM_ajax_info['param']['cordcte01']))
          {
              $this->cordcte01 = $this->NM_ajax_info['param']['cordcte01'];
          }
          if (isset($this->NM_ajax_info['param']['csrf_token']))
          {
              $this->csrf_token = $this->NM_ajax_info['param']['csrf_token'];
          }
          if (isset($this->NM_ajax_info['param']['ctacgant01']))
          {
              $this->ctacgant01 = $this->NM_ajax_info['param']['ctacgant01'];
          }
          if (isset($this->NM_ajax_info['param']['ctacgcte01']))
          {
              $this->ctacgcte01 = $this->NM_ajax_info['param']['ctacgcte01'];
          }
          if (isset($this->NM_ajax_info['param']['cv1cte01']))
          {
              $this->cv1cte01 = $this->NM_ajax_info['param']['cv1cte01'];
          }
          if (isset($this->NM_ajax_info['param']['cv2cte01']))
          {
              $this->cv2cte01 = $this->NM_ajax_info['param']['cv2cte01'];
          }
          if (isset($this->NM_ajax_info['param']['desctocte01']))
          {
              $this->desctocte01 = $this->NM_ajax_info['param']['desctocte01'];
          }
          if (isset($this->NM_ajax_info['param']['desppar01']))
          {
              $this->desppar01 = $this->NM_ajax_info['param']['desppar01'];
          }
          if (isset($this->NM_ajax_info['param']['dircte01']))
          {
              $this->dircte01 = $this->NM_ajax_info['param']['dircte01'];
          }
          if (isset($this->NM_ajax_info['param']['emailcte01']))
          {
              $this->emailcte01 = $this->NM_ajax_info['param']['emailcte01'];
          }
          if (isset($this->NM_ajax_info['param']['es_cliente']))
          {
              $this->es_cliente = $this->NM_ajax_info['param']['es_cliente'];
          }
          if (isset($this->NM_ajax_info['param']['es_padre']))
          {
              $this->es_padre = $this->NM_ajax_info['param']['es_padre'];
          }
          if (isset($this->NM_ajax_info['param']['fecing01']))
          {
              $this->fecing01 = $this->NM_ajax_info['param']['fecing01'];
          }
          if (isset($this->NM_ajax_info['param']['fecvencdoc01']))
          {
              $this->fecvencdoc01 = $this->NM_ajax_info['param']['fecvencdoc01'];
          }
          if (isset($this->NM_ajax_info['param']['grupos']))
          {
              $this->grupos = $this->NM_ajax_info['param']['grupos'];
          }
          if (isset($this->NM_ajax_info['param']['idcli']))
          {
              $this->idcli = $this->NM_ajax_info['param']['idcli'];
          }
          if (isset($this->NM_ajax_info['param']['identcte01']))
          {
              $this->identcte01 = $this->NM_ajax_info['param']['identcte01'];
          }
          if (isset($this->NM_ajax_info['param']['imagencte01']))
          {
              $this->imagencte01 = $this->NM_ajax_info['param']['imagencte01'];
          }
          if (isset($this->NM_ajax_info['param']['latitud01']))
          {
              $this->latitud01 = $this->NM_ajax_info['param']['latitud01'];
          }
          if (isset($this->NM_ajax_info['param']['limcant01']))
          {
              $this->limcant01 = $this->NM_ajax_info['param']['limcant01'];
          }
          if (isset($this->NM_ajax_info['param']['limcred01']))
          {
              $this->limcred01 = $this->NM_ajax_info['param']['limcred01'];
          }
          if (isset($this->NM_ajax_info['param']['lleva_contabilidad']))
          {
              $this->lleva_contabilidad = $this->NM_ajax_info['param']['lleva_contabilidad'];
          }
          if (isset($this->NM_ajax_info['param']['loccte01']))
          {
              $this->loccte01 = $this->NM_ajax_info['param']['loccte01'];
          }
          if (isset($this->NM_ajax_info['param']['longitud01']))
          {
              $this->longitud01 = $this->NM_ajax_info['param']['longitud01'];
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
          if (isset($this->NM_ajax_info['param']['nomcte01']))
          {
              $this->nomcte01 = $this->NM_ajax_info['param']['nomcte01'];
          }
          if (isset($this->NM_ajax_info['param']['nro_cuenta_banco']))
          {
              $this->nro_cuenta_banco = $this->NM_ajax_info['param']['nro_cuenta_banco'];
          }
          if (isset($this->NM_ajax_info['param']['numautosri01']))
          {
              $this->numautosri01 = $this->NM_ajax_info['param']['numautosri01'];
          }
          if (isset($this->NM_ajax_info['param']['obsercte01']))
          {
              $this->obsercte01 = $this->NM_ajax_info['param']['obsercte01'];
          }
          if (isset($this->NM_ajax_info['param']['ofienccte01']))
          {
              $this->ofienccte01 = $this->NM_ajax_info['param']['ofienccte01'];
          }
          if (isset($this->NM_ajax_info['param']['pagleg01']))
          {
              $this->pagleg01 = $this->NM_ajax_info['param']['pagleg01'];
          }
          if (isset($this->NM_ajax_info['param']['pago_transferencia']))
          {
              $this->pago_transferencia = $this->NM_ajax_info['param']['pago_transferencia'];
          }
          if (isset($this->NM_ajax_info['param']['parterel01']))
          {
              $this->parterel01 = $this->NM_ajax_info['param']['parterel01'];
          }
          if (isset($this->NM_ajax_info['param']['rendimiento']))
          {
              $this->rendimiento = $this->NM_ajax_info['param']['rendimiento'];
          }
          if (isset($this->NM_ajax_info['param']['repleg01']))
          {
              $this->repleg01 = $this->NM_ajax_info['param']['repleg01'];
          }
          if (isset($this->NM_ajax_info['param']['residentefiscal01']))
          {
              $this->residentefiscal01 = $this->NM_ajax_info['param']['residentefiscal01'];
          }
          if (isset($this->NM_ajax_info['param']['script_case_init']))
          {
              $this->script_case_init = $this->NM_ajax_info['param']['script_case_init'];
          }
          if (isset($this->NM_ajax_info['param']['sdoact01']))
          {
              $this->sdoact01 = $this->NM_ajax_info['param']['sdoact01'];
          }
          if (isset($this->NM_ajax_info['param']['sdoant01']))
          {
              $this->sdoant01 = $this->NM_ajax_info['param']['sdoant01'];
          }
          if (isset($this->NM_ajax_info['param']['sdoeje01']))
          {
              $this->sdoeje01 = $this->NM_ajax_info['param']['sdoeje01'];
          }
          if (isset($this->NM_ajax_info['param']['seriedoc01']))
          {
              $this->seriedoc01 = $this->NM_ajax_info['param']['seriedoc01'];
          }
          if (isset($this->NM_ajax_info['param']['statuscte01']))
          {
              $this->statuscte01 = $this->NM_ajax_info['param']['statuscte01'];
          }
          if (isset($this->NM_ajax_info['param']['telcte01']))
          {
              $this->telcte01 = $this->NM_ajax_info['param']['telcte01'];
          }
          if (isset($this->NM_ajax_info['param']['telcte01b']))
          {
              $this->telcte01b = $this->NM_ajax_info['param']['telcte01b'];
          }
          if (isset($this->NM_ajax_info['param']['telcte01c']))
          {
              $this->telcte01c = $this->NM_ajax_info['param']['telcte01c'];
          }
          if (isset($this->NM_ajax_info['param']['tipcte01']))
          {
              $this->tipcte01 = $this->NM_ajax_info['param']['tipcte01'];
          }
          if (isset($this->NM_ajax_info['param']['tipo_contribuyente']))
          {
              $this->tipo_contribuyente = $this->NM_ajax_info['param']['tipo_contribuyente'];
          }
          if (isset($this->NM_ajax_info['param']['tipo_cuenta_banco']))
          {
              $this->tipo_cuenta_banco = $this->NM_ajax_info['param']['tipo_cuenta_banco'];
          }
          if (isset($this->NM_ajax_info['param']['tipo_identificacion']))
          {
              $this->tipo_identificacion = $this->NM_ajax_info['param']['tipo_identificacion'];
          }
          if (isset($this->NM_ajax_info['param']['totexceso01']))
          {
              $this->totexceso01 = $this->NM_ajax_info['param']['totexceso01'];
          }
          if (isset($this->NM_ajax_info['param']['uid']))
          {
              $this->uid = $this->NM_ajax_info['param']['uid'];
          }
          if (isset($this->NM_ajax_info['param']['ultimoacceso']))
          {
              $this->ultimoacceso = $this->NM_ajax_info['param']['ultimoacceso'];
          }
          if (isset($this->NM_ajax_info['param']['vendcte01']))
          {
              $this->vendcte01 = $this->NM_ajax_info['param']['vendcte01'];
          }
          if (isset($this->NM_ajax_info['param']['zoom01']))
          {
              $this->zoom01 = $this->NM_ajax_info['param']['zoom01'];
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
          $_SESSION['sc_session'][$script_case_init]['form_maepag']['opcao']   = "novo";
          $_SESSION['sc_session'][$script_case_init]['form_maepag']['opc_ant'] = "inicio";
      }
      if (isset($_SESSION['sc_session'][$script_case_init]['form_maepag']['embutida_parms']))
      { 
          $this->nmgp_parms = $_SESSION['sc_session'][$script_case_init]['form_maepag']['embutida_parms'];
          unset($_SESSION['sc_session'][$script_case_init]['form_maepag']['embutida_parms']);
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
                 nm_limpa_str_form_maepag($cadapar[1]);
                 if ($cadapar[1] == "@ ") {$cadapar[1] = trim($cadapar[1]); }
                 $Tmp_par = $cadapar[0];
                 $this->$Tmp_par = $cadapar[1];
             }
             $ix++;
          }
          if (isset($this->NM_where_filter_form))
          {
              $_SESSION['sc_session'][$script_case_init]['form_maepag']['where_filter_form'] = $this->NM_where_filter_form;
              unset($_SESSION['sc_session'][$script_case_init]['form_maepag']['total']);
          }
          if (isset($this->sc_redir_atualiz))
          {
              $_SESSION['sc_session'][$script_case_init]['form_maepag']['sc_redir_atualiz'] = $this->sc_redir_atualiz;
          }
          if (isset($this->sc_redir_insert))
          {
              $_SESSION['sc_session'][$script_case_init]['form_maepag']['sc_redir_insert'] = $this->sc_redir_insert;
          }
      } 
      elseif (isset($script_case_init) && !empty($script_case_init) && isset($_SESSION['sc_session'][$script_case_init]['form_maepag']['parms']))
      {
          if ((!isset($this->nmgp_opcao) || ($this->nmgp_opcao != "incluir" && $this->nmgp_opcao != "alterar" && $this->nmgp_opcao != "excluir" && $this->nmgp_opcao != "novo" && $this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form")) && (!isset($this->NM_ajax_opcao) || $this->NM_ajax_opcao == ""))
          {
              $todox = str_replace("?#?@?@?", "?#?@ ?@?", $_SESSION['sc_session'][$script_case_init]['form_maepag']['parms']);
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
          $_SESSION['sc_session'][$script_case_init]['form_maepag']['nm_run_menu'] = 1;
      } 
      if (($this->NM_ajax_flag && 'navigate_form' == $this->NM_ajax_opcao) || (isset($this->nmgp_opcao) && $this->nmgp_opcao == "igual"))
      { }
      else
      {
          $aDtParts = explode(' ', $this->fecing01);
          $this->fecing01      = $aDtParts[0];
          $this->fecing01_hora = $aDtParts[1];
      }
      if (!$this->NM_ajax_flag && 'autocomp_' == substr($this->NM_ajax_opcao, 0, 9))
      {
          $this->NM_ajax_flag = true;
      }

      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      if (isset($this->nm_evt_ret_edit) && '' != $this->nm_evt_ret_edit)
      {
          $_SESSION['sc_session'][$script_case_init]['form_maepag']['lig_edit_lookup']     = true;
          $_SESSION['sc_session'][$script_case_init]['form_maepag']['lig_edit_lookup_cb']  = $this->nm_evt_ret_edit;
          $_SESSION['sc_session'][$script_case_init]['form_maepag']['lig_edit_lookup_row'] = isset($this->nm_evt_ret_row) ? $this->nm_evt_ret_row : '';
      }
      if (isset($_SESSION['sc_session'][$script_case_init]['form_maepag']['lig_edit_lookup']) && $_SESSION['sc_session'][$script_case_init]['form_maepag']['lig_edit_lookup'])
      {
          $this->lig_edit_lookup     = true;
          $this->lig_edit_lookup_cb  = $_SESSION['sc_session'][$script_case_init]['form_maepag']['lig_edit_lookup_cb'];
          $this->lig_edit_lookup_row = $_SESSION['sc_session'][$script_case_init]['form_maepag']['lig_edit_lookup_row'];
      }
      if (!$this->Ini)
      { 
          $this->Ini = new form_maepag_ini(); 
          $this->Ini->init();
          $this->nm_data = new nm_data("es");
          $this->app_is_initializing = $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['initialize'];
      } 
      else 
      { 
         $this->nm_data = new nm_data("es");
      } 
      $_SESSION['sc_session'][$script_case_init]['form_maepag']['upload_field_info'] = array();

      unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['masterValue']);
      $this->Change_Menu = false;
      $run_iframe = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['run_iframe']) && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['run_iframe'] == "R")) ? true : false;
      if (!$run_iframe && isset($_SESSION['scriptcase']['menu_atual']) && !$_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['embutida_call'] && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['sc_outra_jan']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['sc_outra_jan']))
      {
          $this->sc_init_menu = "x";
          if (isset($_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init']['form_maepag']))
          {
              $this->sc_init_menu = $_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init']['form_maepag'];
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
          if ($this->Ini->sc_page == $this->sc_init_menu && !isset($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['form_maepag']))
          {
               $_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['form_maepag']['link'] = $this->Ini->sc_protocolo . $this->Ini->server . $this->Ini->path_link . "" . SC_dir_app_name('form_maepag') . "/";
               $_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['form_maepag']['label'] = "" . $this->Ini->Nm_lang['lang_othr_frmu_title'] . " maepag";
               $this->Change_Menu = true;
          }
          elseif ($this->Ini->sc_page == $this->sc_init_menu)
          {
              $achou = false;
              foreach ($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu] as $apl => $parms)
              {
                  if ($apl == "form_maepag")
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



      $_SESSION['scriptcase']['error_icon']['form_maepag']  = "<img src=\"" . $this->Ini->path_icones . "/scriptcase__NM__btn__NM__scriptcase9_Rhino__NM__nm_scriptcase9_Rhino_error.png\" style=\"border-width: 0px\" align=\"top\">&nbsp;";
      $_SESSION['scriptcase']['error_close']['form_maepag'] = "<td>" . nmButtonOutput($this->arr_buttons, "berrm_clse", "document.getElementById('id_error_display_fixed').style.display = 'none'; document.getElementById('id_error_message_fixed').innerHTML = ''; return false", "document.getElementById('id_error_display_fixed').style.display = 'none'; document.getElementById('id_error_message_fixed').innerHTML = ''; return false", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "") . "</td>";

      $this->Embutida_proc = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['embutida_proc']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['embutida_proc'] : $this->Embutida_proc;
      $this->Embutida_form = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['embutida_form']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['embutida_form'] : $this->Embutida_form;
      $this->Embutida_call = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['embutida_call']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['embutida_call'] : $this->Embutida_call;

       $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['table_refresh'] = false;

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['embutida_liga_grid_edit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['embutida_liga_grid_edit'])
      {
          $this->Grid_editavel = ('on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['embutida_liga_grid_edit']) ? true : false;
      }
      if (isset($this->Grid_editavel) && $this->Grid_editavel)
      {
          $this->Embutida_form  = true;
          $this->Embutida_ronly = true;
      }
      $this->Embutida_multi = false;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['embutida_multi']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['embutida_multi'])
      {
          $this->Grid_editavel  = false;
          $this->Embutida_form  = false;
          $this->Embutida_ronly = false;
          $this->Embutida_multi = true;
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['embutida_liga_tp_pag']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['embutida_liga_tp_pag'])
      {
          $this->form_paginacao = $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['embutida_liga_tp_pag'];
      }

      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['embutida_form']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['embutida_form'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['embutida_form'] = $this->Embutida_form;
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['embutida_liga_grid_edit']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['embutida_liga_grid_edit'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['embutida_liga_grid_edit'] = $this->Grid_editavel ? 'on' : 'off';
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['embutida_liga_grid_edit']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['embutida_liga_grid_edit'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['embutida_liga_grid_edit'] = $this->Embutida_call;
      }

      $this->Ini->cor_grid_par = $this->Ini->cor_grid_impar;
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      $this->nmgp_url_saida  = $nm_url_saida;
      $this->nmgp_form_show  = "on";
      $this->nmgp_form_empty = false;
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_valida.php", "C", "NM_Valida") ; 
      $teste_validade = new NM_Valida ;

      $this->loadFieldConfig();

      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['first_time'])
      {
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_maepag']['insert']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_maepag']['new']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_maepag']['update']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_maepag']['delete']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_maepag']['first']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_maepag']['back']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_maepag']['forward']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_maepag']['last']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_maepag']['qsearch']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_maepag']['dynsearch']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_maepag']['summary']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_maepag']['navpage']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_maepag']['goto']);
      }
      $this->NM_cancel_return_new = (isset($this->NM_cancel_return_new) && $this->NM_cancel_return_new == 1) ? "1" : "";
      $this->NM_cancel_insert_new = ((isset($this->NM_cancel_insert_new) && $this->NM_cancel_insert_new == 1) || $this->NM_cancel_return_new == 1) ? "document.F5.action='" . $nm_url_saida . "';" : "";
      if (isset($this->NM_btn_insert) && '' != $this->NM_btn_insert && (!isset($_SESSION['scriptcase']['sc_apl_conf']['form_maepag']['insert']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['form_maepag']['insert']))
      {
          if ('N' == $this->NM_btn_insert)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_maepag']['insert'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_maepag']['insert'] = 'on';
          }
      }
      if (isset($this->NM_btn_new) && 'N' == $this->NM_btn_new)
      {
          $_SESSION['scriptcase']['sc_apl_conf_lig']['form_maepag']['new'] = 'off';
      }
      if (isset($this->NM_btn_update) && '' != $this->NM_btn_update && (!isset($_SESSION['scriptcase']['sc_apl_conf']['form_maepag']['update']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['form_maepag']['update']))
      {
          if ('N' == $this->NM_btn_update)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_maepag']['update'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_maepag']['update'] = 'on';
          }
      }
      if (isset($this->NM_btn_delete) && '' != $this->NM_btn_delete && (!isset($_SESSION['scriptcase']['sc_apl_conf']['form_maepag']['delete']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['form_maepag']['delete']))
      {
          if ('N' == $this->NM_btn_delete)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_maepag']['delete'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_maepag']['delete'] = 'on';
          }
      }
      if (isset($this->NM_btn_navega) && '' != $this->NM_btn_navega)
      {
          if ('N' == $this->NM_btn_navega)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_maepag']['first']     = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_maepag']['back']      = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_maepag']['forward']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_maepag']['last']      = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_maepag']['qsearch']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_maepag']['dynsearch'] = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_maepag']['summary']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_maepag']['navpage']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_maepag']['goto']      = 'off';
              $this->Nav_permite_ava = false;
              $this->Nav_permite_ret = false;
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_maepag']['first']     = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_maepag']['back']      = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_maepag']['forward']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_maepag']['last']      = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_maepag']['qsearch']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_maepag']['dynsearch'] = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_maepag']['summary']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_maepag']['navpage']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_maepag']['goto']      = 'on';
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
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['where_orig'] = "";
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['where_pesq']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['where_pesq'] = "";
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['where_pesq_filtro'] = "";
      }
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['where_pesq_filtro'];
      if ($this->NM_ajax_flag && 'event_' == substr($this->NM_ajax_opcao, 0, 6)) {
          $this->nmgp_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['buttonStatus'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['iframe_filtro']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['iframe_filtro'] == "S")
      {
          $this->nmgp_botoes['exit'] = "off";
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_maepag']['btn_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['form_maepag']['btn_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['form_maepag']['btn_display'] as $NM_cada_btn => $NM_cada_opc)
          {
              $this->nmgp_botoes[$NM_cada_btn] = $NM_cada_opc;
          }
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_maepag']['insert']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_maepag']['insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_maepag']['insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_maepag']['insert'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_maepag']['new']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_maepag']['new'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_maepag']['new'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_maepag']['update']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_maepag']['update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_maepag']['update'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_maepag']['delete']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_maepag']['delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_maepag']['delete'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_maepag']['first']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_maepag']['first'] != '')
      {
          $this->nmgp_botoes['first'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_maepag']['first'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_maepag']['back']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_maepag']['back'] != '')
      {
          $this->nmgp_botoes['back'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_maepag']['back'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_maepag']['forward']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_maepag']['forward'] != '')
      {
          $this->nmgp_botoes['forward'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_maepag']['forward'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_maepag']['last']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_maepag']['last'] != '')
      {
          $this->nmgp_botoes['last'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_maepag']['last'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_maepag']['qsearch']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_maepag']['qsearch'] != '')
      {
          $this->nmgp_botoes['qsearch'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_maepag']['qsearch'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_maepag']['dynsearch']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_maepag']['dynsearch'] != '')
      {
          $this->nmgp_botoes['dynsearch'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_maepag']['dynsearch'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_maepag']['summary']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_maepag']['summary'] != '')
      {
          $this->nmgp_botoes['summary'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_maepag']['summary'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_maepag']['navpage']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_maepag']['navpage'] != '')
      {
          $this->nmgp_botoes['navpage'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_maepag']['navpage'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_maepag']['goto']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_maepag']['goto'] != '')
      {
          $this->nmgp_botoes['goto'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_maepag']['goto'];
      }

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['embutida_liga_form_insert']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['embutida_liga_form_insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['embutida_liga_form_insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['embutida_liga_form_insert'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['embutida_liga_form_update']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['embutida_liga_form_update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['embutida_liga_form_update'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['embutida_liga_form_delete']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['embutida_liga_form_delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['embutida_liga_form_delete'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['embutida_liga_form_btn_nav']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['embutida_liga_form_btn_nav'] != '')
      {
          $this->nmgp_botoes['first']   = $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['back']    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['forward'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['last']    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['embutida_liga_form_btn_nav'];
      }

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['dashboard_info']['under_dashboard'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['dashboard_info']['maximized']) {
          $tmpDashboardApp = $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['dashboard_info']['dashboard_app'];
          if (isset($_SESSION['scriptcase']['dashboard_toolbar'][$tmpDashboardApp]['form_maepag'])) {
              $tmpDashboardButtons = $_SESSION['scriptcase']['dashboard_toolbar'][$tmpDashboardApp]['form_maepag'];

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

      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_maepag']['insert']) && $_SESSION['scriptcase']['sc_apl_conf']['form_maepag']['insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf']['form_maepag']['insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['scriptcase']['sc_apl_conf']['form_maepag']['insert'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_maepag']['update']) && $_SESSION['scriptcase']['sc_apl_conf']['form_maepag']['update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['scriptcase']['sc_apl_conf']['form_maepag']['update'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_maepag']['delete']) && $_SESSION['scriptcase']['sc_apl_conf']['form_maepag']['delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['scriptcase']['sc_apl_conf']['form_maepag']['delete'];
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_maepag']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['form_maepag']['field_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['form_maepag']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->nmgp_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
              $this->NM_ajax_info['fieldDisplay'][$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_maepag']['field_readonly']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['form_maepag']['field_readonly']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['form_maepag']['field_readonly'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->nmgp_cmp_readonly[$NM_cada_field] = "on";
              $this->NM_ajax_info['readOnly'][$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_maepag']['exit']) && $_SESSION['scriptcase']['sc_apl_conf']['form_maepag']['exit'] != '')
      {
          $_SESSION['scriptcase']['sc_url_saida'][$this->Ini->sc_page]       = $_SESSION['scriptcase']['sc_apl_conf']['form_maepag']['exit'];
          $_SESSION['scriptcase']['sc_force_url_saida'][$this->Ini->sc_page] = true;
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['dados_form']))
      {
          $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['dados_form'];
      }
      $glo_senha_protect = (isset($_SESSION['scriptcase']['glo_senha_protect'])) ? $_SESSION['scriptcase']['glo_senha_protect'] : "S";
      $this->aba_iframe = false;
      if (isset($_SESSION['scriptcase']['sc_aba_iframe']))
      {
          foreach ($_SESSION['scriptcase']['sc_aba_iframe'] as $aba => $apls_aba)
          {
              if (in_array("form_maepag", $apls_aba))
              {
                  $this->aba_iframe = true;
                  break;
              }
          }
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['iframe_menu'] && (!isset($_SESSION['scriptcase']['menu_mobile']) || empty($_SESSION['scriptcase']['menu_mobile'])))
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
              include_once($this->Ini->path_embutida . 'form_maepag/form_maepag_calendar.php');
          }
          else
          { 
              include_once($this->Ini->path_aplicacao . 'form_maepag_calendar.php');
          }
          exit;
      }

      if (is_file($this->Ini->path_aplicacao . 'form_maepag_help.txt'))
      {
          $arr_link_webhelp = file($this->Ini->path_aplicacao . 'form_maepag_help.txt');
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
          require_once($this->Ini->path_embutida . 'form_maepag/form_maepag_erro.class.php');
      }
      else
      { 
          require_once($this->Ini->path_aplicacao . "form_maepag_erro.class.php"); 
      }
      $this->Erro      = new form_maepag_erro();
      $this->Erro->Ini = $this->Ini;
      $this->proc_fast_search = false;
      if ($this->nmgp_opcao == "fast_search")  
      {
          $this->SC_fast_search($this->nmgp_fast_search, $this->nmgp_cond_fast_search, $this->nmgp_arg_fast_search);
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['opcao'] = "inicio";
          $this->nmgp_opcao = "inicio";
          $this->proc_fast_search = true;
      } 
      if ($nm_opc_lookup != "lookup" && $nm_opc_php != "formphp")
      { 
         if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['opcao']))
         { 
             if ($this->idcli != "")   
             { 
                 $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['opcao'] = "igual" ;  
             }   
         }   
      } 
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['opcao']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['opcao']) && empty($this->nmgp_refresh_fields))
      {
          $this->nmgp_opcao = $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['opcao'];  
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['opcao'] = "" ;  
          if ($this->nmgp_opcao == "edit_novo")  
          {
             $this->nmgp_opcao = "novo";
             $this->nm_flag_saida_novo = "S";
          }
      } 
      $this->nm_Start_new = false;
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_maepag']['start']) && $_SESSION['scriptcase']['sc_apl_conf']['form_maepag']['start'] == 'new')
      {
          $this->nmgp_opcao = "novo";
          $this->nm_Start_new = true;
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['opcao'] = "novo";
          unset($_SESSION['scriptcase']['sc_apl_conf']['form_maepag']['start']);
      }
      if ($this->nmgp_opcao == "igual")  
      {
          $this->nmgp_opc_ant = $this->nmgp_opcao;
      } 
      else
      {
          $this->nmgp_opc_ant = $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['opc_ant'];
      } 
      if ($this->nmgp_opcao == "recarga" || $this->nmgp_opcao == "muda_form")  
      {
          $this->nmgp_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['botoes'];
          $this->Nav_permite_ret = 0 != $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['inicio'];
          $this->Nav_permite_ava = $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['total'] != $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['final'];
      }
      else
      {
      }
      $this->nm_flag_iframe = false;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['dados_form'])) 
      {
         $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['dados_form'];
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
      if (isset($this->codcte01)) { $this->nm_limpa_alfa($this->codcte01); }
      if (isset($this->nomcte01)) { $this->nm_limpa_alfa($this->nomcte01); }
      if (isset($this->cv1cte01)) { $this->nm_limpa_alfa($this->cv1cte01); }
      if (isset($this->cv2cte01)) { $this->nm_limpa_alfa($this->cv2cte01); }
      if (isset($this->tipcte01)) { $this->nm_limpa_alfa($this->tipcte01); }
      if (isset($this->ofienccte01)) { $this->nm_limpa_alfa($this->ofienccte01); }
      if (isset($this->vendcte01)) { $this->nm_limpa_alfa($this->vendcte01); }
      if (isset($this->cobrcte01)) { $this->nm_limpa_alfa($this->cobrcte01); }
      if (isset($this->loccte01)) { $this->nm_limpa_alfa($this->loccte01); }
      if (isset($this->dircte01)) { $this->nm_limpa_alfa($this->dircte01); }
      if (isset($this->telcte01)) { $this->nm_limpa_alfa($this->telcte01); }
      if (isset($this->cascte01)) { $this->nm_limpa_alfa($this->cascte01); }
      if (isset($this->condpag01)) { $this->nm_limpa_alfa($this->condpag01); }
      if (isset($this->desctocte01)) { $this->nm_limpa_alfa($this->desctocte01); }
      if (isset($this->limcred01)) { $this->nm_limpa_alfa($this->limcred01); }
      if (isset($this->desppar01)) { $this->nm_limpa_alfa($this->desppar01); }
      if (isset($this->cheqpro01)) { $this->nm_limpa_alfa($this->cheqpro01); }
      if (isset($this->sdoeje01)) { $this->nm_limpa_alfa($this->sdoeje01); }
      if (isset($this->sdoant01)) { $this->nm_limpa_alfa($this->sdoant01); }
      if (isset($this->sdoact01)) { $this->nm_limpa_alfa($this->sdoact01); }
      if (isset($this->acudbm01)) { $this->nm_limpa_alfa($this->acudbm01); }
      if (isset($this->acucrm01)) { $this->nm_limpa_alfa($this->acucrm01); }
      if (isset($this->acudbe01)) { $this->nm_limpa_alfa($this->acudbe01); }
      if (isset($this->acucre01)) { $this->nm_limpa_alfa($this->acucre01); }
      if (isset($this->comentcte01)) { $this->nm_limpa_alfa($this->comentcte01); }
      if (isset($this->statuscte01)) { $this->nm_limpa_alfa($this->statuscte01); }
      if (isset($this->identcte01)) { $this->nm_limpa_alfa($this->identcte01); }
      if (isset($this->cordcte01)) { $this->nm_limpa_alfa($this->cordcte01); }
      if (isset($this->limcant01)) { $this->nm_limpa_alfa($this->limcant01); }
      if (isset($this->pagleg01)) { $this->nm_limpa_alfa($this->pagleg01); }
      if (isset($this->telcte01b)) { $this->nm_limpa_alfa($this->telcte01b); }
      if (isset($this->telcte01c)) { $this->nm_limpa_alfa($this->telcte01c); }
      if (isset($this->emailcte01)) { $this->nm_limpa_alfa($this->emailcte01); }
      if (isset($this->ctacgcte01)) { $this->nm_limpa_alfa($this->ctacgcte01); }
      if (isset($this->obsercte01)) { $this->nm_limpa_alfa($this->obsercte01); }
      if (isset($this->totexceso01)) { $this->nm_limpa_alfa($this->totexceso01); }
      if (isset($this->imagencte01)) { $this->nm_limpa_alfa($this->imagencte01); }
      if (isset($this->block)) { $this->nm_limpa_alfa($this->block); }
      if (isset($this->uid)) { $this->nm_limpa_alfa($this->uid); }
      if (isset($this->ultimoacceso)) { $this->nm_limpa_alfa($this->ultimoacceso); }
      if (isset($this->idcli)) { $this->nm_limpa_alfa($this->idcli); }
      if (isset($this->catcte01)) { $this->nm_limpa_alfa($this->catcte01); }
      if (isset($this->numautosri01)) { $this->nm_limpa_alfa($this->numautosri01); }
      if (isset($this->seriedoc01)) { $this->nm_limpa_alfa($this->seriedoc01); }
      if (isset($this->repleg01)) { $this->nm_limpa_alfa($this->repleg01); }
      if (isset($this->coddest01)) { $this->nm_limpa_alfa($this->coddest01); }
      if (isset($this->longitud01)) { $this->nm_limpa_alfa($this->longitud01); }
      if (isset($this->latitud01)) { $this->nm_limpa_alfa($this->latitud01); }
      if (isset($this->zoom01)) { $this->nm_limpa_alfa($this->zoom01); }
      if (isset($this->coniva01)) { $this->nm_limpa_alfa($this->coniva01); }
      if (isset($this->conret01)) { $this->nm_limpa_alfa($this->conret01); }
      if (isset($this->tipo_identificacion)) { $this->nm_limpa_alfa($this->tipo_identificacion); }
      if (isset($this->es_padre)) { $this->nm_limpa_alfa($this->es_padre); }
      if (isset($this->bonos)) { $this->nm_limpa_alfa($this->bonos); }
      if (isset($this->rendimiento)) { $this->nm_limpa_alfa($this->rendimiento); }
      if (isset($this->parterel01)) { $this->nm_limpa_alfa($this->parterel01); }
      if (isset($this->clase_contribuyente)) { $this->nm_limpa_alfa($this->clase_contribuyente); }
      if (isset($this->tipo_contribuyente)) { $this->nm_limpa_alfa($this->tipo_contribuyente); }
      if (isset($this->lleva_contabilidad)) { $this->nm_limpa_alfa($this->lleva_contabilidad); }
      if (isset($this->ctacgant01)) { $this->nm_limpa_alfa($this->ctacgant01); }
      if (isset($this->residentefiscal01)) { $this->nm_limpa_alfa($this->residentefiscal01); }
      if (isset($this->es_cliente)) { $this->nm_limpa_alfa($this->es_cliente); }
      if (isset($this->grupos)) { $this->nm_limpa_alfa($this->grupos); }
      if (isset($this->codigo_banco)) { $this->nm_limpa_alfa($this->codigo_banco); }
      if (isset($this->tipo_cuenta_banco)) { $this->nm_limpa_alfa($this->tipo_cuenta_banco); }
      if (isset($this->nro_cuenta_banco)) { $this->nm_limpa_alfa($this->nro_cuenta_banco); }
      if (isset($this->pago_transferencia)) { $this->nm_limpa_alfa($this->pago_transferencia); }
      $Campos_Crit       = "";
      $Campos_erro       = "";
      $Campos_Falta      = array();
      $Campos_Erros      = array();
      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          =  substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['opc_edit'] = true;  
     if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['dados_select'])) 
     {
        $this->nmgp_dados_select = $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['dados_select'];
     }
   }

   function loadFieldConfig()
   {
      $this->field_config = array();
      //-- fecing01
      $this->field_config['fecing01']                 = array();
      $this->field_config['fecing01']['date_format']  = $_SESSION['scriptcase']['reg_conf']['date_format'] . ';' . $_SESSION['scriptcase']['reg_conf']['time_format'];
      $this->field_config['fecing01']['date_sep']     = $_SESSION['scriptcase']['reg_conf']['date_sep'];
      $this->field_config['fecing01']['time_sep']     = $_SESSION['scriptcase']['reg_conf']['time_sep'];
      $this->field_config['fecing01']['date_display'] = "ddmmaaaa;hhiiss";
      $this->new_date_format('DH', 'fecing01');
      //-- desctocte01
      $this->field_config['desctocte01']               = array();
      $this->field_config['desctocte01']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_val'];
      $this->field_config['desctocte01']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['desctocte01']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_val'];
      $this->field_config['desctocte01']['symbol_mon'] = '';
      $this->field_config['desctocte01']['format_pos'] = $_SESSION['scriptcase']['reg_conf']['monet_f_pos'];
      $this->field_config['desctocte01']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['monet_f_neg'];
      //-- limcred01
      $this->field_config['limcred01']               = array();
      $this->field_config['limcred01']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_val'];
      $this->field_config['limcred01']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['limcred01']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_val'];
      $this->field_config['limcred01']['symbol_mon'] = '';
      $this->field_config['limcred01']['format_pos'] = $_SESSION['scriptcase']['reg_conf']['monet_f_pos'];
      $this->field_config['limcred01']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['monet_f_neg'];
      //-- cheqpro01
      $this->field_config['cheqpro01']               = array();
      $this->field_config['cheqpro01']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['cheqpro01']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['cheqpro01']['symbol_dec'] = '';
      $this->field_config['cheqpro01']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['cheqpro01']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- sdoeje01
      $this->field_config['sdoeje01']               = array();
      $this->field_config['sdoeje01']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_val'];
      $this->field_config['sdoeje01']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['sdoeje01']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_val'];
      $this->field_config['sdoeje01']['symbol_mon'] = '';
      $this->field_config['sdoeje01']['format_pos'] = $_SESSION['scriptcase']['reg_conf']['monet_f_pos'];
      $this->field_config['sdoeje01']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['monet_f_neg'];
      //-- sdoant01
      $this->field_config['sdoant01']               = array();
      $this->field_config['sdoant01']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_val'];
      $this->field_config['sdoant01']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['sdoant01']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_val'];
      $this->field_config['sdoant01']['symbol_mon'] = '';
      $this->field_config['sdoant01']['format_pos'] = $_SESSION['scriptcase']['reg_conf']['monet_f_pos'];
      $this->field_config['sdoant01']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['monet_f_neg'];
      //-- sdoact01
      $this->field_config['sdoact01']               = array();
      $this->field_config['sdoact01']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_val'];
      $this->field_config['sdoact01']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['sdoact01']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_val'];
      $this->field_config['sdoact01']['symbol_mon'] = '';
      $this->field_config['sdoact01']['format_pos'] = $_SESSION['scriptcase']['reg_conf']['monet_f_pos'];
      $this->field_config['sdoact01']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['monet_f_neg'];
      //-- acudbm01
      $this->field_config['acudbm01']               = array();
      $this->field_config['acudbm01']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_val'];
      $this->field_config['acudbm01']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['acudbm01']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_val'];
      $this->field_config['acudbm01']['symbol_mon'] = '';
      $this->field_config['acudbm01']['format_pos'] = $_SESSION['scriptcase']['reg_conf']['monet_f_pos'];
      $this->field_config['acudbm01']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['monet_f_neg'];
      //-- acucrm01
      $this->field_config['acucrm01']               = array();
      $this->field_config['acucrm01']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_val'];
      $this->field_config['acucrm01']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['acucrm01']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_val'];
      $this->field_config['acucrm01']['symbol_mon'] = '';
      $this->field_config['acucrm01']['format_pos'] = $_SESSION['scriptcase']['reg_conf']['monet_f_pos'];
      $this->field_config['acucrm01']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['monet_f_neg'];
      //-- acudbe01
      $this->field_config['acudbe01']               = array();
      $this->field_config['acudbe01']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_val'];
      $this->field_config['acudbe01']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['acudbe01']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_val'];
      $this->field_config['acudbe01']['symbol_mon'] = '';
      $this->field_config['acudbe01']['format_pos'] = $_SESSION['scriptcase']['reg_conf']['monet_f_pos'];
      $this->field_config['acudbe01']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['monet_f_neg'];
      //-- acucre01
      $this->field_config['acucre01']               = array();
      $this->field_config['acucre01']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_val'];
      $this->field_config['acucre01']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['acucre01']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_val'];
      $this->field_config['acucre01']['symbol_mon'] = '';
      $this->field_config['acucre01']['format_pos'] = $_SESSION['scriptcase']['reg_conf']['monet_f_pos'];
      $this->field_config['acucre01']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['monet_f_neg'];
      //-- totexceso01
      $this->field_config['totexceso01']               = array();
      $this->field_config['totexceso01']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_val'];
      $this->field_config['totexceso01']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['totexceso01']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_val'];
      $this->field_config['totexceso01']['symbol_mon'] = '';
      $this->field_config['totexceso01']['format_pos'] = $_SESSION['scriptcase']['reg_conf']['monet_f_pos'];
      $this->field_config['totexceso01']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['monet_f_neg'];
      //-- ultimoacceso
      $this->field_config['ultimoacceso']               = array();
      $this->field_config['ultimoacceso']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['ultimoacceso']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['ultimoacceso']['symbol_dec'] = '';
      $this->field_config['ultimoacceso']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['ultimoacceso']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- fecvencdoc01
      $this->field_config['fecvencdoc01']                 = array();
      $this->field_config['fecvencdoc01']['date_format']  = $_SESSION['scriptcase']['reg_conf']['date_format'];
      $this->field_config['fecvencdoc01']['date_sep']     = $_SESSION['scriptcase']['reg_conf']['date_sep'];
      $this->field_config['fecvencdoc01']['date_display'] = "ddmmaaaa";
      $this->new_date_format('DT', 'fecvencdoc01');
      //-- es_padre
      $this->field_config['es_padre']               = array();
      $this->field_config['es_padre']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['es_padre']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['es_padre']['symbol_dec'] = '';
      $this->field_config['es_padre']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['es_padre']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
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
          if ('validate_codcte01' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'codcte01');
          }
          if ('validate_nomcte01' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'nomcte01');
          }
          if ('validate_cv1cte01' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'cv1cte01');
          }
          if ('validate_cv2cte01' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'cv2cte01');
          }
          if ('validate_tipcte01' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'tipcte01');
          }
          if ('validate_ofienccte01' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'ofienccte01');
          }
          if ('validate_vendcte01' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'vendcte01');
          }
          if ('validate_cobrcte01' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'cobrcte01');
          }
          if ('validate_loccte01' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'loccte01');
          }
          if ('validate_dircte01' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'dircte01');
          }
          if ('validate_telcte01' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'telcte01');
          }
          if ('validate_cascte01' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'cascte01');
          }
          if ('validate_fecing01' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'fecing01');
          }
          if ('validate_condpag01' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'condpag01');
          }
          if ('validate_desctocte01' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'desctocte01');
          }
          if ('validate_limcred01' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'limcred01');
          }
          if ('validate_desppar01' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'desppar01');
          }
          if ('validate_cheqpro01' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'cheqpro01');
          }
          if ('validate_sdoeje01' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'sdoeje01');
          }
          if ('validate_sdoant01' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'sdoant01');
          }
          if ('validate_sdoact01' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'sdoact01');
          }
          if ('validate_acudbm01' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'acudbm01');
          }
          if ('validate_acucrm01' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'acucrm01');
          }
          if ('validate_acudbe01' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'acudbe01');
          }
          if ('validate_acucre01' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'acucre01');
          }
          if ('validate_comentcte01' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'comentcte01');
          }
          if ('validate_statuscte01' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'statuscte01');
          }
          if ('validate_identcte01' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'identcte01');
          }
          if ('validate_cordcte01' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'cordcte01');
          }
          if ('validate_limcant01' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'limcant01');
          }
          if ('validate_pagleg01' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'pagleg01');
          }
          if ('validate_telcte01b' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'telcte01b');
          }
          if ('validate_telcte01c' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'telcte01c');
          }
          if ('validate_emailcte01' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'emailcte01');
          }
          if ('validate_ctacgcte01' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'ctacgcte01');
          }
          if ('validate_obsercte01' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'obsercte01');
          }
          if ('validate_totexceso01' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'totexceso01');
          }
          if ('validate_imagencte01' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'imagencte01');
          }
          if ('validate_block' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'block');
          }
          if ('validate_uid' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'uid');
          }
          if ('validate_ultimoacceso' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'ultimoacceso');
          }
          if ('validate_idcli' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'idcli');
          }
          if ('validate_catcte01' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'catcte01');
          }
          if ('validate_numautosri01' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'numautosri01');
          }
          if ('validate_seriedoc01' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'seriedoc01');
          }
          if ('validate_fecvencdoc01' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'fecvencdoc01');
          }
          if ('validate_repleg01' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'repleg01');
          }
          if ('validate_coddest01' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'coddest01');
          }
          if ('validate_longitud01' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'longitud01');
          }
          if ('validate_latitud01' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'latitud01');
          }
          if ('validate_zoom01' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'zoom01');
          }
          if ('validate_coniva01' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'coniva01');
          }
          if ('validate_conret01' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'conret01');
          }
          if ('validate_tipo_identificacion' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'tipo_identificacion');
          }
          if ('validate_es_padre' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'es_padre');
          }
          if ('validate_bonos' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'bonos');
          }
          if ('validate_rendimiento' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'rendimiento');
          }
          if ('validate_parterel01' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'parterel01');
          }
          if ('validate_clase_contribuyente' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'clase_contribuyente');
          }
          if ('validate_tipo_contribuyente' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'tipo_contribuyente');
          }
          if ('validate_lleva_contabilidad' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'lleva_contabilidad');
          }
          if ('validate_ctacgant01' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'ctacgant01');
          }
          if ('validate_residentefiscal01' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'residentefiscal01');
          }
          if ('validate_es_cliente' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'es_cliente');
          }
          if ('validate_grupos' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'grupos');
          }
          if ('validate_codigo_banco' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'codigo_banco');
          }
          if ('validate_tipo_cuenta_banco' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'tipo_cuenta_banco');
          }
          if ('validate_nro_cuenta_banco' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'nro_cuenta_banco');
          }
          if ('validate_pago_transferencia' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'pago_transferencia');
          }
          form_maepag_pack_ajax_response();
          exit;
      }
      if (isset($this->sc_inline_call) && 'Y' == $this->sc_inline_call)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['inline_form_seq'] = $this->sc_seq_row;
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
              form_maepag_pack_ajax_response();
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
          $_SESSION['scriptcase']['form_maepag']['contr_erro'] = 'off';
          if ($Campos_Crit != "") 
          {
              $Campos_Crit = $this->Ini->Nm_lang['lang_errm_flds'] . ' ' . $Campos_Crit ; 
          }
          if ($Campos_Crit != "" || !empty($Campos_Falta) || $this->Campos_Mens_erro != "")
          {
              if ($this->NM_ajax_flag)
              {
                  form_maepag_pack_ajax_response();
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
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['recarga'] = $this->nmgp_opcao;
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['sc_redir_insert']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['sc_redir_insert'] == "ok")
          {
              if ($this->sc_evento == "insert" || ($this->nmgp_opc_ant == "novo" && $this->nmgp_opcao == "novo" && $this->sc_evento == "novo"))
              {
                  $this->NM_close_db(); 
                  $this->nmgp_redireciona(2); 
              }
          }
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['sc_redir_atualiz']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['sc_redir_atualiz'] == "ok")
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
          form_maepag_pack_ajax_response();
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
          form_maepag_pack_ajax_response();
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
          $Zip_name = "sc_prt_" . date("YmdHis") . "_" . rand(0, 1000) . "form_maepag.zip";
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
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag'][$path_doc_md5][0] = $Arq_htm;
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag'][$path_doc_md5][1] = $Zip_name;
?>
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE><?php echo strip_tags("" . $this->Ini->Nm_lang['lang_othr_frmu_title'] . " maepag") ?></TITLE>
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
<form name="Fdown" method="get" action="form_maepag_download.php" target="_self" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo $this->form_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="form_maepag"> 
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
           case 'codcte01':
               return "Codcte 01";
               break;
           case 'nomcte01':
               return "Nomcte 01";
               break;
           case 'cv1cte01':
               return "Cv 1cte 01";
               break;
           case 'cv2cte01':
               return "Cv 2cte 01";
               break;
           case 'tipcte01':
               return "Tipcte 01";
               break;
           case 'ofienccte01':
               return "Ofienccte 01";
               break;
           case 'vendcte01':
               return "Vendcte 01";
               break;
           case 'cobrcte01':
               return "Cobrcte 01";
               break;
           case 'loccte01':
               return "Loccte 01";
               break;
           case 'dircte01':
               return "Dircte 01";
               break;
           case 'telcte01':
               return "Telcte 01";
               break;
           case 'cascte01':
               return "Cascte 01";
               break;
           case 'fecing01':
               return "Fecing 01";
               break;
           case 'condpag01':
               return "Condpag 01";
               break;
           case 'desctocte01':
               return "Desctocte 01";
               break;
           case 'limcred01':
               return "Limcred 01";
               break;
           case 'desppar01':
               return "Desppar 01";
               break;
           case 'cheqpro01':
               return "Cheqpro 01";
               break;
           case 'sdoeje01':
               return "Sdoeje 01";
               break;
           case 'sdoant01':
               return "Sdoant 01";
               break;
           case 'sdoact01':
               return "Sdoact 01";
               break;
           case 'acudbm01':
               return "Acudbm 01";
               break;
           case 'acucrm01':
               return "Acucrm 01";
               break;
           case 'acudbe01':
               return "Acudbe 01";
               break;
           case 'acucre01':
               return "Acucre 01";
               break;
           case 'comentcte01':
               return "Comentcte 01";
               break;
           case 'statuscte01':
               return "Statuscte 01";
               break;
           case 'identcte01':
               return "Identcte 01";
               break;
           case 'cordcte01':
               return "Cordcte 01";
               break;
           case 'limcant01':
               return "Limcant 01";
               break;
           case 'pagleg01':
               return "Pagleg 01";
               break;
           case 'telcte01b':
               return "Telcte 0 1b";
               break;
           case 'telcte01c':
               return "Telcte 0 1c";
               break;
           case 'emailcte01':
               return "Emailcte 01";
               break;
           case 'ctacgcte01':
               return "Ctacgcte 01";
               break;
           case 'obsercte01':
               return "Obsercte 01";
               break;
           case 'totexceso01':
               return "Totexceso 01";
               break;
           case 'imagencte01':
               return "Imagencte 01";
               break;
           case 'block':
               return "Block";
               break;
           case 'uid':
               return "UID";
               break;
           case 'ultimoacceso':
               return "Ultimoacceso";
               break;
           case 'idcli':
               return "Idcli";
               break;
           case 'catcte01':
               return "Catcte 01";
               break;
           case 'numautosri01':
               return "Numautosri 01";
               break;
           case 'seriedoc01':
               return "Seriedoc 01";
               break;
           case 'fecvencdoc01':
               return "Fecvencdoc 01";
               break;
           case 'repleg01':
               return "Repleg 01";
               break;
           case 'coddest01':
               return "Coddest 01";
               break;
           case 'longitud01':
               return "Longitud 01";
               break;
           case 'latitud01':
               return "Latitud 01";
               break;
           case 'zoom01':
               return "Zoom 01";
               break;
           case 'coniva01':
               return "Coniva 01";
               break;
           case 'conret01':
               return "Conret 01";
               break;
           case 'tipo_identificacion':
               return "Tipo Identificacion";
               break;
           case 'es_padre':
               return "Es Padre";
               break;
           case 'bonos':
               return "Bonos";
               break;
           case 'rendimiento':
               return "Rendimiento";
               break;
           case 'parterel01':
               return "Parte Rel 01";
               break;
           case 'clase_contribuyente':
               return "Clase Contribuyente";
               break;
           case 'tipo_contribuyente':
               return "Tipo Contribuyente";
               break;
           case 'lleva_contabilidad':
               return "Lleva Contabilidad";
               break;
           case 'ctacgant01':
               return "Ctacgant 01";
               break;
           case 'residentefiscal01':
               return "Residente Fiscal 01";
               break;
           case 'es_cliente':
               return "Es Cliente";
               break;
           case 'grupos':
               return "Grupos";
               break;
           case 'codigo_banco':
               return "Codigo Banco";
               break;
           case 'tipo_cuenta_banco':
               return "Tipo Cuenta Banco";
               break;
           case 'nro_cuenta_banco':
               return "Nro Cuenta Banco";
               break;
           case 'pago_transferencia':
               return "Pago Transferencia";
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
              if (!isset($this->NM_ajax_info['errList']['geral_form_maepag']) || !is_array($this->NM_ajax_info['errList']['geral_form_maepag']))
              {
                  $this->NM_ajax_info['errList']['geral_form_maepag'] = array();
              }
              $this->NM_ajax_info['errList']['geral_form_maepag'][] = "CSRF: " . $this->Ini->Nm_lang['lang_errm_ajax_csrf'];
          }
     }
      if ((!is_array($filtro) && ('' == $filtro || 'codcte01' == $filtro)) || (is_array($filtro) && in_array('codcte01', $filtro)))
        $this->ValidateField_codcte01($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'nomcte01' == $filtro)) || (is_array($filtro) && in_array('nomcte01', $filtro)))
        $this->ValidateField_nomcte01($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'cv1cte01' == $filtro)) || (is_array($filtro) && in_array('cv1cte01', $filtro)))
        $this->ValidateField_cv1cte01($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'cv2cte01' == $filtro)) || (is_array($filtro) && in_array('cv2cte01', $filtro)))
        $this->ValidateField_cv2cte01($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'tipcte01' == $filtro)) || (is_array($filtro) && in_array('tipcte01', $filtro)))
        $this->ValidateField_tipcte01($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'ofienccte01' == $filtro)) || (is_array($filtro) && in_array('ofienccte01', $filtro)))
        $this->ValidateField_ofienccte01($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'vendcte01' == $filtro)) || (is_array($filtro) && in_array('vendcte01', $filtro)))
        $this->ValidateField_vendcte01($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'cobrcte01' == $filtro)) || (is_array($filtro) && in_array('cobrcte01', $filtro)))
        $this->ValidateField_cobrcte01($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'loccte01' == $filtro)) || (is_array($filtro) && in_array('loccte01', $filtro)))
        $this->ValidateField_loccte01($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'dircte01' == $filtro)) || (is_array($filtro) && in_array('dircte01', $filtro)))
        $this->ValidateField_dircte01($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'telcte01' == $filtro)) || (is_array($filtro) && in_array('telcte01', $filtro)))
        $this->ValidateField_telcte01($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'cascte01' == $filtro)) || (is_array($filtro) && in_array('cascte01', $filtro)))
        $this->ValidateField_cascte01($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'fecing01' == $filtro)) || (is_array($filtro) && in_array('fecing01', $filtro)))
        $this->ValidateField_fecing01($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'condpag01' == $filtro)) || (is_array($filtro) && in_array('condpag01', $filtro)))
        $this->ValidateField_condpag01($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'desctocte01' == $filtro)) || (is_array($filtro) && in_array('desctocte01', $filtro)))
        $this->ValidateField_desctocte01($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'limcred01' == $filtro)) || (is_array($filtro) && in_array('limcred01', $filtro)))
        $this->ValidateField_limcred01($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'desppar01' == $filtro)) || (is_array($filtro) && in_array('desppar01', $filtro)))
        $this->ValidateField_desppar01($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'cheqpro01' == $filtro)) || (is_array($filtro) && in_array('cheqpro01', $filtro)))
        $this->ValidateField_cheqpro01($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'sdoeje01' == $filtro)) || (is_array($filtro) && in_array('sdoeje01', $filtro)))
        $this->ValidateField_sdoeje01($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'sdoant01' == $filtro)) || (is_array($filtro) && in_array('sdoant01', $filtro)))
        $this->ValidateField_sdoant01($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'sdoact01' == $filtro)) || (is_array($filtro) && in_array('sdoact01', $filtro)))
        $this->ValidateField_sdoact01($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'acudbm01' == $filtro)) || (is_array($filtro) && in_array('acudbm01', $filtro)))
        $this->ValidateField_acudbm01($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'acucrm01' == $filtro)) || (is_array($filtro) && in_array('acucrm01', $filtro)))
        $this->ValidateField_acucrm01($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'acudbe01' == $filtro)) || (is_array($filtro) && in_array('acudbe01', $filtro)))
        $this->ValidateField_acudbe01($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'acucre01' == $filtro)) || (is_array($filtro) && in_array('acucre01', $filtro)))
        $this->ValidateField_acucre01($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'comentcte01' == $filtro)) || (is_array($filtro) && in_array('comentcte01', $filtro)))
        $this->ValidateField_comentcte01($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'statuscte01' == $filtro)) || (is_array($filtro) && in_array('statuscte01', $filtro)))
        $this->ValidateField_statuscte01($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'identcte01' == $filtro)) || (is_array($filtro) && in_array('identcte01', $filtro)))
        $this->ValidateField_identcte01($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'cordcte01' == $filtro)) || (is_array($filtro) && in_array('cordcte01', $filtro)))
        $this->ValidateField_cordcte01($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'limcant01' == $filtro)) || (is_array($filtro) && in_array('limcant01', $filtro)))
        $this->ValidateField_limcant01($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'pagleg01' == $filtro)) || (is_array($filtro) && in_array('pagleg01', $filtro)))
        $this->ValidateField_pagleg01($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'telcte01b' == $filtro)) || (is_array($filtro) && in_array('telcte01b', $filtro)))
        $this->ValidateField_telcte01b($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'telcte01c' == $filtro)) || (is_array($filtro) && in_array('telcte01c', $filtro)))
        $this->ValidateField_telcte01c($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'emailcte01' == $filtro)) || (is_array($filtro) && in_array('emailcte01', $filtro)))
        $this->ValidateField_emailcte01($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'ctacgcte01' == $filtro)) || (is_array($filtro) && in_array('ctacgcte01', $filtro)))
        $this->ValidateField_ctacgcte01($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'obsercte01' == $filtro)) || (is_array($filtro) && in_array('obsercte01', $filtro)))
        $this->ValidateField_obsercte01($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'totexceso01' == $filtro)) || (is_array($filtro) && in_array('totexceso01', $filtro)))
        $this->ValidateField_totexceso01($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'imagencte01' == $filtro)) || (is_array($filtro) && in_array('imagencte01', $filtro)))
        $this->ValidateField_imagencte01($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'block' == $filtro)) || (is_array($filtro) && in_array('block', $filtro)))
        $this->ValidateField_block($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'uid' == $filtro)) || (is_array($filtro) && in_array('uid', $filtro)))
        $this->ValidateField_uid($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'ultimoacceso' == $filtro)) || (is_array($filtro) && in_array('ultimoacceso', $filtro)))
        $this->ValidateField_ultimoacceso($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'idcli' == $filtro)) || (is_array($filtro) && in_array('idcli', $filtro)))
        $this->ValidateField_idcli($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'catcte01' == $filtro)) || (is_array($filtro) && in_array('catcte01', $filtro)))
        $this->ValidateField_catcte01($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'numautosri01' == $filtro)) || (is_array($filtro) && in_array('numautosri01', $filtro)))
        $this->ValidateField_numautosri01($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'seriedoc01' == $filtro)) || (is_array($filtro) && in_array('seriedoc01', $filtro)))
        $this->ValidateField_seriedoc01($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'fecvencdoc01' == $filtro)) || (is_array($filtro) && in_array('fecvencdoc01', $filtro)))
        $this->ValidateField_fecvencdoc01($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'repleg01' == $filtro)) || (is_array($filtro) && in_array('repleg01', $filtro)))
        $this->ValidateField_repleg01($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'coddest01' == $filtro)) || (is_array($filtro) && in_array('coddest01', $filtro)))
        $this->ValidateField_coddest01($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'longitud01' == $filtro)) || (is_array($filtro) && in_array('longitud01', $filtro)))
        $this->ValidateField_longitud01($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'latitud01' == $filtro)) || (is_array($filtro) && in_array('latitud01', $filtro)))
        $this->ValidateField_latitud01($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'zoom01' == $filtro)) || (is_array($filtro) && in_array('zoom01', $filtro)))
        $this->ValidateField_zoom01($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'coniva01' == $filtro)) || (is_array($filtro) && in_array('coniva01', $filtro)))
        $this->ValidateField_coniva01($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'conret01' == $filtro)) || (is_array($filtro) && in_array('conret01', $filtro)))
        $this->ValidateField_conret01($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'tipo_identificacion' == $filtro)) || (is_array($filtro) && in_array('tipo_identificacion', $filtro)))
        $this->ValidateField_tipo_identificacion($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'es_padre' == $filtro)) || (is_array($filtro) && in_array('es_padre', $filtro)))
        $this->ValidateField_es_padre($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'bonos' == $filtro)) || (is_array($filtro) && in_array('bonos', $filtro)))
        $this->ValidateField_bonos($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'rendimiento' == $filtro)) || (is_array($filtro) && in_array('rendimiento', $filtro)))
        $this->ValidateField_rendimiento($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'parterel01' == $filtro)) || (is_array($filtro) && in_array('parterel01', $filtro)))
        $this->ValidateField_parterel01($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'clase_contribuyente' == $filtro)) || (is_array($filtro) && in_array('clase_contribuyente', $filtro)))
        $this->ValidateField_clase_contribuyente($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'tipo_contribuyente' == $filtro)) || (is_array($filtro) && in_array('tipo_contribuyente', $filtro)))
        $this->ValidateField_tipo_contribuyente($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'lleva_contabilidad' == $filtro)) || (is_array($filtro) && in_array('lleva_contabilidad', $filtro)))
        $this->ValidateField_lleva_contabilidad($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'ctacgant01' == $filtro)) || (is_array($filtro) && in_array('ctacgant01', $filtro)))
        $this->ValidateField_ctacgant01($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'residentefiscal01' == $filtro)) || (is_array($filtro) && in_array('residentefiscal01', $filtro)))
        $this->ValidateField_residentefiscal01($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'es_cliente' == $filtro)) || (is_array($filtro) && in_array('es_cliente', $filtro)))
        $this->ValidateField_es_cliente($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'grupos' == $filtro)) || (is_array($filtro) && in_array('grupos', $filtro)))
        $this->ValidateField_grupos($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'codigo_banco' == $filtro)) || (is_array($filtro) && in_array('codigo_banco', $filtro)))
        $this->ValidateField_codigo_banco($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'tipo_cuenta_banco' == $filtro)) || (is_array($filtro) && in_array('tipo_cuenta_banco', $filtro)))
        $this->ValidateField_tipo_cuenta_banco($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'nro_cuenta_banco' == $filtro)) || (is_array($filtro) && in_array('nro_cuenta_banco', $filtro)))
        $this->ValidateField_nro_cuenta_banco($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'pago_transferencia' == $filtro)) || (is_array($filtro) && in_array('pago_transferencia', $filtro)))
        $this->ValidateField_pago_transferencia($Campos_Crit, $Campos_Falta, $Campos_Erros);
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

    function ValidateField_codcte01(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['php_cmp_required']['codcte01']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['php_cmp_required']['codcte01'] == "on")) 
      { 
          if ($this->codcte01 == "")  
          { 
              $hasError = true;
              $Campos_Falta[] =  "Codcte 01" ; 
              if (!isset($Campos_Erros['codcte01']))
              {
                  $Campos_Erros['codcte01'] = array();
              }
              $Campos_Erros['codcte01'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['codcte01']) || !is_array($this->NM_ajax_info['errList']['codcte01']))
                  {
                      $this->NM_ajax_info['errList']['codcte01'] = array();
                  }
                  $this->NM_ajax_info['errList']['codcte01'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          } 
      } 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->codcte01) > 15) 
          { 
              $hasError = true;
              $Campos_Crit .= "Codcte 01 " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 15 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['codcte01']))
              {
                  $Campos_Erros['codcte01'] = array();
              }
              $Campos_Erros['codcte01'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 15 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['codcte01']) || !is_array($this->NM_ajax_info['errList']['codcte01']))
              {
                  $this->NM_ajax_info['errList']['codcte01'] = array();
              }
              $this->NM_ajax_info['errList']['codcte01'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 15 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'codcte01';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_codcte01

    function ValidateField_nomcte01(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->nomcte01) > 80) 
          { 
              $hasError = true;
              $Campos_Crit .= "Nomcte 01 " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 80 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['nomcte01']))
              {
                  $Campos_Erros['nomcte01'] = array();
              }
              $Campos_Erros['nomcte01'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 80 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['nomcte01']) || !is_array($this->NM_ajax_info['errList']['nomcte01']))
              {
                  $this->NM_ajax_info['errList']['nomcte01'] = array();
              }
              $this->NM_ajax_info['errList']['nomcte01'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 80 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'nomcte01';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_nomcte01

    function ValidateField_cv1cte01(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->cv1cte01) > 1) 
          { 
              $hasError = true;
              $Campos_Crit .= "Cv 1cte 01 " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 1 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['cv1cte01']))
              {
                  $Campos_Erros['cv1cte01'] = array();
              }
              $Campos_Erros['cv1cte01'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 1 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['cv1cte01']) || !is_array($this->NM_ajax_info['errList']['cv1cte01']))
              {
                  $this->NM_ajax_info['errList']['cv1cte01'] = array();
              }
              $this->NM_ajax_info['errList']['cv1cte01'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 1 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'cv1cte01';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_cv1cte01

    function ValidateField_cv2cte01(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->cv2cte01) > 1) 
          { 
              $hasError = true;
              $Campos_Crit .= "Cv 2cte 01 " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 1 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['cv2cte01']))
              {
                  $Campos_Erros['cv2cte01'] = array();
              }
              $Campos_Erros['cv2cte01'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 1 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['cv2cte01']) || !is_array($this->NM_ajax_info['errList']['cv2cte01']))
              {
                  $this->NM_ajax_info['errList']['cv2cte01'] = array();
              }
              $this->NM_ajax_info['errList']['cv2cte01'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 1 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'cv2cte01';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_cv2cte01

    function ValidateField_tipcte01(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->tipcte01) > 20) 
          { 
              $hasError = true;
              $Campos_Crit .= "Tipcte 01 " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['tipcte01']))
              {
                  $Campos_Erros['tipcte01'] = array();
              }
              $Campos_Erros['tipcte01'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['tipcte01']) || !is_array($this->NM_ajax_info['errList']['tipcte01']))
              {
                  $this->NM_ajax_info['errList']['tipcte01'] = array();
              }
              $this->NM_ajax_info['errList']['tipcte01'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'tipcte01';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_tipcte01

    function ValidateField_ofienccte01(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->ofienccte01) > 4) 
          { 
              $hasError = true;
              $Campos_Crit .= "Ofienccte 01 " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 4 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['ofienccte01']))
              {
                  $Campos_Erros['ofienccte01'] = array();
              }
              $Campos_Erros['ofienccte01'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 4 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['ofienccte01']) || !is_array($this->NM_ajax_info['errList']['ofienccte01']))
              {
                  $this->NM_ajax_info['errList']['ofienccte01'] = array();
              }
              $this->NM_ajax_info['errList']['ofienccte01'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 4 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'ofienccte01';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_ofienccte01

    function ValidateField_vendcte01(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->vendcte01) > 4) 
          { 
              $hasError = true;
              $Campos_Crit .= "Vendcte 01 " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 4 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['vendcte01']))
              {
                  $Campos_Erros['vendcte01'] = array();
              }
              $Campos_Erros['vendcte01'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 4 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['vendcte01']) || !is_array($this->NM_ajax_info['errList']['vendcte01']))
              {
                  $this->NM_ajax_info['errList']['vendcte01'] = array();
              }
              $this->NM_ajax_info['errList']['vendcte01'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 4 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'vendcte01';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_vendcte01

    function ValidateField_cobrcte01(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->cobrcte01) > 4) 
          { 
              $hasError = true;
              $Campos_Crit .= "Cobrcte 01 " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 4 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['cobrcte01']))
              {
                  $Campos_Erros['cobrcte01'] = array();
              }
              $Campos_Erros['cobrcte01'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 4 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['cobrcte01']) || !is_array($this->NM_ajax_info['errList']['cobrcte01']))
              {
                  $this->NM_ajax_info['errList']['cobrcte01'] = array();
              }
              $this->NM_ajax_info['errList']['cobrcte01'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 4 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'cobrcte01';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_cobrcte01

    function ValidateField_loccte01(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->loccte01) > 4) 
          { 
              $hasError = true;
              $Campos_Crit .= "Loccte 01 " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 4 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['loccte01']))
              {
                  $Campos_Erros['loccte01'] = array();
              }
              $Campos_Erros['loccte01'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 4 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['loccte01']) || !is_array($this->NM_ajax_info['errList']['loccte01']))
              {
                  $this->NM_ajax_info['errList']['loccte01'] = array();
              }
              $this->NM_ajax_info['errList']['loccte01'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 4 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'loccte01';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_loccte01

    function ValidateField_dircte01(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->dircte01) > 40) 
          { 
              $hasError = true;
              $Campos_Crit .= "Dircte 01 " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 40 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['dircte01']))
              {
                  $Campos_Erros['dircte01'] = array();
              }
              $Campos_Erros['dircte01'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 40 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['dircte01']) || !is_array($this->NM_ajax_info['errList']['dircte01']))
              {
                  $this->NM_ajax_info['errList']['dircte01'] = array();
              }
              $this->NM_ajax_info['errList']['dircte01'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 40 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'dircte01';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_dircte01

    function ValidateField_telcte01(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->telcte01) > 11) 
          { 
              $hasError = true;
              $Campos_Crit .= "Telcte 01 " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 11 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['telcte01']))
              {
                  $Campos_Erros['telcte01'] = array();
              }
              $Campos_Erros['telcte01'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 11 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['telcte01']) || !is_array($this->NM_ajax_info['errList']['telcte01']))
              {
                  $this->NM_ajax_info['errList']['telcte01'] = array();
              }
              $this->NM_ajax_info['errList']['telcte01'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 11 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'telcte01';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_telcte01

    function ValidateField_cascte01(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->cascte01) > 15) 
          { 
              $hasError = true;
              $Campos_Crit .= "Cascte 01 " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 15 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['cascte01']))
              {
                  $Campos_Erros['cascte01'] = array();
              }
              $Campos_Erros['cascte01'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 15 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['cascte01']) || !is_array($this->NM_ajax_info['errList']['cascte01']))
              {
                  $this->NM_ajax_info['errList']['cascte01'] = array();
              }
              $this->NM_ajax_info['errList']['cascte01'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 15 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'cascte01';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_cascte01

    function ValidateField_fecing01(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      nm_limpa_data($this->fecing01, $this->field_config['fecing01']['date_sep']) ; 
      $trab_dt_min = ""; 
      $trab_dt_max = ""; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          $guarda_datahora = $this->field_config['fecing01']['date_format']; 
          if (false !== strpos($guarda_datahora, ';')) $this->field_config['fecing01']['date_format'] = substr($guarda_datahora, 0, strpos($guarda_datahora, ';'));
          $Format_Data = $this->field_config['fecing01']['date_format']; 
          nm_limpa_data($Format_Data, $this->field_config['fecing01']['date_sep']) ; 
          if (trim($this->fecing01) != "")  
          { 
              if ($teste_validade->Data($this->fecing01, $Format_Data, $trab_dt_min, $trab_dt_max) == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Fecing 01; " ; 
                  if (!isset($Campos_Erros['fecing01']))
                  {
                      $Campos_Erros['fecing01'] = array();
                  }
                  $Campos_Erros['fecing01'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['fecing01']) || !is_array($this->NM_ajax_info['errList']['fecing01']))
                  {
                      $this->NM_ajax_info['errList']['fecing01'] = array();
                  }
                  $this->NM_ajax_info['errList']['fecing01'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
          $this->field_config['fecing01']['date_format'] = $guarda_datahora; 
       } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'fecing01';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
      nm_limpa_hora($this->fecing01_hora, $this->field_config['fecing01_hora']['time_sep']) ; 
      if ($this->nmgp_opcao != "excluir") 
      {
          $Format_Hora = $this->field_config['fecing01_hora']['date_format']; 
          nm_limpa_hora($Format_Hora, $this->field_config['fecing01_hora']['time_sep']) ; 
          if (trim($this->fecing01_hora) != "")  
          { 
              if ($teste_validade->Hora($this->fecing01_hora, $Format_Hora) == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Fecing 01; " ; 
                  if (!isset($Campos_Erros['fecing01_hora']))
                  {
                      $Campos_Erros['fecing01_hora'] = array();
                  }
                  $Campos_Erros['fecing01_hora'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['fecing01']) || !is_array($this->NM_ajax_info['errList']['fecing01']))
                  {
                      $this->NM_ajax_info['errList']['fecing01'] = array();
                  }
                  $this->NM_ajax_info['errList']['fecing01'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
      if (isset($Campos_Erros['fecing01']) && isset($Campos_Erros['fecing01_hora']))
      {
          $this->removeDuplicateDttmError($Campos_Erros['fecing01'], $Campos_Erros['fecing01_hora']);
          if (empty($Campos_Erros['fecing01_hora']))
          {
              unset($Campos_Erros['fecing01_hora']);
          }
          if (isset($this->NM_ajax_info['errList']['fecing01']))
          {
              $this->NM_ajax_info['errList']['fecing01'] = array_unique($this->NM_ajax_info['errList']['fecing01']);
          }
      }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'fecing01_hora';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_fecing01_hora

    function ValidateField_condpag01(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->condpag01) > 4) 
          { 
              $hasError = true;
              $Campos_Crit .= "Condpag 01 " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 4 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['condpag01']))
              {
                  $Campos_Erros['condpag01'] = array();
              }
              $Campos_Erros['condpag01'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 4 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['condpag01']) || !is_array($this->NM_ajax_info['errList']['condpag01']))
              {
                  $this->NM_ajax_info['errList']['condpag01'] = array();
              }
              $this->NM_ajax_info['errList']['condpag01'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 4 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'condpag01';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_condpag01

    function ValidateField_desctocte01(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao == "alterar")
      {
      if ($this->desctocte01 === "" || is_null($this->desctocte01))  
      { 
          $this->desctocte01 = 0;
          $this->sc_force_zero[] = 'desctocte01';
      } 
      }
      if (!empty($this->field_config['desctocte01']['symbol_dec']))
      {
          $this->sc_remove_currency($this->desctocte01, $this->field_config['desctocte01']['symbol_dec'], $this->field_config['desctocte01']['symbol_grp'], $this->field_config['desctocte01']['symbol_mon']); 
          nm_limpa_valor($this->desctocte01, $this->field_config['desctocte01']['symbol_dec'], $this->field_config['desctocte01']['symbol_grp']) ; 
          if ('.' == substr($this->desctocte01, 0, 1))
          {
              if ('' == str_replace('0', '', substr($this->desctocte01, 1)))
              {
                  $this->desctocte01 = '';
              }
              else
              {
                  $this->desctocte01 = '0' . $this->desctocte01;
              }
          }
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->desctocte01 != '')  
          { 
              $iTestSize = 7;
              if (strlen($this->desctocte01) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Desctocte 01: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['desctocte01']))
                  {
                      $Campos_Erros['desctocte01'] = array();
                  }
                  $Campos_Erros['desctocte01'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['desctocte01']) || !is_array($this->NM_ajax_info['errList']['desctocte01']))
                  {
                      $this->NM_ajax_info['errList']['desctocte01'] = array();
                  }
                  $this->NM_ajax_info['errList']['desctocte01'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->desctocte01, 4, 2, 0, 0, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Desctocte 01; " ; 
                  if (!isset($Campos_Erros['desctocte01']))
                  {
                      $Campos_Erros['desctocte01'] = array();
                  }
                  $Campos_Erros['desctocte01'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['desctocte01']) || !is_array($this->NM_ajax_info['errList']['desctocte01']))
                  {
                      $this->NM_ajax_info['errList']['desctocte01'] = array();
                  }
                  $this->NM_ajax_info['errList']['desctocte01'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'desctocte01';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_desctocte01

    function ValidateField_limcred01(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao == "alterar")
      {
      if ($this->limcred01 === "" || is_null($this->limcred01))  
      { 
          $this->limcred01 = 0;
          $this->sc_force_zero[] = 'limcred01';
      } 
      }
      if (!empty($this->field_config['limcred01']['symbol_dec']))
      {
          $this->sc_remove_currency($this->limcred01, $this->field_config['limcred01']['symbol_dec'], $this->field_config['limcred01']['symbol_grp'], $this->field_config['limcred01']['symbol_mon']); 
          nm_limpa_valor($this->limcred01, $this->field_config['limcred01']['symbol_dec'], $this->field_config['limcred01']['symbol_grp']) ; 
          if ('.' == substr($this->limcred01, 0, 1))
          {
              if ('' == str_replace('0', '', substr($this->limcred01, 1)))
              {
                  $this->limcred01 = '';
              }
              else
              {
                  $this->limcred01 = '0' . $this->limcred01;
              }
          }
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->limcred01 != '')  
          { 
              $iTestSize = 19;
              if (strlen($this->limcred01) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Limcred 01: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['limcred01']))
                  {
                      $Campos_Erros['limcred01'] = array();
                  }
                  $Campos_Erros['limcred01'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['limcred01']) || !is_array($this->NM_ajax_info['errList']['limcred01']))
                  {
                      $this->NM_ajax_info['errList']['limcred01'] = array();
                  }
                  $this->NM_ajax_info['errList']['limcred01'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->limcred01, 16, 2, 0, 0, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Limcred 01; " ; 
                  if (!isset($Campos_Erros['limcred01']))
                  {
                      $Campos_Erros['limcred01'] = array();
                  }
                  $Campos_Erros['limcred01'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['limcred01']) || !is_array($this->NM_ajax_info['errList']['limcred01']))
                  {
                      $this->NM_ajax_info['errList']['limcred01'] = array();
                  }
                  $this->NM_ajax_info['errList']['limcred01'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'limcred01';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_limcred01

    function ValidateField_desppar01(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->desppar01) > 1) 
          { 
              $hasError = true;
              $Campos_Crit .= "Desppar 01 " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 1 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['desppar01']))
              {
                  $Campos_Erros['desppar01'] = array();
              }
              $Campos_Erros['desppar01'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 1 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['desppar01']) || !is_array($this->NM_ajax_info['errList']['desppar01']))
              {
                  $this->NM_ajax_info['errList']['desppar01'] = array();
              }
              $this->NM_ajax_info['errList']['desppar01'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 1 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'desppar01';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_desppar01

    function ValidateField_cheqpro01(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->cheqpro01 === "" || is_null($this->cheqpro01))  
      { 
          $this->cheqpro01 = 0;
          $this->sc_force_zero[] = 'cheqpro01';
      } 
      nm_limpa_numero($this->cheqpro01, $this->field_config['cheqpro01']['symbol_grp']) ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->cheqpro01 != '')  
          { 
              $iTestSize = 10;
              if (strlen($this->cheqpro01) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Cheqpro 01: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['cheqpro01']))
                  {
                      $Campos_Erros['cheqpro01'] = array();
                  }
                  $Campos_Erros['cheqpro01'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['cheqpro01']) || !is_array($this->NM_ajax_info['errList']['cheqpro01']))
                  {
                      $this->NM_ajax_info['errList']['cheqpro01'] = array();
                  }
                  $this->NM_ajax_info['errList']['cheqpro01'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->cheqpro01, 10, 0, 0, 0, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Cheqpro 01; " ; 
                  if (!isset($Campos_Erros['cheqpro01']))
                  {
                      $Campos_Erros['cheqpro01'] = array();
                  }
                  $Campos_Erros['cheqpro01'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['cheqpro01']) || !is_array($this->NM_ajax_info['errList']['cheqpro01']))
                  {
                      $this->NM_ajax_info['errList']['cheqpro01'] = array();
                  }
                  $this->NM_ajax_info['errList']['cheqpro01'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'cheqpro01';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_cheqpro01

    function ValidateField_sdoeje01(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao == "alterar")
      {
      if ($this->sdoeje01 === "" || is_null($this->sdoeje01))  
      { 
          $this->sdoeje01 = 0;
          $this->sc_force_zero[] = 'sdoeje01';
      } 
      }
      if (!empty($this->field_config['sdoeje01']['symbol_dec']))
      {
          $this->sc_remove_currency($this->sdoeje01, $this->field_config['sdoeje01']['symbol_dec'], $this->field_config['sdoeje01']['symbol_grp'], $this->field_config['sdoeje01']['symbol_mon']); 
          nm_limpa_valor($this->sdoeje01, $this->field_config['sdoeje01']['symbol_dec'], $this->field_config['sdoeje01']['symbol_grp']) ; 
          if ('.' == substr($this->sdoeje01, 0, 1))
          {
              if ('' == str_replace('0', '', substr($this->sdoeje01, 1)))
              {
                  $this->sdoeje01 = '';
              }
              else
              {
                  $this->sdoeje01 = '0' . $this->sdoeje01;
              }
          }
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->sdoeje01 != '')  
          { 
              $iTestSize = 19;
              if (strlen($this->sdoeje01) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Sdoeje 01: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['sdoeje01']))
                  {
                      $Campos_Erros['sdoeje01'] = array();
                  }
                  $Campos_Erros['sdoeje01'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['sdoeje01']) || !is_array($this->NM_ajax_info['errList']['sdoeje01']))
                  {
                      $this->NM_ajax_info['errList']['sdoeje01'] = array();
                  }
                  $this->NM_ajax_info['errList']['sdoeje01'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->sdoeje01, 16, 2, 0, 0, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Sdoeje 01; " ; 
                  if (!isset($Campos_Erros['sdoeje01']))
                  {
                      $Campos_Erros['sdoeje01'] = array();
                  }
                  $Campos_Erros['sdoeje01'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['sdoeje01']) || !is_array($this->NM_ajax_info['errList']['sdoeje01']))
                  {
                      $this->NM_ajax_info['errList']['sdoeje01'] = array();
                  }
                  $this->NM_ajax_info['errList']['sdoeje01'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'sdoeje01';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_sdoeje01

    function ValidateField_sdoant01(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao == "alterar")
      {
      if ($this->sdoant01 === "" || is_null($this->sdoant01))  
      { 
          $this->sdoant01 = 0;
          $this->sc_force_zero[] = 'sdoant01';
      } 
      }
      if (!empty($this->field_config['sdoant01']['symbol_dec']))
      {
          $this->sc_remove_currency($this->sdoant01, $this->field_config['sdoant01']['symbol_dec'], $this->field_config['sdoant01']['symbol_grp'], $this->field_config['sdoant01']['symbol_mon']); 
          nm_limpa_valor($this->sdoant01, $this->field_config['sdoant01']['symbol_dec'], $this->field_config['sdoant01']['symbol_grp']) ; 
          if ('.' == substr($this->sdoant01, 0, 1))
          {
              if ('' == str_replace('0', '', substr($this->sdoant01, 1)))
              {
                  $this->sdoant01 = '';
              }
              else
              {
                  $this->sdoant01 = '0' . $this->sdoant01;
              }
          }
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->sdoant01 != '')  
          { 
              $iTestSize = 19;
              if (strlen($this->sdoant01) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Sdoant 01: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['sdoant01']))
                  {
                      $Campos_Erros['sdoant01'] = array();
                  }
                  $Campos_Erros['sdoant01'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['sdoant01']) || !is_array($this->NM_ajax_info['errList']['sdoant01']))
                  {
                      $this->NM_ajax_info['errList']['sdoant01'] = array();
                  }
                  $this->NM_ajax_info['errList']['sdoant01'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->sdoant01, 16, 2, 0, 0, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Sdoant 01; " ; 
                  if (!isset($Campos_Erros['sdoant01']))
                  {
                      $Campos_Erros['sdoant01'] = array();
                  }
                  $Campos_Erros['sdoant01'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['sdoant01']) || !is_array($this->NM_ajax_info['errList']['sdoant01']))
                  {
                      $this->NM_ajax_info['errList']['sdoant01'] = array();
                  }
                  $this->NM_ajax_info['errList']['sdoant01'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'sdoant01';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_sdoant01

    function ValidateField_sdoact01(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao == "alterar")
      {
      if ($this->sdoact01 === "" || is_null($this->sdoact01))  
      { 
          $this->sdoact01 = 0;
          $this->sc_force_zero[] = 'sdoact01';
      } 
      }
      if (!empty($this->field_config['sdoact01']['symbol_dec']))
      {
          $this->sc_remove_currency($this->sdoact01, $this->field_config['sdoact01']['symbol_dec'], $this->field_config['sdoact01']['symbol_grp'], $this->field_config['sdoact01']['symbol_mon']); 
          nm_limpa_valor($this->sdoact01, $this->field_config['sdoact01']['symbol_dec'], $this->field_config['sdoact01']['symbol_grp']) ; 
          if ('.' == substr($this->sdoact01, 0, 1))
          {
              if ('' == str_replace('0', '', substr($this->sdoact01, 1)))
              {
                  $this->sdoact01 = '';
              }
              else
              {
                  $this->sdoact01 = '0' . $this->sdoact01;
              }
          }
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->sdoact01 != '')  
          { 
              $iTestSize = 19;
              if (strlen($this->sdoact01) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Sdoact 01: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['sdoact01']))
                  {
                      $Campos_Erros['sdoact01'] = array();
                  }
                  $Campos_Erros['sdoact01'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['sdoact01']) || !is_array($this->NM_ajax_info['errList']['sdoact01']))
                  {
                      $this->NM_ajax_info['errList']['sdoact01'] = array();
                  }
                  $this->NM_ajax_info['errList']['sdoact01'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->sdoact01, 16, 2, 0, 0, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Sdoact 01; " ; 
                  if (!isset($Campos_Erros['sdoact01']))
                  {
                      $Campos_Erros['sdoact01'] = array();
                  }
                  $Campos_Erros['sdoact01'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['sdoact01']) || !is_array($this->NM_ajax_info['errList']['sdoact01']))
                  {
                      $this->NM_ajax_info['errList']['sdoact01'] = array();
                  }
                  $this->NM_ajax_info['errList']['sdoact01'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'sdoact01';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_sdoact01

    function ValidateField_acudbm01(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao == "alterar")
      {
      if ($this->acudbm01 === "" || is_null($this->acudbm01))  
      { 
          $this->acudbm01 = 0;
          $this->sc_force_zero[] = 'acudbm01';
      } 
      }
      if (!empty($this->field_config['acudbm01']['symbol_dec']))
      {
          $this->sc_remove_currency($this->acudbm01, $this->field_config['acudbm01']['symbol_dec'], $this->field_config['acudbm01']['symbol_grp'], $this->field_config['acudbm01']['symbol_mon']); 
          nm_limpa_valor($this->acudbm01, $this->field_config['acudbm01']['symbol_dec'], $this->field_config['acudbm01']['symbol_grp']) ; 
          if ('.' == substr($this->acudbm01, 0, 1))
          {
              if ('' == str_replace('0', '', substr($this->acudbm01, 1)))
              {
                  $this->acudbm01 = '';
              }
              else
              {
                  $this->acudbm01 = '0' . $this->acudbm01;
              }
          }
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->acudbm01 != '')  
          { 
              $iTestSize = 19;
              if (strlen($this->acudbm01) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Acudbm 01: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['acudbm01']))
                  {
                      $Campos_Erros['acudbm01'] = array();
                  }
                  $Campos_Erros['acudbm01'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['acudbm01']) || !is_array($this->NM_ajax_info['errList']['acudbm01']))
                  {
                      $this->NM_ajax_info['errList']['acudbm01'] = array();
                  }
                  $this->NM_ajax_info['errList']['acudbm01'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->acudbm01, 16, 2, 0, 0, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Acudbm 01; " ; 
                  if (!isset($Campos_Erros['acudbm01']))
                  {
                      $Campos_Erros['acudbm01'] = array();
                  }
                  $Campos_Erros['acudbm01'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['acudbm01']) || !is_array($this->NM_ajax_info['errList']['acudbm01']))
                  {
                      $this->NM_ajax_info['errList']['acudbm01'] = array();
                  }
                  $this->NM_ajax_info['errList']['acudbm01'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'acudbm01';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_acudbm01

    function ValidateField_acucrm01(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao == "alterar")
      {
      if ($this->acucrm01 === "" || is_null($this->acucrm01))  
      { 
          $this->acucrm01 = 0;
          $this->sc_force_zero[] = 'acucrm01';
      } 
      }
      if (!empty($this->field_config['acucrm01']['symbol_dec']))
      {
          $this->sc_remove_currency($this->acucrm01, $this->field_config['acucrm01']['symbol_dec'], $this->field_config['acucrm01']['symbol_grp'], $this->field_config['acucrm01']['symbol_mon']); 
          nm_limpa_valor($this->acucrm01, $this->field_config['acucrm01']['symbol_dec'], $this->field_config['acucrm01']['symbol_grp']) ; 
          if ('.' == substr($this->acucrm01, 0, 1))
          {
              if ('' == str_replace('0', '', substr($this->acucrm01, 1)))
              {
                  $this->acucrm01 = '';
              }
              else
              {
                  $this->acucrm01 = '0' . $this->acucrm01;
              }
          }
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->acucrm01 != '')  
          { 
              $iTestSize = 19;
              if (strlen($this->acucrm01) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Acucrm 01: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['acucrm01']))
                  {
                      $Campos_Erros['acucrm01'] = array();
                  }
                  $Campos_Erros['acucrm01'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['acucrm01']) || !is_array($this->NM_ajax_info['errList']['acucrm01']))
                  {
                      $this->NM_ajax_info['errList']['acucrm01'] = array();
                  }
                  $this->NM_ajax_info['errList']['acucrm01'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->acucrm01, 16, 2, 0, 0, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Acucrm 01; " ; 
                  if (!isset($Campos_Erros['acucrm01']))
                  {
                      $Campos_Erros['acucrm01'] = array();
                  }
                  $Campos_Erros['acucrm01'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['acucrm01']) || !is_array($this->NM_ajax_info['errList']['acucrm01']))
                  {
                      $this->NM_ajax_info['errList']['acucrm01'] = array();
                  }
                  $this->NM_ajax_info['errList']['acucrm01'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'acucrm01';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_acucrm01

    function ValidateField_acudbe01(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao == "alterar")
      {
      if ($this->acudbe01 === "" || is_null($this->acudbe01))  
      { 
          $this->acudbe01 = 0;
          $this->sc_force_zero[] = 'acudbe01';
      } 
      }
      if (!empty($this->field_config['acudbe01']['symbol_dec']))
      {
          $this->sc_remove_currency($this->acudbe01, $this->field_config['acudbe01']['symbol_dec'], $this->field_config['acudbe01']['symbol_grp'], $this->field_config['acudbe01']['symbol_mon']); 
          nm_limpa_valor($this->acudbe01, $this->field_config['acudbe01']['symbol_dec'], $this->field_config['acudbe01']['symbol_grp']) ; 
          if ('.' == substr($this->acudbe01, 0, 1))
          {
              if ('' == str_replace('0', '', substr($this->acudbe01, 1)))
              {
                  $this->acudbe01 = '';
              }
              else
              {
                  $this->acudbe01 = '0' . $this->acudbe01;
              }
          }
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->acudbe01 != '')  
          { 
              $iTestSize = 19;
              if (strlen($this->acudbe01) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Acudbe 01: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['acudbe01']))
                  {
                      $Campos_Erros['acudbe01'] = array();
                  }
                  $Campos_Erros['acudbe01'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['acudbe01']) || !is_array($this->NM_ajax_info['errList']['acudbe01']))
                  {
                      $this->NM_ajax_info['errList']['acudbe01'] = array();
                  }
                  $this->NM_ajax_info['errList']['acudbe01'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->acudbe01, 16, 2, 0, 0, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Acudbe 01; " ; 
                  if (!isset($Campos_Erros['acudbe01']))
                  {
                      $Campos_Erros['acudbe01'] = array();
                  }
                  $Campos_Erros['acudbe01'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['acudbe01']) || !is_array($this->NM_ajax_info['errList']['acudbe01']))
                  {
                      $this->NM_ajax_info['errList']['acudbe01'] = array();
                  }
                  $this->NM_ajax_info['errList']['acudbe01'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'acudbe01';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_acudbe01

    function ValidateField_acucre01(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao == "alterar")
      {
      if ($this->acucre01 === "" || is_null($this->acucre01))  
      { 
          $this->acucre01 = 0;
          $this->sc_force_zero[] = 'acucre01';
      } 
      }
      if (!empty($this->field_config['acucre01']['symbol_dec']))
      {
          $this->sc_remove_currency($this->acucre01, $this->field_config['acucre01']['symbol_dec'], $this->field_config['acucre01']['symbol_grp'], $this->field_config['acucre01']['symbol_mon']); 
          nm_limpa_valor($this->acucre01, $this->field_config['acucre01']['symbol_dec'], $this->field_config['acucre01']['symbol_grp']) ; 
          if ('.' == substr($this->acucre01, 0, 1))
          {
              if ('' == str_replace('0', '', substr($this->acucre01, 1)))
              {
                  $this->acucre01 = '';
              }
              else
              {
                  $this->acucre01 = '0' . $this->acucre01;
              }
          }
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->acucre01 != '')  
          { 
              $iTestSize = 19;
              if (strlen($this->acucre01) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Acucre 01: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['acucre01']))
                  {
                      $Campos_Erros['acucre01'] = array();
                  }
                  $Campos_Erros['acucre01'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['acucre01']) || !is_array($this->NM_ajax_info['errList']['acucre01']))
                  {
                      $this->NM_ajax_info['errList']['acucre01'] = array();
                  }
                  $this->NM_ajax_info['errList']['acucre01'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->acucre01, 16, 2, 0, 0, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Acucre 01; " ; 
                  if (!isset($Campos_Erros['acucre01']))
                  {
                      $Campos_Erros['acucre01'] = array();
                  }
                  $Campos_Erros['acucre01'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['acucre01']) || !is_array($this->NM_ajax_info['errList']['acucre01']))
                  {
                      $this->NM_ajax_info['errList']['acucre01'] = array();
                  }
                  $this->NM_ajax_info['errList']['acucre01'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'acucre01';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_acucre01

    function ValidateField_comentcte01(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->comentcte01) > 2) 
          { 
              $hasError = true;
              $Campos_Crit .= "Comentcte 01 " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 2 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['comentcte01']))
              {
                  $Campos_Erros['comentcte01'] = array();
              }
              $Campos_Erros['comentcte01'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 2 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['comentcte01']) || !is_array($this->NM_ajax_info['errList']['comentcte01']))
              {
                  $this->NM_ajax_info['errList']['comentcte01'] = array();
              }
              $this->NM_ajax_info['errList']['comentcte01'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 2 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'comentcte01';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_comentcte01

    function ValidateField_statuscte01(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->statuscte01) > 255) 
          { 
              $hasError = true;
              $Campos_Crit .= "Statuscte 01 " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 255 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['statuscte01']))
              {
                  $Campos_Erros['statuscte01'] = array();
              }
              $Campos_Erros['statuscte01'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 255 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['statuscte01']) || !is_array($this->NM_ajax_info['errList']['statuscte01']))
              {
                  $this->NM_ajax_info['errList']['statuscte01'] = array();
              }
              $this->NM_ajax_info['errList']['statuscte01'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 255 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'statuscte01';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_statuscte01

    function ValidateField_identcte01(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->identcte01) > 15) 
          { 
              $hasError = true;
              $Campos_Crit .= "Identcte 01 " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 15 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['identcte01']))
              {
                  $Campos_Erros['identcte01'] = array();
              }
              $Campos_Erros['identcte01'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 15 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['identcte01']) || !is_array($this->NM_ajax_info['errList']['identcte01']))
              {
                  $this->NM_ajax_info['errList']['identcte01'] = array();
              }
              $this->NM_ajax_info['errList']['identcte01'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 15 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'identcte01';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_identcte01

    function ValidateField_cordcte01(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->cordcte01) > 4) 
          { 
              $hasError = true;
              $Campos_Crit .= "Cordcte 01 " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 4 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['cordcte01']))
              {
                  $Campos_Erros['cordcte01'] = array();
              }
              $Campos_Erros['cordcte01'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 4 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['cordcte01']) || !is_array($this->NM_ajax_info['errList']['cordcte01']))
              {
                  $this->NM_ajax_info['errList']['cordcte01'] = array();
              }
              $this->NM_ajax_info['errList']['cordcte01'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 4 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'cordcte01';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_cordcte01

    function ValidateField_limcant01(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->limcant01) > 255) 
          { 
              $hasError = true;
              $Campos_Crit .= "Limcant 01 " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 255 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['limcant01']))
              {
                  $Campos_Erros['limcant01'] = array();
              }
              $Campos_Erros['limcant01'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 255 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['limcant01']) || !is_array($this->NM_ajax_info['errList']['limcant01']))
              {
                  $this->NM_ajax_info['errList']['limcant01'] = array();
              }
              $this->NM_ajax_info['errList']['limcant01'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 255 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'limcant01';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_limcant01

    function ValidateField_pagleg01(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->pagleg01) > 30) 
          { 
              $hasError = true;
              $Campos_Crit .= "Pagleg 01 " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 30 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['pagleg01']))
              {
                  $Campos_Erros['pagleg01'] = array();
              }
              $Campos_Erros['pagleg01'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 30 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['pagleg01']) || !is_array($this->NM_ajax_info['errList']['pagleg01']))
              {
                  $this->NM_ajax_info['errList']['pagleg01'] = array();
              }
              $this->NM_ajax_info['errList']['pagleg01'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 30 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'pagleg01';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_pagleg01

    function ValidateField_telcte01b(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->telcte01b) > 11) 
          { 
              $hasError = true;
              $Campos_Crit .= "Telcte 0 1b " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 11 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['telcte01b']))
              {
                  $Campos_Erros['telcte01b'] = array();
              }
              $Campos_Erros['telcte01b'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 11 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['telcte01b']) || !is_array($this->NM_ajax_info['errList']['telcte01b']))
              {
                  $this->NM_ajax_info['errList']['telcte01b'] = array();
              }
              $this->NM_ajax_info['errList']['telcte01b'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 11 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'telcte01b';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_telcte01b

    function ValidateField_telcte01c(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->telcte01c) > 11) 
          { 
              $hasError = true;
              $Campos_Crit .= "Telcte 0 1c " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 11 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['telcte01c']))
              {
                  $Campos_Erros['telcte01c'] = array();
              }
              $Campos_Erros['telcte01c'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 11 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['telcte01c']) || !is_array($this->NM_ajax_info['errList']['telcte01c']))
              {
                  $this->NM_ajax_info['errList']['telcte01c'] = array();
              }
              $this->NM_ajax_info['errList']['telcte01c'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 11 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'telcte01c';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_telcte01c

    function ValidateField_emailcte01(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->emailcte01) > 50) 
          { 
              $hasError = true;
              $Campos_Crit .= "Emailcte 01 " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 50 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['emailcte01']))
              {
                  $Campos_Erros['emailcte01'] = array();
              }
              $Campos_Erros['emailcte01'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 50 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['emailcte01']) || !is_array($this->NM_ajax_info['errList']['emailcte01']))
              {
                  $this->NM_ajax_info['errList']['emailcte01'] = array();
              }
              $this->NM_ajax_info['errList']['emailcte01'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 50 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'emailcte01';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_emailcte01

    function ValidateField_ctacgcte01(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->ctacgcte01) > 15) 
          { 
              $hasError = true;
              $Campos_Crit .= "Ctacgcte 01 " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 15 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['ctacgcte01']))
              {
                  $Campos_Erros['ctacgcte01'] = array();
              }
              $Campos_Erros['ctacgcte01'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 15 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['ctacgcte01']) || !is_array($this->NM_ajax_info['errList']['ctacgcte01']))
              {
                  $this->NM_ajax_info['errList']['ctacgcte01'] = array();
              }
              $this->NM_ajax_info['errList']['ctacgcte01'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 15 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'ctacgcte01';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_ctacgcte01

    function ValidateField_obsercte01(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->obsercte01) > 32767) 
          { 
              $hasError = true;
              $Campos_Crit .= "Obsercte 01 " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 32767 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['obsercte01']))
              {
                  $Campos_Erros['obsercte01'] = array();
              }
              $Campos_Erros['obsercte01'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 32767 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['obsercte01']) || !is_array($this->NM_ajax_info['errList']['obsercte01']))
              {
                  $this->NM_ajax_info['errList']['obsercte01'] = array();
              }
              $this->NM_ajax_info['errList']['obsercte01'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 32767 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'obsercte01';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_obsercte01

    function ValidateField_totexceso01(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao == "alterar")
      {
      if ($this->totexceso01 === "" || is_null($this->totexceso01))  
      { 
          $this->totexceso01 = 0;
          $this->sc_force_zero[] = 'totexceso01';
      } 
      }
      if (!empty($this->field_config['totexceso01']['symbol_dec']))
      {
          $this->sc_remove_currency($this->totexceso01, $this->field_config['totexceso01']['symbol_dec'], $this->field_config['totexceso01']['symbol_grp'], $this->field_config['totexceso01']['symbol_mon']); 
          nm_limpa_valor($this->totexceso01, $this->field_config['totexceso01']['symbol_dec'], $this->field_config['totexceso01']['symbol_grp']) ; 
          if ('.' == substr($this->totexceso01, 0, 1))
          {
              if ('' == str_replace('0', '', substr($this->totexceso01, 1)))
              {
                  $this->totexceso01 = '';
              }
              else
              {
                  $this->totexceso01 = '0' . $this->totexceso01;
              }
          }
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->totexceso01 != '')  
          { 
              $iTestSize = 19;
              if (strlen($this->totexceso01) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Totexceso 01: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['totexceso01']))
                  {
                      $Campos_Erros['totexceso01'] = array();
                  }
                  $Campos_Erros['totexceso01'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['totexceso01']) || !is_array($this->NM_ajax_info['errList']['totexceso01']))
                  {
                      $this->NM_ajax_info['errList']['totexceso01'] = array();
                  }
                  $this->NM_ajax_info['errList']['totexceso01'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->totexceso01, 16, 2, 0, 0, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Totexceso 01; " ; 
                  if (!isset($Campos_Erros['totexceso01']))
                  {
                      $Campos_Erros['totexceso01'] = array();
                  }
                  $Campos_Erros['totexceso01'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['totexceso01']) || !is_array($this->NM_ajax_info['errList']['totexceso01']))
                  {
                      $this->NM_ajax_info['errList']['totexceso01'] = array();
                  }
                  $this->NM_ajax_info['errList']['totexceso01'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'totexceso01';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_totexceso01

    function ValidateField_imagencte01(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->imagencte01) > 100) 
          { 
              $hasError = true;
              $Campos_Crit .= "Imagencte 01 " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 100 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['imagencte01']))
              {
                  $Campos_Erros['imagencte01'] = array();
              }
              $Campos_Erros['imagencte01'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 100 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['imagencte01']) || !is_array($this->NM_ajax_info['errList']['imagencte01']))
              {
                  $this->NM_ajax_info['errList']['imagencte01'] = array();
              }
              $this->NM_ajax_info['errList']['imagencte01'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 100 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'imagencte01';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_imagencte01

    function ValidateField_block(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->block) > 255) 
          { 
              $hasError = true;
              $Campos_Crit .= "Block " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 255 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['block']))
              {
                  $Campos_Erros['block'] = array();
              }
              $Campos_Erros['block'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 255 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['block']) || !is_array($this->NM_ajax_info['errList']['block']))
              {
                  $this->NM_ajax_info['errList']['block'] = array();
              }
              $this->NM_ajax_info['errList']['block'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 255 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'block';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_block

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

    function ValidateField_ultimoacceso(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->ultimoacceso === "" || is_null($this->ultimoacceso))  
      { 
          $this->ultimoacceso = 0;
          $this->sc_force_zero[] = 'ultimoacceso';
      } 
      nm_limpa_numero($this->ultimoacceso, $this->field_config['ultimoacceso']['symbol_grp']) ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->ultimoacceso != '')  
          { 
              $iTestSize = 19;
              if (strlen($this->ultimoacceso) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Ultimoacceso: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['ultimoacceso']))
                  {
                      $Campos_Erros['ultimoacceso'] = array();
                  }
                  $Campos_Erros['ultimoacceso'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['ultimoacceso']) || !is_array($this->NM_ajax_info['errList']['ultimoacceso']))
                  {
                      $this->NM_ajax_info['errList']['ultimoacceso'] = array();
                  }
                  $this->NM_ajax_info['errList']['ultimoacceso'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->ultimoacceso, 19, 0, 0, 0, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Ultimoacceso; " ; 
                  if (!isset($Campos_Erros['ultimoacceso']))
                  {
                      $Campos_Erros['ultimoacceso'] = array();
                  }
                  $Campos_Erros['ultimoacceso'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['ultimoacceso']) || !is_array($this->NM_ajax_info['errList']['ultimoacceso']))
                  {
                      $this->NM_ajax_info['errList']['ultimoacceso'] = array();
                  }
                  $this->NM_ajax_info['errList']['ultimoacceso'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'ultimoacceso';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_ultimoacceso

    function ValidateField_idcli(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao == "incluir")
      { 
          if (NM_utf8_strlen($this->idcli) > 255) 
          { 
              $hasError = true;
              $Campos_Crit .= "Idcli " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 255 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['idcli']))
              {
                  $Campos_Erros['idcli'] = array();
              }
              $Campos_Erros['idcli'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 255 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['idcli']) || !is_array($this->NM_ajax_info['errList']['idcli']))
              {
                  $this->NM_ajax_info['errList']['idcli'] = array();
              }
              $this->NM_ajax_info['errList']['idcli'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 255 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'idcli';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_idcli

    function ValidateField_catcte01(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->catcte01) > 20) 
          { 
              $hasError = true;
              $Campos_Crit .= "Catcte 01 " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['catcte01']))
              {
                  $Campos_Erros['catcte01'] = array();
              }
              $Campos_Erros['catcte01'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['catcte01']) || !is_array($this->NM_ajax_info['errList']['catcte01']))
              {
                  $this->NM_ajax_info['errList']['catcte01'] = array();
              }
              $this->NM_ajax_info['errList']['catcte01'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'catcte01';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_catcte01

    function ValidateField_numautosri01(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->numautosri01) > 255) 
          { 
              $hasError = true;
              $Campos_Crit .= "Numautosri 01 " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 255 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['numautosri01']))
              {
                  $Campos_Erros['numautosri01'] = array();
              }
              $Campos_Erros['numautosri01'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 255 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['numautosri01']) || !is_array($this->NM_ajax_info['errList']['numautosri01']))
              {
                  $this->NM_ajax_info['errList']['numautosri01'] = array();
              }
              $this->NM_ajax_info['errList']['numautosri01'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 255 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'numautosri01';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_numautosri01

    function ValidateField_seriedoc01(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->seriedoc01) > 20) 
          { 
              $hasError = true;
              $Campos_Crit .= "Seriedoc 01 " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['seriedoc01']))
              {
                  $Campos_Erros['seriedoc01'] = array();
              }
              $Campos_Erros['seriedoc01'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['seriedoc01']) || !is_array($this->NM_ajax_info['errList']['seriedoc01']))
              {
                  $this->NM_ajax_info['errList']['seriedoc01'] = array();
              }
              $this->NM_ajax_info['errList']['seriedoc01'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'seriedoc01';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_seriedoc01

    function ValidateField_fecvencdoc01(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      nm_limpa_data($this->fecvencdoc01, $this->field_config['fecvencdoc01']['date_sep']) ; 
      $trab_dt_min = ""; 
      $trab_dt_max = ""; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          $guarda_datahora = $this->field_config['fecvencdoc01']['date_format']; 
          if (false !== strpos($guarda_datahora, ';')) $this->field_config['fecvencdoc01']['date_format'] = substr($guarda_datahora, 0, strpos($guarda_datahora, ';'));
          $Format_Data = $this->field_config['fecvencdoc01']['date_format']; 
          nm_limpa_data($Format_Data, $this->field_config['fecvencdoc01']['date_sep']) ; 
          if (trim($this->fecvencdoc01) != "")  
          { 
              if ($teste_validade->Data($this->fecvencdoc01, $Format_Data, $trab_dt_min, $trab_dt_max) == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Fecvencdoc 01; " ; 
                  if (!isset($Campos_Erros['fecvencdoc01']))
                  {
                      $Campos_Erros['fecvencdoc01'] = array();
                  }
                  $Campos_Erros['fecvencdoc01'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['fecvencdoc01']) || !is_array($this->NM_ajax_info['errList']['fecvencdoc01']))
                  {
                      $this->NM_ajax_info['errList']['fecvencdoc01'] = array();
                  }
                  $this->NM_ajax_info['errList']['fecvencdoc01'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
          $this->field_config['fecvencdoc01']['date_format'] = $guarda_datahora; 
       } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'fecvencdoc01';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_fecvencdoc01

    function ValidateField_repleg01(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->repleg01) > 255) 
          { 
              $hasError = true;
              $Campos_Crit .= "Repleg 01 " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 255 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['repleg01']))
              {
                  $Campos_Erros['repleg01'] = array();
              }
              $Campos_Erros['repleg01'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 255 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['repleg01']) || !is_array($this->NM_ajax_info['errList']['repleg01']))
              {
                  $this->NM_ajax_info['errList']['repleg01'] = array();
              }
              $this->NM_ajax_info['errList']['repleg01'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 255 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'repleg01';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_repleg01

    function ValidateField_coddest01(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->coddest01) > 5) 
          { 
              $hasError = true;
              $Campos_Crit .= "Coddest 01 " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 5 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['coddest01']))
              {
                  $Campos_Erros['coddest01'] = array();
              }
              $Campos_Erros['coddest01'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 5 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['coddest01']) || !is_array($this->NM_ajax_info['errList']['coddest01']))
              {
                  $this->NM_ajax_info['errList']['coddest01'] = array();
              }
              $this->NM_ajax_info['errList']['coddest01'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 5 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'coddest01';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_coddest01

    function ValidateField_longitud01(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->longitud01) > 50) 
          { 
              $hasError = true;
              $Campos_Crit .= "Longitud 01 " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 50 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['longitud01']))
              {
                  $Campos_Erros['longitud01'] = array();
              }
              $Campos_Erros['longitud01'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 50 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['longitud01']) || !is_array($this->NM_ajax_info['errList']['longitud01']))
              {
                  $this->NM_ajax_info['errList']['longitud01'] = array();
              }
              $this->NM_ajax_info['errList']['longitud01'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 50 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'longitud01';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_longitud01

    function ValidateField_latitud01(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->latitud01) > 50) 
          { 
              $hasError = true;
              $Campos_Crit .= "Latitud 01 " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 50 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['latitud01']))
              {
                  $Campos_Erros['latitud01'] = array();
              }
              $Campos_Erros['latitud01'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 50 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['latitud01']) || !is_array($this->NM_ajax_info['errList']['latitud01']))
              {
                  $this->NM_ajax_info['errList']['latitud01'] = array();
              }
              $this->NM_ajax_info['errList']['latitud01'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 50 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'latitud01';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_latitud01

    function ValidateField_zoom01(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->zoom01) > 255) 
          { 
              $hasError = true;
              $Campos_Crit .= "Zoom 01 " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 255 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['zoom01']))
              {
                  $Campos_Erros['zoom01'] = array();
              }
              $Campos_Erros['zoom01'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 255 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['zoom01']) || !is_array($this->NM_ajax_info['errList']['zoom01']))
              {
                  $this->NM_ajax_info['errList']['zoom01'] = array();
              }
              $this->NM_ajax_info['errList']['zoom01'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 255 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'zoom01';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_zoom01

    function ValidateField_coniva01(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['php_cmp_required']['coniva01']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['php_cmp_required']['coniva01'] == "on")) 
      { 
          if ($this->coniva01 == "")  
          { 
              $hasError = true;
              $Campos_Falta[] =  "Coniva 01" ; 
              if (!isset($Campos_Erros['coniva01']))
              {
                  $Campos_Erros['coniva01'] = array();
              }
              $Campos_Erros['coniva01'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['coniva01']) || !is_array($this->NM_ajax_info['errList']['coniva01']))
                  {
                      $this->NM_ajax_info['errList']['coniva01'] = array();
                  }
                  $this->NM_ajax_info['errList']['coniva01'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          } 
      } 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->coniva01) > 1) 
          { 
              $hasError = true;
              $Campos_Crit .= "Coniva 01 " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 1 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['coniva01']))
              {
                  $Campos_Erros['coniva01'] = array();
              }
              $Campos_Erros['coniva01'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 1 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['coniva01']) || !is_array($this->NM_ajax_info['errList']['coniva01']))
              {
                  $this->NM_ajax_info['errList']['coniva01'] = array();
              }
              $this->NM_ajax_info['errList']['coniva01'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 1 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'coniva01';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_coniva01

    function ValidateField_conret01(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['php_cmp_required']['conret01']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['php_cmp_required']['conret01'] == "on")) 
      { 
          if ($this->conret01 == "")  
          { 
              $hasError = true;
              $Campos_Falta[] =  "Conret 01" ; 
              if (!isset($Campos_Erros['conret01']))
              {
                  $Campos_Erros['conret01'] = array();
              }
              $Campos_Erros['conret01'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['conret01']) || !is_array($this->NM_ajax_info['errList']['conret01']))
                  {
                      $this->NM_ajax_info['errList']['conret01'] = array();
                  }
                  $this->NM_ajax_info['errList']['conret01'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          } 
      } 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->conret01) > 1) 
          { 
              $hasError = true;
              $Campos_Crit .= "Conret 01 " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 1 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['conret01']))
              {
                  $Campos_Erros['conret01'] = array();
              }
              $Campos_Erros['conret01'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 1 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['conret01']) || !is_array($this->NM_ajax_info['errList']['conret01']))
              {
                  $this->NM_ajax_info['errList']['conret01'] = array();
              }
              $this->NM_ajax_info['errList']['conret01'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 1 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'conret01';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_conret01

    function ValidateField_tipo_identificacion(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['php_cmp_required']['tipo_identificacion']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['php_cmp_required']['tipo_identificacion'] == "on")) 
      { 
          if ($this->tipo_identificacion == "")  
          { 
              $hasError = true;
              $Campos_Falta[] =  "Tipo Identificacion" ; 
              if (!isset($Campos_Erros['tipo_identificacion']))
              {
                  $Campos_Erros['tipo_identificacion'] = array();
              }
              $Campos_Erros['tipo_identificacion'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['tipo_identificacion']) || !is_array($this->NM_ajax_info['errList']['tipo_identificacion']))
                  {
                      $this->NM_ajax_info['errList']['tipo_identificacion'] = array();
                  }
                  $this->NM_ajax_info['errList']['tipo_identificacion'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          } 
      } 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->tipo_identificacion) > 4) 
          { 
              $hasError = true;
              $Campos_Crit .= "Tipo Identificacion " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 4 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['tipo_identificacion']))
              {
                  $Campos_Erros['tipo_identificacion'] = array();
              }
              $Campos_Erros['tipo_identificacion'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 4 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['tipo_identificacion']) || !is_array($this->NM_ajax_info['errList']['tipo_identificacion']))
              {
                  $this->NM_ajax_info['errList']['tipo_identificacion'] = array();
              }
              $this->NM_ajax_info['errList']['tipo_identificacion'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 4 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'tipo_identificacion';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_tipo_identificacion

    function ValidateField_es_padre(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->es_padre === "" || is_null($this->es_padre))  
      { 
          $this->es_padre = 0;
          $this->sc_force_zero[] = 'es_padre';
      } 
      nm_limpa_numero($this->es_padre, $this->field_config['es_padre']['symbol_grp']) ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->es_padre != '')  
          { 
              $iTestSize = 3;
              if (strlen($this->es_padre) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Es Padre: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['es_padre']))
                  {
                      $Campos_Erros['es_padre'] = array();
                  }
                  $Campos_Erros['es_padre'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['es_padre']) || !is_array($this->NM_ajax_info['errList']['es_padre']))
                  {
                      $this->NM_ajax_info['errList']['es_padre'] = array();
                  }
                  $this->NM_ajax_info['errList']['es_padre'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->es_padre, 3, 0, 0, 0, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Es Padre; " ; 
                  if (!isset($Campos_Erros['es_padre']))
                  {
                      $Campos_Erros['es_padre'] = array();
                  }
                  $Campos_Erros['es_padre'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['es_padre']) || !is_array($this->NM_ajax_info['errList']['es_padre']))
                  {
                      $this->NM_ajax_info['errList']['es_padre'] = array();
                  }
                  $this->NM_ajax_info['errList']['es_padre'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'es_padre';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_es_padre

    function ValidateField_bonos(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['php_cmp_required']['bonos']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['php_cmp_required']['bonos'] == "on")) 
      { 
          if ($this->bonos == "")  
          { 
              $hasError = true;
              $Campos_Falta[] =  "Bonos" ; 
              if (!isset($Campos_Erros['bonos']))
              {
                  $Campos_Erros['bonos'] = array();
              }
              $Campos_Erros['bonos'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['bonos']) || !is_array($this->NM_ajax_info['errList']['bonos']))
                  {
                      $this->NM_ajax_info['errList']['bonos'] = array();
                  }
                  $this->NM_ajax_info['errList']['bonos'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          } 
      } 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->bonos) > 2) 
          { 
              $hasError = true;
              $Campos_Crit .= "Bonos " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 2 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['bonos']))
              {
                  $Campos_Erros['bonos'] = array();
              }
              $Campos_Erros['bonos'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 2 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['bonos']) || !is_array($this->NM_ajax_info['errList']['bonos']))
              {
                  $this->NM_ajax_info['errList']['bonos'] = array();
              }
              $this->NM_ajax_info['errList']['bonos'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 2 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'bonos';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_bonos

    function ValidateField_rendimiento(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['php_cmp_required']['rendimiento']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['php_cmp_required']['rendimiento'] == "on")) 
      { 
          if ($this->rendimiento == "")  
          { 
              $hasError = true;
              $Campos_Falta[] =  "Rendimiento" ; 
              if (!isset($Campos_Erros['rendimiento']))
              {
                  $Campos_Erros['rendimiento'] = array();
              }
              $Campos_Erros['rendimiento'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['rendimiento']) || !is_array($this->NM_ajax_info['errList']['rendimiento']))
                  {
                      $this->NM_ajax_info['errList']['rendimiento'] = array();
                  }
                  $this->NM_ajax_info['errList']['rendimiento'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          } 
      } 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->rendimiento) > 1) 
          { 
              $hasError = true;
              $Campos_Crit .= "Rendimiento " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 1 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['rendimiento']))
              {
                  $Campos_Erros['rendimiento'] = array();
              }
              $Campos_Erros['rendimiento'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 1 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['rendimiento']) || !is_array($this->NM_ajax_info['errList']['rendimiento']))
              {
                  $this->NM_ajax_info['errList']['rendimiento'] = array();
              }
              $this->NM_ajax_info['errList']['rendimiento'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 1 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'rendimiento';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_rendimiento

    function ValidateField_parterel01(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['php_cmp_required']['parterel01']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['php_cmp_required']['parterel01'] == "on")) 
      { 
          if ($this->parterel01 == "")  
          { 
              $hasError = true;
              $Campos_Falta[] =  "Parte Rel 01" ; 
              if (!isset($Campos_Erros['parterel01']))
              {
                  $Campos_Erros['parterel01'] = array();
              }
              $Campos_Erros['parterel01'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['parterel01']) || !is_array($this->NM_ajax_info['errList']['parterel01']))
                  {
                      $this->NM_ajax_info['errList']['parterel01'] = array();
                  }
                  $this->NM_ajax_info['errList']['parterel01'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          } 
      } 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->parterel01) > 1) 
          { 
              $hasError = true;
              $Campos_Crit .= "Parte Rel 01 " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 1 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['parterel01']))
              {
                  $Campos_Erros['parterel01'] = array();
              }
              $Campos_Erros['parterel01'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 1 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['parterel01']) || !is_array($this->NM_ajax_info['errList']['parterel01']))
              {
                  $this->NM_ajax_info['errList']['parterel01'] = array();
              }
              $this->NM_ajax_info['errList']['parterel01'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 1 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'parterel01';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_parterel01

    function ValidateField_clase_contribuyente(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['php_cmp_required']['clase_contribuyente']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['php_cmp_required']['clase_contribuyente'] == "on")) 
      { 
          if ($this->clase_contribuyente == "")  
          { 
              $hasError = true;
              $Campos_Falta[] =  "Clase Contribuyente" ; 
              if (!isset($Campos_Erros['clase_contribuyente']))
              {
                  $Campos_Erros['clase_contribuyente'] = array();
              }
              $Campos_Erros['clase_contribuyente'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['clase_contribuyente']) || !is_array($this->NM_ajax_info['errList']['clase_contribuyente']))
                  {
                      $this->NM_ajax_info['errList']['clase_contribuyente'] = array();
                  }
                  $this->NM_ajax_info['errList']['clase_contribuyente'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          } 
      } 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->clase_contribuyente) > 10) 
          { 
              $hasError = true;
              $Campos_Crit .= "Clase Contribuyente " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 10 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['clase_contribuyente']))
              {
                  $Campos_Erros['clase_contribuyente'] = array();
              }
              $Campos_Erros['clase_contribuyente'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 10 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['clase_contribuyente']) || !is_array($this->NM_ajax_info['errList']['clase_contribuyente']))
              {
                  $this->NM_ajax_info['errList']['clase_contribuyente'] = array();
              }
              $this->NM_ajax_info['errList']['clase_contribuyente'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 10 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'clase_contribuyente';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_clase_contribuyente

    function ValidateField_tipo_contribuyente(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['php_cmp_required']['tipo_contribuyente']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['php_cmp_required']['tipo_contribuyente'] == "on")) 
      { 
          if ($this->tipo_contribuyente == "")  
          { 
              $hasError = true;
              $Campos_Falta[] =  "Tipo Contribuyente" ; 
              if (!isset($Campos_Erros['tipo_contribuyente']))
              {
                  $Campos_Erros['tipo_contribuyente'] = array();
              }
              $Campos_Erros['tipo_contribuyente'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['tipo_contribuyente']) || !is_array($this->NM_ajax_info['errList']['tipo_contribuyente']))
                  {
                      $this->NM_ajax_info['errList']['tipo_contribuyente'] = array();
                  }
                  $this->NM_ajax_info['errList']['tipo_contribuyente'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          } 
      } 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->tipo_contribuyente) > 10) 
          { 
              $hasError = true;
              $Campos_Crit .= "Tipo Contribuyente " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 10 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['tipo_contribuyente']))
              {
                  $Campos_Erros['tipo_contribuyente'] = array();
              }
              $Campos_Erros['tipo_contribuyente'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 10 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['tipo_contribuyente']) || !is_array($this->NM_ajax_info['errList']['tipo_contribuyente']))
              {
                  $this->NM_ajax_info['errList']['tipo_contribuyente'] = array();
              }
              $this->NM_ajax_info['errList']['tipo_contribuyente'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 10 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'tipo_contribuyente';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_tipo_contribuyente

    function ValidateField_lleva_contabilidad(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['php_cmp_required']['lleva_contabilidad']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['php_cmp_required']['lleva_contabilidad'] == "on")) 
      { 
          if ($this->lleva_contabilidad == "")  
          { 
              $hasError = true;
              $Campos_Falta[] =  "Lleva Contabilidad" ; 
              if (!isset($Campos_Erros['lleva_contabilidad']))
              {
                  $Campos_Erros['lleva_contabilidad'] = array();
              }
              $Campos_Erros['lleva_contabilidad'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['lleva_contabilidad']) || !is_array($this->NM_ajax_info['errList']['lleva_contabilidad']))
                  {
                      $this->NM_ajax_info['errList']['lleva_contabilidad'] = array();
                  }
                  $this->NM_ajax_info['errList']['lleva_contabilidad'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          } 
      } 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->lleva_contabilidad) > 10) 
          { 
              $hasError = true;
              $Campos_Crit .= "Lleva Contabilidad " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 10 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['lleva_contabilidad']))
              {
                  $Campos_Erros['lleva_contabilidad'] = array();
              }
              $Campos_Erros['lleva_contabilidad'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 10 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['lleva_contabilidad']) || !is_array($this->NM_ajax_info['errList']['lleva_contabilidad']))
              {
                  $this->NM_ajax_info['errList']['lleva_contabilidad'] = array();
              }
              $this->NM_ajax_info['errList']['lleva_contabilidad'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 10 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'lleva_contabilidad';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_lleva_contabilidad

    function ValidateField_ctacgant01(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['php_cmp_required']['ctacgant01']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['php_cmp_required']['ctacgant01'] == "on")) 
      { 
          if ($this->ctacgant01 == "")  
          { 
              $hasError = true;
              $Campos_Falta[] =  "Ctacgant 01" ; 
              if (!isset($Campos_Erros['ctacgant01']))
              {
                  $Campos_Erros['ctacgant01'] = array();
              }
              $Campos_Erros['ctacgant01'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['ctacgant01']) || !is_array($this->NM_ajax_info['errList']['ctacgant01']))
                  {
                      $this->NM_ajax_info['errList']['ctacgant01'] = array();
                  }
                  $this->NM_ajax_info['errList']['ctacgant01'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          } 
      } 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->ctacgant01) > 15) 
          { 
              $hasError = true;
              $Campos_Crit .= "Ctacgant 01 " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 15 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['ctacgant01']))
              {
                  $Campos_Erros['ctacgant01'] = array();
              }
              $Campos_Erros['ctacgant01'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 15 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['ctacgant01']) || !is_array($this->NM_ajax_info['errList']['ctacgant01']))
              {
                  $this->NM_ajax_info['errList']['ctacgant01'] = array();
              }
              $this->NM_ajax_info['errList']['ctacgant01'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 15 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'ctacgant01';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_ctacgant01

    function ValidateField_residentefiscal01(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['php_cmp_required']['residentefiscal01']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['php_cmp_required']['residentefiscal01'] == "on")) 
      { 
          if ($this->residentefiscal01 == "")  
          { 
              $hasError = true;
              $Campos_Falta[] =  "Residente Fiscal 01" ; 
              if (!isset($Campos_Erros['residentefiscal01']))
              {
                  $Campos_Erros['residentefiscal01'] = array();
              }
              $Campos_Erros['residentefiscal01'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['residentefiscal01']) || !is_array($this->NM_ajax_info['errList']['residentefiscal01']))
                  {
                      $this->NM_ajax_info['errList']['residentefiscal01'] = array();
                  }
                  $this->NM_ajax_info['errList']['residentefiscal01'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          } 
      } 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->residentefiscal01) > 1) 
          { 
              $hasError = true;
              $Campos_Crit .= "Residente Fiscal 01 " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 1 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['residentefiscal01']))
              {
                  $Campos_Erros['residentefiscal01'] = array();
              }
              $Campos_Erros['residentefiscal01'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 1 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['residentefiscal01']) || !is_array($this->NM_ajax_info['errList']['residentefiscal01']))
              {
                  $this->NM_ajax_info['errList']['residentefiscal01'] = array();
              }
              $this->NM_ajax_info['errList']['residentefiscal01'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 1 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'residentefiscal01';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_residentefiscal01

    function ValidateField_es_cliente(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['php_cmp_required']['es_cliente']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['php_cmp_required']['es_cliente'] == "on")) 
      { 
          if ($this->es_cliente == "")  
          { 
              $hasError = true;
              $Campos_Falta[] =  "Es Cliente" ; 
              if (!isset($Campos_Erros['es_cliente']))
              {
                  $Campos_Erros['es_cliente'] = array();
              }
              $Campos_Erros['es_cliente'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['es_cliente']) || !is_array($this->NM_ajax_info['errList']['es_cliente']))
                  {
                      $this->NM_ajax_info['errList']['es_cliente'] = array();
                  }
                  $this->NM_ajax_info['errList']['es_cliente'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          } 
      } 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->es_cliente) > 1) 
          { 
              $hasError = true;
              $Campos_Crit .= "Es Cliente " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 1 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['es_cliente']))
              {
                  $Campos_Erros['es_cliente'] = array();
              }
              $Campos_Erros['es_cliente'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 1 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['es_cliente']) || !is_array($this->NM_ajax_info['errList']['es_cliente']))
              {
                  $this->NM_ajax_info['errList']['es_cliente'] = array();
              }
              $this->NM_ajax_info['errList']['es_cliente'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 1 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'es_cliente';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_es_cliente

    function ValidateField_grupos(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['php_cmp_required']['grupos']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['php_cmp_required']['grupos'] == "on")) 
      { 
          if ($this->grupos == "")  
          { 
              $hasError = true;
              $Campos_Falta[] =  "Grupos" ; 
              if (!isset($Campos_Erros['grupos']))
              {
                  $Campos_Erros['grupos'] = array();
              }
              $Campos_Erros['grupos'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['grupos']) || !is_array($this->NM_ajax_info['errList']['grupos']))
                  {
                      $this->NM_ajax_info['errList']['grupos'] = array();
                  }
                  $this->NM_ajax_info['errList']['grupos'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          } 
      } 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->grupos) > 2) 
          { 
              $hasError = true;
              $Campos_Crit .= "Grupos " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 2 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['grupos']))
              {
                  $Campos_Erros['grupos'] = array();
              }
              $Campos_Erros['grupos'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 2 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['grupos']) || !is_array($this->NM_ajax_info['errList']['grupos']))
              {
                  $this->NM_ajax_info['errList']['grupos'] = array();
              }
              $this->NM_ajax_info['errList']['grupos'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 2 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'grupos';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_grupos

    function ValidateField_codigo_banco(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->codigo_banco) > 45) 
          { 
              $hasError = true;
              $Campos_Crit .= "Codigo Banco " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 45 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['codigo_banco']))
              {
                  $Campos_Erros['codigo_banco'] = array();
              }
              $Campos_Erros['codigo_banco'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 45 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['codigo_banco']) || !is_array($this->NM_ajax_info['errList']['codigo_banco']))
              {
                  $this->NM_ajax_info['errList']['codigo_banco'] = array();
              }
              $this->NM_ajax_info['errList']['codigo_banco'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 45 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'codigo_banco';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_codigo_banco

    function ValidateField_tipo_cuenta_banco(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->tipo_cuenta_banco) > 45) 
          { 
              $hasError = true;
              $Campos_Crit .= "Tipo Cuenta Banco " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 45 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['tipo_cuenta_banco']))
              {
                  $Campos_Erros['tipo_cuenta_banco'] = array();
              }
              $Campos_Erros['tipo_cuenta_banco'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 45 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['tipo_cuenta_banco']) || !is_array($this->NM_ajax_info['errList']['tipo_cuenta_banco']))
              {
                  $this->NM_ajax_info['errList']['tipo_cuenta_banco'] = array();
              }
              $this->NM_ajax_info['errList']['tipo_cuenta_banco'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 45 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'tipo_cuenta_banco';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_tipo_cuenta_banco

    function ValidateField_nro_cuenta_banco(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->nro_cuenta_banco) > 45) 
          { 
              $hasError = true;
              $Campos_Crit .= "Nro Cuenta Banco " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 45 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['nro_cuenta_banco']))
              {
                  $Campos_Erros['nro_cuenta_banco'] = array();
              }
              $Campos_Erros['nro_cuenta_banco'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 45 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['nro_cuenta_banco']) || !is_array($this->NM_ajax_info['errList']['nro_cuenta_banco']))
              {
                  $this->NM_ajax_info['errList']['nro_cuenta_banco'] = array();
              }
              $this->NM_ajax_info['errList']['nro_cuenta_banco'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 45 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'nro_cuenta_banco';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_nro_cuenta_banco

    function ValidateField_pago_transferencia(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['php_cmp_required']['pago_transferencia']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['php_cmp_required']['pago_transferencia'] == "on")) 
      { 
          if ($this->pago_transferencia == "")  
          { 
              $hasError = true;
              $Campos_Falta[] =  "Pago Transferencia" ; 
              if (!isset($Campos_Erros['pago_transferencia']))
              {
                  $Campos_Erros['pago_transferencia'] = array();
              }
              $Campos_Erros['pago_transferencia'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['pago_transferencia']) || !is_array($this->NM_ajax_info['errList']['pago_transferencia']))
                  {
                      $this->NM_ajax_info['errList']['pago_transferencia'] = array();
                  }
                  $this->NM_ajax_info['errList']['pago_transferencia'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          } 
      } 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->pago_transferencia) > 1) 
          { 
              $hasError = true;
              $Campos_Crit .= "Pago Transferencia " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 1 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['pago_transferencia']))
              {
                  $Campos_Erros['pago_transferencia'] = array();
              }
              $Campos_Erros['pago_transferencia'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 1 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['pago_transferencia']) || !is_array($this->NM_ajax_info['errList']['pago_transferencia']))
              {
                  $this->NM_ajax_info['errList']['pago_transferencia'] = array();
              }
              $this->NM_ajax_info['errList']['pago_transferencia'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 1 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'pago_transferencia';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_pago_transferencia

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
    $this->nmgp_dados_form['codcte01'] = $this->codcte01;
    $this->nmgp_dados_form['nomcte01'] = $this->nomcte01;
    $this->nmgp_dados_form['cv1cte01'] = $this->cv1cte01;
    $this->nmgp_dados_form['cv2cte01'] = $this->cv2cte01;
    $this->nmgp_dados_form['tipcte01'] = $this->tipcte01;
    $this->nmgp_dados_form['ofienccte01'] = $this->ofienccte01;
    $this->nmgp_dados_form['vendcte01'] = $this->vendcte01;
    $this->nmgp_dados_form['cobrcte01'] = $this->cobrcte01;
    $this->nmgp_dados_form['loccte01'] = $this->loccte01;
    $this->nmgp_dados_form['dircte01'] = $this->dircte01;
    $this->nmgp_dados_form['telcte01'] = $this->telcte01;
    $this->nmgp_dados_form['cascte01'] = $this->cascte01;
    $this->nmgp_dados_form['fecing01'] = (strlen(trim($this->fecing01)) > 19) ? str_replace(".", ":", $this->fecing01) : trim($this->fecing01);
    $this->nmgp_dados_form['condpag01'] = $this->condpag01;
    $this->nmgp_dados_form['desctocte01'] = $this->desctocte01;
    $this->nmgp_dados_form['limcred01'] = $this->limcred01;
    $this->nmgp_dados_form['desppar01'] = $this->desppar01;
    $this->nmgp_dados_form['cheqpro01'] = $this->cheqpro01;
    $this->nmgp_dados_form['sdoeje01'] = $this->sdoeje01;
    $this->nmgp_dados_form['sdoant01'] = $this->sdoant01;
    $this->nmgp_dados_form['sdoact01'] = $this->sdoact01;
    $this->nmgp_dados_form['acudbm01'] = $this->acudbm01;
    $this->nmgp_dados_form['acucrm01'] = $this->acucrm01;
    $this->nmgp_dados_form['acudbe01'] = $this->acudbe01;
    $this->nmgp_dados_form['acucre01'] = $this->acucre01;
    $this->nmgp_dados_form['comentcte01'] = $this->comentcte01;
    $this->nmgp_dados_form['statuscte01'] = $this->statuscte01;
    $this->nmgp_dados_form['identcte01'] = $this->identcte01;
    $this->nmgp_dados_form['cordcte01'] = $this->cordcte01;
    $this->nmgp_dados_form['limcant01'] = $this->limcant01;
    $this->nmgp_dados_form['pagleg01'] = $this->pagleg01;
    $this->nmgp_dados_form['telcte01b'] = $this->telcte01b;
    $this->nmgp_dados_form['telcte01c'] = $this->telcte01c;
    $this->nmgp_dados_form['emailcte01'] = $this->emailcte01;
    $this->nmgp_dados_form['ctacgcte01'] = $this->ctacgcte01;
    $this->nmgp_dados_form['obsercte01'] = $this->obsercte01;
    $this->nmgp_dados_form['totexceso01'] = $this->totexceso01;
    $this->nmgp_dados_form['imagencte01'] = $this->imagencte01;
    $this->nmgp_dados_form['block'] = $this->block;
    $this->nmgp_dados_form['uid'] = $this->uid;
    $this->nmgp_dados_form['ultimoacceso'] = $this->ultimoacceso;
    $this->nmgp_dados_form['idcli'] = $this->idcli;
    $this->nmgp_dados_form['catcte01'] = $this->catcte01;
    $this->nmgp_dados_form['numautosri01'] = $this->numautosri01;
    $this->nmgp_dados_form['seriedoc01'] = $this->seriedoc01;
    $this->nmgp_dados_form['fecvencdoc01'] = (strlen(trim($this->fecvencdoc01)) > 19) ? str_replace(".", ":", $this->fecvencdoc01) : trim($this->fecvencdoc01);
    $this->nmgp_dados_form['repleg01'] = $this->repleg01;
    $this->nmgp_dados_form['coddest01'] = $this->coddest01;
    $this->nmgp_dados_form['longitud01'] = $this->longitud01;
    $this->nmgp_dados_form['latitud01'] = $this->latitud01;
    $this->nmgp_dados_form['zoom01'] = $this->zoom01;
    $this->nmgp_dados_form['coniva01'] = $this->coniva01;
    $this->nmgp_dados_form['conret01'] = $this->conret01;
    $this->nmgp_dados_form['tipo_identificacion'] = $this->tipo_identificacion;
    $this->nmgp_dados_form['es_padre'] = $this->es_padre;
    $this->nmgp_dados_form['bonos'] = $this->bonos;
    $this->nmgp_dados_form['rendimiento'] = $this->rendimiento;
    $this->nmgp_dados_form['parterel01'] = $this->parterel01;
    $this->nmgp_dados_form['clase_contribuyente'] = $this->clase_contribuyente;
    $this->nmgp_dados_form['tipo_contribuyente'] = $this->tipo_contribuyente;
    $this->nmgp_dados_form['lleva_contabilidad'] = $this->lleva_contabilidad;
    $this->nmgp_dados_form['ctacgant01'] = $this->ctacgant01;
    $this->nmgp_dados_form['residentefiscal01'] = $this->residentefiscal01;
    $this->nmgp_dados_form['es_cliente'] = $this->es_cliente;
    $this->nmgp_dados_form['grupos'] = $this->grupos;
    $this->nmgp_dados_form['codigo_banco'] = $this->codigo_banco;
    $this->nmgp_dados_form['tipo_cuenta_banco'] = $this->tipo_cuenta_banco;
    $this->nmgp_dados_form['nro_cuenta_banco'] = $this->nro_cuenta_banco;
    $this->nmgp_dados_form['pago_transferencia'] = $this->pago_transferencia;
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['dados_form'] = $this->nmgp_dados_form;
   }
   function nm_tira_formatacao()
   {
      global $nm_form_submit;
         $this->Before_unformat = array();
         $this->formatado = false;
      $this->Before_unformat['fecing01'] = $this->fecing01;
      $this->Before_unformat['fecing01_hora'] = $this->fecing01_hora;
      nm_limpa_data($this->fecing01, $this->field_config['fecing01']['date_sep']) ; 
      nm_limpa_hora($this->fecing01_hora, $this->field_config['fecing01']['time_sep']) ; 
      $this->Before_unformat['desctocte01'] = $this->desctocte01;
      if (!empty($this->field_config['desctocte01']['symbol_dec']))
      {
         $this->sc_remove_currency($this->desctocte01, $this->field_config['desctocte01']['symbol_dec'], $this->field_config['desctocte01']['symbol_grp'], $this->field_config['desctocte01']['symbol_mon']);
         nm_limpa_valor($this->desctocte01, $this->field_config['desctocte01']['symbol_dec'], $this->field_config['desctocte01']['symbol_grp']);
      }
      $this->Before_unformat['limcred01'] = $this->limcred01;
      if (!empty($this->field_config['limcred01']['symbol_dec']))
      {
         $this->sc_remove_currency($this->limcred01, $this->field_config['limcred01']['symbol_dec'], $this->field_config['limcred01']['symbol_grp'], $this->field_config['limcred01']['symbol_mon']);
         nm_limpa_valor($this->limcred01, $this->field_config['limcred01']['symbol_dec'], $this->field_config['limcred01']['symbol_grp']);
      }
      $this->Before_unformat['cheqpro01'] = $this->cheqpro01;
      nm_limpa_numero($this->cheqpro01, $this->field_config['cheqpro01']['symbol_grp']) ; 
      $this->Before_unformat['sdoeje01'] = $this->sdoeje01;
      if (!empty($this->field_config['sdoeje01']['symbol_dec']))
      {
         $this->sc_remove_currency($this->sdoeje01, $this->field_config['sdoeje01']['symbol_dec'], $this->field_config['sdoeje01']['symbol_grp'], $this->field_config['sdoeje01']['symbol_mon']);
         nm_limpa_valor($this->sdoeje01, $this->field_config['sdoeje01']['symbol_dec'], $this->field_config['sdoeje01']['symbol_grp']);
      }
      $this->Before_unformat['sdoant01'] = $this->sdoant01;
      if (!empty($this->field_config['sdoant01']['symbol_dec']))
      {
         $this->sc_remove_currency($this->sdoant01, $this->field_config['sdoant01']['symbol_dec'], $this->field_config['sdoant01']['symbol_grp'], $this->field_config['sdoant01']['symbol_mon']);
         nm_limpa_valor($this->sdoant01, $this->field_config['sdoant01']['symbol_dec'], $this->field_config['sdoant01']['symbol_grp']);
      }
      $this->Before_unformat['sdoact01'] = $this->sdoact01;
      if (!empty($this->field_config['sdoact01']['symbol_dec']))
      {
         $this->sc_remove_currency($this->sdoact01, $this->field_config['sdoact01']['symbol_dec'], $this->field_config['sdoact01']['symbol_grp'], $this->field_config['sdoact01']['symbol_mon']);
         nm_limpa_valor($this->sdoact01, $this->field_config['sdoact01']['symbol_dec'], $this->field_config['sdoact01']['symbol_grp']);
      }
      $this->Before_unformat['acudbm01'] = $this->acudbm01;
      if (!empty($this->field_config['acudbm01']['symbol_dec']))
      {
         $this->sc_remove_currency($this->acudbm01, $this->field_config['acudbm01']['symbol_dec'], $this->field_config['acudbm01']['symbol_grp'], $this->field_config['acudbm01']['symbol_mon']);
         nm_limpa_valor($this->acudbm01, $this->field_config['acudbm01']['symbol_dec'], $this->field_config['acudbm01']['symbol_grp']);
      }
      $this->Before_unformat['acucrm01'] = $this->acucrm01;
      if (!empty($this->field_config['acucrm01']['symbol_dec']))
      {
         $this->sc_remove_currency($this->acucrm01, $this->field_config['acucrm01']['symbol_dec'], $this->field_config['acucrm01']['symbol_grp'], $this->field_config['acucrm01']['symbol_mon']);
         nm_limpa_valor($this->acucrm01, $this->field_config['acucrm01']['symbol_dec'], $this->field_config['acucrm01']['symbol_grp']);
      }
      $this->Before_unformat['acudbe01'] = $this->acudbe01;
      if (!empty($this->field_config['acudbe01']['symbol_dec']))
      {
         $this->sc_remove_currency($this->acudbe01, $this->field_config['acudbe01']['symbol_dec'], $this->field_config['acudbe01']['symbol_grp'], $this->field_config['acudbe01']['symbol_mon']);
         nm_limpa_valor($this->acudbe01, $this->field_config['acudbe01']['symbol_dec'], $this->field_config['acudbe01']['symbol_grp']);
      }
      $this->Before_unformat['acucre01'] = $this->acucre01;
      if (!empty($this->field_config['acucre01']['symbol_dec']))
      {
         $this->sc_remove_currency($this->acucre01, $this->field_config['acucre01']['symbol_dec'], $this->field_config['acucre01']['symbol_grp'], $this->field_config['acucre01']['symbol_mon']);
         nm_limpa_valor($this->acucre01, $this->field_config['acucre01']['symbol_dec'], $this->field_config['acucre01']['symbol_grp']);
      }
      $this->Before_unformat['totexceso01'] = $this->totexceso01;
      if (!empty($this->field_config['totexceso01']['symbol_dec']))
      {
         $this->sc_remove_currency($this->totexceso01, $this->field_config['totexceso01']['symbol_dec'], $this->field_config['totexceso01']['symbol_grp'], $this->field_config['totexceso01']['symbol_mon']);
         nm_limpa_valor($this->totexceso01, $this->field_config['totexceso01']['symbol_dec'], $this->field_config['totexceso01']['symbol_grp']);
      }
      $this->Before_unformat['ultimoacceso'] = $this->ultimoacceso;
      nm_limpa_numero($this->ultimoacceso, $this->field_config['ultimoacceso']['symbol_grp']) ; 
      $this->Before_unformat['fecvencdoc01'] = $this->fecvencdoc01;
      nm_limpa_data($this->fecvencdoc01, $this->field_config['fecvencdoc01']['date_sep']) ; 
      $this->Before_unformat['es_padre'] = $this->es_padre;
      nm_limpa_numero($this->es_padre, $this->field_config['es_padre']['symbol_grp']) ; 
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
      if ($Nome_Campo == "desctocte01")
      {
          if (!empty($this->field_config['desctocte01']['symbol_dec']))
          {
             $this->sc_remove_currency($this->desctocte01, $this->field_config['desctocte01']['symbol_dec'], $this->field_config['desctocte01']['symbol_grp'], $this->field_config['desctocte01']['symbol_mon']);
             nm_limpa_valor($this->desctocte01, $this->field_config['desctocte01']['symbol_dec'], $this->field_config['desctocte01']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "limcred01")
      {
          if (!empty($this->field_config['limcred01']['symbol_dec']))
          {
             $this->sc_remove_currency($this->limcred01, $this->field_config['limcred01']['symbol_dec'], $this->field_config['limcred01']['symbol_grp'], $this->field_config['limcred01']['symbol_mon']);
             nm_limpa_valor($this->limcred01, $this->field_config['limcred01']['symbol_dec'], $this->field_config['limcred01']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "cheqpro01")
      {
          nm_limpa_numero($this->cheqpro01, $this->field_config['cheqpro01']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "sdoeje01")
      {
          if (!empty($this->field_config['sdoeje01']['symbol_dec']))
          {
             $this->sc_remove_currency($this->sdoeje01, $this->field_config['sdoeje01']['symbol_dec'], $this->field_config['sdoeje01']['symbol_grp'], $this->field_config['sdoeje01']['symbol_mon']);
             nm_limpa_valor($this->sdoeje01, $this->field_config['sdoeje01']['symbol_dec'], $this->field_config['sdoeje01']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "sdoant01")
      {
          if (!empty($this->field_config['sdoant01']['symbol_dec']))
          {
             $this->sc_remove_currency($this->sdoant01, $this->field_config['sdoant01']['symbol_dec'], $this->field_config['sdoant01']['symbol_grp'], $this->field_config['sdoant01']['symbol_mon']);
             nm_limpa_valor($this->sdoant01, $this->field_config['sdoant01']['symbol_dec'], $this->field_config['sdoant01']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "sdoact01")
      {
          if (!empty($this->field_config['sdoact01']['symbol_dec']))
          {
             $this->sc_remove_currency($this->sdoact01, $this->field_config['sdoact01']['symbol_dec'], $this->field_config['sdoact01']['symbol_grp'], $this->field_config['sdoact01']['symbol_mon']);
             nm_limpa_valor($this->sdoact01, $this->field_config['sdoact01']['symbol_dec'], $this->field_config['sdoact01']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "acudbm01")
      {
          if (!empty($this->field_config['acudbm01']['symbol_dec']))
          {
             $this->sc_remove_currency($this->acudbm01, $this->field_config['acudbm01']['symbol_dec'], $this->field_config['acudbm01']['symbol_grp'], $this->field_config['acudbm01']['symbol_mon']);
             nm_limpa_valor($this->acudbm01, $this->field_config['acudbm01']['symbol_dec'], $this->field_config['acudbm01']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "acucrm01")
      {
          if (!empty($this->field_config['acucrm01']['symbol_dec']))
          {
             $this->sc_remove_currency($this->acucrm01, $this->field_config['acucrm01']['symbol_dec'], $this->field_config['acucrm01']['symbol_grp'], $this->field_config['acucrm01']['symbol_mon']);
             nm_limpa_valor($this->acucrm01, $this->field_config['acucrm01']['symbol_dec'], $this->field_config['acucrm01']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "acudbe01")
      {
          if (!empty($this->field_config['acudbe01']['symbol_dec']))
          {
             $this->sc_remove_currency($this->acudbe01, $this->field_config['acudbe01']['symbol_dec'], $this->field_config['acudbe01']['symbol_grp'], $this->field_config['acudbe01']['symbol_mon']);
             nm_limpa_valor($this->acudbe01, $this->field_config['acudbe01']['symbol_dec'], $this->field_config['acudbe01']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "acucre01")
      {
          if (!empty($this->field_config['acucre01']['symbol_dec']))
          {
             $this->sc_remove_currency($this->acucre01, $this->field_config['acucre01']['symbol_dec'], $this->field_config['acucre01']['symbol_grp'], $this->field_config['acucre01']['symbol_mon']);
             nm_limpa_valor($this->acucre01, $this->field_config['acucre01']['symbol_dec'], $this->field_config['acucre01']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "totexceso01")
      {
          if (!empty($this->field_config['totexceso01']['symbol_dec']))
          {
             $this->sc_remove_currency($this->totexceso01, $this->field_config['totexceso01']['symbol_dec'], $this->field_config['totexceso01']['symbol_grp'], $this->field_config['totexceso01']['symbol_mon']);
             nm_limpa_valor($this->totexceso01, $this->field_config['totexceso01']['symbol_dec'], $this->field_config['totexceso01']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "ultimoacceso")
      {
          nm_limpa_numero($this->ultimoacceso, $this->field_config['ultimoacceso']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "es_padre")
      {
          nm_limpa_numero($this->es_padre, $this->field_config['es_padre']['symbol_grp']) ; 
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
      if ((!empty($this->fecing01) && 'null' != $this->fecing01) || (!empty($format_fields) && isset($format_fields['fecing01'])))
      {
          $nm_separa_data = strpos($this->field_config['fecing01']['date_format'], ";") ;
          $guarda_format_hora = $this->field_config['fecing01']['date_format'];
          $this->field_config['fecing01']['date_format'] = substr($this->field_config['fecing01']['date_format'], 0, $nm_separa_data) ;
          $separador = strpos($this->fecing01, " ") ; 
          $this->fecing01_hora = substr($this->fecing01, $separador + 1) ; 
          $this->fecing01 = substr($this->fecing01, 0, $separador) ; 
          nm_volta_data($this->fecing01, $this->field_config['fecing01']['date_format']) ; 
          nmgp_Form_Datas($this->fecing01, $this->field_config['fecing01']['date_format'], $this->field_config['fecing01']['date_sep']) ;  
          $this->field_config['fecing01']['date_format'] = substr($guarda_format_hora, $nm_separa_data + 1) ;
          nm_volta_hora($this->fecing01_hora, $this->field_config['fecing01']['date_format']) ; 
          nmgp_Form_Hora($this->fecing01_hora, $this->field_config['fecing01']['date_format'], $this->field_config['fecing01']['time_sep']) ;  
          $this->field_config['fecing01']['date_format'] = $guarda_format_hora ;
      }
      elseif ('null' == $this->fecing01 || '' == $this->fecing01)
      {
          $this->fecing01_hora = '';
          $this->fecing01 = '';
      }
      if ('' !== $this->desctocte01 || (!empty($format_fields) && isset($format_fields['desctocte01'])))
      {
          nmgp_Form_Num_Val($this->desctocte01, $this->field_config['desctocte01']['symbol_grp'], $this->field_config['desctocte01']['symbol_dec'], "2", "S", $this->field_config['desctocte01']['format_neg'], "", "", "-", $this->field_config['desctocte01']['symbol_fmt']) ; 
      }
      if ('' !== $this->limcred01 || (!empty($format_fields) && isset($format_fields['limcred01'])))
      {
          nmgp_Form_Num_Val($this->limcred01, $this->field_config['limcred01']['symbol_grp'], $this->field_config['limcred01']['symbol_dec'], "2", "S", $this->field_config['limcred01']['format_neg'], "", "", "-", $this->field_config['limcred01']['symbol_fmt']) ; 
      }
      if ('' !== $this->cheqpro01 || (!empty($format_fields) && isset($format_fields['cheqpro01'])))
      {
          nmgp_Form_Num_Val($this->cheqpro01, $this->field_config['cheqpro01']['symbol_grp'], $this->field_config['cheqpro01']['symbol_dec'], "0", "S", $this->field_config['cheqpro01']['format_neg'], "", "", "-", $this->field_config['cheqpro01']['symbol_fmt']) ; 
      }
      if ('' !== $this->sdoeje01 || (!empty($format_fields) && isset($format_fields['sdoeje01'])))
      {
          nmgp_Form_Num_Val($this->sdoeje01, $this->field_config['sdoeje01']['symbol_grp'], $this->field_config['sdoeje01']['symbol_dec'], "2", "S", $this->field_config['sdoeje01']['format_neg'], "", "", "-", $this->field_config['sdoeje01']['symbol_fmt']) ; 
      }
      if ('' !== $this->sdoant01 || (!empty($format_fields) && isset($format_fields['sdoant01'])))
      {
          nmgp_Form_Num_Val($this->sdoant01, $this->field_config['sdoant01']['symbol_grp'], $this->field_config['sdoant01']['symbol_dec'], "2", "S", $this->field_config['sdoant01']['format_neg'], "", "", "-", $this->field_config['sdoant01']['symbol_fmt']) ; 
      }
      if ('' !== $this->sdoact01 || (!empty($format_fields) && isset($format_fields['sdoact01'])))
      {
          nmgp_Form_Num_Val($this->sdoact01, $this->field_config['sdoact01']['symbol_grp'], $this->field_config['sdoact01']['symbol_dec'], "2", "S", $this->field_config['sdoact01']['format_neg'], "", "", "-", $this->field_config['sdoact01']['symbol_fmt']) ; 
      }
      if ('' !== $this->acudbm01 || (!empty($format_fields) && isset($format_fields['acudbm01'])))
      {
          nmgp_Form_Num_Val($this->acudbm01, $this->field_config['acudbm01']['symbol_grp'], $this->field_config['acudbm01']['symbol_dec'], "2", "S", $this->field_config['acudbm01']['format_neg'], "", "", "-", $this->field_config['acudbm01']['symbol_fmt']) ; 
      }
      if ('' !== $this->acucrm01 || (!empty($format_fields) && isset($format_fields['acucrm01'])))
      {
          nmgp_Form_Num_Val($this->acucrm01, $this->field_config['acucrm01']['symbol_grp'], $this->field_config['acucrm01']['symbol_dec'], "2", "S", $this->field_config['acucrm01']['format_neg'], "", "", "-", $this->field_config['acucrm01']['symbol_fmt']) ; 
      }
      if ('' !== $this->acudbe01 || (!empty($format_fields) && isset($format_fields['acudbe01'])))
      {
          nmgp_Form_Num_Val($this->acudbe01, $this->field_config['acudbe01']['symbol_grp'], $this->field_config['acudbe01']['symbol_dec'], "2", "S", $this->field_config['acudbe01']['format_neg'], "", "", "-", $this->field_config['acudbe01']['symbol_fmt']) ; 
      }
      if ('' !== $this->acucre01 || (!empty($format_fields) && isset($format_fields['acucre01'])))
      {
          nmgp_Form_Num_Val($this->acucre01, $this->field_config['acucre01']['symbol_grp'], $this->field_config['acucre01']['symbol_dec'], "2", "S", $this->field_config['acucre01']['format_neg'], "", "", "-", $this->field_config['acucre01']['symbol_fmt']) ; 
      }
      if ('' !== $this->totexceso01 || (!empty($format_fields) && isset($format_fields['totexceso01'])))
      {
          nmgp_Form_Num_Val($this->totexceso01, $this->field_config['totexceso01']['symbol_grp'], $this->field_config['totexceso01']['symbol_dec'], "2", "S", $this->field_config['totexceso01']['format_neg'], "", "", "-", $this->field_config['totexceso01']['symbol_fmt']) ; 
      }
      if ('' !== $this->ultimoacceso || (!empty($format_fields) && isset($format_fields['ultimoacceso'])))
      {
          nmgp_Form_Num_Val($this->ultimoacceso, $this->field_config['ultimoacceso']['symbol_grp'], $this->field_config['ultimoacceso']['symbol_dec'], "0", "S", $this->field_config['ultimoacceso']['format_neg'], "", "", "-", $this->field_config['ultimoacceso']['symbol_fmt']) ; 
      }
      if ((!empty($this->fecvencdoc01) && 'null' != $this->fecvencdoc01) || (!empty($format_fields) && isset($format_fields['fecvencdoc01'])))
      {
          nm_volta_data($this->fecvencdoc01, $this->field_config['fecvencdoc01']['date_format']) ; 
          nmgp_Form_Datas($this->fecvencdoc01, $this->field_config['fecvencdoc01']['date_format'], $this->field_config['fecvencdoc01']['date_sep']) ;  
      }
      elseif ('null' == $this->fecvencdoc01 || '' == $this->fecvencdoc01)
      {
          $this->fecvencdoc01 = '';
      }
      if ('' !== $this->es_padre || (!empty($format_fields) && isset($format_fields['es_padre'])))
      {
          nmgp_Form_Num_Val($this->es_padre, $this->field_config['es_padre']['symbol_grp'], $this->field_config['es_padre']['symbol_dec'], "0", "S", $this->field_config['es_padre']['format_neg'], "", "", "-", $this->field_config['es_padre']['symbol_fmt']) ; 
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
      $guarda_format_hora = $this->field_config['fecing01']['date_format'];
      if ($this->fecing01 != "")  
      { 
          $nm_separa_data = strpos($this->field_config['fecing01']['date_format'], ";") ;
          $this->field_config['fecing01']['date_format'] = substr($this->field_config['fecing01']['date_format'], 0, $nm_separa_data) ;
          nm_conv_data($this->fecing01, $this->field_config['fecing01']['date_format']) ; 
          if ('pdo_sqlsrv' == strtolower($this->Ini->nm_tpbanco) || 'pdo_dblib' == strtolower($this->Ini->nm_tpbanco))
          {
              $this->fecing01 = str_replace('-', '', $this->fecing01);
          }
          $this->field_config['fecing01']['date_format'] = substr($guarda_format_hora, $nm_separa_data + 1) ;
          nm_conv_hora($this->fecing01_hora, $this->field_config['fecing01']['date_format']) ; 
          if ($this->fecing01_hora == "" )  
          { 
              $this->fecing01_hora = "00:00:00:000" ; 
          }
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
          {
              $this->fecing01_hora = substr($this->fecing01_hora, 0, -4) . "." . substr($this->fecing01_hora, -3);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
          {
              $this->fecing01_hora = substr($this->fecing01_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->fecing01_hora = substr($this->fecing01_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $this->fecing01_hora = substr($this->fecing01_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $this->fecing01_hora = substr($this->fecing01_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
          {
              $this->fecing01_hora = substr($this->fecing01_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          {
              $this->fecing01_hora = substr($this->fecing01_hora, 0, -4);
          }
          if ($this->fecing01 != "")  
          { 
              $this->fecing01 .= " " . $this->fecing01_hora ; 
          }
      } 
      if ($this->fecing01 == "" && $use_null)  
      { 
          $this->fecing01 = "null" ; 
      } 
      $this->field_config['fecing01']['date_format'] = $guarda_format_hora;
      $guarda_format_hora = $this->field_config['fecvencdoc01']['date_format'];
      if ($this->fecvencdoc01 != "")  
      { 
          nm_conv_data($this->fecvencdoc01, $this->field_config['fecvencdoc01']['date_format']) ; 
          $this->fecvencdoc01_hora = "00:00:00:000" ; 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
          {
              $this->fecvencdoc01_hora = substr($this->fecvencdoc01_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->fecvencdoc01_hora = substr($this->fecvencdoc01_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $this->fecvencdoc01_hora = substr($this->fecvencdoc01_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $this->fecvencdoc01_hora = substr($this->fecvencdoc01_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
          {
              $this->fecvencdoc01_hora = substr($this->fecvencdoc01_hora, 0, -4);
          }
      } 
      if ($this->fecvencdoc01 == "" && $use_null)  
      { 
          $this->fecvencdoc01 = "null" ; 
      } 
      $this->field_config['fecvencdoc01']['date_format'] = $guarda_format_hora;
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
          $this->ajax_return_values_codcte01();
          $this->ajax_return_values_nomcte01();
          $this->ajax_return_values_cv1cte01();
          $this->ajax_return_values_cv2cte01();
          $this->ajax_return_values_tipcte01();
          $this->ajax_return_values_ofienccte01();
          $this->ajax_return_values_vendcte01();
          $this->ajax_return_values_cobrcte01();
          $this->ajax_return_values_loccte01();
          $this->ajax_return_values_dircte01();
          $this->ajax_return_values_telcte01();
          $this->ajax_return_values_cascte01();
          $this->ajax_return_values_fecing01();
          $this->ajax_return_values_condpag01();
          $this->ajax_return_values_desctocte01();
          $this->ajax_return_values_limcred01();
          $this->ajax_return_values_desppar01();
          $this->ajax_return_values_cheqpro01();
          $this->ajax_return_values_sdoeje01();
          $this->ajax_return_values_sdoant01();
          $this->ajax_return_values_sdoact01();
          $this->ajax_return_values_acudbm01();
          $this->ajax_return_values_acucrm01();
          $this->ajax_return_values_acudbe01();
          $this->ajax_return_values_acucre01();
          $this->ajax_return_values_comentcte01();
          $this->ajax_return_values_statuscte01();
          $this->ajax_return_values_identcte01();
          $this->ajax_return_values_cordcte01();
          $this->ajax_return_values_limcant01();
          $this->ajax_return_values_pagleg01();
          $this->ajax_return_values_telcte01b();
          $this->ajax_return_values_telcte01c();
          $this->ajax_return_values_emailcte01();
          $this->ajax_return_values_ctacgcte01();
          $this->ajax_return_values_obsercte01();
          $this->ajax_return_values_totexceso01();
          $this->ajax_return_values_imagencte01();
          $this->ajax_return_values_block();
          $this->ajax_return_values_uid();
          $this->ajax_return_values_ultimoacceso();
          $this->ajax_return_values_idcli();
          $this->ajax_return_values_catcte01();
          $this->ajax_return_values_numautosri01();
          $this->ajax_return_values_seriedoc01();
          $this->ajax_return_values_fecvencdoc01();
          $this->ajax_return_values_repleg01();
          $this->ajax_return_values_coddest01();
          $this->ajax_return_values_longitud01();
          $this->ajax_return_values_latitud01();
          $this->ajax_return_values_zoom01();
          $this->ajax_return_values_coniva01();
          $this->ajax_return_values_conret01();
          $this->ajax_return_values_tipo_identificacion();
          $this->ajax_return_values_es_padre();
          $this->ajax_return_values_bonos();
          $this->ajax_return_values_rendimiento();
          $this->ajax_return_values_parterel01();
          $this->ajax_return_values_clase_contribuyente();
          $this->ajax_return_values_tipo_contribuyente();
          $this->ajax_return_values_lleva_contabilidad();
          $this->ajax_return_values_ctacgant01();
          $this->ajax_return_values_residentefiscal01();
          $this->ajax_return_values_es_cliente();
          $this->ajax_return_values_grupos();
          $this->ajax_return_values_codigo_banco();
          $this->ajax_return_values_tipo_cuenta_banco();
          $this->ajax_return_values_nro_cuenta_banco();
          $this->ajax_return_values_pago_transferencia();
          if ('navigate_form' == $this->NM_ajax_opcao)
          {
              $this->NM_ajax_info['clearUpload']      = 'S';
              $this->NM_ajax_info['navStatus']['ret'] = $this->Nav_permite_ret ? 'S' : 'N';
              $this->NM_ajax_info['navStatus']['ava'] = $this->Nav_permite_ava ? 'S' : 'N';
              $this->NM_ajax_info['fldList']['idcli']['keyVal'] = form_maepag_pack_protect_string($this->nmgp_dados_form['idcli']);
          }
   } // ajax_return_values

          //----- codcte01
   function ajax_return_values_codcte01($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("codcte01", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->codcte01);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['codcte01'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- nomcte01
   function ajax_return_values_nomcte01($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("nomcte01", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->nomcte01);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['nomcte01'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- cv1cte01
   function ajax_return_values_cv1cte01($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("cv1cte01", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->cv1cte01);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['cv1cte01'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- cv2cte01
   function ajax_return_values_cv2cte01($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("cv2cte01", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->cv2cte01);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['cv2cte01'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- tipcte01
   function ajax_return_values_tipcte01($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("tipcte01", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->tipcte01);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['tipcte01'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- ofienccte01
   function ajax_return_values_ofienccte01($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("ofienccte01", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->ofienccte01);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['ofienccte01'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- vendcte01
   function ajax_return_values_vendcte01($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("vendcte01", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->vendcte01);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['vendcte01'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- cobrcte01
   function ajax_return_values_cobrcte01($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("cobrcte01", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->cobrcte01);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['cobrcte01'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- loccte01
   function ajax_return_values_loccte01($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("loccte01", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->loccte01);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['loccte01'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- dircte01
   function ajax_return_values_dircte01($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("dircte01", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->dircte01);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['dircte01'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- telcte01
   function ajax_return_values_telcte01($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("telcte01", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->telcte01);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['telcte01'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- cascte01
   function ajax_return_values_cascte01($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("cascte01", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->cascte01);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['cascte01'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- fecing01
   function ajax_return_values_fecing01($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("fecing01", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->fecing01);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['fecing01'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->fecing01 . ' ' . $this->fecing01_hora),
              );
          }
   }

          //----- condpag01
   function ajax_return_values_condpag01($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("condpag01", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->condpag01);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['condpag01'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- desctocte01
   function ajax_return_values_desctocte01($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("desctocte01", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->desctocte01);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['desctocte01'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- limcred01
   function ajax_return_values_limcred01($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("limcred01", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->limcred01);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['limcred01'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- desppar01
   function ajax_return_values_desppar01($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("desppar01", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->desppar01);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['desppar01'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- cheqpro01
   function ajax_return_values_cheqpro01($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("cheqpro01", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->cheqpro01);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['cheqpro01'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- sdoeje01
   function ajax_return_values_sdoeje01($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("sdoeje01", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->sdoeje01);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['sdoeje01'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- sdoant01
   function ajax_return_values_sdoant01($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("sdoant01", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->sdoant01);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['sdoant01'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- sdoact01
   function ajax_return_values_sdoact01($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("sdoact01", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->sdoact01);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['sdoact01'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- acudbm01
   function ajax_return_values_acudbm01($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("acudbm01", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->acudbm01);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['acudbm01'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- acucrm01
   function ajax_return_values_acucrm01($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("acucrm01", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->acucrm01);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['acucrm01'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- acudbe01
   function ajax_return_values_acudbe01($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("acudbe01", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->acudbe01);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['acudbe01'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- acucre01
   function ajax_return_values_acucre01($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("acucre01", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->acucre01);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['acucre01'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- comentcte01
   function ajax_return_values_comentcte01($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("comentcte01", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->comentcte01);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['comentcte01'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- statuscte01
   function ajax_return_values_statuscte01($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("statuscte01", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->statuscte01);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['statuscte01'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- identcte01
   function ajax_return_values_identcte01($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("identcte01", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->identcte01);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['identcte01'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- cordcte01
   function ajax_return_values_cordcte01($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("cordcte01", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->cordcte01);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['cordcte01'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- limcant01
   function ajax_return_values_limcant01($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("limcant01", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->limcant01);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['limcant01'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- pagleg01
   function ajax_return_values_pagleg01($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("pagleg01", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->pagleg01);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['pagleg01'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- telcte01b
   function ajax_return_values_telcte01b($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("telcte01b", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->telcte01b);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['telcte01b'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- telcte01c
   function ajax_return_values_telcte01c($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("telcte01c", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->telcte01c);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['telcte01c'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- emailcte01
   function ajax_return_values_emailcte01($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("emailcte01", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->emailcte01);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['emailcte01'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- ctacgcte01
   function ajax_return_values_ctacgcte01($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("ctacgcte01", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->ctacgcte01);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['ctacgcte01'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- obsercte01
   function ajax_return_values_obsercte01($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("obsercte01", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->obsercte01);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['obsercte01'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- totexceso01
   function ajax_return_values_totexceso01($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("totexceso01", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->totexceso01);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['totexceso01'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- imagencte01
   function ajax_return_values_imagencte01($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("imagencte01", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->imagencte01);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['imagencte01'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- block
   function ajax_return_values_block($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("block", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->block);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['block'] = array(
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

          //----- ultimoacceso
   function ajax_return_values_ultimoacceso($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("ultimoacceso", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->ultimoacceso);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['ultimoacceso'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- idcli
   function ajax_return_values_idcli($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("idcli", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->idcli);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['idcli'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($sTmpValue),
               'labList' => array($this->form_format_readonly("idcli", $this->form_encode_input($sTmpValue))),
              );
          }
   }

          //----- catcte01
   function ajax_return_values_catcte01($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("catcte01", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->catcte01);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['catcte01'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- numautosri01
   function ajax_return_values_numautosri01($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("numautosri01", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->numautosri01);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['numautosri01'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- seriedoc01
   function ajax_return_values_seriedoc01($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("seriedoc01", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->seriedoc01);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['seriedoc01'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- fecvencdoc01
   function ajax_return_values_fecvencdoc01($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("fecvencdoc01", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->fecvencdoc01);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['fecvencdoc01'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- repleg01
   function ajax_return_values_repleg01($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("repleg01", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->repleg01);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['repleg01'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- coddest01
   function ajax_return_values_coddest01($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("coddest01", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->coddest01);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['coddest01'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- longitud01
   function ajax_return_values_longitud01($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("longitud01", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->longitud01);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['longitud01'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- latitud01
   function ajax_return_values_latitud01($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("latitud01", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->latitud01);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['latitud01'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- zoom01
   function ajax_return_values_zoom01($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("zoom01", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->zoom01);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['zoom01'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- coniva01
   function ajax_return_values_coniva01($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("coniva01", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->coniva01);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['coniva01'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- conret01
   function ajax_return_values_conret01($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("conret01", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->conret01);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['conret01'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- tipo_identificacion
   function ajax_return_values_tipo_identificacion($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("tipo_identificacion", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->tipo_identificacion);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['tipo_identificacion'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- es_padre
   function ajax_return_values_es_padre($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("es_padre", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->es_padre);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['es_padre'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- bonos
   function ajax_return_values_bonos($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("bonos", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->bonos);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['bonos'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- rendimiento
   function ajax_return_values_rendimiento($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("rendimiento", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->rendimiento);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['rendimiento'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- parterel01
   function ajax_return_values_parterel01($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("parterel01", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->parterel01);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['parterel01'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- clase_contribuyente
   function ajax_return_values_clase_contribuyente($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("clase_contribuyente", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->clase_contribuyente);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['clase_contribuyente'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- tipo_contribuyente
   function ajax_return_values_tipo_contribuyente($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("tipo_contribuyente", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->tipo_contribuyente);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['tipo_contribuyente'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- lleva_contabilidad
   function ajax_return_values_lleva_contabilidad($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("lleva_contabilidad", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->lleva_contabilidad);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['lleva_contabilidad'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- ctacgant01
   function ajax_return_values_ctacgant01($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("ctacgant01", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->ctacgant01);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['ctacgant01'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- residentefiscal01
   function ajax_return_values_residentefiscal01($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("residentefiscal01", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->residentefiscal01);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['residentefiscal01'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- es_cliente
   function ajax_return_values_es_cliente($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("es_cliente", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->es_cliente);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['es_cliente'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- grupos
   function ajax_return_values_grupos($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("grupos", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->grupos);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['grupos'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- codigo_banco
   function ajax_return_values_codigo_banco($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("codigo_banco", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->codigo_banco);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['codigo_banco'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- tipo_cuenta_banco
   function ajax_return_values_tipo_cuenta_banco($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("tipo_cuenta_banco", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->tipo_cuenta_banco);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['tipo_cuenta_banco'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- nro_cuenta_banco
   function ajax_return_values_nro_cuenta_banco($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("nro_cuenta_banco", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->nro_cuenta_banco);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['nro_cuenta_banco'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- pago_transferencia
   function ajax_return_values_pago_transferencia($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("pago_transferencia", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->pago_transferencia);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['pago_transferencia'] = array(
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
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['upload_dir'][$fieldName]))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['upload_dir'][$fieldName] = array();
            $resDir = @opendir($uploadDir);
            if (!$resDir)
            {
                return $originalName;
            }
            while (false !== ($fileName = @readdir($resDir)))
            {
                if (@is_file($uploadDir . $fileName))
                {
                    $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['upload_dir'][$fieldName][] = $fileName;
                }
            }
            @closedir($resDir);
        }
        if (!in_array($originalName, $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['upload_dir'][$fieldName]))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['upload_dir'][$fieldName][] = $originalName;
            return $originalName;
        }
        else
        {
            $newName = $this->fetchFileNextName($originalName, $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['upload_dir'][$fieldName]);
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['upload_dir'][$fieldName][] = $newName;
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
      $this->desctocte01 = str_replace($sc_parm1, $sc_parm2, $this->desctocte01); 
      $this->limcred01 = str_replace($sc_parm1, $sc_parm2, $this->limcred01); 
      $this->sdoeje01 = str_replace($sc_parm1, $sc_parm2, $this->sdoeje01); 
      $this->sdoant01 = str_replace($sc_parm1, $sc_parm2, $this->sdoant01); 
      $this->sdoact01 = str_replace($sc_parm1, $sc_parm2, $this->sdoact01); 
      $this->acudbm01 = str_replace($sc_parm1, $sc_parm2, $this->acudbm01); 
      $this->acucrm01 = str_replace($sc_parm1, $sc_parm2, $this->acucrm01); 
      $this->acudbe01 = str_replace($sc_parm1, $sc_parm2, $this->acudbe01); 
      $this->acucre01 = str_replace($sc_parm1, $sc_parm2, $this->acucre01); 
      $this->totexceso01 = str_replace($sc_parm1, $sc_parm2, $this->totexceso01); 
   } 
   function nm_poe_aspas_decimal() 
   { 
      $this->desctocte01 = "'" . $this->desctocte01 . "'";
      $this->limcred01 = "'" . $this->limcred01 . "'";
      $this->sdoeje01 = "'" . $this->sdoeje01 . "'";
      $this->sdoant01 = "'" . $this->sdoant01 . "'";
      $this->sdoact01 = "'" . $this->sdoact01 . "'";
      $this->acudbm01 = "'" . $this->acudbm01 . "'";
      $this->acucrm01 = "'" . $this->acucrm01 . "'";
      $this->acudbe01 = "'" . $this->acudbe01 . "'";
      $this->acucre01 = "'" . $this->acucre01 . "'";
      $this->totexceso01 = "'" . $this->totexceso01 . "'";
   } 
   function nm_tira_aspas_decimal() 
   { 
      $this->desctocte01 = str_replace("'", "", $this->desctocte01); 
      $this->limcred01 = str_replace("'", "", $this->limcred01); 
      $this->sdoeje01 = str_replace("'", "", $this->sdoeje01); 
      $this->sdoant01 = str_replace("'", "", $this->sdoant01); 
      $this->sdoact01 = str_replace("'", "", $this->sdoact01); 
      $this->acudbm01 = str_replace("'", "", $this->acudbm01); 
      $this->acucrm01 = str_replace("'", "", $this->acucrm01); 
      $this->acudbe01 = str_replace("'", "", $this->acudbe01); 
      $this->acucre01 = str_replace("'", "", $this->acucre01); 
      $this->totexceso01 = str_replace("'", "", $this->totexceso01); 
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
      $NM_val_form['codcte01'] = $this->codcte01;
      $NM_val_form['nomcte01'] = $this->nomcte01;
      $NM_val_form['cv1cte01'] = $this->cv1cte01;
      $NM_val_form['cv2cte01'] = $this->cv2cte01;
      $NM_val_form['tipcte01'] = $this->tipcte01;
      $NM_val_form['ofienccte01'] = $this->ofienccte01;
      $NM_val_form['vendcte01'] = $this->vendcte01;
      $NM_val_form['cobrcte01'] = $this->cobrcte01;
      $NM_val_form['loccte01'] = $this->loccte01;
      $NM_val_form['dircte01'] = $this->dircte01;
      $NM_val_form['telcte01'] = $this->telcte01;
      $NM_val_form['cascte01'] = $this->cascte01;
      $NM_val_form['fecing01'] = $this->fecing01;
      $NM_val_form['condpag01'] = $this->condpag01;
      $NM_val_form['desctocte01'] = $this->desctocte01;
      $NM_val_form['limcred01'] = $this->limcred01;
      $NM_val_form['desppar01'] = $this->desppar01;
      $NM_val_form['cheqpro01'] = $this->cheqpro01;
      $NM_val_form['sdoeje01'] = $this->sdoeje01;
      $NM_val_form['sdoant01'] = $this->sdoant01;
      $NM_val_form['sdoact01'] = $this->sdoact01;
      $NM_val_form['acudbm01'] = $this->acudbm01;
      $NM_val_form['acucrm01'] = $this->acucrm01;
      $NM_val_form['acudbe01'] = $this->acudbe01;
      $NM_val_form['acucre01'] = $this->acucre01;
      $NM_val_form['comentcte01'] = $this->comentcte01;
      $NM_val_form['statuscte01'] = $this->statuscte01;
      $NM_val_form['identcte01'] = $this->identcte01;
      $NM_val_form['cordcte01'] = $this->cordcte01;
      $NM_val_form['limcant01'] = $this->limcant01;
      $NM_val_form['pagleg01'] = $this->pagleg01;
      $NM_val_form['telcte01b'] = $this->telcte01b;
      $NM_val_form['telcte01c'] = $this->telcte01c;
      $NM_val_form['emailcte01'] = $this->emailcte01;
      $NM_val_form['ctacgcte01'] = $this->ctacgcte01;
      $NM_val_form['obsercte01'] = $this->obsercte01;
      $NM_val_form['totexceso01'] = $this->totexceso01;
      $NM_val_form['imagencte01'] = $this->imagencte01;
      $NM_val_form['block'] = $this->block;
      $NM_val_form['uid'] = $this->uid;
      $NM_val_form['ultimoacceso'] = $this->ultimoacceso;
      $NM_val_form['idcli'] = $this->idcli;
      $NM_val_form['catcte01'] = $this->catcte01;
      $NM_val_form['numautosri01'] = $this->numautosri01;
      $NM_val_form['seriedoc01'] = $this->seriedoc01;
      $NM_val_form['fecvencdoc01'] = $this->fecvencdoc01;
      $NM_val_form['repleg01'] = $this->repleg01;
      $NM_val_form['coddest01'] = $this->coddest01;
      $NM_val_form['longitud01'] = $this->longitud01;
      $NM_val_form['latitud01'] = $this->latitud01;
      $NM_val_form['zoom01'] = $this->zoom01;
      $NM_val_form['coniva01'] = $this->coniva01;
      $NM_val_form['conret01'] = $this->conret01;
      $NM_val_form['tipo_identificacion'] = $this->tipo_identificacion;
      $NM_val_form['es_padre'] = $this->es_padre;
      $NM_val_form['bonos'] = $this->bonos;
      $NM_val_form['rendimiento'] = $this->rendimiento;
      $NM_val_form['parterel01'] = $this->parterel01;
      $NM_val_form['clase_contribuyente'] = $this->clase_contribuyente;
      $NM_val_form['tipo_contribuyente'] = $this->tipo_contribuyente;
      $NM_val_form['lleva_contabilidad'] = $this->lleva_contabilidad;
      $NM_val_form['ctacgant01'] = $this->ctacgant01;
      $NM_val_form['residentefiscal01'] = $this->residentefiscal01;
      $NM_val_form['es_cliente'] = $this->es_cliente;
      $NM_val_form['grupos'] = $this->grupos;
      $NM_val_form['codigo_banco'] = $this->codigo_banco;
      $NM_val_form['tipo_cuenta_banco'] = $this->tipo_cuenta_banco;
      $NM_val_form['nro_cuenta_banco'] = $this->nro_cuenta_banco;
      $NM_val_form['pago_transferencia'] = $this->pago_transferencia;
      if ($this->nmgp_opcao == "alterar")
      {
      }
      if ($this->nmgp_opcao == "alterar")
      {
      }
      if ($this->nmgp_opcao == "alterar")
      {
      if ($this->desctocte01 === "" || is_null($this->desctocte01))  
      { 
          $this->desctocte01 = 0;
          $this->sc_force_zero[] = 'desctocte01';
      } 
      }
      if ($this->nmgp_opcao == "alterar")
      {
      if ($this->limcred01 === "" || is_null($this->limcred01))  
      { 
          $this->limcred01 = 0;
          $this->sc_force_zero[] = 'limcred01';
      } 
      }
      if ($this->nmgp_opcao == "alterar")
      {
      }
      if ($this->cheqpro01 === "" || is_null($this->cheqpro01))  
      { 
          $this->cheqpro01 = 0;
          $this->sc_force_zero[] = 'cheqpro01';
      } 
      if ($this->nmgp_opcao == "alterar")
      {
      if ($this->sdoeje01 === "" || is_null($this->sdoeje01))  
      { 
          $this->sdoeje01 = 0;
          $this->sc_force_zero[] = 'sdoeje01';
      } 
      }
      if ($this->nmgp_opcao == "alterar")
      {
      if ($this->sdoant01 === "" || is_null($this->sdoant01))  
      { 
          $this->sdoant01 = 0;
          $this->sc_force_zero[] = 'sdoant01';
      } 
      }
      if ($this->nmgp_opcao == "alterar")
      {
      if ($this->sdoact01 === "" || is_null($this->sdoact01))  
      { 
          $this->sdoact01 = 0;
          $this->sc_force_zero[] = 'sdoact01';
      } 
      }
      if ($this->nmgp_opcao == "alterar")
      {
      if ($this->acudbm01 === "" || is_null($this->acudbm01))  
      { 
          $this->acudbm01 = 0;
          $this->sc_force_zero[] = 'acudbm01';
      } 
      }
      if ($this->nmgp_opcao == "alterar")
      {
      if ($this->acucrm01 === "" || is_null($this->acucrm01))  
      { 
          $this->acucrm01 = 0;
          $this->sc_force_zero[] = 'acucrm01';
      } 
      }
      if ($this->nmgp_opcao == "alterar")
      {
      if ($this->acudbe01 === "" || is_null($this->acudbe01))  
      { 
          $this->acudbe01 = 0;
          $this->sc_force_zero[] = 'acudbe01';
      } 
      }
      if ($this->nmgp_opcao == "alterar")
      {
      if ($this->acucre01 === "" || is_null($this->acucre01))  
      { 
          $this->acucre01 = 0;
          $this->sc_force_zero[] = 'acucre01';
      } 
      }
      if ($this->statuscte01 === "" || is_null($this->statuscte01))  
      { 
          $this->statuscte01 = 0;
          $this->sc_force_zero[] = 'statuscte01';
      } 
      if ($this->limcant01 === "" || is_null($this->limcant01))  
      { 
          $this->limcant01 = 0;
          $this->sc_force_zero[] = 'limcant01';
      } 
      if ($this->nmgp_opcao == "alterar")
      {
      if ($this->totexceso01 === "" || is_null($this->totexceso01))  
      { 
          $this->totexceso01 = 0;
          $this->sc_force_zero[] = 'totexceso01';
      } 
      }
      if ($this->block === "" || is_null($this->block))  
      { 
          $this->block = 0;
          $this->sc_force_zero[] = 'block';
      } 
      if ($this->uid === "" || is_null($this->uid))  
      { 
          $this->uid = 0;
          $this->sc_force_zero[] = 'uid';
      } 
      if ($this->ultimoacceso === "" || is_null($this->ultimoacceso))  
      { 
          $this->ultimoacceso = 0;
          $this->sc_force_zero[] = 'ultimoacceso';
      } 
      if ($this->idcli === "" || is_null($this->idcli))  
      { 
          $this->idcli = 0;
      } 
      if ($this->zoom01 === "" || is_null($this->zoom01))  
      { 
          $this->zoom01 = 0;
          $this->sc_force_zero[] = 'zoom01';
      } 
      if ($this->nmgp_opcao == "alterar")
      {
      }
      if ($this->nmgp_opcao == "alterar")
      {
      }
      if ($this->es_padre === "" || is_null($this->es_padre))  
      { 
          $this->es_padre = 0;
          $this->sc_force_zero[] = 'es_padre';
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
      if ($this->nmgp_opcao == "alterar")
      {
      }
      $nm_bases_lob_geral = array_merge($this->Ini->nm_bases_oracle, $this->Ini->nm_bases_ibase, $this->Ini->nm_bases_informix, $this->Ini->nm_bases_mysql, $this->Ini->nm_bases_access, $this->Ini->nm_bases_sqlite, array('pdo_ibm'), array('pdo_sqlsrv'));
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['decimal_db'] == ",") 
      {
          $this->nm_troca_decimal(".", ",");
      }
      if ($this->nmgp_opcao == "alterar" || $this->nmgp_opcao == "incluir") 
      {
          $this->codcte01_before_qstr = $this->codcte01;
          $this->codcte01 = substr($this->Db->qstr($this->codcte01), 1, -1); 
          if ($this->codcte01 == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->codcte01 = "null"; 
              $NM_val_null[] = "codcte01";
          } 
          $this->nomcte01_before_qstr = $this->nomcte01;
          $this->nomcte01 = substr($this->Db->qstr($this->nomcte01), 1, -1); 
          if ($this->nomcte01 == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->nomcte01 = "null"; 
              $NM_val_null[] = "nomcte01";
          } 
          $this->cv1cte01_before_qstr = $this->cv1cte01;
          $this->cv1cte01 = substr($this->Db->qstr($this->cv1cte01), 1, -1); 
          if ($this->nmgp_opcao == "alterar") 
          {
              if ($this->cv1cte01 == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
              { 
                  $this->cv1cte01 = "null"; 
                  $NM_val_null[] = "cv1cte01";
              } 
          }
          $this->cv2cte01_before_qstr = $this->cv2cte01;
          $this->cv2cte01 = substr($this->Db->qstr($this->cv2cte01), 1, -1); 
          if ($this->nmgp_opcao == "alterar") 
          {
              if ($this->cv2cte01 == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
              { 
                  $this->cv2cte01 = "null"; 
                  $NM_val_null[] = "cv2cte01";
              } 
          }
          $this->tipcte01_before_qstr = $this->tipcte01;
          $this->tipcte01 = substr($this->Db->qstr($this->tipcte01), 1, -1); 
          if ($this->tipcte01 == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->tipcte01 = "null"; 
              $NM_val_null[] = "tipcte01";
          } 
          $this->ofienccte01_before_qstr = $this->ofienccte01;
          $this->ofienccte01 = substr($this->Db->qstr($this->ofienccte01), 1, -1); 
          if ($this->ofienccte01 == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->ofienccte01 = "null"; 
              $NM_val_null[] = "ofienccte01";
          } 
          $this->vendcte01_before_qstr = $this->vendcte01;
          $this->vendcte01 = substr($this->Db->qstr($this->vendcte01), 1, -1); 
          if ($this->vendcte01 == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->vendcte01 = "null"; 
              $NM_val_null[] = "vendcte01";
          } 
          $this->cobrcte01_before_qstr = $this->cobrcte01;
          $this->cobrcte01 = substr($this->Db->qstr($this->cobrcte01), 1, -1); 
          if ($this->cobrcte01 == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->cobrcte01 = "null"; 
              $NM_val_null[] = "cobrcte01";
          } 
          $this->loccte01_before_qstr = $this->loccte01;
          $this->loccte01 = substr($this->Db->qstr($this->loccte01), 1, -1); 
          if ($this->loccte01 == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->loccte01 = "null"; 
              $NM_val_null[] = "loccte01";
          } 
          $this->dircte01_before_qstr = $this->dircte01;
          $this->dircte01 = substr($this->Db->qstr($this->dircte01), 1, -1); 
          if ($this->dircte01 == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->dircte01 = "null"; 
              $NM_val_null[] = "dircte01";
          } 
          $this->telcte01_before_qstr = $this->telcte01;
          $this->telcte01 = substr($this->Db->qstr($this->telcte01), 1, -1); 
          if ($this->telcte01 == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->telcte01 = "null"; 
              $NM_val_null[] = "telcte01";
          } 
          $this->cascte01_before_qstr = $this->cascte01;
          $this->cascte01 = substr($this->Db->qstr($this->cascte01), 1, -1); 
          if ($this->cascte01 == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->cascte01 = "null"; 
              $NM_val_null[] = "cascte01";
          } 
          if ($this->fecing01 == "")  
          { 
              $this->fecing01 = "null"; 
              $NM_val_null[] = "fecing01";
          } 
          $this->condpag01_before_qstr = $this->condpag01;
          $this->condpag01 = substr($this->Db->qstr($this->condpag01), 1, -1); 
          if ($this->condpag01 == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->condpag01 = "null"; 
              $NM_val_null[] = "condpag01";
          } 
          if ($this->nmgp_opcao == "alterar") 
          {
          }
          if ($this->nmgp_opcao == "alterar") 
          {
          }
          $this->desppar01_before_qstr = $this->desppar01;
          $this->desppar01 = substr($this->Db->qstr($this->desppar01), 1, -1); 
          if ($this->nmgp_opcao == "alterar") 
          {
              if ($this->desppar01 == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
              { 
                  $this->desppar01 = "null"; 
                  $NM_val_null[] = "desppar01";
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
          $this->comentcte01_before_qstr = $this->comentcte01;
          $this->comentcte01 = substr($this->Db->qstr($this->comentcte01), 1, -1); 
          if ($this->comentcte01 == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->comentcte01 = "null"; 
              $NM_val_null[] = "comentcte01";
          } 
          $this->identcte01_before_qstr = $this->identcte01;
          $this->identcte01 = substr($this->Db->qstr($this->identcte01), 1, -1); 
          if ($this->identcte01 == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->identcte01 = "null"; 
              $NM_val_null[] = "identcte01";
          } 
          $this->cordcte01_before_qstr = $this->cordcte01;
          $this->cordcte01 = substr($this->Db->qstr($this->cordcte01), 1, -1); 
          if ($this->cordcte01 == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->cordcte01 = "null"; 
              $NM_val_null[] = "cordcte01";
          } 
          $this->pagleg01_before_qstr = $this->pagleg01;
          $this->pagleg01 = substr($this->Db->qstr($this->pagleg01), 1, -1); 
          if ($this->pagleg01 == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->pagleg01 = "null"; 
              $NM_val_null[] = "pagleg01";
          } 
          $this->telcte01b_before_qstr = $this->telcte01b;
          $this->telcte01b = substr($this->Db->qstr($this->telcte01b), 1, -1); 
          if ($this->telcte01b == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->telcte01b = "null"; 
              $NM_val_null[] = "telcte01b";
          } 
          $this->telcte01c_before_qstr = $this->telcte01c;
          $this->telcte01c = substr($this->Db->qstr($this->telcte01c), 1, -1); 
          if ($this->telcte01c == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->telcte01c = "null"; 
              $NM_val_null[] = "telcte01c";
          } 
          $this->emailcte01_before_qstr = $this->emailcte01;
          $this->emailcte01 = substr($this->Db->qstr($this->emailcte01), 1, -1); 
          if ($this->emailcte01 == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->emailcte01 = "null"; 
              $NM_val_null[] = "emailcte01";
          } 
          $this->ctacgcte01_before_qstr = $this->ctacgcte01;
          $this->ctacgcte01 = substr($this->Db->qstr($this->ctacgcte01), 1, -1); 
          if ($this->ctacgcte01 == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->ctacgcte01 = "null"; 
              $NM_val_null[] = "ctacgcte01";
          } 
          $this->obsercte01_before_qstr = $this->obsercte01;
          $this->obsercte01 = substr($this->Db->qstr($this->obsercte01), 1, -1); 
          if ($this->obsercte01 == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->obsercte01 = "null"; 
              $NM_val_null[] = "obsercte01";
          } 
          if ($this->nmgp_opcao == "alterar") 
          {
          }
          $this->imagencte01_before_qstr = $this->imagencte01;
          $this->imagencte01 = substr($this->Db->qstr($this->imagencte01), 1, -1); 
          if ($this->imagencte01 == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->imagencte01 = "null"; 
              $NM_val_null[] = "imagencte01";
          } 
          $this->catcte01_before_qstr = $this->catcte01;
          $this->catcte01 = substr($this->Db->qstr($this->catcte01), 1, -1); 
          if ($this->catcte01 == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->catcte01 = "null"; 
              $NM_val_null[] = "catcte01";
          } 
          $this->numautosri01_before_qstr = $this->numautosri01;
          $this->numautosri01 = substr($this->Db->qstr($this->numautosri01), 1, -1); 
          if ($this->numautosri01 == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->numautosri01 = "null"; 
              $NM_val_null[] = "numautosri01";
          } 
          $this->seriedoc01_before_qstr = $this->seriedoc01;
          $this->seriedoc01 = substr($this->Db->qstr($this->seriedoc01), 1, -1); 
          if ($this->seriedoc01 == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->seriedoc01 = "null"; 
              $NM_val_null[] = "seriedoc01";
          } 
          if ($this->fecvencdoc01 == "")  
          { 
              $this->fecvencdoc01 = "null"; 
              $NM_val_null[] = "fecvencdoc01";
          } 
          $this->repleg01_before_qstr = $this->repleg01;
          $this->repleg01 = substr($this->Db->qstr($this->repleg01), 1, -1); 
          if ($this->repleg01 == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->repleg01 = "null"; 
              $NM_val_null[] = "repleg01";
          } 
          $this->coddest01_before_qstr = $this->coddest01;
          $this->coddest01 = substr($this->Db->qstr($this->coddest01), 1, -1); 
          if ($this->coddest01 == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->coddest01 = "null"; 
              $NM_val_null[] = "coddest01";
          } 
          $this->longitud01_before_qstr = $this->longitud01;
          $this->longitud01 = substr($this->Db->qstr($this->longitud01), 1, -1); 
          if ($this->longitud01 == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->longitud01 = "null"; 
              $NM_val_null[] = "longitud01";
          } 
          $this->latitud01_before_qstr = $this->latitud01;
          $this->latitud01 = substr($this->Db->qstr($this->latitud01), 1, -1); 
          if ($this->latitud01 == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->latitud01 = "null"; 
              $NM_val_null[] = "latitud01";
          } 
          $this->coniva01_before_qstr = $this->coniva01;
          $this->coniva01 = substr($this->Db->qstr($this->coniva01), 1, -1); 
          if ($this->nmgp_opcao == "alterar") 
          {
              if ($this->coniva01 == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
              { 
                  $this->coniva01 = "null"; 
                  $NM_val_null[] = "coniva01";
              } 
          }
          $this->conret01_before_qstr = $this->conret01;
          $this->conret01 = substr($this->Db->qstr($this->conret01), 1, -1); 
          if ($this->nmgp_opcao == "alterar") 
          {
              if ($this->conret01 == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
              { 
                  $this->conret01 = "null"; 
                  $NM_val_null[] = "conret01";
              } 
          }
          $this->tipo_identificacion_before_qstr = $this->tipo_identificacion;
          $this->tipo_identificacion = substr($this->Db->qstr($this->tipo_identificacion), 1, -1); 
          if ($this->tipo_identificacion == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->tipo_identificacion = "null"; 
              $NM_val_null[] = "tipo_identificacion";
          } 
          $this->bonos_before_qstr = $this->bonos;
          $this->bonos = substr($this->Db->qstr($this->bonos), 1, -1); 
          if ($this->nmgp_opcao == "alterar") 
          {
              if ($this->bonos == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
              { 
                  $this->bonos = "null"; 
                  $NM_val_null[] = "bonos";
              } 
          }
          $this->rendimiento_before_qstr = $this->rendimiento;
          $this->rendimiento = substr($this->Db->qstr($this->rendimiento), 1, -1); 
          if ($this->nmgp_opcao == "alterar") 
          {
              if ($this->rendimiento == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
              { 
                  $this->rendimiento = "null"; 
                  $NM_val_null[] = "rendimiento";
              } 
          }
          $this->parterel01_before_qstr = $this->parterel01;
          $this->parterel01 = substr($this->Db->qstr($this->parterel01), 1, -1); 
          if ($this->nmgp_opcao == "alterar") 
          {
              if ($this->parterel01 == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
              { 
                  $this->parterel01 = "null"; 
                  $NM_val_null[] = "parterel01";
              } 
          }
          $this->clase_contribuyente_before_qstr = $this->clase_contribuyente;
          $this->clase_contribuyente = substr($this->Db->qstr($this->clase_contribuyente), 1, -1); 
          if ($this->clase_contribuyente == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->clase_contribuyente = "null"; 
              $NM_val_null[] = "clase_contribuyente";
          } 
          $this->tipo_contribuyente_before_qstr = $this->tipo_contribuyente;
          $this->tipo_contribuyente = substr($this->Db->qstr($this->tipo_contribuyente), 1, -1); 
          if ($this->tipo_contribuyente == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->tipo_contribuyente = "null"; 
              $NM_val_null[] = "tipo_contribuyente";
          } 
          $this->lleva_contabilidad_before_qstr = $this->lleva_contabilidad;
          $this->lleva_contabilidad = substr($this->Db->qstr($this->lleva_contabilidad), 1, -1); 
          if ($this->lleva_contabilidad == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->lleva_contabilidad = "null"; 
              $NM_val_null[] = "lleva_contabilidad";
          } 
          $this->ctacgant01_before_qstr = $this->ctacgant01;
          $this->ctacgant01 = substr($this->Db->qstr($this->ctacgant01), 1, -1); 
          if ($this->ctacgant01 == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->ctacgant01 = "null"; 
              $NM_val_null[] = "ctacgant01";
          } 
          $this->residentefiscal01_before_qstr = $this->residentefiscal01;
          $this->residentefiscal01 = substr($this->Db->qstr($this->residentefiscal01), 1, -1); 
          if ($this->nmgp_opcao == "alterar") 
          {
              if ($this->residentefiscal01 == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
              { 
                  $this->residentefiscal01 = "null"; 
                  $NM_val_null[] = "residentefiscal01";
              } 
          }
          $this->es_cliente_before_qstr = $this->es_cliente;
          $this->es_cliente = substr($this->Db->qstr($this->es_cliente), 1, -1); 
          if ($this->nmgp_opcao == "alterar") 
          {
              if ($this->es_cliente == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
              { 
                  $this->es_cliente = "null"; 
                  $NM_val_null[] = "es_cliente";
              } 
          }
          $this->grupos_before_qstr = $this->grupos;
          $this->grupos = substr($this->Db->qstr($this->grupos), 1, -1); 
          if ($this->nmgp_opcao == "alterar") 
          {
              if ($this->grupos == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
              { 
                  $this->grupos = "null"; 
                  $NM_val_null[] = "grupos";
              } 
          }
          $this->codigo_banco_before_qstr = $this->codigo_banco;
          $this->codigo_banco = substr($this->Db->qstr($this->codigo_banco), 1, -1); 
          if ($this->codigo_banco == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->codigo_banco = "null"; 
              $NM_val_null[] = "codigo_banco";
          } 
          $this->tipo_cuenta_banco_before_qstr = $this->tipo_cuenta_banco;
          $this->tipo_cuenta_banco = substr($this->Db->qstr($this->tipo_cuenta_banco), 1, -1); 
          if ($this->tipo_cuenta_banco == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->tipo_cuenta_banco = "null"; 
              $NM_val_null[] = "tipo_cuenta_banco";
          } 
          $this->nro_cuenta_banco_before_qstr = $this->nro_cuenta_banco;
          $this->nro_cuenta_banco = substr($this->Db->qstr($this->nro_cuenta_banco), 1, -1); 
          if ($this->nro_cuenta_banco == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->nro_cuenta_banco = "null"; 
              $NM_val_null[] = "nro_cuenta_banco";
          } 
          $this->pago_transferencia_before_qstr = $this->pago_transferencia;
          $this->pago_transferencia = substr($this->Db->qstr($this->pago_transferencia), 1, -1); 
          if ($this->nmgp_opcao == "alterar") 
          {
              if ($this->pago_transferencia == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
              { 
                  $this->pago_transferencia = "null"; 
                  $NM_val_null[] = "pago_transferencia";
              } 
          }
      }
      if ($this->nmgp_opcao == "alterar") 
      {
          $SC_fields_update = array(); 
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['foreign_key'] as $sFKName => $sFKValue)
              {
                   if (isset($this->sc_conv_var[$sFKName]))
                   {
                       $sFKName = $this->sc_conv_var[$sFKName];
                   }
                  eval("\$this->" . $sFKName . " = \"" . $sFKValue . "\";");
              }
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['decimal_db'] == ",") 
          {
              $this->nm_poe_aspas_decimal();
          }
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idcli = $this->idcli ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idcli = $this->idcli "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idcli = $this->idcli ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idcli = $this->idcli "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idcli = $this->idcli ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idcli = $this->idcli "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idcli = $this->idcli ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idcli = $this->idcli "); 
          }  
          else  
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idcli = $this->idcli ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idcli = $this->idcli "); 
          }  
          if ($rs1 === false)  
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
              if ($this->NM_ajax_flag)
              {
                 form_maepag_pack_ajax_response();
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
              $Cmd_Unique = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where (codcte01 = '" . $this->codcte01 . "') AND (idcli <> $this->idcli)";
              $Cmd_Unique = str_replace("'null'", "null", $Cmd_Unique) ; 
              $Cmd_Unique = str_replace("#null#", "null", $Cmd_Unique) ; 
              $Cmd_Unique = str_replace($this->Ini->date_delim . "null" . $this->Ini->date_delim1, "null", $Cmd_Unique) ; 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = $Cmd_Unique;
              $rsUni = $this->Db->Execute($Cmd_Unique);
              if (false === $rsUni)
              {
                  $dbErrorMessage = $this->Db->ErrorMsg();
                  $dbErrorCode = $this->Db->ErrorNo();
                  $this->handleDbErrorMessage($dbErrorMessage, $dbErrorCode);
                  $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_updt'], $dbErrorMessage, true);
                  if (isset($_SESSION['scriptcase']['erro_handler']) && $_SESSION['scriptcase']['erro_handler']) {
                      $this->sc_erro_update = $dbErrorMessage;
                      $this->NM_rollback_db();
                      if ($this->NM_ajax_flag) {
                          form_maepag_pack_ajax_response();
                      }
                      exit;
                  }
              }
              elseif (0 < $rsUni->fields[0])
              {
                  $this->Erro->mensagem (__FILE__, __LINE__, "critica", $this->Ini->Nm_lang['lang_errm_ukey'] . " Codcte 01"); 
                  $this->nmgp_opcao = "nada"; 
                  $aUpdateOk[] = 'codcte01';
                  $rsUni->Close();
              }
              else
              {
                  $rsUni->Close();
              }
          $bUpdateOk = $bUpdateOk && empty($aUpdateOk);
          if ($bUpdateOk)
          { 
              $rs1->Close(); 
              $aDoNotUpdate = array();
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "codcte01 = '$this->codcte01', nomcte01 = '$this->nomcte01', cv1cte01 = '$this->cv1cte01', cv2cte01 = '$this->cv2cte01', tipcte01 = '$this->tipcte01', ofienccte01 = '$this->ofienccte01', vendcte01 = '$this->vendcte01', cobrcte01 = '$this->cobrcte01', loccte01 = '$this->loccte01', dircte01 = '$this->dircte01', telcte01 = '$this->telcte01', cascte01 = '$this->cascte01', fecing01 = #$this->fecing01#, condpag01 = '$this->condpag01', desctocte01 = $this->desctocte01, limcred01 = $this->limcred01, desppar01 = '$this->desppar01', cheqpro01 = $this->cheqpro01, sdoeje01 = $this->sdoeje01, sdoant01 = $this->sdoant01, sdoact01 = $this->sdoact01, acudbm01 = $this->acudbm01, acucrm01 = $this->acucrm01, acudbe01 = $this->acudbe01, acucre01 = $this->acucre01, comentcte01 = '$this->comentcte01', statuscte01 = $this->statuscte01, identcte01 = '$this->identcte01', cordcte01 = '$this->cordcte01', limcant01 = $this->limcant01, pagleg01 = '$this->pagleg01', telcte01b = '$this->telcte01b', telcte01c = '$this->telcte01c', emailcte01 = '$this->emailcte01', ctacgcte01 = '$this->ctacgcte01', obsercte01 = '$this->obsercte01', totexceso01 = $this->totexceso01, imagencte01 = '$this->imagencte01', block = $this->block, UID = $this->uid, ultimoacceso = $this->ultimoacceso, catcte01 = '$this->catcte01', numautosri01 = '$this->numautosri01', seriedoc01 = '$this->seriedoc01', fecvencdoc01 = #$this->fecvencdoc01#, repleg01 = '$this->repleg01', coddest01 = '$this->coddest01', longitud01 = '$this->longitud01', latitud01 = '$this->latitud01', zoom01 = $this->zoom01, coniva01 = '$this->coniva01', conret01 = '$this->conret01', tipo_identificacion = '$this->tipo_identificacion', es_padre = $this->es_padre, bonos = '$this->bonos', rendimiento = '$this->rendimiento', parteRel01 = '$this->parterel01', clase_contribuyente = '$this->clase_contribuyente', tipo_contribuyente = '$this->tipo_contribuyente', lleva_contabilidad = '$this->lleva_contabilidad', ctacgant01 = '$this->ctacgant01', residenteFiscal01 = '$this->residentefiscal01', es_cliente = '$this->es_cliente', grupos = '$this->grupos', codigo_banco = '$this->codigo_banco', tipo_cuenta_banco = '$this->tipo_cuenta_banco', nro_cuenta_banco = '$this->nro_cuenta_banco', pago_transferencia = '$this->pago_transferencia'"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "codcte01 = '$this->codcte01', nomcte01 = '$this->nomcte01', cv1cte01 = '$this->cv1cte01', cv2cte01 = '$this->cv2cte01', tipcte01 = '$this->tipcte01', ofienccte01 = '$this->ofienccte01', vendcte01 = '$this->vendcte01', cobrcte01 = '$this->cobrcte01', loccte01 = '$this->loccte01', dircte01 = '$this->dircte01', telcte01 = '$this->telcte01', cascte01 = '$this->cascte01', fecing01 = " . $this->Ini->date_delim . $this->fecing01 . $this->Ini->date_delim1 . ", condpag01 = '$this->condpag01', desctocte01 = $this->desctocte01, limcred01 = $this->limcred01, desppar01 = '$this->desppar01', cheqpro01 = $this->cheqpro01, sdoeje01 = $this->sdoeje01, sdoant01 = $this->sdoant01, sdoact01 = $this->sdoact01, acudbm01 = $this->acudbm01, acucrm01 = $this->acucrm01, acudbe01 = $this->acudbe01, acucre01 = $this->acucre01, comentcte01 = '$this->comentcte01', statuscte01 = $this->statuscte01, identcte01 = '$this->identcte01', cordcte01 = '$this->cordcte01', limcant01 = $this->limcant01, pagleg01 = '$this->pagleg01', telcte01b = '$this->telcte01b', telcte01c = '$this->telcte01c', emailcte01 = '$this->emailcte01', ctacgcte01 = '$this->ctacgcte01', obsercte01 = '$this->obsercte01', totexceso01 = $this->totexceso01, imagencte01 = '$this->imagencte01', block = $this->block, UID = $this->uid, ultimoacceso = $this->ultimoacceso, catcte01 = '$this->catcte01', numautosri01 = '$this->numautosri01', seriedoc01 = '$this->seriedoc01', fecvencdoc01 = " . $this->Ini->date_delim . $this->fecvencdoc01 . $this->Ini->date_delim1 . ", repleg01 = '$this->repleg01', coddest01 = '$this->coddest01', longitud01 = '$this->longitud01', latitud01 = '$this->latitud01', zoom01 = $this->zoom01, coniva01 = '$this->coniva01', conret01 = '$this->conret01', tipo_identificacion = '$this->tipo_identificacion', es_padre = $this->es_padre, bonos = '$this->bonos', rendimiento = '$this->rendimiento', parteRel01 = '$this->parterel01', clase_contribuyente = '$this->clase_contribuyente', tipo_contribuyente = '$this->tipo_contribuyente', lleva_contabilidad = '$this->lleva_contabilidad', ctacgant01 = '$this->ctacgant01', residenteFiscal01 = '$this->residentefiscal01', es_cliente = '$this->es_cliente', grupos = '$this->grupos', codigo_banco = '$this->codigo_banco', tipo_cuenta_banco = '$this->tipo_cuenta_banco', nro_cuenta_banco = '$this->nro_cuenta_banco', pago_transferencia = '$this->pago_transferencia'"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "codcte01 = '$this->codcte01', nomcte01 = '$this->nomcte01', cv1cte01 = '$this->cv1cte01', cv2cte01 = '$this->cv2cte01', tipcte01 = '$this->tipcte01', ofienccte01 = '$this->ofienccte01', vendcte01 = '$this->vendcte01', cobrcte01 = '$this->cobrcte01', loccte01 = '$this->loccte01', dircte01 = '$this->dircte01', telcte01 = '$this->telcte01', cascte01 = '$this->cascte01', fecing01 = " . $this->Ini->date_delim . $this->fecing01 . $this->Ini->date_delim1 . ", condpag01 = '$this->condpag01', desctocte01 = $this->desctocte01, limcred01 = $this->limcred01, desppar01 = '$this->desppar01', cheqpro01 = $this->cheqpro01, sdoeje01 = $this->sdoeje01, sdoant01 = $this->sdoant01, sdoact01 = $this->sdoact01, acudbm01 = $this->acudbm01, acucrm01 = $this->acucrm01, acudbe01 = $this->acudbe01, acucre01 = $this->acucre01, comentcte01 = '$this->comentcte01', statuscte01 = $this->statuscte01, identcte01 = '$this->identcte01', cordcte01 = '$this->cordcte01', limcant01 = $this->limcant01, pagleg01 = '$this->pagleg01', telcte01b = '$this->telcte01b', telcte01c = '$this->telcte01c', emailcte01 = '$this->emailcte01', ctacgcte01 = '$this->ctacgcte01', obsercte01 = '$this->obsercte01', totexceso01 = $this->totexceso01, imagencte01 = '$this->imagencte01', block = $this->block, UID = $this->uid, ultimoacceso = $this->ultimoacceso, catcte01 = '$this->catcte01', numautosri01 = '$this->numautosri01', seriedoc01 = '$this->seriedoc01', fecvencdoc01 = " . $this->Ini->date_delim . $this->fecvencdoc01 . $this->Ini->date_delim1 . ", repleg01 = '$this->repleg01', coddest01 = '$this->coddest01', longitud01 = '$this->longitud01', latitud01 = '$this->latitud01', zoom01 = $this->zoom01, coniva01 = '$this->coniva01', conret01 = '$this->conret01', tipo_identificacion = '$this->tipo_identificacion', es_padre = $this->es_padre, bonos = '$this->bonos', rendimiento = '$this->rendimiento', parteRel01 = '$this->parterel01', clase_contribuyente = '$this->clase_contribuyente', tipo_contribuyente = '$this->tipo_contribuyente', lleva_contabilidad = '$this->lleva_contabilidad', ctacgant01 = '$this->ctacgant01', residenteFiscal01 = '$this->residentefiscal01', es_cliente = '$this->es_cliente', grupos = '$this->grupos', codigo_banco = '$this->codigo_banco', tipo_cuenta_banco = '$this->tipo_cuenta_banco', nro_cuenta_banco = '$this->nro_cuenta_banco', pago_transferencia = '$this->pago_transferencia'"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "codcte01 = '$this->codcte01', nomcte01 = '$this->nomcte01', cv1cte01 = '$this->cv1cte01', cv2cte01 = '$this->cv2cte01', tipcte01 = '$this->tipcte01', ofienccte01 = '$this->ofienccte01', vendcte01 = '$this->vendcte01', cobrcte01 = '$this->cobrcte01', loccte01 = '$this->loccte01', dircte01 = '$this->dircte01', telcte01 = '$this->telcte01', cascte01 = '$this->cascte01', fecing01 = EXTEND('$this->fecing01', YEAR TO FRACTION), condpag01 = '$this->condpag01', desctocte01 = $this->desctocte01, limcred01 = $this->limcred01, desppar01 = '$this->desppar01', cheqpro01 = $this->cheqpro01, sdoeje01 = $this->sdoeje01, sdoant01 = $this->sdoant01, sdoact01 = $this->sdoact01, acudbm01 = $this->acudbm01, acucrm01 = $this->acucrm01, acudbe01 = $this->acudbe01, acucre01 = $this->acucre01, comentcte01 = '$this->comentcte01', statuscte01 = $this->statuscte01, identcte01 = '$this->identcte01', cordcte01 = '$this->cordcte01', limcant01 = $this->limcant01, pagleg01 = '$this->pagleg01', telcte01b = '$this->telcte01b', telcte01c = '$this->telcte01c', emailcte01 = '$this->emailcte01', ctacgcte01 = '$this->ctacgcte01', obsercte01 = '$this->obsercte01', totexceso01 = $this->totexceso01, imagencte01 = '$this->imagencte01', block = $this->block, UID = $this->uid, ultimoacceso = $this->ultimoacceso, catcte01 = '$this->catcte01', numautosri01 = '$this->numautosri01', seriedoc01 = '$this->seriedoc01', fecvencdoc01 = EXTEND('$this->fecvencdoc01', YEAR TO DAY), repleg01 = '$this->repleg01', coddest01 = '$this->coddest01', longitud01 = '$this->longitud01', latitud01 = '$this->latitud01', zoom01 = $this->zoom01, coniva01 = '$this->coniva01', conret01 = '$this->conret01', tipo_identificacion = '$this->tipo_identificacion', es_padre = $this->es_padre, bonos = '$this->bonos', rendimiento = '$this->rendimiento', parteRel01 = '$this->parterel01', clase_contribuyente = '$this->clase_contribuyente', tipo_contribuyente = '$this->tipo_contribuyente', lleva_contabilidad = '$this->lleva_contabilidad', ctacgant01 = '$this->ctacgant01', residenteFiscal01 = '$this->residentefiscal01', es_cliente = '$this->es_cliente', grupos = '$this->grupos', codigo_banco = '$this->codigo_banco', tipo_cuenta_banco = '$this->tipo_cuenta_banco', nro_cuenta_banco = '$this->nro_cuenta_banco', pago_transferencia = '$this->pago_transferencia'"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "codcte01 = '$this->codcte01', nomcte01 = '$this->nomcte01', cv1cte01 = '$this->cv1cte01', cv2cte01 = '$this->cv2cte01', tipcte01 = '$this->tipcte01', ofienccte01 = '$this->ofienccte01', vendcte01 = '$this->vendcte01', cobrcte01 = '$this->cobrcte01', loccte01 = '$this->loccte01', dircte01 = '$this->dircte01', telcte01 = '$this->telcte01', cascte01 = '$this->cascte01', fecing01 = " . $this->Ini->date_delim . $this->fecing01 . $this->Ini->date_delim1 . ", condpag01 = '$this->condpag01', desctocte01 = $this->desctocte01, limcred01 = $this->limcred01, desppar01 = '$this->desppar01', cheqpro01 = $this->cheqpro01, sdoeje01 = $this->sdoeje01, sdoant01 = $this->sdoant01, sdoact01 = $this->sdoact01, acudbm01 = $this->acudbm01, acucrm01 = $this->acucrm01, acudbe01 = $this->acudbe01, acucre01 = $this->acucre01, comentcte01 = '$this->comentcte01', statuscte01 = $this->statuscte01, identcte01 = '$this->identcte01', cordcte01 = '$this->cordcte01', limcant01 = $this->limcant01, pagleg01 = '$this->pagleg01', telcte01b = '$this->telcte01b', telcte01c = '$this->telcte01c', emailcte01 = '$this->emailcte01', ctacgcte01 = '$this->ctacgcte01', obsercte01 = '$this->obsercte01', totexceso01 = $this->totexceso01, imagencte01 = '$this->imagencte01', block = $this->block, UID = $this->uid, ultimoacceso = $this->ultimoacceso, catcte01 = '$this->catcte01', numautosri01 = '$this->numautosri01', seriedoc01 = '$this->seriedoc01', fecvencdoc01 = " . $this->Ini->date_delim . $this->fecvencdoc01 . $this->Ini->date_delim1 . ", repleg01 = '$this->repleg01', coddest01 = '$this->coddest01', longitud01 = '$this->longitud01', latitud01 = '$this->latitud01', zoom01 = $this->zoom01, coniva01 = '$this->coniva01', conret01 = '$this->conret01', tipo_identificacion = '$this->tipo_identificacion', es_padre = $this->es_padre, bonos = '$this->bonos', rendimiento = '$this->rendimiento', parteRel01 = '$this->parterel01', clase_contribuyente = '$this->clase_contribuyente', tipo_contribuyente = '$this->tipo_contribuyente', lleva_contabilidad = '$this->lleva_contabilidad', ctacgant01 = '$this->ctacgant01', residenteFiscal01 = '$this->residentefiscal01', es_cliente = '$this->es_cliente', grupos = '$this->grupos', codigo_banco = '$this->codigo_banco', tipo_cuenta_banco = '$this->tipo_cuenta_banco', nro_cuenta_banco = '$this->nro_cuenta_banco', pago_transferencia = '$this->pago_transferencia'"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "codcte01 = '$this->codcte01', nomcte01 = '$this->nomcte01', cv1cte01 = '$this->cv1cte01', cv2cte01 = '$this->cv2cte01', tipcte01 = '$this->tipcte01', ofienccte01 = '$this->ofienccte01', vendcte01 = '$this->vendcte01', cobrcte01 = '$this->cobrcte01', loccte01 = '$this->loccte01', dircte01 = '$this->dircte01', telcte01 = '$this->telcte01', cascte01 = '$this->cascte01', fecing01 = " . $this->Ini->date_delim . $this->fecing01 . $this->Ini->date_delim1 . ", condpag01 = '$this->condpag01', desctocte01 = $this->desctocte01, limcred01 = $this->limcred01, desppar01 = '$this->desppar01', cheqpro01 = $this->cheqpro01, sdoeje01 = $this->sdoeje01, sdoant01 = $this->sdoant01, sdoact01 = $this->sdoact01, acudbm01 = $this->acudbm01, acucrm01 = $this->acucrm01, acudbe01 = $this->acudbe01, acucre01 = $this->acucre01, comentcte01 = '$this->comentcte01', statuscte01 = $this->statuscte01, identcte01 = '$this->identcte01', cordcte01 = '$this->cordcte01', limcant01 = $this->limcant01, pagleg01 = '$this->pagleg01', telcte01b = '$this->telcte01b', telcte01c = '$this->telcte01c', emailcte01 = '$this->emailcte01', ctacgcte01 = '$this->ctacgcte01', obsercte01 = '$this->obsercte01', totexceso01 = $this->totexceso01, imagencte01 = '$this->imagencte01', block = $this->block, UID = $this->uid, ultimoacceso = $this->ultimoacceso, catcte01 = '$this->catcte01', numautosri01 = '$this->numautosri01', seriedoc01 = '$this->seriedoc01', fecvencdoc01 = " . $this->Ini->date_delim . $this->fecvencdoc01 . $this->Ini->date_delim1 . ", repleg01 = '$this->repleg01', coddest01 = '$this->coddest01', longitud01 = '$this->longitud01', latitud01 = '$this->latitud01', zoom01 = $this->zoom01, coniva01 = '$this->coniva01', conret01 = '$this->conret01', tipo_identificacion = '$this->tipo_identificacion', es_padre = $this->es_padre, bonos = '$this->bonos', rendimiento = '$this->rendimiento', parteRel01 = '$this->parterel01', clase_contribuyente = '$this->clase_contribuyente', tipo_contribuyente = '$this->tipo_contribuyente', lleva_contabilidad = '$this->lleva_contabilidad', ctacgant01 = '$this->ctacgant01', residenteFiscal01 = '$this->residentefiscal01', es_cliente = '$this->es_cliente', grupos = '$this->grupos', codigo_banco = '$this->codigo_banco', tipo_cuenta_banco = '$this->tipo_cuenta_banco', nro_cuenta_banco = '$this->nro_cuenta_banco', pago_transferencia = '$this->pago_transferencia'"; 
              } 
              else 
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "codcte01 = '$this->codcte01', nomcte01 = '$this->nomcte01', cv1cte01 = '$this->cv1cte01', cv2cte01 = '$this->cv2cte01', tipcte01 = '$this->tipcte01', ofienccte01 = '$this->ofienccte01', vendcte01 = '$this->vendcte01', cobrcte01 = '$this->cobrcte01', loccte01 = '$this->loccte01', dircte01 = '$this->dircte01', telcte01 = '$this->telcte01', cascte01 = '$this->cascte01', fecing01 = " . $this->Ini->date_delim . $this->fecing01 . $this->Ini->date_delim1 . ", condpag01 = '$this->condpag01', desctocte01 = $this->desctocte01, limcred01 = $this->limcred01, desppar01 = '$this->desppar01', cheqpro01 = $this->cheqpro01, sdoeje01 = $this->sdoeje01, sdoant01 = $this->sdoant01, sdoact01 = $this->sdoact01, acudbm01 = $this->acudbm01, acucrm01 = $this->acucrm01, acudbe01 = $this->acudbe01, acucre01 = $this->acucre01, comentcte01 = '$this->comentcte01', statuscte01 = $this->statuscte01, identcte01 = '$this->identcte01', cordcte01 = '$this->cordcte01', limcant01 = $this->limcant01, pagleg01 = '$this->pagleg01', telcte01b = '$this->telcte01b', telcte01c = '$this->telcte01c', emailcte01 = '$this->emailcte01', ctacgcte01 = '$this->ctacgcte01', obsercte01 = '$this->obsercte01', totexceso01 = $this->totexceso01, imagencte01 = '$this->imagencte01', block = $this->block, UID = $this->uid, ultimoacceso = $this->ultimoacceso, catcte01 = '$this->catcte01', numautosri01 = '$this->numautosri01', seriedoc01 = '$this->seriedoc01', fecvencdoc01 = " . $this->Ini->date_delim . $this->fecvencdoc01 . $this->Ini->date_delim1 . ", repleg01 = '$this->repleg01', coddest01 = '$this->coddest01', longitud01 = '$this->longitud01', latitud01 = '$this->latitud01', zoom01 = $this->zoom01, coniva01 = '$this->coniva01', conret01 = '$this->conret01', tipo_identificacion = '$this->tipo_identificacion', es_padre = $this->es_padre, bonos = '$this->bonos', rendimiento = '$this->rendimiento', parteRel01 = '$this->parterel01', clase_contribuyente = '$this->clase_contribuyente', tipo_contribuyente = '$this->tipo_contribuyente', lleva_contabilidad = '$this->lleva_contabilidad', ctacgant01 = '$this->ctacgant01', residenteFiscal01 = '$this->residentefiscal01', es_cliente = '$this->es_cliente', grupos = '$this->grupos', codigo_banco = '$this->codigo_banco', tipo_cuenta_banco = '$this->tipo_cuenta_banco', nro_cuenta_banco = '$this->nro_cuenta_banco', pago_transferencia = '$this->pago_transferencia'"; 
              } 
              $comando .= implode(",", $SC_fields_update);  
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              {
                  $comando .= " WHERE idcli = $this->idcli ";  
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
                  $comando .= " WHERE idcli = $this->idcli ";  
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              {
                  $comando .= " WHERE idcli = $this->idcli ";  
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $comando .= " WHERE idcli = $this->idcli ";  
              }  
              else  
              {
                  $comando .= " WHERE idcli = $this->idcli ";  
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
                                  form_maepag_pack_ajax_response();
                              }
                              exit;  
                          }   
                      }   
                  }   
              }   
              $this->codcte01 = $this->codcte01_before_qstr;
              $this->nomcte01 = $this->nomcte01_before_qstr;
              $this->cv1cte01 = $this->cv1cte01_before_qstr;
              $this->cv2cte01 = $this->cv2cte01_before_qstr;
              $this->tipcte01 = $this->tipcte01_before_qstr;
              $this->ofienccte01 = $this->ofienccte01_before_qstr;
              $this->vendcte01 = $this->vendcte01_before_qstr;
              $this->cobrcte01 = $this->cobrcte01_before_qstr;
              $this->loccte01 = $this->loccte01_before_qstr;
              $this->dircte01 = $this->dircte01_before_qstr;
              $this->telcte01 = $this->telcte01_before_qstr;
              $this->cascte01 = $this->cascte01_before_qstr;
              $this->condpag01 = $this->condpag01_before_qstr;
              $this->desppar01 = $this->desppar01_before_qstr;
              $this->comentcte01 = $this->comentcte01_before_qstr;
              $this->identcte01 = $this->identcte01_before_qstr;
              $this->cordcte01 = $this->cordcte01_before_qstr;
              $this->pagleg01 = $this->pagleg01_before_qstr;
              $this->telcte01b = $this->telcte01b_before_qstr;
              $this->telcte01c = $this->telcte01c_before_qstr;
              $this->emailcte01 = $this->emailcte01_before_qstr;
              $this->ctacgcte01 = $this->ctacgcte01_before_qstr;
              $this->obsercte01 = $this->obsercte01_before_qstr;
              $this->imagencte01 = $this->imagencte01_before_qstr;
              $this->catcte01 = $this->catcte01_before_qstr;
              $this->numautosri01 = $this->numautosri01_before_qstr;
              $this->seriedoc01 = $this->seriedoc01_before_qstr;
              $this->repleg01 = $this->repleg01_before_qstr;
              $this->coddest01 = $this->coddest01_before_qstr;
              $this->longitud01 = $this->longitud01_before_qstr;
              $this->latitud01 = $this->latitud01_before_qstr;
              $this->coniva01 = $this->coniva01_before_qstr;
              $this->conret01 = $this->conret01_before_qstr;
              $this->tipo_identificacion = $this->tipo_identificacion_before_qstr;
              $this->bonos = $this->bonos_before_qstr;
              $this->rendimiento = $this->rendimiento_before_qstr;
              $this->parterel01 = $this->parterel01_before_qstr;
              $this->clase_contribuyente = $this->clase_contribuyente_before_qstr;
              $this->tipo_contribuyente = $this->tipo_contribuyente_before_qstr;
              $this->lleva_contabilidad = $this->lleva_contabilidad_before_qstr;
              $this->ctacgant01 = $this->ctacgant01_before_qstr;
              $this->residentefiscal01 = $this->residentefiscal01_before_qstr;
              $this->es_cliente = $this->es_cliente_before_qstr;
              $this->grupos = $this->grupos_before_qstr;
              $this->codigo_banco = $this->codigo_banco_before_qstr;
              $this->tipo_cuenta_banco = $this->tipo_cuenta_banco_before_qstr;
              $this->nro_cuenta_banco = $this->nro_cuenta_banco_before_qstr;
              $this->pago_transferencia = $this->pago_transferencia_before_qstr;
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

              $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['db_changed'] = true;
              if ($this->NM_ajax_flag) {
                  $this->NM_ajax_info['clearUpload'] = 'S';
              }


              if     (isset($NM_val_form) && isset($NM_val_form['codcte01'])) { $this->codcte01 = $NM_val_form['codcte01']; }
              elseif (isset($this->codcte01)) { $this->nm_limpa_alfa($this->codcte01); }
              if     (isset($NM_val_form) && isset($NM_val_form['nomcte01'])) { $this->nomcte01 = $NM_val_form['nomcte01']; }
              elseif (isset($this->nomcte01)) { $this->nm_limpa_alfa($this->nomcte01); }
              if     (isset($NM_val_form) && isset($NM_val_form['cv1cte01'])) { $this->cv1cte01 = $NM_val_form['cv1cte01']; }
              elseif (isset($this->cv1cte01)) { $this->nm_limpa_alfa($this->cv1cte01); }
              if     (isset($NM_val_form) && isset($NM_val_form['cv2cte01'])) { $this->cv2cte01 = $NM_val_form['cv2cte01']; }
              elseif (isset($this->cv2cte01)) { $this->nm_limpa_alfa($this->cv2cte01); }
              if     (isset($NM_val_form) && isset($NM_val_form['tipcte01'])) { $this->tipcte01 = $NM_val_form['tipcte01']; }
              elseif (isset($this->tipcte01)) { $this->nm_limpa_alfa($this->tipcte01); }
              if     (isset($NM_val_form) && isset($NM_val_form['ofienccte01'])) { $this->ofienccte01 = $NM_val_form['ofienccte01']; }
              elseif (isset($this->ofienccte01)) { $this->nm_limpa_alfa($this->ofienccte01); }
              if     (isset($NM_val_form) && isset($NM_val_form['vendcte01'])) { $this->vendcte01 = $NM_val_form['vendcte01']; }
              elseif (isset($this->vendcte01)) { $this->nm_limpa_alfa($this->vendcte01); }
              if     (isset($NM_val_form) && isset($NM_val_form['cobrcte01'])) { $this->cobrcte01 = $NM_val_form['cobrcte01']; }
              elseif (isset($this->cobrcte01)) { $this->nm_limpa_alfa($this->cobrcte01); }
              if     (isset($NM_val_form) && isset($NM_val_form['loccte01'])) { $this->loccte01 = $NM_val_form['loccte01']; }
              elseif (isset($this->loccte01)) { $this->nm_limpa_alfa($this->loccte01); }
              if     (isset($NM_val_form) && isset($NM_val_form['dircte01'])) { $this->dircte01 = $NM_val_form['dircte01']; }
              elseif (isset($this->dircte01)) { $this->nm_limpa_alfa($this->dircte01); }
              if     (isset($NM_val_form) && isset($NM_val_form['telcte01'])) { $this->telcte01 = $NM_val_form['telcte01']; }
              elseif (isset($this->telcte01)) { $this->nm_limpa_alfa($this->telcte01); }
              if     (isset($NM_val_form) && isset($NM_val_form['cascte01'])) { $this->cascte01 = $NM_val_form['cascte01']; }
              elseif (isset($this->cascte01)) { $this->nm_limpa_alfa($this->cascte01); }
              if     (isset($NM_val_form) && isset($NM_val_form['condpag01'])) { $this->condpag01 = $NM_val_form['condpag01']; }
              elseif (isset($this->condpag01)) { $this->nm_limpa_alfa($this->condpag01); }
              if     (isset($NM_val_form) && isset($NM_val_form['desctocte01'])) { $this->desctocte01 = $NM_val_form['desctocte01']; }
              elseif (isset($this->desctocte01)) { $this->nm_limpa_alfa($this->desctocte01); }
              if     (isset($NM_val_form) && isset($NM_val_form['limcred01'])) { $this->limcred01 = $NM_val_form['limcred01']; }
              elseif (isset($this->limcred01)) { $this->nm_limpa_alfa($this->limcred01); }
              if     (isset($NM_val_form) && isset($NM_val_form['desppar01'])) { $this->desppar01 = $NM_val_form['desppar01']; }
              elseif (isset($this->desppar01)) { $this->nm_limpa_alfa($this->desppar01); }
              if     (isset($NM_val_form) && isset($NM_val_form['cheqpro01'])) { $this->cheqpro01 = $NM_val_form['cheqpro01']; }
              elseif (isset($this->cheqpro01)) { $this->nm_limpa_alfa($this->cheqpro01); }
              if     (isset($NM_val_form) && isset($NM_val_form['sdoeje01'])) { $this->sdoeje01 = $NM_val_form['sdoeje01']; }
              elseif (isset($this->sdoeje01)) { $this->nm_limpa_alfa($this->sdoeje01); }
              if     (isset($NM_val_form) && isset($NM_val_form['sdoant01'])) { $this->sdoant01 = $NM_val_form['sdoant01']; }
              elseif (isset($this->sdoant01)) { $this->nm_limpa_alfa($this->sdoant01); }
              if     (isset($NM_val_form) && isset($NM_val_form['sdoact01'])) { $this->sdoact01 = $NM_val_form['sdoact01']; }
              elseif (isset($this->sdoact01)) { $this->nm_limpa_alfa($this->sdoact01); }
              if     (isset($NM_val_form) && isset($NM_val_form['acudbm01'])) { $this->acudbm01 = $NM_val_form['acudbm01']; }
              elseif (isset($this->acudbm01)) { $this->nm_limpa_alfa($this->acudbm01); }
              if     (isset($NM_val_form) && isset($NM_val_form['acucrm01'])) { $this->acucrm01 = $NM_val_form['acucrm01']; }
              elseif (isset($this->acucrm01)) { $this->nm_limpa_alfa($this->acucrm01); }
              if     (isset($NM_val_form) && isset($NM_val_form['acudbe01'])) { $this->acudbe01 = $NM_val_form['acudbe01']; }
              elseif (isset($this->acudbe01)) { $this->nm_limpa_alfa($this->acudbe01); }
              if     (isset($NM_val_form) && isset($NM_val_form['acucre01'])) { $this->acucre01 = $NM_val_form['acucre01']; }
              elseif (isset($this->acucre01)) { $this->nm_limpa_alfa($this->acucre01); }
              if     (isset($NM_val_form) && isset($NM_val_form['comentcte01'])) { $this->comentcte01 = $NM_val_form['comentcte01']; }
              elseif (isset($this->comentcte01)) { $this->nm_limpa_alfa($this->comentcte01); }
              if     (isset($NM_val_form) && isset($NM_val_form['statuscte01'])) { $this->statuscte01 = $NM_val_form['statuscte01']; }
              elseif (isset($this->statuscte01)) { $this->nm_limpa_alfa($this->statuscte01); }
              if     (isset($NM_val_form) && isset($NM_val_form['identcte01'])) { $this->identcte01 = $NM_val_form['identcte01']; }
              elseif (isset($this->identcte01)) { $this->nm_limpa_alfa($this->identcte01); }
              if     (isset($NM_val_form) && isset($NM_val_form['cordcte01'])) { $this->cordcte01 = $NM_val_form['cordcte01']; }
              elseif (isset($this->cordcte01)) { $this->nm_limpa_alfa($this->cordcte01); }
              if     (isset($NM_val_form) && isset($NM_val_form['limcant01'])) { $this->limcant01 = $NM_val_form['limcant01']; }
              elseif (isset($this->limcant01)) { $this->nm_limpa_alfa($this->limcant01); }
              if     (isset($NM_val_form) && isset($NM_val_form['pagleg01'])) { $this->pagleg01 = $NM_val_form['pagleg01']; }
              elseif (isset($this->pagleg01)) { $this->nm_limpa_alfa($this->pagleg01); }
              if     (isset($NM_val_form) && isset($NM_val_form['telcte01b'])) { $this->telcte01b = $NM_val_form['telcte01b']; }
              elseif (isset($this->telcte01b)) { $this->nm_limpa_alfa($this->telcte01b); }
              if     (isset($NM_val_form) && isset($NM_val_form['telcte01c'])) { $this->telcte01c = $NM_val_form['telcte01c']; }
              elseif (isset($this->telcte01c)) { $this->nm_limpa_alfa($this->telcte01c); }
              if     (isset($NM_val_form) && isset($NM_val_form['emailcte01'])) { $this->emailcte01 = $NM_val_form['emailcte01']; }
              elseif (isset($this->emailcte01)) { $this->nm_limpa_alfa($this->emailcte01); }
              if     (isset($NM_val_form) && isset($NM_val_form['ctacgcte01'])) { $this->ctacgcte01 = $NM_val_form['ctacgcte01']; }
              elseif (isset($this->ctacgcte01)) { $this->nm_limpa_alfa($this->ctacgcte01); }
              if     (isset($NM_val_form) && isset($NM_val_form['obsercte01'])) { $this->obsercte01 = $NM_val_form['obsercte01']; }
              elseif (isset($this->obsercte01)) { $this->nm_limpa_alfa($this->obsercte01); }
              if     (isset($NM_val_form) && isset($NM_val_form['totexceso01'])) { $this->totexceso01 = $NM_val_form['totexceso01']; }
              elseif (isset($this->totexceso01)) { $this->nm_limpa_alfa($this->totexceso01); }
              if     (isset($NM_val_form) && isset($NM_val_form['imagencte01'])) { $this->imagencte01 = $NM_val_form['imagencte01']; }
              elseif (isset($this->imagencte01)) { $this->nm_limpa_alfa($this->imagencte01); }
              if     (isset($NM_val_form) && isset($NM_val_form['block'])) { $this->block = $NM_val_form['block']; }
              elseif (isset($this->block)) { $this->nm_limpa_alfa($this->block); }
              if     (isset($NM_val_form) && isset($NM_val_form['uid'])) { $this->uid = $NM_val_form['uid']; }
              elseif (isset($this->uid)) { $this->nm_limpa_alfa($this->uid); }
              if     (isset($NM_val_form) && isset($NM_val_form['ultimoacceso'])) { $this->ultimoacceso = $NM_val_form['ultimoacceso']; }
              elseif (isset($this->ultimoacceso)) { $this->nm_limpa_alfa($this->ultimoacceso); }
              if     (isset($NM_val_form) && isset($NM_val_form['idcli'])) { $this->idcli = $NM_val_form['idcli']; }
              elseif (isset($this->idcli)) { $this->nm_limpa_alfa($this->idcli); }
              if     (isset($NM_val_form) && isset($NM_val_form['catcte01'])) { $this->catcte01 = $NM_val_form['catcte01']; }
              elseif (isset($this->catcte01)) { $this->nm_limpa_alfa($this->catcte01); }
              if     (isset($NM_val_form) && isset($NM_val_form['numautosri01'])) { $this->numautosri01 = $NM_val_form['numautosri01']; }
              elseif (isset($this->numautosri01)) { $this->nm_limpa_alfa($this->numautosri01); }
              if     (isset($NM_val_form) && isset($NM_val_form['seriedoc01'])) { $this->seriedoc01 = $NM_val_form['seriedoc01']; }
              elseif (isset($this->seriedoc01)) { $this->nm_limpa_alfa($this->seriedoc01); }
              if     (isset($NM_val_form) && isset($NM_val_form['repleg01'])) { $this->repleg01 = $NM_val_form['repleg01']; }
              elseif (isset($this->repleg01)) { $this->nm_limpa_alfa($this->repleg01); }
              if     (isset($NM_val_form) && isset($NM_val_form['coddest01'])) { $this->coddest01 = $NM_val_form['coddest01']; }
              elseif (isset($this->coddest01)) { $this->nm_limpa_alfa($this->coddest01); }
              if     (isset($NM_val_form) && isset($NM_val_form['longitud01'])) { $this->longitud01 = $NM_val_form['longitud01']; }
              elseif (isset($this->longitud01)) { $this->nm_limpa_alfa($this->longitud01); }
              if     (isset($NM_val_form) && isset($NM_val_form['latitud01'])) { $this->latitud01 = $NM_val_form['latitud01']; }
              elseif (isset($this->latitud01)) { $this->nm_limpa_alfa($this->latitud01); }
              if     (isset($NM_val_form) && isset($NM_val_form['zoom01'])) { $this->zoom01 = $NM_val_form['zoom01']; }
              elseif (isset($this->zoom01)) { $this->nm_limpa_alfa($this->zoom01); }
              if     (isset($NM_val_form) && isset($NM_val_form['coniva01'])) { $this->coniva01 = $NM_val_form['coniva01']; }
              elseif (isset($this->coniva01)) { $this->nm_limpa_alfa($this->coniva01); }
              if     (isset($NM_val_form) && isset($NM_val_form['conret01'])) { $this->conret01 = $NM_val_form['conret01']; }
              elseif (isset($this->conret01)) { $this->nm_limpa_alfa($this->conret01); }
              if     (isset($NM_val_form) && isset($NM_val_form['tipo_identificacion'])) { $this->tipo_identificacion = $NM_val_form['tipo_identificacion']; }
              elseif (isset($this->tipo_identificacion)) { $this->nm_limpa_alfa($this->tipo_identificacion); }
              if     (isset($NM_val_form) && isset($NM_val_form['es_padre'])) { $this->es_padre = $NM_val_form['es_padre']; }
              elseif (isset($this->es_padre)) { $this->nm_limpa_alfa($this->es_padre); }
              if     (isset($NM_val_form) && isset($NM_val_form['bonos'])) { $this->bonos = $NM_val_form['bonos']; }
              elseif (isset($this->bonos)) { $this->nm_limpa_alfa($this->bonos); }
              if     (isset($NM_val_form) && isset($NM_val_form['rendimiento'])) { $this->rendimiento = $NM_val_form['rendimiento']; }
              elseif (isset($this->rendimiento)) { $this->nm_limpa_alfa($this->rendimiento); }
              if     (isset($NM_val_form) && isset($NM_val_form['parterel01'])) { $this->parterel01 = $NM_val_form['parterel01']; }
              elseif (isset($this->parterel01)) { $this->nm_limpa_alfa($this->parterel01); }
              if     (isset($NM_val_form) && isset($NM_val_form['clase_contribuyente'])) { $this->clase_contribuyente = $NM_val_form['clase_contribuyente']; }
              elseif (isset($this->clase_contribuyente)) { $this->nm_limpa_alfa($this->clase_contribuyente); }
              if     (isset($NM_val_form) && isset($NM_val_form['tipo_contribuyente'])) { $this->tipo_contribuyente = $NM_val_form['tipo_contribuyente']; }
              elseif (isset($this->tipo_contribuyente)) { $this->nm_limpa_alfa($this->tipo_contribuyente); }
              if     (isset($NM_val_form) && isset($NM_val_form['lleva_contabilidad'])) { $this->lleva_contabilidad = $NM_val_form['lleva_contabilidad']; }
              elseif (isset($this->lleva_contabilidad)) { $this->nm_limpa_alfa($this->lleva_contabilidad); }
              if     (isset($NM_val_form) && isset($NM_val_form['ctacgant01'])) { $this->ctacgant01 = $NM_val_form['ctacgant01']; }
              elseif (isset($this->ctacgant01)) { $this->nm_limpa_alfa($this->ctacgant01); }
              if     (isset($NM_val_form) && isset($NM_val_form['residentefiscal01'])) { $this->residentefiscal01 = $NM_val_form['residentefiscal01']; }
              elseif (isset($this->residentefiscal01)) { $this->nm_limpa_alfa($this->residentefiscal01); }
              if     (isset($NM_val_form) && isset($NM_val_form['es_cliente'])) { $this->es_cliente = $NM_val_form['es_cliente']; }
              elseif (isset($this->es_cliente)) { $this->nm_limpa_alfa($this->es_cliente); }
              if     (isset($NM_val_form) && isset($NM_val_form['grupos'])) { $this->grupos = $NM_val_form['grupos']; }
              elseif (isset($this->grupos)) { $this->nm_limpa_alfa($this->grupos); }
              if     (isset($NM_val_form) && isset($NM_val_form['codigo_banco'])) { $this->codigo_banco = $NM_val_form['codigo_banco']; }
              elseif (isset($this->codigo_banco)) { $this->nm_limpa_alfa($this->codigo_banco); }
              if     (isset($NM_val_form) && isset($NM_val_form['tipo_cuenta_banco'])) { $this->tipo_cuenta_banco = $NM_val_form['tipo_cuenta_banco']; }
              elseif (isset($this->tipo_cuenta_banco)) { $this->nm_limpa_alfa($this->tipo_cuenta_banco); }
              if     (isset($NM_val_form) && isset($NM_val_form['nro_cuenta_banco'])) { $this->nro_cuenta_banco = $NM_val_form['nro_cuenta_banco']; }
              elseif (isset($this->nro_cuenta_banco)) { $this->nm_limpa_alfa($this->nro_cuenta_banco); }
              if     (isset($NM_val_form) && isset($NM_val_form['pago_transferencia'])) { $this->pago_transferencia = $NM_val_form['pago_transferencia']; }
              elseif (isset($this->pago_transferencia)) { $this->nm_limpa_alfa($this->pago_transferencia); }

              $this->nm_formatar_campos();
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
              }

              $aOldRefresh               = $this->nmgp_refresh_fields;
              $this->nmgp_refresh_fields = array_diff(array('codcte01', 'nomcte01', 'cv1cte01', 'cv2cte01', 'tipcte01', 'ofienccte01', 'vendcte01', 'cobrcte01', 'loccte01', 'dircte01', 'telcte01', 'cascte01', 'fecing01', 'condpag01', 'desctocte01', 'limcred01', 'desppar01', 'cheqpro01', 'sdoeje01', 'sdoant01', 'sdoact01', 'acudbm01', 'acucrm01', 'acudbe01', 'acucre01', 'comentcte01', 'statuscte01', 'identcte01', 'cordcte01', 'limcant01', 'pagleg01', 'telcte01b', 'telcte01c', 'emailcte01', 'ctacgcte01', 'obsercte01', 'totexceso01', 'imagencte01', 'block', 'uid', 'ultimoacceso', 'idcli', 'catcte01', 'numautosri01', 'seriedoc01', 'fecvencdoc01', 'repleg01', 'coddest01', 'longitud01', 'latitud01', 'zoom01', 'coniva01', 'conret01', 'tipo_identificacion', 'es_padre', 'bonos', 'rendimiento', 'parterel01', 'clase_contribuyente', 'tipo_contribuyente', 'lleva_contabilidad', 'ctacgant01', 'residentefiscal01', 'es_cliente', 'grupos', 'codigo_banco', 'tipo_cuenta_banco', 'nro_cuenta_banco', 'pago_transferencia'), $aDoNotUpdate);
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
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['foreign_key'] as $sFKName => $sFKValue)
              {
                   if (isset($this->sc_conv_var[$sFKName]))
                   {
                       $sFKName = $this->sc_conv_var[$sFKName];
                   }
                  eval("\$this->" . $sFKName . " = \"" . $sFKValue . "\";");
              }
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['decimal_db'] == ",") 
          {
              $this->nm_poe_aspas_decimal();
          }
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
          { 
              $NM_seq_auto = "NULL, ";
              $NM_cmp_auto = "idcli, ";
          } 
          $bInsertOk = true;
          $aInsertOk = array(); 
              $Cmd_Unique = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where codcte01 = '" . $this->codcte01 . "'";
              $Cmd_Unique = str_replace("'null'", "null", $Cmd_Unique) ; 
              $Cmd_Unique = str_replace("#null#", "null", $Cmd_Unique) ; 
              $Cmd_Unique = str_replace($this->Ini->date_delim . "null" . $this->Ini->date_delim1, "null", $Cmd_Unique) ; 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = $Cmd_Unique;
              $rsUni = $this->Db->Execute($Cmd_Unique);
              if (false === $rsUni)
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
                          form_maepag_pack_ajax_response();
                          exit;
                      }
                  }
              }
              elseif (0 < $rsUni->fields[0])
              {
                  $this->Erro->mensagem (__FILE__, __LINE__, "critica", $this->Ini->Nm_lang['lang_errm_inst_uniq'] . " Codcte 01"); 
                  $this->nmgp_opcao = "nada"; 
                  $GLOBALS["erro_incl"] = 1; 
                  $aInsertOk[] = 'codcte01';
                  $rsUni->Close();
              }
              else
              {
                  $rsUni->Close();
              }
          $bInsertOk = $bInsertOk && empty($aInsertOk);
          if (!isset($_POST['nmgp_ins_valid']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['insert_validation'] != $_POST['nmgp_ins_valid'])
          {
              $bInsertOk = false;
              $this->Erro->mensagem(__FILE__, __LINE__, 'security', $this->Ini->Nm_lang['lang_errm_inst_vald']);
              if (isset($_SESSION['scriptcase']['erro_handler']) && $_SESSION['scriptcase']['erro_handler'])
              {
                  $this->nmgp_opcao = 'refresh_insert';
                  if ($this->NM_ajax_flag)
                  {
                      form_maepag_pack_ajax_response();
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
                  if ($this->cv1cte01 != "")
                  { 
                       $compl_insert     .= ", cv1cte01";
                       $compl_insert_val .= ", '$this->cv1cte01'";
                  } 
                  if ($this->cv2cte01 != "")
                  { 
                       $compl_insert     .= ", cv2cte01";
                       $compl_insert_val .= ", '$this->cv2cte01'";
                  } 
                  if ($this->desctocte01 != "")
                  { 
                       $compl_insert     .= ", desctocte01";
                       $compl_insert_val .= ", $this->desctocte01";
                  } 
                  if ($this->limcred01 != "")
                  { 
                       $compl_insert     .= ", limcred01";
                       $compl_insert_val .= ", $this->limcred01";
                  } 
                  if ($this->desppar01 != "")
                  { 
                       $compl_insert     .= ", desppar01";
                       $compl_insert_val .= ", '$this->desppar01'";
                  } 
                  if ($this->sdoeje01 != "")
                  { 
                       $compl_insert     .= ", sdoeje01";
                       $compl_insert_val .= ", $this->sdoeje01";
                  } 
                  if ($this->sdoant01 != "")
                  { 
                       $compl_insert     .= ", sdoant01";
                       $compl_insert_val .= ", $this->sdoant01";
                  } 
                  if ($this->sdoact01 != "")
                  { 
                       $compl_insert     .= ", sdoact01";
                       $compl_insert_val .= ", $this->sdoact01";
                  } 
                  if ($this->acudbm01 != "")
                  { 
                       $compl_insert     .= ", acudbm01";
                       $compl_insert_val .= ", $this->acudbm01";
                  } 
                  if ($this->acucrm01 != "")
                  { 
                       $compl_insert     .= ", acucrm01";
                       $compl_insert_val .= ", $this->acucrm01";
                  } 
                  if ($this->acudbe01 != "")
                  { 
                       $compl_insert     .= ", acudbe01";
                       $compl_insert_val .= ", $this->acudbe01";
                  } 
                  if ($this->acucre01 != "")
                  { 
                       $compl_insert     .= ", acucre01";
                       $compl_insert_val .= ", $this->acucre01";
                  } 
                  if ($this->totexceso01 != "")
                  { 
                       $compl_insert     .= ", totexceso01";
                       $compl_insert_val .= ", $this->totexceso01";
                  } 
                  if ($this->coniva01 != "")
                  { 
                       $compl_insert     .= ", coniva01";
                       $compl_insert_val .= ", '$this->coniva01'";
                  } 
                  if ($this->conret01 != "")
                  { 
                       $compl_insert     .= ", conret01";
                       $compl_insert_val .= ", '$this->conret01'";
                  } 
                  if ($this->bonos != "")
                  { 
                       $compl_insert     .= ", bonos";
                       $compl_insert_val .= ", '$this->bonos'";
                  } 
                  if ($this->rendimiento != "")
                  { 
                       $compl_insert     .= ", rendimiento";
                       $compl_insert_val .= ", '$this->rendimiento'";
                  } 
                  if ($this->parterel01 != "")
                  { 
                       $compl_insert     .= ", parteRel01";
                       $compl_insert_val .= ", '$this->parterel01'";
                  } 
                  if ($this->residentefiscal01 != "")
                  { 
                       $compl_insert     .= ", residenteFiscal01";
                       $compl_insert_val .= ", '$this->residentefiscal01'";
                  } 
                  if ($this->es_cliente != "")
                  { 
                       $compl_insert     .= ", es_cliente";
                       $compl_insert_val .= ", '$this->es_cliente'";
                  } 
                  if ($this->grupos != "")
                  { 
                       $compl_insert     .= ", grupos";
                       $compl_insert_val .= ", '$this->grupos'";
                  } 
                  if ($this->pago_transferencia != "")
                  { 
                       $compl_insert     .= ", pago_transferencia";
                       $compl_insert_val .= ", '$this->pago_transferencia'";
                  } 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (codcte01, nomcte01, tipcte01, ofienccte01, vendcte01, cobrcte01, loccte01, dircte01, telcte01, cascte01, fecing01, condpag01, cheqpro01, comentcte01, statuscte01, identcte01, cordcte01, limcant01, pagleg01, telcte01b, telcte01c, emailcte01, ctacgcte01, obsercte01, imagencte01, block, UID, ultimoacceso, catcte01, numautosri01, seriedoc01, fecvencdoc01, repleg01, coddest01, longitud01, latitud01, zoom01, tipo_identificacion, es_padre, clase_contribuyente, tipo_contribuyente, lleva_contabilidad, ctacgant01, codigo_banco, tipo_cuenta_banco, nro_cuenta_banco $compl_insert) VALUES ('$this->codcte01', '$this->nomcte01', '$this->tipcte01', '$this->ofienccte01', '$this->vendcte01', '$this->cobrcte01', '$this->loccte01', '$this->dircte01', '$this->telcte01', '$this->cascte01', #$this->fecing01#, '$this->condpag01', $this->cheqpro01, '$this->comentcte01', $this->statuscte01, '$this->identcte01', '$this->cordcte01', $this->limcant01, '$this->pagleg01', '$this->telcte01b', '$this->telcte01c', '$this->emailcte01', '$this->ctacgcte01', '$this->obsercte01', '$this->imagencte01', $this->block, $this->uid, $this->ultimoacceso, '$this->catcte01', '$this->numautosri01', '$this->seriedoc01', #$this->fecvencdoc01#, '$this->repleg01', '$this->coddest01', '$this->longitud01', '$this->latitud01', $this->zoom01, '$this->tipo_identificacion', $this->es_padre, '$this->clase_contribuyente', '$this->tipo_contribuyente', '$this->lleva_contabilidad', '$this->ctacgant01', '$this->codigo_banco', '$this->tipo_cuenta_banco', '$this->nro_cuenta_banco' $compl_insert_val)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              { 
                  $compl_insert     = ""; 
                  $compl_insert_val = ""; 
                  if ($this->cv1cte01 != "")
                  { 
                       $compl_insert     .= ", cv1cte01";
                       $compl_insert_val .= ", '$this->cv1cte01'";
                  } 
                  if ($this->cv2cte01 != "")
                  { 
                       $compl_insert     .= ", cv2cte01";
                       $compl_insert_val .= ", '$this->cv2cte01'";
                  } 
                  if ($this->desctocte01 != "")
                  { 
                       $compl_insert     .= ", desctocte01";
                       $compl_insert_val .= ", $this->desctocte01";
                  } 
                  if ($this->limcred01 != "")
                  { 
                       $compl_insert     .= ", limcred01";
                       $compl_insert_val .= ", $this->limcred01";
                  } 
                  if ($this->desppar01 != "")
                  { 
                       $compl_insert     .= ", desppar01";
                       $compl_insert_val .= ", '$this->desppar01'";
                  } 
                  if ($this->sdoeje01 != "")
                  { 
                       $compl_insert     .= ", sdoeje01";
                       $compl_insert_val .= ", $this->sdoeje01";
                  } 
                  if ($this->sdoant01 != "")
                  { 
                       $compl_insert     .= ", sdoant01";
                       $compl_insert_val .= ", $this->sdoant01";
                  } 
                  if ($this->sdoact01 != "")
                  { 
                       $compl_insert     .= ", sdoact01";
                       $compl_insert_val .= ", $this->sdoact01";
                  } 
                  if ($this->acudbm01 != "")
                  { 
                       $compl_insert     .= ", acudbm01";
                       $compl_insert_val .= ", $this->acudbm01";
                  } 
                  if ($this->acucrm01 != "")
                  { 
                       $compl_insert     .= ", acucrm01";
                       $compl_insert_val .= ", $this->acucrm01";
                  } 
                  if ($this->acudbe01 != "")
                  { 
                       $compl_insert     .= ", acudbe01";
                       $compl_insert_val .= ", $this->acudbe01";
                  } 
                  if ($this->acucre01 != "")
                  { 
                       $compl_insert     .= ", acucre01";
                       $compl_insert_val .= ", $this->acucre01";
                  } 
                  if ($this->totexceso01 != "")
                  { 
                       $compl_insert     .= ", totexceso01";
                       $compl_insert_val .= ", $this->totexceso01";
                  } 
                  if ($this->coniva01 != "")
                  { 
                       $compl_insert     .= ", coniva01";
                       $compl_insert_val .= ", '$this->coniva01'";
                  } 
                  if ($this->conret01 != "")
                  { 
                       $compl_insert     .= ", conret01";
                       $compl_insert_val .= ", '$this->conret01'";
                  } 
                  if ($this->bonos != "")
                  { 
                       $compl_insert     .= ", bonos";
                       $compl_insert_val .= ", '$this->bonos'";
                  } 
                  if ($this->rendimiento != "")
                  { 
                       $compl_insert     .= ", rendimiento";
                       $compl_insert_val .= ", '$this->rendimiento'";
                  } 
                  if ($this->parterel01 != "")
                  { 
                       $compl_insert     .= ", parteRel01";
                       $compl_insert_val .= ", '$this->parterel01'";
                  } 
                  if ($this->residentefiscal01 != "")
                  { 
                       $compl_insert     .= ", residenteFiscal01";
                       $compl_insert_val .= ", '$this->residentefiscal01'";
                  } 
                  if ($this->es_cliente != "")
                  { 
                       $compl_insert     .= ", es_cliente";
                       $compl_insert_val .= ", '$this->es_cliente'";
                  } 
                  if ($this->grupos != "")
                  { 
                       $compl_insert     .= ", grupos";
                       $compl_insert_val .= ", '$this->grupos'";
                  } 
                  if ($this->pago_transferencia != "")
                  { 
                       $compl_insert     .= ", pago_transferencia";
                       $compl_insert_val .= ", '$this->pago_transferencia'";
                  } 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "codcte01, nomcte01, tipcte01, ofienccte01, vendcte01, cobrcte01, loccte01, dircte01, telcte01, cascte01, fecing01, condpag01, cheqpro01, comentcte01, statuscte01, identcte01, cordcte01, limcant01, pagleg01, telcte01b, telcte01c, emailcte01, ctacgcte01, obsercte01, imagencte01, block, UID, ultimoacceso, catcte01, numautosri01, seriedoc01, fecvencdoc01, repleg01, coddest01, longitud01, latitud01, zoom01, tipo_identificacion, es_padre, clase_contribuyente, tipo_contribuyente, lleva_contabilidad, ctacgant01, codigo_banco, tipo_cuenta_banco, nro_cuenta_banco $compl_insert) VALUES (" . $NM_seq_auto . "'$this->codcte01', '$this->nomcte01', '$this->tipcte01', '$this->ofienccte01', '$this->vendcte01', '$this->cobrcte01', '$this->loccte01', '$this->dircte01', '$this->telcte01', '$this->cascte01', " . $this->Ini->date_delim . $this->fecing01 . $this->Ini->date_delim1 . ", '$this->condpag01', $this->cheqpro01, '$this->comentcte01', $this->statuscte01, '$this->identcte01', '$this->cordcte01', $this->limcant01, '$this->pagleg01', '$this->telcte01b', '$this->telcte01c', '$this->emailcte01', '$this->ctacgcte01', '$this->obsercte01', '$this->imagencte01', $this->block, $this->uid, $this->ultimoacceso, '$this->catcte01', '$this->numautosri01', '$this->seriedoc01', " . $this->Ini->date_delim . $this->fecvencdoc01 . $this->Ini->date_delim1 . ", '$this->repleg01', '$this->coddest01', '$this->longitud01', '$this->latitud01', $this->zoom01, '$this->tipo_identificacion', $this->es_padre, '$this->clase_contribuyente', '$this->tipo_contribuyente', '$this->lleva_contabilidad', '$this->ctacgant01', '$this->codigo_banco', '$this->tipo_cuenta_banco', '$this->nro_cuenta_banco' $compl_insert_val)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
              { 
                  $compl_insert     = ""; 
                  $compl_insert_val = ""; 
                  if ($this->cv1cte01 != "")
                  { 
                       $compl_insert     .= ", cv1cte01";
                       $compl_insert_val .= ", '$this->cv1cte01'";
                  } 
                  if ($this->cv2cte01 != "")
                  { 
                       $compl_insert     .= ", cv2cte01";
                       $compl_insert_val .= ", '$this->cv2cte01'";
                  } 
                  if ($this->desctocte01 != "")
                  { 
                       $compl_insert     .= ", desctocte01";
                       $compl_insert_val .= ", $this->desctocte01";
                  } 
                  if ($this->limcred01 != "")
                  { 
                       $compl_insert     .= ", limcred01";
                       $compl_insert_val .= ", $this->limcred01";
                  } 
                  if ($this->desppar01 != "")
                  { 
                       $compl_insert     .= ", desppar01";
                       $compl_insert_val .= ", '$this->desppar01'";
                  } 
                  if ($this->sdoeje01 != "")
                  { 
                       $compl_insert     .= ", sdoeje01";
                       $compl_insert_val .= ", $this->sdoeje01";
                  } 
                  if ($this->sdoant01 != "")
                  { 
                       $compl_insert     .= ", sdoant01";
                       $compl_insert_val .= ", $this->sdoant01";
                  } 
                  if ($this->sdoact01 != "")
                  { 
                       $compl_insert     .= ", sdoact01";
                       $compl_insert_val .= ", $this->sdoact01";
                  } 
                  if ($this->acudbm01 != "")
                  { 
                       $compl_insert     .= ", acudbm01";
                       $compl_insert_val .= ", $this->acudbm01";
                  } 
                  if ($this->acucrm01 != "")
                  { 
                       $compl_insert     .= ", acucrm01";
                       $compl_insert_val .= ", $this->acucrm01";
                  } 
                  if ($this->acudbe01 != "")
                  { 
                       $compl_insert     .= ", acudbe01";
                       $compl_insert_val .= ", $this->acudbe01";
                  } 
                  if ($this->acucre01 != "")
                  { 
                       $compl_insert     .= ", acucre01";
                       $compl_insert_val .= ", $this->acucre01";
                  } 
                  if ($this->totexceso01 != "")
                  { 
                       $compl_insert     .= ", totexceso01";
                       $compl_insert_val .= ", $this->totexceso01";
                  } 
                  if ($this->coniva01 != "")
                  { 
                       $compl_insert     .= ", coniva01";
                       $compl_insert_val .= ", '$this->coniva01'";
                  } 
                  if ($this->conret01 != "")
                  { 
                       $compl_insert     .= ", conret01";
                       $compl_insert_val .= ", '$this->conret01'";
                  } 
                  if ($this->bonos != "")
                  { 
                       $compl_insert     .= ", bonos";
                       $compl_insert_val .= ", '$this->bonos'";
                  } 
                  if ($this->rendimiento != "")
                  { 
                       $compl_insert     .= ", rendimiento";
                       $compl_insert_val .= ", '$this->rendimiento'";
                  } 
                  if ($this->parterel01 != "")
                  { 
                       $compl_insert     .= ", parteRel01";
                       $compl_insert_val .= ", '$this->parterel01'";
                  } 
                  if ($this->residentefiscal01 != "")
                  { 
                       $compl_insert     .= ", residenteFiscal01";
                       $compl_insert_val .= ", '$this->residentefiscal01'";
                  } 
                  if ($this->es_cliente != "")
                  { 
                       $compl_insert     .= ", es_cliente";
                       $compl_insert_val .= ", '$this->es_cliente'";
                  } 
                  if ($this->grupos != "")
                  { 
                       $compl_insert     .= ", grupos";
                       $compl_insert_val .= ", '$this->grupos'";
                  } 
                  if ($this->pago_transferencia != "")
                  { 
                       $compl_insert     .= ", pago_transferencia";
                       $compl_insert_val .= ", '$this->pago_transferencia'";
                  } 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "codcte01, nomcte01, tipcte01, ofienccte01, vendcte01, cobrcte01, loccte01, dircte01, telcte01, cascte01, fecing01, condpag01, cheqpro01, comentcte01, statuscte01, identcte01, cordcte01, limcant01, pagleg01, telcte01b, telcte01c, emailcte01, ctacgcte01, obsercte01, imagencte01, block, UID, ultimoacceso, catcte01, numautosri01, seriedoc01, fecvencdoc01, repleg01, coddest01, longitud01, latitud01, zoom01, tipo_identificacion, es_padre, clase_contribuyente, tipo_contribuyente, lleva_contabilidad, ctacgant01, codigo_banco, tipo_cuenta_banco, nro_cuenta_banco $compl_insert) VALUES (" . $NM_seq_auto . "'$this->codcte01', '$this->nomcte01', '$this->tipcte01', '$this->ofienccte01', '$this->vendcte01', '$this->cobrcte01', '$this->loccte01', '$this->dircte01', '$this->telcte01', '$this->cascte01', " . $this->Ini->date_delim . $this->fecing01 . $this->Ini->date_delim1 . ", '$this->condpag01', $this->cheqpro01, '$this->comentcte01', $this->statuscte01, '$this->identcte01', '$this->cordcte01', $this->limcant01, '$this->pagleg01', '$this->telcte01b', '$this->telcte01c', '$this->emailcte01', '$this->ctacgcte01', '$this->obsercte01', '$this->imagencte01', $this->block, $this->uid, $this->ultimoacceso, '$this->catcte01', '$this->numautosri01', '$this->seriedoc01', " . $this->Ini->date_delim . $this->fecvencdoc01 . $this->Ini->date_delim1 . ", '$this->repleg01', '$this->coddest01', '$this->longitud01', '$this->latitud01', $this->zoom01, '$this->tipo_identificacion', $this->es_padre, '$this->clase_contribuyente', '$this->tipo_contribuyente', '$this->lleva_contabilidad', '$this->ctacgant01', '$this->codigo_banco', '$this->tipo_cuenta_banco', '$this->nro_cuenta_banco' $compl_insert_val)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              {
                  $compl_insert     = ""; 
                  $compl_insert_val = ""; 
                  if ($this->cv1cte01 != "")
                  { 
                       $compl_insert     .= ", cv1cte01";
                       $compl_insert_val .= ", '$this->cv1cte01'";
                  } 
                  if ($this->cv2cte01 != "")
                  { 
                       $compl_insert     .= ", cv2cte01";
                       $compl_insert_val .= ", '$this->cv2cte01'";
                  } 
                  if ($this->desctocte01 != "")
                  { 
                       $compl_insert     .= ", desctocte01";
                       $compl_insert_val .= ", $this->desctocte01";
                  } 
                  if ($this->limcred01 != "")
                  { 
                       $compl_insert     .= ", limcred01";
                       $compl_insert_val .= ", $this->limcred01";
                  } 
                  if ($this->desppar01 != "")
                  { 
                       $compl_insert     .= ", desppar01";
                       $compl_insert_val .= ", '$this->desppar01'";
                  } 
                  if ($this->sdoeje01 != "")
                  { 
                       $compl_insert     .= ", sdoeje01";
                       $compl_insert_val .= ", $this->sdoeje01";
                  } 
                  if ($this->sdoant01 != "")
                  { 
                       $compl_insert     .= ", sdoant01";
                       $compl_insert_val .= ", $this->sdoant01";
                  } 
                  if ($this->sdoact01 != "")
                  { 
                       $compl_insert     .= ", sdoact01";
                       $compl_insert_val .= ", $this->sdoact01";
                  } 
                  if ($this->acudbm01 != "")
                  { 
                       $compl_insert     .= ", acudbm01";
                       $compl_insert_val .= ", $this->acudbm01";
                  } 
                  if ($this->acucrm01 != "")
                  { 
                       $compl_insert     .= ", acucrm01";
                       $compl_insert_val .= ", $this->acucrm01";
                  } 
                  if ($this->acudbe01 != "")
                  { 
                       $compl_insert     .= ", acudbe01";
                       $compl_insert_val .= ", $this->acudbe01";
                  } 
                  if ($this->acucre01 != "")
                  { 
                       $compl_insert     .= ", acucre01";
                       $compl_insert_val .= ", $this->acucre01";
                  } 
                  if ($this->totexceso01 != "")
                  { 
                       $compl_insert     .= ", totexceso01";
                       $compl_insert_val .= ", $this->totexceso01";
                  } 
                  if ($this->coniva01 != "")
                  { 
                       $compl_insert     .= ", coniva01";
                       $compl_insert_val .= ", '$this->coniva01'";
                  } 
                  if ($this->conret01 != "")
                  { 
                       $compl_insert     .= ", conret01";
                       $compl_insert_val .= ", '$this->conret01'";
                  } 
                  if ($this->bonos != "")
                  { 
                       $compl_insert     .= ", bonos";
                       $compl_insert_val .= ", '$this->bonos'";
                  } 
                  if ($this->rendimiento != "")
                  { 
                       $compl_insert     .= ", rendimiento";
                       $compl_insert_val .= ", '$this->rendimiento'";
                  } 
                  if ($this->parterel01 != "")
                  { 
                       $compl_insert     .= ", parteRel01";
                       $compl_insert_val .= ", '$this->parterel01'";
                  } 
                  if ($this->residentefiscal01 != "")
                  { 
                       $compl_insert     .= ", residenteFiscal01";
                       $compl_insert_val .= ", '$this->residentefiscal01'";
                  } 
                  if ($this->es_cliente != "")
                  { 
                       $compl_insert     .= ", es_cliente";
                       $compl_insert_val .= ", '$this->es_cliente'";
                  } 
                  if ($this->grupos != "")
                  { 
                       $compl_insert     .= ", grupos";
                       $compl_insert_val .= ", '$this->grupos'";
                  } 
                  if ($this->pago_transferencia != "")
                  { 
                       $compl_insert     .= ", pago_transferencia";
                       $compl_insert_val .= ", '$this->pago_transferencia'";
                  } 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "codcte01, nomcte01, tipcte01, ofienccte01, vendcte01, cobrcte01, loccte01, dircte01, telcte01, cascte01, fecing01, condpag01, cheqpro01, comentcte01, statuscte01, identcte01, cordcte01, limcant01, pagleg01, telcte01b, telcte01c, emailcte01, ctacgcte01, obsercte01, imagencte01, block, UID, ultimoacceso, catcte01, numautosri01, seriedoc01, fecvencdoc01, repleg01, coddest01, longitud01, latitud01, zoom01, tipo_identificacion, es_padre, clase_contribuyente, tipo_contribuyente, lleva_contabilidad, ctacgant01, codigo_banco, tipo_cuenta_banco, nro_cuenta_banco $compl_insert) VALUES (" . $NM_seq_auto . "'$this->codcte01', '$this->nomcte01', '$this->tipcte01', '$this->ofienccte01', '$this->vendcte01', '$this->cobrcte01', '$this->loccte01', '$this->dircte01', '$this->telcte01', '$this->cascte01', " . $this->Ini->date_delim . $this->fecing01 . $this->Ini->date_delim1 . ", '$this->condpag01', $this->cheqpro01, '$this->comentcte01', $this->statuscte01, '$this->identcte01', '$this->cordcte01', $this->limcant01, '$this->pagleg01', '$this->telcte01b', '$this->telcte01c', '$this->emailcte01', '$this->ctacgcte01', '$this->obsercte01', '$this->imagencte01', $this->block, $this->uid, $this->ultimoacceso, '$this->catcte01', '$this->numautosri01', '$this->seriedoc01', " . $this->Ini->date_delim . $this->fecvencdoc01 . $this->Ini->date_delim1 . ", '$this->repleg01', '$this->coddest01', '$this->longitud01', '$this->latitud01', $this->zoom01, '$this->tipo_identificacion', $this->es_padre, '$this->clase_contribuyente', '$this->tipo_contribuyente', '$this->lleva_contabilidad', '$this->ctacgant01', '$this->codigo_banco', '$this->tipo_cuenta_banco', '$this->nro_cuenta_banco' $compl_insert_val)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $compl_insert     = ""; 
                  $compl_insert_val = ""; 
                  if ($this->cv1cte01 != "")
                  { 
                       $compl_insert     .= ", cv1cte01";
                       $compl_insert_val .= ", '$this->cv1cte01'";
                  } 
                  if ($this->cv2cte01 != "")
                  { 
                       $compl_insert     .= ", cv2cte01";
                       $compl_insert_val .= ", '$this->cv2cte01'";
                  } 
                  if ($this->desctocte01 != "")
                  { 
                       $compl_insert     .= ", desctocte01";
                       $compl_insert_val .= ", $this->desctocte01";
                  } 
                  if ($this->limcred01 != "")
                  { 
                       $compl_insert     .= ", limcred01";
                       $compl_insert_val .= ", $this->limcred01";
                  } 
                  if ($this->desppar01 != "")
                  { 
                       $compl_insert     .= ", desppar01";
                       $compl_insert_val .= ", '$this->desppar01'";
                  } 
                  if ($this->sdoeje01 != "")
                  { 
                       $compl_insert     .= ", sdoeje01";
                       $compl_insert_val .= ", $this->sdoeje01";
                  } 
                  if ($this->sdoant01 != "")
                  { 
                       $compl_insert     .= ", sdoant01";
                       $compl_insert_val .= ", $this->sdoant01";
                  } 
                  if ($this->sdoact01 != "")
                  { 
                       $compl_insert     .= ", sdoact01";
                       $compl_insert_val .= ", $this->sdoact01";
                  } 
                  if ($this->acudbm01 != "")
                  { 
                       $compl_insert     .= ", acudbm01";
                       $compl_insert_val .= ", $this->acudbm01";
                  } 
                  if ($this->acucrm01 != "")
                  { 
                       $compl_insert     .= ", acucrm01";
                       $compl_insert_val .= ", $this->acucrm01";
                  } 
                  if ($this->acudbe01 != "")
                  { 
                       $compl_insert     .= ", acudbe01";
                       $compl_insert_val .= ", $this->acudbe01";
                  } 
                  if ($this->acucre01 != "")
                  { 
                       $compl_insert     .= ", acucre01";
                       $compl_insert_val .= ", $this->acucre01";
                  } 
                  if ($this->totexceso01 != "")
                  { 
                       $compl_insert     .= ", totexceso01";
                       $compl_insert_val .= ", $this->totexceso01";
                  } 
                  if ($this->coniva01 != "")
                  { 
                       $compl_insert     .= ", coniva01";
                       $compl_insert_val .= ", '$this->coniva01'";
                  } 
                  if ($this->conret01 != "")
                  { 
                       $compl_insert     .= ", conret01";
                       $compl_insert_val .= ", '$this->conret01'";
                  } 
                  if ($this->bonos != "")
                  { 
                       $compl_insert     .= ", bonos";
                       $compl_insert_val .= ", '$this->bonos'";
                  } 
                  if ($this->rendimiento != "")
                  { 
                       $compl_insert     .= ", rendimiento";
                       $compl_insert_val .= ", '$this->rendimiento'";
                  } 
                  if ($this->parterel01 != "")
                  { 
                       $compl_insert     .= ", parteRel01";
                       $compl_insert_val .= ", '$this->parterel01'";
                  } 
                  if ($this->residentefiscal01 != "")
                  { 
                       $compl_insert     .= ", residenteFiscal01";
                       $compl_insert_val .= ", '$this->residentefiscal01'";
                  } 
                  if ($this->es_cliente != "")
                  { 
                       $compl_insert     .= ", es_cliente";
                       $compl_insert_val .= ", '$this->es_cliente'";
                  } 
                  if ($this->grupos != "")
                  { 
                       $compl_insert     .= ", grupos";
                       $compl_insert_val .= ", '$this->grupos'";
                  } 
                  if ($this->pago_transferencia != "")
                  { 
                       $compl_insert     .= ", pago_transferencia";
                       $compl_insert_val .= ", '$this->pago_transferencia'";
                  } 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "codcte01, nomcte01, tipcte01, ofienccte01, vendcte01, cobrcte01, loccte01, dircte01, telcte01, cascte01, fecing01, condpag01, cheqpro01, comentcte01, statuscte01, identcte01, cordcte01, limcant01, pagleg01, telcte01b, telcte01c, emailcte01, ctacgcte01, obsercte01, imagencte01, block, UID, ultimoacceso, catcte01, numautosri01, seriedoc01, fecvencdoc01, repleg01, coddest01, longitud01, latitud01, zoom01, tipo_identificacion, es_padre, clase_contribuyente, tipo_contribuyente, lleva_contabilidad, ctacgant01, codigo_banco, tipo_cuenta_banco, nro_cuenta_banco $compl_insert) VALUES (" . $NM_seq_auto . "'$this->codcte01', '$this->nomcte01', '$this->tipcte01', '$this->ofienccte01', '$this->vendcte01', '$this->cobrcte01', '$this->loccte01', '$this->dircte01', '$this->telcte01', '$this->cascte01', EXTEND('$this->fecing01', YEAR TO FRACTION), '$this->condpag01', $this->cheqpro01, '$this->comentcte01', $this->statuscte01, '$this->identcte01', '$this->cordcte01', $this->limcant01, '$this->pagleg01', '$this->telcte01b', '$this->telcte01c', '$this->emailcte01', '$this->ctacgcte01', '$this->obsercte01', '$this->imagencte01', $this->block, $this->uid, $this->ultimoacceso, '$this->catcte01', '$this->numautosri01', '$this->seriedoc01', EXTEND('$this->fecvencdoc01', YEAR TO DAY), '$this->repleg01', '$this->coddest01', '$this->longitud01', '$this->latitud01', $this->zoom01, '$this->tipo_identificacion', $this->es_padre, '$this->clase_contribuyente', '$this->tipo_contribuyente', '$this->lleva_contabilidad', '$this->ctacgant01', '$this->codigo_banco', '$this->tipo_cuenta_banco', '$this->nro_cuenta_banco' $compl_insert_val)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
              {
                  $compl_insert     = ""; 
                  $compl_insert_val = ""; 
                  if ($this->cv1cte01 != "")
                  { 
                       $compl_insert     .= ", cv1cte01";
                       $compl_insert_val .= ", '$this->cv1cte01'";
                  } 
                  if ($this->cv2cte01 != "")
                  { 
                       $compl_insert     .= ", cv2cte01";
                       $compl_insert_val .= ", '$this->cv2cte01'";
                  } 
                  if ($this->desctocte01 != "")
                  { 
                       $compl_insert     .= ", desctocte01";
                       $compl_insert_val .= ", $this->desctocte01";
                  } 
                  if ($this->limcred01 != "")
                  { 
                       $compl_insert     .= ", limcred01";
                       $compl_insert_val .= ", $this->limcred01";
                  } 
                  if ($this->desppar01 != "")
                  { 
                       $compl_insert     .= ", desppar01";
                       $compl_insert_val .= ", '$this->desppar01'";
                  } 
                  if ($this->sdoeje01 != "")
                  { 
                       $compl_insert     .= ", sdoeje01";
                       $compl_insert_val .= ", $this->sdoeje01";
                  } 
                  if ($this->sdoant01 != "")
                  { 
                       $compl_insert     .= ", sdoant01";
                       $compl_insert_val .= ", $this->sdoant01";
                  } 
                  if ($this->sdoact01 != "")
                  { 
                       $compl_insert     .= ", sdoact01";
                       $compl_insert_val .= ", $this->sdoact01";
                  } 
                  if ($this->acudbm01 != "")
                  { 
                       $compl_insert     .= ", acudbm01";
                       $compl_insert_val .= ", $this->acudbm01";
                  } 
                  if ($this->acucrm01 != "")
                  { 
                       $compl_insert     .= ", acucrm01";
                       $compl_insert_val .= ", $this->acucrm01";
                  } 
                  if ($this->acudbe01 != "")
                  { 
                       $compl_insert     .= ", acudbe01";
                       $compl_insert_val .= ", $this->acudbe01";
                  } 
                  if ($this->acucre01 != "")
                  { 
                       $compl_insert     .= ", acucre01";
                       $compl_insert_val .= ", $this->acucre01";
                  } 
                  if ($this->totexceso01 != "")
                  { 
                       $compl_insert     .= ", totexceso01";
                       $compl_insert_val .= ", $this->totexceso01";
                  } 
                  if ($this->coniva01 != "")
                  { 
                       $compl_insert     .= ", coniva01";
                       $compl_insert_val .= ", '$this->coniva01'";
                  } 
                  if ($this->conret01 != "")
                  { 
                       $compl_insert     .= ", conret01";
                       $compl_insert_val .= ", '$this->conret01'";
                  } 
                  if ($this->bonos != "")
                  { 
                       $compl_insert     .= ", bonos";
                       $compl_insert_val .= ", '$this->bonos'";
                  } 
                  if ($this->rendimiento != "")
                  { 
                       $compl_insert     .= ", rendimiento";
                       $compl_insert_val .= ", '$this->rendimiento'";
                  } 
                  if ($this->parterel01 != "")
                  { 
                       $compl_insert     .= ", parteRel01";
                       $compl_insert_val .= ", '$this->parterel01'";
                  } 
                  if ($this->residentefiscal01 != "")
                  { 
                       $compl_insert     .= ", residenteFiscal01";
                       $compl_insert_val .= ", '$this->residentefiscal01'";
                  } 
                  if ($this->es_cliente != "")
                  { 
                       $compl_insert     .= ", es_cliente";
                       $compl_insert_val .= ", '$this->es_cliente'";
                  } 
                  if ($this->grupos != "")
                  { 
                       $compl_insert     .= ", grupos";
                       $compl_insert_val .= ", '$this->grupos'";
                  } 
                  if ($this->pago_transferencia != "")
                  { 
                       $compl_insert     .= ", pago_transferencia";
                       $compl_insert_val .= ", '$this->pago_transferencia'";
                  } 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "codcte01, nomcte01, tipcte01, ofienccte01, vendcte01, cobrcte01, loccte01, dircte01, telcte01, cascte01, fecing01, condpag01, cheqpro01, comentcte01, statuscte01, identcte01, cordcte01, limcant01, pagleg01, telcte01b, telcte01c, emailcte01, ctacgcte01, obsercte01, imagencte01, block, UID, ultimoacceso, catcte01, numautosri01, seriedoc01, fecvencdoc01, repleg01, coddest01, longitud01, latitud01, zoom01, tipo_identificacion, es_padre, clase_contribuyente, tipo_contribuyente, lleva_contabilidad, ctacgant01, codigo_banco, tipo_cuenta_banco, nro_cuenta_banco $compl_insert) VALUES (" . $NM_seq_auto . "'$this->codcte01', '$this->nomcte01', '$this->tipcte01', '$this->ofienccte01', '$this->vendcte01', '$this->cobrcte01', '$this->loccte01', '$this->dircte01', '$this->telcte01', '$this->cascte01', " . $this->Ini->date_delim . $this->fecing01 . $this->Ini->date_delim1 . ", '$this->condpag01', $this->cheqpro01, '$this->comentcte01', $this->statuscte01, '$this->identcte01', '$this->cordcte01', $this->limcant01, '$this->pagleg01', '$this->telcte01b', '$this->telcte01c', '$this->emailcte01', '$this->ctacgcte01', '$this->obsercte01', '$this->imagencte01', $this->block, $this->uid, $this->ultimoacceso, '$this->catcte01', '$this->numautosri01', '$this->seriedoc01', " . $this->Ini->date_delim . $this->fecvencdoc01 . $this->Ini->date_delim1 . ", '$this->repleg01', '$this->coddest01', '$this->longitud01', '$this->latitud01', $this->zoom01, '$this->tipo_identificacion', $this->es_padre, '$this->clase_contribuyente', '$this->tipo_contribuyente', '$this->lleva_contabilidad', '$this->ctacgant01', '$this->codigo_banco', '$this->tipo_cuenta_banco', '$this->nro_cuenta_banco' $compl_insert_val)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
              {
                  $compl_insert     = ""; 
                  $compl_insert_val = ""; 
                  if ($this->cv1cte01 != "")
                  { 
                       $compl_insert     .= ", cv1cte01";
                       $compl_insert_val .= ", '$this->cv1cte01'";
                  } 
                  if ($this->cv2cte01 != "")
                  { 
                       $compl_insert     .= ", cv2cte01";
                       $compl_insert_val .= ", '$this->cv2cte01'";
                  } 
                  if ($this->desctocte01 != "")
                  { 
                       $compl_insert     .= ", desctocte01";
                       $compl_insert_val .= ", $this->desctocte01";
                  } 
                  if ($this->limcred01 != "")
                  { 
                       $compl_insert     .= ", limcred01";
                       $compl_insert_val .= ", $this->limcred01";
                  } 
                  if ($this->desppar01 != "")
                  { 
                       $compl_insert     .= ", desppar01";
                       $compl_insert_val .= ", '$this->desppar01'";
                  } 
                  if ($this->sdoeje01 != "")
                  { 
                       $compl_insert     .= ", sdoeje01";
                       $compl_insert_val .= ", $this->sdoeje01";
                  } 
                  if ($this->sdoant01 != "")
                  { 
                       $compl_insert     .= ", sdoant01";
                       $compl_insert_val .= ", $this->sdoant01";
                  } 
                  if ($this->sdoact01 != "")
                  { 
                       $compl_insert     .= ", sdoact01";
                       $compl_insert_val .= ", $this->sdoact01";
                  } 
                  if ($this->acudbm01 != "")
                  { 
                       $compl_insert     .= ", acudbm01";
                       $compl_insert_val .= ", $this->acudbm01";
                  } 
                  if ($this->acucrm01 != "")
                  { 
                       $compl_insert     .= ", acucrm01";
                       $compl_insert_val .= ", $this->acucrm01";
                  } 
                  if ($this->acudbe01 != "")
                  { 
                       $compl_insert     .= ", acudbe01";
                       $compl_insert_val .= ", $this->acudbe01";
                  } 
                  if ($this->acucre01 != "")
                  { 
                       $compl_insert     .= ", acucre01";
                       $compl_insert_val .= ", $this->acucre01";
                  } 
                  if ($this->totexceso01 != "")
                  { 
                       $compl_insert     .= ", totexceso01";
                       $compl_insert_val .= ", $this->totexceso01";
                  } 
                  if ($this->coniva01 != "")
                  { 
                       $compl_insert     .= ", coniva01";
                       $compl_insert_val .= ", '$this->coniva01'";
                  } 
                  if ($this->conret01 != "")
                  { 
                       $compl_insert     .= ", conret01";
                       $compl_insert_val .= ", '$this->conret01'";
                  } 
                  if ($this->bonos != "")
                  { 
                       $compl_insert     .= ", bonos";
                       $compl_insert_val .= ", '$this->bonos'";
                  } 
                  if ($this->rendimiento != "")
                  { 
                       $compl_insert     .= ", rendimiento";
                       $compl_insert_val .= ", '$this->rendimiento'";
                  } 
                  if ($this->parterel01 != "")
                  { 
                       $compl_insert     .= ", parteRel01";
                       $compl_insert_val .= ", '$this->parterel01'";
                  } 
                  if ($this->residentefiscal01 != "")
                  { 
                       $compl_insert     .= ", residenteFiscal01";
                       $compl_insert_val .= ", '$this->residentefiscal01'";
                  } 
                  if ($this->es_cliente != "")
                  { 
                       $compl_insert     .= ", es_cliente";
                       $compl_insert_val .= ", '$this->es_cliente'";
                  } 
                  if ($this->grupos != "")
                  { 
                       $compl_insert     .= ", grupos";
                       $compl_insert_val .= ", '$this->grupos'";
                  } 
                  if ($this->pago_transferencia != "")
                  { 
                       $compl_insert     .= ", pago_transferencia";
                       $compl_insert_val .= ", '$this->pago_transferencia'";
                  } 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "codcte01, nomcte01, tipcte01, ofienccte01, vendcte01, cobrcte01, loccte01, dircte01, telcte01, cascte01, fecing01, condpag01, cheqpro01, comentcte01, statuscte01, identcte01, cordcte01, limcant01, pagleg01, telcte01b, telcte01c, emailcte01, ctacgcte01, obsercte01, imagencte01, block, UID, ultimoacceso, catcte01, numautosri01, seriedoc01, fecvencdoc01, repleg01, coddest01, longitud01, latitud01, zoom01, tipo_identificacion, es_padre, clase_contribuyente, tipo_contribuyente, lleva_contabilidad, ctacgant01, codigo_banco, tipo_cuenta_banco, nro_cuenta_banco $compl_insert) VALUES (" . $NM_seq_auto . "'$this->codcte01', '$this->nomcte01', '$this->tipcte01', '$this->ofienccte01', '$this->vendcte01', '$this->cobrcte01', '$this->loccte01', '$this->dircte01', '$this->telcte01', '$this->cascte01', " . $this->Ini->date_delim . $this->fecing01 . $this->Ini->date_delim1 . ", '$this->condpag01', $this->cheqpro01, '$this->comentcte01', $this->statuscte01, '$this->identcte01', '$this->cordcte01', $this->limcant01, '$this->pagleg01', '$this->telcte01b', '$this->telcte01c', '$this->emailcte01', '$this->ctacgcte01', '$this->obsercte01', '$this->imagencte01', $this->block, $this->uid, $this->ultimoacceso, '$this->catcte01', '$this->numautosri01', '$this->seriedoc01', " . $this->Ini->date_delim . $this->fecvencdoc01 . $this->Ini->date_delim1 . ", '$this->repleg01', '$this->coddest01', '$this->longitud01', '$this->latitud01', $this->zoom01, '$this->tipo_identificacion', $this->es_padre, '$this->clase_contribuyente', '$this->tipo_contribuyente', '$this->lleva_contabilidad', '$this->ctacgant01', '$this->codigo_banco', '$this->tipo_cuenta_banco', '$this->nro_cuenta_banco' $compl_insert_val)"; 
              }
              elseif ($this->Ini->nm_tpbanco == 'pdo_ibm')
              {
                  $compl_insert     = ""; 
                  $compl_insert_val = ""; 
                  if ($this->cv1cte01 != "")
                  { 
                       $compl_insert     .= ", cv1cte01";
                       $compl_insert_val .= ", '$this->cv1cte01'";
                  } 
                  if ($this->cv2cte01 != "")
                  { 
                       $compl_insert     .= ", cv2cte01";
                       $compl_insert_val .= ", '$this->cv2cte01'";
                  } 
                  if ($this->desctocte01 != "")
                  { 
                       $compl_insert     .= ", desctocte01";
                       $compl_insert_val .= ", $this->desctocte01";
                  } 
                  if ($this->limcred01 != "")
                  { 
                       $compl_insert     .= ", limcred01";
                       $compl_insert_val .= ", $this->limcred01";
                  } 
                  if ($this->desppar01 != "")
                  { 
                       $compl_insert     .= ", desppar01";
                       $compl_insert_val .= ", '$this->desppar01'";
                  } 
                  if ($this->sdoeje01 != "")
                  { 
                       $compl_insert     .= ", sdoeje01";
                       $compl_insert_val .= ", $this->sdoeje01";
                  } 
                  if ($this->sdoant01 != "")
                  { 
                       $compl_insert     .= ", sdoant01";
                       $compl_insert_val .= ", $this->sdoant01";
                  } 
                  if ($this->sdoact01 != "")
                  { 
                       $compl_insert     .= ", sdoact01";
                       $compl_insert_val .= ", $this->sdoact01";
                  } 
                  if ($this->acudbm01 != "")
                  { 
                       $compl_insert     .= ", acudbm01";
                       $compl_insert_val .= ", $this->acudbm01";
                  } 
                  if ($this->acucrm01 != "")
                  { 
                       $compl_insert     .= ", acucrm01";
                       $compl_insert_val .= ", $this->acucrm01";
                  } 
                  if ($this->acudbe01 != "")
                  { 
                       $compl_insert     .= ", acudbe01";
                       $compl_insert_val .= ", $this->acudbe01";
                  } 
                  if ($this->acucre01 != "")
                  { 
                       $compl_insert     .= ", acucre01";
                       $compl_insert_val .= ", $this->acucre01";
                  } 
                  if ($this->totexceso01 != "")
                  { 
                       $compl_insert     .= ", totexceso01";
                       $compl_insert_val .= ", $this->totexceso01";
                  } 
                  if ($this->coniva01 != "")
                  { 
                       $compl_insert     .= ", coniva01";
                       $compl_insert_val .= ", '$this->coniva01'";
                  } 
                  if ($this->conret01 != "")
                  { 
                       $compl_insert     .= ", conret01";
                       $compl_insert_val .= ", '$this->conret01'";
                  } 
                  if ($this->bonos != "")
                  { 
                       $compl_insert     .= ", bonos";
                       $compl_insert_val .= ", '$this->bonos'";
                  } 
                  if ($this->rendimiento != "")
                  { 
                       $compl_insert     .= ", rendimiento";
                       $compl_insert_val .= ", '$this->rendimiento'";
                  } 
                  if ($this->parterel01 != "")
                  { 
                       $compl_insert     .= ", parteRel01";
                       $compl_insert_val .= ", '$this->parterel01'";
                  } 
                  if ($this->residentefiscal01 != "")
                  { 
                       $compl_insert     .= ", residenteFiscal01";
                       $compl_insert_val .= ", '$this->residentefiscal01'";
                  } 
                  if ($this->es_cliente != "")
                  { 
                       $compl_insert     .= ", es_cliente";
                       $compl_insert_val .= ", '$this->es_cliente'";
                  } 
                  if ($this->grupos != "")
                  { 
                       $compl_insert     .= ", grupos";
                       $compl_insert_val .= ", '$this->grupos'";
                  } 
                  if ($this->pago_transferencia != "")
                  { 
                       $compl_insert     .= ", pago_transferencia";
                       $compl_insert_val .= ", '$this->pago_transferencia'";
                  } 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "codcte01, nomcte01, tipcte01, ofienccte01, vendcte01, cobrcte01, loccte01, dircte01, telcte01, cascte01, fecing01, condpag01, cheqpro01, comentcte01, statuscte01, identcte01, cordcte01, limcant01, pagleg01, telcte01b, telcte01c, emailcte01, ctacgcte01, obsercte01, imagencte01, block, UID, ultimoacceso, catcte01, numautosri01, seriedoc01, fecvencdoc01, repleg01, coddest01, longitud01, latitud01, zoom01, tipo_identificacion, es_padre, clase_contribuyente, tipo_contribuyente, lleva_contabilidad, ctacgant01, codigo_banco, tipo_cuenta_banco, nro_cuenta_banco $compl_insert) VALUES (" . $NM_seq_auto . "'$this->codcte01', '$this->nomcte01', '$this->tipcte01', '$this->ofienccte01', '$this->vendcte01', '$this->cobrcte01', '$this->loccte01', '$this->dircte01', '$this->telcte01', '$this->cascte01', " . $this->Ini->date_delim . $this->fecing01 . $this->Ini->date_delim1 . ", '$this->condpag01', $this->cheqpro01, '$this->comentcte01', $this->statuscte01, '$this->identcte01', '$this->cordcte01', $this->limcant01, '$this->pagleg01', '$this->telcte01b', '$this->telcte01c', '$this->emailcte01', '$this->ctacgcte01', '$this->obsercte01', '$this->imagencte01', $this->block, $this->uid, $this->ultimoacceso, '$this->catcte01', '$this->numautosri01', '$this->seriedoc01', " . $this->Ini->date_delim . $this->fecvencdoc01 . $this->Ini->date_delim1 . ", '$this->repleg01', '$this->coddest01', '$this->longitud01', '$this->latitud01', $this->zoom01, '$this->tipo_identificacion', $this->es_padre, '$this->clase_contribuyente', '$this->tipo_contribuyente', '$this->lleva_contabilidad', '$this->ctacgant01', '$this->codigo_banco', '$this->tipo_cuenta_banco', '$this->nro_cuenta_banco' $compl_insert_val)"; 
              }
              else
              {
                  $compl_insert     = ""; 
                  $compl_insert_val = ""; 
                  if ($this->cv1cte01 != "")
                  { 
                       $compl_insert     .= ", cv1cte01";
                       $compl_insert_val .= ", '$this->cv1cte01'";
                  } 
                  if ($this->cv2cte01 != "")
                  { 
                       $compl_insert     .= ", cv2cte01";
                       $compl_insert_val .= ", '$this->cv2cte01'";
                  } 
                  if ($this->desctocte01 != "")
                  { 
                       $compl_insert     .= ", desctocte01";
                       $compl_insert_val .= ", $this->desctocte01";
                  } 
                  if ($this->limcred01 != "")
                  { 
                       $compl_insert     .= ", limcred01";
                       $compl_insert_val .= ", $this->limcred01";
                  } 
                  if ($this->desppar01 != "")
                  { 
                       $compl_insert     .= ", desppar01";
                       $compl_insert_val .= ", '$this->desppar01'";
                  } 
                  if ($this->sdoeje01 != "")
                  { 
                       $compl_insert     .= ", sdoeje01";
                       $compl_insert_val .= ", $this->sdoeje01";
                  } 
                  if ($this->sdoant01 != "")
                  { 
                       $compl_insert     .= ", sdoant01";
                       $compl_insert_val .= ", $this->sdoant01";
                  } 
                  if ($this->sdoact01 != "")
                  { 
                       $compl_insert     .= ", sdoact01";
                       $compl_insert_val .= ", $this->sdoact01";
                  } 
                  if ($this->acudbm01 != "")
                  { 
                       $compl_insert     .= ", acudbm01";
                       $compl_insert_val .= ", $this->acudbm01";
                  } 
                  if ($this->acucrm01 != "")
                  { 
                       $compl_insert     .= ", acucrm01";
                       $compl_insert_val .= ", $this->acucrm01";
                  } 
                  if ($this->acudbe01 != "")
                  { 
                       $compl_insert     .= ", acudbe01";
                       $compl_insert_val .= ", $this->acudbe01";
                  } 
                  if ($this->acucre01 != "")
                  { 
                       $compl_insert     .= ", acucre01";
                       $compl_insert_val .= ", $this->acucre01";
                  } 
                  if ($this->totexceso01 != "")
                  { 
                       $compl_insert     .= ", totexceso01";
                       $compl_insert_val .= ", $this->totexceso01";
                  } 
                  if ($this->coniva01 != "")
                  { 
                       $compl_insert     .= ", coniva01";
                       $compl_insert_val .= ", '$this->coniva01'";
                  } 
                  if ($this->conret01 != "")
                  { 
                       $compl_insert     .= ", conret01";
                       $compl_insert_val .= ", '$this->conret01'";
                  } 
                  if ($this->bonos != "")
                  { 
                       $compl_insert     .= ", bonos";
                       $compl_insert_val .= ", '$this->bonos'";
                  } 
                  if ($this->rendimiento != "")
                  { 
                       $compl_insert     .= ", rendimiento";
                       $compl_insert_val .= ", '$this->rendimiento'";
                  } 
                  if ($this->parterel01 != "")
                  { 
                       $compl_insert     .= ", parteRel01";
                       $compl_insert_val .= ", '$this->parterel01'";
                  } 
                  if ($this->residentefiscal01 != "")
                  { 
                       $compl_insert     .= ", residenteFiscal01";
                       $compl_insert_val .= ", '$this->residentefiscal01'";
                  } 
                  if ($this->es_cliente != "")
                  { 
                       $compl_insert     .= ", es_cliente";
                       $compl_insert_val .= ", '$this->es_cliente'";
                  } 
                  if ($this->grupos != "")
                  { 
                       $compl_insert     .= ", grupos";
                       $compl_insert_val .= ", '$this->grupos'";
                  } 
                  if ($this->pago_transferencia != "")
                  { 
                       $compl_insert     .= ", pago_transferencia";
                       $compl_insert_val .= ", '$this->pago_transferencia'";
                  } 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "codcte01, nomcte01, tipcte01, ofienccte01, vendcte01, cobrcte01, loccte01, dircte01, telcte01, cascte01, fecing01, condpag01, cheqpro01, comentcte01, statuscte01, identcte01, cordcte01, limcant01, pagleg01, telcte01b, telcte01c, emailcte01, ctacgcte01, obsercte01, imagencte01, block, UID, ultimoacceso, catcte01, numautosri01, seriedoc01, fecvencdoc01, repleg01, coddest01, longitud01, latitud01, zoom01, tipo_identificacion, es_padre, clase_contribuyente, tipo_contribuyente, lleva_contabilidad, ctacgant01, codigo_banco, tipo_cuenta_banco, nro_cuenta_banco $compl_insert) VALUES (" . $NM_seq_auto . "'$this->codcte01', '$this->nomcte01', '$this->tipcte01', '$this->ofienccte01', '$this->vendcte01', '$this->cobrcte01', '$this->loccte01', '$this->dircte01', '$this->telcte01', '$this->cascte01', " . $this->Ini->date_delim . $this->fecing01 . $this->Ini->date_delim1 . ", '$this->condpag01', $this->cheqpro01, '$this->comentcte01', $this->statuscte01, '$this->identcte01', '$this->cordcte01', $this->limcant01, '$this->pagleg01', '$this->telcte01b', '$this->telcte01c', '$this->emailcte01', '$this->ctacgcte01', '$this->obsercte01', '$this->imagencte01', $this->block, $this->uid, $this->ultimoacceso, '$this->catcte01', '$this->numautosri01', '$this->seriedoc01', " . $this->Ini->date_delim . $this->fecvencdoc01 . $this->Ini->date_delim1 . ", '$this->repleg01', '$this->coddest01', '$this->longitud01', '$this->latitud01', $this->zoom01, '$this->tipo_identificacion', $this->es_padre, '$this->clase_contribuyente', '$this->tipo_contribuyente', '$this->lleva_contabilidad', '$this->ctacgant01', '$this->codigo_banco', '$this->tipo_cuenta_banco', '$this->nro_cuenta_banco' $compl_insert_val)"; 
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
                              form_maepag_pack_ajax_response();
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
                          form_maepag_pack_ajax_response();
                      }
                      exit; 
                  } 
                  $this->idcli =  $rsy->fields[0];
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
                  $this->idcli = $rsy->fields[0];
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
                  $this->idcli = $rsy->fields[0];
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
                  $this->idcli = $rsy->fields[0];
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
                  $this->idcli = $rsy->fields[0];
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
                  $this->idcli = $rsy->fields[0];
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
                  $this->idcli = $rsy->fields[0];
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
                  $this->idcli = $rsy->fields[0];
                  $rsy->Close(); 
              } 
              $this->codcte01 = $this->codcte01_before_qstr;
              $this->nomcte01 = $this->nomcte01_before_qstr;
              $this->cv1cte01 = $this->cv1cte01_before_qstr;
              $this->cv2cte01 = $this->cv2cte01_before_qstr;
              $this->tipcte01 = $this->tipcte01_before_qstr;
              $this->ofienccte01 = $this->ofienccte01_before_qstr;
              $this->vendcte01 = $this->vendcte01_before_qstr;
              $this->cobrcte01 = $this->cobrcte01_before_qstr;
              $this->loccte01 = $this->loccte01_before_qstr;
              $this->dircte01 = $this->dircte01_before_qstr;
              $this->telcte01 = $this->telcte01_before_qstr;
              $this->cascte01 = $this->cascte01_before_qstr;
              $this->condpag01 = $this->condpag01_before_qstr;
              $this->desppar01 = $this->desppar01_before_qstr;
              $this->comentcte01 = $this->comentcte01_before_qstr;
              $this->identcte01 = $this->identcte01_before_qstr;
              $this->cordcte01 = $this->cordcte01_before_qstr;
              $this->pagleg01 = $this->pagleg01_before_qstr;
              $this->telcte01b = $this->telcte01b_before_qstr;
              $this->telcte01c = $this->telcte01c_before_qstr;
              $this->emailcte01 = $this->emailcte01_before_qstr;
              $this->ctacgcte01 = $this->ctacgcte01_before_qstr;
              $this->obsercte01 = $this->obsercte01_before_qstr;
              $this->imagencte01 = $this->imagencte01_before_qstr;
              $this->catcte01 = $this->catcte01_before_qstr;
              $this->numautosri01 = $this->numautosri01_before_qstr;
              $this->seriedoc01 = $this->seriedoc01_before_qstr;
              $this->repleg01 = $this->repleg01_before_qstr;
              $this->coddest01 = $this->coddest01_before_qstr;
              $this->longitud01 = $this->longitud01_before_qstr;
              $this->latitud01 = $this->latitud01_before_qstr;
              $this->coniva01 = $this->coniva01_before_qstr;
              $this->conret01 = $this->conret01_before_qstr;
              $this->tipo_identificacion = $this->tipo_identificacion_before_qstr;
              $this->bonos = $this->bonos_before_qstr;
              $this->rendimiento = $this->rendimiento_before_qstr;
              $this->parterel01 = $this->parterel01_before_qstr;
              $this->clase_contribuyente = $this->clase_contribuyente_before_qstr;
              $this->tipo_contribuyente = $this->tipo_contribuyente_before_qstr;
              $this->lleva_contabilidad = $this->lleva_contabilidad_before_qstr;
              $this->ctacgant01 = $this->ctacgant01_before_qstr;
              $this->residentefiscal01 = $this->residentefiscal01_before_qstr;
              $this->es_cliente = $this->es_cliente_before_qstr;
              $this->grupos = $this->grupos_before_qstr;
              $this->codigo_banco = $this->codigo_banco_before_qstr;
              $this->tipo_cuenta_banco = $this->tipo_cuenta_banco_before_qstr;
              $this->nro_cuenta_banco = $this->nro_cuenta_banco_before_qstr;
              $this->pago_transferencia = $this->pago_transferencia_before_qstr;
              }

              $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['db_changed'] = true;

              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['total']))
              {
                  unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['total']);
              }

              $this->sc_evento = "insert"; 
              $this->codcte01 = $this->codcte01_before_qstr;
              $this->nomcte01 = $this->nomcte01_before_qstr;
              $this->cv1cte01 = $this->cv1cte01_before_qstr;
              $this->cv2cte01 = $this->cv2cte01_before_qstr;
              $this->tipcte01 = $this->tipcte01_before_qstr;
              $this->ofienccte01 = $this->ofienccte01_before_qstr;
              $this->vendcte01 = $this->vendcte01_before_qstr;
              $this->cobrcte01 = $this->cobrcte01_before_qstr;
              $this->loccte01 = $this->loccte01_before_qstr;
              $this->dircte01 = $this->dircte01_before_qstr;
              $this->telcte01 = $this->telcte01_before_qstr;
              $this->cascte01 = $this->cascte01_before_qstr;
              $this->condpag01 = $this->condpag01_before_qstr;
              $this->desppar01 = $this->desppar01_before_qstr;
              $this->comentcte01 = $this->comentcte01_before_qstr;
              $this->identcte01 = $this->identcte01_before_qstr;
              $this->cordcte01 = $this->cordcte01_before_qstr;
              $this->pagleg01 = $this->pagleg01_before_qstr;
              $this->telcte01b = $this->telcte01b_before_qstr;
              $this->telcte01c = $this->telcte01c_before_qstr;
              $this->emailcte01 = $this->emailcte01_before_qstr;
              $this->ctacgcte01 = $this->ctacgcte01_before_qstr;
              $this->obsercte01 = $this->obsercte01_before_qstr;
              $this->imagencte01 = $this->imagencte01_before_qstr;
              $this->catcte01 = $this->catcte01_before_qstr;
              $this->numautosri01 = $this->numautosri01_before_qstr;
              $this->seriedoc01 = $this->seriedoc01_before_qstr;
              $this->repleg01 = $this->repleg01_before_qstr;
              $this->coddest01 = $this->coddest01_before_qstr;
              $this->longitud01 = $this->longitud01_before_qstr;
              $this->latitud01 = $this->latitud01_before_qstr;
              $this->coniva01 = $this->coniva01_before_qstr;
              $this->conret01 = $this->conret01_before_qstr;
              $this->tipo_identificacion = $this->tipo_identificacion_before_qstr;
              $this->bonos = $this->bonos_before_qstr;
              $this->rendimiento = $this->rendimiento_before_qstr;
              $this->parterel01 = $this->parterel01_before_qstr;
              $this->clase_contribuyente = $this->clase_contribuyente_before_qstr;
              $this->tipo_contribuyente = $this->tipo_contribuyente_before_qstr;
              $this->lleva_contabilidad = $this->lleva_contabilidad_before_qstr;
              $this->ctacgant01 = $this->ctacgant01_before_qstr;
              $this->residentefiscal01 = $this->residentefiscal01_before_qstr;
              $this->es_cliente = $this->es_cliente_before_qstr;
              $this->grupos = $this->grupos_before_qstr;
              $this->codigo_banco = $this->codigo_banco_before_qstr;
              $this->tipo_cuenta_banco = $this->tipo_cuenta_banco_before_qstr;
              $this->nro_cuenta_banco = $this->nro_cuenta_banco_before_qstr;
              $this->pago_transferencia = $this->pago_transferencia_before_qstr;
              $this->sc_insert_on = true; 
              if (empty($this->sc_erro_insert)) {
                  $this->record_insert_ok = true;
              } 
              if ('refresh_insert' != $this->nmgp_opcao && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['sc_redir_insert']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['sc_redir_insert'] != "S"))
              {
              $this->nmgp_opcao = "novo"; 
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['run_iframe'] == "R")
              { 
                   $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['return_edit'] = "new";
              } 
              }
              $this->nm_flag_iframe = true;
          } 
          if ($this->lig_edit_lookup)
          {
              $this->lig_edit_lookup_call = true;
          }
      } 
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['decimal_db'] == ",") 
      {
          $this->nm_tira_aspas_decimal();
      }
      if ($this->nmgp_opcao == "excluir") 
      { 
          $this->idcli = substr($this->Db->qstr($this->idcli), 1, -1); 

          $bDelecaoOk = true;
          $sMsgErro   = '';

          if ($bDelecaoOk)
          {

          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idcli = $this->idcli"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idcli = $this->idcli "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idcli = $this->idcli"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idcli = $this->idcli "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idcli = $this->idcli"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idcli = $this->idcli "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idcli = $this->idcli"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idcli = $this->idcli "); 
          }  
          else  
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idcli = $this->idcli"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idcli = $this->idcli "); 
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
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where idcli = $this->idcli "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where idcli = $this->idcli "); 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where idcli = $this->idcli "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where idcli = $this->idcli "); 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              {
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where idcli = $this->idcli "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where idcli = $this->idcli "); 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where idcli = $this->idcli "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where idcli = $this->idcli "); 
              }  
              else  
              {
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where idcli = $this->idcli "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where idcli = $this->idcli "); 
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
                          form_maepag_pack_ajax_response();
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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['reg_start']--; 
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['reg_start'] < 0)
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['reg_start'] = 0; 
              }

              $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['db_changed'] = true;

              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['total']))
              {
                  unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['total']);
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
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['parms'] = "idcli?#?$this->idcli?@?"; 
      }
      $this->NM_commit_db(); 
      if ($this->sc_evento != "insert" && $this->sc_evento != "update" && $this->sc_evento != "delete")
      { 
          $this->idcli = null === $this->idcli ? null : substr($this->Db->qstr($this->idcli), 1, -1); 
      } 
      if (isset($this->NM_where_filter))
      {
          $this->NM_where_filter = str_replace("@percent@", "%", $this->NM_where_filter);
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['where_filter'] = trim($this->NM_where_filter);
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['total']))
          {
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['total']);
          }
      }
      $sc_where_filter = '';
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['where_filter_form']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['where_filter_form'])
      {
          $sc_where_filter = $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['where_filter_form'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['where_filter']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['where_filter'] && $sc_where_filter != $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['where_filter'])
      {
          if (empty($sc_where_filter))
          {
              $sc_where_filter = $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['where_filter'];
          }
          else
          {
              $sc_where_filter .= " and (" . $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['where_filter'] . ")";
          }
      }
//------------ 
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['run_iframe'] == "R")
      {
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['iframe_evento'] == "insert") 
          { 
               $this->nmgp_opcao = "novo"; 
               $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['select'] = "";
          } 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['iframe_evento'] = $this->sc_evento; 
      } 
      if (!isset($this->nmgp_opcao) || empty($this->nmgp_opcao)) 
      { 
          if (empty($this->idcli)) 
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
      if ($this->nmgp_opcao != "nada" && (trim($this->idcli) == "")) 
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
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['run_iframe'] == "F" && $this->sc_evento == "insert")
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
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['total']))
      { 
          $nmgp_select = "SELECT count(*) AS countTest from " . $this->Ini->nm_tabela . $sc_where; 
          $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
          $rt = $this->Db->Execute($nmgp_select) ; 
          if ($rt === false && !$rt->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
              exit ; 
          }  
          $qt_geral_reg_form_maepag = isset($rt->fields[0]) ? $rt->fields[0] - 1 : 0; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['total'] = $qt_geral_reg_form_maepag;
          $rt->Close(); 
          if ($this->nmgp_opcao == "igual" && isset($this->NM_btn_navega) && 'S' == $this->NM_btn_navega && !empty($this->idcli))
          {
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              {
                  $Key_Where = "idcli < $this->idcli "; 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
                  $Key_Where = "idcli < $this->idcli "; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              {
                  $Key_Where = "idcli < $this->idcli "; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $Key_Where = "idcli < $this->idcli "; 
              }
              else  
              {
                  $Key_Where = "idcli < $this->idcli "; 
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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['reg_start'] = $rt->fields[0];
              $rt->Close(); 
          }
      } 
      else 
      { 
          $qt_geral_reg_form_maepag = $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['total'];
      } 
      if ($this->nmgp_opcao == "inicio") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['reg_start'] = 0; 
      } 
      if ($this->nmgp_opcao == "avanca")  
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['reg_start']++; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['reg_start'] > $qt_geral_reg_form_maepag)
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['reg_start'] = $qt_geral_reg_form_maepag; 
          }
      } 
      if ($this->nmgp_opcao == "retorna") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['reg_start']--; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['reg_start'] < 0)
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['reg_start'] = 0; 
          }
      } 
      if ($this->nmgp_opcao == "final") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['reg_start'] = $qt_geral_reg_form_maepag; 
      } 
      if ($this->nmgp_opcao == "navpage" && ($this->nmgp_ordem - 1) <= $qt_geral_reg_form_maepag) 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['reg_start'] = $this->nmgp_ordem - 1; 
      } 
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['reg_start']) || empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['reg_start']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['reg_start'] = 0;
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['reg_qtd'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['reg_start'] + 1;
      $this->NM_ajax_info['navSummary']['reg_ini'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['reg_start'] + 1; 
      $this->NM_ajax_info['navSummary']['reg_qtd'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['reg_qtd']; 
      $this->NM_ajax_info['navSummary']['reg_tot'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['total'] + 1; 
      $this->NM_gera_nav_page(); 
      $this->NM_ajax_info['navPage'] = $this->SC_nav_page; 
      $GLOBALS["NM_ERRO_IBASE"] = 0;  
//---------- 
      if ($this->nmgp_opcao != "novo" && $this->nmgp_opcao != "nada" && $this->nmgp_opcao != "refresh_insert") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['parms'] = ""; 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
          { 
              $GLOBALS["NM_ERRO_IBASE"] = 1;  
          } 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
          { 
              $nmgp_select = "SELECT codcte01, nomcte01, cv1cte01, cv2cte01, tipcte01, ofienccte01, vendcte01, cobrcte01, loccte01, dircte01, telcte01, cascte01, str_replace (convert(char(10),fecing01,102), '.', '-') + ' ' + convert(char(8),fecing01,20), condpag01, desctocte01, limcred01, desppar01, cheqpro01, sdoeje01, sdoant01, sdoact01, acudbm01, acucrm01, acudbe01, acucre01, comentcte01, statuscte01, identcte01, cordcte01, limcant01, pagleg01, telcte01b, telcte01c, emailcte01, ctacgcte01, obsercte01, totexceso01, imagencte01, block, UID, ultimoacceso, idcli, catcte01, numautosri01, seriedoc01, str_replace (convert(char(10),fecvencdoc01,102), '.', '-') + ' ' + convert(char(8),fecvencdoc01,20), repleg01, coddest01, longitud01, latitud01, zoom01, coniva01, conret01, tipo_identificacion, es_padre, bonos, rendimiento, parteRel01, clase_contribuyente, tipo_contribuyente, lleva_contabilidad, ctacgant01, residenteFiscal01, es_cliente, grupos, codigo_banco, tipo_cuenta_banco, nro_cuenta_banco, pago_transferencia from " . $this->Ini->nm_tabela ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          { 
              $nmgp_select = "SELECT codcte01, nomcte01, cv1cte01, cv2cte01, tipcte01, ofienccte01, vendcte01, cobrcte01, loccte01, dircte01, telcte01, cascte01, convert(char(23),fecing01,121), condpag01, desctocte01, limcred01, desppar01, cheqpro01, sdoeje01, sdoant01, sdoact01, acudbm01, acucrm01, acudbe01, acucre01, comentcte01, statuscte01, identcte01, cordcte01, limcant01, pagleg01, telcte01b, telcte01c, emailcte01, ctacgcte01, obsercte01, totexceso01, imagencte01, block, UID, ultimoacceso, idcli, catcte01, numautosri01, seriedoc01, convert(char(23),fecvencdoc01,121), repleg01, coddest01, longitud01, latitud01, zoom01, coniva01, conret01, tipo_identificacion, es_padre, bonos, rendimiento, parteRel01, clase_contribuyente, tipo_contribuyente, lleva_contabilidad, ctacgant01, residenteFiscal01, es_cliente, grupos, codigo_banco, tipo_cuenta_banco, nro_cuenta_banco, pago_transferencia from " . $this->Ini->nm_tabela ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          { 
              $nmgp_select = "SELECT codcte01, nomcte01, cv1cte01, cv2cte01, tipcte01, ofienccte01, vendcte01, cobrcte01, loccte01, dircte01, telcte01, cascte01, fecing01, condpag01, desctocte01, limcred01, desppar01, cheqpro01, sdoeje01, sdoant01, sdoact01, acudbm01, acucrm01, acudbe01, acucre01, comentcte01, statuscte01, identcte01, cordcte01, limcant01, pagleg01, telcte01b, telcte01c, emailcte01, ctacgcte01, obsercte01, totexceso01, imagencte01, block, UID, ultimoacceso, idcli, catcte01, numautosri01, seriedoc01, fecvencdoc01, repleg01, coddest01, longitud01, latitud01, zoom01, coniva01, conret01, tipo_identificacion, es_padre, bonos, rendimiento, parteRel01, clase_contribuyente, tipo_contribuyente, lleva_contabilidad, ctacgant01, residenteFiscal01, es_cliente, grupos, codigo_banco, tipo_cuenta_banco, nro_cuenta_banco, pago_transferencia from " . $this->Ini->nm_tabela ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          { 
              $nmgp_select = "SELECT codcte01, nomcte01, cv1cte01, cv2cte01, tipcte01, ofienccte01, vendcte01, cobrcte01, loccte01, dircte01, telcte01, cascte01, EXTEND(fecing01, YEAR TO FRACTION), condpag01, desctocte01, limcred01, desppar01, cheqpro01, sdoeje01, sdoant01, sdoact01, acudbm01, acucrm01, acudbe01, acucre01, comentcte01, statuscte01, identcte01, cordcte01, limcant01, pagleg01, telcte01b, telcte01c, emailcte01, ctacgcte01, obsercte01, totexceso01, imagencte01, block, UID, ultimoacceso, idcli, catcte01, numautosri01, seriedoc01, EXTEND(fecvencdoc01, YEAR TO DAY), repleg01, coddest01, longitud01, latitud01, zoom01, coniva01, conret01, tipo_identificacion, es_padre, bonos, rendimiento, parteRel01, clase_contribuyente, tipo_contribuyente, lleva_contabilidad, ctacgant01, residenteFiscal01, es_cliente, grupos, codigo_banco, tipo_cuenta_banco, nro_cuenta_banco, pago_transferencia from " . $this->Ini->nm_tabela ; 
          } 
          else 
          { 
              $nmgp_select = "SELECT codcte01, nomcte01, cv1cte01, cv2cte01, tipcte01, ofienccte01, vendcte01, cobrcte01, loccte01, dircte01, telcte01, cascte01, fecing01, condpag01, desctocte01, limcred01, desppar01, cheqpro01, sdoeje01, sdoant01, sdoact01, acudbm01, acucrm01, acudbe01, acucre01, comentcte01, statuscte01, identcte01, cordcte01, limcant01, pagleg01, telcte01b, telcte01c, emailcte01, ctacgcte01, obsercte01, totexceso01, imagencte01, block, UID, ultimoacceso, idcli, catcte01, numautosri01, seriedoc01, fecvencdoc01, repleg01, coddest01, longitud01, latitud01, zoom01, coniva01, conret01, tipo_identificacion, es_padre, bonos, rendimiento, parteRel01, clase_contribuyente, tipo_contribuyente, lleva_contabilidad, ctacgant01, residenteFiscal01, es_cliente, grupos, codigo_banco, tipo_cuenta_banco, nro_cuenta_banco, pago_transferencia from " . $this->Ini->nm_tabela ; 
          } 
          $aWhere = array();
          $aWhere[] = $sc_where_filter;
          if ($this->nmgp_opcao == "igual" || (($_SESSION['sc_session'][$this->Ini->sc_page]['form_adm_clientes']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_adm_clientes']['run_iframe'] == "R") && ($this->sc_evento == "insert" || $this->sc_evento == "update")) )
          { 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              {
                  $aWhere[] = "idcli = $this->idcli"; 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
                  $aWhere[] = "idcli = $this->idcli"; 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              {
                  $aWhere[] = "idcli = $this->idcli"; 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $aWhere[] = "idcli = $this->idcli"; 
              }  
              else  
              {
                  $aWhere[] = "idcli = $this->idcli"; 
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
          $sc_order_by = "idcli";
          $sc_order_by = str_replace("order by ", "", $sc_order_by);
          $sc_order_by = str_replace("ORDER BY ", "", trim($sc_order_by));
          if (!empty($sc_order_by))
          {
              $nmgp_select .= " order by $sc_order_by "; 
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['run_iframe'] == "R")
          {
              if ($this->sc_evento == "update")
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['select'] = $nmgp_select;
                  $this->nm_gera_html();
              } 
              elseif (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['select']))
              { 
                  $nmgp_select = $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['select'];
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['select'] = ""; 
              } 
          } 
          if ($this->nmgp_opcao == "igual") 
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
              $rs = $this->Db->Execute($nmgp_select) ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "SelectLimit($nmgp_select, 1, " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['reg_start'] . ")" ; 
              $rs = $this->Db->SelectLimit($nmgp_select, 1, $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['reg_start']) ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "SelectLimit($nmgp_select, 1, " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['reg_start'] . ")" ; 
              $rs = $this->Db->SelectLimit($nmgp_select, 1, $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['reg_start']) ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "SelectLimit($nmgp_select, 1, " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['reg_start'] . ")" ; 
              $rs = $this->Db->SelectLimit($nmgp_select, 1, $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['reg_start']) ; 
          } 
          else  
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
              $rs = $this->Db->Execute($nmgp_select) ; 
              if (!$rs === false && !$rs->EOF) 
              { 
                  $rs->Move($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['reg_start']) ;  
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
              if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['where_filter']))
              {
                  $this->nmgp_form_empty        = true;
                  $this->NM_ajax_info['buttonDisplay']['first']   = $this->nmgp_botoes['first']   = "off";
                  $this->NM_ajax_info['buttonDisplay']['back']    = $this->nmgp_botoes['back']    = "off";
                  $this->NM_ajax_info['buttonDisplay']['forward'] = $this->nmgp_botoes['forward'] = "off";
                  $this->NM_ajax_info['buttonDisplay']['last']    = $this->nmgp_botoes['last']    = "off";
                  $this->NM_ajax_info['buttonDisplay']['update']  = $this->nmgp_botoes['update']  = "off";
                  $this->NM_ajax_info['buttonDisplay']['delete']  = $this->nmgp_botoes['delete']  = "off";
                  $this->NM_ajax_info['buttonDisplay']['first']   = $this->nmgp_botoes['insert']  = "off";
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['empty_filter'] = true;
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
              $this->codcte01 = $rs->fields[0] ; 
              $this->nmgp_dados_select['codcte01'] = $this->codcte01;
              $this->nomcte01 = $rs->fields[1] ; 
              $this->nmgp_dados_select['nomcte01'] = $this->nomcte01;
              $this->cv1cte01 = $rs->fields[2] ; 
              $this->nmgp_dados_select['cv1cte01'] = $this->cv1cte01;
              $this->cv2cte01 = $rs->fields[3] ; 
              $this->nmgp_dados_select['cv2cte01'] = $this->cv2cte01;
              $this->tipcte01 = $rs->fields[4] ; 
              $this->nmgp_dados_select['tipcte01'] = $this->tipcte01;
              $this->ofienccte01 = $rs->fields[5] ; 
              $this->nmgp_dados_select['ofienccte01'] = $this->ofienccte01;
              $this->vendcte01 = $rs->fields[6] ; 
              $this->nmgp_dados_select['vendcte01'] = $this->vendcte01;
              $this->cobrcte01 = $rs->fields[7] ; 
              $this->nmgp_dados_select['cobrcte01'] = $this->cobrcte01;
              $this->loccte01 = $rs->fields[8] ; 
              $this->nmgp_dados_select['loccte01'] = $this->loccte01;
              $this->dircte01 = $rs->fields[9] ; 
              $this->nmgp_dados_select['dircte01'] = $this->dircte01;
              $this->telcte01 = $rs->fields[10] ; 
              $this->nmgp_dados_select['telcte01'] = $this->telcte01;
              $this->cascte01 = $rs->fields[11] ; 
              $this->nmgp_dados_select['cascte01'] = $this->cascte01;
              $this->fecing01 = $rs->fields[12] ; 
              if (substr($this->fecing01, 10, 1) == "-") 
              { 
                 $this->fecing01 = substr($this->fecing01, 0, 10) . " " . substr($this->fecing01, 11);
              } 
              if (substr($this->fecing01, 13, 1) == ".") 
              { 
                 $this->fecing01 = substr($this->fecing01, 0, 13) . ":" . substr($this->fecing01, 14, 2) . ":" . substr($this->fecing01, 17);
              } 
              $this->nmgp_dados_select['fecing01'] = $this->fecing01;
              $this->condpag01 = $rs->fields[13] ; 
              $this->nmgp_dados_select['condpag01'] = $this->condpag01;
              $this->desctocte01 = trim($rs->fields[14]) ; 
              $this->nmgp_dados_select['desctocte01'] = $this->desctocte01;
              $this->limcred01 = trim($rs->fields[15]) ; 
              $this->nmgp_dados_select['limcred01'] = $this->limcred01;
              $this->desppar01 = $rs->fields[16] ; 
              $this->nmgp_dados_select['desppar01'] = $this->desppar01;
              $this->cheqpro01 = $rs->fields[17] ; 
              $this->nmgp_dados_select['cheqpro01'] = $this->cheqpro01;
              $this->sdoeje01 = trim($rs->fields[18]) ; 
              $this->nmgp_dados_select['sdoeje01'] = $this->sdoeje01;
              $this->sdoant01 = trim($rs->fields[19]) ; 
              $this->nmgp_dados_select['sdoant01'] = $this->sdoant01;
              $this->sdoact01 = trim($rs->fields[20]) ; 
              $this->nmgp_dados_select['sdoact01'] = $this->sdoact01;
              $this->acudbm01 = trim($rs->fields[21]) ; 
              $this->nmgp_dados_select['acudbm01'] = $this->acudbm01;
              $this->acucrm01 = trim($rs->fields[22]) ; 
              $this->nmgp_dados_select['acucrm01'] = $this->acucrm01;
              $this->acudbe01 = trim($rs->fields[23]) ; 
              $this->nmgp_dados_select['acudbe01'] = $this->acudbe01;
              $this->acucre01 = trim($rs->fields[24]) ; 
              $this->nmgp_dados_select['acucre01'] = $this->acucre01;
              $this->comentcte01 = $rs->fields[25] ; 
              $this->nmgp_dados_select['comentcte01'] = $this->comentcte01;
              $this->statuscte01 = $rs->fields[26] ; 
              $this->nmgp_dados_select['statuscte01'] = $this->statuscte01;
              $this->identcte01 = $rs->fields[27] ; 
              $this->nmgp_dados_select['identcte01'] = $this->identcte01;
              $this->cordcte01 = $rs->fields[28] ; 
              $this->nmgp_dados_select['cordcte01'] = $this->cordcte01;
              $this->limcant01 = $rs->fields[29] ; 
              $this->nmgp_dados_select['limcant01'] = $this->limcant01;
              $this->pagleg01 = $rs->fields[30] ; 
              $this->nmgp_dados_select['pagleg01'] = $this->pagleg01;
              $this->telcte01b = $rs->fields[31] ; 
              $this->nmgp_dados_select['telcte01b'] = $this->telcte01b;
              $this->telcte01c = $rs->fields[32] ; 
              $this->nmgp_dados_select['telcte01c'] = $this->telcte01c;
              $this->emailcte01 = $rs->fields[33] ; 
              $this->nmgp_dados_select['emailcte01'] = $this->emailcte01;
              $this->ctacgcte01 = $rs->fields[34] ; 
              $this->nmgp_dados_select['ctacgcte01'] = $this->ctacgcte01;
              $this->obsercte01 = $rs->fields[35] ; 
              $this->nmgp_dados_select['obsercte01'] = $this->obsercte01;
              $this->totexceso01 = trim($rs->fields[36]) ; 
              $this->nmgp_dados_select['totexceso01'] = $this->totexceso01;
              $this->imagencte01 = $rs->fields[37] ; 
              $this->nmgp_dados_select['imagencte01'] = $this->imagencte01;
              $this->block = $rs->fields[38] ; 
              $this->nmgp_dados_select['block'] = $this->block;
              $this->uid = $rs->fields[39] ; 
              $this->nmgp_dados_select['uid'] = $this->uid;
              $this->ultimoacceso = $rs->fields[40] ; 
              $this->nmgp_dados_select['ultimoacceso'] = $this->ultimoacceso;
              $this->idcli = $rs->fields[41] ; 
              $this->nmgp_dados_select['idcli'] = $this->idcli;
              $this->catcte01 = $rs->fields[42] ; 
              $this->nmgp_dados_select['catcte01'] = $this->catcte01;
              $this->numautosri01 = $rs->fields[43] ; 
              $this->nmgp_dados_select['numautosri01'] = $this->numautosri01;
              $this->seriedoc01 = $rs->fields[44] ; 
              $this->nmgp_dados_select['seriedoc01'] = $this->seriedoc01;
              $this->fecvencdoc01 = $rs->fields[45] ; 
              $this->nmgp_dados_select['fecvencdoc01'] = $this->fecvencdoc01;
              $this->repleg01 = $rs->fields[46] ; 
              $this->nmgp_dados_select['repleg01'] = $this->repleg01;
              $this->coddest01 = $rs->fields[47] ; 
              $this->nmgp_dados_select['coddest01'] = $this->coddest01;
              $this->longitud01 = $rs->fields[48] ; 
              $this->nmgp_dados_select['longitud01'] = $this->longitud01;
              $this->latitud01 = $rs->fields[49] ; 
              $this->nmgp_dados_select['latitud01'] = $this->latitud01;
              $this->zoom01 = $rs->fields[50] ; 
              $this->nmgp_dados_select['zoom01'] = $this->zoom01;
              $this->coniva01 = $rs->fields[51] ; 
              $this->nmgp_dados_select['coniva01'] = $this->coniva01;
              $this->conret01 = $rs->fields[52] ; 
              $this->nmgp_dados_select['conret01'] = $this->conret01;
              $this->tipo_identificacion = $rs->fields[53] ; 
              $this->nmgp_dados_select['tipo_identificacion'] = $this->tipo_identificacion;
              $this->es_padre = $rs->fields[54] ; 
              $this->nmgp_dados_select['es_padre'] = $this->es_padre;
              $this->bonos = $rs->fields[55] ; 
              $this->nmgp_dados_select['bonos'] = $this->bonos;
              $this->rendimiento = $rs->fields[56] ; 
              $this->nmgp_dados_select['rendimiento'] = $this->rendimiento;
              $this->parterel01 = $rs->fields[57] ; 
              $this->nmgp_dados_select['parterel01'] = $this->parterel01;
              $this->clase_contribuyente = $rs->fields[58] ; 
              $this->nmgp_dados_select['clase_contribuyente'] = $this->clase_contribuyente;
              $this->tipo_contribuyente = $rs->fields[59] ; 
              $this->nmgp_dados_select['tipo_contribuyente'] = $this->tipo_contribuyente;
              $this->lleva_contabilidad = $rs->fields[60] ; 
              $this->nmgp_dados_select['lleva_contabilidad'] = $this->lleva_contabilidad;
              $this->ctacgant01 = $rs->fields[61] ; 
              $this->nmgp_dados_select['ctacgant01'] = $this->ctacgant01;
              $this->residentefiscal01 = $rs->fields[62] ; 
              $this->nmgp_dados_select['residentefiscal01'] = $this->residentefiscal01;
              $this->es_cliente = $rs->fields[63] ; 
              $this->nmgp_dados_select['es_cliente'] = $this->es_cliente;
              $this->grupos = $rs->fields[64] ; 
              $this->nmgp_dados_select['grupos'] = $this->grupos;
              $this->codigo_banco = $rs->fields[65] ; 
              $this->nmgp_dados_select['codigo_banco'] = $this->codigo_banco;
              $this->tipo_cuenta_banco = $rs->fields[66] ; 
              $this->nmgp_dados_select['tipo_cuenta_banco'] = $this->tipo_cuenta_banco;
              $this->nro_cuenta_banco = $rs->fields[67] ; 
              $this->nmgp_dados_select['nro_cuenta_banco'] = $this->nro_cuenta_banco;
              $this->pago_transferencia = $rs->fields[68] ; 
              $this->nmgp_dados_select['pago_transferencia'] = $this->pago_transferencia;
          $GLOBALS["NM_ERRO_IBASE"] = 0; 
              $this->nm_troca_decimal(",", ".");
              $this->desctocte01 = (strpos(strtolower($this->desctocte01), "e")) ? (float)$this->desctocte01 : $this->desctocte01; 
              $this->desctocte01 = (string)$this->desctocte01; 
              $this->limcred01 = (strpos(strtolower($this->limcred01), "e")) ? (float)$this->limcred01 : $this->limcred01; 
              $this->limcred01 = (string)$this->limcred01; 
              $this->cheqpro01 = (string)$this->cheqpro01; 
              $this->sdoeje01 = (strpos(strtolower($this->sdoeje01), "e")) ? (float)$this->sdoeje01 : $this->sdoeje01; 
              $this->sdoeje01 = (string)$this->sdoeje01; 
              $this->sdoant01 = (strpos(strtolower($this->sdoant01), "e")) ? (float)$this->sdoant01 : $this->sdoant01; 
              $this->sdoant01 = (string)$this->sdoant01; 
              $this->sdoact01 = (strpos(strtolower($this->sdoact01), "e")) ? (float)$this->sdoact01 : $this->sdoact01; 
              $this->sdoact01 = (string)$this->sdoact01; 
              $this->acudbm01 = (strpos(strtolower($this->acudbm01), "e")) ? (float)$this->acudbm01 : $this->acudbm01; 
              $this->acudbm01 = (string)$this->acudbm01; 
              $this->acucrm01 = (strpos(strtolower($this->acucrm01), "e")) ? (float)$this->acucrm01 : $this->acucrm01; 
              $this->acucrm01 = (string)$this->acucrm01; 
              $this->acudbe01 = (strpos(strtolower($this->acudbe01), "e")) ? (float)$this->acudbe01 : $this->acudbe01; 
              $this->acudbe01 = (string)$this->acudbe01; 
              $this->acucre01 = (strpos(strtolower($this->acucre01), "e")) ? (float)$this->acucre01 : $this->acucre01; 
              $this->acucre01 = (string)$this->acucre01; 
              $this->statuscte01 = (string)$this->statuscte01; 
              $this->limcant01 = (string)$this->limcant01; 
              $this->totexceso01 = (strpos(strtolower($this->totexceso01), "e")) ? (float)$this->totexceso01 : $this->totexceso01; 
              $this->totexceso01 = (string)$this->totexceso01; 
              $this->block = (string)$this->block; 
              $this->uid = (string)$this->uid; 
              $this->ultimoacceso = (string)$this->ultimoacceso; 
              $this->idcli = (string)$this->idcli; 
              $this->zoom01 = (string)$this->zoom01; 
              $this->es_padre = (string)$this->es_padre; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['parms'] = "idcli?#?$this->idcli?@?";
          } 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['dados_select'] = $this->nmgp_dados_select;
          if (!$this->NM_ajax_flag || 'backup_line' != $this->NM_ajax_opcao)
          {
              $this->Nav_permite_ret = 0 != $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['reg_start'];
              $this->Nav_permite_ava = $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['reg_start'] < $qt_geral_reg_form_maepag;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['opcao']   = '';
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
              $this->codcte01 = "";  
              $this->nmgp_dados_form["codcte01"] = $this->codcte01;
              $this->nomcte01 = "";  
              $this->nmgp_dados_form["nomcte01"] = $this->nomcte01;
              $this->cv1cte01 = "";  
              $this->nmgp_dados_form["cv1cte01"] = $this->cv1cte01;
              $this->cv2cte01 = "";  
              $this->nmgp_dados_form["cv2cte01"] = $this->cv2cte01;
              $this->tipcte01 = "";  
              $this->nmgp_dados_form["tipcte01"] = $this->tipcte01;
              $this->ofienccte01 = "";  
              $this->nmgp_dados_form["ofienccte01"] = $this->ofienccte01;
              $this->vendcte01 = "";  
              $this->nmgp_dados_form["vendcte01"] = $this->vendcte01;
              $this->cobrcte01 = "";  
              $this->nmgp_dados_form["cobrcte01"] = $this->cobrcte01;
              $this->loccte01 = "";  
              $this->nmgp_dados_form["loccte01"] = $this->loccte01;
              $this->dircte01 = "";  
              $this->nmgp_dados_form["dircte01"] = $this->dircte01;
              $this->telcte01 = "";  
              $this->nmgp_dados_form["telcte01"] = $this->telcte01;
              $this->cascte01 = "";  
              $this->nmgp_dados_form["cascte01"] = $this->cascte01;
              $this->fecing01 = "";  
              $this->fecing01_hora = "" ;  
              $this->nmgp_dados_form["fecing01"] = $this->fecing01;
              $this->condpag01 = "";  
              $this->nmgp_dados_form["condpag01"] = $this->condpag01;
              $this->desctocte01 = "";  
              $this->nmgp_dados_form["desctocte01"] = $this->desctocte01;
              $this->limcred01 = "";  
              $this->nmgp_dados_form["limcred01"] = $this->limcred01;
              $this->desppar01 = "";  
              $this->nmgp_dados_form["desppar01"] = $this->desppar01;
              $this->cheqpro01 = "";  
              $this->nmgp_dados_form["cheqpro01"] = $this->cheqpro01;
              $this->sdoeje01 = "";  
              $this->nmgp_dados_form["sdoeje01"] = $this->sdoeje01;
              $this->sdoant01 = "";  
              $this->nmgp_dados_form["sdoant01"] = $this->sdoant01;
              $this->sdoact01 = "";  
              $this->nmgp_dados_form["sdoact01"] = $this->sdoact01;
              $this->acudbm01 = "";  
              $this->nmgp_dados_form["acudbm01"] = $this->acudbm01;
              $this->acucrm01 = "";  
              $this->nmgp_dados_form["acucrm01"] = $this->acucrm01;
              $this->acudbe01 = "";  
              $this->nmgp_dados_form["acudbe01"] = $this->acudbe01;
              $this->acucre01 = "";  
              $this->nmgp_dados_form["acucre01"] = $this->acucre01;
              $this->comentcte01 = "";  
              $this->nmgp_dados_form["comentcte01"] = $this->comentcte01;
              $this->statuscte01 = "";  
              $this->nmgp_dados_form["statuscte01"] = $this->statuscte01;
              $this->identcte01 = "";  
              $this->nmgp_dados_form["identcte01"] = $this->identcte01;
              $this->cordcte01 = "";  
              $this->nmgp_dados_form["cordcte01"] = $this->cordcte01;
              $this->limcant01 = "";  
              $this->nmgp_dados_form["limcant01"] = $this->limcant01;
              $this->pagleg01 = "";  
              $this->nmgp_dados_form["pagleg01"] = $this->pagleg01;
              $this->telcte01b = "";  
              $this->nmgp_dados_form["telcte01b"] = $this->telcte01b;
              $this->telcte01c = "";  
              $this->nmgp_dados_form["telcte01c"] = $this->telcte01c;
              $this->emailcte01 = "";  
              $this->nmgp_dados_form["emailcte01"] = $this->emailcte01;
              $this->ctacgcte01 = "";  
              $this->nmgp_dados_form["ctacgcte01"] = $this->ctacgcte01;
              $this->obsercte01 = "";  
              $this->nmgp_dados_form["obsercte01"] = $this->obsercte01;
              $this->totexceso01 = "";  
              $this->nmgp_dados_form["totexceso01"] = $this->totexceso01;
              $this->imagencte01 = "";  
              $this->nmgp_dados_form["imagencte01"] = $this->imagencte01;
              $this->block = "";  
              $this->nmgp_dados_form["block"] = $this->block;
              $this->uid = "";  
              $this->nmgp_dados_form["uid"] = $this->uid;
              $this->ultimoacceso = "";  
              $this->nmgp_dados_form["ultimoacceso"] = $this->ultimoacceso;
              $this->idcli = "";  
              $this->nmgp_dados_form["idcli"] = $this->idcli;
              $this->catcte01 = "";  
              $this->nmgp_dados_form["catcte01"] = $this->catcte01;
              $this->numautosri01 = "";  
              $this->nmgp_dados_form["numautosri01"] = $this->numautosri01;
              $this->seriedoc01 = "";  
              $this->nmgp_dados_form["seriedoc01"] = $this->seriedoc01;
              $this->fecvencdoc01 = "";  
              $this->fecvencdoc01_hora = "" ;  
              $this->nmgp_dados_form["fecvencdoc01"] = $this->fecvencdoc01;
              $this->repleg01 = "";  
              $this->nmgp_dados_form["repleg01"] = $this->repleg01;
              $this->coddest01 = "";  
              $this->nmgp_dados_form["coddest01"] = $this->coddest01;
              $this->longitud01 = "";  
              $this->nmgp_dados_form["longitud01"] = $this->longitud01;
              $this->latitud01 = "";  
              $this->nmgp_dados_form["latitud01"] = $this->latitud01;
              $this->zoom01 = "";  
              $this->nmgp_dados_form["zoom01"] = $this->zoom01;
              $this->coniva01 = "";  
              $this->nmgp_dados_form["coniva01"] = $this->coniva01;
              $this->conret01 = "";  
              $this->nmgp_dados_form["conret01"] = $this->conret01;
              $this->tipo_identificacion = "";  
              $this->nmgp_dados_form["tipo_identificacion"] = $this->tipo_identificacion;
              $this->es_padre = "";  
              $this->nmgp_dados_form["es_padre"] = $this->es_padre;
              $this->bonos = "";  
              $this->nmgp_dados_form["bonos"] = $this->bonos;
              $this->rendimiento = "";  
              $this->nmgp_dados_form["rendimiento"] = $this->rendimiento;
              $this->parterel01 = "";  
              $this->nmgp_dados_form["parterel01"] = $this->parterel01;
              $this->clase_contribuyente = "";  
              $this->nmgp_dados_form["clase_contribuyente"] = $this->clase_contribuyente;
              $this->tipo_contribuyente = "";  
              $this->nmgp_dados_form["tipo_contribuyente"] = $this->tipo_contribuyente;
              $this->lleva_contabilidad = "";  
              $this->nmgp_dados_form["lleva_contabilidad"] = $this->lleva_contabilidad;
              $this->ctacgant01 = "";  
              $this->nmgp_dados_form["ctacgant01"] = $this->ctacgant01;
              $this->residentefiscal01 = "";  
              $this->nmgp_dados_form["residentefiscal01"] = $this->residentefiscal01;
              $this->es_cliente = "";  
              $this->nmgp_dados_form["es_cliente"] = $this->es_cliente;
              $this->grupos = "";  
              $this->nmgp_dados_form["grupos"] = $this->grupos;
              $this->codigo_banco = "";  
              $this->nmgp_dados_form["codigo_banco"] = $this->codigo_banco;
              $this->tipo_cuenta_banco = "";  
              $this->nmgp_dados_form["tipo_cuenta_banco"] = $this->tipo_cuenta_banco;
              $this->nro_cuenta_banco = "";  
              $this->nmgp_dados_form["nro_cuenta_banco"] = $this->nro_cuenta_banco;
              $this->pago_transferencia = "";  
              $this->nmgp_dados_form["pago_transferencia"] = $this->pago_transferencia;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['dados_form'] = $this->nmgp_dados_form;
              $this->formatado = false;
          }
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['foreign_key'] as $sFKName => $sFKValue)
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
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(idcli) from " . $this->Ini->nm_tabela . " where idcli < $this->idcli" . $str_where_filter; 
         $rs = $this->Db->Execute("select max(idcli) from " . $this->Ini->nm_tabela . " where idcli < $this->idcli" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(idcli) from " . $this->Ini->nm_tabela . " where idcli < $this->idcli" . $str_where_filter; 
         $rs = $this->Db->Execute("select max(idcli) from " . $this->Ini->nm_tabela . " where idcli < $this->idcli" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(idcli) from " . $this->Ini->nm_tabela . " where idcli < $this->idcli" . $str_where_filter; 
         $rs = $this->Db->Execute("select max(idcli) from " . $this->Ini->nm_tabela . " where idcli < $this->idcli" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(idcli) from " . $this->Ini->nm_tabela . " where idcli < $this->idcli" . $str_where_filter; 
         $rs = $this->Db->Execute("select max(idcli) from " . $this->Ini->nm_tabela . " where idcli < $this->idcli" . $str_where_filter); 
     }  
     else  
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(idcli) from " . $this->Ini->nm_tabela . " where idcli < $this->idcli" . $str_where_filter; 
         $rs = $this->Db->Execute("select max(idcli) from " . $this->Ini->nm_tabela . " where idcli < $this->idcli" . $str_where_filter); 
     }  
     if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
     { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
     }  
     if (isset($rs->fields[0]) && $rs->fields[0] != "") 
     { 
         $this->idcli = substr($this->Db->qstr($rs->fields[0]), 1, -1); 
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
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(idcli) from " . $this->Ini->nm_tabela . " where idcli > $this->idcli" . $str_where_filter; 
         $rs = $this->Db->Execute("select min(idcli) from " . $this->Ini->nm_tabela . " where idcli > $this->idcli" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(idcli) from " . $this->Ini->nm_tabela . " where idcli > $this->idcli" . $str_where_filter; 
         $rs = $this->Db->Execute("select min(idcli) from " . $this->Ini->nm_tabela . " where idcli > $this->idcli" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(idcli) from " . $this->Ini->nm_tabela . " where idcli > $this->idcli" . $str_where_filter; 
         $rs = $this->Db->Execute("select min(idcli) from " . $this->Ini->nm_tabela . " where idcli > $this->idcli" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(idcli) from " . $this->Ini->nm_tabela . " where idcli > $this->idcli" . $str_where_filter; 
         $rs = $this->Db->Execute("select min(idcli) from " . $this->Ini->nm_tabela . " where idcli > $this->idcli" . $str_where_filter); 
     }  
     else  
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(idcli) from " . $this->Ini->nm_tabela . " where idcli > $this->idcli" . $str_where_filter; 
         $rs = $this->Db->Execute("select min(idcli) from " . $this->Ini->nm_tabela . " where idcli > $this->idcli" . $str_where_filter); 
     }  
     if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
     { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
     }  
     if (isset($rs->fields[0]) && $rs->fields[0] != "") 
     { 
         $this->idcli = substr($this->Db->qstr($rs->fields[0]), 1, -1); 
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
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(idcli) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select min(idcli) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(idcli) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select min(idcli) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(idcli) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select min(idcli) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(idcli) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select min(idcli) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
     }  
     else  
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(idcli) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select min(idcli) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
     }  
     if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
     { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
     }  
     if (!isset($rs->fields[0]) || $rs->EOF) 
     { 
         if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['where_filter']))
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
     $this->idcli = substr($this->Db->qstr($rs->fields[0]), 1, -1); 
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
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(idcli) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select max(idcli) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(idcli) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select max(idcli) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(idcli) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select max(idcli) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(idcli) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select max(idcli) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
     }  
     else  
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(idcli) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select max(idcli) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
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
     $this->idcli = substr($this->Db->qstr($rs->fields[0]), 1, -1); 
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
       $rec_tot    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['total'] + 1;
       $rec_fim    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['reg_start'] + 1;
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
                $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['record_state'] = array();
        }

        function storeRecordState($sc_seq_vert = 0) {
                if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['record_state'])) {
                        $this->initializeRecordState();
                }
                if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['record_state'][$sc_seq_vert])) {
                        $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['record_state'][$sc_seq_vert] = array();
                }

                $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['record_state'][$sc_seq_vert]['buttons'] = array(
                        'delete' => $this->nmgp_botoes['delete'],
                        'update' => $this->nmgp_botoes['update']
                );
        }

        function loadRecordState($sc_seq_vert = 0) {
                if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['record_state']) || !isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['record_state'][$sc_seq_vert])) {
                        return;
                }

                if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['record_state'][$sc_seq_vert]['buttons']['delete'])) {
                        $this->nmgp_botoes['delete'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['record_state'][$sc_seq_vert]['buttons']['delete'];
                }
                if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['record_state'][$sc_seq_vert]['buttons']['update'])) {
                        $this->nmgp_botoes['update'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['record_state'][$sc_seq_vert]['buttons']['update'];
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
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['botoes'] = $this->nmgp_botoes;
     if ($this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form")
     {
         $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['opc_ant'] = $this->nmgp_opcao;
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
     if (($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['run_iframe'] == "R") && $this->nm_flag_iframe && empty($this->nm_todas_criticas))
     {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['run_iframe_ajax']))
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['retorno_edit'] = array("edit", "");
          }
          else
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['retorno_edit'] .= "&nmgp_opcao=edit";
          }
          if ($this->sc_evento == "insert" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['run_iframe'] == "F")
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['run_iframe_ajax']))
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['retorno_edit'] = array("edit", "fim");
              }
              else
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['retorno_edit'] .= "&rec=fim";
              }
          }
          $this->NM_close_db(); 
          $sJsParent = '';
          if ($this->NM_ajax_flag && isset($this->NM_ajax_info['param']['buffer_output']) && $this->NM_ajax_info['param']['buffer_output'])
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['run_iframe_ajax']))
              {
                  $this->NM_ajax_info['ajaxJavascript'][] = array("parent.ajax_navigate", $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['retorno_edit']);
              }
              else
              {
                  $sJsParent .= 'parent';
                  $this->NM_ajax_info['redir']['metodo'] = 'location';
                  $this->NM_ajax_info['redir']['action'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['retorno_edit'];
                  $this->NM_ajax_info['redir']['target'] = $sJsParent;
              }
              form_maepag_pack_ajax_response();
              exit;
          }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">

         <html><body>
         <script type="text/javascript">
<?php
    
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['run_iframe_ajax']))
    {
        $opc = ($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['run_iframe'] == "F" && $this->sc_evento == "insert") ? "fim" : "";
        echo "parent.ajax_navigate('edit', '" .$opc . "');";
    }
    else
    {
        echo $sJsParent . "parent.location = '" . $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['retorno_edit'] . "';";
    }
?>
         </script>
         </body></html>
<?php
         exit;
     }
        $this->initFormPages();
    include_once("form_maepag_form0.php");
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
        if ('SC_all_Cmp' == $this->nmgp_fast_search && in_array($field, array("codcte01", "nomcte01", "cv1cte01", "cv2cte01", "tipcte01", "ofienccte01", "vendcte01", "cobrcte01", "loccte01", "dircte01", "telcte01", "cascte01", "fecing01", "condpag01", "desctocte01", "limcred01", "desppar01", "cheqpro01", "sdoeje01", "sdoant01", "sdoact01", "acudbm01", "acucrm01", "acudbe01", "acucre01", "comentcte01", "statuscte01", "identcte01", "cordcte01", "limcant01", "pagleg01", "telcte01b", "telcte01c", "emailcte01", "ctacgcte01", "obsercte01", "totexceso01", "imagencte01", "block", "uid", "ultimoacceso", "idcli", "catcte01", "numautosri01", "seriedoc01", "fecvencdoc01", "repleg01", "coddest01", "longitud01", "latitud01", "zoom01", "coniva01", "conret01", "tipo_identificacion", "es_padre", "bonos", "rendimiento", "parterel01", "clase_contribuyente", "tipo_contribuyente", "lleva_contabilidad", "ctacgant01", "residentefiscal01", "es_cliente", "grupos", "codigo_banco", "tipo_cuenta_banco", "nro_cuenta_banco", "pago_transferencia"))) {
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
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['table_refresh']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['table_refresh'])
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
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['csrf_token']))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['csrf_token'] = $this->scCsrfGenerateToken();
        }

        return $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['csrf_token'];
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
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['where_filter']);
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['total']);
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['fast_search']);
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['where_detal']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['where_detal'])) 
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['where_filter'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['where_detal'];
          }
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['empty_filter']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['empty_filter'])
          {
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['empty_filter']);
              $this->NM_ajax_info['empty_filter'] = 'ok';
              form_maepag_pack_ajax_response();
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
              $this->SC_monta_condicao($comando, "codcte01", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "nomcte01", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "cv1cte01", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "cv2cte01", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "tipcte01", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "ofienccte01", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "vendcte01", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "cobrcte01", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "loccte01", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "dircte01", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "telcte01", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "cascte01", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "fecing01", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "condpag01", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "desctocte01", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "limcred01", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "desppar01", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "cheqpro01", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "sdoeje01", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "sdoant01", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "sdoact01", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "acudbm01", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "acucrm01", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "acudbe01", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "acucre01", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "comentcte01", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "statuscte01", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "identcte01", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "cordcte01", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "limcant01", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "pagleg01", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "telcte01b", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "telcte01c", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "emailcte01", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "ctacgcte01", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "obsercte01", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "totexceso01", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "imagencte01", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "block", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "UID", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "ultimoacceso", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "idcli", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "catcte01", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "numautosri01", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "seriedoc01", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "fecvencdoc01", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "repleg01", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "coddest01", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "longitud01", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "latitud01", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "zoom01", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "coniva01", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "conret01", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "tipo_identificacion", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "es_padre", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "bonos", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "rendimiento", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "parteRel01", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "clase_contribuyente", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "tipo_contribuyente", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "lleva_contabilidad", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "ctacgant01", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "residenteFiscal01", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "es_cliente", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "grupos", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "codigo_banco", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "tipo_cuenta_banco", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "nro_cuenta_banco", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "pago_transferencia", $arg_search, $data_search);
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['where_detal']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['where_detal']) && !empty($comando)) 
      {
          $comando = $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['where_detal'] . " and (" .  $comando . ")";
      }
      if (empty($comando)) 
      {
          $comando = " 1 <> 1 "; 
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['where_filter_form']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['where_filter_form'])
      {
          $sc_where = " where " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['where_filter_form'] . " and (" . $comando . ")";
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
      $qt_geral_reg_form_maepag = isset($rt->fields[0]) ? $rt->fields[0] - 1 : 0; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['total'] = $qt_geral_reg_form_maepag;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['where_filter'] = $comando;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['fast_search'][0] = $field;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['fast_search'][1] = $arg_search;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['fast_search'][2] = $sv_data;
      $rt->Close(); 
      if (isset($rt->fields[0]) && $rt->fields[0] > 0 &&  isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['empty_filter']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['empty_filter'])
      {
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['empty_filter']);
          $this->NM_ajax_info['empty_filter'] = 'ok';
          form_maepag_pack_ajax_response();
          exit;
      }
      elseif (!isset($rt->fields[0]) || $rt->fields[0] == 0)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['empty_filter'] = true;
          $this->NM_ajax_info['empty_filter'] = 'ok';
          form_maepag_pack_ajax_response();
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
      $nm_numeric[] = "desctocte01";$nm_numeric[] = "limcred01";$nm_numeric[] = "cheqpro01";$nm_numeric[] = "sdoeje01";$nm_numeric[] = "sdoant01";$nm_numeric[] = "sdoact01";$nm_numeric[] = "acudbm01";$nm_numeric[] = "acucrm01";$nm_numeric[] = "acudbe01";$nm_numeric[] = "acucre01";$nm_numeric[] = "statuscte01";$nm_numeric[] = "limcant01";$nm_numeric[] = "totexceso01";$nm_numeric[] = "block";$nm_numeric[] = "uid";$nm_numeric[] = "ultimoacceso";$nm_numeric[] = "idcli";$nm_numeric[] = "zoom01";$nm_numeric[] = "es_padre";
      if (in_array($campo_join, $nm_numeric))
      {
         if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['decimal_db'] == ".")
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
      $Nm_datas["fecing01"] = "datetime";$Nm_datas["fecvencdoc01"] = "date";
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
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['SC_sep_date']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['SC_sep_date']))
              {
                  $nm_aspas  = $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['SC_sep_date'];
                  $nm_aspas1 = $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['SC_sep_date1'];
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
       $nmgp_saida_form = "form_maepag_fim.php";
   }
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['redir']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['redir'] == 'redir')
   {
       unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']);
   }
   unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['opc_ant']);
   if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['nm_run_menu']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['nm_run_menu'] == 1)
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['nm_run_menu'] = 2;
       $nmgp_saida_form = "form_maepag_fim.php";
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
       form_maepag_pack_ajax_response();
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
   if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['sc_modal'])
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
if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['masterValue']))
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['dashboard_info']['under_dashboard']) {
?>
var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['dashboard_info']['parent_widget']; ?>']");
if (dbParentFrame && dbParentFrame[0] && dbParentFrame[0].contentWindow.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['masterValue'] as $cmp_master => $val_master)
        {
?>
    dbParentFrame[0].contentWindow.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['masterValue']);
?>
}
<?php
    }
    else {
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['masterValue'] as $cmp_master => $val_master)
        {
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['masterValue']);
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
        if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['run_iframe'] != "R") {
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
        if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['ordem_cmp'] == $fieldName) {
            $orderColName = $fieldName;
            if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag']['ordem_ord'] == " desc") {
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
            case "desctocte01":
                return true;
            case "limcred01":
                return true;
            case "cheqpro01":
                return true;
            case "sdoeje01":
                return true;
            case "sdoant01":
                return true;
            case "sdoact01":
                return true;
            case "acudbm01":
                return true;
            case "acucrm01":
                return true;
            case "acudbe01":
                return true;
            case "acucre01":
                return true;
            case "totexceso01":
                return true;
            case "ultimoacceso":
                return true;
            case "es_padre":
                return true;
            default:
                return false;
        }
        return false;
    }

    function scGetDefaultFieldOrder($fieldName)
    {
        switch ($fieldName) {
            case "fecing01":
                return 'desc';
            case "desctocte01":
                return 'desc';
            case "limcred01":
                return 'desc';
            case "cheqpro01":
                return 'desc';
            case "sdoeje01":
                return 'desc';
            case "sdoant01":
                return 'desc';
            case "sdoact01":
                return 'desc';
            case "acudbm01":
                return 'desc';
            case "acucrm01":
                return 'desc';
            case "acudbe01":
                return 'desc';
            case "acucre01":
                return 'desc';
            case "totexceso01":
                return 'desc';
            case "ultimoacceso":
                return 'desc';
            case "fecvencdoc01":
                return 'desc';
            case "es_padre":
                return 'desc';
            default:
                return 'asc';
        }
        return 'asc';
    }
}
?>
