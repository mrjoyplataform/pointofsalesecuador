
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
  scEventControl_data["idreg" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["idcustomer" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["nombre" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["correo" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["celular" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["idinterno" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["direccion" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["tipodoc" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["ult_fecha" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["local_centro" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["cliente_tipo" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["afiliado_desde" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["sector" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["estado" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["uniqueid" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["ciudad" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["pais" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["fecha1" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["fecha2" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["fecha3" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["idreg" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["idreg" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["idcustomer" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["idcustomer" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["nombre" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["nombre" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["correo" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["correo" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["celular" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["celular" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["idinterno" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["idinterno" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["direccion" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["direccion" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["tipodoc" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["tipodoc" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["ult_fecha" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["ult_fecha" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["local_centro" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["local_centro" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["cliente_tipo" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["cliente_tipo" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["afiliado_desde" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["afiliado_desde" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["sector" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["sector" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["estado" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["estado" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["uniqueid" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["uniqueid" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["ciudad" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["ciudad" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["pais" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["pais" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["fecha1" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["fecha1" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["fecha2" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["fecha2" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["fecha3" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["fecha3" + iSeqRow]["change"]) {
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
  $('#id_sc_field_idreg' + iSeqRow).bind('blur', function() { sc_form_customer_clubmrjoy_process_idreg_onblur(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_customer_clubmrjoy_process_idreg_onfocus(this, iSeqRow) });
  $('#id_sc_field_idcustomer' + iSeqRow).bind('blur', function() { sc_form_customer_clubmrjoy_process_idcustomer_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_customer_clubmrjoy_process_idcustomer_onfocus(this, iSeqRow) });
  $('#id_sc_field_nombre' + iSeqRow).bind('blur', function() { sc_form_customer_clubmrjoy_process_nombre_onblur(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_customer_clubmrjoy_process_nombre_onfocus(this, iSeqRow) });
  $('#id_sc_field_correo' + iSeqRow).bind('blur', function() { sc_form_customer_clubmrjoy_process_correo_onblur(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_customer_clubmrjoy_process_correo_onfocus(this, iSeqRow) });
  $('#id_sc_field_celular' + iSeqRow).bind('blur', function() { sc_form_customer_clubmrjoy_process_celular_onblur(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_customer_clubmrjoy_process_celular_onfocus(this, iSeqRow) });
  $('#id_sc_field_idinterno' + iSeqRow).bind('blur', function() { sc_form_customer_clubmrjoy_process_idinterno_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_customer_clubmrjoy_process_idinterno_onfocus(this, iSeqRow) });
  $('#id_sc_field_direccion' + iSeqRow).bind('blur', function() { sc_form_customer_clubmrjoy_process_direccion_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_customer_clubmrjoy_process_direccion_onfocus(this, iSeqRow) });
  $('#id_sc_field_tipodoc' + iSeqRow).bind('blur', function() { sc_form_customer_clubmrjoy_process_tipodoc_onblur(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_customer_clubmrjoy_process_tipodoc_onfocus(this, iSeqRow) });
  $('#id_sc_field_ult_fecha' + iSeqRow).bind('blur', function() { sc_form_customer_clubmrjoy_process_ult_fecha_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_customer_clubmrjoy_process_ult_fecha_onfocus(this, iSeqRow) });
  $('#id_sc_field_local_centro' + iSeqRow).bind('blur', function() { sc_form_customer_clubmrjoy_process_local_centro_onblur(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_customer_clubmrjoy_process_local_centro_onfocus(this, iSeqRow) });
  $('#id_sc_field_cliente_tipo' + iSeqRow).bind('blur', function() { sc_form_customer_clubmrjoy_process_cliente_tipo_onblur(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_customer_clubmrjoy_process_cliente_tipo_onfocus(this, iSeqRow) });
  $('#id_sc_field_afiliado_desde' + iSeqRow).bind('blur', function() { sc_form_customer_clubmrjoy_process_afiliado_desde_onblur(this, iSeqRow) })
                                            .bind('focus', function() { sc_form_customer_clubmrjoy_process_afiliado_desde_onfocus(this, iSeqRow) });
  $('#id_sc_field_sector' + iSeqRow).bind('blur', function() { sc_form_customer_clubmrjoy_process_sector_onblur(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_customer_clubmrjoy_process_sector_onfocus(this, iSeqRow) });
  $('#id_sc_field_estado' + iSeqRow).bind('blur', function() { sc_form_customer_clubmrjoy_process_estado_onblur(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_customer_clubmrjoy_process_estado_onfocus(this, iSeqRow) });
  $('#id_sc_field_uniqueid' + iSeqRow).bind('blur', function() { sc_form_customer_clubmrjoy_process_uniqueid_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_customer_clubmrjoy_process_uniqueid_onfocus(this, iSeqRow) });
  $('#id_sc_field_ciudad' + iSeqRow).bind('blur', function() { sc_form_customer_clubmrjoy_process_ciudad_onblur(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_customer_clubmrjoy_process_ciudad_onfocus(this, iSeqRow) });
  $('#id_sc_field_pais' + iSeqRow).bind('blur', function() { sc_form_customer_clubmrjoy_process_pais_onblur(this, iSeqRow) })
                                  .bind('focus', function() { sc_form_customer_clubmrjoy_process_pais_onfocus(this, iSeqRow) });
  $('#id_sc_field_fecha1' + iSeqRow).bind('blur', function() { sc_form_customer_clubmrjoy_process_fecha1_onblur(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_customer_clubmrjoy_process_fecha1_onfocus(this, iSeqRow) });
  $('#id_sc_field_fecha2' + iSeqRow).bind('blur', function() { sc_form_customer_clubmrjoy_process_fecha2_onblur(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_customer_clubmrjoy_process_fecha2_onfocus(this, iSeqRow) });
  $('#id_sc_field_fecha3' + iSeqRow).bind('blur', function() { sc_form_customer_clubmrjoy_process_fecha3_onblur(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_customer_clubmrjoy_process_fecha3_onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_customer_clubmrjoy_process_idreg_onblur(oThis, iSeqRow) {
  do_ajax_form_customer_clubmrjoy_process_mob_validate_idreg();
  scCssBlur(oThis);
}

function sc_form_customer_clubmrjoy_process_idreg_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_customer_clubmrjoy_process_idcustomer_onblur(oThis, iSeqRow) {
  do_ajax_form_customer_clubmrjoy_process_mob_validate_idcustomer();
  scCssBlur(oThis);
}

function sc_form_customer_clubmrjoy_process_idcustomer_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_customer_clubmrjoy_process_nombre_onblur(oThis, iSeqRow) {
  do_ajax_form_customer_clubmrjoy_process_mob_validate_nombre();
  scCssBlur(oThis);
}

function sc_form_customer_clubmrjoy_process_nombre_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_customer_clubmrjoy_process_correo_onblur(oThis, iSeqRow) {
  do_ajax_form_customer_clubmrjoy_process_mob_validate_correo();
  scCssBlur(oThis);
}

function sc_form_customer_clubmrjoy_process_correo_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_customer_clubmrjoy_process_celular_onblur(oThis, iSeqRow) {
  do_ajax_form_customer_clubmrjoy_process_mob_validate_celular();
  scCssBlur(oThis);
}

function sc_form_customer_clubmrjoy_process_celular_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_customer_clubmrjoy_process_idinterno_onblur(oThis, iSeqRow) {
  do_ajax_form_customer_clubmrjoy_process_mob_validate_idinterno();
  scCssBlur(oThis);
}

function sc_form_customer_clubmrjoy_process_idinterno_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_customer_clubmrjoy_process_direccion_onblur(oThis, iSeqRow) {
  do_ajax_form_customer_clubmrjoy_process_mob_validate_direccion();
  scCssBlur(oThis);
}

function sc_form_customer_clubmrjoy_process_direccion_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_customer_clubmrjoy_process_tipodoc_onblur(oThis, iSeqRow) {
  do_ajax_form_customer_clubmrjoy_process_mob_validate_tipodoc();
  scCssBlur(oThis);
}

function sc_form_customer_clubmrjoy_process_tipodoc_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_customer_clubmrjoy_process_ult_fecha_onblur(oThis, iSeqRow) {
  do_ajax_form_customer_clubmrjoy_process_mob_validate_ult_fecha();
  scCssBlur(oThis);
}

function sc_form_customer_clubmrjoy_process_ult_fecha_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_customer_clubmrjoy_process_local_centro_onblur(oThis, iSeqRow) {
  do_ajax_form_customer_clubmrjoy_process_mob_validate_local_centro();
  scCssBlur(oThis);
}

function sc_form_customer_clubmrjoy_process_local_centro_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_customer_clubmrjoy_process_cliente_tipo_onblur(oThis, iSeqRow) {
  do_ajax_form_customer_clubmrjoy_process_mob_validate_cliente_tipo();
  scCssBlur(oThis);
}

function sc_form_customer_clubmrjoy_process_cliente_tipo_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_customer_clubmrjoy_process_afiliado_desde_onblur(oThis, iSeqRow) {
  do_ajax_form_customer_clubmrjoy_process_mob_validate_afiliado_desde();
  scCssBlur(oThis);
}

function sc_form_customer_clubmrjoy_process_afiliado_desde_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_customer_clubmrjoy_process_sector_onblur(oThis, iSeqRow) {
  do_ajax_form_customer_clubmrjoy_process_mob_validate_sector();
  scCssBlur(oThis);
}

function sc_form_customer_clubmrjoy_process_sector_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_customer_clubmrjoy_process_estado_onblur(oThis, iSeqRow) {
  do_ajax_form_customer_clubmrjoy_process_mob_validate_estado();
  scCssBlur(oThis);
}

function sc_form_customer_clubmrjoy_process_estado_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_customer_clubmrjoy_process_uniqueid_onblur(oThis, iSeqRow) {
  do_ajax_form_customer_clubmrjoy_process_mob_validate_uniqueid();
  scCssBlur(oThis);
}

function sc_form_customer_clubmrjoy_process_uniqueid_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_customer_clubmrjoy_process_ciudad_onblur(oThis, iSeqRow) {
  do_ajax_form_customer_clubmrjoy_process_mob_validate_ciudad();
  scCssBlur(oThis);
}

function sc_form_customer_clubmrjoy_process_ciudad_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_customer_clubmrjoy_process_pais_onblur(oThis, iSeqRow) {
  do_ajax_form_customer_clubmrjoy_process_mob_validate_pais();
  scCssBlur(oThis);
}

function sc_form_customer_clubmrjoy_process_pais_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_customer_clubmrjoy_process_fecha1_onblur(oThis, iSeqRow) {
  do_ajax_form_customer_clubmrjoy_process_mob_validate_fecha1();
  scCssBlur(oThis);
}

function sc_form_customer_clubmrjoy_process_fecha1_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_customer_clubmrjoy_process_fecha2_onblur(oThis, iSeqRow) {
  do_ajax_form_customer_clubmrjoy_process_mob_validate_fecha2();
  scCssBlur(oThis);
}

function sc_form_customer_clubmrjoy_process_fecha2_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_customer_clubmrjoy_process_fecha3_onblur(oThis, iSeqRow) {
  do_ajax_form_customer_clubmrjoy_process_mob_validate_fecha3();
  scCssBlur(oThis);
}

function sc_form_customer_clubmrjoy_process_fecha3_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function displayChange_block(block, status) {
	if ("0" == block) {
		displayChange_block_0(status);
	}
}

function displayChange_block_0(status) {
	displayChange_field("idreg", "", status);
	displayChange_field("idcustomer", "", status);
	displayChange_field("nombre", "", status);
	displayChange_field("correo", "", status);
	displayChange_field("celular", "", status);
	displayChange_field("idinterno", "", status);
	displayChange_field("direccion", "", status);
	displayChange_field("tipodoc", "", status);
	displayChange_field("ult_fecha", "", status);
	displayChange_field("local_centro", "", status);
	displayChange_field("cliente_tipo", "", status);
	displayChange_field("afiliado_desde", "", status);
	displayChange_field("sector", "", status);
	displayChange_field("estado", "", status);
	displayChange_field("uniqueid", "", status);
	displayChange_field("ciudad", "", status);
	displayChange_field("pais", "", status);
	displayChange_field("fecha1", "", status);
	displayChange_field("fecha2", "", status);
	displayChange_field("fecha3", "", status);
}

function displayChange_row(row, status) {
	displayChange_field_idreg(row, status);
	displayChange_field_idcustomer(row, status);
	displayChange_field_nombre(row, status);
	displayChange_field_correo(row, status);
	displayChange_field_celular(row, status);
	displayChange_field_idinterno(row, status);
	displayChange_field_direccion(row, status);
	displayChange_field_tipodoc(row, status);
	displayChange_field_ult_fecha(row, status);
	displayChange_field_local_centro(row, status);
	displayChange_field_cliente_tipo(row, status);
	displayChange_field_afiliado_desde(row, status);
	displayChange_field_sector(row, status);
	displayChange_field_estado(row, status);
	displayChange_field_uniqueid(row, status);
	displayChange_field_ciudad(row, status);
	displayChange_field_pais(row, status);
	displayChange_field_fecha1(row, status);
	displayChange_field_fecha2(row, status);
	displayChange_field_fecha3(row, status);
}

function displayChange_field(field, row, status) {
	if ("idreg" == field) {
		displayChange_field_idreg(row, status);
	}
	if ("idcustomer" == field) {
		displayChange_field_idcustomer(row, status);
	}
	if ("nombre" == field) {
		displayChange_field_nombre(row, status);
	}
	if ("correo" == field) {
		displayChange_field_correo(row, status);
	}
	if ("celular" == field) {
		displayChange_field_celular(row, status);
	}
	if ("idinterno" == field) {
		displayChange_field_idinterno(row, status);
	}
	if ("direccion" == field) {
		displayChange_field_direccion(row, status);
	}
	if ("tipodoc" == field) {
		displayChange_field_tipodoc(row, status);
	}
	if ("ult_fecha" == field) {
		displayChange_field_ult_fecha(row, status);
	}
	if ("local_centro" == field) {
		displayChange_field_local_centro(row, status);
	}
	if ("cliente_tipo" == field) {
		displayChange_field_cliente_tipo(row, status);
	}
	if ("afiliado_desde" == field) {
		displayChange_field_afiliado_desde(row, status);
	}
	if ("sector" == field) {
		displayChange_field_sector(row, status);
	}
	if ("estado" == field) {
		displayChange_field_estado(row, status);
	}
	if ("uniqueid" == field) {
		displayChange_field_uniqueid(row, status);
	}
	if ("ciudad" == field) {
		displayChange_field_ciudad(row, status);
	}
	if ("pais" == field) {
		displayChange_field_pais(row, status);
	}
	if ("fecha1" == field) {
		displayChange_field_fecha1(row, status);
	}
	if ("fecha2" == field) {
		displayChange_field_fecha2(row, status);
	}
	if ("fecha3" == field) {
		displayChange_field_fecha3(row, status);
	}
}

function displayChange_field_idreg(row, status) {
    var fieldId;
}

function displayChange_field_idcustomer(row, status) {
    var fieldId;
}

function displayChange_field_nombre(row, status) {
    var fieldId;
}

function displayChange_field_correo(row, status) {
    var fieldId;
}

function displayChange_field_celular(row, status) {
    var fieldId;
}

function displayChange_field_idinterno(row, status) {
    var fieldId;
}

function displayChange_field_direccion(row, status) {
    var fieldId;
}

function displayChange_field_tipodoc(row, status) {
    var fieldId;
}

function displayChange_field_ult_fecha(row, status) {
    var fieldId;
}

function displayChange_field_local_centro(row, status) {
    var fieldId;
}

function displayChange_field_cliente_tipo(row, status) {
    var fieldId;
}

function displayChange_field_afiliado_desde(row, status) {
    var fieldId;
}

function displayChange_field_sector(row, status) {
    var fieldId;
}

function displayChange_field_estado(row, status) {
    var fieldId;
}

function displayChange_field_uniqueid(row, status) {
    var fieldId;
}

function displayChange_field_ciudad(row, status) {
    var fieldId;
}

function displayChange_field_pais(row, status) {
    var fieldId;
}

function displayChange_field_fecha1(row, status) {
    var fieldId;
}

function displayChange_field_fecha2(row, status) {
    var fieldId;
}

function displayChange_field_fecha3(row, status) {
    var fieldId;
}

function scRecreateSelect2() {
}
function scResetPagesDisplay() {
	$(".sc-form-page").show();
}

function scHidePage(pageNo) {
	$("#id_form_customer_clubmrjoy_process_mob_form" + pageNo).hide();
}

function scCheckNoPageSelected() {
	if (!$(".sc-form-page").filter(".scTabActive").filter(":visible").length) {
		var inactiveTabs = $(".sc-form-page").filter(".scTabInactive").filter(":visible");
		if (inactiveTabs.length) {
			var tabNo = $(inactiveTabs[0]).attr("id").substr(43);
		}
	}
}
var sc_jq_calendar_value = {};

function scJQCalendarAdd(iSeqRow) {
  $("#id_sc_field_afiliado_desde" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_afiliado_desde" + iSeqRow] = $oField.val();
    },
    onClose: function(dateText, inst) {
      do_ajax_form_customer_clubmrjoy_process_mob_validate_afiliado_desde(iSeqRow);
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
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', $_SESSION['scriptcase']['reg_conf']['date_sep']), array('', 'yyyy', ''), $this->field_config['afiliado_desde']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
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
                         $(t).html("<a href=\"javascript:nm_mostra_doc('0', '"+rs2+"', 'form_customer_clubmrjoy_process_mob')\">"+$('#id_read_on_'+field+iSeqRow).text()+"</a>");
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

