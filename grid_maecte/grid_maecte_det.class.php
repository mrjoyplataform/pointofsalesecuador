<?php
//--- 
class grid_maecte_det
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
   var $codcte01;
   var $tipo_cliente;
   var $id_nacionalidad;
   var $nomcte01;
   var $primer_nombre;
   var $segundo_nombre;
   var $primer_apellido;
   var $segundo_apellido;
   var $cv1cte01;
   var $cv2cte01;
   var $tipcte01;
   var $ofienccte01;
   var $vendcte01;
   var $cobrcte01;
   var $loccte01;
   var $dircte01;
   var $sector;
   var $calle_principal;
   var $no;
   var $calle_secundaria;
   var $id_pais;
   var $id_provincia;
   var $id_ciudad;
   var $id_canton;
   var $telcte01;
   var $cascte01;
   var $ci_conyuge;
   var $conyuge_tipo_identidad;
   var $conyuge_primer_nombre;
   var $conyuge_segundo_nombre;
   var $conyuge_primer_apellido;
   var $conyuge_segundo_apellido;
   var $conyuge_profesion;
   var $id_tipo_documento;
   var $repleg01;
   var $fecing01;
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
   var $calle_principal_exterior;
   var $no_exterior;
   var $calle_secundaria_exterior;
   var $id_pais_exterior;
   var $id_ciudad_exterior;
   var $codigo_postal_exterior;
   var $sector_exterior;
   var $telefono_exterior;
   var $celular_exterior;
   var $email_exterior;
   var $emailaltcte01;
   var $ctacgcte01;
   var $obsercte01;
   var $totexceso01;
   var $imagencte01;
   var $block;
   var $uid;
   var $ultimoacceso;
   var $idcli;
   var $catcte01;
   var $transferido;
   var $password;
   var $showroom;
   var $orden;
   var $website;
   var $longitud01;
   var $latitud01;
   var $zoom01;
   var $acceder;
   var $coniva01;
   var $idemp01;
   var $codprov01;
   var $celular01;
   var $dircliente01;
   var $razcte01;
   var $ruc01;
   var $timenegocio01;
   var $refbanc01;
   var $refcom01;
   var $tarjcred01;
   var $firmaut01;
   var $precte01;
   var $cuotasven01;
   var $diasven01;
   var $fechanace01;
   var $sexo01;
   var $estadocivil01;
   var $dirgestion01;
   var $numhijos01;
   var $estsop01;
   var $notick01;
   var $chequece;
   var $solcre;
   var $promocte01;
   var $pagare01;
   var $valorpagare01;
   var $garante01;
   var $fecvenp01;
   var $ctacgant01;
   var $dsn;
   var $residente;
   var $medio_contacto;
   var $separacion_bienes;
   var $disolucion_conyugal;
   var $capitulaciones;
   var $numero_carga_familiar;
   var $nivel_educacion;
   var $profesion;
   var $envio_correspondencia;
   var $nombre_arrendador;
   var $apellido_arrendador;
   var $id_vivienda;
   var $telefono_arrendador;
   var $nombres_referencia;
   var $apellidos_referencia;
   var $parentesco;
   var $celular_ref;
   var $telefono_convencional_ref;
   var $id_ocupacion;
   var $fecha_ingreso_empresa;
   var $nombre_empresa;
   var $ciudad_empresa;
   var $provincia_empresa;
   var $direccion_empresa;
   var $cargo_empresa;
   var $telefono_empresa;
   var $ext_empresa;
   var $id_tipo_contrato_actividad;
   var $empresa_jubilo_actividad;
   var $fecha_salida_empresa_actividad;
   var $cargo_salida_empresa_actividad;
   var $fecha_inicio_actividad;
   var $fecha_ingreso_empresa_actividad;
   var $nombre_empresa_actividad;
   var $institucion_actividad;
   var $ciudad_actividad;
   var $provincia_actividad;
   var $direccion_actividad;
   var $calle_principal_actividad;
   var $no_actividad;
   var $calle_secundaria_actividad;
   var $sector_actividad;
   var $pais_actividad;
   var $actividad;
   var $telefono_actividad;
   var $cargo_actividad;
   var $ext_actividad;
   var $fecha_ingreso_empresa_actividad2;
   var $nombre_empresa_actividad2;
   var $institucion_actividad2;
   var $ciudad_actividad2;
   var $provincia_actividad2;
   var $direccion_actividad2;
   var $calle_principal_actividad2;
   var $no_actividad2;
   var $calle_secundaria_actividad2;
   var $sector_actividad2;
   var $fecha_salida_empresa_actividad2;
   var $fecha_inicio_actividad2;
   var $actividad2;
   var $telefono_actividad2;
   var $ext_actividad2;
   var $cargo_actividad2;
   var $id_tipo_contrato_actividad2;
   var $empresa_jubilo_actividad2;
   var $sueldo;
   var $arriendos;
   var $dividendo_utilidades_ultimo_ano;
   var $id_otros_ingresos;
   var $arriendo_hipoteca;
   var $prestamos;
   var $tarjetas_creditos;
   var $gastos_familiares;
   var $id_otros_gastos;
   var $depositos_bancos;
   var $cuentas_documentos;
   var $mercaderias;
   var $maquinarias_vehiculos;
   var $terrenos_edificios;
   var $acciones_bonos_cedulas;
   var $id_otros_activos;
   var $cuentas_por_pagar;
   var $prestamos_banco_menos_ano;
   var $prestamos_banco_mas_ano;
   var $deudas_tarjetas_creditos;
   var $id_otras_obligaciones;
   var $deudor;
   var $monto;
   var $descripcion;
   var $placa;
   var $valor_maquinaria_vehiculo;
   var $a_nombre_de;
   var $ubicacion;
   var $valor_propiedad;
   var $empresa;
   var $valor_mercado;
   var $institucion_bancaria;
   var $monto_banco;
   var $institucion_finaciera;
   var $monto_institucion_finaciera;
   var $id_cliente_juridico;
   var $nombre_completo_empresa;
   var $es_empresa_extranjera;
   var $pais_empresa;
   var $fecha_constitucion_empresa;
   var $id_oficina;
   var $id_tipo_actividad;
   var $especifique_otros;
   var $direccion_correspondencia;
   var $calle_principal_correspondencia;
   var $no_correspondencia;
   var $calle_secundaria_correspondencia;
   var $id_ciudad_correspondencia;
   var $nombre_empresa_solicitante;
   var $cargo_empresa_solicitante;
   var $celular_empresa_solicitante;
   var $telefono_empresa_solicitante;
   var $mail_empresa_solicitante;
   var $saldo_empresa_solicitante;
   var $nombre_referencia_comerciales;
   var $fecha_compra;
   var $telefono_referencia_comerciales;
   var $ventas;
   var $comisiones;
   var $gastos_operativos;
   var $gastos_administrativos;
   var $pago_cuotas_prestamo;
   var $funcionario;
   var $funcionario_detalle;
   var $miembro_politico;
   var $miembro_politico_detalle;
   var $ejecutivo_gobierno;
   var $ejecutivo_gobierno_detalle;
   var $familiar_gobierno;
   var $familiar_gobierno_detalle;
   var $familiar_gobierno_detalle_quien;
   var $otros_ingresos;
   var $otros_gastos;
   var $otros_activos;
   var $otras_obligaciones;
   var $sector_direccion_empresa;
   var $sector_direccion_empresa_correo;
   var $extranjero_nombres_referencia;
   var $extranjero_apellidos_referencia;
   var $extranjero_parentesco;
   var $extranjero_celular_ref;
   var $extranjero_telefono_convencional_ref;
   var $cargo_representante_legal;
   var $direccion_extranjero;
   var $relacion_dependencia_principal;
   var $correo_corporativo_principal;
   var $relacion_dependencia_secundaria;
   var $correo_corporativo_secundario;
   var $actividad_secundaria;
   var $id_pais_empresa;
   var $id_provincia_empresa;
   var $id_pais_correo;
   var $id_provincia_correo;
   var $apellido_empresa_solicitante;
   var $pais_actividad2;
   var $id_provincia_exterior;
   var $pais_independiente;
   var $tipo_contrato_otros_actividad_principal;
   var $actividadeconomica;
   var $clasesujeto;
   var $provincia;
   var $parroquia;
   var $canton;
   var $demandajudicial;
   var $vdemandajudicial;
   var $carteracastigada;
   var $vcarteracastigada;
   var $accesoexterno01;
   var $referencia;
   var $id_pais_empleado_dir_desempeno;
   var $id_provincia_empleado_dir_desempeno;
   var $id_ciudad_empleado_dir_desempeno;
   var $razon_social;
   var $parterel01;
   var $origen_fondos;
   var $tipo_identificacion;
   var $id_actividad;
    function getFieldHighlight($filter_type, $field, $str_value, $str_value_original='')
    {
        $str_html_ini = '<div class="highlight">';
        $str_html_fim = '</div>';

        if($filter_type == 'advanced_search')
        {
            if (
                isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['campos_busca'][ $field ]) &&
                isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['campos_busca'][ $field . "_cond" ]) &&
                !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['campos_busca'][ $field ]) &&
                (
                    $_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['campos_busca'][ $field . "_cond"] == 'qp' ||
                    $_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['campos_busca'][ $field . "_cond"] == 'eq' ||
                    $_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['campos_busca'][ $field . "_cond"] == 'ii'
                )
            )
            {
                if($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['campos_busca'][ $field . "_cond"] == 'qp')
                {
                    if(strcasecmp($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['campos_busca'][ $field ], $str_value) == 0)
                    {
                        $str_value = $str_html_ini. $str_value .$str_html_fim;
                    }
                    elseif(strcasecmp($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['campos_busca'][ $field ], $str_value_original) == 0)
                    {
                        $str_value = $str_html_ini. $str_value .$str_html_fim;
                    }
                    else
                    {
                        $keywords = preg_quote($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['campos_busca'][ $field ], '/');
                        $str_value = preg_replace('/'. $keywords .'/i', $str_html_ini . '$0' . $str_html_fim, $str_value);
                    }
                }
                elseif($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['campos_busca'][ $field . "_cond"] == 'eq')
                {
                    if(strcasecmp($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['campos_busca'][ $field ], $str_value) == 0)
                    {
                        $str_value = $str_html_ini. $str_value .$str_html_fim;
                    }
                    elseif(strcasecmp($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['campos_busca'][ $field ], $str_value_original) == 0)
                    {
                        $str_value = $str_html_ini. $str_value .$str_html_fim;
                    }
                }
                elseif($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['campos_busca'][ $field . "_cond"] == 'ii')
                {
                    if(strcasecmp($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['campos_busca'][ $field ], substr($str_value, 0, strlen($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['campos_busca'][ $field ]))) == 0)
                    {
                        $str_value = $str_html_ini. substr($str_value, 0, strlen($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['campos_busca'][ $field ])) .$str_html_fim . substr($str_value, strlen($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['campos_busca'][ $field ]));
                    }
                }
            }
        }
        elseif($filter_type == 'quicksearch')
        {
            if(
                isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['fast_search'][0]) &&
                (
                    (
                    $_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['fast_search'][0] == 'SC_all_Cmp' &&
                    in_array($field, array('codcte01', 'tipo_cliente', 'id_nacionalidad', 'nomcte01', 'primer_nombre', 'segundo_nombre', 'primer_apellido', 'segundo_apellido', 'cv1cte01', 'cv2cte01', 'tipcte01', 'ofienccte01', 'vendcte01', 'cobrcte01', 'loccte01', 'dircte01', 'sector', 'calle_principal', 'no', 'calle_secundaria', 'id_pais', 'id_provincia', 'id_ciudad', 'id_canton', 'telcte01', 'cascte01', 'ci_conyuge', 'conyuge_tipo_identidad', 'conyuge_primer_nombre', 'conyuge_segundo_nombre', 'conyuge_primer_apellido', 'conyuge_segundo_apellido', 'conyuge_profesion', 'id_tipo_documento', 'repleg01', 'fecing01', 'condpag01', 'desctocte01', 'limcred01', 'desppar01', 'cheqpro01', 'sdoeje01', 'sdoant01', 'sdoact01', 'acudbm01', 'acucrm01', 'acudbe01', 'acucre01', 'comentcte01', 'statuscte01', 'identcte01', 'cordcte01', 'limcant01', 'pagleg01', 'telcte01b', 'telcte01c', 'emailcte01', 'calle_principal_exterior', 'no_exterior', 'calle_secundaria_exterior', 'id_pais_exterior', 'id_ciudad_exterior', 'codigo_postal_exterior', 'sector_exterior', 'telefono_exterior', 'celular_exterior', 'email_exterior', 'emailaltcte01', 'ctacgcte01', 'obsercte01', 'totexceso01', 'imagencte01', 'block', 'uid', 'ultimoacceso', 'idcli', 'catcte01', 'transferido', 'password', 'showroom', 'orden', 'website', 'longitud01', 'latitud01', 'zoom01', 'acceder', 'coniva01', 'idemp01', 'codprov01', 'celular01', 'dircliente01', 'razcte01', 'ruc01', 'timenegocio01', 'refbanc01', 'refcom01', 'tarjcred01', 'firmaut01', 'precte01', 'cuotasven01', 'diasven01', 'fechanace01', 'sexo01', 'estadocivil01', 'dirgestion01', 'numhijos01', 'estsop01', 'notick01', 'chequece', 'solcre', 'promocte01', 'pagare01', 'valorpagare01', 'garante01', 'fecvenp01', 'ctacgant01', 'dsn', 'residente', 'medio_contacto', 'separacion_bienes', 'disolucion_conyugal', 'capitulaciones', 'numero_carga_familiar', 'nivel_educacion', 'profesion', 'envio_correspondencia', 'nombre_arrendador', 'apellido_arrendador', 'id_vivienda', 'telefono_arrendador', 'nombres_referencia', 'apellidos_referencia', 'parentesco', 'celular_ref', 'telefono_convencional_ref', 'id_ocupacion', 'fecha_ingreso_empresa', 'nombre_empresa', 'ciudad_empresa', 'provincia_empresa', 'direccion_empresa', 'cargo_empresa', 'telefono_empresa', 'ext_empresa', 'id_tipo_contrato_actividad', 'empresa_jubilo_actividad', 'fecha_salida_empresa_actividad', 'cargo_salida_empresa_actividad', 'fecha_inicio_actividad', 'fecha_ingreso_empresa_actividad', 'nombre_empresa_actividad', 'institucion_actividad', 'ciudad_actividad', 'provincia_actividad', 'direccion_actividad', 'calle_principal_actividad', 'no_actividad', 'calle_secundaria_actividad', 'sector_actividad', 'pais_actividad', 'actividad', 'telefono_actividad', 'cargo_actividad', 'ext_actividad', 'fecha_ingreso_empresa_actividad2', 'nombre_empresa_actividad2', 'institucion_actividad2', 'ciudad_actividad2', 'provincia_actividad2', 'direccion_actividad2', 'calle_principal_actividad2', 'no_actividad2', 'calle_secundaria_actividad2', 'sector_actividad2', 'fecha_salida_empresa_actividad2', 'fecha_inicio_actividad2', 'actividad2', 'telefono_actividad2', 'ext_actividad2', 'cargo_actividad2', 'id_tipo_contrato_actividad2', 'empresa_jubilo_actividad2', 'sueldo', 'arriendos', 'dividendo_utilidades_ultimo_ano', 'id_otros_ingresos', 'arriendo_hipoteca', 'prestamos', 'tarjetas_creditos', 'gastos_familiares', 'id_otros_gastos', 'depositos_bancos', 'cuentas_documentos', 'mercaderias', 'maquinarias_vehiculos', 'terrenos_edificios', 'acciones_bonos_cedulas', 'id_otros_activos', 'cuentas_por_pagar', 'prestamos_banco_menos_ano', 'prestamos_banco_mas_ano', 'deudas_tarjetas_creditos', 'id_otras_obligaciones', 'deudor', 'monto', 'descripcion', 'placa', 'valor_maquinaria_vehiculo', 'a_nombre_de', 'ubicacion', 'valor_propiedad', 'empresa', 'valor_mercado', 'institucion_bancaria', 'monto_banco', 'institucion_finaciera', 'monto_institucion_finaciera', 'id_cliente_juridico', 'nombre_completo_empresa', 'es_empresa_extranjera', 'pais_empresa', 'fecha_constitucion_empresa', 'id_oficina', 'id_tipo_actividad', 'especifique_otros', 'direccion_correspondencia', 'calle_principal_correspondencia', 'no_correspondencia', 'calle_secundaria_correspondencia', 'id_ciudad_correspondencia', 'nombre_empresa_solicitante', 'cargo_empresa_solicitante', 'celular_empresa_solicitante', 'telefono_empresa_solicitante', 'mail_empresa_solicitante', 'saldo_empresa_solicitante', 'nombre_referencia_comerciales', 'fecha_compra', 'telefono_referencia_comerciales', 'ventas', 'comisiones', 'gastos_operativos', 'gastos_administrativos', 'pago_cuotas_prestamo', 'funcionario', 'funcionario_detalle', 'miembro_politico', 'miembro_politico_detalle', 'ejecutivo_gobierno', 'ejecutivo_gobierno_detalle', 'familiar_gobierno', 'familiar_gobierno_detalle', 'familiar_gobierno_detalle_quien', 'otros_ingresos', 'otros_gastos', 'otros_activos', 'otras_obligaciones', 'sector_direccion_empresa', 'sector_direccion_empresa_correo', 'extranjero_nombres_referencia', 'extranjero_apellidos_referencia', 'extranjero_parentesco', 'extranjero_celular_ref', 'extranjero_telefono_convencional_ref', 'cargo_representante_legal', 'direccion_extranjero', 'relacion_dependencia_principal', 'correo_corporativo_principal', 'relacion_dependencia_secundaria', 'correo_corporativo_secundario', 'actividad_secundaria', 'id_pais_empresa', 'id_provincia_empresa', 'id_pais_correo', 'id_provincia_correo', 'apellido_empresa_solicitante', 'pais_actividad2', 'id_provincia_exterior', 'pais_independiente', 'tipo_contrato_otros_actividad_principal', 'actividadeconomica', 'clasesujeto', 'provincia', 'parroquia', 'canton', 'demandajudicial', 'vdemandajudicial', 'carteracastigada', 'vcarteracastigada', 'accesoexterno01', 'referencia', 'id_pais_empleado_dir_desempeno', 'id_provincia_empleado_dir_desempeno', 'id_ciudad_empleado_dir_desempeno', 'razon_social', 'parterel01', 'origen_fondos', 'tipo_identificacion', 'id_actividad'))
                    ) ||
                    $_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['fast_search'][0] == $field ||
                    strpos($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['fast_search'][0], $field . '_VLS_') !== false ||
                    strpos($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['fast_search'][0], '_VLS_' . $field) !== false
                )
            )
            {
                if($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['fast_search'][1] == 'qp')
                {
                    if(strcasecmp($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['fast_search'][2], $str_value) == 0)
                    {
                        $str_value = $str_html_ini. $str_value .$str_html_fim;
                    }
                    elseif(!empty($str_value_original) && $str_value_original != '&nbsp;' && strcasecmp($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['fast_search'][2], $str_value_original) == 0)
                    {
                        $str_value = $str_html_ini. $str_value .$str_html_fim;
                    }
                    else
                    {
                        $keywords = preg_quote($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['fast_search'][2], '/');
                        $str_value = preg_replace('/'. $keywords .'/i', $str_html_ini . '$0' . $str_html_fim, $str_value);
                    }
                }
                elseif($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['fast_search'][1] == 'eq')
                {
                    if(strcasecmp($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['fast_search'][2], $str_value) == 0)
                    {
                        $str_value = $str_html_ini. $str_value .$str_html_fim;
                    }
                    elseif(!empty($str_value_original) && $str_value_original != '&nbsp;' && strcasecmp($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['fast_search'][2], $str_value_original) == 0)
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
    if (isset($_SESSION['scriptcase']['sc_apl_conf']['grid_maecte']['btn_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['grid_maecte']['btn_display']))
    {
        foreach ($_SESSION['scriptcase']['sc_apl_conf']['grid_maecte']['btn_display'] as $NM_cada_btn => $NM_cada_opc)
        {
            $this->nmgp_botoes[$NM_cada_btn] = $NM_cada_opc;
        }
    }
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida_form']) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida_form'])
    {
    $this->nmgp_botoes['det_pdf']   = "off";
    $this->nmgp_botoes['det_print'] = "off";
    }
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['campos_busca']))
    { 
        $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['campos_busca'];
        if ($_SESSION['scriptcase']['charset'] != "UTF-8")
        {
            $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
        }
        $this->nomcte01 = $Busca_temp['nomcte01']; 
        $tmp_pos = strpos($this->nomcte01, "##@@");
        if ($tmp_pos !== false && !is_array($this->nomcte01))
        {
            $this->nomcte01 = substr($this->nomcte01, 0, $tmp_pos);
        }
        $this->codcte01 = $Busca_temp['codcte01']; 
        $tmp_pos = strpos($this->codcte01, "##@@");
        if ($tmp_pos !== false && !is_array($this->codcte01))
        {
            $this->codcte01 = substr($this->codcte01, 0, $tmp_pos);
        }
        $this->tipo_cliente = $Busca_temp['tipo_cliente']; 
        $tmp_pos = strpos($this->tipo_cliente, "##@@");
        if ($tmp_pos !== false && !is_array($this->tipo_cliente))
        {
            $this->tipo_cliente = substr($this->tipo_cliente, 0, $tmp_pos);
        }
        $this->id_nacionalidad = $Busca_temp['id_nacionalidad']; 
        $tmp_pos = strpos($this->id_nacionalidad, "##@@");
        if ($tmp_pos !== false && !is_array($this->id_nacionalidad))
        {
            $this->id_nacionalidad = substr($this->id_nacionalidad, 0, $tmp_pos);
        }
    } 
    $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['where_orig'];
    $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['where_pesq'];
    $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['where_pesq_filtro'];
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
    $_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['seq_dir'] = 0; 
    $_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['sub_dir'] = array(); 
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
       $nmgp_select = "SELECT codcte01, tipo_cliente, id_nacionalidad, nomcte01, primer_nombre, segundo_nombre, primer_apellido, segundo_apellido, cv1cte01, cv2cte01, tipcte01, ofienccte01, vendcte01, cobrcte01, loccte01, dircte01, sector, calle_principal, `no` as sc_def_col_1, calle_secundaria, id_pais, id_provincia, id_ciudad, id_canton, telcte01, cascte01, ci_conyuge, conyuge_tipo_identidad, conyuge_primer_nombre, conyuge_segundo_nombre, conyuge_primer_apellido, conyuge_segundo_apellido, conyuge_profesion, id_tipo_documento, repleg01, str_replace (convert(char(10),fecing01,102), '.', '-') + ' ' + convert(char(8),fecing01,20), condpag01, desctocte01, limcred01, desppar01, cheqpro01, sdoeje01, sdoant01, sdoact01, acudbm01, acucrm01, acudbe01, acucre01, comentcte01, statuscte01, identcte01, cordcte01, limcant01, pagleg01, telcte01b, telcte01c, emailcte01, calle_principal_exterior, no_exterior, calle_secundaria_exterior, id_pais_exterior, id_ciudad_exterior, codigo_postal_exterior, sector_exterior, telefono_exterior, celular_exterior, email_exterior, emailaltcte01, ctacgcte01, obsercte01, totexceso01, imagencte01, block, UID, ultimoacceso, idcli, catcte01, transferido, password, showroom, orden, website, longitud01, latitud01, zoom01, acceder, coniva01, idemp01, codprov01, celular01, dircliente01, razcte01, ruc01, timenegocio01, refbanc01, refcom01, tarjcred01, firmaut01, precte01, cuotasven01, diasven01, str_replace (convert(char(10),fechanace01,102), '.', '-') + ' ' + convert(char(8),fechanace01,20), sexo01, estadocivil01, dirgestion01, numhijos01, estsop01, notick01, chequece, solcre, promocte01, pagare01, valorpagare01, garante01, str_replace (convert(char(10),fecvenp01,102), '.', '-') + ' ' + convert(char(8),fecvenp01,20), ctacgant01, dsn, residente, medio_contacto, separacion_bienes, disolucion_conyugal, capitulaciones, numero_carga_familiar, nivel_educacion, profesion, envio_correspondencia, nombre_arrendador, apellido_arrendador, id_vivienda, telefono_arrendador, nombres_referencia, apellidos_referencia, parentesco, celular_ref, telefono_convencional_ref, id_ocupacion, str_replace (convert(char(10),fecha_ingreso_empresa,102), '.', '-') + ' ' + convert(char(8),fecha_ingreso_empresa,20), nombre_empresa, ciudad_empresa, provincia_empresa, direccion_empresa, cargo_empresa, telefono_empresa, ext_empresa, id_tipo_contrato_actividad, empresa_jubilo_actividad, str_replace (convert(char(10),fecha_salida_empresa_actividad,102), '.', '-') + ' ' + convert(char(8),fecha_salida_empresa_actividad,20), cargo_salida_empresa_actividad, str_replace (convert(char(10),fecha_inicio_actividad,102), '.', '-') + ' ' + convert(char(8),fecha_inicio_actividad,20), str_replace (convert(char(10),fecha_ingreso_empresa_actividad,102), '.', '-') + ' ' + convert(char(8),fecha_ingreso_empresa_actividad,20), nombre_empresa_actividad, institucion_actividad, ciudad_actividad, provincia_actividad, direccion_actividad, calle_principal_actividad, no_actividad, calle_secundaria_actividad, sector_actividad, pais_actividad, actividad, telefono_actividad, cargo_actividad, ext_actividad, str_replace (convert(char(10),fecha_ingreso_empresa_actividad2,102), '.', '-') + ' ' + convert(char(8),fecha_ingreso_empresa_actividad2,20), nombre_empresa_actividad2, institucion_actividad2, ciudad_actividad2, provincia_actividad2, direccion_actividad2, calle_principal_actividad2, no_actividad2, calle_secundaria_actividad2, sector_actividad2, str_replace (convert(char(10),fecha_salida_empresa_actividad2,102), '.', '-') + ' ' + convert(char(8),fecha_salida_empresa_actividad2,20), str_replace (convert(char(10),fecha_inicio_actividad2,102), '.', '-') + ' ' + convert(char(8),fecha_inicio_actividad2,20), actividad2, telefono_actividad2, ext_actividad2, cargo_actividad2, id_tipo_contrato_actividad2, empresa_jubilo_actividad2, sueldo, arriendos, dividendo_utilidades_ultimo_ano, id_otros_ingresos, arriendo_hipoteca, prestamos, tarjetas_creditos, gastos_familiares, id_otros_gastos, depositos_bancos, cuentas_documentos, mercaderias, maquinarias_vehiculos, terrenos_edificios, acciones_bonos_cedulas, id_otros_activos, cuentas_por_pagar, prestamos_banco_menos_ano, prestamos_banco_mas_ano, deudas_tarjetas_creditos, id_otras_obligaciones, deudor, monto, descripcion, placa, valor_maquinaria_vehiculo, a_nombre_de, ubicacion, valor_propiedad, empresa, valor_mercado, institucion_bancaria, monto_banco, institucion_finaciera, monto_institucion_finaciera, id_cliente_juridico, nombre_completo_empresa, es_empresa_extranjera, pais_empresa, str_replace (convert(char(10),fecha_constitucion_empresa,102), '.', '-') + ' ' + convert(char(8),fecha_constitucion_empresa,20), id_oficina, id_tipo_actividad, especifique_otros, direccion_correspondencia, calle_principal_correspondencia, no_correspondencia, calle_secundaria_correspondencia, id_ciudad_correspondencia, nombre_empresa_solicitante, cargo_empresa_solicitante, celular_empresa_solicitante, telefono_empresa_solicitante, mail_empresa_solicitante, saldo_empresa_solicitante, nombre_referencia_comerciales, str_replace (convert(char(10),fecha_compra,102), '.', '-') + ' ' + convert(char(8),fecha_compra,20), telefono_referencia_comerciales, ventas, comisiones, gastos_operativos, gastos_administrativos, pago_cuotas_prestamo, funcionario, funcionario_detalle, miembro_politico, miembro_politico_detalle, ejecutivo_gobierno, ejecutivo_gobierno_detalle, familiar_gobierno, familiar_gobierno_detalle, familiar_gobierno_detalle_quien, otros_ingresos, otros_gastos, otros_activos, otras_obligaciones, sector_direccion_empresa, sector_direccion_empresa_correo, extranjero_nombres_referencia, extranjero_apellidos_referencia, extranjero_parentesco, extranjero_celular_ref, extranjero_telefono_convencional_ref, cargo_representante_legal, direccion_extranjero, relacion_dependencia_principal, correo_corporativo_principal, relacion_dependencia_secundaria, correo_corporativo_secundario, actividad_secundaria, id_pais_empresa, id_provincia_empresa, id_pais_correo, id_provincia_correo, apellido_empresa_solicitante, pais_actividad2, id_provincia_exterior, pais_independiente, tipo_contrato_otros_actividad_principal, actividadEconomica, claseSujeto, provincia, parroquia, canton, demandaJudicial, vDemandaJudicial, carteraCastigada, vCarteraCastigada, accesoExterno01, referencia, id_pais_empleado_dir_desempeno, id_provincia_empleado_dir_desempeno, id_ciudad_empleado_dir_desempeno, razon_social, parteRel01, origen_fondos, tipo_identificacion, id_actividad from " . $this->Ini->nm_tabela; 
   } 
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql)) 
   { 
       $nmgp_select = "SELECT codcte01, tipo_cliente, id_nacionalidad, nomcte01, primer_nombre, segundo_nombre, primer_apellido, segundo_apellido, cv1cte01, cv2cte01, tipcte01, ofienccte01, vendcte01, cobrcte01, loccte01, dircte01, sector, calle_principal, `no` as sc_def_col_1, calle_secundaria, id_pais, id_provincia, id_ciudad, id_canton, telcte01, cascte01, ci_conyuge, conyuge_tipo_identidad, conyuge_primer_nombre, conyuge_segundo_nombre, conyuge_primer_apellido, conyuge_segundo_apellido, conyuge_profesion, id_tipo_documento, repleg01, convert(char(23),fecing01,121), condpag01, desctocte01, limcred01, desppar01, cheqpro01, sdoeje01, sdoant01, sdoact01, acudbm01, acucrm01, acudbe01, acucre01, comentcte01, statuscte01, identcte01, cordcte01, limcant01, pagleg01, telcte01b, telcte01c, emailcte01, calle_principal_exterior, no_exterior, calle_secundaria_exterior, id_pais_exterior, id_ciudad_exterior, codigo_postal_exterior, sector_exterior, telefono_exterior, celular_exterior, email_exterior, emailaltcte01, ctacgcte01, obsercte01, totexceso01, imagencte01, block, UID, ultimoacceso, idcli, catcte01, transferido, password, showroom, orden, website, longitud01, latitud01, zoom01, acceder, coniva01, idemp01, codprov01, celular01, dircliente01, razcte01, ruc01, timenegocio01, refbanc01, refcom01, tarjcred01, firmaut01, precte01, cuotasven01, diasven01, convert(char(23),fechanace01,121), sexo01, estadocivil01, dirgestion01, numhijos01, estsop01, notick01, chequece, solcre, promocte01, pagare01, valorpagare01, garante01, convert(char(23),fecvenp01,121), ctacgant01, dsn, residente, medio_contacto, separacion_bienes, disolucion_conyugal, capitulaciones, numero_carga_familiar, nivel_educacion, profesion, envio_correspondencia, nombre_arrendador, apellido_arrendador, id_vivienda, telefono_arrendador, nombres_referencia, apellidos_referencia, parentesco, celular_ref, telefono_convencional_ref, id_ocupacion, convert(char(23),fecha_ingreso_empresa,121), nombre_empresa, ciudad_empresa, provincia_empresa, direccion_empresa, cargo_empresa, telefono_empresa, ext_empresa, id_tipo_contrato_actividad, empresa_jubilo_actividad, convert(char(23),fecha_salida_empresa_actividad,121), cargo_salida_empresa_actividad, convert(char(23),fecha_inicio_actividad,121), convert(char(23),fecha_ingreso_empresa_actividad,121), nombre_empresa_actividad, institucion_actividad, ciudad_actividad, provincia_actividad, direccion_actividad, calle_principal_actividad, no_actividad, calle_secundaria_actividad, sector_actividad, pais_actividad, actividad, telefono_actividad, cargo_actividad, ext_actividad, convert(char(23),fecha_ingreso_empresa_actividad2,121), nombre_empresa_actividad2, institucion_actividad2, ciudad_actividad2, provincia_actividad2, direccion_actividad2, calle_principal_actividad2, no_actividad2, calle_secundaria_actividad2, sector_actividad2, convert(char(23),fecha_salida_empresa_actividad2,121), convert(char(23),fecha_inicio_actividad2,121), actividad2, telefono_actividad2, ext_actividad2, cargo_actividad2, id_tipo_contrato_actividad2, empresa_jubilo_actividad2, sueldo, arriendos, dividendo_utilidades_ultimo_ano, id_otros_ingresos, arriendo_hipoteca, prestamos, tarjetas_creditos, gastos_familiares, id_otros_gastos, depositos_bancos, cuentas_documentos, mercaderias, maquinarias_vehiculos, terrenos_edificios, acciones_bonos_cedulas, id_otros_activos, cuentas_por_pagar, prestamos_banco_menos_ano, prestamos_banco_mas_ano, deudas_tarjetas_creditos, id_otras_obligaciones, deudor, monto, descripcion, placa, valor_maquinaria_vehiculo, a_nombre_de, ubicacion, valor_propiedad, empresa, valor_mercado, institucion_bancaria, monto_banco, institucion_finaciera, monto_institucion_finaciera, id_cliente_juridico, nombre_completo_empresa, es_empresa_extranjera, pais_empresa, convert(char(23),fecha_constitucion_empresa,121), id_oficina, id_tipo_actividad, especifique_otros, direccion_correspondencia, calle_principal_correspondencia, no_correspondencia, calle_secundaria_correspondencia, id_ciudad_correspondencia, nombre_empresa_solicitante, cargo_empresa_solicitante, celular_empresa_solicitante, telefono_empresa_solicitante, mail_empresa_solicitante, saldo_empresa_solicitante, nombre_referencia_comerciales, convert(char(23),fecha_compra,121), telefono_referencia_comerciales, ventas, comisiones, gastos_operativos, gastos_administrativos, pago_cuotas_prestamo, funcionario, funcionario_detalle, miembro_politico, miembro_politico_detalle, ejecutivo_gobierno, ejecutivo_gobierno_detalle, familiar_gobierno, familiar_gobierno_detalle, familiar_gobierno_detalle_quien, otros_ingresos, otros_gastos, otros_activos, otras_obligaciones, sector_direccion_empresa, sector_direccion_empresa_correo, extranjero_nombres_referencia, extranjero_apellidos_referencia, extranjero_parentesco, extranjero_celular_ref, extranjero_telefono_convencional_ref, cargo_representante_legal, direccion_extranjero, relacion_dependencia_principal, correo_corporativo_principal, relacion_dependencia_secundaria, correo_corporativo_secundario, actividad_secundaria, id_pais_empresa, id_provincia_empresa, id_pais_correo, id_provincia_correo, apellido_empresa_solicitante, pais_actividad2, id_provincia_exterior, pais_independiente, tipo_contrato_otros_actividad_principal, actividadEconomica, claseSujeto, provincia, parroquia, canton, demandaJudicial, vDemandaJudicial, carteraCastigada, vCarteraCastigada, accesoExterno01, referencia, id_pais_empleado_dir_desempeno, id_provincia_empleado_dir_desempeno, id_ciudad_empleado_dir_desempeno, razon_social, parteRel01, origen_fondos, tipo_identificacion, id_actividad from " . $this->Ini->nm_tabela; 
   } 
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle)) 
   { 
       $nmgp_select = "SELECT codcte01, tipo_cliente, id_nacionalidad, nomcte01, primer_nombre, segundo_nombre, primer_apellido, segundo_apellido, cv1cte01, cv2cte01, tipcte01, ofienccte01, vendcte01, cobrcte01, loccte01, dircte01, sector, calle_principal, `no` as sc_def_col_1, calle_secundaria, id_pais, id_provincia, id_ciudad, id_canton, telcte01, cascte01, ci_conyuge, conyuge_tipo_identidad, conyuge_primer_nombre, conyuge_segundo_nombre, conyuge_primer_apellido, conyuge_segundo_apellido, conyuge_profesion, id_tipo_documento, repleg01, fecing01, condpag01, desctocte01, limcred01, desppar01, cheqpro01, sdoeje01, sdoant01, sdoact01, acudbm01, acucrm01, acudbe01, acucre01, comentcte01, statuscte01, identcte01, cordcte01, limcant01, pagleg01, telcte01b, telcte01c, emailcte01, calle_principal_exterior, no_exterior, calle_secundaria_exterior, id_pais_exterior, id_ciudad_exterior, codigo_postal_exterior, sector_exterior, telefono_exterior, celular_exterior, email_exterior, emailaltcte01, ctacgcte01, obsercte01, totexceso01, imagencte01, block, UID, ultimoacceso, idcli, catcte01, transferido, password, showroom, orden, website, longitud01, latitud01, zoom01, acceder, coniva01, idemp01, codprov01, celular01, dircliente01, razcte01, ruc01, timenegocio01, refbanc01, refcom01, tarjcred01, firmaut01, precte01, cuotasven01, diasven01, fechanace01, sexo01, estadocivil01, dirgestion01, numhijos01, estsop01, notick01, chequece, solcre, promocte01, pagare01, valorpagare01, garante01, fecvenp01, ctacgant01, dsn, residente, medio_contacto, separacion_bienes, disolucion_conyugal, capitulaciones, numero_carga_familiar, nivel_educacion, profesion, envio_correspondencia, nombre_arrendador, apellido_arrendador, id_vivienda, telefono_arrendador, nombres_referencia, apellidos_referencia, parentesco, celular_ref, telefono_convencional_ref, id_ocupacion, fecha_ingreso_empresa, nombre_empresa, ciudad_empresa, provincia_empresa, direccion_empresa, cargo_empresa, telefono_empresa, ext_empresa, id_tipo_contrato_actividad, empresa_jubilo_actividad, fecha_salida_empresa_actividad, cargo_salida_empresa_actividad, fecha_inicio_actividad, fecha_ingreso_empresa_actividad, nombre_empresa_actividad, institucion_actividad, ciudad_actividad, provincia_actividad, direccion_actividad, calle_principal_actividad, no_actividad, calle_secundaria_actividad, sector_actividad, pais_actividad, actividad, telefono_actividad, cargo_actividad, ext_actividad, fecha_ingreso_empresa_actividad2, nombre_empresa_actividad2, institucion_actividad2, ciudad_actividad2, provincia_actividad2, direccion_actividad2, calle_principal_actividad2, no_actividad2, calle_secundaria_actividad2, sector_actividad2, fecha_salida_empresa_actividad2, fecha_inicio_actividad2, actividad2, telefono_actividad2, ext_actividad2, cargo_actividad2, id_tipo_contrato_actividad2, empresa_jubilo_actividad2, sueldo, arriendos, dividendo_utilidades_ultimo_ano, id_otros_ingresos, arriendo_hipoteca, prestamos, tarjetas_creditos, gastos_familiares, id_otros_gastos, depositos_bancos, cuentas_documentos, mercaderias, maquinarias_vehiculos, terrenos_edificios, acciones_bonos_cedulas, id_otros_activos, cuentas_por_pagar, prestamos_banco_menos_ano, prestamos_banco_mas_ano, deudas_tarjetas_creditos, id_otras_obligaciones, deudor, monto, descripcion, placa, valor_maquinaria_vehiculo, a_nombre_de, ubicacion, valor_propiedad, empresa, valor_mercado, institucion_bancaria, monto_banco, institucion_finaciera, monto_institucion_finaciera, id_cliente_juridico, nombre_completo_empresa, es_empresa_extranjera, pais_empresa, fecha_constitucion_empresa, id_oficina, id_tipo_actividad, especifique_otros, direccion_correspondencia, calle_principal_correspondencia, no_correspondencia, calle_secundaria_correspondencia, id_ciudad_correspondencia, nombre_empresa_solicitante, cargo_empresa_solicitante, celular_empresa_solicitante, telefono_empresa_solicitante, mail_empresa_solicitante, saldo_empresa_solicitante, nombre_referencia_comerciales, fecha_compra, telefono_referencia_comerciales, ventas, comisiones, gastos_operativos, gastos_administrativos, pago_cuotas_prestamo, funcionario, funcionario_detalle, miembro_politico, miembro_politico_detalle, ejecutivo_gobierno, ejecutivo_gobierno_detalle, familiar_gobierno, familiar_gobierno_detalle, familiar_gobierno_detalle_quien, otros_ingresos, otros_gastos, otros_activos, otras_obligaciones, sector_direccion_empresa, sector_direccion_empresa_correo, extranjero_nombres_referencia, extranjero_apellidos_referencia, extranjero_parentesco, extranjero_celular_ref, extranjero_telefono_convencional_ref, cargo_representante_legal, direccion_extranjero, relacion_dependencia_principal, correo_corporativo_principal, relacion_dependencia_secundaria, correo_corporativo_secundario, actividad_secundaria, id_pais_empresa, id_provincia_empresa, id_pais_correo, id_provincia_correo, apellido_empresa_solicitante, pais_actividad2, id_provincia_exterior, pais_independiente, tipo_contrato_otros_actividad_principal, actividadEconomica, claseSujeto, provincia, parroquia, canton, demandaJudicial, vDemandaJudicial, carteraCastigada, vCarteraCastigada, accesoExterno01, referencia, id_pais_empleado_dir_desempeno, id_provincia_empleado_dir_desempeno, id_ciudad_empleado_dir_desempeno, razon_social, parteRel01, origen_fondos, tipo_identificacion, id_actividad from " . $this->Ini->nm_tabela; 
   } 
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix)) 
   { 
       $nmgp_select = "SELECT codcte01, tipo_cliente, id_nacionalidad, nomcte01, primer_nombre, segundo_nombre, primer_apellido, segundo_apellido, cv1cte01, cv2cte01, tipcte01, ofienccte01, vendcte01, cobrcte01, loccte01, dircte01, sector, calle_principal, `no` as sc_def_col_1, calle_secundaria, id_pais, id_provincia, id_ciudad, id_canton, telcte01, cascte01, ci_conyuge, conyuge_tipo_identidad, conyuge_primer_nombre, conyuge_segundo_nombre, conyuge_primer_apellido, conyuge_segundo_apellido, conyuge_profesion, id_tipo_documento, repleg01, EXTEND(fecing01, YEAR TO FRACTION), condpag01, desctocte01, limcred01, desppar01, cheqpro01, sdoeje01, sdoant01, sdoact01, acudbm01, acucrm01, acudbe01, acucre01, comentcte01, statuscte01, identcte01, cordcte01, limcant01, pagleg01, telcte01b, telcte01c, emailcte01, calle_principal_exterior, no_exterior, calle_secundaria_exterior, id_pais_exterior, id_ciudad_exterior, codigo_postal_exterior, sector_exterior, telefono_exterior, celular_exterior, email_exterior, emailaltcte01, ctacgcte01, obsercte01, totexceso01, imagencte01, block, UID, ultimoacceso, idcli, catcte01, transferido, password, showroom, orden, website, longitud01, latitud01, zoom01, acceder, coniva01, idemp01, codprov01, celular01, dircliente01, razcte01, ruc01, timenegocio01, refbanc01, refcom01, tarjcred01, firmaut01, precte01, cuotasven01, diasven01, EXTEND(fechanace01, YEAR TO DAY), sexo01, estadocivil01, dirgestion01, numhijos01, estsop01, notick01, chequece, solcre, promocte01, pagare01, valorpagare01, garante01, EXTEND(fecvenp01, YEAR TO DAY), ctacgant01, dsn, residente, medio_contacto, separacion_bienes, disolucion_conyugal, capitulaciones, numero_carga_familiar, nivel_educacion, profesion, envio_correspondencia, nombre_arrendador, apellido_arrendador, id_vivienda, telefono_arrendador, nombres_referencia, apellidos_referencia, parentesco, celular_ref, telefono_convencional_ref, id_ocupacion, EXTEND(fecha_ingreso_empresa, YEAR TO DAY), nombre_empresa, ciudad_empresa, provincia_empresa, direccion_empresa, cargo_empresa, telefono_empresa, ext_empresa, id_tipo_contrato_actividad, empresa_jubilo_actividad, EXTEND(fecha_salida_empresa_actividad, YEAR TO DAY), cargo_salida_empresa_actividad, EXTEND(fecha_inicio_actividad, YEAR TO DAY), EXTEND(fecha_ingreso_empresa_actividad, YEAR TO DAY), nombre_empresa_actividad, institucion_actividad, ciudad_actividad, provincia_actividad, direccion_actividad, calle_principal_actividad, no_actividad, calle_secundaria_actividad, sector_actividad, pais_actividad, actividad, telefono_actividad, cargo_actividad, ext_actividad, EXTEND(fecha_ingreso_empresa_actividad2, YEAR TO DAY), nombre_empresa_actividad2, institucion_actividad2, ciudad_actividad2, provincia_actividad2, direccion_actividad2, calle_principal_actividad2, no_actividad2, calle_secundaria_actividad2, sector_actividad2, EXTEND(fecha_salida_empresa_actividad2, YEAR TO DAY), EXTEND(fecha_inicio_actividad2, YEAR TO DAY), actividad2, telefono_actividad2, ext_actividad2, cargo_actividad2, id_tipo_contrato_actividad2, empresa_jubilo_actividad2, sueldo, arriendos, dividendo_utilidades_ultimo_ano, id_otros_ingresos, arriendo_hipoteca, prestamos, tarjetas_creditos, gastos_familiares, id_otros_gastos, depositos_bancos, cuentas_documentos, mercaderias, maquinarias_vehiculos, terrenos_edificios, acciones_bonos_cedulas, id_otros_activos, cuentas_por_pagar, prestamos_banco_menos_ano, prestamos_banco_mas_ano, deudas_tarjetas_creditos, id_otras_obligaciones, deudor, monto, descripcion, placa, valor_maquinaria_vehiculo, a_nombre_de, ubicacion, valor_propiedad, empresa, valor_mercado, institucion_bancaria, monto_banco, institucion_finaciera, monto_institucion_finaciera, id_cliente_juridico, nombre_completo_empresa, es_empresa_extranjera, pais_empresa, EXTEND(fecha_constitucion_empresa, YEAR TO DAY), id_oficina, id_tipo_actividad, especifique_otros, direccion_correspondencia, calle_principal_correspondencia, no_correspondencia, calle_secundaria_correspondencia, id_ciudad_correspondencia, nombre_empresa_solicitante, cargo_empresa_solicitante, celular_empresa_solicitante, telefono_empresa_solicitante, mail_empresa_solicitante, saldo_empresa_solicitante, nombre_referencia_comerciales, EXTEND(fecha_compra, YEAR TO DAY), telefono_referencia_comerciales, ventas, comisiones, gastos_operativos, gastos_administrativos, pago_cuotas_prestamo, funcionario, funcionario_detalle, miembro_politico, miembro_politico_detalle, ejecutivo_gobierno, ejecutivo_gobierno_detalle, familiar_gobierno, familiar_gobierno_detalle, familiar_gobierno_detalle_quien, otros_ingresos, otros_gastos, otros_activos, otras_obligaciones, sector_direccion_empresa, sector_direccion_empresa_correo, extranjero_nombres_referencia, extranjero_apellidos_referencia, extranjero_parentesco, extranjero_celular_ref, extranjero_telefono_convencional_ref, cargo_representante_legal, direccion_extranjero, relacion_dependencia_principal, correo_corporativo_principal, relacion_dependencia_secundaria, correo_corporativo_secundario, actividad_secundaria, id_pais_empresa, id_provincia_empresa, id_pais_correo, id_provincia_correo, apellido_empresa_solicitante, pais_actividad2, id_provincia_exterior, pais_independiente, tipo_contrato_otros_actividad_principal, actividadEconomica, claseSujeto, provincia, parroquia, canton, demandaJudicial, vDemandaJudicial, carteraCastigada, vCarteraCastigada, accesoExterno01, referencia, id_pais_empleado_dir_desempeno, id_provincia_empleado_dir_desempeno, id_ciudad_empleado_dir_desempeno, razon_social, parteRel01, origen_fondos, tipo_identificacion, id_actividad from " . $this->Ini->nm_tabela; 
   } 
   else 
   { 
       $nmgp_select = "SELECT codcte01, tipo_cliente, id_nacionalidad, nomcte01, primer_nombre, segundo_nombre, primer_apellido, segundo_apellido, cv1cte01, cv2cte01, tipcte01, ofienccte01, vendcte01, cobrcte01, loccte01, dircte01, sector, calle_principal, `no` as sc_def_col_1, calle_secundaria, id_pais, id_provincia, id_ciudad, id_canton, telcte01, cascte01, ci_conyuge, conyuge_tipo_identidad, conyuge_primer_nombre, conyuge_segundo_nombre, conyuge_primer_apellido, conyuge_segundo_apellido, conyuge_profesion, id_tipo_documento, repleg01, fecing01, condpag01, desctocte01, limcred01, desppar01, cheqpro01, sdoeje01, sdoant01, sdoact01, acudbm01, acucrm01, acudbe01, acucre01, comentcte01, statuscte01, identcte01, cordcte01, limcant01, pagleg01, telcte01b, telcte01c, emailcte01, calle_principal_exterior, no_exterior, calle_secundaria_exterior, id_pais_exterior, id_ciudad_exterior, codigo_postal_exterior, sector_exterior, telefono_exterior, celular_exterior, email_exterior, emailaltcte01, ctacgcte01, obsercte01, totexceso01, imagencte01, block, UID, ultimoacceso, idcli, catcte01, transferido, password, showroom, orden, website, longitud01, latitud01, zoom01, acceder, coniva01, idemp01, codprov01, celular01, dircliente01, razcte01, ruc01, timenegocio01, refbanc01, refcom01, tarjcred01, firmaut01, precte01, cuotasven01, diasven01, fechanace01, sexo01, estadocivil01, dirgestion01, numhijos01, estsop01, notick01, chequece, solcre, promocte01, pagare01, valorpagare01, garante01, fecvenp01, ctacgant01, dsn, residente, medio_contacto, separacion_bienes, disolucion_conyugal, capitulaciones, numero_carga_familiar, nivel_educacion, profesion, envio_correspondencia, nombre_arrendador, apellido_arrendador, id_vivienda, telefono_arrendador, nombres_referencia, apellidos_referencia, parentesco, celular_ref, telefono_convencional_ref, id_ocupacion, fecha_ingreso_empresa, nombre_empresa, ciudad_empresa, provincia_empresa, direccion_empresa, cargo_empresa, telefono_empresa, ext_empresa, id_tipo_contrato_actividad, empresa_jubilo_actividad, fecha_salida_empresa_actividad, cargo_salida_empresa_actividad, fecha_inicio_actividad, fecha_ingreso_empresa_actividad, nombre_empresa_actividad, institucion_actividad, ciudad_actividad, provincia_actividad, direccion_actividad, calle_principal_actividad, no_actividad, calle_secundaria_actividad, sector_actividad, pais_actividad, actividad, telefono_actividad, cargo_actividad, ext_actividad, fecha_ingreso_empresa_actividad2, nombre_empresa_actividad2, institucion_actividad2, ciudad_actividad2, provincia_actividad2, direccion_actividad2, calle_principal_actividad2, no_actividad2, calle_secundaria_actividad2, sector_actividad2, fecha_salida_empresa_actividad2, fecha_inicio_actividad2, actividad2, telefono_actividad2, ext_actividad2, cargo_actividad2, id_tipo_contrato_actividad2, empresa_jubilo_actividad2, sueldo, arriendos, dividendo_utilidades_ultimo_ano, id_otros_ingresos, arriendo_hipoteca, prestamos, tarjetas_creditos, gastos_familiares, id_otros_gastos, depositos_bancos, cuentas_documentos, mercaderias, maquinarias_vehiculos, terrenos_edificios, acciones_bonos_cedulas, id_otros_activos, cuentas_por_pagar, prestamos_banco_menos_ano, prestamos_banco_mas_ano, deudas_tarjetas_creditos, id_otras_obligaciones, deudor, monto, descripcion, placa, valor_maquinaria_vehiculo, a_nombre_de, ubicacion, valor_propiedad, empresa, valor_mercado, institucion_bancaria, monto_banco, institucion_finaciera, monto_institucion_finaciera, id_cliente_juridico, nombre_completo_empresa, es_empresa_extranjera, pais_empresa, fecha_constitucion_empresa, id_oficina, id_tipo_actividad, especifique_otros, direccion_correspondencia, calle_principal_correspondencia, no_correspondencia, calle_secundaria_correspondencia, id_ciudad_correspondencia, nombre_empresa_solicitante, cargo_empresa_solicitante, celular_empresa_solicitante, telefono_empresa_solicitante, mail_empresa_solicitante, saldo_empresa_solicitante, nombre_referencia_comerciales, fecha_compra, telefono_referencia_comerciales, ventas, comisiones, gastos_operativos, gastos_administrativos, pago_cuotas_prestamo, funcionario, funcionario_detalle, miembro_politico, miembro_politico_detalle, ejecutivo_gobierno, ejecutivo_gobierno_detalle, familiar_gobierno, familiar_gobierno_detalle, familiar_gobierno_detalle_quien, otros_ingresos, otros_gastos, otros_activos, otras_obligaciones, sector_direccion_empresa, sector_direccion_empresa_correo, extranjero_nombres_referencia, extranjero_apellidos_referencia, extranjero_parentesco, extranjero_celular_ref, extranjero_telefono_convencional_ref, cargo_representante_legal, direccion_extranjero, relacion_dependencia_principal, correo_corporativo_principal, relacion_dependencia_secundaria, correo_corporativo_secundario, actividad_secundaria, id_pais_empresa, id_provincia_empresa, id_pais_correo, id_provincia_correo, apellido_empresa_solicitante, pais_actividad2, id_provincia_exterior, pais_independiente, tipo_contrato_otros_actividad_principal, actividadEconomica, claseSujeto, provincia, parroquia, canton, demandaJudicial, vDemandaJudicial, carteraCastigada, vCarteraCastigada, accesoExterno01, referencia, id_pais_empleado_dir_desempeno, id_provincia_empleado_dir_desempeno, id_ciudad_empleado_dir_desempeno, razon_social, parteRel01, origen_fondos, tipo_identificacion, id_actividad from " . $this->Ini->nm_tabela; 
   } 
   $parms_det = explode("*PDet*", $_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['chave_det']) ; 
   foreach ($parms_det as $key => $cada_par)
   {
       $parms_det[$key] = $this->Db->qstr($parms_det[$key]);
       $parms_det[$key] = substr($parms_det[$key], 1, strlen($parms_det[$key]) - 2);
   } 
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
   {
       $nmgp_select .= " where  codcte01 = $parms_det[0]" ;  
   } 
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
   {
       $nmgp_select .= " where  codcte01 = $parms_det[0]" ;  
   } 
   else 
   { 
       $nmgp_select .= " where  codcte01 = $parms_det[0]" ;  
   } 
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
   $rs = $this->Db->Execute($nmgp_select) ; 
   if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
   { 
       $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit ; 
   }  
   $this->codcte01 = $rs->fields[0] ;  
   $this->codcte01 = (string)$this->codcte01;
   $this->tipo_cliente = $rs->fields[1] ;  
   $this->tipo_cliente = (string)$this->tipo_cliente;
   $this->id_nacionalidad = $rs->fields[2] ;  
   $this->id_nacionalidad = (string)$this->id_nacionalidad;
   $this->nomcte01 = $rs->fields[3] ;  
   $this->primer_nombre = $rs->fields[4] ;  
   $this->segundo_nombre = $rs->fields[5] ;  
   $this->primer_apellido = $rs->fields[6] ;  
   $this->segundo_apellido = $rs->fields[7] ;  
   $this->cv1cte01 = $rs->fields[8] ;  
   $this->cv2cte01 = $rs->fields[9] ;  
   $this->tipcte01 = $rs->fields[10] ;  
   $this->ofienccte01 = $rs->fields[11] ;  
   $this->vendcte01 = $rs->fields[12] ;  
   $this->cobrcte01 = $rs->fields[13] ;  
   $this->loccte01 = $rs->fields[14] ;  
   $this->dircte01 = $rs->fields[15] ;  
   $this->sector = $rs->fields[16] ;  
   $this->calle_principal = $rs->fields[17] ;  
   $this->no = $rs->fields[18] ;  
   $this->calle_secundaria = $rs->fields[19] ;  
   $this->id_pais = $rs->fields[20] ;  
   $this->id_pais = (string)$this->id_pais;
   $this->id_provincia = $rs->fields[21] ;  
   $this->id_provincia = (string)$this->id_provincia;
   $this->id_ciudad = $rs->fields[22] ;  
   $this->id_ciudad = (string)$this->id_ciudad;
   $this->id_canton = $rs->fields[23] ;  
   $this->id_canton = (string)$this->id_canton;
   $this->telcte01 = $rs->fields[24] ;  
   $this->cascte01 = $rs->fields[25] ;  
   $this->ci_conyuge = $rs->fields[26] ;  
   $this->conyuge_tipo_identidad = $rs->fields[27] ;  
   $this->conyuge_primer_nombre = $rs->fields[28] ;  
   $this->conyuge_segundo_nombre = $rs->fields[29] ;  
   $this->conyuge_primer_apellido = $rs->fields[30] ;  
   $this->conyuge_segundo_apellido = $rs->fields[31] ;  
   $this->conyuge_profesion = $rs->fields[32] ;  
   $this->id_tipo_documento = $rs->fields[33] ;  
   $this->id_tipo_documento = (string)$this->id_tipo_documento;
   $this->repleg01 = $rs->fields[34] ;  
   $this->fecing01 = $rs->fields[35] ;  
   $this->condpag01 = $rs->fields[36] ;  
   $this->desctocte01 = $rs->fields[37] ;  
   $this->desctocte01 = str_replace(",", ".", $this->desctocte01);
   $this->desctocte01 = (strpos(strtolower($this->desctocte01), "e")) ? (float)$this->desctocte01 : $this->desctocte01; 
   $this->desctocte01 = (string)$this->desctocte01;
   $this->limcred01 = $rs->fields[38] ;  
   $this->limcred01 = str_replace(",", ".", $this->limcred01);
   $this->limcred01 = (strpos(strtolower($this->limcred01), "e")) ? (float)$this->limcred01 : $this->limcred01; 
   $this->limcred01 = (string)$this->limcred01;
   $this->desppar01 = $rs->fields[39] ;  
   $this->cheqpro01 = $rs->fields[40] ;  
   $this->cheqpro01 = (string)$this->cheqpro01;
   $this->sdoeje01 = $rs->fields[41] ;  
   $this->sdoeje01 = str_replace(",", ".", $this->sdoeje01);
   $this->sdoeje01 = (strpos(strtolower($this->sdoeje01), "e")) ? (float)$this->sdoeje01 : $this->sdoeje01; 
   $this->sdoeje01 = (string)$this->sdoeje01;
   $this->sdoant01 = $rs->fields[42] ;  
   $this->sdoant01 = str_replace(",", ".", $this->sdoant01);
   $this->sdoant01 = (strpos(strtolower($this->sdoant01), "e")) ? (float)$this->sdoant01 : $this->sdoant01; 
   $this->sdoant01 = (string)$this->sdoant01;
   $this->sdoact01 = $rs->fields[43] ;  
   $this->sdoact01 = str_replace(",", ".", $this->sdoact01);
   $this->sdoact01 = (strpos(strtolower($this->sdoact01), "e")) ? (float)$this->sdoact01 : $this->sdoact01; 
   $this->sdoact01 = (string)$this->sdoact01;
   $this->acudbm01 = $rs->fields[44] ;  
   $this->acudbm01 = str_replace(",", ".", $this->acudbm01);
   $this->acudbm01 = (strpos(strtolower($this->acudbm01), "e")) ? (float)$this->acudbm01 : $this->acudbm01; 
   $this->acudbm01 = (string)$this->acudbm01;
   $this->acucrm01 = $rs->fields[45] ;  
   $this->acucrm01 = str_replace(",", ".", $this->acucrm01);
   $this->acucrm01 = (strpos(strtolower($this->acucrm01), "e")) ? (float)$this->acucrm01 : $this->acucrm01; 
   $this->acucrm01 = (string)$this->acucrm01;
   $this->acudbe01 = $rs->fields[46] ;  
   $this->acudbe01 = str_replace(",", ".", $this->acudbe01);
   $this->acudbe01 = (strpos(strtolower($this->acudbe01), "e")) ? (float)$this->acudbe01 : $this->acudbe01; 
   $this->acudbe01 = (string)$this->acudbe01;
   $this->acucre01 = $rs->fields[47] ;  
   $this->acucre01 = str_replace(",", ".", $this->acucre01);
   $this->acucre01 = (strpos(strtolower($this->acucre01), "e")) ? (float)$this->acucre01 : $this->acucre01; 
   $this->acucre01 = (string)$this->acucre01;
   $this->comentcte01 = $rs->fields[48] ;  
   $this->statuscte01 = $rs->fields[49] ;  
   $this->statuscte01 = (string)$this->statuscte01;
   $this->identcte01 = $rs->fields[50] ;  
   $this->cordcte01 = $rs->fields[51] ;  
   $this->limcant01 = $rs->fields[52] ;  
   $this->limcant01 = (string)$this->limcant01;
   $this->pagleg01 = $rs->fields[53] ;  
   $this->telcte01b = $rs->fields[54] ;  
   $this->telcte01c = $rs->fields[55] ;  
   $this->emailcte01 = $rs->fields[56] ;  
   $this->calle_principal_exterior = $rs->fields[57] ;  
   $this->no_exterior = $rs->fields[58] ;  
   $this->calle_secundaria_exterior = $rs->fields[59] ;  
   $this->id_pais_exterior = $rs->fields[60] ;  
   $this->id_pais_exterior = (string)$this->id_pais_exterior;
   $this->id_ciudad_exterior = $rs->fields[61] ;  
   $this->id_ciudad_exterior = (string)$this->id_ciudad_exterior;
   $this->codigo_postal_exterior = $rs->fields[62] ;  
   $this->sector_exterior = $rs->fields[63] ;  
   $this->telefono_exterior = $rs->fields[64] ;  
   $this->celular_exterior = $rs->fields[65] ;  
   $this->email_exterior = $rs->fields[66] ;  
   $this->emailaltcte01 = $rs->fields[67] ;  
   $this->ctacgcte01 = $rs->fields[68] ;  
   $this->obsercte01 = $rs->fields[69] ;  
   $this->totexceso01 = $rs->fields[70] ;  
   $this->totexceso01 = str_replace(",", ".", $this->totexceso01);
   $this->totexceso01 = (strpos(strtolower($this->totexceso01), "e")) ? (float)$this->totexceso01 : $this->totexceso01; 
   $this->totexceso01 = (string)$this->totexceso01;
   $this->imagencte01 = $rs->fields[71] ;  
   $this->block = $rs->fields[72] ;  
   $this->block = (string)$this->block;
   $this->uid = $rs->fields[73] ;  
   $this->uid = (string)$this->uid;
   $this->ultimoacceso = $rs->fields[74] ;  
   $this->ultimoacceso = (string)$this->ultimoacceso;
   $this->idcli = $rs->fields[75] ;  
   $this->idcli = (string)$this->idcli;
   $this->catcte01 = $rs->fields[76] ;  
   $this->transferido = $rs->fields[77] ;  
   $this->password = $rs->fields[78] ;  
   $this->showroom = $rs->fields[79] ;  
   $this->orden = $rs->fields[80] ;  
   $this->orden = (string)$this->orden;
   $this->website = $rs->fields[81] ;  
   $this->longitud01 = $rs->fields[82] ;  
   $this->latitud01 = $rs->fields[83] ;  
   $this->zoom01 = $rs->fields[84] ;  
   $this->zoom01 = (string)$this->zoom01;
   $this->acceder = $rs->fields[85] ;  
   $this->coniva01 = $rs->fields[86] ;  
   $this->idemp01 = $rs->fields[87] ;  
   $this->idemp01 = (string)$this->idemp01;
   $this->codprov01 = $rs->fields[88] ;  
   $this->celular01 = $rs->fields[89] ;  
   $this->dircliente01 = $rs->fields[90] ;  
   $this->razcte01 = $rs->fields[91] ;  
   $this->ruc01 = $rs->fields[92] ;  
   $this->timenegocio01 = $rs->fields[93] ;  
   $this->refbanc01 = $rs->fields[94] ;  
   $this->refcom01 = $rs->fields[95] ;  
   $this->tarjcred01 = $rs->fields[96] ;  
   $this->firmaut01 = $rs->fields[97] ;  
   $this->precte01 = $rs->fields[98] ;  
   $this->precte01 = (string)$this->precte01;
   $this->cuotasven01 = $rs->fields[99] ;  
   $this->cuotasven01 = (string)$this->cuotasven01;
   $this->diasven01 = $rs->fields[100] ;  
   $this->diasven01 = (string)$this->diasven01;
   $this->fechanace01 = $rs->fields[101] ;  
   $this->sexo01 = $rs->fields[102] ;  
   $this->sexo01 = (string)$this->sexo01;
   $this->estadocivil01 = $rs->fields[103] ;  
   $this->dirgestion01 = $rs->fields[104] ;  
   $this->numhijos01 = $rs->fields[105] ;  
   $this->numhijos01 = (string)$this->numhijos01;
   $this->estsop01 = $rs->fields[106] ;  
   $this->notick01 = $rs->fields[107] ;  
   $this->chequece = $rs->fields[108] ;  
   $this->solcre = $rs->fields[109] ;  
   $this->promocte01 = $rs->fields[110] ;  
   $this->pagare01 = $rs->fields[111] ;  
   $this->valorpagare01 = $rs->fields[112] ;  
   $this->valorpagare01 = str_replace(",", ".", $this->valorpagare01);
   $this->valorpagare01 = (strpos(strtolower($this->valorpagare01), "e")) ? (float)$this->valorpagare01 : $this->valorpagare01; 
   $this->valorpagare01 = (string)$this->valorpagare01;
   $this->garante01 = $rs->fields[113] ;  
   $this->fecvenp01 = $rs->fields[114] ;  
   $this->ctacgant01 = $rs->fields[115] ;  
   $this->dsn = $rs->fields[116] ;  
   $this->residente = $rs->fields[117] ;  
   $this->residente = (string)$this->residente;
   $this->medio_contacto = $rs->fields[118] ;  
   $this->separacion_bienes = $rs->fields[119] ;  
   $this->separacion_bienes = (string)$this->separacion_bienes;
   $this->disolucion_conyugal = $rs->fields[120] ;  
   $this->disolucion_conyugal = (string)$this->disolucion_conyugal;
   $this->capitulaciones = $rs->fields[121] ;  
   $this->capitulaciones = (string)$this->capitulaciones;
   $this->numero_carga_familiar = $rs->fields[122] ;  
   $this->numero_carga_familiar = (string)$this->numero_carga_familiar;
   $this->nivel_educacion = $rs->fields[123] ;  
   $this->profesion = $rs->fields[124] ;  
   $this->envio_correspondencia = $rs->fields[125] ;  
   $this->envio_correspondencia = (string)$this->envio_correspondencia;
   $this->nombre_arrendador = $rs->fields[126] ;  
   $this->apellido_arrendador = $rs->fields[127] ;  
   $this->id_vivienda = $rs->fields[128] ;  
   $this->id_vivienda = (string)$this->id_vivienda;
   $this->telefono_arrendador = $rs->fields[129] ;  
   $this->nombres_referencia = $rs->fields[130] ;  
   $this->apellidos_referencia = $rs->fields[131] ;  
   $this->parentesco = $rs->fields[132] ;  
   $this->celular_ref = $rs->fields[133] ;  
   $this->telefono_convencional_ref = $rs->fields[134] ;  
   $this->id_ocupacion = $rs->fields[135] ;  
   $this->id_ocupacion = (string)$this->id_ocupacion;
   $this->fecha_ingreso_empresa = $rs->fields[136] ;  
   $this->nombre_empresa = $rs->fields[137] ;  
   $this->ciudad_empresa = $rs->fields[138] ;  
   $this->provincia_empresa = $rs->fields[139] ;  
   $this->direccion_empresa = $rs->fields[140] ;  
   $this->cargo_empresa = $rs->fields[141] ;  
   $this->telefono_empresa = $rs->fields[142] ;  
   $this->ext_empresa = $rs->fields[143] ;  
   $this->id_tipo_contrato_actividad = $rs->fields[144] ;  
   $this->id_tipo_contrato_actividad = (string)$this->id_tipo_contrato_actividad;
   $this->empresa_jubilo_actividad = $rs->fields[145] ;  
   $this->fecha_salida_empresa_actividad = $rs->fields[146] ;  
   $this->cargo_salida_empresa_actividad = $rs->fields[147] ;  
   $this->fecha_inicio_actividad = $rs->fields[148] ;  
   $this->fecha_ingreso_empresa_actividad = $rs->fields[149] ;  
   $this->nombre_empresa_actividad = $rs->fields[150] ;  
   $this->institucion_actividad = $rs->fields[151] ;  
   $this->ciudad_actividad = $rs->fields[152] ;  
   $this->provincia_actividad = $rs->fields[153] ;  
   $this->direccion_actividad = $rs->fields[154] ;  
   $this->calle_principal_actividad = $rs->fields[155] ;  
   $this->no_actividad = $rs->fields[156] ;  
   $this->calle_secundaria_actividad = $rs->fields[157] ;  
   $this->sector_actividad = $rs->fields[158] ;  
   $this->pais_actividad = $rs->fields[159] ;  
   $this->pais_actividad = (string)$this->pais_actividad;
   $this->actividad = $rs->fields[160] ;  
   $this->telefono_actividad = $rs->fields[161] ;  
   $this->cargo_actividad = $rs->fields[162] ;  
   $this->ext_actividad = $rs->fields[163] ;  
   $this->fecha_ingreso_empresa_actividad2 = $rs->fields[164] ;  
   $this->nombre_empresa_actividad2 = $rs->fields[165] ;  
   $this->institucion_actividad2 = $rs->fields[166] ;  
   $this->ciudad_actividad2 = $rs->fields[167] ;  
   $this->provincia_actividad2 = $rs->fields[168] ;  
   $this->direccion_actividad2 = $rs->fields[169] ;  
   $this->calle_principal_actividad2 = $rs->fields[170] ;  
   $this->no_actividad2 = $rs->fields[171] ;  
   $this->calle_secundaria_actividad2 = $rs->fields[172] ;  
   $this->sector_actividad2 = $rs->fields[173] ;  
   $this->fecha_salida_empresa_actividad2 = $rs->fields[174] ;  
   $this->fecha_inicio_actividad2 = $rs->fields[175] ;  
   $this->actividad2 = $rs->fields[176] ;  
   $this->telefono_actividad2 = $rs->fields[177] ;  
   $this->ext_actividad2 = $rs->fields[178] ;  
   $this->ext_actividad2 = (string)$this->ext_actividad2;
   $this->cargo_actividad2 = $rs->fields[179] ;  
   $this->id_tipo_contrato_actividad2 = $rs->fields[180] ;  
   $this->id_tipo_contrato_actividad2 = (string)$this->id_tipo_contrato_actividad2;
   $this->empresa_jubilo_actividad2 = $rs->fields[181] ;  
   $this->sueldo = $rs->fields[182] ;  
   $this->sueldo = str_replace(",", ".", $this->sueldo);
   $this->sueldo = (strpos(strtolower($this->sueldo), "e")) ? (float)$this->sueldo : $this->sueldo; 
   $this->sueldo = (string)$this->sueldo;
   $this->arriendos = $rs->fields[183] ;  
   $this->arriendos = str_replace(",", ".", $this->arriendos);
   $this->arriendos = (strpos(strtolower($this->arriendos), "e")) ? (float)$this->arriendos : $this->arriendos; 
   $this->arriendos = (string)$this->arriendos;
   $this->dividendo_utilidades_ultimo_ano = $rs->fields[184] ;  
   $this->dividendo_utilidades_ultimo_ano = str_replace(",", ".", $this->dividendo_utilidades_ultimo_ano);
   $this->dividendo_utilidades_ultimo_ano = (strpos(strtolower($this->dividendo_utilidades_ultimo_ano), "e")) ? (float)$this->dividendo_utilidades_ultimo_ano : $this->dividendo_utilidades_ultimo_ano; 
   $this->dividendo_utilidades_ultimo_ano = (string)$this->dividendo_utilidades_ultimo_ano;
   $this->id_otros_ingresos = $rs->fields[185] ;  
   $this->id_otros_ingresos = (string)$this->id_otros_ingresos;
   $this->arriendo_hipoteca = $rs->fields[186] ;  
   $this->arriendo_hipoteca = str_replace(",", ".", $this->arriendo_hipoteca);
   $this->arriendo_hipoteca = (strpos(strtolower($this->arriendo_hipoteca), "e")) ? (float)$this->arriendo_hipoteca : $this->arriendo_hipoteca; 
   $this->arriendo_hipoteca = (string)$this->arriendo_hipoteca;
   $this->prestamos = $rs->fields[187] ;  
   $this->prestamos = str_replace(",", ".", $this->prestamos);
   $this->prestamos = (strpos(strtolower($this->prestamos), "e")) ? (float)$this->prestamos : $this->prestamos; 
   $this->prestamos = (string)$this->prestamos;
   $this->tarjetas_creditos = $rs->fields[188] ;  
   $this->tarjetas_creditos = str_replace(",", ".", $this->tarjetas_creditos);
   $this->tarjetas_creditos = (strpos(strtolower($this->tarjetas_creditos), "e")) ? (float)$this->tarjetas_creditos : $this->tarjetas_creditos; 
   $this->tarjetas_creditos = (string)$this->tarjetas_creditos;
   $this->gastos_familiares = $rs->fields[189] ;  
   $this->gastos_familiares = str_replace(",", ".", $this->gastos_familiares);
   $this->gastos_familiares = (strpos(strtolower($this->gastos_familiares), "e")) ? (float)$this->gastos_familiares : $this->gastos_familiares; 
   $this->gastos_familiares = (string)$this->gastos_familiares;
   $this->id_otros_gastos = $rs->fields[190] ;  
   $this->id_otros_gastos = (string)$this->id_otros_gastos;
   $this->depositos_bancos = $rs->fields[191] ;  
   $this->depositos_bancos = str_replace(",", ".", $this->depositos_bancos);
   $this->depositos_bancos = (strpos(strtolower($this->depositos_bancos), "e")) ? (float)$this->depositos_bancos : $this->depositos_bancos; 
   $this->depositos_bancos = (string)$this->depositos_bancos;
   $this->cuentas_documentos = $rs->fields[192] ;  
   $this->cuentas_documentos = str_replace(",", ".", $this->cuentas_documentos);
   $this->cuentas_documentos = (strpos(strtolower($this->cuentas_documentos), "e")) ? (float)$this->cuentas_documentos : $this->cuentas_documentos; 
   $this->cuentas_documentos = (string)$this->cuentas_documentos;
   $this->mercaderias = $rs->fields[193] ;  
   $this->mercaderias = str_replace(",", ".", $this->mercaderias);
   $this->mercaderias = (strpos(strtolower($this->mercaderias), "e")) ? (float)$this->mercaderias : $this->mercaderias; 
   $this->mercaderias = (string)$this->mercaderias;
   $this->maquinarias_vehiculos = $rs->fields[194] ;  
   $this->maquinarias_vehiculos = str_replace(",", ".", $this->maquinarias_vehiculos);
   $this->maquinarias_vehiculos = (strpos(strtolower($this->maquinarias_vehiculos), "e")) ? (float)$this->maquinarias_vehiculos : $this->maquinarias_vehiculos; 
   $this->maquinarias_vehiculos = (string)$this->maquinarias_vehiculos;
   $this->terrenos_edificios = $rs->fields[195] ;  
   $this->terrenos_edificios = str_replace(",", ".", $this->terrenos_edificios);
   $this->terrenos_edificios = (strpos(strtolower($this->terrenos_edificios), "e")) ? (float)$this->terrenos_edificios : $this->terrenos_edificios; 
   $this->terrenos_edificios = (string)$this->terrenos_edificios;
   $this->acciones_bonos_cedulas = $rs->fields[196] ;  
   $this->acciones_bonos_cedulas = str_replace(",", ".", $this->acciones_bonos_cedulas);
   $this->acciones_bonos_cedulas = (strpos(strtolower($this->acciones_bonos_cedulas), "e")) ? (float)$this->acciones_bonos_cedulas : $this->acciones_bonos_cedulas; 
   $this->acciones_bonos_cedulas = (string)$this->acciones_bonos_cedulas;
   $this->id_otros_activos = $rs->fields[197] ;  
   $this->id_otros_activos = (string)$this->id_otros_activos;
   $this->cuentas_por_pagar = $rs->fields[198] ;  
   $this->cuentas_por_pagar = str_replace(",", ".", $this->cuentas_por_pagar);
   $this->cuentas_por_pagar = (strpos(strtolower($this->cuentas_por_pagar), "e")) ? (float)$this->cuentas_por_pagar : $this->cuentas_por_pagar; 
   $this->cuentas_por_pagar = (string)$this->cuentas_por_pagar;
   $this->prestamos_banco_menos_ano = $rs->fields[199] ;  
   $this->prestamos_banco_menos_ano = str_replace(",", ".", $this->prestamos_banco_menos_ano);
   $this->prestamos_banco_menos_ano = (strpos(strtolower($this->prestamos_banco_menos_ano), "e")) ? (float)$this->prestamos_banco_menos_ano : $this->prestamos_banco_menos_ano; 
   $this->prestamos_banco_menos_ano = (string)$this->prestamos_banco_menos_ano;
   $this->prestamos_banco_mas_ano = $rs->fields[200] ;  
   $this->prestamos_banco_mas_ano = str_replace(",", ".", $this->prestamos_banco_mas_ano);
   $this->prestamos_banco_mas_ano = (strpos(strtolower($this->prestamos_banco_mas_ano), "e")) ? (float)$this->prestamos_banco_mas_ano : $this->prestamos_banco_mas_ano; 
   $this->prestamos_banco_mas_ano = (string)$this->prestamos_banco_mas_ano;
   $this->deudas_tarjetas_creditos = $rs->fields[201] ;  
   $this->deudas_tarjetas_creditos = str_replace(",", ".", $this->deudas_tarjetas_creditos);
   $this->deudas_tarjetas_creditos = (strpos(strtolower($this->deudas_tarjetas_creditos), "e")) ? (float)$this->deudas_tarjetas_creditos : $this->deudas_tarjetas_creditos; 
   $this->deudas_tarjetas_creditos = (string)$this->deudas_tarjetas_creditos;
   $this->id_otras_obligaciones = $rs->fields[202] ;  
   $this->id_otras_obligaciones = (string)$this->id_otras_obligaciones;
   $this->deudor = $rs->fields[203] ;  
   $this->monto = $rs->fields[204] ;  
   $this->monto = str_replace(",", ".", $this->monto);
   $this->monto = (strpos(strtolower($this->monto), "e")) ? (float)$this->monto : $this->monto; 
   $this->monto = (string)$this->monto;
   $this->descripcion = $rs->fields[205] ;  
   $this->placa = $rs->fields[206] ;  
   $this->valor_maquinaria_vehiculo = $rs->fields[207] ;  
   $this->valor_maquinaria_vehiculo = str_replace(",", ".", $this->valor_maquinaria_vehiculo);
   $this->valor_maquinaria_vehiculo = (strpos(strtolower($this->valor_maquinaria_vehiculo), "e")) ? (float)$this->valor_maquinaria_vehiculo : $this->valor_maquinaria_vehiculo; 
   $this->valor_maquinaria_vehiculo = (string)$this->valor_maquinaria_vehiculo;
   $this->a_nombre_de = $rs->fields[208] ;  
   $this->ubicacion = $rs->fields[209] ;  
   $this->valor_propiedad = $rs->fields[210] ;  
   $this->valor_propiedad = str_replace(",", ".", $this->valor_propiedad);
   $this->valor_propiedad = (strpos(strtolower($this->valor_propiedad), "e")) ? (float)$this->valor_propiedad : $this->valor_propiedad; 
   $this->valor_propiedad = (string)$this->valor_propiedad;
   $this->empresa = $rs->fields[211] ;  
   $this->valor_mercado = $rs->fields[212] ;  
   $this->valor_mercado = str_replace(",", ".", $this->valor_mercado);
   $this->valor_mercado = (strpos(strtolower($this->valor_mercado), "e")) ? (float)$this->valor_mercado : $this->valor_mercado; 
   $this->valor_mercado = (string)$this->valor_mercado;
   $this->institucion_bancaria = $rs->fields[213] ;  
   $this->monto_banco = $rs->fields[214] ;  
   $this->monto_banco = str_replace(",", ".", $this->monto_banco);
   $this->monto_banco = (strpos(strtolower($this->monto_banco), "e")) ? (float)$this->monto_banco : $this->monto_banco; 
   $this->monto_banco = (string)$this->monto_banco;
   $this->institucion_finaciera = $rs->fields[215] ;  
   $this->monto_institucion_finaciera = $rs->fields[216] ;  
   $this->monto_institucion_finaciera = str_replace(",", ".", $this->monto_institucion_finaciera);
   $this->monto_institucion_finaciera = (strpos(strtolower($this->monto_institucion_finaciera), "e")) ? (float)$this->monto_institucion_finaciera : $this->monto_institucion_finaciera; 
   $this->monto_institucion_finaciera = (string)$this->monto_institucion_finaciera;
   $this->id_cliente_juridico = $rs->fields[217] ;  
   $this->id_cliente_juridico = (string)$this->id_cliente_juridico;
   $this->nombre_completo_empresa = $rs->fields[218] ;  
   $this->es_empresa_extranjera = $rs->fields[219] ;  
   $this->es_empresa_extranjera = (string)$this->es_empresa_extranjera;
   $this->pais_empresa = $rs->fields[220] ;  
   $this->fecha_constitucion_empresa = $rs->fields[221] ;  
   $this->id_oficina = $rs->fields[222] ;  
   $this->id_oficina = (string)$this->id_oficina;
   $this->id_tipo_actividad = $rs->fields[223] ;  
   $this->id_tipo_actividad = (string)$this->id_tipo_actividad;
   $this->especifique_otros = $rs->fields[224] ;  
   $this->direccion_correspondencia = $rs->fields[225] ;  
   $this->calle_principal_correspondencia = $rs->fields[226] ;  
   $this->no_correspondencia = $rs->fields[227] ;  
   $this->calle_secundaria_correspondencia = $rs->fields[228] ;  
   $this->id_ciudad_correspondencia = $rs->fields[229] ;  
   $this->id_ciudad_correspondencia = (string)$this->id_ciudad_correspondencia;
   $this->nombre_empresa_solicitante = $rs->fields[230] ;  
   $this->cargo_empresa_solicitante = $rs->fields[231] ;  
   $this->celular_empresa_solicitante = $rs->fields[232] ;  
   $this->telefono_empresa_solicitante = $rs->fields[233] ;  
   $this->mail_empresa_solicitante = $rs->fields[234] ;  
   $this->saldo_empresa_solicitante = $rs->fields[235] ;  
   $this->saldo_empresa_solicitante = str_replace(",", ".", $this->saldo_empresa_solicitante);
   $this->saldo_empresa_solicitante = (strpos(strtolower($this->saldo_empresa_solicitante), "e")) ? (float)$this->saldo_empresa_solicitante : $this->saldo_empresa_solicitante; 
   $this->saldo_empresa_solicitante = (string)$this->saldo_empresa_solicitante;
   $this->nombre_referencia_comerciales = $rs->fields[236] ;  
   $this->fecha_compra = $rs->fields[237] ;  
   $this->telefono_referencia_comerciales = $rs->fields[238] ;  
   $this->ventas = $rs->fields[239] ;  
   $this->ventas = str_replace(",", ".", $this->ventas);
   $this->ventas = (strpos(strtolower($this->ventas), "e")) ? (float)$this->ventas : $this->ventas; 
   $this->ventas = (string)$this->ventas;
   $this->comisiones = $rs->fields[240] ;  
   $this->comisiones = str_replace(",", ".", $this->comisiones);
   $this->comisiones = (strpos(strtolower($this->comisiones), "e")) ? (float)$this->comisiones : $this->comisiones; 
   $this->comisiones = (string)$this->comisiones;
   $this->gastos_operativos = $rs->fields[241] ;  
   $this->gastos_operativos = str_replace(",", ".", $this->gastos_operativos);
   $this->gastos_operativos = (strpos(strtolower($this->gastos_operativos), "e")) ? (float)$this->gastos_operativos : $this->gastos_operativos; 
   $this->gastos_operativos = (string)$this->gastos_operativos;
   $this->gastos_administrativos = $rs->fields[242] ;  
   $this->gastos_administrativos = str_replace(",", ".", $this->gastos_administrativos);
   $this->gastos_administrativos = (strpos(strtolower($this->gastos_administrativos), "e")) ? (float)$this->gastos_administrativos : $this->gastos_administrativos; 
   $this->gastos_administrativos = (string)$this->gastos_administrativos;
   $this->pago_cuotas_prestamo = $rs->fields[243] ;  
   $this->pago_cuotas_prestamo = str_replace(",", ".", $this->pago_cuotas_prestamo);
   $this->pago_cuotas_prestamo = (strpos(strtolower($this->pago_cuotas_prestamo), "e")) ? (float)$this->pago_cuotas_prestamo : $this->pago_cuotas_prestamo; 
   $this->pago_cuotas_prestamo = (string)$this->pago_cuotas_prestamo;
   $this->funcionario = $rs->fields[244] ;  
   $this->funcionario = (string)$this->funcionario;
   $this->funcionario_detalle = $rs->fields[245] ;  
   $this->miembro_politico = $rs->fields[246] ;  
   $this->miembro_politico = (string)$this->miembro_politico;
   $this->miembro_politico_detalle = $rs->fields[247] ;  
   $this->ejecutivo_gobierno = $rs->fields[248] ;  
   $this->ejecutivo_gobierno = (string)$this->ejecutivo_gobierno;
   $this->ejecutivo_gobierno_detalle = $rs->fields[249] ;  
   $this->familiar_gobierno = $rs->fields[250] ;  
   $this->familiar_gobierno = (string)$this->familiar_gobierno;
   $this->familiar_gobierno_detalle = $rs->fields[251] ;  
   $this->familiar_gobierno_detalle_quien = $rs->fields[252] ;  
   $this->otros_ingresos = $rs->fields[253] ;  
   $this->otros_gastos = $rs->fields[254] ;  
   $this->otros_activos = $rs->fields[255] ;  
   $this->otras_obligaciones = $rs->fields[256] ;  
   $this->sector_direccion_empresa = $rs->fields[257] ;  
   $this->sector_direccion_empresa_correo = $rs->fields[258] ;  
   $this->extranjero_nombres_referencia = $rs->fields[259] ;  
   $this->extranjero_apellidos_referencia = $rs->fields[260] ;  
   $this->extranjero_parentesco = $rs->fields[261] ;  
   $this->extranjero_celular_ref = $rs->fields[262] ;  
   $this->extranjero_telefono_convencional_ref = $rs->fields[263] ;  
   $this->cargo_representante_legal = $rs->fields[264] ;  
   $this->direccion_extranjero = $rs->fields[265] ;  
   $this->direccion_extranjero = (string)$this->direccion_extranjero;
   $this->relacion_dependencia_principal = $rs->fields[266] ;  
   $this->relacion_dependencia_principal = (string)$this->relacion_dependencia_principal;
   $this->correo_corporativo_principal = $rs->fields[267] ;  
   $this->relacion_dependencia_secundaria = $rs->fields[268] ;  
   $this->relacion_dependencia_secundaria = (string)$this->relacion_dependencia_secundaria;
   $this->correo_corporativo_secundario = $rs->fields[269] ;  
   $this->actividad_secundaria = $rs->fields[270] ;  
   $this->actividad_secundaria = (string)$this->actividad_secundaria;
   $this->id_pais_empresa = $rs->fields[271] ;  
   $this->id_provincia_empresa = $rs->fields[272] ;  
   $this->id_pais_correo = $rs->fields[273] ;  
   $this->id_provincia_correo = $rs->fields[274] ;  
   $this->apellido_empresa_solicitante = $rs->fields[275] ;  
   $this->pais_actividad2 = $rs->fields[276] ;  
   $this->id_provincia_exterior = $rs->fields[277] ;  
   $this->pais_independiente = $rs->fields[278] ;  
   $this->tipo_contrato_otros_actividad_principal = $rs->fields[279] ;  
   $this->actividadeconomica = $rs->fields[280] ;  
   $this->clasesujeto = $rs->fields[281] ;  
   $this->provincia = $rs->fields[282] ;  
   $this->parroquia = $rs->fields[283] ;  
   $this->canton = $rs->fields[284] ;  
   $this->demandajudicial = $rs->fields[285] ;  
   $this->vdemandajudicial = $rs->fields[286] ;  
   $this->vdemandajudicial = str_replace(",", ".", $this->vdemandajudicial);
   $this->vdemandajudicial = (strpos(strtolower($this->vdemandajudicial), "e")) ? (float)$this->vdemandajudicial : $this->vdemandajudicial; 
   $this->vdemandajudicial = (string)$this->vdemandajudicial;
   $this->carteracastigada = $rs->fields[287] ;  
   $this->vcarteracastigada = $rs->fields[288] ;  
   $this->vcarteracastigada = str_replace(",", ".", $this->vcarteracastigada);
   $this->vcarteracastigada = (strpos(strtolower($this->vcarteracastigada), "e")) ? (float)$this->vcarteracastigada : $this->vcarteracastigada; 
   $this->vcarteracastigada = (string)$this->vcarteracastigada;
   $this->accesoexterno01 = $rs->fields[289] ;  
   $this->referencia = $rs->fields[290] ;  
   $this->id_pais_empleado_dir_desempeno = $rs->fields[291] ;  
   $this->id_pais_empleado_dir_desempeno = (string)$this->id_pais_empleado_dir_desempeno;
   $this->id_provincia_empleado_dir_desempeno = $rs->fields[292] ;  
   $this->id_provincia_empleado_dir_desempeno = (string)$this->id_provincia_empleado_dir_desempeno;
   $this->id_ciudad_empleado_dir_desempeno = $rs->fields[293] ;  
   $this->id_ciudad_empleado_dir_desempeno = (string)$this->id_ciudad_empleado_dir_desempeno;
   $this->razon_social = $rs->fields[294] ;  
   $this->parterel01 = $rs->fields[295] ;  
   $this->origen_fondos = $rs->fields[296] ;  
   $this->tipo_identificacion = $rs->fields[297] ;  
   $this->id_actividad = $rs->fields[298] ;  
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['cmp_acum']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['cmp_acum']))
   {
       $parms_acum = explode(";", $_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['cmp_acum']);
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
   $nm_saida->saida("   <TITLE>" . $this->Ini->Nm_lang['lang_othr_detl_title'] . " maecte</TITLE>\r\n");
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

           $nm_saida->saida("   <script type=\"text/javascript\" src=\"grid_maecte_jquery-3.6.0.min.js\"></script>\r\n");
           $nm_saida->saida("   <script type=\"text/javascript\" src=\"grid_maecte_ajax.js\"></script>\r\n");
           $nm_saida->saida("   <script type=\"text/javascript\" src=\"grid_maecte_message.js\"></script>\r\n");
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
   if (($this->Ini->sc_export_ajax || $this->Ini->Export_det_zip) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['det_print'] == "print")
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
       $NM_css_cmp  = $this->Ini->path_link . "grid_maecte/grid_maecte_det_" . strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) . ".css";
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
   elseif (($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['det_print'] == "print" && strtoupper($nmgp_cor_print) == "PB") || $nmgp_tipo_pdf == "pb")
   {
       $nm_saida->saida(" <link rel=\"stylesheet\" type=\"text/css\" href=\"" . $this->Ini->path_link . "_lib/css/" . $this->Ini->str_schema_all . "_grid_bw.css\" /> \r\n");
       $nm_saida->saida(" <link rel=\"stylesheet\" type=\"text/css\" href=\"" . $this->Ini->path_link . "_lib/css/" . $this->Ini->str_schema_all . "_grid_bw" . $_SESSION['scriptcase']['reg_conf']['css_dir'] . ".css\" /> \r\n");
       $nm_saida->saida(" <link rel=\"stylesheet\" type=\"text/css\" href=\"" . $this->Ini->path_link . "grid_maecte/grid_maecte_det_" . strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) . ".css\" />\r\n");
   }
   else
   {
       $nm_saida->saida(" <link rel=\"stylesheet\" type=\"text/css\" href=\"" . $this->Ini->path_link . "_lib/css/" . $this->Ini->str_schema_all . "_grid.css\" /> \r\n");
       $nm_saida->saida(" <link rel=\"stylesheet\" type=\"text/css\" href=\"" . $this->Ini->path_link . "_lib/css/" . $this->Ini->str_schema_all . "_grid" . $_SESSION['scriptcase']['reg_conf']['css_dir'] . ".css\" /> \r\n");
       $nm_saida->saida(" <link rel=\"stylesheet\" type=\"text/css\" href=\"" . $this->Ini->path_link . "grid_maecte/grid_maecte_det_" . strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) . ".css\" />\r\n");
   }
       $nm_saida->saida(" <link rel=\"stylesheet\" href=\"" . $this->Ini->path_prod . "/third/font-awesome/css/all.min.css\" type=\"text/css\" media=\"screen\" />\r\n");
   if(isset($this->Ini->str_google_fonts) && !empty($this->Ini->str_google_fonts)) 
   { 
       $nm_saida->saida(" <link href=\"" . $this->Ini->str_google_fonts . "\" rel=\"stylesheet\" /> \r\n");
   } 
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['pdf_det'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['det_print'] != "print")
   {
       $nm_saida->saida(" <link rel=\"stylesheet\" type=\"text/css\" href=\"../_lib/buttons/" . $this->Ini->Str_btn_css . "\" /> \r\n");
       $nm_saida->saida(" <link rel=\"stylesheet\" href=\"../_lib/css/" . $_SESSION['scriptcase']['erro']['str_schema'] . "\" type=\"text/css\" media=\"screen\" />\r\n");
       $nm_saida->saida(" <link rel=\"stylesheet\" href=\"../_lib/css/" . $_SESSION['scriptcase']['erro']['str_schema_dir'] . "\" type=\"text/css\" media=\"screen\" />\r\n");
   }
   $nm_saida->saida("</HEAD>\r\n");
    $removeMargin = isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['link_info']['remove_margin']) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['link_info']['remove_margin'] ? 'margin: 0;' : '';
    $removeBorder = isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['link_info']['remove_border']) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['link_info']['remove_border'] ? 'border-width: 0' : '';
   if (!$this->Ini->Export_html_zip && !$this->Ini->Export_det_zip && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['det_print'] == "print")
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
   if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['link_info']['compact_mode']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['link_info']['compact_mode']) {
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
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['codcte01'])) ? $this->New_label['codcte01'] : "Codcte 01"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->codcte01))); 
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
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'codcte01', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'codcte01', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_codcte01_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_codcte01_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['tipo_cliente'])) ? $this->New_label['tipo_cliente'] : "Tipo Cliente"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->tipo_cliente))); 
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
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'tipo_cliente', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'tipo_cliente', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_tipo_cliente_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_tipo_cliente_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['id_nacionalidad'])) ? $this->New_label['id_nacionalidad'] : "Id Nacionalidad"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->id_nacionalidad))); 
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
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'id_nacionalidad', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'id_nacionalidad', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_id_nacionalidad_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_id_nacionalidad_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['nomcte01'])) ? $this->New_label['nomcte01'] : "Nomcte 01"; 
   $conteudo = trim(sc_strip_script($this->nomcte01)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'nomcte01', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'nomcte01', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_nomcte01_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_nomcte01_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['primer_nombre'])) ? $this->New_label['primer_nombre'] : "Primer Nombre"; 
   $conteudo = trim(sc_strip_script($this->primer_nombre)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'primer_nombre', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'primer_nombre', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_primer_nombre_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_primer_nombre_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['segundo_nombre'])) ? $this->New_label['segundo_nombre'] : "Segundo Nombre"; 
   $conteudo = trim(sc_strip_script($this->segundo_nombre)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'segundo_nombre', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'segundo_nombre', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_segundo_nombre_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_segundo_nombre_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['primer_apellido'])) ? $this->New_label['primer_apellido'] : "Primer Apellido"; 
   $conteudo = trim(sc_strip_script($this->primer_apellido)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'primer_apellido', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'primer_apellido', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_primer_apellido_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_primer_apellido_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['segundo_apellido'])) ? $this->New_label['segundo_apellido'] : "Segundo Apellido"; 
   $conteudo = trim(sc_strip_script($this->segundo_apellido)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'segundo_apellido', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'segundo_apellido', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_segundo_apellido_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_segundo_apellido_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['cv1cte01'])) ? $this->New_label['cv1cte01'] : "Cv 1cte 01"; 
   $conteudo = trim(sc_strip_script($this->cv1cte01)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'cv1cte01', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'cv1cte01', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_cv1cte01_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_cv1cte01_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['cv2cte01'])) ? $this->New_label['cv2cte01'] : "Cv 2cte 01"; 
   $conteudo = trim(sc_strip_script($this->cv2cte01)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'cv2cte01', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'cv2cte01', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_cv2cte01_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_cv2cte01_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['tipcte01'])) ? $this->New_label['tipcte01'] : "Tipcte 01"; 
   $conteudo = trim(sc_strip_script($this->tipcte01)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'tipcte01', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'tipcte01', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_tipcte01_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_tipcte01_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['ofienccte01'])) ? $this->New_label['ofienccte01'] : "Ofienccte 01"; 
   $conteudo = trim(sc_strip_script($this->ofienccte01)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'ofienccte01', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'ofienccte01', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_ofienccte01_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_ofienccte01_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['vendcte01'])) ? $this->New_label['vendcte01'] : "Vendcte 01"; 
   $conteudo = trim(sc_strip_script($this->vendcte01)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'vendcte01', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'vendcte01', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_vendcte01_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_vendcte01_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['cobrcte01'])) ? $this->New_label['cobrcte01'] : "Cobrcte 01"; 
   $conteudo = trim(sc_strip_script($this->cobrcte01)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'cobrcte01', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'cobrcte01', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_cobrcte01_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_cobrcte01_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['loccte01'])) ? $this->New_label['loccte01'] : "Loccte 01"; 
   $conteudo = trim(sc_strip_script($this->loccte01)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'loccte01', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'loccte01', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_loccte01_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_loccte01_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['dircte01'])) ? $this->New_label['dircte01'] : "Dircte 01"; 
   $conteudo = trim(sc_strip_script($this->dircte01)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'dircte01', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'dircte01', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_dircte01_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_dircte01_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['sector'])) ? $this->New_label['sector'] : "Sector"; 
   $conteudo = trim(sc_strip_script($this->sector)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'sector', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'sector', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_sector_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_sector_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['calle_principal'])) ? $this->New_label['calle_principal'] : "Calle Principal"; 
   $conteudo = trim(sc_strip_script($this->calle_principal)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'calle_principal', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'calle_principal', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_calle_principal_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_calle_principal_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['no'])) ? $this->New_label['no'] : "No"; 
   $conteudo = trim(sc_strip_script($this->no)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'no', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'no', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_no_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_no_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['calle_secundaria'])) ? $this->New_label['calle_secundaria'] : "Calle Secundaria"; 
   $conteudo = trim(sc_strip_script($this->calle_secundaria)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'calle_secundaria', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'calle_secundaria', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_calle_secundaria_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_calle_secundaria_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['id_pais'])) ? $this->New_label['id_pais'] : "Id Pais"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->id_pais))); 
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
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'id_pais', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'id_pais', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_id_pais_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_id_pais_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['id_provincia'])) ? $this->New_label['id_provincia'] : "Id Provincia"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->id_provincia))); 
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
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'id_provincia', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'id_provincia', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_id_provincia_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_id_provincia_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['id_ciudad'])) ? $this->New_label['id_ciudad'] : "Id Ciudad"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->id_ciudad))); 
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
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'id_ciudad', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'id_ciudad', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_id_ciudad_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_id_ciudad_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['id_canton'])) ? $this->New_label['id_canton'] : "Id Canton"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->id_canton))); 
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
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'id_canton', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'id_canton', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_id_canton_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_id_canton_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['telcte01'])) ? $this->New_label['telcte01'] : "Telcte 01"; 
   $conteudo = trim(sc_strip_script($this->telcte01)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'telcte01', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'telcte01', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_telcte01_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_telcte01_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['cascte01'])) ? $this->New_label['cascte01'] : "Cascte 01"; 
   $conteudo = trim(sc_strip_script($this->cascte01)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'cascte01', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'cascte01', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_cascte01_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_cascte01_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['ci_conyuge'])) ? $this->New_label['ci_conyuge'] : "Ci Conyuge"; 
   $conteudo = trim(sc_strip_script($this->ci_conyuge)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'ci_conyuge', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'ci_conyuge', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_ci_conyuge_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_ci_conyuge_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['conyuge_tipo_identidad'])) ? $this->New_label['conyuge_tipo_identidad'] : "Conyuge Tipo Identidad"; 
   $conteudo = trim(sc_strip_script($this->conyuge_tipo_identidad)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'conyuge_tipo_identidad', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'conyuge_tipo_identidad', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_conyuge_tipo_identidad_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_conyuge_tipo_identidad_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['conyuge_primer_nombre'])) ? $this->New_label['conyuge_primer_nombre'] : "Conyuge Primer Nombre"; 
   $conteudo = trim(sc_strip_script($this->conyuge_primer_nombre)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'conyuge_primer_nombre', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'conyuge_primer_nombre', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_conyuge_primer_nombre_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_conyuge_primer_nombre_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['conyuge_segundo_nombre'])) ? $this->New_label['conyuge_segundo_nombre'] : "Conyuge Segundo Nombre"; 
   $conteudo = trim(sc_strip_script($this->conyuge_segundo_nombre)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'conyuge_segundo_nombre', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'conyuge_segundo_nombre', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_conyuge_segundo_nombre_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_conyuge_segundo_nombre_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['conyuge_primer_apellido'])) ? $this->New_label['conyuge_primer_apellido'] : "Conyuge Primer Apellido"; 
   $conteudo = trim(sc_strip_script($this->conyuge_primer_apellido)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'conyuge_primer_apellido', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'conyuge_primer_apellido', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_conyuge_primer_apellido_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_conyuge_primer_apellido_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['conyuge_segundo_apellido'])) ? $this->New_label['conyuge_segundo_apellido'] : "Conyuge Segundo Apellido"; 
   $conteudo = trim(sc_strip_script($this->conyuge_segundo_apellido)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'conyuge_segundo_apellido', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'conyuge_segundo_apellido', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_conyuge_segundo_apellido_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_conyuge_segundo_apellido_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['conyuge_profesion'])) ? $this->New_label['conyuge_profesion'] : "Conyuge Profesion"; 
   $conteudo = trim(sc_strip_script($this->conyuge_profesion)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'conyuge_profesion', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'conyuge_profesion', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_conyuge_profesion_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_conyuge_profesion_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['id_tipo_documento'])) ? $this->New_label['id_tipo_documento'] : "Id Tipo Documento"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->id_tipo_documento))); 
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
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'id_tipo_documento', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'id_tipo_documento', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_id_tipo_documento_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_id_tipo_documento_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['repleg01'])) ? $this->New_label['repleg01'] : "Repleg 01"; 
   $conteudo = trim(sc_strip_script($this->repleg01)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'repleg01', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'repleg01', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_repleg01_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_repleg01_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['fecing01'])) ? $this->New_label['fecing01'] : "Fecing 01"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->fecing01))); 
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
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'fecing01', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'fecing01', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_fecing01_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_fecing01_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['condpag01'])) ? $this->New_label['condpag01'] : "Condpag 01"; 
   $conteudo = trim(sc_strip_script($this->condpag01)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'condpag01', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'condpag01', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_condpag01_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_condpag01_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['desctocte01'])) ? $this->New_label['desctocte01'] : "Desctocte 01"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->desctocte01))); 
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
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'desctocte01', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'desctocte01', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_desctocte01_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_desctocte01_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['limcred01'])) ? $this->New_label['limcred01'] : "Limcred 01"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->limcred01))); 
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
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'limcred01', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'limcred01', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_limcred01_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_limcred01_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['desppar01'])) ? $this->New_label['desppar01'] : "Desppar 01"; 
   $conteudo = trim(sc_strip_script($this->desppar01)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'desppar01', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'desppar01', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_desppar01_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_desppar01_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['cheqpro01'])) ? $this->New_label['cheqpro01'] : "Cheqpro 01"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->cheqpro01))); 
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
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'cheqpro01', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'cheqpro01', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_cheqpro01_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_cheqpro01_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['sdoeje01'])) ? $this->New_label['sdoeje01'] : "Sdoeje 01"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->sdoeje01))); 
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
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'sdoeje01', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'sdoeje01', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_sdoeje01_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_sdoeje01_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['sdoant01'])) ? $this->New_label['sdoant01'] : "Sdoant 01"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->sdoant01))); 
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
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'sdoant01', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'sdoant01', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_sdoant01_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_sdoant01_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['sdoact01'])) ? $this->New_label['sdoact01'] : "Sdoact 01"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->sdoact01))); 
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
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'sdoact01', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'sdoact01', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_sdoact01_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_sdoact01_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['acudbm01'])) ? $this->New_label['acudbm01'] : "Acudbm 01"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->acudbm01))); 
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
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'acudbm01', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'acudbm01', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_acudbm01_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_acudbm01_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['acucrm01'])) ? $this->New_label['acucrm01'] : "Acucrm 01"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->acucrm01))); 
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
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'acucrm01', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'acucrm01', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_acucrm01_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_acucrm01_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['acudbe01'])) ? $this->New_label['acudbe01'] : "Acudbe 01"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->acudbe01))); 
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
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'acudbe01', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'acudbe01', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_acudbe01_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_acudbe01_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['acucre01'])) ? $this->New_label['acucre01'] : "Acucre 01"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->acucre01))); 
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
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'acucre01', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'acucre01', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_acucre01_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_acucre01_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['comentcte01'])) ? $this->New_label['comentcte01'] : "Comentcte 01"; 
   $conteudo = trim(sc_strip_script($this->comentcte01)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'comentcte01', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'comentcte01', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_comentcte01_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_comentcte01_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['statuscte01'])) ? $this->New_label['statuscte01'] : "Statuscte 01"; 
   $conteudo = trim(sc_strip_script($this->statuscte01)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'statuscte01', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'statuscte01', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_statuscte01_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_statuscte01_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['identcte01'])) ? $this->New_label['identcte01'] : "Identcte 01"; 
   $conteudo = trim(sc_strip_script($this->identcte01)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'identcte01', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'identcte01', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_identcte01_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_identcte01_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['cordcte01'])) ? $this->New_label['cordcte01'] : "Cordcte 01"; 
   $conteudo = trim(sc_strip_script($this->cordcte01)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'cordcte01', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'cordcte01', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_cordcte01_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_cordcte01_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['limcant01'])) ? $this->New_label['limcant01'] : "Limcant 01"; 
   $conteudo = trim(sc_strip_script($this->limcant01)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'limcant01', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'limcant01', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_limcant01_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_limcant01_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['pagleg01'])) ? $this->New_label['pagleg01'] : "Pagleg 01"; 
   $conteudo = trim(sc_strip_script($this->pagleg01)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'pagleg01', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'pagleg01', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_pagleg01_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_pagleg01_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['telcte01b'])) ? $this->New_label['telcte01b'] : "Telcte 0 1b"; 
   $conteudo = trim(sc_strip_script($this->telcte01b)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'telcte01b', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'telcte01b', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_telcte01b_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_telcte01b_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['telcte01c'])) ? $this->New_label['telcte01c'] : "Telcte 0 1c"; 
   $conteudo = trim(sc_strip_script($this->telcte01c)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'telcte01c', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'telcte01c', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_telcte01c_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_telcte01c_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['emailcte01'])) ? $this->New_label['emailcte01'] : "Emailcte 01"; 
   $conteudo = trim(sc_strip_script($this->emailcte01)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'emailcte01', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'emailcte01', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_emailcte01_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_emailcte01_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['calle_principal_exterior'])) ? $this->New_label['calle_principal_exterior'] : "Calle Principal Exterior"; 
   $conteudo = trim(sc_strip_script($this->calle_principal_exterior)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'calle_principal_exterior', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'calle_principal_exterior', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_calle_principal_exterior_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_calle_principal_exterior_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['no_exterior'])) ? $this->New_label['no_exterior'] : "No Exterior"; 
   $conteudo = trim(sc_strip_script($this->no_exterior)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'no_exterior', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'no_exterior', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_no_exterior_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_no_exterior_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['calle_secundaria_exterior'])) ? $this->New_label['calle_secundaria_exterior'] : "Calle Secundaria Exterior"; 
   $conteudo = trim(sc_strip_script($this->calle_secundaria_exterior)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'calle_secundaria_exterior', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'calle_secundaria_exterior', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_calle_secundaria_exterior_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_calle_secundaria_exterior_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['id_pais_exterior'])) ? $this->New_label['id_pais_exterior'] : "Id Pais Exterior"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->id_pais_exterior))); 
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
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'id_pais_exterior', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'id_pais_exterior', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_id_pais_exterior_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_id_pais_exterior_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['id_ciudad_exterior'])) ? $this->New_label['id_ciudad_exterior'] : "Id Ciudad Exterior"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->id_ciudad_exterior))); 
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
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'id_ciudad_exterior', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'id_ciudad_exterior', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_id_ciudad_exterior_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_id_ciudad_exterior_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['codigo_postal_exterior'])) ? $this->New_label['codigo_postal_exterior'] : "Codigo Postal Exterior"; 
   $conteudo = trim(sc_strip_script($this->codigo_postal_exterior)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'codigo_postal_exterior', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'codigo_postal_exterior', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_codigo_postal_exterior_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_codigo_postal_exterior_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['sector_exterior'])) ? $this->New_label['sector_exterior'] : "Sector Exterior"; 
   $conteudo = trim(sc_strip_script($this->sector_exterior)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'sector_exterior', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'sector_exterior', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_sector_exterior_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_sector_exterior_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['telefono_exterior'])) ? $this->New_label['telefono_exterior'] : "Telefono Exterior"; 
   $conteudo = trim(sc_strip_script($this->telefono_exterior)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'telefono_exterior', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'telefono_exterior', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_telefono_exterior_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_telefono_exterior_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['celular_exterior'])) ? $this->New_label['celular_exterior'] : "Celular Exterior"; 
   $conteudo = trim(sc_strip_script($this->celular_exterior)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'celular_exterior', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'celular_exterior', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_celular_exterior_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_celular_exterior_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['email_exterior'])) ? $this->New_label['email_exterior'] : "Email Exterior"; 
   $conteudo = trim(sc_strip_script($this->email_exterior)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'email_exterior', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'email_exterior', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_email_exterior_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_email_exterior_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['emailaltcte01'])) ? $this->New_label['emailaltcte01'] : "Emailaltcte 01"; 
   $conteudo = trim(sc_strip_script($this->emailaltcte01)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'emailaltcte01', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'emailaltcte01', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_emailaltcte01_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_emailaltcte01_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['ctacgcte01'])) ? $this->New_label['ctacgcte01'] : "Ctacgcte 01"; 
   $conteudo = trim(sc_strip_script($this->ctacgcte01)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'ctacgcte01', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'ctacgcte01', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_ctacgcte01_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_ctacgcte01_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['obsercte01'])) ? $this->New_label['obsercte01'] : "Obsercte 01"; 
   $conteudo = trim(sc_strip_script($this->obsercte01)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'obsercte01', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'obsercte01', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_obsercte01_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_obsercte01_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['totexceso01'])) ? $this->New_label['totexceso01'] : "Totexceso 01"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->totexceso01))); 
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
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'totexceso01', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'totexceso01', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_totexceso01_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_totexceso01_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['imagencte01'])) ? $this->New_label['imagencte01'] : "Imagencte 01"; 
   $conteudo = trim(sc_strip_script($this->imagencte01)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'imagencte01', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'imagencte01', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_imagencte01_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_imagencte01_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
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
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
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
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
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
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
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
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
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
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
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
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['idcli'])) ? $this->New_label['idcli'] : "Idcli"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->idcli))); 
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
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'idcli', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'idcli', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_idcli_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_idcli_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['catcte01'])) ? $this->New_label['catcte01'] : "Catcte 01"; 
   $conteudo = trim(sc_strip_script($this->catcte01)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'catcte01', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'catcte01', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_catcte01_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_catcte01_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['transferido'])) ? $this->New_label['transferido'] : "Transferido"; 
   $conteudo = trim(sc_strip_script($this->transferido)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'transferido', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'transferido', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_transferido_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_transferido_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['password'])) ? $this->New_label['password'] : "Password"; 
   $conteudo = trim(sc_strip_script($this->password)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'password', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'password', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_password_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_password_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['showroom'])) ? $this->New_label['showroom'] : "Showroom"; 
   $conteudo = trim(sc_strip_script($this->showroom)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'showroom', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'showroom', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_showroom_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_showroom_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['orden'])) ? $this->New_label['orden'] : "Orden"; 
   $conteudo = trim(sc_strip_script($this->orden)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'orden', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'orden', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_orden_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_orden_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['website'])) ? $this->New_label['website'] : "Website"; 
   $conteudo = trim(sc_strip_script($this->website)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'website', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'website', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_website_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_website_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['longitud01'])) ? $this->New_label['longitud01'] : "Longitud 01"; 
   $conteudo = trim(sc_strip_script($this->longitud01)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'longitud01', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'longitud01', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_longitud01_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_longitud01_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['latitud01'])) ? $this->New_label['latitud01'] : "Latitud 01"; 
   $conteudo = trim(sc_strip_script($this->latitud01)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'latitud01', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'latitud01', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_latitud01_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_latitud01_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['zoom01'])) ? $this->New_label['zoom01'] : "Zoom 01"; 
   $conteudo = trim(sc_strip_script($this->zoom01)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'zoom01', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'zoom01', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_zoom01_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_zoom01_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['acceder'])) ? $this->New_label['acceder'] : "Acceder"; 
   $conteudo = trim(sc_strip_script($this->acceder)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'acceder', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'acceder', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_acceder_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_acceder_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['coniva01'])) ? $this->New_label['coniva01'] : "Coniva 01"; 
   $conteudo = trim(sc_strip_script($this->coniva01)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'coniva01', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'coniva01', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_coniva01_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_coniva01_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['idemp01'])) ? $this->New_label['idemp01'] : "Idemp 01"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->idemp01))); 
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
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'idemp01', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'idemp01', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_idemp01_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_idemp01_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['codprov01'])) ? $this->New_label['codprov01'] : "Codprov 01"; 
   $conteudo = trim(sc_strip_script($this->codprov01)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'codprov01', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'codprov01', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_codprov01_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_codprov01_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['celular01'])) ? $this->New_label['celular01'] : "Celular 01"; 
   $conteudo = trim(sc_strip_script($this->celular01)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'celular01', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'celular01', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_celular01_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_celular01_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['dircliente01'])) ? $this->New_label['dircliente01'] : "Dircliente 01"; 
   $conteudo = trim(sc_strip_script($this->dircliente01)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'dircliente01', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'dircliente01', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_dircliente01_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_dircliente01_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['razcte01'])) ? $this->New_label['razcte01'] : "Razcte 01"; 
   $conteudo = trim(sc_strip_script($this->razcte01)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'razcte01', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'razcte01', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_razcte01_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_razcte01_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['ruc01'])) ? $this->New_label['ruc01'] : "Ruc 01"; 
   $conteudo = trim(sc_strip_script($this->ruc01)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'ruc01', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'ruc01', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_ruc01_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_ruc01_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['timenegocio01'])) ? $this->New_label['timenegocio01'] : "Timenegocio 01"; 
   $conteudo = trim(sc_strip_script($this->timenegocio01)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'timenegocio01', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'timenegocio01', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_timenegocio01_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_timenegocio01_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['refbanc01'])) ? $this->New_label['refbanc01'] : "Refbanc 01"; 
   $conteudo = trim(sc_strip_script($this->refbanc01)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'refbanc01', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'refbanc01', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_refbanc01_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_refbanc01_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['refcom01'])) ? $this->New_label['refcom01'] : "Refcom 01"; 
   $conteudo = trim(sc_strip_script($this->refcom01)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'refcom01', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'refcom01', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_refcom01_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_refcom01_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['tarjcred01'])) ? $this->New_label['tarjcred01'] : "Tarjcred 01"; 
   $conteudo = trim(sc_strip_script($this->tarjcred01)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'tarjcred01', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'tarjcred01', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_tarjcred01_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_tarjcred01_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['firmaut01'])) ? $this->New_label['firmaut01'] : "Firmaut 01"; 
   $conteudo = trim(sc_strip_script($this->firmaut01)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'firmaut01', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'firmaut01', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_firmaut01_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_firmaut01_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['precte01'])) ? $this->New_label['precte01'] : "Precte 01"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->precte01))); 
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
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'precte01', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'precte01', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_precte01_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_precte01_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['cuotasven01'])) ? $this->New_label['cuotasven01'] : "Cuotasven 01"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->cuotasven01))); 
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
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'cuotasven01', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'cuotasven01', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_cuotasven01_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_cuotasven01_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['diasven01'])) ? $this->New_label['diasven01'] : "Diasven 01"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->diasven01))); 
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
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'diasven01', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'diasven01', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_diasven01_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_diasven01_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['fechanace01'])) ? $this->New_label['fechanace01'] : "Fechanace 01"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->fechanace01))); 
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
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'fechanace01', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'fechanace01', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_fechanace01_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_fechanace01_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['sexo01'])) ? $this->New_label['sexo01'] : "Sexo 01"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->sexo01))); 
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
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'sexo01', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'sexo01', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_sexo01_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_sexo01_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['estadocivil01'])) ? $this->New_label['estadocivil01'] : "Estadocivil 01"; 
   $conteudo = trim(sc_strip_script($this->estadocivil01)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'estadocivil01', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'estadocivil01', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_estadocivil01_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_estadocivil01_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['dirgestion01'])) ? $this->New_label['dirgestion01'] : "Dirgestion 01"; 
   $conteudo = trim(sc_strip_script($this->dirgestion01)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'dirgestion01', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'dirgestion01', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_dirgestion01_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_dirgestion01_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['numhijos01'])) ? $this->New_label['numhijos01'] : "Numhijos 01"; 
   $conteudo = trim(sc_strip_script($this->numhijos01)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'numhijos01', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'numhijos01', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_numhijos01_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_numhijos01_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['estsop01'])) ? $this->New_label['estsop01'] : "Estsop 01"; 
   $conteudo = trim(sc_strip_script($this->estsop01)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'estsop01', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'estsop01', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_estsop01_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_estsop01_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['notick01'])) ? $this->New_label['notick01'] : "Notick 01"; 
   $conteudo = trim(sc_strip_script($this->notick01)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'notick01', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'notick01', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_notick01_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_notick01_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['chequece'])) ? $this->New_label['chequece'] : "Chequece"; 
   $conteudo = trim(sc_strip_script($this->chequece)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'chequece', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'chequece', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_chequece_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_chequece_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['solcre'])) ? $this->New_label['solcre'] : "Solcre"; 
   $conteudo = trim(sc_strip_script($this->solcre)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'solcre', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'solcre', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_solcre_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_solcre_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['promocte01'])) ? $this->New_label['promocte01'] : "Promocte 01"; 
   $conteudo = trim(sc_strip_script($this->promocte01)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'promocte01', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'promocte01', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_promocte01_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_promocte01_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['pagare01'])) ? $this->New_label['pagare01'] : "Pagare 01"; 
   $conteudo = trim(sc_strip_script($this->pagare01)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'pagare01', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'pagare01', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_pagare01_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_pagare01_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['valorpagare01'])) ? $this->New_label['valorpagare01'] : "Valorpagare 01"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->valorpagare01))); 
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
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'valorpagare01', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'valorpagare01', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_valorpagare01_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_valorpagare01_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['garante01'])) ? $this->New_label['garante01'] : "Garante 01"; 
   $conteudo = trim(sc_strip_script($this->garante01)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'garante01', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'garante01', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_garante01_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_garante01_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['fecvenp01'])) ? $this->New_label['fecvenp01'] : "Fecvenp 01"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->fecvenp01))); 
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
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'fecvenp01', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'fecvenp01', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_fecvenp01_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_fecvenp01_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['ctacgant01'])) ? $this->New_label['ctacgant01'] : "Ctacgant 01"; 
   $conteudo = trim(sc_strip_script($this->ctacgant01)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'ctacgant01', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'ctacgant01', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_ctacgant01_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_ctacgant01_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['dsn'])) ? $this->New_label['dsn'] : "Dsn"; 
   $conteudo = trim(sc_strip_script($this->dsn)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'dsn', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'dsn', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_dsn_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_dsn_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['residente'])) ? $this->New_label['residente'] : "Residente"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->residente))); 
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
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'residente', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'residente', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_residente_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_residente_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['medio_contacto'])) ? $this->New_label['medio_contacto'] : "Medio Contacto"; 
   $conteudo = trim(sc_strip_script($this->medio_contacto)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'medio_contacto', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'medio_contacto', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_medio_contacto_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_medio_contacto_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['separacion_bienes'])) ? $this->New_label['separacion_bienes'] : "Separacion Bienes"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->separacion_bienes))); 
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
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'separacion_bienes', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'separacion_bienes', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_separacion_bienes_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_separacion_bienes_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['disolucion_conyugal'])) ? $this->New_label['disolucion_conyugal'] : "Disolucion Conyugal"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->disolucion_conyugal))); 
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
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'disolucion_conyugal', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'disolucion_conyugal', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_disolucion_conyugal_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_disolucion_conyugal_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['capitulaciones'])) ? $this->New_label['capitulaciones'] : "Capitulaciones"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->capitulaciones))); 
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
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'capitulaciones', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'capitulaciones', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_capitulaciones_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_capitulaciones_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['numero_carga_familiar'])) ? $this->New_label['numero_carga_familiar'] : "Numero Carga Familiar"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->numero_carga_familiar))); 
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
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'numero_carga_familiar', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'numero_carga_familiar', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_numero_carga_familiar_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_numero_carga_familiar_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['nivel_educacion'])) ? $this->New_label['nivel_educacion'] : "Nivel Educacion"; 
   $conteudo = trim(sc_strip_script($this->nivel_educacion)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'nivel_educacion', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'nivel_educacion', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_nivel_educacion_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_nivel_educacion_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['profesion'])) ? $this->New_label['profesion'] : "Profesion"; 
   $conteudo = trim(sc_strip_script($this->profesion)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'profesion', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'profesion', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_profesion_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_profesion_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['envio_correspondencia'])) ? $this->New_label['envio_correspondencia'] : "Envio Correspondencia"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->envio_correspondencia))); 
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
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'envio_correspondencia', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'envio_correspondencia', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_envio_correspondencia_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_envio_correspondencia_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['nombre_arrendador'])) ? $this->New_label['nombre_arrendador'] : "Nombre Arrendador"; 
   $conteudo = trim(sc_strip_script($this->nombre_arrendador)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'nombre_arrendador', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'nombre_arrendador', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_nombre_arrendador_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_nombre_arrendador_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['apellido_arrendador'])) ? $this->New_label['apellido_arrendador'] : "Apellido Arrendador"; 
   $conteudo = trim(sc_strip_script($this->apellido_arrendador)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'apellido_arrendador', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'apellido_arrendador', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_apellido_arrendador_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_apellido_arrendador_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['id_vivienda'])) ? $this->New_label['id_vivienda'] : "Id Vivienda"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->id_vivienda))); 
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
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'id_vivienda', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'id_vivienda', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_id_vivienda_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_id_vivienda_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['telefono_arrendador'])) ? $this->New_label['telefono_arrendador'] : "Telefono Arrendador"; 
   $conteudo = trim(sc_strip_script($this->telefono_arrendador)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'telefono_arrendador', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'telefono_arrendador', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_telefono_arrendador_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_telefono_arrendador_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['nombres_referencia'])) ? $this->New_label['nombres_referencia'] : "Nombres Referencia"; 
   $conteudo = trim(sc_strip_script($this->nombres_referencia)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'nombres_referencia', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'nombres_referencia', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_nombres_referencia_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_nombres_referencia_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['apellidos_referencia'])) ? $this->New_label['apellidos_referencia'] : "Apellidos Referencia"; 
   $conteudo = trim(sc_strip_script($this->apellidos_referencia)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'apellidos_referencia', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'apellidos_referencia', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_apellidos_referencia_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_apellidos_referencia_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['parentesco'])) ? $this->New_label['parentesco'] : "Parentesco"; 
   $conteudo = trim(sc_strip_script($this->parentesco)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'parentesco', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'parentesco', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_parentesco_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_parentesco_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['celular_ref'])) ? $this->New_label['celular_ref'] : "Celular Ref"; 
   $conteudo = trim(sc_strip_script($this->celular_ref)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'celular_ref', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'celular_ref', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_celular_ref_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_celular_ref_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['telefono_convencional_ref'])) ? $this->New_label['telefono_convencional_ref'] : "Telefono Convencional Ref"; 
   $conteudo = trim(sc_strip_script($this->telefono_convencional_ref)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'telefono_convencional_ref', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'telefono_convencional_ref', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_telefono_convencional_ref_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_telefono_convencional_ref_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['id_ocupacion'])) ? $this->New_label['id_ocupacion'] : "Id Ocupacion"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->id_ocupacion))); 
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
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'id_ocupacion', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'id_ocupacion', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_id_ocupacion_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_id_ocupacion_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['fecha_ingreso_empresa'])) ? $this->New_label['fecha_ingreso_empresa'] : "Fecha Ingreso Empresa"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->fecha_ingreso_empresa))); 
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
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'fecha_ingreso_empresa', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'fecha_ingreso_empresa', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_fecha_ingreso_empresa_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_fecha_ingreso_empresa_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['nombre_empresa'])) ? $this->New_label['nombre_empresa'] : "Nombre Empresa"; 
   $conteudo = trim(sc_strip_script($this->nombre_empresa)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'nombre_empresa', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'nombre_empresa', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_nombre_empresa_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_nombre_empresa_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['ciudad_empresa'])) ? $this->New_label['ciudad_empresa'] : "Ciudad Empresa"; 
   $conteudo = trim(sc_strip_script($this->ciudad_empresa)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'ciudad_empresa', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'ciudad_empresa', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_ciudad_empresa_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_ciudad_empresa_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['provincia_empresa'])) ? $this->New_label['provincia_empresa'] : "Provincia Empresa"; 
   $conteudo = trim(sc_strip_script($this->provincia_empresa)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'provincia_empresa', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'provincia_empresa', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_provincia_empresa_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_provincia_empresa_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['direccion_empresa'])) ? $this->New_label['direccion_empresa'] : "Direccion Empresa"; 
   $conteudo = trim(sc_strip_script($this->direccion_empresa)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'direccion_empresa', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'direccion_empresa', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_direccion_empresa_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_direccion_empresa_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['cargo_empresa'])) ? $this->New_label['cargo_empresa'] : "Cargo Empresa"; 
   $conteudo = trim(sc_strip_script($this->cargo_empresa)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'cargo_empresa', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'cargo_empresa', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_cargo_empresa_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_cargo_empresa_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['telefono_empresa'])) ? $this->New_label['telefono_empresa'] : "Telefono Empresa"; 
   $conteudo = trim(sc_strip_script($this->telefono_empresa)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'telefono_empresa', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'telefono_empresa', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_telefono_empresa_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_telefono_empresa_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['ext_empresa'])) ? $this->New_label['ext_empresa'] : "Ext Empresa"; 
   $conteudo = trim(sc_strip_script($this->ext_empresa)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'ext_empresa', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'ext_empresa', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_ext_empresa_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_ext_empresa_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['id_tipo_contrato_actividad'])) ? $this->New_label['id_tipo_contrato_actividad'] : "Id Tipo Contrato Actividad"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->id_tipo_contrato_actividad))); 
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
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'id_tipo_contrato_actividad', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'id_tipo_contrato_actividad', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_id_tipo_contrato_actividad_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_id_tipo_contrato_actividad_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['empresa_jubilo_actividad'])) ? $this->New_label['empresa_jubilo_actividad'] : "Empresa Jubilo Actividad"; 
   $conteudo = trim(sc_strip_script($this->empresa_jubilo_actividad)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'empresa_jubilo_actividad', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'empresa_jubilo_actividad', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_empresa_jubilo_actividad_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_empresa_jubilo_actividad_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['fecha_salida_empresa_actividad'])) ? $this->New_label['fecha_salida_empresa_actividad'] : "Fecha Salida Empresa Actividad"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->fecha_salida_empresa_actividad))); 
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
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'fecha_salida_empresa_actividad', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'fecha_salida_empresa_actividad', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_fecha_salida_empresa_actividad_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_fecha_salida_empresa_actividad_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['cargo_salida_empresa_actividad'])) ? $this->New_label['cargo_salida_empresa_actividad'] : "Cargo Salida Empresa Actividad"; 
   $conteudo = trim(sc_strip_script($this->cargo_salida_empresa_actividad)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'cargo_salida_empresa_actividad', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'cargo_salida_empresa_actividad', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_cargo_salida_empresa_actividad_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_cargo_salida_empresa_actividad_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['fecha_inicio_actividad'])) ? $this->New_label['fecha_inicio_actividad'] : "Fecha Inicio Actividad"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->fecha_inicio_actividad))); 
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
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'fecha_inicio_actividad', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'fecha_inicio_actividad', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_fecha_inicio_actividad_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_fecha_inicio_actividad_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['fecha_ingreso_empresa_actividad'])) ? $this->New_label['fecha_ingreso_empresa_actividad'] : "Fecha Ingreso Empresa Actividad"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->fecha_ingreso_empresa_actividad))); 
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
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'fecha_ingreso_empresa_actividad', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'fecha_ingreso_empresa_actividad', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_fecha_ingreso_empresa_actividad_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_fecha_ingreso_empresa_actividad_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['nombre_empresa_actividad'])) ? $this->New_label['nombre_empresa_actividad'] : "Nombre Empresa Actividad"; 
   $conteudo = trim(sc_strip_script($this->nombre_empresa_actividad)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'nombre_empresa_actividad', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'nombre_empresa_actividad', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_nombre_empresa_actividad_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_nombre_empresa_actividad_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['institucion_actividad'])) ? $this->New_label['institucion_actividad'] : "Institucion Actividad"; 
   $conteudo = trim(sc_strip_script($this->institucion_actividad)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'institucion_actividad', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'institucion_actividad', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_institucion_actividad_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_institucion_actividad_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['ciudad_actividad'])) ? $this->New_label['ciudad_actividad'] : "Ciudad Actividad"; 
   $conteudo = trim(sc_strip_script($this->ciudad_actividad)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'ciudad_actividad', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'ciudad_actividad', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_ciudad_actividad_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_ciudad_actividad_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['provincia_actividad'])) ? $this->New_label['provincia_actividad'] : "Provincia Actividad"; 
   $conteudo = trim(sc_strip_script($this->provincia_actividad)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'provincia_actividad', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'provincia_actividad', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_provincia_actividad_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_provincia_actividad_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['direccion_actividad'])) ? $this->New_label['direccion_actividad'] : "Direccion Actividad"; 
   $conteudo = trim(sc_strip_script($this->direccion_actividad)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'direccion_actividad', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'direccion_actividad', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_direccion_actividad_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_direccion_actividad_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['calle_principal_actividad'])) ? $this->New_label['calle_principal_actividad'] : "Calle Principal Actividad"; 
   $conteudo = trim(sc_strip_script($this->calle_principal_actividad)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'calle_principal_actividad', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'calle_principal_actividad', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_calle_principal_actividad_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_calle_principal_actividad_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['no_actividad'])) ? $this->New_label['no_actividad'] : "No Actividad"; 
   $conteudo = trim(sc_strip_script($this->no_actividad)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'no_actividad', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'no_actividad', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_no_actividad_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_no_actividad_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['calle_secundaria_actividad'])) ? $this->New_label['calle_secundaria_actividad'] : "Calle Secundaria Actividad"; 
   $conteudo = trim(sc_strip_script($this->calle_secundaria_actividad)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'calle_secundaria_actividad', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'calle_secundaria_actividad', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_calle_secundaria_actividad_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_calle_secundaria_actividad_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['sector_actividad'])) ? $this->New_label['sector_actividad'] : "Sector Actividad"; 
   $conteudo = trim(sc_strip_script($this->sector_actividad)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'sector_actividad', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'sector_actividad', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_sector_actividad_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_sector_actividad_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['pais_actividad'])) ? $this->New_label['pais_actividad'] : "Pais Actividad"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->pais_actividad))); 
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
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'pais_actividad', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'pais_actividad', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_pais_actividad_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_pais_actividad_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['actividad'])) ? $this->New_label['actividad'] : "Actividad"; 
   $conteudo = trim(sc_strip_script($this->actividad)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'actividad', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'actividad', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_actividad_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_actividad_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['telefono_actividad'])) ? $this->New_label['telefono_actividad'] : "Telefono Actividad"; 
   $conteudo = trim(sc_strip_script($this->telefono_actividad)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'telefono_actividad', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'telefono_actividad', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_telefono_actividad_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_telefono_actividad_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['cargo_actividad'])) ? $this->New_label['cargo_actividad'] : "Cargo Actividad"; 
   $conteudo = trim(sc_strip_script($this->cargo_actividad)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'cargo_actividad', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'cargo_actividad', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_cargo_actividad_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_cargo_actividad_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['ext_actividad'])) ? $this->New_label['ext_actividad'] : "Ext Actividad"; 
   $conteudo = trim(sc_strip_script($this->ext_actividad)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'ext_actividad', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'ext_actividad', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_ext_actividad_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_ext_actividad_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['fecha_ingreso_empresa_actividad2'])) ? $this->New_label['fecha_ingreso_empresa_actividad2'] : "Fecha Ingreso Empresa Actividad 2"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->fecha_ingreso_empresa_actividad2))); 
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
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'fecha_ingreso_empresa_actividad2', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'fecha_ingreso_empresa_actividad2', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_fecha_ingreso_empresa_actividad2_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_fecha_ingreso_empresa_actividad2_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['nombre_empresa_actividad2'])) ? $this->New_label['nombre_empresa_actividad2'] : "Nombre Empresa Actividad 2"; 
   $conteudo = trim(sc_strip_script($this->nombre_empresa_actividad2)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'nombre_empresa_actividad2', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'nombre_empresa_actividad2', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_nombre_empresa_actividad2_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_nombre_empresa_actividad2_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['institucion_actividad2'])) ? $this->New_label['institucion_actividad2'] : "Institucion Actividad 2"; 
   $conteudo = trim(sc_strip_script($this->institucion_actividad2)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'institucion_actividad2', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'institucion_actividad2', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_institucion_actividad2_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_institucion_actividad2_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['ciudad_actividad2'])) ? $this->New_label['ciudad_actividad2'] : "Ciudad Actividad 2"; 
   $conteudo = trim(sc_strip_script($this->ciudad_actividad2)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'ciudad_actividad2', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'ciudad_actividad2', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_ciudad_actividad2_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_ciudad_actividad2_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['provincia_actividad2'])) ? $this->New_label['provincia_actividad2'] : "Provincia Actividad 2"; 
   $conteudo = trim(sc_strip_script($this->provincia_actividad2)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'provincia_actividad2', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'provincia_actividad2', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_provincia_actividad2_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_provincia_actividad2_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['direccion_actividad2'])) ? $this->New_label['direccion_actividad2'] : "Direccion Actividad 2"; 
   $conteudo = trim(sc_strip_script($this->direccion_actividad2)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'direccion_actividad2', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'direccion_actividad2', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_direccion_actividad2_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_direccion_actividad2_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['calle_principal_actividad2'])) ? $this->New_label['calle_principal_actividad2'] : "Calle Principal Actividad 2"; 
   $conteudo = trim(sc_strip_script($this->calle_principal_actividad2)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'calle_principal_actividad2', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'calle_principal_actividad2', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_calle_principal_actividad2_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_calle_principal_actividad2_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['no_actividad2'])) ? $this->New_label['no_actividad2'] : "No Actividad 2"; 
   $conteudo = trim(sc_strip_script($this->no_actividad2)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'no_actividad2', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'no_actividad2', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_no_actividad2_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_no_actividad2_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['calle_secundaria_actividad2'])) ? $this->New_label['calle_secundaria_actividad2'] : "Calle Secundaria Actividad 2"; 
   $conteudo = trim(sc_strip_script($this->calle_secundaria_actividad2)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'calle_secundaria_actividad2', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'calle_secundaria_actividad2', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_calle_secundaria_actividad2_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_calle_secundaria_actividad2_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['sector_actividad2'])) ? $this->New_label['sector_actividad2'] : "Sector Actividad 2"; 
   $conteudo = trim(sc_strip_script($this->sector_actividad2)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'sector_actividad2', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'sector_actividad2', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_sector_actividad2_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_sector_actividad2_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['fecha_salida_empresa_actividad2'])) ? $this->New_label['fecha_salida_empresa_actividad2'] : "Fecha Salida Empresa Actividad 2"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->fecha_salida_empresa_actividad2))); 
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
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'fecha_salida_empresa_actividad2', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'fecha_salida_empresa_actividad2', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_fecha_salida_empresa_actividad2_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_fecha_salida_empresa_actividad2_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['fecha_inicio_actividad2'])) ? $this->New_label['fecha_inicio_actividad2'] : "Fecha Inicio Actividad 2"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->fecha_inicio_actividad2))); 
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
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'fecha_inicio_actividad2', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'fecha_inicio_actividad2', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_fecha_inicio_actividad2_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_fecha_inicio_actividad2_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['actividad2'])) ? $this->New_label['actividad2'] : "Actividad 2"; 
   $conteudo = trim(sc_strip_script($this->actividad2)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'actividad2', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'actividad2', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_actividad2_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_actividad2_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['telefono_actividad2'])) ? $this->New_label['telefono_actividad2'] : "Telefono Actividad 2"; 
   $conteudo = trim(sc_strip_script($this->telefono_actividad2)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'telefono_actividad2', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'telefono_actividad2', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_telefono_actividad2_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_telefono_actividad2_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['ext_actividad2'])) ? $this->New_label['ext_actividad2'] : "Ext Actividad 2"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->ext_actividad2))); 
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
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'ext_actividad2', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'ext_actividad2', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_ext_actividad2_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_ext_actividad2_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['cargo_actividad2'])) ? $this->New_label['cargo_actividad2'] : "Cargo Actividad 2"; 
   $conteudo = trim(sc_strip_script($this->cargo_actividad2)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'cargo_actividad2', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'cargo_actividad2', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_cargo_actividad2_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_cargo_actividad2_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['id_tipo_contrato_actividad2'])) ? $this->New_label['id_tipo_contrato_actividad2'] : "Id Tipo Contrato Actividad 2"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->id_tipo_contrato_actividad2))); 
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
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'id_tipo_contrato_actividad2', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'id_tipo_contrato_actividad2', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_id_tipo_contrato_actividad2_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_id_tipo_contrato_actividad2_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['empresa_jubilo_actividad2'])) ? $this->New_label['empresa_jubilo_actividad2'] : "Empresa Jubilo Actividad 2"; 
   $conteudo = trim(sc_strip_script($this->empresa_jubilo_actividad2)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'empresa_jubilo_actividad2', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'empresa_jubilo_actividad2', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_empresa_jubilo_actividad2_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_empresa_jubilo_actividad2_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['sueldo'])) ? $this->New_label['sueldo'] : "Sueldo"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->sueldo))); 
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
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'sueldo', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'sueldo', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_sueldo_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_sueldo_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['arriendos'])) ? $this->New_label['arriendos'] : "Arriendos"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->arriendos))); 
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
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'arriendos', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'arriendos', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_arriendos_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_arriendos_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['dividendo_utilidades_ultimo_ano'])) ? $this->New_label['dividendo_utilidades_ultimo_ano'] : "Dividendo Utilidades Ultimo Ano"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->dividendo_utilidades_ultimo_ano))); 
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
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'dividendo_utilidades_ultimo_ano', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'dividendo_utilidades_ultimo_ano', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_dividendo_utilidades_ultimo_ano_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_dividendo_utilidades_ultimo_ano_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['id_otros_ingresos'])) ? $this->New_label['id_otros_ingresos'] : "Id Otros Ingresos"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->id_otros_ingresos))); 
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
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'id_otros_ingresos', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'id_otros_ingresos', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_id_otros_ingresos_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_id_otros_ingresos_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['arriendo_hipoteca'])) ? $this->New_label['arriendo_hipoteca'] : "Arriendo Hipoteca"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->arriendo_hipoteca))); 
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
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'arriendo_hipoteca', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'arriendo_hipoteca', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_arriendo_hipoteca_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_arriendo_hipoteca_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['prestamos'])) ? $this->New_label['prestamos'] : "Prestamos"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->prestamos))); 
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
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'prestamos', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'prestamos', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_prestamos_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_prestamos_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['tarjetas_creditos'])) ? $this->New_label['tarjetas_creditos'] : "Tarjetas Creditos"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->tarjetas_creditos))); 
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
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'tarjetas_creditos', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'tarjetas_creditos', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_tarjetas_creditos_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_tarjetas_creditos_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['gastos_familiares'])) ? $this->New_label['gastos_familiares'] : "Gastos Familiares"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->gastos_familiares))); 
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
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'gastos_familiares', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'gastos_familiares', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_gastos_familiares_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_gastos_familiares_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['id_otros_gastos'])) ? $this->New_label['id_otros_gastos'] : "Id Otros Gastos"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->id_otros_gastos))); 
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
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'id_otros_gastos', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'id_otros_gastos', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_id_otros_gastos_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_id_otros_gastos_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['depositos_bancos'])) ? $this->New_label['depositos_bancos'] : "Depositos Bancos"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->depositos_bancos))); 
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
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'depositos_bancos', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'depositos_bancos', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_depositos_bancos_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_depositos_bancos_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['cuentas_documentos'])) ? $this->New_label['cuentas_documentos'] : "Cuentas Documentos"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->cuentas_documentos))); 
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
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'cuentas_documentos', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'cuentas_documentos', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_cuentas_documentos_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_cuentas_documentos_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['mercaderias'])) ? $this->New_label['mercaderias'] : "Mercaderias"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->mercaderias))); 
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
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'mercaderias', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'mercaderias', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_mercaderias_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_mercaderias_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['maquinarias_vehiculos'])) ? $this->New_label['maquinarias_vehiculos'] : "Maquinarias Vehiculos"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->maquinarias_vehiculos))); 
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
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'maquinarias_vehiculos', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'maquinarias_vehiculos', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_maquinarias_vehiculos_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_maquinarias_vehiculos_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['terrenos_edificios'])) ? $this->New_label['terrenos_edificios'] : "Terrenos Edificios"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->terrenos_edificios))); 
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
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'terrenos_edificios', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'terrenos_edificios', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_terrenos_edificios_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_terrenos_edificios_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['acciones_bonos_cedulas'])) ? $this->New_label['acciones_bonos_cedulas'] : "Acciones Bonos Cedulas"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->acciones_bonos_cedulas))); 
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
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'acciones_bonos_cedulas', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'acciones_bonos_cedulas', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_acciones_bonos_cedulas_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_acciones_bonos_cedulas_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['id_otros_activos'])) ? $this->New_label['id_otros_activos'] : "Id Otros Activos"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->id_otros_activos))); 
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
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'id_otros_activos', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'id_otros_activos', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_id_otros_activos_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_id_otros_activos_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['cuentas_por_pagar'])) ? $this->New_label['cuentas_por_pagar'] : "Cuentas Por Pagar"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->cuentas_por_pagar))); 
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
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'cuentas_por_pagar', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'cuentas_por_pagar', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_cuentas_por_pagar_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_cuentas_por_pagar_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['prestamos_banco_menos_ano'])) ? $this->New_label['prestamos_banco_menos_ano'] : "Prestamos Banco Menos Ano"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->prestamos_banco_menos_ano))); 
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
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'prestamos_banco_menos_ano', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'prestamos_banco_menos_ano', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_prestamos_banco_menos_ano_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_prestamos_banco_menos_ano_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['prestamos_banco_mas_ano'])) ? $this->New_label['prestamos_banco_mas_ano'] : "Prestamos Banco Mas Ano"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->prestamos_banco_mas_ano))); 
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
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'prestamos_banco_mas_ano', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'prestamos_banco_mas_ano', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_prestamos_banco_mas_ano_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_prestamos_banco_mas_ano_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['deudas_tarjetas_creditos'])) ? $this->New_label['deudas_tarjetas_creditos'] : "Deudas Tarjetas Creditos"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->deudas_tarjetas_creditos))); 
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
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'deudas_tarjetas_creditos', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'deudas_tarjetas_creditos', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_deudas_tarjetas_creditos_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_deudas_tarjetas_creditos_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['id_otras_obligaciones'])) ? $this->New_label['id_otras_obligaciones'] : "Id Otras Obligaciones"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->id_otras_obligaciones))); 
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
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'id_otras_obligaciones', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'id_otras_obligaciones', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_id_otras_obligaciones_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_id_otras_obligaciones_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['deudor'])) ? $this->New_label['deudor'] : "Deudor"; 
   $conteudo = trim(sc_strip_script($this->deudor)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'deudor', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'deudor', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_deudor_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_deudor_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['monto'])) ? $this->New_label['monto'] : "Monto"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->monto))); 
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
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'monto', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'monto', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_monto_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_monto_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['descripcion'])) ? $this->New_label['descripcion'] : "Descripcion"; 
   $conteudo = trim(sc_strip_script($this->descripcion)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'descripcion', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'descripcion', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_descripcion_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_descripcion_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['placa'])) ? $this->New_label['placa'] : "Placa"; 
   $conteudo = trim(sc_strip_script($this->placa)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'placa', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'placa', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_placa_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_placa_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['valor_maquinaria_vehiculo'])) ? $this->New_label['valor_maquinaria_vehiculo'] : "Valor Maquinaria Vehiculo"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->valor_maquinaria_vehiculo))); 
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
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'valor_maquinaria_vehiculo', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'valor_maquinaria_vehiculo', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_valor_maquinaria_vehiculo_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_valor_maquinaria_vehiculo_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['a_nombre_de'])) ? $this->New_label['a_nombre_de'] : "A Nombre De"; 
   $conteudo = trim(sc_strip_script($this->a_nombre_de)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'a_nombre_de', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'a_nombre_de', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_a_nombre_de_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_a_nombre_de_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['ubicacion'])) ? $this->New_label['ubicacion'] : "Ubicacion"; 
   $conteudo = trim(sc_strip_script($this->ubicacion)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'ubicacion', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'ubicacion', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_ubicacion_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_ubicacion_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['valor_propiedad'])) ? $this->New_label['valor_propiedad'] : "Valor Propiedad"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->valor_propiedad))); 
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
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'valor_propiedad', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'valor_propiedad', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_valor_propiedad_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_valor_propiedad_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['empresa'])) ? $this->New_label['empresa'] : "Empresa"; 
   $conteudo = trim(sc_strip_script($this->empresa)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'empresa', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'empresa', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_empresa_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_empresa_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['valor_mercado'])) ? $this->New_label['valor_mercado'] : "Valor Mercado"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->valor_mercado))); 
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
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'valor_mercado', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'valor_mercado', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_valor_mercado_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_valor_mercado_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['institucion_bancaria'])) ? $this->New_label['institucion_bancaria'] : "Institucion Bancaria"; 
   $conteudo = trim(sc_strip_script($this->institucion_bancaria)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'institucion_bancaria', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'institucion_bancaria', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_institucion_bancaria_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_institucion_bancaria_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['monto_banco'])) ? $this->New_label['monto_banco'] : "Monto Banco"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->monto_banco))); 
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
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'monto_banco', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'monto_banco', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_monto_banco_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_monto_banco_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['institucion_finaciera'])) ? $this->New_label['institucion_finaciera'] : "Institucion Finaciera"; 
   $conteudo = trim(sc_strip_script($this->institucion_finaciera)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'institucion_finaciera', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'institucion_finaciera', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_institucion_finaciera_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_institucion_finaciera_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['monto_institucion_finaciera'])) ? $this->New_label['monto_institucion_finaciera'] : "Monto Institucion Finaciera"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->monto_institucion_finaciera))); 
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
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'monto_institucion_finaciera', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'monto_institucion_finaciera', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_monto_institucion_finaciera_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_monto_institucion_finaciera_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['id_cliente_juridico'])) ? $this->New_label['id_cliente_juridico'] : "Id Cliente Juridico"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->id_cliente_juridico))); 
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
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'id_cliente_juridico', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'id_cliente_juridico', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_id_cliente_juridico_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_id_cliente_juridico_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['nombre_completo_empresa'])) ? $this->New_label['nombre_completo_empresa'] : "Nombre Completo Empresa"; 
   $conteudo = trim(sc_strip_script($this->nombre_completo_empresa)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'nombre_completo_empresa', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'nombre_completo_empresa', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_nombre_completo_empresa_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_nombre_completo_empresa_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['es_empresa_extranjera'])) ? $this->New_label['es_empresa_extranjera'] : "Es Empresa Extranjera"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->es_empresa_extranjera))); 
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
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'es_empresa_extranjera', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'es_empresa_extranjera', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_es_empresa_extranjera_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_es_empresa_extranjera_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['pais_empresa'])) ? $this->New_label['pais_empresa'] : "Pais Empresa"; 
   $conteudo = trim(sc_strip_script($this->pais_empresa)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'pais_empresa', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'pais_empresa', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_pais_empresa_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_pais_empresa_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['fecha_constitucion_empresa'])) ? $this->New_label['fecha_constitucion_empresa'] : "Fecha Constitucion Empresa"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->fecha_constitucion_empresa))); 
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
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'fecha_constitucion_empresa', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'fecha_constitucion_empresa', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_fecha_constitucion_empresa_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_fecha_constitucion_empresa_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['id_oficina'])) ? $this->New_label['id_oficina'] : "Id Oficina"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->id_oficina))); 
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
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'id_oficina', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'id_oficina', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_id_oficina_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_id_oficina_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['id_tipo_actividad'])) ? $this->New_label['id_tipo_actividad'] : "Id Tipo Actividad"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->id_tipo_actividad))); 
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
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'id_tipo_actividad', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'id_tipo_actividad', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_id_tipo_actividad_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_id_tipo_actividad_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['especifique_otros'])) ? $this->New_label['especifique_otros'] : "Especifique Otros"; 
   $conteudo = trim(sc_strip_script($this->especifique_otros)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'especifique_otros', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'especifique_otros', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_especifique_otros_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_especifique_otros_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['direccion_correspondencia'])) ? $this->New_label['direccion_correspondencia'] : "Direccion Correspondencia"; 
   $conteudo = trim(sc_strip_script($this->direccion_correspondencia)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'direccion_correspondencia', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'direccion_correspondencia', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_direccion_correspondencia_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_direccion_correspondencia_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['calle_principal_correspondencia'])) ? $this->New_label['calle_principal_correspondencia'] : "Calle Principal Correspondencia"; 
   $conteudo = trim(sc_strip_script($this->calle_principal_correspondencia)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'calle_principal_correspondencia', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'calle_principal_correspondencia', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_calle_principal_correspondencia_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_calle_principal_correspondencia_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['no_correspondencia'])) ? $this->New_label['no_correspondencia'] : "No Correspondencia"; 
   $conteudo = trim(sc_strip_script($this->no_correspondencia)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'no_correspondencia', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'no_correspondencia', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_no_correspondencia_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_no_correspondencia_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['calle_secundaria_correspondencia'])) ? $this->New_label['calle_secundaria_correspondencia'] : "Calle Secundaria Correspondencia"; 
   $conteudo = trim(sc_strip_script($this->calle_secundaria_correspondencia)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'calle_secundaria_correspondencia', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'calle_secundaria_correspondencia', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_calle_secundaria_correspondencia_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_calle_secundaria_correspondencia_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['id_ciudad_correspondencia'])) ? $this->New_label['id_ciudad_correspondencia'] : "Id Ciudad Correspondencia"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->id_ciudad_correspondencia))); 
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
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'id_ciudad_correspondencia', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'id_ciudad_correspondencia', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_id_ciudad_correspondencia_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_id_ciudad_correspondencia_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['nombre_empresa_solicitante'])) ? $this->New_label['nombre_empresa_solicitante'] : "Nombre Empresa Solicitante"; 
   $conteudo = trim(sc_strip_script($this->nombre_empresa_solicitante)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'nombre_empresa_solicitante', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'nombre_empresa_solicitante', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_nombre_empresa_solicitante_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_nombre_empresa_solicitante_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['cargo_empresa_solicitante'])) ? $this->New_label['cargo_empresa_solicitante'] : "Cargo Empresa Solicitante"; 
   $conteudo = trim(sc_strip_script($this->cargo_empresa_solicitante)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'cargo_empresa_solicitante', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'cargo_empresa_solicitante', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_cargo_empresa_solicitante_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_cargo_empresa_solicitante_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['celular_empresa_solicitante'])) ? $this->New_label['celular_empresa_solicitante'] : "Celular Empresa Solicitante"; 
   $conteudo = trim(sc_strip_script($this->celular_empresa_solicitante)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'celular_empresa_solicitante', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'celular_empresa_solicitante', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_celular_empresa_solicitante_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_celular_empresa_solicitante_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['telefono_empresa_solicitante'])) ? $this->New_label['telefono_empresa_solicitante'] : "Telefono Empresa Solicitante"; 
   $conteudo = trim(sc_strip_script($this->telefono_empresa_solicitante)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'telefono_empresa_solicitante', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'telefono_empresa_solicitante', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_telefono_empresa_solicitante_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_telefono_empresa_solicitante_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['mail_empresa_solicitante'])) ? $this->New_label['mail_empresa_solicitante'] : "Mail Empresa Solicitante"; 
   $conteudo = trim(sc_strip_script($this->mail_empresa_solicitante)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'mail_empresa_solicitante', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'mail_empresa_solicitante', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_mail_empresa_solicitante_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_mail_empresa_solicitante_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['saldo_empresa_solicitante'])) ? $this->New_label['saldo_empresa_solicitante'] : "Saldo Empresa Solicitante"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->saldo_empresa_solicitante))); 
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
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'saldo_empresa_solicitante', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'saldo_empresa_solicitante', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_saldo_empresa_solicitante_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_saldo_empresa_solicitante_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['nombre_referencia_comerciales'])) ? $this->New_label['nombre_referencia_comerciales'] : "Nombre Referencia Comerciales"; 
   $conteudo = trim(sc_strip_script($this->nombre_referencia_comerciales)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'nombre_referencia_comerciales', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'nombre_referencia_comerciales', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_nombre_referencia_comerciales_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_nombre_referencia_comerciales_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['fecha_compra'])) ? $this->New_label['fecha_compra'] : "Fecha Compra"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->fecha_compra))); 
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
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'fecha_compra', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'fecha_compra', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_fecha_compra_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_fecha_compra_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['telefono_referencia_comerciales'])) ? $this->New_label['telefono_referencia_comerciales'] : "Telefono Referencia Comerciales"; 
   $conteudo = trim(sc_strip_script($this->telefono_referencia_comerciales)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'telefono_referencia_comerciales', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'telefono_referencia_comerciales', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_telefono_referencia_comerciales_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_telefono_referencia_comerciales_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['ventas'])) ? $this->New_label['ventas'] : "Ventas"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->ventas))); 
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
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'ventas', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'ventas', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_ventas_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_ventas_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['comisiones'])) ? $this->New_label['comisiones'] : "Comisiones"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->comisiones))); 
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
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'comisiones', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'comisiones', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_comisiones_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_comisiones_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['gastos_operativos'])) ? $this->New_label['gastos_operativos'] : "Gastos Operativos"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->gastos_operativos))); 
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
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'gastos_operativos', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'gastos_operativos', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_gastos_operativos_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_gastos_operativos_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['gastos_administrativos'])) ? $this->New_label['gastos_administrativos'] : "Gastos Administrativos"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->gastos_administrativos))); 
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
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'gastos_administrativos', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'gastos_administrativos', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_gastos_administrativos_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_gastos_administrativos_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['pago_cuotas_prestamo'])) ? $this->New_label['pago_cuotas_prestamo'] : "Pago Cuotas Prestamo"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->pago_cuotas_prestamo))); 
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
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'pago_cuotas_prestamo', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'pago_cuotas_prestamo', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_pago_cuotas_prestamo_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_pago_cuotas_prestamo_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['funcionario'])) ? $this->New_label['funcionario'] : "Funcionario"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->funcionario))); 
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
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'funcionario', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'funcionario', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_funcionario_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_funcionario_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['funcionario_detalle'])) ? $this->New_label['funcionario_detalle'] : "Funcionario Detalle"; 
   $conteudo = trim(sc_strip_script($this->funcionario_detalle)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'funcionario_detalle', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'funcionario_detalle', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_funcionario_detalle_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_funcionario_detalle_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['miembro_politico'])) ? $this->New_label['miembro_politico'] : "Miembro Politico"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->miembro_politico))); 
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
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'miembro_politico', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'miembro_politico', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_miembro_politico_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_miembro_politico_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['miembro_politico_detalle'])) ? $this->New_label['miembro_politico_detalle'] : "Miembro Politico Detalle"; 
   $conteudo = trim(sc_strip_script($this->miembro_politico_detalle)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'miembro_politico_detalle', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'miembro_politico_detalle', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_miembro_politico_detalle_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_miembro_politico_detalle_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['ejecutivo_gobierno'])) ? $this->New_label['ejecutivo_gobierno'] : "Ejecutivo Gobierno"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->ejecutivo_gobierno))); 
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
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'ejecutivo_gobierno', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'ejecutivo_gobierno', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_ejecutivo_gobierno_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_ejecutivo_gobierno_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['ejecutivo_gobierno_detalle'])) ? $this->New_label['ejecutivo_gobierno_detalle'] : "Ejecutivo Gobierno Detalle"; 
   $conteudo = trim(sc_strip_script($this->ejecutivo_gobierno_detalle)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'ejecutivo_gobierno_detalle', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'ejecutivo_gobierno_detalle', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_ejecutivo_gobierno_detalle_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_ejecutivo_gobierno_detalle_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['familiar_gobierno'])) ? $this->New_label['familiar_gobierno'] : "Familiar Gobierno"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->familiar_gobierno))); 
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
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'familiar_gobierno', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'familiar_gobierno', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_familiar_gobierno_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_familiar_gobierno_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['familiar_gobierno_detalle'])) ? $this->New_label['familiar_gobierno_detalle'] : "Familiar Gobierno Detalle"; 
   $conteudo = trim(sc_strip_script($this->familiar_gobierno_detalle)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'familiar_gobierno_detalle', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'familiar_gobierno_detalle', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_familiar_gobierno_detalle_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_familiar_gobierno_detalle_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['familiar_gobierno_detalle_quien'])) ? $this->New_label['familiar_gobierno_detalle_quien'] : "Familiar Gobierno Detalle Quien"; 
   $conteudo = trim(sc_strip_script($this->familiar_gobierno_detalle_quien)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'familiar_gobierno_detalle_quien', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'familiar_gobierno_detalle_quien', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_familiar_gobierno_detalle_quien_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_familiar_gobierno_detalle_quien_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['otros_ingresos'])) ? $this->New_label['otros_ingresos'] : "Otros Ingresos"; 
   $conteudo = trim(sc_strip_script($this->otros_ingresos)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'otros_ingresos', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'otros_ingresos', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_otros_ingresos_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_otros_ingresos_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['otros_gastos'])) ? $this->New_label['otros_gastos'] : "Otros Gastos"; 
   $conteudo = trim(sc_strip_script($this->otros_gastos)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'otros_gastos', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'otros_gastos', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_otros_gastos_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_otros_gastos_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['otros_activos'])) ? $this->New_label['otros_activos'] : "Otros Activos"; 
   $conteudo = trim(sc_strip_script($this->otros_activos)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'otros_activos', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'otros_activos', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_otros_activos_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_otros_activos_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['otras_obligaciones'])) ? $this->New_label['otras_obligaciones'] : "Otras Obligaciones"; 
   $conteudo = trim(sc_strip_script($this->otras_obligaciones)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'otras_obligaciones', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'otras_obligaciones', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_otras_obligaciones_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_otras_obligaciones_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['sector_direccion_empresa'])) ? $this->New_label['sector_direccion_empresa'] : "Sector Direccion Empresa"; 
   $conteudo = trim(sc_strip_script($this->sector_direccion_empresa)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'sector_direccion_empresa', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'sector_direccion_empresa', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_sector_direccion_empresa_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_sector_direccion_empresa_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['sector_direccion_empresa_correo'])) ? $this->New_label['sector_direccion_empresa_correo'] : "Sector Direccion Empresa Correo"; 
   $conteudo = trim(sc_strip_script($this->sector_direccion_empresa_correo)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'sector_direccion_empresa_correo', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'sector_direccion_empresa_correo', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_sector_direccion_empresa_correo_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_sector_direccion_empresa_correo_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['extranjero_nombres_referencia'])) ? $this->New_label['extranjero_nombres_referencia'] : "Extranjero Nombres Referencia"; 
   $conteudo = trim(sc_strip_script($this->extranjero_nombres_referencia)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'extranjero_nombres_referencia', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'extranjero_nombres_referencia', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_extranjero_nombres_referencia_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_extranjero_nombres_referencia_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['extranjero_apellidos_referencia'])) ? $this->New_label['extranjero_apellidos_referencia'] : "Extranjero Apellidos Referencia"; 
   $conteudo = trim(sc_strip_script($this->extranjero_apellidos_referencia)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'extranjero_apellidos_referencia', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'extranjero_apellidos_referencia', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_extranjero_apellidos_referencia_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_extranjero_apellidos_referencia_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['extranjero_parentesco'])) ? $this->New_label['extranjero_parentesco'] : "Extranjero Parentesco"; 
   $conteudo = trim(sc_strip_script($this->extranjero_parentesco)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'extranjero_parentesco', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'extranjero_parentesco', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_extranjero_parentesco_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_extranjero_parentesco_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['extranjero_celular_ref'])) ? $this->New_label['extranjero_celular_ref'] : "Extranjero Celular Ref"; 
   $conteudo = trim(sc_strip_script($this->extranjero_celular_ref)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'extranjero_celular_ref', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'extranjero_celular_ref', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_extranjero_celular_ref_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_extranjero_celular_ref_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['extranjero_telefono_convencional_ref'])) ? $this->New_label['extranjero_telefono_convencional_ref'] : "Extranjero Telefono Convencional Ref"; 
   $conteudo = trim(sc_strip_script($this->extranjero_telefono_convencional_ref)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'extranjero_telefono_convencional_ref', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'extranjero_telefono_convencional_ref', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_extranjero_telefono_convencional_ref_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_extranjero_telefono_convencional_ref_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['cargo_representante_legal'])) ? $this->New_label['cargo_representante_legal'] : "Cargo Representante Legal"; 
   $conteudo = trim(sc_strip_script($this->cargo_representante_legal)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'cargo_representante_legal', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'cargo_representante_legal', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_cargo_representante_legal_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_cargo_representante_legal_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['direccion_extranjero'])) ? $this->New_label['direccion_extranjero'] : "Direccion Extranjero"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->direccion_extranjero))); 
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
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'direccion_extranjero', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'direccion_extranjero', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_direccion_extranjero_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_direccion_extranjero_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['relacion_dependencia_principal'])) ? $this->New_label['relacion_dependencia_principal'] : "Relacion Dependencia Principal"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->relacion_dependencia_principal))); 
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
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'relacion_dependencia_principal', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'relacion_dependencia_principal', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_relacion_dependencia_principal_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_relacion_dependencia_principal_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['correo_corporativo_principal'])) ? $this->New_label['correo_corporativo_principal'] : "Correo Corporativo Principal"; 
   $conteudo = trim(sc_strip_script($this->correo_corporativo_principal)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'correo_corporativo_principal', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'correo_corporativo_principal', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_correo_corporativo_principal_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_correo_corporativo_principal_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['relacion_dependencia_secundaria'])) ? $this->New_label['relacion_dependencia_secundaria'] : "Relacion Dependencia Secundaria"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->relacion_dependencia_secundaria))); 
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
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'relacion_dependencia_secundaria', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'relacion_dependencia_secundaria', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_relacion_dependencia_secundaria_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_relacion_dependencia_secundaria_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['correo_corporativo_secundario'])) ? $this->New_label['correo_corporativo_secundario'] : "Correo Corporativo Secundario"; 
   $conteudo = trim(sc_strip_script($this->correo_corporativo_secundario)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'correo_corporativo_secundario', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'correo_corporativo_secundario', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_correo_corporativo_secundario_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_correo_corporativo_secundario_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['actividad_secundaria'])) ? $this->New_label['actividad_secundaria'] : "Actividad Secundaria"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->actividad_secundaria))); 
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
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'actividad_secundaria', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'actividad_secundaria', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_actividad_secundaria_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_actividad_secundaria_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['id_pais_empresa'])) ? $this->New_label['id_pais_empresa'] : "Id Pais Empresa"; 
   $conteudo = trim(sc_strip_script($this->id_pais_empresa)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'id_pais_empresa', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'id_pais_empresa', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_id_pais_empresa_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_id_pais_empresa_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['id_provincia_empresa'])) ? $this->New_label['id_provincia_empresa'] : "Id Provincia Empresa"; 
   $conteudo = trim(sc_strip_script($this->id_provincia_empresa)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'id_provincia_empresa', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'id_provincia_empresa', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_id_provincia_empresa_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_id_provincia_empresa_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['id_pais_correo'])) ? $this->New_label['id_pais_correo'] : "Id Pais Correo"; 
   $conteudo = trim(sc_strip_script($this->id_pais_correo)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'id_pais_correo', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'id_pais_correo', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_id_pais_correo_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_id_pais_correo_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['id_provincia_correo'])) ? $this->New_label['id_provincia_correo'] : "Id Provincia Correo"; 
   $conteudo = trim(sc_strip_script($this->id_provincia_correo)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'id_provincia_correo', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'id_provincia_correo', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_id_provincia_correo_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_id_provincia_correo_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['apellido_empresa_solicitante'])) ? $this->New_label['apellido_empresa_solicitante'] : "Apellido Empresa Solicitante"; 
   $conteudo = trim(sc_strip_script($this->apellido_empresa_solicitante)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'apellido_empresa_solicitante', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'apellido_empresa_solicitante', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_apellido_empresa_solicitante_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_apellido_empresa_solicitante_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['pais_actividad2'])) ? $this->New_label['pais_actividad2'] : "Pais Actividad 2"; 
   $conteudo = trim(sc_strip_script($this->pais_actividad2)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'pais_actividad2', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'pais_actividad2', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_pais_actividad2_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_pais_actividad2_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['id_provincia_exterior'])) ? $this->New_label['id_provincia_exterior'] : "Id Provincia Exterior"; 
   $conteudo = trim(sc_strip_script($this->id_provincia_exterior)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'id_provincia_exterior', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'id_provincia_exterior', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_id_provincia_exterior_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_id_provincia_exterior_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['pais_independiente'])) ? $this->New_label['pais_independiente'] : "Pais Independiente"; 
   $conteudo = trim(sc_strip_script($this->pais_independiente)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'pais_independiente', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'pais_independiente', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_pais_independiente_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_pais_independiente_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['tipo_contrato_otros_actividad_principal'])) ? $this->New_label['tipo_contrato_otros_actividad_principal'] : "Tipo Contrato Otros Actividad Principal"; 
   $conteudo = trim(sc_strip_script($this->tipo_contrato_otros_actividad_principal)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'tipo_contrato_otros_actividad_principal', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'tipo_contrato_otros_actividad_principal', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_tipo_contrato_otros_actividad_principal_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_tipo_contrato_otros_actividad_principal_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['actividadeconomica'])) ? $this->New_label['actividadeconomica'] : "Actividad Economica"; 
   $conteudo = trim(sc_strip_script($this->actividadeconomica)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'actividadeconomica', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'actividadeconomica', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_actividadeconomica_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_actividadeconomica_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['clasesujeto'])) ? $this->New_label['clasesujeto'] : "Clase Sujeto"; 
   $conteudo = trim(sc_strip_script($this->clasesujeto)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'clasesujeto', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'clasesujeto', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_clasesujeto_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_clasesujeto_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['provincia'])) ? $this->New_label['provincia'] : "Provincia"; 
   $conteudo = trim(sc_strip_script($this->provincia)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'provincia', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'provincia', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_provincia_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_provincia_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['parroquia'])) ? $this->New_label['parroquia'] : "Parroquia"; 
   $conteudo = trim(sc_strip_script($this->parroquia)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'parroquia', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'parroquia', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_parroquia_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_parroquia_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['canton'])) ? $this->New_label['canton'] : "Canton"; 
   $conteudo = trim(sc_strip_script($this->canton)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'canton', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'canton', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_canton_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_canton_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['demandajudicial'])) ? $this->New_label['demandajudicial'] : "Demanda Judicial"; 
   $conteudo = trim(sc_strip_script($this->demandajudicial)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'demandajudicial', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'demandajudicial', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_demandajudicial_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_demandajudicial_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['vdemandajudicial'])) ? $this->New_label['vdemandajudicial'] : "V Demanda Judicial"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->vdemandajudicial))); 
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
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'vdemandajudicial', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'vdemandajudicial', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_vdemandajudicial_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_vdemandajudicial_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['carteracastigada'])) ? $this->New_label['carteracastigada'] : "Cartera Castigada"; 
   $conteudo = trim(sc_strip_script($this->carteracastigada)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'carteracastigada', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'carteracastigada', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_carteracastigada_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_carteracastigada_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['vcarteracastigada'])) ? $this->New_label['vcarteracastigada'] : "V Cartera Castigada"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->vcarteracastigada))); 
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
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'vcarteracastigada', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'vcarteracastigada', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_vcarteracastigada_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_vcarteracastigada_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['accesoexterno01'])) ? $this->New_label['accesoexterno01'] : "Acceso Externo 01"; 
   $conteudo = trim(sc_strip_script($this->accesoexterno01)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'accesoexterno01', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'accesoexterno01', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_accesoexterno01_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_accesoexterno01_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['referencia'])) ? $this->New_label['referencia'] : "Referencia"; 
   $conteudo = trim(sc_strip_script($this->referencia)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'referencia', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'referencia', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_referencia_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_referencia_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['id_pais_empleado_dir_desempeno'])) ? $this->New_label['id_pais_empleado_dir_desempeno'] : "Id Pais Empleado Dir Desempeno"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->id_pais_empleado_dir_desempeno))); 
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
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'id_pais_empleado_dir_desempeno', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'id_pais_empleado_dir_desempeno', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_id_pais_empleado_dir_desempeno_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_id_pais_empleado_dir_desempeno_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['id_provincia_empleado_dir_desempeno'])) ? $this->New_label['id_provincia_empleado_dir_desempeno'] : "Id Provincia Empleado Dir Desempeno"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->id_provincia_empleado_dir_desempeno))); 
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
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'id_provincia_empleado_dir_desempeno', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'id_provincia_empleado_dir_desempeno', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_id_provincia_empleado_dir_desempeno_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_id_provincia_empleado_dir_desempeno_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "NOWRAP";
   }
   else
   {
       $this->SC_nowrap = "NOWRAP";
   }
   $SC_Label = (isset($this->New_label['id_ciudad_empleado_dir_desempeno'])) ? $this->New_label['id_ciudad_empleado_dir_desempeno'] : "Id Ciudad Empleado Dir Desempeno"; 
   $conteudo = trim(NM_encode_input(sc_strip_script($this->id_ciudad_empleado_dir_desempeno))); 
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
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'id_ciudad_empleado_dir_desempeno', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'id_ciudad_empleado_dir_desempeno', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_id_ciudad_empleado_dir_desempeno_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_id_ciudad_empleado_dir_desempeno_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['razon_social'])) ? $this->New_label['razon_social'] : "Razon Social"; 
   $conteudo = trim(sc_strip_script($this->razon_social)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'razon_social', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'razon_social', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_razon_social_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_razon_social_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['parterel01'])) ? $this->New_label['parterel01'] : "Parte Rel 01"; 
   $conteudo = trim(sc_strip_script($this->parterel01)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'parterel01', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'parterel01', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_parterel01_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_parterel01_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['origen_fondos'])) ? $this->New_label['origen_fondos'] : "Origen Fondos"; 
   $conteudo = trim(sc_strip_script($this->origen_fondos)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'origen_fondos', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'origen_fondos', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_origen_fondos_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_origen_fondos_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['tipo_identificacion'])) ? $this->New_label['tipo_identificacion'] : "Tipo Identificacion"; 
   $conteudo = trim(sc_strip_script($this->tipo_identificacion)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'tipo_identificacion', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'tipo_identificacion', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_tipo_identificacion_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_tipo_identificacion_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['opcao'] == "pdf")
   {
       $this->SC_nowrap = "";
   }
   else
   {
       $this->SC_nowrap = "";
   }
   $SC_Label = (isset($this->New_label['id_actividad'])) ? $this->New_label['id_actividad'] : "Id Actividad"; 
   $conteudo = trim(sc_strip_script($this->id_actividad)); 
   $conteudo_original = $conteudo; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'id_actividad', $str_tem_display); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'id_actividad', $str_tem_display); 
          } 
              $conteudo = $str_tem_display; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_id_actividad_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_id_actividad_det_line\"  " . $this->SC_nowrap . " ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
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
   $nm_saida->saida("                  action=\"grid_maecte_iframe_prt.php\" \r\n");
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
   $nm_saida->saida("       NovaJanela = window.open (\"grid_maecte_doc.php?nmgp_parms=\" + campo1, \"ScriptCase\", \"resizable\");\r\n");
   $nm_saida->saida("   }\r\n");
   $nm_saida->saida("   function nm_gp_move(x, y, z, p, g, crt, ajax, chart_level, page_break_pdf, SC_module_export, use_pass_pdf, pdf_all_cab, pdf_all_label, pdf_label_group, pdf_zip) \r\n");
   $nm_saida->saida("   {\r\n");
   $nm_saida->saida("       if (\"pdf_det\" == x && \"S\" == ajax)\r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("           $('#TB_window').remove();\r\n");
   $nm_saida->saida("           $('body').append(\"<div id='TB_window'></div>\");\r\n");
   $nm_saida->saida("               nm_submit_modal(\"" . $this->Ini->path_link . "grid_maecte/grid_maecte_export_email.php?script_case_init={$this->Ini->sc_page}&path_img={$this->Ini->path_img_global}&path_btn={$this->Ini->path_botoes}&sType=pdf_det&sAdd=__E__nmgp_tipo_pdf=\" + z + \"__E__sc_parms_pdf=\" + p + \"__E__sc_create_charts=\" + crt + \"__E__sc_graf_pdf=\" + g + \"__E__chart_level=\" + chart_level + \"__E__Det_use_pass_pdf=\" + use_pass_pdf + \"__E__Det_pdf_zip=\" + pdf_zip + \"&nm_opc=pdf_det&KeepThis=true&TB_iframe=true&modal=true\", '');\r\n");
   $nm_saida->saida("       }\r\n");
   $nm_saida->saida("       else\r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("           window.location = \"" . $this->Ini->path_link . "grid_maecte/index.php?nmgp_opcao=pdf_det&nmgp_tipo_pdf=\" + z + \"&nmgp_parms_pdf=\" + p +  \"&nmgp_graf_pdf=\" + g + \"&Det_use_pass_pdf=\" + use_pass_pdf + \"&Det_pdf_zip=\" + pdf_zip + \"&script_case_init=" . NM_encode_input($this->Ini->sc_page) . "\";\r\n");
   $nm_saida->saida("       }\r\n");
   $nm_saida->saida("   }\r\n");
   $nm_saida->saida("   function nm_gp_print_conf(tp, cor, res_cons, password, ajax, str_type, bol_param)\r\n");
   $nm_saida->saida("   {\r\n");
   $nm_saida->saida("       if (\"D\" == ajax)\r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("           $('#TB_window').remove();\r\n");
   $nm_saida->saida("           $('body').append(\"<div id='TB_window'></div>\");\r\n");
   $nm_saida->saida("               nm_submit_modal(\"" . $this->Ini->path_link . "grid_maecte/grid_maecte_export_email.php?script_case_init={$this->Ini->sc_page}&path_img={$this->Ini->path_img_global}&path_btn={$this->Ini->path_botoes}&sType=\"+ str_type +\"&sAdd=__E__nmgp_tipo_print=\" + tp + \"__E__nmgp_cor_print=\" + cor + \"&KeepThis=true&TB_iframe=true&modal=true\", bol_param);\r\n");
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
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['det_print'] != "print" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['pdf_det']) 
   { 
       $nm_saida->saida("   <tr  id=\"obj_barra_top\"><td class=\"scGridTabelaTd\">\r\n");
       $nm_saida->saida("    <table class=\"scGridToolbar\" style=\"padding: 0px; border-spacing: 0px; border-width: 0px; vertical-align: top;\" valign=\"top\" width=\"100%\"><tr>\r\n");
       $nm_saida->saida("     <td class=\"scGridToolbarPadding\" nowrap valign=\"middle\" align=\"left\" width=\"33%\">\r\n");
       $nm_saida->saida("         </td> \r\n");
       $nm_saida->saida("          <td class=\"scGridToolbarPadding\" nowrap valign=\"middle\" align=\"center\" width=\"33%\"> \r\n");
       if ($this->nmgp_botoes['det_pdf'] == "on")
       {
         $this->nm_btn_exist['det_pdf'][] = "Dpdf_top";
         $Cod_Btn = nmButtonOutput($this->arr_buttons, "bpdf", "", "", "Dpdf_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "thickbox", "" . $this->Ini->path_link . "grid_maecte/grid_maecte_config_pdf.php?nm_opc=pdf_det&nm_target=0&nm_cor=cor&papel=1&orientacao=1&largura=1200&conf_larg=S&conf_fonte=10&language=es&conf_socor=N&sc_ver_93=" . s . "&password=n&pdf_zip=N&KeepThis=false&TB_iframe=true&modal=true", "", "only_text", "text_right", "", "", "", "", "", "", "");
         $nm_saida->saida("           $Cod_Btn \r\n");
       }
       if ($this->nmgp_botoes['det_print'] == "on")
       {
         $this->nm_btn_exist['det_print'][] = "Dprint_top";
         $Cod_Btn = nmButtonOutput($this->arr_buttons, "bprint", "", "", "Dprint_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "thickbox", "" . $this->Ini->path_link . "grid_maecte/grid_maecte_config_print.php?nm_opc=detalhe&nm_cor=CO&password=n&language=es&KeepThis=true&TB_iframe=true&modal=true", "", "only_text", "text_right", "", "", "", "", "", "", "");
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
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['det_print'] != "print" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_maecte']['pdf_det']) 
   { 
       $nm_saida->saida("   <tr  id=\"obj_barra_top\"><td class=\"scGridTabelaTd\">\r\n");
       $nm_saida->saida("    <table class=\"scGridToolbar\" style=\"padding: 0px; border-spacing: 0px; border-width: 0px; vertical-align: top;\" valign=\"top\" width=\"100%\"><tr>\r\n");
       $nm_saida->saida("     <td class=\"scGridToolbarPadding\" nowrap valign=\"middle\" align=\"left\" width=\"33%\">\r\n");
       if ($this->nmgp_botoes['det_pdf'] == "on")
       {
         $this->nm_btn_exist['det_pdf'][] = "Dpdf_top";
         $Cod_Btn = nmButtonOutput($this->arr_buttons, "bpdf", "", "", "Dpdf_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "thickbox", "" . $this->Ini->path_link . "grid_maecte/grid_maecte_config_pdf.php?nm_opc=pdf_det&nm_target=0&nm_cor=cor&papel=1&orientacao=1&largura=1200&conf_larg=S&conf_fonte=10&language=es&conf_socor=N&sc_ver_93=" . s . "&password=n&pdf_zip=N&KeepThis=false&TB_iframe=true&modal=true", "", "only_text", "text_right", "", "", "", "", "", "", "");
         $nm_saida->saida("           $Cod_Btn \r\n");
       }
       if ($this->nmgp_botoes['det_print'] == "on")
       {
         $this->nm_btn_exist['det_print'][] = "Dprint_top";
         $Cod_Btn = nmButtonOutput($this->arr_buttons, "bprint", "", "", "Dprint_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "thickbox", "" . $this->Ini->path_link . "grid_maecte/grid_maecte_config_print.php?nm_opc=detalhe&nm_cor=CO&password=n&language=es&KeepThis=true&TB_iframe=true&modal=true", "", "only_text", "text_right", "", "", "", "", "", "", "");
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
