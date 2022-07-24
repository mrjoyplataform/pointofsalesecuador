<?php
class grid_view_boletos_pendientes_salida_lookup
{
//  
   function lookup_idproducto(&$conteudo , $idproducto) 
   {   
      static $save_conteudo = "" ; 
      static $save_conteudo1 = "" ; 
      $tst_cache = $idproducto; 
      if ($tst_cache === $save_conteudo && $conteudo != "&nbsp;") 
      { 
          $conteudo = $save_conteudo1 ; 
          return ; 
      } 
      $save_conteudo = $tst_cache ; 
      if (trim($idproducto) === "" || trim($idproducto) == "&nbsp;")
      { 
          $conteudo = "&nbsp;";
          $save_conteudo  = ""; 
          $save_conteudo1 = ""; 
          return ; 
      } 
      $nm_comando = "select product_name from product where id_product = $idproducto order by product_name" ; 
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
          $conteudo = "SOLO ENTRADA REGISTRADA";
      } 
      if ($estado == "2")
      { 
          $conteudo = "SALIDA REGISTRADA";
      } 
      if ($estado == "0")
      { 
          $conteudo = "SIN REGISTRO DE ENTRADA";
      } 
      if (!empty($conteudo)) 
      { 
          $estado .= " - " . $conteudo ; 
      } 
   }  
//  
   function lookup_sc_free_group_by_idproducto(&$conteudo , $idproducto) 
   {   
      static $save_conteudo = "" ; 
      static $save_conteudo1 = "" ; 
      $tst_cache = $idproducto; 
      if ($tst_cache === $save_conteudo && $conteudo != "&nbsp;") 
      { 
          $conteudo = $save_conteudo1 ; 
          return ; 
      } 
      $save_conteudo = $tst_cache ; 
      if (trim($idproducto) === "" || trim($idproducto) == "&nbsp;")
      { 
          $conteudo = "&nbsp;";
          $save_conteudo  = ""; 
          $save_conteudo1 = ""; 
          return ; 
      } 
      $nm_comando = "select product_name from product where id_product = $idproducto order by product_name" ; 
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
          $conteudo = "SOLO ENTRADA REGISTRADA";
      } 
      if ($estado == "2")
      { 
          $conteudo = "SALIDA REGISTRADA";
      } 
      if ($estado == "0")
      { 
          $conteudo = "SIN REGISTRO DE ENTRADA";
      } 
      if (!empty($conteudo)) 
      { 
          $estado = $conteudo; 
      } 
   }  
}
?>