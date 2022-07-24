
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
  scEventControl_data["codcte43" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["tipodoc43" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["numdoc43" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["ocurren43" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["cocte43" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["fecdoc43" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["tipdoc43" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["numvencob43" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["fedoc43" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["totdoc43" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["detalle43" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["cvanioant43" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["cvdivisa43" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["valdivisa43" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["valdivisaori43" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["factcompra43" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["seriecompra43" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["autocompra43" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["codret43" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["valini43" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["numcuotasord43" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["valormov43" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["saldoregmov43" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["feccobro43" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["codpagounif43" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["tipodocdb43" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["numdocdb43" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["ocurrecdocdb43" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["numrecibo43" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["valorabono43" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["efectcheque43" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["saldoexceso43" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["saldocte43" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["codpago43" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["numdocpago43" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["obsdocpago43" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["uid" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["cvtransfer43" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["fectransfer43" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["tipoimp43" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["porcimp43" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["bienserv43" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["credgast43" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["fecvencompra43" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["fecvenret43" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["numautoret43" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["sdoexeact43" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["sdoregact43" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["conta43" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["cvanulado43" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["baseret43" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["ret_con_iva43" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["retenciones43" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["idb" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["tipocomptehis" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["banco" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["numero_transferencia" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["estado_electronico" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["proyecto" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["rubro" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["categoria" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["tipo_documento_atado" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["numero_documento_atado" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["valor_superior_al_maximo" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["distribucion_retencion" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["codcte43" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["codcte43" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["tipodoc43" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["tipodoc43" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["numdoc43" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["numdoc43" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["ocurren43" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["ocurren43" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["cocte43" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["cocte43" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["fecdoc43" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["fecdoc43" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["tipdoc43" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["tipdoc43" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["numvencob43" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["numvencob43" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["fedoc43" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["fedoc43" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["totdoc43" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["totdoc43" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["detalle43" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["detalle43" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["cvanioant43" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["cvanioant43" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["cvdivisa43" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["cvdivisa43" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["valdivisa43" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["valdivisa43" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["valdivisaori43" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["valdivisaori43" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["factcompra43" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["factcompra43" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["seriecompra43" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["seriecompra43" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["autocompra43" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["autocompra43" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["codret43" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["codret43" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["valini43" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["valini43" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["numcuotasord43" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["numcuotasord43" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["valormov43" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["valormov43" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["saldoregmov43" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["saldoregmov43" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["feccobro43" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["feccobro43" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["codpagounif43" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["codpagounif43" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["tipodocdb43" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["tipodocdb43" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["numdocdb43" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["numdocdb43" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["ocurrecdocdb43" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["ocurrecdocdb43" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["numrecibo43" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["numrecibo43" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["valorabono43" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["valorabono43" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["efectcheque43" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["efectcheque43" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["saldoexceso43" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["saldoexceso43" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["saldocte43" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["saldocte43" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["codpago43" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["codpago43" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["numdocpago43" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["numdocpago43" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["obsdocpago43" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["obsdocpago43" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["uid" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["uid" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["cvtransfer43" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["cvtransfer43" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["fectransfer43" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["fectransfer43" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["tipoimp43" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["tipoimp43" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["porcimp43" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["porcimp43" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["bienserv43" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["bienserv43" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["credgast43" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["credgast43" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["fecvencompra43" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["fecvencompra43" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["fecvenret43" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["fecvenret43" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["numautoret43" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["numautoret43" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["sdoexeact43" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["sdoexeact43" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["sdoregact43" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["sdoregact43" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["conta43" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["conta43" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["cvanulado43" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["cvanulado43" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["baseret43" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["baseret43" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["ret_con_iva43" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["ret_con_iva43" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["retenciones43" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["retenciones43" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["idb" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["idb" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["tipocomptehis" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["tipocomptehis" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["banco" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["banco" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["numero_transferencia" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["numero_transferencia" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["estado_electronico" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["estado_electronico" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["proyecto" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["proyecto" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["rubro" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["rubro" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["categoria" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["categoria" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["tipo_documento_atado" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["tipo_documento_atado" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["numero_documento_atado" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["numero_documento_atado" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["valor_superior_al_maximo" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["valor_superior_al_maximo" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["distribucion_retencion" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["distribucion_retencion" + iSeqRow]["change"]) {
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
  $('#id_sc_field_codcte43' + iSeqRow).bind('blur', function() { sc_form_movpag_codcte43_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_movpag_codcte43_onfocus(this, iSeqRow) });
  $('#id_sc_field_tipodoc43' + iSeqRow).bind('blur', function() { sc_form_movpag_tipodoc43_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_movpag_tipodoc43_onfocus(this, iSeqRow) });
  $('#id_sc_field_numdoc43' + iSeqRow).bind('blur', function() { sc_form_movpag_numdoc43_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_movpag_numdoc43_onfocus(this, iSeqRow) });
  $('#id_sc_field_ocurren43' + iSeqRow).bind('blur', function() { sc_form_movpag_ocurren43_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_movpag_ocurren43_onfocus(this, iSeqRow) });
  $('#id_sc_field_cocte43' + iSeqRow).bind('blur', function() { sc_form_movpag_cocte43_onblur(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_movpag_cocte43_onfocus(this, iSeqRow) });
  $('#id_sc_field_fecdoc43' + iSeqRow).bind('blur', function() { sc_form_movpag_fecdoc43_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_movpag_fecdoc43_onfocus(this, iSeqRow) });
  $('#id_sc_field_fecdoc43_hora' + iSeqRow).bind('blur', function() { sc_form_movpag_fecdoc43_onblur(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_movpag_fecdoc43_onfocus(this, iSeqRow) });
  $('#id_sc_field_tipdoc43' + iSeqRow).bind('blur', function() { sc_form_movpag_tipdoc43_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_movpag_tipdoc43_onfocus(this, iSeqRow) });
  $('#id_sc_field_numvencob43' + iSeqRow).bind('blur', function() { sc_form_movpag_numvencob43_onblur(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_movpag_numvencob43_onfocus(this, iSeqRow) });
  $('#id_sc_field_fedoc43' + iSeqRow).bind('blur', function() { sc_form_movpag_fedoc43_onblur(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_movpag_fedoc43_onfocus(this, iSeqRow) });
  $('#id_sc_field_fedoc43_hora' + iSeqRow).bind('blur', function() { sc_form_movpag_fedoc43_onblur(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_movpag_fedoc43_onfocus(this, iSeqRow) });
  $('#id_sc_field_totdoc43' + iSeqRow).bind('blur', function() { sc_form_movpag_totdoc43_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_movpag_totdoc43_onfocus(this, iSeqRow) });
  $('#id_sc_field_detalle43' + iSeqRow).bind('blur', function() { sc_form_movpag_detalle43_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_movpag_detalle43_onfocus(this, iSeqRow) });
  $('#id_sc_field_cvanioant43' + iSeqRow).bind('blur', function() { sc_form_movpag_cvanioant43_onblur(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_movpag_cvanioant43_onfocus(this, iSeqRow) });
  $('#id_sc_field_cvdivisa43' + iSeqRow).bind('blur', function() { sc_form_movpag_cvdivisa43_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_movpag_cvdivisa43_onfocus(this, iSeqRow) });
  $('#id_sc_field_valdivisa43' + iSeqRow).bind('blur', function() { sc_form_movpag_valdivisa43_onblur(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_movpag_valdivisa43_onfocus(this, iSeqRow) });
  $('#id_sc_field_valdivisaori43' + iSeqRow).bind('blur', function() { sc_form_movpag_valdivisaori43_onblur(this, iSeqRow) })
                                            .bind('focus', function() { sc_form_movpag_valdivisaori43_onfocus(this, iSeqRow) });
  $('#id_sc_field_factcompra43' + iSeqRow).bind('blur', function() { sc_form_movpag_factcompra43_onblur(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_movpag_factcompra43_onfocus(this, iSeqRow) });
  $('#id_sc_field_seriecompra43' + iSeqRow).bind('blur', function() { sc_form_movpag_seriecompra43_onblur(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_movpag_seriecompra43_onfocus(this, iSeqRow) });
  $('#id_sc_field_autocompra43' + iSeqRow).bind('blur', function() { sc_form_movpag_autocompra43_onblur(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_movpag_autocompra43_onfocus(this, iSeqRow) });
  $('#id_sc_field_codret43' + iSeqRow).bind('blur', function() { sc_form_movpag_codret43_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_movpag_codret43_onfocus(this, iSeqRow) });
  $('#id_sc_field_valini43' + iSeqRow).bind('blur', function() { sc_form_movpag_valini43_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_movpag_valini43_onfocus(this, iSeqRow) });
  $('#id_sc_field_numcuotasord43' + iSeqRow).bind('blur', function() { sc_form_movpag_numcuotasord43_onblur(this, iSeqRow) })
                                            .bind('focus', function() { sc_form_movpag_numcuotasord43_onfocus(this, iSeqRow) });
  $('#id_sc_field_valormov43' + iSeqRow).bind('blur', function() { sc_form_movpag_valormov43_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_movpag_valormov43_onfocus(this, iSeqRow) });
  $('#id_sc_field_saldoregmov43' + iSeqRow).bind('blur', function() { sc_form_movpag_saldoregmov43_onblur(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_movpag_saldoregmov43_onfocus(this, iSeqRow) });
  $('#id_sc_field_feccobro43' + iSeqRow).bind('blur', function() { sc_form_movpag_feccobro43_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_movpag_feccobro43_onfocus(this, iSeqRow) });
  $('#id_sc_field_codpagounif43' + iSeqRow).bind('blur', function() { sc_form_movpag_codpagounif43_onblur(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_movpag_codpagounif43_onfocus(this, iSeqRow) });
  $('#id_sc_field_tipodocdb43' + iSeqRow).bind('blur', function() { sc_form_movpag_tipodocdb43_onblur(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_movpag_tipodocdb43_onfocus(this, iSeqRow) });
  $('#id_sc_field_numdocdb43' + iSeqRow).bind('blur', function() { sc_form_movpag_numdocdb43_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_movpag_numdocdb43_onfocus(this, iSeqRow) });
  $('#id_sc_field_ocurrecdocdb43' + iSeqRow).bind('blur', function() { sc_form_movpag_ocurrecdocdb43_onblur(this, iSeqRow) })
                                            .bind('focus', function() { sc_form_movpag_ocurrecdocdb43_onfocus(this, iSeqRow) });
  $('#id_sc_field_numrecibo43' + iSeqRow).bind('blur', function() { sc_form_movpag_numrecibo43_onblur(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_movpag_numrecibo43_onfocus(this, iSeqRow) });
  $('#id_sc_field_valorabono43' + iSeqRow).bind('blur', function() { sc_form_movpag_valorabono43_onblur(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_movpag_valorabono43_onfocus(this, iSeqRow) });
  $('#id_sc_field_efectcheque43' + iSeqRow).bind('blur', function() { sc_form_movpag_efectcheque43_onblur(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_movpag_efectcheque43_onfocus(this, iSeqRow) });
  $('#id_sc_field_saldoexceso43' + iSeqRow).bind('blur', function() { sc_form_movpag_saldoexceso43_onblur(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_movpag_saldoexceso43_onfocus(this, iSeqRow) });
  $('#id_sc_field_saldocte43' + iSeqRow).bind('blur', function() { sc_form_movpag_saldocte43_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_movpag_saldocte43_onfocus(this, iSeqRow) });
  $('#id_sc_field_codpago43' + iSeqRow).bind('blur', function() { sc_form_movpag_codpago43_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_movpag_codpago43_onfocus(this, iSeqRow) });
  $('#id_sc_field_numdocpago43' + iSeqRow).bind('blur', function() { sc_form_movpag_numdocpago43_onblur(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_movpag_numdocpago43_onfocus(this, iSeqRow) });
  $('#id_sc_field_obsdocpago43' + iSeqRow).bind('blur', function() { sc_form_movpag_obsdocpago43_onblur(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_movpag_obsdocpago43_onfocus(this, iSeqRow) });
  $('#id_sc_field_uid' + iSeqRow).bind('blur', function() { sc_form_movpag_uid_onblur(this, iSeqRow) })
                                 .bind('focus', function() { sc_form_movpag_uid_onfocus(this, iSeqRow) });
  $('#id_sc_field_cvtransfer43' + iSeqRow).bind('blur', function() { sc_form_movpag_cvtransfer43_onblur(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_movpag_cvtransfer43_onfocus(this, iSeqRow) });
  $('#id_sc_field_fectransfer43' + iSeqRow).bind('blur', function() { sc_form_movpag_fectransfer43_onblur(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_movpag_fectransfer43_onfocus(this, iSeqRow) });
  $('#id_sc_field_tipoimp43' + iSeqRow).bind('blur', function() { sc_form_movpag_tipoimp43_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_movpag_tipoimp43_onfocus(this, iSeqRow) });
  $('#id_sc_field_porcimp43' + iSeqRow).bind('blur', function() { sc_form_movpag_porcimp43_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_movpag_porcimp43_onfocus(this, iSeqRow) });
  $('#id_sc_field_bienserv43' + iSeqRow).bind('blur', function() { sc_form_movpag_bienserv43_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_movpag_bienserv43_onfocus(this, iSeqRow) });
  $('#id_sc_field_credgast43' + iSeqRow).bind('blur', function() { sc_form_movpag_credgast43_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_movpag_credgast43_onfocus(this, iSeqRow) });
  $('#id_sc_field_fecvencompra43' + iSeqRow).bind('blur', function() { sc_form_movpag_fecvencompra43_onblur(this, iSeqRow) })
                                            .bind('focus', function() { sc_form_movpag_fecvencompra43_onfocus(this, iSeqRow) });
  $('#id_sc_field_fecvenret43' + iSeqRow).bind('blur', function() { sc_form_movpag_fecvenret43_onblur(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_movpag_fecvenret43_onfocus(this, iSeqRow) });
  $('#id_sc_field_numautoret43' + iSeqRow).bind('blur', function() { sc_form_movpag_numautoret43_onblur(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_movpag_numautoret43_onfocus(this, iSeqRow) });
  $('#id_sc_field_sdoexeact43' + iSeqRow).bind('blur', function() { sc_form_movpag_sdoexeact43_onblur(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_movpag_sdoexeact43_onfocus(this, iSeqRow) });
  $('#id_sc_field_sdoregact43' + iSeqRow).bind('blur', function() { sc_form_movpag_sdoregact43_onblur(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_movpag_sdoregact43_onfocus(this, iSeqRow) });
  $('#id_sc_field_conta43' + iSeqRow).bind('blur', function() { sc_form_movpag_conta43_onblur(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_movpag_conta43_onfocus(this, iSeqRow) });
  $('#id_sc_field_cvanulado43' + iSeqRow).bind('blur', function() { sc_form_movpag_cvanulado43_onblur(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_movpag_cvanulado43_onfocus(this, iSeqRow) });
  $('#id_sc_field_baseret43' + iSeqRow).bind('blur', function() { sc_form_movpag_baseret43_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_movpag_baseret43_onfocus(this, iSeqRow) });
  $('#id_sc_field_ret_con_iva43' + iSeqRow).bind('blur', function() { sc_form_movpag_ret_con_iva43_onblur(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_movpag_ret_con_iva43_onfocus(this, iSeqRow) });
  $('#id_sc_field_retenciones43' + iSeqRow).bind('blur', function() { sc_form_movpag_retenciones43_onblur(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_movpag_retenciones43_onfocus(this, iSeqRow) });
  $('#id_sc_field_idb' + iSeqRow).bind('blur', function() { sc_form_movpag_idb_onblur(this, iSeqRow) })
                                 .bind('focus', function() { sc_form_movpag_idb_onfocus(this, iSeqRow) });
  $('#id_sc_field_tipocomptehis' + iSeqRow).bind('blur', function() { sc_form_movpag_tipocomptehis_onblur(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_movpag_tipocomptehis_onfocus(this, iSeqRow) });
  $('#id_sc_field_banco' + iSeqRow).bind('blur', function() { sc_form_movpag_banco_onblur(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_movpag_banco_onfocus(this, iSeqRow) });
  $('#id_sc_field_numero_transferencia' + iSeqRow).bind('blur', function() { sc_form_movpag_numero_transferencia_onblur(this, iSeqRow) })
                                                  .bind('focus', function() { sc_form_movpag_numero_transferencia_onfocus(this, iSeqRow) });
  $('#id_sc_field_estado_electronico' + iSeqRow).bind('blur', function() { sc_form_movpag_estado_electronico_onblur(this, iSeqRow) })
                                                .bind('focus', function() { sc_form_movpag_estado_electronico_onfocus(this, iSeqRow) });
  $('#id_sc_field_proyecto' + iSeqRow).bind('blur', function() { sc_form_movpag_proyecto_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_movpag_proyecto_onfocus(this, iSeqRow) });
  $('#id_sc_field_rubro' + iSeqRow).bind('blur', function() { sc_form_movpag_rubro_onblur(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_movpag_rubro_onfocus(this, iSeqRow) });
  $('#id_sc_field_categoria' + iSeqRow).bind('blur', function() { sc_form_movpag_categoria_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_movpag_categoria_onfocus(this, iSeqRow) });
  $('#id_sc_field_tipo_documento_atado' + iSeqRow).bind('blur', function() { sc_form_movpag_tipo_documento_atado_onblur(this, iSeqRow) })
                                                  .bind('focus', function() { sc_form_movpag_tipo_documento_atado_onfocus(this, iSeqRow) });
  $('#id_sc_field_numero_documento_atado' + iSeqRow).bind('blur', function() { sc_form_movpag_numero_documento_atado_onblur(this, iSeqRow) })
                                                    .bind('focus', function() { sc_form_movpag_numero_documento_atado_onfocus(this, iSeqRow) });
  $('#id_sc_field_valor_superior_al_maximo' + iSeqRow).bind('blur', function() { sc_form_movpag_valor_superior_al_maximo_onblur(this, iSeqRow) })
                                                      .bind('focus', function() { sc_form_movpag_valor_superior_al_maximo_onfocus(this, iSeqRow) });
  $('#id_sc_field_distribucion_retencion' + iSeqRow).bind('blur', function() { sc_form_movpag_distribucion_retencion_onblur(this, iSeqRow) })
                                                    .bind('focus', function() { sc_form_movpag_distribucion_retencion_onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_movpag_codcte43_onblur(oThis, iSeqRow) {
  do_ajax_form_movpag_mob_validate_codcte43();
  scCssBlur(oThis);
}

function sc_form_movpag_codcte43_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_movpag_tipodoc43_onblur(oThis, iSeqRow) {
  do_ajax_form_movpag_mob_validate_tipodoc43();
  scCssBlur(oThis);
}

function sc_form_movpag_tipodoc43_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_movpag_numdoc43_onblur(oThis, iSeqRow) {
  do_ajax_form_movpag_mob_validate_numdoc43();
  scCssBlur(oThis);
}

function sc_form_movpag_numdoc43_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_movpag_ocurren43_onblur(oThis, iSeqRow) {
  do_ajax_form_movpag_mob_validate_ocurren43();
  scCssBlur(oThis);
}

function sc_form_movpag_ocurren43_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_movpag_cocte43_onblur(oThis, iSeqRow) {
  do_ajax_form_movpag_mob_validate_cocte43();
  scCssBlur(oThis);
}

function sc_form_movpag_cocte43_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_movpag_fecdoc43_onblur(oThis, iSeqRow) {
  do_ajax_form_movpag_mob_validate_fecdoc43();
  scCssBlur(oThis);
}

function sc_form_movpag_fecdoc43_onblur(oThis, iSeqRow) {
  do_ajax_form_movpag_mob_validate_fecdoc43();
  scCssBlur(oThis);
}

function sc_form_movpag_fecdoc43_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_movpag_fecdoc43_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_movpag_tipdoc43_onblur(oThis, iSeqRow) {
  do_ajax_form_movpag_mob_validate_tipdoc43();
  scCssBlur(oThis);
}

function sc_form_movpag_tipdoc43_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_movpag_numvencob43_onblur(oThis, iSeqRow) {
  do_ajax_form_movpag_mob_validate_numvencob43();
  scCssBlur(oThis);
}

function sc_form_movpag_numvencob43_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_movpag_fedoc43_onblur(oThis, iSeqRow) {
  do_ajax_form_movpag_mob_validate_fedoc43();
  scCssBlur(oThis);
}

function sc_form_movpag_fedoc43_onblur(oThis, iSeqRow) {
  do_ajax_form_movpag_mob_validate_fedoc43();
  scCssBlur(oThis);
}

function sc_form_movpag_fedoc43_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_movpag_fedoc43_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_movpag_totdoc43_onblur(oThis, iSeqRow) {
  do_ajax_form_movpag_mob_validate_totdoc43();
  scCssBlur(oThis);
}

function sc_form_movpag_totdoc43_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_movpag_detalle43_onblur(oThis, iSeqRow) {
  do_ajax_form_movpag_mob_validate_detalle43();
  scCssBlur(oThis);
}

function sc_form_movpag_detalle43_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_movpag_cvanioant43_onblur(oThis, iSeqRow) {
  do_ajax_form_movpag_mob_validate_cvanioant43();
  scCssBlur(oThis);
}

function sc_form_movpag_cvanioant43_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_movpag_cvdivisa43_onblur(oThis, iSeqRow) {
  do_ajax_form_movpag_mob_validate_cvdivisa43();
  scCssBlur(oThis);
}

function sc_form_movpag_cvdivisa43_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_movpag_valdivisa43_onblur(oThis, iSeqRow) {
  do_ajax_form_movpag_mob_validate_valdivisa43();
  scCssBlur(oThis);
}

function sc_form_movpag_valdivisa43_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_movpag_valdivisaori43_onblur(oThis, iSeqRow) {
  do_ajax_form_movpag_mob_validate_valdivisaori43();
  scCssBlur(oThis);
}

function sc_form_movpag_valdivisaori43_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_movpag_factcompra43_onblur(oThis, iSeqRow) {
  do_ajax_form_movpag_mob_validate_factcompra43();
  scCssBlur(oThis);
}

function sc_form_movpag_factcompra43_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_movpag_seriecompra43_onblur(oThis, iSeqRow) {
  do_ajax_form_movpag_mob_validate_seriecompra43();
  scCssBlur(oThis);
}

function sc_form_movpag_seriecompra43_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_movpag_autocompra43_onblur(oThis, iSeqRow) {
  do_ajax_form_movpag_mob_validate_autocompra43();
  scCssBlur(oThis);
}

function sc_form_movpag_autocompra43_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_movpag_codret43_onblur(oThis, iSeqRow) {
  do_ajax_form_movpag_mob_validate_codret43();
  scCssBlur(oThis);
}

function sc_form_movpag_codret43_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_movpag_valini43_onblur(oThis, iSeqRow) {
  do_ajax_form_movpag_mob_validate_valini43();
  scCssBlur(oThis);
}

function sc_form_movpag_valini43_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_movpag_numcuotasord43_onblur(oThis, iSeqRow) {
  do_ajax_form_movpag_mob_validate_numcuotasord43();
  scCssBlur(oThis);
}

function sc_form_movpag_numcuotasord43_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_movpag_valormov43_onblur(oThis, iSeqRow) {
  do_ajax_form_movpag_mob_validate_valormov43();
  scCssBlur(oThis);
}

function sc_form_movpag_valormov43_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_movpag_saldoregmov43_onblur(oThis, iSeqRow) {
  do_ajax_form_movpag_mob_validate_saldoregmov43();
  scCssBlur(oThis);
}

function sc_form_movpag_saldoregmov43_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_movpag_feccobro43_onblur(oThis, iSeqRow) {
  do_ajax_form_movpag_mob_validate_feccobro43();
  scCssBlur(oThis);
}

function sc_form_movpag_feccobro43_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_movpag_codpagounif43_onblur(oThis, iSeqRow) {
  do_ajax_form_movpag_mob_validate_codpagounif43();
  scCssBlur(oThis);
}

function sc_form_movpag_codpagounif43_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_movpag_tipodocdb43_onblur(oThis, iSeqRow) {
  do_ajax_form_movpag_mob_validate_tipodocdb43();
  scCssBlur(oThis);
}

function sc_form_movpag_tipodocdb43_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_movpag_numdocdb43_onblur(oThis, iSeqRow) {
  do_ajax_form_movpag_mob_validate_numdocdb43();
  scCssBlur(oThis);
}

function sc_form_movpag_numdocdb43_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_movpag_ocurrecdocdb43_onblur(oThis, iSeqRow) {
  do_ajax_form_movpag_mob_validate_ocurrecdocdb43();
  scCssBlur(oThis);
}

function sc_form_movpag_ocurrecdocdb43_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_movpag_numrecibo43_onblur(oThis, iSeqRow) {
  do_ajax_form_movpag_mob_validate_numrecibo43();
  scCssBlur(oThis);
}

function sc_form_movpag_numrecibo43_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_movpag_valorabono43_onblur(oThis, iSeqRow) {
  do_ajax_form_movpag_mob_validate_valorabono43();
  scCssBlur(oThis);
}

function sc_form_movpag_valorabono43_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_movpag_efectcheque43_onblur(oThis, iSeqRow) {
  do_ajax_form_movpag_mob_validate_efectcheque43();
  scCssBlur(oThis);
}

function sc_form_movpag_efectcheque43_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_movpag_saldoexceso43_onblur(oThis, iSeqRow) {
  do_ajax_form_movpag_mob_validate_saldoexceso43();
  scCssBlur(oThis);
}

function sc_form_movpag_saldoexceso43_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_movpag_saldocte43_onblur(oThis, iSeqRow) {
  do_ajax_form_movpag_mob_validate_saldocte43();
  scCssBlur(oThis);
}

function sc_form_movpag_saldocte43_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_movpag_codpago43_onblur(oThis, iSeqRow) {
  do_ajax_form_movpag_mob_validate_codpago43();
  scCssBlur(oThis);
}

function sc_form_movpag_codpago43_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_movpag_numdocpago43_onblur(oThis, iSeqRow) {
  do_ajax_form_movpag_mob_validate_numdocpago43();
  scCssBlur(oThis);
}

function sc_form_movpag_numdocpago43_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_movpag_obsdocpago43_onblur(oThis, iSeqRow) {
  do_ajax_form_movpag_mob_validate_obsdocpago43();
  scCssBlur(oThis);
}

function sc_form_movpag_obsdocpago43_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_movpag_uid_onblur(oThis, iSeqRow) {
  do_ajax_form_movpag_mob_validate_uid();
  scCssBlur(oThis);
}

function sc_form_movpag_uid_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_movpag_cvtransfer43_onblur(oThis, iSeqRow) {
  do_ajax_form_movpag_mob_validate_cvtransfer43();
  scCssBlur(oThis);
}

function sc_form_movpag_cvtransfer43_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_movpag_fectransfer43_onblur(oThis, iSeqRow) {
  do_ajax_form_movpag_mob_validate_fectransfer43();
  scCssBlur(oThis);
}

function sc_form_movpag_fectransfer43_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_movpag_tipoimp43_onblur(oThis, iSeqRow) {
  do_ajax_form_movpag_mob_validate_tipoimp43();
  scCssBlur(oThis);
}

function sc_form_movpag_tipoimp43_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_movpag_porcimp43_onblur(oThis, iSeqRow) {
  do_ajax_form_movpag_mob_validate_porcimp43();
  scCssBlur(oThis);
}

function sc_form_movpag_porcimp43_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_movpag_bienserv43_onblur(oThis, iSeqRow) {
  do_ajax_form_movpag_mob_validate_bienserv43();
  scCssBlur(oThis);
}

function sc_form_movpag_bienserv43_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_movpag_credgast43_onblur(oThis, iSeqRow) {
  do_ajax_form_movpag_mob_validate_credgast43();
  scCssBlur(oThis);
}

function sc_form_movpag_credgast43_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_movpag_fecvencompra43_onblur(oThis, iSeqRow) {
  do_ajax_form_movpag_mob_validate_fecvencompra43();
  scCssBlur(oThis);
}

function sc_form_movpag_fecvencompra43_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_movpag_fecvenret43_onblur(oThis, iSeqRow) {
  do_ajax_form_movpag_mob_validate_fecvenret43();
  scCssBlur(oThis);
}

function sc_form_movpag_fecvenret43_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_movpag_numautoret43_onblur(oThis, iSeqRow) {
  do_ajax_form_movpag_mob_validate_numautoret43();
  scCssBlur(oThis);
}

function sc_form_movpag_numautoret43_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_movpag_sdoexeact43_onblur(oThis, iSeqRow) {
  do_ajax_form_movpag_mob_validate_sdoexeact43();
  scCssBlur(oThis);
}

function sc_form_movpag_sdoexeact43_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_movpag_sdoregact43_onblur(oThis, iSeqRow) {
  do_ajax_form_movpag_mob_validate_sdoregact43();
  scCssBlur(oThis);
}

function sc_form_movpag_sdoregact43_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_movpag_conta43_onblur(oThis, iSeqRow) {
  do_ajax_form_movpag_mob_validate_conta43();
  scCssBlur(oThis);
}

function sc_form_movpag_conta43_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_movpag_cvanulado43_onblur(oThis, iSeqRow) {
  do_ajax_form_movpag_mob_validate_cvanulado43();
  scCssBlur(oThis);
}

function sc_form_movpag_cvanulado43_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_movpag_baseret43_onblur(oThis, iSeqRow) {
  do_ajax_form_movpag_mob_validate_baseret43();
  scCssBlur(oThis);
}

function sc_form_movpag_baseret43_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_movpag_ret_con_iva43_onblur(oThis, iSeqRow) {
  do_ajax_form_movpag_mob_validate_ret_con_iva43();
  scCssBlur(oThis);
}

function sc_form_movpag_ret_con_iva43_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_movpag_retenciones43_onblur(oThis, iSeqRow) {
  do_ajax_form_movpag_mob_validate_retenciones43();
  scCssBlur(oThis);
}

function sc_form_movpag_retenciones43_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_movpag_idb_onblur(oThis, iSeqRow) {
  do_ajax_form_movpag_mob_validate_idb();
  scCssBlur(oThis);
}

function sc_form_movpag_idb_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_movpag_tipocomptehis_onblur(oThis, iSeqRow) {
  do_ajax_form_movpag_mob_validate_tipocomptehis();
  scCssBlur(oThis);
}

function sc_form_movpag_tipocomptehis_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_movpag_banco_onblur(oThis, iSeqRow) {
  do_ajax_form_movpag_mob_validate_banco();
  scCssBlur(oThis);
}

function sc_form_movpag_banco_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_movpag_numero_transferencia_onblur(oThis, iSeqRow) {
  do_ajax_form_movpag_mob_validate_numero_transferencia();
  scCssBlur(oThis);
}

function sc_form_movpag_numero_transferencia_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_movpag_estado_electronico_onblur(oThis, iSeqRow) {
  do_ajax_form_movpag_mob_validate_estado_electronico();
  scCssBlur(oThis);
}

function sc_form_movpag_estado_electronico_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_movpag_proyecto_onblur(oThis, iSeqRow) {
  do_ajax_form_movpag_mob_validate_proyecto();
  scCssBlur(oThis);
}

function sc_form_movpag_proyecto_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_movpag_rubro_onblur(oThis, iSeqRow) {
  do_ajax_form_movpag_mob_validate_rubro();
  scCssBlur(oThis);
}

function sc_form_movpag_rubro_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_movpag_categoria_onblur(oThis, iSeqRow) {
  do_ajax_form_movpag_mob_validate_categoria();
  scCssBlur(oThis);
}

function sc_form_movpag_categoria_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_movpag_tipo_documento_atado_onblur(oThis, iSeqRow) {
  do_ajax_form_movpag_mob_validate_tipo_documento_atado();
  scCssBlur(oThis);
}

function sc_form_movpag_tipo_documento_atado_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_movpag_numero_documento_atado_onblur(oThis, iSeqRow) {
  do_ajax_form_movpag_mob_validate_numero_documento_atado();
  scCssBlur(oThis);
}

function sc_form_movpag_numero_documento_atado_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_movpag_valor_superior_al_maximo_onblur(oThis, iSeqRow) {
  do_ajax_form_movpag_mob_validate_valor_superior_al_maximo();
  scCssBlur(oThis);
}

function sc_form_movpag_valor_superior_al_maximo_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_movpag_distribucion_retencion_onblur(oThis, iSeqRow) {
  do_ajax_form_movpag_mob_validate_distribucion_retencion();
  scCssBlur(oThis);
}

function sc_form_movpag_distribucion_retencion_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function displayChange_block(block, status) {
	if ("0" == block) {
		displayChange_block_0(status);
	}
}

function displayChange_block_0(status) {
	displayChange_field("codcte43", "", status);
	displayChange_field("tipodoc43", "", status);
	displayChange_field("numdoc43", "", status);
	displayChange_field("ocurren43", "", status);
	displayChange_field("cocte43", "", status);
	displayChange_field("fecdoc43", "", status);
	displayChange_field("tipdoc43", "", status);
	displayChange_field("numvencob43", "", status);
	displayChange_field("fedoc43", "", status);
	displayChange_field("totdoc43", "", status);
	displayChange_field("detalle43", "", status);
	displayChange_field("cvanioant43", "", status);
	displayChange_field("cvdivisa43", "", status);
	displayChange_field("valdivisa43", "", status);
	displayChange_field("valdivisaori43", "", status);
	displayChange_field("factcompra43", "", status);
	displayChange_field("seriecompra43", "", status);
	displayChange_field("autocompra43", "", status);
	displayChange_field("codret43", "", status);
	displayChange_field("valini43", "", status);
	displayChange_field("numcuotasord43", "", status);
	displayChange_field("valormov43", "", status);
	displayChange_field("saldoregmov43", "", status);
	displayChange_field("feccobro43", "", status);
	displayChange_field("codpagounif43", "", status);
	displayChange_field("tipodocdb43", "", status);
	displayChange_field("numdocdb43", "", status);
	displayChange_field("ocurrecdocdb43", "", status);
	displayChange_field("numrecibo43", "", status);
	displayChange_field("valorabono43", "", status);
	displayChange_field("efectcheque43", "", status);
	displayChange_field("saldoexceso43", "", status);
	displayChange_field("saldocte43", "", status);
	displayChange_field("codpago43", "", status);
	displayChange_field("numdocpago43", "", status);
	displayChange_field("obsdocpago43", "", status);
	displayChange_field("uid", "", status);
	displayChange_field("cvtransfer43", "", status);
	displayChange_field("fectransfer43", "", status);
	displayChange_field("tipoimp43", "", status);
	displayChange_field("porcimp43", "", status);
	displayChange_field("bienserv43", "", status);
	displayChange_field("credgast43", "", status);
	displayChange_field("fecvencompra43", "", status);
	displayChange_field("fecvenret43", "", status);
	displayChange_field("numautoret43", "", status);
	displayChange_field("sdoexeact43", "", status);
	displayChange_field("sdoregact43", "", status);
	displayChange_field("conta43", "", status);
	displayChange_field("cvanulado43", "", status);
	displayChange_field("baseret43", "", status);
	displayChange_field("ret_con_iva43", "", status);
	displayChange_field("retenciones43", "", status);
	displayChange_field("idb", "", status);
	displayChange_field("tipocomptehis", "", status);
	displayChange_field("banco", "", status);
	displayChange_field("numero_transferencia", "", status);
	displayChange_field("estado_electronico", "", status);
	displayChange_field("proyecto", "", status);
	displayChange_field("rubro", "", status);
	displayChange_field("categoria", "", status);
	displayChange_field("tipo_documento_atado", "", status);
	displayChange_field("numero_documento_atado", "", status);
	displayChange_field("valor_superior_al_maximo", "", status);
	displayChange_field("distribucion_retencion", "", status);
}

function displayChange_row(row, status) {
	displayChange_field_codcte43(row, status);
	displayChange_field_tipodoc43(row, status);
	displayChange_field_numdoc43(row, status);
	displayChange_field_ocurren43(row, status);
	displayChange_field_cocte43(row, status);
	displayChange_field_fecdoc43(row, status);
	displayChange_field_tipdoc43(row, status);
	displayChange_field_numvencob43(row, status);
	displayChange_field_fedoc43(row, status);
	displayChange_field_totdoc43(row, status);
	displayChange_field_detalle43(row, status);
	displayChange_field_cvanioant43(row, status);
	displayChange_field_cvdivisa43(row, status);
	displayChange_field_valdivisa43(row, status);
	displayChange_field_valdivisaori43(row, status);
	displayChange_field_factcompra43(row, status);
	displayChange_field_seriecompra43(row, status);
	displayChange_field_autocompra43(row, status);
	displayChange_field_codret43(row, status);
	displayChange_field_valini43(row, status);
	displayChange_field_numcuotasord43(row, status);
	displayChange_field_valormov43(row, status);
	displayChange_field_saldoregmov43(row, status);
	displayChange_field_feccobro43(row, status);
	displayChange_field_codpagounif43(row, status);
	displayChange_field_tipodocdb43(row, status);
	displayChange_field_numdocdb43(row, status);
	displayChange_field_ocurrecdocdb43(row, status);
	displayChange_field_numrecibo43(row, status);
	displayChange_field_valorabono43(row, status);
	displayChange_field_efectcheque43(row, status);
	displayChange_field_saldoexceso43(row, status);
	displayChange_field_saldocte43(row, status);
	displayChange_field_codpago43(row, status);
	displayChange_field_numdocpago43(row, status);
	displayChange_field_obsdocpago43(row, status);
	displayChange_field_uid(row, status);
	displayChange_field_cvtransfer43(row, status);
	displayChange_field_fectransfer43(row, status);
	displayChange_field_tipoimp43(row, status);
	displayChange_field_porcimp43(row, status);
	displayChange_field_bienserv43(row, status);
	displayChange_field_credgast43(row, status);
	displayChange_field_fecvencompra43(row, status);
	displayChange_field_fecvenret43(row, status);
	displayChange_field_numautoret43(row, status);
	displayChange_field_sdoexeact43(row, status);
	displayChange_field_sdoregact43(row, status);
	displayChange_field_conta43(row, status);
	displayChange_field_cvanulado43(row, status);
	displayChange_field_baseret43(row, status);
	displayChange_field_ret_con_iva43(row, status);
	displayChange_field_retenciones43(row, status);
	displayChange_field_idb(row, status);
	displayChange_field_tipocomptehis(row, status);
	displayChange_field_banco(row, status);
	displayChange_field_numero_transferencia(row, status);
	displayChange_field_estado_electronico(row, status);
	displayChange_field_proyecto(row, status);
	displayChange_field_rubro(row, status);
	displayChange_field_categoria(row, status);
	displayChange_field_tipo_documento_atado(row, status);
	displayChange_field_numero_documento_atado(row, status);
	displayChange_field_valor_superior_al_maximo(row, status);
	displayChange_field_distribucion_retencion(row, status);
}

function displayChange_field(field, row, status) {
	if ("codcte43" == field) {
		displayChange_field_codcte43(row, status);
	}
	if ("tipodoc43" == field) {
		displayChange_field_tipodoc43(row, status);
	}
	if ("numdoc43" == field) {
		displayChange_field_numdoc43(row, status);
	}
	if ("ocurren43" == field) {
		displayChange_field_ocurren43(row, status);
	}
	if ("cocte43" == field) {
		displayChange_field_cocte43(row, status);
	}
	if ("fecdoc43" == field) {
		displayChange_field_fecdoc43(row, status);
	}
	if ("tipdoc43" == field) {
		displayChange_field_tipdoc43(row, status);
	}
	if ("numvencob43" == field) {
		displayChange_field_numvencob43(row, status);
	}
	if ("fedoc43" == field) {
		displayChange_field_fedoc43(row, status);
	}
	if ("totdoc43" == field) {
		displayChange_field_totdoc43(row, status);
	}
	if ("detalle43" == field) {
		displayChange_field_detalle43(row, status);
	}
	if ("cvanioant43" == field) {
		displayChange_field_cvanioant43(row, status);
	}
	if ("cvdivisa43" == field) {
		displayChange_field_cvdivisa43(row, status);
	}
	if ("valdivisa43" == field) {
		displayChange_field_valdivisa43(row, status);
	}
	if ("valdivisaori43" == field) {
		displayChange_field_valdivisaori43(row, status);
	}
	if ("factcompra43" == field) {
		displayChange_field_factcompra43(row, status);
	}
	if ("seriecompra43" == field) {
		displayChange_field_seriecompra43(row, status);
	}
	if ("autocompra43" == field) {
		displayChange_field_autocompra43(row, status);
	}
	if ("codret43" == field) {
		displayChange_field_codret43(row, status);
	}
	if ("valini43" == field) {
		displayChange_field_valini43(row, status);
	}
	if ("numcuotasord43" == field) {
		displayChange_field_numcuotasord43(row, status);
	}
	if ("valormov43" == field) {
		displayChange_field_valormov43(row, status);
	}
	if ("saldoregmov43" == field) {
		displayChange_field_saldoregmov43(row, status);
	}
	if ("feccobro43" == field) {
		displayChange_field_feccobro43(row, status);
	}
	if ("codpagounif43" == field) {
		displayChange_field_codpagounif43(row, status);
	}
	if ("tipodocdb43" == field) {
		displayChange_field_tipodocdb43(row, status);
	}
	if ("numdocdb43" == field) {
		displayChange_field_numdocdb43(row, status);
	}
	if ("ocurrecdocdb43" == field) {
		displayChange_field_ocurrecdocdb43(row, status);
	}
	if ("numrecibo43" == field) {
		displayChange_field_numrecibo43(row, status);
	}
	if ("valorabono43" == field) {
		displayChange_field_valorabono43(row, status);
	}
	if ("efectcheque43" == field) {
		displayChange_field_efectcheque43(row, status);
	}
	if ("saldoexceso43" == field) {
		displayChange_field_saldoexceso43(row, status);
	}
	if ("saldocte43" == field) {
		displayChange_field_saldocte43(row, status);
	}
	if ("codpago43" == field) {
		displayChange_field_codpago43(row, status);
	}
	if ("numdocpago43" == field) {
		displayChange_field_numdocpago43(row, status);
	}
	if ("obsdocpago43" == field) {
		displayChange_field_obsdocpago43(row, status);
	}
	if ("uid" == field) {
		displayChange_field_uid(row, status);
	}
	if ("cvtransfer43" == field) {
		displayChange_field_cvtransfer43(row, status);
	}
	if ("fectransfer43" == field) {
		displayChange_field_fectransfer43(row, status);
	}
	if ("tipoimp43" == field) {
		displayChange_field_tipoimp43(row, status);
	}
	if ("porcimp43" == field) {
		displayChange_field_porcimp43(row, status);
	}
	if ("bienserv43" == field) {
		displayChange_field_bienserv43(row, status);
	}
	if ("credgast43" == field) {
		displayChange_field_credgast43(row, status);
	}
	if ("fecvencompra43" == field) {
		displayChange_field_fecvencompra43(row, status);
	}
	if ("fecvenret43" == field) {
		displayChange_field_fecvenret43(row, status);
	}
	if ("numautoret43" == field) {
		displayChange_field_numautoret43(row, status);
	}
	if ("sdoexeact43" == field) {
		displayChange_field_sdoexeact43(row, status);
	}
	if ("sdoregact43" == field) {
		displayChange_field_sdoregact43(row, status);
	}
	if ("conta43" == field) {
		displayChange_field_conta43(row, status);
	}
	if ("cvanulado43" == field) {
		displayChange_field_cvanulado43(row, status);
	}
	if ("baseret43" == field) {
		displayChange_field_baseret43(row, status);
	}
	if ("ret_con_iva43" == field) {
		displayChange_field_ret_con_iva43(row, status);
	}
	if ("retenciones43" == field) {
		displayChange_field_retenciones43(row, status);
	}
	if ("idb" == field) {
		displayChange_field_idb(row, status);
	}
	if ("tipocomptehis" == field) {
		displayChange_field_tipocomptehis(row, status);
	}
	if ("banco" == field) {
		displayChange_field_banco(row, status);
	}
	if ("numero_transferencia" == field) {
		displayChange_field_numero_transferencia(row, status);
	}
	if ("estado_electronico" == field) {
		displayChange_field_estado_electronico(row, status);
	}
	if ("proyecto" == field) {
		displayChange_field_proyecto(row, status);
	}
	if ("rubro" == field) {
		displayChange_field_rubro(row, status);
	}
	if ("categoria" == field) {
		displayChange_field_categoria(row, status);
	}
	if ("tipo_documento_atado" == field) {
		displayChange_field_tipo_documento_atado(row, status);
	}
	if ("numero_documento_atado" == field) {
		displayChange_field_numero_documento_atado(row, status);
	}
	if ("valor_superior_al_maximo" == field) {
		displayChange_field_valor_superior_al_maximo(row, status);
	}
	if ("distribucion_retencion" == field) {
		displayChange_field_distribucion_retencion(row, status);
	}
}

function displayChange_field_codcte43(row, status) {
    var fieldId;
}

function displayChange_field_tipodoc43(row, status) {
    var fieldId;
}

function displayChange_field_numdoc43(row, status) {
    var fieldId;
}

function displayChange_field_ocurren43(row, status) {
    var fieldId;
}

function displayChange_field_cocte43(row, status) {
    var fieldId;
}

function displayChange_field_fecdoc43(row, status) {
    var fieldId;
}

function displayChange_field_tipdoc43(row, status) {
    var fieldId;
}

function displayChange_field_numvencob43(row, status) {
    var fieldId;
}

function displayChange_field_fedoc43(row, status) {
    var fieldId;
}

function displayChange_field_totdoc43(row, status) {
    var fieldId;
}

function displayChange_field_detalle43(row, status) {
    var fieldId;
}

function displayChange_field_cvanioant43(row, status) {
    var fieldId;
}

function displayChange_field_cvdivisa43(row, status) {
    var fieldId;
}

function displayChange_field_valdivisa43(row, status) {
    var fieldId;
}

function displayChange_field_valdivisaori43(row, status) {
    var fieldId;
}

function displayChange_field_factcompra43(row, status) {
    var fieldId;
}

function displayChange_field_seriecompra43(row, status) {
    var fieldId;
}

function displayChange_field_autocompra43(row, status) {
    var fieldId;
}

function displayChange_field_codret43(row, status) {
    var fieldId;
}

function displayChange_field_valini43(row, status) {
    var fieldId;
}

function displayChange_field_numcuotasord43(row, status) {
    var fieldId;
}

function displayChange_field_valormov43(row, status) {
    var fieldId;
}

function displayChange_field_saldoregmov43(row, status) {
    var fieldId;
}

function displayChange_field_feccobro43(row, status) {
    var fieldId;
}

function displayChange_field_codpagounif43(row, status) {
    var fieldId;
}

function displayChange_field_tipodocdb43(row, status) {
    var fieldId;
}

function displayChange_field_numdocdb43(row, status) {
    var fieldId;
}

function displayChange_field_ocurrecdocdb43(row, status) {
    var fieldId;
}

function displayChange_field_numrecibo43(row, status) {
    var fieldId;
}

function displayChange_field_valorabono43(row, status) {
    var fieldId;
}

function displayChange_field_efectcheque43(row, status) {
    var fieldId;
}

function displayChange_field_saldoexceso43(row, status) {
    var fieldId;
}

function displayChange_field_saldocte43(row, status) {
    var fieldId;
}

function displayChange_field_codpago43(row, status) {
    var fieldId;
}

function displayChange_field_numdocpago43(row, status) {
    var fieldId;
}

function displayChange_field_obsdocpago43(row, status) {
    var fieldId;
}

function displayChange_field_uid(row, status) {
    var fieldId;
}

function displayChange_field_cvtransfer43(row, status) {
    var fieldId;
}

function displayChange_field_fectransfer43(row, status) {
    var fieldId;
}

function displayChange_field_tipoimp43(row, status) {
    var fieldId;
}

function displayChange_field_porcimp43(row, status) {
    var fieldId;
}

function displayChange_field_bienserv43(row, status) {
    var fieldId;
}

function displayChange_field_credgast43(row, status) {
    var fieldId;
}

function displayChange_field_fecvencompra43(row, status) {
    var fieldId;
}

function displayChange_field_fecvenret43(row, status) {
    var fieldId;
}

function displayChange_field_numautoret43(row, status) {
    var fieldId;
}

function displayChange_field_sdoexeact43(row, status) {
    var fieldId;
}

function displayChange_field_sdoregact43(row, status) {
    var fieldId;
}

function displayChange_field_conta43(row, status) {
    var fieldId;
}

function displayChange_field_cvanulado43(row, status) {
    var fieldId;
}

function displayChange_field_baseret43(row, status) {
    var fieldId;
}

function displayChange_field_ret_con_iva43(row, status) {
    var fieldId;
}

function displayChange_field_retenciones43(row, status) {
    var fieldId;
}

function displayChange_field_idb(row, status) {
    var fieldId;
}

function displayChange_field_tipocomptehis(row, status) {
    var fieldId;
}

function displayChange_field_banco(row, status) {
    var fieldId;
}

function displayChange_field_numero_transferencia(row, status) {
    var fieldId;
}

function displayChange_field_estado_electronico(row, status) {
    var fieldId;
}

function displayChange_field_proyecto(row, status) {
    var fieldId;
}

function displayChange_field_rubro(row, status) {
    var fieldId;
}

function displayChange_field_categoria(row, status) {
    var fieldId;
}

function displayChange_field_tipo_documento_atado(row, status) {
    var fieldId;
}

function displayChange_field_numero_documento_atado(row, status) {
    var fieldId;
}

function displayChange_field_valor_superior_al_maximo(row, status) {
    var fieldId;
}

function displayChange_field_distribucion_retencion(row, status) {
    var fieldId;
}

function scRecreateSelect2() {
}
function scResetPagesDisplay() {
	$(".sc-form-page").show();
}

function scHidePage(pageNo) {
	$("#id_form_movpag_mob_form" + pageNo).hide();
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
  $("#id_sc_field_fecdoc43" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_fecdoc43" + iSeqRow] = $oField.val();
      if (2 == aParts.length) {
        sTime = " " + aParts[1];
      }
      if ('' == sTime || ' ' == sTime) {
        sTime = ' <?php echo $this->jqueryCalendarTimeStart($this->field_config['fecdoc43']['date_format']); ?>';
      }
      $oField.datepicker("option", "dateFormat", "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', 'hh', 'ii', 'ss', ':', ';', $_SESSION['scriptcase']['reg_conf']['date_sep'], $_SESSION['scriptcase']['reg_conf']['time_sep']), array('', 'yyyy', '','','', '', '', '', ''), $this->field_config['fecdoc43']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>" + sTime);
    },
    onClose: function(dateText, inst) {
      do_ajax_form_movpag_mob_validate_fecdoc43(iSeqRow);
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
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', 'hh', 'ii', 'ss', ':', ';', $_SESSION['scriptcase']['reg_conf']['date_sep'], $_SESSION['scriptcase']['reg_conf']['time_sep']), array('', 'yyyy', '','','', '', '', '', ''), $this->field_config['fecdoc43']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
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
  $("#id_sc_field_fedoc43" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_fedoc43" + iSeqRow] = $oField.val();
      if (2 == aParts.length) {
        sTime = " " + aParts[1];
      }
      if ('' == sTime || ' ' == sTime) {
        sTime = ' <?php echo $this->jqueryCalendarTimeStart($this->field_config['fedoc43']['date_format']); ?>';
      }
      $oField.datepicker("option", "dateFormat", "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', 'hh', 'ii', 'ss', ':', ';', $_SESSION['scriptcase']['reg_conf']['date_sep'], $_SESSION['scriptcase']['reg_conf']['time_sep']), array('', 'yyyy', '','','', '', '', '', ''), $this->field_config['fedoc43']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>" + sTime);
    },
    onClose: function(dateText, inst) {
      do_ajax_form_movpag_mob_validate_fedoc43(iSeqRow);
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
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', 'hh', 'ii', 'ss', ':', ';', $_SESSION['scriptcase']['reg_conf']['date_sep'], $_SESSION['scriptcase']['reg_conf']['time_sep']), array('', 'yyyy', '','','', '', '', '', ''), $this->field_config['fedoc43']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
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
  $("#id_sc_field_feccobro43" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_feccobro43" + iSeqRow] = $oField.val();
    },
    onClose: function(dateText, inst) {
      do_ajax_form_movpag_mob_validate_feccobro43(iSeqRow);
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
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', $_SESSION['scriptcase']['reg_conf']['date_sep']), array('', 'yyyy', ''), $this->field_config['feccobro43']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
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
  $("#id_sc_field_fectransfer43" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_fectransfer43" + iSeqRow] = $oField.val();
    },
    onClose: function(dateText, inst) {
      do_ajax_form_movpag_mob_validate_fectransfer43(iSeqRow);
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
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', $_SESSION['scriptcase']['reg_conf']['date_sep']), array('', 'yyyy', ''), $this->field_config['fectransfer43']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
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
  $("#id_sc_field_fecvencompra43" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_fecvencompra43" + iSeqRow] = $oField.val();
    },
    onClose: function(dateText, inst) {
      do_ajax_form_movpag_mob_validate_fecvencompra43(iSeqRow);
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
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', $_SESSION['scriptcase']['reg_conf']['date_sep']), array('', 'yyyy', ''), $this->field_config['fecvencompra43']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
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
  $("#id_sc_field_fecvenret43" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_fecvenret43" + iSeqRow] = $oField.val();
    },
    onClose: function(dateText, inst) {
      do_ajax_form_movpag_mob_validate_fecvenret43(iSeqRow);
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
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', $_SESSION['scriptcase']['reg_conf']['date_sep']), array('', 'yyyy', ''), $this->field_config['fecvenret43']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
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
                         $(t).html("<a href=\"javascript:nm_mostra_doc('0', '"+rs2+"', 'form_movpag_mob')\">"+$('#id_read_on_'+field+iSeqRow).text()+"</a>");
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

