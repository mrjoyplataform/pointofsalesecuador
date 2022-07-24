<div id="form_customer_clubmrjoy_mob_form1" style='<?php echo ($this->tabCssClass["form_customer_clubmrjoy_mob_form1"]['class'] == 'scTabInactive' ? 'display: none; width: 1px; height: 0px; overflow: scroll' : ''); ?>'>
<?php $sc_hidden_no = 1; $sc_hidden_yes = 0; ?>
   <a name="bloco_0"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_1"><!-- bloco_c -->
<?php
?>
<TABLE align="center" id="hidden_bloco_1" class="scFormTable<?php echo $this->classes_100perc_fields['table'] ?>" width="100%" style="height: 100%;"><?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['idcustomer']))
           {
               $this->nmgp_cmp_readonly['idcustomer'] = 'on';
           }
?>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['provincia']))
   {
       $this->nm_new_label['provincia'] = "Provincia";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $provincia = $this->provincia;
   $sStyleHidden_provincia = '';
   if (isset($this->nmgp_cmp_hidden['provincia']) && $this->nmgp_cmp_hidden['provincia'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['provincia']);
       $sStyleHidden_provincia = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_provincia = 'display: none;';
   $sStyleReadInp_provincia = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['provincia']) && $this->nmgp_cmp_readonly['provincia'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['provincia']);
       $sStyleReadLab_provincia = '';
       $sStyleReadInp_provincia = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['provincia']) && $this->nmgp_cmp_hidden['provincia'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="provincia" value="<?php echo $this->form_encode_input($this->provincia) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_provincia_line" id="hidden_field_data_provincia" style="<?php echo $sStyleHidden_provincia; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_provincia_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_provincia_label" style=""><span id="id_label_provincia"><?php echo $this->nm_new_label['provincia']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_customer_clubmrjoy_mob']['php_cmp_required']['provincia']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_customer_clubmrjoy_mob']['php_cmp_required']['provincia'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["provincia"]) &&  $this->nmgp_cmp_readonly["provincia"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_customer_clubmrjoy_mob']['Lookup_provincia']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_customer_clubmrjoy_mob']['Lookup_provincia'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_customer_clubmrjoy_mob']['Lookup_provincia']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_customer_clubmrjoy_mob']['Lookup_provincia'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_customer_clubmrjoy_mob']['Lookup_provincia']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_customer_clubmrjoy_mob']['Lookup_provincia'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_customer_clubmrjoy_mob']['Lookup_provincia']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_customer_clubmrjoy_mob']['Lookup_provincia'] = array(); 
    }
   $nm_comando = "SELECT distinct codprovincia, provincia  FROM ciudades  ORDER BY provincia";
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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_customer_clubmrjoy_mob']['Lookup_provincia'][] = $rs->fields[0];
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
   $x = 0; 
   $provincia_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->provincia_1))
          {
              foreach ($this->provincia_1 as $tmp_provincia)
              {
                  if (trim($tmp_provincia) === trim($cadaselect[1])) { $provincia_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->provincia) === trim($cadaselect[1])) { $provincia_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="provincia" value="<?php echo $this->form_encode_input($provincia) . "\">" . $provincia_look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_provincia();
   $x = 0 ; 
   $provincia_look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->provincia_1))
          {
              foreach ($this->provincia_1 as $tmp_provincia)
              {
                  if (trim($tmp_provincia) === trim($cadaselect[1])) { $provincia_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->provincia) === trim($cadaselect[1])) { $provincia_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($provincia_look))
          {
              $provincia_look = $this->provincia;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_provincia\" class=\"css_provincia_line\" style=\"" .  $sStyleReadLab_provincia . "\">" . $this->form_format_readonly("provincia", $this->form_encode_input($provincia_look)) . "</span><span id=\"id_read_off_provincia\" class=\"css_read_off_provincia" . $this->classes_100perc_fields['span_input'] . "\" style=\"white-space: nowrap; " . $sStyleReadInp_provincia . "\">";
   echo " <span id=\"idAjaxSelect_provincia\" class=\"" . $this->classes_100perc_fields['span_select'] . "\"><select class=\"sc-js-input scFormObjectOdd css_provincia_obj" . $this->classes_100perc_fields['input'] . "\" style=\"\" id=\"id_sc_field_provincia\" name=\"provincia\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['form_customer_clubmrjoy_mob']['Lookup_provincia'][] = ''; 
   echo "  <option value=\"\">" . str_replace("<", "&lt;"," ") . "</option>" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->provincia) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->provincia)) 
              {
                  echo " selected" ;
              } 
           } 
          echo ">" . str_replace('<', '&lt;',$cadaselect[0]) . "</option>" ; 
          echo "\r" ; 
          $x++ ; 
   }  ; 
   echo " </select></span>" ; 
   echo "\r" ; 
   echo "</span>";
