
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
  scEventControl_data["fecvendoc43" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["fecvenret43" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["numautoret43" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["cvanulado43" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["conta43" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["relacioncob43" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["estadocob43" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["nuevocodpago43" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["porccomision1" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["porccomision2" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["porcdesctocomision1" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["porcdesctocomision2" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["ope43" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["tfin43" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["fin43" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["ban43" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["cobrador43" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["coordinador43" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["cierre" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["idcierre" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["num_bco_dep" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["num_deposito" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["num_doc_cont" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["tip_doc_cont" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["idb" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["tipocomptehis" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["datosretcliente" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["valoresretcliente" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["beneficiario43" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["numero_cuenta" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["fecha_creacion_del_65" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["adicional" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["fecha_adicional" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["id_cotizacion" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["id_cuotas_tabla_pagos" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["institucion" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["estado_electronico" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
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
  if (scEventControl_data["fecvendoc43" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["fecvendoc43" + iSeqRow]["change"]) {
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
  if (scEventControl_data["cvanulado43" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["cvanulado43" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["conta43" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["conta43" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["relacioncob43" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["relacioncob43" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["estadocob43" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["estadocob43" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["nuevocodpago43" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["nuevocodpago43" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["porccomision1" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["porccomision1" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["porccomision2" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["porccomision2" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["porcdesctocomision1" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["porcdesctocomision1" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["porcdesctocomision2" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["porcdesctocomision2" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["ope43" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["ope43" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["tfin43" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["tfin43" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["fin43" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["fin43" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["ban43" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["ban43" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["cobrador43" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["cobrador43" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["coordinador43" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["coordinador43" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["cierre" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["cierre" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["idcierre" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["idcierre" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["num_bco_dep" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["num_bco_dep" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["num_deposito" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["num_deposito" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["num_doc_cont" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["num_doc_cont" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["tip_doc_cont" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["tip_doc_cont" + iSeqRow]["change"]) {
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
  if (scEventControl_data["datosretcliente" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["datosretcliente" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["valoresretcliente" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["valoresretcliente" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["beneficiario43" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["beneficiario43" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["numero_cuenta" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["numero_cuenta" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["fecha_creacion_del_65" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["fecha_creacion_del_65" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["adicional" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["adicional" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["fecha_adicional" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["fecha_adicional" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["id_cotizacion" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["id_cotizacion" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["id_cuotas_tabla_pagos" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["id_cuotas_tabla_pagos" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["institucion" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["institucion" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["estado_electronico" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["estado_electronico" + iSeqRow]["change"]) {
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
  $('#id_sc_field_codcte43' + iSeqRow).bind('blur', function() { sc_form_movcte2_codcte43_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_movcte2_codcte43_onfocus(this, iSeqRow) });
  $('#id_sc_field_tipodoc43' + iSeqRow).bind('blur', function() { sc_form_movcte2_tipodoc43_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_movcte2_tipodoc43_onfocus(this, iSeqRow) });
  $('#id_sc_field_numdoc43' + iSeqRow).bind('blur', function() { sc_form_movcte2_numdoc43_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_movcte2_numdoc43_onfocus(this, iSeqRow) });
  $('#id_sc_field_ocurren43' + iSeqRow).bind('blur', function() { sc_form_movcte2_ocurren43_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_movcte2_ocurren43_onfocus(this, iSeqRow) });
  $('#id_sc_field_cocte43' + iSeqRow).bind('blur', function() { sc_form_movcte2_cocte43_onblur(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_movcte2_cocte43_onfocus(this, iSeqRow) });
  $('#id_sc_field_fecdoc43' + iSeqRow).bind('blur', function() { sc_form_movcte2_fecdoc43_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_movcte2_fecdoc43_onfocus(this, iSeqRow) });
  $('#id_sc_field_fecdoc43_hora' + iSeqRow).bind('blur', function() { sc_form_movcte2_fecdoc43_onblur(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_movcte2_fecdoc43_onfocus(this, iSeqRow) });
  $('#id_sc_field_tipdoc43' + iSeqRow).bind('blur', function() { sc_form_movcte2_tipdoc43_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_movcte2_tipdoc43_onfocus(this, iSeqRow) });
  $('#id_sc_field_numvencob43' + iSeqRow).bind('blur', function() { sc_form_movcte2_numvencob43_onblur(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_movcte2_numvencob43_onfocus(this, iSeqRow) });
  $('#id_sc_field_fedoc43' + iSeqRow).bind('blur', function() { sc_form_movcte2_fedoc43_onblur(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_movcte2_fedoc43_onfocus(this, iSeqRow) });
  $('#id_sc_field_fedoc43_hora' + iSeqRow).bind('blur', function() { sc_form_movcte2_fedoc43_onblur(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_movcte2_fedoc43_onfocus(this, iSeqRow) });
  $('#id_sc_field_totdoc43' + iSeqRow).bind('blur', function() { sc_form_movcte2_totdoc43_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_movcte2_totdoc43_onfocus(this, iSeqRow) });
  $('#id_sc_field_detalle43' + iSeqRow).bind('blur', function() { sc_form_movcte2_detalle43_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_movcte2_detalle43_onfocus(this, iSeqRow) });
  $('#id_sc_field_cvanioant43' + iSeqRow).bind('blur', function() { sc_form_movcte2_cvanioant43_onblur(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_movcte2_cvanioant43_onfocus(this, iSeqRow) });
  $('#id_sc_field_cvdivisa43' + iSeqRow).bind('blur', function() { sc_form_movcte2_cvdivisa43_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_movcte2_cvdivisa43_onfocus(this, iSeqRow) });
  $('#id_sc_field_valdivisa43' + iSeqRow).bind('blur', function() { sc_form_movcte2_valdivisa43_onblur(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_movcte2_valdivisa43_onfocus(this, iSeqRow) });
  $('#id_sc_field_valdivisaori43' + iSeqRow).bind('blur', function() { sc_form_movcte2_valdivisaori43_onblur(this, iSeqRow) })
                                            .bind('focus', function() { sc_form_movcte2_valdivisaori43_onfocus(this, iSeqRow) });
  $('#id_sc_field_factcompra43' + iSeqRow).bind('blur', function() { sc_form_movcte2_factcompra43_onblur(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_movcte2_factcompra43_onfocus(this, iSeqRow) });
  $('#id_sc_field_seriecompra43' + iSeqRow).bind('blur', function() { sc_form_movcte2_seriecompra43_onblur(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_movcte2_seriecompra43_onfocus(this, iSeqRow) });
  $('#id_sc_field_autocompra43' + iSeqRow).bind('blur', function() { sc_form_movcte2_autocompra43_onblur(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_movcte2_autocompra43_onfocus(this, iSeqRow) });
  $('#id_sc_field_codret43' + iSeqRow).bind('blur', function() { sc_form_movcte2_codret43_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_movcte2_codret43_onfocus(this, iSeqRow) });
  $('#id_sc_field_valini43' + iSeqRow).bind('blur', function() { sc_form_movcte2_valini43_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_movcte2_valini43_onfocus(this, iSeqRow) });
  $('#id_sc_field_numcuotasord43' + iSeqRow).bind('blur', function() { sc_form_movcte2_numcuotasord43_onblur(this, iSeqRow) })
                                            .bind('focus', function() { sc_form_movcte2_numcuotasord43_onfocus(this, iSeqRow) });
  $('#id_sc_field_valormov43' + iSeqRow).bind('blur', function() { sc_form_movcte2_valormov43_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_movcte2_valormov43_onfocus(this, iSeqRow) });
  $('#id_sc_field_saldoregmov43' + iSeqRow).bind('blur', function() { sc_form_movcte2_saldoregmov43_onblur(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_movcte2_saldoregmov43_onfocus(this, iSeqRow) });
  $('#id_sc_field_feccobro43' + iSeqRow).bind('blur', function() { sc_form_movcte2_feccobro43_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_movcte2_feccobro43_onfocus(this, iSeqRow) });
  $('#id_sc_field_codpagounif43' + iSeqRow).bind('blur', function() { sc_form_movcte2_codpagounif43_onblur(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_movcte2_codpagounif43_onfocus(this, iSeqRow) });
  $('#id_sc_field_tipodocdb43' + iSeqRow).bind('blur', function() { sc_form_movcte2_tipodocdb43_onblur(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_movcte2_tipodocdb43_onfocus(this, iSeqRow) });
  $('#id_sc_field_numdocdb43' + iSeqRow).bind('blur', function() { sc_form_movcte2_numdocdb43_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_movcte2_numdocdb43_onfocus(this, iSeqRow) });
  $('#id_sc_field_ocurrecdocdb43' + iSeqRow).bind('blur', function() { sc_form_movcte2_ocurrecdocdb43_onblur(this, iSeqRow) })
                                            .bind('focus', function() { sc_form_movcte2_ocurrecdocdb43_onfocus(this, iSeqRow) });
  $('#id_sc_field_numrecibo43' + iSeqRow).bind('blur', function() { sc_form_movcte2_numrecibo43_onblur(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_movcte2_numrecibo43_onfocus(this, iSeqRow) });
  $('#id_sc_field_valorabono43' + iSeqRow).bind('blur', function() { sc_form_movcte2_valorabono43_onblur(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_movcte2_valorabono43_onfocus(this, iSeqRow) });
  $('#id_sc_field_efectcheque43' + iSeqRow).bind('blur', function() { sc_form_movcte2_efectcheque43_onblur(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_movcte2_efectcheque43_onfocus(this, iSeqRow) });
  $('#id_sc_field_saldoexceso43' + iSeqRow).bind('blur', function() { sc_form_movcte2_saldoexceso43_onblur(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_movcte2_saldoexceso43_onfocus(this, iSeqRow) });
  $('#id_sc_field_saldocte43' + iSeqRow).bind('blur', function() { sc_form_movcte2_saldocte43_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_movcte2_saldocte43_onfocus(this, iSeqRow) });
  $('#id_sc_field_codpago43' + iSeqRow).bind('blur', function() { sc_form_movcte2_codpago43_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_movcte2_codpago43_onfocus(this, iSeqRow) });
  $('#id_sc_field_numdocpago43' + iSeqRow).bind('blur', function() { sc_form_movcte2_numdocpago43_onblur(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_movcte2_numdocpago43_onfocus(this, iSeqRow) });
  $('#id_sc_field_obsdocpago43' + iSeqRow).bind('blur', function() { sc_form_movcte2_obsdocpago43_onblur(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_movcte2_obsdocpago43_onfocus(this, iSeqRow) });
  $('#id_sc_field_uid' + iSeqRow).bind('blur', function() { sc_form_movcte2_uid_onblur(this, iSeqRow) })
                                 .bind('focus', function() { sc_form_movcte2_uid_onfocus(this, iSeqRow) });
  $('#id_sc_field_cvtransfer43' + iSeqRow).bind('blur', function() { sc_form_movcte2_cvtransfer43_onblur(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_movcte2_cvtransfer43_onfocus(this, iSeqRow) });
  $('#id_sc_field_fectransfer43' + iSeqRow).bind('blur', function() { sc_form_movcte2_fectransfer43_onblur(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_movcte2_fectransfer43_onfocus(this, iSeqRow) });
  $('#id_sc_field_fecvendoc43' + iSeqRow).bind('blur', function() { sc_form_movcte2_fecvendoc43_onblur(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_movcte2_fecvendoc43_onfocus(this, iSeqRow) });
  $('#id_sc_field_fecvenret43' + iSeqRow).bind('blur', function() { sc_form_movcte2_fecvenret43_onblur(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_movcte2_fecvenret43_onfocus(this, iSeqRow) });
  $('#id_sc_field_numautoret43' + iSeqRow).bind('blur', function() { sc_form_movcte2_numautoret43_onblur(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_movcte2_numautoret43_onfocus(this, iSeqRow) });
  $('#id_sc_field_cvanulado43' + iSeqRow).bind('blur', function() { sc_form_movcte2_cvanulado43_onblur(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_movcte2_cvanulado43_onfocus(this, iSeqRow) });
  $('#id_sc_field_conta43' + iSeqRow).bind('blur', function() { sc_form_movcte2_conta43_onblur(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_movcte2_conta43_onfocus(this, iSeqRow) });
  $('#id_sc_field_relacioncob43' + iSeqRow).bind('blur', function() { sc_form_movcte2_relacioncob43_onblur(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_movcte2_relacioncob43_onfocus(this, iSeqRow) });
  $('#id_sc_field_estadocob43' + iSeqRow).bind('blur', function() { sc_form_movcte2_estadocob43_onblur(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_movcte2_estadocob43_onfocus(this, iSeqRow) });
  $('#id_sc_field_nuevocodpago43' + iSeqRow).bind('blur', function() { sc_form_movcte2_nuevocodpago43_onblur(this, iSeqRow) })
                                            .bind('focus', function() { sc_form_movcte2_nuevocodpago43_onfocus(this, iSeqRow) });
  $('#id_sc_field_porccomision1' + iSeqRow).bind('blur', function() { sc_form_movcte2_porccomision1_onblur(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_movcte2_porccomision1_onfocus(this, iSeqRow) });
  $('#id_sc_field_porccomision2' + iSeqRow).bind('blur', function() { sc_form_movcte2_porccomision2_onblur(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_movcte2_porccomision2_onfocus(this, iSeqRow) });
  $('#id_sc_field_porcdesctocomision1' + iSeqRow).bind('blur', function() { sc_form_movcte2_porcdesctocomision1_onblur(this, iSeqRow) })
                                                 .bind('focus', function() { sc_form_movcte2_porcdesctocomision1_onfocus(this, iSeqRow) });
  $('#id_sc_field_porcdesctocomision2' + iSeqRow).bind('blur', function() { sc_form_movcte2_porcdesctocomision2_onblur(this, iSeqRow) })
                                                 .bind('focus', function() { sc_form_movcte2_porcdesctocomision2_onfocus(this, iSeqRow) });
  $('#id_sc_field_ope43' + iSeqRow).bind('blur', function() { sc_form_movcte2_ope43_onblur(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_movcte2_ope43_onfocus(this, iSeqRow) });
  $('#id_sc_field_tfin43' + iSeqRow).bind('blur', function() { sc_form_movcte2_tfin43_onblur(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_movcte2_tfin43_onfocus(this, iSeqRow) });
  $('#id_sc_field_fin43' + iSeqRow).bind('blur', function() { sc_form_movcte2_fin43_onblur(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_movcte2_fin43_onfocus(this, iSeqRow) });
  $('#id_sc_field_ban43' + iSeqRow).bind('blur', function() { sc_form_movcte2_ban43_onblur(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_movcte2_ban43_onfocus(this, iSeqRow) });
  $('#id_sc_field_cobrador43' + iSeqRow).bind('blur', function() { sc_form_movcte2_cobrador43_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_movcte2_cobrador43_onfocus(this, iSeqRow) });
  $('#id_sc_field_coordinador43' + iSeqRow).bind('blur', function() { sc_form_movcte2_coordinador43_onblur(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_movcte2_coordinador43_onfocus(this, iSeqRow) });
  $('#id_sc_field_cierre' + iSeqRow).bind('blur', function() { sc_form_movcte2_cierre_onblur(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_movcte2_cierre_onfocus(this, iSeqRow) });
  $('#id_sc_field_idcierre' + iSeqRow).bind('blur', function() { sc_form_movcte2_idcierre_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_movcte2_idcierre_onfocus(this, iSeqRow) });
  $('#id_sc_field_num_bco_dep' + iSeqRow).bind('blur', function() { sc_form_movcte2_num_bco_dep_onblur(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_movcte2_num_bco_dep_onfocus(this, iSeqRow) });
  $('#id_sc_field_num_deposito' + iSeqRow).bind('blur', function() { sc_form_movcte2_num_deposito_onblur(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_movcte2_num_deposito_onfocus(this, iSeqRow) });
  $('#id_sc_field_num_doc_cont' + iSeqRow).bind('blur', function() { sc_form_movcte2_num_doc_cont_onblur(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_movcte2_num_doc_cont_onfocus(this, iSeqRow) });
  $('#id_sc_field_tip_doc_cont' + iSeqRow).bind('blur', function() { sc_form_movcte2_tip_doc_cont_onblur(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_movcte2_tip_doc_cont_onfocus(this, iSeqRow) });
  $('#id_sc_field_idb' + iSeqRow).bind('blur', function() { sc_form_movcte2_idb_onblur(this, iSeqRow) })
                                 .bind('focus', function() { sc_form_movcte2_idb_onfocus(this, iSeqRow) });
  $('#id_sc_field_tipocomptehis' + iSeqRow).bind('blur', function() { sc_form_movcte2_tipocomptehis_onblur(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_movcte2_tipocomptehis_onfocus(this, iSeqRow) });
  $('#id_sc_field_datosretcliente' + iSeqRow).bind('blur', function() { sc_form_movcte2_datosretcliente_onblur(this, iSeqRow) })
                                             .bind('focus', function() { sc_form_movcte2_datosretcliente_onfocus(this, iSeqRow) });
  $('#id_sc_field_valoresretcliente' + iSeqRow).bind('blur', function() { sc_form_movcte2_valoresretcliente_onblur(this, iSeqRow) })
                                               .bind('focus', function() { sc_form_movcte2_valoresretcliente_onfocus(this, iSeqRow) });
  $('#id_sc_field_beneficiario43' + iSeqRow).bind('blur', function() { sc_form_movcte2_beneficiario43_onblur(this, iSeqRow) })
                                            .bind('focus', function() { sc_form_movcte2_beneficiario43_onfocus(this, iSeqRow) });
  $('#id_sc_field_numero_cuenta' + iSeqRow).bind('blur', function() { sc_form_movcte2_numero_cuenta_onblur(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_movcte2_numero_cuenta_onfocus(this, iSeqRow) });
  $('#id_sc_field_fecha_creacion_del_65' + iSeqRow).bind('blur', function() { sc_form_movcte2_fecha_creacion_del_65_onblur(this, iSeqRow) })
                                                   .bind('focus', function() { sc_form_movcte2_fecha_creacion_del_65_onfocus(this, iSeqRow) });
  $('#id_sc_field_fecha_creacion_del_65_hora' + iSeqRow).bind('blur', function() { sc_form_movcte2_fecha_creacion_del_65_onblur(this, iSeqRow) })
                                                        .bind('focus', function() { sc_form_movcte2_fecha_creacion_del_65_onfocus(this, iSeqRow) });
  $('#id_sc_field_adicional' + iSeqRow).bind('blur', function() { sc_form_movcte2_adicional_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_movcte2_adicional_onfocus(this, iSeqRow) });
  $('#id_sc_field_fecha_adicional' + iSeqRow).bind('blur', function() { sc_form_movcte2_fecha_adicional_onblur(this, iSeqRow) })
                                             .bind('focus', function() { sc_form_movcte2_fecha_adicional_onfocus(this, iSeqRow) });
  $('#id_sc_field_id_cotizacion' + iSeqRow).bind('blur', function() { sc_form_movcte2_id_cotizacion_onblur(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_movcte2_id_cotizacion_onfocus(this, iSeqRow) });
  $('#id_sc_field_id_cuotas_tabla_pagos' + iSeqRow).bind('blur', function() { sc_form_movcte2_id_cuotas_tabla_pagos_onblur(this, iSeqRow) })
                                                   .bind('focus', function() { sc_form_movcte2_id_cuotas_tabla_pagos_onfocus(this, iSeqRow) });
  $('#id_sc_field_institucion' + iSeqRow).bind('blur', function() { sc_form_movcte2_institucion_onblur(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_movcte2_institucion_onfocus(this, iSeqRow) });
  $('#id_sc_field_estado_electronico' + iSeqRow).bind('blur', function() { sc_form_movcte2_estado_electronico_onblur(this, iSeqRow) })
                                                .bind('focus', function() { sc_form_movcte2_estado_electronico_onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_movcte2_codcte43_onblur(oThis, iSeqRow) {
  do_ajax_form_movcte2_mob_validate_codcte43();
  scCssBlur(oThis);
}

function sc_form_movcte2_codcte43_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_movcte2_tipodoc43_onblur(oThis, iSeqRow) {
  do_ajax_form_movcte2_mob_validate_tipodoc43();
  scCssBlur(oThis);
}

function sc_form_movcte2_tipodoc43_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_movcte2_numdoc43_onblur(oThis, iSeqRow) {
  do_ajax_form_movcte2_mob_validate_numdoc43();
  scCssBlur(oThis);
}

function sc_form_movcte2_numdoc43_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_movcte2_ocurren43_onblur(oThis, iSeqRow) {
  do_ajax_form_movcte2_mob_validate_ocurren43();
  scCssBlur(oThis);
}

function sc_form_movcte2_ocurren43_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_movcte2_cocte43_onblur(oThis, iSeqRow) {
  do_ajax_form_movcte2_mob_validate_cocte43();
  scCssBlur(oThis);
}

function sc_form_movcte2_cocte43_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_movcte2_fecdoc43_onblur(oThis, iSeqRow) {
  do_ajax_form_movcte2_mob_validate_fecdoc43();
  scCssBlur(oThis);
}

function sc_form_movcte2_fecdoc43_onblur(oThis, iSeqRow) {
  do_ajax_form_movcte2_mob_validate_fecdoc43();
  scCssBlur(oThis);
}

function sc_form_movcte2_fecdoc43_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_movcte2_fecdoc43_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_movcte2_tipdoc43_onblur(oThis, iSeqRow) {
  do_ajax_form_movcte2_mob_validate_tipdoc43();
  scCssBlur(oThis);
}

function sc_form_movcte2_tipdoc43_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_movcte2_numvencob43_onblur(oThis, iSeqRow) {
  do_ajax_form_movcte2_mob_validate_numvencob43();
  scCssBlur(oThis);
}

function sc_form_movcte2_numvencob43_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_movcte2_fedoc43_onblur(oThis, iSeqRow) {
  do_ajax_form_movcte2_mob_validate_fedoc43();
  scCssBlur(oThis);
}

function sc_form_movcte2_fedoc43_onblur(oThis, iSeqRow) {
  do_ajax_form_movcte2_mob_validate_fedoc43();
  scCssBlur(oThis);
}

function sc_form_movcte2_fedoc43_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_movcte2_fedoc43_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_movcte2_totdoc43_onblur(oThis, iSeqRow) {
  do_ajax_form_movcte2_mob_validate_totdoc43();
  scCssBlur(oThis);
}

function sc_form_movcte2_totdoc43_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_movcte2_detalle43_onblur(oThis, iSeqRow) {
  do_ajax_form_movcte2_mob_validate_detalle43();
  scCssBlur(oThis);
}

function sc_form_movcte2_detalle43_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_movcte2_cvanioant43_onblur(oThis, iSeqRow) {
  do_ajax_form_movcte2_mob_validate_cvanioant43();
  scCssBlur(oThis);
}

function sc_form_movcte2_cvanioant43_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_movcte2_cvdivisa43_onblur(oThis, iSeqRow) {
  do_ajax_form_movcte2_mob_validate_cvdivisa43();
  scCssBlur(oThis);
}

function sc_form_movcte2_cvdivisa43_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_movcte2_valdivisa43_onblur(oThis, iSeqRow) {
  do_ajax_form_movcte2_mob_validate_valdivisa43();
  scCssBlur(oThis);
}

function sc_form_movcte2_valdivisa43_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_movcte2_valdivisaori43_onblur(oThis, iSeqRow) {
  do_ajax_form_movcte2_mob_validate_valdivisaori43();
  scCssBlur(oThis);
}

function sc_form_movcte2_valdivisaori43_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_movcte2_factcompra43_onblur(oThis, iSeqRow) {
  do_ajax_form_movcte2_mob_validate_factcompra43();
  scCssBlur(oThis);
}

function sc_form_movcte2_factcompra43_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_movcte2_seriecompra43_onblur(oThis, iSeqRow) {
  do_ajax_form_movcte2_mob_validate_seriecompra43();
  scCssBlur(oThis);
}

function sc_form_movcte2_seriecompra43_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_movcte2_autocompra43_onblur(oThis, iSeqRow) {
  do_ajax_form_movcte2_mob_validate_autocompra43();
  scCssBlur(oThis);
}

function sc_form_movcte2_autocompra43_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_movcte2_codret43_onblur(oThis, iSeqRow) {
  do_ajax_form_movcte2_mob_validate_codret43();
  scCssBlur(oThis);
}

function sc_form_movcte2_codret43_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_movcte2_valini43_onblur(oThis, iSeqRow) {
  do_ajax_form_movcte2_mob_validate_valini43();
  scCssBlur(oThis);
}

function sc_form_movcte2_valini43_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_movcte2_numcuotasord43_onblur(oThis, iSeqRow) {
  do_ajax_form_movcte2_mob_validate_numcuotasord43();
  scCssBlur(oThis);
}

function sc_form_movcte2_numcuotasord43_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_movcte2_valormov43_onblur(oThis, iSeqRow) {
  do_ajax_form_movcte2_mob_validate_valormov43();
  scCssBlur(oThis);
}

function sc_form_movcte2_valormov43_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_movcte2_saldoregmov43_onblur(oThis, iSeqRow) {
  do_ajax_form_movcte2_mob_validate_saldoregmov43();
  scCssBlur(oThis);
}

function sc_form_movcte2_saldoregmov43_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_movcte2_feccobro43_onblur(oThis, iSeqRow) {
  do_ajax_form_movcte2_mob_validate_feccobro43();
  scCssBlur(oThis);
}

function sc_form_movcte2_feccobro43_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_movcte2_codpagounif43_onblur(oThis, iSeqRow) {
  do_ajax_form_movcte2_mob_validate_codpagounif43();
  scCssBlur(oThis);
}

function sc_form_movcte2_codpagounif43_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_movcte2_tipodocdb43_onblur(oThis, iSeqRow) {
  do_ajax_form_movcte2_mob_validate_tipodocdb43();
  scCssBlur(oThis);
}

function sc_form_movcte2_tipodocdb43_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_movcte2_numdocdb43_onblur(oThis, iSeqRow) {
  do_ajax_form_movcte2_mob_validate_numdocdb43();
  scCssBlur(oThis);
}

function sc_form_movcte2_numdocdb43_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_movcte2_ocurrecdocdb43_onblur(oThis, iSeqRow) {
  do_ajax_form_movcte2_mob_validate_ocurrecdocdb43();
  scCssBlur(oThis);
}

function sc_form_movcte2_ocurrecdocdb43_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_movcte2_numrecibo43_onblur(oThis, iSeqRow) {
  do_ajax_form_movcte2_mob_validate_numrecibo43();
  scCssBlur(oThis);
}

function sc_form_movcte2_numrecibo43_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_movcte2_valorabono43_onblur(oThis, iSeqRow) {
  do_ajax_form_movcte2_mob_validate_valorabono43();
  scCssBlur(oThis);
}

function sc_form_movcte2_valorabono43_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_movcte2_efectcheque43_onblur(oThis, iSeqRow) {
  do_ajax_form_movcte2_mob_validate_efectcheque43();
  scCssBlur(oThis);
}

function sc_form_movcte2_efectcheque43_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_movcte2_saldoexceso43_onblur(oThis, iSeqRow) {
  do_ajax_form_movcte2_mob_validate_saldoexceso43();
  scCssBlur(oThis);
}

function sc_form_movcte2_saldoexceso43_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_movcte2_saldocte43_onblur(oThis, iSeqRow) {
  do_ajax_form_movcte2_mob_validate_saldocte43();
  scCssBlur(oThis);
}

function sc_form_movcte2_saldocte43_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_movcte2_codpago43_onblur(oThis, iSeqRow) {
  do_ajax_form_movcte2_mob_validate_codpago43();
  scCssBlur(oThis);
}

function sc_form_movcte2_codpago43_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_movcte2_numdocpago43_onblur(oThis, iSeqRow) {
  do_ajax_form_movcte2_mob_validate_numdocpago43();
  scCssBlur(oThis);
}

function sc_form_movcte2_numdocpago43_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_movcte2_obsdocpago43_onblur(oThis, iSeqRow) {
  do_ajax_form_movcte2_mob_validate_obsdocpago43();
  scCssBlur(oThis);
}

function sc_form_movcte2_obsdocpago43_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_movcte2_uid_onblur(oThis, iSeqRow) {
  do_ajax_form_movcte2_mob_validate_uid();
  scCssBlur(oThis);
}

function sc_form_movcte2_uid_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_movcte2_cvtransfer43_onblur(oThis, iSeqRow) {
  do_ajax_form_movcte2_mob_validate_cvtransfer43();
  scCssBlur(oThis);
}

function sc_form_movcte2_cvtransfer43_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_movcte2_fectransfer43_onblur(oThis, iSeqRow) {
  do_ajax_form_movcte2_mob_validate_fectransfer43();
  scCssBlur(oThis);
}

function sc_form_movcte2_fectransfer43_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_movcte2_fecvendoc43_onblur(oThis, iSeqRow) {
  do_ajax_form_movcte2_mob_validate_fecvendoc43();
  scCssBlur(oThis);
}

function sc_form_movcte2_fecvendoc43_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_movcte2_fecvenret43_onblur(oThis, iSeqRow) {
  do_ajax_form_movcte2_mob_validate_fecvenret43();
  scCssBlur(oThis);
}

function sc_form_movcte2_fecvenret43_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_movcte2_numautoret43_onblur(oThis, iSeqRow) {
  do_ajax_form_movcte2_mob_validate_numautoret43();
  scCssBlur(oThis);
}

function sc_form_movcte2_numautoret43_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_movcte2_cvanulado43_onblur(oThis, iSeqRow) {
  do_ajax_form_movcte2_mob_validate_cvanulado43();
  scCssBlur(oThis);
}

function sc_form_movcte2_cvanulado43_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_movcte2_conta43_onblur(oThis, iSeqRow) {
  do_ajax_form_movcte2_mob_validate_conta43();
  scCssBlur(oThis);
}

function sc_form_movcte2_conta43_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_movcte2_relacioncob43_onblur(oThis, iSeqRow) {
  do_ajax_form_movcte2_mob_validate_relacioncob43();
  scCssBlur(oThis);
}

function sc_form_movcte2_relacioncob43_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_movcte2_estadocob43_onblur(oThis, iSeqRow) {
  do_ajax_form_movcte2_mob_validate_estadocob43();
  scCssBlur(oThis);
}

function sc_form_movcte2_estadocob43_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_movcte2_nuevocodpago43_onblur(oThis, iSeqRow) {
  do_ajax_form_movcte2_mob_validate_nuevocodpago43();
  scCssBlur(oThis);
}

function sc_form_movcte2_nuevocodpago43_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_movcte2_porccomision1_onblur(oThis, iSeqRow) {
  do_ajax_form_movcte2_mob_validate_porccomision1();
  scCssBlur(oThis);
}

function sc_form_movcte2_porccomision1_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_movcte2_porccomision2_onblur(oThis, iSeqRow) {
  do_ajax_form_movcte2_mob_validate_porccomision2();
  scCssBlur(oThis);
}

function sc_form_movcte2_porccomision2_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_movcte2_porcdesctocomision1_onblur(oThis, iSeqRow) {
  do_ajax_form_movcte2_mob_validate_porcdesctocomision1();
  scCssBlur(oThis);
}

function sc_form_movcte2_porcdesctocomision1_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_movcte2_porcdesctocomision2_onblur(oThis, iSeqRow) {
  do_ajax_form_movcte2_mob_validate_porcdesctocomision2();
  scCssBlur(oThis);
}

function sc_form_movcte2_porcdesctocomision2_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_movcte2_ope43_onblur(oThis, iSeqRow) {
  do_ajax_form_movcte2_mob_validate_ope43();
  scCssBlur(oThis);
}

function sc_form_movcte2_ope43_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_movcte2_tfin43_onblur(oThis, iSeqRow) {
  do_ajax_form_movcte2_mob_validate_tfin43();
  scCssBlur(oThis);
}

function sc_form_movcte2_tfin43_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_movcte2_fin43_onblur(oThis, iSeqRow) {
  do_ajax_form_movcte2_mob_validate_fin43();
  scCssBlur(oThis);
}

function sc_form_movcte2_fin43_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_movcte2_ban43_onblur(oThis, iSeqRow) {
  do_ajax_form_movcte2_mob_validate_ban43();
  scCssBlur(oThis);
}

function sc_form_movcte2_ban43_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_movcte2_cobrador43_onblur(oThis, iSeqRow) {
  do_ajax_form_movcte2_mob_validate_cobrador43();
  scCssBlur(oThis);
}

function sc_form_movcte2_cobrador43_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_movcte2_coordinador43_onblur(oThis, iSeqRow) {
  do_ajax_form_movcte2_mob_validate_coordinador43();
  scCssBlur(oThis);
}

function sc_form_movcte2_coordinador43_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_movcte2_cierre_onblur(oThis, iSeqRow) {
  do_ajax_form_movcte2_mob_validate_cierre();
  scCssBlur(oThis);
}

function sc_form_movcte2_cierre_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_movcte2_idcierre_onblur(oThis, iSeqRow) {
  do_ajax_form_movcte2_mob_validate_idcierre();
  scCssBlur(oThis);
}

function sc_form_movcte2_idcierre_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_movcte2_num_bco_dep_onblur(oThis, iSeqRow) {
  do_ajax_form_movcte2_mob_validate_num_bco_dep();
  scCssBlur(oThis);
}

function sc_form_movcte2_num_bco_dep_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_movcte2_num_deposito_onblur(oThis, iSeqRow) {
  do_ajax_form_movcte2_mob_validate_num_deposito();
  scCssBlur(oThis);
}

function sc_form_movcte2_num_deposito_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_movcte2_num_doc_cont_onblur(oThis, iSeqRow) {
  do_ajax_form_movcte2_mob_validate_num_doc_cont();
  scCssBlur(oThis);
}

function sc_form_movcte2_num_doc_cont_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_movcte2_tip_doc_cont_onblur(oThis, iSeqRow) {
  do_ajax_form_movcte2_mob_validate_tip_doc_cont();
  scCssBlur(oThis);
}

function sc_form_movcte2_tip_doc_cont_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_movcte2_idb_onblur(oThis, iSeqRow) {
  do_ajax_form_movcte2_mob_validate_idb();
  scCssBlur(oThis);
}

function sc_form_movcte2_idb_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_movcte2_tipocomptehis_onblur(oThis, iSeqRow) {
  do_ajax_form_movcte2_mob_validate_tipocomptehis();
  scCssBlur(oThis);
}

function sc_form_movcte2_tipocomptehis_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_movcte2_datosretcliente_onblur(oThis, iSeqRow) {
  do_ajax_form_movcte2_mob_validate_datosretcliente();
  scCssBlur(oThis);
}

function sc_form_movcte2_datosretcliente_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_movcte2_valoresretcliente_onblur(oThis, iSeqRow) {
  do_ajax_form_movcte2_mob_validate_valoresretcliente();
  scCssBlur(oThis);
}

function sc_form_movcte2_valoresretcliente_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_movcte2_beneficiario43_onblur(oThis, iSeqRow) {
  do_ajax_form_movcte2_mob_validate_beneficiario43();
  scCssBlur(oThis);
}

function sc_form_movcte2_beneficiario43_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_movcte2_numero_cuenta_onblur(oThis, iSeqRow) {
  do_ajax_form_movcte2_mob_validate_numero_cuenta();
  scCssBlur(oThis);
}

function sc_form_movcte2_numero_cuenta_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_movcte2_fecha_creacion_del_65_onblur(oThis, iSeqRow) {
  do_ajax_form_movcte2_mob_validate_fecha_creacion_del_65();
  scCssBlur(oThis);
}

function sc_form_movcte2_fecha_creacion_del_65_onblur(oThis, iSeqRow) {
  do_ajax_form_movcte2_mob_validate_fecha_creacion_del_65();
  scCssBlur(oThis);
}

function sc_form_movcte2_fecha_creacion_del_65_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_movcte2_fecha_creacion_del_65_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_movcte2_adicional_onblur(oThis, iSeqRow) {
  do_ajax_form_movcte2_mob_validate_adicional();
  scCssBlur(oThis);
}

function sc_form_movcte2_adicional_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_movcte2_fecha_adicional_onblur(oThis, iSeqRow) {
  do_ajax_form_movcte2_mob_validate_fecha_adicional();
  scCssBlur(oThis);
}

function sc_form_movcte2_fecha_adicional_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_movcte2_id_cotizacion_onblur(oThis, iSeqRow) {
  do_ajax_form_movcte2_mob_validate_id_cotizacion();
  scCssBlur(oThis);
}

function sc_form_movcte2_id_cotizacion_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_movcte2_id_cuotas_tabla_pagos_onblur(oThis, iSeqRow) {
  do_ajax_form_movcte2_mob_validate_id_cuotas_tabla_pagos();
  scCssBlur(oThis);
}

function sc_form_movcte2_id_cuotas_tabla_pagos_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_movcte2_institucion_onblur(oThis, iSeqRow) {
  do_ajax_form_movcte2_mob_validate_institucion();
  scCssBlur(oThis);
}

function sc_form_movcte2_institucion_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_movcte2_estado_electronico_onblur(oThis, iSeqRow) {
  do_ajax_form_movcte2_mob_validate_estado_electronico();
  scCssBlur(oThis);
}

function sc_form_movcte2_estado_electronico_onfocus(oThis, iSeqRow) {
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
	displayChange_field("fecvendoc43", "", status);
	displayChange_field("fecvenret43", "", status);
	displayChange_field("numautoret43", "", status);
	displayChange_field("cvanulado43", "", status);
	displayChange_field("conta43", "", status);
	displayChange_field("relacioncob43", "", status);
	displayChange_field("estadocob43", "", status);
	displayChange_field("nuevocodpago43", "", status);
	displayChange_field("porccomision1", "", status);
	displayChange_field("porccomision2", "", status);
	displayChange_field("porcdesctocomision1", "", status);
	displayChange_field("porcdesctocomision2", "", status);
	displayChange_field("ope43", "", status);
	displayChange_field("tfin43", "", status);
	displayChange_field("fin43", "", status);
	displayChange_field("ban43", "", status);
	displayChange_field("cobrador43", "", status);
	displayChange_field("coordinador43", "", status);
	displayChange_field("cierre", "", status);
	displayChange_field("idcierre", "", status);
	displayChange_field("num_bco_dep", "", status);
	displayChange_field("num_deposito", "", status);
	displayChange_field("num_doc_cont", "", status);
	displayChange_field("tip_doc_cont", "", status);
	displayChange_field("idb", "", status);
	displayChange_field("tipocomptehis", "", status);
	displayChange_field("datosretcliente", "", status);
	displayChange_field("valoresretcliente", "", status);
	displayChange_field("beneficiario43", "", status);
	displayChange_field("numero_cuenta", "", status);
	displayChange_field("fecha_creacion_del_65", "", status);
	displayChange_field("adicional", "", status);
	displayChange_field("fecha_adicional", "", status);
	displayChange_field("id_cotizacion", "", status);
	displayChange_field("id_cuotas_tabla_pagos", "", status);
	displayChange_field("institucion", "", status);
	displayChange_field("estado_electronico", "", status);
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
	displayChange_field_fecvendoc43(row, status);
	displayChange_field_fecvenret43(row, status);
	displayChange_field_numautoret43(row, status);
	displayChange_field_cvanulado43(row, status);
	displayChange_field_conta43(row, status);
	displayChange_field_relacioncob43(row, status);
	displayChange_field_estadocob43(row, status);
	displayChange_field_nuevocodpago43(row, status);
	displayChange_field_porccomision1(row, status);
	displayChange_field_porccomision2(row, status);
	displayChange_field_porcdesctocomision1(row, status);
	displayChange_field_porcdesctocomision2(row, status);
	displayChange_field_ope43(row, status);
	displayChange_field_tfin43(row, status);
	displayChange_field_fin43(row, status);
	displayChange_field_ban43(row, status);
	displayChange_field_cobrador43(row, status);
	displayChange_field_coordinador43(row, status);
	displayChange_field_cierre(row, status);
	displayChange_field_idcierre(row, status);
	displayChange_field_num_bco_dep(row, status);
	displayChange_field_num_deposito(row, status);
	displayChange_field_num_doc_cont(row, status);
	displayChange_field_tip_doc_cont(row, status);
	displayChange_field_idb(row, status);
	displayChange_field_tipocomptehis(row, status);
	displayChange_field_datosretcliente(row, status);
	displayChange_field_valoresretcliente(row, status);
	displayChange_field_beneficiario43(row, status);
	displayChange_field_numero_cuenta(row, status);
	displayChange_field_fecha_creacion_del_65(row, status);
	displayChange_field_adicional(row, status);
	displayChange_field_fecha_adicional(row, status);
	displayChange_field_id_cotizacion(row, status);
	displayChange_field_id_cuotas_tabla_pagos(row, status);
	displayChange_field_institucion(row, status);
	displayChange_field_estado_electronico(row, status);
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
	if ("fecvendoc43" == field) {
		displayChange_field_fecvendoc43(row, status);
	}
	if ("fecvenret43" == field) {
		displayChange_field_fecvenret43(row, status);
	}
	if ("numautoret43" == field) {
		displayChange_field_numautoret43(row, status);
	}
	if ("cvanulado43" == field) {
		displayChange_field_cvanulado43(row, status);
	}
	if ("conta43" == field) {
		displayChange_field_conta43(row, status);
	}
	if ("relacioncob43" == field) {
		displayChange_field_relacioncob43(row, status);
	}
	if ("estadocob43" == field) {
		displayChange_field_estadocob43(row, status);
	}
	if ("nuevocodpago43" == field) {
		displayChange_field_nuevocodpago43(row, status);
	}
	if ("porccomision1" == field) {
		displayChange_field_porccomision1(row, status);
	}
	if ("porccomision2" == field) {
		displayChange_field_porccomision2(row, status);
	}
	if ("porcdesctocomision1" == field) {
		displayChange_field_porcdesctocomision1(row, status);
	}
	if ("porcdesctocomision2" == field) {
		displayChange_field_porcdesctocomision2(row, status);
	}
	if ("ope43" == field) {
		displayChange_field_ope43(row, status);
	}
	if ("tfin43" == field) {
		displayChange_field_tfin43(row, status);
	}
	if ("fin43" == field) {
		displayChange_field_fin43(row, status);
	}
	if ("ban43" == field) {
		displayChange_field_ban43(row, status);
	}
	if ("cobrador43" == field) {
		displayChange_field_cobrador43(row, status);
	}
	if ("coordinador43" == field) {
		displayChange_field_coordinador43(row, status);
	}
	if ("cierre" == field) {
		displayChange_field_cierre(row, status);
	}
	if ("idcierre" == field) {
		displayChange_field_idcierre(row, status);
	}
	if ("num_bco_dep" == field) {
		displayChange_field_num_bco_dep(row, status);
	}
	if ("num_deposito" == field) {
		displayChange_field_num_deposito(row, status);
	}
	if ("num_doc_cont" == field) {
		displayChange_field_num_doc_cont(row, status);
	}
	if ("tip_doc_cont" == field) {
		displayChange_field_tip_doc_cont(row, status);
	}
	if ("idb" == field) {
		displayChange_field_idb(row, status);
	}
	if ("tipocomptehis" == field) {
		displayChange_field_tipocomptehis(row, status);
	}
	if ("datosretcliente" == field) {
		displayChange_field_datosretcliente(row, status);
	}
	if ("valoresretcliente" == field) {
		displayChange_field_valoresretcliente(row, status);
	}
	if ("beneficiario43" == field) {
		displayChange_field_beneficiario43(row, status);
	}
	if ("numero_cuenta" == field) {
		displayChange_field_numero_cuenta(row, status);
	}
	if ("fecha_creacion_del_65" == field) {
		displayChange_field_fecha_creacion_del_65(row, status);
	}
	if ("adicional" == field) {
		displayChange_field_adicional(row, status);
	}
	if ("fecha_adicional" == field) {
		displayChange_field_fecha_adicional(row, status);
	}
	if ("id_cotizacion" == field) {
		displayChange_field_id_cotizacion(row, status);
	}
	if ("id_cuotas_tabla_pagos" == field) {
		displayChange_field_id_cuotas_tabla_pagos(row, status);
	}
	if ("institucion" == field) {
		displayChange_field_institucion(row, status);
	}
	if ("estado_electronico" == field) {
		displayChange_field_estado_electronico(row, status);
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

function displayChange_field_fecvendoc43(row, status) {
    var fieldId;
}

function displayChange_field_fecvenret43(row, status) {
    var fieldId;
}

function displayChange_field_numautoret43(row, status) {
    var fieldId;
}

function displayChange_field_cvanulado43(row, status) {
    var fieldId;
}

function displayChange_field_conta43(row, status) {
    var fieldId;
}

function displayChange_field_relacioncob43(row, status) {
    var fieldId;
}

function displayChange_field_estadocob43(row, status) {
    var fieldId;
}

function displayChange_field_nuevocodpago43(row, status) {
    var fieldId;
}

function displayChange_field_porccomision1(row, status) {
    var fieldId;
}

function displayChange_field_porccomision2(row, status) {
    var fieldId;
}

function displayChange_field_porcdesctocomision1(row, status) {
    var fieldId;
}

function displayChange_field_porcdesctocomision2(row, status) {
    var fieldId;
}

function displayChange_field_ope43(row, status) {
    var fieldId;
}

function displayChange_field_tfin43(row, status) {
    var fieldId;
}

function displayChange_field_fin43(row, status) {
    var fieldId;
}

function displayChange_field_ban43(row, status) {
    var fieldId;
}

function displayChange_field_cobrador43(row, status) {
    var fieldId;
}

function displayChange_field_coordinador43(row, status) {
    var fieldId;
}

function displayChange_field_cierre(row, status) {
    var fieldId;
}

function displayChange_field_idcierre(row, status) {
    var fieldId;
}

function displayChange_field_num_bco_dep(row, status) {
    var fieldId;
}

function displayChange_field_num_deposito(row, status) {
    var fieldId;
}

function displayChange_field_num_doc_cont(row, status) {
    var fieldId;
}

function displayChange_field_tip_doc_cont(row, status) {
    var fieldId;
}

function displayChange_field_idb(row, status) {
    var fieldId;
}

function displayChange_field_tipocomptehis(row, status) {
    var fieldId;
}

function displayChange_field_datosretcliente(row, status) {
    var fieldId;
}

function displayChange_field_valoresretcliente(row, status) {
    var fieldId;
}

function displayChange_field_beneficiario43(row, status) {
    var fieldId;
}

function displayChange_field_numero_cuenta(row, status) {
    var fieldId;
}

function displayChange_field_fecha_creacion_del_65(row, status) {
    var fieldId;
}

function displayChange_field_adicional(row, status) {
    var fieldId;
}

function displayChange_field_fecha_adicional(row, status) {
    var fieldId;
}

function displayChange_field_id_cotizacion(row, status) {
    var fieldId;
}

function displayChange_field_id_cuotas_tabla_pagos(row, status) {
    var fieldId;
}

function displayChange_field_institucion(row, status) {
    var fieldId;
}

function displayChange_field_estado_electronico(row, status) {
    var fieldId;
}

function scRecreateSelect2() {
}
function scResetPagesDisplay() {
	$(".sc-form-page").show();
}

function scHidePage(pageNo) {
	$("#id_form_movcte2_mob_form" + pageNo).hide();
}

function scCheckNoPageSelected() {
	if (!$(".sc-form-page").filter(".scTabActive").filter(":visible").length) {
		var inactiveTabs = $(".sc-form-page").filter(".scTabInactive").filter(":visible");
		if (inactiveTabs.length) {
			var tabNo = $(inactiveTabs[0]).attr("id").substr(24);
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
      do_ajax_form_movcte2_mob_validate_fecdoc43(iSeqRow);
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
      do_ajax_form_movcte2_mob_validate_fedoc43(iSeqRow);
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
      do_ajax_form_movcte2_mob_validate_feccobro43(iSeqRow);
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
      do_ajax_form_movcte2_mob_validate_fectransfer43(iSeqRow);
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
  $("#id_sc_field_fecvendoc43" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_fecvendoc43" + iSeqRow] = $oField.val();
    },
    onClose: function(dateText, inst) {
      do_ajax_form_movcte2_mob_validate_fecvendoc43(iSeqRow);
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
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', $_SESSION['scriptcase']['reg_conf']['date_sep']), array('', 'yyyy', ''), $this->field_config['fecvendoc43']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
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
      do_ajax_form_movcte2_mob_validate_fecvenret43(iSeqRow);
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
  $("#id_sc_field_fecha_creacion_del_65" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_fecha_creacion_del_65" + iSeqRow] = $oField.val();
      if (2 == aParts.length) {
        sTime = " " + aParts[1];
      }
      if ('' == sTime || ' ' == sTime) {
        sTime = ' <?php echo $this->jqueryCalendarTimeStart($this->field_config['fecha_creacion_del_65']['date_format']); ?>';
      }
      $oField.datepicker("option", "dateFormat", "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', 'hh', 'ii', 'ss', ':', ';', $_SESSION['scriptcase']['reg_conf']['date_sep'], $_SESSION['scriptcase']['reg_conf']['time_sep']), array('', 'yyyy', '','','', '', '', '', ''), $this->field_config['fecha_creacion_del_65']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>" + sTime);
    },
    onClose: function(dateText, inst) {
      do_ajax_form_movcte2_mob_validate_fecha_creacion_del_65(iSeqRow);
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
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', 'hh', 'ii', 'ss', ':', ';', $_SESSION['scriptcase']['reg_conf']['date_sep'], $_SESSION['scriptcase']['reg_conf']['time_sep']), array('', 'yyyy', '','','', '', '', '', ''), $this->field_config['fecha_creacion_del_65']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
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
  $("#id_sc_field_fecha_adicional" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_fecha_adicional" + iSeqRow] = $oField.val();
    },
    onClose: function(dateText, inst) {
      do_ajax_form_movcte2_mob_validate_fecha_adicional(iSeqRow);
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
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', $_SESSION['scriptcase']['reg_conf']['date_sep']), array('', 'yyyy', ''), $this->field_config['fecha_adicional']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
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
                         $(t).html("<a href=\"javascript:nm_mostra_doc('0', '"+rs2+"', 'form_movcte2_mob')\">"+$('#id_read_on_'+field+iSeqRow).text()+"</a>");
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

