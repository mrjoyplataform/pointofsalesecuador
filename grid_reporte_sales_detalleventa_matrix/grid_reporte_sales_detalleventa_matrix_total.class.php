<?php

class grid_reporte_sales_detalleventa_matrix_total
{
   var $Db;
   var $Erro;
   var $Ini;
   var $Lookup;

   var $nm_data;

   //----- 
   function __construct($sc_page)
   {
      $this->sc_page = $sc_page;
      $this->nm_data = new nm_data("es");
      if (isset($_SESSION['sc_session'][$this->sc_page]['grid_reporte_sales_detalleventa_matrix']['campos_busca']) && !empty($_SESSION['sc_session'][$this->sc_page]['grid_reporte_sales_detalleventa_matrix']['campos_busca']))
      { 
          $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_sales_detalleventa_matrix']['campos_busca'];
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
              $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->datesales = $Busca_temp['datesales']; 
          $tmp_pos = strpos($this->datesales, "##@@");
          if ($tmp_pos !== false && !is_array($this->datesales))
          {
              $this->datesales = substr($this->datesales, 0, $tmp_pos);
          }
          $datesales_2 = $Busca_temp['datesales_input_2']; 
          $this->datesales_2 = $Busca_temp['datesales_input_2']; 
          $this->sucursal = $Busca_temp['sucursal']; 
          $tmp_pos = strpos($this->sucursal, "##@@");
          if ($tmp_pos !== false && !is_array($this->sucursal))
          {
              $this->sucursal = substr($this->sucursal, 0, $tmp_pos);
          }
          $this->cuentaventa = $Busca_temp['cuentaventa']; 
          $tmp_pos = strpos($this->cuentaventa, "##@@");
          if ($tmp_pos !== false && !is_array($this->cuentaventa))
          {
              $this->cuentaventa = substr($this->cuentaventa, 0, $tmp_pos);
          }
      } 
   }

   //---- 
   function quebra_geral_sc_free_group_by($res_limit=false)
   {
      global $nada, $nm_lang , $cuentaventa;
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_sales_detalleventa_matrix']['contr_total_geral'] == "OK") 
      { 
          return; 
      } 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_sales_detalleventa_matrix']['tot_geral'] = array() ;  
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
      { 
          $nm_comando = "select count(*), sum(quantity), sum(item_total), sum(valor_siniva) from " . $this->Ini->nm_tabela . " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_sales_detalleventa_matrix']['where_pesq']; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_comando = "select count(*), sum(quantity), sum(item_total), sum(valor_siniva) from " . $this->Ini->nm_tabela . " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_sales_detalleventa_matrix']['where_pesq']; 
      } 
      else 
      { 
          $nm_comando = "select count(*), sum(quantity), sum(item_total), sum(valor_siniva) from " . $this->Ini->nm_tabela . " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_sales_detalleventa_matrix']['where_pesq']; 
      } 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
      if (!$rt = $this->Db->Execute($nm_comando)) 
      { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_sales_detalleventa_matrix']['tot_geral'][0] = "" . $this->Ini->Nm_lang['lang_msgs_totl'] . ""; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_sales_detalleventa_matrix']['tot_geral'][1] = $rt->fields[0] ; 
      $rt->fields[1] = str_replace(",", ".", $rt->fields[1]);
      $rt->fields[1] = (string)$rt->fields[1]; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_sales_detalleventa_matrix']['tot_geral'][2] = $rt->fields[1]; 
      $rt->fields[2] = str_replace(",", ".", $rt->fields[2]);
      $rt->fields[2] = (string)$rt->fields[2]; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_sales_detalleventa_matrix']['tot_geral'][3] = $rt->fields[2]; 
      $rt->fields[3] = str_replace(",", ".", $rt->fields[3]);
      $rt->fields[3] = (string)$rt->fields[3]; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_sales_detalleventa_matrix']['tot_geral'][4] = $rt->fields[3]; 
      $rt->Close(); 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_sales_detalleventa_matrix']['contr_total_geral'] = "OK";
   } 

   //---- 
   function quebra_geral_datesales_sucursal_cuentaventa_producto($res_limit=false)
   {
      global $nada, $nm_lang , $cuentaventa;
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_sales_detalleventa_matrix']['contr_total_geral'] == "OK") 
      { 
          return; 
      } 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_sales_detalleventa_matrix']['tot_geral'] = array() ;  
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
      { 
          $nm_comando = "select count(*), sum(quantity), sum(valor_siniva) from " . $this->Ini->nm_tabela . " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_sales_detalleventa_matrix']['where_pesq']; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_comando = "select count(*), sum(quantity), sum(valor_siniva) from " . $this->Ini->nm_tabela . " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_sales_detalleventa_matrix']['where_pesq']; 
      } 
      else 
      { 
          $nm_comando = "select count(*), sum(quantity), sum(valor_siniva) from " . $this->Ini->nm_tabela . " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_sales_detalleventa_matrix']['where_pesq']; 
      } 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
      if (!$rt = $this->Db->Execute($nm_comando)) 
      { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_sales_detalleventa_matrix']['tot_geral'][0] = "" . $this->Ini->Nm_lang['lang_msgs_totl'] . ""; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_sales_detalleventa_matrix']['tot_geral'][1] = $rt->fields[0] ; 
      $rt->fields[1] = str_replace(",", ".", $rt->fields[1]);
      $rt->fields[1] = (string)$rt->fields[1]; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_sales_detalleventa_matrix']['tot_geral'][2] = $rt->fields[1]; 
      $rt->fields[2] = str_replace(",", ".", $rt->fields[2]);
      $rt->fields[2] = (string)$rt->fields[2]; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_sales_detalleventa_matrix']['tot_geral'][3] = $rt->fields[2]; 
      $rt->Close(); 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_sales_detalleventa_matrix']['contr_total_geral'] = "OK";
   } 

   //---- 
   function quebra_geral__NM_SC_($res_limit=false)
   {
      global $nada, $nm_lang , $cuentaventa;
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_sales_detalleventa_matrix']['contr_total_geral'] == "OK") 
      { 
          return; 
      } 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_sales_detalleventa_matrix']['tot_geral'] = array() ;  
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
      { 
          $nm_comando = "select count(*) from " . $this->Ini->nm_tabela . " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_sales_detalleventa_matrix']['where_pesq']; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_comando = "select count(*) from " . $this->Ini->nm_tabela . " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_sales_detalleventa_matrix']['where_pesq']; 
      } 
      else 
      { 
          $nm_comando = "select count(*) from " . $this->Ini->nm_tabela . " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_sales_detalleventa_matrix']['where_pesq']; 
      } 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
      if (!$rt = $this->Db->Execute($nm_comando)) 
      { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_sales_detalleventa_matrix']['tot_geral'][0] = "" . $this->Ini->Nm_lang['lang_msgs_totl'] . ""; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_sales_detalleventa_matrix']['tot_geral'][1] = $rt->fields[0] ; 
      $rt->Close(); 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_sales_detalleventa_matrix']['contr_total_geral'] = "OK";
   } 

   //-----  sucursal
   function quebra_sucursal_sc_free_group_by($sucursal, $Where_qb, $Cmp_Name) 
   {
      $Var_name_gb = "SC_tot_" . $Cmp_Name;
      global $$Var_name_gb, $cuentaventa;
      $tot_sucursal = array() ;  
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
      { 
          $nm_comando = "select count(*), sum(quantity), sum(item_total), sum(valor_siniva) from " . $this->Ini->nm_tabela . " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_sales_detalleventa_matrix']['where_pesq']; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_comando = "select count(*), sum(quantity), sum(item_total), sum(valor_siniva) from " . $this->Ini->nm_tabela . " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_sales_detalleventa_matrix']['where_pesq']; 
      } 
      else 
      { 
          $nm_comando = "select count(*), sum(quantity), sum(item_total), sum(valor_siniva) from " . $this->Ini->nm_tabela . " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_sales_detalleventa_matrix']['where_pesq']; 
      } 
      if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_sales_detalleventa_matrix']['where_pesq'])) 
      { 
         $nm_comando .= " where " . $Where_qb ; 
      } 
      else 
      { 
         $nm_comando .= " and " . $Where_qb ; 
      } 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
      if (!$rt = $this->Db->Execute($nm_comando)) 
      { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
      }  
      $tot_sucursal[0] = sc_strip_script($sucursal) ; 
      $tot_sucursal[1] = $rt->fields[0] ; 
      $rt->fields[1] = str_replace(",", ".", $rt->fields[1]);
      $tot_sucursal[2] = (string)$rt->fields[1]; 
      $rt->fields[2] = str_replace(",", ".", $rt->fields[2]);
      $tot_sucursal[3] = (string)$rt->fields[2]; 
      $rt->fields[3] = str_replace(",", ".", $rt->fields[3]);
      $tot_sucursal[4] = (string)$rt->fields[3]; 
      $rt->Close(); 
      $$Var_name_gb = $tot_sucursal;
   } 

   //-----  cuentaventa
   function quebra_cuentaventa_sc_free_group_by($cuentaventa, $Where_qb, $Cmp_Name) 
   {
      $Var_name_gb = "SC_tot_" . $Cmp_Name;
      global $$Var_name_gb, $cuentaventa;
      $tot_cuentaventa = array() ;  
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
      { 
          $nm_comando = "select count(*), sum(quantity), sum(item_total), sum(valor_siniva) from " . $this->Ini->nm_tabela . " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_sales_detalleventa_matrix']['where_pesq']; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_comando = "select count(*), sum(quantity), sum(item_total), sum(valor_siniva) from " . $this->Ini->nm_tabela . " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_sales_detalleventa_matrix']['where_pesq']; 
      } 
      else 
      { 
          $nm_comando = "select count(*), sum(quantity), sum(item_total), sum(valor_siniva) from " . $this->Ini->nm_tabela . " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_sales_detalleventa_matrix']['where_pesq']; 
      } 
      if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_sales_detalleventa_matrix']['where_pesq'])) 
      { 
         $nm_comando .= " where " . $Where_qb ; 
      } 
      else 
      { 
         $nm_comando .= " and " . $Where_qb ; 
      } 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
      if (!$rt = $this->Db->Execute($nm_comando)) 
      { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
      }  
      $tot_cuentaventa[0] = sc_strip_script($cuentaventa) ; 
      $tot_cuentaventa[1] = $rt->fields[0] ; 
      $rt->fields[1] = str_replace(",", ".", $rt->fields[1]);
      $tot_cuentaventa[2] = (string)$rt->fields[1]; 
      $rt->fields[2] = str_replace(",", ".", $rt->fields[2]);
      $tot_cuentaventa[3] = (string)$rt->fields[2]; 
      $rt->fields[3] = str_replace(",", ".", $rt->fields[3]);
      $tot_cuentaventa[4] = (string)$rt->fields[3]; 
      $rt->Close(); 
      $$Var_name_gb = $tot_cuentaventa;
   } 

   //-----  jugador
   function quebra_jugador_sc_free_group_by($jugador, $Where_qb, $Cmp_Name) 
   {
      $Var_name_gb = "SC_tot_" . $Cmp_Name;
      global $$Var_name_gb, $cuentaventa;
      $tot_jugador = array() ;  
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
      { 
          $nm_comando = "select count(*), sum(quantity), sum(item_total), sum(valor_siniva) from " . $this->Ini->nm_tabela . " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_sales_detalleventa_matrix']['where_pesq']; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_comando = "select count(*), sum(quantity), sum(item_total), sum(valor_siniva) from " . $this->Ini->nm_tabela . " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_sales_detalleventa_matrix']['where_pesq']; 
      } 
      else 
      { 
          $nm_comando = "select count(*), sum(quantity), sum(item_total), sum(valor_siniva) from " . $this->Ini->nm_tabela . " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_sales_detalleventa_matrix']['where_pesq']; 
      } 
      if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_sales_detalleventa_matrix']['where_pesq'])) 
      { 
         $nm_comando .= " where " . $Where_qb ; 
      } 
      else 
      { 
         $nm_comando .= " and " . $Where_qb ; 
      } 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
      if (!$rt = $this->Db->Execute($nm_comando)) 
      { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
      }  
      $tot_jugador[0] = NM_encode_input(sc_strip_script($jugador)) ; 
      $tot_jugador[1] = $rt->fields[0] ; 
      $rt->fields[1] = str_replace(",", ".", $rt->fields[1]);
      $tot_jugador[2] = (string)$rt->fields[1]; 
      $rt->fields[2] = str_replace(",", ".", $rt->fields[2]);
      $tot_jugador[3] = (string)$rt->fields[2]; 
      $rt->fields[3] = str_replace(",", ".", $rt->fields[3]);
      $tot_jugador[4] = (string)$rt->fields[3]; 
      $rt->Close(); 
      $$Var_name_gb = $tot_jugador;
   } 

   //-----  visitante
   function quebra_visitante_sc_free_group_by($visitante, $Where_qb, $Cmp_Name) 
   {
      $Var_name_gb = "SC_tot_" . $Cmp_Name;
      global $$Var_name_gb, $cuentaventa;
      $tot_visitante = array() ;  
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
      { 
          $nm_comando = "select count(*), sum(quantity), sum(item_total), sum(valor_siniva) from " . $this->Ini->nm_tabela . " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_sales_detalleventa_matrix']['where_pesq']; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_comando = "select count(*), sum(quantity), sum(item_total), sum(valor_siniva) from " . $this->Ini->nm_tabela . " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_sales_detalleventa_matrix']['where_pesq']; 
      } 
      else 
      { 
          $nm_comando = "select count(*), sum(quantity), sum(item_total), sum(valor_siniva) from " . $this->Ini->nm_tabela . " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_sales_detalleventa_matrix']['where_pesq']; 
      } 
      if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_sales_detalleventa_matrix']['where_pesq'])) 
      { 
         $nm_comando .= " where " . $Where_qb ; 
      } 
      else 
      { 
         $nm_comando .= " and " . $Where_qb ; 
      } 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
      if (!$rt = $this->Db->Execute($nm_comando)) 
      { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
      }  
      $tot_visitante[0] = NM_encode_input(sc_strip_script($visitante)) ; 
      $tot_visitante[1] = $rt->fields[0] ; 
      $rt->fields[1] = str_replace(",", ".", $rt->fields[1]);
      $tot_visitante[2] = (string)$rt->fields[1]; 
      $rt->fields[2] = str_replace(",", ".", $rt->fields[2]);
      $tot_visitante[3] = (string)$rt->fields[2]; 
      $rt->fields[3] = str_replace(",", ".", $rt->fields[3]);
      $tot_visitante[4] = (string)$rt->fields[3]; 
      $rt->Close(); 
      $$Var_name_gb = $tot_visitante;
   } 

