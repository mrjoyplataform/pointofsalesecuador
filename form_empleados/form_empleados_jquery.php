
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
  scEventControl_data["idempleado" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["nombre" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["activo" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["cargo" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["menu_default" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["admin" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["idempleado" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["idempleado" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["nombre" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["nombre" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["activo" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["activo" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["cargo" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["cargo" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["menu_default" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["menu_default" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["admin" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["admin" + iSeqRow]["change"]) {
    return true;
  }
  return false;
} // scEventControl_active

function scEventControl_onFocus(oField, iSeq) {
  var fieldId, fieldName;
  fieldId = $(oField).attr("id");
  fieldName = fieldId.substr(12);
  scEventControl_data[fieldName]["blur"] = true;
  if ("menu_default" + iSeq == fieldName) {
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
  $('#id_sc_field_idempleado' + iSeqRow).bind('blur', function() { sc_form_empleados_idempleado_onblur(this, iSeqRow) })
                                        .bind('change', function() { sc_form_empleados_idempleado_onchange(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_empleados_idempleado_onfocus(this, iSeqRow) });
  $('#id_sc_field_nombre' + iSeqRow).bind('blur', function() { sc_form_empleados_nombre_onblur(this, iSeqRow) })
                                    .bind('change', function() { sc_form_empleados_nombre_onchange(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_empleados_nombre_onfocus(this, iSeqRow) });
  $('#id_sc_field_activo' + iSeqRow).bind('blur', function() { sc_form_empleados_activo_onblur(this, iSeqRow) })
                                    .bind('change', function() { sc_form_empleados_activo_onchange(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_empleados_activo_onfocus(this, iSeqRow) });
  $('#id_sc_field_codigo' + iSeqRow).bind('change', function() { sc_form_empleados_codigo_onchange(this, iSeqRow) });
  $('#id_sc_field_cargo' + iSeqRow).bind('blur', function() { sc_form_empleados_cargo_onblur(this, iSeqRow) })
                                   .bind('change', function() { sc_form_empleados_cargo_onchange(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_empleados_cargo_onfocus(this, iSeqRow) });
  $('#id_sc_field_menu_default' + iSeqRow).bind('blur', function() { sc_form_empleados_menu_default_onblur(this, iSeqRow) })
                                          .bind('change', function() { sc_form_empleados_menu_default_onchange(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_empleados_menu_default_onfocus(this, iSeqRow) });
  $('#id_sc_field_admin' + iSeqRow).bind('blur', function() { sc_form_empleados_admin_onblur(this, iSeqRow) })
                                   .bind('change', function() { sc_form_empleados_admin_onchange(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_empleados_admin_onfocus(this, iSeqRow) });
  $('.sc-ui-radio-activo' + iSeqRow).on('click', function() { scMarkFormAsChanged(); });
  $('.sc-ui-radio-admin' + iSeqRow).on('click', function() { scMarkFormAsChanged(); });
} // scJQEventsAdd

function sc_form_empleados_idempleado_onblur(oThis, iSeqRow) {
  do_ajax_form_empleados_validate_idempleado();
  scCssBlur(oThis);
}

function sc_form_empleados_idempleado_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_empleados_idempleado_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_empleados_nombre_onblur(oThis, iSeqRow) {
  do_ajax_form_empleados_validate_nombre();
  scCssBlur(oThis);
}

function sc_form_empleados_nombre_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_empleados_nombre_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_empleados_activo_onblur(oThis, iSeqRow) {
  do_ajax_form_empleados_validate_activo();
  scCssBlur(oThis);
}

function sc_form_empleados_activo_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_empleados_activo_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_empleados_codigo_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_empleados_cargo_onblur(oThis, iSeqRow) {
  do_ajax_form_empleados_validate_cargo();
  scCssBlur(oThis);
}

function sc_form_empleados_cargo_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_empleados_cargo_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_empleados_menu_default_onblur(oThis, iSeqRow) {
  do_ajax_form_empleados_validate_menu_default();
  scCssBlur(oThis);
}

function sc_form_empleados_menu_default_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_empleados_menu_default_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_empleados_admin_onblur(oThis, iSeqRow) {
  do_ajax_form_empleados_validate_admin();
  scCssBlur(oThis);
}

function sc_form_empleados_admin_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_empleados_admin_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function displayChange_block(block, status) {
	if ("0" == block) {
		displayChange_block_0(status);
	}
}

function displayChange_block_0(status) {
	displayChange_field("idempleado", "", status);
	displayChange_field("nombre", "", status);
	displayChange_field("activo", "", status);
	displayChange_field("cargo", "", status);
	displayChange_field("menu_default", "", status);
	displayChange_field("admin", "", status);
}

function displayChange_row(row, status) {
	displayChange_field_idempleado(row, status);
	displayChange_field_nombre(row, status);
	displayChange_field_activo(row, status);
	displayChange_field_cargo(row, status);
	displayChange_field_menu_default(row, status);
	displayChange_field_admin(row, status);
}

function displayChange_field(field, row, status) {
	if ("idempleado" == field) {
		displayChange_field_idempleado(row, status);
	}
	if ("nombre" == field) {
		displayChange_field_nombre(row, status);
	}
	if ("activo" == field) {
		displayChange_field_activo(row, status);
	}
	if ("cargo" == field) {
		displayChange_field_cargo(row, status);
	}
	if ("menu_default" == field) {
		displayChange_field_menu_default(row, status);
	}
	if ("admin" == field) {
		displayChange_field_admin(row, status);
	}
}

function displayChange_field_idempleado(row, status) {
    var fieldId;
}

function displayChange_field_nombre(row, status) {
    var fieldId;
}

function displayChange_field_activo(row, status) {
    var fieldId;
}

function displayChange_field_cargo(row, status) {
    var fieldId;
}

function displayChange_field_menu_default(row, status) {
    var fieldId;
}

function displayChange_field_admin(row, status) {
    var fieldId;
}

function scRecreateSelect2() {
}
function scResetPagesDisplay() {
	$(".sc-form-page").show();
}

function scHidePage(pageNo) {
	$("#id_form_empleados_form" + pageNo).hide();
}

function scCheckNoPageSelected() {
	if (!$(".sc-form-page").filter(".scTabActive").filter(":visible").length) {
		var inactiveTabs = $(".sc-form-page").filter(".scTabInactive").filter(":visible");
		if (inactiveTabs.length) {
			var tabNo = $(inactiveTabs[0]).attr("id").substr(22);
		}
	}
}
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
                         $(t).html("<a href=\"javascript:nm_mostra_doc('0', '"+rs2+"', 'form_empleados')\">"+$('#id_read_on_'+field+iSeqRow).text()+"</a>");
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

var wizardActualStep = <?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_empleados']['form_wizard']['actual_step']; ?>;
var wizardTotalSteps = <?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_empleados']['form_wizard']['total_steps']; ?>;
var wizardIsInsert = <?php echo ('novo' == $this->nmgp_opcao || $GLOBALS["erro_incl"] == 1 ? 'true' : 'false'); ?>;
var wizardViewMode = '<?php echo ('novo' == $this->nmgp_opcao || $GLOBALS["erro_incl"] == 1 ? 'wizard' : 'wizard'); ?>';
var pag_ativa = wizardActualStep;

function scJQWizardGoToPage(pageNo)
{
    pageNo = parseInt(pageNo);

    scJQWizardHideAllFormSteps();
    scJQWizardShowFormStep(pageNo);
    scJQWizardPreparePageNavigation(pageNo);
    scJQWizardPrepareStep(pageNo);

    wizardActualStep = pageNo;
    pag_ativa = wizardActualStep;
}

function scJQWizardPageClick(pageGoTo)
{
    var thisPage = $("#sc-ui-form-step-" + pageGoTo);

    pageGoTo = parseInt(pageGoTo);

    if (thisPage.hasClass("scTabInactive")) {
        scJQWizardGoToPage(pageGoTo);
    }
}

function scJQWizardPreparePageNavigation(pageNo)
{
    $("#sc-ui-form-step-" + wizardActualStep).removeClass("scTabActive").addClass("scTabInactive");
    $("#sc-ui-form-step-" + pageNo).removeClass("scTabInactive").addClass("scTabActive");

    $(".scTabInactive").css("cursor", "pointer");

    scJQWizardNavigationButtons();
}

function scJQWizardIsFirstStep()
{
    return 0 == wizardActualStep;
}

function scJQWizardIsLastStep()
{
    return wizardTotalSteps == wizardActualStep + 1;
}

function scJQWizardGoToNextStep()
{
    if (scJQWizardIsLastStep()) {
        return;
    }

    scJQWizardValidateStep(wizardActualStep + 1);
}

function scJQWizardGoToPreviousStep()
{
    if (scJQWizardIsFirstStep()) {
        return;
    }

    scJQWizardValidateStep(wizardActualStep - 1);
}

function scJQWizardStepClick(stepGoTo)
{
    var thisStep = $("#sc-ui-form-step-" + stepGoTo);

    stepGoTo = parseInt(stepGoTo);

    if (thisStep.hasClass("sc-ui-form-step-done")) {
        scJQWizardValidateStep(stepGoTo);
    } else if (thisStep.hasClass("sc-ui-form-step-next")) {
        scJQWizardValidateStep(stepGoTo);
    }
}

function scJQWizardValidateStep(stepGoTo)
{
    if (0 == wizardActualStep) {
        do_ajax_form_empleados_submit_page_0(stepGoTo);
    }
}

function scJQWizardGoToStep(stepNo)
{
    stepNo = parseInt(stepNo);

    if (typeof wizardMobileProgress === "object") {
        if (stepNo > wizardActualStep) {
            wizardMobileProgress.goToNextStep();
        } else if (stepNo < wizardActualStep) {
            wizardMobileProgress.goToPrevStep();
        }
    }

    scJQWizardHideAllFormSteps();
    scJQWizardShowFormStep(stepNo);
    scJQWizardPrepareNavigation(stepNo);
    scJQWizardPrepareStep(stepNo);

    wizardActualStep = stepNo;
    pag_ativa = wizardActualStep;

    if (wizardIsInsert) {
        if (scJQWizardIsLastStep()) {
            scJQWizardInsertButtonShow();
        } else {
            scJQWizardInsertButtonHide();
        }
    }

    if ('wizard' == wizardViewMode) {
        if (scJQWizardIsFirstStep()) {
            scJQWizardPreviousButtonHide();
        } else {
            scJQWizardPreviousButtonShow();
        }
        if (scJQWizardIsLastStep()) {
            scJQWizardNextButtonHide();
        } else {
            scJQWizardNextButtonShow();
        }
    }
}

function scJQWizardHideAllFormSteps()
{
    scJQWizardHideFormStep(0);
}

function scJQWizardHideFormStep(stepNo)
{
    $("#form_empleados_form" + stepNo).css({
        "width": "1px",
        "height": "0",
        "display": "none",
        "overflow": "scroll",
    });
}

function scJQWizardShowFormStep(stepNo)
{
    $("#form_empleados_form" + stepNo).css({
        "width": "",
        "height": "",
        "display": "",
        "overflow": "visible",
    });
}

function scJQWizardPrepareNavigation(stepNo)
{
    scJQWizardNavigationDone(stepNo);
    scJQWizardNavigationNow(stepNo);
    scJQWizardNavigationNext(stepNo);
    scJQWizardNavigationToDo(stepNo);
    scJQWizardNavigationButtons();
}

function scJQWizardNavigationDone(stepNo)
{
    if (0 == stepNo) {
        return;
    }

    for (var i = 0; i < stepNo; i++) {
        scJQWizardNavigationAddClass("sc-ui-form-step-done", i);
        scJQWizardNavigationUpdateStep(i);
    }
}

function scJQWizardNavigationNow(stepNo)
{
    scJQWizardNavigationAddClass("sc-ui-form-step-now", stepNo);
    scJQWizardNavigationUpdateStep(stepNo);
}

function scJQWizardNavigationNext(stepNo)
{
    if (wizardTotalSteps == stepNo + 1) {
        return;
    }

    for (var i = stepNo + 1; i < wizardTotalSteps; i++) {
        scJQWizardNavigationAddClass("sc-ui-form-step-next", i);
        scJQWizardNavigationUpdateStep(i);
    }
}

function scJQWizardNavigationToDo(stepNo)
{
    if (!wizardIsInsert && 'wizard' != wizardViewMode) {
        return;
    }

    if (wizardTotalSteps == stepNo + 2) {
        return;
    }

    for (var i = stepNo + 2; i < wizardTotalSteps; i++) {
        scJQWizardNavigationAddClass("sc-ui-form-step-todo", i);
        scJQWizardNavigationUpdateStep(i);
    }
}

function scJQWizardNavigationAddClass(className, stepNo)
{
    $("#sc-ui-form-step-" + stepNo)
        .removeClass("sc-ui-form-step-done")
        .removeClass("sc-ui-form-step-now")
        .removeClass("sc-ui-form-step-next")
        .removeClass("sc-ui-form-step-todo")
        .removeClass("is-complete")
        .addClass(className);

    if ("sc-ui-form-step-done" == className) {
        $("#sc-ui-form-step-" + stepNo).addClass("is-complete");
    }
}

function scJQWizardNavigationUpdateStep(stepNo)
{
    var thisStep = $("#sc-ui-form-step-" + stepNo);

    if (thisStep.hasClass("sc-ui-form-step-done")) {
        thisStep.on("mouseover", function() {
            $(this).css("cursor", "pointer");
        });
    } else if (thisStep.hasClass("sc-ui-form-step-now")) {
        thisStep.on("mouseover", function() {
            $(this).css("cursor", "default");
        });
    } else if (thisStep.hasClass("sc-ui-form-step-next")) {
        thisStep.on("mouseover", function() {
            $(this).css("cursor", "pointer");
        });
    } else {
        thisStep.on("mouseover", function() {
            $(this).css("cursor", "not-allowed");
        });
    }
}

function scJQWizardInsertButtonHide()
{
    $("#sc_b_ins_t").hide();
    $("#sc_b_ins_b").hide();
}

function scJQWizardInsertButtonShow()
{
    $("#sc_b_ins_t").show();
    $("#sc_b_ins_b").show();
}

function scJQWizardInsertButtonDisable()
{
    $("#sc_b_ins_t").addClass("disabled");
    $("#sc_b_ins_b").addClass("disabled");
}

function scJQWizardInsertButtonEnable()
{
    $("#sc_b_ins_t").removeClass("disabled");
    $("#sc_b_ins_b").removeClass("disabled");
}

function scJQWizardPreviousButtonHide()
{
    $("#sc_b_stepret_t").hide();
    $("#sc_b_stepret_b").hide();
}

function scJQWizardPreviousButtonShow()
{
    $("#sc_b_stepret_t").show();
    $("#sc_b_stepret_b").show();
}

function scJQWizardPreviousButtonDisable()
{
    $("#sc_b_stepret_t").addClass("disabled");
    $("#sc_b_stepret_b").addClass("disabled");
}

function scJQWizardPreviousButtonEnable()
{
    $("#sc_b_stepret_t").removeClass("disabled");
    $("#sc_b_stepret_b").removeClass("disabled");
}

function scJQWizardNextButtonHide()
{
    $("#sc_b_stepavc_t").hide();
    $("#sc_b_stepavc_b").hide();
}

function scJQWizardNextButtonShow()
{
    $("#sc_b_stepavc_t").show();
    $("#sc_b_stepavc_b").show();
}

function scJQWizardNextButtonDisable()
{
    $("#sc_b_stepavc_t").addClass("disabled");
    $("#sc_b_stepavc_b").addClass("disabled");
}

function scJQWizardNextButtonEnable()
{
    $("#sc_b_stepavc_t").removeClass("disabled");
    $("#sc_b_stepavc_b").removeClass("disabled");
}

function scJQWizardNavigationButtons()
{
    if ('wizard' != wizardViewMode) {
        scJQWizardPreviousButtonHide();
        scJQWizardNextButtonHide();
    }
}

function scJQWizardPrepareStep(stepNo)
{
    if (0 == stepNo) {
        scJQWizardPrepareStep_0();
    }
}

function scJQWizardPrepareStep_0()
{
}


function scJQElementsAdd(iLine) {
  scJQEventsAdd(iLine);
  scEventControl_init(iLine);
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