?> 
<?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_provincia_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_provincia_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['canton']))
   {
       $this->nm_new_label['canton'] = "Canton";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $canton = $this->canton;
   $sStyleHidden_canton = '';
   if (isset($this->nmgp_cmp_hidden['canton']) && $this->nmgp_cmp_hidden['canton'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['canton']);
       $sStyleHidden_canton = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_canton = 'display: none;';
   $sStyleReadInp_canton = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['canton']) && $this->nmgp_cmp_readonly['canton'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['canton']);
       $sStyleReadLab_canton = '';
       $sStyleReadInp_canton = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['canton']) && $this->nmgp_cmp_hidden['canton'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="canton" value="<?php echo $this->form_encode_input($this->canton) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_canton_line" id="hidden_field_data_canton" style="<?php echo $sStyleHidden_canton; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_canton_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_canton_label" style=""><span id="id_label_canton"><?php echo $this->nm_new_label['canton']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_customer_clubmrjoy_mob']['php_cmp_required']['canton']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_customer_clubmrjoy_mob']['php_cmp_required']['canton'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["canton"]) &&  $this->nmgp_cmp_readonly["canton"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_customer_clubmrjoy_mob']['Lookup_canton']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_customer_clubmrjoy_mob']['Lookup_canton'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_customer_clubmrjoy_mob']['Lookup_canton']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_customer_clubmrjoy_mob']['Lookup_canton'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_customer_clubmrjoy_mob']['Lookup_canton']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_customer_clubmrjoy_mob']['Lookup_canton'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_customer_clubmrjoy_mob']['Lookup_canton']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_customer_clubmrjoy_mob']['Lookup_canton'] = array(); 
    }
   $nm_comando = "SELECT distinct codcanton, canton  FROM ciudades where codprovincia ='$this->provincia'  ORDER BY canton";
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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_customer_clubmrjoy_mob']['Lookup_canton'][] = $rs->fields[0];
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
   $x = 0; 
   $canton_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->canton_1))
          {
              foreach ($this->canton_1 as $tmp_canton)
              {
                  if (trim($tmp_canton) === trim($cadaselect[1])) { $canton_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->canton) === trim($cadaselect[1])) { $canton_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="canton" value="<?php echo $this->form_encode_input($canton) . "\">" . $canton_look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_canton();
   $x = 0 ; 
   $canton_look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->canton_1))
          {
              foreach ($this->canton_1 as $tmp_canton)
              {
                  if (trim($tmp_canton) === trim($cadaselect[1])) { $canton_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->canton) === trim($cadaselect[1])) { $canton_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($canton_look))
          {
              $canton_look = $this->canton;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_canton\" class=\"css_canton_line\" style=\"" .  $sStyleReadLab_canton . "\">" . $this->form_format_readonly("canton", $this->form_encode_input($canton_look)) . "</span><span id=\"id_read_off_canton\" class=\"css_read_off_canton" . $this->classes_100perc_fields['span_input'] . "\" style=\"white-space: nowrap; " . $sStyleReadInp_canton . "\">";
   echo " <span id=\"idAjaxSelect_canton\" class=\"" . $this->classes_100perc_fields['span_select'] . "\"><select class=\"sc-js-input scFormObjectOdd css_canton_obj" . $this->classes_100perc_fields['input'] . "\" style=\"\" id=\"id_sc_field_canton\" name=\"canton\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['form_customer_clubmrjoy_mob']['Lookup_canton'][] = ''; 
   echo "  <option value=\"\">" . str_replace("<", "&lt;"," ") . "</option>" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->canton) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->canton)) 
              {
                  echo " selected" ;
              } 
           } 
          echo ">" . str_replace('<', '&lt;',$cadaselect[0]) . "</option>" ; 
          echo "\r" ; 
          $x++ ; 
   }  ; 
   echo " </select></span>" ; 
   echo "\r" ; 
   echo "</span>";
