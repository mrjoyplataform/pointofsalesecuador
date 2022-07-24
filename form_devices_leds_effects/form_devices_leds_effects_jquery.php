
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
  scEventControl_data["cod_device_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["device_name_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["ledstripe1_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["ledstripe2_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["ledstripe3_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["ledstripe4_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["color_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["cod_device_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["cod_device_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["device_name_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["device_name_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["ledstripe1_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["ledstripe1_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["ledstripe2_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["ledstripe2_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["ledstripe3_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["ledstripe3_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["ledstripe4_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["ledstripe4_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["color_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["color_" + iSeqRow]["change"]) {
    return true;
  }
  return false;
} // scEventControl_active

function scEventControl_active_all() {
  for (var i = 1; i < iAjaxNewLine; i++) {
    if (scEventControl_active(i)) {
      return true;
    }
  }
  return false;
} // scEventControl_active

function scEventControl_onFocus(oField, iSeq) {
  var fieldId, fieldName;
  fieldId = $(oField).attr("id");
  fieldName = fieldId.substr(12);
  scEventControl_data[fieldName]["blur"] = true;
  if ("ledstripe1_" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
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
  $('#id_sc_field_cod_device_' + iSeqRow).bind('blur', function() { sc_form_devices_leds_effects_cod_device__onblur(this, iSeqRow) })
                                         .bind('change', function() { sc_form_devices_leds_effects_cod_device__onchange(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_devices_leds_effects_cod_device__onfocus(this, iSeqRow) });
  $('#id_sc_field_cod_activo_' + iSeqRow).bind('change', function() { sc_form_devices_leds_effects_cod_activo__onchange(this, iSeqRow) });
  $('#id_sc_field_cod_grupo_' + iSeqRow).bind('change', function() { sc_form_devices_leds_effects_cod_grupo__onchange(this, iSeqRow) });
  $('#id_sc_field_device_name_' + iSeqRow).bind('blur', function() { sc_form_devices_leds_effects_device_name__onblur(this, iSeqRow) })
                                          .bind('change', function() { sc_form_devices_leds_effects_device_name__onchange(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_devices_leds_effects_device_name__onfocus(this, iSeqRow) });
  $('#id_sc_field_activa_' + iSeqRow).bind('change', function() { sc_form_devices_leds_effects_activa__onchange(this, iSeqRow) });
  $('#id_sc_field_estado_' + iSeqRow).bind('change', function() { sc_form_devices_leds_effects_estado__onchange(this, iSeqRow) });
  $('#id_sc_field_ult_rfid_' + iSeqRow).bind('change', function() { sc_form_devices_leds_effects_ult_rfid__onchange(this, iSeqRow) });
  $('#id_sc_field_ult_fecha_' + iSeqRow).bind('change', function() { sc_form_devices_leds_effects_ult_fecha__onchange(this, iSeqRow) });
  $('#id_sc_field_ult_fecha__hora' + iSeqRow).bind('change', function() { sc_form_devices_leds_effects_ult_fecha__hora_onchange(this, iSeqRow) });
  $('#id_sc_field_valor_default_' + iSeqRow).bind('change', function() { sc_form_devices_leds_effects_valor_default__onchange(this, iSeqRow) });
  $('#id_sc_field_acepta_tiempo_' + iSeqRow).bind('change', function() { sc_form_devices_leds_effects_acepta_tiempo__onchange(this, iSeqRow) });
  $('#id_sc_field_acepta_tokens_' + iSeqRow).bind('change', function() { sc_form_devices_leds_effects_acepta_tokens__onchange(this, iSeqRow) });
  $('#id_sc_field_dev_ip_' + iSeqRow).bind('change', function() { sc_form_devices_leds_effects_dev_ip__onchange(this, iSeqRow) });
  $('#id_sc_field_tipo_dev_' + iSeqRow).bind('change', function() { sc_form_devices_leds_effects_tipo_dev__onchange(this, iSeqRow) });
  $('#id_sc_field_direccion_torno_' + iSeqRow).bind('change', function() { sc_form_devices_leds_effects_direccion_torno__onchange(this, iSeqRow) });
  $('#id_sc_field_timeout_rfid_' + iSeqRow).bind('change', function() { sc_form_devices_leds_effects_timeout_rfid__onchange(this, iSeqRow) });
  $('#id_sc_field_discapacitado_' + iSeqRow).bind('change', function() { sc_form_devices_leds_effects_discapacitado__onchange(this, iSeqRow) });
  $('#id_sc_field_numcaja_' + iSeqRow).bind('change', function() { sc_form_devices_leds_effects_numcaja__onchange(this, iSeqRow) });
  $('#id_sc_field_empleado_' + iSeqRow).bind('change', function() { sc_form_devices_leds_effects_empleado__onchange(this, iSeqRow) });
  $('#id_sc_field_tokens_' + iSeqRow).bind('change', function() { sc_form_devices_leds_effects_tokens__onchange(this, iSeqRow) });
  $('#id_sc_field_serialrfid_' + iSeqRow).bind('change', function() { sc_form_devices_leds_effects_serialrfid__onchange(this, iSeqRow) });
  $('#id_sc_field_bidireccion_' + iSeqRow).bind('change', function() { sc_form_devices_leds_effects_bidireccion__onchange(this, iSeqRow) });
  $('#id_sc_field_cod_devicee_' + iSeqRow).bind('change', function() { sc_form_devices_leds_effects_cod_devicee__onchange(this, iSeqRow) });
  $('#id_sc_field_url_1_' + iSeqRow).bind('change', function() { sc_form_devices_leds_effects_url_1__onchange(this, iSeqRow) });
  $('#id_sc_field_url_2_' + iSeqRow).bind('change', function() { sc_form_devices_leds_effects_url_2__onchange(this, iSeqRow) });
  $('#id_sc_field_url_3_' + iSeqRow).bind('change', function() { sc_form_devices_leds_effects_url_3__onchange(this, iSeqRow) });
  $('#id_sc_field_foto1_' + iSeqRow).bind('change', function() { sc_form_devices_leds_effects_foto1__onchange(this, iSeqRow) });
  $('#id_sc_field_foto2_' + iSeqRow).bind('change', function() { sc_form_devices_leds_effects_foto2__onchange(this, iSeqRow) });
  $('#id_sc_field_foto3_' + iSeqRow).bind('change', function() { sc_form_devices_leds_effects_foto3__onchange(this, iSeqRow) });
  $('#id_sc_field_pin_relay1_' + iSeqRow).bind('change', function() { sc_form_devices_leds_effects_pin_relay1__onchange(this, iSeqRow) });
  $('#id_sc_field_pin_relay2_' + iSeqRow).bind('change', function() { sc_form_devices_leds_effects_pin_relay2__onchange(this, iSeqRow) });
  $('#id_sc_field_rfid_read_' + iSeqRow).bind('change', function() { sc_form_devices_leds_effects_rfid_read__onchange(this, iSeqRow) });
  $('#id_sc_field_rfid_estado_' + iSeqRow).bind('change', function() { sc_form_devices_leds_effects_rfid_estado__onchange(this, iSeqRow) });
  $('#id_sc_field_rfid_fecha_' + iSeqRow).bind('change', function() { sc_form_devices_leds_effects_rfid_fecha__onchange(this, iSeqRow) });
  $('#id_sc_field_rfid_fecha__hora' + iSeqRow).bind('change', function() { sc_form_devices_leds_effects_rfid_fecha__hora_onchange(this, iSeqRow) });
  $('#id_sc_field_url_accion_' + iSeqRow).bind('change', function() { sc_form_devices_leds_effects_url_accion__onchange(this, iSeqRow) });
  $('#id_sc_field_url_atraccion_' + iSeqRow).bind('change', function() { sc_form_devices_leds_effects_url_atraccion__onchange(this, iSeqRow) });
  $('#id_sc_field_uhfip_' + iSeqRow).bind('change', function() { sc_form_devices_leds_effects_uhfip__onchange(this, iSeqRow) });
  $('#id_sc_field_url_reader_' + iSeqRow).bind('change', function() { sc_form_devices_leds_effects_url_reader__onchange(this, iSeqRow) });
  $('#id_sc_field_cod_rfid900_' + iSeqRow).bind('change', function() { sc_form_devices_leds_effects_cod_rfid900__onchange(this, iSeqRow) });
  $('#id_sc_field_mensaje_' + iSeqRow).bind('change', function() { sc_form_devices_leds_effects_mensaje__onchange(this, iSeqRow) });
  $('#id_sc_field_tipolector_' + iSeqRow).bind('change', function() { sc_form_devices_leds_effects_tipolector__onchange(this, iSeqRow) });
  $('#id_sc_field_url_accion_bg_' + iSeqRow).bind('change', function() { sc_form_devices_leds_effects_url_accion_bg__onchange(this, iSeqRow) });
  $('#id_sc_field_url_inicio_' + iSeqRow).bind('change', function() { sc_form_devices_leds_effects_url_inicio__onchange(this, iSeqRow) });
  $('#id_sc_field_ledstripe1_' + iSeqRow).bind('blur', function() { sc_form_devices_leds_effects_ledstripe1__onblur(this, iSeqRow) })
                                         .bind('change', function() { sc_form_devices_leds_effects_ledstripe1__onchange(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_devices_leds_effects_ledstripe1__onfocus(this, iSeqRow) });
  $('#id_sc_field_ledstripe2_' + iSeqRow).bind('blur', function() { sc_form_devices_leds_effects_ledstripe2__onblur(this, iSeqRow) })
                                         .bind('change', function() { sc_form_devices_leds_effects_ledstripe2__onchange(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_devices_leds_effects_ledstripe2__onfocus(this, iSeqRow) });
  $('#id_sc_field_ledstripe3_' + iSeqRow).bind('blur', function() { sc_form_devices_leds_effects_ledstripe3__onblur(this, iSeqRow) })
                                         .bind('change', function() { sc_form_devices_leds_effects_ledstripe3__onchange(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_devices_leds_effects_ledstripe3__onfocus(this, iSeqRow) });
  $('#id_sc_field_ledstripe4_' + iSeqRow).bind('blur', function() { sc_form_devices_leds_effects_ledstripe4__onblur(this, iSeqRow) })
                                         .bind('change', function() { sc_form_devices_leds_effects_ledstripe4__onchange(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_devices_leds_effects_ledstripe4__onfocus(this, iSeqRow) });
  $('#id_sc_field_lasteffect_' + iSeqRow).bind('change', function() { sc_form_devices_leds_effects_lasteffect__onchange(this, iSeqRow) });
  $('#id_sc_field_color_' + iSeqRow).bind('blur', function() { sc_form_devices_leds_effects_color__onblur(this, iSeqRow) })
                                    .bind('change', function() { sc_form_devices_leds_effects_color__onchange(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_devices_leds_effects_color__onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_devices_leds_effects_cod_device__onblur(oThis, iSeqRow) {
  do_ajax_form_devices_leds_effects_validate_cod_device_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_devices_leds_effects_cod_device__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  nm_check_insert(iSeqRow);
}

function sc_form_devices_leds_effects_cod_device__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_devices_leds_effects_cod_activo__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_devices_leds_effects_cod_grupo__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_devices_leds_effects_device_name__onblur(oThis, iSeqRow) {
  do_ajax_form_devices_leds_effects_validate_device_name_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_devices_leds_effects_device_name__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  nm_check_insert(iSeqRow);
}

function sc_form_devices_leds_effects_device_name__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_devices_leds_effects_activa__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_devices_leds_effects_estado__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_devices_leds_effects_ult_rfid__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_devices_leds_effects_ult_fecha__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_devices_leds_effects_ult_fecha__hora_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_devices_leds_effects_valor_default__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_devices_leds_effects_acepta_tiempo__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_devices_leds_effects_acepta_tokens__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_devices_leds_effects_dev_ip__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_devices_leds_effects_tipo_dev__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_devices_leds_effects_direccion_torno__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_devices_leds_effects_timeout_rfid__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_devices_leds_effects_discapacitado__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_devices_leds_effects_numcaja__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_devices_leds_effects_empleado__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_devices_leds_effects_tokens__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_devices_leds_effects_serialrfid__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_devices_leds_effects_bidireccion__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_devices_leds_effects_cod_devicee__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_devices_leds_effects_url_1__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_devices_leds_effects_url_2__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_devices_leds_effects_url_3__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_devices_leds_effects_foto1__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_devices_leds_effects_foto2__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_devices_leds_effects_foto3__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_devices_leds_effects_pin_relay1__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_devices_leds_effects_pin_relay2__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_devices_leds_effects_rfid_read__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_devices_leds_effects_rfid_estado__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_devices_leds_effects_rfid_fecha__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_devices_leds_effects_rfid_fecha__hora_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_devices_leds_effects_url_accion__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_devices_leds_effects_url_atraccion__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_devices_leds_effects_uhfip__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_devices_leds_effects_url_reader__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_devices_leds_effects_cod_rfid900__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_devices_leds_effects_mensaje__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_devices_leds_effects_tipolector__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_devices_leds_effects_url_accion_bg__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_devices_leds_effects_url_inicio__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_devices_leds_effects_ledstripe1__onblur(oThis, iSeqRow) {
  do_ajax_form_devices_leds_effects_validate_ledstripe1_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_devices_leds_effects_ledstripe1__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  nm_check_insert(iSeqRow);
}

function sc_form_devices_leds_effects_ledstripe1__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_devices_leds_effects_ledstripe2__onblur(oThis, iSeqRow) {
  do_ajax_form_devices_leds_effects_validate_ledstripe2_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_devices_leds_effects_ledstripe2__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  nm_check_insert(iSeqRow);
}

function sc_form_devices_leds_effects_ledstripe2__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_devices_leds_effects_ledstripe3__onblur(oThis, iSeqRow) {
  do_ajax_form_devices_leds_effects_validate_ledstripe3_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_devices_leds_effects_ledstripe3__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  nm_check_insert(iSeqRow);
}

function sc_form_devices_leds_effects_ledstripe3__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_devices_leds_effects_ledstripe4__onblur(oThis, iSeqRow) {
  do_ajax_form_devices_leds_effects_validate_ledstripe4_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_devices_leds_effects_ledstripe4__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  nm_check_insert(iSeqRow);
}

function sc_form_devices_leds_effects_ledstripe4__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_devices_leds_effects_lasteffect__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_devices_leds_effects_color__onblur(oThis, iSeqRow) {
  do_ajax_form_devices_leds_effects_validate_color_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_devices_leds_effects_color__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  nm_check_insert(iSeqRow);
}

function sc_form_devices_leds_effects_color__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function displayChange_block(block, status) {
	if ("0" == block) {
		displayChange_block_0(status);
	}
}

function displayChange_block_0(status) {
	displayChange_field("cod_device_", "", status);
	displayChange_field("device_name_", "", status);
	displayChange_field("ledstripe1_", "", status);
	displayChange_field("ledstripe2_", "", status);
	displayChange_field("ledstripe3_", "", status);
	displayChange_field("ledstripe4_", "", status);
	displayChange_field("color_", "", status);
}

function displayChange_row(row, status) {
	displayChange_field_cod_device_(row, status);
	displayChange_field_device_name_(row, status);
	displayChange_field_ledstripe1_(row, status);
	displayChange_field_ledstripe2_(row, status);
	displayChange_field_ledstripe3_(row, status);
	displayChange_field_ledstripe4_(row, status);
	displayChange_field_color_(row, status);
}

function displayChange_field(field, row, status) {
	if ("cod_device_" == field) {
		displayChange_field_cod_device_(row, status);
	}
	if ("device_name_" == field) {
		displayChange_field_device_name_(row, status);
	}
	if ("ledstripe1_" == field) {
		displayChange_field_ledstripe1_(row, status);
	}
	if ("ledstripe2_" == field) {
		displayChange_field_ledstripe2_(row, status);
	}
	if ("ledstripe3_" == field) {
		displayChange_field_ledstripe3_(row, status);
	}
	if ("ledstripe4_" == field) {
		displayChange_field_ledstripe4_(row, status);
	}
	if ("color_" == field) {
		displayChange_field_color_(row, status);
	}
}

function displayChange_field_cod_device_(row, status) {
    var fieldId;
}

function displayChange_field_device_name_(row, status) {
    var fieldId;
}

function displayChange_field_ledstripe1_(row, status) {
    var fieldId;
}

function displayChange_field_ledstripe2_(row, status) {
    var fieldId;
}

function displayChange_field_ledstripe3_(row, status) {
    var fieldId;
}

function displayChange_field_ledstripe4_(row, status) {
    var fieldId;
}

function displayChange_field_color_(row, status) {
    var fieldId;
}

function scRecreateSelect2() {
}
function scResetPagesDisplay() {
	$(".sc-form-page").show();
}

function scHidePage(pageNo) {
	$("#id_form_devices_leds_effects_form" + pageNo).hide();
}

function scCheckNoPageSelected() {
	if (!$(".sc-form-page").filter(".scTabActive").filter(":visible").length) {
		var inactiveTabs = $(".sc-form-page").filter(".scTabInactive").filter(":visible");
		if (inactiveTabs.length) {
			var tabNo = $(inactiveTabs[0]).attr("id").substr(33);
		}
	}
}
<?php

$formWidthCorrection = '';
if (false !== strpos($this->Ini->form_table_width, 'calc')) {
	$formWidthCalc = substr($this->Ini->form_table_width, strpos($this->Ini->form_table_width, '(') + 1);
	$formWidthCalc = substr($formWidthCalc, 0, strpos($formWidthCalc, ')'));
	$formWidthParts = explode(' ', $formWidthCalc);
	if (3 == count($formWidthParts) && 'px' == substr($formWidthParts[2], -2)) {
		$formWidthParts[2] = substr($formWidthParts[2], 0, -2) / 2;
		$formWidthCorrection = $formWidthParts[1] . ' ' . $formWidthParts[2];
	}
}

?>

function scSetFixedHeadersCss(baseTop)
{
    let rows, cols, i, j, thisTop;

    rows = $(".sc-ui-header-row");
    thisTop = baseTop;

    for (i = 0; i < rows.length; i++) {
        cols = $(rows[i]).find("td").filter(".sc-col-title");
        for (j = 0; j < cols.length; j++) {
            $(cols[j]).css({
                "position": "sticky",
                "top": thisTop + "px",
                "z-index": 4
            }).addClass("sc-header-fixed");
        }
        thisTop += $(rows[i]).height();
    }

    rows = $(".sc-ui-header-row");

    rows.filter(".sc-col-is-fixed").css("z-index", 5);
    rows.filter(".sc-col-is-fixed").filter(".sc-col-actions").css("z-index", 6);
}

$(function() {
    scSetFixedHeadersCss(0);
});

$(window).scroll(function() {
	scSetFixedHeaders();
});

var rerunHeaderDisplay = 1;

function scSetFixedHeaders(forceDisplay) {
    return;
	if (null == forceDisplay) {
		forceDisplay = false;
	}
	var divScroll, formHeaders, headerPlaceholder;
	formHeaders = scGetHeaderRow();
	headerPlaceholder = $("#sc-id-fixedheaders-placeholder");
	if (!formHeaders) {
		headerPlaceholder.hide();
	}
	else {
		if (scIsHeaderVisible(formHeaders)) {
			headerPlaceholder.hide();
		}
		else {
			if (!headerPlaceholder.filter(":visible").length || forceDisplay) {
				scSetFixedHeadersContents(formHeaders, headerPlaceholder);
				scSetFixedHeadersSize(formHeaders);
				headerPlaceholder.show();
			}
			scSetFixedHeadersPosition(formHeaders, headerPlaceholder);
			if (0 < rerunHeaderDisplay) {
				rerunHeaderDisplay--;
				setTimeout(function() {
					scSetFixedHeadersContents(formHeaders, headerPlaceholder);
					scSetFixedHeadersSize(formHeaders);
					headerPlaceholder.show();
					scSetFixedHeadersPosition(formHeaders, headerPlaceholder);
				}, 5);
			}
		}
	}
}

function scSetFixedHeadersPosition(formHeaders, headerPlaceholder) {
	if (formHeaders) {
		headerPlaceholder.css({"top": 0<?php echo $formWidthCorrection ?>, "left": (Math.floor(formHeaders.offset().left) - $(document).scrollLeft()<?php echo $formWidthCorrection ?>) + "px"});
	}
}

function scIsHeaderVisible(formHeaders) {
	if (typeof(scIsHeaderVisibleMobile) === typeof(function(){})) { return scIsHeaderVisibleMobile(formHeaders); }
	return formHeaders.offset().top > $(document).scrollTop();
}

function scGetHeaderRow() {
	var formHeaders = $(".sc-ui-header-row").filter(":visible");
	if (!formHeaders.length) {
		formHeaders = false;
	}
	return formHeaders;
}

function scSetFixedHeadersContents(formHeaders, headerPlaceholder) {
	var i, htmlContent;
	htmlContent = "<table id=\"sc-id-fixed-headers\" class=\"scFormTable\">";
	for (i = 0; i < formHeaders.length; i++) {
		htmlContent += "<tr class=\"scFormLabelOddMult\" id=\"sc-id-headers-row-" + i + "\">" + $(formHeaders[i]).html() + "</tr>";
	}
	htmlContent += "</table>";
	headerPlaceholder.html(htmlContent);
}

function scSetFixedHeadersSize(formHeaders) {
	var i, j, headerColumns, formColumns, cellHeight, cellWidth, tableOriginal, tableHeaders;
	tableOriginal = $("#hidden_bloco_0");
	tableHeaders = document.getElementById("sc-id-fixed-headers");
	$(tableHeaders).css("width", $(tableOriginal).outerWidth());
	for (i = 0; i < formHeaders.length; i++) {
		headerColumns = $("#sc-id-fixed-headers-row-" + i).find("td");
		formColumns = $(formHeaders[i]).find("td");
		for (j = 0; j < formColumns.length; j++) {
			if (window.getComputedStyle(formColumns[j])) {
				cellWidth = window.getComputedStyle(formColumns[j]).width;
				cellHeight = window.getComputedStyle(formColumns[j]).height;
			}
			else {
				cellWidth = $(formColumns[j]).width() + "px";
				cellHeight = $(formColumns[j]).height() + "px";
			}
			$(headerColumns[j]).css({
				"width": cellWidth,
				"height": cellHeight
			});
		}
	}
}
var sc_jq_calendar_value = {};

function scJQCalendarAdd(iSeqRow) {
  $("#id_sc_field_ult_fecha_" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_ult_fecha_" + iSeqRow] = $oField.val();
      if (2 == aParts.length) {
        sTime = " " + aParts[1];
      }
      if ('' == sTime || ' ' == sTime) {
        sTime = ' <?php echo $this->jqueryCalendarTimeStart($this->field_config['ult_fecha_']['date_format']); ?>';
      }
      $oField.datepicker("option", "dateFormat", "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', 'hh', 'ii', 'ss', ':', ';', $_SESSION['scriptcase']['reg_conf']['date_sep'], $_SESSION['scriptcase']['reg_conf']['time_sep']), array('', 'yyyy', '','','', '', '', '', ''), $this->field_config['ult_fecha_']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>" + sTime);
    },
    onClose: function(dateText, inst) {
      do_ajax_form_devices_leds_effects_validate_ult_fecha_(iSeqRow);
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
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', 'hh', 'ii', 'ss', ':', ';', $_SESSION['scriptcase']['reg_conf']['date_sep'], $_SESSION['scriptcase']['reg_conf']['time_sep']), array('', 'yyyy', '','','', '', '', '', ''), $this->field_config['ult_fecha_']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
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
  $("#id_sc_field_rfid_fecha_" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_rfid_fecha_" + iSeqRow] = $oField.val();
      if (2 == aParts.length) {
        sTime = " " + aParts[1];
      }
      if ('' == sTime || ' ' == sTime) {
        sTime = ' <?php echo $this->jqueryCalendarTimeStart($this->field_config['rfid_fecha_']['date_format']); ?>';
      }
      $oField.datepicker("option", "dateFormat", "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', 'hh', 'ii', 'ss', ':', ';', $_SESSION['scriptcase']['reg_conf']['date_sep'], $_SESSION['scriptcase']['reg_conf']['time_sep']), array('', 'yyyy', '','','', '', '', '', ''), $this->field_config['rfid_fecha_']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>" + sTime);
    },
    onClose: function(dateText, inst) {
      do_ajax_form_devices_leds_effects_validate_rfid_fecha_(iSeqRow);
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
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', 'hh', 'ii', 'ss', ':', ';', $_SESSION['scriptcase']['reg_conf']['date_sep'], $_SESSION['scriptcase']['reg_conf']['time_sep']), array('', 'yyyy', '','','', '', '', '', ''), $this->field_config['rfid_fecha_']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
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
  $("#id_sc_field_foto1_" + iSeqRow).fileupload({
    datatype: "json",
    url: "form_devices_leds_effects_ul_save.php",
    dropZone: $("#hidden_field_data_foto1_" + iSeqRow),
    formData: function() {
      return [
        {name: 'param_field', value: 'foto1_'},
        {name: 'param_seq', value: '<?php echo $this->Ini->sc_page; ?>'},
        {name: 'upload_file_row', value: iSeqRow}
      ];
    },
    progress: function(e, data) {
      var loader, progress;
      if (data.lengthComputable && window.FormData !== undefined) {
        loader = $("#id_img_loader_foto1_" + iSeqRow);
        loaderContent = $("#id_img_loader_foto1_" + iSeqRow + " .scProgressBarLoading");
        loaderContent.html("&nbsp;");
        progress = parseInt(data.loaded / data.total * 100, 10);
        loader.show().find("div").css("width", progress + "%");
      }
      else {
        loader = $("#id_ajax_loader_foto1_" + iSeqRow);
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
        $("#id_img_loader_foto1_" + iSeqRow).hide();
      }
      else
      {
        $("#id_ajax_loader_foto1_" + iSeqRow).hide();
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
      $("#id_sc_field_foto1_" + iSeqRow).val("");
      $("#id_sc_field_foto1__ul_name" + iSeqRow).val(fileData[0].sc_ul_name);
      $("#id_sc_field_foto1__ul_type" + iSeqRow).val(fileData[0].type);
      eval("var_ajax_img_foto1_" + iSeqRow + " = '<?php echo $this->Ini->path_imag_temp; ?>/' + fileData[0].sc_image_source");
      var_ajax_img_foto1_ = '<?php echo $this->Ini->path_imag_temp; ?>/' + fileData[0].sc_image_source;
      var_ajax_img_thumb = '<?php echo $this->Ini->path_imag_temp; ?>/' + fileData[0].sc_thumb_prot;
      thumbDisplay = ("" == var_ajax_img_foto1_) ? "none" : "";
      $("#id_ajax_img_foto1_" + iSeqRow).attr("src", var_ajax_img_thumb);
      $("#id_ajax_img_foto1_" + iSeqRow).css("display", thumbDisplay);
      if (document.F1.temp_out1_foto1_) {
        document.F1.temp_out_foto1_.value = var_ajax_img_thumb;
        document.F1.temp_out1_foto1_.value = var_ajax_img_foto1_;
      }
      else if (document.F1.temp_out_foto1_) {
        document.F1.temp_out_foto1_.value = var_ajax_img_foto1_;
      }
      checkDisplay = ("" == fileData[0].sc_random_prot.substr(12)) ? "none" : "";
      $("#chk_ajax_img_foto1_" + iSeqRow).css("display", checkDisplay);
      $("#txt_ajax_img_foto1_" + iSeqRow).html(fileData[0].name);
      $("#txt_ajax_img_foto1_" + iSeqRow).css("display", checkDisplay);
      $("#id_ajax_link_foto1_" + iSeqRow).html(fileData[0].sc_random_prot.substr(12));
    }
  });

  $("#id_sc_field_foto2_" + iSeqRow).fileupload({
    datatype: "json",
    url: "form_devices_leds_effects_ul_save.php",
    dropZone: $("#hidden_field_data_foto2_" + iSeqRow),
    formData: function() {
      return [
        {name: 'param_field', value: 'foto2_'},
        {name: 'param_seq', value: '<?php echo $this->Ini->sc_page; ?>'},
        {name: 'upload_file_row', value: iSeqRow}
      ];
    },
    progress: function(e, data) {
      var loader, progress;
      if (data.lengthComputable && window.FormData !== undefined) {
        loader = $("#id_img_loader_foto2_" + iSeqRow);
        loaderContent = $("#id_img_loader_foto2_" + iSeqRow + " .scProgressBarLoading");
        loaderContent.html("&nbsp;");
        progress = parseInt(data.loaded / data.total * 100, 10);
        loader.show().find("div").css("width", progress + "%");
      }
      else {
        loader = $("#id_ajax_loader_foto2_" + iSeqRow);
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
        $("#id_img_loader_foto2_" + iSeqRow).hide();
      }
      else
      {
        $("#id_ajax_loader_foto2_" + iSeqRow).hide();
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
      $("#id_sc_field_foto2_" + iSeqRow).val("");
      $("#id_sc_field_foto2__ul_name" + iSeqRow).val(fileData[0].sc_ul_name);
      $("#id_sc_field_foto2__ul_type" + iSeqRow).val(fileData[0].type);
      eval("var_ajax_img_foto2_" + iSeqRow + " = '<?php echo $this->Ini->path_imag_temp; ?>/' + fileData[0].sc_image_source");
      var_ajax_img_foto2_ = '<?php echo $this->Ini->path_imag_temp; ?>/' + fileData[0].sc_image_source;
      var_ajax_img_thumb = '<?php echo $this->Ini->path_imag_temp; ?>/' + fileData[0].sc_thumb_prot;
      thumbDisplay = ("" == var_ajax_img_foto2_) ? "none" : "";
      $("#id_ajax_img_foto2_" + iSeqRow).attr("src", var_ajax_img_thumb);
      $("#id_ajax_img_foto2_" + iSeqRow).css("display", thumbDisplay);
      if (document.F1.temp_out1_foto2_) {
        document.F1.temp_out_foto2_.value = var_ajax_img_thumb;
        document.F1.temp_out1_foto2_.value = var_ajax_img_foto2_;
      }
      else if (document.F1.temp_out_foto2_) {
        document.F1.temp_out_foto2_.value = var_ajax_img_foto2_;
      }
      checkDisplay = ("" == fileData[0].sc_random_prot.substr(12)) ? "none" : "";
      $("#chk_ajax_img_foto2_" + iSeqRow).css("display", checkDisplay);
      $("#txt_ajax_img_foto2_" + iSeqRow).html(fileData[0].name);
      $("#txt_ajax_img_foto2_" + iSeqRow).css("display", checkDisplay);
      $("#id_ajax_link_foto2_" + iSeqRow).html(fileData[0].sc_random_prot.substr(12));
    }
  });

  $("#id_sc_field_foto3_" + iSeqRow).fileupload({
    datatype: "json",
    url: "form_devices_leds_effects_ul_save.php",
    dropZone: $("#hidden_field_data_foto3_" + iSeqRow),
    formData: function() {
      return [
        {name: 'param_field', value: 'foto3_'},
        {name: 'param_seq', value: '<?php echo $this->Ini->sc_page; ?>'},
        {name: 'upload_file_row', value: iSeqRow}
      ];
    },
    progress: function(e, data) {
      var loader, progress;
      if (data.lengthComputable && window.FormData !== undefined) {
        loader = $("#id_img_loader_foto3_" + iSeqRow);
        loaderContent = $("#id_img_loader_foto3_" + iSeqRow + " .scProgressBarLoading");
        loaderContent.html("&nbsp;");
        progress = parseInt(data.loaded / data.total * 100, 10);
        loader.show().find("div").css("width", progress + "%");
      }
      else {
        loader = $("#id_ajax_loader_foto3_" + iSeqRow);
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
        $("#id_img_loader_foto3_" + iSeqRow).hide();
      }
      else
      {
        $("#id_ajax_loader_foto3_" + iSeqRow).hide();
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
      $("#id_sc_field_foto3_" + iSeqRow).val("");
      $("#id_sc_field_foto3__ul_name" + iSeqRow).val(fileData[0].sc_ul_name);
      $("#id_sc_field_foto3__ul_type" + iSeqRow).val(fileData[0].type);
      eval("var_ajax_img_foto3_" + iSeqRow + " = '<?php echo $this->Ini->path_imag_temp; ?>/' + fileData[0].sc_image_source");
      var_ajax_img_foto3_ = '<?php echo $this->Ini->path_imag_temp; ?>/' + fileData[0].sc_image_source;
      var_ajax_img_thumb = '<?php echo $this->Ini->path_imag_temp; ?>/' + fileData[0].sc_thumb_prot;
      thumbDisplay = ("" == var_ajax_img_foto3_) ? "none" : "";
      $("#id_ajax_img_foto3_" + iSeqRow).attr("src", var_ajax_img_thumb);
      $("#id_ajax_img_foto3_" + iSeqRow).css("display", thumbDisplay);
      if (document.F1.temp_out1_foto3_) {
        document.F1.temp_out_foto3_.value = var_ajax_img_thumb;
        document.F1.temp_out1_foto3_.value = var_ajax_img_foto3_;
      }
      else if (document.F1.temp_out_foto3_) {
        document.F1.temp_out_foto3_.value = var_ajax_img_foto3_;
      }
      checkDisplay = ("" == fileData[0].sc_random_prot.substr(12)) ? "none" : "";
      $("#chk_ajax_img_foto3_" + iSeqRow).css("display", checkDisplay);
      $("#txt_ajax_img_foto3_" + iSeqRow).html(fileData[0].name);
      $("#txt_ajax_img_foto3_" + iSeqRow).css("display", checkDisplay);
      $("#id_ajax_link_foto3_" + iSeqRow).html(fileData[0].sc_random_prot.substr(12));
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
                         $(t).html("<a href=\"javascript:nm_mostra_doc('0', '"+rs2+"', 'form_devices_leds_effects')\">"+$('#id_read_on_'+field+iSeqRow).text()+"</a>");
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

