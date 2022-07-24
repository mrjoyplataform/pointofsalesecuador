
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

  if ($oField.length > 0) {
    switch ($oField[0].name) {
      case 'idcustomer':
      case 'nombre':
      case 'correo':
      case 'celular':
      case 'cliente_tipo':
        sc_exib_ocult_pag('form_customer_clubmrjoy_form0');
        break;
      case 'provincia':
      case 'canton':
      case 'parroquia':
      case 'direccion':
      case 'sector':
        sc_exib_ocult_pag('form_customer_clubmrjoy_form1');
        break;
      case 'family':
        sc_exib_ocult_pag('form_customer_clubmrjoy_form2');
        break;
    }
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
  scEventControl_data["idcustomer" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["nombre" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["correo" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["celular" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["cliente_tipo" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["provincia" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["canton" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["parroquia" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["direccion" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["sector" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["family" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["idcustomer" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["idcustomer" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["nombre" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["nombre" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["correo" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["correo" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["celular" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["celular" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["cliente_tipo" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["cliente_tipo" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["provincia" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["provincia" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["canton" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["canton" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["parroquia" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["parroquia" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["direccion" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["direccion" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["sector" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["sector" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["family" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["family" + iSeqRow]["change"]) {
    return true;
  }
  return false;
} // scEventControl_active

function scEventControl_onFocus(oField, iSeq) {
  var fieldId, fieldName;
  fieldId = $(oField).attr("id");
  fieldName = fieldId.substr(12);
  scEventControl_data[fieldName]["blur"] = true;
  if ("cliente_tipo" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("provincia" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("canton" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("parroquia" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("local_centro" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("pais" + iSeq == fieldName) {
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
  $('#id_sc_field_idcustomer' + iSeqRow).bind('blur', function() { sc_form_customer_clubmrjoy_idcustomer_onblur(this, iSeqRow) })
                                        .bind('change', function() { sc_form_customer_clubmrjoy_idcustomer_onchange(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_customer_clubmrjoy_idcustomer_onfocus(this, iSeqRow) });
  $('#id_sc_field_nombre' + iSeqRow).bind('blur', function() { sc_form_customer_clubmrjoy_nombre_onblur(this, iSeqRow) })
                                    .bind('change', function() { sc_form_customer_clubmrjoy_nombre_onchange(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_customer_clubmrjoy_nombre_onfocus(this, iSeqRow) });
  $('#id_sc_field_correo' + iSeqRow).bind('blur', function() { sc_form_customer_clubmrjoy_correo_onblur(this, iSeqRow) })
                                    .bind('change', function() { sc_form_customer_clubmrjoy_correo_onchange(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_customer_clubmrjoy_correo_onfocus(this, iSeqRow) });
  $('#id_sc_field_celular' + iSeqRow).bind('blur', function() { sc_form_customer_clubmrjoy_celular_onblur(this, iSeqRow) })
                                     .bind('change', function() { sc_form_customer_clubmrjoy_celular_onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_customer_clubmrjoy_celular_onfocus(this, iSeqRow) });
  $('#id_sc_field_idinterno' + iSeqRow).bind('change', function() { sc_form_customer_clubmrjoy_idinterno_onchange(this, iSeqRow) });
  $('#id_sc_field_direccion' + iSeqRow).bind('blur', function() { sc_form_customer_clubmrjoy_direccion_onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_form_customer_clubmrjoy_direccion_onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_customer_clubmrjoy_direccion_onfocus(this, iSeqRow) });
  $('#id_sc_field_tipodoc' + iSeqRow).bind('change', function() { sc_form_customer_clubmrjoy_tipodoc_onchange(this, iSeqRow) });
  $('#id_sc_field_ult_fecha' + iSeqRow).bind('change', function() { sc_form_customer_clubmrjoy_ult_fecha_onchange(this, iSeqRow) });
  $('#id_sc_field_ult_fecha_hora' + iSeqRow).bind('change', function() { sc_form_customer_clubmrjoy_ult_fecha_hora_onchange(this, iSeqRow) });
  $('#id_sc_field_local_centro' + iSeqRow).bind('change', function() { sc_form_customer_clubmrjoy_local_centro_onchange(this, iSeqRow) });
  $('#id_sc_field_cliente_tipo' + iSeqRow).bind('blur', function() { sc_form_customer_clubmrjoy_cliente_tipo_onblur(this, iSeqRow) })
                                          .bind('change', function() { sc_form_customer_clubmrjoy_cliente_tipo_onchange(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_customer_clubmrjoy_cliente_tipo_onfocus(this, iSeqRow) });
  $('#id_sc_field_afiliado_desde' + iSeqRow).bind('change', function() { sc_form_customer_clubmrjoy_afiliado_desde_onchange(this, iSeqRow) });
  $('#id_sc_field_sector' + iSeqRow).bind('blur', function() { sc_form_customer_clubmrjoy_sector_onblur(this, iSeqRow) })
                                    .bind('change', function() { sc_form_customer_clubmrjoy_sector_onchange(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_customer_clubmrjoy_sector_onfocus(this, iSeqRow) });
  $('#id_sc_field_estado' + iSeqRow).bind('change', function() { sc_form_customer_clubmrjoy_estado_onchange(this, iSeqRow) });
  $('#id_sc_field_uniqueid' + iSeqRow).bind('change', function() { sc_form_customer_clubmrjoy_uniqueid_onchange(this, iSeqRow) });
  $('#id_sc_field_ciudad' + iSeqRow).bind('change', function() { sc_form_customer_clubmrjoy_ciudad_onchange(this, iSeqRow) });
  $('#id_sc_field_pais' + iSeqRow).bind('change', function() { sc_form_customer_clubmrjoy_pais_onchange(this, iSeqRow) });
  $('#id_sc_field_provincia' + iSeqRow).bind('blur', function() { sc_form_customer_clubmrjoy_provincia_onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_form_customer_clubmrjoy_provincia_onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_customer_clubmrjoy_provincia_onfocus(this, iSeqRow) });
  $('#id_sc_field_canton' + iSeqRow).bind('blur', function() { sc_form_customer_clubmrjoy_canton_onblur(this, iSeqRow) })
                                    .bind('change', function() { sc_form_customer_clubmrjoy_canton_onchange(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_customer_clubmrjoy_canton_onfocus(this, iSeqRow) });
  $('#id_sc_field_parroquia' + iSeqRow).bind('blur', function() { sc_form_customer_clubmrjoy_parroquia_onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_form_customer_clubmrjoy_parroquia_onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_customer_clubmrjoy_parroquia_onfocus(this, iSeqRow) });
  $('#id_sc_field_family' + iSeqRow).bind('blur', function() { sc_form_customer_clubmrjoy_family_onblur(this, iSeqRow) })
                                    .bind('change', function() { sc_form_customer_clubmrjoy_family_onchange(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_customer_clubmrjoy_family_onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_customer_clubmrjoy_idcustomer_onblur(oThis, iSeqRow) {
  do_ajax_form_customer_clubmrjoy_validate_idcustomer();
  scCssBlur(oThis);
}

function sc_form_customer_clubmrjoy_idcustomer_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_customer_clubmrjoy_idcustomer_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_customer_clubmrjoy_nombre_onblur(oThis, iSeqRow) {
  do_ajax_form_customer_clubmrjoy_validate_nombre();
  scCssBlur(oThis);
}

function sc_form_customer_clubmrjoy_nombre_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_customer_clubmrjoy_nombre_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_customer_clubmrjoy_correo_onblur(oThis, iSeqRow) {
  do_ajax_form_customer_clubmrjoy_validate_correo();
  scCssBlur(oThis);
}

function sc_form_customer_clubmrjoy_correo_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_customer_clubmrjoy_correo_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_customer_clubmrjoy_celular_onblur(oThis, iSeqRow) {
  do_ajax_form_customer_clubmrjoy_validate_celular();
  scCssBlur(oThis);
}

function sc_form_customer_clubmrjoy_celular_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_customer_clubmrjoy_celular_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_customer_clubmrjoy_idinterno_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_customer_clubmrjoy_direccion_onblur(oThis, iSeqRow) {
  do_ajax_form_customer_clubmrjoy_validate_direccion();
  scCssBlur(oThis);
}

function sc_form_customer_clubmrjoy_direccion_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_customer_clubmrjoy_direccion_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_customer_clubmrjoy_tipodoc_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_customer_clubmrjoy_ult_fecha_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_customer_clubmrjoy_ult_fecha_hora_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_customer_clubmrjoy_local_centro_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_customer_clubmrjoy_cliente_tipo_onblur(oThis, iSeqRow) {
  do_ajax_form_customer_clubmrjoy_validate_cliente_tipo();
  scCssBlur(oThis);
}

function sc_form_customer_clubmrjoy_cliente_tipo_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_customer_clubmrjoy_cliente_tipo_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_customer_clubmrjoy_afiliado_desde_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_customer_clubmrjoy_sector_onblur(oThis, iSeqRow) {
  do_ajax_form_customer_clubmrjoy_validate_sector();
  scCssBlur(oThis);
}

function sc_form_customer_clubmrjoy_sector_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_customer_clubmrjoy_sector_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_customer_clubmrjoy_estado_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_customer_clubmrjoy_uniqueid_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_customer_clubmrjoy_ciudad_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_customer_clubmrjoy_pais_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_customer_clubmrjoy_provincia_onblur(oThis, iSeqRow) {
  do_ajax_form_customer_clubmrjoy_validate_provincia();
  scCssBlur(oThis);
}

function sc_form_customer_clubmrjoy_provincia_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  do_ajax_form_customer_clubmrjoy_refresh_provincia();
}

function sc_form_customer_clubmrjoy_provincia_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_customer_clubmrjoy_canton_onblur(oThis, iSeqRow) {
  do_ajax_form_customer_clubmrjoy_validate_canton();
  scCssBlur(oThis);
}

function sc_form_customer_clubmrjoy_canton_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  do_ajax_form_customer_clubmrjoy_refresh_canton();
}

function sc_form_customer_clubmrjoy_canton_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_customer_clubmrjoy_parroquia_onblur(oThis, iSeqRow) {
  do_ajax_form_customer_clubmrjoy_validate_parroquia();
  scCssBlur(oThis);
}

function sc_form_customer_clubmrjoy_parroquia_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_customer_clubmrjoy_parroquia_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_customer_clubmrjoy_family_onblur(oThis, iSeqRow) {
  do_ajax_form_customer_clubmrjoy_validate_family();
  scCssBlur(oThis);
}

function sc_form_customer_clubmrjoy_family_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_customer_clubmrjoy_family_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function displayChange_page(page, status) {
	if ("0" == page) {
		displayChange_page_0(status);
	}
	if ("1" == page) {
		displayChange_page_1(status);
	}
	if ("2" == page) {
		displayChange_page_2(status);
	}
}

function displayChange_page_0(status) {
	displayChange_block("0", status);
}

function displayChange_page_1(status) {
	displayChange_block("1", status);
}

function displayChange_page_2(status) {
	displayChange_block("2", status);
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
	displayChange_field("idcustomer", "", status);
	displayChange_field("nombre", "", status);
	displayChange_field("correo", "", status);
	displayChange_field("celular", "", status);
	displayChange_field("cliente_tipo", "", status);
}

function displayChange_block_1(status) {
	displayChange_field("provincia", "", status);
	displayChange_field("canton", "", status);
	displayChange_field("parroquia", "", status);
	displayChange_field("direccion", "", status);
	displayChange_field("sector", "", status);
}

function displayChange_block_2(status) {
	displayChange_field("family", "", status);
}

function displayChange_row(row, status) {
	displayChange_field_idcustomer(row, status);
	displayChange_field_nombre(row, status);
	displayChange_field_correo(row, status);
	displayChange_field_celular(row, status);
	displayChange_field_cliente_tipo(row, status);
	displayChange_field_provincia(row, status);
	displayChange_field_canton(row, status);
	displayChange_field_parroquia(row, status);
	displayChange_field_direccion(row, status);
	displayChange_field_sector(row, status);
	displayChange_field_family(row, status);
}

function displayChange_field(field, row, status) {
	if ("idcustomer" == field) {
		displayChange_field_idcustomer(row, status);
	}
	if ("nombre" == field) {
		displayChange_field_nombre(row, status);
	}
	if ("correo" == field) {
		displayChange_field_correo(row, status);
	}
	if ("celular" == field) {
		displayChange_field_celular(row, status);
	}
	if ("cliente_tipo" == field) {
		displayChange_field_cliente_tipo(row, status);
	}
	if ("provincia" == field) {
		displayChange_field_provincia(row, status);
	}
	if ("canton" == field) {
		displayChange_field_canton(row, status);
	}
	if ("parroquia" == field) {
		displayChange_field_parroquia(row, status);
	}
	if ("direccion" == field) {
		displayChange_field_direccion(row, status);
	}
	if ("sector" == field) {
		displayChange_field_sector(row, status);
	}
	if ("family" == field) {
		displayChange_field_family(row, status);
	}
}

function displayChange_field_idcustomer(row, status) {
    var fieldId;
}

function displayChange_field_nombre(row, status) {
    var fieldId;
}

function displayChange_field_correo(row, status) {
    var fieldId;
}

function displayChange_field_celular(row, status) {
    var fieldId;
}

function displayChange_field_cliente_tipo(row, status) {
    var fieldId;
}

function displayChange_field_provincia(row, status) {
    var fieldId;
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_provincia__obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_provincia" + row).select2("destroy");
		}
		scJQSelect2Add(row, "provincia");
	}
}

function displayChange_field_canton(row, status) {
    var fieldId;
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_canton__obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_canton" + row).select2("destroy");
		}
		scJQSelect2Add(row, "canton");
	}
}

function displayChange_field_parroquia(row, status) {
    var fieldId;
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_parroquia__obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_parroquia" + row).select2("destroy");
		}
		scJQSelect2Add(row, "parroquia");
	}
}

function displayChange_field_direccion(row, status) {
    var fieldId;
}

function displayChange_field_sector(row, status) {
    var fieldId;
}

function displayChange_field_family(row, status) {
    var fieldId;
	if ("on" == status && typeof $("#nmsc_iframe_liga_form_customer_family")[0].contentWindow.scRecreateSelect2 === "function") {
		$("#nmsc_iframe_liga_form_customer_family")[0].contentWindow.scRecreateSelect2();
	}
}

function scRecreateSelect2() {
	displayChange_field_provincia("all", "on");
	displayChange_field_canton("all", "on");
	displayChange_field_parroquia("all", "on");
}
function scResetPagesDisplay() {
	$(".sc-form-page").show();
}

function scHidePage(pageNo) {
	$("#id_form_customer_clubmrjoy_form" + pageNo).hide();
}

function scCheckNoPageSelected() {
	if (!$(".sc-form-page").filter(".scTabActive").filter(":visible").length) {
		var inactiveTabs = $(".sc-form-page").filter(".scTabInactive").filter(":visible");
		if (inactiveTabs.length) {
			var tabNo = $(inactiveTabs[0]).attr("id").substr(31);
		}
	}
}
var sc_jq_calendar_value = {};

function scJQCalendarAdd(iSeqRow) {
  $("#id_sc_field_ult_fecha" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_ult_fecha" + iSeqRow] = $oField.val();
      if (2 == aParts.length) {
        sTime = " " + aParts[1];
      }
      if ('' == sTime || ' ' == sTime) {
        sTime = ' <?php echo $this->jqueryCalendarTimeStart($this->field_config['ult_fecha']['date_format']); ?>';
      }
      $oField.datepicker("option", "dateFormat", "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', 'hh', 'ii', 'ss', ':', ';', $_SESSION['scriptcase']['reg_conf']['date_sep'], $_SESSION['scriptcase']['reg_conf']['time_sep']), array('', 'yyyy', '','','', '', '', '', ''), $this->field_config['ult_fecha']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>" + sTime);
    },
    onClose: function(dateText, inst) {
      do_ajax_form_customer_clubmrjoy_validate_ult_fecha(iSeqRow);
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
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', 'hh', 'ii', 'ss', ':', ';', $_SESSION['scriptcase']['reg_conf']['date_sep'], $_SESSION['scriptcase']['reg_conf']['time_sep']), array('', 'yyyy', '','','', '', '', '', ''), $this->field_config['ult_fecha']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
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
  $("#id_sc_field_afiliado_desde" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_afiliado_desde" + iSeqRow] = $oField.val();
    },
    onClose: function(dateText, inst) {
      do_ajax_form_customer_clubmrjoy_validate_afiliado_desde(iSeqRow);
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
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', $_SESSION['scriptcase']['reg_conf']['date_sep']), array('', 'yyyy', ''), $this->field_config['afiliado_desde']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
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
                         $(t).html("<a href=\"javascript:nm_mostra_doc('0', '"+rs2+"', 'form_customer_clubmrjoy')\">"+$('#id_read_on_'+field+iSeqRow).text()+"</a>");
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
  if (null == specificField || "provincia" == specificField) {
    scJQSelect2Add_provincia(seqRow);
  }
  if (null == specificField || "canton" == specificField) {
    scJQSelect2Add_canton(seqRow);
  }
  if (null == specificField || "parroquia" == specificField) {
    scJQSelect2Add_parroquia(seqRow);
  }
  if (null == specificField || "pais" == specificField) {
    scJQSelect2Add_pais(seqRow);
  }
} // scJQSelect2Add

function scJQSelect2Add_provincia(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_provincia_obj" : "#id_sc_field_provincia" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_provincia_obj',
      dropdownCssClass: 'css_provincia_obj',
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

function scJQSelect2Add_canton(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_canton_obj" : "#id_sc_field_canton" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_canton_obj',
      dropdownCssClass: 'css_canton_obj',
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

function scJQSelect2Add_parroquia(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_parroquia_obj" : "#id_sc_field_parroquia" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_parroquia_obj',
      dropdownCssClass: 'css_parroquia_obj',
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

function scJQSelect2Add_pais(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_pais_obj" : "#id_sc_field_pais" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_pais_obj',
      dropdownCssClass: 'css_pais_obj',
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
  setTimeout(function () { if ('function' == typeof displayChange_field_provincia) { displayChange_field_provincia(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_canton) { displayChange_field_canton(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_parroquia) { displayChange_field_parroquia(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_pais) { displayChange_field_pais(iLine, "on"); } }, 150);
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