?> 
<?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_canton_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_canton_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['parroquia']))
   {
       $this->nm_new_label['parroquia'] = "Parroquia";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $parroquia = $this->parroquia;
   $sStyleHidden_parroquia = '';
   if (isset($this->nmgp_cmp_hidden['parroquia']) && $this->nmgp_cmp_hidden['parroquia'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['parroquia']);
       $sStyleHidden_parroquia = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_parroquia = 'display: none;';
   $sStyleReadInp_parroquia = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['parroquia']) && $this->nmgp_cmp_readonly['parroquia'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['parroquia']);
       $sStyleReadLab_parroquia = '';
       $sStyleReadInp_parroquia = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['parroquia']) && $this->nmgp_cmp_hidden['parroquia'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="parroquia" value="<?php echo $this->form_encode_input($this->parroquia) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_parroquia_line" id="hidden_field_data_parroquia" style="<?php echo $sStyleHidden_parroquia; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_parroquia_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_parroquia_label" style=""><span id="id_label_parroquia"><?php echo $this->nm_new_label['parroquia']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_customer_clubmrjoy_mob']['php_cmp_required']['parroquia']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_customer_clubmrjoy_mob']['php_cmp_required']['parroquia'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["parroquia"]) &&  $this->nmgp_cmp_readonly["parroquia"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_customer_clubmrjoy_mob']['Lookup_parroquia']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_customer_clubmrjoy_mob']['Lookup_parroquia'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_customer_clubmrjoy_mob']['Lookup_parroquia']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_customer_clubmrjoy_mob']['Lookup_parroquia'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_customer_clubmrjoy_mob']['Lookup_parroquia']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_customer_clubmrjoy_mob']['Lookup_parroquia'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_customer_clubmrjoy_mob']['Lookup_parroquia']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_customer_clubmrjoy_mob']['Lookup_parroquia'] = array(); 
    }
   $nm_comando = "SELECT distinct codparroquia, parroquia  FROM ciudades where codcanton='$this->canton'  ORDER BY parroquia";
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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_customer_clubmrjoy_mob']['Lookup_parroquia'][] = $rs->fields[0];
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
   $x = 0; 
   $parroquia_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->parroquia_1))
          {
              foreach ($this->parroquia_1 as $tmp_parroquia)
              {
                  if (trim($tmp_parroquia) === trim($cadaselect[1])) { $parroquia_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->parroquia) === trim($cadaselect[1])) { $parroquia_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="parroquia" value="<?php echo $this->form_encode_input($parroquia) . "\">" . $parroquia_look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_parroquia();
   $x = 0 ; 
   $parroquia_look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->parroquia_1))
          {
              foreach ($this->parroquia_1 as $tmp_parroquia)
              {
                  if (trim($tmp_parroquia) === trim($cadaselect[1])) { $parroquia_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->parroquia) === trim($cadaselect[1])) { $parroquia_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($parroquia_look))
          {
              $parroquia_look = $this->parroquia;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_parroquia\" class=\"css_parroquia_line\" style=\"" .  $sStyleReadLab_parroquia . "\">" . $this->form_format_readonly("parroquia", $this->form_encode_input($parroquia_look)) . "</span><span id=\"id_read_off_parroquia\" class=\"css_read_off_parroquia" . $this->classes_100perc_fields['span_input'] . "\" style=\"white-space: nowrap; " . $sStyleReadInp_parroquia . "\">";
   echo " <span id=\"idAjaxSelect_parroquia\" class=\"" . $this->classes_100perc_fields['span_select'] . "\"><select class=\"sc-js-input scFormObjectOdd css_parroquia_obj" . $this->classes_100perc_fields['input'] . "\" style=\"\" id=\"id_sc_field_parroquia\" name=\"parroquia\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['form_customer_clubmrjoy_mob']['Lookup_parroquia'][] = ''; 
   echo "  <option value=\"\">" . str_replace("<", "&lt;"," ") . "</option>" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->parroquia) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->parroquia)) 
              {
                  echo " selected" ;
              } 
           } 
          echo ">" . str_replace('<', '&lt;',$cadaselect[0]) . "</option>" ; 
          echo "\r" ; 
          $x++ ; 
   }  ; 
   echo " </select></span>" ; 
   echo "\r" ; 
   echo "</span>";
