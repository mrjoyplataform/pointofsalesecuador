
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
  scEventControl_data["ctahiscon" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["fechahis" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["tipocomptehis" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["numcomptehis" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["ocurrenciahis" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["nochequehis" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["dethis" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["db1cr2his" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["valorhis" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["sdoctahis" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["uid" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["estado" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["cvtransferhis" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["ctamodulo" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["doccons" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["beneficiario" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["conciliado" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["codcons" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["manualcons" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["cerradocons" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["fechconciliado" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["fechcerrado" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["tipocomptehis_cierre" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["cc01" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["cc02" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["cc03" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["cc04" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["cc05" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["pord" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["idb" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["tipodoc" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["numdoc" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["modulo" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["cvanuladohis" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["identificacion" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["estado_anio" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["numcomptehis_cierre" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["ctahiscon" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["ctahiscon" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["fechahis" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["fechahis" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["tipocomptehis" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["tipocomptehis" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["numcomptehis" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["numcomptehis" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["ocurrenciahis" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["ocurrenciahis" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["nochequehis" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["nochequehis" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["dethis" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["dethis" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["db1cr2his" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["db1cr2his" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["valorhis" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["valorhis" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["sdoctahis" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["sdoctahis" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["uid" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["uid" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["estado" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["estado" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["cvtransferhis" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["cvtransferhis" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["ctamodulo" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["ctamodulo" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["doccons" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["doccons" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["beneficiario" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["beneficiario" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["conciliado" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["conciliado" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["codcons" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["codcons" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["manualcons" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["manualcons" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["cerradocons" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["cerradocons" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["fechconciliado" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["fechconciliado" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["fechcerrado" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["fechcerrado" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["tipocomptehis_cierre" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["tipocomptehis_cierre" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["cc01" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["cc01" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["cc02" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["cc02" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["cc03" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["cc03" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["cc04" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["cc04" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["cc05" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["cc05" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["pord" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["pord" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["idb" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["idb" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["tipodoc" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["tipodoc" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["numdoc" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["numdoc" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["modulo" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["modulo" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["cvanuladohis" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["cvanuladohis" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["identificacion" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["identificacion" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["estado_anio" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["estado_anio" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["numcomptehis_cierre" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["numcomptehis_cierre" + iSeqRow]["change"]) {
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
  $('#id_sc_field_ctahiscon' + iSeqRow).bind('blur', function() { sc_form_movcon_ctahiscon_onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_form_movcon_ctahiscon_onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_movcon_ctahiscon_onfocus(this, iSeqRow) });
  $('#id_sc_field_fechahis' + iSeqRow).bind('blur', function() { sc_form_movcon_fechahis_onblur(this, iSeqRow) })
                                      .bind('change', function() { sc_form_movcon_fechahis_onchange(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_movcon_fechahis_onfocus(this, iSeqRow) });
  $('#id_sc_field_fechahis_hora' + iSeqRow).bind('blur', function() { sc_form_movcon_fechahis_hora_onblur(this, iSeqRow) })
                                           .bind('change', function() { sc_form_movcon_fechahis_hora_onchange(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_movcon_fechahis_hora_onfocus(this, iSeqRow) });
  $('#id_sc_field_tipocomptehis' + iSeqRow).bind('blur', function() { sc_form_movcon_tipocomptehis_onblur(this, iSeqRow) })
                                           .bind('change', function() { sc_form_movcon_tipocomptehis_onchange(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_movcon_tipocomptehis_onfocus(this, iSeqRow) });
  $('#id_sc_field_numcomptehis' + iSeqRow).bind('blur', function() { sc_form_movcon_numcomptehis_onblur(this, iSeqRow) })
                                          .bind('change', function() { sc_form_movcon_numcomptehis_onchange(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_movcon_numcomptehis_onfocus(this, iSeqRow) });
  $('#id_sc_field_ocurrenciahis' + iSeqRow).bind('blur', function() { sc_form_movcon_ocurrenciahis_onblur(this, iSeqRow) })
                                           .bind('change', function() { sc_form_movcon_ocurrenciahis_onchange(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_movcon_ocurrenciahis_onfocus(this, iSeqRow) });
  $('#id_sc_field_nochequehis' + iSeqRow).bind('blur', function() { sc_form_movcon_nochequehis_onblur(this, iSeqRow) })
                                         .bind('change', function() { sc_form_movcon_nochequehis_onchange(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_movcon_nochequehis_onfocus(this, iSeqRow) });
  $('#id_sc_field_dethis' + iSeqRow).bind('blur', function() { sc_form_movcon_dethis_onblur(this, iSeqRow) })
                                    .bind('change', function() { sc_form_movcon_dethis_onchange(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_movcon_dethis_onfocus(this, iSeqRow) });
  $('#id_sc_field_db1cr2his' + iSeqRow).bind('blur', function() { sc_form_movcon_db1cr2his_onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_form_movcon_db1cr2his_onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_movcon_db1cr2his_onfocus(this, iSeqRow) });
  $('#id_sc_field_valorhis' + iSeqRow).bind('blur', function() { sc_form_movcon_valorhis_onblur(this, iSeqRow) })
                                      .bind('change', function() { sc_form_movcon_valorhis_onchange(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_movcon_valorhis_onfocus(this, iSeqRow) });
  $('#id_sc_field_sdoctahis' + iSeqRow).bind('blur', function() { sc_form_movcon_sdoctahis_onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_form_movcon_sdoctahis_onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_movcon_sdoctahis_onfocus(this, iSeqRow) });
  $('#id_sc_field_uid' + iSeqRow).bind('blur', function() { sc_form_movcon_uid_onblur(this, iSeqRow) })
                                 .bind('change', function() { sc_form_movcon_uid_onchange(this, iSeqRow) })
                                 .bind('focus', function() { sc_form_movcon_uid_onfocus(this, iSeqRow) });
  $('#id_sc_field_estado' + iSeqRow).bind('blur', function() { sc_form_movcon_estado_onblur(this, iSeqRow) })
                                    .bind('change', function() { sc_form_movcon_estado_onchange(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_movcon_estado_onfocus(this, iSeqRow) });
  $('#id_sc_field_cvtransferhis' + iSeqRow).bind('blur', function() { sc_form_movcon_cvtransferhis_onblur(this, iSeqRow) })
                                           .bind('change', function() { sc_form_movcon_cvtransferhis_onchange(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_movcon_cvtransferhis_onfocus(this, iSeqRow) });
  $('#id_sc_field_ctamodulo' + iSeqRow).bind('blur', function() { sc_form_movcon_ctamodulo_onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_form_movcon_ctamodulo_onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_movcon_ctamodulo_onfocus(this, iSeqRow) });
  $('#id_sc_field_doccons' + iSeqRow).bind('blur', function() { sc_form_movcon_doccons_onblur(this, iSeqRow) })
                                     .bind('change', function() { sc_form_movcon_doccons_onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_movcon_doccons_onfocus(this, iSeqRow) });
  $('#id_sc_field_beneficiario' + iSeqRow).bind('blur', function() { sc_form_movcon_beneficiario_onblur(this, iSeqRow) })
                                          .bind('change', function() { sc_form_movcon_beneficiario_onchange(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_movcon_beneficiario_onfocus(this, iSeqRow) });
  $('#id_sc_field_conciliado' + iSeqRow).bind('blur', function() { sc_form_movcon_conciliado_onblur(this, iSeqRow) })
                                        .bind('change', function() { sc_form_movcon_conciliado_onchange(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_movcon_conciliado_onfocus(this, iSeqRow) });
  $('#id_sc_field_codcons' + iSeqRow).bind('blur', function() { sc_form_movcon_codcons_onblur(this, iSeqRow) })
                                     .bind('change', function() { sc_form_movcon_codcons_onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_movcon_codcons_onfocus(this, iSeqRow) });
  $('#id_sc_field_manualcons' + iSeqRow).bind('blur', function() { sc_form_movcon_manualcons_onblur(this, iSeqRow) })
                                        .bind('change', function() { sc_form_movcon_manualcons_onchange(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_movcon_manualcons_onfocus(this, iSeqRow) });
  $('#id_sc_field_cerradocons' + iSeqRow).bind('blur', function() { sc_form_movcon_cerradocons_onblur(this, iSeqRow) })
                                         .bind('change', function() { sc_form_movcon_cerradocons_onchange(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_movcon_cerradocons_onfocus(this, iSeqRow) });
  $('#id_sc_field_fechconciliado' + iSeqRow).bind('blur', function() { sc_form_movcon_fechconciliado_onblur(this, iSeqRow) })
                                            .bind('change', function() { sc_form_movcon_fechconciliado_onchange(this, iSeqRow) })
                                            .bind('focus', function() { sc_form_movcon_fechconciliado_onfocus(this, iSeqRow) });
  $('#id_sc_field_fechconciliado_hora' + iSeqRow).bind('blur', function() { sc_form_movcon_fechconciliado_hora_onblur(this, iSeqRow) })
                                                 .bind('change', function() { sc_form_movcon_fechconciliado_hora_onchange(this, iSeqRow) })
                                                 .bind('focus', function() { sc_form_movcon_fechconciliado_hora_onfocus(this, iSeqRow) });
  $('#id_sc_field_fechcerrado' + iSeqRow).bind('blur', function() { sc_form_movcon_fechcerrado_onblur(this, iSeqRow) })
                                         .bind('change', function() { sc_form_movcon_fechcerrado_onchange(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_movcon_fechcerrado_onfocus(this, iSeqRow) });
  $('#id_sc_field_fechcerrado_hora' + iSeqRow).bind('blur', function() { sc_form_movcon_fechcerrado_hora_onblur(this, iSeqRow) })
                                              .bind('change', function() { sc_form_movcon_fechcerrado_hora_onchange(this, iSeqRow) })
                                              .bind('focus', function() { sc_form_movcon_fechcerrado_hora_onfocus(this, iSeqRow) });
  $('#id_sc_field_tipocomptehis_cierre' + iSeqRow).bind('blur', function() { sc_form_movcon_tipocomptehis_cierre_onblur(this, iSeqRow) })
                                                  .bind('change', function() { sc_form_movcon_tipocomptehis_cierre_onchange(this, iSeqRow) })
                                                  .bind('focus', function() { sc_form_movcon_tipocomptehis_cierre_onfocus(this, iSeqRow) });
  $('#id_sc_field_cc01' + iSeqRow).bind('blur', function() { sc_form_movcon_cc01_onblur(this, iSeqRow) })
                                  .bind('change', function() { sc_form_movcon_cc01_onchange(this, iSeqRow) })
                                  .bind('focus', function() { sc_form_movcon_cc01_onfocus(this, iSeqRow) });
  $('#id_sc_field_cc02' + iSeqRow).bind('blur', function() { sc_form_movcon_cc02_onblur(this, iSeqRow) })
                                  .bind('change', function() { sc_form_movcon_cc02_onchange(this, iSeqRow) })
                                  .bind('focus', function() { sc_form_movcon_cc02_onfocus(this, iSeqRow) });
  $('#id_sc_field_cc03' + iSeqRow).bind('blur', function() { sc_form_movcon_cc03_onblur(this, iSeqRow) })
                                  .bind('change', function() { sc_form_movcon_cc03_onchange(this, iSeqRow) })
                                  .bind('focus', function() { sc_form_movcon_cc03_onfocus(this, iSeqRow) });
  $('#id_sc_field_cc04' + iSeqRow).bind('blur', function() { sc_form_movcon_cc04_onblur(this, iSeqRow) })
                                  .bind('change', function() { sc_form_movcon_cc04_onchange(this, iSeqRow) })
                                  .bind('focus', function() { sc_form_movcon_cc04_onfocus(this, iSeqRow) });
  $('#id_sc_field_cc05' + iSeqRow).bind('blur', function() { sc_form_movcon_cc05_onblur(this, iSeqRow) })
                                  .bind('change', function() { sc_form_movcon_cc05_onchange(this, iSeqRow) })
                                  .bind('focus', function() { sc_form_movcon_cc05_onfocus(this, iSeqRow) });
  $('#id_sc_field_pord' + iSeqRow).bind('blur', function() { sc_form_movcon_pord_onblur(this, iSeqRow) })
                                  .bind('change', function() { sc_form_movcon_pord_onchange(this, iSeqRow) })
                                  .bind('focus', function() { sc_form_movcon_pord_onfocus(this, iSeqRow) });
  $('#id_sc_field_idb' + iSeqRow).bind('blur', function() { sc_form_movcon_idb_onblur(this, iSeqRow) })
                                 .bind('change', function() { sc_form_movcon_idb_onchange(this, iSeqRow) })
                                 .bind('focus', function() { sc_form_movcon_idb_onfocus(this, iSeqRow) });
  $('#id_sc_field_tipodoc' + iSeqRow).bind('blur', function() { sc_form_movcon_tipodoc_onblur(this, iSeqRow) })
                                     .bind('change', function() { sc_form_movcon_tipodoc_onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_movcon_tipodoc_onfocus(this, iSeqRow) });
  $('#id_sc_field_numdoc' + iSeqRow).bind('blur', function() { sc_form_movcon_numdoc_onblur(this, iSeqRow) })
                                    .bind('change', function() { sc_form_movcon_numdoc_onchange(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_movcon_numdoc_onfocus(this, iSeqRow) });
  $('#id_sc_field_modulo' + iSeqRow).bind('blur', function() { sc_form_movcon_modulo_onblur(this, iSeqRow) })
                                    .bind('change', function() { sc_form_movcon_modulo_onchange(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_movcon_modulo_onfocus(this, iSeqRow) });
  $('#id_sc_field_cvanuladohis' + iSeqRow).bind('blur', function() { sc_form_movcon_cvanuladohis_onblur(this, iSeqRow) })
                                          .bind('change', function() { sc_form_movcon_cvanuladohis_onchange(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_movcon_cvanuladohis_onfocus(this, iSeqRow) });
  $('#id_sc_field_identificacion' + iSeqRow).bind('blur', function() { sc_form_movcon_identificacion_onblur(this, iSeqRow) })
                                            .bind('change', function() { sc_form_movcon_identificacion_onchange(this, iSeqRow) })
                                            .bind('focus', function() { sc_form_movcon_identificacion_onfocus(this, iSeqRow) });
  $('#id_sc_field_estado_anio' + iSeqRow).bind('blur', function() { sc_form_movcon_estado_anio_onblur(this, iSeqRow) })
                                         .bind('change', function() { sc_form_movcon_estado_anio_onchange(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_movcon_estado_anio_onfocus(this, iSeqRow) });
  $('#id_sc_field_numcomptehis_cierre' + iSeqRow).bind('blur', function() { sc_form_movcon_numcomptehis_cierre_onblur(this, iSeqRow) })
                                                 .bind('change', function() { sc_form_movcon_numcomptehis_cierre_onchange(this, iSeqRow) })
                                                 .bind('focus', function() { sc_form_movcon_numcomptehis_cierre_onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_movcon_ctahiscon_onblur(oThis, iSeqRow) {
  do_ajax_form_movcon_validate_ctahiscon();
  scCssBlur(oThis);
}

function sc_form_movcon_ctahiscon_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_movcon_ctahiscon_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_movcon_fechahis_onblur(oThis, iSeqRow) {
  do_ajax_form_movcon_validate_fechahis();
  scCssBlur(oThis);
}

function sc_form_movcon_fechahis_hora_onblur(oThis, iSeqRow) {
  do_ajax_form_movcon_validate_fechahis();
  scCssBlur(oThis);
}

function sc_form_movcon_fechahis_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_movcon_fechahis_hora_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_movcon_fechahis_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_movcon_fechahis_hora_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_movcon_tipocomptehis_onblur(oThis, iSeqRow) {
  do_ajax_form_movcon_validate_tipocomptehis();
  scCssBlur(oThis);
}

function sc_form_movcon_tipocomptehis_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_movcon_tipocomptehis_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_movcon_numcomptehis_onblur(oThis, iSeqRow) {
  do_ajax_form_movcon_validate_numcomptehis();
  scCssBlur(oThis);
}

function sc_form_movcon_numcomptehis_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_movcon_numcomptehis_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_movcon_ocurrenciahis_onblur(oThis, iSeqRow) {
  do_ajax_form_movcon_validate_ocurrenciahis();
  scCssBlur(oThis);
}

function sc_form_movcon_ocurrenciahis_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_movcon_ocurrenciahis_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_movcon_nochequehis_onblur(oThis, iSeqRow) {
  do_ajax_form_movcon_validate_nochequehis();
  scCssBlur(oThis);
}

function sc_form_movcon_nochequehis_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_movcon_nochequehis_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_movcon_dethis_onblur(oThis, iSeqRow) {
  do_ajax_form_movcon_validate_dethis();
  scCssBlur(oThis);
}

function sc_form_movcon_dethis_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_movcon_dethis_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_movcon_db1cr2his_onblur(oThis, iSeqRow) {
  do_ajax_form_movcon_validate_db1cr2his();
  scCssBlur(oThis);
}

function sc_form_movcon_db1cr2his_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_movcon_db1cr2his_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_movcon_valorhis_onblur(oThis, iSeqRow) {
  do_ajax_form_movcon_validate_valorhis();
  scCssBlur(oThis);
}

function sc_form_movcon_valorhis_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_movcon_valorhis_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_movcon_sdoctahis_onblur(oThis, iSeqRow) {
  do_ajax_form_movcon_validate_sdoctahis();
  scCssBlur(oThis);
}

function sc_form_movcon_sdoctahis_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_movcon_sdoctahis_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_movcon_uid_onblur(oThis, iSeqRow) {
  do_ajax_form_movcon_validate_uid();
  scCssBlur(oThis);
}

function sc_form_movcon_uid_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_movcon_uid_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_movcon_estado_onblur(oThis, iSeqRow) {
  do_ajax_form_movcon_validate_estado();
  scCssBlur(oThis);
}

function sc_form_movcon_estado_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_movcon_estado_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_movcon_cvtransferhis_onblur(oThis, iSeqRow) {
  do_ajax_form_movcon_validate_cvtransferhis();
  scCssBlur(oThis);
}

function sc_form_movcon_cvtransferhis_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_movcon_cvtransferhis_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_movcon_ctamodulo_onblur(oThis, iSeqRow) {
  do_ajax_form_movcon_validate_ctamodulo();
  scCssBlur(oThis);
}

function sc_form_movcon_ctamodulo_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_movcon_ctamodulo_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_movcon_doccons_onblur(oThis, iSeqRow) {
  do_ajax_form_movcon_validate_doccons();
  scCssBlur(oThis);
}

function sc_form_movcon_doccons_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_movcon_doccons_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_movcon_beneficiario_onblur(oThis, iSeqRow) {
  do_ajax_form_movcon_validate_beneficiario();
  scCssBlur(oThis);
}

function sc_form_movcon_beneficiario_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_movcon_beneficiario_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_movcon_conciliado_onblur(oThis, iSeqRow) {
  do_ajax_form_movcon_validate_conciliado();
  scCssBlur(oThis);
}

function sc_form_movcon_conciliado_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_movcon_conciliado_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_movcon_codcons_onblur(oThis, iSeqRow) {
  do_ajax_form_movcon_validate_codcons();
  scCssBlur(oThis);
}

function sc_form_movcon_codcons_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_movcon_codcons_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_movcon_manualcons_onblur(oThis, iSeqRow) {
  do_ajax_form_movcon_validate_manualcons();
  scCssBlur(oThis);
}

function sc_form_movcon_manualcons_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_movcon_manualcons_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_movcon_cerradocons_onblur(oThis, iSeqRow) {
  do_ajax_form_movcon_validate_cerradocons();
  scCssBlur(oThis);
}

function sc_form_movcon_cerradocons_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_movcon_cerradocons_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_movcon_fechconciliado_onblur(oThis, iSeqRow) {
  do_ajax_form_movcon_validate_fechconciliado();
  scCssBlur(oThis);
}

function sc_form_movcon_fechconciliado_hora_onblur(oThis, iSeqRow) {
  do_ajax_form_movcon_validate_fechconciliado();
  scCssBlur(oThis);
}

function sc_form_movcon_fechconciliado_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_movcon_fechconciliado_hora_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_movcon_fechconciliado_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_movcon_fechconciliado_hora_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_movcon_fechcerrado_onblur(oThis, iSeqRow) {
  do_ajax_form_movcon_validate_fechcerrado();
  scCssBlur(oThis);
}

function sc_form_movcon_fechcerrado_hora_onblur(oThis, iSeqRow) {
  do_ajax_form_movcon_validate_fechcerrado();
  scCssBlur(oThis);
}

function sc_form_movcon_fechcerrado_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_movcon_fechcerrado_hora_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_movcon_fechcerrado_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_movcon_fechcerrado_hora_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_movcon_tipocomptehis_cierre_onblur(oThis, iSeqRow) {
  do_ajax_form_movcon_validate_tipocomptehis_cierre();
  scCssBlur(oThis);
}

function sc_form_movcon_tipocomptehis_cierre_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_movcon_tipocomptehis_cierre_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_movcon_cc01_onblur(oThis, iSeqRow) {
  do_ajax_form_movcon_validate_cc01();
  scCssBlur(oThis);
}

function sc_form_movcon_cc01_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_movcon_cc01_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_movcon_cc02_onblur(oThis, iSeqRow) {
  do_ajax_form_movcon_validate_cc02();
  scCssBlur(oThis);
}

function sc_form_movcon_cc02_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_movcon_cc02_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_movcon_cc03_onblur(oThis, iSeqRow) {
  do_ajax_form_movcon_validate_cc03();
  scCssBlur(oThis);
}

function sc_form_movcon_cc03_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_movcon_cc03_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_movcon_cc04_onblur(oThis, iSeqRow) {
  do_ajax_form_movcon_validate_cc04();
  scCssBlur(oThis);
}

function sc_form_movcon_cc04_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_movcon_cc04_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_movcon_cc05_onblur(oThis, iSeqRow) {
  do_ajax_form_movcon_validate_cc05();
  scCssBlur(oThis);
}

function sc_form_movcon_cc05_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_movcon_cc05_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_movcon_pord_onblur(oThis, iSeqRow) {
  do_ajax_form_movcon_validate_pord();
  scCssBlur(oThis);
}

function sc_form_movcon_pord_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_movcon_pord_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_movcon_idb_onblur(oThis, iSeqRow) {
  do_ajax_form_movcon_validate_idb();
  scCssBlur(oThis);
}

function sc_form_movcon_idb_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_movcon_idb_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_movcon_tipodoc_onblur(oThis, iSeqRow) {
  do_ajax_form_movcon_validate_tipodoc();
  scCssBlur(oThis);
}

function sc_form_movcon_tipodoc_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_movcon_tipodoc_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_movcon_numdoc_onblur(oThis, iSeqRow) {
  do_ajax_form_movcon_validate_numdoc();
  scCssBlur(oThis);
}

function sc_form_movcon_numdoc_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_movcon_numdoc_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_movcon_modulo_onblur(oThis, iSeqRow) {
  do_ajax_form_movcon_validate_modulo();
  scCssBlur(oThis);
}

function sc_form_movcon_modulo_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_movcon_modulo_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_movcon_cvanuladohis_onblur(oThis, iSeqRow) {
  do_ajax_form_movcon_validate_cvanuladohis();
  scCssBlur(oThis);
}

function sc_form_movcon_cvanuladohis_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_movcon_cvanuladohis_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_movcon_identificacion_onblur(oThis, iSeqRow) {
  do_ajax_form_movcon_validate_identificacion();
  scCssBlur(oThis);
}

function sc_form_movcon_identificacion_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_movcon_identificacion_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_movcon_estado_anio_onblur(oThis, iSeqRow) {
  do_ajax_form_movcon_validate_estado_anio();
  scCssBlur(oThis);
}

function sc_form_movcon_estado_anio_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_movcon_estado_anio_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_movcon_numcomptehis_cierre_onblur(oThis, iSeqRow) {
  do_ajax_form_movcon_validate_numcomptehis_cierre();
  scCssBlur(oThis);
}

function sc_form_movcon_numcomptehis_cierre_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_movcon_numcomptehis_cierre_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function displayChange_block(block, status) {
	if ("0" == block) {
		displayChange_block_0(status);
	}
}

function displayChange_block_0(status) {
	displayChange_field("ctahiscon", "", status);
	displayChange_field("fechahis", "", status);
	displayChange_field("tipocomptehis", "", status);
	displayChange_field("numcomptehis", "", status);
	displayChange_field("ocurrenciahis", "", status);
	displayChange_field("nochequehis", "", status);
	displayChange_field("dethis", "", status);
	displayChange_field("db1cr2his", "", status);
	displayChange_field("valorhis", "", status);
	displayChange_field("sdoctahis", "", status);
	displayChange_field("uid", "", status);
	displayChange_field("estado", "", status);
	displayChange_field("cvtransferhis", "", status);
	displayChange_field("ctamodulo", "", status);
	displayChange_field("doccons", "", status);
	displayChange_field("beneficiario", "", status);
	displayChange_field("conciliado", "", status);
	displayChange_field("codcons", "", status);
	displayChange_field("manualcons", "", status);
	displayChange_field("cerradocons", "", status);
	displayChange_field("fechconciliado", "", status);
	displayChange_field("fechcerrado", "", status);
	displayChange_field("tipocomptehis_cierre", "", status);
	displayChange_field("cc01", "", status);
	displayChange_field("cc02", "", status);
	displayChange_field("cc03", "", status);
	displayChange_field("cc04", "", status);
	displayChange_field("cc05", "", status);
	displayChange_field("pord", "", status);
	displayChange_field("idb", "", status);
	displayChange_field("tipodoc", "", status);
	displayChange_field("numdoc", "", status);
	displayChange_field("modulo", "", status);
	displayChange_field("cvanuladohis", "", status);
	displayChange_field("identificacion", "", status);
	displayChange_field("estado_anio", "", status);
	displayChange_field("numcomptehis_cierre", "", status);
}

function displayChange_row(row, status) {
	displayChange_field_ctahiscon(row, status);
	displayChange_field_fechahis(row, status);
	displayChange_field_tipocomptehis(row, status);
	displayChange_field_numcomptehis(row, status);
	displayChange_field_ocurrenciahis(row, status);
	displayChange_field_nochequehis(row, status);
	displayChange_field_dethis(row, status);
	displayChange_field_db1cr2his(row, status);
	displayChange_field_valorhis(row, status);
	displayChange_field_sdoctahis(row, status);
	displayChange_field_uid(row, status);
	displayChange_field_estado(row, status);
	displayChange_field_cvtransferhis(row, status);
	displayChange_field_ctamodulo(row, status);
	displayChange_field_doccons(row, status);
	displayChange_field_beneficiario(row, status);
	displayChange_field_conciliado(row, status);
	displayChange_field_codcons(row, status);
	displayChange_field_manualcons(row, status);
	displayChange_field_cerradocons(row, status);
	displayChange_field_fechconciliado(row, status);
	displayChange_field_fechcerrado(row, status);
	displayChange_field_tipocomptehis_cierre(row, status);
	displayChange_field_cc01(row, status);
	displayChange_field_cc02(row, status);
	displayChange_field_cc03(row, status);
	displayChange_field_cc04(row, status);
	displayChange_field_cc05(row, status);
	displayChange_field_pord(row, status);
	displayChange_field_idb(row, status);
	displayChange_field_tipodoc(row, status);
	displayChange_field_numdoc(row, status);
	displayChange_field_modulo(row, status);
	displayChange_field_cvanuladohis(row, status);
	displayChange_field_identificacion(row, status);
	displayChange_field_estado_anio(row, status);
	displayChange_field_numcomptehis_cierre(row, status);
}

function displayChange_field(field, row, status) {
	if ("ctahiscon" == field) {
		displayChange_field_ctahiscon(row, status);
	}
	if ("fechahis" == field) {
		displayChange_field_fechahis(row, status);
	}
	if ("tipocomptehis" == field) {
		displayChange_field_tipocomptehis(row, status);
	}
	if ("numcomptehis" == field) {
		displayChange_field_numcomptehis(row, status);
	}
	if ("ocurrenciahis" == field) {
		displayChange_field_ocurrenciahis(row, status);
	}
	if ("nochequehis" == field) {
		displayChange_field_nochequehis(row, status);
	}
	if ("dethis" == field) {
		displayChange_field_dethis(row, status);
	}
	if ("db1cr2his" == field) {
		displayChange_field_db1cr2his(row, status);
	}
	if ("valorhis" == field) {
		displayChange_field_valorhis(row, status);
	}
	if ("sdoctahis" == field) {
		displayChange_field_sdoctahis(row, status);
	}
	if ("uid" == field) {
		displayChange_field_uid(row, status);
	}
	if ("estado" == field) {
		displayChange_field_estado(row, status);
	}
	if ("cvtransferhis" == field) {
		displayChange_field_cvtransferhis(row, status);
	}
	if ("ctamodulo" == field) {
		displayChange_field_ctamodulo(row, status);
	}
	if ("doccons" == field) {
		displayChange_field_doccons(row, status);
	}
	if ("beneficiario" == field) {
		displayChange_field_beneficiario(row, status);
	}
	if ("conciliado" == field) {
		displayChange_field_conciliado(row, status);
	}
	if ("codcons" == field) {
		displayChange_field_codcons(row, status);
	}
	if ("manualcons" == field) {
		displayChange_field_manualcons(row, status);
	}
	if ("cerradocons" == field) {
		displayChange_field_cerradocons(row, status);
	}
	if ("fechconciliado" == field) {
		displayChange_field_fechconciliado(row, status);
	}
	if ("fechcerrado" == field) {
		displayChange_field_fechcerrado(row, status);
	}
	if ("tipocomptehis_cierre" == field) {
		displayChange_field_tipocomptehis_cierre(row, status);
	}
	if ("cc01" == field) {
		displayChange_field_cc01(row, status);
	}
	if ("cc02" == field) {
		displayChange_field_cc02(row, status);
	}
	if ("cc03" == field) {
		displayChange_field_cc03(row, status);
	}
	if ("cc04" == field) {
		displayChange_field_cc04(row, status);
	}
	if ("cc05" == field) {
		displayChange_field_cc05(row, status);
	}
	if ("pord" == field) {
		displayChange_field_pord(row, status);
	}
	if ("idb" == field) {
		displayChange_field_idb(row, status);
	}
	if ("tipodoc" == field) {
		displayChange_field_tipodoc(row, status);
	}
	if ("numdoc" == field) {
		displayChange_field_numdoc(row, status);
	}
	if ("modulo" == field) {
		displayChange_field_modulo(row, status);
	}
	if ("cvanuladohis" == field) {
		displayChange_field_cvanuladohis(row, status);
	}
	if ("identificacion" == field) {
		displayChange_field_identificacion(row, status);
	}
	if ("estado_anio" == field) {
		displayChange_field_estado_anio(row, status);
	}
	if ("numcomptehis_cierre" == field) {
		displayChange_field_numcomptehis_cierre(row, status);
	}
}

function displayChange_field_ctahiscon(row, status) {
    var fieldId;
}

function displayChange_field_fechahis(row, status) {
    var fieldId;
}

function displayChange_field_tipocomptehis(row, status) {
    var fieldId;
}

function displayChange_field_numcomptehis(row, status) {
    var fieldId;
}

function displayChange_field_ocurrenciahis(row, status) {
    var fieldId;
}

function displayChange_field_nochequehis(row, status) {
    var fieldId;
}

function displayChange_field_dethis(row, status) {
    var fieldId;
}

function displayChange_field_db1cr2his(row, status) {
    var fieldId;
}

function displayChange_field_valorhis(row, status) {
    var fieldId;
}

function displayChange_field_sdoctahis(row, status) {
    var fieldId;
}

function displayChange_field_uid(row, status) {
    var fieldId;
}

function displayChange_field_estado(row, status) {
    var fieldId;
}

function displayChange_field_cvtransferhis(row, status) {
    var fieldId;
}

function displayChange_field_ctamodulo(row, status) {
    var fieldId;
}

function displayChange_field_doccons(row, status) {
    var fieldId;
}

function displayChange_field_beneficiario(row, status) {
    var fieldId;
}

function displayChange_field_conciliado(row, status) {
    var fieldId;
}

function displayChange_field_codcons(row, status) {
    var fieldId;
}

function displayChange_field_manualcons(row, status) {
    var fieldId;
}

function displayChange_field_cerradocons(row, status) {
    var fieldId;
}

function displayChange_field_fechconciliado(row, status) {
    var fieldId;
}

function displayChange_field_fechcerrado(row, status) {
    var fieldId;
}

function displayChange_field_tipocomptehis_cierre(row, status) {
    var fieldId;
}

function displayChange_field_cc01(row, status) {
    var fieldId;
}

function displayChange_field_cc02(row, status) {
    var fieldId;
}

function displayChange_field_cc03(row, status) {
    var fieldId;
}

function displayChange_field_cc04(row, status) {
    var fieldId;
}

function displayChange_field_cc05(row, status) {
    var fieldId;
}

function displayChange_field_pord(row, status) {
    var fieldId;
}

function displayChange_field_idb(row, status) {
    var fieldId;
}

function displayChange_field_tipodoc(row, status) {
    var fieldId;
}

function displayChange_field_numdoc(row, status) {
    var fieldId;
}

function displayChange_field_modulo(row, status) {
    var fieldId;
}

function displayChange_field_cvanuladohis(row, status) {
    var fieldId;
}

function displayChange_field_identificacion(row, status) {
    var fieldId;
}

function displayChange_field_estado_anio(row, status) {
    var fieldId;
}

function displayChange_field_numcomptehis_cierre(row, status) {
    var fieldId;
}

function scRecreateSelect2() {
}
function scResetPagesDisplay() {
	$(".sc-form-page").show();
}

function scHidePage(pageNo) {
	$("#id_form_movcon_form" + pageNo).hide();
}

function scCheckNoPageSelected() {
	if (!$(".sc-form-page").filter(".scTabActive").filter(":visible").length) {
		var inactiveTabs = $(".sc-form-page").filter(".scTabInactive").filter(":visible");
		if (inactiveTabs.length) {
			var tabNo = $(inactiveTabs[0]).attr("id").substr(19);
		}
	}
}
var sc_jq_calendar_value = {};

function scJQCalendarAdd(iSeqRow) {
  $("#id_sc_field_fechahis" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_fechahis" + iSeqRow] = $oField.val();
      if (2 == aParts.length) {
        sTime = " " + aParts[1];
      }
      if ('' == sTime || ' ' == sTime) {
        sTime = ' <?php echo $this->jqueryCalendarTimeStart($this->field_config['fechahis']['date_format']); ?>';
      }
      $oField.datepicker("option", "dateFormat", "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', 'hh', 'ii', 'ss', ':', ';', $_SESSION['scriptcase']['reg_conf']['date_sep'], $_SESSION['scriptcase']['reg_conf']['time_sep']), array('', 'yyyy', '','','', '', '', '', ''), $this->field_config['fechahis']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>" + sTime);
    },
    onClose: function(dateText, inst) {
      do_ajax_form_movcon_validate_fechahis(iSeqRow);
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
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', 'hh', 'ii', 'ss', ':', ';', $_SESSION['scriptcase']['reg_conf']['date_sep'], $_SESSION['scriptcase']['reg_conf']['time_sep']), array('', 'yyyy', '','','', '', '', '', ''), $this->field_config['fechahis']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
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
  $("#id_sc_field_fechconciliado" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_fechconciliado" + iSeqRow] = $oField.val();
      if (2 == aParts.length) {
        sTime = " " + aParts[1];
      }
      if ('' == sTime || ' ' == sTime) {
        sTime = ' <?php echo $this->jqueryCalendarTimeStart($this->field_config['fechconciliado']['date_format']); ?>';
      }
      $oField.datepicker("option", "dateFormat", "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', 'hh', 'ii', 'ss', ':', ';', $_SESSION['scriptcase']['reg_conf']['date_sep'], $_SESSION['scriptcase']['reg_conf']['time_sep']), array('', 'yyyy', '','','', '', '', '', ''), $this->field_config['fechconciliado']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>" + sTime);
    },
    onClose: function(dateText, inst) {
      do_ajax_form_movcon_validate_fechconciliado(iSeqRow);
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
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', 'hh', 'ii', 'ss', ':', ';', $_SESSION['scriptcase']['reg_conf']['date_sep'], $_SESSION['scriptcase']['reg_conf']['time_sep']), array('', 'yyyy', '','','', '', '', '', ''), $this->field_config['fechconciliado']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
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
  $("#id_sc_field_fechcerrado" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_fechcerrado" + iSeqRow] = $oField.val();
      if (2 == aParts.length) {
        sTime = " " + aParts[1];
      }
      if ('' == sTime || ' ' == sTime) {
        sTime = ' <?php echo $this->jqueryCalendarTimeStart($this->field_config['fechcerrado']['date_format']); ?>';
      }
      $oField.datepicker("option", "dateFormat", "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', 'hh', 'ii', 'ss', ':', ';', $_SESSION['scriptcase']['reg_conf']['date_sep'], $_SESSION['scriptcase']['reg_conf']['time_sep']), array('', 'yyyy', '','','', '', '', '', ''), $this->field_config['fechcerrado']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>" + sTime);
    },
    onClose: function(dateText, inst) {
      do_ajax_form_movcon_validate_fechcerrado(iSeqRow);
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
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', 'hh', 'ii', 'ss', ':', ';', $_SESSION['scriptcase']['reg_conf']['date_sep'], $_SESSION['scriptcase']['reg_conf']['time_sep']), array('', 'yyyy', '','','', '', '', '', ''), $this->field_config['fechcerrado']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
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
                         $(t).html("<a href=\"javascript:nm_mostra_doc('0', '"+rs2+"', 'form_movcon')\">"+$('#id_read_on_'+field+iSeqRow).text()+"</a>");
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

