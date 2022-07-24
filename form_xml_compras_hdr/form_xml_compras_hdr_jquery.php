
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
  scEventControl_data["claveacceso" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["ambiente" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["tipoemision" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["razonsocial" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["nombrecomercial" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["ruc" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["coddoc" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["estab" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["ptoemi" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["secuencial" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["dirmatriz" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["fechaemision" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["tipoidentificacioncomprador" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["razonsocialcomprador" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["identificacioncomprador" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["totalsinimpuestos" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["totaldescuento" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["totalconimpuestos" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["propina" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["importetotal" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["moneda" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["fecharegistro" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["estado" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["claveacceso" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["claveacceso" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["ambiente" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["ambiente" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["tipoemision" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["tipoemision" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["razonsocial" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["razonsocial" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["nombrecomercial" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["nombrecomercial" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["ruc" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["ruc" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["coddoc" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["coddoc" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["estab" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["estab" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["ptoemi" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["ptoemi" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["secuencial" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["secuencial" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["dirmatriz" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["dirmatriz" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["fechaemision" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["fechaemision" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["tipoidentificacioncomprador" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["tipoidentificacioncomprador" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["razonsocialcomprador" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["razonsocialcomprador" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["identificacioncomprador" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["identificacioncomprador" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["totalsinimpuestos" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["totalsinimpuestos" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["totaldescuento" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["totaldescuento" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["totalconimpuestos" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["totalconimpuestos" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["propina" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["propina" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["importetotal" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["importetotal" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["moneda" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["moneda" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["fecharegistro" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["fecharegistro" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["estado" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["estado" + iSeqRow]["change"]) {
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
  $('#id_sc_field_ambiente' + iSeqRow).bind('blur', function() { sc_form_xml_compras_hdr_ambiente_onblur(this, iSeqRow) })
                                      .bind('change', function() { sc_form_xml_compras_hdr_ambiente_onchange(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_xml_compras_hdr_ambiente_onfocus(this, iSeqRow) });
  $('#id_sc_field_tipoemision' + iSeqRow).bind('blur', function() { sc_form_xml_compras_hdr_tipoemision_onblur(this, iSeqRow) })
                                         .bind('change', function() { sc_form_xml_compras_hdr_tipoemision_onchange(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_xml_compras_hdr_tipoemision_onfocus(this, iSeqRow) });
  $('#id_sc_field_razonsocial' + iSeqRow).bind('blur', function() { sc_form_xml_compras_hdr_razonsocial_onblur(this, iSeqRow) })
                                         .bind('change', function() { sc_form_xml_compras_hdr_razonsocial_onchange(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_xml_compras_hdr_razonsocial_onfocus(this, iSeqRow) });
  $('#id_sc_field_nombrecomercial' + iSeqRow).bind('blur', function() { sc_form_xml_compras_hdr_nombrecomercial_onblur(this, iSeqRow) })
                                             .bind('change', function() { sc_form_xml_compras_hdr_nombrecomercial_onchange(this, iSeqRow) })
                                             .bind('focus', function() { sc_form_xml_compras_hdr_nombrecomercial_onfocus(this, iSeqRow) });
  $('#id_sc_field_ruc' + iSeqRow).bind('blur', function() { sc_form_xml_compras_hdr_ruc_onblur(this, iSeqRow) })
                                 .bind('change', function() { sc_form_xml_compras_hdr_ruc_onchange(this, iSeqRow) })
                                 .bind('focus', function() { sc_form_xml_compras_hdr_ruc_onfocus(this, iSeqRow) });
  $('#id_sc_field_claveacceso' + iSeqRow).bind('blur', function() { sc_form_xml_compras_hdr_claveacceso_onblur(this, iSeqRow) })
                                         .bind('change', function() { sc_form_xml_compras_hdr_claveacceso_onchange(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_xml_compras_hdr_claveacceso_onfocus(this, iSeqRow) });
  $('#id_sc_field_coddoc' + iSeqRow).bind('blur', function() { sc_form_xml_compras_hdr_coddoc_onblur(this, iSeqRow) })
                                    .bind('change', function() { sc_form_xml_compras_hdr_coddoc_onchange(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_xml_compras_hdr_coddoc_onfocus(this, iSeqRow) });
  $('#id_sc_field_estab' + iSeqRow).bind('blur', function() { sc_form_xml_compras_hdr_estab_onblur(this, iSeqRow) })
                                   .bind('change', function() { sc_form_xml_compras_hdr_estab_onchange(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_xml_compras_hdr_estab_onfocus(this, iSeqRow) });
  $('#id_sc_field_ptoemi' + iSeqRow).bind('blur', function() { sc_form_xml_compras_hdr_ptoemi_onblur(this, iSeqRow) })
                                    .bind('change', function() { sc_form_xml_compras_hdr_ptoemi_onchange(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_xml_compras_hdr_ptoemi_onfocus(this, iSeqRow) });
  $('#id_sc_field_secuencial' + iSeqRow).bind('blur', function() { sc_form_xml_compras_hdr_secuencial_onblur(this, iSeqRow) })
                                        .bind('change', function() { sc_form_xml_compras_hdr_secuencial_onchange(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_xml_compras_hdr_secuencial_onfocus(this, iSeqRow) });
  $('#id_sc_field_dirmatriz' + iSeqRow).bind('blur', function() { sc_form_xml_compras_hdr_dirmatriz_onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_form_xml_compras_hdr_dirmatriz_onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_xml_compras_hdr_dirmatriz_onfocus(this, iSeqRow) });
  $('#id_sc_field_fechaemision' + iSeqRow).bind('blur', function() { sc_form_xml_compras_hdr_fechaemision_onblur(this, iSeqRow) })
                                          .bind('change', function() { sc_form_xml_compras_hdr_fechaemision_onchange(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_xml_compras_hdr_fechaemision_onfocus(this, iSeqRow) });
  $('#id_sc_field_direstablecimiento' + iSeqRow).bind('change', function() { sc_form_xml_compras_hdr_direstablecimiento_onchange(this, iSeqRow) });
  $('#id_sc_field_obligadocontabilidad' + iSeqRow).bind('change', function() { sc_form_xml_compras_hdr_obligadocontabilidad_onchange(this, iSeqRow) });
  $('#id_sc_field_tipoidentificacioncomprador' + iSeqRow).bind('blur', function() { sc_form_xml_compras_hdr_tipoidentificacioncomprador_onblur(this, iSeqRow) })
                                                         .bind('change', function() { sc_form_xml_compras_hdr_tipoidentificacioncomprador_onchange(this, iSeqRow) })
                                                         .bind('focus', function() { sc_form_xml_compras_hdr_tipoidentificacioncomprador_onfocus(this, iSeqRow) });
  $('#id_sc_field_razonsocialcomprador' + iSeqRow).bind('blur', function() { sc_form_xml_compras_hdr_razonsocialcomprador_onblur(this, iSeqRow) })
                                                  .bind('change', function() { sc_form_xml_compras_hdr_razonsocialcomprador_onchange(this, iSeqRow) })
                                                  .bind('focus', function() { sc_form_xml_compras_hdr_razonsocialcomprador_onfocus(this, iSeqRow) });
  $('#id_sc_field_identificacioncomprador' + iSeqRow).bind('blur', function() { sc_form_xml_compras_hdr_identificacioncomprador_onblur(this, iSeqRow) })
                                                     .bind('change', function() { sc_form_xml_compras_hdr_identificacioncomprador_onchange(this, iSeqRow) })
                                                     .bind('focus', function() { sc_form_xml_compras_hdr_identificacioncomprador_onfocus(this, iSeqRow) });
  $('#id_sc_field_totalsinimpuestos' + iSeqRow).bind('blur', function() { sc_form_xml_compras_hdr_totalsinimpuestos_onblur(this, iSeqRow) })
                                               .bind('change', function() { sc_form_xml_compras_hdr_totalsinimpuestos_onchange(this, iSeqRow) })
                                               .bind('focus', function() { sc_form_xml_compras_hdr_totalsinimpuestos_onfocus(this, iSeqRow) });
  $('#id_sc_field_totaldescuento' + iSeqRow).bind('blur', function() { sc_form_xml_compras_hdr_totaldescuento_onblur(this, iSeqRow) })
                                            .bind('change', function() { sc_form_xml_compras_hdr_totaldescuento_onchange(this, iSeqRow) })
                                            .bind('focus', function() { sc_form_xml_compras_hdr_totaldescuento_onfocus(this, iSeqRow) });
  $('#id_sc_field_totalconimpuestos' + iSeqRow).bind('blur', function() { sc_form_xml_compras_hdr_totalconimpuestos_onblur(this, iSeqRow) })
                                               .bind('change', function() { sc_form_xml_compras_hdr_totalconimpuestos_onchange(this, iSeqRow) })
                                               .bind('focus', function() { sc_form_xml_compras_hdr_totalconimpuestos_onfocus(this, iSeqRow) });
  $('#id_sc_field_propina' + iSeqRow).bind('blur', function() { sc_form_xml_compras_hdr_propina_onblur(this, iSeqRow) })
                                     .bind('change', function() { sc_form_xml_compras_hdr_propina_onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_xml_compras_hdr_propina_onfocus(this, iSeqRow) });
  $('#id_sc_field_importetotal' + iSeqRow).bind('blur', function() { sc_form_xml_compras_hdr_importetotal_onblur(this, iSeqRow) })
                                          .bind('change', function() { sc_form_xml_compras_hdr_importetotal_onchange(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_xml_compras_hdr_importetotal_onfocus(this, iSeqRow) });
  $('#id_sc_field_moneda' + iSeqRow).bind('blur', function() { sc_form_xml_compras_hdr_moneda_onblur(this, iSeqRow) })
                                    .bind('change', function() { sc_form_xml_compras_hdr_moneda_onchange(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_xml_compras_hdr_moneda_onfocus(this, iSeqRow) });
  $('#id_sc_field_fecharegistro' + iSeqRow).bind('blur', function() { sc_form_xml_compras_hdr_fecharegistro_onblur(this, iSeqRow) })
                                           .bind('change', function() { sc_form_xml_compras_hdr_fecharegistro_onchange(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_xml_compras_hdr_fecharegistro_onfocus(this, iSeqRow) });
  $('#id_sc_field_fecharegistro_hora' + iSeqRow).bind('blur', function() { sc_form_xml_compras_hdr_fecharegistro_hora_onblur(this, iSeqRow) })
                                                .bind('change', function() { sc_form_xml_compras_hdr_fecharegistro_hora_onchange(this, iSeqRow) })
                                                .bind('focus', function() { sc_form_xml_compras_hdr_fecharegistro_hora_onfocus(this, iSeqRow) });
  $('#id_sc_field_estado' + iSeqRow).bind('blur', function() { sc_form_xml_compras_hdr_estado_onblur(this, iSeqRow) })
                                    .bind('change', function() { sc_form_xml_compras_hdr_estado_onchange(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_xml_compras_hdr_estado_onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_xml_compras_hdr_ambiente_onblur(oThis, iSeqRow) {
  do_ajax_form_xml_compras_hdr_validate_ambiente();
  scCssBlur(oThis);
}

function sc_form_xml_compras_hdr_ambiente_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_xml_compras_hdr_ambiente_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_xml_compras_hdr_tipoemision_onblur(oThis, iSeqRow) {
  do_ajax_form_xml_compras_hdr_validate_tipoemision();
  scCssBlur(oThis);
}

function sc_form_xml_compras_hdr_tipoemision_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_xml_compras_hdr_tipoemision_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_xml_compras_hdr_razonsocial_onblur(oThis, iSeqRow) {
  do_ajax_form_xml_compras_hdr_validate_razonsocial();
  scCssBlur(oThis);
}

function sc_form_xml_compras_hdr_razonsocial_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_xml_compras_hdr_razonsocial_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_xml_compras_hdr_nombrecomercial_onblur(oThis, iSeqRow) {
  do_ajax_form_xml_compras_hdr_validate_nombrecomercial();
  scCssBlur(oThis);
}

function sc_form_xml_compras_hdr_nombrecomercial_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_xml_compras_hdr_nombrecomercial_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_xml_compras_hdr_ruc_onblur(oThis, iSeqRow) {
  do_ajax_form_xml_compras_hdr_validate_ruc();
  scCssBlur(oThis);
}

function sc_form_xml_compras_hdr_ruc_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_xml_compras_hdr_ruc_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_xml_compras_hdr_claveacceso_onblur(oThis, iSeqRow) {
  do_ajax_form_xml_compras_hdr_validate_claveacceso();
  scCssBlur(oThis);
}

function sc_form_xml_compras_hdr_claveacceso_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_xml_compras_hdr_claveacceso_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_xml_compras_hdr_coddoc_onblur(oThis, iSeqRow) {
  do_ajax_form_xml_compras_hdr_validate_coddoc();
  scCssBlur(oThis);
}

function sc_form_xml_compras_hdr_coddoc_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_xml_compras_hdr_coddoc_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_xml_compras_hdr_estab_onblur(oThis, iSeqRow) {
  do_ajax_form_xml_compras_hdr_validate_estab();
  scCssBlur(oThis);
}

function sc_form_xml_compras_hdr_estab_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_xml_compras_hdr_estab_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_xml_compras_hdr_ptoemi_onblur(oThis, iSeqRow) {
  do_ajax_form_xml_compras_hdr_validate_ptoemi();
  scCssBlur(oThis);
}

function sc_form_xml_compras_hdr_ptoemi_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_xml_compras_hdr_ptoemi_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_xml_compras_hdr_secuencial_onblur(oThis, iSeqRow) {
  do_ajax_form_xml_compras_hdr_validate_secuencial();
  scCssBlur(oThis);
}

function sc_form_xml_compras_hdr_secuencial_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_xml_compras_hdr_secuencial_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_xml_compras_hdr_dirmatriz_onblur(oThis, iSeqRow) {
  do_ajax_form_xml_compras_hdr_validate_dirmatriz();
  scCssBlur(oThis);
}

function sc_form_xml_compras_hdr_dirmatriz_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_xml_compras_hdr_dirmatriz_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_xml_compras_hdr_fechaemision_onblur(oThis, iSeqRow) {
  do_ajax_form_xml_compras_hdr_validate_fechaemision();
  scCssBlur(oThis);
}

function sc_form_xml_compras_hdr_fechaemision_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_xml_compras_hdr_fechaemision_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_xml_compras_hdr_direstablecimiento_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_xml_compras_hdr_obligadocontabilidad_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_xml_compras_hdr_tipoidentificacioncomprador_onblur(oThis, iSeqRow) {
  do_ajax_form_xml_compras_hdr_validate_tipoidentificacioncomprador();
  scCssBlur(oThis);
}

function sc_form_xml_compras_hdr_tipoidentificacioncomprador_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_xml_compras_hdr_tipoidentificacioncomprador_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_xml_compras_hdr_razonsocialcomprador_onblur(oThis, iSeqRow) {
  do_ajax_form_xml_compras_hdr_validate_razonsocialcomprador();
  scCssBlur(oThis);
}

function sc_form_xml_compras_hdr_razonsocialcomprador_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_xml_compras_hdr_razonsocialcomprador_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_xml_compras_hdr_identificacioncomprador_onblur(oThis, iSeqRow) {
  do_ajax_form_xml_compras_hdr_validate_identificacioncomprador();
  scCssBlur(oThis);
}

function sc_form_xml_compras_hdr_identificacioncomprador_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_xml_compras_hdr_identificacioncomprador_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_xml_compras_hdr_totalsinimpuestos_onblur(oThis, iSeqRow) {
  do_ajax_form_xml_compras_hdr_validate_totalsinimpuestos();
  scCssBlur(oThis);
}

function sc_form_xml_compras_hdr_totalsinimpuestos_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_xml_compras_hdr_totalsinimpuestos_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_xml_compras_hdr_totaldescuento_onblur(oThis, iSeqRow) {
  do_ajax_form_xml_compras_hdr_validate_totaldescuento();
  scCssBlur(oThis);
}

function sc_form_xml_compras_hdr_totaldescuento_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_xml_compras_hdr_totaldescuento_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_xml_compras_hdr_totalconimpuestos_onblur(oThis, iSeqRow) {
  do_ajax_form_xml_compras_hdr_validate_totalconimpuestos();
  scCssBlur(oThis);
}

function sc_form_xml_compras_hdr_totalconimpuestos_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_xml_compras_hdr_totalconimpuestos_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_xml_compras_hdr_propina_onblur(oThis, iSeqRow) {
  do_ajax_form_xml_compras_hdr_validate_propina();
  scCssBlur(oThis);
}

function sc_form_xml_compras_hdr_propina_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_xml_compras_hdr_propina_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_xml_compras_hdr_importetotal_onblur(oThis, iSeqRow) {
  do_ajax_form_xml_compras_hdr_validate_importetotal();
  scCssBlur(oThis);
}

function sc_form_xml_compras_hdr_importetotal_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_xml_compras_hdr_importetotal_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_xml_compras_hdr_moneda_onblur(oThis, iSeqRow) {
  do_ajax_form_xml_compras_hdr_validate_moneda();
  scCssBlur(oThis);
}

function sc_form_xml_compras_hdr_moneda_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_xml_compras_hdr_moneda_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_xml_compras_hdr_fecharegistro_onblur(oThis, iSeqRow) {
  do_ajax_form_xml_compras_hdr_validate_fecharegistro();
  scCssBlur(oThis);
}

function sc_form_xml_compras_hdr_fecharegistro_hora_onblur(oThis, iSeqRow) {
  do_ajax_form_xml_compras_hdr_validate_fecharegistro();
  scCssBlur(oThis);
}

function sc_form_xml_compras_hdr_fecharegistro_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_xml_compras_hdr_fecharegistro_hora_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_xml_compras_hdr_fecharegistro_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_xml_compras_hdr_fecharegistro_hora_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_xml_compras_hdr_estado_onblur(oThis, iSeqRow) {
  do_ajax_form_xml_compras_hdr_validate_estado();
  scCssBlur(oThis);
}

function sc_form_xml_compras_hdr_estado_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_xml_compras_hdr_estado_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function displayChange_block(block, status) {
	if ("0" == block) {
		displayChange_block_0(status);
	}
}

function displayChange_block_0(status) {
	displayChange_field("claveacceso", "", status);
	displayChange_field("ambiente", "", status);
	displayChange_field("tipoemision", "", status);
	displayChange_field("razonsocial", "", status);
	displayChange_field("nombrecomercial", "", status);
	displayChange_field("ruc", "", status);
	displayChange_field("coddoc", "", status);
	displayChange_field("estab", "", status);
	displayChange_field("ptoemi", "", status);
	displayChange_field("secuencial", "", status);
	displayChange_field("dirmatriz", "", status);
	displayChange_field("fechaemision", "", status);
	displayChange_field("tipoidentificacioncomprador", "", status);
	displayChange_field("razonsocialcomprador", "", status);
	displayChange_field("identificacioncomprador", "", status);
	displayChange_field("totalsinimpuestos", "", status);
	displayChange_field("totaldescuento", "", status);
	displayChange_field("totalconimpuestos", "", status);
	displayChange_field("propina", "", status);
	displayChange_field("importetotal", "", status);
	displayChange_field("moneda", "", status);
	displayChange_field("fecharegistro", "", status);
	displayChange_field("estado", "", status);
}

function displayChange_row(row, status) {
	displayChange_field_claveacceso(row, status);
	displayChange_field_ambiente(row, status);
	displayChange_field_tipoemision(row, status);
	displayChange_field_razonsocial(row, status);
	displayChange_field_nombrecomercial(row, status);
	displayChange_field_ruc(row, status);
	displayChange_field_coddoc(row, status);
	displayChange_field_estab(row, status);
	displayChange_field_ptoemi(row, status);
	displayChange_field_secuencial(row, status);
	displayChange_field_dirmatriz(row, status);
	displayChange_field_fechaemision(row, status);
	displayChange_field_tipoidentificacioncomprador(row, status);
	displayChange_field_razonsocialcomprador(row, status);
	displayChange_field_identificacioncomprador(row, status);
	displayChange_field_totalsinimpuestos(row, status);
	displayChange_field_totaldescuento(row, status);
	displayChange_field_totalconimpuestos(row, status);
	displayChange_field_propina(row, status);
	displayChange_field_importetotal(row, status);
	displayChange_field_moneda(row, status);
	displayChange_field_fecharegistro(row, status);
	displayChange_field_estado(row, status);
}

function displayChange_field(field, row, status) {
	if ("claveacceso" == field) {
		displayChange_field_claveacceso(row, status);
	}
	if ("ambiente" == field) {
		displayChange_field_ambiente(row, status);
	}
	if ("tipoemision" == field) {
		displayChange_field_tipoemision(row, status);
	}
	if ("razonsocial" == field) {
		displayChange_field_razonsocial(row, status);
	}
	if ("nombrecomercial" == field) {
		displayChange_field_nombrecomercial(row, status);
	}
	if ("ruc" == field) {
		displayChange_field_ruc(row, status);
	}
	if ("coddoc" == field) {
		displayChange_field_coddoc(row, status);
	}
	if ("estab" == field) {
		displayChange_field_estab(row, status);
	}
	if ("ptoemi" == field) {
		displayChange_field_ptoemi(row, status);
	}
	if ("secuencial" == field) {
		displayChange_field_secuencial(row, status);
	}
	if ("dirmatriz" == field) {
		displayChange_field_dirmatriz(row, status);
	}
	if ("fechaemision" == field) {
		displayChange_field_fechaemision(row, status);
	}
	if ("tipoidentificacioncomprador" == field) {
		displayChange_field_tipoidentificacioncomprador(row, status);
	}
	if ("razonsocialcomprador" == field) {
		displayChange_field_razonsocialcomprador(row, status);
	}
	if ("identificacioncomprador" == field) {
		displayChange_field_identificacioncomprador(row, status);
	}
	if ("totalsinimpuestos" == field) {
		displayChange_field_totalsinimpuestos(row, status);
	}
	if ("totaldescuento" == field) {
		displayChange_field_totaldescuento(row, status);
	}
	if ("totalconimpuestos" == field) {
		displayChange_field_totalconimpuestos(row, status);
	}
	if ("propina" == field) {
		displayChange_field_propina(row, status);
	}
	if ("importetotal" == field) {
		displayChange_field_importetotal(row, status);
	}
	if ("moneda" == field) {
		displayChange_field_moneda(row, status);
	}
	if ("fecharegistro" == field) {
		displayChange_field_fecharegistro(row, status);
	}
	if ("estado" == field) {
		displayChange_field_estado(row, status);
	}
}

function displayChange_field_claveacceso(row, status) {
    var fieldId;
}

function displayChange_field_ambiente(row, status) {
    var fieldId;
}

function displayChange_field_tipoemision(row, status) {
    var fieldId;
}

function displayChange_field_razonsocial(row, status) {
    var fieldId;
}

function displayChange_field_nombrecomercial(row, status) {
    var fieldId;
}

function displayChange_field_ruc(row, status) {
    var fieldId;
}

function displayChange_field_coddoc(row, status) {
    var fieldId;
}

function displayChange_field_estab(row, status) {
    var fieldId;
}

function displayChange_field_ptoemi(row, status) {
    var fieldId;
}

function displayChange_field_secuencial(row, status) {
    var fieldId;
}

function displayChange_field_dirmatriz(row, status) {
    var fieldId;
}

function displayChange_field_fechaemision(row, status) {
    var fieldId;
}

function displayChange_field_tipoidentificacioncomprador(row, status) {
    var fieldId;
}

function displayChange_field_razonsocialcomprador(row, status) {
    var fieldId;
}

function displayChange_field_identificacioncomprador(row, status) {
    var fieldId;
}

function displayChange_field_totalsinimpuestos(row, status) {
    var fieldId;
}

function displayChange_field_totaldescuento(row, status) {
    var fieldId;
}

function displayChange_field_totalconimpuestos(row, status) {
    var fieldId;
}

function displayChange_field_propina(row, status) {
    var fieldId;
}

function displayChange_field_importetotal(row, status) {
    var fieldId;
}

function displayChange_field_moneda(row, status) {
    var fieldId;
}

function displayChange_field_fecharegistro(row, status) {
    var fieldId;
}

function displayChange_field_estado(row, status) {
    var fieldId;
}

function scRecreateSelect2() {
}
function scResetPagesDisplay() {
	$(".sc-form-page").show();
}

function scHidePage(pageNo) {
	$("#id_form_xml_compras_hdr_form" + pageNo).hide();
}

function scCheckNoPageSelected() {
	if (!$(".sc-form-page").filter(".scTabActive").filter(":visible").length) {
		var inactiveTabs = $(".sc-form-page").filter(".scTabInactive").filter(":visible");
		if (inactiveTabs.length) {
			var tabNo = $(inactiveTabs[0]).attr("id").substr(28);
		}
	}
}
var sc_jq_calendar_value = {};

function scJQCalendarAdd(iSeqRow) {
  $("#id_sc_field_fechaemision" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_fechaemision" + iSeqRow] = $oField.val();
    },
    onClose: function(dateText, inst) {
      do_ajax_form_xml_compras_hdr_validate_fechaemision(iSeqRow);
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
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', $_SESSION['scriptcase']['reg_conf']['date_sep']), array('', 'yyyy', ''), $this->field_config['fechaemision']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
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
  $("#id_sc_field_fecharegistro" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_fecharegistro" + iSeqRow] = $oField.val();
      if (2 == aParts.length) {
        sTime = " " + aParts[1];
      }
      if ('' == sTime || ' ' == sTime) {
        sTime = ' <?php echo $this->jqueryCalendarTimeStart($this->field_config['fecharegistro']['date_format']); ?>';
      }
      $oField.datepicker("option", "dateFormat", "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', 'hh', 'ii', 'ss', ':', ';', $_SESSION['scriptcase']['reg_conf']['date_sep'], $_SESSION['scriptcase']['reg_conf']['time_sep']), array('', 'yyyy', '','','', '', '', '', ''), $this->field_config['fecharegistro']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>" + sTime);
    },
    onClose: function(dateText, inst) {
      do_ajax_form_xml_compras_hdr_validate_fecharegistro(iSeqRow);
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
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', 'hh', 'ii', 'ss', ':', ';', $_SESSION['scriptcase']['reg_conf']['date_sep'], $_SESSION['scriptcase']['reg_conf']['time_sep']), array('', 'yyyy', '','','', '', '', '', ''), $this->field_config['fecharegistro']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
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
                         $(t).html("<a href=\"javascript:nm_mostra_doc('0', '"+rs2+"', 'form_xml_compras_hdr')\">"+$('#id_read_on_'+field+iSeqRow).text()+"</a>");
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