   //-----  entrada
   function quebra_entrada_sc_free_group_by($entrada, $Where_qb, $Cmp_Name) 
   {
      $Var_name_gb = "SC_tot_" . $Cmp_Name;
      global $$Var_name_gb, $cuentaventa;
      $tot_entrada = array() ;  
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
      { 
          $nm_comando = "select count(*), sum(quantity), sum(item_total), sum(valor_siniva) from " . $this->Ini->nm_tabela . " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_sales_detalleventa_matrix']['where_pesq']; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_comando = "select count(*), sum(quantity), sum(item_total), sum(valor_siniva) from " . $this->Ini->nm_tabela . " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_sales_detalleventa_matrix']['where_pesq']; 
      } 
      else 
      { 
          $nm_comando = "select count(*), sum(quantity), sum(item_total), sum(valor_siniva) from " . $this->Ini->nm_tabela . " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_sales_detalleventa_matrix']['where_pesq']; 
      } 
      if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_sales_detalleventa_matrix']['where_pesq'])) 
      { 
         $nm_comando .= " where " . $Where_qb ; 
      } 
      else 
      { 
         $nm_comando .= " and " . $Where_qb ; 
      } 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
      if (!$rt = $this->Db->Execute($nm_comando)) 
      { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
      }  
      $tot_entrada[0] = NM_encode_input(sc_strip_script($entrada)) ; 
      $tot_entrada[1] = $rt->fields[0] ; 
      $rt->fields[1] = str_replace(",", ".", $rt->fields[1]);
      $tot_entrada[2] = (string)$rt->fields[1]; 
      $rt->fields[2] = str_replace(",", ".", $rt->fields[2]);
      $tot_entrada[3] = (string)$rt->fields[2]; 
      $rt->fields[3] = str_replace(",", ".", $rt->fields[3]);
      $tot_entrada[4] = (string)$rt->fields[3]; 
      $rt->Close(); 
      $$Var_name_gb = $tot_entrada;
   } 

   //-----  comida
   function quebra_comida_sc_free_group_by($comida, $Where_qb, $Cmp_Name) 
   {
      $Var_name_gb = "SC_tot_" . $Cmp_Name;
      global $$Var_name_gb, $cuentaventa;
      $tot_comida = array() ;  
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
      { 
          $nm_comando = "select count(*), sum(quantity), sum(item_total), sum(valor_siniva) from " . $this->Ini->nm_tabela . " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_sales_detalleventa_matrix']['where_pesq']; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_comando = "select count(*), sum(quantity), sum(item_total), sum(valor_siniva) from " . $this->Ini->nm_tabela . " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_sales_detalleventa_matrix']['where_pesq']; 
      } 
      else 
      { 
          $nm_comando = "select count(*), sum(quantity), sum(item_total), sum(valor_siniva) from " . $this->Ini->nm_tabela . " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_sales_detalleventa_matrix']['where_pesq']; 
      } 
      if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_sales_detalleventa_matrix']['where_pesq'])) 
      { 
         $nm_comando .= " where " . $Where_qb ; 
      } 
      else 
      { 
         $nm_comando .= " and " . $Where_qb ; 
      } 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
      if (!$rt = $this->Db->Execute($nm_comando)) 
      { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
      }  
      $tot_comida[0] = NM_encode_input(sc_strip_script($comida)) ; 
      $tot_comida[1] = $rt->fields[0] ; 
      $rt->fields[1] = str_replace(",", ".", $rt->fields[1]);
      $tot_comida[2] = (string)$rt->fields[1]; 
      $rt->fields[2] = str_replace(",", ".", $rt->fields[2]);
      $tot_comida[3] = (string)$rt->fields[2]; 
      $rt->fields[3] = str_replace(",", ".", $rt->fields[3]);
      $tot_comida[4] = (string)$rt->fields[3]; 
      $rt->Close(); 
      $$Var_name_gb = $tot_comida;
   } 

   //-----  producto
   function quebra_producto_sc_free_group_by($producto, $Where_qb, $Cmp_Name) 
   {
      $Var_name_gb = "SC_tot_" . $Cmp_Name;
      global $$Var_name_gb, $cuentaventa;
      $tot_producto = array() ;  
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
      { 
          $nm_comando = "select count(*), sum(quantity), sum(item_total), sum(valor_siniva) from " . $this->Ini->nm_tabela . " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_sales_detalleventa_matrix']['where_pesq']; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_comando = "select count(*), sum(quantity), sum(item_total), sum(valor_siniva) from " . $this->Ini->nm_tabela . " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_sales_detalleventa_matrix']['where_pesq']; 
      } 
      else 
      { 
          $nm_comando = "select count(*), sum(quantity), sum(item_total), sum(valor_siniva) from " . $this->Ini->nm_tabela . " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_sales_detalleventa_matrix']['where_pesq']; 
      } 
      if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_sales_detalleventa_matrix']['where_pesq'])) 
      { 
         $nm_comando .= " where " . $Where_qb ; 
      } 
      else 
      { 
         $nm_comando .= " and " . $Where_qb ; 
      } 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
      if (!$rt = $this->Db->Execute($nm_comando)) 
      { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
      }  
      $tot_producto[0] = sc_strip_script($producto) ; 
      $tot_producto[1] = $rt->fields[0] ; 
      $rt->fields[1] = str_replace(",", ".", $rt->fields[1]);
      $tot_producto[2] = (string)$rt->fields[1]; 
      $rt->fields[2] = str_replace(",", ".", $rt->fields[2]);
      $tot_producto[3] = (string)$rt->fields[2]; 
      $rt->fields[3] = str_replace(",", ".", $rt->fields[3]);
      $tot_producto[4] = (string)$rt->fields[3]; 
      $rt->Close(); 
      $$Var_name_gb = $tot_producto;
   } 

   //-----  codproducto
   function quebra_codproducto_sc_free_group_by($codproducto, $Where_qb, $Cmp_Name) 
   {
      $Var_name_gb = "SC_tot_" . $Cmp_Name;
      global $$Var_name_gb, $cuentaventa;
      $tot_codproducto = array() ;  
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
      { 
          $nm_comando = "select count(*), sum(quantity), sum(item_total), sum(valor_siniva) from " . $this->Ini->nm_tabela . " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_sales_detalleventa_matrix']['where_pesq']; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_comando = "select count(*), sum(quantity), sum(item_total), sum(valor_siniva) from " . $this->Ini->nm_tabela . " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_sales_detalleventa_matrix']['where_pesq']; 
      } 
      else 
      { 
          $nm_comando = "select count(*), sum(quantity), sum(item_total), sum(valor_siniva) from " . $this->Ini->nm_tabela . " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_sales_detalleventa_matrix']['where_pesq']; 
      } 
      if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_sales_detalleventa_matrix']['where_pesq'])) 
      { 
         $nm_comando .= " where " . $Where_qb ; 
      } 
      else 
      { 
         $nm_comando .= " and " . $Where_qb ; 
      } 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
      if (!$rt = $this->Db->Execute($nm_comando)) 
      { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
      }  
      $tot_codproducto[0] = sc_strip_script($codproducto) ; 
      $tot_codproducto[1] = $rt->fields[0] ; 
      $rt->fields[1] = str_replace(",", ".", $rt->fields[1]);
      $tot_codproducto[2] = (string)$rt->fields[1]; 
      $rt->fields[2] = str_replace(",", ".", $rt->fields[2]);
      $tot_codproducto[3] = (string)$rt->fields[2]; 
      $rt->fields[3] = str_replace(",", ".", $rt->fields[3]);
      $tot_codproducto[4] = (string)$rt->fields[3]; 
      $rt->Close(); 
      $$Var_name_gb = $tot_codproducto;
   } 

   //-----  idcliente
   function quebra_idcliente_sc_free_group_by($idcliente, $Where_qb, $Cmp_Name) 
   {
      $Var_name_gb = "SC_tot_" . $Cmp_Name;
      global $$Var_name_gb, $cuentaventa;
      $tot_idcliente = array() ;  
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
      { 
          $nm_comando = "select count(*), sum(quantity), sum(item_total), sum(valor_siniva) from " . $this->Ini->nm_tabela . " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_sales_detalleventa_matrix']['where_pesq']; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_comando = "select count(*), sum(quantity), sum(item_total), sum(valor_siniva) from " . $this->Ini->nm_tabela . " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_sales_detalleventa_matrix']['where_pesq']; 
      } 
      else 
      { 
          $nm_comando = "select count(*), sum(quantity), sum(item_total), sum(valor_siniva) from " . $this->Ini->nm_tabela . " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_sales_detalleventa_matrix']['where_pesq']; 
      } 
      if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_sales_detalleventa_matrix']['where_pesq'])) 
      { 
         $nm_comando .= " where " . $Where_qb ; 
      } 
      else 
      { 
         $nm_comando .= " and " . $Where_qb ; 
      } 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
      if (!$rt = $this->Db->Execute($nm_comando)) 
      { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
      }  
      $tot_idcliente[0] = sc_strip_script($idcliente) ; 
      $tot_idcliente[1] = $rt->fields[0] ; 
      $rt->fields[1] = str_replace(",", ".", $rt->fields[1]);
      $tot_idcliente[2] = (string)$rt->fields[1]; 
      $rt->fields[2] = str_replace(",", ".", $rt->fields[2]);
      $tot_idcliente[3] = (string)$rt->fields[2]; 
      $rt->fields[3] = str_replace(",", ".", $rt->fields[3]);
      $tot_idcliente[4] = (string)$rt->fields[3]; 
      $rt->Close(); 
      $$Var_name_gb = $tot_idcliente;
   } 

   //-----  datesales
   function quebra_datesales_sc_free_group_by($datesales, $Where_qb, $Cmp_Name) 
   {
      $Var_name_gb = "SC_tot_" . $Cmp_Name;
      global $$Var_name_gb, $cuentaventa;
      $tot_datesales = array() ;  
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
      { 
          $nm_comando = "select count(*), sum(quantity), sum(item_total), sum(valor_siniva) from " . $this->Ini->nm_tabela . " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_sales_detalleventa_matrix']['where_pesq']; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_comando = "select count(*), sum(quantity), sum(item_total), sum(valor_siniva) from " . $this->Ini->nm_tabela . " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_sales_detalleventa_matrix']['where_pesq']; 
      } 
      else 
      { 
          $nm_comando = "select count(*), sum(quantity), sum(item_total), sum(valor_siniva) from " . $this->Ini->nm_tabela . " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_sales_detalleventa_matrix']['where_pesq']; 
      } 
      if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_sales_detalleventa_matrix']['where_pesq'])) 
      { 
         $nm_comando .= " where " . $Where_qb ; 
      } 
      else 
      { 
         $nm_comando .= " and " . $Where_qb ; 
      } 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
      if (!$rt = $this->Db->Execute($nm_comando)) 
      { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
      }  
      $tot_datesales[0] = NM_encode_input(sc_strip_script($datesales)) ; 
      $tot_datesales[1] = $rt->fields[0] ; 
      $rt->fields[1] = str_replace(",", ".", $rt->fields[1]);
      $tot_datesales[2] = (string)$rt->fields[1]; 
      $rt->fields[2] = str_replace(",", ".", $rt->fields[2]);
      $tot_datesales[3] = (string)$rt->fields[2]; 
      $rt->fields[3] = str_replace(",", ".", $rt->fields[3]);
      $tot_datesales[4] = (string)$rt->fields[3]; 
      $rt->Close(); 
      $$Var_name_gb = $tot_datesales;
   } 

   //-----  datesales_scgb_192
   function quebra_datesales_scgb_192_sc_free_group_by($datesales_scgb_192, $Where_qb, $Cmp_Name) 
   {
      $Var_name_gb = "SC_tot_" . $Cmp_Name;
      global $$Var_name_gb, $cuentaventa;
      $tot_datesales_scgb_192 = array() ;  
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
      { 
          $nm_comando = "select count(*), sum(quantity), sum(item_total), sum(valor_siniva) from " . $this->Ini->nm_tabela . " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_sales_detalleventa_matrix']['where_pesq']; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_comando = "select count(*), sum(quantity), sum(item_total), sum(valor_siniva) from " . $this->Ini->nm_tabela . " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_sales_detalleventa_matrix']['where_pesq']; 
      } 
      else 
      { 
          $nm_comando = "select count(*), sum(quantity), sum(item_total), sum(valor_siniva) from " . $this->Ini->nm_tabela . " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_sales_detalleventa_matrix']['where_pesq']; 
      } 
      if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_sales_detalleventa_matrix']['where_pesq'])) 
      { 
         $nm_comando .= " where " . $Where_qb ; 
      } 
      else 
      { 
         $nm_comando .= " and " . $Where_qb ; 
      } 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
      if (!$rt = $this->Db->Execute($nm_comando)) 
      { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
      }  
      $tot_datesales_scgb_192[0] = NM_encode_input(sc_strip_script($datesales_scgb_192)) ; 
      $tot_datesales_scgb_192[1] = $rt->fields[0] ; 
      $rt->fields[1] = str_replace(",", ".", $rt->fields[1]);
      $tot_datesales_scgb_192[2] = (string)$rt->fields[1]; 
      $rt->fields[2] = str_replace(",", ".", $rt->fields[2]);
      $tot_datesales_scgb_192[3] = (string)$rt->fields[2]; 
      $rt->fields[3] = str_replace(",", ".", $rt->fields[3]);
      $tot_datesales_scgb_192[4] = (string)$rt->fields[3]; 
      $rt->Close(); 
      $$Var_name_gb = $tot_datesales_scgb_192;
   } 

