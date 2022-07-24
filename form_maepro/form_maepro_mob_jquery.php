
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
  scEventControl_data["codprod01" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["desprod01" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["cve101" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["cve201" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["unidmed01" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["cantmin01" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["cantact01" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["valact01" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["exipromo01" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["precuni01" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["pedpend01" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["orden01" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["refer01" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["canentm01" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["valentm01" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["cansalm01" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["valsalm01" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["canenta01" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["valenta01" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["cansala01" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["valsala01" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["fecape01" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["fecult01" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["fecvta01" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["ubic01" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["precvta01" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["descto101" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["precio201" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["descto201" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["precio301" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["descto301" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["canvtam01" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["valvtam01" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["cosvtam01" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["canvtaa01" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["valvtaa01" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["cosvtaa01" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["prod1alt01" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["prod2alt01" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["proved101" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["proved201" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["med101" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["med201" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["med301" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["factor01" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["cvserie01" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["ctain101" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["ctain201" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["ctain301" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["porciva01" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["prodsinsdo01" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["sinprec01" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["fotoprod01" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["detprod01" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["block" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["uid" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["ultimoacceso" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["idpro" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["catprod01" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["med401" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["med501" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["prodconmed01" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["factorpeso01" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["codbar01" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["unifrac01" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["calidad01" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["color01" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["material01" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["talla01" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["compuesto01" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["catalt01" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["precfob01" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["precio401" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["descto401" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["porigen01" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["rin01" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["marca01" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["alto01" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["ancho01" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["tipoletra01" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["indcarga01" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["indveloc01" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["pr01" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["dis01" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["tipocons01" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["precateg01" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["tipprod01" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["conversion01" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["valhom01" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["ctain401" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["valhom02" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["valhom03" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["valhom04" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["statuspro01" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["parara01" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["prodequiv01" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["regalia01" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["precio501" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["descto501" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["precio601" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["descto601" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["precio701" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["descto701" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["precio801" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["descto801" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["precio901" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["descto901" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["precio1001" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["descto1001" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["precio1101" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["descto1101" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["precio1201" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["descto1201" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["submarca01" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["modelo01" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["clasific01" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["codbarempaque01" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["unidadempaque01" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["dimensionempaque01" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["link01" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["desprod201" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["desprod301" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["coefprd01" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["infor01" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["infor03" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["infor05" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["infor07" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["porcenrenta" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["peso" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["consignado" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["cant_consignado" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["baseimpexe01" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["peso01" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["prodrel01" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["infor02" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["infor04" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["infor06" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["infor08" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["porcicevta01" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["porcicecpra01" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["porcptdaranc01" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["ordimp01" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["codprod01" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["codprod01" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["desprod01" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["desprod01" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["cve101" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["cve101" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["cve201" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["cve201" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["unidmed01" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["unidmed01" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["cantmin01" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["cantmin01" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["cantact01" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["cantact01" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["valact01" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["valact01" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["exipromo01" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["exipromo01" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["precuni01" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["precuni01" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["pedpend01" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["pedpend01" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["orden01" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["orden01" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["refer01" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["refer01" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["canentm01" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["canentm01" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["valentm01" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["valentm01" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["cansalm01" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["cansalm01" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["valsalm01" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["valsalm01" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["canenta01" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["canenta01" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["valenta01" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["valenta01" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["cansala01" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["cansala01" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["valsala01" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["valsala01" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["fecape01" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["fecape01" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["fecult01" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["fecult01" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["fecvta01" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["fecvta01" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["ubic01" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["ubic01" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["precvta01" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["precvta01" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["descto101" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["descto101" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["precio201" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["precio201" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["descto201" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["descto201" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["precio301" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["precio301" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["descto301" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["descto301" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["canvtam01" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["canvtam01" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["valvtam01" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["valvtam01" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["cosvtam01" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["cosvtam01" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["canvtaa01" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["canvtaa01" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["valvtaa01" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["valvtaa01" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["cosvtaa01" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["cosvtaa01" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["prod1alt01" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["prod1alt01" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["prod2alt01" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["prod2alt01" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["proved101" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["proved101" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["proved201" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["proved201" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["med101" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["med101" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["med201" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["med201" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["med301" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["med301" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["factor01" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["factor01" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["cvserie01" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["cvserie01" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["ctain101" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["ctain101" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["ctain201" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["ctain201" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["ctain301" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["ctain301" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["porciva01" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["porciva01" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["prodsinsdo01" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["prodsinsdo01" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["sinprec01" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["sinprec01" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["fotoprod01" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["fotoprod01" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["detprod01" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["detprod01" + iSeqRow]["change"]) {
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
  if (scEventControl_data["idpro" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["idpro" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["catprod01" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["catprod01" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["med401" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["med401" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["med501" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["med501" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["prodconmed01" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["prodconmed01" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["factorpeso01" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["factorpeso01" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["codbar01" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["codbar01" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["unifrac01" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["unifrac01" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["calidad01" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["calidad01" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["color01" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["color01" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["material01" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["material01" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["talla01" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["talla01" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["compuesto01" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["compuesto01" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["catalt01" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["catalt01" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["precfob01" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["precfob01" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["precio401" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["precio401" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["descto401" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["descto401" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["porigen01" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["porigen01" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["rin01" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["rin01" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["marca01" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["marca01" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["alto01" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["alto01" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["ancho01" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["ancho01" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["tipoletra01" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["tipoletra01" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["indcarga01" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["indcarga01" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["indveloc01" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["indveloc01" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["pr01" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["pr01" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["dis01" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["dis01" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["tipocons01" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["tipocons01" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["precateg01" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["precateg01" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["tipprod01" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["tipprod01" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["conversion01" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["conversion01" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["valhom01" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["valhom01" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["ctain401" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["ctain401" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["valhom02" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["valhom02" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["valhom03" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["valhom03" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["valhom04" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["valhom04" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["statuspro01" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["statuspro01" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["parara01" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["parara01" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["prodequiv01" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["prodequiv01" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["regalia01" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["regalia01" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["precio501" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["precio501" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["descto501" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["descto501" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["precio601" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["precio601" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["descto601" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["descto601" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["precio701" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["precio701" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["descto701" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["descto701" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["precio801" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["precio801" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["descto801" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["descto801" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["precio901" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["precio901" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["descto901" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["descto901" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["precio1001" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["precio1001" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["descto1001" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["descto1001" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["precio1101" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["precio1101" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["descto1101" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["descto1101" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["precio1201" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["precio1201" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["descto1201" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["descto1201" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["submarca01" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["submarca01" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["modelo01" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["modelo01" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["clasific01" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["clasific01" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["codbarempaque01" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["codbarempaque01" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["unidadempaque01" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["unidadempaque01" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["dimensionempaque01" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["dimensionempaque01" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["link01" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["link01" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["desprod201" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["desprod201" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["desprod301" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["desprod301" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["coefprd01" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["coefprd01" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["infor01" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["infor01" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["infor03" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["infor03" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["infor05" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["infor05" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["infor07" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["infor07" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["porcenrenta" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["porcenrenta" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["peso" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["peso" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["consignado" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["consignado" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["cant_consignado" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["cant_consignado" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["baseimpexe01" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["baseimpexe01" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["peso01" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["peso01" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["prodrel01" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["prodrel01" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["infor02" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["infor02" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["infor04" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["infor04" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["infor06" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["infor06" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["infor08" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["infor08" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["porcicevta01" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["porcicevta01" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["porcicecpra01" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["porcicecpra01" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["porcptdaranc01" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["porcptdaranc01" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["ordimp01" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["ordimp01" + iSeqRow]["change"]) {
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
  $('#id_sc_field_codprod01' + iSeqRow).bind('blur', function() { sc_form_maepro_codprod01_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_maepro_codprod01_onfocus(this, iSeqRow) });
  $('#id_sc_field_desprod01' + iSeqRow).bind('blur', function() { sc_form_maepro_desprod01_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_maepro_desprod01_onfocus(this, iSeqRow) });
  $('#id_sc_field_cve101' + iSeqRow).bind('blur', function() { sc_form_maepro_cve101_onblur(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_maepro_cve101_onfocus(this, iSeqRow) });
  $('#id_sc_field_cve201' + iSeqRow).bind('blur', function() { sc_form_maepro_cve201_onblur(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_maepro_cve201_onfocus(this, iSeqRow) });
  $('#id_sc_field_unidmed01' + iSeqRow).bind('blur', function() { sc_form_maepro_unidmed01_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_maepro_unidmed01_onfocus(this, iSeqRow) });
  $('#id_sc_field_cantmin01' + iSeqRow).bind('blur', function() { sc_form_maepro_cantmin01_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_maepro_cantmin01_onfocus(this, iSeqRow) });
  $('#id_sc_field_cantact01' + iSeqRow).bind('blur', function() { sc_form_maepro_cantact01_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_maepro_cantact01_onfocus(this, iSeqRow) });
  $('#id_sc_field_valact01' + iSeqRow).bind('blur', function() { sc_form_maepro_valact01_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_maepro_valact01_onfocus(this, iSeqRow) });
  $('#id_sc_field_exipromo01' + iSeqRow).bind('blur', function() { sc_form_maepro_exipromo01_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_maepro_exipromo01_onfocus(this, iSeqRow) });
  $('#id_sc_field_precuni01' + iSeqRow).bind('blur', function() { sc_form_maepro_precuni01_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_maepro_precuni01_onfocus(this, iSeqRow) });
  $('#id_sc_field_pedpend01' + iSeqRow).bind('blur', function() { sc_form_maepro_pedpend01_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_maepro_pedpend01_onfocus(this, iSeqRow) });
  $('#id_sc_field_orden01' + iSeqRow).bind('blur', function() { sc_form_maepro_orden01_onblur(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_maepro_orden01_onfocus(this, iSeqRow) });
  $('#id_sc_field_refer01' + iSeqRow).bind('blur', function() { sc_form_maepro_refer01_onblur(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_maepro_refer01_onfocus(this, iSeqRow) });
  $('#id_sc_field_canentm01' + iSeqRow).bind('blur', function() { sc_form_maepro_canentm01_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_maepro_canentm01_onfocus(this, iSeqRow) });
  $('#id_sc_field_valentm01' + iSeqRow).bind('blur', function() { sc_form_maepro_valentm01_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_maepro_valentm01_onfocus(this, iSeqRow) });
  $('#id_sc_field_cansalm01' + iSeqRow).bind('blur', function() { sc_form_maepro_cansalm01_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_maepro_cansalm01_onfocus(this, iSeqRow) });
  $('#id_sc_field_valsalm01' + iSeqRow).bind('blur', function() { sc_form_maepro_valsalm01_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_maepro_valsalm01_onfocus(this, iSeqRow) });
  $('#id_sc_field_canenta01' + iSeqRow).bind('blur', function() { sc_form_maepro_canenta01_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_maepro_canenta01_onfocus(this, iSeqRow) });
  $('#id_sc_field_valenta01' + iSeqRow).bind('blur', function() { sc_form_maepro_valenta01_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_maepro_valenta01_onfocus(this, iSeqRow) });
  $('#id_sc_field_cansala01' + iSeqRow).bind('blur', function() { sc_form_maepro_cansala01_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_maepro_cansala01_onfocus(this, iSeqRow) });
  $('#id_sc_field_valsala01' + iSeqRow).bind('blur', function() { sc_form_maepro_valsala01_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_maepro_valsala01_onfocus(this, iSeqRow) });
  $('#id_sc_field_fecape01' + iSeqRow).bind('blur', function() { sc_form_maepro_fecape01_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_maepro_fecape01_onfocus(this, iSeqRow) });
  $('#id_sc_field_fecape01_hora' + iSeqRow).bind('blur', function() { sc_form_maepro_fecape01_onblur(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_maepro_fecape01_onfocus(this, iSeqRow) });
  $('#id_sc_field_fecult01' + iSeqRow).bind('blur', function() { sc_form_maepro_fecult01_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_maepro_fecult01_onfocus(this, iSeqRow) });
  $('#id_sc_field_fecult01_hora' + iSeqRow).bind('blur', function() { sc_form_maepro_fecult01_onblur(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_maepro_fecult01_onfocus(this, iSeqRow) });
  $('#id_sc_field_fecvta01' + iSeqRow).bind('blur', function() { sc_form_maepro_fecvta01_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_maepro_fecvta01_onfocus(this, iSeqRow) });
  $('#id_sc_field_fecvta01_hora' + iSeqRow).bind('blur', function() { sc_form_maepro_fecvta01_onblur(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_maepro_fecvta01_onfocus(this, iSeqRow) });
  $('#id_sc_field_ubic01' + iSeqRow).bind('blur', function() { sc_form_maepro_ubic01_onblur(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_maepro_ubic01_onfocus(this, iSeqRow) });
  $('#id_sc_field_precvta01' + iSeqRow).bind('blur', function() { sc_form_maepro_precvta01_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_maepro_precvta01_onfocus(this, iSeqRow) });
  $('#id_sc_field_descto101' + iSeqRow).bind('blur', function() { sc_form_maepro_descto101_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_maepro_descto101_onfocus(this, iSeqRow) });
  $('#id_sc_field_precio201' + iSeqRow).bind('blur', function() { sc_form_maepro_precio201_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_maepro_precio201_onfocus(this, iSeqRow) });
  $('#id_sc_field_descto201' + iSeqRow).bind('blur', function() { sc_form_maepro_descto201_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_maepro_descto201_onfocus(this, iSeqRow) });
  $('#id_sc_field_precio301' + iSeqRow).bind('blur', function() { sc_form_maepro_precio301_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_maepro_precio301_onfocus(this, iSeqRow) });
  $('#id_sc_field_descto301' + iSeqRow).bind('blur', function() { sc_form_maepro_descto301_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_maepro_descto301_onfocus(this, iSeqRow) });
  $('#id_sc_field_canvtam01' + iSeqRow).bind('blur', function() { sc_form_maepro_canvtam01_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_maepro_canvtam01_onfocus(this, iSeqRow) });
  $('#id_sc_field_valvtam01' + iSeqRow).bind('blur', function() { sc_form_maepro_valvtam01_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_maepro_valvtam01_onfocus(this, iSeqRow) });
  $('#id_sc_field_cosvtam01' + iSeqRow).bind('blur', function() { sc_form_maepro_cosvtam01_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_maepro_cosvtam01_onfocus(this, iSeqRow) });
  $('#id_sc_field_canvtaa01' + iSeqRow).bind('blur', function() { sc_form_maepro_canvtaa01_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_maepro_canvtaa01_onfocus(this, iSeqRow) });
  $('#id_sc_field_valvtaa01' + iSeqRow).bind('blur', function() { sc_form_maepro_valvtaa01_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_maepro_valvtaa01_onfocus(this, iSeqRow) });
  $('#id_sc_field_cosvtaa01' + iSeqRow).bind('blur', function() { sc_form_maepro_cosvtaa01_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_maepro_cosvtaa01_onfocus(this, iSeqRow) });
  $('#id_sc_field_prod1alt01' + iSeqRow).bind('blur', function() { sc_form_maepro_prod1alt01_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_maepro_prod1alt01_onfocus(this, iSeqRow) });
  $('#id_sc_field_prod2alt01' + iSeqRow).bind('blur', function() { sc_form_maepro_prod2alt01_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_maepro_prod2alt01_onfocus(this, iSeqRow) });
  $('#id_sc_field_proved101' + iSeqRow).bind('blur', function() { sc_form_maepro_proved101_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_maepro_proved101_onfocus(this, iSeqRow) });
  $('#id_sc_field_proved201' + iSeqRow).bind('blur', function() { sc_form_maepro_proved201_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_maepro_proved201_onfocus(this, iSeqRow) });
  $('#id_sc_field_med101' + iSeqRow).bind('blur', function() { sc_form_maepro_med101_onblur(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_maepro_med101_onfocus(this, iSeqRow) });
  $('#id_sc_field_med201' + iSeqRow).bind('blur', function() { sc_form_maepro_med201_onblur(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_maepro_med201_onfocus(this, iSeqRow) });
  $('#id_sc_field_med301' + iSeqRow).bind('blur', function() { sc_form_maepro_med301_onblur(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_maepro_med301_onfocus(this, iSeqRow) });
  $('#id_sc_field_factor01' + iSeqRow).bind('blur', function() { sc_form_maepro_factor01_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_maepro_factor01_onfocus(this, iSeqRow) });
  $('#id_sc_field_cvserie01' + iSeqRow).bind('blur', function() { sc_form_maepro_cvserie01_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_maepro_cvserie01_onfocus(this, iSeqRow) });
  $('#id_sc_field_ctain101' + iSeqRow).bind('blur', function() { sc_form_maepro_ctain101_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_maepro_ctain101_onfocus(this, iSeqRow) });
  $('#id_sc_field_ctain201' + iSeqRow).bind('blur', function() { sc_form_maepro_ctain201_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_maepro_ctain201_onfocus(this, iSeqRow) });
  $('#id_sc_field_ctain301' + iSeqRow).bind('blur', function() { sc_form_maepro_ctain301_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_maepro_ctain301_onfocus(this, iSeqRow) });
  $('#id_sc_field_porciva01' + iSeqRow).bind('blur', function() { sc_form_maepro_porciva01_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_maepro_porciva01_onfocus(this, iSeqRow) });
  $('#id_sc_field_prodsinsdo01' + iSeqRow).bind('blur', function() { sc_form_maepro_prodsinsdo01_onblur(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_maepro_prodsinsdo01_onfocus(this, iSeqRow) });
  $('#id_sc_field_sinprec01' + iSeqRow).bind('blur', function() { sc_form_maepro_sinprec01_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_maepro_sinprec01_onfocus(this, iSeqRow) });
  $('#id_sc_field_fotoprod01' + iSeqRow).bind('blur', function() { sc_form_maepro_fotoprod01_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_maepro_fotoprod01_onfocus(this, iSeqRow) });
  $('#id_sc_field_detprod01' + iSeqRow).bind('blur', function() { sc_form_maepro_detprod01_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_maepro_detprod01_onfocus(this, iSeqRow) });
  $('#id_sc_field_block' + iSeqRow).bind('blur', function() { sc_form_maepro_block_onblur(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_maepro_block_onfocus(this, iSeqRow) });
  $('#id_sc_field_uid' + iSeqRow).bind('blur', function() { sc_form_maepro_uid_onblur(this, iSeqRow) })
                                 .bind('focus', function() { sc_form_maepro_uid_onfocus(this, iSeqRow) });
  $('#id_sc_field_ultimoacceso' + iSeqRow).bind('blur', function() { sc_form_maepro_ultimoacceso_onblur(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_maepro_ultimoacceso_onfocus(this, iSeqRow) });
  $('#id_sc_field_ultimoacceso_hora' + iSeqRow).bind('blur', function() { sc_form_maepro_ultimoacceso_onblur(this, iSeqRow) })
                                               .bind('focus', function() { sc_form_maepro_ultimoacceso_onfocus(this, iSeqRow) });
  $('#id_sc_field_idpro' + iSeqRow).bind('blur', function() { sc_form_maepro_idpro_onblur(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_maepro_idpro_onfocus(this, iSeqRow) });
  $('#id_sc_field_catprod01' + iSeqRow).bind('blur', function() { sc_form_maepro_catprod01_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_maepro_catprod01_onfocus(this, iSeqRow) });
  $('#id_sc_field_med401' + iSeqRow).bind('blur', function() { sc_form_maepro_med401_onblur(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_maepro_med401_onfocus(this, iSeqRow) });
  $('#id_sc_field_med501' + iSeqRow).bind('blur', function() { sc_form_maepro_med501_onblur(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_maepro_med501_onfocus(this, iSeqRow) });
  $('#id_sc_field_prodconmed01' + iSeqRow).bind('blur', function() { sc_form_maepro_prodconmed01_onblur(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_maepro_prodconmed01_onfocus(this, iSeqRow) });
  $('#id_sc_field_factorpeso01' + iSeqRow).bind('blur', function() { sc_form_maepro_factorpeso01_onblur(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_maepro_factorpeso01_onfocus(this, iSeqRow) });
  $('#id_sc_field_codbar01' + iSeqRow).bind('blur', function() { sc_form_maepro_codbar01_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_maepro_codbar01_onfocus(this, iSeqRow) });
  $('#id_sc_field_unifrac01' + iSeqRow).bind('blur', function() { sc_form_maepro_unifrac01_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_maepro_unifrac01_onfocus(this, iSeqRow) });
  $('#id_sc_field_calidad01' + iSeqRow).bind('blur', function() { sc_form_maepro_calidad01_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_maepro_calidad01_onfocus(this, iSeqRow) });
  $('#id_sc_field_color01' + iSeqRow).bind('blur', function() { sc_form_maepro_color01_onblur(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_maepro_color01_onfocus(this, iSeqRow) });
  $('#id_sc_field_material01' + iSeqRow).bind('blur', function() { sc_form_maepro_material01_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_maepro_material01_onfocus(this, iSeqRow) });
  $('#id_sc_field_talla01' + iSeqRow).bind('blur', function() { sc_form_maepro_talla01_onblur(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_maepro_talla01_onfocus(this, iSeqRow) });
  $('#id_sc_field_compuesto01' + iSeqRow).bind('blur', function() { sc_form_maepro_compuesto01_onblur(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_maepro_compuesto01_onfocus(this, iSeqRow) });
  $('#id_sc_field_catalt01' + iSeqRow).bind('blur', function() { sc_form_maepro_catalt01_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_maepro_catalt01_onfocus(this, iSeqRow) });
  $('#id_sc_field_precfob01' + iSeqRow).bind('blur', function() { sc_form_maepro_precfob01_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_maepro_precfob01_onfocus(this, iSeqRow) });
  $('#id_sc_field_precio401' + iSeqRow).bind('blur', function() { sc_form_maepro_precio401_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_maepro_precio401_onfocus(this, iSeqRow) });
  $('#id_sc_field_descto401' + iSeqRow).bind('blur', function() { sc_form_maepro_descto401_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_maepro_descto401_onfocus(this, iSeqRow) });
  $('#id_sc_field_porigen01' + iSeqRow).bind('blur', function() { sc_form_maepro_porigen01_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_maepro_porigen01_onfocus(this, iSeqRow) });
  $('#id_sc_field_rin01' + iSeqRow).bind('blur', function() { sc_form_maepro_rin01_onblur(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_maepro_rin01_onfocus(this, iSeqRow) });
  $('#id_sc_field_marca01' + iSeqRow).bind('blur', function() { sc_form_maepro_marca01_onblur(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_maepro_marca01_onfocus(this, iSeqRow) });
  $('#id_sc_field_alto01' + iSeqRow).bind('blur', function() { sc_form_maepro_alto01_onblur(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_maepro_alto01_onfocus(this, iSeqRow) });
  $('#id_sc_field_ancho01' + iSeqRow).bind('blur', function() { sc_form_maepro_ancho01_onblur(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_maepro_ancho01_onfocus(this, iSeqRow) });
  $('#id_sc_field_tipoletra01' + iSeqRow).bind('blur', function() { sc_form_maepro_tipoletra01_onblur(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_maepro_tipoletra01_onfocus(this, iSeqRow) });
  $('#id_sc_field_indcarga01' + iSeqRow).bind('blur', function() { sc_form_maepro_indcarga01_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_maepro_indcarga01_onfocus(this, iSeqRow) });
  $('#id_sc_field_indveloc01' + iSeqRow).bind('blur', function() { sc_form_maepro_indveloc01_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_maepro_indveloc01_onfocus(this, iSeqRow) });
  $('#id_sc_field_pr01' + iSeqRow).bind('blur', function() { sc_form_maepro_pr01_onblur(this, iSeqRow) })
                                  .bind('focus', function() { sc_form_maepro_pr01_onfocus(this, iSeqRow) });
  $('#id_sc_field_dis01' + iSeqRow).bind('blur', function() { sc_form_maepro_dis01_onblur(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_maepro_dis01_onfocus(this, iSeqRow) });
  $('#id_sc_field_tipocons01' + iSeqRow).bind('blur', function() { sc_form_maepro_tipocons01_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_maepro_tipocons01_onfocus(this, iSeqRow) });
  $('#id_sc_field_precateg01' + iSeqRow).bind('blur', function() { sc_form_maepro_precateg01_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_maepro_precateg01_onfocus(this, iSeqRow) });
  $('#id_sc_field_tipprod01' + iSeqRow).bind('blur', function() { sc_form_maepro_tipprod01_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_maepro_tipprod01_onfocus(this, iSeqRow) });
  $('#id_sc_field_conversion01' + iSeqRow).bind('blur', function() { sc_form_maepro_conversion01_onblur(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_maepro_conversion01_onfocus(this, iSeqRow) });
  $('#id_sc_field_valhom01' + iSeqRow).bind('blur', function() { sc_form_maepro_valhom01_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_maepro_valhom01_onfocus(this, iSeqRow) });
  $('#id_sc_field_ctain401' + iSeqRow).bind('blur', function() { sc_form_maepro_ctain401_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_maepro_ctain401_onfocus(this, iSeqRow) });
  $('#id_sc_field_valhom02' + iSeqRow).bind('blur', function() { sc_form_maepro_valhom02_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_maepro_valhom02_onfocus(this, iSeqRow) });
  $('#id_sc_field_valhom03' + iSeqRow).bind('blur', function() { sc_form_maepro_valhom03_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_maepro_valhom03_onfocus(this, iSeqRow) });
  $('#id_sc_field_valhom04' + iSeqRow).bind('blur', function() { sc_form_maepro_valhom04_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_maepro_valhom04_onfocus(this, iSeqRow) });
  $('#id_sc_field_statuspro01' + iSeqRow).bind('blur', function() { sc_form_maepro_statuspro01_onblur(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_maepro_statuspro01_onfocus(this, iSeqRow) });
  $('#id_sc_field_parara01' + iSeqRow).bind('blur', function() { sc_form_maepro_parara01_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_maepro_parara01_onfocus(this, iSeqRow) });
  $('#id_sc_field_prodequiv01' + iSeqRow).bind('blur', function() { sc_form_maepro_prodequiv01_onblur(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_maepro_prodequiv01_onfocus(this, iSeqRow) });
  $('#id_sc_field_regalia01' + iSeqRow).bind('blur', function() { sc_form_maepro_regalia01_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_maepro_regalia01_onfocus(this, iSeqRow) });
  $('#id_sc_field_precio501' + iSeqRow).bind('blur', function() { sc_form_maepro_precio501_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_maepro_precio501_onfocus(this, iSeqRow) });
  $('#id_sc_field_descto501' + iSeqRow).bind('blur', function() { sc_form_maepro_descto501_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_maepro_descto501_onfocus(this, iSeqRow) });
  $('#id_sc_field_precio601' + iSeqRow).bind('blur', function() { sc_form_maepro_precio601_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_maepro_precio601_onfocus(this, iSeqRow) });
  $('#id_sc_field_descto601' + iSeqRow).bind('blur', function() { sc_form_maepro_descto601_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_maepro_descto601_onfocus(this, iSeqRow) });
  $('#id_sc_field_precio701' + iSeqRow).bind('blur', function() { sc_form_maepro_precio701_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_maepro_precio701_onfocus(this, iSeqRow) });
  $('#id_sc_field_descto701' + iSeqRow).bind('blur', function() { sc_form_maepro_descto701_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_maepro_descto701_onfocus(this, iSeqRow) });
  $('#id_sc_field_precio801' + iSeqRow).bind('blur', function() { sc_form_maepro_precio801_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_maepro_precio801_onfocus(this, iSeqRow) });
  $('#id_sc_field_descto801' + iSeqRow).bind('blur', function() { sc_form_maepro_descto801_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_maepro_descto801_onfocus(this, iSeqRow) });
  $('#id_sc_field_precio901' + iSeqRow).bind('blur', function() { sc_form_maepro_precio901_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_maepro_precio901_onfocus(this, iSeqRow) });
  $('#id_sc_field_descto901' + iSeqRow).bind('blur', function() { sc_form_maepro_descto901_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_maepro_descto901_onfocus(this, iSeqRow) });
  $('#id_sc_field_precio1001' + iSeqRow).bind('blur', function() { sc_form_maepro_precio1001_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_maepro_precio1001_onfocus(this, iSeqRow) });
  $('#id_sc_field_descto1001' + iSeqRow).bind('blur', function() { sc_form_maepro_descto1001_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_maepro_descto1001_onfocus(this, iSeqRow) });
  $('#id_sc_field_precio1101' + iSeqRow).bind('blur', function() { sc_form_maepro_precio1101_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_maepro_precio1101_onfocus(this, iSeqRow) });
  $('#id_sc_field_descto1101' + iSeqRow).bind('blur', function() { sc_form_maepro_descto1101_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_maepro_descto1101_onfocus(this, iSeqRow) });
  $('#id_sc_field_precio1201' + iSeqRow).bind('blur', function() { sc_form_maepro_precio1201_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_maepro_precio1201_onfocus(this, iSeqRow) });
  $('#id_sc_field_descto1201' + iSeqRow).bind('blur', function() { sc_form_maepro_descto1201_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_maepro_descto1201_onfocus(this, iSeqRow) });
  $('#id_sc_field_submarca01' + iSeqRow).bind('blur', function() { sc_form_maepro_submarca01_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_maepro_submarca01_onfocus(this, iSeqRow) });
  $('#id_sc_field_modelo01' + iSeqRow).bind('blur', function() { sc_form_maepro_modelo01_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_maepro_modelo01_onfocus(this, iSeqRow) });
  $('#id_sc_field_clasific01' + iSeqRow).bind('blur', function() { sc_form_maepro_clasific01_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_maepro_clasific01_onfocus(this, iSeqRow) });
  $('#id_sc_field_codbarempaque01' + iSeqRow).bind('blur', function() { sc_form_maepro_codbarempaque01_onblur(this, iSeqRow) })
                                             .bind('focus', function() { sc_form_maepro_codbarempaque01_onfocus(this, iSeqRow) });
  $('#id_sc_field_unidadempaque01' + iSeqRow).bind('blur', function() { sc_form_maepro_unidadempaque01_onblur(this, iSeqRow) })
                                             .bind('focus', function() { sc_form_maepro_unidadempaque01_onfocus(this, iSeqRow) });
  $('#id_sc_field_dimensionempaque01' + iSeqRow).bind('blur', function() { sc_form_maepro_dimensionempaque01_onblur(this, iSeqRow) })
                                                .bind('focus', function() { sc_form_maepro_dimensionempaque01_onfocus(this, iSeqRow) });
  $('#id_sc_field_link01' + iSeqRow).bind('blur', function() { sc_form_maepro_link01_onblur(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_maepro_link01_onfocus(this, iSeqRow) });
  $('#id_sc_field_desprod201' + iSeqRow).bind('blur', function() { sc_form_maepro_desprod201_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_maepro_desprod201_onfocus(this, iSeqRow) });
  $('#id_sc_field_desprod301' + iSeqRow).bind('blur', function() { sc_form_maepro_desprod301_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_maepro_desprod301_onfocus(this, iSeqRow) });
  $('#id_sc_field_coefprd01' + iSeqRow).bind('blur', function() { sc_form_maepro_coefprd01_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_maepro_coefprd01_onfocus(this, iSeqRow) });
  $('#id_sc_field_infor01' + iSeqRow).bind('blur', function() { sc_form_maepro_infor01_onblur(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_maepro_infor01_onfocus(this, iSeqRow) });
  $('#id_sc_field_infor03' + iSeqRow).bind('blur', function() { sc_form_maepro_infor03_onblur(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_maepro_infor03_onfocus(this, iSeqRow) });
  $('#id_sc_field_infor05' + iSeqRow).bind('blur', function() { sc_form_maepro_infor05_onblur(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_maepro_infor05_onfocus(this, iSeqRow) });
  $('#id_sc_field_infor07' + iSeqRow).bind('blur', function() { sc_form_maepro_infor07_onblur(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_maepro_infor07_onfocus(this, iSeqRow) });
  $('#id_sc_field_porcenrenta' + iSeqRow).bind('blur', function() { sc_form_maepro_porcenrenta_onblur(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_maepro_porcenrenta_onfocus(this, iSeqRow) });
  $('#id_sc_field_peso' + iSeqRow).bind('blur', function() { sc_form_maepro_peso_onblur(this, iSeqRow) })
                                  .bind('focus', function() { sc_form_maepro_peso_onfocus(this, iSeqRow) });
  $('#id_sc_field_consignado' + iSeqRow).bind('blur', function() { sc_form_maepro_consignado_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_maepro_consignado_onfocus(this, iSeqRow) });
  $('#id_sc_field_cant_consignado' + iSeqRow).bind('blur', function() { sc_form_maepro_cant_consignado_onblur(this, iSeqRow) })
                                             .bind('focus', function() { sc_form_maepro_cant_consignado_onfocus(this, iSeqRow) });
  $('#id_sc_field_baseimpexe01' + iSeqRow).bind('blur', function() { sc_form_maepro_baseimpexe01_onblur(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_maepro_baseimpexe01_onfocus(this, iSeqRow) });
  $('#id_sc_field_peso01' + iSeqRow).bind('blur', function() { sc_form_maepro_peso01_onblur(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_maepro_peso01_onfocus(this, iSeqRow) });
  $('#id_sc_field_prodrel01' + iSeqRow).bind('blur', function() { sc_form_maepro_prodrel01_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_maepro_prodrel01_onfocus(this, iSeqRow) });
  $('#id_sc_field_infor02' + iSeqRow).bind('blur', function() { sc_form_maepro_infor02_onblur(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_maepro_infor02_onfocus(this, iSeqRow) });
  $('#id_sc_field_infor04' + iSeqRow).bind('blur', function() { sc_form_maepro_infor04_onblur(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_maepro_infor04_onfocus(this, iSeqRow) });
  $('#id_sc_field_infor06' + iSeqRow).bind('blur', function() { sc_form_maepro_infor06_onblur(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_maepro_infor06_onfocus(this, iSeqRow) });
  $('#id_sc_field_infor08' + iSeqRow).bind('blur', function() { sc_form_maepro_infor08_onblur(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_maepro_infor08_onfocus(this, iSeqRow) });
  $('#id_sc_field_porcicevta01' + iSeqRow).bind('blur', function() { sc_form_maepro_porcicevta01_onblur(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_maepro_porcicevta01_onfocus(this, iSeqRow) });
  $('#id_sc_field_porcicecpra01' + iSeqRow).bind('blur', function() { sc_form_maepro_porcicecpra01_onblur(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_maepro_porcicecpra01_onfocus(this, iSeqRow) });
  $('#id_sc_field_porcptdaranc01' + iSeqRow).bind('blur', function() { sc_form_maepro_porcptdaranc01_onblur(this, iSeqRow) })
                                            .bind('focus', function() { sc_form_maepro_porcptdaranc01_onfocus(this, iSeqRow) });
  $('#id_sc_field_ordimp01' + iSeqRow).bind('blur', function() { sc_form_maepro_ordimp01_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_maepro_ordimp01_onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_maepro_codprod01_onblur(oThis, iSeqRow) {
  do_ajax_form_maepro_mob_validate_codprod01();
  scCssBlur(oThis);
}

function sc_form_maepro_codprod01_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maepro_desprod01_onblur(oThis, iSeqRow) {
  do_ajax_form_maepro_mob_validate_desprod01();
  scCssBlur(oThis);
}

function sc_form_maepro_desprod01_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maepro_cve101_onblur(oThis, iSeqRow) {
  do_ajax_form_maepro_mob_validate_cve101();
  scCssBlur(oThis);
}

function sc_form_maepro_cve101_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maepro_cve201_onblur(oThis, iSeqRow) {
  do_ajax_form_maepro_mob_validate_cve201();
  scCssBlur(oThis);
}

function sc_form_maepro_cve201_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maepro_unidmed01_onblur(oThis, iSeqRow) {
  do_ajax_form_maepro_mob_validate_unidmed01();
  scCssBlur(oThis);
}

function sc_form_maepro_unidmed01_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maepro_cantmin01_onblur(oThis, iSeqRow) {
  do_ajax_form_maepro_mob_validate_cantmin01();
  scCssBlur(oThis);
}

function sc_form_maepro_cantmin01_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maepro_cantact01_onblur(oThis, iSeqRow) {
  do_ajax_form_maepro_mob_validate_cantact01();
  scCssBlur(oThis);
}

function sc_form_maepro_cantact01_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maepro_valact01_onblur(oThis, iSeqRow) {
  do_ajax_form_maepro_mob_validate_valact01();
  scCssBlur(oThis);
}

function sc_form_maepro_valact01_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maepro_exipromo01_onblur(oThis, iSeqRow) {
  do_ajax_form_maepro_mob_validate_exipromo01();
  scCssBlur(oThis);
}

function sc_form_maepro_exipromo01_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maepro_precuni01_onblur(oThis, iSeqRow) {
  do_ajax_form_maepro_mob_validate_precuni01();
  scCssBlur(oThis);
}

function sc_form_maepro_precuni01_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maepro_pedpend01_onblur(oThis, iSeqRow) {
  do_ajax_form_maepro_mob_validate_pedpend01();
  scCssBlur(oThis);
}

function sc_form_maepro_pedpend01_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maepro_orden01_onblur(oThis, iSeqRow) {
  do_ajax_form_maepro_mob_validate_orden01();
  scCssBlur(oThis);
}

function sc_form_maepro_orden01_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maepro_refer01_onblur(oThis, iSeqRow) {
  do_ajax_form_maepro_mob_validate_refer01();
  scCssBlur(oThis);
}

function sc_form_maepro_refer01_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maepro_canentm01_onblur(oThis, iSeqRow) {
  do_ajax_form_maepro_mob_validate_canentm01();
  scCssBlur(oThis);
}

function sc_form_maepro_canentm01_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maepro_valentm01_onblur(oThis, iSeqRow) {
  do_ajax_form_maepro_mob_validate_valentm01();
  scCssBlur(oThis);
}

function sc_form_maepro_valentm01_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maepro_cansalm01_onblur(oThis, iSeqRow) {
  do_ajax_form_maepro_mob_validate_cansalm01();
  scCssBlur(oThis);
}

function sc_form_maepro_cansalm01_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maepro_valsalm01_onblur(oThis, iSeqRow) {
  do_ajax_form_maepro_mob_validate_valsalm01();
  scCssBlur(oThis);
}

function sc_form_maepro_valsalm01_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maepro_canenta01_onblur(oThis, iSeqRow) {
  do_ajax_form_maepro_mob_validate_canenta01();
  scCssBlur(oThis);
}

function sc_form_maepro_canenta01_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maepro_valenta01_onblur(oThis, iSeqRow) {
  do_ajax_form_maepro_mob_validate_valenta01();
  scCssBlur(oThis);
}

function sc_form_maepro_valenta01_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maepro_cansala01_onblur(oThis, iSeqRow) {
  do_ajax_form_maepro_mob_validate_cansala01();
  scCssBlur(oThis);
}

function sc_form_maepro_cansala01_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maepro_valsala01_onblur(oThis, iSeqRow) {
  do_ajax_form_maepro_mob_validate_valsala01();
  scCssBlur(oThis);
}

function sc_form_maepro_valsala01_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maepro_fecape01_onblur(oThis, iSeqRow) {
  do_ajax_form_maepro_mob_validate_fecape01();
  scCssBlur(oThis);
}

function sc_form_maepro_fecape01_onblur(oThis, iSeqRow) {
  do_ajax_form_maepro_mob_validate_fecape01();
  scCssBlur(oThis);
}

function sc_form_maepro_fecape01_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maepro_fecape01_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maepro_fecult01_onblur(oThis, iSeqRow) {
  do_ajax_form_maepro_mob_validate_fecult01();
  scCssBlur(oThis);
}

function sc_form_maepro_fecult01_onblur(oThis, iSeqRow) {
  do_ajax_form_maepro_mob_validate_fecult01();
  scCssBlur(oThis);
}

function sc_form_maepro_fecult01_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maepro_fecult01_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maepro_fecvta01_onblur(oThis, iSeqRow) {
  do_ajax_form_maepro_mob_validate_fecvta01();
  scCssBlur(oThis);
}

function sc_form_maepro_fecvta01_onblur(oThis, iSeqRow) {
  do_ajax_form_maepro_mob_validate_fecvta01();
  scCssBlur(oThis);
}

function sc_form_maepro_fecvta01_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maepro_fecvta01_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maepro_ubic01_onblur(oThis, iSeqRow) {
  do_ajax_form_maepro_mob_validate_ubic01();
  scCssBlur(oThis);
}

function sc_form_maepro_ubic01_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maepro_precvta01_onblur(oThis, iSeqRow) {
  do_ajax_form_maepro_mob_validate_precvta01();
  scCssBlur(oThis);
}

function sc_form_maepro_precvta01_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maepro_descto101_onblur(oThis, iSeqRow) {
  do_ajax_form_maepro_mob_validate_descto101();
  scCssBlur(oThis);
}

function sc_form_maepro_descto101_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maepro_precio201_onblur(oThis, iSeqRow) {
  do_ajax_form_maepro_mob_validate_precio201();
  scCssBlur(oThis);
}

function sc_form_maepro_precio201_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maepro_descto201_onblur(oThis, iSeqRow) {
  do_ajax_form_maepro_mob_validate_descto201();
  scCssBlur(oThis);
}

function sc_form_maepro_descto201_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maepro_precio301_onblur(oThis, iSeqRow) {
  do_ajax_form_maepro_mob_validate_precio301();
  scCssBlur(oThis);
}

function sc_form_maepro_precio301_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maepro_descto301_onblur(oThis, iSeqRow) {
  do_ajax_form_maepro_mob_validate_descto301();
  scCssBlur(oThis);
}

function sc_form_maepro_descto301_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maepro_canvtam01_onblur(oThis, iSeqRow) {
  do_ajax_form_maepro_mob_validate_canvtam01();
  scCssBlur(oThis);
}

function sc_form_maepro_canvtam01_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maepro_valvtam01_onblur(oThis, iSeqRow) {
  do_ajax_form_maepro_mob_validate_valvtam01();
  scCssBlur(oThis);
}

function sc_form_maepro_valvtam01_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maepro_cosvtam01_onblur(oThis, iSeqRow) {
  do_ajax_form_maepro_mob_validate_cosvtam01();
  scCssBlur(oThis);
}

function sc_form_maepro_cosvtam01_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maepro_canvtaa01_onblur(oThis, iSeqRow) {
  do_ajax_form_maepro_mob_validate_canvtaa01();
  scCssBlur(oThis);
}

function sc_form_maepro_canvtaa01_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maepro_valvtaa01_onblur(oThis, iSeqRow) {
  do_ajax_form_maepro_mob_validate_valvtaa01();
  scCssBlur(oThis);
}

function sc_form_maepro_valvtaa01_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maepro_cosvtaa01_onblur(oThis, iSeqRow) {
  do_ajax_form_maepro_mob_validate_cosvtaa01();
  scCssBlur(oThis);
}

function sc_form_maepro_cosvtaa01_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maepro_prod1alt01_onblur(oThis, iSeqRow) {
  do_ajax_form_maepro_mob_validate_prod1alt01();
  scCssBlur(oThis);
}

function sc_form_maepro_prod1alt01_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maepro_prod2alt01_onblur(oThis, iSeqRow) {
  do_ajax_form_maepro_mob_validate_prod2alt01();
  scCssBlur(oThis);
}

function sc_form_maepro_prod2alt01_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maepro_proved101_onblur(oThis, iSeqRow) {
  do_ajax_form_maepro_mob_validate_proved101();
  scCssBlur(oThis);
}

function sc_form_maepro_proved101_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maepro_proved201_onblur(oThis, iSeqRow) {
  do_ajax_form_maepro_mob_validate_proved201();
  scCssBlur(oThis);
}

function sc_form_maepro_proved201_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maepro_med101_onblur(oThis, iSeqRow) {
  do_ajax_form_maepro_mob_validate_med101();
  scCssBlur(oThis);
}

function sc_form_maepro_med101_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maepro_med201_onblur(oThis, iSeqRow) {
  do_ajax_form_maepro_mob_validate_med201();
  scCssBlur(oThis);
}

function sc_form_maepro_med201_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maepro_med301_onblur(oThis, iSeqRow) {
  do_ajax_form_maepro_mob_validate_med301();
  scCssBlur(oThis);
}

function sc_form_maepro_med301_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maepro_factor01_onblur(oThis, iSeqRow) {
  do_ajax_form_maepro_mob_validate_factor01();
  scCssBlur(oThis);
}

function sc_form_maepro_factor01_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maepro_cvserie01_onblur(oThis, iSeqRow) {
  do_ajax_form_maepro_mob_validate_cvserie01();
  scCssBlur(oThis);
}

function sc_form_maepro_cvserie01_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maepro_ctain101_onblur(oThis, iSeqRow) {
  do_ajax_form_maepro_mob_validate_ctain101();
  scCssBlur(oThis);
}

function sc_form_maepro_ctain101_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maepro_ctain201_onblur(oThis, iSeqRow) {
  do_ajax_form_maepro_mob_validate_ctain201();
  scCssBlur(oThis);
}

function sc_form_maepro_ctain201_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maepro_ctain301_onblur(oThis, iSeqRow) {
  do_ajax_form_maepro_mob_validate_ctain301();
  scCssBlur(oThis);
}

function sc_form_maepro_ctain301_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maepro_porciva01_onblur(oThis, iSeqRow) {
  do_ajax_form_maepro_mob_validate_porciva01();
  scCssBlur(oThis);
}

function sc_form_maepro_porciva01_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maepro_prodsinsdo01_onblur(oThis, iSeqRow) {
  do_ajax_form_maepro_mob_validate_prodsinsdo01();
  scCssBlur(oThis);
}

function sc_form_maepro_prodsinsdo01_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maepro_sinprec01_onblur(oThis, iSeqRow) {
  do_ajax_form_maepro_mob_validate_sinprec01();
  scCssBlur(oThis);
}

function sc_form_maepro_sinprec01_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maepro_fotoprod01_onblur(oThis, iSeqRow) {
  do_ajax_form_maepro_mob_validate_fotoprod01();
  scCssBlur(oThis);
}

function sc_form_maepro_fotoprod01_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maepro_detprod01_onblur(oThis, iSeqRow) {
  do_ajax_form_maepro_mob_validate_detprod01();
  scCssBlur(oThis);
}

function sc_form_maepro_detprod01_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maepro_block_onblur(oThis, iSeqRow) {
  do_ajax_form_maepro_mob_validate_block();
  scCssBlur(oThis);
}

function sc_form_maepro_block_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maepro_uid_onblur(oThis, iSeqRow) {
  do_ajax_form_maepro_mob_validate_uid();
  scCssBlur(oThis);
}

function sc_form_maepro_uid_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maepro_ultimoacceso_onblur(oThis, iSeqRow) {
  do_ajax_form_maepro_mob_validate_ultimoacceso();
  scCssBlur(oThis);
}

function sc_form_maepro_ultimoacceso_onblur(oThis, iSeqRow) {
  do_ajax_form_maepro_mob_validate_ultimoacceso();
  scCssBlur(oThis);
}

function sc_form_maepro_ultimoacceso_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maepro_ultimoacceso_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maepro_idpro_onblur(oThis, iSeqRow) {
  do_ajax_form_maepro_mob_validate_idpro();
  scCssBlur(oThis);
}

function sc_form_maepro_idpro_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maepro_catprod01_onblur(oThis, iSeqRow) {
  do_ajax_form_maepro_mob_validate_catprod01();
  scCssBlur(oThis);
}

function sc_form_maepro_catprod01_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maepro_med401_onblur(oThis, iSeqRow) {
  do_ajax_form_maepro_mob_validate_med401();
  scCssBlur(oThis);
}

function sc_form_maepro_med401_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maepro_med501_onblur(oThis, iSeqRow) {
  do_ajax_form_maepro_mob_validate_med501();
  scCssBlur(oThis);
}

function sc_form_maepro_med501_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maepro_prodconmed01_onblur(oThis, iSeqRow) {
  do_ajax_form_maepro_mob_validate_prodconmed01();
  scCssBlur(oThis);
}

function sc_form_maepro_prodconmed01_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maepro_factorpeso01_onblur(oThis, iSeqRow) {
  do_ajax_form_maepro_mob_validate_factorpeso01();
  scCssBlur(oThis);
}

function sc_form_maepro_factorpeso01_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maepro_codbar01_onblur(oThis, iSeqRow) {
  do_ajax_form_maepro_mob_validate_codbar01();
  scCssBlur(oThis);
}

function sc_form_maepro_codbar01_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maepro_unifrac01_onblur(oThis, iSeqRow) {
  do_ajax_form_maepro_mob_validate_unifrac01();
  scCssBlur(oThis);
}

function sc_form_maepro_unifrac01_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maepro_calidad01_onblur(oThis, iSeqRow) {
  do_ajax_form_maepro_mob_validate_calidad01();
  scCssBlur(oThis);
}

function sc_form_maepro_calidad01_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maepro_color01_onblur(oThis, iSeqRow) {
  do_ajax_form_maepro_mob_validate_color01();
  scCssBlur(oThis);
}

function sc_form_maepro_color01_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maepro_material01_onblur(oThis, iSeqRow) {
  do_ajax_form_maepro_mob_validate_material01();
  scCssBlur(oThis);
}

function sc_form_maepro_material01_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maepro_talla01_onblur(oThis, iSeqRow) {
  do_ajax_form_maepro_mob_validate_talla01();
  scCssBlur(oThis);
}

function sc_form_maepro_talla01_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maepro_compuesto01_onblur(oThis, iSeqRow) {
  do_ajax_form_maepro_mob_validate_compuesto01();
  scCssBlur(oThis);
}

function sc_form_maepro_compuesto01_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maepro_catalt01_onblur(oThis, iSeqRow) {
  do_ajax_form_maepro_mob_validate_catalt01();
  scCssBlur(oThis);
}

function sc_form_maepro_catalt01_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maepro_precfob01_onblur(oThis, iSeqRow) {
  do_ajax_form_maepro_mob_validate_precfob01();
  scCssBlur(oThis);
}

function sc_form_maepro_precfob01_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maepro_precio401_onblur(oThis, iSeqRow) {
  do_ajax_form_maepro_mob_validate_precio401();
  scCssBlur(oThis);
}

function sc_form_maepro_precio401_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maepro_descto401_onblur(oThis, iSeqRow) {
  do_ajax_form_maepro_mob_validate_descto401();
  scCssBlur(oThis);
}

function sc_form_maepro_descto401_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maepro_porigen01_onblur(oThis, iSeqRow) {
  do_ajax_form_maepro_mob_validate_porigen01();
  scCssBlur(oThis);
}

function sc_form_maepro_porigen01_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maepro_rin01_onblur(oThis, iSeqRow) {
  do_ajax_form_maepro_mob_validate_rin01();
  scCssBlur(oThis);
}

function sc_form_maepro_rin01_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maepro_marca01_onblur(oThis, iSeqRow) {
  do_ajax_form_maepro_mob_validate_marca01();
  scCssBlur(oThis);
}

function sc_form_maepro_marca01_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maepro_alto01_onblur(oThis, iSeqRow) {
  do_ajax_form_maepro_mob_validate_alto01();
  scCssBlur(oThis);
}

function sc_form_maepro_alto01_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maepro_ancho01_onblur(oThis, iSeqRow) {
  do_ajax_form_maepro_mob_validate_ancho01();
  scCssBlur(oThis);
}

function sc_form_maepro_ancho01_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maepro_tipoletra01_onblur(oThis, iSeqRow) {
  do_ajax_form_maepro_mob_validate_tipoletra01();
  scCssBlur(oThis);
}

function sc_form_maepro_tipoletra01_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maepro_indcarga01_onblur(oThis, iSeqRow) {
  do_ajax_form_maepro_mob_validate_indcarga01();
  scCssBlur(oThis);
}

function sc_form_maepro_indcarga01_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maepro_indveloc01_onblur(oThis, iSeqRow) {
  do_ajax_form_maepro_mob_validate_indveloc01();
  scCssBlur(oThis);
}

function sc_form_maepro_indveloc01_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maepro_pr01_onblur(oThis, iSeqRow) {
  do_ajax_form_maepro_mob_validate_pr01();
  scCssBlur(oThis);
}

function sc_form_maepro_pr01_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maepro_dis01_onblur(oThis, iSeqRow) {
  do_ajax_form_maepro_mob_validate_dis01();
  scCssBlur(oThis);
}

function sc_form_maepro_dis01_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maepro_tipocons01_onblur(oThis, iSeqRow) {
  do_ajax_form_maepro_mob_validate_tipocons01();
  scCssBlur(oThis);
}

function sc_form_maepro_tipocons01_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maepro_precateg01_onblur(oThis, iSeqRow) {
  do_ajax_form_maepro_mob_validate_precateg01();
  scCssBlur(oThis);
}

function sc_form_maepro_precateg01_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maepro_tipprod01_onblur(oThis, iSeqRow) {
  do_ajax_form_maepro_mob_validate_tipprod01();
  scCssBlur(oThis);
}

function sc_form_maepro_tipprod01_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maepro_conversion01_onblur(oThis, iSeqRow) {
  do_ajax_form_maepro_mob_validate_conversion01();
  scCssBlur(oThis);
}

function sc_form_maepro_conversion01_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maepro_valhom01_onblur(oThis, iSeqRow) {
  do_ajax_form_maepro_mob_validate_valhom01();
  scCssBlur(oThis);
}

function sc_form_maepro_valhom01_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maepro_ctain401_onblur(oThis, iSeqRow) {
  do_ajax_form_maepro_mob_validate_ctain401();
  scCssBlur(oThis);
}

function sc_form_maepro_ctain401_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maepro_valhom02_onblur(oThis, iSeqRow) {
  do_ajax_form_maepro_mob_validate_valhom02();
  scCssBlur(oThis);
}

function sc_form_maepro_valhom02_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maepro_valhom03_onblur(oThis, iSeqRow) {
  do_ajax_form_maepro_mob_validate_valhom03();
  scCssBlur(oThis);
}

function sc_form_maepro_valhom03_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maepro_valhom04_onblur(oThis, iSeqRow) {
  do_ajax_form_maepro_mob_validate_valhom04();
  scCssBlur(oThis);
}

function sc_form_maepro_valhom04_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maepro_statuspro01_onblur(oThis, iSeqRow) {
  do_ajax_form_maepro_mob_validate_statuspro01();
  scCssBlur(oThis);
}

function sc_form_maepro_statuspro01_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maepro_parara01_onblur(oThis, iSeqRow) {
  do_ajax_form_maepro_mob_validate_parara01();
  scCssBlur(oThis);
}

function sc_form_maepro_parara01_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maepro_prodequiv01_onblur(oThis, iSeqRow) {
  do_ajax_form_maepro_mob_validate_prodequiv01();
  scCssBlur(oThis);
}

function sc_form_maepro_prodequiv01_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maepro_regalia01_onblur(oThis, iSeqRow) {
  do_ajax_form_maepro_mob_validate_regalia01();
  scCssBlur(oThis);
}

function sc_form_maepro_regalia01_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maepro_precio501_onblur(oThis, iSeqRow) {
  do_ajax_form_maepro_mob_validate_precio501();
  scCssBlur(oThis);
}

function sc_form_maepro_precio501_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maepro_descto501_onblur(oThis, iSeqRow) {
  do_ajax_form_maepro_mob_validate_descto501();
  scCssBlur(oThis);
}

function sc_form_maepro_descto501_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maepro_precio601_onblur(oThis, iSeqRow) {
  do_ajax_form_maepro_mob_validate_precio601();
  scCssBlur(oThis);
}

function sc_form_maepro_precio601_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maepro_descto601_onblur(oThis, iSeqRow) {
  do_ajax_form_maepro_mob_validate_descto601();
  scCssBlur(oThis);
}

function sc_form_maepro_descto601_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maepro_precio701_onblur(oThis, iSeqRow) {
  do_ajax_form_maepro_mob_validate_precio701();
  scCssBlur(oThis);
}

function sc_form_maepro_precio701_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maepro_descto701_onblur(oThis, iSeqRow) {
  do_ajax_form_maepro_mob_validate_descto701();
  scCssBlur(oThis);
}

function sc_form_maepro_descto701_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maepro_precio801_onblur(oThis, iSeqRow) {
  do_ajax_form_maepro_mob_validate_precio801();
  scCssBlur(oThis);
}

function sc_form_maepro_precio801_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maepro_descto801_onblur(oThis, iSeqRow) {
  do_ajax_form_maepro_mob_validate_descto801();
  scCssBlur(oThis);
}

function sc_form_maepro_descto801_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maepro_precio901_onblur(oThis, iSeqRow) {
  do_ajax_form_maepro_mob_validate_precio901();
  scCssBlur(oThis);
}

function sc_form_maepro_precio901_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maepro_descto901_onblur(oThis, iSeqRow) {
  do_ajax_form_maepro_mob_validate_descto901();
  scCssBlur(oThis);
}

function sc_form_maepro_descto901_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maepro_precio1001_onblur(oThis, iSeqRow) {
  do_ajax_form_maepro_mob_validate_precio1001();
  scCssBlur(oThis);
}

function sc_form_maepro_precio1001_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maepro_descto1001_onblur(oThis, iSeqRow) {
  do_ajax_form_maepro_mob_validate_descto1001();
  scCssBlur(oThis);
}

function sc_form_maepro_descto1001_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maepro_precio1101_onblur(oThis, iSeqRow) {
  do_ajax_form_maepro_mob_validate_precio1101();
  scCssBlur(oThis);
}

function sc_form_maepro_precio1101_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maepro_descto1101_onblur(oThis, iSeqRow) {
  do_ajax_form_maepro_mob_validate_descto1101();
  scCssBlur(oThis);
}

function sc_form_maepro_descto1101_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maepro_precio1201_onblur(oThis, iSeqRow) {
  do_ajax_form_maepro_mob_validate_precio1201();
  scCssBlur(oThis);
}

function sc_form_maepro_precio1201_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maepro_descto1201_onblur(oThis, iSeqRow) {
  do_ajax_form_maepro_mob_validate_descto1201();
  scCssBlur(oThis);
}

function sc_form_maepro_descto1201_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maepro_submarca01_onblur(oThis, iSeqRow) {
  do_ajax_form_maepro_mob_validate_submarca01();
  scCssBlur(oThis);
}

function sc_form_maepro_submarca01_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maepro_modelo01_onblur(oThis, iSeqRow) {
  do_ajax_form_maepro_mob_validate_modelo01();
  scCssBlur(oThis);
}

function sc_form_maepro_modelo01_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maepro_clasific01_onblur(oThis, iSeqRow) {
  do_ajax_form_maepro_mob_validate_clasific01();
  scCssBlur(oThis);
}

function sc_form_maepro_clasific01_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maepro_codbarempaque01_onblur(oThis, iSeqRow) {
  do_ajax_form_maepro_mob_validate_codbarempaque01();
  scCssBlur(oThis);
}

function sc_form_maepro_codbarempaque01_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maepro_unidadempaque01_onblur(oThis, iSeqRow) {
  do_ajax_form_maepro_mob_validate_unidadempaque01();
  scCssBlur(oThis);
}

function sc_form_maepro_unidadempaque01_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maepro_dimensionempaque01_onblur(oThis, iSeqRow) {
  do_ajax_form_maepro_mob_validate_dimensionempaque01();
  scCssBlur(oThis);
}

function sc_form_maepro_dimensionempaque01_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maepro_link01_onblur(oThis, iSeqRow) {
  do_ajax_form_maepro_mob_validate_link01();
  scCssBlur(oThis);
}

function sc_form_maepro_link01_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maepro_desprod201_onblur(oThis, iSeqRow) {
  do_ajax_form_maepro_mob_validate_desprod201();
  scCssBlur(oThis);
}

function sc_form_maepro_desprod201_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maepro_desprod301_onblur(oThis, iSeqRow) {
  do_ajax_form_maepro_mob_validate_desprod301();
  scCssBlur(oThis);
}

function sc_form_maepro_desprod301_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maepro_coefprd01_onblur(oThis, iSeqRow) {
  do_ajax_form_maepro_mob_validate_coefprd01();
  scCssBlur(oThis);
}

function sc_form_maepro_coefprd01_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maepro_infor01_onblur(oThis, iSeqRow) {
  do_ajax_form_maepro_mob_validate_infor01();
  scCssBlur(oThis);
}

function sc_form_maepro_infor01_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maepro_infor03_onblur(oThis, iSeqRow) {
  do_ajax_form_maepro_mob_validate_infor03();
  scCssBlur(oThis);
}

function sc_form_maepro_infor03_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maepro_infor05_onblur(oThis, iSeqRow) {
  do_ajax_form_maepro_mob_validate_infor05();
  scCssBlur(oThis);
}

function sc_form_maepro_infor05_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maepro_infor07_onblur(oThis, iSeqRow) {
  do_ajax_form_maepro_mob_validate_infor07();
  scCssBlur(oThis);
}

function sc_form_maepro_infor07_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maepro_porcenrenta_onblur(oThis, iSeqRow) {
  do_ajax_form_maepro_mob_validate_porcenrenta();
  scCssBlur(oThis);
}

function sc_form_maepro_porcenrenta_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maepro_peso_onblur(oThis, iSeqRow) {
  do_ajax_form_maepro_mob_validate_peso();
  scCssBlur(oThis);
}

function sc_form_maepro_peso_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maepro_consignado_onblur(oThis, iSeqRow) {
  do_ajax_form_maepro_mob_validate_consignado();
  scCssBlur(oThis);
}

function sc_form_maepro_consignado_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maepro_cant_consignado_onblur(oThis, iSeqRow) {
  do_ajax_form_maepro_mob_validate_cant_consignado();
  scCssBlur(oThis);
}

function sc_form_maepro_cant_consignado_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maepro_baseimpexe01_onblur(oThis, iSeqRow) {
  do_ajax_form_maepro_mob_validate_baseimpexe01();
  scCssBlur(oThis);
}

function sc_form_maepro_baseimpexe01_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maepro_peso01_onblur(oThis, iSeqRow) {
  do_ajax_form_maepro_mob_validate_peso01();
  scCssBlur(oThis);
}

function sc_form_maepro_peso01_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maepro_prodrel01_onblur(oThis, iSeqRow) {
  do_ajax_form_maepro_mob_validate_prodrel01();
  scCssBlur(oThis);
}

function sc_form_maepro_prodrel01_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maepro_infor02_onblur(oThis, iSeqRow) {
  do_ajax_form_maepro_mob_validate_infor02();
  scCssBlur(oThis);
}

function sc_form_maepro_infor02_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maepro_infor04_onblur(oThis, iSeqRow) {
  do_ajax_form_maepro_mob_validate_infor04();
  scCssBlur(oThis);
}

function sc_form_maepro_infor04_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maepro_infor06_onblur(oThis, iSeqRow) {
  do_ajax_form_maepro_mob_validate_infor06();
  scCssBlur(oThis);
}

function sc_form_maepro_infor06_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maepro_infor08_onblur(oThis, iSeqRow) {
  do_ajax_form_maepro_mob_validate_infor08();
  scCssBlur(oThis);
}

function sc_form_maepro_infor08_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maepro_porcicevta01_onblur(oThis, iSeqRow) {
  do_ajax_form_maepro_mob_validate_porcicevta01();
  scCssBlur(oThis);
}

function sc_form_maepro_porcicevta01_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maepro_porcicecpra01_onblur(oThis, iSeqRow) {
  do_ajax_form_maepro_mob_validate_porcicecpra01();
  scCssBlur(oThis);
}

function sc_form_maepro_porcicecpra01_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maepro_porcptdaranc01_onblur(oThis, iSeqRow) {
  do_ajax_form_maepro_mob_validate_porcptdaranc01();
  scCssBlur(oThis);
}

function sc_form_maepro_porcptdaranc01_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maepro_ordimp01_onblur(oThis, iSeqRow) {
  do_ajax_form_maepro_mob_validate_ordimp01();
  scCssBlur(oThis);
}

function sc_form_maepro_ordimp01_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function displayChange_block(block, status) {
	if ("0" == block) {
		displayChange_block_0(status);
	}
}

function displayChange_block_0(status) {
	displayChange_field("codprod01", "", status);
	displayChange_field("desprod01", "", status);
	displayChange_field("cve101", "", status);
	displayChange_field("cve201", "", status);
	displayChange_field("unidmed01", "", status);
	displayChange_field("cantmin01", "", status);
	displayChange_field("cantact01", "", status);
	displayChange_field("valact01", "", status);
	displayChange_field("exipromo01", "", status);
	displayChange_field("precuni01", "", status);
	displayChange_field("pedpend01", "", status);
	displayChange_field("orden01", "", status);
	displayChange_field("refer01", "", status);
	displayChange_field("canentm01", "", status);
	displayChange_field("valentm01", "", status);
	displayChange_field("cansalm01", "", status);
	displayChange_field("valsalm01", "", status);
	displayChange_field("canenta01", "", status);
	displayChange_field("valenta01", "", status);
	displayChange_field("cansala01", "", status);
	displayChange_field("valsala01", "", status);
	displayChange_field("fecape01", "", status);
	displayChange_field("fecult01", "", status);
	displayChange_field("fecvta01", "", status);
	displayChange_field("ubic01", "", status);
	displayChange_field("precvta01", "", status);
	displayChange_field("descto101", "", status);
	displayChange_field("precio201", "", status);
	displayChange_field("descto201", "", status);
	displayChange_field("precio301", "", status);
	displayChange_field("descto301", "", status);
	displayChange_field("canvtam01", "", status);
	displayChange_field("valvtam01", "", status);
	displayChange_field("cosvtam01", "", status);
	displayChange_field("canvtaa01", "", status);
	displayChange_field("valvtaa01", "", status);
	displayChange_field("cosvtaa01", "", status);
	displayChange_field("prod1alt01", "", status);
	displayChange_field("prod2alt01", "", status);
	displayChange_field("proved101", "", status);
	displayChange_field("proved201", "", status);
	displayChange_field("med101", "", status);
	displayChange_field("med201", "", status);
	displayChange_field("med301", "", status);
	displayChange_field("factor01", "", status);
	displayChange_field("cvserie01", "", status);
	displayChange_field("ctain101", "", status);
	displayChange_field("ctain201", "", status);
	displayChange_field("ctain301", "", status);
	displayChange_field("porciva01", "", status);
	displayChange_field("prodsinsdo01", "", status);
	displayChange_field("sinprec01", "", status);
	displayChange_field("fotoprod01", "", status);
	displayChange_field("detprod01", "", status);
	displayChange_field("block", "", status);
	displayChange_field("uid", "", status);
	displayChange_field("ultimoacceso", "", status);
	displayChange_field("idpro", "", status);
	displayChange_field("catprod01", "", status);
	displayChange_field("med401", "", status);
	displayChange_field("med501", "", status);
	displayChange_field("prodconmed01", "", status);
	displayChange_field("factorpeso01", "", status);
	displayChange_field("codbar01", "", status);
	displayChange_field("unifrac01", "", status);
	displayChange_field("calidad01", "", status);
	displayChange_field("color01", "", status);
	displayChange_field("material01", "", status);
	displayChange_field("talla01", "", status);
	displayChange_field("compuesto01", "", status);
	displayChange_field("catalt01", "", status);
	displayChange_field("precfob01", "", status);
	displayChange_field("precio401", "", status);
	displayChange_field("descto401", "", status);
	displayChange_field("porigen01", "", status);
	displayChange_field("rin01", "", status);
	displayChange_field("marca01", "", status);
	displayChange_field("alto01", "", status);
	displayChange_field("ancho01", "", status);
	displayChange_field("tipoletra01", "", status);
	displayChange_field("indcarga01", "", status);
	displayChange_field("indveloc01", "", status);
	displayChange_field("pr01", "", status);
	displayChange_field("dis01", "", status);
	displayChange_field("tipocons01", "", status);
	displayChange_field("precateg01", "", status);
	displayChange_field("tipprod01", "", status);
	displayChange_field("conversion01", "", status);
	displayChange_field("valhom01", "", status);
	displayChange_field("ctain401", "", status);
	displayChange_field("valhom02", "", status);
	displayChange_field("valhom03", "", status);
	displayChange_field("valhom04", "", status);
	displayChange_field("statuspro01", "", status);
	displayChange_field("parara01", "", status);
	displayChange_field("prodequiv01", "", status);
	displayChange_field("regalia01", "", status);
	displayChange_field("precio501", "", status);
	displayChange_field("descto501", "", status);
	displayChange_field("precio601", "", status);
	displayChange_field("descto601", "", status);
	displayChange_field("precio701", "", status);
	displayChange_field("descto701", "", status);
	displayChange_field("precio801", "", status);
	displayChange_field("descto801", "", status);
	displayChange_field("precio901", "", status);
	displayChange_field("descto901", "", status);
	displayChange_field("precio1001", "", status);
	displayChange_field("descto1001", "", status);
	displayChange_field("precio1101", "", status);
	displayChange_field("descto1101", "", status);
	displayChange_field("precio1201", "", status);
	displayChange_field("descto1201", "", status);
	displayChange_field("submarca01", "", status);
	displayChange_field("modelo01", "", status);
	displayChange_field("clasific01", "", status);
	displayChange_field("codbarempaque01", "", status);
	displayChange_field("unidadempaque01", "", status);
	displayChange_field("dimensionempaque01", "", status);
	displayChange_field("link01", "", status);
	displayChange_field("desprod201", "", status);
	displayChange_field("desprod301", "", status);
	displayChange_field("coefprd01", "", status);
	displayChange_field("infor01", "", status);
	displayChange_field("infor03", "", status);
	displayChange_field("infor05", "", status);
	displayChange_field("infor07", "", status);
	displayChange_field("porcenrenta", "", status);
	displayChange_field("peso", "", status);
	displayChange_field("consignado", "", status);
	displayChange_field("cant_consignado", "", status);
	displayChange_field("baseimpexe01", "", status);
	displayChange_field("peso01", "", status);
	displayChange_field("prodrel01", "", status);
	displayChange_field("infor02", "", status);
	displayChange_field("infor04", "", status);
	displayChange_field("infor06", "", status);
	displayChange_field("infor08", "", status);
	displayChange_field("porcicevta01", "", status);
	displayChange_field("porcicecpra01", "", status);
	displayChange_field("porcptdaranc01", "", status);
	displayChange_field("ordimp01", "", status);
}

function displayChange_row(row, status) {
	displayChange_field_codprod01(row, status);
	displayChange_field_desprod01(row, status);
	displayChange_field_cve101(row, status);
	displayChange_field_cve201(row, status);
	displayChange_field_unidmed01(row, status);
	displayChange_field_cantmin01(row, status);
	displayChange_field_cantact01(row, status);
	displayChange_field_valact01(row, status);
	displayChange_field_exipromo01(row, status);
	displayChange_field_precuni01(row, status);
	displayChange_field_pedpend01(row, status);
	displayChange_field_orden01(row, status);
	displayChange_field_refer01(row, status);
	displayChange_field_canentm01(row, status);
	displayChange_field_valentm01(row, status);
	displayChange_field_cansalm01(row, status);
	displayChange_field_valsalm01(row, status);
	displayChange_field_canenta01(row, status);
	displayChange_field_valenta01(row, status);
	displayChange_field_cansala01(row, status);
	displayChange_field_valsala01(row, status);
	displayChange_field_fecape01(row, status);
	displayChange_field_fecult01(row, status);
	displayChange_field_fecvta01(row, status);
	displayChange_field_ubic01(row, status);
	displayChange_field_precvta01(row, status);
	displayChange_field_descto101(row, status);
	displayChange_field_precio201(row, status);
	displayChange_field_descto201(row, status);
	displayChange_field_precio301(row, status);
	displayChange_field_descto301(row, status);
	displayChange_field_canvtam01(row, status);
	displayChange_field_valvtam01(row, status);
	displayChange_field_cosvtam01(row, status);
	displayChange_field_canvtaa01(row, status);
	displayChange_field_valvtaa01(row, status);
	displayChange_field_cosvtaa01(row, status);
	displayChange_field_prod1alt01(row, status);
	displayChange_field_prod2alt01(row, status);
	displayChange_field_proved101(row, status);
	displayChange_field_proved201(row, status);
	displayChange_field_med101(row, status);
	displayChange_field_med201(row, status);
	displayChange_field_med301(row, status);
	displayChange_field_factor01(row, status);
	displayChange_field_cvserie01(row, status);
	displayChange_field_ctain101(row, status);
	displayChange_field_ctain201(row, status);
	displayChange_field_ctain301(row, status);
	displayChange_field_porciva01(row, status);
	displayChange_field_prodsinsdo01(row, status);
	displayChange_field_sinprec01(row, status);
	displayChange_field_fotoprod01(row, status);
	displayChange_field_detprod01(row, status);
	displayChange_field_block(row, status);
	displayChange_field_uid(row, status);
	displayChange_field_ultimoacceso(row, status);
	displayChange_field_idpro(row, status);
	displayChange_field_catprod01(row, status);
	displayChange_field_med401(row, status);
	displayChange_field_med501(row, status);
	displayChange_field_prodconmed01(row, status);
	displayChange_field_factorpeso01(row, status);
	displayChange_field_codbar01(row, status);
	displayChange_field_unifrac01(row, status);
	displayChange_field_calidad01(row, status);
	displayChange_field_color01(row, status);
	displayChange_field_material01(row, status);
	displayChange_field_talla01(row, status);
	displayChange_field_compuesto01(row, status);
	displayChange_field_catalt01(row, status);
	displayChange_field_precfob01(row, status);
	displayChange_field_precio401(row, status);
	displayChange_field_descto401(row, status);
	displayChange_field_porigen01(row, status);
	displayChange_field_rin01(row, status);
	displayChange_field_marca01(row, status);
	displayChange_field_alto01(row, status);
	displayChange_field_ancho01(row, status);
	displayChange_field_tipoletra01(row, status);
	displayChange_field_indcarga01(row, status);
	displayChange_field_indveloc01(row, status);
	displayChange_field_pr01(row, status);
	displayChange_field_dis01(row, status);
	displayChange_field_tipocons01(row, status);
	displayChange_field_precateg01(row, status);
	displayChange_field_tipprod01(row, status);
	displayChange_field_conversion01(row, status);
	displayChange_field_valhom01(row, status);
	displayChange_field_ctain401(row, status);
	displayChange_field_valhom02(row, status);
	displayChange_field_valhom03(row, status);
	displayChange_field_valhom04(row, status);
	displayChange_field_statuspro01(row, status);
	displayChange_field_parara01(row, status);
	displayChange_field_prodequiv01(row, status);
	displayChange_field_regalia01(row, status);
	displayChange_field_precio501(row, status);
	displayChange_field_descto501(row, status);
	displayChange_field_precio601(row, status);
	displayChange_field_descto601(row, status);
	displayChange_field_precio701(row, status);
	displayChange_field_descto701(row, status);
	displayChange_field_precio801(row, status);
	displayChange_field_descto801(row, status);
	displayChange_field_precio901(row, status);
	displayChange_field_descto901(row, status);
	displayChange_field_precio1001(row, status);
	displayChange_field_descto1001(row, status);
	displayChange_field_precio1101(row, status);
	displayChange_field_descto1101(row, status);
	displayChange_field_precio1201(row, status);
	displayChange_field_descto1201(row, status);
	displayChange_field_submarca01(row, status);
	displayChange_field_modelo01(row, status);
	displayChange_field_clasific01(row, status);
	displayChange_field_codbarempaque01(row, status);
	displayChange_field_unidadempaque01(row, status);
	displayChange_field_dimensionempaque01(row, status);
	displayChange_field_link01(row, status);
	displayChange_field_desprod201(row, status);
	displayChange_field_desprod301(row, status);
	displayChange_field_coefprd01(row, status);
	displayChange_field_infor01(row, status);
	displayChange_field_infor03(row, status);
	displayChange_field_infor05(row, status);
	displayChange_field_infor07(row, status);
	displayChange_field_porcenrenta(row, status);
	displayChange_field_peso(row, status);
	displayChange_field_consignado(row, status);
	displayChange_field_cant_consignado(row, status);
	displayChange_field_baseimpexe01(row, status);
	displayChange_field_peso01(row, status);
	displayChange_field_prodrel01(row, status);
	displayChange_field_infor02(row, status);
	displayChange_field_infor04(row, status);
	displayChange_field_infor06(row, status);
	displayChange_field_infor08(row, status);
	displayChange_field_porcicevta01(row, status);
	displayChange_field_porcicecpra01(row, status);
	displayChange_field_porcptdaranc01(row, status);
	displayChange_field_ordimp01(row, status);
}

function displayChange_field(field, row, status) {
	if ("codprod01" == field) {
		displayChange_field_codprod01(row, status);
	}
	if ("desprod01" == field) {
		displayChange_field_desprod01(row, status);
	}
	if ("cve101" == field) {
		displayChange_field_cve101(row, status);
	}
	if ("cve201" == field) {
		displayChange_field_cve201(row, status);
	}
	if ("unidmed01" == field) {
		displayChange_field_unidmed01(row, status);
	}
	if ("cantmin01" == field) {
		displayChange_field_cantmin01(row, status);
	}
	if ("cantact01" == field) {
		displayChange_field_cantact01(row, status);
	}
	if ("valact01" == field) {
		displayChange_field_valact01(row, status);
	}
	if ("exipromo01" == field) {
		displayChange_field_exipromo01(row, status);
	}
	if ("precuni01" == field) {
		displayChange_field_precuni01(row, status);
	}
	if ("pedpend01" == field) {
		displayChange_field_pedpend01(row, status);
	}
	if ("orden01" == field) {
		displayChange_field_orden01(row, status);
	}
	if ("refer01" == field) {
		displayChange_field_refer01(row, status);
	}
	if ("canentm01" == field) {
		displayChange_field_canentm01(row, status);
	}
	if ("valentm01" == field) {
		displayChange_field_valentm01(row, status);
	}
	if ("cansalm01" == field) {
		displayChange_field_cansalm01(row, status);
	}
	if ("valsalm01" == field) {
		displayChange_field_valsalm01(row, status);
	}
	if ("canenta01" == field) {
		displayChange_field_canenta01(row, status);
	}
	if ("valenta01" == field) {
		displayChange_field_valenta01(row, status);
	}
	if ("cansala01" == field) {
		displayChange_field_cansala01(row, status);
	}
	if ("valsala01" == field) {
		displayChange_field_valsala01(row, status);
	}
	if ("fecape01" == field) {
		displayChange_field_fecape01(row, status);
	}
	if ("fecult01" == field) {
		displayChange_field_fecult01(row, status);
	}
	if ("fecvta01" == field) {
		displayChange_field_fecvta01(row, status);
	}
	if ("ubic01" == field) {
		displayChange_field_ubic01(row, status);
	}
	if ("precvta01" == field) {
		displayChange_field_precvta01(row, status);
	}
	if ("descto101" == field) {
		displayChange_field_descto101(row, status);
	}
	if ("precio201" == field) {
		displayChange_field_precio201(row, status);
	}
	if ("descto201" == field) {
		displayChange_field_descto201(row, status);
	}
	if ("precio301" == field) {
		displayChange_field_precio301(row, status);
	}
	if ("descto301" == field) {
		displayChange_field_descto301(row, status);
	}
	if ("canvtam01" == field) {
		displayChange_field_canvtam01(row, status);
	}
	if ("valvtam01" == field) {
		displayChange_field_valvtam01(row, status);
	}
	if ("cosvtam01" == field) {
		displayChange_field_cosvtam01(row, status);
	}
	if ("canvtaa01" == field) {
		displayChange_field_canvtaa01(row, status);
	}
	if ("valvtaa01" == field) {
		displayChange_field_valvtaa01(row, status);
	}
	if ("cosvtaa01" == field) {
		displayChange_field_cosvtaa01(row, status);
	}
	if ("prod1alt01" == field) {
		displayChange_field_prod1alt01(row, status);
	}
	if ("prod2alt01" == field) {
		displayChange_field_prod2alt01(row, status);
	}
	if ("proved101" == field) {
		displayChange_field_proved101(row, status);
	}
	if ("proved201" == field) {
		displayChange_field_proved201(row, status);
	}
	if ("med101" == field) {
		displayChange_field_med101(row, status);
	}
	if ("med201" == field) {
		displayChange_field_med201(row, status);
	}
	if ("med301" == field) {
		displayChange_field_med301(row, status);
	}
	if ("factor01" == field) {
		displayChange_field_factor01(row, status);
	}
	if ("cvserie01" == field) {
		displayChange_field_cvserie01(row, status);
	}
	if ("ctain101" == field) {
		displayChange_field_ctain101(row, status);
	}
	if ("ctain201" == field) {
		displayChange_field_ctain201(row, status);
	}
	if ("ctain301" == field) {
		displayChange_field_ctain301(row, status);
	}
	if ("porciva01" == field) {
		displayChange_field_porciva01(row, status);
	}
	if ("prodsinsdo01" == field) {
		displayChange_field_prodsinsdo01(row, status);
	}
	if ("sinprec01" == field) {
		displayChange_field_sinprec01(row, status);
	}
	if ("fotoprod01" == field) {
		displayChange_field_fotoprod01(row, status);
	}
	if ("detprod01" == field) {
		displayChange_field_detprod01(row, status);
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
	if ("idpro" == field) {
		displayChange_field_idpro(row, status);
	}
	if ("catprod01" == field) {
		displayChange_field_catprod01(row, status);
	}
	if ("med401" == field) {
		displayChange_field_med401(row, status);
	}
	if ("med501" == field) {
		displayChange_field_med501(row, status);
	}
	if ("prodconmed01" == field) {
		displayChange_field_prodconmed01(row, status);
	}
	if ("factorpeso01" == field) {
		displayChange_field_factorpeso01(row, status);
	}
	if ("codbar01" == field) {
		displayChange_field_codbar01(row, status);
	}
	if ("unifrac01" == field) {
		displayChange_field_unifrac01(row, status);
	}
	if ("calidad01" == field) {
		displayChange_field_calidad01(row, status);
	}
	if ("color01" == field) {
		displayChange_field_color01(row, status);
	}
	if ("material01" == field) {
		displayChange_field_material01(row, status);
	}
	if ("talla01" == field) {
		displayChange_field_talla01(row, status);
	}
	if ("compuesto01" == field) {
		displayChange_field_compuesto01(row, status);
	}
	if ("catalt01" == field) {
		displayChange_field_catalt01(row, status);
	}
	if ("precfob01" == field) {
		displayChange_field_precfob01(row, status);
	}
	if ("precio401" == field) {
		displayChange_field_precio401(row, status);
	}
	if ("descto401" == field) {
		displayChange_field_descto401(row, status);
	}
	if ("porigen01" == field) {
		displayChange_field_porigen01(row, status);
	}
	if ("rin01" == field) {
		displayChange_field_rin01(row, status);
	}
	if ("marca01" == field) {
		displayChange_field_marca01(row, status);
	}
	if ("alto01" == field) {
		displayChange_field_alto01(row, status);
	}
	if ("ancho01" == field) {
		displayChange_field_ancho01(row, status);
	}
	if ("tipoletra01" == field) {
		displayChange_field_tipoletra01(row, status);
	}
	if ("indcarga01" == field) {
		displayChange_field_indcarga01(row, status);
	}
	if ("indveloc01" == field) {
		displayChange_field_indveloc01(row, status);
	}
	if ("pr01" == field) {
		displayChange_field_pr01(row, status);
	}
	if ("dis01" == field) {
		displayChange_field_dis01(row, status);
	}
	if ("tipocons01" == field) {
		displayChange_field_tipocons01(row, status);
	}
	if ("precateg01" == field) {
		displayChange_field_precateg01(row, status);
	}
	if ("tipprod01" == field) {
		displayChange_field_tipprod01(row, status);
	}
	if ("conversion01" == field) {
		displayChange_field_conversion01(row, status);
	}
	if ("valhom01" == field) {
		displayChange_field_valhom01(row, status);
	}
	if ("ctain401" == field) {
		displayChange_field_ctain401(row, status);
	}
	if ("valhom02" == field) {
		displayChange_field_valhom02(row, status);
	}
	if ("valhom03" == field) {
		displayChange_field_valhom03(row, status);
	}
	if ("valhom04" == field) {
		displayChange_field_valhom04(row, status);
	}
	if ("statuspro01" == field) {
		displayChange_field_statuspro01(row, status);
	}
	if ("parara01" == field) {
		displayChange_field_parara01(row, status);
	}
	if ("prodequiv01" == field) {
		displayChange_field_prodequiv01(row, status);
	}
	if ("regalia01" == field) {
		displayChange_field_regalia01(row, status);
	}
	if ("precio501" == field) {
		displayChange_field_precio501(row, status);
	}
	if ("descto501" == field) {
		displayChange_field_descto501(row, status);
	}
	if ("precio601" == field) {
		displayChange_field_precio601(row, status);
	}
	if ("descto601" == field) {
		displayChange_field_descto601(row, status);
	}
	if ("precio701" == field) {
		displayChange_field_precio701(row, status);
	}
	if ("descto701" == field) {
		displayChange_field_descto701(row, status);
	}
	if ("precio801" == field) {
		displayChange_field_precio801(row, status);
	}
	if ("descto801" == field) {
		displayChange_field_descto801(row, status);
	}
	if ("precio901" == field) {
		displayChange_field_precio901(row, status);
	}
	if ("descto901" == field) {
		displayChange_field_descto901(row, status);
	}
	if ("precio1001" == field) {
		displayChange_field_precio1001(row, status);
	}
	if ("descto1001" == field) {
		displayChange_field_descto1001(row, status);
	}
	if ("precio1101" == field) {
		displayChange_field_precio1101(row, status);
	}
	if ("descto1101" == field) {
		displayChange_field_descto1101(row, status);
	}
	if ("precio1201" == field) {
		displayChange_field_precio1201(row, status);
	}
	if ("descto1201" == field) {
		displayChange_field_descto1201(row, status);
	}
	if ("submarca01" == field) {
		displayChange_field_submarca01(row, status);
	}
	if ("modelo01" == field) {
		displayChange_field_modelo01(row, status);
	}
	if ("clasific01" == field) {
		displayChange_field_clasific01(row, status);
	}
	if ("codbarempaque01" == field) {
		displayChange_field_codbarempaque01(row, status);
	}
	if ("unidadempaque01" == field) {
		displayChange_field_unidadempaque01(row, status);
	}
	if ("dimensionempaque01" == field) {
		displayChange_field_dimensionempaque01(row, status);
	}
	if ("link01" == field) {
		displayChange_field_link01(row, status);
	}
	if ("desprod201" == field) {
		displayChange_field_desprod201(row, status);
	}
	if ("desprod301" == field) {
		displayChange_field_desprod301(row, status);
	}
	if ("coefprd01" == field) {
		displayChange_field_coefprd01(row, status);
	}
	if ("infor01" == field) {
		displayChange_field_infor01(row, status);
	}
	if ("infor03" == field) {
		displayChange_field_infor03(row, status);
	}
	if ("infor05" == field) {
		displayChange_field_infor05(row, status);
	}
	if ("infor07" == field) {
		displayChange_field_infor07(row, status);
	}
	if ("porcenrenta" == field) {
		displayChange_field_porcenrenta(row, status);
	}
	if ("peso" == field) {
		displayChange_field_peso(row, status);
	}
	if ("consignado" == field) {
		displayChange_field_consignado(row, status);
	}
	if ("cant_consignado" == field) {
		displayChange_field_cant_consignado(row, status);
	}
	if ("baseimpexe01" == field) {
		displayChange_field_baseimpexe01(row, status);
	}
	if ("peso01" == field) {
		displayChange_field_peso01(row, status);
	}
	if ("prodrel01" == field) {
		displayChange_field_prodrel01(row, status);
	}
	if ("infor02" == field) {
		displayChange_field_infor02(row, status);
	}
	if ("infor04" == field) {
		displayChange_field_infor04(row, status);
	}
	if ("infor06" == field) {
		displayChange_field_infor06(row, status);
	}
	if ("infor08" == field) {
		displayChange_field_infor08(row, status);
	}
	if ("porcicevta01" == field) {
		displayChange_field_porcicevta01(row, status);
	}
	if ("porcicecpra01" == field) {
		displayChange_field_porcicecpra01(row, status);
	}
	if ("porcptdaranc01" == field) {
		displayChange_field_porcptdaranc01(row, status);
	}
	if ("ordimp01" == field) {
		displayChange_field_ordimp01(row, status);
	}
}

function displayChange_field_codprod01(row, status) {
    var fieldId;
}

function displayChange_field_desprod01(row, status) {
    var fieldId;
}

function displayChange_field_cve101(row, status) {
    var fieldId;
}

function displayChange_field_cve201(row, status) {
    var fieldId;
}

function displayChange_field_unidmed01(row, status) {
    var fieldId;
}

function displayChange_field_cantmin01(row, status) {
    var fieldId;
}

function displayChange_field_cantact01(row, status) {
    var fieldId;
}

function displayChange_field_valact01(row, status) {
    var fieldId;
}

function displayChange_field_exipromo01(row, status) {
    var fieldId;
}

function displayChange_field_precuni01(row, status) {
    var fieldId;
}

function displayChange_field_pedpend01(row, status) {
    var fieldId;
}

function displayChange_field_orden01(row, status) {
    var fieldId;
}

function displayChange_field_refer01(row, status) {
    var fieldId;
}

function displayChange_field_canentm01(row, status) {
    var fieldId;
}

function displayChange_field_valentm01(row, status) {
    var fieldId;
}

function displayChange_field_cansalm01(row, status) {
    var fieldId;
}

function displayChange_field_valsalm01(row, status) {
    var fieldId;
}

function displayChange_field_canenta01(row, status) {
    var fieldId;
}

function displayChange_field_valenta01(row, status) {
    var fieldId;
}

function displayChange_field_cansala01(row, status) {
    var fieldId;
}

function displayChange_field_valsala01(row, status) {
    var fieldId;
}

function displayChange_field_fecape01(row, status) {
    var fieldId;
}

function displayChange_field_fecult01(row, status) {
    var fieldId;
}

function displayChange_field_fecvta01(row, status) {
    var fieldId;
}

function displayChange_field_ubic01(row, status) {
    var fieldId;
}

function displayChange_field_precvta01(row, status) {
    var fieldId;
}

function displayChange_field_descto101(row, status) {
    var fieldId;
}

function displayChange_field_precio201(row, status) {
    var fieldId;
}

function displayChange_field_descto201(row, status) {
    var fieldId;
}

function displayChange_field_precio301(row, status) {
    var fieldId;
}

function displayChange_field_descto301(row, status) {
    var fieldId;
}

function displayChange_field_canvtam01(row, status) {
    var fieldId;
}

function displayChange_field_valvtam01(row, status) {
    var fieldId;
}

function displayChange_field_cosvtam01(row, status) {
    var fieldId;
}

function displayChange_field_canvtaa01(row, status) {
    var fieldId;
}

function displayChange_field_valvtaa01(row, status) {
    var fieldId;
}

function displayChange_field_cosvtaa01(row, status) {
    var fieldId;
}

function displayChange_field_prod1alt01(row, status) {
    var fieldId;
}

function displayChange_field_prod2alt01(row, status) {
    var fieldId;
}

function displayChange_field_proved101(row, status) {
    var fieldId;
}

function displayChange_field_proved201(row, status) {
    var fieldId;
}

function displayChange_field_med101(row, status) {
    var fieldId;
}

function displayChange_field_med201(row, status) {
    var fieldId;
}

function displayChange_field_med301(row, status) {
    var fieldId;
}

function displayChange_field_factor01(row, status) {
    var fieldId;
}

function displayChange_field_cvserie01(row, status) {
    var fieldId;
}

function displayChange_field_ctain101(row, status) {
    var fieldId;
}

function displayChange_field_ctain201(row, status) {
    var fieldId;
}

function displayChange_field_ctain301(row, status) {
    var fieldId;
}

function displayChange_field_porciva01(row, status) {
    var fieldId;
}

function displayChange_field_prodsinsdo01(row, status) {
    var fieldId;
}

function displayChange_field_sinprec01(row, status) {
    var fieldId;
}

function displayChange_field_fotoprod01(row, status) {
    var fieldId;
}

function displayChange_field_detprod01(row, status) {
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

function displayChange_field_idpro(row, status) {
    var fieldId;
}

function displayChange_field_catprod01(row, status) {
    var fieldId;
}

function displayChange_field_med401(row, status) {
    var fieldId;
}

function displayChange_field_med501(row, status) {
    var fieldId;
}

function displayChange_field_prodconmed01(row, status) {
    var fieldId;
}

function displayChange_field_factorpeso01(row, status) {
    var fieldId;
}

function displayChange_field_codbar01(row, status) {
    var fieldId;
}

function displayChange_field_unifrac01(row, status) {
    var fieldId;
}

function displayChange_field_calidad01(row, status) {
    var fieldId;
}

function displayChange_field_color01(row, status) {
    var fieldId;
}

function displayChange_field_material01(row, status) {
    var fieldId;
}

function displayChange_field_talla01(row, status) {
    var fieldId;
}

function displayChange_field_compuesto01(row, status) {
    var fieldId;
}

function displayChange_field_catalt01(row, status) {
    var fieldId;
}

function displayChange_field_precfob01(row, status) {
    var fieldId;
}

function displayChange_field_precio401(row, status) {
    var fieldId;
}

function displayChange_field_descto401(row, status) {
    var fieldId;
}

function displayChange_field_porigen01(row, status) {
    var fieldId;
}

function displayChange_field_rin01(row, status) {
    var fieldId;
}

function displayChange_field_marca01(row, status) {
    var fieldId;
}

function displayChange_field_alto01(row, status) {
    var fieldId;
}

function displayChange_field_ancho01(row, status) {
    var fieldId;
}

function displayChange_field_tipoletra01(row, status) {
    var fieldId;
}

function displayChange_field_indcarga01(row, status) {
    var fieldId;
}

function displayChange_field_indveloc01(row, status) {
    var fieldId;
}

function displayChange_field_pr01(row, status) {
    var fieldId;
}

function displayChange_field_dis01(row, status) {
    var fieldId;
}

function displayChange_field_tipocons01(row, status) {
    var fieldId;
}

function displayChange_field_precateg01(row, status) {
    var fieldId;
}

function displayChange_field_tipprod01(row, status) {
    var fieldId;
}

function displayChange_field_conversion01(row, status) {
    var fieldId;
}

function displayChange_field_valhom01(row, status) {
    var fieldId;
}

function displayChange_field_ctain401(row, status) {
    var fieldId;
}

function displayChange_field_valhom02(row, status) {
    var fieldId;
}

function displayChange_field_valhom03(row, status) {
    var fieldId;
}

function displayChange_field_valhom04(row, status) {
    var fieldId;
}

function displayChange_field_statuspro01(row, status) {
    var fieldId;
}

function displayChange_field_parara01(row, status) {
    var fieldId;
}

function displayChange_field_prodequiv01(row, status) {
    var fieldId;
}

function displayChange_field_regalia01(row, status) {
    var fieldId;
}

function displayChange_field_precio501(row, status) {
    var fieldId;
}

function displayChange_field_descto501(row, status) {
    var fieldId;
}

function displayChange_field_precio601(row, status) {
    var fieldId;
}

function displayChange_field_descto601(row, status) {
    var fieldId;
}

function displayChange_field_precio701(row, status) {
    var fieldId;
}

function displayChange_field_descto701(row, status) {
    var fieldId;
}

function displayChange_field_precio801(row, status) {
    var fieldId;
}

function displayChange_field_descto801(row, status) {
    var fieldId;
}

function displayChange_field_precio901(row, status) {
    var fieldId;
}

function displayChange_field_descto901(row, status) {
    var fieldId;
}

function displayChange_field_precio1001(row, status) {
    var fieldId;
}

function displayChange_field_descto1001(row, status) {
    var fieldId;
}

function displayChange_field_precio1101(row, status) {
    var fieldId;
}

function displayChange_field_descto1101(row, status) {
    var fieldId;
}

function displayChange_field_precio1201(row, status) {
    var fieldId;
}

function displayChange_field_descto1201(row, status) {
    var fieldId;
}

function displayChange_field_submarca01(row, status) {
    var fieldId;
}

function displayChange_field_modelo01(row, status) {
    var fieldId;
}

function displayChange_field_clasific01(row, status) {
    var fieldId;
}

function displayChange_field_codbarempaque01(row, status) {
    var fieldId;
}

function displayChange_field_unidadempaque01(row, status) {
    var fieldId;
}

function displayChange_field_dimensionempaque01(row, status) {
    var fieldId;
}

function displayChange_field_link01(row, status) {
    var fieldId;
}

function displayChange_field_desprod201(row, status) {
    var fieldId;
}

function displayChange_field_desprod301(row, status) {
    var fieldId;
}

function displayChange_field_coefprd01(row, status) {
    var fieldId;
}

function displayChange_field_infor01(row, status) {
    var fieldId;
}

function displayChange_field_infor03(row, status) {
    var fieldId;
}

function displayChange_field_infor05(row, status) {
    var fieldId;
}

function displayChange_field_infor07(row, status) {
    var fieldId;
}

function displayChange_field_porcenrenta(row, status) {
    var fieldId;
}

function displayChange_field_peso(row, status) {
    var fieldId;
}

function displayChange_field_consignado(row, status) {
    var fieldId;
}

function displayChange_field_cant_consignado(row, status) {
    var fieldId;
}

function displayChange_field_baseimpexe01(row, status) {
    var fieldId;
}

function displayChange_field_peso01(row, status) {
    var fieldId;
}

function displayChange_field_prodrel01(row, status) {
    var fieldId;
}

function displayChange_field_infor02(row, status) {
    var fieldId;
}

function displayChange_field_infor04(row, status) {
    var fieldId;
}

function displayChange_field_infor06(row, status) {
    var fieldId;
}

function displayChange_field_infor08(row, status) {
    var fieldId;
}

function displayChange_field_porcicevta01(row, status) {
    var fieldId;
}

function displayChange_field_porcicecpra01(row, status) {
    var fieldId;
}

function displayChange_field_porcptdaranc01(row, status) {
    var fieldId;
}

function displayChange_field_ordimp01(row, status) {
    var fieldId;
}

function scRecreateSelect2() {
}
function scResetPagesDisplay() {
	$(".sc-form-page").show();
}

function scHidePage(pageNo) {
	$("#id_form_maepro_mob_form" + pageNo).hide();
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
  $("#id_sc_field_fecape01" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_fecape01" + iSeqRow] = $oField.val();
      if (2 == aParts.length) {
        sTime = " " + aParts[1];
      }
      if ('' == sTime || ' ' == sTime) {
        sTime = ' <?php echo $this->jqueryCalendarTimeStart($this->field_config['fecape01']['date_format']); ?>';
      }
      $oField.datepicker("option", "dateFormat", "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', 'hh', 'ii', 'ss', ':', ';', $_SESSION['scriptcase']['reg_conf']['date_sep'], $_SESSION['scriptcase']['reg_conf']['time_sep']), array('', 'yyyy', '','','', '', '', '', ''), $this->field_config['fecape01']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>" + sTime);
    },
    onClose: function(dateText, inst) {
      do_ajax_form_maepro_mob_validate_fecape01(iSeqRow);
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
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', 'hh', 'ii', 'ss', ':', ';', $_SESSION['scriptcase']['reg_conf']['date_sep'], $_SESSION['scriptcase']['reg_conf']['time_sep']), array('', 'yyyy', '','','', '', '', '', ''), $this->field_config['fecape01']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
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
  $("#id_sc_field_fecult01" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_fecult01" + iSeqRow] = $oField.val();
      if (2 == aParts.length) {
        sTime = " " + aParts[1];
      }
      if ('' == sTime || ' ' == sTime) {
        sTime = ' <?php echo $this->jqueryCalendarTimeStart($this->field_config['fecult01']['date_format']); ?>';
      }
      $oField.datepicker("option", "dateFormat", "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', 'hh', 'ii', 'ss', ':', ';', $_SESSION['scriptcase']['reg_conf']['date_sep'], $_SESSION['scriptcase']['reg_conf']['time_sep']), array('', 'yyyy', '','','', '', '', '', ''), $this->field_config['fecult01']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>" + sTime);
    },
    onClose: function(dateText, inst) {
      do_ajax_form_maepro_mob_validate_fecult01(iSeqRow);
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
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', 'hh', 'ii', 'ss', ':', ';', $_SESSION['scriptcase']['reg_conf']['date_sep'], $_SESSION['scriptcase']['reg_conf']['time_sep']), array('', 'yyyy', '','','', '', '', '', ''), $this->field_config['fecult01']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
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
  $("#id_sc_field_fecvta01" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_fecvta01" + iSeqRow] = $oField.val();
      if (2 == aParts.length) {
        sTime = " " + aParts[1];
      }
      if ('' == sTime || ' ' == sTime) {
        sTime = ' <?php echo $this->jqueryCalendarTimeStart($this->field_config['fecvta01']['date_format']); ?>';
      }
      $oField.datepicker("option", "dateFormat", "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', 'hh', 'ii', 'ss', ':', ';', $_SESSION['scriptcase']['reg_conf']['date_sep'], $_SESSION['scriptcase']['reg_conf']['time_sep']), array('', 'yyyy', '','','', '', '', '', ''), $this->field_config['fecvta01']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>" + sTime);
    },
    onClose: function(dateText, inst) {
      do_ajax_form_maepro_mob_validate_fecvta01(iSeqRow);
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
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', 'hh', 'ii', 'ss', ':', ';', $_SESSION['scriptcase']['reg_conf']['date_sep'], $_SESSION['scriptcase']['reg_conf']['time_sep']), array('', 'yyyy', '','','', '', '', '', ''), $this->field_config['fecvta01']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
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
  $("#id_sc_field_ultimoacceso" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_ultimoacceso" + iSeqRow] = $oField.val();
      if (2 == aParts.length) {
        sTime = " " + aParts[1];
      }
      if ('' == sTime || ' ' == sTime) {
        sTime = ' <?php echo $this->jqueryCalendarTimeStart($this->field_config['ultimoacceso']['date_format']); ?>';
      }
      $oField.datepicker("option", "dateFormat", "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', 'hh', 'ii', 'ss', ':', ';', $_SESSION['scriptcase']['reg_conf']['date_sep'], $_SESSION['scriptcase']['reg_conf']['time_sep']), array('', 'yyyy', '','','', '', '', '', ''), $this->field_config['ultimoacceso']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>" + sTime);
    },
    onClose: function(dateText, inst) {
      do_ajax_form_maepro_mob_validate_ultimoacceso(iSeqRow);
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
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', 'hh', 'ii', 'ss', ':', ';', $_SESSION['scriptcase']['reg_conf']['date_sep'], $_SESSION['scriptcase']['reg_conf']['time_sep']), array('', 'yyyy', '','','', '', '', '', ''), $this->field_config['ultimoacceso']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
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
                         $(t).html("<a href=\"javascript:nm_mostra_doc('0', '"+rs2+"', 'form_maepro_mob')\">"+$('#id_read_on_'+field+iSeqRow).text()+"</a>");
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