?> 
<?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_parroquia_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_parroquia_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['direccion']))
    {
        $this->nm_new_label['direccion'] = "Dirección";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $direccion = $this->direccion;
   $sStyleHidden_direccion = '';
   if (isset($this->nmgp_cmp_hidden['direccion']) && $this->nmgp_cmp_hidden['direccion'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['direccion']);
       $sStyleHidden_direccion = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_direccion = 'display: none;';
   $sStyleReadInp_direccion = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['direccion']) && $this->nmgp_cmp_readonly['direccion'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['direccion']);
       $sStyleReadLab_direccion = '';
       $sStyleReadInp_direccion = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['direccion']) && $this->nmgp_cmp_hidden['direccion'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="direccion" value="<?php echo $this->form_encode_input($direccion) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_direccion_line" id="hidden_field_data_direccion" style="<?php echo $sStyleHidden_direccion; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_direccion_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_direccion_label" style=""><span id="id_label_direccion"><?php echo $this->nm_new_label['direccion']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_customer_clubmrjoy_mob']['php_cmp_required']['direccion']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_customer_clubmrjoy_mob']['php_cmp_required']['direccion'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php
$direccion_val = str_replace('<br />', '__SC_BREAK_LINE__', nl2br($direccion));

?>

<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["direccion"]) &&  $this->nmgp_cmp_readonly["direccion"] == "on") { 

 ?>
<input type="hidden" name="direccion" value="<?php echo $this->form_encode_input($direccion) . "\">" . $direccion_val . ""; ?>
<?php } else { ?>
<span id="id_read_on_direccion" class="sc-ui-readonly-direccion css_direccion_line" style="<?php echo $sStyleReadLab_direccion; ?>"><?php echo $this->form_format_readonly("direccion", $this->form_encode_input($direccion_val)); ?></span><span id="id_read_off_direccion" class="css_read_off_direccion<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_direccion; ?>">
 <textarea class="sc-js-input scFormObjectOdd css_direccion_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="white-space: pre-wrap;" name="direccion" id="id_sc_field_direccion" rows="2" cols="25"
 alt="{datatype: 'text', maxLength: 200, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" >
<?php echo $direccion; ?>
</textarea>
</span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_direccion_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_direccion_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['sector']))
    {
        $this->nm_new_label['sector'] = "Sector";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $sector = $this->sector;
   $sStyleHidden_sector = '';
   if (isset($this->nmgp_cmp_hidden['sector']) && $this->nmgp_cmp_hidden['sector'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['sector']);
       $sStyleHidden_sector = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_sector = 'display: none;';
   $sStyleReadInp_sector = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['sector']) && $this->nmgp_cmp_readonly['sector'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['sector']);
       $sStyleReadLab_sector = '';
       $sStyleReadInp_sector = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['sector']) && $this->nmgp_cmp_hidden['sector'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="sector" value="<?php echo $this->form_encode_input($sector) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_sector_line" id="hidden_field_data_sector" style="<?php echo $sStyleHidden_sector; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_sector_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_sector_label" style=""><span id="id_label_sector"><?php echo $this->nm_new_label['sector']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_customer_clubmrjoy_mob']['php_cmp_required']['sector']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_customer_clubmrjoy_mob']['php_cmp_required']['sector'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["sector"]) &&  $this->nmgp_cmp_readonly["sector"] == "on") { 

 ?>
<input type="hidden" name="sector" value="<?php echo $this->form_encode_input($sector) . "\">" . $sector . ""; ?>
<?php } else { ?>
<span id="id_read_on_sector" class="sc-ui-readonly-sector css_sector_line" style="<?php echo $sStyleReadLab_sector; ?>"><?php echo $this->form_format_readonly("sector", $this->form_encode_input($this->sector)); ?></span><span id="id_read_off_sector" class="css_read_off_sector<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_sector; ?>">
 <input class="sc-js-input scFormObjectOdd css_sector_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_sector" type=text name="sector" value="<?php echo $this->form_encode_input($sector) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=25"; } ?> maxlength=100 alt="{datatype: 'text', maxLength: 100, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_sector_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_sector_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 






   </tr>
</TABLE></div><!-- bloco_f -->
   </td></tr></table>
   </div>
