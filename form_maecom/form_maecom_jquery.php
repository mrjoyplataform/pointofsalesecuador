
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
  scEventControl_data["tipodocto31" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["nofact31" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["nocte31" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["nomcte31" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["localid31" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["cvectenegro31" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["vtabta31" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["descto31" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["flete31" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["itm31" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["novend31" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["fecfact31" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["condpag31" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["nopagos31" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["formapago31" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["obra31" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["orden31" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["cvnegra31" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["status31" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["cvimpto31" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["cvanulado31" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["efectivo31" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["cheque31" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["tarjeta31" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["acuenta31" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["nobanco31" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["nombanco31" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["nocheque31" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["notarjeta31" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["nomtarjeta31" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["cvdivisa31" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["valdivisa31" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["lineaprod31" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["intereses31" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["nopedido31" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["fecped31" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["ruc31" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["tel31" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["transpor31" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["cvtransfer31" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["fectrasfer31" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["desctofp31" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["catcte31" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["uid" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["recargos31" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["ice31" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["fecdocpr31" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["tipocomp31" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["conta31" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["fecvencidocpr" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["totsiniva31" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["fecemb" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["norefrendo" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["baseice" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["ncodret43" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["nbaseret43" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["npctjeret43" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["contrato" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["compra_general" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["distribucion_rubros" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["dstoley" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["remgas31" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["estado_electronico" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["coddest31" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["tipodocto31" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["tipodocto31" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["nofact31" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["nofact31" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["nocte31" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["nocte31" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["nomcte31" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["nomcte31" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["localid31" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["localid31" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["cvectenegro31" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["cvectenegro31" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["vtabta31" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["vtabta31" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["descto31" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["descto31" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["flete31" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["flete31" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["itm31" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["itm31" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["novend31" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["novend31" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["fecfact31" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["fecfact31" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["condpag31" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["condpag31" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["nopagos31" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["nopagos31" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["formapago31" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["formapago31" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["obra31" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["obra31" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["orden31" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["orden31" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["cvnegra31" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["cvnegra31" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["status31" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["status31" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["cvimpto31" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["cvimpto31" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["cvanulado31" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["cvanulado31" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["efectivo31" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["efectivo31" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["cheque31" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["cheque31" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["tarjeta31" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["tarjeta31" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["acuenta31" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["acuenta31" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["nobanco31" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["nobanco31" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["nombanco31" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["nombanco31" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["nocheque31" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["nocheque31" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["notarjeta31" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["notarjeta31" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["nomtarjeta31" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["nomtarjeta31" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["cvdivisa31" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["cvdivisa31" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["valdivisa31" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["valdivisa31" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["lineaprod31" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["lineaprod31" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["intereses31" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["intereses31" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["nopedido31" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["nopedido31" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["fecped31" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["fecped31" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["ruc31" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["ruc31" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["tel31" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["tel31" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["transpor31" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["transpor31" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["cvtransfer31" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["cvtransfer31" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["fectrasfer31" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["fectrasfer31" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["desctofp31" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["desctofp31" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["catcte31" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["catcte31" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["uid" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["uid" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["recargos31" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["recargos31" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["ice31" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["ice31" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["fecdocpr31" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["fecdocpr31" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["tipocomp31" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["tipocomp31" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["conta31" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["conta31" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["fecvencidocpr" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["fecvencidocpr" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["totsiniva31" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["totsiniva31" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["fecemb" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["fecemb" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["norefrendo" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["norefrendo" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["baseice" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["baseice" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["ncodret43" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["ncodret43" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["nbaseret43" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["nbaseret43" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["npctjeret43" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["npctjeret43" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["contrato" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["contrato" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["compra_general" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["compra_general" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["distribucion_rubros" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["distribucion_rubros" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["dstoley" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["dstoley" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["remgas31" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["remgas31" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["estado_electronico" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["estado_electronico" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["coddest31" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["coddest31" + iSeqRow]["change"]) {
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
  $('#id_sc_field_tipodocto31' + iSeqRow).bind('blur', function() { sc_form_maecom_tipodocto31_onblur(this, iSeqRow) })
                                         .bind('change', function() { sc_form_maecom_tipodocto31_onchange(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_maecom_tipodocto31_onfocus(this, iSeqRow) });
  $('#id_sc_field_nofact31' + iSeqRow).bind('blur', function() { sc_form_maecom_nofact31_onblur(this, iSeqRow) })
                                      .bind('change', function() { sc_form_maecom_nofact31_onchange(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_maecom_nofact31_onfocus(this, iSeqRow) });
  $('#id_sc_field_nocte31' + iSeqRow).bind('blur', function() { sc_form_maecom_nocte31_onblur(this, iSeqRow) })
                                     .bind('change', function() { sc_form_maecom_nocte31_onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_maecom_nocte31_onfocus(this, iSeqRow) });
  $('#id_sc_field_nomcte31' + iSeqRow).bind('blur', function() { sc_form_maecom_nomcte31_onblur(this, iSeqRow) })
                                      .bind('change', function() { sc_form_maecom_nomcte31_onchange(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_maecom_nomcte31_onfocus(this, iSeqRow) });
  $('#id_sc_field_localid31' + iSeqRow).bind('blur', function() { sc_form_maecom_localid31_onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_form_maecom_localid31_onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_maecom_localid31_onfocus(this, iSeqRow) });
  $('#id_sc_field_cvectenegro31' + iSeqRow).bind('blur', function() { sc_form_maecom_cvectenegro31_onblur(this, iSeqRow) })
                                           .bind('change', function() { sc_form_maecom_cvectenegro31_onchange(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_maecom_cvectenegro31_onfocus(this, iSeqRow) });
  $('#id_sc_field_vtabta31' + iSeqRow).bind('blur', function() { sc_form_maecom_vtabta31_onblur(this, iSeqRow) })
                                      .bind('change', function() { sc_form_maecom_vtabta31_onchange(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_maecom_vtabta31_onfocus(this, iSeqRow) });
  $('#id_sc_field_descto31' + iSeqRow).bind('blur', function() { sc_form_maecom_descto31_onblur(this, iSeqRow) })
                                      .bind('change', function() { sc_form_maecom_descto31_onchange(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_maecom_descto31_onfocus(this, iSeqRow) });
  $('#id_sc_field_flete31' + iSeqRow).bind('blur', function() { sc_form_maecom_flete31_onblur(this, iSeqRow) })
                                     .bind('change', function() { sc_form_maecom_flete31_onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_maecom_flete31_onfocus(this, iSeqRow) });
  $('#id_sc_field_itm31' + iSeqRow).bind('blur', function() { sc_form_maecom_itm31_onblur(this, iSeqRow) })
                                   .bind('change', function() { sc_form_maecom_itm31_onchange(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_maecom_itm31_onfocus(this, iSeqRow) });
  $('#id_sc_field_novend31' + iSeqRow).bind('blur', function() { sc_form_maecom_novend31_onblur(this, iSeqRow) })
                                      .bind('change', function() { sc_form_maecom_novend31_onchange(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_maecom_novend31_onfocus(this, iSeqRow) });
  $('#id_sc_field_fecfact31' + iSeqRow).bind('blur', function() { sc_form_maecom_fecfact31_onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_form_maecom_fecfact31_onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_maecom_fecfact31_onfocus(this, iSeqRow) });
  $('#id_sc_field_fecfact31_hora' + iSeqRow).bind('blur', function() { sc_form_maecom_fecfact31_hora_onblur(this, iSeqRow) })
                                            .bind('change', function() { sc_form_maecom_fecfact31_hora_onchange(this, iSeqRow) })
                                            .bind('focus', function() { sc_form_maecom_fecfact31_hora_onfocus(this, iSeqRow) });
  $('#id_sc_field_condpag31' + iSeqRow).bind('blur', function() { sc_form_maecom_condpag31_onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_form_maecom_condpag31_onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_maecom_condpag31_onfocus(this, iSeqRow) });
  $('#id_sc_field_nopagos31' + iSeqRow).bind('blur', function() { sc_form_maecom_nopagos31_onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_form_maecom_nopagos31_onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_maecom_nopagos31_onfocus(this, iSeqRow) });
  $('#id_sc_field_formapago31' + iSeqRow).bind('blur', function() { sc_form_maecom_formapago31_onblur(this, iSeqRow) })
                                         .bind('change', function() { sc_form_maecom_formapago31_onchange(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_maecom_formapago31_onfocus(this, iSeqRow) });
  $('#id_sc_field_obra31' + iSeqRow).bind('blur', function() { sc_form_maecom_obra31_onblur(this, iSeqRow) })
                                    .bind('change', function() { sc_form_maecom_obra31_onchange(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_maecom_obra31_onfocus(this, iSeqRow) });
  $('#id_sc_field_orden31' + iSeqRow).bind('blur', function() { sc_form_maecom_orden31_onblur(this, iSeqRow) })
                                     .bind('change', function() { sc_form_maecom_orden31_onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_maecom_orden31_onfocus(this, iSeqRow) });
  $('#id_sc_field_cvnegra31' + iSeqRow).bind('blur', function() { sc_form_maecom_cvnegra31_onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_form_maecom_cvnegra31_onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_maecom_cvnegra31_onfocus(this, iSeqRow) });
  $('#id_sc_field_status31' + iSeqRow).bind('blur', function() { sc_form_maecom_status31_onblur(this, iSeqRow) })
                                      .bind('change', function() { sc_form_maecom_status31_onchange(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_maecom_status31_onfocus(this, iSeqRow) });
  $('#id_sc_field_cvimpto31' + iSeqRow).bind('blur', function() { sc_form_maecom_cvimpto31_onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_form_maecom_cvimpto31_onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_maecom_cvimpto31_onfocus(this, iSeqRow) });
  $('#id_sc_field_cvanulado31' + iSeqRow).bind('blur', function() { sc_form_maecom_cvanulado31_onblur(this, iSeqRow) })
                                         .bind('change', function() { sc_form_maecom_cvanulado31_onchange(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_maecom_cvanulado31_onfocus(this, iSeqRow) });
  $('#id_sc_field_efectivo31' + iSeqRow).bind('blur', function() { sc_form_maecom_efectivo31_onblur(this, iSeqRow) })
                                        .bind('change', function() { sc_form_maecom_efectivo31_onchange(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_maecom_efectivo31_onfocus(this, iSeqRow) });
  $('#id_sc_field_cheque31' + iSeqRow).bind('blur', function() { sc_form_maecom_cheque31_onblur(this, iSeqRow) })
                                      .bind('change', function() { sc_form_maecom_cheque31_onchange(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_maecom_cheque31_onfocus(this, iSeqRow) });
  $('#id_sc_field_tarjeta31' + iSeqRow).bind('blur', function() { sc_form_maecom_tarjeta31_onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_form_maecom_tarjeta31_onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_maecom_tarjeta31_onfocus(this, iSeqRow) });
  $('#id_sc_field_acuenta31' + iSeqRow).bind('blur', function() { sc_form_maecom_acuenta31_onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_form_maecom_acuenta31_onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_maecom_acuenta31_onfocus(this, iSeqRow) });
  $('#id_sc_field_nobanco31' + iSeqRow).bind('blur', function() { sc_form_maecom_nobanco31_onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_form_maecom_nobanco31_onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_maecom_nobanco31_onfocus(this, iSeqRow) });
  $('#id_sc_field_nombanco31' + iSeqRow).bind('blur', function() { sc_form_maecom_nombanco31_onblur(this, iSeqRow) })
                                        .bind('change', function() { sc_form_maecom_nombanco31_onchange(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_maecom_nombanco31_onfocus(this, iSeqRow) });
  $('#id_sc_field_nocheque31' + iSeqRow).bind('blur', function() { sc_form_maecom_nocheque31_onblur(this, iSeqRow) })
                                        .bind('change', function() { sc_form_maecom_nocheque31_onchange(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_maecom_nocheque31_onfocus(this, iSeqRow) });
  $('#id_sc_field_notarjeta31' + iSeqRow).bind('blur', function() { sc_form_maecom_notarjeta31_onblur(this, iSeqRow) })
                                         .bind('change', function() { sc_form_maecom_notarjeta31_onchange(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_maecom_notarjeta31_onfocus(this, iSeqRow) });
  $('#id_sc_field_nomtarjeta31' + iSeqRow).bind('blur', function() { sc_form_maecom_nomtarjeta31_onblur(this, iSeqRow) })
                                          .bind('change', function() { sc_form_maecom_nomtarjeta31_onchange(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_maecom_nomtarjeta31_onfocus(this, iSeqRow) });
  $('#id_sc_field_cvdivisa31' + iSeqRow).bind('blur', function() { sc_form_maecom_cvdivisa31_onblur(this, iSeqRow) })
                                        .bind('change', function() { sc_form_maecom_cvdivisa31_onchange(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_maecom_cvdivisa31_onfocus(this, iSeqRow) });
  $('#id_sc_field_valdivisa31' + iSeqRow).bind('blur', function() { sc_form_maecom_valdivisa31_onblur(this, iSeqRow) })
                                         .bind('change', function() { sc_form_maecom_valdivisa31_onchange(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_maecom_valdivisa31_onfocus(this, iSeqRow) });
  $('#id_sc_field_lineaprod31' + iSeqRow).bind('blur', function() { sc_form_maecom_lineaprod31_onblur(this, iSeqRow) })
                                         .bind('change', function() { sc_form_maecom_lineaprod31_onchange(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_maecom_lineaprod31_onfocus(this, iSeqRow) });
  $('#id_sc_field_intereses31' + iSeqRow).bind('blur', function() { sc_form_maecom_intereses31_onblur(this, iSeqRow) })
                                         .bind('change', function() { sc_form_maecom_intereses31_onchange(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_maecom_intereses31_onfocus(this, iSeqRow) });
  $('#id_sc_field_nopedido31' + iSeqRow).bind('blur', function() { sc_form_maecom_nopedido31_onblur(this, iSeqRow) })
                                        .bind('change', function() { sc_form_maecom_nopedido31_onchange(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_maecom_nopedido31_onfocus(this, iSeqRow) });
  $('#id_sc_field_fecped31' + iSeqRow).bind('blur', function() { sc_form_maecom_fecped31_onblur(this, iSeqRow) })
                                      .bind('change', function() { sc_form_maecom_fecped31_onchange(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_maecom_fecped31_onfocus(this, iSeqRow) });
  $('#id_sc_field_fecped31_hora' + iSeqRow).bind('blur', function() { sc_form_maecom_fecped31_hora_onblur(this, iSeqRow) })
                                           .bind('change', function() { sc_form_maecom_fecped31_hora_onchange(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_maecom_fecped31_hora_onfocus(this, iSeqRow) });
  $('#id_sc_field_ruc31' + iSeqRow).bind('blur', function() { sc_form_maecom_ruc31_onblur(this, iSeqRow) })
                                   .bind('change', function() { sc_form_maecom_ruc31_onchange(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_maecom_ruc31_onfocus(this, iSeqRow) });
  $('#id_sc_field_tel31' + iSeqRow).bind('blur', function() { sc_form_maecom_tel31_onblur(this, iSeqRow) })
                                   .bind('change', function() { sc_form_maecom_tel31_onchange(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_maecom_tel31_onfocus(this, iSeqRow) });
  $('#id_sc_field_transpor31' + iSeqRow).bind('blur', function() { sc_form_maecom_transpor31_onblur(this, iSeqRow) })
                                        .bind('change', function() { sc_form_maecom_transpor31_onchange(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_maecom_transpor31_onfocus(this, iSeqRow) });
  $('#id_sc_field_cvtransfer31' + iSeqRow).bind('blur', function() { sc_form_maecom_cvtransfer31_onblur(this, iSeqRow) })
                                          .bind('change', function() { sc_form_maecom_cvtransfer31_onchange(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_maecom_cvtransfer31_onfocus(this, iSeqRow) });
  $('#id_sc_field_fectrasfer31' + iSeqRow).bind('blur', function() { sc_form_maecom_fectrasfer31_onblur(this, iSeqRow) })
                                          .bind('change', function() { sc_form_maecom_fectrasfer31_onchange(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_maecom_fectrasfer31_onfocus(this, iSeqRow) });
  $('#id_sc_field_desctofp31' + iSeqRow).bind('blur', function() { sc_form_maecom_desctofp31_onblur(this, iSeqRow) })
                                        .bind('change', function() { sc_form_maecom_desctofp31_onchange(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_maecom_desctofp31_onfocus(this, iSeqRow) });
  $('#id_sc_field_catcte31' + iSeqRow).bind('blur', function() { sc_form_maecom_catcte31_onblur(this, iSeqRow) })
                                      .bind('change', function() { sc_form_maecom_catcte31_onchange(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_maecom_catcte31_onfocus(this, iSeqRow) });
  $('#id_sc_field_uid' + iSeqRow).bind('blur', function() { sc_form_maecom_uid_onblur(this, iSeqRow) })
                                 .bind('change', function() { sc_form_maecom_uid_onchange(this, iSeqRow) })
                                 .bind('focus', function() { sc_form_maecom_uid_onfocus(this, iSeqRow) });
  $('#id_sc_field_recargos31' + iSeqRow).bind('blur', function() { sc_form_maecom_recargos31_onblur(this, iSeqRow) })
                                        .bind('change', function() { sc_form_maecom_recargos31_onchange(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_maecom_recargos31_onfocus(this, iSeqRow) });
  $('#id_sc_field_ice31' + iSeqRow).bind('blur', function() { sc_form_maecom_ice31_onblur(this, iSeqRow) })
                                   .bind('change', function() { sc_form_maecom_ice31_onchange(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_maecom_ice31_onfocus(this, iSeqRow) });
  $('#id_sc_field_fecdocpr31' + iSeqRow).bind('blur', function() { sc_form_maecom_fecdocpr31_onblur(this, iSeqRow) })
                                        .bind('change', function() { sc_form_maecom_fecdocpr31_onchange(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_maecom_fecdocpr31_onfocus(this, iSeqRow) });
  $('#id_sc_field_fecdocpr31_hora' + iSeqRow).bind('blur', function() { sc_form_maecom_fecdocpr31_hora_onblur(this, iSeqRow) })
                                             .bind('change', function() { sc_form_maecom_fecdocpr31_hora_onchange(this, iSeqRow) })
                                             .bind('focus', function() { sc_form_maecom_fecdocpr31_hora_onfocus(this, iSeqRow) });
  $('#id_sc_field_tipocomp31' + iSeqRow).bind('blur', function() { sc_form_maecom_tipocomp31_onblur(this, iSeqRow) })
                                        .bind('change', function() { sc_form_maecom_tipocomp31_onchange(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_maecom_tipocomp31_onfocus(this, iSeqRow) });
  $('#id_sc_field_conta31' + iSeqRow).bind('blur', function() { sc_form_maecom_conta31_onblur(this, iSeqRow) })
                                     .bind('change', function() { sc_form_maecom_conta31_onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_maecom_conta31_onfocus(this, iSeqRow) });
  $('#id_sc_field_fecvencidocpr' + iSeqRow).bind('blur', function() { sc_form_maecom_fecvencidocpr_onblur(this, iSeqRow) })
                                           .bind('change', function() { sc_form_maecom_fecvencidocpr_onchange(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_maecom_fecvencidocpr_onfocus(this, iSeqRow) });
  $('#id_sc_field_fecvencidocpr_hora' + iSeqRow).bind('blur', function() { sc_form_maecom_fecvencidocpr_hora_onblur(this, iSeqRow) })
                                                .bind('change', function() { sc_form_maecom_fecvencidocpr_hora_onchange(this, iSeqRow) })
                                                .bind('focus', function() { sc_form_maecom_fecvencidocpr_hora_onfocus(this, iSeqRow) });
  $('#id_sc_field_totsiniva31' + iSeqRow).bind('blur', function() { sc_form_maecom_totsiniva31_onblur(this, iSeqRow) })
                                         .bind('change', function() { sc_form_maecom_totsiniva31_onchange(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_maecom_totsiniva31_onfocus(this, iSeqRow) });
  $('#id_sc_field_fecemb' + iSeqRow).bind('blur', function() { sc_form_maecom_fecemb_onblur(this, iSeqRow) })
                                    .bind('change', function() { sc_form_maecom_fecemb_onchange(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_maecom_fecemb_onfocus(this, iSeqRow) });
  $('#id_sc_field_norefrendo' + iSeqRow).bind('blur', function() { sc_form_maecom_norefrendo_onblur(this, iSeqRow) })
                                        .bind('change', function() { sc_form_maecom_norefrendo_onchange(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_maecom_norefrendo_onfocus(this, iSeqRow) });
  $('#id_sc_field_baseice' + iSeqRow).bind('blur', function() { sc_form_maecom_baseice_onblur(this, iSeqRow) })
                                     .bind('change', function() { sc_form_maecom_baseice_onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_maecom_baseice_onfocus(this, iSeqRow) });
  $('#id_sc_field_ncodret43' + iSeqRow).bind('blur', function() { sc_form_maecom_ncodret43_onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_form_maecom_ncodret43_onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_maecom_ncodret43_onfocus(this, iSeqRow) });
  $('#id_sc_field_nbaseret43' + iSeqRow).bind('blur', function() { sc_form_maecom_nbaseret43_onblur(this, iSeqRow) })
                                        .bind('change', function() { sc_form_maecom_nbaseret43_onchange(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_maecom_nbaseret43_onfocus(this, iSeqRow) });
  $('#id_sc_field_npctjeret43' + iSeqRow).bind('blur', function() { sc_form_maecom_npctjeret43_onblur(this, iSeqRow) })
                                         .bind('change', function() { sc_form_maecom_npctjeret43_onchange(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_maecom_npctjeret43_onfocus(this, iSeqRow) });
  $('#id_sc_field_contrato' + iSeqRow).bind('blur', function() { sc_form_maecom_contrato_onblur(this, iSeqRow) })
                                      .bind('change', function() { sc_form_maecom_contrato_onchange(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_maecom_contrato_onfocus(this, iSeqRow) });
  $('#id_sc_field_compra_general' + iSeqRow).bind('blur', function() { sc_form_maecom_compra_general_onblur(this, iSeqRow) })
                                            .bind('change', function() { sc_form_maecom_compra_general_onchange(this, iSeqRow) })
                                            .bind('focus', function() { sc_form_maecom_compra_general_onfocus(this, iSeqRow) });
  $('#id_sc_field_distribucion_rubros' + iSeqRow).bind('blur', function() { sc_form_maecom_distribucion_rubros_onblur(this, iSeqRow) })
                                                 .bind('change', function() { sc_form_maecom_distribucion_rubros_onchange(this, iSeqRow) })
                                                 .bind('focus', function() { sc_form_maecom_distribucion_rubros_onfocus(this, iSeqRow) });
  $('#id_sc_field_dstoley' + iSeqRow).bind('blur', function() { sc_form_maecom_dstoley_onblur(this, iSeqRow) })
                                     .bind('change', function() { sc_form_maecom_dstoley_onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_maecom_dstoley_onfocus(this, iSeqRow) });
  $('#id_sc_field_remgas31' + iSeqRow).bind('blur', function() { sc_form_maecom_remgas31_onblur(this, iSeqRow) })
                                      .bind('change', function() { sc_form_maecom_remgas31_onchange(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_maecom_remgas31_onfocus(this, iSeqRow) });
  $('#id_sc_field_estado_electronico' + iSeqRow).bind('blur', function() { sc_form_maecom_estado_electronico_onblur(this, iSeqRow) })
                                                .bind('change', function() { sc_form_maecom_estado_electronico_onchange(this, iSeqRow) })
                                                .bind('focus', function() { sc_form_maecom_estado_electronico_onfocus(this, iSeqRow) });
  $('#id_sc_field_coddest31' + iSeqRow).bind('blur', function() { sc_form_maecom_coddest31_onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_form_maecom_coddest31_onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_maecom_coddest31_onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_maecom_tipodocto31_onblur(oThis, iSeqRow) {
  do_ajax_form_maecom_validate_tipodocto31();
  scCssBlur(oThis);
}

function sc_form_maecom_tipodocto31_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_maecom_tipodocto31_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecom_nofact31_onblur(oThis, iSeqRow) {
  do_ajax_form_maecom_validate_nofact31();
  scCssBlur(oThis);
}

function sc_form_maecom_nofact31_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_maecom_nofact31_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecom_nocte31_onblur(oThis, iSeqRow) {
  do_ajax_form_maecom_validate_nocte31();
  scCssBlur(oThis);
}

function sc_form_maecom_nocte31_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_maecom_nocte31_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecom_nomcte31_onblur(oThis, iSeqRow) {
  do_ajax_form_maecom_validate_nomcte31();
  scCssBlur(oThis);
}

function sc_form_maecom_nomcte31_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_maecom_nomcte31_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecom_localid31_onblur(oThis, iSeqRow) {
  do_ajax_form_maecom_validate_localid31();
  scCssBlur(oThis);
}

function sc_form_maecom_localid31_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_maecom_localid31_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecom_cvectenegro31_onblur(oThis, iSeqRow) {
  do_ajax_form_maecom_validate_cvectenegro31();
  scCssBlur(oThis);
}

function sc_form_maecom_cvectenegro31_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_maecom_cvectenegro31_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecom_vtabta31_onblur(oThis, iSeqRow) {
  do_ajax_form_maecom_validate_vtabta31();
  scCssBlur(oThis);
}

function sc_form_maecom_vtabta31_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_maecom_vtabta31_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecom_descto31_onblur(oThis, iSeqRow) {
  do_ajax_form_maecom_validate_descto31();
  scCssBlur(oThis);
}

function sc_form_maecom_descto31_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_maecom_descto31_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecom_flete31_onblur(oThis, iSeqRow) {
  do_ajax_form_maecom_validate_flete31();
  scCssBlur(oThis);
}

function sc_form_maecom_flete31_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_maecom_flete31_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecom_itm31_onblur(oThis, iSeqRow) {
  do_ajax_form_maecom_validate_itm31();
  scCssBlur(oThis);
}

function sc_form_maecom_itm31_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_maecom_itm31_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecom_novend31_onblur(oThis, iSeqRow) {
  do_ajax_form_maecom_validate_novend31();
  scCssBlur(oThis);
}

function sc_form_maecom_novend31_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_maecom_novend31_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecom_fecfact31_onblur(oThis, iSeqRow) {
  do_ajax_form_maecom_validate_fecfact31();
  scCssBlur(oThis);
}

function sc_form_maecom_fecfact31_hora_onblur(oThis, iSeqRow) {
  do_ajax_form_maecom_validate_fecfact31();
  scCssBlur(oThis);
}

function sc_form_maecom_fecfact31_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_maecom_fecfact31_hora_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_maecom_fecfact31_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecom_fecfact31_hora_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecom_condpag31_onblur(oThis, iSeqRow) {
  do_ajax_form_maecom_validate_condpag31();
  scCssBlur(oThis);
}

function sc_form_maecom_condpag31_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_maecom_condpag31_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecom_nopagos31_onblur(oThis, iSeqRow) {
  do_ajax_form_maecom_validate_nopagos31();
  scCssBlur(oThis);
}

function sc_form_maecom_nopagos31_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_maecom_nopagos31_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecom_formapago31_onblur(oThis, iSeqRow) {
  do_ajax_form_maecom_validate_formapago31();
  scCssBlur(oThis);
}

function sc_form_maecom_formapago31_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_maecom_formapago31_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecom_obra31_onblur(oThis, iSeqRow) {
  do_ajax_form_maecom_validate_obra31();
  scCssBlur(oThis);
}

function sc_form_maecom_obra31_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_maecom_obra31_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecom_orden31_onblur(oThis, iSeqRow) {
  do_ajax_form_maecom_validate_orden31();
  scCssBlur(oThis);
}

function sc_form_maecom_orden31_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_maecom_orden31_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecom_cvnegra31_onblur(oThis, iSeqRow) {
  do_ajax_form_maecom_validate_cvnegra31();
  scCssBlur(oThis);
}

function sc_form_maecom_cvnegra31_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_maecom_cvnegra31_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecom_status31_onblur(oThis, iSeqRow) {
  do_ajax_form_maecom_validate_status31();
  scCssBlur(oThis);
}

function sc_form_maecom_status31_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_maecom_status31_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecom_cvimpto31_onblur(oThis, iSeqRow) {
  do_ajax_form_maecom_validate_cvimpto31();
  scCssBlur(oThis);
}

function sc_form_maecom_cvimpto31_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_maecom_cvimpto31_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecom_cvanulado31_onblur(oThis, iSeqRow) {
  do_ajax_form_maecom_validate_cvanulado31();
  scCssBlur(oThis);
}

function sc_form_maecom_cvanulado31_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_maecom_cvanulado31_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecom_efectivo31_onblur(oThis, iSeqRow) {
  do_ajax_form_maecom_validate_efectivo31();
  scCssBlur(oThis);
}

function sc_form_maecom_efectivo31_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_maecom_efectivo31_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecom_cheque31_onblur(oThis, iSeqRow) {
  do_ajax_form_maecom_validate_cheque31();
  scCssBlur(oThis);
}

function sc_form_maecom_cheque31_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_maecom_cheque31_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecom_tarjeta31_onblur(oThis, iSeqRow) {
  do_ajax_form_maecom_validate_tarjeta31();
  scCssBlur(oThis);
}

function sc_form_maecom_tarjeta31_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_maecom_tarjeta31_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecom_acuenta31_onblur(oThis, iSeqRow) {
  do_ajax_form_maecom_validate_acuenta31();
  scCssBlur(oThis);
}

function sc_form_maecom_acuenta31_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_maecom_acuenta31_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecom_nobanco31_onblur(oThis, iSeqRow) {
  do_ajax_form_maecom_validate_nobanco31();
  scCssBlur(oThis);
}

function sc_form_maecom_nobanco31_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_maecom_nobanco31_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecom_nombanco31_onblur(oThis, iSeqRow) {
  do_ajax_form_maecom_validate_nombanco31();
  scCssBlur(oThis);
}

function sc_form_maecom_nombanco31_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_maecom_nombanco31_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecom_nocheque31_onblur(oThis, iSeqRow) {
  do_ajax_form_maecom_validate_nocheque31();
  scCssBlur(oThis);
}

function sc_form_maecom_nocheque31_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_maecom_nocheque31_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecom_notarjeta31_onblur(oThis, iSeqRow) {
  do_ajax_form_maecom_validate_notarjeta31();
  scCssBlur(oThis);
}

function sc_form_maecom_notarjeta31_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_maecom_notarjeta31_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecom_nomtarjeta31_onblur(oThis, iSeqRow) {
  do_ajax_form_maecom_validate_nomtarjeta31();
  scCssBlur(oThis);
}

function sc_form_maecom_nomtarjeta31_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_maecom_nomtarjeta31_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecom_cvdivisa31_onblur(oThis, iSeqRow) {
  do_ajax_form_maecom_validate_cvdivisa31();
  scCssBlur(oThis);
}

function sc_form_maecom_cvdivisa31_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_maecom_cvdivisa31_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecom_valdivisa31_onblur(oThis, iSeqRow) {
  do_ajax_form_maecom_validate_valdivisa31();
  scCssBlur(oThis);
}

function sc_form_maecom_valdivisa31_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_maecom_valdivisa31_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecom_lineaprod31_onblur(oThis, iSeqRow) {
  do_ajax_form_maecom_validate_lineaprod31();
  scCssBlur(oThis);
}

function sc_form_maecom_lineaprod31_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_maecom_lineaprod31_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecom_intereses31_onblur(oThis, iSeqRow) {
  do_ajax_form_maecom_validate_intereses31();
  scCssBlur(oThis);
}

function sc_form_maecom_intereses31_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_maecom_intereses31_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecom_nopedido31_onblur(oThis, iSeqRow) {
  do_ajax_form_maecom_validate_nopedido31();
  scCssBlur(oThis);
}

function sc_form_maecom_nopedido31_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_maecom_nopedido31_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecom_fecped31_onblur(oThis, iSeqRow) {
  do_ajax_form_maecom_validate_fecped31();
  scCssBlur(oThis);
}

function sc_form_maecom_fecped31_hora_onblur(oThis, iSeqRow) {
  do_ajax_form_maecom_validate_fecped31();
  scCssBlur(oThis);
}

function sc_form_maecom_fecped31_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_maecom_fecped31_hora_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_maecom_fecped31_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecom_fecped31_hora_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecom_ruc31_onblur(oThis, iSeqRow) {
  do_ajax_form_maecom_validate_ruc31();
  scCssBlur(oThis);
}

function sc_form_maecom_ruc31_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_maecom_ruc31_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecom_tel31_onblur(oThis, iSeqRow) {
  do_ajax_form_maecom_validate_tel31();
  scCssBlur(oThis);
}

function sc_form_maecom_tel31_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_maecom_tel31_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecom_transpor31_onblur(oThis, iSeqRow) {
  do_ajax_form_maecom_validate_transpor31();
  scCssBlur(oThis);
}

function sc_form_maecom_transpor31_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_maecom_transpor31_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecom_cvtransfer31_onblur(oThis, iSeqRow) {
  do_ajax_form_maecom_validate_cvtransfer31();
  scCssBlur(oThis);
}

function sc_form_maecom_cvtransfer31_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_maecom_cvtransfer31_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecom_fectrasfer31_onblur(oThis, iSeqRow) {
  do_ajax_form_maecom_validate_fectrasfer31();
  scCssBlur(oThis);
}

function sc_form_maecom_fectrasfer31_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_maecom_fectrasfer31_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecom_desctofp31_onblur(oThis, iSeqRow) {
  do_ajax_form_maecom_validate_desctofp31();
  scCssBlur(oThis);
}

function sc_form_maecom_desctofp31_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_maecom_desctofp31_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecom_catcte31_onblur(oThis, iSeqRow) {
  do_ajax_form_maecom_validate_catcte31();
  scCssBlur(oThis);
}

function sc_form_maecom_catcte31_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_maecom_catcte31_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecom_uid_onblur(oThis, iSeqRow) {
  do_ajax_form_maecom_validate_uid();
  scCssBlur(oThis);
}

function sc_form_maecom_uid_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_maecom_uid_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecom_recargos31_onblur(oThis, iSeqRow) {
  do_ajax_form_maecom_validate_recargos31();
  scCssBlur(oThis);
}

function sc_form_maecom_recargos31_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_maecom_recargos31_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecom_ice31_onblur(oThis, iSeqRow) {
  do_ajax_form_maecom_validate_ice31();
  scCssBlur(oThis);
}

function sc_form_maecom_ice31_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_maecom_ice31_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecom_fecdocpr31_onblur(oThis, iSeqRow) {
  do_ajax_form_maecom_validate_fecdocpr31();
  scCssBlur(oThis);
}

function sc_form_maecom_fecdocpr31_hora_onblur(oThis, iSeqRow) {
  do_ajax_form_maecom_validate_fecdocpr31();
  scCssBlur(oThis);
}

function sc_form_maecom_fecdocpr31_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_maecom_fecdocpr31_hora_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_maecom_fecdocpr31_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecom_fecdocpr31_hora_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecom_tipocomp31_onblur(oThis, iSeqRow) {
  do_ajax_form_maecom_validate_tipocomp31();
  scCssBlur(oThis);
}

function sc_form_maecom_tipocomp31_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_maecom_tipocomp31_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecom_conta31_onblur(oThis, iSeqRow) {
  do_ajax_form_maecom_validate_conta31();
  scCssBlur(oThis);
}

function sc_form_maecom_conta31_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_maecom_conta31_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecom_fecvencidocpr_onblur(oThis, iSeqRow) {
  do_ajax_form_maecom_validate_fecvencidocpr();
  scCssBlur(oThis);
}

function sc_form_maecom_fecvencidocpr_hora_onblur(oThis, iSeqRow) {
  do_ajax_form_maecom_validate_fecvencidocpr();
  scCssBlur(oThis);
}

function sc_form_maecom_fecvencidocpr_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_maecom_fecvencidocpr_hora_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_maecom_fecvencidocpr_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecom_fecvencidocpr_hora_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecom_totsiniva31_onblur(oThis, iSeqRow) {
  do_ajax_form_maecom_validate_totsiniva31();
  scCssBlur(oThis);
}

function sc_form_maecom_totsiniva31_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_maecom_totsiniva31_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecom_fecemb_onblur(oThis, iSeqRow) {
  do_ajax_form_maecom_validate_fecemb();
  scCssBlur(oThis);
}

function sc_form_maecom_fecemb_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_maecom_fecemb_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecom_norefrendo_onblur(oThis, iSeqRow) {
  do_ajax_form_maecom_validate_norefrendo();
  scCssBlur(oThis);
}

function sc_form_maecom_norefrendo_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_maecom_norefrendo_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecom_baseice_onblur(oThis, iSeqRow) {
  do_ajax_form_maecom_validate_baseice();
  scCssBlur(oThis);
}

function sc_form_maecom_baseice_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_maecom_baseice_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecom_ncodret43_onblur(oThis, iSeqRow) {
  do_ajax_form_maecom_validate_ncodret43();
  scCssBlur(oThis);
}

function sc_form_maecom_ncodret43_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_maecom_ncodret43_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecom_nbaseret43_onblur(oThis, iSeqRow) {
  do_ajax_form_maecom_validate_nbaseret43();
  scCssBlur(oThis);
}

function sc_form_maecom_nbaseret43_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_maecom_nbaseret43_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecom_npctjeret43_onblur(oThis, iSeqRow) {
  do_ajax_form_maecom_validate_npctjeret43();
  scCssBlur(oThis);
}

function sc_form_maecom_npctjeret43_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_maecom_npctjeret43_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecom_contrato_onblur(oThis, iSeqRow) {
  do_ajax_form_maecom_validate_contrato();
  scCssBlur(oThis);
}

function sc_form_maecom_contrato_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_maecom_contrato_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecom_compra_general_onblur(oThis, iSeqRow) {
  do_ajax_form_maecom_validate_compra_general();
  scCssBlur(oThis);
}

function sc_form_maecom_compra_general_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_maecom_compra_general_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecom_distribucion_rubros_onblur(oThis, iSeqRow) {
  do_ajax_form_maecom_validate_distribucion_rubros();
  scCssBlur(oThis);
}

function sc_form_maecom_distribucion_rubros_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_maecom_distribucion_rubros_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecom_dstoley_onblur(oThis, iSeqRow) {
  do_ajax_form_maecom_validate_dstoley();
  scCssBlur(oThis);
}

function sc_form_maecom_dstoley_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_maecom_dstoley_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecom_remgas31_onblur(oThis, iSeqRow) {
  do_ajax_form_maecom_validate_remgas31();
  scCssBlur(oThis);
}

function sc_form_maecom_remgas31_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_maecom_remgas31_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecom_estado_electronico_onblur(oThis, iSeqRow) {
  do_ajax_form_maecom_validate_estado_electronico();
  scCssBlur(oThis);
}

function sc_form_maecom_estado_electronico_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_maecom_estado_electronico_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maecom_coddest31_onblur(oThis, iSeqRow) {
  do_ajax_form_maecom_validate_coddest31();
  scCssBlur(oThis);
}

function sc_form_maecom_coddest31_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_maecom_coddest31_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function displayChange_block(block, status) {
	if ("0" == block) {
		displayChange_block_0(status);
	}
}

function displayChange_block_0(status) {
	displayChange_field("tipodocto31", "", status);
	displayChange_field("nofact31", "", status);
	displayChange_field("nocte31", "", status);
	displayChange_field("nomcte31", "", status);
	displayChange_field("localid31", "", status);
	displayChange_field("cvectenegro31", "", status);
	displayChange_field("vtabta31", "", status);
	displayChange_field("descto31", "", status);
	displayChange_field("flete31", "", status);
	displayChange_field("itm31", "", status);
	displayChange_field("novend31", "", status);
	displayChange_field("fecfact31", "", status);
	displayChange_field("condpag31", "", status);
	displayChange_field("nopagos31", "", status);
	displayChange_field("formapago31", "", status);
	displayChange_field("obra31", "", status);
	displayChange_field("orden31", "", status);
	displayChange_field("cvnegra31", "", status);
	displayChange_field("status31", "", status);
	displayChange_field("cvimpto31", "", status);
	displayChange_field("cvanulado31", "", status);
	displayChange_field("efectivo31", "", status);
	displayChange_field("cheque31", "", status);
	displayChange_field("tarjeta31", "", status);
	displayChange_field("acuenta31", "", status);
	displayChange_field("nobanco31", "", status);
	displayChange_field("nombanco31", "", status);
	displayChange_field("nocheque31", "", status);
	displayChange_field("notarjeta31", "", status);
	displayChange_field("nomtarjeta31", "", status);
	displayChange_field("cvdivisa31", "", status);
	displayChange_field("valdivisa31", "", status);
	displayChange_field("lineaprod31", "", status);
	displayChange_field("intereses31", "", status);
	displayChange_field("nopedido31", "", status);
	displayChange_field("fecped31", "", status);
	displayChange_field("ruc31", "", status);
	displayChange_field("tel31", "", status);
	displayChange_field("transpor31", "", status);
	displayChange_field("cvtransfer31", "", status);
	displayChange_field("fectrasfer31", "", status);
	displayChange_field("desctofp31", "", status);
	displayChange_field("catcte31", "", status);
	displayChange_field("uid", "", status);
	displayChange_field("recargos31", "", status);
	displayChange_field("ice31", "", status);
	displayChange_field("fecdocpr31", "", status);
	displayChange_field("tipocomp31", "", status);
	displayChange_field("conta31", "", status);
	displayChange_field("fecvencidocpr", "", status);
	displayChange_field("totsiniva31", "", status);
	displayChange_field("fecemb", "", status);
	displayChange_field("norefrendo", "", status);
	displayChange_field("baseice", "", status);
	displayChange_field("ncodret43", "", status);
	displayChange_field("nbaseret43", "", status);
	displayChange_field("npctjeret43", "", status);
	displayChange_field("contrato", "", status);
	displayChange_field("compra_general", "", status);
	displayChange_field("distribucion_rubros", "", status);
	displayChange_field("dstoley", "", status);
	displayChange_field("remgas31", "", status);
	displayChange_field("estado_electronico", "", status);
	displayChange_field("coddest31", "", status);
}

function displayChange_row(row, status) {
	displayChange_field_tipodocto31(row, status);
	displayChange_field_nofact31(row, status);
	displayChange_field_nocte31(row, status);
	displayChange_field_nomcte31(row, status);
	displayChange_field_localid31(row, status);
	displayChange_field_cvectenegro31(row, status);
	displayChange_field_vtabta31(row, status);
	displayChange_field_descto31(row, status);
	displayChange_field_flete31(row, status);
	displayChange_field_itm31(row, status);
	displayChange_field_novend31(row, status);
	displayChange_field_fecfact31(row, status);
	displayChange_field_condpag31(row, status);
	displayChange_field_nopagos31(row, status);
	displayChange_field_formapago31(row, status);
	displayChange_field_obra31(row, status);
	displayChange_field_orden31(row, status);
	displayChange_field_cvnegra31(row, status);
	displayChange_field_status31(row, status);
	displayChange_field_cvimpto31(row, status);
	displayChange_field_cvanulado31(row, status);
	displayChange_field_efectivo31(row, status);
	displayChange_field_cheque31(row, status);
	displayChange_field_tarjeta31(row, status);
	displayChange_field_acuenta31(row, status);
	displayChange_field_nobanco31(row, status);
	displayChange_field_nombanco31(row, status);
	displayChange_field_nocheque31(row, status);
	displayChange_field_notarjeta31(row, status);
	displayChange_field_nomtarjeta31(row, status);
	displayChange_field_cvdivisa31(row, status);
	displayChange_field_valdivisa31(row, status);
	displayChange_field_lineaprod31(row, status);
	displayChange_field_intereses31(row, status);
	displayChange_field_nopedido31(row, status);
	displayChange_field_fecped31(row, status);
	displayChange_field_ruc31(row, status);
	displayChange_field_tel31(row, status);
	displayChange_field_transpor31(row, status);
	displayChange_field_cvtransfer31(row, status);
	displayChange_field_fectrasfer31(row, status);
	displayChange_field_desctofp31(row, status);
	displayChange_field_catcte31(row, status);
	displayChange_field_uid(row, status);
	displayChange_field_recargos31(row, status);
	displayChange_field_ice31(row, status);
	displayChange_field_fecdocpr31(row, status);
	displayChange_field_tipocomp31(row, status);
	displayChange_field_conta31(row, status);
	displayChange_field_fecvencidocpr(row, status);
	displayChange_field_totsiniva31(row, status);
	displayChange_field_fecemb(row, status);
	displayChange_field_norefrendo(row, status);
	displayChange_field_baseice(row, status);
	displayChange_field_ncodret43(row, status);
	displayChange_field_nbaseret43(row, status);
	displayChange_field_npctjeret43(row, status);
	displayChange_field_contrato(row, status);
	displayChange_field_compra_general(row, status);
	displayChange_field_distribucion_rubros(row, status);
	displayChange_field_dstoley(row, status);
	displayChange_field_remgas31(row, status);
	displayChange_field_estado_electronico(row, status);
	displayChange_field_coddest31(row, status);
}

function displayChange_field(field, row, status) {
	if ("tipodocto31" == field) {
		displayChange_field_tipodocto31(row, status);
	}
	if ("nofact31" == field) {
		displayChange_field_nofact31(row, status);
	}
	if ("nocte31" == field) {
		displayChange_field_nocte31(row, status);
	}
	if ("nomcte31" == field) {
		displayChange_field_nomcte31(row, status);
	}
	if ("localid31" == field) {
		displayChange_field_localid31(row, status);
	}
	if ("cvectenegro31" == field) {
		displayChange_field_cvectenegro31(row, status);
	}
	if ("vtabta31" == field) {
		displayChange_field_vtabta31(row, status);
	}
	if ("descto31" == field) {
		displayChange_field_descto31(row, status);
	}
	if ("flete31" == field) {
		displayChange_field_flete31(row, status);
	}
	if ("itm31" == field) {
		displayChange_field_itm31(row, status);
	}
	if ("novend31" == field) {
		displayChange_field_novend31(row, status);
	}
	if ("fecfact31" == field) {
		displayChange_field_fecfact31(row, status);
	}
	if ("condpag31" == field) {
		displayChange_field_condpag31(row, status);
	}
	if ("nopagos31" == field) {
		displayChange_field_nopagos31(row, status);
	}
	if ("formapago31" == field) {
		displayChange_field_formapago31(row, status);
	}
	if ("obra31" == field) {
		displayChange_field_obra31(row, status);
	}
	if ("orden31" == field) {
		displayChange_field_orden31(row, status);
	}
	if ("cvnegra31" == field) {
		displayChange_field_cvnegra31(row, status);
	}
	if ("status31" == field) {
		displayChange_field_status31(row, status);
	}
	if ("cvimpto31" == field) {
		displayChange_field_cvimpto31(row, status);
	}
	if ("cvanulado31" == field) {
		displayChange_field_cvanulado31(row, status);
	}
	if ("efectivo31" == field) {
		displayChange_field_efectivo31(row, status);
	}
	if ("cheque31" == field) {
		displayChange_field_cheque31(row, status);
	}
	if ("tarjeta31" == field) {
		displayChange_field_tarjeta31(row, status);
	}
	if ("acuenta31" == field) {
		displayChange_field_acuenta31(row, status);
	}
	if ("nobanco31" == field) {
		displayChange_field_nobanco31(row, status);
	}
	if ("nombanco31" == field) {
		displayChange_field_nombanco31(row, status);
	}
	if ("nocheque31" == field) {
		displayChange_field_nocheque31(row, status);
	}
	if ("notarjeta31" == field) {
		displayChange_field_notarjeta31(row, status);
	}
	if ("nomtarjeta31" == field) {
		displayChange_field_nomtarjeta31(row, status);
	}
	if ("cvdivisa31" == field) {
		displayChange_field_cvdivisa31(row, status);
	}
	if ("valdivisa31" == field) {
		displayChange_field_valdivisa31(row, status);
	}
	if ("lineaprod31" == field) {
		displayChange_field_lineaprod31(row, status);
	}
	if ("intereses31" == field) {
		displayChange_field_intereses31(row, status);
	}
	if ("nopedido31" == field) {
		displayChange_field_nopedido31(row, status);
	}
	if ("fecped31" == field) {
		displayChange_field_fecped31(row, status);
	}
	if ("ruc31" == field) {
		displayChange_field_ruc31(row, status);
	}
	if ("tel31" == field) {
		displayChange_field_tel31(row, status);
	}
	if ("transpor31" == field) {
		displayChange_field_transpor31(row, status);
	}
	if ("cvtransfer31" == field) {
		displayChange_field_cvtransfer31(row, status);
	}
	if ("fectrasfer31" == field) {
		displayChange_field_fectrasfer31(row, status);
	}
	if ("desctofp31" == field) {
		displayChange_field_desctofp31(row, status);
	}
	if ("catcte31" == field) {
		displayChange_field_catcte31(row, status);
	}
	if ("uid" == field) {
		displayChange_field_uid(row, status);
	}
	if ("recargos31" == field) {
		displayChange_field_recargos31(row, status);
	}
	if ("ice31" == field) {
		displayChange_field_ice31(row, status);
	}
	if ("fecdocpr31" == field) {
		displayChange_field_fecdocpr31(row, status);
	}
	if ("tipocomp31" == field) {
		displayChange_field_tipocomp31(row, status);
	}
	if ("conta31" == field) {
		displayChange_field_conta31(row, status);
	}
	if ("fecvencidocpr" == field) {
		displayChange_field_fecvencidocpr(row, status);
	}
	if ("totsiniva31" == field) {
		displayChange_field_totsiniva31(row, status);
	}
	if ("fecemb" == field) {
		displayChange_field_fecemb(row, status);
	}
	if ("norefrendo" == field) {
		displayChange_field_norefrendo(row, status);
	}
	if ("baseice" == field) {
		displayChange_field_baseice(row, status);
	}
	if ("ncodret43" == field) {
		displayChange_field_ncodret43(row, status);
	}
	if ("nbaseret43" == field) {
		displayChange_field_nbaseret43(row, status);
	}
	if ("npctjeret43" == field) {
		displayChange_field_npctjeret43(row, status);
	}
	if ("contrato" == field) {
		displayChange_field_contrato(row, status);
	}
	if ("compra_general" == field) {
		displayChange_field_compra_general(row, status);
	}
	if ("distribucion_rubros" == field) {
		displayChange_field_distribucion_rubros(row, status);
	}
	if ("dstoley" == field) {
		displayChange_field_dstoley(row, status);
	}
	if ("remgas31" == field) {
		displayChange_field_remgas31(row, status);
	}
	if ("estado_electronico" == field) {
		displayChange_field_estado_electronico(row, status);
	}
	if ("coddest31" == field) {
		displayChange_field_coddest31(row, status);
	}
}

function displayChange_field_tipodocto31(row, status) {
    var fieldId;
}

function displayChange_field_nofact31(row, status) {
    var fieldId;
}

function displayChange_field_nocte31(row, status) {
    var fieldId;
}

function displayChange_field_nomcte31(row, status) {
    var fieldId;
}

function displayChange_field_localid31(row, status) {
    var fieldId;
}

function displayChange_field_cvectenegro31(row, status) {
    var fieldId;
}

function displayChange_field_vtabta31(row, status) {
    var fieldId;
}

function displayChange_field_descto31(row, status) {
    var fieldId;
}

function displayChange_field_flete31(row, status) {
    var fieldId;
}

function displayChange_field_itm31(row, status) {
    var fieldId;
}

function displayChange_field_novend31(row, status) {
    var fieldId;
}

function displayChange_field_fecfact31(row, status) {
    var fieldId;
}

function displayChange_field_condpag31(row, status) {
    var fieldId;
}

function displayChange_field_nopagos31(row, status) {
    var fieldId;
}

function displayChange_field_formapago31(row, status) {
    var fieldId;
}

function displayChange_field_obra31(row, status) {
    var fieldId;
}

function displayChange_field_orden31(row, status) {
    var fieldId;
}

function displayChange_field_cvnegra31(row, status) {
    var fieldId;
}

function displayChange_field_status31(row, status) {
    var fieldId;
}

function displayChange_field_cvimpto31(row, status) {
    var fieldId;
}

function displayChange_field_cvanulado31(row, status) {
    var fieldId;
}

function displayChange_field_efectivo31(row, status) {
    var fieldId;
}

function displayChange_field_cheque31(row, status) {
    var fieldId;
}

function displayChange_field_tarjeta31(row, status) {
    var fieldId;
}

function displayChange_field_acuenta31(row, status) {
    var fieldId;
}

function displayChange_field_nobanco31(row, status) {
    var fieldId;
}

function displayChange_field_nombanco31(row, status) {
    var fieldId;
}

function displayChange_field_nocheque31(row, status) {
    var fieldId;
}

function displayChange_field_notarjeta31(row, status) {
    var fieldId;
}

function displayChange_field_nomtarjeta31(row, status) {
    var fieldId;
}

function displayChange_field_cvdivisa31(row, status) {
    var fieldId;
}

function displayChange_field_valdivisa31(row, status) {
    var fieldId;
}

function displayChange_field_lineaprod31(row, status) {
    var fieldId;
}

function displayChange_field_intereses31(row, status) {
    var fieldId;
}

function displayChange_field_nopedido31(row, status) {
    var fieldId;
}

function displayChange_field_fecped31(row, status) {
    var fieldId;
}

function displayChange_field_ruc31(row, status) {
    var fieldId;
}

function displayChange_field_tel31(row, status) {
    var fieldId;
}

function displayChange_field_transpor31(row, status) {
    var fieldId;
}

function displayChange_field_cvtransfer31(row, status) {
    var fieldId;
}

function displayChange_field_fectrasfer31(row, status) {
    var fieldId;
}

function displayChange_field_desctofp31(row, status) {
    var fieldId;
}

function displayChange_field_catcte31(row, status) {
    var fieldId;
}

function displayChange_field_uid(row, status) {
    var fieldId;
}

function displayChange_field_recargos31(row, status) {
    var fieldId;
}

function displayChange_field_ice31(row, status) {
    var fieldId;
}

function displayChange_field_fecdocpr31(row, status) {
    var fieldId;
}

function displayChange_field_tipocomp31(row, status) {
    var fieldId;
}

function displayChange_field_conta31(row, status) {
    var fieldId;
}

function displayChange_field_fecvencidocpr(row, status) {
    var fieldId;
}

function displayChange_field_totsiniva31(row, status) {
    var fieldId;
}

function displayChange_field_fecemb(row, status) {
    var fieldId;
}

function displayChange_field_norefrendo(row, status) {
    var fieldId;
}

function displayChange_field_baseice(row, status) {
    var fieldId;
}

function displayChange_field_ncodret43(row, status) {
    var fieldId;
}

function displayChange_field_nbaseret43(row, status) {
    var fieldId;
}

function displayChange_field_npctjeret43(row, status) {
    var fieldId;
}

function displayChange_field_contrato(row, status) {
    var fieldId;
}

function displayChange_field_compra_general(row, status) {
    var fieldId;
}

function displayChange_field_distribucion_rubros(row, status) {
    var fieldId;
}

function displayChange_field_dstoley(row, status) {
    var fieldId;
}

function displayChange_field_remgas31(row, status) {
    var fieldId;
}

function displayChange_field_estado_electronico(row, status) {
    var fieldId;
}

function displayChange_field_coddest31(row, status) {
    var fieldId;
}

function scRecreateSelect2() {
}
function scResetPagesDisplay() {
	$(".sc-form-page").show();
}

function scHidePage(pageNo) {
	$("#id_form_maecom_form" + pageNo).hide();
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
  $("#id_sc_field_fecfact31" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_fecfact31" + iSeqRow] = $oField.val();
      if (2 == aParts.length) {
        sTime = " " + aParts[1];
      }
      if ('' == sTime || ' ' == sTime) {
        sTime = ' <?php echo $this->jqueryCalendarTimeStart($this->field_config['fecfact31']['date_format']); ?>';
      }
      $oField.datepicker("option", "dateFormat", "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', 'hh', 'ii', 'ss', ':', ';', $_SESSION['scriptcase']['reg_conf']['date_sep'], $_SESSION['scriptcase']['reg_conf']['time_sep']), array('', 'yyyy', '','','', '', '', '', ''), $this->field_config['fecfact31']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>" + sTime);
    },
    onClose: function(dateText, inst) {
      do_ajax_form_maecom_validate_fecfact31(iSeqRow);
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
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', 'hh', 'ii', 'ss', ':', ';', $_SESSION['scriptcase']['reg_conf']['date_sep'], $_SESSION['scriptcase']['reg_conf']['time_sep']), array('', 'yyyy', '','','', '', '', '', ''), $this->field_config['fecfact31']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
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
  $("#id_sc_field_fecped31" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_fecped31" + iSeqRow] = $oField.val();
      if (2 == aParts.length) {
        sTime = " " + aParts[1];
      }
      if ('' == sTime || ' ' == sTime) {
        sTime = ' <?php echo $this->jqueryCalendarTimeStart($this->field_config['fecped31']['date_format']); ?>';
      }
      $oField.datepicker("option", "dateFormat", "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', 'hh', 'ii', 'ss', ':', ';', $_SESSION['scriptcase']['reg_conf']['date_sep'], $_SESSION['scriptcase']['reg_conf']['time_sep']), array('', 'yyyy', '','','', '', '', '', ''), $this->field_config['fecped31']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>" + sTime);
    },
    onClose: function(dateText, inst) {
      do_ajax_form_maecom_validate_fecped31(iSeqRow);
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
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', 'hh', 'ii', 'ss', ':', ';', $_SESSION['scriptcase']['reg_conf']['date_sep'], $_SESSION['scriptcase']['reg_conf']['time_sep']), array('', 'yyyy', '','','', '', '', '', ''), $this->field_config['fecped31']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
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
  $("#id_sc_field_fectrasfer31" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_fectrasfer31" + iSeqRow] = $oField.val();
    },
    onClose: function(dateText, inst) {
      do_ajax_form_maecom_validate_fectrasfer31(iSeqRow);
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
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', $_SESSION['scriptcase']['reg_conf']['date_sep']), array('', 'yyyy', ''), $this->field_config['fectrasfer31']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
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
  $("#id_sc_field_fecdocpr31" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_fecdocpr31" + iSeqRow] = $oField.val();
      if (2 == aParts.length) {
        sTime = " " + aParts[1];
      }
      if ('' == sTime || ' ' == sTime) {
        sTime = ' <?php echo $this->jqueryCalendarTimeStart($this->field_config['fecdocpr31']['date_format']); ?>';
      }
      $oField.datepicker("option", "dateFormat", "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', 'hh', 'ii', 'ss', ':', ';', $_SESSION['scriptcase']['reg_conf']['date_sep'], $_SESSION['scriptcase']['reg_conf']['time_sep']), array('', 'yyyy', '','','', '', '', '', ''), $this->field_config['fecdocpr31']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>" + sTime);
    },
    onClose: function(dateText, inst) {
      do_ajax_form_maecom_validate_fecdocpr31(iSeqRow);
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
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', 'hh', 'ii', 'ss', ':', ';', $_SESSION['scriptcase']['reg_conf']['date_sep'], $_SESSION['scriptcase']['reg_conf']['time_sep']), array('', 'yyyy', '','','', '', '', '', ''), $this->field_config['fecdocpr31']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
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
  $("#id_sc_field_fecvencidocpr" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_fecvencidocpr" + iSeqRow] = $oField.val();
      if (2 == aParts.length) {
        sTime = " " + aParts[1];
      }
      if ('' == sTime || ' ' == sTime) {
        sTime = ' <?php echo $this->jqueryCalendarTimeStart($this->field_config['fecvencidocpr']['date_format']); ?>';
      }
      $oField.datepicker("option", "dateFormat", "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', 'hh', 'ii', 'ss', ':', ';', $_SESSION['scriptcase']['reg_conf']['date_sep'], $_SESSION['scriptcase']['reg_conf']['time_sep']), array('', 'yyyy', '','','', '', '', '', ''), $this->field_config['fecvencidocpr']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>" + sTime);
    },
    onClose: function(dateText, inst) {
      do_ajax_form_maecom_validate_fecvencidocpr(iSeqRow);
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
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', 'hh', 'ii', 'ss', ':', ';', $_SESSION['scriptcase']['reg_conf']['date_sep'], $_SESSION['scriptcase']['reg_conf']['time_sep']), array('', 'yyyy', '','','', '', '', '', ''), $this->field_config['fecvencidocpr']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
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
  $("#id_sc_field_fecemb" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_fecemb" + iSeqRow] = $oField.val();
    },
    onClose: function(dateText, inst) {
      do_ajax_form_maecom_validate_fecemb(iSeqRow);
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
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', $_SESSION['scriptcase']['reg_conf']['date_sep']), array('', 'yyyy', ''), $this->field_config['fecemb']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
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
                         $(t).html("<a href=\"javascript:nm_mostra_doc('0', '"+rs2+"', 'form_maecom')\">"+$('#id_read_on_'+field+iSeqRow).text()+"</a>");
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

