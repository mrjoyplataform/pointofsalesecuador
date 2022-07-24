
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
  scEventControl_data["product_name_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["id_category_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["product_code_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["dateproduct_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["product_cost_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["stock_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["product_value_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["discount_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["poriva_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["cuentaventa_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["unidad_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["tipoitem_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["cuentacompra_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["precioventa_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["puntoventa_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["id_status_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["image_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["entrada_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["service_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["kiosko_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["jugador_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["visitante_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["minutos_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["tarjeta_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["tokens_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["comida_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["score_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["product_name_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["product_name_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["id_category_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["id_category_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["product_code_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["product_code_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["dateproduct_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["dateproduct_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["product_cost_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["product_cost_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["stock_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["stock_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["product_value_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["product_value_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["discount_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["discount_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["poriva_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["poriva_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["cuentaventa_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["cuentaventa_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["unidad_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["unidad_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["tipoitem_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["tipoitem_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["cuentacompra_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["cuentacompra_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["precioventa_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["precioventa_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["puntoventa_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["puntoventa_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["id_status_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["id_status_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["entrada_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["entrada_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["service_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["service_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["kiosko_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["kiosko_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["jugador_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["jugador_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["visitante_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["visitante_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["minutos_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["minutos_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["tarjeta_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["tarjeta_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["tokens_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["tokens_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["comida_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["comida_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["score_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["score_" + iSeqRow]["change"]) {
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
  if ("id_category_" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("id_status_" + iSeq == fieldName) {
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
  $('#id_sc_field_id_product_' + iSeqRow).bind('change', function() { sc_form_product_edit_masivo_id_product__onchange(this, iSeqRow) });
  $('#id_sc_field_product_name_' + iSeqRow).bind('blur', function() { sc_form_product_edit_masivo_product_name__onblur(this, iSeqRow) })
                                           .bind('change', function() { sc_form_product_edit_masivo_product_name__onchange(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_product_edit_masivo_product_name__onfocus(this, iSeqRow) });
  $('#id_sc_field_product_code_' + iSeqRow).bind('blur', function() { sc_form_product_edit_masivo_product_code__onblur(this, iSeqRow) })
                                           .bind('change', function() { sc_form_product_edit_masivo_product_code__onchange(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_product_edit_masivo_product_code__onfocus(this, iSeqRow) });
  $('#id_sc_field_id_status_' + iSeqRow).bind('blur', function() { sc_form_product_edit_masivo_id_status__onblur(this, iSeqRow) })
                                        .bind('change', function() { sc_form_product_edit_masivo_id_status__onchange(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_product_edit_masivo_id_status__onfocus(this, iSeqRow) });
  $('#id_sc_field_dateproduct_' + iSeqRow).bind('blur', function() { sc_form_product_edit_masivo_dateproduct__onblur(this, iSeqRow) })
                                          .bind('change', function() { sc_form_product_edit_masivo_dateproduct__onchange(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_product_edit_masivo_dateproduct__onfocus(this, iSeqRow) });
  $('#id_sc_field_dateproduct__hora' + iSeqRow).bind('blur', function() { sc_form_product_edit_masivo_dateproduct__hora_onblur(this, iSeqRow) })
                                               .bind('change', function() { sc_form_product_edit_masivo_dateproduct__hora_onchange(this, iSeqRow) })
                                               .bind('focus', function() { sc_form_product_edit_masivo_dateproduct__hora_onfocus(this, iSeqRow) });
  $('#id_sc_field_product_value_' + iSeqRow).bind('blur', function() { sc_form_product_edit_masivo_product_value__onblur(this, iSeqRow) })
                                            .bind('change', function() { sc_form_product_edit_masivo_product_value__onchange(this, iSeqRow) })
                                            .bind('focus', function() { sc_form_product_edit_masivo_product_value__onfocus(this, iSeqRow) });
  $('#id_sc_field_product_cost_' + iSeqRow).bind('blur', function() { sc_form_product_edit_masivo_product_cost__onblur(this, iSeqRow) })
                                           .bind('change', function() { sc_form_product_edit_masivo_product_cost__onchange(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_product_edit_masivo_product_cost__onfocus(this, iSeqRow) });
  $('#id_sc_field_discount_' + iSeqRow).bind('blur', function() { sc_form_product_edit_masivo_discount__onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_form_product_edit_masivo_discount__onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_product_edit_masivo_discount__onfocus(this, iSeqRow) });
  $('#id_sc_field_stock_' + iSeqRow).bind('blur', function() { sc_form_product_edit_masivo_stock__onblur(this, iSeqRow) })
                                    .bind('change', function() { sc_form_product_edit_masivo_stock__onchange(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_product_edit_masivo_stock__onfocus(this, iSeqRow) });
  $('#id_sc_field_id_category_' + iSeqRow).bind('blur', function() { sc_form_product_edit_masivo_id_category__onblur(this, iSeqRow) })
                                          .bind('change', function() { sc_form_product_edit_masivo_id_category__onchange(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_product_edit_masivo_id_category__onfocus(this, iSeqRow) });
  $('#id_sc_field_image_' + iSeqRow).bind('blur', function() { sc_form_product_edit_masivo_image__onblur(this, iSeqRow) })
                                    .bind('change', function() { sc_form_product_edit_masivo_image__onchange(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_product_edit_masivo_image__onfocus(this, iSeqRow) });
  $('#id_sc_field_service_' + iSeqRow).bind('blur', function() { sc_form_product_edit_masivo_service__onblur(this, iSeqRow) })
                                      .bind('change', function() { sc_form_product_edit_masivo_service__onchange(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_product_edit_masivo_service__onfocus(this, iSeqRow) });
  $('#id_sc_field_kiosko_' + iSeqRow).bind('blur', function() { sc_form_product_edit_masivo_kiosko__onblur(this, iSeqRow) })
                                     .bind('change', function() { sc_form_product_edit_masivo_kiosko__onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_product_edit_masivo_kiosko__onfocus(this, iSeqRow) });
  $('#id_sc_field_entrada_' + iSeqRow).bind('blur', function() { sc_form_product_edit_masivo_entrada__onblur(this, iSeqRow) })
                                      .bind('change', function() { sc_form_product_edit_masivo_entrada__onchange(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_product_edit_masivo_entrada__onfocus(this, iSeqRow) });
  $('#id_sc_field_jugador_' + iSeqRow).bind('blur', function() { sc_form_product_edit_masivo_jugador__onblur(this, iSeqRow) })
                                      .bind('change', function() { sc_form_product_edit_masivo_jugador__onchange(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_product_edit_masivo_jugador__onfocus(this, iSeqRow) });
  $('#id_sc_field_visitante_' + iSeqRow).bind('blur', function() { sc_form_product_edit_masivo_visitante__onblur(this, iSeqRow) })
                                        .bind('change', function() { sc_form_product_edit_masivo_visitante__onchange(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_product_edit_masivo_visitante__onfocus(this, iSeqRow) });
  $('#id_sc_field_tarjeta_' + iSeqRow).bind('blur', function() { sc_form_product_edit_masivo_tarjeta__onblur(this, iSeqRow) })
                                      .bind('change', function() { sc_form_product_edit_masivo_tarjeta__onchange(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_product_edit_masivo_tarjeta__onfocus(this, iSeqRow) });
  $('#id_sc_field_minutos_' + iSeqRow).bind('blur', function() { sc_form_product_edit_masivo_minutos__onblur(this, iSeqRow) })
                                      .bind('change', function() { sc_form_product_edit_masivo_minutos__onchange(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_product_edit_masivo_minutos__onfocus(this, iSeqRow) });
  $('#id_sc_field_tokens_' + iSeqRow).bind('blur', function() { sc_form_product_edit_masivo_tokens__onblur(this, iSeqRow) })
                                     .bind('change', function() { sc_form_product_edit_masivo_tokens__onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_product_edit_masivo_tokens__onfocus(this, iSeqRow) });
  $('#id_sc_field_comida_' + iSeqRow).bind('blur', function() { sc_form_product_edit_masivo_comida__onblur(this, iSeqRow) })
                                     .bind('change', function() { sc_form_product_edit_masivo_comida__onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_product_edit_masivo_comida__onfocus(this, iSeqRow) });
  $('#id_sc_field_score_' + iSeqRow).bind('blur', function() { sc_form_product_edit_masivo_score__onblur(this, iSeqRow) })
                                    .bind('change', function() { sc_form_product_edit_masivo_score__onchange(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_product_edit_masivo_score__onfocus(this, iSeqRow) });
  $('#id_sc_field_poriva_' + iSeqRow).bind('blur', function() { sc_form_product_edit_masivo_poriva__onblur(this, iSeqRow) })
                                     .bind('change', function() { sc_form_product_edit_masivo_poriva__onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_product_edit_masivo_poriva__onfocus(this, iSeqRow) });
  $('#id_sc_field_cuentaventa_' + iSeqRow).bind('blur', function() { sc_form_product_edit_masivo_cuentaventa__onblur(this, iSeqRow) })
                                          .bind('change', function() { sc_form_product_edit_masivo_cuentaventa__onchange(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_product_edit_masivo_cuentaventa__onfocus(this, iSeqRow) });
  $('#id_sc_field_unidad_' + iSeqRow).bind('blur', function() { sc_form_product_edit_masivo_unidad__onblur(this, iSeqRow) })
                                     .bind('change', function() { sc_form_product_edit_masivo_unidad__onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_product_edit_masivo_unidad__onfocus(this, iSeqRow) });
  $('#id_sc_field_tipoitem_' + iSeqRow).bind('blur', function() { sc_form_product_edit_masivo_tipoitem__onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_form_product_edit_masivo_tipoitem__onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_product_edit_masivo_tipoitem__onfocus(this, iSeqRow) });
  $('#id_sc_field_cuentacompra_' + iSeqRow).bind('blur', function() { sc_form_product_edit_masivo_cuentacompra__onblur(this, iSeqRow) })
                                           .bind('change', function() { sc_form_product_edit_masivo_cuentacompra__onchange(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_product_edit_masivo_cuentacompra__onfocus(this, iSeqRow) });
  $('#id_sc_field_precioventa_' + iSeqRow).bind('blur', function() { sc_form_product_edit_masivo_precioventa__onblur(this, iSeqRow) })
                                          .bind('change', function() { sc_form_product_edit_masivo_precioventa__onchange(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_product_edit_masivo_precioventa__onfocus(this, iSeqRow) });
  $('#id_sc_field_puntoventa_' + iSeqRow).bind('blur', function() { sc_form_product_edit_masivo_puntoventa__onblur(this, iSeqRow) })
                                         .bind('change', function() { sc_form_product_edit_masivo_puntoventa__onchange(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_product_edit_masivo_puntoventa__onfocus(this, iSeqRow) });
  $('.sc-ui-radio-puntoventa_' + iSeqRow).on('click', function() { scMarkFormAsChanged(); });
  $('.sc-ui-radio-entrada_' + iSeqRow).on('click', function() { scMarkFormAsChanged(); });
  $('.sc-ui-radio-service_' + iSeqRow).on('click', function() { scMarkFormAsChanged(); });
  $('.sc-ui-radio-kiosko_' + iSeqRow).on('click', function() { scMarkFormAsChanged(); });
  $('.sc-ui-radio-jugador_' + iSeqRow).on('click', function() { scMarkFormAsChanged(); });
  $('.sc-ui-radio-visitante_' + iSeqRow).on('click', function() { scMarkFormAsChanged(); });
  $('.sc-ui-radio-tarjeta_' + iSeqRow).on('click', function() { scMarkFormAsChanged(); });
  $('.sc-ui-radio-comida_' + iSeqRow).on('click', function() { scMarkFormAsChanged(); });
} // scJQEventsAdd

function sc_form_product_edit_masivo_id_product__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_product_edit_masivo_product_name__onblur(oThis, iSeqRow) {
  do_ajax_form_product_edit_masivo_validate_product_name_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_product_edit_masivo_product_name__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  nm_check_insert(iSeqRow);
}

function sc_form_product_edit_masivo_product_name__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_product_edit_masivo_product_code__onblur(oThis, iSeqRow) {
  do_ajax_form_product_edit_masivo_validate_product_code_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_product_edit_masivo_product_code__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  nm_check_insert(iSeqRow);
}

function sc_form_product_edit_masivo_product_code__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_product_edit_masivo_id_status__onblur(oThis, iSeqRow) {
  do_ajax_form_product_edit_masivo_validate_id_status_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_product_edit_masivo_id_status__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  nm_check_insert(iSeqRow);
}

function sc_form_product_edit_masivo_id_status__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_product_edit_masivo_dateproduct__onblur(oThis, iSeqRow) {
  do_ajax_form_product_edit_masivo_validate_dateproduct_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_product_edit_masivo_dateproduct__hora_onblur(oThis, iSeqRow) {
  do_ajax_form_product_edit_masivo_validate_dateproduct_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_product_edit_masivo_dateproduct__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  nm_check_insert(iSeqRow);
}

function sc_form_product_edit_masivo_dateproduct__hora_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  nm_check_insert(iSeqRow);
}

function sc_form_product_edit_masivo_dateproduct__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_product_edit_masivo_dateproduct__hora_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_product_edit_masivo_product_value__onblur(oThis, iSeqRow) {
  do_ajax_form_product_edit_masivo_validate_product_value_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_product_edit_masivo_product_value__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  nm_check_insert(iSeqRow);
}

function sc_form_product_edit_masivo_product_value__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_product_edit_masivo_product_cost__onblur(oThis, iSeqRow) {
  do_ajax_form_product_edit_masivo_validate_product_cost_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_product_edit_masivo_product_cost__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  nm_check_insert(iSeqRow);
}

function sc_form_product_edit_masivo_product_cost__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_product_edit_masivo_discount__onblur(oThis, iSeqRow) {
  do_ajax_form_product_edit_masivo_validate_discount_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_product_edit_masivo_discount__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  nm_check_insert(iSeqRow);
}

function sc_form_product_edit_masivo_discount__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_product_edit_masivo_stock__onblur(oThis, iSeqRow) {
  do_ajax_form_product_edit_masivo_validate_stock_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_product_edit_masivo_stock__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  nm_check_insert(iSeqRow);
}

function sc_form_product_edit_masivo_stock__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_product_edit_masivo_id_category__onblur(oThis, iSeqRow) {
  do_ajax_form_product_edit_masivo_validate_id_category_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_product_edit_masivo_id_category__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  nm_check_insert(iSeqRow);
}

function sc_form_product_edit_masivo_id_category__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_product_edit_masivo_image__onblur(oThis, iSeqRow) {
  scCssBlur(oThis, iSeqRow);
}

function sc_form_product_edit_masivo_image__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  nm_check_insert(iSeqRow);
}

function sc_form_product_edit_masivo_image__onfocus(oThis, iSeqRow) {
  scCssFocus(oThis, iSeqRow);
}

function sc_form_product_edit_masivo_service__onblur(oThis, iSeqRow) {
  do_ajax_form_product_edit_masivo_validate_service_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_product_edit_masivo_service__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  nm_check_insert(iSeqRow);
}

function sc_form_product_edit_masivo_service__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_product_edit_masivo_kiosko__onblur(oThis, iSeqRow) {
  do_ajax_form_product_edit_masivo_validate_kiosko_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_product_edit_masivo_kiosko__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  nm_check_insert(iSeqRow);
}

function sc_form_product_edit_masivo_kiosko__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_product_edit_masivo_entrada__onblur(oThis, iSeqRow) {
  do_ajax_form_product_edit_masivo_validate_entrada_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_product_edit_masivo_entrada__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  nm_check_insert(iSeqRow);
}

function sc_form_product_edit_masivo_entrada__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_product_edit_masivo_jugador__onblur(oThis, iSeqRow) {
  do_ajax_form_product_edit_masivo_validate_jugador_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_product_edit_masivo_jugador__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  nm_check_insert(iSeqRow);
}

function sc_form_product_edit_masivo_jugador__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_product_edit_masivo_visitante__onblur(oThis, iSeqRow) {
  do_ajax_form_product_edit_masivo_validate_visitante_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_product_edit_masivo_visitante__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  nm_check_insert(iSeqRow);
}

function sc_form_product_edit_masivo_visitante__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_product_edit_masivo_tarjeta__onblur(oThis, iSeqRow) {
  do_ajax_form_product_edit_masivo_validate_tarjeta_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_product_edit_masivo_tarjeta__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  nm_check_insert(iSeqRow);
}

function sc_form_product_edit_masivo_tarjeta__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_product_edit_masivo_minutos__onblur(oThis, iSeqRow) {
  do_ajax_form_product_edit_masivo_validate_minutos_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_product_edit_masivo_minutos__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  nm_check_insert(iSeqRow);
}

function sc_form_product_edit_masivo_minutos__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_product_edit_masivo_tokens__onblur(oThis, iSeqRow) {
  do_ajax_form_product_edit_masivo_validate_tokens_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_product_edit_masivo_tokens__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  nm_check_insert(iSeqRow);
}

function sc_form_product_edit_masivo_tokens__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_product_edit_masivo_comida__onblur(oThis, iSeqRow) {
  do_ajax_form_product_edit_masivo_validate_comida_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_product_edit_masivo_comida__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  nm_check_insert(iSeqRow);
}

function sc_form_product_edit_masivo_comida__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_product_edit_masivo_score__onblur(oThis, iSeqRow) {
  do_ajax_form_product_edit_masivo_validate_score_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_product_edit_masivo_score__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  nm_check_insert(iSeqRow);
}

function sc_form_product_edit_masivo_score__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_product_edit_masivo_poriva__onblur(oThis, iSeqRow) {
  do_ajax_form_product_edit_masivo_validate_poriva_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_product_edit_masivo_poriva__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  nm_check_insert(iSeqRow);
}

function sc_form_product_edit_masivo_poriva__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_product_edit_masivo_cuentaventa__onblur(oThis, iSeqRow) {
  do_ajax_form_product_edit_masivo_validate_cuentaventa_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_product_edit_masivo_cuentaventa__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  nm_check_insert(iSeqRow);
}

function sc_form_product_edit_masivo_cuentaventa__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_product_edit_masivo_unidad__onblur(oThis, iSeqRow) {
  do_ajax_form_product_edit_masivo_validate_unidad_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_product_edit_masivo_unidad__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  nm_check_insert(iSeqRow);
}

function sc_form_product_edit_masivo_unidad__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_product_edit_masivo_tipoitem__onblur(oThis, iSeqRow) {
  do_ajax_form_product_edit_masivo_validate_tipoitem_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_product_edit_masivo_tipoitem__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  nm_check_insert(iSeqRow);
}

function sc_form_product_edit_masivo_tipoitem__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_product_edit_masivo_cuentacompra__onblur(oThis, iSeqRow) {
  do_ajax_form_product_edit_masivo_validate_cuentacompra_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_product_edit_masivo_cuentacompra__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  nm_check_insert(iSeqRow);
}

function sc_form_product_edit_masivo_cuentacompra__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_product_edit_masivo_precioventa__onblur(oThis, iSeqRow) {
  do_ajax_form_product_edit_masivo_validate_precioventa_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_product_edit_masivo_precioventa__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  nm_check_insert(iSeqRow);
}

function sc_form_product_edit_masivo_precioventa__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_product_edit_masivo_puntoventa__onblur(oThis, iSeqRow) {
  do_ajax_form_product_edit_masivo_validate_puntoventa_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_product_edit_masivo_puntoventa__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  nm_check_insert(iSeqRow);
}

function sc_form_product_edit_masivo_puntoventa__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function displayChange_block(block, status) {
	if ("0" == block) {
		displayChange_block_0(status);
	}
	if ("1" == block) {
		displayChange_block_1(status);
	}
	if ("2" == block) {
		displayChange_block_2(status);
	}
}

function displayChange_block_0(status) {
	displayChange_field("product_name_", "", status);
	displayChange_field("id_category_", "", status);
	displayChange_field("product_code_", "", status);
	displayChange_field("dateproduct_", "", status);
	displayChange_field("product_cost_", "", status);
	displayChange_field("stock_", "", status);
	displayChange_field("product_value_", "", status);
	displayChange_field("discount_", "", status);
	displayChange_field("poriva_", "", status);
	displayChange_field("cuentaventa_", "", status);
	displayChange_field("unidad_", "", status);
	displayChange_field("tipoitem_", "", status);
	displayChange_field("cuentacompra_", "", status);
	displayChange_field("precioventa_", "", status);
	displayChange_field("puntoventa_", "", status);
	displayChange_field("id_status_", "", status);
}

function displayChange_block_1(status) {
	displayChange_field("image_", "", status);
}

function displayChange_block_2(status) {
	displayChange_field("entrada_", "", status);
	displayChange_field("service_", "", status);
	displayChange_field("kiosko_", "", status);
	displayChange_field("jugador_", "", status);
	displayChange_field("visitante_", "", status);
	displayChange_field("minutos_", "", status);
	displayChange_field("tarjeta_", "", status);
	displayChange_field("tokens_", "", status);
	displayChange_field("comida_", "", status);
	displayChange_field("score_", "", status);
}

function displayChange_row(row, status) {
	displayChange_field_product_name_(row, status);
	displayChange_field_id_category_(row, status);
	displayChange_field_product_code_(row, status);
	displayChange_field_dateproduct_(row, status);
	displayChange_field_product_cost_(row, status);
	displayChange_field_stock_(row, status);
	displayChange_field_product_value_(row, status);
	displayChange_field_discount_(row, status);
	displayChange_field_poriva_(row, status);
	displayChange_field_cuentaventa_(row, status);
	displayChange_field_unidad_(row, status);
	displayChange_field_tipoitem_(row, status);
	displayChange_field_cuentacompra_(row, status);
	displayChange_field_precioventa_(row, status);
	displayChange_field_puntoventa_(row, status);
	displayChange_field_id_status_(row, status);
	displayChange_field_image_(row, status);
	displayChange_field_entrada_(row, status);
	displayChange_field_service_(row, status);
	displayChange_field_kiosko_(row, status);
	displayChange_field_jugador_(row, status);
	displayChange_field_visitante_(row, status);
	displayChange_field_minutos_(row, status);
	displayChange_field_tarjeta_(row, status);
	displayChange_field_tokens_(row, status);
	displayChange_field_comida_(row, status);
	displayChange_field_score_(row, status);
}

function displayChange_field(field, row, status) {
	if ("product_name_" == field) {
		displayChange_field_product_name_(row, status);
	}
	if ("id_category_" == field) {
		displayChange_field_id_category_(row, status);
	}
	if ("product_code_" == field) {
		displayChange_field_product_code_(row, status);
	}
	if ("dateproduct_" == field) {
		displayChange_field_dateproduct_(row, status);
	}
	if ("product_cost_" == field) {
		displayChange_field_product_cost_(row, status);
	}
	if ("stock_" == field) {
		displayChange_field_stock_(row, status);
	}
	if ("product_value_" == field) {
		displayChange_field_product_value_(row, status);
	}
	if ("discount_" == field) {
		displayChange_field_discount_(row, status);
	}
	if ("poriva_" == field) {
		displayChange_field_poriva_(row, status);
	}
	if ("cuentaventa_" == field) {
		displayChange_field_cuentaventa_(row, status);
	}
	if ("unidad_" == field) {
		displayChange_field_unidad_(row, status);
	}
	if ("tipoitem_" == field) {
		displayChange_field_tipoitem_(row, status);
	}
	if ("cuentacompra_" == field) {
		displayChange_field_cuentacompra_(row, status);
	}
	if ("precioventa_" == field) {
		displayChange_field_precioventa_(row, status);
	}
	if ("puntoventa_" == field) {
		displayChange_field_puntoventa_(row, status);
	}
	if ("id_status_" == field) {
		displayChange_field_id_status_(row, status);
	}
	if ("image_" == field) {
		displayChange_field_image_(row, status);
	}
	if ("entrada_" == field) {
		displayChange_field_entrada_(row, status);
	}
	if ("service_" == field) {
		displayChange_field_service_(row, status);
	}
	if ("kiosko_" == field) {
		displayChange_field_kiosko_(row, status);
	}
	if ("jugador_" == field) {
		displayChange_field_jugador_(row, status);
	}
	if ("visitante_" == field) {
		displayChange_field_visitante_(row, status);
	}
	if ("minutos_" == field) {
		displayChange_field_minutos_(row, status);
	}
	if ("tarjeta_" == field) {
		displayChange_field_tarjeta_(row, status);
	}
	if ("tokens_" == field) {
		displayChange_field_tokens_(row, status);
	}
	if ("comida_" == field) {
		displayChange_field_comida_(row, status);
	}
	if ("score_" == field) {
		displayChange_field_score_(row, status);
	}
}

function displayChange_field_product_name_(row, status) {
    var fieldId;
}

function displayChange_field_id_category_(row, status) {
    var fieldId;
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_id_category___obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_id_category_" + row).select2("destroy");
		}
		scJQSelect2Add(row, "id_category_");
	}
}

function displayChange_field_product_code_(row, status) {
    var fieldId;
}

function displayChange_field_dateproduct_(row, status) {
    var fieldId;
}

function displayChange_field_product_cost_(row, status) {
    var fieldId;
}

function displayChange_field_stock_(row, status) {
    var fieldId;
}

function displayChange_field_product_value_(row, status) {
    var fieldId;
}

function displayChange_field_discount_(row, status) {
    var fieldId;
}

function displayChange_field_poriva_(row, status) {
    var fieldId;
}

function displayChange_field_cuentaventa_(row, status) {
    var fieldId;
}

function displayChange_field_unidad_(row, status) {
    var fieldId;
}

function displayChange_field_tipoitem_(row, status) {
    var fieldId;
}

function displayChange_field_cuentacompra_(row, status) {
    var fieldId;
}

function displayChange_field_precioventa_(row, status) {
    var fieldId;
}

function displayChange_field_puntoventa_(row, status) {
    var fieldId;
}

function displayChange_field_id_status_(row, status) {
    var fieldId;
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_id_status___obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_id_status_" + row).select2("destroy");
		}
		scJQSelect2Add(row, "id_status_");
	}
}

function displayChange_field_image_(row, status) {
    var fieldId;
}

function displayChange_field_entrada_(row, status) {
    var fieldId;
}

function displayChange_field_service_(row, status) {
    var fieldId;
}

function displayChange_field_kiosko_(row, status) {
    var fieldId;
}

function displayChange_field_jugador_(row, status) {
    var fieldId;
}

function displayChange_field_visitante_(row, status) {
    var fieldId;
}

function displayChange_field_minutos_(row, status) {
    var fieldId;
}

function displayChange_field_tarjeta_(row, status) {
    var fieldId;
}

function displayChange_field_tokens_(row, status) {
    var fieldId;
}

function displayChange_field_comida_(row, status) {
    var fieldId;
}

function displayChange_field_score_(row, status) {
    var fieldId;
}

function scRecreateSelect2() {
	displayChange_field_id_category_("all", "on");
	displayChange_field_id_status_("all", "on");
}
function scResetPagesDisplay() {
	$(".sc-form-page").show();
}

function scHidePage(pageNo) {
	$("#id_form_product_edit_masivo_form" + pageNo).hide();
}

function scCheckNoPageSelected() {
	if (!$(".sc-form-page").filter(".scTabActive").filter(":visible").length) {
		var inactiveTabs = $(".sc-form-page").filter(".scTabInactive").filter(":visible");
		if (inactiveTabs.length) {
			var tabNo = $(inactiveTabs[0]).attr("id").substr(32);
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
  $("#id_sc_field_dateproduct_" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_dateproduct_" + iSeqRow] = $oField.val();
      if (2 == aParts.length) {
        sTime = " " + aParts[1];
      }
      if ('' == sTime || ' ' == sTime) {
        sTime = ' <?php echo $this->jqueryCalendarTimeStart($this->field_config['dateproduct_']['date_format']); ?>';
      }
      $oField.datepicker("option", "dateFormat", "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', 'hh', 'ii', 'ss', ':', ';', $_SESSION['scriptcase']['reg_conf']['date_sep'], $_SESSION['scriptcase']['reg_conf']['time_sep']), array('', 'yyyy', '','','', '', '', '', ''), $this->field_config['dateproduct_']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>" + sTime);
    },
    onClose: function(dateText, inst) {
      do_ajax_form_product_edit_masivo_validate_dateproduct_(iSeqRow);
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
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', 'hh', 'ii', 'ss', ':', ';', $_SESSION['scriptcase']['reg_conf']['date_sep'], $_SESSION['scriptcase']['reg_conf']['time_sep']), array('', 'yyyy', '','','', '', '', '', ''), $this->field_config['dateproduct_']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
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
  $("#id_sc_field_image_" + iSeqRow).fileupload({
    datatype: "json",
    url: "form_product_edit_masivo_ul_save.php",
    dropZone: $("#hidden_field_data_image_" + iSeqRow),
    formData: function() {
      return [
        {name: 'param_field', value: 'image_'},
        {name: 'param_seq', value: '<?php echo $this->Ini->sc_page; ?>'},
        {name: 'upload_file_row', value: iSeqRow}
      ];
    },
    progress: function(e, data) {
      var loader, progress;
      if (data.lengthComputable && window.FormData !== undefined) {
        loader = $("#id_img_loader_image_" + iSeqRow);
        loaderContent = $("#id_img_loader_image_" + iSeqRow + " .scProgressBarLoading");
        loaderContent.html("&nbsp;");
        progress = parseInt(data.loaded / data.total * 100, 10);
        loader.show().find("div").css("width", progress + "%");
      }
      else {
        loader = $("#id_ajax_loader_image_" + iSeqRow);
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
        $("#id_img_loader_image_" + iSeqRow).hide();
      }
      else
      {
        $("#id_ajax_loader_image_" + iSeqRow).hide();
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
      $("#id_sc_field_image_" + iSeqRow).val("");
      $("#id_sc_field_image__ul_name" + iSeqRow).val(fileData[0].sc_ul_name);
      $("#id_sc_field_image__ul_type" + iSeqRow).val(fileData[0].type);
      eval("var_ajax_img_image_" + iSeqRow + " = '<?php echo $this->Ini->path_imag_temp; ?>/' + fileData[0].sc_image_source");
      var_ajax_img_image_ = '<?php echo $this->Ini->path_imag_temp; ?>/' + fileData[0].sc_image_source;
      var_ajax_img_thumb = '<?php echo $this->Ini->path_imag_temp; ?>/' + fileData[0].sc_thumb_prot;
      thumbDisplay = ("" == var_ajax_img_image_) ? "none" : "";
      $("#id_ajax_img_image_" + iSeqRow).attr("src", var_ajax_img_thumb);
      $("#id_ajax_img_image_" + iSeqRow).css("display", thumbDisplay);
      if (document.F1.temp_out1_image_) {
        document.F1.temp_out_image_.value = var_ajax_img_thumb;
        document.F1.temp_out1_image_.value = var_ajax_img_image_;
      }
      else if (document.F1.temp_out_image_) {
        document.F1.temp_out_image_.value = var_ajax_img_image_;
      }
      checkDisplay = ("" == fileData[0].sc_random_prot.substr(12)) ? "none" : "";
      $("#chk_ajax_img_image_" + iSeqRow).css("display", checkDisplay);
      $("#txt_ajax_img_image_" + iSeqRow).html(fileData[0].name);
      $("#txt_ajax_img_image_" + iSeqRow).css("display", checkDisplay);
      $("#id_ajax_link_image_" + iSeqRow).html(fileData[0].sc_random_prot.substr(12));
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
                         $(t).html("<a href=\"javascript:nm_mostra_doc('0', '"+rs2+"', 'form_product_edit_masivo')\">"+$('#id_read_on_'+field+iSeqRow).text()+"</a>");
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
  if (null == specificField || "id_category_" == specificField) {
    scJQSelect2Add_id_category_(seqRow);
  }
  if (null == specificField || "id_status_" == specificField) {
    scJQSelect2Add_id_status_(seqRow);
  }
} // scJQSelect2Add

function scJQSelect2Add_id_category_(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_id_category__obj" : "#id_sc_field_id_category_" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_id_category__obj',
      dropdownCssClass: 'css_id_category__obj',
      language: {
        noResults: function() {
          return "<?php echo $this->Ini->Nm_lang['lang_autocomp_notfound'] ?>";
        },
        searching: function() {
          return "<?php echo $this->Ini->Nm_lang['lang_autocomp_searching'] ?>";
        }
      }
    }
  );
} // scJQSelect2Add

function scJQSelect2Add_id_status_(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_id_status__obj" : "#id_sc_field_id_status_" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_id_status__obj',
      dropdownCssClass: 'css_id_status__obj',
      language: {
        noResults: function() {
          return "<?php echo $this->Ini->Nm_lang['lang_autocomp_notfound'] ?>";
        },
        searching: function() {
          return "<?php echo $this->Ini->Nm_lang['lang_autocomp_searching'] ?>";
        }
      }
    }
  );
} // scJQSelect2Add


function scJQElementsAdd(iLine) {
  scJQEventsAdd(iLine);
  scEventControl_init(iLine);
  scJQCalendarAdd(iLine);
  scJQUploadAdd(iLine);
  scJQPasswordToggleAdd(iLine);
  scJQSelect2Add(iLine);
  setTimeout(function () { if ('function' == typeof displayChange_field_id_category_) { displayChange_field_id_category_(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_id_status_) { displayChange_field_id_status_(iLine, "on"); } }, 150);
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