   //-----  datesales_scgb_203
   function quebra_datesales_scgb_203_sc_free_group_by($datesales_scgb_203, $Where_qb, $Cmp_Name) 
   {
      $Var_name_gb = "SC_tot_" . $Cmp_Name;
      global $$Var_name_gb, $cuentaventa;
      $tot_datesales_scgb_203 = array() ;  
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
      { 
          $nm_comando = "select count(*), sum(quantity), sum(item_total), sum(valor_siniva) from " . $this->Ini->nm_tabela . " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_sales_detalleventa_matrix']['where_pesq']; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_comando = "select count(*), sum(quantity), sum(item_total), sum(valor_siniva) from " . $this->Ini->nm_tabela . " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_sales_detalleventa_matrix']['where_pesq']; 
      } 
      else 
      { 
          $nm_comando = "select count(*), sum(quantity), sum(item_total), sum(valor_siniva) from " . $this->Ini->nm_tabela . " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_sales_detalleventa_matrix']['where_pesq']; 
      } 
      if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_sales_detalleventa_matrix']['where_pesq'])) 
      { 
         $nm_comando .= " where " . $Where_qb ; 
      } 
      else 
      { 
         $nm_comando .= " and " . $Where_qb ; 
      } 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
      if (!$rt = $this->Db->Execute($nm_comando)) 
      { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
      }  
      $tot_datesales_scgb_203[0] = NM_encode_input(sc_strip_script($datesales_scgb_203)) ; 
      $tot_datesales_scgb_203[1] = $rt->fields[0] ; 
      $rt->fields[1] = str_replace(",", ".", $rt->fields[1]);
      $tot_datesales_scgb_203[2] = (string)$rt->fields[1]; 
      $rt->fields[2] = str_replace(",", ".", $rt->fields[2]);
      $tot_datesales_scgb_203[3] = (string)$rt->fields[2]; 
      $rt->fields[3] = str_replace(",", ".", $rt->fields[3]);
      $tot_datesales_scgb_203[4] = (string)$rt->fields[3]; 
      $rt->Close(); 
      $$Var_name_gb = $tot_datesales_scgb_203;
   } 

   //-----  datesales_scgb_193
   function quebra_datesales_scgb_193_sc_free_group_by($datesales_scgb_193, $Where_qb, $Cmp_Name) 
   {
      $Var_name_gb = "SC_tot_" . $Cmp_Name;
      global $$Var_name_gb, $cuentaventa;
      $tot_datesales_scgb_193 = array() ;  
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
      { 
          $nm_comando = "select count(*), sum(quantity), sum(item_total), sum(valor_siniva) from " . $this->Ini->nm_tabela . " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_sales_detalleventa_matrix']['where_pesq']; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_comando = "select count(*), sum(quantity), sum(item_total), sum(valor_siniva) from " . $this->Ini->nm_tabela . " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_sales_detalleventa_matrix']['where_pesq']; 
      } 
      else 
      { 
          $nm_comando = "select count(*), sum(quantity), sum(item_total), sum(valor_siniva) from " . $this->Ini->nm_tabela . " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_sales_detalleventa_matrix']['where_pesq']; 
      } 
      if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_sales_detalleventa_matrix']['where_pesq'])) 
      { 
         $nm_comando .= " where " . $Where_qb ; 
      } 
      else 
      { 
         $nm_comando .= " and " . $Where_qb ; 
      } 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
      if (!$rt = $this->Db->Execute($nm_comando)) 
      { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
      }  
      $tot_datesales_scgb_193[0] = NM_encode_input(sc_strip_script($datesales_scgb_193)) ; 
      $tot_datesales_scgb_193[1] = $rt->fields[0] ; 
      $rt->fields[1] = str_replace(",", ".", $rt->fields[1]);
      $tot_datesales_scgb_193[2] = (string)$rt->fields[1]; 
      $rt->fields[2] = str_replace(",", ".", $rt->fields[2]);
      $tot_datesales_scgb_193[3] = (string)$rt->fields[2]; 
      $rt->fields[3] = str_replace(",", ".", $rt->fields[3]);
      $tot_datesales_scgb_193[4] = (string)$rt->fields[3]; 
      $rt->Close(); 
      $$Var_name_gb = $tot_datesales_scgb_193;
   } 

   //-----  datesales_scgb_195
   function quebra_datesales_scgb_195_sc_free_group_by($datesales_scgb_195, $Where_qb, $Cmp_Name) 
   {
      $Var_name_gb = "SC_tot_" . $Cmp_Name;
      global $$Var_name_gb, $cuentaventa;
      $tot_datesales_scgb_195 = array() ;  
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
      { 
          $nm_comando = "select count(*), sum(quantity), sum(item_total), sum(valor_siniva) from " . $this->Ini->nm_tabela . " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_sales_detalleventa_matrix']['where_pesq']; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_comando = "select count(*), sum(quantity), sum(item_total), sum(valor_siniva) from " . $this->Ini->nm_tabela . " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_sales_detalleventa_matrix']['where_pesq']; 
      } 
      else 
      { 
          $nm_comando = "select count(*), sum(quantity), sum(item_total), sum(valor_siniva) from " . $this->Ini->nm_tabela . " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_sales_detalleventa_matrix']['where_pesq']; 
      } 
      if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_sales_detalleventa_matrix']['where_pesq'])) 
      { 
         $nm_comando .= " where " . $Where_qb ; 
      } 
      else 
      { 
         $nm_comando .= " and " . $Where_qb ; 
      } 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
      if (!$rt = $this->Db->Execute($nm_comando)) 
      { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
      }  
      $tot_datesales_scgb_195[0] = NM_encode_input(sc_strip_script($datesales_scgb_195)) ; 
      $tot_datesales_scgb_195[1] = $rt->fields[0] ; 
      $rt->fields[1] = str_replace(",", ".", $rt->fields[1]);
      $tot_datesales_scgb_195[2] = (string)$rt->fields[1]; 
      $rt->fields[2] = str_replace(",", ".", $rt->fields[2]);
      $tot_datesales_scgb_195[3] = (string)$rt->fields[2]; 
      $rt->fields[3] = str_replace(",", ".", $rt->fields[3]);
      $tot_datesales_scgb_195[4] = (string)$rt->fields[3]; 
      $rt->Close(); 
      $$Var_name_gb = $tot_datesales_scgb_195;
   } 

   //-----  datesales_scgb_196
   function quebra_datesales_scgb_196_sc_free_group_by($datesales_scgb_196, $Where_qb, $Cmp_Name) 
   {
      $Var_name_gb = "SC_tot_" . $Cmp_Name;
      global $$Var_name_gb, $cuentaventa;
      $tot_datesales_scgb_196 = array() ;  
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
      { 
          $nm_comando = "select count(*), sum(quantity), sum(item_total), sum(valor_siniva) from " . $this->Ini->nm_tabela . " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_sales_detalleventa_matrix']['where_pesq']; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_comando = "select count(*), sum(quantity), sum(item_total), sum(valor_siniva) from " . $this->Ini->nm_tabela . " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_sales_detalleventa_matrix']['where_pesq']; 
      } 
      else 
      { 
          $nm_comando = "select count(*), sum(quantity), sum(item_total), sum(valor_siniva) from " . $this->Ini->nm_tabela . " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_sales_detalleventa_matrix']['where_pesq']; 
      } 
      if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_sales_detalleventa_matrix']['where_pesq'])) 
      { 
         $nm_comando .= " where " . $Where_qb ; 
      } 
      else 
      { 
         $nm_comando .= " and " . $Where_qb ; 
      } 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
      if (!$rt = $this->Db->Execute($nm_comando)) 
      { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
      }  
      $tot_datesales_scgb_196[0] = NM_encode_input(sc_strip_script($datesales_scgb_196)) ; 
      $tot_datesales_scgb_196[1] = $rt->fields[0] ; 
      $rt->fields[1] = str_replace(",", ".", $rt->fields[1]);
      $tot_datesales_scgb_196[2] = (string)$rt->fields[1]; 
      $rt->fields[2] = str_replace(",", ".", $rt->fields[2]);
      $tot_datesales_scgb_196[3] = (string)$rt->fields[2]; 
      $rt->fields[3] = str_replace(",", ".", $rt->fields[3]);
      $tot_datesales_scgb_196[4] = (string)$rt->fields[3]; 
      $rt->Close(); 
      $$Var_name_gb = $tot_datesales_scgb_196;
   } 

   //-----  datesales_scgb_197
   function quebra_datesales_scgb_197_sc_free_group_by($datesales_scgb_197, $Where_qb, $Cmp_Name) 
   {
      $Var_name_gb = "SC_tot_" . $Cmp_Name;
      global $$Var_name_gb, $cuentaventa;
      $tot_datesales_scgb_197 = array() ;  
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
      { 
          $nm_comando = "select count(*), sum(quantity), sum(item_total), sum(valor_siniva) from " . $this->Ini->nm_tabela . " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_sales_detalleventa_matrix']['where_pesq']; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_comando = "select count(*), sum(quantity), sum(item_total), sum(valor_siniva) from " . $this->Ini->nm_tabela . " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_sales_detalleventa_matrix']['where_pesq']; 
      } 
      else 
      { 
          $nm_comando = "select count(*), sum(quantity), sum(item_total), sum(valor_siniva) from " . $this->Ini->nm_tabela . " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_sales_detalleventa_matrix']['where_pesq']; 
      } 
      if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_sales_detalleventa_matrix']['where_pesq'])) 
      { 
         $nm_comando .= " where " . $Where_qb ; 
      } 
      else 
      { 
         $nm_comando .= " and " . $Where_qb ; 
      } 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
      if (!$rt = $this->Db->Execute($nm_comando)) 
      { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
      }  
      $tot_datesales_scgb_197[0] = NM_encode_input(sc_strip_script($datesales_scgb_197)) ; 
      $tot_datesales_scgb_197[1] = $rt->fields[0] ; 
      $rt->fields[1] = str_replace(",", ".", $rt->fields[1]);
      $tot_datesales_scgb_197[2] = (string)$rt->fields[1]; 
      $rt->fields[2] = str_replace(",", ".", $rt->fields[2]);
      $tot_datesales_scgb_197[3] = (string)$rt->fields[2]; 
      $rt->fields[3] = str_replace(",", ".", $rt->fields[3]);
      $tot_datesales_scgb_197[4] = (string)$rt->fields[3]; 
      $rt->Close(); 
      $$Var_name_gb = $tot_datesales_scgb_197;
   } 

   //-----  datesales_scgb_198
   function quebra_datesales_scgb_198_sc_free_group_by($datesales_scgb_198, $Where_qb, $Cmp_Name) 
   {
      $Var_name_gb = "SC_tot_" . $Cmp_Name;
      global $$Var_name_gb, $cuentaventa;
      $tot_datesales_scgb_198 = array() ;  
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
      { 
          $nm_comando = "select count(*), sum(quantity), sum(item_total), sum(valor_siniva) from " . $this->Ini->nm_tabela . " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_sales_detalleventa_matrix']['where_pesq']; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_comando = "select count(*), sum(quantity), sum(item_total), sum(valor_siniva) from " . $this->Ini->nm_tabela . " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_sales_detalleventa_matrix']['where_pesq']; 
      } 
      else 
      { 
          $nm_comando = "select count(*), sum(quantity), sum(item_total), sum(valor_siniva) from " . $this->Ini->nm_tabela . " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_sales_detalleventa_matrix']['where_pesq']; 
      } 
      if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_sales_detalleventa_matrix']['where_pesq'])) 
      { 
         $nm_comando .= " where " . $Where_qb ; 
      } 
      else 
      { 
         $nm_comando .= " and " . $Where_qb ; 
      } 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
      if (!$rt = $this->Db->Execute($nm_comando)) 
      { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
      }  
      $tot_datesales_scgb_198[0] = NM_encode_input(sc_strip_script($datesales_scgb_198)) ; 
      $tot_datesales_scgb_198[1] = $rt->fields[0] ; 
      $rt->fields[1] = str_replace(",", ".", $rt->fields[1]);
      $tot_datesales_scgb_198[2] = (string)$rt->fields[1]; 
      $rt->fields[2] = str_replace(",", ".", $rt->fields[2]);
      $tot_datesales_scgb_198[3] = (string)$rt->fields[2]; 
      $rt->fields[3] = str_replace(",", ".", $rt->fields[3]);
      $tot_datesales_scgb_198[4] = (string)$rt->fields[3]; 
      $rt->Close(); 
      $$Var_name_gb = $tot_datesales_scgb_198;
   } 

