
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
  scEventControl_data["codcte01" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["nomcte01" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["cv1cte01" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["cv2cte01" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["tipcte01" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["ofienccte01" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["vendcte01" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["cobrcte01" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["loccte01" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["dircte01" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["telcte01" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["cascte01" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["fecing01" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["condpag01" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["desctocte01" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["limcred01" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["desppar01" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["cheqpro01" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["sdoeje01" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["sdoant01" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["sdoact01" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["acudbm01" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["acucrm01" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["acudbe01" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["acucre01" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["comentcte01" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["statuscte01" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["identcte01" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["cordcte01" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["limcant01" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["pagleg01" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["telcte01b" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["telcte01c" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["emailcte01" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["ctacgcte01" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["obsercte01" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["totexceso01" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["imagencte01" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["block" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["uid" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["ultimoacceso" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["idcli" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["catcte01" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["numautosri01" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["seriedoc01" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["fecvencdoc01" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["repleg01" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["coddest01" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["longitud01" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["latitud01" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["zoom01" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["coniva01" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["conret01" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["tipo_identificacion" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["es_padre" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["bonos" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["rendimiento" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["parterel01" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["clase_contribuyente" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["tipo_contribuyente" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["lleva_contabilidad" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["ctacgant01" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["residentefiscal01" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["es_cliente" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["grupos" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["codigo_banco" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["tipo_cuenta_banco" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["nro_cuenta_banco" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["pago_transferencia" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["codcte01" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["codcte01" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["nomcte01" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["nomcte01" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["cv1cte01" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["cv1cte01" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["cv2cte01" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["cv2cte01" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["tipcte01" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["tipcte01" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["ofienccte01" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["ofienccte01" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["vendcte01" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["vendcte01" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["cobrcte01" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["cobrcte01" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["loccte01" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["loccte01" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["dircte01" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["dircte01" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["telcte01" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["telcte01" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["cascte01" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["cascte01" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["fecing01" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["fecing01" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["condpag01" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["condpag01" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["desctocte01" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["desctocte01" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["limcred01" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["limcred01" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["desppar01" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["desppar01" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["cheqpro01" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["cheqpro01" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["sdoeje01" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["sdoeje01" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["sdoant01" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["sdoant01" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["sdoact01" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["sdoact01" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["acudbm01" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["acudbm01" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["acucrm01" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["acucrm01" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["acudbe01" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["acudbe01" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["acucre01" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["acucre01" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["comentcte01" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["comentcte01" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["statuscte01" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["statuscte01" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["identcte01" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["identcte01" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["cordcte01" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["cordcte01" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["limcant01" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["limcant01" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["pagleg01" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["pagleg01" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["telcte01b" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["telcte01b" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["telcte01c" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["telcte01c" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["emailcte01" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["emailcte01" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["ctacgcte01" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["ctacgcte01" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["obsercte01" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["obsercte01" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["totexceso01" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["totexceso01" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["imagencte01" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["imagencte01" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["block" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["block" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["uid" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["uid" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["ultimoacceso" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["ultimoacceso" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["idcli" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["idcli" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["catcte01" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["catcte01" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["numautosri01" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["numautosri01" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["seriedoc01" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["seriedoc01" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["fecvencdoc01" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["fecvencdoc01" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["repleg01" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["repleg01" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["coddest01" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["coddest01" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["longitud01" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["longitud01" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["latitud01" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["latitud01" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["zoom01" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["zoom01" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["coniva01" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["coniva01" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["conret01" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["conret01" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["tipo_identificacion" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["tipo_identificacion" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["es_padre" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["es_padre" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["bonos" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["bonos" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["rendimiento" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["rendimiento" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["parterel01" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["parterel01" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["clase_contribuyente" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["clase_contribuyente" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["tipo_contribuyente" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["tipo_contribuyente" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["lleva_contabilidad" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["lleva_contabilidad" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["ctacgant01" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["ctacgant01" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["residentefiscal01" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["residentefiscal01" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["es_cliente" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["es_cliente" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["grupos" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["grupos" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["codigo_banco" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["codigo_banco" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["tipo_cuenta_banco" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["tipo_cuenta_banco" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["nro_cuenta_banco" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["nro_cuenta_banco" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["pago_transferencia" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["pago_transferencia" + iSeqRow]["change"]) {
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
  $('#id_sc_field_codcte01' + iSeqRow).bind('blur', function() { sc_form_maepag_codcte01_onblur(this, iSeqRow) })
                                      .bind('change', function() { sc_form_maepag_codcte01_onchange(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_maepag_codcte01_onfocus(this, iSeqRow) });
  $('#id_sc_field_nomcte01' + iSeqRow).bind('blur', function() { sc_form_maepag_nomcte01_onblur(this, iSeqRow) })
                                      .bind('change', function() { sc_form_maepag_nomcte01_onchange(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_maepag_nomcte01_onfocus(this, iSeqRow) });
  $('#id_sc_field_cv1cte01' + iSeqRow).bind('blur', function() { sc_form_maepag_cv1cte01_onblur(this, iSeqRow) })
                                      .bind('change', function() { sc_form_maepag_cv1cte01_onchange(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_maepag_cv1cte01_onfocus(this, iSeqRow) });
  $('#id_sc_field_cv2cte01' + iSeqRow).bind('blur', function() { sc_form_maepag_cv2cte01_onblur(this, iSeqRow) })
                                      .bind('change', function() { sc_form_maepag_cv2cte01_onchange(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_maepag_cv2cte01_onfocus(this, iSeqRow) });
  $('#id_sc_field_tipcte01' + iSeqRow).bind('blur', function() { sc_form_maepag_tipcte01_onblur(this, iSeqRow) })
                                      .bind('change', function() { sc_form_maepag_tipcte01_onchange(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_maepag_tipcte01_onfocus(this, iSeqRow) });
  $('#id_sc_field_ofienccte01' + iSeqRow).bind('blur', function() { sc_form_maepag_ofienccte01_onblur(this, iSeqRow) })
                                         .bind('change', function() { sc_form_maepag_ofienccte01_onchange(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_maepag_ofienccte01_onfocus(this, iSeqRow) });
  $('#id_sc_field_vendcte01' + iSeqRow).bind('blur', function() { sc_form_maepag_vendcte01_onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_form_maepag_vendcte01_onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_maepag_vendcte01_onfocus(this, iSeqRow) });
  $('#id_sc_field_cobrcte01' + iSeqRow).bind('blur', function() { sc_form_maepag_cobrcte01_onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_form_maepag_cobrcte01_onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_maepag_cobrcte01_onfocus(this, iSeqRow) });
  $('#id_sc_field_loccte01' + iSeqRow).bind('blur', function() { sc_form_maepag_loccte01_onblur(this, iSeqRow) })
                                      .bind('change', function() { sc_form_maepag_loccte01_onchange(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_maepag_loccte01_onfocus(this, iSeqRow) });
  $('#id_sc_field_dircte01' + iSeqRow).bind('blur', function() { sc_form_maepag_dircte01_onblur(this, iSeqRow) })
                                      .bind('change', function() { sc_form_maepag_dircte01_onchange(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_maepag_dircte01_onfocus(this, iSeqRow) });
  $('#id_sc_field_telcte01' + iSeqRow).bind('blur', function() { sc_form_maepag_telcte01_onblur(this, iSeqRow) })
                                      .bind('change', function() { sc_form_maepag_telcte01_onchange(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_maepag_telcte01_onfocus(this, iSeqRow) });
  $('#id_sc_field_cascte01' + iSeqRow).bind('blur', function() { sc_form_maepag_cascte01_onblur(this, iSeqRow) })
                                      .bind('change', function() { sc_form_maepag_cascte01_onchange(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_maepag_cascte01_onfocus(this, iSeqRow) });
  $('#id_sc_field_fecing01' + iSeqRow).bind('blur', function() { sc_form_maepag_fecing01_onblur(this, iSeqRow) })
                                      .bind('change', function() { sc_form_maepag_fecing01_onchange(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_maepag_fecing01_onfocus(this, iSeqRow) });
  $('#id_sc_field_fecing01_hora' + iSeqRow).bind('blur', function() { sc_form_maepag_fecing01_hora_onblur(this, iSeqRow) })
                                           .bind('change', function() { sc_form_maepag_fecing01_hora_onchange(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_maepag_fecing01_hora_onfocus(this, iSeqRow) });
  $('#id_sc_field_condpag01' + iSeqRow).bind('blur', function() { sc_form_maepag_condpag01_onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_form_maepag_condpag01_onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_maepag_condpag01_onfocus(this, iSeqRow) });
  $('#id_sc_field_desctocte01' + iSeqRow).bind('blur', function() { sc_form_maepag_desctocte01_onblur(this, iSeqRow) })
                                         .bind('change', function() { sc_form_maepag_desctocte01_onchange(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_maepag_desctocte01_onfocus(this, iSeqRow) });
  $('#id_sc_field_limcred01' + iSeqRow).bind('blur', function() { sc_form_maepag_limcred01_onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_form_maepag_limcred01_onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_maepag_limcred01_onfocus(this, iSeqRow) });
  $('#id_sc_field_desppar01' + iSeqRow).bind('blur', function() { sc_form_maepag_desppar01_onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_form_maepag_desppar01_onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_maepag_desppar01_onfocus(this, iSeqRow) });
  $('#id_sc_field_cheqpro01' + iSeqRow).bind('blur', function() { sc_form_maepag_cheqpro01_onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_form_maepag_cheqpro01_onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_maepag_cheqpro01_onfocus(this, iSeqRow) });
  $('#id_sc_field_sdoeje01' + iSeqRow).bind('blur', function() { sc_form_maepag_sdoeje01_onblur(this, iSeqRow) })
                                      .bind('change', function() { sc_form_maepag_sdoeje01_onchange(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_maepag_sdoeje01_onfocus(this, iSeqRow) });
  $('#id_sc_field_sdoant01' + iSeqRow).bind('blur', function() { sc_form_maepag_sdoant01_onblur(this, iSeqRow) })
                                      .bind('change', function() { sc_form_maepag_sdoant01_onchange(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_maepag_sdoant01_onfocus(this, iSeqRow) });
  $('#id_sc_field_sdoact01' + iSeqRow).bind('blur', function() { sc_form_maepag_sdoact01_onblur(this, iSeqRow) })
                                      .bind('change', function() { sc_form_maepag_sdoact01_onchange(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_maepag_sdoact01_onfocus(this, iSeqRow) });
  $('#id_sc_field_acudbm01' + iSeqRow).bind('blur', function() { sc_form_maepag_acudbm01_onblur(this, iSeqRow) })
                                      .bind('change', function() { sc_form_maepag_acudbm01_onchange(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_maepag_acudbm01_onfocus(this, iSeqRow) });
  $('#id_sc_field_acucrm01' + iSeqRow).bind('blur', function() { sc_form_maepag_acucrm01_onblur(this, iSeqRow) })
                                      .bind('change', function() { sc_form_maepag_acucrm01_onchange(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_maepag_acucrm01_onfocus(this, iSeqRow) });
  $('#id_sc_field_acudbe01' + iSeqRow).bind('blur', function() { sc_form_maepag_acudbe01_onblur(this, iSeqRow) })
                                      .bind('change', function() { sc_form_maepag_acudbe01_onchange(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_maepag_acudbe01_onfocus(this, iSeqRow) });
  $('#id_sc_field_acucre01' + iSeqRow).bind('blur', function() { sc_form_maepag_acucre01_onblur(this, iSeqRow) })
                                      .bind('change', function() { sc_form_maepag_acucre01_onchange(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_maepag_acucre01_onfocus(this, iSeqRow) });
  $('#id_sc_field_comentcte01' + iSeqRow).bind('blur', function() { sc_form_maepag_comentcte01_onblur(this, iSeqRow) })
                                         .bind('change', function() { sc_form_maepag_comentcte01_onchange(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_maepag_comentcte01_onfocus(this, iSeqRow) });
  $('#id_sc_field_statuscte01' + iSeqRow).bind('blur', function() { sc_form_maepag_statuscte01_onblur(this, iSeqRow) })
                                         .bind('change', function() { sc_form_maepag_statuscte01_onchange(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_maepag_statuscte01_onfocus(this, iSeqRow) });
  $('#id_sc_field_identcte01' + iSeqRow).bind('blur', function() { sc_form_maepag_identcte01_onblur(this, iSeqRow) })
                                        .bind('change', function() { sc_form_maepag_identcte01_onchange(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_maepag_identcte01_onfocus(this, iSeqRow) });
  $('#id_sc_field_cordcte01' + iSeqRow).bind('blur', function() { sc_form_maepag_cordcte01_onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_form_maepag_cordcte01_onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_maepag_cordcte01_onfocus(this, iSeqRow) });
  $('#id_sc_field_limcant01' + iSeqRow).bind('blur', function() { sc_form_maepag_limcant01_onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_form_maepag_limcant01_onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_maepag_limcant01_onfocus(this, iSeqRow) });
  $('#id_sc_field_pagleg01' + iSeqRow).bind('blur', function() { sc_form_maepag_pagleg01_onblur(this, iSeqRow) })
                                      .bind('change', function() { sc_form_maepag_pagleg01_onchange(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_maepag_pagleg01_onfocus(this, iSeqRow) });
  $('#id_sc_field_telcte01b' + iSeqRow).bind('blur', function() { sc_form_maepag_telcte01b_onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_form_maepag_telcte01b_onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_maepag_telcte01b_onfocus(this, iSeqRow) });
  $('#id_sc_field_telcte01c' + iSeqRow).bind('blur', function() { sc_form_maepag_telcte01c_onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_form_maepag_telcte01c_onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_maepag_telcte01c_onfocus(this, iSeqRow) });
  $('#id_sc_field_emailcte01' + iSeqRow).bind('blur', function() { sc_form_maepag_emailcte01_onblur(this, iSeqRow) })
                                        .bind('change', function() { sc_form_maepag_emailcte01_onchange(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_maepag_emailcte01_onfocus(this, iSeqRow) });
  $('#id_sc_field_ctacgcte01' + iSeqRow).bind('blur', function() { sc_form_maepag_ctacgcte01_onblur(this, iSeqRow) })
                                        .bind('change', function() { sc_form_maepag_ctacgcte01_onchange(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_maepag_ctacgcte01_onfocus(this, iSeqRow) });
  $('#id_sc_field_obsercte01' + iSeqRow).bind('blur', function() { sc_form_maepag_obsercte01_onblur(this, iSeqRow) })
                                        .bind('change', function() { sc_form_maepag_obsercte01_onchange(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_maepag_obsercte01_onfocus(this, iSeqRow) });
  $('#id_sc_field_totexceso01' + iSeqRow).bind('blur', function() { sc_form_maepag_totexceso01_onblur(this, iSeqRow) })
                                         .bind('change', function() { sc_form_maepag_totexceso01_onchange(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_maepag_totexceso01_onfocus(this, iSeqRow) });
  $('#id_sc_field_imagencte01' + iSeqRow).bind('blur', function() { sc_form_maepag_imagencte01_onblur(this, iSeqRow) })
                                         .bind('change', function() { sc_form_maepag_imagencte01_onchange(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_maepag_imagencte01_onfocus(this, iSeqRow) });
  $('#id_sc_field_block' + iSeqRow).bind('blur', function() { sc_form_maepag_block_onblur(this, iSeqRow) })
                                   .bind('change', function() { sc_form_maepag_block_onchange(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_maepag_block_onfocus(this, iSeqRow) });
  $('#id_sc_field_uid' + iSeqRow).bind('blur', function() { sc_form_maepag_uid_onblur(this, iSeqRow) })
                                 .bind('change', function() { sc_form_maepag_uid_onchange(this, iSeqRow) })
                                 .bind('focus', function() { sc_form_maepag_uid_onfocus(this, iSeqRow) });
  $('#id_sc_field_ultimoacceso' + iSeqRow).bind('blur', function() { sc_form_maepag_ultimoacceso_onblur(this, iSeqRow) })
                                          .bind('change', function() { sc_form_maepag_ultimoacceso_onchange(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_maepag_ultimoacceso_onfocus(this, iSeqRow) });
  $('#id_sc_field_idcli' + iSeqRow).bind('blur', function() { sc_form_maepag_idcli_onblur(this, iSeqRow) })
                                   .bind('change', function() { sc_form_maepag_idcli_onchange(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_maepag_idcli_onfocus(this, iSeqRow) });
  $('#id_sc_field_catcte01' + iSeqRow).bind('blur', function() { sc_form_maepag_catcte01_onblur(this, iSeqRow) })
                                      .bind('change', function() { sc_form_maepag_catcte01_onchange(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_maepag_catcte01_onfocus(this, iSeqRow) });
  $('#id_sc_field_numautosri01' + iSeqRow).bind('blur', function() { sc_form_maepag_numautosri01_onblur(this, iSeqRow) })
                                          .bind('change', function() { sc_form_maepag_numautosri01_onchange(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_maepag_numautosri01_onfocus(this, iSeqRow) });
  $('#id_sc_field_seriedoc01' + iSeqRow).bind('blur', function() { sc_form_maepag_seriedoc01_onblur(this, iSeqRow) })
                                        .bind('change', function() { sc_form_maepag_seriedoc01_onchange(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_maepag_seriedoc01_onfocus(this, iSeqRow) });
  $('#id_sc_field_fecvencdoc01' + iSeqRow).bind('blur', function() { sc_form_maepag_fecvencdoc01_onblur(this, iSeqRow) })
                                          .bind('change', function() { sc_form_maepag_fecvencdoc01_onchange(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_maepag_fecvencdoc01_onfocus(this, iSeqRow) });
  $('#id_sc_field_repleg01' + iSeqRow).bind('blur', function() { sc_form_maepag_repleg01_onblur(this, iSeqRow) })
                                      .bind('change', function() { sc_form_maepag_repleg01_onchange(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_maepag_repleg01_onfocus(this, iSeqRow) });
  $('#id_sc_field_coddest01' + iSeqRow).bind('blur', function() { sc_form_maepag_coddest01_onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_form_maepag_coddest01_onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_maepag_coddest01_onfocus(this, iSeqRow) });
  $('#id_sc_field_longitud01' + iSeqRow).bind('blur', function() { sc_form_maepag_longitud01_onblur(this, iSeqRow) })
                                        .bind('change', function() { sc_form_maepag_longitud01_onchange(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_maepag_longitud01_onfocus(this, iSeqRow) });
  $('#id_sc_field_latitud01' + iSeqRow).bind('blur', function() { sc_form_maepag_latitud01_onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_form_maepag_latitud01_onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_maepag_latitud01_onfocus(this, iSeqRow) });
  $('#id_sc_field_zoom01' + iSeqRow).bind('blur', function() { sc_form_maepag_zoom01_onblur(this, iSeqRow) })
                                    .bind('change', function() { sc_form_maepag_zoom01_onchange(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_maepag_zoom01_onfocus(this, iSeqRow) });
  $('#id_sc_field_coniva01' + iSeqRow).bind('blur', function() { sc_form_maepag_coniva01_onblur(this, iSeqRow) })
                                      .bind('change', function() { sc_form_maepag_coniva01_onchange(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_maepag_coniva01_onfocus(this, iSeqRow) });
  $('#id_sc_field_conret01' + iSeqRow).bind('blur', function() { sc_form_maepag_conret01_onblur(this, iSeqRow) })
                                      .bind('change', function() { sc_form_maepag_conret01_onchange(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_maepag_conret01_onfocus(this, iSeqRow) });
  $('#id_sc_field_tipo_identificacion' + iSeqRow).bind('blur', function() { sc_form_maepag_tipo_identificacion_onblur(this, iSeqRow) })
                                                 .bind('change', function() { sc_form_maepag_tipo_identificacion_onchange(this, iSeqRow) })
                                                 .bind('focus', function() { sc_form_maepag_tipo_identificacion_onfocus(this, iSeqRow) });
  $('#id_sc_field_es_padre' + iSeqRow).bind('blur', function() { sc_form_maepag_es_padre_onblur(this, iSeqRow) })
                                      .bind('change', function() { sc_form_maepag_es_padre_onchange(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_maepag_es_padre_onfocus(this, iSeqRow) });
  $('#id_sc_field_bonos' + iSeqRow).bind('blur', function() { sc_form_maepag_bonos_onblur(this, iSeqRow) })
                                   .bind('change', function() { sc_form_maepag_bonos_onchange(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_maepag_bonos_onfocus(this, iSeqRow) });
  $('#id_sc_field_rendimiento' + iSeqRow).bind('blur', function() { sc_form_maepag_rendimiento_onblur(this, iSeqRow) })
                                         .bind('change', function() { sc_form_maepag_rendimiento_onchange(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_maepag_rendimiento_onfocus(this, iSeqRow) });
  $('#id_sc_field_parterel01' + iSeqRow).bind('blur', function() { sc_form_maepag_parterel01_onblur(this, iSeqRow) })
                                        .bind('change', function() { sc_form_maepag_parterel01_onchange(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_maepag_parterel01_onfocus(this, iSeqRow) });
  $('#id_sc_field_clase_contribuyente' + iSeqRow).bind('blur', function() { sc_form_maepag_clase_contribuyente_onblur(this, iSeqRow) })
                                                 .bind('change', function() { sc_form_maepag_clase_contribuyente_onchange(this, iSeqRow) })
                                                 .bind('focus', function() { sc_form_maepag_clase_contribuyente_onfocus(this, iSeqRow) });
  $('#id_sc_field_tipo_contribuyente' + iSeqRow).bind('blur', function() { sc_form_maepag_tipo_contribuyente_onblur(this, iSeqRow) })
                                                .bind('change', function() { sc_form_maepag_tipo_contribuyente_onchange(this, iSeqRow) })
                                                .bind('focus', function() { sc_form_maepag_tipo_contribuyente_onfocus(this, iSeqRow) });
  $('#id_sc_field_lleva_contabilidad' + iSeqRow).bind('blur', function() { sc_form_maepag_lleva_contabilidad_onblur(this, iSeqRow) })
                                                .bind('change', function() { sc_form_maepag_lleva_contabilidad_onchange(this, iSeqRow) })
                                                .bind('focus', function() { sc_form_maepag_lleva_contabilidad_onfocus(this, iSeqRow) });
  $('#id_sc_field_ctacgant01' + iSeqRow).bind('blur', function() { sc_form_maepag_ctacgant01_onblur(this, iSeqRow) })
                                        .bind('change', function() { sc_form_maepag_ctacgant01_onchange(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_maepag_ctacgant01_onfocus(this, iSeqRow) });
  $('#id_sc_field_residentefiscal01' + iSeqRow).bind('blur', function() { sc_form_maepag_residentefiscal01_onblur(this, iSeqRow) })
                                               .bind('change', function() { sc_form_maepag_residentefiscal01_onchange(this, iSeqRow) })
                                               .bind('focus', function() { sc_form_maepag_residentefiscal01_onfocus(this, iSeqRow) });
  $('#id_sc_field_es_cliente' + iSeqRow).bind('blur', function() { sc_form_maepag_es_cliente_onblur(this, iSeqRow) })
                                        .bind('change', function() { sc_form_maepag_es_cliente_onchange(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_maepag_es_cliente_onfocus(this, iSeqRow) });
  $('#id_sc_field_grupos' + iSeqRow).bind('blur', function() { sc_form_maepag_grupos_onblur(this, iSeqRow) })
                                    .bind('change', function() { sc_form_maepag_grupos_onchange(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_maepag_grupos_onfocus(this, iSeqRow) });
  $('#id_sc_field_codigo_banco' + iSeqRow).bind('blur', function() { sc_form_maepag_codigo_banco_onblur(this, iSeqRow) })
                                          .bind('change', function() { sc_form_maepag_codigo_banco_onchange(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_maepag_codigo_banco_onfocus(this, iSeqRow) });
  $('#id_sc_field_tipo_cuenta_banco' + iSeqRow).bind('blur', function() { sc_form_maepag_tipo_cuenta_banco_onblur(this, iSeqRow) })
                                               .bind('change', function() { sc_form_maepag_tipo_cuenta_banco_onchange(this, iSeqRow) })
                                               .bind('focus', function() { sc_form_maepag_tipo_cuenta_banco_onfocus(this, iSeqRow) });
  $('#id_sc_field_nro_cuenta_banco' + iSeqRow).bind('blur', function() { sc_form_maepag_nro_cuenta_banco_onblur(this, iSeqRow) })
                                              .bind('change', function() { sc_form_maepag_nro_cuenta_banco_onchange(this, iSeqRow) })
                                              .bind('focus', function() { sc_form_maepag_nro_cuenta_banco_onfocus(this, iSeqRow) });
  $('#id_sc_field_pago_transferencia' + iSeqRow).bind('blur', function() { sc_form_maepag_pago_transferencia_onblur(this, iSeqRow) })
                                                .bind('change', function() { sc_form_maepag_pago_transferencia_onchange(this, iSeqRow) })
                                                .bind('focus', function() { sc_form_maepag_pago_transferencia_onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_maepag_codcte01_onblur(oThis, iSeqRow) {
  do_ajax_form_maepag_validate_codcte01();
  scCssBlur(oThis);
}

function sc_form_maepag_codcte01_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_maepag_codcte01_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maepag_nomcte01_onblur(oThis, iSeqRow) {
  do_ajax_form_maepag_validate_nomcte01();
  scCssBlur(oThis);
}

function sc_form_maepag_nomcte01_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_maepag_nomcte01_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maepag_cv1cte01_onblur(oThis, iSeqRow) {
  do_ajax_form_maepag_validate_cv1cte01();
  scCssBlur(oThis);
}

function sc_form_maepag_cv1cte01_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_maepag_cv1cte01_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maepag_cv2cte01_onblur(oThis, iSeqRow) {
  do_ajax_form_maepag_validate_cv2cte01();
  scCssBlur(oThis);
}

function sc_form_maepag_cv2cte01_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_maepag_cv2cte01_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maepag_tipcte01_onblur(oThis, iSeqRow) {
  do_ajax_form_maepag_validate_tipcte01();
  scCssBlur(oThis);
}

function sc_form_maepag_tipcte01_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_maepag_tipcte01_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maepag_ofienccte01_onblur(oThis, iSeqRow) {
  do_ajax_form_maepag_validate_ofienccte01();
  scCssBlur(oThis);
}

function sc_form_maepag_ofienccte01_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_maepag_ofienccte01_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maepag_vendcte01_onblur(oThis, iSeqRow) {
  do_ajax_form_maepag_validate_vendcte01();
  scCssBlur(oThis);
}

function sc_form_maepag_vendcte01_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_maepag_vendcte01_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maepag_cobrcte01_onblur(oThis, iSeqRow) {
  do_ajax_form_maepag_validate_cobrcte01();
  scCssBlur(oThis);
}

function sc_form_maepag_cobrcte01_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_maepag_cobrcte01_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maepag_loccte01_onblur(oThis, iSeqRow) {
  do_ajax_form_maepag_validate_loccte01();
  scCssBlur(oThis);
}

function sc_form_maepag_loccte01_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_maepag_loccte01_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maepag_dircte01_onblur(oThis, iSeqRow) {
  do_ajax_form_maepag_validate_dircte01();
  scCssBlur(oThis);
}

function sc_form_maepag_dircte01_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_maepag_dircte01_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maepag_telcte01_onblur(oThis, iSeqRow) {
  do_ajax_form_maepag_validate_telcte01();
  scCssBlur(oThis);
}

function sc_form_maepag_telcte01_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_maepag_telcte01_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maepag_cascte01_onblur(oThis, iSeqRow) {
  do_ajax_form_maepag_validate_cascte01();
  scCssBlur(oThis);
}

function sc_form_maepag_cascte01_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_maepag_cascte01_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maepag_fecing01_onblur(oThis, iSeqRow) {
  do_ajax_form_maepag_validate_fecing01();
  scCssBlur(oThis);
}

function sc_form_maepag_fecing01_hora_onblur(oThis, iSeqRow) {
  do_ajax_form_maepag_validate_fecing01();
  scCssBlur(oThis);
}

function sc_form_maepag_fecing01_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_maepag_fecing01_hora_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_maepag_fecing01_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maepag_fecing01_hora_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maepag_condpag01_onblur(oThis, iSeqRow) {
  do_ajax_form_maepag_validate_condpag01();
  scCssBlur(oThis);
}

function sc_form_maepag_condpag01_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_maepag_condpag01_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maepag_desctocte01_onblur(oThis, iSeqRow) {
  do_ajax_form_maepag_validate_desctocte01();
  scCssBlur(oThis);
}

function sc_form_maepag_desctocte01_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_maepag_desctocte01_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maepag_limcred01_onblur(oThis, iSeqRow) {
  do_ajax_form_maepag_validate_limcred01();
  scCssBlur(oThis);
}

function sc_form_maepag_limcred01_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_maepag_limcred01_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maepag_desppar01_onblur(oThis, iSeqRow) {
  do_ajax_form_maepag_validate_desppar01();
  scCssBlur(oThis);
}

function sc_form_maepag_desppar01_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_maepag_desppar01_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maepag_cheqpro01_onblur(oThis, iSeqRow) {
  do_ajax_form_maepag_validate_cheqpro01();
  scCssBlur(oThis);
}

function sc_form_maepag_cheqpro01_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_maepag_cheqpro01_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maepag_sdoeje01_onblur(oThis, iSeqRow) {
  do_ajax_form_maepag_validate_sdoeje01();
  scCssBlur(oThis);
}

function sc_form_maepag_sdoeje01_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_maepag_sdoeje01_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maepag_sdoant01_onblur(oThis, iSeqRow) {
  do_ajax_form_maepag_validate_sdoant01();
  scCssBlur(oThis);
}

function sc_form_maepag_sdoant01_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_maepag_sdoant01_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maepag_sdoact01_onblur(oThis, iSeqRow) {
  do_ajax_form_maepag_validate_sdoact01();
  scCssBlur(oThis);
}

function sc_form_maepag_sdoact01_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_maepag_sdoact01_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maepag_acudbm01_onblur(oThis, iSeqRow) {
  do_ajax_form_maepag_validate_acudbm01();
  scCssBlur(oThis);
}

function sc_form_maepag_acudbm01_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_maepag_acudbm01_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maepag_acucrm01_onblur(oThis, iSeqRow) {
  do_ajax_form_maepag_validate_acucrm01();
  scCssBlur(oThis);
}

function sc_form_maepag_acucrm01_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_maepag_acucrm01_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maepag_acudbe01_onblur(oThis, iSeqRow) {
  do_ajax_form_maepag_validate_acudbe01();
  scCssBlur(oThis);
}

function sc_form_maepag_acudbe01_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_maepag_acudbe01_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maepag_acucre01_onblur(oThis, iSeqRow) {
  do_ajax_form_maepag_validate_acucre01();
  scCssBlur(oThis);
}

function sc_form_maepag_acucre01_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_maepag_acucre01_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maepag_comentcte01_onblur(oThis, iSeqRow) {
  do_ajax_form_maepag_validate_comentcte01();
  scCssBlur(oThis);
}

function sc_form_maepag_comentcte01_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_maepag_comentcte01_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maepag_statuscte01_onblur(oThis, iSeqRow) {
  do_ajax_form_maepag_validate_statuscte01();
  scCssBlur(oThis);
}

function sc_form_maepag_statuscte01_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_maepag_statuscte01_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maepag_identcte01_onblur(oThis, iSeqRow) {
  do_ajax_form_maepag_validate_identcte01();
  scCssBlur(oThis);
}

function sc_form_maepag_identcte01_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_maepag_identcte01_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maepag_cordcte01_onblur(oThis, iSeqRow) {
  do_ajax_form_maepag_validate_cordcte01();
  scCssBlur(oThis);
}

function sc_form_maepag_cordcte01_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_maepag_cordcte01_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maepag_limcant01_onblur(oThis, iSeqRow) {
  do_ajax_form_maepag_validate_limcant01();
  scCssBlur(oThis);
}

function sc_form_maepag_limcant01_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_maepag_limcant01_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maepag_pagleg01_onblur(oThis, iSeqRow) {
  do_ajax_form_maepag_validate_pagleg01();
  scCssBlur(oThis);
}

function sc_form_maepag_pagleg01_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_maepag_pagleg01_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maepag_telcte01b_onblur(oThis, iSeqRow) {
  do_ajax_form_maepag_validate_telcte01b();
  scCssBlur(oThis);
}

function sc_form_maepag_telcte01b_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_maepag_telcte01b_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maepag_telcte01c_onblur(oThis, iSeqRow) {
  do_ajax_form_maepag_validate_telcte01c();
  scCssBlur(oThis);
}

function sc_form_maepag_telcte01c_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_maepag_telcte01c_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maepag_emailcte01_onblur(oThis, iSeqRow) {
  do_ajax_form_maepag_validate_emailcte01();
  scCssBlur(oThis);
}

function sc_form_maepag_emailcte01_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_maepag_emailcte01_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maepag_ctacgcte01_onblur(oThis, iSeqRow) {
  do_ajax_form_maepag_validate_ctacgcte01();
  scCssBlur(oThis);
}

function sc_form_maepag_ctacgcte01_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_maepag_ctacgcte01_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maepag_obsercte01_onblur(oThis, iSeqRow) {
  do_ajax_form_maepag_validate_obsercte01();
  scCssBlur(oThis);
}

function sc_form_maepag_obsercte01_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_maepag_obsercte01_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maepag_totexceso01_onblur(oThis, iSeqRow) {
  do_ajax_form_maepag_validate_totexceso01();
  scCssBlur(oThis);
}

function sc_form_maepag_totexceso01_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_maepag_totexceso01_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maepag_imagencte01_onblur(oThis, iSeqRow) {
  do_ajax_form_maepag_validate_imagencte01();
  scCssBlur(oThis);
}

function sc_form_maepag_imagencte01_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_maepag_imagencte01_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maepag_block_onblur(oThis, iSeqRow) {
  do_ajax_form_maepag_validate_block();
  scCssBlur(oThis);
}

function sc_form_maepag_block_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_maepag_block_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maepag_uid_onblur(oThis, iSeqRow) {
  do_ajax_form_maepag_validate_uid();
  scCssBlur(oThis);
}

function sc_form_maepag_uid_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_maepag_uid_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maepag_ultimoacceso_onblur(oThis, iSeqRow) {
  do_ajax_form_maepag_validate_ultimoacceso();
  scCssBlur(oThis);
}

function sc_form_maepag_ultimoacceso_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_maepag_ultimoacceso_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maepag_idcli_onblur(oThis, iSeqRow) {
  do_ajax_form_maepag_validate_idcli();
  scCssBlur(oThis);
}

function sc_form_maepag_idcli_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_maepag_idcli_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maepag_catcte01_onblur(oThis, iSeqRow) {
  do_ajax_form_maepag_validate_catcte01();
  scCssBlur(oThis);
}

function sc_form_maepag_catcte01_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_maepag_catcte01_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maepag_numautosri01_onblur(oThis, iSeqRow) {
  do_ajax_form_maepag_validate_numautosri01();
  scCssBlur(oThis);
}

function sc_form_maepag_numautosri01_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_maepag_numautosri01_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maepag_seriedoc01_onblur(oThis, iSeqRow) {
  do_ajax_form_maepag_validate_seriedoc01();
  scCssBlur(oThis);
}

function sc_form_maepag_seriedoc01_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_maepag_seriedoc01_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maepag_fecvencdoc01_onblur(oThis, iSeqRow) {
  do_ajax_form_maepag_validate_fecvencdoc01();
  scCssBlur(oThis);
}

function sc_form_maepag_fecvencdoc01_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_maepag_fecvencdoc01_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maepag_repleg01_onblur(oThis, iSeqRow) {
  do_ajax_form_maepag_validate_repleg01();
  scCssBlur(oThis);
}

function sc_form_maepag_repleg01_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_maepag_repleg01_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maepag_coddest01_onblur(oThis, iSeqRow) {
  do_ajax_form_maepag_validate_coddest01();
  scCssBlur(oThis);
}

function sc_form_maepag_coddest01_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_maepag_coddest01_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maepag_longitud01_onblur(oThis, iSeqRow) {
  do_ajax_form_maepag_validate_longitud01();
  scCssBlur(oThis);
}

function sc_form_maepag_longitud01_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_maepag_longitud01_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maepag_latitud01_onblur(oThis, iSeqRow) {
  do_ajax_form_maepag_validate_latitud01();
  scCssBlur(oThis);
}

function sc_form_maepag_latitud01_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_maepag_latitud01_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maepag_zoom01_onblur(oThis, iSeqRow) {
  do_ajax_form_maepag_validate_zoom01();
  scCssBlur(oThis);
}

function sc_form_maepag_zoom01_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_maepag_zoom01_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maepag_coniva01_onblur(oThis, iSeqRow) {
  do_ajax_form_maepag_validate_coniva01();
  scCssBlur(oThis);
}

function sc_form_maepag_coniva01_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_maepag_coniva01_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maepag_conret01_onblur(oThis, iSeqRow) {
  do_ajax_form_maepag_validate_conret01();
  scCssBlur(oThis);
}

function sc_form_maepag_conret01_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_maepag_conret01_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maepag_tipo_identificacion_onblur(oThis, iSeqRow) {
  do_ajax_form_maepag_validate_tipo_identificacion();
  scCssBlur(oThis);
}

function sc_form_maepag_tipo_identificacion_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_maepag_tipo_identificacion_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maepag_es_padre_onblur(oThis, iSeqRow) {
  do_ajax_form_maepag_validate_es_padre();
  scCssBlur(oThis);
}

function sc_form_maepag_es_padre_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_maepag_es_padre_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maepag_bonos_onblur(oThis, iSeqRow) {
  do_ajax_form_maepag_validate_bonos();
  scCssBlur(oThis);
}

function sc_form_maepag_bonos_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_maepag_bonos_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maepag_rendimiento_onblur(oThis, iSeqRow) {
  do_ajax_form_maepag_validate_rendimiento();
  scCssBlur(oThis);
}

function sc_form_maepag_rendimiento_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_maepag_rendimiento_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maepag_parterel01_onblur(oThis, iSeqRow) {
  do_ajax_form_maepag_validate_parterel01();
  scCssBlur(oThis);
}

function sc_form_maepag_parterel01_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_maepag_parterel01_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maepag_clase_contribuyente_onblur(oThis, iSeqRow) {
  do_ajax_form_maepag_validate_clase_contribuyente();
  scCssBlur(oThis);
}

function sc_form_maepag_clase_contribuyente_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_maepag_clase_contribuyente_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maepag_tipo_contribuyente_onblur(oThis, iSeqRow) {
  do_ajax_form_maepag_validate_tipo_contribuyente();
  scCssBlur(oThis);
}

function sc_form_maepag_tipo_contribuyente_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_maepag_tipo_contribuyente_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maepag_lleva_contabilidad_onblur(oThis, iSeqRow) {
  do_ajax_form_maepag_validate_lleva_contabilidad();
  scCssBlur(oThis);
}

function sc_form_maepag_lleva_contabilidad_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_maepag_lleva_contabilidad_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maepag_ctacgant01_onblur(oThis, iSeqRow) {
  do_ajax_form_maepag_validate_ctacgant01();
  scCssBlur(oThis);
}

function sc_form_maepag_ctacgant01_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_maepag_ctacgant01_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maepag_residentefiscal01_onblur(oThis, iSeqRow) {
  do_ajax_form_maepag_validate_residentefiscal01();
  scCssBlur(oThis);
}

function sc_form_maepag_residentefiscal01_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_maepag_residentefiscal01_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maepag_es_cliente_onblur(oThis, iSeqRow) {
  do_ajax_form_maepag_validate_es_cliente();
  scCssBlur(oThis);
}

function sc_form_maepag_es_cliente_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_maepag_es_cliente_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maepag_grupos_onblur(oThis, iSeqRow) {
  do_ajax_form_maepag_validate_grupos();
  scCssBlur(oThis);
}

function sc_form_maepag_grupos_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_maepag_grupos_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maepag_codigo_banco_onblur(oThis, iSeqRow) {
  do_ajax_form_maepag_validate_codigo_banco();
  scCssBlur(oThis);
}

function sc_form_maepag_codigo_banco_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_maepag_codigo_banco_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maepag_tipo_cuenta_banco_onblur(oThis, iSeqRow) {
  do_ajax_form_maepag_validate_tipo_cuenta_banco();
  scCssBlur(oThis);
}

function sc_form_maepag_tipo_cuenta_banco_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_maepag_tipo_cuenta_banco_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maepag_nro_cuenta_banco_onblur(oThis, iSeqRow) {
  do_ajax_form_maepag_validate_nro_cuenta_banco();
  scCssBlur(oThis);
}

function sc_form_maepag_nro_cuenta_banco_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_maepag_nro_cuenta_banco_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maepag_pago_transferencia_onblur(oThis, iSeqRow) {
  do_ajax_form_maepag_validate_pago_transferencia();
  scCssBlur(oThis);
}

function sc_form_maepag_pago_transferencia_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_maepag_pago_transferencia_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function displayChange_block(block, status) {
	if ("0" == block) {
		displayChange_block_0(status);
	}
}

function displayChange_block_0(status) {
	displayChange_field("codcte01", "", status);
	displayChange_field("nomcte01", "", status);
	displayChange_field("cv1cte01", "", status);
	displayChange_field("cv2cte01", "", status);
	displayChange_field("tipcte01", "", status);
	displayChange_field("ofienccte01", "", status);
	displayChange_field("vendcte01", "", status);
	displayChange_field("cobrcte01", "", status);
	displayChange_field("loccte01", "", status);
	displayChange_field("dircte01", "", status);
	displayChange_field("telcte01", "", status);
	displayChange_field("cascte01", "", status);
	displayChange_field("fecing01", "", status);
	displayChange_field("condpag01", "", status);
	displayChange_field("desctocte01", "", status);
	displayChange_field("limcred01", "", status);
	displayChange_field("desppar01", "", status);
	displayChange_field("cheqpro01", "", status);
	displayChange_field("sdoeje01", "", status);
	displayChange_field("sdoant01", "", status);
	displayChange_field("sdoact01", "", status);
	displayChange_field("acudbm01", "", status);
	displayChange_field("acucrm01", "", status);
	displayChange_field("acudbe01", "", status);
	displayChange_field("acucre01", "", status);
	displayChange_field("comentcte01", "", status);
	displayChange_field("statuscte01", "", status);
	displayChange_field("identcte01", "", status);
	displayChange_field("cordcte01", "", status);
	displayChange_field("limcant01", "", status);
	displayChange_field("pagleg01", "", status);
	displayChange_field("telcte01b", "", status);
	displayChange_field("telcte01c", "", status);
	displayChange_field("emailcte01", "", status);
	displayChange_field("ctacgcte01", "", status);
	displayChange_field("obsercte01", "", status);
	displayChange_field("totexceso01", "", status);
	displayChange_field("imagencte01", "", status);
	displayChange_field("block", "", status);
	displayChange_field("uid", "", status);
	displayChange_field("ultimoacceso", "", status);
	displayChange_field("idcli", "", status);
	displayChange_field("catcte01", "", status);
	displayChange_field("numautosri01", "", status);
	displayChange_field("seriedoc01", "", status);
	displayChange_field("fecvencdoc01", "", status);
	displayChange_field("repleg01", "", status);
	displayChange_field("coddest01", "", status);
	displayChange_field("longitud01", "", status);
	displayChange_field("latitud01", "", status);
	displayChange_field("zoom01", "", status);
	displayChange_field("coniva01", "", status);
	displayChange_field("conret01", "", status);
	displayChange_field("tipo_identificacion", "", status);
	displayChange_field("es_padre", "", status);
	displayChange_field("bonos", "", status);
	displayChange_field("rendimiento", "", status);
	displayChange_field("parterel01", "", status);
	displayChange_field("clase_contribuyente", "", status);
	displayChange_field("tipo_contribuyente", "", status);
	displayChange_field("lleva_contabilidad", "", status);
	displayChange_field("ctacgant01", "", status);
	displayChange_field("residentefiscal01", "", status);
	displayChange_field("es_cliente", "", status);
	displayChange_field("grupos", "", status);
	displayChange_field("codigo_banco", "", status);
	displayChange_field("tipo_cuenta_banco", "", status);
	displayChange_field("nro_cuenta_banco", "", status);
	displayChange_field("pago_transferencia", "", status);
}

function displayChange_row(row, status) {
	displayChange_field_codcte01(row, status);
	displayChange_field_nomcte01(row, status);
	displayChange_field_cv1cte01(row, status);
	displayChange_field_cv2cte01(row, status);
	displayChange_field_tipcte01(row, status);
	displayChange_field_ofienccte01(row, status);
	displayChange_field_vendcte01(row, status);
	displayChange_field_cobrcte01(row, status);
	displayChange_field_loccte01(row, status);
	displayChange_field_dircte01(row, status);
	displayChange_field_telcte01(row, status);
	displayChange_field_cascte01(row, status);
	displayChange_field_fecing01(row, status);
	displayChange_field_condpag01(row, status);
	displayChange_field_desctocte01(row, status);
	displayChange_field_limcred01(row, status);
	displayChange_field_desppar01(row, status);
	displayChange_field_cheqpro01(row, status);
	displayChange_field_sdoeje01(row, status);
	displayChange_field_sdoant01(row, status);
	displayChange_field_sdoact01(row, status);
	displayChange_field_acudbm01(row, status);
	displayChange_field_acucrm01(row, status);
	displayChange_field_acudbe01(row, status);
	displayChange_field_acucre01(row, status);
	displayChange_field_comentcte01(row, status);
	displayChange_field_statuscte01(row, status);
	displayChange_field_identcte01(row, status);
	displayChange_field_cordcte01(row, status);
	displayChange_field_limcant01(row, status);
	displayChange_field_pagleg01(row, status);
	displayChange_field_telcte01b(row, status);
	displayChange_field_telcte01c(row, status);
	displayChange_field_emailcte01(row, status);
	displayChange_field_ctacgcte01(row, status);
	displayChange_field_obsercte01(row, status);
	displayChange_field_totexceso01(row, status);
	displayChange_field_imagencte01(row, status);
	displayChange_field_block(row, status);
	displayChange_field_uid(row, status);
	displayChange_field_ultimoacceso(row, status);
	displayChange_field_idcli(row, status);
	displayChange_field_catcte01(row, status);
	displayChange_field_numautosri01(row, status);
	displayChange_field_seriedoc01(row, status);
	displayChange_field_fecvencdoc01(row, status);
	displayChange_field_repleg01(row, status);
	displayChange_field_coddest01(row, status);
	displayChange_field_longitud01(row, status);
	displayChange_field_latitud01(row, status);
	displayChange_field_zoom01(row, status);
	displayChange_field_coniva01(row, status);
	displayChange_field_conret01(row, status);
	displayChange_field_tipo_identificacion(row, status);
	displayChange_field_es_padre(row, status);
	displayChange_field_bonos(row, status);
	displayChange_field_rendimiento(row, status);
	displayChange_field_parterel01(row, status);
	displayChange_field_clase_contribuyente(row, status);
	displayChange_field_tipo_contribuyente(row, status);
	displayChange_field_lleva_contabilidad(row, status);
	displayChange_field_ctacgant01(row, status);
	displayChange_field_residentefiscal01(row, status);
	displayChange_field_es_cliente(row, status);
	displayChange_field_grupos(row, status);
	displayChange_field_codigo_banco(row, status);
	displayChange_field_tipo_cuenta_banco(row, status);
	displayChange_field_nro_cuenta_banco(row, status);
	displayChange_field_pago_transferencia(row, status);
}

function displayChange_field(field, row, status) {
	if ("codcte01" == field) {
		displayChange_field_codcte01(row, status);
	}
	if ("nomcte01" == field) {
		displayChange_field_nomcte01(row, status);
	}
	if ("cv1cte01" == field) {
		displayChange_field_cv1cte01(row, status);
	}
	if ("cv2cte01" == field) {
		displayChange_field_cv2cte01(row, status);
	}
	if ("tipcte01" == field) {
		displayChange_field_tipcte01(row, status);
	}
	if ("ofienccte01" == field) {
		displayChange_field_ofienccte01(row, status);
	}
	if ("vendcte01" == field) {
		displayChange_field_vendcte01(row, status);
	}
	if ("cobrcte01" == field) {
		displayChange_field_cobrcte01(row, status);
	}
	if ("loccte01" == field) {
		displayChange_field_loccte01(row, status);
	}
	if ("dircte01" == field) {
		displayChange_field_dircte01(row, status);
	}
	if ("telcte01" == field) {
		displayChange_field_telcte01(row, status);
	}
	if ("cascte01" == field) {
		displayChange_field_cascte01(row, status);
	}
	if ("fecing01" == field) {
		displayChange_field_fecing01(row, status);
	}
	if ("condpag01" == field) {
		displayChange_field_condpag01(row, status);
	}
	if ("desctocte01" == field) {
		displayChange_field_desctocte01(row, status);
	}
	if ("limcred01" == field) {
		displayChange_field_limcred01(row, status);
	}
	if ("desppar01" == field) {
		displayChange_field_desppar01(row, status);
	}
	if ("cheqpro01" == field) {
		displayChange_field_cheqpro01(row, status);
	}
	if ("sdoeje01" == field) {
		displayChange_field_sdoeje01(row, status);
	}
	if ("sdoant01" == field) {
		displayChange_field_sdoant01(row, status);
	}
	if ("sdoact01" == field) {
		displayChange_field_sdoact01(row, status);
	}
	if ("acudbm01" == field) {
		displayChange_field_acudbm01(row, status);
	}
	if ("acucrm01" == field) {
		displayChange_field_acucrm01(row, status);
	}
	if ("acudbe01" == field) {
		displayChange_field_acudbe01(row, status);
	}
	if ("acucre01" == field) {
		displayChange_field_acucre01(row, status);
	}
	if ("comentcte01" == field) {
		displayChange_field_comentcte01(row, status);
	}
	if ("statuscte01" == field) {
		displayChange_field_statuscte01(row, status);
	}
	if ("identcte01" == field) {
		displayChange_field_identcte01(row, status);
	}
	if ("cordcte01" == field) {
		displayChange_field_cordcte01(row, status);
	}
	if ("limcant01" == field) {
		displayChange_field_limcant01(row, status);
	}
	if ("pagleg01" == field) {
		displayChange_field_pagleg01(row, status);
	}
	if ("telcte01b" == field) {
		displayChange_field_telcte01b(row, status);
	}
	if ("telcte01c" == field) {
		displayChange_field_telcte01c(row, status);
	}
	if ("emailcte01" == field) {
		displayChange_field_emailcte01(row, status);
	}
	if ("ctacgcte01" == field) {
		displayChange_field_ctacgcte01(row, status);
	}
	if ("obsercte01" == field) {
		displayChange_field_obsercte01(row, status);
	}
	if ("totexceso01" == field) {
		displayChange_field_totexceso01(row, status);
	}
	if ("imagencte01" == field) {
		displayChange_field_imagencte01(row, status);
	}
	if ("block" == field) {
		displayChange_field_block(row, status);
	}
	if ("uid" == field) {
		displayChange_field_uid(row, status);
	}
	if ("ultimoacceso" == field) {
		displayChange_field_ultimoacceso(row, status);
	}
	if ("idcli" == field) {
		displayChange_field_idcli(row, status);
	}
	if ("catcte01" == field) {
		displayChange_field_catcte01(row, status);
	}
	if ("numautosri01" == field) {
		displayChange_field_numautosri01(row, status);
	}
	if ("seriedoc01" == field) {
		displayChange_field_seriedoc01(row, status);
	}
	if ("fecvencdoc01" == field) {
		displayChange_field_fecvencdoc01(row, status);
	}
	if ("repleg01" == field) {
		displayChange_field_repleg01(row, status);
	}
	if ("coddest01" == field) {
		displayChange_field_coddest01(row, status);
	}
	if ("longitud01" == field) {
		displayChange_field_longitud01(row, status);
	}
	if ("latitud01" == field) {
		displayChange_field_latitud01(row, status);
	}
	if ("zoom01" == field) {
		displayChange_field_zoom01(row, status);
	}
	if ("coniva01" == field) {
		displayChange_field_coniva01(row, status);
	}
	if ("conret01" == field) {
		displayChange_field_conret01(row, status);
	}
	if ("tipo_identificacion" == field) {
		displayChange_field_tipo_identificacion(row, status);
	}
	if ("es_padre" == field) {
		displayChange_field_es_padre(row, status);
	}
	if ("bonos" == field) {
		displayChange_field_bonos(row, status);
	}
	if ("rendimiento" == field) {
		displayChange_field_rendimiento(row, status);
	}
	if ("parterel01" == field) {
		displayChange_field_parterel01(row, status);
	}
	if ("clase_contribuyente" == field) {
		displayChange_field_clase_contribuyente(row, status);
	}
	if ("tipo_contribuyente" == field) {
		displayChange_field_tipo_contribuyente(row, status);
	}
	if ("lleva_contabilidad" == field) {
		displayChange_field_lleva_contabilidad(row, status);
	}
	if ("ctacgant01" == field) {
		displayChange_field_ctacgant01(row, status);
	}
	if ("residentefiscal01" == field) {
		displayChange_field_residentefiscal01(row, status);
	}
	if ("es_cliente" == field) {
		displayChange_field_es_cliente(row, status);
	}
	if ("grupos" == field) {
		displayChange_field_grupos(row, status);
	}
	if ("codigo_banco" == field) {
		displayChange_field_codigo_banco(row, status);
	}
	if ("tipo_cuenta_banco" == field) {
		displayChange_field_tipo_cuenta_banco(row, status);
	}
	if ("nro_cuenta_banco" == field) {
		displayChange_field_nro_cuenta_banco(row, status);
	}
	if ("pago_transferencia" == field) {
		displayChange_field_pago_transferencia(row, status);
	}
}

function displayChange_field_codcte01(row, status) {
    var fieldId;
}

function displayChange_field_nomcte01(row, status) {
    var fieldId;
}

function displayChange_field_cv1cte01(row, status) {
    var fieldId;
}

function displayChange_field_cv2cte01(row, status) {
    var fieldId;
}

function displayChange_field_tipcte01(row, status) {
    var fieldId;
}

function displayChange_field_ofienccte01(row, status) {
    var fieldId;
}

function displayChange_field_vendcte01(row, status) {
    var fieldId;
}

function displayChange_field_cobrcte01(row, status) {
    var fieldId;
}

function displayChange_field_loccte01(row, status) {
    var fieldId;
}

function displayChange_field_dircte01(row, status) {
    var fieldId;
}

function displayChange_field_telcte01(row, status) {
    var fieldId;
}

function displayChange_field_cascte01(row, status) {
    var fieldId;
}

function displayChange_field_fecing01(row, status) {
    var fieldId;
}

function displayChange_field_condpag01(row, status) {
    var fieldId;
}

function displayChange_field_desctocte01(row, status) {
    var fieldId;
}

function displayChange_field_limcred01(row, status) {
    var fieldId;
}

function displayChange_field_desppar01(row, status) {
    var fieldId;
}

function displayChange_field_cheqpro01(row, status) {
    var fieldId;
}

function displayChange_field_sdoeje01(row, status) {
    var fieldId;
}

function displayChange_field_sdoant01(row, status) {
    var fieldId;
}

function displayChange_field_sdoact01(row, status) {
    var fieldId;
}

function displayChange_field_acudbm01(row, status) {
    var fieldId;
}

function displayChange_field_acucrm01(row, status) {
    var fieldId;
}

function displayChange_field_acudbe01(row, status) {
    var fieldId;
}

function displayChange_field_acucre01(row, status) {
    var fieldId;
}

function displayChange_field_comentcte01(row, status) {
    var fieldId;
}

function displayChange_field_statuscte01(row, status) {
    var fieldId;
}

function displayChange_field_identcte01(row, status) {
    var fieldId;
}

function displayChange_field_cordcte01(row, status) {
    var fieldId;
}

function displayChange_field_limcant01(row, status) {
    var fieldId;
}

function displayChange_field_pagleg01(row, status) {
    var fieldId;
}

function displayChange_field_telcte01b(row, status) {
    var fieldId;
}

function displayChange_field_telcte01c(row, status) {
    var fieldId;
}

function displayChange_field_emailcte01(row, status) {
    var fieldId;
}

function displayChange_field_ctacgcte01(row, status) {
    var fieldId;
}

function displayChange_field_obsercte01(row, status) {
    var fieldId;
}

function displayChange_field_totexceso01(row, status) {
    var fieldId;
}

function displayChange_field_imagencte01(row, status) {
    var fieldId;
}

function displayChange_field_block(row, status) {
    var fieldId;
}

function displayChange_field_uid(row, status) {
    var fieldId;
}

function displayChange_field_ultimoacceso(row, status) {
    var fieldId;
}

function displayChange_field_idcli(row, status) {
    var fieldId;
}

function displayChange_field_catcte01(row, status) {
    var fieldId;
}

function displayChange_field_numautosri01(row, status) {
    var fieldId;
}

function displayChange_field_seriedoc01(row, status) {
    var fieldId;
}

function displayChange_field_fecvencdoc01(row, status) {
    var fieldId;
}

function displayChange_field_repleg01(row, status) {
    var fieldId;
}

function displayChange_field_coddest01(row, status) {
    var fieldId;
}

function displayChange_field_longitud01(row, status) {
    var fieldId;
}

function displayChange_field_latitud01(row, status) {
    var fieldId;
}

function displayChange_field_zoom01(row, status) {
    var fieldId;
}

function displayChange_field_coniva01(row, status) {
    var fieldId;
}

function displayChange_field_conret01(row, status) {
    var fieldId;
}

function displayChange_field_tipo_identificacion(row, status) {
    var fieldId;
}

function displayChange_field_es_padre(row, status) {
    var fieldId;
}

function displayChange_field_bonos(row, status) {
    var fieldId;
}

function displayChange_field_rendimiento(row, status) {
    var fieldId;
}

function displayChange_field_parterel01(row, status) {
    var fieldId;
}

function displayChange_field_clase_contribuyente(row, status) {
    var fieldId;
}

function displayChange_field_tipo_contribuyente(row, status) {
    var fieldId;
}

function displayChange_field_lleva_contabilidad(row, status) {
    var fieldId;
}

function displayChange_field_ctacgant01(row, status) {
    var fieldId;
}

function displayChange_field_residentefiscal01(row, status) {
    var fieldId;
}

function displayChange_field_es_cliente(row, status) {
    var fieldId;
}

function displayChange_field_grupos(row, status) {
    var fieldId;
}

function displayChange_field_codigo_banco(row, status) {
    var fieldId;
}

function displayChange_field_tipo_cuenta_banco(row, status) {
    var fieldId;
}

function displayChange_field_nro_cuenta_banco(row, status) {
    var fieldId;
}

function displayChange_field_pago_transferencia(row, status) {
    var fieldId;
}

function scRecreateSelect2() {
}
function scResetPagesDisplay() {
	$(".sc-form-page").show();
}

function scHidePage(pageNo) {
	$("#id_form_maepag_form" + pageNo).hide();
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
  $("#id_sc_field_fecing01" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_fecing01" + iSeqRow] = $oField.val();
      if (2 == aParts.length) {
        sTime = " " + aParts[1];
      }
      if ('' == sTime || ' ' == sTime) {
        sTime = ' <?php echo $this->jqueryCalendarTimeStart($this->field_config['fecing01']['date_format']); ?>';
      }
      $oField.datepicker("option", "dateFormat", "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', 'hh', 'ii', 'ss', ':', ';', $_SESSION['scriptcase']['reg_conf']['date_sep'], $_SESSION['scriptcase']['reg_conf']['time_sep']), array('', 'yyyy', '','','', '', '', '', ''), $this->field_config['fecing01']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>" + sTime);
    },
    onClose: function(dateText, inst) {
      do_ajax_form_maepag_validate_fecing01(iSeqRow);
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
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', 'hh', 'ii', 'ss', ':', ';', $_SESSION['scriptcase']['reg_conf']['date_sep'], $_SESSION['scriptcase']['reg_conf']['time_sep']), array('', 'yyyy', '','','', '', '', '', ''), $this->field_config['fecing01']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
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
  $("#id_sc_field_fecvencdoc01" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_fecvencdoc01" + iSeqRow] = $oField.val();
    },
    onClose: function(dateText, inst) {
      do_ajax_form_maepag_validate_fecvencdoc01(iSeqRow);
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
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', $_SESSION['scriptcase']['reg_conf']['date_sep']), array('', 'yyyy', ''), $this->field_config['fecvencdoc01']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
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
                         $(t).html("<a href=\"javascript:nm_mostra_doc('0', '"+rs2+"', 'form_maepag')\">"+$('#id_read_on_'+field+iSeqRow).text()+"</a>");
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

