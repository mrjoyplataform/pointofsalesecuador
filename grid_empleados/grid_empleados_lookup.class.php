<?php
class grid_empleados_lookup
{
//  
   function lookup_activo(&$activo) 
   {
      $conteudo = "" ; 
      if ($activo == "1")
      { 
          $conteudo = "SI";
      } 
      if ($activo == "0")
      { 
          $conteudo = "NO";
      } 
      if (!empty($conteudo)) 
      { 
          $activo = $conteudo; 
      } 
   }  
}
?>
