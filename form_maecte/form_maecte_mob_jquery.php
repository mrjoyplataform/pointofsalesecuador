
function scJQGeneralAdd() {
  scLoadScInput('input:text.sc-js-input');
  scLoadScInput('input:password.sc-js-input');
  scLoadScInput('input:checkbox.sc-js-input');
  scLoadScInput('input:radio.sc-js-input');
  scLoadScInput('select.sc-js-input');
  scLoadScInput('textarea.sc-js-input');

} // scJQGeneralAdd

function scFocusField(sField) {
  var $oField = $('#id_sc_field_' + sField);

  if (0 == $oField.length) {
    $oField = $('input[name=' + sField + ']');
  }

  if (0 == $oField.length && document.F1.elements[sField]) {
    $oField = $(document.F1.elements[sField]);
  }

  if ($("#id_ac_" + sField).length > 0) {
    if ($oField.hasClass("select2-hidden-accessible")) {
      if (false == scSetFocusOnField($oField)) {
        setTimeout(function() { scSetFocusOnField($oField); }, 500);
      }
    }
    else {
      if (false == scSetFocusOnField($oField)) {
        if (false == scSetFocusOnField($("#id_ac_" + sField))) {
          setTimeout(function() { scSetFocusOnField($("#id_ac_" + sField)); }, 500);
        }
      }
      else {
        setTimeout(function() { scSetFocusOnField($oField); }, 500);
      }
    }
  }
  else {
    setTimeout(function() { scSetFocusOnField($oField); }, 500);
  }
} // scFocusField

function scSetFocusOnField($oField) {
  if ($oField.length > 0 && $oField[0].offsetHeight > 0 && $oField[0].offsetWidth > 0 && !$oField[0].disabled) {
    $oField[0].focus();
    return true;
  }
  return false;
} // scSetFocusOnField

