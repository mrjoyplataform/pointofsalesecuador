
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
  scEventControl_data["product_name" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["id_category" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["product_code" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["dateproduct" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["product_cost" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["stock" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["poriva" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["product_value" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["discount" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["precioventa" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["puntoventa" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["kiosko" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["orden" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["id_status" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["cuentaventa" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["unidad" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["cuentacompra" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["tipoitem" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["image" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["service" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["jugador" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["entrada" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["visitante" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["minutos" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["tarjeta" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["tokens" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["comida" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["score" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["combos_recetas" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["product_name" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["product_name" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["id_category" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["id_category" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["product_code" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["product_code" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["dateproduct" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["dateproduct" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["product_cost" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["product_cost" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["stock" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["stock" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["poriva" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["poriva" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["product_value" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["product_value" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["discount" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["discount" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["precioventa" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["precioventa" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["puntoventa" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["puntoventa" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["kiosko" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["kiosko" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["orden" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["orden" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["id_status" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["id_status" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["cuentaventa" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["cuentaventa" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["unidad" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["unidad" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["cuentacompra" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["cuentacompra" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["tipoitem" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["tipoitem" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["service" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["service" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["jugador" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["jugador" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["entrada" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["entrada" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["visitante" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["visitante" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["minutos" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["minutos" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["tarjeta" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["tarjeta" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["tokens" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["tokens" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["comida" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["comida" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["score" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["score" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["combos_recetas" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["combos_recetas" + iSeqRow]["change"]) {
    return true;
  }
  return false;
} // scEventControl_active

function scEventControl_onFocus(oField, iSeq) {
  var fieldId, fieldName;
  fieldId = $(oField).attr("id");
  fieldName = fieldId.substr(12);
  scEventControl_data[fieldName]["blur"] = true;
  if ("id_category" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("id_status" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("cuentaventa" + iSeq == fieldName) {
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
  $('#id_sc_field_product_name' + iSeqRow).bind('blur', function() { sc_form_product_snackbar_product_name_onblur(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_product_snackbar_product_name_onfocus(this, iSeqRow) });
  $('#id_sc_field_product_code' + iSeqRow).bind('blur', function() { sc_form_product_snackbar_product_code_onblur(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_product_snackbar_product_code_onfocus(this, iSeqRow) });
  $('#id_sc_field_id_status' + iSeqRow).bind('blur', function() { sc_form_product_snackbar_id_status_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_product_snackbar_id_status_onfocus(this, iSeqRow) });
  $('#id_sc_field_dateproduct' + iSeqRow).bind('blur', function() { sc_form_product_snackbar_dateproduct_onblur(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_product_snackbar_dateproduct_onfocus(this, iSeqRow) });
  $('#id_sc_field_dateproduct_hora' + iSeqRow).bind('blur', function() { sc_form_product_snackbar_dateproduct_onblur(this, iSeqRow) })
                                              .bind('focus', function() { sc_form_product_snackbar_dateproduct_onfocus(this, iSeqRow) });
  $('#id_sc_field_product_value' + iSeqRow).bind('blur', function() { sc_form_product_snackbar_product_value_onblur(this, iSeqRow) })
                                           .bind('click', function() { sc_form_product_snackbar_product_value_onclick(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_product_snackbar_product_value_onfocus(this, iSeqRow) });
  $('#id_sc_field_product_cost' + iSeqRow).bind('blur', function() { sc_form_product_snackbar_product_cost_onblur(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_product_snackbar_product_cost_onfocus(this, iSeqRow) });
  $('#id_sc_field_discount' + iSeqRow).bind('blur', function() { sc_form_product_snackbar_discount_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_product_snackbar_discount_onfocus(this, iSeqRow) });
  $('#id_sc_field_stock' + iSeqRow).bind('blur', function() { sc_form_product_snackbar_stock_onblur(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_product_snackbar_stock_onfocus(this, iSeqRow) });
  $('#id_sc_field_id_category' + iSeqRow).bind('blur', function() { sc_form_product_snackbar_id_category_onblur(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_product_snackbar_id_category_onfocus(this, iSeqRow) });
  $('#id_sc_field_image' + iSeqRow).bind('blur', function() { sc_form_product_snackbar_image_onblur(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_product_snackbar_image_onfocus(this, iSeqRow) });
  $('#id_sc_field_service' + iSeqRow).bind('blur', function() { sc_form_product_snackbar_service_onblur(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_product_snackbar_service_onfocus(this, iSeqRow) });
  $('#id_sc_field_kiosko' + iSeqRow).bind('blur', function() { sc_form_product_snackbar_kiosko_onblur(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_product_snackbar_kiosko_onfocus(this, iSeqRow) });
  $('#id_sc_field_entrada' + iSeqRow).bind('blur', function() { sc_form_product_snackbar_entrada_onblur(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_product_snackbar_entrada_onfocus(this, iSeqRow) });
  $('#id_sc_field_jugador' + iSeqRow).bind('blur', function() { sc_form_product_snackbar_jugador_onblur(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_product_snackbar_jugador_onfocus(this, iSeqRow) });
  $('#id_sc_field_visitante' + iSeqRow).bind('blur', function() { sc_form_product_snackbar_visitante_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_product_snackbar_visitante_onfocus(this, iSeqRow) });
  $('#id_sc_field_tarjeta' + iSeqRow).bind('blur', function() { sc_form_product_snackbar_tarjeta_onblur(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_product_snackbar_tarjeta_onfocus(this, iSeqRow) });
  $('#id_sc_field_minutos' + iSeqRow).bind('blur', function() { sc_form_product_snackbar_minutos_onblur(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_product_snackbar_minutos_onfocus(this, iSeqRow) });
  $('#id_sc_field_tokens' + iSeqRow).bind('blur', function() { sc_form_product_snackbar_tokens_onblur(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_product_snackbar_tokens_onfocus(this, iSeqRow) });
  $('#id_sc_field_comida' + iSeqRow).bind('blur', function() { sc_form_product_snackbar_comida_onblur(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_product_snackbar_comida_onfocus(this, iSeqRow) });
  $('#id_sc_field_score' + iSeqRow).bind('blur', function() { sc_form_product_snackbar_score_onblur(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_product_snackbar_score_onfocus(this, iSeqRow) });
  $('#id_sc_field_poriva' + iSeqRow).bind('blur', function() { sc_form_product_snackbar_poriva_onblur(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_product_snackbar_poriva_onfocus(this, iSeqRow) });
  $('#id_sc_field_cuentaventa' + iSeqRow).bind('blur', function() { sc_form_product_snackbar_cuentaventa_onblur(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_product_snackbar_cuentaventa_onfocus(this, iSeqRow) });
  $('#id_sc_field_unidad' + iSeqRow).bind('blur', function() { sc_form_product_snackbar_unidad_onblur(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_product_snackbar_unidad_onfocus(this, iSeqRow) });
  $('#id_sc_field_tipoitem' + iSeqRow).bind('blur', function() { sc_form_product_snackbar_tipoitem_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_product_snackbar_tipoitem_onfocus(this, iSeqRow) });
  $('#id_sc_field_cuentacompra' + iSeqRow).bind('blur', function() { sc_form_product_snackbar_cuentacompra_onblur(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_product_snackbar_cuentacompra_onfocus(this, iSeqRow) });
  $('#id_sc_field_precioventa' + iSeqRow).bind('blur', function() { sc_form_product_snackbar_precioventa_onblur(this, iSeqRow) })
                                         .bind('click', function() { sc_form_product_snackbar_precioventa_onclick(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_product_snackbar_precioventa_onfocus(this, iSeqRow) });
  $('#id_sc_field_puntoventa' + iSeqRow).bind('blur', function() { sc_form_product_snackbar_puntoventa_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_product_snackbar_puntoventa_onfocus(this, iSeqRow) });
  $('#id_sc_field_orden' + iSeqRow).bind('blur', function() { sc_form_product_snackbar_orden_onblur(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_product_snackbar_orden_onfocus(this, iSeqRow) });
  $('#id_sc_field_combos_recetas' + iSeqRow).bind('blur', function() { sc_form_product_snackbar_combos_recetas_onblur(this, iSeqRow) })
                                            .bind('focus', function() { sc_form_product_snackbar_combos_recetas_onfocus(this, iSeqRow) });
  $('.sc-ui-radio-puntoventa' + iSeqRow).on('click', function() { scMarkFormAsChanged(); });
  $('.sc-ui-radio-kiosko' + iSeqRow).on('click', function() { scMarkFormAsChanged(); });
  $('.sc-ui-radio-service' + iSeqRow).on('click', function() { scMarkFormAsChanged(); });
  $('.sc-ui-radio-jugador' + iSeqRow).on('click', function() { scMarkFormAsChanged(); });
  $('.sc-ui-radio-entrada' + iSeqRow).on('click', function() { scMarkFormAsChanged(); });
  $('.sc-ui-radio-visitante' + iSeqRow).on('click', function() { scMarkFormAsChanged(); });
  $('.sc-ui-radio-tarjeta' + iSeqRow).on('click', function() { scMarkFormAsChanged(); });
  $('.sc-ui-radio-comida' + iSeqRow).on('click', function() { scMarkFormAsChanged(); });
} // scJQEventsAdd

function sc_form_product_snackbar_product_name_onblur(oThis, iSeqRow) {
  do_ajax_form_product_snackbar_mob_validate_product_name();
  scCssBlur(oThis);
}

function sc_form_product_snackbar_product_name_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_product_snackbar_product_code_onblur(oThis, iSeqRow) {
  do_ajax_form_product_snackbar_mob_validate_product_code();
  scCssBlur(oThis);
}

function sc_form_product_snackbar_product_code_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_product_snackbar_id_status_onblur(oThis, iSeqRow) {
  do_ajax_form_product_snackbar_mob_validate_id_status();
  scCssBlur(oThis);
}

function sc_form_product_snackbar_id_status_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_product_snackbar_dateproduct_onblur(oThis, iSeqRow) {
  do_ajax_form_product_snackbar_mob_validate_dateproduct();
  scCssBlur(oThis);
}

function sc_form_product_snackbar_dateproduct_onblur(oThis, iSeqRow) {
  do_ajax_form_product_snackbar_mob_validate_dateproduct();
  scCssBlur(oThis);
}

function sc_form_product_snackbar_dateproduct_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_product_snackbar_dateproduct_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_product_snackbar_product_value_onblur(oThis, iSeqRow) {
  do_ajax_form_product_snackbar_mob_validate_product_value();
  scCssBlur(oThis);
}

function sc_form_product_snackbar_product_value_onclick(oThis, iSeqRow) {
  do_ajax_form_product_snackbar_mob_event_product_value_onclick();
}

function sc_form_product_snackbar_product_value_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_product_snackbar_product_cost_onblur(oThis, iSeqRow) {
  do_ajax_form_product_snackbar_mob_validate_product_cost();
  scCssBlur(oThis);
}

function sc_form_product_snackbar_product_cost_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_product_snackbar_discount_onblur(oThis, iSeqRow) {
  do_ajax_form_product_snackbar_mob_validate_discount();
  scCssBlur(oThis);
}

function sc_form_product_snackbar_discount_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_product_snackbar_stock_onblur(oThis, iSeqRow) {
  do_ajax_form_product_snackbar_mob_validate_stock();
  scCssBlur(oThis);
}

function sc_form_product_snackbar_stock_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_product_snackbar_id_category_onblur(oThis, iSeqRow) {
  do_ajax_form_product_snackbar_mob_validate_id_category();
  scCssBlur(oThis);
}

function sc_form_product_snackbar_id_category_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_product_snackbar_image_onblur(oThis, iSeqRow) {
  scCssBlur(oThis);
}

function sc_form_product_snackbar_image_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_form_product_snackbar_service_onblur(oThis, iSeqRow) {
  do_ajax_form_product_snackbar_mob_validate_service();
  scCssBlur(oThis);
}

function sc_form_product_snackbar_service_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_product_snackbar_kiosko_onblur(oThis, iSeqRow) {
  do_ajax_form_product_snackbar_mob_validate_kiosko();
  scCssBlur(oThis);
}

function sc_form_product_snackbar_kiosko_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_product_snackbar_entrada_onblur(oThis, iSeqRow) {
  do_ajax_form_product_snackbar_mob_validate_entrada();
  scCssBlur(oThis);
}

function sc_form_product_snackbar_entrada_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_product_snackbar_jugador_onblur(oThis, iSeqRow) {
  do_ajax_form_product_snackbar_mob_validate_jugador();
  scCssBlur(oThis);
}

function sc_form_product_snackbar_jugador_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_product_snackbar_visitante_onblur(oThis, iSeqRow) {
  do_ajax_form_product_snackbar_mob_validate_visitante();
  scCssBlur(oThis);
}

function sc_form_product_snackbar_visitante_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_product_snackbar_tarjeta_onblur(oThis, iSeqRow) {
  do_ajax_form_product_snackbar_mob_validate_tarjeta();
  scCssBlur(oThis);
}

function sc_form_product_snackbar_tarjeta_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_product_snackbar_minutos_onblur(oThis, iSeqRow) {
  do_ajax_form_product_snackbar_mob_validate_minutos();
  scCssBlur(oThis);
}

function sc_form_product_snackbar_minutos_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_product_snackbar_tokens_onblur(oThis, iSeqRow) {
  do_ajax_form_product_snackbar_mob_validate_tokens();
  scCssBlur(oThis);
}

function sc_form_product_snackbar_tokens_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_product_snackbar_comida_onblur(oThis, iSeqRow) {
  do_ajax_form_product_snackbar_mob_validate_comida();
  scCssBlur(oThis);
}

function sc_form_product_snackbar_comida_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_product_snackbar_score_onblur(oThis, iSeqRow) {
  do_ajax_form_product_snackbar_mob_validate_score();
  scCssBlur(oThis);
}

function sc_form_product_snackbar_score_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_product_snackbar_poriva_onblur(oThis, iSeqRow) {
  do_ajax_form_product_snackbar_mob_validate_poriva();
  scCssBlur(oThis);
}

function sc_form_product_snackbar_poriva_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_product_snackbar_cuentaventa_onblur(oThis, iSeqRow) {
  do_ajax_form_product_snackbar_mob_validate_cuentaventa();
  scCssBlur(oThis);
}

function sc_form_product_snackbar_cuentaventa_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_product_snackbar_unidad_onblur(oThis, iSeqRow) {
  do_ajax_form_product_snackbar_mob_validate_unidad();
  scCssBlur(oThis);
}

function sc_form_product_snackbar_unidad_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_product_snackbar_tipoitem_onblur(oThis, iSeqRow) {
  do_ajax_form_product_snackbar_mob_validate_tipoitem();
  scCssBlur(oThis);
}

function sc_form_product_snackbar_tipoitem_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_product_snackbar_cuentacompra_onblur(oThis, iSeqRow) {
  do_ajax_form_product_snackbar_mob_validate_cuentacompra();
  scCssBlur(oThis);
}

function sc_form_product_snackbar_cuentacompra_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_product_snackbar_precioventa_onblur(oThis, iSeqRow) {
  do_ajax_form_product_snackbar_mob_validate_precioventa();
  scCssBlur(oThis);
}

function sc_form_product_snackbar_precioventa_onclick(oThis, iSeqRow) {
  do_ajax_form_product_snackbar_mob_event_precioventa_onclick();
}

function sc_form_product_snackbar_precioventa_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_product_snackbar_puntoventa_onblur(oThis, iSeqRow) {
  do_ajax_form_product_snackbar_mob_validate_puntoventa();
  scCssBlur(oThis);
}

function sc_form_product_snackbar_puntoventa_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_product_snackbar_orden_onblur(oThis, iSeqRow) {
  do_ajax_form_product_snackbar_mob_validate_orden();
  scCssBlur(oThis);
}

function sc_form_product_snackbar_orden_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_product_snackbar_combos_recetas_onblur(oThis, iSeqRow) {
  do_ajax_form_product_snackbar_mob_validate_combos_recetas();
  scCssBlur(oThis);
}

function sc_form_product_snackbar_combos_recetas_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
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
	if ("3" == block) {
		displayChange_block_3(status);
	}
}

function displayChange_block_0(status) {
	displayChange_field("product_name", "", status);
	displayChange_field("id_category", "", status);
	displayChange_field("product_code", "", status);
	displayChange_field("dateproduct", "", status);
	displayChange_field("product_cost", "", status);
	displayChange_field("stock", "", status);
	displayChange_field("poriva", "", status);
	displayChange_field("product_value", "", status);
	displayChange_field("discount", "", status);
	displayChange_field("precioventa", "", status);
	displayChange_field("puntoventa", "", status);
	displayChange_field("kiosko", "", status);
	displayChange_field("orden", "", status);
	displayChange_field("id_status", "", status);
	displayChange_field("cuentaventa", "", status);
	displayChange_field("unidad", "", status);
	displayChange_field("cuentacompra", "", status);
}

function displayChange_block_1(status) {
	displayChange_field("tipoitem", "", status);
	displayChange_field("image", "", status);
}

function displayChange_block_2(status) {
	displayChange_field("service", "", status);
	displayChange_field("jugador", "", status);
	displayChange_field("entrada", "", status);
	displayChange_field("visitante", "", status);
	displayChange_field("minutos", "", status);
	displayChange_field("tarjeta", "", status);
	displayChange_field("tokens", "", status);
	displayChange_field("comida", "", status);
	displayChange_field("score", "", status);
}

function displayChange_block_3(status) {
	displayChange_field("combos_recetas", "", status);
}

function displayChange_row(row, status) {
	displayChange_field_product_name(row, status);
	displayChange_field_id_category(row, status);
	displayChange_field_product_code(row, status);
	displayChange_field_dateproduct(row, status);
	displayChange_field_product_cost(row, status);
	displayChange_field_stock(row, status);
	displayChange_field_poriva(row, status);
	displayChange_field_product_value(row, status);
	displayChange_field_discount(row, status);
	displayChange_field_precioventa(row, status);
	displayChange_field_puntoventa(row, status);
	displayChange_field_kiosko(row, status);
	displayChange_field_orden(row, status);
	displayChange_field_id_status(row, status);
	displayChange_field_cuentaventa(row, status);
	displayChange_field_unidad(row, status);
	displayChange_field_cuentacompra(row, status);
	displayChange_field_tipoitem(row, status);
	displayChange_field_image(row, status);
	displayChange_field_service(row, status);
	displayChange_field_jugador(row, status);
	displayChange_field_entrada(row, status);
	displayChange_field_visitante(row, status);
	displayChange_field_minutos(row, status);
	displayChange_field_tarjeta(row, status);
	displayChange_field_tokens(row, status);
	displayChange_field_comida(row, status);
	displayChange_field_score(row, status);
	displayChange_field_combos_recetas(row, status);
}

function displayChange_field(field, row, status) {
	if ("product_name" == field) {
		displayChange_field_product_name(row, status);
	}
	if ("id_category" == field) {
		displayChange_field_id_category(row, status);
	}
	if ("product_code" == field) {
		displayChange_field_product_code(row, status);
	}
	if ("dateproduct" == field) {
		displayChange_field_dateproduct(row, status);
	}
	if ("product_cost" == field) {
		displayChange_field_product_cost(row, status);
	}
	if ("stock" == field) {
		displayChange_field_stock(row, status);
	}
	if ("poriva" == field) {
		displayChange_field_poriva(row, status);
	}
	if ("product_value" == field) {
		displayChange_field_product_value(row, status);
	}
	if ("discount" == field) {
		displayChange_field_discount(row, status);
	}
	if ("precioventa" == field) {
		displayChange_field_precioventa(row, status);
	}
	if ("puntoventa" == field) {
		displayChange_field_puntoventa(row, status);
	}
	if ("kiosko" == field) {
		displayChange_field_kiosko(row, status);
	}
	if ("orden" == field) {
		displayChange_field_orden(row, status);
	}
	if ("id_status" == field) {
		displayChange_field_id_status(row, status);
	}
	if ("cuentaventa" == field) {
		displayChange_field_cuentaventa(row, status);
	}
	if ("unidad" == field) {
		displayChange_field_unidad(row, status);
	}
	if ("cuentacompra" == field) {
		displayChange_field_cuentacompra(row, status);
	}
	if ("tipoitem" == field) {
		displayChange_field_tipoitem(row, status);
	}
	if ("image" == field) {
		displayChange_field_image(row, status);
	}
	if ("service" == field) {
		displayChange_field_service(row, status);
	}
	if ("jugador" == field) {
		displayChange_field_jugador(row, status);
	}
	if ("entrada" == field) {
		displayChange_field_entrada(row, status);
	}
	if ("visitante" == field) {
		displayChange_field_visitante(row, status);
	}
	if ("minutos" == field) {
		displayChange_field_minutos(row, status);
	}
	if ("tarjeta" == field) {
		displayChange_field_tarjeta(row, status);
	}
	if ("tokens" == field) {
		displayChange_field_tokens(row, status);
	}
	if ("comida" == field) {
		displayChange_field_comida(row, status);
	}
	if ("score" == field) {
		displayChange_field_score(row, status);
	}
	if ("combos_recetas" == field) {
		displayChange_field_combos_recetas(row, status);
	}
}

function displayChange_field_product_name(row, status) {
    var fieldId;
}

function displayChange_field_id_category(row, status) {
    var fieldId;
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_id_category__obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_id_category" + row).select2("destroy");
		}
		scJQSelect2Add(row, "id_category");
	}
}

function displayChange_field_product_code(row, status) {
    var fieldId;
}

function displayChange_field_dateproduct(row, status) {
    var fieldId;
}

function displayChange_field_product_cost(row, status) {
    var fieldId;
}

function displayChange_field_stock(row, status) {
    var fieldId;
}

function displayChange_field_poriva(row, status) {
    var fieldId;
}

function displayChange_field_product_value(row, status) {
    var fieldId;
}

function displayChange_field_discount(row, status) {
    var fieldId;
}

function displayChange_field_precioventa(row, status) {
    var fieldId;
}

function displayChange_field_puntoventa(row, status) {
    var fieldId;
}

function displayChange_field_kiosko(row, status) {
    var fieldId;
}

function displayChange_field_orden(row, status) {
    var fieldId;
}

function displayChange_field_id_status(row, status) {
    var fieldId;
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_id_status__obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_id_status" + row).select2("destroy");
		}
		scJQSelect2Add(row, "id_status");
	}
}

function displayChange_field_cuentaventa(row, status) {
    var fieldId;
}

function displayChange_field_unidad(row, status) {
    var fieldId;
}

function displayChange_field_cuentacompra(row, status) {
    var fieldId;
}

function displayChange_field_tipoitem(row, status) {
    var fieldId;
}

function displayChange_field_image(row, status) {
    var fieldId;
}

function displayChange_field_service(row, status) {
    var fieldId;
}

function displayChange_field_jugador(row, status) {
    var fieldId;
}

function displayChange_field_entrada(row, status) {
    var fieldId;
}

function displayChange_field_visitante(row, status) {
    var fieldId;
}

function displayChange_field_minutos(row, status) {
    var fieldId;
}

function displayChange_field_tarjeta(row, status) {
    var fieldId;
}

function displayChange_field_tokens(row, status) {
    var fieldId;
}

function displayChange_field_comida(row, status) {
    var fieldId;
}

function displayChange_field_score(row, status) {
    var fieldId;
}

function displayChange_field_combos_recetas(row, status) {
    var fieldId;
	if ("on" == status && typeof $("#nmsc_iframe_liga_form_product_combo_mob")[0].contentWindow.scRecreateSelect2 === "function") {
		$("#nmsc_iframe_liga_form_product_combo_mob")[0].contentWindow.scRecreateSelect2();
	}
}

function scRecreateSelect2() {
	displayChange_field_id_category("all", "on");
	displayChange_field_id_status("all", "on");
}
function scResetPagesDisplay() {
	$(".sc-form-page").show();
}

function scHidePage(pageNo) {
	$("#id_form_product_snackbar_mob_form" + pageNo).hide();
}

function scCheckNoPageSelected() {
	if (!$(".sc-form-page").filter(".scTabActive").filter(":visible").length) {
		var inactiveTabs = $(".sc-form-page").filter(".scTabInactive").filter(":visible");
		if (inactiveTabs.length) {
			var tabNo = $(inactiveTabs[0]).attr("id").substr(33);
		}
	}
}
var sc_jq_calendar_value = {};

function scJQCalendarAdd(iSeqRow) {
  $("#id_sc_field_dateproduct" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_dateproduct" + iSeqRow] = $oField.val();
      if (2 == aParts.length) {
        sTime = " " + aParts[1];
      }
      if ('' == sTime || ' ' == sTime) {
        sTime = ' <?php echo $this->jqueryCalendarTimeStart($this->field_config['dateproduct']['date_format']); ?>';
      }
      $oField.datepicker("option", "dateFormat", "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', 'hh', 'ii', 'ss', ':', ';', $_SESSION['scriptcase']['reg_conf']['date_sep'], $_SESSION['scriptcase']['reg_conf']['time_sep']), array('', 'yyyy', '','','', '', '', '', ''), $this->field_config['dateproduct']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>" + sTime);
    },
    onClose: function(dateText, inst) {
      do_ajax_form_product_snackbar_mob_validate_dateproduct(iSeqRow);
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
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', 'hh', 'ii', 'ss', ':', ';', $_SESSION['scriptcase']['reg_conf']['date_sep'], $_SESSION['scriptcase']['reg_conf']['time_sep']), array('', 'yyyy', '','','', '', '', '', ''), $this->field_config['dateproduct']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
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
  $("#id_sc_field_ultfechaventa" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_ultfechaventa" + iSeqRow] = $oField.val();
      if (2 == aParts.length) {
        sTime = " " + aParts[1];
      }
      if ('' == sTime || ' ' == sTime) {
        sTime = ' <?php echo $this->jqueryCalendarTimeStart($this->field_config['ultfechaventa']['date_format']); ?>';
      }
      $oField.datepicker("option", "dateFormat", "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', 'hh', 'ii', 'ss', ':', ';', $_SESSION['scriptcase']['reg_conf']['date_sep'], $_SESSION['scriptcase']['reg_conf']['time_sep']), array('', 'yyyy', '','','', '', '', '', ''), $this->field_config['ultfechaventa']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>" + sTime);
    },
    onClose: function(dateText, inst) {
      do_ajax_form_product_snackbar_mob_validate_ultfechaventa(iSeqRow);
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
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', 'hh', 'ii', 'ss', ':', ';', $_SESSION['scriptcase']['reg_conf']['date_sep'], $_SESSION['scriptcase']['reg_conf']['time_sep']), array('', 'yyyy', '','','', '', '', '', ''), $this->field_config['ultfechaventa']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
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
  $("#id_sc_field_image" + iSeqRow).fileupload({
    datatype: "json",
    url: "form_product_snackbar_mob_ul_save.php",
    dropZone: "",
    formData: function() {
      return [
        {name: 'param_field', value: 'image'},
        {name: 'param_seq', value: '<?php echo $this->Ini->sc_page; ?>'},
        {name: 'upload_file_row', value: iSeqRow}
      ];
    },
    progress: function(e, data) {
      var loader, progress;
      if (data.lengthComputable && window.FormData !== undefined) {
        loader = $("#id_img_loader_image" + iSeqRow);
        loaderContent = $("#id_img_loader_image" + iSeqRow + " .scProgressBarLoading");
        loaderContent.html("&nbsp;");
        progress = parseInt(data.loaded / data.total * 100, 10);
        loader.show().find("div").css("width", progress + "%");
      }
      else {
        loader = $("#id_ajax_loader_image" + iSeqRow);
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
        $("#id_img_loader_image" + iSeqRow).hide();
      }
      else
      {
        $("#id_ajax_loader_image" + iSeqRow).hide();
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
      $("#id_sc_field_image" + iSeqRow).val("");
      $("#id_sc_field_image_ul_name" + iSeqRow).val(fileData[0].sc_ul_name);
      $("#id_sc_field_image_ul_type" + iSeqRow).val(fileData[0].type);
      var_ajax_img_image = '<?php echo $this->Ini->path_imag_temp; ?>/' + fileData[0].sc_image_source;
      var_ajax_img_thumb = '<?php echo $this->Ini->path_imag_temp; ?>/' + fileData[0].sc_thumb_prot;
      thumbDisplay = ("" == var_ajax_img_image) ? "none" : "";
      $("#id_ajax_img_image" + iSeqRow).attr("src", var_ajax_img_thumb);
      $("#id_ajax_img_image" + iSeqRow).css("display", thumbDisplay);
      if (document.F1.temp_out1_image) {
        document.F1.temp_out_image.value = var_ajax_img_thumb;
        document.F1.temp_out1_image.value = var_ajax_img_image;
      }
      else if (document.F1.temp_out_image) {
        document.F1.temp_out_image.value = var_ajax_img_image;
      }
      checkDisplay = ("" == fileData[0].sc_random_prot.substr(12)) ? "none" : "";
      $("#chk_ajax_img_image" + iSeqRow).css("display", checkDisplay);
      $("#txt_ajax_img_image" + iSeqRow).html(fileData[0].name);
      $("#txt_ajax_img_image" + iSeqRow).css("display", checkDisplay);
      $("#id_ajax_link_image" + iSeqRow).html(fileData[0].sc_random_prot.substr(12));
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
                         $(t).html("<a href=\"javascript:nm_mostra_doc('0', '"+rs2+"', 'form_product_snackbar_mob')\">"+$('#id_read_on_'+field+iSeqRow).text()+"</a>");
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
  if (null == specificField || "id_category" == specificField) {
    scJQSelect2Add_id_category(seqRow);
  }
  if (null == specificField || "id_status" == specificField) {
    scJQSelect2Add_id_status(seqRow);
  }
} // scJQSelect2Add

function scJQSelect2Add_id_category(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_id_category_obj" : "#id_sc_field_id_category" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_id_category_obj',
      dropdownCssClass: 'css_id_category_obj',
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

function scJQSelect2Add_id_status(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_id_status_obj" : "#id_sc_field_id_status" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_id_status_obj',
      dropdownCssClass: 'css_id_status_obj',
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
  setTimeout(function () { if ('function' == typeof displayChange_field_id_category) { displayChange_field_id_category(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_id_status) { displayChange_field_id_status(iLine, "on"); } }, 150);
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