   //-----  datesales_scgb_199
   function quebra_datesales_scgb_199_sc_free_group_by($datesales_scgb_199, $Where_qb, $Cmp_Name) 
   {
      $Var_name_gb = "SC_tot_" . $Cmp_Name;
      global $$Var_name_gb, $cuentaventa;
      $tot_datesales_scgb_199 = array() ;  
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
      { 
          $nm_comando = "select count(*), sum(quantity), sum(item_total), sum(valor_siniva) from " . $this->Ini->nm_tabela . " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_sales_detalleventa_matrix']['where_pesq']; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_comando = "select count(*), sum(quantity), sum(item_total), sum(valor_siniva) from " . $this->Ini->nm_tabela . " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_sales_detalleventa_matrix']['where_pesq']; 
      } 
      else 
      { 
          $nm_comando = "select count(*), sum(quantity), sum(item_total), sum(valor_siniva) from " . $this->Ini->nm_tabela . " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_sales_detalleventa_matrix']['where_pesq']; 
      } 
      if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_sales_detalleventa_matrix']['where_pesq'])) 
      { 
         $nm_comando .= " where " . $Where_qb ; 
      } 
      else 
      { 
         $nm_comando .= " and " . $Where_qb ; 
      } 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
      if (!$rt = $this->Db->Execute($nm_comando)) 
      { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
      }  
      $tot_datesales_scgb_199[0] = NM_encode_input(sc_strip_script($datesales_scgb_199)) ; 
      $tot_datesales_scgb_199[1] = $rt->fields[0] ; 
      $rt->fields[1] = str_replace(",", ".", $rt->fields[1]);
      $tot_datesales_scgb_199[2] = (string)$rt->fields[1]; 
      $rt->fields[2] = str_replace(",", ".", $rt->fields[2]);
      $tot_datesales_scgb_199[3] = (string)$rt->fields[2]; 
      $rt->fields[3] = str_replace(",", ".", $rt->fields[3]);
      $tot_datesales_scgb_199[4] = (string)$rt->fields[3]; 
      $rt->Close(); 
      $$Var_name_gb = $tot_datesales_scgb_199;
   } 

   //-----  datesales_scgb_200
   function quebra_datesales_scgb_200_sc_free_group_by($datesales_scgb_200, $Where_qb, $Cmp_Name) 
   {
      $Var_name_gb = "SC_tot_" . $Cmp_Name;
      global $$Var_name_gb, $cuentaventa;
      $tot_datesales_scgb_200 = array() ;  
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
      { 
          $nm_comando = "select count(*), sum(quantity), sum(item_total), sum(valor_siniva) from " . $this->Ini->nm_tabela . " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_sales_detalleventa_matrix']['where_pesq']; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_comando = "select count(*), sum(quantity), sum(item_total), sum(valor_siniva) from " . $this->Ini->nm_tabela . " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_sales_detalleventa_matrix']['where_pesq']; 
      } 
      else 
      { 
          $nm_comando = "select count(*), sum(quantity), sum(item_total), sum(valor_siniva) from " . $this->Ini->nm_tabela . " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_sales_detalleventa_matrix']['where_pesq']; 
      } 
      if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_sales_detalleventa_matrix']['where_pesq'])) 
      { 
         $nm_comando .= " where " . $Where_qb ; 
      } 
      else 
      { 
         $nm_comando .= " and " . $Where_qb ; 
      } 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
      if (!$rt = $this->Db->Execute($nm_comando)) 
      { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
      }  
      $tot_datesales_scgb_200[0] = NM_encode_input(sc_strip_script($datesales_scgb_200)) ; 
      $tot_datesales_scgb_200[1] = $rt->fields[0] ; 
      $rt->fields[1] = str_replace(",", ".", $rt->fields[1]);
      $tot_datesales_scgb_200[2] = (string)$rt->fields[1]; 
      $rt->fields[2] = str_replace(",", ".", $rt->fields[2]);
      $tot_datesales_scgb_200[3] = (string)$rt->fields[2]; 
      $rt->fields[3] = str_replace(",", ".", $rt->fields[3]);
      $tot_datesales_scgb_200[4] = (string)$rt->fields[3]; 
      $rt->Close(); 
      $$Var_name_gb = $tot_datesales_scgb_200;
   } 

   //-----  datesales_scgb_201
   function quebra_datesales_scgb_201_sc_free_group_by($datesales_scgb_201, $Where_qb, $Cmp_Name) 
   {
      $Var_name_gb = "SC_tot_" . $Cmp_Name;
      global $$Var_name_gb, $cuentaventa;
      $tot_datesales_scgb_201 = array() ;  
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
      { 
          $nm_comando = "select count(*), sum(quantity), sum(item_total), sum(valor_siniva) from " . $this->Ini->nm_tabela . " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_sales_detalleventa_matrix']['where_pesq']; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_comando = "select count(*), sum(quantity), sum(item_total), sum(valor_siniva) from " . $this->Ini->nm_tabela . " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_sales_detalleventa_matrix']['where_pesq']; 
      } 
      else 
      { 
          $nm_comando = "select count(*), sum(quantity), sum(item_total), sum(valor_siniva) from " . $this->Ini->nm_tabela . " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_sales_detalleventa_matrix']['where_pesq']; 
      } 
      if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_sales_detalleventa_matrix']['where_pesq'])) 
      { 
         $nm_comando .= " where " . $Where_qb ; 
      } 
      else 
      { 
         $nm_comando .= " and " . $Where_qb ; 
      } 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
      if (!$rt = $this->Db->Execute($nm_comando)) 
      { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
      }  
      $tot_datesales_scgb_201[0] = NM_encode_input(sc_strip_script($datesales_scgb_201)) ; 
      $tot_datesales_scgb_201[1] = $rt->fields[0] ; 
      $rt->fields[1] = str_replace(",", ".", $rt->fields[1]);
      $tot_datesales_scgb_201[2] = (string)$rt->fields[1]; 
      $rt->fields[2] = str_replace(",", ".", $rt->fields[2]);
      $tot_datesales_scgb_201[3] = (string)$rt->fields[2]; 
      $rt->fields[3] = str_replace(",", ".", $rt->fields[3]);
      $tot_datesales_scgb_201[4] = (string)$rt->fields[3]; 
      $rt->Close(); 
      $$Var_name_gb = $tot_datesales_scgb_201;
   } 

   //-----  datesales_scgb_202
   function quebra_datesales_scgb_202_sc_free_group_by($datesales_scgb_202, $Where_qb, $Cmp_Name) 
   {
      $Var_name_gb = "SC_tot_" . $Cmp_Name;
      global $$Var_name_gb, $cuentaventa;
      $tot_datesales_scgb_202 = array() ;  
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
      { 
          $nm_comando = "select count(*), sum(quantity), sum(item_total), sum(valor_siniva) from " . $this->Ini->nm_tabela . " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_sales_detalleventa_matrix']['where_pesq']; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_comando = "select count(*), sum(quantity), sum(item_total), sum(valor_siniva) from " . $this->Ini->nm_tabela . " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_sales_detalleventa_matrix']['where_pesq']; 
      } 
      else 
      { 
          $nm_comando = "select count(*), sum(quantity), sum(item_total), sum(valor_siniva) from " . $this->Ini->nm_tabela . " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_sales_detalleventa_matrix']['where_pesq']; 
      } 
      if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_sales_detalleventa_matrix']['where_pesq'])) 
      { 
         $nm_comando .= " where " . $Where_qb ; 
      } 
      else 
      { 
         $nm_comando .= " and " . $Where_qb ; 
      } 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
      if (!$rt = $this->Db->Execute($nm_comando)) 
      { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
      }  
      $tot_datesales_scgb_202[0] = NM_encode_input(sc_strip_script($datesales_scgb_202)) ; 
      $tot_datesales_scgb_202[1] = $rt->fields[0] ; 
      $rt->fields[1] = str_replace(",", ".", $rt->fields[1]);
      $tot_datesales_scgb_202[2] = (string)$rt->fields[1]; 
      $rt->fields[2] = str_replace(",", ".", $rt->fields[2]);
      $tot_datesales_scgb_202[3] = (string)$rt->fields[2]; 
      $rt->fields[3] = str_replace(",", ".", $rt->fields[3]);
      $tot_datesales_scgb_202[4] = (string)$rt->fields[3]; 
      $rt->Close(); 
      $$Var_name_gb = $tot_datesales_scgb_202;
   } 

   //-----  datesales_scgb_204
   function quebra_datesales_scgb_204_sc_free_group_by($datesales_scgb_204, $Where_qb, $Cmp_Name) 
   {
      $Var_name_gb = "SC_tot_" . $Cmp_Name;
      global $$Var_name_gb, $cuentaventa;
      $tot_datesales_scgb_204 = array() ;  
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
      { 
          $nm_comando = "select count(*), sum(quantity), sum(item_total), sum(valor_siniva) from " . $this->Ini->nm_tabela . " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_sales_detalleventa_matrix']['where_pesq']; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_comando = "select count(*), sum(quantity), sum(item_total), sum(valor_siniva) from " . $this->Ini->nm_tabela . " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_sales_detalleventa_matrix']['where_pesq']; 
      } 
      else 
      { 
          $nm_comando = "select count(*), sum(quantity), sum(item_total), sum(valor_siniva) from " . $this->Ini->nm_tabela . " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_sales_detalleventa_matrix']['where_pesq']; 
      } 
      if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_sales_detalleventa_matrix']['where_pesq'])) 
      { 
         $nm_comando .= " where " . $Where_qb ; 
      } 
      else 
      { 
         $nm_comando .= " and " . $Where_qb ; 
      } 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
      if (!$rt = $this->Db->Execute($nm_comando)) 
      { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
      }  
      $tot_datesales_scgb_204[0] = NM_encode_input(sc_strip_script($datesales_scgb_204)) ; 
      $tot_datesales_scgb_204[1] = $rt->fields[0] ; 
      $rt->fields[1] = str_replace(",", ".", $rt->fields[1]);
      $tot_datesales_scgb_204[2] = (string)$rt->fields[1]; 
      $rt->fields[2] = str_replace(",", ".", $rt->fields[2]);
      $tot_datesales_scgb_204[3] = (string)$rt->fields[2]; 
      $rt->fields[3] = str_replace(",", ".", $rt->fields[3]);
      $tot_datesales_scgb_204[4] = (string)$rt->fields[3]; 
      $rt->Close(); 
      $$Var_name_gb = $tot_datesales_scgb_204;
   } 

   //-----  datesales_scgb_194
   function quebra_datesales_scgb_194_sc_free_group_by($datesales_scgb_194, $Where_qb, $Cmp_Name) 
   {
      $Var_name_gb = "SC_tot_" . $Cmp_Name;
      global $$Var_name_gb, $cuentaventa;
      $tot_datesales_scgb_194 = array() ;  
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
      { 
          $nm_comando = "select count(*), sum(quantity), sum(item_total), sum(valor_siniva) from " . $this->Ini->nm_tabela . " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_sales_detalleventa_matrix']['where_pesq']; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_comando = "select count(*), sum(quantity), sum(item_total), sum(valor_siniva) from " . $this->Ini->nm_tabela . " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_sales_detalleventa_matrix']['where_pesq']; 
      } 
      else 
      { 
          $nm_comando = "select count(*), sum(quantity), sum(item_total), sum(valor_siniva) from " . $this->Ini->nm_tabela . " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_sales_detalleventa_matrix']['where_pesq']; 
      } 
      if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_sales_detalleventa_matrix']['where_pesq'])) 
      { 
         $nm_comando .= " where " . $Where_qb ; 
      } 
      else 
      { 
         $nm_comando .= " and " . $Where_qb ; 
      } 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
      if (!$rt = $this->Db->Execute($nm_comando)) 
      { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
      }  
      $tot_datesales_scgb_194[0] = NM_encode_input(sc_strip_script($datesales_scgb_194)) ; 
      $tot_datesales_scgb_194[1] = $rt->fields[0] ; 
      $rt->fields[1] = str_replace(",", ".", $rt->fields[1]);
      $tot_datesales_scgb_194[2] = (string)$rt->fields[1]; 
      $rt->fields[2] = str_replace(",", ".", $rt->fields[2]);
      $tot_datesales_scgb_194[3] = (string)$rt->fields[2]; 
      $rt->fields[3] = str_replace(",", ".", $rt->fields[3]);
      $tot_datesales_scgb_194[4] = (string)$rt->fields[3]; 
      $rt->Close(); 
      $$Var_name_gb = $tot_datesales_scgb_194;
   } 

   //-----  fechatrans
   function quebra_fechatrans_datesales_sucursal_cuentaventa_producto($fechatrans, $arg_sum_fechatrans) 
   {
      global $tot_fechatrans, $cuentaventa;
      $tot_fechatrans = array() ;  
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
      { 
          $nm_comando = "select count(*), sum(quantity), sum(valor_siniva) from " . $this->Ini->nm_tabela . " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_sales_detalleventa_matrix']['where_pesq']; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_comando = "select count(*), sum(quantity), sum(valor_siniva) from " . $this->Ini->nm_tabela . " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_sales_detalleventa_matrix']['where_pesq']; 
      } 
      else 
      { 
          $nm_comando = "select count(*), sum(quantity), sum(valor_siniva) from " . $this->Ini->nm_tabela . " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_sales_detalleventa_matrix']['where_pesq']; 
      } 
      if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_sales_detalleventa_matrix']['where_pesq'])) 
      { 
         $nm_comando .= " where " .  $this->Sc_groupby_fechatrans . $arg_sum_fechatrans ; 
      } 
      else 
      { 
         $nm_comando .= " and " .  $this->Sc_groupby_fechatrans . $arg_sum_fechatrans ; 
      } 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
      if (!$rt = $this->Db->Execute($nm_comando)) 
      { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
      }  
      $tot_fechatrans[0] = NM_encode_input(sc_strip_script($fechatrans)) ; 
      $tot_fechatrans[1] = $rt->fields[0] ; 
      $rt->fields[1] = str_replace(",", ".", $rt->fields[1]);
      $tot_fechatrans[2] = (string)$rt->fields[1]; 
      $rt->fields[2] = str_replace(",", ".", $rt->fields[2]);
      $tot_fechatrans[3] = (string)$rt->fields[2]; 
      $rt->Close(); 
   } 

