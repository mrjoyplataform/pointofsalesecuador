<?php
class grid_turnos_reporte_lookup
{
//  
   function lookup_idempleado(&$conteudo , $idempleado) 
   {   
      static $save_conteudo = "" ; 
      static $save_conteudo1 = "" ; 
      $tst_cache = $idempleado; 
      if ($tst_cache === $save_conteudo && $conteudo != "&nbsp;") 
      { 
          $conteudo = $save_conteudo1 ; 
          return ; 
      } 
      $save_conteudo = $tst_cache ; 
      $nm_comando = "select nombre from empleados where idempleado = '" . substr($this->Db->qstr($idempleado), 1 , -1) . "' order by nombre" ; 
      $conteudo = "" ; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rx = $this->Db->Execute($nm_comando)) 
      { 
          if (isset($rx->fields[0]))  
          { 
              $conteudo = trim($rx->fields[0]); 
          } 
          $save_conteudo1 = $conteudo ; 
          $rx->Close(); 
      } 
      elseif ($GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
          exit; 
      } 
      if ($conteudo === "") 
      { 
          $conteudo = "&nbsp;";
          $save_conteudo1 = $conteudo ; 
      } 
   }  
//  
   function lookup_estado(&$estado) 
   {
      $conteudo = "" ; 
      if ($estado == "1")
      { 
          $conteudo = "Cerrada";
      } 
      if ($estado == "0")
      { 
          $conteudo = "Abierta";
      } 
      if (!empty($conteudo)) 
      { 
          $estado = $conteudo; 
      } 
   }  
//  
   function lookup_sc_free_group_by_idempleado(&$conteudo , $idempleado) 
   {   
      static $save_conteudo = "" ; 
      static $save_conteudo1 = "" ; 
      $tst_cache = $idempleado; 
      if ($tst_cache === $save_conteudo && $conteudo != "&nbsp;") 
      { 
          $conteudo = $save_conteudo1 ; 
          return ; 
      } 
      $save_conteudo = $tst_cache ; 
      $nm_comando = "select nombre from empleados where idempleado = '" . substr($this->Db->qstr($idempleado), 1 , -1) . "' order by nombre" ; 
      $conteudo = "" ; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rx = $this->Db->Execute($nm_comando)) 
      { 
          if (isset($rx->fields[0]))  
          { 
              $conteudo = trim($rx->fields[0]); 
          } 
          $save_conteudo1 = $conteudo ; 
          $rx->Close(); 
      } 
      elseif ($GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
          exit; 
      } 
      if ($conteudo === "") 
      { 
          $conteudo = "&nbsp;";
          $save_conteudo1 = $conteudo ; 
      } 
   }  
//  
   function lookup_sc_free_group_by_estado(&$estado) 
   {
      $conteudo = "" ; 
      if ($estado == "1")
      { 
          $conteudo = "Cerrada";
      } 
      if ($estado == "0")
      { 
          $conteudo = "Abierta";
      } 
      if (!empty($conteudo)) 
      { 
          $estado = $conteudo; 
      } 
   }  
}
?>
