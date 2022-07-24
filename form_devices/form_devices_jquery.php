
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
  scEventControl_data["cod_device" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["dev_ip" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["cod_grupo" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["url_atraccion" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["url_accion" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["device_name" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["activa" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["acepta_tokens" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["tokens" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["pin_relay1" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["pin_relay2" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["cod_activo" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["cod_device" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["cod_device" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["dev_ip" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["dev_ip" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["cod_grupo" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["cod_grupo" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["url_atraccion" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["url_atraccion" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["url_accion" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["url_accion" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["device_name" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["device_name" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["activa" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["activa" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["acepta_tokens" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["acepta_tokens" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["tokens" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["tokens" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["pin_relay1" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["pin_relay1" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["pin_relay2" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["pin_relay2" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["cod_activo" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["cod_activo" + iSeqRow]["change"]) {
    return true;
  }
  return false;
} // scEventControl_active

function scEventControl_onFocus(oField, iSeq) {
  var fieldId, fieldName;
  fieldId = $(oField).attr("id");
  fieldName = fieldId.substr(12);
  scEventControl_data[fieldName]["blur"] = true;
  if ("cod_grupo" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("cod_grupo" + iSeq == fieldName) {
    scEventControl_data[fieldName]["change"]   = true;
    scEventControl_data[fieldName]["original"] = $(oField).val();
    scEventControl_data[fieldName]["calculated"] = $(oField).val();
    return;
  }
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
  $('#id_sc_field_cod_device' + iSeqRow).bind('blur', function() { sc_form_devices_cod_device_onblur(this, iSeqRow) })
                                        .bind('change', function() { sc_form_devices_cod_device_onchange(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_devices_cod_device_onfocus(this, iSeqRow) });
  $('#id_sc_field_cod_activo' + iSeqRow).bind('blur', function() { sc_form_devices_cod_activo_onblur(this, iSeqRow) })
                                        .bind('change', function() { sc_form_devices_cod_activo_onchange(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_devices_cod_activo_onfocus(this, iSeqRow) });
  $('#id_sc_field_cod_grupo' + iSeqRow).bind('blur', function() { sc_form_devices_cod_grupo_onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_form_devices_cod_grupo_onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_devices_cod_grupo_onfocus(this, iSeqRow) });
  $('#id_sc_field_device_name' + iSeqRow).bind('blur', function() { sc_form_devices_device_name_onblur(this, iSeqRow) })
                                         .bind('change', function() { sc_form_devices_device_name_onchange(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_devices_device_name_onfocus(this, iSeqRow) });
  $('#id_sc_field_activa' + iSeqRow).bind('blur', function() { sc_form_devices_activa_onblur(this, iSeqRow) })
                                    .bind('change', function() { sc_form_devices_activa_onchange(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_devices_activa_onfocus(this, iSeqRow) });
  $('#id_sc_field_estado' + iSeqRow).bind('change', function() { sc_form_devices_estado_onchange(this, iSeqRow) });
  $('#id_sc_field_ult_rfid' + iSeqRow).bind('change', function() { sc_form_devices_ult_rfid_onchange(this, iSeqRow) });
  $('#id_sc_field_ult_fecha' + iSeqRow).bind('change', function() { sc_form_devices_ult_fecha_onchange(this, iSeqRow) });
  $('#id_sc_field_ult_fecha_hora' + iSeqRow).bind('change', function() { sc_form_devices_ult_fecha_hora_onchange(this, iSeqRow) });
  $('#id_sc_field_valor_default' + iSeqRow).bind('change', function() { sc_form_devices_valor_default_onchange(this, iSeqRow) });
  $('#id_sc_field_acepta_tiempo' + iSeqRow).bind('change', function() { sc_form_devices_acepta_tiempo_onchange(this, iSeqRow) });
  $('#id_sc_field_acepta_tokens' + iSeqRow).bind('blur', function() { sc_form_devices_acepta_tokens_onblur(this, iSeqRow) })
                                           .bind('change', function() { sc_form_devices_acepta_tokens_onchange(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_devices_acepta_tokens_onfocus(this, iSeqRow) });
  $('#id_sc_field_dev_ip' + iSeqRow).bind('blur', function() { sc_form_devices_dev_ip_onblur(this, iSeqRow) })
                                    .bind('change', function() { sc_form_devices_dev_ip_onchange(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_devices_dev_ip_onfocus(this, iSeqRow) });
  $('#id_sc_field_tipo_dev' + iSeqRow).bind('change', function() { sc_form_devices_tipo_dev_onchange(this, iSeqRow) });
  $('#id_sc_field_direccion_torno' + iSeqRow).bind('change', function() { sc_form_devices_direccion_torno_onchange(this, iSeqRow) });
  $('#id_sc_field_timeout_rfid' + iSeqRow).bind('change', function() { sc_form_devices_timeout_rfid_onchange(this, iSeqRow) });
  $('#id_sc_field_discapacitado' + iSeqRow).bind('change', function() { sc_form_devices_discapacitado_onchange(this, iSeqRow) });
  $('#id_sc_field_numcaja' + iSeqRow).bind('change', function() { sc_form_devices_numcaja_onchange(this, iSeqRow) });
  $('#id_sc_field_empleado' + iSeqRow).bind('change', function() { sc_form_devices_empleado_onchange(this, iSeqRow) });
  $('#id_sc_field_tokens' + iSeqRow).bind('blur', function() { sc_form_devices_tokens_onblur(this, iSeqRow) })
                                    .bind('change', function() { sc_form_devices_tokens_onchange(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_devices_tokens_onfocus(this, iSeqRow) });
  $('#id_sc_field_serialrfid' + iSeqRow).bind('change', function() { sc_form_devices_serialrfid_onchange(this, iSeqRow) });
  $('#id_sc_field_bidireccion' + iSeqRow).bind('change', function() { sc_form_devices_bidireccion_onchange(this, iSeqRow) });
  $('#id_sc_field_cod_devicee' + iSeqRow).bind('change', function() { sc_form_devices_cod_devicee_onchange(this, iSeqRow) });
  $('#id_sc_field_url_1' + iSeqRow).bind('change', function() { sc_form_devices_url_1_onchange(this, iSeqRow) });
  $('#id_sc_field_url_2' + iSeqRow).bind('change', function() { sc_form_devices_url_2_onchange(this, iSeqRow) });
  $('#id_sc_field_url_3' + iSeqRow).bind('change', function() { sc_form_devices_url_3_onchange(this, iSeqRow) });
  $('#id_sc_field_foto1' + iSeqRow).bind('change', function() { sc_form_devices_foto1_onchange(this, iSeqRow) });
  $('#id_sc_field_foto2' + iSeqRow).bind('change', function() { sc_form_devices_foto2_onchange(this, iSeqRow) });
  $('#id_sc_field_foto3' + iSeqRow).bind('change', function() { sc_form_devices_foto3_onchange(this, iSeqRow) });
  $('#id_sc_field_pin_relay1' + iSeqRow).bind('blur', function() { sc_form_devices_pin_relay1_onblur(this, iSeqRow) })
                                        .bind('change', function() { sc_form_devices_pin_relay1_onchange(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_devices_pin_relay1_onfocus(this, iSeqRow) });
  $('#id_sc_field_pin_relay2' + iSeqRow).bind('blur', function() { sc_form_devices_pin_relay2_onblur(this, iSeqRow) })
                                        .bind('change', function() { sc_form_devices_pin_relay2_onchange(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_devices_pin_relay2_onfocus(this, iSeqRow) });
  $('#id_sc_field_rfid_read' + iSeqRow).bind('change', function() { sc_form_devices_rfid_read_onchange(this, iSeqRow) });
  $('#id_sc_field_rfid_estado' + iSeqRow).bind('change', function() { sc_form_devices_rfid_estado_onchange(this, iSeqRow) });
  $('#id_sc_field_rfid_fecha' + iSeqRow).bind('change', function() { sc_form_devices_rfid_fecha_onchange(this, iSeqRow) });
  $('#id_sc_field_rfid_fecha_hora' + iSeqRow).bind('change', function() { sc_form_devices_rfid_fecha_hora_onchange(this, iSeqRow) });
  $('#id_sc_field_url_accion' + iSeqRow).bind('blur', function() { sc_form_devices_url_accion_onblur(this, iSeqRow) })
                                        .bind('change', function() { sc_form_devices_url_accion_onchange(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_devices_url_accion_onfocus(this, iSeqRow) });
  $('#id_sc_field_url_atraccion' + iSeqRow).bind('blur', function() { sc_form_devices_url_atraccion_onblur(this, iSeqRow) })
                                           .bind('change', function() { sc_form_devices_url_atraccion_onchange(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_devices_url_atraccion_onfocus(this, iSeqRow) });
  $('.sc-ui-radio-activa' + iSeqRow).on('click', function() { scMarkFormAsChanged(); });
  $('.sc-ui-radio-acepta_tokens' + iSeqRow).on('click', function() { scMarkFormAsChanged(); });
} // scJQEventsAdd

function sc_form_devices_cod_device_onblur(oThis, iSeqRow) {
  do_ajax_form_devices_validate_cod_device();
  scCssBlur(oThis);
}

function sc_form_devices_cod_device_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_devices_cod_device_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_devices_cod_activo_onblur(oThis, iSeqRow) {
  do_ajax_form_devices_validate_cod_activo();
  scCssBlur(oThis);
}

function sc_form_devices_cod_activo_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_devices_cod_activo_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_devices_cod_grupo_onblur(oThis, iSeqRow) {
  do_ajax_form_devices_validate_cod_grupo();
  scCssBlur(oThis);
}

function sc_form_devices_cod_grupo_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  do_ajax_form_devices_event_cod_grupo_onchange();
}

function sc_form_devices_cod_grupo_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_devices_device_name_onblur(oThis, iSeqRow) {
  do_ajax_form_devices_validate_device_name();
  scCssBlur(oThis);
}

function sc_form_devices_device_name_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_devices_device_name_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_devices_activa_onblur(oThis, iSeqRow) {
  do_ajax_form_devices_validate_activa();
  scCssBlur(oThis);
}

function sc_form_devices_activa_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_devices_activa_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_devices_estado_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_devices_ult_rfid_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_devices_ult_fecha_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_devices_ult_fecha_hora_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_devices_valor_default_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_devices_acepta_tiempo_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_devices_acepta_tokens_onblur(oThis, iSeqRow) {
  do_ajax_form_devices_validate_acepta_tokens();
  scCssBlur(oThis);
}

function sc_form_devices_acepta_tokens_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_devices_acepta_tokens_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_devices_dev_ip_onblur(oThis, iSeqRow) {
  do_ajax_form_devices_validate_dev_ip();
  scCssBlur(oThis);
}

function sc_form_devices_dev_ip_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_devices_dev_ip_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_devices_tipo_dev_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_devices_direccion_torno_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_devices_timeout_rfid_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_devices_discapacitado_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_devices_numcaja_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_devices_empleado_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_devices_tokens_onblur(oThis, iSeqRow) {
  do_ajax_form_devices_validate_tokens();
  scCssBlur(oThis);
}

function sc_form_devices_tokens_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_devices_tokens_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_devices_serialrfid_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_devices_bidireccion_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_devices_cod_devicee_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_devices_url_1_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_devices_url_2_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_devices_url_3_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_devices_foto1_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_devices_foto2_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_devices_foto3_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_devices_pin_relay1_onblur(oThis, iSeqRow) {
  do_ajax_form_devices_validate_pin_relay1();
  scCssBlur(oThis);
}

function sc_form_devices_pin_relay1_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_devices_pin_relay1_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_devices_pin_relay2_onblur(oThis, iSeqRow) {
  do_ajax_form_devices_validate_pin_relay2();
  scCssBlur(oThis);
}

function sc_form_devices_pin_relay2_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_devices_pin_relay2_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_devices_rfid_read_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_devices_rfid_estado_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_devices_rfid_fecha_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_devices_rfid_fecha_hora_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_devices_url_accion_onblur(oThis, iSeqRow) {
  do_ajax_form_devices_validate_url_accion();
  scCssBlur(oThis);
}

function sc_form_devices_url_accion_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_devices_url_accion_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_devices_url_atraccion_onblur(oThis, iSeqRow) {
  do_ajax_form_devices_validate_url_atraccion();
  scCssBlur(oThis);
}

function sc_form_devices_url_atraccion_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_devices_url_atraccion_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function displayChange_block(block, status) {
	if ("0" == block) {
		displayChange_block_0(status);
	}
}

function displayChange_block_0(status) {
	displayChange_field("cod_device", "", status);
	displayChange_field("dev_ip", "", status);
	displayChange_field("cod_grupo", "", status);
	displayChange_field("url_atraccion", "", status);
	displayChange_field("url_accion", "", status);
	displayChange_field("device_name", "", status);
	displayChange_field("activa", "", status);
	displayChange_field("acepta_tokens", "", status);
	displayChange_field("tokens", "", status);
	displayChange_field("pin_relay1", "", status);
	displayChange_field("pin_relay2", "", status);
	displayChange_field("cod_activo", "", status);
}

function displayChange_row(row, status) {
	displayChange_field_cod_device(row, status);
	displayChange_field_dev_ip(row, status);
	displayChange_field_cod_grupo(row, status);
	displayChange_field_url_atraccion(row, status);
	displayChange_field_url_accion(row, status);
	displayChange_field_device_name(row, status);
	displayChange_field_activa(row, status);
	displayChange_field_acepta_tokens(row, status);
	displayChange_field_tokens(row, status);
	displayChange_field_pin_relay1(row, status);
	displayChange_field_pin_relay2(row, status);
	displayChange_field_cod_activo(row, status);
}

function displayChange_field(field, row, status) {
	if ("cod_device" == field) {
		displayChange_field_cod_device(row, status);
	}
	if ("dev_ip" == field) {
		displayChange_field_dev_ip(row, status);
	}
	if ("cod_grupo" == field) {
		displayChange_field_cod_grupo(row, status);
	}
	if ("url_atraccion" == field) {
		displayChange_field_url_atraccion(row, status);
	}
	if ("url_accion" == field) {
		displayChange_field_url_accion(row, status);
	}
	if ("device_name" == field) {
		displayChange_field_device_name(row, status);
	}
	if ("activa" == field) {
		displayChange_field_activa(row, status);
	}
	if ("acepta_tokens" == field) {
		displayChange_field_acepta_tokens(row, status);
	}
	if ("tokens" == field) {
		displayChange_field_tokens(row, status);
	}
	if ("pin_relay1" == field) {
		displayChange_field_pin_relay1(row, status);
	}
	if ("pin_relay2" == field) {
		displayChange_field_pin_relay2(row, status);
	}
	if ("cod_activo" == field) {
		displayChange_field_cod_activo(row, status);
	}
}

function displayChange_field_cod_device(row, status) {
    var fieldId;
}

function displayChange_field_dev_ip(row, status) {
    var fieldId;
}

function displayChange_field_cod_grupo(row, status) {
    var fieldId;
}

function displayChange_field_url_atraccion(row, status) {
    var fieldId;
}

function displayChange_field_url_accion(row, status) {
    var fieldId;
}

function displayChange_field_device_name(row, status) {
    var fieldId;
}

function displayChange_field_activa(row, status) {
    var fieldId;
}

function displayChange_field_acepta_tokens(row, status) {
    var fieldId;
}

function displayChange_field_tokens(row, status) {
    var fieldId;
}

function displayChange_field_pin_relay1(row, status) {
    var fieldId;
}

function displayChange_field_pin_relay2(row, status) {
    var fieldId;
}

function displayChange_field_cod_activo(row, status) {
    var fieldId;
}

function scRecreateSelect2() {
}
function scResetPagesDisplay() {
	$(".sc-form-page").show();
}

function scHidePage(pageNo) {
	$("#id_form_devices_form" + pageNo).hide();
}

function scCheckNoPageSelected() {
	if (!$(".sc-form-page").filter(".scTabActive").filter(":visible").length) {
		var inactiveTabs = $(".sc-form-page").filter(".scTabInactive").filter(":visible");
		if (inactiveTabs.length) {
			var tabNo = $(inactiveTabs[0]).attr("id").substr(20);
		}
	}
}
var sc_jq_calendar_value = {};

function scJQCalendarAdd(iSeqRow) {
  $("#id_sc_field_ult_fecha" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_ult_fecha" + iSeqRow] = $oField.val();
      if (2 == aParts.length) {
        sTime = " " + aParts[1];
      }
      if ('' == sTime || ' ' == sTime) {
        sTime = ' <?php echo $this->jqueryCalendarTimeStart($this->field_config['ult_fecha']['date_format']); ?>';
      }
      $oField.datepicker("option", "dateFormat", "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', 'hh', 'ii', 'ss', ':', ';', $_SESSION['scriptcase']['reg_conf']['date_sep'], $_SESSION['scriptcase']['reg_conf']['time_sep']), array('', 'yyyy', '','','', '', '', '', ''), $this->field_config['ult_fecha']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>" + sTime);
    },
    onClose: function(dateText, inst) {
      do_ajax_form_devices_validate_ult_fecha(iSeqRow);
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
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', 'hh', 'ii', 'ss', ':', ';', $_SESSION['scriptcase']['reg_conf']['date_sep'], $_SESSION['scriptcase']['reg_conf']['time_sep']), array('', 'yyyy', '','','', '', '', '', ''), $this->field_config['ult_fecha']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
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

function scJQLinkReadonlyAdd(iSeqRow) {
  $(".sc-ui-readonly-url_atraccion" + iSeqRow).click(function() {
    var linkUrl = $(this).html();
    window.open(linkUrl, "_blank");
  }).mouseover(function() { $(this).css("cursor", "pointer"); })
    .mouseout(function() { $(this).css("cursor", ""); });
  $(".sc-ui-readonly-url_accion" + iSeqRow).click(function() {
    var linkUrl = $(this).html();
    window.open(linkUrl, "_blank");
  }).mouseover(function() { $(this).css("cursor", "pointer"); })
    .mouseout(function() { $(this).css("cursor", ""); });
} // scJQLinkReadonlyAdd

function scJQUploadAdd(iSeqRow) {
  $("#id_sc_field_foto1" + iSeqRow).fileupload({
    datatype: "json",
    url: "form_devices_ul_save.php",
    dropZone: $("#hidden_field_data_foto1" + iSeqRow),
    formData: function() {
      return [
        {name: 'param_field', value: 'foto1'},
        {name: 'param_seq', value: '<?php echo $this->Ini->sc_page; ?>'},
        {name: 'upload_file_row', value: iSeqRow}
      ];
    },
    progress: function(e, data) {
      var loader, progress;
      if (data.lengthComputable && window.FormData !== undefined) {
        loader = $("#id_img_loader_foto1" + iSeqRow);
        loaderContent = $("#id_img_loader_foto1" + iSeqRow + " .scProgressBarLoading");
        loaderContent.html("&nbsp;");
        progress = parseInt(data.loaded / data.total * 100, 10);
        loader.show().find("div").css("width", progress + "%");
      }
      else {
        loader = $("#id_ajax_loader_foto1" + iSeqRow);
        loader.show();
      }
    },
    done: function(e, data) {
      var fileData, respData, respPos, respMsg, thumbDisplay, checkDisplay, var_ajax_img_thumb, oTemp;
      fileData = null;
      respMsg = "";
      if (data && data.result && data.result[0] && data.result[0].body) {
        respData = data.result[0].body.innerText;
        respPos = respData.indexOf("[{");
        if (-1 !== respPos) {
          respMsg = respData.substr(0, respPos);
          respData = respData.substr(respPos);
          fileData = $.parseJSON(respData);
        }
        else {
          respMsg = respData;
        }
      }
      else {
        respData = data.result;
        respPos = respData.indexOf("[{");
        if (-1 !== respPos) {
          respMsg = respData.substr(0, respPos);
          respData = respData.substr(respPos);
          fileData = eval(respData);
        }
        else {
          respMsg = respData;
        }
      }
      if (window.FormData !== undefined)
      {
        $("#id_img_loader_foto1" + iSeqRow).hide();
      }
      else
      {
        $("#id_ajax_loader_foto1" + iSeqRow).hide();
      }
      if (null == fileData) {
        if ("" != respMsg) {
          oTemp = {"htmOutput" : "<?php echo $this->Ini->Nm_lang['lang_errm_upld_admn']; ?>"};
          scAjaxShowDebug(oTemp);
        }
        return;
      }
      if (fileData[0].error && "" != fileData[0].error) {
        var uploadErrorMessage = "";
        oResp = {};
        if ("acceptFileTypes" == fileData[0].error) {
          uploadErrorMessage = "<?php echo $this->form_encode_input($this->Ini->Nm_lang['lang_errm_file_invl']) ?>";
        }
        else if ("maxFileSize" == fileData[0].error) {
          uploadErrorMessage = "<?php echo $this->form_encode_input($this->Ini->Nm_lang['lang_errm_file_size']) ?>";
        }
        else if ("minFileSize" == fileData[0].error) {
          uploadErrorMessage = "<?php echo $this->form_encode_input($this->Ini->Nm_lang['lang_errm_file_size']) ?>";
        }
        else if ("emptyFile" == fileData[0].error) {
          uploadErrorMessage = "<?php echo $this->form_encode_input($this->Ini->Nm_lang['lang_errm_file_empty']) ?>";
        }
        scAjaxShowErrorDisplay("table", uploadErrorMessage);
        return;
      }
      $("#id_sc_field_foto1" + iSeqRow).val("");
      $("#id_sc_field_foto1_ul_name" + iSeqRow).val(fileData[0].sc_ul_name);
      $("#id_sc_field_foto1_ul_type" + iSeqRow).val(fileData[0].type);
      var_ajax_img_foto1 = '<?php echo $this->Ini->path_imag_temp; ?>/' + fileData[0].sc_image_source;
      var_ajax_img_thumb = '<?php echo $this->Ini->path_imag_temp; ?>/' + fileData[0].sc_thumb_prot;
      thumbDisplay = ("" == var_ajax_img_foto1) ? "none" : "";
      $("#id_ajax_img_foto1" + iSeqRow).attr("src", var_ajax_img_thumb);
      $("#id_ajax_img_foto1" + iSeqRow).css("display", thumbDisplay);
      if (document.F1.temp_out1_foto1) {
        document.F1.temp_out_foto1.value = var_ajax_img_thumb;
        document.F1.temp_out1_foto1.value = var_ajax_img_foto1;
      }
      else if (document.F1.temp_out_foto1) {
        document.F1.temp_out_foto1.value = var_ajax_img_foto1;
      }
      checkDisplay = ("" == fileData[0].sc_random_prot.substr(12)) ? "none" : "";
      $("#chk_ajax_img_foto1" + iSeqRow).css("display", checkDisplay);
      $("#txt_ajax_img_foto1" + iSeqRow).html(fileData[0].name);
      $("#txt_ajax_img_foto1" + iSeqRow).css("display", checkDisplay);
      $("#id_ajax_link_foto1" + iSeqRow).html(fileData[0].sc_random_prot.substr(12));
    }
  });

  $("#id_sc_field_foto2" + iSeqRow).fileupload({
    datatype: "json",
    url: "form_devices_ul_save.php",
    dropZone: $("#hidden_field_data_foto2" + iSeqRow),
    formData: function() {
      return [
        {name: 'param_field', value: 'foto2'},
        {name: 'param_seq', value: '<?php echo $this->Ini->sc_page; ?>'},
        {name: 'upload_file_row', value: iSeqRow}
      ];
    },
    progress: function(e, data) {
      var loader, progress;
      if (data.lengthComputable && window.FormData !== undefined) {
        loader = $("#id_img_loader_foto2" + iSeqRow);
        loaderContent = $("#id_img_loader_foto2" + iSeqRow + " .scProgressBarLoading");
        loaderContent.html("&nbsp;");
        progress = parseInt(data.loaded / data.total * 100, 10);
        loader.show().find("div").css("width", progress + "%");
      }
      else {
        loader = $("#id_ajax_loader_foto2" + iSeqRow);
        loader.show();
      }
    },
    done: function(e, data) {
      var fileData, respData, respPos, respMsg, thumbDisplay, checkDisplay, var_ajax_img_thumb, oTemp;
      fileData = null;
      respMsg = "";
      if (data && data.result && data.result[0] && data.result[0].body) {
        respData = data.result[0].body.innerText;
        respPos = respData.indexOf("[{");
        if (-1 !== respPos) {
          respMsg = respData.substr(0, respPos);
          respData = respData.substr(respPos);
          fileData = $.parseJSON(respData);
        }
        else {
          respMsg = respData;
        }
      }
      else {
        respData = data.result;
        respPos = respData.indexOf("[{");
        if (-1 !== respPos) {
          respMsg = respData.substr(0, respPos);
          respData = respData.substr(respPos);
          fileData = eval(respData);
        }
        else {
          respMsg = respData;
        }
      }
      if (window.FormData !== undefined)
      {
        $("#id_img_loader_foto2" + iSeqRow).hide();
      }
      else
      {
        $("#id_ajax_loader_foto2" + iSeqRow).hide();
      }
      if (null == fileData) {
        if ("" != respMsg) {
          oTemp = {"htmOutput" : "<?php echo $this->Ini->Nm_lang['lang_errm_upld_admn']; ?>"};
          scAjaxShowDebug(oTemp);
        }
        return;
      }
      if (fileData[0].error && "" != fileData[0].error) {
        var uploadErrorMessage = "";
        oResp = {};
        if ("acceptFileTypes" == fileData[0].error) {
          uploadErrorMessage = "<?php echo $this->form_encode_input($this->Ini->Nm_lang['lang_errm_file_invl']) ?>";
        }
        else if ("maxFileSize" == fileData[0].error) {
          uploadErrorMessage = "<?php echo $this->form_encode_input($this->Ini->Nm_lang['lang_errm_file_size']) ?>";
        }
        else if ("minFileSize" == fileData[0].error) {
          uploadErrorMessage = "<?php echo $this->form_encode_input($this->Ini->Nm_lang['lang_errm_file_size']) ?>";
        }
        else if ("emptyFile" == fileData[0].error) {
          uploadErrorMessage = "<?php echo $this->form_encode_input($this->Ini->Nm_lang['lang_errm_file_empty']) ?>";
        }
        scAjaxShowErrorDisplay("table", uploadErrorMessage);
        return;
      }
      $("#id_sc_field_foto2" + iSeqRow).val("");
      $("#id_sc_field_foto2_ul_name" + iSeqRow).val(fileData[0].sc_ul_name);
      $("#id_sc_field_foto2_ul_type" + iSeqRow).val(fileData[0].type);
      var_ajax_img_foto2 = '<?php echo $this->Ini->path_imag_temp; ?>/' + fileData[0].sc_image_source;
      var_ajax_img_thumb = '<?php echo $this->Ini->path_imag_temp; ?>/' + fileData[0].sc_thumb_prot;
      thumbDisplay = ("" == var_ajax_img_foto2) ? "none" : "";
      $("#id_ajax_img_foto2" + iSeqRow).attr("src", var_ajax_img_thumb);
      $("#id_ajax_img_foto2" + iSeqRow).css("display", thumbDisplay);
      if (document.F1.temp_out1_foto2) {
        document.F1.temp_out_foto2.value = var_ajax_img_thumb;
        document.F1.temp_out1_foto2.value = var_ajax_img_foto2;
      }
      else if (document.F1.temp_out_foto2) {
        document.F1.temp_out_foto2.value = var_ajax_img_foto2;
      }
      checkDisplay = ("" == fileData[0].sc_random_prot.substr(12)) ? "none" : "";
      $("#chk_ajax_img_foto2" + iSeqRow).css("display", checkDisplay);
      $("#txt_ajax_img_foto2" + iSeqRow).html(fileData[0].name);
      $("#txt_ajax_img_foto2" + iSeqRow).css("display", checkDisplay);
      $("#id_ajax_link_foto2" + iSeqRow).html(fileData[0].sc_random_prot.substr(12));
    }
  });

  $("#id_sc_field_foto3" + iSeqRow).fileupload({
    datatype: "json",
    url: "form_devices_ul_save.php",
    dropZone: $("#hidden_field_data_foto3" + iSeqRow),
    formData: function() {
      return [
        {name: 'param_field', value: 'foto3'},
        {name: 'param_seq', value: '<?php echo $this->Ini->sc_page; ?>'},
        {name: 'upload_file_row', value: iSeqRow}
      ];
    },
    progress: function(e, data) {
      var loader, progress;
      if (data.lengthComputable && window.FormData !== undefined) {
        loader = $("#id_img_loader_foto3" + iSeqRow);
        loaderContent = $("#id_img_loader_foto3" + iSeqRow + " .scProgressBarLoading");
        loaderContent.html("&nbsp;");
        progress = parseInt(data.loaded / data.total * 100, 10);
        loader.show().find("div").css("width", progress + "%");
      }
      else {
        loader = $("#id_ajax_loader_foto3" + iSeqRow);
        loader.show();
      }
    },
    done: function(e, data) {
      var fileData, respData, respPos, respMsg, thumbDisplay, checkDisplay, var_ajax_img_thumb, oTemp;
      fileData = null;
      respMsg = "";
      if (data && data.result && data.result[0] && data.result[0].body) {
        respData = data.result[0].body.innerText;
        respPos = respData.indexOf("[{");
        if (-1 !== respPos) {
          respMsg = respData.substr(0, respPos);
          respData = respData.substr(respPos);
          fileData = $.parseJSON(respData);
        }
        else {
          respMsg = respData;
        }
      }
      else {
        respData = data.result;
        respPos = respData.indexOf("[{");
        if (-1 !== respPos) {
          respMsg = respData.substr(0, respPos);
          respData = respData.substr(respPos);
          fileData = eval(respData);
        }
        else {
          respMsg = respData;
        }
      }
      if (window.FormData !== undefined)
      {
        $("#id_img_loader_foto3" + iSeqRow).hide();
      }
      else
      {
        $("#id_ajax_loader_foto3" + iSeqRow).hide();
      }
      if (null == fileData) {
        if ("" != respMsg) {
          oTemp = {"htmOutput" : "<?php echo $this->Ini->Nm_lang['lang_errm_upld_admn']; ?>"};
          scAjaxShowDebug(oTemp);
        }
        return;
      }
      if (fileData[0].error && "" != fileData[0].error) {
        var uploadErrorMessage = "";
        oResp = {};
        if ("acceptFileTypes" == fileData[0].error) {
          uploadErrorMessage = "<?php echo $this->form_encode_input($this->Ini->Nm_lang['lang_errm_file_invl']) ?>";
        }
        else if ("maxFileSize" == fileData[0].error) {
          uploadErrorMessage = "<?php echo $this->form_encode_input($this->Ini->Nm_lang['lang_errm_file_size']) ?>";
        }
        else if ("minFileSize" == fileData[0].error) {
          uploadErrorMessage = "<?php echo $this->form_encode_input($this->Ini->Nm_lang['lang_errm_file_size']) ?>";
        }
        else if ("emptyFile" == fileData[0].error) {
          uploadErrorMessage = "<?php echo $this->form_encode_input($this->Ini->Nm_lang['lang_errm_file_empty']) ?>";
        }
        scAjaxShowErrorDisplay("table", uploadErrorMessage);
        return;
      }
      $("#id_sc_field_foto3" + iSeqRow).val("");
      $("#id_sc_field_foto3_ul_name" + iSeqRow).val(fileData[0].sc_ul_name);
      $("#id_sc_field_foto3_ul_type" + iSeqRow).val(fileData[0].type);
      var_ajax_img_foto3 = '<?php echo $this->Ini->path_imag_temp; ?>/' + fileData[0].sc_image_source;
      var_ajax_img_thumb = '<?php echo $this->Ini->path_imag_temp; ?>/' + fileData[0].sc_thumb_prot;
      thumbDisplay = ("" == var_ajax_img_foto3) ? "none" : "";
      $("#id_ajax_img_foto3" + iSeqRow).attr("src", var_ajax_img_thumb);
      $("#id_ajax_img_foto3" + iSeqRow).css("display", thumbDisplay);
      if (document.F1.temp_out1_foto3) {
        document.F1.temp_out_foto3.value = var_ajax_img_thumb;
        document.F1.temp_out1_foto3.value = var_ajax_img_foto3;
      }
      else if (document.F1.temp_out_foto3) {
        document.F1.temp_out_foto3.value = var_ajax_img_foto3;
      }
      checkDisplay = ("" == fileData[0].sc_random_prot.substr(12)) ? "none" : "";
      $("#chk_ajax_img_foto3" + iSeqRow).css("display", checkDisplay);
      $("#txt_ajax_img_foto3" + iSeqRow).html(fileData[0].name);
      $("#txt_ajax_img_foto3" + iSeqRow).css("display", checkDisplay);
      $("#id_ajax_link_foto3" + iSeqRow).html(fileData[0].sc_random_prot.substr(12));
    }
  });

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
                         $(t).html("<a href=\"javascript:nm_mostra_doc('0', '"+rs2+"', 'form_devices')\">"+$('#id_read_on_'+field+iSeqRow).text()+"</a>");
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
  scJQLinkReadonlyAdd(iLine);
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

