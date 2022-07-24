<?php
class grid_detail_sales_todo_grid
{
   var $Ini;
   var $Erro;
   var $Db;
   var $Tot;
   var $Lin_impressas;
   var $Lin_final;
   var $Rows_span;
   var $NM_colspan;
   var $rs_grid;
   var $nm_grid_ini;
   var $nm_grid_sem_reg;
   var $nm_prim_linha;
   var $Rec_ini;
   var $Rec_fim;
   var $nmgp_reg_start;
   var $nmgp_reg_inicial;
   var $nmgp_reg_final;
   var $SC_seq_register;
   var $SC_seq_page;
   var $nm_location;
   var $nm_data;
   var $nm_cod_barra;
   var $sc_proc_grid; 
   var $NM_raiz_img; 
   var $NM_opcao; 
   var $NM_flag_antigo; 
   var $nm_campos_cab = array();
   var $NM_cmp_hidden   = array();
   var $nmgp_botoes     = array();
   var $nm_btn_exist    = array();
   var $nm_btn_label    = array(); 
   var $nm_btn_disabled = array();
   var $Cmps_ord_def    = array();
   var $nmgp_label_quebras = array();
   var $nmgp_prim_pag_pdf;
   var $Campos_Mens_erro;
   var $Print_All;
   var $NM_field_over;
   var $NM_field_click;
   var $NM_cont_body; 
   var $NM_emb_tree_no; 
   var $progress_fp;
   var $progress_tot;
   var $progress_now;
   var $progress_lim_tot;
   var $progress_lim_now;
   var $progress_lim_qtd;
   var $progress_grid;
   var $progress_pdf;
   var $progress_res;
   var $progress_graf;
   var $count_ger;
   var $sum_view_sales_detail_group_todo_cantidad;
   var $sum_valor;
   var $view_sales_detail_group_todo_fecha_Old;
   var $arg_sum_view_sales_detail_group_todo_fecha;
   var $Label_view_sales_detail_group_todo_fecha;
   var $sc_proc_quebra_view_sales_detail_group_todo_fecha;
   var $count_view_sales_detail_group_todo_fecha;
   var $sum_view_sales_detail_group_todo_fecha_view_sales_detail_group_todo_cantidad;
   var $sum_view_sales_detail_group_todo_fecha_valor;
   var $view_sales_detail_group_todo_fecha_scgb_255_Old;
   var $arg_sum_view_sales_detail_group_todo_fecha_scgb_255;
   var $Label_view_sales_detail_group_todo_fecha_scgb_255;
   var $sc_proc_quebra_view_sales_detail_group_todo_fecha_scgb_255;
   var $count_view_sales_detail_group_todo_fecha_scgb_255;
   var $sum_view_sales_detail_group_todo_fecha_scgb_255_view_sales_detail_group_todo_cantidad;
   var $sum_view_sales_detail_group_todo_fecha_scgb_255_valor;
   var $view_sales_detail_group_todo_producto_Old;
   var $arg_sum_view_sales_detail_group_todo_producto;
   var $Label_view_sales_detail_group_todo_producto;
   var $sc_proc_quebra_view_sales_detail_group_todo_producto;
   var $count_view_sales_detail_group_todo_producto;
   var $sum_view_sales_detail_group_todo_producto_view_sales_detail_group_todo_cantidad;
   var $sum_view_sales_detail_group_todo_producto_valor;
   var $sales_cliente_Old;
   var $arg_sum_sales_cliente;
   var $Label_sales_cliente;
   var $sc_proc_quebra_sales_cliente;
   var $count_sales_cliente;
   var $sum_sales_cliente_view_sales_detail_group_todo_cantidad;
   var $sum_sales_cliente_valor;
   var $view_sales_detail_group_todo_cuentaventa_Old;
   var $arg_sum_view_sales_detail_group_todo_cuentaventa;
   var $Label_view_sales_detail_group_todo_cuentaventa;
   var $sc_proc_quebra_view_sales_detail_group_todo_cuentaventa;
   var $count_view_sales_detail_group_todo_cuentaventa;
   var $sum_view_sales_detail_group_todo_cuentaventa_view_sales_detail_group_todo_cantidad;
   var $sum_view_sales_detail_group_todo_cuentaventa_valor;
   var $view_sales_detail_group_todo_fecha;
   var $view_sales_detail_group_todo_cantidad;
   var $view_sales_detail_group_todo_unit_value;
   var $view_sales_detail_group_todo_producto;
   var $valor;
   var $view_sales_detail_group_todo_cuentaventa;
   var $sales_idcliente;
   var $sales_cliente;
   var $sales_factura;
   var $customer_nombre;
   var $customer_correo;
   var $customer_celular;
   var $customer_direccion;
   var $customer_idcustomer;
//--- 
 function monta_grid($linhas = 0)
 {
   global $nm_saida;

   clearstatcache();
   $this->NM_cor_embutida();
   if (isset($_SESSION['scriptcase']['sc_apl_conf']['grid_detail_sales_todo']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['grid_detail_sales_todo']['field_display']))
   {
       foreach ($_SESSION['scriptcase']['sc_apl_conf']['grid_detail_sales_todo']['field_display'] as $NM_cada_field => $NM_cada_opc)
       {
           $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
       }
   }
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['usr_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['usr_cmp_sel']))
   {
       foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['usr_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
       {
           $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
       }
   }
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['php_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['php_cmp_sel']))
   {
       foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['php_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
       {
           $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
       }
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['embutida_init'])
   { 
        return; 
   } 
   $this->inicializa();
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['charts_html'] = '';
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['embutida'])
   { 
       $this->Lin_impressas = 0;
       $this->Lin_final     = FALSE;
       $this->grid($linhas);
       $this->nm_fim_grid();
   } 
   else 
   { 
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['SC_Ind_Groupby'] != "_NM_SC_")
      {
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['embutida'])
       { 
           include_once($this->Ini->path_embutida . "grid_detail_sales_todo/" . $this->Ini->Apl_resumo); 
       } 
       else 
       { 
           include_once($this->Ini->path_aplicacao . $this->Ini->Apl_resumo); 
       } 
       $this->Res         = new grid_detail_sales_todo_resumo();
       $this->Res->Db     = $this->Db;
       $this->Res->Erro   = $this->Erro;
       $this->Res->Ini    = $this->Ini;
       $this->Res->Lookup = $this->Lookup;
      }
       if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['pdf_res'])
       {
            if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['proc_pdf'] || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['proc_pdf_vert'])
            {
            } 
            else
            {
                $this->cabecalho();
            } 
       } 
            if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['proc_pdf'] || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['proc_pdf_vert'])
            {
            } 
            else
            {
       $nm_saida->saida("                  <TR>\r\n");
       $nm_saida->saida("                  <TD id='sc_grid_content' style='padding: 0px;' colspan=1>\r\n");
            } 
       $nm_saida->saida("    <table width='100%' cellspacing=0 cellpadding=0>\r\n");
       $nmgrp_apl_opcao= (isset($_SESSION['sc_session']['scriptcase']['embutida_form_pdf']['grid_detail_sales_todo'])) ? "pdf" : $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao'];
       if ($nmgrp_apl_opcao != "pdf")
       { 
           $this->nmgp_barra_top();
       } 
       if ($nmgrp_apl_opcao != "pdf" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao_print'] != 'print')
       { 
           if ($this->Ini->grid_search_change_fil)
           { 
               $seq_search = 1;
               foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['grid_pesq'] as $cmp => $def)
               {
                  $Seq_grid      = $seq_search;
                  $Cmp_grid      = $cmp;
                  $Def_grid      = array('descr' => $def['descr'], 'hint' => $def['hint']);
                  $Lin_grid_add  = $this->grid_search_tag_ini($Cmp_grid, $Def_grid, $Seq_grid);
                  $NM_func_grid_add = "grid_search_" . $Cmp_grid;
                  $Lin_grid_add .= $this->$NM_func_grid_add($Seq_grid, 'S', $def['opc'], $def['val'], $nmgp_tab_label[$Cmp_grid]);
                  $Lin_grid_add .= $this->grid_search_tag_end();
                  $this->Ini->Arr_result['grid_search_add'][] = array ('field' => $cmp, 'tag' => NM_charset_to_utf8($Lin_grid_add));
                  $seq_search++;
               } 
           } 
           elseif (!$this->Proc_link_res) 
           { 
               $this->html_grid_search();
           } 
       } 
       unset ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['save_grid']);
       if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['pdf_res'] && (!isset($_GET['flash_graf']) || 'chart' != $_GET['flash_graf']))
       {
           $this->grid();
       }
       if ($nmgrp_apl_opcao != "pdf")
       { 
           $this->nmgp_barra_bot();
       } 
       $nm_saida->saida("   </table>\r\n");
       $nm_saida->saida("  </TD>\r\n");
       $nm_saida->saida(" </TR>\r\n");
       if (strpos(" " . $this->Ini->SC_module_export, "resume") !== false)
       { 
           $Gera_res = true;
       } 
       else 
       { 
           $Gera_res = false;
       } 
       if (strpos(" " . $this->Ini->SC_module_export, "chart") !== false)
       { 
           $Gera_graf = true;
       } 
       else 
       { 
           $Gera_graf = false;
       } 
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['print_all'] && empty($this->nm_grid_sem_reg) && ($Gera_res || $Gera_graf) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['SC_Ind_Groupby'] != "_NM_SC_")
       { 
           $this->Res->monta_html_ini_pdf();
           $this->Res->monta_resumo();
           $this->Res->monta_html_fim_pdf();
           if ($Gera_graf)
           {
               $this->grafico_pdf();
           }
       } 
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao'] == "pdf" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['SC_Ind_Groupby'] != "_NM_SC_")
       { 
           if (isset($_GET['flash_graf']) && 'chart' == $_GET['flash_graf'])
           {
               $this->Res->monta_resumo(true);
               require_once($this->Ini->path_aplicacao . $this->Ini->Apl_grafico); 
               $this->Graf  = new grid_detail_sales_todo_grafico();
               $this->Graf->Db     = $this->Db;
               $this->Graf->Erro   = $this->Erro;
               $this->Graf->Ini    = $this->Ini;
               $this->Graf->Lookup = $this->Lookup;
               $this->Graf->monta_grafico();
               exit;
           }
           elseif ($Gera_res || $Gera_graf)
           {
               $this->Res->monta_html_ini_pdf();
               $this->Res->monta_resumo();
               $this->Res->monta_html_fim_pdf();
           }
       } 
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['graf_pdf'] == "S" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['SC_Ind_Groupby'] != "_NM_SC_")
       { 
           if (isset($_GET['flash_graf']) && 'pdf' == $_GET['flash_graf'] && $Gera_graf)
           {
               $this->grafico_pdf_flash();
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao'] = "grid";
           } 
           elseif (!$this->Print_All && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao'] == "pdf" && $Gera_graf)
           { 
               $this->grafico_pdf();
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao'] = "grid";
           } 
           else 
           { 
               $this->nm_fim_grid();
           } 
       } 
       else 
       { 
           $flag_apaga_pdf_log = TRUE;
           if (!$this->Print_All && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao'] == "pdf")
           { 
               $flag_apaga_pdf_log = FALSE;
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao'] = "igual";
           } 
           $this->nm_fim_grid($flag_apaga_pdf_log);
       } 
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao_print'] == "print")
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao_ant'];
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao_print'] = "";
   }
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao_ant'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao'];
 }
 function resume($linhas = 0)
 {
    $this->Lin_impressas = 0;
    $this->Lin_final     = FALSE;
    $this->grid($linhas);
 }
//--- 
 function inicializa()
 {
   global $nm_saida, $NM_run_iframe,
   $rec, $nmgp_chave, $nmgp_opcao, $nmgp_ordem, $nmgp_chave_det,
   $nmgp_quant_linhas, $nmgp_quant_colunas, $nmgp_url_saida, $nmgp_parms;
//
   if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['Ind_lig_mult'])) {
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['Ind_lig_mult'] = 0;
   }
   $this->Img_embbed      = false;
   $this->nm_data         = new nm_data("es");
   $this->pdf_label_group = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opc_pdf']['label_group'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opc_pdf']['label_group'] : "N";
   $this->pdf_all_cab     = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opc_pdf']['all_cab']))     ? $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opc_pdf']['all_cab'] : "S";
   $this->pdf_all_label   = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opc_pdf']['all_label']))   ? $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opc_pdf']['all_label'] : "S";
   $this->Grid_body = 'id="sc_grid_body"';
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['embutida'])
   {
       $this->Grid_body = "";
   }
   $this->Css_Cmp = array();
   $NM_css = file($this->Ini->root . $this->Ini->path_link . "grid_detail_sales_todo/grid_detail_sales_todo_grid_" .strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) . ".css");
   foreach ($NM_css as $cada_css)
   {
       $Pos1 = strpos($cada_css, "{");
       $Pos2 = strpos($cada_css, "}");
       $Tag  = trim(substr($cada_css, 1, $Pos1 - 1));
       $Css  = substr($cada_css, $Pos1 + 1, $Pos2 - $Pos1 - 1);
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['doc_word'])
       { 
           $this->Css_Cmp[$Tag] = $Css;
       }
       else
       { 
           $this->Css_Cmp[$Tag] = "";
       }
   }
   if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['pesq_tab_label']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['pesq_tab_label'] = "";
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['pesq_tab_label'] .= "view_sales_detail_group_todo_fecha?#?" . "Fecha" . "?@?";
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['pesq_tab_label'] .= "view_sales_detail_group_todo_id_product?#?" . "Id Product" . "?@?";
   }
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['grid_search_add']))
   {
       $nmgp_tab_label = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['pesq_tab_label'];
       if (!empty($nmgp_tab_label))
       {
          $nm_tab_campos = explode("?@?", $nmgp_tab_label);
          $nmgp_tab_label = array();
          foreach ($nm_tab_campos as $cada_campo)
          {
              $parte_campo = explode("?#?", $cada_campo);
              $nmgp_tab_label[$parte_campo[0]] = $parte_campo[1];
          }
       }
       $Seq_grid      = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['grid_search_add']['seq'];
       $Cmp_grid      = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['grid_search_add']['cmp'];
       $Def_grid      = array('descr' => $nmgp_tab_label[$Cmp_grid], 'hint' => $nmgp_tab_label[$Cmp_grid]);
       $Lin_grid_add  = $this->grid_search_tag_ini($Cmp_grid, $Def_grid, $Seq_grid);
       $NM_func_grid_add = "grid_search_" . $Cmp_grid;
       $Lin_grid_add .= $this->$NM_func_grid_add($Seq_grid, 'S', '', array(), $nmgp_tab_label[$Cmp_grid]);
       $Lin_grid_add .= $this->grid_search_tag_end();
       $this->Arr_result = array();
       $Temp = ob_get_clean();
       if ($Temp !== false && trim($Temp) != "")
       {
           $this->Arr_result['htmOutput'] = NM_charset_to_utf8($Temp);
       }
       $this->Arr_result['grid_add'][] = NM_charset_to_utf8($Lin_grid_add);
       $oJson = new Services_JSON();
       echo $oJson->encode($this->Arr_result);
       unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['grid_search_add']);
       exit;
   }
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['dyn_search_ch_bi']))
   {
       $tmp_opc = $opc = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['dyn_search_ch_bi']['opc'];
       $this->Ini->process_cond_bi($opc, $bi_dt1, $bi_dt2);
       $NM_func_dyn_ch_bi = "formata_bi_" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['dyn_search_ch_bi']['cmp'];
       $this->$NM_func_dyn_ch_bi($tmp_opc, $bi_dt1, $bi_dt2, $opc);
       $this->Arr_result = array();
       $Temp = ob_get_clean();
       $this->Arr_result['dyn_ch_bi'][] = NM_charset_to_utf8($bi_dt1 . $bi_dt2);
       $oJson = new Services_JSON();
       echo $oJson->encode($this->Arr_result);
       unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['dyn_search_ch_bi']);
       exit;
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['embutida'])
   {
       if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['Lig_Md5']))
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['Lig_Md5'] = array();
       }
   }
   elseif ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao'] != "pdf" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao'] != 'print')
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['Lig_Md5'] = array();
   }
   $this->force_toolbar = false;
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['force_toolbar']))
   { 
       $this->force_toolbar = true;
       unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['force_toolbar']);
   } 
       $this->Tem_tab_vert = false;
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['SC_Ind_Groupby'] == "sc_free_group_by")
   {
       if (count($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['SC_Gb_Free_cmp']) > 1)
       {
           $this->width_tabula_quebra  = (((count($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['SC_Gb_Free_cmp']) - 1) * 13) + 3) . "px";
           $this->width_tabula_display = "''";
           $this->Tem_tab_vert = true;
       }
       else
       {
           $this->width_tabula_quebra  = "0px";
           $this->width_tabula_display = "none";
       }
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['SC_Ind_Groupby'] == "inicial")
   {
       $this->width_tabula_quebra  = "29px";
       $this->width_tabula_display = "''";
       $this->Tem_tab_vert = true;
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['SC_Ind_Groupby'] == "_NM_SC_")
   {
       $this->width_tabula_quebra  = "0px";
       $this->width_tabula_display = "none";
   }
   if (isset($_SESSION['scriptcase']['sc_apl_conf']['grid_detail_sales_todo']['lig_edit']) && $_SESSION['scriptcase']['sc_apl_conf']['grid_detail_sales_todo']['lig_edit'] != '')
   {
       if ($_SESSION['scriptcase']['sc_apl_conf']['grid_detail_sales_todo']['lig_edit'] == "on")  {$_SESSION['scriptcase']['sc_apl_conf']['grid_detail_sales_todo']['lig_edit'] = "S";}
       if ($_SESSION['scriptcase']['sc_apl_conf']['grid_detail_sales_todo']['lig_edit'] == "off") {$_SESSION['scriptcase']['sc_apl_conf']['grid_detail_sales_todo']['lig_edit'] = "N";}
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['mostra_edit'] = $_SESSION['scriptcase']['sc_apl_conf']['grid_detail_sales_todo']['lig_edit'];
   }
   $this->grid_emb_form      = false;
   $this->grid_emb_form_full = false;
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['embutida_form']) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['embutida_form'])
   {
       if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['embutida_form_full']) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['embutida_form_full'])
       {
          $this->grid_emb_form_full = true;
       }
       else
       {
           $this->grid_emb_form = true;
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['mostra_edit'] = "N";
       }
   }
   if ($this->Ini->SC_Link_View || ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opc_psq'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['psq_edit'] == 'N'))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['mostra_edit'] = "N";
   }
   $this->sc_proc_quebra_view_sales_detail_group_todo_fecha = false;
   $this->sc_proc_quebra_view_sales_detail_group_todo_fecha_scgb_255 = false;
   $this->sc_proc_quebra_view_sales_detail_group_todo_producto = false;
   $this->sc_proc_quebra_sales_cliente = false;
   $this->sc_proc_quebra_view_sales_detail_group_todo_cuentaventa = false;
   $this->NM_cont_body   = 0; 
   $this->NM_emb_tree_no = false; 
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['embutida'])
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['NM_arr_tree'] = array();
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['ind_tree'] = 0;
   }
   elseif (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['emb_tree_no']) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['emb_tree_no'])
   { 
       $this->NM_emb_tree_no = true; 
   }
   $this->aba_iframe = false;
   $this->Print_All = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['print_all'];
   if ($this->Print_All)
   {
       $this->Ini->nm_limite_lin = $this->Ini->nm_limite_lin_prt; 
   }
   if (isset($_SESSION['scriptcase']['sc_aba_iframe']))
   {
       foreach ($_SESSION['scriptcase']['sc_aba_iframe'] as $aba => $apls_aba)
       {
           if (in_array("grid_detail_sales_todo", $apls_aba))
           {
               $this->aba_iframe = true;
               break;
           }
       }
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['iframe_menu'] && (!isset($_SESSION['scriptcase']['menu_mobile']) || empty($_SESSION['scriptcase']['menu_mobile'])))
   {
       $this->aba_iframe = true;
   }
   $this->nmgp_botoes['group_2'] = "on";
   $this->nmgp_botoes['group_1'] = "on";
   $this->nmgp_botoes['group_3'] = "on";
   $this->nmgp_botoes['group_4'] = "on";
   $this->nmgp_botoes['group_5'] = "on";
   $this->nmgp_botoes['exit'] = "on";
   $this->nmgp_botoes['first'] = "on";
   $this->nmgp_botoes['back'] = "on";
   $this->nmgp_botoes['forward'] = "on";
   $this->nmgp_botoes['last'] = "on";
   $this->nmgp_botoes['filter'] = "on";
   $this->nmgp_botoes['pdf'] = "on";
   $this->nmgp_botoes['xls'] = "on";
   $this->nmgp_botoes['xml'] = "on";
   $this->nmgp_botoes['json'] = "on";
   $this->nmgp_botoes['csv'] = "on";
   $this->nmgp_botoes['rtf'] = "on";
   $this->nmgp_botoes['word'] = "on";
   $this->nmgp_botoes['doc'] = "on";
   $this->nmgp_botoes['export'] = "on";
   $this->nmgp_botoes['print'] = "on";
   $this->nmgp_botoes['html'] = "on";
   $this->nmgp_botoes['goto'] = "on";
   $this->nmgp_botoes['qtline'] = "on";
   $this->nmgp_botoes['navpage'] = "on";
   $this->nmgp_botoes['rows'] = "on";
   $this->nmgp_botoes['summary'] = "on";
   $this->nmgp_botoes['sel_col'] = "on";
   $this->nmgp_botoes['sort_col'] = "on";
   $this->nmgp_botoes['qsearch'] = "on";
   $this->nmgp_botoes['gantt'] = "on";
   $this->nmgp_botoes['groupby'] = "on";
   $this->nmgp_botoes['gridsave'] = "on";
   $this->nmgp_botoes['gridsavesession'] = "on";
   $this->Cmps_ord_def['cmp_maior_30_1'] = " desc";
   $this->Cmps_ord_def["view_sales_detail_group_todo.fecha"] = "";
   $this->Cmps_ord_def['cmp_maior_30_2'] = " desc";
   $this->Cmps_ord_def["view_sales_detail_group_todo.cantidad"] = "";
   $this->Cmps_ord_def['cmp_maior_30_3'] = " desc";
   $this->Cmps_ord_def["view_sales_detail_group_todo.unit_value"] = "";
   $this->Cmps_ord_def['cmp_maior_30_4'] = " asc";
   $this->Cmps_ord_def["view_sales_detail_group_todo.producto"] = "";
   $this->Cmps_ord_def['valor'] = " desc";
   $this->Cmps_ord_def["unit_value*cantidad"] = "";
   $this->Cmps_ord_def['cmp_maior_30_5'] = " asc";
   $this->Cmps_ord_def["view_sales_detail_group_todo.cuentaventa"] = "";
   $this->Cmps_ord_def['sales_idcliente'] = " asc";
   $this->Cmps_ord_def["sales.idcliente"] = "";
   $this->Cmps_ord_def['sales_cliente'] = " asc";
   $this->Cmps_ord_def["sales.cliente"] = "";
   $this->Cmps_ord_def['sales_factura'] = " desc";
   $this->Cmps_ord_def["sales.factura"] = "";
   $this->Cmps_ord_def['customer_nombre'] = " asc";
   $this->Cmps_ord_def["customer.nombre"] = "";
   $this->Cmps_ord_def['customer_correo'] = " asc";
   $this->Cmps_ord_def["customer.correo"] = "";
   $this->Cmps_ord_def['customer_celular'] = " asc";
   $this->Cmps_ord_def["customer.celular"] = "";
   $this->Cmps_ord_def['customer_direccion'] = " asc";
   $this->Cmps_ord_def["customer.direccion"] = "";
   $this->Cmps_ord_def['customer_idcustomer'] = " asc";
   $this->Cmps_ord_def["customer.idcustomer"] = "";
   if (isset($_SESSION['scriptcase']['sc_apl_conf']['grid_detail_sales_todo']['btn_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['grid_detail_sales_todo']['btn_display']))
   {
       foreach ($_SESSION['scriptcase']['sc_apl_conf']['grid_detail_sales_todo']['btn_display'] as $NM_cada_btn => $NM_cada_opc)
       {
           $this->nmgp_botoes[$NM_cada_btn] = $NM_cada_opc;
       }
   }
   $this->Proc_link_res = false;
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['where_resumo']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['where_resumo'])) 
   { 
       $this->Proc_link_res            = true;
       $this->nmgp_botoes['filter']    = 'off';
       $this->nmgp_botoes['groupby']   = 'off';
       $this->nmgp_botoes['dynsearch'] = 'off';
       $this->nmgp_botoes['qsearch']   = 'off';
       $this->nmgp_botoes['gridsave']  = 'off';
   } 
   $this->sc_proc_grid = false; 
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['doc_word'] || $this->Ini->sc_export_ajax_img)
   { 
       $this->NM_raiz_img = $this->Ini->root; 
   } 
   else 
   { 
       $this->NM_raiz_img = ""; 
   } 
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
   $this->nm_where_dinamico = "";
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['where_pesq'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['where_pesq_ant'];  
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['campos_busca']))
   { 
       $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['campos_busca'];
       if ($_SESSION['scriptcase']['charset'] != "UTF-8")
       {
           $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
       }
       $this->view_sales_detail_group_todo_fecha = $Busca_temp['view_sales_detail_group_todo_fecha']; 
       $tmp_pos = strpos($this->view_sales_detail_group_todo_fecha, "##@@");
       if ($tmp_pos !== false && !is_array($this->view_sales_detail_group_todo_fecha))
       {
           $this->view_sales_detail_group_todo_fecha = substr($this->view_sales_detail_group_todo_fecha, 0, $tmp_pos);
       }
       $view_sales_detail_group_todo_fecha_2 = $Busca_temp['view_sales_detail_group_todo_fecha_input_2']; 
       $this->view_sales_detail_group_todo_fecha_2 = $Busca_temp['view_sales_detail_group_todo_fecha_input_2']; 
       $this->view_sales_detail_group_todo_id_product = $Busca_temp['view_sales_detail_group_todo_id_product']; 
       $tmp_pos = strpos($this->view_sales_detail_group_todo_id_product, "##@@");
       if ($tmp_pos !== false && !is_array($this->view_sales_detail_group_todo_id_product))
       {
           $this->view_sales_detail_group_todo_id_product = substr($this->view_sales_detail_group_todo_id_product, 0, $tmp_pos);
       }
   } 
   else 
   { 
       $this->view_sales_detail_group_todo_fecha_2 = ""; 
   } 
   $this->nm_field_dinamico = array();
   $this->nm_order_dinamico = array();
   $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['where_orig'];
   $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['where_pesq'];
   $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['where_pesq_filtro'];
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao'] == "muda_qt_linhas")
   { 
       unset($rec);
   } 
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao'] == "muda_rec_linhas")
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao'] = "muda_qt_linhas";
   } 

   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['dashboard_info']['under_dashboard'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['dashboard_info']['maximized']) {
       $tmpDashboardApp = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['dashboard_info']['dashboard_app'];
       if (isset($_SESSION['scriptcase']['dashboard_toolbar'][$tmpDashboardApp]['grid_detail_sales_todo'])) {
           $tmpDashboardButtons = $_SESSION['scriptcase']['dashboard_toolbar'][$tmpDashboardApp]['grid_detail_sales_todo'];

           $this->nmgp_botoes['first']     = $tmpDashboardButtons['grid_navigate']  ? 'on' : 'off';
           $this->nmgp_botoes['back']      = $tmpDashboardButtons['grid_navigate']  ? 'on' : 'off';
           $this->nmgp_botoes['last']      = $tmpDashboardButtons['grid_navigate']  ? 'on' : 'off';
           $this->nmgp_botoes['forward']   = $tmpDashboardButtons['grid_navigate']  ? 'on' : 'off';
           $this->nmgp_botoes['summary']   = $tmpDashboardButtons['grid_summary']   ? 'on' : 'off';
           $this->nmgp_botoes['qsearch']   = $tmpDashboardButtons['grid_qsearch']   ? 'on' : 'off';
           $this->nmgp_botoes['dynsearch'] = $tmpDashboardButtons['grid_dynsearch'] ? 'on' : 'off';
           $this->nmgp_botoes['filter']    = $tmpDashboardButtons['grid_filter']    ? 'on' : 'off';
           $this->nmgp_botoes['sel_col']   = $tmpDashboardButtons['grid_sel_col']   ? 'on' : 'off';
           $this->nmgp_botoes['sort_col']  = $tmpDashboardButtons['grid_sort_col']  ? 'on' : 'off';
           $this->nmgp_botoes['goto']      = $tmpDashboardButtons['grid_goto']      ? 'on' : 'off';
           $this->nmgp_botoes['qtline']    = $tmpDashboardButtons['grid_lineqty']   ? 'on' : 'off';
           $this->nmgp_botoes['navpage']   = $tmpDashboardButtons['grid_navpage']   ? 'on' : 'off';
           $this->nmgp_botoes['pdf']       = $tmpDashboardButtons['grid_pdf']       ? 'on' : 'off';
           $this->nmgp_botoes['xls']       = $tmpDashboardButtons['grid_xls']       ? 'on' : 'off';
           $this->nmgp_botoes['xml']       = $tmpDashboardButtons['grid_xml']       ? 'on' : 'off';
           $this->nmgp_botoes['json']      = $tmpDashboardButtons['grid_json']      ? 'on' : 'off';
           $this->nmgp_botoes['csv']       = $tmpDashboardButtons['grid_csv']       ? 'on' : 'off';
           $this->nmgp_botoes['rtf']       = $tmpDashboardButtons['grid_rtf']       ? 'on' : 'off';
           $this->nmgp_botoes['word']      = $tmpDashboardButtons['grid_word']      ? 'on' : 'off';
           $this->nmgp_botoes['doc']       = $tmpDashboardButtons['grid_doc']       ? 'on' : 'off';
           $this->nmgp_botoes['print']     = $tmpDashboardButtons['grid_print']     ? 'on' : 'off';
           $this->nmgp_botoes['new']       = $tmpDashboardButtons['grid_new']       ? 'on' : 'off';
           $this->nmgp_botoes['img']       = $tmpDashboardButtons['img']            ? 'on' : 'off';
           $this->nmgp_botoes['html']      = $tmpDashboardButtons['html']           ? 'on' : 'off';
           $this->nmgp_botoes['reload']    = $tmpDashboardButtons['grid_reload']    ? 'on' : 'off';
       }
   }

   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['embutida'])
   {
       $nmgp_ordem = ""; 
       $rec = "ini"; 
   } 
//
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['embutida'])
   { 
       include_once($this->Ini->path_embutida . "grid_detail_sales_todo/grid_detail_sales_todo_total.class.php"); 
   } 
   else 
   { 
       include_once($this->Ini->path_aplicacao . "grid_detail_sales_todo_total.class.php"); 
   } 
   $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
   $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
   $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['embutida'])
   { 
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao'] != "pdf" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['embutida_pdf'] != "pdf")  
       { 
           $_SESSION['scriptcase']['contr_link_emb'] = $this->nm_location;
       } 
       else 
       { 
           $_SESSION['scriptcase']['contr_link_emb'] = "pdf";
       } 
   } 
   else 
   { 
       $this->nm_location = $_SESSION['scriptcase']['contr_link_emb'];
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['embutida_pdf'] = $_SESSION['scriptcase']['contr_link_emb'];
   } 
   $this->Tot         = new grid_detail_sales_todo_total($this->Ini->sc_page);
   $this->Tot->Db     = $this->Db;
   $this->Tot->Erro   = $this->Erro;
   $this->Tot->Ini    = $this->Ini;
   $this->Tot->Lookup = $this->Lookup;
   if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['qt_lin_grid']))
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['qt_lin_grid'] = 20;
   }   
   if (isset($_SESSION['scriptcase']['sc_apl_conf']['grid_detail_sales_todo']['rows']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['grid_detail_sales_todo']['rows']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['qt_lin_grid'] = $_SESSION['scriptcase']['sc_apl_conf']['grid_detail_sales_todo']['rows'];  
       unset($_SESSION['scriptcase']['sc_apl_conf']['grid_detail_sales_todo']['rows']);
   }
   if (isset($_SESSION['scriptcase']['sc_apl_conf']['grid_detail_sales_todo']['cols']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['grid_detail_sales_todo']['cols']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['qt_col_grid'] = $_SESSION['scriptcase']['sc_apl_conf']['grid_detail_sales_todo']['cols'];  
       unset($_SESSION['scriptcase']['sc_apl_conf']['grid_detail_sales_todo']['cols']);
   }
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opc_liga']['rows']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['qt_lin_grid'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opc_liga']['rows'];  
   }
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opc_liga']['cols']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['qt_col_grid'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opc_liga']['cols'];  
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao'] == "muda_qt_linhas") 
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao']  = "igual" ;  
       if (!empty($nmgp_quant_linhas) && !is_array($nmgp_quant_linhas)) 
       { 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['qt_lin_grid'] = $nmgp_quant_linhas ;  
       } 
   }   
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['qt_reg_grid'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['qt_lin_grid']; 
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['SC_Ind_Groupby'] == "sc_free_group_by") 
   {
       if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['ordem_select']))  
       { 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['ordem_select'] = array(); 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['ordem_select_orig'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['ordem_select']; 
       } 
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['SC_Ind_Groupby'] == "inicial") 
   {
       if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['ordem_select']))  
       { 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['ordem_select'] = array(); 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['ordem_select_orig'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['ordem_select']; 
       } 
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['SC_Ind_Groupby'] == "_NM_SC_") 
   {
       if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['ordem_select']))  
       { 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['ordem_select'] = array(); 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['ordem_select_orig'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['ordem_select']; 
       } 
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['SC_Ind_Groupby'] == "sc_free_group_by") 
   {
       if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['ordem_quebra']))  
       { 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['ordem_quebra'] = array(); 
           foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['SC_Gb_Free_sql'] as $cmp_var => $resto)
           {
               foreach ($resto as $SC_Sql_col => $SC_Sql_order)
               {
                   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['ordem_quebra'][$cmp_var][$SC_Sql_col] = $SC_Sql_order;
               }
           }
       } 
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['SC_Ind_Groupby'] == "inicial") 
   {
       if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['ordem_quebra']))  
       { 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['ordem_quebra'] = array(); 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['ordem_quebra']['view_sales_detail_group_todo_fecha']["view_sales_detail_group_todo.fecha"] = "asc"; 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['ordem_quebra']['view_sales_detail_group_todo_cuentaventa']["view_sales_detail_group_todo.cuentaventa"] = "asc"; 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['ordem_quebra']['view_sales_detail_group_todo_producto']["view_sales_detail_group_todo.producto"] = "asc"; 
       } 
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['SC_Ind_Groupby'] == "_NM_SC_") 
   {
       if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['ordem_quebra']))  
       { 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['ordem_quebra'] = array(); 
       } 
   }
   if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['ordem_grid']))  
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['ordem_grid'] = "" ; 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['ordem_ant']  = ""; 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['ordem_desc'] = ""; 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['ordem_cmp']  = ""; 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['ordem_label'] = "";  
   }   
   if (!empty($nmgp_ordem))  
   { 
       $nmgp_ordem = str_replace('\"', '"', $nmgp_ordem); 
       if (!isset($this->Cmps_ord_def[$nmgp_ordem])) 
       { 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao'] = "igual" ;  
       }
       else
       { 
           $Ordem_tem_quebra = false;
           foreach($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['ordem_quebra'] as $campo => $resto) 
           {
               foreach($resto as $sqldef => $ordem) 
               {
                   if ($sqldef == $nmgp_ordem) 
                   { 
                       $Ordem_tem_quebra = true;
                       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao'] = "inicio" ;  
                       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['ordem_grid'] = ""; 
                       $ordem = ($ordem == "asc") ? "desc" : "asc";
                       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['ordem_quebra'][$campo][$nmgp_ordem] = $ordem;
                       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['ordem_cmp'] = $nmgp_ordem;
                       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['ordem_label'] = trim($ordem);
                   }   
               }   
           }   
           if (!$Ordem_tem_quebra)
           {
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['ordem_grid'] = $nmgp_ordem  ; 
           }
       }
   }   
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao'] == "ordem")  
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao'] = "inicio" ;  
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['ordem_ant'] == $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['ordem_grid'])  
       { 
           if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['ordem_desc'] != " desc")  
           { 
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['ordem_desc'] = " desc" ; 
           } 
           else   
           { 
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['ordem_desc'] = " asc" ;  
           } 
       } 
       else 
       { 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['ordem_desc'] = $this->Cmps_ord_def[$nmgp_ordem];  
       } 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['ordem_label'] = trim($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['ordem_desc']);  
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['ordem_ant'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['ordem_grid'];  
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['ordem_cmp'] = $nmgp_ordem;  
   }  
   if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['inicio']))  
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['inicio'] = 0 ;  
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['final']  = 0 ;  
   }   
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opc_edit'])  
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opc_edit'] = false;  
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao'] != "inicio") 
       { 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao'] = "edit" ; 
       } 
   }   
   if (!empty($nmgp_parms) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao'] != "pdf")   
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao'] = "igual";
       $rec = "ini";
   }
   if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['where_orig']) || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['prim_cons'] || !empty($nmgp_parms))  
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['prim_cons'] = false;  
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['where_orig'] = " where view_sales_detail_group_todo.uniqueid=sales.uniqueid and sales.idcliente=customer.idcustomer";  
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['where_pesq']        = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['where_orig'];  
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['where_pesq_ant']    = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['where_orig'];  
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['cond_pesq']         = ""; 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['where_pesq_filtro'] = "";
   }   
   if  (!empty($this->nm_where_dinamico)) 
   {   
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['where_pesq'] .= $this->nm_where_dinamico;
   }   
   $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['where_orig'];
   $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['where_pesq'];
   $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['where_pesq_filtro'];
   $this->sc_where_atual_f = (!empty($this->sc_where_atual)) ? "(" . trim(substr($this->sc_where_atual, 6)) . ")" : "";
   $this->sc_where_atual_f = str_replace("%", "@percent@", $this->sc_where_atual_f);
   $this->sc_where_atual_f = "NM_where_filter*scin" . str_replace("'", "@aspass@", $this->sc_where_atual_f) . "*scout";
//
//--------- 
//
   $nmgp_opc_orig = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao']; 
   if (isset($rec)) 
   { 
       if ($rec == "ini") 
       { 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao'] = "inicio" ; 
       } 
       elseif ($rec == "fim") 
       { 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao'] = "final" ; 
       } 
       else 
       { 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao'] = "avanca" ; 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['final'] = $rec; 
           if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['final'] > 0) 
           { 
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['final']-- ; 
           } 
       } 
   } 
   $this->NM_opcao = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao']; 
   if ($this->NM_opcao == "print") 
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao_print'] = "print" ; 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao']       = "igual" ; 
       if ($this->Ini->sc_export_ajax) 
       { 
           $this->Img_embbed = true;
       } 
   } 
// 
   $this->count_ger = 0;
   $this->sum_view_sales_detail_group_todo_cantidad = 0;
   $this->sum_valor = 0;
   $this->arg_sum_view_sales_detail_group_todo_fecha = "";
   $this->count_view_sales_detail_group_todo_fecha = 0;
   $this->sum_view_sales_detail_group_todo_fecha_view_sales_detail_group_todo_cantidad = 0;
   $this->sum_view_sales_detail_group_todo_fecha_valor = 0;
   $this->arg_sum_view_sales_detail_group_todo_fecha_scgb_255 = "";
   $this->count_view_sales_detail_group_todo_fecha_scgb_255 = 0;
   $this->sum_view_sales_detail_group_todo_fecha_scgb_255_view_sales_detail_group_todo_cantidad = 0;
   $this->sum_view_sales_detail_group_todo_fecha_scgb_255_valor = 0;
   $this->arg_sum_view_sales_detail_group_todo_producto = "";
   $this->count_view_sales_detail_group_todo_producto = 0;
   $this->sum_view_sales_detail_group_todo_producto_view_sales_detail_group_todo_cantidad = 0;
   $this->sum_view_sales_detail_group_todo_producto_valor = 0;
   $this->arg_sum_sales_cliente = "";
   $this->count_sales_cliente = 0;
   $this->sum_sales_cliente_view_sales_detail_group_todo_cantidad = 0;
   $this->sum_sales_cliente_valor = 0;
   $this->arg_sum_view_sales_detail_group_todo_cuentaventa = "";
   $this->count_view_sales_detail_group_todo_cuentaventa = 0;
   $this->sum_view_sales_detail_group_todo_cuentaventa_view_sales_detail_group_todo_cantidad = 0;
   $this->sum_view_sales_detail_group_todo_cuentaventa_valor = 0;
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['tot_geral'][1])) 
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['sc_total'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['tot_geral'][1] ;  
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao'] == "final" || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['qt_reg_grid'] == "all") 
   { 
       $Gb_geral = "quebra_geral_" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['SC_Ind_Groupby'];
       $this->Tot->$Gb_geral();
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['sc_total'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['tot_geral'][1] ;  
       $this->count_ger = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['tot_geral'][1];
   } 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['where_dinamic']) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['where_dinamic'] != $this->nm_where_dinamico)  
   { 
       unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['tot_geral']);
   } 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['where_dinamic'] = $this->nm_where_dinamico;  
   if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['tot_geral']) || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['where_pesq'] != $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['where_pesq_ant'] || $nmgp_opc_orig == "edit") 
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['contr_total_geral'] = "NAO";
       unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['sc_total']);
       $Gb_geral = "quebra_geral_" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['SC_Ind_Groupby'];
       $this->Tot->$Gb_geral();
       if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['contr_array_resumo']))  
       { 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['contr_array_resumo'] = "NAO";
       } 
   } 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['sc_total'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['tot_geral'][1] ;  
   $this->count_ger = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['tot_geral'][1];
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['where_resumo']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['where_resumo'])) 
   { 
       $nmgp_select = "SELECT count(*) AS countTest from " . $this->Ini->nm_tabela; 
       $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['where_pesq']; 
       if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['where_pesq'])) 
       { 
           $nmgp_select .= " where " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['where_resumo']; 
       } 
       else
       { 
           $nmgp_select .= " and (" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['where_resumo'] . ")"; 
       } 
       $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
       $rt_grid = $this->Db->Execute($nmgp_select) ; 
       if ($rt_grid === false && !$rt_grid->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
       { 
           $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
           exit ; 
       }  
       $this->count_ger = $rt_grid->fields[0];
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['sc_total'] = $rt_grid->fields[0];  
       
   } 
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['qt_reg_grid'] == "all") 
   { 
        $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['qt_reg_grid'] = $this->count_ger;
        $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao']       = "inicio";
   } 
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao'] == "inicio" || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao'] == "pesq") 
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['inicio'] = 0 ; 
   } 
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao'] == "final") 
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['inicio'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['sc_total'] - $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['qt_reg_grid']; 
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['inicio'] < 0) 
       { 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['inicio'] = 0 ; 
       } 
   } 
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao'] == "retorna") 
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['inicio'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['inicio'] - $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['qt_reg_grid']; 
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['inicio'] < 0) 
       { 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['inicio'] = 0 ; 
       } 
   } 
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao'] == "avanca" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['sc_total'] >  $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['final']) 
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['inicio'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['final']; 
   } 
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao_print'] != "print" && substr($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao'], 0, 7) != "detalhe" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao'] != "pdf") 
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao'] = "igual"; 
   } 
   $this->Rec_ini = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['inicio'] - $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['qt_reg_grid']; 
   if ($this->Rec_ini < 0) 
   { 
       $this->Rec_ini = 0; 
   } 
   $this->Rec_fim = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['inicio'] + $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['qt_reg_grid'] + 1; 
   if ($this->Rec_fim > $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['sc_total']) 
   { 
       $this->Rec_fim = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['sc_total']; 
   } 
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['inicio'] > 0) 
   { 
       $this->Rec_ini++ ; 
   } 
   $this->nmgp_reg_start = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['inicio']; 
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['inicio'] > 0) 
   { 
       $this->nmgp_reg_start--; 
   } 
   $this->nm_grid_ini = $this->nmgp_reg_start + 1; 
   if ($this->nmgp_reg_start != 0) 
   { 
       $this->nm_grid_ini++;
   }  
//----- 
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
   { 
       $nmgp_select = "SELECT str_replace (convert(char(10),view_sales_detail_group_todo.fecha,102), '.', '-') + ' ' + convert(char(8),view_sales_detail_group_todo.fecha,20) as cmp_maior_30_1, view_sales_detail_group_todo.cantidad as cmp_maior_30_2, view_sales_detail_group_todo.unit_value as cmp_maior_30_3, view_sales_detail_group_todo.producto as cmp_maior_30_4, unit_value*cantidad as valor, view_sales_detail_group_todo.cuentaventa as cmp_maior_30_5, sales.idcliente as sales_idcliente, sales.cliente as sales_cliente, sales.factura as sales_factura, customer.nombre as customer_nombre, customer.correo as customer_correo, customer.celular as customer_celular, customer.direccion as customer_direccion, customer.idcustomer as customer_idcustomer from " . $this->Ini->nm_tabela; 
   } 
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
   { 
       $nmgp_select = "SELECT view_sales_detail_group_todo.fecha as cmp_maior_30_1, view_sales_detail_group_todo.cantidad as cmp_maior_30_2, view_sales_detail_group_todo.unit_value as cmp_maior_30_3, view_sales_detail_group_todo.producto as cmp_maior_30_4, unit_value*cantidad as valor, view_sales_detail_group_todo.cuentaventa as cmp_maior_30_5, sales.idcliente as sales_idcliente, sales.cliente as sales_cliente, sales.factura as sales_factura, customer.nombre as customer_nombre, customer.correo as customer_correo, customer.celular as customer_celular, customer.direccion as customer_direccion, customer.idcustomer as customer_idcustomer from " . $this->Ini->nm_tabela; 
   } 
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
   { 
       $nmgp_select = "SELECT convert(char(23),view_sales_detail_group_todo.fecha,121) as cmp_maior_30_1, view_sales_detail_group_todo.cantidad as cmp_maior_30_2, view_sales_detail_group_todo.unit_value as cmp_maior_30_3, view_sales_detail_group_todo.producto as cmp_maior_30_4, unit_value*cantidad as valor, view_sales_detail_group_todo.cuentaventa as cmp_maior_30_5, sales.idcliente as sales_idcliente, sales.cliente as sales_cliente, sales.factura as sales_factura, customer.nombre as customer_nombre, customer.correo as customer_correo, customer.celular as customer_celular, customer.direccion as customer_direccion, customer.idcustomer as customer_idcustomer from " . $this->Ini->nm_tabela; 
   } 
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
   { 
       $nmgp_select = "SELECT view_sales_detail_group_todo.fecha as cmp_maior_30_1, view_sales_detail_group_todo.cantidad as cmp_maior_30_2, view_sales_detail_group_todo.unit_value as cmp_maior_30_3, view_sales_detail_group_todo.producto as cmp_maior_30_4, unit_value*cantidad as valor, view_sales_detail_group_todo.cuentaventa as cmp_maior_30_5, sales.idcliente as sales_idcliente, sales.cliente as sales_cliente, sales.factura as sales_factura, customer.nombre as customer_nombre, customer.correo as customer_correo, customer.celular as customer_celular, customer.direccion as customer_direccion, customer.idcustomer as customer_idcustomer from " . $this->Ini->nm_tabela; 
   } 
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
   { 
       $nmgp_select = "SELECT EXTEND(view_sales_detail_group_todo.fecha, YEAR TO DAY) as cmp_maior_30_1, view_sales_detail_group_todo.cantidad as cmp_maior_30_2, view_sales_detail_group_todo.unit_value as cmp_maior_30_3, view_sales_detail_group_todo.producto as cmp_maior_30_4, unit_value*cantidad as valor, view_sales_detail_group_todo.cuentaventa as cmp_maior_30_5, sales.idcliente as sales_idcliente, sales.cliente as sales_cliente, sales.factura as sales_factura, customer.nombre as customer_nombre, customer.correo as customer_correo, customer.celular as customer_celular, customer.direccion as customer_direccion, customer.idcustomer as customer_idcustomer from " . $this->Ini->nm_tabela; 
   } 
   else 
   { 
       $nmgp_select = "SELECT view_sales_detail_group_todo.fecha as cmp_maior_30_1, view_sales_detail_group_todo.cantidad as cmp_maior_30_2, view_sales_detail_group_todo.unit_value as cmp_maior_30_3, view_sales_detail_group_todo.producto as cmp_maior_30_4, unit_value*cantidad as valor, view_sales_detail_group_todo.cuentaventa as cmp_maior_30_5, sales.idcliente as sales_idcliente, sales.cliente as sales_cliente, sales.factura as sales_factura, customer.nombre as customer_nombre, customer.correo as customer_correo, customer.celular as customer_celular, customer.direccion as customer_direccion, customer.idcustomer as customer_idcustomer from " . $this->Ini->nm_tabela; 
   } 
   $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['where_pesq']; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['where_resumo']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['where_resumo'])) 
   { 
       if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['where_pesq'])) 
       { 
           $nmgp_select .= " where " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['where_resumo']; 
       } 
       else
       { 
           $nmgp_select .= " and (" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['where_resumo'] . ")"; 
       } 
   } 
   $nmgp_order_by = ""; 
   $campos_order_select = "";
   foreach($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['ordem_select'] as $campo => $ordem) 
   {
        if ($campo != $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['ordem_grid']) 
        {
           if (!empty($campos_order_select)) 
           {
               $campos_order_select .= ", ";
           }
           $campos_order_select .= $campo . " " . $ordem;
        }
   }
   $campos_order = "";
   foreach($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['ordem_quebra'] as $campo => $resto) 
   {
       foreach($resto as $sqldef => $ordem) 
       {
           $format       = $this->Ini->Get_Gb_date_format($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['SC_Ind_Groupby'], $campo);
           $campos_order = $this->Ini->Get_date_order_groupby($sqldef, $ordem, $format, $campos_order);
       }
   }
   if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['ordem_grid'])) 
   { 
       if (!empty($campos_order)) 
       { 
           $campos_order .= ", ";
       } 
       $nmgp_order_by = " order by " . $campos_order . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['ordem_grid'] . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['ordem_desc']; 
   } 
   elseif (!empty($campos_order_select)) 
   { 
       if (!empty($campos_order)) 
       { 
           $campos_order .= ", ";
       } 
       $nmgp_order_by = " order by " . $campos_order . $campos_order_select; 
   } 
   elseif (!empty($campos_order)) 
   { 
       $nmgp_order_by = " order by " . $campos_order; 
   } 
   if (substr(trim($nmgp_order_by), -1) == ",")
   {
       $nmgp_order_by = " " . substr(trim($nmgp_order_by), 0, -1);
   }
   if (trim($nmgp_order_by) == "order by")
   {
       $nmgp_order_by = "";
   }
   $nmgp_select .= $nmgp_order_by; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['order_grid'] = $nmgp_order_by;
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['embutida'] || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao'] == "pdf" || $this->Ini->Apl_paginacao == "FULL")
   {
       $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
       $this->rs_grid = $this->Db->Execute($nmgp_select) ; 
   }
   else  
   {
       $_SESSION['scriptcase']['sc_sql_ult_comando'] = "SelectLimit($nmgp_select, " . ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['qt_reg_grid'] + 2) . ", $this->nmgp_reg_start)" ; 
       $this->rs_grid = $this->Db->SelectLimit($nmgp_select, $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['qt_reg_grid'] + 2, $this->nmgp_reg_start) ; 
   }  
   if ($this->rs_grid === false && !$this->rs_grid->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
   { 
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit ; 
   }  
   if ($this->rs_grid->EOF || ($this->rs_grid === false && $GLOBALS["NM_ERRO_IBASE"] == 1)) 
   { 
       $this->force_toolbar = true;
       $this->nm_grid_sem_reg = $this->Ini->Nm_lang['lang_errm_empt']; 
   }  
   else 
   { 
       $this->view_sales_detail_group_todo_fecha = $this->rs_grid->fields[0] ;  
       $this->view_sales_detail_group_todo_cantidad = $this->rs_grid->fields[1] ;  
       $this->view_sales_detail_group_todo_cantidad =  str_replace(",", ".", $this->view_sales_detail_group_todo_cantidad);
       $this->view_sales_detail_group_todo_cantidad = (string)$this->view_sales_detail_group_todo_cantidad;
       $this->view_sales_detail_group_todo_unit_value = $this->rs_grid->fields[2] ;  
       $this->view_sales_detail_group_todo_unit_value =  str_replace(",", ".", $this->view_sales_detail_group_todo_unit_value);
       $this->view_sales_detail_group_todo_unit_value = (string)$this->view_sales_detail_group_todo_unit_value;
       $this->view_sales_detail_group_todo_producto = $this->rs_grid->fields[3] ;  
       $this->valor = $this->rs_grid->fields[4] ;  
       $this->valor =  str_replace(",", ".", $this->valor);
       $this->valor = (string)$this->valor;
       $this->view_sales_detail_group_todo_cuentaventa = $this->rs_grid->fields[5] ;  
       $this->sales_idcliente = $this->rs_grid->fields[6] ;  
       $this->sales_cliente = $this->rs_grid->fields[7] ;  
       $this->sales_factura = $this->rs_grid->fields[8] ;  
       $this->sales_factura = (string)$this->sales_factura;
       $this->customer_nombre = $this->rs_grid->fields[9] ;  
       $this->customer_correo = $this->rs_grid->fields[10] ;  
       $this->customer_celular = $this->rs_grid->fields[11] ;  
       $this->customer_direccion = $this->rs_grid->fields[12] ;  
       $this->customer_idcustomer = $this->rs_grid->fields[13] ;  
       $this->view_sales_detail_group_todo_fecha_scgb_255 = $this->view_sales_detail_group_todo_fecha;
       if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['SC_Gb_Free_orig']))
       {
           foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['SC_Gb_Free_orig'] as $Cmp_clone => $Cmp_orig)
           {
               $this->$Cmp_clone = $this->$Cmp_orig;
           }
       }
       if (!isset($this->view_sales_detail_group_todo_fecha)) { $this->view_sales_detail_group_todo_fecha = ""; }
       if (!isset($this->view_sales_detail_group_todo_fecha_scgb_255)) { $this->view_sales_detail_group_todo_fecha_scgb_255 = ""; }
       if (!isset($this->view_sales_detail_group_todo_producto)) { $this->view_sales_detail_group_todo_producto = ""; }
       if (!isset($this->sales_cliente)) { $this->sales_cliente = ""; }
       if (!isset($this->view_sales_detail_group_todo_cuentaventa)) { $this->view_sales_detail_group_todo_cuentaventa = ""; }
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['SC_Ind_Groupby'] == "sc_free_group_by")
       {
           foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['SC_Gb_Free_cmp'] as $cmp_gb => $resto)
           {
               $Cmp_orig = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['SC_Gb_Free_orig'][$cmp_gb])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['SC_Gb_Free_orig'][$cmp_gb] : $cmp_gb;
               if ($Cmp_orig == "view_sales_detail_group_todo_fecha")
               {
                   $Str_arg_sum = "arg_sum_" . $cmp_gb;
                   $Format_tst = $this->Ini->Get_Gb_date_format('sc_free_group_by', $cmp_gb);
                   $TP_Time = (in_array('view_sales_detail_group_todo_fecha', $this->Ini->Cmp_Sql_Time)) ? "0000-00-00 " : "";
                   $this->$Str_arg_sum = $this->Ini->Get_date_arg_sum($TP_Time . $this->view_sales_detail_group_todo_fecha, $Format_tst, "view_sales_detail_group_todo.fecha");
               }
           }
       }
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['SC_Ind_Groupby'] == "inicial")
       {
           $Format_tst = $this->Ini->Get_Gb_date_format('inicial', 'view_sales_detail_group_todo_fecha');
           $TP_Time = (in_array('view_sales_detail_group_todo_fecha', $this->Ini->Cmp_Sql_Time)) ? "0000-00-00 " : "";
           $this->arg_sum_view_sales_detail_group_todo_fecha = $this->Ini->Get_date_arg_sum($TP_Time . $this->view_sales_detail_group_todo_fecha, $Format_tst, "view_sales_detail_group_todo.fecha");
           if (empty($this->view_sales_detail_group_todo_fecha))
           {
               $this->Tot->Sc_groupby_view_sales_detail_group_todo_fecha = "view_sales_detail_group_todo.fecha";
           }
           else
           {
               $this->Tot->Sc_groupby_view_sales_detail_group_todo_fecha = $this->Ini->Get_sql_date_groupby("view_sales_detail_group_todo.fecha", $Format_tst);
           }
       }
       if ($this->view_sales_detail_group_todo_fecha == "")
       {
           $this->arg_sum_view_sales_detail_group_todo_fecha = " is null";
       }
       elseif ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['SC_Ind_Groupby'] == "_NM_SC_")
       {
           $this->arg_sum_view_sales_detail_group_todo_fecha = " = " . $this->Db->qstr($this->view_sales_detail_group_todo_fecha);
       }
       $this->arg_sum_view_sales_detail_group_todo_producto = " = " . $this->Db->qstr($this->view_sales_detail_group_todo_producto);
       $this->arg_sum_view_sales_detail_group_todo_cuentaventa = " = " . $this->Db->qstr($this->view_sales_detail_group_todo_cuentaventa);
       $this->arg_sum_sales_cliente = " = " . $this->Db->qstr($this->sales_cliente);
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['SC_Ind_Groupby'] == "sc_free_group_by")
       {
           foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['SC_Gb_Free_cmp'] as $cmp_gb => $resto)
           {
               $Cmp_orig = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['SC_Gb_Free_orig'][$cmp_gb])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['SC_Gb_Free_orig'][$cmp_gb] : $cmp_gb;
               if ($Cmp_orig == "view_sales_detail_group_todo_fecha_scgb_255")
               {
                   $Str_arg_sum = "arg_sum_" . $cmp_gb;
                   $Format_tst = $this->Ini->Get_Gb_date_format('sc_free_group_by', $cmp_gb);
                   $TP_Time = (in_array('view_sales_detail_group_todo_fecha_scgb_255', $this->Ini->Cmp_Sql_Time)) ? "0000-00-00 " : "";
                   $this->$Str_arg_sum = $this->Ini->Get_date_arg_sum($TP_Time . $this->view_sales_detail_group_todo_fecha_scgb_255, $Format_tst, "view_sales_detail_group_todo.fecha");
               }
           }
       }
       if ($this->view_sales_detail_group_todo_fecha_scgb_255 == "")
       {
           $this->arg_sum_view_sales_detail_group_todo_fecha_scgb_255 = " is null";
       }
       elseif ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['SC_Ind_Groupby'] == "_NM_SC_")
       {
           $this->arg_sum_view_sales_detail_group_todo_fecha_scgb_255 = " = " . $this->Db->qstr($this->view_sales_detail_group_todo_fecha_scgb_255);
       }
       $this->SC_seq_register = $this->nmgp_reg_start ; 
       $this->SC_seq_page = 0;
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['SC_Ind_Groupby'] == "sc_free_group_by") 
       {
           foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['SC_Gb_Free_cmp'] as $cmp => $sql)
           {
               $Cmp_orig   = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['SC_Gb_Free_orig'][$cmp])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['SC_Gb_Free_orig'][$cmp] : $cmp;
               $Format_tst = $this->Ini->Get_Gb_date_format('sc_free_group_by', $cmp);
               $Cmp_Old    = $cmp . '_Old';
               $TP_Time = (in_array($Cmp_orig, $this->Ini->Cmp_Sql_Time)) ? "0000-00-00 " : "";
               $this->$Cmp_Old = $this->Ini->Get_arg_groupby($TP_Time . $this->$Cmp_orig, $Format_tst); 
           }
           $sql_where = "";
           foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['SC_Gb_Free_cmp'] as $cmp => $sql)
           {
               $Format_tst = $this->Ini->Get_Gb_date_format('sc_free_group_by', $cmp);
               if (!empty($Format_tst))
               {
                   $tmp = $this->$cmp;
                   if (!empty($tmp))
                   {
                       $sql = $this->Ini->Get_sql_date_groupby($sql, $Format_tst);
                   }
               }
               $cmp_qb     = $this->$cmp;
               $tmp        = "arg_sum_" . $cmp;
               $sql_where .= (!empty($sql_where)) ? " and " : "";
               $sql_where .= $sql . $this->$tmp;
               $tmp        = "quebra_" . $cmp . "_sc_free_group_by";
               $this->$tmp($cmp_qb, $sql_where, $cmp);
           }
       }
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['SC_Ind_Groupby'] == "inicial") 
       {
           $Format_tst = $this->Ini->Get_Gb_date_format('inicial', 'view_sales_detail_group_todo_fecha');
           $TP_Time = (in_array('view_sales_detail_group_todo_fecha', $this->Ini->Cmp_Sql_Time)) ? "0000-00-00 " : "";
           $this->view_sales_detail_group_todo_fecha_Old = $this->Ini->Get_arg_groupby($TP_Time . $this->view_sales_detail_group_todo_fecha, $Format_tst); 
           $this->quebra_view_sales_detail_group_todo_fecha_inicial($this->view_sales_detail_group_todo_fecha) ; 
           $this->view_sales_detail_group_todo_cuentaventa_Old = $this->view_sales_detail_group_todo_cuentaventa ; 
           $this->quebra_view_sales_detail_group_todo_cuentaventa_inicial($this->view_sales_detail_group_todo_fecha, $this->view_sales_detail_group_todo_cuentaventa) ; 
           $this->view_sales_detail_group_todo_producto_Old = $this->view_sales_detail_group_todo_producto ; 
           $this->quebra_view_sales_detail_group_todo_producto_inicial($this->view_sales_detail_group_todo_fecha, $this->view_sales_detail_group_todo_cuentaventa, $this->view_sales_detail_group_todo_producto) ; 
       }
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['final'] = $this->nmgp_reg_start ; 
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['inicio'] != 0 && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao'] != "pdf") 
       { 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['final']++ ; 
           $this->SC_seq_register = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['final']; 
           $this->rs_grid->MoveNext(); 
           $this->view_sales_detail_group_todo_fecha = $this->rs_grid->fields[0] ;  
           $this->view_sales_detail_group_todo_cantidad = $this->rs_grid->fields[1] ;  
           $this->view_sales_detail_group_todo_unit_value = $this->rs_grid->fields[2] ;  
           $this->view_sales_detail_group_todo_producto = $this->rs_grid->fields[3] ;  
           $this->valor = $this->rs_grid->fields[4] ;  
           $this->view_sales_detail_group_todo_cuentaventa = $this->rs_grid->fields[5] ;  
           $this->sales_idcliente = $this->rs_grid->fields[6] ;  
           $this->sales_cliente = $this->rs_grid->fields[7] ;  
           $this->sales_factura = $this->rs_grid->fields[8] ;  
           $this->customer_nombre = $this->rs_grid->fields[9] ;  
           $this->customer_correo = $this->rs_grid->fields[10] ;  
           $this->customer_celular = $this->rs_grid->fields[11] ;  
           $this->customer_direccion = $this->rs_grid->fields[12] ;  
           $this->customer_idcustomer = $this->rs_grid->fields[13] ;  
           $this->view_sales_detail_group_todo_fecha_scgb_255 = $this->view_sales_detail_group_todo_fecha;
           if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['SC_Gb_Free_orig']))
           {
               foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['SC_Gb_Free_orig'] as $Cmp_clone => $Cmp_orig)
               {
                   $this->$Cmp_clone = $this->$Cmp_orig;
               }
           }
           if (!isset($this->view_sales_detail_group_todo_fecha)) { $this->view_sales_detail_group_todo_fecha = ""; }
           if (!isset($this->view_sales_detail_group_todo_fecha_scgb_255)) { $this->view_sales_detail_group_todo_fecha_scgb_255 = ""; }
           if (!isset($this->view_sales_detail_group_todo_producto)) { $this->view_sales_detail_group_todo_producto = ""; }
           if (!isset($this->sales_cliente)) { $this->sales_cliente = ""; }
           if (!isset($this->view_sales_detail_group_todo_cuentaventa)) { $this->view_sales_detail_group_todo_cuentaventa = ""; }
       } 
   } 
   $this->nmgp_reg_inicial = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['final'] + 1;
   $this->nmgp_reg_final   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['final'] + $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['qt_reg_grid'];
   $this->nmgp_reg_final   = ($this->nmgp_reg_final > $this->count_ger) ? $this->count_ger : $this->nmgp_reg_final;
// 
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['embutida'])
   { 
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['doc_word'] && !$this->Ini->sc_export_ajax)
       {
           require_once($this->Ini->path_lib_php . "/sc_progress_bar.php");
           $this->pb = new scProgressBar();
           $this->pb->setRoot($this->Ini->root);
           $this->pb->setDir($_SESSION['scriptcase']['grid_detail_sales_todo']['glo_nm_path_imag_temp'] . "/");
           $this->pb->setProgressbarMd5($_GET['pbmd5']);
           $this->pb->initialize();
           $this->pb->setReturnUrl("./");
           $this->pb->setReturnOption($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['word_return']);
           $this->pb->setTotalSteps($this->count_ger);
       }
       if ($this->Ini->Proc_print && $this->Ini->Export_html_zip  && !$this->Ini->sc_export_ajax)
       {
           require_once($this->Ini->path_lib_php . "/sc_progress_bar.php");
           $this->pb = new scProgressBar();
           $this->pb->setRoot($this->Ini->root);
           $this->pb->setDir($_SESSION['scriptcase']['grid_detail_sales_todo']['glo_nm_path_imag_temp'] . "/");
           $this->pb->setProgressbarMd5($_GET['pbmd5']);
           $this->pb->initialize();
           $this->pb->setReturnUrl("./");
           $this->pb->setReturnOption($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['print_return']);
           $this->pb->setTotalSteps($this->count_ger);
       }
       if (!$this->Ini->sc_export_ajax && !$this->Print_All && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao'] == "pdf" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['pdf_res'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['embutida_pdf'] != "pdf")
       {
           //---------- Gauge ----------
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE><?php echo $this->Ini->Nm_lang['lang_othr_grid_title'] ?>  :: PDF</TITLE>
 <META http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
           if ($_SESSION['scriptcase']['proc_mobile'])
           {
?>
                    <meta name="viewport" content="minimal-ui, width=300, initial-scale=1, maximum-scale=1, user-scalable=no">
                    <meta name="mobile-web-app-capable" content="yes">
                    <meta name="apple-mobile-web-app-capable" content="yes">
                    <meta http-equiv="X-UA-Compatible" content="IE=edge">
                    <link rel="apple-touch-icon"   sizes="57x57" href="">
                    <link rel="apple-touch-icon"   sizes="60x60" href="">
                    <link rel="apple-touch-icon"   sizes="72x72" href="">
                    <link rel="apple-touch-icon"   sizes="76x76" href="">
                    <link rel="apple-touch-icon" sizes="114x114" href="">
                    <link rel="apple-touch-icon" sizes="120x120" href="">
                    <link rel="apple-touch-icon" sizes="144x144" href="">
                    <link rel="apple-touch-icon" sizes="152x152" href="">
                    <link rel="apple-touch-icon" sizes="180x180" href="">
                    <link rel="icon" type="image/png" sizes="192x192" href="">
                    <link rel="icon" type="image/png"   sizes="32x32" href="">
                    <link rel="icon" type="image/png"   sizes="96x96" href="">
                    <link rel="icon" type="image/png"   sizes="16x16" href="">
                    <meta name="msapplication-TileColor" content="#009061">
                    <meta name="msapplication-TileImage" content="">
                    <meta name="theme-color" content="#009061">
                    <meta name="apple-mobile-web-app-status-bar-style" content="#009061">
                    <link rel="shortcut icon" href=""><?php
           }
?>
 <META http-equiv="Expires" content="Fri, Jan 01 1900 00:00:00 GMT">
 <META http-equiv="Last-Modified" content="<?php echo gmdate("D, d M Y H:i:s"); ?>" GMT">
 <META http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate">
 <META http-equiv="Cache-Control" content="post-check=0, pre-check=0">
 <META http-equiv="Pragma" content="no-cache">
 <link rel="shortcut icon" href="../_lib/img/scriptcase__NM__ico__NM__favicon.ico">
 <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_all ?>_grid.css" /> 
 <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_all ?>_grid<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" /> 
 <?php 
 if(isset($this->Ini->str_google_fonts) && !empty($this->Ini->str_google_fonts)) 
 { 
 ?> 
 <link href="<?php echo $this->Ini->str_google_fonts ?>" rel="stylesheet" /> 
 <?php 
 } 
 ?> 
 <link rel="stylesheet" type="text/css" href="../_lib/buttons/<?php echo $this->Ini->Str_btn_css ?>" /> 
 <SCRIPT LANGUAGE="Javascript" SRC="<?php echo $this->Ini->path_js; ?>/nm_gauge.js"></SCRIPT>
</HEAD>
<BODY scrolling="no">
<table class="scGridTabela" style="padding: 0px; border-spacing: 0px; border-width: 0px; vertical-align: top;"><tr class="scGridFieldOddVert"><td>
<?php echo $this->Ini->Nm_lang['lang_pdff_gnrt']; ?>...<br>
<?php
           $this->progress_grid    = $this->rs_grid->RecordCount();
           $this->progress_pdf     = 0;
           $this->progress_res     = isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['pivot_charts']) ? sizeof($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['pivot_charts']) : 0;
           $this->progress_graf    = 0;
           $this->progress_tot     = 0;
           $this->progress_now     = 0;
           $this->progress_lim_tot = 0;
           $this->progress_lim_now = 0;
           if (-1 < $this->progress_grid)
           {
               $this->progress_lim_qtd = (250 < $this->progress_grid) ? 250 : $this->progress_grid;
               $this->progress_lim_tot = floor($this->progress_grid / $this->progress_lim_qtd);
               $this->progress_pdf     = floor($this->progress_grid * 0.25) + 1;
               $this->progress_tot     = $this->progress_grid + $this->progress_pdf + $this->progress_res + $this->progress_graf;
               $str_pbfile             = $this->Ini->root . $this->Ini->path_imag_temp . '/sc_pb_' . session_id() . '.tmp';
               $this->progress_fp      = fopen($str_pbfile, 'w');
               grid_detail_sales_todo_pdf_progress_call("PDF\n", $this->Ini->Nm_lang);
               grid_detail_sales_todo_pdf_progress_call($this->Ini->path_js   . "\n", $this->Ini->Nm_lang);
               grid_detail_sales_todo_pdf_progress_call($this->Ini->path_prod . "/img/\n", $this->Ini->Nm_lang);
               grid_detail_sales_todo_pdf_progress_call($this->progress_tot   . "\n", $this->Ini->Nm_lang);
               fwrite($this->progress_fp, "PDF\n");
               fwrite($this->progress_fp, $this->Ini->path_js   . "\n");
               fwrite($this->progress_fp, $this->Ini->path_prod . "/img/\n");
               fwrite($this->progress_fp, $this->progress_tot   . "\n");
               $lang_protect = $this->Ini->Nm_lang['lang_pdff_strt'];
               if (!NM_is_utf8($lang_protect))
               {
                   $lang_protect = sc_convert_encoding($lang_protect, "UTF-8", $_SESSION['scriptcase']['charset']);
               }
               grid_detail_sales_todo_pdf_progress_call($this->progress_tot . "_#NM#_" . "1_#NM#_" . $lang_protect . "...\n", $this->Ini->Nm_lang);
               fwrite($this->progress_fp, "1_#NM#_" . $lang_protect . "...\n");
               flush();
           }
       }
       $nm_fundo_pagina = ""; 
       header("X-XSS-Protection: 1; mode=block");
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['doc_word'])
       {
           $nm_saida->saida("  <html xmlns:v=\"urn:schemas-microsoft-com:vml\" xmlns:o=\"urn:schemas-microsoft-com:office:office\" xmlns:w=\"urn:schemas-microsoft-com:office:word\" xmlns:m=\"http://schemas.microsoft.com/office/2004/12/omml\" xmlns=\"http://www.w3.org/TR/REC-html40\">\r\n");
       }
       $nm_saida->saida("<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.01 Transitional//EN\"\r\n");
       $nm_saida->saida("            \"http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd\">\r\n");
       $nm_saida->saida("  <HTML" . $_SESSION['scriptcase']['reg_conf']['html_dir'] . ">\r\n");
       $nm_saida->saida("  <HEAD>\r\n");
       $nm_saida->saida("   <TITLE>" . $this->Ini->Nm_lang['lang_othr_grid_title'] . " </TITLE>\r\n");
       $nm_saida->saida("   <META http-equiv=\"Content-Type\" content=\"text/html; charset=" . $_SESSION['scriptcase']['charset_html'] . "\" />\r\n");
       if ($_SESSION['scriptcase']['proc_mobile'])
       {
$nm_saida->saida("                        <meta name=\"viewport\" content=\"minimal-ui, width=300, initial-scale=1, maximum-scale=1, user-scalable=no\">\r\n");
$nm_saida->saida("                        <meta name=\"mobile-web-app-capable\" content=\"yes\">\r\n");
$nm_saida->saida("                        <meta name=\"apple-mobile-web-app-capable\" content=\"yes\">\r\n");
$nm_saida->saida("                        <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">\r\n");
$nm_saida->saida("                        <link rel=\"apple-touch-icon\" sizes=\"57x57\" href=\"\">\r\n");
$nm_saida->saida("                        <link rel=\"apple-touch-icon\" sizes=\"60x60\" href=\"\">\r\n");
$nm_saida->saida("                        <link rel=\"apple-touch-icon\" sizes=\"72x72\" href=\"\">\r\n");
$nm_saida->saida("                        <link rel=\"apple-touch-icon\" sizes=\"76x76\" href=\"\">\r\n");
$nm_saida->saida("                        <link rel=\"apple-touch-icon\" sizes=\"114x114\" href=\"\">\r\n");
$nm_saida->saida("                        <link rel=\"apple-touch-icon\" sizes=\"120x120\" href=\"\">\r\n");
$nm_saida->saida("                        <link rel=\"apple-touch-icon\" sizes=\"144x144\" href=\"\">\r\n");
$nm_saida->saida("                        <link rel=\"apple-touch-icon\" sizes=\"152x152\" href=\"\">\r\n");
$nm_saida->saida("                        <link rel=\"apple-touch-icon\" sizes=\"180x180\" href=\"\">\r\n");
$nm_saida->saida("                        <link rel=\"icon\" type=\"image/png\" sizes=\"192x192\"  href=\"\">\r\n");
$nm_saida->saida("                        <link rel=\"icon\" type=\"image/png\" sizes=\"32x32\" href=\"\">\r\n");
$nm_saida->saida("                        <link rel=\"icon\" type=\"image/png\" sizes=\"96x96\" href=\"\">\r\n");
$nm_saida->saida("                        <link rel=\"icon\" type=\"image/png\" sizes=\"16x16\" href=\"\">\r\n");
$nm_saida->saida("                        <meta name=\"msapplication-TileColor\" content=\"#009061\" >\r\n");
$nm_saida->saida("                        <meta name=\"msapplication-TileImage\" content=\"\">\r\n");
$nm_saida->saida("                        <meta name=\"theme-color\" content=\"#009061\">\r\n");
$nm_saida->saida("                        <meta name=\"apple-mobile-web-app-status-bar-style\" content=\"#009061\">\r\n");
$nm_saida->saida("                        <link rel=\"shortcut icon\" href=\"\">\r\n");
       }
       if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['doc_word'])
       {
           $nm_saida->saida("   <META http-equiv=\"Expires\" content=\"Fri, Jan 01 1900 00:00:00 GMT\"/>\r\n");
           $nm_saida->saida("   <META http-equiv=\"Last-Modified\" content=\"" . gmdate('D, d M Y H:i:s') . " GMT\"/>\r\n");
           $nm_saida->saida("   <META http-equiv=\"Cache-Control\" content=\"no-store, no-cache, must-revalidate\"/>\r\n");
           $nm_saida->saida("   <META http-equiv=\"Cache-Control\" content=\"post-check=0, pre-check=0\"/>\r\n");
           $nm_saida->saida("   <META http-equiv=\"Pragma\" content=\"no-cache\"/>\r\n");
       }
       $nm_saida->saida("   <link rel=\"shortcut icon\" href=\"../_lib/img/scriptcase__NM__ico__NM__favicon.ico\">\r\n");
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao'] != "pdf" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['embutida'])
       { 
           $css_body = "";
       } 
       else 
       { 
           $css_body = "margin-left:0px;margin-right:0px;margin-top:0px;margin-bottom:0px;";
       } 
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao'] != "pdf" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['embutida'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['ajax_nav'] && !$this->Ini->sc_export_ajax)
       { 
           $nm_saida->saida("   <form name=\"form_ajax_redir_1\" method=\"post\" style=\"display: none\">\r\n");
           $nm_saida->saida("    <input type=\"hidden\" name=\"nmgp_parms\">\r\n");
           $nm_saida->saida("    <input type=\"hidden\" name=\"nmgp_outra_jan\">\r\n");
           $nm_saida->saida("   </form>\r\n");
           $nm_saida->saida("   <form name=\"form_ajax_redir_2\" method=\"post\" style=\"display: none\"> \r\n");
           $nm_saida->saida("    <input type=\"hidden\" name=\"nmgp_parms\">\r\n");
           $nm_saida->saida("    <input type=\"hidden\" name=\"nmgp_url_saida\">\r\n");
           $nm_saida->saida("    <input type=\"hidden\" name=\"script_case_init\">\r\n");
           $nm_saida->saida("   </form>\r\n");
           $confirmButtonClass = '';
           $cancelButtonClass  = '';
           $confirmButtonText  = $this->Ini->Nm_lang['lang_btns_cfrm'];
           $cancelButtonText   = $this->Ini->Nm_lang['lang_btns_cncl'];
           $confirmButtonFA    = '';
           $cancelButtonFA     = '';
           $confirmButtonFAPos = '';
           $cancelButtonFAPos  = '';
           if (isset($this->arr_buttons['bsweetalert_ok']) && isset($this->arr_buttons['bsweetalert_ok']['style']) && '' != $this->arr_buttons['bsweetalert_ok']['style']) {
               $confirmButtonClass = 'scButton_' . $this->arr_buttons['bsweetalert_ok']['style'];
           }
           if (isset($this->arr_buttons['bsweetalert_cancel']) && isset($this->arr_buttons['bsweetalert_cancel']['style']) && '' != $this->arr_buttons['bsweetalert_cancel']['style']) {
               $cancelButtonClass = 'scButton_' . $this->arr_buttons['bsweetalert_cancel']['style'];
           }
           if (isset($this->arr_buttons['bsweetalert_ok']) && isset($this->arr_buttons['bsweetalert_ok']['value']) && '' != $this->arr_buttons['bsweetalert_ok']['value']) {
               $confirmButtonText = $this->arr_buttons['bsweetalert_ok']['value'];
           }
           if (isset($this->arr_buttons['bsweetalert_cancel']) && isset($this->arr_buttons['bsweetalert_cancel']['value']) && '' != $this->arr_buttons['bsweetalert_cancel']['value']) {
               $cancelButtonText = $this->arr_buttons['bsweetalert_cancel']['value'];
           }
           if (isset($this->arr_buttons['bsweetalert_ok']) && isset($this->arr_buttons['bsweetalert_ok']['fontawesomeicon']) && '' != $this->arr_buttons['bsweetalert_ok']['fontawesomeicon']) {
               $confirmButtonFA = $this->arr_buttons['bsweetalert_ok']['fontawesomeicon'];
           }
           if (isset($this->arr_buttons['bsweetalert_cancel']) && isset($this->arr_buttons['bsweetalert_cancel']['fontawesomeicon']) && '' != $this->arr_buttons['bsweetalert_cancel']['fontawesomeicon']) {
               $cancelButtonFA = $this->arr_buttons['bsweetalert_cancel']['fontawesomeicon'];
           }
           if (isset($this->arr_buttons['bsweetalert_ok']) && isset($this->arr_buttons['bsweetalert_ok']['display_position']) && 'img_right' != $this->arr_buttons['bsweetalert_ok']['display_position']) {
               $confirmButtonFAPos = 'text_right';
           }
           if (isset($this->arr_buttons['bsweetalert_cancel']) && isset($this->arr_buttons['bsweetalert_cancel']['display_position']) && 'img_right' != $this->arr_buttons['bsweetalert_cancel']['display_position']) {
               $cancelButtonFAPos = 'text_right';
           }
           $nm_saida->saida("   <script type=\"text/javascript\">\r\n");
           $nm_saida->saida("     var scSweetAlertConfirmButton = \"" . $confirmButtonClass . "\";\r\n");
           $nm_saida->saida("     var scSweetAlertCancelButton = \"" . $cancelButtonClass . "\";\r\n");
           $nm_saida->saida("     var scSweetAlertConfirmButtonText = \"" . $confirmButtonText . "\";\r\n");
           $nm_saida->saida("     var scSweetAlertCancelButtonText = \"" . $cancelButtonText . "\";\r\n");
           $nm_saida->saida("     var scSweetAlertConfirmButtonFA = \"" . $confirmButtonFA . "\";\r\n");
           $nm_saida->saida("     var scSweetAlertCancelButtonFA = \"" . $cancelButtonFA . "\";\r\n");
           $nm_saida->saida("     var scSweetAlertConfirmButtonFAPos = \"" . $confirmButtonFAPos . "\";\r\n");
           $nm_saida->saida("     var scSweetAlertCancelButtonFAPos = \"" . $cancelButtonFAPos . "\";\r\n");
           $nm_saida->saida("   </script>\r\n");
           $nm_saida->saida("   <script type=\"text/javascript\" src=\"grid_detail_sales_todo_jquery-3.6.0.min.js\"></script>\r\n");
           $nm_saida->saida("   <script type=\"text/javascript\" src=\"grid_detail_sales_todo_ajax.js\"></script>\r\n");
           $nm_saida->saida("   <script type=\"text/javascript\" src=\"grid_detail_sales_todo_message.js\"></script>\r\n");
           $nm_saida->saida("   <script type=\"text/javascript\">\r\n");
           $nm_saida->saida("     var sc_ajaxBg = '" . $this->Ini->Color_bg_ajax . "';\r\n");
           $nm_saida->saida("     var sc_ajaxBordC = '" . $this->Ini->Border_c_ajax . "';\r\n");
           $nm_saida->saida("     var sc_ajaxBordS = '" . $this->Ini->Border_s_ajax . "';\r\n");
           $nm_saida->saida("     var sc_ajaxBordW = '" . $this->Ini->Border_w_ajax . "';\r\n");
           $nm_saida->saida("   </script>\r\n");
           $nm_saida->saida("   <script type=\"text/javascript\" src=\"../_lib/lib/js/jquery-3.6.0.min.js\"></script>\r\n");
           $nm_saida->saida("   <link rel=\"stylesheet\" type=\"text/css\" href=\"../_lib/css/" . $this->Ini->str_schema_all . "_sweetalert.css\" />\r\n");
           $nm_saida->saida("   <script type=\"text/javascript\" src=\"" . $this->Ini->path_prod . "/third/sweetalert/sweetalert2.all.min.js\"></script>\r\n");
           $nm_saida->saida("   <script type=\"text/javascript\" src=\"" . $this->Ini->path_prod . "/third/sweetalert/polyfill.min.js\"></script>\r\n");
           $nm_saida->saida("<script type=\"text/javascript\" src=\"../_lib/lib/js/frameControl.js\"></script>\r\n");
           $nm_saida->saida("   <link rel=\"stylesheet\" type=\"text/css\" href=\"" . $this->Ini->path_prod . "/third/jquery_plugin/viewerjs/viewer.css\" />\r\n");
           $nm_saida->saida("   <script type=\"text/javascript\" src=\"" . $this->Ini->path_prod . "/third/jquery_plugin/viewerjs/viewer.js\"></script>\r\n");
           $nm_saida->saida("   <script type=\"text/javascript\">\r\n");
           $nm_saida->saida("      if (!window.Promise)\r\n");
           $nm_saida->saida("      {\r\n");
           $nm_saida->saida("          var head = document.getElementsByTagName('head')[0];\r\n");
           $nm_saida->saida("          var js = document.createElement(\"script\");\r\n");
           $nm_saida->saida("          js.src = \"../_lib/lib/js/bluebird.min.js\";\r\n");
           $nm_saida->saida("          head.appendChild(js);\r\n");
           $nm_saida->saida("      }\r\n");
           $nm_saida->saida("      $(\"#TB_iframeContent\").ready(function(){\r\n");
           $nm_saida->saida("         jQuery(document).bind('keydown.thickbox', function(e) {\r\n");
           $nm_saida->saida("            var keyPressed = e.charCode || e.keyCode || e.which;\r\n");
           $nm_saida->saida("            if (keyPressed == 27) { \r\n");
           $nm_saida->saida("                tb_remove();\r\n");
           $nm_saida->saida("            }\r\n");
           $nm_saida->saida("         })\r\n");
           $nm_saida->saida("      })\r\n");
           $nm_saida->saida("   </script>\r\n");
           $nm_saida->saida("   <script type=\"text/javascript\">\r\n");
           $nm_saida->saida("     var applicationKeys = '';\r\n");
           $nm_saida->saida("     applicationKeys += 'ctrl+shift+right';\r\n");
           $nm_saida->saida("     applicationKeys += ',';\r\n");
           $nm_saida->saida("     applicationKeys += 'ctrl+shift+left';\r\n");
           $nm_saida->saida("     applicationKeys += ',';\r\n");
           $nm_saida->saida("     applicationKeys += 'ctrl+right';\r\n");
           $nm_saida->saida("     applicationKeys += ',';\r\n");
           $nm_saida->saida("     applicationKeys += 'ctrl+left';\r\n");
           $nm_saida->saida("     applicationKeys += ',';\r\n");
           $nm_saida->saida("     applicationKeys += 'alt+q';\r\n");
           $nm_saida->saida("     applicationKeys += ',';\r\n");
           $nm_saida->saida("     applicationKeys += 'ctrl+f';\r\n");
           $nm_saida->saida("     applicationKeys += ',';\r\n");
           $nm_saida->saida("     applicationKeys += 'ctrl+s';\r\n");
           $nm_saida->saida("     applicationKeys += ',';\r\n");
           $nm_saida->saida("     applicationKeys += 'alt+enter';\r\n");
           $nm_saida->saida("     applicationKeys += ',';\r\n");
           $nm_saida->saida("     applicationKeys += 'f1';\r\n");
           $nm_saida->saida("     applicationKeys += ',';\r\n");
           $nm_saida->saida("     applicationKeys += 'ctrl+p';\r\n");
           $nm_saida->saida("     applicationKeys += ',';\r\n");
           $nm_saida->saida("     applicationKeys += 'alt+p';\r\n");
           $nm_saida->saida("     applicationKeys += ',';\r\n");
           $nm_saida->saida("     applicationKeys += 'alt+w';\r\n");
           $nm_saida->saida("     applicationKeys += ',';\r\n");
           $nm_saida->saida("     applicationKeys += 'alt+x';\r\n");
           $nm_saida->saida("     applicationKeys += ',';\r\n");
           $nm_saida->saida("     applicationKeys += 'alt+m';\r\n");
           $nm_saida->saida("     applicationKeys += ',';\r\n");
           $nm_saida->saida("     applicationKeys += 'alt+c';\r\n");
           $nm_saida->saida("     applicationKeys += ',';\r\n");
           $nm_saida->saida("     applicationKeys += 'alt+r';\r\n");
           $nm_saida->saida("     applicationKeys += ',';\r\n");
           $nm_saida->saida("     applicationKeys += 'alt+shift+p';\r\n");
           $nm_saida->saida("     applicationKeys += ',';\r\n");
           $nm_saida->saida("     applicationKeys += 'alt+shift+w';\r\n");
           $nm_saida->saida("     applicationKeys += ',';\r\n");
           $nm_saida->saida("     applicationKeys += 'alt+shift+x';\r\n");
           $nm_saida->saida("     applicationKeys += ',';\r\n");
           $nm_saida->saida("     applicationKeys += 'alt+shift+m';\r\n");
           $nm_saida->saida("     applicationKeys += ',';\r\n");
           $nm_saida->saida("     applicationKeys += 'alt+shift+c';\r\n");
           $nm_saida->saida("     applicationKeys += ',';\r\n");
           $nm_saida->saida("     applicationKeys += 'alt+shift+r';\r\n");
           $nm_saida->saida("     var hotkeyList = '';\r\n");
           $nm_saida->saida("     function execHotKey(e, h) {\r\n");
           $nm_saida->saida("         var hotkey_fired = false\r\n");
           $nm_saida->saida("         switch (true) {\r\n");
           $nm_saida->saida("             case (['ctrl+shift+right'].indexOf(h.key) > -1):\r\n");
           $nm_saida->saida("                 hotkey_fired = process_hotkeys('sys_format_fim');\r\n");
           $nm_saida->saida("                 break;\r\n");
           $nm_saida->saida("             case (['ctrl+shift+left'].indexOf(h.key) > -1):\r\n");
           $nm_saida->saida("                 hotkey_fired = process_hotkeys('sys_format_ini');\r\n");
           $nm_saida->saida("                 break;\r\n");
           $nm_saida->saida("             case (['ctrl+right'].indexOf(h.key) > -1):\r\n");
           $nm_saida->saida("                 hotkey_fired = process_hotkeys('sys_format_ava');\r\n");
           $nm_saida->saida("                 break;\r\n");
           $nm_saida->saida("             case (['ctrl+left'].indexOf(h.key) > -1):\r\n");
           $nm_saida->saida("                 hotkey_fired = process_hotkeys('sys_format_ret');\r\n");
           $nm_saida->saida("                 break;\r\n");
           $nm_saida->saida("             case (['alt+q'].indexOf(h.key) > -1):\r\n");
           $nm_saida->saida("                 hotkey_fired = process_hotkeys('sys_format_sai');\r\n");
           $nm_saida->saida("                 break;\r\n");
           $nm_saida->saida("             case (['ctrl+f'].indexOf(h.key) > -1):\r\n");
           $nm_saida->saida("                 hotkey_fired = process_hotkeys('sys_format_fil');\r\n");
           $nm_saida->saida("                 break;\r\n");
           $nm_saida->saida("             case (['ctrl+s'].indexOf(h.key) > -1):\r\n");
           $nm_saida->saida("                 hotkey_fired = process_hotkeys('sys_format_savegrid');\r\n");
           $nm_saida->saida("                 break;\r\n");
           $nm_saida->saida("             case (['alt+enter'].indexOf(h.key) > -1):\r\n");
           $nm_saida->saida("                 hotkey_fired = process_hotkeys('sys_format_res');\r\n");
           $nm_saida->saida("                 break;\r\n");
           $nm_saida->saida("             case (['f1'].indexOf(h.key) > -1):\r\n");
           $nm_saida->saida("                 hotkey_fired = process_hotkeys('sys_format_webh');\r\n");
           $nm_saida->saida("                 break;\r\n");
           $nm_saida->saida("             case (['ctrl+p'].indexOf(h.key) > -1):\r\n");
           $nm_saida->saida("                 hotkey_fired = process_hotkeys('sys_format_imp');\r\n");
           $nm_saida->saida("                 break;\r\n");
           $nm_saida->saida("             case (['alt+p'].indexOf(h.key) > -1):\r\n");
           $nm_saida->saida("                 hotkey_fired = process_hotkeys('sys_format_pdf');\r\n");
           $nm_saida->saida("                 break;\r\n");
           $nm_saida->saida("             case (['alt+w'].indexOf(h.key) > -1):\r\n");
           $nm_saida->saida("                 hotkey_fired = process_hotkeys('sys_format_word');\r\n");
           $nm_saida->saida("                 break;\r\n");
           $nm_saida->saida("             case (['alt+x'].indexOf(h.key) > -1):\r\n");
           $nm_saida->saida("                 hotkey_fired = process_hotkeys('sys_format_xls');\r\n");
           $nm_saida->saida("                 break;\r\n");
           $nm_saida->saida("             case (['alt+m'].indexOf(h.key) > -1):\r\n");
           $nm_saida->saida("                 hotkey_fired = process_hotkeys('sys_format_xml');\r\n");
           $nm_saida->saida("                 break;\r\n");
           $nm_saida->saida("             case (['alt+c'].indexOf(h.key) > -1):\r\n");
           $nm_saida->saida("                 hotkey_fired = process_hotkeys('sys_format_csv');\r\n");
           $nm_saida->saida("                 break;\r\n");
           $nm_saida->saida("             case (['alt+r'].indexOf(h.key) > -1):\r\n");
           $nm_saida->saida("                 hotkey_fired = process_hotkeys('sys_format_rtf');\r\n");
           $nm_saida->saida("                 break;\r\n");
           $nm_saida->saida("             case (['alt+shift+p'].indexOf(h.key) > -1):\r\n");
           $nm_saida->saida("                 hotkey_fired = process_hotkeys('sys_format_email_pdf');\r\n");
           $nm_saida->saida("                 break;\r\n");
           $nm_saida->saida("             case (['alt+shift+w'].indexOf(h.key) > -1):\r\n");
           $nm_saida->saida("                 hotkey_fired = process_hotkeys('sys_format_email_word');\r\n");
           $nm_saida->saida("                 break;\r\n");
           $nm_saida->saida("             case (['alt+shift+x'].indexOf(h.key) > -1):\r\n");
           $nm_saida->saida("                 hotkey_fired = process_hotkeys('sys_format_email_xls');\r\n");
           $nm_saida->saida("                 break;\r\n");
           $nm_saida->saida("             case (['alt+shift+m'].indexOf(h.key) > -1):\r\n");
           $nm_saida->saida("                 hotkey_fired = process_hotkeys('sys_format_email_xml');\r\n");
           $nm_saida->saida("                 break;\r\n");
           $nm_saida->saida("             case (['alt+shift+c'].indexOf(h.key) > -1):\r\n");
           $nm_saida->saida("                 hotkey_fired = process_hotkeys('sys_format_email_csv');\r\n");
           $nm_saida->saida("                 break;\r\n");
           $nm_saida->saida("             case (['alt+shift+r'].indexOf(h.key) > -1):\r\n");
           $nm_saida->saida("                 hotkey_fired = process_hotkeys('sys_format_email_rtf');\r\n");
           $nm_saida->saida("                 break;\r\n");
           $nm_saida->saida("         }\r\n");
           $nm_saida->saida("         if (hotkey_fired) {\r\n");
           $nm_saida->saida("             e.preventDefault();\r\n");
           $nm_saida->saida("             return false;\r\n");
           $nm_saida->saida("         } else {\r\n");
           $nm_saida->saida("             return true;\r\n");
           $nm_saida->saida("         }\r\n");
           $nm_saida->saida("     }\r\n");
           $nm_saida->saida("   </script>\r\n");
           $nm_saida->saida("   <script type=\"text/javascript\" src=\"../_lib/lib/js/hotkeys.inc.js\"></script>\r\n");
           $nm_saida->saida("   <script type=\"text/javascript\" src=\"../_lib/lib/js/hotkeys_setup.js\"></script>\r\n");
           $nm_saida->saida("   <script type=\"text/javascript\" src=\"" . $this->Ini->path_prod . "/third/jquery/js/jquery-ui.js\"></script>\r\n");
           $nm_saida->saida("   <link rel=\"stylesheet\" href=\"" . $this->Ini->path_prod . "/third/jquery/css/smoothness/jquery-ui.css\" type=\"text/css\" media=\"screen\" />\r\n");
           $nm_saida->saida("   <link rel=\"stylesheet\" href=\"" . $this->Ini->path_prod . "/third/font-awesome/css/all.min.css\" type=\"text/css\" media=\"screen\" />\r\n");
           $nm_saida->saida("   <script type=\"text/javascript\" src=\"" . $this->Ini->path_prod . "/third/jquery_plugin/touch_punch/jquery.ui.touch-punch.min.js\"></script>\r\n");
           $nm_saida->saida("   <script type=\"text/javascript\" src=\"" . $this->Ini->path_prod . "/third/jquery_plugin/malsup-blockui/jquery.blockUI.js\"></script>\r\n");
           $nm_saida->saida("   <link rel=\"stylesheet\" type=\"text/css\" href=\"../_lib/css/" . $this->Ini->str_schema_filter . "_calendar.css\" />\r\n");
           $nm_saida->saida("   <link rel=\"stylesheet\" type=\"text/css\" href=\"../_lib/css/" . $this->Ini->str_schema_filter . "_calendar" . $_SESSION['scriptcase']['reg_conf']['css_dir'] . ".css\" />\r\n");
           $nm_saida->saida("   <link rel=\"stylesheet\" href=\"" . $this->Ini->path_prod . "/third/jquery_plugin/dropdown_check_list/css/ui.dropdownchecklist.standalone.css\" type=\"text/css\" />\r\n");
           $nm_saida->saida("   <script type=\"text/javascript\" src=\"" . $this->Ini->path_prod . "/third/jquery_plugin/dropdown_check_list/js/ui.dropdownchecklist.js\"></script>\r\n");
           $nm_saida->saida("        <script type=\"text/javascript\">\r\n");
           $nm_saida->saida("          var sc_pathToTB = '" . $this->Ini->path_prod . "/third/jquery_plugin/thickbox/';\r\n");
           $nm_saida->saida("          var sc_tbLangClose = \"" . html_entity_decode($this->Ini->Nm_lang['lang_tb_close'], ENT_COMPAT, $_SESSION['scriptcase']['charset']) . "\";\r\n");
           $nm_saida->saida("          var sc_tbLangEsc = \"" . html_entity_decode($this->Ini->Nm_lang['lang_tb_esc'], ENT_COMPAT, $_SESSION['scriptcase']['charset']) . "\";\r\n");
           $nm_saida->saida("        </script>\r\n");
           $nm_saida->saida("   <script type=\"text/javascript\" src=\"" . $this->Ini->path_prod . "/third/jquery_plugin/thickbox/thickbox-compressed.js\"></script>\r\n");
           $nm_saida->saida("   <script type=\"text/javascript\" src=\"../_lib/lib/js/scInput.js\"></script>\r\n");
           $nm_saida->saida("   <script type=\"text/javascript\" src=\"../_lib/lib/js/jquery.scInput.js\"></script>\r\n");
           $nm_saida->saida("   <script type=\"text/javascript\" src=\"../_lib/lib/js/jquery.scInput2.js\"></script>\r\n");
           $nm_saida->saida("   <script type=\"text/javascript\" src=\"../_lib/lib/js/bluebird.min.js\"></script>\r\n");
           $nm_saida->saida("   <link rel=\"stylesheet\" href=\"" . $this->Ini->path_prod . "/third/jquery_plugin/thickbox/thickbox.css\" type=\"text/css\" media=\"screen\" />\r\n");
           $nm_saida->saida("   <link rel=\"stylesheet\" type=\"text/css\" href=\"../_lib/buttons/" . $this->Ini->Str_btn_css . "\" /> \r\n");
           $nm_saida->saida("   <link rel=\"stylesheet\" type=\"text/css\" href=\"../_lib/css/" . $this->Ini->str_schema_all . "_form.css\" /> \r\n");
           $nm_saida->saida("   <link rel=\"stylesheet\" type=\"text/css\" href=\"../_lib/css/" . $this->Ini->str_schema_all . "_form" . $_SESSION['scriptcase']['reg_conf']['css_dir'] . ".css\" /> \r\n");
           $nm_saida->saida("   <link rel=\"stylesheet\" type=\"text/css\" href=\"../_lib/css/" . $this->Ini->str_schema_all . "_filter.css\" /> \r\n");
           $nm_saida->saida("   <link rel=\"stylesheet\" type=\"text/css\" href=\"../_lib/css/" . $this->Ini->str_schema_all . "_filter" . $_SESSION['scriptcase']['reg_conf']['css_dir'] . ".css\" /> \r\n");
           $nm_saida->saida("   <link rel=\"stylesheet\" type=\"text/css\" href=\"../_lib/css/" . $this->Ini->str_schema_all . "_appdiv.css\" /> \r\n");
           $nm_saida->saida("   <link rel=\"stylesheet\" type=\"text/css\" href=\"../_lib/css/" . $this->Ini->str_schema_all . "_appdiv" . $_SESSION['scriptcase']['reg_conf']['css_dir'] . ".css\" /> \r\n");
           $nm_saida->saida("   <style type=\"text/css\"> \r\n");
           $nm_saida->saida("     .scGridLabelFont a img[src\$='" . $this->Ini->Label_sort_desc . "'], \r\n");
           $nm_saida->saida("     .scGridLabelFont a img[src\$='" . $this->Ini->Label_sort_asc . "'], \r\n");
           $nm_saida->saida("     .scGridLabelFont a img[src\$='" . $this->arr_buttons['bgraf']['image'] . "'], \r\n");
           $nm_saida->saida("     .scGridLabelFont a img[src\$='" . $this->arr_buttons['bconf_graf']['image'] . "']{opacity:1!important;} \r\n");
           $nm_saida->saida("     .scGridLabelFont a img{opacity:0;transition:all .2s;} \r\n");
           $nm_saida->saida("     .scGridLabelFont:HOVER a img{opacity:1;transition:all .2s;} \r\n");
           $nm_saida->saida("   </style> \r\n");
           $nm_saida->saida("   <script type=\"text/javascript\"> \r\n");
           if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['embutida'])
           { 
               $nm_saida->saida("   function sc_session_redir(url_redir)\r\n");
               $nm_saida->saida("   {\r\n");
           $nm_saida->saida("       if (typeof(sc_session_redir_mobile) === typeof(function(){})) { sc_session_redir_mobile(url_redir); }\r\n");
               $nm_saida->saida("       if (window.parent && window.parent.document != window.document && typeof window.parent.sc_session_redir === 'function')\r\n");
               $nm_saida->saida("       {\r\n");
               $nm_saida->saida("           window.parent.sc_session_redir(url_redir);\r\n");
               $nm_saida->saida("       }\r\n");
               $nm_saida->saida("       else\r\n");
               $nm_saida->saida("       {\r\n");
               $nm_saida->saida("           if (window.opener && typeof window.opener.sc_session_redir === 'function')\r\n");
               $nm_saida->saida("           {\r\n");
               $nm_saida->saida("               window.close();\r\n");
               $nm_saida->saida("               window.opener.sc_session_redir(url_redir);\r\n");
               $nm_saida->saida("           }\r\n");
               $nm_saida->saida("           else\r\n");
               $nm_saida->saida("           {\r\n");
               $nm_saida->saida("               window.location = url_redir;\r\n");
               $nm_saida->saida("           }\r\n");
               $nm_saida->saida("       }\r\n");
               $nm_saida->saida("   }\r\n");
           }
           $nm_saida->saida("   var scBtnGrpStatus = {};\r\n");
           $nm_saida->saida("   var SC_Link_View   = false;\r\n");
           $nm_saida->saida("   var SC_Proc_Mobile = false;\r\n");
           if ($this->Ini->SC_Link_View) {
               $nm_saida->saida("   SC_Link_View = true;\r\n");
           }
           if ($_SESSION['scriptcase']['proc_mobile']) {
               $nm_saida->saida("   SC_Proc_Mobile = true;\r\n");
           }
           $nm_saida->saida("   var Qsearch_ok = true;\r\n");
           if (!$this->Ini->SC_Link_View && $this->nmgp_botoes['qsearch'] != "on")
           {
               $nm_saida->saida("   Qsearch_ok = false;\r\n");
           }
           $nm_saida->saida("   var scQSInit = true;\r\n");
           if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['embutida'] || $this->Ini->Apl_paginacao == "FULL")
           {
               $nm_saida->saida("   var scQtReg  = " . NM_encode_input($this->count_ger) . ";\r\n");
           }
           else
           {
               $nm_saida->saida("   var scQtReg  = " . NM_encode_input($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['qt_reg_grid']) . ";\r\n");
           }
           $nm_saida->saida("   var Dyn_Ini   = true;\r\n");
           $nm_saida->saida("   var nmdg_Form = \"Fdyn_search\";\r\n");
           if (is_file($this->Ini->root . $this->Ini->path_link . "_lib/js/tab_erro_" . $this->Ini->str_lang . ".js"))
           {
               $Tb_err_js = file($this->Ini->root . $this->Ini->path_link . "_lib/js/tab_erro_" . $this->Ini->str_lang . ".js");
               foreach ($Tb_err_js as $Lines)
               {
                   if (NM_is_utf8($Lines) && $_SESSION['scriptcase']['charset'] != "UTF-8")
                   {
                       $Lines = sc_convert_encoding($Lines, $_SESSION['scriptcase']['charset'], "UTF-8");
                   }
                   echo "   " . $Lines;
               }
           }
           $Msg_Inval = "Inv�lido";
           if (NM_is_utf8($Lines) && $_SESSION['scriptcase']['charset'] != "UTF-8")
           {
               $Msg_Inval = sc_convert_encoding($Msg_Inval, $_SESSION['scriptcase']['charset'], "UTF-8");
           }
           echo "   var SC_crit_inv = \"" . $Msg_Inval . "\";\r\n";
           $gridWidthCorrection = '';
           if (false !== strpos($this->Ini->grid_table_width, 'calc')) {
               $gridWidthCalc = substr($this->Ini->grid_table_width, strpos($this->Ini->grid_table_width, '(') + 1);
               $gridWidthCalc = substr($gridWidthCalc, 0, strpos($gridWidthCalc, ')'));
               $gridWidthParts = explode(' ', $gridWidthCalc);
               if (3 == count($gridWidthParts) && 'px' == substr($gridWidthParts[2], -2)) {
                   $gridWidthParts[2] = substr($gridWidthParts[2], 0, -2) / 2;
                   $gridWidthCorrection = $gridWidthParts[1] . ' ' . $gridWidthParts[2];
               }
           }
           $nm_saida->saida("    function scFixZindexCornerCells()\r\n");
           $nm_saida->saida("    {\r\n");
           $nm_saida->saida("        let cells = $(\".sc-ui-grid-header-row-grid_detail_sales_todo-1\").find(\"td\");\r\n");
           $nm_saida->saida("        cells.filter(\".sc-col-is-fixed\").css(\"z-index\", 5);\r\n");
           $nm_saida->saida("        cells.filter(\".sc-col-is-fixed\").filter(\".sc-col-actions\").css(\"z-index\", 6);\r\n");
           $nm_saida->saida("    }\r\n");
           $nm_saida->saida("    function scSetFixedHeadersCss(baseTop)\r\n");
           $nm_saida->saida("    {\r\n");
           $nm_saida->saida("        let rows, cols, i, j, thisTop;\r\n");
           $nm_saida->saida("        rows = $(\".sc-ui-grid-header-row-grid_detail_sales_todo-1\");\r\n");
           $nm_saida->saida("        thisTop = baseTop;\r\n");
           $nm_saida->saida("        for (i = 0; i < rows.length; i++) {\r\n");
           $nm_saida->saida("            cols = $(rows[i]).find(\"td\").filter(\".scGridLabelFont\");\r\n");
           $nm_saida->saida("            for (j = 0; j < cols.length; j++) {\r\n");
           $nm_saida->saida("                $(cols[j]).css({\r\n");
           $nm_saida->saida("                    \"position\": \"sticky\",\r\n");
           $nm_saida->saida("                    \"top\": thisTop + \"px\",\r\n");
           $nm_saida->saida("                    \"z-index\": 4\r\n");
           $nm_saida->saida("                }).addClass(\"sc-header-fixed\");\r\n");
           $nm_saida->saida("            }\r\n");
           $nm_saida->saida("            thisTop += $(rows[i]).height();\r\n");
           $nm_saida->saida("        }\r\n");
           $nm_saida->saida("        scFixZindexCornerCells();\r\n");
           $nm_saida->saida("    }\r\n");
           $nm_saida->saida("    $(function() {\r\n");
           $nm_saida->saida("        scSetFixedHeadersCss(0);\r\n");
           $nm_saida->saida("    });\r\n");
           $nm_saida->saida("  function scSetFixedHeaders() {\r\n");
           $nm_saida->saida("   return;alert(2);\r\n");
           $nm_saida->saida("   var divScroll, gridHeaders, headerPlaceholder;\r\n");
           $nm_saida->saida("   gridHeaders = scGetHeaderRow();\r\n");
           $nm_saida->saida("   headerPlaceholder = $(\"#sc-id-fixedheaders-placeholder\");\r\n");
           $nm_saida->saida("   if (!gridHeaders) {\r\n");
           $nm_saida->saida("     headerPlaceholder.hide();\r\n");
           $nm_saida->saida("   }\r\n");
           $nm_saida->saida("   else {\r\n");
           $nm_saida->saida("    scSetFixedHeadersContents(gridHeaders, headerPlaceholder);\r\n");
           $nm_saida->saida("    scSetFixedHeadersSize(gridHeaders);\r\n");
           $nm_saida->saida("    scSetFixedHeadersPosition(gridHeaders, headerPlaceholder);\r\n");
           $nm_saida->saida("    if (scIsHeaderVisible(gridHeaders)) {\r\n");
           $nm_saida->saida("     headerPlaceholder.hide();\r\n");
           $nm_saida->saida("    }\r\n");
           $nm_saida->saida("    else {\r\n");
           $nm_saida->saida("     headerPlaceholder.show();\r\n");
           $nm_saida->saida("    }\r\n");
           $nm_saida->saida("   }\r\n");
           $nm_saida->saida("  }\r\n");
           $nm_saida->saida("  function scSetFixedHeadersPosition(gridHeaders, headerPlaceholder) {\r\n");
           $nm_saida->saida("   if(gridHeaders)\r\n");
           $nm_saida->saida("   {\r\n");
           $nm_saida->saida("       headerPlaceholder.css({\"top\": 0" . $gridWidthCorrection . ", \"left\": (Math.floor(gridHeaders.offset().left) - $(document).scrollLeft()" . $gridWidthCorrection . ") + \"px\"});\r\n");
           $nm_saida->saida("   }\r\n");
           $nm_saida->saida("  }\r\n");
           $nm_saida->saida("  function scIsHeaderVisible(gridHeaders) {\r\n");
           $nm_saida->saida("   if (typeof(scIsHeaderVisibleMobile) === typeof(function(){})) { return scIsHeaderVisibleMobile(gridHeaders); }\r\n");
           $nm_saida->saida("   return gridHeaders.offset().top > $(document).scrollTop();\r\n");
           $nm_saida->saida("  }\r\n");
           $nm_saida->saida("  function scGetHeaderRow() {\r\n");
           $nm_saida->saida("   var gridHeaders = $(\".sc-ui-grid-header-row-grid_detail_sales_todo-1\"), headerDisplayed = true;\r\n");
           $nm_saida->saida("   if (!gridHeaders.length) {\r\n");
           $nm_saida->saida("    headerDisplayed = false;\r\n");
           $nm_saida->saida("   }\r\n");
           $nm_saida->saida("   else {\r\n");
           $nm_saida->saida("    if (!gridHeaders.filter(\":visible\").length) {\r\n");
           $nm_saida->saida("     headerDisplayed = false;\r\n");
           $nm_saida->saida("    }\r\n");
           $nm_saida->saida("   }\r\n");
           $nm_saida->saida("   if (!headerDisplayed) {\r\n");
           $nm_saida->saida("    gridHeaders = $(\".sc-ui-grid-header-row\").filter(\":visible\");\r\n");
           $nm_saida->saida("    if (gridHeaders.length) {\r\n");
           $nm_saida->saida("     gridHeaders = $(gridHeaders[0]);\r\n");
           $nm_saida->saida("    }\r\n");
           $nm_saida->saida("    else {\r\n");
           $nm_saida->saida("     gridHeaders = false;\r\n");
           $nm_saida->saida("    }\r\n");
           $nm_saida->saida("   }\r\n");
           $nm_saida->saida("   return gridHeaders;\r\n");
           $nm_saida->saida("  }\r\n");
           $nm_saida->saida("  function scSetFixedHeadersContents(gridHeaders, headerPlaceholder) {\r\n");
           $nm_saida->saida("   var i, htmlContent;\r\n");
           $nm_saida->saida("   htmlContent = \"<table id=\\\"sc-id-fixed-headers\\\" class=\\\"scGridTabela\\\">\";\r\n");
           $nm_saida->saida("   for (i = 0; i < gridHeaders.length; i++) {\r\n");
           $nm_saida->saida("    htmlContent += \"<tr class=\\\"scGridLabel\\\" id=\\\"sc-id-fixed-headers-row-\" + i + \"\\\">\" + $(gridHeaders[i]).html() + \"</tr>\";\r\n");
           $nm_saida->saida("   }\r\n");
           $nm_saida->saida("   htmlContent += \"</table>\";\r\n");
           $nm_saida->saida("   headerPlaceholder.html(htmlContent);\r\n");
           $nm_saida->saida("  }\r\n");
           $nm_saida->saida("  function scSetFixedHeadersSize(gridHeaders) {\r\n");
           $nm_saida->saida("   var i, j, headerColumns, gridColumns, cellHeight, cellWidth, tableOriginal, tableHeaders;\r\n");
           $nm_saida->saida("   tableOriginal = document.getElementById(\"sc-ui-grid-body-99e11209\");\r\n");
           $nm_saida->saida("   tableHeaders = document.getElementById(\"sc-id-fixed-headers\");\r\n");
           $nm_saida->saida("    tableWidth = $(tableOriginal).outerWidth();\r\n");
           $nm_saida->saida("   $(tableHeaders).css(\"width\", tableWidth);\r\n");
           $nm_saida->saida("   for (i = 0; i < gridHeaders.length; i++) {\r\n");
           $nm_saida->saida("    headerColumns = $(\"#sc-id-fixed-headers-row-\" + i).find(\"td\");\r\n");
           $nm_saida->saida("    gridColumns = $(gridHeaders[i]).find(\"td\");\r\n");
           $nm_saida->saida("    for (j = 0; j < gridColumns.length; j++) {\r\n");
           $nm_saida->saida("     if (window.getComputedStyle(gridColumns[j])) {\r\n");
           $nm_saida->saida("      cellWidth = window.getComputedStyle(gridColumns[j]).width;\r\n");
           $nm_saida->saida("      cellHeight = window.getComputedStyle(gridColumns[j]).height;\r\n");
           $nm_saida->saida("     }\r\n");
           $nm_saida->saida("     else {\r\n");
           $nm_saida->saida("      cellWidth = $(gridColumns[j]).width() + \"px\";\r\n");
           $nm_saida->saida("      cellHeight = $(gridColumns[j]).height() + \"px\";\r\n");
           $nm_saida->saida("     }\r\n");
           $nm_saida->saida("     $(headerColumns[j]).css({\r\n");
           $nm_saida->saida("      \"width\": cellWidth,\r\n");
           $nm_saida->saida("      \"height\": cellHeight\r\n");
           $nm_saida->saida("     });\r\n");
           $nm_saida->saida("    }\r\n");
           $nm_saida->saida("   }\r\n");
           $nm_saida->saida("  }\r\n");
           $nm_saida->saida("  function SC_init_jquery(isScrollNav){ \r\n");
           $nm_saida->saida("   \$(function(){ \r\n");
           $nm_saida->saida("     NM_btn_disable();\r\n");
           $nm_saida->saida("     if (Dyn_Ini)\r\n");
           $nm_saida->saida("     {\r\n");
           $nm_saida->saida("         Dyn_Ini = false;\r\n");
           if ($nmgrp_apl_opcao != "pdf" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao_print'] != 'print' && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['grid_pesq']))
           { 
           $nm_saida->saida("         SC_carga_evt_jquery_grid('all');\r\n");
           } 
           $nm_saida->saida("         scLoadScInput('input:text.sc-js-input');\r\n");
           $nm_saida->saida("     }\r\n");
           if (!$this->Ini->SC_Link_View && $this->nmgp_botoes['qsearch'] == "on")
           {
               $nm_saida->saida("     \$('#SC_fast_search_top').keyup(function(e) {\r\n");
               $nm_saida->saida("       scQuickSearchKeyUp('top', e);\r\n");
               $nm_saida->saida("     });\r\n");
           }
           $nm_saida->saida("     $('#id_F0_top').keyup(function(e) {\r\n");
           $nm_saida->saida("       var keyPressed = e.charCode || e.keyCode || e.which;\r\n");
           $nm_saida->saida("       if (13 == keyPressed) {\r\n");
           $nm_saida->saida("          return false; \r\n");
           $nm_saida->saida("       }\r\n");
           $nm_saida->saida("     });\r\n");
           $nm_saida->saida("     $('#id_F0_bot').keyup(function(e) {\r\n");
           $nm_saida->saida("       var keyPressed = e.charCode || e.keyCode || e.which;\r\n");
           $nm_saida->saida("       if (13 == keyPressed) {\r\n");
           $nm_saida->saida("          return false; \r\n");
           $nm_saida->saida("       }\r\n");
           $nm_saida->saida("     });\r\n");
           $nm_saida->saida("     $(\".scBtnGrpText\").mouseover(function() { $(this).addClass(\"scBtnGrpTextOver\"); }).mouseout(function() { $(this).removeClass(\"scBtnGrpTextOver\"); });\r\n");
           $nm_saida->saida("     $(\".scBtnGrpClick\").mouseup(function(event){\r\n");
           $nm_saida->saida("          event.preventDefault();\r\n");
           $nm_saida->saida("          if(event.target !== event.currentTarget) return;\r\n");
           $nm_saida->saida("          if($(this).find(\"a\").prop('href') != '')\r\n");
           $nm_saida->saida("          {\r\n");
           $nm_saida->saida("              $(this).find(\"a\").click();\r\n");
           $nm_saida->saida("          }\r\n");
           $nm_saida->saida("          else\r\n");
           $nm_saida->saida("          {\r\n");
           $nm_saida->saida("              eval($(this).find(\"a\").prop('onclick'));\r\n");
           $nm_saida->saida("          }\r\n");
           $nm_saida->saida("     });\r\n");
           $nm_saida->saida("   }); \r\n");
           $nm_saida->saida("  }\r\n");
           $nm_saida->saida("  SC_init_jquery(false);\r\n");
           $nm_saida->saida("   \$(window).on('load', function() {\r\n");
           if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['ancor_save']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['ancor_save']))
           {
               $nm_saida->saida("       var catTopPosition = jQuery('#SC_ancor" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['ancor_save'] . "').offset().top;\r\n");
               $nm_saida->saida("       jQuery('html, body').animate({scrollTop:catTopPosition}, 'fast');\r\n");
               $nm_saida->saida("       $('#SC_ancor" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['ancor_save'] . "').addClass('" . $this->css_scGridFieldOver . "');\r\n");
               unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['ancor_save']);
           }
           if (!$this->Ini->SC_Link_View && $this->nmgp_botoes['qsearch'] == "on")
           {
               $nm_saida->saida("     scQuickSearchKeyUp('top', null);\r\n");
           }
           $nm_saida->saida("   });\r\n");
           $nm_saida->saida("   function scQuickSearchSubmit_top() {\r\n");
           $nm_saida->saida("     document.F0_top.nmgp_opcao.value = 'fast_search';\r\n");
           $nm_saida->saida("     document.F0_top.submit();\r\n");
           $nm_saida->saida("   }\r\n");
           $nm_saida->saida("   function scQuickSearchKeyUp(sPos, e) {\r\n");
           $nm_saida->saida("     if (null != e) {\r\n");
           $nm_saida->saida("       var keyPressed = e.charCode || e.keyCode || e.which;\r\n");
           $nm_saida->saida("       if (13 == keyPressed) {\r\n");
           $nm_saida->saida("         if ('top' == sPos) nm_gp_submit_qsearch('top');\r\n");
           $nm_saida->saida("       }\r\n");
           $nm_saida->saida("       else\r\n");
           $nm_saida->saida("       {\r\n");
           $nm_saida->saida("           $('#SC_fast_search_submit_top').show();\r\n");
           $nm_saida->saida("       }\r\n");
           $nm_saida->saida("     }\r\n");
           $nm_saida->saida("   }\r\n");
           $nm_saida->saida("   function scBtnGroupByShow(sUrl, sPos) {\r\n");
           $nm_saida->saida("     if ($(\"#sc_id_groupby_placeholder_\" + sPos).css('display') != 'none') {\r\n");
           if ($_SESSION['scriptcase']['proc_mobile']) { 
               $nm_saida->saida("         //return;\r\n");
           }
           else {
               $nm_saida->saida("         scBtnGroupByHide(sPos);\r\n");
               $nm_saida->saida("         $(\"#sel_groupby_\" + sPos).removeClass(\"selected\");\r\n");
               $nm_saida->saida("         return;\r\n");
           }
           $nm_saida->saida("     }\r\n");
           $nm_saida->saida("     $.ajax({\r\n");
           $nm_saida->saida("       type: \"GET\",\r\n");
           $nm_saida->saida("       dataType: \"html\",\r\n");
           $nm_saida->saida("       url: sUrl\r\n");
           $nm_saida->saida("     }).done(function(data) {\r\n");
           $nm_saida->saida("       $(\"#sc_id_groupby_placeholder_\" + sPos).find(\"td\").html(\"\");\r\n");
           $nm_saida->saida("       $(\"#sc_id_groupby_placeholder_\" + sPos).find(\"td\").html(data);\r\n");
           $nm_saida->saida("       $(\"#sc_id_groupby_placeholder_\" + sPos).show();\r\n");
           $nm_saida->saida("     });\r\n");
           $nm_saida->saida("   }\r\n");
           $nm_saida->saida("   function scBtnGroupByHide(sPos) {\r\n");
           $nm_saida->saida("     $(\"#sc_id_groupby_placeholder_\" + sPos).hide();\r\n");
           $nm_saida->saida("     $(\"#sc_id_groupby_placeholder_\" + sPos).find(\"td\").html(\"\");\r\n");
           $nm_saida->saida("   }\r\n");
           $nm_saida->saida("   function scBtnSelCamposShow(sUrl, sPos) {\r\n");
           $nm_saida->saida("     if ($(\"#sc_id_sel_campos_placeholder_\" + sPos).css('display') != 'none') {\r\n");
           if ($_SESSION['scriptcase']['proc_mobile']) { 
               $nm_saida->saida("         //return;\r\n");
           }
           else {
               $nm_saida->saida("         scBtnSelCamposHide(sPos);\r\n");
               $nm_saida->saida("         $(\"#selcmp_\" + sPos).removeClass(\"selected\");\r\n");
               $nm_saida->saida("         return;\r\n");
           }
           $nm_saida->saida("     }\r\n");
           $nm_saida->saida("     $.ajax({\r\n");
           $nm_saida->saida("       type: \"GET\",\r\n");
           $nm_saida->saida("       dataType: \"html\",\r\n");
           $nm_saida->saida("       url: sUrl\r\n");
           $nm_saida->saida("     }).done(function(data) {\r\n");
           $nm_saida->saida("       $(\"#sc_id_sel_campos_placeholder_\" + sPos).find(\"td\").html(\"\");\r\n");
           $nm_saida->saida("       $(\"#sc_id_sel_campos_placeholder_\" + sPos).find(\"td\").html(data);\r\n");
           $nm_saida->saida("       $(\"#sc_id_sel_campos_placeholder_\" + sPos).show();\r\n");
           $nm_saida->saida("     });\r\n");
           $nm_saida->saida("   }\r\n");
           $nm_saida->saida("   function scBtnSelCamposHide(sPos) {\r\n");
           $nm_saida->saida("     $(\"#sc_id_sel_campos_placeholder_\" + sPos).hide();\r\n");
           $nm_saida->saida("     $(\"#sc_id_sel_campos_placeholder_\" + sPos).find(\"td\").html(\"\");\r\n");
           $nm_saida->saida("   }\r\n");
$nm_saida->saida("function ajax_check_file(img_name, field , i , p, p_cache){\r\n");
$nm_saida->saida("    $(document).ready(function(){\r\n");
$nm_saida->saida("        $('#id_sc_field_'+ field +'_'+i+'> img').attr('src', '" . $this->Ini->path_icones . "/scriptcase__NM__ajax_load.gif');\r\n");
$nm_saida->saida("        $('#id_sc_field_'+ field +'_'+i+' > a > img').attr('src', '" . $this->Ini->path_icones . "/scriptcase__NM__ajax_load.gif');\r\n");
$nm_saida->saida("        $('#id_sc_field_'+ field +'_'+i+' > span > a > img').attr('src', '" . $this->Ini->path_icones . "/scriptcase__NM__ajax_load.gif');\r\n");
$nm_saida->saida("    var rs =$.ajax({\r\n");
$nm_saida->saida("                type: \"POST\",\r\n");
$nm_saida->saida("                url: 'index.php?script_case_init=" . $this->Ini->sc_page . "',\r\n");
$nm_saida->saida("                async: true,\r\n");
$nm_saida->saida("                data: 'nmgp_opcao=ajax_check_file&AjaxCheckImg=' + img_name +'&rsargs='+ field + '&p='+ p + '&p_cache='+ p_cache,\r\n");
$nm_saida->saida("            }).done(function (rs) {\r\n");
$nm_saida->saida("                    if(rs.indexOf('</span>') != -1){\r\n");
$nm_saida->saida("                        rs = rs.substr(rs.indexOf('</span>')  + 7);\r\n");
$nm_saida->saida("                    }\r\n");
$nm_saida->saida("                    if (rs != 0) {\r\n");
$nm_saida->saida("                        rs = rs.trim();\r\n");
$nm_saida->saida("                        rs_split = rs.split('_@@NM@@_');\r\n");
$nm_saida->saida("                        rs_orig = rs_split[0];\r\n");
$nm_saida->saida("                        rs = rs_split[1];\r\n");
$nm_saida->saida("                        if($('#id_sc_field_'+ field +'_'+i+'  > a > img').length != 0){\r\n");
$nm_saida->saida("                            $('#id_sc_field_'+ field +'_'+i+'  > a > img').attr('src', rs);\r\n");
$nm_saida->saida("                            $('#id_sc_field_'+ field +'_'+i+'> img').attr('src', rs);\r\n");
$nm_saida->saida("                            var __tmp = $('#id_sc_field_'+ field +'_'+i+'  > a').attr('href').split(\"',\")\r\n");
$nm_saida->saida("                            __tmp[0] = \"javascript:nm_mostra_img('\" + rs_orig;\r\n");
$nm_saida->saida("                            $('#id_sc_field_'+ field +'_'+i+'  > a').attr('href',__tmp.join(\"',\"));\r\n");
$nm_saida->saida("                        }else{\r\n");
$nm_saida->saida("                            if($('#id_sc_field_'+ field +'_'+i+' > a').length > 0 && ($('#id_sc_field_'+ field +'_'+i+' > a').attr('href')).indexOf('@SC_par@') != -1){\r\n");
$nm_saida->saida("                                var __file_doc = $('#id_sc_field_'+ field +'_'+i+' > a').attr('href').split('@SC_par@');\r\n");
$nm_saida->saida("                                var ___file_doc = __file_doc[3].split(\"'\");\r\n");
$nm_saida->saida("                                ___file_doc[0] = rs;\r\n");
$nm_saida->saida("                                __file_doc[3] = ___file_doc.join(\"'\");\r\n");
$nm_saida->saida("                                $('#id_sc_field_'+ field +'_'+i+'  > a').attr('href', __file_doc.join('@SC_par@') );\r\n");
$nm_saida->saida("                            }\r\n");
$nm_saida->saida("                            else{\r\n");
$nm_saida->saida("                                if($('#id_sc_field_'+field+'_'+i+' > span > a').length > 0){\r\n");
$nm_saida->saida("                                    var __tmp = $('#id_sc_field_'+field+'_'+i+' > span > a').attr('href').split(\"',\");\r\n");
$nm_saida->saida("                                    if(__tmp[0].indexOf('nm_mostra_img') != -1){\r\n");
$nm_saida->saida("                                        __tmp[0] = \"javascript:nm_mostra_img('\" + rs_orig;\r\n");
$nm_saida->saida("                                    } else{\r\n");
$nm_saida->saida("                                        var __file_doc = __tmp[0].split('@SC_par@');\r\n");
$nm_saida->saida("                                        var ___file_doc = __file_doc[3].split(\"'\");\r\n");
$nm_saida->saida("                                        ___file_doc[0] = rs;\r\n");
$nm_saida->saida("                                        __file_doc[3] = ___file_doc.join(\"'\");\r\n");
$nm_saida->saida("                                        __tmp[0] = __file_doc.join('@SC_par@');\r\n");
$nm_saida->saida("                                        $('#id_sc_field_'+field+'_'+i+' > span > a').attr('href', __tmp.join(\"',\"));\r\n");
$nm_saida->saida("                                        //__tmp[1] = \"'\"+rs_orig+\"')\";\r\n");
$nm_saida->saida("                                    }\r\n");
$nm_saida->saida("                                    $('#id_sc_field_'+field+'_'+i+' > span > a').attr('href',__tmp.join(\"',\"));\r\n");
$nm_saida->saida("                                }\r\n");
$nm_saida->saida("                                $('#id_sc_field_'+ field +'_'+i+' > img').attr('src', rs);\r\n");
$nm_saida->saida("                                $('#id_sc_field_'+ field +'_'+i+' > a > img').attr('src', rs);\r\n");
$nm_saida->saida("                                $('#id_sc_field_'+ field +'_'+i+' > span > a > img').attr('src', rs);\r\n");
$nm_saida->saida("                            }\r\n");
$nm_saida->saida("                        }\r\n");
$nm_saida->saida("                    }\r\n");
$nm_saida->saida("                });\r\n");
$nm_saida->saida("    });\r\n");
$nm_saida->saida("}\r\n");
           $nm_saida->saida("   function scBtnOrderCamposShow(sUrl, sPos) {\r\n");
           $nm_saida->saida("     if ($(\"#sc_id_order_campos_placeholder_\" + sPos).css('display') != 'none') {\r\n");
           if ($_SESSION['scriptcase']['proc_mobile']) { 
               $nm_saida->saida("         //return;\r\n");
           }
           else {
               $nm_saida->saida("         scBtnOrderCamposHide(sPos);\r\n");
               $nm_saida->saida("         $(\"#ordcmp_\" + sPos).removeClass(\"selected\");\r\n");
               $nm_saida->saida("         return;\r\n");
           }
           $nm_saida->saida("     }\r\n");
           $nm_saida->saida("     $.ajax({\r\n");
           $nm_saida->saida("       type: \"GET\",\r\n");
           $nm_saida->saida("       dataType: \"html\",\r\n");
           $nm_saida->saida("       url: sUrl\r\n");
           $nm_saida->saida("     }).done(function(data) {\r\n");
           $nm_saida->saida("       $(\"#sc_id_order_campos_placeholder_\" + sPos).find(\"td\").html(\"\");\r\n");
           $nm_saida->saida("       $(\"#sc_id_order_campos_placeholder_\" + sPos).find(\"td\").html(data);\r\n");
           $nm_saida->saida("       $(\"#sc_id_order_campos_placeholder_\" + sPos).show();\r\n");
           $nm_saida->saida("     });\r\n");
           $nm_saida->saida("   }\r\n");
           $nm_saida->saida("   function scBtnOrderCamposHide(sPos) {\r\n");
           $nm_saida->saida("     $(\"#sc_id_order_campos_placeholder_\" + sPos).hide();\r\n");
           $nm_saida->saida("     $(\"#sc_id_order_campos_placeholder_\" + sPos).find(\"td\").html(\"\");\r\n");
           $nm_saida->saida("   }\r\n");
           $nm_saida->saida("   function scBtnGrpShow(sGroup) {\r\n");
           $nm_saida->saida("     if (typeof(scBtnGrpShowMobile) === typeof(function(){})) { return scBtnGrpShowMobile(sGroup); };\r\n");
           $nm_saida->saida("     $('#sc_btgp_btn_' + sGroup).addClass('selected');\r\n");
           $nm_saida->saida("     var btnPos = $('#sc_btgp_btn_' + sGroup).offset();\r\n");
           $nm_saida->saida("     scBtnGrpStatus[sGroup] = 'open';\r\n");
           $nm_saida->saida("     $('#sc_btgp_btn_' + sGroup).mouseout(function() {\r\n");
           $nm_saida->saida("       scBtnGrpStatus[sGroup] = '';\r\n");
           $nm_saida->saida("       setTimeout(function() {\r\n");
           $nm_saida->saida("         scBtnGrpHide(sGroup, false);\r\n");
           $nm_saida->saida("       }, 1000);\r\n");
           $nm_saida->saida("     }).mouseover(function() {\r\n");
           $nm_saida->saida("       scBtnGrpStatus[sGroup] = 'over';\r\n");
           $nm_saida->saida("     });\r\n");
           $nm_saida->saida("     $('#sc_btgp_div_' + sGroup + ' span a').click(function() {\r\n");
           $nm_saida->saida("       scBtnGrpStatus[sGroup] = 'out';\r\n");
           $nm_saida->saida("       scBtnGrpHide(sGroup, false);\r\n");
           $nm_saida->saida("     });\r\n");
           $nm_saida->saida("     $('#sc_btgp_div_' + sGroup).css({\r\n");
           $nm_saida->saida("       'left': btnPos.left\r\n");
           $nm_saida->saida("     })\r\n");
           $nm_saida->saida("     .mouseover(function() {\r\n");
           $nm_saida->saida("       scBtnGrpStatus[sGroup] = 'over';\r\n");
           $nm_saida->saida("     })\r\n");
           $nm_saida->saida("     .mouseleave(function() {\r\n");
           $nm_saida->saida("       scBtnGrpStatus[sGroup] = 'out';\r\n");
           $nm_saida->saida("       setTimeout(function() {\r\n");
           $nm_saida->saida("         scBtnGrpHide(sGroup, false);\r\n");
           $nm_saida->saida("       }, 1000);\r\n");
           $nm_saida->saida("     })\r\n");
           $nm_saida->saida("     .show('fast');\r\n");
           $nm_saida->saida("   }\r\n");
           $nm_saida->saida("   function scBtnGrpHide(sGroup, bForce) {\r\n");
           $nm_saida->saida("     if (bForce || 'over' != scBtnGrpStatus[sGroup]) {\r\n");
           $nm_saida->saida("       $('#sc_btgp_div_' + sGroup).hide('fast');\r\n");
           $nm_saida->saida("       $('#sc_btgp_btn_' + sGroup).removeClass('selected');\r\n");
           $nm_saida->saida("     }\r\n");
           $nm_saida->saida("   }\r\n");
           $nm_saida->saida("   </script> \r\n");
       } 
       if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['num_css']))
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['num_css'] = rand(0, 1000);
       }
       $write_css = true;
       if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['embutida'] && !$this->Print_All && $this->NM_opcao != "print" && $this->NM_opcao != "pdf")
       {
           $write_css = false;
       }
       if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['embutida_pdf']) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['embutida_pdf'])
       {
           $write_css = true;
       }
       if ($write_css) {$NM_css = @fopen($this->Ini->root . $this->Ini->path_imag_temp . '/sc_css_grid_detail_sales_todo_grid_' . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['num_css'] . '.css', 'w');}
       if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['embutida'])
       {
           $this->NM_field_over  = 0;
           $this->NM_field_click = 0;
           $Css_sub_cons = array();
           if (($this->NM_opcao == "print" && $GLOBALS['nmgp_cor_print'] == "PB") || ($this->NM_opcao == "pdf" &&  $GLOBALS['nmgp_tipo_pdf'] == "pb") || ($_SESSION['scriptcase']['contr_link_emb'] == "pdf" &&  $GLOBALS['nmgp_tipo_pdf'] == "pb")) 
           { 
               $NM_css_file = $this->Ini->str_schema_all . "_grid_bw.css";
               $NM_css_dir  = $this->Ini->str_schema_all . "_grid_bw" . $_SESSION['scriptcase']['reg_conf']['css_dir'] . ".css";
               if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['SC_sub_css_bw'])) 
               { 
                   foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['SC_sub_css_bw'] as $Apl => $Css_apl)
                   {
                       $Css_sub_cons[] = $Css_apl;
                       $Css_sub_cons[] = str_replace(".css", $_SESSION['scriptcase']['reg_conf']['css_dir'] . ".css", $Css_apl);
                   }
               } 
           } 
           else 
           { 
               $NM_css_file = $this->Ini->str_schema_all . "_grid.css";
               $NM_css_dir  = $this->Ini->str_schema_all . "_grid" . $_SESSION['scriptcase']['reg_conf']['css_dir'] . ".css";
               if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['SC_sub_css'])) 
               { 
                   foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['SC_sub_css'] as $Apl => $Css_apl)
                   {
                       $Css_sub_cons[] = $Css_apl;
                       $Css_sub_cons[] = str_replace(".css", $_SESSION['scriptcase']['reg_conf']['css_dir'] . ".css", $Css_apl);
                   }
               } 
           } 
           if (is_file($this->Ini->path_css . $NM_css_file))
           {
               $NM_css_attr = file($this->Ini->path_css . $NM_css_file);
               foreach ($NM_css_attr as $NM_line_css)
               {
                   if (substr(trim($NM_line_css), 0, 16) == ".scGridFieldOver" && strpos($NM_line_css, "background-color:") !== false)
                   {
                       $this->NM_field_over = 1;
                   }
                   if (substr(trim($NM_line_css), 0, 17) == ".scGridFieldClick" && strpos($NM_line_css, "background-color:") !== false)
                   {
                       $this->NM_field_click = 1;
                   }
                   $NM_line_css = str_replace("../../img", $this->Ini->path_imag_cab  , $NM_line_css);
                   if ($write_css) {@fwrite($NM_css, "    " .  $NM_line_css . "\r\n");}
               }
           }
           if (is_file($this->Ini->path_css . $NM_css_dir))
           {
               $NM_css_attr = file($this->Ini->path_css . $NM_css_dir);
               foreach ($NM_css_attr as $NM_line_css)
               {
                   if (substr(trim($NM_line_css), 0, 16) == ".scGridFieldOver" && strpos($NM_line_css, "background-color:") !== false)
                   {
                       $this->NM_field_over = 1;
                   }
                   if (substr(trim($NM_line_css), 0, 17) == ".scGridFieldClick" && strpos($NM_line_css, "background-color:") !== false)
                   {
                       $this->NM_field_click = 1;
                   }
                   $NM_line_css = str_replace("../../img", $this->Ini->path_imag_cab  , $NM_line_css);
                   if ($write_css) {@fwrite($NM_css, "    " .  $NM_line_css . "\r\n");}
               }
           }
           if (!empty($Css_sub_cons))
           {
               $Css_sub_cons = array_unique($Css_sub_cons);
               foreach ($Css_sub_cons as $Cada_css_sub)
               {
                   if (is_file($this->Ini->path_css . $Cada_css_sub))
                   {
                       $compl_css = str_replace(".", "_", $Cada_css_sub);
                       $temp_css  = explode("/", $compl_css);
                       if (isset($temp_css[1])) { $compl_css = $temp_css[1];}
                       $NM_css_attr = file($this->Ini->path_css . $Cada_css_sub);
                       foreach ($NM_css_attr as $NM_line_css)
                       {
                           $NM_line_css = str_replace("../../img", $this->Ini->path_imag_cab  , $NM_line_css);
                           if ($write_css) {@fwrite($NM_css, "    ." .  $compl_css . "_" . substr(trim($NM_line_css), 1) . "\r\n");}
                       }
                   }
               }
           }
       }
       if ($write_css) {@fclose($NM_css);}
           $this->NM_css_val_embed .= "win";
           $this->NM_css_ajx_embed .= "ult_set";
 if(isset($this->Ini->str_google_fonts) && !empty($this->Ini->str_google_fonts)) 
 { 
           $nm_saida->saida("   <link rel=\"stylesheet\" href=\"" . $this->Ini->str_google_fonts . "\" />\r\n");
 } 
       if (!$write_css)
       {
           $nm_saida->saida("   <link rel=\"stylesheet\" href=\"../_lib/css/" . $this->Ini->str_schema_all . "_grid.css\" type=\"text/css\" media=\"screen\" />\r\n");
           $nm_saida->saida("   <link rel=\"stylesheet\" href=\"../_lib/css/" . $this->Ini->str_schema_all . "_grid" . $_SESSION['scriptcase']['reg_conf']['css_dir'] . ".css\" type=\"text/css\" media=\"screen\" />\r\n");
           $nm_saida->saida("   <link rel=\"stylesheet\" href=\"../_lib/css/" . $_SESSION['scriptcase']['erro']['str_schema'] . "\" type=\"text/css\" media=\"screen\" />\r\n");
           $nm_saida->saida("   <link rel=\"stylesheet\" href=\"../_lib/css/" . $_SESSION['scriptcase']['erro']['str_schema_dir'] . "\" type=\"text/css\" media=\"screen\" />\r\n");
           $nm_saida->saida("   <link rel=\"stylesheet\" href=\"../_lib/css/" . $this->Ini->str_schema_all . "_tab.css\" type=\"text/css\" media=\"screen\" />\r\n");
           $nm_saida->saida("   <link rel=\"stylesheet\" href=\"../_lib/css/" . $this->Ini->str_schema_all . "_tab" . $_SESSION['scriptcase']['reg_conf']['css_dir'] . ".css\" type=\"text/css\" media=\"screen\" />\r\n");
       }
       elseif ($this->NM_opcao == "print" || $this->Print_All)
       {
           $nm_saida->saida("  <style type=\"text/css\">\r\n");
           $NM_css = file($this->Ini->root . $this->Ini->path_imag_temp . '/sc_css_grid_detail_sales_todo_grid_' . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['num_css'] . '.css');
           foreach ($NM_css as $cada_css)
           {
              $nm_saida->saida("  " . str_replace("\r\n", "", $cada_css) . "\r\n");
           }
           $nm_saida->saida("   <link rel=\"stylesheet\" href=\"../_lib/css/" . $_SESSION['scriptcase']['erro']['str_schema'] . "\" type=\"text/css\" media=\"screen\" />\r\n");
           $nm_saida->saida("   <link rel=\"stylesheet\" href=\"../_lib/css/" . $_SESSION['scriptcase']['erro']['str_schema_dir'] . "\" type=\"text/css\" media=\"screen\" />\r\n");
           $nm_saida->saida("  </style>\r\n");
       }
       else
       {
           $nm_saida->saida("   <link rel=\"stylesheet\" href=\"" . $this->Ini->path_imag_temp . "/sc_css_grid_detail_sales_todo_grid_" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['num_css'] . ".css\" type=\"text/css\" media=\"screen\" />\r\n");
           $nm_saida->saida("   <link rel=\"stylesheet\" href=\"../_lib/css/" . $_SESSION['scriptcase']['erro']['str_schema'] . "\" type=\"text/css\" media=\"screen\" />\r\n");
           $nm_saida->saida("   <link rel=\"stylesheet\" href=\"../_lib/css/" . $_SESSION['scriptcase']['erro']['str_schema_dir'] . "\" type=\"text/css\" media=\"screen\" />\r\n");
       }
       $str_iframe_body = ($this->aba_iframe) ? 'marginwidth="0px" marginheight="0px" topmargin="0px" leftmargin="0px"' : '';
       $nm_saida->saida("  <style type=\"text/css\">\r\n");
       $nm_saida->saida("  </style>\r\n");
           $nm_saida->saida("   <link rel=\"stylesheet\" href=\"../_lib/css/" . $this->Ini->str_schema_all . "_btngrp.css\" type=\"text/css\" media=\"screen\" />\r\n");
           $nm_saida->saida("   <link rel=\"stylesheet\" href=\"../_lib/css/" . $this->Ini->str_schema_all . "_btngrp" . $_SESSION['scriptcase']['reg_conf']['css_dir'] . ".css\" type=\"text/css\" media=\"screen\" />\r\n");
       if (!$write_css)
       {
           $nm_saida->saida("   <link rel=\"stylesheet\" type=\"text/css\" href=\"" . $this->Ini->path_link . "grid_detail_sales_todo/grid_detail_sales_todo_grid_" . strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) . ".css\" />\r\n");
       }
       else
       {
           $nm_saida->saida("  <style type=\"text/css\">\r\n");
           $NM_css = file($this->Ini->root . $this->Ini->path_link . "grid_detail_sales_todo/grid_detail_sales_todo_grid_" .strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) . ".css");
           foreach ($NM_css as $cada_css)
           {
              $nm_saida->saida("  " . str_replace("\r\n", "", $cada_css) . "\r\n");
           }
  if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['proc_pdf'] || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['proc_pdf_vert'])
  {
   $nm_saida->saida("      thead { display: table-header-group !important; }\r\n");
   $nm_saida->saida("      tfoot { display: table-row-group !important; }\r\n");
   $nm_saida->saida("      table td, table tr, td, tr, table { page-break-inside: avoid !important; }\r\n");
   $nm_saida->saida("      #summary_body > td { padding: 0px !important; }\r\n");
  }
           $nm_saida->saida("  </style>\r\n");
       }
       $nm_saida->saida("  </HEAD>\r\n");
   } 
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['embutida'] && $this->Ini->nm_ger_css_emb)
   {
       $this->Ini->nm_ger_css_emb = false;
           $nm_saida->saida("  <style type=\"text/css\">\r\n");
       $NM_css = file($this->Ini->root . $this->Ini->path_link . "grid_detail_sales_todo/grid_detail_sales_todo_grid_" .strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) . ".css");
       foreach ($NM_css as $cada_css)
       {
           $cada_css = ".grid_detail_sales_todo_" . substr($cada_css, 1);
              $nm_saida->saida("  " . str_replace("\r\n", "", $cada_css) . "\r\n");
       }
           $nm_saida->saida("  </style>\r\n");
   }
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['embutida'])
   { 
       if (!$this->Ini->Export_html_zip && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['doc_word'] && ($this->Print_All || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao_print'] == "print")) 
       {
           if ($this->Print_All) 
           {
               $nm_saida->saida(" <link rel=\"stylesheet\" type=\"text/css\" href=\"../_lib/buttons/" . $this->Ini->Str_btn_css . "\" /> \r\n");
           }
           $nm_saida->saida("  <body id=\"grid_horizontal\" class=\"" . $this->css_scGridPage . "\" " . $str_iframe_body . " style=\"-webkit-print-color-adjust: exact;" . $css_body . "\">\r\n");
           $nm_saida->saida("   <TABLE id=\"sc_table_print\" cellspacing=0 cellpadding=0 align=\"center\" valign=\"top\" " . $this->Tab_width . ">\r\n");
           $nm_saida->saida("     <TR>\r\n");
           $nm_saida->saida("       <TD>\r\n");
           $Cod_Btn = nmButtonOutput($this->arr_buttons, "bprint", "prit_web_page()", "prit_web_page()", "Bprint_print", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
           $nm_saida->saida("           $Cod_Btn \r\n");
           $nm_saida->saida("       </TD>\r\n");
           $nm_saida->saida("     </TR>\r\n");
           $nm_saida->saida("   </TABLE>\r\n");
           $nm_saida->saida("  <script type=\"text/javascript\" src=\"../_lib/lib/js/jquery-3.6.0.min.js\"></script>\r\n");
           $nm_saida->saida("  <script type=\"text/javascript\">\r\n");
           $nm_saida->saida("     $(\"#Bprint_print\").addClass(\"disabled\").prop(\"disabled\", true);\r\n");
           $nm_saida->saida("     $(function() {\r\n");
           $nm_saida->saida("         $(\"#Bprint_print\").removeClass(\"disabled\").prop(\"disabled\", false);\r\n");
           $nm_saida->saida("     });\r\n");
           $nm_saida->saida("     function prit_web_page()\r\n");
           $nm_saida->saida("     {\r\n");
           $nm_saida->saida("        if ($(\"#Bprint_print\").prop(\"disabled\")) {\r\n");
           $nm_saida->saida("            return;\r\n");
           $nm_saida->saida("        }\r\n");
           $nm_saida->saida("        document.getElementById('sc_table_print').style.display = 'none';\r\n");
           $nm_saida->saida("        var is_safari = navigator.userAgent.indexOf(\"Safari\") > -1;\r\n");
           $nm_saida->saida("        var is_chrome = navigator.userAgent.indexOf('Chrome') > -1\r\n");
           $nm_saida->saida("        if ((is_chrome) && (is_safari)) {is_safari=false;}\r\n");
           $nm_saida->saida("        window.print();\r\n");
           $nm_saida->saida("        if (is_safari) {setTimeout(\"window.close()\", 1000);} else {window.close();}\r\n");
           $nm_saida->saida("     }\r\n");
           $nm_saida->saida("  </script>\r\n");
       }
       else
       {
          $remove_margin = isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['dashboard_info']['remove_margin']) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['dashboard_info']['remove_margin'] ? 'margin: 0; ' : '';
          $remove_border = isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['dashboard_info']['remove_border']) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['dashboard_info']['remove_border'] ? 'border-width: 0; ' : '';
          $vertical_center = '';
           $nm_saida->saida("  <body id=\"grid_horizontal\" class=\"" . $this->css_scGridPage . "\" " . $str_iframe_body . " style=\"" . $remove_margin . $vertical_center . $css_body . "\">\r\n");
       }
       $nm_saida->saida("  " . $this->Ini->Ajax_result_set . "\r\n");
       if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao'] != "pdf" && !$this->Print_All)
       { 
           $Cod_Btn = nmButtonOutput($this->arr_buttons, "berrm_clse", "nmAjaxHideDebug()", "nmAjaxHideDebug()", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
           $nm_saida->saida("<div id=\"id_debug_window\" style=\"display: none;\" class='scDebugWindow'><table class=\"scFormMessageTable\">\r\n");
           $nm_saida->saida("<tr><td class=\"scFormMessageTitle\">" . $Cod_Btn . "&nbsp;&nbsp;Output</td></tr>\r\n");
           $nm_saida->saida("<tr><td class=\"scFormMessageMessage\" style=\"padding: 0px; vertical-align: top\"><div style=\"padding: 2px; height: 200px; width: 350px; overflow: auto\" id=\"id_debug_text\"></div></td></tr>\r\n");
           $nm_saida->saida("</table></div>\r\n");
       } 
       if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao'] == "pdf" && !$this->Print_All)
       { 
           if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['SC_Ind_Groupby'] == "sc_free_group_by")
           {
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['pdf_res'])
               {
                   $nm_saida->saida("          <div style=\"height:1px;overflow:hidden\"><H1 style=\"font-size:0;padding:1px\">" . $this->Ini->Nm_lang['lang_othr_smry_msge'] . "</H1></div>\r\n");
               } 
               else
               {
                   $groupByLabel = sprintf("" . $this->Ini->Nm_lang['lang_othr_cons_title_YYYYMMDD2'] . "", "view_sales_detail_group_todo.fecha");
                   $nm_saida->saida("          <div style=\"height:1px;overflow:hidden\"><H1 style=\"font-size:0;padding:1px\">{$groupByLabel}</H1></div>\r\n");
               } 
           }
           if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['SC_Ind_Groupby'] == "inicial")
           {
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['pdf_res'])
               {
                   $nm_saida->saida("          <div style=\"height:1px;overflow:hidden\"><H1 style=\"font-size:0;padding:1px\">" . $this->Ini->Nm_lang['lang_othr_smry_msge'] . "</H1></div>\r\n");
               } 
               else
               {
                   $groupByLabel = sprintf("" . $this->Ini->Nm_lang['lang_othr_cons_title_YYYYMM'] . "", "view_sales_detail_group_todo.fecha");
                   $nm_saida->saida("          <div style=\"height:1px;overflow:hidden\"><H1 style=\"font-size:0;padding:1px\">{$groupByLabel}</H1></div>\r\n");
               } 
           }
           if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['SC_Ind_Groupby'] == "_NM_SC_")
           {
           $nm_saida->saida("          <div style=\"height:1px;overflow:hidden\"><H1 style=\"font-size:0;padding:1px\"></H1></div>\r\n");
           }
       } 
       $this->Tab_align  = "center";
       $this->Tab_valign = "top";
       $this->Tab_width = " width=\"60%\"";
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['pdf_res'])
       {
           return;
       } 
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao'] != "pdf" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['embutida'])
       { 
           $this->form_navegacao();
           if ($NM_run_iframe != 1) {$this->check_btns();}
       } 
       $nm_saida->saida("   <TABLE id=\"main_table_grid\" cellspacing=0 cellpadding=0 align=\"" . $this->Tab_align . "\" valign=\"" . $this->Tab_valign . "\" " . $this->Tab_width . ">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['proc_pdf'] || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['proc_pdf_vert'])
   {
   }
   else
   {
       $nm_saida->saida("     <TR>\r\n");
       $nm_saida->saida("       <TD>\r\n");
       $nm_saida->saida("       <div class=\"scGridBorder\" style=\"" . (isset($remove_border) ? $remove_border : '') . "\">\r\n");
       if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['doc_word'])
       { 
           $nm_saida->saida("  <div id=\"id_div_process\" style=\"display: none; margin: 10px; whitespace: nowrap\" class=\"scFormProcessFixed\"><span class=\"scFormProcess\"><img border=\"0\" src=\"" . $this->Ini->path_icones . "/scriptcase__NM__ajax_load.gif\" align=\"absmiddle\" />&nbsp;" . $this->Ini->Nm_lang['lang_othr_prcs'] . "...</span></div>\r\n");
           $nm_saida->saida("  <div id=\"id_div_process_block\" style=\"display: none; margin: 10px; whitespace: nowrap\"><span class=\"scFormProcess\"><img border=\"0\" src=\"" . $this->Ini->path_icones . "/scriptcase__NM__ajax_load.gif\" align=\"absmiddle\" />&nbsp;" . $this->Ini->Nm_lang['lang_othr_prcs'] . "...</span></div>\r\n");
           $nm_saida->saida("  <div id=\"id_fatal_error\" class=\"" . $this->css_scGridLabel . "\" style=\"display: none; position: absolute\"></div>\r\n");
       } 
       $nm_saida->saida("       <TABLE width='100%' cellspacing=0 cellpadding=0>\r\n");
   }
   }  
 }  
 function NM_cor_embutida()
 {  
   $compl_css = "";
   include($this->Ini->path_btn . $this->Ini->Str_btn_grid);
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['embutida'])
   {
       $this->NM_css_val_embed = "sznmxizkjnvl";
       $this->NM_css_ajx_embed = "Ajax_res";
   }
   elseif ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['SC_herda_css'] == "N")
   {
       if (($this->NM_opcao == "print" && $GLOBALS['nmgp_cor_print'] == "PB") || ($this->NM_opcao == "pdf" &&  $GLOBALS['nmgp_tipo_pdf'] == "pb") || ($_SESSION['scriptcase']['contr_link_emb'] == "pdf" &&  $GLOBALS['nmgp_tipo_pdf'] == "pb")) 
       { 
           if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['SC_sub_css_bw']['grid_detail_sales_todo']))
           {
               $compl_css = str_replace(".", "_", $_SESSION['sc_session'][$this->Ini->sc_page]['SC_sub_css_bw']['grid_detail_sales_todo']) . "_";
           } 
       } 
       else 
       { 
           if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['SC_sub_css']['grid_detail_sales_todo']))
           {
               $compl_css = str_replace(".", "_", $_SESSION['sc_session'][$this->Ini->sc_page]['SC_sub_css']['grid_detail_sales_todo']) . "_";
           } 
       }
   }
   $temp_css  = explode("/", $compl_css);
   if (isset($temp_css[1])) { $compl_css = $temp_css[1];}
   $this->css_scGridPage           = $compl_css . "scGridPage";
   $this->css_scGridPageLink       = $compl_css . "scGridPageLink";
   $this->css_scGridToolbar        = $compl_css . "scGridToolbar";
   $this->css_scGridToolbarPadd    = $compl_css . "scGridToolbarPadding";
   $this->css_css_toolbar_obj      = $compl_css . "css_toolbar_obj";
   $this->css_scGridHeader         = $compl_css . "scGridHeader";
   $this->css_scGridHeaderFont     = $compl_css . "scGridHeaderFont";
   $this->css_scGridFooter         = $compl_css . "scGridFooter";
   $this->css_scGridFooterFont     = $compl_css . "scGridFooterFont";
   $this->css_scGridBlock          = $compl_css . "scGridBlock";
   $this->css_scGridBlockFont      = $compl_css . "scGridBlockFont";
   $this->css_scGridBlockAlign     = $compl_css . "scGridBlockAlign";
   $this->css_scGridTotal          = $compl_css . "scGridTotal";
   $this->css_scGridTotalFont      = $compl_css . "scGridTotalFont";
   $this->css_scGridSubtotal       = $compl_css . "scGridSubtotal";
   $this->css_scGridSubtotalFont   = $compl_css . "scGridSubtotalFont";
   $this->css_scGridFieldEven      = $compl_css . "scGridFieldEven";
   $this->css_scGridFieldEvenFont  = $compl_css . "scGridFieldEvenFont";
   $this->css_scGridFieldEvenVert  = $compl_css . "scGridFieldEvenVert";
   $this->css_scGridFieldEvenLink  = $compl_css . "scGridFieldEvenLink";
   $this->css_scGridFieldOdd       = $compl_css . "scGridFieldOdd";
   $this->css_scGridFieldOddFont   = $compl_css . "scGridFieldOddFont";
   $this->css_scGridFieldOddVert   = $compl_css . "scGridFieldOddVert";
   $this->css_scGridFieldOddLink   = $compl_css . "scGridFieldOddLink";
   $this->css_scGridFieldClick     = $compl_css . "scGridFieldClick";
   $this->css_scGridFieldOver      = $compl_css . "scGridFieldOver";
   $this->css_scGridLabel          = $compl_css . "scGridLabel";
   $this->css_scGridLabelVert      = $compl_css . "scGridLabelVert";
   $this->css_scGridLabelFont      = $compl_css . "scGridLabelFont";
   $this->css_scGridLabelLink      = $compl_css . "scGridLabelLink";
   $this->css_scGridTabela         = $compl_css . "scGridTabela";
   $this->css_scGridTabelaTd       = $compl_css . "scGridTabelaTd";
   $this->css_scGridBlockBg        = $compl_css . "scGridBlockBg";
   $this->css_scGridBlockLineBg    = $compl_css . "scGridBlockLineBg";
   $this->css_scGridBlockSpaceBg   = $compl_css . "scGridBlockSpaceBg";
   $this->css_scGridLabelNowrap    = "";
   $this->css_scAppDivMoldura      = $compl_css . "scAppDivMoldura";
   $this->css_scAppDivHeader       = $compl_css . "scAppDivHeader";
   $this->css_scAppDivHeaderText   = $compl_css . "scAppDivHeaderText";
   $this->css_scAppDivContent      = $compl_css . "scAppDivContent";
   $this->css_scAppDivContentText  = $compl_css . "scAppDivContentText";
   $this->css_scAppDivToolbar      = $compl_css . "scAppDivToolbar";
   $this->css_scAppDivToolbarInput = $compl_css . "scAppDivToolbarInput";
   $this->css_inherit_bg           = "scInheritBg";

   $compl_css_emb = ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['embutida']) ? "grid_detail_sales_todo_" : "";
   $this->css_sep = " ";
   $this->css_view_sales_detail_group_todo_fecha_label = $compl_css_emb . "css_view_sales_detail_group_todo_fecha_label";
   $this->css_view_sales_detail_group_todo_fecha_grid_line = $compl_css_emb . "css_view_sales_detail_group_todo_fecha_grid_line";
   $this->css_view_sales_detail_group_todo_cantidad_label = $compl_css_emb . "css_view_sales_detail_group_todo_cantidad_label";
   $this->css_view_sales_detail_group_todo_cantidad_grid_line = $compl_css_emb . "css_view_sales_detail_group_todo_cantidad_grid_line";
   $this->css_view_sales_detail_group_todo_unit_value_label = $compl_css_emb . "css_view_sales_detail_group_todo_unit_value_label";
   $this->css_view_sales_detail_group_todo_unit_value_grid_line = $compl_css_emb . "css_view_sales_detail_group_todo_unit_value_grid_line";
   $this->css_view_sales_detail_group_todo_producto_label = $compl_css_emb . "css_view_sales_detail_group_todo_producto_label";
   $this->css_view_sales_detail_group_todo_producto_grid_line = $compl_css_emb . "css_view_sales_detail_group_todo_producto_grid_line";
   $this->css_valor_label = $compl_css_emb . "css_valor_label";
   $this->css_valor_grid_line = $compl_css_emb . "css_valor_grid_line";
   $this->css_view_sales_detail_group_todo_cuentaventa_label = $compl_css_emb . "css_view_sales_detail_group_todo_cuentaventa_label";
   $this->css_view_sales_detail_group_todo_cuentaventa_grid_line = $compl_css_emb . "css_view_sales_detail_group_todo_cuentaventa_grid_line";
   $this->css_sales_idcliente_label = $compl_css_emb . "css_sales_idcliente_label";
   $this->css_sales_idcliente_grid_line = $compl_css_emb . "css_sales_idcliente_grid_line";
   $this->css_sales_cliente_label = $compl_css_emb . "css_sales_cliente_label";
   $this->css_sales_cliente_grid_line = $compl_css_emb . "css_sales_cliente_grid_line";
   $this->css_sales_factura_label = $compl_css_emb . "css_sales_factura_label";
   $this->css_sales_factura_grid_line = $compl_css_emb . "css_sales_factura_grid_line";
   $this->css_customer_nombre_label = $compl_css_emb . "css_customer_nombre_label";
   $this->css_customer_nombre_grid_line = $compl_css_emb . "css_customer_nombre_grid_line";
   $this->css_customer_correo_label = $compl_css_emb . "css_customer_correo_label";
   $this->css_customer_correo_grid_line = $compl_css_emb . "css_customer_correo_grid_line";
   $this->css_customer_celular_label = $compl_css_emb . "css_customer_celular_label";
   $this->css_customer_celular_grid_line = $compl_css_emb . "css_customer_celular_grid_line";
   $this->css_customer_direccion_label = $compl_css_emb . "css_customer_direccion_label";
   $this->css_customer_direccion_grid_line = $compl_css_emb . "css_customer_direccion_grid_line";
   $this->css_customer_idcustomer_label = $compl_css_emb . "css_customer_idcustomer_label";
   $this->css_customer_idcustomer_grid_line = $compl_css_emb . "css_customer_idcustomer_grid_line";
 }  
 function cabecalho()
 {
     if($_SESSION['scriptcase']['proc_mobile'] && method_exists($this, 'cabecalho_mobile'))
     {
         $this->cabecalho_mobile();
     }
     else if(method_exists($this, 'cabecalho_normal'))
     {
         $this->cabecalho_normal();
     }
 }
// 
//----- 
 function cabecalho_normal()
 {
   global
          $nm_saida;
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['dashboard_info']['under_dashboard'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['dashboard_info']['compact_mode'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['dashboard_info']['maximized'])
   {
       return; 
   }
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opc_liga']['cab']))
   {
       return; 
   }
   $nm_cab_filtro   = ""; 
   $nm_cab_filtrobr = ""; 
   $Str_date = strtolower($_SESSION['scriptcase']['reg_conf']['date_format']);
   $Lim   = strlen($Str_date);
   $Ult   = "";
   $Arr_D = array();
   for ($I = 0; $I < $Lim; $I++)
   {
       $Char = substr($Str_date, $I, 1);
       if ($Char != $Ult)
       {
           $Arr_D[] = $Char;
       }
       $Ult = $Char;
   }
   $Prim = true;
   $Str  = "";
   foreach ($Arr_D as $Cada_d)
   {
       $Str .= (!$Prim) ? $_SESSION['scriptcase']['reg_conf']['date_sep'] : "";
       $Str .= $Cada_d;
       $Prim = false;
   }
   $Str = str_replace("a", "Y", $Str);
   $Str = str_replace("y", "Y", $Str);
   $nm_data_fixa = date($Str); 
   $this->sc_proc_grid = false; 
   $HTTP_REFERER = (isset($_SERVER['HTTP_REFERER'])) ? $_SERVER['HTTP_REFERER'] : ""; 
   $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['where_orig'];
   $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['where_pesq'];
   $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['where_pesq_filtro'];
   if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['cond_pesq']))
   {  
       $pos       = 0;
       $trab_pos  = false;
       $pos_tmp   = true; 
       $tmp       = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['cond_pesq'];
       while ($pos_tmp)
       {
          $pos = strpos($tmp, "##*@@", $pos);
          if ($pos !== false)
          {
              $trab_pos = $pos;
              $pos += 4;
          }
          else
          {
              $pos_tmp = false;
          }
       }
       $nm_cond_filtro_or  = (substr($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['cond_pesq'], $trab_pos + 5) == "or")  ? " " . trim($this->Ini->Nm_lang['lang_srch_orr_cond']) . " " : "";
       $nm_cond_filtro_and = (substr($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['cond_pesq'], $trab_pos + 5) == "and") ? " " . trim($this->Ini->Nm_lang['lang_srch_and_cond']) . " " : "";
       $nm_cab_filtro   = substr($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['cond_pesq'], 0, $trab_pos);
       $nm_cab_filtrobr = str_replace("##*@@", ", " . $nm_cond_filtro_or . $nm_cond_filtro_and . "<br />", $nm_cab_filtro);
       $pos       = 0;
       $trab_pos  = false;
       $pos_tmp   = true; 
       $tmp       = $nm_cab_filtro;
       while ($pos_tmp)
       {
          $pos = strpos($tmp, "##*@@", $pos);
          if ($pos !== false)
          {
              $trab_pos = $pos;
              $pos += 4;
          }
          else
          {
              $pos_tmp = false;
          }
       }
       if ($trab_pos === false)
       {
       }
       else  
       {  
          $nm_cab_filtro = substr($nm_cab_filtro, 0, $trab_pos) . " " .  $nm_cond_filtro_or . $nm_cond_filtro_and . substr($nm_cab_filtro, $trab_pos + 5);
          $nm_cab_filtro = str_replace("##*@@", ", " . $nm_cond_filtro_or . $nm_cond_filtro_and, $nm_cab_filtro);
       }   
   }   
   $this->nm_data->SetaData(date("Y/m/d H:i:s"), "YYYY/MM/DD HH:II:SS"); 
   $nm_saida->saida(" <TR id=\"sc_grid_head\">\r\n");
   if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['sv_dt_head']))
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['sv_dt_head'] = array();
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['sv_dt_head']['fix'] = $nm_data_fixa;
       $nm_refresch_cab_rod = true;
   } 
   else 
   { 
       $nm_refresch_cab_rod = false;
   } 
   foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['sv_dt_head'] as $ind => $val)
   {
       $tmp_var = "sc_data_cab" . $ind;
       if ($$tmp_var != $val)
       {
           $nm_refresch_cab_rod = true;
           break;
       }
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['sv_dt_head']['fix'] != $nm_data_fixa)
   {
       $nm_refresch_cab_rod = true;
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['ajax_nav'] && $nm_refresch_cab_rod)
   { 
       $_SESSION['scriptcase']['saida_html'] = "";
   } 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['sv_dt_head']['fix'] = $nm_data_fixa;
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao'] != "pdf")
   { 
       $nm_saida->saida("  <TD class=\"" . $this->css_scGridTabelaTd . " " . $this->css_scGridPage . "\" style=\"vertical-align: top\">\r\n");
   } 
   else 
   { 
     if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['proc_pdf']) 
     { 
         $this->NM_calc_span();
           $nm_saida->saida("   <TD colspan=\"" . $this->NM_colspan . "\" class=\"" . $this->css_scGridTabelaTd . "\" style=\"vertical-align: top\">\r\n");
     } 
     else if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['proc_pdf_vert']) 
     {
         if($this->Tem_tab_vert)
         {
           $nm_saida->saida("   <TD colspan=\"2\" class=\"" . $this->css_scGridTabelaTd . "\" style=\"vertical-align: top\">\r\n");
         }
         else{
           $nm_saida->saida("   <TD class=\"" . $this->css_scGridTabelaTd . "\" style=\"vertical-align: top\">\r\n");
         }
     }
     else{
           $nm_saida->saida("  <TD class=\"" . $this->css_scGridTabelaTd . "\" style=\"vertical-align: top\">\r\n");
     }
   } 
   $nm_saida->saida("<style>\r\n");
   $nm_saida->saida("    .scMenuTHeaderFont img, .scGridHeaderFont img , .scFormHeaderFont img , .scTabHeaderFont img , .scContainerHeaderFont img , .scFilterHeaderFont img { height:23px;}\r\n");
   $nm_saida->saida("</style>\r\n");
   $nm_saida->saida("<div class=\"" . $this->css_scGridHeader . "\" style=\"height: 54px; padding: 17px 15px; box-sizing: border-box;margin: -1px 0px 0px 0px;width: 100%;\">\r\n");
   $nm_saida->saida("    <div class=\"" . $this->css_scGridHeaderFont . "\" style=\"float: left; text-transform: uppercase;\">" . $this->Ini->Nm_lang['lang_othr_grid_title'] . " </div>\r\n");
   $nm_saida->saida("    <div class=\"" . $this->css_scGridHeaderFont . "\" style=\"float: right;\">" . $nm_data_fixa . "</div>\r\n");
   $nm_saida->saida("</div>\r\n");
   $nm_saida->saida("  </TD>\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['ajax_nav'] && $nm_refresch_cab_rod)
   { 
       $this->Ini->Arr_result['setValue'][] = array('field' => 'sc_grid_head', 'value' => NM_charset_to_utf8($_SESSION['scriptcase']['saida_html']));
       $_SESSION['scriptcase']['saida_html'] = "";
   } 
   $nm_saida->saida(" </TR>\r\n");
 }
// 
 function label_grid($linhas = 0)
 {
   global 
           $nm_saida;
   static $nm_seq_titulos   = 0; 
   $contr_embutida = false;
   $salva_htm_emb  = "";
   if (1 < $linhas)
   {
      $this->Lin_impressas++;
   }
   $nm_seq_titulos++; 
   $tmp_header_row = $nm_seq_titulos;
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['exibe_titulos'] != "S")
   { 
   } 
   else 
   { 
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['embutida_label'])
      { 
          if (!isset($_SESSION['scriptcase']['saida_var']) || !$_SESSION['scriptcase']['saida_var']) 
          { 
              $_SESSION['scriptcase']['saida_var']  = true;
              $_SESSION['scriptcase']['saida_html'] = "";
              $contr_embutida = true;
          } 
          else 
          { 
              $salva_htm_emb = $_SESSION['scriptcase']['saida_html'];
              $_SESSION['scriptcase']['saida_html'] = "";
          } 
      } 
   $nm_saida->saida("    <TR id=\"tit_grid_detail_sales_todo__SCCS__" . $nm_seq_titulos . "\" align=\"center\" class=\"" . $this->css_scGridLabel . " sc-ui-grid-header-row sc-ui-grid-header-row-grid_detail_sales_todo-" . $tmp_header_row . "\">\r\n");
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['embutida_label']) { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridBlockBg . "\" style=\"width: " . $this->width_tabula_quebra . "; display:" . $this->width_tabula_display . ";\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_customer_idcustomer_label'] . "\" >&nbsp;</TD>\r\n");
   } 
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opc_psq']) { 
   $nm_saida->saida("     <TD class=\"" . $this->css_inherit_bg . ' ' . $this->css_scGridLabelFont . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_customer_idcustomer_label'] . "\" >&nbsp;</TD>\r\n");
   } 
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao_print'] != "print" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao'] != "pdf") {
   $nm_saida->saida("     <TD class=\"" . $this->css_inherit_bg . ' ' . $this->css_scGridLabelFont . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_customer_idcustomer_label'] . "\" >&nbsp;</TD>\r\n");
   } 
   foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['field_order'] as $Cada_label)
   { 
       $NM_func_lab = "NM_label_" . $Cada_label;
       $this->$NM_func_lab();
   } 
   $nm_saida->saida("</TR>\r\n");
     if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['embutida_label'])
     { 
         if (isset($_SESSION['scriptcase']['saida_var']) && $_SESSION['scriptcase']['saida_var'])
         { 
             $Cod_Html = $_SESSION['scriptcase']['saida_html'];
             $pos_tag = strpos($Cod_Html, "<TD ");
             $Cod_Html = substr($Cod_Html, $pos_tag);
             $pos      = 0;
             $pos_tag  = false;
             $pos_tmp  = true; 
             $tmp      = $Cod_Html;
             while ($pos_tmp)
             {
                $pos = strpos($tmp, "</TR>", $pos);
                if ($pos !== false)
                {
                    $pos_tag = $pos;
                    $pos += 4;
                }
                else
                {
                    $pos_tmp = false;
                }
             }
             $Cod_Html = substr($Cod_Html, 0, $pos_tag);
             $Nm_temp = explode("</TD>", $Cod_Html);
             $css_emb = "<style type=\"text/css\">";
             $NM_css = file($this->Ini->root . $this->Ini->path_link . "grid_detail_sales_todo/grid_detail_sales_todo_grid_" .strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) . ".css");
             foreach ($NM_css as $cada_css)
             {
                 $css_emb .= ".grid_detail_sales_todo_" . substr($cada_css, 1);
             }
             $css_emb .= "</style>";
             $Cod_Html = $css_emb . $Cod_Html;
             $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['cols_emb'] = count($Nm_temp) - 1;
             if ($contr_embutida) 
             { 
                 $_SESSION['scriptcase']['saida_var']  = false;
                 $nm_saida->saida($Cod_Html);
             } 
             else 
             { 
                 $_SESSION['scriptcase']['saida_html'] = $salva_htm_emb . $Cod_Html;
             } 
         } 
     } 
     $NM_seq_lab = 1;
     foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['labels'] as $NM_cmp => $NM_lab)
     {
         if (empty($NM_lab) || $NM_lab == "&nbsp;")
         {
             $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['labels'][$NM_cmp] = "No_Label" . $NM_seq_lab;
             $NM_seq_lab++;
         }
     } 
   } 
 }
 function NM_label_view_sales_detail_group_todo_fecha()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['view_sales_detail_group_todo_fecha'])) ? $this->New_label['view_sales_detail_group_todo_fecha'] : "Fecha";
   $classColFld = "";
   $classColTitle = "";
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao_print'] != 'print' && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao'] != 'pdf') {
     $classColFld = " sc-col-fld sc-col-fld-" . $this->grid_fixed_column_no;
     $classColTitle = " sc-col-title";
   }
   if (!isset($this->NM_cmp_hidden['view_sales_detail_group_todo_fecha']) || $this->NM_cmp_hidden['view_sales_detail_group_todo_fecha'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_inherit_bg . ' ' . $this->css_scGridLabelFont . $this->css_sep . $this->css_view_sales_detail_group_todo_fecha_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_view_sales_detail_group_todo_fecha_label'] . "\" >\r\n");
    $label_fieldName = nl2br($SC_Label);
    if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao_print'] != 'print' && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao'] != 'pdf') {
        // label & order
        $divLabelStyle = '; justify-content: center';
        $NM_cmp_class = "cmp_maior_30_1";
        if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access)) {
            $NM_cmp_class = "view_sales_detail_group_todo.fecha";
        }
        elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase)) {
            $NM_cmp_class = "view_sales_detail_group_todo.fecha";
        }
        $fieldSortRule = $this->scGetColumnOrderRule($NM_cmp_class);
        $fieldSortIcon = $this->scGetColumnOrderIcon($NM_cmp_class, $fieldSortRule);
        if (empty($this->Ini->Label_sort_pos) || $this->Ini->Label_sort_pos == 'right') {
            $this->Ini->Label_sort_pos = 'right_field';
        }
        if (empty($fieldSortIcon)) {
            $label_labelContent = "<div style=\"flex-grow: 1; white-space: nowrap" . $divLabelStyle . "\">" . $label_fieldName . "</div>";
        } elseif ($this->Ini->Label_sort_pos == 'right_field') {
            $label_labelContent = "<div style=\"display: flex" . $divLabelStyle . "\"><div style=\"display: flex; white-space: nowrap\">" . $label_fieldName . "</div>" . $fieldSortIcon . "</div>";
        } elseif ($this->Ini->Label_sort_pos == 'left_field') {
            $label_labelContent = "<div style=\"display: flex" . $divLabelStyle . "\">" . $fieldSortIcon . "\<div style=\"display: flex; white-space: nowrap\">" . $label_fieldName . "</div></div>";
        } elseif ($this->Ini->Label_sort_pos == 'right_cell') {
            $label_labelContent = "<div style=\"display: flex; justify-content: space-between\"><div style=\"display: flex; flex-grow: 1; white-space: nowrap" . $divLabelStyle . "\">" . $label_fieldName . "</div>" . $fieldSortIcon . "</div>";
        } elseif ($this->Ini->Label_sort_pos == 'left_cell') {
            $label_labelContent = "<div style=\"display: flex; justify-content: space-between\">" . $fieldSortIcon . "<div style=\"display: flex; flex-grow: 1; white-space: nowrap" . $divLabelStyle . "\">" . $label_fieldName . "</div></div>";
        } else {
            $label_labelContent = "<div style=\"flex-grow: 1; white-space: nowrap" . $divLabelStyle . "\">" . $label_fieldName . "</div>";
        }
        $label_labelContent = "<a href=\"javascript:nm_gp_submit2('" . $NM_cmp_class . "')\" class=\"" . $this->css_scGridLabelLink . "\">" . $label_labelContent . "</a>";
        $label_divLabel = "<div style=\"flex-grow: 1\">". $label_labelContent . "</div>";
        // controls
        $label_chart = '';
        $label_fixedColumn = '';
        $label_divControl = '<div style="display: flex; flex-wrap: nowrap; align-items: baseline">' . $label_chart . $label_fixedColumn . '</div>';
        // final label
        $label_final = '<div style="display: flex; flex-direction: row; flex-wrap: nowrap; justify-content: space-between; align-items: baseline">' . $label_divLabel . $label_divControl . '</div>';
    } else {
        $label_final = $label_fieldName;
    }
   $nm_saida->saida("" . $label_final . "\r\n");
   $nm_saida->saida("</TD>\r\n");
   } 
 }
 function NM_label_view_sales_detail_group_todo_cantidad()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['view_sales_detail_group_todo_cantidad'])) ? $this->New_label['view_sales_detail_group_todo_cantidad'] : "Cantidad";
   $classColFld = "";
   $classColTitle = "";
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao_print'] != 'print' && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao'] != 'pdf') {
     $classColFld = " sc-col-fld sc-col-fld-" . $this->grid_fixed_column_no;
     $classColTitle = " sc-col-title";
   }
   if (!isset($this->NM_cmp_hidden['view_sales_detail_group_todo_cantidad']) || $this->NM_cmp_hidden['view_sales_detail_group_todo_cantidad'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_inherit_bg . ' ' . $this->css_scGridLabelFont . $this->css_sep . $this->css_view_sales_detail_group_todo_cantidad_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_view_sales_detail_group_todo_cantidad_label'] . "\" >\r\n");
    $label_fieldName = nl2br($SC_Label);
    if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao_print'] != 'print' && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao'] != 'pdf') {
        // label & order
        $divLabelStyle = '; justify-content: right';
        $NM_cmp_class = "cmp_maior_30_2";
        if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access)) {
            $NM_cmp_class = "view_sales_detail_group_todo.cantidad";
        }
        elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase)) {
            $NM_cmp_class = "view_sales_detail_group_todo.cantidad";
        }
        $fieldSortRule = $this->scGetColumnOrderRule($NM_cmp_class);
        $fieldSortIcon = $this->scGetColumnOrderIcon($NM_cmp_class, $fieldSortRule);
        if (empty($this->Ini->Label_sort_pos) || $this->Ini->Label_sort_pos == 'right') {
            $this->Ini->Label_sort_pos = 'right_field';
        }
        if (empty($fieldSortIcon)) {
            $label_labelContent = "<div style=\"flex-grow: 1; white-space: nowrap" . $divLabelStyle . "\">" . $label_fieldName . "</div>";
        } elseif ($this->Ini->Label_sort_pos == 'right_field') {
            $label_labelContent = "<div style=\"display: flex" . $divLabelStyle . "\"><div style=\"display: flex; white-space: nowrap\">" . $label_fieldName . "</div>" . $fieldSortIcon . "</div>";
        } elseif ($this->Ini->Label_sort_pos == 'left_field') {
            $label_labelContent = "<div style=\"display: flex" . $divLabelStyle . "\">" . $fieldSortIcon . "\<div style=\"display: flex; white-space: nowrap\">" . $label_fieldName . "</div></div>";
        } elseif ($this->Ini->Label_sort_pos == 'right_cell') {
            $label_labelContent = "<div style=\"display: flex; justify-content: space-between\"><div style=\"display: flex; flex-grow: 1; white-space: nowrap" . $divLabelStyle . "\">" . $label_fieldName . "</div>" . $fieldSortIcon . "</div>";
        } elseif ($this->Ini->Label_sort_pos == 'left_cell') {
            $label_labelContent = "<div style=\"display: flex; justify-content: space-between\">" . $fieldSortIcon . "<div style=\"display: flex; flex-grow: 1; white-space: nowrap" . $divLabelStyle . "\">" . $label_fieldName . "</div></div>";
        } else {
            $label_labelContent = "<div style=\"flex-grow: 1; white-space: nowrap" . $divLabelStyle . "\">" . $label_fieldName . "</div>";
        }
        $label_labelContent = "<a href=\"javascript:nm_gp_submit2('" . $NM_cmp_class . "')\" class=\"" . $this->css_scGridLabelLink . "\">" . $label_labelContent . "</a>";
        $label_divLabel = "<div style=\"flex-grow: 1\">". $label_labelContent . "</div>";
        // controls
        $label_chart = '';
        $label_fixedColumn = '';
        $label_divControl = '<div style="display: flex; flex-wrap: nowrap; align-items: baseline">' . $label_chart . $label_fixedColumn . '</div>';
        // final label
        $label_final = '<div style="display: flex; flex-direction: row; flex-wrap: nowrap; justify-content: space-between; align-items: baseline">' . $label_divLabel . $label_divControl . '</div>';
    } else {
        $label_final = $label_fieldName;
    }
   $nm_saida->saida("" . $label_final . "\r\n");
   $nm_saida->saida("</TD>\r\n");
   } 
 }
 function NM_label_view_sales_detail_group_todo_unit_value()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['view_sales_detail_group_todo_unit_value'])) ? $this->New_label['view_sales_detail_group_todo_unit_value'] : "Unit Value";
   $classColFld = "";
   $classColTitle = "";
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao_print'] != 'print' && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao'] != 'pdf') {
     $classColFld = " sc-col-fld sc-col-fld-" . $this->grid_fixed_column_no;
     $classColTitle = " sc-col-title";
   }
   if (!isset($this->NM_cmp_hidden['view_sales_detail_group_todo_unit_value']) || $this->NM_cmp_hidden['view_sales_detail_group_todo_unit_value'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_inherit_bg . ' ' . $this->css_scGridLabelFont . $this->css_sep . $this->css_view_sales_detail_group_todo_unit_value_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_view_sales_detail_group_todo_unit_value_label'] . "\" >\r\n");
    $label_fieldName = nl2br($SC_Label);
    if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao_print'] != 'print' && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao'] != 'pdf') {
        // label & order
        $divLabelStyle = '; justify-content: right';
        $NM_cmp_class = "cmp_maior_30_3";
        if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access)) {
            $NM_cmp_class = "view_sales_detail_group_todo.unit_value";
        }
        elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase)) {
            $NM_cmp_class = "view_sales_detail_group_todo.unit_value";
        }
        $fieldSortRule = $this->scGetColumnOrderRule($NM_cmp_class);
        $fieldSortIcon = $this->scGetColumnOrderIcon($NM_cmp_class, $fieldSortRule);
        if (empty($this->Ini->Label_sort_pos) || $this->Ini->Label_sort_pos == 'right') {
            $this->Ini->Label_sort_pos = 'right_field';
        }
        if (empty($fieldSortIcon)) {
            $label_labelContent = "<div style=\"flex-grow: 1; white-space: nowrap" . $divLabelStyle . "\">" . $label_fieldName . "</div>";
        } elseif ($this->Ini->Label_sort_pos == 'right_field') {
            $label_labelContent = "<div style=\"display: flex" . $divLabelStyle . "\"><div style=\"display: flex; white-space: nowrap\">" . $label_fieldName . "</div>" . $fieldSortIcon . "</div>";
        } elseif ($this->Ini->Label_sort_pos == 'left_field') {
            $label_labelContent = "<div style=\"display: flex" . $divLabelStyle . "\">" . $fieldSortIcon . "\<div style=\"display: flex; white-space: nowrap\">" . $label_fieldName . "</div></div>";
        } elseif ($this->Ini->Label_sort_pos == 'right_cell') {
            $label_labelContent = "<div style=\"display: flex; justify-content: space-between\"><div style=\"display: flex; flex-grow: 1; white-space: nowrap" . $divLabelStyle . "\">" . $label_fieldName . "</div>" . $fieldSortIcon . "</div>";
        } elseif ($this->Ini->Label_sort_pos == 'left_cell') {
            $label_labelContent = "<div style=\"display: flex; justify-content: space-between\">" . $fieldSortIcon . "<div style=\"display: flex; flex-grow: 1; white-space: nowrap" . $divLabelStyle . "\">" . $label_fieldName . "</div></div>";
        } else {
            $label_labelContent = "<div style=\"flex-grow: 1; white-space: nowrap" . $divLabelStyle . "\">" . $label_fieldName . "</div>";
        }
        $label_labelContent = "<a href=\"javascript:nm_gp_submit2('" . $NM_cmp_class . "')\" class=\"" . $this->css_scGridLabelLink . "\">" . $label_labelContent . "</a>";
        $label_divLabel = "<div style=\"flex-grow: 1\">". $label_labelContent . "</div>";
        // controls
        $label_chart = '';
        $label_fixedColumn = '';
        $label_divControl = '<div style="display: flex; flex-wrap: nowrap; align-items: baseline">' . $label_chart . $label_fixedColumn . '</div>';
        // final label
        $label_final = '<div style="display: flex; flex-direction: row; flex-wrap: nowrap; justify-content: space-between; align-items: baseline">' . $label_divLabel . $label_divControl . '</div>';
    } else {
        $label_final = $label_fieldName;
    }
   $nm_saida->saida("" . $label_final . "\r\n");
   $nm_saida->saida("</TD>\r\n");
   } 
 }
 function NM_label_view_sales_detail_group_todo_producto()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['view_sales_detail_group_todo_producto'])) ? $this->New_label['view_sales_detail_group_todo_producto'] : "Producto";
   $classColFld = "";
   $classColTitle = "";
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao_print'] != 'print' && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao'] != 'pdf') {
     $classColFld = " sc-col-fld sc-col-fld-" . $this->grid_fixed_column_no;
     $classColTitle = " sc-col-title";
   }
   if (!isset($this->NM_cmp_hidden['view_sales_detail_group_todo_producto']) || $this->NM_cmp_hidden['view_sales_detail_group_todo_producto'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_inherit_bg . ' ' . $this->css_scGridLabelFont . $this->css_sep . $this->css_view_sales_detail_group_todo_producto_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_view_sales_detail_group_todo_producto_label'] . "\" >\r\n");
    $label_fieldName = nl2br($SC_Label);
    if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao_print'] != 'print' && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao'] != 'pdf') {
        // label & order
        $divLabelStyle = '';
        $NM_cmp_class = "cmp_maior_30_4";
        if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access)) {
            $NM_cmp_class = "view_sales_detail_group_todo.producto";
        }
        elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase)) {
            $NM_cmp_class = "view_sales_detail_group_todo.producto";
        }
        $fieldSortRule = $this->scGetColumnOrderRule($NM_cmp_class);
        $fieldSortIcon = $this->scGetColumnOrderIcon($NM_cmp_class, $fieldSortRule);
        if (empty($this->Ini->Label_sort_pos) || $this->Ini->Label_sort_pos == 'right') {
            $this->Ini->Label_sort_pos = 'right_field';
        }
        if (empty($fieldSortIcon)) {
            $label_labelContent = "<div style=\"flex-grow: 1; white-space: nowrap" . $divLabelStyle . "\">" . $label_fieldName . "</div>";
        } elseif ($this->Ini->Label_sort_pos == 'right_field') {
            $label_labelContent = "<div style=\"display: flex" . $divLabelStyle . "\"><div style=\"display: flex; white-space: nowrap\">" . $label_fieldName . "</div>" . $fieldSortIcon . "</div>";
        } elseif ($this->Ini->Label_sort_pos == 'left_field') {
            $label_labelContent = "<div style=\"display: flex" . $divLabelStyle . "\">" . $fieldSortIcon . "\<div style=\"display: flex; white-space: nowrap\">" . $label_fieldName . "</div></div>";
        } elseif ($this->Ini->Label_sort_pos == 'right_cell') {
            $label_labelContent = "<div style=\"display: flex; justify-content: space-between\"><div style=\"display: flex; flex-grow: 1; white-space: nowrap" . $divLabelStyle . "\">" . $label_fieldName . "</div>" . $fieldSortIcon . "</div>";
        } elseif ($this->Ini->Label_sort_pos == 'left_cell') {
            $label_labelContent = "<div style=\"display: flex; justify-content: space-between\">" . $fieldSortIcon . "<div style=\"display: flex; flex-grow: 1; white-space: nowrap" . $divLabelStyle . "\">" . $label_fieldName . "</div></div>";
        } else {
            $label_labelContent = "<div style=\"flex-grow: 1; white-space: nowrap" . $divLabelStyle . "\">" . $label_fieldName . "</div>";
        }
        $label_labelContent = "<a href=\"javascript:nm_gp_submit2('" . $NM_cmp_class . "')\" class=\"" . $this->css_scGridLabelLink . "\">" . $label_labelContent . "</a>";
        $label_divLabel = "<div style=\"flex-grow: 1\">". $label_labelContent . "</div>";
        // controls
        $label_chart = '';
        $label_fixedColumn = '';
        $label_divControl = '<div style="display: flex; flex-wrap: nowrap; align-items: baseline">' . $label_chart . $label_fixedColumn . '</div>';
        // final label
        $label_final = '<div style="display: flex; flex-direction: row; flex-wrap: nowrap; justify-content: space-between; align-items: baseline">' . $label_divLabel . $label_divControl . '</div>';
    } else {
        $label_final = $label_fieldName;
    }
   $nm_saida->saida("" . $label_final . "\r\n");
   $nm_saida->saida("</TD>\r\n");
   } 
 }
 function NM_label_valor()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['valor'])) ? $this->New_label['valor'] : "Valor";
   $classColFld = "";
   $classColTitle = "";
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao_print'] != 'print' && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao'] != 'pdf') {
     $classColFld = " sc-col-fld sc-col-fld-" . $this->grid_fixed_column_no;
     $classColTitle = " sc-col-title";
   }
   if (!isset($this->NM_cmp_hidden['valor']) || $this->NM_cmp_hidden['valor'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_inherit_bg . ' ' . $this->css_scGridLabelFont . $this->css_sep . $this->css_valor_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_valor_label'] . "\" >\r\n");
    $label_fieldName = nl2br($SC_Label);
    if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao_print'] != 'print' && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao'] != 'pdf') {
        // label & order
        $divLabelStyle = '; justify-content: right';
        $NM_cmp_class = "valor";
        if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access)) {
            $NM_cmp_class = "unit_value*cantidad";
        }
        elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase)) {
            $NM_cmp_class = "unit_value*cantidad";
        }
        $fieldSortRule = $this->scGetColumnOrderRule($NM_cmp_class);
        $fieldSortIcon = $this->scGetColumnOrderIcon($NM_cmp_class, $fieldSortRule);
        if (empty($this->Ini->Label_sort_pos) || $this->Ini->Label_sort_pos == 'right') {
            $this->Ini->Label_sort_pos = 'right_field';
        }
        if (empty($fieldSortIcon)) {
            $label_labelContent = "<div style=\"flex-grow: 1; white-space: nowrap" . $divLabelStyle . "\">" . $label_fieldName . "</div>";
        } elseif ($this->Ini->Label_sort_pos == 'right_field') {
            $label_labelContent = "<div style=\"display: flex" . $divLabelStyle . "\"><div style=\"display: flex; white-space: nowrap\">" . $label_fieldName . "</div>" . $fieldSortIcon . "</div>";
        } elseif ($this->Ini->Label_sort_pos == 'left_field') {
            $label_labelContent = "<div style=\"display: flex" . $divLabelStyle . "\">" . $fieldSortIcon . "\<div style=\"display: flex; white-space: nowrap\">" . $label_fieldName . "</div></div>";
        } elseif ($this->Ini->Label_sort_pos == 'right_cell') {
            $label_labelContent = "<div style=\"display: flex; justify-content: space-between\"><div style=\"display: flex; flex-grow: 1; white-space: nowrap" . $divLabelStyle . "\">" . $label_fieldName . "</div>" . $fieldSortIcon . "</div>";
        } elseif ($this->Ini->Label_sort_pos == 'left_cell') {
            $label_labelContent = "<div style=\"display: flex; justify-content: space-between\">" . $fieldSortIcon . "<div style=\"display: flex; flex-grow: 1; white-space: nowrap" . $divLabelStyle . "\">" . $label_fieldName . "</div></div>";
        } else {
            $label_labelContent = "<div style=\"flex-grow: 1; white-space: nowrap" . $divLabelStyle . "\">" . $label_fieldName . "</div>";
        }
        $label_labelContent = "<a href=\"javascript:nm_gp_submit2('" . $NM_cmp_class . "')\" class=\"" . $this->css_scGridLabelLink . "\">" . $label_labelContent . "</a>";
        $label_divLabel = "<div style=\"flex-grow: 1\">". $label_labelContent . "</div>";
        // controls
        $label_chart = '';
        $label_fixedColumn = '';
        $label_divControl = '<div style="display: flex; flex-wrap: nowrap; align-items: baseline">' . $label_chart . $label_fixedColumn . '</div>';
        // final label
        $label_final = '<div style="display: flex; flex-direction: row; flex-wrap: nowrap; justify-content: space-between; align-items: baseline">' . $label_divLabel . $label_divControl . '</div>';
    } else {
        $label_final = $label_fieldName;
    }
   $nm_saida->saida("" . $label_final . "\r\n");
   $nm_saida->saida("</TD>\r\n");
   } 
 }
 function NM_label_view_sales_detail_group_todo_cuentaventa()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['view_sales_detail_group_todo_cuentaventa'])) ? $this->New_label['view_sales_detail_group_todo_cuentaventa'] : "Cuentaventa";
   $classColFld = "";
   $classColTitle = "";
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao_print'] != 'print' && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao'] != 'pdf') {
     $classColFld = " sc-col-fld sc-col-fld-" . $this->grid_fixed_column_no;
     $classColTitle = " sc-col-title";
   }
   if (!isset($this->NM_cmp_hidden['view_sales_detail_group_todo_cuentaventa']) || $this->NM_cmp_hidden['view_sales_detail_group_todo_cuentaventa'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_inherit_bg . ' ' . $this->css_scGridLabelFont . $this->css_sep . $this->css_view_sales_detail_group_todo_cuentaventa_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_view_sales_detail_group_todo_cuentaventa_label'] . "\" >\r\n");
    $label_fieldName = nl2br($SC_Label);
    if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao_print'] != 'print' && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao'] != 'pdf') {
        // label & order
        $divLabelStyle = '';
        $NM_cmp_class = "cmp_maior_30_5";
        if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access)) {
            $NM_cmp_class = "view_sales_detail_group_todo.cuentaventa";
        }
        elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase)) {
            $NM_cmp_class = "view_sales_detail_group_todo.cuentaventa";
        }
        $fieldSortRule = $this->scGetColumnOrderRule($NM_cmp_class);
        $fieldSortIcon = $this->scGetColumnOrderIcon($NM_cmp_class, $fieldSortRule);
        if (empty($this->Ini->Label_sort_pos) || $this->Ini->Label_sort_pos == 'right') {
            $this->Ini->Label_sort_pos = 'right_field';
        }
        if (empty($fieldSortIcon)) {
            $label_labelContent = "<div style=\"flex-grow: 1; white-space: nowrap" . $divLabelStyle . "\">" . $label_fieldName . "</div>";
        } elseif ($this->Ini->Label_sort_pos == 'right_field') {
            $label_labelContent = "<div style=\"display: flex" . $divLabelStyle . "\"><div style=\"display: flex; white-space: nowrap\">" . $label_fieldName . "</div>" . $fieldSortIcon . "</div>";
        } elseif ($this->Ini->Label_sort_pos == 'left_field') {
            $label_labelContent = "<div style=\"display: flex" . $divLabelStyle . "\">" . $fieldSortIcon . "\<div style=\"display: flex; white-space: nowrap\">" . $label_fieldName . "</div></div>";
        } elseif ($this->Ini->Label_sort_pos == 'right_cell') {
            $label_labelContent = "<div style=\"display: flex; justify-content: space-between\"><div style=\"display: flex; flex-grow: 1; white-space: nowrap" . $divLabelStyle . "\">" . $label_fieldName . "</div>" . $fieldSortIcon . "</div>";
        } elseif ($this->Ini->Label_sort_pos == 'left_cell') {
            $label_labelContent = "<div style=\"display: flex; justify-content: space-between\">" . $fieldSortIcon . "<div style=\"display: flex; flex-grow: 1; white-space: nowrap" . $divLabelStyle . "\">" . $label_fieldName . "</div></div>";
        } else {
            $label_labelContent = "<div style=\"flex-grow: 1; white-space: nowrap" . $divLabelStyle . "\">" . $label_fieldName . "</div>";
        }
        $label_labelContent = "<a href=\"javascript:nm_gp_submit2('" . $NM_cmp_class . "')\" class=\"" . $this->css_scGridLabelLink . "\">" . $label_labelContent . "</a>";
        $label_divLabel = "<div style=\"flex-grow: 1\">". $label_labelContent . "</div>";
        // controls
        $label_chart = '';
        $label_fixedColumn = '';
        $label_divControl = '<div style="display: flex; flex-wrap: nowrap; align-items: baseline">' . $label_chart . $label_fixedColumn . '</div>';
        // final label
        $label_final = '<div style="display: flex; flex-direction: row; flex-wrap: nowrap; justify-content: space-between; align-items: baseline">' . $label_divLabel . $label_divControl . '</div>';
    } else {
        $label_final = $label_fieldName;
    }
   $nm_saida->saida("" . $label_final . "\r\n");
   $nm_saida->saida("</TD>\r\n");
   } 
 }
 function NM_label_sales_idcliente()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['sales_idcliente'])) ? $this->New_label['sales_idcliente'] : "Idcliente";
   $classColFld = "";
   $classColTitle = "";
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao_print'] != 'print' && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao'] != 'pdf') {
     $classColFld = " sc-col-fld sc-col-fld-" . $this->grid_fixed_column_no;
     $classColTitle = " sc-col-title";
   }
   if (!isset($this->NM_cmp_hidden['sales_idcliente']) || $this->NM_cmp_hidden['sales_idcliente'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_inherit_bg . ' ' . $this->css_scGridLabelFont . $this->css_sep . $this->css_sales_idcliente_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_sales_idcliente_label'] . "\" >\r\n");
    $label_fieldName = nl2br($SC_Label);
    if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao_print'] != 'print' && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao'] != 'pdf') {
        // label & order
        $divLabelStyle = '';
        $NM_cmp_class = "sales_idcliente";
        if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access)) {
            $NM_cmp_class = "sales.idcliente";
        }
        elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase)) {
            $NM_cmp_class = "sales.idcliente";
        }
        $fieldSortRule = $this->scGetColumnOrderRule($NM_cmp_class);
        $fieldSortIcon = $this->scGetColumnOrderIcon($NM_cmp_class, $fieldSortRule);
        if (empty($this->Ini->Label_sort_pos) || $this->Ini->Label_sort_pos == 'right') {
            $this->Ini->Label_sort_pos = 'right_field';
        }
        if (empty($fieldSortIcon)) {
            $label_labelContent = "<div style=\"flex-grow: 1; white-space: nowrap" . $divLabelStyle . "\">" . $label_fieldName . "</div>";
        } elseif ($this->Ini->Label_sort_pos == 'right_field') {
            $label_labelContent = "<div style=\"display: flex" . $divLabelStyle . "\"><div style=\"display: flex; white-space: nowrap\">" . $label_fieldName . "</div>" . $fieldSortIcon . "</div>";
        } elseif ($this->Ini->Label_sort_pos == 'left_field') {
            $label_labelContent = "<div style=\"display: flex" . $divLabelStyle . "\">" . $fieldSortIcon . "\<div style=\"display: flex; white-space: nowrap\">" . $label_fieldName . "</div></div>";
        } elseif ($this->Ini->Label_sort_pos == 'right_cell') {
            $label_labelContent = "<div style=\"display: flex; justify-content: space-between\"><div style=\"display: flex; flex-grow: 1; white-space: nowrap" . $divLabelStyle . "\">" . $label_fieldName . "</div>" . $fieldSortIcon . "</div>";
        } elseif ($this->Ini->Label_sort_pos == 'left_cell') {
            $label_labelContent = "<div style=\"display: flex; justify-content: space-between\">" . $fieldSortIcon . "<div style=\"display: flex; flex-grow: 1; white-space: nowrap" . $divLabelStyle . "\">" . $label_fieldName . "</div></div>";
        } else {
            $label_labelContent = "<div style=\"flex-grow: 1; white-space: nowrap" . $divLabelStyle . "\">" . $label_fieldName . "</div>";
        }
        $label_labelContent = "<a href=\"javascript:nm_gp_submit2('" . $NM_cmp_class . "')\" class=\"" . $this->css_scGridLabelLink . "\">" . $label_labelContent . "</a>";
        $label_divLabel = "<div style=\"flex-grow: 1\">". $label_labelContent . "</div>";
        // controls
        $label_chart = '';
        $label_fixedColumn = '';
        $label_divControl = '<div style="display: flex; flex-wrap: nowrap; align-items: baseline">' . $label_chart . $label_fixedColumn . '</div>';
        // final label
        $label_final = '<div style="display: flex; flex-direction: row; flex-wrap: nowrap; justify-content: space-between; align-items: baseline">' . $label_divLabel . $label_divControl . '</div>';
    } else {
        $label_final = $label_fieldName;
    }
   $nm_saida->saida("" . $label_final . "\r\n");
   $nm_saida->saida("</TD>\r\n");
   } 
 }
 function NM_label_sales_cliente()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['sales_cliente'])) ? $this->New_label['sales_cliente'] : "Cliente";
   $classColFld = "";
   $classColTitle = "";
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao_print'] != 'print' && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao'] != 'pdf') {
     $classColFld = " sc-col-fld sc-col-fld-" . $this->grid_fixed_column_no;
     $classColTitle = " sc-col-title";
   }
   if (!isset($this->NM_cmp_hidden['sales_cliente']) || $this->NM_cmp_hidden['sales_cliente'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_inherit_bg . ' ' . $this->css_scGridLabelFont . $this->css_sep . $this->css_sales_cliente_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_sales_cliente_label'] . "\" >\r\n");
    $label_fieldName = nl2br($SC_Label);
    if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao_print'] != 'print' && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao'] != 'pdf') {
        // label & order
        $divLabelStyle = '';
        $NM_cmp_class = "sales_cliente";
        if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access)) {
            $NM_cmp_class = "sales.cliente";
        }
        elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase)) {
            $NM_cmp_class = "sales.cliente";
        }
        $fieldSortRule = $this->scGetColumnOrderRule($NM_cmp_class);
        $fieldSortIcon = $this->scGetColumnOrderIcon($NM_cmp_class, $fieldSortRule);
        if (empty($this->Ini->Label_sort_pos) || $this->Ini->Label_sort_pos == 'right') {
            $this->Ini->Label_sort_pos = 'right_field';
        }
        if (empty($fieldSortIcon)) {
            $label_labelContent = "<div style=\"flex-grow: 1; white-space: nowrap" . $divLabelStyle . "\">" . $label_fieldName . "</div>";
        } elseif ($this->Ini->Label_sort_pos == 'right_field') {
            $label_labelContent = "<div style=\"display: flex" . $divLabelStyle . "\"><div style=\"display: flex; white-space: nowrap\">" . $label_fieldName . "</div>" . $fieldSortIcon . "</div>";
        } elseif ($this->Ini->Label_sort_pos == 'left_field') {
            $label_labelContent = "<div style=\"display: flex" . $divLabelStyle . "\">" . $fieldSortIcon . "\<div style=\"display: flex; white-space: nowrap\">" . $label_fieldName . "</div></div>";
        } elseif ($this->Ini->Label_sort_pos == 'right_cell') {
            $label_labelContent = "<div style=\"display: flex; justify-content: space-between\"><div style=\"display: flex; flex-grow: 1; white-space: nowrap" . $divLabelStyle . "\">" . $label_fieldName . "</div>" . $fieldSortIcon . "</div>";
        } elseif ($this->Ini->Label_sort_pos == 'left_cell') {
            $label_labelContent = "<div style=\"display: flex; justify-content: space-between\">" . $fieldSortIcon . "<div style=\"display: flex; flex-grow: 1; white-space: nowrap" . $divLabelStyle . "\">" . $label_fieldName . "</div></div>";
        } else {
            $label_labelContent = "<div style=\"flex-grow: 1; white-space: nowrap" . $divLabelStyle . "\">" . $label_fieldName . "</div>";
        }
        $label_labelContent = "<a href=\"javascript:nm_gp_submit2('" . $NM_cmp_class . "')\" class=\"" . $this->css_scGridLabelLink . "\">" . $label_labelContent . "</a>";
        $label_divLabel = "<div style=\"flex-grow: 1\">". $label_labelContent . "</div>";
        // controls
        $label_chart = '';
        $label_fixedColumn = '';
        $label_divControl = '<div style="display: flex; flex-wrap: nowrap; align-items: baseline">' . $label_chart . $label_fixedColumn . '</div>';
        // final label
        $label_final = '<div style="display: flex; flex-direction: row; flex-wrap: nowrap; justify-content: space-between; align-items: baseline">' . $label_divLabel . $label_divControl . '</div>';
    } else {
        $label_final = $label_fieldName;
    }
   $nm_saida->saida("" . $label_final . "\r\n");
   $nm_saida->saida("</TD>\r\n");
   } 
 }
 function NM_label_sales_factura()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['sales_factura'])) ? $this->New_label['sales_factura'] : "Factura";
   $classColFld = "";
   $classColTitle = "";
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao_print'] != 'print' && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao'] != 'pdf') {
     $classColFld = " sc-col-fld sc-col-fld-" . $this->grid_fixed_column_no;
     $classColTitle = " sc-col-title";
   }
   if (!isset($this->NM_cmp_hidden['sales_factura']) || $this->NM_cmp_hidden['sales_factura'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_inherit_bg . ' ' . $this->css_scGridLabelFont . $this->css_sep . $this->css_sales_factura_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_sales_factura_label'] . "\" >\r\n");
    $label_fieldName = nl2br($SC_Label);
    if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao_print'] != 'print' && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao'] != 'pdf') {
        // label & order
        $divLabelStyle = '; justify-content: right';
        $NM_cmp_class = "sales_factura";
        if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access)) {
            $NM_cmp_class = "sales.factura";
        }
        elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase)) {
            $NM_cmp_class = "sales.factura";
        }
        $fieldSortRule = $this->scGetColumnOrderRule($NM_cmp_class);
        $fieldSortIcon = $this->scGetColumnOrderIcon($NM_cmp_class, $fieldSortRule);
        if (empty($this->Ini->Label_sort_pos) || $this->Ini->Label_sort_pos == 'right') {
            $this->Ini->Label_sort_pos = 'right_field';
        }
        if (empty($fieldSortIcon)) {
            $label_labelContent = "<div style=\"flex-grow: 1; white-space: nowrap" . $divLabelStyle . "\">" . $label_fieldName . "</div>";
        } elseif ($this->Ini->Label_sort_pos == 'right_field') {
            $label_labelContent = "<div style=\"display: flex" . $divLabelStyle . "\"><div style=\"display: flex; white-space: nowrap\">" . $label_fieldName . "</div>" . $fieldSortIcon . "</div>";
        } elseif ($this->Ini->Label_sort_pos == 'left_field') {
            $label_labelContent = "<div style=\"display: flex" . $divLabelStyle . "\">" . $fieldSortIcon . "\<div style=\"display: flex; white-space: nowrap\">" . $label_fieldName . "</div></div>";
        } elseif ($this->Ini->Label_sort_pos == 'right_cell') {
            $label_labelContent = "<div style=\"display: flex; justify-content: space-between\"><div style=\"display: flex; flex-grow: 1; white-space: nowrap" . $divLabelStyle . "\">" . $label_fieldName . "</div>" . $fieldSortIcon . "</div>";
        } elseif ($this->Ini->Label_sort_pos == 'left_cell') {
            $label_labelContent = "<div style=\"display: flex; justify-content: space-between\">" . $fieldSortIcon . "<div style=\"display: flex; flex-grow: 1; white-space: nowrap" . $divLabelStyle . "\">" . $label_fieldName . "</div></div>";
        } else {
            $label_labelContent = "<div style=\"flex-grow: 1; white-space: nowrap" . $divLabelStyle . "\">" . $label_fieldName . "</div>";
        }
        $label_labelContent = "<a href=\"javascript:nm_gp_submit2('" . $NM_cmp_class . "')\" class=\"" . $this->css_scGridLabelLink . "\">" . $label_labelContent . "</a>";
        $label_divLabel = "<div style=\"flex-grow: 1\">". $label_labelContent . "</div>";
        // controls
        $label_chart = '';
        $label_fixedColumn = '';
        $label_divControl = '<div style="display: flex; flex-wrap: nowrap; align-items: baseline">' . $label_chart . $label_fixedColumn . '</div>';
        // final label
        $label_final = '<div style="display: flex; flex-direction: row; flex-wrap: nowrap; justify-content: space-between; align-items: baseline">' . $label_divLabel . $label_divControl . '</div>';
    } else {
        $label_final = $label_fieldName;
    }
   $nm_saida->saida("" . $label_final . "\r\n");
   $nm_saida->saida("</TD>\r\n");
   } 
 }
 function NM_label_customer_nombre()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['customer_nombre'])) ? $this->New_label['customer_nombre'] : "Nombre";
   $classColFld = "";
   $classColTitle = "";
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao_print'] != 'print' && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao'] != 'pdf') {
     $classColFld = " sc-col-fld sc-col-fld-" . $this->grid_fixed_column_no;
     $classColTitle = " sc-col-title";
   }
   if (!isset($this->NM_cmp_hidden['customer_nombre']) || $this->NM_cmp_hidden['customer_nombre'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_inherit_bg . ' ' . $this->css_scGridLabelFont . $this->css_sep . $this->css_customer_nombre_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_customer_nombre_label'] . "\" >\r\n");
    $label_fieldName = nl2br($SC_Label);
    if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao_print'] != 'print' && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao'] != 'pdf') {
        // label & order
        $divLabelStyle = '';
        $NM_cmp_class = "customer_nombre";
        if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access)) {
            $NM_cmp_class = "customer.nombre";
        }
        elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase)) {
            $NM_cmp_class = "customer.nombre";
        }
        $fieldSortRule = $this->scGetColumnOrderRule($NM_cmp_class);
        $fieldSortIcon = $this->scGetColumnOrderIcon($NM_cmp_class, $fieldSortRule);
        if (empty($this->Ini->Label_sort_pos) || $this->Ini->Label_sort_pos == 'right') {
            $this->Ini->Label_sort_pos = 'right_field';
        }
        if (empty($fieldSortIcon)) {
            $label_labelContent = "<div style=\"flex-grow: 1; white-space: nowrap" . $divLabelStyle . "\">" . $label_fieldName . "</div>";
        } elseif ($this->Ini->Label_sort_pos == 'right_field') {
            $label_labelContent = "<div style=\"display: flex" . $divLabelStyle . "\"><div style=\"display: flex; white-space: nowrap\">" . $label_fieldName . "</div>" . $fieldSortIcon . "</div>";
        } elseif ($this->Ini->Label_sort_pos == 'left_field') {
            $label_labelContent = "<div style=\"display: flex" . $divLabelStyle . "\">" . $fieldSortIcon . "\<div style=\"display: flex; white-space: nowrap\">" . $label_fieldName . "</div></div>";
        } elseif ($this->Ini->Label_sort_pos == 'right_cell') {
            $label_labelContent = "<div style=\"display: flex; justify-content: space-between\"><div style=\"display: flex; flex-grow: 1; white-space: nowrap" . $divLabelStyle . "\">" . $label_fieldName . "</div>" . $fieldSortIcon . "</div>";
        } elseif ($this->Ini->Label_sort_pos == 'left_cell') {
            $label_labelContent = "<div style=\"display: flex; justify-content: space-between\">" . $fieldSortIcon . "<div style=\"display: flex; flex-grow: 1; white-space: nowrap" . $divLabelStyle . "\">" . $label_fieldName . "</div></div>";
        } else {
            $label_labelContent = "<div style=\"flex-grow: 1; white-space: nowrap" . $divLabelStyle . "\">" . $label_fieldName . "</div>";
        }
        $label_labelContent = "<a href=\"javascript:nm_gp_submit2('" . $NM_cmp_class . "')\" class=\"" . $this->css_scGridLabelLink . "\">" . $label_labelContent . "</a>";
        $label_divLabel = "<div style=\"flex-grow: 1\">". $label_labelContent . "</div>";
        // controls
        $label_chart = '';
        $label_fixedColumn = '';
        $label_divControl = '<div style="display: flex; flex-wrap: nowrap; align-items: baseline">' . $label_chart . $label_fixedColumn . '</div>';
        // final label
        $label_final = '<div style="display: flex; flex-direction: row; flex-wrap: nowrap; justify-content: space-between; align-items: baseline">' . $label_divLabel . $label_divControl . '</div>';
    } else {
        $label_final = $label_fieldName;
    }
   $nm_saida->saida("" . $label_final . "\r\n");
   $nm_saida->saida("</TD>\r\n");
   } 
 }
 function NM_label_customer_correo()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['customer_correo'])) ? $this->New_label['customer_correo'] : "Correo";
   $classColFld = "";
   $classColTitle = "";
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao_print'] != 'print' && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao'] != 'pdf') {
     $classColFld = " sc-col-fld sc-col-fld-" . $this->grid_fixed_column_no;
     $classColTitle = " sc-col-title";
   }
   if (!isset($this->NM_cmp_hidden['customer_correo']) || $this->NM_cmp_hidden['customer_correo'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_inherit_bg . ' ' . $this->css_scGridLabelFont . $this->css_sep . $this->css_customer_correo_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_customer_correo_label'] . "\" >\r\n");
    $label_fieldName = nl2br($SC_Label);
    if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao_print'] != 'print' && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao'] != 'pdf') {
        // label & order
        $divLabelStyle = '';
        $NM_cmp_class = "customer_correo";
        if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access)) {
            $NM_cmp_class = "customer.correo";
        }
        elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase)) {
            $NM_cmp_class = "customer.correo";
        }
        $fieldSortRule = $this->scGetColumnOrderRule($NM_cmp_class);
        $fieldSortIcon = $this->scGetColumnOrderIcon($NM_cmp_class, $fieldSortRule);
        if (empty($this->Ini->Label_sort_pos) || $this->Ini->Label_sort_pos == 'right') {
            $this->Ini->Label_sort_pos = 'right_field';
        }
        if (empty($fieldSortIcon)) {
            $label_labelContent = "<div style=\"flex-grow: 1; white-space: nowrap" . $divLabelStyle . "\">" . $label_fieldName . "</div>";
        } elseif ($this->Ini->Label_sort_pos == 'right_field') {
            $label_labelContent = "<div style=\"display: flex" . $divLabelStyle . "\"><div style=\"display: flex; white-space: nowrap\">" . $label_fieldName . "</div>" . $fieldSortIcon . "</div>";
        } elseif ($this->Ini->Label_sort_pos == 'left_field') {
            $label_labelContent = "<div style=\"display: flex" . $divLabelStyle . "\">" . $fieldSortIcon . "\<div style=\"display: flex; white-space: nowrap\">" . $label_fieldName . "</div></div>";
        } elseif ($this->Ini->Label_sort_pos == 'right_cell') {
            $label_labelContent = "<div style=\"display: flex; justify-content: space-between\"><div style=\"display: flex; flex-grow: 1; white-space: nowrap" . $divLabelStyle . "\">" . $label_fieldName . "</div>" . $fieldSortIcon . "</div>";
        } elseif ($this->Ini->Label_sort_pos == 'left_cell') {
            $label_labelContent = "<div style=\"display: flex; justify-content: space-between\">" . $fieldSortIcon . "<div style=\"display: flex; flex-grow: 1; white-space: nowrap" . $divLabelStyle . "\">" . $label_fieldName . "</div></div>";
        } else {
            $label_labelContent = "<div style=\"flex-grow: 1; white-space: nowrap" . $divLabelStyle . "\">" . $label_fieldName . "</div>";
        }
        $label_labelContent = "<a href=\"javascript:nm_gp_submit2('" . $NM_cmp_class . "')\" class=\"" . $this->css_scGridLabelLink . "\">" . $label_labelContent . "</a>";
        $label_divLabel = "<div style=\"flex-grow: 1\">". $label_labelContent . "</div>";
        // controls
        $label_chart = '';
        $label_fixedColumn = '';
        $label_divControl = '<div style="display: flex; flex-wrap: nowrap; align-items: baseline">' . $label_chart . $label_fixedColumn . '</div>';
        // final label
        $label_final = '<div style="display: flex; flex-direction: row; flex-wrap: nowrap; justify-content: space-between; align-items: baseline">' . $label_divLabel . $label_divControl . '</div>';
    } else {
        $label_final = $label_fieldName;
    }
   $nm_saida->saida("" . $label_final . "\r\n");
   $nm_saida->saida("</TD>\r\n");
   } 
 }
 function NM_label_customer_celular()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['customer_celular'])) ? $this->New_label['customer_celular'] : "Celular";
   $classColFld = "";
   $classColTitle = "";
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao_print'] != 'print' && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao'] != 'pdf') {
     $classColFld = " sc-col-fld sc-col-fld-" . $this->grid_fixed_column_no;
     $classColTitle = " sc-col-title";
   }
   if (!isset($this->NM_cmp_hidden['customer_celular']) || $this->NM_cmp_hidden['customer_celular'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_inherit_bg . ' ' . $this->css_scGridLabelFont . $this->css_sep . $this->css_customer_celular_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_customer_celular_label'] . "\" >\r\n");
    $label_fieldName = nl2br($SC_Label);
    if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao_print'] != 'print' && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao'] != 'pdf') {
        // label & order
        $divLabelStyle = '';
        $NM_cmp_class = "customer_celular";
        if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access)) {
            $NM_cmp_class = "customer.celular";
        }
        elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase)) {
            $NM_cmp_class = "customer.celular";
        }
        $fieldSortRule = $this->scGetColumnOrderRule($NM_cmp_class);
        $fieldSortIcon = $this->scGetColumnOrderIcon($NM_cmp_class, $fieldSortRule);
        if (empty($this->Ini->Label_sort_pos) || $this->Ini->Label_sort_pos == 'right') {
            $this->Ini->Label_sort_pos = 'right_field';
        }
        if (empty($fieldSortIcon)) {
            $label_labelContent = "<div style=\"flex-grow: 1; white-space: nowrap" . $divLabelStyle . "\">" . $label_fieldName . "</div>";
        } elseif ($this->Ini->Label_sort_pos == 'right_field') {
            $label_labelContent = "<div style=\"display: flex" . $divLabelStyle . "\"><div style=\"display: flex; white-space: nowrap\">" . $label_fieldName . "</div>" . $fieldSortIcon . "</div>";
        } elseif ($this->Ini->Label_sort_pos == 'left_field') {
            $label_labelContent = "<div style=\"display: flex" . $divLabelStyle . "\">" . $fieldSortIcon . "\<div style=\"display: flex; white-space: nowrap\">" . $label_fieldName . "</div></div>";
        } elseif ($this->Ini->Label_sort_pos == 'right_cell') {
            $label_labelContent = "<div style=\"display: flex; justify-content: space-between\"><div style=\"display: flex; flex-grow: 1; white-space: nowrap" . $divLabelStyle . "\">" . $label_fieldName . "</div>" . $fieldSortIcon . "</div>";
        } elseif ($this->Ini->Label_sort_pos == 'left_cell') {
            $label_labelContent = "<div style=\"display: flex; justify-content: space-between\">" . $fieldSortIcon . "<div style=\"display: flex; flex-grow: 1; white-space: nowrap" . $divLabelStyle . "\">" . $label_fieldName . "</div></div>";
        } else {
            $label_labelContent = "<div style=\"flex-grow: 1; white-space: nowrap" . $divLabelStyle . "\">" . $label_fieldName . "</div>";
        }
        $label_labelContent = "<a href=\"javascript:nm_gp_submit2('" . $NM_cmp_class . "')\" class=\"" . $this->css_scGridLabelLink . "\">" . $label_labelContent . "</a>";
        $label_divLabel = "<div style=\"flex-grow: 1\">". $label_labelContent . "</div>";
        // controls
        $label_chart = '';
        $label_fixedColumn = '';
        $label_divControl = '<div style="display: flex; flex-wrap: nowrap; align-items: baseline">' . $label_chart . $label_fixedColumn . '</div>';
        // final label
        $label_final = '<div style="display: flex; flex-direction: row; flex-wrap: nowrap; justify-content: space-between; align-items: baseline">' . $label_divLabel . $label_divControl . '</div>';
    } else {
        $label_final = $label_fieldName;
    }
   $nm_saida->saida("" . $label_final . "\r\n");
   $nm_saida->saida("</TD>\r\n");
   } 
 }
 function NM_label_customer_direccion()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['customer_direccion'])) ? $this->New_label['customer_direccion'] : "Direccion";
   $classColFld = "";
   $classColTitle = "";
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao_print'] != 'print' && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao'] != 'pdf') {
     $classColFld = " sc-col-fld sc-col-fld-" . $this->grid_fixed_column_no;
     $classColTitle = " sc-col-title";
   }
   if (!isset($this->NM_cmp_hidden['customer_direccion']) || $this->NM_cmp_hidden['customer_direccion'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_inherit_bg . ' ' . $this->css_scGridLabelFont . $this->css_sep . $this->css_customer_direccion_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_customer_direccion_label'] . "\" >\r\n");
    $label_fieldName = nl2br($SC_Label);
    if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao_print'] != 'print' && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao'] != 'pdf') {
        // label & order
        $divLabelStyle = '';
        $NM_cmp_class = "customer_direccion";
        if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access)) {
            $NM_cmp_class = "customer.direccion";
        }
        elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase)) {
            $NM_cmp_class = "customer.direccion";
        }
        $fieldSortRule = $this->scGetColumnOrderRule($NM_cmp_class);
        $fieldSortIcon = $this->scGetColumnOrderIcon($NM_cmp_class, $fieldSortRule);
        if (empty($this->Ini->Label_sort_pos) || $this->Ini->Label_sort_pos == 'right') {
            $this->Ini->Label_sort_pos = 'right_field';
        }
        if (empty($fieldSortIcon)) {
            $label_labelContent = "<div style=\"flex-grow: 1; white-space: nowrap" . $divLabelStyle . "\">" . $label_fieldName . "</div>";
        } elseif ($this->Ini->Label_sort_pos == 'right_field') {
            $label_labelContent = "<div style=\"display: flex" . $divLabelStyle . "\"><div style=\"display: flex; white-space: nowrap\">" . $label_fieldName . "</div>" . $fieldSortIcon . "</div>";
        } elseif ($this->Ini->Label_sort_pos == 'left_field') {
            $label_labelContent = "<div style=\"display: flex" . $divLabelStyle . "\">" . $fieldSortIcon . "\<div style=\"display: flex; white-space: nowrap\">" . $label_fieldName . "</div></div>";
        } elseif ($this->Ini->Label_sort_pos == 'right_cell') {
            $label_labelContent = "<div style=\"display: flex; justify-content: space-between\"><div style=\"display: flex; flex-grow: 1; white-space: nowrap" . $divLabelStyle . "\">" . $label_fieldName . "</div>" . $fieldSortIcon . "</div>";
        } elseif ($this->Ini->Label_sort_pos == 'left_cell') {
            $label_labelContent = "<div style=\"display: flex; justify-content: space-between\">" . $fieldSortIcon . "<div style=\"display: flex; flex-grow: 1; white-space: nowrap" . $divLabelStyle . "\">" . $label_fieldName . "</div></div>";
        } else {
            $label_labelContent = "<div style=\"flex-grow: 1; white-space: nowrap" . $divLabelStyle . "\">" . $label_fieldName . "</div>";
        }
        $label_labelContent = "<a href=\"javascript:nm_gp_submit2('" . $NM_cmp_class . "')\" class=\"" . $this->css_scGridLabelLink . "\">" . $label_labelContent . "</a>";
        $label_divLabel = "<div style=\"flex-grow: 1\">". $label_labelContent . "</div>";
        // controls
        $label_chart = '';
        $label_fixedColumn = '';
        $label_divControl = '<div style="display: flex; flex-wrap: nowrap; align-items: baseline">' . $label_chart . $label_fixedColumn . '</div>';
        // final label
        $label_final = '<div style="display: flex; flex-direction: row; flex-wrap: nowrap; justify-content: space-between; align-items: baseline">' . $label_divLabel . $label_divControl . '</div>';
    } else {
        $label_final = $label_fieldName;
    }
   $nm_saida->saida("" . $label_final . "\r\n");
   $nm_saida->saida("</TD>\r\n");
   } 
 }
 function NM_label_customer_idcustomer()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['customer_idcustomer'])) ? $this->New_label['customer_idcustomer'] : "Idcustomer";
   $classColFld = "";
   $classColTitle = "";
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao_print'] != 'print' && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao'] != 'pdf') {
     $classColFld = " sc-col-fld sc-col-fld-" . $this->grid_fixed_column_no;
     $classColTitle = " sc-col-title";
   }
   if (!isset($this->NM_cmp_hidden['customer_idcustomer']) || $this->NM_cmp_hidden['customer_idcustomer'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_inherit_bg . ' ' . $this->css_scGridLabelFont . $this->css_sep . $this->css_customer_idcustomer_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_customer_idcustomer_label'] . "\" >\r\n");
    $label_fieldName = nl2br($SC_Label);
    if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao_print'] != 'print' && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao'] != 'pdf') {
        // label & order
        $divLabelStyle = '';
        $NM_cmp_class = "customer_idcustomer";
        if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access)) {
            $NM_cmp_class = "customer.idcustomer";
        }
        elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase)) {
            $NM_cmp_class = "customer.idcustomer";
        }
        $fieldSortRule = $this->scGetColumnOrderRule($NM_cmp_class);
        $fieldSortIcon = $this->scGetColumnOrderIcon($NM_cmp_class, $fieldSortRule);
        if (empty($this->Ini->Label_sort_pos) || $this->Ini->Label_sort_pos == 'right') {
            $this->Ini->Label_sort_pos = 'right_field';
        }
        if (empty($fieldSortIcon)) {
            $label_labelContent = "<div style=\"flex-grow: 1; white-space: nowrap" . $divLabelStyle . "\">" . $label_fieldName . "</div>";
        } elseif ($this->Ini->Label_sort_pos == 'right_field') {
            $label_labelContent = "<div style=\"display: flex" . $divLabelStyle . "\"><div style=\"display: flex; white-space: nowrap\">" . $label_fieldName . "</div>" . $fieldSortIcon . "</div>";
        } elseif ($this->Ini->Label_sort_pos == 'left_field') {
            $label_labelContent = "<div style=\"display: flex" . $divLabelStyle . "\">" . $fieldSortIcon . "\<div style=\"display: flex; white-space: nowrap\">" . $label_fieldName . "</div></div>";
        } elseif ($this->Ini->Label_sort_pos == 'right_cell') {
            $label_labelContent = "<div style=\"display: flex; justify-content: space-between\"><div style=\"display: flex; flex-grow: 1; white-space: nowrap" . $divLabelStyle . "\">" . $label_fieldName . "</div>" . $fieldSortIcon . "</div>";
        } elseif ($this->Ini->Label_sort_pos == 'left_cell') {
            $label_labelContent = "<div style=\"display: flex; justify-content: space-between\">" . $fieldSortIcon . "<div style=\"display: flex; flex-grow: 1; white-space: nowrap" . $divLabelStyle . "\">" . $label_fieldName . "</div></div>";
        } else {
            $label_labelContent = "<div style=\"flex-grow: 1; white-space: nowrap" . $divLabelStyle . "\">" . $label_fieldName . "</div>";
        }
        $label_labelContent = "<a href=\"javascript:nm_gp_submit2('" . $NM_cmp_class . "')\" class=\"" . $this->css_scGridLabelLink . "\">" . $label_labelContent . "</a>";
        $label_divLabel = "<div style=\"flex-grow: 1\">". $label_labelContent . "</div>";
        // controls
        $label_chart = '';
        $label_fixedColumn = '';
        $label_divControl = '<div style="display: flex; flex-wrap: nowrap; align-items: baseline">' . $label_chart . $label_fixedColumn . '</div>';
        // final label
        $label_final = '<div style="display: flex; flex-direction: row; flex-wrap: nowrap; justify-content: space-between; align-items: baseline">' . $label_divLabel . $label_divControl . '</div>';
    } else {
        $label_final = $label_fieldName;
    }
   $nm_saida->saida("" . $label_final . "\r\n");
   $nm_saida->saida("</TD>\r\n");
   } 
 }
    function scGetColumnOrderRule($fieldName)
    {
        $sortRule = 'nosort';
        if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['ordem_cmp'] == $fieldName) {
            if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['ordem_label'] == 'desc') {
                $sortRule = 'desc';
            } else {
                $sortRule = 'asc';
            }
        }
        return $sortRule;
    }

    function scGetColumnOrderIcon($fieldName, $sortRule)
    {        if ('desc' == $sortRule) {
            return "<img src=\"" . $this->Ini->path_img_global . "/" . $this->Ini->Label_sort_desc . "\" />";
        } elseif ('asc' == $sortRule) {
            return "<img src=\"" . $this->Ini->path_img_global . "/" . $this->Ini->Label_sort_asc . "\" />";
        } elseif ('' != $this->Ini->Label_sort) {
            return "<img src=\"" . $this->Ini->path_img_global . "/" . $this->Ini->Label_sort . "\" />";
        } else {
            return '';
        }
    }

    function scIsFieldNumeric($fieldName)
    {
        switch ($fieldName) {
            case "view_sales_detail_group_todo_cantidad":
                return true;
            case "view_sales_detail_group_todo_unit_value":
                return true;
            case "valor":
                return true;
            case "sales_factura":
                return true;
            case "view_sales_detail_group_todo_id_product":
                return true;
            case "view_sales_detail_group_todo_entrada":
                return true;
            case "view_sales_detail_group_todo_jugador":
                return true;
            case "view_sales_detail_group_todo_visitante":
                return true;
            case "view_sales_detail_group_todo_tarjeta":
                return true;
            case "view_sales_detail_group_todo_tokens":
                return true;
            case "view_sales_detail_group_todo_minutos":
                return true;
            case "view_sales_detail_group_todo_comida":
                return true;
            case "sales_id_sales":
                return true;
            case "sales_sales_price":
                return true;
            case "sales_sales_discount":
                return true;
            case "sales_total":
                return true;
            case "sales_id_status":
                return true;
            case "sales_idcaja":
                return true;
            case "sales_enviosri":
                return true;
            case "sales_estado":
                return true;
            case "sales_importe_recibido":
                return true;
            case "sales_totalsinimpuestos":
                return true;
            case "sales_totaldescuento":
                return true;
            case "sales_baseimponible":
                return true;
            case "sales_valoriva":
                return true;
            case "sales_importetotal":
                return true;
            case "sales_idpago":
                return true;
            case "sales_totalpago":
                return true;
            case "sales_idturno":
                return true;
            case "sales_imprime":
                return true;
        }
        return false;
    }

    function scGetDefaultFieldOrder($fieldName)
    {
        switch ($fieldName) {
            case "view_sales_detail_group_todo_fecha":
                return 'desc';
            case "view_sales_detail_group_todo_cantidad":
                return 'desc';
            case "view_sales_detail_group_todo_unit_value":
                return 'desc';
            case "valor":
                return 'desc';
            case "sales_factura":
                return 'desc';
            case "view_sales_detail_group_todo_id_product":
                return 'desc';
            case "view_sales_detail_group_todo_fecha_scgb_255":
                return 'desc';
            case "view_sales_detail_group_todo_entrada":
                return 'desc';
            case "view_sales_detail_group_todo_jugador":
                return 'desc';
            case "view_sales_detail_group_todo_visitante":
                return 'desc';
            case "view_sales_detail_group_todo_tarjeta":
                return 'desc';
            case "view_sales_detail_group_todo_tokens":
                return 'desc';
            case "view_sales_detail_group_todo_minutos":
                return 'desc';
            case "view_sales_detail_group_todo_comida":
                return 'desc';
            case "sales_id_sales":
                return 'desc';
            case "sales_sales_price":
                return 'desc';
            case "sales_sales_discount":
                return 'desc';
            case "sales_total":
                return 'desc';
            case "sales_datesales":
                return 'desc';
            case "sales_id_status":
                return 'desc';
            case "sales_idcaja":
                return 'desc';
            case "sales_enviosri":
                return 'desc';
            case "sales_fechaenvio":
                return 'desc';
            case "sales_estado":
                return 'desc';
            case "sales_fechaid":
                return 'desc';
            case "sales_importe_recibido":
                return 'desc';
            case "sales_totalsinimpuestos":
                return 'desc';
            case "sales_totaldescuento":
                return 'desc';
            case "sales_baseimponible":
                return 'desc';
            case "sales_valoriva":
                return 'desc';
            case "sales_importetotal":
                return 'desc';
            case "sales_idpago":
                return 'desc';
            case "sales_totalpago":
                return 'desc';
            case "sales_idturno":
                return 'desc';
            case "sales_imprime":
                return 'desc';
            case "customer_ult_fecha":
                return 'desc';
        }
        return 'asc';
    }

// 
//----- 
 function grid($linhas = 0)
 {
    global 
           $nm_saida;
   $fecha_tr               = "</tr>";
   $this->Ini->qual_linha  = "par";
   $HTTP_REFERER = (isset($_SERVER['HTTP_REFERER'])) ? $_SERVER['HTTP_REFERER'] : ""; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['rows_emb'] = 0;
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['embutida'])
   {
       if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['ini_cor_grid']) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['ini_cor_grid'] == "impar")
       {
           $this->Ini->qual_linha = "impar";
           unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['ini_cor_grid']);
       }
   }
   static $nm_seq_execucoes = 0; 
   static $nm_seq_titulos   = 0; 
   $this->SC_ancora = "";
   $this->Rows_span = 1;
   $nm_seq_execucoes++; 
   $nm_seq_titulos++; 
   $this->nm_prim_linha  = true; 
   $this->Ini->nm_cont_lin = 0; 
   $this->sc_where_orig    = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['where_orig'];
   $this->sc_where_atual   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['where_pesq'];
   $this->sc_where_filtro  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['where_pesq_filtro'];
// 
   $SC_Label = (isset($this->New_label['view_sales_detail_group_todo_fecha'])) ? $this->New_label['view_sales_detail_group_todo_fecha'] : "Fecha";
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['labels']['view_sales_detail_group_todo_fecha'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['view_sales_detail_group_todo_cantidad'])) ? $this->New_label['view_sales_detail_group_todo_cantidad'] : "Cantidad";
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['labels']['view_sales_detail_group_todo_cantidad'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['view_sales_detail_group_todo_unit_value'])) ? $this->New_label['view_sales_detail_group_todo_unit_value'] : "Unit Value";
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['labels']['view_sales_detail_group_todo_unit_value'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['view_sales_detail_group_todo_producto'])) ? $this->New_label['view_sales_detail_group_todo_producto'] : "Producto";
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['labels']['view_sales_detail_group_todo_producto'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['valor'])) ? $this->New_label['valor'] : "Valor";
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['labels']['valor'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['view_sales_detail_group_todo_cuentaventa'])) ? $this->New_label['view_sales_detail_group_todo_cuentaventa'] : "Cuentaventa";
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['labels']['view_sales_detail_group_todo_cuentaventa'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['sales_idcliente'])) ? $this->New_label['sales_idcliente'] : "Idcliente";
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['labels']['sales_idcliente'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['sales_cliente'])) ? $this->New_label['sales_cliente'] : "Cliente";
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['labels']['sales_cliente'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['sales_factura'])) ? $this->New_label['sales_factura'] : "Factura";
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['labels']['sales_factura'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['customer_nombre'])) ? $this->New_label['customer_nombre'] : "Nombre";
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['labels']['customer_nombre'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['customer_correo'])) ? $this->New_label['customer_correo'] : "Correo";
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['labels']['customer_correo'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['customer_celular'])) ? $this->New_label['customer_celular'] : "Celular";
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['labels']['customer_celular'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['customer_direccion'])) ? $this->New_label['customer_direccion'] : "Direccion";
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['labels']['customer_direccion'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['customer_idcustomer'])) ? $this->New_label['customer_idcustomer'] : "Idcustomer";
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['labels']['customer_idcustomer'] = $SC_Label; 
   if (!$this->grid_emb_form && isset($_SESSION['scriptcase']['sc_apl_conf']['grid_detail_sales_todo']['lig_edit']) && $_SESSION['scriptcase']['sc_apl_conf']['grid_detail_sales_todo']['lig_edit'] != '')
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['mostra_edit'] = $_SESSION['scriptcase']['sc_apl_conf']['grid_detail_sales_todo']['lig_edit'];
   }
   if (!empty($this->nm_grid_sem_reg))
   {
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['embutida'])
       {
           $this->Lin_impressas++;
           if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['embutida_grid'])
           {
               if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['cols_emb']) || empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['cols_emb']))
               {
                   $cont_col = 0;
                   foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['field_order'] as $cada_field)
                   {
                       $cont_col++;
                   }
                   $NM_span_sem_reg = $cont_col - 1;
               }
               else
               {
                   $NM_span_sem_reg  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['cols_emb'];
               }
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['rows_emb']++;
               $nm_saida->saida("  <TR> <TD class=\"" . $this->css_scGridTabelaTd . " " . "\" colspan = \"$NM_span_sem_reg\" align=\"center\" style=\"vertical-align: top;font-family:" . $this->Ini->texto_fonte_tipo_impar . ";font-size:12px;\">\r\n");
               $nm_saida->saida("     " . $this->nm_grid_sem_reg . "</TD> </TR>\r\n");
               $nm_saida->saida("##NM@@\r\n");
               $this->rs_grid->Close();
           }
           else
           {
               $nm_saida->saida("<table id=\"apl_grid_detail_sales_todo#?#$nm_seq_execucoes\" width=\"100%\" style=\"padding: 0px; border-spacing: 0px; border-width: 0px; vertical-align: top;\">\r\n");
               $nm_saida->saida("  <tr><td class=\"" . $this->css_scGridTabelaTd . " " . "\" style=\"font-family:" . $this->Ini->texto_fonte_tipo_impar . ";font-size:12px;\"><table style=\"padding: 0px; border-spacing: 0px; border-width: 0px; vertical-align: top;\" width=\"100%\">\r\n");
               $nm_id_aplicacao = "";
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['cab_embutida'] != "S")
               {
                   $this->label_grid($linhas);
               }
               $this->NM_calc_span();
               $nm_saida->saida("  <tr><td class=\"" . $this->css_scGridFieldOdd . "\"  style=\"padding: 0px; font-family:" . $this->Ini->texto_fonte_tipo_impar . ";font-size:12px;\" colspan = \"" . $this->NM_colspan . "\" align=\"center\">\r\n");
               $nm_saida->saida("     " . $this->nm_grid_sem_reg . "\r\n");
               $nm_saida->saida("  </td></tr>\r\n");
               $nm_saida->saida("  </table></td></tr></table>\r\n");
               $this->Lin_final = $this->rs_grid->EOF;
               if ($this->Lin_final)
               {
                   $this->rs_grid->Close();
               }
           }
       }
       else
       {
           $nm_saida->saida(" <TR> \r\n");
           $nm_saida->saida("  <td " . $this->Grid_body . " class=\"" . $this->css_scGridTabelaTd . " " . $this->css_scGridFieldOdd . "\" align=\"center\" style=\"vertical-align: top;font-family:" . $this->Ini->texto_fonte_tipo_impar . ";font-size:12px;\">\r\n");
           if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['force_toolbar']))
           { 
               $this->force_toolbar = true;
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['force_toolbar'] = true;
           } 
           if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['ajax_nav'])
           { 
               $_SESSION['scriptcase']['saida_html'] = "";
           } 
           $nm_saida->saida("  " . $this->nm_grid_sem_reg . "\r\n");
           if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['ajax_nav'])
           { 
               $this->Ini->Arr_result['setValue'][] = array('field' => 'sc_grid_body', 'value' => NM_charset_to_utf8($_SESSION['scriptcase']['saida_html']));
               $_SESSION['scriptcase']['saida_html'] = "";
           } 
           $nm_saida->saida("  </td></tr>\r\n");
       }
       return;
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['embutida'])
   { 
       $nm_saida->saida("<table id=\"apl_grid_detail_sales_todo#?#$nm_seq_execucoes\" width=\"100%\" style=\"padding: 0px; border-spacing: 0px; border-width: 0px; vertical-align: top;\">\r\n");
       $nm_saida->saida(" <TR> \r\n");
       $nm_id_aplicacao = "";
   } 
   else 
   { 
if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['proc_pdf'])
{
}
else
{
       $nm_saida->saida("    <TR> \r\n");
}
       $nm_id_aplicacao = " id=\"apl_grid_detail_sales_todo#?#1\"";
   } 
   $TD_padding = (!$this->Print_All && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao'] == "pdf") ? "padding: 0px !important;" : "";
if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['proc_pdf'] || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['proc_pdf_vert'])
{
}
else
{
   $nm_saida->saida("  <TD " . $this->Grid_body . " class=\"" . $this->css_scGridTabelaTd . "\" style=\"vertical-align: top;text-align: center;" . $TD_padding . "\" width=\"100%\">\r\n");
}
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['ajax_nav'])
   { 
       $_SESSION['scriptcase']['saida_html'] = "";
   } 
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opc_psq'])
   { 
       $nm_saida->saida("        <div id=\"div_FBtn_Run\" style=\"display: none\"> \r\n");
       $nm_saida->saida("        <form name=\"Fpesq\" method=post>\r\n");
       $nm_saida->saida("         <input type=hidden name=\"nm_ret_psq\"> \r\n");
       $nm_saida->saida("        </div> \r\n");
   } 
if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['proc_pdf']) { 
    if ($this->pdf_all_cab != "S") {
        $this->cabecalho();
    }
    $nm_saida->saida("              <thead>\r\n");
    if ($this->pdf_all_cab == "S") {
        $this->cabecalho();
    }
    if ($this->pdf_all_label == "S") {
        $this->label_grid();
    }
}
 if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['proc_pdf']) { 
 }else { 
   $nm_saida->saida("   <TABLE class=\"" . $this->css_scGridTabela . "\" id=\"sc-ui-grid-body-99e11209\" align=\"center\" " . $nm_id_aplicacao . " width=\"100%\">\r\n");
 }
 if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['proc_pdf'] || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['proc_pdf_vert']) { 
    $nm_saida->saida("</thead>\r\n");
 }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['proc_pdf'] && $this->pdf_all_label != "S" && $this->pdf_label_group != "S") 
   { 
      $this->label_grid($linhas);
   } 
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['embutida_grid'])
   { 
       $_SESSION['scriptcase']['saida_html'] = "";
   } 
// 
   $nm_quant_linhas = 0 ;
   $this->nm_inicio_pag = 0;
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao'] == "pdf")
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['final'] = 0;
   } 
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['SC_Ind_Groupby'] == "_NM_SC_")
   {
       $NM_prim_qb = true;
   }
   $this->nmgp_prim_pag_pdf = true;
   $this->Break_pag_pdf = array();
   $this->Break_pag_prt = array();
   $this->Break_pag_pdf['sc_free_group_by']['view_sales_detail_group_todo_fecha'] = "N";
   $this->Break_pag_prt['sc_free_group_by']['view_sales_detail_group_todo_fecha'] = "N";
   $this->Break_pag_pdf['sc_free_group_by']['view_sales_detail_group_todo_fecha_scgb_255'] = "N";
   $this->Break_pag_prt['sc_free_group_by']['view_sales_detail_group_todo_fecha_scgb_255'] = "N";
   $this->Break_pag_pdf['sc_free_group_by']['view_sales_detail_group_todo_producto'] = "N";
   $this->Break_pag_prt['sc_free_group_by']['view_sales_detail_group_todo_producto'] = "N";
   $this->Break_pag_pdf['sc_free_group_by']['sales_cliente'] = "N";
   $this->Break_pag_prt['sc_free_group_by']['sales_cliente'] = "N";
   $this->Break_pag_pdf['inicial']['view_sales_detail_group_todo_fecha'] = "N";
   $this->Break_pag_prt['inicial']['view_sales_detail_group_todo_fecha'] = "N";
   $this->Break_pag_pdf['inicial']['view_sales_detail_group_todo_cuentaventa'] = "N";
   $this->Break_pag_prt['inicial']['view_sales_detail_group_todo_cuentaventa'] = "N";
   $this->Break_pag_pdf['inicial']['view_sales_detail_group_todo_producto'] = "N";
   $this->Break_pag_prt['inicial']['view_sales_detail_group_todo_producto'] = "N";
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['Config_Page_break_PDF'] = "S";
   if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['Page_break_PDF']))
   {
       if (isset($this->Break_pag_pdf[$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['SC_Ind_Groupby']]))
       {
           if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['SC_Ind_Groupby'] == "sc_free_group_by")
           {
               foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['SC_Gb_Free_cmp'] as $Cmp_gb => $resto)
               {
                   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['Page_break_PDF'][$Cmp_gb] = $this->Break_pag_pdf['sc_free_group_by'][$Cmp_gb];
               }
           }
           else
           {
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['Page_break_PDF'] = $this->Break_pag_pdf[$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['SC_Ind_Groupby']];
           }
       }
       else
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['Page_break_PDF'] = array();
       }
   }
   $this->SC_top       = array();
   $this->SC_bot       = array();
   $this->SC_bot[]     = "view_sales_detail_group_todo_fecha"; 
   $this->SC_top[]     = "view_sales_detail_group_todo_fecha"; 
   $this->SC_bot[]     = "view_sales_detail_group_todo_fecha_scgb_255"; 
   $this->SC_top[]     = "view_sales_detail_group_todo_fecha_scgb_255"; 
   $this->SC_bot[]     = "view_sales_detail_group_todo_producto"; 
   $this->SC_top[]     = "view_sales_detail_group_todo_producto"; 
   $this->SC_bot[]     = "sales_cliente"; 
   $this->SC_top[]     = "sales_cliente"; 
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['SC_Ind_Groupby'] == "sc_free_group_by") 
   {
       $Nivel_gb = 1;
       $this->Tab_Nv_tree = array();
       $this->Nivel_gbBot = count($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['SC_Gb_Free_cmp']);
       $this->Ult_qb_free = $this->Nivel_gbBot;
       foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['SC_Gb_Free_cmp'] as $cmp => $sql)
       {
           if (!isset($this->Prim_cmp_gb))
           {
               $this->Prim_cmp_gb = $cmp;
           }
           $this->Tab_Nv_tree[$cmp] = $Nivel_gb;
           $Nivel_gb++;
           if (in_array($cmp, $this->SC_top))
           {
               $tmp = "quebra_" . $cmp . "_sc_free_group_by_top";
               $this->$tmp($cmp);
           }
       }
       $this->nmgp_prim_pag_pdf = false;
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['SC_Ind_Groupby'] == "inicial") 
   {
       if (isset($this->view_sales_detail_group_todo_fecha))
       {
           $this->quebra_view_sales_detail_group_todo_fecha_inicial_top(); 
       }
       if (isset($this->view_sales_detail_group_todo_cuentaventa))
       {
           $this->quebra_view_sales_detail_group_todo_cuentaventa_inicial_top(); 
       }
       if (isset($this->view_sales_detail_group_todo_producto))
       {
           $this->quebra_view_sales_detail_group_todo_producto_inicial_top(); 
       }
       $this->nmgp_prim_pag_pdf = false;
   }
   $this->Ini->cor_link_dados = $this->css_scGridFieldEvenLink;
   $this->NM_flag_antigo = FALSE;
   $nm_prog_barr = 0;
   $PB_tot       = "/" . $this->count_ger;;
   while (!$this->rs_grid->EOF && $nm_quant_linhas < $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['qt_reg_grid'] && ($linhas == 0 || $linhas > $this->Lin_impressas)) 
   {  
          $this->Rows_span = 1;
          $this->NM_field_style = array();
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['doc_word'] && !$this->Ini->sc_export_ajax)
          {
              $nm_prog_barr++;
              $Mens_bar = $this->Ini->Nm_lang['lang_othr_prcs'];
              if ($_SESSION['scriptcase']['charset'] != "UTF-8") {
                  $Mens_bar = sc_convert_encoding($Mens_bar, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $this->pb->setProgressbarMessage($Mens_bar . ": " . $nm_prog_barr . $PB_tot);
              $this->pb->addSteps(1);
          }
          if ($this->Ini->Proc_print && $this->Ini->Export_html_zip  && !$this->Ini->sc_export_ajax)
          {
              $nm_prog_barr++;
              $Mens_bar = $this->Ini->Nm_lang['lang_othr_prcs'];
              if ($_SESSION['scriptcase']['charset'] != "UTF-8") {
                  $Mens_bar = sc_convert_encoding($Mens_bar, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $this->pb->setProgressbarMessage($Mens_bar . ": " . $nm_prog_barr . $PB_tot);
              $this->pb->addSteps(1);
          }
          //---------- Gauge ----------
          if (!$this->Ini->sc_export_ajax && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao'] == "pdf" && -1 < $this->progress_grid)
          {
              $this->progress_now++;
              if (0 == $this->progress_lim_now)
              {
               $lang_protect = $this->Ini->Nm_lang['lang_pdff_rows'];
               if (!NM_is_utf8($lang_protect))
               {
                   $lang_protect = sc_convert_encoding($lang_protect, "UTF-8", $_SESSION['scriptcase']['charset']);
               }
                  grid_detail_sales_todo_pdf_progress_call($this->progress_tot . "_#NM#_" . $this->progress_now . "_#NM#_" . $lang_protect . " " . $this->progress_now . "...\n", $this->Ini->Nm_lang);
                  fwrite($this->progress_fp, $this->progress_now . "_#NM#_" . $lang_protect . " " . $this->progress_now . "...\n");
              }
              $this->progress_lim_now++;
              if ($this->progress_lim_tot == $this->progress_lim_now)
              {
                  $this->progress_lim_now = 0;
              }
          }
          $this->Lin_impressas++;
          $this->view_sales_detail_group_todo_fecha = $this->rs_grid->fields[0] ;  
          $this->view_sales_detail_group_todo_cantidad = $this->rs_grid->fields[1] ;  
          $this->view_sales_detail_group_todo_cantidad =  str_replace(",", ".", $this->view_sales_detail_group_todo_cantidad);
          $this->view_sales_detail_group_todo_cantidad = (string)$this->view_sales_detail_group_todo_cantidad;
          $this->view_sales_detail_group_todo_unit_value = $this->rs_grid->fields[2] ;  
          $this->view_sales_detail_group_todo_unit_value =  str_replace(",", ".", $this->view_sales_detail_group_todo_unit_value);
          $this->view_sales_detail_group_todo_unit_value = (string)$this->view_sales_detail_group_todo_unit_value;
          $this->view_sales_detail_group_todo_producto = $this->rs_grid->fields[3] ;  
          $this->valor = $this->rs_grid->fields[4] ;  
          $this->valor =  str_replace(",", ".", $this->valor);
          $this->valor = (string)$this->valor;
          $this->view_sales_detail_group_todo_cuentaventa = $this->rs_grid->fields[5] ;  
          $this->sales_idcliente = $this->rs_grid->fields[6] ;  
          $this->sales_cliente = $this->rs_grid->fields[7] ;  
          $this->sales_factura = $this->rs_grid->fields[8] ;  
          $this->sales_factura = (string)$this->sales_factura;
          $this->customer_nombre = $this->rs_grid->fields[9] ;  
          $this->customer_correo = $this->rs_grid->fields[10] ;  
          $this->customer_celular = $this->rs_grid->fields[11] ;  
          $this->customer_direccion = $this->rs_grid->fields[12] ;  
          $this->customer_idcustomer = $this->rs_grid->fields[13] ;  
          $this->view_sales_detail_group_todo_fecha_scgb_255 = $this->view_sales_detail_group_todo_fecha;
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['SC_Gb_Free_orig']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['SC_Gb_Free_orig'] as $Cmp_clone => $Cmp_orig)
              {
                  $this->$Cmp_clone = $this->$Cmp_orig;
              }
          }
          if (!isset($this->view_sales_detail_group_todo_fecha)) { $this->view_sales_detail_group_todo_fecha = ""; }
          if (!isset($this->view_sales_detail_group_todo_fecha_scgb_255)) { $this->view_sales_detail_group_todo_fecha_scgb_255 = ""; }
          if (!isset($this->view_sales_detail_group_todo_producto)) { $this->view_sales_detail_group_todo_producto = ""; }
          if (!isset($this->sales_cliente)) { $this->sales_cliente = ""; }
          if (!isset($this->view_sales_detail_group_todo_cuentaventa)) { $this->view_sales_detail_group_todo_cuentaventa = ""; }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['SC_Ind_Groupby'] == "sc_free_group_by")
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['SC_Gb_Free_cmp'] as $cmp_gb => $resto)
              {
                   $Cmp_orig = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['SC_Gb_Free_orig'][$cmp_gb])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['SC_Gb_Free_orig'][$cmp_gb] : $cmp_gb;
                   if ($Cmp_orig == "view_sales_detail_group_todo_fecha")
                   {
                       $Str_arg_sum = "arg_sum_" . $cmp_gb;
                       $Format_tst = $this->Ini->Get_Gb_date_format('sc_free_group_by', $cmp_gb);
                       $TP_Time = (in_array('view_sales_detail_group_todo_fecha', $this->Ini->Cmp_Sql_Time)) ? "0000-00-00 " : "";
                       $this->$Str_arg_sum = $this->Ini->Get_date_arg_sum($TP_Time . $this->view_sales_detail_group_todo_fecha, $Format_tst, "view_sales_detail_group_todo.fecha");
                   }
               }
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['SC_Ind_Groupby'] == "inicial")
          {
               $Format_tst = $this->Ini->Get_Gb_date_format('inicial', 'view_sales_detail_group_todo_fecha');
               $TP_Time = (in_array('view_sales_detail_group_todo_fecha', $this->Ini->Cmp_Sql_Time)) ? "0000-00-00 " : "";
               $this->arg_sum_view_sales_detail_group_todo_fecha = $this->Ini->Get_date_arg_sum($TP_Time . $this->view_sales_detail_group_todo_fecha, $Format_tst, "view_sales_detail_group_todo.fecha");
               if (empty($this->view_sales_detail_group_todo_fecha))
               {
                   $this->Tot->Sc_groupby_view_sales_detail_group_todo_fecha = "view_sales_detail_group_todo.fecha";
               }
               else
               {
                   $this->Tot->Sc_groupby_view_sales_detail_group_todo_fecha = $this->Ini->Get_sql_date_groupby("view_sales_detail_group_todo.fecha", $Format_tst);
               }
          }
          if ($this->view_sales_detail_group_todo_fecha == "")
          {
              $this->arg_sum_view_sales_detail_group_todo_fecha = " is null";
          }
          elseif ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['SC_Ind_Groupby'] == "_NM_SC_")
          {
              $this->arg_sum_view_sales_detail_group_todo_fecha = " = " . $this->Db->qstr($this->view_sales_detail_group_todo_fecha);
          }
          $this->arg_sum_view_sales_detail_group_todo_producto = " = " . $this->Db->qstr($this->view_sales_detail_group_todo_producto);
          $this->arg_sum_view_sales_detail_group_todo_cuentaventa = " = " . $this->Db->qstr($this->view_sales_detail_group_todo_cuentaventa);
          $this->arg_sum_sales_cliente = " = " . $this->Db->qstr($this->sales_cliente);
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['SC_Ind_Groupby'] == "sc_free_group_by")
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['SC_Gb_Free_cmp'] as $cmp_gb => $resto)
              {
                   $Cmp_orig = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['SC_Gb_Free_orig'][$cmp_gb])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['SC_Gb_Free_orig'][$cmp_gb] : $cmp_gb;
                   if ($Cmp_orig == "view_sales_detail_group_todo_fecha_scgb_255")
                   {
                       $Str_arg_sum = "arg_sum_" . $cmp_gb;
                       $Format_tst = $this->Ini->Get_Gb_date_format('sc_free_group_by', $cmp_gb);
                       $TP_Time = (in_array('view_sales_detail_group_todo_fecha_scgb_255', $this->Ini->Cmp_Sql_Time)) ? "0000-00-00 " : "";
                       $this->$Str_arg_sum = $this->Ini->Get_date_arg_sum($TP_Time . $this->view_sales_detail_group_todo_fecha_scgb_255, $Format_tst, "view_sales_detail_group_todo.fecha");
                   }
               }
          }
          if ($this->view_sales_detail_group_todo_fecha_scgb_255 == "")
          {
              $this->arg_sum_view_sales_detail_group_todo_fecha_scgb_255 = " is null";
          }
          elseif ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['SC_Ind_Groupby'] == "_NM_SC_")
          {
              $this->arg_sum_view_sales_detail_group_todo_fecha_scgb_255 = " = " . $this->Db->qstr($this->view_sales_detail_group_todo_fecha_scgb_255);
          }
          $this->SC_seq_page++; 
          $this->SC_seq_register = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['final'] + 1; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['rows_emb']++;
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['SC_Ind_Groupby'] == "sc_free_group_by") 
          {  
              $SC_arg_Gby = array();
              $SC_arg_Sql = array();
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['SC_Gb_Free_cmp'] as $cmp => $sql)
              {
                  $Cmp_orig   = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['SC_Gb_Free_orig'][$cmp])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['SC_Gb_Free_orig'][$cmp] : $cmp;
                  $Format_tst = $this->Ini->Get_Gb_date_format('sc_free_group_by', $cmp);
                  $TP_Time = (in_array($Cmp_orig, $this->Ini->Cmp_Sql_Time)) ? "0000-00-00 " : "";
                  $SC_arg_Gby[$cmp] = $this->Ini->Get_arg_groupby($TP_Time . $this->$Cmp_orig, $Format_tst); 
              }
              $SC_lst_Gby = array();
              $gb_ok      = false;
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['SC_Gb_Free_cmp'] as $cmp => $sql)
              {
                  $Format_tst = $this->Ini->Get_Gb_date_format('sc_free_group_by', $cmp);
                  $SC_arg_Sql[$cmp] = $sql;
                  $Fun_GB  = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['SC_Gb_Free_orig'][$cmp])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['SC_Gb_Free_orig'][$cmp] : $cmp;
                  if (!empty($Format_tst))
                  {
                      $temp = $this->$cmp;
                      if (!empty($temp))
                      {
                          $SC_arg_Sql[$cmp] = $this->Ini->Get_sql_date_groupby($sql, $Format_tst);
                      }
                  }
                  $temp = $cmp . "_Old";
                  if ($SC_arg_Gby[$cmp] != $this->$temp || $gb_ok)
                  {
                      $SC_lst_Gby[] = $cmp;
                      $gb_ok = true;
                  }
              }
              $this->Nivel_gbBot = count($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['SC_Gb_Free_cmp']);
              krsort ($SC_lst_Gby);
              foreach ($SC_lst_Gby as $Ind => $cmp)
              {
                  if (in_array($cmp, $this->SC_bot))
                  {
                      $tmp = "quebra_" . $cmp . "_sc_free_group_by_bot";
                      $this->$tmp($cmp);
                      $this->Nivel_gbBot--;
                  }
                  $sql_where = "";
                  $cmp_qb     = $this->$cmp;
                  foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['SC_Gb_Free_cmp'] as $Col_Gb => $Sql)
                  {
                      $tmp        = "arg_sum_" . $Col_Gb;
                      $sql_where .= (!empty($sql_where)) ? " and " : "";
                      $sql_where .= $SC_arg_Sql[$Col_Gb] . $this->$tmp;
                      if ($Col_Gb == $cmp)
                      {
                          break;
                      }
                  }
                  $tmp  = "quebra_" . $cmp . "_sc_free_group_by";
                  $this->$tmp($cmp_qb, $sql_where, $cmp);
              }
              if (!empty($SC_lst_Gby))
              {
                  $cmp = $SC_lst_Gby[0];
                  if ($this->Print_All && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['doc_word'] && $this->Break_pag_prt[$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['SC_Ind_Groupby']][$cmp] == "S")
                  {
                      $this->nm_quebra_pagina("pagina"); 
                  }
                  elseif (!$this->Print_All && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao'] == "pdf" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['Page_break_PDF'][$cmp] == "S")
                  {
                      $this->nm_quebra_pagina("pagina"); 
                  }
              }
              $this->Nivel_gbBot = count($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['SC_Gb_Free_cmp']);
              ksort ($SC_lst_Gby);
              foreach ($SC_lst_Gby as $Ind => $cmp)
              {
                  if (in_array($cmp, $this->SC_top))
                  {
                      $tmp = "quebra_" . $cmp . "_sc_free_group_by_top";
                      $this->$tmp($cmp);
                  }
              }
              if (!empty($SC_lst_Gby))
              {
                  $nm_houve_quebra = "S";
                  foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['SC_Gb_Free_cmp'] as $cmp => $sql)
                  {
                      $Cmp_orig   = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['SC_Gb_Free_orig'][$cmp])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['SC_Gb_Free_orig'][$cmp] : $cmp;
                      $Format_tst = $this->Ini->Get_Gb_date_format('sc_free_group_by', $cmp);
                      $Cmp_Old   = $cmp . '_Old';
                      $TP_Time = (in_array($Cmp_orig, $this->Ini->Cmp_Sql_Time)) ? "0000-00-00 " : "";
                      $this->$Cmp_Old = $this->Ini->Get_arg_groupby($TP_Time . $this->$Cmp_orig, $Format_tst); 
                  }
              }
          }  
          $Format_tst = $this->Ini->Get_Gb_date_format('inicial', 'view_sales_detail_group_todo_fecha');
          $TP_Time = (in_array('view_sales_detail_group_todo_fecha', $this->Ini->Cmp_Sql_Time)) ? "0000-00-00 " : "";
          $Cmp_tst    = $this->Ini->Get_arg_groupby($TP_Time . $this->view_sales_detail_group_todo_fecha, $Format_tst);
          if ($Cmp_tst != $this->view_sales_detail_group_todo_fecha_Old && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['SC_Ind_Groupby'] == "inicial") 
          {  
              if (isset($this->view_sales_detail_group_todo_producto_Old))
              {
                 $this->quebra_view_sales_detail_group_todo_producto_inicial_bot() ; 
              }
              if (isset($this->view_sales_detail_group_todo_cuentaventa_Old))
              {
                 $this->quebra_view_sales_detail_group_todo_cuentaventa_inicial_bot() ; 
              }
              if (isset($this->view_sales_detail_group_todo_fecha_Old))
              {
                 $this->quebra_view_sales_detail_group_todo_fecha_inicial_bot() ; 
              }
              if ($this->Print_All && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['doc_word'] && $this->Break_pag_prt[$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['SC_Ind_Groupby']]['view_sales_detail_group_todo_fecha'] == "S")
              {
                  $this->nm_quebra_pagina("pagina"); 
              }
              elseif (!$this->Print_All && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao'] == "pdf" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['Page_break_PDF']['view_sales_detail_group_todo_fecha'] == "S")
              {
                  $this->nm_quebra_pagina("pagina"); 
              }
              $this->view_sales_detail_group_todo_producto_Old = $this->view_sales_detail_group_todo_producto ; 
              $this->quebra_view_sales_detail_group_todo_producto_inicial($this->view_sales_detail_group_todo_fecha, $this->view_sales_detail_group_todo_cuentaventa, $this->view_sales_detail_group_todo_producto) ; 
              $this->view_sales_detail_group_todo_cuentaventa_Old = $this->view_sales_detail_group_todo_cuentaventa ; 
              $this->quebra_view_sales_detail_group_todo_cuentaventa_inicial($this->view_sales_detail_group_todo_fecha, $this->view_sales_detail_group_todo_cuentaventa) ; 
              $Format_tst = $this->Ini->Get_Gb_date_format('inicial', 'view_sales_detail_group_todo_fecha');
              $TP_Time = (in_array('view_sales_detail_group_todo_fecha', $this->Ini->Cmp_Sql_Time)) ? "0000-00-00 " : "";
              $this->view_sales_detail_group_todo_fecha_Old = $this->Ini->Get_arg_groupby($TP_Time . $this->view_sales_detail_group_todo_fecha, $Format_tst);
              $this->quebra_view_sales_detail_group_todo_fecha_inicial($this->view_sales_detail_group_todo_fecha) ; 
              if (isset($this->view_sales_detail_group_todo_fecha_Old))
              {
                 $this->quebra_view_sales_detail_group_todo_fecha_inicial_top() ; 
              }
              if (isset($this->view_sales_detail_group_todo_cuentaventa_Old))
              {
                 $this->quebra_view_sales_detail_group_todo_cuentaventa_inicial_top() ; 
              }
              if (isset($this->view_sales_detail_group_todo_producto_Old))
              {
                 $this->quebra_view_sales_detail_group_todo_producto_inicial_top() ; 
              }
              $nm_houve_quebra = "S";
          } 
          if ($this->view_sales_detail_group_todo_cuentaventa !== $this->view_sales_detail_group_todo_cuentaventa_Old && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['SC_Ind_Groupby'] == "inicial") 
          {  
              if (isset($this->view_sales_detail_group_todo_producto_Old))
              {
                 $this->quebra_view_sales_detail_group_todo_producto_inicial_bot() ; 
              }
              if (isset($this->view_sales_detail_group_todo_cuentaventa_Old))
              {
                 $this->quebra_view_sales_detail_group_todo_cuentaventa_inicial_bot() ; 
              }
              if ($this->Print_All && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['doc_word'] && $this->Break_pag_prt[$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['SC_Ind_Groupby']]['view_sales_detail_group_todo_cuentaventa'] == "S")
              {
                  $this->nm_quebra_pagina("pagina"); 
              }
              elseif (!$this->Print_All && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao'] == "pdf" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['Page_break_PDF']['view_sales_detail_group_todo_cuentaventa'] == "S")
              {
                  $this->nm_quebra_pagina("pagina"); 
              }
              $this->view_sales_detail_group_todo_producto_Old = $this->view_sales_detail_group_todo_producto ; 
              $this->quebra_view_sales_detail_group_todo_producto_inicial($this->view_sales_detail_group_todo_fecha, $this->view_sales_detail_group_todo_cuentaventa, $this->view_sales_detail_group_todo_producto) ; 
              $this->view_sales_detail_group_todo_cuentaventa_Old = $this->view_sales_detail_group_todo_cuentaventa ; 
              $this->quebra_view_sales_detail_group_todo_cuentaventa_inicial($this->view_sales_detail_group_todo_fecha, $this->view_sales_detail_group_todo_cuentaventa) ; 
              if (isset($this->view_sales_detail_group_todo_cuentaventa_Old))
              {
                 $this->quebra_view_sales_detail_group_todo_cuentaventa_inicial_top() ; 
              }
              if (isset($this->view_sales_detail_group_todo_producto_Old))
              {
                 $this->quebra_view_sales_detail_group_todo_producto_inicial_top() ; 
              }
              $nm_houve_quebra = "S";
          } 
          if ($this->view_sales_detail_group_todo_producto !== $this->view_sales_detail_group_todo_producto_Old && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['SC_Ind_Groupby'] == "inicial") 
          {  
              if (isset($this->view_sales_detail_group_todo_producto_Old))
              {
                 $this->quebra_view_sales_detail_group_todo_producto_inicial_bot() ; 
              }
              if ($this->Print_All && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['doc_word'] && $this->Break_pag_prt[$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['SC_Ind_Groupby']]['view_sales_detail_group_todo_producto'] == "S")
              {
                  $this->nm_quebra_pagina("pagina"); 
              }
              elseif (!$this->Print_All && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao'] == "pdf" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['Page_break_PDF']['view_sales_detail_group_todo_producto'] == "S")
              {
                  $this->nm_quebra_pagina("pagina"); 
              }
              $this->view_sales_detail_group_todo_producto_Old = $this->view_sales_detail_group_todo_producto ; 
              $this->quebra_view_sales_detail_group_todo_producto_inicial($this->view_sales_detail_group_todo_fecha, $this->view_sales_detail_group_todo_cuentaventa, $this->view_sales_detail_group_todo_producto) ; 
              if (isset($this->view_sales_detail_group_todo_producto_Old))
              {
                 $this->quebra_view_sales_detail_group_todo_producto_inicial_top() ; 
              }
              $nm_houve_quebra = "S";
          } 
          $this->sc_proc_grid = true;
          if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['proc_pdf'])
          {
              if ($nm_houve_quebra == "S" || $this->nm_inicio_pag == 0)
              { 
                  if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['embutida_grid']) {
                      $this->label_grid($linhas);
                  } 
                  $nm_houve_quebra = "N";
              } 
          } 
          else
          {
              if ($this->pdf_label_group != "S" && $this->pdf_all_label != "S")
              {
                  if ($this->nm_inicio_pag == 0 && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['embutida_grid'])
                  {
                      $nm_houve_quebra = "N";
                  } 
              } 
              elseif (($nm_houve_quebra == "S" || ($this->nm_inicio_pag == 0)) && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['embutida_grid'])
              { 
                 if ($this->pdf_all_label == "S" && ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['SC_Ind_Groupby'] == "_NM_SC_")) 
                 { } 
                 elseif ($this->pdf_label_group == "S") 
                 {
                     if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['embutida_grid']) {
                         $this->label_grid($linhas);
                     } 
                 } 
                  $nm_houve_quebra = "N";
              } 
          } 
          $this->nm_inicio_pag++;
          if (!$this->NM_flag_antigo)
          {
             $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['final']++ ; 
          }
          $seq_det =  $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['final']; 
          $this->Ini->cor_link_dados = ($this->Ini->cor_link_dados == $this->css_scGridFieldOddLink) ? $this->css_scGridFieldEvenLink : $this->css_scGridFieldOddLink; 
          $this->Ini->qual_linha   = ($this->Ini->qual_linha == "par") ? "impar" : "par";
          if ("impar" == $this->Ini->qual_linha)
          {
              $this->css_line_back = $this->css_scGridFieldOdd;
              $this->css_line_fonf = $this->css_scGridFieldOddFont;
          }
          else
          {
              $this->css_line_back = $this->css_scGridFieldEven;
              $this->css_line_fonf = $this->css_scGridFieldEvenFont;
          }
          $NM_destaque = " onmouseover=\"over_tr(this, '" . $this->css_line_back . "');\" onmouseout=\"out_tr(this, '" . $this->css_line_back . "');\" onclick=\"click_tr(this, '" . $this->css_line_back . "');\"";
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao'] == "pdf" || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['embutida_grid'])
          {
             $NM_destaque ="";
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opc_psq'])
          {
              $temp = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['dado_psq_ret'];
              eval("\$teste = \$this->$temp;");
              if ($temp == "view_sales_detail_group_todo_fecha")
              {
                  $conteudo_x = $teste;
                  nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD");
                  if (is_numeric($conteudo_x) && $conteudo_x > 0) 
                  { 
                      $this->nm_data->SetaData($teste, "YYYY-MM-DD");
                      $teste = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DT", "ddmmaaaa"));
                  } 
              }
              if ($temp == "view_sales_detail_group_todo_fecha_scgb_255")
              {
                  $conteudo_x = $teste;
                  nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD");
                  if (is_numeric($conteudo_x) && $conteudo_x > 0) 
                  { 
                      $this->nm_data->SetaData($teste, "YYYY-MM-DD");
                      $teste = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DT", "ddmmaaaa"));
                  } 
              }
          }
          $this->SC_ancora = $this->SC_seq_page;
          $nm_saida->saida("    <TR  class=\"" . $this->css_line_back . "\"  style=\"page-break-inside: avoid;\"" . $NM_destaque . " id=\"SC_ancor" . $this->SC_ancora . "\">\r\n");
 if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['embutida_grid']){ 
          $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_scGridBlockBg . "\" style=\"width: " . $this->width_tabula_quebra . "; display:" . $this->width_tabula_display . ";\"  style=\"" . $this->Css_Cmp['css_customer_idcustomer_grid_line'] . "\" NOWRAP align=\"\" valign=\"\"   HEIGHT=\"0px\">&nbsp;</TD>\r\n");
 }
 if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opc_psq']){ 
          $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . "\"  style=\"" . $this->Css_Cmp['css_customer_idcustomer_grid_line'] . "\" NOWRAP align=\"left\" valign=\"top\" WIDTH=\"1px\"  HEIGHT=\"0px\">\r\n");
 $Cod_Btn = nmButtonOutput($this->arr_buttons, "bcapture", "document.Fpesq.nm_ret_psq.value='" . str_replace(array("'", '"'), array("\'", '\"'), $teste) . "'; nm_escreve_window();", "document.Fpesq.nm_ret_psq.value='" . str_replace(array("'", '"'), array("\'", '\"'), $teste) . "'; nm_escreve_window();", "", "Rad_psq", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
          $nm_saida->saida(" $Cod_Btn</TD>\r\n");
 } 
 if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao_print'] != "print" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao'] != "pdf" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['mostra_edit'] != "N"){ 
              $Sc_parent = ($this->grid_emb_form || $this->grid_emb_form_full) ? "S" : "";//=)3
              $Parms_Det  = "nmgp_chave_det?#?" . $this->view_sales_detail_group_todo_cantidad . "*PDet*" . $this->view_sales_detail_group_todo_unit_value . "*PDet*" . $this->view_sales_detail_group_todo_producto . "*PDet*" . $this->valor . "*PDet*" . $this->view_sales_detail_group_todo_cuentaventa . "*PDet*" . $this->sales_idcliente . "*PDet*" . $this->sales_cliente . "*PDet*" . $this->sales_factura . "*PDet*" . $this->customer_nombre . "*PDet*" . $this->customer_correo . "*PDet*" . $this->customer_celular . "*PDet*" . $this->customer_direccion . "*PDet*" . $this->customer_idcustomer . "?@?Sc_seq_det?#?" . $this->SC_seq_register . "?#?";
              $Md5_Det    = "@SC_par@" . NM_encode_input($this->Ini->sc_page) . "@SC_par@grid_detail_sales_todo@SC_par@" . md5($Parms_Det);
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['Lig_Md5'][md5($Parms_Det)] = $Parms_Det;
              $Link_Det  = nmButtonOutput($this->arr_buttons, "bcons_detalhes", "nm_gp_submit3('" . $Md5_Det . "', '', 'detalhe', '" . $this->SC_ancora . "')", "nm_gp_submit3('" . $Md5_Det . "', '', 'detalhe', '" . $this->SC_ancora . "')", "", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
              if ($_SESSION['scriptcase']['proc_mobile']) {
                  $Link_Det  = nmButtonOutput($this->arr_buttons, "bcons_detalhes", "nm_submit_modal('" . $this->Ini->path_link . "grid_detail_sales_todo/index.php?nmgp_parms=" . $Md5_Det . "&nmgp_parm_acum=&script_case_init=" . NM_encode_input($this->Ini->sc_page) . "&SC_lig_apl_orig=grid_detail_sales_todo&nmgp_opcao=detalhe&KeepThis=true&TB_iframe=true&height=440&width=630&modal=true', '" . $Sc_parent . "')", "nm_submit_modal('" . $this->Ini->path_link . "grid_detail_sales_todo/index.php?nmgp_parms=" . $Md5_Det . "&nmgp_parm_acum=&script_case_init=" . NM_encode_input($this->Ini->sc_page) . "&SC_lig_apl_orig=grid_detail_sales_todo&nmgp_opcao=detalhe&KeepThis=true&TB_iframe=true&height=440&width=630&modal=true', '" . $Sc_parent . "')", "", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
              }
          $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . "\"  NOWRAP align=\"center\" valign=\"top\" WIDTH=\"1px\"  HEIGHT=\"0px\"><table style=\"padding: 0px; border-spacing: 0px; border-width: 0px;\"><tr><td style=\"padding: 0px\">" . $Link_Det . "</td></tr></table></TD>\r\n");
 } 
 if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao_print'] != "print" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao'] != "pdf" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['mostra_edit'] == "N"){ 
              $Sc_parent = ($this->grid_emb_form || $this->grid_emb_form_full) ? "S" : "";//=)3
              $Parms_Det  = "nmgp_chave_det?#?" . $this->view_sales_detail_group_todo_cantidad . "*PDet*" . $this->view_sales_detail_group_todo_unit_value . "*PDet*" . $this->view_sales_detail_group_todo_producto . "*PDet*" . $this->valor . "*PDet*" . $this->view_sales_detail_group_todo_cuentaventa . "*PDet*" . $this->sales_idcliente . "*PDet*" . $this->sales_cliente . "*PDet*" . $this->sales_factura . "*PDet*" . $this->customer_nombre . "*PDet*" . $this->customer_correo . "*PDet*" . $this->customer_celular . "*PDet*" . $this->customer_direccion . "*PDet*" . $this->customer_idcustomer . "?@?Sc_seq_det?#?" . $this->SC_seq_register . "?#?";
              $Md5_Det    = "@SC_par@" . NM_encode_input($this->Ini->sc_page) . "@SC_par@grid_detail_sales_todo@SC_par@" . md5($Parms_Det);
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['Lig_Md5'][md5($Parms_Det)] = $Parms_Det;
              $Link_Det  = nmButtonOutput($this->arr_buttons, "bcons_detalhes", "nm_gp_submit3('" . $Md5_Det . "', '', 'detalhe', '" . $this->SC_ancora . "')", "nm_gp_submit3('" . $Md5_Det . "', '', 'detalhe', '" . $this->SC_ancora . "')", "", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
              if ($_SESSION['scriptcase']['proc_mobile']) {
                  $Link_Det  = nmButtonOutput($this->arr_buttons, "bcons_detalhes", "nm_submit_modal('" . $this->Ini->path_link . "grid_detail_sales_todo/index.php?nmgp_parms=" . $Md5_Det . "&nmgp_parm_acum=&script_case_init=" . NM_encode_input($this->Ini->sc_page) . "&SC_lig_apl_orig=grid_detail_sales_todo&nmgp_opcao=detalhe&KeepThis=true&TB_iframe=true&height=440&width=630&modal=true', '" . $Sc_parent . "')", "nm_submit_modal('" . $this->Ini->path_link . "grid_detail_sales_todo/index.php?nmgp_parms=" . $Md5_Det . "&nmgp_parm_acum=&script_case_init=" . NM_encode_input($this->Ini->sc_page) . "&SC_lig_apl_orig=grid_detail_sales_todo&nmgp_opcao=detalhe&KeepThis=true&TB_iframe=true&height=440&width=630&modal=true', '" . $Sc_parent . "')", "", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
              }
          $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . "\"  NOWRAP align=\"center\" valign=\"top\" WIDTH=\"1px\"  HEIGHT=\"0px\"><table style=\"padding: 0px; border-spacing: 0px; border-width: 0px;\"><tr><td style=\"padding: 0px\">" . $Link_Det . "</td></tr></table></TD>\r\n");
 } 
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['field_order'] as $Cada_col)
          { 
              $NM_func_grid = "NM_grid_" . $Cada_col;
              $this->$NM_func_grid();
          } 
          $nm_saida->saida("</TR>\r\n");
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['embutida_grid'] && $this->nm_prim_linha)
          { 
              $nm_saida->saida("##NM@@"); 
              $this->nm_prim_linha = false; 
          } 
          $this->rs_grid->MoveNext();
          $this->sc_proc_grid = false;
          $nm_quant_linhas++ ;
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['embutida'] || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao'] == "pdf" || $this->Ini->Apl_paginacao == "FULL")
          { 
              $nm_quant_linhas = 0; 
          } 
   }  
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['embutida'])
   { 
      $this->Lin_final = $this->rs_grid->EOF;
      if ($this->Lin_final)
      {
         $this->rs_grid->Close();
      }
   } 
   else
   {
      $this->rs_grid->Close();
   }
   if (!$this->rs_grid->EOF) 
   { 
       if (isset($this->NM_tbody_open) && $this->NM_tbody_open)
       {
           $nm_saida->saida("    </TBODY>");
       }
   } 
   if ($this->rs_grid->EOF) 
   { 
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['SC_Ind_Groupby'] == "sc_free_group_by")
       {
           $SC_lst_Gby = array();
           foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['SC_Gb_Free_cmp'] as $cmp => $sql)
           {
               $SC_lst_Gby[] = $cmp;
           }
           $this->Nivel_gbBot = count($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['SC_Gb_Free_cmp']);
           krsort ($SC_lst_Gby);
           foreach ($SC_lst_Gby as $Ind => $cmp)
           {
               if (in_array($cmp, $this->SC_bot))
               {
                   $tmp = "quebra_" . $cmp . "_sc_free_group_by_bot";
                   $this->$tmp($cmp);
                   $this->Nivel_gbBot--;
               }
           }
       }
       if (isset($this->view_sales_detail_group_todo_producto_Old) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['SC_Ind_Groupby'] == "inicial")
       {
           $this->quebra_view_sales_detail_group_todo_producto_inicial_bot() ; 
       }
       if (isset($this->view_sales_detail_group_todo_cuentaventa_Old) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['SC_Ind_Groupby'] == "inicial")
       {
           $this->quebra_view_sales_detail_group_todo_cuentaventa_inicial_bot() ; 
       }
       if (isset($this->view_sales_detail_group_todo_fecha_Old) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['SC_Ind_Groupby'] == "inicial")
       {
           $this->quebra_view_sales_detail_group_todo_fecha_inicial_bot() ; 
       }
  
       if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['embutida'] || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['exibe_total'] == "S")
       { 
           $Gb_geral = "quebra_geral_" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['SC_Ind_Groupby'] . "_top";
           $this->$Gb_geral() ;
           $Gb_geral = "quebra_geral_" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['SC_Ind_Groupby'] . "_bot";
           $this->$Gb_geral() ;
       } 
   }  
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['embutida_grid'])
   {
       $nm_saida->saida("X##NM@@X");
   }
   $nm_saida->saida("</TABLE>");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opc_psq'])
   { 
          $nm_saida->saida("       </form>\r\n");
   } 
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['ajax_nav'])
   { 
       $this->Ini->Arr_result['setValue'][] = array('field' => 'sc_grid_body', 'value' => NM_charset_to_utf8($_SESSION['scriptcase']['saida_html']));
       $_SESSION['scriptcase']['saida_html'] = "";
   } 
   $nm_saida->saida("</TD>");
   $nm_saida->saida($fecha_tr);
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['embutida_grid'])
   { 
       return; 
   } 
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['embutida'])
   { 
       $_SESSION['scriptcase']['contr_link_emb'] = "";   
   } 
           $nm_saida->saida("    </TR>\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['embutida'])
   {
       $nm_saida->saida("</TABLE>\r\n");
   }
   if ($this->Print_All) 
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao']       = "igual" ; 
   } 
 }
 function NM_grid_view_sales_detail_group_todo_fecha()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['view_sales_detail_group_todo_fecha']) || $this->NM_cmp_hidden['view_sales_detail_group_todo_fecha'] != "off") { 
          $conteudo = NM_encode_input(sc_strip_script($this->view_sales_detail_group_todo_fecha)); 
          $conteudo_original = NM_encode_input(sc_strip_script($this->view_sales_detail_group_todo_fecha)); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          else    
          { 
               $conteudo_x =  $conteudo;
               nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD");
               if (is_numeric($conteudo_x) && $conteudo_x > 0) 
               { 
                   $this->nm_data->SetaData($conteudo, "YYYY-MM-DD");
                   $conteudo = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DT", "ddmmaaaa"));
               } 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'view_sales_detail_group_todo_fecha', $str_tem_display, $conteudo_original); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'view_sales_detail_group_todo_fecha', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          $classColFld = "";
          if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao_print'] != 'print' && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao'] != 'pdf') {
              $classColFld = " sc-col-fld sc-col-fld-" . $this->grid_fixed_column_no;
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['proc_pdf'])
          {
              $this->SC_nowrap = "NOWRAP";
          }
          else
          {
              $this->SC_nowrap = "NOWRAP";
          }
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_view_sales_detail_group_todo_fecha_grid_line . "\"  style=\"" . $this->Css_Cmp['css_view_sales_detail_group_todo_fecha_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"top\"   HEIGHT=\"0px\"><span id=\"id_sc_field_view_sales_detail_group_todo_fecha_" . $this->SC_seq_page . "\">" . $conteudo . "</span></TD>\r\n");
      }
 }
 function NM_grid_view_sales_detail_group_todo_cantidad()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['view_sales_detail_group_todo_cantidad']) || $this->NM_cmp_hidden['view_sales_detail_group_todo_cantidad'] != "off") { 
          $conteudo = NM_encode_input(sc_strip_script($this->view_sales_detail_group_todo_cantidad)); 
          $conteudo_original = NM_encode_input(sc_strip_script($this->view_sales_detail_group_todo_cantidad)); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "0", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'view_sales_detail_group_todo_cantidad', $str_tem_display, $conteudo_original); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'view_sales_detail_group_todo_cantidad', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          $classColFld = "";
          if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao_print'] != 'print' && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao'] != 'pdf') {
              $classColFld = " sc-col-fld sc-col-fld-" . $this->grid_fixed_column_no;
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['proc_pdf'])
          {
              $this->SC_nowrap = "NOWRAP";
          }
          else
          {
              $this->SC_nowrap = "NOWRAP";
          }
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_view_sales_detail_group_todo_cantidad_grid_line . "\"  style=\"" . $this->Css_Cmp['css_view_sales_detail_group_todo_cantidad_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"top\"   HEIGHT=\"0px\"><span id=\"id_sc_field_view_sales_detail_group_todo_cantidad_" . $this->SC_seq_page . "\">" . $conteudo . "</span></TD>\r\n");
      }
 }
 function NM_grid_view_sales_detail_group_todo_unit_value()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['view_sales_detail_group_todo_unit_value']) || $this->NM_cmp_hidden['view_sales_detail_group_todo_unit_value'] != "off") { 
          $conteudo = NM_encode_input(sc_strip_script($this->view_sales_detail_group_todo_unit_value)); 
          $conteudo_original = NM_encode_input(sc_strip_script($this->view_sales_detail_group_todo_unit_value)); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'view_sales_detail_group_todo_unit_value', $str_tem_display, $conteudo_original); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'view_sales_detail_group_todo_unit_value', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          $classColFld = "";
          if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao_print'] != 'print' && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao'] != 'pdf') {
              $classColFld = " sc-col-fld sc-col-fld-" . $this->grid_fixed_column_no;
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['proc_pdf'])
          {
              $this->SC_nowrap = "NOWRAP";
          }
          else
          {
              $this->SC_nowrap = "NOWRAP";
          }
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_view_sales_detail_group_todo_unit_value_grid_line . "\"  style=\"" . $this->Css_Cmp['css_view_sales_detail_group_todo_unit_value_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"top\"   HEIGHT=\"0px\"><span id=\"id_sc_field_view_sales_detail_group_todo_unit_value_" . $this->SC_seq_page . "\">" . $conteudo . "</span></TD>\r\n");
      }
 }
 function NM_grid_view_sales_detail_group_todo_producto()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['view_sales_detail_group_todo_producto']) || $this->NM_cmp_hidden['view_sales_detail_group_todo_producto'] != "off") { 
          $conteudo = sc_strip_script($this->view_sales_detail_group_todo_producto); 
          $conteudo_original = sc_strip_script($this->view_sales_detail_group_todo_producto); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'view_sales_detail_group_todo_producto', $str_tem_display, $conteudo_original); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'view_sales_detail_group_todo_producto', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          $classColFld = "";
          if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao_print'] != 'print' && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao'] != 'pdf') {
              $classColFld = " sc-col-fld sc-col-fld-" . $this->grid_fixed_column_no;
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['proc_pdf'])
          {
              $this->SC_nowrap = "";
          }
          else
          {
              $this->SC_nowrap = "";
          }
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_view_sales_detail_group_todo_producto_grid_line . "\"  style=\"" . $this->Css_Cmp['css_view_sales_detail_group_todo_producto_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"top\"   HEIGHT=\"0px\"><span id=\"id_sc_field_view_sales_detail_group_todo_producto_" . $this->SC_seq_page . "\">" . $conteudo . "</span></TD>\r\n");
      }
 }
 function NM_grid_valor()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['valor']) || $this->NM_cmp_hidden['valor'] != "off") { 
          $conteudo = NM_encode_input(sc_strip_script($this->valor)); 
          $conteudo_original = NM_encode_input(sc_strip_script($this->valor)); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'valor', $str_tem_display, $conteudo_original); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'valor', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          $classColFld = "";
          if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao_print'] != 'print' && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao'] != 'pdf') {
              $classColFld = " sc-col-fld sc-col-fld-" . $this->grid_fixed_column_no;
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['proc_pdf'])
          {
              $this->SC_nowrap = "NOWRAP";
          }
          else
          {
              $this->SC_nowrap = "NOWRAP";
          }
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_valor_grid_line . "\"  style=\"" . $this->Css_Cmp['css_valor_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"top\"   HEIGHT=\"0px\"><span id=\"id_sc_field_valor_" . $this->SC_seq_page . "\">" . $conteudo . "</span></TD>\r\n");
      }
 }
 function NM_grid_view_sales_detail_group_todo_cuentaventa()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['view_sales_detail_group_todo_cuentaventa']) || $this->NM_cmp_hidden['view_sales_detail_group_todo_cuentaventa'] != "off") { 
          $conteudo = sc_strip_script($this->view_sales_detail_group_todo_cuentaventa); 
          $conteudo_original = sc_strip_script($this->view_sales_detail_group_todo_cuentaventa); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'view_sales_detail_group_todo_cuentaventa', $str_tem_display, $conteudo_original); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'view_sales_detail_group_todo_cuentaventa', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          $classColFld = "";
          if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao_print'] != 'print' && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao'] != 'pdf') {
              $classColFld = " sc-col-fld sc-col-fld-" . $this->grid_fixed_column_no;
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['proc_pdf'])
          {
              $this->SC_nowrap = "";
          }
          else
          {
              $this->SC_nowrap = "";
          }
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_view_sales_detail_group_todo_cuentaventa_grid_line . "\"  style=\"" . $this->Css_Cmp['css_view_sales_detail_group_todo_cuentaventa_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"top\"   HEIGHT=\"0px\"><span id=\"id_sc_field_view_sales_detail_group_todo_cuentaventa_" . $this->SC_seq_page . "\">" . $conteudo . "</span></TD>\r\n");
      }
 }
 function NM_grid_sales_idcliente()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['sales_idcliente']) || $this->NM_cmp_hidden['sales_idcliente'] != "off") { 
          $conteudo = sc_strip_script($this->sales_idcliente); 
          $conteudo_original = sc_strip_script($this->sales_idcliente); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'sales_idcliente', $str_tem_display, $conteudo_original); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'sales_idcliente', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          $classColFld = "";
          if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao_print'] != 'print' && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao'] != 'pdf') {
              $classColFld = " sc-col-fld sc-col-fld-" . $this->grid_fixed_column_no;
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['proc_pdf'])
          {
              $this->SC_nowrap = "";
          }
          else
          {
              $this->SC_nowrap = "";
          }
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_sales_idcliente_grid_line . "\"  style=\"" . $this->Css_Cmp['css_sales_idcliente_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"top\"   HEIGHT=\"0px\"><span id=\"id_sc_field_sales_idcliente_" . $this->SC_seq_page . "\">" . $conteudo . "</span></TD>\r\n");
      }
 }
 function NM_grid_sales_cliente()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['sales_cliente']) || $this->NM_cmp_hidden['sales_cliente'] != "off") { 
          $conteudo = sc_strip_script($this->sales_cliente); 
          $conteudo_original = sc_strip_script($this->sales_cliente); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'sales_cliente', $str_tem_display, $conteudo_original); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'sales_cliente', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          $classColFld = "";
          if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao_print'] != 'print' && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao'] != 'pdf') {
              $classColFld = " sc-col-fld sc-col-fld-" . $this->grid_fixed_column_no;
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['proc_pdf'])
          {
              $this->SC_nowrap = "";
          }
          else
          {
              $this->SC_nowrap = "";
          }
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_sales_cliente_grid_line . "\"  style=\"" . $this->Css_Cmp['css_sales_cliente_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"top\"   HEIGHT=\"0px\"><span id=\"id_sc_field_sales_cliente_" . $this->SC_seq_page . "\">" . $conteudo . "</span></TD>\r\n");
      }
 }
 function NM_grid_sales_factura()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['sales_factura']) || $this->NM_cmp_hidden['sales_factura'] != "off") { 
          $conteudo = NM_encode_input(sc_strip_script($this->sales_factura)); 
          $conteudo_original = NM_encode_input(sc_strip_script($this->sales_factura)); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'sales_factura', $str_tem_display, $conteudo_original); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'sales_factura', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          $classColFld = "";
          if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao_print'] != 'print' && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao'] != 'pdf') {
              $classColFld = " sc-col-fld sc-col-fld-" . $this->grid_fixed_column_no;
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['proc_pdf'])
          {
              $this->SC_nowrap = "NOWRAP";
          }
          else
          {
              $this->SC_nowrap = "NOWRAP";
          }
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_sales_factura_grid_line . "\"  style=\"" . $this->Css_Cmp['css_sales_factura_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"top\"   HEIGHT=\"0px\"><span id=\"id_sc_field_sales_factura_" . $this->SC_seq_page . "\">" . $conteudo . "</span></TD>\r\n");
      }
 }
 function NM_grid_customer_nombre()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['customer_nombre']) || $this->NM_cmp_hidden['customer_nombre'] != "off") { 
          $conteudo = sc_strip_script($this->customer_nombre); 
          $conteudo_original = sc_strip_script($this->customer_nombre); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'customer_nombre', $str_tem_display, $conteudo_original); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'customer_nombre', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          $classColFld = "";
          if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao_print'] != 'print' && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao'] != 'pdf') {
              $classColFld = " sc-col-fld sc-col-fld-" . $this->grid_fixed_column_no;
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['proc_pdf'])
          {
              $this->SC_nowrap = "";
          }
          else
          {
              $this->SC_nowrap = "";
          }
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_customer_nombre_grid_line . "\"  style=\"" . $this->Css_Cmp['css_customer_nombre_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"top\"   HEIGHT=\"0px\"><span id=\"id_sc_field_customer_nombre_" . $this->SC_seq_page . "\">" . $conteudo . "</span></TD>\r\n");
      }
 }
 function NM_grid_customer_correo()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['customer_correo']) || $this->NM_cmp_hidden['customer_correo'] != "off") { 
          $conteudo = sc_strip_script($this->customer_correo); 
          $conteudo_original = sc_strip_script($this->customer_correo); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'customer_correo', $str_tem_display, $conteudo_original); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'customer_correo', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          $classColFld = "";
          if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao_print'] != 'print' && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao'] != 'pdf') {
              $classColFld = " sc-col-fld sc-col-fld-" . $this->grid_fixed_column_no;
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['proc_pdf'])
          {
              $this->SC_nowrap = "";
          }
          else
          {
              $this->SC_nowrap = "";
          }
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_customer_correo_grid_line . "\"  style=\"" . $this->Css_Cmp['css_customer_correo_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"top\"   HEIGHT=\"0px\"><span id=\"id_sc_field_customer_correo_" . $this->SC_seq_page . "\">" . $conteudo . "</span></TD>\r\n");
      }
 }
 function NM_grid_customer_celular()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['customer_celular']) || $this->NM_cmp_hidden['customer_celular'] != "off") { 
          $conteudo = sc_strip_script($this->customer_celular); 
          $conteudo_original = sc_strip_script($this->customer_celular); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'customer_celular', $str_tem_display, $conteudo_original); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'customer_celular', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          $classColFld = "";
          if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao_print'] != 'print' && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao'] != 'pdf') {
              $classColFld = " sc-col-fld sc-col-fld-" . $this->grid_fixed_column_no;
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['proc_pdf'])
          {
              $this->SC_nowrap = "";
          }
          else
          {
              $this->SC_nowrap = "";
          }
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_customer_celular_grid_line . "\"  style=\"" . $this->Css_Cmp['css_customer_celular_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"top\"   HEIGHT=\"0px\"><span id=\"id_sc_field_customer_celular_" . $this->SC_seq_page . "\">" . $conteudo . "</span></TD>\r\n");
      }
 }
 function NM_grid_customer_direccion()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['customer_direccion']) || $this->NM_cmp_hidden['customer_direccion'] != "off") { 
          $conteudo = sc_strip_script($this->customer_direccion); 
          $conteudo_original = sc_strip_script($this->customer_direccion); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'customer_direccion', $str_tem_display, $conteudo_original); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'customer_direccion', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          $classColFld = "";
          if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao_print'] != 'print' && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao'] != 'pdf') {
              $classColFld = " sc-col-fld sc-col-fld-" . $this->grid_fixed_column_no;
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['proc_pdf'])
          {
              $this->SC_nowrap = "";
          }
          else
          {
              $this->SC_nowrap = "";
          }
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_customer_direccion_grid_line . "\"  style=\"" . $this->Css_Cmp['css_customer_direccion_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"top\"   HEIGHT=\"0px\"><span id=\"id_sc_field_customer_direccion_" . $this->SC_seq_page . "\">" . $conteudo . "</span></TD>\r\n");
      }
 }
 function NM_grid_customer_idcustomer()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['customer_idcustomer']) || $this->NM_cmp_hidden['customer_idcustomer'] != "off") { 
          $conteudo = sc_strip_script($this->customer_idcustomer); 
          $conteudo_original = sc_strip_script($this->customer_idcustomer); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'customer_idcustomer', $str_tem_display, $conteudo_original); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'customer_idcustomer', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          $classColFld = "";
          if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao_print'] != 'print' && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao'] != 'pdf') {
              $classColFld = " sc-col-fld sc-col-fld-" . $this->grid_fixed_column_no;
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['proc_pdf'])
          {
              $this->SC_nowrap = "";
          }
          else
          {
              $this->SC_nowrap = "";
          }
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_customer_idcustomer_grid_line . "\"  style=\"" . $this->Css_Cmp['css_customer_idcustomer_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"top\"   HEIGHT=\"0px\"><span id=\"id_sc_field_customer_idcustomer_" . $this->SC_seq_page . "\">" . $conteudo . "</span></TD>\r\n");
      }
 }
 function NM_calc_span()
 {
   $this->NM_colspan  = 16;
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opc_psq'])
   {
       $this->NM_colspan++;
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['embutida'] || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao'] == "pdf" || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['embutida_pdf'] == "pdf")
   {
       $this->NM_colspan--;
   } 
   foreach ($this->NM_cmp_hidden as $Cmp => $Hidden)
   {
       if ($Hidden == "off")
       {
           $this->NM_colspan--;
       }
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['embutida_grid'])
   {
       $this->NM_colspan--;
   }
 }
 function nm_quebra_pagina($nm_parms)
 {
    global $nm_saida;
    if ($this->nmgp_prim_pag_pdf && $nm_parms == "pagina")
    {
        $this->nmgp_prim_pag_pdf = false;
        return;
    }
    $this->Ini->nm_cont_lin++;
    if (($this->Ini->nm_limite_lin > 0 && $this->Ini->nm_cont_lin > $this->Ini->nm_limite_lin) || $nm_parms == "pagina" || $nm_parms == "resumo" || $nm_parms == "total")
    {
        $nm_saida->saida("</TABLE></TD></TR>\r\n");
        $this->Ini->nm_cont_lin = ($nm_parms == "pagina") ? 0 : 1;
        if ($this->Print_All)
        {
            if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['print_navigator']) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['print_navigator'] == "Netscape")
            {
                $nm_saida->saida("</TABLE><TABLE id=\"main_table_grid\" style=\"page-break-before:always;\" align=\"" . $this->Tab_align . "\" valign=\"" . $this->Tab_valign . "\" " . $this->Tab_width . ">\r\n");
            }
            else
            {
                $nm_saida->saida("</TABLE><TABLE id=\"main_table_grid\" class=\"scGridBorder\" style=\"page-break-before:always;\" align=\"" . $this->Tab_align . "\" valign=\"" . $this->Tab_valign . "\" " . $this->Tab_width . ">\r\n");
            }
        }
        else
        {
            $nm_saida->saida("</table><div style=\"page-break-after: always;\"><span style=\"display: none;\">&nbsp;</span></div><table width='100%' cellspacing=0 cellpadding=0>\r\n");
        }
        if ($nm_parms != "resumo" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['embutida'])
        {
           if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['proc_pdf']) { 
           }
           else
           {
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['proc_pdf_vert']) { 
                $nm_saida->saida("     <thead>\r\n");
               }
               $this->cabecalho();
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['proc_pdf_vert']) { 
                $nm_saida->saida("     </thead>\r\n");
               }
           }
        }
        $nm_saida->saida(" <TR> \r\n");
        $nm_saida->saida("  <TD style=\"padding: 0px; vertical-align: top;\" width=\"100%\"> \r\n");
        $nm_saida->saida("   <TABLE class=\"" . $this->css_scGridTabela . "\" align=\"center\" " . $nm_id_aplicacao . " width=\"100%\">\r\n");
        if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['proc_pdf'] && ($this->pdf_all_cab == "S" || $this->pdf_all_label == "S")) { 
            $nm_saida->saida(" <thead> \r\n");
            if ($this->pdf_all_cab == "S")
            {
                $this->cabecalho();
            }
            if ($this->pdf_all_label == "S" && $nm_parms != "resumo" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['embutida_grid'])
            {
                $this->label_grid();
            }
            $nm_saida->saida(" </thead> \r\n");
        }
        if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['proc_pdf'] && $nm_parms != "resumo" && $nm_parms != "pagina" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['embutida_grid'])
        {
            $this->label_grid();
        }
        if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['proc_pdf'] && $this->pdf_label_group != "S" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['embutida_grid'])
        {
            $this->nm_inicio_pag = 0;
        }
    }
 }
 function quebra_view_sales_detail_group_todo_fecha_sc_free_group_by($Cmp_qb, $Where_qb, $Cmp_Name) 
 {
   $Var_name_gb  = "SC_tot_" . $Cmp_Name;
   $Cmps_Gb_Free = "campos_quebra_" . $Cmp_Name;
   $Desc_Gb_Ant  = $Cmp_Name . "_ant_desc";
   global $$Var_name_gb, $Desc_Gb_Ant;
   $this->sc_proc_quebra_view_sales_detail_group_todo_fecha_scgb_255 = false;
   $this->sc_proc_quebra_view_sales_detail_group_todo_producto = false;
   $this->sc_proc_quebra_sales_cliente = false;
   $this->sc_proc_quebra_view_sales_detail_group_todo_fecha = true; 
   $this->Tot->quebra_view_sales_detail_group_todo_fecha_sc_free_group_by($Cmp_qb, $Where_qb, $Cmp_Name);
   $tot_view_sales_detail_group_todo_fecha = $$Var_name_gb;
   $conteudo = $tot_view_sales_detail_group_todo_fecha[0] ;  
   $this->count_view_sales_detail_group_todo_fecha = $tot_view_sales_detail_group_todo_fecha[1];
   $this->sum_view_sales_detail_group_todo_fecha_view_sales_detail_group_todo_cantidad = $tot_view_sales_detail_group_todo_fecha[2];
   $this->sum_view_sales_detail_group_todo_fecha_valor = $tot_view_sales_detail_group_todo_fecha[3];
   $Temp_cmp_quebra = array(); 
   $conteudo = NM_encode_input(sc_strip_script($this->view_sales_detail_group_todo_fecha)); 
   $Format_tst = $this->Ini->Get_Gb_date_format('sc_free_group_by', $Cmp_Name);
   $Prefix_dat = $this->Ini->Get_Gb_prefix_date_format('sc_free_group_by', $Cmp_Name);
   $TP_Time    = (in_array($Cmp_Name, $this->Ini->Cmp_Sql_Time)) ? "0000-00-00 " : "";
   $conteudo = $this->Ini->GB_date_format($TP_Time . $conteudo, $Format_tst, $Prefix_dat); 
   $Temp_cmp_quebra[0]['cmp'] = $conteudo; 
   if (isset($this->nmgp_label_quebras['view_sales_detail_group_todo_fecha']))
   {
       $Temp_cmp_quebra[0]['lab'] = $this->nmgp_label_quebras['view_sales_detail_group_todo_fecha']; 
   }
   else
   {
       $Tmp_lab = "Fecha"; 
       $Temp_cmp_quebra[0]['lab'] = sprintf("" . $this->Ini->Nm_lang['lang_othr_cons_title_YYYYMMDD2'] . "", $Tmp_lab); 
   }
   $this->$Cmps_Gb_Free = $Temp_cmp_quebra;
   $this->sc_proc_quebra_view_sales_detail_group_todo_fecha = false; 
 } 
 function quebra_view_sales_detail_group_todo_fecha_scgb_255_sc_free_group_by($Cmp_qb, $Where_qb, $Cmp_Name) 
 {
   $Var_name_gb  = "SC_tot_" . $Cmp_Name;
   $Cmps_Gb_Free = "campos_quebra_" . $Cmp_Name;
   $Desc_Gb_Ant  = $Cmp_Name . "_ant_desc";
   global $$Var_name_gb, $Desc_Gb_Ant;
   $this->sc_proc_quebra_view_sales_detail_group_todo_fecha = false;
   $this->sc_proc_quebra_view_sales_detail_group_todo_producto = false;
   $this->sc_proc_quebra_sales_cliente = false;
   $this->sc_proc_quebra_view_sales_detail_group_todo_fecha_scgb_255 = true; 
   $this->Tot->quebra_view_sales_detail_group_todo_fecha_scgb_255_sc_free_group_by($Cmp_qb, $Where_qb, $Cmp_Name);
   $tot_view_sales_detail_group_todo_fecha_scgb_255 = $$Var_name_gb;
   $conteudo = $tot_view_sales_detail_group_todo_fecha_scgb_255[0] ;  
   $this->count_view_sales_detail_group_todo_fecha_scgb_255 = $tot_view_sales_detail_group_todo_fecha_scgb_255[1];
   $this->sum_view_sales_detail_group_todo_fecha_scgb_255_view_sales_detail_group_todo_cantidad = $tot_view_sales_detail_group_todo_fecha_scgb_255[2];
   $this->sum_view_sales_detail_group_todo_fecha_scgb_255_valor = $tot_view_sales_detail_group_todo_fecha_scgb_255[3];
   $Temp_cmp_quebra = array(); 
   $conteudo = NM_encode_input(sc_strip_script($this->view_sales_detail_group_todo_fecha_scgb_255)); 
   $Format_tst = $this->Ini->Get_Gb_date_format('sc_free_group_by', $Cmp_Name);
   $Prefix_dat = $this->Ini->Get_Gb_prefix_date_format('sc_free_group_by', $Cmp_Name);
   $TP_Time    = (in_array($Cmp_Name, $this->Ini->Cmp_Sql_Time)) ? "0000-00-00 " : "";
   $conteudo = $this->Ini->GB_date_format($TP_Time . $conteudo, $Format_tst, $Prefix_dat); 
   $Temp_cmp_quebra[0]['cmp'] = $conteudo; 
   if (isset($this->nmgp_label_quebras['view_sales_detail_group_todo_fecha_scgb_255']))
   {
       $Temp_cmp_quebra[0]['lab'] = $this->nmgp_label_quebras['view_sales_detail_group_todo_fecha_scgb_255']; 
   }
   else
   {
       $Tmp_lab = "Fecha"; 
       $Temp_cmp_quebra[0]['lab'] = sprintf("" . $this->Ini->Nm_lang['lang_othr_cons_title_YYYYWEEK'] . "", $Tmp_lab); 
   }
   $this->$Cmps_Gb_Free = $Temp_cmp_quebra;
   $this->sc_proc_quebra_view_sales_detail_group_todo_fecha_scgb_255 = false; 
 } 
 function quebra_view_sales_detail_group_todo_producto_sc_free_group_by($Cmp_qb, $Where_qb, $Cmp_Name) 
 {
   $Var_name_gb  = "SC_tot_" . $Cmp_Name;
   $Cmps_Gb_Free = "campos_quebra_" . $Cmp_Name;
   $Desc_Gb_Ant  = $Cmp_Name . "_ant_desc";
   global $$Var_name_gb, $Desc_Gb_Ant;
   $this->sc_proc_quebra_view_sales_detail_group_todo_fecha = false;
   $this->sc_proc_quebra_view_sales_detail_group_todo_fecha_scgb_255 = false;
   $this->sc_proc_quebra_sales_cliente = false;
   $this->sc_proc_quebra_view_sales_detail_group_todo_producto = true; 
   $this->Tot->quebra_view_sales_detail_group_todo_producto_sc_free_group_by($Cmp_qb, $Where_qb, $Cmp_Name);
   $tot_view_sales_detail_group_todo_producto = $$Var_name_gb;
   $conteudo = $tot_view_sales_detail_group_todo_producto[0] ;  
   $this->count_view_sales_detail_group_todo_producto = $tot_view_sales_detail_group_todo_producto[1];
   $this->sum_view_sales_detail_group_todo_producto_view_sales_detail_group_todo_cantidad = $tot_view_sales_detail_group_todo_producto[2];
   $this->sum_view_sales_detail_group_todo_producto_valor = $tot_view_sales_detail_group_todo_producto[3];
   $Temp_cmp_quebra = array(); 
   $conteudo = sc_strip_script($this->view_sales_detail_group_todo_producto); 
   $Temp_cmp_quebra[0]['cmp'] = $conteudo; 
   if (isset($this->nmgp_label_quebras['view_sales_detail_group_todo_producto']))
   {
       $Temp_cmp_quebra[0]['lab'] = $this->nmgp_label_quebras['view_sales_detail_group_todo_producto']; 
   }
   else
   {
       $Temp_cmp_quebra[0]['lab'] = "Producto"; 
   }
   $this->$Cmps_Gb_Free = $Temp_cmp_quebra;
   $this->sc_proc_quebra_view_sales_detail_group_todo_producto = false; 
 } 
 function quebra_sales_cliente_sc_free_group_by($Cmp_qb, $Where_qb, $Cmp_Name) 
 {
   $Var_name_gb  = "SC_tot_" . $Cmp_Name;
   $Cmps_Gb_Free = "campos_quebra_" . $Cmp_Name;
   $Desc_Gb_Ant  = $Cmp_Name . "_ant_desc";
   global $$Var_name_gb, $Desc_Gb_Ant;
   $this->sc_proc_quebra_view_sales_detail_group_todo_fecha = false;
   $this->sc_proc_quebra_view_sales_detail_group_todo_fecha_scgb_255 = false;
   $this->sc_proc_quebra_view_sales_detail_group_todo_producto = false;
   $this->sc_proc_quebra_sales_cliente = true; 
   $this->Tot->quebra_sales_cliente_sc_free_group_by($Cmp_qb, $Where_qb, $Cmp_Name);
   $tot_sales_cliente = $$Var_name_gb;
   $conteudo = $tot_sales_cliente[0] ;  
   $this->count_sales_cliente = $tot_sales_cliente[1];
   $this->sum_sales_cliente_view_sales_detail_group_todo_cantidad = $tot_sales_cliente[2];
   $this->sum_sales_cliente_valor = $tot_sales_cliente[3];
   $Temp_cmp_quebra = array(); 
   $conteudo = sc_strip_script($this->sales_cliente); 
   $Temp_cmp_quebra[0]['cmp'] = $conteudo; 
   if (isset($this->nmgp_label_quebras['sales_cliente']))
   {
       $Temp_cmp_quebra[0]['lab'] = $this->nmgp_label_quebras['sales_cliente']; 
   }
   else
   {
       $Temp_cmp_quebra[0]['lab'] = "Cliente"; 
   }
   $this->$Cmps_Gb_Free = $Temp_cmp_quebra;
   $this->sc_proc_quebra_sales_cliente = false; 
 } 
 function quebra_view_sales_detail_group_todo_fecha_inicial($view_sales_detail_group_todo_fecha) 
 {
   global $tot_view_sales_detail_group_todo_fecha;
   $this->sc_proc_quebra_view_sales_detail_group_todo_cuentaventa = false;
   $this->sc_proc_quebra_view_sales_detail_group_todo_producto = false;
   $TP_Time = (in_array('view_sales_detail_group_todo_fecha', $this->Ini->Cmp_Sql_Time)) ? "0000-00-00 " : "";
   $view_sales_detail_group_todo_fecha = $this->Ini->Get_arg_groupby($TP_Time . $view_sales_detail_group_todo_fecha, 'YYYYMM'); 
   $this->sc_proc_quebra_view_sales_detail_group_todo_fecha = true; 
   $this->Tot->quebra_view_sales_detail_group_todo_fecha_inicial($view_sales_detail_group_todo_fecha, $this->arg_sum_view_sales_detail_group_todo_fecha);
   $conteudo = $tot_view_sales_detail_group_todo_fecha[0] ;  
   $this->count_view_sales_detail_group_todo_fecha = $tot_view_sales_detail_group_todo_fecha[1];
   $this->sum_view_sales_detail_group_todo_fecha_view_sales_detail_group_todo_cantidad = $tot_view_sales_detail_group_todo_fecha[2];
   $this->sum_view_sales_detail_group_todo_fecha_valor = $tot_view_sales_detail_group_todo_fecha[3];
   $this->campos_quebra_view_sales_detail_group_todo_fecha = array(); 
   $conteudo = NM_encode_input(sc_strip_script($this->view_sales_detail_group_todo_fecha)); 
   $Format_tst = $this->Ini->Get_Gb_date_format('inicial', 'view_sales_detail_group_todo_fecha');
   $Prefix_dat = $this->Ini->Get_Gb_prefix_date_format('inicial', 'view_sales_detail_group_todo_fecha');
   $TP_Time    = (in_array('view_sales_detail_group_todo_fecha', $this->Ini->Cmp_Sql_Time)) ? "0000-00-00 " : "";
   $conteudo = $this->Ini->GB_date_format($TP_Time . $conteudo, $Format_tst, $Prefix_dat, "N", "F/Y"); 
   $this->campos_quebra_view_sales_detail_group_todo_fecha[0]['cmp'] = $conteudo; 
   if (isset($this->nmgp_label_quebras['view_sales_detail_group_todo_fecha']))
   {
       $this->campos_quebra_view_sales_detail_group_todo_fecha[0]['lab'] = $this->nmgp_label_quebras['view_sales_detail_group_todo_fecha']; 
   }
   else
   {
   $Tmp_lab  = "Fecha"; 
   $this->campos_quebra_view_sales_detail_group_todo_fecha[0]['lab'] = sprintf("" . $this->Ini->Nm_lang['lang_othr_cons_title_YYYYMM'] . "", $Tmp_lab); 
   }
   $this->sc_proc_quebra_view_sales_detail_group_todo_fecha = false; 
 } 
 function quebra_view_sales_detail_group_todo_cuentaventa_inicial($view_sales_detail_group_todo_fecha, $view_sales_detail_group_todo_cuentaventa) 
 {
   global $tot_view_sales_detail_group_todo_cuentaventa;
   $this->sc_proc_quebra_view_sales_detail_group_todo_fecha = false;
   $this->sc_proc_quebra_view_sales_detail_group_todo_producto = false;
   $this->sc_proc_quebra_view_sales_detail_group_todo_cuentaventa = true; 
   $this->Tot->quebra_view_sales_detail_group_todo_cuentaventa_inicial($view_sales_detail_group_todo_fecha, $view_sales_detail_group_todo_cuentaventa, $this->arg_sum_view_sales_detail_group_todo_fecha, $this->arg_sum_view_sales_detail_group_todo_cuentaventa);
   $conteudo = $tot_view_sales_detail_group_todo_cuentaventa[0] ;  
   $this->count_view_sales_detail_group_todo_cuentaventa = $tot_view_sales_detail_group_todo_cuentaventa[1];
   $this->sum_view_sales_detail_group_todo_cuentaventa_view_sales_detail_group_todo_cantidad = $tot_view_sales_detail_group_todo_cuentaventa[2];
   $this->sum_view_sales_detail_group_todo_cuentaventa_valor = $tot_view_sales_detail_group_todo_cuentaventa[3];
   $this->campos_quebra_view_sales_detail_group_todo_cuentaventa = array(); 
   $conteudo = sc_strip_script($this->view_sales_detail_group_todo_cuentaventa); 
   $this->campos_quebra_view_sales_detail_group_todo_cuentaventa[0]['cmp'] = $conteudo; 
   if (isset($this->nmgp_label_quebras['view_sales_detail_group_todo_cuentaventa']))
   {
       $this->campos_quebra_view_sales_detail_group_todo_cuentaventa[0]['lab'] = $this->nmgp_label_quebras['view_sales_detail_group_todo_cuentaventa']; 
   }
   else
   {
   $this->campos_quebra_view_sales_detail_group_todo_cuentaventa[0]['lab'] = "Cuentaventa"; 
   }
   $this->sc_proc_quebra_view_sales_detail_group_todo_cuentaventa = false; 
 } 
 function quebra_view_sales_detail_group_todo_producto_inicial($view_sales_detail_group_todo_fecha, $view_sales_detail_group_todo_cuentaventa, $view_sales_detail_group_todo_producto) 
 {
   global $tot_view_sales_detail_group_todo_producto;
   $this->sc_proc_quebra_view_sales_detail_group_todo_fecha = false;
   $this->sc_proc_quebra_view_sales_detail_group_todo_cuentaventa = false;
   $this->sc_proc_quebra_view_sales_detail_group_todo_producto = true; 
   $this->Tot->quebra_view_sales_detail_group_todo_producto_inicial($view_sales_detail_group_todo_fecha, $view_sales_detail_group_todo_cuentaventa, $view_sales_detail_group_todo_producto, $this->arg_sum_view_sales_detail_group_todo_fecha, $this->arg_sum_view_sales_detail_group_todo_cuentaventa, $this->arg_sum_view_sales_detail_group_todo_producto);
   $conteudo = $tot_view_sales_detail_group_todo_producto[0] ;  
   $this->count_view_sales_detail_group_todo_producto = $tot_view_sales_detail_group_todo_producto[1];
   $this->sum_view_sales_detail_group_todo_producto_view_sales_detail_group_todo_cantidad = $tot_view_sales_detail_group_todo_producto[2];
   $this->sum_view_sales_detail_group_todo_producto_valor = $tot_view_sales_detail_group_todo_producto[3];
   $this->campos_quebra_view_sales_detail_group_todo_producto = array(); 
   $conteudo = sc_strip_script($this->view_sales_detail_group_todo_producto); 
   $this->campos_quebra_view_sales_detail_group_todo_producto[0]['cmp'] = $conteudo; 
   if (isset($this->nmgp_label_quebras['view_sales_detail_group_todo_producto']))
   {
       $this->campos_quebra_view_sales_detail_group_todo_producto[0]['lab'] = $this->nmgp_label_quebras['view_sales_detail_group_todo_producto']; 
   }
   else
   {
   $this->campos_quebra_view_sales_detail_group_todo_producto[0]['lab'] = "Producto"; 
   }
   $this->sc_proc_quebra_view_sales_detail_group_todo_producto = false; 
 } 
 function quebra_view_sales_detail_group_todo_fecha_sc_free_group_by_top($Cmp_Name) 
 {
   $Var_name_gb  = "SC_tot_" . $Cmp_Name;
   $Cmps_Gb_Free = "campos_quebra_" . $Cmp_Name;
   $Desc_Gb_Ant  = $Cmp_Name . "_ant_desc";
   global
          $Desc_Gb_Ant, 
          $nm_saida, $$Var_name_gb;
   $tot_view_sales_detail_group_todo_fecha = $$Var_name_gb;
   $this->SC_tab_quebra = (count($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['SC_Gb_Free_cmp']) > 1) ? 10 * $this->Tab_Nv_tree['view_sales_detail_group_todo_fecha'] : 0;
   $Desc_Gb_Ant = $this->$Cmps_Gb_Free[0]['cmp'];
   static $cont_quebra_view_sales_detail_group_todo_fecha = 0; 
   $cont_quebra_view_sales_detail_group_todo_fecha++;
   $nm_nivel_book_pdf = "";
   $nm_fecha_pdf_old = "";
   $nm_fecha_pdf_new = "";
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['rows_emb']++;
   $link_div   = "";
   $link_div_2 = "";
   if ('' != $this->Ini->Tree_img_col && '' != $this->Ini->Tree_img_exp && !$this->Ini->Proc_print && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao'] != "pdf" && !$this->NM_emb_tree_no)
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['ind_tree']++;
       $this->NM_cont_body = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['ind_tree'];
       $link_div  = "<table style=\"border-collapse: collapse\"><tr>";
       if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['embutida_grid']) {
          $link_div .= "<td class=\"" . $this->css_scGridBlockLineBg . "\" style=\"width: " . $this->SC_tab_quebra . "px;\">&nbsp;</td>"; 
       }
       $link_div .= "<td style=\"padding: 0px\"><span align=\"left\">";
       $link_div .= "<img id=\"b_open_grid_detail_sales_todo_" . $this->NM_cont_body . "\" style=\"display:none\" onclick=\"document.getElementById('b_open_grid_detail_sales_todo_" . $this->NM_cont_body . "').style.display = 'none'; document.getElementById('b_close_grid_detail_sales_todo_" . $this->NM_cont_body . "').style.display = ''; NM_liga_tbody(" . $this->NM_cont_body . ", NM_tab_grid_detail_sales_todo, 'grid_detail_sales_todo'); return false;\" src=\"" . $this->Ini->path_img_global . "/" . $this->Ini->Tree_img_exp . "\">";
       $link_div .= "<img id=\"b_close_grid_detail_sales_todo_" . $this->NM_cont_body . "\" style=\"display:''\" onclick=\"document.getElementById('b_close_grid_detail_sales_todo_" . $this->NM_cont_body . "').style.display = 'none'; document.getElementById('b_open_grid_detail_sales_todo_" . $this->NM_cont_body . "').style.display = ''; NM_apaga_tbody(" . $this->NM_cont_body . ", NM_tab_grid_detail_sales_todo, 'grid_detail_sales_todo'); return false;\" src=\"" . $this->Ini->path_img_global . "/" . $this->Ini->Tree_img_col . "\">";
       $link_div .= "</span></td><td  class=\"scGridBlockFont\">";
       $link_div_2 = "</td></tr></table>";
       if (isset($this->NM_tbody_open) && $this->NM_tbody_open)
       {
           $this->NM_tbody_open = false;
           $nm_saida->saida("    </TBODY>");
       }
       $_SESSION['sc_session'][$this->Ini->sc_page]['NM_arr_tree']['grid_detail_sales_todo'][$this->NM_cont_body][$this->Tab_Nv_tree['view_sales_detail_group_todo_fecha']] = 'top';
       $nm_saida->saida("    <TBODY id=\"tbody_grid_detail_sales_todo_" . $this->NM_cont_body . "_top\" style=\"display:''\">");
   }
   $nm_nivel_book_pdf = "";
   $nm_fecha_pdf_new  = "";
   $this->NM_calc_span();
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao'] == "pdf" && !$this->Print_All)
   {
       $nm_nivel_book_pdf = "<div style=\"height:1px;overflow:hidden\"><H2 style=\"font-size:0;padding:1px\">" .  $this->$Cmps_Gb_Free[0]['cmp'] ;
       $nm_fecha_pdf_new = "</H2></div>";
   }
   $conteudo = $tot_view_sales_detail_group_todo_fecha[0] ;  
    $thisColspan = 2;
   $colspan = $this->NM_colspan;
   $this->Label_view_sales_detail_group_todo_fecha = "<table>"; 
   $Cmps_gb = $this->$Cmps_Gb_Free;
   foreach ($Cmps_gb as $cada_campo) 
   { 
       $this->Label_view_sales_detail_group_todo_fecha .= "<tr>"; 
       $this->Label_view_sales_detail_group_todo_fecha .= "<td>" . $cada_campo['lab'] . "</td><td> => </td>";
       $this->Label_view_sales_detail_group_todo_fecha .= "<td>" . $cada_campo['cmp'] . "</td>";
       $this->Label_view_sales_detail_group_todo_fecha .= "</tr>"; 
   } 
   $this->Label_view_sales_detail_group_todo_fecha .= "</table>"; 
   $nm_saida->saida("    <TR >\r\n");
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridBlock . "\" style=\"text-align:left;\"  style=\"text-align: left;\" NOWRAP " . "colspan=\"" . $colspan . "\"" . " align=\"\">\r\n");
   $nm_saida->saida("       " . $link_div . "\r\n");
   $nm_saida->saida("        " . $nm_nivel_book_pdf . $nm_fecha_pdf_new  . $this->Label_view_sales_detail_group_todo_fecha . $nm_fecha_pdf_old . "\r\n");
   $nm_saida->saida("       " . $link_div_2 . "\r\n");
   $nm_saida->saida("     </TD>\r\n");
   $nm_saida->saida("    </TR>\r\n");
   if ('' != $this->Ini->Tree_img_col && '' != $this->Ini->Tree_img_exp && !$this->Ini->Proc_print && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao'] != "pdf" && !$this->NM_emb_tree_no)
   {
       $nm_saida->saida("    </TBODY>");
       if ($this->Ult_qb_free == $this->Tab_Nv_tree['view_sales_detail_group_todo_fecha'])
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['ind_tree']++;
           $this->NM_cont_body = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['ind_tree'];
           $_SESSION['sc_session'][$this->Ini->sc_page]['NM_arr_tree']['grid_detail_sales_todo'][$this->NM_cont_body][$this->Tab_Nv_tree['view_sales_detail_group_todo_fecha']] = 'bot';
           $nm_saida->saida("    <TBODY id=\"tbody_grid_detail_sales_todo_" . $this->NM_cont_body . "_bot\" style=\"display:''\">");
           $this->NM_tbody_open = true;
       }
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['embutida_grid'] && $this->nm_prim_linha)
   { 
       $nm_saida->saida("##NM@@"); 
       $this->nm_prim_linha = false; 
    } 
 } 
 function quebra_view_sales_detail_group_todo_fecha_sc_free_group_by_bot($Cmp_Name) 
 {
   $Var_name_gb  = "SC_tot_" . $Cmp_Name;
   $Cmps_Gb_Free = "campos_quebra_" . $Cmp_Name;
   $Desc_Gb_Ant  = $Cmp_Name . "_ant_desc";
   global 
          $Desc_Gb_Ant, 
          $nm_saida, $$Var_name_gb;
   $tot_view_sales_detail_group_todo_fecha = $$Var_name_gb;
   if ($this->Ult_qb_free != $this->Tab_Nv_tree['view_sales_detail_group_todo_fecha'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao'] != "pdf" && !$this->NM_emb_tree_no)
   {
       $this->NM_tbody_open = true;
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['ind_tree']++;
       $this->NM_cont_body = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['ind_tree'];
       $_SESSION['sc_session'][$this->Ini->sc_page]['NM_arr_tree']['grid_detail_sales_todo'][$this->NM_cont_body][$this->Tab_Nv_tree['view_sales_detail_group_todo_fecha']] = 'bot';
       $nm_saida->saida("    <TBODY id=\"tbody_grid_detail_sales_todo_" . $this->NM_cont_body . "_bot\" style=\"display:''\">");
   }
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['rows_emb']++;
   $Desc_Gb_Ant = $this->$Cmps_Gb_Free[0]['cmp'];
       $nm_saida->saida("    <TR class=\"" . $this->css_scGridSubtotal . "\">\r\n");
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['embutida_grid']) {
       $nm_saida->saida("    <TD class=\"" . $this->css_scGridBlockBg . "\" style=\"width: " . $this->width_tabula_quebra . "; display:" . $this->width_tabula_display . ";\">&nbsp;</TD>\r\n");
   }
   $tit_lin_sumariza_atu = "";
   $colspan  = 1;
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opc_psq'])
   {
       $colspan++;
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['embutida'] || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao_print'] == "print" || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao'] == "pdf")
   {
       $colspan--;
   } 
   foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['field_order'] as $Cada_cmp)
   {
    if ($Cada_cmp == "view_sales_detail_group_todo_fecha" && (!isset($this->NM_cmp_hidden['view_sales_detail_group_todo_fecha']) || $this->NM_cmp_hidden['view_sales_detail_group_todo_fecha'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "view_sales_detail_group_todo_cantidad" && (!isset($this->NM_cmp_hidden['view_sales_detail_group_todo_cantidad']) || $this->NM_cmp_hidden['view_sales_detail_group_todo_cantidad'] != "off"))
    {
      if ($colspan > 0)
      {
       $nm_saida->saida("     <TD class=\"" . $this->css_scGridSubtotalFont . "\"   style=\"text-align: left;\"  NOWRAP " . "colspan=\"" . $colspan . "\"" . " >" . $tit_lin_sumariza_atu . "</TD>\r\n");
           $colspan = 0;
           $tit_lin_sumariza_atu = "&nbsp;";
      }
      $conteudo =  $tot_view_sales_detail_group_todo_fecha[2] ; 
      nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "0", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
       $nm_saida->saida("     <TD class=\"" . $this->css_scGridSubtotalFont . " css_view_sales_detail_group_todo_cantidad_sub_tot\"  NOWRAP >" . $conteudo . "</TD>\r\n");
     }
    if ($Cada_cmp == "view_sales_detail_group_todo_unit_value" && (!isset($this->NM_cmp_hidden['view_sales_detail_group_todo_unit_value']) || $this->NM_cmp_hidden['view_sales_detail_group_todo_unit_value'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "view_sales_detail_group_todo_producto" && (!isset($this->NM_cmp_hidden['view_sales_detail_group_todo_producto']) || $this->NM_cmp_hidden['view_sales_detail_group_todo_producto'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "valor" && (!isset($this->NM_cmp_hidden['valor']) || $this->NM_cmp_hidden['valor'] != "off"))
    {
      if ($colspan > 0)
      {
       $nm_saida->saida("     <TD class=\"" . $this->css_scGridSubtotalFont . "\"   style=\"text-align: left;\"  NOWRAP " . "colspan=\"" . $colspan . "\"" . " >" . $tit_lin_sumariza_atu . "</TD>\r\n");
           $colspan = 0;
           $tit_lin_sumariza_atu = "&nbsp;";
      }
      $conteudo =  $tot_view_sales_detail_group_todo_fecha[3] ; 
      nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
       $nm_saida->saida("     <TD class=\"" . $this->css_scGridSubtotalFont . " css_valor_sub_tot\"  NOWRAP >" . $conteudo . "</TD>\r\n");
     }
    if ($Cada_cmp == "view_sales_detail_group_todo_cuentaventa" && (!isset($this->NM_cmp_hidden['view_sales_detail_group_todo_cuentaventa']) || $this->NM_cmp_hidden['view_sales_detail_group_todo_cuentaventa'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "sales_idcliente" && (!isset($this->NM_cmp_hidden['sales_idcliente']) || $this->NM_cmp_hidden['sales_idcliente'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "sales_cliente" && (!isset($this->NM_cmp_hidden['sales_cliente']) || $this->NM_cmp_hidden['sales_cliente'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "sales_factura" && (!isset($this->NM_cmp_hidden['sales_factura']) || $this->NM_cmp_hidden['sales_factura'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "customer_nombre" && (!isset($this->NM_cmp_hidden['customer_nombre']) || $this->NM_cmp_hidden['customer_nombre'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "customer_correo" && (!isset($this->NM_cmp_hidden['customer_correo']) || $this->NM_cmp_hidden['customer_correo'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "customer_celular" && (!isset($this->NM_cmp_hidden['customer_celular']) || $this->NM_cmp_hidden['customer_celular'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "customer_direccion" && (!isset($this->NM_cmp_hidden['customer_direccion']) || $this->NM_cmp_hidden['customer_direccion'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "customer_idcustomer" && (!isset($this->NM_cmp_hidden['customer_idcustomer']) || $this->NM_cmp_hidden['customer_idcustomer'] != "off"))
    {
        $colspan++;
    }
   }
   if ($colspan > 0)
   {
       $nm_saida->saida("     <TD class=\"" . $this->css_scGridSubtotalFont . "\"  style=\"text-align: left;\"  " . "colspan=\"" . $colspan . "\"" . ">" . $tit_lin_sumariza_atu . "</TD>\r\n");
       $nm_saida->saida("    </TR>\r\n");
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao'] != "pdf" && !$this->NM_emb_tree_no)
   {
       $this->NM_tbody_open = false;
       $nm_saida->saida("    </TBODY>");
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['embutida_grid'] && $this->nm_prim_linha)
   { 
       $nm_saida->saida("##NM@@"); 
       $this->nm_prim_linha = false; 
    } 
 } 
 function quebra_view_sales_detail_group_todo_fecha_scgb_255_sc_free_group_by_top($Cmp_Name) 
 {
   $Var_name_gb  = "SC_tot_" . $Cmp_Name;
   $Cmps_Gb_Free = "campos_quebra_" . $Cmp_Name;
   $Desc_Gb_Ant  = $Cmp_Name . "_ant_desc";
   global
          $Desc_Gb_Ant, 
          $nm_saida, $$Var_name_gb;
   $tot_view_sales_detail_group_todo_fecha_scgb_255 = $$Var_name_gb;
   $this->SC_tab_quebra = (count($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['SC_Gb_Free_cmp']) > 1) ? 10 * $this->Tab_Nv_tree['view_sales_detail_group_todo_fecha_scgb_255'] : 0;
   $Desc_Gb_Ant = $this->$Cmps_Gb_Free[0]['cmp'];
   static $cont_quebra_view_sales_detail_group_todo_fecha_scgb_255 = 0; 
   $cont_quebra_view_sales_detail_group_todo_fecha_scgb_255++;
   $nm_nivel_book_pdf = "";
   $nm_fecha_pdf_old = "";
   $nm_fecha_pdf_new = "";
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['rows_emb']++;
   $link_div   = "";
   $link_div_2 = "";
   if ('' != $this->Ini->Tree_img_col && '' != $this->Ini->Tree_img_exp && !$this->Ini->Proc_print && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao'] != "pdf" && !$this->NM_emb_tree_no)
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['ind_tree']++;
       $this->NM_cont_body = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['ind_tree'];
       $link_div  = "<table style=\"border-collapse: collapse\"><tr>";
       if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['embutida_grid']) {
          $link_div .= "<td class=\"" . $this->css_scGridBlockLineBg . "\" style=\"width: " . $this->SC_tab_quebra . "px;\">&nbsp;</td>"; 
       }
       $link_div .= "<td style=\"padding: 0px\"><span align=\"left\">";
       $link_div .= "<img id=\"b_open_grid_detail_sales_todo_" . $this->NM_cont_body . "\" style=\"display:none\" onclick=\"document.getElementById('b_open_grid_detail_sales_todo_" . $this->NM_cont_body . "').style.display = 'none'; document.getElementById('b_close_grid_detail_sales_todo_" . $this->NM_cont_body . "').style.display = ''; NM_liga_tbody(" . $this->NM_cont_body . ", NM_tab_grid_detail_sales_todo, 'grid_detail_sales_todo'); return false;\" src=\"" . $this->Ini->path_img_global . "/" . $this->Ini->Tree_img_exp . "\">";
       $link_div .= "<img id=\"b_close_grid_detail_sales_todo_" . $this->NM_cont_body . "\" style=\"display:''\" onclick=\"document.getElementById('b_close_grid_detail_sales_todo_" . $this->NM_cont_body . "').style.display = 'none'; document.getElementById('b_open_grid_detail_sales_todo_" . $this->NM_cont_body . "').style.display = ''; NM_apaga_tbody(" . $this->NM_cont_body . ", NM_tab_grid_detail_sales_todo, 'grid_detail_sales_todo'); return false;\" src=\"" . $this->Ini->path_img_global . "/" . $this->Ini->Tree_img_col . "\">";
       $link_div .= "</span></td><td  class=\"scGridBlockFont\">";
       $link_div_2 = "</td></tr></table>";
       if (isset($this->NM_tbody_open) && $this->NM_tbody_open)
       {
           $this->NM_tbody_open = false;
           $nm_saida->saida("    </TBODY>");
       }
       $_SESSION['sc_session'][$this->Ini->sc_page]['NM_arr_tree']['grid_detail_sales_todo'][$this->NM_cont_body][$this->Tab_Nv_tree['view_sales_detail_group_todo_fecha_scgb_255']] = 'top';
       $nm_saida->saida("    <TBODY id=\"tbody_grid_detail_sales_todo_" . $this->NM_cont_body . "_top\" style=\"display:''\">");
   }
   $nm_nivel_book_pdf = "";
   $nm_fecha_pdf_new  = "";
   $this->NM_calc_span();
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao'] == "pdf" && !$this->Print_All)
   {
       $nm_nivel_book_pdf = "<div style=\"height:1px;overflow:hidden\"><H3 style=\"font-size:0;padding:1px\">" .  $this->$Cmps_Gb_Free[0]['cmp'] ;
       $nm_fecha_pdf_new = "</H3></div>";
   }
   $conteudo = $tot_view_sales_detail_group_todo_fecha_scgb_255[0] ;  
    $thisColspan = 2;
   $colspan = $this->NM_colspan;
   $this->Label_view_sales_detail_group_todo_fecha_scgb_255 = "<table>"; 
   $Cmps_gb = $this->$Cmps_Gb_Free;
   foreach ($Cmps_gb as $cada_campo) 
   { 
       $this->Label_view_sales_detail_group_todo_fecha_scgb_255 .= "<tr>"; 
       $this->Label_view_sales_detail_group_todo_fecha_scgb_255 .= "<td>" . $cada_campo['lab'] . "</td><td> => </td>";
       $this->Label_view_sales_detail_group_todo_fecha_scgb_255 .= "<td>" . $cada_campo['cmp'] . "</td>";
       $this->Label_view_sales_detail_group_todo_fecha_scgb_255 .= "</tr>"; 
   } 
   $this->Label_view_sales_detail_group_todo_fecha_scgb_255 .= "</table>"; 
   $nm_saida->saida("    <TR >\r\n");
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridBlock . "\" style=\"text-align:left;\"  style=\"text-align: left;\" NOWRAP " . "colspan=\"" . $colspan . "\"" . " align=\"\">\r\n");
   $nm_saida->saida("       " . $link_div . "\r\n");
   $nm_saida->saida("        " . $nm_nivel_book_pdf . $nm_fecha_pdf_new  . $this->Label_view_sales_detail_group_todo_fecha_scgb_255 . $nm_fecha_pdf_old . "\r\n");
   $nm_saida->saida("       " . $link_div_2 . "\r\n");
   $nm_saida->saida("     </TD>\r\n");
   $nm_saida->saida("    </TR>\r\n");
   if ('' != $this->Ini->Tree_img_col && '' != $this->Ini->Tree_img_exp && !$this->Ini->Proc_print && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao'] != "pdf" && !$this->NM_emb_tree_no)
   {
       $nm_saida->saida("    </TBODY>");
       if ($this->Ult_qb_free == $this->Tab_Nv_tree['view_sales_detail_group_todo_fecha_scgb_255'])
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['ind_tree']++;
           $this->NM_cont_body = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['ind_tree'];
           $_SESSION['sc_session'][$this->Ini->sc_page]['NM_arr_tree']['grid_detail_sales_todo'][$this->NM_cont_body][$this->Tab_Nv_tree['view_sales_detail_group_todo_fecha_scgb_255']] = 'bot';
           $nm_saida->saida("    <TBODY id=\"tbody_grid_detail_sales_todo_" . $this->NM_cont_body . "_bot\" style=\"display:''\">");
           $this->NM_tbody_open = true;
       }
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['embutida_grid'] && $this->nm_prim_linha)
   { 
       $nm_saida->saida("##NM@@"); 
       $this->nm_prim_linha = false; 
    } 
 } 
 function quebra_view_sales_detail_group_todo_fecha_scgb_255_sc_free_group_by_bot($Cmp_Name) 
 {
   $Var_name_gb  = "SC_tot_" . $Cmp_Name;
   $Cmps_Gb_Free = "campos_quebra_" . $Cmp_Name;
   $Desc_Gb_Ant  = $Cmp_Name . "_ant_desc";
   global 
          $Desc_Gb_Ant, 
          $nm_saida, $$Var_name_gb;
   $tot_view_sales_detail_group_todo_fecha_scgb_255 = $$Var_name_gb;
   if ($this->Ult_qb_free != $this->Tab_Nv_tree['view_sales_detail_group_todo_fecha_scgb_255'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao'] != "pdf" && !$this->NM_emb_tree_no)
   {
       $this->NM_tbody_open = true;
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['ind_tree']++;
       $this->NM_cont_body = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['ind_tree'];
       $_SESSION['sc_session'][$this->Ini->sc_page]['NM_arr_tree']['grid_detail_sales_todo'][$this->NM_cont_body][$this->Tab_Nv_tree['view_sales_detail_group_todo_fecha_scgb_255']] = 'bot';
       $nm_saida->saida("    <TBODY id=\"tbody_grid_detail_sales_todo_" . $this->NM_cont_body . "_bot\" style=\"display:''\">");
   }
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['rows_emb']++;
   $Desc_Gb_Ant = $this->$Cmps_Gb_Free[0]['cmp'];
       $nm_saida->saida("    <TR class=\"" . $this->css_scGridSubtotal . "\">\r\n");
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['embutida_grid']) {
       $nm_saida->saida("    <TD class=\"" . $this->css_scGridBlockBg . "\" style=\"width: " . $this->width_tabula_quebra . "; display:" . $this->width_tabula_display . ";\">&nbsp;</TD>\r\n");
   }
   $tit_lin_sumariza_atu = "";
   $colspan  = 1;
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opc_psq'])
   {
       $colspan++;
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['embutida'] || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao_print'] == "print" || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao'] == "pdf")
   {
       $colspan--;
   } 
   foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['field_order'] as $Cada_cmp)
   {
    if ($Cada_cmp == "view_sales_detail_group_todo_fecha" && (!isset($this->NM_cmp_hidden['view_sales_detail_group_todo_fecha']) || $this->NM_cmp_hidden['view_sales_detail_group_todo_fecha'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "view_sales_detail_group_todo_cantidad" && (!isset($this->NM_cmp_hidden['view_sales_detail_group_todo_cantidad']) || $this->NM_cmp_hidden['view_sales_detail_group_todo_cantidad'] != "off"))
    {
      if ($colspan > 0)
      {
       $nm_saida->saida("     <TD class=\"" . $this->css_scGridSubtotalFont . "\"   style=\"text-align: left;\"  NOWRAP " . "colspan=\"" . $colspan . "\"" . " >" . $tit_lin_sumariza_atu . "</TD>\r\n");
           $colspan = 0;
           $tit_lin_sumariza_atu = "&nbsp;";
      }
      $conteudo =  $tot_view_sales_detail_group_todo_fecha_scgb_255[2] ; 
      nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "0", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
       $nm_saida->saida("     <TD class=\"" . $this->css_scGridSubtotalFont . " css_view_sales_detail_group_todo_cantidad_sub_tot\"  NOWRAP >" . $conteudo . "</TD>\r\n");
     }
    if ($Cada_cmp == "view_sales_detail_group_todo_unit_value" && (!isset($this->NM_cmp_hidden['view_sales_detail_group_todo_unit_value']) || $this->NM_cmp_hidden['view_sales_detail_group_todo_unit_value'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "view_sales_detail_group_todo_producto" && (!isset($this->NM_cmp_hidden['view_sales_detail_group_todo_producto']) || $this->NM_cmp_hidden['view_sales_detail_group_todo_producto'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "valor" && (!isset($this->NM_cmp_hidden['valor']) || $this->NM_cmp_hidden['valor'] != "off"))
    {
      if ($colspan > 0)
      {
       $nm_saida->saida("     <TD class=\"" . $this->css_scGridSubtotalFont . "\"   style=\"text-align: left;\"  NOWRAP " . "colspan=\"" . $colspan . "\"" . " >" . $tit_lin_sumariza_atu . "</TD>\r\n");
           $colspan = 0;
           $tit_lin_sumariza_atu = "&nbsp;";
      }
      $conteudo =  $tot_view_sales_detail_group_todo_fecha_scgb_255[3] ; 
      nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
       $nm_saida->saida("     <TD class=\"" . $this->css_scGridSubtotalFont . " css_valor_sub_tot\"  NOWRAP >" . $conteudo . "</TD>\r\n");
     }
    if ($Cada_cmp == "view_sales_detail_group_todo_cuentaventa" && (!isset($this->NM_cmp_hidden['view_sales_detail_group_todo_cuentaventa']) || $this->NM_cmp_hidden['view_sales_detail_group_todo_cuentaventa'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "sales_idcliente" && (!isset($this->NM_cmp_hidden['sales_idcliente']) || $this->NM_cmp_hidden['sales_idcliente'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "sales_cliente" && (!isset($this->NM_cmp_hidden['sales_cliente']) || $this->NM_cmp_hidden['sales_cliente'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "sales_factura" && (!isset($this->NM_cmp_hidden['sales_factura']) || $this->NM_cmp_hidden['sales_factura'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "customer_nombre" && (!isset($this->NM_cmp_hidden['customer_nombre']) || $this->NM_cmp_hidden['customer_nombre'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "customer_correo" && (!isset($this->NM_cmp_hidden['customer_correo']) || $this->NM_cmp_hidden['customer_correo'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "customer_celular" && (!isset($this->NM_cmp_hidden['customer_celular']) || $this->NM_cmp_hidden['customer_celular'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "customer_direccion" && (!isset($this->NM_cmp_hidden['customer_direccion']) || $this->NM_cmp_hidden['customer_direccion'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "customer_idcustomer" && (!isset($this->NM_cmp_hidden['customer_idcustomer']) || $this->NM_cmp_hidden['customer_idcustomer'] != "off"))
    {
        $colspan++;
    }
   }
   if ($colspan > 0)
   {
       $nm_saida->saida("     <TD class=\"" . $this->css_scGridSubtotalFont . "\"  style=\"text-align: left;\"  " . "colspan=\"" . $colspan . "\"" . ">" . $tit_lin_sumariza_atu . "</TD>\r\n");
       $nm_saida->saida("    </TR>\r\n");
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao'] != "pdf" && !$this->NM_emb_tree_no)
   {
       $this->NM_tbody_open = false;
       $nm_saida->saida("    </TBODY>");
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['embutida_grid'] && $this->nm_prim_linha)
   { 
       $nm_saida->saida("##NM@@"); 
       $this->nm_prim_linha = false; 
    } 
 } 
 function quebra_view_sales_detail_group_todo_producto_sc_free_group_by_top($Cmp_Name) 
 {
   $Var_name_gb  = "SC_tot_" . $Cmp_Name;
   $Cmps_Gb_Free = "campos_quebra_" . $Cmp_Name;
   $Desc_Gb_Ant  = $Cmp_Name . "_ant_desc";
   global
          $Desc_Gb_Ant, 
          $nm_saida, $$Var_name_gb;
   $tot_view_sales_detail_group_todo_producto = $$Var_name_gb;
   $this->SC_tab_quebra = (count($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['SC_Gb_Free_cmp']) > 1) ? 10 * $this->Tab_Nv_tree['view_sales_detail_group_todo_producto'] : 0;
   $Desc_Gb_Ant = $this->$Cmps_Gb_Free[0]['cmp'];
   static $cont_quebra_view_sales_detail_group_todo_producto = 0; 
   $cont_quebra_view_sales_detail_group_todo_producto++;
   $nm_nivel_book_pdf = "";
   $nm_fecha_pdf_old = "";
   $nm_fecha_pdf_new = "";
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['rows_emb']++;
   $link_div   = "";
   $link_div_2 = "";
   if ('' != $this->Ini->Tree_img_col && '' != $this->Ini->Tree_img_exp && !$this->Ini->Proc_print && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao'] != "pdf" && !$this->NM_emb_tree_no)
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['ind_tree']++;
       $this->NM_cont_body = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['ind_tree'];
       $link_div  = "<table style=\"border-collapse: collapse\"><tr>";
       if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['embutida_grid']) {
          $link_div .= "<td class=\"" . $this->css_scGridBlockLineBg . "\" style=\"width: " . $this->SC_tab_quebra . "px;\">&nbsp;</td>"; 
       }
       $link_div .= "<td style=\"padding: 0px\"><span align=\"left\">";
       $link_div .= "<img id=\"b_open_grid_detail_sales_todo_" . $this->NM_cont_body . "\" style=\"display:none\" onclick=\"document.getElementById('b_open_grid_detail_sales_todo_" . $this->NM_cont_body . "').style.display = 'none'; document.getElementById('b_close_grid_detail_sales_todo_" . $this->NM_cont_body . "').style.display = ''; NM_liga_tbody(" . $this->NM_cont_body . ", NM_tab_grid_detail_sales_todo, 'grid_detail_sales_todo'); return false;\" src=\"" . $this->Ini->path_img_global . "/" . $this->Ini->Tree_img_exp . "\">";
       $link_div .= "<img id=\"b_close_grid_detail_sales_todo_" . $this->NM_cont_body . "\" style=\"display:''\" onclick=\"document.getElementById('b_close_grid_detail_sales_todo_" . $this->NM_cont_body . "').style.display = 'none'; document.getElementById('b_open_grid_detail_sales_todo_" . $this->NM_cont_body . "').style.display = ''; NM_apaga_tbody(" . $this->NM_cont_body . ", NM_tab_grid_detail_sales_todo, 'grid_detail_sales_todo'); return false;\" src=\"" . $this->Ini->path_img_global . "/" . $this->Ini->Tree_img_col . "\">";
       $link_div .= "</span></td><td  class=\"scGridBlockFont\">";
       $link_div_2 = "</td></tr></table>";
       if (isset($this->NM_tbody_open) && $this->NM_tbody_open)
       {
           $this->NM_tbody_open = false;
           $nm_saida->saida("    </TBODY>");
       }
       $_SESSION['sc_session'][$this->Ini->sc_page]['NM_arr_tree']['grid_detail_sales_todo'][$this->NM_cont_body][$this->Tab_Nv_tree['view_sales_detail_group_todo_producto']] = 'top';
       $nm_saida->saida("    <TBODY id=\"tbody_grid_detail_sales_todo_" . $this->NM_cont_body . "_top\" style=\"display:''\">");
   }
   $nm_nivel_book_pdf = "";
   $nm_fecha_pdf_new  = "";
   $this->NM_calc_span();
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao'] == "pdf" && !$this->Print_All)
   {
       $nm_nivel_book_pdf = "<div style=\"height:1px;overflow:hidden\"><H4 style=\"font-size:0;padding:1px\">" .  $this->$Cmps_Gb_Free[0]['cmp'] ;
       $nm_fecha_pdf_new = "</H4></div>";
   }
   $conteudo = $tot_view_sales_detail_group_todo_producto[0] ;  
    $thisColspan = 2;
   $colspan = $this->NM_colspan;
   $this->Label_view_sales_detail_group_todo_producto = "<table>"; 
   $Cmps_gb = $this->$Cmps_Gb_Free;
   foreach ($Cmps_gb as $cada_campo) 
   { 
       $this->Label_view_sales_detail_group_todo_producto .= "<tr>"; 
       $this->Label_view_sales_detail_group_todo_producto .= "<td>" . $cada_campo['lab'] . "</td><td> => </td>";
       $this->Label_view_sales_detail_group_todo_producto .= "<td>" . $cada_campo['cmp'] . "</td>";
       $this->Label_view_sales_detail_group_todo_producto .= "</tr>"; 
   } 
   $this->Label_view_sales_detail_group_todo_producto .= "</table>"; 
   $nm_saida->saida("    <TR >\r\n");
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridBlock . "\" style=\"text-align:left;\"  style=\"text-align: left;\"  " . "colspan=\"" . $colspan . "\"" . " align=\"\">\r\n");
   $nm_saida->saida("       " . $link_div . "\r\n");
   $nm_saida->saida("        " . $nm_nivel_book_pdf . $nm_fecha_pdf_new  . $this->Label_view_sales_detail_group_todo_producto . $nm_fecha_pdf_old . "\r\n");
   $nm_saida->saida("       " . $link_div_2 . "\r\n");
   $nm_saida->saida("     </TD>\r\n");
   $nm_saida->saida("    </TR>\r\n");
   if ('' != $this->Ini->Tree_img_col && '' != $this->Ini->Tree_img_exp && !$this->Ini->Proc_print && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao'] != "pdf" && !$this->NM_emb_tree_no)
   {
       $nm_saida->saida("    </TBODY>");
       if ($this->Ult_qb_free == $this->Tab_Nv_tree['view_sales_detail_group_todo_producto'])
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['ind_tree']++;
           $this->NM_cont_body = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['ind_tree'];
           $_SESSION['sc_session'][$this->Ini->sc_page]['NM_arr_tree']['grid_detail_sales_todo'][$this->NM_cont_body][$this->Tab_Nv_tree['view_sales_detail_group_todo_producto']] = 'bot';
           $nm_saida->saida("    <TBODY id=\"tbody_grid_detail_sales_todo_" . $this->NM_cont_body . "_bot\" style=\"display:''\">");
           $this->NM_tbody_open = true;
       }
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['embutida_grid'] && $this->nm_prim_linha)
   { 
       $nm_saida->saida("##NM@@"); 
       $this->nm_prim_linha = false; 
    } 
 } 
 function quebra_view_sales_detail_group_todo_producto_sc_free_group_by_bot($Cmp_Name) 
 {
   $Var_name_gb  = "SC_tot_" . $Cmp_Name;
   $Cmps_Gb_Free = "campos_quebra_" . $Cmp_Name;
   $Desc_Gb_Ant  = $Cmp_Name . "_ant_desc";
   global 
          $Desc_Gb_Ant, 
          $nm_saida, $$Var_name_gb;
   $tot_view_sales_detail_group_todo_producto = $$Var_name_gb;
   if ($this->Ult_qb_free != $this->Tab_Nv_tree['view_sales_detail_group_todo_producto'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao'] != "pdf" && !$this->NM_emb_tree_no)
   {
       $this->NM_tbody_open = true;
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['ind_tree']++;
       $this->NM_cont_body = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['ind_tree'];
       $_SESSION['sc_session'][$this->Ini->sc_page]['NM_arr_tree']['grid_detail_sales_todo'][$this->NM_cont_body][$this->Tab_Nv_tree['view_sales_detail_group_todo_producto']] = 'bot';
       $nm_saida->saida("    <TBODY id=\"tbody_grid_detail_sales_todo_" . $this->NM_cont_body . "_bot\" style=\"display:''\">");
   }
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['rows_emb']++;
   $Desc_Gb_Ant = $this->$Cmps_Gb_Free[0]['cmp'];
       $nm_saida->saida("    <TR class=\"" . $this->css_scGridSubtotal . "\">\r\n");
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['embutida_grid']) {
       $nm_saida->saida("    <TD class=\"" . $this->css_scGridBlockBg . "\" style=\"width: " . $this->width_tabula_quebra . "; display:" . $this->width_tabula_display . ";\">&nbsp;</TD>\r\n");
   }
   $tit_lin_sumariza_atu = "";
   $colspan  = 1;
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opc_psq'])
   {
       $colspan++;
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['embutida'] || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao_print'] == "print" || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao'] == "pdf")
   {
       $colspan--;
   } 
   foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['field_order'] as $Cada_cmp)
   {
    if ($Cada_cmp == "view_sales_detail_group_todo_fecha" && (!isset($this->NM_cmp_hidden['view_sales_detail_group_todo_fecha']) || $this->NM_cmp_hidden['view_sales_detail_group_todo_fecha'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "view_sales_detail_group_todo_cantidad" && (!isset($this->NM_cmp_hidden['view_sales_detail_group_todo_cantidad']) || $this->NM_cmp_hidden['view_sales_detail_group_todo_cantidad'] != "off"))
    {
      if ($colspan > 0)
      {
       $nm_saida->saida("     <TD class=\"" . $this->css_scGridSubtotalFont . "\"   style=\"text-align: left;\"  NOWRAP " . "colspan=\"" . $colspan . "\"" . " >" . $tit_lin_sumariza_atu . "</TD>\r\n");
           $colspan = 0;
           $tit_lin_sumariza_atu = "&nbsp;";
      }
      $conteudo =  $tot_view_sales_detail_group_todo_producto[2] ; 
      nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "0", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
       $nm_saida->saida("     <TD class=\"" . $this->css_scGridSubtotalFont . " css_view_sales_detail_group_todo_cantidad_sub_tot\"  NOWRAP >" . $conteudo . "</TD>\r\n");
     }
    if ($Cada_cmp == "view_sales_detail_group_todo_unit_value" && (!isset($this->NM_cmp_hidden['view_sales_detail_group_todo_unit_value']) || $this->NM_cmp_hidden['view_sales_detail_group_todo_unit_value'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "view_sales_detail_group_todo_producto" && (!isset($this->NM_cmp_hidden['view_sales_detail_group_todo_producto']) || $this->NM_cmp_hidden['view_sales_detail_group_todo_producto'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "valor" && (!isset($this->NM_cmp_hidden['valor']) || $this->NM_cmp_hidden['valor'] != "off"))
    {
      if ($colspan > 0)
      {
       $nm_saida->saida("     <TD class=\"" . $this->css_scGridSubtotalFont . "\"   style=\"text-align: left;\"  NOWRAP " . "colspan=\"" . $colspan . "\"" . " >" . $tit_lin_sumariza_atu . "</TD>\r\n");
           $colspan = 0;
           $tit_lin_sumariza_atu = "&nbsp;";
      }
      $conteudo =  $tot_view_sales_detail_group_todo_producto[3] ; 
      nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
       $nm_saida->saida("     <TD class=\"" . $this->css_scGridSubtotalFont . " css_valor_sub_tot\"  NOWRAP >" . $conteudo . "</TD>\r\n");
     }
    if ($Cada_cmp == "view_sales_detail_group_todo_cuentaventa" && (!isset($this->NM_cmp_hidden['view_sales_detail_group_todo_cuentaventa']) || $this->NM_cmp_hidden['view_sales_detail_group_todo_cuentaventa'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "sales_idcliente" && (!isset($this->NM_cmp_hidden['sales_idcliente']) || $this->NM_cmp_hidden['sales_idcliente'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "sales_cliente" && (!isset($this->NM_cmp_hidden['sales_cliente']) || $this->NM_cmp_hidden['sales_cliente'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "sales_factura" && (!isset($this->NM_cmp_hidden['sales_factura']) || $this->NM_cmp_hidden['sales_factura'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "customer_nombre" && (!isset($this->NM_cmp_hidden['customer_nombre']) || $this->NM_cmp_hidden['customer_nombre'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "customer_correo" && (!isset($this->NM_cmp_hidden['customer_correo']) || $this->NM_cmp_hidden['customer_correo'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "customer_celular" && (!isset($this->NM_cmp_hidden['customer_celular']) || $this->NM_cmp_hidden['customer_celular'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "customer_direccion" && (!isset($this->NM_cmp_hidden['customer_direccion']) || $this->NM_cmp_hidden['customer_direccion'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "customer_idcustomer" && (!isset($this->NM_cmp_hidden['customer_idcustomer']) || $this->NM_cmp_hidden['customer_idcustomer'] != "off"))
    {
        $colspan++;
    }
   }
   if ($colspan > 0)
   {
       $nm_saida->saida("     <TD class=\"" . $this->css_scGridSubtotalFont . "\"  style=\"text-align: left;\"  " . "colspan=\"" . $colspan . "\"" . ">" . $tit_lin_sumariza_atu . "</TD>\r\n");
       $nm_saida->saida("    </TR>\r\n");
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao'] != "pdf" && !$this->NM_emb_tree_no)
   {
       $this->NM_tbody_open = false;
       $nm_saida->saida("    </TBODY>");
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['embutida_grid'] && $this->nm_prim_linha)
   { 
       $nm_saida->saida("##NM@@"); 
       $this->nm_prim_linha = false; 
    } 
 } 
 function quebra_sales_cliente_sc_free_group_by_top($Cmp_Name) 
 {
   $Var_name_gb  = "SC_tot_" . $Cmp_Name;
   $Cmps_Gb_Free = "campos_quebra_" . $Cmp_Name;
   $Desc_Gb_Ant  = $Cmp_Name . "_ant_desc";
   global
          $Desc_Gb_Ant, 
          $nm_saida, $$Var_name_gb;
   $tot_sales_cliente = $$Var_name_gb;
   $this->SC_tab_quebra = (count($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['SC_Gb_Free_cmp']) > 1) ? 10 * $this->Tab_Nv_tree['sales_cliente'] : 0;
   $Desc_Gb_Ant = $this->$Cmps_Gb_Free[0]['cmp'];
   static $cont_quebra_sales_cliente = 0; 
   $cont_quebra_sales_cliente++;
   $nm_nivel_book_pdf = "";
   $nm_fecha_pdf_old = "";
   $nm_fecha_pdf_new = "";
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['rows_emb']++;
   $link_div   = "";
   $link_div_2 = "";
   if ('' != $this->Ini->Tree_img_col && '' != $this->Ini->Tree_img_exp && !$this->Ini->Proc_print && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao'] != "pdf" && !$this->NM_emb_tree_no)
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['ind_tree']++;
       $this->NM_cont_body = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['ind_tree'];
       $link_div  = "<table style=\"border-collapse: collapse\"><tr>";
       if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['embutida_grid']) {
          $link_div .= "<td class=\"" . $this->css_scGridBlockLineBg . "\" style=\"width: " . $this->SC_tab_quebra . "px;\">&nbsp;</td>"; 
       }
       $link_div .= "<td style=\"padding: 0px\"><span align=\"left\">";
       $link_div .= "<img id=\"b_open_grid_detail_sales_todo_" . $this->NM_cont_body . "\" style=\"display:none\" onclick=\"document.getElementById('b_open_grid_detail_sales_todo_" . $this->NM_cont_body . "').style.display = 'none'; document.getElementById('b_close_grid_detail_sales_todo_" . $this->NM_cont_body . "').style.display = ''; NM_liga_tbody(" . $this->NM_cont_body . ", NM_tab_grid_detail_sales_todo, 'grid_detail_sales_todo'); return false;\" src=\"" . $this->Ini->path_img_global . "/" . $this->Ini->Tree_img_exp . "\">";
       $link_div .= "<img id=\"b_close_grid_detail_sales_todo_" . $this->NM_cont_body . "\" style=\"display:''\" onclick=\"document.getElementById('b_close_grid_detail_sales_todo_" . $this->NM_cont_body . "').style.display = 'none'; document.getElementById('b_open_grid_detail_sales_todo_" . $this->NM_cont_body . "').style.display = ''; NM_apaga_tbody(" . $this->NM_cont_body . ", NM_tab_grid_detail_sales_todo, 'grid_detail_sales_todo'); return false;\" src=\"" . $this->Ini->path_img_global . "/" . $this->Ini->Tree_img_col . "\">";
       $link_div .= "</span></td><td  class=\"scGridBlockFont\">";
       $link_div_2 = "</td></tr></table>";
       if (isset($this->NM_tbody_open) && $this->NM_tbody_open)
       {
           $this->NM_tbody_open = false;
           $nm_saida->saida("    </TBODY>");
       }
       $_SESSION['sc_session'][$this->Ini->sc_page]['NM_arr_tree']['grid_detail_sales_todo'][$this->NM_cont_body][$this->Tab_Nv_tree['sales_cliente']] = 'top';
       $nm_saida->saida("    <TBODY id=\"tbody_grid_detail_sales_todo_" . $this->NM_cont_body . "_top\" style=\"display:''\">");
   }
   $nm_nivel_book_pdf = "";
   $nm_fecha_pdf_new  = "";
   $this->NM_calc_span();
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao'] == "pdf" && !$this->Print_All)
   {
       $nm_nivel_book_pdf = "<div style=\"height:1px;overflow:hidden\"><H5 style=\"font-size:0;padding:1px\">" .  $this->$Cmps_Gb_Free[0]['cmp'] ;
       $nm_fecha_pdf_new = "</H5></div>";
   }
   $conteudo = $tot_sales_cliente[0] ;  
    $thisColspan = 2;
   $colspan = $this->NM_colspan;
   $this->Label_sales_cliente = "<table>"; 
   $Cmps_gb = $this->$Cmps_Gb_Free;
   foreach ($Cmps_gb as $cada_campo) 
   { 
       $this->Label_sales_cliente .= "<tr>"; 
       $this->Label_sales_cliente .= "<td>" . $cada_campo['lab'] . "</td><td> => </td>";
       $this->Label_sales_cliente .= "<td>" . $cada_campo['cmp'] . "</td>";
       $this->Label_sales_cliente .= "</tr>"; 
   } 
   $this->Label_sales_cliente .= "</table>"; 
   $nm_saida->saida("    <TR >\r\n");
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridBlock . "\" style=\"text-align:left;\"  style=\"text-align: left;\"  " . "colspan=\"" . $colspan . "\"" . " align=\"\">\r\n");
   $nm_saida->saida("       " . $link_div . "\r\n");
   $nm_saida->saida("        " . $nm_nivel_book_pdf . $nm_fecha_pdf_new  . $this->Label_sales_cliente . $nm_fecha_pdf_old . "\r\n");
   $nm_saida->saida("       " . $link_div_2 . "\r\n");
   $nm_saida->saida("     </TD>\r\n");
   $nm_saida->saida("    </TR>\r\n");
   if ('' != $this->Ini->Tree_img_col && '' != $this->Ini->Tree_img_exp && !$this->Ini->Proc_print && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao'] != "pdf" && !$this->NM_emb_tree_no)
   {
       $nm_saida->saida("    </TBODY>");
       if ($this->Ult_qb_free == $this->Tab_Nv_tree['sales_cliente'])
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['ind_tree']++;
           $this->NM_cont_body = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['ind_tree'];
           $_SESSION['sc_session'][$this->Ini->sc_page]['NM_arr_tree']['grid_detail_sales_todo'][$this->NM_cont_body][$this->Tab_Nv_tree['sales_cliente']] = 'bot';
           $nm_saida->saida("    <TBODY id=\"tbody_grid_detail_sales_todo_" . $this->NM_cont_body . "_bot\" style=\"display:''\">");
           $this->NM_tbody_open = true;
       }
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['embutida_grid'] && $this->nm_prim_linha)
   { 
       $nm_saida->saida("##NM@@"); 
       $this->nm_prim_linha = false; 
    } 
 } 
 function quebra_sales_cliente_sc_free_group_by_bot($Cmp_Name) 
 {
   $Var_name_gb  = "SC_tot_" . $Cmp_Name;
   $Cmps_Gb_Free = "campos_quebra_" . $Cmp_Name;
   $Desc_Gb_Ant  = $Cmp_Name . "_ant_desc";
   global 
          $Desc_Gb_Ant, 
          $nm_saida, $$Var_name_gb;
   $tot_sales_cliente = $$Var_name_gb;
   if ($this->Ult_qb_free != $this->Tab_Nv_tree['sales_cliente'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao'] != "pdf" && !$this->NM_emb_tree_no)
   {
       $this->NM_tbody_open = true;
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['ind_tree']++;
       $this->NM_cont_body = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['ind_tree'];
       $_SESSION['sc_session'][$this->Ini->sc_page]['NM_arr_tree']['grid_detail_sales_todo'][$this->NM_cont_body][$this->Tab_Nv_tree['sales_cliente']] = 'bot';
       $nm_saida->saida("    <TBODY id=\"tbody_grid_detail_sales_todo_" . $this->NM_cont_body . "_bot\" style=\"display:''\">");
   }
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['rows_emb']++;
   $Desc_Gb_Ant = $this->$Cmps_Gb_Free[0]['cmp'];
       $nm_saida->saida("    <TR class=\"" . $this->css_scGridSubtotal . "\">\r\n");
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['embutida_grid']) {
       $nm_saida->saida("    <TD class=\"" . $this->css_scGridBlockBg . "\" style=\"width: " . $this->width_tabula_quebra . "; display:" . $this->width_tabula_display . ";\">&nbsp;</TD>\r\n");
   }
   $tit_lin_sumariza_atu = "";
   $colspan  = 1;
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opc_psq'])
   {
       $colspan++;
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['embutida'] || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao_print'] == "print" || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao'] == "pdf")
   {
       $colspan--;
   } 
   foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['field_order'] as $Cada_cmp)
   {
    if ($Cada_cmp == "view_sales_detail_group_todo_fecha" && (!isset($this->NM_cmp_hidden['view_sales_detail_group_todo_fecha']) || $this->NM_cmp_hidden['view_sales_detail_group_todo_fecha'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "view_sales_detail_group_todo_cantidad" && (!isset($this->NM_cmp_hidden['view_sales_detail_group_todo_cantidad']) || $this->NM_cmp_hidden['view_sales_detail_group_todo_cantidad'] != "off"))
    {
      if ($colspan > 0)
      {
       $nm_saida->saida("     <TD class=\"" . $this->css_scGridSubtotalFont . "\"   style=\"text-align: left;\"  NOWRAP " . "colspan=\"" . $colspan . "\"" . " >" . $tit_lin_sumariza_atu . "</TD>\r\n");
           $colspan = 0;
           $tit_lin_sumariza_atu = "&nbsp;";
      }
      $conteudo =  $tot_sales_cliente[2] ; 
      nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "0", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
       $nm_saida->saida("     <TD class=\"" . $this->css_scGridSubtotalFont . " css_view_sales_detail_group_todo_cantidad_sub_tot\"  NOWRAP >" . $conteudo . "</TD>\r\n");
     }
    if ($Cada_cmp == "view_sales_detail_group_todo_unit_value" && (!isset($this->NM_cmp_hidden['view_sales_detail_group_todo_unit_value']) || $this->NM_cmp_hidden['view_sales_detail_group_todo_unit_value'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "view_sales_detail_group_todo_producto" && (!isset($this->NM_cmp_hidden['view_sales_detail_group_todo_producto']) || $this->NM_cmp_hidden['view_sales_detail_group_todo_producto'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "valor" && (!isset($this->NM_cmp_hidden['valor']) || $this->NM_cmp_hidden['valor'] != "off"))
    {
      if ($colspan > 0)
      {
       $nm_saida->saida("     <TD class=\"" . $this->css_scGridSubtotalFont . "\"   style=\"text-align: left;\"  NOWRAP " . "colspan=\"" . $colspan . "\"" . " >" . $tit_lin_sumariza_atu . "</TD>\r\n");
           $colspan = 0;
           $tit_lin_sumariza_atu = "&nbsp;";
      }
      $conteudo =  $tot_sales_cliente[3] ; 
      nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
       $nm_saida->saida("     <TD class=\"" . $this->css_scGridSubtotalFont . " css_valor_sub_tot\"  NOWRAP >" . $conteudo . "</TD>\r\n");
     }
    if ($Cada_cmp == "view_sales_detail_group_todo_cuentaventa" && (!isset($this->NM_cmp_hidden['view_sales_detail_group_todo_cuentaventa']) || $this->NM_cmp_hidden['view_sales_detail_group_todo_cuentaventa'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "sales_idcliente" && (!isset($this->NM_cmp_hidden['sales_idcliente']) || $this->NM_cmp_hidden['sales_idcliente'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "sales_cliente" && (!isset($this->NM_cmp_hidden['sales_cliente']) || $this->NM_cmp_hidden['sales_cliente'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "sales_factura" && (!isset($this->NM_cmp_hidden['sales_factura']) || $this->NM_cmp_hidden['sales_factura'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "customer_nombre" && (!isset($this->NM_cmp_hidden['customer_nombre']) || $this->NM_cmp_hidden['customer_nombre'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "customer_correo" && (!isset($this->NM_cmp_hidden['customer_correo']) || $this->NM_cmp_hidden['customer_correo'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "customer_celular" && (!isset($this->NM_cmp_hidden['customer_celular']) || $this->NM_cmp_hidden['customer_celular'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "customer_direccion" && (!isset($this->NM_cmp_hidden['customer_direccion']) || $this->NM_cmp_hidden['customer_direccion'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "customer_idcustomer" && (!isset($this->NM_cmp_hidden['customer_idcustomer']) || $this->NM_cmp_hidden['customer_idcustomer'] != "off"))
    {
        $colspan++;
    }
   }
   if ($colspan > 0)
   {
       $nm_saida->saida("     <TD class=\"" . $this->css_scGridSubtotalFont . "\"  style=\"text-align: left;\"  " . "colspan=\"" . $colspan . "\"" . ">" . $tit_lin_sumariza_atu . "</TD>\r\n");
       $nm_saida->saida("    </TR>\r\n");
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao'] != "pdf" && !$this->NM_emb_tree_no)
   {
       $this->NM_tbody_open = false;
       $nm_saida->saida("    </TBODY>");
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['embutida_grid'] && $this->nm_prim_linha)
   { 
       $nm_saida->saida("##NM@@"); 
       $this->nm_prim_linha = false; 
    } 
 } 
 function quebra_view_sales_detail_group_todo_fecha_inicial_top() 
 { global
          $view_sales_detail_group_todo_fecha_ant_desc, 
          $nm_saida, $tot_view_sales_detail_group_todo_fecha;
   $this->SC_tab_quebra = 0;
   $view_sales_detail_group_todo_fecha_ant_desc = $this->campos_quebra_view_sales_detail_group_todo_fecha[0]['cmp'];
   static $cont_quebra_view_sales_detail_group_todo_fecha = 0; 
   $cont_quebra_view_sales_detail_group_todo_fecha++;
   $nm_nivel_book_pdf = "";
   $nm_fecha_pdf_old = "";
   $nm_fecha_pdf_new = "";
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['rows_emb']++;
   $link_div   = "";
   $link_div_2 = "";
   if ('' != $this->Ini->Tree_img_col && '' != $this->Ini->Tree_img_exp && !$this->Ini->Proc_print && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao'] != "pdf" && !$this->NM_emb_tree_no)
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['ind_tree']++;
       $this->NM_cont_body = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['ind_tree'];
       $link_div  = "<table style=\"border-collapse: collapse\"><tr>";
       if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['embutida_grid']) {
          $link_div .= "<td class=\"" . $this->css_scGridBlockLineBg . "\" style=\"width: " . $this->SC_tab_quebra . "px;\">&nbsp;</td>"; 
       }
       $link_div .= "<td style=\"padding: 0px\"><span align=\"left\">";
       $link_div .= "<img id=\"b_open_grid_detail_sales_todo_" . $this->NM_cont_body . "\" style=\"display:none\" onclick=\"document.getElementById('b_open_grid_detail_sales_todo_" . $this->NM_cont_body . "').style.display = 'none'; document.getElementById('b_close_grid_detail_sales_todo_" . $this->NM_cont_body . "').style.display = ''; NM_liga_tbody(" . $this->NM_cont_body . ", NM_tab_grid_detail_sales_todo, 'grid_detail_sales_todo'); return false;\" src=\"" . $this->Ini->path_img_global . "/" . $this->Ini->Tree_img_exp . "\">";
       $link_div .= "<img id=\"b_close_grid_detail_sales_todo_" . $this->NM_cont_body . "\" style=\"display:''\" onclick=\"document.getElementById('b_close_grid_detail_sales_todo_" . $this->NM_cont_body . "').style.display = 'none'; document.getElementById('b_open_grid_detail_sales_todo_" . $this->NM_cont_body . "').style.display = ''; NM_apaga_tbody(" . $this->NM_cont_body . ", NM_tab_grid_detail_sales_todo, 'grid_detail_sales_todo'); return false;\" src=\"" . $this->Ini->path_img_global . "/" . $this->Ini->Tree_img_col . "\">";
       $link_div .= "</span></td><td  class=\"scGridBlockFont\">";
       $link_div_2 = "</td></tr></table>";
       if (isset($this->NM_tbody_open) && $this->NM_tbody_open)
       {
           $this->NM_tbody_open = false;
           $nm_saida->saida("    </TBODY>");
       }
       $_SESSION['sc_session'][$this->Ini->sc_page]['NM_arr_tree']['grid_detail_sales_todo'][$this->NM_cont_body]['1'] = 'top';
       $nm_saida->saida("    <TBODY id=\"tbody_grid_detail_sales_todo_" . $this->NM_cont_body . "_top\" style=\"display:''\">");
   }
   $nm_nivel_book_pdf = "";
   $nm_fecha_pdf_new  = "";
   $this->NM_calc_span();
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao'] == "pdf" && !$this->Print_All)
   {
       $nm_nivel_book_pdf = "<div style=\"height:1px;overflow:hidden\"><H2 style=\"font-size:0;padding:1px\">" .  $this->campos_quebra_view_sales_detail_group_todo_fecha[0]['cmp'] ;
       $nm_fecha_pdf_new = "</H2></div>";
   }
   $conteudo = $tot_view_sales_detail_group_todo_fecha[0] ;  
    $thisColspan = 2;
   $colspan = $this->NM_colspan;
   $this->Label_view_sales_detail_group_todo_fecha = "<table>"; 
   foreach ($this->campos_quebra_view_sales_detail_group_todo_fecha as $cada_campo) 
   { 
       $this->Label_view_sales_detail_group_todo_fecha .= "<tr>"; 
       $this->Label_view_sales_detail_group_todo_fecha .= "<td>" . $cada_campo['lab'] . "</td><td> => </td>";
       $this->Label_view_sales_detail_group_todo_fecha .= "<td>" . $cada_campo['cmp'] . "</td>";
       $this->Label_view_sales_detail_group_todo_fecha .= "</tr>"; 
   } 
   $this->Label_view_sales_detail_group_todo_fecha .= "</table>"; 
   $nm_saida->saida("    <TR >\r\n");
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridBlock . "\" style=\"text-align:left;\"  style=\"text-align: left;\" NOWRAP " . "colspan=\"" . $colspan . "\"" . " align=\"\">\r\n");
   $nm_saida->saida("       " . $link_div . "\r\n");
   $nm_saida->saida("        " . $nm_nivel_book_pdf . $nm_fecha_pdf_new  . $this->Label_view_sales_detail_group_todo_fecha . $nm_fecha_pdf_old . "\r\n");
   $nm_saida->saida("       " . $link_div_2 . "\r\n");
   $nm_saida->saida("     </TD>\r\n");
   $nm_saida->saida("    </TR>\r\n");
   if ('' != $this->Ini->Tree_img_col && '' != $this->Ini->Tree_img_exp && !$this->Ini->Proc_print && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao'] != "pdf" && !$this->NM_emb_tree_no)
   {
       $nm_saida->saida("    </TBODY>");
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['embutida_grid'] && $this->nm_prim_linha)
   { 
       $nm_saida->saida("##NM@@"); 
       $this->nm_prim_linha = false; 
    } 
 } 
 function quebra_view_sales_detail_group_todo_fecha_inicial_bot() 
 { global 
          $view_sales_detail_group_todo_fecha_ant_desc, 
          $nm_saida, $tot_view_sales_detail_group_todo_fecha;
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao'] != "pdf" && !$this->NM_emb_tree_no)
   {
       $this->NM_tbody_open = true;
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['ind_tree']++;
       $this->NM_cont_body = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['ind_tree'];
       $_SESSION['sc_session'][$this->Ini->sc_page]['NM_arr_tree']['grid_detail_sales_todo'][$this->NM_cont_body]['1'] = 'bot';
       $nm_saida->saida("    <TBODY id=\"tbody_grid_detail_sales_todo_" . $this->NM_cont_body . "_bot\" style=\"display:''\">");
   }
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['rows_emb']++;
   $view_sales_detail_group_todo_fecha_ant_desc = $this->campos_quebra_view_sales_detail_group_todo_fecha[0]['cmp'];
       $nm_saida->saida("    <TR class=\"" . $this->css_scGridSubtotal . "\">\r\n");
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['embutida_grid']) {
       $nm_saida->saida("    <TD class=\"" . $this->css_scGridBlockBg . "\" style=\"width: " . $this->width_tabula_quebra . "; display:" . $this->width_tabula_display . ";\">&nbsp;</TD>\r\n");
   }
   $tit_lin_sumariza_atu = "";
   $colspan  = 1;
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opc_psq'])
   {
       $colspan++;
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['embutida'] || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao_print'] == "print" || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao'] == "pdf")
   {
       $colspan--;
   } 
   foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['field_order'] as $Cada_cmp)
   {
    if ($Cada_cmp == "view_sales_detail_group_todo_fecha" && (!isset($this->NM_cmp_hidden['view_sales_detail_group_todo_fecha']) || $this->NM_cmp_hidden['view_sales_detail_group_todo_fecha'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "view_sales_detail_group_todo_cantidad" && (!isset($this->NM_cmp_hidden['view_sales_detail_group_todo_cantidad']) || $this->NM_cmp_hidden['view_sales_detail_group_todo_cantidad'] != "off"))
    {
      if ($colspan > 0)
      {
       $nm_saida->saida("     <TD class=\"" . $this->css_scGridSubtotalFont . "\"   style=\"text-align: left;\"  NOWRAP " . "colspan=\"" . $colspan . "\"" . " >" . $tit_lin_sumariza_atu . "</TD>\r\n");
           $colspan = 0;
           $tit_lin_sumariza_atu = "&nbsp;";
      }
      $conteudo =  $tot_view_sales_detail_group_todo_fecha[2] ; 
      nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "0", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
       $nm_saida->saida("     <TD class=\"" . $this->css_scGridSubtotalFont . " css_view_sales_detail_group_todo_cantidad_sub_tot\"  NOWRAP >" . $conteudo . "</TD>\r\n");
     }
    if ($Cada_cmp == "view_sales_detail_group_todo_unit_value" && (!isset($this->NM_cmp_hidden['view_sales_detail_group_todo_unit_value']) || $this->NM_cmp_hidden['view_sales_detail_group_todo_unit_value'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "view_sales_detail_group_todo_producto" && (!isset($this->NM_cmp_hidden['view_sales_detail_group_todo_producto']) || $this->NM_cmp_hidden['view_sales_detail_group_todo_producto'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "valor" && (!isset($this->NM_cmp_hidden['valor']) || $this->NM_cmp_hidden['valor'] != "off"))
    {
      if ($colspan > 0)
      {
       $nm_saida->saida("     <TD class=\"" . $this->css_scGridSubtotalFont . "\"   style=\"text-align: left;\"  NOWRAP " . "colspan=\"" . $colspan . "\"" . " >" . $tit_lin_sumariza_atu . "</TD>\r\n");
           $colspan = 0;
           $tit_lin_sumariza_atu = "&nbsp;";
      }
      $conteudo =  $tot_view_sales_detail_group_todo_fecha[3] ; 
      nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
       $nm_saida->saida("     <TD class=\"" . $this->css_scGridSubtotalFont . " css_valor_sub_tot\"  NOWRAP >" . $conteudo . "</TD>\r\n");
     }
    if ($Cada_cmp == "view_sales_detail_group_todo_cuentaventa" && (!isset($this->NM_cmp_hidden['view_sales_detail_group_todo_cuentaventa']) || $this->NM_cmp_hidden['view_sales_detail_group_todo_cuentaventa'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "sales_idcliente" && (!isset($this->NM_cmp_hidden['sales_idcliente']) || $this->NM_cmp_hidden['sales_idcliente'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "sales_cliente" && (!isset($this->NM_cmp_hidden['sales_cliente']) || $this->NM_cmp_hidden['sales_cliente'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "sales_factura" && (!isset($this->NM_cmp_hidden['sales_factura']) || $this->NM_cmp_hidden['sales_factura'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "customer_nombre" && (!isset($this->NM_cmp_hidden['customer_nombre']) || $this->NM_cmp_hidden['customer_nombre'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "customer_correo" && (!isset($this->NM_cmp_hidden['customer_correo']) || $this->NM_cmp_hidden['customer_correo'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "customer_celular" && (!isset($this->NM_cmp_hidden['customer_celular']) || $this->NM_cmp_hidden['customer_celular'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "customer_direccion" && (!isset($this->NM_cmp_hidden['customer_direccion']) || $this->NM_cmp_hidden['customer_direccion'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "customer_idcustomer" && (!isset($this->NM_cmp_hidden['customer_idcustomer']) || $this->NM_cmp_hidden['customer_idcustomer'] != "off"))
    {
        $colspan++;
    }
   }
   if ($colspan > 0)
   {
       $nm_saida->saida("     <TD class=\"" . $this->css_scGridSubtotalFont . "\"  style=\"text-align: left;\"  " . "colspan=\"" . $colspan . "\"" . ">" . $tit_lin_sumariza_atu . "</TD>\r\n");
       $nm_saida->saida("    </TR>\r\n");
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao'] != "pdf" && !$this->NM_emb_tree_no)
   {
       $this->NM_tbody_open = false;
       $nm_saida->saida("    </TBODY>");
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['embutida_grid'] && $this->nm_prim_linha)
   { 
       $nm_saida->saida("##NM@@"); 
       $this->nm_prim_linha = false; 
    } 
 } 
 function quebra_view_sales_detail_group_todo_cuentaventa_inicial_top() 
 { global
          $view_sales_detail_group_todo_cuentaventa_ant_desc, 
          $nm_saida, $tot_view_sales_detail_group_todo_cuentaventa;
   $this->SC_tab_quebra = 10;
   $view_sales_detail_group_todo_cuentaventa_ant_desc = $this->campos_quebra_view_sales_detail_group_todo_cuentaventa[0]['cmp'];
   static $cont_quebra_view_sales_detail_group_todo_cuentaventa = 0; 
   $cont_quebra_view_sales_detail_group_todo_cuentaventa++;
   $nm_nivel_book_pdf = "";
   $nm_fecha_pdf_old = "";
   $nm_fecha_pdf_new = "";
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['rows_emb']++;
   $link_div   = "";
   $link_div_2 = "";
   if ('' != $this->Ini->Tree_img_col && '' != $this->Ini->Tree_img_exp && !$this->Ini->Proc_print && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao'] != "pdf" && !$this->NM_emb_tree_no)
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['ind_tree']++;
       $this->NM_cont_body = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['ind_tree'];
       $link_div  = "<table style=\"border-collapse: collapse\"><tr>";
       if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['embutida_grid']) {
          $link_div .= "<td class=\"" . $this->css_scGridBlockLineBg . "\" style=\"width: " . $this->SC_tab_quebra . "px;\">&nbsp;</td>"; 
       }
       $link_div .= "<td style=\"padding: 0px\"><span align=\"left\">";
       $link_div .= "<img id=\"b_open_grid_detail_sales_todo_" . $this->NM_cont_body . "\" style=\"display:none\" onclick=\"document.getElementById('b_open_grid_detail_sales_todo_" . $this->NM_cont_body . "').style.display = 'none'; document.getElementById('b_close_grid_detail_sales_todo_" . $this->NM_cont_body . "').style.display = ''; NM_liga_tbody(" . $this->NM_cont_body . ", NM_tab_grid_detail_sales_todo, 'grid_detail_sales_todo'); return false;\" src=\"" . $this->Ini->path_img_global . "/" . $this->Ini->Tree_img_exp . "\">";
       $link_div .= "<img id=\"b_close_grid_detail_sales_todo_" . $this->NM_cont_body . "\" style=\"display:''\" onclick=\"document.getElementById('b_close_grid_detail_sales_todo_" . $this->NM_cont_body . "').style.display = 'none'; document.getElementById('b_open_grid_detail_sales_todo_" . $this->NM_cont_body . "').style.display = ''; NM_apaga_tbody(" . $this->NM_cont_body . ", NM_tab_grid_detail_sales_todo, 'grid_detail_sales_todo'); return false;\" src=\"" . $this->Ini->path_img_global . "/" . $this->Ini->Tree_img_col . "\">";
       $link_div .= "</span></td><td  class=\"scGridBlockFont\">";
       $link_div_2 = "</td></tr></table>";
       if (isset($this->NM_tbody_open) && $this->NM_tbody_open)
       {
           $this->NM_tbody_open = false;
           $nm_saida->saida("    </TBODY>");
       }
       $_SESSION['sc_session'][$this->Ini->sc_page]['NM_arr_tree']['grid_detail_sales_todo'][$this->NM_cont_body]['2'] = 'top';
       $nm_saida->saida("    <TBODY id=\"tbody_grid_detail_sales_todo_" . $this->NM_cont_body . "_top\" style=\"display:''\">");
   }
   $nm_nivel_book_pdf = "";
   $nm_fecha_pdf_new  = "";
   $this->NM_calc_span();
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao'] == "pdf" && !$this->Print_All)
   {
       $nm_nivel_book_pdf = "<div style=\"height:1px;overflow:hidden\"><H3 style=\"font-size:0;padding:1px\">" .  $this->campos_quebra_view_sales_detail_group_todo_cuentaventa[0]['cmp'] ;
       $nm_fecha_pdf_new = "</H3></div>";
   }
   $conteudo = $tot_view_sales_detail_group_todo_cuentaventa[0] ;  
    $thisColspan = 2;
   $colspan = $this->NM_colspan;
   $this->Label_view_sales_detail_group_todo_cuentaventa = "<table>"; 
   foreach ($this->campos_quebra_view_sales_detail_group_todo_cuentaventa as $cada_campo) 
   { 
       $this->Label_view_sales_detail_group_todo_cuentaventa .= "<tr>"; 
       $this->Label_view_sales_detail_group_todo_cuentaventa .= "<td>" . $cada_campo['lab'] . "</td><td> => </td>";
       $this->Label_view_sales_detail_group_todo_cuentaventa .= "<td>" . $cada_campo['cmp'] . "</td>";
       $this->Label_view_sales_detail_group_todo_cuentaventa .= "</tr>"; 
   } 
   $this->Label_view_sales_detail_group_todo_cuentaventa .= "</table>"; 
   $nm_saida->saida("    <TR >\r\n");
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridBlock . "\" style=\"text-align:left;\"  style=\"text-align: left;\"  " . "colspan=\"" . $colspan . "\"" . " align=\"\">\r\n");
   $nm_saida->saida("       " . $link_div . "\r\n");
   $nm_saida->saida("        " . $nm_nivel_book_pdf . $nm_fecha_pdf_new  . $this->Label_view_sales_detail_group_todo_cuentaventa . $nm_fecha_pdf_old . "\r\n");
   $nm_saida->saida("       " . $link_div_2 . "\r\n");
   $nm_saida->saida("     </TD>\r\n");
   $nm_saida->saida("    </TR>\r\n");
   if ('' != $this->Ini->Tree_img_col && '' != $this->Ini->Tree_img_exp && !$this->Ini->Proc_print && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao'] != "pdf" && !$this->NM_emb_tree_no)
   {
       $nm_saida->saida("    </TBODY>");
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['embutida_grid'] && $this->nm_prim_linha)
   { 
       $nm_saida->saida("##NM@@"); 
       $this->nm_prim_linha = false; 
    } 
 } 
 function quebra_view_sales_detail_group_todo_cuentaventa_inicial_bot() 
 { global 
          $view_sales_detail_group_todo_cuentaventa_ant_desc, 
          $nm_saida, $tot_view_sales_detail_group_todo_cuentaventa;
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao'] != "pdf" && !$this->NM_emb_tree_no)
   {
       $this->NM_tbody_open = true;
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['ind_tree']++;
       $this->NM_cont_body = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['ind_tree'];
       $_SESSION['sc_session'][$this->Ini->sc_page]['NM_arr_tree']['grid_detail_sales_todo'][$this->NM_cont_body]['2'] = 'bot';
       $nm_saida->saida("    <TBODY id=\"tbody_grid_detail_sales_todo_" . $this->NM_cont_body . "_bot\" style=\"display:''\">");
   }
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['rows_emb']++;
   $view_sales_detail_group_todo_cuentaventa_ant_desc = $this->campos_quebra_view_sales_detail_group_todo_cuentaventa[0]['cmp'];
       $nm_saida->saida("    <TR class=\"" . $this->css_scGridSubtotal . "\">\r\n");
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['embutida_grid']) {
       $nm_saida->saida("    <TD class=\"" . $this->css_scGridBlockBg . "\" style=\"width: " . $this->width_tabula_quebra . "; display:" . $this->width_tabula_display . ";\">&nbsp;</TD>\r\n");
   }
   $tit_lin_sumariza_atu = "";
   $colspan  = 1;
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opc_psq'])
   {
       $colspan++;
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['embutida'] || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao_print'] == "print" || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao'] == "pdf")
   {
       $colspan--;
   } 
   foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['field_order'] as $Cada_cmp)
   {
    if ($Cada_cmp == "view_sales_detail_group_todo_fecha" && (!isset($this->NM_cmp_hidden['view_sales_detail_group_todo_fecha']) || $this->NM_cmp_hidden['view_sales_detail_group_todo_fecha'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "view_sales_detail_group_todo_cantidad" && (!isset($this->NM_cmp_hidden['view_sales_detail_group_todo_cantidad']) || $this->NM_cmp_hidden['view_sales_detail_group_todo_cantidad'] != "off"))
    {
      if ($colspan > 0)
      {
       $nm_saida->saida("     <TD class=\"" . $this->css_scGridSubtotalFont . "\"   style=\"text-align: left;\"  NOWRAP " . "colspan=\"" . $colspan . "\"" . " >" . $tit_lin_sumariza_atu . "</TD>\r\n");
           $colspan = 0;
           $tit_lin_sumariza_atu = "&nbsp;";
      }
      $conteudo =  $tot_view_sales_detail_group_todo_cuentaventa[2] ; 
      nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "0", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
       $nm_saida->saida("     <TD class=\"" . $this->css_scGridSubtotalFont . " css_view_sales_detail_group_todo_cantidad_sub_tot\"  NOWRAP >" . $conteudo . "</TD>\r\n");
     }
    if ($Cada_cmp == "view_sales_detail_group_todo_unit_value" && (!isset($this->NM_cmp_hidden['view_sales_detail_group_todo_unit_value']) || $this->NM_cmp_hidden['view_sales_detail_group_todo_unit_value'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "view_sales_detail_group_todo_producto" && (!isset($this->NM_cmp_hidden['view_sales_detail_group_todo_producto']) || $this->NM_cmp_hidden['view_sales_detail_group_todo_producto'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "valor" && (!isset($this->NM_cmp_hidden['valor']) || $this->NM_cmp_hidden['valor'] != "off"))
    {
      if ($colspan > 0)
      {
       $nm_saida->saida("     <TD class=\"" . $this->css_scGridSubtotalFont . "\"   style=\"text-align: left;\"  NOWRAP " . "colspan=\"" . $colspan . "\"" . " >" . $tit_lin_sumariza_atu . "</TD>\r\n");
           $colspan = 0;
           $tit_lin_sumariza_atu = "&nbsp;";
      }
      $conteudo =  $tot_view_sales_detail_group_todo_cuentaventa[3] ; 
      nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
       $nm_saida->saida("     <TD class=\"" . $this->css_scGridSubtotalFont . " css_valor_sub_tot\"  NOWRAP >" . $conteudo . "</TD>\r\n");
     }
    if ($Cada_cmp == "view_sales_detail_group_todo_cuentaventa" && (!isset($this->NM_cmp_hidden['view_sales_detail_group_todo_cuentaventa']) || $this->NM_cmp_hidden['view_sales_detail_group_todo_cuentaventa'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "sales_idcliente" && (!isset($this->NM_cmp_hidden['sales_idcliente']) || $this->NM_cmp_hidden['sales_idcliente'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "sales_cliente" && (!isset($this->NM_cmp_hidden['sales_cliente']) || $this->NM_cmp_hidden['sales_cliente'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "sales_factura" && (!isset($this->NM_cmp_hidden['sales_factura']) || $this->NM_cmp_hidden['sales_factura'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "customer_nombre" && (!isset($this->NM_cmp_hidden['customer_nombre']) || $this->NM_cmp_hidden['customer_nombre'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "customer_correo" && (!isset($this->NM_cmp_hidden['customer_correo']) || $this->NM_cmp_hidden['customer_correo'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "customer_celular" && (!isset($this->NM_cmp_hidden['customer_celular']) || $this->NM_cmp_hidden['customer_celular'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "customer_direccion" && (!isset($this->NM_cmp_hidden['customer_direccion']) || $this->NM_cmp_hidden['customer_direccion'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "customer_idcustomer" && (!isset($this->NM_cmp_hidden['customer_idcustomer']) || $this->NM_cmp_hidden['customer_idcustomer'] != "off"))
    {
        $colspan++;
    }
   }
   if ($colspan > 0)
   {
       $nm_saida->saida("     <TD class=\"" . $this->css_scGridSubtotalFont . "\"  style=\"text-align: left;\"  " . "colspan=\"" . $colspan . "\"" . ">" . $tit_lin_sumariza_atu . "</TD>\r\n");
       $nm_saida->saida("    </TR>\r\n");
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao'] != "pdf" && !$this->NM_emb_tree_no)
   {
       $this->NM_tbody_open = false;
       $nm_saida->saida("    </TBODY>");
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['embutida_grid'] && $this->nm_prim_linha)
   { 
       $nm_saida->saida("##NM@@"); 
       $this->nm_prim_linha = false; 
    } 
 } 
 function quebra_view_sales_detail_group_todo_producto_inicial_top() 
 { global
          $view_sales_detail_group_todo_producto_ant_desc, 
          $nm_saida, $tot_view_sales_detail_group_todo_producto;
   $this->SC_tab_quebra = 20;
   $view_sales_detail_group_todo_producto_ant_desc = $this->campos_quebra_view_sales_detail_group_todo_producto[0]['cmp'];
   static $cont_quebra_view_sales_detail_group_todo_producto = 0; 
   $cont_quebra_view_sales_detail_group_todo_producto++;
   $nm_nivel_book_pdf = "";
   $nm_fecha_pdf_old = "";
   $nm_fecha_pdf_new = "";
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['rows_emb']++;
   $link_div   = "";
   $link_div_2 = "";
   if ('' != $this->Ini->Tree_img_col && '' != $this->Ini->Tree_img_exp && !$this->Ini->Proc_print && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao'] != "pdf" && !$this->NM_emb_tree_no)
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['ind_tree']++;
       $this->NM_cont_body = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['ind_tree'];
       $link_div  = "<table style=\"border-collapse: collapse\"><tr>";
       if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['embutida_grid']) {
          $link_div .= "<td class=\"" . $this->css_scGridBlockLineBg . "\" style=\"width: " . $this->SC_tab_quebra . "px;\">&nbsp;</td>"; 
       }
       $link_div .= "<td style=\"padding: 0px\"><span align=\"left\">";
       $link_div .= "<img id=\"b_open_grid_detail_sales_todo_" . $this->NM_cont_body . "\" style=\"display:none\" onclick=\"document.getElementById('b_open_grid_detail_sales_todo_" . $this->NM_cont_body . "').style.display = 'none'; document.getElementById('b_close_grid_detail_sales_todo_" . $this->NM_cont_body . "').style.display = ''; NM_liga_tbody(" . $this->NM_cont_body . ", NM_tab_grid_detail_sales_todo, 'grid_detail_sales_todo'); return false;\" src=\"" . $this->Ini->path_img_global . "/" . $this->Ini->Tree_img_exp . "\">";
       $link_div .= "<img id=\"b_close_grid_detail_sales_todo_" . $this->NM_cont_body . "\" style=\"display:''\" onclick=\"document.getElementById('b_close_grid_detail_sales_todo_" . $this->NM_cont_body . "').style.display = 'none'; document.getElementById('b_open_grid_detail_sales_todo_" . $this->NM_cont_body . "').style.display = ''; NM_apaga_tbody(" . $this->NM_cont_body . ", NM_tab_grid_detail_sales_todo, 'grid_detail_sales_todo'); return false;\" src=\"" . $this->Ini->path_img_global . "/" . $this->Ini->Tree_img_col . "\">";
       $link_div .= "</span></td><td  class=\"scGridBlockFont\">";
       $link_div_2 = "</td></tr></table>";
       if (isset($this->NM_tbody_open) && $this->NM_tbody_open)
       {
           $this->NM_tbody_open = false;
           $nm_saida->saida("    </TBODY>");
       }
       $_SESSION['sc_session'][$this->Ini->sc_page]['NM_arr_tree']['grid_detail_sales_todo'][$this->NM_cont_body]['3'] = 'top';
       $nm_saida->saida("    <TBODY id=\"tbody_grid_detail_sales_todo_" . $this->NM_cont_body . "_top\" style=\"display:''\">");
   }
   $nm_nivel_book_pdf = "";
   $nm_fecha_pdf_new  = "";
   $this->NM_calc_span();
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao'] == "pdf" && !$this->Print_All)
   {
       $nm_nivel_book_pdf = "<div style=\"height:1px;overflow:hidden\"><H4 style=\"font-size:0;padding:1px\">" .  $this->campos_quebra_view_sales_detail_group_todo_producto[0]['cmp'] ;
       $nm_fecha_pdf_new = "</H4></div>";
   }
   $conteudo = $tot_view_sales_detail_group_todo_producto[0] ;  
    $thisColspan = 2;
   $colspan = $this->NM_colspan;
   $this->Label_view_sales_detail_group_todo_producto = "<table>"; 
   foreach ($this->campos_quebra_view_sales_detail_group_todo_producto as $cada_campo) 
   { 
       $this->Label_view_sales_detail_group_todo_producto .= "<tr>"; 
       $this->Label_view_sales_detail_group_todo_producto .= "<td>" . $cada_campo['lab'] . "</td><td> => </td>";
       $this->Label_view_sales_detail_group_todo_producto .= "<td>" . $cada_campo['cmp'] . "</td>";
       $this->Label_view_sales_detail_group_todo_producto .= "</tr>"; 
   } 
   $this->Label_view_sales_detail_group_todo_producto .= "</table>"; 
   $nm_saida->saida("    <TR >\r\n");
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridBlock . "\" style=\"text-align:left;\"  style=\"text-align: left;\"  " . "colspan=\"" . $colspan . "\"" . " align=\"\">\r\n");
   $nm_saida->saida("       " . $link_div . "\r\n");
   $nm_saida->saida("        " . $nm_nivel_book_pdf . $nm_fecha_pdf_new  . $this->Label_view_sales_detail_group_todo_producto . $nm_fecha_pdf_old . "\r\n");
   $nm_saida->saida("       " . $link_div_2 . "\r\n");
   $nm_saida->saida("     </TD>\r\n");
   $nm_saida->saida("    </TR>\r\n");
   if ('' != $this->Ini->Tree_img_col && '' != $this->Ini->Tree_img_exp && !$this->Ini->Proc_print && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao'] != "pdf" && !$this->NM_emb_tree_no)
   {
       $nm_saida->saida("    </TBODY>");
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['ind_tree']++;
       $this->NM_cont_body = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['ind_tree'];
       $_SESSION['sc_session'][$this->Ini->sc_page]['NM_arr_tree']['grid_detail_sales_todo'][$this->NM_cont_body]['3'] = 'bot';
       $nm_saida->saida("    <TBODY id=\"tbody_grid_detail_sales_todo_" . $this->NM_cont_body . "_bot\" style=\"display:''\">");
       $this->NM_tbody_open = true;
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['embutida_grid'] && $this->nm_prim_linha)
   { 
       $nm_saida->saida("##NM@@"); 
       $this->nm_prim_linha = false; 
    } 
 } 
 function quebra_view_sales_detail_group_todo_producto_inicial_bot() 
 { global 
          $view_sales_detail_group_todo_producto_ant_desc, 
          $nm_saida, $tot_view_sales_detail_group_todo_producto;
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['rows_emb']++;
   $view_sales_detail_group_todo_producto_ant_desc = $this->campos_quebra_view_sales_detail_group_todo_producto[0]['cmp'];
       $nm_saida->saida("    <TR class=\"" . $this->css_scGridSubtotal . "\">\r\n");
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['embutida_grid']) {
       $nm_saida->saida("    <TD class=\"" . $this->css_scGridBlockBg . "\" style=\"width: " . $this->width_tabula_quebra . "; display:" . $this->width_tabula_display . ";\">&nbsp;</TD>\r\n");
   }
   $tit_lin_sumariza_atu = "";
   $colspan  = 1;
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opc_psq'])
   {
       $colspan++;
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['embutida'] || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao_print'] == "print" || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao'] == "pdf")
   {
       $colspan--;
   } 
   foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['field_order'] as $Cada_cmp)
   {
    if ($Cada_cmp == "view_sales_detail_group_todo_fecha" && (!isset($this->NM_cmp_hidden['view_sales_detail_group_todo_fecha']) || $this->NM_cmp_hidden['view_sales_detail_group_todo_fecha'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "view_sales_detail_group_todo_cantidad" && (!isset($this->NM_cmp_hidden['view_sales_detail_group_todo_cantidad']) || $this->NM_cmp_hidden['view_sales_detail_group_todo_cantidad'] != "off"))
    {
      if ($colspan > 0)
      {
       $nm_saida->saida("     <TD class=\"" . $this->css_scGridSubtotalFont . "\"   style=\"text-align: left;\"  NOWRAP " . "colspan=\"" . $colspan . "\"" . " >" . $tit_lin_sumariza_atu . "</TD>\r\n");
           $colspan = 0;
           $tit_lin_sumariza_atu = "&nbsp;";
      }
      $conteudo =  $tot_view_sales_detail_group_todo_producto[2] ; 
      nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "0", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
       $nm_saida->saida("     <TD class=\"" . $this->css_scGridSubtotalFont . " css_view_sales_detail_group_todo_cantidad_sub_tot\"  NOWRAP >" . $conteudo . "</TD>\r\n");
     }
    if ($Cada_cmp == "view_sales_detail_group_todo_unit_value" && (!isset($this->NM_cmp_hidden['view_sales_detail_group_todo_unit_value']) || $this->NM_cmp_hidden['view_sales_detail_group_todo_unit_value'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "view_sales_detail_group_todo_producto" && (!isset($this->NM_cmp_hidden['view_sales_detail_group_todo_producto']) || $this->NM_cmp_hidden['view_sales_detail_group_todo_producto'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "valor" && (!isset($this->NM_cmp_hidden['valor']) || $this->NM_cmp_hidden['valor'] != "off"))
    {
      if ($colspan > 0)
      {
       $nm_saida->saida("     <TD class=\"" . $this->css_scGridSubtotalFont . "\"   style=\"text-align: left;\"  NOWRAP " . "colspan=\"" . $colspan . "\"" . " >" . $tit_lin_sumariza_atu . "</TD>\r\n");
           $colspan = 0;
           $tit_lin_sumariza_atu = "&nbsp;";
      }
      $conteudo =  $tot_view_sales_detail_group_todo_producto[3] ; 
      nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
       $nm_saida->saida("     <TD class=\"" . $this->css_scGridSubtotalFont . " css_valor_sub_tot\"  NOWRAP >" . $conteudo . "</TD>\r\n");
     }
    if ($Cada_cmp == "view_sales_detail_group_todo_cuentaventa" && (!isset($this->NM_cmp_hidden['view_sales_detail_group_todo_cuentaventa']) || $this->NM_cmp_hidden['view_sales_detail_group_todo_cuentaventa'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "sales_idcliente" && (!isset($this->NM_cmp_hidden['sales_idcliente']) || $this->NM_cmp_hidden['sales_idcliente'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "sales_cliente" && (!isset($this->NM_cmp_hidden['sales_cliente']) || $this->NM_cmp_hidden['sales_cliente'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "sales_factura" && (!isset($this->NM_cmp_hidden['sales_factura']) || $this->NM_cmp_hidden['sales_factura'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "customer_nombre" && (!isset($this->NM_cmp_hidden['customer_nombre']) || $this->NM_cmp_hidden['customer_nombre'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "customer_correo" && (!isset($this->NM_cmp_hidden['customer_correo']) || $this->NM_cmp_hidden['customer_correo'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "customer_celular" && (!isset($this->NM_cmp_hidden['customer_celular']) || $this->NM_cmp_hidden['customer_celular'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "customer_direccion" && (!isset($this->NM_cmp_hidden['customer_direccion']) || $this->NM_cmp_hidden['customer_direccion'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "customer_idcustomer" && (!isset($this->NM_cmp_hidden['customer_idcustomer']) || $this->NM_cmp_hidden['customer_idcustomer'] != "off"))
    {
        $colspan++;
    }
   }
   if ($colspan > 0)
   {
       $nm_saida->saida("     <TD class=\"" . $this->css_scGridSubtotalFont . "\"  style=\"text-align: left;\"  " . "colspan=\"" . $colspan . "\"" . ">" . $tit_lin_sumariza_atu . "</TD>\r\n");
       $nm_saida->saida("    </TR>\r\n");
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao'] != "pdf" && !$this->NM_emb_tree_no)
   {
       $this->NM_tbody_open = false;
       $nm_saida->saida("    </TBODY>");
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['embutida_grid'] && $this->nm_prim_linha)
   { 
       $nm_saida->saida("##NM@@"); 
       $this->nm_prim_linha = false; 
    } 
 } 
 function quebra_geral_sc_free_group_by_top() 
 {
   global $nm_saida; 
   if (isset($this->NM_tbody_open) && $this->NM_tbody_open)
   {
       $nm_saida->saida("    </TBODY>");
   }
 }
 function quebra_geral_sc_free_group_by_bot() 
 {
   global 
          $nm_saida, $nm_data; 
   $this->Tot->quebra_geral_sc_free_group_by(); 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['rows_emb']++;
   $nm_nivel_book_pdf = "";
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao'] == "pdf" && !$this->Print_All)
   {
      $nm_nivel_book_pdf = "<div style=\"height:1px;overflow:hidden\"><H1 style=\"font-size:0;padding:1px\">" .  $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['tot_geral'][0] . "</H1></div>";
   }
   $tit_lin_sumariza      =  $nm_nivel_book_pdf . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['tot_geral'][0] . "(" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['tot_geral'][1] . ")";
   $tit_lin_sumariza_orig =  $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['tot_geral'][0] . "(" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['tot_geral'][1] . ")";
       $nm_saida->saida("    <TR class=\"" . $this->css_scGridTotal . "\">\r\n");
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['embutida_grid']) {
       $nm_saida->saida("    <TD class=\"" . $this->css_scGridBlockBg . "\" style=\"width: " . $this->width_tabula_quebra  . "; display:" . $this->width_tabula_display . ";\">&nbsp;</TD>\r\n");
   }
   $tit_lin_sumariza_atu = $tit_lin_sumariza;
   $colspan  = 1;
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opc_psq'])
   {
       $colspan++;
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['embutida'] || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao_print'] == "print" || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao'] == "pdf")
   {
       $colspan--;
   } 
   foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['field_order'] as $Cada_cmp)
   {
    if ($Cada_cmp == "view_sales_detail_group_todo_fecha" && (!isset($this->NM_cmp_hidden['view_sales_detail_group_todo_fecha']) || $this->NM_cmp_hidden['view_sales_detail_group_todo_fecha'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "view_sales_detail_group_todo_cantidad" && (!isset($this->NM_cmp_hidden['view_sales_detail_group_todo_cantidad']) || $this->NM_cmp_hidden['view_sales_detail_group_todo_cantidad'] != "off"))
    {
      if ($colspan > 0)
      {
       $nm_saida->saida("     <TD class=\"" . $this->css_scGridTotalFont . "\" style=\"text-align: left;\"  " . "colspan=\"" . $colspan . "\"" . ">" . $tit_lin_sumariza_atu . "</TD>\r\n");
          $tit_lin_sumariza_atu = "&nbsp;";
          $colspan = 0;
      }
      $conteudo =  $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['tot_geral'][2] ; 
      nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "0", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
       $nm_saida->saida("     <TD class=\"" . $this->css_scGridTotalFont . " css_view_sales_detail_group_todo_cantidad_tot_ger\"  NOWRAP >" . $conteudo . "</TD>\r\n");
     }
    if ($Cada_cmp == "view_sales_detail_group_todo_unit_value" && (!isset($this->NM_cmp_hidden['view_sales_detail_group_todo_unit_value']) || $this->NM_cmp_hidden['view_sales_detail_group_todo_unit_value'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "view_sales_detail_group_todo_producto" && (!isset($this->NM_cmp_hidden['view_sales_detail_group_todo_producto']) || $this->NM_cmp_hidden['view_sales_detail_group_todo_producto'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "valor" && (!isset($this->NM_cmp_hidden['valor']) || $this->NM_cmp_hidden['valor'] != "off"))
    {
      if ($colspan > 0)
      {
       $nm_saida->saida("     <TD class=\"" . $this->css_scGridTotalFont . "\" style=\"text-align: left;\" NOWRAP " . "colspan=\"" . $colspan . "\"" . ">" . $tit_lin_sumariza_atu . "</TD>\r\n");
          $tit_lin_sumariza_atu = "&nbsp;";
          $colspan = 0;
      }
      $conteudo =  $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['tot_geral'][3] ; 
      nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
       $nm_saida->saida("     <TD class=\"" . $this->css_scGridTotalFont . " css_valor_tot_ger\"  NOWRAP >" . $conteudo . "</TD>\r\n");
     }
    if ($Cada_cmp == "view_sales_detail_group_todo_cuentaventa" && (!isset($this->NM_cmp_hidden['view_sales_detail_group_todo_cuentaventa']) || $this->NM_cmp_hidden['view_sales_detail_group_todo_cuentaventa'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "sales_idcliente" && (!isset($this->NM_cmp_hidden['sales_idcliente']) || $this->NM_cmp_hidden['sales_idcliente'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "sales_cliente" && (!isset($this->NM_cmp_hidden['sales_cliente']) || $this->NM_cmp_hidden['sales_cliente'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "sales_factura" && (!isset($this->NM_cmp_hidden['sales_factura']) || $this->NM_cmp_hidden['sales_factura'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "customer_nombre" && (!isset($this->NM_cmp_hidden['customer_nombre']) || $this->NM_cmp_hidden['customer_nombre'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "customer_correo" && (!isset($this->NM_cmp_hidden['customer_correo']) || $this->NM_cmp_hidden['customer_correo'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "customer_celular" && (!isset($this->NM_cmp_hidden['customer_celular']) || $this->NM_cmp_hidden['customer_celular'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "customer_direccion" && (!isset($this->NM_cmp_hidden['customer_direccion']) || $this->NM_cmp_hidden['customer_direccion'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "customer_idcustomer" && (!isset($this->NM_cmp_hidden['customer_idcustomer']) || $this->NM_cmp_hidden['customer_idcustomer'] != "off"))
    {
       $colspan++;
    }
   }
   if ($colspan > 0)
   {
       $nm_saida->saida("     <TD class=\"" . $this->css_scGridTotalFont . "\"   " . "colspan=\"" . $colspan . "\"" . ">&nbsp;</TD>\r\n");
       $nm_saida->saida("    </TR>\r\n");
   }
 } 
 function quebra_geral_inicial_top() 
 {
   global $nm_saida; 
   if (isset($this->NM_tbody_open) && $this->NM_tbody_open)
   {
       $nm_saida->saida("    </TBODY>");
   }
 }
 function quebra_geral_inicial_bot() 
 {
   global 
          $nm_saida, $nm_data; 
   $this->Tot->quebra_geral_inicial(); 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['rows_emb']++;
   $nm_nivel_book_pdf = "";
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao'] == "pdf" && !$this->Print_All)
   {
      $nm_nivel_book_pdf = "<div style=\"height:1px;overflow:hidden\"><H1 style=\"font-size:0;padding:1px\">" .  $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['tot_geral'][0] . "</H1></div>";
   }
   $tit_lin_sumariza      =  $nm_nivel_book_pdf . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['tot_geral'][0] . "(" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['tot_geral'][1] . ")";
   $tit_lin_sumariza_orig =  $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['tot_geral'][0] . "(" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['tot_geral'][1] . ")";
       $nm_saida->saida("    <TR class=\"" . $this->css_scGridTotal . "\">\r\n");
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['embutida_grid']) {
       $nm_saida->saida("    <TD class=\"" . $this->css_scGridBlockBg . "\" style=\"width: " . $this->width_tabula_quebra  . "; display:" . $this->width_tabula_display . ";\">&nbsp;</TD>\r\n");
   }
   $tit_lin_sumariza_atu = $tit_lin_sumariza;
   $colspan  = 1;
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opc_psq'])
   {
       $colspan++;
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['embutida'] || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao_print'] == "print" || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao'] == "pdf")
   {
       $colspan--;
   } 
   foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['field_order'] as $Cada_cmp)
   {
    if ($Cada_cmp == "view_sales_detail_group_todo_fecha" && (!isset($this->NM_cmp_hidden['view_sales_detail_group_todo_fecha']) || $this->NM_cmp_hidden['view_sales_detail_group_todo_fecha'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "view_sales_detail_group_todo_cantidad" && (!isset($this->NM_cmp_hidden['view_sales_detail_group_todo_cantidad']) || $this->NM_cmp_hidden['view_sales_detail_group_todo_cantidad'] != "off"))
    {
      if ($colspan > 0)
      {
       $nm_saida->saida("     <TD class=\"" . $this->css_scGridTotalFont . "\" style=\"text-align: left;\"  " . "colspan=\"" . $colspan . "\"" . ">" . $tit_lin_sumariza_atu . "</TD>\r\n");
          $tit_lin_sumariza_atu = "&nbsp;";
          $colspan = 0;
      }
      $conteudo =  $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['tot_geral'][2] ; 
      nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "0", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
       $nm_saida->saida("     <TD class=\"" . $this->css_scGridTotalFont . " css_view_sales_detail_group_todo_cantidad_tot_ger\"  NOWRAP >" . $conteudo . "</TD>\r\n");
     }
    if ($Cada_cmp == "view_sales_detail_group_todo_unit_value" && (!isset($this->NM_cmp_hidden['view_sales_detail_group_todo_unit_value']) || $this->NM_cmp_hidden['view_sales_detail_group_todo_unit_value'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "view_sales_detail_group_todo_producto" && (!isset($this->NM_cmp_hidden['view_sales_detail_group_todo_producto']) || $this->NM_cmp_hidden['view_sales_detail_group_todo_producto'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "valor" && (!isset($this->NM_cmp_hidden['valor']) || $this->NM_cmp_hidden['valor'] != "off"))
    {
      if ($colspan > 0)
      {
       $nm_saida->saida("     <TD class=\"" . $this->css_scGridTotalFont . "\" style=\"text-align: left;\" NOWRAP " . "colspan=\"" . $colspan . "\"" . ">" . $tit_lin_sumariza_atu . "</TD>\r\n");
          $tit_lin_sumariza_atu = "&nbsp;";
          $colspan = 0;
      }
      $conteudo =  $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['tot_geral'][3] ; 
      nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
       $nm_saida->saida("     <TD class=\"" . $this->css_scGridTotalFont . " css_valor_tot_ger\"  NOWRAP >" . $conteudo . "</TD>\r\n");
     }
    if ($Cada_cmp == "view_sales_detail_group_todo_cuentaventa" && (!isset($this->NM_cmp_hidden['view_sales_detail_group_todo_cuentaventa']) || $this->NM_cmp_hidden['view_sales_detail_group_todo_cuentaventa'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "sales_idcliente" && (!isset($this->NM_cmp_hidden['sales_idcliente']) || $this->NM_cmp_hidden['sales_idcliente'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "sales_cliente" && (!isset($this->NM_cmp_hidden['sales_cliente']) || $this->NM_cmp_hidden['sales_cliente'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "sales_factura" && (!isset($this->NM_cmp_hidden['sales_factura']) || $this->NM_cmp_hidden['sales_factura'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "customer_nombre" && (!isset($this->NM_cmp_hidden['customer_nombre']) || $this->NM_cmp_hidden['customer_nombre'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "customer_correo" && (!isset($this->NM_cmp_hidden['customer_correo']) || $this->NM_cmp_hidden['customer_correo'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "customer_celular" && (!isset($this->NM_cmp_hidden['customer_celular']) || $this->NM_cmp_hidden['customer_celular'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "customer_direccion" && (!isset($this->NM_cmp_hidden['customer_direccion']) || $this->NM_cmp_hidden['customer_direccion'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "customer_idcustomer" && (!isset($this->NM_cmp_hidden['customer_idcustomer']) || $this->NM_cmp_hidden['customer_idcustomer'] != "off"))
    {
       $colspan++;
    }
   }
   if ($colspan > 0)
   {
       $nm_saida->saida("     <TD class=\"" . $this->css_scGridTotalFont . "\"   " . "colspan=\"" . $colspan . "\"" . ">&nbsp;</TD>\r\n");
       $nm_saida->saida("    </TR>\r\n");
   }
 } 
 function quebra_geral__NM_SC__top() 
 {
 }
 function quebra_geral__NM_SC__bot() 
 {
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
   function nmgp_barra_top_normal()
   {
      global 
             $nm_saida, $nm_url_saida, $nm_apl_dependente;
      $NM_btn  = false;
      $NM_Gbtn = false;
      $nm_saida->saida("      <tr style=\"display: none\">\r\n");
      $nm_saida->saida("      <td>\r\n");
      $nm_saida->saida("      <form id=\"id_F0_top\" name=\"F0_top\" method=\"post\" action=\"./\" target=\"_self\"> \r\n");
      $nm_saida->saida("      <input type=\"text\" id=\"id_sc_truta_f0_top\" name=\"sc_truta_f0_top\" value=\"\"/> \r\n");
      $nm_saida->saida("      <input type=\"hidden\" id=\"script_init_f0_top\" name=\"script_case_init\" value=\"" . NM_encode_input($this->Ini->sc_page) . "\"/> \r\n");
      $nm_saida->saida("      <input type=\"hidden\" id=\"opcao_f0_top\" name=\"nmgp_opcao\" value=\"muda_qt_linhas\"/> \r\n");
      $nm_saida->saida("      </td></tr><tr id=\"sc_grid_toobar_top_tr\">\r\n");
      $nm_saida->saida("       <td id=\"sc_grid_toobar_top\"  class=\"" . $this->css_scGridTabelaTd . "\" valign=\"top\"> \r\n");
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['ajax_nav'])
      { 
          $_SESSION['scriptcase']['saida_html'] = "";
      } 
      $nm_saida->saida("        <table id=\"sc_grid_toobar_top_table\" class=\"" . $this->css_scGridToolbar . "\" style=\"padding: 0px; border-spacing: 0px; border-width: 0px; vertical-align: top;\" width=\"100%\" valign=\"top\">\r\n");
      $nm_saida->saida("         <tr class=\"" . $this->css_scGridToolbarPadd . "_tr\"> \r\n");
      $nm_saida->saida("          <td class=\"" . $this->css_scGridToolbarPadd . "\" nowrap valign=\"middle\" align=\"left\" width=\"33%\"> \r\n");
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao_print'] != "print") 
      {
      if (!$this->Ini->SC_Link_View && $this->nmgp_botoes['qsearch'] == "on")
      {
          $nm_saida->saida("           <script type=\"text/javascript\">var change_fast_top = \"\";</script>\r\n");
          $OPC_cmp = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['fast_search'][0] : "";
          $OPC_arg = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['fast_search'][1] : "";
          $OPC_dat = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['fast_search'][2] : "";
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['ajax_nav'])
          {
              $this->Ini->Arr_result['setVar'][] = array('var' => 'change_fast_top', 'value' => "");
          }
          if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($OPC_cmp))
          {
              $OPC_cmp = NM_conv_charset($OPC_cmp, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($OPC_arg))
          {
              $OPC_arg = NM_conv_charset($OPC_arg, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($OPC_dat))
          {
              $OPC_dat = NM_conv_charset($OPC_dat, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $stateSearchIconClose  = 'none';
          $stateSearchIconSearch = '';
          if(!empty($OPC_dat))
          {
              $stateSearchIconClose  = '';
              $stateSearchIconSearch = 'none';
          }
          $nm_saida->saida("          <input type=\"hidden\"  id=\"fast_search_f0_top\" name=\"nmgp_fast_search\" value=\"SC_all_Cmp\">\r\n");
          $nm_saida->saida("          <select id=\"cond_fast_search_f0_top\" class=\"" . $this->css_css_toolbar_obj . "\" style=\"vertical-align: middle;display:none;\" name=\"nmgp_cond_fast_search\" onChange=\"change_fast_top = 'CH';\">\r\n");
          $OPC_sel = " selected='selected'";
          $nm_saida->saida("           <option value=\"qp\"$OPC_sel>" . $this->Ini->Nm_lang['lang_srch_like'] . "</option>\r\n");
          $nm_saida->saida("          </select>\r\n");
          $nm_saida->saida("          <span id=\"quicksearchph_top\" class=\"" . $this->css_css_toolbar_obj . "\" style='display: inline-block; vertical-align: inherit;'>\r\n");
          $nm_saida->saida("           <span>\r\n");
          $nm_saida->saida("             <input type=\"text\" id=\"SC_fast_search_top\" class=\"" . $this->css_css_toolbar_obj . "_text\" style=\"border-width: 0px;\" name=\"nmgp_arg_fast_search\" value=\"" . NM_encode_input($OPC_dat) . "\" size=\"10\" onChange=\"change_fast_top = 'CH';\" alt=\"{maxLength: 255}\" placeholder=\"" . $this->Ini->Nm_lang['lang_othr_qk_watermark'] . "\">&nbsp;\r\n");
          $nm_saida->saida("             <img style=\"display: " . $stateSearchIconSearch . "\" id=\"SC_fast_search_submit_top\" class='css_toolbar_obj_qs_search_img' src=\"" . $this->Ini->path_botoes . "/" . $this->Ini->Img_qs_search . "\" onclick=\"nm_gp_submit_qsearch('top');\">\r\n");
          $nm_saida->saida("             <img style=\"display: " . $stateSearchIconClose . "\" class='css_toolbar_obj_qs_search_img' id=\"SC_fast_search_close_top\" src=\"" . $this->Ini->path_botoes . "/" . $this->Ini->Img_qs_clean . "\" onclick=\"document.getElementById('SC_fast_search_top').value = '__Clear_Fast__'; nm_gp_submit_qsearch('top');\">\r\n");
          $nm_saida->saida("            </span>\r\n");
          $nm_saida->saida("          </span>");
          $NM_btn = true;
      }
          $nm_saida->saida("         </td> \r\n");
          $nm_saida->saida("          <td class=\"" . $this->css_scGridToolbarPadd . "\" nowrap valign=\"middle\" align=\"center\" width=\"33%\"> \r\n");
      if ($this->nmgp_botoes['group_2'] == "on" && !$this->grid_emb_form)
      {
          $nm_saida->saida("           <script type=\"text/javascript\">var sc_itens_btgp_group_2_top = false;</script>\r\n");
          $Cod_Btn = nmButtonOutput($this->arr_buttons, "group_group_2", "scBtnGrpShow('group_2_top')", "scBtnGrpShow('group_2_top')", "sc_btgp_btn_group_2_top", "", "" . $this->Ini->Nm_lang['lang_btns_expt_email_title'] . "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "" . $this->Ini->Nm_lang['lang_btns_expt_email'] . "", "", "", "__sc_grp__", "text_img", "text_right", "", "", "", "", "", "", "");
          $nm_saida->saida("           $Cod_Btn\r\n");
          $NM_btn  = true;
          $NM_Gbtn = false;
          $Cod_Btn = nmButtonGroupTableOutput($this->arr_buttons, "group_group_2", 'group_2', 'top', 'list', 'ini');
          $nm_saida->saida("           $Cod_Btn\r\n");
          $Cod_Btn = nmButtonGroupTableOutput($this->arr_buttons, "group_group_2", 'group_2', 'top', 'list', 'fim');
          $nm_saida->saida("           $Cod_Btn\r\n");
          $nm_saida->saida("           <script type=\"text/javascript\">\r\n");
          $nm_saida->saida("             if (!sc_itens_btgp_group_2_top) {\r\n");
          $nm_saida->saida("                 document.getElementById('sc_btgp_btn_group_2_top').style.display='none'; }\r\n");
          $nm_saida->saida("           </script>\r\n");
      }
      if ($this->nmgp_botoes['group_1'] == "on" && !$this->grid_emb_form)
      {
          $nm_saida->saida("           <script type=\"text/javascript\">var sc_itens_btgp_group_1_top = false;</script>\r\n");
          $Cod_Btn = nmButtonOutput($this->arr_buttons, "group_group_1", "scBtnGrpShow('group_1_top')", "scBtnGrpShow('group_1_top')", "sc_btgp_btn_group_1_top", "", "" . $this->Ini->Nm_lang['lang_btns_expt'] . "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "" . $this->Ini->Nm_lang['lang_btns_expt'] . "", "", "", "__sc_grp__", "text_img", "text_right", "", "", "", "", "", "", "");
          $nm_saida->saida("           $Cod_Btn\r\n");
          $NM_btn  = true;
          $NM_Gbtn = false;
          $Cod_Btn = nmButtonGroupTableOutput($this->arr_buttons, "group_group_1", 'group_1', 'top', 'list', 'ini');
          $nm_saida->saida("           $Cod_Btn\r\n");
      if ($this->nmgp_botoes['pdf'] == "on" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opc_psq'] && empty($this->nm_grid_sem_reg) && !$this->grid_emb_form)
      {
          $nm_saida->saida("           <script type=\"text/javascript\">sc_itens_btgp_group_1_top = true;</script>\r\n");
      $Tem_gb_pdf  = "s";
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['SC_Ind_Groupby'] == "_NM_SC_")
      {
          $Tem_gb_pdf = "n";
      }
      $Tem_pdf_res = "n";
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['SC_Ind_Groupby'] != "_NM_SC_")
      {
          $Tem_pdf_res = "s";
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['SC_Ind_Groupby'] == "sc_free_group_by" && empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['SC_Gb_Free_cmp']))
      {
          $Tem_pdf_res = "n";
      }
              $this->nm_btn_exist['pdf'][] = "pdf_top";
          $nm_saida->saida("            <div id=\"div_pdf_top\" class=\"scBtnGrpText scBtnGrpClick\">\r\n");
              $Cod_Btn = nmButtonOutput($this->arr_buttons, "bpdf", "", "", "pdf_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "thickbox", "" . $this->Ini->path_link . "grid_detail_sales_todo/grid_detail_sales_todo_config_pdf.php?nm_opc=pdf&nm_target=0&nm_cor=cor&papel=8&lpapel=279&apapel=216&orientacao=1&bookmarks=1&largura=1200&conf_larg=S&conf_fonte=10&grafico=S&sc_ver_93=s&nm_tem_gb=" . $Tem_gb_pdf . "&nm_res_cons=" . $Tem_pdf_res . "&nm_ini_pdf_res=grid,resume&nm_all_modules=grid,resume,chart&nm_label_group=N&nm_all_cab=S&nm_all_label=S&nm_orient_grid=2&password=n&summary_export_columns=S&pdf_zip=N&origem=cons&language=es&conf_socor=N&script_case_init=" . $this->Ini->sc_page . "&app_name=grid_detail_sales_todo&KeepThis=true&TB_iframe=true&modal=true", "group_1", "only_text", "text_right", "", "", "", "", "", "", "");
              $nm_saida->saida("           $Cod_Btn \r\n");
          $nm_saida->saida("            </div>\r\n");
              $NM_Gbtn = true;
      }
      if ($this->nmgp_botoes['word'] == "on" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opc_psq'] && empty($this->nm_grid_sem_reg) && !$this->grid_emb_form)
      {
          $nm_saida->saida("           <script type=\"text/javascript\">sc_itens_btgp_group_1_top = true;</script>\r\n");
          $Tem_word_res = "n";
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['SC_Ind_Groupby'] != "_NM_SC_")
          {
              $Tem_word_res = "s";
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['SC_Ind_Groupby'] == "sc_free_group_by" && empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['SC_Gb_Free_cmp']))
          {
              $Tem_word_res = "n";
          }
          $nm_saida->saida("            <div id=\"div_word_top\" class=\"scBtnGrpText scBtnGrpClick\">\r\n");
              $this->nm_btn_exist['word'][] = "word_top";
              $Cod_Btn = nmButtonOutput($this->arr_buttons, "bword", "", "", "word_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "thickbox", "" . $this->Ini->path_link . "grid_detail_sales_todo/grid_detail_sales_todo_config_word.php?script_case_init=" . $this->Ini->sc_page . "&summary_export_columns=S&nm_cor=CO&nm_res_cons=" . $Tem_word_res . "&nm_ini_word_res=grid,resume&nm_all_modules=grid,resume,chart&password=n&origem=cons&language=es&KeepThis=true&TB_iframe=true&modal=true", "group_1", "only_text", "text_right", "", "", "", "", "", "", "");
              $nm_saida->saida("           $Cod_Btn \r\n");
          $nm_saida->saida("            </div>\r\n");
              $NM_Gbtn = true;
      }
      if ($this->nmgp_botoes['xls'] == "on" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opc_psq'] && empty($this->nm_grid_sem_reg) && !$this->grid_emb_form)
      {
          $nm_saida->saida("           <script type=\"text/javascript\">sc_itens_btgp_group_1_top = true;</script>\r\n");
          $Tem_xls_res = "n";
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['SC_Ind_Groupby'] != "_NM_SC_")
          {
              $Tem_xls_res = "s";
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['SC_Ind_Groupby'] == "sc_free_group_by" && empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['SC_Gb_Free_cmp']))
          {
              $Tem_xls_res = "n";
          }
          $nm_saida->saida("            <div id=\"div_xls_top\" class=\"scBtnGrpText scBtnGrpClick\">\r\n");
              $this->nm_btn_exist['xls'][] = "xls_top";
              $Cod_Btn = nmButtonOutput($this->arr_buttons, "bexcel", "", "", "xls_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "thickbox", "" . $this->Ini->path_link . "grid_detail_sales_todo/grid_detail_sales_todo_config_xls.php?script_case_init=" . $this->Ini->sc_page . "&app_name=grid_detail_sales_todo&nm_tp_xls=xlsx&nm_tot_xls=S&nm_res_cons=" . $Tem_xls_res . "&nm_ini_xls_res=grid,resume&nm_all_modules=grid,resume,chart&password=n&summary_export_columns=S&origem=cons&language=es&KeepThis=true&TB_iframe=true&modal=true", "group_1", "only_text", "text_right", "", "", "", "", "", "", "");
              $nm_saida->saida("           $Cod_Btn \r\n");
          $nm_saida->saida("            </div>\r\n");
              $NM_Gbtn = true;
      }
      if ($this->nmgp_botoes['xml'] == "on" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opc_psq'] && empty($this->nm_grid_sem_reg) && !$this->grid_emb_form)
      {
          $nm_saida->saida("           <script type=\"text/javascript\">sc_itens_btgp_group_1_top = true;</script>\r\n");
          $Tem_xml_res = "n";
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['SC_Ind_Groupby'] != "_NM_SC_")
          {
              $Tem_xml_res = "s";
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['SC_Ind_Groupby'] == "sc_free_group_by" && empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['SC_Gb_Free_cmp']))
          {
              $Tem_xml_res = "n";
          }
          $nm_saida->saida("            <div id=\"div_xml_top\" class=\"scBtnGrpText scBtnGrpClick\">\r\n");
              $this->nm_btn_exist['xml'][] = "xml_top";
              $Cod_Btn = nmButtonOutput($this->arr_buttons, "bxml", "", "", "xml_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "thickbox", "" . $this->Ini->path_link . "grid_detail_sales_todo/grid_detail_sales_todo_config_xml.php?script_case_init=" . $this->Ini->sc_page . "&summary_export_columns=S&password=n&nm_res_cons=" . $Tem_xml_res . "&nm_ini_xml_res=grid,resume&nm_all_modules=grid,resume,chart&nm_xml_tag=tag&nm_xml_label=S&language=&origem=cons&KeepThis=true&TB_iframe=true&modal=true", "group_1", "only_text", "text_right", "", "", "", "", "", "", "");
              $nm_saida->saida("           $Cod_Btn \r\n");
          $nm_saida->saida("            </div>\r\n");
              $NM_Gbtn = true;
      }
      if ($this->nmgp_botoes['csv'] == "on" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opc_psq'] && empty($this->nm_grid_sem_reg) && !$this->grid_emb_form)
      {
          $nm_saida->saida("           <script type=\"text/javascript\">sc_itens_btgp_group_1_top = true;</script>\r\n");
          $Tem_csv_res = "n";
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['SC_Ind_Groupby'] != "_NM_SC_")
          {
              $Tem_csv_res = "s";
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['SC_Ind_Groupby'] == "sc_free_group_by" && empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['SC_Gb_Free_cmp']))
          {
              $Tem_csv_res = "n";
          }
          $nm_saida->saida("            <div id=\"div_csv_top\" class=\"scBtnGrpText scBtnGrpClick\">\r\n");
              $this->nm_btn_exist['csv'][] = "csv_top";
              $Cod_Btn = nmButtonOutput($this->arr_buttons, "bcsv", "", "", "csv_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "thickbox", "" . $this->Ini->path_link . "grid_detail_sales_todo/grid_detail_sales_todo_config_csv.php?script_case_init=" . $this->Ini->sc_page . "&summary_export_columns=S&password=n&nm_res_cons=" . $Tem_csv_res . "&nm_ini_csv_res=grid,resume&nm_all_modules=grid,resume,chart&nm_delim_line=1&nm_delim_col=1&nm_delim_dados=1&nm_label_csv=N&language=&origem=cons&KeepThis=true&TB_iframe=true&modal=true", "group_1", "only_text", "text_right", "", "", "", "", "", "", "");
              $nm_saida->saida("           $Cod_Btn \r\n");
          $nm_saida->saida("            </div>\r\n");
              $NM_Gbtn = true;
      }
      if ($this->nmgp_botoes['rtf'] == "on" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opc_psq'] && empty($this->nm_grid_sem_reg) && !$this->grid_emb_form)
      {
          $nm_saida->saida("           <script type=\"text/javascript\">sc_itens_btgp_group_1_top = true;</script>\r\n");
          $nm_saida->saida("            <div id=\"div_rtf_top\" class=\"scBtnGrpText scBtnGrpClick\">\r\n");
              $this->nm_btn_exist['rtf'][] = "rtf_top";
              $Cod_Btn = nmButtonOutput($this->arr_buttons, "brtf", "nm_gp_rtf_conf();", "nm_gp_rtf_conf();", "rtf_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "group_1", "only_text", "text_right", "", "", "", "", "", "", "");
              $nm_saida->saida("           $Cod_Btn \r\n");
          $nm_saida->saida("            </div>\r\n");
              $NM_Gbtn = true;
      }
          if ($NM_Gbtn)
          {
                  $nm_saida->saida("           </td></tr><tr><td class=\"scBtnGrpBackground\">\r\n");
              $NM_Gbtn = false;
          }
      if ($this->nmgp_botoes['print'] == "on" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opc_psq'] && empty($this->nm_grid_sem_reg) && !$this->grid_emb_form)
      {
          $Tem_pdf_res = "n";
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['SC_Ind_Groupby'] != "_NM_SC_")
          {
              $Tem_pdf_res = "s";
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['SC_Ind_Groupby'] == "sc_free_group_by" && empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['SC_Gb_Free_cmp']))
          {
              $Tem_pdf_res = "n";
          }
          $nm_saida->saida("           <script type=\"text/javascript\">sc_itens_btgp_group_1_top = true;</script>\r\n");
          $nm_saida->saida("            <div id=\"div_print_top\" class=\"scBtnGrpText scBtnGrpClick\">\r\n");
              $this->nm_btn_exist['print'][] = "print_top";
              $Cod_Btn = nmButtonOutput($this->arr_buttons, "bprint", "", "", "print_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "thickbox", "" . $this->Ini->path_link . "grid_detail_sales_todo/grid_detail_sales_todo_config_print.php?script_case_init=" . $this->Ini->sc_page . "&summary_export_columns=S&nm_opc=RC&nm_cor=CO&password=n&language=es&nm_page=" . NM_encode_input($this->Ini->sc_page) . "&nm_res_cons=" . $Tem_pdf_res . "&nm_ini_prt_res=grid,resume&nm_all_modules=grid,resume,chart&origem=cons&KeepThis=true&TB_iframe=true&modal=true", "group_1", "only_text", "text_right", "", "", "", "", "", "", "");
              $nm_saida->saida("           $Cod_Btn \r\n");
          $nm_saida->saida("            </div>\r\n");
              $NM_Gbtn = true;
      }
          $Cod_Btn = nmButtonGroupTableOutput($this->arr_buttons, "group_group_1", 'group_1', 'top', 'list', 'fim');
          $nm_saida->saida("           $Cod_Btn\r\n");
          $nm_saida->saida("           <script type=\"text/javascript\">\r\n");
          $nm_saida->saida("             if (!sc_itens_btgp_group_1_top) {\r\n");
          $nm_saida->saida("                 document.getElementById('sc_btgp_btn_group_1_top').style.display='none'; }\r\n");
          $nm_saida->saida("           </script>\r\n");
      }
      if (is_file($this->Ini->root . $this->Ini->path_img_global . $this->Ini->Img_sep_grid))
      {
          if ($NM_btn)
          {
              $NM_btn = false;
              $NM_ult_sep = "NM_sep_1";
              $nm_saida->saida("          <img id=\"NM_sep_1\" class=\"NM_toolbar_sep\" src=\"" . $this->Ini->path_img_global . $this->Ini->Img_sep_grid . "\" align=\"absmiddle\" style=\"vertical-align: middle;\">\r\n");
          }
      }
      if (!$this->Ini->SC_Link_View && $this->nmgp_botoes['filter'] == "on"  && !$this->grid_emb_form)
      {
           $this->nm_btn_exist['filter'][] = "pesq_top";
           $Cod_Btn = nmButtonOutput($this->arr_buttons, "bpesquisa", "nm_gp_move('busca', '0', 'grid');", "nm_gp_move('busca', '0', 'grid');", "pesq_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
           $nm_saida->saida("           $Cod_Btn \r\n");
           $NM_btn = true;
      }
          $nm_saida->saida("         </td> \r\n");
          $nm_saida->saida("          <td class=\"" . $this->css_scGridToolbarPadd . "\" nowrap valign=\"middle\" align=\"right\" width=\"33%\"> \r\n");
        if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['SC_Ind_Groupby'] != "_NM_SC_")
        {
        }
          if (is_file("grid_detail_sales_todo_help.txt") && !$this->grid_emb_form)
          {
             $Arq_WebHelp = file("grid_detail_sales_todo_help.txt"); 
             if (isset($Arq_WebHelp[0]) && !empty($Arq_WebHelp[0]))
             {
                 $Arq_WebHelp[0] = str_replace("\r\n" , "", trim($Arq_WebHelp[0]));
                 $Tmp = explode(";", $Arq_WebHelp[0]); 
                 foreach ($Tmp as $Cada_help)
                 {
                     $Tmp1 = explode(":", $Cada_help); 
                     if (!empty($Tmp1[0]) && isset($Tmp1[1]) && !empty($Tmp1[1]) && $Tmp1[0] == "cons" && is_file($this->Ini->root . $this->Ini->path_help . $Tmp1[1]))
                     {
                        $Cod_Btn = nmButtonOutput($this->arr_buttons, "bhelp", "nm_open_popup('" . $this->Ini->path_help . $Tmp1[1] . "');", "nm_open_popup('" . $this->Ini->path_help . $Tmp1[1] . "');", "help_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
                        $nm_saida->saida("           $Cod_Btn \r\n");
                        $NM_btn = true;
                     }
                 }
             }
          }
      if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['b_sair'] || $this->grid_emb_form || $this->grid_emb_form_full)
      {
         $this->nmgp_botoes['exit'] = "off"; 
      }
      if ($this->nmgp_botoes['exit'] == "on")
      {
          $this->nm_btn_exist['exit'][] = "sai_top";
        if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['SC_Ind_Groupby'] != "_NM_SC_")
        {
         $Cod_Btn = nmButtonOutput($this->arr_buttons, "bvoltar", "nm_gp_move('resumo', '0');", "nm_gp_move('resumo', '0');", "sai_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
         $nm_saida->saida("           $Cod_Btn \r\n");
         $NM_btn = true;
        }
      }
      }
      $nm_saida->saida("         </td> \r\n");
      $nm_saida->saida("        </tr> \r\n");
      $nm_saida->saida("       </table> \r\n");
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['ajax_nav'])
      { 
          $this->Ini->Arr_result['setValue'][] = array('field' => 'sc_grid_toobar_top', 'value' => NM_charset_to_utf8($_SESSION['scriptcase']['saida_html']));
          $_SESSION['scriptcase']['saida_html'] = "";
      } 
      $nm_saida->saida("      </td> \r\n");
      $nm_saida->saida("     </tr> \r\n");
      $nm_saida->saida("      <tr style=\"display: none\">\r\n");
      $nm_saida->saida("      <td> \r\n");
      $nm_saida->saida("     </form> \r\n");
      $nm_saida->saida("      </td> \r\n");
      $nm_saida->saida("     </tr> \r\n");
      if (!$NM_btn && isset($NM_ult_sep))
      {
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['ajax_nav'])
          { 
              $this->Ini->Arr_result['setDisplay'][] = array('field' => $NM_ult_sep, 'value' => 'none');
          } 
          $nm_saida->saida("     <script language=\"javascript\">\r\n");
          $nm_saida->saida("        document.getElementById('" . $NM_ult_sep . "').style.display='none';\r\n");
          $nm_saida->saida("     </script>\r\n");
      }
   }
   function nmgp_barra_bot_normal()
   {
      global 
             $nm_saida, $nm_url_saida, $nm_apl_dependente;
      $NM_btn  = false;
      $NM_Gbtn = false;
      $this->NM_calc_span();
      $nm_saida->saida("      <tr style=\"display: none\">\r\n");
      $nm_saida->saida("      <td>\r\n");
      $nm_saida->saida("      <form id=\"id_F0_bot\" name=\"F0_bot\" method=\"post\" action=\"./\" target=\"_self\"> \r\n");
      $nm_saida->saida("      <input type=\"text\" id=\"id_sc_truta_f0_bot\" name=\"sc_truta_f0_bot\" value=\"\"/> \r\n");
      $nm_saida->saida("      <input type=\"hidden\" id=\"script_init_f0_bot\" name=\"script_case_init\" value=\"" . NM_encode_input($this->Ini->sc_page) . "\"/> \r\n");
      $nm_saida->saida("      <input type=\"hidden\" id=\"opcao_f0_bot\" name=\"nmgp_opcao\" value=\"muda_qt_linhas\"/> \r\n");
      $nm_saida->saida("      </td></tr><tr id=\"sc_grid_toobar_bot_tr\">\r\n");
      $nm_saida->saida("       <td id=\"sc_grid_toobar_bot\"  class=\"" . $this->css_scGridTabelaTd . "\" valign=\"top\"> \r\n");
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['ajax_nav'])
      { 
          $_SESSION['scriptcase']['saida_html'] = "";
      } 
      $nm_saida->saida("        <table id=\"sc_grid_toobar_bot_table\" class=\"" . $this->css_scGridToolbar . "\" style=\"padding: 0px; border-spacing: 0px; border-width: 0px; vertical-align: top;\" width=\"100%\" valign=\"top\">\r\n");
      $nm_saida->saida("         <tr class=\"" . $this->css_scGridToolbarPadd . "_tr\"> \r\n");
      $nm_saida->saida("          <td class=\"" . $this->css_scGridToolbarPadd . "\" nowrap valign=\"middle\" align=\"left\" width=\"33%\"> \r\n");
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao_print'] != "print") 
      {
          if (empty($this->nm_grid_sem_reg) && $this->nmgp_botoes['goto'] == "on" && $this->Ini->Apl_paginacao != "FULL" )
          {
              $Reg_Page  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['qt_lin_grid'];
              $this->nm_btn_exist['goto'][] = "brec_bot";
              $Cod_Btn = nmButtonOutput($this->arr_buttons, "birpara", "var rec_nav = ((document.getElementById('rec_f0_bot').value - 1) * " . NM_encode_input($Reg_Page) . ") + 1; nm_gp_submit_ajax('muda_rec_linhas', rec_nav);", "var rec_nav = ((document.getElementById('rec_f0_bot').value - 1) * " . NM_encode_input($Reg_Page) . ") + 1; nm_gp_submit_ajax('muda_rec_linhas', rec_nav);", "brec_bot", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
              $nm_saida->saida("           $Cod_Btn \r\n");
              $Page_Atu   = ceil($this->nmgp_reg_inicial / $Reg_Page);
              $nm_saida->saida("          <input id=\"rec_f0_bot\" type=\"text\" class=\"" . $this->css_css_toolbar_obj . "\" name=\"rec\" value=\"" . NM_encode_input($Page_Atu) . "\" style=\"width:25px;vertical-align: middle;\"/> \r\n");
              $NM_btn = true;
          }
          if (empty($this->nm_grid_sem_reg) && $this->nmgp_botoes['qtline'] == "on" && $this->Ini->Apl_paginacao != "FULL")
          {
              $nm_saida->saida("          <span class=\"" . $this->css_css_toolbar_obj . "\" style=\"border: 0px;vertical-align: middle;\">" . $this->Ini->Nm_lang['lang_btns_rows'] . "</span>\r\n");
              $nm_saida->saida("          <select class=\"" . $this->css_css_toolbar_obj . "\" style=\"vertical-align: middle;\" id=\"quant_linhas_f0_bot\" name=\"nmgp_quant_linhas\" onchange=\"sc_ind = document.getElementById('quant_linhas_f0_bot').selectedIndex; nm_gp_submit_ajax('muda_qt_linhas', document.getElementById('quant_linhas_f0_bot').options[sc_ind].value);\"> \r\n");
              $obj_sel = ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['qt_lin_grid'] == 5) ? " selected" : "";
              $nm_saida->saida("           <option value=\"5\" " . $obj_sel . ">5</option>\r\n");
              $obj_sel = ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['qt_lin_grid'] == 10) ? " selected" : "";
              $nm_saida->saida("           <option value=\"10\" " . $obj_sel . ">10</option>\r\n");
              $obj_sel = ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['qt_lin_grid'] == 20) ? " selected" : "";
              $nm_saida->saida("           <option value=\"20\" " . $obj_sel . ">20</option>\r\n");
              $obj_sel = ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['qt_lin_grid'] == 50) ? " selected" : "";
              $nm_saida->saida("           <option value=\"50\" " . $obj_sel . ">50</option>\r\n");
              $nm_saida->saida("          </select>\r\n");
              $NM_btn = true;
          }
          $nm_saida->saida("         </td> \r\n");
          $nm_saida->saida("          <td class=\"" . $this->css_scGridToolbarPadd . "\" nowrap valign=\"middle\" align=\"center\" width=\"33%\"> \r\n");
          if ($this->nmgp_botoes['first'] == "on" && empty($this->nm_grid_sem_reg) && $this->Ini->Apl_paginacao != "FULL" && !isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opc_liga']['nav']))
          {
              $this->nm_btn_exist['first'][] = "first_bot";
              if ($this->Rec_ini == 0)
              {
                  $Cod_Btn = nmButtonOutput($this->arr_buttons, "bcons_inicio", "nm_gp_submit_rec('ini');", "nm_gp_submit_rec('ini');", "first_bot", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "disabled", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
                  $nm_saida->saida("           $Cod_Btn \r\n");
              }
              else
              {
                  $Cod_Btn = nmButtonOutput($this->arr_buttons, "bcons_inicio", "nm_gp_submit_rec('ini');", "nm_gp_submit_rec('ini');", "first_bot", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
                  $nm_saida->saida("           $Cod_Btn \r\n");
              }
                  $NM_btn = true;
          }
          if ($this->nmgp_botoes['back'] == "on" && empty($this->nm_grid_sem_reg) && $this->Ini->Apl_paginacao != "FULL" && !isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opc_liga']['nav']))
          {
              $this->nm_btn_exist['back'][] = "back_bot";
              if ($this->Rec_ini == 0)
              {
                  $Cod_Btn = nmButtonOutput($this->arr_buttons, "bcons_retorna", "nm_gp_submit_rec('" . $this->Rec_ini . "');", "nm_gp_submit_rec('" . $this->Rec_ini . "');", "back_bot", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "disabled", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
                  $nm_saida->saida("           $Cod_Btn \r\n");
              }
              else
              {
                  $Cod_Btn = nmButtonOutput($this->arr_buttons, "bcons_retorna", "nm_gp_submit_rec('" . $this->Rec_ini . "');", "nm_gp_submit_rec('" . $this->Rec_ini . "');", "back_bot", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
                  $nm_saida->saida("           $Cod_Btn \r\n");
              }
                  $NM_btn = true;
          }
          if (empty($this->nm_grid_sem_reg) && $this->nmgp_botoes['navpage'] == "on" && !isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opc_liga']['nav']) && $this->Ini->Apl_paginacao != "FULL" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['qt_lin_grid'] != "all")
          {
              $Reg_Page  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['qt_lin_grid'];
              $Max_link   = 5;
              $Mid_link   = ceil($Max_link / 2);
              $Corr_link  = (($Max_link % 2) == 0) ? 0 : 1;
              $Qtd_Pages  = ceil($this->count_ger / $Reg_Page);
              $Page_Atu   = ceil($this->nmgp_reg_final / $Reg_Page);
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
                      $nm_saida->saida("            <span class=\"scGridToolbarNavOpen\" style=\"vertical-align: middle;\">" . $Link_ini . "</span>\r\n");
                  }
                  else
                  {
                      $nm_saida->saida("            <a class=\"scGridToolbarNav\" style=\"vertical-align: middle;\" href=\"javascript: nm_gp_submit_rec(" . $rec . ");\">" . $Link_ini . "</a>\r\n");
                  }
                  $Link_ini++;
                  if (($x + 1) < $Max_link && $Link_ini <= $Qtd_Pages && '' != $this->Ini->Str_toolbarnav_separator && @is_file($this->Ini->root . $this->Ini->path_img_global . $this->Ini->Str_toolbarnav_separator))
                  {
                      $nm_saida->saida("            <img src=\"" . $this->Ini->path_img_global . $this->Ini->Str_toolbarnav_separator . "\" align=\"absmiddle\" style=\"vertical-align: middle;\">\r\n");
                  }
              }
              $NM_btn = true;
          }
          if ($this->nmgp_botoes['forward'] == "on" && empty($this->nm_grid_sem_reg) && $this->Ini->Apl_paginacao != "FULL" && !isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opc_liga']['nav']))
          {
              $this->nm_btn_exist['forward'][] = "forward_bot";
              $Cod_Btn = nmButtonOutput($this->arr_buttons, "bcons_avanca", "nm_gp_submit_rec('" . $this->Rec_fim . "');", "nm_gp_submit_rec('" . $this->Rec_fim . "');", "forward_bot", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
              $nm_saida->saida("           $Cod_Btn \r\n");
              $NM_btn = true;
          }
          if ($this->nmgp_botoes['last'] == "on" && empty($this->nm_grid_sem_reg) && $this->Ini->Apl_paginacao != "FULL" && !isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opc_liga']['nav']))
          {
              $this->nm_btn_exist['last'][] = "last_bot";
              $Cod_Btn = nmButtonOutput($this->arr_buttons, "bcons_final", "nm_gp_submit_rec('fim');", "nm_gp_submit_rec('fim');", "last_bot", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
              $nm_saida->saida("           $Cod_Btn \r\n");
              $NM_btn = true;
          }
          $nm_saida->saida("         </td> \r\n");
          $nm_saida->saida("          <td class=\"" . $this->css_scGridToolbarPadd . "\" nowrap valign=\"middle\" align=\"right\" width=\"33%\"> \r\n");
          if ($this->nmgp_botoes['rows'] == "on" && empty($this->nm_grid_sem_reg))
          {
              $nm_sumario = "[" . $this->Ini->Nm_lang['lang_othr_smry_info'] . "]";
              $nm_sumario = str_replace("?start?", $this->nmgp_reg_inicial, $nm_sumario);
              if ($this->Ini->Apl_paginacao == "FULL")
              {
                  $nm_sumario = str_replace("?final?", "<span class='sm_counter_final'>".$this->count_ger."</span>", $nm_sumario);
              }
              else
              {
                  $nm_sumario = str_replace("?final?", "<span class='sm_counter_final'>".$this->nmgp_reg_final."</span>", $nm_sumario);
              }
              $nm_sumario = str_replace("?total?", "<span class='sm_counter_total'>".$this->count_ger."</span>", $nm_sumario);
              $nm_saida->saida("           <span class=\"summary_indicator " . $this->css_css_toolbar_obj . "\" style=\"border:0px;\"><span class='sm_counter'>" . $nm_sumario . "</span></span>\r\n");
              $NM_btn = true;
          }
          if (is_file("grid_detail_sales_todo_help.txt") && !$this->grid_emb_form)
          {
             $Arq_WebHelp = file("grid_detail_sales_todo_help.txt"); 
             if (isset($Arq_WebHelp[0]) && !empty($Arq_WebHelp[0]))
             {
                 $Arq_WebHelp[0] = str_replace("\r\n" , "", trim($Arq_WebHelp[0]));
                 $Tmp = explode(";", $Arq_WebHelp[0]); 
                 foreach ($Tmp as $Cada_help)
                 {
                     $Tmp1 = explode(":", $Cada_help); 
                     if (!empty($Tmp1[0]) && isset($Tmp1[1]) && !empty($Tmp1[1]) && $Tmp1[0] == "cons" && is_file($this->Ini->root . $this->Ini->path_help . $Tmp1[1]))
                     {
                        $Cod_Btn = nmButtonOutput($this->arr_buttons, "bhelp", "nm_open_popup('" . $this->Ini->path_help . $Tmp1[1] . "');", "nm_open_popup('" . $this->Ini->path_help . $Tmp1[1] . "');", "help_bot", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
                        $nm_saida->saida("           $Cod_Btn \r\n");
                        $NM_btn = true;
                     }
                 }
             }
          }
      }
      $nm_saida->saida("         </td> \r\n");
      $nm_saida->saida("        </tr> \r\n");
      $nm_saida->saida("       </table> \r\n");
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['ajax_nav'])
      { 
          $this->Ini->Arr_result['setValue'][] = array('field' => 'sc_grid_toobar_bot', 'value' => NM_charset_to_utf8($_SESSION['scriptcase']['saida_html']));
          $_SESSION['scriptcase']['saida_html'] = "";
      } 
      $nm_saida->saida("      </td> \r\n");
      $nm_saida->saida("     </tr> \r\n");
      $nm_saida->saida("      <tr style=\"display: none\">\r\n");
      $nm_saida->saida("      <td> \r\n");
      $nm_saida->saida("     </form> \r\n");
      $nm_saida->saida("      </td> \r\n");
      $nm_saida->saida("     </tr> \r\n");
      if (!$NM_btn && isset($NM_ult_sep))
      {
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['ajax_nav'])
          { 
              $this->Ini->Arr_result['setDisplay'][] = array('field' => $NM_ult_sep, 'value' => 'none');
          } 
          $nm_saida->saida("     <script language=\"javascript\">\r\n");
          $nm_saida->saida("        document.getElementById('" . $NM_ult_sep . "').style.display='none';\r\n");
          $nm_saida->saida("     </script>\r\n");
      }
   }
   function nmgp_barra_top_mobile()
   {
      global 
             $nm_saida, $nm_url_saida, $nm_apl_dependente;
      $NM_btn  = false;
      $NM_Gbtn = false;
      $nm_saida->saida("      <tr style=\"display: none\">\r\n");
      $nm_saida->saida("      <td>\r\n");
      $nm_saida->saida("      <form id=\"id_F0_top\" name=\"F0_top\" method=\"post\" action=\"./\" target=\"_self\"> \r\n");
      $nm_saida->saida("      <input type=\"text\" id=\"id_sc_truta_f0_top\" name=\"sc_truta_f0_top\" value=\"\"/> \r\n");
      $nm_saida->saida("      <input type=\"hidden\" id=\"script_init_f0_top\" name=\"script_case_init\" value=\"" . NM_encode_input($this->Ini->sc_page) . "\"/> \r\n");
      $nm_saida->saida("      <input type=\"hidden\" id=\"opcao_f0_top\" name=\"nmgp_opcao\" value=\"muda_qt_linhas\"/> \r\n");
      $nm_saida->saida("      </td></tr><tr id=\"sc_grid_toobar_top_tr\">\r\n");
      $nm_saida->saida("       <td id=\"sc_grid_toobar_top\"  class=\"" . $this->css_scGridTabelaTd . "\" valign=\"top\"> \r\n");
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['ajax_nav'])
      { 
          $_SESSION['scriptcase']['saida_html'] = "";
      } 
      $nm_saida->saida("        <table id=\"sc_grid_toobar_top_table\" class=\"" . $this->css_scGridToolbar . "\" style=\"padding: 0px; border-spacing: 0px; border-width: 0px; vertical-align: top;\" width=\"100%\" valign=\"top\">\r\n");
      $nm_saida->saida("         <tr class=\"" . $this->css_scGridToolbarPadd . "_tr\"> \r\n");
      $nm_saida->saida("          <td class=\"" . $this->css_scGridToolbarPadd . "\" nowrap valign=\"middle\" align=\"left\" width=\"33%\"> \r\n");
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao_print'] != "print") 
      {
      if (!$this->Ini->SC_Link_View && $this->nmgp_botoes['qsearch'] == "on")
      {
          $nm_saida->saida("           <script type=\"text/javascript\">var change_fast_top = \"\";</script>\r\n");
          $OPC_cmp = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['fast_search'][0] : "";
          $OPC_arg = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['fast_search'][1] : "";
          $OPC_dat = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['fast_search'][2] : "";
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['ajax_nav'])
          {
              $this->Ini->Arr_result['setVar'][] = array('var' => 'change_fast_top', 'value' => "");
          }
          if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($OPC_cmp))
          {
              $OPC_cmp = NM_conv_charset($OPC_cmp, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($OPC_arg))
          {
              $OPC_arg = NM_conv_charset($OPC_arg, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($OPC_dat))
          {
              $OPC_dat = NM_conv_charset($OPC_dat, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $stateSearchIconClose  = 'none';
          $stateSearchIconSearch = '';
          if(!empty($OPC_dat))
          {
              $stateSearchIconClose  = '';
              $stateSearchIconSearch = 'none';
          }
          $nm_saida->saida("          <input type=\"hidden\"  id=\"fast_search_f0_top\" name=\"nmgp_fast_search\" value=\"SC_all_Cmp\">\r\n");
          $nm_saida->saida("          <select id=\"cond_fast_search_f0_top\" class=\"" . $this->css_css_toolbar_obj . "\" style=\"vertical-align: middle;display:none;\" name=\"nmgp_cond_fast_search\" onChange=\"change_fast_top = 'CH';\">\r\n");
          $OPC_sel = " selected='selected'";
          $nm_saida->saida("           <option value=\"qp\"$OPC_sel>" . $this->Ini->Nm_lang['lang_srch_like'] . "</option>\r\n");
          $nm_saida->saida("          </select>\r\n");
          $nm_saida->saida("          <span id=\"quicksearchph_top\" class=\"" . $this->css_css_toolbar_obj . "\" style='display: inline-block; vertical-align: inherit;'>\r\n");
          $nm_saida->saida("           <span>\r\n");
          $nm_saida->saida("             <input type=\"text\" id=\"SC_fast_search_top\" class=\"" . $this->css_css_toolbar_obj . "_text\" style=\"border-width: 0px;\" name=\"nmgp_arg_fast_search\" value=\"" . NM_encode_input($OPC_dat) . "\" size=\"10\" onChange=\"change_fast_top = 'CH';\" alt=\"{maxLength: 255}\" placeholder=\"" . $this->Ini->Nm_lang['lang_othr_qk_watermark'] . "\">&nbsp;\r\n");
          $nm_saida->saida("             <img style=\"display: " . $stateSearchIconSearch . "\" id=\"SC_fast_search_submit_top\" class='css_toolbar_obj_qs_search_img' src=\"" . $this->Ini->path_botoes . "/" . $this->Ini->Img_qs_search . "\" onclick=\"nm_gp_submit_qsearch('top');\">\r\n");
          $nm_saida->saida("             <img style=\"display: " . $stateSearchIconClose . "\" class='css_toolbar_obj_qs_search_img' id=\"SC_fast_search_close_top\" src=\"" . $this->Ini->path_botoes . "/" . $this->Ini->Img_qs_clean . "\" onclick=\"document.getElementById('SC_fast_search_top').value = '__Clear_Fast__'; nm_gp_submit_qsearch('top');\">\r\n");
          $nm_saida->saida("            </span>\r\n");
          $nm_saida->saida("          </span>");
          $NM_btn = true;
      }
      if ($this->nmgp_botoes['group_3'] == "on" && !$this->grid_emb_form)
      {
          $nm_saida->saida("           <script type=\"text/javascript\">var sc_itens_btgp_group_3_top = false;</script>\r\n");
          $Cod_Btn = nmButtonOutput($this->arr_buttons, "group_group_3", "scBtnGrpShow('group_3_top')", "scBtnGrpShow('group_3_top')", "sc_btgp_btn_group_3_top", "", "" . $this->Ini->Nm_lang['lang_btns_expt_email_title'] . "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "" . $this->Ini->Nm_lang['lang_btns_expt_email'] . "", "", "", "__sc_grp__", "text_img", "text_right", "", "", "", "", "", "", "");
          $nm_saida->saida("           $Cod_Btn\r\n");
          $NM_btn  = true;
          $NM_Gbtn = false;
          $Cod_Btn = nmButtonGroupTableOutput($this->arr_buttons, "group_group_3", 'group_3', 'top', 'list', 'ini');
          $nm_saida->saida("           $Cod_Btn\r\n");
          $Cod_Btn = nmButtonGroupTableOutput($this->arr_buttons, "group_group_3", 'group_3', 'top', 'list', 'fim');
          $nm_saida->saida("           $Cod_Btn\r\n");
          $nm_saida->saida("           <script type=\"text/javascript\">\r\n");
          $nm_saida->saida("             if (!sc_itens_btgp_group_3_top) {\r\n");
          $nm_saida->saida("                 document.getElementById('sc_btgp_btn_group_3_top').style.display='none'; }\r\n");
          $nm_saida->saida("           </script>\r\n");
      }
      if ($this->nmgp_botoes['group_4'] == "on" && !$this->grid_emb_form)
      {
          $nm_saida->saida("           <script type=\"text/javascript\">var sc_itens_btgp_group_4_top = false;</script>\r\n");
          $Cod_Btn = nmButtonOutput($this->arr_buttons, "group_group_4", "scBtnGrpShow('group_4_top')", "scBtnGrpShow('group_4_top')", "sc_btgp_btn_group_4_top", "", "" . $this->Ini->Nm_lang['lang_btns_expt'] . "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "" . $this->Ini->Nm_lang['lang_btns_expt'] . "", "", "", "__sc_grp__", "text_img", "text_right", "", "", "", "", "", "", "");
          $nm_saida->saida("           $Cod_Btn\r\n");
          $NM_btn  = true;
          $NM_Gbtn = false;
          $Cod_Btn = nmButtonGroupTableOutput($this->arr_buttons, "group_group_4", 'group_4', 'top', 'list', 'ini');
          $nm_saida->saida("           $Cod_Btn\r\n");
      if ($this->nmgp_botoes['pdf'] == "on" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opc_psq'] && empty($this->nm_grid_sem_reg) && !$this->grid_emb_form)
      {
          $nm_saida->saida("           <script type=\"text/javascript\">sc_itens_btgp_group_4_top = true;</script>\r\n");
      $Tem_gb_pdf  = "s";
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['SC_Ind_Groupby'] == "_NM_SC_")
      {
          $Tem_gb_pdf = "n";
      }
      $Tem_pdf_res = "n";
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['SC_Ind_Groupby'] != "_NM_SC_")
      {
          $Tem_pdf_res = "s";
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['SC_Ind_Groupby'] == "sc_free_group_by" && empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['SC_Gb_Free_cmp']))
      {
          $Tem_pdf_res = "n";
      }
              $this->nm_btn_exist['pdf'][] = "pdf_top";
          $nm_saida->saida("            <div id=\"div_pdf_top\" class=\"scBtnGrpText scBtnGrpClick\">\r\n");
              $Cod_Btn = nmButtonOutput($this->arr_buttons, "bpdf", "", "", "pdf_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "thickbox", "" . $this->Ini->path_link . "grid_detail_sales_todo/grid_detail_sales_todo_config_pdf.php?nm_opc=pdf&nm_target=0&nm_cor=cor&papel=8&lpapel=279&apapel=216&orientacao=1&bookmarks=1&largura=1200&conf_larg=S&conf_fonte=10&grafico=S&sc_ver_93=s&nm_tem_gb=" . $Tem_gb_pdf . "&nm_res_cons=" . $Tem_pdf_res . "&nm_ini_pdf_res=grid,resume&nm_all_modules=grid,resume,chart&nm_label_group=N&nm_all_cab=S&nm_all_label=S&nm_orient_grid=2&password=n&summary_export_columns=S&pdf_zip=N&origem=cons&language=es&conf_socor=N&script_case_init=" . $this->Ini->sc_page . "&app_name=grid_detail_sales_todo&KeepThis=true&TB_iframe=true&modal=true", "group_4", "only_text", "text_right", "", "", "", "", "", "", "");
              $nm_saida->saida("           $Cod_Btn \r\n");
          $nm_saida->saida("            </div>\r\n");
              $NM_Gbtn = true;
      }
          if ($NM_Gbtn)
          {
                  $nm_saida->saida("           </td></tr><tr><td class=\"scBtnGrpBackground\">\r\n");
              $NM_Gbtn = false;
          }
      if ($this->nmgp_botoes['word'] == "on" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opc_psq'] && empty($this->nm_grid_sem_reg) && !$this->grid_emb_form)
      {
          $nm_saida->saida("           <script type=\"text/javascript\">sc_itens_btgp_group_4_top = true;</script>\r\n");
          $Tem_word_res = "n";
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['SC_Ind_Groupby'] != "_NM_SC_")
          {
              $Tem_word_res = "s";
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['SC_Ind_Groupby'] == "sc_free_group_by" && empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['SC_Gb_Free_cmp']))
          {
              $Tem_word_res = "n";
          }
          $nm_saida->saida("            <div id=\"div_word_top\" class=\"scBtnGrpText scBtnGrpClick\">\r\n");
              $this->nm_btn_exist['word'][] = "word_top";
              $Cod_Btn = nmButtonOutput($this->arr_buttons, "bword", "", "", "word_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "thickbox", "" . $this->Ini->path_link . "grid_detail_sales_todo/grid_detail_sales_todo_config_word.php?script_case_init=" . $this->Ini->sc_page . "&summary_export_columns=S&nm_cor=CO&nm_res_cons=" . $Tem_word_res . "&nm_ini_word_res=grid,resume&nm_all_modules=grid,resume,chart&password=n&origem=cons&language=es&KeepThis=true&TB_iframe=true&modal=true", "group_4", "only_text", "text_right", "", "", "", "", "", "", "");
              $nm_saida->saida("           $Cod_Btn \r\n");
          $nm_saida->saida("            </div>\r\n");
              $NM_Gbtn = true;
      }
      if ($this->nmgp_botoes['xls'] == "on" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opc_psq'] && empty($this->nm_grid_sem_reg) && !$this->grid_emb_form)
      {
          $nm_saida->saida("           <script type=\"text/javascript\">sc_itens_btgp_group_4_top = true;</script>\r\n");
          $Tem_xls_res = "n";
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['SC_Ind_Groupby'] != "_NM_SC_")
          {
              $Tem_xls_res = "s";
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['SC_Ind_Groupby'] == "sc_free_group_by" && empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['SC_Gb_Free_cmp']))
          {
              $Tem_xls_res = "n";
          }
          $nm_saida->saida("            <div id=\"div_xls_top\" class=\"scBtnGrpText scBtnGrpClick\">\r\n");
              $this->nm_btn_exist['xls'][] = "xls_top";
              $Cod_Btn = nmButtonOutput($this->arr_buttons, "bexcel", "", "", "xls_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "thickbox", "" . $this->Ini->path_link . "grid_detail_sales_todo/grid_detail_sales_todo_config_xls.php?script_case_init=" . $this->Ini->sc_page . "&app_name=grid_detail_sales_todo&nm_tp_xls=xlsx&nm_tot_xls=S&nm_res_cons=" . $Tem_xls_res . "&nm_ini_xls_res=grid,resume&nm_all_modules=grid,resume,chart&password=n&summary_export_columns=S&origem=cons&language=es&KeepThis=true&TB_iframe=true&modal=true", "group_4", "only_text", "text_right", "", "", "", "", "", "", "");
              $nm_saida->saida("           $Cod_Btn \r\n");
          $nm_saida->saida("            </div>\r\n");
              $NM_Gbtn = true;
      }
          if ($NM_Gbtn)
          {
                  $nm_saida->saida("           </td></tr><tr><td class=\"scBtnGrpBackground\">\r\n");
              $NM_Gbtn = false;
          }
      if ($this->nmgp_botoes['xml'] == "on" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opc_psq'] && empty($this->nm_grid_sem_reg) && !$this->grid_emb_form)
      {
          $nm_saida->saida("           <script type=\"text/javascript\">sc_itens_btgp_group_4_top = true;</script>\r\n");
          $Tem_xml_res = "n";
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['SC_Ind_Groupby'] != "_NM_SC_")
          {
              $Tem_xml_res = "s";
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['SC_Ind_Groupby'] == "sc_free_group_by" && empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['SC_Gb_Free_cmp']))
          {
              $Tem_xml_res = "n";
          }
          $nm_saida->saida("            <div id=\"div_xml_top\" class=\"scBtnGrpText scBtnGrpClick\">\r\n");
              $this->nm_btn_exist['xml'][] = "xml_top";
              $Cod_Btn = nmButtonOutput($this->arr_buttons, "bxml", "", "", "xml_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "thickbox", "" . $this->Ini->path_link . "grid_detail_sales_todo/grid_detail_sales_todo_config_xml.php?script_case_init=" . $this->Ini->sc_page . "&summary_export_columns=S&password=n&nm_res_cons=" . $Tem_xml_res . "&nm_ini_xml_res=grid,resume&nm_all_modules=grid,resume,chart&nm_xml_tag=tag&nm_xml_label=S&language=&origem=cons&KeepThis=true&TB_iframe=true&modal=true", "group_4", "only_text", "text_right", "", "", "", "", "", "", "");
              $nm_saida->saida("           $Cod_Btn \r\n");
          $nm_saida->saida("            </div>\r\n");
              $NM_Gbtn = true;
      }
      if ($this->nmgp_botoes['csv'] == "on" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opc_psq'] && empty($this->nm_grid_sem_reg) && !$this->grid_emb_form)
      {
          $nm_saida->saida("           <script type=\"text/javascript\">sc_itens_btgp_group_4_top = true;</script>\r\n");
          $Tem_csv_res = "n";
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['SC_Ind_Groupby'] != "_NM_SC_")
          {
              $Tem_csv_res = "s";
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['SC_Ind_Groupby'] == "sc_free_group_by" && empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['SC_Gb_Free_cmp']))
          {
              $Tem_csv_res = "n";
          }
          $nm_saida->saida("            <div id=\"div_csv_top\" class=\"scBtnGrpText scBtnGrpClick\">\r\n");
              $this->nm_btn_exist['csv'][] = "csv_top";
              $Cod_Btn = nmButtonOutput($this->arr_buttons, "bcsv", "", "", "csv_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "thickbox", "" . $this->Ini->path_link . "grid_detail_sales_todo/grid_detail_sales_todo_config_csv.php?script_case_init=" . $this->Ini->sc_page . "&summary_export_columns=S&password=n&nm_res_cons=" . $Tem_csv_res . "&nm_ini_csv_res=grid,resume&nm_all_modules=grid,resume,chart&nm_delim_line=1&nm_delim_col=1&nm_delim_dados=1&nm_label_csv=N&language=&origem=cons&KeepThis=true&TB_iframe=true&modal=true", "group_4", "only_text", "text_right", "", "", "", "", "", "", "");
              $nm_saida->saida("           $Cod_Btn \r\n");
          $nm_saida->saida("            </div>\r\n");
              $NM_Gbtn = true;
      }
      if ($this->nmgp_botoes['rtf'] == "on" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opc_psq'] && empty($this->nm_grid_sem_reg) && !$this->grid_emb_form)
      {
          $nm_saida->saida("           <script type=\"text/javascript\">sc_itens_btgp_group_4_top = true;</script>\r\n");
          $nm_saida->saida("            <div id=\"div_rtf_top\" class=\"scBtnGrpText scBtnGrpClick\">\r\n");
              $this->nm_btn_exist['rtf'][] = "rtf_top";
              $Cod_Btn = nmButtonOutput($this->arr_buttons, "brtf", "nm_gp_rtf_conf();", "nm_gp_rtf_conf();", "rtf_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "group_4", "only_text", "text_right", "", "", "", "", "", "", "");
              $nm_saida->saida("           $Cod_Btn \r\n");
          $nm_saida->saida("            </div>\r\n");
              $NM_Gbtn = true;
      }
          if ($NM_Gbtn)
          {
                  $nm_saida->saida("           </td></tr><tr><td class=\"scBtnGrpBackground\">\r\n");
              $NM_Gbtn = false;
          }
      if ($this->nmgp_botoes['print'] == "on" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opc_psq'] && empty($this->nm_grid_sem_reg) && !$this->grid_emb_form)
      {
          $Tem_pdf_res = "n";
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['SC_Ind_Groupby'] != "_NM_SC_")
          {
              $Tem_pdf_res = "s";
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['SC_Ind_Groupby'] == "sc_free_group_by" && empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['SC_Gb_Free_cmp']))
          {
              $Tem_pdf_res = "n";
          }
          $nm_saida->saida("           <script type=\"text/javascript\">sc_itens_btgp_group_4_top = true;</script>\r\n");
          $nm_saida->saida("            <div id=\"div_print_top\" class=\"scBtnGrpText scBtnGrpClick\">\r\n");
              $this->nm_btn_exist['print'][] = "print_top";
              $Cod_Btn = nmButtonOutput($this->arr_buttons, "bprint", "", "", "print_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "thickbox", "" . $this->Ini->path_link . "grid_detail_sales_todo/grid_detail_sales_todo_config_print.php?script_case_init=" . $this->Ini->sc_page . "&summary_export_columns=S&nm_opc=RC&nm_cor=CO&password=n&language=es&nm_page=" . NM_encode_input($this->Ini->sc_page) . "&nm_res_cons=" . $Tem_pdf_res . "&nm_ini_prt_res=grid,resume&nm_all_modules=grid,resume,chart&origem=cons&KeepThis=true&TB_iframe=true&modal=true", "group_4", "only_text", "text_right", "", "", "", "", "", "", "");
              $nm_saida->saida("           $Cod_Btn \r\n");
          $nm_saida->saida("            </div>\r\n");
              $NM_Gbtn = true;
      }
          $Cod_Btn = nmButtonGroupTableOutput($this->arr_buttons, "group_group_4", 'group_4', 'top', 'list', 'fim');
          $nm_saida->saida("           $Cod_Btn\r\n");
          $nm_saida->saida("           <script type=\"text/javascript\">\r\n");
          $nm_saida->saida("             if (!sc_itens_btgp_group_4_top) {\r\n");
          $nm_saida->saida("                 document.getElementById('sc_btgp_btn_group_4_top').style.display='none'; }\r\n");
          $nm_saida->saida("           </script>\r\n");
      }
      if ($this->nmgp_botoes['group_5'] == "on" && !$this->grid_emb_form)
      {
          $nm_saida->saida("           <script type=\"text/javascript\">var sc_itens_btgp_group_5_top = false;</script>\r\n");
          $Cod_Btn = nmButtonOutput($this->arr_buttons, "group_group_5", "scBtnGrpShow('group_5_top')", "scBtnGrpShow('group_5_top')", "sc_btgp_btn_group_5_top", "", "" . $this->Ini->Nm_lang['lang_btns_settings'] . "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "" . $this->Ini->Nm_lang['lang_btns_settings'] . "", "", "", "__sc_grp__", "text_img", "text_right", "", "", "", "", "", "", "");
          $nm_saida->saida("           $Cod_Btn\r\n");
          $NM_btn  = true;
          $NM_Gbtn = false;
          $Cod_Btn = nmButtonGroupTableOutput($this->arr_buttons, "group_group_5", 'group_5', 'top', 'list', 'ini');
          $nm_saida->saida("           $Cod_Btn\r\n");
      if (!$this->Ini->SC_Link_View && $this->nmgp_botoes['filter'] == "on"  && !$this->grid_emb_form)
      {
          $nm_saida->saida("           <script type=\"text/javascript\">sc_itens_btgp_group_5_top = true;</script>\r\n");
          $nm_saida->saida("            <div id=\"div_pesq_top\" class=\"scBtnGrpText scBtnGrpClick\">\r\n");
           $this->nm_btn_exist['filter'][] = "pesq_top";
           $Cod_Btn = nmButtonOutput($this->arr_buttons, "bpesquisa", "nm_gp_move('busca', '0', 'grid');", "nm_gp_move('busca', '0', 'grid');", "pesq_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "group_5", "only_text", "text_right", "", "", "", "", "", "", "");
           $nm_saida->saida("           $Cod_Btn \r\n");
          $nm_saida->saida("            </div>\r\n");
           $NM_Gbtn = true;
      }
          if ($NM_Gbtn)
          {
                  $nm_saida->saida("           </td></tr><tr><td class=\"scBtnGrpBackground\">\r\n");
              $NM_Gbtn = false;
          }
      if ($this->nmgp_botoes['sort_col'] == "on" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opc_psq'] && empty($this->nm_grid_sem_reg) && !$this->grid_emb_form)
      {
          $nm_saida->saida("           <script type=\"text/javascript\">sc_itens_btgp_group_5_top = true;</script>\r\n");
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $UseAlias =  "N";
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
          {
              $UseAlias =  "N";
          }
          else
          {
              $UseAlias =  "S";
          }
          $nm_saida->saida("            <div id=\"div_ordcmp_top\" class=\"scBtnGrpText scBtnGrpClick\">\r\n");
              $this->nm_btn_exist['sort_col'][] = "ordcmp_top";
              $Cod_Btn = nmButtonOutput($this->arr_buttons, "bsort", "scBtnOrderCamposShow('" . $this->Ini->path_link . "grid_detail_sales_todo/grid_detail_sales_todo_order_campos.php?path_img=" . $this->Ini->path_img_global . "&path_btn=" . $this->Ini->path_botoes . "&script_case_init=" . NM_encode_input($this->Ini->sc_page) . "&use_alias=" . $UseAlias . "&embbed_groupby=Y&toolbar_pos=top', 'top');", "scBtnOrderCamposShow('" . $this->Ini->path_link . "grid_detail_sales_todo/grid_detail_sales_todo_order_campos.php?path_img=" . $this->Ini->path_img_global . "&path_btn=" . $this->Ini->path_botoes . "&script_case_init=" . NM_encode_input($this->Ini->sc_page) . "&use_alias=" . $UseAlias . "&embbed_groupby=Y&toolbar_pos=top', 'top');", "ordcmp_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "group_5", "only_text", "text_right", "", "", "", "", "", "", "");
              $nm_saida->saida("           $Cod_Btn \r\n");
          $nm_saida->saida("            </div>\r\n");
              $NM_Gbtn = true;
      }
          if ($NM_Gbtn)
          {
                  $nm_saida->saida("           </td></tr><tr><td class=\"scBtnGrpBackground\">\r\n");
              $NM_Gbtn = false;
          }
      if ($this->nmgp_botoes['groupby'] == "on" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opc_psq'] && empty($this->nm_grid_sem_reg) && !$this->grid_emb_form)
      {
          $nm_saida->saida("           <script type=\"text/javascript\">sc_itens_btgp_group_5_top = true;</script>\r\n");
          $nm_saida->saida("            <div id=\"div_sel_groupby_top\" class=\"scBtnGrpText scBtnGrpClick\">\r\n");
          $Q_free  = false;
          $Q_count = 0;
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['SC_All_Groupby'] as $QB => $Tp)
          {
              if (!in_array($QB, $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['SC_Groupby_hide']))
              {
                  $Q_count++;
                  if ($QB == "sc_free_group_by")
                  {
                      $Q_free = true;
                  }
              }
          }
          if ($Q_count > 1 || $Q_free)
          {
              $this->nm_btn_exist['groupby'][] = "sel_groupby_top";
              $Cod_Btn = nmButtonOutput($this->arr_buttons, "bgroupby", "scBtnGroupByShow('" . $this->Ini->path_link . "grid_detail_sales_todo/grid_detail_sales_todo_sel_groupby.php?opc_ret=igual&path_img=" . $this->Ini->path_img_global . "&path_btn=" . $this->Ini->path_botoes . "&script_case_init=" . NM_encode_input($this->Ini->sc_page) . "&embbed_groupby=Y&toolbar_pos=top', 'top');", "scBtnGroupByShow('" . $this->Ini->path_link . "grid_detail_sales_todo/grid_detail_sales_todo_sel_groupby.php?opc_ret=igual&path_img=" . $this->Ini->path_img_global . "&path_btn=" . $this->Ini->path_botoes . "&script_case_init=" . NM_encode_input($this->Ini->sc_page) . "&embbed_groupby=Y&toolbar_pos=top', 'top');", "sel_groupby_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "group_5", "only_text", "text_right", "", "", "", "", "", "", "");
              $nm_saida->saida("           $Cod_Btn \r\n");
          $nm_saida->saida("            </div>\r\n");
              $NM_Gbtn = true;
          }
      }
        if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['SC_Ind_Groupby'] != "_NM_SC_")
        {
        }
          if ($NM_Gbtn)
          {
                  $nm_saida->saida("           </td></tr><tr><td class=\"scBtnGrpBackground\">\r\n");
              $NM_Gbtn = false;
          }
          if ($NM_Gbtn)
          {
                  $nm_saida->saida("           </td></tr><tr><td class=\"scBtnGrpBackground\">\r\n");
              $NM_Gbtn = false;
          }
          $Cod_Btn = nmButtonGroupTableOutput($this->arr_buttons, "group_group_5", 'group_5', 'top', 'list', 'fim');
          $nm_saida->saida("           $Cod_Btn\r\n");
          $nm_saida->saida("           <script type=\"text/javascript\">\r\n");
          $nm_saida->saida("             if (!sc_itens_btgp_group_5_top) {\r\n");
          $nm_saida->saida("                 document.getElementById('sc_btgp_btn_group_5_top').style.display='none'; }\r\n");
          $nm_saida->saida("           </script>\r\n");
      }
          if (is_file("grid_detail_sales_todo_help.txt") && !$this->grid_emb_form)
          {
             $Arq_WebHelp = file("grid_detail_sales_todo_help.txt"); 
             if (isset($Arq_WebHelp[0]) && !empty($Arq_WebHelp[0]))
             {
                 $Arq_WebHelp[0] = str_replace("\r\n" , "", trim($Arq_WebHelp[0]));
                 $Tmp = explode(";", $Arq_WebHelp[0]); 
                 foreach ($Tmp as $Cada_help)
                 {
                     $Tmp1 = explode(":", $Cada_help); 
                     if (!empty($Tmp1[0]) && isset($Tmp1[1]) && !empty($Tmp1[1]) && $Tmp1[0] == "cons" && is_file($this->Ini->root . $this->Ini->path_help . $Tmp1[1]))
                     {
                        $Cod_Btn = nmButtonOutput($this->arr_buttons, "bhelp", "nm_open_popup('" . $this->Ini->path_help . $Tmp1[1] . "');", "nm_open_popup('" . $this->Ini->path_help . $Tmp1[1] . "');", "help_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
                        $nm_saida->saida("           $Cod_Btn \r\n");
                        $NM_btn = true;
                     }
                 }
             }
          }
      if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['b_sair'] || $this->grid_emb_form || $this->grid_emb_form_full)
      {
         $this->nmgp_botoes['exit'] = "off"; 
      }
      if ($this->nmgp_botoes['exit'] == "on")
      {
          $this->nm_btn_exist['exit'][] = "sai_top";
        if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['SC_Ind_Groupby'] != "_NM_SC_")
        {
         $Cod_Btn = nmButtonOutput($this->arr_buttons, "bvoltar", "nm_gp_move('resumo', '0');", "nm_gp_move('resumo', '0');", "sai_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
         $nm_saida->saida("           $Cod_Btn \r\n");
         $NM_btn = true;
        }
      }
      }
      $nm_saida->saida("         </td> \r\n");
      $nm_saida->saida("        </tr> \r\n");
      $nm_saida->saida("       </table> \r\n");
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['ajax_nav'])
      { 
          $this->Ini->Arr_result['setValue'][] = array('field' => 'sc_grid_toobar_top', 'value' => NM_charset_to_utf8($_SESSION['scriptcase']['saida_html']));
          $_SESSION['scriptcase']['saida_html'] = "";
      } 
      $nm_saida->saida("      </td> \r\n");
      $nm_saida->saida("     </tr> \r\n");
      $nm_saida->saida("      <tr style=\"display: none\">\r\n");
      $nm_saida->saida("      <td> \r\n");
      $nm_saida->saida("     </form> \r\n");
      $nm_saida->saida("      </td> \r\n");
      $nm_saida->saida("     </tr> \r\n");
      if (!$NM_btn && isset($NM_ult_sep))
      {
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['ajax_nav'])
          { 
              $this->Ini->Arr_result['setDisplay'][] = array('field' => $NM_ult_sep, 'value' => 'none');
          } 
          $nm_saida->saida("     <script language=\"javascript\">\r\n");
          $nm_saida->saida("        document.getElementById('" . $NM_ult_sep . "').style.display='none';\r\n");
          $nm_saida->saida("     </script>\r\n");
      }
   }
   function nmgp_barra_top()
   {
       if (isset($_SESSION['scriptcase']['proc_mobile']) && $_SESSION['scriptcase']['proc_mobile'])
       {
           $this->nmgp_barra_top_mobile();
           $this->nmgp_embbed_placeholder_top();
       }
       if (!isset($_SESSION['scriptcase']['proc_mobile']) || !$_SESSION['scriptcase']['proc_mobile'])
       {
           $this->nmgp_barra_top_normal();
           $this->nmgp_embbed_placeholder_top();
       }
   }
   function nmgp_barra_bot()
   {
       if (!isset($_SESSION['scriptcase']['proc_mobile']) || !$_SESSION['scriptcase']['proc_mobile'])
       {
           $this->nmgp_embbed_placeholder_bot();
           $this->nmgp_barra_bot_normal();
       }
   }
   function nmgp_embbed_placeholder_top()
   {
      global $nm_saida;
      $nm_saida->saida("     <tr id=\"sc_id_save_grid_placeholder_top\" style=\"display: none\">\r\n");
      $nm_saida->saida("      <td>\r\n");
      $nm_saida->saida("      </td>\r\n");
      $nm_saida->saida("     </tr>\r\n");
      $nm_saida->saida("     <tr id=\"sc_id_groupby_placeholder_top\" style=\"display: none\">\r\n");
      $nm_saida->saida("      <td>\r\n");
      $nm_saida->saida("      </td>\r\n");
      $nm_saida->saida("     </tr>\r\n");
      $nm_saida->saida("     <tr id=\"sc_id_sel_campos_placeholder_top\" style=\"display: none\">\r\n");
      $nm_saida->saida("      <td>\r\n");
      $nm_saida->saida("      </td>\r\n");
      $nm_saida->saida("     </tr>\r\n");
      $nm_saida->saida("     <tr id=\"sc_id_export_email_placeholder_top\" style=\"display: none\">\r\n");
      $nm_saida->saida("      <td>\r\n");
      $nm_saida->saida("      </td>\r\n");
      $nm_saida->saida("     </tr>\r\n");
      $nm_saida->saida("     <tr id=\"sc_id_order_campos_placeholder_top\" style=\"display: none\">\r\n");
      $nm_saida->saida("      <td>\r\n");
      $nm_saida->saida("      </td>\r\n");
      $nm_saida->saida("     </tr>\r\n");
   }
   function nmgp_embbed_placeholder_bot()
   {
      global $nm_saida;
      $nm_saida->saida("     <tr id=\"sc_id_save_grid_placeholder_bot\" style=\"display: none\">\r\n");
      $nm_saida->saida("      <td>\r\n");
      $nm_saida->saida("      </td>\r\n");
      $nm_saida->saida("     </tr>\r\n");
      $nm_saida->saida("     <tr id=\"sc_id_groupby_placeholder_bot\" style=\"display: none\">\r\n");
      $nm_saida->saida("      <td>\r\n");
      $nm_saida->saida("      </td>\r\n");
      $nm_saida->saida("     </tr>\r\n");
      $nm_saida->saida("     <tr id=\"sc_id_sel_campos_placeholder_bot\" style=\"display: none\">\r\n");
      $nm_saida->saida("      <td>\r\n");
      $nm_saida->saida("      </td>\r\n");
      $nm_saida->saida("     </tr>\r\n");
      $nm_saida->saida("     <tr id=\"sc_id_export_email_placeholder_bot\" style=\"display: none\">\r\n");
      $nm_saida->saida("      <td>\r\n");
      $nm_saida->saida("      </td>\r\n");
      $nm_saida->saida("     </tr>\r\n");
      $nm_saida->saida("     <tr id=\"sc_id_order_campos_placeholder_bot\" style=\"display: none\">\r\n");
      $nm_saida->saida("      <td>\r\n");
      $nm_saida->saida("      </td>\r\n");
      $nm_saida->saida("     </tr>\r\n");
   }
   function html_grid_search()
   {
       global $nm_saida;
       $this->grid_search_seq = 0;
       $this->grid_search_str = "";
       $this->grid_search_dat = array();
       $this->grid_search_str = "";
        if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['ajax_nav'])
        { 
           $_SESSION['scriptcase']['saida_html'] = "";
        } 
       $this->NM_case_insensitive = false;
       $tmp = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['cond_pesq'];
       $pos = strrpos($tmp, "##*@@");
       if ($pos !== false)
       {
           $and_or = (substr($tmp, ($pos + 5)) == "and") ? $this->Ini->Nm_lang['lang_srch_and_cond'] : $this->Ini->Nm_lang['lang_srch_orr_cond'];
           $tmp    = substr($tmp, 0, $pos);
           $this->grid_search_str = str_replace("##*@@", ", " . $and_or . " ", $tmp);
       }
       $str_display = empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['grid_pesq'])?'none':'';
       if(!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['ajax_nav'])
       {
          $nm_saida->saida("   <tr id=\"NM_Grid_Search\" ajax='' style='display:" . $str_display . "'>\r\n");
       }
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['ajax_nav'] && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['grid_pesq']))
       { 
           $_SESSION['scriptcase']['saida_html'] = "";
           foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['grid_pesq'] as $cmp => $def)
           {
               $this->Ini->Arr_result['setValue'][] = array('field' => 'grid_search_label_' . $cmp, 'value' => NM_charset_to_utf8(trim($def['descr'])));
               $this->Ini->Arr_result['setTitle'][] = array('field' => 'grid_search_label_' . $cmp, 'value' => NM_charset_to_utf8(trim($def['hint'])));
           }
           $lin_obj = $this->grid_search_add_tag();
           $this->Ini->Arr_result['setValue'][] = array('field' => 'id_grid_search_add_tag', 'value' => NM_charset_to_utf8($lin_obj));
           $this->Ini->Arr_result['setValue'][] = array('field' => 'id_grid_search_cmd_str', 'value' => NM_charset_to_utf8($this->grid_search_str));
           if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['save_grid']))
           {
               return;
           }
           else
           {
               $this->Ini->Arr_result['setDisplay'][] = array('field' => 'NM_Grid_Search', 'value' => '');
           }
       } 
           if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['save_grid']))
           {
               $str_display = empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['grid_pesq']) ? 'none' : '';
               $this->Ini->Arr_result['setDisplay'][] = array('field' => 'NM_Grid_Search', 'value' => $str_display);
           }
       $nm_saida->saida("   <td  valign=\"top\"> \r\n");
       $nm_saida->saida("   <div id='id_grid_search_cmd_string' class=\"" . $this->css_scAppDivMoldura . "\" style='cursor:pointer; display:none;' onclick=\"$('#id_grid_search_cmd_string').hide();$('#div_grid_search').show();\"> \r\n");
             if (is_file($this->Ini->root . $this->Ini->path_img_global . '/' . $this->Ini->App_div_tree_img_exp))
             {
       $nm_saida->saida("                             <img id='id_app_div_tree_img_exp' src=\"" . $this->Ini->path_img_global . "/" . $this->Ini->App_div_tree_img_exp . "\" border=0 align='absmiddle' class='scGridFilterTagIconExp'>\r\n");
             }
       $nm_saida->saida("     <span class=\"" . $this->css_scAppDivHeaderText . "\">\r\n");
       $nm_saida->saida("             " . $this->Ini->Nm_lang['lang_othr_dynamicsearch_title_outside'] . "\r\n");
       $nm_saida->saida("     </span>\r\n");
       $nm_saida->saida("     <span id='id_grid_search_cmd_str' class=\"" . $this->css_scAppDivContentText . "\">" . NM_encode_input(trim($this->grid_search_str)) . "</span>\r\n");
       $nm_saida->saida("   </div> \r\n");
       $nm_saida->saida("   <div id=\"div_grid_search\" class=\"" . $this->css_scAppDivMoldura . " scGridFilterTag\" style='display:;'> \r\n");
             if (is_file($this->Ini->root . $this->Ini->path_img_global . '/' . $this->Ini->App_div_tree_img_col))
             {
       $nm_saida->saida("                             <a href=\"#\" onclick=\"$('#id_grid_search_cmd_string').show();$('#div_grid_search').hide();\" class='scGridFilterTagIconCol'><img id='id_app_div_tree_img_col' src=\"" . $this->Ini->path_img_global . "/" . $this->Ini->App_div_tree_img_col . "\" border=0 align='absmiddle' style='vertical-align: middle; margin-right:4px;'></a>\r\n");
             }
       $nm_saida->saida("    <div id='icon_grid_search' class='scGridFilterTagIcon'><svg height='1792' viewBox='0 0 1792 1792' width='1792' xmlns='http://www.w3.org/2000/svg'><path d='M1595 295q17 41-14 70l-493 493v742q0 42-39 59-13 5-25 5-27 0-45-19l-256-256q-19-19-19-45v-486l-493-493q-31-29-14-70 17-39 59-39h1280q42 0 59 39z'/></svg></div> \r\n");
       $nm_saida->saida("    <div id=\"tags_grid_search\" class='scGridFilterTagList'> \r\n");
       $nm_saida->saida("        <form id= \"id_Fgrid_search\" name=\"Fgrid_search\" method=\"post\" action=\"./\" target=\"_self\"> \r\n");
       $nm_saida->saida("            <input type=\"hidden\" name=\"script_case_init\" value=\"" . NM_encode_input($this->Ini->sc_page) . "\"/> \r\n");
       $nm_saida->saida("            <input type=\"hidden\" name=\"nmgp_opcao\" value=\"grid_search\"/> \r\n");
       $nm_saida->saida("            <input type=\"hidden\" name=\"parm\" value=\"\"/> \r\n");
            if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['grid_pesq']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['grid_pesq']))
            {
                foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['grid_pesq'] as $cmp => $def)
                {
                    if (isset($def['label'])) {
                        $this->grid_search_seq++;
                        $lin_obj = $this->grid_search_tag_ini($cmp, $def, $this->grid_search_seq);
                        $nm_saida->saida("" . $lin_obj . "\r\n");
                        if ($cmp == "view_sales_detail_group_todo_fecha")
                        {
                           $this->grid_search_dat[$this->grid_search_seq] = "view_sales_detail_group_todo_fecha";
                           $lin_obj = $this->grid_search_view_sales_detail_group_todo_fecha($this->grid_search_seq, 'N', $def['opc'], $def['val'], $def['label']);
                           $nm_saida->saida("" . $lin_obj . "\r\n");
                        }
                        if ($cmp == "view_sales_detail_group_todo_id_product")
                        {
                           $this->grid_search_dat[$this->grid_search_seq] = "view_sales_detail_group_todo_id_product";
                           $lin_obj = $this->grid_search_view_sales_detail_group_todo_id_product($this->grid_search_seq, 'N', $def['opc'], $def['val'], $def['label']);
                           $nm_saida->saida("" . $lin_obj . "\r\n");
                        }
                        $lin_obj = $this->grid_search_tag_end();
                        $nm_saida->saida("" . $lin_obj . "\r\n");
                    }
                }
            }
       $nm_saida->saida("            <div id='add_grid_search' class='scGridFilterTagAdd SC_SubMenuApp' onclick=\"nm_show_advancedsearch_fields();\" style='z-index:1 !important;'>\r\n");
       $nm_saida->saida("                " . $this->Ini->Nm_lang['lang_srch_addfields'] . "\r\n");
       $nm_saida->saida("                <div id='id_grid_search_add_tag' style='position: absolute; border-collapse: collapse; z-index: 1000; display:none;'>\r\n");
       $nm_saida->saida("                    <div>\r\n");
           $lin_obj = $this->grid_search_add_tag();
       $nm_saida->saida("" . $lin_obj . "\r\n");
       $nm_saida->saida("                    </div>\r\n");
       $nm_saida->saida("                </div>\r\n");
       $nm_saida->saida("            </div>\r\n");
       $nm_saida->saida("        </form>\r\n");
       $nm_saida->saida("    </div>\r\n");
       $this->NM_fil_ant = $this->gera_array_filtros();
       $strDisplayFilter = (empty($this->NM_fil_ant))?'none':'';
       $nm_saida->saida("   <div id='save_grid_search' class='scGridFilterTagSave'>\r\n");
       $nm_saida->saida("    <form name='Fgrid_search_save'>\r\n");
       $nm_saida->saida("     <span id=\"id_NM_filters_save\" style=\"display: " . $strDisplayFilter . "\">\r\n");
       $nm_saida->saida("       <SELECT class=\"scFilterToolbar_obj\" id=\"id_sel_recup_filters\" name=\"sel_recup_filters\" onChange=\"nm_change_grid_search(this)\" size=\"1\">\r\n");
       $nm_saida->saida("           <option value=\"\"></option>\r\n");
       $Nome_filter = "";
       foreach ($this->NM_fil_ant as $Cada_filter => $Tipo_filter)
       {
           $Select = "";
           if (isset($this->NM_curr_fil) && $Cada_filter == $this->NM_curr_fil)
           {
               $Select = "selected";
           }
           if (NM_is_utf8($Cada_filter) && $_SESSION['scriptcase']['charset'] != "UTF-8")
           {
               $Cada_filter    = sc_convert_encoding($Cada_filter, $_SESSION['scriptcase']['charset'], "UTF-8");
               $Tipo_filter[0] = sc_convert_encoding($Tipo_filter[0], $_SESSION['scriptcase']['charset'], "UTF-8");
           }
           elseif (!NM_is_utf8($Cada_filter) && $_SESSION['scriptcase']['charset'] == "UTF-8")
           {
               $Cada_filter    = sc_convert_encoding($Cada_filter, "UTF-8", $_SESSION['scriptcase']['charset']);
               $Tipo_filter[0] = sc_convert_encoding($Tipo_filter[0], "UTF-8", $_SESSION['scriptcase']['charset']);
           }
           if ($Tipo_filter[1] != $Nome_filter)
           {
               $Nome_filter = $Tipo_filter[1];
                   $nm_saida->saida("       <option value=''>" . NM_encode_input($Nome_filter) . "</option>\r\n");
           }
              $nm_saida->saida("        <option value='" . NM_encode_input($Tipo_filter[0]) . "' " . $Select . ">.." . $Cada_filter . "</option>\r\n");
       }
       $nm_saida->saida("       </SELECT>\r\n");
       $nm_saida->saida("     </span>\r\n");
       $Cod_Btn = nmButtonOutput($this->arr_buttons, "bedit_filter_appdiv", "document.getElementById('Salvar_filters').style.display = ''; document.Fgrid_search_save.nmgp_save_name.focus()", "document.getElementById('Salvar_filters').style.display = ''; document.Fgrid_search_save.nmgp_save_name.focus()", "Ativa_save", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
       $nm_saida->saida("       $Cod_Btn \r\n");
       $nm_saida->saida("    <DIV id=\"Salvar_filters\" style=\"display:none;z-index:9999;position: absolute;\">\r\n");
       $nm_saida->saida("     <TABLE align=\"center\" class=\"scFilterTable\">\r\n");
       $nm_saida->saida("      <TR>\r\n");
       $nm_saida->saida("       <TD class=\"scFilterBlock\">\r\n");
       $nm_saida->saida("        <table style=\"border-width: 0px; border-collapse: collapse\" width=\"100%\">\r\n");
       $nm_saida->saida("         <tr>\r\n");
       $nm_saida->saida("          <td style=\"padding: 0px\" valign=\"top\" class=\"scFilterBlockFont\">" . $this->Ini->Nm_lang['lang_othr_srch_head'] . "</td>\r\n");
       $nm_saida->saida("          <td style=\"padding: 0px\" align=\"right\" valign=\"top\">\r\n");
       $Cod_Btn = nmButtonOutput($this->arr_buttons, "bcancelar_appdiv", "document.getElementById('Salvar_filters').style.display = 'none'", "document.getElementById('Salvar_filters').style.display = 'none'", "Cancel_frm", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
       $nm_saida->saida("       $Cod_Btn \r\n");
       $nm_saida->saida("          </td>\r\n");
       $nm_saida->saida("         </tr>\r\n");
       $nm_saida->saida("        </table>\r\n");
       $nm_saida->saida("       </TD>\r\n");
       $nm_saida->saida("      </TR>\r\n");
       $nm_saida->saida("      <TR>\r\n");
       $nm_saida->saida("       <TD class=\"scFilterFieldOdd\">\r\n");
       $nm_saida->saida("        <table style=\"border-width: 0px; border-collapse: collapse\" width=\"100%\">\r\n");
       $nm_saida->saida("         <tr>\r\n");
       $nm_saida->saida("          <td style=\"padding: 0px\" valign=\"top\">\r\n");
       $nm_saida->saida("           <input class=\"scFilterObjectOdd\" type=\"text\" id=\"SC_nmgp_save_name\" name=\"nmgp_save_name\" value=\"\">\r\n");
       $nm_saida->saida("          </td>\r\n");
       $nm_saida->saida("          <td style=\"padding: 0px\" align=\"right\" valign=\"top\">\r\n");
       $Cod_Btn = nmButtonOutput($this->arr_buttons, "bsalvar_appdiv", "nm_save_grid_search()", "nm_save_grid_search()", "Save_frm", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
       $nm_saida->saida("       $Cod_Btn \r\n");
       $nm_saida->saida("          </td>\r\n");
       $nm_saida->saida("         </tr>\r\n");
       $nm_saida->saida("        </table>\r\n");
       $nm_saida->saida("       </TD>\r\n");
       $nm_saida->saida("      </TR>\r\n");
       $style_del_filter = (!empty($this->NM_fil_ant)) ? '' : 'none';
       $nm_saida->saida("      <TR>\r\n");
       $nm_saida->saida("       <TD class=\"scFilterFieldEven\">\r\n");
       $nm_saida->saida("       <DIV id=\"Apaga_filters\" style=\"display: " . $style_del_filter . "\">\r\n");
       $nm_saida->saida("        <table style=\"border-width: 0px; border-collapse: collapse\" width=\"100%\">\r\n");
       $nm_saida->saida("         <tr>\r\n");
       $nm_saida->saida("          <td style=\"padding: 0px\" valign=\"top\">\r\n");
       $nm_saida->saida("          <div id=\"id_sel_filters_del\">\r\n");
       $nm_saida->saida("           <SELECT class=\"scFilterObjectOdd\" id=\"sel_filters_del\" name=\"NM_filters_del\" size=\"1\">\r\n");
       $nm_saida->saida("            <option value=\"\"></option>\r\n");
       $Nome_filter = "";
       foreach ($this->NM_fil_ant as $Cada_filter => $Tipo_filter)
       {
           $Select = "";
           if ($Cada_filter == $this->NM_curr_fil)
           {
               $Select = "selected";
           }
           if (NM_is_utf8($Cada_filter) && $_SESSION['scriptcase']['charset'] != "UTF-8")
           {
               $Cada_filter    = sc_convert_encoding($Cada_filter, $_SESSION['scriptcase']['charset'], "UTF-8");
               $Tipo_filter[0] = sc_convert_encoding($Tipo_filter[0], $_SESSION['scriptcase']['charset'], "UTF-8");
           }
           elseif (!NM_is_utf8($Cada_filter) && $_SESSION['scriptcase']['charset'] == "UTF-8")
           {
               $Cada_filter    = sc_convert_encoding($Cada_filter, "UTF-8", $_SESSION['scriptcase']['charset']);
               $Tipo_filter[0] = sc_convert_encoding($Tipo_filter[0], "UTF-8", $_SESSION['scriptcase']['charset']);
           }
           if ($Tipo_filter[1] != $Nome_filter)
           {
               $Nome_filter = $Tipo_filter[1];
               $nm_saida->saida("           <option value=''>" . NM_encode_input($Nome_filter) . "</option>\r\n");
           }
          $nm_saida->saida("           <option value='" . NM_encode_input($Tipo_filter[0]) . "' " . $Select . ">.." . $Cada_filter . "</option>\r\n");
       }
       $nm_saida->saida("           </SELECT>\r\n");
       $nm_saida->saida("          </div>\r\n");
       $nm_saida->saida("          </td>\r\n");
       $nm_saida->saida("          <td style=\"padding: 0px\" align=\"right\" valign=\"top\">\r\n");
       $Cod_Btn = nmButtonOutput($this->arr_buttons, "bexcluir", "nm_del_grid_search()", "nm_del_grid_search()", "Exc_filtro", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
       $nm_saida->saida("       $Cod_Btn \r\n");
       $nm_saida->saida("          </td>\r\n");
       $nm_saida->saida("         </tr>\r\n");
       $nm_saida->saida("        </table>\r\n");
       $nm_saida->saida("       </DIV>\r\n");
       $nm_saida->saida("       </TD>\r\n");
       $nm_saida->saida("      </TR>\r\n");
       $nm_saida->saida("     </TABLE>\r\n");
       $nm_saida->saida("    </DIV> \r\n");
       $nm_saida->saida("   </form>\r\n");
       $nm_saida->saida("  </div> \r\n");
       $nm_saida->saida("    <div id='close_grid_search' class='scGridFilterTagClose' onclick=\"checkLastTag(true);setTimeout(function() {nm_proc_grid_search(0, 'del_grid_search_all', 'grid_search')}, 200);\"></div>\r\n");
       $nm_saida->saida("   </div>\r\n");
       $nm_saida->saida("   </td>\r\n");
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['ajax_nav'])
       { 
           $this->Ini->Arr_result['setValue'][] = array('field' => 'NM_Grid_Search', 'value' => NM_charset_to_utf8($_SESSION['scriptcase']['saida_html']));
           $_SESSION['scriptcase']['saida_html'] = "";
           if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['save_grid']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['grid_pesq']))
           { 
               $this->Ini->Arr_result['exec_JS'][] = array('function' => 'SC_carga_evt_jquery_grid', 'parm' => 'all');
           } 
       } 
       if(!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['ajax_nav'])
       {
           $nm_saida->saida("   </tr>\r\n");
       }
       $this->JS_grid_search();
   }
   function grid_search_tag_ini($cmp, $def, $seq)
   {
       global $nm_saida;
       $lin_obj  = "";
       $lin_obj .= "<div class='scGridFilterTagListItem' id='grid_search_" . $cmp . "'>";
       $lin_obj .= "<span class='scGridFilterTagListItemLabel' id='grid_search_label_" . $cmp . "' title='" . NM_encode_input($def['hint']) . "' style='cursor:pointer;' onclick=\"closeAllTags();$('#grid_search_" . $cmp . " .scGridFilterTagListFilter').toggle();\">" . NM_encode_input($def['descr']) . "</span>";
       $lin_obj .= "<span class='scGridFilterTagListItemClose' onclick=\"$(this).parent().remove();checkLastTag(false);setTimeout(function() {nm_proc_grid_search('" . $seq . "', 'del_grid_search', 'grid_search'); return false;}, 200); return false;
    \"></span>";
       return $lin_obj;
   }
   function grid_search_tag_end()
   {
       global $nm_saida;
       $lin_obj  = "</div>";
       return $lin_obj;
   }
   function grid_search_add_tag()
   {
       $lin_obj  = "";
       $All_cmp_search = array('view_sales_detail_group_todo_fecha','view_sales_detail_group_todo_id_product');
       $nmgp_tab_label = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['pesq_tab_label'];
       if (!empty($nmgp_tab_label))
       {
          $nm_tab_campos = explode("?@?", $nmgp_tab_label);
          $nmgp_tab_label = array();
          foreach ($nm_tab_campos as $cada_campo)
          {
              $parte_campo = explode("?#?", $cada_campo);
              $nmgp_tab_label[$parte_campo[0]] = $parte_campo[1];
          }
       }
       if (count($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['grid_pesq']) < 2)
       {
           $lin_obj .= "<table id='id_grid_search_all_cmp' cellpadding=0 cellspacing=0>";
           foreach ($All_cmp_search as $cada_cmp)
           {
               if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['grid_pesq'][$cada_cmp]))
               {
                   $lin_obj .= "  <tr>";
                   $lin_obj .= "    <td class='scBtnGrpBackground'>";
                   $lin_obj .= "        <div class='scBtnGrpText' style='cursor:pointer; right:80px;' onClick=\"ajax_add_grid_search(this, 'grid', '" . $cada_cmp . "'); return false;\">";
                   $lin_obj .= "            " . $nmgp_tab_label[$cada_cmp] . "";
                   $lin_obj .= "        </div>";
                   $lin_obj .= "    </td>";
                   $lin_obj .= "  </tr>";
               }
           }
           $lin_obj .= "</table>";
       }
       return $lin_obj;
   }
   function grid_search_view_sales_detail_group_todo_fecha($ind, $ajax, $opc="", $val=array(), $label='')
   {
       $lin_obj  = "";
       $lin_obj .= "     <div class='scGridFilterTagListFilter' id='grid_search_view_sales_detail_group_todo_fecha_" . $ind . "' style='display:none; z-index: 10'>";
       $lin_obj .= "         <div class='scGridFilterTagListFilterLabel'>". NM_encode_input($label) ." <span class='scGridFilterTagListFilterLabelClose' onclick='closeAllTags(this);'></span></div>";
       $lin_obj .= "         <div class='scGridFilterTagListFilterInputs'>";
       if (empty($opc))
       {
           $opc = "bw";
       }
       $lin_obj .= "       <select id='grid_search_view_sales_detail_group_todo_fecha_cond_" . $ind . "' name='cond_grid_search_view_sales_detail_group_todo_fecha_" . $ind . "' class='" . $this->css_scAppDivToolbarInput . "' style='vertical-align: middle;' onChange='grid_search_change_bi(\"view_sales_detail_group_todo_fecha\", $ind)'>";
       $lin_obj .= "        <optgroup label=\"" . $this->Ini->Nm_lang['lang_srch_nrml'] . "\">";
       $selected = ($opc == "bw") ? " selected" : "";
       $lin_obj .= "        <option value='bw'" . $selected . ">" . $this->Ini->Nm_lang['lang_srch_betw'] . "</option>";
       $selected = ($opc == "eq") ? " selected" : "";
       $lin_obj .= "        <option value='eq'" . $selected . ">" . $this->Ini->Nm_lang['lang_srch_exac'] . "</option>";
       $selected = ($opc == "gt") ? " selected" : "";
       $lin_obj .= "        <option value='gt'" . $selected . ">" . $this->Ini->Nm_lang['lang_srch_grtr'] . "</option>";
       $selected = ($opc == "lt") ? " selected" : "";
       $lin_obj .= "        <option value='lt'" . $selected . ">" . $this->Ini->Nm_lang['lang_srch_less'] . "</option>";
       $lin_obj .= "        <optgroup label=\"" . $this->Ini->Nm_lang['lang_srch_spec'] . "\">";
       $selected = ($opc == "bi_current_year") ? " selected" : "";
       $lin_obj .= "        <option value='bi_current_year'" . $selected . ">" . $this->Ini->Nm_lang['lang_search_summary_current_year'] . "</option>";
       $selected = ($opc == "bi_LY") ? " selected" : "";
       $lin_obj .= "        <option value='bi_LY'" . $selected . ">" . $this->Ini->Nm_lang['lang_srch_last_year'] . "</option>";
       $selected = ($opc == "bi_UM") ? " selected" : "";
       $lin_obj .= "        <option value='bi_UM'" . $selected . ">" . $this->Ini->Nm_lang['lang_srch_last_mnth'] . "</option>";
       $selected = ($opc == "bi_este_mes_full") ? " selected" : "";
       $lin_obj .= "        <option value='bi_este_mes_full'" . $selected . ">" . $this->Ini->Nm_lang['lang_search_este_mes_full'] . "</option>";
       $selected = ($opc == "bi_OT") ? " selected" : "";
       $lin_obj .= "        <option value='bi_OT'" . $selected . ">" . $this->Ini->Nm_lang['lang_srch_yest'] . "</option>";
       $selected = ($opc == "bi_HJ") ? " selected" : "";
       $lin_obj .= "        <option value='bi_HJ'" . $selected . ">" . $this->Ini->Nm_lang['lang_srch_tday'] . "</option>";
       $lin_obj .= "       </select>";
       if ($opc == "nu" || $opc == "nn" || $opc == "ep" || $opc == "ne")
       {
           $display_in_1 = "none";
       }
       else
       {
           $display_in_1 = "''";
       }
       $lin_obj .= "       <span id=\"grid_view_sales_detail_group_todo_fecha_" . $ind . "\" style=\"display:" . $display_in_1 . "\">";
       $Form_base          = "ddmmyyyy";
       $date_format_show   = "";
       $Str_date = str_replace("a", "y", strtolower($_SESSION['scriptcase']['reg_conf']['date_format']));
       $Lim   = strlen($Str_date);
       $Str   = "";
       $Ult   = "";
       $Arr_D = array();
       for ($I = 0; $I < $Lim; $I++)
       {
           $Char = substr($Str_date, $I, 1);
           if ($Char != $Ult && "" != $Str)
           {
               $Arr_D[] = $Str;
               $Str     = $Char;
           }
           else
           {
              $Str    .= $Char;
           }
           $Ult = $Char;
       }
       $Arr_D[] = $Str;
       $Prim = true;
       foreach ($Arr_D as $Cada_d)
       {
           if (strpos($Form_base, $Cada_d) !== false)
           {
               $date_format_show .= (!$Prim) ? $_SESSION['scriptcase']['reg_conf']['date_sep'] : "";
               $date_format_show .= $Cada_d;
               $Prim = false;
           }
       }
       $Tmp_date = $Arr_D;
       $date_format_show = str_replace("dd",   $this->Ini->Nm_lang['lang_othr_date_days'], $date_format_show);
       $date_format_show = str_replace("mm",   $this->Ini->Nm_lang['lang_othr_date_mnth'], $date_format_show);
       $date_format_show = str_replace("yyyy", $this->Ini->Nm_lang['lang_othr_date_year'], $date_format_show);
       $date_format_show = str_replace("aaaa", $this->Ini->Nm_lang['lang_othr_date_year'], $date_format_show);
       $date_format_show = str_replace("hh",   $this->Ini->Nm_lang['lang_othr_date_hour'], $date_format_show);
       $date_format_show = str_replace("ii",   $this->Ini->Nm_lang['lang_othr_date_mint'], $date_format_show);
       $date_format_show = str_replace("ss",   $this->Ini->Nm_lang['lang_othr_date_scnd'], $date_format_show);
       $display_bi = "";
       $display_nm = "";
       $bi_dt1     = "";
       $bi_dt2     = "";
       if (substr($opc, 0, 3) == "bi_")
       {
           $display_nm = "none";
           if ($opc != "bi_TP")
           {
               $tmp_opc = $opc;
               $this->Ini->process_cond_bi($tmp_opc, $bi_dt1, $bi_dt2);
               $this->formata_bi_view_sales_detail_group_todo_fecha($opc, $bi_dt1, $bi_dt2, $tmp_opc);
           }
       }
       else
       {
           $display_bi = "none";
       }
       $lin_obj .= "<SPAN id=\"ID_bi_dados_grid_view_sales_detail_group_todo_fecha_" . $ind . "\" style=\"display:" . $display_bi . ";\">" . $bi_dt1 . $bi_dt2 . "</SPAN>";
       $lin_obj .= "<table id=\"ID_nm_dados_grid_view_sales_detail_group_todo_fecha_" . $ind . "\" style=\"display:" . $display_nm . ";\">";
       $lin_obj .= "<tr><td>";
       $val_r = $this->Ini->dyn_convert_date($val[0]);
       foreach ($Tmp_date as $Ind => $Part_date)
       {
            $AutoTab = (($Ind + 1) < count($Tmp_date)) ? "autoTab: true" : "autoTab: false";
           if (substr($Part_date, 0,1) == "y")
           {
               $val_cmp = (isset($val_r['ano'])) ? $val_r['ano'] : "";
               $lin_obj .= "     <input  type=\"text\" class='sc-js-input " . $this->css_scAppDivToolbarInput . "' id='grid_search_view_sales_detail_group_todo_fecha_ano_val_" . $ind . "' name='val_grid_search_view_sales_detail_group_todo_fecha_ano_" . $ind . "' value=\"" . NM_encode_input($val_cmp) . "\" size=4 alt=\"{datatype: 'mask', maskList: '9999', alignRight: true, maxLength: 4, " . $AutoTab . ", enterTab: false}\">";
           }
           if (substr($Part_date, 0,1) == "m")
           {
               $val_cmp = (isset($val_r['mes'])) ? $val_r['mes'] : "";
               $lin_obj .= "     <input  type=\"text\" class='sc-js-input " . $this->css_scAppDivToolbarInput . "' id='grid_search_view_sales_detail_group_todo_fecha_mes_val_" . $ind . "' name='val_grid_search_view_sales_detail_group_todo_fecha_mes_" . $ind . "' value=\"" . NM_encode_input($val_cmp) . "\" size=2 alt=\"{datatype: 'mask', maskList: '99', alignRight: true, maxLength: 2, " . $AutoTab . ", enterTab: false}\">";
           }
           if (substr($Part_date, 0,1) == "d")
           {
               $val_cmp = (isset($val_r['dia'])) ? $val_r['dia'] : "";
               $lin_obj .= "     <input  type=\"text\" class='sc-js-input " . $this->css_scAppDivToolbarInput . "' id='grid_search_view_sales_detail_group_todo_fecha_dia_val_" . $ind . "' name='val_grid_search_view_sales_detail_group_todo_fecha_dia_" . $ind . "' value=\"" . NM_encode_input($val_cmp) . "\" size=2 alt=\"{datatype: 'mask', maskList: '99', alignRight: true, maxLength: 2, " . $AutoTab . ", enterTab: false}\">";
           }
       }
       $lin_obj .= "     <input type=\"hidden\" id=\"sc_grid_view_sales_detail_group_todo_fecha_jq_" . $ind . "\">";
       $lin_obj .= "&nbsp;";
       $lin_obj .= "" . $date_format_show . "";
       $lin_obj .= "</td></tr></table>";
       $lin_obj .= "       </span>";
       if ($opc == "bw")
       {
           $display_in_2 = "''";
       }
       else
       {
           $display_in_2 = "none";
       }
       $lin_obj .= "       <span id=\"grid_view_sales_detail_group_todo_fecha_in_2_" . $ind . "\" style=\"display:" . $display_in_2 . "\">";
       $date_sep_bw = " " . $this->Ini->Nm_lang['lang_srch_between_values'] . " ";
       if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($date_sep_bw))
       {
           $date_sep_bw = sc_convert_encoding($date_sep_bw, $_SESSION['scriptcase']['charset'], "UTF-8");
       }
       $lin_obj .= "       <br>" . $date_sep_bw . "<br>";
       $val_r = isset($val[1]) ? $this->Ini->dyn_convert_date($val[1]) : array();
       foreach ($Tmp_date as $Ind => $Part_date)
       {
            $AutoTab = (($Ind + 1) < count($Tmp_date)) ? "autoTab: true" : "autoTab: false";
           if (substr($Part_date, 0,1) == "y")
           {
               $val_cmp = (isset($val_r['ano'])) ? $val_r['ano'] : "";
               $lin_obj .= "     <input  type=\"text\" class='sc-js-input " . $this->css_scAppDivToolbarInput . "' id='grid_search_view_sales_detail_group_todo_fecha_v2__ano_val_" . $ind . "' name='val_grid_search_view_sales_detail_group_todo_fecha_v2__ano_" . $ind . "' value=\"" . NM_encode_input($val_cmp) . "\" size=4 alt=\"{datatype: 'mask', maskList: '9999', alignRight: true, maxLength: 4, " . $AutoTab . ", enterTab: false}\">";
           }
           if (substr($Part_date, 0,1) == "m")
           {
               $val_cmp = (isset($val_r['mes'])) ? $val_r['mes'] : "";
               $lin_obj .= "     <input  type=\"text\" class='sc-js-input " . $this->css_scAppDivToolbarInput . "' id='grid_search_view_sales_detail_group_todo_fecha_v2__mes_val_" . $ind . "' name='val_grid_search_view_sales_detail_group_todo_fecha_v2__mes_" . $ind . "' value=\"" . NM_encode_input($val_cmp) . "\" size=2 alt=\"{datatype: 'mask', maskList: '99', alignRight: true, maxLength: 2, " . $AutoTab . ", enterTab: false}\">";
           }
           if (substr($Part_date, 0,1) == "d")
           {
               $val_cmp = (isset($val_r['dia'])) ? $val_r['dia'] : "";
               $lin_obj .= "     <input  type=\"text\" class='sc-js-input " . $this->css_scAppDivToolbarInput . "' id='grid_search_view_sales_detail_group_todo_fecha_v2__dia_val_" . $ind . "' name='val_grid_search_view_sales_detail_group_todo_fecha_v2__dia_" . $ind . "' value=\"" . NM_encode_input($val_cmp) . "\" size=2 alt=\"{datatype: 'mask', maskList: '99', alignRight: true, maxLength: 2, " . $AutoTab . ", enterTab: false}\">";
           }
       }
       $lin_obj .= "     <input type=\"hidden\" id=\"sc_grid_view_sales_detail_group_todo_fecha_v2__jq_" . $ind . "\">";
       $lin_obj .= "&nbsp;";
       $lin_obj .= "" . $date_format_show . "";
       $lin_obj .= "       </span>";
       $lin_obj .= "          </div>";
       $lin_obj .= "          <div class='scGridFilterTagListFilterBar'>";
       $lin_obj .= nmButtonOutput($this->arr_buttons, "bapply_appdiv", "closeAllTags();setTimeout(function() {nm_proc_grid_search($ind, 'proc_grid_search', 'grid_search')}, 200);", "closeAllTags();setTimeout(function() {nm_proc_grid_search($ind, 'proc_grid_search', 'grid_search')}, 200);", "grid_search_apply_" . $ind . "", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
       $lin_obj .= "          </div>";
       $lin_obj .= "      </div>";
       return $lin_obj;
   }
   function grid_search_view_sales_detail_group_todo_id_product($ind, $ajax, $opc="", $val=array(), $label='')
   {
       $lin_obj  = "";
       $lin_obj .= "     <div class='scGridFilterTagListFilter' id='grid_search_view_sales_detail_group_todo_id_product_" . $ind . "' style='display:none; z-index: 10'>";
       $lin_obj .= "         <div class='scGridFilterTagListFilterLabel'>". NM_encode_input($label) ." <span class='scGridFilterTagListFilterLabelClose' onclick='closeAllTags(this);'></span></div>";
       $lin_obj .= "         <div class='scGridFilterTagListFilterInputs'>";
       if (empty($opc))
       {
           $opc = "eq";
       }
       $lin_obj .= "       <select id='grid_search_view_sales_detail_group_todo_id_product_cond_" . $ind . "' name='cond_grid_search_view_sales_detail_group_todo_id_product_" . $ind . "' class='" . $this->css_scAppDivToolbarInput . "' style='vertical-align: middle; display: none'>";
       $selected = ($opc == "eq") ? " selected" : "";
       $lin_obj .= "        <option value='eq'" . $selected . ">" . $this->Ini->Nm_lang['lang_srch_exac'] . "</option>";
       $lin_obj .= "       </select>";
       if ($opc == "nu" || $opc == "nn" || $opc == "ep" || $opc == "ne")
       {
           $display_in_1 = "none";
       }
       else
       {
           $display_in_1 = "''";
       }
       $lin_obj .= "       <span id=\"grid_view_sales_detail_group_todo_id_product_" . $ind . "\" style=\"display:" . $display_in_1 . "\">";
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['psq_check_ret']['view_sales_detail_group_todo_id_product'] = array();
       $view_sales_detail_group_todo_id_product_look = substr($this->Db->qstr($view_sales_detail_group_todo_id_product), 1, -1); 
       $nmgp_def_dados  = ""; 
       $nm_comando = "SELECT id_product, product_name  FROM product  ORDER BY product_name"; 
       $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
       $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->Execute($nm_comando)) 
       { 
          while (!$rs->EOF) 
          { 
             $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['psq_check_ret']['view_sales_detail_group_todo_id_product'][] = trim($rs->fields[0]);
             $nmgp_def_dados .= trim($rs->fields[1]) . "?#?"; 
             $nmgp_def_dados .= trim($rs->fields[0]) . "?#?N?@?"; 
             $rs->MoveNext(); 
          } 
          $rs->Close(); 
       } 
       else  
       {  
           if  ($ajax == 'N')
           {  
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
              exit; 
           } 
           else
           {  
              echo $this->Db->ErrorMsg(); 
           } 
       } 
       $lin_obj .= "   <table style=\"padding: 0px; spacing: 0px; border-width: 0px;\"><tr><td>";
       $lin_obj .= "    <input id='grid_search_view_sales_detail_group_todo_id_product_val_" . $ind . "' name='val_grid_search_view_sales_detail_group_todo_id_product_" . $ind . "' type='hidden' value=''>";
       $lin_obj .= "    <SELECT class='" . $this->css_scAppDivToolbarInput . "' style='height : auto;' id=\"grid_search_view_sales_detail_group_todo_id_product_val_" . $ind . "_orig\" name=\"val_grid_search_view_sales_detail_group_todo_id_product_" . $ind . "_orig\" size=7 multiple onDblClick=\"nm_add_sel_Grid('grid_search_view_sales_detail_group_todo_id_product_val_" . $ind . "_orig', 'grid_search_view_sales_detail_group_todo_id_product_val_" . $ind . "_dest', 'N')\">";
       $delimitador = "##@@";
       $nm_opcoesx = str_replace("?#?@?#?", "?#?@ ?#?", $nmgp_def_dados);
       $nm_opcoes  = explode("?@?", $nm_opcoesx);
       $val = isset($val[0]) ? $val[0] : array();
       foreach ($nm_opcoes as $nm_opcao)
       {
          if (!empty($nm_opcao))
          {
             $temp_bug_list = explode("?#?", $nm_opcao);
             list($nm_opc_val, $nm_opc_cod, $nm_opc_sel) = $temp_bug_list;
             if ($nm_opc_cod == "@ ") {$nm_opc_cod = trim($nm_opc_cod); }
             if (is_array($val) && !empty($val))
             {
                $view_sales_detail_group_todo_id_product_sel = "";
                foreach ($val as $Dados)
                {
                    $tmp_pos = strpos($Dados, "##@@");
                    if ($tmp_pos !== false)
                    {
                        $Dados = substr($Dados, 0, $tmp_pos);
                    }
                    if ($Dados === $nm_opc_cod)
                    {
                        $view_sales_detail_group_todo_id_product_sel = " disabled =\"disabled\" style=\"color: #A0A0A0\"";
                        break;
                    }
                }
             }
             else
             {
                $view_sales_detail_group_todo_id_product_sel = ("S" == $nm_opc_sel) ? " selected" : "";
             }
             $lin_obj .= "       <OPTION value=\"" . NM_encode_input($nm_opc_cod . $delimitador . $nm_opc_val) . "\"" . $view_sales_detail_group_todo_id_product_sel . ">" . $nm_opc_val . "</OPTION>";
          }
       }
       $lin_obj .= "    </SELECT>";
       $lin_obj .= "   </td>";
       $lin_obj .= "   <td align=\"center\">";
       $lin_obj .= "   <div class='scBtnPassField'>";
       $lin_obj .= nmButtonOutput($this->arr_buttons, "bpassfld_rightall", "nm_add_all_Grid('grid_search_view_sales_detail_group_todo_id_product_val_" . $ind . "_orig', 'grid_search_view_sales_detail_group_todo_id_product_val_" . $ind . "_dest', 'N');", "nm_add_all_Grid('grid_search_view_sales_detail_group_todo_id_product_val_" . $ind . "_orig', 'grid_search_view_sales_detail_group_todo_id_product_val_" . $ind . "_dest', 'N');", "G_Bbpassfld_rightall", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");

       $lin_obj .= "   </div>";
       $lin_obj .= "   <div class='scBtnPassField'>";
       $lin_obj .= nmButtonOutput($this->arr_buttons, "bpassfld_right", "nm_add_sel_Grid('grid_search_view_sales_detail_group_todo_id_product_val_" . $ind . "_orig', 'grid_search_view_sales_detail_group_todo_id_product_val_" . $ind . "_dest', 'N');", "nm_add_sel_Grid('grid_search_view_sales_detail_group_todo_id_product_val_" . $ind . "_orig', 'grid_search_view_sales_detail_group_todo_id_product_val_" . $ind . "_dest', 'N');", "G_Bbpassfld_righ", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");

       $lin_obj .= "   </div>";
       $lin_obj .= "   <div class='scBtnPassField'>";
       $lin_obj .= nmButtonOutput($this->arr_buttons, "bpassfld_left", "nm_del_sel_Grid('grid_search_view_sales_detail_group_todo_id_product_val_" . $ind . "_dest', 'grid_search_view_sales_detail_group_todo_id_product_val_" . $ind . "_orig', 'N');", "nm_del_sel_Grid('grid_search_view_sales_detail_group_todo_id_product_val_" . $ind . "_dest', 'grid_search_view_sales_detail_group_todo_id_product_val_" . $ind . "_orig', 'N');", "G_Bbpassfld_left", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");

       $lin_obj .= "   </div>";
       $lin_obj .= "   <div class='scBtnPassField'>";
       $lin_obj .= nmButtonOutput($this->arr_buttons, "bpassfld_leftall", "nm_del_all_Grid('grid_search_view_sales_detail_group_todo_id_product_val_" . $ind . "_dest', 'grid_search_view_sales_detail_group_todo_id_product_val_" . $ind . "_orig', 'N');", "nm_del_all_Grid('grid_search_view_sales_detail_group_todo_id_product_val_" . $ind . "_dest', 'grid_search_view_sales_detail_group_todo_id_product_val_" . $ind . "_orig', 'N');", "G_Bbpassfld_leftall", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");

       $lin_obj .= "   </div>";
       $lin_obj .= "   </td>";
       $lin_obj .= "   <td>";
       $lin_obj .= "    <SELECT class='" . $this->css_scAppDivToolbarInput . "' style='height : auto;' id=\"grid_search_view_sales_detail_group_todo_id_product_val_" . $ind . "_dest\" name=\"val_grid_search_view_sales_detail_group_todo_id_product_" . $ind . "_dest\" size=7 multiple onDblClick=\"nm_del_sel_Grid('grid_search_view_sales_detail_group_todo_id_product_val_" . $ind . "_dest', 'grid_search_view_sales_detail_group_todo_id_product_val_" . $ind . "_orig', 'N')\">";
       $nm_opcoesx = str_replace("?#?@?#?", "?#?@ ?#?", $nmgp_def_dados);
       $nm_opcoes  = explode("?@?", $nm_opcoesx);
       foreach ($nm_opcoes as $nm_opcao)
       {
          if (!empty($nm_opcao))
          {
             $temp_bug_list = explode("?#?", $nm_opcao);
             list($nm_opc_val, $nm_opc_cod, $nm_opc_sel) = $temp_bug_list;
             if ($nm_opc_cod == "@ ") {$nm_opc_cod = trim($nm_opc_cod); }
             if (is_array($val) && !empty($val))
             {
                foreach ($val as $Dados)
                {
                    $tmp_pos = strpos($Dados, "##@@");
                    if ($tmp_pos !== false)
                    {
                        $Dados = substr($Dados, 0, $tmp_pos);
                    }
                    if ($Dados === $nm_opc_cod)
                    {
                        $lin_obj .= "       <OPTION value=\"" . $nm_opc_cod . $delimitador . $nm_opc_val . "\">" . $nm_opc_val . "</OPTION>";
                    }
                }
             }
          }
       }
       $lin_obj .= "    </select>";
       $lin_obj .= "   </td></tr></table>";
       $lin_obj .= "       </span>";
       $lin_obj .= "          </div>";
       $lin_obj .= "          <div class='scGridFilterTagListFilterBar'>";
       $lin_obj .= nmButtonOutput($this->arr_buttons, "bapply_appdiv", "closeAllTags();setTimeout(function() {nm_proc_grid_search($ind, 'proc_grid_search', 'grid_search')}, 200);", "closeAllTags();setTimeout(function() {nm_proc_grid_search($ind, 'proc_grid_search', 'grid_search')}, 200);", "grid_search_apply_" . $ind . "", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
       $lin_obj .= "          </div>";
       $lin_obj .= "      </div>";
       return $lin_obj;
   }
   function formata_bi_view_sales_detail_group_todo_fecha($opc, &$bi_dt1, &$bi_dt2, $opc_bi)
   {
       $Str_date = str_replace("a", "y", strtolower($_SESSION['scriptcase']['reg_conf']['date_format']));
       $Str_date = str_replace("y", "Y", $Str_date);
       $Lim   = strlen($Str_date);
       $Ult   = "";
       $Arr_D = array();
       for ($I = 0; $I < $Lim; $I++)
       {
            $Char = substr($Str_date, $I, 1);
            if ($Char != $Ult)
            {
                $Arr_D[] = $Char;
            }
            $Ult = $Char;
       }
       $Prim = true;
       $date_format_show = "";
       foreach ($Arr_D as $Cada_d)
       {
           $date_format_show .= (!$Prim) ? $_SESSION['scriptcase']['reg_conf']['date_sep'] : "";
           $date_format_show .= ($Cada_d == "d") ? substr($bi_dt1, 0, 2) : "";
           $date_format_show .= ($Cada_d == "m") ? substr($bi_dt1, 2, 2) : "";
           $date_format_show .= ($Cada_d == "Y") ? substr($bi_dt1, 4, 4) : "";
           $Prim = false;
       }
       $bi_dt1 = $date_format_show;
       $date_format_show = "";
       if ($opc_bi == "bw")
       {
           $Prim = true;
           $date_format_show = " " . $this->Ini->Nm_lang['lang_srch_between_values'] . " ";
           foreach ($Arr_D as $Cada_d)
           {
               $date_format_show .= (!$Prim) ? $_SESSION['scriptcase']['reg_conf']['date_sep'] : "";
               $date_format_show .= ($Cada_d == "d") ? substr($bi_dt2, 0, 2): "";
               $date_format_show .= ($Cada_d == "m") ? substr($bi_dt2, 2, 2) : "";
               $date_format_show .= ($Cada_d == "Y") ? substr($bi_dt2, 4, 4) : "";
               $Prim = false;
           }
       }
       $bi_dt2 = $date_format_show;
   }
   function jqueryCalendarDtFormat($sFormat, $sSep)
   {
       $sFormat = chunk_split(str_replace('yyyy', 'yy', $sFormat), 2, $sSep);

       if ($sSep == substr($sFormat, -1))
       {
           $sFormat = substr($sFormat, 0, -1);
       }

       return $sFormat;
   } // jqueryCalendarDtFormat

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

   function gera_array_filtros()
   {
       $this->NM_fil_ant = array();
       $pos_path = strrpos($this->Ini->path_prod, "/");
       $this->NM_path_filter = $this->Ini->root . substr($this->Ini->path_prod, 0, $pos_path) . "/conf/filters/";
       $NM_patch   = "pointofsales/grid_detail_sales_todo";
       if (is_dir($this->NM_path_filter . $NM_patch))
       {
           $NM_dir = @opendir($this->NM_path_filter . $NM_patch);
           while (FALSE !== ($NM_arq = @readdir($NM_dir)))
           {
             if (@is_file($this->NM_path_filter . $NM_patch . "/" . $NM_arq))
             {
                 $Sc_v6 = false;
                 $NMcmp_filter = file($this->NM_path_filter . $NM_patch . "/" . $NM_arq);
                 $NMcmp_filter = explode("@NMF@", $NMcmp_filter[0]);
                 if (substr($NMcmp_filter[0], 0, 6) == "SC_V6_" || substr($NMcmp_filter[0], 0, 6) == "SC_V8_")
                 {
                     $Name_filter = substr($NMcmp_filter[0], 6);
                     if (!empty($Name_filter))
                     {
                         $nmgp_save_name = str_replace('/', ' ', $Name_filter);
                         $nmgp_save_name = str_replace('\\', ' ', $nmgp_save_name);
                         $nmgp_save_name = str_replace('.', ' ', $nmgp_save_name);
                         $this->NM_fil_ant[$Name_filter][0] = $NM_patch . "/" . $nmgp_save_name;
                         $this->NM_fil_ant[$Name_filter][1] = "" . $this->Ini->Nm_lang['lang_srch_public']  . "";
                         $Sc_v6 = true;
                     }
                 }
                 if (!$Sc_v6)
                 {
                     $this->NM_fil_ant[$NM_arq][0] = $NM_patch . "/" . $NM_arq;
                     $this->NM_fil_ant[$NM_arq][1] = "" . $this->Ini->Nm_lang['lang_srch_public']  . "";
                 }
             }
           }
       }
       return $this->NM_fil_ant;
   }
   function JS_grid_search()
   {
       global $nm_saida;
       $nm_saida->saida("   <script type=\"text/javascript\">\r\n");
       $nm_saida->saida("     var Tot_obj_grid_search = " . $this->grid_search_seq . ";\r\n");
       $nm_saida->saida("     Tab_obj_grid_search = new Array();\r\n");
       $nm_saida->saida("     Tab_evt_grid_search = new Array();\r\n");
       foreach ($this->grid_search_dat as $seq => $cmp)
       {
           $nm_saida->saida("     Tab_obj_grid_search[" . $seq . "] = '" . $cmp . "';\r\n");
       }
       $nm_saida->saida(" function sc_grid_detail_sales_todo_valida_mes(obj)\r\n");
       $nm_saida->saida(" {\r\n");
       $nm_saida->saida("     if (obj.value != \"\" && (obj.value < 1 || obj.value > 12))\r\n");
       $nm_saida->saida("     {\r\n");
       $nm_saida->saida("         if (confirm (Nm_erro['lang_jscr_ivdt'] +  \" \" + Nm_erro['lang_jscr_mnth'] +  \" \" + Nm_erro['lang_jscr_wfix']))\r\n");
       $nm_saida->saida("         {\r\n");
       $nm_saida->saida("            Xfocus = setTimeout(function() { obj.focus(); }, 10);\r\n");
       $nm_saida->saida("         }\r\n");
       $nm_saida->saida("     }\r\n");
       $nm_saida->saida(" }\r\n");
       $nm_saida->saida(" function sc_grid_detail_sales_todo_valida_dia(obj)\r\n");
       $nm_saida->saida(" {\r\n");
       $nm_saida->saida("     if (obj.value != \"\" && (obj.value < 1 || obj.value > 31))\r\n");
       $nm_saida->saida("     {\r\n");
       $nm_saida->saida("         if (confirm (Nm_erro['lang_jscr_ivdt'] +  \" \" + Nm_erro['lang_jscr_iday'] +  \" \" + Nm_erro['lang_jscr_wfix']))\r\n");
       $nm_saida->saida("         {\r\n");
       $nm_saida->saida("            Xfocus = setTimeout(function() { obj.focus(); }, 10);\r\n");
       $nm_saida->saida("         }\r\n");
       $nm_saida->saida("     }\r\n");
       $nm_saida->saida(" }\r\n");
       $nm_saida->saida("     Tab_evt_grid_search['view_sales_detail_group_todo_fecha_mes'] =  'sc_grid_detail_sales_todo_valida_mes(this)';\r\n");
       $nm_saida->saida("     Tab_evt_grid_search['view_sales_detail_group_todo_fecha_dia'] =  'sc_grid_detail_sales_todo_valida_dia(this)';\r\n");
       $nm_saida->saida("     Tab_evt_grid_search['view_sales_detail_group_todo_fecha_v2__mes'] =  'sc_grid_detail_sales_todo_valida_mes(this)';\r\n");
       $nm_saida->saida("     Tab_evt_grid_search['view_sales_detail_group_todo_fecha_v2__dia'] =  'sc_grid_detail_sales_todo_valida_dia(this)';\r\n");
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['ajax_nav'])
       { 
           $this->Ini->Arr_result['setArr'][] = array('var' => 'Tab_obj_grid_search', 'value' => '');
           $this->Ini->Arr_result['setArr'][] = array('var' => 'Tab_evt_grid_search', 'value' => '');
           $this->Ini->Arr_result['setVar'][] = array('var' => 'Tot_obj_grid_search', 'value' => $this->grid_search_seq);
           foreach ($this->grid_search_dat as $seq => $cmp)
           {
               $this->Ini->Arr_result['setVar'][] = array('var' => 'Tab_obj_grid_search[' . $seq . ']', 'value' => $cmp);
           }
           $this->Ini->Arr_result['setVar'][] = array('var' => "Tab_evt_grid_search['view_sales_detail_group_todo_fecha_mes']", 'value' => 'sc_grid_detail_sales_todo_valida_mes(this)');
           $this->Ini->Arr_result['setVar'][] = array('var' => "Tab_evt_grid_search['view_sales_detail_group_todo_fecha_dia']", 'value' => 'sc_grid_detail_sales_todo_valida_dia(this)');
           $this->Ini->Arr_result['setVar'][] = array('var' => "Tab_evt_grid_search['view_sales_detail_group_todo_fecha_v2__mes']", 'value' => 'sc_grid_detail_sales_todo_valida_mes(this)');
           $this->Ini->Arr_result['setVar'][] = array('var' => "Tab_evt_grid_search['view_sales_detail_group_todo_fecha_v2__dia']", 'value' => 'sc_grid_detail_sales_todo_valida_dia(this)');
       } 
       $nm_saida->saida("     function SC_carga_evt_jquery_grid(tp_carga)\r\n");
       $nm_saida->saida("     {\r\n");
       $nm_saida->saida("         for (i = 1; i <= Tot_obj_grid_search; i++)\r\n");
       $nm_saida->saida("         {\r\n");
       $nm_saida->saida("             if (Tab_obj_grid_search[i] != 'NMSC_Grid_Null' && (tp_carga == 'all' || tp_carga == i))\r\n");
       $nm_saida->saida("             {\r\n");
       $nm_saida->saida("                 x   = 0;\r\n");
       $nm_saida->saida("                 tmp = Tab_obj_grid_search[i];\r\n");
       $nm_saida->saida("                 cps = new Array();\r\n");
       $nm_saida->saida("                 cps[x] = tmp;\r\n");
       $nm_saida->saida("                 if (tmp == 'view_sales_detail_group_todo_fecha')\r\n");
       $nm_saida->saida("                 {\r\n");
       $nm_saida->saida("                     cps[x] = 'view_sales_detail_group_todo_fecha_dia';\r\n");
       $nm_saida->saida("                     x++;\r\n");
       $nm_saida->saida("                     cps[x] = 'view_sales_detail_group_todo_fecha_mes';\r\n");
       $nm_saida->saida("                     x++;\r\n");
       $nm_saida->saida("                     cps[x] = 'view_sales_detail_group_todo_fecha_v2__dia';\r\n");
       $nm_saida->saida("                     x++;\r\n");
       $nm_saida->saida("                     cps[x] = 'view_sales_detail_group_todo_fecha_v2__mes';\r\n");
       $nm_saida->saida("                 }\r\n");
       $nm_saida->saida("                 for (x = 0; x < cps.length ; x++)\r\n");
       $nm_saida->saida("                 {\r\n");
       $nm_saida->saida("                     cmp = cps[x];\r\n");
       $nm_saida->saida("                     if (Tab_evt_grid_search[cmp])\r\n");
       $nm_saida->saida("                     {\r\n");
       $nm_saida->saida("                         eval (\"$('#grid_search_\" + cmp + \"_val_\" + i + \"').bind('change', function() {\" + Tab_evt_grid_search[cmp] + \"})\");\r\n");
       $nm_saida->saida("                     }\r\n");
       $nm_saida->saida("                 }\r\n");
       $nm_saida->saida("             }\r\n");
       $nm_saida->saida("         }\r\n");
       $nm_saida->saida("         for (i = 1; i <= Tot_obj_grid_search; i++)\r\n");
       $nm_saida->saida("         {\r\n");
       $nm_saida->saida("             if (Tab_obj_grid_search[i] != 'NMSC_Grid_Null' && (tp_carga == 'all' || tp_carga == i))\r\n");
       $nm_saida->saida("             {\r\n");
       $nm_saida->saida("                 tmp = Tab_obj_grid_search[i];\r\n");
       $nm_saida->saida("                 if (tmp == 'view_sales_detail_group_todo_fecha')\r\n");
       $nm_saida->saida("                 {\r\n");
       $nm_saida->saida("                     var i_calendar = i;\r\n");
       $nm_saida->saida("                     $('#sc_grid_view_sales_detail_group_todo_fecha_jq_' + i).datepicker({\r\n");
       $nm_saida->saida("                        beforeShow: function(input, inst) {\r\n");
       $nm_saida->saida("                          var_dt_ini  = document.getElementById('grid_search_view_sales_detail_group_todo_fecha_dia_val_' + i_calendar).value + '/';\r\n");
       $nm_saida->saida("                          var_dt_ini += document.getElementById('grid_search_view_sales_detail_group_todo_fecha_mes_val_' + i_calendar).value + '/';\r\n");
       $nm_saida->saida("                          var_dt_ini += document.getElementById('grid_search_view_sales_detail_group_todo_fecha_ano_val_' + i_calendar).value;\r\n");
       $nm_saida->saida("                          document.getElementById('sc_grid_view_sales_detail_group_todo_fecha_jq_' + i_calendar).value = var_dt_ini;\r\n");
       $nm_saida->saida("                        },\r\n");
       $nm_saida->saida("                        onClose: function(dateText, inst) {\r\n");
       $nm_saida->saida("                          aParts  = dateText.split(\"/\");\r\n");
       $nm_saida->saida("                          document.getElementById('grid_search_view_sales_detail_group_todo_fecha_dia_val_' + i_calendar).value = aParts[0];\r\n");
       $nm_saida->saida("                          document.getElementById('grid_search_view_sales_detail_group_todo_fecha_mes_val_' + i_calendar).value = aParts[1];\r\n");
       $nm_saida->saida("                          document.getElementById('grid_search_view_sales_detail_group_todo_fecha_ano_val_' + i_calendar).value = aParts[2];\r\n");
       $nm_saida->saida("                        },\r\n");
       $nm_saida->saida("                        showWeek: true,\r\n");
       $nm_saida->saida("                        numberOfMonths: 1,\r\n");
       $nm_saida->saida("                        changeMonth: true,\r\n");
       $nm_saida->saida("                        changeYear: true,\r\n");
       $nm_saida->saida("                        yearRange: 'c-5:c+5',\r\n");
       $nm_saida->saida("                        dayNames: [\"" . html_entity_decode($this->Ini->Nm_lang['lang_days_sund'], ENT_COMPAT, $_SESSION['scriptcase']['charset']) . "\",\"" . html_entity_decode($this->Ini->Nm_lang['lang_days_mond'], ENT_COMPAT, $_SESSION['scriptcase']['charset']) . "\",\"" . html_entity_decode($this->Ini->Nm_lang['lang_days_tued'], ENT_COMPAT, $_SESSION['scriptcase']['charset']) . "\",\"" . html_entity_decode($this->Ini->Nm_lang['lang_days_wend'], ENT_COMPAT, $_SESSION['scriptcase']['charset']) . "\",\"" . html_entity_decode($this->Ini->Nm_lang['lang_days_thud'], ENT_COMPAT, $_SESSION['scriptcase']['charset']) . "\",\"" . html_entity_decode($this->Ini->Nm_lang['lang_days_frid'], ENT_COMPAT, $_SESSION['scriptcase']['charset']) . "\",\"" . html_entity_decode($this->Ini->Nm_lang['lang_days_satd'], ENT_COMPAT, $_SESSION['scriptcase']['charset']) . "\"],\r\n");
       $nm_saida->saida("                        dayNamesMin: [\"" . html_entity_decode($this->Ini->Nm_lang['lang_substr_days_sund'], ENT_COMPAT, $_SESSION['scriptcase']['charset']) . "\",\"" . html_entity_decode($this->Ini->Nm_lang['lang_substr_days_mond'], ENT_COMPAT, $_SESSION['scriptcase']['charset']) . "\",\"" . html_entity_decode($this->Ini->Nm_lang['lang_substr_days_tued'], ENT_COMPAT, $_SESSION['scriptcase']['charset']) . "\",\"" . html_entity_decode($this->Ini->Nm_lang['lang_substr_days_wend'], ENT_COMPAT, $_SESSION['scriptcase']['charset']) . "\",\"" . html_entity_decode($this->Ini->Nm_lang['lang_substr_days_thud'], ENT_COMPAT, $_SESSION['scriptcase']['charset']) . "\",\"" . html_entity_decode($this->Ini->Nm_lang['lang_substr_days_frid'], ENT_COMPAT, $_SESSION['scriptcase']['charset']) . "\",\"" . html_entity_decode($this->Ini->Nm_lang['lang_substr_days_satd'], ENT_COMPAT, $_SESSION['scriptcase']['charset']) . "\"],\r\n");
       $nm_saida->saida("                        monthNamesShort: [\"" . html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_janu'], ENT_COMPAT, $_SESSION['scriptcase']['charset']) . "\",\"" . html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_febr'], ENT_COMPAT, $_SESSION['scriptcase']['charset']) . "\",\"" . html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_marc'], ENT_COMPAT, $_SESSION['scriptcase']['charset']) . "\",\"" . html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_apri'], ENT_COMPAT, $_SESSION['scriptcase']['charset']) . "\",\"" . html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_mayy'], ENT_COMPAT, $_SESSION['scriptcase']['charset']) . "\",\"" . html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_june'], ENT_COMPAT, $_SESSION['scriptcase']['charset']) . "\",\"" . html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_july'], ENT_COMPAT, $_SESSION['scriptcase']['charset']) . "\",\"" . html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_augu'], ENT_COMPAT, $_SESSION['scriptcase']['charset']) . "\",\"" . html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_sept'], ENT_COMPAT, $_SESSION['scriptcase']['charset']) . "\",\"" . html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_octo'], ENT_COMPAT, $_SESSION['scriptcase']['charset']) . "\",\"" . html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_nove'], ENT_COMPAT, $_SESSION['scriptcase']['charset']) . "\",\"" . html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_dece'], ENT_COMPAT, $_SESSION['scriptcase']['charset']) . "\"],\r\n");
       $nm_saida->saida("                        weekHeader: \"" . html_entity_decode($this->Ini->Nm_lang['lang_shrt_days_sem'], ENT_COMPAT, $_SESSION['scriptcase']['charset']) . "\",\r\n");
       $nm_saida->saida("                        firstDay: " . $this->jqueryCalendarWeekInit("" . $_SESSION['scriptcase']['reg_conf']['date_week_ini'] . "") . ",\r\n");
       $nm_saida->saida("                        dateFormat: \"" . $this->jqueryCalendarDtFormat("ddmmyyyy", "/") . "\",\r\n");
       $nm_saida->saida("                        showOtherMonths: true,\r\n");
       $nm_saida->saida("                        showOn: \"button\",\r\n");
       $nm_saida->saida("                        buttonImage: \"" . $this->Ini->path_botoes . "/" . $this->arr_buttons['bcalendario']['image'] . "\",\r\n");
       $nm_saida->saida("                        buttonImageOnly: true\r\n");
       $nm_saida->saida("                     });\r\n");
       $nm_saida->saida("                     var i_calendar = i;\r\n");
       $nm_saida->saida("                     $('#sc_grid_view_sales_detail_group_todo_fecha_v2__jq_' + i).datepicker({\r\n");
       $nm_saida->saida("                        beforeShow: function(input, inst) {\r\n");
       $nm_saida->saida("                          var_dt_ini  = document.getElementById('grid_search_view_sales_detail_group_todo_fecha_v2__dia_val_' + i_calendar).value + '/';\r\n");
       $nm_saida->saida("                          var_dt_ini += document.getElementById('grid_search_view_sales_detail_group_todo_fecha_v2__mes_val_' + i_calendar).value + '/';\r\n");
       $nm_saida->saida("                          var_dt_ini += document.getElementById('grid_search_view_sales_detail_group_todo_fecha_v2__ano_val_' + i_calendar).value;\r\n");
       $nm_saida->saida("                          document.getElementById('sc_grid_view_sales_detail_group_todo_fecha_v2__jq_' + i_calendar).value = var_dt_ini;\r\n");
       $nm_saida->saida("                        },\r\n");
       $nm_saida->saida("                        onClose: function(dateText, inst) {\r\n");
       $nm_saida->saida("                          aParts  = dateText.split(\"/\");\r\n");
       $nm_saida->saida("                          document.getElementById('grid_search_view_sales_detail_group_todo_fecha_v2__dia_val_' + i_calendar).value = aParts[0];\r\n");
       $nm_saida->saida("                          document.getElementById('grid_search_view_sales_detail_group_todo_fecha_v2__mes_val_' + i_calendar).value = aParts[1];\r\n");
       $nm_saida->saida("                          document.getElementById('grid_search_view_sales_detail_group_todo_fecha_v2__ano_val_' + i_calendar).value = aParts[2];\r\n");
       $nm_saida->saida("                        },\r\n");
       $nm_saida->saida("                        showWeek: true,\r\n");
       $nm_saida->saida("                        numberOfMonths: 1,\r\n");
       $nm_saida->saida("                        changeMonth: true,\r\n");
       $nm_saida->saida("                        changeYear: true,\r\n");
       $nm_saida->saida("                        yearRange: 'c-5:c+5',\r\n");
       $nm_saida->saida("                        dayNames: [\"" . html_entity_decode($this->Ini->Nm_lang['lang_days_sund'], ENT_COMPAT, $_SESSION['scriptcase']['charset']) . "\",\"" . html_entity_decode($this->Ini->Nm_lang['lang_days_mond'], ENT_COMPAT, $_SESSION['scriptcase']['charset']) . "\",\"" . html_entity_decode($this->Ini->Nm_lang['lang_days_tued'], ENT_COMPAT, $_SESSION['scriptcase']['charset']) . "\",\"" . html_entity_decode($this->Ini->Nm_lang['lang_days_wend'], ENT_COMPAT, $_SESSION['scriptcase']['charset']) . "\",\"" . html_entity_decode($this->Ini->Nm_lang['lang_days_thud'], ENT_COMPAT, $_SESSION['scriptcase']['charset']) . "\",\"" . html_entity_decode($this->Ini->Nm_lang['lang_days_frid'], ENT_COMPAT, $_SESSION['scriptcase']['charset']) . "\",\"" . html_entity_decode($this->Ini->Nm_lang['lang_days_satd'], ENT_COMPAT, $_SESSION['scriptcase']['charset']) . "\"],\r\n");
       $nm_saida->saida("                        dayNamesMin: [\"" . html_entity_decode($this->Ini->Nm_lang['lang_substr_days_sund'], ENT_COMPAT, $_SESSION['scriptcase']['charset']) . "\",\"" . html_entity_decode($this->Ini->Nm_lang['lang_substr_days_mond'], ENT_COMPAT, $_SESSION['scriptcase']['charset']) . "\",\"" . html_entity_decode($this->Ini->Nm_lang['lang_substr_days_tued'], ENT_COMPAT, $_SESSION['scriptcase']['charset']) . "\",\"" . html_entity_decode($this->Ini->Nm_lang['lang_substr_days_wend'], ENT_COMPAT, $_SESSION['scriptcase']['charset']) . "\",\"" . html_entity_decode($this->Ini->Nm_lang['lang_substr_days_thud'], ENT_COMPAT, $_SESSION['scriptcase']['charset']) . "\",\"" . html_entity_decode($this->Ini->Nm_lang['lang_substr_days_frid'], ENT_COMPAT, $_SESSION['scriptcase']['charset']) . "\",\"" . html_entity_decode($this->Ini->Nm_lang['lang_substr_days_satd'], ENT_COMPAT, $_SESSION['scriptcase']['charset']) . "\"],\r\n");
       $nm_saida->saida("                        monthNamesShort: [\"" . html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_janu'], ENT_COMPAT, $_SESSION['scriptcase']['charset']) . "\",\"" . html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_febr'], ENT_COMPAT, $_SESSION['scriptcase']['charset']) . "\",\"" . html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_marc'], ENT_COMPAT, $_SESSION['scriptcase']['charset']) . "\",\"" . html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_apri'], ENT_COMPAT, $_SESSION['scriptcase']['charset']) . "\",\"" . html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_mayy'], ENT_COMPAT, $_SESSION['scriptcase']['charset']) . "\",\"" . html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_june'], ENT_COMPAT, $_SESSION['scriptcase']['charset']) . "\",\"" . html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_july'], ENT_COMPAT, $_SESSION['scriptcase']['charset']) . "\",\"" . html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_augu'], ENT_COMPAT, $_SESSION['scriptcase']['charset']) . "\",\"" . html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_sept'], ENT_COMPAT, $_SESSION['scriptcase']['charset']) . "\",\"" . html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_octo'], ENT_COMPAT, $_SESSION['scriptcase']['charset']) . "\",\"" . html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_nove'], ENT_COMPAT, $_SESSION['scriptcase']['charset']) . "\",\"" . html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_dece'], ENT_COMPAT, $_SESSION['scriptcase']['charset']) . "\"],\r\n");
       $nm_saida->saida("                        weekHeader: \"" . html_entity_decode($this->Ini->Nm_lang['lang_shrt_days_sem'], ENT_COMPAT, $_SESSION['scriptcase']['charset']) . "\",\r\n");
       $nm_saida->saida("                        firstDay: " . $this->jqueryCalendarWeekInit("" . $_SESSION['scriptcase']['reg_conf']['date_week_ini'] . "") . ",\r\n");
       $nm_saida->saida("                        dateFormat: \"" . $this->jqueryCalendarDtFormat("ddmmyyyy", "/") . "\",\r\n");
       $nm_saida->saida("                        showOtherMonths: true,\r\n");
       $nm_saida->saida("                        showOn: \"button\",\r\n");
       $nm_saida->saida("                        buttonImage: \"" . $this->Ini->path_botoes . "/" . $this->arr_buttons['bcalendario']['image'] . "\",\r\n");
       $nm_saida->saida("                        buttonImageOnly: true\r\n");
       $nm_saida->saida("                     });\r\n");
       $nm_saida->saida("                 }\r\n");
       $nm_saida->saida("             }\r\n");
       $nm_saida->saida("         }\r\n");
       $nm_saida->saida("     }\r\n");
       $nm_saida->saida("     function grid_search_change_bi(field, ind)\r\n");
       $nm_saida->saida("     {\r\n");
       $nm_saida->saida("        var index = document.getElementById('grid_search_' + field + '_cond_' + ind).selectedIndex;\r\n");
       $nm_saida->saida("        var parm  = document.getElementById('grid_search_' + field + '_cond_' + ind).options[index].value;\r\n");
       $nm_saida->saida("        if (parm.substring(0, 3) == \"bi_\")\r\n");
       $nm_saida->saida("        {\r\n");
       $nm_saida->saida("            $('#grid_' + field + '_in_2_' + ind).css('display','none');\r\n");
       $nm_saida->saida("            if (parm == \"bi_TP\")\r\n");
       $nm_saida->saida("            {\r\n");
       $nm_saida->saida("                $('#ID_bi_dados_grid_' + field + '_' + ind).html('');\r\n");
       $nm_saida->saida("                $('#ID_bi_dados_grid_' + field + '_' + ind).css('display','');\r\n");
       $nm_saida->saida("                $('#ID_nm_dados_grid_' + field + '_' + ind).css('display','none');\r\n");
       $nm_saida->saida("                return;\r\n");
       $nm_saida->saida("            }\r\n");
       $nm_saida->saida("            ajax_ch_bi_grid_search(field, ind, parm, 'grid');\r\n");
       $nm_saida->saida("        }\r\n");
       $nm_saida->saida("        else\r\n");
       $nm_saida->saida("        {\r\n");
       $nm_saida->saida("            $('#ID_bi_dados_grid_' + field + '_' + ind).css('display','none');\r\n");
       $nm_saida->saida("            if (parm == \"nu\" || parm == \"nn\" || parm == \"ep\" || parm == \"ne\")\r\n");
       $nm_saida->saida("            {\r\n");
       $nm_saida->saida("                $('#ID_nm_dados_grid_' + field + '_' + ind).css('display','none');\r\n");
       $nm_saida->saida("                $('#grid_' + field + '_in_2_' + ind).css('display','none');\r\n");
       $nm_saida->saida("                return;\r\n");
       $nm_saida->saida("            }\r\n");
       $nm_saida->saida("            $('#ID_nm_dados_grid_' + field + '_' + ind).css('display','');\r\n");
       $nm_saida->saida("            if (parm == \"bw\")\r\n");
       $nm_saida->saida("            {\r\n");
       $nm_saida->saida("                $('#grid_' + field + '_in_2_' + ind).css('display','');\r\n");
       $nm_saida->saida("            }\r\n");
       $nm_saida->saida("            else\r\n");
       $nm_saida->saida("            {\r\n");
       $nm_saida->saida("                $('#grid_' + field + '_in_2_' + ind).css('display','none');\r\n");
       $nm_saida->saida("            }\r\n");
       $nm_saida->saida("        }\r\n");
       $nm_saida->saida("     }\r\n");
       $nm_saida->saida("     function grid_search_change_bw(field, ind)\r\n");
       $nm_saida->saida("     {\r\n");
       $nm_saida->saida("        var index = document.getElementById('grid_search_' + field + '_cond_' + ind).selectedIndex;\r\n");
       $nm_saida->saida("        var parm  = document.getElementById('grid_search_' + field + '_cond_' + ind).options[index].value;\r\n");
       $nm_saida->saida("        if (parm == \"bw\")\r\n");
       $nm_saida->saida("        {\r\n");
       $nm_saida->saida("            $('#grid_' + field + '_' + ind).css('display','');\r\n");
       $nm_saida->saida("            $('#grid_' + field + '_in_2_' + ind).css('display','');\r\n");
       $nm_saida->saida("        }\r\n");
       $nm_saida->saida("        else\r\n");
       $nm_saida->saida("        {\r\n");
       $nm_saida->saida("            $('#grid_' + field + '_in_2_' + ind).css('display','none');\r\n");
       $nm_saida->saida("            if (parm == \"nu\" || parm == \"nn\" || parm == \"ep\" || parm == \"ne\")\r\n");
       $nm_saida->saida("            {\r\n");
       $nm_saida->saida("                $('#grid_' + field + '_' + ind).css('display','none');\r\n");
       $nm_saida->saida("            }\r\n");
       $nm_saida->saida("            else\r\n");
       $nm_saida->saida("            {\r\n");
       $nm_saida->saida("                $('#grid_' + field + '_' + ind).css('display','');\r\n");
       $nm_saida->saida("            }\r\n");
       $nm_saida->saida("        }\r\n");
       $nm_saida->saida("     }\r\n");
       $nm_saida->saida("     function grid_search_hide_input(field, ind)\r\n");
       $nm_saida->saida("     {\r\n");
       $nm_saida->saida("        var index = document.getElementById('grid_search_' + field + '_cond_' + ind).selectedIndex;\r\n");
       $nm_saida->saida("        var parm  = document.getElementById('grid_search_' + field + '_cond_' + ind).options[index].value;\r\n");
       $nm_saida->saida("        if (parm == \"nu\" || parm == \"nn\" || parm == \"ep\" || parm == \"ne\")\r\n");
       $nm_saida->saida("        {\r\n");
       $nm_saida->saida("            $('#grid_' + field + '_' + ind).css('display','none');\r\n");
       $nm_saida->saida("        }\r\n");
       $nm_saida->saida("        else\r\n");
       $nm_saida->saida("        {\r\n");
       $nm_saida->saida("            $('#grid_' + field + '_' + ind).css('display','');\r\n");
       $nm_saida->saida("        }\r\n");
       $nm_saida->saida("     }\r\n");
       $nm_saida->saida("     var addfilter_status = 'out';\r\n");
       $nm_saida->saida("     function nm_show_advancedsearch_fields()\r\n");
       $nm_saida->saida("     {\r\n");
       $nm_saida->saida("       var btn_id = 'add_grid_search';\r\n");
       $nm_saida->saida("       var obj_id = 'id_grid_search_add_tag';\r\n");
       $nm_saida->saida("       if($('#' + btn_id).offset().left + $('#' + obj_id).width() > $(document).width())\r\n");
       $nm_saida->saida("       {\r\n");
       $nm_saida->saida("            $('#' + obj_id).css('margin-left', ( $(document).width() - $('#' + btn_id).offset().left - $('#' + obj_id).width() - 10 ));\r\n");
       $nm_saida->saida("       }\r\n");
       $nm_saida->saida("       addfilter_status = 'open';\r\n");
       $nm_saida->saida("       $('#' + btn_id).mouseout(function() {\r\n");
       $nm_saida->saida("         setTimeout(function() {\r\n");
       $nm_saida->saida("           nm_hide_advancedsearch_fields(obj_id);\r\n");
       $nm_saida->saida("         }, 1000);\r\n");
       $nm_saida->saida("       });\r\n");
       $nm_saida->saida("       $('#' + obj_id + ' div').click(function() {\r\n");
       $nm_saida->saida("         addfilter_status = 'out';\r\n");
       $nm_saida->saida("         nm_hide_advancedsearch_fields(obj_id);\r\n");
       $nm_saida->saida("       });\r\n");
       $nm_saida->saida("       $('#' + obj_id).css({\r\n");
       $nm_saida->saida("         'left': $('#' + btn_id).left\r\n");
       $nm_saida->saida("       })\r\n");
       $nm_saida->saida("       .mouseover(function() {\r\n");
       $nm_saida->saida("         addfilter_status = 'over';\r\n");
       $nm_saida->saida("       })\r\n");
       $nm_saida->saida("       .mouseleave(function() {\r\n");
       $nm_saida->saida("         addfilter_status = 'out';\r\n");
       $nm_saida->saida("         setTimeout(function() {\r\n");
       $nm_saida->saida("           nm_hide_advancedsearch_fields(obj_id);\r\n");
       $nm_saida->saida("         }, 1000);\r\n");
       $nm_saida->saida("       })\r\n");
       $nm_saida->saida("       .show('fast');\r\n");
       $nm_saida->saida("     }\r\n");
       $nm_saida->saida("     function nm_hide_advancedsearch_fields(obj_id) {\r\n");
       $nm_saida->saida("      if ('over' != addfilter_status) {\r\n");
       $nm_saida->saida("        $('#' + obj_id).hide('fast');\r\n");
       $nm_saida->saida("      }\r\n");
       $nm_saida->saida("     }\r\n");
       $nm_saida->saida("     function closeAllTags(obj)\r\n");
       $nm_saida->saida("     {\r\n");
       $nm_saida->saida("         if (obj !== undefined)\r\n");
       $nm_saida->saida("         {\r\n");
       $nm_saida->saida("             if($(obj).parent().parent().parent().attr('new') == 'new')\r\n");
       $nm_saida->saida("             {\r\n");
       $nm_saida->saida("                 $(obj).parent().parent().parent().find('.scGridFilterTagListItemClose').click();\r\n");
       $nm_saida->saida("             }\r\n");
       $nm_saida->saida("         }\r\n");
       $nm_saida->saida("         $('.scGridFilterTagListFilter').hide();\r\n");
       $nm_saida->saida("     }\r\n");
       $nm_saida->saida("     function checkLastTag(bol_force)\r\n");
       $nm_saida->saida("     {\r\n");
       $nm_saida->saida("         if(bol_force || $('.scGridFilterTagListItem').length == 0)\r\n");
       $nm_saida->saida("         {\r\n");
       $nm_saida->saida("             $('#NM_Grid_Search').remove();\r\n");
       $nm_saida->saida("         }\r\n");
       $nm_saida->saida("     }\r\n");
       $nm_saida->saida("     var nm_empty_data_cond = ['ep','ne','nu','nn'];\r\n");
       $nm_saida->saida("     function nm_proc_grid_search(Seq, Tp_Proc, Origem)\r\n");
       $nm_saida->saida("     {\r\n");
       $nm_saida->saida("         var out_dyn = \"\";\r\n");
       $nm_saida->saida("         var i       = Seq;\r\n");
       $nm_saida->saida("         if (Tp_Proc == 'del_grid_search' || Tp_Proc == 'del_grid_search_all')\r\n");
       $nm_saida->saida("         {\r\n");
       $nm_saida->saida("             $('#add_grid_search').removeClass('scGridFilterTagAddDisabled');\r\n");
       $nm_saida->saida("             out_dyn += Tab_obj_grid_search[i] + \"_DYN_\" + Tp_Proc;\r\n");
       $nm_saida->saida("             if (Tp_Proc == 'del_grid_search_all')\r\n");
       $nm_saida->saida("             {\r\n");
       $nm_saida->saida("                 Tab_obj_grid_search = new Array();\r\n");
       $nm_saida->saida("                 checkLastTag(true);\r\n");
       $nm_saida->saida("             }\r\n");
       $nm_saida->saida("             else\r\n");
       $nm_saida->saida("             {\r\n");
       $nm_saida->saida("                 Tab_obj_grid_search[i] = 'NMSC_Grid_Null';\r\n");
       $nm_saida->saida("                 eval('Dropdownchecklist_'+ Tab_obj_grid_search[i] +'=false;');\r\n");
       $nm_saida->saida("             }\r\n");
       $nm_saida->saida("         }\r\n");
       $nm_saida->saida("         else\r\n");
       $nm_saida->saida("         {\r\n");
       $nm_saida->saida("             $('#grid_search_' + Tab_obj_grid_search[i]).attr('new', '');\r\n");
       $nm_saida->saida("             if (Tab_obj_grid_search[i] != 'NMSC_Grid_Null')\r\n");
       $nm_saida->saida("             {\r\n");
       $nm_saida->saida("                 out_dyn += Tab_obj_grid_search[i];\r\n");
       $nm_saida->saida("                 obj_dyn  = 'grid_search_' + Tab_obj_grid_search[i] + '_cond_' + i;\r\n");
       $nm_saida->saida("                 out_cond = grid_search_get_sel_cond(obj_dyn);\r\n");
       $nm_saida->saida("                 out_dyn += \"_DYN_\" + out_cond;\r\n");
       $nm_saida->saida("                 obj_dyn  = 'grid_search_' + Tab_obj_grid_search[i] + '_val_';\r\n");
       $nm_saida->saida("                 if (Tab_obj_grid_search[i] == 'view_sales_detail_group_todo_fecha')\r\n");
       $nm_saida->saida("                 {\r\n");
       $nm_saida->saida("                     obj_dyn = 'grid_search_' + Tab_obj_grid_search[i];\r\n");
       $nm_saida->saida("                     result  = grid_search_get_dt_h(obj_dyn, i, 'DT');\r\n");
       $nm_saida->saida("                     result += \"_VLS2_\" + grid_search_get_dt_h(obj_dyn + \"_v2_\", i, 'DT');\r\n");
       $nm_saida->saida("                 }\r\n");
       $nm_saida->saida("                 if (Tab_obj_grid_search[i] == 'view_sales_detail_group_todo_id_product')\r\n");
       $nm_saida->saida("                 {\r\n");
       $nm_saida->saida("                     result  = grid_search_get_Dselelect(obj_dyn + i + '_dest');\r\n");
       $nm_saida->saida("                 }\r\n");
       $nm_saida->saida("                 if((result == '' || result == '_VLS2_' || result == 'Y:_VLS_M:_VLS_D:_VLS2_Y:_VLS_M:_VLS_D:' || result == 'Y:_VLS_M:_VLS_D:_VLS_H:_VLS_I:_VLS_S:_VLS2_Y:_VLS_M:_VLS_D:_VLS_H:_VLS_I:_VLS_S:') && nm_empty_data_cond.indexOf(out_cond) == -1 && out_cond.substring(0, 3) != 'bi_')\r\n");
       $nm_saida->saida("                 {\r\n");
       $nm_saida->saida("                     alert(\"" . $this->Ini->Nm_lang['lang_srch_req_field'] . "\");\r\n");
       $nm_saida->saida("                     return false;\r\n");
       $nm_saida->saida("                 }\r\n");
       $nm_saida->saida("                 out_dyn += \"_DYN_\" + result;\r\n");
       $nm_saida->saida("             }\r\n");
       $nm_saida->saida("         }\r\n");
       $nm_saida->saida("         ajax_navigate(Origem, out_dyn);\r\n");
       $nm_saida->saida("     }\r\n");
       $nm_saida->saida("     function nm_save_grid_search()\r\n");
       $nm_saida->saida("     {\r\n");
       $nm_saida->saida("         if (document.Fgrid_search_save.nmgp_save_name.value == '')\r\n");
       $nm_saida->saida("         {\r\n");
       $nm_saida->saida("             alert(\"" . $this->Ini->Nm_lang['lang_srch_req_field'] . "\");\r\n");
       $nm_saida->saida("             document.Fgrid_search_save.nmgp_save_name.focus();\r\n");
       $nm_saida->saida("             return false;\r\n");
       $nm_saida->saida("         }\r\n");
       $nm_saida->saida("         save_name = document.Fgrid_search_save.nmgp_save_name.value;\r\n");
       $nm_saida->saida("         save_opt  = \"\"\r\n");
       $nm_saida->saida("         str_out = \"\";\r\n");
       $nm_saida->saida("         for (i = 1; i <= Tot_obj_grid_search; i++)\r\n");
       $nm_saida->saida("         {\r\n");
       $nm_saida->saida("             if (Tab_obj_grid_search[i] != 'NMSC_Grid_Null')\r\n");
       $nm_saida->saida("             {\r\n");
       $nm_saida->saida("                 obj_dyn  = 'grid_search_' + Tab_obj_grid_search[i] + '_cond_' + i;\r\n");
       $nm_saida->saida("                 out_cond = grid_search_get_sel_cond(obj_dyn);\r\n");
       $nm_saida->saida("                 str_out += \"SC_\" + Tab_obj_grid_search[i] + \"_cond#NMF#\" + out_cond + \"@NMF@\";\r\n");
       $nm_saida->saida("                 obj_dyn  = 'grid_search_' + Tab_obj_grid_search[i] + '_val_';\r\n");
       $nm_saida->saida("                 obj_dyn2 = 'grid_search_' + Tab_obj_grid_search[i] + '_v2__val_';\r\n");
       $nm_saida->saida("                 if (Tab_obj_grid_search[i] == 'view_sales_detail_group_todo_fecha')\r\n");
       $nm_saida->saida("                 {\r\n");
       $nm_saida->saida("                     obj_dyn = 'grid_search_' + Tab_obj_grid_search[i];\r\n");
       $nm_saida->saida("                     result  = grid_search_get_dt_h(obj_dyn, i, 'DT');\r\n");
       $nm_saida->saida("                     result += \"_VLS2_\" + grid_search_get_dt_h(obj_dyn + \"_v2_\", i, 'DT');\r\n");
       $nm_saida->saida("                     tvals  = result.split(\"_VLS2_\");\r\n");
       $nm_saida->saida("                     vals  = tvals[0].split(\"_VLS_\");\r\n");
       $nm_saida->saida("                     for (x = 0; x < vals.length; x++)\r\n");
       $nm_saida->saida("                     {\r\n");
       $nm_saida->saida("                         if (vals[x].substring(0, 2) == \"Y:\")\r\n");
       $nm_saida->saida("                         {\r\n");
       $nm_saida->saida("                             str_out += \"SC_\" + Tab_obj_grid_search[i] + \"_ano#NMF#\" + vals[x].substring(2) + \"@NMF@\";\r\n");
       $nm_saida->saida("                         }\r\n");
       $nm_saida->saida("                         if (vals[x].substring(0, 2) == \"M:\")\r\n");
       $nm_saida->saida("                         {\r\n");
       $nm_saida->saida("                             str_out += \"SC_\" + Tab_obj_grid_search[i] + \"_mes#NMF#\" + vals[x].substring(2) + \"@NMF@\";\r\n");
       $nm_saida->saida("                         }\r\n");
       $nm_saida->saida("                         if (vals[x].substring(0, 2) == \"D:\")\r\n");
       $nm_saida->saida("                         {\r\n");
       $nm_saida->saida("                             str_out += \"SC_\" + Tab_obj_grid_search[i] + \"_dia#NMF#\" + vals[x].substring(2) + \"@NMF@\";\r\n");
       $nm_saida->saida("                         }\r\n");
       $nm_saida->saida("                         if (vals[x].substring(0, 2) == \"H:\")\r\n");
       $nm_saida->saida("                         {\r\n");
       $nm_saida->saida("                             str_out += \"SC_\" + Tab_obj_grid_search[i] + \"_hor#NMF#\" + vals[x].substring(2) + \"@NMF@\";\r\n");
       $nm_saida->saida("                         }\r\n");
       $nm_saida->saida("                         if (vals[x].substring(0, 2) == \"I:\")\r\n");
       $nm_saida->saida("                         {\r\n");
       $nm_saida->saida("                             str_out += \"SC_\" + Tab_obj_grid_search[i] + \"_min#NMF#\" + vals[x].substring(2) + \"@NMF@\";\r\n");
       $nm_saida->saida("                         }\r\n");
       $nm_saida->saida("                         if (vals[x].substring(0, 2) == \"S:\")\r\n");
       $nm_saida->saida("                         {\r\n");
       $nm_saida->saida("                             str_out += \"SC_\" + Tab_obj_grid_search[i] + \"_seg#NMF#\" + vals[x].substring(2) + \"@NMF@\";\r\n");
       $nm_saida->saida("                         }\r\n");
       $nm_saida->saida("                     }\r\n");
       $nm_saida->saida("                     if (tvals[1])\r\n");
       $nm_saida->saida("                     {\r\n");
       $nm_saida->saida("                         vals  = tvals[1].split(\"_VLS_\");\r\n");
       $nm_saida->saida("                         for (x = 0; x < vals.length; x++)\r\n");
       $nm_saida->saida("                         {\r\n");
       $nm_saida->saida("                             if (vals[x].substring(0, 2) == \"Y:\")\r\n");
       $nm_saida->saida("                             {\r\n");
       $nm_saida->saida("                                 str_out += \"SC_\" + Tab_obj_grid_search[i] + \"_input_2_ano#NMF#\" + vals[x].substring(2) + \"@NMF@\";\r\n");
       $nm_saida->saida("                             }\r\n");
       $nm_saida->saida("                             if (vals[x].substring(0, 2) == \"M:\")\r\n");
       $nm_saida->saida("                             {\r\n");
       $nm_saida->saida("                                 str_out += \"SC_\" + Tab_obj_grid_search[i] + \"_input_2_mes#NMF#\" + vals[x].substring(2) + \"@NMF@\";\r\n");
       $nm_saida->saida("                             }\r\n");
       $nm_saida->saida("                             if (vals[x].substring(0, 2) == \"D:\")\r\n");
       $nm_saida->saida("                             {\r\n");
       $nm_saida->saida("                                 str_out += \"SC_\" + Tab_obj_grid_search[i] + \"_input_2_dia#NMF#\" + vals[x].substring(2) + \"@NMF@\";\r\n");
       $nm_saida->saida("                             }\r\n");
       $nm_saida->saida("                             if (vals[x].substring(0, 2) == \"H:\")\r\n");
       $nm_saida->saida("                             {\r\n");
       $nm_saida->saida("                                 str_out += \"SC_\" + Tab_obj_grid_search[i] + \"_input_2_hor#NMF#\" + vals[x].substring(2) + \"@NMF@\";\r\n");
       $nm_saida->saida("                             }\r\n");
       $nm_saida->saida("                             if (vals[x].substring(0, 2) == \"I:\")\r\n");
       $nm_saida->saida("                             {\r\n");
       $nm_saida->saida("                                 str_out += \"SC_\" + Tab_obj_grid_search[i] + \"_input_2_min#NMF#\" + vals[x].substring(2) + \"@NMF@\";\r\n");
       $nm_saida->saida("                             }\r\n");
       $nm_saida->saida("                             if (vals[x].substring(0, 2) == \"S:\")\r\n");
       $nm_saida->saida("                             {\r\n");
       $nm_saida->saida("                                 str_out += \"SC_\" + Tab_obj_grid_search[i] + \"_input_2_seg#NMF#\" + vals[x].substring(2) + \"@NMF@\";\r\n");
       $nm_saida->saida("                             }\r\n");
       $nm_saida->saida("                         }\r\n");
       $nm_saida->saida("                     }\r\n");
       $nm_saida->saida("                 }\r\n");
       $nm_saida->saida("                 if (Tab_obj_grid_search[i] == 'view_sales_detail_group_todo_id_product')\r\n");
       $nm_saida->saida("                 {\r\n");
       $nm_saida->saida("                     result  = grid_search_get_Dselelect(obj_dyn + i + '_dest');\r\n");
       $nm_saida->saida("                     tvals  = result.split(\"_VLS_\");\r\n");
       $nm_saida->saida("                     if (tvals[1])\r\n");
       $nm_saida->saida("                     {\r\n");
       $nm_saida->saida("                         str_out += \"SC_\" + Tab_obj_grid_search[i] + \"#NMF#_NM_array_\";\r\n");
       $nm_saida->saida("                         for (x = 0; x < tvals.length; x++)\r\n");
       $nm_saida->saida("                         {\r\n");
       $nm_saida->saida("                             str_out += \"#NMARR#\" + tvals[x];\r\n");
       $nm_saida->saida("                         }\r\n");
       $nm_saida->saida("                         str_out += \"@NMF@\";\r\n");
       $nm_saida->saida("                     }\r\n");
       $nm_saida->saida("                     else\r\n");
       $nm_saida->saida("                     {\r\n");
       $nm_saida->saida("                         str_out += \"SC_\" + Tab_obj_grid_search[i] + \"#NMF#\" + result + \"@NMF@\";\r\n");
       $nm_saida->saida("                     }\r\n");
       $nm_saida->saida("                 }\r\n");
       $nm_saida->saida("             }\r\n");
       $nm_saida->saida("         }\r\n");
       $nm_saida->saida("         nmAjaxProcOn();\r\n");
       $nm_saida->saida("         $.ajax({\r\n");
       $nm_saida->saida("           type: \"POST\",\r\n");
       $nm_saida->saida("           url: \"index.php\",\r\n");
       $nm_saida->saida("           data: \"nmgp_opcao=ajax_filter_save&script_case_init=\" + document.Fgrid_search.script_case_init.value + \"&nmgp_save_name=\" + save_name + \"&nmgp_save_option=\" + save_opt + \"&NM_filters_save=\" + str_out + \"&nmgp_save_origem=grid\"\r\n");
       $nm_saida->saida("          })\r\n");
       $nm_saida->saida("          .done(function(json_save_fil) {\r\n");
       $nm_saida->saida("             var i, oResp;\r\n");
       $nm_saida->saida("             Tst_integrid = json_save_fil.trim();\r\n");
       $nm_saida->saida("             if (\"{\" != Tst_integrid.substr(0, 1)) {\r\n");
       $nm_saida->saida("                 nmAjaxProcOff();\r\n");
       $nm_saida->saida("                 alert (json_save_fil);\r\n");
       $nm_saida->saida("                 return;\r\n");
       $nm_saida->saida("             }\r\n");
       $nm_saida->saida("             eval(\"oResp = \" + json_save_fil);\r\n");
       $nm_saida->saida("             if (oResp[\"ss_time_out\"]) {\r\n");
       $nm_saida->saida("                 nmAjaxProcOff();\r\n");
       $nm_saida->saida("                 nm_move();\r\n");
       $nm_saida->saida("             }\r\n");
       $nm_saida->saida("             if (oResp[\"setValue\"]) {\r\n");
       $nm_saida->saida("               for (i = 0; i < oResp[\"setValue\"].length; i++) {\r\n");
       $nm_saida->saida("                    $(\"#\" + oResp[\"setValue\"][i][\"field\"]).html(oResp[\"setValue\"][i][\"value\"]);\r\n");
       $nm_saida->saida("               }\r\n");
       $nm_saida->saida("             }\r\n");
       $nm_saida->saida("             if (oResp[\"htmOutput\"]) {\r\n");
       $nm_saida->saida("                 nmAjaxShowDebug(oResp);\r\n");
       $nm_saida->saida("              }\r\n");
       $nm_saida->saida("             document.getElementById('SC_nmgp_save_name').value = '';\r\n");
       $nm_saida->saida("             document.getElementById('Apaga_filters').style.display = '';\r\n");
       $nm_saida->saida("             document.getElementById('id_sel_recup_filters').style.display = '';\r\n");
       $nm_saida->saida("             document.getElementById('Salvar_filters').style.display = 'none';\r\n");
       $nm_saida->saida("             document.getElementById('id_sel_recup_filters').selectedIndex = -1;\r\n");
       $nm_saida->saida("             document.getElementById('sel_filters_del').selectedIndex = -1;\r\n");
       $nm_saida->saida("             nmAjaxProcOff();\r\n");
       $nm_saida->saida("         });\r\n");
       $nm_saida->saida("     }\r\n");
       $nm_saida->saida("     function nm_del_grid_search()\r\n");
       $nm_saida->saida("     {\r\n");
       $nm_saida->saida("        obj_sel = document.Fgrid_search_save.elements['NM_filters_del'];\r\n");
       $nm_saida->saida("        index   = obj_sel.selectedIndex;\r\n");
       $nm_saida->saida("        if (index == -1 || obj_sel.options[index].value == \"\") \r\n");
       $nm_saida->saida("        {\r\n");
       $nm_saida->saida("            return false;\r\n");
       $nm_saida->saida("        }\r\n");
       $nm_saida->saida("        parm = obj_sel.options[index].value;\r\n");
       $nm_saida->saida("        nmAjaxProcOn();\r\n");
       $nm_saida->saida("        $.ajax({\r\n");
       $nm_saida->saida("          type: \"POST\",\r\n");
       $nm_saida->saida("          url: \"index.php\",\r\n");
       $nm_saida->saida("          data: \"nmgp_opcao=ajax_filter_delete&script_case_init=\" + document.Fgrid_search.script_case_init.value + \"&NM_filters_del=\" + parm + \"&nmgp_save_origem=grid\"\r\n");
       $nm_saida->saida("         })\r\n");
       $nm_saida->saida("         .done(function(json_del_fil) {\r\n");
       $nm_saida->saida("            var i, oResp;\r\n");
       $nm_saida->saida("            Tst_integrid = json_del_fil.trim();\r\n");
       $nm_saida->saida("            if (\"{\" != Tst_integrid.substr(0, 1)) {\r\n");
       $nm_saida->saida("                nmAjaxProcOff();\r\n");
       $nm_saida->saida("                alert (json_del_fil);\r\n");
       $nm_saida->saida("                return;\r\n");
       $nm_saida->saida("            }\r\n");
       $nm_saida->saida("            eval(\"oResp = \" + json_del_fil);\r\n");
       $nm_saida->saida("             if (oResp[\"ss_time_out\"]) {\r\n");
       $nm_saida->saida("                 nmAjaxProcOff();\r\n");
       $nm_saida->saida("                 nm_move();\r\n");
       $nm_saida->saida("             }\r\n");
       $nm_saida->saida("            if (oResp[\"setValue\"]) {\r\n");
       $nm_saida->saida("              for (i = 0; i < oResp[\"setValue\"].length; i++) {\r\n");
       $nm_saida->saida("                   $(\"#\" + oResp[\"setValue\"][i][\"field\"]).html(oResp[\"setValue\"][i][\"value\"]);\r\n");
       $nm_saida->saida("              }\r\n");
       $nm_saida->saida("            }\r\n");
       $nm_saida->saida("            if (oResp[\"htmOutput\"]) {\r\n");
       $nm_saida->saida("                nmAjaxShowDebug(oResp);\r\n");
       $nm_saida->saida("            }\r\n");
       $nm_saida->saida("            nmAjaxProcOff();\r\n");
       $nm_saida->saida("        });\r\n");
       $nm_saida->saida("     }\r\n");
       $nm_saida->saida("     function nm_change_grid_search(obj_sel)\r\n");
       $nm_saida->saida("     {\r\n");
       $nm_saida->saida("        index = obj_sel.selectedIndex;\r\n");
       $nm_saida->saida("        if (index == -1 || obj_sel.options[index].value == \"\") \r\n");
       $nm_saida->saida("        {\r\n");
       $nm_saida->saida("            return false;\r\n");
       $nm_saida->saida("        }\r\n");
       $nm_saida->saida("        for (i = 1; i <= Tot_obj_grid_search; i++)\r\n");
       $nm_saida->saida("        {\r\n");
       $nm_saida->saida("            $('#grid_search_' + Tab_obj_grid_search[i]).remove();\r\n");
       $nm_saida->saida("             eval('Dropdownchecklist_'+ Tab_obj_grid_search[i] +'=false;');\r\n");
       $nm_saida->saida("        }\r\n");
       $nm_saida->saida("        Tot_obj_grid_search = 0;\r\n");
       $nm_saida->saida("        Tab_obj_grid_search = new Array();\r\n");
       $nm_saida->saida("        ajax_navigate('grid_search_change_fil', obj_sel.options[index].value);;\r\n");
       $nm_saida->saida("     }\r\n");
       $nm_saida->saida(" var nm_quant_pack;\r\n");
       $nm_saida->saida(" // Adiciona um elemento\r\n");
       $nm_saida->saida(" //----------------------\r\n");
       $nm_saida->saida(" function nm_add_sel_Grid(sOrig, sDest, Saida)\r\n");
       $nm_saida->saida(" {\r\n");
       $nm_saida->saida("  // Recupera objetos\r\n");
       $nm_saida->saida("  oOrig = document.getElementById(sOrig);\r\n");
       $nm_saida->saida("  oDest = document.getElementById(sDest);\r\n");
       $nm_saida->saida("  // Varre itens do destino\r\n");
       $nm_saida->saida("  Psel  = false;\r\n");
       $nm_saida->saida("  iDest = 0;\r\n");
       $nm_saida->saida("  iInit = oDest.length;\r\n");
       $nm_saida->saida("  arr_sel = new Array();\r\n");
       $nm_saida->saida("  for (i = 0; i < oDest.length; i++)\r\n");
       $nm_saida->saida("  {\r\n");
       $nm_saida->saida("   if (oDest.options[i].selected && !Psel)\r\n");
       $nm_saida->saida("   {\r\n");
       $nm_saida->saida("       Psel  = true;\r\n");
       $nm_saida->saida("       iInit = i + 1;\r\n");
       $nm_saida->saida("   }\r\n");
       $nm_saida->saida("   else\r\n");
       $nm_saida->saida("   if (Psel)\r\n");
       $nm_saida->saida("   {\r\n");
       $nm_saida->saida("     arr_sel[iDest] = new Array(oDest.options[i].value, oDest.options[i].text);\r\n");
       $nm_saida->saida("     iDest++;\r\n");
       $nm_saida->saida("   }\r\n");
       $nm_saida->saida("  }\r\n");
       $nm_saida->saida("  // Varre itens da origem\r\n");
       $nm_saida->saida("  for (i = 0; i < oOrig.length; i++)\r\n");
       $nm_saida->saida("  {\r\n");
       $nm_saida->saida("   // Item na origem selecionado e valido\r\n");
       $nm_saida->saida("   if (oOrig.options[i].selected && !oOrig.options[i].disabled)\r\n");
       $nm_saida->saida("   {\r\n");
       $nm_saida->saida("    // Recupera valores da origem\r\n");
       $nm_saida->saida("    sText  = oOrig.options[i].text;\r\n");
       $nm_saida->saida("    sValue = oOrig.options[i].value;\r\n");
       $nm_saida->saida("    // Cria item no destino\r\n");
       $nm_saida->saida("    oDest.options[iInit] = new Option(sText, sValue);\r\n");
       $nm_saida->saida("    // Desabilita item na origem\r\n");
       $nm_saida->saida("    oOrig.options[i].style.color = \"#A0A0A0\";\r\n");
       $nm_saida->saida("    oOrig.options[i].disabled    = true;\r\n");
       $nm_saida->saida("    oOrig.options[i].selected    = false;\r\n");
       $nm_saida->saida("    iInit++;\r\n");
       $nm_saida->saida("   }\r\n");
       $nm_saida->saida("  }\r\n");
       $nm_saida->saida("  // Completa itens do destino\r\n");
       $nm_saida->saida("  if (iDest > 0)\r\n");
       $nm_saida->saida("  {\r\n");
       $nm_saida->saida("   for (i = 0; i < iDest; i++)\r\n");
       $nm_saida->saida("   {\r\n");
       $nm_saida->saida("     oDest.options[iInit] = new Option();\r\n");
       $nm_saida->saida("     oDest.options[iInit].value = arr_sel[i][0];\r\n");
       $nm_saida->saida("     oDest.options[iInit].text  = arr_sel[i][1];\r\n");
       $nm_saida->saida("     iInit++;\r\n");
       $nm_saida->saida("   }\r\n");
       $nm_saida->saida("  }\r\n");
       $nm_saida->saida("  // Reset combos\r\n");
       $nm_saida->saida("  oOrig.selectedIndex = -1;\r\n");
       $nm_saida->saida("  oDest.selectedIndex = -1;\r\n");
       $nm_saida->saida("  if (Saida == \"S\")\r\n");
       $nm_saida->saida("  {\r\n");
       $nm_saida->saida("      document.Fgrid_search.submit();\r\n");
       $nm_saida->saida("  }\r\n");
       $nm_saida->saida(" }\r\n");
       $nm_saida->saida(" // Adiciona todos os elementos\r\n");
       $nm_saida->saida(" //-----------------------------\r\n");
       $nm_saida->saida(" function nm_add_all_Grid(sOrig, sDest, Saida)\r\n");
       $nm_saida->saida(" {\r\n");
       $nm_saida->saida("  // Recupera objetos\r\n");
       $nm_saida->saida("  oOrig = document.getElementById(sOrig);\r\n");
       $nm_saida->saida("  oDest = document.getElementById(sDest);\r\n");
       $nm_saida->saida("  // Varre itens do destino\r\n");
       $nm_saida->saida("  Psel  = false;\r\n");
       $nm_saida->saida("  iDest = 0;\r\n");
       $nm_saida->saida("  iInit = oDest.length;\r\n");
       $nm_saida->saida("  arr_sel = new Array();\r\n");
       $nm_saida->saida("  for (i = 0; i < oDest.length; i++)\r\n");
       $nm_saida->saida("  {\r\n");
       $nm_saida->saida("   if (oDest.options[i].selected && !Psel)\r\n");
       $nm_saida->saida("   {\r\n");
       $nm_saida->saida("       Psel  = true;\r\n");
       $nm_saida->saida("       iInit = i + 1;\r\n");
       $nm_saida->saida("   }\r\n");
       $nm_saida->saida("   else\r\n");
       $nm_saida->saida("   if (Psel)\r\n");
       $nm_saida->saida("   {\r\n");
       $nm_saida->saida("     arr_sel[iDest] = new Array(oDest.options[i].value, oDest.options[i].text);\r\n");
       $nm_saida->saida("     iDest++;\r\n");
       $nm_saida->saida("   }\r\n");
       $nm_saida->saida("  }\r\n");
       $nm_saida->saida("  // Varre itens da origem\r\n");
       $nm_saida->saida("  for (i = 0; i < oOrig.length; i++)\r\n");
       $nm_saida->saida("  {\r\n");
       $nm_saida->saida("   // Item na origem valido\r\n");
       $nm_saida->saida("   if (!oOrig.options[i].disabled)\r\n");
       $nm_saida->saida("   {\r\n");
       $nm_saida->saida("    // Recupera valores da origem\r\n");
       $nm_saida->saida("    sText  = oOrig.options[i].text;\r\n");
       $nm_saida->saida("    sValue = oOrig.options[i].value;\r\n");
       $nm_saida->saida("    // Cria item no destino\r\n");
       $nm_saida->saida("    oDest.options[iInit] = new Option(sText, sValue);\r\n");
       $nm_saida->saida("    // Desabilita item na origem\r\n");
       $nm_saida->saida("    oOrig.options[i].style.color = \"#A0A0A0\";\r\n");
       $nm_saida->saida("    oOrig.options[i].disabled    = true;\r\n");
       $nm_saida->saida("    oOrig.options[i].selected    = false;\r\n");
       $nm_saida->saida("    iInit++;\r\n");
       $nm_saida->saida("   }\r\n");
       $nm_saida->saida("  }\r\n");
       $nm_saida->saida("  // Completa itens do destino\r\n");
       $nm_saida->saida("  if (iDest > 0)\r\n");
       $nm_saida->saida("  {\r\n");
       $nm_saida->saida("   for (i = 0; i < iDest; i++)\r\n");
       $nm_saida->saida("   {\r\n");
       $nm_saida->saida("     oDest.options[iInit] = new Option();\r\n");
       $nm_saida->saida("     oDest.options[iInit].value = arr_sel[i][0];\r\n");
       $nm_saida->saida("     oDest.options[iInit].text  = arr_sel[i][1];\r\n");
       $nm_saida->saida("     iInit++;\r\n");
       $nm_saida->saida("   }\r\n");
       $nm_saida->saida("  }\r\n");
       $nm_saida->saida("  // Reset combos\r\n");
       $nm_saida->saida("  oOrig.selectedIndex = -1;\r\n");
       $nm_saida->saida("  oDest.selectedIndex = -1;\r\n");
       $nm_saida->saida("  if (Saida == \"S\")\r\n");
       $nm_saida->saida("  {\r\n");
       $nm_saida->saida("      document.Fgrid_search.submit();\r\n");
       $nm_saida->saida("  }\r\n");
       $nm_saida->saida(" }\r\n");
       $nm_saida->saida(" // Remove um elemento\r\n");
       $nm_saida->saida(" //--------------------\r\n");
       $nm_saida->saida(" function nm_del_sel_Grid(sOrig, sDest, Saida)\r\n");
       $nm_saida->saida(" {\r\n");
       $nm_saida->saida("  // Recupera objetos\r\n");
       $nm_saida->saida("  oOrig = document.getElementById(sOrig);\r\n");
       $nm_saida->saida("  oDest = document.getElementById(sDest);\r\n");
       $nm_saida->saida("  aSel  = new Array();\r\n");
       $nm_saida->saida("  atxt  = new Array();\r\n");
       $nm_saida->saida("  solt  = new Array();\r\n");
       $nm_saida->saida("  j     = 0;\r\n");
       $nm_saida->saida("  z     = 0;\r\n");
       $nm_saida->saida("  // Remove itens selecionados na origem\r\n");
       $nm_saida->saida("  for (i = oOrig.length - 1; i >= 0; i--)\r\n");
       $nm_saida->saida("  {\r\n");
       $nm_saida->saida("   // Item na origem selecionado\r\n");
       $nm_saida->saida("   if (oOrig.options[i].selected)\r\n");
       $nm_saida->saida("   {\r\n");
       $nm_saida->saida("    aSel[j] = oOrig.options[i].value;\r\n");
       $nm_saida->saida("    atxt[j] = oOrig.options[i].text;\r\n");
       $nm_saida->saida("    j++;\r\n");
       $nm_saida->saida("    oOrig.options[i] = null;\r\n");
       $nm_saida->saida("   }\r\n");
       $nm_saida->saida("  }\r\n");
       $nm_saida->saida("  // Habilita itens no destino\r\n");
       $nm_saida->saida("  for (i = 0; i < oDest.length; i++)\r\n");
       $nm_saida->saida("  {\r\n");
       $nm_saida->saida("   if (oDest.options[i].disabled && in_array_Grid(aSel, oDest.options[i].value))\r\n");
       $nm_saida->saida("   {\r\n");
       $nm_saida->saida("    oDest.options[i].disabled    = false;\r\n");
       $nm_saida->saida("    oDest.options[i].style.color = \"\";\r\n");
       $nm_saida->saida("    solt[z] = oDest.options[i].value;\r\n");
       $nm_saida->saida("    z++;\r\n");
       $nm_saida->saida("   }\r\n");
       $nm_saida->saida("  }\r\n");
       $nm_saida->saida("  for (i = 0; i < aSel.length; i++)\r\n");
       $nm_saida->saida("  {\r\n");
       $nm_saida->saida("   if (!in_array_Grid(solt, aSel[i]))\r\n");
       $nm_saida->saida("   {\r\n");
       $nm_saida->saida("    oDest.options[oDest.length] = new Option(atxt[i], aSel[i]);\r\n");
       $nm_saida->saida("   }\r\n");
       $nm_saida->saida("  }\r\n");
       $nm_saida->saida("  // Reset combos\r\n");
       $nm_saida->saida("  oOrig.selectedIndex = -1;\r\n");
       $nm_saida->saida("  oDest.selectedIndex = -1;\r\n");
       $nm_saida->saida("  if (Saida == \"S\")\r\n");
       $nm_saida->saida("  {\r\n");
       $nm_saida->saida("      document.Fgrid_search.submit();\r\n");
       $nm_saida->saida("  }\r\n");
       $nm_saida->saida(" }\r\n");
       $nm_saida->saida(" // Remove todos os elementos\r\n");
       $nm_saida->saida(" //---------------------------\r\n");
       $nm_saida->saida(" function nm_del_all_Grid(sOrig, sDest, Saida)\r\n");
       $nm_saida->saida(" {\r\n");
       $nm_saida->saida("  // Recupera objetos\r\n");
       $nm_saida->saida("  oOrig = document.getElementById(sOrig);\r\n");
       $nm_saida->saida("  oDest = document.getElementById(sDest);\r\n");
       $nm_saida->saida("  aSel  = new Array();\r\n");
       $nm_saida->saida("  atxt  = new Array();\r\n");
       $nm_saida->saida("  solt  = new Array();\r\n");
       $nm_saida->saida("  j     = 0;\r\n");
       $nm_saida->saida("  z     = 0;\r\n");
       $nm_saida->saida("  // Remove todos os itens na origem\r\n");
       $nm_saida->saida("  while (0 < oOrig.length)\r\n");
       $nm_saida->saida("  {\r\n");
       $nm_saida->saida("   i       = oOrig.length - 1;\r\n");
       $nm_saida->saida("   aSel[j] = oOrig.options[i].value;\r\n");
       $nm_saida->saida("   atxt[j] = oOrig.options[i].text;\r\n");
       $nm_saida->saida("   j++;\r\n");
       $nm_saida->saida("   oOrig.options[i] = null;\r\n");
       $nm_saida->saida("  }\r\n");
       $nm_saida->saida("  // Habilita itens no destino\r\n");
       $nm_saida->saida("  for (i = 0; i < oDest.length; i++)\r\n");
       $nm_saida->saida("  {\r\n");
       $nm_saida->saida("   if (oDest.options[i].disabled && in_array_Grid(aSel, oDest.options[i].value))\r\n");
       $nm_saida->saida("   {\r\n");
       $nm_saida->saida("    oDest.options[i].disabled    = false;\r\n");
       $nm_saida->saida("    oDest.options[i].style.color = \"\";\r\n");
       $nm_saida->saida("    solt[z] = oDest.options[i].value;\r\n");
       $nm_saida->saida("    z++;\r\n");
       $nm_saida->saida("   }\r\n");
       $nm_saida->saida("  }\r\n");
       $nm_saida->saida("  for (i = 0; i < aSel.length; i++)\r\n");
       $nm_saida->saida("  {\r\n");
       $nm_saida->saida("   if (!in_array_Grid(solt, aSel[i]))\r\n");
       $nm_saida->saida("   {\r\n");
       $nm_saida->saida("    oDest.options[oDest.length] = new Option(atxt[i], aSel[i]);\r\n");
       $nm_saida->saida("   }\r\n");
       $nm_saida->saida("  }\r\n");
       $nm_saida->saida("  // Reset combos\r\n");
       $nm_saida->saida("  oOrig.selectedIndex = -1;\r\n");
       $nm_saida->saida("  oDest.selectedIndex = -1;\r\n");
       $nm_saida->saida("  if (Saida == \"S\")\r\n");
       $nm_saida->saida("  {\r\n");
       $nm_saida->saida("      document.Fgrid_search.submit();\r\n");
       $nm_saida->saida("  }\r\n");
       $nm_saida->saida(" }\r\n");
       $nm_saida->saida(" // empacota elementos selecionados\r\n");
       $nm_saida->saida(" //--------------------------------\r\n");
       $nm_saida->saida(" function nm_pack_Grid(sOrig, sDest)\r\n");
       $nm_saida->saida(" {\r\n");
       $nm_saida->saida("    obj_sel = document.getElementById(sOrig);\r\n");
       $nm_saida->saida("    str_val = \"\";\r\n");
       $nm_saida->saida("    nm_quant_pack = 0;\r\n");
       $nm_saida->saida("    for (i = 0; i < obj_sel.length; i++)\r\n");
       $nm_saida->saida("    {\r\n");
       $nm_saida->saida("         if (\"\" != str_val)\r\n");
       $nm_saida->saida("         {\r\n");
       $nm_saida->saida("             str_val += \"@?@\";\r\n");
       $nm_saida->saida("             nm_quant_pack++;\r\n");
       $nm_saida->saida("         }\r\n");
       $nm_saida->saida("         str_val += obj_sel.options[i].value;\r\n");
       $nm_saida->saida("    }\r\n");
       $nm_saida->saida("    document.getElementById(sDest).value = str_val;\r\n");
       $nm_saida->saida(" }\r\n");
       $nm_saida->saida(" // Teste se elemento pertence ao array\r\n");
       $nm_saida->saida(" //-------------------------------------\r\n");
       $nm_saida->saida(" function in_array_Grid(aArray, sElem)\r\n");
       $nm_saida->saida(" {\r\n");
       $nm_saida->saida("  for (iCount = 0; iCount < aArray.length; iCount++)\r\n");
       $nm_saida->saida("  {\r\n");
       $nm_saida->saida("   if (sElem == aArray[iCount])\r\n");
       $nm_saida->saida("   {\r\n");
       $nm_saida->saida("    return true;\r\n");
       $nm_saida->saida("   }\r\n");
       $nm_saida->saida("  }\r\n");
       $nm_saida->saida("  return false;\r\n");
       $nm_saida->saida(" }\r\n");
       $nm_saida->saida("     function grid_search_get_sel_cond(obj_id)\r\n");
       $nm_saida->saida("     {\r\n");
       $nm_saida->saida("        var index = document.getElementById(obj_id).selectedIndex;\r\n");
       $nm_saida->saida("        return document.getElementById(obj_id).options[index].value;\r\n");
       $nm_saida->saida("     }\r\n");
       $nm_saida->saida("     function grid_search_get_select(obj_id, str_type)\r\n");
       $nm_saida->saida("     {\r\n");
       $nm_saida->saida("        if(str_type == '')\r\n");
       $nm_saida->saida("        {\r\n");
       $nm_saida->saida("            var obj = document.getElementById(obj_id);\r\n");
       $nm_saida->saida("        }\r\n");
       $nm_saida->saida("        else\r\n");
       $nm_saida->saida("        {\r\n");
       $nm_saida->saida("            var obj = $('#' + obj_id).multipleSelect('getSelects');\r\n");
       $nm_saida->saida("        }\r\n");
       $nm_saida->saida("        var val = \"\";\r\n");
       $nm_saida->saida("        for (iSelect = 0; iSelect < obj.length; iSelect++)\r\n");
       $nm_saida->saida("        {\r\n");
       $nm_saida->saida("            if ((str_type == '' && obj[iSelect].selected) || (str_type=='RADIO' || str_type=='CHECKBOX'))\r\n");
       $nm_saida->saida("            {\r\n");
       $nm_saida->saida("                if(str_type == '' && obj[iSelect].selected)\r\n");
       $nm_saida->saida("                {\r\n");
       $nm_saida->saida("                    new_val = obj[iSelect].value;\r\n");
       $nm_saida->saida("                }\r\n");
       $nm_saida->saida("                else\r\n");
       $nm_saida->saida("                {\r\n");
       $nm_saida->saida("                    new_val = obj[iSelect];\r\n");
       $nm_saida->saida("                }\r\n");
       $nm_saida->saida("                val += (val != \"\") ? \"_VLS_\" : \"\";\r\n");
       $nm_saida->saida("                val += new_val;\r\n");
       $nm_saida->saida("            }\r\n");
       $nm_saida->saida("        }\r\n");
       $nm_saida->saida("        return val;\r\n");
       $nm_saida->saida("     }\r\n");
       $nm_saida->saida("     function grid_search_get_Dselelect(obj_id)\r\n");
       $nm_saida->saida("     {\r\n");
       $nm_saida->saida("        var obj = document.getElementById(obj_id);\r\n");
       $nm_saida->saida("        var val = \"\";\r\n");
       $nm_saida->saida("        for (iSelect = 0; iSelect < obj.length; iSelect++)\r\n");
       $nm_saida->saida("        {\r\n");
       $nm_saida->saida("            val += (val != \"\") ? \"_VLS_\" : \"\";\r\n");
       $nm_saida->saida("            val += obj[iSelect].value;\r\n");
       $nm_saida->saida("        }\r\n");
       $nm_saida->saida("        return val;\r\n");
       $nm_saida->saida("     }\r\n");
       $nm_saida->saida("     function grid_search_get_radio(obj_id)\r\n");
       $nm_saida->saida("     {\r\n");
       $nm_saida->saida("        var Nobj = document.getElementById(obj_id).name;\r\n");
       $nm_saida->saida("        var obj  = document.getElementsByName(Nobj);\r\n");
       $nm_saida->saida("        var val  = \"\";\r\n");
       $nm_saida->saida("        for (iRadio = 0; iRadio < obj.length; iRadio++)\r\n");
       $nm_saida->saida("        {\r\n");
       $nm_saida->saida("            if (obj[iRadio].checked)\r\n");
       $nm_saida->saida("            {\r\n");
       $nm_saida->saida("                val += (val != \"\") ? \"_VLS_\" : \"\";\r\n");
       $nm_saida->saida("                val += obj[iRadio].value;\r\n");
       $nm_saida->saida("            }\r\n");
       $nm_saida->saida("        }\r\n");
       $nm_saida->saida("        return val;\r\n");
       $nm_saida->saida("     }\r\n");
       $nm_saida->saida("     function grid_search_get_checkbox(obj_id)\r\n");
       $nm_saida->saida("     {\r\n");
       $nm_saida->saida("        var Nobj = document.getElementById(obj_id).name;\r\n");
       $nm_saida->saida("        var obj  = document.getElementsByName(Nobj);\r\n");
       $nm_saida->saida("        var val  = \"\";\r\n");
       $nm_saida->saida("        if (!obj.length)\r\n");
       $nm_saida->saida("        {\r\n");
       $nm_saida->saida("            if (obj.checked)\r\n");
       $nm_saida->saida("            {\r\n");
       $nm_saida->saida("                val = obj.value;\r\n");
       $nm_saida->saida("            }\r\n");
       $nm_saida->saida("            return val;\r\n");
       $nm_saida->saida("        }\r\n");
       $nm_saida->saida("        else\r\n");
       $nm_saida->saida("        {\r\n");
       $nm_saida->saida("            for (iCheck = 0; iCheck < obj.length; iCheck++)\r\n");
       $nm_saida->saida("            {\r\n");
       $nm_saida->saida("                if (obj[iCheck].checked)\r\n");
       $nm_saida->saida("                {\r\n");
       $nm_saida->saida("                    val += (val != \"\") ? \"_VLS_\" : \"\";\r\n");
       $nm_saida->saida("                    val += obj[iCheck].value;\r\n");
       $nm_saida->saida("                }\r\n");
       $nm_saida->saida("            }\r\n");
       $nm_saida->saida("        }\r\n");
       $nm_saida->saida("        return val;\r\n");
       $nm_saida->saida("     }\r\n");
       $nm_saida->saida("     function grid_search_get_text(obj_id, obj_ac)\r\n");
       $nm_saida->saida("     {\r\n");
       $nm_saida->saida("        var obj = document.getElementById(obj_id);\r\n");
       $nm_saida->saida("        var val = \"\";\r\n");
       $nm_saida->saida("        if (obj)\r\n");
       $nm_saida->saida("        {\r\n");
       $nm_saida->saida("            val = obj.value;\r\n");
       $nm_saida->saida("        }\r\n");
       $nm_saida->saida("        if (obj_ac != '' && val == '')\r\n");
       $nm_saida->saida("        {\r\n");
       $nm_saida->saida("            obj = document.getElementById(obj_ac);\r\n");
       $nm_saida->saida("            if (obj)\r\n");
       $nm_saida->saida("            {\r\n");
       $nm_saida->saida("                val = obj.value;\r\n");
       $nm_saida->saida("            }\r\n");
       $nm_saida->saida("        }\r\n");
       $nm_saida->saida("        return val;\r\n");
       $nm_saida->saida("     }\r\n");
       $nm_saida->saida("     function grid_search_get_dt_h(obj_id, ind, TP)\r\n");
       $nm_saida->saida("     {\r\n");
       $nm_saida->saida("        var val = new Array();\r\n");
       $nm_saida->saida("        if (TP == 'DT' || TP == 'DH')\r\n");
       $nm_saida->saida("        {\r\n");
       $nm_saida->saida("            obj_part  = document.getElementById(obj_id + '_ano_val_' + ind);\r\n");
       $nm_saida->saida("            val      += \"Y:\";\r\n");
       $nm_saida->saida("            if (obj_part && obj_part.type.substr(0, 6) == 'select')\r\n");
       $nm_saida->saida("            {\r\n");
       $nm_saida->saida("                Tval = grid_search_get_sel_cond(obj_id + '_ano_val_' + ind);\r\n");
       $nm_saida->saida("                val += (Tval != -1) ? Tval : '';\r\n");
       $nm_saida->saida("            }\r\n");
       $nm_saida->saida("            else\r\n");
       $nm_saida->saida("            {\r\n");
       $nm_saida->saida("                val += (obj_part) ? obj_part.value : '';\r\n");
       $nm_saida->saida("            }\r\n");
       $nm_saida->saida("            obj_part  = document.getElementById(obj_id + '_mes_val_' + ind);\r\n");
       $nm_saida->saida("            val      += \"_VLS_M:\";\r\n");
       $nm_saida->saida("            if (obj_part && obj_part.type.substr(0, 6) == 'select')\r\n");
       $nm_saida->saida("            {\r\n");
       $nm_saida->saida("                Tval = grid_search_get_sel_cond(obj_id + '_mes_val_' + ind);\r\n");
       $nm_saida->saida("                val += (Tval != -1) ? Tval : '';\r\n");
       $nm_saida->saida("            }\r\n");
       $nm_saida->saida("            else\r\n");
       $nm_saida->saida("            {\r\n");
       $nm_saida->saida("                val += (obj_part) ? obj_part.value : '';\r\n");
       $nm_saida->saida("            }\r\n");
       $nm_saida->saida("            obj_part  = document.getElementById(obj_id + '_dia_val_' + ind);\r\n");
       $nm_saida->saida("            val      += \"_VLS_D:\";\r\n");
       $nm_saida->saida("            if (obj_part && obj_part.type.substr(0, 6) == 'select')\r\n");
       $nm_saida->saida("            {\r\n");
       $nm_saida->saida("                Tval = grid_search_get_sel_cond(obj_id + '_dia_val_' + ind);\r\n");
       $nm_saida->saida("                val += (Tval != -1) ? Tval : '';\r\n");
       $nm_saida->saida("            }\r\n");
       $nm_saida->saida("            else\r\n");
       $nm_saida->saida("            {\r\n");
       $nm_saida->saida("                val += (obj_part) ? obj_part.value : '';\r\n");
       $nm_saida->saida("            }\r\n");
       $nm_saida->saida("        }\r\n");
       $nm_saida->saida("        if (TP == 'HH' || TP == 'DH')\r\n");
       $nm_saida->saida("        {\r\n");
       $nm_saida->saida("            val            += (val != \"\") ? \"_VLS_\" : \"\";\r\n");
       $nm_saida->saida("            obj_part        = document.getElementById(obj_id + '_hor_val_' + ind);\r\n");
       $nm_saida->saida("            val            += \"H:\";\r\n");
       $nm_saida->saida("            val            += (obj_part) ? obj_part.value : '';\r\n");
       $nm_saida->saida("            obj_part        = document.getElementById(obj_id + '_min_val_' + ind);\r\n");
       $nm_saida->saida("            val            += \"_VLS_I:\";\r\n");
       $nm_saida->saida("            val            += (obj_part) ? obj_part.value : '';\r\n");
       $nm_saida->saida("            obj_part        = document.getElementById(obj_id + '_seg_val_' + ind);\r\n");
       $nm_saida->saida("            val            += \"_VLS_S:\";\r\n");
       $nm_saida->saida("            val            += (obj_part) ? obj_part.value : '';\r\n");
       $nm_saida->saida("        }\r\n");
       $nm_saida->saida("        return val;\r\n");
       $nm_saida->saida("     }\r\n");
       $nm_saida->saida("   </script>\r\n");
   }
    function getFieldHighlight($filter_type, $field, $str_value, $str_value_original='')
    {
        $str_html_ini = '<div class="highlight">';
        $str_html_fim = '</div>';

        if($filter_type == 'advanced_search')
        {
            if (
                isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['campos_busca'][ $field ]) &&
                isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['campos_busca'][ $field . "_cond" ]) &&
                !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['campos_busca'][ $field ]) &&
                (
                    $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['campos_busca'][ $field . "_cond"] == 'qp' ||
                    $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['campos_busca'][ $field . "_cond"] == 'eq' ||
                    $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['campos_busca'][ $field . "_cond"] == 'ii'
                )
            )
            {
                if($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['campos_busca'][ $field . "_cond"] == 'qp')
                {
                    if(strcasecmp($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['campos_busca'][ $field ], $str_value) == 0)
                    {
                        $str_value = $str_html_ini. $str_value .$str_html_fim;
                    }
                    elseif(strcasecmp($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['campos_busca'][ $field ], $str_value_original) == 0)
                    {
                        $str_value = $str_html_ini. $str_value .$str_html_fim;
                    }
                    else
                    {
                        $keywords = preg_quote($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['campos_busca'][ $field ], '/');
                        $str_value = preg_replace('/'. $keywords .'/i', $str_html_ini . '$0' . $str_html_fim, $str_value);
                    }
                }
                elseif($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['campos_busca'][ $field . "_cond"] == 'eq')
                {
                    if(strcasecmp($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['campos_busca'][ $field ], $str_value) == 0)
                    {
                        $str_value = $str_html_ini. $str_value .$str_html_fim;
                    }
                    elseif(strcasecmp($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['campos_busca'][ $field ], $str_value_original) == 0)
                    {
                        $str_value = $str_html_ini. $str_value .$str_html_fim;
                    }
                }
                elseif($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['campos_busca'][ $field . "_cond"] == 'ii')
                {
                    if(strcasecmp($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['campos_busca'][ $field ], substr($str_value, 0, strlen($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['campos_busca'][ $field ]))) == 0)
                    {
                        $str_value = $str_html_ini. substr($str_value, 0, strlen($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['campos_busca'][ $field ])) .$str_html_fim . substr($str_value, strlen($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['campos_busca'][ $field ]));
                    }
                }
            }
        }
        elseif($filter_type == 'quicksearch')
        {
            if(
                isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['fast_search'][0]) &&
                (
                    (
                    $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['fast_search'][0] == 'SC_all_Cmp' &&
                    in_array($field, array('sales_id_sales', 'sales_sales_price', 'sales_sales_discount', 'sales_total', 'sales_datesales', 'sales_id_status', 'sales_idcaja', 'sales_idcliente', 'sales_cliente', 'sales_direccion', 'sales_telefono', 'sales_factura', 'sales_serie', 'sales_clave_acceso', 'sales_enviosri', 'sales_fechaenvio', 'sales_uniqueid', 'sales_estado', 'sales_fechaid', 'sales_importe_recibido', 'sales_codigoid', 'sales_totalsinimpuestos', 'sales_totaldescuento', 'sales_baseimponible', 'sales_valoriva', 'sales_importetotal', 'sales_idpago', 'sales_totalpago', 'sales_cliente_email', 'sales_idempleado', 'sales_idturno', 'sales_facturaxml', 'sales_facturaxml64', 'sales_codpago_sri', 'sales_imprime', 'sales_comprobante', 'sales_facturapdf'))
                    ) ||
                    $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['fast_search'][0] == $field ||
                    strpos($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['fast_search'][0], $field . '_VLS_') !== false ||
                    strpos($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['fast_search'][0], '_VLS_' . $field) !== false
                )
            )
            {
                if($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['fast_search'][1] == 'qp')
                {
                    if(strcasecmp($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['fast_search'][2], $str_value) == 0)
                    {
                        $str_value = $str_html_ini. $str_value .$str_html_fim;
                    }
                    elseif(!empty($str_value_original) && $str_value_original != '&nbsp;' && strcasecmp($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['fast_search'][2], $str_value_original) == 0)
                    {
                        $str_value = $str_html_ini. $str_value .$str_html_fim;
                    }
                    else
                    {
                        $keywords = preg_quote($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['fast_search'][2], '/');
                        $str_value = preg_replace('/'. $keywords .'/i', $str_html_ini . '$0' . $str_html_fim, $str_value);
                    }
                }
                elseif($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['fast_search'][1] == 'eq')
                {
                    if(strcasecmp($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['fast_search'][2], $str_value) == 0)
                    {
                        $str_value = $str_html_ini. $str_value .$str_html_fim;
                    }
                    elseif(!empty($str_value_original) && $str_value_original != '&nbsp;' && strcasecmp($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['fast_search'][2], $str_value_original) == 0)
                    {
                        $str_value = $str_html_ini. $str_value .$str_html_fim;
                    }
                }
            }
        }
        return $str_value;
    }
//--- 
//--- 
 function grafico_pdf()
 {
   global $nm_saida, $nm_lang;
   require_once($this->Ini->path_aplicacao . $this->Ini->Apl_grafico); 
   $this->Graf  = new grid_detail_sales_todo_grafico();
   $this->Graf->Db     = $this->Db;
   $this->Graf->Erro   = $this->Erro;
   $this->Graf->Ini    = $this->Ini;
   $this->Graf->Lookup = $this->Lookup;
   if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['pivot_charts']) && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['skip_charts']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['skip_charts']))
   {
       $this->Graf->monta_grafico('', 'pdf_lib');
       $prim_graf = true;
       $nm_saida->saida("<B><div style=\"height:1px;overflow:hidden\"><H1 style=\"font-size:0;padding:1px\">" . $this->Ini->Nm_lang['lang_btns_chrt_pdff_hint'] . "</H1></div></B>\r\n");
       $iChartCount = 1;
       $iChartTotal = sizeof($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['pivot_charts']);
       $sChartLang  = isset($this->Ini->Nm_lang['lang_pdff_pcht']) ? $this->Ini->Nm_lang['lang_pdff_pcht'] : 'Generating chart';
       if (!NM_is_utf8($sChartLang))
       {
           $sChartLang = sc_convert_encoding($sChartLang, "UTF-8", $_SESSION['scriptcase']['charset']);
       }
       $bChartFP = false;
      if (!isset($this->progress_fp) || !$this->progress_fp)
      {
           $bChartFP           = true;
           $str_pbfile         = $this->Ini->root . $this->Ini->path_imag_temp . '/sc_pb_' . session_id() . '.tmp';
           $this->progress_fp  = fopen($str_pbfile, 'a');
           $this->progress_tot = 100;
           $this->progress_now = 90;
           $this->progress_res = 0;
      }
 if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['proc_pdf'] || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['proc_pdf_vert'])
 { 
           $nm_saida->saida(" <style>\r\n");
            $nm_saida->saida("  table td, table tr{ page-break-inside: avoid !important; }\r\n");
           $nm_saida->saida(" </style>\r\n");
 } 
       $prim_graf = ($this->Ini->SC_module_export == "chart") ? true : false;
       foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['pivot_charts'] as $chart_index => $chart_data)
       {
           if (!$prim_graf)
           {
                   $nm_saida->saida("<div style=\"page-break-after: always;\"><span style=\"display: none;\">&nbsp;</span></div>\r\n");
           }
           $prim_graf = false;
 if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['proc_pdf'] || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['proc_pdf_vert'])
 { 
           $nm_saida->saida("<table style=\"width: 100%; page-break-inside: avoid !important;\" ><tr><td>\r\n");
 } else {
           $nm_saida->saida("<table><tr><td>\r\n");
 } 
           $tit_graf = $chart_data['title'];
           if ('' != $chart_data['subtitle'])
           {
               $tit_graf .= ' - ' . $chart_data['subtitle'];
           }
           if ('UTF-8' != $_SESSION['scriptcase']['charset'])
           {
               $tit_graf = sc_convert_encoding($tit_graf, $_SESSION['scriptcase']['charset'], 'UTF-8');
           }
           $tit_book_marks = str_replace(" ", "&nbsp;", $tit_graf);
           $random_id = 'sc-id-h2-' . md5(session_id() . microtime() . rand(1, 1000));
           $nm_saida->saida("<b><h2 id=\"$random_id\">$tit_book_marks</h2></b>\r\n");
           if ($this->progress_fp)
           {
               grid_detail_sales_todo_pdf_progress_call($this->progress_tot . "_#NM#_" . $this->progress_now . "_#NM#_" . $sChartLang . " " . $iChartCount . "...\n", $this->Ini->Nm_lang, true);
               fwrite($this->progress_fp, $this->progress_now . "_#NM#_" . $sChartLang . " " . $iChartCount . "...\n");
               $iChartCount++;
               if (0 < $this->progress_res)
               {
                   $this->progress_now++;
               }
           }
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['this_chart_label'] = '';
           $this->Graf->monta_grafico($chart_index, 'pdf');
           $nm_saida->saida("</td></tr></table>\r\n");
       }
       if ($bChartFP)
       {
           $lang_protect = $this->Ini->Nm_lang['lang_pdff_gnrt'];
           if (!NM_is_utf8($lang_protect))
           {
               $lang_protect = sc_convert_encoding($lang_protect, "UTF-8", $_SESSION['scriptcase']['charset']);
           }
           grid_detail_sales_todo_pdf_progress_call(100 . "_#NM#_" . 90 . "_#NM#_" . $lang_protect . "...\n", $this->Ini->Nm_lang);
           fwrite($this->progress_fp, 90 . "_#NM#_" . $lang_protect . "...\n");
           fclose($this->progress_fp);
       }
       if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['charts_html']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['charts_html'])
       {
            $nm_saida->saida("<script type=\"text/javascript\">\r\n");
            $nm_saida->saida("{$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['charts_html']}\r\n");
            $nm_saida->saida("</script>\r\n");
       }
   }
       $nm_saida->saida("</body>\r\n");
       $nm_saida->saida("</HTML>\r\n");
 }
//--- 
//--- 
 function grafico_pdf_flash()
 {
   global $nm_saida, $nm_lang;
   if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['chart_list']))
   {
       foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['chart_list'] as $arr_chart)
       {
           $nm_saida->saida("<div style=\"page-break-after: always;\"><span style=\"display: none;\">&nbsp;</span></div>\r\n");
       $nm_saida->saida("<b><div style=\"height:1px;overflow:hidden\"><H1 style=\"font-size:0;padding:1px\">" . $this->Ini->Nm_lang['lang_btns_chrt_pdff_hint'] . "</H1></div></b>\r\n");
           $nm_saida->saida("<table><tr><td>\r\n");
           $tit_graf       = $arr_chart[1];
           if ('UTF-8' != $_SESSION['scriptcase']['charset'])
           {
               $tit_graf = sc_convert_encoding($tit_graf, $_SESSION['scriptcase']['charset'], 'UTF-8');
           }
           $tit_book_marks = str_replace(" ", "&nbsp;", $tit_graf);
           $nm_saida->saida("<b><h2>$tit_book_marks</h2></b>\r\n");
           $nm_saida->saida("<img src=\"" . $arr_chart[0] . ".png\"/>\r\n");
           $_SESSION['scriptcase']['sc_num_img']++;
           $nm_saida->saida("</td></tr></table>\r\n");
       }
   }
   $nm_saida->saida("</body>\r\n");
   $nm_saida->saida("</HTML>\r\n");
 }
//--- 
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
 function check_btns()
 {
 }
 function nm_fim_grid($flag_apaga_pdf_log = TRUE)
 {
   global
   $nm_saida, $nm_url_saida, $NMSC_modal;
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['embutida'] && isset($_SESSION['sc_session'][$this->Ini->sc_page]['SC_sub_css']))
   {
       unset($_SESSION['sc_session'][$this->Ini->sc_page]['SC_sub_css']);
       unset($_SESSION['sc_session'][$this->Ini->sc_page]['SC_sub_css_bw']);
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['embutida'])
   { 
        return;
   } 
   $nm_saida->saida("   </TABLE>\r\n");
   $nm_saida->saida("   </div>\r\n");
   $nm_saida->saida("   </TR>\r\n");
   $nm_saida->saida("   </TD>\r\n");
   $nm_saida->saida("   </TABLE>\r\n");
   $nm_saida->saida("   <div id=\"sc-id-fixedheaders-placeholder\" style=\"display: none; position: fixed; top: 0\"></div>\r\n");
   $nm_saida->saida("   </body>\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao'] == "pdf" || $this->Print_All)
   { 
   $nm_saida->saida("   </HTML>\r\n");
        return;
   } 
   $nm_saida->saida("   <script type=\"text/javascript\">\r\n");
   $nm_saida->saida("   NM_ancor_ult_lig = '';\r\n");
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['embutida'])
   { 
       if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['NM_arr_tree']))
       {
           $temp = array();
           foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['NM_arr_tree'] as $NM_aplic => $resto)
           {
               $temp[] = $NM_aplic;
           }
           $temp = array_unique($temp);
           foreach ($temp as $NM_aplic)
           {
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['ajax_nav'])
               { 
                   $this->Ini->Arr_result['setArr'][] = array('var' => ' NM_tab_' . $NM_aplic, 'value' => '');
               } 
               $nm_saida->saida("   NM_tab_" . $NM_aplic . " = new Array();\r\n");
           }
           foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['NM_arr_tree'] as $NM_aplic => $resto)
           {
               foreach ($resto as $NM_ind => $NM_quebra)
               {
                   foreach ($NM_quebra as $NM_nivel => $NM_tipo)
                   {
                       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['ajax_nav'])
                       { 
                           $this->Ini->Arr_result['setVar'][] = array('var' => ' NM_tab_' . $NM_aplic . '[' . $NM_ind . ']', 'value' => $NM_tipo . $NM_nivel);
                       } 
                       $nm_saida->saida("   NM_tab_" . $NM_aplic . "[" . $NM_ind . "] = '" . $NM_tipo . $NM_nivel . "';\r\n");
                   }
               }
           }
       }
   }
   $nm_saida->saida("   function NM_liga_tbody(tbody, Obj, Apl)\r\n");
   $nm_saida->saida("   {\r\n");
   $nm_saida->saida("      Nivel = parseInt (Obj[tbody].substr(3));\r\n");
   $nm_saida->saida("      for (ind = tbody + 1; ind < Obj.length; ind++)\r\n");
   $nm_saida->saida("      {\r\n");
   $nm_saida->saida("           Nv = parseInt (Obj[ind].substr(3));\r\n");
   $nm_saida->saida("           Tp = Obj[ind].substr(0, 3);\r\n");
   $nm_saida->saida("           if (Nivel == Nv && Tp == 'top')\r\n");
   $nm_saida->saida("           {\r\n");
   $nm_saida->saida("               break;\r\n");
   $nm_saida->saida("           }\r\n");
   $nm_saida->saida("           if (((Nivel + 1) == Nv && Tp == 'top') || (Nivel == Nv && Tp == 'bot'))\r\n");
   $nm_saida->saida("           {\r\n");
   $nm_saida->saida("               document.getElementById('tbody_' + Apl + '_' + ind + '_' + Tp).style.display='';\r\n");
   $nm_saida->saida("           } \r\n");
   $nm_saida->saida("      }\r\n");
   $nm_saida->saida("   }\r\n");
   $nm_saida->saida("   function NM_apaga_tbody(tbody, Obj, Apl)\r\n");
   $nm_saida->saida("   {\r\n");
   $nm_saida->saida("      Nivel = Obj[tbody].substr(3);\r\n");
   $nm_saida->saida("      for (ind = tbody + 1; ind < Obj.length; ind++)\r\n");
   $nm_saida->saida("      {\r\n");
   $nm_saida->saida("           Nv = Obj[ind].substr(3);\r\n");
   $nm_saida->saida("           Tp = Obj[ind].substr(0, 3);\r\n");
   $nm_saida->saida("           if ((Nivel == Nv && Tp == 'top') || Nv < Nivel)\r\n");
   $nm_saida->saida("           {\r\n");
   $nm_saida->saida("               break;\r\n");
   $nm_saida->saida("           }\r\n");
   $nm_saida->saida("           if ((Nivel != Nv) || (Nivel == Nv && Tp == 'bot'))\r\n");
   $nm_saida->saida("           {\r\n");
   $nm_saida->saida("               document.getElementById('tbody_' + Apl + '_' + ind + '_' + Tp).style.display='none';\r\n");
   $nm_saida->saida("               if (Tp == 'top')\r\n");
   $nm_saida->saida("               {\r\n");
   $nm_saida->saida("                   document.getElementById('b_open_' + Apl + '_' + ind).style.display='';\r\n");
   $nm_saida->saida("                   document.getElementById('b_close_' + Apl + '_' + ind).style.display='none';\r\n");
   $nm_saida->saida("               } \r\n");
   $nm_saida->saida("           } \r\n");
   $nm_saida->saida("      }\r\n");
   $nm_saida->saida("   }\r\n");
   $nm_saida->saida("   NM_obj_ant = '';\r\n");
   $nm_saida->saida("   function NM_apaga_div_lig(obj_nome)\r\n");
   $nm_saida->saida("   {\r\n");
   $nm_saida->saida("      if (NM_obj_ant != '')\r\n");
   $nm_saida->saida("      {\r\n");
   $nm_saida->saida("          NM_obj_ant.style.display='none';\r\n");
   $nm_saida->saida("      }\r\n");
   $nm_saida->saida("      obj = document.getElementById(obj_nome);\r\n");
   $nm_saida->saida("      NM_obj_ant = obj;\r\n");
   $nm_saida->saida("      ind_time = setTimeout(\"obj.style.display='none'\", 300);\r\n");
   $nm_saida->saida("      return ind_time;\r\n");
   $nm_saida->saida("   }\r\n");
   $nm_saida->saida("   function NM_btn_disable()\r\n");
   $nm_saida->saida("   {\r\n");
   foreach ($this->nm_btn_disabled as $cod_btn => $st_btn) {
      if (isset($this->nm_btn_exist[$cod_btn]) && $st_btn == 'on') {
         foreach ($this->nm_btn_exist[$cod_btn] as $cada_id) {
       $nm_saida->saida("     $('#" . $cada_id . "').prop('onclick', null).off('click').addClass('disabled').removeAttr('href');\r\n");
       $nm_saida->saida("     $('#div_" . $cada_id . "').addClass('disabled');\r\n");
         }
      }
   }
   $nm_saida->saida("   }\r\n");
   $str_pbfile = $this->Ini->root . $this->Ini->path_imag_temp . '/sc_pb_' . session_id() . '.tmp';
   if (@is_file($str_pbfile) && $flag_apaga_pdf_log)
   {
      @unlink($str_pbfile);
   }
   if ($this->Rec_ini == 0 && empty($this->nm_grid_sem_reg) && !$this->Print_All && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao'] != "pdf" && !$_SESSION['scriptcase']['proc_mobile'])
   { 
   } 
   elseif ($this->Rec_ini == 0 && empty($this->nm_grid_sem_reg) && !$this->Print_All && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao'] != "pdf" && $_SESSION['scriptcase']['proc_mobile'])
   { 
   } 
   $nm_saida->saida("  $(window).scroll(function() {\r\n");
   $nm_saida->saida("   if (typeof(scSetFixedHeaders) === typeof(function(){})) scSetFixedHeaders();\r\n");
   $nm_saida->saida("  }).resize(function() {\r\n");
   $nm_saida->saida("   if (typeof(scSetFixedHeaders) === typeof(function(){})) scSetFixedHeaders();\r\n");
   $nm_saida->saida("  });\r\n");
   if ($this->rs_grid->EOF && empty($this->nm_grid_sem_reg) && !$this->Print_All && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao'] != "pdf")
   {
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao'] != "pdf" && !isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opc_liga']['nav']) && !$_SESSION['scriptcase']['proc_mobile'])
       { 
           { 
               $nm_saida->saida("   document.getElementById('forward_bot').disabled = true;\r\n");
               $nm_saida->saida("   document.getElementById('forward_bot').className = \"scButton_" . $this->arr_buttons['bcons_avanca']['style'] . " disabled\";\r\n");
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['ajax_nav'])
               {
                   $this->Ini->Arr_result['setDisabled'][] = array('field' => 'forward_bot', 'value' => "true");
                   $this->Ini->Arr_result['setClass'][] = array('field' => 'forward_bot', 'value' => "scButton_" . $this->arr_buttons['bcons_avanca']['style'] . ' disabled');
               }
               if ($this->arr_buttons['bcons_avanca']['display'] == 'only_img' || $this->arr_buttons['bcons_avanca']['display'] == 'text_img')
               { 
                   $nm_saida->saida("   document.getElementById('id_img_forward_bot').src = \"" . $this->Ini->path_botoes . "/" . $this->arr_buttons['bcons_avanca']['image'] . "\";\r\n");
                   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['ajax_nav'])
                   {
                       $this->Ini->Arr_result['setSrc'][] = array('field' => 'id_img_forward_bot', 'value' => $this->Ini->path_botoes . "/" . $this->arr_buttons['bcons_avanca']['image']);
                   }
               } 
           } 
           { 
               $nm_saida->saida("   document.getElementById('last_bot').disabled = true;\r\n");
               $nm_saida->saida("   document.getElementById('last_bot').className = \"scButton_" . $this->arr_buttons['bcons_final']['style'] . " disabled\";\r\n");
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['ajax_nav'])
               {
                  $this->Ini->Arr_result['setDisabled'][] = array('field' => 'last_bot', 'value' => "true");
                  $this->Ini->Arr_result['setClass'][] = array('field' => 'last_bot', 'value' => "scButton_" . $this->arr_buttons['bcons_final']['style'] . ' disabled');
               }
               if ($this->arr_buttons['bcons_final']['display'] == 'only_img' || $this->arr_buttons['bcons_final']['display'] == 'text_img')
               { 
                   $nm_saida->saida("   document.getElementById('id_img_last_bot').src = \"" . $this->Ini->path_botoes . "/" . $this->arr_buttons['bcons_final']['image'] . "\";\r\n");
                   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['ajax_nav'])
                   {
                       $this->Ini->Arr_result['setSrc'][] = array('field' => 'id_img_last_bot', 'value' => $this->Ini->path_botoes . "/" . $this->arr_buttons['bcons_final']['image']);
                   }
               } 
           } 
       } 
       elseif ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opcao'] != "pdf" && !isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['opc_liga']['nav']) && $_SESSION['scriptcase']['proc_mobile'])
       { 
       } 
       $nm_saida->saida("   nm_gp_fim = \"fim\";\r\n");
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['ajax_nav'])
       {
           $this->Ini->Arr_result['setVar'][] = array('var' => 'nm_gp_fim', 'value' => "fim");
           $this->Ini->Arr_result['scrollEOF'] = true;
       }
   }
   else
   {
       $nm_saida->saida("   nm_gp_fim = \"\";\r\n");
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['ajax_nav'])
       {
           $this->Ini->Arr_result['setVar'][] = array('var' => 'nm_gp_fim', 'value' => "");
       }
   }
   if (isset($this->redir_modal) && !empty($this->redir_modal))
   {
       echo $this->redir_modal;
   }
   $nm_saida->saida("   </script>\r\n");
   if ($this->grid_emb_form || $this->grid_emb_form_full)
   {
       $nm_saida->saida("   <script type=\"text/javascript\">\r\n");
       $nm_saida->saida("      window.onload = function() {\r\n");
       $nm_saida->saida("         setTimeout(\"parent.scAjaxDetailHeight('grid_detail_sales_todo', $(document).innerHeight())\",50);\r\n");
       $nm_saida->saida("      }\r\n");
       $nm_saida->saida("   </script>\r\n");
   }
   $nm_saida->saida("   </HTML>\r\n");
 }
//--- 
//--- 
 function form_navegacao()
 {
   global
   $nm_saida, $nm_url_saida;
   $str_pbfile = $this->Ini->root . $this->Ini->path_imag_temp . '/sc_pb_' . session_id() . '.tmp';
   $nm_saida->saida("   <form name=\"F3\" method=\"post\" \r\n");
   $nm_saida->saida("                     action=\"./\" \r\n");
   $nm_saida->saida("                     target=\"_self\" style=\"display: none\"> \r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"nmgp_chave\" value=\"\"/>\r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"nmgp_opcao\" value=\"\"/>\r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"nmgp_ordem\" value=\"\"/>\r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"SC_lig_apl_orig\" value=\"grid_detail_sales_todo\"/>\r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"nmgp_parm_acum\" value=\"\"/>\r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"nmgp_quant_linhas\" value=\"\"/>\r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"nmgp_url_saida\" value=\"\"/>\r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"nmgp_parms\" value=\"\"/>\r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"nmgp_tipo_pdf\" value=\"\"/>\r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"nmgp_outra_jan\" value=\"\"/>\r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"nmgp_orig_pesq\" value=\"\"/>\r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"SC_module_export\" value=\"\"/>\r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"script_case_init\" value=\"" . NM_encode_input($this->Ini->sc_page) . "\"/> \r\n");
   $nm_saida->saida("   </form> \r\n");
   $nm_saida->saida("   <form name=\"F4\" method=\"post\" \r\n");
   $nm_saida->saida("                     action=\"./\" \r\n");
   $nm_saida->saida("                     target=\"_self\" style=\"display: none\"> \r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"nmgp_opcao\" value=\"rec\"/>\r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"rec\" value=\"\"/>\r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"nm_call_php\" value=\"\"/>\r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"script_case_init\" value=\"" . NM_encode_input($this->Ini->sc_page) . "\"/> \r\n");
   $nm_saida->saida("   </form> \r\n");
   $nm_saida->saida("   <form name=\"F5\" method=\"post\" \r\n");
   $nm_saida->saida("                     action=\"grid_detail_sales_todo_pesq.class.php\" \r\n");
   $nm_saida->saida("                     target=\"_self\" style=\"display: none\"> \r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"script_case_init\" value=\"" . NM_encode_input($this->Ini->sc_page) . "\"/> \r\n");
   $nm_saida->saida("   </form> \r\n");
   $nm_saida->saida("   <form name=\"F6\" method=\"post\" \r\n");
   $nm_saida->saida("                     action=\"./\" \r\n");
   $nm_saida->saida("                     target=\"_self\" style=\"display: none\"> \r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"script_case_init\" value=\"" . NM_encode_input($this->Ini->sc_page) . "\"/> \r\n");
   $nm_saida->saida("   </form> \r\n");
   $nm_saida->saida("   <form name=\"Fprint\" method=\"post\" \r\n");
   $nm_saida->saida("                     action=\"grid_detail_sales_todo_iframe_prt.php\" \r\n");
   $nm_saida->saida("                     target=\"jan_print\" style=\"display: none\"> \r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"path_botoes\" value=\"" . $this->Ini->path_botoes . "\"/> \r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"opcao\" value=\"print\"/>\r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"nmgp_opcao\" value=\"print\"/>\r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"tp_print\" value=\"RC\"/>\r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"cor_print\" value=\"CO\"/>\r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"nmgp_opcao\" value=\"print\"/>\r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"nmgp_tipo_print\" value=\"RC\"/>\r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"nmgp_cor_print\" value=\"CO\"/>\r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"SC_module_export\" value=\"\"/>\r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"nmgp_password\" value=\"\"/>\r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"script_case_init\" value=\"" . NM_encode_input($this->Ini->sc_page) . "\"/> \r\n");
   $nm_saida->saida("   </form> \r\n");
   $nm_saida->saida("   <form name=\"Fexport\" method=\"post\" \r\n");
   $nm_saida->saida("                     action=\"./\" \r\n");
   $nm_saida->saida("                     target=\"_self\" style=\"display: none\"> \r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"nmgp_opcao\" value=\"\"/>\r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"nmgp_tp_xls\" value=\"\"/>\r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"nmgp_tot_xls\" value=\"\"/>\r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"SC_module_export\" value=\"\"/>\r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"nm_delim_line\" value=\"\"/>\r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"nm_delim_col\" value=\"\"/>\r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"nm_delim_dados\" value=\"\"/>\r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"nm_label_csv\" value=\"\"/>\r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"nm_xml_tag\" value=\"\"/>\r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"nm_xml_label\" value=\"\"/>\r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"nm_json_format\" value=\"\"/>\r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"nm_json_label\" value=\"\"/>\r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"nmgp_password\" value=\"\"/>\r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"script_case_init\" value=\"" . NM_encode_input($this->Ini->sc_page) . "\"/> \r\n");
   $nm_saida->saida("   </form> \r\n");
   $nm_saida->saida("  <form name=\"Fdoc_word\" method=\"post\" \r\n");
   $nm_saida->saida("        action=\"./\" \r\n");
   $nm_saida->saida("        target=\"_self\"> \r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"nmgp_opcao\" value=\"doc_word\"/> \r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"nmgp_cor_word\" value=\"CO\"/> \r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"SC_module_export\" value=\"\"/>\r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"nmgp_password\" value=\"\"/>\r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"nmgp_navegator_print\" value=\"\"/> \r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"script_case_init\" value=\"" . NM_encode_input($this->Ini->sc_page) . "\"/> \r\n");
   $nm_saida->saida("  </form> \r\n");
   $nm_saida->saida("   <script type=\"text/javascript\">\r\n");
   $nm_saida->saida("    document.Fdoc_word.nmgp_navegator_print.value = navigator.appName;\r\n");
   $nm_saida->saida("   function nm_gp_word_conf(cor, SC_module_export, password, ajax, str_type, bol_param)\r\n");
   $nm_saida->saida("   {\r\n");
   $nm_saida->saida("       if (\"S\" == ajax)\r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("           $('#TB_window').remove();\r\n");
   $nm_saida->saida("           $('body').append(\"<div id='TB_window'></div>\");\r\n");
   $nm_saida->saida("               nm_submit_modal(\"" . $this->Ini->path_link . "grid_detail_sales_todo/grid_detail_sales_todo_export_email.php?script_case_init={$this->Ini->sc_page}&path_img={$this->Ini->path_img_global}&path_btn={$this->Ini->path_botoes}&sType=\"+ str_type +\"&sAdd=__E__nmgp_cor_word=\" + cor + \"__E__SC_module_export=\" + SC_module_export + \"__E__nmgp_password=\" + password + \"&KeepThis=true&TB_iframe=true&modal=true\", bol_param);\r\n");
   $nm_saida->saida("       }\r\n");
   $nm_saida->saida("       else\r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("           document.Fdoc_word.nmgp_cor_word.value = cor;\r\n");
   $nm_saida->saida("           document.Fdoc_word.nmgp_password.value = password;\r\n");
   $nm_saida->saida("           document.Fdoc_word.SC_module_export.value = SC_module_export;\r\n");
   $nm_saida->saida("           document.Fdoc_word.action = \"grid_detail_sales_todo_export_ctrl.php\";\r\n");
   $nm_saida->saida("           document.Fdoc_word.submit();\r\n");
   $nm_saida->saida("       }\r\n");
   $nm_saida->saida("   }\r\n");
   $nm_saida->saida("   var obj_tr      = \"\";\r\n");
   $nm_saida->saida("   var css_tr      = \"\";\r\n");
   $nm_saida->saida("   var field_over  = " . $this->NM_field_over . ";\r\n");
   $nm_saida->saida("   var field_click = " . $this->NM_field_click . ";\r\n");
   $nm_saida->saida("   function over_tr(obj, class_obj)\r\n");
   $nm_saida->saida("   {\r\n");
   $nm_saida->saida("       if (field_over != 1)\r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("           return;\r\n");
   $nm_saida->saida("       }\r\n");
   $nm_saida->saida("       if (obj_tr == obj)\r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("           return;\r\n");
   $nm_saida->saida("       }\r\n");
   $nm_saida->saida("       obj.className = '" . $this->css_scGridFieldOver . "';\r\n");
   $nm_saida->saida("   }\r\n");
   $nm_saida->saida("   function out_tr(obj, class_obj)\r\n");
   $nm_saida->saida("   {\r\n");
   $nm_saida->saida("       if (field_over != 1)\r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("           return;\r\n");
   $nm_saida->saida("       }\r\n");
   $nm_saida->saida("       if (obj_tr == obj)\r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("           return;\r\n");
   $nm_saida->saida("       }\r\n");
   $nm_saida->saida("       obj.className = class_obj;\r\n");
   $nm_saida->saida("   }\r\n");
   $nm_saida->saida("   function click_tr(obj, class_obj)\r\n");
   $nm_saida->saida("   {\r\n");
   $nm_saida->saida("       if (field_click != 1)\r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("           return;\r\n");
   $nm_saida->saida("       }\r\n");
   $nm_saida->saida("       if (obj_tr != \"\")\r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("           obj_tr.className = css_tr;\r\n");
   $nm_saida->saida("       }\r\n");
   $nm_saida->saida("       css_tr        = class_obj;\r\n");
   $nm_saida->saida("       if (obj_tr == obj)\r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("           obj_tr     = '';\r\n");
   $nm_saida->saida("           return;\r\n");
   $nm_saida->saida("       }\r\n");
   $nm_saida->saida("       obj_tr        = obj;\r\n");
   $nm_saida->saida("       css_tr        = class_obj;\r\n");
   $nm_saida->saida("       obj.className = '" . $this->css_scGridFieldClick . "';\r\n");
   $nm_saida->saida("   }\r\n");
   if ($this->Rec_ini == 0)
   {
       $nm_saida->saida("   nm_gp_ini = \"ini\";\r\n");
   }
   else
   {
       $nm_saida->saida("   nm_gp_ini = \"\";\r\n");
   }
   $nm_saida->saida("   nm_gp_rec_ini = \"" . $this->Rec_ini . "\";\r\n");
   $nm_saida->saida("   nm_gp_rec_fim = \"" . $this->Rec_fim . "\";\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['ajax_nav'])
   {
       if ($this->Rec_ini == 0)
       {
           $this->Ini->Arr_result['setVar'][] = array('var' => 'nm_gp_ini', 'value' => "ini");
       }
       else
       {
           $this->Ini->Arr_result['setVar'][] = array('var' => 'nm_gp_ini', 'value' => "");
       }
       $this->Ini->Arr_result['setVar'][] = array('var' => 'nm_gp_rec_ini', 'value' => $this->Rec_ini);
       $this->Ini->Arr_result['setVar'][] = array('var' => 'nm_gp_rec_fim', 'value' => $this->Rec_fim);
   }
   $nm_saida->saida("   function nm_gp_submit_rec(campo) \r\n");
   $nm_saida->saida("   { \r\n");
   $nm_saida->saida("      if (nm_gp_ini == \"ini\" && (campo == \"ini\" || campo == nm_gp_rec_ini)) \r\n");
   $nm_saida->saida("      { \r\n");
   $nm_saida->saida("          return; \r\n");
   $nm_saida->saida("      } \r\n");
   $nm_saida->saida("      if (nm_gp_fim == \"fim\" && (campo == \"fim\" || campo == nm_gp_rec_fim)) \r\n");
   $nm_saida->saida("      { \r\n");
   $nm_saida->saida("          return; \r\n");
   $nm_saida->saida("      } \r\n");
   $nm_saida->saida("      nm_gp_submit_ajax(\"rec\", campo); \r\n");
   $nm_saida->saida("   } \r\n");
   $nm_saida->saida("   function nm_gp_open_qsearch_div(pos)\r\n");
   $nm_saida->saida("   {\r\n");
   $nm_saida->saida("        if (typeof nm_gp_open_qsearch_div_mobile == 'function') {\r\n");
   $nm_saida->saida("            return nm_gp_open_qsearch_div_mobile(pos);\r\n");
   $nm_saida->saida("        }\r\n");
   $nm_saida->saida("        if($('#SC_fast_search_dropdown_' + pos).hasClass('fa-caret-down'))\r\n");
   $nm_saida->saida("        {\r\n");
   $nm_saida->saida("            if(($('#quicksearchph_' + pos).offset().top+$('#id_qs_div_' + pos).height()+10) >= $(document).height())\r\n");
   $nm_saida->saida("            {\r\n");
   $nm_saida->saida("                $('#id_qs_div_' + pos).offset({top:($('#quicksearchph_' + pos).offset().top-($('#quicksearchph_' + pos).height()/2)-$('#id_qs_div_' + pos).height()-4)});\r\n");
   $nm_saida->saida("            }\r\n");
   $nm_saida->saida("            nm_gp_open_qsearch_div_store_temp(pos);\r\n");
   $nm_saida->saida("            $('#SC_fast_search_dropdown_' + pos).removeClass('fa-caret-down').addClass('fa-caret-up');\r\n");
   $nm_saida->saida("        }\r\n");
   $nm_saida->saida("        else\r\n");
   $nm_saida->saida("        {\r\n");
   $nm_saida->saida("            $('#SC_fast_search_dropdown_' + pos).removeClass('fa-caret-up').addClass('fa-caret-down');\r\n");
   $nm_saida->saida("        }\r\n");
   $nm_saida->saida("        $('#id_qs_div_' + pos).toggle();\r\n");
   $nm_saida->saida("   }\r\n");
   $nm_saida->saida("   var tmp_qs_arr_fields = [], tmp_qs_arr_cond = \"\";\r\n");
   $nm_saida->saida("   function nm_gp_open_qsearch_div_store_temp(pos)\r\n");
   $nm_saida->saida("   {\r\n");
   $nm_saida->saida("        tmp_qs_arr_fields = [], tmp_qs_str_cond = \"\";\r\n");
   $nm_saida->saida("        if($('#fast_search_f0_' + pos).prop('type') == 'select-multiple')\r\n");
   $nm_saida->saida("        {\r\n");
   $nm_saida->saida("            tmp_qs_arr_fields = $('#fast_search_f0_' + pos).val();\r\n");
   $nm_saida->saida("        }\r\n");
   $nm_saida->saida("        else\r\n");
   $nm_saida->saida("        {\r\n");
   $nm_saida->saida("            tmp_qs_arr_fields.push($('#fast_search_f0_' + pos).val());\r\n");
   $nm_saida->saida("        }\r\n");
   $nm_saida->saida("        tmp_qs_str_cond = $('#cond_fast_search_f0_' + pos).val();\r\n");
   $nm_saida->saida("   }\r\n");
   $nm_saida->saida("   function nm_gp_cancel_qsearch_div_store_temp(pos)\r\n");
   $nm_saida->saida("   {\r\n");
   $nm_saida->saida("        $('#fast_search_f0_' + pos).val('');\r\n");
   $nm_saida->saida("        $(\"#fast_search_f0_\" + pos + \" option\").prop('selected', false);\r\n");
   $nm_saida->saida("        for(it=0; it<tmp_qs_arr_fields.length; it++)\r\n");
   $nm_saida->saida("        {\r\n");
   $nm_saida->saida("            $(\"#fast_search_f0_\" + pos + \" option[value='\"+ tmp_qs_arr_fields[it] +\"']\").prop('selected', true);\r\n");
   $nm_saida->saida("        }\r\n");
   $nm_saida->saida("        $(\"#fast_search_f0_\" + pos).change();\r\n");
   $nm_saida->saida("        tmp_qs_arr_fields = [];\r\n");
   $nm_saida->saida("        $('#cond_fast_search_f0_' + pos).val(tmp_qs_str_cond);\r\n");
   $nm_saida->saida("        $('#cond_fast_search_f0_' + pos).change();\r\n");
   $nm_saida->saida("        tmp_qs_str_cond = \"\";\r\n");
   $nm_saida->saida("        nm_gp_open_qsearch_div(pos);\r\n");
   $nm_saida->saida("   }\r\n");
   $nm_saida->saida("   function nm_gp_submit_qsearch(pos) \r\n");
   $nm_saida->saida("   { \r\n");
   $nm_saida->saida("       var out_qsearch = \"\";\r\n");
   $nm_saida->saida("       var ver_ch = eval('change_fast_' + pos);\r\n");
   $nm_saida->saida("       if (document.getElementById('SC_fast_search_' + pos).value == '' && ver_ch == '')\r\n");
   $nm_saida->saida("       { \r\n");
   $nm_saida->saida("           scJs_alert(\"" . $this->Ini->Nm_lang['lang_srch_req_field'] . "\");\r\n");
   $nm_saida->saida("           document.getElementById('SC_fast_search_' + pos).focus();\r\n");
   $nm_saida->saida("           return false;\r\n");
   $nm_saida->saida("       } \r\n");
   $nm_saida->saida("       if (document.getElementById('SC_fast_search_' + pos).value == '__Clear_Fast__')\r\n");
   $nm_saida->saida("       { \r\n");
   $nm_saida->saida("           document.getElementById('SC_fast_search_' + pos).value = '';\r\n");
   $nm_saida->saida("       } \r\n");
   $nm_saida->saida("       out_qsearch = $('#fast_search_f0_' + pos).val();\r\n");
   $nm_saida->saida("       out_qsearch += \"_SCQS_\" + $('#cond_fast_search_f0_' + pos).val();\r\n");
   $nm_saida->saida("       out_qsearch += \"_SCQS_\" + document.getElementById('SC_fast_search_' + pos).value;\r\n");
   $nm_saida->saida("       out_qsearch = out_qsearch.replace(/[+]/g, \"__NM_PLUS__\");\r\n");
   $nm_saida->saida("       out_qsearch = out_qsearch.replace(/[&]/g, \"__NM_AMP__\");\r\n");
   $nm_saida->saida("       out_qsearch = out_qsearch.replace(/[%]/g, \"__NM_PRC__\");\r\n");
   $nm_saida->saida("       ajax_navigate('fast_search', out_qsearch); \r\n");
   $nm_saida->saida("   } \r\n");
   $nm_saida->saida("   function nm_gp_submit_ajax(opc, parm) \r\n");
   $nm_saida->saida("   { \r\n");
   $nm_saida->saida("      return ajax_navigate(opc, parm); \r\n");
   $nm_saida->saida("   } \r\n");
   $nm_saida->saida("   function nm_gp_submit2(campo) \r\n");
   $nm_saida->saida("   { \r\n");
   $nm_saida->saida("      nm_gp_submit_ajax(\"ordem\", campo); \r\n");
   $nm_saida->saida("   } \r\n");
   $nm_saida->saida("   function nm_gp_submit3(parms, parm_acum, opc, ancor) \r\n");
   $nm_saida->saida("   { \r\n");
   $nm_saida->saida("      document.F3.target               = \"_self\"; \r\n");
   $nm_saida->saida("      document.F3.nmgp_parms.value     = parms ;\r\n");
   $nm_saida->saida("      document.F3.nmgp_parm_acum.value = parm_acum ;\r\n");
   $nm_saida->saida("      document.F3.nmgp_opcao.value     = opc ;\r\n");
   $nm_saida->saida("      document.F3.nmgp_url_saida.value = \"\";\r\n");
   $nm_saida->saida("      document.F3.action               = \"./\"  ;\r\n");
   $nm_saida->saida("      if (ancor != null) {\r\n");
   $nm_saida->saida("         ajax_save_ancor(\"F3\", ancor);\r\n");
   $nm_saida->saida("      } else {\r\n");
   $nm_saida->saida("          document.F3.submit() ;\r\n");
   $nm_saida->saida("      } \r\n");
   $nm_saida->saida("   } \r\n");
   $nm_saida->saida("   function nm_open_export(arq_export) \r\n");
   $nm_saida->saida("   { \r\n");
   $nm_saida->saida("      window.location = arq_export;\r\n");
   $nm_saida->saida("   } \r\n");
   $nm_saida->saida("   function nm_submit_modal(parms, t_parent) \r\n");
   $nm_saida->saida("   { \r\n");
   $nm_saida->saida("      if (t_parent == 'S' && typeof parent.tb_show == 'function')\r\n");
   $nm_saida->saida("      { \r\n");
   $nm_saida->saida("           parent.tb_show('', parms, '');\r\n");
   $nm_saida->saida("      } \r\n");
   $nm_saida->saida("      else\r\n");
   $nm_saida->saida("      { \r\n");
   $nm_saida->saida("         tb_show('', parms, '');\r\n");
   $nm_saida->saida("      } \r\n");
   $nm_saida->saida("   } \r\n");
   $nm_saida->saida("   function nm_move(tipo) \r\n");
   $nm_saida->saida("   { \r\n");
   $nm_saida->saida("      document.F6.target = \"_self\"; \r\n");
   $nm_saida->saida("      document.F6.submit() ;\r\n");
   $nm_saida->saida("      return;\r\n");
   $nm_saida->saida("   } \r\n");
   $nm_saida->saida("   function nm_gp_move(x, y, z, p, g, crt, ajax, chart_level, page_break_pdf, SC_module_export, use_pass_pdf, pdf_all_cab, pdf_all_label, pdf_label_group, pdf_zip) \r\n");
   $nm_saida->saida("   { \r\n");
   $nm_saida->saida("       document.F3.action           = \"./\"  ;\r\n");
   $nm_saida->saida("       document.F3.nmgp_parms.value = \"SC_null\" ;\r\n");
   $nm_saida->saida("       document.F3.nmgp_orig_pesq.value = \"\" ;\r\n");
   $nm_saida->saida("       document.F3.nmgp_url_saida.value = \"\" ;\r\n");
   $nm_saida->saida("       document.F3.nmgp_opcao.value = x; \r\n");
   $nm_saida->saida("       document.F3.nmgp_outra_jan.value = \"\" ;\r\n");
   $nm_saida->saida("       document.F3.target = \"_self\"; \r\n");
   $nm_saida->saida("       if (y == 1) \r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("           document.F3.target = \"_blank\"; \r\n");
   $nm_saida->saida("       }\r\n");
   $nm_saida->saida("       if (\"busca\" == x)\r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("           document.F3.nmgp_orig_pesq.value = z; \r\n");
   $nm_saida->saida("           z = '';\r\n");
   $nm_saida->saida("       }\r\n");
   $nm_saida->saida("       if (z != null && z != '') \r\n");
   $nm_saida->saida("       { \r\n");
   $nm_saida->saida("           document.F3.nmgp_tipo_pdf.value = z; \r\n");
   $nm_saida->saida("       } \r\n");
   $nm_saida->saida("       if (\"xls\" == x)\r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("           document.F3.SC_module_export.value = z;\r\n");
   if (!extension_loaded("zip"))
   {
       $nm_saida->saida("           alert (\"" . html_entity_decode($this->Ini->Nm_lang['lang_othr_prod_xtzp'], ENT_COMPAT, $_SESSION['scriptcase']['charset']) . "\");\r\n");
       $nm_saida->saida("           return false;\r\n");
   } 
   $nm_saida->saida("       }\r\n");
   $nm_saida->saida("       if (\"xml\" == x)\r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("           document.F3.SC_module_export.value = z;\r\n");
   $nm_saida->saida("       }\r\n");
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['grid_detail_sales_todo_iframe_params'] = array(
       'str_tmp'          => $this->Ini->path_imag_temp,
       'str_prod'         => $this->Ini->path_prod,
       'str_btn'          => $this->Ini->Str_btn_css,
       'str_lang'         => $this->Ini->str_lang,
       'str_schema'       => $this->Ini->str_schema_all,
       'str_google_fonts' => $this->Ini->str_google_fonts,
   );
   $prep_parm_pdf = "scsess?#?" . session_id() . "?@?str_tmp?#?" . $this->Ini->path_imag_temp . "?@?str_prod?#?" . $this->Ini->path_prod . "?@?str_btn?#?" . $this->Ini->Str_btn_css . "?@?str_lang?#?" . $this->Ini->str_lang . "?@?str_schema?#?"  . $this->Ini->str_schema_all . "?@?script_case_init?#?" . $this->Ini->sc_page . "?@?jspath?#?" . $this->Ini->path_js . "?#?";
   $Md5_pdf    = "@SC_par@" . NM_encode_input($this->Ini->sc_page) . "@SC_par@grid_detail_sales_todo@SC_par@" . md5($prep_parm_pdf);
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['Md5_pdf'][md5($prep_parm_pdf)] = $prep_parm_pdf;
   $nm_saida->saida("       if (\"pdf\" == x)\r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("           if (\"S\" == ajax)\r\n");
   $nm_saida->saida("           {\r\n");
   $nm_saida->saida("               $('#TB_window').remove();\r\n");
   $nm_saida->saida("               $('body').append(\"<div id='TB_window'></div>\");\r\n");
   $nm_saida->saida("               nm_submit_modal(\"" . $this->Ini->path_link . "grid_detail_sales_todo/grid_detail_sales_todo_export_email.php?script_case_init={$this->Ini->sc_page}&path_img={$this->Ini->path_img_global}&path_btn={$this->Ini->path_botoes}&sType=pdf&sAdd=__E__nmgp_tipo_pdf=\" + z + \"__E__sc_parms_pdf=\" + p + \"__E__sc_create_charts=\" + crt + \"__E__sc_graf_pdf=\" + g + \"__E__chart_level=\" + chart_level + \"__E__page_break_pdf=\" + page_break_pdf + \"__E__SC_module_export=\" + SC_module_export + \"__E__use_pass_pdf=\" + use_pass_pdf + \"__E__pdf_all_cab=\" + pdf_all_cab + \"__E__pdf_all_label=\" +  pdf_all_label + \"__E__pdf_label_group=\" +  pdf_label_group + \"__E__pdf_zip=\" +  pdf_zip + \"&nm_opc=pdf&KeepThis=true&TB_iframe=true&modal=true\", '');\r\n");
   $nm_saida->saida("           }\r\n");
   $nm_saida->saida("           else\r\n");
   $nm_saida->saida("           {\r\n");
   $nm_saida->saida("               window.location = \"" . $this->Ini->path_link . "grid_detail_sales_todo/grid_detail_sales_todo_iframe.php?nmgp_parms=" . $Md5_pdf . "&sc_tp_pdf=\" + z + \"&sc_parms_pdf=\" + p + \"&sc_create_charts=\" + crt + \"&sc_graf_pdf=\" + g + '&chart_level=' + chart_level + '&page_break_pdf=' + page_break_pdf + '&SC_module_export=' + SC_module_export + '&use_pass_pdf=' + use_pass_pdf + '&pdf_all_cab=' + pdf_all_cab + '&pdf_all_label=' +  pdf_all_label + '&pdf_label_group=' +  pdf_label_group + '&pdf_zip=' +  pdf_zip;\r\n");
   $nm_saida->saida("           }\r\n");
   $nm_saida->saida("       }\r\n");
   $nm_saida->saida("       else\r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("           if ((x == 'igual' || x == 'edit') && NM_ancor_ult_lig != \"\")\r\n");
   $nm_saida->saida("           {\r\n");
   $nm_saida->saida("                ajax_save_ancor(\"F3\", NM_ancor_ult_lig);\r\n");
   $nm_saida->saida("                NM_ancor_ult_lig = \"\";\r\n");
   $nm_saida->saida("            } else {\r\n");
   $nm_saida->saida("                document.F3.submit() ;\r\n");
   $nm_saida->saida("            } \r\n");
   $nm_saida->saida("       }\r\n");
   $nm_saida->saida("   } \r\n");
   $nm_saida->saida("   function nm_gp_print_conf(tp, cor, SC_module_export, password, ajax, str_type, bol_param)\r\n");
   $nm_saida->saida("   {\r\n");
   $nm_saida->saida("       if (\"S\" == ajax)\r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("           $('#TB_window').remove();\r\n");
   $nm_saida->saida("           $('body').append(\"<div id='TB_window'></div>\");\r\n");
   $nm_saida->saida("               nm_submit_modal(\"" . $this->Ini->path_link . "grid_detail_sales_todo/grid_detail_sales_todo_export_email.php?script_case_init={$this->Ini->sc_page}&path_img={$this->Ini->path_img_global}&path_btn={$this->Ini->path_botoes}&sType=\"+ str_type +\"&sAdd=__E__nmgp_tipo_print=\" + tp + \"__E__cor_print=\" + cor + \"__E__SC_module_export=\" + SC_module_export + \"__E__nmgp_password=\" + password + \"&KeepThis=true&TB_iframe=true&modal=true\", bol_param);\r\n");
   $nm_saida->saida("       }\r\n");
   $nm_saida->saida("       else\r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("           document.Fprint.tp_print.value = tp;\r\n");
   $nm_saida->saida("           document.Fprint.cor_print.value = cor;\r\n");
   $nm_saida->saida("           document.Fprint.nmgp_tipo_print.value = tp;\r\n");
   $nm_saida->saida("           document.Fprint.nmgp_cor_print.value = cor;\r\n");
   $nm_saida->saida("           document.Fprint.SC_module_export.value = SC_module_export;\r\n");
   $nm_saida->saida("           document.Fprint.nmgp_password.value = password;\r\n");
   $nm_saida->saida("           if (password != \"\")\r\n");
   $nm_saida->saida("           {\r\n");
   $nm_saida->saida("               document.Fprint.target = '_self';\r\n");
   $nm_saida->saida("               document.Fprint.action = \"grid_detail_sales_todo_export_ctrl.php\";\r\n");
   $nm_saida->saida("           }\r\n");
   $nm_saida->saida("           else\r\n");
   $nm_saida->saida("           {\r\n");
   $nm_saida->saida("               window.open('','jan_print','location=no,menubar=no,resizable,scrollbars,status=no,toolbar=no');\r\n");
   $nm_saida->saida("           }\r\n");
   $nm_saida->saida("           document.Fprint.submit() ;\r\n");
   $nm_saida->saida("       }\r\n");
   $nm_saida->saida("   }\r\n");
   $nm_saida->saida("   function nm_gp_xls_conf(tp_xls, SC_module_export, password, tot_xls, ajax, str_type, bol_param)\r\n");
   $nm_saida->saida("   {\r\n");
   $nm_saida->saida("       if (\"S\" == ajax)\r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("           $('#TB_window').remove();\r\n");
   $nm_saida->saida("           $('body').append(\"<div id='TB_window'></div>\");\r\n");
   $nm_saida->saida("               nm_submit_modal(\"" . $this->Ini->path_link . "grid_detail_sales_todo/grid_detail_sales_todo_export_email.php?script_case_init={$this->Ini->sc_page}&path_img={$this->Ini->path_img_global}&path_btn={$this->Ini->path_botoes}&sType=\" + str_type +\"&sAdd=__E__SC_module_export=\" + SC_module_export + \"__E__nmgp_tp_xls=\" + tp_xls + \"__E__nmgp_tot_xls=\" + tot_xls + \"__E__nmgp_password=\" + password + \"&KeepThis=true&TB_iframe=true&modal=true\", bol_param);\r\n");
   $nm_saida->saida("       }\r\n");
   $nm_saida->saida("       else\r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("           document.Fexport.nmgp_opcao.value = \"xls\";\r\n");
   $nm_saida->saida("           document.Fexport.nmgp_tp_xls.value = tp_xls;\r\n");
   $nm_saida->saida("           document.Fexport.nmgp_tot_xls.value = tot_xls;\r\n");
   $nm_saida->saida("           document.Fexport.nmgp_password.value = password;\r\n");
   $nm_saida->saida("           document.Fexport.SC_module_export.value = SC_module_export;\r\n");
   $nm_saida->saida("           document.Fexport.action = \"grid_detail_sales_todo_export_ctrl.php\";\r\n");
   $nm_saida->saida("           document.Fexport.submit() ;\r\n");
   $nm_saida->saida("       }\r\n");
   $nm_saida->saida("   }\r\n");
   $nm_saida->saida("   function nm_gp_csv_conf(delim_line, delim_col, delim_dados, label_csv, SC_module_export, password, ajax, str_type, bol_param)\r\n");
   $nm_saida->saida("   {\r\n");
   $nm_saida->saida("       if (\"S\" == ajax)\r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("           $('#TB_window').remove();\r\n");
   $nm_saida->saida("           $('body').append(\"<div id='TB_window'></div>\");\r\n");
   $nm_saida->saida("               nm_submit_modal(\"" . $this->Ini->path_link . "grid_detail_sales_todo/grid_detail_sales_todo_export_email.php?script_case_init={$this->Ini->sc_page}&path_img={$this->Ini->path_img_global}&path_btn={$this->Ini->path_botoes}&sType=\" + str_type +\"&sAdd=__E__nm_delim_line=\" + delim_line + \"__E__nm_delim_col=\" + delim_col + \"__E__nm_delim_dados=\" + delim_dados + \"__E__nm_label_csv=\" + label_csv + \"&KeepThis=true&TB_iframe=true&modal=true\", bol_param);\r\n");
   $nm_saida->saida("       }\r\n");
   $nm_saida->saida("       else\r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("           document.Fexport.nmgp_opcao.value = \"csv\";\r\n");
   $nm_saida->saida("           document.Fexport.nm_delim_line.value = delim_line;\r\n");
   $nm_saida->saida("           document.Fexport.nm_delim_col.value = delim_col;\r\n");
   $nm_saida->saida("           document.Fexport.nm_delim_dados.value = delim_dados;\r\n");
   $nm_saida->saida("           document.Fexport.nm_label_csv.value = label_csv;\r\n");
   $nm_saida->saida("           document.Fexport.nmgp_password.value = password;\r\n");
   $nm_saida->saida("           document.Fexport.SC_module_export.value = SC_module_export;\r\n");
   $nm_saida->saida("           document.Fexport.action = \"grid_detail_sales_todo_export_ctrl.php\";\r\n");
   $nm_saida->saida("           document.Fexport.submit() ;\r\n");
   $nm_saida->saida("       }\r\n");
   $nm_saida->saida("   }\r\n");
   $nm_saida->saida("   function nm_gp_xml_conf(xml_tag, xml_label, SC_module_export, password, ajax, str_type, bol_param)\r\n");
   $nm_saida->saida("   {\r\n");
   $nm_saida->saida("       if (\"S\" == ajax)\r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("           $('#TB_window').remove();\r\n");
   $nm_saida->saida("           $('body').append(\"<div id='TB_window'></div>\");\r\n");
   $nm_saida->saida("               nm_submit_modal(\"" . $this->Ini->path_link . "grid_detail_sales_todo/grid_detail_sales_todo_export_email.php?script_case_init={$this->Ini->sc_page}&path_img={$this->Ini->path_img_global}&path_btn={$this->Ini->path_botoes}&sType=\" + str_type +\"&sAdd=__E__nm_xml_tag=\" + xml_tag + \"__E__nm_xml_label=\" + xml_label + \"&KeepThis=true&TB_iframe=true&modal=true\", bol_param);\r\n");
   $nm_saida->saida("       }\r\n");
   $nm_saida->saida("       else\r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("           document.Fexport.nmgp_opcao.value   = \"xml\";\r\n");
   $nm_saida->saida("           document.Fexport.nm_xml_tag.value   = xml_tag;\r\n");
   $nm_saida->saida("           document.Fexport.nm_xml_label.value = xml_label;\r\n");
   $nm_saida->saida("           document.Fexport.nmgp_password.value = password;\r\n");
   $nm_saida->saida("           document.Fexport.SC_module_export.value = SC_module_export;\r\n");
   $nm_saida->saida("           document.Fexport.action = \"grid_detail_sales_todo_export_ctrl.php\";\r\n");
   $nm_saida->saida("           document.Fexport.submit() ;\r\n");
   $nm_saida->saida("       }\r\n");
   $nm_saida->saida("   }\r\n");
   $nm_saida->saida("   function nm_gp_json_conf(json_format, json_label, SC_module_export, password, ajax, str_type, bol_param)\r\n");
   $nm_saida->saida("   {\r\n");
   $nm_saida->saida("       if (\"S\" == ajax)\r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("           $('#TB_window').remove();\r\n");
   $nm_saida->saida("           $('body').append(\"<div id='TB_window'></div>\");\r\n");
   $nm_saida->saida("               nm_submit_modal(\"" . $this->Ini->path_link . "grid_detail_sales_todo/grid_detail_sales_todo_export_email.php?script_case_init={$this->Ini->sc_page}&path_img={$this->Ini->path_img_global}&path_btn={$this->Ini->path_botoes}&sType=\" + str_type +\"&sAdd=__E__nm_json_format=\" + json_format + \"__E__nm_json_label=\" + json_label + \"&KeepThis=true&TB_iframe=true&modal=true\", bol_param);\r\n");
   $nm_saida->saida("       }\r\n");
   $nm_saida->saida("       else\r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("           document.Fexport.nmgp_opcao.value       = \"json\";\r\n");
   $nm_saida->saida("           document.Fexport.nm_json_format.value   = json_format;\r\n");
   $nm_saida->saida("           document.Fexport.nm_json_label.value    = json_label;\r\n");
   $nm_saida->saida("           document.Fexport.nmgp_password.value    = password;\r\n");
   $nm_saida->saida("           document.Fexport.SC_module_export.value = SC_module_export;\r\n");
   $nm_saida->saida("           document.Fexport.action = \"grid_detail_sales_todo_export_ctrl.php\";\r\n");
   $nm_saida->saida("           document.Fexport.submit() ;\r\n");
   $nm_saida->saida("       }\r\n");
   $nm_saida->saida("   }\r\n");
   $nm_saida->saida("   function nm_gp_rtf_conf()\r\n");
   $nm_saida->saida("   {\r\n");
   $nm_saida->saida("       document.Fexport.nmgp_opcao.value   = \"rtf\";\r\n");
   $nm_saida->saida("       document.Fexport.action = \"grid_detail_sales_todo_export_ctrl.php\";\r\n");
   $nm_saida->saida("       document.Fexport.submit() ;\r\n");
   $nm_saida->saida("   }\r\n");
   $nm_saida->saida("   nm_img = new Image();\r\n");
   $nm_saida->saida("   function nm_mostra_img(imagem, altura, largura)\r\n");
   $nm_saida->saida("   {\r\n");
   $nm_saida->saida("       var image = new Image();\r\n");
   $nm_saida->saida("       image.src = imagem;\r\n");
   $nm_saida->saida("       var viewer = new Viewer(image, {\r\n");
   $nm_saida->saida("           navbar: false,\r\n");
   $nm_saida->saida("           hidden: function () {\r\n");
   $nm_saida->saida("               viewer.destroy();\r\n");
   $nm_saida->saida("           },\r\n");
   $nm_saida->saida("       });\r\n");
   $nm_saida->saida("       viewer.show();\r\n");
   $nm_saida->saida("   }\r\n");
   $nm_saida->saida("   function nm_mostra_doc(campo1, campo2)\r\n");
   $nm_saida->saida("   {\r\n");
   $nm_saida->saida("       NovaJanela = window.open (campo2 + \"?nmgp_parms=\" + campo1, \"ScriptCase\", \"resizable\");\r\n");
   $nm_saida->saida("   }\r\n");
   $nm_saida->saida("   function nm_escreve_window()\r\n");
   $nm_saida->saida("   {\r\n");
   if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['form_psq_ret']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['campo_psq_ret']) )
   {
      $nm_saida->saida("      if (document.Fpesq.nm_ret_psq.value != \"\")\r\n");
      $nm_saida->saida("      {\r\n");
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['sc_modal'])
      {
         if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['iframe_ret_cap']))
         {
             $Iframe_cap = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['iframe_ret_cap'];
             unset($_SESSION['sc_session'][$script_case_init]['grid_detail_sales_todo']['iframe_ret_cap']);
             $nm_saida->saida("           var Obj_Form  = parent.document.getElementById('" . $Iframe_cap . "').contentWindow.document." . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['form_psq_ret'] . "." . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['campo_psq_ret'] . ";\r\n");
             $nm_saida->saida("           var Obj_Form1 = parent.document.getElementById('" . $Iframe_cap . "').contentWindow.document." . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['form_psq_ret'] . "." . str_replace("_autocomp", "_", $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['campo_psq_ret']) . ";\r\n");
             $nm_saida->saida("           var Obj_Doc   = parent.document.getElementById('" . $Iframe_cap . "').contentWindow;\r\n");
             $nm_saida->saida("           if (parent.document.getElementById('" . $Iframe_cap . "').contentWindow.document.getElementById(\"id_read_on_" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['campo_psq_ret'] . "\"))\r\n");
             $nm_saida->saida("           {\r\n");
             $nm_saida->saida("               var Obj_Readonly = parent.document.getElementById('" . $Iframe_cap . "').contentWindow.document.getElementById(\"id_read_on_" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['campo_psq_ret'] . "\");\r\n");
             $nm_saida->saida("           }\r\n");
         }
         else
         {
             $nm_saida->saida("          var Obj_Form  = parent.document." . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['form_psq_ret'] . "." . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['campo_psq_ret'] . ";\r\n");
             $nm_saida->saida("          var Obj_Form1 = parent.document." . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['form_psq_ret'] . "." . str_replace("_autocomp", "_", $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['campo_psq_ret']) . ";\r\n");
             $nm_saida->saida("          var Obj_Doc   = parent;\r\n");
             $nm_saida->saida("          if (parent.document.getElementById(\"id_read_on_" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['campo_psq_ret'] . "\"))\r\n");
             $nm_saida->saida("          {\r\n");
             $nm_saida->saida("              var Obj_Readonly = parent.document.getElementById(\"id_read_on_" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['campo_psq_ret'] . "\");\r\n");
             $nm_saida->saida("          }\r\n");
         }
      }
      else
      {
          $nm_saida->saida("          var Obj_Form  = opener.document." . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['form_psq_ret'] . "." . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['campo_psq_ret'] . ";\r\n");
          $nm_saida->saida("          var Obj_Form1 = opener.document." . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['form_psq_ret'] . "." . str_replace("_autocomp", "_", $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['campo_psq_ret']) . ";\r\n");
          $nm_saida->saida("          var Obj_Doc   = opener;\r\n");
          $nm_saida->saida("          if (opener.document.getElementById(\"id_read_on_" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['campo_psq_ret'] . "\"))\r\n");
          $nm_saida->saida("          {\r\n");
          $nm_saida->saida("              var Obj_Readonly = opener.document.getElementById(\"id_read_on_" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['campo_psq_ret'] . "\");\r\n");
          $nm_saida->saida("          }\r\n");
      }
          $nm_saida->saida("          else\r\n");
          $nm_saida->saida("          {\r\n");
          $nm_saida->saida("              var Obj_Readonly = null;\r\n");
          $nm_saida->saida("          }\r\n");
      $nm_saida->saida("          if (Obj_Form.value != document.Fpesq.nm_ret_psq.value)\r\n");
      $nm_saida->saida("          {\r\n");
      $nm_saida->saida("              Obj_Form.value = document.Fpesq.nm_ret_psq.value;\r\n");
      $nm_saida->saida("              if (Obj_Form != Obj_Form1 && Obj_Form1)\r\n");
      $nm_saida->saida("              {\r\n");
      $nm_saida->saida("                  Obj_Form1.value = document.Fpesq.nm_ret_psq.value;\r\n");
      $nm_saida->saida("              }\r\n");
      $nm_saida->saida("              if (null != Obj_Readonly)\r\n");
      $nm_saida->saida("              {\r\n");
      $nm_saida->saida("                  Obj_Readonly.innerHTML = document.Fpesq.nm_ret_psq.value;\r\n");
      $nm_saida->saida("              }\r\n");
     if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['js_apos_busca']))
     {
      $nm_saida->saida("              if (Obj_Doc." . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['js_apos_busca'] . ")\r\n");
      $nm_saida->saida("              {\r\n");
      $nm_saida->saida("                  Obj_Doc." . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['js_apos_busca'] . "();\r\n");
      $nm_saida->saida("              }\r\n");
      $nm_saida->saida("              else if (Obj_Form.onchange && Obj_Form.onchange != '')\r\n");
      $nm_saida->saida("              {\r\n");
      $nm_saida->saida("                  Obj_Form.onchange();\r\n");
      $nm_saida->saida("              }\r\n");
     }
     else
     {
      $nm_saida->saida("              if (Obj_Form.onchange && Obj_Form.onchange != '')\r\n");
      $nm_saida->saida("              {\r\n");
      $nm_saida->saida("                  Obj_Form.onchange();\r\n");
      $nm_saida->saida("              }\r\n");
     }
      $nm_saida->saida("          }\r\n");
      $nm_saida->saida("      }\r\n");
   }
   $nm_saida->saida("      document.F5.action = \"grid_detail_sales_todo_fim.php\";\r\n");
   $nm_saida->saida("      document.F5.submit();\r\n");
   $nm_saida->saida("   }\r\n");
   $nm_saida->saida("   function nm_open_popup(parms)\r\n");
   $nm_saida->saida("   {\r\n");
   $nm_saida->saida("       NovaJanela = window.open (parms, '', 'resizable, scrollbars');\r\n");
   $nm_saida->saida("   }\r\n");
   if (($this->grid_emb_form || $this->grid_emb_form_full) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detail_sales_todo']['reg_start']))
   {
       $nm_saida->saida("      $(document).ready(function(){\r\n");
       $nm_saida->saida("         setTimeout(\"parent.scAjaxDetailStatus('grid_detail_sales_todo')\",50);\r\n");
       $nm_saida->saida("         setTimeout(\"parent.scAjaxDetailHeight('grid_detail_sales_todo', $(document).innerHeight())\",50);\r\n");
       $nm_saida->saida("      })\r\n");
   }
   $nm_saida->saida("   function process_hotkeys(hotkey)\r\n");
   $nm_saida->saida("   {\r\n");
   $nm_saida->saida("      if (hotkey == 'sys_format_pdf') { \r\n");
   $nm_saida->saida("         var output =  $('#pdf_top').click();\r\n");
   $nm_saida->saida("         return (0 < output.length);\r\n");
   $nm_saida->saida("      }\r\n");
   $nm_saida->saida("      if (hotkey == 'sys_format_word') { \r\n");
   $nm_saida->saida("         var output =  $('#word_top').click();\r\n");
   $nm_saida->saida("         return (0 < output.length);\r\n");
   $nm_saida->saida("      }\r\n");
   $nm_saida->saida("      if (hotkey == 'sys_format_xls') { \r\n");
   $nm_saida->saida("         var output =  $('#xls_top').click();\r\n");
   $nm_saida->saida("         return (0 < output.length);\r\n");
   $nm_saida->saida("      }\r\n");
   $nm_saida->saida("      if (hotkey == 'sys_format_xml') { \r\n");
   $nm_saida->saida("         var output =  $('#xml_top').click();\r\n");
   $nm_saida->saida("         return (0 < output.length);\r\n");
   $nm_saida->saida("      }\r\n");
   $nm_saida->saida("      if (hotkey == 'sys_format_csv') { \r\n");
   $nm_saida->saida("         var output =  $('#csv_top').click();\r\n");
   $nm_saida->saida("         return (0 < output.length);\r\n");
   $nm_saida->saida("      }\r\n");
   $nm_saida->saida("      if (hotkey == 'sys_format_rtf') { \r\n");
   $nm_saida->saida("         var output =  $('#rtf_top').click();\r\n");
   $nm_saida->saida("         return (0 < output.length);\r\n");
   $nm_saida->saida("      }\r\n");
   $nm_saida->saida("      if (hotkey == 'sys_format_imp') { \r\n");
   $nm_saida->saida("         var output =  $('#print_top').click();\r\n");
   $nm_saida->saida("         return (0 < output.length);\r\n");
   $nm_saida->saida("      }\r\n");
   $nm_saida->saida("      if (hotkey == 'sys_format_fil') { \r\n");
   $nm_saida->saida("         var output =  $('#pesq_top').click();\r\n");
   $nm_saida->saida("         return (0 < output.length);\r\n");
   $nm_saida->saida("      }\r\n");
   $nm_saida->saida("      if (hotkey == 'sys_format_webh') { \r\n");
   $nm_saida->saida("         var output =  $('#help_bot').click();\r\n");
   $nm_saida->saida("         return (0 < output.length);\r\n");
   $nm_saida->saida("      }\r\n");
   $nm_saida->saida("      if (hotkey == 'sys_format_sai') { \r\n");
   $nm_saida->saida("         var output =  $('#sai_top').click();\r\n");
   $nm_saida->saida("         return (0 < output.length);\r\n");
   $nm_saida->saida("      }\r\n");
   $nm_saida->saida("      if (hotkey == 'sys_format_ini') { \r\n");
   $nm_saida->saida("         var output =  $('#first_bot').click();\r\n");
   $nm_saida->saida("         return (0 < output.length);\r\n");
   $nm_saida->saida("      }\r\n");
   $nm_saida->saida("      if (hotkey == 'sys_format_ret') { \r\n");
   $nm_saida->saida("         var output =  $('#back_bot').click();\r\n");
   $nm_saida->saida("         return (0 < output.length);\r\n");
   $nm_saida->saida("      }\r\n");
   $nm_saida->saida("      if (hotkey == 'sys_format_ava') { \r\n");
   $nm_saida->saida("         var output =  $('#forward_bot').click();\r\n");
   $nm_saida->saida("         return (0 < output.length);\r\n");
   $nm_saida->saida("      }\r\n");
   $nm_saida->saida("      if (hotkey == 'sys_format_fim') { \r\n");
   $nm_saida->saida("         var output =  $('#last_bot').click();\r\n");
   $nm_saida->saida("         return (0 < output.length);\r\n");
   $nm_saida->saida("      }\r\n");
   $nm_saida->saida("   return false;\r\n");
   $nm_saida->saida("   }\r\n");
   $nm_saida->saida("   </script>\r\n");
 }
}
?>