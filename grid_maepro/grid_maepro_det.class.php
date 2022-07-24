<?php
//--- 
class grid_maepro_det
{
   var $Ini;
   var $Erro;
   var $Db;
   var $nm_data;
   var $NM_raiz_img; 
   var $nmgp_botoes     = array(); 
   var $nm_btn_exist    = array(); 
   var $nm_btn_label    = array(); 
   var $nm_btn_disabled = array(); 
   var $nm_location;
   var $codprod01;
   var $desprod01;
   var $cve101;
   var $cve201;
   var $unidmed01;
   var $cantmin01;
   var $cantact01;
   var $valact01;
   var $exipromo01;
   var $precuni01;
   var $pedpend01;
   var $orden01;
   var $refer01;
   var $canentm01;
   var $valentm01;
   var $cansalm01;
   var $valsalm01;
   var $canenta01;
   var $valenta01;
   var $cansala01;
   var $valsala01;
   var $fecape01;
   var $fecult01;
   var $fecvta01;
   var $ubic01;
   var $precvta01;
   var $descto101;
   var $precio201;
   var $descto201;
   var $precio301;
   var $descto301;
   var $canvtam01;
   var $valvtam01;
   var $cosvtam01;
   var $canvtaa01;
   var $valvtaa01;
   var $cosvtaa01;
   var $prod1alt01;
   var $prod2alt01;
   var $proved101;
   var $proved201;
   var $med101;
   var $med201;
   var $med301;
   var $factor01;
   var $cvserie01;
   var $ctain101;
   var $ctain201;
   var $ctain301;
   var $porciva01;
   var $prodsinsdo01;
   var $sinprec01;
   var $fotoprod01;
   var $detprod01;
   var $block;
   var $uid;
   var $ultimoacceso;
   var $idpro;
   var $catprod01;
   var $med401;
   var $med501;
   var $prodconmed01;
   var $factorpeso01;
   var $codbar01;
   var $unifrac01;
   var $calidad01;
   var $color01;
   var $material01;
   var $talla01;
   var $compuesto01;
   var $catalt01;
   var $precfob01;
   var $precio401;
   var $descto401;
   var $porigen01;
   var $rin01;
   var $marca01;
   var $alto01;
   var $ancho01;
   var $tipoletra01;
   var $indcarga01;
   var $indveloc01;
   var $pr01;
   var $dis01;
   var $tipocons01;
   var $precateg01;
   var $tipprod01;
   var $conversion01;
   var $valhom01;
   var $ctain401;
   var $valhom02;
   var $valhom03;
   var $valhom04;
   var $statuspro01;
   var $parara01;
   var $prodequiv01;
   var $regalia01;
   var $precio501;
   var $descto501;
   var $precio601;
   var $descto601;
   var $precio701;
   var $descto701;
   var $precio801;
   var $descto801;
   var $precio901;
   var $descto901;
   var $precio1001;
   var $descto1001;
   var $precio1101;
   var $descto1101;
   var $precio1201;
   var $descto1201;
   var $submarca01;
   var $modelo01;
   var $clasific01;
   var $codbarempaque01;
   var $unidadempaque01;
   var $dimensionempaque01;
   var $link01;
   var $desprod201;
   var $desprod301;
   var $coefprd01;
   var $infor01;
   var $infor03;
   var $infor05;
   var $infor07;
   var $porcenrenta;
   var $peso;
   var $consignado;
   var $cant_consignado;
   var $baseimpexe01;
   var $peso01;
   var $prodrel01;
   var $infor02;
   var $infor04;
   var $infor06;
   var $infor08;
   var $porcicevta01;
   var $porcicecpra01;
   var $porcptdaranc01;
   var $ordimp01;
    function getFieldHighlight($filter_type, $field, $str_value, $str_value_original='')
    {
        $str_html_ini = '<div class="highlight">';
        $str_html_fim = '</div>';

        if($filter_type == 'advanced_search')
        {
            if (
                isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['campos_busca'][ $field ]) &&
                isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['campos_busca'][ $field . "_cond" ]) &&
                !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['campos_busca'][ $field ]) &&
                (
                    $_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['campos_busca'][ $field . "_cond"] == 'qp' ||
                    $_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['campos_busca'][ $field . "_cond"] == 'eq' ||
                    $_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['campos_busca'][ $field . "_cond"] == 'ii'
                )
            )
            {
                if($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['campos_busca'][ $field . "_cond"] == 'qp')
                {
                    if(strcasecmp($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['campos_busca'][ $field ], $str_value) == 0)
                    {
                        $str_value = $str_html_ini. $str_value .$str_html_fim;
                    }
                    elseif(strcasecmp($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['campos_busca'][ $field ], $str_value_original) == 0)
                    {
                        $str_value = $str_html_ini. $str_value .$str_html_fim;
                    }
                    else
                    {
                        $keywords = preg_quote($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['campos_busca'][ $field ], '/');
                        $str_value = preg_replace('/'. $keywords .'/i', $str_html_ini . '$0' . $str_html_fim, $str_value);
                    }
                }
                elseif($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['campos_busca'][ $field . "_cond"] == 'eq')
                {
                    if(strcasecmp($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['campos_busca'][ $field ], $str_value) == 0)
                    {
                        $str_value = $str_html_ini. $str_value .$str_html_fim;
                    }
                    elseif(strcasecmp($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['campos_busca'][ $field ], $str_value_original) == 0)
                    {
                        $str_value = $str_html_ini. $str_value .$str_html_fim;
                    }
                }
                elseif($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['campos_busca'][ $field . "_cond"] == 'ii')
                {
                    if(strcasecmp($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['campos_busca'][ $field ], substr($str_value, 0, strlen($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['campos_busca'][ $field ]))) == 0)
                    {
                        $str_value = $str_html_ini. substr($str_value, 0, strlen($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['campos_busca'][ $field ])) .$str_html_fim . substr($str_value, strlen($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['campos_busca'][ $field ]));
                    }
                }
            }
        }
        elseif($filter_type == 'quicksearch')
        {
            if(
                isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['fast_search'][0]) &&
                (
                    (
                    $_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['fast_search'][0] == 'SC_all_Cmp' &&
                    in_array($field, array('codprod01', 'desprod01', 'cve101', 'cve201', 'unidmed01', 'cantmin01', 'cantact01', 'valact01', 'exipromo01', 'precuni01', 'pedpend01', 'orden01', 'refer01', 'canentm01', 'valentm01', 'cansalm01', 'valsalm01', 'canenta01', 'valenta01', 'cansala01', 'valsala01', 'fecape01', 'fecult01', 'fecvta01', 'ubic01', 'precvta01', 'descto101', 'precio201', 'descto201', 'precio301', 'descto301', 'canvtam01', 'valvtam01', 'cosvtam01', 'canvtaa01', 'valvtaa01', 'cosvtaa01', 'prod1alt01', 'prod2alt01', 'proved101', 'proved201', 'med101', 'med201', 'med301', 'factor01', 'cvserie01', 'ctain101', 'ctain201', 'ctain301', 'porciva01', 'prodsinsdo01', 'sinprec01', 'fotoprod01', 'detprod01', 'block', 'uid', 'ultimoacceso', 'idpro', 'catprod01', 'med401', 'med501', 'prodconmed01', 'factorpeso01', 'codbar01', 'unifrac01', 'calidad01', 'color01', 'material01', 'talla01', 'compuesto01', 'catalt01', 'precfob01', 'precio401', 'descto401', 'porigen01', 'rin01', 'marca01', 'alto01', 'ancho01', 'tipoletra01', 'indcarga01', 'indveloc01', 'pr01', 'dis01', 'tipocons01', 'precateg01', 'tipprod01', 'conversion01', 'valhom01', 'ctain401', 'valhom02', 'valhom03', 'valhom04', 'statuspro01', 'parara01', 'prodequiv01', 'regalia01', 'precio501', 'descto501', 'precio601', 'descto601', 'precio701', 'descto701', 'precio801', 'descto801', 'precio901', 'descto901', 'precio1001', 'descto1001', 'precio1101', 'descto1101', 'precio1201', 'descto1201', 'submarca01', 'modelo01', 'clasific01', 'codbarempaque01', 'unidadempaque01', 'dimensionempaque01', 'link01', 'desprod201', 'desprod301', 'coefprd01', 'infor01', 'infor03', 'infor05', 'infor07', 'porcenrenta', 'peso', 'consignado', 'cant_consignado', 'baseimpexe01', 'peso01', 'prodrel01', 'infor02', 'infor04', 'infor06', 'infor08', 'porcicevta01', 'porcicecpra01', 'porcptdaranc01', 'ordimp01'))
                    ) ||
                    $_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['fast_search'][0] == $field ||
                    strpos($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['fast_search'][0], $field . '_VLS_') !== false ||
                    strpos($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['fast_search'][0], '_VLS_' . $field) !== false
                )
            )
            {
                if($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['fast_search'][1] == 'qp')
                {
                    if(strcasecmp($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['fast_search'][2], $str_value) == 0)
                    {
                        $str_value = $str_html_ini. $str_value .$str_html_fim;
                    }
                    elseif(!empty($str_value_original) && $str_value_original != '&nbsp;' && strcasecmp($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['fast_search'][2], $str_value_original) == 0)
                    {
                        $str_value = $str_html_ini. $str_value .$str_html_fim;
                    }
                    else
                    {
                        $keywords = preg_quote($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['fast_search'][2], '/');
                        $str_value = preg_replace('/'. $keywords .'/i', $str_html_ini . '$0' . $str_html_fim, $str_value);
                    }
                }
                elseif($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['fast_search'][1] == 'eq')
                {
                    if(strcasecmp($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['fast_search'][2], $str_value) == 0)
                    {
                        $str_value = $str_html_ini. $str_value .$str_html_fim;
                    }
                    elseif(!empty($str_value_original) && $str_value_original != '&nbsp;' && strcasecmp($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['fast_search'][2], $str_value_original) == 0)
                    {
                        $str_value = $str_html_ini. $str_value .$str_html_fim;
                    }
                }
            }
        }
        return $str_value;
    }
 function monta_det()
 {
    global 
           $nm_saida, $nm_lang, $nmgp_cor_print, $nmgp_tipo_pdf;
    $this->nmgp_botoes['det_pdf'] = "on";
    $this->nmgp_botoes['pdf'] = "on";
    $this->nmgp_botoes['det_print'] = "on";
    $this->nmgp_botoes['print'] = "on";
    $this->nmgp_botoes['html'] = "on";
    $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
    if (isset($_SESSION['scriptcase']['sc_apl_conf']['grid_maepro']['btn_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['grid_maepro']['btn_display']))
    {
        foreach ($_SESSION['scriptcase']['sc_apl_conf']['grid_maepro']['btn_display'] as $NM_cada_btn => $NM_cada_opc)
        {
            $this->nmgp_botoes[$NM_cada_btn] = $NM_cada_opc;
        }
    }
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['embutida_form']) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['embutida_form'])
    {
    $this->nmgp_botoes['det_pdf']   = "off";
    $this->nmgp_botoes['det_print'] = "off";
    }
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['campos_busca']))
    { 
        $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['campos_busca'];
        if ($_SESSION['scriptcase']['charset'] != "UTF-8")
        {
            $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
        }
        $this->cve201 = $Busca_temp['cve201']; 
        $tmp_pos = strpos($this->cve201, "##@@");
        if ($tmp_pos !== false && !is_array($this->cve201))
        {
            $this->cve201 = substr($this->cve201, 0, $tmp_pos);
        }
        $this->codprod01 = $Busca_temp['codprod01']; 
        $tmp_pos = strpos($this->codprod01, "##@@");
        if ($tmp_pos !== false && !is_array($this->codprod01))
        {
            $this->codprod01 = substr($this->codprod01, 0, $tmp_pos);
        }
        $this->desprod01 = $Busca_temp['desprod01']; 
        $tmp_pos = strpos($this->desprod01, "##@@");
        if ($tmp_pos !== false && !is_array($this->desprod01))
        {
            $this->desprod01 = substr($this->desprod01, 0, $tmp_pos);
        }
        $this->cve101 = $Busca_temp['cve101']; 
        $tmp_pos = strpos($this->cve101, "##@@");
        if ($tmp_pos !== false && !is_array($this->cve101))
        {
            $this->cve101 = substr($this->cve101, 0, $tmp_pos);
        }
    } 
    $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['where_orig'];
    $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['where_pesq'];
    $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['where_pesq_filtro'];
    $this->nm_field_dinamico = array();
    $this->nm_order_dinamico = array();
    $this->nm_data = new nm_data("es_es");
    $this->NM_raiz_img  = ""; 
    if ($this->Ini->sc_export_ajax_img)
    { 
        $this->NM_raiz_img = $this->Ini->root; 
    } 
    $this->sc_proc_grid = false; 
    include($this->Ini->path_btn . $this->Ini->Str_btn_grid);
    $_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['seq_dir'] = 0; 
    $_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['sub_dir'] = array(); 
   if ($_SESSION['scriptcase']['proc_mobile']) {
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_conv_dados.php", "F", "nm_conv_limpa_dado") ; 
   }
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
   $this->nm_data->SetaData(date("Y/m/d H:i:s"), "YYYY/MM/DD HH:II:SS"); 
   $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_edit.php", "F", "nmgp_Form_Num_Val") ; 
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase)) 
   { 
       $nmgp_select = "SELECT codprod01, desprod01, cve101, cve201, unidmed01, cantmin01, cantact01, valact01, exipromo01, precuni01, pedpend01, orden01, refer01, canentm01, valentm01, cansalm01, valsalm01, canenta01, valenta01, cansala01, valsala01, str_replace (convert(char(10),fecape01,102), '.', '-') + ' ' + convert(char(8),fecape01,20), str_replace (convert(char(10),fecult01,102), '.', '-') + ' ' + convert(char(8),fecult01,20), str_replace (convert(char(10),fecvta01,102), '.', '-') + ' ' + convert(char(8),fecvta01,20), ubic01, precvta01, descto101, precio201, descto201, precio301, descto301, canvtam01, valvtam01, cosvtam01, canvtaa01, valvtaa01, cosvtaa01, prod1alt01, prod2alt01, proved101, proved201, med101, med201, med301, factor01, cvserie01, ctain101, ctain201, ctain301, porciva01, prodsinsdo01, sinprec01, fotoprod01, detprod01, block, UID, ultimoacceso, idpro, catprod01, med401, med501, prodconmed01, factorpeso01, codbar01, unifrac01, calidad01, color01, material01, talla01, compuesto01, catalt01, precfob01, precio401, descto401, porigen01, rin01, marca01, alto01, ancho01, tipoletra01, indcarga01, indveloc01, pr01, dis01, tipocons01, precateg01, tipprod01, conversion01, valhom01, ctain401, valhom02, valhom03, valhom04, statuspro01, parara01, prodequiv01, regalia01, precio501, descto501, precio601, descto601, precio701, descto701, precio801, descto801, precio901, descto901, precio1001, descto1001, precio1101, descto1101, precio1201, descto1201, submarca01, modelo01, clasific01, codbarempaque01, unidadempaque01, dimensionempaque01, link01, desprod201, desprod301, coefprd01, infor01, infor03, infor05, infor07, porcenrenta, peso, consignado, cant_consignado, baseImpExe01, peso01, prodrel01, infor02, infor04, infor06, infor08, porcicevta01, porcicecpra01, porcptdaranc01, ordimp01 from " . $this->Ini->nm_tabela; 
   } 
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql)) 
   { 
       $nmgp_select = "SELECT codprod01, desprod01, cve101, cve201, unidmed01, cantmin01, cantact01, valact01, exipromo01, precuni01, pedpend01, orden01, refer01, canentm01, valentm01, cansalm01, valsalm01, canenta01, valenta01, cansala01, valsala01, convert(char(23),fecape01,121), convert(char(23),fecult01,121), convert(char(23),fecvta01,121), ubic01, precvta01, descto101, precio201, descto201, precio301, descto301, canvtam01, valvtam01, cosvtam01, canvtaa01, valvtaa01, cosvtaa01, prod1alt01, prod2alt01, proved101, proved201, med101, med201, med301, factor01, cvserie01, ctain101, ctain201, ctain301, porciva01, prodsinsdo01, sinprec01, fotoprod01, detprod01, block, UID, ultimoacceso, idpro, catprod01, med401, med501, prodconmed01, factorpeso01, codbar01, unifrac01, calidad01, color01, material01, talla01, compuesto01, catalt01, precfob01, precio401, descto401, porigen01, rin01, marca01, alto01, ancho01, tipoletra01, indcarga01, indveloc01, pr01, dis01, tipocons01, precateg01, tipprod01, conversion01, valhom01, ctain401, valhom02, valhom03, valhom04, statuspro01, parara01, prodequiv01, regalia01, precio501, descto501, precio601, descto601, precio701, descto701, precio801, descto801, precio901, descto901, precio1001, descto1001, precio1101, descto1101, precio1201, descto1201, submarca01, modelo01, clasific01, codbarempaque01, unidadempaque01, dimensionempaque01, link01, desprod201, desprod301, coefprd01, infor01, infor03, infor05, infor07, porcenrenta, peso, consignado, cant_consignado, baseImpExe01, peso01, prodrel01, infor02, infor04, infor06, infor08, porcicevta01, porcicecpra01, porcptdaranc01, ordimp01 from " . $this->Ini->nm_tabela; 
   } 
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle)) 
   { 
       $nmgp_select = "SELECT codprod01, desprod01, cve101, cve201, unidmed01, cantmin01, cantact01, valact01, exipromo01, precuni01, pedpend01, orden01, refer01, canentm01, valentm01, cansalm01, valsalm01, canenta01, valenta01, cansala01, valsala01, fecape01, fecult01, fecvta01, ubic01, precvta01, descto101, precio201, descto201, precio301, descto301, canvtam01, valvtam01, cosvtam01, canvtaa01, valvtaa01, cosvtaa01, prod1alt01, prod2alt01, proved101, proved201, med101, med201, med301, factor01, cvserie01, ctain101, ctain201, ctain301, porciva01, prodsinsdo01, sinprec01, fotoprod01, detprod01, block, UID, TO_DATE(TO_CHAR(ultimoacceso, 'yyyy-mm-dd hh24:mi:ss'), 'yyyy-mm-dd hh24:mi:ss'), idpro, catprod01, med401, med501, prodconmed01, factorpeso01, codbar01, unifrac01, calidad01, color01, material01, talla01, compuesto01, catalt01, precfob01, precio401, descto401, porigen01, rin01, marca01, alto01, ancho01, tipoletra01, indcarga01, indveloc01, pr01, dis01, tipocons01, precateg01, tipprod01, conversion01, valhom01, ctain401, valhom02, valhom03, valhom04, statuspro01, parara01, prodequiv01, regalia01, precio501, descto501, precio601, descto601, precio701, descto701, precio801, descto801, precio901, descto901, precio1001, descto1001, precio1101, descto1101, precio1201, descto1201, submarca01, modelo01, clasific01, codbarempaque01, unidadempaque01, dimensionempaque01, link01, desprod201, desprod301, coefprd01, infor01, infor03, infor05, infor07, porcenrenta, peso, consignado, cant_consignado, baseImpExe01, peso01, prodrel01, infor02, infor04, infor06, infor08, porcicevta01, porcicecpra01, porcptdaranc01, ordimp01 from " . $this->Ini->nm_tabela; 
   } 
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix)) 
   { 
       $nmgp_select = "SELECT codprod01, desprod01, cve101, cve201, unidmed01, cantmin01, cantact01, valact01, exipromo01, precuni01, pedpend01, orden01, refer01, canentm01, valentm01, cansalm01, valsalm01, canenta01, valenta01, cansala01, valsala01, EXTEND(fecape01, YEAR TO FRACTION), EXTEND(fecult01, YEAR TO FRACTION), EXTEND(fecvta01, YEAR TO FRACTION), ubic01, precvta01, descto101, precio201, descto201, precio301, descto301, canvtam01, valvtam01, cosvtam01, canvtaa01, valvtaa01, cosvtaa01, prod1alt01, prod2alt01, proved101, proved201, med101, med201, med301, factor01, cvserie01, ctain101, ctain201, ctain301, porciva01, prodsinsdo01, sinprec01, fotoprod01, detprod01, block, UID, ultimoacceso, idpro, catprod01, med401, med501, prodconmed01, factorpeso01, codbar01, unifrac01, calidad01, color01, material01, talla01, compuesto01, catalt01, precfob01, precio401, descto401, porigen01, rin01, marca01, alto01, ancho01, tipoletra01, indcarga01, indveloc01, pr01, dis01, tipocons01, precateg01, tipprod01, conversion01, valhom01, ctain401, valhom02, valhom03, valhom04, statuspro01, parara01, prodequiv01, regalia01, precio501, descto501, precio601, descto601, precio701, descto701, precio801, descto801, precio901, descto901, precio1001, descto1001, precio1101, descto1101, precio1201, descto1201, submarca01, modelo01, clasific01, codbarempaque01, unidadempaque01, dimensionempaque01, link01, desprod201, desprod301, coefprd01, infor01, infor03, infor05, infor07, porcenrenta, peso, consignado, cant_consignado, baseImpExe01, peso01, prodrel01, infor02, infor04, infor06, infor08, porcicevta01, porcicecpra01, porcptdaranc01, ordimp01 from " . $this->Ini->nm_tabela; 
   } 
   else 
   { 
       $nmgp_select = "SELECT codprod01, desprod01, cve101, cve201, unidmed01, cantmin01, cantact01, valact01, exipromo01, precuni01, pedpend01, orden01, refer01, canentm01, valentm01, cansalm01, valsalm01, canenta01, valenta01, cansala01, valsala01, fecape01, fecult01, fecvta01, ubic01, precvta01, descto101, precio201, descto201, precio301, descto301, canvtam01, valvtam01, cosvtam01, canvtaa01, valvtaa01, cosvtaa01, prod1alt01, prod2alt01, proved101, proved201, med101, med201, med301, factor01, cvserie01, ctain101, ctain201, ctain301, porciva01, prodsinsdo01, sinprec01, fotoprod01, detprod01, block, UID, ultimoacceso, idpro, catprod01, med401, med501, prodconmed01, factorpeso01, codbar01, unifrac01, calidad01, color01, material01, talla01, compuesto01, catalt01, precfob01, precio401, descto401, porigen01, rin01, marca01, alto01, ancho01, tipoletra01, indcarga01, indveloc01, pr01, dis01, tipocons01, precateg01, tipprod01, conversion01, valhom01, ctain401, valhom02, valhom03, valhom04, statuspro01, parara01, prodequiv01, regalia01, precio501, descto501, precio601, descto601, precio701, descto701, precio801, descto801, precio901, descto901, precio1001, descto1001, precio1101, descto1101, precio1201, descto1201, submarca01, modelo01, clasific01, codbarempaque01, unidadempaque01, dimensionempaque01, link01, desprod201, desprod301, coefprd01, infor01, infor03, infor05, infor07, porcenrenta, peso, consignado, cant_consignado, baseImpExe01, peso01, prodrel01, infor02, infor04, infor06, infor08, porcicevta01, porcicecpra01, porcptdaranc01, ordimp01 from " . $this->Ini->nm_tabela; 
   } 
   $parms_det = explode("*PDet*", $_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['chave_det']) ; 
   foreach ($parms_det as $key => $cada_par)
   {
       $parms_det[$key] = $this->Db->qstr($parms_det[$key]);
       $parms_det[$key] = substr($parms_det[$key], 1, strlen($parms_det[$key]) - 2);
   } 
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
   {
       $nmgp_select .= " where  codprod01 = '$parms_det[0]'" ;  
   } 
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
   {
       $nmgp_select .= " where  codprod01 = '$parms_det[0]'" ;  
   } 
   else 
   { 
       $nmgp_select .= " where  codprod01 = '$parms_det[0]'" ;  
   } 
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
   $rs = $this->Db->Execute($nmgp_select) ; 
   if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
   { 
       $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit ; 
   }  
   $this->codprod01 = $rs->fields[0] ;  
   $this->desprod01 = $rs->fields[1] ;  
   $this->cve101 = $rs->fields[2] ;  
   $this->cve201 = $rs->fields[3] ;  
   $this->cve201 = (string)$this->cve201;
   $this->unidmed01 = $rs->fields[4] ;  
   $this->cantmin01 = $rs->fields[5] ;  
   $this->cantmin01 = str_replace(",", ".", $this->cantmin01);
   $this->cantmin01 = (strpos(strtolower($this->cantmin01), "e")) ? (float)$this->cantmin01 : $this->cantmin01; 
   $this->cantmin01 = (string)$this->cantmin01;
   $this->cantact01 = $rs->fields[6] ;  
   $this->cantact01 = str_replace(",", ".", $this->cantact01);
   $this->cantact01 = (strpos(strtolower($this->cantact01), "e")) ? (float)$this->cantact01 : $this->cantact01; 
   $this->cantact01 = (string)$this->cantact01;
   $this->valact01 = $rs->fields[7] ;  
   $this->valact01 = str_replace(",", ".", $this->valact01);
   $this->valact01 = (strpos(strtolower($this->valact01), "e")) ? (float)$this->valact01 : $this->valact01; 
   $this->valact01 = (string)$this->valact01;
   $this->exipromo01 = $rs->fields[8] ;  
   $this->exipromo01 = str_replace(",", ".", $this->exipromo01);
   $this->exipromo01 = (strpos(strtolower($this->exipromo01), "e")) ? (float)$this->exipromo01 : $this->exipromo01; 
   $this->exipromo01 = (string)$this->exipromo01;
   $this->precuni01 = $rs->fields[9] ;  
   $this->precuni01 = str_replace(",", ".", $this->precuni01);
   $this->precuni01 = (strpos(strtolower($this->precuni01), "e")) ? (float)$this->precuni01 : $this->precuni01; 
   $this->precuni01 = (string)$this->precuni01;
   $this->pedpend01 = $rs->fields[10] ;  
   $this->pedpend01 = str_replace(",", ".", $this->pedpend01);
   $this->pedpend01 = (strpos(strtolower($this->pedpend01), "e")) ? (float)$this->pedpend01 : $this->pedpend01; 
   $this->pedpend01 = (string)$this->pedpend01;
   $this->orden01 = $rs->fields[11] ;  
   $this->refer01 = $rs->fields[12] ;  
   $this->canentm01 = $rs->fields[13] ;  
   $this->canentm01 = str_replace(",", ".", $this->canentm01);
   $this->canentm01 = (strpos(strtolower($this->canentm01), "e")) ? (float)$this->canentm01 : $this->canentm01; 
   $this->canentm01 = (string)$this->canentm01;
   $this->valentm01 = $rs->fields[14] ;  
   $this->valentm01 = str_replace(",", ".", $this->valentm01);
   $this->valentm01 = (strpos(strtolower($this->valentm01), "e")) ? (float)$this->valentm01 : $this->valentm01; 
   $this->valentm01 = (string)$this->valentm01;
   $this->cansalm01 = $rs->fields[15] ;  
   $this->cansalm01 = str_replace(",", ".", $this->cansalm01);
   $this->cansalm01 = (strpos(strtolower($this->cansalm01), "e")) ? (float)$this->cansalm01 : $this->cansalm01; 
   $this->cansalm01 = (string)$this->cansalm01;
   $this->valsalm01 = $rs->fields[16] ;  
   $this->valsalm01 = str_replace(",", ".", $this->valsalm01);
   $this->valsalm01 = (strpos(strtolower($this->valsalm01), "e")) ? (float)$this->valsalm01 : $this->valsalm01; 
   $this->valsalm01 = (string)$this->valsalm01;
   $this->canenta01 = $rs->fields[17] ;  
   $this->canenta01 = str_replace(",", ".", $this->canenta01);
   $this->canenta01 = (strpos(strtolower($this->canenta01), "e")) ? (float)$this->canenta01 : $this->canenta01; 
   $this->canenta01 = (string)$this->canenta01;
   $this->valenta01 = $rs->fields[18] ;  
   $this->valenta01 = str_replace(",", ".", $this->valenta01);
   $this->valenta01 = (strpos(strtolower($this->valenta01), "e")) ? (float)$this->valenta01 : $this->valenta01; 
   $this->valenta01 = (string)$this->valenta01;
   $this->cansala01 = $rs->fields[19] ;  
   $this->cansala01 = str_replace(",", ".", $this->cansala01);
   $this->cansala01 = (strpos(strtolower($this->cansala01), "e")) ? (float)$this->cansala01 : $this->cansala01; 
   $this->cansala01 = (string)$this->cansala01;
   $this->valsala01 = $rs->fields[20] ;  
   $this->valsala01 = str_replace(",", ".", $this->valsala01);
   $this->valsala01 = (strpos(strtolower($this->valsala01), "e")) ? (float)$this->valsala01 : $this->valsala01; 
   $this->valsala01 = (string)$this->valsala01;
   $this->fecape01 = $rs->fields[21] ;  
   $this->fecult01 = $rs->fields[22] ;  
   $this->fecvta01 = $rs->fields[23] ;  
   $this->ubic01 = $rs->fields[24] ;  
   $this->precvta01 = $rs->fields[25] ;  
   $this->precvta01 = (strpos(strtolower($this->precvta01), "e")) ? (float)$this->precvta01 : $this->precvta01; 
   $this->precvta01 = (string)$this->precvta01;
   $this->descto101 = $rs->fields[26] ;  
   $this->descto101 = str_replace(",", ".", $this->descto101);
   $this->descto101 = (strpos(strtolower($this->descto101), "e")) ? (float)$this->descto101 : $this->descto101; 
   $this->descto101 = (string)$this->descto101;
   $this->precio201 = $rs->fields[27] ;  
   $this->precio201 = (strpos(strtolower($this->precio201), "e")) ? (float)$this->precio201 : $this->precio201; 
   $this->precio201 = (string)$this->precio201;
   $this->descto201 = $rs->fields[28] ;  
   $this->descto201 = str_replace(",", ".", $this->descto201);
   $this->descto201 = (strpos(strtolower($this->descto201), "e")) ? (float)$this->descto201 : $this->descto201; 
   $this->descto201 = (string)$this->descto201;
   $this->precio301 = $rs->fields[29] ;  
   $this->precio301 = (strpos(strtolower($this->precio301), "e")) ? (float)$this->precio301 : $this->precio301; 
   $this->precio301 = (string)$this->precio301;
   $this->descto301 = $rs->fields[30] ;  
   $this->descto301 = str_replace(",", ".", $this->descto301);
   $this->descto301 = (strpos(strtolower($this->descto301), "e")) ? (float)$this->descto301 : $this->descto301; 
   $this->descto301 = (string)$this->descto301;
   $this->canvtam01 = $rs->fields[31] ;  
   $this->canvtam01 = str_replace(",", ".", $this->canvtam01);
   $this->canvtam01 = (strpos(strtolower($this->canvtam01), "e")) ? (float)$this->canvtam01 : $this->canvtam01; 
   $this->canvtam01 = (string)$this->canvtam01;
   $this->valvtam01 = $rs->fields[32] ;  
   $this->valvtam01 = str_replace(",", ".", $this->valvtam01);
   $this->valvtam01 = (strpos(strtolower($this->valvtam01), "e")) ? (float)$this->valvtam01 : $this->valvtam01; 
   $this->valvtam01 = (string)$this->valvtam01;
   $this->cosvtam01 = $rs->fields[33] ;  
   $this->cosvtam01 = str_replace(",", ".", $this->cosvtam01);
   $this->cosvtam01 = (strpos(strtolower($this->cosvtam01), "e")) ? (float)$this->cosvtam01 : $this->cosvtam01; 
   $this->cosvtam01 = (string)$this->cosvtam01;
   $this->canvtaa01 = $rs->fields[34] ;  
   $this->canvtaa01 = str_replace(",", ".", $this->canvtaa01);
   $this->canvtaa01 = (strpos(strtolower($this->canvtaa01), "e")) ? (float)$this->canvtaa01 : $this->canvtaa01; 
   $this->canvtaa01 = (string)$this->canvtaa01;
   $this->valvtaa01 = $rs->fields[35] ;  
   $this->valvtaa01 = str_replace(",", ".", $this->valvtaa01);
   $this->valvtaa01 = (strpos(strtolower($this->valvtaa01), "e")) ? (float)$this->valvtaa01 : $this->valvtaa01; 
   $this->valvtaa01 = (string)$this->valvtaa01;
   $this->cosvtaa01 = $rs->fields[36] ;  
   $this->cosvtaa01 = str_replace(",", ".", $this->cosvtaa01);
   $this->cosvtaa01 = (strpos(strtolower($this->cosvtaa01), "e")) ? (float)$this->cosvtaa01 : $this->cosvtaa01; 
   $this->cosvtaa01 = (string)$this->cosvtaa01;
   $this->prod1alt01 = $rs->fields[37] ;  
   $this->prod2alt01 = $rs->fields[38] ;  
   $this->proved101 = $rs->fields[39] ;  
   $this->proved201 = $rs->fields[40] ;  
   $this->med101 = $rs->fields[41] ;  
   $this->med101 = (strpos(strtolower($this->med101), "e")) ? (float)$this->med101 : $this->med101; 
   $this->med101 = (string)$this->med101;
   $this->med201 = $rs->fields[42] ;  
   $this->med201 = (strpos(strtolower($this->med201), "e")) ? (float)$this->med201 : $this->med201; 
   $this->med201 = (string)$this->med201;
   $this->med301 = $rs->fields[43] ;  
   $this->med301 = (strpos(strtolower($this->med301), "e")) ? (float)$this->med301 : $this->med301; 
   $this->med301 = (string)$this->med301;
   $this->factor01 = $rs->fields[44] ;  
   $this->factor01 = str_replace(",", ".", $this->factor01);
   $this->factor01 = (strpos(strtolower($this->factor01), "e")) ? (float)$this->factor01 : $this->factor01; 
   $this->factor01 = (string)$this->factor01;
   $this->cvserie01 = $rs->fields[45] ;  
   $this->ctain101 = $rs->fields[46] ;  
   $this->ctain201 = $rs->fields[47] ;  
   $this->ctain301 = $rs->fields[48] ;  
   $this->porciva01 = $rs->fields[49] ;  
   $this->porciva01 = str_replace(",", ".", $this->porciva01);
   $this->porciva01 = (strpos(strtolower($this->porciva01), "e")) ? (float)$this->porciva01 : $this->porciva01; 
   $this->porciva01 = (string)$this->porciva01;
   $this->prodsinsdo01 = $rs->fields[50] ;  
   $this->sinprec01 = $rs->fields[51] ;  
   $this->fotoprod01 = $rs->fields[52] ;  
   $this->detprod01 = $rs->fields[53] ;  
   $this->block = $rs->fields[54] ;  
   $this->block = (string)$this->block;
   $this->uid = $rs->fields[55] ;  
   $this->uid = (string)$this->uid;
   $this->ultimoacceso = $rs->fields[56] ;  
   $this->idpro = $rs->fields[57] ;  
   $this->idpro = (string)$this->idpro;
   $this->catprod01 = $rs->fields[58] ;  
   $this->med401 = $rs->fields[59] ;  
   $this->med401 = (strpos(strtolower($this->med401), "e")) ? (float)$this->med401 : $this->med401; 
   $this->med401 = (string)$this->med401;
   $this->med501 = $rs->fields[60] ;  
   $this->med501 = (strpos(strtolower($this->med501), "e")) ? (float)$this->med501 : $this->med501; 
   $this->med501 = (string)$this->med501;
   $this->prodconmed01 = $rs->fields[61] ;  
   $this->factorpeso01 = $rs->fields[62] ;  
   $this->codbar01 = $rs->fields[63] ;  
   $this->unifrac01 = $rs->fields[64] ;  
   $this->calidad01 = $rs->fields[65] ;  
   $this->color01 = $rs->fields[66] ;  
   $this->material01 = $rs->fields[67] ;  
   $this->talla01 = $rs->fields[68] ;  
   $this->compuesto01 = $rs->fields[69] ;  
   $this->catalt01 = $rs->fields[70] ;  
   $this->precfob01 = $rs->fields[71] ;  
   $this->precfob01 = str_replace(",", ".", $this->precfob01);
   $this->precfob01 = (strpos(strtolower($this->precfob01), "e")) ? (float)$this->precfob01 : $this->precfob01; 
   $this->precfob01 = (string)$this->precfob01;
   $this->precio401 = $rs->fields[72] ;  
   $this->precio401 = (strpos(strtolower($this->precio401), "e")) ? (float)$this->precio401 : $this->precio401; 
   $this->precio401 = (string)$this->precio401;
   $this->descto401 = $rs->fields[73] ;  
   $this->descto401 = str_replace(",", ".", $this->descto401);
   $this->descto401 = (strpos(strtolower($this->descto401), "e")) ? (float)$this->descto401 : $this->descto401; 
   $this->descto401 = (string)$this->descto401;
   $this->porigen01 = $rs->fields[74] ;  
   $this->rin01 = $rs->fields[75] ;  
   $this->marca01 = $rs->fields[76] ;  
   $this->alto01 = $rs->fields[77] ;  
   $this->ancho01 = $rs->fields[78] ;  
   $this->tipoletra01 = $rs->fields[79] ;  
   $this->indcarga01 = $rs->fields[80] ;  
   $this->indveloc01 = $rs->fields[81] ;  
   $this->pr01 = $rs->fields[82] ;  
   $this->dis01 = $rs->fields[83] ;  
   $this->tipocons01 = $rs->fields[84] ;  
   $this->precateg01 = $rs->fields[85] ;  
   $this->tipprod01 = $rs->fields[86] ;  
   $this->conversion01 = $rs->fields[87] ;  
   $this->conversion01 = str_replace(",", ".", $this->conversion01);
   $this->conversion01 = (strpos(strtolower($this->conversion01), "e")) ? (float)$this->conversion01 : $this->conversion01; 
   $this->conversion01 = (string)$this->conversion01;
   $this->valhom01 = $rs->fields[88] ;  
   $this->valhom01 = str_replace(",", ".", $this->valhom01);
   $this->valhom01 = (strpos(strtolower($this->valhom01), "e")) ? (float)$this->valhom01 : $this->valhom01; 
   $this->valhom01 = (string)$this->valhom01;
   $this->ctain401 = $rs->fields[89] ;  
   $this->valhom02 = $rs->fields[90] ;  
   $this->valhom02 = str_replace(",", ".", $this->valhom02);
   $this->valhom02 = (strpos(strtolower($this->valhom02), "e")) ? (float)$this->valhom02 : $this->valhom02; 
   $this->valhom02 = (string)$this->valhom02;
   $this->valhom03 = $rs->fields[91] ;  
   $this->valhom03 = str_replace(",", ".", $this->valhom03);
   $this->valhom03 = (strpos(strtolower($this->valhom03), "e")) ? (float)$this->valhom03 : $this->valhom03; 
   $this->valhom03 = (string)$this->valhom03;
   $this->valhom04 = $rs->fields[92] ;  
   $this->valhom04 = str_replace(",", ".", $this->valhom04);
   $this->valhom04 = (strpos(strtolower($this->valhom04), "e")) ? (float)$this->valhom04 : $this->valhom04; 
   $this->valhom04 = (string)$this->valhom04;
   $this->statuspro01 = $rs->fields[93] ;  
   $this->parara01 = $rs->fields[94] ;  
   $this->prodequiv01 = $rs->fields[95] ;  
   $this->regalia01 = $rs->fields[96] ;  
   $this->precio501 = $rs->fields[97] ;  
   $this->precio501 = (strpos(strtolower($this->precio501), "e")) ? (float)$this->precio501 : $this->precio501; 
   $this->precio501 = (string)$this->precio501;
   $this->descto501 = $rs->fields[98] ;  
   $this->descto501 = str_replace(",", ".", $this->descto501);
   $this->descto501 = (strpos(strtolower($this->descto501), "e")) ? (float)$this->descto501 : $this->descto501; 
   $this->descto501 = (string)$this->descto501;
   $this->precio601 = $rs->fields[99] ;  
   $this->precio601 = (strpos(strtolower($this->precio601), "e")) ? (float)$this->precio601 : $this->precio601; 
   $this->precio601 = (string)$this->precio601;
   $this->descto601 = $rs->fields[100] ;  
   $this->descto601 = str_replace(",", ".", $this->descto601);
   $this->descto601 = (strpos(strtolower($this->descto601), "e")) ? (float)$this->descto601 : $this->descto601; 
   $this->descto601 = (string)$this->descto601;
   $this->precio701 = $rs->fields[101] ;  
   $this->precio701 = (strpos(strtolower($this->precio701), "e")) ? (float)$this->precio701 : $this->precio701; 
   $this->precio701 = (string)$this->precio701;
   $this->descto701 = $rs->fields[102] ;  
   $this->descto701 = str_replace(",", ".", $this->descto701);
   $this->descto701 = (strpos(strtolower($this->descto701), "e")) ? (float)$this->descto701 : $this->descto701; 
   $this->descto701 = (string)$this->descto701;
   $this->precio801 = $rs->fields[103] ;  
   $this->precio801 = (strpos(strtolower($this->precio801), "e")) ? (float)$this->precio801 : $this->precio801; 
   $this->precio801 = (string)$this->precio801;
   $this->descto801 = $rs->fields[104] ;  
   $this->descto801 = str_replace(",", ".", $this->descto801);
   $this->descto801 = (strpos(strtolower($this->descto801), "e")) ? (float)$this->descto801 : $this->descto801; 
   $this->descto801 = (string)$this->descto801;
   $this->precio901 = $rs->fields[105] ;  
   $this->precio901 = (strpos(strtolower($this->precio901), "e")) ? (float)$this->precio901 : $this->precio901; 
   $this->precio901 = (string)$this->precio901;
   $this->descto901 = $rs->fields[106] ;  
   $this->descto901 = str_replace(",", ".", $this->descto901);
   $this->descto901 = (strpos(strtolower($this->descto901), "e")) ? (float)$this->descto901 : $this->descto901; 
   $this->descto901 = (string)$this->descto901;
   $this->precio1001 = $rs->fields[107] ;  
   $this->precio1001 = (strpos(strtolower($this->precio1001), "e")) ? (float)$this->precio1001 : $this->precio1001; 
   $this->precio1001 = (string)$this->precio1001;
   $this->descto1001 = $rs->fields[108] ;  
   $this->descto1001 = str_replace(",", ".", $this->descto1001);
   $this->descto1001 = (strpos(strtolower($this->descto1001), "e")) ? (float)$this->descto1001 : $this->descto1001; 
   $this->descto1001 = (string)$this->descto1001;
   $this->precio1101 = $rs->fields[109] ;  
   $this->precio1101 = (strpos(strtolower($this->precio1101), "e")) ? (float)$this->precio1101 : $this->precio1101; 
   $this->precio1101 = (string)$this->precio1101;
   $this->descto1101 = $rs->fields[110] ;  
   $this->descto1101 = str_replace(",", ".", $this->descto1101);
   $this->descto1101 = (strpos(strtolower($this->descto1101), "e")) ? (float)$this->descto1101 : $this->descto1101; 
   $this->descto1101 = (string)$this->descto1101;
   $this->precio1201 = $rs->fields[111] ;  
   $this->precio1201 = (strpos(strtolower($this->precio1201), "e")) ? (float)$this->precio1201 : $this->precio1201; 
   $this->precio1201 = (string)$this->precio1201;
   $this->descto1201 = $rs->fields[112] ;  
   $this->descto1201 = str_replace(",", ".", $this->descto1201);
   $this->descto1201 = (strpos(strtolower($this->descto1201), "e")) ? (float)$this->descto1201 : $this->descto1201; 
   $this->descto1201 = (string)$this->descto1201;
   $this->submarca01 = $rs->fields[113] ;  
   $this->modelo01 = $rs->fields[114] ;  
   $this->clasific01 = $rs->fields[115] ;  
   $this->codbarempaque01 = $rs->fields[116] ;  
   $this->unidadempaque01 = $rs->fields[117] ;  
   $this->dimensionempaque01 = $rs->fields[118] ;  
   $this->link01 = $rs->fields[119] ;  
   $this->desprod201 = $rs->fields[120] ;  
   $this->desprod301 = $rs->fields[121] ;  
   $this->coefprd01 = $rs->fields[122] ;  
   $this->coefprd01 = (strpos(strtolower($this->coefprd01), "e")) ? (float)$this->coefprd01 : $this->coefprd01; 
   $this->coefprd01 = (string)$this->coefprd01;
   $this->infor01 = $rs->fields[123] ;  
   $this->infor03 = $rs->fields[124] ;  
   $this->infor05 = $rs->fields[125] ;  
   $this->infor07 = $rs->fields[126] ;  
   $this->porcenrenta = $rs->fields[127] ;  
   $this->porcenrenta = (strpos(strtolower($this->porcenrenta), "e")) ? (float)$this->porcenrenta : $this->porcenrenta; 
   $this->porcenrenta = (string)$this->porcenrenta;
   $this->peso = $rs->fields[128] ;  
   $this->consignado = $rs->fields[129] ;  
   $this->cant_consignado = $rs->fields[130] ;  
   $this->cant_consignado = (string)$this->cant_consignado;
   $this->baseimpexe01 = $rs->fields[131] ;  
   $this->peso01 = $rs->fields[132] ;  
   $this->peso01 = (strpos(strtolower($this->peso01), "e")) ? (float)$this->peso01 : $this->peso01; 
   $this->peso01 = (string)$this->peso01;
   $this->prodrel01 = $rs->fields[133] ;  
   $this->infor02 = $rs->fields[134] ;  
   $this->infor04 = $rs->fields[135] ;  
   $this->infor06 = $rs->fields[136] ;  
   $this->infor08 = $rs->fields[137] ;  
   $this->porcicevta01 = $rs->fields[138] ;  
   $this->porcicevta01 = str_replace(",", ".", $this->porcicevta01);
   $this->porcicevta01 = (string)$this->porcicevta01;
   $this->porcicecpra01 = $rs->fields[139] ;  
   $this->porcicecpra01 = str_replace(",", ".", $this->porcicecpra01);
   $this->porcicecpra01 = (string)$this->porcicecpra01;
   $this->porcptdaranc01 = $rs->fields[140] ;  
   $this->porcptdaranc01 = str_replace(",", ".", $this->porcptdaranc01);
   $this->porcptdaranc01 = (string)$this->porcptdaranc01;
   $this->ordimp01 = $rs->fields[141] ;  
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['cmp_acum']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['cmp_acum']))
   {
       $parms_acum = explode(";", $_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['cmp_acum']);
       foreach ($parms_acum as $cada_par)
       {
          $cada_val = explode("=", $cada_par);
          $this->$cada_val[0] = $cada_val[1];
       }
   }