   //-----  sucursal
   function quebra_sucursal_datesales_sucursal_cuentaventa_producto($fechatrans, $sucursal, $arg_sum_fechatrans, $arg_sum_sucursal) 
   {
      global $tot_sucursal, $cuentaventa;
      $tot_sucursal = array() ;  
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
      { 
          $nm_comando = "select count(*), sum(quantity), sum(valor_siniva) from " . $this->Ini->nm_tabela . " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_sales_detalleventa_matrix']['where_pesq']; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_comando = "select count(*), sum(quantity), sum(valor_siniva) from " . $this->Ini->nm_tabela . " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_sales_detalleventa_matrix']['where_pesq']; 
      } 
      else 
      { 
          $nm_comando = "select count(*), sum(quantity), sum(valor_siniva) from " . $this->Ini->nm_tabela . " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_sales_detalleventa_matrix']['where_pesq']; 
      } 
      if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_sales_detalleventa_matrix']['where_pesq'])) 
      { 
         $nm_comando .= " where " .  $this->Sc_groupby_fechatrans . $arg_sum_fechatrans . " and sucursal" . $arg_sum_sucursal ; 
      } 
      else 
      { 
         $nm_comando .= " and " .  $this->Sc_groupby_fechatrans . $arg_sum_fechatrans . " and sucursal" . $arg_sum_sucursal ; 
      } 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
      if (!$rt = $this->Db->Execute($nm_comando)) 
      { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
      }  
      $tot_sucursal[0] = sc_strip_script($sucursal) ; 
      $tot_sucursal[1] = $rt->fields[0] ; 
      $rt->fields[1] = str_replace(",", ".", $rt->fields[1]);
      $tot_sucursal[2] = (string)$rt->fields[1]; 
      $rt->fields[2] = str_replace(",", ".", $rt->fields[2]);
      $tot_sucursal[3] = (string)$rt->fields[2]; 
      $rt->Close(); 
   } 

   //-----  producto
   function quebra_producto_datesales_sucursal_cuentaventa_producto($fechatrans, $sucursal, $producto, $arg_sum_fechatrans, $arg_sum_sucursal, $arg_sum_producto) 
   {
      global $tot_producto, $cuentaventa;
      $tot_producto = array() ;  
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
      { 
          $nm_comando = "select count(*), sum(quantity), sum(valor_siniva) from " . $this->Ini->nm_tabela . " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_sales_detalleventa_matrix']['where_pesq']; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_comando = "select count(*), sum(quantity), sum(valor_siniva) from " . $this->Ini->nm_tabela . " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_sales_detalleventa_matrix']['where_pesq']; 
      } 
      else 
      { 
          $nm_comando = "select count(*), sum(quantity), sum(valor_siniva) from " . $this->Ini->nm_tabela . " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_sales_detalleventa_matrix']['where_pesq']; 
      } 
      if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_sales_detalleventa_matrix']['where_pesq'])) 
      { 
         $nm_comando .= " where " .  $this->Sc_groupby_fechatrans . $arg_sum_fechatrans . " and sucursal" . $arg_sum_sucursal . " and producto" . $arg_sum_producto ; 
      } 
      else 
      { 
         $nm_comando .= " and " .  $this->Sc_groupby_fechatrans . $arg_sum_fechatrans . " and sucursal" . $arg_sum_sucursal . " and producto" . $arg_sum_producto ; 
      } 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
      if (!$rt = $this->Db->Execute($nm_comando)) 
      { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
      }  
      $tot_producto[0] = sc_strip_script($producto) ; 
      $tot_producto[1] = $rt->fields[0] ; 
      $rt->fields[1] = str_replace(",", ".", $rt->fields[1]);
      $tot_producto[2] = (string)$rt->fields[1]; 
      $rt->fields[2] = str_replace(",", ".", $rt->fields[2]);
      $tot_producto[3] = (string)$rt->fields[2]; 
      $rt->Close(); 
   } 


