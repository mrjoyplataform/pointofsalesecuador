<?php
class pdfreport_sales_lookup
{
//  
   function lookup_lineas(&$conteudo, &$nm_array_retorno_lookup) 
   {
      $nm_array_retorno_lookup = array();
      $conteudo = "";
      $nm_comando = "SELECT 
    id_sales_detail,
    id_sales,
    unit_cost,
    unit_value,
    quantity,
    discount,
    item_total,
    id_product
FROM 
    sales_detail" ; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rx = $this->Ini->nm_db_conn_kiosko->Execute($nm_comando)) 
      { 
          $y = 0; 
          $a = 0; 
          $x = 0; 
          $nm_tmp_campos_select = explode(",", "id_sales_detail,
    id_sales,
    unit_cost,
    unit_value,
    quantity,
    discount,
    item_total,
    id_product"); 
          $nm_count = $rx->FieldCount();
          while (!$rx->EOF)
          { 
                 $rx->fields[0] = str_replace(',', '.', $rx->fields[0]); 
                 $rx->fields[1] = str_replace(',', '.', $rx->fields[1]); 
                 $rx->fields[2] = str_replace(',', '.', $rx->fields[2]); 
                 $rx->fields[3] = str_replace(',', '.', $rx->fields[3]); 
                 $rx->fields[4] = str_replace(',', '.', $rx->fields[4]); 
                 $rx->fields[5] = str_replace(',', '.', $rx->fields[5]); 
                 $rx->fields[6] = str_replace(',', '.', $rx->fields[6]); 
                 $rx->fields[7] = str_replace(',', '.', $rx->fields[7]); 
                 if ($y == 1)
                 { 
                     $conteudo .= "<br>";
                     $y = 0; 
                     $x = 0; 
                 } 
                 $y++; 
                 if ($x != 0)
                 { 
                     $conteudo .= "";
                 } 
                 for ($x = 0; $x < $nm_count; $x++)
                 { 
                        $nm_array_retorno_lookup[$a] [trim($nm_tmp_campos_select[$x])] = trim($rx->fields[$x]);
                        $nm_array_retorno_lookup[$a] [$x]= trim($rx->fields[$x]);
                        if ($x != 0)
                        { 
                            $conteudo .= "";
                        } 
                        $conteudo .= trim($rx->fields[$x]);
                 }
                 $a++; 
                 $rx->MoveNext();
          } 
          $rx->Close();
      } 
      elseif ($GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Ini->nm_db_conn_kiosko->ErrorMsg()); 
          exit; 
      } 
   } 
}
?>