//--- 
   $nm_saida->saida("<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.01 Transitional//EN\"\r\n");
   $nm_saida->saida("            \"http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd\">\r\n");
   $nm_saida->saida("<html" . $_SESSION['scriptcase']['reg_conf']['html_dir'] . ">\r\n");
   $nm_saida->saida("<HEAD>\r\n");
   $nm_saida->saida("   <TITLE>" . $this->Ini->Nm_lang['lang_othr_detl_title'] . " maepro</TITLE>\r\n");
   $nm_saida->saida(" <META http-equiv=\"Content-Type\" content=\"text/html; charset=" . $_SESSION['scriptcase']['charset_html'] . "\" />\r\n");
   $nm_saida->saida(" <META http-equiv=\"Expires\" content=\"Fri, Jan 01 1900 00:00:00 GMT\"/>\r\n");
   $nm_saida->saida(" <META http-equiv=\"Last-Modified\" content=\"" . gmdate("D, d M Y H:i:s") . " GMT\"/>\r\n");
   $nm_saida->saida(" <META http-equiv=\"Cache-Control\" content=\"no-store, no-cache, must-revalidate\"/>\r\n");
   $nm_saida->saida(" <META http-equiv=\"Cache-Control\" content=\"post-check=0, pre-check=0\"/>\r\n");
   $nm_saida->saida(" <META http-equiv=\"Pragma\" content=\"no-cache\"/>\r\n");
   $nm_saida->saida(" <link rel=\"shortcut icon\" href=\"../_lib/img/scriptcase__NM__ico__NM__favicon.ico\">\r\n");
   if ($_SESSION['scriptcase']['proc_mobile'])
   {
       $nm_saida->saida(" <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0\" />\r\n");
   }

           $nm_saida->saida("   <script type=\"text/javascript\" src=\"grid_maepro_jquery-3.6.0.min.js\"></script>\r\n");
           $nm_saida->saida("   <script type=\"text/javascript\" src=\"grid_maepro_ajax.js\"></script>\r\n");
           $nm_saida->saida("   <script type=\"text/javascript\" src=\"grid_maepro_message.js\"></script>\r\n");
           $nm_saida->saida("   <script type=\"text/javascript\">\r\n");
           $nm_saida->saida("     var applicationKeys = '';\r\n");
           $nm_saida->saida("     applicationKeys += 'alt+q';\r\n");
           $nm_saida->saida("     applicationKeys += ',';\r\n");
           $nm_saida->saida("     applicationKeys += 'alt+p';\r\n");
           $nm_saida->saida("     applicationKeys += ',';\r\n");
           $nm_saida->saida("     applicationKeys += 'ctrl+p';\r\n");
           $nm_saida->saida("     applicationKeys += ',';\r\n");
           $nm_saida->saida("     applicationKeys += 'f1';\r\n");
           $nm_saida->saida("     applicationKeys += ',';\r\n");
           $nm_saida->saida("     applicationKeys += 'alt+shift+p';\r\n");
           $nm_saida->saida("     applicationKeys += ',';\r\n");
           $nm_saida->saida("     applicationKeys += 'alt+shift+h';\r\n");
           $nm_saida->saida("     var hotkeyList = '';\r\n");
           $nm_saida->saida("     function execHotKey(e, h) {\r\n");
           $nm_saida->saida("         var hotkey_fired = false\r\n");
           $nm_saida->saida("         switch (true) {\r\n");
           $nm_saida->saida("             case (['alt+q'].indexOf(h.key) > -1):\r\n");
           $nm_saida->saida("                 hotkey_fired = process_hotkeys('sys_format_sai');\r\n");
           $nm_saida->saida("                 break;\r\n");
           $nm_saida->saida("             case (['alt+p'].indexOf(h.key) > -1):\r\n");
           $nm_saida->saida("                 hotkey_fired = process_hotkeys('sys_format_pdf');\r\n");
           $nm_saida->saida("                 break;\r\n");
           $nm_saida->saida("             case (['ctrl+p'].indexOf(h.key) > -1):\r\n");
           $nm_saida->saida("                 hotkey_fired = process_hotkeys('sys_format_imp');\r\n");
           $nm_saida->saida("                 break;\r\n");
           $nm_saida->saida("             case (['f1'].indexOf(h.key) > -1):\r\n");
           $nm_saida->saida("                 hotkey_fired = process_hotkeys('sys_format_webh');\r\n");
           $nm_saida->saida("                 break;\r\n");
           $nm_saida->saida("             case (['alt+shift+p'].indexOf(h.key) > -1):\r\n");
           $nm_saida->saida("                 hotkey_fired = process_hotkeys('sys_format_email_pdf');\r\n");
           $nm_saida->saida("                 break;\r\n");
           $nm_saida->saida("             case (['alt+shift+h'].indexOf(h.key) > -1):\r\n");
           $nm_saida->saida("                 hotkey_fired = process_hotkeys('sys_format_email_html');\r\n");
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
   $nm_saida->saida(" <script type=\"text/javascript\" src=\"../_lib/lib/js/jquery-3.6.0.min.js\"></script>\r\n");
           $nm_saida->saida("   <link rel=\"stylesheet\" type=\"text/css\" href=\"" . $this->Ini->path_prod . "/third/jquery_plugin/viewerjs/viewer.css\" />\r\n");
           $nm_saida->saida("   <script type=\"text/javascript\" src=\"" . $this->Ini->path_prod . "/third/jquery_plugin/viewerjs/viewer.js\"></script>\r\n");
