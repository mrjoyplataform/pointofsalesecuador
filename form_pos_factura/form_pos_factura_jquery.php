
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
  scEventControl_data["numcaja_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["serie_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["numero_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["prodentrega_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["estab_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["ptoemi_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["direstablecimiento_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["tipoambiente_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["tipoemision_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["rucem_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["dirmatriz_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["nombrecomercial_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["coddoc_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["razonsocial_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["rfid_estado_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["rfid_fecha_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["rfid_read_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["ult_rfid_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["numcaja_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["numcaja_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["serie_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["serie_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["numero_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["numero_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["prodentrega_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["prodentrega_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["estab_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["estab_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["ptoemi_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["ptoemi_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["direstablecimiento_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["direstablecimiento_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["tipoambiente_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["tipoambiente_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["tipoemision_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["tipoemision_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["rucem_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["rucem_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["dirmatriz_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["dirmatriz_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["nombrecomercial_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["nombrecomercial_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["coddoc_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["coddoc_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["razonsocial_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["razonsocial_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["rfid_estado_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["rfid_estado_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["rfid_fecha_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["rfid_fecha_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["rfid_read_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["rfid_read_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["ult_rfid_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["ult_rfid_" + iSeqRow]["change"]) {
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
  $('#id_sc_field_numcaja_' + iSeqRow).bind('blur', function() { sc_form_pos_factura_numcaja__onblur(this, iSeqRow) })
                                      .bind('change', function() { sc_form_pos_factura_numcaja__onchange(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_pos_factura_numcaja__onfocus(this, iSeqRow) });
  $('#id_sc_field_serie_' + iSeqRow).bind('blur', function() { sc_form_pos_factura_serie__onblur(this, iSeqRow) })
                                    .bind('change', function() { sc_form_pos_factura_serie__onchange(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_pos_factura_serie__onfocus(this, iSeqRow) });
  $('#id_sc_field_numero_' + iSeqRow).bind('blur', function() { sc_form_pos_factura_numero__onblur(this, iSeqRow) })
                                     .bind('change', function() { sc_form_pos_factura_numero__onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_pos_factura_numero__onfocus(this, iSeqRow) });
  $('#id_sc_field_prodentrega_' + iSeqRow).bind('blur', function() { sc_form_pos_factura_prodentrega__onblur(this, iSeqRow) })
                                          .bind('change', function() { sc_form_pos_factura_prodentrega__onchange(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_pos_factura_prodentrega__onfocus(this, iSeqRow) });
  $('#id_sc_field_estab_' + iSeqRow).bind('blur', function() { sc_form_pos_factura_estab__onblur(this, iSeqRow) })
                                    .bind('change', function() { sc_form_pos_factura_estab__onchange(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_pos_factura_estab__onfocus(this, iSeqRow) });
  $('#id_sc_field_ptoemi_' + iSeqRow).bind('blur', function() { sc_form_pos_factura_ptoemi__onblur(this, iSeqRow) })
                                     .bind('change', function() { sc_form_pos_factura_ptoemi__onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_pos_factura_ptoemi__onfocus(this, iSeqRow) });
  $('#id_sc_field_direstablecimiento_' + iSeqRow).bind('blur', function() { sc_form_pos_factura_direstablecimiento__onblur(this, iSeqRow) })
                                                 .bind('change', function() { sc_form_pos_factura_direstablecimiento__onchange(this, iSeqRow) })
                                                 .bind('focus', function() { sc_form_pos_factura_direstablecimiento__onfocus(this, iSeqRow) });
  $('#id_sc_field_tipoambiente_' + iSeqRow).bind('blur', function() { sc_form_pos_factura_tipoambiente__onblur(this, iSeqRow) })
                                           .bind('change', function() { sc_form_pos_factura_tipoambiente__onchange(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_pos_factura_tipoambiente__onfocus(this, iSeqRow) });
  $('#id_sc_field_tipoemision_' + iSeqRow).bind('blur', function() { sc_form_pos_factura_tipoemision__onblur(this, iSeqRow) })
                                          .bind('change', function() { sc_form_pos_factura_tipoemision__onchange(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_pos_factura_tipoemision__onfocus(this, iSeqRow) });
  $('#id_sc_field_rucem_' + iSeqRow).bind('blur', function() { sc_form_pos_factura_rucem__onblur(this, iSeqRow) })
                                    .bind('change', function() { sc_form_pos_factura_rucem__onchange(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_pos_factura_rucem__onfocus(this, iSeqRow) });
  $('#id_sc_field_dirmatriz_' + iSeqRow).bind('blur', function() { sc_form_pos_factura_dirmatriz__onblur(this, iSeqRow) })
                                        .bind('change', function() { sc_form_pos_factura_dirmatriz__onchange(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_pos_factura_dirmatriz__onfocus(this, iSeqRow) });
  $('#id_sc_field_nombrecomercial_' + iSeqRow).bind('blur', function() { sc_form_pos_factura_nombrecomercial__onblur(this, iSeqRow) })
                                              .bind('change', function() { sc_form_pos_factura_nombrecomercial__onchange(this, iSeqRow) })
                                              .bind('focus', function() { sc_form_pos_factura_nombrecomercial__onfocus(this, iSeqRow) });
  $('#id_sc_field_coddoc_' + iSeqRow).bind('blur', function() { sc_form_pos_factura_coddoc__onblur(this, iSeqRow) })
                                     .bind('change', function() { sc_form_pos_factura_coddoc__onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_pos_factura_coddoc__onfocus(this, iSeqRow) });
  $('#id_sc_field_razonsocial_' + iSeqRow).bind('blur', function() { sc_form_pos_factura_razonsocial__onblur(this, iSeqRow) })
                                          .bind('change', function() { sc_form_pos_factura_razonsocial__onchange(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_pos_factura_razonsocial__onfocus(this, iSeqRow) });
  $('#id_sc_field_rfid_estado_' + iSeqRow).bind('blur', function() { sc_form_pos_factura_rfid_estado__onblur(this, iSeqRow) })
                                          .bind('change', function() { sc_form_pos_factura_rfid_estado__onchange(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_pos_factura_rfid_estado__onfocus(this, iSeqRow) });
  $('#id_sc_field_rfid_fecha_' + iSeqRow).bind('blur', function() { sc_form_pos_factura_rfid_fecha__onblur(this, iSeqRow) })
                                         .bind('change', function() { sc_form_pos_factura_rfid_fecha__onchange(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_pos_factura_rfid_fecha__onfocus(this, iSeqRow) });
  $('#id_sc_field_rfid_fecha__hora' + iSeqRow).bind('blur', function() { sc_form_pos_factura_rfid_fecha__hora_onblur(this, iSeqRow) })
                                              .bind('change', function() { sc_form_pos_factura_rfid_fecha__hora_onchange(this, iSeqRow) })
                                              .bind('focus', function() { sc_form_pos_factura_rfid_fecha__hora_onfocus(this, iSeqRow) });
  $('#id_sc_field_rfid_read_' + iSeqRow).bind('blur', function() { sc_form_pos_factura_rfid_read__onblur(this, iSeqRow) })
                                        .bind('change', function() { sc_form_pos_factura_rfid_read__onchange(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_pos_factura_rfid_read__onfocus(this, iSeqRow) });
  $('#id_sc_field_ult_rfid_' + iSeqRow).bind('blur', function() { sc_form_pos_factura_ult_rfid__onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_form_pos_factura_ult_rfid__onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_pos_factura_ult_rfid__onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_pos_factura_numcaja__onblur(oThis, iSeqRow) {
  do_ajax_form_pos_factura_validate_numcaja_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_pos_factura_numcaja__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  nm_check_insert(iSeqRow);
}

function sc_form_pos_factura_numcaja__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_pos_factura_serie__onblur(oThis, iSeqRow) {
  do_ajax_form_pos_factura_validate_serie_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_pos_factura_serie__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  nm_check_insert(iSeqRow);
}

function sc_form_pos_factura_serie__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_pos_factura_numero__onblur(oThis, iSeqRow) {
  do_ajax_form_pos_factura_validate_numero_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_pos_factura_numero__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  nm_check_insert(iSeqRow);
}

function sc_form_pos_factura_numero__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_pos_factura_prodentrega__onblur(oThis, iSeqRow) {
  do_ajax_form_pos_factura_validate_prodentrega_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_pos_factura_prodentrega__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  nm_check_insert(iSeqRow);
}

function sc_form_pos_factura_prodentrega__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_pos_factura_estab__onblur(oThis, iSeqRow) {
  do_ajax_form_pos_factura_validate_estab_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_pos_factura_estab__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  nm_check_insert(iSeqRow);
}

function sc_form_pos_factura_estab__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_pos_factura_ptoemi__onblur(oThis, iSeqRow) {
  do_ajax_form_pos_factura_validate_ptoemi_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_pos_factura_ptoemi__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  nm_check_insert(iSeqRow);
}

function sc_form_pos_factura_ptoemi__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_pos_factura_direstablecimiento__onblur(oThis, iSeqRow) {
  do_ajax_form_pos_factura_validate_direstablecimiento_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_pos_factura_direstablecimiento__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  nm_check_insert(iSeqRow);
}

function sc_form_pos_factura_direstablecimiento__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_pos_factura_tipoambiente__onblur(oThis, iSeqRow) {
  do_ajax_form_pos_factura_validate_tipoambiente_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_pos_factura_tipoambiente__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  nm_check_insert(iSeqRow);
}

function sc_form_pos_factura_tipoambiente__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_pos_factura_tipoemision__onblur(oThis, iSeqRow) {
  do_ajax_form_pos_factura_validate_tipoemision_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_pos_factura_tipoemision__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  nm_check_insert(iSeqRow);
}

function sc_form_pos_factura_tipoemision__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_pos_factura_rucem__onblur(oThis, iSeqRow) {
  do_ajax_form_pos_factura_validate_rucem_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_pos_factura_rucem__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  nm_check_insert(iSeqRow);
}

function sc_form_pos_factura_rucem__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_pos_factura_dirmatriz__onblur(oThis, iSeqRow) {
  do_ajax_form_pos_factura_validate_dirmatriz_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_pos_factura_dirmatriz__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  nm_check_insert(iSeqRow);
}

function sc_form_pos_factura_dirmatriz__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_pos_factura_nombrecomercial__onblur(oThis, iSeqRow) {
  do_ajax_form_pos_factura_validate_nombrecomercial_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_pos_factura_nombrecomercial__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  nm_check_insert(iSeqRow);
}

function sc_form_pos_factura_nombrecomercial__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_pos_factura_coddoc__onblur(oThis, iSeqRow) {
  do_ajax_form_pos_factura_validate_coddoc_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_pos_factura_coddoc__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  nm_check_insert(iSeqRow);
}

function sc_form_pos_factura_coddoc__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_pos_factura_razonsocial__onblur(oThis, iSeqRow) {
  do_ajax_form_pos_factura_validate_razonsocial_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_pos_factura_razonsocial__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  nm_check_insert(iSeqRow);
}

function sc_form_pos_factura_razonsocial__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_pos_factura_rfid_estado__onblur(oThis, iSeqRow) {
  do_ajax_form_pos_factura_validate_rfid_estado_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_pos_factura_rfid_estado__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  nm_check_insert(iSeqRow);
}

function sc_form_pos_factura_rfid_estado__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_pos_factura_rfid_fecha__onblur(oThis, iSeqRow) {
  do_ajax_form_pos_factura_validate_rfid_fecha_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_pos_factura_rfid_fecha__hora_onblur(oThis, iSeqRow) {
  do_ajax_form_pos_factura_validate_rfid_fecha_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_pos_factura_rfid_fecha__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  nm_check_insert(iSeqRow);
}

function sc_form_pos_factura_rfid_fecha__hora_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  nm_check_insert(iSeqRow);
}

function sc_form_pos_factura_rfid_fecha__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_pos_factura_rfid_fecha__hora_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_pos_factura_rfid_read__onblur(oThis, iSeqRow) {
  do_ajax_form_pos_factura_validate_rfid_read_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_pos_factura_rfid_read__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  nm_check_insert(iSeqRow);
}

function sc_form_pos_factura_rfid_read__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_pos_factura_ult_rfid__onblur(oThis, iSeqRow) {
  do_ajax_form_pos_factura_validate_ult_rfid_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_pos_factura_ult_rfid__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  nm_check_insert(iSeqRow);
}

function sc_form_pos_factura_ult_rfid__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function displayChange_block(block, status) {
	if ("0" == block) {
		displayChange_block_0(status);
	}
}

function displayChange_block_0(status) {
	displayChange_field("numcaja_", "", status);
	displayChange_field("serie_", "", status);
	displayChange_field("numero_", "", status);
	displayChange_field("prodentrega_", "", status);
	displayChange_field("estab_", "", status);
	displayChange_field("ptoemi_", "", status);
	displayChange_field("direstablecimiento_", "", status);
	displayChange_field("tipoambiente_", "", status);
	displayChange_field("tipoemision_", "", status);
	displayChange_field("rucem_", "", status);
	displayChange_field("dirmatriz_", "", status);
	displayChange_field("nombrecomercial_", "", status);
	displayChange_field("coddoc_", "", status);
	displayChange_field("razonsocial_", "", status);
	displayChange_field("rfid_estado_", "", status);
	displayChange_field("rfid_fecha_", "", status);
	displayChange_field("rfid_read_", "", status);
	displayChange_field("ult_rfid_", "", status);
}

function displayChange_row(row, status) {
	displayChange_field_numcaja_(row, status);
	displayChange_field_serie_(row, status);
	displayChange_field_numero_(row, status);
	displayChange_field_prodentrega_(row, status);
	displayChange_field_estab_(row, status);
	displayChange_field_ptoemi_(row, status);
	displayChange_field_direstablecimiento_(row, status);
	displayChange_field_tipoambiente_(row, status);
	displayChange_field_tipoemision_(row, status);
	displayChange_field_rucem_(row, status);
	displayChange_field_dirmatriz_(row, status);
	displayChange_field_nombrecomercial_(row, status);
	displayChange_field_coddoc_(row, status);
	displayChange_field_razonsocial_(row, status);
	displayChange_field_rfid_estado_(row, status);
	displayChange_field_rfid_fecha_(row, status);
	displayChange_field_rfid_read_(row, status);
	displayChange_field_ult_rfid_(row, status);
}

function displayChange_field(field, row, status) {
	if ("numcaja_" == field) {
		displayChange_field_numcaja_(row, status);
	}
	if ("serie_" == field) {
		displayChange_field_serie_(row, status);
	}
	if ("numero_" == field) {
		displayChange_field_numero_(row, status);
	}
	if ("prodentrega_" == field) {
		displayChange_field_prodentrega_(row, status);
	}
	if ("estab_" == field) {
		displayChange_field_estab_(row, status);
	}
	if ("ptoemi_" == field) {
		displayChange_field_ptoemi_(row, status);
	}
	if ("direstablecimiento_" == field) {
		displayChange_field_direstablecimiento_(row, status);
	}
	if ("tipoambiente_" == field) {
		displayChange_field_tipoambiente_(row, status);
	}
	if ("tipoemision_" == field) {
		displayChange_field_tipoemision_(row, status);
	}
	if ("rucem_" == field) {
		displayChange_field_rucem_(row, status);
	}
	if ("dirmatriz_" == field) {
		displayChange_field_dirmatriz_(row, status);
	}
	if ("nombrecomercial_" == field) {
		displayChange_field_nombrecomercial_(row, status);
	}
	if ("coddoc_" == field) {
		displayChange_field_coddoc_(row, status);
	}
	if ("razonsocial_" == field) {
		displayChange_field_razonsocial_(row, status);
	}
	if ("rfid_estado_" == field) {
		displayChange_field_rfid_estado_(row, status);
	}
	if ("rfid_fecha_" == field) {
		displayChange_field_rfid_fecha_(row, status);
	}
	if ("rfid_read_" == field) {
		displayChange_field_rfid_read_(row, status);
	}
	if ("ult_rfid_" == field) {
		displayChange_field_ult_rfid_(row, status);
	}
}

function displayChange_field_numcaja_(row, status) {
    var fieldId;
}

function displayChange_field_serie_(row, status) {
    var fieldId;
}

function displayChange_field_numero_(row, status) {
    var fieldId;
}

function displayChange_field_prodentrega_(row, status) {
    var fieldId;
}

function displayChange_field_estab_(row, status) {
    var fieldId;
}

function displayChange_field_ptoemi_(row, status) {
    var fieldId;
}

function displayChange_field_direstablecimiento_(row, status) {
    var fieldId;
}

function displayChange_field_tipoambiente_(row, status) {
    var fieldId;
}

function displayChange_field_tipoemision_(row, status) {
    var fieldId;
}

function displayChange_field_rucem_(row, status) {
    var fieldId;
}

function displayChange_field_dirmatriz_(row, status) {
    var fieldId;
}

function displayChange_field_nombrecomercial_(row, status) {
    var fieldId;
}

function displayChange_field_coddoc_(row, status) {
    var fieldId;
}

function displayChange_field_razonsocial_(row, status) {
    var fieldId;
}

function displayChange_field_rfid_estado_(row, status) {
    var fieldId;
}

function displayChange_field_rfid_fecha_(row, status) {
    var fieldId;
}

function displayChange_field_rfid_read_(row, status) {
    var fieldId;
}

function displayChange_field_ult_rfid_(row, status) {
    var fieldId;
}

function scRecreateSelect2() {
}
function scResetPagesDisplay() {
	$(".sc-form-page").show();
}

function scHidePage(pageNo) {
	$("#id_form_pos_factura_form" + pageNo).hide();
}

function scCheckNoPageSelected() {
	if (!$(".sc-form-page").filter(".scTabActive").filter(":visible").length) {
		var inactiveTabs = $(".sc-form-page").filter(".scTabInactive").filter(":visible");
		if (inactiveTabs.length) {
			var tabNo = $(inactiveTabs[0]).attr("id").substr(24);
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
      do_ajax_form_pos_factura_validate_rfid_fecha_(iSeqRow);
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
                         $(t).html("<a href=\"javascript:nm_mostra_doc('0', '"+rs2+"', 'form_pos_factura')\">"+$('#id_read_on_'+field+iSeqRow).text()+"</a>");
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

