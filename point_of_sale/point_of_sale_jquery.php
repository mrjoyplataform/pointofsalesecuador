
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
  scEventControl_data["qty" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["product" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["lbl_product" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["p_img" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["ord_value" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["ord_discount" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["total" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["qty" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["qty" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["product" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["product" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["lbl_product" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["lbl_product" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["p_img" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["p_img" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["ord_value" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["ord_value" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["ord_discount" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["ord_discount" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["total" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["total" + iSeqRow]["change"]) {
    return true;
  }
  return false;
} // scEventControl_active

function scEventControl_onFocus(oField, iSeq) {
  var fieldId, fieldName;
  fieldId = $(oField).attr("id");
  fieldName = fieldId.substr(12);
  scEventControl_data[fieldName]["blur"] = true;
  if ("product" + iSeq == fieldName) {
    scEventControl_data[fieldName]["change"]   = true;
    scEventControl_data[fieldName]["original"] = $(oField).val();
    scEventControl_data[fieldName]["calculated"] = $(oField).val();
    return;
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
  $('#id_sc_field_qty' + iSeqRow).bind('blur', function() { sc_point_of_sale_qty_onblur(this, iSeqRow) })
                                 .bind('change', function() { sc_point_of_sale_qty_onchange(this, iSeqRow) })
                                 .bind('focus', function() { sc_point_of_sale_qty_onfocus(this, iSeqRow) });
  $('#id_sc_field_product' + iSeqRow).bind('blur', function() { sc_point_of_sale_product_onblur(this, iSeqRow) })
                                     .bind('change', function() { sc_point_of_sale_product_onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_point_of_sale_product_onfocus(this, iSeqRow) });
  $('#id_sc_field_total' + iSeqRow).bind('blur', function() { sc_point_of_sale_total_onblur(this, iSeqRow) })
                                   .bind('change', function() { sc_point_of_sale_total_onchange(this, iSeqRow) })
                                   .bind('focus', function() { sc_point_of_sale_total_onfocus(this, iSeqRow) });
  $('#id_sc_field_lbl_product' + iSeqRow).bind('blur', function() { sc_point_of_sale_lbl_product_onblur(this, iSeqRow) })
                                         .bind('change', function() { sc_point_of_sale_lbl_product_onchange(this, iSeqRow) })
                                         .bind('focus', function() { sc_point_of_sale_lbl_product_onfocus(this, iSeqRow) });
  $('#id_sc_field_ord_value' + iSeqRow).bind('blur', function() { sc_point_of_sale_ord_value_onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_point_of_sale_ord_value_onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_point_of_sale_ord_value_onfocus(this, iSeqRow) });
  $('#id_sc_field_ord_discount' + iSeqRow).bind('blur', function() { sc_point_of_sale_ord_discount_onblur(this, iSeqRow) })
                                          .bind('change', function() { sc_point_of_sale_ord_discount_onchange(this, iSeqRow) })
                                          .bind('focus', function() { sc_point_of_sale_ord_discount_onfocus(this, iSeqRow) });
  $('#id_sc_field_p_img' + iSeqRow).bind('blur', function() { sc_point_of_sale_p_img_onblur(this, iSeqRow) })
                                   .bind('change', function() { sc_point_of_sale_p_img_onchange(this, iSeqRow) })
                                   .bind('focus', function() { sc_point_of_sale_p_img_onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_point_of_sale_qty_onblur(oThis, iSeqRow) {
  do_ajax_point_of_sale_validate_qty();
  scCssBlur(oThis);
}

function sc_point_of_sale_qty_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_point_of_sale_qty_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_point_of_sale_product_onblur(oThis, iSeqRow) {
  do_ajax_point_of_sale_validate_product();
  scCssBlur(oThis);
}

function sc_point_of_sale_product_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  do_ajax_point_of_sale_event_product_onchange();
}

function sc_point_of_sale_product_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_point_of_sale_total_onblur(oThis, iSeqRow) {
  do_ajax_point_of_sale_validate_total();
  scCssBlur(oThis);
}

function sc_point_of_sale_total_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_point_of_sale_total_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_point_of_sale_lbl_product_onblur(oThis, iSeqRow) {
  do_ajax_point_of_sale_validate_lbl_product();
  scCssBlur(oThis);
}

function sc_point_of_sale_lbl_product_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_point_of_sale_lbl_product_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_point_of_sale_ord_value_onblur(oThis, iSeqRow) {
  do_ajax_point_of_sale_validate_ord_value();
  scCssBlur(oThis);
}

function sc_point_of_sale_ord_value_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_point_of_sale_ord_value_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_point_of_sale_ord_discount_onblur(oThis, iSeqRow) {
  do_ajax_point_of_sale_validate_ord_discount();
  scCssBlur(oThis);
}

function sc_point_of_sale_ord_discount_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_point_of_sale_ord_discount_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_point_of_sale_p_img_onblur(oThis, iSeqRow) {
  do_ajax_point_of_sale_validate_p_img();
  scCssBlur(oThis);
}

function sc_point_of_sale_p_img_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_point_of_sale_p_img_onfocus(oThis, iSeqRow) {
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
}

function displayChange_block_0(status) {
	displayChange_field("qty", "", status);
	displayChange_field("product", "", status);
	displayChange_field("lbl_product", "", status);
	displayChange_field("p_img", "", status);
}

function displayChange_block_1(status) {
	displayChange_field("ord_value", "", status);
	displayChange_field("ord_discount", "", status);
	displayChange_field("total", "", status);
}

function displayChange_row(row, status) {
	displayChange_field_qty(row, status);
	displayChange_field_product(row, status);
	displayChange_field_lbl_product(row, status);
	displayChange_field_p_img(row, status);
	displayChange_field_ord_value(row, status);
	displayChange_field_ord_discount(row, status);
	displayChange_field_total(row, status);
}

function displayChange_field(field, row, status) {
	if ("qty" == field) {
		displayChange_field_qty(row, status);
	}
	if ("product" == field) {
		displayChange_field_product(row, status);
	}
	if ("lbl_product" == field) {
		displayChange_field_lbl_product(row, status);
	}
	if ("p_img" == field) {
		displayChange_field_p_img(row, status);
	}
	if ("ord_value" == field) {
		displayChange_field_ord_value(row, status);
	}
	if ("ord_discount" == field) {
		displayChange_field_ord_discount(row, status);
	}
	if ("total" == field) {
		displayChange_field_total(row, status);
	}
}

function displayChange_field_qty(row, status) {
    var fieldId;
}

function displayChange_field_product(row, status) {
    var fieldId;
}

function displayChange_field_lbl_product(row, status) {
    var fieldId;
}

function displayChange_field_p_img(row, status) {
    var fieldId;
}

function displayChange_field_ord_value(row, status) {
    var fieldId;
}

function displayChange_field_ord_discount(row, status) {
    var fieldId;
}

function displayChange_field_total(row, status) {
    var fieldId;
}

function scRecreateSelect2() {
}
function scResetPagesDisplay() {
	$(".sc-form-page").show();
}

function scHidePage(pageNo) {
	$("#id_point_of_sale_form" + pageNo).hide();
}

function scCheckNoPageSelected() {
	if (!$(".sc-form-page").filter(".scTabActive").filter(":visible").length) {
		var inactiveTabs = $(".sc-form-page").filter(".scTabInactive").filter(":visible");
		if (inactiveTabs.length) {
			var tabNo = $(inactiveTabs[0]).attr("id").substr(21);
		}
	}
}
function scJQPopupAdd(iSeqRow) {
  $('.scFormPopupBubble' + iSeqRow).each(function() {
    var distance = 10;
    var time = 250;
    var hideDelay = 500;
    var hideDelayTimer = null;
    var beingShown = false;
    var shown = false;
    var trigger = $('.scFormPopupTrigger', this);
    var info = $('.scFormPopup', this).css('opacity', 0);
    $([trigger.get(0), info.get(0)]).mouseover(function() {
      if (hideDelayTimer) clearTimeout(hideDelayTimer);
      if (beingShown || shown) {
        // don't trigger the animation again
        return;
      } else {
        // reset position of info box
        beingShown = true;
        info.css({
          top: trigger.offset().top - (info.height() - trigger.height()),
          left: trigger.offset().left - ((info.width() - trigger.width()) / 2),
          display: 'block'
        }).animate({
          top: '-=' + distance + 'px',
          opacity: 1
        }, time, 'swing', function() {
          beingShown = false;
          shown = true;
        });
      }
      return false;
      }).mouseout(function() {
      if (hideDelayTimer) clearTimeout(hideDelayTimer);
      hideDelayTimer = setTimeout(function() {
        hideDelayTimer = null;
        info.animate({
          top: '-=' + distance + 'px',
          opacity: 0
        }, time, 'swing', function() {
          shown = false;
          info.css('display', 'none');
        });
      }, hideDelay);
      return false;
    });
  });
} // scJQPopupAdd

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
                         $(t).html("<a href=\"javascript:nm_mostra_doc('0', '"+rs2+"', 'point_of_sale')\">"+$('#id_read_on_'+field+iSeqRow).text()+"</a>");
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


function scJQElementsAdd(iLine) {
  scJQEventsAdd(iLine);
  scEventControl_init(iLine);
  scJQPopupAdd(iLine);
  scJQUploadAdd(iLine);
  scJQPasswordToggleAdd(iLine);
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

