
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
  scEventControl_data["cod_activo" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["cod_grupo" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["device_name" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["activa" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["estado" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["ult_rfid" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["ult_fecha" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["valor_default" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["acepta_tiempo" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["acepta_tokens" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["dev_ip" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["tipo_dev" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["direccion_torno" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["timeout_rfid" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["discapacitado" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["numcaja" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["empleado" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["tokens" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["serialrfid" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["bidireccion" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["cod_devicee" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["url_1" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["url_2" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["url_3" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["foto1" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["foto2" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["foto3" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["pin_relay1" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["pin_relay2" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["rfid_read" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["rfid_estado" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["rfid_fecha" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["url_accion" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["url_atraccion" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["uhfip" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["url_reader" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["cod_rfid900" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["mensaje" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["tipolector" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["url_accion_bg" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["url_inicio" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["ledstripe1" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["ledstripe2" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["ledstripe3" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["ledstripe4" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["lasteffect" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["color" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["sound" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["points" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["speak" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["typereader" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["cod_device" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["cod_device" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["cod_activo" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["cod_activo" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["cod_grupo" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["cod_grupo" + iSeqRow]["change"]) {
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
  if (scEventControl_data["estado" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["estado" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["ult_rfid" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["ult_rfid" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["ult_fecha" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["ult_fecha" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["valor_default" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["valor_default" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["acepta_tiempo" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["acepta_tiempo" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["acepta_tokens" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["acepta_tokens" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["dev_ip" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["dev_ip" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["tipo_dev" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["tipo_dev" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["direccion_torno" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["direccion_torno" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["timeout_rfid" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["timeout_rfid" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["discapacitado" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["discapacitado" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["numcaja" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["numcaja" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["empleado" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["empleado" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["tokens" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["tokens" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["serialrfid" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["serialrfid" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["bidireccion" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["bidireccion" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["cod_devicee" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["cod_devicee" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["url_1" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["url_1" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["url_2" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["url_2" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["url_3" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["url_3" + iSeqRow]["change"]) {
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
  if (scEventControl_data["rfid_read" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["rfid_read" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["rfid_estado" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["rfid_estado" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["rfid_fecha" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["rfid_fecha" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["url_accion" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["url_accion" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["url_atraccion" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["url_atraccion" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["uhfip" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["uhfip" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["url_reader" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["url_reader" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["cod_rfid900" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["cod_rfid900" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["mensaje" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["mensaje" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["tipolector" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["tipolector" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["url_accion_bg" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["url_accion_bg" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["url_inicio" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["url_inicio" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["ledstripe1" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["ledstripe1" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["ledstripe2" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["ledstripe2" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["ledstripe3" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["ledstripe3" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["ledstripe4" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["ledstripe4" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["lasteffect" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["lasteffect" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["color" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["color" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["sound" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["sound" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["points" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["points" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["speak" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["speak" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["typereader" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["typereader" + iSeqRow]["change"]) {
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
  $('#id_sc_field_cod_device' + iSeqRow).bind('blur', function() { sc_form_devices_arcade_cod_device_onblur(this, iSeqRow) })
                                        .bind('change', function() { sc_form_devices_arcade_cod_device_onchange(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_devices_arcade_cod_device_onfocus(this, iSeqRow) });
  $('#id_sc_field_cod_activo' + iSeqRow).bind('blur', function() { sc_form_devices_arcade_cod_activo_onblur(this, iSeqRow) })
                                        .bind('change', function() { sc_form_devices_arcade_cod_activo_onchange(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_devices_arcade_cod_activo_onfocus(this, iSeqRow) });
  $('#id_sc_field_cod_grupo' + iSeqRow).bind('blur', function() { sc_form_devices_arcade_cod_grupo_onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_form_devices_arcade_cod_grupo_onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_devices_arcade_cod_grupo_onfocus(this, iSeqRow) });
  $('#id_sc_field_device_name' + iSeqRow).bind('blur', function() { sc_form_devices_arcade_device_name_onblur(this, iSeqRow) })
                                         .bind('change', function() { sc_form_devices_arcade_device_name_onchange(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_devices_arcade_device_name_onfocus(this, iSeqRow) });
  $('#id_sc_field_activa' + iSeqRow).bind('blur', function() { sc_form_devices_arcade_activa_onblur(this, iSeqRow) })
                                    .bind('change', function() { sc_form_devices_arcade_activa_onchange(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_devices_arcade_activa_onfocus(this, iSeqRow) });
  $('#id_sc_field_estado' + iSeqRow).bind('blur', function() { sc_form_devices_arcade_estado_onblur(this, iSeqRow) })
                                    .bind('change', function() { sc_form_devices_arcade_estado_onchange(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_devices_arcade_estado_onfocus(this, iSeqRow) });
  $('#id_sc_field_ult_rfid' + iSeqRow).bind('blur', function() { sc_form_devices_arcade_ult_rfid_onblur(this, iSeqRow) })
                                      .bind('change', function() { sc_form_devices_arcade_ult_rfid_onchange(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_devices_arcade_ult_rfid_onfocus(this, iSeqRow) });
  $('#id_sc_field_ult_fecha' + iSeqRow).bind('blur', function() { sc_form_devices_arcade_ult_fecha_onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_form_devices_arcade_ult_fecha_onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_devices_arcade_ult_fecha_onfocus(this, iSeqRow) });
  $('#id_sc_field_ult_fecha_hora' + iSeqRow).bind('blur', function() { sc_form_devices_arcade_ult_fecha_hora_onblur(this, iSeqRow) })
                                            .bind('change', function() { sc_form_devices_arcade_ult_fecha_hora_onchange(this, iSeqRow) })
                                            .bind('focus', function() { sc_form_devices_arcade_ult_fecha_hora_onfocus(this, iSeqRow) });
  $('#id_sc_field_valor_default' + iSeqRow).bind('blur', function() { sc_form_devices_arcade_valor_default_onblur(this, iSeqRow) })
                                           .bind('change', function() { sc_form_devices_arcade_valor_default_onchange(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_devices_arcade_valor_default_onfocus(this, iSeqRow) });
  $('#id_sc_field_acepta_tiempo' + iSeqRow).bind('blur', function() { sc_form_devices_arcade_acepta_tiempo_onblur(this, iSeqRow) })
                                           .bind('change', function() { sc_form_devices_arcade_acepta_tiempo_onchange(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_devices_arcade_acepta_tiempo_onfocus(this, iSeqRow) });
  $('#id_sc_field_acepta_tokens' + iSeqRow).bind('blur', function() { sc_form_devices_arcade_acepta_tokens_onblur(this, iSeqRow) })
                                           .bind('change', function() { sc_form_devices_arcade_acepta_tokens_onchange(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_devices_arcade_acepta_tokens_onfocus(this, iSeqRow) });
  $('#id_sc_field_dev_ip' + iSeqRow).bind('blur', function() { sc_form_devices_arcade_dev_ip_onblur(this, iSeqRow) })
                                    .bind('change', function() { sc_form_devices_arcade_dev_ip_onchange(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_devices_arcade_dev_ip_onfocus(this, iSeqRow) });
  $('#id_sc_field_tipo_dev' + iSeqRow).bind('blur', function() { sc_form_devices_arcade_tipo_dev_onblur(this, iSeqRow) })
                                      .bind('change', function() { sc_form_devices_arcade_tipo_dev_onchange(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_devices_arcade_tipo_dev_onfocus(this, iSeqRow) });
  $('#id_sc_field_direccion_torno' + iSeqRow).bind('blur', function() { sc_form_devices_arcade_direccion_torno_onblur(this, iSeqRow) })
                                             .bind('change', function() { sc_form_devices_arcade_direccion_torno_onchange(this, iSeqRow) })
                                             .bind('focus', function() { sc_form_devices_arcade_direccion_torno_onfocus(this, iSeqRow) });
  $('#id_sc_field_timeout_rfid' + iSeqRow).bind('blur', function() { sc_form_devices_arcade_timeout_rfid_onblur(this, iSeqRow) })
                                          .bind('change', function() { sc_form_devices_arcade_timeout_rfid_onchange(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_devices_arcade_timeout_rfid_onfocus(this, iSeqRow) });
  $('#id_sc_field_discapacitado' + iSeqRow).bind('blur', function() { sc_form_devices_arcade_discapacitado_onblur(this, iSeqRow) })
                                           .bind('change', function() { sc_form_devices_arcade_discapacitado_onchange(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_devices_arcade_discapacitado_onfocus(this, iSeqRow) });
  $('#id_sc_field_numcaja' + iSeqRow).bind('blur', function() { sc_form_devices_arcade_numcaja_onblur(this, iSeqRow) })
                                     .bind('change', function() { sc_form_devices_arcade_numcaja_onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_devices_arcade_numcaja_onfocus(this, iSeqRow) });
  $('#id_sc_field_empleado' + iSeqRow).bind('blur', function() { sc_form_devices_arcade_empleado_onblur(this, iSeqRow) })
                                      .bind('change', function() { sc_form_devices_arcade_empleado_onchange(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_devices_arcade_empleado_onfocus(this, iSeqRow) });
  $('#id_sc_field_tokens' + iSeqRow).bind('blur', function() { sc_form_devices_arcade_tokens_onblur(this, iSeqRow) })
                                    .bind('change', function() { sc_form_devices_arcade_tokens_onchange(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_devices_arcade_tokens_onfocus(this, iSeqRow) });
  $('#id_sc_field_serialrfid' + iSeqRow).bind('blur', function() { sc_form_devices_arcade_serialrfid_onblur(this, iSeqRow) })
                                        .bind('change', function() { sc_form_devices_arcade_serialrfid_onchange(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_devices_arcade_serialrfid_onfocus(this, iSeqRow) });
  $('#id_sc_field_bidireccion' + iSeqRow).bind('blur', function() { sc_form_devices_arcade_bidireccion_onblur(this, iSeqRow) })
                                         .bind('change', function() { sc_form_devices_arcade_bidireccion_onchange(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_devices_arcade_bidireccion_onfocus(this, iSeqRow) });
  $('#id_sc_field_cod_devicee' + iSeqRow).bind('blur', function() { sc_form_devices_arcade_cod_devicee_onblur(this, iSeqRow) })
                                         .bind('change', function() { sc_form_devices_arcade_cod_devicee_onchange(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_devices_arcade_cod_devicee_onfocus(this, iSeqRow) });
  $('#id_sc_field_url_1' + iSeqRow).bind('blur', function() { sc_form_devices_arcade_url_1_onblur(this, iSeqRow) })
                                   .bind('change', function() { sc_form_devices_arcade_url_1_onchange(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_devices_arcade_url_1_onfocus(this, iSeqRow) });
  $('#id_sc_field_url_2' + iSeqRow).bind('blur', function() { sc_form_devices_arcade_url_2_onblur(this, iSeqRow) })
                                   .bind('change', function() { sc_form_devices_arcade_url_2_onchange(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_devices_arcade_url_2_onfocus(this, iSeqRow) });
  $('#id_sc_field_url_3' + iSeqRow).bind('blur', function() { sc_form_devices_arcade_url_3_onblur(this, iSeqRow) })
                                   .bind('change', function() { sc_form_devices_arcade_url_3_onchange(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_devices_arcade_url_3_onfocus(this, iSeqRow) });
  $('#id_sc_field_foto1' + iSeqRow).bind('blur', function() { sc_form_devices_arcade_foto1_onblur(this, iSeqRow) })
                                   .bind('change', function() { sc_form_devices_arcade_foto1_onchange(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_devices_arcade_foto1_onfocus(this, iSeqRow) });
  $('#id_sc_field_foto2' + iSeqRow).bind('blur', function() { sc_form_devices_arcade_foto2_onblur(this, iSeqRow) })
                                   .bind('change', function() { sc_form_devices_arcade_foto2_onchange(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_devices_arcade_foto2_onfocus(this, iSeqRow) });
  $('#id_sc_field_foto3' + iSeqRow).bind('blur', function() { sc_form_devices_arcade_foto3_onblur(this, iSeqRow) })
                                   .bind('change', function() { sc_form_devices_arcade_foto3_onchange(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_devices_arcade_foto3_onfocus(this, iSeqRow) });
  $('#id_sc_field_pin_relay1' + iSeqRow).bind('blur', function() { sc_form_devices_arcade_pin_relay1_onblur(this, iSeqRow) })
                                        .bind('change', function() { sc_form_devices_arcade_pin_relay1_onchange(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_devices_arcade_pin_relay1_onfocus(this, iSeqRow) });
  $('#id_sc_field_pin_relay2' + iSeqRow).bind('blur', function() { sc_form_devices_arcade_pin_relay2_onblur(this, iSeqRow) })
                                        .bind('change', function() { sc_form_devices_arcade_pin_relay2_onchange(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_devices_arcade_pin_relay2_onfocus(this, iSeqRow) });
  $('#id_sc_field_rfid_read' + iSeqRow).bind('blur', function() { sc_form_devices_arcade_rfid_read_onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_form_devices_arcade_rfid_read_onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_devices_arcade_rfid_read_onfocus(this, iSeqRow) });
  $('#id_sc_field_rfid_estado' + iSeqRow).bind('blur', function() { sc_form_devices_arcade_rfid_estado_onblur(this, iSeqRow) })
                                         .bind('change', function() { sc_form_devices_arcade_rfid_estado_onchange(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_devices_arcade_rfid_estado_onfocus(this, iSeqRow) });
  $('#id_sc_field_rfid_fecha' + iSeqRow).bind('blur', function() { sc_form_devices_arcade_rfid_fecha_onblur(this, iSeqRow) })
                                        .bind('change', function() { sc_form_devices_arcade_rfid_fecha_onchange(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_devices_arcade_rfid_fecha_onfocus(this, iSeqRow) });
  $('#id_sc_field_rfid_fecha_hora' + iSeqRow).bind('blur', function() { sc_form_devices_arcade_rfid_fecha_hora_onblur(this, iSeqRow) })
                                             .bind('change', function() { sc_form_devices_arcade_rfid_fecha_hora_onchange(this, iSeqRow) })
                                             .bind('focus', function() { sc_form_devices_arcade_rfid_fecha_hora_onfocus(this, iSeqRow) });
  $('#id_sc_field_url_accion' + iSeqRow).bind('blur', function() { sc_form_devices_arcade_url_accion_onblur(this, iSeqRow) })
                                        .bind('change', function() { sc_form_devices_arcade_url_accion_onchange(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_devices_arcade_url_accion_onfocus(this, iSeqRow) });
  $('#id_sc_field_url_atraccion' + iSeqRow).bind('blur', function() { sc_form_devices_arcade_url_atraccion_onblur(this, iSeqRow) })
                                           .bind('change', function() { sc_form_devices_arcade_url_atraccion_onchange(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_devices_arcade_url_atraccion_onfocus(this, iSeqRow) });
  $('#id_sc_field_uhfip' + iSeqRow).bind('blur', function() { sc_form_devices_arcade_uhfip_onblur(this, iSeqRow) })
                                   .bind('change', function() { sc_form_devices_arcade_uhfip_onchange(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_devices_arcade_uhfip_onfocus(this, iSeqRow) });
  $('#id_sc_field_url_reader' + iSeqRow).bind('blur', function() { sc_form_devices_arcade_url_reader_onblur(this, iSeqRow) })
                                        .bind('change', function() { sc_form_devices_arcade_url_reader_onchange(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_devices_arcade_url_reader_onfocus(this, iSeqRow) });
  $('#id_sc_field_cod_rfid900' + iSeqRow).bind('blur', function() { sc_form_devices_arcade_cod_rfid900_onblur(this, iSeqRow) })
                                         .bind('change', function() { sc_form_devices_arcade_cod_rfid900_onchange(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_devices_arcade_cod_rfid900_onfocus(this, iSeqRow) });
  $('#id_sc_field_mensaje' + iSeqRow).bind('blur', function() { sc_form_devices_arcade_mensaje_onblur(this, iSeqRow) })
                                     .bind('change', function() { sc_form_devices_arcade_mensaje_onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_devices_arcade_mensaje_onfocus(this, iSeqRow) });
  $('#id_sc_field_tipolector' + iSeqRow).bind('blur', function() { sc_form_devices_arcade_tipolector_onblur(this, iSeqRow) })
                                        .bind('change', function() { sc_form_devices_arcade_tipolector_onchange(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_devices_arcade_tipolector_onfocus(this, iSeqRow) });
  $('#id_sc_field_url_accion_bg' + iSeqRow).bind('blur', function() { sc_form_devices_arcade_url_accion_bg_onblur(this, iSeqRow) })
                                           .bind('change', function() { sc_form_devices_arcade_url_accion_bg_onchange(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_devices_arcade_url_accion_bg_onfocus(this, iSeqRow) });
  $('#id_sc_field_url_inicio' + iSeqRow).bind('blur', function() { sc_form_devices_arcade_url_inicio_onblur(this, iSeqRow) })
                                        .bind('change', function() { sc_form_devices_arcade_url_inicio_onchange(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_devices_arcade_url_inicio_onfocus(this, iSeqRow) });
  $('#id_sc_field_ledstripe1' + iSeqRow).bind('blur', function() { sc_form_devices_arcade_ledstripe1_onblur(this, iSeqRow) })
                                        .bind('change', function() { sc_form_devices_arcade_ledstripe1_onchange(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_devices_arcade_ledstripe1_onfocus(this, iSeqRow) });
  $('#id_sc_field_ledstripe2' + iSeqRow).bind('blur', function() { sc_form_devices_arcade_ledstripe2_onblur(this, iSeqRow) })
                                        .bind('change', function() { sc_form_devices_arcade_ledstripe2_onchange(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_devices_arcade_ledstripe2_onfocus(this, iSeqRow) });
  $('#id_sc_field_ledstripe3' + iSeqRow).bind('blur', function() { sc_form_devices_arcade_ledstripe3_onblur(this, iSeqRow) })
                                        .bind('change', function() { sc_form_devices_arcade_ledstripe3_onchange(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_devices_arcade_ledstripe3_onfocus(this, iSeqRow) });
  $('#id_sc_field_ledstripe4' + iSeqRow).bind('blur', function() { sc_form_devices_arcade_ledstripe4_onblur(this, iSeqRow) })
                                        .bind('change', function() { sc_form_devices_arcade_ledstripe4_onchange(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_devices_arcade_ledstripe4_onfocus(this, iSeqRow) });
  $('#id_sc_field_lasteffect' + iSeqRow).bind('blur', function() { sc_form_devices_arcade_lasteffect_onblur(this, iSeqRow) })
                                        .bind('change', function() { sc_form_devices_arcade_lasteffect_onchange(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_devices_arcade_lasteffect_onfocus(this, iSeqRow) });
  $('#id_sc_field_color' + iSeqRow).bind('blur', function() { sc_form_devices_arcade_color_onblur(this, iSeqRow) })
                                   .bind('change', function() { sc_form_devices_arcade_color_onchange(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_devices_arcade_color_onfocus(this, iSeqRow) });
  $('#id_sc_field_sound' + iSeqRow).bind('blur', function() { sc_form_devices_arcade_sound_onblur(this, iSeqRow) })
                                   .bind('change', function() { sc_form_devices_arcade_sound_onchange(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_devices_arcade_sound_onfocus(this, iSeqRow) });
  $('#id_sc_field_points' + iSeqRow).bind('blur', function() { sc_form_devices_arcade_points_onblur(this, iSeqRow) })
                                    .bind('change', function() { sc_form_devices_arcade_points_onchange(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_devices_arcade_points_onfocus(this, iSeqRow) });
  $('#id_sc_field_speak' + iSeqRow).bind('blur', function() { sc_form_devices_arcade_speak_onblur(this, iSeqRow) })
                                   .bind('change', function() { sc_form_devices_arcade_speak_onchange(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_devices_arcade_speak_onfocus(this, iSeqRow) });
  $('#id_sc_field_typereader' + iSeqRow).bind('blur', function() { sc_form_devices_arcade_typereader_onblur(this, iSeqRow) })
                                        .bind('change', function() { sc_form_devices_arcade_typereader_onchange(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_devices_arcade_typereader_onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_devices_arcade_cod_device_onblur(oThis, iSeqRow) {
  do_ajax_form_devices_arcade_validate_cod_device();
  scCssBlur(oThis);
}

function sc_form_devices_arcade_cod_device_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_devices_arcade_cod_device_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_devices_arcade_cod_activo_onblur(oThis, iSeqRow) {
  do_ajax_form_devices_arcade_validate_cod_activo();
  scCssBlur(oThis);
}

function sc_form_devices_arcade_cod_activo_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_devices_arcade_cod_activo_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_devices_arcade_cod_grupo_onblur(oThis, iSeqRow) {
  do_ajax_form_devices_arcade_validate_cod_grupo();
  scCssBlur(oThis);
}

function sc_form_devices_arcade_cod_grupo_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_devices_arcade_cod_grupo_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_devices_arcade_device_name_onblur(oThis, iSeqRow) {
  do_ajax_form_devices_arcade_validate_device_name();
  scCssBlur(oThis);
}

function sc_form_devices_arcade_device_name_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_devices_arcade_device_name_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_devices_arcade_activa_onblur(oThis, iSeqRow) {
  do_ajax_form_devices_arcade_validate_activa();
  scCssBlur(oThis);
}

function sc_form_devices_arcade_activa_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_devices_arcade_activa_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_devices_arcade_estado_onblur(oThis, iSeqRow) {
  do_ajax_form_devices_arcade_validate_estado();
  scCssBlur(oThis);
}

function sc_form_devices_arcade_estado_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_devices_arcade_estado_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_devices_arcade_ult_rfid_onblur(oThis, iSeqRow) {
  do_ajax_form_devices_arcade_validate_ult_rfid();
  scCssBlur(oThis);
}

function sc_form_devices_arcade_ult_rfid_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_devices_arcade_ult_rfid_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_devices_arcade_ult_fecha_onblur(oThis, iSeqRow) {
  do_ajax_form_devices_arcade_validate_ult_fecha();
  scCssBlur(oThis);
}

function sc_form_devices_arcade_ult_fecha_hora_onblur(oThis, iSeqRow) {
  do_ajax_form_devices_arcade_validate_ult_fecha();
  scCssBlur(oThis);
}

function sc_form_devices_arcade_ult_fecha_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_devices_arcade_ult_fecha_hora_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_devices_arcade_ult_fecha_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_devices_arcade_ult_fecha_hora_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_devices_arcade_valor_default_onblur(oThis, iSeqRow) {
  do_ajax_form_devices_arcade_validate_valor_default();
  scCssBlur(oThis);
}

function sc_form_devices_arcade_valor_default_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_devices_arcade_valor_default_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_devices_arcade_acepta_tiempo_onblur(oThis, iSeqRow) {
  do_ajax_form_devices_arcade_validate_acepta_tiempo();
  scCssBlur(oThis);
}

function sc_form_devices_arcade_acepta_tiempo_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_devices_arcade_acepta_tiempo_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_devices_arcade_acepta_tokens_onblur(oThis, iSeqRow) {
  do_ajax_form_devices_arcade_validate_acepta_tokens();
  scCssBlur(oThis);
}

function sc_form_devices_arcade_acepta_tokens_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_devices_arcade_acepta_tokens_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_devices_arcade_dev_ip_onblur(oThis, iSeqRow) {
  do_ajax_form_devices_arcade_validate_dev_ip();
  scCssBlur(oThis);
}

function sc_form_devices_arcade_dev_ip_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_devices_arcade_dev_ip_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_devices_arcade_tipo_dev_onblur(oThis, iSeqRow) {
  do_ajax_form_devices_arcade_validate_tipo_dev();
  scCssBlur(oThis);
}

function sc_form_devices_arcade_tipo_dev_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_devices_arcade_tipo_dev_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_devices_arcade_direccion_torno_onblur(oThis, iSeqRow) {
  do_ajax_form_devices_arcade_validate_direccion_torno();
  scCssBlur(oThis);
}

function sc_form_devices_arcade_direccion_torno_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_devices_arcade_direccion_torno_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_devices_arcade_timeout_rfid_onblur(oThis, iSeqRow) {
  do_ajax_form_devices_arcade_validate_timeout_rfid();
  scCssBlur(oThis);
}

function sc_form_devices_arcade_timeout_rfid_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_devices_arcade_timeout_rfid_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_devices_arcade_discapacitado_onblur(oThis, iSeqRow) {
  do_ajax_form_devices_arcade_validate_discapacitado();
  scCssBlur(oThis);
}

function sc_form_devices_arcade_discapacitado_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_devices_arcade_discapacitado_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_devices_arcade_numcaja_onblur(oThis, iSeqRow) {
  do_ajax_form_devices_arcade_validate_numcaja();
  scCssBlur(oThis);
}

function sc_form_devices_arcade_numcaja_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_devices_arcade_numcaja_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_devices_arcade_empleado_onblur(oThis, iSeqRow) {
  do_ajax_form_devices_arcade_validate_empleado();
  scCssBlur(oThis);
}

function sc_form_devices_arcade_empleado_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_devices_arcade_empleado_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_devices_arcade_tokens_onblur(oThis, iSeqRow) {
  do_ajax_form_devices_arcade_validate_tokens();
  scCssBlur(oThis);
}

function sc_form_devices_arcade_tokens_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_devices_arcade_tokens_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_devices_arcade_serialrfid_onblur(oThis, iSeqRow) {
  do_ajax_form_devices_arcade_validate_serialrfid();
  scCssBlur(oThis);
}

function sc_form_devices_arcade_serialrfid_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_devices_arcade_serialrfid_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_devices_arcade_bidireccion_onblur(oThis, iSeqRow) {
  do_ajax_form_devices_arcade_validate_bidireccion();
  scCssBlur(oThis);
}

function sc_form_devices_arcade_bidireccion_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_devices_arcade_bidireccion_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_devices_arcade_cod_devicee_onblur(oThis, iSeqRow) {
  do_ajax_form_devices_arcade_validate_cod_devicee();
  scCssBlur(oThis);
}

function sc_form_devices_arcade_cod_devicee_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_devices_arcade_cod_devicee_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_devices_arcade_url_1_onblur(oThis, iSeqRow) {
  do_ajax_form_devices_arcade_validate_url_1();
  scCssBlur(oThis);
}

function sc_form_devices_arcade_url_1_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_devices_arcade_url_1_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_devices_arcade_url_2_onblur(oThis, iSeqRow) {
  do_ajax_form_devices_arcade_validate_url_2();
  scCssBlur(oThis);
}

function sc_form_devices_arcade_url_2_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_devices_arcade_url_2_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_devices_arcade_url_3_onblur(oThis, iSeqRow) {
  do_ajax_form_devices_arcade_validate_url_3();
  scCssBlur(oThis);
}

function sc_form_devices_arcade_url_3_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_devices_arcade_url_3_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_devices_arcade_foto1_onblur(oThis, iSeqRow) {
  scCssBlur(oThis);
}

function sc_form_devices_arcade_foto1_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_devices_arcade_foto1_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_form_devices_arcade_foto2_onblur(oThis, iSeqRow) {
  scCssBlur(oThis);
}

function sc_form_devices_arcade_foto2_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_devices_arcade_foto2_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_form_devices_arcade_foto3_onblur(oThis, iSeqRow) {
  scCssBlur(oThis);
}

function sc_form_devices_arcade_foto3_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_devices_arcade_foto3_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_form_devices_arcade_pin_relay1_onblur(oThis, iSeqRow) {
  do_ajax_form_devices_arcade_validate_pin_relay1();
  scCssBlur(oThis);
}

function sc_form_devices_arcade_pin_relay1_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_devices_arcade_pin_relay1_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_devices_arcade_pin_relay2_onblur(oThis, iSeqRow) {
  do_ajax_form_devices_arcade_validate_pin_relay2();
  scCssBlur(oThis);
}

function sc_form_devices_arcade_pin_relay2_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_devices_arcade_pin_relay2_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_devices_arcade_rfid_read_onblur(oThis, iSeqRow) {
  do_ajax_form_devices_arcade_validate_rfid_read();
  scCssBlur(oThis);
}

function sc_form_devices_arcade_rfid_read_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_devices_arcade_rfid_read_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_devices_arcade_rfid_estado_onblur(oThis, iSeqRow) {
  do_ajax_form_devices_arcade_validate_rfid_estado();
  scCssBlur(oThis);
}

function sc_form_devices_arcade_rfid_estado_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_devices_arcade_rfid_estado_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_devices_arcade_rfid_fecha_onblur(oThis, iSeqRow) {
  do_ajax_form_devices_arcade_validate_rfid_fecha();
  scCssBlur(oThis);
}

function sc_form_devices_arcade_rfid_fecha_hora_onblur(oThis, iSeqRow) {
  do_ajax_form_devices_arcade_validate_rfid_fecha();
  scCssBlur(oThis);
}

function sc_form_devices_arcade_rfid_fecha_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_devices_arcade_rfid_fecha_hora_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_devices_arcade_rfid_fecha_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_devices_arcade_rfid_fecha_hora_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_devices_arcade_url_accion_onblur(oThis, iSeqRow) {
  do_ajax_form_devices_arcade_validate_url_accion();
  scCssBlur(oThis);
}

function sc_form_devices_arcade_url_accion_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_devices_arcade_url_accion_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_devices_arcade_url_atraccion_onblur(oThis, iSeqRow) {
  do_ajax_form_devices_arcade_validate_url_atraccion();
  scCssBlur(oThis);
}

function sc_form_devices_arcade_url_atraccion_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_devices_arcade_url_atraccion_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_devices_arcade_uhfip_onblur(oThis, iSeqRow) {
  do_ajax_form_devices_arcade_validate_uhfip();
  scCssBlur(oThis);
}

function sc_form_devices_arcade_uhfip_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_devices_arcade_uhfip_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_devices_arcade_url_reader_onblur(oThis, iSeqRow) {
  do_ajax_form_devices_arcade_validate_url_reader();
  scCssBlur(oThis);
}

function sc_form_devices_arcade_url_reader_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_devices_arcade_url_reader_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_devices_arcade_cod_rfid900_onblur(oThis, iSeqRow) {
  do_ajax_form_devices_arcade_validate_cod_rfid900();
  scCssBlur(oThis);
}

function sc_form_devices_arcade_cod_rfid900_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_devices_arcade_cod_rfid900_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_devices_arcade_mensaje_onblur(oThis, iSeqRow) {
  do_ajax_form_devices_arcade_validate_mensaje();
  scCssBlur(oThis);
}

function sc_form_devices_arcade_mensaje_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_devices_arcade_mensaje_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_devices_arcade_tipolector_onblur(oThis, iSeqRow) {
  do_ajax_form_devices_arcade_validate_tipolector();
  scCssBlur(oThis);
}

function sc_form_devices_arcade_tipolector_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_devices_arcade_tipolector_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_devices_arcade_url_accion_bg_onblur(oThis, iSeqRow) {
  do_ajax_form_devices_arcade_validate_url_accion_bg();
  scCssBlur(oThis);
}

function sc_form_devices_arcade_url_accion_bg_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_devices_arcade_url_accion_bg_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_devices_arcade_url_inicio_onblur(oThis, iSeqRow) {
  do_ajax_form_devices_arcade_validate_url_inicio();
  scCssBlur(oThis);
}

function sc_form_devices_arcade_url_inicio_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_devices_arcade_url_inicio_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_devices_arcade_ledstripe1_onblur(oThis, iSeqRow) {
  do_ajax_form_devices_arcade_validate_ledstripe1();
  scCssBlur(oThis);
}

function sc_form_devices_arcade_ledstripe1_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_devices_arcade_ledstripe1_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_devices_arcade_ledstripe2_onblur(oThis, iSeqRow) {
  do_ajax_form_devices_arcade_validate_ledstripe2();
  scCssBlur(oThis);
}

function sc_form_devices_arcade_ledstripe2_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_devices_arcade_ledstripe2_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_devices_arcade_ledstripe3_onblur(oThis, iSeqRow) {
  do_ajax_form_devices_arcade_validate_ledstripe3();
  scCssBlur(oThis);
}

function sc_form_devices_arcade_ledstripe3_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_devices_arcade_ledstripe3_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_devices_arcade_ledstripe4_onblur(oThis, iSeqRow) {
  do_ajax_form_devices_arcade_validate_ledstripe4();
  scCssBlur(oThis);
}

function sc_form_devices_arcade_ledstripe4_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_devices_arcade_ledstripe4_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_devices_arcade_lasteffect_onblur(oThis, iSeqRow) {
  do_ajax_form_devices_arcade_validate_lasteffect();
  scCssBlur(oThis);
}

function sc_form_devices_arcade_lasteffect_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_devices_arcade_lasteffect_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_devices_arcade_color_onblur(oThis, iSeqRow) {
  do_ajax_form_devices_arcade_validate_color();
  scCssBlur(oThis);
}

function sc_form_devices_arcade_color_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_devices_arcade_color_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_devices_arcade_sound_onblur(oThis, iSeqRow) {
  do_ajax_form_devices_arcade_validate_sound();
  scCssBlur(oThis);
}

function sc_form_devices_arcade_sound_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_devices_arcade_sound_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_devices_arcade_points_onblur(oThis, iSeqRow) {
  do_ajax_form_devices_arcade_validate_points();
  scCssBlur(oThis);
}

function sc_form_devices_arcade_points_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_devices_arcade_points_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_devices_arcade_speak_onblur(oThis, iSeqRow) {
  do_ajax_form_devices_arcade_validate_speak();
  scCssBlur(oThis);
}

function sc_form_devices_arcade_speak_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_devices_arcade_speak_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_devices_arcade_typereader_onblur(oThis, iSeqRow) {
  do_ajax_form_devices_arcade_validate_typereader();
  scCssBlur(oThis);
}

function sc_form_devices_arcade_typereader_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_devices_arcade_typereader_onfocus(oThis, iSeqRow) {
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
	displayChange_field("cod_activo", "", status);
	displayChange_field("cod_grupo", "", status);
	displayChange_field("device_name", "", status);
	displayChange_field("activa", "", status);
	displayChange_field("estado", "", status);
	displayChange_field("ult_rfid", "", status);
	displayChange_field("ult_fecha", "", status);
	displayChange_field("valor_default", "", status);
	displayChange_field("acepta_tiempo", "", status);
	displayChange_field("acepta_tokens", "", status);
	displayChange_field("dev_ip", "", status);
	displayChange_field("tipo_dev", "", status);
	displayChange_field("direccion_torno", "", status);
	displayChange_field("timeout_rfid", "", status);
	displayChange_field("discapacitado", "", status);
	displayChange_field("numcaja", "", status);
	displayChange_field("empleado", "", status);
	displayChange_field("tokens", "", status);
	displayChange_field("serialrfid", "", status);
	displayChange_field("bidireccion", "", status);
	displayChange_field("cod_devicee", "", status);
	displayChange_field("url_1", "", status);
	displayChange_field("url_2", "", status);
	displayChange_field("url_3", "", status);
	displayChange_field("foto1", "", status);
	displayChange_field("foto2", "", status);
	displayChange_field("foto3", "", status);
	displayChange_field("pin_relay1", "", status);
	displayChange_field("pin_relay2", "", status);
	displayChange_field("rfid_read", "", status);
	displayChange_field("rfid_estado", "", status);
	displayChange_field("rfid_fecha", "", status);
	displayChange_field("url_accion", "", status);
	displayChange_field("url_atraccion", "", status);
	displayChange_field("uhfip", "", status);
	displayChange_field("url_reader", "", status);
	displayChange_field("cod_rfid900", "", status);
	displayChange_field("mensaje", "", status);
	displayChange_field("tipolector", "", status);
	displayChange_field("url_accion_bg", "", status);
	displayChange_field("url_inicio", "", status);
	displayChange_field("ledstripe1", "", status);
	displayChange_field("ledstripe2", "", status);
	displayChange_field("ledstripe3", "", status);
	displayChange_field("ledstripe4", "", status);
	displayChange_field("lasteffect", "", status);
	displayChange_field("color", "", status);
	displayChange_field("sound", "", status);
	displayChange_field("points", "", status);
	displayChange_field("speak", "", status);
	displayChange_field("typereader", "", status);
}

function displayChange_row(row, status) {
	displayChange_field_cod_device(row, status);
	displayChange_field_cod_activo(row, status);
	displayChange_field_cod_grupo(row, status);
	displayChange_field_device_name(row, status);
	displayChange_field_activa(row, status);
	displayChange_field_estado(row, status);
	displayChange_field_ult_rfid(row, status);
	displayChange_field_ult_fecha(row, status);
	displayChange_field_valor_default(row, status);
	displayChange_field_acepta_tiempo(row, status);
	displayChange_field_acepta_tokens(row, status);
	displayChange_field_dev_ip(row, status);
	displayChange_field_tipo_dev(row, status);
	displayChange_field_direccion_torno(row, status);
	displayChange_field_timeout_rfid(row, status);
	displayChange_field_discapacitado(row, status);
	displayChange_field_numcaja(row, status);
	displayChange_field_empleado(row, status);
	displayChange_field_tokens(row, status);
	displayChange_field_serialrfid(row, status);
	displayChange_field_bidireccion(row, status);
	displayChange_field_cod_devicee(row, status);
	displayChange_field_url_1(row, status);
	displayChange_field_url_2(row, status);
	displayChange_field_url_3(row, status);
	displayChange_field_foto1(row, status);
	displayChange_field_foto2(row, status);
	displayChange_field_foto3(row, status);
	displayChange_field_pin_relay1(row, status);
	displayChange_field_pin_relay2(row, status);
	displayChange_field_rfid_read(row, status);
	displayChange_field_rfid_estado(row, status);
	displayChange_field_rfid_fecha(row, status);
	displayChange_field_url_accion(row, status);
	displayChange_field_url_atraccion(row, status);
	displayChange_field_uhfip(row, status);
	displayChange_field_url_reader(row, status);
	displayChange_field_cod_rfid900(row, status);
	displayChange_field_mensaje(row, status);
	displayChange_field_tipolector(row, status);
	displayChange_field_url_accion_bg(row, status);
	displayChange_field_url_inicio(row, status);
	displayChange_field_ledstripe1(row, status);
	displayChange_field_ledstripe2(row, status);
	displayChange_field_ledstripe3(row, status);
	displayChange_field_ledstripe4(row, status);
	displayChange_field_lasteffect(row, status);
	displayChange_field_color(row, status);
	displayChange_field_sound(row, status);
	displayChange_field_points(row, status);
	displayChange_field_speak(row, status);
	displayChange_field_typereader(row, status);
}

function displayChange_field(field, row, status) {
	if ("cod_device" == field) {
		displayChange_field_cod_device(row, status);
	}
	if ("cod_activo" == field) {
		displayChange_field_cod_activo(row, status);
	}
	if ("cod_grupo" == field) {
		displayChange_field_cod_grupo(row, status);
	}
	if ("device_name" == field) {
		displayChange_field_device_name(row, status);
	}
	if ("activa" == field) {
		displayChange_field_activa(row, status);
	}
	if ("estado" == field) {
		displayChange_field_estado(row, status);
	}
	if ("ult_rfid" == field) {
		displayChange_field_ult_rfid(row, status);
	}
	if ("ult_fecha" == field) {
		displayChange_field_ult_fecha(row, status);
	}
	if ("valor_default" == field) {
		displayChange_field_valor_default(row, status);
	}
	if ("acepta_tiempo" == field) {
		displayChange_field_acepta_tiempo(row, status);
	}
	if ("acepta_tokens" == field) {
		displayChange_field_acepta_tokens(row, status);
	}
	if ("dev_ip" == field) {
		displayChange_field_dev_ip(row, status);
	}
	if ("tipo_dev" == field) {
		displayChange_field_tipo_dev(row, status);
	}
	if ("direccion_torno" == field) {
		displayChange_field_direccion_torno(row, status);
	}
	if ("timeout_rfid" == field) {
		displayChange_field_timeout_rfid(row, status);
	}
	if ("discapacitado" == field) {
		displayChange_field_discapacitado(row, status);
	}
	if ("numcaja" == field) {
		displayChange_field_numcaja(row, status);
	}
	if ("empleado" == field) {
		displayChange_field_empleado(row, status);
	}
	if ("tokens" == field) {
		displayChange_field_tokens(row, status);
	}
	if ("serialrfid" == field) {
		displayChange_field_serialrfid(row, status);
	}
	if ("bidireccion" == field) {
		displayChange_field_bidireccion(row, status);
	}
	if ("cod_devicee" == field) {
		displayChange_field_cod_devicee(row, status);
	}
	if ("url_1" == field) {
		displayChange_field_url_1(row, status);
	}
	if ("url_2" == field) {
		displayChange_field_url_2(row, status);
	}
	if ("url_3" == field) {
		displayChange_field_url_3(row, status);
	}
	if ("foto1" == field) {
		displayChange_field_foto1(row, status);
	}
	if ("foto2" == field) {
		displayChange_field_foto2(row, status);
	}
	if ("foto3" == field) {
		displayChange_field_foto3(row, status);
	}
	if ("pin_relay1" == field) {
		displayChange_field_pin_relay1(row, status);
	}
	if ("pin_relay2" == field) {
		displayChange_field_pin_relay2(row, status);
	}
	if ("rfid_read" == field) {
		displayChange_field_rfid_read(row, status);
	}
	if ("rfid_estado" == field) {
		displayChange_field_rfid_estado(row, status);
	}
	if ("rfid_fecha" == field) {
		displayChange_field_rfid_fecha(row, status);
	}
	if ("url_accion" == field) {
		displayChange_field_url_accion(row, status);
	}
	if ("url_atraccion" == field) {
		displayChange_field_url_atraccion(row, status);
	}
	if ("uhfip" == field) {
		displayChange_field_uhfip(row, status);
	}
	if ("url_reader" == field) {
		displayChange_field_url_reader(row, status);
	}
	if ("cod_rfid900" == field) {
		displayChange_field_cod_rfid900(row, status);
	}
	if ("mensaje" == field) {
		displayChange_field_mensaje(row, status);
	}
	if ("tipolector" == field) {
		displayChange_field_tipolector(row, status);
	}
	if ("url_accion_bg" == field) {
		displayChange_field_url_accion_bg(row, status);
	}
	if ("url_inicio" == field) {
		displayChange_field_url_inicio(row, status);
	}
	if ("ledstripe1" == field) {
		displayChange_field_ledstripe1(row, status);
	}
	if ("ledstripe2" == field) {
		displayChange_field_ledstripe2(row, status);
	}
	if ("ledstripe3" == field) {
		displayChange_field_ledstripe3(row, status);
	}
	if ("ledstripe4" == field) {
		displayChange_field_ledstripe4(row, status);
	}
	if ("lasteffect" == field) {
		displayChange_field_lasteffect(row, status);
	}
	if ("color" == field) {
		displayChange_field_color(row, status);
	}
	if ("sound" == field) {
		displayChange_field_sound(row, status);
	}
	if ("points" == field) {
		displayChange_field_points(row, status);
	}
	if ("speak" == field) {
		displayChange_field_speak(row, status);
	}
	if ("typereader" == field) {
		displayChange_field_typereader(row, status);
	}
}

function displayChange_field_cod_device(row, status) {
    var fieldId;
}

function displayChange_field_cod_activo(row, status) {
    var fieldId;
}

function displayChange_field_cod_grupo(row, status) {
    var fieldId;
}

function displayChange_field_device_name(row, status) {
    var fieldId;
}

function displayChange_field_activa(row, status) {
    var fieldId;
}

function displayChange_field_estado(row, status) {
    var fieldId;
}

function displayChange_field_ult_rfid(row, status) {
    var fieldId;
}

function displayChange_field_ult_fecha(row, status) {
    var fieldId;
}

function displayChange_field_valor_default(row, status) {
    var fieldId;
}

function displayChange_field_acepta_tiempo(row, status) {
    var fieldId;
}

function displayChange_field_acepta_tokens(row, status) {
    var fieldId;
}

function displayChange_field_dev_ip(row, status) {
    var fieldId;
}

function displayChange_field_tipo_dev(row, status) {
    var fieldId;
}

function displayChange_field_direccion_torno(row, status) {
    var fieldId;
}

function displayChange_field_timeout_rfid(row, status) {
    var fieldId;
}

function displayChange_field_discapacitado(row, status) {
    var fieldId;
}

function displayChange_field_numcaja(row, status) {
    var fieldId;
}

function displayChange_field_empleado(row, status) {
    var fieldId;
}

function displayChange_field_tokens(row, status) {
    var fieldId;
}

function displayChange_field_serialrfid(row, status) {
    var fieldId;
}

function displayChange_field_bidireccion(row, status) {
    var fieldId;
}

function displayChange_field_cod_devicee(row, status) {
    var fieldId;
}

function displayChange_field_url_1(row, status) {
    var fieldId;
}

function displayChange_field_url_2(row, status) {
    var fieldId;
}

function displayChange_field_url_3(row, status) {
    var fieldId;
}

function displayChange_field_foto1(row, status) {
    var fieldId;
}

function displayChange_field_foto2(row, status) {
    var fieldId;
}

function displayChange_field_foto3(row, status) {
    var fieldId;
}

function displayChange_field_pin_relay1(row, status) {
    var fieldId;
}

function displayChange_field_pin_relay2(row, status) {
    var fieldId;
}

function displayChange_field_rfid_read(row, status) {
    var fieldId;
}

function displayChange_field_rfid_estado(row, status) {
    var fieldId;
}

function displayChange_field_rfid_fecha(row, status) {
    var fieldId;
}

function displayChange_field_url_accion(row, status) {
    var fieldId;
}

function displayChange_field_url_atraccion(row, status) {
    var fieldId;
}

function displayChange_field_uhfip(row, status) {
    var fieldId;
}

function displayChange_field_url_reader(row, status) {
    var fieldId;
}

function displayChange_field_cod_rfid900(row, status) {
    var fieldId;
}

function displayChange_field_mensaje(row, status) {
    var fieldId;
}

function displayChange_field_tipolector(row, status) {
    var fieldId;
}

function displayChange_field_url_accion_bg(row, status) {
    var fieldId;
}

function displayChange_field_url_inicio(row, status) {
    var fieldId;
}

function displayChange_field_ledstripe1(row, status) {
    var fieldId;
}

function displayChange_field_ledstripe2(row, status) {
    var fieldId;
}

function displayChange_field_ledstripe3(row, status) {
    var fieldId;
}

function displayChange_field_ledstripe4(row, status) {
    var fieldId;
}

function displayChange_field_lasteffect(row, status) {
    var fieldId;
}

function displayChange_field_color(row, status) {
    var fieldId;
}

function displayChange_field_sound(row, status) {
    var fieldId;
}

function displayChange_field_points(row, status) {
    var fieldId;
}

function displayChange_field_speak(row, status) {
    var fieldId;
}

function displayChange_field_typereader(row, status) {
    var fieldId;
}

function scRecreateSelect2() {
}
function scResetPagesDisplay() {
	$(".sc-form-page").show();
}

function scHidePage(pageNo) {
	$("#id_form_devices_arcade_form" + pageNo).hide();
}

function scCheckNoPageSelected() {
	if (!$(".sc-form-page").filter(".scTabActive").filter(":visible").length) {
		var inactiveTabs = $(".sc-form-page").filter(".scTabInactive").filter(":visible");
		if (inactiveTabs.length) {
			var tabNo = $(inactiveTabs[0]).attr("id").substr(27);
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
      do_ajax_form_devices_arcade_validate_ult_fecha(iSeqRow);
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
  $("#id_sc_field_rfid_fecha" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_rfid_fecha" + iSeqRow] = $oField.val();
      if (2 == aParts.length) {
        sTime = " " + aParts[1];
      }
      if ('' == sTime || ' ' == sTime) {
        sTime = ' <?php echo $this->jqueryCalendarTimeStart($this->field_config['rfid_fecha']['date_format']); ?>';
      }
      $oField.datepicker("option", "dateFormat", "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', 'hh', 'ii', 'ss', ':', ';', $_SESSION['scriptcase']['reg_conf']['date_sep'], $_SESSION['scriptcase']['reg_conf']['time_sep']), array('', 'yyyy', '','','', '', '', '', ''), $this->field_config['rfid_fecha']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>" + sTime);
    },
    onClose: function(dateText, inst) {
      do_ajax_form_devices_arcade_validate_rfid_fecha(iSeqRow);
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
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', 'hh', 'ii', 'ss', ':', ';', $_SESSION['scriptcase']['reg_conf']['date_sep'], $_SESSION['scriptcase']['reg_conf']['time_sep']), array('', 'yyyy', '','','', '', '', '', ''), $this->field_config['rfid_fecha']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
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
  $("#id_sc_field_foto1" + iSeqRow).fileupload({
    datatype: "json",
    url: "form_devices_arcade_ul_save.php",
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
    url: "form_devices_arcade_ul_save.php",
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
    url: "form_devices_arcade_ul_save.php",
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
                         $(t).html("<a href=\"javascript:nm_mostra_doc('0', '"+rs2+"', 'form_devices_arcade')\">"+$('#id_read_on_'+field+iSeqRow).text()+"</a>");
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

