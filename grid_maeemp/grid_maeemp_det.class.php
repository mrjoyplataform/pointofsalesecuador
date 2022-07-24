<?php
//--- 
class grid_maeemp_det
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
   var $rp01noemp;
   var $rp01division;
   var $rp01depto;
   var $rp01seccion;
   var $rp01noemp1;
   var $rp01nombreemp;
   var $rp01categoria;
   var $rp01turno;
   var $rp01statusemp;
   var $rp01fechastatus;
   var $rp01causaretiro;
   var $rp01direccion;
   var $rp01telefono;
   var $rp01lugarnacimiento;
   var $rp01fechanacimiento;
   var $rp01nacionalidad;
   var $rp01cedula;
   var $rp01noiess;
   var $rp01sexo;
   var $rp01nolibreta;
   var $rp01profesion;
   var $rp01fechaingreso;
   var $rp01fechareingreso;
   var $rp01cargo;
   var $rp01estadocivil;
   var $rp01rebajaxcasado;
   var $rp01nombreconyuge;
   var $rp01nombrepadre;
   var $rp01nombremadre;
   var $rp01nohijos;
   var $rp01fechahijos0;
   var $rp01sexohijos0;
   var $rp01fechahijos1;
   var $rp01sexohijos1;
   var $rp01fechahijos2;
   var $rp01sexohijos2;
   var $rp01fechahijos3;
   var $rp01sexohijos3;
   var $rp01fechahijos4;
   var $rp01sexohijos4;
   var $rp01fechahijos5;
   var $rp01sexohijos5;
   var $rp01fechahijos6;
   var $rp01sexohijos6;
   var $rp01fechahijos7;
   var $rp01sexohijos7;
   var $rp01fechahijos8;
   var $rp01sexohijos8;
   var $rp01fechahijos9;
   var $rp01sexohijos9;
   var $rp01cargaspadres;
   var $rp01otrascargas;
   var $rp01formapago;
   var $rp01nobancoemp;
   var $rp01ctabancoemp;
   var $rp01tipoctabco;
   var $rp01fechaultvacacion;
   var $rp01aporte;
   var $rp01socio;
   var $rp01transporte;
   var $rp01recibeporc;
   var $rp01sueldoanterior;
   var $rp01sueldosalario;
   var $rp01fecmodsdosal;
   var $rp01fecmodficha;
   var $rp01faltasinjust;
   var $rp01ingresos1er;
   var $rp01basesocialvalor;
   var $rp01basesocialtiempo;
   var $rp0114vopagoacum;
   var $rp0115vopagoacum;
   var $rp01cverrorliq;
   var $rp01porcentliq;
   var $rp01tiposangre;
   var $rp01ingresos2do;
   var $rp01provdiremp;
   var $rp01cantondiremp;
   var $rp01ciudaddiremp;
   var $rp01codocupacion;
   var $uid;
   var $block;
   var $ultimoacceso;
   var $rp01foto;
   var $rp01ctacontable;
   var $rp01email;
   var $rp01passwd;
   var $rp01huella;
   var $rp01recibefr;
   var $rp01recibedt;
   var $rp01recibedc;
   var $rp01uid;
   var $rp01fechauid;
   var $rp01obs;
   var $rp01cauliq;
   var $rp01discapacidad;
   var $rp01conadis;
   var $rp01tpdiscapacidad;
   var $rp01prdiscapacidad;
   var $rp01freserva;
   var $rp01codsectorial;
   var $anticipoporvalor;
   var $tipidret;
   var $residenciatrab;
   var $paisresidencia;
   var $aplicaconvenio;
   var $tipotrabajdiscap;
   var $porcentajediscap;
   var $tipiddiscap;
   var $iddiscap;
   var $rp01varias_secciones;
   var $rp01cc;
   var $rp01observacion;
   var $rp01iessconyugue;
   var $rp01tiporefrigerio;
   var $idiomas;
   var $emergencias;
   var $rp01tipojornada;
   var $rp01numero_horas;
   var $rp01emailpersonal;
   var $rp01supervisadopor;
   var $rp01zonaderiesgo;
   var $rp01refpersnom1;
   var $rp01refpersparen1;
   var $rp01refperstel1;
   var $rp01refpersnom2;
   var $rp01refpersparen2;
   var $rp01refperstel2;
   var $rp01tipovivienda;
   var $rp01serviciosbasicos;
   var $rp01viviendadetalle;
   var $rp01dormitorios;
   var $rp01sala;
   var $rp01comedor;
   var $rp01banos;
   var $rp01estudiosrealizados;
   var $rp01ruta1;
   var $rp01ruta2;
   var $rp01ruta3;
   var $rp01actividadesextras;
    function getFieldHighlight($filter_type, $field, $str_value, $str_value_original='')
    {
        $str_html_ini = '<div class="highlight">';
        $str_html_fim = '</div>';

        if($filter_type == 'advanced_search')
        {
            if (
                isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['campos_busca'][ $field ]) &&
                isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['campos_busca'][ $field . "_cond" ]) &&
                !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['campos_busca'][ $field ]) &&
                (
                    $_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['campos_busca'][ $field . "_cond"] == 'qp' ||
                    $_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['campos_busca'][ $field . "_cond"] == 'eq' ||
                    $_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['campos_busca'][ $field . "_cond"] == 'ii'
                )
            )
            {
                if($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['campos_busca'][ $field . "_cond"] == 'qp')
                {
                    if(strcasecmp($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['campos_busca'][ $field ], $str_value) == 0)
                    {
                        $str_value = $str_html_ini. $str_value .$str_html_fim;
                    }
                    elseif(strcasecmp($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['campos_busca'][ $field ], $str_value_original) == 0)
                    {
                        $str_value = $str_html_ini. $str_value .$str_html_fim;
                    }
                    else
                    {
                        $keywords = preg_quote($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['campos_busca'][ $field ], '/');
                        $str_value = preg_replace('/'. $keywords .'/i', $str_html_ini . '$0' . $str_html_fim, $str_value);
                    }
                }
                elseif($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['campos_busca'][ $field . "_cond"] == 'eq')
                {
                    if(strcasecmp($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['campos_busca'][ $field ], $str_value) == 0)
                    {
                        $str_value = $str_html_ini. $str_value .$str_html_fim;
                    }
                    elseif(strcasecmp($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['campos_busca'][ $field ], $str_value_original) == 0)
                    {
                        $str_value = $str_html_ini. $str_value .$str_html_fim;
                    }
                }
                elseif($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['campos_busca'][ $field . "_cond"] == 'ii')
                {
                    if(strcasecmp($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['campos_busca'][ $field ], substr($str_value, 0, strlen($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['campos_busca'][ $field ]))) == 0)
                    {
                        $str_value = $str_html_ini. substr($str_value, 0, strlen($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['campos_busca'][ $field ])) .$str_html_fim . substr($str_value, strlen($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['campos_busca'][ $field ]));
                    }
                }
            }
        }
        elseif($filter_type == 'quicksearch')
        {
            if(
                isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['fast_search'][0]) &&
                (
                    (
                    $_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['fast_search'][0] == 'SC_all_Cmp' &&
                    in_array($field, array('rp01noemp', 'rp01division', 'rp01depto', 'rp01seccion', 'rp01noemp1', 'rp01nombreemp', 'rp01categoria', 'rp01turno', 'rp01statusemp', 'rp01fechastatus', 'rp01causaretiro', 'rp01direccion', 'rp01telefono', 'rp01lugarnacimiento', 'rp01fechanacimiento', 'rp01nacionalidad', 'rp01cedula', 'rp01noiess', 'rp01sexo', 'rp01nolibreta', 'rp01profesion', 'rp01fechaingreso', 'rp01fechareingreso', 'rp01cargo', 'rp01estadocivil', 'rp01rebajaxcasado', 'rp01nombreconyuge', 'rp01nombrepadre', 'rp01nombremadre', 'rp01nohijos', 'rp01fechahijos0', 'rp01sexohijos0', 'rp01fechahijos1', 'rp01sexohijos1', 'rp01fechahijos2', 'rp01sexohijos2', 'rp01fechahijos3', 'rp01sexohijos3', 'rp01fechahijos4', 'rp01sexohijos4', 'rp01fechahijos5', 'rp01sexohijos5', 'rp01fechahijos6', 'rp01sexohijos6', 'rp01fechahijos7', 'rp01sexohijos7', 'rp01fechahijos8', 'rp01sexohijos8', 'rp01fechahijos9', 'rp01sexohijos9', 'rp01cargaspadres', 'rp01otrascargas', 'rp01formapago', 'rp01nobancoemp', 'rp01ctabancoemp', 'rp01tipoctabco', 'rp01fechaultvacacion', 'rp01aporte', 'rp01socio', 'rp01transporte', 'rp01recibeporc', 'rp01sueldoanterior', 'rp01sueldosalario', 'rp01fecmodsdosal', 'rp01fecmodficha', 'rp01faltasinjust', 'rp01ingresos1er', 'rp01basesocialvalor', 'rp01basesocialtiempo', 'rp0114vopagoacum', 'rp0115vopagoacum', 'rp01cverrorliq', 'rp01porcentliq', 'rp01tiposangre', 'rp01ingresos2do', 'rp01provdiremp', 'rp01cantondiremp', 'rp01ciudaddiremp', 'rp01codocupacion', 'uid', 'block', 'ultimoacceso', 'rp01foto', 'rp01ctacontable', 'rp01email', 'rp01passwd', 'rp01huella', 'rp01recibefr', 'rp01recibedt', 'rp01recibedc', 'rp01uid', 'rp01fechauid', 'rp01obs', 'rp01cauliq', 'rp01discapacidad', 'rp01conadis', 'rp01tpdiscapacidad', 'rp01prdiscapacidad', 'rp01freserva', 'rp01codsectorial', 'anticipoporvalor', 'tipidret', 'residenciatrab', 'paisresidencia', 'aplicaconvenio', 'tipotrabajdiscap', 'porcentajediscap', 'tipiddiscap', 'iddiscap', 'rp01varias_secciones', 'rp01cc', 'rp01observacion', 'rp01iessconyugue', 'rp01tiporefrigerio', 'idiomas', 'emergencias', 'rp01tipojornada', 'rp01numero_horas', 'rp01emailpersonal', 'rp01supervisadopor', 'rp01zonaderiesgo', 'rp01refpersnom1', 'rp01refpersparen1', 'rp01refperstel1', 'rp01refpersnom2', 'rp01refpersparen2', 'rp01refperstel2', 'rp01tipovivienda', 'rp01serviciosbasicos', 'rp01viviendadetalle', 'rp01dormitorios', 'rp01sala', 'rp01comedor', 'rp01banos', 'rp01estudiosrealizados', 'rp01ruta1', 'rp01ruta2', 'rp01ruta3', 'rp01actividadesextras'))
                    ) ||
                    $_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['fast_search'][0] == $field ||
                    strpos($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['fast_search'][0], $field . '_VLS_') !== false ||
                    strpos($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['fast_search'][0], '_VLS_' . $field) !== false
                )
            )
            {
                if($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['fast_search'][1] == 'qp')
                {
                    if(strcasecmp($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['fast_search'][2], $str_value) == 0)
                    {
                        $str_value = $str_html_ini. $str_value .$str_html_fim;
                    }
                    elseif(!empty($str_value_original) && $str_value_original != '&nbsp;' && strcasecmp($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['fast_search'][2], $str_value_original) == 0)
                    {
                        $str_value = $str_html_ini. $str_value .$str_html_fim;
                    }
                    else
                    {
                        $keywords = preg_quote($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['fast_search'][2], '/');
                        $str_value = preg_replace('/'. $keywords .'/i', $str_html_ini . '$0' . $str_html_fim, $str_value);
                    }
                }
                elseif($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['fast_search'][1] == 'eq')
                {
                    if(strcasecmp($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['fast_search'][2], $str_value) == 0)
                    {
                        $str_value = $str_html_ini. $str_value .$str_html_fim;
                    }
                    elseif(!empty($str_value_original) && $str_value_original != '&nbsp;' && strcasecmp($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['fast_search'][2], $str_value_original) == 0)
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
    if (isset($_SESSION['scriptcase']['sc_apl_conf']['grid_maeemp']['btn_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['grid_maeemp']['btn_display']))
    {
        foreach ($_SESSION['scriptcase']['sc_apl_conf']['grid_maeemp']['btn_display'] as $NM_cada_btn => $NM_cada_opc)
        {
            $this->nmgp_botoes[$NM_cada_btn] = $NM_cada_opc;
        }
    }
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['embutida_form']) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['embutida_form'])
    {
    $this->nmgp_botoes['det_pdf']   = "off";
    $this->nmgp_botoes['det_print'] = "off";
    }
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['campos_busca']))
    { 
        $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['campos_busca'];
        if ($_SESSION['scriptcase']['charset'] != "UTF-8")
        {
            $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
        }
        $this->rp01seccion = $Busca_temp['rp01seccion']; 
        $tmp_pos = strpos($this->rp01seccion, "##@@");
        if ($tmp_pos !== false && !is_array($this->rp01seccion))
        {
            $this->rp01seccion = substr($this->rp01seccion, 0, $tmp_pos);
        }
        $this->rp01noemp = $Busca_temp['rp01noemp']; 
        $tmp_pos = strpos($this->rp01noemp, "##@@");
        if ($tmp_pos !== false && !is_array($this->rp01noemp))
        {
            $this->rp01noemp = substr($this->rp01noemp, 0, $tmp_pos);
        }
        $this->rp01division = $Busca_temp['rp01division']; 
        $tmp_pos = strpos($this->rp01division, "##@@");
        if ($tmp_pos !== false && !is_array($this->rp01division))
        {
            $this->rp01division = substr($this->rp01division, 0, $tmp_pos);
        }
        $this->rp01depto = $Busca_temp['rp01depto']; 
        $tmp_pos = strpos($this->rp01depto, "##@@");
        if ($tmp_pos !== false && !is_array($this->rp01depto))
        {
            $this->rp01depto = substr($this->rp01depto, 0, $tmp_pos);
        }
    } 
    $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['where_orig'];
    $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['where_pesq'];
    $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['where_pesq_filtro'];
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
    $_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['seq_dir'] = 0; 
    $_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['sub_dir'] = array(); 
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
       $nmgp_select = "SELECT rp01noemp, rp01division, rp01depto, rp01seccion, rp01noemp1, rp01nombreemp, rp01categoria, rp01turno, rp01statusemp, str_replace (convert(char(10),rp01fechastatus,102), '.', '-') + ' ' + convert(char(8),rp01fechastatus,20), rp01causaretiro, rp01direccion, rp01telefono, rp01lugarnacimiento, str_replace (convert(char(10),rp01fechanacimiento,102), '.', '-') + ' ' + convert(char(8),rp01fechanacimiento,20), rp01nacionalidad, rp01cedula, rp01noiess, rp01sexo, rp01nolibreta, rp01profesion, str_replace (convert(char(10),rp01fechaingreso,102), '.', '-') + ' ' + convert(char(8),rp01fechaingreso,20), str_replace (convert(char(10),rp01fechareingreso,102), '.', '-') + ' ' + convert(char(8),rp01fechareingreso,20), rp01cargo, rp01estadocivil, rp01rebajaxcasado, rp01nombreconyuge, rp01nombrepadre, rp01nombremadre, rp01nohijos, str_replace (convert(char(10),rp01fechahijos0,102), '.', '-') + ' ' + convert(char(8),rp01fechahijos0,20), rp01sexohijos0, str_replace (convert(char(10),rp01fechahijos1,102), '.', '-') + ' ' + convert(char(8),rp01fechahijos1,20), rp01sexohijos1, str_replace (convert(char(10),rp01fechahijos2,102), '.', '-') + ' ' + convert(char(8),rp01fechahijos2,20), rp01sexohijos2, str_replace (convert(char(10),rp01fechahijos3,102), '.', '-') + ' ' + convert(char(8),rp01fechahijos3,20), rp01sexohijos3, str_replace (convert(char(10),rp01fechahijos4,102), '.', '-') + ' ' + convert(char(8),rp01fechahijos4,20), rp01sexohijos4, str_replace (convert(char(10),rp01fechahijos5,102), '.', '-') + ' ' + convert(char(8),rp01fechahijos5,20), rp01sexohijos5, str_replace (convert(char(10),rp01fechahijos6,102), '.', '-') + ' ' + convert(char(8),rp01fechahijos6,20), rp01sexohijos6, str_replace (convert(char(10),rp01fechahijos7,102), '.', '-') + ' ' + convert(char(8),rp01fechahijos7,20), rp01sexohijos7, str_replace (convert(char(10),rp01fechahijos8,102), '.', '-') + ' ' + convert(char(8),rp01fechahijos8,20), rp01sexohijos8, str_replace (convert(char(10),rp01fechahijos9,102), '.', '-') + ' ' + convert(char(8),rp01fechahijos9,20), rp01sexohijos9, rp01cargaspadres, rp01otrascargas, rp01formapago, rp01nobancoemp, rp01ctabancoemp, rp01tipoctabco, str_replace (convert(char(10),rp01fechaultvacacion,102), '.', '-') + ' ' + convert(char(8),rp01fechaultvacacion,20), rp01aporte, rp01socio, rp01transporte, rp01recibeporc, rp01sueldoanterior, rp01sueldosalario, str_replace (convert(char(10),rp01fecmodsdosal,102), '.', '-') + ' ' + convert(char(8),rp01fecmodsdosal,20), str_replace (convert(char(10),rp01fecmodficha,102), '.', '-') + ' ' + convert(char(8),rp01fecmodficha,20), rp01faltasinjust, rp01ingresos1er, rp01basesocialvalor, rp01basesocialtiempo, rp0114vopagoacum, rp0115vopagoacum, rp01cverrorliq, rp01porcentliq, rp01tiposangre, rp01ingresos2do, rp01provdiremp, rp01cantondiremp, rp01ciudaddiremp, rp01codocupacion, UID, block, ultimoacceso, rp01foto, rp01ctacontable, rp01email, rp01passwd, rp01huella, rp01recibefr, rp01recibedt, rp01recibedc, rp01UID, str_replace (convert(char(10),rp01fechaUID,102), '.', '-') + ' ' + convert(char(8),rp01fechaUID,20), rp01obs, rp01cauliq, rp01discapacidad, rp01conadis, rp01tpdiscapacidad, rp01prdiscapacidad, rp01freserva, rp01codsectorial, anticipoporvalor, tipIdRet, residenciaTrab, paisResidencia, aplicaConvenio, tipoTrabajDiscap, porcentajeDiscap, tipIdDiscap, idDiscap, rp01varias_secciones, rp01cc, rp01observacion, rp01iessconyugue, rp01tiporefrigerio, idiomas, emergencias, rp01tipojornada, rp01numero_horas, rp01emailpersonal, rp01supervisadopor, rp01zonaderiesgo, rp01refpersnom1, rp01refpersparen1, rp01refperstel1, rp01refpersnom2, rp01refpersparen2, rp01refperstel2, rp01tipovivienda, rp01serviciosbasicos, rp01viviendadetalle, rp01dormitorios, rp01sala, rp01comedor, rp01banos, rp01estudiosrealizados, rp01ruta1, rp01ruta2, rp01ruta3, rp01actividadesextras from " . $this->Ini->nm_tabela; 
   } 
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql)) 
   { 
       $nmgp_select = "SELECT rp01noemp, rp01division, rp01depto, rp01seccion, rp01noemp1, rp01nombreemp, rp01categoria, rp01turno, rp01statusemp, convert(char(23),rp01fechastatus,121), rp01causaretiro, rp01direccion, rp01telefono, rp01lugarnacimiento, convert(char(23),rp01fechanacimiento,121), rp01nacionalidad, rp01cedula, rp01noiess, rp01sexo, rp01nolibreta, rp01profesion, convert(char(23),rp01fechaingreso,121), convert(char(23),rp01fechareingreso,121), rp01cargo, rp01estadocivil, rp01rebajaxcasado, rp01nombreconyuge, rp01nombrepadre, rp01nombremadre, rp01nohijos, convert(char(23),rp01fechahijos0,121), rp01sexohijos0, convert(char(23),rp01fechahijos1,121), rp01sexohijos1, convert(char(23),rp01fechahijos2,121), rp01sexohijos2, convert(char(23),rp01fechahijos3,121), rp01sexohijos3, convert(char(23),rp01fechahijos4,121), rp01sexohijos4, convert(char(23),rp01fechahijos5,121), rp01sexohijos5, convert(char(23),rp01fechahijos6,121), rp01sexohijos6, convert(char(23),rp01fechahijos7,121), rp01sexohijos7, convert(char(23),rp01fechahijos8,121), rp01sexohijos8, convert(char(23),rp01fechahijos9,121), rp01sexohijos9, rp01cargaspadres, rp01otrascargas, rp01formapago, rp01nobancoemp, rp01ctabancoemp, rp01tipoctabco, convert(char(23),rp01fechaultvacacion,121), rp01aporte, rp01socio, rp01transporte, rp01recibeporc, rp01sueldoanterior, rp01sueldosalario, convert(char(23),rp01fecmodsdosal,121), convert(char(23),rp01fecmodficha,121), rp01faltasinjust, rp01ingresos1er, rp01basesocialvalor, rp01basesocialtiempo, rp0114vopagoacum, rp0115vopagoacum, rp01cverrorliq, rp01porcentliq, rp01tiposangre, rp01ingresos2do, rp01provdiremp, rp01cantondiremp, rp01ciudaddiremp, rp01codocupacion, UID, block, ultimoacceso, rp01foto, rp01ctacontable, rp01email, rp01passwd, rp01huella, rp01recibefr, rp01recibedt, rp01recibedc, rp01UID, convert(char(23),rp01fechaUID,121), rp01obs, rp01cauliq, rp01discapacidad, rp01conadis, rp01tpdiscapacidad, rp01prdiscapacidad, rp01freserva, rp01codsectorial, anticipoporvalor, tipIdRet, residenciaTrab, paisResidencia, aplicaConvenio, tipoTrabajDiscap, porcentajeDiscap, tipIdDiscap, idDiscap, rp01varias_secciones, rp01cc, rp01observacion, rp01iessconyugue, rp01tiporefrigerio, idiomas, emergencias, rp01tipojornada, rp01numero_horas, rp01emailpersonal, rp01supervisadopor, rp01zonaderiesgo, rp01refpersnom1, rp01refpersparen1, rp01refperstel1, rp01refpersnom2, rp01refpersparen2, rp01refperstel2, rp01tipovivienda, rp01serviciosbasicos, rp01viviendadetalle, rp01dormitorios, rp01sala, rp01comedor, rp01banos, rp01estudiosrealizados, rp01ruta1, rp01ruta2, rp01ruta3, rp01actividadesextras from " . $this->Ini->nm_tabela; 
   } 
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle)) 
   { 
       $nmgp_select = "SELECT rp01noemp, rp01division, rp01depto, rp01seccion, rp01noemp1, rp01nombreemp, rp01categoria, rp01turno, rp01statusemp, rp01fechastatus, rp01causaretiro, rp01direccion, rp01telefono, rp01lugarnacimiento, rp01fechanacimiento, rp01nacionalidad, rp01cedula, rp01noiess, rp01sexo, rp01nolibreta, rp01profesion, rp01fechaingreso, rp01fechareingreso, rp01cargo, rp01estadocivil, rp01rebajaxcasado, rp01nombreconyuge, rp01nombrepadre, rp01nombremadre, rp01nohijos, rp01fechahijos0, rp01sexohijos0, rp01fechahijos1, rp01sexohijos1, rp01fechahijos2, rp01sexohijos2, rp01fechahijos3, rp01sexohijos3, rp01fechahijos4, rp01sexohijos4, rp01fechahijos5, rp01sexohijos5, rp01fechahijos6, rp01sexohijos6, rp01fechahijos7, rp01sexohijos7, rp01fechahijos8, rp01sexohijos8, rp01fechahijos9, rp01sexohijos9, rp01cargaspadres, rp01otrascargas, rp01formapago, rp01nobancoemp, rp01ctabancoemp, rp01tipoctabco, rp01fechaultvacacion, rp01aporte, rp01socio, rp01transporte, rp01recibeporc, rp01sueldoanterior, rp01sueldosalario, rp01fecmodsdosal, rp01fecmodficha, rp01faltasinjust, rp01ingresos1er, rp01basesocialvalor, rp01basesocialtiempo, rp0114vopagoacum, rp0115vopagoacum, rp01cverrorliq, rp01porcentliq, rp01tiposangre, rp01ingresos2do, rp01provdiremp, rp01cantondiremp, rp01ciudaddiremp, rp01codocupacion, UID, block, ultimoacceso, rp01foto, rp01ctacontable, rp01email, rp01passwd, rp01huella, rp01recibefr, rp01recibedt, rp01recibedc, rp01UID, rp01fechaUID, rp01obs, rp01cauliq, rp01discapacidad, rp01conadis, rp01tpdiscapacidad, rp01prdiscapacidad, rp01freserva, rp01codsectorial, anticipoporvalor, tipIdRet, residenciaTrab, paisResidencia, aplicaConvenio, tipoTrabajDiscap, porcentajeDiscap, tipIdDiscap, idDiscap, rp01varias_secciones, rp01cc, rp01observacion, rp01iessconyugue, rp01tiporefrigerio, idiomas, emergencias, rp01tipojornada, rp01numero_horas, rp01emailpersonal, rp01supervisadopor, rp01zonaderiesgo, rp01refpersnom1, rp01refpersparen1, rp01refperstel1, rp01refpersnom2, rp01refpersparen2, rp01refperstel2, rp01tipovivienda, rp01serviciosbasicos, rp01viviendadetalle, rp01dormitorios, rp01sala, rp01comedor, rp01banos, rp01estudiosrealizados, rp01ruta1, rp01ruta2, rp01ruta3, rp01actividadesextras from " . $this->Ini->nm_tabela; 
   } 
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix)) 
   { 
       $nmgp_select = "SELECT rp01noemp, rp01division, rp01depto, rp01seccion, rp01noemp1, rp01nombreemp, rp01categoria, rp01turno, rp01statusemp, EXTEND(rp01fechastatus, YEAR TO DAY), rp01causaretiro, rp01direccion, rp01telefono, rp01lugarnacimiento, EXTEND(rp01fechanacimiento, YEAR TO DAY), rp01nacionalidad, rp01cedula, rp01noiess, rp01sexo, rp01nolibreta, rp01profesion, EXTEND(rp01fechaingreso, YEAR TO DAY), EXTEND(rp01fechareingreso, YEAR TO DAY), rp01cargo, rp01estadocivil, rp01rebajaxcasado, rp01nombreconyuge, rp01nombrepadre, rp01nombremadre, rp01nohijos, EXTEND(rp01fechahijos0, YEAR TO DAY), rp01sexohijos0, EXTEND(rp01fechahijos1, YEAR TO DAY), rp01sexohijos1, EXTEND(rp01fechahijos2, YEAR TO DAY), rp01sexohijos2, EXTEND(rp01fechahijos3, YEAR TO DAY), rp01sexohijos3, EXTEND(rp01fechahijos4, YEAR TO DAY), rp01sexohijos4, EXTEND(rp01fechahijos5, YEAR TO DAY), rp01sexohijos5, EXTEND(rp01fechahijos6, YEAR TO DAY), rp01sexohijos6, EXTEND(rp01fechahijos7, YEAR TO DAY), rp01sexohijos7, EXTEND(rp01fechahijos8, YEAR TO DAY), rp01sexohijos8, EXTEND(rp01fechahijos9, YEAR TO DAY), rp01sexohijos9, rp01cargaspadres, rp01otrascargas, rp01formapago, rp01nobancoemp, rp01ctabancoemp, rp01tipoctabco, EXTEND(rp01fechaultvacacion, YEAR TO DAY), rp01aporte, rp01socio, rp01transporte, rp01recibeporc, rp01sueldoanterior, rp01sueldosalario, EXTEND(rp01fecmodsdosal, YEAR TO DAY), EXTEND(rp01fecmodficha, YEAR TO DAY), rp01faltasinjust, rp01ingresos1er, rp01basesocialvalor, rp01basesocialtiempo, rp0114vopagoacum, rp0115vopagoacum, rp01cverrorliq, rp01porcentliq, rp01tiposangre, rp01ingresos2do, rp01provdiremp, rp01cantondiremp, rp01ciudaddiremp, rp01codocupacion, UID, block, ultimoacceso, rp01foto, rp01ctacontable, rp01email, rp01passwd, rp01huella, rp01recibefr, rp01recibedt, rp01recibedc, rp01UID, EXTEND(rp01fechaUID, YEAR TO FRACTION), rp01obs, rp01cauliq, rp01discapacidad, rp01conadis, rp01tpdiscapacidad, rp01prdiscapacidad, rp01freserva, rp01codsectorial, anticipoporvalor, tipIdRet, residenciaTrab, paisResidencia, aplicaConvenio, tipoTrabajDiscap, porcentajeDiscap, tipIdDiscap, idDiscap, rp01varias_secciones, rp01cc, rp01observacion, rp01iessconyugue, rp01tiporefrigerio, idiomas, emergencias, rp01tipojornada, rp01numero_horas, rp01emailpersonal, rp01supervisadopor, rp01zonaderiesgo, rp01refpersnom1, rp01refpersparen1, rp01refperstel1, rp01refpersnom2, rp01refpersparen2, rp01refperstel2, rp01tipovivienda, rp01serviciosbasicos, rp01viviendadetalle, rp01dormitorios, rp01sala, rp01comedor, rp01banos, rp01estudiosrealizados, rp01ruta1, rp01ruta2, rp01ruta3, rp01actividadesextras from " . $this->Ini->nm_tabela; 
   } 
   else 
   { 
       $nmgp_select = "SELECT rp01noemp, rp01division, rp01depto, rp01seccion, rp01noemp1, rp01nombreemp, rp01categoria, rp01turno, rp01statusemp, rp01fechastatus, rp01causaretiro, rp01direccion, rp01telefono, rp01lugarnacimiento, rp01fechanacimiento, rp01nacionalidad, rp01cedula, rp01noiess, rp01sexo, rp01nolibreta, rp01profesion, rp01fechaingreso, rp01fechareingreso, rp01cargo, rp01estadocivil, rp01rebajaxcasado, rp01nombreconyuge, rp01nombrepadre, rp01nombremadre, rp01nohijos, rp01fechahijos0, rp01sexohijos0, rp01fechahijos1, rp01sexohijos1, rp01fechahijos2, rp01sexohijos2, rp01fechahijos3, rp01sexohijos3, rp01fechahijos4, rp01sexohijos4, rp01fechahijos5, rp01sexohijos5, rp01fechahijos6, rp01sexohijos6, rp01fechahijos7, rp01sexohijos7, rp01fechahijos8, rp01sexohijos8, rp01fechahijos9, rp01sexohijos9, rp01cargaspadres, rp01otrascargas, rp01formapago, rp01nobancoemp, rp01ctabancoemp, rp01tipoctabco, rp01fechaultvacacion, rp01aporte, rp01socio, rp01transporte, rp01recibeporc, rp01sueldoanterior, rp01sueldosalario, rp01fecmodsdosal, rp01fecmodficha, rp01faltasinjust, rp01ingresos1er, rp01basesocialvalor, rp01basesocialtiempo, rp0114vopagoacum, rp0115vopagoacum, rp01cverrorliq, rp01porcentliq, rp01tiposangre, rp01ingresos2do, rp01provdiremp, rp01cantondiremp, rp01ciudaddiremp, rp01codocupacion, UID, block, ultimoacceso, rp01foto, rp01ctacontable, rp01email, rp01passwd, rp01huella, rp01recibefr, rp01recibedt, rp01recibedc, rp01UID, rp01fechaUID, rp01obs, rp01cauliq, rp01discapacidad, rp01conadis, rp01tpdiscapacidad, rp01prdiscapacidad, rp01freserva, rp01codsectorial, anticipoporvalor, tipIdRet, residenciaTrab, paisResidencia, aplicaConvenio, tipoTrabajDiscap, porcentajeDiscap, tipIdDiscap, idDiscap, rp01varias_secciones, rp01cc, rp01observacion, rp01iessconyugue, rp01tiporefrigerio, idiomas, emergencias, rp01tipojornada, rp01numero_horas, rp01emailpersonal, rp01supervisadopor, rp01zonaderiesgo, rp01refpersnom1, rp01refpersparen1, rp01refperstel1, rp01refpersnom2, rp01refpersparen2, rp01refperstel2, rp01tipovivienda, rp01serviciosbasicos, rp01viviendadetalle, rp01dormitorios, rp01sala, rp01comedor, rp01banos, rp01estudiosrealizados, rp01ruta1, rp01ruta2, rp01ruta3, rp01actividadesextras from " . $this->Ini->nm_tabela; 
   } 
   $parms_det = explode("*PDet*", $_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['chave_det']) ; 
   foreach ($parms_det as $key => $cada_par)
   {
       $parms_det[$key] = $this->Db->qstr($parms_det[$key]);
       $parms_det[$key] = substr($parms_det[$key], 1, strlen($parms_det[$key]) - 2);
   } 
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
   {
       $nmgp_select .= " where  rp01noemp = '$parms_det[0]'" ;  
   } 
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
   {
       $nmgp_select .= " where  rp01noemp = '$parms_det[0]'" ;  
   } 
   else 
   { 
       $nmgp_select .= " where  rp01noemp = '$parms_det[0]'" ;  
   } 
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
   $rs = $this->Db->Execute($nmgp_select) ; 
   if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
   { 
       $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit ; 
   }  
   $this->rp01noemp = $rs->fields[0] ;  
   $this->rp01division = $rs->fields[1] ;  
   $this->rp01depto = $rs->fields[2] ;  
   $this->rp01seccion = $rs->fields[3] ;  
   $this->rp01noemp1 = $rs->fields[4] ;  
   $this->rp01nombreemp = $rs->fields[5] ;  
   $this->rp01categoria = $rs->fields[6] ;  
   $this->rp01turno = $rs->fields[7] ;  
   $this->rp01statusemp = $rs->fields[8] ;  
   $this->rp01fechastatus = $rs->fields[9] ;  
   $this->rp01causaretiro = $rs->fields[10] ;  
   $this->rp01direccion = $rs->fields[11] ;  
   $this->rp01telefono = $rs->fields[12] ;  
   $this->rp01lugarnacimiento = $rs->fields[13] ;  
   $this->rp01fechanacimiento = $rs->fields[14] ;  
   $this->rp01nacionalidad = $rs->fields[15] ;  
   $this->rp01cedula = $rs->fields[16] ;  
   $this->rp01noiess = $rs->fields[17] ;  
   $this->rp01sexo = $rs->fields[18] ;  
   $this->rp01sexo = (string)$this->rp01sexo;
   $this->rp01nolibreta = $rs->fields[19] ;  
   $this->rp01profesion = $rs->fields[20] ;  
   $this->rp01fechaingreso = $rs->fields[21] ;  
   $this->rp01fechareingreso = $rs->fields[22] ;  
   $this->rp01cargo = $rs->fields[23] ;  
   $this->rp01estadocivil = $rs->fields[24] ;  
   $this->rp01rebajaxcasado = $rs->fields[25] ;  
   $this->rp01nombreconyuge = $rs->fields[26] ;  
   $this->rp01nombrepadre = $rs->fields[27] ;  
   $this->rp01nombremadre = $rs->fields[28] ;  
   $this->rp01nohijos = $rs->fields[29] ;  
   $this->rp01nohijos = (string)$this->rp01nohijos;
   $this->rp01fechahijos0 = $rs->fields[30] ;  
   $this->rp01sexohijos0 = $rs->fields[31] ;  
   $this->rp01sexohijos0 = (string)$this->rp01sexohijos0;
   $this->rp01fechahijos1 = $rs->fields[32] ;  
   $this->rp01sexohijos1 = $rs->fields[33] ;  
   $this->rp01sexohijos1 = (string)$this->rp01sexohijos1;
   $this->rp01fechahijos2 = $rs->fields[34] ;  
   $this->rp01sexohijos2 = $rs->fields[35] ;  
   $this->rp01sexohijos2 = (string)$this->rp01sexohijos2;
   $this->rp01fechahijos3 = $rs->fields[36] ;  
   $this->rp01sexohijos3 = $rs->fields[37] ;  
   $this->rp01sexohijos3 = (string)$this->rp01sexohijos3;
   $this->rp01fechahijos4 = $rs->fields[38] ;  
   $this->rp01sexohijos4 = $rs->fields[39] ;  
   $this->rp01sexohijos4 = (string)$this->rp01sexohijos4;
   $this->rp01fechahijos5 = $rs->fields[40] ;  
   $this->rp01sexohijos5 = $rs->fields[41] ;  
   $this->rp01sexohijos5 = (string)$this->rp01sexohijos5;
   $this->rp01fechahijos6 = $rs->fields[42] ;  
   $this->rp01sexohijos6 = $rs->fields[43] ;  
   $this->rp01sexohijos6 = (string)$this->rp01sexohijos6;
   $this->rp01fechahijos7 = $rs->fields[44] ;  
   $this->rp01sexohijos7 = $rs->fields[45] ;  
   $this->rp01sexohijos7 = (string)$this->rp01sexohijos7;
   $this->rp01fechahijos8 = $rs->fields[46] ;  
   $this->rp01sexohijos8 = $rs->fields[47] ;  
   $this->rp01sexohijos8 = (string)$this->rp01sexohijos8;
   $this->rp01fechahijos9 = $rs->fields[48] ;  
   $this->rp01sexohijos9 = $rs->fields[49] ;  
   $this->rp01sexohijos9 = (string)$this->rp01sexohijos9;
   $this->rp01cargaspadres = $rs->fields[50] ;  
   $this->rp01otrascargas = $rs->fields[51] ;  
   $this->rp01formapago = $rs->fields[52] ;  
   $this->rp01nobancoemp = $rs->fields[53] ;  
   $this->rp01ctabancoemp = $rs->fields[54] ;  
   $this->rp01tipoctabco = $rs->fields[55] ;  
   $this->rp01fechaultvacacion = $rs->fields[56] ;  
   $this->rp01aporte = $rs->fields[57] ;  
   $this->rp01socio = $rs->fields[58] ;  
   $this->rp01transporte = $rs->fields[59] ;  
   $this->rp01recibeporc = $rs->fields[60] ;  
   $this->rp01sueldoanterior = $rs->fields[61] ;  
   $this->rp01sueldoanterior = str_replace(",", ".", $this->rp01sueldoanterior);
   $this->rp01sueldoanterior = (strpos(strtolower($this->rp01sueldoanterior), "e")) ? (float)$this->rp01sueldoanterior : $this->rp01sueldoanterior; 
   $this->rp01sueldoanterior = (string)$this->rp01sueldoanterior;
   $this->rp01sueldosalario = $rs->fields[62] ;  
   $this->rp01sueldosalario = str_replace(",", ".", $this->rp01sueldosalario);
   $this->rp01sueldosalario = (strpos(strtolower($this->rp01sueldosalario), "e")) ? (float)$this->rp01sueldosalario : $this->rp01sueldosalario; 
   $this->rp01sueldosalario = (string)$this->rp01sueldosalario;
   $this->rp01fecmodsdosal = $rs->fields[63] ;  
   $this->rp01fecmodficha = $rs->fields[64] ;  
   $this->rp01faltasinjust = $rs->fields[65] ;  
   $this->rp01faltasinjust = str_replace(",", ".", $this->rp01faltasinjust);
   $this->rp01faltasinjust = (strpos(strtolower($this->rp01faltasinjust), "e")) ? (float)$this->rp01faltasinjust : $this->rp01faltasinjust; 
   $this->rp01faltasinjust = (string)$this->rp01faltasinjust;
   $this->rp01ingresos1er = $rs->fields[66] ;  
   $this->rp01ingresos1er = str_replace(",", ".", $this->rp01ingresos1er);
   $this->rp01ingresos1er = (strpos(strtolower($this->rp01ingresos1er), "e")) ? (float)$this->rp01ingresos1er : $this->rp01ingresos1er; 
   $this->rp01ingresos1er = (string)$this->rp01ingresos1er;
   $this->rp01basesocialvalor = $rs->fields[67] ;  
   $this->rp01basesocialvalor = str_replace(",", ".", $this->rp01basesocialvalor);
   $this->rp01basesocialvalor = (strpos(strtolower($this->rp01basesocialvalor), "e")) ? (float)$this->rp01basesocialvalor : $this->rp01basesocialvalor; 
   $this->rp01basesocialvalor = (string)$this->rp01basesocialvalor;
   $this->rp01basesocialtiempo = $rs->fields[68] ;  
   $this->rp01basesocialtiempo = str_replace(",", ".", $this->rp01basesocialtiempo);
   $this->rp01basesocialtiempo = (strpos(strtolower($this->rp01basesocialtiempo), "e")) ? (float)$this->rp01basesocialtiempo : $this->rp01basesocialtiempo; 
   $this->rp01basesocialtiempo = (string)$this->rp01basesocialtiempo;
   $this->rp0114vopagoacum = $rs->fields[69] ;  
   $this->rp0114vopagoacum = str_replace(",", ".", $this->rp0114vopagoacum);
   $this->rp0114vopagoacum = (strpos(strtolower($this->rp0114vopagoacum), "e")) ? (float)$this->rp0114vopagoacum : $this->rp0114vopagoacum; 
   $this->rp0114vopagoacum = (string)$this->rp0114vopagoacum;
   $this->rp0115vopagoacum = $rs->fields[70] ;  
   $this->rp0115vopagoacum = str_replace(",", ".", $this->rp0115vopagoacum);
   $this->rp0115vopagoacum = (strpos(strtolower($this->rp0115vopagoacum), "e")) ? (float)$this->rp0115vopagoacum : $this->rp0115vopagoacum; 
   $this->rp0115vopagoacum = (string)$this->rp0115vopagoacum;
   $this->rp01cverrorliq = $rs->fields[71] ;  
   $this->rp01porcentliq = $rs->fields[72] ;  
   $this->rp01porcentliq = str_replace(",", ".", $this->rp01porcentliq);
   $this->rp01porcentliq = (strpos(strtolower($this->rp01porcentliq), "e")) ? (float)$this->rp01porcentliq : $this->rp01porcentliq; 
   $this->rp01porcentliq = (string)$this->rp01porcentliq;
   $this->rp01tiposangre = $rs->fields[73] ;  
   $this->rp01ingresos2do = $rs->fields[74] ;  
   $this->rp01ingresos2do = str_replace(",", ".", $this->rp01ingresos2do);
   $this->rp01ingresos2do = (strpos(strtolower($this->rp01ingresos2do), "e")) ? (float)$this->rp01ingresos2do : $this->rp01ingresos2do; 
   $this->rp01ingresos2do = (string)$this->rp01ingresos2do;
   $this->rp01provdiremp = $rs->fields[75] ;  
   $this->rp01cantondiremp = $rs->fields[76] ;  
   $this->rp01ciudaddiremp = $rs->fields[77] ;  
   $this->rp01codocupacion = $rs->fields[78] ;  
   $this->uid = $rs->fields[79] ;  
   $this->uid = (string)$this->uid;
   $this->block = $rs->fields[80] ;  
   $this->block = (string)$this->block;
   $this->ultimoacceso = $rs->fields[81] ;  
   $this->ultimoacceso = (string)$this->ultimoacceso;
   $this->rp01foto = $rs->fields[82] ;  
   $this->rp01ctacontable = $rs->fields[83] ;  
   $this->rp01email = $rs->fields[84] ;  
   $this->rp01passwd = $rs->fields[85] ;  
   $this->rp01huella = $rs->fields[86] ;  
   $this->rp01recibefr = $rs->fields[87] ;  
   $this->rp01recibedt = $rs->fields[88] ;  
   $this->rp01recibedc = $rs->fields[89] ;  
   $this->rp01uid = $rs->fields[90] ;  
   $this->rp01uid = (string)$this->rp01uid;
   $this->rp01fechauid = $rs->fields[91] ;  
   $this->rp01obs = $rs->fields[92] ;  
   $this->rp01cauliq = $rs->fields[93] ;  
   $this->rp01discapacidad = $rs->fields[94] ;  
   $this->rp01conadis = $rs->fields[95] ;  
   $this->rp01tpdiscapacidad = $rs->fields[96] ;  
   $this->rp01prdiscapacidad = $rs->fields[97] ;  
   $this->rp01prdiscapacidad = (string)$this->rp01prdiscapacidad;
   $this->rp01freserva = $rs->fields[98] ;  
   $this->rp01codsectorial = $rs->fields[99] ;  
   $this->anticipoporvalor = $rs->fields[100] ;  
   $this->tipidret = $rs->fields[101] ;  
   $this->residenciatrab = $rs->fields[102] ;  
   $this->paisresidencia = $rs->fields[103] ;  
   $this->aplicaconvenio = $rs->fields[104] ;  
   $this->tipotrabajdiscap = $rs->fields[105] ;  
   $this->porcentajediscap = $rs->fields[106] ;  
   $this->tipiddiscap = $rs->fields[107] ;  
   $this->iddiscap = $rs->fields[108] ;  
   $this->rp01varias_secciones = $rs->fields[109] ;  
   $this->rp01cc = $rs->fields[110] ;  
   $this->rp01cc = (string)$this->rp01cc;
   $this->rp01observacion = $rs->fields[111] ;  
   $this->rp01iessconyugue = $rs->fields[112] ;  
   $this->rp01tiporefrigerio = $rs->fields[113] ;  
   $this->idiomas = $rs->fields[114] ;  
   $this->idiomas = (string)$this->idiomas;
   $this->emergencias = $rs->fields[115] ;  
   $this->emergencias = (string)$this->emergencias;
   $this->rp01tipojornada = $rs->fields[116] ;  
   $this->rp01numero_horas = $rs->fields[117] ;  
   $this->rp01numero_horas = (string)$this->rp01numero_horas;
   $this->rp01emailpersonal = $rs->fields[118] ;  
   $this->rp01supervisadopor = $rs->fields[119] ;  
   $this->rp01zonaderiesgo = $rs->fields[120] ;  
   $this->rp01refpersnom1 = $rs->fields[121] ;  
   $this->rp01refpersparen1 = $rs->fields[122] ;  
   $this->rp01refperstel1 = $rs->fields[123] ;  
   $this->rp01refpersnom2 = $rs->fields[124] ;  
   $this->rp01refpersparen2 = $rs->fields[125] ;  
   $this->rp01refperstel2 = $rs->fields[126] ;  
   $this->rp01tipovivienda = $rs->fields[127] ;  
   $this->rp01serviciosbasicos = $rs->fields[128] ;  
   $this->rp01viviendadetalle = $rs->fields[129] ;  
   $this->rp01dormitorios = $rs->fields[130] ;  
   $this->rp01dormitorios = (string)$this->rp01dormitorios;
   $this->rp01sala = $rs->fields[131] ;  
   $this->rp01sala = (string)$this->rp01sala;
   $this->rp01comedor = $rs->fields[132] ;  
   $this->rp01comedor = (string)$this->rp01comedor;
   $this->rp01banos = $rs->fields[133] ;  
   $this->rp01banos = (string)$this->rp01banos;
   $this->rp01estudiosrealizados = $rs->fields[134] ;  
   $this->rp01ruta1 = $rs->fields[135] ;  
   $this->rp01ruta2 = $rs->fields[136] ;  
   $this->rp01ruta3 = $rs->fields[137] ;  
   $this->rp01actividadesextras = $rs->fields[138] ;  
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['cmp_acum']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['cmp_acum']))
   {
       $parms_acum = explode(";", $_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['cmp_acum']);
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
   $nm_saida->saida("   <TITLE>" . $this->Ini->Nm_lang['lang_othr_detl_title'] . " maeemp</TITLE>\r\n");
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

           $nm_saida->saida("   <script type=\"text/javascript\" src=\"grid_maeemp_jquery-3.6.0.min.js\"></script>\r\n");
           $nm_saida->saida("   <script type=\"text/javascript\" src=\"grid_maeemp_ajax.js\"></script>\r\n");
           $nm_saida->saida("   <script type=\"text/javascript\" src=\"grid_maeemp_message.js\"></script>\r\n");
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
   if (($this->Ini->sc_export_ajax || $this->Ini->Export_det_zip) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['det_print'] == "print")
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
       $NM_css_cmp  = $this->Ini->path_link . "grid_maeemp/grid_maeemp_det_" . strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) . ".css";
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
   elseif (($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['det_print'] == "print" && strtoupper($nmgp_cor_print) == "PB") || $nmgp_tipo_pdf == "pb")
   {
       $nm_saida->saida(" <link rel=\"stylesheet\" type=\"text/css\" href=\"" . $this->Ini->path_link . "_lib/css/" . $this->Ini->str_schema_all . "_grid_bw.css\" /> \r\n");
       $nm_saida->saida(" <link rel=\"stylesheet\" type=\"text/css\" href=\"" . $this->Ini->path_link . "_lib/css/" . $this->Ini->str_schema_all . "_grid_bw" . $_SESSION['scriptcase']['reg_conf']['css_dir'] . ".css\" /> \r\n");
       $nm_saida->saida(" <link rel=\"stylesheet\" type=\"text/css\" href=\"" . $this->Ini->path_link . "grid_maeemp/grid_maeemp_det_" . strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) . ".css\" />\r\n");
   }
   else
   {
       $nm_saida->saida(" <link rel=\"stylesheet\" type=\"text/css\" href=\"" . $this->Ini->path_link . "_lib/css/" . $this->Ini->str_schema_all . "_grid.css\" /> \r\n");
       $nm_saida->saida(" <link rel=\"stylesheet\" type=\"text/css\" href=\"" . $this->Ini->path_link . "_lib/css/" . $this->Ini->str_schema_all . "_grid" . $_SESSION['scriptcase']['reg_conf']['css_dir'] . ".css\" /> \r\n");
       $nm_saida->saida(" <link rel=\"stylesheet\" type=\"text/css\" href=\"" . $this->Ini->path_link . "grid_maeemp/grid_maeemp_det_" . strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) . ".css\" />\r\n");
   }
       $nm_saida->saida(" <link rel=\"stylesheet\" href=\"" . $this->Ini->path_prod . "/third/font-awesome/css/all.min.css\" type=\"text/css\" media=\"screen\" />\r\n");
   if(isset($this->Ini->str_google_fonts) && !empty($this->Ini->str_google_fonts)) 
   { 
       $nm_saida->saida(" <link href=\"" . $this->Ini->str_google_fonts . "\" rel=\"stylesheet\" /> \r\n");
   } 
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['pdf_det'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['det_print'] != "print")
   {
       $nm_saida->saida(" <link rel=\"stylesheet\" type=\"text/css\" href=\"../_lib/buttons/" . $this->Ini->Str_btn_css . "\" /> \r\n");
       $nm_saida->saida(" <link rel=\"stylesheet\" href=\"../_lib/css/" . $_SESSION['scriptcase']['erro']['str_schema'] . "\" type=\"text/css\" media=\"screen\" />\r\n");
       $nm_saida->saida(" <link rel=\"stylesheet\" href=\"../_lib/css/" . $_SESSION['scriptcase']['erro']['str_schema_dir'] . "\" type=\"text/css\" media=\"screen\" />\r\n");
   }
   $nm_saida->saida("</HEAD>\r\n");
    $removeMargin = isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['link_info']['remove_margin']) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['link_info']['remove_margin'] ? 'margin: 0;' : '';
    $removeBorder = isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['link_info']['remove_border']) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['link_info']['remove_border'] ? 'border-width: 0' : '';
   if (!$this->Ini->Export_html_zip && !$this->Ini->Export_det_zip && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['det_print'] == "print")
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
   if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['link_info']['compact_mode']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['link_info']['compact_mode']) {
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
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['rp01noemp'])) ? $this->New_label['rp01noemp'] : "Rp 0 1noemp"; 
   $conteudo = trim(sc_strip_script($this->rp01noemp)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'rp01noemp', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'rp01noemp', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_rp01noemp_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_rp01noemp_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['rp01division'])) ? $this->New_label['rp01division'] : "Rp 0 1division"; 
   $conteudo = trim(sc_strip_script($this->rp01division)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'rp01division', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'rp01division', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_rp01division_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_rp01division_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['rp01depto'])) ? $this->New_label['rp01depto'] : "Rp 0 1depto"; 
   $conteudo = trim(sc_strip_script($this->rp01depto)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'rp01depto', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'rp01depto', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_rp01depto_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_rp01depto_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['rp01seccion'])) ? $this->New_label['rp01seccion'] : "Rp 0 1seccion"; 
   $conteudo = trim(sc_strip_script($this->rp01seccion)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'rp01seccion', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'rp01seccion', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_rp01seccion_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_rp01seccion_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['rp01noemp1'])) ? $this->New_label['rp01noemp1'] : "Rp 0 1noemp 1"; 
   $conteudo = trim(sc_strip_script($this->rp01noemp1)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'rp01noemp1', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'rp01noemp1', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_rp01noemp1_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_rp01noemp1_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['rp01nombreemp'])) ? $this->New_label['rp01nombreemp'] : "Rp 0 1nombreemp"; 
   $conteudo = trim(sc_strip_script($this->rp01nombreemp)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'rp01nombreemp', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'rp01nombreemp', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_rp01nombreemp_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_rp01nombreemp_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['rp01categoria'])) ? $this->New_label['rp01categoria'] : "Rp 0 1categoria"; 
   $conteudo = trim(sc_strip_script($this->rp01categoria)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'rp01categoria', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'rp01categoria', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_rp01categoria_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_rp01categoria_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['rp01turno'])) ? $this->New_label['rp01turno'] : "Rp 0 1turno"; 
   $conteudo = trim(sc_strip_script($this->rp01turno)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'rp01turno', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'rp01turno', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_rp01turno_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_rp01turno_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['rp01statusemp'])) ? $this->New_label['rp01statusemp'] : "Rp 0 1statusemp"; 
   $conteudo = trim(sc_strip_script($this->rp01statusemp)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'rp01statusemp', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'rp01statusemp', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_rp01statusemp_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_rp01statusemp_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['rp01fechastatus'])) ? $this->New_label['rp01fechastatus'] : "Rp 0 1fechastatus"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->rp01fechastatus))); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
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
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'rp01fechastatus', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'rp01fechastatus', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_rp01fechastatus_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_rp01fechastatus_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['rp01causaretiro'])) ? $this->New_label['rp01causaretiro'] : "Rp 0 1causaretiro"; 
   $conteudo = trim(sc_strip_script($this->rp01causaretiro)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'rp01causaretiro', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'rp01causaretiro', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_rp01causaretiro_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_rp01causaretiro_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['rp01direccion'])) ? $this->New_label['rp01direccion'] : "Rp 0 1direccion"; 
   $conteudo = trim(sc_strip_script($this->rp01direccion)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'rp01direccion', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'rp01direccion', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_rp01direccion_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_rp01direccion_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['rp01telefono'])) ? $this->New_label['rp01telefono'] : "Rp 0 1telefono"; 
   $conteudo = trim(sc_strip_script($this->rp01telefono)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'rp01telefono', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'rp01telefono', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_rp01telefono_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_rp01telefono_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['rp01lugarnacimiento'])) ? $this->New_label['rp01lugarnacimiento'] : "Rp 0 1lugarnacimiento"; 
   $conteudo = trim(sc_strip_script($this->rp01lugarnacimiento)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'rp01lugarnacimiento', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'rp01lugarnacimiento', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_rp01lugarnacimiento_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_rp01lugarnacimiento_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['rp01fechanacimiento'])) ? $this->New_label['rp01fechanacimiento'] : "Rp 0 1fechanacimiento"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->rp01fechanacimiento))); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
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
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'rp01fechanacimiento', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'rp01fechanacimiento', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_rp01fechanacimiento_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_rp01fechanacimiento_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['rp01nacionalidad'])) ? $this->New_label['rp01nacionalidad'] : "Rp 0 1nacionalidad"; 
   $conteudo = trim(sc_strip_script($this->rp01nacionalidad)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'rp01nacionalidad', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'rp01nacionalidad', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_rp01nacionalidad_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_rp01nacionalidad_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['rp01cedula'])) ? $this->New_label['rp01cedula'] : "Rp 0 1cedula"; 
   $conteudo = trim(sc_strip_script($this->rp01cedula)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'rp01cedula', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'rp01cedula', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_rp01cedula_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_rp01cedula_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['rp01noiess'])) ? $this->New_label['rp01noiess'] : "Rp 0 1noiess"; 
   $conteudo = trim(sc_strip_script($this->rp01noiess)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'rp01noiess', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'rp01noiess', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_rp01noiess_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_rp01noiess_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['rp01sexo'])) ? $this->New_label['rp01sexo'] : "Rp 0 1sexo"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->rp01sexo))); 
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
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'rp01sexo', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'rp01sexo', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_rp01sexo_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_rp01sexo_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['rp01nolibreta'])) ? $this->New_label['rp01nolibreta'] : "Rp 0 1nolibreta"; 
   $conteudo = trim(sc_strip_script($this->rp01nolibreta)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'rp01nolibreta', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'rp01nolibreta', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_rp01nolibreta_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_rp01nolibreta_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['rp01profesion'])) ? $this->New_label['rp01profesion'] : "Rp 0 1profesion"; 
   $conteudo = trim(sc_strip_script($this->rp01profesion)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'rp01profesion', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'rp01profesion', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_rp01profesion_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_rp01profesion_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['rp01fechaingreso'])) ? $this->New_label['rp01fechaingreso'] : "Rp 0 1fechaingreso"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->rp01fechaingreso))); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
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
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'rp01fechaingreso', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'rp01fechaingreso', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_rp01fechaingreso_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_rp01fechaingreso_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['rp01fechareingreso'])) ? $this->New_label['rp01fechareingreso'] : "Rp 0 1fechareingreso"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->rp01fechareingreso))); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
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
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'rp01fechareingreso', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'rp01fechareingreso', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_rp01fechareingreso_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_rp01fechareingreso_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['rp01cargo'])) ? $this->New_label['rp01cargo'] : "Rp 0 1cargo"; 
   $conteudo = trim(sc_strip_script($this->rp01cargo)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'rp01cargo', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'rp01cargo', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_rp01cargo_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_rp01cargo_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['rp01estadocivil'])) ? $this->New_label['rp01estadocivil'] : "Rp 0 1estadocivil"; 
   $conteudo = trim(sc_strip_script($this->rp01estadocivil)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'rp01estadocivil', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'rp01estadocivil', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_rp01estadocivil_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_rp01estadocivil_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['rp01rebajaxcasado'])) ? $this->New_label['rp01rebajaxcasado'] : "Rp 0 1rebajaxcasado"; 
   $conteudo = trim(sc_strip_script($this->rp01rebajaxcasado)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'rp01rebajaxcasado', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'rp01rebajaxcasado', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_rp01rebajaxcasado_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_rp01rebajaxcasado_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['rp01nombreconyuge'])) ? $this->New_label['rp01nombreconyuge'] : "Rp 0 1nombreconyuge"; 
   $conteudo = trim(sc_strip_script($this->rp01nombreconyuge)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'rp01nombreconyuge', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'rp01nombreconyuge', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_rp01nombreconyuge_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_rp01nombreconyuge_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['rp01nombrepadre'])) ? $this->New_label['rp01nombrepadre'] : "Rp 0 1nombrepadre"; 
   $conteudo = trim(sc_strip_script($this->rp01nombrepadre)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'rp01nombrepadre', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'rp01nombrepadre', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_rp01nombrepadre_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_rp01nombrepadre_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['rp01nombremadre'])) ? $this->New_label['rp01nombremadre'] : "Rp 0 1nombremadre"; 
   $conteudo = trim(sc_strip_script($this->rp01nombremadre)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'rp01nombremadre', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'rp01nombremadre', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_rp01nombremadre_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_rp01nombremadre_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['rp01nohijos'])) ? $this->New_label['rp01nohijos'] : "Rp 0 1nohijos"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->rp01nohijos))); 
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
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'rp01nohijos', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'rp01nohijos', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_rp01nohijos_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_rp01nohijos_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['rp01fechahijos0'])) ? $this->New_label['rp01fechahijos0'] : "Rp 0 1fechahijos"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->rp01fechahijos0))); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
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
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'rp01fechahijos0', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'rp01fechahijos0', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_rp01fechahijos0_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_rp01fechahijos0_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['rp01sexohijos0'])) ? $this->New_label['rp01sexohijos0'] : "Rp 0 1sexohijos"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->rp01sexohijos0))); 
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
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'rp01sexohijos0', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'rp01sexohijos0', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_rp01sexohijos0_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_rp01sexohijos0_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['rp01fechahijos1'])) ? $this->New_label['rp01fechahijos1'] : "Rp 0 1fechahijos 1"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->rp01fechahijos1))); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
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
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'rp01fechahijos1', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'rp01fechahijos1', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_rp01fechahijos1_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_rp01fechahijos1_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['rp01sexohijos1'])) ? $this->New_label['rp01sexohijos1'] : "Rp 0 1sexohijos 1"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->rp01sexohijos1))); 
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
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'rp01sexohijos1', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'rp01sexohijos1', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_rp01sexohijos1_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_rp01sexohijos1_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['rp01fechahijos2'])) ? $this->New_label['rp01fechahijos2'] : "Rp 0 1fechahijos 2"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->rp01fechahijos2))); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
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
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'rp01fechahijos2', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'rp01fechahijos2', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_rp01fechahijos2_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_rp01fechahijos2_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['rp01sexohijos2'])) ? $this->New_label['rp01sexohijos2'] : "Rp 0 1sexohijos 2"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->rp01sexohijos2))); 
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
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'rp01sexohijos2', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'rp01sexohijos2', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_rp01sexohijos2_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_rp01sexohijos2_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['rp01fechahijos3'])) ? $this->New_label['rp01fechahijos3'] : "Rp 0 1fechahijos 3"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->rp01fechahijos3))); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
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
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'rp01fechahijos3', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'rp01fechahijos3', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_rp01fechahijos3_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_rp01fechahijos3_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['rp01sexohijos3'])) ? $this->New_label['rp01sexohijos3'] : "Rp 0 1sexohijos 3"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->rp01sexohijos3))); 
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
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'rp01sexohijos3', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'rp01sexohijos3', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_rp01sexohijos3_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_rp01sexohijos3_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['rp01fechahijos4'])) ? $this->New_label['rp01fechahijos4'] : "Rp 0 1fechahijos 4"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->rp01fechahijos4))); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
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
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'rp01fechahijos4', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'rp01fechahijos4', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_rp01fechahijos4_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_rp01fechahijos4_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['rp01sexohijos4'])) ? $this->New_label['rp01sexohijos4'] : "Rp 0 1sexohijos 4"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->rp01sexohijos4))); 
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
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'rp01sexohijos4', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'rp01sexohijos4', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_rp01sexohijos4_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_rp01sexohijos4_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['rp01fechahijos5'])) ? $this->New_label['rp01fechahijos5'] : "Rp 0 1fechahijos 5"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->rp01fechahijos5))); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
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
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'rp01fechahijos5', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'rp01fechahijos5', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_rp01fechahijos5_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_rp01fechahijos5_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['rp01sexohijos5'])) ? $this->New_label['rp01sexohijos5'] : "Rp 0 1sexohijos 5"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->rp01sexohijos5))); 
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
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'rp01sexohijos5', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'rp01sexohijos5', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_rp01sexohijos5_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_rp01sexohijos5_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['rp01fechahijos6'])) ? $this->New_label['rp01fechahijos6'] : "Rp 0 1fechahijos 6"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->rp01fechahijos6))); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
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
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'rp01fechahijos6', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'rp01fechahijos6', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_rp01fechahijos6_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_rp01fechahijos6_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['rp01sexohijos6'])) ? $this->New_label['rp01sexohijos6'] : "Rp 0 1sexohijos 6"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->rp01sexohijos6))); 
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
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'rp01sexohijos6', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'rp01sexohijos6', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_rp01sexohijos6_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_rp01sexohijos6_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['rp01fechahijos7'])) ? $this->New_label['rp01fechahijos7'] : "Rp 0 1fechahijos 7"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->rp01fechahijos7))); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
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
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'rp01fechahijos7', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'rp01fechahijos7', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_rp01fechahijos7_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_rp01fechahijos7_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['rp01sexohijos7'])) ? $this->New_label['rp01sexohijos7'] : "Rp 0 1sexohijos 7"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->rp01sexohijos7))); 
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
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'rp01sexohijos7', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'rp01sexohijos7', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_rp01sexohijos7_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_rp01sexohijos7_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['rp01fechahijos8'])) ? $this->New_label['rp01fechahijos8'] : "Rp 0 1fechahijos 8"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->rp01fechahijos8))); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
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
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'rp01fechahijos8', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'rp01fechahijos8', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_rp01fechahijos8_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_rp01fechahijos8_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['rp01sexohijos8'])) ? $this->New_label['rp01sexohijos8'] : "Rp 0 1sexohijos 8"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->rp01sexohijos8))); 
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
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'rp01sexohijos8', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'rp01sexohijos8', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_rp01sexohijos8_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_rp01sexohijos8_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['rp01fechahijos9'])) ? $this->New_label['rp01fechahijos9'] : "Rp 0 1fechahijos 9"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->rp01fechahijos9))); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
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
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'rp01fechahijos9', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'rp01fechahijos9', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_rp01fechahijos9_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_rp01fechahijos9_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['rp01sexohijos9'])) ? $this->New_label['rp01sexohijos9'] : "Rp 0 1sexohijos 9"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->rp01sexohijos9))); 
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
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'rp01sexohijos9', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'rp01sexohijos9', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_rp01sexohijos9_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_rp01sexohijos9_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['rp01cargaspadres'])) ? $this->New_label['rp01cargaspadres'] : "Rp 0 1cargaspadres"; 
   $conteudo = trim(sc_strip_script($this->rp01cargaspadres)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'rp01cargaspadres', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'rp01cargaspadres', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_rp01cargaspadres_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_rp01cargaspadres_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['rp01otrascargas'])) ? $this->New_label['rp01otrascargas'] : "Rp 0 1otrascargas"; 
   $conteudo = trim(sc_strip_script($this->rp01otrascargas)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'rp01otrascargas', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'rp01otrascargas', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_rp01otrascargas_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_rp01otrascargas_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['rp01formapago'])) ? $this->New_label['rp01formapago'] : "Rp 0 1formapago"; 
   $conteudo = trim(sc_strip_script($this->rp01formapago)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'rp01formapago', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'rp01formapago', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_rp01formapago_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_rp01formapago_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['rp01nobancoemp'])) ? $this->New_label['rp01nobancoemp'] : "Rp 0 1nobancoemp"; 
   $conteudo = trim(sc_strip_script($this->rp01nobancoemp)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'rp01nobancoemp', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'rp01nobancoemp', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_rp01nobancoemp_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_rp01nobancoemp_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['rp01ctabancoemp'])) ? $this->New_label['rp01ctabancoemp'] : "Rp 0 1ctabancoemp"; 
   $conteudo = trim(sc_strip_script($this->rp01ctabancoemp)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'rp01ctabancoemp', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'rp01ctabancoemp', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_rp01ctabancoemp_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_rp01ctabancoemp_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['rp01tipoctabco'])) ? $this->New_label['rp01tipoctabco'] : "Rp 0 1tipoctabco"; 
   $conteudo = trim(sc_strip_script($this->rp01tipoctabco)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'rp01tipoctabco', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'rp01tipoctabco', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_rp01tipoctabco_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_rp01tipoctabco_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['rp01fechaultvacacion'])) ? $this->New_label['rp01fechaultvacacion'] : "Rp 0 1fechaultvacacion"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->rp01fechaultvacacion))); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
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
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'rp01fechaultvacacion', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'rp01fechaultvacacion', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_rp01fechaultvacacion_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_rp01fechaultvacacion_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['rp01aporte'])) ? $this->New_label['rp01aporte'] : "Rp 0 1aporte"; 
   $conteudo = trim(sc_strip_script($this->rp01aporte)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'rp01aporte', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'rp01aporte', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_rp01aporte_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_rp01aporte_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['rp01socio'])) ? $this->New_label['rp01socio'] : "Rp 0 1socio"; 
   $conteudo = trim(sc_strip_script($this->rp01socio)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'rp01socio', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'rp01socio', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_rp01socio_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_rp01socio_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['rp01transporte'])) ? $this->New_label['rp01transporte'] : "Rp 0 1transporte"; 
   $conteudo = trim(sc_strip_script($this->rp01transporte)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'rp01transporte', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'rp01transporte', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_rp01transporte_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_rp01transporte_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['rp01recibeporc'])) ? $this->New_label['rp01recibeporc'] : "Rp 0 1recibeporc"; 
   $conteudo = trim(sc_strip_script($this->rp01recibeporc)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'rp01recibeporc', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'rp01recibeporc', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_rp01recibeporc_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_rp01recibeporc_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['rp01sueldoanterior'])) ? $this->New_label['rp01sueldoanterior'] : "Rp 0 1sueldoanterior"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->rp01sueldoanterior))); 
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
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'rp01sueldoanterior', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'rp01sueldoanterior', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_rp01sueldoanterior_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_rp01sueldoanterior_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['rp01sueldosalario'])) ? $this->New_label['rp01sueldosalario'] : "Rp 0 1sueldosalario"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->rp01sueldosalario))); 
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
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'rp01sueldosalario', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'rp01sueldosalario', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_rp01sueldosalario_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_rp01sueldosalario_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['rp01fecmodsdosal'])) ? $this->New_label['rp01fecmodsdosal'] : "Rp 0 1fecmodsdosal"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->rp01fecmodsdosal))); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
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
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'rp01fecmodsdosal', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'rp01fecmodsdosal', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_rp01fecmodsdosal_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_rp01fecmodsdosal_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['rp01fecmodficha'])) ? $this->New_label['rp01fecmodficha'] : "Rp 0 1fecmodficha"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->rp01fecmodficha))); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
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
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'rp01fecmodficha', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'rp01fecmodficha', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_rp01fecmodficha_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_rp01fecmodficha_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['rp01faltasinjust'])) ? $this->New_label['rp01faltasinjust'] : "Rp 0 1faltasinjust"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->rp01faltasinjust))); 
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
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'rp01faltasinjust', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'rp01faltasinjust', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_rp01faltasinjust_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_rp01faltasinjust_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['rp01ingresos1er'])) ? $this->New_label['rp01ingresos1er'] : "Rp 0 1ingresos 1er"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->rp01ingresos1er))); 
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
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'rp01ingresos1er', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'rp01ingresos1er', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_rp01ingresos1er_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_rp01ingresos1er_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['rp01basesocialvalor'])) ? $this->New_label['rp01basesocialvalor'] : "Rp 0 1basesocialvalor"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->rp01basesocialvalor))); 
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
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'rp01basesocialvalor', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'rp01basesocialvalor', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_rp01basesocialvalor_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_rp01basesocialvalor_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['rp01basesocialtiempo'])) ? $this->New_label['rp01basesocialtiempo'] : "Rp 0 1basesocialtiempo"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->rp01basesocialtiempo))); 
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
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'rp01basesocialtiempo', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'rp01basesocialtiempo', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_rp01basesocialtiempo_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_rp01basesocialtiempo_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['rp0114vopagoacum'])) ? $this->New_label['rp0114vopagoacum'] : "Rp 011 4vopagoacum"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->rp0114vopagoacum))); 
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
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'rp0114vopagoacum', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'rp0114vopagoacum', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_rp0114vopagoacum_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_rp0114vopagoacum_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['rp0115vopagoacum'])) ? $this->New_label['rp0115vopagoacum'] : "Rp 011 5vopagoacum"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->rp0115vopagoacum))); 
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
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'rp0115vopagoacum', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'rp0115vopagoacum', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_rp0115vopagoacum_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_rp0115vopagoacum_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['rp01cverrorliq'])) ? $this->New_label['rp01cverrorliq'] : "Rp 0 1cverrorliq"; 
   $conteudo = trim(sc_strip_script($this->rp01cverrorliq)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'rp01cverrorliq', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'rp01cverrorliq', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_rp01cverrorliq_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_rp01cverrorliq_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['rp01porcentliq'])) ? $this->New_label['rp01porcentliq'] : "Rp 0 1porcentliq"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->rp01porcentliq))); 
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
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'rp01porcentliq', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'rp01porcentliq', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_rp01porcentliq_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_rp01porcentliq_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['rp01tiposangre'])) ? $this->New_label['rp01tiposangre'] : "Rp 0 1tiposangre"; 
   $conteudo = trim(sc_strip_script($this->rp01tiposangre)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'rp01tiposangre', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'rp01tiposangre', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_rp01tiposangre_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_rp01tiposangre_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['rp01ingresos2do'])) ? $this->New_label['rp01ingresos2do'] : "Rp 0 1ingresos 2do"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->rp01ingresos2do))); 
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
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'rp01ingresos2do', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'rp01ingresos2do', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_rp01ingresos2do_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_rp01ingresos2do_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['rp01provdiremp'])) ? $this->New_label['rp01provdiremp'] : "Rp 0 1provdiremp"; 
   $conteudo = trim(sc_strip_script($this->rp01provdiremp)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'rp01provdiremp', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'rp01provdiremp', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_rp01provdiremp_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_rp01provdiremp_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['rp01cantondiremp'])) ? $this->New_label['rp01cantondiremp'] : "Rp 0 1cantondiremp"; 
   $conteudo = trim(sc_strip_script($this->rp01cantondiremp)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'rp01cantondiremp', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'rp01cantondiremp', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_rp01cantondiremp_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_rp01cantondiremp_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['rp01ciudaddiremp'])) ? $this->New_label['rp01ciudaddiremp'] : "Rp 0 1ciudaddiremp"; 
   $conteudo = trim(sc_strip_script($this->rp01ciudaddiremp)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'rp01ciudaddiremp', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'rp01ciudaddiremp', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_rp01ciudaddiremp_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_rp01ciudaddiremp_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['rp01codocupacion'])) ? $this->New_label['rp01codocupacion'] : "Rp 0 1codocupacion"; 
   $conteudo = trim(sc_strip_script($this->rp01codocupacion)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'rp01codocupacion', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'rp01codocupacion', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_rp01codocupacion_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_rp01codocupacion_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['uid'])) ? $this->New_label['uid'] : "UID"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->uid))); 
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
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['embutida'] && !empty($conteudo)) 
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
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['block'])) ? $this->New_label['block'] : "Block"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->block))); 
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
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['embutida'] && !empty($conteudo)) 
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
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['ultimoacceso'])) ? $this->New_label['ultimoacceso'] : "Ultimoacceso"; 
   $conteudo = trim(sc_strip_script($this->ultimoacceso)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'ultimoacceso', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'ultimoacceso', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_ultimoacceso_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_ultimoacceso_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['rp01foto'])) ? $this->New_label['rp01foto'] : "Rp 0 1foto"; 
   $conteudo = trim(sc_strip_script($this->rp01foto)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'rp01foto', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'rp01foto', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_rp01foto_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_rp01foto_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['rp01ctacontable'])) ? $this->New_label['rp01ctacontable'] : "Rp 0 1ctacontable"; 
   $conteudo = trim(sc_strip_script($this->rp01ctacontable)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'rp01ctacontable', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'rp01ctacontable', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_rp01ctacontable_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_rp01ctacontable_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['rp01email'])) ? $this->New_label['rp01email'] : "Rp 0 1email"; 
   $conteudo = trim(sc_strip_script($this->rp01email)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'rp01email', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'rp01email', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_rp01email_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_rp01email_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['rp01passwd'])) ? $this->New_label['rp01passwd'] : "Rp 0 1passwd"; 
   $conteudo = trim(sc_strip_script($this->rp01passwd)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'rp01passwd', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'rp01passwd', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_rp01passwd_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_rp01passwd_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['rp01huella'])) ? $this->New_label['rp01huella'] : "Rp 0 1huella"; 
   $conteudo = trim(sc_strip_script($this->rp01huella)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'rp01huella', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'rp01huella', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_rp01huella_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_rp01huella_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['rp01recibefr'])) ? $this->New_label['rp01recibefr'] : "Rp 0 1recibefr"; 
   $conteudo = trim(sc_strip_script($this->rp01recibefr)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'rp01recibefr', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'rp01recibefr', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_rp01recibefr_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_rp01recibefr_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['rp01recibedt'])) ? $this->New_label['rp01recibedt'] : "Rp 0 1recibedt"; 
   $conteudo = trim(sc_strip_script($this->rp01recibedt)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'rp01recibedt', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'rp01recibedt', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_rp01recibedt_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_rp01recibedt_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['rp01recibedc'])) ? $this->New_label['rp01recibedc'] : "Rp 0 1recibedc"; 
   $conteudo = trim(sc_strip_script($this->rp01recibedc)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'rp01recibedc', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'rp01recibedc', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_rp01recibedc_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_rp01recibedc_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['rp01uid'])) ? $this->New_label['rp01uid'] : "Rp 01UID"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->rp01uid))); 
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
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'rp01uid', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'rp01uid', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_rp01uid_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_rp01uid_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['rp01fechauid'])) ? $this->New_label['rp01fechauid'] : "Rp 0 1fecha UID"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->rp01fechauid))); 
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
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'rp01fechauid', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'rp01fechauid', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_rp01fechauid_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_rp01fechauid_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['rp01obs'])) ? $this->New_label['rp01obs'] : "Rp 0 1obs"; 
   $conteudo = trim(sc_strip_script($this->rp01obs)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'rp01obs', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'rp01obs', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_rp01obs_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_rp01obs_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['rp01cauliq'])) ? $this->New_label['rp01cauliq'] : "Rp 0 1cauliq"; 
   $conteudo = trim(sc_strip_script($this->rp01cauliq)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'rp01cauliq', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'rp01cauliq', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_rp01cauliq_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_rp01cauliq_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['rp01discapacidad'])) ? $this->New_label['rp01discapacidad'] : "Rp 0 1discapacidad"; 
   $conteudo = trim(sc_strip_script($this->rp01discapacidad)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'rp01discapacidad', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'rp01discapacidad', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_rp01discapacidad_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_rp01discapacidad_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['rp01conadis'])) ? $this->New_label['rp01conadis'] : "Rp 0 1conadis"; 
   $conteudo = trim(sc_strip_script($this->rp01conadis)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'rp01conadis', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'rp01conadis', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_rp01conadis_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_rp01conadis_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['rp01tpdiscapacidad'])) ? $this->New_label['rp01tpdiscapacidad'] : "Rp 0 1tpdiscapacidad"; 
   $conteudo = trim(sc_strip_script($this->rp01tpdiscapacidad)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'rp01tpdiscapacidad', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'rp01tpdiscapacidad', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_rp01tpdiscapacidad_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_rp01tpdiscapacidad_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['rp01prdiscapacidad'])) ? $this->New_label['rp01prdiscapacidad'] : "Rp 0 1prdiscapacidad"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->rp01prdiscapacidad))); 
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
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'rp01prdiscapacidad', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'rp01prdiscapacidad', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_rp01prdiscapacidad_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_rp01prdiscapacidad_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['rp01freserva'])) ? $this->New_label['rp01freserva'] : "Rp 0 1freserva"; 
   $conteudo = trim(sc_strip_script($this->rp01freserva)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'rp01freserva', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'rp01freserva', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_rp01freserva_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_rp01freserva_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['rp01codsectorial'])) ? $this->New_label['rp01codsectorial'] : "Rp 0 1codsectorial"; 
   $conteudo = trim(sc_strip_script($this->rp01codsectorial)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'rp01codsectorial', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'rp01codsectorial', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_rp01codsectorial_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_rp01codsectorial_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['anticipoporvalor'])) ? $this->New_label['anticipoporvalor'] : "Anticipoporvalor"; 
   $conteudo = trim(sc_strip_script($this->anticipoporvalor)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'anticipoporvalor', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'anticipoporvalor', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_anticipoporvalor_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_anticipoporvalor_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['tipidret'])) ? $this->New_label['tipidret'] : "Tip Id Ret"; 
   $conteudo = trim(sc_strip_script($this->tipidret)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'tipidret', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'tipidret', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_tipidret_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_tipidret_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['residenciatrab'])) ? $this->New_label['residenciatrab'] : "Residencia Trab"; 
   $conteudo = trim(sc_strip_script($this->residenciatrab)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'residenciatrab', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'residenciatrab', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_residenciatrab_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_residenciatrab_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['paisresidencia'])) ? $this->New_label['paisresidencia'] : "Pais Residencia"; 
   $conteudo = trim(sc_strip_script($this->paisresidencia)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'paisresidencia', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'paisresidencia', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_paisresidencia_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_paisresidencia_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['aplicaconvenio'])) ? $this->New_label['aplicaconvenio'] : "Aplica Convenio"; 
   $conteudo = trim(sc_strip_script($this->aplicaconvenio)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'aplicaconvenio', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'aplicaconvenio', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_aplicaconvenio_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_aplicaconvenio_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['tipotrabajdiscap'])) ? $this->New_label['tipotrabajdiscap'] : "Tipo Trabaj Discap"; 
   $conteudo = trim(sc_strip_script($this->tipotrabajdiscap)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'tipotrabajdiscap', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'tipotrabajdiscap', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_tipotrabajdiscap_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_tipotrabajdiscap_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['porcentajediscap'])) ? $this->New_label['porcentajediscap'] : "Porcentaje Discap"; 
   $conteudo = trim(sc_strip_script($this->porcentajediscap)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'porcentajediscap', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'porcentajediscap', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_porcentajediscap_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_porcentajediscap_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['tipiddiscap'])) ? $this->New_label['tipiddiscap'] : "Tip Id Discap"; 
   $conteudo = trim(sc_strip_script($this->tipiddiscap)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'tipiddiscap', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'tipiddiscap', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_tipiddiscap_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_tipiddiscap_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['iddiscap'])) ? $this->New_label['iddiscap'] : "Id Discap"; 
   $conteudo = trim(sc_strip_script($this->iddiscap)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'iddiscap', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'iddiscap', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_iddiscap_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_iddiscap_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['rp01varias_secciones'])) ? $this->New_label['rp01varias_secciones'] : "Rp 0 1varias Secciones"; 
   $conteudo = trim(sc_strip_script($this->rp01varias_secciones)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'rp01varias_secciones', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'rp01varias_secciones', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_rp01varias_secciones_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_rp01varias_secciones_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['rp01cc'])) ? $this->New_label['rp01cc'] : "Rp 0 1cc"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->rp01cc))); 
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
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'rp01cc', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'rp01cc', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_rp01cc_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_rp01cc_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['rp01observacion'])) ? $this->New_label['rp01observacion'] : "Rp 0 1observacion"; 
   $conteudo = trim(sc_strip_script($this->rp01observacion)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'rp01observacion', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'rp01observacion', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_rp01observacion_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_rp01observacion_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['rp01iessconyugue'])) ? $this->New_label['rp01iessconyugue'] : "Rp 0 1iessconyugue"; 
   $conteudo = trim(sc_strip_script($this->rp01iessconyugue)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'rp01iessconyugue', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'rp01iessconyugue', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_rp01iessconyugue_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_rp01iessconyugue_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['rp01tiporefrigerio'])) ? $this->New_label['rp01tiporefrigerio'] : "Rp 0 1tiporefrigerio"; 
   $conteudo = trim(sc_strip_script($this->rp01tiporefrigerio)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'rp01tiporefrigerio', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'rp01tiporefrigerio', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_rp01tiporefrigerio_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_rp01tiporefrigerio_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['idiomas'])) ? $this->New_label['idiomas'] : "Idiomas"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->idiomas))); 
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
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'idiomas', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'idiomas', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_idiomas_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_idiomas_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['emergencias'])) ? $this->New_label['emergencias'] : "Emergencias"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->emergencias))); 
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
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'emergencias', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'emergencias', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_emergencias_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_emergencias_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['rp01tipojornada'])) ? $this->New_label['rp01tipojornada'] : "Rp 0 1tipojornada"; 
   $conteudo = trim(sc_strip_script($this->rp01tipojornada)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'rp01tipojornada', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'rp01tipojornada', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_rp01tipojornada_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_rp01tipojornada_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['rp01numero_horas'])) ? $this->New_label['rp01numero_horas'] : "Rp 0 1numero Horas"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->rp01numero_horas))); 
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
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'rp01numero_horas', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'rp01numero_horas', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_rp01numero_horas_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_rp01numero_horas_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['rp01emailpersonal'])) ? $this->New_label['rp01emailpersonal'] : "Rp 0 1emailpersonal"; 
   $conteudo = trim(sc_strip_script($this->rp01emailpersonal)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'rp01emailpersonal', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'rp01emailpersonal', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_rp01emailpersonal_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_rp01emailpersonal_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['rp01supervisadopor'])) ? $this->New_label['rp01supervisadopor'] : "Rp 0 1supervisadopor"; 
   $conteudo = trim(sc_strip_script($this->rp01supervisadopor)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'rp01supervisadopor', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'rp01supervisadopor', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_rp01supervisadopor_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_rp01supervisadopor_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['rp01zonaderiesgo'])) ? $this->New_label['rp01zonaderiesgo'] : "Rp 0 1zonaderiesgo"; 
   $conteudo = trim(sc_strip_script($this->rp01zonaderiesgo)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'rp01zonaderiesgo', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'rp01zonaderiesgo', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_rp01zonaderiesgo_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_rp01zonaderiesgo_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['rp01refpersnom1'])) ? $this->New_label['rp01refpersnom1'] : "Rp 0 1refpersnom 1"; 
   $conteudo = trim(sc_strip_script($this->rp01refpersnom1)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'rp01refpersnom1', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'rp01refpersnom1', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_rp01refpersnom1_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_rp01refpersnom1_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['rp01refpersparen1'])) ? $this->New_label['rp01refpersparen1'] : "Rp 0 1refpersparen 1"; 
   $conteudo = trim(sc_strip_script($this->rp01refpersparen1)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'rp01refpersparen1', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'rp01refpersparen1', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_rp01refpersparen1_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_rp01refpersparen1_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['rp01refperstel1'])) ? $this->New_label['rp01refperstel1'] : "Rp 0 1refperstel 1"; 
   $conteudo = trim(sc_strip_script($this->rp01refperstel1)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'rp01refperstel1', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'rp01refperstel1', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_rp01refperstel1_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_rp01refperstel1_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['rp01refpersnom2'])) ? $this->New_label['rp01refpersnom2'] : "Rp 0 1refpersnom 2"; 
   $conteudo = trim(sc_strip_script($this->rp01refpersnom2)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'rp01refpersnom2', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'rp01refpersnom2', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_rp01refpersnom2_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_rp01refpersnom2_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['rp01refpersparen2'])) ? $this->New_label['rp01refpersparen2'] : "Rp 0 1refpersparen 2"; 
   $conteudo = trim(sc_strip_script($this->rp01refpersparen2)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'rp01refpersparen2', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'rp01refpersparen2', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_rp01refpersparen2_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_rp01refpersparen2_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['rp01refperstel2'])) ? $this->New_label['rp01refperstel2'] : "Rp 0 1refperstel 2"; 
   $conteudo = trim(sc_strip_script($this->rp01refperstel2)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'rp01refperstel2', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'rp01refperstel2', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_rp01refperstel2_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_rp01refperstel2_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['rp01tipovivienda'])) ? $this->New_label['rp01tipovivienda'] : "Rp 0 1tipovivienda"; 
   $conteudo = trim(sc_strip_script($this->rp01tipovivienda)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'rp01tipovivienda', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'rp01tipovivienda', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_rp01tipovivienda_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_rp01tipovivienda_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['rp01serviciosbasicos'])) ? $this->New_label['rp01serviciosbasicos'] : "Rp 0 1serviciosbasicos"; 
   $conteudo = trim(sc_strip_script($this->rp01serviciosbasicos)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'rp01serviciosbasicos', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'rp01serviciosbasicos', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_rp01serviciosbasicos_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_rp01serviciosbasicos_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['rp01viviendadetalle'])) ? $this->New_label['rp01viviendadetalle'] : "Rp 0 1viviendadetalle"; 
   $conteudo = trim(sc_strip_script($this->rp01viviendadetalle)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'rp01viviendadetalle', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'rp01viviendadetalle', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_rp01viviendadetalle_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_rp01viviendadetalle_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['rp01dormitorios'])) ? $this->New_label['rp01dormitorios'] : "Rp 0 1dormitorios"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->rp01dormitorios))); 
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
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'rp01dormitorios', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'rp01dormitorios', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_rp01dormitorios_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_rp01dormitorios_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['rp01sala'])) ? $this->New_label['rp01sala'] : "Rp 0 1sala"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->rp01sala))); 
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
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'rp01sala', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'rp01sala', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_rp01sala_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_rp01sala_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['rp01comedor'])) ? $this->New_label['rp01comedor'] : "Rp 0 1comedor"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->rp01comedor))); 
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
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'rp01comedor', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'rp01comedor', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_rp01comedor_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_rp01comedor_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['rp01banos'])) ? $this->New_label['rp01banos'] : "Rp 0 1banos"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->rp01banos))); 
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
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'rp01banos', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'rp01banos', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_rp01banos_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_rp01banos_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['rp01estudiosrealizados'])) ? $this->New_label['rp01estudiosrealizados'] : "Rp 0 1estudiosrealizados"; 
   $conteudo = trim(sc_strip_script($this->rp01estudiosrealizados)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'rp01estudiosrealizados', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'rp01estudiosrealizados', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_rp01estudiosrealizados_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_rp01estudiosrealizados_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['rp01ruta1'])) ? $this->New_label['rp01ruta1'] : "Rp 0 1ruta 1"; 
   $conteudo = trim(sc_strip_script($this->rp01ruta1)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'rp01ruta1', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'rp01ruta1', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_rp01ruta1_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_rp01ruta1_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['rp01ruta2'])) ? $this->New_label['rp01ruta2'] : "Rp 0 1ruta 2"; 
   $conteudo = trim(sc_strip_script($this->rp01ruta2)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'rp01ruta2', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'rp01ruta2', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_rp01ruta2_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_rp01ruta2_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['rp01ruta3'])) ? $this->New_label['rp01ruta3'] : "Rp 0 1ruta 3"; 
   $conteudo = trim(sc_strip_script($this->rp01ruta3)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'rp01ruta3', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'rp01ruta3', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_rp01ruta3_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_rp01ruta3_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['rp01actividadesextras'])) ? $this->New_label['rp01actividadesextras'] : "Rp 0 1actividadesextras"; 
   $conteudo = trim(sc_strip_script($this->rp01actividadesextras)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'rp01actividadesextras', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'rp01actividadesextras', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_rp01actividadesextras_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_rp01actividadesextras_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
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
   $nm_saida->saida("                  action=\"grid_maeemp_iframe_prt.php\" \r\n");
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
   $nm_saida->saida("       NovaJanela = window.open (\"grid_maeemp_doc.php?nmgp_parms=\" + campo1, \"ScriptCase\", \"resizable\");\r\n");
   $nm_saida->saida("   }\r\n");
   $nm_saida->saida("   function nm_gp_move(x, y, z, p, g, crt, ajax, chart_level, page_break_pdf, SC_module_export, use_pass_pdf, pdf_all_cab, pdf_all_label, pdf_label_group, pdf_zip) \r\n");
   $nm_saida->saida("   {\r\n");
   $nm_saida->saida("       if (\"pdf_det\" == x && \"S\" == ajax)\r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("           $('#TB_window').remove();\r\n");
   $nm_saida->saida("           $('body').append(\"<div id='TB_window'></div>\");\r\n");
   $nm_saida->saida("               nm_submit_modal(\"" . $this->Ini->path_link . "grid_maeemp/grid_maeemp_export_email.php?script_case_init={$this->Ini->sc_page}&path_img={$this->Ini->path_img_global}&path_btn={$this->Ini->path_botoes}&sType=pdf_det&sAdd=__E__nmgp_tipo_pdf=\" + z + \"__E__sc_parms_pdf=\" + p + \"__E__sc_create_charts=\" + crt + \"__E__sc_graf_pdf=\" + g + \"__E__chart_level=\" + chart_level + \"__E__Det_use_pass_pdf=\" + use_pass_pdf + \"__E__Det_pdf_zip=\" + pdf_zip + \"&nm_opc=pdf_det&KeepThis=true&TB_iframe=true&modal=true\", '');\r\n");
   $nm_saida->saida("       }\r\n");
   $nm_saida->saida("       else\r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("           window.location = \"" . $this->Ini->path_link . "grid_maeemp/index.php?nmgp_opcao=pdf_det&nmgp_tipo_pdf=\" + z + \"&nmgp_parms_pdf=\" + p +  \"&nmgp_graf_pdf=\" + g + \"&Det_use_pass_pdf=\" + use_pass_pdf + \"&Det_pdf_zip=\" + pdf_zip + \"&script_case_init=" . NM_encode_input($this->Ini->sc_page) . "\";\r\n");
   $nm_saida->saida("       }\r\n");
   $nm_saida->saida("   }\r\n");
   $nm_saida->saida("   function nm_gp_print_conf(tp, cor, res_cons, password, ajax, str_type, bol_param)\r\n");
   $nm_saida->saida("   {\r\n");
   $nm_saida->saida("       if (\"D\" == ajax)\r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("           $('#TB_window').remove();\r\n");
   $nm_saida->saida("           $('body').append(\"<div id='TB_window'></div>\");\r\n");
   $nm_saida->saida("               nm_submit_modal(\"" . $this->Ini->path_link . "grid_maeemp/grid_maeemp_export_email.php?script_case_init={$this->Ini->sc_page}&path_img={$this->Ini->path_img_global}&path_btn={$this->Ini->path_botoes}&sType=\"+ str_type +\"&sAdd=__E__nmgp_tipo_print=\" + tp + \"__E__nmgp_cor_print=\" + cor + \"&KeepThis=true&TB_iframe=true&modal=true\", bol_param);\r\n");
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
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['det_print'] != "print" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['pdf_det']) 
   { 
       $nm_saida->saida("   <tr  id=\"obj_barra_top\"><td class=\"scGridTabelaTd\">\r\n");
       $nm_saida->saida("    <table class=\"scGridToolbar\" style=\"padding: 0px; border-spacing: 0px; border-width: 0px; vertical-align: top;\" valign=\"top\" width=\"100%\"><tr>\r\n");
       $nm_saida->saida("     <td class=\"scGridToolbarPadding\" nowrap valign=\"middle\" align=\"left\" width=\"33%\">\r\n");
       $nm_saida->saida("         </td> \r\n");
       $nm_saida->saida("          <td class=\"scGridToolbarPadding\" nowrap valign=\"middle\" align=\"center\" width=\"33%\"> \r\n");
       if ($this->nmgp_botoes['det_pdf'] == "on")
       {
         $this->nm_btn_exist['det_pdf'][] = "Dpdf_top";
         $Cod_Btn = nmButtonOutput($this->arr_buttons, "bpdf", "", "", "Dpdf_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "thickbox", "" . $this->Ini->path_link . "grid_maeemp/grid_maeemp_config_pdf.php?nm_opc=pdf_det&nm_target=0&nm_cor=cor&papel=1&orientacao=1&largura=1200&conf_larg=S&conf_fonte=10&language=es&conf_socor=N&sc_ver_93=" . s . "&password=n&pdf_zip=N&KeepThis=false&TB_iframe=true&modal=true", "", "only_text", "text_right", "", "", "", "", "", "", "");
         $nm_saida->saida("           $Cod_Btn \r\n");
       }
       if ($this->nmgp_botoes['det_print'] == "on")
       {
         $this->nm_btn_exist['det_print'][] = "Dprint_top";
         $Cod_Btn = nmButtonOutput($this->arr_buttons, "bprint", "", "", "Dprint_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "thickbox", "" . $this->Ini->path_link . "grid_maeemp/grid_maeemp_config_print.php?nm_opc=detalhe&nm_cor=CO&password=n&language=es&KeepThis=true&TB_iframe=true&modal=true", "", "only_text", "text_right", "", "", "", "", "", "", "");
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
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['det_print'] != "print" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maeemp']['pdf_det']) 
   { 
       $nm_saida->saida("   <tr  id=\"obj_barra_top\"><td class=\"scGridTabelaTd\">\r\n");
       $nm_saida->saida("    <table class=\"scGridToolbar\" style=\"padding: 0px; border-spacing: 0px; border-width: 0px; vertical-align: top;\" valign=\"top\" width=\"100%\"><tr>\r\n");
       $nm_saida->saida("     <td class=\"scGridToolbarPadding\" nowrap valign=\"middle\" align=\"left\" width=\"33%\">\r\n");
       if ($this->nmgp_botoes['det_pdf'] == "on")
       {
         $this->nm_btn_exist['det_pdf'][] = "Dpdf_top";
         $Cod_Btn = nmButtonOutput($this->arr_buttons, "bpdf", "", "", "Dpdf_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "thickbox", "" . $this->Ini->path_link . "grid_maeemp/grid_maeemp_config_pdf.php?nm_opc=pdf_det&nm_target=0&nm_cor=cor&papel=1&orientacao=1&largura=1200&conf_larg=S&conf_fonte=10&language=es&conf_socor=N&sc_ver_93=" . s . "&password=n&pdf_zip=N&KeepThis=false&TB_iframe=true&modal=true", "", "only_text", "text_right", "", "", "", "", "", "", "");
         $nm_saida->saida("           $Cod_Btn \r\n");
       }
       if ($this->nmgp_botoes['det_print'] == "on")
       {
         $this->nm_btn_exist['det_print'][] = "Dprint_top";
         $Cod_Btn = nmButtonOutput($this->arr_buttons, "bprint", "", "", "Dprint_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "thickbox", "" . $this->Ini->path_link . "grid_maeemp/grid_maeemp_config_print.php?nm_opc=detalhe&nm_cor=CO&password=n&language=es&KeepThis=true&TB_iframe=true&modal=true", "", "only_text", "text_right", "", "", "", "", "", "", "");
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