function scEventControl_init(iSeqRow) {
  scEventControl_data["codcte01" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["tipo_cliente" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["id_nacionalidad" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["nomcte01" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["primer_nombre" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["segundo_nombre" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["primer_apellido" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["segundo_apellido" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["cv1cte01" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["cv2cte01" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["tipcte01" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["ofienccte01" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["vendcte01" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["cobrcte01" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["loccte01" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["dircte01" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["sector" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["calle_principal" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["no" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["calle_secundaria" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["id_pais" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["id_provincia" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["id_ciudad" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["id_canton" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["telcte01" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["cascte01" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["ci_conyuge" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["conyuge_tipo_identidad" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["conyuge_primer_nombre" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["conyuge_segundo_nombre" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["conyuge_primer_apellido" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["conyuge_segundo_apellido" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["conyuge_profesion" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["id_tipo_documento" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["repleg01" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["fecing01" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["condpag01" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["desctocte01" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["limcred01" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["desppar01" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["cheqpro01" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["sdoeje01" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["sdoant01" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["sdoact01" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["acudbm01" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["acucrm01" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["acudbe01" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["acucre01" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["comentcte01" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["statuscte01" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["identcte01" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["cordcte01" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["limcant01" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["pagleg01" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["telcte01b" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["telcte01c" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["emailcte01" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["calle_principal_exterior" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["no_exterior" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["calle_secundaria_exterior" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["id_pais_exterior" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["id_ciudad_exterior" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["codigo_postal_exterior" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["sector_exterior" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["telefono_exterior" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["celular_exterior" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["email_exterior" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["emailaltcte01" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["ctacgcte01" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["obsercte01" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["totexceso01" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["imagencte01" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["block" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["uid" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["ultimoacceso" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["idcli" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["catcte01" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["transferido" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["password" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["showroom" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["orden" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["website" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["longitud01" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["latitud01" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["zoom01" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["acceder" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["coniva01" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["idemp01" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["codprov01" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["celular01" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["dircliente01" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["razcte01" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["ruc01" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["timenegocio01" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["refbanc01" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["refcom01" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["tarjcred01" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["firmaut01" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["precte01" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["cuotasven01" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["diasven01" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["fechanace01" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["sexo01" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["estadocivil01" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["dirgestion01" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["numhijos01" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["estsop01" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["notick01" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["chequece" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["solcre" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["promocte01" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["pagare01" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["valorpagare01" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["garante01" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["fecvenp01" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["ctacgant01" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["dsn" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["residente" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["medio_contacto" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["separacion_bienes" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["disolucion_conyugal" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["capitulaciones" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["numero_carga_familiar" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["nivel_educacion" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["profesion" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["envio_correspondencia" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["nombre_arrendador" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["apellido_arrendador" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["id_vivienda" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["telefono_arrendador" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["nombres_referencia" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["apellidos_referencia" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["parentesco" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["celular_ref" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["telefono_convencional_ref" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["id_ocupacion" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["fecha_ingreso_empresa" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["nombre_empresa" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["ciudad_empresa" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["provincia_empresa" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["direccion_empresa" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["cargo_empresa" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["telefono_empresa" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["ext_empresa" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["id_tipo_contrato_actividad" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["empresa_jubilo_actividad" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["fecha_salida_empresa_actividad" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["cargo_salida_empresa_actividad" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["fecha_inicio_actividad" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["fecha_ingreso_empresa_actividad" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["nombre_empresa_actividad" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["institucion_actividad" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["ciudad_actividad" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["provincia_actividad" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["direccion_actividad" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["calle_principal_actividad" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["no_actividad" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["calle_secundaria_actividad" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["sector_actividad" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["pais_actividad" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["actividad" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["telefono_actividad" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["cargo_actividad" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["ext_actividad" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["fecha_ingreso_empresa_actividad2" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["nombre_empresa_actividad2" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["institucion_actividad2" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["ciudad_actividad2" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["provincia_actividad2" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["direccion_actividad2" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["calle_principal_actividad2" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["no_actividad2" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["calle_secundaria_actividad2" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["sector_actividad2" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["fecha_salida_empresa_actividad2" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["fecha_inicio_actividad2" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["actividad2" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["telefono_actividad2" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["ext_actividad2" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["cargo_actividad2" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["id_tipo_contrato_actividad2" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["empresa_jubilo_actividad2" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["sueldo" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["arriendos" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["dividendo_utilidades_ultimo_ano" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["id_otros_ingresos" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["arriendo_hipoteca" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["prestamos" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["tarjetas_creditos" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["gastos_familiares" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["id_otros_gastos" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["depositos_bancos" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["cuentas_documentos" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["mercaderias" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["maquinarias_vehiculos" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["terrenos_edificios" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["acciones_bonos_cedulas" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["id_otros_activos" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["cuentas_por_pagar" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["prestamos_banco_menos_ano" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["prestamos_banco_mas_ano" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["deudas_tarjetas_creditos" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["id_otras_obligaciones" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["deudor" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["monto" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["descripcion" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["placa" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["valor_maquinaria_vehiculo" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["a_nombre_de" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["ubicacion" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["valor_propiedad" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["empresa" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["valor_mercado" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["institucion_bancaria" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["monto_banco" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["institucion_finaciera" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["monto_institucion_finaciera" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["id_cliente_juridico" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["nombre_completo_empresa" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["es_empresa_extranjera" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["pais_empresa" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["fecha_constitucion_empresa" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["id_oficina" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["id_tipo_actividad" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["especifique_otros" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["direccion_correspondencia" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["calle_principal_correspondencia" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["no_correspondencia" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["calle_secundaria_correspondencia" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["id_ciudad_correspondencia" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["nombre_empresa_solicitante" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["cargo_empresa_solicitante" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["celular_empresa_solicitante" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["telefono_empresa_solicitante" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["mail_empresa_solicitante" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["saldo_empresa_solicitante" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["nombre_referencia_comerciales" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["fecha_compra" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["telefono_referencia_comerciales" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["ventas" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["comisiones" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["gastos_operativos" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["gastos_administrativos" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["pago_cuotas_prestamo" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["funcionario" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["funcionario_detalle" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["miembro_politico" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["miembro_politico_detalle" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["ejecutivo_gobierno" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["ejecutivo_gobierno_detalle" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["familiar_gobierno" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["familiar_gobierno_detalle" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["familiar_gobierno_detalle_quien" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["otros_ingresos" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["otros_gastos" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["otros_activos" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["otras_obligaciones" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["sector_direccion_empresa" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["sector_direccion_empresa_correo" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["extranjero_nombres_referencia" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["extranjero_apellidos_referencia" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["extranjero_parentesco" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["extranjero_celular_ref" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["extranjero_telefono_convencional_ref" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["cargo_representante_legal" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["direccion_extranjero" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["relacion_dependencia_principal" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["correo_corporativo_principal" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["relacion_dependencia_secundaria" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["correo_corporativo_secundario" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["actividad_secundaria" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["id_pais_empresa" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["id_provincia_empresa" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["id_pais_correo" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["id_provincia_correo" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["apellido_empresa_solicitante" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["pais_actividad2" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["id_provincia_exterior" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["pais_independiente" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["tipo_contrato_otros_actividad_principal" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["actividadeconomica" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["clasesujeto" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["provincia" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["parroquia" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["canton" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["demandajudicial" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["vdemandajudicial" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["carteracastigada" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["vcarteracastigada" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["accesoexterno01" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["referencia" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["id_pais_empleado_dir_desempeno" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["id_provincia_empleado_dir_desempeno" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["id_ciudad_empleado_dir_desempeno" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["razon_social" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["parterel01" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["origen_fondos" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["tipo_identificacion" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["id_actividad" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["codcte01" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["codcte01" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["tipo_cliente" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["tipo_cliente" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["id_nacionalidad" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["id_nacionalidad" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["nomcte01" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["nomcte01" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["primer_nombre" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["primer_nombre" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["segundo_nombre" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["segundo_nombre" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["primer_apellido" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["primer_apellido" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["segundo_apellido" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["segundo_apellido" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["cv1cte01" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["cv1cte01" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["cv2cte01" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["cv2cte01" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["tipcte01" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["tipcte01" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["ofienccte01" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["ofienccte01" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["vendcte01" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["vendcte01" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["cobrcte01" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["cobrcte01" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["loccte01" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["loccte01" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["dircte01" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["dircte01" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["sector" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["sector" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["calle_principal" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["calle_principal" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["no" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["no" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["calle_secundaria" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["calle_secundaria" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["id_pais" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["id_pais" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["id_provincia" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["id_provincia" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["id_ciudad" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["id_ciudad" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["id_canton" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["id_canton" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["telcte01" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["telcte01" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["cascte01" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["cascte01" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["ci_conyuge" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["ci_conyuge" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["conyuge_tipo_identidad" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["conyuge_tipo_identidad" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["conyuge_primer_nombre" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["conyuge_primer_nombre" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["conyuge_segundo_nombre" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["conyuge_segundo_nombre" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["conyuge_primer_apellido" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["conyuge_primer_apellido" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["conyuge_segundo_apellido" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["conyuge_segundo_apellido" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["conyuge_profesion" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["conyuge_profesion" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["id_tipo_documento" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["id_tipo_documento" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["repleg01" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["repleg01" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["fecing01" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["fecing01" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["condpag01" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["condpag01" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["desctocte01" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["desctocte01" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["limcred01" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["limcred01" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["desppar01" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["desppar01" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["cheqpro01" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["cheqpro01" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["sdoeje01" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["sdoeje01" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["sdoant01" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["sdoant01" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["sdoact01" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["sdoact01" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["acudbm01" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["acudbm01" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["acucrm01" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["acucrm01" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["acudbe01" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["acudbe01" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["acucre01" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["acucre01" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["comentcte01" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["comentcte01" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["statuscte01" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["statuscte01" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["identcte01" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["identcte01" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["cordcte01" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["cordcte01" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["limcant01" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["limcant01" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["pagleg01" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["pagleg01" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["telcte01b" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["telcte01b" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["telcte01c" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["telcte01c" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["emailcte01" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["emailcte01" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["calle_principal_exterior" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["calle_principal_exterior" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["no_exterior" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["no_exterior" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["calle_secundaria_exterior" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["calle_secundaria_exterior" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["id_pais_exterior" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["id_pais_exterior" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["id_ciudad_exterior" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["id_ciudad_exterior" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["codigo_postal_exterior" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["codigo_postal_exterior" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["sector_exterior" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["sector_exterior" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["telefono_exterior" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["telefono_exterior" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["celular_exterior" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["celular_exterior" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["email_exterior" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["email_exterior" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["emailaltcte01" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["emailaltcte01" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["ctacgcte01" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["ctacgcte01" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["obsercte01" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["obsercte01" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["totexceso01" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["totexceso01" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["imagencte01" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["imagencte01" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["block" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["block" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["uid" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["uid" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["ultimoacceso" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["ultimoacceso" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["idcli" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["idcli" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["catcte01" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["catcte01" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["transferido" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["transferido" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["password" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["password" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["showroom" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["showroom" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["orden" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["orden" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["website" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["website" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["longitud01" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["longitud01" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["latitud01" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["latitud01" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["zoom01" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["zoom01" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["acceder" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["acceder" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["coniva01" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["coniva01" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["idemp01" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["idemp01" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["codprov01" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["codprov01" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["celular01" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["celular01" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["dircliente01" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["dircliente01" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["razcte01" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["razcte01" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["ruc01" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["ruc01" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["timenegocio01" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["timenegocio01" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["refbanc01" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["refbanc01" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["refcom01" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["refcom01" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["tarjcred01" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["tarjcred01" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["firmaut01" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["firmaut01" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["precte01" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["precte01" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["cuotasven01" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["cuotasven01" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["diasven01" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["diasven01" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["fechanace01" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["fechanace01" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["sexo01" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["sexo01" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["estadocivil01" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["estadocivil01" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["dirgestion01" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["dirgestion01" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["numhijos01" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["numhijos01" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["estsop01" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["estsop01" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["notick01" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["notick01" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["chequece" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["chequece" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["solcre" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["solcre" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["promocte01" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["promocte01" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["pagare01" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["pagare01" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["valorpagare01" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["valorpagare01" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["garante01" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["garante01" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["fecvenp01" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["fecvenp01" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["ctacgant01" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["ctacgant01" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["dsn" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["dsn" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["residente" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["residente" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["medio_contacto" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["medio_contacto" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["separacion_bienes" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["separacion_bienes" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["disolucion_conyugal" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["disolucion_conyugal" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["capitulaciones" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["capitulaciones" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["numero_carga_familiar" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["numero_carga_familiar" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["nivel_educacion" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["nivel_educacion" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["profesion" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["profesion" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["envio_correspondencia" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["envio_correspondencia" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["nombre_arrendador" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["nombre_arrendador" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["apellido_arrendador" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["apellido_arrendador" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["id_vivienda" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["id_vivienda" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["telefono_arrendador" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["telefono_arrendador" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["nombres_referencia" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["nombres_referencia" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["apellidos_referencia" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["apellidos_referencia" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["parentesco" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["parentesco" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["celular_ref" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["celular_ref" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["telefono_convencional_ref" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["telefono_convencional_ref" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["id_ocupacion" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["id_ocupacion" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["fecha_ingreso_empresa" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["fecha_ingreso_empresa" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["nombre_empresa" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["nombre_empresa" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["ciudad_empresa" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["ciudad_empresa" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["provincia_empresa" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["provincia_empresa" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["direccion_empresa" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["direccion_empresa" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["cargo_empresa" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["cargo_empresa" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["telefono_empresa" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["telefono_empresa" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["ext_empresa" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["ext_empresa" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["id_tipo_contrato_actividad" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["id_tipo_contrato_actividad" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["empresa_jubilo_actividad" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["empresa_jubilo_actividad" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["fecha_salida_empresa_actividad" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["fecha_salida_empresa_actividad" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["cargo_salida_empresa_actividad" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["cargo_salida_empresa_actividad" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["fecha_inicio_actividad" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["fecha_inicio_actividad" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["fecha_ingreso_empresa_actividad" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["fecha_ingreso_empresa_actividad" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["nombre_empresa_actividad" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["nombre_empresa_actividad" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["institucion_actividad" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["institucion_actividad" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["ciudad_actividad" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["ciudad_actividad" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["provincia_actividad" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["provincia_actividad" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["direccion_actividad" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["direccion_actividad" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["calle_principal_actividad" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["calle_principal_actividad" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["no_actividad" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["no_actividad" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["calle_secundaria_actividad" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["calle_secundaria_actividad" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["sector_actividad" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["sector_actividad" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["pais_actividad" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["pais_actividad" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["actividad" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["actividad" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["telefono_actividad" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["telefono_actividad" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["cargo_actividad" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["cargo_actividad" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["ext_actividad" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["ext_actividad" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["fecha_ingreso_empresa_actividad2" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["fecha_ingreso_empresa_actividad2" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["nombre_empresa_actividad2" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["nombre_empresa_actividad2" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["institucion_actividad2" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["institucion_actividad2" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["ciudad_actividad2" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["ciudad_actividad2" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["provincia_actividad2" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["provincia_actividad2" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["direccion_actividad2" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["direccion_actividad2" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["calle_principal_actividad2" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["calle_principal_actividad2" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["no_actividad2" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["no_actividad2" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["calle_secundaria_actividad2" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["calle_secundaria_actividad2" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["sector_actividad2" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["sector_actividad2" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["fecha_salida_empresa_actividad2" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["fecha_salida_empresa_actividad2" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["fecha_inicio_actividad2" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["fecha_inicio_actividad2" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["actividad2" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["actividad2" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["telefono_actividad2" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["telefono_actividad2" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["ext_actividad2" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["ext_actividad2" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["cargo_actividad2" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["cargo_actividad2" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["id_tipo_contrato_actividad2" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["id_tipo_contrato_actividad2" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["empresa_jubilo_actividad2" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["empresa_jubilo_actividad2" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["sueldo" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["sueldo" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["arriendos" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["arriendos" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["dividendo_utilidades_ultimo_ano" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["dividendo_utilidades_ultimo_ano" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["id_otros_ingresos" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["id_otros_ingresos" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["arriendo_hipoteca" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["arriendo_hipoteca" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["prestamos" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["prestamos" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["tarjetas_creditos" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["tarjetas_creditos" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["gastos_familiares" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["gastos_familiares" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["id_otros_gastos" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["id_otros_gastos" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["depositos_bancos" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["depositos_bancos" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["cuentas_documentos" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["cuentas_documentos" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["mercaderias" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["mercaderias" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["maquinarias_vehiculos" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["maquinarias_vehiculos" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["terrenos_edificios" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["terrenos_edificios" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["acciones_bonos_cedulas" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["acciones_bonos_cedulas" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["id_otros_activos" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["id_otros_activos" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["cuentas_por_pagar" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["cuentas_por_pagar" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["prestamos_banco_menos_ano" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["prestamos_banco_menos_ano" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["prestamos_banco_mas_ano" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["prestamos_banco_mas_ano" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["deudas_tarjetas_creditos" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["deudas_tarjetas_creditos" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["id_otras_obligaciones" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["id_otras_obligaciones" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["deudor" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["deudor" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["monto" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["monto" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["descripcion" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["descripcion" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["placa" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["placa" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["valor_maquinaria_vehiculo" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["valor_maquinaria_vehiculo" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["a_nombre_de" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["a_nombre_de" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["ubicacion" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["ubicacion" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["valor_propiedad" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["valor_propiedad" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["empresa" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["empresa" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["valor_mercado" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["valor_mercado" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["institucion_bancaria" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["institucion_bancaria" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["monto_banco" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["monto_banco" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["institucion_finaciera" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["institucion_finaciera" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["monto_institucion_finaciera" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["monto_institucion_finaciera" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["id_cliente_juridico" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["id_cliente_juridico" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["nombre_completo_empresa" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["nombre_completo_empresa" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["es_empresa_extranjera" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["es_empresa_extranjera" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["pais_empresa" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["pais_empresa" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["fecha_constitucion_empresa" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["fecha_constitucion_empresa" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["id_oficina" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["id_oficina" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["id_tipo_actividad" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["id_tipo_actividad" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["especifique_otros" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["especifique_otros" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["direccion_correspondencia" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["direccion_correspondencia" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["calle_principal_correspondencia" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["calle_principal_correspondencia" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["no_correspondencia" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["no_correspondencia" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["calle_secundaria_correspondencia" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["calle_secundaria_correspondencia" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["id_ciudad_correspondencia" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["id_ciudad_correspondencia" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["nombre_empresa_solicitante" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["nombre_empresa_solicitante" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["cargo_empresa_solicitante" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["cargo_empresa_solicitante" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["celular_empresa_solicitante" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["celular_empresa_solicitante" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["telefono_empresa_solicitante" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["telefono_empresa_solicitante" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["mail_empresa_solicitante" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["mail_empresa_solicitante" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["saldo_empresa_solicitante" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["saldo_empresa_solicitante" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["nombre_referencia_comerciales" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["nombre_referencia_comerciales" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["fecha_compra" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["fecha_compra" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["telefono_referencia_comerciales" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["telefono_referencia_comerciales" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["ventas" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["ventas" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["comisiones" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["comisiones" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["gastos_operativos" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["gastos_operativos" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["gastos_administrativos" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["gastos_administrativos" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["pago_cuotas_prestamo" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["pago_cuotas_prestamo" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["funcionario" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["funcionario" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["funcionario_detalle" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["funcionario_detalle" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["miembro_politico" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["miembro_politico" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["miembro_politico_detalle" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["miembro_politico_detalle" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["ejecutivo_gobierno" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["ejecutivo_gobierno" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["ejecutivo_gobierno_detalle" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["ejecutivo_gobierno_detalle" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["familiar_gobierno" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["familiar_gobierno" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["familiar_gobierno_detalle" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["familiar_gobierno_detalle" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["familiar_gobierno_detalle_quien" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["familiar_gobierno_detalle_quien" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["otros_ingresos" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["otros_ingresos" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["otros_gastos" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["otros_gastos" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["otros_activos" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["otros_activos" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["otras_obligaciones" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["otras_obligaciones" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["sector_direccion_empresa" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["sector_direccion_empresa" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["sector_direccion_empresa_correo" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["sector_direccion_empresa_correo" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["extranjero_nombres_referencia" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["extranjero_nombres_referencia" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["extranjero_apellidos_referencia" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["extranjero_apellidos_referencia" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["extranjero_parentesco" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["extranjero_parentesco" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["extranjero_celular_ref" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["extranjero_celular_ref" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["extranjero_telefono_convencional_ref" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["extranjero_telefono_convencional_ref" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["cargo_representante_legal" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["cargo_representante_legal" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["direccion_extranjero" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["direccion_extranjero" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["relacion_dependencia_principal" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["relacion_dependencia_principal" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["correo_corporativo_principal" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["correo_corporativo_principal" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["relacion_dependencia_secundaria" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["relacion_dependencia_secundaria" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["correo_corporativo_secundario" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["correo_corporativo_secundario" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["actividad_secundaria" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["actividad_secundaria" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["id_pais_empresa" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["id_pais_empresa" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["id_provincia_empresa" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["id_provincia_empresa" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["id_pais_correo" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["id_pais_correo" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["id_provincia_correo" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["id_provincia_correo" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["apellido_empresa_solicitante" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["apellido_empresa_solicitante" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["pais_actividad2" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["pais_actividad2" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["id_provincia_exterior" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["id_provincia_exterior" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["pais_independiente" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["pais_independiente" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["tipo_contrato_otros_actividad_principal" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["tipo_contrato_otros_actividad_principal" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["actividadeconomica" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["actividadeconomica" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["clasesujeto" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["clasesujeto" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["provincia" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["provincia" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["parroquia" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["parroquia" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["canton" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["canton" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["demandajudicial" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["demandajudicial" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["vdemandajudicial" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["vdemandajudicial" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["carteracastigada" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["carteracastigada" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["vcarteracastigada" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["vcarteracastigada" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["accesoexterno01" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["accesoexterno01" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["referencia" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["referencia" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["id_pais_empleado_dir_desempeno" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["id_pais_empleado_dir_desempeno" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["id_provincia_empleado_dir_desempeno" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["id_provincia_empleado_dir_desempeno" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["id_ciudad_empleado_dir_desempeno" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["id_ciudad_empleado_dir_desempeno" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["razon_social" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["razon_social" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["parterel01" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["parterel01" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["origen_fondos" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["origen_fondos" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["tipo_identificacion" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["tipo_identificacion" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["id_actividad" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["id_actividad" + iSeqRow]["change"]) {
    return true;
  }
  return false;
} // scEventControl_active

function scEventControl_onFocus(oField, iSeq) {
  var fieldId, fieldName;
  fieldId = $(oField).attr("id");
  fieldName = fieldId.substr(12);
  scEventControl_data[fieldName]["blur"] = true;
  scEventControl_data[fieldName]["change"] = false;
} // scEventControl_onFocus

function scEventControl_onBlur(sFieldName) {
  scEventControl_data[sFieldName]["blur"] = false;
  if (scEventControl_data[sFieldName]["change"]) {
        if (scEventControl_data[sFieldName]["original"] == $("#id_sc_field_" + sFieldName).val() || scEventControl_data[sFieldName]["calculated"] == $("#id_sc_field_" + sFieldName).val()) {
          scEventControl_data[sFieldName]["change"] = false;
        }
  }
} // scEventControl_onBlur

function scEventControl_onChange(sFieldName) {
  scEventControl_data[sFieldName]["change"] = false;
} // scEventControl_onChange

function scEventControl_onAutocomp(sFieldName) {
  scEventControl_data[sFieldName]["autocomp"] = false;
} // scEventControl_onChange

var scEventControl_data = {};

function scJQEventsAdd(iSeqRow) {
  $('#id_sc_field_codcte01' + iSeqRow).bind('blur', function() { sc_form_maecte_codcte01_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_maecte_codcte01_onfocus(this, iSeqRow) });
  $('#id_sc_field_tipo_cliente' + iSeqRow).bind('blur', function() { sc_form_maecte_tipo_cliente_onblur(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_maecte_tipo_cliente_onfocus(this, iSeqRow) });
  $('#id_sc_field_id_nacionalidad' + iSeqRow).bind('blur', function() { sc_form_maecte_id_nacionalidad_onblur(this, iSeqRow) })
                                             .bind('focus', function() { sc_form_maecte_id_nacionalidad_onfocus(this, iSeqRow) });
  $('#id_sc_field_nomcte01' + iSeqRow).bind('blur', function() { sc_form_maecte_nomcte01_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_maecte_nomcte01_onfocus(this, iSeqRow) });
  $('#id_sc_field_primer_nombre' + iSeqRow).bind('blur', function() { sc_form_maecte_primer_nombre_onblur(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_maecte_primer_nombre_onfocus(this, iSeqRow) });
  $('#id_sc_field_segundo_nombre' + iSeqRow).bind('blur', function() { sc_form_maecte_segundo_nombre_onblur(this, iSeqRow) })
                                            .bind('focus', function() { sc_form_maecte_segundo_nombre_onfocus(this, iSeqRow) });
  $('#id_sc_field_primer_apellido' + iSeqRow).bind('blur', function() { sc_form_maecte_primer_apellido_onblur(this, iSeqRow) })
                                             .bind('focus', function() { sc_form_maecte_primer_apellido_onfocus(this, iSeqRow) });
  $('#id_sc_field_segundo_apellido' + iSeqRow).bind('blur', function() { sc_form_maecte_segundo_apellido_onblur(this, iSeqRow) })
                                              .bind('focus', function() { sc_form_maecte_segundo_apellido_onfocus(this, iSeqRow) });
  $('#id_sc_field_cv1cte01' + iSeqRow).bind('blur', function() { sc_form_maecte_cv1cte01_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_maecte_cv1cte01_onfocus(this, iSeqRow) });
  $('#id_sc_field_cv2cte01' + iSeqRow).bind('blur', function() { sc_form_maecte_cv2cte01_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_maecte_cv2cte01_onfocus(this, iSeqRow) });
  $('#id_sc_field_tipcte01' + iSeqRow).bind('blur', function() { sc_form_maecte_tipcte01_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_maecte_tipcte01_onfocus(this, iSeqRow) });
  $('#id_sc_field_ofienccte01' + iSeqRow).bind('blur', function() { sc_form_maecte_ofienccte01_onblur(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_maecte_ofienccte01_onfocus(this, iSeqRow) });
  $('#id_sc_field_vendcte01' + iSeqRow).bind('blur', function() { sc_form_maecte_vendcte01_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_maecte_vendcte01_onfocus(this, iSeqRow) });
  $('#id_sc_field_cobrcte01' + iSeqRow).bind('blur', function() { sc_form_maecte_cobrcte01_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_maecte_cobrcte01_onfocus(this, iSeqRow) });
  $('#id_sc_field_loccte01' + iSeqRow).bind('blur', function() { sc_form_maecte_loccte01_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_maecte_loccte01_onfocus(this, iSeqRow) });
  $('#id_sc_field_dircte01' + iSeqRow).bind('blur', function() { sc_form_maecte_dircte01_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_maecte_dircte01_onfocus(this, iSeqRow) });
  $('#id_sc_field_sector' + iSeqRow).bind('blur', function() { sc_form_maecte_sector_onblur(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_maecte_sector_onfocus(this, iSeqRow) });
  $('#id_sc_field_calle_principal' + iSeqRow).bind('blur', function() { sc_form_maecte_calle_principal_onblur(this, iSeqRow) })
                                             .bind('focus', function() { sc_form_maecte_calle_principal_onfocus(this, iSeqRow) });
  $('#id_sc_field_no' + iSeqRow).bind('blur', function() { sc_form_maecte_no_onblur(this, iSeqRow) })
                                .bind('focus', function() { sc_form_maecte_no_onfocus(this, iSeqRow) });
  $('#id_sc_field_calle_secundaria' + iSeqRow).bind('blur', function() { sc_form_maecte_calle_secundaria_onblur(this, iSeqRow) })
                                              .bind('focus', function() { sc_form_maecte_calle_secundaria_onfocus(this, iSeqRow) });
  $('#id_sc_field_id_pais' + iSeqRow).bind('blur', function() { sc_form_maecte_id_pais_onblur(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_maecte_id_pais_onfocus(this, iSeqRow) });
  $('#id_sc_field_id_provincia' + iSeqRow).bind('blur', function() { sc_form_maecte_id_provincia_onblur(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_maecte_id_provincia_onfocus(this, iSeqRow) });
  $('#id_sc_field_id_ciudad' + iSeqRow).bind('blur', function() { sc_form_maecte_id_ciudad_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_maecte_id_ciudad_onfocus(this, iSeqRow) });
  $('#id_sc_field_id_canton' + iSeqRow).bind('blur', function() { sc_form_maecte_id_canton_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_maecte_id_canton_onfocus(this, iSeqRow) });
  $('#id_sc_field_telcte01' + iSeqRow).bind('blur', function() { sc_form_maecte_telcte01_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_maecte_telcte01_onfocus(this, iSeqRow) });
  $('#id_sc_field_cascte01' + iSeqRow).bind('blur', function() { sc_form_maecte_cascte01_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_maecte_cascte01_onfocus(this, iSeqRow) });
  $('#id_sc_field_ci_conyuge' + iSeqRow).bind('blur', function() { sc_form_maecte_ci_conyuge_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_maecte_ci_conyuge_onfocus(this, iSeqRow) });
  $('#id_sc_field_conyuge_tipo_identidad' + iSeqRow).bind('blur', function() { sc_form_maecte_conyuge_tipo_identidad_onblur(this, iSeqRow) })
                                                    .bind('focus', function() { sc_form_maecte_conyuge_tipo_identidad_onfocus(this, iSeqRow) });
  $('#id_sc_field_conyuge_primer_nombre' + iSeqRow).bind('blur', function() { sc_form_maecte_conyuge_primer_nombre_onblur(this, iSeqRow) })
                                                   .bind('focus', function() { sc_form_maecte_conyuge_primer_nombre_onfocus(this, iSeqRow) });
  $('#id_sc_field_conyuge_segundo_nombre' + iSeqRow).bind('blur', function() { sc_form_maecte_conyuge_segundo_nombre_onblur(this, iSeqRow) })
                                                    .bind('focus', function() { sc_form_maecte_conyuge_segundo_nombre_onfocus(this, iSeqRow) });
  $('#id_sc_field_conyuge_primer_apellido' + iSeqRow).bind('blur', function() { sc_form_maecte_conyuge_primer_apellido_onblur(this, iSeqRow) })
                                                     .bind('focus', function() { sc_form_maecte_conyuge_primer_apellido_onfocus(this, iSeqRow) });
  $('#id_sc_field_conyuge_segundo_apellido' + iSeqRow).bind('blur', function() { sc_form_maecte_conyuge_segundo_apellido_onblur(this, iSeqRow) })
                                                      .bind('focus', function() { sc_form_maecte_conyuge_segundo_apellido_onfocus(this, iSeqRow) });
  $('#id_sc_field_conyuge_profesion' + iSeqRow).bind('blur', function() { sc_form_maecte_conyuge_profesion_onblur(this, iSeqRow) })
                                               .bind('focus', function() { sc_form_maecte_conyuge_profesion_onfocus(this, iSeqRow) });
  $('#id_sc_field_id_tipo_documento' + iSeqRow).bind('blur', function() { sc_form_maecte_id_tipo_documento_onblur(this, iSeqRow) })
                                               .bind('focus', function() { sc_form_maecte_id_tipo_documento_onfocus(this, iSeqRow) });
  $('#id_sc_field_repleg01' + iSeqRow).bind('blur', function() { sc_form_maecte_repleg01_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_maecte_repleg01_onfocus(this, iSeqRow) });
  $('#id_sc_field_fecing01' + iSeqRow).bind('blur', function() { sc_form_maecte_fecing01_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_maecte_fecing01_onfocus(this, iSeqRow) });
  $('#id_sc_field_fecing01_hora' + iSeqRow).bind('blur', function() { sc_form_maecte_fecing01_onblur(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_maecte_fecing01_onfocus(this, iSeqRow) });
  $('#id_sc_field_condpag01' + iSeqRow).bind('blur', function() { sc_form_maecte_condpag01_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_maecte_condpag01_onfocus(this, iSeqRow) });
  $('#id_sc_field_desctocte01' + iSeqRow).bind('blur', function() { sc_form_maecte_desctocte01_onblur(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_maecte_desctocte01_onfocus(this, iSeqRow) });
  $('#id_sc_field_limcred01' + iSeqRow).bind('blur', function() { sc_form_maecte_limcred01_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_maecte_limcred01_onfocus(this, iSeqRow) });
  $('#id_sc_field_desppar01' + iSeqRow).bind('blur', function() { sc_form_maecte_desppar01_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_maecte_desppar01_onfocus(this, iSeqRow) });
  $('#id_sc_field_cheqpro01' + iSeqRow).bind('blur', function() { sc_form_maecte_cheqpro01_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_maecte_cheqpro01_onfocus(this, iSeqRow) });
  $('#id_sc_field_sdoeje01' + iSeqRow).bind('blur', function() { sc_form_maecte_sdoeje01_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_maecte_sdoeje01_onfocus(this, iSeqRow) });
  $('#id_sc_field_sdoant01' + iSeqRow).bind('blur', function() { sc_form_maecte_sdoant01_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_maecte_sdoant01_onfocus(this, iSeqRow) });
  $('#id_sc_field_sdoact01' + iSeqRow).bind('blur', function() { sc_form_maecte_sdoact01_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_maecte_sdoact01_onfocus(this, iSeqRow) });
  $('#id_sc_field_acudbm01' + iSeqRow).bind('blur', function() { sc_form_maecte_acudbm01_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_maecte_acudbm01_onfocus(this, iSeqRow) });
  $('#id_sc_field_acucrm01' + iSeqRow).bind('blur', function() { sc_form_maecte_acucrm01_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_maecte_acucrm01_onfocus(this, iSeqRow) });
  $('#id_sc_field_acudbe01' + iSeqRow).bind('blur', function() { sc_form_maecte_acudbe01_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_maecte_acudbe01_onfocus(this, iSeqRow) });
  $('#id_sc_field_acucre01' + iSeqRow).bind('blur', function() { sc_form_maecte_acucre01_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_maecte_acucre01_onfocus(this, iSeqRow) });
  $('#id_sc_field_comentcte01' + iSeqRow).bind('blur', function() { sc_form_maecte_comentcte01_onblur(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_maecte_comentcte01_onfocus(this, iSeqRow) });
  $('#id_sc_field_statuscte01' + iSeqRow).bind('blur', function() { sc_form_maecte_statuscte01_onblur(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_maecte_statuscte01_onfocus(this, iSeqRow) });
  $('#id_sc_field_identcte01' + iSeqRow).bind('blur', function() { sc_form_maecte_identcte01_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_maecte_identcte01_onfocus(this, iSeqRow) });
  $('#id_sc_field_cordcte01' + iSeqRow).bind('blur', function() { sc_form_maecte_cordcte01_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_maecte_cordcte01_onfocus(this, iSeqRow) });
  $('#id_sc_field_limcant01' + iSeqRow).bind('blur', function() { sc_form_maecte_limcant01_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_maecte_limcant01_onfocus(this, iSeqRow) });
  $('#id_sc_field_pagleg01' + iSeqRow).bind('blur', function() { sc_form_maecte_pagleg01_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_maecte_pagleg01_onfocus(this, iSeqRow) });
  $('#id_sc_field_telcte01b' + iSeqRow).bind('blur', function() { sc_form_maecte_telcte01b_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_maecte_telcte01b_onfocus(this, iSeqRow) });
  $('#id_sc_field_telcte01c' + iSeqRow).bind('blur', function() { sc_form_maecte_telcte01c_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_maecte_telcte01c_onfocus(this, iSeqRow) });
  $('#id_sc_field_emailcte01' + iSeqRow).bind('blur', function() { sc_form_maecte_emailcte01_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_maecte_emailcte01_onfocus(this, iSeqRow) });
  $('#id_sc_field_calle_principal_exterior' + iSeqRow).bind('blur', function() { sc_form_maecte_calle_principal_exterior_onblur(this, iSeqRow) })
                                                      .bind('focus', function() { sc_form_maecte_calle_principal_exterior_onfocus(this, iSeqRow) });
  $('#id_sc_field_no_exterior' + iSeqRow).bind('blur', function() { sc_form_maecte_no_exterior_onblur(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_maecte_no_exterior_onfocus(this, iSeqRow) });
  $('#id_sc_field_calle_secundaria_exterior' + iSeqRow).bind('blur', function() { sc_form_maecte_calle_secundaria_exterior_onblur(this, iSeqRow) })
                                                       .bind('focus', function() { sc_form_maecte_calle_secundaria_exterior_onfocus(this, iSeqRow) });
  $('#id_sc_field_id_pais_exterior' + iSeqRow).bind('blur', function() { sc_form_maecte_id_pais_exterior_onblur(this, iSeqRow) })
                                              .bind('focus', function() { sc_form_maecte_id_pais_exterior_onfocus(this, iSeqRow) });
  $('#id_sc_field_id_ciudad_exterior' + iSeqRow).bind('blur', function() { sc_form_maecte_id_ciudad_exterior_onblur(this, iSeqRow) })
                                                .bind('focus', function() { sc_form_maecte_id_ciudad_exterior_onfocus(this, iSeqRow) });
  $('#id_sc_field_codigo_postal_exterior' + iSeqRow).bind('blur', function() { sc_form_maecte_codigo_postal_exterior_onblur(this, iSeqRow) })
                                                    .bind('focus', function() { sc_form_maecte_codigo_postal_exterior_onfocus(this, iSeqRow) });
  $('#id_sc_field_sector_exterior' + iSeqRow).bind('blur', function() { sc_form_maecte_sector_exterior_onblur(this, iSeqRow) })
                                             .bind('focus', function() { sc_form_maecte_sector_exterior_onfocus(this, iSeqRow) });
  $('#id_sc_field_telefono_exterior' + iSeqRow).bind('blur', function() { sc_form_maecte_telefono_exterior_onblur(this, iSeqRow) })
                                               .bind('focus', function() { sc_form_maecte_telefono_exterior_onfocus(this, iSeqRow) });
  $('#id_sc_field_celular_exterior' + iSeqRow).bind('blur', function() { sc_form_maecte_celular_exterior_onblur(this, iSeqRow) })
                                              .bind('focus', function() { sc_form_maecte_celular_exterior_onfocus(this, iSeqRow) });
  $('#id_sc_field_email_exterior' + iSeqRow).bind('blur', function() { sc_form_maecte_email_exterior_onblur(this, iSeqRow) })
                                            .bind('focus', function() { sc_form_maecte_email_exterior_onfocus(this, iSeqRow) });
  $('#id_sc_field_emailaltcte01' + iSeqRow).bind('blur', function() { sc_form_maecte_emailaltcte01_onblur(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_maecte_emailaltcte01_onfocus(this, iSeqRow) });
  $('#id_sc_field_ctacgcte01' + iSeqRow).bind('blur', function() { sc_form_maecte_ctacgcte01_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_maecte_ctacgcte01_onfocus(this, iSeqRow) });
  $('#id_sc_field_obsercte01' + iSeqRow).bind('blur', function() { sc_form_maecte_obsercte01_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_maecte_obsercte01_onfocus(this, iSeqRow) });
  $('#id_sc_field_totexceso01' + iSeqRow).bind('blur', function() { sc_form_maecte_totexceso01_onblur(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_maecte_totexceso01_onfocus(this, iSeqRow) });
  $('#id_sc_field_imagencte01' + iSeqRow).bind('blur', function() { sc_form_maecte_imagencte01_onblur(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_maecte_imagencte01_onfocus(this, iSeqRow) });
  $('#id_sc_field_block' + iSeqRow).bind('blur', function() { sc_form_maecte_block_onblur(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_maecte_block_onfocus(this, iSeqRow) });
  $('#id_sc_field_uid' + iSeqRow).bind('blur', function() { sc_form_maecte_uid_onblur(this, iSeqRow) })
                                 .bind('focus', function() { sc_form_maecte_uid_onfocus(this, iSeqRow) });
  $('#id_sc_field_ultimoacceso' + iSeqRow).bind('blur', function() { sc_form_maecte_ultimoacceso_onblur(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_maecte_ultimoacceso_onfocus(this, iSeqRow) });
  $('#id_sc_field_idcli' + iSeqRow).bind('blur', function() { sc_form_maecte_idcli_onblur(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_maecte_idcli_onfocus(this, iSeqRow) });
  $('#id_sc_field_catcte01' + iSeqRow).bind('blur', function() { sc_form_maecte_catcte01_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_maecte_catcte01_onfocus(this, iSeqRow) });
  $('#id_sc_field_transferido' + iSeqRow).bind('blur', function() { sc_form_maecte_transferido_onblur(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_maecte_transferido_onfocus(this, iSeqRow) });
  $('#id_sc_field_password' + iSeqRow).bind('blur', function() { sc_form_maecte_password_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_maecte_password_onfocus(this, iSeqRow) });
  $('#id_sc_field_showroom' + iSeqRow).bind('blur', function() { sc_form_maecte_showroom_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_maecte_showroom_onfocus(this, iSeqRow) });
  $('#id_sc_field_orden' + iSeqRow).bind('blur', function() { sc_form_maecte_orden_onblur(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_maecte_orden_onfocus(this, iSeqRow) });
  $('#id_sc_field_website' + iSeqRow).bind('blur', function() { sc_form_maecte_website_onblur(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_maecte_website_onfocus(this, iSeqRow) });
  $('#id_sc_field_longitud01' + iSeqRow).bind('blur', function() { sc_form_maecte_longitud01_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_maecte_longitud01_onfocus(this, iSeqRow) });
  $('#id_sc_field_latitud01' + iSeqRow).bind('blur', function() { sc_form_maecte_latitud01_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_maecte_latitud01_onfocus(this, iSeqRow) });
  $('#id_sc_field_zoom01' + iSeqRow).bind('blur', function() { sc_form_maecte_zoom01_onblur(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_maecte_zoom01_onfocus(this, iSeqRow) });
  $('#id_sc_field_acceder' + iSeqRow).bind('blur', function() { sc_form_maecte_acceder_onblur(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_maecte_acceder_onfocus(this, iSeqRow) });
  $('#id_sc_field_coniva01' + iSeqRow).bind('blur', function() { sc_form_maecte_coniva01_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_maecte_coniva01_onfocus(this, iSeqRow) });
  $('#id_sc_field_idemp01' + iSeqRow).bind('blur', function() { sc_form_maecte_idemp01_onblur(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_maecte_idemp01_onfocus(this, iSeqRow) });
  $('#id_sc_field_codprov01' + iSeqRow).bind('blur', function() { sc_form_maecte_codprov01_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_maecte_codprov01_onfocus(this, iSeqRow) });
  $('#id_sc_field_celular01' + iSeqRow).bind('blur', function() { sc_form_maecte_celular01_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_maecte_celular01_onfocus(this, iSeqRow) });
  $('#id_sc_field_dircliente01' + iSeqRow).bind('blur', function() { sc_form_maecte_dircliente01_onblur(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_maecte_dircliente01_onfocus(this, iSeqRow) });
  $('#id_sc_field_razcte01' + iSeqRow).bind('blur', function() { sc_form_maecte_razcte01_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_maecte_razcte01_onfocus(this, iSeqRow) });
  $('#id_sc_field_ruc01' + iSeqRow).bind('blur', function() { sc_form_maecte_ruc01_onblur(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_maecte_ruc01_onfocus(this, iSeqRow) });
  $('#id_sc_field_timenegocio01' + iSeqRow).bind('blur', function() { sc_form_maecte_timenegocio01_onblur(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_maecte_timenegocio01_onfocus(this, iSeqRow) });
  $('#id_sc_field_refbanc01' + iSeqRow).bind('blur', function() { sc_form_maecte_refbanc01_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_maecte_refbanc01_onfocus(this, iSeqRow) });
  $('#id_sc_field_refcom01' + iSeqRow).bind('blur', function() { sc_form_maecte_refcom01_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_maecte_refcom01_onfocus(this, iSeqRow) });
  $('#id_sc_field_tarjcred01' + iSeqRow).bind('blur', function() { sc_form_maecte_tarjcred01_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_maecte_tarjcred01_onfocus(this, iSeqRow) });
  $('#id_sc_field_firmaut01' + iSeqRow).bind('blur', function() { sc_form_maecte_firmaut01_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_maecte_firmaut01_onfocus(this, iSeqRow) });
  $('#id_sc_field_precte01' + iSeqRow).bind('blur', function() { sc_form_maecte_precte01_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_maecte_precte01_onfocus(this, iSeqRow) });
  $('#id_sc_field_cuotasven01' + iSeqRow).bind('blur', function() { sc_form_maecte_cuotasven01_onblur(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_maecte_cuotasven01_onfocus(this, iSeqRow) });
  $('#id_sc_field_diasven01' + iSeqRow).bind('blur', function() { sc_form_maecte_diasven01_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_maecte_diasven01_onfocus(this, iSeqRow) });
  $('#id_sc_field_fechanace01' + iSeqRow).bind('blur', function() { sc_form_maecte_fechanace01_onblur(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_maecte_fechanace01_onfocus(this, iSeqRow) });
  $('#id_sc_field_sexo01' + iSeqRow).bind('blur', function() { sc_form_maecte_sexo01_onblur(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_maecte_sexo01_onfocus(this, iSeqRow) });
  $('#id_sc_field_estadocivil01' + iSeqRow).bind('blur', function() { sc_form_maecte_estadocivil01_onblur(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_maecte_estadocivil01_onfocus(this, iSeqRow) });
  $('#id_sc_field_dirgestion01' + iSeqRow).bind('blur', function() { sc_form_maecte_dirgestion01_onblur(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_maecte_dirgestion01_onfocus(this, iSeqRow) });
  $('#id_sc_field_numhijos01' + iSeqRow).bind('blur', function() { sc_form_maecte_numhijos01_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_maecte_numhijos01_onfocus(this, iSeqRow) });
  $('#id_sc_field_estsop01' + iSeqRow).bind('blur', function() { sc_form_maecte_estsop01_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_maecte_estsop01_onfocus(this, iSeqRow) });
  $('#id_sc_field_notick01' + iSeqRow).bind('blur', function() { sc_form_maecte_notick01_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_maecte_notick01_onfocus(this, iSeqRow) });
  $('#id_sc_field_chequece' + iSeqRow).bind('blur', function() { sc_form_maecte_chequece_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_maecte_chequece_onfocus(this, iSeqRow) });
  $('#id_sc_field_solcre' + iSeqRow).bind('blur', function() { sc_form_maecte_solcre_onblur(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_maecte_solcre_onfocus(this, iSeqRow) });
  $('#id_sc_field_promocte01' + iSeqRow).bind('blur', function() { sc_form_maecte_promocte01_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_maecte_promocte01_onfocus(this, iSeqRow) });
  $('#id_sc_field_pagare01' + iSeqRow).bind('blur', function() { sc_form_maecte_pagare01_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_maecte_pagare01_onfocus(this, iSeqRow) });
  $('#id_sc_field_valorpagare01' + iSeqRow).bind('blur', function() { sc_form_maecte_valorpagare01_onblur(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_maecte_valorpagare01_onfocus(this, iSeqRow) });
  $('#id_sc_field_garante01' + iSeqRow).bind('blur', function() { sc_form_maecte_garante01_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_maecte_garante01_onfocus(this, iSeqRow) });
  $('#id_sc_field_fecvenp01' + iSeqRow).bind('blur', function() { sc_form_maecte_fecvenp01_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_maecte_fecvenp01_onfocus(this, iSeqRow) });
  $('#id_sc_field_ctacgant01' + iSeqRow).bind('blur', function() { sc_form_maecte_ctacgant01_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_maecte_ctacgant01_onfocus(this, iSeqRow) });
  $('#id_sc_field_dsn' + iSeqRow).bind('blur', function() { sc_form_maecte_dsn_onblur(this, iSeqRow) })
                                 .bind('focus', function() { sc_form_maecte_dsn_onfocus(this, iSeqRow) });
  $('#id_sc_field_residente' + iSeqRow).bind('blur', function() { sc_form_maecte_residente_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_maecte_residente_onfocus(this, iSeqRow) });
  $('#id_sc_field_medio_contacto' + iSeqRow).bind('blur', function() { sc_form_maecte_medio_contacto_onblur(this, iSeqRow) })
                                            .bind('focus', function() { sc_form_maecte_medio_contacto_onfocus(this, iSeqRow) });
  $('#id_sc_field_separacion_bienes' + iSeqRow).bind('blur', function() { sc_form_maecte_separacion_bienes_onblur(this, iSeqRow) })
                                               .bind('focus', function() { sc_form_maecte_separacion_bienes_onfocus(this, iSeqRow) });
  $('#id_sc_field_disolucion_conyugal' + iSeqRow).bind('blur', function() { sc_form_maecte_disolucion_conyugal_onblur(this, iSeqRow) })
                                                 .bind('focus', function() { sc_form_maecte_disolucion_conyugal_onfocus(this, iSeqRow) });
  $('#id_sc_field_capitulaciones' + iSeqRow).bind('blur', function() { sc_form_maecte_capitulaciones_onblur(this, iSeqRow) })
                                            .bind('focus', function() { sc_form_maecte_capitulaciones_onfocus(this, iSeqRow) });
  $('#id_sc_field_numero_carga_familiar' + iSeqRow).bind('blur', function() { sc_form_maecte_numero_carga_familiar_onblur(this, iSeqRow) })
                                                   .bind('focus', function() { sc_form_maecte_numero_carga_familiar_onfocus(this, iSeqRow) });
  $('#id_sc_field_nivel_educacion' + iSeqRow).bind('blur', function() { sc_form_maecte_nivel_educacion_onblur(this, iSeqRow) })
                                             .bind('focus', function() { sc_form_maecte_nivel_educacion_onfocus(this, iSeqRow) });
  $('#id_sc_field_profesion' + iSeqRow).bind('blur', function() { sc_form_maecte_profesion_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_maecte_profesion_onfocus(this, iSeqRow) });
  $('#id_sc_field_envio_correspondencia' + iSeqRow).bind('blur', function() { sc_form_maecte_envio_correspondencia_onblur(this, iSeqRow) })
                                                   .bind('focus', function() { sc_form_maecte_envio_correspondencia_onfocus(this, iSeqRow) });
  $('#id_sc_field_nombre_arrendador' + iSeqRow).bind('blur', function() { sc_form_maecte_nombre_arrendador_onblur(this, iSeqRow) })
                                               .bind('focus', function() { sc_form_maecte_nombre_arrendador_onfocus(this, iSeqRow) });
  $('#id_sc_field_apellido_arrendador' + iSeqRow).bind('blur', function() { sc_form_maecte_apellido_arrendador_onblur(this, iSeqRow) })
                                                 .bind('focus', function() { sc_form_maecte_apellido_arrendador_onfocus(this, iSeqRow) });
  $('#id_sc_field_id_vivienda' + iSeqRow).bind('blur', function() { sc_form_maecte_id_vivienda_onblur(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_maecte_id_vivienda_onfocus(this, iSeqRow) });
  $('#id_sc_field_telefono_arrendador' + iSeqRow).bind('blur', function() { sc_form_maecte_telefono_arrendador_onblur(this, iSeqRow) })
                                                 .bind('focus', function() { sc_form_maecte_telefono_arrendador_onfocus(this, iSeqRow) });
  $('#id_sc_field_nombres_referencia' + iSeqRow).bind('blur', function() { sc_form_maecte_nombres_referencia_onblur(this, iSeqRow) })
                                                .bind('focus', function() { sc_form_maecte_nombres_referencia_onfocus(this, iSeqRow) });
  $('#id_sc_field_apellidos_referencia' + iSeqRow).bind('blur', function() { sc_form_maecte_apellidos_referencia_onblur(this, iSeqRow) })
                                                  .bind('focus', function() { sc_form_maecte_apellidos_referencia_onfocus(this, iSeqRow) });
  $('#id_sc_field_parentesco' + iSeqRow).bind('blur', function() { sc_form_maecte_parentesco_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_maecte_parentesco_onfocus(this, iSeqRow) });
  $('#id_sc_field_celular_ref' + iSeqRow).bind('blur', function() { sc_form_maecte_celular_ref_onblur(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_maecte_celular_ref_onfocus(this, iSeqRow) });
  $('#id_sc_field_telefono_convencional_ref' + iSeqRow).bind('blur', function() { sc_form_maecte_telefono_convencional_ref_onblur(this, iSeqRow) })
                                                       .bind('focus', function() { sc_form_maecte_telefono_convencional_ref_onfocus(this, iSeqRow) });
  $('#id_sc_field_id_ocupacion' + iSeqRow).bind('blur', function() { sc_form_maecte_id_ocupacion_onblur(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_maecte_id_ocupacion_onfocus(this, iSeqRow) });
  $('#id_sc_field_fecha_ingreso_empresa' + iSeqRow).bind('blur', function() { sc_form_maecte_fecha_ingreso_empresa_onblur(this, iSeqRow) })
                                                   .bind('focus', function() { sc_form_maecte_fecha_ingreso_empresa_onfocus(this, iSeqRow) });
  $('#id_sc_field_nombre_empresa' + iSeqRow).bind('blur', function() { sc_form_maecte_nombre_empresa_onblur(this, iSeqRow) })
                                            .bind('focus', function() { sc_form_maecte_nombre_empresa_onfocus(this, iSeqRow) });
  $('#id_sc_field_ciudad_empresa' + iSeqRow).bind('blur', function() { sc_form_maecte_ciudad_empresa_onblur(this, iSeqRow) })
                                            .bind('focus', function() { sc_form_maecte_ciudad_empresa_onfocus(this, iSeqRow) });
  $('#id_sc_field_provincia_empresa' + iSeqRow).bind('blur', function() { sc_form_maecte_provincia_empresa_onblur(this, iSeqRow) })
                                               .bind('focus', function() { sc_form_maecte_provincia_empresa_onfocus(this, iSeqRow) });
  $('#id_sc_field_direccion_empresa' + iSeqRow).bind('blur', function() { sc_form_maecte_direccion_empresa_onblur(this, iSeqRow) })
                                               .bind('focus', function() { sc_form_maecte_direccion_empresa_onfocus(this, iSeqRow) });
  $('#id_sc_field_cargo_empresa' + iSeqRow).bind('blur', function() { sc_form_maecte_cargo_empresa_onblur(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_maecte_cargo_empresa_onfocus(this, iSeqRow) });
  $('#id_sc_field_telefono_empresa' + iSeqRow).bind('blur', function() { sc_form_maecte_telefono_empresa_onblur(this, iSeqRow) })
                                              .bind('focus', function() { sc_form_maecte_telefono_empresa_onfocus(this, iSeqRow) });
  $('#id_sc_field_ext_empresa' + iSeqRow).bind('blur', function() { sc_form_maecte_ext_empresa_onblur(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_maecte_ext_empresa_onfocus(this, iSeqRow) });
  $('#id_sc_field_id_tipo_contrato_actividad' + iSeqRow).bind('blur', function() { sc_form_maecte_id_tipo_contrato_actividad_onblur(this, iSeqRow) })
                                                        .bind('focus', function() { sc_form_maecte_id_tipo_contrato_actividad_onfocus(this, iSeqRow) });
  $('#id_sc_field_empresa_jubilo_actividad' + iSeqRow).bind('blur', function() { sc_form_maecte_empresa_jubilo_actividad_onblur(this, iSeqRow) })
                                                      .bind('focus', function() { sc_form_maecte_empresa_jubilo_actividad_onfocus(this, iSeqRow) });
  $('#id_sc_field_fecha_salida_empresa_actividad' + iSeqRow).bind('blur', function() { sc_form_maecte_fecha_salida_empresa_actividad_onblur(this, iSeqRow) })
                                                            .bind('focus', function() { sc_form_maecte_fecha_salida_empresa_actividad_onfocus(this, iSeqRow) });
  $('#id_sc_field_cargo_salida_empresa_actividad' + iSeqRow).bind('blur', function() { sc_form_maecte_cargo_salida_empresa_actividad_onblur(this, iSeqRow) })
                                                            .bind('focus', function() { sc_form_maecte_cargo_salida_empresa_actividad_onfocus(this, iSeqRow) });
  $('#id_sc_field_fecha_inicio_actividad' + iSeqRow).bind('blur', function() { sc_form_maecte_fecha_inicio_actividad_onblur(this, iSeqRow) })
                                                    .bind('focus', function() { sc_form_maecte_fecha_inicio_actividad_onfocus(this, iSeqRow) });
  $('#id_sc_field_fecha_ingreso_empresa_actividad' + iSeqRow).bind('blur', function() { sc_form_maecte_fecha_ingreso_empresa_actividad_onblur(this, iSeqRow) })
                                                             .bind('focus', function() { sc_form_maecte_fecha_ingreso_empresa_actividad_onfocus(this, iSeqRow) });
  $('#id_sc_field_nombre_empresa_actividad' + iSeqRow).bind('blur', function() { sc_form_maecte_nombre_empresa_actividad_onblur(this, iSeqRow) })
                                                      .bind('focus', function() { sc_form_maecte_nombre_empresa_actividad_onfocus(this, iSeqRow) });
  $('#id_sc_field_institucion_actividad' + iSeqRow).bind('blur', function() { sc_form_maecte_institucion_actividad_onblur(this, iSeqRow) })
                                                   .bind('focus', function() { sc_form_maecte_institucion_actividad_onfocus(this, iSeqRow) });
  $('#id_sc_field_ciudad_actividad' + iSeqRow).bind('blur', function() { sc_form_maecte_ciudad_actividad_onblur(this, iSeqRow) })
                                              .bind('focus', function() { sc_form_maecte_ciudad_actividad_onfocus(this, iSeqRow) });
  $('#id_sc_field_provincia_actividad' + iSeqRow).bind('blur', function() { sc_form_maecte_provincia_actividad_onblur(this, iSeqRow) })
                                                 .bind('focus', function() { sc_form_maecte_provincia_actividad_onfocus(this, iSeqRow) });
  $('#id_sc_field_direccion_actividad' + iSeqRow).bind('blur', function() { sc_form_maecte_direccion_actividad_onblur(this, iSeqRow) })
                                                 .bind('focus', function() { sc_form_maecte_direccion_actividad_onfocus(this, iSeqRow) });
  $('#id_sc_field_calle_principal_actividad' + iSeqRow).bind('blur', function() { sc_form_maecte_calle_principal_actividad_onblur(this, iSeqRow) })
                                                       .bind('focus', function() { sc_form_maecte_calle_principal_actividad_onfocus(this, iSeqRow) });
  $('#id_sc_field_no_actividad' + iSeqRow).bind('blur', function() { sc_form_maecte_no_actividad_onblur(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_maecte_no_actividad_onfocus(this, iSeqRow) });
  $('#id_sc_field_calle_secundaria_actividad' + iSeqRow).bind('blur', function() { sc_form_maecte_calle_secundaria_actividad_onblur(this, iSeqRow) })
                                                        .bind('focus', function() { sc_form_maecte_calle_secundaria_actividad_onfocus(this, iSeqRow) });
  $('#id_sc_field_sector_actividad' + iSeqRow).bind('blur', function() { sc_form_maecte_sector_actividad_onblur(this, iSeqRow) })
                                              .bind('focus', function() { sc_form_maecte_sector_actividad_onfocus(this, iSeqRow) });
  $('#id_sc_field_pais_actividad' + iSeqRow).bind('blur', function() { sc_form_maecte_pais_actividad_onblur(this, iSeqRow) })
                                            .bind('focus', function() { sc_form_maecte_pais_actividad_onfocus(this, iSeqRow) });
  $('#id_sc_field_actividad' + iSeqRow).bind('blur', function() { sc_form_maecte_actividad_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_maecte_actividad_onfocus(this, iSeqRow) });
  $('#id_sc_field_telefono_actividad' + iSeqRow).bind('blur', function() { sc_form_maecte_telefono_actividad_onblur(this, iSeqRow) })
                                                .bind('focus', function() { sc_form_maecte_telefono_actividad_onfocus(this, iSeqRow) });
  $('#id_sc_field_cargo_actividad' + iSeqRow).bind('blur', function() { sc_form_maecte_cargo_actividad_onblur(this, iSeqRow) })
                                             .bind('focus', function() { sc_form_maecte_cargo_actividad_onfocus(this, iSeqRow) });
  $('#id_sc_field_ext_actividad' + iSeqRow).bind('blur', function() { sc_form_maecte_ext_actividad_onblur(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_maecte_ext_actividad_onfocus(this, iSeqRow) });
  $('#id_sc_field_fecha_ingreso_empresa_actividad2' + iSeqRow).bind('blur', function() { sc_form_maecte_fecha_ingreso_empresa_actividad2_onblur(this, iSeqRow) })
                                                              .bind('focus', function() { sc_form_maecte_fecha_ingreso_empresa_actividad2_onfocus(this, iSeqRow) });
  $('#id_sc_field_nombre_empresa_actividad2' + iSeqRow).bind('blur', function() { sc_form_maecte_nombre_empresa_actividad2_onblur(this, iSeqRow) })
                                                       .bind('focus', function() { sc_form_maecte_nombre_empresa_actividad2_onfocus(this, iSeqRow) });
  $('#id_sc_field_institucion_actividad2' + iSeqRow).bind('blur', function() { sc_form_maecte_institucion_actividad2_onblur(this, iSeqRow) })
                                                    .bind('focus', function() { sc_form_maecte_institucion_actividad2_onfocus(this, iSeqRow) });
  $('#id_sc_field_ciudad_actividad2' + iSeqRow).bind('blur', function() { sc_form_maecte_ciudad_actividad2_onblur(this, iSeqRow) })
                                               .bind('focus', function() { sc_form_maecte_ciudad_actividad2_onfocus(this, iSeqRow) });
  $('#id_sc_field_provincia_actividad2' + iSeqRow).bind('blur', function() { sc_form_maecte_provincia_actividad2_onblur(this, iSeqRow) })
                                                  .bind('focus', function() { sc_form_maecte_provincia_actividad2_onfocus(this, iSeqRow) });
  $('#id_sc_field_direccion_actividad2' + iSeqRow).bind('blur', function() { sc_form_maecte_direccion_actividad2_onblur(this, iSeqRow) })
                                                  .bind('focus', function() { sc_form_maecte_direccion_actividad2_onfocus(this, iSeqRow) });
  $('#id_sc_field_calle_principal_actividad2' + iSeqRow).bind('blur', function() { sc_form_maecte_calle_principal_actividad2_onblur(this, iSeqRow) })
                                                        .bind('focus', function() { sc_form_maecte_calle_principal_actividad2_onfocus(this, iSeqRow) });
  $('#id_sc_field_no_actividad2' + iSeqRow).bind('blur', function() { sc_form_maecte_no_actividad2_onblur(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_maecte_no_actividad2_onfocus(this, iSeqRow) });
  $('#id_sc_field_calle_secundaria_actividad2' + iSeqRow).bind('blur', function() { sc_form_maecte_calle_secundaria_actividad2_onblur(this, iSeqRow) })
                                                         .bind('focus', function() { sc_form_maecte_calle_secundaria_actividad2_onfocus(this, iSeqRow) });
  $('#id_sc_field_sector_actividad2' + iSeqRow).bind('blur', function() { sc_form_maecte_sector_actividad2_onblur(this, iSeqRow) })
                                               .bind('focus', function() { sc_form_maecte_sector_actividad2_onfocus(this, iSeqRow) });
  $('#id_sc_field_fecha_salida_empresa_actividad2' + iSeqRow).bind('blur', function() { sc_form_maecte_fecha_salida_empresa_actividad2_onblur(this, iSeqRow) })
                                                             .bind('focus', function() { sc_form_maecte_fecha_salida_empresa_actividad2_onfocus(this, iSeqRow) });
  $('#id_sc_field_fecha_inicio_actividad2' + iSeqRow).bind('blur', function() { sc_form_maecte_fecha_inicio_actividad2_onblur(this, iSeqRow) })
                                                     .bind('focus', function() { sc_form_maecte_fecha_inicio_actividad2_onfocus(this, iSeqRow) });
  $('#id_sc_field_actividad2' + iSeqRow).bind('blur', function() { sc_form_maecte_actividad2_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_maecte_actividad2_onfocus(this, iSeqRow) });
  $('#id_sc_field_telefono_actividad2' + iSeqRow).bind('blur', function() { sc_form_maecte_telefono_actividad2_onblur(this, iSeqRow) })
                                                 .bind('focus', function() { sc_form_maecte_telefono_actividad2_onfocus(this, iSeqRow) });
  $('#id_sc_field_ext_actividad2' + iSeqRow).bind('blur', function() { sc_form_maecte_ext_actividad2_onblur(this, iSeqRow) })
                                            .bind('focus', function() { sc_form_maecte_ext_actividad2_onfocus(this, iSeqRow) });
  $('#id_sc_field_cargo_actividad2' + iSeqRow).bind('blur', function() { sc_form_maecte_cargo_actividad2_onblur(this, iSeqRow) })
                                              .bind('focus', function() { sc_form_maecte_cargo_actividad2_onfocus(this, iSeqRow) });
  $('#id_sc_field_id_tipo_contrato_actividad2' + iSeqRow).bind('blur', function() { sc_form_maecte_id_tipo_contrato_actividad2_onblur(this, iSeqRow) })
                                                         .bind('focus', function() { sc_form_maecte_id_tipo_contrato_actividad2_onfocus(this, iSeqRow) });
  $('#id_sc_field_empresa_jubilo_actividad2' + iSeqRow).bind('blur', function() { sc_form_maecte_empresa_jubilo_actividad2_onblur(this, iSeqRow) })
                                                       .bind('focus', function() { sc_form_maecte_empresa_jubilo_actividad2_onfocus(this, iSeqRow) });
  $('#id_sc_field_sueldo' + iSeqRow).bind('blur', function() { sc_form_maecte_sueldo_onblur(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_maecte_sueldo_onfocus(this, iSeqRow) });
  $('#id_sc_field_arriendos' + iSeqRow).bind('blur', function() { sc_form_maecte_arriendos_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_maecte_arriendos_onfocus(this, iSeqRow) });
  $('#id_sc_field_dividendo_utilidades_ultimo_ano' + iSeqRow).bind('blur', function() { sc_form_maecte_dividendo_utilidades_ultimo_ano_onblur(this, iSeqRow) })
                                                             .bind('focus', function() { sc_form_maecte_dividendo_utilidades_ultimo_ano_onfocus(this, iSeqRow) });
  $('#id_sc_field_id_otros_ingresos' + iSeqRow).bind('blur', function() { sc_form_maecte_id_otros_ingresos_onblur(this, iSeqRow) })
                                               .bind('focus', function() { sc_form_maecte_id_otros_ingresos_onfocus(this, iSeqRow) });
  $('#id_sc_field_arriendo_hipoteca' + iSeqRow).bind('blur', function() { sc_form_maecte_arriendo_hipoteca_onblur(this, iSeqRow) })
                                               .bind('focus', function() { sc_form_maecte_arriendo_hipoteca_onfocus(this, iSeqRow) });
  $('#id_sc_field_prestamos' + iSeqRow).bind('blur', function() { sc_form_maecte_prestamos_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_maecte_prestamos_onfocus(this, iSeqRow) });
  $('#id_sc_field_tarjetas_creditos' + iSeqRow).bind('blur', function() { sc_form_maecte_tarjetas_creditos_onblur(this, iSeqRow) })
                                               .bind('focus', function() { sc_form_maecte_tarjetas_creditos_onfocus(this, iSeqRow) });
  $('#id_sc_field_gastos_familiares' + iSeqRow).bind('blur', function() { sc_form_maecte_gastos_familiares_onblur(this, iSeqRow) })
                                               .bind('focus', function() { sc_form_maecte_gastos_familiares_onfocus(this, iSeqRow) });
  $('#id_sc_field_id_otros_gastos' + iSeqRow).bind('blur', function() { sc_form_maecte_id_otros_gastos_onblur(this, iSeqRow) })
                                             .bind('focus', function() { sc_form_maecte_id_otros_gastos_onfocus(this, iSeqRow) });
  $('#id_sc_field_depositos_bancos' + iSeqRow).bind('blur', function() { sc_form_maecte_depositos_bancos_onblur(this, iSeqRow) })
                                              .bind('focus', function() { sc_form_maecte_depositos_bancos_onfocus(this, iSeqRow) });
  $('#id_sc_field_cuentas_documentos' + iSeqRow).bind('blur', function() { sc_form_maecte_cuentas_documentos_onblur(this, iSeqRow) })
                                                .bind('focus', function() { sc_form_maecte_cuentas_documentos_onfocus(this, iSeqRow) });
  $('#id_sc_field_mercaderias' + iSeqRow).bind('blur', function() { sc_form_maecte_mercaderias_onblur(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_maecte_mercaderias_onfocus(this, iSeqRow) });
  $('#id_sc_field_maquinarias_vehiculos' + iSeqRow).bind('blur', function() { sc_form_maecte_maquinarias_vehiculos_onblur(this, iSeqRow) })
                                                   .bind('focus', function() { sc_form_maecte_maquinarias_vehiculos_onfocus(this, iSeqRow) });
  $('#id_sc_field_terrenos_edificios' + iSeqRow).bind('blur', function() { sc_form_maecte_terrenos_edificios_onblur(this, iSeqRow) })
                                                .bind('focus', function() { sc_form_maecte_terrenos_edificios_onfocus(this, iSeqRow) });
  $('#id_sc_field_acciones_bonos_cedulas' + iSeqRow).bind('blur', function() { sc_form_maecte_acciones_bonos_cedulas_onblur(this, iSeqRow) })
                                                    .bind('focus', function() { sc_form_maecte_acciones_bonos_cedulas_onfocus(this, iSeqRow) });
  $('#id_sc_field_id_otros_activos' + iSeqRow).bind('blur', function() { sc_form_maecte_id_otros_activos_onblur(this, iSeqRow) })
                                              .bind('focus', function() { sc_form_maecte_id_otros_activos_onfocus(this, iSeqRow) });
  $('#id_sc_field_cuentas_por_pagar' + iSeqRow).bind('blur', function() { sc_form_maecte_cuentas_por_pagar_onblur(this, iSeqRow) })
                                               .bind('focus', function() { sc_form_maecte_cuentas_por_pagar_onfocus(this, iSeqRow) });
  $('#id_sc_field_prestamos_banco_menos_ano' + iSeqRow).bind('blur', function() { sc_form_maecte_prestamos_banco_menos_ano_onblur(this, iSeqRow) })
                                                       .bind('focus', function() { sc_form_maecte_prestamos_banco_menos_ano_onfocus(this, iSeqRow) });
  $('#id_sc_field_prestamos_banco_mas_ano' + iSeqRow).bind('blur', function() { sc_form_maecte_prestamos_banco_mas_ano_onblur(this, iSeqRow) })
                                                     .bind('focus', function() { sc_form_maecte_prestamos_banco_mas_ano_onfocus(this, iSeqRow) });
  $('#id_sc_field_deudas_tarjetas_creditos' + iSeqRow).bind('blur', function() { sc_form_maecte_deudas_tarjetas_creditos_onblur(this, iSeqRow) })
                                                      .bind('focus', function() { sc_form_maecte_deudas_tarjetas_creditos_onfocus(this, iSeqRow) });
  $('#id_sc_field_id_otras_obligaciones' + iSeqRow).bind('blur', function() { sc_form_maecte_id_otras_obligaciones_onblur(this, iSeqRow) })
                                                   .bind('focus', function() { sc_form_maecte_id_otras_obligaciones_onfocus(this, iSeqRow) });
  $('#id_sc_field_deudor' + iSeqRow).bind('blur', function() { sc_form_maecte_deudor_onblur(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_maecte_deudor_onfocus(this, iSeqRow) });
  $('#id_sc_field_monto' + iSeqRow).bind('blur', function() { sc_form_maecte_monto_onblur(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_maecte_monto_onfocus(this, iSeqRow) });
  $('#id_sc_field_descripcion' + iSeqRow).bind('blur', function() { sc_form_maecte_descripcion_onblur(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_maecte_descripcion_onfocus(this, iSeqRow) });
  $('#id_sc_field_placa' + iSeqRow).bind('blur', function() { sc_form_maecte_placa_onblur(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_maecte_placa_onfocus(this, iSeqRow) });
  $('#id_sc_field_valor_maquinaria_vehiculo' + iSeqRow).bind('blur', function() { sc_form_maecte_valor_maquinaria_vehiculo_onblur(this, iSeqRow) })
                                                       .bind('focus', function() { sc_form_maecte_valor_maquinaria_vehiculo_onfocus(this, iSeqRow) });
  $('#id_sc_field_a_nombre_de' + iSeqRow).bind('blur', function() { sc_form_maecte_a_nombre_de_onblur(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_maecte_a_nombre_de_onfocus(this, iSeqRow) });
  $('#id_sc_field_ubicacion' + iSeqRow).bind('blur', function() { sc_form_maecte_ubicacion_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_maecte_ubicacion_onfocus(this, iSeqRow) });
  $('#id_sc_field_valor_propiedad' + iSeqRow).bind('blur', function() { sc_form_maecte_valor_propiedad_onblur(this, iSeqRow) })
                                             .bind('focus', function() { sc_form_maecte_valor_propiedad_onfocus(this, iSeqRow) });
  $('#id_sc_field_empresa' + iSeqRow).bind('blur', function() { sc_form_maecte_empresa_onblur(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_maecte_empresa_onfocus(this, iSeqRow) });
  $('#id_sc_field_valor_mercado' + iSeqRow).bind('blur', function() { sc_form_maecte_valor_mercado_onblur(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_maecte_valor_mercado_onfocus(this, iSeqRow) });
  $('#id_sc_field_institucion_bancaria' + iSeqRow).bind('blur', function() { sc_form_maecte_institucion_bancaria_onblur(this, iSeqRow) })
                                                  .bind('focus', function() { sc_form_maecte_institucion_bancaria_onfocus(this, iSeqRow) });
  $('#id_sc_field_monto_banco' + iSeqRow).bind('blur', function() { sc_form_maecte_monto_banco_onblur(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_maecte_monto_banco_onfocus(this, iSeqRow) });
  $('#id_sc_field_institucion_finaciera' + iSeqRow).bind('blur', function() { sc_form_maecte_institucion_finaciera_onblur(this, iSeqRow) })
                                                   .bind('focus', function() { sc_form_maecte_institucion_finaciera_onfocus(this, iSeqRow) });
  $('#id_sc_field_monto_institucion_finaciera' + iSeqRow).bind('blur', function() { sc_form_maecte_monto_institucion_finaciera_onblur(this, iSeqRow) })
                                                         .bind('focus', function() { sc_form_maecte_monto_institucion_finaciera_onfocus(this, iSeqRow) });
  $('#id_sc_field_id_cliente_juridico' + iSeqRow).bind('blur', function() { sc_form_maecte_id_cliente_juridico_onblur(this, iSeqRow) })
                                                 .bind('focus', function() { sc_form_maecte_id_cliente_juridico_onfocus(this, iSeqRow) });
  $('#id_sc_field_nombre_completo_empresa' + iSeqRow).bind('blur', function() { sc_form_maecte_nombre_completo_empresa_onblur(this, iSeqRow) })
                                                     .bind('focus', function() { sc_form_maecte_nombre_completo_empresa_onfocus(this, iSeqRow) });
  $('#id_sc_field_es_empresa_extranjera' + iSeqRow).bind('blur', function() { sc_form_maecte_es_empresa_extranjera_onblur(this, iSeqRow) })
                                                   .bind('focus', function() { sc_form_maecte_es_empresa_extranjera_onfocus(this, iSeqRow) });
  $('#id_sc_field_pais_empresa' + iSeqRow).bind('blur', function() { sc_form_maecte_pais_empresa_onblur(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_maecte_pais_empresa_onfocus(this, iSeqRow) });
  $('#id_sc_field_fecha_constitucion_empresa' + iSeqRow).bind('blur', function() { sc_form_maecte_fecha_constitucion_empresa_onblur(this, iSeqRow) })
                                                        .bind('focus', function() { sc_form_maecte_fecha_constitucion_empresa_onfocus(this, iSeqRow) });
  $('#id_sc_field_id_oficina' + iSeqRow).bind('blur', function() { sc_form_maecte_id_oficina_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_maecte_id_oficina_onfocus(this, iSeqRow) });
  $('#id_sc_field_id_tipo_actividad' + iSeqRow).bind('blur', function() { sc_form_maecte_id_tipo_actividad_onblur(this, iSeqRow) })
                                               .bind('focus', function() { sc_form_maecte_id_tipo_actividad_onfocus(this, iSeqRow) });
  $('#id_sc_field_especifique_otros' + iSeqRow).bind('blur', function() { sc_form_maecte_especifique_otros_onblur(this, iSeqRow) })
                                               .bind('focus', function() { sc_form_maecte_especifique_otros_onfocus(this, iSeqRow) });
  $('#id_sc_field_direccion_correspondencia' + iSeqRow).bind('blur', function() { sc_form_maecte_direccion_correspondencia_onblur(this, iSeqRow) })
                                                       .bind('focus', function() { sc_form_maecte_direccion_correspondencia_onfocus(this, iSeqRow) });
  $('#id_sc_field_calle_principal_correspondencia' + iSeqRow).bind('blur', function() { sc_form_maecte_calle_principal_correspondencia_onblur(this, iSeqRow) })
                                                             .bind('focus', function() { sc_form_maecte_calle_principal_correspondencia_onfocus(this, iSeqRow) });
  $('#id_sc_field_no_correspondencia' + iSeqRow).bind('blur', function() { sc_form_maecte_no_correspondencia_onblur(this, iSeqRow) })
                                                .bind('focus', function() { sc_form_maecte_no_correspondencia_onfocus(this, iSeqRow) });
  $('#id_sc_field_calle_secundaria_correspondencia' + iSeqRow).bind('blur', function() { sc_form_maecte_calle_secundaria_correspondencia_onblur(this, iSeqRow) })
                                                              .bind('focus', function() { sc_form_maecte_calle_secundaria_correspondencia_onfocus(this, iSeqRow) });
  $('#id_sc_field_id_ciudad_correspondencia' + iSeqRow).bind('blur', function() { sc_form_maecte_id_ciudad_correspondencia_onblur(this, iSeqRow) })
                                                       .bind('focus', function() { sc_form_maecte_id_ciudad_correspondencia_onfocus(this, iSeqRow) });
  $('#id_sc_field_nombre_empresa_solicitante' + iSeqRow).bind('blur', function() { sc_form_maecte_nombre_empresa_solicitante_onblur(this, iSeqRow) })
                                                        .bind('focus', function() { sc_form_maecte_nombre_empresa_solicitante_onfocus(this, iSeqRow) });
  $('#id_sc_field_cargo_empresa_solicitante' + iSeqRow).bind('blur', function() { sc_form_maecte_cargo_empresa_solicitante_onblur(this, iSeqRow) })
                                                       .bind('focus', function() { sc_form_maecte_cargo_empresa_solicitante_onfocus(this, iSeqRow) });
  $('#id_sc_field_celular_empresa_solicitante' + iSeqRow).bind('blur', function() { sc_form_maecte_celular_empresa_solicitante_onblur(this, iSeqRow) })
                                                         .bind('focus', function() { sc_form_maecte_celular_empresa_solicitante_onfocus(this, iSeqRow) });
  $('#id_sc_field_telefono_empresa_solicitante' + iSeqRow).bind('blur', function() { sc_form_maecte_telefono_empresa_solicitante_onblur(this, iSeqRow) })
                                                          .bind('focus', function() { sc_form_maecte_telefono_empresa_solicitante_onfocus(this, iSeqRow) });
  $('#id_sc_field_mail_empresa_solicitante' + iSeqRow).bind('blur', function() { sc_form_maecte_mail_empresa_solicitante_onblur(this, iSeqRow) })
                                                      .bind('focus', function() { sc_form_maecte_mail_empresa_solicitante_onfocus(this, iSeqRow) });
  $('#id_sc_field_saldo_empresa_solicitante' + iSeqRow).bind('blur', function() { sc_form_maecte_saldo_empresa_solicitante_onblur(this, iSeqRow) })
                                                       .bind('focus', function() { sc_form_maecte_saldo_empresa_solicitante_onfocus(this, iSeqRow) });
  $('#id_sc_field_nombre_referencia_comerciales' + iSeqRow).bind('blur', function() { sc_form_maecte_nombre_referencia_comerciales_onblur(this, iSeqRow) })
                                                           .bind('focus', function() { sc_form_maecte_nombre_referencia_comerciales_onfocus(this, iSeqRow) });
  $('#id_sc_field_fecha_compra' + iSeqRow).bind('blur', function() { sc_form_maecte_fecha_compra_onblur(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_maecte_fecha_compra_onfocus(this, iSeqRow) });
  $('#id_sc_field_telefono_referencia_comerciales' + iSeqRow).bind('blur', function() { sc_form_maecte_telefono_referencia_comerciales_onblur(this, iSeqRow) })
                                                             .bind('focus', function() { sc_form_maecte_telefono_referencia_comerciales_onfocus(this, iSeqRow) });
  $('#id_sc_field_ventas' + iSeqRow).bind('blur', function() { sc_form_maecte_ventas_onblur(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_maecte_ventas_onfocus(this, iSeqRow) });
  $('#id_sc_field_comisiones' + iSeqRow).bind('blur', function() { sc_form_maecte_comisiones_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_maecte_comisiones_onfocus(this, iSeqRow) });
  $('#id_sc_field_gastos_operativos' + iSeqRow).bind('blur', function() { sc_form_maecte_gastos_operativos_onblur(this, iSeqRow) })
                                               .bind('focus', function() { sc_form_maecte_gastos_operativos_onfocus(this, iSeqRow) });
  $('#id_sc_field_gastos_administrativos' + iSeqRow).bind('blur', function() { sc_form_maecte_gastos_administrativos_onblur(this, iSeqRow) })
                                                    .bind('focus', function() { sc_form_maecte_gastos_administrativos_onfocus(this, iSeqRow) });
  $('#id_sc_field_pago_cuotas_prestamo' + iSeqRow).bind('blur', function() { sc_form_maecte_pago_cuotas_prestamo_onblur(this, iSeqRow) })
                                                  .bind('focus', function() { sc_form_maecte_pago_cuotas_prestamo_onfocus(this, iSeqRow) });
  $('#id_sc_field_funcionario' + iSeqRow).bind('blur', function() { sc_form_maecte_funcionario_onblur(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_maecte_funcionario_onfocus(this, iSeqRow) });
  $('#id_sc_field_funcionario_detalle' + iSeqRow).bind('blur', function() { sc_form_maecte_funcionario_detalle_onblur(this, iSeqRow) })
                                                 .bind('focus', function() { sc_form_maecte_funcionario_detalle_onfocus(this, iSeqRow) });
  $('#id_sc_field_miembro_politico' + iSeqRow).bind('blur', function() { sc_form_maecte_miembro_politico_onblur(this, iSeqRow) })
                                              .bind('focus', function() { sc_form_maecte_miembro_politico_onfocus(this, iSeqRow) });
  $('#id_sc_field_miembro_politico_detalle' + iSeqRow).bind('blur', function() { sc_form_maecte_miembro_politico_detalle_onblur(this, iSeqRow) })
                                                      .bind('focus', function() { sc_form_maecte_miembro_politico_detalle_onfocus(this, iSeqRow) });
  $('#id_sc_field_ejecutivo_gobierno' + iSeqRow).bind('blur', function() { sc_form_maecte_ejecutivo_gobierno_onblur(this, iSeqRow) })
                                                .bind('focus', function() { sc_form_maecte_ejecutivo_gobierno_onfocus(this, iSeqRow) });
  $('#id_sc_field_ejecutivo_gobierno_detalle' + iSeqRow).bind('blur', function() { sc_form_maecte_ejecutivo_gobierno_detalle_onblur(this, iSeqRow) })
                                                        .bind('focus', function() { sc_form_maecte_ejecutivo_gobierno_detalle_onfocus(this, iSeqRow) });
  $('#id_sc_field_familiar_gobierno' + iSeqRow).bind('blur', function() { sc_form_maecte_familiar_gobierno_onblur(this, iSeqRow) })
                                               .bind('focus', function() { sc_form_maecte_familiar_gobierno_onfocus(this, iSeqRow) });
  $('#id_sc_field_familiar_gobierno_detalle' + iSeqRow).bind('blur', function() { sc_form_maecte_familiar_gobierno_detalle_onblur(this, iSeqRow) })
                                                       .bind('focus', function() { sc_form_maecte_familiar_gobierno_detalle_onfocus(this, iSeqRow) });
  $('#id_sc_field_familiar_gobierno_detalle_quien' + iSeqRow).bind('blur', function() { sc_form_maecte_familiar_gobierno_detalle_quien_onblur(this, iSeqRow) })
                                                             .bind('focus', function() { sc_form_maecte_familiar_gobierno_detalle_quien_onfocus(this, iSeqRow) });
  $('#id_sc_field_otros_ingresos' + iSeqRow).bind('blur', function() { sc_form_maecte_otros_ingresos_onblur(this, iSeqRow) })
                                            .bind('focus', function() { sc_form_maecte_otros_ingresos_onfocus(this, iSeqRow) });
  $('#id_sc_field_otros_gastos' + iSeqRow).bind('blur', function() { sc_form_maecte_otros_gastos_onblur(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_maecte_otros_gastos_onfocus(this, iSeqRow) });
  $('#id_sc_field_otros_activos' + iSeqRow).bind('blur', function() { sc_form_maecte_otros_activos_onblur(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_maecte_otros_activos_onfocus(this, iSeqRow) });
  $('#id_sc_field_otras_obligaciones' + iSeqRow).bind('blur', function() { sc_form_maecte_otras_obligaciones_onblur(this, iSeqRow) })
                                                .bind('focus', function() { sc_form_maecte_otras_obligaciones_onfocus(this, iSeqRow) });
  $('#id_sc_field_sector_direccion_empresa' + iSeqRow).bind('blur', function() { sc_form_maecte_sector_direccion_empresa_onblur(this, iSeqRow) })
                                                      .bind('focus', function() { sc_form_maecte_sector_direccion_empresa_onfocus(this, iSeqRow) });
  $('#id_sc_field_sector_direccion_empresa_correo' + iSeqRow).bind('blur', function() { sc_form_maecte_sector_direccion_empresa_correo_onblur(this, iSeqRow) })
                                                             .bind('focus', function() { sc_form_maecte_sector_direccion_empresa_correo_onfocus(this, iSeqRow) });
  $('#id_sc_field_extranjero_nombres_referencia' + iSeqRow).bind('blur', function() { sc_form_maecte_extranjero_nombres_referencia_onblur(this, iSeqRow) })
                                                           .bind('focus', function() { sc_form_maecte_extranjero_nombres_referencia_onfocus(this, iSeqRow) });
  $('#id_sc_field_extranjero_apellidos_referencia' + iSeqRow).bind('blur', function() { sc_form_maecte_extranjero_apellidos_referencia_onblur(this, iSeqRow) })
                                                             .bind('focus', function() { sc_form_maecte_extranjero_apellidos_referencia_onfocus(this, iSeqRow) });
  $('#id_sc_field_extranjero_parentesco' + iSeqRow).bind('blur', function() { sc_form_maecte_extranjero_parentesco_onblur(this, iSeqRow) })
                                                   .bind('focus', function() { sc_form_maecte_extranjero_parentesco_onfocus(this, iSeqRow) });
  $('#id_sc_field_extranjero_celular_ref' + iSeqRow).bind('blur', function() { sc_form_maecte_extranjero_celular_ref_onblur(this, iSeqRow) })
                                                    .bind('focus', function() { sc_form_maecte_extranjero_celular_ref_onfocus(this, iSeqRow) });
  $('#id_sc_field_extranjero_telefono_convencional_ref' + iSeqRow).bind('blur', function() { sc_form_maecte_extranjero_telefono_convencional_ref_onblur(this, iSeqRow) })
                                                                  .bind('focus', function() { sc_form_maecte_extranjero_telefono_convencional_ref_onfocus(this, iSeqRow) });
  $('#id_sc_field_cargo_representante_legal' + iSeqRow).bind('blur', function() { sc_form_maecte_cargo_representante_legal_onblur(this, iSeqRow) })
                                                       .bind('focus', function() { sc_form_maecte_cargo_representante_legal_onfocus(this, iSeqRow) });
  $('#id_sc_field_direccion_extranjero' + iSeqRow).bind('blur', function() { sc_form_maecte_direccion_extranjero_onblur(this, iSeqRow) })
                                                  .bind('focus', function() { sc_form_maecte_direccion_extranjero_onfocus(this, iSeqRow) });
  $('#id_sc_field_relacion_dependencia_principal' + iSeqRow).bind('blur', function() { sc_form_maecte_relacion_dependencia_principal_onblur(this, iSeqRow) })
                                                            .bind('focus', function() { sc_form_maecte_relacion_dependencia_principal_onfocus(this, iSeqRow) });
  $('#id_sc_field_correo_corporativo_principal' + iSeqRow).bind('blur', function() { sc_form_maecte_correo_corporativo_principal_onblur(this, iSeqRow) })
                                                          .bind('focus', function() { sc_form_maecte_correo_corporativo_principal_onfocus(this, iSeqRow) });
  $('#id_sc_field_relacion_dependencia_secundaria' + iSeqRow).bind('blur', function() { sc_form_maecte_relacion_dependencia_secundaria_onblur(this, iSeqRow) })
                                                             .bind('focus', function() { sc_form_maecte_relacion_dependencia_secundaria_onfocus(this, iSeqRow) });
  $('#id_sc_field_correo_corporativo_secundario' + iSeqRow).bind('blur', function() { sc_form_maecte_correo_corporativo_secundario_onblur(this, iSeqRow) })
                                                           .bind('focus', function() { sc_form_maecte_correo_corporativo_secundario_onfocus(this, iSeqRow) });
  $('#id_sc_field_actividad_secundaria' + iSeqRow).bind('blur', function() { sc_form_maecte_actividad_secundaria_onblur(this, iSeqRow) })
                                                  .bind('focus', function() { sc_form_maecte_actividad_secundaria_onfocus(this, iSeqRow) });
  $('#id_sc_field_id_pais_empresa' + iSeqRow).bind('blur', function() { sc_form_maecte_id_pais_empresa_onblur(this, iSeqRow) })
                                             .bind('focus', function() { sc_form_maecte_id_pais_empresa_onfocus(this, iSeqRow) });
  $('#id_sc_field_id_provincia_empresa' + iSeqRow).bind('blur', function() { sc_form_maecte_id_provincia_empresa_onblur(this, iSeqRow) })
                                                  .bind('focus', function() { sc_form_maecte_id_provincia_empresa_onfocus(this, iSeqRow) });
  $('#id_sc_field_id_pais_correo' + iSeqRow).bind('blur', function() { sc_form_maecte_id_pais_correo_onblur(this, iSeqRow) })
                                            .bind('focus', function() { sc_form_maecte_id_pais_correo_onfocus(this, iSeqRow) });
  $('#id_sc_field_id_provincia_correo' + iSeqRow).bind('blur', function() { sc_form_maecte_id_provincia_correo_onblur(this, iSeqRow) })
                                                 .bind('focus', function() { sc_form_maecte_id_provincia_correo_onfocus(this, iSeqRow) });
  $('#id_sc_field_apellido_empresa_solicitante' + iSeqRow).bind('blur', function() { sc_form_maecte_apellido_empresa_solicitante_onblur(this, iSeqRow) })
                                                          .bind('focus', function() { sc_form_maecte_apellido_empresa_solicitante_onfocus(this, iSeqRow) });
  $('#id_sc_field_pais_actividad2' + iSeqRow).bind('blur', function() { sc_form_maecte_pais_actividad2_onblur(this, iSeqRow) })
                                             .bind('focus', function() { sc_form_maecte_pais_actividad2_onfocus(this, iSeqRow) });
  $('#id_sc_field_id_provincia_exterior' + iSeqRow).bind('blur', function() { sc_form_maecte_id_provincia_exterior_onblur(this, iSeqRow) })
                                                   .bind('focus', function() { sc_form_maecte_id_provincia_exterior_onfocus(this, iSeqRow) });
  $('#id_sc_field_pais_independiente' + iSeqRow).bind('blur', function() { sc_form_maecte_pais_independiente_onblur(this, iSeqRow) })
                                                .bind('focus', function() { sc_form_maecte_pais_independiente_onfocus(this, iSeqRow) });
  $('#id_sc_field_tipo_contrato_otros_actividad_principal' + iSeqRow).bind('blur', function() { sc_form_maecte_tipo_contrato_otros_actividad_principal_onblur(this, iSeqRow) })
                                                                     .bind('focus', function() { sc_form_maecte_tipo_contrato_otros_actividad_principal_onfocus(this, iSeqRow) });
  $('#id_sc_field_actividadeconomica' + iSeqRow).bind('blur', function() { sc_form_maecte_actividadeconomica_onblur(this, iSeqRow) })
                                                .bind('focus', function() { sc_form_maecte_actividadeconomica_onfocus(this, iSeqRow) });
  $('#id_sc_field_clasesujeto' + iSeqRow).bind('blur', function() { sc_form_maecte_clasesujeto_onblur(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_maecte_clasesujeto_onfocus(this, iSeqRow) });
  $('#id_sc_field_provincia' + iSeqRow).bind('blur', function() { sc_form_maecte_provincia_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_maecte_provincia_onfocus(this, iSeqRow) });
  $('#id_sc_field_parroquia' + iSeqRow).bind('blur', function() { sc_form_maecte_parroquia_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_maecte_parroquia_onfocus(this, iSeqRow) });
  $('#id_sc_field_canton' + iSeqRow).bind('blur', function() { sc_form_maecte_canton_onblur(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_maecte_canton_onfocus(this, iSeqRow) });
  $('#id_sc_field_demandajudicial' + iSeqRow).bind('blur', function() { sc_form_maecte_demandajudicial_onblur(this, iSeqRow) })
                                             .bind('focus', function() { sc_form_maecte_demandajudicial_onfocus(this, iSeqRow) });
  $('#id_sc_field_vdemandajudicial' + iSeqRow).bind('blur', function() { sc_form_maecte_vdemandajudicial_onblur(this, iSeqRow) })
                                              .bind('focus', function() { sc_form_maecte_vdemandajudicial_onfocus(this, iSeqRow) });
  $('#id_sc_field_carteracastigada' + iSeqRow).bind('blur', function() { sc_form_maecte_carteracastigada_onblur(this, iSeqRow) })
                                              .bind('focus', function() { sc_form_maecte_carteracastigada_onfocus(this, iSeqRow) });
  $('#id_sc_field_vcarteracastigada' + iSeqRow).bind('blur', function() { sc_form_maecte_vcarteracastigada_onblur(this, iSeqRow) })
                                               .bind('focus', function() { sc_form_maecte_vcarteracastigada_onfocus(this, iSeqRow) });
  $('#id_sc_field_accesoexterno01' + iSeqRow).bind('blur', function() { sc_form_maecte_accesoexterno01_onblur(this, iSeqRow) })
                                             .bind('focus', function() { sc_form_maecte_accesoexterno01_onfocus(this, iSeqRow) });
  $('#id_sc_field_referencia' + iSeqRow).bind('blur', function() { sc_form_maecte_referencia_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_maecte_referencia_onfocus(this, iSeqRow) });
  $('#id_sc_field_id_pais_empleado_dir_desempeno' + iSeqRow).bind('blur', function() { sc_form_maecte_id_pais_empleado_dir_desempeno_onblur(this, iSeqRow) })
                                                            .bind('focus', function() { sc_form_maecte_id_pais_empleado_dir_desempeno_onfocus(this, iSeqRow) });
  $('#id_sc_field_id_provincia_empleado_dir_desempeno' + iSeqRow).bind('blur', function() { sc_form_maecte_id_provincia_empleado_dir_desempeno_onblur(this, iSeqRow) })
                                                                 .bind('focus', function() { sc_form_maecte_id_provincia_empleado_dir_desempeno_onfocus(this, iSeqRow) });
  $('#id_sc_field_id_ciudad_empleado_dir_desempeno' + iSeqRow).bind('blur', function() { sc_form_maecte_id_ciudad_empleado_dir_desempeno_onblur(this, iSeqRow) })
                                                              .bind('focus', function() { sc_form_maecte_id_ciudad_empleado_dir_desempeno_onfocus(this, iSeqRow) });
  $('#id_sc_field_razon_social' + iSeqRow).bind('blur', function() { sc_form_maecte_razon_social_onblur(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_maecte_razon_social_onfocus(this, iSeqRow) });
  $('#id_sc_field_parterel01' + iSeqRow).bind('blur', function() { sc_form_maecte_parterel01_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_maecte_parterel01_onfocus(this, iSeqRow) });
  $('#id_sc_field_origen_fondos' + iSeqRow).bind('blur', function() { sc_form_maecte_origen_fondos_onblur(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_maecte_origen_fondos_onfocus(this, iSeqRow) });
  $('#id_sc_field_tipo_identificacion' + iSeqRow).bind('blur', function() { sc_form_maecte_tipo_identificacion_onblur(this, iSeqRow) })
                                                 .bind('focus', function() { sc_form_maecte_tipo_identificacion_onfocus(this, iSeqRow) });
  $('#id_sc_field_id_actividad' + iSeqRow).bind('blur', function() { sc_form_maecte_id_actividad_onblur(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_maecte_id_actividad_onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_maecte_codcte01_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_codcte01();
  scCssBlur(oThis);
}

function sc_form_maecte_codcte01_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_tipo_cliente_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_tipo_cliente();
  scCssBlur(oThis);
}

function sc_form_maecte_tipo_cliente_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_id_nacionalidad_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_id_nacionalidad();
  scCssBlur(oThis);
}

function sc_form_maecte_id_nacionalidad_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_nomcte01_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_nomcte01();
  scCssBlur(oThis);
}

function sc_form_maecte_nomcte01_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_primer_nombre_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_primer_nombre();
  scCssBlur(oThis);
}

function sc_form_maecte_primer_nombre_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_segundo_nombre_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_segundo_nombre();
  scCssBlur(oThis);
}

function sc_form_maecte_segundo_nombre_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_primer_apellido_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_primer_apellido();
  scCssBlur(oThis);
}

function sc_form_maecte_primer_apellido_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_segundo_apellido_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_segundo_apellido();
  scCssBlur(oThis);
}

function sc_form_maecte_segundo_apellido_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_cv1cte01_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_cv1cte01();
  scCssBlur(oThis);
}

function sc_form_maecte_cv1cte01_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_cv2cte01_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_cv2cte01();
  scCssBlur(oThis);
}

function sc_form_maecte_cv2cte01_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_tipcte01_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_tipcte01();
  scCssBlur(oThis);
}

function sc_form_maecte_tipcte01_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_ofienccte01_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_ofienccte01();
  scCssBlur(oThis);
}

function sc_form_maecte_ofienccte01_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_vendcte01_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_vendcte01();
  scCssBlur(oThis);
}

function sc_form_maecte_vendcte01_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_cobrcte01_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_cobrcte01();
  scCssBlur(oThis);
}

function sc_form_maecte_cobrcte01_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_loccte01_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_loccte01();
  scCssBlur(oThis);
}

function sc_form_maecte_loccte01_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_dircte01_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_dircte01();
  scCssBlur(oThis);
}

function sc_form_maecte_dircte01_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_sector_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_sector();
  scCssBlur(oThis);
}

function sc_form_maecte_sector_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_calle_principal_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_calle_principal();
  scCssBlur(oThis);
}

function sc_form_maecte_calle_principal_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_no_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_no();
  scCssBlur(oThis);
}

function sc_form_maecte_no_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_calle_secundaria_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_calle_secundaria();
  scCssBlur(oThis);
}

function sc_form_maecte_calle_secundaria_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_id_pais_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_id_pais();
  scCssBlur(oThis);
}

function sc_form_maecte_id_pais_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_id_provincia_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_id_provincia();
  scCssBlur(oThis);
}

function sc_form_maecte_id_provincia_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_id_ciudad_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_id_ciudad();
  scCssBlur(oThis);
}

function sc_form_maecte_id_ciudad_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_id_canton_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_id_canton();
  scCssBlur(oThis);
}

function sc_form_maecte_id_canton_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_telcte01_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_telcte01();
  scCssBlur(oThis);
}

function sc_form_maecte_telcte01_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_cascte01_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_cascte01();
  scCssBlur(oThis);
}

function sc_form_maecte_cascte01_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_ci_conyuge_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_ci_conyuge();
  scCssBlur(oThis);
}

function sc_form_maecte_ci_conyuge_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_conyuge_tipo_identidad_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_conyuge_tipo_identidad();
  scCssBlur(oThis);
}

function sc_form_maecte_conyuge_tipo_identidad_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_conyuge_primer_nombre_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_conyuge_primer_nombre();
  scCssBlur(oThis);
}

function sc_form_maecte_conyuge_primer_nombre_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_conyuge_segundo_nombre_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_conyuge_segundo_nombre();
  scCssBlur(oThis);
}

function sc_form_maecte_conyuge_segundo_nombre_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_conyuge_primer_apellido_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_conyuge_primer_apellido();
  scCssBlur(oThis);
}

function sc_form_maecte_conyuge_primer_apellido_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_conyuge_segundo_apellido_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_conyuge_segundo_apellido();
  scCssBlur(oThis);
}

function sc_form_maecte_conyuge_segundo_apellido_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_conyuge_profesion_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_conyuge_profesion();
  scCssBlur(oThis);
}

function sc_form_maecte_conyuge_profesion_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_id_tipo_documento_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_id_tipo_documento();
  scCssBlur(oThis);
}

function sc_form_maecte_id_tipo_documento_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_repleg01_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_repleg01();
  scCssBlur(oThis);
}

function sc_form_maecte_repleg01_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_fecing01_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_fecing01();
  scCssBlur(oThis);
}

function sc_form_maecte_fecing01_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_fecing01();
  scCssBlur(oThis);
}

function sc_form_maecte_fecing01_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_fecing01_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_condpag01_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_condpag01();
  scCssBlur(oThis);
}

function sc_form_maecte_condpag01_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_desctocte01_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_desctocte01();
  scCssBlur(oThis);
}

function sc_form_maecte_desctocte01_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_limcred01_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_limcred01();
  scCssBlur(oThis);
}

function sc_form_maecte_limcred01_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_desppar01_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_desppar01();
  scCssBlur(oThis);
}

function sc_form_maecte_desppar01_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_cheqpro01_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_cheqpro01();
  scCssBlur(oThis);
}

function sc_form_maecte_cheqpro01_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_sdoeje01_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_sdoeje01();
  scCssBlur(oThis);
}

function sc_form_maecte_sdoeje01_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_sdoant01_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_sdoant01();
  scCssBlur(oThis);
}

function sc_form_maecte_sdoant01_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_sdoact01_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_sdoact01();
  scCssBlur(oThis);
}

function sc_form_maecte_sdoact01_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_acudbm01_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_acudbm01();
  scCssBlur(oThis);
}

function sc_form_maecte_acudbm01_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_acucrm01_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_acucrm01();
  scCssBlur(oThis);
}

function sc_form_maecte_acucrm01_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_acudbe01_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_acudbe01();
  scCssBlur(oThis);
}

function sc_form_maecte_acudbe01_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_acucre01_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_acucre01();
  scCssBlur(oThis);
}

function sc_form_maecte_acucre01_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_comentcte01_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_comentcte01();
  scCssBlur(oThis);
}

function sc_form_maecte_comentcte01_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_statuscte01_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_statuscte01();
  scCssBlur(oThis);
}

function sc_form_maecte_statuscte01_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_identcte01_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_identcte01();
  scCssBlur(oThis);
}

function sc_form_maecte_identcte01_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_cordcte01_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_cordcte01();
  scCssBlur(oThis);
}

function sc_form_maecte_cordcte01_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_limcant01_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_limcant01();
  scCssBlur(oThis);
}

function sc_form_maecte_limcant01_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_pagleg01_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_pagleg01();
  scCssBlur(oThis);
}

function sc_form_maecte_pagleg01_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_telcte01b_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_telcte01b();
  scCssBlur(oThis);
}

function sc_form_maecte_telcte01b_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_telcte01c_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_telcte01c();
  scCssBlur(oThis);
}

function sc_form_maecte_telcte01c_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_emailcte01_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_emailcte01();
  scCssBlur(oThis);
}

function sc_form_maecte_emailcte01_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_calle_principal_exterior_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_calle_principal_exterior();
  scCssBlur(oThis);
}

function sc_form_maecte_calle_principal_exterior_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_no_exterior_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_no_exterior();
  scCssBlur(oThis);
}

function sc_form_maecte_no_exterior_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_calle_secundaria_exterior_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_calle_secundaria_exterior();
  scCssBlur(oThis);
}

function sc_form_maecte_calle_secundaria_exterior_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_id_pais_exterior_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_id_pais_exterior();
  scCssBlur(oThis);
}

function sc_form_maecte_id_pais_exterior_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_id_ciudad_exterior_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_id_ciudad_exterior();
  scCssBlur(oThis);
}

function sc_form_maecte_id_ciudad_exterior_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_codigo_postal_exterior_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_codigo_postal_exterior();
  scCssBlur(oThis);
}

function sc_form_maecte_codigo_postal_exterior_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_sector_exterior_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_sector_exterior();
  scCssBlur(oThis);
}

function sc_form_maecte_sector_exterior_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_telefono_exterior_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_telefono_exterior();
  scCssBlur(oThis);
}

function sc_form_maecte_telefono_exterior_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_celular_exterior_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_celular_exterior();
  scCssBlur(oThis);
}

function sc_form_maecte_celular_exterior_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_email_exterior_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_email_exterior();
  scCssBlur(oThis);
}

function sc_form_maecte_email_exterior_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_emailaltcte01_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_emailaltcte01();
  scCssBlur(oThis);
}

function sc_form_maecte_emailaltcte01_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_ctacgcte01_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_ctacgcte01();
  scCssBlur(oThis);
}

function sc_form_maecte_ctacgcte01_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_obsercte01_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_obsercte01();
  scCssBlur(oThis);
}

function sc_form_maecte_obsercte01_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_totexceso01_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_totexceso01();
  scCssBlur(oThis);
}

function sc_form_maecte_totexceso01_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_imagencte01_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_imagencte01();
  scCssBlur(oThis);
}

function sc_form_maecte_imagencte01_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_block_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_block();
  scCssBlur(oThis);
}

function sc_form_maecte_block_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_uid_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_uid();
  scCssBlur(oThis);
}

function sc_form_maecte_uid_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_ultimoacceso_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_ultimoacceso();
  scCssBlur(oThis);
}

function sc_form_maecte_ultimoacceso_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_idcli_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_idcli();
  scCssBlur(oThis);
}

function sc_form_maecte_idcli_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_catcte01_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_catcte01();
  scCssBlur(oThis);
}

function sc_form_maecte_catcte01_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_transferido_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_transferido();
  scCssBlur(oThis);
}

function sc_form_maecte_transferido_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_password_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_password();
  scCssBlur(oThis);
}

function sc_form_maecte_password_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_showroom_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_showroom();
  scCssBlur(oThis);
}

function sc_form_maecte_showroom_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_orden_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_orden();
  scCssBlur(oThis);
}

function sc_form_maecte_orden_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_website_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_website();
  scCssBlur(oThis);
}

function sc_form_maecte_website_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_longitud01_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_longitud01();
  scCssBlur(oThis);
}

function sc_form_maecte_longitud01_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_latitud01_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_latitud01();
  scCssBlur(oThis);
}

function sc_form_maecte_latitud01_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_zoom01_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_zoom01();
  scCssBlur(oThis);
}

function sc_form_maecte_zoom01_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_acceder_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_acceder();
  scCssBlur(oThis);
}

function sc_form_maecte_acceder_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_coniva01_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_coniva01();
  scCssBlur(oThis);
}

function sc_form_maecte_coniva01_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_idemp01_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_idemp01();
  scCssBlur(oThis);
}

function sc_form_maecte_idemp01_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_codprov01_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_codprov01();
  scCssBlur(oThis);
}

function sc_form_maecte_codprov01_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_celular01_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_celular01();
  scCssBlur(oThis);
}

function sc_form_maecte_celular01_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_dircliente01_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_dircliente01();
  scCssBlur(oThis);
}

function sc_form_maecte_dircliente01_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_razcte01_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_razcte01();
  scCssBlur(oThis);
}

function sc_form_maecte_razcte01_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_ruc01_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_ruc01();
  scCssBlur(oThis);
}

function sc_form_maecte_ruc01_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_timenegocio01_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_timenegocio01();
  scCssBlur(oThis);
}

function sc_form_maecte_timenegocio01_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_refbanc01_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_refbanc01();
  scCssBlur(oThis);
}

function sc_form_maecte_refbanc01_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_refcom01_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_refcom01();
  scCssBlur(oThis);
}

function sc_form_maecte_refcom01_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_tarjcred01_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_tarjcred01();
  scCssBlur(oThis);
}

function sc_form_maecte_tarjcred01_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_firmaut01_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_firmaut01();
  scCssBlur(oThis);
}

function sc_form_maecte_firmaut01_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_precte01_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_precte01();
  scCssBlur(oThis);
}

function sc_form_maecte_precte01_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_cuotasven01_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_cuotasven01();
  scCssBlur(oThis);
}

function sc_form_maecte_cuotasven01_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_diasven01_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_diasven01();
  scCssBlur(oThis);
}

function sc_form_maecte_diasven01_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_fechanace01_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_fechanace01();
  scCssBlur(oThis);
}

function sc_form_maecte_fechanace01_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_sexo01_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_sexo01();
  scCssBlur(oThis);
}

function sc_form_maecte_sexo01_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_estadocivil01_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_estadocivil01();
  scCssBlur(oThis);
}

function sc_form_maecte_estadocivil01_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_dirgestion01_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_dirgestion01();
  scCssBlur(oThis);
}

function sc_form_maecte_dirgestion01_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_numhijos01_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_numhijos01();
  scCssBlur(oThis);
}

function sc_form_maecte_numhijos01_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_estsop01_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_estsop01();
  scCssBlur(oThis);
}

function sc_form_maecte_estsop01_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_notick01_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_notick01();
  scCssBlur(oThis);
}

function sc_form_maecte_notick01_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_chequece_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_chequece();
  scCssBlur(oThis);
}

function sc_form_maecte_chequece_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_solcre_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_solcre();
  scCssBlur(oThis);
}

function sc_form_maecte_solcre_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_promocte01_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_promocte01();
  scCssBlur(oThis);
}

function sc_form_maecte_promocte01_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_pagare01_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_pagare01();
  scCssBlur(oThis);
}

function sc_form_maecte_pagare01_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_valorpagare01_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_valorpagare01();
  scCssBlur(oThis);
}

function sc_form_maecte_valorpagare01_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_garante01_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_garante01();
  scCssBlur(oThis);
}

function sc_form_maecte_garante01_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_fecvenp01_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_fecvenp01();
  scCssBlur(oThis);
}

function sc_form_maecte_fecvenp01_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_ctacgant01_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_ctacgant01();
  scCssBlur(oThis);
}

function sc_form_maecte_ctacgant01_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_dsn_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_dsn();
  scCssBlur(oThis);
}

function sc_form_maecte_dsn_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_residente_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_residente();
  scCssBlur(oThis);
}

function sc_form_maecte_residente_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_medio_contacto_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_medio_contacto();
  scCssBlur(oThis);
}

function sc_form_maecte_medio_contacto_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_separacion_bienes_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_separacion_bienes();
  scCssBlur(oThis);
}

function sc_form_maecte_separacion_bienes_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_disolucion_conyugal_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_disolucion_conyugal();
  scCssBlur(oThis);
}

function sc_form_maecte_disolucion_conyugal_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_capitulaciones_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_capitulaciones();
  scCssBlur(oThis);
}

function sc_form_maecte_capitulaciones_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_numero_carga_familiar_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_numero_carga_familiar();
  scCssBlur(oThis);
}

function sc_form_maecte_numero_carga_familiar_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_nivel_educacion_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_nivel_educacion();
  scCssBlur(oThis);
}

function sc_form_maecte_nivel_educacion_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_profesion_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_profesion();
  scCssBlur(oThis);
}

function sc_form_maecte_profesion_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_envio_correspondencia_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_envio_correspondencia();
  scCssBlur(oThis);
}

function sc_form_maecte_envio_correspondencia_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_nombre_arrendador_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_nombre_arrendador();
  scCssBlur(oThis);
}

function sc_form_maecte_nombre_arrendador_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_apellido_arrendador_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_apellido_arrendador();
  scCssBlur(oThis);
}

function sc_form_maecte_apellido_arrendador_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_id_vivienda_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_id_vivienda();
  scCssBlur(oThis);
}

function sc_form_maecte_id_vivienda_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_telefono_arrendador_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_telefono_arrendador();
  scCssBlur(oThis);
}

function sc_form_maecte_telefono_arrendador_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_nombres_referencia_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_nombres_referencia();
  scCssBlur(oThis);
}

function sc_form_maecte_nombres_referencia_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_apellidos_referencia_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_apellidos_referencia();
  scCssBlur(oThis);
}

function sc_form_maecte_apellidos_referencia_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_parentesco_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_parentesco();
  scCssBlur(oThis);
}

function sc_form_maecte_parentesco_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_celular_ref_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_celular_ref();
  scCssBlur(oThis);
}

function sc_form_maecte_celular_ref_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_telefono_convencional_ref_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_telefono_convencional_ref();
  scCssBlur(oThis);
}

function sc_form_maecte_telefono_convencional_ref_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_id_ocupacion_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_id_ocupacion();
  scCssBlur(oThis);
}

function sc_form_maecte_id_ocupacion_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_fecha_ingreso_empresa_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_fecha_ingreso_empresa();
  scCssBlur(oThis);
}

function sc_form_maecte_fecha_ingreso_empresa_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_nombre_empresa_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_nombre_empresa();
  scCssBlur(oThis);
}

function sc_form_maecte_nombre_empresa_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_ciudad_empresa_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_ciudad_empresa();
  scCssBlur(oThis);
}

function sc_form_maecte_ciudad_empresa_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_provincia_empresa_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_provincia_empresa();
  scCssBlur(oThis);
}

function sc_form_maecte_provincia_empresa_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_direccion_empresa_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_direccion_empresa();
  scCssBlur(oThis);
}

function sc_form_maecte_direccion_empresa_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_cargo_empresa_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_cargo_empresa();
  scCssBlur(oThis);
}

function sc_form_maecte_cargo_empresa_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_telefono_empresa_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_telefono_empresa();
  scCssBlur(oThis);
}

function sc_form_maecte_telefono_empresa_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_ext_empresa_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_ext_empresa();
  scCssBlur(oThis);
}

function sc_form_maecte_ext_empresa_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_id_tipo_contrato_actividad_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_id_tipo_contrato_actividad();
  scCssBlur(oThis);
}

function sc_form_maecte_id_tipo_contrato_actividad_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_empresa_jubilo_actividad_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_empresa_jubilo_actividad();
  scCssBlur(oThis);
}

function sc_form_maecte_empresa_jubilo_actividad_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_fecha_salida_empresa_actividad_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_fecha_salida_empresa_actividad();
  scCssBlur(oThis);
}

function sc_form_maecte_fecha_salida_empresa_actividad_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_cargo_salida_empresa_actividad_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_cargo_salida_empresa_actividad();
  scCssBlur(oThis);
}

function sc_form_maecte_cargo_salida_empresa_actividad_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_fecha_inicio_actividad_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_fecha_inicio_actividad();
  scCssBlur(oThis);
}

function sc_form_maecte_fecha_inicio_actividad_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_fecha_ingreso_empresa_actividad_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_fecha_ingreso_empresa_actividad();
  scCssBlur(oThis);
}

function sc_form_maecte_fecha_ingreso_empresa_actividad_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_nombre_empresa_actividad_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_nombre_empresa_actividad();
  scCssBlur(oThis);
}

function sc_form_maecte_nombre_empresa_actividad_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_institucion_actividad_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_institucion_actividad();
  scCssBlur(oThis);
}

function sc_form_maecte_institucion_actividad_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_ciudad_actividad_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_ciudad_actividad();
  scCssBlur(oThis);
}

function sc_form_maecte_ciudad_actividad_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_provincia_actividad_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_provincia_actividad();
  scCssBlur(oThis);
}

function sc_form_maecte_provincia_actividad_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_direccion_actividad_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_direccion_actividad();
  scCssBlur(oThis);
}

function sc_form_maecte_direccion_actividad_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_calle_principal_actividad_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_calle_principal_actividad();
  scCssBlur(oThis);
}

function sc_form_maecte_calle_principal_actividad_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_no_actividad_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_no_actividad();
  scCssBlur(oThis);
}

function sc_form_maecte_no_actividad_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_calle_secundaria_actividad_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_calle_secundaria_actividad();
  scCssBlur(oThis);
}

function sc_form_maecte_calle_secundaria_actividad_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_sector_actividad_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_sector_actividad();
  scCssBlur(oThis);
}

function sc_form_maecte_sector_actividad_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_pais_actividad_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_pais_actividad();
  scCssBlur(oThis);
}

function sc_form_maecte_pais_actividad_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_actividad_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_actividad();
  scCssBlur(oThis);
}

function sc_form_maecte_actividad_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_telefono_actividad_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_telefono_actividad();
  scCssBlur(oThis);
}

function sc_form_maecte_telefono_actividad_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_cargo_actividad_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_cargo_actividad();
  scCssBlur(oThis);
}

function sc_form_maecte_cargo_actividad_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_ext_actividad_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_ext_actividad();
  scCssBlur(oThis);
}

function sc_form_maecte_ext_actividad_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_fecha_ingreso_empresa_actividad2_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_fecha_ingreso_empresa_actividad2();
  scCssBlur(oThis);
}

function sc_form_maecte_fecha_ingreso_empresa_actividad2_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_nombre_empresa_actividad2_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_nombre_empresa_actividad2();
  scCssBlur(oThis);
}

function sc_form_maecte_nombre_empresa_actividad2_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_institucion_actividad2_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_institucion_actividad2();
  scCssBlur(oThis);
}

function sc_form_maecte_institucion_actividad2_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_ciudad_actividad2_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_ciudad_actividad2();
  scCssBlur(oThis);
}

function sc_form_maecte_ciudad_actividad2_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_provincia_actividad2_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_provincia_actividad2();
  scCssBlur(oThis);
}

function sc_form_maecte_provincia_actividad2_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_direccion_actividad2_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_direccion_actividad2();
  scCssBlur(oThis);
}

function sc_form_maecte_direccion_actividad2_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_calle_principal_actividad2_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_calle_principal_actividad2();
  scCssBlur(oThis);
}

function sc_form_maecte_calle_principal_actividad2_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_no_actividad2_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_no_actividad2();
  scCssBlur(oThis);
}

function sc_form_maecte_no_actividad2_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_calle_secundaria_actividad2_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_calle_secundaria_actividad2();
  scCssBlur(oThis);
}

function sc_form_maecte_calle_secundaria_actividad2_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_sector_actividad2_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_sector_actividad2();
  scCssBlur(oThis);
}

function sc_form_maecte_sector_actividad2_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_fecha_salida_empresa_actividad2_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_fecha_salida_empresa_actividad2();
  scCssBlur(oThis);
}

function sc_form_maecte_fecha_salida_empresa_actividad2_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_fecha_inicio_actividad2_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_fecha_inicio_actividad2();
  scCssBlur(oThis);
}

function sc_form_maecte_fecha_inicio_actividad2_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_actividad2_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_actividad2();
  scCssBlur(oThis);
}

function sc_form_maecte_actividad2_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_telefono_actividad2_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_telefono_actividad2();
  scCssBlur(oThis);
}

function sc_form_maecte_telefono_actividad2_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_ext_actividad2_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_ext_actividad2();
  scCssBlur(oThis);
}

function sc_form_maecte_ext_actividad2_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_cargo_actividad2_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_cargo_actividad2();
  scCssBlur(oThis);
}

function sc_form_maecte_cargo_actividad2_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_id_tipo_contrato_actividad2_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_id_tipo_contrato_actividad2();
  scCssBlur(oThis);
}

function sc_form_maecte_id_tipo_contrato_actividad2_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_empresa_jubilo_actividad2_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_empresa_jubilo_actividad2();
  scCssBlur(oThis);
}

function sc_form_maecte_empresa_jubilo_actividad2_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_sueldo_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_sueldo();
  scCssBlur(oThis);
}

function sc_form_maecte_sueldo_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_arriendos_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_arriendos();
  scCssBlur(oThis);
}

function sc_form_maecte_arriendos_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_dividendo_utilidades_ultimo_ano_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_dividendo_utilidades_ultimo_ano();
  scCssBlur(oThis);
}

function sc_form_maecte_dividendo_utilidades_ultimo_ano_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_id_otros_ingresos_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_id_otros_ingresos();
  scCssBlur(oThis);
}

function sc_form_maecte_id_otros_ingresos_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_arriendo_hipoteca_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_arriendo_hipoteca();
  scCssBlur(oThis);
}

function sc_form_maecte_arriendo_hipoteca_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_prestamos_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_prestamos();
  scCssBlur(oThis);
}

function sc_form_maecte_prestamos_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_tarjetas_creditos_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_tarjetas_creditos();
  scCssBlur(oThis);
}

function sc_form_maecte_tarjetas_creditos_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_gastos_familiares_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_gastos_familiares();
  scCssBlur(oThis);
}

function sc_form_maecte_gastos_familiares_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_id_otros_gastos_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_id_otros_gastos();
  scCssBlur(oThis);
}

function sc_form_maecte_id_otros_gastos_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_depositos_bancos_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_depositos_bancos();
  scCssBlur(oThis);
}

function sc_form_maecte_depositos_bancos_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_cuentas_documentos_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_cuentas_documentos();
  scCssBlur(oThis);
}

function sc_form_maecte_cuentas_documentos_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_mercaderias_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_mercaderias();
  scCssBlur(oThis);
}

function sc_form_maecte_mercaderias_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_maquinarias_vehiculos_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_maquinarias_vehiculos();
  scCssBlur(oThis);
}

function sc_form_maecte_maquinarias_vehiculos_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_terrenos_edificios_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_terrenos_edificios();
  scCssBlur(oThis);
}

function sc_form_maecte_terrenos_edificios_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_acciones_bonos_cedulas_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_acciones_bonos_cedulas();
  scCssBlur(oThis);
}

function sc_form_maecte_acciones_bonos_cedulas_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_id_otros_activos_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_id_otros_activos();
  scCssBlur(oThis);
}

function sc_form_maecte_id_otros_activos_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_cuentas_por_pagar_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_cuentas_por_pagar();
  scCssBlur(oThis);
}

function sc_form_maecte_cuentas_por_pagar_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_prestamos_banco_menos_ano_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_prestamos_banco_menos_ano();
  scCssBlur(oThis);
}

function sc_form_maecte_prestamos_banco_menos_ano_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_prestamos_banco_mas_ano_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_prestamos_banco_mas_ano();
  scCssBlur(oThis);
}

function sc_form_maecte_prestamos_banco_mas_ano_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_deudas_tarjetas_creditos_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_deudas_tarjetas_creditos();
  scCssBlur(oThis);
}

function sc_form_maecte_deudas_tarjetas_creditos_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_id_otras_obligaciones_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_id_otras_obligaciones();
  scCssBlur(oThis);
}

function sc_form_maecte_id_otras_obligaciones_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_deudor_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_deudor();
  scCssBlur(oThis);
}

function sc_form_maecte_deudor_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_monto_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_monto();
  scCssBlur(oThis);
}

function sc_form_maecte_monto_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_descripcion_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_descripcion();
  scCssBlur(oThis);
}

function sc_form_maecte_descripcion_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_placa_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_placa();
  scCssBlur(oThis);
}

function sc_form_maecte_placa_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_valor_maquinaria_vehiculo_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_valor_maquinaria_vehiculo();
  scCssBlur(oThis);
}

function sc_form_maecte_valor_maquinaria_vehiculo_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_a_nombre_de_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_a_nombre_de();
  scCssBlur(oThis);
}

function sc_form_maecte_a_nombre_de_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_ubicacion_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_ubicacion();
  scCssBlur(oThis);
}

function sc_form_maecte_ubicacion_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_valor_propiedad_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_valor_propiedad();
  scCssBlur(oThis);
}

function sc_form_maecte_valor_propiedad_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_empresa_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_empresa();
  scCssBlur(oThis);
}

function sc_form_maecte_empresa_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_valor_mercado_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_valor_mercado();
  scCssBlur(oThis);
}

function sc_form_maecte_valor_mercado_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_institucion_bancaria_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_institucion_bancaria();
  scCssBlur(oThis);
}

function sc_form_maecte_institucion_bancaria_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_monto_banco_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_monto_banco();
  scCssBlur(oThis);
}

function sc_form_maecte_monto_banco_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_institucion_finaciera_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_institucion_finaciera();
  scCssBlur(oThis);
}

function sc_form_maecte_institucion_finaciera_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_monto_institucion_finaciera_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_monto_institucion_finaciera();
  scCssBlur(oThis);
}

function sc_form_maecte_monto_institucion_finaciera_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_id_cliente_juridico_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_id_cliente_juridico();
  scCssBlur(oThis);
}

function sc_form_maecte_id_cliente_juridico_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_nombre_completo_empresa_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_nombre_completo_empresa();
  scCssBlur(oThis);
}

function sc_form_maecte_nombre_completo_empresa_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_es_empresa_extranjera_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_es_empresa_extranjera();
  scCssBlur(oThis);
}

function sc_form_maecte_es_empresa_extranjera_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_pais_empresa_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_pais_empresa();
  scCssBlur(oThis);
}

function sc_form_maecte_pais_empresa_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_fecha_constitucion_empresa_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_fecha_constitucion_empresa();
  scCssBlur(oThis);
}

function sc_form_maecte_fecha_constitucion_empresa_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_id_oficina_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_id_oficina();
  scCssBlur(oThis);
}

function sc_form_maecte_id_oficina_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_id_tipo_actividad_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_id_tipo_actividad();
  scCssBlur(oThis);
}

function sc_form_maecte_id_tipo_actividad_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_especifique_otros_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_especifique_otros();
  scCssBlur(oThis);
}

function sc_form_maecte_especifique_otros_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_direccion_correspondencia_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_direccion_correspondencia();
  scCssBlur(oThis);
}

function sc_form_maecte_direccion_correspondencia_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_calle_principal_correspondencia_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_calle_principal_correspondencia();
  scCssBlur(oThis);
}

function sc_form_maecte_calle_principal_correspondencia_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_no_correspondencia_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_no_correspondencia();
  scCssBlur(oThis);
}

function sc_form_maecte_no_correspondencia_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_calle_secundaria_correspondencia_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_calle_secundaria_correspondencia();
  scCssBlur(oThis);
}

function sc_form_maecte_calle_secundaria_correspondencia_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_id_ciudad_correspondencia_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_id_ciudad_correspondencia();
  scCssBlur(oThis);
}

function sc_form_maecte_id_ciudad_correspondencia_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_nombre_empresa_solicitante_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_nombre_empresa_solicitante();
  scCssBlur(oThis);
}

function sc_form_maecte_nombre_empresa_solicitante_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_cargo_empresa_solicitante_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_cargo_empresa_solicitante();
  scCssBlur(oThis);
}

function sc_form_maecte_cargo_empresa_solicitante_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_celular_empresa_solicitante_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_celular_empresa_solicitante();
  scCssBlur(oThis);
}

function sc_form_maecte_celular_empresa_solicitante_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_telefono_empresa_solicitante_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_telefono_empresa_solicitante();
  scCssBlur(oThis);
}

function sc_form_maecte_telefono_empresa_solicitante_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_mail_empresa_solicitante_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_mail_empresa_solicitante();
  scCssBlur(oThis);
}

function sc_form_maecte_mail_empresa_solicitante_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_saldo_empresa_solicitante_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_saldo_empresa_solicitante();
  scCssBlur(oThis);
}

function sc_form_maecte_saldo_empresa_solicitante_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_nombre_referencia_comerciales_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_nombre_referencia_comerciales();
  scCssBlur(oThis);
}

function sc_form_maecte_nombre_referencia_comerciales_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_fecha_compra_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_fecha_compra();
  scCssBlur(oThis);
}

function sc_form_maecte_fecha_compra_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_telefono_referencia_comerciales_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_telefono_referencia_comerciales();
  scCssBlur(oThis);
}

function sc_form_maecte_telefono_referencia_comerciales_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_ventas_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_ventas();
  scCssBlur(oThis);
}

function sc_form_maecte_ventas_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_comisiones_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_comisiones();
  scCssBlur(oThis);
}

function sc_form_maecte_comisiones_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_gastos_operativos_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_gastos_operativos();
  scCssBlur(oThis);
}

function sc_form_maecte_gastos_operativos_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_gastos_administrativos_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_gastos_administrativos();
  scCssBlur(oThis);
}

function sc_form_maecte_gastos_administrativos_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_pago_cuotas_prestamo_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_pago_cuotas_prestamo();
  scCssBlur(oThis);
}

function sc_form_maecte_pago_cuotas_prestamo_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_funcionario_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_funcionario();
  scCssBlur(oThis);
}

function sc_form_maecte_funcionario_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_funcionario_detalle_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_funcionario_detalle();
  scCssBlur(oThis);
}

function sc_form_maecte_funcionario_detalle_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_miembro_politico_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_miembro_politico();
  scCssBlur(oThis);
}

function sc_form_maecte_miembro_politico_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_miembro_politico_detalle_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_miembro_politico_detalle();
  scCssBlur(oThis);
}

function sc_form_maecte_miembro_politico_detalle_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_ejecutivo_gobierno_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_ejecutivo_gobierno();
  scCssBlur(oThis);
}

function sc_form_maecte_ejecutivo_gobierno_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_ejecutivo_gobierno_detalle_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_ejecutivo_gobierno_detalle();
  scCssBlur(oThis);
}

function sc_form_maecte_ejecutivo_gobierno_detalle_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_familiar_gobierno_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_familiar_gobierno();
  scCssBlur(oThis);
}

function sc_form_maecte_familiar_gobierno_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_familiar_gobierno_detalle_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_familiar_gobierno_detalle();
  scCssBlur(oThis);
}

function sc_form_maecte_familiar_gobierno_detalle_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_familiar_gobierno_detalle_quien_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_familiar_gobierno_detalle_quien();
  scCssBlur(oThis);
}

function sc_form_maecte_familiar_gobierno_detalle_quien_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_otros_ingresos_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_otros_ingresos();
  scCssBlur(oThis);
}

function sc_form_maecte_otros_ingresos_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_otros_gastos_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_otros_gastos();
  scCssBlur(oThis);
}

function sc_form_maecte_otros_gastos_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_otros_activos_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_otros_activos();
  scCssBlur(oThis);
}

function sc_form_maecte_otros_activos_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_otras_obligaciones_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_otras_obligaciones();
  scCssBlur(oThis);
}

function sc_form_maecte_otras_obligaciones_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_sector_direccion_empresa_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_sector_direccion_empresa();
  scCssBlur(oThis);
}

function sc_form_maecte_sector_direccion_empresa_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_sector_direccion_empresa_correo_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_sector_direccion_empresa_correo();
  scCssBlur(oThis);
}

function sc_form_maecte_sector_direccion_empresa_correo_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_extranjero_nombres_referencia_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_extranjero_nombres_referencia();
  scCssBlur(oThis);
}

function sc_form_maecte_extranjero_nombres_referencia_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_extranjero_apellidos_referencia_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_extranjero_apellidos_referencia();
  scCssBlur(oThis);
}

function sc_form_maecte_extranjero_apellidos_referencia_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_extranjero_parentesco_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_extranjero_parentesco();
  scCssBlur(oThis);
}

function sc_form_maecte_extranjero_parentesco_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_extranjero_celular_ref_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_extranjero_celular_ref();
  scCssBlur(oThis);
}

function sc_form_maecte_extranjero_celular_ref_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_extranjero_telefono_convencional_ref_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_extranjero_telefono_convencional_ref();
  scCssBlur(oThis);
}

function sc_form_maecte_extranjero_telefono_convencional_ref_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_cargo_representante_legal_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_cargo_representante_legal();
  scCssBlur(oThis);
}

function sc_form_maecte_cargo_representante_legal_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_direccion_extranjero_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_direccion_extranjero();
  scCssBlur(oThis);
}

function sc_form_maecte_direccion_extranjero_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_relacion_dependencia_principal_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_relacion_dependencia_principal();
  scCssBlur(oThis);
}

function sc_form_maecte_relacion_dependencia_principal_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_correo_corporativo_principal_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_correo_corporativo_principal();
  scCssBlur(oThis);
}

function sc_form_maecte_correo_corporativo_principal_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_relacion_dependencia_secundaria_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_relacion_dependencia_secundaria();
  scCssBlur(oThis);
}

function sc_form_maecte_relacion_dependencia_secundaria_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_correo_corporativo_secundario_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_correo_corporativo_secundario();
  scCssBlur(oThis);
}

function sc_form_maecte_correo_corporativo_secundario_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_actividad_secundaria_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_actividad_secundaria();
  scCssBlur(oThis);
}

function sc_form_maecte_actividad_secundaria_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_id_pais_empresa_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_id_pais_empresa();
  scCssBlur(oThis);
}

function sc_form_maecte_id_pais_empresa_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_id_provincia_empresa_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_id_provincia_empresa();
  scCssBlur(oThis);
}

function sc_form_maecte_id_provincia_empresa_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_id_pais_correo_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_id_pais_correo();
  scCssBlur(oThis);
}

function sc_form_maecte_id_pais_correo_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_id_provincia_correo_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_id_provincia_correo();
  scCssBlur(oThis);
}

function sc_form_maecte_id_provincia_correo_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_apellido_empresa_solicitante_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_apellido_empresa_solicitante();
  scCssBlur(oThis);
}

function sc_form_maecte_apellido_empresa_solicitante_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_pais_actividad2_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_pais_actividad2();
  scCssBlur(oThis);
}

function sc_form_maecte_pais_actividad2_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_id_provincia_exterior_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_id_provincia_exterior();
  scCssBlur(oThis);
}

function sc_form_maecte_id_provincia_exterior_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_pais_independiente_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_pais_independiente();
  scCssBlur(oThis);
}

function sc_form_maecte_pais_independiente_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_tipo_contrato_otros_actividad_principal_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_tipo_contrato_otros_actividad_principal();
  scCssBlur(oThis);
}

function sc_form_maecte_tipo_contrato_otros_actividad_principal_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_actividadeconomica_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_actividadeconomica();
  scCssBlur(oThis);
}

function sc_form_maecte_actividadeconomica_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_clasesujeto_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_clasesujeto();
  scCssBlur(oThis);
}

function sc_form_maecte_clasesujeto_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_provincia_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_provincia();
  scCssBlur(oThis);
}

function sc_form_maecte_provincia_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_parroquia_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_parroquia();
  scCssBlur(oThis);
}

function sc_form_maecte_parroquia_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_canton_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_canton();
  scCssBlur(oThis);
}

function sc_form_maecte_canton_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_demandajudicial_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_demandajudicial();
  scCssBlur(oThis);
}

function sc_form_maecte_demandajudicial_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_vdemandajudicial_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_vdemandajudicial();
  scCssBlur(oThis);
}

function sc_form_maecte_vdemandajudicial_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_carteracastigada_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_carteracastigada();
  scCssBlur(oThis);
}

function sc_form_maecte_carteracastigada_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_vcarteracastigada_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_vcarteracastigada();
  scCssBlur(oThis);
}

function sc_form_maecte_vcarteracastigada_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_accesoexterno01_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_accesoexterno01();
  scCssBlur(oThis);
}

function sc_form_maecte_accesoexterno01_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_referencia_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_referencia();
  scCssBlur(oThis);
}

function sc_form_maecte_referencia_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_id_pais_empleado_dir_desempeno_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_id_pais_empleado_dir_desempeno();
  scCssBlur(oThis);
}

function sc_form_maecte_id_pais_empleado_dir_desempeno_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_id_provincia_empleado_dir_desempeno_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_id_provincia_empleado_dir_desempeno();
  scCssBlur(oThis);
}

function sc_form_maecte_id_provincia_empleado_dir_desempeno_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_id_ciudad_empleado_dir_desempeno_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_id_ciudad_empleado_dir_desempeno();
  scCssBlur(oThis);
}

function sc_form_maecte_id_ciudad_empleado_dir_desempeno_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_razon_social_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_razon_social();
  scCssBlur(oThis);
}

function sc_form_maecte_razon_social_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_parterel01_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_parterel01();
  scCssBlur(oThis);
}

function sc_form_maecte_parterel01_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_origen_fondos_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_origen_fondos();
  scCssBlur(oThis);
}

function sc_form_maecte_origen_fondos_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_tipo_identificacion_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_tipo_identificacion();
  scCssBlur(oThis);
}

function sc_form_maecte_tipo_identificacion_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecte_id_actividad_onblur(oThis, iSeqRow) {
  do_ajax_form_maecte_mob_validate_id_actividad();
  scCssBlur(oThis);
}

function sc_form_maecte_id_actividad_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function displayChange_block(block, status) {
	if ("0" == block) {
		displayChange_block_0(status);
	}
}

function displayChange_block_0(status) {
	displayChange_field("codcte01", "", status);
	displayChange_field("tipo_cliente", "", status);
	displayChange_field("id_nacionalidad", "", status);
	displayChange_field("nomcte01", "", status);
	displayChange_field("primer_nombre", "", status);
	displayChange_field("segundo_nombre", "", status);
	displayChange_field("primer_apellido", "", status);
	displayChange_field("segundo_apellido", "", status);
	displayChange_field("cv1cte01", "", status);
	displayChange_field("cv2cte01", "", status);
	displayChange_field("tipcte01", "", status);
	displayChange_field("ofienccte01", "", status);
	displayChange_field("vendcte01", "", status);
	displayChange_field("cobrcte01", "", status);
	displayChange_field("loccte01", "", status);
	displayChange_field("dircte01", "", status);
	displayChange_field("sector", "", status);
	displayChange_field("calle_principal", "", status);
	displayChange_field("no", "", status);
	displayChange_field("calle_secundaria", "", status);
	displayChange_field("id_pais", "", status);
	displayChange_field("id_provincia", "", status);
	displayChange_field("id_ciudad", "", status);
	displayChange_field("id_canton", "", status);
	displayChange_field("telcte01", "", status);
	displayChange_field("cascte01", "", status);
	displayChange_field("ci_conyuge", "", status);
	displayChange_field("conyuge_tipo_identidad", "", status);
	displayChange_field("conyuge_primer_nombre", "", status);
	displayChange_field("conyuge_segundo_nombre", "", status);
	displayChange_field("conyuge_primer_apellido", "", status);
	displayChange_field("conyuge_segundo_apellido", "", status);
	displayChange_field("conyuge_profesion", "", status);
	displayChange_field("id_tipo_documento", "", status);
	displayChange_field("repleg01", "", status);
	displayChange_field("fecing01", "", status);
	displayChange_field("condpag01", "", status);
	displayChange_field("desctocte01", "", status);
	displayChange_field("limcred01", "", status);
	displayChange_field("desppar01", "", status);
	displayChange_field("cheqpro01", "", status);
	displayChange_field("sdoeje01", "", status);
	displayChange_field("sdoant01", "", status);
	displayChange_field("sdoact01", "", status);
	displayChange_field("acudbm01", "", status);
	displayChange_field("acucrm01", "", status);
	displayChange_field("acudbe01", "", status);
	displayChange_field("acucre01", "", status);
	displayChange_field("comentcte01", "", status);
	displayChange_field("statuscte01", "", status);
	displayChange_field("identcte01", "", status);
	displayChange_field("cordcte01", "", status);
	displayChange_field("limcant01", "", status);
	displayChange_field("pagleg01", "", status);
	displayChange_field("telcte01b", "", status);
	displayChange_field("telcte01c", "", status);
	displayChange_field("emailcte01", "", status);
	displayChange_field("calle_principal_exterior", "", status);
	displayChange_field("no_exterior", "", status);
	displayChange_field("calle_secundaria_exterior", "", status);
	displayChange_field("id_pais_exterior", "", status);
	displayChange_field("id_ciudad_exterior", "", status);
	displayChange_field("codigo_postal_exterior", "", status);
	displayChange_field("sector_exterior", "", status);
	displayChange_field("telefono_exterior", "", status);
	displayChange_field("celular_exterior", "", status);
	displayChange_field("email_exterior", "", status);
	displayChange_field("emailaltcte01", "", status);
	displayChange_field("ctacgcte01", "", status);
	displayChange_field("obsercte01", "", status);
	displayChange_field("totexceso01", "", status);
	displayChange_field("imagencte01", "", status);
	displayChange_field("block", "", status);
	displayChange_field("uid", "", status);
	displayChange_field("ultimoacceso", "", status);
	displayChange_field("idcli", "", status);
	displayChange_field("catcte01", "", status);
	displayChange_field("transferido", "", status);
	displayChange_field("password", "", status);
	displayChange_field("showroom", "", status);
	displayChange_field("orden", "", status);
	displayChange_field("website", "", status);
	displayChange_field("longitud01", "", status);
	displayChange_field("latitud01", "", status);
	displayChange_field("zoom01", "", status);
	displayChange_field("acceder", "", status);
	displayChange_field("coniva01", "", status);
	displayChange_field("idemp01", "", status);
	displayChange_field("codprov01", "", status);
	displayChange_field("celular01", "", status);
	displayChange_field("dircliente01", "", status);
	displayChange_field("razcte01", "", status);
	displayChange_field("ruc01", "", status);
	displayChange_field("timenegocio01", "", status);
	displayChange_field("refbanc01", "", status);
	displayChange_field("refcom01", "", status);
	displayChange_field("tarjcred01", "", status);
	displayChange_field("firmaut01", "", status);
	displayChange_field("precte01", "", status);
	displayChange_field("cuotasven01", "", status);
	displayChange_field("diasven01", "", status);
	displayChange_field("fechanace01", "", status);
	displayChange_field("sexo01", "", status);
	displayChange_field("estadocivil01", "", status);
	displayChange_field("dirgestion01", "", status);
	displayChange_field("numhijos01", "", status);
	displayChange_field("estsop01", "", status);
	displayChange_field("notick01", "", status);
	displayChange_field("chequece", "", status);
	displayChange_field("solcre", "", status);
	displayChange_field("promocte01", "", status);
	displayChange_field("pagare01", "", status);
	displayChange_field("valorpagare01", "", status);
	displayChange_field("garante01", "", status);
	displayChange_field("fecvenp01", "", status);
	displayChange_field("ctacgant01", "", status);
	displayChange_field("dsn", "", status);
	displayChange_field("residente", "", status);
	displayChange_field("medio_contacto", "", status);
	displayChange_field("separacion_bienes", "", status);
	displayChange_field("disolucion_conyugal", "", status);
	displayChange_field("capitulaciones", "", status);
	displayChange_field("numero_carga_familiar", "", status);
	displayChange_field("nivel_educacion", "", status);
	displayChange_field("profesion", "", status);
	displayChange_field("envio_correspondencia", "", status);
	displayChange_field("nombre_arrendador", "", status);
	displayChange_field("apellido_arrendador", "", status);
	displayChange_field("id_vivienda", "", status);
	displayChange_field("telefono_arrendador", "", status);
	displayChange_field("nombres_referencia", "", status);
	displayChange_field("apellidos_referencia", "", status);
	displayChange_field("parentesco", "", status);
	displayChange_field("celular_ref", "", status);
	displayChange_field("telefono_convencional_ref", "", status);
	displayChange_field("id_ocupacion", "", status);
	displayChange_field("fecha_ingreso_empresa", "", status);
	displayChange_field("nombre_empresa", "", status);
	displayChange_field("ciudad_empresa", "", status);
	displayChange_field("provincia_empresa", "", status);
	displayChange_field("direccion_empresa", "", status);
	displayChange_field("cargo_empresa", "", status);
	displayChange_field("telefono_empresa", "", status);
	displayChange_field("ext_empresa", "", status);
	displayChange_field("id_tipo_contrato_actividad", "", status);
	displayChange_field("empresa_jubilo_actividad", "", status);
	displayChange_field("fecha_salida_empresa_actividad", "", status);
	displayChange_field("cargo_salida_empresa_actividad", "", status);
	displayChange_field("fecha_inicio_actividad", "", status);
	displayChange_field("fecha_ingreso_empresa_actividad", "", status);
	displayChange_field("nombre_empresa_actividad", "", status);
	displayChange_field("institucion_actividad", "", status);
	displayChange_field("ciudad_actividad", "", status);
	displayChange_field("provincia_actividad", "", status);
	displayChange_field("direccion_actividad", "", status);
	displayChange_field("calle_principal_actividad", "", status);
	displayChange_field("no_actividad", "", status);
	displayChange_field("calle_secundaria_actividad", "", status);
	displayChange_field("sector_actividad", "", status);
	displayChange_field("pais_actividad", "", status);
	displayChange_field("actividad", "", status);
	displayChange_field("telefono_actividad", "", status);
	displayChange_field("cargo_actividad", "", status);
	displayChange_field("ext_actividad", "", status);
	displayChange_field("fecha_ingreso_empresa_actividad2", "", status);
	displayChange_field("nombre_empresa_actividad2", "", status);
	displayChange_field("institucion_actividad2", "", status);
	displayChange_field("ciudad_actividad2", "", status);
	displayChange_field("provincia_actividad2", "", status);
	displayChange_field("direccion_actividad2", "", status);
	displayChange_field("calle_principal_actividad2", "", status);
	displayChange_field("no_actividad2", "", status);
	displayChange_field("calle_secundaria_actividad2", "", status);
	displayChange_field("sector_actividad2", "", status);
	displayChange_field("fecha_salida_empresa_actividad2", "", status);
	displayChange_field("fecha_inicio_actividad2", "", status);
	displayChange_field("actividad2", "", status);
	displayChange_field("telefono_actividad2", "", status);
	displayChange_field("ext_actividad2", "", status);
	displayChange_field("cargo_actividad2", "", status);
	displayChange_field("id_tipo_contrato_actividad2", "", status);
	displayChange_field("empresa_jubilo_actividad2", "", status);
	displayChange_field("sueldo", "", status);
	displayChange_field("arriendos", "", status);
	displayChange_field("dividendo_utilidades_ultimo_ano", "", status);
	displayChange_field("id_otros_ingresos", "", status);
	displayChange_field("arriendo_hipoteca", "", status);
	displayChange_field("prestamos", "", status);
	displayChange_field("tarjetas_creditos", "", status);
	displayChange_field("gastos_familiares", "", status);
	displayChange_field("id_otros_gastos", "", status);
	displayChange_field("depositos_bancos", "", status);
	displayChange_field("cuentas_documentos", "", status);
	displayChange_field("mercaderias", "", status);
	displayChange_field("maquinarias_vehiculos", "", status);
	displayChange_field("terrenos_edificios", "", status);
	displayChange_field("acciones_bonos_cedulas", "", status);
	displayChange_field("id_otros_activos", "", status);
	displayChange_field("cuentas_por_pagar", "", status);
	displayChange_field("prestamos_banco_menos_ano", "", status);
	displayChange_field("prestamos_banco_mas_ano", "", status);
	displayChange_field("deudas_tarjetas_creditos", "", status);
	displayChange_field("id_otras_obligaciones", "", status);
	displayChange_field("deudor", "", status);
	displayChange_field("monto", "", status);
	displayChange_field("descripcion", "", status);
	displayChange_field("placa", "", status);
	displayChange_field("valor_maquinaria_vehiculo", "", status);
	displayChange_field("a_nombre_de", "", status);
	displayChange_field("ubicacion", "", status);
	displayChange_field("valor_propiedad", "", status);
	displayChange_field("empresa", "", status);
	displayChange_field("valor_mercado", "", status);
	displayChange_field("institucion_bancaria", "", status);
	displayChange_field("monto_banco", "", status);
	displayChange_field("institucion_finaciera", "", status);
	displayChange_field("monto_institucion_finaciera", "", status);
	displayChange_field("id_cliente_juridico", "", status);
	displayChange_field("nombre_completo_empresa", "", status);
	displayChange_field("es_empresa_extranjera", "", status);
	displayChange_field("pais_empresa", "", status);
	displayChange_field("fecha_constitucion_empresa", "", status);
	displayChange_field("id_oficina", "", status);
	displayChange_field("id_tipo_actividad", "", status);
	displayChange_field("especifique_otros", "", status);
	displayChange_field("direccion_correspondencia", "", status);
	displayChange_field("calle_principal_correspondencia", "", status);
	displayChange_field("no_correspondencia", "", status);
	displayChange_field("calle_secundaria_correspondencia", "", status);
	displayChange_field("id_ciudad_correspondencia", "", status);
	displayChange_field("nombre_empresa_solicitante", "", status);
	displayChange_field("cargo_empresa_solicitante", "", status);
	displayChange_field("celular_empresa_solicitante", "", status);
	displayChange_field("telefono_empresa_solicitante", "", status);
	displayChange_field("mail_empresa_solicitante", "", status);
	displayChange_field("saldo_empresa_solicitante", "", status);
	displayChange_field("nombre_referencia_comerciales", "", status);
	displayChange_field("fecha_compra", "", status);
	displayChange_field("telefono_referencia_comerciales", "", status);
	displayChange_field("ventas", "", status);
	displayChange_field("comisiones", "", status);
	displayChange_field("gastos_operativos", "", status);
	displayChange_field("gastos_administrativos", "", status);
	displayChange_field("pago_cuotas_prestamo", "", status);
	displayChange_field("funcionario", "", status);
	displayChange_field("funcionario_detalle", "", status);
	displayChange_field("miembro_politico", "", status);
	displayChange_field("miembro_politico_detalle", "", status);
	displayChange_field("ejecutivo_gobierno", "", status);
	displayChange_field("ejecutivo_gobierno_detalle", "", status);
	displayChange_field("familiar_gobierno", "", status);
	displayChange_field("familiar_gobierno_detalle", "", status);
	displayChange_field("familiar_gobierno_detalle_quien", "", status);
	displayChange_field("otros_ingresos", "", status);
	displayChange_field("otros_gastos", "", status);
	displayChange_field("otros_activos", "", status);
	displayChange_field("otras_obligaciones", "", status);
	displayChange_field("sector_direccion_empresa", "", status);
	displayChange_field("sector_direccion_empresa_correo", "", status);
	displayChange_field("extranjero_nombres_referencia", "", status);
	displayChange_field("extranjero_apellidos_referencia", "", status);
	displayChange_field("extranjero_parentesco", "", status);
	displayChange_field("extranjero_celular_ref", "", status);
	displayChange_field("extranjero_telefono_convencional_ref", "", status);
	displayChange_field("cargo_representante_legal", "", status);
	displayChange_field("direccion_extranjero", "", status);
	displayChange_field("relacion_dependencia_principal", "", status);
	displayChange_field("correo_corporativo_principal", "", status);
	displayChange_field("relacion_dependencia_secundaria", "", status);
	displayChange_field("correo_corporativo_secundario", "", status);
	displayChange_field("actividad_secundaria", "", status);
	displayChange_field("id_pais_empresa", "", status);
	displayChange_field("id_provincia_empresa", "", status);
	displayChange_field("id_pais_correo", "", status);
	displayChange_field("id_provincia_correo", "", status);
	displayChange_field("apellido_empresa_solicitante", "", status);
	displayChange_field("pais_actividad2", "", status);
	displayChange_field("id_provincia_exterior", "", status);
	displayChange_field("pais_independiente", "", status);
	displayChange_field("tipo_contrato_otros_actividad_principal", "", status);
	displayChange_field("actividadeconomica", "", status);
	displayChange_field("clasesujeto", "", status);
	displayChange_field("provincia", "", status);
	displayChange_field("parroquia", "", status);
	displayChange_field("canton", "", status);
	displayChange_field("demandajudicial", "", status);
	displayChange_field("vdemandajudicial", "", status);
	displayChange_field("carteracastigada", "", status);
	displayChange_field("vcarteracastigada", "", status);
	displayChange_field("accesoexterno01", "", status);
	displayChange_field("referencia", "", status);
	displayChange_field("id_pais_empleado_dir_desempeno", "", status);
	displayChange_field("id_provincia_empleado_dir_desempeno", "", status);
	displayChange_field("id_ciudad_empleado_dir_desempeno", "", status);
	displayChange_field("razon_social", "", status);
	displayChange_field("parterel01", "", status);
	displayChange_field("origen_fondos", "", status);
	displayChange_field("tipo_identificacion", "", status);
	displayChange_field("id_actividad", "", status);
}

function displayChange_row(row, status) {
	displayChange_field_codcte01(row, status);
	displayChange_field_tipo_cliente(row, status);
	displayChange_field_id_nacionalidad(row, status);
	displayChange_field_nomcte01(row, status);
	displayChange_field_primer_nombre(row, status);
	displayChange_field_segundo_nombre(row, status);
	displayChange_field_primer_apellido(row, status);
	displayChange_field_segundo_apellido(row, status);
	displayChange_field_cv1cte01(row, status);
	displayChange_field_cv2cte01(row, status);
	displayChange_field_tipcte01(row, status);
	displayChange_field_ofienccte01(row, status);
	displayChange_field_vendcte01(row, status);
	displayChange_field_cobrcte01(row, status);
	displayChange_field_loccte01(row, status);
	displayChange_field_dircte01(row, status);
	displayChange_field_sector(row, status);
	displayChange_field_calle_principal(row, status);
	displayChange_field_no(row, status);
	displayChange_field_calle_secundaria(row, status);
	displayChange_field_id_pais(row, status);
	displayChange_field_id_provincia(row, status);
	displayChange_field_id_ciudad(row, status);
	displayChange_field_id_canton(row, status);
	displayChange_field_telcte01(row, status);
	displayChange_field_cascte01(row, status);
	displayChange_field_ci_conyuge(row, status);
	displayChange_field_conyuge_tipo_identidad(row, status);
	displayChange_field_conyuge_primer_nombre(row, status);
	displayChange_field_conyuge_segundo_nombre(row, status);
	displayChange_field_conyuge_primer_apellido(row, status);
	displayChange_field_conyuge_segundo_apellido(row, status);
	displayChange_field_conyuge_profesion(row, status);
	displayChange_field_id_tipo_documento(row, status);
	displayChange_field_repleg01(row, status);
	displayChange_field_fecing01(row, status);
	displayChange_field_condpag01(row, status);
	displayChange_field_desctocte01(row, status);
	displayChange_field_limcred01(row, status);
	displayChange_field_desppar01(row, status);
	displayChange_field_cheqpro01(row, status);
	displayChange_field_sdoeje01(row, status);
	displayChange_field_sdoant01(row, status);
	displayChange_field_sdoact01(row, status);
	displayChange_field_acudbm01(row, status);
	displayChange_field_acucrm01(row, status);
	displayChange_field_acudbe01(row, status);
	displayChange_field_acucre01(row, status);
	displayChange_field_comentcte01(row, status);
	displayChange_field_statuscte01(row, status);
	displayChange_field_identcte01(row, status);
	displayChange_field_cordcte01(row, status);
	displayChange_field_limcant01(row, status);
	displayChange_field_pagleg01(row, status);
	displayChange_field_telcte01b(row, status);
	displayChange_field_telcte01c(row, status);
	displayChange_field_emailcte01(row, status);
	displayChange_field_calle_principal_exterior(row, status);
	displayChange_field_no_exterior(row, status);
	displayChange_field_calle_secundaria_exterior(row, status);
	displayChange_field_id_pais_exterior(row, status);
	displayChange_field_id_ciudad_exterior(row, status);
	displayChange_field_codigo_postal_exterior(row, status);
	displayChange_field_sector_exterior(row, status);
	displayChange_field_telefono_exterior(row, status);
	displayChange_field_celular_exterior(row, status);
	displayChange_field_email_exterior(row, status);
	displayChange_field_emailaltcte01(row, status);
	displayChange_field_ctacgcte01(row, status);
	displayChange_field_obsercte01(row, status);
	displayChange_field_totexceso01(row, status);
	displayChange_field_imagencte01(row, status);
	displayChange_field_block(row, status);
	displayChange_field_uid(row, status);
	displayChange_field_ultimoacceso(row, status);
	displayChange_field_idcli(row, status);
	displayChange_field_catcte01(row, status);
	displayChange_field_transferido(row, status);
	displayChange_field_password(row, status);
	displayChange_field_showroom(row, status);
	displayChange_field_orden(row, status);
	displayChange_field_website(row, status);
	displayChange_field_longitud01(row, status);
	displayChange_field_latitud01(row, status);
	displayChange_field_zoom01(row, status);
	displayChange_field_acceder(row, status);
	displayChange_field_coniva01(row, status);
	displayChange_field_idemp01(row, status);
	displayChange_field_codprov01(row, status);
	displayChange_field_celular01(row, status);
	displayChange_field_dircliente01(row, status);
	displayChange_field_razcte01(row, status);
	displayChange_field_ruc01(row, status);
	displayChange_field_timenegocio01(row, status);
	displayChange_field_refbanc01(row, status);
	displayChange_field_refcom01(row, status);
	displayChange_field_tarjcred01(row, status);
	displayChange_field_firmaut01(row, status);
	displayChange_field_precte01(row, status);
	displayChange_field_cuotasven01(row, status);
	displayChange_field_diasven01(row, status);
	displayChange_field_fechanace01(row, status);
	displayChange_field_sexo01(row, status);
	displayChange_field_estadocivil01(row, status);
	displayChange_field_dirgestion01(row, status);
	displayChange_field_numhijos01(row, status);
	displayChange_field_estsop01(row, status);
	displayChange_field_notick01(row, status);
	displayChange_field_chequece(row, status);
	displayChange_field_solcre(row, status);
	displayChange_field_promocte01(row, status);
	displayChange_field_pagare01(row, status);
	displayChange_field_valorpagare01(row, status);
	displayChange_field_garante01(row, status);
	displayChange_field_fecvenp01(row, status);
	displayChange_field_ctacgant01(row, status);
	displayChange_field_dsn(row, status);
	displayChange_field_residente(row, status);
	displayChange_field_medio_contacto(row, status);
	displayChange_field_separacion_bienes(row, status);
	displayChange_field_disolucion_conyugal(row, status);
	displayChange_field_capitulaciones(row, status);
	displayChange_field_numero_carga_familiar(row, status);
	displayChange_field_nivel_educacion(row, status);
	displayChange_field_profesion(row, status);
	displayChange_field_envio_correspondencia(row, status);
	displayChange_field_nombre_arrendador(row, status);
	displayChange_field_apellido_arrendador(row, status);
	displayChange_field_id_vivienda(row, status);
	displayChange_field_telefono_arrendador(row, status);
	displayChange_field_nombres_referencia(row, status);
	displayChange_field_apellidos_referencia(row, status);
	displayChange_field_parentesco(row, status);
	displayChange_field_celular_ref(row, status);
	displayChange_field_telefono_convencional_ref(row, status);
	displayChange_field_id_ocupacion(row, status);
	displayChange_field_fecha_ingreso_empresa(row, status);
	displayChange_field_nombre_empresa(row, status);
	displayChange_field_ciudad_empresa(row, status);
	displayChange_field_provincia_empresa(row, status);
	displayChange_field_direccion_empresa(row, status);
	displayChange_field_cargo_empresa(row, status);
	displayChange_field_telefono_empresa(row, status);
	displayChange_field_ext_empresa(row, status);
	displayChange_field_id_tipo_contrato_actividad(row, status);
	displayChange_field_empresa_jubilo_actividad(row, status);
	displayChange_field_fecha_salida_empresa_actividad(row, status);
	displayChange_field_cargo_salida_empresa_actividad(row, status);
	displayChange_field_fecha_inicio_actividad(row, status);
	displayChange_field_fecha_ingreso_empresa_actividad(row, status);
	displayChange_field_nombre_empresa_actividad(row, status);
	displayChange_field_institucion_actividad(row, status);
	displayChange_field_ciudad_actividad(row, status);
	displayChange_field_provincia_actividad(row, status);
	displayChange_field_direccion_actividad(row, status);
	displayChange_field_calle_principal_actividad(row, status);
	displayChange_field_no_actividad(row, status);
	displayChange_field_calle_secundaria_actividad(row, status);
	displayChange_field_sector_actividad(row, status);
	displayChange_field_pais_actividad(row, status);
	displayChange_field_actividad(row, status);
	displayChange_field_telefono_actividad(row, status);
	displayChange_field_cargo_actividad(row, status);
	displayChange_field_ext_actividad(row, status);
	displayChange_field_fecha_ingreso_empresa_actividad2(row, status);
	displayChange_field_nombre_empresa_actividad2(row, status);
	displayChange_field_institucion_actividad2(row, status);
	displayChange_field_ciudad_actividad2(row, status);
	displayChange_field_provincia_actividad2(row, status);
	displayChange_field_direccion_actividad2(row, status);
	displayChange_field_calle_principal_actividad2(row, status);
	displayChange_field_no_actividad2(row, status);
	displayChange_field_calle_secundaria_actividad2(row, status);
	displayChange_field_sector_actividad2(row, status);
	displayChange_field_fecha_salida_empresa_actividad2(row, status);
	displayChange_field_fecha_inicio_actividad2(row, status);
	displayChange_field_actividad2(row, status);
	displayChange_field_telefono_actividad2(row, status);
	displayChange_field_ext_actividad2(row, status);
	displayChange_field_cargo_actividad2(row, status);
	displayChange_field_id_tipo_contrato_actividad2(row, status);
	displayChange_field_empresa_jubilo_actividad2(row, status);
	displayChange_field_sueldo(row, status);
	displayChange_field_arriendos(row, status);
	displayChange_field_dividendo_utilidades_ultimo_ano(row, status);
	displayChange_field_id_otros_ingresos(row, status);
	displayChange_field_arriendo_hipoteca(row, status);
	displayChange_field_prestamos(row, status);
	displayChange_field_tarjetas_creditos(row, status);
	displayChange_field_gastos_familiares(row, status);
	displayChange_field_id_otros_gastos(row, status);
	displayChange_field_depositos_bancos(row, status);
	displayChange_field_cuentas_documentos(row, status);
	displayChange_field_mercaderias(row, status);
	displayChange_field_maquinarias_vehiculos(row, status);
	displayChange_field_terrenos_edificios(row, status);
	displayChange_field_acciones_bonos_cedulas(row, status);
	displayChange_field_id_otros_activos(row, status);
	displayChange_field_cuentas_por_pagar(row, status);
	displayChange_field_prestamos_banco_menos_ano(row, status);
	displayChange_field_prestamos_banco_mas_ano(row, status);
	displayChange_field_deudas_tarjetas_creditos(row, status);
	displayChange_field_id_otras_obligaciones(row, status);
	displayChange_field_deudor(row, status);
	displayChange_field_monto(row, status);
	displayChange_field_descripcion(row, status);
	displayChange_field_placa(row, status);
	displayChange_field_valor_maquinaria_vehiculo(row, status);
	displayChange_field_a_nombre_de(row, status);
	displayChange_field_ubicacion(row, status);
	displayChange_field_valor_propiedad(row, status);
	displayChange_field_empresa(row, status);
	displayChange_field_valor_mercado(row, status);
	displayChange_field_institucion_bancaria(row, status);
	displayChange_field_monto_banco(row, status);
	displayChange_field_institucion_finaciera(row, status);
	displayChange_field_monto_institucion_finaciera(row, status);
	displayChange_field_id_cliente_juridico(row, status);
	displayChange_field_nombre_completo_empresa(row, status);
	displayChange_field_es_empresa_extranjera(row, status);
	displayChange_field_pais_empresa(row, status);
	displayChange_field_fecha_constitucion_empresa(row, status);
	displayChange_field_id_oficina(row, status);
	displayChange_field_id_tipo_actividad(row, status);
	displayChange_field_especifique_otros(row, status);
	displayChange_field_direccion_correspondencia(row, status);
	displayChange_field_calle_principal_correspondencia(row, status);
	displayChange_field_no_correspondencia(row, status);
	displayChange_field_calle_secundaria_correspondencia(row, status);
	displayChange_field_id_ciudad_correspondencia(row, status);
	displayChange_field_nombre_empresa_solicitante(row, status);
	displayChange_field_cargo_empresa_solicitante(row, status);
	displayChange_field_celular_empresa_solicitante(row, status);
	displayChange_field_telefono_empresa_solicitante(row, status);
	displayChange_field_mail_empresa_solicitante(row, status);
	displayChange_field_saldo_empresa_solicitante(row, status);
	displayChange_field_nombre_referencia_comerciales(row, status);
	displayChange_field_fecha_compra(row, status);
	displayChange_field_telefono_referencia_comerciales(row, status);
	displayChange_field_ventas(row, status);
	displayChange_field_comisiones(row, status);
	displayChange_field_gastos_operativos(row, status);
	displayChange_field_gastos_administrativos(row, status);
	displayChange_field_pago_cuotas_prestamo(row, status);
	displayChange_field_funcionario(row, status);
	displayChange_field_funcionario_detalle(row, status);
	displayChange_field_miembro_politico(row, status);
	displayChange_field_miembro_politico_detalle(row, status);
	displayChange_field_ejecutivo_gobierno(row, status);
	displayChange_field_ejecutivo_gobierno_detalle(row, status);
	displayChange_field_familiar_gobierno(row, status);
	displayChange_field_familiar_gobierno_detalle(row, status);
	displayChange_field_familiar_gobierno_detalle_quien(row, status);
	displayChange_field_otros_ingresos(row, status);
	displayChange_field_otros_gastos(row, status);
	displayChange_field_otros_activos(row, status);
	displayChange_field_otras_obligaciones(row, status);
	displayChange_field_sector_direccion_empresa(row, status);
	displayChange_field_sector_direccion_empresa_correo(row, status);
	displayChange_field_extranjero_nombres_referencia(row, status);
	displayChange_field_extranjero_apellidos_referencia(row, status);
	displayChange_field_extranjero_parentesco(row, status);
	displayChange_field_extranjero_celular_ref(row, status);
	displayChange_field_extranjero_telefono_convencional_ref(row, status);
	displayChange_field_cargo_representante_legal(row, status);
	displayChange_field_direccion_extranjero(row, status);
	displayChange_field_relacion_dependencia_principal(row, status);
	displayChange_field_correo_corporativo_principal(row, status);
	displayChange_field_relacion_dependencia_secundaria(row, status);
	displayChange_field_correo_corporativo_secundario(row, status);
	displayChange_field_actividad_secundaria(row, status);
	displayChange_field_id_pais_empresa(row, status);
	displayChange_field_id_provincia_empresa(row, status);
	displayChange_field_id_pais_correo(row, status);
	displayChange_field_id_provincia_correo(row, status);
	displayChange_field_apellido_empresa_solicitante(row, status);
	displayChange_field_pais_actividad2(row, status);
	displayChange_field_id_provincia_exterior(row, status);
	displayChange_field_pais_independiente(row, status);
	displayChange_field_tipo_contrato_otros_actividad_principal(row, status);
	displayChange_field_actividadeconomica(row, status);
	displayChange_field_clasesujeto(row, status);
	displayChange_field_provincia(row, status);
	displayChange_field_parroquia(row, status);
	displayChange_field_canton(row, status);
	displayChange_field_demandajudicial(row, status);
	displayChange_field_vdemandajudicial(row, status);
	displayChange_field_carteracastigada(row, status);
	displayChange_field_vcarteracastigada(row, status);
	displayChange_field_accesoexterno01(row, status);
	displayChange_field_referencia(row, status);
	displayChange_field_id_pais_empleado_dir_desempeno(row, status);
	displayChange_field_id_provincia_empleado_dir_desempeno(row, status);
	displayChange_field_id_ciudad_empleado_dir_desempeno(row, status);
	displayChange_field_razon_social(row, status);
	displayChange_field_parterel01(row, status);
	displayChange_field_origen_fondos(row, status);
	displayChange_field_tipo_identificacion(row, status);
	displayChange_field_id_actividad(row, status);
}

function displayChange_field(field, row, status) {
	if ("codcte01" == field) {
		displayChange_field_codcte01(row, status);
	}
	if ("tipo_cliente" == field) {
		displayChange_field_tipo_cliente(row, status);
	}
	if ("id_nacionalidad" == field) {
		displayChange_field_id_nacionalidad(row, status);
	}
	if ("nomcte01" == field) {
		displayChange_field_nomcte01(row, status);
	}
	if ("primer_nombre" == field) {
		displayChange_field_primer_nombre(row, status);
	}
	if ("segundo_nombre" == field) {
		displayChange_field_segundo_nombre(row, status);
	}
	if ("primer_apellido" == field) {
		displayChange_field_primer_apellido(row, status);
	}
	if ("segundo_apellido" == field) {
		displayChange_field_segundo_apellido(row, status);
	}
	if ("cv1cte01" == field) {
		displayChange_field_cv1cte01(row, status);
	}
	if ("cv2cte01" == field) {
		displayChange_field_cv2cte01(row, status);
	}
	if ("tipcte01" == field) {
		displayChange_field_tipcte01(row, status);
	}
	if ("ofienccte01" == field) {
		displayChange_field_ofienccte01(row, status);
	}
	if ("vendcte01" == field) {
		displayChange_field_vendcte01(row, status);
	}
	if ("cobrcte01" == field) {
		displayChange_field_cobrcte01(row, status);
	}
	if ("loccte01" == field) {
		displayChange_field_loccte01(row, status);
	}
	if ("dircte01" == field) {
		displayChange_field_dircte01(row, status);
	}
	if ("sector" == field) {
		displayChange_field_sector(row, status);
	}
	if ("calle_principal" == field) {
		displayChange_field_calle_principal(row, status);
	}
	if ("no" == field) {
		displayChange_field_no(row, status);
	}
	if ("calle_secundaria" == field) {
		displayChange_field_calle_secundaria(row, status);
	}
	if ("id_pais" == field) {
		displayChange_field_id_pais(row, status);
	}
	if ("id_provincia" == field) {
		displayChange_field_id_provincia(row, status);
	}
	if ("id_ciudad" == field) {
		displayChange_field_id_ciudad(row, status);
	}
	if ("id_canton" == field) {
		displayChange_field_id_canton(row, status);
	}
	if ("telcte01" == field) {
		displayChange_field_telcte01(row, status);
	}
	if ("cascte01" == field) {
		displayChange_field_cascte01(row, status);
	}
	if ("ci_conyuge" == field) {
		displayChange_field_ci_conyuge(row, status);
	}
	if ("conyuge_tipo_identidad" == field) {
		displayChange_field_conyuge_tipo_identidad(row, status);
	}
	if ("conyuge_primer_nombre" == field) {
		displayChange_field_conyuge_primer_nombre(row, status);
	}
	if ("conyuge_segundo_nombre" == field) {
		displayChange_field_conyuge_segundo_nombre(row, status);
	}
	if ("conyuge_primer_apellido" == field) {
		displayChange_field_conyuge_primer_apellido(row, status);
	}
	if ("conyuge_segundo_apellido" == field) {
		displayChange_field_conyuge_segundo_apellido(row, status);
	}
	if ("conyuge_profesion" == field) {
		displayChange_field_conyuge_profesion(row, status);
	}
	if ("id_tipo_documento" == field) {
		displayChange_field_id_tipo_documento(row, status);
	}
	if ("repleg01" == field) {
		displayChange_field_repleg01(row, status);
	}
	if ("fecing01" == field) {
		displayChange_field_fecing01(row, status);
	}
	if ("condpag01" == field) {
		displayChange_field_condpag01(row, status);
	}
	if ("desctocte01" == field) {
		displayChange_field_desctocte01(row, status);
	}
	if ("limcred01" == field) {
		displayChange_field_limcred01(row, status);
	}
	if ("desppar01" == field) {
		displayChange_field_desppar01(row, status);
	}
	if ("cheqpro01" == field) {
		displayChange_field_cheqpro01(row, status);
	}
	if ("sdoeje01" == field) {
		displayChange_field_sdoeje01(row, status);
	}
	if ("sdoant01" == field) {
		displayChange_field_sdoant01(row, status);
	}
	if ("sdoact01" == field) {
		displayChange_field_sdoact01(row, status);
	}
	if ("acudbm01" == field) {
		displayChange_field_acudbm01(row, status);
	}
	if ("acucrm01" == field) {
		displayChange_field_acucrm01(row, status);
	}
	if ("acudbe01" == field) {
		displayChange_field_acudbe01(row, status);
	}
	if ("acucre01" == field) {
		displayChange_field_acucre01(row, status);
	}
	if ("comentcte01" == field) {
		displayChange_field_comentcte01(row, status);
	}
	if ("statuscte01" == field) {
		displayChange_field_statuscte01(row, status);
	}
	if ("identcte01" == field) {
		displayChange_field_identcte01(row, status);
	}
	if ("cordcte01" == field) {
		displayChange_field_cordcte01(row, status);
	}
	if ("limcant01" == field) {
		displayChange_field_limcant01(row, status);
	}
	if ("pagleg01" == field) {
		displayChange_field_pagleg01(row, status);
	}
	if ("telcte01b" == field) {
		displayChange_field_telcte01b(row, status);
	}
	if ("telcte01c" == field) {
		displayChange_field_telcte01c(row, status);
	}
	if ("emailcte01" == field) {
		displayChange_field_emailcte01(row, status);
	}
	if ("calle_principal_exterior" == field) {
		displayChange_field_calle_principal_exterior(row, status);
	}
	if ("no_exterior" == field) {
		displayChange_field_no_exterior(row, status);
	}
	if ("calle_secundaria_exterior" == field) {
		displayChange_field_calle_secundaria_exterior(row, status);
	}
	if ("id_pais_exterior" == field) {
		displayChange_field_id_pais_exterior(row, status);
	}
	if ("id_ciudad_exterior" == field) {
		displayChange_field_id_ciudad_exterior(row, status);
	}
	if ("codigo_postal_exterior" == field) {
		displayChange_field_codigo_postal_exterior(row, status);
	}
	if ("sector_exterior" == field) {
		displayChange_field_sector_exterior(row, status);
	}
	if ("telefono_exterior" == field) {
		displayChange_field_telefono_exterior(row, status);
	}
	if ("celular_exterior" == field) {
		displayChange_field_celular_exterior(row, status);
	}
	if ("email_exterior" == field) {
		displayChange_field_email_exterior(row, status);
	}
	if ("emailaltcte01" == field) {
		displayChange_field_emailaltcte01(row, status);
	}
	if ("ctacgcte01" == field) {
		displayChange_field_ctacgcte01(row, status);
	}
	if ("obsercte01" == field) {
		displayChange_field_obsercte01(row, status);
	}
	if ("totexceso01" == field) {
		displayChange_field_totexceso01(row, status);
	}
	if ("imagencte01" == field) {
		displayChange_field_imagencte01(row, status);
	}
	if ("block" == field) {
		displayChange_field_block(row, status);
	}
	if ("uid" == field) {
		displayChange_field_uid(row, status);
	}
	if ("ultimoacceso" == field) {
		displayChange_field_ultimoacceso(row, status);
	}
	if ("idcli" == field) {
		displayChange_field_idcli(row, status);
	}
	if ("catcte01" == field) {
		displayChange_field_catcte01(row, status);
	}
	if ("transferido" == field) {
		displayChange_field_transferido(row, status);
	}
	if ("password" == field) {
		displayChange_field_password(row, status);
	}
	if ("showroom" == field) {
		displayChange_field_showroom(row, status);
	}
	if ("orden" == field) {
		displayChange_field_orden(row, status);
	}
	if ("website" == field) {
		displayChange_field_website(row, status);
	}
	if ("longitud01" == field) {
		displayChange_field_longitud01(row, status);
	}
	if ("latitud01" == field) {
		displayChange_field_latitud01(row, status);
	}
	if ("zoom01" == field) {
		displayChange_field_zoom01(row, status);
	}
	if ("acceder" == field) {
		displayChange_field_acceder(row, status);
	}
	if ("coniva01" == field) {
		displayChange_field_coniva01(row, status);
	}
	if ("idemp01" == field) {
		displayChange_field_idemp01(row, status);
	}
	if ("codprov01" == field) {
		displayChange_field_codprov01(row, status);
	}
	if ("celular01" == field) {
		displayChange_field_celular01(row, status);
	}
	if ("dircliente01" == field) {
		displayChange_field_dircliente01(row, status);
	}
	if ("razcte01" == field) {
		displayChange_field_razcte01(row, status);
	}
	if ("ruc01" == field) {
		displayChange_field_ruc01(row, status);
	}
	if ("timenegocio01" == field) {
		displayChange_field_timenegocio01(row, status);
	}
	if ("refbanc01" == field) {
		displayChange_field_refbanc01(row, status);
	}
	if ("refcom01" == field) {
		displayChange_field_refcom01(row, status);
	}
	if ("tarjcred01" == field) {
		displayChange_field_tarjcred01(row, status);
	}
	if ("firmaut01" == field) {
		displayChange_field_firmaut01(row, status);
	}
	if ("precte01" == field) {
		displayChange_field_precte01(row, status);
	}
	if ("cuotasven01" == field) {
		displayChange_field_cuotasven01(row, status);
	}
	if ("diasven01" == field) {
		displayChange_field_diasven01(row, status);
	}
	if ("fechanace01" == field) {
		displayChange_field_fechanace01(row, status);
	}
	if ("sexo01" == field) {
		displayChange_field_sexo01(row, status);
	}
	if ("estadocivil01" == field) {
		displayChange_field_estadocivil01(row, status);
	}
	if ("dirgestion01" == field) {
		displayChange_field_dirgestion01(row, status);
	}
	if ("numhijos01" == field) {
		displayChange_field_numhijos01(row, status);
	}
	if ("estsop01" == field) {
		displayChange_field_estsop01(row, status);
	}
	if ("notick01" == field) {
		displayChange_field_notick01(row, status);
	}
	if ("chequece" == field) {
		displayChange_field_chequece(row, status);
	}
	if ("solcre" == field) {
		displayChange_field_solcre(row, status);
	}
	if ("promocte01" == field) {
		displayChange_field_promocte01(row, status);
	}
	if ("pagare01" == field) {
		displayChange_field_pagare01(row, status);
	}
	if ("valorpagare01" == field) {
		displayChange_field_valorpagare01(row, status);
	}
	if ("garante01" == field) {
		displayChange_field_garante01(row, status);
	}
	if ("fecvenp01" == field) {
		displayChange_field_fecvenp01(row, status);
	}
	if ("ctacgant01" == field) {
		displayChange_field_ctacgant01(row, status);
	}
	if ("dsn" == field) {
		displayChange_field_dsn(row, status);
	}
	if ("residente" == field) {
		displayChange_field_residente(row, status);
	}
	if ("medio_contacto" == field) {
		displayChange_field_medio_contacto(row, status);
	}
	if ("separacion_bienes" == field) {
		displayChange_field_separacion_bienes(row, status);
	}
	if ("disolucion_conyugal" == field) {
		displayChange_field_disolucion_conyugal(row, status);
	}
	if ("capitulaciones" == field) {
		displayChange_field_capitulaciones(row, status);
	}
	if ("numero_carga_familiar" == field) {
		displayChange_field_numero_carga_familiar(row, status);
	}
	if ("nivel_educacion" == field) {
		displayChange_field_nivel_educacion(row, status);
	}
	if ("profesion" == field) {
		displayChange_field_profesion(row, status);
	}
	if ("envio_correspondencia" == field) {
		displayChange_field_envio_correspondencia(row, status);
	}
	if ("nombre_arrendador" == field) {
		displayChange_field_nombre_arrendador(row, status);
	}
	if ("apellido_arrendador" == field) {
		displayChange_field_apellido_arrendador(row, status);
	}
	if ("id_vivienda" == field) {
		displayChange_field_id_vivienda(row, status);
	}
	if ("telefono_arrendador" == field) {
		displayChange_field_telefono_arrendador(row, status);
	}
	if ("nombres_referencia" == field) {
		displayChange_field_nombres_referencia(row, status);
	}
	if ("apellidos_referencia" == field) {
		displayChange_field_apellidos_referencia(row, status);
	}
	if ("parentesco" == field) {
		displayChange_field_parentesco(row, status);
	}
	if ("celular_ref" == field) {
		displayChange_field_celular_ref(row, status);
	}
	if ("telefono_convencional_ref" == field) {
		displayChange_field_telefono_convencional_ref(row, status);
	}
	if ("id_ocupacion" == field) {
		displayChange_field_id_ocupacion(row, status);
	}
	if ("fecha_ingreso_empresa" == field) {
		displayChange_field_fecha_ingreso_empresa(row, status);
	}
	if ("nombre_empresa" == field) {
		displayChange_field_nombre_empresa(row, status);
	}
	if ("ciudad_empresa" == field) {
		displayChange_field_ciudad_empresa(row, status);
	}
	if ("provincia_empresa" == field) {
		displayChange_field_provincia_empresa(row, status);
	}
	if ("direccion_empresa" == field) {
		displayChange_field_direccion_empresa(row, status);
	}
	if ("cargo_empresa" == field) {
		displayChange_field_cargo_empresa(row, status);
	}
	if ("telefono_empresa" == field) {
		displayChange_field_telefono_empresa(row, status);
	}
	if ("ext_empresa" == field) {
		displayChange_field_ext_empresa(row, status);
	}
	if ("id_tipo_contrato_actividad" == field) {
		displayChange_field_id_tipo_contrato_actividad(row, status);
	}
	if ("empresa_jubilo_actividad" == field) {
		displayChange_field_empresa_jubilo_actividad(row, status);
	}
	if ("fecha_salida_empresa_actividad" == field) {
		displayChange_field_fecha_salida_empresa_actividad(row, status);
	}
	if ("cargo_salida_empresa_actividad" == field) {
		displayChange_field_cargo_salida_empresa_actividad(row, status);
	}
	if ("fecha_inicio_actividad" == field) {
		displayChange_field_fecha_inicio_actividad(row, status);
	}
	if ("fecha_ingreso_empresa_actividad" == field) {
		displayChange_field_fecha_ingreso_empresa_actividad(row, status);
	}
	if ("nombre_empresa_actividad" == field) {
		displayChange_field_nombre_empresa_actividad(row, status);
	}
	if ("institucion_actividad" == field) {
		displayChange_field_institucion_actividad(row, status);
	}
	if ("ciudad_actividad" == field) {
		displayChange_field_ciudad_actividad(row, status);
	}
	if ("provincia_actividad" == field) {
		displayChange_field_provincia_actividad(row, status);
	}
	if ("direccion_actividad" == field) {
		displayChange_field_direccion_actividad(row, status);
	}
	if ("calle_principal_actividad" == field) {
		displayChange_field_calle_principal_actividad(row, status);
	}
	if ("no_actividad" == field) {
		displayChange_field_no_actividad(row, status);
	}
	if ("calle_secundaria_actividad" == field) {
		displayChange_field_calle_secundaria_actividad(row, status);
	}
	if ("sector_actividad" == field) {
		displayChange_field_sector_actividad(row, status);
	}
	if ("pais_actividad" == field) {
		displayChange_field_pais_actividad(row, status);
	}
	if ("actividad" == field) {
		displayChange_field_actividad(row, status);
	}
	if ("telefono_actividad" == field) {
		displayChange_field_telefono_actividad(row, status);
	}
	if ("cargo_actividad" == field) {
		displayChange_field_cargo_actividad(row, status);
	}
	if ("ext_actividad" == field) {
		displayChange_field_ext_actividad(row, status);
	}
	if ("fecha_ingreso_empresa_actividad2" == field) {
		displayChange_field_fecha_ingreso_empresa_actividad2(row, status);
	}
	if ("nombre_empresa_actividad2" == field) {
		displayChange_field_nombre_empresa_actividad2(row, status);
	}
	if ("institucion_actividad2" == field) {
		displayChange_field_institucion_actividad2(row, status);
	}
	if ("ciudad_actividad2" == field) {
		displayChange_field_ciudad_actividad2(row, status);
	}
	if ("provincia_actividad2" == field) {
		displayChange_field_provincia_actividad2(row, status);
	}
	if ("direccion_actividad2" == field) {
		displayChange_field_direccion_actividad2(row, status);
	}
	if ("calle_principal_actividad2" == field) {
		displayChange_field_calle_principal_actividad2(row, status);
	}
	if ("no_actividad2" == field) {
		displayChange_field_no_actividad2(row, status);
	}
	if ("calle_secundaria_actividad2" == field) {
		displayChange_field_calle_secundaria_actividad2(row, status);
	}
	if ("sector_actividad2" == field) {
		displayChange_field_sector_actividad2(row, status);
	}
	if ("fecha_salida_empresa_actividad2" == field) {
		displayChange_field_fecha_salida_empresa_actividad2(row, status);
	}
	if ("fecha_inicio_actividad2" == field) {
		displayChange_field_fecha_inicio_actividad2(row, status);
	}
	if ("actividad2" == field) {
		displayChange_field_actividad2(row, status);
	}
	if ("telefono_actividad2" == field) {
		displayChange_field_telefono_actividad2(row, status);
	}
	if ("ext_actividad2" == field) {
		displayChange_field_ext_actividad2(row, status);
	}
	if ("cargo_actividad2" == field) {
		displayChange_field_cargo_actividad2(row, status);
	}
	if ("id_tipo_contrato_actividad2" == field) {
		displayChange_field_id_tipo_contrato_actividad2(row, status);
	}
	if ("empresa_jubilo_actividad2" == field) {
		displayChange_field_empresa_jubilo_actividad2(row, status);
	}
	if ("sueldo" == field) {
		displayChange_field_sueldo(row, status);
	}
	if ("arriendos" == field) {
		displayChange_field_arriendos(row, status);
	}
	if ("dividendo_utilidades_ultimo_ano" == field) {
		displayChange_field_dividendo_utilidades_ultimo_ano(row, status);
	}
	if ("id_otros_ingresos" == field) {
		displayChange_field_id_otros_ingresos(row, status);
	}
	if ("arriendo_hipoteca" == field) {
		displayChange_field_arriendo_hipoteca(row, status);
	}
	if ("prestamos" == field) {
		displayChange_field_prestamos(row, status);
	}
	if ("tarjetas_creditos" == field) {
		displayChange_field_tarjetas_creditos(row, status);
	}
	if ("gastos_familiares" == field) {
		displayChange_field_gastos_familiares(row, status);
	}
	if ("id_otros_gastos" == field) {
		displayChange_field_id_otros_gastos(row, status);
	}
	if ("depositos_bancos" == field) {
		displayChange_field_depositos_bancos(row, status);
	}
	if ("cuentas_documentos" == field) {
		displayChange_field_cuentas_documentos(row, status);
	}
	if ("mercaderias" == field) {
		displayChange_field_mercaderias(row, status);
	}
	if ("maquinarias_vehiculos" == field) {
		displayChange_field_maquinarias_vehiculos(row, status);
	}
	if ("terrenos_edificios" == field) {
		displayChange_field_terrenos_edificios(row, status);
	}
	if ("acciones_bonos_cedulas" == field) {
		displayChange_field_acciones_bonos_cedulas(row, status);
	}
	if ("id_otros_activos" == field) {
		displayChange_field_id_otros_activos(row, status);
	}
	if ("cuentas_por_pagar" == field) {
		displayChange_field_cuentas_por_pagar(row, status);
	}
	if ("prestamos_banco_menos_ano" == field) {
		displayChange_field_prestamos_banco_menos_ano(row, status);
	}
	if ("prestamos_banco_mas_ano" == field) {
		displayChange_field_prestamos_banco_mas_ano(row, status);
	}
	if ("deudas_tarjetas_creditos" == field) {
		displayChange_field_deudas_tarjetas_creditos(row, status);
	}
	if ("id_otras_obligaciones" == field) {
		displayChange_field_id_otras_obligaciones(row, status);
	}
	if ("deudor" == field) {
		displayChange_field_deudor(row, status);
	}
	if ("monto" == field) {
		displayChange_field_monto(row, status);
	}
	if ("descripcion" == field) {
		displayChange_field_descripcion(row, status);
	}
	if ("placa" == field) {
		displayChange_field_placa(row, status);
	}
	if ("valor_maquinaria_vehiculo" == field) {
		displayChange_field_valor_maquinaria_vehiculo(row, status);
	}
	if ("a_nombre_de" == field) {
		displayChange_field_a_nombre_de(row, status);
	}
	if ("ubicacion" == field) {
		displayChange_field_ubicacion(row, status);
	}
	if ("valor_propiedad" == field) {
		displayChange_field_valor_propiedad(row, status);
	}
	if ("empresa" == field) {
		displayChange_field_empresa(row, status);
	}
	if ("valor_mercado" == field) {
		displayChange_field_valor_mercado(row, status);
	}
	if ("institucion_bancaria" == field) {
		displayChange_field_institucion_bancaria(row, status);
	}
	if ("monto_banco" == field) {
		displayChange_field_monto_banco(row, status);
	}
	if ("institucion_finaciera" == field) {
		displayChange_field_institucion_finaciera(row, status);
	}
	if ("monto_institucion_finaciera" == field) {
		displayChange_field_monto_institucion_finaciera(row, status);
	}
	if ("id_cliente_juridico" == field) {
		displayChange_field_id_cliente_juridico(row, status);
	}
	if ("nombre_completo_empresa" == field) {
		displayChange_field_nombre_completo_empresa(row, status);
	}
	if ("es_empresa_extranjera" == field) {
		displayChange_field_es_empresa_extranjera(row, status);
	}
	if ("pais_empresa" == field) {
		displayChange_field_pais_empresa(row, status);
	}
	if ("fecha_constitucion_empresa" == field) {
		displayChange_field_fecha_constitucion_empresa(row, status);
	}
	if ("id_oficina" == field) {
		displayChange_field_id_oficina(row, status);
	}
	if ("id_tipo_actividad" == field) {
		displayChange_field_id_tipo_actividad(row, status);
	}
	if ("especifique_otros" == field) {
		displayChange_field_especifique_otros(row, status);
	}
	if ("direccion_correspondencia" == field) {
		displayChange_field_direccion_correspondencia(row, status);
	}
	if ("calle_principal_correspondencia" == field) {
		displayChange_field_calle_principal_correspondencia(row, status);
	}
	if ("no_correspondencia" == field) {
		displayChange_field_no_correspondencia(row, status);
	}
	if ("calle_secundaria_correspondencia" == field) {
		displayChange_field_calle_secundaria_correspondencia(row, status);
	}
	if ("id_ciudad_correspondencia" == field) {
		displayChange_field_id_ciudad_correspondencia(row, status);
	}
	if ("nombre_empresa_solicitante" == field) {
		displayChange_field_nombre_empresa_solicitante(row, status);
	}
	if ("cargo_empresa_solicitante" == field) {
		displayChange_field_cargo_empresa_solicitante(row, status);
	}
	if ("celular_empresa_solicitante" == field) {
		displayChange_field_celular_empresa_solicitante(row, status);
	}
	if ("telefono_empresa_solicitante" == field) {
		displayChange_field_telefono_empresa_solicitante(row, status);
	}
	if ("mail_empresa_solicitante" == field) {
		displayChange_field_mail_empresa_solicitante(row, status);
	}
	if ("saldo_empresa_solicitante" == field) {
		displayChange_field_saldo_empresa_solicitante(row, status);
	}
	if ("nombre_referencia_comerciales" == field) {
		displayChange_field_nombre_referencia_comerciales(row, status);
	}
	if ("fecha_compra" == field) {
		displayChange_field_fecha_compra(row, status);
	}
	if ("telefono_referencia_comerciales" == field) {
		displayChange_field_telefono_referencia_comerciales(row, status);
	}
	if ("ventas" == field) {
		displayChange_field_ventas(row, status);
	}
	if ("comisiones" == field) {
		displayChange_field_comisiones(row, status);
	}
	if ("gastos_operativos" == field) {
		displayChange_field_gastos_operativos(row, status);
	}
	if ("gastos_administrativos" == field) {
		displayChange_field_gastos_administrativos(row, status);
	}
	if ("pago_cuotas_prestamo" == field) {
		displayChange_field_pago_cuotas_prestamo(row, status);
	}
	if ("funcionario" == field) {
		displayChange_field_funcionario(row, status);
	}
	if ("funcionario_detalle" == field) {
		displayChange_field_funcionario_detalle(row, status);
	}
	if ("miembro_politico" == field) {
		displayChange_field_miembro_politico(row, status);
	}
	if ("miembro_politico_detalle" == field) {
		displayChange_field_miembro_politico_detalle(row, status);
	}
	if ("ejecutivo_gobierno" == field) {
		displayChange_field_ejecutivo_gobierno(row, status);
	}
	if ("ejecutivo_gobierno_detalle" == field) {
		displayChange_field_ejecutivo_gobierno_detalle(row, status);
	}
	if ("familiar_gobierno" == field) {
		displayChange_field_familiar_gobierno(row, status);
	}
	if ("familiar_gobierno_detalle" == field) {
		displayChange_field_familiar_gobierno_detalle(row, status);
	}
	if ("familiar_gobierno_detalle_quien" == field) {
		displayChange_field_familiar_gobierno_detalle_quien(row, status);
	}
	if ("otros_ingresos" == field) {
		displayChange_field_otros_ingresos(row, status);
	}
	if ("otros_gastos" == field) {
		displayChange_field_otros_gastos(row, status);
	}
	if ("otros_activos" == field) {
		displayChange_field_otros_activos(row, status);
	}
	if ("otras_obligaciones" == field) {
		displayChange_field_otras_obligaciones(row, status);
	}
	if ("sector_direccion_empresa" == field) {
		displayChange_field_sector_direccion_empresa(row, status);
	}
	if ("sector_direccion_empresa_correo" == field) {
		displayChange_field_sector_direccion_empresa_correo(row, status);
	}
	if ("extranjero_nombres_referencia" == field) {
		displayChange_field_extranjero_nombres_referencia(row, status);
	}
	if ("extranjero_apellidos_referencia" == field) {
		displayChange_field_extranjero_apellidos_referencia(row, status);
	}
	if ("extranjero_parentesco" == field) {
		displayChange_field_extranjero_parentesco(row, status);
	}
	if ("extranjero_celular_ref" == field) {
		displayChange_field_extranjero_celular_ref(row, status);
	}
	if ("extranjero_telefono_convencional_ref" == field) {
		displayChange_field_extranjero_telefono_convencional_ref(row, status);
	}
	if ("cargo_representante_legal" == field) {
		displayChange_field_cargo_representante_legal(row, status);
	}
	if ("direccion_extranjero" == field) {
		displayChange_field_direccion_extranjero(row, status);
	}
	if ("relacion_dependencia_principal" == field) {
		displayChange_field_relacion_dependencia_principal(row, status);
	}
	if ("correo_corporativo_principal" == field) {
		displayChange_field_correo_corporativo_principal(row, status);
	}
	if ("relacion_dependencia_secundaria" == field) {
		displayChange_field_relacion_dependencia_secundaria(row, status);
	}
	if ("correo_corporativo_secundario" == field) {
		displayChange_field_correo_corporativo_secundario(row, status);
	}
	if ("actividad_secundaria" == field) {
		displayChange_field_actividad_secundaria(row, status);
	}
	if ("id_pais_empresa" == field) {
		displayChange_field_id_pais_empresa(row, status);
	}
	if ("id_provincia_empresa" == field) {
		displayChange_field_id_provincia_empresa(row, status);
	}
	if ("id_pais_correo" == field) {
		displayChange_field_id_pais_correo(row, status);
	}
	if ("id_provincia_correo" == field) {
		displayChange_field_id_provincia_correo(row, status);
	}
	if ("apellido_empresa_solicitante" == field) {
		displayChange_field_apellido_empresa_solicitante(row, status);
	}
	if ("pais_actividad2" == field) {
		displayChange_field_pais_actividad2(row, status);
	}
	if ("id_provincia_exterior" == field) {
		displayChange_field_id_provincia_exterior(row, status);
	}
	if ("pais_independiente" == field) {
		displayChange_field_pais_independiente(row, status);
	}
	if ("tipo_contrato_otros_actividad_principal" == field) {
		displayChange_field_tipo_contrato_otros_actividad_principal(row, status);
	}
	if ("actividadeconomica" == field) {
		displayChange_field_actividadeconomica(row, status);
	}
	if ("clasesujeto" == field) {
		displayChange_field_clasesujeto(row, status);
	}
	if ("provincia" == field) {
		displayChange_field_provincia(row, status);
	}
	if ("parroquia" == field) {
		displayChange_field_parroquia(row, status);
	}
	if ("canton" == field) {
		displayChange_field_canton(row, status);
	}
	if ("demandajudicial" == field) {
		displayChange_field_demandajudicial(row, status);
	}
	if ("vdemandajudicial" == field) {
		displayChange_field_vdemandajudicial(row, status);
	}
	if ("carteracastigada" == field) {
		displayChange_field_carteracastigada(row, status);
	}
	if ("vcarteracastigada" == field) {
		displayChange_field_vcarteracastigada(row, status);
	}
	if ("accesoexterno01" == field) {
		displayChange_field_accesoexterno01(row, status);
	}
	if ("referencia" == field) {
		displayChange_field_referencia(row, status);
	}
	if ("id_pais_empleado_dir_desempeno" == field) {
		displayChange_field_id_pais_empleado_dir_desempeno(row, status);
	}
	if ("id_provincia_empleado_dir_desempeno" == field) {
		displayChange_field_id_provincia_empleado_dir_desempeno(row, status);
	}
	if ("id_ciudad_empleado_dir_desempeno" == field) {
		displayChange_field_id_ciudad_empleado_dir_desempeno(row, status);
	}
	if ("razon_social" == field) {
		displayChange_field_razon_social(row, status);
	}
	if ("parterel01" == field) {
		displayChange_field_parterel01(row, status);
	}
	if ("origen_fondos" == field) {
		displayChange_field_origen_fondos(row, status);
	}
	if ("tipo_identificacion" == field) {
		displayChange_field_tipo_identificacion(row, status);
	}
	if ("id_actividad" == field) {
		displayChange_field_id_actividad(row, status);
	}
}

function displayChange_field_codcte01(row, status) {
    var fieldId;
}

function displayChange_field_tipo_cliente(row, status) {
    var fieldId;
}

function displayChange_field_id_nacionalidad(row, status) {
    var fieldId;
}

function displayChange_field_nomcte01(row, status) {
    var fieldId;
}

function displayChange_field_primer_nombre(row, status) {
    var fieldId;
}

function displayChange_field_segundo_nombre(row, status) {
    var fieldId;
}

function displayChange_field_primer_apellido(row, status) {
    var fieldId;
}

function displayChange_field_segundo_apellido(row, status) {
    var fieldId;
}

function displayChange_field_cv1cte01(row, status) {
    var fieldId;
}

function displayChange_field_cv2cte01(row, status) {
    var fieldId;
}

function displayChange_field_tipcte01(row, status) {
    var fieldId;
}

function displayChange_field_ofienccte01(row, status) {
    var fieldId;
}

function displayChange_field_vendcte01(row, status) {
    var fieldId;
}

function displayChange_field_cobrcte01(row, status) {
    var fieldId;
}

function displayChange_field_loccte01(row, status) {
    var fieldId;
}

function displayChange_field_dircte01(row, status) {
    var fieldId;
}

function displayChange_field_sector(row, status) {
    var fieldId;
}

function displayChange_field_calle_principal(row, status) {
    var fieldId;
}

function displayChange_field_no(row, status) {
    var fieldId;
}

function displayChange_field_calle_secundaria(row, status) {
    var fieldId;
}

function displayChange_field_id_pais(row, status) {
    var fieldId;
}

function displayChange_field_id_provincia(row, status) {
    var fieldId;
}

function displayChange_field_id_ciudad(row, status) {
    var fieldId;
}

function displayChange_field_id_canton(row, status) {
    var fieldId;
}

function displayChange_field_telcte01(row, status) {
    var fieldId;
}

function displayChange_field_cascte01(row, status) {
    var fieldId;
}

function displayChange_field_ci_conyuge(row, status) {
    var fieldId;
}

function displayChange_field_conyuge_tipo_identidad(row, status) {
    var fieldId;
}

function displayChange_field_conyuge_primer_nombre(row, status) {
    var fieldId;
}

function displayChange_field_conyuge_segundo_nombre(row, status) {
    var fieldId;
}

function displayChange_field_conyuge_primer_apellido(row, status) {
    var fieldId;
}

function displayChange_field_conyuge_segundo_apellido(row, status) {
    var fieldId;
}

function displayChange_field_conyuge_profesion(row, status) {
    var fieldId;
}

function displayChange_field_id_tipo_documento(row, status) {
    var fieldId;
}

function displayChange_field_repleg01(row, status) {
    var fieldId;
}

function displayChange_field_fecing01(row, status) {
    var fieldId;
}

function displayChange_field_condpag01(row, status) {
    var fieldId;
}

function displayChange_field_desctocte01(row, status) {
    var fieldId;
}

function displayChange_field_limcred01(row, status) {
    var fieldId;
}

function displayChange_field_desppar01(row, status) {
    var fieldId;
}

function displayChange_field_cheqpro01(row, status) {
    var fieldId;
}

function displayChange_field_sdoeje01(row, status) {
    var fieldId;
}

function displayChange_field_sdoant01(row, status) {
    var fieldId;
}

function displayChange_field_sdoact01(row, status) {
    var fieldId;
}

function displayChange_field_acudbm01(row, status) {
    var fieldId;
}

function displayChange_field_acucrm01(row, status) {
    var fieldId;
}

function displayChange_field_acudbe01(row, status) {
    var fieldId;
}

function displayChange_field_acucre01(row, status) {
    var fieldId;
}

function displayChange_field_comentcte01(row, status) {
    var fieldId;
}

function displayChange_field_statuscte01(row, status) {
    var fieldId;
}

function displayChange_field_identcte01(row, status) {
    var fieldId;
}

function displayChange_field_cordcte01(row, status) {
    var fieldId;
}

function displayChange_field_limcant01(row, status) {
    var fieldId;
}

function displayChange_field_pagleg01(row, status) {
    var fieldId;
}

function displayChange_field_telcte01b(row, status) {
    var fieldId;
}

function displayChange_field_telcte01c(row, status) {
    var fieldId;
}

function displayChange_field_emailcte01(row, status) {
    var fieldId;
}

function displayChange_field_calle_principal_exterior(row, status) {
    var fieldId;
}

function displayChange_field_no_exterior(row, status) {
    var fieldId;
}

function displayChange_field_calle_secundaria_exterior(row, status) {
    var fieldId;
}

function displayChange_field_id_pais_exterior(row, status) {
    var fieldId;
}

function displayChange_field_id_ciudad_exterior(row, status) {
    var fieldId;
}

function displayChange_field_codigo_postal_exterior(row, status) {
    var fieldId;
}

function displayChange_field_sector_exterior(row, status) {
    var fieldId;
}

function displayChange_field_telefono_exterior(row, status) {
    var fieldId;
}

function displayChange_field_celular_exterior(row, status) {
    var fieldId;
}

function displayChange_field_email_exterior(row, status) {
    var fieldId;
}

function displayChange_field_emailaltcte01(row, status) {
    var fieldId;
}

function displayChange_field_ctacgcte01(row, status) {
    var fieldId;
}

function displayChange_field_obsercte01(row, status) {
    var fieldId;
}

function displayChange_field_totexceso01(row, status) {
    var fieldId;
}

function displayChange_field_imagencte01(row, status) {
    var fieldId;
}

function displayChange_field_block(row, status) {
    var fieldId;
}

function displayChange_field_uid(row, status) {
    var fieldId;
}

function displayChange_field_ultimoacceso(row, status) {
    var fieldId;
}

function displayChange_field_idcli(row, status) {
    var fieldId;
}

function displayChange_field_catcte01(row, status) {
    var fieldId;
}

function displayChange_field_transferido(row, status) {
    var fieldId;
}

function displayChange_field_password(row, status) {
    var fieldId;
}

function displayChange_field_showroom(row, status) {
    var fieldId;
}

function displayChange_field_orden(row, status) {
    var fieldId;
}

function displayChange_field_website(row, status) {
    var fieldId;
}

function displayChange_field_longitud01(row, status) {
    var fieldId;
}

function displayChange_field_latitud01(row, status) {
    var fieldId;
}

function displayChange_field_zoom01(row, status) {
    var fieldId;
}

function displayChange_field_acceder(row, status) {
    var fieldId;
}

function displayChange_field_coniva01(row, status) {
    var fieldId;
}

function displayChange_field_idemp01(row, status) {
    var fieldId;
}

function displayChange_field_codprov01(row, status) {
    var fieldId;
}

function displayChange_field_celular01(row, status) {
    var fieldId;
}

function displayChange_field_dircliente01(row, status) {
    var fieldId;
}

function displayChange_field_razcte01(row, status) {
    var fieldId;
}

function displayChange_field_ruc01(row, status) {
    var fieldId;
}

function displayChange_field_timenegocio01(row, status) {
    var fieldId;
}

function displayChange_field_refbanc01(row, status) {
    var fieldId;
}

function displayChange_field_refcom01(row, status) {
    var fieldId;
}

function displayChange_field_tarjcred01(row, status) {
    var fieldId;
}

function displayChange_field_firmaut01(row, status) {
    var fieldId;
}

function displayChange_field_precte01(row, status) {
    var fieldId;
}

function displayChange_field_cuotasven01(row, status) {
    var fieldId;
}

function displayChange_field_diasven01(row, status) {
    var fieldId;
}

function displayChange_field_fechanace01(row, status) {
    var fieldId;
}

function displayChange_field_sexo01(row, status) {
    var fieldId;
}

function displayChange_field_estadocivil01(row, status) {
    var fieldId;
}

function displayChange_field_dirgestion01(row, status) {
    var fieldId;
}

function displayChange_field_numhijos01(row, status) {
    var fieldId;
}

function displayChange_field_estsop01(row, status) {
    var fieldId;
}

function displayChange_field_notick01(row, status) {
    var fieldId;
}

function displayChange_field_chequece(row, status) {
    var fieldId;
}

function displayChange_field_solcre(row, status) {
    var fieldId;
}

function displayChange_field_promocte01(row, status) {
    var fieldId;
}

function displayChange_field_pagare01(row, status) {
    var fieldId;
}

function displayChange_field_valorpagare01(row, status) {
    var fieldId;
}

function displayChange_field_garante01(row, status) {
    var fieldId;
}

function displayChange_field_fecvenp01(row, status) {
    var fieldId;
}

function displayChange_field_ctacgant01(row, status) {
    var fieldId;
}

function displayChange_field_dsn(row, status) {
    var fieldId;
}

function displayChange_field_residente(row, status) {
    var fieldId;
}

function displayChange_field_medio_contacto(row, status) {
    var fieldId;
}

function displayChange_field_separacion_bienes(row, status) {
    var fieldId;
}

function displayChange_field_disolucion_conyugal(row, status) {
    var fieldId;
}

function displayChange_field_capitulaciones(row, status) {
    var fieldId;
}

function displayChange_field_numero_carga_familiar(row, status) {
    var fieldId;
}

function displayChange_field_nivel_educacion(row, status) {
    var fieldId;
}

function displayChange_field_profesion(row, status) {
    var fieldId;
}

function displayChange_field_envio_correspondencia(row, status) {
    var fieldId;
}

function displayChange_field_nombre_arrendador(row, status) {
    var fieldId;
}

function displayChange_field_apellido_arrendador(row, status) {
    var fieldId;
}

function displayChange_field_id_vivienda(row, status) {
    var fieldId;
}

function displayChange_field_telefono_arrendador(row, status) {
    var fieldId;
}

function displayChange_field_nombres_referencia(row, status) {
    var fieldId;
}

function displayChange_field_apellidos_referencia(row, status) {
    var fieldId;
}

function displayChange_field_parentesco(row, status) {
    var fieldId;
}

function displayChange_field_celular_ref(row, status) {
    var fieldId;
}

function displayChange_field_telefono_convencional_ref(row, status) {
    var fieldId;
}

function displayChange_field_id_ocupacion(row, status) {
    var fieldId;
}

function displayChange_field_fecha_ingreso_empresa(row, status) {
    var fieldId;
}

function displayChange_field_nombre_empresa(row, status) {
    var fieldId;
}

function displayChange_field_ciudad_empresa(row, status) {
    var fieldId;
}

function displayChange_field_provincia_empresa(row, status) {
    var fieldId;
}

function displayChange_field_direccion_empresa(row, status) {
    var fieldId;
}

function displayChange_field_cargo_empresa(row, status) {
    var fieldId;
}

function displayChange_field_telefono_empresa(row, status) {
    var fieldId;
}

function displayChange_field_ext_empresa(row, status) {
    var fieldId;
}

function displayChange_field_id_tipo_contrato_actividad(row, status) {
    var fieldId;
}

function displayChange_field_empresa_jubilo_actividad(row, status) {
    var fieldId;
}

function displayChange_field_fecha_salida_empresa_actividad(row, status) {
    var fieldId;
}

function displayChange_field_cargo_salida_empresa_actividad(row, status) {
    var fieldId;
}

function displayChange_field_fecha_inicio_actividad(row, status) {
    var fieldId;
}

function displayChange_field_fecha_ingreso_empresa_actividad(row, status) {
    var fieldId;
}

function displayChange_field_nombre_empresa_actividad(row, status) {
    var fieldId;
}

function displayChange_field_institucion_actividad(row, status) {
    var fieldId;
}

function displayChange_field_ciudad_actividad(row, status) {
    var fieldId;
}

function displayChange_field_provincia_actividad(row, status) {
    var fieldId;
}

function displayChange_field_direccion_actividad(row, status) {
    var fieldId;
}

function displayChange_field_calle_principal_actividad(row, status) {
    var fieldId;
}

function displayChange_field_no_actividad(row, status) {
    var fieldId;
}

function displayChange_field_calle_secundaria_actividad(row, status) {
    var fieldId;
}

function displayChange_field_sector_actividad(row, status) {
    var fieldId;
}

function displayChange_field_pais_actividad(row, status) {
    var fieldId;
}

function displayChange_field_actividad(row, status) {
    var fieldId;
}

function displayChange_field_telefono_actividad(row, status) {
    var fieldId;
}

function displayChange_field_cargo_actividad(row, status) {
    var fieldId;
}

function displayChange_field_ext_actividad(row, status) {
    var fieldId;
}

function displayChange_field_fecha_ingreso_empresa_actividad2(row, status) {
    var fieldId;
}

function displayChange_field_nombre_empresa_actividad2(row, status) {
    var fieldId;
}

function displayChange_field_institucion_actividad2(row, status) {
    var fieldId;
}

function displayChange_field_ciudad_actividad2(row, status) {
    var fieldId;
}

function displayChange_field_provincia_actividad2(row, status) {
    var fieldId;
}

function displayChange_field_direccion_actividad2(row, status) {
    var fieldId;
}

function displayChange_field_calle_principal_actividad2(row, status) {
    var fieldId;
}

function displayChange_field_no_actividad2(row, status) {
    var fieldId;
}

function displayChange_field_calle_secundaria_actividad2(row, status) {
    var fieldId;
}

function displayChange_field_sector_actividad2(row, status) {
    var fieldId;
}

function displayChange_field_fecha_salida_empresa_actividad2(row, status) {
    var fieldId;
}

function displayChange_field_fecha_inicio_actividad2(row, status) {
    var fieldId;
}

function displayChange_field_actividad2(row, status) {
    var fieldId;
}

function displayChange_field_telefono_actividad2(row, status) {
    var fieldId;
}

function displayChange_field_ext_actividad2(row, status) {
    var fieldId;
}

function displayChange_field_cargo_actividad2(row, status) {
    var fieldId;
}

function displayChange_field_id_tipo_contrato_actividad2(row, status) {
    var fieldId;
}

function displayChange_field_empresa_jubilo_actividad2(row, status) {
    var fieldId;
}

function displayChange_field_sueldo(row, status) {
    var fieldId;
}

function displayChange_field_arriendos(row, status) {
    var fieldId;
}

function displayChange_field_dividendo_utilidades_ultimo_ano(row, status) {
    var fieldId;
}

function displayChange_field_id_otros_ingresos(row, status) {
    var fieldId;
}

function displayChange_field_arriendo_hipoteca(row, status) {
    var fieldId;
}

function displayChange_field_prestamos(row, status) {
    var fieldId;
}

function displayChange_field_tarjetas_creditos(row, status) {
    var fieldId;
}

function displayChange_field_gastos_familiares(row, status) {
    var fieldId;
}

function displayChange_field_id_otros_gastos(row, status) {
    var fieldId;
}

function displayChange_field_depositos_bancos(row, status) {
    var fieldId;
}

function displayChange_field_cuentas_documentos(row, status) {
    var fieldId;
}

function displayChange_field_mercaderias(row, status) {
    var fieldId;
}

function displayChange_field_maquinarias_vehiculos(row, status) {
    var fieldId;
}

function displayChange_field_terrenos_edificios(row, status) {
    var fieldId;
}

function displayChange_field_acciones_bonos_cedulas(row, status) {
    var fieldId;
}

function displayChange_field_id_otros_activos(row, status) {
    var fieldId;
}

function displayChange_field_cuentas_por_pagar(row, status) {
    var fieldId;
}

function displayChange_field_prestamos_banco_menos_ano(row, status) {
    var fieldId;
}

function displayChange_field_prestamos_banco_mas_ano(row, status) {
    var fieldId;
}

function displayChange_field_deudas_tarjetas_creditos(row, status) {
    var fieldId;
}

function displayChange_field_id_otras_obligaciones(row, status) {
    var fieldId;
}

function displayChange_field_deudor(row, status) {
    var fieldId;
}

function displayChange_field_monto(row, status) {
    var fieldId;
}

function displayChange_field_descripcion(row, status) {
    var fieldId;
}

function displayChange_field_placa(row, status) {
    var fieldId;
}

function displayChange_field_valor_maquinaria_vehiculo(row, status) {
    var fieldId;
}

function displayChange_field_a_nombre_de(row, status) {
    var fieldId;
}

function displayChange_field_ubicacion(row, status) {
    var fieldId;
}

function displayChange_field_valor_propiedad(row, status) {
    var fieldId;
}

function displayChange_field_empresa(row, status) {
    var fieldId;
}

function displayChange_field_valor_mercado(row, status) {
    var fieldId;
}

function displayChange_field_institucion_bancaria(row, status) {
    var fieldId;
}

function displayChange_field_monto_banco(row, status) {
    var fieldId;
}

function displayChange_field_institucion_finaciera(row, status) {
    var fieldId;
}

function displayChange_field_monto_institucion_finaciera(row, status) {
    var fieldId;
}

function displayChange_field_id_cliente_juridico(row, status) {
    var fieldId;
}

function displayChange_field_nombre_completo_empresa(row, status) {
    var fieldId;
}

function displayChange_field_es_empresa_extranjera(row, status) {
    var fieldId;
}

function displayChange_field_pais_empresa(row, status) {
    var fieldId;
}

function displayChange_field_fecha_constitucion_empresa(row, status) {
    var fieldId;
}

function displayChange_field_id_oficina(row, status) {
    var fieldId;
}

function displayChange_field_id_tipo_actividad(row, status) {
    var fieldId;
}

function displayChange_field_especifique_otros(row, status) {
    var fieldId;
}

function displayChange_field_direccion_correspondencia(row, status) {
    var fieldId;
}

function displayChange_field_calle_principal_correspondencia(row, status) {
    var fieldId;
}

function displayChange_field_no_correspondencia(row, status) {
    var fieldId;
}

function displayChange_field_calle_secundaria_correspondencia(row, status) {
    var fieldId;
}

function displayChange_field_id_ciudad_correspondencia(row, status) {
    var fieldId;
}

function displayChange_field_nombre_empresa_solicitante(row, status) {
    var fieldId;
}

function displayChange_field_cargo_empresa_solicitante(row, status) {
    var fieldId;
}

function displayChange_field_celular_empresa_solicitante(row, status) {
    var fieldId;
}

function displayChange_field_telefono_empresa_solicitante(row, status) {
    var fieldId;
}

function displayChange_field_mail_empresa_solicitante(row, status) {
    var fieldId;
}

function displayChange_field_saldo_empresa_solicitante(row, status) {
    var fieldId;
}

function displayChange_field_nombre_referencia_comerciales(row, status) {
    var fieldId;
}

function displayChange_field_fecha_compra(row, status) {
    var fieldId;
}

function displayChange_field_telefono_referencia_comerciales(row, status) {
    var fieldId;
}

function displayChange_field_ventas(row, status) {
    var fieldId;
}

function displayChange_field_comisiones(row, status) {
    var fieldId;
}

function displayChange_field_gastos_operativos(row, status) {
    var fieldId;
}

function displayChange_field_gastos_administrativos(row, status) {
    var fieldId;
}

function displayChange_field_pago_cuotas_prestamo(row, status) {
    var fieldId;
}

function displayChange_field_funcionario(row, status) {
    var fieldId;
}

function displayChange_field_funcionario_detalle(row, status) {
    var fieldId;
}

function displayChange_field_miembro_politico(row, status) {
    var fieldId;
}

function displayChange_field_miembro_politico_detalle(row, status) {
    var fieldId;
}

function displayChange_field_ejecutivo_gobierno(row, status) {
    var fieldId;
}

function displayChange_field_ejecutivo_gobierno_detalle(row, status) {
    var fieldId;
}

function displayChange_field_familiar_gobierno(row, status) {
    var fieldId;
}

function displayChange_field_familiar_gobierno_detalle(row, status) {
    var fieldId;
}

function displayChange_field_familiar_gobierno_detalle_quien(row, status) {
    var fieldId;
}

function displayChange_field_otros_ingresos(row, status) {
    var fieldId;
}

function displayChange_field_otros_gastos(row, status) {
    var fieldId;
}

function displayChange_field_otros_activos(row, status) {
    var fieldId;
}

function displayChange_field_otras_obligaciones(row, status) {
    var fieldId;
}

function displayChange_field_sector_direccion_empresa(row, status) {
    var fieldId;
}

function displayChange_field_sector_direccion_empresa_correo(row, status) {
    var fieldId;
}

function displayChange_field_extranjero_nombres_referencia(row, status) {
    var fieldId;
}

function displayChange_field_extranjero_apellidos_referencia(row, status) {
    var fieldId;
}

function displayChange_field_extranjero_parentesco(row, status) {
    var fieldId;
}

function displayChange_field_extranjero_celular_ref(row, status) {
    var fieldId;
}

function displayChange_field_extranjero_telefono_convencional_ref(row, status) {
    var fieldId;
}

function displayChange_field_cargo_representante_legal(row, status) {
    var fieldId;
}

function displayChange_field_direccion_extranjero(row, status) {
    var fieldId;
}

function displayChange_field_relacion_dependencia_principal(row, status) {
    var fieldId;
}

function displayChange_field_correo_corporativo_principal(row, status) {
    var fieldId;
}

function displayChange_field_relacion_dependencia_secundaria(row, status) {
    var fieldId;
}

function displayChange_field_correo_corporativo_secundario(row, status) {
    var fieldId;
}

function displayChange_field_actividad_secundaria(row, status) {
    var fieldId;
}

function displayChange_field_id_pais_empresa(row, status) {
    var fieldId;
}

function displayChange_field_id_provincia_empresa(row, status) {
    var fieldId;
}

function displayChange_field_id_pais_correo(row, status) {
    var fieldId;
}

function displayChange_field_id_provincia_correo(row, status) {
    var fieldId;
}

function displayChange_field_apellido_empresa_solicitante(row, status) {
    var fieldId;
}

function displayChange_field_pais_actividad2(row, status) {
    var fieldId;
}

function displayChange_field_id_provincia_exterior(row, status) {
    var fieldId;
}

function displayChange_field_pais_independiente(row, status) {
    var fieldId;
}

function displayChange_field_tipo_contrato_otros_actividad_principal(row, status) {
    var fieldId;
}

function displayChange_field_actividadeconomica(row, status) {
    var fieldId;
}

function displayChange_field_clasesujeto(row, status) {
    var fieldId;
}

function displayChange_field_provincia(row, status) {
    var fieldId;
}

function displayChange_field_parroquia(row, status) {
    var fieldId;
}

function displayChange_field_canton(row, status) {
    var fieldId;
}

function displayChange_field_demandajudicial(row, status) {
    var fieldId;
}

function displayChange_field_vdemandajudicial(row, status) {
    var fieldId;
}

function displayChange_field_carteracastigada(row, status) {
    var fieldId;
}

function displayChange_field_vcarteracastigada(row, status) {
    var fieldId;
}

function displayChange_field_accesoexterno01(row, status) {
    var fieldId;
}

function displayChange_field_referencia(row, status) {
    var fieldId;
}

function displayChange_field_id_pais_empleado_dir_desempeno(row, status) {
    var fieldId;
}

function displayChange_field_id_provincia_empleado_dir_desempeno(row, status) {
    var fieldId;
}

function displayChange_field_id_ciudad_empleado_dir_desempeno(row, status) {
    var fieldId;
}

function displayChange_field_razon_social(row, status) {
    var fieldId;
}

function displayChange_field_parterel01(row, status) {
    var fieldId;
}

function displayChange_field_origen_fondos(row, status) {
    var fieldId;
}

function displayChange_field_tipo_identificacion(row, status) {
    var fieldId;
}

function displayChange_field_id_actividad(row, status) {
    var fieldId;
}

function scRecreateSelect2() {
}
function scResetPagesDisplay() {
	$(".sc-form-page").show();
}

function scHidePage(pageNo) {
	$("#id_form_maecte_mob_form" + pageNo).hide();
}

function scCheckNoPageSelected() {
	if (!$(".sc-form-page").filter(".scTabActive").filter(":visible").length) {
		var inactiveTabs = $(".sc-form-page").filter(".scTabInactive").filter(":visible");
		if (inactiveTabs.length) {
			var tabNo = $(inactiveTabs[0]).attr("id").substr(23);
		}
	}
}
var sc_jq_calendar_value = {};

function scJQCalendarAdd(iSeqRow) {
  $("#id_sc_field_fecing01" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_fecing01" + iSeqRow] = $oField.val();
      if (2 == aParts.length) {
        sTime = " " + aParts[1];
      }
      if ('' == sTime || ' ' == sTime) {
        sTime = ' <?php echo $this->jqueryCalendarTimeStart($this->field_config['fecing01']['date_format']); ?>';
      }
      $oField.datepicker("option", "dateFormat", "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', 'hh', 'ii', 'ss', ':', ';', $_SESSION['scriptcase']['reg_conf']['date_sep'], $_SESSION['scriptcase']['reg_conf']['time_sep']), array('', 'yyyy', '','','', '', '', '', ''), $this->field_config['fecing01']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>" + sTime);
    },
    onClose: function(dateText, inst) {
      do_ajax_form_maecte_mob_validate_fecing01(iSeqRow);
    },
    showWeek: true,
    numberOfMonths: 1,
    changeMonth: true,
    changeYear: true,
    yearRange: 'c-5:c+5',
    dayNames: ["<?php        echo html_entity_decode($this->Ini->Nm_lang['lang_days_sund'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_mond'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_tued'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_wend'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_thud'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_frid'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_satd'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>"],
    dayNamesMin: ["<?php     echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_sund'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_mond'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_tued'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_wend'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_thud'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_frid'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_satd'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>"],
    monthNames: ["<?php      echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_janu"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_febr"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_marc"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_apri"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_mayy"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_june"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_july"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_augu"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_sept"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_octo"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_nove"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_dece"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>"],
    monthNamesShort: ["<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_janu'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_febr'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_marc'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_apri'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_mayy'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_june'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_july'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_augu'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_sept'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_octo'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_nove'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_dece'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>"],
    weekHeader: "<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_days_sem'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>",
    firstDay: <?php echo $this->jqueryCalendarWeekInit("" . $_SESSION['scriptcase']['reg_conf']['date_week_ini'] . ""); ?>,
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', 'hh', 'ii', 'ss', ':', ';', $_SESSION['scriptcase']['reg_conf']['date_sep'], $_SESSION['scriptcase']['reg_conf']['time_sep']), array('', 'yyyy', '','','', '', '', '', ''), $this->field_config['fecing01']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
    showOtherMonths: true,
    showOn: "button",
<?php
$miniCalendarIcon   = $this->jqueryIconFile('calendar');
$miniCalendarFA     = $this->jqueryFAFile('calendar');
$miniCalendarButton = $this->jqueryButtonText('calendar');
if ('' != $miniCalendarIcon) {
?>
    buttonImage: "<?php echo $miniCalendarIcon; ?>",
    buttonImageOnly: true,
<?php
}
elseif ('' != $miniCalendarFA) {
?>
    buttonText: "<?php echo $miniCalendarFA; ?>",
<?php
}
elseif ('' != $miniCalendarButton[0]) {
?>
    buttonText: "<?php echo $miniCalendarButton[0]; ?>",
<?php
}
?>
    currentText: "<?php  echo html_entity_decode($this->Ini->Nm_lang["lang_per_today"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);       ?>",
    closeText: "<?php  echo html_entity_decode($this->Ini->Nm_lang["lang_btns_mess_clse"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);       ?>",
  });
  $("#id_sc_field_fechanace01" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_fechanace01" + iSeqRow] = $oField.val();
    },
    onClose: function(dateText, inst) {
      do_ajax_form_maecte_mob_validate_fechanace01(iSeqRow);
    },
    showWeek: true,
    numberOfMonths: 1,
    changeMonth: true,
    changeYear: true,
    yearRange: 'c-5:c+5',
    dayNames: ["<?php        echo html_entity_decode($this->Ini->Nm_lang['lang_days_sund'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_mond'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_tued'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_wend'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_thud'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_frid'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_satd'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>"],
    dayNamesMin: ["<?php     echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_sund'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_mond'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_tued'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_wend'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_thud'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_frid'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_satd'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>"],
    monthNames: ["<?php      echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_janu"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_febr"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_marc"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_apri"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_mayy"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_june"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_july"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_augu"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_sept"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_octo"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_nove"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_dece"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>"],
    monthNamesShort: ["<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_janu'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_febr'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_marc'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_apri'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_mayy'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_june'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_july'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_augu'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_sept'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_octo'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_nove'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_dece'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>"],
    weekHeader: "<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_days_sem'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>",
    firstDay: <?php echo $this->jqueryCalendarWeekInit("" . $_SESSION['scriptcase']['reg_conf']['date_week_ini'] . ""); ?>,
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', $_SESSION['scriptcase']['reg_conf']['date_sep']), array('', 'yyyy', ''), $this->field_config['fechanace01']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
    showOtherMonths: true,
    showOn: "button",
<?php
$miniCalendarIcon   = $this->jqueryIconFile('calendar');
$miniCalendarFA     = $this->jqueryFAFile('calendar');
$miniCalendarButton = $this->jqueryButtonText('calendar');
if ('' != $miniCalendarIcon) {
?>
    buttonImage: "<?php echo $miniCalendarIcon; ?>",
    buttonImageOnly: true,
<?php
}
elseif ('' != $miniCalendarFA) {
?>
    buttonText: "<?php echo $miniCalendarFA; ?>",
<?php
}
elseif ('' != $miniCalendarButton[0]) {
?>
    buttonText: "<?php echo $miniCalendarButton[0]; ?>",
<?php
}
?>
    currentText: "<?php  echo html_entity_decode($this->Ini->Nm_lang["lang_per_today"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);       ?>",
    closeText: "<?php  echo html_entity_decode($this->Ini->Nm_lang["lang_btns_mess_clse"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);       ?>",
  });
  $("#id_sc_field_fecvenp01" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_fecvenp01" + iSeqRow] = $oField.val();
    },
    onClose: function(dateText, inst) {
      setTimeout(function() { do_ajax_form_maecte_mob_validate_fecvenp01(iSeqRow); }, 200);
    },
    showWeek: true,
    numberOfMonths: 1,
    changeMonth: true,
    changeYear: true,
    yearRange: 'c-5:c+5',
    dayNames: ["<?php        echo html_entity_decode($this->Ini->Nm_lang['lang_days_sund'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_mond'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_tued'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_wend'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_thud'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_frid'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_satd'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>"],
    dayNamesMin: ["<?php     echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_sund'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_mond'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_tued'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_wend'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_thud'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_frid'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_satd'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>"],
    monthNames: ["<?php      echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_janu"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_febr"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_marc"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_apri"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_mayy"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_june"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_july"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_augu"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_sept"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_octo"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_nove"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_dece"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>"],
    monthNamesShort: ["<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_janu'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_febr'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_marc'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_apri'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_mayy'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_june'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_july'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_augu'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_sept'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_octo'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_nove'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_dece'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>"],
    weekHeader: "<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_days_sem'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>",
    firstDay: <?php echo $this->jqueryCalendarWeekInit("" . $_SESSION['scriptcase']['reg_conf']['date_week_ini'] . ""); ?>,
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', $_SESSION['scriptcase']['reg_conf']['date_sep']), array('', 'yyyy', ''), $this->field_config['fecvenp01']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
    showOtherMonths: true,
    showOn: "button",
<?php
$miniCalendarIcon   = $this->jqueryIconFile('calendar');
$miniCalendarFA     = $this->jqueryFAFile('calendar');
$miniCalendarButton = $this->jqueryButtonText('calendar');
if ('' != $miniCalendarIcon) {
?>
    buttonImage: "<?php echo $miniCalendarIcon; ?>",
    buttonImageOnly: true,
<?php
}
elseif ('' != $miniCalendarFA) {
?>
    buttonText: "<?php echo $miniCalendarFA; ?>",
<?php
}
elseif ('' != $miniCalendarButton[0]) {
?>
    buttonText: "<?php echo $miniCalendarButton[0]; ?>",
<?php
}
?>
    currentText: "<?php  echo html_entity_decode($this->Ini->Nm_lang["lang_per_today"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);       ?>",
    closeText: "<?php  echo html_entity_decode($this->Ini->Nm_lang["lang_btns_mess_clse"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);       ?>",
  });
  $("#id_sc_field_fecha_ingreso_empresa" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_fecha_ingreso_empresa" + iSeqRow] = $oField.val();
    },
    onClose: function(dateText, inst) {
      setTimeout(function() { do_ajax_form_maecte_mob_validate_fecha_ingreso_empresa(iSeqRow); }, 200);
    },
    showWeek: true,
    numberOfMonths: 1,
    changeMonth: true,
    changeYear: true,
    yearRange: 'c-5:c+5',
    dayNames: ["<?php        echo html_entity_decode($this->Ini->Nm_lang['lang_days_sund'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_mond'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_tued'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_wend'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_thud'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_frid'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_satd'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>"],
    dayNamesMin: ["<?php     echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_sund'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_mond'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_tued'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_wend'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_thud'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_frid'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_satd'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>"],
    monthNames: ["<?php      echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_janu"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_febr"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_marc"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_apri"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_mayy"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_june"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_july"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_augu"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_sept"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_octo"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_nove"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_dece"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>"],
    monthNamesShort: ["<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_janu'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_febr'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_marc'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_apri'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_mayy'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_june'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_july'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_augu'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_sept'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_octo'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_nove'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_dece'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>"],
    weekHeader: "<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_days_sem'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>",
    firstDay: <?php echo $this->jqueryCalendarWeekInit("" . $_SESSION['scriptcase']['reg_conf']['date_week_ini'] . ""); ?>,
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', $_SESSION['scriptcase']['reg_conf']['date_sep']), array('', 'yyyy', ''), $this->field_config['fecha_ingreso_empresa']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
    showOtherMonths: true,
    showOn: "button",
<?php
$miniCalendarIcon   = $this->jqueryIconFile('calendar');
$miniCalendarFA     = $this->jqueryFAFile('calendar');
$miniCalendarButton = $this->jqueryButtonText('calendar');
if ('' != $miniCalendarIcon) {
?>
    buttonImage: "<?php echo $miniCalendarIcon; ?>",
    buttonImageOnly: true,
<?php
}
elseif ('' != $miniCalendarFA) {
?>
    buttonText: "<?php echo $miniCalendarFA; ?>",
<?php
}
elseif ('' != $miniCalendarButton[0]) {
?>
    buttonText: "<?php echo $miniCalendarButton[0]; ?>",
<?php
}
?>
    currentText: "<?php  echo html_entity_decode($this->Ini->Nm_lang["lang_per_today"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);       ?>",
    closeText: "<?php  echo html_entity_decode($this->Ini->Nm_lang["lang_btns_mess_clse"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);       ?>",
  });
  $("#id_sc_field_fecha_salida_empresa_actividad" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_fecha_salida_empresa_actividad" + iSeqRow] = $oField.val();
    },
    onClose: function(dateText, inst) {
      setTimeout(function() { do_ajax_form_maecte_mob_validate_fecha_salida_empresa_actividad(iSeqRow); }, 200);
    },
    showWeek: true,
    numberOfMonths: 1,
    changeMonth: true,
    changeYear: true,
    yearRange: 'c-5:c+5',
    dayNames: ["<?php        echo html_entity_decode($this->Ini->Nm_lang['lang_days_sund'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_mond'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_tued'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_wend'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_thud'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_frid'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_satd'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>"],
    dayNamesMin: ["<?php     echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_sund'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_mond'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_tued'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_wend'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_thud'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_frid'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_satd'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>"],
    monthNames: ["<?php      echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_janu"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_febr"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_marc"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_apri"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_mayy"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_june"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_july"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_augu"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_sept"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_octo"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_nove"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_dece"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>"],
    monthNamesShort: ["<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_janu'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_febr'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_marc'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_apri'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_mayy'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_june'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_july'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_augu'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_sept'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_octo'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_nove'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_dece'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>"],
    weekHeader: "<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_days_sem'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>",
    firstDay: <?php echo $this->jqueryCalendarWeekInit("" . $_SESSION['scriptcase']['reg_conf']['date_week_ini'] . ""); ?>,
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', $_SESSION['scriptcase']['reg_conf']['date_sep']), array('', 'yyyy', ''), $this->field_config['fecha_salida_empresa_actividad']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
    showOtherMonths: true,
    showOn: "button",
<?php
$miniCalendarIcon   = $this->jqueryIconFile('calendar');
$miniCalendarFA     = $this->jqueryFAFile('calendar');
$miniCalendarButton = $this->jqueryButtonText('calendar');
if ('' != $miniCalendarIcon) {
?>
    buttonImage: "<?php echo $miniCalendarIcon; ?>",
    buttonImageOnly: true,
<?php
}
elseif ('' != $miniCalendarFA) {
?>
    buttonText: "<?php echo $miniCalendarFA; ?>",
<?php
}
elseif ('' != $miniCalendarButton[0]) {
?>
    buttonText: "<?php echo $miniCalendarButton[0]; ?>",
<?php
}
?>
    currentText: "<?php  echo html_entity_decode($this->Ini->Nm_lang["lang_per_today"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);       ?>",
    closeText: "<?php  echo html_entity_decode($this->Ini->Nm_lang["lang_btns_mess_clse"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);       ?>",
  });
  $("#id_sc_field_fecha_inicio_actividad" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_fecha_inicio_actividad" + iSeqRow] = $oField.val();
    },
    onClose: function(dateText, inst) {
      setTimeout(function() { do_ajax_form_maecte_mob_validate_fecha_inicio_actividad(iSeqRow); }, 200);
    },
    showWeek: true,
    numberOfMonths: 1,
    changeMonth: true,
    changeYear: true,
    yearRange: 'c-5:c+5',
    dayNames: ["<?php        echo html_entity_decode($this->Ini->Nm_lang['lang_days_sund'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_mond'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_tued'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_wend'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_thud'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_frid'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_satd'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>"],
    dayNamesMin: ["<?php     echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_sund'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_mond'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_tued'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_wend'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_thud'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_frid'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_satd'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>"],
    monthNames: ["<?php      echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_janu"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_febr"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_marc"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_apri"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_mayy"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_june"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_july"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_augu"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_sept"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_octo"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_nove"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_dece"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>"],
    monthNamesShort: ["<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_janu'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_febr'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_marc'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_apri'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_mayy'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_june'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_july'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_augu'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_sept'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_octo'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_nove'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_dece'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>"],
    weekHeader: "<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_days_sem'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>",
    firstDay: <?php echo $this->jqueryCalendarWeekInit("" . $_SESSION['scriptcase']['reg_conf']['date_week_ini'] . ""); ?>,
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', $_SESSION['scriptcase']['reg_conf']['date_sep']), array('', 'yyyy', ''), $this->field_config['fecha_inicio_actividad']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
    showOtherMonths: true,
    showOn: "button",
<?php
$miniCalendarIcon   = $this->jqueryIconFile('calendar');
$miniCalendarFA     = $this->jqueryFAFile('calendar');
$miniCalendarButton = $this->jqueryButtonText('calendar');
if ('' != $miniCalendarIcon) {
?>
    buttonImage: "<?php echo $miniCalendarIcon; ?>",
    buttonImageOnly: true,
<?php
}
elseif ('' != $miniCalendarFA) {
?>
    buttonText: "<?php echo $miniCalendarFA; ?>",
<?php
}
elseif ('' != $miniCalendarButton[0]) {
?>
    buttonText: "<?php echo $miniCalendarButton[0]; ?>",
<?php
}
?>
    currentText: "<?php  echo html_entity_decode($this->Ini->Nm_lang["lang_per_today"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);       ?>",
    closeText: "<?php  echo html_entity_decode($this->Ini->Nm_lang["lang_btns_mess_clse"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);       ?>",
  });
  $("#id_sc_field_fecha_ingreso_empresa_actividad" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_fecha_ingreso_empresa_actividad" + iSeqRow] = $oField.val();
    },
    onClose: function(dateText, inst) {
      setTimeout(function() { do_ajax_form_maecte_mob_validate_fecha_ingreso_empresa_actividad(iSeqRow); }, 200);
    },
    showWeek: true,
    numberOfMonths: 1,
    changeMonth: true,
    changeYear: true,
    yearRange: 'c-5:c+5',
    dayNames: ["<?php        echo html_entity_decode($this->Ini->Nm_lang['lang_days_sund'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_mond'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_tued'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_wend'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_thud'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_frid'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_satd'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>"],
    dayNamesMin: ["<?php     echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_sund'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_mond'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_tued'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_wend'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_thud'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_frid'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_satd'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>"],
    monthNames: ["<?php      echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_janu"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_febr"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_marc"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_apri"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_mayy"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_june"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_july"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_augu"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_sept"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_octo"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_nove"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_dece"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>"],
    monthNamesShort: ["<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_janu'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_febr'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_marc'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_apri'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_mayy'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_june'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_july'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_augu'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_sept'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_octo'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_nove'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_dece'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>"],
    weekHeader: "<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_days_sem'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>",
    firstDay: <?php echo $this->jqueryCalendarWeekInit("" . $_SESSION['scriptcase']['reg_conf']['date_week_ini'] . ""); ?>,
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', $_SESSION['scriptcase']['reg_conf']['date_sep']), array('', 'yyyy', ''), $this->field_config['fecha_ingreso_empresa_actividad']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
    showOtherMonths: true,
    showOn: "button",
<?php
$miniCalendarIcon   = $this->jqueryIconFile('calendar');
$miniCalendarFA     = $this->jqueryFAFile('calendar');
$miniCalendarButton = $this->jqueryButtonText('calendar');
if ('' != $miniCalendarIcon) {
?>
    buttonImage: "<?php echo $miniCalendarIcon; ?>",
    buttonImageOnly: true,
<?php
}
elseif ('' != $miniCalendarFA) {
?>
    buttonText: "<?php echo $miniCalendarFA; ?>",
<?php
}
elseif ('' != $miniCalendarButton[0]) {
?>
    buttonText: "<?php echo $miniCalendarButton[0]; ?>",
<?php
}
?>
    currentText: "<?php  echo html_entity_decode($this->Ini->Nm_lang["lang_per_today"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);       ?>",
    closeText: "<?php  echo html_entity_decode($this->Ini->Nm_lang["lang_btns_mess_clse"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);       ?>",
  });
  $("#id_sc_field_fecha_ingreso_empresa_actividad2" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_fecha_ingreso_empresa_actividad2" + iSeqRow] = $oField.val();
    },
    onClose: function(dateText, inst) {
      setTimeout(function() { do_ajax_form_maecte_mob_validate_fecha_ingreso_empresa_actividad2(iSeqRow); }, 200);
    },
    showWeek: true,
    numberOfMonths: 1,
    changeMonth: true,
    changeYear: true,
    yearRange: 'c-5:c+5',
    dayNames: ["<?php        echo html_entity_decode($this->Ini->Nm_lang['lang_days_sund'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_mond'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_tued'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_wend'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_thud'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_frid'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_satd'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>"],
    dayNamesMin: ["<?php     echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_sund'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_mond'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_tued'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_wend'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_thud'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_frid'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_satd'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>"],
    monthNames: ["<?php      echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_janu"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_febr"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_marc"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_apri"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_mayy"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_june"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_july"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_augu"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_sept"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_octo"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_nove"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_dece"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>"],
    monthNamesShort: ["<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_janu'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_febr'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_marc'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_apri'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_mayy'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_june'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_july'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_augu'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_sept'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_octo'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_nove'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_dece'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>"],
    weekHeader: "<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_days_sem'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>",
    firstDay: <?php echo $this->jqueryCalendarWeekInit("" . $_SESSION['scriptcase']['reg_conf']['date_week_ini'] . ""); ?>,
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', $_SESSION['scriptcase']['reg_conf']['date_sep']), array('', 'yyyy', ''), $this->field_config['fecha_ingreso_empresa_actividad2']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
    showOtherMonths: true,
    showOn: "button",
<?php
$miniCalendarIcon   = $this->jqueryIconFile('calendar');
$miniCalendarFA     = $this->jqueryFAFile('calendar');
$miniCalendarButton = $this->jqueryButtonText('calendar');
if ('' != $miniCalendarIcon) {
?>
    buttonImage: "<?php echo $miniCalendarIcon; ?>",
    buttonImageOnly: true,
<?php
}
elseif ('' != $miniCalendarFA) {
?>
    buttonText: "<?php echo $miniCalendarFA; ?>",
<?php
}
elseif ('' != $miniCalendarButton[0]) {
?>
    buttonText: "<?php echo $miniCalendarButton[0]; ?>",
<?php
}
?>
    currentText: "<?php  echo html_entity_decode($this->Ini->Nm_lang["lang_per_today"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);       ?>",
    closeText: "<?php  echo html_entity_decode($this->Ini->Nm_lang["lang_btns_mess_clse"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);       ?>",
  });
  $("#id_sc_field_fecha_salida_empresa_actividad2" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_fecha_salida_empresa_actividad2" + iSeqRow] = $oField.val();
    },
    onClose: function(dateText, inst) {
      setTimeout(function() { do_ajax_form_maecte_mob_validate_fecha_salida_empresa_actividad2(iSeqRow); }, 200);
    },
    showWeek: true,
    numberOfMonths: 1,
    changeMonth: true,
    changeYear: true,
    yearRange: 'c-5:c+5',
    dayNames: ["<?php        echo html_entity_decode($this->Ini->Nm_lang['lang_days_sund'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_mond'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_tued'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_wend'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_thud'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_frid'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_satd'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>"],
    dayNamesMin: ["<?php     echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_sund'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_mond'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_tued'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_wend'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_thud'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_frid'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_satd'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>"],
    monthNames: ["<?php      echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_janu"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_febr"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_marc"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_apri"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_mayy"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_june"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_july"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_augu"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_sept"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_octo"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_nove"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_dece"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>"],
    monthNamesShort: ["<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_janu'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_febr'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_marc'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_apri'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_mayy'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_june'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_july'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_augu'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_sept'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_octo'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_nove'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_dece'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>"],
    weekHeader: "<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_days_sem'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>",
    firstDay: <?php echo $this->jqueryCalendarWeekInit("" . $_SESSION['scriptcase']['reg_conf']['date_week_ini'] . ""); ?>,
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', $_SESSION['scriptcase']['reg_conf']['date_sep']), array('', 'yyyy', ''), $this->field_config['fecha_salida_empresa_actividad2']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
    showOtherMonths: true,
    showOn: "button",
<?php
$miniCalendarIcon   = $this->jqueryIconFile('calendar');
$miniCalendarFA     = $this->jqueryFAFile('calendar');
$miniCalendarButton = $this->jqueryButtonText('calendar');
if ('' != $miniCalendarIcon) {
?>
    buttonImage: "<?php echo $miniCalendarIcon; ?>",
    buttonImageOnly: true,
<?php
}
elseif ('' != $miniCalendarFA) {
?>
    buttonText: "<?php echo $miniCalendarFA; ?>",
<?php
}
elseif ('' != $miniCalendarButton[0]) {
?>
    buttonText: "<?php echo $miniCalendarButton[0]; ?>",
<?php
}
?>
    currentText: "<?php  echo html_entity_decode($this->Ini->Nm_lang["lang_per_today"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);       ?>",
    closeText: "<?php  echo html_entity_decode($this->Ini->Nm_lang["lang_btns_mess_clse"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);       ?>",
  });
  $("#id_sc_field_fecha_inicio_actividad2" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_fecha_inicio_actividad2" + iSeqRow] = $oField.val();
    },
    onClose: function(dateText, inst) {
      setTimeout(function() { do_ajax_form_maecte_mob_validate_fecha_inicio_actividad2(iSeqRow); }, 200);
    },
    showWeek: true,
    numberOfMonths: 1,
    changeMonth: true,
    changeYear: true,
    yearRange: 'c-5:c+5',
    dayNames: ["<?php        echo html_entity_decode($this->Ini->Nm_lang['lang_days_sund'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_mond'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_tued'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_wend'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_thud'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_frid'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_satd'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>"],
    dayNamesMin: ["<?php     echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_sund'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_mond'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_tued'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_wend'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_thud'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_frid'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_satd'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>"],
    monthNames: ["<?php      echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_janu"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_febr"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_marc"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_apri"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_mayy"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_june"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_july"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_augu"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_sept"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_octo"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_nove"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_dece"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>"],
    monthNamesShort: ["<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_janu'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_febr'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_marc'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_apri'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_mayy'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_june'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_july'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_augu'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_sept'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_octo'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_nove'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_dece'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>"],
    weekHeader: "<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_days_sem'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>",
    firstDay: <?php echo $this->jqueryCalendarWeekInit("" . $_SESSION['scriptcase']['reg_conf']['date_week_ini'] . ""); ?>,
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', $_SESSION['scriptcase']['reg_conf']['date_sep']), array('', 'yyyy', ''), $this->field_config['fecha_inicio_actividad2']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
    showOtherMonths: true,
    showOn: "button",
<?php
$miniCalendarIcon   = $this->jqueryIconFile('calendar');
$miniCalendarFA     = $this->jqueryFAFile('calendar');
$miniCalendarButton = $this->jqueryButtonText('calendar');
if ('' != $miniCalendarIcon) {
?>
    buttonImage: "<?php echo $miniCalendarIcon; ?>",
    buttonImageOnly: true,
<?php
}
elseif ('' != $miniCalendarFA) {
?>
    buttonText: "<?php echo $miniCalendarFA; ?>",
<?php
}
elseif ('' != $miniCalendarButton[0]) {
?>
    buttonText: "<?php echo $miniCalendarButton[0]; ?>",
<?php
}
?>
    currentText: "<?php  echo html_entity_decode($this->Ini->Nm_lang["lang_per_today"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);       ?>",
    closeText: "<?php  echo html_entity_decode($this->Ini->Nm_lang["lang_btns_mess_clse"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);       ?>",
  });
  $("#id_sc_field_fecha_constitucion_empresa" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_fecha_constitucion_empresa" + iSeqRow] = $oField.val();
    },
    onClose: function(dateText, inst) {
      setTimeout(function() { do_ajax_form_maecte_mob_validate_fecha_constitucion_empresa(iSeqRow); }, 200);
    },
    showWeek: true,
    numberOfMonths: 1,
    changeMonth: true,
    changeYear: true,
    yearRange: 'c-5:c+5',
    dayNames: ["<?php        echo html_entity_decode($this->Ini->Nm_lang['lang_days_sund'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_mond'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_tued'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_wend'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_thud'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_frid'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_satd'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>"],
    dayNamesMin: ["<?php     echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_sund'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_mond'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_tued'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_wend'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_thud'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_frid'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_satd'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>"],
    monthNames: ["<?php      echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_janu"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_febr"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_marc"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_apri"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_mayy"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_june"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_july"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_augu"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_sept"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_octo"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_nove"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_dece"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>"],
    monthNamesShort: ["<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_janu'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_febr'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_marc'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_apri'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_mayy'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_june'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_july'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_augu'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_sept'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_octo'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_nove'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_dece'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>"],
    weekHeader: "<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_days_sem'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>",
    firstDay: <?php echo $this->jqueryCalendarWeekInit("" . $_SESSION['scriptcase']['reg_conf']['date_week_ini'] . ""); ?>,
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', $_SESSION['scriptcase']['reg_conf']['date_sep']), array('', 'yyyy', ''), $this->field_config['fecha_constitucion_empresa']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
    showOtherMonths: true,
    showOn: "button",
<?php
$miniCalendarIcon   = $this->jqueryIconFile('calendar');
$miniCalendarFA     = $this->jqueryFAFile('calendar');
$miniCalendarButton = $this->jqueryButtonText('calendar');
if ('' != $miniCalendarIcon) {
?>
    buttonImage: "<?php echo $miniCalendarIcon; ?>",
    buttonImageOnly: true,
<?php
}
elseif ('' != $miniCalendarFA) {
?>
    buttonText: "<?php echo $miniCalendarFA; ?>",
<?php
}
elseif ('' != $miniCalendarButton[0]) {
?>
    buttonText: "<?php echo $miniCalendarButton[0]; ?>",
<?php
}
?>
    currentText: "<?php  echo html_entity_decode($this->Ini->Nm_lang["lang_per_today"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);       ?>",
    closeText: "<?php  echo html_entity_decode($this->Ini->Nm_lang["lang_btns_mess_clse"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);       ?>",
  });
  $("#id_sc_field_fecha_compra" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_fecha_compra" + iSeqRow] = $oField.val();
    },
    onClose: function(dateText, inst) {
      setTimeout(function() { do_ajax_form_maecte_mob_validate_fecha_compra(iSeqRow); }, 200);
    },
    showWeek: true,
    numberOfMonths: 1,
    changeMonth: true,
    changeYear: true,
    yearRange: 'c-5:c+5',
    dayNames: ["<?php        echo html_entity_decode($this->Ini->Nm_lang['lang_days_sund'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_mond'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_tued'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_wend'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_thud'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_frid'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_satd'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>"],
    dayNamesMin: ["<?php     echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_sund'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_mond'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_tued'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_wend'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_thud'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_frid'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_satd'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>"],
    monthNames: ["<?php      echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_janu"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_febr"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_marc"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_apri"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_mayy"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_june"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_july"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_augu"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_sept"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_octo"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_nove"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_dece"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>"],
    monthNamesShort: ["<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_janu'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_febr'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_marc'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_apri'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_mayy'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_june'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_july'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_augu'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_sept'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_octo'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_nove'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_dece'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>"],
    weekHeader: "<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_days_sem'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>",
    firstDay: <?php echo $this->jqueryCalendarWeekInit("" . $_SESSION['scriptcase']['reg_conf']['date_week_ini'] . ""); ?>,
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', $_SESSION['scriptcase']['reg_conf']['date_sep']), array('', 'yyyy', ''), $this->field_config['fecha_compra']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
    showOtherMonths: true,
    showOn: "button",
<?php
$miniCalendarIcon   = $this->jqueryIconFile('calendar');
$miniCalendarFA     = $this->jqueryFAFile('calendar');
$miniCalendarButton = $this->jqueryButtonText('calendar');
if ('' != $miniCalendarIcon) {
?>
    buttonImage: "<?php echo $miniCalendarIcon; ?>",
    buttonImageOnly: true,
<?php
}
elseif ('' != $miniCalendarFA) {
?>
    buttonText: "<?php echo $miniCalendarFA; ?>",
<?php
}
elseif ('' != $miniCalendarButton[0]) {
?>
    buttonText: "<?php echo $miniCalendarButton[0]; ?>",
<?php
}
?>
    currentText: "<?php  echo html_entity_decode($this->Ini->Nm_lang["lang_per_today"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);       ?>",
    closeText: "<?php  echo html_entity_decode($this->Ini->Nm_lang["lang_btns_mess_clse"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);       ?>",
  });
} // scJQCalendarAdd

function scJQUploadAdd(iSeqRow) {
} // scJQUploadAdd

var api_cache_requests = [];
function ajax_check_file(img_name, field  ,t, p, p_cache, iSeqRow, hasRun, img_before){
    setTimeout(function(){
        if(img_name == '') return;
        iSeqRow= iSeqRow !== undefined && iSeqRow !== null ? iSeqRow : '';
        var hasVar = p.indexOf('_@NM@_') > -1 || p_cache.indexOf('_@NM@_') > -1 ? true : false;

        p = p.split('_@NM@_');
        $.each(p, function(i,v){
            try{
                p[i] = $('[name='+v+iSeqRow+']').val();
            }
            catch(err){
                p[i] = v;
            }
        });
        p = p.join('');

        p_cache = p_cache.split('_@NM@_');
        $.each(p_cache, function(i,v){
            try{
                p_cache[i] = $('[name='+v+iSeqRow+']').val();
            }
            catch(err){
                p_cache[i] = v;
            }
        });
        p_cache = p_cache.join('');

        img_before = img_before !== undefined ? img_before : $(t).attr('src');
        var str_key_cache = '<?php echo $this->Ini->sc_page; ?>' + img_name+field+p+p_cache;
        if(api_cache_requests[ str_key_cache ] !== undefined && api_cache_requests[ str_key_cache ] !== null){
            if(api_cache_requests[ str_key_cache ] != false){
                do_ajax_check_file(api_cache_requests[ str_key_cache ], field  ,t, iSeqRow);
            }
            return;
        }
        //scAjaxProcOn();
        $(t).attr('src', '<?php echo $this->Ini->path_icones ?>/scriptcase__NM__ajax_load.gif');
        api_cache_requests[ str_key_cache ] = false;
        var rs =$.ajax({
                    type: "POST",
                    url: 'index.php?script_case_init=<?php echo $this->Ini->sc_page; ?>',
                    async: true,
                    data:'nmgp_opcao=ajax_check_file&AjaxCheckImg=' + encodeURI(img_name) +'&rsargs='+ field + '&p=' + p + '&p_cache=' + p_cache,
                    success: function (rs) {
                        if(rs.indexOf('</span>') != -1){
                            rs = rs.substr(rs.indexOf('</span>') + 7);
                        }
                        if(rs.indexOf('/') != -1 && rs.indexOf('/') != 0){
                            rs = rs.substr(rs.indexOf('/'));
                        }
                        rs = sc_trim(rs);

                        // if(rs == 0 && hasVar && hasRun === undefined){
                        //     delete window.api_cache_requests[ str_key_cache ];
                        //     ajax_check_file(img_name, field  ,t, p, p_cache, iSeqRow, 1, img_before);
                        //     return;
                        // }
                        window.api_cache_requests[ str_key_cache ] = rs;
                        do_ajax_check_file(rs, field  ,t, iSeqRow)
                        if(rs == 0){
                            delete window.api_cache_requests[ str_key_cache ];

                           // $(t).attr('src',img_before);
                            do_ajax_check_file(img_before+'_@@NM@@_' + img_before, field  ,t, iSeqRow)

                        }


                    }
        });
    },100);
}

function do_ajax_check_file(rs, field  ,t, iSeqRow){
    if (rs != 0) {
        rs_split = rs.split('_@@NM@@_');
        rs_orig = rs_split[0];
        rs2 = rs_split[1];
        try{
            if(!$(t).is('img')){

                if($('#id_read_on_'+field+iSeqRow).length > 0 ){
                                    var usa_read_only = false;

                switch(field){

                }
                     if(usa_read_only && $('a',$('#id_read_on_'+field+iSeqRow)).length == 0){
                         $(t).html("<a href=\"javascript:nm_mostra_doc('0', '"+rs2+"', 'form_maecte_mob')\">"+$('#id_read_on_'+field+iSeqRow).text()+"</a>");
                     }
                }
                if($('#id_ajax_doc_'+field+iSeqRow+' a').length > 0){
                    var target = $('#id_ajax_doc_'+field+iSeqRow+' a').attr('href').split(',');
                    target[1] = "'"+rs2+"'";
                    $('#id_ajax_doc_'+field+iSeqRow+' a').attr('href', target.join(','));
                }else{
                    var target = $(t).attr('href').split(',');
                     target[1] = "'"+rs2+"'";
                     $(t).attr('href', target.join(','));
                }
            }else{
                $(t).attr('src', rs2);
                $(t).css('display', '');
                if($('#id_ajax_doc_'+field+iSeqRow+' a').length > 0){
                    var target = $('#id_ajax_doc_'+field+iSeqRow+' a').attr('href').split(',');
                    target[1] = "'"+rs2+"'";
                    $(t).attr('href', target.join(','));
                }else{
                     var t_link = $(t).parent('a');
                     var target = $(t_link).attr('href').split(',');
                     target[0] = "javascript:nm_mostra_img('"+rs_orig+"'";
                     $(t_link).attr('href', target.join(','));
                }

            }
            eval("window.var_ajax_img_"+field+iSeqRow+" = '"+rs_orig+"';");

        } catch(err){
                        eval("window.var_ajax_img_"+field+iSeqRow+" = '"+rs_orig+"';");

        }
    }
   /* hasFalseCacheRequest = false;
    $.each(api_cache_requests, function(i,v){
        if(v == false){
            hasFalseCacheRequest = true;
        }
    });
    if(hasFalseCacheRequest == false){
        scAjaxProcOff();
    }*/
}

$(document).ready(function(){
});

function scJQPasswordToggleAdd(seqRow) {
  $(".sc-ui-pwd-toggle-icon" + seqRow).on("click", function() {
    var fieldName = $(this).attr("id").substr(17), fieldObj = $("#id_sc_field_" + fieldName), fieldFA = $("#id_pwd_fa_" + fieldName);
    if ("text" == fieldObj.attr("type")) {
      fieldObj.attr("type", "password");
      fieldFA.attr("class", "fa fa-eye sc-ui-pwd-eye");
    } else {
      fieldObj.attr("type", "text");
      fieldFA.attr("class", "fa fa-eye-slash sc-ui-pwd-eye");
    }
  });
} // scJQPasswordToggleAdd

function scJQSelect2Add(seqRow, specificField) {
} // scJQSelect2Add


function scJQElementsAdd(iLine) {
  scJQEventsAdd(iLine);
  scEventControl_init(iLine);
  scJQCalendarAdd(iLine);
  scJQUploadAdd(iLine);
  scJQPasswordToggleAdd(iLine);
  scJQSelect2Add(iLine);
} // scJQElementsAdd

function scGetFileExtension(fileName)
{
    fileNameParts = fileName.split(".");

    if (1 === fileNameParts.length || (2 === fileNameParts.length && "" == fileNameParts[0])) {
        return "";
    }

    return fileNameParts.pop().toLowerCase();
}

function scFormatExtensionSizeErrorMsg(errorMsg)
{
    var msgInfo = errorMsg.split("||"), returnMsg = "";

    if ("err_size" == msgInfo[0]) {
        returnMsg = "<?php echo $this->Ini->Nm_lang['lang_errm_file_size'] ?>. <?php echo $this->Ini->Nm_lang['lang_errm_file_size_extension'] ?>".replace("{SC_EXTENSION}", msgInfo[1]).replace("{SC_LIMIT}", msgInfo[2]);
    } else if ("err_extension" == msgInfo[0]) {
        returnMsg = "<?php echo $this->Ini->Nm_lang['lang_errm_file_invl'] ?>";
    }

    return returnMsg;
}

