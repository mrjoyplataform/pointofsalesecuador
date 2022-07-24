
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
  scEventControl_data["rp01noemp" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["rp01division" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["rp01depto" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["rp01seccion" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["rp01noemp1" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["rp01nombreemp" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["rp01categoria" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["rp01turno" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["rp01statusemp" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["rp01fechastatus" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["rp01causaretiro" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["rp01direccion" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["rp01telefono" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["rp01lugarnacimiento" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["rp01fechanacimiento" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["rp01nacionalidad" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["rp01cedula" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["rp01noiess" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["rp01sexo" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["rp01nolibreta" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["rp01profesion" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["rp01fechaingreso" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["rp01fechareingreso" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["rp01cargo" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["rp01estadocivil" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["rp01rebajaxcasado" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["rp01nombreconyuge" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["rp01nombrepadre" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["rp01nombremadre" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["rp01nohijos" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["rp01fechahijos0" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["rp01sexohijos0" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["rp01fechahijos1" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["rp01sexohijos1" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["rp01fechahijos2" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["rp01sexohijos2" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["rp01fechahijos3" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["rp01sexohijos3" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["rp01fechahijos4" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["rp01sexohijos4" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["rp01fechahijos5" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["rp01sexohijos5" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["rp01fechahijos6" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["rp01sexohijos6" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["rp01fechahijos7" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["rp01sexohijos7" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["rp01fechahijos8" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["rp01sexohijos8" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["rp01fechahijos9" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["rp01sexohijos9" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["rp01cargaspadres" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["rp01otrascargas" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["rp01formapago" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["rp01nobancoemp" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["rp01ctabancoemp" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["rp01tipoctabco" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["rp01fechaultvacacion" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["rp01aporte" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["rp01socio" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["rp01transporte" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["rp01recibeporc" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["rp01sueldoanterior" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["rp01sueldosalario" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["rp01fecmodsdosal" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["rp01fecmodficha" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["rp01faltasinjust" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["rp01ingresos1er" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["rp01basesocialvalor" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["rp01basesocialtiempo" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["rp0114vopagoacum" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["rp0115vopagoacum" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["rp01cverrorliq" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["rp01porcentliq" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["rp01tiposangre" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["rp01ingresos2do" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["rp01provdiremp" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["rp01cantondiremp" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["rp01ciudaddiremp" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["rp01codocupacion" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["uid" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["block" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["ultimoacceso" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["rp01foto" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["rp01ctacontable" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["rp01email" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["rp01passwd" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["rp01huella" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["rp01recibefr" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["rp01recibedt" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["rp01recibedc" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["rp01uid" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["rp01fechauid" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["rp01obs" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["rp01cauliq" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["rp01discapacidad" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["rp01conadis" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["rp01tpdiscapacidad" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["rp01prdiscapacidad" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["rp01freserva" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["rp01codsectorial" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["anticipoporvalor" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["tipidret" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["residenciatrab" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["paisresidencia" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["aplicaconvenio" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["tipotrabajdiscap" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["porcentajediscap" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["tipiddiscap" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["iddiscap" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["rp01varias_secciones" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["rp01cc" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["rp01observacion" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["rp01iessconyugue" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["rp01tiporefrigerio" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["idiomas" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["emergencias" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["rp01tipojornada" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["rp01numero_horas" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["rp01emailpersonal" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["rp01supervisadopor" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["rp01zonaderiesgo" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["rp01refpersnom1" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["rp01refpersparen1" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["rp01refperstel1" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["rp01refpersnom2" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["rp01refpersparen2" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["rp01refperstel2" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["rp01tipovivienda" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["rp01serviciosbasicos" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["rp01viviendadetalle" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["rp01dormitorios" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["rp01sala" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["rp01comedor" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["rp01banos" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["rp01estudiosrealizados" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["rp01ruta1" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["rp01ruta2" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["rp01ruta3" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["rp01actividadesextras" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["rp01noemp" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["rp01noemp" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["rp01division" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["rp01division" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["rp01depto" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["rp01depto" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["rp01seccion" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["rp01seccion" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["rp01noemp1" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["rp01noemp1" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["rp01nombreemp" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["rp01nombreemp" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["rp01categoria" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["rp01categoria" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["rp01turno" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["rp01turno" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["rp01statusemp" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["rp01statusemp" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["rp01fechastatus" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["rp01fechastatus" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["rp01causaretiro" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["rp01causaretiro" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["rp01direccion" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["rp01direccion" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["rp01telefono" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["rp01telefono" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["rp01lugarnacimiento" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["rp01lugarnacimiento" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["rp01fechanacimiento" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["rp01fechanacimiento" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["rp01nacionalidad" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["rp01nacionalidad" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["rp01cedula" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["rp01cedula" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["rp01noiess" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["rp01noiess" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["rp01sexo" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["rp01sexo" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["rp01nolibreta" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["rp01nolibreta" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["rp01profesion" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["rp01profesion" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["rp01fechaingreso" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["rp01fechaingreso" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["rp01fechareingreso" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["rp01fechareingreso" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["rp01cargo" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["rp01cargo" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["rp01estadocivil" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["rp01estadocivil" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["rp01rebajaxcasado" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["rp01rebajaxcasado" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["rp01nombreconyuge" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["rp01nombreconyuge" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["rp01nombrepadre" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["rp01nombrepadre" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["rp01nombremadre" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["rp01nombremadre" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["rp01nohijos" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["rp01nohijos" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["rp01fechahijos0" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["rp01fechahijos0" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["rp01sexohijos0" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["rp01sexohijos0" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["rp01fechahijos1" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["rp01fechahijos1" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["rp01sexohijos1" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["rp01sexohijos1" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["rp01fechahijos2" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["rp01fechahijos2" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["rp01sexohijos2" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["rp01sexohijos2" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["rp01fechahijos3" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["rp01fechahijos3" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["rp01sexohijos3" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["rp01sexohijos3" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["rp01fechahijos4" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["rp01fechahijos4" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["rp01sexohijos4" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["rp01sexohijos4" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["rp01fechahijos5" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["rp01fechahijos5" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["rp01sexohijos5" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["rp01sexohijos5" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["rp01fechahijos6" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["rp01fechahijos6" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["rp01sexohijos6" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["rp01sexohijos6" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["rp01fechahijos7" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["rp01fechahijos7" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["rp01sexohijos7" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["rp01sexohijos7" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["rp01fechahijos8" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["rp01fechahijos8" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["rp01sexohijos8" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["rp01sexohijos8" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["rp01fechahijos9" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["rp01fechahijos9" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["rp01sexohijos9" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["rp01sexohijos9" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["rp01cargaspadres" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["rp01cargaspadres" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["rp01otrascargas" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["rp01otrascargas" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["rp01formapago" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["rp01formapago" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["rp01nobancoemp" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["rp01nobancoemp" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["rp01ctabancoemp" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["rp01ctabancoemp" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["rp01tipoctabco" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["rp01tipoctabco" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["rp01fechaultvacacion" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["rp01fechaultvacacion" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["rp01aporte" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["rp01aporte" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["rp01socio" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["rp01socio" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["rp01transporte" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["rp01transporte" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["rp01recibeporc" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["rp01recibeporc" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["rp01sueldoanterior" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["rp01sueldoanterior" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["rp01sueldosalario" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["rp01sueldosalario" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["rp01fecmodsdosal" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["rp01fecmodsdosal" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["rp01fecmodficha" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["rp01fecmodficha" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["rp01faltasinjust" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["rp01faltasinjust" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["rp01ingresos1er" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["rp01ingresos1er" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["rp01basesocialvalor" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["rp01basesocialvalor" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["rp01basesocialtiempo" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["rp01basesocialtiempo" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["rp0114vopagoacum" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["rp0114vopagoacum" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["rp0115vopagoacum" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["rp0115vopagoacum" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["rp01cverrorliq" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["rp01cverrorliq" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["rp01porcentliq" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["rp01porcentliq" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["rp01tiposangre" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["rp01tiposangre" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["rp01ingresos2do" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["rp01ingresos2do" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["rp01provdiremp" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["rp01provdiremp" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["rp01cantondiremp" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["rp01cantondiremp" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["rp01ciudaddiremp" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["rp01ciudaddiremp" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["rp01codocupacion" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["rp01codocupacion" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["uid" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["uid" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["block" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["block" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["ultimoacceso" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["ultimoacceso" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["rp01foto" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["rp01foto" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["rp01ctacontable" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["rp01ctacontable" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["rp01email" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["rp01email" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["rp01passwd" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["rp01passwd" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["rp01huella" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["rp01huella" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["rp01recibefr" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["rp01recibefr" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["rp01recibedt" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["rp01recibedt" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["rp01recibedc" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["rp01recibedc" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["rp01uid" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["rp01uid" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["rp01fechauid" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["rp01fechauid" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["rp01obs" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["rp01obs" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["rp01cauliq" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["rp01cauliq" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["rp01discapacidad" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["rp01discapacidad" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["rp01conadis" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["rp01conadis" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["rp01tpdiscapacidad" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["rp01tpdiscapacidad" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["rp01prdiscapacidad" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["rp01prdiscapacidad" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["rp01freserva" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["rp01freserva" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["rp01codsectorial" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["rp01codsectorial" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["anticipoporvalor" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["anticipoporvalor" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["tipidret" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["tipidret" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["residenciatrab" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["residenciatrab" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["paisresidencia" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["paisresidencia" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["aplicaconvenio" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["aplicaconvenio" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["tipotrabajdiscap" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["tipotrabajdiscap" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["porcentajediscap" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["porcentajediscap" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["tipiddiscap" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["tipiddiscap" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["iddiscap" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["iddiscap" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["rp01varias_secciones" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["rp01varias_secciones" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["rp01cc" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["rp01cc" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["rp01observacion" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["rp01observacion" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["rp01iessconyugue" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["rp01iessconyugue" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["rp01tiporefrigerio" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["rp01tiporefrigerio" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["idiomas" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["idiomas" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["emergencias" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["emergencias" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["rp01tipojornada" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["rp01tipojornada" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["rp01numero_horas" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["rp01numero_horas" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["rp01emailpersonal" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["rp01emailpersonal" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["rp01supervisadopor" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["rp01supervisadopor" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["rp01zonaderiesgo" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["rp01zonaderiesgo" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["rp01refpersnom1" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["rp01refpersnom1" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["rp01refpersparen1" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["rp01refpersparen1" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["rp01refperstel1" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["rp01refperstel1" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["rp01refpersnom2" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["rp01refpersnom2" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["rp01refpersparen2" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["rp01refpersparen2" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["rp01refperstel2" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["rp01refperstel2" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["rp01tipovivienda" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["rp01tipovivienda" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["rp01serviciosbasicos" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["rp01serviciosbasicos" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["rp01viviendadetalle" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["rp01viviendadetalle" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["rp01dormitorios" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["rp01dormitorios" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["rp01sala" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["rp01sala" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["rp01comedor" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["rp01comedor" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["rp01banos" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["rp01banos" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["rp01estudiosrealizados" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["rp01estudiosrealizados" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["rp01ruta1" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["rp01ruta1" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["rp01ruta2" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["rp01ruta2" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["rp01ruta3" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["rp01ruta3" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["rp01actividadesextras" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["rp01actividadesextras" + iSeqRow]["change"]) {
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
  $('#id_sc_field_rp01noemp' + iSeqRow).bind('blur', function() { sc_form_maeemp_rp01noemp_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_maeemp_rp01noemp_onfocus(this, iSeqRow) });
  $('#id_sc_field_rp01division' + iSeqRow).bind('blur', function() { sc_form_maeemp_rp01division_onblur(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_maeemp_rp01division_onfocus(this, iSeqRow) });
  $('#id_sc_field_rp01depto' + iSeqRow).bind('blur', function() { sc_form_maeemp_rp01depto_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_maeemp_rp01depto_onfocus(this, iSeqRow) });
  $('#id_sc_field_rp01seccion' + iSeqRow).bind('blur', function() { sc_form_maeemp_rp01seccion_onblur(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_maeemp_rp01seccion_onfocus(this, iSeqRow) });
  $('#id_sc_field_rp01noemp1' + iSeqRow).bind('blur', function() { sc_form_maeemp_rp01noemp1_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_maeemp_rp01noemp1_onfocus(this, iSeqRow) });
  $('#id_sc_field_rp01nombreemp' + iSeqRow).bind('blur', function() { sc_form_maeemp_rp01nombreemp_onblur(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_maeemp_rp01nombreemp_onfocus(this, iSeqRow) });
  $('#id_sc_field_rp01categoria' + iSeqRow).bind('blur', function() { sc_form_maeemp_rp01categoria_onblur(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_maeemp_rp01categoria_onfocus(this, iSeqRow) });
  $('#id_sc_field_rp01turno' + iSeqRow).bind('blur', function() { sc_form_maeemp_rp01turno_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_maeemp_rp01turno_onfocus(this, iSeqRow) });
  $('#id_sc_field_rp01statusemp' + iSeqRow).bind('blur', function() { sc_form_maeemp_rp01statusemp_onblur(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_maeemp_rp01statusemp_onfocus(this, iSeqRow) });
  $('#id_sc_field_rp01fechastatus' + iSeqRow).bind('blur', function() { sc_form_maeemp_rp01fechastatus_onblur(this, iSeqRow) })
                                             .bind('focus', function() { sc_form_maeemp_rp01fechastatus_onfocus(this, iSeqRow) });
  $('#id_sc_field_rp01causaretiro' + iSeqRow).bind('blur', function() { sc_form_maeemp_rp01causaretiro_onblur(this, iSeqRow) })
                                             .bind('focus', function() { sc_form_maeemp_rp01causaretiro_onfocus(this, iSeqRow) });
  $('#id_sc_field_rp01direccion' + iSeqRow).bind('blur', function() { sc_form_maeemp_rp01direccion_onblur(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_maeemp_rp01direccion_onfocus(this, iSeqRow) });
  $('#id_sc_field_rp01telefono' + iSeqRow).bind('blur', function() { sc_form_maeemp_rp01telefono_onblur(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_maeemp_rp01telefono_onfocus(this, iSeqRow) });
  $('#id_sc_field_rp01lugarnacimiento' + iSeqRow).bind('blur', function() { sc_form_maeemp_rp01lugarnacimiento_onblur(this, iSeqRow) })
                                                 .bind('focus', function() { sc_form_maeemp_rp01lugarnacimiento_onfocus(this, iSeqRow) });
  $('#id_sc_field_rp01fechanacimiento' + iSeqRow).bind('blur', function() { sc_form_maeemp_rp01fechanacimiento_onblur(this, iSeqRow) })
                                                 .bind('focus', function() { sc_form_maeemp_rp01fechanacimiento_onfocus(this, iSeqRow) });
  $('#id_sc_field_rp01nacionalidad' + iSeqRow).bind('blur', function() { sc_form_maeemp_rp01nacionalidad_onblur(this, iSeqRow) })
                                              .bind('focus', function() { sc_form_maeemp_rp01nacionalidad_onfocus(this, iSeqRow) });
  $('#id_sc_field_rp01cedula' + iSeqRow).bind('blur', function() { sc_form_maeemp_rp01cedula_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_maeemp_rp01cedula_onfocus(this, iSeqRow) });
  $('#id_sc_field_rp01noiess' + iSeqRow).bind('blur', function() { sc_form_maeemp_rp01noiess_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_maeemp_rp01noiess_onfocus(this, iSeqRow) });
  $('#id_sc_field_rp01sexo' + iSeqRow).bind('blur', function() { sc_form_maeemp_rp01sexo_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_maeemp_rp01sexo_onfocus(this, iSeqRow) });
  $('#id_sc_field_rp01nolibreta' + iSeqRow).bind('blur', function() { sc_form_maeemp_rp01nolibreta_onblur(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_maeemp_rp01nolibreta_onfocus(this, iSeqRow) });
  $('#id_sc_field_rp01profesion' + iSeqRow).bind('blur', function() { sc_form_maeemp_rp01profesion_onblur(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_maeemp_rp01profesion_onfocus(this, iSeqRow) });
  $('#id_sc_field_rp01fechaingreso' + iSeqRow).bind('blur', function() { sc_form_maeemp_rp01fechaingreso_onblur(this, iSeqRow) })
                                              .bind('focus', function() { sc_form_maeemp_rp01fechaingreso_onfocus(this, iSeqRow) });
  $('#id_sc_field_rp01fechareingreso' + iSeqRow).bind('blur', function() { sc_form_maeemp_rp01fechareingreso_onblur(this, iSeqRow) })
                                                .bind('focus', function() { sc_form_maeemp_rp01fechareingreso_onfocus(this, iSeqRow) });
  $('#id_sc_field_rp01cargo' + iSeqRow).bind('blur', function() { sc_form_maeemp_rp01cargo_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_maeemp_rp01cargo_onfocus(this, iSeqRow) });
  $('#id_sc_field_rp01estadocivil' + iSeqRow).bind('blur', function() { sc_form_maeemp_rp01estadocivil_onblur(this, iSeqRow) })
                                             .bind('focus', function() { sc_form_maeemp_rp01estadocivil_onfocus(this, iSeqRow) });
  $('#id_sc_field_rp01rebajaxcasado' + iSeqRow).bind('blur', function() { sc_form_maeemp_rp01rebajaxcasado_onblur(this, iSeqRow) })
                                               .bind('focus', function() { sc_form_maeemp_rp01rebajaxcasado_onfocus(this, iSeqRow) });
  $('#id_sc_field_rp01nombreconyuge' + iSeqRow).bind('blur', function() { sc_form_maeemp_rp01nombreconyuge_onblur(this, iSeqRow) })
                                               .bind('focus', function() { sc_form_maeemp_rp01nombreconyuge_onfocus(this, iSeqRow) });
  $('#id_sc_field_rp01nombrepadre' + iSeqRow).bind('blur', function() { sc_form_maeemp_rp01nombrepadre_onblur(this, iSeqRow) })
                                             .bind('focus', function() { sc_form_maeemp_rp01nombrepadre_onfocus(this, iSeqRow) });
  $('#id_sc_field_rp01nombremadre' + iSeqRow).bind('blur', function() { sc_form_maeemp_rp01nombremadre_onblur(this, iSeqRow) })
                                             .bind('focus', function() { sc_form_maeemp_rp01nombremadre_onfocus(this, iSeqRow) });
  $('#id_sc_field_rp01nohijos' + iSeqRow).bind('blur', function() { sc_form_maeemp_rp01nohijos_onblur(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_maeemp_rp01nohijos_onfocus(this, iSeqRow) });
  $('#id_sc_field_rp01fechahijos0' + iSeqRow).bind('blur', function() { sc_form_maeemp_rp01fechahijos0_onblur(this, iSeqRow) })
                                             .bind('focus', function() { sc_form_maeemp_rp01fechahijos0_onfocus(this, iSeqRow) });
  $('#id_sc_field_rp01sexohijos0' + iSeqRow).bind('blur', function() { sc_form_maeemp_rp01sexohijos0_onblur(this, iSeqRow) })
                                            .bind('focus', function() { sc_form_maeemp_rp01sexohijos0_onfocus(this, iSeqRow) });
  $('#id_sc_field_rp01fechahijos1' + iSeqRow).bind('blur', function() { sc_form_maeemp_rp01fechahijos1_onblur(this, iSeqRow) })
                                             .bind('focus', function() { sc_form_maeemp_rp01fechahijos1_onfocus(this, iSeqRow) });
  $('#id_sc_field_rp01sexohijos1' + iSeqRow).bind('blur', function() { sc_form_maeemp_rp01sexohijos1_onblur(this, iSeqRow) })
                                            .bind('focus', function() { sc_form_maeemp_rp01sexohijos1_onfocus(this, iSeqRow) });
  $('#id_sc_field_rp01fechahijos2' + iSeqRow).bind('blur', function() { sc_form_maeemp_rp01fechahijos2_onblur(this, iSeqRow) })
                                             .bind('focus', function() { sc_form_maeemp_rp01fechahijos2_onfocus(this, iSeqRow) });
  $('#id_sc_field_rp01sexohijos2' + iSeqRow).bind('blur', function() { sc_form_maeemp_rp01sexohijos2_onblur(this, iSeqRow) })
                                            .bind('focus', function() { sc_form_maeemp_rp01sexohijos2_onfocus(this, iSeqRow) });
  $('#id_sc_field_rp01fechahijos3' + iSeqRow).bind('blur', function() { sc_form_maeemp_rp01fechahijos3_onblur(this, iSeqRow) })
                                             .bind('focus', function() { sc_form_maeemp_rp01fechahijos3_onfocus(this, iSeqRow) });
  $('#id_sc_field_rp01sexohijos3' + iSeqRow).bind('blur', function() { sc_form_maeemp_rp01sexohijos3_onblur(this, iSeqRow) })
                                            .bind('focus', function() { sc_form_maeemp_rp01sexohijos3_onfocus(this, iSeqRow) });
  $('#id_sc_field_rp01fechahijos4' + iSeqRow).bind('blur', function() { sc_form_maeemp_rp01fechahijos4_onblur(this, iSeqRow) })
                                             .bind('focus', function() { sc_form_maeemp_rp01fechahijos4_onfocus(this, iSeqRow) });
  $('#id_sc_field_rp01sexohijos4' + iSeqRow).bind('blur', function() { sc_form_maeemp_rp01sexohijos4_onblur(this, iSeqRow) })
                                            .bind('focus', function() { sc_form_maeemp_rp01sexohijos4_onfocus(this, iSeqRow) });
  $('#id_sc_field_rp01fechahijos5' + iSeqRow).bind('blur', function() { sc_form_maeemp_rp01fechahijos5_onblur(this, iSeqRow) })
                                             .bind('focus', function() { sc_form_maeemp_rp01fechahijos5_onfocus(this, iSeqRow) });
  $('#id_sc_field_rp01sexohijos5' + iSeqRow).bind('blur', function() { sc_form_maeemp_rp01sexohijos5_onblur(this, iSeqRow) })
                                            .bind('focus', function() { sc_form_maeemp_rp01sexohijos5_onfocus(this, iSeqRow) });
  $('#id_sc_field_rp01fechahijos6' + iSeqRow).bind('blur', function() { sc_form_maeemp_rp01fechahijos6_onblur(this, iSeqRow) })
                                             .bind('focus', function() { sc_form_maeemp_rp01fechahijos6_onfocus(this, iSeqRow) });
  $('#id_sc_field_rp01sexohijos6' + iSeqRow).bind('blur', function() { sc_form_maeemp_rp01sexohijos6_onblur(this, iSeqRow) })
                                            .bind('focus', function() { sc_form_maeemp_rp01sexohijos6_onfocus(this, iSeqRow) });
  $('#id_sc_field_rp01fechahijos7' + iSeqRow).bind('blur', function() { sc_form_maeemp_rp01fechahijos7_onblur(this, iSeqRow) })
                                             .bind('focus', function() { sc_form_maeemp_rp01fechahijos7_onfocus(this, iSeqRow) });
  $('#id_sc_field_rp01sexohijos7' + iSeqRow).bind('blur', function() { sc_form_maeemp_rp01sexohijos7_onblur(this, iSeqRow) })
                                            .bind('focus', function() { sc_form_maeemp_rp01sexohijos7_onfocus(this, iSeqRow) });
  $('#id_sc_field_rp01fechahijos8' + iSeqRow).bind('blur', function() { sc_form_maeemp_rp01fechahijos8_onblur(this, iSeqRow) })
                                             .bind('focus', function() { sc_form_maeemp_rp01fechahijos8_onfocus(this, iSeqRow) });
  $('#id_sc_field_rp01sexohijos8' + iSeqRow).bind('blur', function() { sc_form_maeemp_rp01sexohijos8_onblur(this, iSeqRow) })
                                            .bind('focus', function() { sc_form_maeemp_rp01sexohijos8_onfocus(this, iSeqRow) });
  $('#id_sc_field_rp01fechahijos9' + iSeqRow).bind('blur', function() { sc_form_maeemp_rp01fechahijos9_onblur(this, iSeqRow) })
                                             .bind('focus', function() { sc_form_maeemp_rp01fechahijos9_onfocus(this, iSeqRow) });
  $('#id_sc_field_rp01sexohijos9' + iSeqRow).bind('blur', function() { sc_form_maeemp_rp01sexohijos9_onblur(this, iSeqRow) })
                                            .bind('focus', function() { sc_form_maeemp_rp01sexohijos9_onfocus(this, iSeqRow) });
  $('#id_sc_field_rp01cargaspadres' + iSeqRow).bind('blur', function() { sc_form_maeemp_rp01cargaspadres_onblur(this, iSeqRow) })
                                              .bind('focus', function() { sc_form_maeemp_rp01cargaspadres_onfocus(this, iSeqRow) });
  $('#id_sc_field_rp01otrascargas' + iSeqRow).bind('blur', function() { sc_form_maeemp_rp01otrascargas_onblur(this, iSeqRow) })
                                             .bind('focus', function() { sc_form_maeemp_rp01otrascargas_onfocus(this, iSeqRow) });
  $('#id_sc_field_rp01formapago' + iSeqRow).bind('blur', function() { sc_form_maeemp_rp01formapago_onblur(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_maeemp_rp01formapago_onfocus(this, iSeqRow) });
  $('#id_sc_field_rp01nobancoemp' + iSeqRow).bind('blur', function() { sc_form_maeemp_rp01nobancoemp_onblur(this, iSeqRow) })
                                            .bind('focus', function() { sc_form_maeemp_rp01nobancoemp_onfocus(this, iSeqRow) });
  $('#id_sc_field_rp01ctabancoemp' + iSeqRow).bind('blur', function() { sc_form_maeemp_rp01ctabancoemp_onblur(this, iSeqRow) })
                                             .bind('focus', function() { sc_form_maeemp_rp01ctabancoemp_onfocus(this, iSeqRow) });
  $('#id_sc_field_rp01tipoctabco' + iSeqRow).bind('blur', function() { sc_form_maeemp_rp01tipoctabco_onblur(this, iSeqRow) })
                                            .bind('focus', function() { sc_form_maeemp_rp01tipoctabco_onfocus(this, iSeqRow) });
  $('#id_sc_field_rp01fechaultvacacion' + iSeqRow).bind('blur', function() { sc_form_maeemp_rp01fechaultvacacion_onblur(this, iSeqRow) })
                                                  .bind('focus', function() { sc_form_maeemp_rp01fechaultvacacion_onfocus(this, iSeqRow) });
  $('#id_sc_field_rp01aporte' + iSeqRow).bind('blur', function() { sc_form_maeemp_rp01aporte_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_maeemp_rp01aporte_onfocus(this, iSeqRow) });
  $('#id_sc_field_rp01socio' + iSeqRow).bind('blur', function() { sc_form_maeemp_rp01socio_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_maeemp_rp01socio_onfocus(this, iSeqRow) });
  $('#id_sc_field_rp01transporte' + iSeqRow).bind('blur', function() { sc_form_maeemp_rp01transporte_onblur(this, iSeqRow) })
                                            .bind('focus', function() { sc_form_maeemp_rp01transporte_onfocus(this, iSeqRow) });
  $('#id_sc_field_rp01recibeporc' + iSeqRow).bind('blur', function() { sc_form_maeemp_rp01recibeporc_onblur(this, iSeqRow) })
                                            .bind('focus', function() { sc_form_maeemp_rp01recibeporc_onfocus(this, iSeqRow) });
  $('#id_sc_field_rp01sueldoanterior' + iSeqRow).bind('blur', function() { sc_form_maeemp_rp01sueldoanterior_onblur(this, iSeqRow) })
                                                .bind('focus', function() { sc_form_maeemp_rp01sueldoanterior_onfocus(this, iSeqRow) });
  $('#id_sc_field_rp01sueldosalario' + iSeqRow).bind('blur', function() { sc_form_maeemp_rp01sueldosalario_onblur(this, iSeqRow) })
                                               .bind('focus', function() { sc_form_maeemp_rp01sueldosalario_onfocus(this, iSeqRow) });
  $('#id_sc_field_rp01fecmodsdosal' + iSeqRow).bind('blur', function() { sc_form_maeemp_rp01fecmodsdosal_onblur(this, iSeqRow) })
                                              .bind('focus', function() { sc_form_maeemp_rp01fecmodsdosal_onfocus(this, iSeqRow) });
  $('#id_sc_field_rp01fecmodficha' + iSeqRow).bind('blur', function() { sc_form_maeemp_rp01fecmodficha_onblur(this, iSeqRow) })
                                             .bind('focus', function() { sc_form_maeemp_rp01fecmodficha_onfocus(this, iSeqRow) });
  $('#id_sc_field_rp01faltasinjust' + iSeqRow).bind('blur', function() { sc_form_maeemp_rp01faltasinjust_onblur(this, iSeqRow) })
                                              .bind('focus', function() { sc_form_maeemp_rp01faltasinjust_onfocus(this, iSeqRow) });
  $('#id_sc_field_rp01ingresos1er' + iSeqRow).bind('blur', function() { sc_form_maeemp_rp01ingresos1er_onblur(this, iSeqRow) })
                                             .bind('focus', function() { sc_form_maeemp_rp01ingresos1er_onfocus(this, iSeqRow) });
  $('#id_sc_field_rp01basesocialvalor' + iSeqRow).bind('blur', function() { sc_form_maeemp_rp01basesocialvalor_onblur(this, iSeqRow) })
                                                 .bind('focus', function() { sc_form_maeemp_rp01basesocialvalor_onfocus(this, iSeqRow) });
  $('#id_sc_field_rp01basesocialtiempo' + iSeqRow).bind('blur', function() { sc_form_maeemp_rp01basesocialtiempo_onblur(this, iSeqRow) })
                                                  .bind('focus', function() { sc_form_maeemp_rp01basesocialtiempo_onfocus(this, iSeqRow) });
  $('#id_sc_field_rp0114vopagoacum' + iSeqRow).bind('blur', function() { sc_form_maeemp_rp0114vopagoacum_onblur(this, iSeqRow) })
                                              .bind('focus', function() { sc_form_maeemp_rp0114vopagoacum_onfocus(this, iSeqRow) });
  $('#id_sc_field_rp0115vopagoacum' + iSeqRow).bind('blur', function() { sc_form_maeemp_rp0115vopagoacum_onblur(this, iSeqRow) })
                                              .bind('focus', function() { sc_form_maeemp_rp0115vopagoacum_onfocus(this, iSeqRow) });
  $('#id_sc_field_rp01cverrorliq' + iSeqRow).bind('blur', function() { sc_form_maeemp_rp01cverrorliq_onblur(this, iSeqRow) })
                                            .bind('focus', function() { sc_form_maeemp_rp01cverrorliq_onfocus(this, iSeqRow) });
  $('#id_sc_field_rp01porcentliq' + iSeqRow).bind('blur', function() { sc_form_maeemp_rp01porcentliq_onblur(this, iSeqRow) })
                                            .bind('focus', function() { sc_form_maeemp_rp01porcentliq_onfocus(this, iSeqRow) });
  $('#id_sc_field_rp01tiposangre' + iSeqRow).bind('blur', function() { sc_form_maeemp_rp01tiposangre_onblur(this, iSeqRow) })
                                            .bind('focus', function() { sc_form_maeemp_rp01tiposangre_onfocus(this, iSeqRow) });
  $('#id_sc_field_rp01ingresos2do' + iSeqRow).bind('blur', function() { sc_form_maeemp_rp01ingresos2do_onblur(this, iSeqRow) })
                                             .bind('focus', function() { sc_form_maeemp_rp01ingresos2do_onfocus(this, iSeqRow) });
  $('#id_sc_field_rp01provdiremp' + iSeqRow).bind('blur', function() { sc_form_maeemp_rp01provdiremp_onblur(this, iSeqRow) })
                                            .bind('focus', function() { sc_form_maeemp_rp01provdiremp_onfocus(this, iSeqRow) });
  $('#id_sc_field_rp01cantondiremp' + iSeqRow).bind('blur', function() { sc_form_maeemp_rp01cantondiremp_onblur(this, iSeqRow) })
                                              .bind('focus', function() { sc_form_maeemp_rp01cantondiremp_onfocus(this, iSeqRow) });
  $('#id_sc_field_rp01ciudaddiremp' + iSeqRow).bind('blur', function() { sc_form_maeemp_rp01ciudaddiremp_onblur(this, iSeqRow) })
                                              .bind('focus', function() { sc_form_maeemp_rp01ciudaddiremp_onfocus(this, iSeqRow) });
  $('#id_sc_field_rp01codocupacion' + iSeqRow).bind('blur', function() { sc_form_maeemp_rp01codocupacion_onblur(this, iSeqRow) })
                                              .bind('focus', function() { sc_form_maeemp_rp01codocupacion_onfocus(this, iSeqRow) });
  $('#id_sc_field_uid' + iSeqRow).bind('blur', function() { sc_form_maeemp_uid_onblur(this, iSeqRow) })
                                 .bind('focus', function() { sc_form_maeemp_uid_onfocus(this, iSeqRow) });
  $('#id_sc_field_block' + iSeqRow).bind('blur', function() { sc_form_maeemp_block_onblur(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_maeemp_block_onfocus(this, iSeqRow) });
  $('#id_sc_field_ultimoacceso' + iSeqRow).bind('blur', function() { sc_form_maeemp_ultimoacceso_onblur(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_maeemp_ultimoacceso_onfocus(this, iSeqRow) });
  $('#id_sc_field_rp01foto' + iSeqRow).bind('blur', function() { sc_form_maeemp_rp01foto_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_maeemp_rp01foto_onfocus(this, iSeqRow) });
  $('#id_sc_field_rp01ctacontable' + iSeqRow).bind('blur', function() { sc_form_maeemp_rp01ctacontable_onblur(this, iSeqRow) })
                                             .bind('focus', function() { sc_form_maeemp_rp01ctacontable_onfocus(this, iSeqRow) });
  $('#id_sc_field_rp01email' + iSeqRow).bind('blur', function() { sc_form_maeemp_rp01email_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_maeemp_rp01email_onfocus(this, iSeqRow) });
  $('#id_sc_field_rp01passwd' + iSeqRow).bind('blur', function() { sc_form_maeemp_rp01passwd_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_maeemp_rp01passwd_onfocus(this, iSeqRow) });
  $('#id_sc_field_rp01huella' + iSeqRow).bind('blur', function() { sc_form_maeemp_rp01huella_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_maeemp_rp01huella_onfocus(this, iSeqRow) });
  $('#id_sc_field_rp01recibefr' + iSeqRow).bind('blur', function() { sc_form_maeemp_rp01recibefr_onblur(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_maeemp_rp01recibefr_onfocus(this, iSeqRow) });
  $('#id_sc_field_rp01recibedt' + iSeqRow).bind('blur', function() { sc_form_maeemp_rp01recibedt_onblur(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_maeemp_rp01recibedt_onfocus(this, iSeqRow) });
  $('#id_sc_field_rp01recibedc' + iSeqRow).bind('blur', function() { sc_form_maeemp_rp01recibedc_onblur(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_maeemp_rp01recibedc_onfocus(this, iSeqRow) });
  $('#id_sc_field_rp01uid' + iSeqRow).bind('blur', function() { sc_form_maeemp_rp01uid_onblur(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_maeemp_rp01uid_onfocus(this, iSeqRow) });
  $('#id_sc_field_rp01fechauid' + iSeqRow).bind('blur', function() { sc_form_maeemp_rp01fechauid_onblur(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_maeemp_rp01fechauid_onfocus(this, iSeqRow) });
  $('#id_sc_field_rp01fechauid_hora' + iSeqRow).bind('blur', function() { sc_form_maeemp_rp01fechauid_onblur(this, iSeqRow) })
                                               .bind('focus', function() { sc_form_maeemp_rp01fechauid_onfocus(this, iSeqRow) });
  $('#id_sc_field_rp01obs' + iSeqRow).bind('blur', function() { sc_form_maeemp_rp01obs_onblur(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_maeemp_rp01obs_onfocus(this, iSeqRow) });
  $('#id_sc_field_rp01cauliq' + iSeqRow).bind('blur', function() { sc_form_maeemp_rp01cauliq_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_maeemp_rp01cauliq_onfocus(this, iSeqRow) });
  $('#id_sc_field_rp01discapacidad' + iSeqRow).bind('blur', function() { sc_form_maeemp_rp01discapacidad_onblur(this, iSeqRow) })
                                              .bind('focus', function() { sc_form_maeemp_rp01discapacidad_onfocus(this, iSeqRow) });
  $('#id_sc_field_rp01conadis' + iSeqRow).bind('blur', function() { sc_form_maeemp_rp01conadis_onblur(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_maeemp_rp01conadis_onfocus(this, iSeqRow) });
  $('#id_sc_field_rp01tpdiscapacidad' + iSeqRow).bind('blur', function() { sc_form_maeemp_rp01tpdiscapacidad_onblur(this, iSeqRow) })
                                                .bind('focus', function() { sc_form_maeemp_rp01tpdiscapacidad_onfocus(this, iSeqRow) });
  $('#id_sc_field_rp01prdiscapacidad' + iSeqRow).bind('blur', function() { sc_form_maeemp_rp01prdiscapacidad_onblur(this, iSeqRow) })
                                                .bind('focus', function() { sc_form_maeemp_rp01prdiscapacidad_onfocus(this, iSeqRow) });
  $('#id_sc_field_rp01freserva' + iSeqRow).bind('blur', function() { sc_form_maeemp_rp01freserva_onblur(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_maeemp_rp01freserva_onfocus(this, iSeqRow) });
  $('#id_sc_field_rp01codsectorial' + iSeqRow).bind('blur', function() { sc_form_maeemp_rp01codsectorial_onblur(this, iSeqRow) })
                                              .bind('focus', function() { sc_form_maeemp_rp01codsectorial_onfocus(this, iSeqRow) });
  $('#id_sc_field_anticipoporvalor' + iSeqRow).bind('blur', function() { sc_form_maeemp_anticipoporvalor_onblur(this, iSeqRow) })
                                              .bind('focus', function() { sc_form_maeemp_anticipoporvalor_onfocus(this, iSeqRow) });
  $('#id_sc_field_tipidret' + iSeqRow).bind('blur', function() { sc_form_maeemp_tipidret_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_maeemp_tipidret_onfocus(this, iSeqRow) });
  $('#id_sc_field_residenciatrab' + iSeqRow).bind('blur', function() { sc_form_maeemp_residenciatrab_onblur(this, iSeqRow) })
                                            .bind('focus', function() { sc_form_maeemp_residenciatrab_onfocus(this, iSeqRow) });
  $('#id_sc_field_paisresidencia' + iSeqRow).bind('blur', function() { sc_form_maeemp_paisresidencia_onblur(this, iSeqRow) })
                                            .bind('focus', function() { sc_form_maeemp_paisresidencia_onfocus(this, iSeqRow) });
  $('#id_sc_field_aplicaconvenio' + iSeqRow).bind('blur', function() { sc_form_maeemp_aplicaconvenio_onblur(this, iSeqRow) })
                                            .bind('focus', function() { sc_form_maeemp_aplicaconvenio_onfocus(this, iSeqRow) });
  $('#id_sc_field_tipotrabajdiscap' + iSeqRow).bind('blur', function() { sc_form_maeemp_tipotrabajdiscap_onblur(this, iSeqRow) })
                                              .bind('focus', function() { sc_form_maeemp_tipotrabajdiscap_onfocus(this, iSeqRow) });
  $('#id_sc_field_porcentajediscap' + iSeqRow).bind('blur', function() { sc_form_maeemp_porcentajediscap_onblur(this, iSeqRow) })
                                              .bind('focus', function() { sc_form_maeemp_porcentajediscap_onfocus(this, iSeqRow) });
  $('#id_sc_field_tipiddiscap' + iSeqRow).bind('blur', function() { sc_form_maeemp_tipiddiscap_onblur(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_maeemp_tipiddiscap_onfocus(this, iSeqRow) });
  $('#id_sc_field_iddiscap' + iSeqRow).bind('blur', function() { sc_form_maeemp_iddiscap_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_maeemp_iddiscap_onfocus(this, iSeqRow) });
  $('#id_sc_field_rp01varias_secciones' + iSeqRow).bind('blur', function() { sc_form_maeemp_rp01varias_secciones_onblur(this, iSeqRow) })
                                                  .bind('focus', function() { sc_form_maeemp_rp01varias_secciones_onfocus(this, iSeqRow) });
  $('#id_sc_field_rp01cc' + iSeqRow).bind('blur', function() { sc_form_maeemp_rp01cc_onblur(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_maeemp_rp01cc_onfocus(this, iSeqRow) });
  $('#id_sc_field_rp01observacion' + iSeqRow).bind('blur', function() { sc_form_maeemp_rp01observacion_onblur(this, iSeqRow) })
                                             .bind('focus', function() { sc_form_maeemp_rp01observacion_onfocus(this, iSeqRow) });
  $('#id_sc_field_rp01iessconyugue' + iSeqRow).bind('blur', function() { sc_form_maeemp_rp01iessconyugue_onblur(this, iSeqRow) })
                                              .bind('focus', function() { sc_form_maeemp_rp01iessconyugue_onfocus(this, iSeqRow) });
  $('#id_sc_field_rp01tiporefrigerio' + iSeqRow).bind('blur', function() { sc_form_maeemp_rp01tiporefrigerio_onblur(this, iSeqRow) })
                                                .bind('focus', function() { sc_form_maeemp_rp01tiporefrigerio_onfocus(this, iSeqRow) });
  $('#id_sc_field_idiomas' + iSeqRow).bind('blur', function() { sc_form_maeemp_idiomas_onblur(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_maeemp_idiomas_onfocus(this, iSeqRow) });
  $('#id_sc_field_emergencias' + iSeqRow).bind('blur', function() { sc_form_maeemp_emergencias_onblur(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_maeemp_emergencias_onfocus(this, iSeqRow) });
  $('#id_sc_field_rp01tipojornada' + iSeqRow).bind('blur', function() { sc_form_maeemp_rp01tipojornada_onblur(this, iSeqRow) })
                                             .bind('focus', function() { sc_form_maeemp_rp01tipojornada_onfocus(this, iSeqRow) });
  $('#id_sc_field_rp01numero_horas' + iSeqRow).bind('blur', function() { sc_form_maeemp_rp01numero_horas_onblur(this, iSeqRow) })
                                              .bind('focus', function() { sc_form_maeemp_rp01numero_horas_onfocus(this, iSeqRow) });
  $('#id_sc_field_rp01emailpersonal' + iSeqRow).bind('blur', function() { sc_form_maeemp_rp01emailpersonal_onblur(this, iSeqRow) })
                                               .bind('focus', function() { sc_form_maeemp_rp01emailpersonal_onfocus(this, iSeqRow) });
  $('#id_sc_field_rp01supervisadopor' + iSeqRow).bind('blur', function() { sc_form_maeemp_rp01supervisadopor_onblur(this, iSeqRow) })
                                                .bind('focus', function() { sc_form_maeemp_rp01supervisadopor_onfocus(this, iSeqRow) });
  $('#id_sc_field_rp01zonaderiesgo' + iSeqRow).bind('blur', function() { sc_form_maeemp_rp01zonaderiesgo_onblur(this, iSeqRow) })
                                              .bind('focus', function() { sc_form_maeemp_rp01zonaderiesgo_onfocus(this, iSeqRow) });
  $('#id_sc_field_rp01refpersnom1' + iSeqRow).bind('blur', function() { sc_form_maeemp_rp01refpersnom1_onblur(this, iSeqRow) })
                                             .bind('focus', function() { sc_form_maeemp_rp01refpersnom1_onfocus(this, iSeqRow) });
  $('#id_sc_field_rp01refpersparen1' + iSeqRow).bind('blur', function() { sc_form_maeemp_rp01refpersparen1_onblur(this, iSeqRow) })
                                               .bind('focus', function() { sc_form_maeemp_rp01refpersparen1_onfocus(this, iSeqRow) });
  $('#id_sc_field_rp01refperstel1' + iSeqRow).bind('blur', function() { sc_form_maeemp_rp01refperstel1_onblur(this, iSeqRow) })
                                             .bind('focus', function() { sc_form_maeemp_rp01refperstel1_onfocus(this, iSeqRow) });
  $('#id_sc_field_rp01refpersnom2' + iSeqRow).bind('blur', function() { sc_form_maeemp_rp01refpersnom2_onblur(this, iSeqRow) })
                                             .bind('focus', function() { sc_form_maeemp_rp01refpersnom2_onfocus(this, iSeqRow) });
  $('#id_sc_field_rp01refpersparen2' + iSeqRow).bind('blur', function() { sc_form_maeemp_rp01refpersparen2_onblur(this, iSeqRow) })
                                               .bind('focus', function() { sc_form_maeemp_rp01refpersparen2_onfocus(this, iSeqRow) });
  $('#id_sc_field_rp01refperstel2' + iSeqRow).bind('blur', function() { sc_form_maeemp_rp01refperstel2_onblur(this, iSeqRow) })
                                             .bind('focus', function() { sc_form_maeemp_rp01refperstel2_onfocus(this, iSeqRow) });
  $('#id_sc_field_rp01tipovivienda' + iSeqRow).bind('blur', function() { sc_form_maeemp_rp01tipovivienda_onblur(this, iSeqRow) })
                                              .bind('focus', function() { sc_form_maeemp_rp01tipovivienda_onfocus(this, iSeqRow) });
  $('#id_sc_field_rp01serviciosbasicos' + iSeqRow).bind('blur', function() { sc_form_maeemp_rp01serviciosbasicos_onblur(this, iSeqRow) })
                                                  .bind('focus', function() { sc_form_maeemp_rp01serviciosbasicos_onfocus(this, iSeqRow) });
  $('#id_sc_field_rp01viviendadetalle' + iSeqRow).bind('blur', function() { sc_form_maeemp_rp01viviendadetalle_onblur(this, iSeqRow) })
                                                 .bind('focus', function() { sc_form_maeemp_rp01viviendadetalle_onfocus(this, iSeqRow) });
  $('#id_sc_field_rp01dormitorios' + iSeqRow).bind('blur', function() { sc_form_maeemp_rp01dormitorios_onblur(this, iSeqRow) })
                                             .bind('focus', function() { sc_form_maeemp_rp01dormitorios_onfocus(this, iSeqRow) });
  $('#id_sc_field_rp01sala' + iSeqRow).bind('blur', function() { sc_form_maeemp_rp01sala_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_maeemp_rp01sala_onfocus(this, iSeqRow) });
  $('#id_sc_field_rp01comedor' + iSeqRow).bind('blur', function() { sc_form_maeemp_rp01comedor_onblur(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_maeemp_rp01comedor_onfocus(this, iSeqRow) });
  $('#id_sc_field_rp01banos' + iSeqRow).bind('blur', function() { sc_form_maeemp_rp01banos_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_maeemp_rp01banos_onfocus(this, iSeqRow) });
  $('#id_sc_field_rp01estudiosrealizados' + iSeqRow).bind('blur', function() { sc_form_maeemp_rp01estudiosrealizados_onblur(this, iSeqRow) })
                                                    .bind('focus', function() { sc_form_maeemp_rp01estudiosrealizados_onfocus(this, iSeqRow) });
  $('#id_sc_field_rp01ruta1' + iSeqRow).bind('blur', function() { sc_form_maeemp_rp01ruta1_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_maeemp_rp01ruta1_onfocus(this, iSeqRow) });
  $('#id_sc_field_rp01ruta2' + iSeqRow).bind('blur', function() { sc_form_maeemp_rp01ruta2_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_maeemp_rp01ruta2_onfocus(this, iSeqRow) });
  $('#id_sc_field_rp01ruta3' + iSeqRow).bind('blur', function() { sc_form_maeemp_rp01ruta3_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_maeemp_rp01ruta3_onfocus(this, iSeqRow) });
  $('#id_sc_field_rp01actividadesextras' + iSeqRow).bind('blur', function() { sc_form_maeemp_rp01actividadesextras_onblur(this, iSeqRow) })
                                                   .bind('focus', function() { sc_form_maeemp_rp01actividadesextras_onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_maeemp_rp01noemp_onblur(oThis, iSeqRow) {
  do_ajax_form_maeemp_mob_validate_rp01noemp();
  scCssBlur(oThis);
}

function sc_form_maeemp_rp01noemp_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maeemp_rp01division_onblur(oThis, iSeqRow) {
  do_ajax_form_maeemp_mob_validate_rp01division();
  scCssBlur(oThis);
}

function sc_form_maeemp_rp01division_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maeemp_rp01depto_onblur(oThis, iSeqRow) {
  do_ajax_form_maeemp_mob_validate_rp01depto();
  scCssBlur(oThis);
}

function sc_form_maeemp_rp01depto_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maeemp_rp01seccion_onblur(oThis, iSeqRow) {
  do_ajax_form_maeemp_mob_validate_rp01seccion();
  scCssBlur(oThis);
}

function sc_form_maeemp_rp01seccion_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maeemp_rp01noemp1_onblur(oThis, iSeqRow) {
  do_ajax_form_maeemp_mob_validate_rp01noemp1();
  scCssBlur(oThis);
}

function sc_form_maeemp_rp01noemp1_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maeemp_rp01nombreemp_onblur(oThis, iSeqRow) {
  do_ajax_form_maeemp_mob_validate_rp01nombreemp();
  scCssBlur(oThis);
}

function sc_form_maeemp_rp01nombreemp_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maeemp_rp01categoria_onblur(oThis, iSeqRow) {
  do_ajax_form_maeemp_mob_validate_rp01categoria();
  scCssBlur(oThis);
}

function sc_form_maeemp_rp01categoria_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maeemp_rp01turno_onblur(oThis, iSeqRow) {
  do_ajax_form_maeemp_mob_validate_rp01turno();
  scCssBlur(oThis);
}

function sc_form_maeemp_rp01turno_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maeemp_rp01statusemp_onblur(oThis, iSeqRow) {
  do_ajax_form_maeemp_mob_validate_rp01statusemp();
  scCssBlur(oThis);
}

function sc_form_maeemp_rp01statusemp_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maeemp_rp01fechastatus_onblur(oThis, iSeqRow) {
  do_ajax_form_maeemp_mob_validate_rp01fechastatus();
  scCssBlur(oThis);
}

function sc_form_maeemp_rp01fechastatus_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maeemp_rp01causaretiro_onblur(oThis, iSeqRow) {
  do_ajax_form_maeemp_mob_validate_rp01causaretiro();
  scCssBlur(oThis);
}

function sc_form_maeemp_rp01causaretiro_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maeemp_rp01direccion_onblur(oThis, iSeqRow) {
  do_ajax_form_maeemp_mob_validate_rp01direccion();
  scCssBlur(oThis);
}

function sc_form_maeemp_rp01direccion_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maeemp_rp01telefono_onblur(oThis, iSeqRow) {
  do_ajax_form_maeemp_mob_validate_rp01telefono();
  scCssBlur(oThis);
}

function sc_form_maeemp_rp01telefono_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maeemp_rp01lugarnacimiento_onblur(oThis, iSeqRow) {
  do_ajax_form_maeemp_mob_validate_rp01lugarnacimiento();
  scCssBlur(oThis);
}

function sc_form_maeemp_rp01lugarnacimiento_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maeemp_rp01fechanacimiento_onblur(oThis, iSeqRow) {
  do_ajax_form_maeemp_mob_validate_rp01fechanacimiento();
  scCssBlur(oThis);
}

function sc_form_maeemp_rp01fechanacimiento_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maeemp_rp01nacionalidad_onblur(oThis, iSeqRow) {
  do_ajax_form_maeemp_mob_validate_rp01nacionalidad();
  scCssBlur(oThis);
}

function sc_form_maeemp_rp01nacionalidad_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maeemp_rp01cedula_onblur(oThis, iSeqRow) {
  do_ajax_form_maeemp_mob_validate_rp01cedula();
  scCssBlur(oThis);
}

function sc_form_maeemp_rp01cedula_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maeemp_rp01noiess_onblur(oThis, iSeqRow) {
  do_ajax_form_maeemp_mob_validate_rp01noiess();
  scCssBlur(oThis);
}

function sc_form_maeemp_rp01noiess_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maeemp_rp01sexo_onblur(oThis, iSeqRow) {
  do_ajax_form_maeemp_mob_validate_rp01sexo();
  scCssBlur(oThis);
}

function sc_form_maeemp_rp01sexo_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maeemp_rp01nolibreta_onblur(oThis, iSeqRow) {
  do_ajax_form_maeemp_mob_validate_rp01nolibreta();
  scCssBlur(oThis);
}

function sc_form_maeemp_rp01nolibreta_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maeemp_rp01profesion_onblur(oThis, iSeqRow) {
  do_ajax_form_maeemp_mob_validate_rp01profesion();
  scCssBlur(oThis);
}

function sc_form_maeemp_rp01profesion_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maeemp_rp01fechaingreso_onblur(oThis, iSeqRow) {
  do_ajax_form_maeemp_mob_validate_rp01fechaingreso();
  scCssBlur(oThis);
}

function sc_form_maeemp_rp01fechaingreso_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maeemp_rp01fechareingreso_onblur(oThis, iSeqRow) {
  do_ajax_form_maeemp_mob_validate_rp01fechareingreso();
  scCssBlur(oThis);
}

function sc_form_maeemp_rp01fechareingreso_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maeemp_rp01cargo_onblur(oThis, iSeqRow) {
  do_ajax_form_maeemp_mob_validate_rp01cargo();
  scCssBlur(oThis);
}

function sc_form_maeemp_rp01cargo_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maeemp_rp01estadocivil_onblur(oThis, iSeqRow) {
  do_ajax_form_maeemp_mob_validate_rp01estadocivil();
  scCssBlur(oThis);
}

function sc_form_maeemp_rp01estadocivil_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maeemp_rp01rebajaxcasado_onblur(oThis, iSeqRow) {
  do_ajax_form_maeemp_mob_validate_rp01rebajaxcasado();
  scCssBlur(oThis);
}

function sc_form_maeemp_rp01rebajaxcasado_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maeemp_rp01nombreconyuge_onblur(oThis, iSeqRow) {
  do_ajax_form_maeemp_mob_validate_rp01nombreconyuge();
  scCssBlur(oThis);
}

function sc_form_maeemp_rp01nombreconyuge_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maeemp_rp01nombrepadre_onblur(oThis, iSeqRow) {
  do_ajax_form_maeemp_mob_validate_rp01nombrepadre();
  scCssBlur(oThis);
}

function sc_form_maeemp_rp01nombrepadre_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maeemp_rp01nombremadre_onblur(oThis, iSeqRow) {
  do_ajax_form_maeemp_mob_validate_rp01nombremadre();
  scCssBlur(oThis);
}

function sc_form_maeemp_rp01nombremadre_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maeemp_rp01nohijos_onblur(oThis, iSeqRow) {
  do_ajax_form_maeemp_mob_validate_rp01nohijos();
  scCssBlur(oThis);
}

function sc_form_maeemp_rp01nohijos_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maeemp_rp01fechahijos0_onblur(oThis, iSeqRow) {
  do_ajax_form_maeemp_mob_validate_rp01fechahijos0();
  scCssBlur(oThis);
}

function sc_form_maeemp_rp01fechahijos0_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maeemp_rp01sexohijos0_onblur(oThis, iSeqRow) {
  do_ajax_form_maeemp_mob_validate_rp01sexohijos0();
  scCssBlur(oThis);
}

function sc_form_maeemp_rp01sexohijos0_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maeemp_rp01fechahijos1_onblur(oThis, iSeqRow) {
  do_ajax_form_maeemp_mob_validate_rp01fechahijos1();
  scCssBlur(oThis);
}

function sc_form_maeemp_rp01fechahijos1_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maeemp_rp01sexohijos1_onblur(oThis, iSeqRow) {
  do_ajax_form_maeemp_mob_validate_rp01sexohijos1();
  scCssBlur(oThis);
}

function sc_form_maeemp_rp01sexohijos1_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maeemp_rp01fechahijos2_onblur(oThis, iSeqRow) {
  do_ajax_form_maeemp_mob_validate_rp01fechahijos2();
  scCssBlur(oThis);
}

function sc_form_maeemp_rp01fechahijos2_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maeemp_rp01sexohijos2_onblur(oThis, iSeqRow) {
  do_ajax_form_maeemp_mob_validate_rp01sexohijos2();
  scCssBlur(oThis);
}

function sc_form_maeemp_rp01sexohijos2_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maeemp_rp01fechahijos3_onblur(oThis, iSeqRow) {
  do_ajax_form_maeemp_mob_validate_rp01fechahijos3();
  scCssBlur(oThis);
}

function sc_form_maeemp_rp01fechahijos3_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maeemp_rp01sexohijos3_onblur(oThis, iSeqRow) {
  do_ajax_form_maeemp_mob_validate_rp01sexohijos3();
  scCssBlur(oThis);
}

function sc_form_maeemp_rp01sexohijos3_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maeemp_rp01fechahijos4_onblur(oThis, iSeqRow) {
  do_ajax_form_maeemp_mob_validate_rp01fechahijos4();
  scCssBlur(oThis);
}

function sc_form_maeemp_rp01fechahijos4_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maeemp_rp01sexohijos4_onblur(oThis, iSeqRow) {
  do_ajax_form_maeemp_mob_validate_rp01sexohijos4();
  scCssBlur(oThis);
}

function sc_form_maeemp_rp01sexohijos4_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maeemp_rp01fechahijos5_onblur(oThis, iSeqRow) {
  do_ajax_form_maeemp_mob_validate_rp01fechahijos5();
  scCssBlur(oThis);
}

function sc_form_maeemp_rp01fechahijos5_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maeemp_rp01sexohijos5_onblur(oThis, iSeqRow) {
  do_ajax_form_maeemp_mob_validate_rp01sexohijos5();
  scCssBlur(oThis);
}

function sc_form_maeemp_rp01sexohijos5_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maeemp_rp01fechahijos6_onblur(oThis, iSeqRow) {
  do_ajax_form_maeemp_mob_validate_rp01fechahijos6();
  scCssBlur(oThis);
}

function sc_form_maeemp_rp01fechahijos6_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maeemp_rp01sexohijos6_onblur(oThis, iSeqRow) {
  do_ajax_form_maeemp_mob_validate_rp01sexohijos6();
  scCssBlur(oThis);
}

function sc_form_maeemp_rp01sexohijos6_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maeemp_rp01fechahijos7_onblur(oThis, iSeqRow) {
  do_ajax_form_maeemp_mob_validate_rp01fechahijos7();
  scCssBlur(oThis);
}

function sc_form_maeemp_rp01fechahijos7_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maeemp_rp01sexohijos7_onblur(oThis, iSeqRow) {
  do_ajax_form_maeemp_mob_validate_rp01sexohijos7();
  scCssBlur(oThis);
}

function sc_form_maeemp_rp01sexohijos7_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maeemp_rp01fechahijos8_onblur(oThis, iSeqRow) {
  do_ajax_form_maeemp_mob_validate_rp01fechahijos8();
  scCssBlur(oThis);
}

function sc_form_maeemp_rp01fechahijos8_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maeemp_rp01sexohijos8_onblur(oThis, iSeqRow) {
  do_ajax_form_maeemp_mob_validate_rp01sexohijos8();
  scCssBlur(oThis);
}

function sc_form_maeemp_rp01sexohijos8_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maeemp_rp01fechahijos9_onblur(oThis, iSeqRow) {
  do_ajax_form_maeemp_mob_validate_rp01fechahijos9();
  scCssBlur(oThis);
}

function sc_form_maeemp_rp01fechahijos9_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maeemp_rp01sexohijos9_onblur(oThis, iSeqRow) {
  do_ajax_form_maeemp_mob_validate_rp01sexohijos9();
  scCssBlur(oThis);
}

function sc_form_maeemp_rp01sexohijos9_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maeemp_rp01cargaspadres_onblur(oThis, iSeqRow) {
  do_ajax_form_maeemp_mob_validate_rp01cargaspadres();
  scCssBlur(oThis);
}

function sc_form_maeemp_rp01cargaspadres_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maeemp_rp01otrascargas_onblur(oThis, iSeqRow) {
  do_ajax_form_maeemp_mob_validate_rp01otrascargas();
  scCssBlur(oThis);
}

function sc_form_maeemp_rp01otrascargas_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maeemp_rp01formapago_onblur(oThis, iSeqRow) {
  do_ajax_form_maeemp_mob_validate_rp01formapago();
  scCssBlur(oThis);
}

function sc_form_maeemp_rp01formapago_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maeemp_rp01nobancoemp_onblur(oThis, iSeqRow) {
  do_ajax_form_maeemp_mob_validate_rp01nobancoemp();
  scCssBlur(oThis);
}

function sc_form_maeemp_rp01nobancoemp_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maeemp_rp01ctabancoemp_onblur(oThis, iSeqRow) {
  do_ajax_form_maeemp_mob_validate_rp01ctabancoemp();
  scCssBlur(oThis);
}

function sc_form_maeemp_rp01ctabancoemp_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maeemp_rp01tipoctabco_onblur(oThis, iSeqRow) {
  do_ajax_form_maeemp_mob_validate_rp01tipoctabco();
  scCssBlur(oThis);
}

function sc_form_maeemp_rp01tipoctabco_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maeemp_rp01fechaultvacacion_onblur(oThis, iSeqRow) {
  do_ajax_form_maeemp_mob_validate_rp01fechaultvacacion();
  scCssBlur(oThis);
}

function sc_form_maeemp_rp01fechaultvacacion_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maeemp_rp01aporte_onblur(oThis, iSeqRow) {
  do_ajax_form_maeemp_mob_validate_rp01aporte();
  scCssBlur(oThis);
}

function sc_form_maeemp_rp01aporte_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maeemp_rp01socio_onblur(oThis, iSeqRow) {
  do_ajax_form_maeemp_mob_validate_rp01socio();
  scCssBlur(oThis);
}

function sc_form_maeemp_rp01socio_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maeemp_rp01transporte_onblur(oThis, iSeqRow) {
  do_ajax_form_maeemp_mob_validate_rp01transporte();
  scCssBlur(oThis);
}

function sc_form_maeemp_rp01transporte_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maeemp_rp01recibeporc_onblur(oThis, iSeqRow) {
  do_ajax_form_maeemp_mob_validate_rp01recibeporc();
  scCssBlur(oThis);
}

function sc_form_maeemp_rp01recibeporc_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maeemp_rp01sueldoanterior_onblur(oThis, iSeqRow) {
  do_ajax_form_maeemp_mob_validate_rp01sueldoanterior();
  scCssBlur(oThis);
}

function sc_form_maeemp_rp01sueldoanterior_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maeemp_rp01sueldosalario_onblur(oThis, iSeqRow) {
  do_ajax_form_maeemp_mob_validate_rp01sueldosalario();
  scCssBlur(oThis);
}

function sc_form_maeemp_rp01sueldosalario_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maeemp_rp01fecmodsdosal_onblur(oThis, iSeqRow) {
  do_ajax_form_maeemp_mob_validate_rp01fecmodsdosal();
  scCssBlur(oThis);
}

function sc_form_maeemp_rp01fecmodsdosal_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maeemp_rp01fecmodficha_onblur(oThis, iSeqRow) {
  do_ajax_form_maeemp_mob_validate_rp01fecmodficha();
  scCssBlur(oThis);
}

function sc_form_maeemp_rp01fecmodficha_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maeemp_rp01faltasinjust_onblur(oThis, iSeqRow) {
  do_ajax_form_maeemp_mob_validate_rp01faltasinjust();
  scCssBlur(oThis);
}

function sc_form_maeemp_rp01faltasinjust_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maeemp_rp01ingresos1er_onblur(oThis, iSeqRow) {
  do_ajax_form_maeemp_mob_validate_rp01ingresos1er();
  scCssBlur(oThis);
}

function sc_form_maeemp_rp01ingresos1er_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maeemp_rp01basesocialvalor_onblur(oThis, iSeqRow) {
  do_ajax_form_maeemp_mob_validate_rp01basesocialvalor();
  scCssBlur(oThis);
}

function sc_form_maeemp_rp01basesocialvalor_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maeemp_rp01basesocialtiempo_onblur(oThis, iSeqRow) {
  do_ajax_form_maeemp_mob_validate_rp01basesocialtiempo();
  scCssBlur(oThis);
}

function sc_form_maeemp_rp01basesocialtiempo_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maeemp_rp0114vopagoacum_onblur(oThis, iSeqRow) {
  do_ajax_form_maeemp_mob_validate_rp0114vopagoacum();
  scCssBlur(oThis);
}

function sc_form_maeemp_rp0114vopagoacum_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maeemp_rp0115vopagoacum_onblur(oThis, iSeqRow) {
  do_ajax_form_maeemp_mob_validate_rp0115vopagoacum();
  scCssBlur(oThis);
}

function sc_form_maeemp_rp0115vopagoacum_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maeemp_rp01cverrorliq_onblur(oThis, iSeqRow) {
  do_ajax_form_maeemp_mob_validate_rp01cverrorliq();
  scCssBlur(oThis);
}

function sc_form_maeemp_rp01cverrorliq_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maeemp_rp01porcentliq_onblur(oThis, iSeqRow) {
  do_ajax_form_maeemp_mob_validate_rp01porcentliq();
  scCssBlur(oThis);
}

function sc_form_maeemp_rp01porcentliq_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maeemp_rp01tiposangre_onblur(oThis, iSeqRow) {
  do_ajax_form_maeemp_mob_validate_rp01tiposangre();
  scCssBlur(oThis);
}

function sc_form_maeemp_rp01tiposangre_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maeemp_rp01ingresos2do_onblur(oThis, iSeqRow) {
  do_ajax_form_maeemp_mob_validate_rp01ingresos2do();
  scCssBlur(oThis);
}

function sc_form_maeemp_rp01ingresos2do_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maeemp_rp01provdiremp_onblur(oThis, iSeqRow) {
  do_ajax_form_maeemp_mob_validate_rp01provdiremp();
  scCssBlur(oThis);
}

function sc_form_maeemp_rp01provdiremp_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maeemp_rp01cantondiremp_onblur(oThis, iSeqRow) {
  do_ajax_form_maeemp_mob_validate_rp01cantondiremp();
  scCssBlur(oThis);
}

function sc_form_maeemp_rp01cantondiremp_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maeemp_rp01ciudaddiremp_onblur(oThis, iSeqRow) {
  do_ajax_form_maeemp_mob_validate_rp01ciudaddiremp();
  scCssBlur(oThis);
}

function sc_form_maeemp_rp01ciudaddiremp_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maeemp_rp01codocupacion_onblur(oThis, iSeqRow) {
  do_ajax_form_maeemp_mob_validate_rp01codocupacion();
  scCssBlur(oThis);
}

function sc_form_maeemp_rp01codocupacion_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maeemp_uid_onblur(oThis, iSeqRow) {
  do_ajax_form_maeemp_mob_validate_uid();
  scCssBlur(oThis);
}

function sc_form_maeemp_uid_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maeemp_block_onblur(oThis, iSeqRow) {
  do_ajax_form_maeemp_mob_validate_block();
  scCssBlur(oThis);
}

function sc_form_maeemp_block_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maeemp_ultimoacceso_onblur(oThis, iSeqRow) {
  do_ajax_form_maeemp_mob_validate_ultimoacceso();
  scCssBlur(oThis);
}

function sc_form_maeemp_ultimoacceso_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maeemp_rp01foto_onblur(oThis, iSeqRow) {
  do_ajax_form_maeemp_mob_validate_rp01foto();
  scCssBlur(oThis);
}

function sc_form_maeemp_rp01foto_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maeemp_rp01ctacontable_onblur(oThis, iSeqRow) {
  do_ajax_form_maeemp_mob_validate_rp01ctacontable();
  scCssBlur(oThis);
}

function sc_form_maeemp_rp01ctacontable_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maeemp_rp01email_onblur(oThis, iSeqRow) {
  do_ajax_form_maeemp_mob_validate_rp01email();
  scCssBlur(oThis);
}

function sc_form_maeemp_rp01email_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maeemp_rp01passwd_onblur(oThis, iSeqRow) {
  do_ajax_form_maeemp_mob_validate_rp01passwd();
  scCssBlur(oThis);
}

function sc_form_maeemp_rp01passwd_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maeemp_rp01huella_onblur(oThis, iSeqRow) {
  do_ajax_form_maeemp_mob_validate_rp01huella();
  scCssBlur(oThis);
}

function sc_form_maeemp_rp01huella_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maeemp_rp01recibefr_onblur(oThis, iSeqRow) {
  do_ajax_form_maeemp_mob_validate_rp01recibefr();
  scCssBlur(oThis);
}

function sc_form_maeemp_rp01recibefr_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maeemp_rp01recibedt_onblur(oThis, iSeqRow) {
  do_ajax_form_maeemp_mob_validate_rp01recibedt();
  scCssBlur(oThis);
}

function sc_form_maeemp_rp01recibedt_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maeemp_rp01recibedc_onblur(oThis, iSeqRow) {
  do_ajax_form_maeemp_mob_validate_rp01recibedc();
  scCssBlur(oThis);
}

function sc_form_maeemp_rp01recibedc_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maeemp_rp01uid_onblur(oThis, iSeqRow) {
  do_ajax_form_maeemp_mob_validate_rp01uid();
  scCssBlur(oThis);
}

function sc_form_maeemp_rp01uid_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maeemp_rp01fechauid_onblur(oThis, iSeqRow) {
  do_ajax_form_maeemp_mob_validate_rp01fechauid();
  scCssBlur(oThis);
}

function sc_form_maeemp_rp01fechauid_onblur(oThis, iSeqRow) {
  do_ajax_form_maeemp_mob_validate_rp01fechauid();
  scCssBlur(oThis);
}

function sc_form_maeemp_rp01fechauid_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maeemp_rp01fechauid_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maeemp_rp01obs_onblur(oThis, iSeqRow) {
  do_ajax_form_maeemp_mob_validate_rp01obs();
  scCssBlur(oThis);
}

function sc_form_maeemp_rp01obs_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maeemp_rp01cauliq_onblur(oThis, iSeqRow) {
  do_ajax_form_maeemp_mob_validate_rp01cauliq();
  scCssBlur(oThis);
}

function sc_form_maeemp_rp01cauliq_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maeemp_rp01discapacidad_onblur(oThis, iSeqRow) {
  do_ajax_form_maeemp_mob_validate_rp01discapacidad();
  scCssBlur(oThis);
}

function sc_form_maeemp_rp01discapacidad_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maeemp_rp01conadis_onblur(oThis, iSeqRow) {
  do_ajax_form_maeemp_mob_validate_rp01conadis();
  scCssBlur(oThis);
}

function sc_form_maeemp_rp01conadis_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maeemp_rp01tpdiscapacidad_onblur(oThis, iSeqRow) {
  do_ajax_form_maeemp_mob_validate_rp01tpdiscapacidad();
  scCssBlur(oThis);
}

function sc_form_maeemp_rp01tpdiscapacidad_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maeemp_rp01prdiscapacidad_onblur(oThis, iSeqRow) {
  do_ajax_form_maeemp_mob_validate_rp01prdiscapacidad();
  scCssBlur(oThis);
}

function sc_form_maeemp_rp01prdiscapacidad_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maeemp_rp01freserva_onblur(oThis, iSeqRow) {
  do_ajax_form_maeemp_mob_validate_rp01freserva();
  scCssBlur(oThis);
}

function sc_form_maeemp_rp01freserva_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maeemp_rp01codsectorial_onblur(oThis, iSeqRow) {
  do_ajax_form_maeemp_mob_validate_rp01codsectorial();
  scCssBlur(oThis);
}

function sc_form_maeemp_rp01codsectorial_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maeemp_anticipoporvalor_onblur(oThis, iSeqRow) {
  do_ajax_form_maeemp_mob_validate_anticipoporvalor();
  scCssBlur(oThis);
}

function sc_form_maeemp_anticipoporvalor_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maeemp_tipidret_onblur(oThis, iSeqRow) {
  do_ajax_form_maeemp_mob_validate_tipidret();
  scCssBlur(oThis);
}

function sc_form_maeemp_tipidret_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maeemp_residenciatrab_onblur(oThis, iSeqRow) {
  do_ajax_form_maeemp_mob_validate_residenciatrab();
  scCssBlur(oThis);
}

function sc_form_maeemp_residenciatrab_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maeemp_paisresidencia_onblur(oThis, iSeqRow) {
  do_ajax_form_maeemp_mob_validate_paisresidencia();
  scCssBlur(oThis);
}

function sc_form_maeemp_paisresidencia_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maeemp_aplicaconvenio_onblur(oThis, iSeqRow) {
  do_ajax_form_maeemp_mob_validate_aplicaconvenio();
  scCssBlur(oThis);
}

function sc_form_maeemp_aplicaconvenio_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maeemp_tipotrabajdiscap_onblur(oThis, iSeqRow) {
  do_ajax_form_maeemp_mob_validate_tipotrabajdiscap();
  scCssBlur(oThis);
}

function sc_form_maeemp_tipotrabajdiscap_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maeemp_porcentajediscap_onblur(oThis, iSeqRow) {
  do_ajax_form_maeemp_mob_validate_porcentajediscap();
  scCssBlur(oThis);
}

function sc_form_maeemp_porcentajediscap_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maeemp_tipiddiscap_onblur(oThis, iSeqRow) {
  do_ajax_form_maeemp_mob_validate_tipiddiscap();
  scCssBlur(oThis);
}

function sc_form_maeemp_tipiddiscap_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maeemp_iddiscap_onblur(oThis, iSeqRow) {
  do_ajax_form_maeemp_mob_validate_iddiscap();
  scCssBlur(oThis);
}

function sc_form_maeemp_iddiscap_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maeemp_rp01varias_secciones_onblur(oThis, iSeqRow) {
  do_ajax_form_maeemp_mob_validate_rp01varias_secciones();
  scCssBlur(oThis);
}

function sc_form_maeemp_rp01varias_secciones_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maeemp_rp01cc_onblur(oThis, iSeqRow) {
  do_ajax_form_maeemp_mob_validate_rp01cc();
  scCssBlur(oThis);
}

function sc_form_maeemp_rp01cc_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maeemp_rp01observacion_onblur(oThis, iSeqRow) {
  do_ajax_form_maeemp_mob_validate_rp01observacion();
  scCssBlur(oThis);
}

function sc_form_maeemp_rp01observacion_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maeemp_rp01iessconyugue_onblur(oThis, iSeqRow) {
  do_ajax_form_maeemp_mob_validate_rp01iessconyugue();
  scCssBlur(oThis);
}

function sc_form_maeemp_rp01iessconyugue_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maeemp_rp01tiporefrigerio_onblur(oThis, iSeqRow) {
  do_ajax_form_maeemp_mob_validate_rp01tiporefrigerio();
  scCssBlur(oThis);
}

function sc_form_maeemp_rp01tiporefrigerio_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maeemp_idiomas_onblur(oThis, iSeqRow) {
  do_ajax_form_maeemp_mob_validate_idiomas();
  scCssBlur(oThis);
}

function sc_form_maeemp_idiomas_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maeemp_emergencias_onblur(oThis, iSeqRow) {
  do_ajax_form_maeemp_mob_validate_emergencias();
  scCssBlur(oThis);
}

function sc_form_maeemp_emergencias_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maeemp_rp01tipojornada_onblur(oThis, iSeqRow) {
  do_ajax_form_maeemp_mob_validate_rp01tipojornada();
  scCssBlur(oThis);
}

function sc_form_maeemp_rp01tipojornada_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maeemp_rp01numero_horas_onblur(oThis, iSeqRow) {
  do_ajax_form_maeemp_mob_validate_rp01numero_horas();
  scCssBlur(oThis);
}

function sc_form_maeemp_rp01numero_horas_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maeemp_rp01emailpersonal_onblur(oThis, iSeqRow) {
  do_ajax_form_maeemp_mob_validate_rp01emailpersonal();
  scCssBlur(oThis);
}

function sc_form_maeemp_rp01emailpersonal_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maeemp_rp01supervisadopor_onblur(oThis, iSeqRow) {
  do_ajax_form_maeemp_mob_validate_rp01supervisadopor();
  scCssBlur(oThis);
}

function sc_form_maeemp_rp01supervisadopor_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maeemp_rp01zonaderiesgo_onblur(oThis, iSeqRow) {
  do_ajax_form_maeemp_mob_validate_rp01zonaderiesgo();
  scCssBlur(oThis);
}

function sc_form_maeemp_rp01zonaderiesgo_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maeemp_rp01refpersnom1_onblur(oThis, iSeqRow) {
  do_ajax_form_maeemp_mob_validate_rp01refpersnom1();
  scCssBlur(oThis);
}

function sc_form_maeemp_rp01refpersnom1_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maeemp_rp01refpersparen1_onblur(oThis, iSeqRow) {
  do_ajax_form_maeemp_mob_validate_rp01refpersparen1();
  scCssBlur(oThis);
}

function sc_form_maeemp_rp01refpersparen1_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maeemp_rp01refperstel1_onblur(oThis, iSeqRow) {
  do_ajax_form_maeemp_mob_validate_rp01refperstel1();
  scCssBlur(oThis);
}

function sc_form_maeemp_rp01refperstel1_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maeemp_rp01refpersnom2_onblur(oThis, iSeqRow) {
  do_ajax_form_maeemp_mob_validate_rp01refpersnom2();
  scCssBlur(oThis);
}

function sc_form_maeemp_rp01refpersnom2_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maeemp_rp01refpersparen2_onblur(oThis, iSeqRow) {
  do_ajax_form_maeemp_mob_validate_rp01refpersparen2();
  scCssBlur(oThis);
}

function sc_form_maeemp_rp01refpersparen2_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maeemp_rp01refperstel2_onblur(oThis, iSeqRow) {
  do_ajax_form_maeemp_mob_validate_rp01refperstel2();
  scCssBlur(oThis);
}

function sc_form_maeemp_rp01refperstel2_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maeemp_rp01tipovivienda_onblur(oThis, iSeqRow) {
  do_ajax_form_maeemp_mob_validate_rp01tipovivienda();
  scCssBlur(oThis);
}

function sc_form_maeemp_rp01tipovivienda_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maeemp_rp01serviciosbasicos_onblur(oThis, iSeqRow) {
  do_ajax_form_maeemp_mob_validate_rp01serviciosbasicos();
  scCssBlur(oThis);
}

function sc_form_maeemp_rp01serviciosbasicos_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maeemp_rp01viviendadetalle_onblur(oThis, iSeqRow) {
  do_ajax_form_maeemp_mob_validate_rp01viviendadetalle();
  scCssBlur(oThis);
}

function sc_form_maeemp_rp01viviendadetalle_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maeemp_rp01dormitorios_onblur(oThis, iSeqRow) {
  do_ajax_form_maeemp_mob_validate_rp01dormitorios();
  scCssBlur(oThis);
}

function sc_form_maeemp_rp01dormitorios_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maeemp_rp01sala_onblur(oThis, iSeqRow) {
  do_ajax_form_maeemp_mob_validate_rp01sala();
  scCssBlur(oThis);
}

function sc_form_maeemp_rp01sala_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maeemp_rp01comedor_onblur(oThis, iSeqRow) {
  do_ajax_form_maeemp_mob_validate_rp01comedor();
  scCssBlur(oThis);
}

function sc_form_maeemp_rp01comedor_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maeemp_rp01banos_onblur(oThis, iSeqRow) {
  do_ajax_form_maeemp_mob_validate_rp01banos();
  scCssBlur(oThis);
}

function sc_form_maeemp_rp01banos_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maeemp_rp01estudiosrealizados_onblur(oThis, iSeqRow) {
  do_ajax_form_maeemp_mob_validate_rp01estudiosrealizados();
  scCssBlur(oThis);
}

function sc_form_maeemp_rp01estudiosrealizados_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maeemp_rp01ruta1_onblur(oThis, iSeqRow) {
  do_ajax_form_maeemp_mob_validate_rp01ruta1();
  scCssBlur(oThis);
}

function sc_form_maeemp_rp01ruta1_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maeemp_rp01ruta2_onblur(oThis, iSeqRow) {
  do_ajax_form_maeemp_mob_validate_rp01ruta2();
  scCssBlur(oThis);
}

function sc_form_maeemp_rp01ruta2_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maeemp_rp01ruta3_onblur(oThis, iSeqRow) {
  do_ajax_form_maeemp_mob_validate_rp01ruta3();
  scCssBlur(oThis);
}

function sc_form_maeemp_rp01ruta3_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_maeemp_rp01actividadesextras_onblur(oThis, iSeqRow) {
  do_ajax_form_maeemp_mob_validate_rp01actividadesextras();
  scCssBlur(oThis);
}

function sc_form_maeemp_rp01actividadesextras_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function displayChange_block(block, status) {
	if ("0" == block) {
		displayChange_block_0(status);
	}
}

function displayChange_block_0(status) {
	displayChange_field("rp01noemp", "", status);
	displayChange_field("rp01division", "", status);
	displayChange_field("rp01depto", "", status);
	displayChange_field("rp01seccion", "", status);
	displayChange_field("rp01noemp1", "", status);
	displayChange_field("rp01nombreemp", "", status);
	displayChange_field("rp01categoria", "", status);
	displayChange_field("rp01turno", "", status);
	displayChange_field("rp01statusemp", "", status);
	displayChange_field("rp01fechastatus", "", status);
	displayChange_field("rp01causaretiro", "", status);
	displayChange_field("rp01direccion", "", status);
	displayChange_field("rp01telefono", "", status);
	displayChange_field("rp01lugarnacimiento", "", status);
	displayChange_field("rp01fechanacimiento", "", status);
	displayChange_field("rp01nacionalidad", "", status);
	displayChange_field("rp01cedula", "", status);
	displayChange_field("rp01noiess", "", status);
	displayChange_field("rp01sexo", "", status);
	displayChange_field("rp01nolibreta", "", status);
	displayChange_field("rp01profesion", "", status);
	displayChange_field("rp01fechaingreso", "", status);
	displayChange_field("rp01fechareingreso", "", status);
	displayChange_field("rp01cargo", "", status);
	displayChange_field("rp01estadocivil", "", status);
	displayChange_field("rp01rebajaxcasado", "", status);
	displayChange_field("rp01nombreconyuge", "", status);
	displayChange_field("rp01nombrepadre", "", status);
	displayChange_field("rp01nombremadre", "", status);
	displayChange_field("rp01nohijos", "", status);
	displayChange_field("rp01fechahijos0", "", status);
	displayChange_field("rp01sexohijos0", "", status);
	displayChange_field("rp01fechahijos1", "", status);
	displayChange_field("rp01sexohijos1", "", status);
	displayChange_field("rp01fechahijos2", "", status);
	displayChange_field("rp01sexohijos2", "", status);
	displayChange_field("rp01fechahijos3", "", status);
	displayChange_field("rp01sexohijos3", "", status);
	displayChange_field("rp01fechahijos4", "", status);
	displayChange_field("rp01sexohijos4", "", status);
	displayChange_field("rp01fechahijos5", "", status);
	displayChange_field("rp01sexohijos5", "", status);
	displayChange_field("rp01fechahijos6", "", status);
	displayChange_field("rp01sexohijos6", "", status);
	displayChange_field("rp01fechahijos7", "", status);
	displayChange_field("rp01sexohijos7", "", status);
	displayChange_field("rp01fechahijos8", "", status);
	displayChange_field("rp01sexohijos8", "", status);
	displayChange_field("rp01fechahijos9", "", status);
	displayChange_field("rp01sexohijos9", "", status);
	displayChange_field("rp01cargaspadres", "", status);
	displayChange_field("rp01otrascargas", "", status);
	displayChange_field("rp01formapago", "", status);
	displayChange_field("rp01nobancoemp", "", status);
	displayChange_field("rp01ctabancoemp", "", status);
	displayChange_field("rp01tipoctabco", "", status);
	displayChange_field("rp01fechaultvacacion", "", status);
	displayChange_field("rp01aporte", "", status);
	displayChange_field("rp01socio", "", status);
	displayChange_field("rp01transporte", "", status);
	displayChange_field("rp01recibeporc", "", status);
	displayChange_field("rp01sueldoanterior", "", status);
	displayChange_field("rp01sueldosalario", "", status);
	displayChange_field("rp01fecmodsdosal", "", status);
	displayChange_field("rp01fecmodficha", "", status);
	displayChange_field("rp01faltasinjust", "", status);
	displayChange_field("rp01ingresos1er", "", status);
	displayChange_field("rp01basesocialvalor", "", status);
	displayChange_field("rp01basesocialtiempo", "", status);
	displayChange_field("rp0114vopagoacum", "", status);
	displayChange_field("rp0115vopagoacum", "", status);
	displayChange_field("rp01cverrorliq", "", status);
	displayChange_field("rp01porcentliq", "", status);
	displayChange_field("rp01tiposangre", "", status);
	displayChange_field("rp01ingresos2do", "", status);
	displayChange_field("rp01provdiremp", "", status);
	displayChange_field("rp01cantondiremp", "", status);
	displayChange_field("rp01ciudaddiremp", "", status);
	displayChange_field("rp01codocupacion", "", status);
	displayChange_field("uid", "", status);
	displayChange_field("block", "", status);
	displayChange_field("ultimoacceso", "", status);
	displayChange_field("rp01foto", "", status);
	displayChange_field("rp01ctacontable", "", status);
	displayChange_field("rp01email", "", status);
	displayChange_field("rp01passwd", "", status);
	displayChange_field("rp01huella", "", status);
	displayChange_field("rp01recibefr", "", status);
	displayChange_field("rp01recibedt", "", status);
	displayChange_field("rp01recibedc", "", status);
	displayChange_field("rp01uid", "", status);
	displayChange_field("rp01fechauid", "", status);
	displayChange_field("rp01obs", "", status);
	displayChange_field("rp01cauliq", "", status);
	displayChange_field("rp01discapacidad", "", status);
	displayChange_field("rp01conadis", "", status);
	displayChange_field("rp01tpdiscapacidad", "", status);
	displayChange_field("rp01prdiscapacidad", "", status);
	displayChange_field("rp01freserva", "", status);
	displayChange_field("rp01codsectorial", "", status);
	displayChange_field("anticipoporvalor", "", status);
	displayChange_field("tipidret", "", status);
	displayChange_field("residenciatrab", "", status);
	displayChange_field("paisresidencia", "", status);
	displayChange_field("aplicaconvenio", "", status);
	displayChange_field("tipotrabajdiscap", "", status);
	displayChange_field("porcentajediscap", "", status);
	displayChange_field("tipiddiscap", "", status);
	displayChange_field("iddiscap", "", status);
	displayChange_field("rp01varias_secciones", "", status);
	displayChange_field("rp01cc", "", status);
	displayChange_field("rp01observacion", "", status);
	displayChange_field("rp01iessconyugue", "", status);
	displayChange_field("rp01tiporefrigerio", "", status);
	displayChange_field("idiomas", "", status);
	displayChange_field("emergencias", "", status);
	displayChange_field("rp01tipojornada", "", status);
	displayChange_field("rp01numero_horas", "", status);
	displayChange_field("rp01emailpersonal", "", status);
	displayChange_field("rp01supervisadopor", "", status);
	displayChange_field("rp01zonaderiesgo", "", status);
	displayChange_field("rp01refpersnom1", "", status);
	displayChange_field("rp01refpersparen1", "", status);
	displayChange_field("rp01refperstel1", "", status);
	displayChange_field("rp01refpersnom2", "", status);
	displayChange_field("rp01refpersparen2", "", status);
	displayChange_field("rp01refperstel2", "", status);
	displayChange_field("rp01tipovivienda", "", status);
	displayChange_field("rp01serviciosbasicos", "", status);
	displayChange_field("rp01viviendadetalle", "", status);
	displayChange_field("rp01dormitorios", "", status);
	displayChange_field("rp01sala", "", status);
	displayChange_field("rp01comedor", "", status);
	displayChange_field("rp01banos", "", status);
	displayChange_field("rp01estudiosrealizados", "", status);
	displayChange_field("rp01ruta1", "", status);
	displayChange_field("rp01ruta2", "", status);
	displayChange_field("rp01ruta3", "", status);
	displayChange_field("rp01actividadesextras", "", status);
}

function displayChange_row(row, status) {
	displayChange_field_rp01noemp(row, status);
	displayChange_field_rp01division(row, status);
	displayChange_field_rp01depto(row, status);
	displayChange_field_rp01seccion(row, status);
	displayChange_field_rp01noemp1(row, status);
	displayChange_field_rp01nombreemp(row, status);
	displayChange_field_rp01categoria(row, status);
	displayChange_field_rp01turno(row, status);
	displayChange_field_rp01statusemp(row, status);
	displayChange_field_rp01fechastatus(row, status);
	displayChange_field_rp01causaretiro(row, status);
	displayChange_field_rp01direccion(row, status);
	displayChange_field_rp01telefono(row, status);
	displayChange_field_rp01lugarnacimiento(row, status);
	displayChange_field_rp01fechanacimiento(row, status);
	displayChange_field_rp01nacionalidad(row, status);
	displayChange_field_rp01cedula(row, status);
	displayChange_field_rp01noiess(row, status);
	displayChange_field_rp01sexo(row, status);
	displayChange_field_rp01nolibreta(row, status);
	displayChange_field_rp01profesion(row, status);
	displayChange_field_rp01fechaingreso(row, status);
	displayChange_field_rp01fechareingreso(row, status);
	displayChange_field_rp01cargo(row, status);
	displayChange_field_rp01estadocivil(row, status);
	displayChange_field_rp01rebajaxcasado(row, status);
	displayChange_field_rp01nombreconyuge(row, status);
	displayChange_field_rp01nombrepadre(row, status);
	displayChange_field_rp01nombremadre(row, status);
	displayChange_field_rp01nohijos(row, status);
	displayChange_field_rp01fechahijos0(row, status);
	displayChange_field_rp01sexohijos0(row, status);
	displayChange_field_rp01fechahijos1(row, status);
	displayChange_field_rp01sexohijos1(row, status);
	displayChange_field_rp01fechahijos2(row, status);
	displayChange_field_rp01sexohijos2(row, status);
	displayChange_field_rp01fechahijos3(row, status);
	displayChange_field_rp01sexohijos3(row, status);
	displayChange_field_rp01fechahijos4(row, status);
	displayChange_field_rp01sexohijos4(row, status);
	displayChange_field_rp01fechahijos5(row, status);
	displayChange_field_rp01sexohijos5(row, status);
	displayChange_field_rp01fechahijos6(row, status);
	displayChange_field_rp01sexohijos6(row, status);
	displayChange_field_rp01fechahijos7(row, status);
	displayChange_field_rp01sexohijos7(row, status);
	displayChange_field_rp01fechahijos8(row, status);
	displayChange_field_rp01sexohijos8(row, status);
	displayChange_field_rp01fechahijos9(row, status);
	displayChange_field_rp01sexohijos9(row, status);
	displayChange_field_rp01cargaspadres(row, status);
	displayChange_field_rp01otrascargas(row, status);
	displayChange_field_rp01formapago(row, status);
	displayChange_field_rp01nobancoemp(row, status);
	displayChange_field_rp01ctabancoemp(row, status);
	displayChange_field_rp01tipoctabco(row, status);
	displayChange_field_rp01fechaultvacacion(row, status);
	displayChange_field_rp01aporte(row, status);
	displayChange_field_rp01socio(row, status);
	displayChange_field_rp01transporte(row, status);
	displayChange_field_rp01recibeporc(row, status);
	displayChange_field_rp01sueldoanterior(row, status);
	displayChange_field_rp01sueldosalario(row, status);
	displayChange_field_rp01fecmodsdosal(row, status);
	displayChange_field_rp01fecmodficha(row, status);
	displayChange_field_rp01faltasinjust(row, status);
	displayChange_field_rp01ingresos1er(row, status);
	displayChange_field_rp01basesocialvalor(row, status);
	displayChange_field_rp01basesocialtiempo(row, status);
	displayChange_field_rp0114vopagoacum(row, status);
	displayChange_field_rp0115vopagoacum(row, status);
	displayChange_field_rp01cverrorliq(row, status);
	displayChange_field_rp01porcentliq(row, status);
	displayChange_field_rp01tiposangre(row, status);
	displayChange_field_rp01ingresos2do(row, status);
	displayChange_field_rp01provdiremp(row, status);
	displayChange_field_rp01cantondiremp(row, status);
	displayChange_field_rp01ciudaddiremp(row, status);
	displayChange_field_rp01codocupacion(row, status);
	displayChange_field_uid(row, status);
	displayChange_field_block(row, status);
	displayChange_field_ultimoacceso(row, status);
	displayChange_field_rp01foto(row, status);
	displayChange_field_rp01ctacontable(row, status);
	displayChange_field_rp01email(row, status);
	displayChange_field_rp01passwd(row, status);
	displayChange_field_rp01huella(row, status);
	displayChange_field_rp01recibefr(row, status);
	displayChange_field_rp01recibedt(row, status);
	displayChange_field_rp01recibedc(row, status);
	displayChange_field_rp01uid(row, status);
	displayChange_field_rp01fechauid(row, status);
	displayChange_field_rp01obs(row, status);
	displayChange_field_rp01cauliq(row, status);
	displayChange_field_rp01discapacidad(row, status);
	displayChange_field_rp01conadis(row, status);
	displayChange_field_rp01tpdiscapacidad(row, status);
	displayChange_field_rp01prdiscapacidad(row, status);
	displayChange_field_rp01freserva(row, status);
	displayChange_field_rp01codsectorial(row, status);
	displayChange_field_anticipoporvalor(row, status);
	displayChange_field_tipidret(row, status);
	displayChange_field_residenciatrab(row, status);
	displayChange_field_paisresidencia(row, status);
	displayChange_field_aplicaconvenio(row, status);
	displayChange_field_tipotrabajdiscap(row, status);
	displayChange_field_porcentajediscap(row, status);
	displayChange_field_tipiddiscap(row, status);
	displayChange_field_iddiscap(row, status);
	displayChange_field_rp01varias_secciones(row, status);
	displayChange_field_rp01cc(row, status);
	displayChange_field_rp01observacion(row, status);
	displayChange_field_rp01iessconyugue(row, status);
	displayChange_field_rp01tiporefrigerio(row, status);
	displayChange_field_idiomas(row, status);
	displayChange_field_emergencias(row, status);
	displayChange_field_rp01tipojornada(row, status);
	displayChange_field_rp01numero_horas(row, status);
	displayChange_field_rp01emailpersonal(row, status);
	displayChange_field_rp01supervisadopor(row, status);
	displayChange_field_rp01zonaderiesgo(row, status);
	displayChange_field_rp01refpersnom1(row, status);
	displayChange_field_rp01refpersparen1(row, status);
	displayChange_field_rp01refperstel1(row, status);
	displayChange_field_rp01refpersnom2(row, status);
	displayChange_field_rp01refpersparen2(row, status);
	displayChange_field_rp01refperstel2(row, status);
	displayChange_field_rp01tipovivienda(row, status);
	displayChange_field_rp01serviciosbasicos(row, status);
	displayChange_field_rp01viviendadetalle(row, status);
	displayChange_field_rp01dormitorios(row, status);
	displayChange_field_rp01sala(row, status);
	displayChange_field_rp01comedor(row, status);
	displayChange_field_rp01banos(row, status);
	displayChange_field_rp01estudiosrealizados(row, status);
	displayChange_field_rp01ruta1(row, status);
	displayChange_field_rp01ruta2(row, status);
	displayChange_field_rp01ruta3(row, status);
	displayChange_field_rp01actividadesextras(row, status);
}

function displayChange_field(field, row, status) {
	if ("rp01noemp" == field) {
		displayChange_field_rp01noemp(row, status);
	}
	if ("rp01division" == field) {
		displayChange_field_rp01division(row, status);
	}
	if ("rp01depto" == field) {
		displayChange_field_rp01depto(row, status);
	}
	if ("rp01seccion" == field) {
		displayChange_field_rp01seccion(row, status);
	}
	if ("rp01noemp1" == field) {
		displayChange_field_rp01noemp1(row, status);
	}
	if ("rp01nombreemp" == field) {
		displayChange_field_rp01nombreemp(row, status);
	}
	if ("rp01categoria" == field) {
		displayChange_field_rp01categoria(row, status);
	}
	if ("rp01turno" == field) {
		displayChange_field_rp01turno(row, status);
	}
	if ("rp01statusemp" == field) {
		displayChange_field_rp01statusemp(row, status);
	}
	if ("rp01fechastatus" == field) {
		displayChange_field_rp01fechastatus(row, status);
	}
	if ("rp01causaretiro" == field) {
		displayChange_field_rp01causaretiro(row, status);
	}
	if ("rp01direccion" == field) {
		displayChange_field_rp01direccion(row, status);
	}
	if ("rp01telefono" == field) {
		displayChange_field_rp01telefono(row, status);
	}
	if ("rp01lugarnacimiento" == field) {
		displayChange_field_rp01lugarnacimiento(row, status);
	}
	if ("rp01fechanacimiento" == field) {
		displayChange_field_rp01fechanacimiento(row, status);
	}
	if ("rp01nacionalidad" == field) {
		displayChange_field_rp01nacionalidad(row, status);
	}
	if ("rp01cedula" == field) {
		displayChange_field_rp01cedula(row, status);
	}
	if ("rp01noiess" == field) {
		displayChange_field_rp01noiess(row, status);
	}
	if ("rp01sexo" == field) {
		displayChange_field_rp01sexo(row, status);
	}
	if ("rp01nolibreta" == field) {
		displayChange_field_rp01nolibreta(row, status);
	}
	if ("rp01profesion" == field) {
		displayChange_field_rp01profesion(row, status);
	}
	if ("rp01fechaingreso" == field) {
		displayChange_field_rp01fechaingreso(row, status);
	}
	if ("rp01fechareingreso" == field) {
		displayChange_field_rp01fechareingreso(row, status);
	}
	if ("rp01cargo" == field) {
		displayChange_field_rp01cargo(row, status);
	}
	if ("rp01estadocivil" == field) {
		displayChange_field_rp01estadocivil(row, status);
	}
	if ("rp01rebajaxcasado" == field) {
		displayChange_field_rp01rebajaxcasado(row, status);
	}
	if ("rp01nombreconyuge" == field) {
		displayChange_field_rp01nombreconyuge(row, status);
	}
	if ("rp01nombrepadre" == field) {
		displayChange_field_rp01nombrepadre(row, status);
	}
	if ("rp01nombremadre" == field) {
		displayChange_field_rp01nombremadre(row, status);
	}
	if ("rp01nohijos" == field) {
		displayChange_field_rp01nohijos(row, status);
	}
	if ("rp01fechahijos0" == field) {
		displayChange_field_rp01fechahijos0(row, status);
	}
	if ("rp01sexohijos0" == field) {
		displayChange_field_rp01sexohijos0(row, status);
	}
	if ("rp01fechahijos1" == field) {
		displayChange_field_rp01fechahijos1(row, status);
	}
	if ("rp01sexohijos1" == field) {
		displayChange_field_rp01sexohijos1(row, status);
	}
	if ("rp01fechahijos2" == field) {
		displayChange_field_rp01fechahijos2(row, status);
	}
	if ("rp01sexohijos2" == field) {
		displayChange_field_rp01sexohijos2(row, status);
	}
	if ("rp01fechahijos3" == field) {
		displayChange_field_rp01fechahijos3(row, status);
	}
	if ("rp01sexohijos3" == field) {
		displayChange_field_rp01sexohijos3(row, status);
	}
	if ("rp01fechahijos4" == field) {
		displayChange_field_rp01fechahijos4(row, status);
	}
	if ("rp01sexohijos4" == field) {
		displayChange_field_rp01sexohijos4(row, status);
	}
	if ("rp01fechahijos5" == field) {
		displayChange_field_rp01fechahijos5(row, status);
	}
	if ("rp01sexohijos5" == field) {
		displayChange_field_rp01sexohijos5(row, status);
	}
	if ("rp01fechahijos6" == field) {
		displayChange_field_rp01fechahijos6(row, status);
	}
	if ("rp01sexohijos6" == field) {
		displayChange_field_rp01sexohijos6(row, status);
	}
	if ("rp01fechahijos7" == field) {
		displayChange_field_rp01fechahijos7(row, status);
	}
	if ("rp01sexohijos7" == field) {
		displayChange_field_rp01sexohijos7(row, status);
	}
	if ("rp01fechahijos8" == field) {
		displayChange_field_rp01fechahijos8(row, status);
	}
	if ("rp01sexohijos8" == field) {
		displayChange_field_rp01sexohijos8(row, status);
	}
	if ("rp01fechahijos9" == field) {
		displayChange_field_rp01fechahijos9(row, status);
	}
	if ("rp01sexohijos9" == field) {
		displayChange_field_rp01sexohijos9(row, status);
	}
	if ("rp01cargaspadres" == field) {
		displayChange_field_rp01cargaspadres(row, status);
	}
	if ("rp01otrascargas" == field) {
		displayChange_field_rp01otrascargas(row, status);
	}
	if ("rp01formapago" == field) {
		displayChange_field_rp01formapago(row, status);
	}
	if ("rp01nobancoemp" == field) {
		displayChange_field_rp01nobancoemp(row, status);
	}
	if ("rp01ctabancoemp" == field) {
		displayChange_field_rp01ctabancoemp(row, status);
	}
	if ("rp01tipoctabco" == field) {
		displayChange_field_rp01tipoctabco(row, status);
	}
	if ("rp01fechaultvacacion" == field) {
		displayChange_field_rp01fechaultvacacion(row, status);
	}
	if ("rp01aporte" == field) {
		displayChange_field_rp01aporte(row, status);
	}
	if ("rp01socio" == field) {
		displayChange_field_rp01socio(row, status);
	}
	if ("rp01transporte" == field) {
		displayChange_field_rp01transporte(row, status);
	}
	if ("rp01recibeporc" == field) {
		displayChange_field_rp01recibeporc(row, status);
	}
	if ("rp01sueldoanterior" == field) {
		displayChange_field_rp01sueldoanterior(row, status);
	}
	if ("rp01sueldosalario" == field) {
		displayChange_field_rp01sueldosalario(row, status);
	}
	if ("rp01fecmodsdosal" == field) {
		displayChange_field_rp01fecmodsdosal(row, status);
	}
	if ("rp01fecmodficha" == field) {
		displayChange_field_rp01fecmodficha(row, status);
	}
	if ("rp01faltasinjust" == field) {
		displayChange_field_rp01faltasinjust(row, status);
	}
	if ("rp01ingresos1er" == field) {
		displayChange_field_rp01ingresos1er(row, status);
	}
	if ("rp01basesocialvalor" == field) {
		displayChange_field_rp01basesocialvalor(row, status);
	}
	if ("rp01basesocialtiempo" == field) {
		displayChange_field_rp01basesocialtiempo(row, status);
	}
	if ("rp0114vopagoacum" == field) {
		displayChange_field_rp0114vopagoacum(row, status);
	}
	if ("rp0115vopagoacum" == field) {
		displayChange_field_rp0115vopagoacum(row, status);
	}
	if ("rp01cverrorliq" == field) {
		displayChange_field_rp01cverrorliq(row, status);
	}
	if ("rp01porcentliq" == field) {
		displayChange_field_rp01porcentliq(row, status);
	}
	if ("rp01tiposangre" == field) {
		displayChange_field_rp01tiposangre(row, status);
	}
	if ("rp01ingresos2do" == field) {
		displayChange_field_rp01ingresos2do(row, status);
	}
	if ("rp01provdiremp" == field) {
		displayChange_field_rp01provdiremp(row, status);
	}
	if ("rp01cantondiremp" == field) {
		displayChange_field_rp01cantondiremp(row, status);
	}
	if ("rp01ciudaddiremp" == field) {
		displayChange_field_rp01ciudaddiremp(row, status);
	}
	if ("rp01codocupacion" == field) {
		displayChange_field_rp01codocupacion(row, status);
	}
	if ("uid" == field) {
		displayChange_field_uid(row, status);
	}
	if ("block" == field) {
		displayChange_field_block(row, status);
	}
	if ("ultimoacceso" == field) {
		displayChange_field_ultimoacceso(row, status);
	}
	if ("rp01foto" == field) {
		displayChange_field_rp01foto(row, status);
	}
	if ("rp01ctacontable" == field) {
		displayChange_field_rp01ctacontable(row, status);
	}
	if ("rp01email" == field) {
		displayChange_field_rp01email(row, status);
	}
	if ("rp01passwd" == field) {
		displayChange_field_rp01passwd(row, status);
	}
	if ("rp01huella" == field) {
		displayChange_field_rp01huella(row, status);
	}
	if ("rp01recibefr" == field) {
		displayChange_field_rp01recibefr(row, status);
	}
	if ("rp01recibedt" == field) {
		displayChange_field_rp01recibedt(row, status);
	}
	if ("rp01recibedc" == field) {
		displayChange_field_rp01recibedc(row, status);
	}
	if ("rp01uid" == field) {
		displayChange_field_rp01uid(row, status);
	}
	if ("rp01fechauid" == field) {
		displayChange_field_rp01fechauid(row, status);
	}
	if ("rp01obs" == field) {
		displayChange_field_rp01obs(row, status);
	}
	if ("rp01cauliq" == field) {
		displayChange_field_rp01cauliq(row, status);
	}
	if ("rp01discapacidad" == field) {
		displayChange_field_rp01discapacidad(row, status);
	}
	if ("rp01conadis" == field) {
		displayChange_field_rp01conadis(row, status);
	}
	if ("rp01tpdiscapacidad" == field) {
		displayChange_field_rp01tpdiscapacidad(row, status);
	}
	if ("rp01prdiscapacidad" == field) {
		displayChange_field_rp01prdiscapacidad(row, status);
	}
	if ("rp01freserva" == field) {
		displayChange_field_rp01freserva(row, status);
	}
	if ("rp01codsectorial" == field) {
		displayChange_field_rp01codsectorial(row, status);
	}
	if ("anticipoporvalor" == field) {
		displayChange_field_anticipoporvalor(row, status);
	}
	if ("tipidret" == field) {
		displayChange_field_tipidret(row, status);
	}
	if ("residenciatrab" == field) {
		displayChange_field_residenciatrab(row, status);
	}
	if ("paisresidencia" == field) {
		displayChange_field_paisresidencia(row, status);
	}
	if ("aplicaconvenio" == field) {
		displayChange_field_aplicaconvenio(row, status);
	}
	if ("tipotrabajdiscap" == field) {
		displayChange_field_tipotrabajdiscap(row, status);
	}
	if ("porcentajediscap" == field) {
		displayChange_field_porcentajediscap(row, status);
	}
	if ("tipiddiscap" == field) {
		displayChange_field_tipiddiscap(row, status);
	}
	if ("iddiscap" == field) {
		displayChange_field_iddiscap(row, status);
	}
	if ("rp01varias_secciones" == field) {
		displayChange_field_rp01varias_secciones(row, status);
	}
	if ("rp01cc" == field) {
		displayChange_field_rp01cc(row, status);
	}
	if ("rp01observacion" == field) {
		displayChange_field_rp01observacion(row, status);
	}
	if ("rp01iessconyugue" == field) {
		displayChange_field_rp01iessconyugue(row, status);
	}
	if ("rp01tiporefrigerio" == field) {
		displayChange_field_rp01tiporefrigerio(row, status);
	}
	if ("idiomas" == field) {
		displayChange_field_idiomas(row, status);
	}
	if ("emergencias" == field) {
		displayChange_field_emergencias(row, status);
	}
	if ("rp01tipojornada" == field) {
		displayChange_field_rp01tipojornada(row, status);
	}
	if ("rp01numero_horas" == field) {
		displayChange_field_rp01numero_horas(row, status);
	}
	if ("rp01emailpersonal" == field) {
		displayChange_field_rp01emailpersonal(row, status);
	}
	if ("rp01supervisadopor" == field) {
		displayChange_field_rp01supervisadopor(row, status);
	}
	if ("rp01zonaderiesgo" == field) {
		displayChange_field_rp01zonaderiesgo(row, status);
	}
	if ("rp01refpersnom1" == field) {
		displayChange_field_rp01refpersnom1(row, status);
	}
	if ("rp01refpersparen1" == field) {
		displayChange_field_rp01refpersparen1(row, status);
	}
	if ("rp01refperstel1" == field) {
		displayChange_field_rp01refperstel1(row, status);
	}
	if ("rp01refpersnom2" == field) {
		displayChange_field_rp01refpersnom2(row, status);
	}
	if ("rp01refpersparen2" == field) {
		displayChange_field_rp01refpersparen2(row, status);
	}
	if ("rp01refperstel2" == field) {
		displayChange_field_rp01refperstel2(row, status);
	}
	if ("rp01tipovivienda" == field) {
		displayChange_field_rp01tipovivienda(row, status);
	}
	if ("rp01serviciosbasicos" == field) {
		displayChange_field_rp01serviciosbasicos(row, status);
	}
	if ("rp01viviendadetalle" == field) {
		displayChange_field_rp01viviendadetalle(row, status);
	}
	if ("rp01dormitorios" == field) {
		displayChange_field_rp01dormitorios(row, status);
	}
	if ("rp01sala" == field) {
		displayChange_field_rp01sala(row, status);
	}
	if ("rp01comedor" == field) {
		displayChange_field_rp01comedor(row, status);
	}
	if ("rp01banos" == field) {
		displayChange_field_rp01banos(row, status);
	}
	if ("rp01estudiosrealizados" == field) {
		displayChange_field_rp01estudiosrealizados(row, status);
	}
	if ("rp01ruta1" == field) {
		displayChange_field_rp01ruta1(row, status);
	}
	if ("rp01ruta2" == field) {
		displayChange_field_rp01ruta2(row, status);
	}
	if ("rp01ruta3" == field) {
		displayChange_field_rp01ruta3(row, status);
	}
	if ("rp01actividadesextras" == field) {
		displayChange_field_rp01actividadesextras(row, status);
	}
}

function displayChange_field_rp01noemp(row, status) {
    var fieldId;
}

function displayChange_field_rp01division(row, status) {
    var fieldId;
}

function displayChange_field_rp01depto(row, status) {
    var fieldId;
}

function displayChange_field_rp01seccion(row, status) {
    var fieldId;
}

function displayChange_field_rp01noemp1(row, status) {
    var fieldId;
}

function displayChange_field_rp01nombreemp(row, status) {
    var fieldId;
}

function displayChange_field_rp01categoria(row, status) {
    var fieldId;
}

function displayChange_field_rp01turno(row, status) {
    var fieldId;
}

function displayChange_field_rp01statusemp(row, status) {
    var fieldId;
}

function displayChange_field_rp01fechastatus(row, status) {
    var fieldId;
}

function displayChange_field_rp01causaretiro(row, status) {
    var fieldId;
}

function displayChange_field_rp01direccion(row, status) {
    var fieldId;
}

function displayChange_field_rp01telefono(row, status) {
    var fieldId;
}

function displayChange_field_rp01lugarnacimiento(row, status) {
    var fieldId;
}

function displayChange_field_rp01fechanacimiento(row, status) {
    var fieldId;
}

function displayChange_field_rp01nacionalidad(row, status) {
    var fieldId;
}

function displayChange_field_rp01cedula(row, status) {
    var fieldId;
}

function displayChange_field_rp01noiess(row, status) {
    var fieldId;
}

function displayChange_field_rp01sexo(row, status) {
    var fieldId;
}

function displayChange_field_rp01nolibreta(row, status) {
    var fieldId;
}

function displayChange_field_rp01profesion(row, status) {
    var fieldId;
}

function displayChange_field_rp01fechaingreso(row, status) {
    var fieldId;
}

function displayChange_field_rp01fechareingreso(row, status) {
    var fieldId;
}

function displayChange_field_rp01cargo(row, status) {
    var fieldId;
}

function displayChange_field_rp01estadocivil(row, status) {
    var fieldId;
}

function displayChange_field_rp01rebajaxcasado(row, status) {
    var fieldId;
}

function displayChange_field_rp01nombreconyuge(row, status) {
    var fieldId;
}

function displayChange_field_rp01nombrepadre(row, status) {
    var fieldId;
}

function displayChange_field_rp01nombremadre(row, status) {
    var fieldId;
}

function displayChange_field_rp01nohijos(row, status) {
    var fieldId;
}

function displayChange_field_rp01fechahijos0(row, status) {
    var fieldId;
}

function displayChange_field_rp01sexohijos0(row, status) {
    var fieldId;
}

function displayChange_field_rp01fechahijos1(row, status) {
    var fieldId;
}

function displayChange_field_rp01sexohijos1(row, status) {
    var fieldId;
}

function displayChange_field_rp01fechahijos2(row, status) {
    var fieldId;
}

function displayChange_field_rp01sexohijos2(row, status) {
    var fieldId;
}

function displayChange_field_rp01fechahijos3(row, status) {
    var fieldId;
}

function displayChange_field_rp01sexohijos3(row, status) {
    var fieldId;
}

function displayChange_field_rp01fechahijos4(row, status) {
    var fieldId;
}

function displayChange_field_rp01sexohijos4(row, status) {
    var fieldId;
}

function displayChange_field_rp01fechahijos5(row, status) {
    var fieldId;
}

function displayChange_field_rp01sexohijos5(row, status) {
    var fieldId;
}

function displayChange_field_rp01fechahijos6(row, status) {
    var fieldId;
}

function displayChange_field_rp01sexohijos6(row, status) {
    var fieldId;
}

function displayChange_field_rp01fechahijos7(row, status) {
    var fieldId;
}

function displayChange_field_rp01sexohijos7(row, status) {
    var fieldId;
}

function displayChange_field_rp01fechahijos8(row, status) {
    var fieldId;
}

function displayChange_field_rp01sexohijos8(row, status) {
    var fieldId;
}

function displayChange_field_rp01fechahijos9(row, status) {
    var fieldId;
}

function displayChange_field_rp01sexohijos9(row, status) {
    var fieldId;
}

function displayChange_field_rp01cargaspadres(row, status) {
    var fieldId;
}

function displayChange_field_rp01otrascargas(row, status) {
    var fieldId;
}

function displayChange_field_rp01formapago(row, status) {
    var fieldId;
}

function displayChange_field_rp01nobancoemp(row, status) {
    var fieldId;
}

function displayChange_field_rp01ctabancoemp(row, status) {
    var fieldId;
}

function displayChange_field_rp01tipoctabco(row, status) {
    var fieldId;
}

function displayChange_field_rp01fechaultvacacion(row, status) {
    var fieldId;
}

function displayChange_field_rp01aporte(row, status) {
    var fieldId;
}

function displayChange_field_rp01socio(row, status) {
    var fieldId;
}

function displayChange_field_rp01transporte(row, status) {
    var fieldId;
}

function displayChange_field_rp01recibeporc(row, status) {
    var fieldId;
}

function displayChange_field_rp01sueldoanterior(row, status) {
    var fieldId;
}

function displayChange_field_rp01sueldosalario(row, status) {
    var fieldId;
}

function displayChange_field_rp01fecmodsdosal(row, status) {
    var fieldId;
}

function displayChange_field_rp01fecmodficha(row, status) {
    var fieldId;
}

function displayChange_field_rp01faltasinjust(row, status) {
    var fieldId;
}

function displayChange_field_rp01ingresos1er(row, status) {
    var fieldId;
}

function displayChange_field_rp01basesocialvalor(row, status) {
    var fieldId;
}

function displayChange_field_rp01basesocialtiempo(row, status) {
    var fieldId;
}

function displayChange_field_rp0114vopagoacum(row, status) {
    var fieldId;
}

function displayChange_field_rp0115vopagoacum(row, status) {
    var fieldId;
}

function displayChange_field_rp01cverrorliq(row, status) {
    var fieldId;
}

function displayChange_field_rp01porcentliq(row, status) {
    var fieldId;
}

function displayChange_field_rp01tiposangre(row, status) {
    var fieldId;
}

function displayChange_field_rp01ingresos2do(row, status) {
    var fieldId;
}

function displayChange_field_rp01provdiremp(row, status) {
    var fieldId;
}

function displayChange_field_rp01cantondiremp(row, status) {
    var fieldId;
}

function displayChange_field_rp01ciudaddiremp(row, status) {
    var fieldId;
}

function displayChange_field_rp01codocupacion(row, status) {
    var fieldId;
}

function displayChange_field_uid(row, status) {
    var fieldId;
}

function displayChange_field_block(row, status) {
    var fieldId;
}

function displayChange_field_ultimoacceso(row, status) {
    var fieldId;
}

function displayChange_field_rp01foto(row, status) {
    var fieldId;
}

function displayChange_field_rp01ctacontable(row, status) {
    var fieldId;
}

function displayChange_field_rp01email(row, status) {
    var fieldId;
}

function displayChange_field_rp01passwd(row, status) {
    var fieldId;
}

function displayChange_field_rp01huella(row, status) {
    var fieldId;
}

function displayChange_field_rp01recibefr(row, status) {
    var fieldId;
}

function displayChange_field_rp01recibedt(row, status) {
    var fieldId;
}

function displayChange_field_rp01recibedc(row, status) {
    var fieldId;
}

function displayChange_field_rp01uid(row, status) {
    var fieldId;
}

function displayChange_field_rp01fechauid(row, status) {
    var fieldId;
}

function displayChange_field_rp01obs(row, status) {
    var fieldId;
}

function displayChange_field_rp01cauliq(row, status) {
    var fieldId;
}

function displayChange_field_rp01discapacidad(row, status) {
    var fieldId;
}

function displayChange_field_rp01conadis(row, status) {
    var fieldId;
}

function displayChange_field_rp01tpdiscapacidad(row, status) {
    var fieldId;
}

function displayChange_field_rp01prdiscapacidad(row, status) {
    var fieldId;
}

function displayChange_field_rp01freserva(row, status) {
    var fieldId;
}

function displayChange_field_rp01codsectorial(row, status) {
    var fieldId;
}

function displayChange_field_anticipoporvalor(row, status) {
    var fieldId;
}

function displayChange_field_tipidret(row, status) {
    var fieldId;
}

function displayChange_field_residenciatrab(row, status) {
    var fieldId;
}

function displayChange_field_paisresidencia(row, status) {
    var fieldId;
}

function displayChange_field_aplicaconvenio(row, status) {
    var fieldId;
}

function displayChange_field_tipotrabajdiscap(row, status) {
    var fieldId;
}

function displayChange_field_porcentajediscap(row, status) {
    var fieldId;
}

function displayChange_field_tipiddiscap(row, status) {
    var fieldId;
}

function displayChange_field_iddiscap(row, status) {
    var fieldId;
}

function displayChange_field_rp01varias_secciones(row, status) {
    var fieldId;
}

function displayChange_field_rp01cc(row, status) {
    var fieldId;
}

function displayChange_field_rp01observacion(row, status) {
    var fieldId;
}

function displayChange_field_rp01iessconyugue(row, status) {
    var fieldId;
}

function displayChange_field_rp01tiporefrigerio(row, status) {
    var fieldId;
}

function displayChange_field_idiomas(row, status) {
    var fieldId;
}

function displayChange_field_emergencias(row, status) {
    var fieldId;
}

function displayChange_field_rp01tipojornada(row, status) {
    var fieldId;
}

function displayChange_field_rp01numero_horas(row, status) {
    var fieldId;
}

function displayChange_field_rp01emailpersonal(row, status) {
    var fieldId;
}

function displayChange_field_rp01supervisadopor(row, status) {
    var fieldId;
}

function displayChange_field_rp01zonaderiesgo(row, status) {
    var fieldId;
}

function displayChange_field_rp01refpersnom1(row, status) {
    var fieldId;
}

function displayChange_field_rp01refpersparen1(row, status) {
    var fieldId;
}

function displayChange_field_rp01refperstel1(row, status) {
    var fieldId;
}

function displayChange_field_rp01refpersnom2(row, status) {
    var fieldId;
}

function displayChange_field_rp01refpersparen2(row, status) {
    var fieldId;
}

function displayChange_field_rp01refperstel2(row, status) {
    var fieldId;
}

function displayChange_field_rp01tipovivienda(row, status) {
    var fieldId;
}

function displayChange_field_rp01serviciosbasicos(row, status) {
    var fieldId;
}

function displayChange_field_rp01viviendadetalle(row, status) {
    var fieldId;
}

function displayChange_field_rp01dormitorios(row, status) {
    var fieldId;
}

function displayChange_field_rp01sala(row, status) {
    var fieldId;
}

function displayChange_field_rp01comedor(row, status) {
    var fieldId;
}

function displayChange_field_rp01banos(row, status) {
    var fieldId;
}

function displayChange_field_rp01estudiosrealizados(row, status) {
    var fieldId;
}

function displayChange_field_rp01ruta1(row, status) {
    var fieldId;
}

function displayChange_field_rp01ruta2(row, status) {
    var fieldId;
}

function displayChange_field_rp01ruta3(row, status) {
    var fieldId;
}

function displayChange_field_rp01actividadesextras(row, status) {
    var fieldId;
}

function scRecreateSelect2() {
}
function scResetPagesDisplay() {
	$(".sc-form-page").show();
}

function scHidePage(pageNo) {
	$("#id_form_maeemp_mob_form" + pageNo).hide();
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
  $("#id_sc_field_rp01fechastatus" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_rp01fechastatus" + iSeqRow] = $oField.val();
    },
    onClose: function(dateText, inst) {
      do_ajax_form_maeemp_mob_validate_rp01fechastatus(iSeqRow);
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
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', $_SESSION['scriptcase']['reg_conf']['date_sep']), array('', 'yyyy', ''), $this->field_config['rp01fechastatus']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
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
  $("#id_sc_field_rp01fechanacimiento" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_rp01fechanacimiento" + iSeqRow] = $oField.val();
    },
    onClose: function(dateText, inst) {
      do_ajax_form_maeemp_mob_validate_rp01fechanacimiento(iSeqRow);
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
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', $_SESSION['scriptcase']['reg_conf']['date_sep']), array('', 'yyyy', ''), $this->field_config['rp01fechanacimiento']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
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
  $("#id_sc_field_rp01fechaingreso" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_rp01fechaingreso" + iSeqRow] = $oField.val();
    },
    onClose: function(dateText, inst) {
      do_ajax_form_maeemp_mob_validate_rp01fechaingreso(iSeqRow);
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
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', $_SESSION['scriptcase']['reg_conf']['date_sep']), array('', 'yyyy', ''), $this->field_config['rp01fechaingreso']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
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
  $("#id_sc_field_rp01fechareingreso" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_rp01fechareingreso" + iSeqRow] = $oField.val();
    },
    onClose: function(dateText, inst) {
      do_ajax_form_maeemp_mob_validate_rp01fechareingreso(iSeqRow);
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
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', $_SESSION['scriptcase']['reg_conf']['date_sep']), array('', 'yyyy', ''), $this->field_config['rp01fechareingreso']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
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
  $("#id_sc_field_rp01fechahijos0" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_rp01fechahijos0" + iSeqRow] = $oField.val();
    },
    onClose: function(dateText, inst) {
      do_ajax_form_maeemp_mob_validate_rp01fechahijos0(iSeqRow);
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
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', $_SESSION['scriptcase']['reg_conf']['date_sep']), array('', 'yyyy', ''), $this->field_config['rp01fechahijos0']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
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
  $("#id_sc_field_rp01fechahijos1" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_rp01fechahijos1" + iSeqRow] = $oField.val();
    },
    onClose: function(dateText, inst) {
      do_ajax_form_maeemp_mob_validate_rp01fechahijos1(iSeqRow);
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
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', $_SESSION['scriptcase']['reg_conf']['date_sep']), array('', 'yyyy', ''), $this->field_config['rp01fechahijos1']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
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
  $("#id_sc_field_rp01fechahijos2" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_rp01fechahijos2" + iSeqRow] = $oField.val();
    },
    onClose: function(dateText, inst) {
      do_ajax_form_maeemp_mob_validate_rp01fechahijos2(iSeqRow);
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
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', $_SESSION['scriptcase']['reg_conf']['date_sep']), array('', 'yyyy', ''), $this->field_config['rp01fechahijos2']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
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
  $("#id_sc_field_rp01fechahijos3" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_rp01fechahijos3" + iSeqRow] = $oField.val();
    },
    onClose: function(dateText, inst) {
      do_ajax_form_maeemp_mob_validate_rp01fechahijos3(iSeqRow);
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
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', $_SESSION['scriptcase']['reg_conf']['date_sep']), array('', 'yyyy', ''), $this->field_config['rp01fechahijos3']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
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
  $("#id_sc_field_rp01fechahijos4" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_rp01fechahijos4" + iSeqRow] = $oField.val();
    },
    onClose: function(dateText, inst) {
      do_ajax_form_maeemp_mob_validate_rp01fechahijos4(iSeqRow);
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
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', $_SESSION['scriptcase']['reg_conf']['date_sep']), array('', 'yyyy', ''), $this->field_config['rp01fechahijos4']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
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
  $("#id_sc_field_rp01fechahijos5" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_rp01fechahijos5" + iSeqRow] = $oField.val();
    },
    onClose: function(dateText, inst) {
      do_ajax_form_maeemp_mob_validate_rp01fechahijos5(iSeqRow);
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
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', $_SESSION['scriptcase']['reg_conf']['date_sep']), array('', 'yyyy', ''), $this->field_config['rp01fechahijos5']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
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
  $("#id_sc_field_rp01fechahijos6" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_rp01fechahijos6" + iSeqRow] = $oField.val();
    },
    onClose: function(dateText, inst) {
      do_ajax_form_maeemp_mob_validate_rp01fechahijos6(iSeqRow);
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
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', $_SESSION['scriptcase']['reg_conf']['date_sep']), array('', 'yyyy', ''), $this->field_config['rp01fechahijos6']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
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
  $("#id_sc_field_rp01fechahijos7" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_rp01fechahijos7" + iSeqRow] = $oField.val();
    },
    onClose: function(dateText, inst) {
      do_ajax_form_maeemp_mob_validate_rp01fechahijos7(iSeqRow);
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
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', $_SESSION['scriptcase']['reg_conf']['date_sep']), array('', 'yyyy', ''), $this->field_config['rp01fechahijos7']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
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
  $("#id_sc_field_rp01fechahijos8" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_rp01fechahijos8" + iSeqRow] = $oField.val();
    },
    onClose: function(dateText, inst) {
      do_ajax_form_maeemp_mob_validate_rp01fechahijos8(iSeqRow);
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
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', $_SESSION['scriptcase']['reg_conf']['date_sep']), array('', 'yyyy', ''), $this->field_config['rp01fechahijos8']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
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
  $("#id_sc_field_rp01fechahijos9" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_rp01fechahijos9" + iSeqRow] = $oField.val();
    },
    onClose: function(dateText, inst) {
      do_ajax_form_maeemp_mob_validate_rp01fechahijos9(iSeqRow);
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
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', $_SESSION['scriptcase']['reg_conf']['date_sep']), array('', 'yyyy', ''), $this->field_config['rp01fechahijos9']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
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
  $("#id_sc_field_rp01fechaultvacacion" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_rp01fechaultvacacion" + iSeqRow] = $oField.val();
    },
    onClose: function(dateText, inst) {
      do_ajax_form_maeemp_mob_validate_rp01fechaultvacacion(iSeqRow);
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
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', $_SESSION['scriptcase']['reg_conf']['date_sep']), array('', 'yyyy', ''), $this->field_config['rp01fechaultvacacion']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
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
  $("#id_sc_field_rp01fecmodsdosal" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_rp01fecmodsdosal" + iSeqRow] = $oField.val();
    },
    onClose: function(dateText, inst) {
      do_ajax_form_maeemp_mob_validate_rp01fecmodsdosal(iSeqRow);
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
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', $_SESSION['scriptcase']['reg_conf']['date_sep']), array('', 'yyyy', ''), $this->field_config['rp01fecmodsdosal']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
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
  $("#id_sc_field_rp01fecmodficha" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_rp01fecmodficha" + iSeqRow] = $oField.val();
    },
    onClose: function(dateText, inst) {
      do_ajax_form_maeemp_mob_validate_rp01fecmodficha(iSeqRow);
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
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', $_SESSION['scriptcase']['reg_conf']['date_sep']), array('', 'yyyy', ''), $this->field_config['rp01fecmodficha']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
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
  $("#id_sc_field_rp01fechauid" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_rp01fechauid" + iSeqRow] = $oField.val();
      if (2 == aParts.length) {
        sTime = " " + aParts[1];
      }
      if ('' == sTime || ' ' == sTime) {
        sTime = ' <?php echo $this->jqueryCalendarTimeStart($this->field_config['rp01fechauid']['date_format']); ?>';
      }
      $oField.datepicker("option", "dateFormat", "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', 'hh', 'ii', 'ss', ':', ';', $_SESSION['scriptcase']['reg_conf']['date_sep'], $_SESSION['scriptcase']['reg_conf']['time_sep']), array('', 'yyyy', '','','', '', '', '', ''), $this->field_config['rp01fechauid']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>" + sTime);
    },
    onClose: function(dateText, inst) {
      do_ajax_form_maeemp_mob_validate_rp01fechauid(iSeqRow);
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
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', 'hh', 'ii', 'ss', ':', ';', $_SESSION['scriptcase']['reg_conf']['date_sep'], $_SESSION['scriptcase']['reg_conf']['time_sep']), array('', 'yyyy', '','','', '', '', '', ''), $this->field_config['rp01fechauid']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
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
                         $(t).html("<a href=\"javascript:nm_mostra_doc('0', '"+rs2+"', 'form_maeemp_mob')\">"+$('#id_read_on_'+field+iSeqRow).text()+"</a>");
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