   //----- 
   function Calc_resumo_sc_free_group_by($destino_resumo)
   {
      global $nm_lang, $cuentaventa;
      $this->nm_data = new nm_data("es");
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_sales_detalleventa_matrix']['sql_tot_res']);
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_sales_detalleventa_matrix']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_sales_detalleventa_matrix']['campos_busca']))
      { 
          $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_sales_detalleventa_matrix']['campos_busca'];
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
              $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->datesales = $Busca_temp['datesales']; 
          $tmp_pos = strpos($this->datesales, "##@@");
          if ($tmp_pos !== false && !is_array($this->datesales))
          {
              $this->datesales = substr($this->datesales, 0, $tmp_pos);
          }
          $this->datesales_2 = $Busca_temp['datesales_input_2']; 
          $this->sucursal = $Busca_temp['sucursal']; 
          $tmp_pos = strpos($this->sucursal, "##@@");
          if ($tmp_pos !== false && !is_array($this->sucursal))
          {
              $this->sucursal = substr($this->sucursal, 0, $tmp_pos);
          }
          $this->cuentaventa = $Busca_temp['cuentaventa']; 
          $tmp_pos = strpos($this->cuentaventa, "##@@");
          if ($tmp_pos !== false && !is_array($this->cuentaventa))
          {
              $this->cuentaventa = substr($this->cuentaventa, 0, $tmp_pos);
          }
      } 
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_sales_detalleventa_matrix']['where_pesq'];
      $ind_qb                = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_sales_detalleventa_matrix']['SC_Ind_Groupby'];
      $cmp_sql_def   = array('sucursal' => "sucursal",'cuentaventa' => "cuentaventa",'jugador' => "jugador",'visitante' => "visitante",'entrada' => "entrada",'comida' => "comida",'producto' => "producto",'codproducto' => "codproducto",'idcliente' => "idcliente",'datesales' => "datesales",'datesales_scgb_192' => "datesales",'datesales_scgb_203' => "datesales",'datesales_scgb_193' => "datesales",'datesales_scgb_195' => "datesales",'datesales_scgb_196' => "datesales",'datesales_scgb_197' => "datesales",'datesales_scgb_198' => "datesales",'datesales_scgb_199' => "datesales",'datesales_scgb_200' => "datesales",'datesales_scgb_201' => "datesales",'datesales_scgb_202' => "datesales",'datesales_scgb_204' => "datesales",'datesales_scgb_194' => "datesales");
      $cmps_quebra_atual = array();
      foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_sales_detalleventa_matrix']['SC_Gb_Free_cmp'] as $cmp => $resto)
      {
          $cmps_quebra_atual[] = $cmp;
      }
      $ult_cmp_quebra_atual = $cmps_quebra_atual[(count($cmps_quebra_atual) - 1)];
      $arr_tots = "";
      $join     = "";
      $group    = "";
      $i_group  = 1;
      $cmps_gb  = "";
      $cmps_gb1 = "";
      $cmps_gb2 = "";
      $cmps_gbS = array();
      $ind_cmps = 4;
      $ind_alias = "1";
      $cmp_dim   = array();
      $all_group = array();
      foreach ($cmps_quebra_atual as $cmp_gb)
      {
          $Format_tst = $this->Ini->Get_Gb_date_format($ind_qb, $cmp_gb);
          if (!empty($Format_tst))
          {
              $Str_arg_sum = $this->Ini->Get_date_arg_sum($cmp_gb, $Format_tst, $cmp_sql_def[$cmp_gb], false, true);
              $Str_arg_sql = ($Str_arg_sum == " is null") ? $cmp_sql_def[$cmp_gb] : $this->Ini->Get_sql_date_groupby($cmp_sql_def[$cmp_gb], $Format_tst);
          }
          else
          {
              $Str_arg_sql = "";
              $Str_arg_sum = $cmp_sql_def[$cmp_gb] . " *sc# SC." . $cmp_sql_def[$cmp_gb];
          }
          $cmp_dim[$cmp_gb] = $ind_cmps;
          $temp = explode(" and ", $Str_arg_sum);
          foreach ($temp as $cada_parte)
          {
              $temp1 = explode("*sc#", $cada_parte);
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $group .= (empty($group)) ? $i_group : "," . $i_group;
              }
              elseif (!in_array($Str_arg_sql . trim($temp1[0]), $all_group))
              {
                  $group .= (empty($group)) ? $Str_arg_sql . trim($temp1[0]) : "," . $Str_arg_sql . trim($temp1[0]);
                  $all_group[] = $Str_arg_sql . trim($temp1[0]);
              }
              $cmps_gb1 .= (empty($cmps_gb1)) ? $Str_arg_sql . trim($temp1[0]) : "," . $Str_arg_sql . trim($temp1[0]);
              $cmps_gb1 .= " as a_cmp_" .  $ind_alias;
              $cmps_gb2 .= (empty($cmps_gb2)) ? $Str_arg_sql . trim($temp1[0]) : "," . $Str_arg_sql . trim($temp1[0]);
              $cmps_gb2 .= " as b_cmp_" .  $ind_alias;
              $join     .= empty($join) ? "" : " and ";
              $join     .= " SC_sel1.a_cmp_" .  $ind_alias . " =  SC_sel2.b_cmp_" .  $ind_alias;
              $ind_cmps++;
              $ind_alias++;
              $i_group++;
          }
      }
      $ind_cmps  = 4;
      $ind_alias = "1";
      $cmp_dim   = array();
      foreach ($cmps_quebra_atual as $cmp_gb)
      {
          $arr_tots .= "[\$" . $cmp_gb . "_orig]";
          $Format_tst = $this->Ini->Get_Gb_date_format($ind_qb, $cmp_gb);
          if (!empty($Format_tst))
          {
              $Str_arg_sum = $this->Ini->Get_date_arg_sum($cmp_gb, $Format_tst, $cmp_sql_def[$cmp_gb], false, true);
              $Str_arg_sql = ($Str_arg_sum == " is null") ? $cmp_sql_def[$cmp_gb] : $this->Ini->Get_sql_date_groupby($cmp_sql_def[$cmp_gb], $Format_tst);
          }
          else
          {
              $Str_arg_sql = "";
              $Str_arg_sum = $cmp_sql_def[$cmp_gb] . " *sc# SC." . $cmp_sql_def[$cmp_gb];
          }
          $cmp_dim[$cmp_gb] = $ind_cmps;
          $temp = explode(" and ", $Str_arg_sum);
          foreach ($temp as $cada_parte)
          {
              $temp1 = explode("*sc#", $cada_parte);
              $cmps_gb  .= (empty($cmps_gb)) ? "a_cmp_" .  $ind_alias : "," . "a_cmp_" .  $ind_alias;
              $cmps_gbS['a_cmp_' . $ind_alias] = $Str_arg_sql . trim($temp1[0]);
              $ind_cmps++;
              $ind_alias++;
          }
          $this->Res_Totaliza_sc_free_group_by($ind_qb, $cmp_gb, $arr_tots, $group, $join, $cmps_gb, $cmps_gb1, $cmps_gb2, $cmps_gbS, $cmp_dim, $cmps_quebra_atual, $cmp_sql_def);
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_sales_detalleventa_matrix']['arr_total'] = array();
      foreach ($cmps_quebra_atual as $cmp_gb)
      {
          $Arr_tot_name = "array_total_" . $cmp_gb;
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_sales_detalleventa_matrix']['arr_total'][$cmp_gb] = $this->$Arr_tot_name;
      }
   }

   function Res_Totaliza_sc_free_group_by($ind_qb, $cmp_tot, $arr_tots, $group, $join, $cmps_quebras, $cmps_quebras1, $cmps_quebras2, $cmps_quebrasS, $Cmp_dim, $cmps_quebra_atual, $cmp_sql_def)
   {
      $sc_having = ((isset($parms_sub_sel['having']))) ? "  having " . $parms_sub_sel['having'] : "";
      $Tem_estat_manual = false;
      $where_ok = $this->sc_where_atual;
      $cmp_sql_tp_num = array('id_sales' => 'N','sales_price' => 'N','sales_discount' => 'N','total' => 'N','id_status' => 'N','idcaja' => 'N','factura' => 'N','enviosri' => 'N','estado' => 'N','importe_recibido' => 'N','totalsinimpuestos' => 'N','totaldescuento' => 'N','baseimponible' => 'N','valoriva' => 'N','importetotal' => 'N','idpago' => 'N','totalpago' => 'N','idturno' => 'N','imprime' => 'N','id_sales_detail' => 'N','unit_cost' => 'N','unit_value' => 'N','quantity' => 'N','discount' => 'N','item_total' => 'N','id_product' => 'N','valor_siniva' => 'N','valor_unitario' => 'N','entrada' => 'N','jugador' => 'N','visitante' => 'N','tarjeta' => 'N','tokens' => 'N','minutos' => 'N','comida' => 'N');
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
      { 
         $cmd_simp = "select count(*), sum(quantity), sum(item_total), sum(valor_siniva)#@#cmps_quebras#@# from " . $this->Ini->nm_tabela . " " . $where_ok;
         $comando  = "select count(*), sum(SC_metric1), sum(SC_metric2), sum(SC_metric3)#@#cmps_quebras#@# from (";
         $comando .= "select quantity as SC_metric1,item_total as SC_metric2,valor_siniva as SC_metric3, " . $cmps_quebras1 . " from " . $this->Ini->nm_tabela . " " .  $where_ok . ") SC_sel1 INNER JOIN (";
         $comando .= "select " . $cmps_quebras2 . " from " . $this->Ini->nm_tabela . " " .  $where_ok . " group by " . $group . $sc_having . ") SC_sel2 ";
         $comando .= " ON " . $join;
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
         $cmd_simp = "select count(*), sum(quantity), sum(item_total), sum(valor_siniva)#@#cmps_quebras#@# from " . $this->Ini->nm_tabela . " " . $where_ok;
         $comando  = "select count(*), sum(SC_metric1), sum(SC_metric2), sum(SC_metric3)#@#cmps_quebras#@# from (";
         $comando .= "select quantity as SC_metric1,item_total as SC_metric2,valor_siniva as SC_metric3, " . $cmps_quebras1 . " from " . $this->Ini->nm_tabela . " " .  $where_ok . ") SC_sel1 INNER JOIN (";
         $comando .= "select " . $cmps_quebras2 . " from " . $this->Ini->nm_tabela . " " .  $where_ok . " group by " . $group . $sc_having . ") SC_sel2 ";
         $comando .= " ON " . $join;
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
         $cmd_simp = "select count(*), sum(quantity), sum(item_total), sum(valor_siniva)#@#cmps_quebras#@# from " . $this->Ini->nm_tabela . " " . $where_ok;
         $comando  = "select count(*), sum(SC_metric1), sum(SC_metric2), sum(SC_metric3)#@#cmps_quebras#@# from (";
         $comando .= "select quantity as SC_metric1,item_total as SC_metric2,valor_siniva as SC_metric3, " . $cmps_quebras1 . " from " . $this->Ini->nm_tabela . " " .  $where_ok . ") SC_sel1 INNER JOIN (";
         $comando .= "select " . $cmps_quebras2 . " from " . $this->Ini->nm_tabela . " " .  $where_ok . " group by " . $group . $sc_having . ") SC_sel2 ";
         $comando .= " ON " . $join;
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
      { 
         $cmd_simp = "select count(*), sum(quantity), sum(item_total), sum(valor_siniva)#@#cmps_quebras#@# from " . $this->Ini->nm_tabela . " " . $where_ok;
         $comando  = "select count(*), sum(SC_metric1), sum(SC_metric2), sum(SC_metric3)#@#cmps_quebras#@# from (";
         $comando .= "select quantity as SC_metric1,item_total as SC_metric2,valor_siniva as SC_metric3, " . $cmps_quebras1 . " from " . $this->Ini->nm_tabela . " " .  $where_ok . ") SC_sel1 INNER JOIN (";
         $comando .= "select " . $cmps_quebras2 . " from " . $this->Ini->nm_tabela . " " .  $where_ok . " group by " . $group . $sc_having . ") SC_sel2 ";
         $comando .= " ON " . $join;
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
      { 
         $cmd_simp = "select count(*), sum(quantity), sum(item_total), sum(valor_siniva)#@#cmps_quebras#@# from " . $this->Ini->nm_tabela . " " . $where_ok;
         $comando  = "select count(*), sum(SC_metric1), sum(SC_metric2), sum(SC_metric3)#@#cmps_quebras#@# from (";
         $comando .= "select quantity as SC_metric1,item_total as SC_metric2,valor_siniva as SC_metric3, " . $cmps_quebras1 . " from " . $this->Ini->nm_tabela . " " .  $where_ok . ") SC_sel1 INNER JOIN (";
         $comando .= "select " . $cmps_quebras2 . " from " . $this->Ini->nm_tabela . " " .  $where_ok . " group by " . $group . $sc_having . ") SC_sel2 ";
         $comando .= " ON " . $join;
      } 
      else 
      { 
         $cmd_simp = "select count(*), sum(quantity), sum(item_total), sum(valor_siniva)#@#cmps_quebras#@# from " . $this->Ini->nm_tabela . " " . $where_ok;
         $comando  = "select count(*), sum(SC_metric1), sum(SC_metric2), sum(SC_metric3)#@#cmps_quebras#@# from (";
         $comando .= "select quantity as SC_metric1,item_total as SC_metric2,valor_siniva as SC_metric3, " . $cmps_quebras1 . " from " . $this->Ini->nm_tabela . " " .  $where_ok . ") SC_sel1 INNER JOIN (";
         $comando .= "select " . $cmps_quebras2 . " from " . $this->Ini->nm_tabela . " " .  $where_ok . " group by " . $group . $sc_having . ") SC_sel2 ";
         $comando .= " ON " . $join;
      } 
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_sales_detalleventa_matrix']['sql_tot_res']))
      {
         $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_sales_detalleventa_matrix']['sql_tot_res'] = str_replace("#@#cmps_quebras#@#", "", $comando);
      }
      $comando  = str_replace("#@#cmps_quebras#@#", "," . $cmps_quebras, $comando);
      $comando .= " group by " . $cmps_quebras . " order by " .  $cmps_quebras;
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_sales_detalleventa_matrix']['Res_search_metric_use']) || empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_sales_detalleventa_matrix']['Res_search_metric_use']))
      {
          $comando = $cmd_simp;
          $cmps_S  = "";
          foreach ($cmps_quebrasS as $alias => $sql)
          {
              $cmps_S .= empty($cmps_S) ? $sql : ", " . $sql;
          }
          $comando = str_replace("#@#cmps_quebras#@#", "," . $cmps_S, $comando);
          $order_group = "";
          foreach ($cmps_quebrasS as $alias => $cada_tst)
          {
              $cada_tst = trim($cada_tst);
              $pos = strpos(" " . $order_group, " " . $cada_tst);
              if ($pos === false)
              {
                  $order_group .= (!empty($order_group)) ? ", " . $cada_tst : $cada_tst;
              }
          }
          $comando .= " group by " . $order_group . " order by " .  $order_group;
      }
      $comando  = $this->Ajust_statistic($comando);
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $comando;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
      if (!$rt = $this->Db->Execute($comando))
      {
         $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit;
      }
      $format_dimensions = array();
      $format_dimensions['sucursal']['reg'] = "S";
      $format_dimensions['sucursal']['msk'] = "";
      $format_dimensions['cuentaventa']['reg'] = "S";
      $format_dimensions['cuentaventa']['msk'] = "";
      $format_dimensions['jugador']['reg'] = "S";
      $format_dimensions['jugador']['msk'] = "";
      $format_dimensions['visitante']['reg'] = "S";
      $format_dimensions['visitante']['msk'] = "";
      $format_dimensions['entrada']['reg'] = "S";
      $format_dimensions['entrada']['msk'] = "";
      $format_dimensions['comida']['reg'] = "S";
      $format_dimensions['comida']['msk'] = "";
      $format_dimensions['producto']['reg'] = "S";
      $format_dimensions['producto']['msk'] = "";
      $format_dimensions['codproducto']['reg'] = "S";
      $format_dimensions['codproducto']['msk'] = "";
      $format_dimensions['idcliente']['reg'] = "S";
      $format_dimensions['idcliente']['msk'] = "";
      $format_dimensions['datesales']['reg'] = "S";
      $format_dimensions['datesales']['msk'] = "";
      $format_dimensions['datesales_scgb_192']['reg'] = "S";
      $format_dimensions['datesales_scgb_192']['msk'] = "";
      $format_dimensions['datesales_scgb_203']['reg'] = "N";
      $format_dimensions['datesales_scgb_203']['msk'] = "F/Y";
      $format_dimensions['datesales_scgb_193']['reg'] = "S";
      $format_dimensions['datesales_scgb_193']['msk'] = "";
      $format_dimensions['datesales_scgb_195']['reg'] = "S";
      $format_dimensions['datesales_scgb_195']['msk'] = "";
      $format_dimensions['datesales_scgb_196']['reg'] = "S";
      $format_dimensions['datesales_scgb_196']['msk'] = "";
      $format_dimensions['datesales_scgb_197']['reg'] = "S";
      $format_dimensions['datesales_scgb_197']['msk'] = "";
      $format_dimensions['datesales_scgb_198']['reg'] = "S";
      $format_dimensions['datesales_scgb_198']['msk'] = "";
      $format_dimensions['datesales_scgb_199']['reg'] = "S";
      $format_dimensions['datesales_scgb_199']['msk'] = "";
      $format_dimensions['datesales_scgb_200']['reg'] = "S";
      $format_dimensions['datesales_scgb_200']['msk'] = "";
      $format_dimensions['datesales_scgb_201']['reg'] = "S";
      $format_dimensions['datesales_scgb_201']['msk'] = "";
      $format_dimensions['datesales_scgb_202']['reg'] = "S";
      $format_dimensions['datesales_scgb_202']['msk'] = "";
      $format_dimensions['datesales_scgb_204']['reg'] = "S";
      $format_dimensions['datesales_scgb_204']['msk'] = "";
      $format_dimensions['datesales_scgb_194']['reg'] = "N";
      $format_dimensions['datesales_scgb_194']['msk'] = "F";
      while (!$rt->EOF)
      {
          $sql_where = "";
          foreach ($Cmp_dim as $Cada_dim => $Ind_sql)
          {
              $prep_look  = $Cada_dim . "_SC_look";
              $$prep_look = $rt->fields[$Ind_sql];
              $SC_prep = $this->Ini->Get_format_dimension($Ind_sql, 'sc_free_group_by', $Cada_dim, $rt, $format_dimensions[$Cada_dim]['reg'], $format_dimensions[$Cada_dim]['msk']);
              $SC_orig = $Cada_dim . "_orig";
              $SC_graf = "val_grafico_" . $Cada_dim;
              $$Cada_dim = $SC_prep['fmt'];
              $$SC_orig = $SC_prep['orig'];
              if ($Cada_dim == "sucursal") {
              }
              if ($Cada_dim == "cuentaventa") {
                  $this->Lookup->lookup_sc_free_group_by_cuentaventa($$Cada_dim,  $cuentaventa);
              }
              if ($Cada_dim == "jugador") {
          nmgp_Form_Num_Val($$Cada_dim, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
              }
              if ($Cada_dim == "visitante") {
          nmgp_Form_Num_Val($$Cada_dim, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
              }
              if ($Cada_dim == "entrada") {
          nmgp_Form_Num_Val($$Cada_dim, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
              }
              if ($Cada_dim == "comida") {
          nmgp_Form_Num_Val($$Cada_dim, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
              }
              if ($Cada_dim == "producto") {
              }
              if ($Cada_dim == "codproducto") {
              }
              if ($Cada_dim == "idcliente") {
              }
              if (null === $$Cada_dim)
              {
                  $$Cada_dim = '';
              }
              if (null === $$SC_orig)
              {
                  $$SC_orig = '__SCNULL__';
              }
              $$SC_graf = $$Cada_dim;
              if ($Tem_estat_manual)
              {
                  $Format_tst = $this->Ini->Get_Gb_date_format($ind_qb, $Cada_dim);
                  if (!empty($Format_tst))
                  {
                      $val_sql  = $rt->fields[$Ind_sql];
                      if ($Format_tst == 'YYYYMMDDHHII')
                      {
                          $val_sql .= "-" . $rt->fields[$Ind_sql + 1] . "-" . $rt->fields[$Ind_sql + 2] . " " . $rt->fields[$Ind_sql + 3] . ":" . $rt->fields[$Ind_sql + 4];
                      }
                      if ($Format_tst == 'YYYYMMDDHH')
                      {
                          $val_sql .= "-" . $rt->fields[$Ind_sql + 1] . "-" . $rt->fields[$Ind_sql + 2] . " " . $rt->fields[$Ind_sql + 3];
                      }
                      if ($Format_tst == 'YYYYMMDD2')
                      {
                          $val_sql .= "-" . $rt->fields[$Ind_sql + 1] . "-" . $rt->fields[$Ind_sql + 2];
                      }
                      if ($Format_tst == 'YYYYMM')
                      {
                          $val_sql .= "-" . $rt->fields[$Ind_sql + 1];
                      }
                      if ($Format_tst == 'YYYYHH' || $Format_tst == 'YYYYDD' || $Format_tst == 'YYYYDAYNAME' || $Format_tst == 'YYYYWEEK' || $Format_tst == 'YYYYBIMONTHLY' || $Format_tst == 'YYYYQUARTER' || $Format_tst == 'YYYYFOURMONTHS' || $Format_tst == 'YYYYSEMIANNUAL')
                      {
                          $val_sql .= $rt->fields[$Ind_sql + 1];
                      }
                      if ($Format_tst == 'HHIISS')
                      {
                          $val_sql  = $rt->fields[$Ind_sql] . ":" . $rt->fields[$Ind_sql + 1] . ":" . $rt->fields[$Ind_sql + 2];
                      }
                      if ($Format_tst == 'HHII')
                      {
                          $val_sql  = $rt->fields[$Ind_sql] . ":" . $rt->fields[$Ind_sql + 1];
                      }
                      $Str_arg_sum = $this->Ini->Get_date_arg_sum($val_sql, $Format_tst, $cmp_sql_def[$Cada_dim], true);
                      $Str_arg_sql = ($Str_arg_sum == " is null") ? $cmp_sql_def[$Cada_dim] : $this->Ini->Get_sql_date_groupby($cmp_sql_def[$Cada_dim], $Format_tst);
                  }
                  elseif (isset($cmp_sql_tp_num[$Cada_dim]))
                  {
                      $Str_arg_sql = $cmp_sql_def[$Cada_dim];
                      $Str_arg_sum = " = " . $rt->fields[$Ind_sql];
                  }
                  else
                  {
                      $Str_arg_sql = $cmp_sql_def[$Cada_dim];
                      $Str_arg_sum = " = " . $this->Db->qstr($rt->fields[$Ind_sql]);
                  }
                  $sql_where .= (!empty($sql_where)) ? " and " : "";
                  $sql_where .= $Str_arg_sql . $Str_arg_sum;
              }
          }
          if ($Tem_estat_manual)
          {
              $where_ok = (empty($this->sc_where_atual)) ? " where " . $sql_where : $this->sc_where_atual . " and " . $sql_where;
              $vl_statistic = $this->Calc_statist_manual_sc_free_group_by($where_ok);
              foreach ($vl_statistic as $ind => $val)
              {
                  $rt->fields[$ind] = $val;
              }
          }
          $rt->fields[1] = str_replace(",", ".", $rt->fields[1]);
          $rt->fields[1] = (strpos(strtolower($rt->fields[1]), "e")) ? (float)$rt->fields[1] : $rt->fields[1]; 
          $rt->fields[1] = (string)$rt->fields[1];
          if ($rt->fields[1] == "") 
          {
              $rt->fields[1] = 0;
          }
          if (substr($rt->fields[1], 0, 1) == ".") 
          {
              $rt->fields[1] = "0" . $rt->fields[1];
          }
          if (substr($rt->fields[1], 0, 2) == "-.") 
          {
              $rt->fields[1] = "-0" . substr($rt->fields[1], 1);
          }
          nmgp_Trunc_Num($rt->fields[1], 0);
          $rt->fields[2] = str_replace(",", ".", $rt->fields[2]);
          $rt->fields[2] = (strpos(strtolower($rt->fields[2]), "e")) ? (float)$rt->fields[2] : $rt->fields[2]; 
          $rt->fields[2] = (string)$rt->fields[2];
          if ($rt->fields[2] == "") 
          {
              $rt->fields[2] = 0;
          }
          if (substr($rt->fields[2], 0, 1) == ".") 
          {
              $rt->fields[2] = "0" . $rt->fields[2];
          }
          if (substr($rt->fields[2], 0, 2) == "-.") 
          {
              $rt->fields[2] = "-0" . substr($rt->fields[2], 1);
          }
          nmgp_Trunc_Num($rt->fields[2], 2);
          $rt->fields[3] = str_replace(",", ".", $rt->fields[3]);
          $rt->fields[3] = (strpos(strtolower($rt->fields[3]), "e")) ? (float)$rt->fields[3] : $rt->fields[3]; 
          $rt->fields[3] = (string)$rt->fields[3];
          if ($rt->fields[3] == "") 
          {
              $rt->fields[3] = 0;
          }
          if (substr($rt->fields[3], 0, 1) == ".") 
          {
              $rt->fields[3] = "0" . $rt->fields[3];
          }
          if (substr($rt->fields[3], 0, 2) == "-.") 
          {
              $rt->fields[3] = "-0" . substr($rt->fields[3], 1);
          }
          nmgp_Trunc_Num($rt->fields[3], 4);
          $str_tot = "array_total_" . $cmp_tot;
          if (!isset($this->$str_tot))
          {
              $this->$str_tot = array();
          }
          $str_tot = "array_total_" . $cmp_tot . $arr_tots . "[0]";
          eval ('$this->' . $str_tot . ' = ' . $rt->fields[0] . ';');
          $str_tot = "array_total_" . $cmp_tot . $arr_tots . "[3]";
          eval('$this->' . $str_tot . ' = ' . $rt->fields[1] . ';');
          $str_tot = "array_total_" . $cmp_tot . $arr_tots . "[2]";
          eval('$this->' . $str_tot . ' = ' . $rt->fields[2] . ';');
          $str_tot = "array_total_" . $cmp_tot . $arr_tots . "[1]";
          eval('$this->' . $str_tot . ' = ' . $rt->fields[3] . ';');
          $str_grf = "val_grafico_" . $cmp_tot;
          $str_tot = "array_total_" . $cmp_tot . $arr_tots . "[4]";
          eval ('$this->' . $str_tot . ' = $' . $str_grf . ';');
          $str_tot = "array_total_" . $cmp_tot . $arr_tots . "[5]";
          $str_org = $cmp_tot . "_orig";
          eval ('$this->' . $str_tot . ' = $' . $str_org . ';');
          eval ('ksort($this->array_total_' . $cmp_tot . $arr_tots . ');');
          $rt->MoveNext();
      }
      $rt->Close();
   }

   //----- 
   function Calc_resumo_datesales_sucursal_cuentaventa_producto($destino_resumo)
   {
      global $nm_lang, $cuentaventa;
      $this->nm_data = new nm_data("es");
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_sales_detalleventa_matrix']['sql_tot_res']);
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_sales_detalleventa_matrix']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_sales_detalleventa_matrix']['campos_busca']))
      { 
          $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_sales_detalleventa_matrix']['campos_busca'];
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
              $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->datesales = $Busca_temp['datesales']; 
          $tmp_pos = strpos($this->datesales, "##@@");
          if ($tmp_pos !== false && !is_array($this->datesales))
          {
              $this->datesales = substr($this->datesales, 0, $tmp_pos);
          }
          $this->datesales_2 = $Busca_temp['datesales_input_2']; 
          $this->sucursal = $Busca_temp['sucursal']; 
          $tmp_pos = strpos($this->sucursal, "##@@");
          if ($tmp_pos !== false && !is_array($this->sucursal))
          {
              $this->sucursal = substr($this->sucursal, 0, $tmp_pos);
          }
          $this->cuentaventa = $Busca_temp['cuentaventa']; 
          $tmp_pos = strpos($this->cuentaventa, "##@@");
          if ($tmp_pos !== false && !is_array($this->cuentaventa))
          {
              $this->cuentaventa = substr($this->cuentaventa, 0, $tmp_pos);
          }
      } 
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_sales_detalleventa_matrix']['where_pesq'];
      $ind_qb                = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_sales_detalleventa_matrix']['SC_Ind_Groupby'];
      $cmp_sql_def   = array('fechatrans' => "fechatrans",'sucursal' => "sucursal",'producto' => "producto");
      $cmps_quebra_atual = array("fechatrans","sucursal","producto");
      $ult_cmp_quebra_atual = $cmps_quebra_atual[(count($cmps_quebra_atual) - 1)];
      $arr_tots = "";
      $join     = "";
      $group    = "";
      $i_group  = 1;
      $cmps_gb  = "";
      $cmps_gb1 = "";
      $cmps_gb2 = "";
      $cmps_gbS = array();
      $ind_cmps = 3;
      $ind_alias = "1";
      $cmp_dim   = array();
      $all_group = array();
      foreach ($cmps_quebra_atual as $cmp_gb)
      {
          $Format_tst = $this->Ini->Get_Gb_date_format($ind_qb, $cmp_gb);
          if (!empty($Format_tst))
          {
              $Str_arg_sum = $this->Ini->Get_date_arg_sum($cmp_gb, $Format_tst, $cmp_sql_def[$cmp_gb], false, true);
              $Str_arg_sql = ($Str_arg_sum == " is null") ? $cmp_sql_def[$cmp_gb] : $this->Ini->Get_sql_date_groupby($cmp_sql_def[$cmp_gb], $Format_tst);
          }
          else
          {
              $Str_arg_sql = "";
              $Str_arg_sum = $cmp_sql_def[$cmp_gb] . " *sc# SC." . $cmp_sql_def[$cmp_gb];
          }
          $cmp_dim[$cmp_gb] = $ind_cmps;
          $temp = explode(" and ", $Str_arg_sum);
          foreach ($temp as $cada_parte)
          {
              $temp1 = explode("*sc#", $cada_parte);
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $group .= (empty($group)) ? $i_group : "," . $i_group;
              }
              elseif (!in_array($Str_arg_sql . trim($temp1[0]), $all_group))
              {
                  $group .= (empty($group)) ? $Str_arg_sql . trim($temp1[0]) : "," . $Str_arg_sql . trim($temp1[0]);
                  $all_group[] = $Str_arg_sql . trim($temp1[0]);
              }
              $cmps_gb1 .= (empty($cmps_gb1)) ? $Str_arg_sql . trim($temp1[0]) : "," . $Str_arg_sql . trim($temp1[0]);
              $cmps_gb1 .= " as a_cmp_" .  $ind_alias;
              $cmps_gb2 .= (empty($cmps_gb2)) ? $Str_arg_sql . trim($temp1[0]) : "," . $Str_arg_sql . trim($temp1[0]);
              $cmps_gb2 .= " as b_cmp_" .  $ind_alias;
              $join     .= empty($join) ? "" : " and ";
              $join     .= " SC_sel1.a_cmp_" .  $ind_alias . " =  SC_sel2.b_cmp_" .  $ind_alias;
              $ind_cmps++;
              $ind_alias++;
              $i_group++;
          }
      }
      $ind_cmps  = 3;
      $ind_alias = "1";
      $cmp_dim   = array();
      foreach ($cmps_quebra_atual as $cmp_gb)
      {
          $arr_tots .= "[\$" . $cmp_gb . "_orig]";
          $Format_tst = $this->Ini->Get_Gb_date_format($ind_qb, $cmp_gb);
          if (!empty($Format_tst))
          {
              $Str_arg_sum = $this->Ini->Get_date_arg_sum($cmp_gb, $Format_tst, $cmp_sql_def[$cmp_gb], false, true);
              $Str_arg_sql = ($Str_arg_sum == " is null") ? $cmp_sql_def[$cmp_gb] : $this->Ini->Get_sql_date_groupby($cmp_sql_def[$cmp_gb], $Format_tst);
          }
          else
          {
              $Str_arg_sql = "";
              $Str_arg_sum = $cmp_sql_def[$cmp_gb] . " *sc# SC." . $cmp_sql_def[$cmp_gb];
          }
          $cmp_dim[$cmp_gb] = $ind_cmps;
          $temp = explode(" and ", $Str_arg_sum);
          foreach ($temp as $cada_parte)
          {
              $temp1 = explode("*sc#", $cada_parte);
              $cmps_gb  .= (empty($cmps_gb)) ? "a_cmp_" .  $ind_alias : "," . "a_cmp_" .  $ind_alias;
              $cmps_gbS['a_cmp_' . $ind_alias] = $Str_arg_sql . trim($temp1[0]);
              $ind_cmps++;
              $ind_alias++;
          }
          $this->Res_Totaliza_datesales_sucursal_cuentaventa_producto($ind_qb, $cmp_gb, $arr_tots, $group, $join, $cmps_gb, $cmps_gb1, $cmps_gb2, $cmps_gbS, $cmp_dim, $cmps_quebra_atual, $cmp_sql_def);
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_sales_detalleventa_matrix']['arr_total'] = array();
      foreach ($cmps_quebra_atual as $cmp_gb)
      {
          $Arr_tot_name = "array_total_" . $cmp_gb;
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_sales_detalleventa_matrix']['arr_total'][$cmp_gb] = $this->$Arr_tot_name;
      }
   }

   function Res_Totaliza_datesales_sucursal_cuentaventa_producto($ind_qb, $cmp_tot, $arr_tots, $group, $join, $cmps_quebras, $cmps_quebras1, $cmps_quebras2, $cmps_quebrasS, $Cmp_dim, $cmps_quebra_atual, $cmp_sql_def)
   {
      $sc_having = ((isset($parms_sub_sel['having']))) ? "  having " . $parms_sub_sel['having'] : "";
      $Tem_estat_manual = false;
      $where_ok = $this->sc_where_atual;
      $cmp_sql_tp_num = array('id_sales' => 'N','sales_price' => 'N','sales_discount' => 'N','total' => 'N','id_status' => 'N','idcaja' => 'N','factura' => 'N','enviosri' => 'N','estado' => 'N','importe_recibido' => 'N','totalsinimpuestos' => 'N','totaldescuento' => 'N','baseimponible' => 'N','valoriva' => 'N','importetotal' => 'N','idpago' => 'N','totalpago' => 'N','idturno' => 'N','imprime' => 'N','id_sales_detail' => 'N','unit_cost' => 'N','unit_value' => 'N','quantity' => 'N','discount' => 'N','item_total' => 'N','id_product' => 'N','valor_siniva' => 'N','valor_unitario' => 'N','entrada' => 'N','jugador' => 'N','visitante' => 'N','tarjeta' => 'N','tokens' => 'N','minutos' => 'N','comida' => 'N');
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
      { 
         $cmd_simp = "select count(*), sum(quantity), sum(valor_siniva)#@#cmps_quebras#@# from " . $this->Ini->nm_tabela . " " . $where_ok;
         $comando  = "select count(*), sum(SC_metric1), sum(SC_metric2)#@#cmps_quebras#@# from (";
         $comando .= "select quantity as SC_metric1,valor_siniva as SC_metric2, " . $cmps_quebras1 . " from " . $this->Ini->nm_tabela . " " .  $where_ok . ") SC_sel1 INNER JOIN (";
         $comando .= "select " . $cmps_quebras2 . " from " . $this->Ini->nm_tabela . " " .  $where_ok . " group by " . $group . $sc_having . ") SC_sel2 ";
         $comando .= " ON " . $join;
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
         $cmd_simp = "select count(*), sum(quantity), sum(valor_siniva)#@#cmps_quebras#@# from " . $this->Ini->nm_tabela . " " . $where_ok;
         $comando  = "select count(*), sum(SC_metric1), sum(SC_metric2)#@#cmps_quebras#@# from (";
         $comando .= "select quantity as SC_metric1,valor_siniva as SC_metric2, " . $cmps_quebras1 . " from " . $this->Ini->nm_tabela . " " .  $where_ok . ") SC_sel1 INNER JOIN (";
         $comando .= "select " . $cmps_quebras2 . " from " . $this->Ini->nm_tabela . " " .  $where_ok . " group by " . $group . $sc_having . ") SC_sel2 ";
         $comando .= " ON " . $join;
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
         $cmd_simp = "select count(*), sum(quantity), sum(valor_siniva)#@#cmps_quebras#@# from " . $this->Ini->nm_tabela . " " . $where_ok;
         $comando  = "select count(*), sum(SC_metric1), sum(SC_metric2)#@#cmps_quebras#@# from (";
         $comando .= "select quantity as SC_metric1,valor_siniva as SC_metric2, " . $cmps_quebras1 . " from " . $this->Ini->nm_tabela . " " .  $where_ok . ") SC_sel1 INNER JOIN (";
         $comando .= "select " . $cmps_quebras2 . " from " . $this->Ini->nm_tabela . " " .  $where_ok . " group by " . $group . $sc_having . ") SC_sel2 ";
         $comando .= " ON " . $join;
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
      { 
         $cmd_simp = "select count(*), sum(quantity), sum(valor_siniva)#@#cmps_quebras#@# from " . $this->Ini->nm_tabela . " " . $where_ok;
         $comando  = "select count(*), sum(SC_metric1), sum(SC_metric2)#@#cmps_quebras#@# from (";
         $comando .= "select quantity as SC_metric1,valor_siniva as SC_metric2, " . $cmps_quebras1 . " from " . $this->Ini->nm_tabela . " " .  $where_ok . ") SC_sel1 INNER JOIN (";
         $comando .= "select " . $cmps_quebras2 . " from " . $this->Ini->nm_tabela . " " .  $where_ok . " group by " . $group . $sc_having . ") SC_sel2 ";
         $comando .= " ON " . $join;
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
      { 
         $cmd_simp = "select count(*), sum(quantity), sum(valor_siniva)#@#cmps_quebras#@# from " . $this->Ini->nm_tabela . " " . $where_ok;
         $comando  = "select count(*), sum(SC_metric1), sum(SC_metric2)#@#cmps_quebras#@# from (";
         $comando .= "select quantity as SC_metric1,valor_siniva as SC_metric2, " . $cmps_quebras1 . " from " . $this->Ini->nm_tabela . " " .  $where_ok . ") SC_sel1 INNER JOIN (";
         $comando .= "select " . $cmps_quebras2 . " from " . $this->Ini->nm_tabela . " " .  $where_ok . " group by " . $group . $sc_having . ") SC_sel2 ";
         $comando .= " ON " . $join;
      } 
      else 
      { 
         $cmd_simp = "select count(*), sum(quantity), sum(valor_siniva)#@#cmps_quebras#@# from " . $this->Ini->nm_tabela . " " . $where_ok;
         $comando  = "select count(*), sum(SC_metric1), sum(SC_metric2)#@#cmps_quebras#@# from (";
         $comando .= "select quantity as SC_metric1,valor_siniva as SC_metric2, " . $cmps_quebras1 . " from " . $this->Ini->nm_tabela . " " .  $where_ok . ") SC_sel1 INNER JOIN (";
         $comando .= "select " . $cmps_quebras2 . " from " . $this->Ini->nm_tabela . " " .  $where_ok . " group by " . $group . $sc_having . ") SC_sel2 ";
         $comando .= " ON " . $join;
      } 
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_sales_detalleventa_matrix']['sql_tot_res']))
      {
         $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_sales_detalleventa_matrix']['sql_tot_res'] = str_replace("#@#cmps_quebras#@#", "", $comando);
      }
      $comando  = str_replace("#@#cmps_quebras#@#", "," . $cmps_quebras, $comando);
      $comando .= " group by " . $cmps_quebras . " order by " .  $cmps_quebras;
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_sales_detalleventa_matrix']['Res_search_metric_use']) || empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_sales_detalleventa_matrix']['Res_search_metric_use']))
      {
          $comando = $cmd_simp;
          $cmps_S  = "";
          foreach ($cmps_quebrasS as $alias => $sql)
          {
              $cmps_S .= empty($cmps_S) ? $sql : ", " . $sql;
          }
          $comando = str_replace("#@#cmps_quebras#@#", "," . $cmps_S, $comando);
          $order_group = "";
          foreach ($cmps_quebrasS as $alias => $cada_tst)
          {
              $cada_tst = trim($cada_tst);
              $pos = strpos(" " . $order_group, " " . $cada_tst);
              if ($pos === false)
              {
                  $order_group .= (!empty($order_group)) ? ", " . $cada_tst : $cada_tst;
              }
          }
          $comando .= " group by " . $order_group . " order by " .  $order_group;
      }
      $comando  = $this->Ajust_statistic($comando);
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $comando;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
      if (!$rt = $this->Db->Execute($comando))
      {
         $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit;
      }
      $format_dimensions = array();
      $format_dimensions['fechatrans']['reg'] = "S";
      $format_dimensions['fechatrans']['msk'] = "";
      $format_dimensions['sucursal']['reg'] = "S";
      $format_dimensions['sucursal']['msk'] = "";
      $format_dimensions['producto']['reg'] = "S";
      $format_dimensions['producto']['msk'] = "";
      while (!$rt->EOF)
      {
          $sql_where = "";
          foreach ($Cmp_dim as $Cada_dim => $Ind_sql)
          {
              $prep_look  = $Cada_dim . "_SC_look";
              $$prep_look = $rt->fields[$Ind_sql];
              $SC_prep = $this->Ini->Get_format_dimension($Ind_sql, 'datesales_sucursal_cuentaventa_producto', $Cada_dim, $rt, $format_dimensions[$Cada_dim]['reg'], $format_dimensions[$Cada_dim]['msk']);
              $SC_orig = $Cada_dim . "_orig";
              $SC_graf = "val_grafico_" . $Cada_dim;
              $$Cada_dim = $SC_prep['fmt'];
              $$SC_orig = $SC_prep['orig'];
              if ($Cada_dim == "sucursal") {
              }
              if ($Cada_dim == "producto") {
              }
              if (null === $$Cada_dim)
              {
                  $$Cada_dim = '';
              }
              if (null === $$SC_orig)
              {
                  $$SC_orig = '__SCNULL__';
              }
              $$SC_graf = $$Cada_dim;
              if ($Tem_estat_manual)
              {
                  $Format_tst = $this->Ini->Get_Gb_date_format($ind_qb, $Cada_dim);
                  if (!empty($Format_tst))
                  {
                      $val_sql  = $rt->fields[$Ind_sql];
                      if ($Format_tst == 'YYYYMMDDHHII')
                      {
                          $val_sql .= "-" . $rt->fields[$Ind_sql + 1] . "-" . $rt->fields[$Ind_sql + 2] . " " . $rt->fields[$Ind_sql + 3] . ":" . $rt->fields[$Ind_sql + 4];
                      }
                      if ($Format_tst == 'YYYYMMDDHH')
                      {
                          $val_sql .= "-" . $rt->fields[$Ind_sql + 1] . "-" . $rt->fields[$Ind_sql + 2] . " " . $rt->fields[$Ind_sql + 3];
                      }
                      if ($Format_tst == 'YYYYMMDD2')
                      {
                          $val_sql .= "-" . $rt->fields[$Ind_sql + 1] . "-" . $rt->fields[$Ind_sql + 2];
                      }
                      if ($Format_tst == 'YYYYMM')
                      {
                          $val_sql .= "-" . $rt->fields[$Ind_sql + 1];
                      }
                      if ($Format_tst == 'YYYYHH' || $Format_tst == 'YYYYDD' || $Format_tst == 'YYYYDAYNAME' || $Format_tst == 'YYYYWEEK' || $Format_tst == 'YYYYBIMONTHLY' || $Format_tst == 'YYYYQUARTER' || $Format_tst == 'YYYYFOURMONTHS' || $Format_tst == 'YYYYSEMIANNUAL')
                      {
                          $val_sql .= $rt->fields[$Ind_sql + 1];
                      }
                      if ($Format_tst == 'HHIISS')
                      {
                          $val_sql  = $rt->fields[$Ind_sql] . ":" . $rt->fields[$Ind_sql + 1] . ":" . $rt->fields[$Ind_sql + 2];
                      }
                      if ($Format_tst == 'HHII')
                      {
                          $val_sql  = $rt->fields[$Ind_sql] . ":" . $rt->fields[$Ind_sql + 1];
                      }
                      $Str_arg_sum = $this->Ini->Get_date_arg_sum($val_sql, $Format_tst, $cmp_sql_def[$Cada_dim], true);
                      $Str_arg_sql = ($Str_arg_sum == " is null") ? $cmp_sql_def[$Cada_dim] : $this->Ini->Get_sql_date_groupby($cmp_sql_def[$Cada_dim], $Format_tst);
                  }
                  elseif (isset($cmp_sql_tp_num[$Cada_dim]))
                  {
                      $Str_arg_sql = $cmp_sql_def[$Cada_dim];
                      $Str_arg_sum = " = " . $rt->fields[$Ind_sql];
                  }
                  else
                  {
                      $Str_arg_sql = $cmp_sql_def[$Cada_dim];
                      $Str_arg_sum = " = " . $this->Db->qstr($rt->fields[$Ind_sql]);
                  }
                  $sql_where .= (!empty($sql_where)) ? " and " : "";
                  $sql_where .= $Str_arg_sql . $Str_arg_sum;
              }
          }
          if ($Tem_estat_manual)
          {
              $where_ok = (empty($this->sc_where_atual)) ? " where " . $sql_where : $this->sc_where_atual . " and " . $sql_where;
              $vl_statistic = $this->Calc_statist_manual_datesales_sucursal_cuentaventa_producto($where_ok);
              foreach ($vl_statistic as $ind => $val)
              {
                  $rt->fields[$ind] = $val;
              }
          }
          $rt->fields[1] = str_replace(",", ".", $rt->fields[1]);
          $rt->fields[1] = (strpos(strtolower($rt->fields[1]), "e")) ? (float)$rt->fields[1] : $rt->fields[1]; 
          $rt->fields[1] = (string)$rt->fields[1];
          if ($rt->fields[1] == "") 
          {
              $rt->fields[1] = 0;
          }
          if (substr($rt->fields[1], 0, 1) == ".") 
          {
              $rt->fields[1] = "0" . $rt->fields[1];
          }
          if (substr($rt->fields[1], 0, 2) == "-.") 
          {
              $rt->fields[1] = "-0" . substr($rt->fields[1], 1);
          }
          nmgp_Trunc_Num($rt->fields[1], 0);
          $rt->fields[2] = str_replace(",", ".", $rt->fields[2]);
          $rt->fields[2] = (strpos(strtolower($rt->fields[2]), "e")) ? (float)$rt->fields[2] : $rt->fields[2]; 
          $rt->fields[2] = (string)$rt->fields[2];
          if ($rt->fields[2] == "") 
          {
              $rt->fields[2] = 0;
          }
          if (substr($rt->fields[2], 0, 1) == ".") 
          {
              $rt->fields[2] = "0" . $rt->fields[2];
          }
          if (substr($rt->fields[2], 0, 2) == "-.") 
          {
              $rt->fields[2] = "-0" . substr($rt->fields[2], 1);
          }
          nmgp_Trunc_Num($rt->fields[2], 2);
          $str_tot = "array_total_" . $cmp_tot;
          if (!isset($this->$str_tot))
          {
              $this->$str_tot = array();
          }
          $str_tot = "array_total_" . $cmp_tot . $arr_tots . "[0]";
          eval ('$this->' . $str_tot . ' = ' . $rt->fields[0] . ';');
          $str_tot = "array_total_" . $cmp_tot . $arr_tots . "[1]";
          eval('$this->' . $str_tot . ' = ' . $rt->fields[1] . ';');
          $str_tot = "array_total_" . $cmp_tot . $arr_tots . "[2]";
          eval('$this->' . $str_tot . ' = ' . $rt->fields[2] . ';');
          $str_grf = "val_grafico_" . $cmp_tot;
          $str_tot = "array_total_" . $cmp_tot . $arr_tots . "[3]";
          eval ('$this->' . $str_tot . ' = $' . $str_grf . ';');
          $str_tot = "array_total_" . $cmp_tot . $arr_tots . "[4]";
          $str_org = $cmp_tot . "_orig";
          eval ('$this->' . $str_tot . ' = $' . $str_org . ';');
          eval ('ksort($this->array_total_' . $cmp_tot . $arr_tots . ');');
          $rt->MoveNext();
      }
      $rt->Close();
   }
   function Ajust_statistic($comando)
   {
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_vfp) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_odbc))
      {
          $comando = str_replace(array('count(distinct ','varp(','stdevp(','variance(','stddev('), array('sum(','sum(','sum(','sum(','sum('), $comando);
      }
      if ($this->Ini->nm_tp_variance == "P")
      {
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          { 
              $comando = str_replace(array('count(distinct ','varp(','stdevp('), array('count(','var(','stdev('), $comando);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite) && $this->Ini->sqlite_version == "old")
          {
              $comando = str_replace(array('variance(','stddev('), array('sum(','sum('), $comando);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase) && $this->Ini->Ibase_version == "old")
          {
              $comando = str_replace(array('variance(','stddev('), array('sum(','sum('), $comando);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
          {
              $comando = str_replace(array('variance(','stddev('), array('var_pop(','stddev_pop('), $comando);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
          {
                  $comando = str_replace(array('variance(','stddev('), array('var_pop(','stddev_pop('), $comando);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          {
              $comando = str_replace(array('variance(','stddev('), array('sum(','sum('), $comando);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
          {
              $comando = str_replace(array('variance(','stddev('), array('var_pop(','stddev_pop('), $comando);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $comando = str_replace(array('variance(','stddev('), array('var_pop(','stddev_pop('), $comando);
          }
      }
      if ($this->Ini->nm_tp_variance == "A")
      {
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          { 
              $comando = str_replace(array('count(distinct ','varp(','stdevp('), array('count(','var(','stdev('), $comando);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite) && $this->Ini->sqlite_version == "old")
          {
              $comando = str_replace(array('variance(','stddev('), array('sum(','sum('), $comando);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $comando = str_replace(array('variance(','stddev('), array('var_samp(','stddev_samp('), $comando);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
          {
              $comando = str_replace(array('variance(','stddev('), array('var_samp(','stddev_samp('), $comando);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase) && $this->Ini->Ibase_version == "old")
          {
              $comando = str_replace(array('variance(','stddev('), array('sum(','sum('), $comando);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
          {
                  $comando = str_replace(array('variance(','stddev('), array('var_samp(','stddev_samp('), $comando);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $comando = str_replace(array('variance(','stddev('), array('var_samp(','stddev_samp('), $comando);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          { 
              $comando = str_replace(array('varp(','stdevp('), array('var(','stdev('), $comando);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          {
              $comando = str_replace('stddev(', 'stdev(', $comando);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
          {
              $comando = str_replace(array('variance(','stddev('), array('variance_samp(','stddev_samp('), $comando);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
          {
              $comando = str_replace(array('variance(','stddev('), array('var_samp(','stddev_samp('), $comando);
          }
      }
      return $comando;
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