$nm_saida->saida("<script>\r\n");
$nm_saida->saida("function ajax_check_file(img_name, field , i , p, p_cache){\r\n");
$nm_saida->saida("    $(document).ready(function(){\r\n");
$nm_saida->saida("        $('#id_sc_field_'+ field +'_'+i+'> img').attr('src', '" . $this->Ini->path_icones . "/ scriptcase__NM__ajax_load.gif');\r\n");
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
$nm_saida->saida("                        if( $('.css_'+field+'_det_line a img').length > 0){\r\n");
$nm_saida->saida("                            $('.css_'+field+'_det_line a img').attr('src', rs.split('_@@NM@@_')[1]);\r\n");
$nm_saida->saida("                            var __tmp = $('.css_'+field+'_det_line a').attr('href').split(\"',\")\r\n");
$nm_saida->saida("                            __tmp[0] = \"javascript:nm_mostra_img('\" + rs.split('_@@NM@@_')[0];\r\n");
$nm_saida->saida("                            $('.css_'+field+'_det_line a').attr('href',__tmp.join(\"',\"));\r\n");
$nm_saida->saida("                        }else if($('.css_'+field+'_det_line a').length > 0){\r\n");
$nm_saida->saida("                            var __tmp = $('.css_'+field+'_det_line a').attr('href').split(\"',\");\r\n");
$nm_saida->saida("                            var __file_doc = __tmp[0].split('@SC_par@');\r\n");
$nm_saida->saida("                            var ___file_doc = __file_doc[3].split(\"'\");\r\n");
$nm_saida->saida("                            ___file_doc[0] = rs.split('_@@NM@@_')[1];\r\n");
$nm_saida->saida("                            __file_doc[3] = ___file_doc.join(\"'\");\r\n");
$nm_saida->saida("                            __tmp[0] = __file_doc.join('@SC_par@');\r\n");
$nm_saida->saida("                            $('.css_'+field+'_det_line a').attr('href', __tmp.join(\"',\"));\r\n");
$nm_saida->saida("                        }\r\n");
$nm_saida->saida("                    }\r\n");
$nm_saida->saida("                });\r\n");
$nm_saida->saida("    });\r\n");
$nm_saida->saida("}\r\n");
$nm_saida->saida("</script>\r\n");
   $nm_saida->saida(" <script type=\"text/javascript\" src=\"" . $this->Ini->path_prod . "/third/jquery_plugin/malsup-blockui/jquery.blockUI.js\"></script>\r\n");
           $nm_saida->saida(" <script type=\"text/javascript\">\r\n");
           $nm_saida->saida("  var sc_pathToTB = '" . $this->Ini->path_prod . "/third/jquery_plugin/thickbox/';\r\n");
           $nm_saida->saida("  var sc_tbLangClose = \"" . html_entity_decode($this->Ini->Nm_lang['lang_tb_close'], ENT_COMPAT, $_SESSION['scriptcase']['charset']) . "\";\r\n");
           $nm_saida->saida("  var sc_tbLangEsc = \"" . html_entity_decode($this->Ini->Nm_lang['lang_tb_esc'], ENT_COMPAT, $_SESSION['scriptcase']['charset']) . "\";\r\n");
           $nm_saida->saida(" </script>\r\n");
   $nm_saida->saida(" <script type=\"text/javascript\" src=\"" . $this->Ini->path_prod . "/third/jquery_plugin/thickbox/thickbox-compressed.js\"></script>\r\n");
           $nm_saida->saida("   <script type=\"text/javascript\">\r\n");
           $nm_saida->saida("     var sc_ajaxBg = '" . $this->Ini->Color_bg_ajax . "';\r\n");
           $nm_saida->saida("     var sc_ajaxBordC = '" . $this->Ini->Border_c_ajax . "';\r\n");
           $nm_saida->saida("     var sc_ajaxBordS = '" . $this->Ini->Border_s_ajax . "';\r\n");
           $nm_saida->saida("     var sc_ajaxBordW = '" . $this->Ini->Border_w_ajax . "';\r\n");
           $nm_saida->saida("   </script>\r\n");
   $nm_saida->saida(" <link rel=\"stylesheet\" href=\"" . $this->Ini->path_prod . "/third/jquery_plugin/thickbox/thickbox.css\" type=\"text/css\" media=\"screen\" />\r\n");
   if (($this->Ini->sc_export_ajax || $this->Ini->Export_det_zip) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['det_print'] == "print")
   {
       if (strtoupper($nmgp_cor_print) == "PB")
       {
           $NM_css_file = $this->Ini->str_schema_all . "_grid_bw.css";
           $NM_css_dir  = $this->Ini->str_schema_all . "_grid_bw" . $_SESSION['scriptcase']['reg_conf']['css_dir'] . ".css";
       }
       else
       {
           $NM_css_file = $this->Ini->str_schema_all . "_grid.css";
           $NM_css_dir  = $this->Ini->str_schema_all . "_grid" . $_SESSION['scriptcase']['reg_conf']['css_dir'] . ".css";
       }
       $NM_css_cmp  = $this->Ini->path_link . "grid_maepro/grid_maepro_det_" . strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) . ".css";
       $nm_saida->saida("  <style type=\"text/css\">\r\n");
       if (is_file($this->Ini->path_css . $NM_css_file))
       {
           $NM_css_attr = file($this->Ini->path_css . $NM_css_file);
           foreach ($NM_css_attr as $NM_line_css)
           {
               $nm_saida->saida(" " . $NM_line_css . " \r\n");
           }
       }
       if (is_file($this->Ini->path_css . $NM_css_dir))
       {
           $NM_css_attr = file($this->Ini->path_css . $NM_css_dir);
           foreach ($NM_css_attr as $NM_line_css)
           {
               $nm_saida->saida(" " . $NM_line_css . " \r\n");
           }
       }
       if (is_file($this->Ini->root . $NM_css_cmp))
       {
           $NM_css_attr = file($this->Ini->root . $NM_css_cmp);
           foreach ($NM_css_attr as $NM_line_css)
           {
               $nm_saida->saida(" " . $NM_line_css . " \r\n");
           }
       }
       $nm_saida->saida("  </style>\r\n");
   }
   elseif (($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['det_print'] == "print" && strtoupper($nmgp_cor_print) == "PB") || $nmgp_tipo_pdf == "pb")
   {
       $nm_saida->saida(" <link rel=\"stylesheet\" type=\"text/css\" href=\"" . $this->Ini->path_link . "_lib/css/" . $this->Ini->str_schema_all . "_grid_bw.css\" /> \r\n");
       $nm_saida->saida(" <link rel=\"stylesheet\" type=\"text/css\" href=\"" . $this->Ini->path_link . "_lib/css/" . $this->Ini->str_schema_all . "_grid_bw" . $_SESSION['scriptcase']['reg_conf']['css_dir'] . ".css\" /> \r\n");
       $nm_saida->saida(" <link rel=\"stylesheet\" type=\"text/css\" href=\"" . $this->Ini->path_link . "grid_maepro/grid_maepro_det_" . strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) . ".css\" />\r\n");
   }
   else
   {
       $nm_saida->saida(" <link rel=\"stylesheet\" type=\"text/css\" href=\"" . $this->Ini->path_link . "_lib/css/" . $this->Ini->str_schema_all . "_grid.css\" /> \r\n");
       $nm_saida->saida(" <link rel=\"stylesheet\" type=\"text/css\" href=\"" . $this->Ini->path_link . "_lib/css/" . $this->Ini->str_schema_all . "_grid" . $_SESSION['scriptcase']['reg_conf']['css_dir'] . ".css\" /> \r\n");
       $nm_saida->saida(" <link rel=\"stylesheet\" type=\"text/css\" href=\"" . $this->Ini->path_link . "grid_maepro/grid_maepro_det_" . strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) . ".css\" />\r\n");
   }
       $nm_saida->saida(" <link rel=\"stylesheet\" href=\"" . $this->Ini->path_prod . "/third/font-awesome/css/all.min.css\" type=\"text/css\" media=\"screen\" />\r\n");
   if(isset($this->Ini->str_google_fonts) && !empty($this->Ini->str_google_fonts)) 
   { 
       $nm_saida->saida(" <link href=\"" . $this->Ini->str_google_fonts . "\" rel=\"stylesheet\" /> \r\n");
   } 
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['pdf_det'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['det_print'] != "print")
   {
       $nm_saida->saida(" <link rel=\"stylesheet\" type=\"text/css\" href=\"../_lib/buttons/" . $this->Ini->Str_btn_css . "\" /> \r\n");
       $nm_saida->saida(" <link rel=\"stylesheet\" href=\"../_lib/css/" . $_SESSION['scriptcase']['erro']['str_schema'] . "\" type=\"text/css\" media=\"screen\" />\r\n");
       $nm_saida->saida(" <link rel=\"stylesheet\" href=\"../_lib/css/" . $_SESSION['scriptcase']['erro']['str_schema_dir'] . "\" type=\"text/css\" media=\"screen\" />\r\n");
   }
   $nm_saida->saida("</HEAD>\r\n");
    $removeMargin = isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['link_info']['remove_margin']) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['link_info']['remove_margin'] ? 'margin: 0;' : '';
    $removeBorder = isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['link_info']['remove_border']) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['link_info']['remove_border'] ? 'border-width: 0' : '';
   if (!$this->Ini->Export_html_zip && !$this->Ini->Export_det_zip && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['det_print'] == "print")
   {
       $nm_saida->saida(" <link rel=\"stylesheet\" type=\"text/css\" href=\"../_lib/buttons/" . $this->Ini->Str_btn_css . "\" /> \r\n");
       $nm_saida->saida("  <body id=\"grid_detail\" class=\"scGridPage\"  style=\"-webkit-print-color-adjust: exact;" . $removeMargin . "\">\r\n");
       $nm_saida->saida("   <TABLE id=\"sc_table_print\" cellspacing=0 cellpadding=0 align=\"center\" valign=\"top\" >\r\n");
       $nm_saida->saida("     <TR>\r\n");
       $nm_saida->saida("       <TD>\r\n");
       $Cod_Btn = nmButtonOutput($this->arr_buttons, "bprint", "prit_web_page()", "prit_web_page()", "Bprint_print", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
       $nm_saida->saida("           $Cod_Btn \r\n");
       $nm_saida->saida("       </TD>\r\n");
       $nm_saida->saida("     </TR>\r\n");
       $nm_saida->saida("   </TABLE>\r\n");
       $nm_saida->saida("  <script type=\"text/javascript\">\r\n");
       $nm_saida->saida("     function prit_web_page()\r\n");
       $nm_saida->saida("     {\r\n");
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
       $nm_saida->saida("  <body id=\"grid_detail\" class=\"scGridPage\" style=\"" . $removeMargin . "\">\r\n");
   }
   $nm_saida->saida("  " . $this->Ini->Ajax_result_set . "\r\n");
           $nm_saida->saida("  <div id=\"id_div_process\" style=\"display: none; margin: 10px; whitespace: nowrap\" class=\"scFormProcessFixed\"><span class=\"scFormProcess\"><img border=\"0\" src=\"" . $this->Ini->path_icones . "/scriptcase__NM__ajax_load.gif\" align=\"absmiddle\" />&nbsp;" . $this->Ini->Nm_lang['lang_othr_prcs'] . "...</span></div>\r\n");
           $nm_saida->saida("  <div id=\"id_div_process_block\" style=\"display: none; margin: 10px; whitespace: nowrap\"><span class=\"scFormProcess\"><img border=\"0\" src=\"" . $this->Ini->path_icones . "/scriptcase__NM__ajax_load.gif\" align=\"absmiddle\" />&nbsp;" . $this->Ini->Nm_lang['lang_othr_prcs'] . "...</span></div>\r\n");
   $nm_saida->saida("<table border=0 align=\"center\" valign=\"top\" ><tr><td style=\"padding: 0px\"><div class=\"scGridBorder\" style=\"" . $removeBorder . "\"><table width='100%' cellspacing=0 cellpadding=0><tr><td>\r\n");
   if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['link_info']['compact_mode']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['link_info']['compact_mode']) {
   $nm_saida->saida("<tr><td class=\"scGridTabelaTd scGridPage\">\r\n");
   $nm_saida->saida("<style>\r\n");
   $nm_saida->saida("    .scMenuTHeaderFont img, .scGridHeaderFont img , .scFormHeaderFont img , .scTabHeaderFont img , .scContainerHeaderFont img , .scFilterHeaderFont img { height:23px;}\r\n");
   $nm_saida->saida("</style>\r\n");
   $nm_saida->saida("<div class=\"scGridHeader\" style=\"height: 54px; padding: 17px 15px; box-sizing: border-box;margin: -1px 0px 0px 0px;width: 100%;\">\r\n");
   $nm_saida->saida("    <div class=\"scGridHeaderFont\" style=\"float: left; text-transform: uppercase;\"></div>\r\n");
   $nm_saida->saida("    <div class=\"scGridHeaderFont\" style=\"float: right;\"></div>\r\n");
   $nm_saida->saida("</div>\r\n");
   $nm_saida->saida("  </TD>\r\n");
   $nm_saida->saida(" </TR>\r\n");
   }
   if(isset($_SESSION['scriptcase']['proc_mobile']) && $_SESSION['scriptcase']['proc_mobile'])
   {
       $this->nmgp_barra_det_top_mobile();
   }
   else
   {
       $this->nmgp_barra_det_top_normal();
   }
   $nm_saida->saida("<tr><td class=\"scGridTabelaTd\" id='idDetailTable'>\r\n");
   $nm_saida->saida("<TABLE style=\"padding: 0px; spacing: 0px; border-width: 0px;\" class=\"scGridTabela\" align=\"center\" valign=\"top\" width=\"100%\">\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['codprod01'])) ? $this->New_label['codprod01'] : "Codprod 01"; 
   $conteudo = trim(sc_strip_script($this->codprod01)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'codprod01', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'codprod01', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_codprod01_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_codprod01_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['desprod01'])) ? $this->New_label['desprod01'] : "Desprod 01"; 
   $conteudo = trim(sc_strip_script($this->desprod01)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'desprod01', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'desprod01', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_desprod01_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_desprod01_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['cve101'])) ? $this->New_label['cve101'] : "Cve 101"; 
   $conteudo = trim(sc_strip_script($this->cve101)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'cve101', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'cve101', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_cve101_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_cve101_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['cve201'])) ? $this->New_label['cve201'] : "Cve 201"; 
   $conteudo = trim(sc_strip_script($this->cve201)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'cve201', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'cve201', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_cve201_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_cve201_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['unidmed01'])) ? $this->New_label['unidmed01'] : "Unidmed 01"; 
   $conteudo = trim(sc_strip_script($this->unidmed01)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'unidmed01', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'unidmed01', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_unidmed01_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_unidmed01_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['cantmin01'])) ? $this->New_label['cantmin01'] : "Cantmin 01"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->cantmin01))); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'cantmin01', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'cantmin01', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_cantmin01_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_cantmin01_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['cantact01'])) ? $this->New_label['cantact01'] : "Cantact 01"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->cantact01))); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'cantact01', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'cantact01', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_cantact01_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_cantact01_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['valact01'])) ? $this->New_label['valact01'] : "Valact 01"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->valact01))); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'valact01', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'valact01', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_valact01_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_valact01_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['exipromo01'])) ? $this->New_label['exipromo01'] : "Exipromo 01"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->exipromo01))); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'exipromo01', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'exipromo01', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_exipromo01_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_exipromo01_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['precuni01'])) ? $this->New_label['precuni01'] : "Precuni 01"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->precuni01))); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'precuni01', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'precuni01', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_precuni01_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_precuni01_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['pedpend01'])) ? $this->New_label['pedpend01'] : "Pedpend 01"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->pedpend01))); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'pedpend01', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'pedpend01', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_pedpend01_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_pedpend01_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['orden01'])) ? $this->New_label['orden01'] : "Orden 01"; 
   $conteudo = trim(sc_strip_script($this->orden01)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'orden01', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'orden01', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_orden01_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_orden01_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['refer01'])) ? $this->New_label['refer01'] : "Refer 01"; 
   $conteudo = trim(sc_strip_script($this->refer01)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'refer01', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'refer01', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_refer01_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_refer01_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['canentm01'])) ? $this->New_label['canentm01'] : "Canentm 01"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->canentm01))); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'canentm01', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'canentm01', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_canentm01_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_canentm01_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['valentm01'])) ? $this->New_label['valentm01'] : "Valentm 01"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->valentm01))); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'valentm01', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'valentm01', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_valentm01_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_valentm01_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['cansalm01'])) ? $this->New_label['cansalm01'] : "Cansalm 01"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->cansalm01))); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'cansalm01', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'cansalm01', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_cansalm01_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_cansalm01_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['valsalm01'])) ? $this->New_label['valsalm01'] : "Valsalm 01"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->valsalm01))); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'valsalm01', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'valsalm01', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_valsalm01_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_valsalm01_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['canenta01'])) ? $this->New_label['canenta01'] : "Canenta 01"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->canenta01))); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'canenta01', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'canenta01', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_canenta01_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_canenta01_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['valenta01'])) ? $this->New_label['valenta01'] : "Valenta 01"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->valenta01))); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'valenta01', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'valenta01', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_valenta01_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_valenta01_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['cansala01'])) ? $this->New_label['cansala01'] : "Cansala 01"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->cansala01))); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'cansala01', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'cansala01', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_cansala01_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_cansala01_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['valsala01'])) ? $this->New_label['valsala01'] : "Valsala 01"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->valsala01))); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'valsala01', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'valsala01', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_valsala01_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_valsala01_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['fecape01'])) ? $this->New_label['fecape01'] : "Fecape 01"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->fecape01))); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
               if (substr($conteudo, 10, 1) == "-") 
               { 
                  $conteudo = substr($conteudo, 0, 10) . " " . substr($conteudo, 11);
               } 
               if (substr($conteudo, 13, 1) == ".") 
               { 
                  $conteudo = substr($conteudo, 0, 13) . ":" . substr($conteudo, 14, 2) . ":" . substr($conteudo, 17);
               } 
               $conteudo_x =  $conteudo;
               nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD HH:II:SS");
               if (is_numeric($conteudo_x) && $conteudo_x > 0) 
               { 
                   $this->nm_data->SetaData($conteudo, "YYYY-MM-DD HH:II:SS");
                   $conteudo = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DH", "ddmmaaaa;hhiiss"));
               } 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'fecape01', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'fecape01', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_fecape01_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_fecape01_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['fecult01'])) ? $this->New_label['fecult01'] : "Fecult 01"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->fecult01))); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
               if (substr($conteudo, 10, 1) == "-") 
               { 
                  $conteudo = substr($conteudo, 0, 10) . " " . substr($conteudo, 11);
               } 
               if (substr($conteudo, 13, 1) == ".") 
               { 
                  $conteudo = substr($conteudo, 0, 13) . ":" . substr($conteudo, 14, 2) . ":" . substr($conteudo, 17);
               } 
               $conteudo_x =  $conteudo;
               nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD HH:II:SS");
               if (is_numeric($conteudo_x) && $conteudo_x > 0) 
               { 
                   $this->nm_data->SetaData($conteudo, "YYYY-MM-DD HH:II:SS");
                   $conteudo = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DH", "ddmmaaaa;hhiiss"));
               } 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'fecult01', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'fecult01', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_fecult01_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_fecult01_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['fecvta01'])) ? $this->New_label['fecvta01'] : "Fecvta 01"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->fecvta01))); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
               if (substr($conteudo, 10, 1) == "-") 
               { 
                  $conteudo = substr($conteudo, 0, 10) . " " . substr($conteudo, 11);
               } 
               if (substr($conteudo, 13, 1) == ".") 
               { 
                  $conteudo = substr($conteudo, 0, 13) . ":" . substr($conteudo, 14, 2) . ":" . substr($conteudo, 17);
               } 
               $conteudo_x =  $conteudo;
               nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD HH:II:SS");
               if (is_numeric($conteudo_x) && $conteudo_x > 0) 
               { 
                   $this->nm_data->SetaData($conteudo, "YYYY-MM-DD HH:II:SS");
                   $conteudo = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DH", "ddmmaaaa;hhiiss"));
               } 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'fecvta01', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'fecvta01', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_fecvta01_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_fecvta01_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['ubic01'])) ? $this->New_label['ubic01'] : "Ubic 01"; 
   $conteudo = trim(sc_strip_script($this->ubic01)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'ubic01', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'ubic01', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_ubic01_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_ubic01_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['precvta01'])) ? $this->New_label['precvta01'] : "Precvta 01"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->precvta01))); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "4", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'precvta01', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'precvta01', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_precvta01_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_precvta01_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['descto101'])) ? $this->New_label['descto101'] : "Descto 101"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->descto101))); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'descto101', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'descto101', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_descto101_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_descto101_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['precio201'])) ? $this->New_label['precio201'] : "Precio 201"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->precio201))); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "4", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'precio201', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'precio201', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_precio201_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_precio201_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['descto201'])) ? $this->New_label['descto201'] : "Descto 201"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->descto201))); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'descto201', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'descto201', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_descto201_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_descto201_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['precio301'])) ? $this->New_label['precio301'] : "Precio 301"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->precio301))); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "4", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'precio301', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'precio301', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_precio301_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_precio301_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['descto301'])) ? $this->New_label['descto301'] : "Descto 301"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->descto301))); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'descto301', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'descto301', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_descto301_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_descto301_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['canvtam01'])) ? $this->New_label['canvtam01'] : "Canvtam 01"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->canvtam01))); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'canvtam01', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'canvtam01', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_canvtam01_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_canvtam01_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['valvtam01'])) ? $this->New_label['valvtam01'] : "Valvtam 01"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->valvtam01))); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'valvtam01', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'valvtam01', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_valvtam01_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_valvtam01_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['cosvtam01'])) ? $this->New_label['cosvtam01'] : "Cosvtam 01"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->cosvtam01))); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'cosvtam01', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'cosvtam01', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_cosvtam01_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_cosvtam01_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['canvtaa01'])) ? $this->New_label['canvtaa01'] : "Canvtaa 01"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->canvtaa01))); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'canvtaa01', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'canvtaa01', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_canvtaa01_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_canvtaa01_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['valvtaa01'])) ? $this->New_label['valvtaa01'] : "Valvtaa 01"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->valvtaa01))); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'valvtaa01', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'valvtaa01', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_valvtaa01_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_valvtaa01_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['cosvtaa01'])) ? $this->New_label['cosvtaa01'] : "Cosvtaa 01"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->cosvtaa01))); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'cosvtaa01', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'cosvtaa01', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_cosvtaa01_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_cosvtaa01_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['prod1alt01'])) ? $this->New_label['prod1alt01'] : "Prod 1alt 01"; 
   $conteudo = trim(sc_strip_script($this->prod1alt01)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'prod1alt01', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'prod1alt01', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_prod1alt01_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_prod1alt01_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['prod2alt01'])) ? $this->New_label['prod2alt01'] : "Prod 2alt 01"; 
   $conteudo = trim(sc_strip_script($this->prod2alt01)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'prod2alt01', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'prod2alt01', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_prod2alt01_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_prod2alt01_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['proved101'])) ? $this->New_label['proved101'] : "Proved 101"; 
   $conteudo = trim(sc_strip_script($this->proved101)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'proved101', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'proved101', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_proved101_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_proved101_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['proved201'])) ? $this->New_label['proved201'] : "Proved 201"; 
   $conteudo = trim(sc_strip_script($this->proved201)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'proved201', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'proved201', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_proved201_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_proved201_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['med101'])) ? $this->New_label['med101'] : "Med 101"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->med101))); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "5", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'med101', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'med101', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_med101_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_med101_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['med201'])) ? $this->New_label['med201'] : "Med 201"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->med201))); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "5", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'med201', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'med201', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_med201_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_med201_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['med301'])) ? $this->New_label['med301'] : "Med 301"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->med301))); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "5", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'med301', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'med301', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_med301_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_med301_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['factor01'])) ? $this->New_label['factor01'] : "Factor 01"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->factor01))); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'factor01', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'factor01', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_factor01_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_factor01_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['cvserie01'])) ? $this->New_label['cvserie01'] : "Cvserie 01"; 
   $conteudo = trim(sc_strip_script($this->cvserie01)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'cvserie01', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'cvserie01', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_cvserie01_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_cvserie01_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['ctain101'])) ? $this->New_label['ctain101'] : "Ctain 101"; 
   $conteudo = trim(sc_strip_script($this->ctain101)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'ctain101', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'ctain101', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_ctain101_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_ctain101_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['ctain201'])) ? $this->New_label['ctain201'] : "Ctain 201"; 
   $conteudo = trim(sc_strip_script($this->ctain201)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'ctain201', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'ctain201', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_ctain201_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_ctain201_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['ctain301'])) ? $this->New_label['ctain301'] : "Ctain 301"; 
   $conteudo = trim(sc_strip_script($this->ctain301)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'ctain301', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'ctain301', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_ctain301_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_ctain301_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['porciva01'])) ? $this->New_label['porciva01'] : "Porciva 01"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->porciva01))); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'porciva01', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'porciva01', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_porciva01_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_porciva01_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['prodsinsdo01'])) ? $this->New_label['prodsinsdo01'] : "Prodsinsdo 01"; 
   $conteudo = trim(sc_strip_script($this->prodsinsdo01)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'prodsinsdo01', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'prodsinsdo01', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_prodsinsdo01_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_prodsinsdo01_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['sinprec01'])) ? $this->New_label['sinprec01'] : "Sinprec 01"; 
   $conteudo = trim(sc_strip_script($this->sinprec01)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'sinprec01', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'sinprec01', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_sinprec01_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_sinprec01_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['fotoprod01'])) ? $this->New_label['fotoprod01'] : "Fotoprod 01"; 
   $conteudo = trim(sc_strip_script($this->fotoprod01)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'fotoprod01', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'fotoprod01', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_fotoprod01_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_fotoprod01_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['detprod01'])) ? $this->New_label['detprod01'] : "Detprod 01"; 
   $conteudo = trim(sc_strip_script($this->detprod01)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'detprod01', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'detprod01', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_detprod01_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_detprod01_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['block'])) ? $this->New_label['block'] : "Block"; 
   $conteudo = trim(sc_strip_script($this->block)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'block', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'block', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_block_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_block_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['uid'])) ? $this->New_label['uid'] : "UID"; 
   $conteudo = trim(sc_strip_script($this->uid)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'uid', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'uid', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_uid_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_uid_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['ultimoacceso'])) ? $this->New_label['ultimoacceso'] : "Ultimoacceso"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->ultimoacceso))); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
               if (substr($conteudo, 10, 1) == "-") 
               { 
                  $conteudo = substr($conteudo, 0, 10) . " " . substr($conteudo, 11);
               } 
               if (substr($conteudo, 13, 1) == ".") 
               { 
                  $conteudo = substr($conteudo, 0, 13) . ":" . substr($conteudo, 14, 2) . ":" . substr($conteudo, 17);
               } 
               $conteudo_x =  $conteudo;
               nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD HH:II:SS");
               if (is_numeric($conteudo_x) && $conteudo_x > 0) 
               { 
                   $this->nm_data->SetaData($conteudo, "YYYY-MM-DD HH:II:SS");
                   $conteudo = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DH", "ddmmaaaa;hhiiss"));
               } 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'ultimoacceso', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'ultimoacceso', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_ultimoacceso_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_ultimoacceso_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['idpro'])) ? $this->New_label['idpro'] : "Idpro"; 
   $conteudo = trim(sc_strip_script($this->idpro)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'idpro', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'idpro', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_idpro_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_idpro_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['catprod01'])) ? $this->New_label['catprod01'] : "Catprod 01"; 
   $conteudo = trim(sc_strip_script($this->catprod01)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'catprod01', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'catprod01', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_catprod01_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_catprod01_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['med401'])) ? $this->New_label['med401'] : "Med 401"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->med401))); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "5", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'med401', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'med401', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_med401_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_med401_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['med501'])) ? $this->New_label['med501'] : "Med 501"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->med501))); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "5", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'med501', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'med501', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_med501_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_med501_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['prodconmed01'])) ? $this->New_label['prodconmed01'] : "Prodconmed 01"; 
   $conteudo = trim(sc_strip_script($this->prodconmed01)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'prodconmed01', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'prodconmed01', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_prodconmed01_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_prodconmed01_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['factorpeso01'])) ? $this->New_label['factorpeso01'] : "Factorpeso 01"; 
   $conteudo = trim(sc_strip_script($this->factorpeso01)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'factorpeso01', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'factorpeso01', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_factorpeso01_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_factorpeso01_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['codbar01'])) ? $this->New_label['codbar01'] : "Codbar 01"; 
   $conteudo = trim(sc_strip_script($this->codbar01)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'codbar01', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'codbar01', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_codbar01_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_codbar01_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['unifrac01'])) ? $this->New_label['unifrac01'] : "Unifrac 01"; 
   $conteudo = trim(sc_strip_script($this->unifrac01)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'unifrac01', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'unifrac01', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_unifrac01_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_unifrac01_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['calidad01'])) ? $this->New_label['calidad01'] : "Calidad 01"; 
   $conteudo = trim(sc_strip_script($this->calidad01)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'calidad01', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'calidad01', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_calidad01_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_calidad01_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['color01'])) ? $this->New_label['color01'] : "Color 01"; 
   $conteudo = trim(sc_strip_script($this->color01)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'color01', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'color01', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_color01_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_color01_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['material01'])) ? $this->New_label['material01'] : "Material 01"; 
   $conteudo = trim(sc_strip_script($this->material01)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'material01', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'material01', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_material01_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_material01_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['talla01'])) ? $this->New_label['talla01'] : "Talla 01"; 
   $conteudo = trim(sc_strip_script($this->talla01)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'talla01', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'talla01', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_talla01_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_talla01_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['compuesto01'])) ? $this->New_label['compuesto01'] : "Compuesto 01"; 
   $conteudo = trim(sc_strip_script($this->compuesto01)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'compuesto01', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'compuesto01', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_compuesto01_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_compuesto01_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['catalt01'])) ? $this->New_label['catalt01'] : "Catalt 01"; 
   $conteudo = trim(sc_strip_script($this->catalt01)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'catalt01', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'catalt01', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_catalt01_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_catalt01_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['precfob01'])) ? $this->New_label['precfob01'] : "Precfob 01"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->precfob01))); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'precfob01', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'precfob01', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_precfob01_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_precfob01_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['precio401'])) ? $this->New_label['precio401'] : "Precio 401"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->precio401))); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "4", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'precio401', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'precio401', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_precio401_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_precio401_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['descto401'])) ? $this->New_label['descto401'] : "Descto 401"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->descto401))); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'descto401', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'descto401', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_descto401_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_descto401_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['porigen01'])) ? $this->New_label['porigen01'] : "Porigen 01"; 
   $conteudo = trim(sc_strip_script($this->porigen01)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'porigen01', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'porigen01', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_porigen01_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_porigen01_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['rin01'])) ? $this->New_label['rin01'] : "Rin 01"; 
   $conteudo = trim(sc_strip_script($this->rin01)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'rin01', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'rin01', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_rin01_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_rin01_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['marca01'])) ? $this->New_label['marca01'] : "Marca 01"; 
   $conteudo = trim(sc_strip_script($this->marca01)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'marca01', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'marca01', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_marca01_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_marca01_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['alto01'])) ? $this->New_label['alto01'] : "Alto 01"; 
   $conteudo = trim(sc_strip_script($this->alto01)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'alto01', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'alto01', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_alto01_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_alto01_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['ancho01'])) ? $this->New_label['ancho01'] : "Ancho 01"; 
   $conteudo = trim(sc_strip_script($this->ancho01)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'ancho01', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'ancho01', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_ancho01_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_ancho01_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['tipoletra01'])) ? $this->New_label['tipoletra01'] : "Tipoletra 01"; 
   $conteudo = trim(sc_strip_script($this->tipoletra01)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'tipoletra01', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'tipoletra01', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_tipoletra01_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_tipoletra01_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['indcarga01'])) ? $this->New_label['indcarga01'] : "Indcarga 01"; 
   $conteudo = trim(sc_strip_script($this->indcarga01)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'indcarga01', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'indcarga01', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_indcarga01_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_indcarga01_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['indveloc01'])) ? $this->New_label['indveloc01'] : "Indveloc 01"; 
   $conteudo = trim(sc_strip_script($this->indveloc01)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'indveloc01', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'indveloc01', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_indveloc01_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_indveloc01_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['pr01'])) ? $this->New_label['pr01'] : "Pr 01"; 
   $conteudo = trim(sc_strip_script($this->pr01)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'pr01', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'pr01', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_pr01_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_pr01_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['dis01'])) ? $this->New_label['dis01'] : "Dis 01"; 
   $conteudo = trim(sc_strip_script($this->dis01)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'dis01', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'dis01', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_dis01_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_dis01_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['tipocons01'])) ? $this->New_label['tipocons01'] : "Tipocons 01"; 
   $conteudo = trim(sc_strip_script($this->tipocons01)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'tipocons01', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'tipocons01', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_tipocons01_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_tipocons01_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['precateg01'])) ? $this->New_label['precateg01'] : "Precateg 01"; 
   $conteudo = trim(sc_strip_script($this->precateg01)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'precateg01', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'precateg01', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_precateg01_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_precateg01_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['tipprod01'])) ? $this->New_label['tipprod01'] : "Tipprod 01"; 
   $conteudo = trim(sc_strip_script($this->tipprod01)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'tipprod01', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'tipprod01', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_tipprod01_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_tipprod01_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['conversion01'])) ? $this->New_label['conversion01'] : "Conversion 01"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->conversion01))); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'conversion01', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'conversion01', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_conversion01_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_conversion01_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['valhom01'])) ? $this->New_label['valhom01'] : "Valhom 01"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->valhom01))); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'valhom01', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'valhom01', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_valhom01_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_valhom01_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['ctain401'])) ? $this->New_label['ctain401'] : "Ctain 401"; 
   $conteudo = trim(sc_strip_script($this->ctain401)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'ctain401', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'ctain401', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_ctain401_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_ctain401_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['valhom02'])) ? $this->New_label['valhom02'] : "Valhom 02"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->valhom02))); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'valhom02', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'valhom02', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_valhom02_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_valhom02_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['valhom03'])) ? $this->New_label['valhom03'] : "Valhom 03"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->valhom03))); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'valhom03', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'valhom03', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_valhom03_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_valhom03_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['valhom04'])) ? $this->New_label['valhom04'] : "Valhom 04"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->valhom04))); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'valhom04', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'valhom04', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_valhom04_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_valhom04_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['statuspro01'])) ? $this->New_label['statuspro01'] : "Statuspro 01"; 
   $conteudo = trim(sc_strip_script($this->statuspro01)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'statuspro01', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'statuspro01', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_statuspro01_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_statuspro01_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['parara01'])) ? $this->New_label['parara01'] : "Parara 01"; 
   $conteudo = trim(sc_strip_script($this->parara01)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'parara01', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'parara01', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_parara01_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_parara01_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['prodequiv01'])) ? $this->New_label['prodequiv01'] : "Prodequiv 01"; 
   $conteudo = trim(sc_strip_script($this->prodequiv01)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'prodequiv01', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'prodequiv01', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_prodequiv01_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_prodequiv01_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['regalia01'])) ? $this->New_label['regalia01'] : "Regalia 01"; 
   $conteudo = trim(sc_strip_script($this->regalia01)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'regalia01', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'regalia01', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_regalia01_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_regalia01_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['precio501'])) ? $this->New_label['precio501'] : "Precio 501"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->precio501))); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "4", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'precio501', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'precio501', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_precio501_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_precio501_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['descto501'])) ? $this->New_label['descto501'] : "Descto 501"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->descto501))); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'descto501', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'descto501', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_descto501_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_descto501_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['precio601'])) ? $this->New_label['precio601'] : "Precio 601"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->precio601))); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "4", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'precio601', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'precio601', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_precio601_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_precio601_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['descto601'])) ? $this->New_label['descto601'] : "Descto 601"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->descto601))); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'descto601', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'descto601', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_descto601_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_descto601_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['precio701'])) ? $this->New_label['precio701'] : "Precio 701"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->precio701))); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "4", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'precio701', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'precio701', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_precio701_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_precio701_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['descto701'])) ? $this->New_label['descto701'] : "Descto 701"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->descto701))); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'descto701', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'descto701', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_descto701_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_descto701_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['precio801'])) ? $this->New_label['precio801'] : "Precio 801"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->precio801))); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "4", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'precio801', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'precio801', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_precio801_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_precio801_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['descto801'])) ? $this->New_label['descto801'] : "Descto 801"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->descto801))); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'descto801', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'descto801', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_descto801_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_descto801_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['precio901'])) ? $this->New_label['precio901'] : "Precio 901"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->precio901))); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "4", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'precio901', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'precio901', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_precio901_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_precio901_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['descto901'])) ? $this->New_label['descto901'] : "Descto 901"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->descto901))); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'descto901', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'descto901', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_descto901_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_descto901_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['precio1001'])) ? $this->New_label['precio1001'] : "Precio 1001"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->precio1001))); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "4", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'precio1001', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'precio1001', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_precio1001_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_precio1001_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['descto1001'])) ? $this->New_label['descto1001'] : "Descto 1001"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->descto1001))); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'descto1001', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'descto1001', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_descto1001_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_descto1001_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['precio1101'])) ? $this->New_label['precio1101'] : "Precio 1101"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->precio1101))); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "4", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'precio1101', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'precio1101', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_precio1101_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_precio1101_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['descto1101'])) ? $this->New_label['descto1101'] : "Descto 1101"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->descto1101))); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'descto1101', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'descto1101', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_descto1101_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_descto1101_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['precio1201'])) ? $this->New_label['precio1201'] : "Precio 1201"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->precio1201))); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "4", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'precio1201', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'precio1201', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_precio1201_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_precio1201_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['descto1201'])) ? $this->New_label['descto1201'] : "Descto 1201"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->descto1201))); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'descto1201', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'descto1201', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_descto1201_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_descto1201_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['submarca01'])) ? $this->New_label['submarca01'] : "Submarca 01"; 
   $conteudo = trim(sc_strip_script($this->submarca01)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'submarca01', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'submarca01', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_submarca01_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_submarca01_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['modelo01'])) ? $this->New_label['modelo01'] : "Modelo 01"; 
   $conteudo = trim(sc_strip_script($this->modelo01)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'modelo01', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'modelo01', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_modelo01_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_modelo01_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['clasific01'])) ? $this->New_label['clasific01'] : "Clasific 01"; 
   $conteudo = trim(sc_strip_script($this->clasific01)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'clasific01', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'clasific01', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_clasific01_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_clasific01_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['codbarempaque01'])) ? $this->New_label['codbarempaque01'] : "Codbarempaque 01"; 
   $conteudo = trim(sc_strip_script($this->codbarempaque01)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'codbarempaque01', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'codbarempaque01', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_codbarempaque01_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_codbarempaque01_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['unidadempaque01'])) ? $this->New_label['unidadempaque01'] : "Unidadempaque 01"; 
   $conteudo = trim(sc_strip_script($this->unidadempaque01)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'unidadempaque01', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'unidadempaque01', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_unidadempaque01_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_unidadempaque01_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['dimensionempaque01'])) ? $this->New_label['dimensionempaque01'] : "Dimensionempaque 01"; 
   $conteudo = trim(sc_strip_script($this->dimensionempaque01)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'dimensionempaque01', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'dimensionempaque01', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_dimensionempaque01_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_dimensionempaque01_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['link01'])) ? $this->New_label['link01'] : "Link 01"; 
   $conteudo = trim(sc_strip_script($this->link01)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'link01', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'link01', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_link01_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_link01_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['desprod201'])) ? $this->New_label['desprod201'] : "Desprod 201"; 
   $conteudo = trim(sc_strip_script($this->desprod201)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'desprod201', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'desprod201', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_desprod201_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_desprod201_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['desprod301'])) ? $this->New_label['desprod301'] : "Desprod 301"; 
   $conteudo = trim(sc_strip_script($this->desprod301)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'desprod301', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'desprod301', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_desprod301_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_desprod301_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['coefprd01'])) ? $this->New_label['coefprd01'] : "Coefprd 01"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->coefprd01))); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "4", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'coefprd01', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'coefprd01', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_coefprd01_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_coefprd01_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['infor01'])) ? $this->New_label['infor01'] : "Infor 01"; 
   $conteudo = trim(sc_strip_script($this->infor01)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'infor01', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'infor01', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_infor01_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_infor01_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['infor03'])) ? $this->New_label['infor03'] : "Infor 03"; 
   $conteudo = trim(sc_strip_script($this->infor03)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'infor03', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'infor03', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_infor03_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_infor03_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['infor05'])) ? $this->New_label['infor05'] : "Infor 05"; 
   $conteudo = trim(sc_strip_script($this->infor05)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'infor05', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'infor05', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_infor05_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_infor05_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['infor07'])) ? $this->New_label['infor07'] : "Infor 07"; 
   $conteudo = trim(sc_strip_script($this->infor07)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'infor07', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'infor07', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_infor07_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_infor07_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['porcenrenta'])) ? $this->New_label['porcenrenta'] : "Porcenrenta"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->porcenrenta))); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'porcenrenta', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'porcenrenta', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_porcenrenta_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_porcenrenta_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['peso'])) ? $this->New_label['peso'] : "Peso"; 
   $conteudo = trim(sc_strip_script($this->peso)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'peso', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'peso', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_peso_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_peso_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['consignado'])) ? $this->New_label['consignado'] : "Consignado"; 
   $conteudo = trim(sc_strip_script($this->consignado)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'consignado', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'consignado', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_consignado_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_consignado_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['cant_consignado'])) ? $this->New_label['cant_consignado'] : "Cant Consignado"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->cant_consignado))); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'cant_consignado', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'cant_consignado', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_cant_consignado_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_cant_consignado_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['baseimpexe01'])) ? $this->New_label['baseimpexe01'] : "Base Imp Exe 01"; 
   $conteudo = trim(sc_strip_script($this->baseimpexe01)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'baseimpexe01', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'baseimpexe01', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_baseimpexe01_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_baseimpexe01_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['peso01'])) ? $this->New_label['peso01'] : "Peso 01"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->peso01))); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "6", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'peso01', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'peso01', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_peso01_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_peso01_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['prodrel01'])) ? $this->New_label['prodrel01'] : "Prodrel 01"; 
   $conteudo = trim(sc_strip_script($this->prodrel01)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'prodrel01', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'prodrel01', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_prodrel01_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_prodrel01_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['infor02'])) ? $this->New_label['infor02'] : "Infor 02"; 
   $conteudo = trim(sc_strip_script($this->infor02)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'infor02', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'infor02', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_infor02_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_infor02_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['infor04'])) ? $this->New_label['infor04'] : "Infor 04"; 
   $conteudo = trim(sc_strip_script($this->infor04)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'infor04', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'infor04', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_infor04_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_infor04_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['infor06'])) ? $this->New_label['infor06'] : "Infor 06"; 
   $conteudo = trim(sc_strip_script($this->infor06)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'infor06', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'infor06', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_infor06_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_infor06_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['infor08'])) ? $this->New_label['infor08'] : "Infor 08"; 
   $conteudo = trim(sc_strip_script($this->infor08)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'infor08', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'infor08', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_infor08_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_infor08_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['porcicevta01'])) ? $this->New_label['porcicevta01'] : "Porcicevta 01"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->porcicevta01))); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'porcicevta01', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'porcicevta01', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_porcicevta01_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_porcicevta01_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['porcicecpra01'])) ? $this->New_label['porcicecpra01'] : "Porcicecpra 01"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->porcicecpra01))); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'porcicecpra01', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'porcicecpra01', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_porcicecpra01_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_porcicecpra01_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['porcptdaranc01'])) ? $this->New_label['porcptdaranc01'] : "Porcptdaranc 01"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->porcptdaranc01))); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'porcptdaranc01', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'porcptdaranc01', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_porcptdaranc01_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_porcptdaranc01_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['ordimp01'])) ? $this->New_label['ordimp01'] : "Ordimp 01"; 
   $conteudo = trim(sc_strip_script($this->ordimp01)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'ordimp01', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'ordimp01', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_ordimp01_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_ordimp01_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("</TABLE>\r\n");
   if(isset($_SESSION['scriptcase']['proc_mobile']) && $_SESSION['scriptcase']['proc_mobile'])
   {
   }
   $rs->Close(); 
   if (!$_SESSION['scriptcase']['proc_mobile']) {
       $nm_saida->saida("  </td>\r\n");
       $nm_saida->saida(" </tr>\r\n");
       $nm_saida->saida(" </table>\r\n");
       $nm_saida->saida(" </div>\r\n");
       $nm_saida->saida("  </td>\r\n");
       $nm_saida->saida(" </tr>\r\n");
       $nm_saida->saida(" </table>\r\n");
   }
   if (!$_SESSION['scriptcase']['proc_mobile']) {
       $nm_saida->saida("  </td>\r\n");
       $nm_saida->saida(" </tr>\r\n");
       $nm_saida->saida(" </table>\r\n");
       $nm_saida->saida(" </div>\r\n");
       $nm_saida->saida("  </td>\r\n");
       $nm_saida->saida(" </tr>\r\n");
       $nm_saida->saida(" </table>\r\n");
   }
   if ($_SESSION['scriptcase']['proc_mobile']) {
       $nm_saida->saida("  </td>\r\n");
       $nm_saida->saida(" </tr>\r\n");
       $nm_saida->saida(" </table>\r\n");
       $nm_saida->saida(" </div>\r\n");
       $nm_saida->saida("  </td>\r\n");
       $nm_saida->saida(" </tr>\r\n");
       $nm_saida->saida(" </table>\r\n");
   }
//--- 
//--- 
   $nm_saida->saida("<form name=\"F3\" method=post\r\n");
   $nm_saida->saida("                  target=\"_self\"\r\n");
   $nm_saida->saida("                  action=\"./\">\r\n");
   $nm_saida->saida("<input type=hidden name=\"nmgp_opcao\" value=\"igual\"/>\r\n");
   $nm_saida->saida("<input type=hidden name=\"script_case_init\" value=\"" . NM_encode_input($this->Ini->sc_page) . "\"/>\r\n");
   $nm_saida->saida("</form>\r\n");
   $nm_saida->saida("<form name=\"F6\" method=\"post\" \r\n");
   $nm_saida->saida("                  action=\"./\" \r\n");
   $nm_saida->saida("                  target=\"_self\" style=\"display: none\"> \r\n");
   $nm_saida->saida(" <input type=\"hidden\" name=\"script_case_init\" value=\"" . NM_encode_input($this->Ini->sc_page) . "\"/> \r\n");
   $nm_saida->saida("</form> \r\n");
   $nm_saida->saida("<form name=\"Fprint\" method=\"post\" \r\n");
   $nm_saida->saida("                  action=\"grid_maepro_iframe_prt.php\" \r\n");
   $nm_saida->saida("                  target=\"jan_print\" style=\"display: none\"> \r\n");
   $nm_saida->saida(" <input type=\"hidden\" name=\"path_botoes\" value=\"" . $this->Ini->path_botoes . "\"/> \r\n");
   $nm_saida->saida(" <input type=\"hidden\" name=\"opcao\" value=\"det_print\"/>\r\n");
   $nm_saida->saida(" <input type=\"hidden\" name=\"nmgp_opcao\" value=\"det_print\"/>\r\n");
   $nm_saida->saida(" <input type=\"hidden\" name=\"cor_print\" value=\"CO\"/>\r\n");
   $nm_saida->saida(" <input type=\"hidden\" name=\"nmgp_cor_print\" value=\"CO\"/>\r\n");
   $nm_saida->saida(" <input type=\"hidden\" name=\"nmgp_password\" value=\"\"/>\r\n");
   $nm_saida->saida(" <input type=\"hidden\" name=\"script_case_init\" value=\"" . NM_encode_input($this->Ini->sc_page) . "\"/> \r\n");
   $nm_saida->saida("</form> \r\n");
   $nm_saida->saida("<script language=JavaScript>\r\n");
   $nm_saida->saida("   $(function(){ \r\n");
   $nm_saida->saida("       NM_btn_disable();\r\n");
   $nm_saida->saida("   }); \r\n");
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
   $nm_saida->saida("   function nm_mostra_doc(campo1)\r\n");
   $nm_saida->saida("   {\r\n");
   $nm_saida->saida("       NovaJanela = window.open (\"grid_maepro_doc.php?nmgp_parms=\" + campo1, \"ScriptCase\", \"resizable\");\r\n");
   $nm_saida->saida("   }\r\n");
   $nm_saida->saida("   function nm_gp_move(x, y, z, p, g, crt, ajax, chart_level, page_break_pdf, SC_module_export, use_pass_pdf, pdf_all_cab, pdf_all_label, pdf_label_group, pdf_zip) \r\n");
   $nm_saida->saida("   {\r\n");
   $nm_saida->saida("       if (\"pdf_det\" == x && \"S\" == ajax)\r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("           $('#TB_window').remove();\r\n");
   $nm_saida->saida("           $('body').append(\"<div id='TB_window'></div>\");\r\n");
   $nm_saida->saida("               nm_submit_modal(\"" . $this->Ini->path_link . "grid_maepro/grid_maepro_export_email.php?script_case_init={$this->Ini->sc_page}&path_img={$this->Ini->path_img_global}&path_btn={$this->Ini->path_botoes}&sType=pdf_det&sAdd=__E__nmgp_tipo_pdf=\" + z + \"__E__sc_parms_pdf=\" + p + \"__E__sc_create_charts=\" + crt + \"__E__sc_graf_pdf=\" + g + \"__E__chart_level=\" + chart_level + \"__E__Det_use_pass_pdf=\" + use_pass_pdf + \"__E__Det_pdf_zip=\" + pdf_zip + \"&nm_opc=pdf_det&KeepThis=true&TB_iframe=true&modal=true\", '');\r\n");
   $nm_saida->saida("       }\r\n");
   $nm_saida->saida("       else\r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("           window.location = \"" . $this->Ini->path_link . "grid_maepro/index.php?nmgp_opcao=pdf_det&nmgp_tipo_pdf=\" + z + \"&nmgp_parms_pdf=\" + p +  \"&nmgp_graf_pdf=\" + g + \"&Det_use_pass_pdf=\" + use_pass_pdf + \"&Det_pdf_zip=\" + pdf_zip + \"&script_case_init=" . NM_encode_input($this->Ini->sc_page) . "\";\r\n");
   $nm_saida->saida("       }\r\n");
   $nm_saida->saida("   }\r\n");
   $nm_saida->saida("   function nm_gp_print_conf(tp, cor, res_cons, password, ajax, str_type, bol_param)\r\n");
   $nm_saida->saida("   {\r\n");
   $nm_saida->saida("       if (\"D\" == ajax)\r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("           $('#TB_window').remove();\r\n");
   $nm_saida->saida("           $('body').append(\"<div id='TB_window'></div>\");\r\n");
   $nm_saida->saida("               nm_submit_modal(\"" . $this->Ini->path_link . "grid_maepro/grid_maepro_export_email.php?script_case_init={$this->Ini->sc_page}&path_img={$this->Ini->path_img_global}&path_btn={$this->Ini->path_botoes}&sType=\"+ str_type +\"&sAdd=__E__nmgp_tipo_print=\" + tp + \"__E__nmgp_cor_print=\" + cor + \"&KeepThis=true&TB_iframe=true&modal=true\", bol_param);\r\n");
   $nm_saida->saida("       }\r\n");
   $nm_saida->saida("       else\r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("          document.Fprint.nmgp_password.value = password;\r\n");
   $nm_saida->saida("          document.Fprint.cor_print.value = cor;\r\n");
   $nm_saida->saida("          document.Fprint.nmgp_cor_print.value = cor;\r\n");
   $nm_saida->saida("          if (password != \"\")\r\n");
   $nm_saida->saida("          {\r\n");
   $nm_saida->saida("              document.Fprint.action=\"./\";\r\n");
   $nm_saida->saida("              document.Fprint.target=\"_self\";\r\n");
   $nm_saida->saida("          }\r\n");
   $nm_saida->saida("          else\r\n");
   $nm_saida->saida("          {\r\n");
   $nm_saida->saida("              window.open('','jan_print','location=no,menubar=no,resizable,scrollbars,status=no,toolbar=no');\r\n");
   $nm_saida->saida("          }\r\n");
   $nm_saida->saida("          document.Fprint.submit() ;\r\n");
   $nm_saida->saida("      }\r\n");
   $nm_saida->saida("   }\r\n");
   $nm_saida->saida("   function process_hotkeys(hotkey)\r\n");
   $nm_saida->saida("   {\r\n");
   $nm_saida->saida("   return false;\r\n");
   $nm_saida->saida("   }\r\n");
   $nm_saida->saida("   function NM_btn_disable()\r\n");
   $nm_saida->saida("   {\r\n");
   foreach ($this->nm_btn_disabled as $cod_btn => $st_btn) {
      if (isset($this->nm_btn_exist[$cod_btn]) && $st_btn == 'on') {
         foreach ($this->nm_btn_exist[$cod_btn] as $cada_id) {
           $nm_saida->saida("     $('#" . $cada_id . "').prop('onclick', null).off('click').addClass('disabled').removeAttr('href');\r\n");
         }
      }
   }
   $nm_saida->saida("   }\r\n");
   $nm_saida->saida("</script>\r\n");
   $nm_saida->saida("</body>\r\n");
   $nm_saida->saida("</html>\r\n");
 }
   function nmgp_barra_det_top_normal()
   {
      global $nm_saida;
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['det_print'] != "print" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['pdf_det']) 
   { 
       $nm_saida->saida("   <tr  id=\"obj_barra_top\"><td class=\"scGridTabelaTd\">\r\n");
       $nm_saida->saida("    <table class=\"scGridToolbar\" style=\"padding: 0px; border-spacing: 0px; border-width: 0px; vertical-align: top;\" valign=\"top\" width=\"100%\"><tr>\r\n");
       $nm_saida->saida("     <td class=\"scGridToolbarPadding\" nowrap valign=\"middle\" align=\"left\" width=\"33%\">\r\n");
       $nm_saida->saida("         </td> \r\n");
       $nm_saida->saida("          <td class=\"scGridToolbarPadding\" nowrap valign=\"middle\" align=\"center\" width=\"33%\"> \r\n");
       if ($this->nmgp_botoes['det_pdf'] == "on")
       {
         $this->nm_btn_exist['det_pdf'][] = "Dpdf_top";
         $Cod_Btn = nmButtonOutput($this->arr_buttons, "bpdf", "", "", "Dpdf_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "thickbox", "" . $this->Ini->path_link . "grid_maepro/grid_maepro_config_pdf.php?nm_opc=pdf_det&nm_target=0&nm_cor=cor&papel=1&orientacao=1&largura=1200&conf_larg=S&conf_fonte=10&language=es&conf_socor=N&sc_ver_93=" . s . "&password=n&pdf_zip=N&KeepThis=false&TB_iframe=true&modal=true", "", "only_text", "text_right", "", "", "", "", "", "", "");
         $nm_saida->saida("           $Cod_Btn \r\n");
       }
       if ($this->nmgp_botoes['det_print'] == "on")
       {
         $this->nm_btn_exist['det_print'][] = "Dprint_top";
         $Cod_Btn = nmButtonOutput($this->arr_buttons, "bprint", "", "", "Dprint_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "thickbox", "" . $this->Ini->path_link . "grid_maepro/grid_maepro_config_print.php?nm_opc=detalhe&nm_cor=CO&password=n&language=es&KeepThis=true&TB_iframe=true&modal=true", "", "only_text", "text_right", "", "", "", "", "", "", "");
         $nm_saida->saida("           $Cod_Btn \r\n");
       }
         $this->nm_btn_exist['det_exit'][] = "sc_b_sai_top";
       $Cod_Btn = nmButtonOutput($this->arr_buttons, "bvoltar", "document.F3.submit();", "document.F3.submit();", "sc_b_sai_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
       if ($_SESSION['scriptcase']['proc_mobile']) {
           $Cod_Btn = nmButtonOutput($this->arr_buttons, "bsair", "self.parent.tb_remove();", "self.parent.tb_remove();", "sc_b_sai_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
       }
       $nm_saida->saida("           $Cod_Btn \r\n");
       $nm_saida->saida("         </td> \r\n");
       $nm_saida->saida("          <td class=\"scGridToolbarPadding\" nowrap valign=\"middle\" align=\"right\" width=\"33%\"> \r\n");
       $nm_saida->saida("     </td>\r\n");
       $nm_saida->saida("    </tr></table>\r\n");
       $nm_saida->saida("   </td></tr>\r\n");
   } 
   }
   function nmgp_barra_det_top_mobile()
   {
      global $nm_saida;
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['det_print'] != "print" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maepro']['pdf_det']) 
   { 
       $nm_saida->saida("   <tr  id=\"obj_barra_top\"><td class=\"scGridTabelaTd\">\r\n");
       $nm_saida->saida("    <table class=\"scGridToolbar\" style=\"padding: 0px; border-spacing: 0px; border-width: 0px; vertical-align: top;\" valign=\"top\" width=\"100%\"><tr>\r\n");
       $nm_saida->saida("     <td class=\"scGridToolbarPadding\" nowrap valign=\"middle\" align=\"left\" width=\"33%\">\r\n");
       if ($this->nmgp_botoes['det_pdf'] == "on")
       {
         $this->nm_btn_exist['det_pdf'][] = "Dpdf_top";
         $Cod_Btn = nmButtonOutput($this->arr_buttons, "bpdf", "", "", "Dpdf_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "thickbox", "" . $this->Ini->path_link . "grid_maepro/grid_maepro_config_pdf.php?nm_opc=pdf_det&nm_target=0&nm_cor=cor&papel=1&orientacao=1&largura=1200&conf_larg=S&conf_fonte=10&language=es&conf_socor=N&sc_ver_93=" . s . "&password=n&pdf_zip=N&KeepThis=false&TB_iframe=true&modal=true", "", "only_text", "text_right", "", "", "", "", "", "", "");
         $nm_saida->saida("           $Cod_Btn \r\n");
       }
       if ($this->nmgp_botoes['det_print'] == "on")
       {
         $this->nm_btn_exist['det_print'][] = "Dprint_top";
         $Cod_Btn = nmButtonOutput($this->arr_buttons, "bprint", "", "", "Dprint_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "thickbox", "" . $this->Ini->path_link . "grid_maepro/grid_maepro_config_print.php?nm_opc=detalhe&nm_cor=CO&password=n&language=es&KeepThis=true&TB_iframe=true&modal=true", "", "only_text", "text_right", "", "", "", "", "", "", "");
         $nm_saida->saida("           $Cod_Btn \r\n");
       }
         $this->nm_btn_exist['det_exit'][] = "sc_b_sai_top";
       $Cod_Btn = nmButtonOutput($this->arr_buttons, "bvoltar", "document.F3.submit();", "document.F3.submit();", "sc_b_sai_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
       if ($_SESSION['scriptcase']['proc_mobile']) {
           $Cod_Btn = nmButtonOutput($this->arr_buttons, "bsair", "self.parent.tb_remove();", "self.parent.tb_remove();", "sc_b_sai_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
       }
       $nm_saida->saida("           $Cod_Btn \r\n");
       $nm_saida->saida("     </td>\r\n");
       $nm_saida->saida("    </tr></table>\r\n");
       $nm_saida->saida("   </td></tr>\r\n");
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
}
