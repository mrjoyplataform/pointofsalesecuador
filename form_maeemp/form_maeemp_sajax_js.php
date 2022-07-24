
 <form name="form_ajax_redir_1" method="post" style="display: none">
  <input type="hidden" name="nmgp_parms">
  <input type="hidden" name="nmgp_outra_jan">
  <input type="hidden" name="script_case_session" value="<?php echo session_id() ?>">
 </form>
 <form name="form_ajax_redir_2" method="post" style="display: none">
  <input type="hidden" name="nmgp_parms">
  <input type="hidden" name="nmgp_url_saida">
  <input type="hidden" name="script_case_init">
  <input type="hidden" name="script_case_session" value="<?php echo session_id() ?>">
 </form>

 <SCRIPT>
<?php
sajax_show_javascript();
?>

  function scCenterElement(oElem)
  {
    var $oElem    = $(oElem),
        $oWindow  = $(this),
        iElemTop  = Math.round(($oWindow.height() - $oElem.height()) / 2),
        iElemLeft = Math.round(($oWindow.width()  - $oElem.width())  / 2);

    $oElem.offset({top: iElemTop, left: iElemLeft});
  } // scCenterElement

  function scAjaxHideAutocomp(sFrameId)
  {
    if (document.getElementById("id_ac_frame_" + sFrameId))
    {
      document.getElementById("id_ac_frame_" + sFrameId).style.display = "none";
    }
  } // scAjaxHideAutocomp

  function scAjaxShowAutocomp(sFrameId)
  {
    if (document.getElementById("id_ac_frame_" + sFrameId))
    {
      document.getElementById("id_ac_frame_" + sFrameId).style.display = "";
      document.getElementById("id_ac_" + sFrameId).focus();
    }
  } // scAjaxShowAutocomp

  function scAjaxHideDebug()
  {
    if (document.getElementById("id_debug_window"))
    {
      document.getElementById("id_debug_window").style.display = "none";
      document.getElementById("id_debug_text").innerHTML = "";
    }
  } // scAjaxHideDebug

  function scAjaxShowDebug(oTemp)
  {
    if (!document.getElementById("id_debug_window"))
    {
      return;
    }
    if (oTemp && oTemp != null)
    {
        oResp = oTemp;
    }
    if (oResp["htmOutput"] && "" != oResp["htmOutput"])
    {
      document.getElementById("id_debug_window").style.display = "";
      document.getElementById("id_debug_text").innerHTML = scAjaxFormatDebug(oResp["htmOutput"]) + document.getElementById("id_debug_text").innerHTML;
      //scCenterElement(document.getElementById("id_debug_window"));
    }
  } // scAjaxShowDebug

  function scAjaxFormatDebug(sDebugMsg)
  {
    return "<table class=\"scFormMessageTable\" style=\"margin: 1px; width: 100%\"><tr><td class=\"scFormMessageMessage\">" + scAjaxSpecCharParser(sDebugMsg) + "</td></tr></table>";
  } // scAjaxFormatDebug

  function scAjaxHideErrorDisplay_default(sErrorId, bForce)
  {
    if (document.getElementById("id_error_display_" + sErrorId + "_frame"))
    {
        document.getElementById("id_error_display_" + sErrorId + "_frame").style.display = "none";
        document.getElementById("id_error_display_" + sErrorId + "_text").innerHTML = "";
        if (null == bForce)
        {
            bForce = true;
        }
        if (bForce)
        {
            var $oField = $('#id_sc_field_' + sErrorId);
            if (0 < $oField.length)
            {
                scAjax_removeFieldErrorStyle($oField);
            }
        }
    }
    if (document.getElementById("id_error_display_fixed"))
    {
        document.getElementById("id_error_display_fixed").style.display = "none";
    }
  } // scAjaxHideErrorDisplay_default

  function scAjaxShowErrorDisplay_default(sErrorId, sErrorMsg)
  {
    if (oResp && oResp['redirExitInfo'])
    {
      sErrorMsg += "<br /><input type=\"button\" onClick=\"window.location='" + oResp['redirExitInfo']['action'] + "'\" value=\"Ok\">";
    }
    sErrorMsg = scAjaxErrorSql(sErrorMsg);
    if (document.getElementById("id_error_display_" + sErrorId + "_frame"))
    {
      document.getElementById("id_error_display_" + sErrorId + "_frame").style.display = "";
      document.getElementById("id_error_display_" + sErrorId + "_text").innerHTML = sErrorMsg;
      if ("table" == sErrorId)
      {
        scCenterElement(document.getElementById("id_error_display_" + sErrorId + "_frame"));
      }
      var $oField = $('#id_sc_field_' + sErrorId);
      if (0 < $oField.length)
      {
        scAjax_applyFieldErrorStyle($oField);
      }
    }
    if (ajax_error_list && ajax_error_list[sErrorId] && ajax_error_list[sErrorId]["timeout"] && 0 < ajax_error_list[sErrorId]["timeout"])
    {
      setTimeout("scAjaxHideErrorDisplay('" + sErrorId + "', false)", ajax_error_list[sErrorId]["timeout"] * 1000);
    }
  } // scAjaxShowErrorDisplay_default

  var iErrorSqlId = 1;

  function scAjaxErrorSql(sErrorMsg)
  {
    var iTmpPos = sErrorMsg.indexOf("{SC_DB_ERROR_INI}"),
        sTmpId;
    while (-1 < iTmpPos)
    {
      sTmpId    = "sc_id_error_sql_" + iErrorSqlId;
      sErrorMsg = sErrorMsg.substr(0, iTmpPos) + "<br /><span style=\"text-decoration: underline\" onClick=\"$('#" + sTmpId + "').show(); scCenterElement(document.getElementById('" + sTmpId + "'))\">" + sErrorMsg.substr(iTmpPos + 17);
      iTmpPos   = sErrorMsg.indexOf("{SC_DB_ERROR_MID}");
      sErrorMsg = sErrorMsg.substr(0, iTmpPos) + "</span><table class=\"scFormErrorTable\" id=\"" + sTmpId + "\" style=\"display: none; position: absolute\"><tr><td>" + sErrorMsg.substr(iTmpPos + 17);
      iTmpPos   = sErrorMsg.indexOf("{SC_DB_ERROR_CLS}");
      sErrorMsg = sErrorMsg.substr(0, iTmpPos) + "<br /><br /><span onClick=\"$('#" + sTmpId + "').hide()\">" + sErrorMsg.substr(iTmpPos + 17);
      iTmpPos   = sErrorMsg.indexOf("{SC_DB_ERROR_END}");
      sErrorMsg = sErrorMsg.substr(0, iTmpPos) + "</span></td></tr></table>" + sErrorMsg.substr(iTmpPos + 17);
      iTmpPos   = sErrorMsg.indexOf("{SC_DB_ERROR_INI}");
      iErrorSqlId++;
    }
    return sErrorMsg;
  } // scAjaxErrorSql

  function scAjaxHideMessage_default()
  {
    if (document.getElementById("id_message_display_frame"))
    {
      document.getElementById("id_message_display_frame").style.display = "none";
      document.getElementById("id_message_display_text").innerHTML = "";
    }
  } // scAjaxHideMessage

  function scAjaxShowMessage_default()
  {
    if (!oResp["msgDisplay"] || !oResp["msgDisplay"]["msgText"])
    {
      return;
    }
    _scAjaxShowMessage_default({title: scMsgDefTitle, message: oResp["msgDisplay"]["msgText"], isModal: false, timeout: sc_ajaxMsgTime, showButton: false, buttonLabel: "Ok", topPos: 0, leftPos: 0, width: 0, height: 0, redirUrl: "", redirTarget: "", redirParam: "", showClose: false, showBodyIcon: true, isToast: false, toastPos: ""});
  } // scAjaxShowMessage

  var scMsgDefClose = "";

  function _scAjaxShowMessage_default(params) {
	var sTitle = params["title"],
		sMessage = params["message"],
		bModal = params["isModal"],
		iTimeout = params["timeout"],
		bButton = params["showButton"],
		sButton = params["buttonLabel"],
		iTop = params["topPos"],
		iLeft = params["leftPos"],
		iWidth = params["width"],
		iHeight = params["height"],
		sRedir = params["redirUrl"],
		sTarget = params["redirTarget"],
		sParam = params["redirParam"],
		bClose = params["showClose"],
		bBodyIcon = params["showBodyIcon"],
		bToast = params["isToast"],
		sToastPos = params["toastPos"];
    if ("" == sMessage) {
      if (bModal) {
        scMsgDefClick = "close_modal";
      }
      else {
        scMsgDefClick = "close";
      }
      _scAjaxMessageBtnClick();
      document.getElementById("id_message_display_title").innerHTML = scMsgDefTitle;
      document.getElementById("id_message_display_text").innerHTML = "";
      document.getElementById("id_message_display_buttone").value = scMsgDefButton;
      document.getElementById("id_message_display_buttond").style.display = "none";
    }
    else {
      document.getElementById("id_message_display_title").innerHTML = scAjaxSpecCharParser(sTitle);
      document.getElementById("id_message_display_text").innerHTML = scAjaxSpecCharParser(sMessage);
      document.getElementById("id_message_display_buttone").value = sButton;
      document.getElementById("id_message_display_buttond").style.display = bButton ? "" : "none";
      document.getElementById("id_message_display_buttond").style.display = bButton ? "" : "none";
      document.getElementById("id_message_display_title_line").style.display = (bClose || "" != sTitle) ? "" : "none";
      document.getElementById("id_message_display_close_icon").style.display = bClose ? "" : "none";
      if (document.getElementById("id_message_display_body_icon")) {
        document.getElementById("id_message_display_body_icon").style.display = bBodyIcon ? "" : "none";
      }
      $("#id_message_display_content").css('width', (0 < iWidth ? iWidth + 'px' : ''));
      $("#id_message_display_content").css('height', (0 < iHeight ? iHeight + 'px' : ''));
      if (bModal) {
        iWidth = iWidth || 250;
        iHeight = iHeight || 200;
        scMsgDefClose = "close_modal";
        tb_show('', '#TB_inline?height=' + (iHeight + 6) + '&width=' + (iWidth + 4) + '&inlineId=id_message_display_frame&modal=true', '');
        if (bButton) {
          if ("" != sRedir && "" != sTarget) {
            scMsgDefClick = "redir2_modal";
            document.form_ajax_redir_2.action = sRedir;
            document.form_ajax_redir_2.target = sTarget;
            document.form_ajax_redir_2.nmgp_parms.value = sParam;
            document.form_ajax_redir_2.script_case_init.value = scMsgDefScInit;
          }
          else if ("" != sRedir && "" == sTarget) {
            scMsgDefClick = "redir1";
            document.form_ajax_redir_1.action = sRedir;
            document.form_ajax_redir_1.nmgp_parms.value = sParam;
          }
          else {
            scMsgDefClick = "close_modal";
          }
        }
        else if (null != iTimeout && 0 < iTimeout) {
          scMsgDefClick = "close_modal";
          setTimeout("_scAjaxMessageBtnClick()", iTimeout * 1000);
        }
      }
      else
      {
        scMsgDefClose = "close";
        $("#id_message_display_frame").css('top', (0 < iTop ? iTop + 'px' : ''));
        $("#id_message_display_frame").css('left', (0 < iLeft ? iLeft + 'px' : ''));
        document.getElementById("id_message_display_frame").style.display = "";
        if (0 == iTop && 0 == iLeft) {
          scCenterElement(document.getElementById("id_message_display_frame"));
        }
        if (bButton) {
          if ("" != sRedir && "" != sTarget) {
            scMsgDefClick = "redir2";
            document.form_ajax_redir_2.action = sRedir;
            document.form_ajax_redir_2.target = sTarget;
            document.form_ajax_redir_2.nmgp_parms.value = sParam;
            document.form_ajax_redir_2.script_case_init.value = scMsgDefScInit;
          }
          else if ("" != sRedir && "" == sTarget) {
            scMsgDefClick = "redir1";
            document.form_ajax_redir_1.action = sRedir;
            document.form_ajax_redir_1.nmgp_parms.value = sParam;
          }
          else {
            scMsgDefClick = "close";
          }
        }
        else if (null != iTimeout && 0 < iTimeout) {
          scMsgDefClick = "close";
          setTimeout("_scAjaxMessageBtnClick()", iTimeout * 1000);
        }
      }
    }
  } // _scAjaxShowMessage_default

  function _scAjaxMessageBtnClose() {
    switch (scMsgDefClose) {
      case "close":
        document.getElementById("id_message_display_frame").style.display = "none";
        break;
      case "close_modal":
        tb_remove();
        break;
    }
  } // _scAjaxMessageBtnClick

  function _scAjaxMessageBtnClick() {
    switch (scMsgDefClick) {
      case "close":
        document.getElementById("id_message_display_frame").style.display = "none";
        break;
      case "close_modal":
        tb_remove();
        break;
      case "dismiss":
        scAjaxHideMessage();
        break;
      case "redir1":
        document.form_ajax_redir_1.submit();
        break;
      case "redir2":
        document.form_ajax_redir_2.submit();
        document.getElementById("id_message_display_frame").style.display = "none";
        break;
      case "redir2_modal":
        document.form_ajax_redir_2.submit();
        tb_remove();
        break;
    }
  } // _scAjaxMessageBtnClick

  function scAjaxHasError()
  {
    if (!oResp["result"])
    {
      return false;
    }
    return "ERROR" == oResp["result"];
  } // scAjaxHasError

  function scAjaxIsOk()
  {
    if (!oResp["result"])
    {
      return false;
    }
    return "OK" == oResp["result"] || "SET" == oResp["result"];
  } // scAjaxIsOk

  function scAjaxIsSet()
  {
    if (!oResp["result"])
    {
      return false;
    }
    return "SET" == oResp["result"];
  } // scAjaxIsSet

  function scAjaxCalendarReload()
  {
    if (oResp["calendarReload"] && "OK" == oResp["calendarReload"] && typeof self.parent.calendar_reload == "function")
    {
<?php
if (isset($_SESSION['scriptcase']['device_mobile']) && $_SESSION['scriptcase']['device_mobile'] && isset($_SESSION['scriptcase']['display_mobile']) && $_SESSION['scriptcase']['display_mobile']) {
?>
      self.parent.calendar_reload();
      self.parent.tb_remove();
<?php
} else {
?>
      self.parent.calendar_reload();
      self.parent.tb_remove();
<?php
}
?>
      return true;
    }
    return false;
  } // scCalendarReload

  function scAjaxUpdateErrors(sType)
  {
    ajax_error_geral = "";
    oFieldErrors     = {};
    if (oResp["errList"])
    {
      for (iFieldErrors = 0; iFieldErrors < oResp["errList"].length; iFieldErrors++)
      {
        sTestField = oResp["errList"][iFieldErrors]["fldName"];
        if ("geral_form_maeemp" == sTestField)
        {
          if (ajax_error_geral != '') { ajax_error_geral += '<br>';}
          ajax_error_geral += scAjaxSpecCharParser(oResp["errList"][iFieldErrors]["msgText"]);
        }
        else
        {
          if (scFocusFirstErrorField && '' == scFocusFirstErrorName)
          {
            scFocusFirstErrorName = sTestField;
          }
          if (oResp["errList"][iFieldErrors]["numLinha"])
          {
            sTestField += oResp["errList"][iFieldErrors]["numLinha"];
          }
          if (!oFieldErrors[sTestField])
          {
            oFieldErrors[sTestField] = new Array();
          }
          oFieldErrors[sTestField][oFieldErrors[sTestField].length] = scAjaxSpecCharParser(oResp["errList"][iFieldErrors]["msgText"]);
        }
      }
    }
    for (iUpdateErrors = 0; iUpdateErrors < ajax_field_list.length; iUpdateErrors++)
    {
      sTestField = ajax_field_list[iUpdateErrors];
      if (oFieldErrors[sTestField])
      {
        ajax_error_list[sTestField][sType] = oFieldErrors[sTestField];
      }
    }
  } // scAjaxUpdateErrors

  function scAjaxUpdateFieldErrors(sField, sType)
  {
    aFieldErrors = new Array();
    if (oResp["errList"])
    {
      iErrorPos  = 0;
      for (iFieldErrors = 0; iFieldErrors < oResp["errList"].length; iFieldErrors++)
      {
        sTestField = oResp["errList"][iFieldErrors]["fldName"];
        if (oResp["errList"][iFieldErrors]["numLinha"])
        {
          sTestField += oResp["errList"][iFieldErrors]["numLinha"];
        }
        if (sField == sTestField)
        {
          aFieldErrors[iErrorPos] = scAjaxSpecCharParser(oResp["errList"][iFieldErrors]["msgText"]);
          iErrorPos++;
        }
      }
    }
        if (ajax_error_list[sField])
        {
        ajax_error_list[sField][sType] = aFieldErrors;
        }
  } // scAjaxUpdateFieldErrors

  function scAjaxListErrors(bLabel)
  {
    bFirst        = false;
    sAppErrorText = "";
    if ("" != ajax_error_geral)
    {
      bFirst         = true;
      sAppErrorText += ajax_error_geral;
    }
    for (iFieldList = 0; iFieldList < ajax_field_list.length; iFieldList++)
    {
      sFieldError = scAjaxListFieldErrors(ajax_field_list[iFieldList], bLabel);
      if ("" != sFieldError)
      {
        if (bFirst)
        {
          bFirst         = false
          sAppErrorText += "<hr size=\"1\" width=\"80%\" />";
        }
        sAppErrorText += sFieldError;
      }
    }
    return sAppErrorText;
  } // scAjaxListErrors

  function scAjaxListFieldErrors(sField, bLabel)
  {
    sErrorText = "";
    for (iErrorType = 0; iErrorType < ajax_error_type.length; iErrorType++)
    {
      if (ajax_error_list[sField])
      {
        for (iListErrors = 0; iListErrors < ajax_error_list[sField][ajax_error_type[iErrorType]].length; iListErrors++)
        {
          if (bLabel)
          {
            sErrorText += ajax_error_list[sField]["label"] + ": ";
          }
          sErrorText += ajax_error_list[sField][ajax_error_type[iErrorType]][iListErrors] + "<br />";
        }
      }
    }
    return sErrorText;
  } // scAjaxListFieldErrors

	function scAjaxClearErrors() {
		var fieldName;

		for (fieldName in ajax_error_list) {
            if (null != ajax_error_list[fieldName]) {
                ajax_error_list[fieldName]["valid"] = new Array();
                ajax_error_list[fieldName]["onblur"] = new Array();
                ajax_error_list[fieldName]["onchange"] = new Array();
                ajax_error_list[fieldName]["onclick"] = new Array();
                ajax_error_list[fieldName]["onfocus"] = new Array();
            }
		}
	} // scAjaxClearErrors

  function scAjaxSetVariables()
  {
    if (!oResp["varList"])
    {
      return true;
    }
    for (var iVarFields = 0; iVarFields < oResp["varList"].length; iVarFields++)
    {
      var sVarName  = oResp["varList"][iVarFields]["index"];
      var sVarValue = oResp["varList"][iVarFields]["value"];
	  eval(sVarName + " = \"" + sVarValue + "\";");
	}
  } // scAjaxSetVariables

  function scAjaxSetFields()
  {
    if (!oResp["fldList"])
    {
      return true;
    }
    for (iSetFields = 0; iSetFields < oResp["fldList"].length; iSetFields++)
    {
      var sFieldName = oResp["fldList"][iSetFields]["fldName"];
      var sFieldType = oResp["fldList"][iSetFields]["fldType"];

      if ("selectdd" == sFieldType)
      {
        var bSelectDD = true;
        sFieldType = "select";
      }
      else
      {
        var bSelectDD = false;
      }
      if ("select2_ac" == sFieldType)
      {
        var bSelect2AC = true;
        sFieldType = "select";
      }
      else
      {
        var bSelect2AC = false;
      }
      if (oResp["fldList"][iSetFields]["valList"])
      {
        var oFieldValues = oResp["fldList"][iSetFields]["valList"];
        if (0 == oFieldValues.length)
        {
          oFieldValues = null;
        }
      }
      else
      {
        var oFieldValues = null;
      }
      if (oResp["fldList"][iSetFields]["optList"])
      {
        var oFieldOptions = oResp["fldList"][iSetFields]["optList"];
      }
      else
      {
        var oFieldOptions = null;
      }
/*
      if ("_autocomp" == sFieldName.substr(sFieldName.length - 9) &&
          iSetFields > 0 &&
          sFieldName.substr(0, sFieldName.length - 9) == oResp["fldList"][iSetFields - 1]["fldName"] &&
          document.getElementById("div_ac_lab_" + sFieldName.substr(0, sFieldName.length - 9)) &&
          oFieldValues[0]['value'])
      {
          document.getElementById("div_ac_lab_" + sFieldName.substr(0, sFieldName.length - 9)).innerHTML = oFieldValues[0]['value'];
      }
*/

      if ("corhtml" == sFieldType)
      {
        sFieldType = 'text';

        /*sCor = (oFieldValues[0]['value']) ? oFieldValues[0]['value'] : "";
        setaCorPaleta(sFieldName, sCor);*/
      }

      if ("_autocomp" == sFieldName.substr(sFieldName.length - 9) &&
          iSetFields > 0 &&
          sFieldName.substr(0, sFieldName.length - 9) == oResp["fldList"][iSetFields - 1]["fldName"] &&
          document.getElementById("div_ac_lab_" + sFieldName.substr(0, sFieldName.length - 9)))
      {
          sLabel_auto_Comp = (oFieldValues[0]['value']) ? oFieldValues[0]['value'] : "";
          document.getElementById("div_ac_lab_" + sFieldName.substr(0, sFieldName.length - 9)).innerHTML = sLabel_auto_Comp;
      }


      if (oResp["fldList"][iSetFields]["colNum"])
      {
        var iColNum = oResp["fldList"][iSetFields]["colNum"];
      }
      else
      {
        var iColNum = 1;
      }
      if (oResp["fldList"][iSetFields]["row"])
      {
        var iRow = oResp["fldList"][iSetFields]["row"];
		var thisRow = oResp["fldList"][iSetFields]["row"];
      }
      else
      {
        var iRow = 1;
		var thisRow = "";
      }
      if (oResp["fldList"][iSetFields]["htmComp"])
      {
        var sHtmComp = oResp["fldList"][iSetFields]["htmComp"];
        sHtmComp     = sHtmComp.replace(/__AD__/gi, '"');
        sHtmComp     = sHtmComp.replace(/__AS__/gi, "'");
      }
      else
      {
        var sHtmComp = null;
      }
      if (oResp["fldList"][iSetFields]["imgFile"])
      {
        var sImgFile = oResp["fldList"][iSetFields]["imgFile"];
      }
      else
      {
        var sImgFile = "";
      }
      if (oResp["fldList"][iSetFields]["imgOrig"])
      {
        var sImgOrig = oResp["fldList"][iSetFields]["imgOrig"];
      }
      else
      {
        var sImgOrig = "";
      }
      if (oResp["fldList"][iSetFields]["keepImg"])
      {
        var sKeepImg = oResp["fldList"][iSetFields]["keepImg"];
      }
      else
      {
        var sKeepImg = "N";
      }
      if (oResp["fldList"][iSetFields]["hideName"])
      {
        var sHideName = oResp["fldList"][iSetFields]["hideName"];
      }
      else
      {
        var sHideName = "N";
      }
      if (oResp["fldList"][iSetFields]["imgLink"])
      {
        var sImgLink = oResp["fldList"][iSetFields]["imgLink"];
      }
      else
      {
        var sImgLink = null;
      }
      if (oResp["fldList"][iSetFields]["docLink"])
      {
        var sDocLink = oResp["fldList"][iSetFields]["docLink"];
      }
      else
      {
        var sDocLink = "";
      }
      if (oResp["fldList"][iSetFields]["docIcon"])
      {
        var sDocIcon = oResp["fldList"][iSetFields]["docIcon"];
      }
      else
      {
        var sDocIcon = "";
      }

      if (oResp["fldList"][iSetFields]["docReadonly"])
      {
        var sDocReadonly = oResp["fldList"][iSetFields]["docReadonly"];
      }
      else
      {
        var sDocReadonly = "";
      }

      if (oResp["fldList"][iSetFields]["optComp"])
      {
        var sOptComp = oResp["fldList"][iSetFields]["optComp"];
      }
      else
      {
        var sOptComp = "";
      }
      if (oResp["fldList"][iSetFields]["optClass"])
      {
        var sOptClass = oResp["fldList"][iSetFields]["optClass"];
      }
      else
      {
        var sOptClass = "";
      }
      if (oResp["fldList"][iSetFields]["optMulti"])
      {
        var sOptMulti = oResp["fldList"][iSetFields]["optMulti"];
      }
      else
      {
        var sOptMulti = "";
      }
      if (oResp["fldList"][iSetFields]["imgHtml"])
      {
        var sImgHtml = oResp["fldList"][iSetFields]["imgHtml"];
      }
      else
      {
        var sImgHtml = "";
      }
      if (oResp["fldList"][iSetFields]["mulHtml"])
      {
        var sMULHtml = oResp["fldList"][iSetFields]["mulHtml"];
      }
      else
      {
        var sMULHtml = "";
      }
      if (oResp["fldList"][iSetFields]["updInnerHtml"])
      {
        var sInnerHtml = scAjaxSpecCharParser(oResp["fldList"][iSetFields]["updInnerHtml"]);
      }
      else
      {
        var sInnerHtml = null;
      }
      if (oResp["fldList"][iSetFields]["lookupCons"])
      {
        var sLookupCons = scAjaxSpecCharParser(oResp["fldList"][iSetFields]["lookupCons"]);
      }
      else
      {
        var sLookupCons = "";
      }
      if (oResp["clearUpload"])
      {
        var sClearUpload = scAjaxSpecCharParser(oResp["clearUpload"]);
      }
      else
      {
        var sClearUpload = "N";
      }
      if (oResp["eventField"])
      {
        var sEventField = scAjaxSpecCharParser(oResp["eventField"]);
      }
      else
      {
        var sEventField = "__SC_NO_FIELD";
      }
      if (oResp["fldList"][iSetFields]["switch"])
      {
        var bSwitch = true == oResp["fldList"][iSetFields]["switch"];
      }
      else
      {
        var bSwitch = false;
      }
      if ("checkbox" == sFieldType)
      {
        scAjaxSetFieldCheckbox(sFieldName, oFieldValues, oFieldOptions, iColNum, sHtmComp, sInnerHtml, sOptComp, sOptClass, sOptMulti, bSwitch, sEventField);
      }
      else if ("duplosel" == sFieldType)
      {
        scAjaxSetFieldDuplosel(sFieldName, oFieldValues, oFieldOptions);
      }
      else if ("imagem" == sFieldType)
      {
        scAjaxSetFieldImage(sFieldName, oFieldValues, sImgFile, sImgOrig, sImgLink, sKeepImg, sHideName);
      }
      else if ("documento" == sFieldType)
      {
        scAjaxSetFieldDocument(sFieldName, oFieldValues, sDocLink, sDocIcon, sClearUpload, sDocReadonly);
      }
      else if ("label" == sFieldType)
      {
        scAjaxSetFieldLabel(sFieldName, oFieldValues, oFieldOptions, sLookupCons);
      }
      else if ("radio" == sFieldType)
      {
        scAjaxSetFieldRadio(sFieldName, oFieldValues, oFieldOptions, iColNum, sHtmComp, sOptComp, bSwitch, sEventField);
      }
      else if ("select" == sFieldType)
      {
        scAjaxSetFieldSelect(sFieldName, oFieldValues, oFieldOptions, bSelectDD, bSelect2AC, iRow, sEventField, thisRow);
      }
      else if ("text" == sFieldType)
      {
        scAjaxSetFieldText(sFieldName, oFieldValues, sLookupCons, thisRow, sEventField);
      }
      else if ("color_palette" == sFieldType)
      {
        scAjaxSetFieldColorPalette(sFieldName, oFieldValues);
      }
      else if ("editor_html" == sFieldType)
      {
        scAjaxSetFieldEditorHtml(sFieldName, oFieldValues);
      }
      else if ("imagehtml" == sFieldType)
      {
        scAjaxSetFieldImageHtml(sFieldName, oFieldValues, sImgHtml);
      }
      else if ("innerhtml" == sFieldType)
      {
        scAjaxSetFieldInnerHtml(sFieldName, oFieldValues);
      }
      else if ("multi_upload" == sFieldType)
      {
        scAjaxSetFieldMultiUpload(sFieldName, sMULHtml);
      }
      else if ("recur_info" == sFieldType)
      {
        scAjaxSetFieldRecurInfo(sFieldName, sMULHtml);
      }
      else if ("signature" == sFieldType)
      {
        scAjaxSetFieldSignature(sFieldName, oFieldValues);
      }
      else if ("rating" == sFieldType)
      {
        scAjaxSetFieldRating(sFieldName, oFieldValues, thisRow);
      }
      scAjaxUpdateHeaderFooter(sFieldName, oFieldValues);
    }
  } // scAjaxSetFields

  function scAjaxUpdateHeaderFooter(sFieldName, oFieldValues)
  {
    if (self.updateHeaderFooter)
    {
      if (null == oFieldValues)
      {
        sNewValue = '';
      }
      else if (oFieldValues[0]["label"])
      {
        sNewValue = oFieldValues[0]["label"];
      }
      else
      {
        sNewValue = oFieldValues[0]["value"];
      }
      updateHeaderFooter(sFieldName, scAjaxSpecCharParser(sNewValue));
    }
  } // scAjaxUpdateHeaderFooter

  function scAjaxSetFieldText(sFieldName, oFieldValues, sLookupCons, thisRow, sEventField)
  {
    if (document.F1.elements[sFieldName])
    {
      var jqField = $("#id_sc_field_" + sFieldName),
          Temp_text = scAjaxReturnBreakLine(scAjaxSpecCharParser(scAjaxProtectBreakLine(oFieldValues[0]['value'])));
      if (jqField.length)
      {
        jqField.val(Temp_text);
        if (sEventField != sFieldName && sEventField != "__SC_NO_FIELD" && sEventField != "")
        {
          //jqField.trigger("change");
        }
      }
      else
      {
        eval("document.F1." + sFieldName + ".value = Temp_text");
      }
      if (scEventControl_data[sFieldName]) {
        scEventControl_data[sFieldName]["calculated"] = Temp_text;
      }
    }
    if (document.getElementById("id_lookup_" + sFieldName))
    {
      document.getElementById("id_lookup_" + sFieldName).innerHTML = sLookupCons;
    }
    if (oFieldValues[0]['label'])
    {
      scAjaxSetReadonlyArrayValue(sFieldName, oFieldValues);
    }
    else
    {
      oFieldValues[0]['value'] = scAjaxBreakLine(oFieldValues[0]['value']);
      scAjaxSetReadonlyValue(sFieldName, oFieldValues[0]['value']);
    }
	scAjaxSetSliderValue(sFieldName, thisRow);
  } // scAjaxSetFieldText

  function scAjaxSetSliderValue(fieldName, thisRow)
  {
	  var sliderObject = $("#sc-ui-slide-" + fieldName);
	  if (!sliderObject.length) {
		  return;
	  }
	  scJQSlideValue(fieldName, thisRow);
  } // scAjaxSetSliderValue

  function scAjaxSetFieldColorPalette(sFieldName, oFieldValues)
  {
    if (document.F1.elements[sFieldName])
    {
        var Temp_text = scAjaxReturnBreakLine(scAjaxSpecCharParser(scAjaxProtectBreakLine(oFieldValues[0]['value'])));
        eval ("document.F1." + sFieldName + ".value = Temp_text");
    }
    if (oFieldValues[0]['label'])
    {
      scAjaxSetReadonlyArrayValue(sFieldName, oFieldValues);
    }
    else
    {
      oFieldValues[0]['value'] = scAjaxBreakLine(oFieldValues[0]['value']);
	  setaCorPaleta(sFieldName, oFieldValues[0]['value']);
      scAjaxSetReadonlyValue(sFieldName, oFieldValues[0]['value']);
    }
  } // scAjaxSetFieldColorPalette

  function scAjaxSetFieldSelect(sFieldName, oFieldValues, oFieldOptions, bSelectDD, bSelect2AC, iRow, sEventField, thisRow)
  {
    sFieldNameHtml = sFieldName;
    if (!document.F1.elements[sFieldName] && !document.F1.elements[sFieldName + "[]"])
    {
      return;
    }
    if (bSelectDD)
    {
        $("#id_sc_field_" + sFieldName).dropdownchecklist("destroy");
    }
    if (!document.F1.elements[sFieldName] && document.F1.elements[sFieldName + "[]"])
    {
      sFieldNameHtml += "[]";
    }
    if ("hidden" == document.F1.elements[sFieldNameHtml].type)
    {
      scAjaxSetFieldText(sFieldNameHtml, oFieldValues, "", "", sEventField);
      return;
    }

    if (null != oFieldOptions)
    {
      $("#id_sc_field_" + sFieldName).children().remove()
      if ("<select" != oFieldOptions.substr(0, 7))
      {
        var $oField = $("#id_sc_field_" + sFieldName);
        if (0 < $oField.length)
        {
          $oField.html(oFieldOptions);
        }
        else
        {
          document.getElementById("idAjaxSelect_" + sFieldName).innerHTML = oFieldOptions;
        }
      }
      else
      {
        document.getElementById("idAjaxSelect_" + sFieldName).innerHTML = oFieldOptions;
      }
    }
    var aValues = new Array();
    if (null != oFieldValues)
    {
      for (iFieldSelect = 0; iFieldSelect < oFieldValues.length; iFieldSelect++)
      {
        aValues[iFieldSelect] = scAjaxSpecCharParser(oFieldValues[iFieldSelect]["value"]);
      }
    }
    var oFormField = $("#id_sc_field_" + sFieldName);
    for (iFieldSelect = 0; iFieldSelect < oFormField[0].length; iFieldSelect++)
    {
      if (scAjaxInArray(oFormField[0].options[iFieldSelect].value, aValues))
      {
        oFormField[0].options[iFieldSelect].selected = true;
      }
      else
      {
        oFormField[0].options[iFieldSelect].selected = false;
      }
    }
	scAjaxSetReadonlyArrayValue(sFieldName, oFieldValues, "<br />");
    if (bSelectDD)
    {
        scJQDDCheckBoxAdd(thisRow, true);
    }
	if (bSelect2AC)
	{
		var newOption = new Option(oFieldValues[0]["label"], oFieldValues[0]["value"], true, true);
		$("#id_ac_" + sFieldName).append(newOption);
		$("#id_sc_field_" + sFieldName).val(oFieldValues[0]["value"]);
	}
	else if (oFormField.hasClass("select2-hidden-accessible"))
	{
        $("#id_sc_field_" + sFieldName).select2("destroy");
		var select2Field = sFieldName;
		if ("" != thisRow) {
			select2Field = select2Field.substr(0, select2Field.length - thisRow.toString().length);
		}
        scJQSelect2Add(thisRow, select2Field);
	}
  } // scAjaxSetFieldSelect

  function scAjaxSetFieldDuplosel(sFieldName, oFieldValues, oFieldOptions)
  {
    var sFieldNameOrig = sFieldName + "_orig";
    var sFieldNameDest = sFieldName + "_dest";
    var oFormFieldOrig = document.F1.elements[sFieldNameOrig];
    var oFormFieldDest = document.F1.elements[sFieldNameDest];

    if (null != oFieldOptions)
    {
      scAjaxClearSelect(sFieldNameOrig);
      for (iFieldSelect = 0; iFieldSelect < oFieldOptions.length; iFieldSelect++)
      {
        oFormFieldOrig.options[iFieldSelect] = new Option(scAjaxSpecCharParser(oFieldOptions[iFieldSelect]["label"]), scAjaxSpecCharParser(oFieldOptions[iFieldSelect]["value"]));
      }
    }
    while (oFormFieldDest.length > 0)
    {
      oFormFieldDest.options[0] = null;
    }
    var aValues = new Array();
    if (null != oFieldValues)
    {
      for (iFieldSelect = 0; iFieldSelect < oFieldValues.length; iFieldSelect++)
      {
        sNewOptionLabel = oFieldValues[iFieldSelect]["label"] ? scAjaxSpecCharParser(oFieldValues[iFieldSelect]["label"]) : scAjaxSpecCharParser(oFieldValues[iFieldSelect]["value"]);
        sNewOptionValue = scAjaxSpecCharParser(oFieldValues[iFieldSelect]["value"]);
        if (sNewOptionValue.substr(0, 8) == "@NMorder")
        {
           sNewOptionValue                      = sNewOptionValue.substr(8);
           oFormFieldDest.options[iFieldSelect] = new Option(scAjaxSpecCharParser(sNewOptionLabel), sNewOptionValue);
           sNewOptionValue                      = sNewOptionValue.substr(1);
           aValues[iFieldSelect]                = sNewOptionValue;
        }
        else
        {
           aValues[iFieldSelect]                = sNewOptionValue;
           oFormFieldDest.options[iFieldSelect] = new Option(scAjaxSpecCharParser(sNewOptionLabel), sNewOptionValue);
        }
      }
    }
    for (iFieldSelect = 0; iFieldSelect < oFormFieldOrig.length; iFieldSelect++)
    {
      oFormFieldOrig.options[iFieldSelect].selected = false;
      if (scAjaxInArray(oFormFieldOrig.options[iFieldSelect].value, aValues))
      {
        oFormFieldOrig.options[iFieldSelect].disabled    = true;
        oFormFieldOrig.options[iFieldSelect].style.color = "#A0A0A0";
      }
      else
      {
        oFormFieldOrig.options[iFieldSelect].disabled = false;
      }
    }
    scAjaxSetReadonlyArrayValue(sFieldName, oFieldValues, "<br />");
  } // scAjaxSetFieldDuplosel

  function scAjaxSetFieldCheckbox(sFieldName, oFieldValues, oFieldOptions, iColNum, sHtmComp, sInnerHtml, sOptComp, sOptClass, sOptMulti, bSwitch, sEventField)
  {
	if (null == bSwitch)
	{
	  bSwitch = false;
	}
    if (document.getElementById("idAjaxCheckbox_" + sFieldName) && null != sInnerHtml)
    {
      document.getElementById("idAjaxCheckbox_" + sFieldName).innerHTML = sInnerHtml;
      return;
    }
    if (null != oFieldOptions)
    {
        scAjaxClearCheckbox(sFieldName);
    }
    if (document.F1.elements[sFieldName] && "hidden" == document.F1.elements[sFieldName].type)
    {
      scAjaxSetFieldText(sFieldName, oFieldValues, "", "", sEventField);
      return;
    }
    if (null != oFieldOptions && "" != oFieldOptions)
    {
/*      scAjaxClearCheckbox(sFieldName); */
      scAjaxRecreateOptions("Checkbox", "checkbox", sFieldName, oFieldValues, oFieldOptions, iColNum, sHtmComp, sOptComp, sOptClass, sOptMulti, bSwitch);
    }
    else
    {
      scAjaxSetCheckboxOptions(sFieldName, oFieldValues);
    }
	scAjaxSetSwitchOptions(sFieldName, "checkbox");
    scAjaxSetReadonlyArrayValue(sFieldName, oFieldValues, "<br />");
  } // scAjaxSetFieldCheckbox

  function scAjaxSetFieldRadio(sFieldName, oFieldValues, oFieldOptions, iColNum, sHtmComp, sOptComp, bSwitch, sEventField)
  {
	if (null == bSwitch)
	{
	  bSwitch = false;
	}
    if (document.F1.elements[sFieldName] && "hidden" == document.F1.elements[sFieldName].type)
    {
      scAjaxSetFieldText(sFieldName, oFieldValues, "", "", sEventField);
      return;
    }
    if (null != oFieldOptions)
    {
        scAjaxClearRadio(sFieldName);
    }
    if (null != oFieldOptions && "" != oFieldOptions)
    {
/*      scAjaxClearRadio(sFieldName); */
      scAjaxRecreateOptions("Radio", "radio", sFieldName, oFieldValues, oFieldOptions, iColNum, sHtmComp, sOptComp, "", "", bSwitch);
    }
    else
    {
      scAjaxSetRadioOptions(sFieldName, oFieldValues);
    }
	scAjaxSetSwitchOptions(sFieldName, "radio");
    scAjaxSetReadonlyArrayValue(sFieldName, oFieldValues, "<br />");
  } // scAjaxSetFieldRadio

  function scAjaxSetSwitchOptions(fieldName, fieldType)
  {
	var fieldOptions = $(".sc-ui-" + fieldType + "-" + fieldName + ".lc-switch");
	if (!fieldOptions.length) {
		return;
	}
	for (var i = 0; i < fieldOptions.length; i++) {
		if ($(fieldOptions[i]).prop("checked")) {
			$(fieldOptions[i]).lcs_on();
		}
		else {
			$(fieldOptions[i]).lcs_off();
		}
	}
  }

  function scAjaxSetFieldLabel(sFieldName, oFieldValues, oFieldOptions, sLookupCons)
  {
    sFieldValue = oFieldValues[0]["value"];
    if ("undefined" == typeof oFieldValues[0]["label"]) {
      sFieldLabel = oFieldValues[0]["value"];
    } else {
      sFieldLabel = oFieldValues[0]["label"];
    }
    sFieldLabel = scAjaxBreakLine(sFieldLabel);
    if (null != oFieldOptions)
    {
      for (iRecreate = 0; iRecreate < oFieldOptions.length; iRecreate++)
      {
        sOptText  = scAjaxSpecCharParser(oFieldOptions[iRecreate]["value"]);
        sOptValue = scAjaxSpecCharParser(oFieldOptions[iRecreate]["label"]);
        if (sFieldValue == sOptText)
        {
          sFieldLabel = sOptValue;
        }
      }
    }
    if (document.getElementById("id_ajax_label_" + sFieldName))
    {
      document.getElementById("id_ajax_label_" + sFieldName).innerHTML = scAjaxSpecCharParser(sFieldLabel);
    }
    if (document.F1.elements[sFieldName])
    {
//      document.F1.elements[sFieldName].value = scAjaxSpecCharParser(sFieldValue);
        Temp_text = scAjaxProtectBreakLine(sFieldValue);
        Temp_text = scAjaxSpecCharParser(Temp_text);
        document.F1.elements[sFieldName].value = scAjaxReturnBreakLine(Temp_text);

    }
    if (document.getElementById("id_lookup_" + sFieldName))
    {
      document.getElementById("id_lookup_" + sFieldName).innerHTML = sLookupCons;
    }
    scAjaxSetReadonlyValue(sFieldName, scAjaxSpecCharParser(sFieldLabel));
  } // scAjaxSetFieldLabel

  function scAjaxSetFieldImage(sFieldName, oFieldValues, sImgFile, sImgOrig, sImgLink, sKeepImg, sHideName)
  {
    if (!document.F1.elements[sFieldName] && !document.F1.elements[sFieldName + "[]"])
    {
      return;
    }
    if ("N" == sKeepImg && document.getElementById("id_ajax_img_"  + sFieldName))
    {
      document.getElementById("id_ajax_img_"  + sFieldName).src           = scAjaxSpecCharParser(sImgFile);
      document.getElementById("id_ajax_img_"  + sFieldName).style.display = ("" == sImgFile) ? "none" : "";
    }
    if (document.getElementById("id_ajax_link_" + sFieldName) && null != sImgLink)
    {
      document.getElementById("id_ajax_link_" + sFieldName).innerHTML = oFieldValues[0]["value"];
      document.getElementById("id_ajax_link_" + sFieldName).href      = scAjaxSpecCharParser(sImgLink);
    }
    if (document.getElementById("chk_ajax_img_" + sFieldName))
    {
      document.getElementById("chk_ajax_img_" + sFieldName).style.display = ("" == oFieldValues[0]["value"]) ? "none" : "";
    }
    if ("" == oFieldValues[0]["value"] && document.F1.elements[sFieldName + "_limpa"])
    {
      document.F1.elements[sFieldName + "_limpa"].checked = false;
    }
    if ("N" == sKeepImg && document.getElementById("txt_ajax_img_" + sFieldName))
    {
      document.getElementById("txt_ajax_img_" + sFieldName).innerHTML     = oFieldValues[0]["value"];
      document.getElementById("txt_ajax_img_" + sFieldName).style.display = ("" == oFieldValues[0]["value"] || "S" == sHideName) ? "none" : "";
    }
    if ("" != sImgOrig)
    {
      eval("if (var_ajax_img_" + sFieldName + ") var_ajax_img_" + sFieldName + " = '" + sImgOrig + "';");
      if (document.F1.elements["temp_out1_" + sFieldName])
      {
        document.F1.elements["temp_out_" + sFieldName].value = sImgFile;
        document.F1.elements["temp_out1_" + sFieldName].value = sImgOrig;
      }
      else if (document.F1.elements["temp_out_" + sFieldName])
      {
        document.F1.elements["temp_out_" + sFieldName].value = sImgOrig;
      }
    }
    if ("" != oFieldValues[0]["value"])
    {
      if (document.F1.elements[sFieldName + "_salva"]) document.F1.elements[sFieldName + "_salva"].value = oFieldValues[0]["value"];
    }
    else if (oResp && oResp["ajaxRequest"] && "navigate_form" == oResp["ajaxRequest"])
    {
      if (document.F1.elements[sFieldName + "_salva"]) document.F1.elements[sFieldName + "_salva"].value = "";
    }
    scAjaxSetReadonlyValue(sFieldName, scAjaxSpecCharParser(oFieldValues[0]["value"]));
  } // scAjaxSetFieldImage

  function scAjaxSetFieldDocument(sFieldName, oFieldValues, sDocLink, sDocIcon, sClearUpload, sDocReadonly)
  {
    if (!document.F1.elements[sFieldName] && !document.F1.elements[sFieldName + "[]"])
    {
      return;
    }
    document.getElementById("id_ajax_doc_"  + sFieldName).innerHTML = scAjaxSpecCharParser(sDocLink);
    if (document.getElementById("id_ajax_doc_icon_"  + sFieldName))
    {
      document.getElementById("id_ajax_doc_icon_"  + sFieldName).src = scAjaxSpecCharParser(sDocIcon);
    }
    if ("" == oFieldValues[0]["value"])
    {
      document.getElementById("chk_ajax_img_" + sFieldName).style.display = "none";
      document.getElementById("id_ajax_doc_" + sFieldName).style.display = "none";
    }
    else
    {
      document.getElementById("chk_ajax_img_" + sFieldName).style.display = "";
      document.getElementById("id_ajax_doc_" + sFieldName).style.display = "";
    }
    if ("" == oFieldValues[0]["value"] && document.F1.elements[sFieldName + "_limpa"])
    {
      document.F1.elements[sFieldName + "_limpa"].checked = false;
    }
    if ("S" == sClearUpload && document.F1.elements[sFieldName + "_ul_name"])
    {
      document.F1.elements[sFieldName + "_ul_name"].value = "";
    }
    if ("" != sDocLink && sDocReadonly == "S")
    {
      scAjaxSetReadonlyValue(sFieldName, sDocLink);
    }
    else
    {
      scAjaxSetReadonlyValue(sFieldName, scAjaxSpecCharParser(oFieldValues[0]["value"]));
    }
  } // scAjaxSetFieldDocument

  function scAjaxSetFieldInnerHtml(sFieldName, oFieldValues)
  {
    if (document.getElementById(sFieldName))
    {
      document.getElementById(sFieldName).innerHTML = scAjaxSpecCharParser(oFieldValues[0]["value"]);
    }
  } // scAjaxSetFieldInnerHtml

  function scAjaxSetFieldMultiUpload(sFieldName, sMULHtml)
  {
    if (!document.F1.elements[sFieldName] && !document.F1.elements[sFieldName + "[]"])
    {
      return;
    }
    $("#id_sc_loaded_" + sFieldName).html(scAjaxSpecCharParser(sMULHtml));
  } // scAjaxSetFieldMultiUpload

  function scAjaxExecFieldEditorHtml(strOption, bolUI, oField)
  {
	  	if(tinymce.majorVersion > 3)
		{
			if(strOption == 'mceAddControl')
			{
				tinymce.execCommand('mceAddEditor', bolUI, oField);
			}else
			if(strOption == 'mceRemoveControl')
			{
				tinymce.execCommand('mceRemoveEditor', bolUI, oField);
			}
		}
		else
		{
			tinyMCE.execCommand(strOption, bolUI, oField);
		}
  }

  function scAjaxSetFieldEditorHtml(sFieldName, oFieldValues)
  {
    if (!document.F1.elements[sFieldName])
    {
      return;
    }
	if(tinymce.majorVersion > 3)
	{
		var oFormField = tinyMCE.get(sFieldName);
	}
	else
	{
		var oFormField = tinyMCE.getInstanceById(sFieldName);
	}
    oFormField.setContent(scAjaxSpecCharParser(oFieldValues[0]["value"]));
    scAjaxSetReadonlyValue(sFieldName, scAjaxSpecCharParser(oFieldValues[0]["value"]));
  } // scAjaxSetFieldEditorHtml

  function scAjaxSetFieldImageHtml(sFieldName, oFieldValues, sImgHtml)
  {
    if (document.getElementById("id_imghtml_" + sFieldName))
    {
      document.getElementById("id_imghtml_" + sFieldName).innerHTML = scAjaxSpecCharParser(sImgHtml);
    }
  } // scAjaxSetFieldEditorHtml

  function scAjaxSetFieldRecurInfo(sFieldName, oFieldValues)
  {
	  var jsonData = "" != oFieldValues[0]["value"]
	               ? JSON.parse(oFieldValues[0]["value"])
				   : { repeat: "1", endon: "E", endafter: "", endin: ""};
	  $("#id_rinf_repeat_" + sFieldName).val(jsonData.repeat);
	  $(".cl_rinf_endon_" + sFieldName).filter(function(index) {return $(this).val() == jsonData.endon}).prop("checked", true),
	  $("#id_rinf_endafter_" + sFieldName).val(jsonData.endafter);
	  $("#id_rinf_endin_" + sFieldName).val(jsonData.endin);
	  scAjaxSetReadonlyValue(sFieldName, scAjaxSpecCharParser(oFieldValues[0]["value"]));
  } // scAjaxSetFieldRecurInfo

  function scAjaxSetFieldSignature(sFieldName, oFieldValues)
  {
	var fieldValue = scAjaxSpecCharParser(oFieldValues[0]['value']);
	if ("data:image/png;base64," != fieldValue.substr(0, 22) && "data:image/jsignature;base30," != fieldValue.substr(0, 29))
	{
		scJQSignatureClear(sFieldName);
		return;
	}
	$("#id_sc_field_" + sFieldName).val(fieldValue);
	scJQSignatureRedraw(sFieldName);
  } // scAjaxSetFieldSignature

  function scAjaxSetFieldRating(sFieldName, oFieldValues, thisRow)
  {
	$("#id_sc_field_" + sFieldName).val(oFieldValues[0]['value']);
	if ("" != thisRow) {
      sFieldName = sFieldName.substr(0, sFieldName.lastIndexOf("_") + 1);
	}
	scJQRatingRedraw(sFieldName, thisRow);
  } // scAjaxSetFieldRating

  function scAjaxSetCheckboxOptions(sFieldName, oFieldValues)
  {
    if (!document.F1.elements[sFieldName] && !document.F1.elements[sFieldName + "[]"] && !document.F1.elements[sFieldName + "[0]"])
    {
      return;
    }
    var aValues    = new Array();
    if (null != oFieldValues)
    {
      for (iFieldSelect = 0; iFieldSelect < oFieldValues.length; iFieldSelect++)
      {
        aValues[iFieldSelect] = scAjaxSpecCharParser(oFieldValues[iFieldSelect]["value"]);
      }
    }
    if (document.F1.elements[sFieldName + "[]"])
    {
      var oFormField = document.F1.elements[sFieldName + "[]"];
      if (oFormField.length)
      {
        for (iFieldCheckbox = 0; iFieldCheckbox < oFormField.length; iFieldCheckbox++)
        {
          if (scAjaxInArray(oFormField[iFieldCheckbox].value, aValues))
          {
            oFormField[iFieldCheckbox].checked = true;
          }
          else
          {
            oFormField[iFieldCheckbox].checked = false;
          }
        }
      }
      else
      {
        if (scAjaxInArray(oFormField.value, aValues))
        {
          oFormField.checked = true;
        }
        else
        {
          oFormField.checked = false;
        }
      }
    }
    else if (document.F1.elements[sFieldName + "[0]"])
    {
      for (iFieldCheckbox = 0; iFieldCheckbox < document.F1.elements.length; iFieldCheckbox++)
      {
        oFormElement = document.F1.elements[iFieldCheckbox];
        if (sFieldName + "[" == oFormElement.name.substr(0, sFieldName.length + 1) && scAjaxInArray(oFormElement.value, aValues))
        {
          oFormElement.checked = true;
        }
        else if (sFieldName + "[" == oFormElement.name.substr(0, sFieldName.length + 1))
        {
          oFormElement.checked = false;
        }
      }
    }
    else
    {
      oFormElement = document.F1.elements[sFieldName];
      if (scAjaxInArray(oFormElement.value, aValues))
      {
        oFormElement.checked = true;
      }
      else
      {
        oFormElement.checked = false;
      }
    }
  } // scAjaxSetCheckboxOptions

  function scAjaxSetRadioOptions(sFieldName, oFieldValues)
  {
    if (!document.F1.elements[sFieldName])
    {
      return;
    }
    var oFormField = document.F1.elements[sFieldName];
    var aValues    = new Array();
    if (null != oFieldValues)
    {
      for (iFieldSelect = 0; iFieldSelect < oFieldValues.length; iFieldSelect++)
      {
        aValues[iFieldSelect] = scAjaxSpecCharParser(oFieldValues[iFieldSelect]["value"]);
      }
    }
    for (iFieldRadio = 0; iFieldRadio < oFormField.length; iFieldRadio++)
    {
      oFormField[iFieldRadio].checked = false;
    }
    for (iFieldRadio = 0; iFieldRadio < oFormField.length; iFieldRadio++)
    {
      if (scAjaxInArray(oFormField[iFieldRadio].value, aValues))
      {
        oFormField[iFieldRadio].checked = true;
      }
    }
  } // scAjaxSetRadioOptions

  function scAjaxSetReadonlyValue(sFieldName, sFieldValue)
  {
    if (document.getElementById("id_read_on_" + sFieldName))
    {
      document.getElementById("id_read_on_" + sFieldName).innerHTML = sFieldValue;
    }
  } // scAjaxSetReadonlyValue

  function scAjaxSetReadonlyArrayValue(sFieldName, oFieldValues, sDelim)
  {
    if (null == oFieldValues)
    {
      return;
    }
    if (null == sDelim)
    {
      sDelim = " ";
    }
    sReadLabel = "";
    for (iReadArray = 0; iReadArray < oFieldValues.length; iReadArray++)
    {
      if (oFieldValues[iReadArray]["label"])
      {
        if ("" != sReadLabel)
        {
          sReadLabel += sDelim;
        }
        sReadLabel += oFieldValues[iReadArray]["label"];
      }
      else if (oFieldValues[iReadArray]["value"])
      {
        if ("" != sReadLabel)
        {
          sReadLabel += sDelim;
        }
        sReadLabel += oFieldValues[iReadArray]["value"];
      }
    }
    scAjaxSetReadonlyValue(sFieldName, sReadLabel);
  } // scAjaxSetReadonlyArrayValue

  function scAjaxGetFieldValue(sFieldGet)
  {
    sValue = "";
    if (!oResp["fldList"])
    {
      return sValue;
    }
    for (iFieldValue = 0; iFieldValue < oResp["fldList"].length; iFieldValue++)
    {
      var sFieldName  = oResp["fldList"][iFieldValue]["fldName"];
      if (oResp["fldList"][iFieldValue]["valList"])
      {
        var oFieldValues = oResp["fldList"][iFieldValue]["valList"];
        if (0 == oFieldValues.length)
        {
          oFieldValues = null;
        }
      }
      else
      {
        var oFieldValues = null;
      }
      if (sFieldGet == sFieldName && null != oFieldValues)
      {
        if (1 == oFieldValues.length)
        {
          sValue = scAjaxSpecCharParser(oFieldValues[0]["value"]);
        }
        else
        {
          sValue = new Array();
          for (jFieldValue = 0; jFieldValue < oFieldValues.length; jFieldValue++)
          {
            sValue[jFieldValue] = scAjaxSpecCharParser(oFieldValues[jFieldValue]["value"]);
          }
        }
      }
    }
    return sValue;
  } // scAjaxGetFieldValue

  function scAjaxGetKeyValue(sFieldGet)
  {
    sValue = "";
    if (!oResp["fldList"])
    {
      return sValue;
    }
    for (iKeyValue = 0; iKeyValue < oResp["fldList"].length; iKeyValue++)
    {
      var sFieldName = oResp["fldList"][iKeyValue]["fldName"];
      if (sFieldGet == sFieldName)
      {
        if (oResp["fldList"][iKeyValue]["keyVal"])
        {
          return scAjaxSpecCharParser(oResp["fldList"][iKeyValue]["keyVal"]);
        }
        else
        {
          return scAjaxGetFieldValue(sFieldGet);
        }
      }
    }
    return sValue;
  } // scAjaxGetKeyValue

  function scAjaxGetLineNumber()
  {
    sLineNumber = "";
    if (oResp["errList"])
    {
      for (iLineNumber = 0; iLineNumber < oResp["errList"].length; iLineNumber++)
      {
        if (oResp["errList"][iLineNumber]["numLinha"])
        {
          sLineNumber = oResp["errList"][iLineNumber]["numLinha"];
        }
      }
      return sLineNumber;
    }
    if (oResp["fldList"])
    {
      return oResp["fldList"][0]["numLinha"];
    }
    if (oResp["msgDisplay"])
    {
      return oResp["msgDisplay"]["numLinha"];
    }
    return sLineNumber;
  } // scAjaxGetLineNumber

  function scAjaxFieldExists(sFieldGet)
  {
    bExists = false;
    if (!oResp["fldList"])
    {
      return bExists;
    }
    for (iFieldValue = 0; iFieldValue < oResp["fldList"].length; iFieldValue++)
    {
      var sFieldName  = oResp["fldList"][iFieldValue]["fldName"];
      if (oResp["fldList"][iFieldValue]["valList"])
      {
        var oFieldValues = oResp["fldList"][iFieldValue]["valList"];
        if (0 == oFieldValues.length)
        {
          oFieldValues = null;
        }
      }
      else
      {
        var oFieldValues = null;
      }
      if (sFieldGet == sFieldName && null != oFieldValues)
      {
        bExists = true;
      }
    }
    return bExists;
  } // scAjaxFieldExists

  function scAjaxGetFieldText(sFieldName)
  {
    $oHidden = $("input[name='" + sFieldName + "']");
    if (!$oHidden.length)
    {
      $oHidden = $("input[name='" + sFieldName + "_']");
    }
    if ($oHidden.length)
    {
      for (var i = 0; i < $oHidden.length; i++)
      {
        if ("hidden" == $oHidden[i].type && $oHidden[i].form && $oHidden[i].form.name && "F1" == $oHidden[i].form.name)
        {
          return scAjaxSpecCharProtect($oHidden[i].value);//.replace(/[+]/g, "__NM_PLUS__");
        }
      }
    }
    $oField = $("#id_sc_field_" + sFieldName);
    if(!$oField.length)
    {
      $oField = $("#id_sc_field_" + sFieldName + "_");
    }
    if ($oField.length && "select" != $oField[0].type.substr(0, 6))
    {
      return scAjaxSpecCharProtect($oField.val());//.replace(/[+]/g, "__NM_PLUS__");
    }
    else if (document.F1.elements[sFieldName])
    {
      return scAjaxSpecCharProtect(document.F1.elements[sFieldName].value);//.replace(/[+]/g, "__NM_PLUS__");
    }
    else if (document.F1.elements[sFieldName + '_'])
    {
      return scAjaxSpecCharProtect(document.F1.elements[sFieldName + '_'].value);//.replace(/[+]/g, "__NM_PLUS__");
    }
    else
    {
      return '';
    }
  } // scAjaxGetFieldText

  function scAjaxGetFieldHidden(sFieldName)
  {
    for( i= 0; i < document.F1.elements.length; i++)
    {
       if (document.F1.elements[i].name == sFieldName)
       {
          return scAjaxSpecCharProtect(document.F1.elements[i].value);//.replace(/[+]/g, "__NM_PLUS__");
       }
    }
//    return document.F1.elements[sFieldName].value.replace(/[+]/g, "__NM_PLUS__");
  } // scAjaxGetFieldHidden

  function scAjaxGetFieldSelect(sFieldName)
  {
    sFieldNameHtml = sFieldName;
    if (!document.F1.elements[sFieldName] && !document.F1.elements[sFieldName + "[]"])
    {
      return "";
    }
    if (!document.F1.elements[sFieldName] && document.F1.elements[sFieldName + "[]"])
    {
      sFieldNameHtml += "[]";
    }
    if ("hidden" == document.F1.elements[sFieldNameHtml].type)
    {
      return scAjaxGetFieldHidden(sFieldNameHtml);
    }
    var oFormField = document.F1.elements[sFieldNameHtml];
    var iSelected  = oFormField.selectedIndex;
    if (-1 < iSelected)
    {
      return scAjaxSpecCharProtect(oFormField.options[iSelected].value);//.replace(/[+]/g, "__NM_PLUS__");
    }
    else
    {
      return "";
    }
  } // scAjaxGetFieldSelect

  function scAjaxGetFieldSelectMult(sFieldName, sFieldDelim)
  {
    sFieldNameHtml = sFieldName;
    if (!document.F1.elements[sFieldName] && document.F1.elements[sFieldName + "[]"])
    {
      sFieldNameHtml += "[]";
    }
    if ("hidden" == document.F1.elements[sFieldNameHtml].type)
    {
      return scAjaxGetFieldHidden(sFieldNameHtml);
    }
    var oFormField = document.F1.elements[sFieldNameHtml];
    var sFieldVals = "";
    for (iFieldSelect = 0; iFieldSelect < oFormField.length; iFieldSelect++)
    {
      if (oFormField[iFieldSelect].selected)
      {
        if ("" != sFieldVals)
        {
          sFieldVals += sFieldDelim;
        }
        sFieldVals += scAjaxSpecCharProtect(oFormField[iFieldSelect].value);//.replace(/[+]/g, "__NM_PLUS__");
      }
    }
    return sFieldVals;
  } // scAjaxGetFieldSelectMult

  function scAjaxGetFieldCheckbox(sFieldName, sDelim)
  {
    var aValues = new Array();
    var sValue  = "";
    if (!document.F1.elements[sFieldName] && !document.F1.elements[sFieldName + "[]"] && !document.F1.elements[sFieldName + "[0]"])
    {
      return sValue;
    }
    if (document.F1.elements[sFieldName + "[]"] && "hidden" == document.F1.elements[sFieldName + "[]"].type)
    {
      return scAjaxGetFieldHidden(sFieldName + "[]");
    }
    if (document.F1.elements[sFieldName] && "hidden" == document.F1.elements[sFieldName].type)
    {
      return scAjaxGetFieldHidden(sFieldName);
    }
    if (document.F1.elements[sFieldName + "[]"])
    {
      var oFormField = document.F1.elements[sFieldName + "[]"];
      if (oFormField.length)
      {
        for (iFieldCheck = 0; iFieldCheck < oFormField.length; iFieldCheck++)
        {
          if (oFormField[iFieldCheck].checked)
          {
            aValues[aValues.length] = oFormField[iFieldCheck].value;
          }
        }
      }
      else
      {
        if (oFormField.checked)
        {
          aValues[aValues.length] = oFormField.value;
        }
      }
    }
    else
    {
      for (iFieldCheck = 0; iFieldCheck < document.F1.elements.length; iFieldCheck++)
      {
        oFormElement = document.F1.elements[iFieldCheck];
        if (sFieldName + "[" == oFormElement.name.substr(0, sFieldName.length + 1) && oFormElement.checked)
        {
          aValues[aValues.length] = oFormElement.value;
        }
        else if (sFieldName == oFormElement.name && oFormElement.checked)
        {
          aValues[aValues.length] = oFormElement.value;
        }
      }
    }
    for (iFieldCheck = 0; iFieldCheck < aValues.length; iFieldCheck++)
    {
      sValue += scAjaxSpecCharProtect(aValues[iFieldCheck]);//.replace(/[+]/g, "__NM_PLUS__");
      if (iFieldCheck + 1 != aValues.length)
      {
        sValue += sDelim;
      }
    }
    return sValue;
  } // scAjaxGetFieldCheckbox

  function scAjaxGetFieldRadio(sFieldName)
  {
    if ("hidden" == document.F1.elements[sFieldName].type)
    {
      return scAjaxGetFieldHidden(sFieldName);
    }
    var sValue = "";
    if (!document.F1.elements[sFieldName])
    {
      return sValue;
    }
    var oFormField = document.F1.elements[sFieldName];
    if (!oFormField.length)
    {
        var sc_cmp_radio = eval("document.F1." + sFieldName);
        if (sc_cmp_radio.checked)
        {
           sValue = scAjaxSpecCharProtect(sc_cmp_radio.value);//.replace(/[+]/g, "__NM_PLUS__");
        }
    }
    else
    {
      for (iFieldRadio = 0; iFieldRadio < oFormField.length; iFieldRadio++)
      {
        if (oFormField[iFieldRadio].checked)
        {
          sValue = scAjaxSpecCharProtect(oFormField[iFieldRadio].value);//.replace(/[+]/g, "__NM_PLUS__");
        }
      }
    }
    return sValue;
  } // scAjaxGetFieldRadio

  function scAjaxGetFieldEditorHtml(sFieldName)
  {
    if ("hidden" == document.F1.elements[sFieldName].type)
    {
      return scAjaxGetFieldHidden(sFieldName);
    }
    var sValue = "";
    if (!document.F1.elements[sFieldName])
    {
      return sValue;
    }

	if(tinymce.majorVersion > 3)
	{
		var oFormField = tinyMCE.get(sFieldName);
	}
	else
	{
		var oFormField = tinyMCE.getInstanceById(sFieldName);
	}
    return scAjaxSpecCharParser(scAjaxSpecCharProtect(oFormField.getContent()));//.replace(/[+]/g, "__NM_PLUS__"));
  } // scAjaxGetFieldEditorHtml

  function scAjaxGetFieldSignature(sFieldName)
  {
    var signatureData = $("#sc-id-sign-" + sFieldName).jSignature("getData", "base30");
	$("#id_sc_field_" + sFieldName).val("data:" + signatureData[0] + "," + signatureData[1]);
	return $("#id_sc_field_" + sFieldName).val();
  } // scAjaxGetFieldEditorHtml

  function scAjaxGetFieldRecurInfo(sFieldName)
  {
	  var repeatInList = $(".cl_rinf_repeatin_" + sFieldName).filter(":checked"), repeatInValues = [], jsonData, i;
	  for (i = 0; i < repeatInList.length; i++) {
		  repeatInValues.push($(repeatInList[i]).val());
	  }
	  jsonData = {
		  repeat: $("#id_rinf_repeat_" + sFieldName).val(),
		  repeatin: repeatInValues.join(";"),
		  endon: $(".cl_rinf_endon_" + sFieldName).filter(":checked").val(),
		  endafter: $("#id_rinf_endafter_" + sFieldName).val(),
		  endin: $("#id_rinf_endin_" + sFieldName).val()
	  };
	  return JSON.stringify(jsonData);
  } // scAjaxGetFieldRecurInfo

  function scAjaxDoNothing(e)
  {
  } // scAjaxDoNothing

  function scAjaxInArray(mVal, aList)
  {
    for (iInArray = 0; iInArray < aList.length; iInArray++)
    {
      if (aList[iInArray] == mVal)
      {
        return true;
      }
    }
    return false;
  } // scAjaxInArray

  function scAjaxSpecCharParser(sParseString)
  {
    if (null == sParseString) {
      return "";
    }
    var ta = document.createElement("textarea");
    ta.innerHTML = sParseString.replace(/</g, "&lt;").replace(/>/g, "&gt;");
    return ta.value;
  } // scAjaxSpecCharParser

  function scAjaxSpecCharProtect(sOriginal)
  {
        var sProtected;
        sProtected = sOriginal.replace(/[+]/g, "__NM_PLUS__");
        sProtected = sProtected.replace(/[%]/g, "__NM_PERC__");
        return sProtected;
  } // scAjaxSpecCharProtect

  function scAjaxRecreateOptions(sFieldType, sHtmlType, sFieldName, oFieldValues, oFieldOptions, iColNum, sHtmComp, sOptComp, sOptClass, sOptMulti, bSwitch)
  {
    var sSuffix  = ("checkbox" == sHtmlType) ? "[]" : "";
    var sDivName = "idAjax" + sFieldType + "_" + sFieldName;
    var sDivText = "";
    var iCntLine = 0;
    var aValues  = new Array();
    var sClass;
    var markChangedClass;
    if (null != oFieldValues)
    {
      for (iRecreate = 0; iRecreate < oFieldValues.length; iRecreate++)
      {
        aValues[iRecreate] = scAjaxSpecCharParser(oFieldValues[iRecreate]["value"]);
      }
    }
    sDivText += "<table border=0>";
    if ("checkbox" == sHtmlType)
    {
        markChangedClass = "sc-ui-checkbox-" + sFieldName;
    }
    if ("radio" == sHtmlType)
    {
        markChangedClass = "sc-ui-radio-" + sFieldName;
    }
    for (iRecreate = 0; iRecreate < oFieldOptions.length; iRecreate++)
    {
        sOptText  = scAjaxSpecCharParser(oFieldOptions[iRecreate]["label"]);
        sOptValue = scAjaxSpecCharParser(oFieldOptions[iRecreate]["value"]);
        if (0 == iCntLine)
        {
            sDivText += "<tr>";
        }
        iCntLine++;
        if ("" != sOptClass)
        {
            sClass = " class=\"" + sOptClass;
            if ("" != sOptMulti)
            {
                sClass += " " + sOptClass + sOptMulti;
            }
            if ("" != markChangedClass)
            {
                sClass += " " + markChangedClass;
            }
            sClass += "\"";
        }
        else
        {
            sClass = " class=\"";
            if ("" != markChangedClass)
            {
                sClass += " " + markChangedClass;
            }
            sClass += "\"";
        }
        if (sHtmComp == null)
        {
            sHtmComp = "";
        }
        sChecked  = (scAjaxInArray(sOptValue, aValues)) ? " checked" : "";
        sDivText += "<td class=\"scFormDataFontOdd\">";
		if (bSwitch)
		{
			sDivText += "<div class=\"sc ";
			if ("Checkbox" == sFieldType)
			{
				sDivText += "switch";
			}
			else
			{
				sDivText += "radio";
			}
			sDivText += "\">";
		}
        sDivText += "<input id=\"id-opt-" + sFieldName + "-"  + iRecreate + "\" type=\"" + sHtmlType + "\" name=\"" + sFieldName + sSuffix + "\" value=\"" + sOptValue + "\"" + sChecked + " " + sHtmComp + " " + sOptComp + sClass + ">";
		if (bSwitch)
		{
			sDivText += "<span></span>";
		}
        sDivText += "<label for=\"id-opt-" + sFieldName + "-"  + iRecreate + "\">" + sOptText + "</label>";
		if (bSwitch)
		{
			sDivText += "</div>";
		}
        sDivText += "</td>";
        if (iColNum == iCntLine)
        {
            sDivText += "</tr>";
            iCntLine  = 0;
        }
    }
    sDivText += "</table>";
    document.getElementById(sDivName).innerHTML = sDivText;
    if ("" != markChangedClass)
    {
      $("." + markChangedClass).on("click", function() { scMarkFormAsChanged(); });
    }
  } // scAjaxRecreateOptions

  function scAjaxProcOn(bForce)
  {
    if (null == bForce)
    {
      bForce = false;
    }
    if (document.getElementById("id_div_process"))
    {
      if ($ && $.blockUI && !bForce)
      {
        $.blockUI({
          message: $("#id_div_process_block"),
          overlayCSS: { backgroundColor: sc_ajaxBg },
          css: {
            borderColor: sc_ajaxBordC,
            borderStyle: sc_ajaxBordS,
            borderWidth: sc_ajaxBordW
          }
        });
      }
      else
      {
        document.getElementById("id_div_process").style.display = "";
        document.getElementById("id_fatal_error").style.display = "none";
        if (null != scCenterElement)
        {
          scCenterElement(document.getElementById("id_div_process"));
        }
      }
    }
  } // scAjaxProcOn

  function scAjaxProcOff(bForce)
  {
    if (null == bForce)
    {
      bForce = false;
    }
    if (document.getElementById("id_div_process"))
    {
      if ($ && $.unblockUI && !bForce)
      {
        $.unblockUI();
      }
      else
      {
        document.getElementById("id_div_process").style.display = "none";
      }
    }
  } // scAjaxProcOff

  function scAjaxSetMaster()
  {
    if (!oResp["masterValue"])
    {
      return;
    }
	if (scMasterDetailParentIframe && "" != scMasterDetailParentIframe)
	{
      var dbParentFrame = $(parent.document).find("[name='" + scMasterDetailParentIframe + "']");
	  if (!dbParentFrame || !dbParentFrame[0] || !dbParentFrame[0].contentWindow.scAjaxDetailValue)
	  {
		return;
	  }
      for (iMaster = 0; iMaster < oResp["masterValue"].length; iMaster++)
      {
        dbParentFrame[0].contentWindow.scAjaxDetailValue(oResp["masterValue"][iMaster]["index"], oResp["masterValue"][iMaster]["value"]);
      }
	}
    if (!parent || !parent.scAjaxDetailValue)
    {
      return;
    }
    for (iMaster = 0; iMaster < oResp["masterValue"].length; iMaster++)
    {
      parent.scAjaxDetailValue(oResp["masterValue"][iMaster]["index"], oResp["masterValue"][iMaster]["value"]);
    }
  } // scAjaxSetMaster

  function scAjaxSetFocus()
  {
    if (!oResp["setFocus"] && '' == scFocusFirstErrorName)
    {
      return;
    }
    sFieldName = oResp["setFocus"];
    if (document.F1.elements[sFieldName])
    {
        scFocusField(sFieldName);
    }
    scAjaxFocusError();
  } // scAjaxSetFocus

  function scAjaxFocusError()
  {
    if ('' != scFocusFirstErrorName)
    {
      scFocusField(scFocusFirstErrorName);
      scFocusFirstErrorName = '';
    }
  } // scAjaxFocusError

  function scAjaxSetNavStatus(sBarPos)
  {
    if (!oResp["navStatus"])
    {
      return;
    }
    sNavRet = "S";
    sNavAva = "S";
    if (oResp["navStatus"]["ret"])
    {
      sNavRet = oResp["navStatus"]["ret"];
    }
    if (oResp["navStatus"]["ava"])
    {
      sNavAva = oResp["navStatus"]["ava"];
    }
    if ("S" != sNavRet && "N" != sNavRet)
    {
      sNavRet = "S";
    }
    if ("S" != sNavAva && "N" != sNavAva)
    {
      sNavAva = "S";
    }
    Nav_permite_ret = sNavRet;
    Nav_permite_ava = sNavAva;
    nav_atualiza(Nav_permite_ret, Nav_permite_ava, sBarPos);
  } // scAjaxSetNavStatus

  function scAjaxSetSummary()
  {
    if (!oResp["navSummary"])
    {
      return;
    }
    sreg_ini = oResp["navSummary"].reg_ini;
    sreg_qtd = oResp["navSummary"].reg_qtd;
    sreg_tot = oResp["navSummary"].reg_tot;
    summary_atualiza(sreg_ini, sreg_qtd, sreg_tot);
  } // scAjaxSetSummary

  function scAjaxSetNavpage()
  {
    navpage_atualiza(oResp["navPage"]);
  } // scAjaxSetNavpage


  function scAjaxRedir(oTemp)
  {
    if (oTemp && oTemp != null)
    {
        oResp = oTemp;
    }
    if (!oResp["redirInfo"])
    {
      return;
    }
    sMetodo = oResp["redirInfo"]["metodo"];
    sAction = oResp["redirInfo"]["action"];
    if ("location" == sMetodo)
    {
      if ("parent.parent" == oResp["redirInfo"]["target"])
      {
        parent.parent.location = sAction;
      }
      else if ("parent" == oResp["redirInfo"]["target"])
      {
        parent.location = sAction;
      }
      else if ("_blank" == oResp["redirInfo"]["target"])
      {
        window.open(sAction, "_blank");
      }
      else
      {
        document.location = sAction;
      }
    }
    else if ("html" == sMetodo)
    {
        document.write(scAjaxSpecCharParser(oResp["redirInfo"]["action"]));
    }
    else
    {
      if (oResp["redirInfo"]["target"] == "modal")
      {
          tb_show('', sAction + '?script_case_init=' +  oResp["redirInfo"]["script_case_init"] + '&script_case_session=<?php echo session_id() ?>&nmgp_parms=' + oResp["redirInfo"]["nmgp_parms"] + '&nmgp_outra_jan=true&nmgp_url_saida=modal&NMSC_modal=ok&TB_iframe=true&modal=true&height=' +  oResp["redirInfo"]["h_modal"] + '&width=' + oResp["redirInfo"]["w_modal"], '');
          return;
      }
      sFormRedir = (oResp["redirInfo"]["nmgp_outra_jan"]) ? "form_ajax_redir_1" : "form_ajax_redir_2";
      document.forms[sFormRedir].action           = sAction;
      document.forms[sFormRedir].target           = oResp["redirInfo"]["target"];
      document.forms[sFormRedir].nmgp_parms.value = oResp["redirInfo"]["nmgp_parms"];
      if ("form_ajax_redir_1" == sFormRedir)
      {
        document.forms[sFormRedir].nmgp_outra_jan.value = oResp["redirInfo"]["nmgp_outra_jan"];
      }
      else
      {
        document.forms[sFormRedir].nmgp_url_saida.value   = oResp["redirInfo"]["nmgp_url_saida"];
        document.forms[sFormRedir].script_case_init.value = oResp["redirInfo"]["script_case_init"];
      }
      document.forms[sFormRedir].submit();
    }
  } // scAjaxRedir

  function scAjaxSetDisplay(bReset)
  {
    if (null == bReset)
    {
      bReset = false;
    }
    var aDispData = new Array();
    var aDispCont = {};
    var vertButton;
    if (bReset)
    {
      for (iDisplay = 0; iDisplay < ajax_block_list.length; iDisplay++)
      {
        aDispCont[ajax_block_list[iDisplay]] = aDispData.length;
        aDispData[aDispData.length] = new Array(ajax_block_id[ajax_block_list[iDisplay]], "on");
      }
      for (iDisplay = 0; iDisplay < ajax_field_list.length; iDisplay++)
      {
        if (ajax_field_id[ajax_field_list[iDisplay]])
        {
          aFieldIds = ajax_field_id[ajax_field_list[iDisplay]];
          for (iDisplay2 = 0; iDisplay2 < aFieldIds.length; iDisplay2++)
          {
            aDispCont[aFieldIds[iDisplay2]] = aDispData.length;
            aDispData[aDispData.length] = new Array(aFieldIds[iDisplay2], "on");
          }
        }
      }
    }
	var blockDisplay = {};
    if (oResp["blockDisplay"])
    {
      for (iDisplay = 0; iDisplay < oResp["blockDisplay"].length; iDisplay++)
      {
        if (bReset)
        {
          aDispData[ aDispCont[ oResp["blockDisplay"][iDisplay][0] ] ][1] = oResp["blockDisplay"][iDisplay][1];
        }
        else
        {
          aDispData[aDispData.length] = new Array(ajax_block_id[ oResp["blockDisplay"][iDisplay][0] ], oResp["blockDisplay"][iDisplay][1]);
        }
		blockDisplay[ oResp["blockDisplay"][iDisplay][0] ] = oResp["blockDisplay"][iDisplay][1];
      }
	  //scCheckPagesWithoutBlock();
    }
	var fieldDisplay = {}, controlHtmlHideField = [], controlHtmlShowField = [];
    if (oResp["fieldDisplay"])
    {
      for (iDisplay = 0; iDisplay < oResp["fieldDisplay"].length; iDisplay++)
      {
        if (typeof scHideUserField === "function" && "off" == oResp["fieldDisplay"][iDisplay][1]) {
          controlHtmlHideField.push(oResp["fieldDisplay"][iDisplay][0]);
        }
        if (typeof scShowUserField === "function" && "on" == oResp["fieldDisplay"][iDisplay][1]) {
          controlHtmlShowField.push(oResp["fieldDisplay"][iDisplay][0]);
        }
        for (iDisplay2 = 1; iDisplay2 < ajax_field_mult[ oResp["fieldDisplay"][iDisplay][0] ].length; iDisplay2++)
        {
          aFieldIds = ajax_field_id[ ajax_field_mult[ oResp["fieldDisplay"][iDisplay][0] ][iDisplay2] ];
          for (iDisplay3 = 0; iDisplay3 < aFieldIds.length; iDisplay3++)
          {
            if (bReset)
            {
              aDispData[ aDispCont[ aFieldIds[iDisplay3] ] ][1] = oResp["fieldDisplay"][iDisplay][1];
            }
            else
            {
              aDispData[aDispData.length] = new Array(aFieldIds[iDisplay3], oResp["fieldDisplay"][iDisplay][1]);
            }
			if ("hidden_field_data_" == aFieldIds[iDisplay3].substr(0, 18)) {
			  fieldDisplay[ aFieldIds[iDisplay3].substr(18) ] = oResp["fieldDisplay"][iDisplay][1];
			}
          }
        }
      }
    }
    if (oResp["buttonDisplay"])
    {
      for (iDisplay = 0; iDisplay < oResp["buttonDisplay"].length; iDisplay++)
      {
        var sBtnName2 = "";
        switch (oResp["buttonDisplay"][iDisplay][0])
        {
          case "first": var sBtnName = "sc_b_ini"; break;
          case "back": var sBtnName = "sc_b_ret"; break;
          case "forward": var sBtnName = "sc_b_avc"; break;
          case "last": var sBtnName = "sc_b_fim"; break;
          case "insert": var sBtnName = "sc_b_ins"; break;
          case "update": var sBtnName = "sc_b_upd"; break;
          case "delete": var sBtnName = "sc_b_del"; break;
          default: var sBtnName = "sc_b_" + oResp["buttonDisplay"][iDisplay][0]; sBtnName2 = "sc_" + oResp["buttonDisplay"][iDisplay][0]; sBtnName3 = "gbl_sc_" + oResp["buttonDisplay"][iDisplay][0]; break;
        }
        if ("sc_b_ini" == sBtnName || "sc_b_ret" == sBtnName || "sc_b_avc" == sBtnName || "sc_b_fim" == sBtnName)
        {
          scAjaxNavigateButtonDisplay(sBtnName, oResp["buttonDisplay"][iDisplay][1]);
        }
        else
        {
          aDispData[aDispData.length] = new Array(sBtnName, oResp["buttonDisplay"][iDisplay][1]);
          aDispData[aDispData.length] = new Array(sBtnName + "_t", oResp["buttonDisplay"][iDisplay][1]);
          aDispData[aDispData.length] = new Array(sBtnName + "_b", oResp["buttonDisplay"][iDisplay][1]);
        }
        if ("" != sBtnName2)
        {
          aDispData[aDispData.length] = new Array(sBtnName2, oResp["buttonDisplay"][iDisplay][1]);
          aDispData[aDispData.length] = new Array(sBtnName2 + "_top", oResp["buttonDisplay"][iDisplay][1]);
          aDispData[aDispData.length] = new Array(sBtnName2 + "_bot", oResp["buttonDisplay"][iDisplay][1]);
        }
        if ("" != sBtnName3)
        {
          aDispData[aDispData.length] = new Array(sBtnName3, oResp["buttonDisplay"][iDisplay][1]);
          aDispData[aDispData.length] = new Array(sBtnName3 + "_top", oResp["buttonDisplay"][iDisplay][1]);
          aDispData[aDispData.length] = new Array(sBtnName3 + "_bot", oResp["buttonDisplay"][iDisplay][1]);
        }
      }
    }
    if (oResp["buttonDisplayVert"])
    {
      for (iDisplay = 0; iDisplay < oResp["buttonDisplayVert"].length; iDisplay++)
      {
        vertButton = oResp["buttonDisplayVert"][iDisplay];
        aDispData[aDispData.length] = new Array("sc_exc_line_" + vertButton.seq, vertButton.delete);
        if (vertButton.gridView)
        {
          aDispData[aDispData.length] = new Array("sc_open_line_" + vertButton.seq, vertButton.update);
        }
        else
        {
          aDispData[aDispData.length] = new Array("sc_upd_line_" + vertButton.seq, vertButton.update);
        }
      }
    }
    for (iDisplay = 0; iDisplay < aDispData.length; iDisplay++)
    {
      scAjaxElementDisplay(aDispData[iDisplay][0], aDispData[iDisplay][1]);
    }
	for (var blockId in blockDisplay) {
		displayChange_block(blockId, blockDisplay[blockId]);
	}
	for (var fieldId in fieldDisplay) {
		displayChange_field(fieldId, "", fieldDisplay[fieldId]);
	}
	if (controlHtmlHideField.length) {
	  for (iDisplay = 0; iDisplay < controlHtmlHideField.length; iDisplay++) {
	    scHideUserField(controlHtmlHideField[iDisplay]);
	  }
	}
	if (controlHtmlShowField.length) {
	  for (iDisplay = 0; iDisplay < controlHtmlShowField.length; iDisplay++) {
	    scShowUserField(controlHtmlShowField[iDisplay]);
	  }
	}
  } // scAjaxSetDisplay

  function scAjaxNavigateButtonDisplay(sButton, sStatus)
  {
    sButton2 = sButton + "_off";

    if ("off" == sStatus)
    {
      sStatus2 = "off";
    }
    else
    {
      if ("sc_b_ini" == sButton || "sc_b_ret" == sButton)
      {
        if ("S" == Nav_permite_ret)
        {
          sStatus  = "on";
          sStatus2 = "off";
        }
        else
        {
          sStatus  = "off";
          sStatus2 = "on";
        }
      }
      else
      {
        if ("S" == Nav_permite_ava)
        {
          sStatus  = "on";
          sStatus2 = "off";
        }
        else
        {
          sStatus  = "off";
          sStatus2 = "on";
        }
      }
    }

    scAjaxElementDisplay(sButton        , sStatus);
    scAjaxElementDisplay(sButton + "_t" , sStatus);
    scAjaxElementDisplay(sButton + "_b" , sStatus);
    scAjaxElementDisplay(sButton2       , sStatus2);
    scAjaxElementDisplay(sButton2 + "_t", sStatus2);
    scAjaxElementDisplay(sButton2 + "_b", sStatus2);
  } // scAjaxNavigateButtonDisplay

  function scAjaxElementDisplay(sElement, sAction)
  {
    if (ajax_block_tab && ajax_block_tab[sElement] && "" != ajax_block_tab[sElement])
    {
      scAjaxElementDisplay(ajax_block_tab[sElement], sAction);
    }
    if (document.getElementById(sElement))
    {

      if("off" == sAction)
      {
        $('#' + sElement).hide();
      }
      else
      {
        $('#' + sElement).show();
      }
      if (document.getElementById(sElement + "_dumb"))
      {
        if("off" == sAction)
        {
          $('#' + sElement + "_dumb").show();
        }
        else
        {
          $('#' + sElement + "_dumb").hide();
        }
      }
    }
  } // scAjaxElementDisplay

  function scAjaxSetLabel(bReset)
  {
    if (null == bReset)
    {
      bReset = false;
    }
    if (bReset)
    {
      for (iLabel = 0; iLabel < ajax_field_list.length; iLabel++)
      {
        if (ajax_field_list[iLabel] && ajax_error_list[ajax_field_list[iLabel]])
        {
          scAjaxFieldLabel(ajax_field_list[iLabel], ajax_error_list[ajax_field_list[iLabel]]["label"]);
        }
      }
    }
    if (oResp["fieldLabel"])
    {
      for (iLabel = 0; iLabel < oResp["fieldLabel"].length; iLabel++)
      {
        scAjaxFieldLabel(oResp["fieldLabel"][iLabel][0], scAjaxSpecCharParser(oResp["fieldLabel"][iLabel][1]));
      }
    }
  } // scAjaxSetLabel

  function scAjaxFieldLabel(sField, sLabel)
  {
    if (document.getElementById("id_label_" + sField))
    {
      if (document.getElementById("id_label_" + sField).innerHTML != sLabel)
      {
        document.getElementById("id_label_" + sField).innerHTML = sLabel;
      }
    }
    else if (document.getElementById("hidden_field_label_" + sField) && document.getElementById("hidden_field_label_" + sField).innerHTML != sLabel)
    {
      document.getElementById("hidden_field_label_" + sField).innerHTML = sLabel;
    }
  } // scAjaxFieldLabel

  function scAjaxSetReadonly(bReset)
  {
    if (null == bReset)
    {
      bReset = false;
    }
    if (bReset)
    {
      for (iRead = 0; iRead < ajax_field_list.length; iRead++)
      {
        scAjaxFieldRead(ajax_field_list[iRead], ajax_read_only[ajax_field_list[iRead]]);
      }
      for (iRead = 0; iRead < ajax_field_Dt_Hr.length; iRead++)
      {
        scAjaxFieldRead(ajax_field_Dt_Hr[iRead], ajax_read_only[ajax_field_Dt_Hr[iRead]]);
      }
    }
    if (oResp["readOnly"])
    {
      for (iRead = 0; iRead < oResp["readOnly"].length; iRead++)
      {
        if (ajax_read_only[ oResp["readOnly"][iRead][0] ])
        {
          scAjaxFieldRead(oResp["readOnly"][iRead][0], oResp["readOnly"][iRead][1]);
        }
        else if (oResp["rsSize"])
        {
          for (var i = 0; i <= oResp["rsSize"]; i++)
          {
            if (ajax_read_only[ oResp["readOnly"][iRead][0] + i ])
            {
              scAjaxFieldRead(oResp["readOnly"][iRead][0] + i, oResp["readOnly"][iRead][1]);
            }
          }
        }
      }
    }
  } // scAjaxSetReadonly

  function scAjaxFieldRead(sField, sStatus)
  {
    if ("on" == sStatus)
    {
      var sDisplayOff = "none";
      var sDisplayOn  = "";
    }
    else
    {
      var sDisplayOff = "";
      var sDisplayOn  = "none";
    }
    if (document.getElementById("id_read_off_" + sField))
    {
      document.getElementById("id_read_off_" + sField).style.display = sDisplayOff;
    }
    if (document.getElementById("id_sc_dragdrop_" + sField))
    {
      document.getElementById("id_sc_dragdrop_" + sField).style.display = sDisplayOff;
    }
    if (document.getElementById("id_read_on_" + sField))
    {
      document.getElementById("id_read_on_" + sField).style.display = sDisplayOn;
    }
  } // scAjaxFieldRead

  function scAjaxSetBtnVars()
  {
    if (oResp["btnVars"])
    {
      for (iBtn = 0; iBtn < oResp["btnVars"].length; iBtn++)
      {
        eval(oResp["btnVars"][iBtn][0] + " = scAjaxSpecCharParser('" + oResp["btnVars"][iBtn][1] + "');");
      }
    }
  } // scAjaxSetBtnVars

  function scAjaxClearText(sFormField)
  {
    document.F1.elements[sFormField].value = "";
  } // scAjaxClearText

  function scAjaxClearLabel(sFormField)
  {
    document.getElementById("id_ajax_label_" + sFormField).innerHTML = "";
  } // scAjaxClearLabel

  function scAjaxClearSelect(sFormField)
  {
    document.F1.elements[sFormField].length = 0;
  } // scAjaxClearSelect

  function scAjaxClearCheckbox(sFormField)
  {
    document.getElementById("idAjaxCheckbox_" + sFormField).innerHTML = "";
  } // scAjaxClearCheckbox

  function scAjaxClearRadio(sFormField)
  {
    document.getElementById("idAjaxRadio_" + sFormField).innerHTML = "";
  } // scAjaxClearRadio

  function scAjaxClearEditorHtml(sFormField)
  {
    if(tinymce.majorVersion > 3)
        {
                var oFormField = tinyMCE.get(sFieldName);
        }
        else
        {
                var oFormField = tinyMCE.getInstanceById(sFieldName);
        }
    oFormField.setContent("");
  } // scAjaxClearEditorHtml

  function scCheckPagesWithoutBlock()
  {
	var page_id, block_id, has_block_shown;
    for (page_id in ajax_page_blocks) {
	  has_block_shown = false;
      for (block_id in ajax_page_blocks[page_id]) {
		console.log(page_id + ' ' + ajax_page_blocks[page_id][block_id]);
		console.log($("#div_" + ajax_block_id[ajax_page_blocks[page_id][block_id]]).css('display'));
        //$("#div_" + ajax_block_id[block_id]);
      }
    }
  }

  function scAjaxJavascript()
  {
    if (oResp["ajaxJavascript"])
    {
      var sJsFunc = "";
      for (var i = 0; i < oResp["ajaxJavascript"].length; i++)
      {
        sJsFunc = scAjaxSpecCharParser(oResp["ajaxJavascript"][i][0]);
        if ("" != sJsFunc)
        {
          var aParam = new Array();
          if (oResp["ajaxJavascript"][i][1] && 0 < oResp["ajaxJavascript"][i][1].length)
          {
            for (var j = 0; j < oResp["ajaxJavascript"][i][1].length; j++)
            {
              aParam.push("'" + oResp["ajaxJavascript"][i][1][j] + "'");
            }
          }
          eval("if (" + sJsFunc + ") { " + sJsFunc + "(" + aParam.join(", ") + ") }");
        }
      }
    }
  } // scAjaxJavascript

  function scAjaxAlert(callbackOk)
  {
    if (oResp["ajaxAlert"] && oResp["ajaxAlert"]["message"] && "" != oResp["ajaxAlert"]["message"])
    {
      scJs_alert(oResp["ajaxAlert"]["message"], callbackOk, oResp["ajaxAlert"]["params"]);
    }
    else
    {
      callbackOk();
    }
  } // scAjaxAlert

	function scJs_alert_default(message, callbackOk) {
		alert(message);
		if (typeof callbackOk == "function") {
			callbackOk();
		}
	} // scJs_alert_default

	function scJs_confirm_default(message, callbackOk, callbackCancel) {
		if (confirm(message)) {
			callbackOk();
		}
		else {
			callbackCancel();
		}
	} // scJs_confirm_default

  function scAjaxMessage(oTemp)
  {
    if (oTemp && oTemp != null)
    {
        oResp = oTemp;
    }
    if (oResp["ajaxMessage"] && oResp["ajaxMessage"]["message"] && "" != oResp["ajaxMessage"]["message"])
    {
      var sTitle    = (oResp["ajaxMessage"] && oResp["ajaxMessage"]["title"])        ? oResp["ajaxMessage"]["title"]               : scMsgDefTitle,
          bModal    = (oResp["ajaxMessage"] && oResp["ajaxMessage"]["modal"])        ? ("Y" == oResp["ajaxMessage"]["modal"])      : false,
          iTimeout  = (oResp["ajaxMessage"] && oResp["ajaxMessage"]["timeout"])      ? parseInt(oResp["ajaxMessage"]["timeout"])   : 0,
          bButton   = (oResp["ajaxMessage"] && oResp["ajaxMessage"]["button"])       ? ("Y" == oResp["ajaxMessage"]["button"])     : false,
          sButton   = (oResp["ajaxMessage"] && oResp["ajaxMessage"]["button_label"]) ? oResp["ajaxMessage"]["button_label"]        : "Ok",
          iTop      = (oResp["ajaxMessage"] && oResp["ajaxMessage"]["top"])          ? parseInt(oResp["ajaxMessage"]["top"])       : 0,
          iLeft     = (oResp["ajaxMessage"] && oResp["ajaxMessage"]["left"])         ? parseInt(oResp["ajaxMessage"]["left"])      : 0,
          iWidth    = (oResp["ajaxMessage"] && oResp["ajaxMessage"]["width"])        ? parseInt(oResp["ajaxMessage"]["width"])     : 0,
          iHeight   = (oResp["ajaxMessage"] && oResp["ajaxMessage"]["height"])       ? parseInt(oResp["ajaxMessage"]["height"])    : 0,
          bClose    = (oResp["ajaxMessage"] && oResp["ajaxMessage"]["show_close"])   ? ("Y" == oResp["ajaxMessage"]["show_close"]) : true,
          bBodyIcon = (oResp["ajaxMessage"] && oResp["ajaxMessage"]["body_icon"])    ? ("Y" == oResp["ajaxMessage"]["body_icon"])  : true,
          sRedir    = (oResp["ajaxMessage"] && oResp["ajaxMessage"]["redir"])        ? oResp["ajaxMessage"]["redir"]               : "",
          sTarget   = (oResp["ajaxMessage"] && oResp["ajaxMessage"]["redir_target"]) ? oResp["ajaxMessage"]["redir_target"]        : "",
          sParam    = (oResp["ajaxMessage"] && oResp["ajaxMessage"]["redir_par"])    ? oResp["ajaxMessage"]["redir_par"]           : "",
          bToast    = (oResp["ajaxMessage"] && oResp["ajaxMessage"]["toast"])        ? ("Y" == oResp["ajaxMessage"]["toast"])      : false,
          sToastPos = (oResp["ajaxMessage"] && oResp["ajaxMessage"]["toast_pos"])    ? oResp["ajaxMessage"]["toast_pos"]           : "",
          sType     = (oResp["ajaxMessage"] && oResp["ajaxMessage"]["type"])         ? oResp["ajaxMessage"]["type"]                : "";
      if (typeof scDisplayUserMessage == "function") {
        scDisplayUserMessage(oResp["ajaxMessage"]["message"]);
      }
      else {
		  var params = {
			  title: sTitle,
			  message: oResp["ajaxMessage"]["message"],
			  isModal: bModal,
			  timeout: iTimeout,
			  showButton: bButton,
			  buttonLabel: sButton,
			  topPos: iTop,
			  leftPos: iLeft,
			  width: iWidth,
			  height: iHeight,
			  redirUrl: sRedir,
			  redirTarget: sTarget,
			  redirParam: sParam,
			  showClose: bClose,
			  showBodyIcon: bBodyIcon,
			  isToast: bToast,
			  toastPos: sToastPos,
			  type: sType
		  };
        _scAjaxShowMessage(params);
      }
    }
  } // scAjaxMessage

  function scAjaxResponse(sResp)
  {
    eval("var oResp = " + sResp);
    return oResp;
  } // scAjaxResponse

  function scAjaxBreakLine(input)
  {
      if (null == input)
      {
          return "";
      }
      input += "";
      while (input.lastIndexOf(String.fromCharCode(10)) > -1)
      {
         input = input.replace(String.fromCharCode(10), '<br>');
      }
      return input;
  } // scAjaxBreakLine

  function scAjaxProtectBreakLine(input)
  {
      if (null == input)
      {
          return "";
      }
      var input1 = input + "";
      while (input1.lastIndexOf(String.fromCharCode(10)) > -1)
      {
         input1 = input1.replace(String.fromCharCode(10), '#@NM#@');
      }
      return input1;
  } // scAjaxProtectBreakLine

  function scAjaxReturnBreakLine(input)
  {
      if (null == input)
      {
          return "";
      }
      while (input.lastIndexOf('#@NM#@') > -1)
      {
         input = input.replace('#@NM#@', String.fromCharCode(10));
      }
      return input;
  } // scAjaxReturnBreakLine

  function scOpenMasterDetail(widget, url)
  {
	  var iframe = $(parent.document).find("[name='" +  widget+ "']");
	  iframe.attr("src", url);
  } // scOpenMasterDetail

  function scMoveMasterDetail(widget)
  {
	  var iframe = $(parent.document).find("[name='" +  widget+ "']");
	  iframe[0].contentWindow.nm_move("apl_detalhe", true);
  } // scMoveMasterDetail

	function scAjaxError_markList() {
	    if ('undefined' == typeof oResp.errList) {
	        return;
	    }
		var i, fieldName, fieldList = new Array();
		for (i = 0; i < oResp.errList.length; i++) {
			fieldName = oResp.errList[i]["fldName"];
			if (oResp.errList[i]["numLinha"]) {
				fieldName += oResp.errList[i]["numLinha"];
			}
            fieldList.push(fieldName);
		}
		scAjaxError_markFieldList(fieldList);
	} // scAjaxError_markList

	function scAjaxError_markFieldList(fieldList) {
		var i;
		for (i = 0; i < fieldList.length; i++) {
            scAjaxError_markField(fieldList[i]);
		}
	} // scAjaxError_markFieldList

	function scAjaxError_unmarkList() {
		var i;
		for (i = 0; i < ajax_field_list.length; i++) {
            scAjaxError_unmarkField(ajax_field_list[i]);
		}
	} // scAjaxError_unmarkList

	function scAjaxError_markField(fieldName) {
		var $oField = $("#id_sc_field_" + fieldName);
		if (0 < $oField.length) {
			scAjax_applyFieldErrorStyle($oField);
		}
	} // scAjaxError_markField

	function scAjaxError_unmarkField(fieldName) {
		var $oField = $("#id_sc_field_" + fieldName);
		if (0 < $oField.length) {
			scAjax_removeFieldErrorStyle($oField);
		}
	} // scAjaxError_unmarkField

	function scAjax_displayEmptyForm() {
        $("#sc-ui-empty-form").show();
        $(".sc-ui-page-tab-line").hide();
        $("#sc-id-required-row").hide();
        sc_hide_form_maeemp_form();
	}

  function scAjax_applyFieldErrorStyle(fieldObj) {
    if (fieldObj.hasClass("sc-ui-pwd-toggle")) {
        fieldObj.addClass(sc_css_status_pwd_text);
        fieldObj.parent().addClass(sc_css_status_pwd_box);
      } else {
        fieldObj.addClass(sc_css_status);
      }
  }

  function scAjax_removeFieldErrorStyle(fieldObj) {
    if (fieldObj.hasClass("sc-ui-pwd-toggle")) {
        fieldObj.removeClass(sc_css_status_pwd_text);
        fieldObj.parent().removeClass(sc_css_status_pwd_box);
      } else {
        fieldObj.removeClass(sc_css_status);
      }
  }

  function scAjax_formReload() {
<?php
    if ($this->nmgp_opcao == 'novo') {
        echo "      nm_move('reload_novo');";
    } else {
        echo "      nm_move('igual');";
    }
?>
  }

  function scBtnDisabled()
  {
    var btnNameNav, hasNavButton = false;

    if (typeof oResp.btnDisabled != undefined) {
      for (var btnName in oResp.btnDisabled) {
        btnNameNav = btnName.substring(0, 9);

        if ("on" == oResp.btnDisabled[btnName]) {
          $("#" + btnName).addClass("disabled");

          if ("sc_b_ini_" == btnNameNav) {
            Nav_binicio_macro_disabled = "on";
            hasNavButton = true;
          } else if ("sc_b_ret_" == btnNameNav) {
            Nav_bretorna_macro_disabled = "on";
            hasNavButton = true;
          } else if ("sc_b_avc_" == btnNameNav) {
            Nav_bavanca_macro_disabled = "on";
            hasNavButton = true;
          } else if ("sc_b_fim_" == btnNameNav) {
            Nav_bfinal_macro_disabled = "on";
            hasNavButton = true;
          }
        } else {
          $("#" + btnName).removeClass("disabled");

          if ("sc_b_ini_" == btnNameNav) {
            Nav_binicio_macro_disabled = "off";
            hasNavButton = true;
          } else if ("sc_b_ret_" == btnNameNav) {
            Nav_bretorna_macro_disabled = "off";
            hasNavButton = true;
          } else if ("sc_b_avc_" == btnNameNav) {
            Nav_bavanca_macro_disabled = "off";
            hasNavButton = true;
          } else if ("sc_b_fim_" == btnNameNav) {
            Nav_bfinal_macro_disabled = "off";
            hasNavButton = true;
          }
        }
      }
    }

    if (hasNavButton) {
      nav_atualiza(Nav_permite_ret, Nav_permite_ava, 't');
      nav_atualiza(Nav_permite_ret, Nav_permite_ava, 'b');
    }
  }

  function scBtnLabel()
  {
    if (typeof oResp.btnLabel != undefined) {
      for (var btnName in oResp.btnLabel) {
        $("#" + btnName).find(".btn-label").html(oResp.btnLabel[btnName]);
      }
    }
  }

  var scFormHasChanged = false;

  function scMarkFormAsChanged() {
    scFormHasChanged = true;
  }

  function scResetFormChanges() {
    scFormHasChanged = false;
  }

  var isRunning_scFormClose_F5 = false;
  function scFormClose_F5(exitUrl) {
    if (isRunning_scFormClose_F5) {
      return;
    }
    isRunning_scFormClose_F5 = true;
    setTimeout(function() { isRunning_scFormClose_F5 = false; }, 3000);

    if (scFormHasChanged) {
      scJs_confirm('<?php echo html_entity_decode($this->Ini->Nm_lang['lang_reload_confirm']) ?>', function() { document.F5.action = exitUrl; document.F5.submit(); }, function() {});
    } else {
      document.F5.action = exitUrl;
      document.F5.submit();
    }

  }

  var isRunning_scFormClose_F6 = false;
  function scFormClose_F6(exitUrl) {
    if (isRunning_scFormClose_F6) {
      return;
    }
    isRunning_scFormClose_F6 = true;
    setTimeout(function() { isRunning_scFormClose_F6 = false; }, 3000);

    if (scFormHasChanged) {
      scJs_confirm('<?php echo html_entity_decode($this->Ini->Nm_lang['lang_reload_confirm']) ?>', function() { document.F6.action = exitUrl; document.F6.submit(); }, function() {});
    } else {
      document.F6.action = exitUrl;
      document.F6.submit();
    }

  }

  // ---------- Validate rp01noemp
  function do_ajax_form_maeemp_validate_rp01noemp()
  {
    var nomeCampo_rp01noemp = "rp01noemp";
    var var_rp01noemp = scAjaxGetFieldText(nomeCampo_rp01noemp);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maeemp_validate_rp01noemp(var_rp01noemp, var_script_case_init, do_ajax_form_maeemp_validate_rp01noemp_cb);
  } // do_ajax_form_maeemp_validate_rp01noemp

  function do_ajax_form_maeemp_validate_rp01noemp_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "rp01noemp";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maeemp_validate_rp01noemp_cb

  // ---------- Validate rp01division
  function do_ajax_form_maeemp_validate_rp01division()
  {
    var nomeCampo_rp01division = "rp01division";
    var var_rp01division = scAjaxGetFieldText(nomeCampo_rp01division);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maeemp_validate_rp01division(var_rp01division, var_script_case_init, do_ajax_form_maeemp_validate_rp01division_cb);
  } // do_ajax_form_maeemp_validate_rp01division

  function do_ajax_form_maeemp_validate_rp01division_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "rp01division";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maeemp_validate_rp01division_cb

  // ---------- Validate rp01depto
  function do_ajax_form_maeemp_validate_rp01depto()
  {
    var nomeCampo_rp01depto = "rp01depto";
    var var_rp01depto = scAjaxGetFieldText(nomeCampo_rp01depto);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maeemp_validate_rp01depto(var_rp01depto, var_script_case_init, do_ajax_form_maeemp_validate_rp01depto_cb);
  } // do_ajax_form_maeemp_validate_rp01depto

  function do_ajax_form_maeemp_validate_rp01depto_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "rp01depto";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maeemp_validate_rp01depto_cb

  // ---------- Validate rp01seccion
  function do_ajax_form_maeemp_validate_rp01seccion()
  {
    var nomeCampo_rp01seccion = "rp01seccion";
    var var_rp01seccion = scAjaxGetFieldText(nomeCampo_rp01seccion);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maeemp_validate_rp01seccion(var_rp01seccion, var_script_case_init, do_ajax_form_maeemp_validate_rp01seccion_cb);
  } // do_ajax_form_maeemp_validate_rp01seccion

  function do_ajax_form_maeemp_validate_rp01seccion_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "rp01seccion";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maeemp_validate_rp01seccion_cb

  // ---------- Validate rp01noemp1
  function do_ajax_form_maeemp_validate_rp01noemp1()
  {
    var nomeCampo_rp01noemp1 = "rp01noemp1";
    var var_rp01noemp1 = scAjaxGetFieldText(nomeCampo_rp01noemp1);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maeemp_validate_rp01noemp1(var_rp01noemp1, var_script_case_init, do_ajax_form_maeemp_validate_rp01noemp1_cb);
  } // do_ajax_form_maeemp_validate_rp01noemp1

  function do_ajax_form_maeemp_validate_rp01noemp1_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "rp01noemp1";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maeemp_validate_rp01noemp1_cb

  // ---------- Validate rp01nombreemp
  function do_ajax_form_maeemp_validate_rp01nombreemp()
  {
    var nomeCampo_rp01nombreemp = "rp01nombreemp";
    var var_rp01nombreemp = scAjaxGetFieldText(nomeCampo_rp01nombreemp);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maeemp_validate_rp01nombreemp(var_rp01nombreemp, var_script_case_init, do_ajax_form_maeemp_validate_rp01nombreemp_cb);
  } // do_ajax_form_maeemp_validate_rp01nombreemp

  function do_ajax_form_maeemp_validate_rp01nombreemp_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "rp01nombreemp";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maeemp_validate_rp01nombreemp_cb

  // ---------- Validate rp01categoria
  function do_ajax_form_maeemp_validate_rp01categoria()
  {
    var nomeCampo_rp01categoria = "rp01categoria";
    var var_rp01categoria = scAjaxGetFieldText(nomeCampo_rp01categoria);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maeemp_validate_rp01categoria(var_rp01categoria, var_script_case_init, do_ajax_form_maeemp_validate_rp01categoria_cb);
  } // do_ajax_form_maeemp_validate_rp01categoria

  function do_ajax_form_maeemp_validate_rp01categoria_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "rp01categoria";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maeemp_validate_rp01categoria_cb

  // ---------- Validate rp01turno
  function do_ajax_form_maeemp_validate_rp01turno()
  {
    var nomeCampo_rp01turno = "rp01turno";
    var var_rp01turno = scAjaxGetFieldText(nomeCampo_rp01turno);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maeemp_validate_rp01turno(var_rp01turno, var_script_case_init, do_ajax_form_maeemp_validate_rp01turno_cb);
  } // do_ajax_form_maeemp_validate_rp01turno

  function do_ajax_form_maeemp_validate_rp01turno_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "rp01turno";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maeemp_validate_rp01turno_cb

  // ---------- Validate rp01statusemp
  function do_ajax_form_maeemp_validate_rp01statusemp()
  {
    var nomeCampo_rp01statusemp = "rp01statusemp";
    var var_rp01statusemp = scAjaxGetFieldText(nomeCampo_rp01statusemp);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maeemp_validate_rp01statusemp(var_rp01statusemp, var_script_case_init, do_ajax_form_maeemp_validate_rp01statusemp_cb);
  } // do_ajax_form_maeemp_validate_rp01statusemp

  function do_ajax_form_maeemp_validate_rp01statusemp_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "rp01statusemp";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maeemp_validate_rp01statusemp_cb

  // ---------- Validate rp01fechastatus
  function do_ajax_form_maeemp_validate_rp01fechastatus()
  {
    var nomeCampo_rp01fechastatus = "rp01fechastatus";
    var var_rp01fechastatus = scAjaxGetFieldText(nomeCampo_rp01fechastatus);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maeemp_validate_rp01fechastatus(var_rp01fechastatus, var_script_case_init, do_ajax_form_maeemp_validate_rp01fechastatus_cb);
  } // do_ajax_form_maeemp_validate_rp01fechastatus

  function do_ajax_form_maeemp_validate_rp01fechastatus_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "rp01fechastatus";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maeemp_validate_rp01fechastatus_cb

  // ---------- Validate rp01causaretiro
  function do_ajax_form_maeemp_validate_rp01causaretiro()
  {
    var nomeCampo_rp01causaretiro = "rp01causaretiro";
    var var_rp01causaretiro = scAjaxGetFieldText(nomeCampo_rp01causaretiro);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maeemp_validate_rp01causaretiro(var_rp01causaretiro, var_script_case_init, do_ajax_form_maeemp_validate_rp01causaretiro_cb);
  } // do_ajax_form_maeemp_validate_rp01causaretiro

  function do_ajax_form_maeemp_validate_rp01causaretiro_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "rp01causaretiro";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maeemp_validate_rp01causaretiro_cb

  // ---------- Validate rp01direccion
  function do_ajax_form_maeemp_validate_rp01direccion()
  {
    var nomeCampo_rp01direccion = "rp01direccion";
    var var_rp01direccion = scAjaxGetFieldText(nomeCampo_rp01direccion);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maeemp_validate_rp01direccion(var_rp01direccion, var_script_case_init, do_ajax_form_maeemp_validate_rp01direccion_cb);
  } // do_ajax_form_maeemp_validate_rp01direccion

  function do_ajax_form_maeemp_validate_rp01direccion_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "rp01direccion";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maeemp_validate_rp01direccion_cb

  // ---------- Validate rp01telefono
  function do_ajax_form_maeemp_validate_rp01telefono()
  {
    var nomeCampo_rp01telefono = "rp01telefono";
    var var_rp01telefono = scAjaxGetFieldText(nomeCampo_rp01telefono);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maeemp_validate_rp01telefono(var_rp01telefono, var_script_case_init, do_ajax_form_maeemp_validate_rp01telefono_cb);
  } // do_ajax_form_maeemp_validate_rp01telefono

  function do_ajax_form_maeemp_validate_rp01telefono_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "rp01telefono";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maeemp_validate_rp01telefono_cb

  // ---------- Validate rp01lugarnacimiento
  function do_ajax_form_maeemp_validate_rp01lugarnacimiento()
  {
    var nomeCampo_rp01lugarnacimiento = "rp01lugarnacimiento";
    var var_rp01lugarnacimiento = scAjaxGetFieldText(nomeCampo_rp01lugarnacimiento);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maeemp_validate_rp01lugarnacimiento(var_rp01lugarnacimiento, var_script_case_init, do_ajax_form_maeemp_validate_rp01lugarnacimiento_cb);
  } // do_ajax_form_maeemp_validate_rp01lugarnacimiento

  function do_ajax_form_maeemp_validate_rp01lugarnacimiento_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "rp01lugarnacimiento";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maeemp_validate_rp01lugarnacimiento_cb

  // ---------- Validate rp01fechanacimiento
  function do_ajax_form_maeemp_validate_rp01fechanacimiento()
  {
    var nomeCampo_rp01fechanacimiento = "rp01fechanacimiento";
    var var_rp01fechanacimiento = scAjaxGetFieldText(nomeCampo_rp01fechanacimiento);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maeemp_validate_rp01fechanacimiento(var_rp01fechanacimiento, var_script_case_init, do_ajax_form_maeemp_validate_rp01fechanacimiento_cb);
  } // do_ajax_form_maeemp_validate_rp01fechanacimiento

  function do_ajax_form_maeemp_validate_rp01fechanacimiento_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "rp01fechanacimiento";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maeemp_validate_rp01fechanacimiento_cb

  // ---------- Validate rp01nacionalidad
  function do_ajax_form_maeemp_validate_rp01nacionalidad()
  {
    var nomeCampo_rp01nacionalidad = "rp01nacionalidad";
    var var_rp01nacionalidad = scAjaxGetFieldText(nomeCampo_rp01nacionalidad);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maeemp_validate_rp01nacionalidad(var_rp01nacionalidad, var_script_case_init, do_ajax_form_maeemp_validate_rp01nacionalidad_cb);
  } // do_ajax_form_maeemp_validate_rp01nacionalidad

  function do_ajax_form_maeemp_validate_rp01nacionalidad_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "rp01nacionalidad";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maeemp_validate_rp01nacionalidad_cb

  // ---------- Validate rp01cedula
  function do_ajax_form_maeemp_validate_rp01cedula()
  {
    var nomeCampo_rp01cedula = "rp01cedula";
    var var_rp01cedula = scAjaxGetFieldText(nomeCampo_rp01cedula);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maeemp_validate_rp01cedula(var_rp01cedula, var_script_case_init, do_ajax_form_maeemp_validate_rp01cedula_cb);
  } // do_ajax_form_maeemp_validate_rp01cedula

  function do_ajax_form_maeemp_validate_rp01cedula_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "rp01cedula";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maeemp_validate_rp01cedula_cb

  // ---------- Validate rp01noiess
  function do_ajax_form_maeemp_validate_rp01noiess()
  {
    var nomeCampo_rp01noiess = "rp01noiess";
    var var_rp01noiess = scAjaxGetFieldText(nomeCampo_rp01noiess);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maeemp_validate_rp01noiess(var_rp01noiess, var_script_case_init, do_ajax_form_maeemp_validate_rp01noiess_cb);
  } // do_ajax_form_maeemp_validate_rp01noiess

  function do_ajax_form_maeemp_validate_rp01noiess_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "rp01noiess";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maeemp_validate_rp01noiess_cb

  // ---------- Validate rp01sexo
  function do_ajax_form_maeemp_validate_rp01sexo()
  {
    var nomeCampo_rp01sexo = "rp01sexo";
    var var_rp01sexo = scAjaxGetFieldText(nomeCampo_rp01sexo);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maeemp_validate_rp01sexo(var_rp01sexo, var_script_case_init, do_ajax_form_maeemp_validate_rp01sexo_cb);
  } // do_ajax_form_maeemp_validate_rp01sexo

  function do_ajax_form_maeemp_validate_rp01sexo_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "rp01sexo";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maeemp_validate_rp01sexo_cb

  // ---------- Validate rp01nolibreta
  function do_ajax_form_maeemp_validate_rp01nolibreta()
  {
    var nomeCampo_rp01nolibreta = "rp01nolibreta";
    var var_rp01nolibreta = scAjaxGetFieldText(nomeCampo_rp01nolibreta);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maeemp_validate_rp01nolibreta(var_rp01nolibreta, var_script_case_init, do_ajax_form_maeemp_validate_rp01nolibreta_cb);
  } // do_ajax_form_maeemp_validate_rp01nolibreta

  function do_ajax_form_maeemp_validate_rp01nolibreta_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "rp01nolibreta";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maeemp_validate_rp01nolibreta_cb

  // ---------- Validate rp01profesion
  function do_ajax_form_maeemp_validate_rp01profesion()
  {
    var nomeCampo_rp01profesion = "rp01profesion";
    var var_rp01profesion = scAjaxGetFieldText(nomeCampo_rp01profesion);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maeemp_validate_rp01profesion(var_rp01profesion, var_script_case_init, do_ajax_form_maeemp_validate_rp01profesion_cb);
  } // do_ajax_form_maeemp_validate_rp01profesion

  function do_ajax_form_maeemp_validate_rp01profesion_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "rp01profesion";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maeemp_validate_rp01profesion_cb

  // ---------- Validate rp01fechaingreso
  function do_ajax_form_maeemp_validate_rp01fechaingreso()
  {
    var nomeCampo_rp01fechaingreso = "rp01fechaingreso";
    var var_rp01fechaingreso = scAjaxGetFieldText(nomeCampo_rp01fechaingreso);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maeemp_validate_rp01fechaingreso(var_rp01fechaingreso, var_script_case_init, do_ajax_form_maeemp_validate_rp01fechaingreso_cb);
  } // do_ajax_form_maeemp_validate_rp01fechaingreso

  function do_ajax_form_maeemp_validate_rp01fechaingreso_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "rp01fechaingreso";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maeemp_validate_rp01fechaingreso_cb

  // ---------- Validate rp01fechareingreso
  function do_ajax_form_maeemp_validate_rp01fechareingreso()
  {
    var nomeCampo_rp01fechareingreso = "rp01fechareingreso";
    var var_rp01fechareingreso = scAjaxGetFieldText(nomeCampo_rp01fechareingreso);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maeemp_validate_rp01fechareingreso(var_rp01fechareingreso, var_script_case_init, do_ajax_form_maeemp_validate_rp01fechareingreso_cb);
  } // do_ajax_form_maeemp_validate_rp01fechareingreso

  function do_ajax_form_maeemp_validate_rp01fechareingreso_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "rp01fechareingreso";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maeemp_validate_rp01fechareingreso_cb

  // ---------- Validate rp01cargo
  function do_ajax_form_maeemp_validate_rp01cargo()
  {
    var nomeCampo_rp01cargo = "rp01cargo";
    var var_rp01cargo = scAjaxGetFieldText(nomeCampo_rp01cargo);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maeemp_validate_rp01cargo(var_rp01cargo, var_script_case_init, do_ajax_form_maeemp_validate_rp01cargo_cb);
  } // do_ajax_form_maeemp_validate_rp01cargo

  function do_ajax_form_maeemp_validate_rp01cargo_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "rp01cargo";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maeemp_validate_rp01cargo_cb

  // ---------- Validate rp01estadocivil
  function do_ajax_form_maeemp_validate_rp01estadocivil()
  {
    var nomeCampo_rp01estadocivil = "rp01estadocivil";
    var var_rp01estadocivil = scAjaxGetFieldText(nomeCampo_rp01estadocivil);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maeemp_validate_rp01estadocivil(var_rp01estadocivil, var_script_case_init, do_ajax_form_maeemp_validate_rp01estadocivil_cb);
  } // do_ajax_form_maeemp_validate_rp01estadocivil

  function do_ajax_form_maeemp_validate_rp01estadocivil_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "rp01estadocivil";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maeemp_validate_rp01estadocivil_cb

  // ---------- Validate rp01rebajaxcasado
  function do_ajax_form_maeemp_validate_rp01rebajaxcasado()
  {
    var nomeCampo_rp01rebajaxcasado = "rp01rebajaxcasado";
    var var_rp01rebajaxcasado = scAjaxGetFieldText(nomeCampo_rp01rebajaxcasado);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maeemp_validate_rp01rebajaxcasado(var_rp01rebajaxcasado, var_script_case_init, do_ajax_form_maeemp_validate_rp01rebajaxcasado_cb);
  } // do_ajax_form_maeemp_validate_rp01rebajaxcasado

  function do_ajax_form_maeemp_validate_rp01rebajaxcasado_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "rp01rebajaxcasado";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maeemp_validate_rp01rebajaxcasado_cb

  // ---------- Validate rp01nombreconyuge
  function do_ajax_form_maeemp_validate_rp01nombreconyuge()
  {
    var nomeCampo_rp01nombreconyuge = "rp01nombreconyuge";
    var var_rp01nombreconyuge = scAjaxGetFieldText(nomeCampo_rp01nombreconyuge);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maeemp_validate_rp01nombreconyuge(var_rp01nombreconyuge, var_script_case_init, do_ajax_form_maeemp_validate_rp01nombreconyuge_cb);
  } // do_ajax_form_maeemp_validate_rp01nombreconyuge

  function do_ajax_form_maeemp_validate_rp01nombreconyuge_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "rp01nombreconyuge";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maeemp_validate_rp01nombreconyuge_cb

  // ---------- Validate rp01nombrepadre
  function do_ajax_form_maeemp_validate_rp01nombrepadre()
  {
    var nomeCampo_rp01nombrepadre = "rp01nombrepadre";
    var var_rp01nombrepadre = scAjaxGetFieldText(nomeCampo_rp01nombrepadre);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maeemp_validate_rp01nombrepadre(var_rp01nombrepadre, var_script_case_init, do_ajax_form_maeemp_validate_rp01nombrepadre_cb);
  } // do_ajax_form_maeemp_validate_rp01nombrepadre

  function do_ajax_form_maeemp_validate_rp01nombrepadre_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "rp01nombrepadre";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maeemp_validate_rp01nombrepadre_cb

  // ---------- Validate rp01nombremadre
  function do_ajax_form_maeemp_validate_rp01nombremadre()
  {
    var nomeCampo_rp01nombremadre = "rp01nombremadre";
    var var_rp01nombremadre = scAjaxGetFieldText(nomeCampo_rp01nombremadre);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maeemp_validate_rp01nombremadre(var_rp01nombremadre, var_script_case_init, do_ajax_form_maeemp_validate_rp01nombremadre_cb);
  } // do_ajax_form_maeemp_validate_rp01nombremadre

  function do_ajax_form_maeemp_validate_rp01nombremadre_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "rp01nombremadre";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maeemp_validate_rp01nombremadre_cb

  // ---------- Validate rp01nohijos
  function do_ajax_form_maeemp_validate_rp01nohijos()
  {
    var nomeCampo_rp01nohijos = "rp01nohijos";
    var var_rp01nohijos = scAjaxGetFieldText(nomeCampo_rp01nohijos);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maeemp_validate_rp01nohijos(var_rp01nohijos, var_script_case_init, do_ajax_form_maeemp_validate_rp01nohijos_cb);
  } // do_ajax_form_maeemp_validate_rp01nohijos

  function do_ajax_form_maeemp_validate_rp01nohijos_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "rp01nohijos";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maeemp_validate_rp01nohijos_cb

  // ---------- Validate rp01fechahijos0
  function do_ajax_form_maeemp_validate_rp01fechahijos0()
  {
    var nomeCampo_rp01fechahijos0 = "rp01fechahijos0";
    var var_rp01fechahijos0 = scAjaxGetFieldText(nomeCampo_rp01fechahijos0);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maeemp_validate_rp01fechahijos0(var_rp01fechahijos0, var_script_case_init, do_ajax_form_maeemp_validate_rp01fechahijos0_cb);
  } // do_ajax_form_maeemp_validate_rp01fechahijos0

  function do_ajax_form_maeemp_validate_rp01fechahijos0_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "rp01fechahijos0";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maeemp_validate_rp01fechahijos0_cb

  // ---------- Validate rp01sexohijos0
  function do_ajax_form_maeemp_validate_rp01sexohijos0()
  {
    var nomeCampo_rp01sexohijos0 = "rp01sexohijos0";
    var var_rp01sexohijos0 = scAjaxGetFieldText(nomeCampo_rp01sexohijos0);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maeemp_validate_rp01sexohijos0(var_rp01sexohijos0, var_script_case_init, do_ajax_form_maeemp_validate_rp01sexohijos0_cb);
  } // do_ajax_form_maeemp_validate_rp01sexohijos0

  function do_ajax_form_maeemp_validate_rp01sexohijos0_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "rp01sexohijos0";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maeemp_validate_rp01sexohijos0_cb

  // ---------- Validate rp01fechahijos1
  function do_ajax_form_maeemp_validate_rp01fechahijos1()
  {
    var nomeCampo_rp01fechahijos1 = "rp01fechahijos1";
    var var_rp01fechahijos1 = scAjaxGetFieldText(nomeCampo_rp01fechahijos1);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maeemp_validate_rp01fechahijos1(var_rp01fechahijos1, var_script_case_init, do_ajax_form_maeemp_validate_rp01fechahijos1_cb);
  } // do_ajax_form_maeemp_validate_rp01fechahijos1

  function do_ajax_form_maeemp_validate_rp01fechahijos1_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "rp01fechahijos1";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maeemp_validate_rp01fechahijos1_cb

  // ---------- Validate rp01sexohijos1
  function do_ajax_form_maeemp_validate_rp01sexohijos1()
  {
    var nomeCampo_rp01sexohijos1 = "rp01sexohijos1";
    var var_rp01sexohijos1 = scAjaxGetFieldText(nomeCampo_rp01sexohijos1);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maeemp_validate_rp01sexohijos1(var_rp01sexohijos1, var_script_case_init, do_ajax_form_maeemp_validate_rp01sexohijos1_cb);
  } // do_ajax_form_maeemp_validate_rp01sexohijos1

  function do_ajax_form_maeemp_validate_rp01sexohijos1_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "rp01sexohijos1";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maeemp_validate_rp01sexohijos1_cb

  // ---------- Validate rp01fechahijos2
  function do_ajax_form_maeemp_validate_rp01fechahijos2()
  {
    var nomeCampo_rp01fechahijos2 = "rp01fechahijos2";
    var var_rp01fechahijos2 = scAjaxGetFieldText(nomeCampo_rp01fechahijos2);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maeemp_validate_rp01fechahijos2(var_rp01fechahijos2, var_script_case_init, do_ajax_form_maeemp_validate_rp01fechahijos2_cb);
  } // do_ajax_form_maeemp_validate_rp01fechahijos2

  function do_ajax_form_maeemp_validate_rp01fechahijos2_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "rp01fechahijos2";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maeemp_validate_rp01fechahijos2_cb

  // ---------- Validate rp01sexohijos2
  function do_ajax_form_maeemp_validate_rp01sexohijos2()
  {
    var nomeCampo_rp01sexohijos2 = "rp01sexohijos2";
    var var_rp01sexohijos2 = scAjaxGetFieldText(nomeCampo_rp01sexohijos2);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maeemp_validate_rp01sexohijos2(var_rp01sexohijos2, var_script_case_init, do_ajax_form_maeemp_validate_rp01sexohijos2_cb);
  } // do_ajax_form_maeemp_validate_rp01sexohijos2

  function do_ajax_form_maeemp_validate_rp01sexohijos2_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "rp01sexohijos2";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maeemp_validate_rp01sexohijos2_cb

  // ---------- Validate rp01fechahijos3
  function do_ajax_form_maeemp_validate_rp01fechahijos3()
  {
    var nomeCampo_rp01fechahijos3 = "rp01fechahijos3";
    var var_rp01fechahijos3 = scAjaxGetFieldText(nomeCampo_rp01fechahijos3);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maeemp_validate_rp01fechahijos3(var_rp01fechahijos3, var_script_case_init, do_ajax_form_maeemp_validate_rp01fechahijos3_cb);
  } // do_ajax_form_maeemp_validate_rp01fechahijos3

  function do_ajax_form_maeemp_validate_rp01fechahijos3_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "rp01fechahijos3";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maeemp_validate_rp01fechahijos3_cb

  // ---------- Validate rp01sexohijos3
  function do_ajax_form_maeemp_validate_rp01sexohijos3()
  {
    var nomeCampo_rp01sexohijos3 = "rp01sexohijos3";
    var var_rp01sexohijos3 = scAjaxGetFieldText(nomeCampo_rp01sexohijos3);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maeemp_validate_rp01sexohijos3(var_rp01sexohijos3, var_script_case_init, do_ajax_form_maeemp_validate_rp01sexohijos3_cb);
  } // do_ajax_form_maeemp_validate_rp01sexohijos3

  function do_ajax_form_maeemp_validate_rp01sexohijos3_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "rp01sexohijos3";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maeemp_validate_rp01sexohijos3_cb

  // ---------- Validate rp01fechahijos4
  function do_ajax_form_maeemp_validate_rp01fechahijos4()
  {
    var nomeCampo_rp01fechahijos4 = "rp01fechahijos4";
    var var_rp01fechahijos4 = scAjaxGetFieldText(nomeCampo_rp01fechahijos4);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maeemp_validate_rp01fechahijos4(var_rp01fechahijos4, var_script_case_init, do_ajax_form_maeemp_validate_rp01fechahijos4_cb);
  } // do_ajax_form_maeemp_validate_rp01fechahijos4

  function do_ajax_form_maeemp_validate_rp01fechahijos4_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "rp01fechahijos4";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maeemp_validate_rp01fechahijos4_cb

  // ---------- Validate rp01sexohijos4
  function do_ajax_form_maeemp_validate_rp01sexohijos4()
  {
    var nomeCampo_rp01sexohijos4 = "rp01sexohijos4";
    var var_rp01sexohijos4 = scAjaxGetFieldText(nomeCampo_rp01sexohijos4);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maeemp_validate_rp01sexohijos4(var_rp01sexohijos4, var_script_case_init, do_ajax_form_maeemp_validate_rp01sexohijos4_cb);
  } // do_ajax_form_maeemp_validate_rp01sexohijos4

  function do_ajax_form_maeemp_validate_rp01sexohijos4_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "rp01sexohijos4";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maeemp_validate_rp01sexohijos4_cb

  // ---------- Validate rp01fechahijos5
  function do_ajax_form_maeemp_validate_rp01fechahijos5()
  {
    var nomeCampo_rp01fechahijos5 = "rp01fechahijos5";
    var var_rp01fechahijos5 = scAjaxGetFieldText(nomeCampo_rp01fechahijos5);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maeemp_validate_rp01fechahijos5(var_rp01fechahijos5, var_script_case_init, do_ajax_form_maeemp_validate_rp01fechahijos5_cb);
  } // do_ajax_form_maeemp_validate_rp01fechahijos5

  function do_ajax_form_maeemp_validate_rp01fechahijos5_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "rp01fechahijos5";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maeemp_validate_rp01fechahijos5_cb

  // ---------- Validate rp01sexohijos5
  function do_ajax_form_maeemp_validate_rp01sexohijos5()
  {
    var nomeCampo_rp01sexohijos5 = "rp01sexohijos5";
    var var_rp01sexohijos5 = scAjaxGetFieldText(nomeCampo_rp01sexohijos5);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maeemp_validate_rp01sexohijos5(var_rp01sexohijos5, var_script_case_init, do_ajax_form_maeemp_validate_rp01sexohijos5_cb);
  } // do_ajax_form_maeemp_validate_rp01sexohijos5

  function do_ajax_form_maeemp_validate_rp01sexohijos5_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "rp01sexohijos5";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maeemp_validate_rp01sexohijos5_cb

  // ---------- Validate rp01fechahijos6
  function do_ajax_form_maeemp_validate_rp01fechahijos6()
  {
    var nomeCampo_rp01fechahijos6 = "rp01fechahijos6";
    var var_rp01fechahijos6 = scAjaxGetFieldText(nomeCampo_rp01fechahijos6);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maeemp_validate_rp01fechahijos6(var_rp01fechahijos6, var_script_case_init, do_ajax_form_maeemp_validate_rp01fechahijos6_cb);
  } // do_ajax_form_maeemp_validate_rp01fechahijos6

  function do_ajax_form_maeemp_validate_rp01fechahijos6_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "rp01fechahijos6";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maeemp_validate_rp01fechahijos6_cb

  // ---------- Validate rp01sexohijos6
  function do_ajax_form_maeemp_validate_rp01sexohijos6()
  {
    var nomeCampo_rp01sexohijos6 = "rp01sexohijos6";
    var var_rp01sexohijos6 = scAjaxGetFieldText(nomeCampo_rp01sexohijos6);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maeemp_validate_rp01sexohijos6(var_rp01sexohijos6, var_script_case_init, do_ajax_form_maeemp_validate_rp01sexohijos6_cb);
  } // do_ajax_form_maeemp_validate_rp01sexohijos6

  function do_ajax_form_maeemp_validate_rp01sexohijos6_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "rp01sexohijos6";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maeemp_validate_rp01sexohijos6_cb

  // ---------- Validate rp01fechahijos7
  function do_ajax_form_maeemp_validate_rp01fechahijos7()
  {
    var nomeCampo_rp01fechahijos7 = "rp01fechahijos7";
    var var_rp01fechahijos7 = scAjaxGetFieldText(nomeCampo_rp01fechahijos7);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maeemp_validate_rp01fechahijos7(var_rp01fechahijos7, var_script_case_init, do_ajax_form_maeemp_validate_rp01fechahijos7_cb);
  } // do_ajax_form_maeemp_validate_rp01fechahijos7

  function do_ajax_form_maeemp_validate_rp01fechahijos7_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "rp01fechahijos7";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maeemp_validate_rp01fechahijos7_cb

  // ---------- Validate rp01sexohijos7
  function do_ajax_form_maeemp_validate_rp01sexohijos7()
  {
    var nomeCampo_rp01sexohijos7 = "rp01sexohijos7";
    var var_rp01sexohijos7 = scAjaxGetFieldText(nomeCampo_rp01sexohijos7);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maeemp_validate_rp01sexohijos7(var_rp01sexohijos7, var_script_case_init, do_ajax_form_maeemp_validate_rp01sexohijos7_cb);
  } // do_ajax_form_maeemp_validate_rp01sexohijos7

  function do_ajax_form_maeemp_validate_rp01sexohijos7_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "rp01sexohijos7";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maeemp_validate_rp01sexohijos7_cb

  // ---------- Validate rp01fechahijos8
  function do_ajax_form_maeemp_validate_rp01fechahijos8()
  {
    var nomeCampo_rp01fechahijos8 = "rp01fechahijos8";
    var var_rp01fechahijos8 = scAjaxGetFieldText(nomeCampo_rp01fechahijos8);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maeemp_validate_rp01fechahijos8(var_rp01fechahijos8, var_script_case_init, do_ajax_form_maeemp_validate_rp01fechahijos8_cb);
  } // do_ajax_form_maeemp_validate_rp01fechahijos8

  function do_ajax_form_maeemp_validate_rp01fechahijos8_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "rp01fechahijos8";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maeemp_validate_rp01fechahijos8_cb

  // ---------- Validate rp01sexohijos8
  function do_ajax_form_maeemp_validate_rp01sexohijos8()
  {
    var nomeCampo_rp01sexohijos8 = "rp01sexohijos8";
    var var_rp01sexohijos8 = scAjaxGetFieldText(nomeCampo_rp01sexohijos8);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maeemp_validate_rp01sexohijos8(var_rp01sexohijos8, var_script_case_init, do_ajax_form_maeemp_validate_rp01sexohijos8_cb);
  } // do_ajax_form_maeemp_validate_rp01sexohijos8

  function do_ajax_form_maeemp_validate_rp01sexohijos8_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "rp01sexohijos8";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maeemp_validate_rp01sexohijos8_cb

  // ---------- Validate rp01fechahijos9
  function do_ajax_form_maeemp_validate_rp01fechahijos9()
  {
    var nomeCampo_rp01fechahijos9 = "rp01fechahijos9";
    var var_rp01fechahijos9 = scAjaxGetFieldText(nomeCampo_rp01fechahijos9);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maeemp_validate_rp01fechahijos9(var_rp01fechahijos9, var_script_case_init, do_ajax_form_maeemp_validate_rp01fechahijos9_cb);
  } // do_ajax_form_maeemp_validate_rp01fechahijos9

  function do_ajax_form_maeemp_validate_rp01fechahijos9_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "rp01fechahijos9";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maeemp_validate_rp01fechahijos9_cb

  // ---------- Validate rp01sexohijos9
  function do_ajax_form_maeemp_validate_rp01sexohijos9()
  {
    var nomeCampo_rp01sexohijos9 = "rp01sexohijos9";
    var var_rp01sexohijos9 = scAjaxGetFieldText(nomeCampo_rp01sexohijos9);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maeemp_validate_rp01sexohijos9(var_rp01sexohijos9, var_script_case_init, do_ajax_form_maeemp_validate_rp01sexohijos9_cb);
  } // do_ajax_form_maeemp_validate_rp01sexohijos9

  function do_ajax_form_maeemp_validate_rp01sexohijos9_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "rp01sexohijos9";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maeemp_validate_rp01sexohijos9_cb

  // ---------- Validate rp01cargaspadres
  function do_ajax_form_maeemp_validate_rp01cargaspadres()
  {
    var nomeCampo_rp01cargaspadres = "rp01cargaspadres";
    var var_rp01cargaspadres = scAjaxGetFieldText(nomeCampo_rp01cargaspadres);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maeemp_validate_rp01cargaspadres(var_rp01cargaspadres, var_script_case_init, do_ajax_form_maeemp_validate_rp01cargaspadres_cb);
  } // do_ajax_form_maeemp_validate_rp01cargaspadres

  function do_ajax_form_maeemp_validate_rp01cargaspadres_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "rp01cargaspadres";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maeemp_validate_rp01cargaspadres_cb

  // ---------- Validate rp01otrascargas
  function do_ajax_form_maeemp_validate_rp01otrascargas()
  {
    var nomeCampo_rp01otrascargas = "rp01otrascargas";
    var var_rp01otrascargas = scAjaxGetFieldText(nomeCampo_rp01otrascargas);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maeemp_validate_rp01otrascargas(var_rp01otrascargas, var_script_case_init, do_ajax_form_maeemp_validate_rp01otrascargas_cb);
  } // do_ajax_form_maeemp_validate_rp01otrascargas

  function do_ajax_form_maeemp_validate_rp01otrascargas_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "rp01otrascargas";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maeemp_validate_rp01otrascargas_cb

  // ---------- Validate rp01formapago
  function do_ajax_form_maeemp_validate_rp01formapago()
  {
    var nomeCampo_rp01formapago = "rp01formapago";
    var var_rp01formapago = scAjaxGetFieldText(nomeCampo_rp01formapago);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maeemp_validate_rp01formapago(var_rp01formapago, var_script_case_init, do_ajax_form_maeemp_validate_rp01formapago_cb);
  } // do_ajax_form_maeemp_validate_rp01formapago

  function do_ajax_form_maeemp_validate_rp01formapago_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "rp01formapago";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maeemp_validate_rp01formapago_cb

  // ---------- Validate rp01nobancoemp
  function do_ajax_form_maeemp_validate_rp01nobancoemp()
  {
    var nomeCampo_rp01nobancoemp = "rp01nobancoemp";
    var var_rp01nobancoemp = scAjaxGetFieldText(nomeCampo_rp01nobancoemp);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maeemp_validate_rp01nobancoemp(var_rp01nobancoemp, var_script_case_init, do_ajax_form_maeemp_validate_rp01nobancoemp_cb);
  } // do_ajax_form_maeemp_validate_rp01nobancoemp

  function do_ajax_form_maeemp_validate_rp01nobancoemp_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "rp01nobancoemp";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maeemp_validate_rp01nobancoemp_cb

  // ---------- Validate rp01ctabancoemp
  function do_ajax_form_maeemp_validate_rp01ctabancoemp()
  {
    var nomeCampo_rp01ctabancoemp = "rp01ctabancoemp";
    var var_rp01ctabancoemp = scAjaxGetFieldText(nomeCampo_rp01ctabancoemp);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maeemp_validate_rp01ctabancoemp(var_rp01ctabancoemp, var_script_case_init, do_ajax_form_maeemp_validate_rp01ctabancoemp_cb);
  } // do_ajax_form_maeemp_validate_rp01ctabancoemp

  function do_ajax_form_maeemp_validate_rp01ctabancoemp_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "rp01ctabancoemp";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maeemp_validate_rp01ctabancoemp_cb

  // ---------- Validate rp01tipoctabco
  function do_ajax_form_maeemp_validate_rp01tipoctabco()
  {
    var nomeCampo_rp01tipoctabco = "rp01tipoctabco";
    var var_rp01tipoctabco = scAjaxGetFieldText(nomeCampo_rp01tipoctabco);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maeemp_validate_rp01tipoctabco(var_rp01tipoctabco, var_script_case_init, do_ajax_form_maeemp_validate_rp01tipoctabco_cb);
  } // do_ajax_form_maeemp_validate_rp01tipoctabco

  function do_ajax_form_maeemp_validate_rp01tipoctabco_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "rp01tipoctabco";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maeemp_validate_rp01tipoctabco_cb

  // ---------- Validate rp01fechaultvacacion
  function do_ajax_form_maeemp_validate_rp01fechaultvacacion()
  {
    var nomeCampo_rp01fechaultvacacion = "rp01fechaultvacacion";
    var var_rp01fechaultvacacion = scAjaxGetFieldText(nomeCampo_rp01fechaultvacacion);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maeemp_validate_rp01fechaultvacacion(var_rp01fechaultvacacion, var_script_case_init, do_ajax_form_maeemp_validate_rp01fechaultvacacion_cb);
  } // do_ajax_form_maeemp_validate_rp01fechaultvacacion

  function do_ajax_form_maeemp_validate_rp01fechaultvacacion_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "rp01fechaultvacacion";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maeemp_validate_rp01fechaultvacacion_cb

  // ---------- Validate rp01aporte
  function do_ajax_form_maeemp_validate_rp01aporte()
  {
    var nomeCampo_rp01aporte = "rp01aporte";
    var var_rp01aporte = scAjaxGetFieldText(nomeCampo_rp01aporte);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maeemp_validate_rp01aporte(var_rp01aporte, var_script_case_init, do_ajax_form_maeemp_validate_rp01aporte_cb);
  } // do_ajax_form_maeemp_validate_rp01aporte

  function do_ajax_form_maeemp_validate_rp01aporte_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "rp01aporte";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maeemp_validate_rp01aporte_cb

  // ---------- Validate rp01socio
  function do_ajax_form_maeemp_validate_rp01socio()
  {
    var nomeCampo_rp01socio = "rp01socio";
    var var_rp01socio = scAjaxGetFieldText(nomeCampo_rp01socio);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maeemp_validate_rp01socio(var_rp01socio, var_script_case_init, do_ajax_form_maeemp_validate_rp01socio_cb);
  } // do_ajax_form_maeemp_validate_rp01socio

  function do_ajax_form_maeemp_validate_rp01socio_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "rp01socio";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maeemp_validate_rp01socio_cb

  // ---------- Validate rp01transporte
  function do_ajax_form_maeemp_validate_rp01transporte()
  {
    var nomeCampo_rp01transporte = "rp01transporte";
    var var_rp01transporte = scAjaxGetFieldText(nomeCampo_rp01transporte);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maeemp_validate_rp01transporte(var_rp01transporte, var_script_case_init, do_ajax_form_maeemp_validate_rp01transporte_cb);
  } // do_ajax_form_maeemp_validate_rp01transporte

  function do_ajax_form_maeemp_validate_rp01transporte_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "rp01transporte";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maeemp_validate_rp01transporte_cb

  // ---------- Validate rp01recibeporc
  function do_ajax_form_maeemp_validate_rp01recibeporc()
  {
    var nomeCampo_rp01recibeporc = "rp01recibeporc";
    var var_rp01recibeporc = scAjaxGetFieldText(nomeCampo_rp01recibeporc);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maeemp_validate_rp01recibeporc(var_rp01recibeporc, var_script_case_init, do_ajax_form_maeemp_validate_rp01recibeporc_cb);
  } // do_ajax_form_maeemp_validate_rp01recibeporc

  function do_ajax_form_maeemp_validate_rp01recibeporc_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "rp01recibeporc";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maeemp_validate_rp01recibeporc_cb

  // ---------- Validate rp01sueldoanterior
  function do_ajax_form_maeemp_validate_rp01sueldoanterior()
  {
    var nomeCampo_rp01sueldoanterior = "rp01sueldoanterior";
    var var_rp01sueldoanterior = scAjaxGetFieldText(nomeCampo_rp01sueldoanterior);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maeemp_validate_rp01sueldoanterior(var_rp01sueldoanterior, var_script_case_init, do_ajax_form_maeemp_validate_rp01sueldoanterior_cb);
  } // do_ajax_form_maeemp_validate_rp01sueldoanterior

  function do_ajax_form_maeemp_validate_rp01sueldoanterior_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "rp01sueldoanterior";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maeemp_validate_rp01sueldoanterior_cb

  // ---------- Validate rp01sueldosalario
  function do_ajax_form_maeemp_validate_rp01sueldosalario()
  {
    var nomeCampo_rp01sueldosalario = "rp01sueldosalario";
    var var_rp01sueldosalario = scAjaxGetFieldText(nomeCampo_rp01sueldosalario);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maeemp_validate_rp01sueldosalario(var_rp01sueldosalario, var_script_case_init, do_ajax_form_maeemp_validate_rp01sueldosalario_cb);
  } // do_ajax_form_maeemp_validate_rp01sueldosalario

  function do_ajax_form_maeemp_validate_rp01sueldosalario_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "rp01sueldosalario";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maeemp_validate_rp01sueldosalario_cb

  // ---------- Validate rp01fecmodsdosal
  function do_ajax_form_maeemp_validate_rp01fecmodsdosal()
  {
    var nomeCampo_rp01fecmodsdosal = "rp01fecmodsdosal";
    var var_rp01fecmodsdosal = scAjaxGetFieldText(nomeCampo_rp01fecmodsdosal);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maeemp_validate_rp01fecmodsdosal(var_rp01fecmodsdosal, var_script_case_init, do_ajax_form_maeemp_validate_rp01fecmodsdosal_cb);
  } // do_ajax_form_maeemp_validate_rp01fecmodsdosal

  function do_ajax_form_maeemp_validate_rp01fecmodsdosal_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "rp01fecmodsdosal";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maeemp_validate_rp01fecmodsdosal_cb

  // ---------- Validate rp01fecmodficha
  function do_ajax_form_maeemp_validate_rp01fecmodficha()
  {
    var nomeCampo_rp01fecmodficha = "rp01fecmodficha";
    var var_rp01fecmodficha = scAjaxGetFieldText(nomeCampo_rp01fecmodficha);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maeemp_validate_rp01fecmodficha(var_rp01fecmodficha, var_script_case_init, do_ajax_form_maeemp_validate_rp01fecmodficha_cb);
  } // do_ajax_form_maeemp_validate_rp01fecmodficha

  function do_ajax_form_maeemp_validate_rp01fecmodficha_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "rp01fecmodficha";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maeemp_validate_rp01fecmodficha_cb

  // ---------- Validate rp01faltasinjust
  function do_ajax_form_maeemp_validate_rp01faltasinjust()
  {
    var nomeCampo_rp01faltasinjust = "rp01faltasinjust";
    var var_rp01faltasinjust = scAjaxGetFieldText(nomeCampo_rp01faltasinjust);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maeemp_validate_rp01faltasinjust(var_rp01faltasinjust, var_script_case_init, do_ajax_form_maeemp_validate_rp01faltasinjust_cb);
  } // do_ajax_form_maeemp_validate_rp01faltasinjust

  function do_ajax_form_maeemp_validate_rp01faltasinjust_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "rp01faltasinjust";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maeemp_validate_rp01faltasinjust_cb

  // ---------- Validate rp01ingresos1er
  function do_ajax_form_maeemp_validate_rp01ingresos1er()
  {
    var nomeCampo_rp01ingresos1er = "rp01ingresos1er";
    var var_rp01ingresos1er = scAjaxGetFieldText(nomeCampo_rp01ingresos1er);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maeemp_validate_rp01ingresos1er(var_rp01ingresos1er, var_script_case_init, do_ajax_form_maeemp_validate_rp01ingresos1er_cb);
  } // do_ajax_form_maeemp_validate_rp01ingresos1er

  function do_ajax_form_maeemp_validate_rp01ingresos1er_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "rp01ingresos1er";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maeemp_validate_rp01ingresos1er_cb

  // ---------- Validate rp01basesocialvalor
  function do_ajax_form_maeemp_validate_rp01basesocialvalor()
  {
    var nomeCampo_rp01basesocialvalor = "rp01basesocialvalor";
    var var_rp01basesocialvalor = scAjaxGetFieldText(nomeCampo_rp01basesocialvalor);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maeemp_validate_rp01basesocialvalor(var_rp01basesocialvalor, var_script_case_init, do_ajax_form_maeemp_validate_rp01basesocialvalor_cb);
  } // do_ajax_form_maeemp_validate_rp01basesocialvalor

  function do_ajax_form_maeemp_validate_rp01basesocialvalor_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "rp01basesocialvalor";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maeemp_validate_rp01basesocialvalor_cb

  // ---------- Validate rp01basesocialtiempo
  function do_ajax_form_maeemp_validate_rp01basesocialtiempo()
  {
    var nomeCampo_rp01basesocialtiempo = "rp01basesocialtiempo";
    var var_rp01basesocialtiempo = scAjaxGetFieldText(nomeCampo_rp01basesocialtiempo);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maeemp_validate_rp01basesocialtiempo(var_rp01basesocialtiempo, var_script_case_init, do_ajax_form_maeemp_validate_rp01basesocialtiempo_cb);
  } // do_ajax_form_maeemp_validate_rp01basesocialtiempo

  function do_ajax_form_maeemp_validate_rp01basesocialtiempo_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "rp01basesocialtiempo";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maeemp_validate_rp01basesocialtiempo_cb

  // ---------- Validate rp0114vopagoacum
  function do_ajax_form_maeemp_validate_rp0114vopagoacum()
  {
    var nomeCampo_rp0114vopagoacum = "rp0114vopagoacum";
    var var_rp0114vopagoacum = scAjaxGetFieldText(nomeCampo_rp0114vopagoacum);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maeemp_validate_rp0114vopagoacum(var_rp0114vopagoacum, var_script_case_init, do_ajax_form_maeemp_validate_rp0114vopagoacum_cb);
  } // do_ajax_form_maeemp_validate_rp0114vopagoacum

  function do_ajax_form_maeemp_validate_rp0114vopagoacum_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "rp0114vopagoacum";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maeemp_validate_rp0114vopagoacum_cb

  // ---------- Validate rp0115vopagoacum
  function do_ajax_form_maeemp_validate_rp0115vopagoacum()
  {
    var nomeCampo_rp0115vopagoacum = "rp0115vopagoacum";
    var var_rp0115vopagoacum = scAjaxGetFieldText(nomeCampo_rp0115vopagoacum);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maeemp_validate_rp0115vopagoacum(var_rp0115vopagoacum, var_script_case_init, do_ajax_form_maeemp_validate_rp0115vopagoacum_cb);
  } // do_ajax_form_maeemp_validate_rp0115vopagoacum

  function do_ajax_form_maeemp_validate_rp0115vopagoacum_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "rp0115vopagoacum";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maeemp_validate_rp0115vopagoacum_cb

  // ---------- Validate rp01cverrorliq
  function do_ajax_form_maeemp_validate_rp01cverrorliq()
  {
    var nomeCampo_rp01cverrorliq = "rp01cverrorliq";
    var var_rp01cverrorliq = scAjaxGetFieldText(nomeCampo_rp01cverrorliq);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maeemp_validate_rp01cverrorliq(var_rp01cverrorliq, var_script_case_init, do_ajax_form_maeemp_validate_rp01cverrorliq_cb);
  } // do_ajax_form_maeemp_validate_rp01cverrorliq

  function do_ajax_form_maeemp_validate_rp01cverrorliq_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "rp01cverrorliq";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maeemp_validate_rp01cverrorliq_cb

  // ---------- Validate rp01porcentliq
  function do_ajax_form_maeemp_validate_rp01porcentliq()
  {
    var nomeCampo_rp01porcentliq = "rp01porcentliq";
    var var_rp01porcentliq = scAjaxGetFieldText(nomeCampo_rp01porcentliq);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maeemp_validate_rp01porcentliq(var_rp01porcentliq, var_script_case_init, do_ajax_form_maeemp_validate_rp01porcentliq_cb);
  } // do_ajax_form_maeemp_validate_rp01porcentliq

  function do_ajax_form_maeemp_validate_rp01porcentliq_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "rp01porcentliq";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maeemp_validate_rp01porcentliq_cb

  // ---------- Validate rp01tiposangre
  function do_ajax_form_maeemp_validate_rp01tiposangre()
  {
    var nomeCampo_rp01tiposangre = "rp01tiposangre";
    var var_rp01tiposangre = scAjaxGetFieldText(nomeCampo_rp01tiposangre);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maeemp_validate_rp01tiposangre(var_rp01tiposangre, var_script_case_init, do_ajax_form_maeemp_validate_rp01tiposangre_cb);
  } // do_ajax_form_maeemp_validate_rp01tiposangre

  function do_ajax_form_maeemp_validate_rp01tiposangre_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "rp01tiposangre";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maeemp_validate_rp01tiposangre_cb

  // ---------- Validate rp01ingresos2do
  function do_ajax_form_maeemp_validate_rp01ingresos2do()
  {
    var nomeCampo_rp01ingresos2do = "rp01ingresos2do";
    var var_rp01ingresos2do = scAjaxGetFieldText(nomeCampo_rp01ingresos2do);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maeemp_validate_rp01ingresos2do(var_rp01ingresos2do, var_script_case_init, do_ajax_form_maeemp_validate_rp01ingresos2do_cb);
  } // do_ajax_form_maeemp_validate_rp01ingresos2do

  function do_ajax_form_maeemp_validate_rp01ingresos2do_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "rp01ingresos2do";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maeemp_validate_rp01ingresos2do_cb

  // ---------- Validate rp01provdiremp
  function do_ajax_form_maeemp_validate_rp01provdiremp()
  {
    var nomeCampo_rp01provdiremp = "rp01provdiremp";
    var var_rp01provdiremp = scAjaxGetFieldText(nomeCampo_rp01provdiremp);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maeemp_validate_rp01provdiremp(var_rp01provdiremp, var_script_case_init, do_ajax_form_maeemp_validate_rp01provdiremp_cb);
  } // do_ajax_form_maeemp_validate_rp01provdiremp

  function do_ajax_form_maeemp_validate_rp01provdiremp_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "rp01provdiremp";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maeemp_validate_rp01provdiremp_cb

  // ---------- Validate rp01cantondiremp
  function do_ajax_form_maeemp_validate_rp01cantondiremp()
  {
    var nomeCampo_rp01cantondiremp = "rp01cantondiremp";
    var var_rp01cantondiremp = scAjaxGetFieldText(nomeCampo_rp01cantondiremp);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maeemp_validate_rp01cantondiremp(var_rp01cantondiremp, var_script_case_init, do_ajax_form_maeemp_validate_rp01cantondiremp_cb);
  } // do_ajax_form_maeemp_validate_rp01cantondiremp

  function do_ajax_form_maeemp_validate_rp01cantondiremp_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "rp01cantondiremp";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maeemp_validate_rp01cantondiremp_cb

  // ---------- Validate rp01ciudaddiremp
  function do_ajax_form_maeemp_validate_rp01ciudaddiremp()
  {
    var nomeCampo_rp01ciudaddiremp = "rp01ciudaddiremp";
    var var_rp01ciudaddiremp = scAjaxGetFieldText(nomeCampo_rp01ciudaddiremp);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maeemp_validate_rp01ciudaddiremp(var_rp01ciudaddiremp, var_script_case_init, do_ajax_form_maeemp_validate_rp01ciudaddiremp_cb);
  } // do_ajax_form_maeemp_validate_rp01ciudaddiremp

  function do_ajax_form_maeemp_validate_rp01ciudaddiremp_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "rp01ciudaddiremp";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maeemp_validate_rp01ciudaddiremp_cb

  // ---------- Validate rp01codocupacion
  function do_ajax_form_maeemp_validate_rp01codocupacion()
  {
    var nomeCampo_rp01codocupacion = "rp01codocupacion";
    var var_rp01codocupacion = scAjaxGetFieldText(nomeCampo_rp01codocupacion);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maeemp_validate_rp01codocupacion(var_rp01codocupacion, var_script_case_init, do_ajax_form_maeemp_validate_rp01codocupacion_cb);
  } // do_ajax_form_maeemp_validate_rp01codocupacion

  function do_ajax_form_maeemp_validate_rp01codocupacion_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "rp01codocupacion";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maeemp_validate_rp01codocupacion_cb

  // ---------- Validate uid
  function do_ajax_form_maeemp_validate_uid()
  {
    var nomeCampo_uid = "uid";
    var var_uid = scAjaxGetFieldText(nomeCampo_uid);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maeemp_validate_uid(var_uid, var_script_case_init, do_ajax_form_maeemp_validate_uid_cb);
  } // do_ajax_form_maeemp_validate_uid

  function do_ajax_form_maeemp_validate_uid_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "uid";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maeemp_validate_uid_cb

  // ---------- Validate block
  function do_ajax_form_maeemp_validate_block()
  {
    var nomeCampo_block = "block";
    var var_block = scAjaxGetFieldText(nomeCampo_block);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maeemp_validate_block(var_block, var_script_case_init, do_ajax_form_maeemp_validate_block_cb);
  } // do_ajax_form_maeemp_validate_block

  function do_ajax_form_maeemp_validate_block_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "block";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maeemp_validate_block_cb

  // ---------- Validate ultimoacceso
  function do_ajax_form_maeemp_validate_ultimoacceso()
  {
    var nomeCampo_ultimoacceso = "ultimoacceso";
    var var_ultimoacceso = scAjaxGetFieldText(nomeCampo_ultimoacceso);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maeemp_validate_ultimoacceso(var_ultimoacceso, var_script_case_init, do_ajax_form_maeemp_validate_ultimoacceso_cb);
  } // do_ajax_form_maeemp_validate_ultimoacceso

  function do_ajax_form_maeemp_validate_ultimoacceso_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "ultimoacceso";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maeemp_validate_ultimoacceso_cb

  // ---------- Validate rp01foto
  function do_ajax_form_maeemp_validate_rp01foto()
  {
    var nomeCampo_rp01foto = "rp01foto";
    var var_rp01foto = scAjaxGetFieldText(nomeCampo_rp01foto);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maeemp_validate_rp01foto(var_rp01foto, var_script_case_init, do_ajax_form_maeemp_validate_rp01foto_cb);
  } // do_ajax_form_maeemp_validate_rp01foto

  function do_ajax_form_maeemp_validate_rp01foto_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "rp01foto";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maeemp_validate_rp01foto_cb

  // ---------- Validate rp01ctacontable
  function do_ajax_form_maeemp_validate_rp01ctacontable()
  {
    var nomeCampo_rp01ctacontable = "rp01ctacontable";
    var var_rp01ctacontable = scAjaxGetFieldText(nomeCampo_rp01ctacontable);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maeemp_validate_rp01ctacontable(var_rp01ctacontable, var_script_case_init, do_ajax_form_maeemp_validate_rp01ctacontable_cb);
  } // do_ajax_form_maeemp_validate_rp01ctacontable

  function do_ajax_form_maeemp_validate_rp01ctacontable_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "rp01ctacontable";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maeemp_validate_rp01ctacontable_cb

  // ---------- Validate rp01email
  function do_ajax_form_maeemp_validate_rp01email()
  {
    var nomeCampo_rp01email = "rp01email";
    var var_rp01email = scAjaxGetFieldText(nomeCampo_rp01email);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maeemp_validate_rp01email(var_rp01email, var_script_case_init, do_ajax_form_maeemp_validate_rp01email_cb);
  } // do_ajax_form_maeemp_validate_rp01email

  function do_ajax_form_maeemp_validate_rp01email_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "rp01email";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maeemp_validate_rp01email_cb

  // ---------- Validate rp01passwd
  function do_ajax_form_maeemp_validate_rp01passwd()
  {
    var nomeCampo_rp01passwd = "rp01passwd";
    var var_rp01passwd = scAjaxGetFieldText(nomeCampo_rp01passwd);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maeemp_validate_rp01passwd(var_rp01passwd, var_script_case_init, do_ajax_form_maeemp_validate_rp01passwd_cb);
  } // do_ajax_form_maeemp_validate_rp01passwd

  function do_ajax_form_maeemp_validate_rp01passwd_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "rp01passwd";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maeemp_validate_rp01passwd_cb

  // ---------- Validate rp01huella
  function do_ajax_form_maeemp_validate_rp01huella()
  {
    var nomeCampo_rp01huella = "rp01huella";
    var var_rp01huella = scAjaxGetFieldText(nomeCampo_rp01huella);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maeemp_validate_rp01huella(var_rp01huella, var_script_case_init, do_ajax_form_maeemp_validate_rp01huella_cb);
  } // do_ajax_form_maeemp_validate_rp01huella

  function do_ajax_form_maeemp_validate_rp01huella_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "rp01huella";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maeemp_validate_rp01huella_cb

  // ---------- Validate rp01recibefr
  function do_ajax_form_maeemp_validate_rp01recibefr()
  {
    var nomeCampo_rp01recibefr = "rp01recibefr";
    var var_rp01recibefr = scAjaxGetFieldText(nomeCampo_rp01recibefr);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maeemp_validate_rp01recibefr(var_rp01recibefr, var_script_case_init, do_ajax_form_maeemp_validate_rp01recibefr_cb);
  } // do_ajax_form_maeemp_validate_rp01recibefr

  function do_ajax_form_maeemp_validate_rp01recibefr_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "rp01recibefr";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maeemp_validate_rp01recibefr_cb

  // ---------- Validate rp01recibedt
  function do_ajax_form_maeemp_validate_rp01recibedt()
  {
    var nomeCampo_rp01recibedt = "rp01recibedt";
    var var_rp01recibedt = scAjaxGetFieldText(nomeCampo_rp01recibedt);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maeemp_validate_rp01recibedt(var_rp01recibedt, var_script_case_init, do_ajax_form_maeemp_validate_rp01recibedt_cb);
  } // do_ajax_form_maeemp_validate_rp01recibedt

  function do_ajax_form_maeemp_validate_rp01recibedt_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "rp01recibedt";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maeemp_validate_rp01recibedt_cb

  // ---------- Validate rp01recibedc
  function do_ajax_form_maeemp_validate_rp01recibedc()
  {
    var nomeCampo_rp01recibedc = "rp01recibedc";
    var var_rp01recibedc = scAjaxGetFieldText(nomeCampo_rp01recibedc);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maeemp_validate_rp01recibedc(var_rp01recibedc, var_script_case_init, do_ajax_form_maeemp_validate_rp01recibedc_cb);
  } // do_ajax_form_maeemp_validate_rp01recibedc

  function do_ajax_form_maeemp_validate_rp01recibedc_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "rp01recibedc";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maeemp_validate_rp01recibedc_cb

  // ---------- Validate rp01uid
  function do_ajax_form_maeemp_validate_rp01uid()
  {
    var nomeCampo_rp01uid = "rp01uid";
    var var_rp01uid = scAjaxGetFieldText(nomeCampo_rp01uid);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maeemp_validate_rp01uid(var_rp01uid, var_script_case_init, do_ajax_form_maeemp_validate_rp01uid_cb);
  } // do_ajax_form_maeemp_validate_rp01uid

  function do_ajax_form_maeemp_validate_rp01uid_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "rp01uid";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maeemp_validate_rp01uid_cb

  // ---------- Validate rp01fechauid
  function do_ajax_form_maeemp_validate_rp01fechauid()
  {
    var nomeCampo_rp01fechauid = "rp01fechauid";
    var var_rp01fechauid = scAjaxGetFieldText(nomeCampo_rp01fechauid);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maeemp_validate_rp01fechauid(var_rp01fechauid, var_script_case_init, do_ajax_form_maeemp_validate_rp01fechauid_cb);
  } // do_ajax_form_maeemp_validate_rp01fechauid

  function do_ajax_form_maeemp_validate_rp01fechauid_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "rp01fechauid";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maeemp_validate_rp01fechauid_cb

  // ---------- Validate rp01obs
  function do_ajax_form_maeemp_validate_rp01obs()
  {
    var nomeCampo_rp01obs = "rp01obs";
    var var_rp01obs = scAjaxGetFieldText(nomeCampo_rp01obs);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maeemp_validate_rp01obs(var_rp01obs, var_script_case_init, do_ajax_form_maeemp_validate_rp01obs_cb);
  } // do_ajax_form_maeemp_validate_rp01obs

  function do_ajax_form_maeemp_validate_rp01obs_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "rp01obs";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maeemp_validate_rp01obs_cb

  // ---------- Validate rp01cauliq
  function do_ajax_form_maeemp_validate_rp01cauliq()
  {
    var nomeCampo_rp01cauliq = "rp01cauliq";
    var var_rp01cauliq = scAjaxGetFieldText(nomeCampo_rp01cauliq);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maeemp_validate_rp01cauliq(var_rp01cauliq, var_script_case_init, do_ajax_form_maeemp_validate_rp01cauliq_cb);
  } // do_ajax_form_maeemp_validate_rp01cauliq

  function do_ajax_form_maeemp_validate_rp01cauliq_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "rp01cauliq";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maeemp_validate_rp01cauliq_cb

  // ---------- Validate rp01discapacidad
  function do_ajax_form_maeemp_validate_rp01discapacidad()
  {
    var nomeCampo_rp01discapacidad = "rp01discapacidad";
    var var_rp01discapacidad = scAjaxGetFieldText(nomeCampo_rp01discapacidad);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maeemp_validate_rp01discapacidad(var_rp01discapacidad, var_script_case_init, do_ajax_form_maeemp_validate_rp01discapacidad_cb);
  } // do_ajax_form_maeemp_validate_rp01discapacidad

  function do_ajax_form_maeemp_validate_rp01discapacidad_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "rp01discapacidad";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maeemp_validate_rp01discapacidad_cb

  // ---------- Validate rp01conadis
  function do_ajax_form_maeemp_validate_rp01conadis()
  {
    var nomeCampo_rp01conadis = "rp01conadis";
    var var_rp01conadis = scAjaxGetFieldText(nomeCampo_rp01conadis);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maeemp_validate_rp01conadis(var_rp01conadis, var_script_case_init, do_ajax_form_maeemp_validate_rp01conadis_cb);
  } // do_ajax_form_maeemp_validate_rp01conadis

  function do_ajax_form_maeemp_validate_rp01conadis_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "rp01conadis";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maeemp_validate_rp01conadis_cb

  // ---------- Validate rp01tpdiscapacidad
  function do_ajax_form_maeemp_validate_rp01tpdiscapacidad()
  {
    var nomeCampo_rp01tpdiscapacidad = "rp01tpdiscapacidad";
    var var_rp01tpdiscapacidad = scAjaxGetFieldText(nomeCampo_rp01tpdiscapacidad);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maeemp_validate_rp01tpdiscapacidad(var_rp01tpdiscapacidad, var_script_case_init, do_ajax_form_maeemp_validate_rp01tpdiscapacidad_cb);
  } // do_ajax_form_maeemp_validate_rp01tpdiscapacidad

  function do_ajax_form_maeemp_validate_rp01tpdiscapacidad_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "rp01tpdiscapacidad";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maeemp_validate_rp01tpdiscapacidad_cb

  // ---------- Validate rp01prdiscapacidad
  function do_ajax_form_maeemp_validate_rp01prdiscapacidad()
  {
    var nomeCampo_rp01prdiscapacidad = "rp01prdiscapacidad";
    var var_rp01prdiscapacidad = scAjaxGetFieldText(nomeCampo_rp01prdiscapacidad);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maeemp_validate_rp01prdiscapacidad(var_rp01prdiscapacidad, var_script_case_init, do_ajax_form_maeemp_validate_rp01prdiscapacidad_cb);
  } // do_ajax_form_maeemp_validate_rp01prdiscapacidad

  function do_ajax_form_maeemp_validate_rp01prdiscapacidad_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "rp01prdiscapacidad";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maeemp_validate_rp01prdiscapacidad_cb

  // ---------- Validate rp01freserva
  function do_ajax_form_maeemp_validate_rp01freserva()
  {
    var nomeCampo_rp01freserva = "rp01freserva";
    var var_rp01freserva = scAjaxGetFieldText(nomeCampo_rp01freserva);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maeemp_validate_rp01freserva(var_rp01freserva, var_script_case_init, do_ajax_form_maeemp_validate_rp01freserva_cb);
  } // do_ajax_form_maeemp_validate_rp01freserva

  function do_ajax_form_maeemp_validate_rp01freserva_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "rp01freserva";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maeemp_validate_rp01freserva_cb

  // ---------- Validate rp01codsectorial
  function do_ajax_form_maeemp_validate_rp01codsectorial()
  {
    var nomeCampo_rp01codsectorial = "rp01codsectorial";
    var var_rp01codsectorial = scAjaxGetFieldText(nomeCampo_rp01codsectorial);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maeemp_validate_rp01codsectorial(var_rp01codsectorial, var_script_case_init, do_ajax_form_maeemp_validate_rp01codsectorial_cb);
  } // do_ajax_form_maeemp_validate_rp01codsectorial

  function do_ajax_form_maeemp_validate_rp01codsectorial_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "rp01codsectorial";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maeemp_validate_rp01codsectorial_cb

  // ---------- Validate anticipoporvalor
  function do_ajax_form_maeemp_validate_anticipoporvalor()
  {
    var nomeCampo_anticipoporvalor = "anticipoporvalor";
    var var_anticipoporvalor = scAjaxGetFieldText(nomeCampo_anticipoporvalor);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maeemp_validate_anticipoporvalor(var_anticipoporvalor, var_script_case_init, do_ajax_form_maeemp_validate_anticipoporvalor_cb);
  } // do_ajax_form_maeemp_validate_anticipoporvalor

  function do_ajax_form_maeemp_validate_anticipoporvalor_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "anticipoporvalor";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maeemp_validate_anticipoporvalor_cb

  // ---------- Validate tipidret
  function do_ajax_form_maeemp_validate_tipidret()
  {
    var nomeCampo_tipidret = "tipidret";
    var var_tipidret = scAjaxGetFieldText(nomeCampo_tipidret);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maeemp_validate_tipidret(var_tipidret, var_script_case_init, do_ajax_form_maeemp_validate_tipidret_cb);
  } // do_ajax_form_maeemp_validate_tipidret

  function do_ajax_form_maeemp_validate_tipidret_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "tipidret";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maeemp_validate_tipidret_cb

  // ---------- Validate residenciatrab
  function do_ajax_form_maeemp_validate_residenciatrab()
  {
    var nomeCampo_residenciatrab = "residenciatrab";
    var var_residenciatrab = scAjaxGetFieldText(nomeCampo_residenciatrab);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maeemp_validate_residenciatrab(var_residenciatrab, var_script_case_init, do_ajax_form_maeemp_validate_residenciatrab_cb);
  } // do_ajax_form_maeemp_validate_residenciatrab

  function do_ajax_form_maeemp_validate_residenciatrab_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "residenciatrab";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maeemp_validate_residenciatrab_cb

  // ---------- Validate paisresidencia
  function do_ajax_form_maeemp_validate_paisresidencia()
  {
    var nomeCampo_paisresidencia = "paisresidencia";
    var var_paisresidencia = scAjaxGetFieldText(nomeCampo_paisresidencia);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maeemp_validate_paisresidencia(var_paisresidencia, var_script_case_init, do_ajax_form_maeemp_validate_paisresidencia_cb);
  } // do_ajax_form_maeemp_validate_paisresidencia

  function do_ajax_form_maeemp_validate_paisresidencia_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "paisresidencia";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maeemp_validate_paisresidencia_cb

  // ---------- Validate aplicaconvenio
  function do_ajax_form_maeemp_validate_aplicaconvenio()
  {
    var nomeCampo_aplicaconvenio = "aplicaconvenio";
    var var_aplicaconvenio = scAjaxGetFieldText(nomeCampo_aplicaconvenio);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maeemp_validate_aplicaconvenio(var_aplicaconvenio, var_script_case_init, do_ajax_form_maeemp_validate_aplicaconvenio_cb);
  } // do_ajax_form_maeemp_validate_aplicaconvenio

  function do_ajax_form_maeemp_validate_aplicaconvenio_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "aplicaconvenio";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maeemp_validate_aplicaconvenio_cb

  // ---------- Validate tipotrabajdiscap
  function do_ajax_form_maeemp_validate_tipotrabajdiscap()
  {
    var nomeCampo_tipotrabajdiscap = "tipotrabajdiscap";
    var var_tipotrabajdiscap = scAjaxGetFieldText(nomeCampo_tipotrabajdiscap);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maeemp_validate_tipotrabajdiscap(var_tipotrabajdiscap, var_script_case_init, do_ajax_form_maeemp_validate_tipotrabajdiscap_cb);
  } // do_ajax_form_maeemp_validate_tipotrabajdiscap

  function do_ajax_form_maeemp_validate_tipotrabajdiscap_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "tipotrabajdiscap";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maeemp_validate_tipotrabajdiscap_cb

  // ---------- Validate porcentajediscap
  function do_ajax_form_maeemp_validate_porcentajediscap()
  {
    var nomeCampo_porcentajediscap = "porcentajediscap";
    var var_porcentajediscap = scAjaxGetFieldText(nomeCampo_porcentajediscap);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maeemp_validate_porcentajediscap(var_porcentajediscap, var_script_case_init, do_ajax_form_maeemp_validate_porcentajediscap_cb);
  } // do_ajax_form_maeemp_validate_porcentajediscap

  function do_ajax_form_maeemp_validate_porcentajediscap_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "porcentajediscap";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maeemp_validate_porcentajediscap_cb

  // ---------- Validate tipiddiscap
  function do_ajax_form_maeemp_validate_tipiddiscap()
  {
    var nomeCampo_tipiddiscap = "tipiddiscap";
    var var_tipiddiscap = scAjaxGetFieldText(nomeCampo_tipiddiscap);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maeemp_validate_tipiddiscap(var_tipiddiscap, var_script_case_init, do_ajax_form_maeemp_validate_tipiddiscap_cb);
  } // do_ajax_form_maeemp_validate_tipiddiscap

  function do_ajax_form_maeemp_validate_tipiddiscap_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "tipiddiscap";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maeemp_validate_tipiddiscap_cb

  // ---------- Validate iddiscap
  function do_ajax_form_maeemp_validate_iddiscap()
  {
    var nomeCampo_iddiscap = "iddiscap";
    var var_iddiscap = scAjaxGetFieldText(nomeCampo_iddiscap);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maeemp_validate_iddiscap(var_iddiscap, var_script_case_init, do_ajax_form_maeemp_validate_iddiscap_cb);
  } // do_ajax_form_maeemp_validate_iddiscap

  function do_ajax_form_maeemp_validate_iddiscap_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "iddiscap";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maeemp_validate_iddiscap_cb

  // ---------- Validate rp01varias_secciones
  function do_ajax_form_maeemp_validate_rp01varias_secciones()
  {
    var nomeCampo_rp01varias_secciones = "rp01varias_secciones";
    var var_rp01varias_secciones = scAjaxGetFieldText(nomeCampo_rp01varias_secciones);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maeemp_validate_rp01varias_secciones(var_rp01varias_secciones, var_script_case_init, do_ajax_form_maeemp_validate_rp01varias_secciones_cb);
  } // do_ajax_form_maeemp_validate_rp01varias_secciones

  function do_ajax_form_maeemp_validate_rp01varias_secciones_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "rp01varias_secciones";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maeemp_validate_rp01varias_secciones_cb

  // ---------- Validate rp01cc
  function do_ajax_form_maeemp_validate_rp01cc()
  {
    var nomeCampo_rp01cc = "rp01cc";
    var var_rp01cc = scAjaxGetFieldText(nomeCampo_rp01cc);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maeemp_validate_rp01cc(var_rp01cc, var_script_case_init, do_ajax_form_maeemp_validate_rp01cc_cb);
  } // do_ajax_form_maeemp_validate_rp01cc

  function do_ajax_form_maeemp_validate_rp01cc_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "rp01cc";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maeemp_validate_rp01cc_cb

  // ---------- Validate rp01observacion
  function do_ajax_form_maeemp_validate_rp01observacion()
  {
    var nomeCampo_rp01observacion = "rp01observacion";
    var var_rp01observacion = scAjaxGetFieldText(nomeCampo_rp01observacion);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maeemp_validate_rp01observacion(var_rp01observacion, var_script_case_init, do_ajax_form_maeemp_validate_rp01observacion_cb);
  } // do_ajax_form_maeemp_validate_rp01observacion

  function do_ajax_form_maeemp_validate_rp01observacion_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "rp01observacion";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maeemp_validate_rp01observacion_cb

  // ---------- Validate rp01iessconyugue
  function do_ajax_form_maeemp_validate_rp01iessconyugue()
  {
    var nomeCampo_rp01iessconyugue = "rp01iessconyugue";
    var var_rp01iessconyugue = scAjaxGetFieldText(nomeCampo_rp01iessconyugue);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maeemp_validate_rp01iessconyugue(var_rp01iessconyugue, var_script_case_init, do_ajax_form_maeemp_validate_rp01iessconyugue_cb);
  } // do_ajax_form_maeemp_validate_rp01iessconyugue

  function do_ajax_form_maeemp_validate_rp01iessconyugue_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "rp01iessconyugue";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maeemp_validate_rp01iessconyugue_cb

  // ---------- Validate rp01tiporefrigerio
  function do_ajax_form_maeemp_validate_rp01tiporefrigerio()
  {
    var nomeCampo_rp01tiporefrigerio = "rp01tiporefrigerio";
    var var_rp01tiporefrigerio = scAjaxGetFieldText(nomeCampo_rp01tiporefrigerio);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maeemp_validate_rp01tiporefrigerio(var_rp01tiporefrigerio, var_script_case_init, do_ajax_form_maeemp_validate_rp01tiporefrigerio_cb);
  } // do_ajax_form_maeemp_validate_rp01tiporefrigerio

  function do_ajax_form_maeemp_validate_rp01tiporefrigerio_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "rp01tiporefrigerio";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maeemp_validate_rp01tiporefrigerio_cb

  // ---------- Validate idiomas
  function do_ajax_form_maeemp_validate_idiomas()
  {
    var nomeCampo_idiomas = "idiomas";
    var var_idiomas = scAjaxGetFieldText(nomeCampo_idiomas);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maeemp_validate_idiomas(var_idiomas, var_script_case_init, do_ajax_form_maeemp_validate_idiomas_cb);
  } // do_ajax_form_maeemp_validate_idiomas

  function do_ajax_form_maeemp_validate_idiomas_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "idiomas";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maeemp_validate_idiomas_cb

  // ---------- Validate emergencias
  function do_ajax_form_maeemp_validate_emergencias()
  {
    var nomeCampo_emergencias = "emergencias";
    var var_emergencias = scAjaxGetFieldText(nomeCampo_emergencias);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maeemp_validate_emergencias(var_emergencias, var_script_case_init, do_ajax_form_maeemp_validate_emergencias_cb);
  } // do_ajax_form_maeemp_validate_emergencias

  function do_ajax_form_maeemp_validate_emergencias_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "emergencias";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maeemp_validate_emergencias_cb

  // ---------- Validate rp01tipojornada
  function do_ajax_form_maeemp_validate_rp01tipojornada()
  {
    var nomeCampo_rp01tipojornada = "rp01tipojornada";
    var var_rp01tipojornada = scAjaxGetFieldText(nomeCampo_rp01tipojornada);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maeemp_validate_rp01tipojornada(var_rp01tipojornada, var_script_case_init, do_ajax_form_maeemp_validate_rp01tipojornada_cb);
  } // do_ajax_form_maeemp_validate_rp01tipojornada

  function do_ajax_form_maeemp_validate_rp01tipojornada_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "rp01tipojornada";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maeemp_validate_rp01tipojornada_cb

  // ---------- Validate rp01numero_horas
  function do_ajax_form_maeemp_validate_rp01numero_horas()
  {
    var nomeCampo_rp01numero_horas = "rp01numero_horas";
    var var_rp01numero_horas = scAjaxGetFieldText(nomeCampo_rp01numero_horas);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maeemp_validate_rp01numero_horas(var_rp01numero_horas, var_script_case_init, do_ajax_form_maeemp_validate_rp01numero_horas_cb);
  } // do_ajax_form_maeemp_validate_rp01numero_horas

  function do_ajax_form_maeemp_validate_rp01numero_horas_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "rp01numero_horas";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maeemp_validate_rp01numero_horas_cb

  // ---------- Validate rp01emailpersonal
  function do_ajax_form_maeemp_validate_rp01emailpersonal()
  {
    var nomeCampo_rp01emailpersonal = "rp01emailpersonal";
    var var_rp01emailpersonal = scAjaxGetFieldText(nomeCampo_rp01emailpersonal);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maeemp_validate_rp01emailpersonal(var_rp01emailpersonal, var_script_case_init, do_ajax_form_maeemp_validate_rp01emailpersonal_cb);
  } // do_ajax_form_maeemp_validate_rp01emailpersonal

  function do_ajax_form_maeemp_validate_rp01emailpersonal_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "rp01emailpersonal";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maeemp_validate_rp01emailpersonal_cb

  // ---------- Validate rp01supervisadopor
  function do_ajax_form_maeemp_validate_rp01supervisadopor()
  {
    var nomeCampo_rp01supervisadopor = "rp01supervisadopor";
    var var_rp01supervisadopor = scAjaxGetFieldText(nomeCampo_rp01supervisadopor);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maeemp_validate_rp01supervisadopor(var_rp01supervisadopor, var_script_case_init, do_ajax_form_maeemp_validate_rp01supervisadopor_cb);
  } // do_ajax_form_maeemp_validate_rp01supervisadopor

  function do_ajax_form_maeemp_validate_rp01supervisadopor_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "rp01supervisadopor";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maeemp_validate_rp01supervisadopor_cb

  // ---------- Validate rp01zonaderiesgo
  function do_ajax_form_maeemp_validate_rp01zonaderiesgo()
  {
    var nomeCampo_rp01zonaderiesgo = "rp01zonaderiesgo";
    var var_rp01zonaderiesgo = scAjaxGetFieldText(nomeCampo_rp01zonaderiesgo);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maeemp_validate_rp01zonaderiesgo(var_rp01zonaderiesgo, var_script_case_init, do_ajax_form_maeemp_validate_rp01zonaderiesgo_cb);
  } // do_ajax_form_maeemp_validate_rp01zonaderiesgo

  function do_ajax_form_maeemp_validate_rp01zonaderiesgo_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "rp01zonaderiesgo";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maeemp_validate_rp01zonaderiesgo_cb

  // ---------- Validate rp01refpersnom1
  function do_ajax_form_maeemp_validate_rp01refpersnom1()
  {
    var nomeCampo_rp01refpersnom1 = "rp01refpersnom1";
    var var_rp01refpersnom1 = scAjaxGetFieldText(nomeCampo_rp01refpersnom1);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maeemp_validate_rp01refpersnom1(var_rp01refpersnom1, var_script_case_init, do_ajax_form_maeemp_validate_rp01refpersnom1_cb);
  } // do_ajax_form_maeemp_validate_rp01refpersnom1

  function do_ajax_form_maeemp_validate_rp01refpersnom1_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "rp01refpersnom1";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maeemp_validate_rp01refpersnom1_cb

  // ---------- Validate rp01refpersparen1
  function do_ajax_form_maeemp_validate_rp01refpersparen1()
  {
    var nomeCampo_rp01refpersparen1 = "rp01refpersparen1";
    var var_rp01refpersparen1 = scAjaxGetFieldText(nomeCampo_rp01refpersparen1);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maeemp_validate_rp01refpersparen1(var_rp01refpersparen1, var_script_case_init, do_ajax_form_maeemp_validate_rp01refpersparen1_cb);
  } // do_ajax_form_maeemp_validate_rp01refpersparen1

  function do_ajax_form_maeemp_validate_rp01refpersparen1_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "rp01refpersparen1";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maeemp_validate_rp01refpersparen1_cb

  // ---------- Validate rp01refperstel1
  function do_ajax_form_maeemp_validate_rp01refperstel1()
  {
    var nomeCampo_rp01refperstel1 = "rp01refperstel1";
    var var_rp01refperstel1 = scAjaxGetFieldText(nomeCampo_rp01refperstel1);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maeemp_validate_rp01refperstel1(var_rp01refperstel1, var_script_case_init, do_ajax_form_maeemp_validate_rp01refperstel1_cb);
  } // do_ajax_form_maeemp_validate_rp01refperstel1

  function do_ajax_form_maeemp_validate_rp01refperstel1_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "rp01refperstel1";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maeemp_validate_rp01refperstel1_cb

  // ---------- Validate rp01refpersnom2
  function do_ajax_form_maeemp_validate_rp01refpersnom2()
  {
    var nomeCampo_rp01refpersnom2 = "rp01refpersnom2";
    var var_rp01refpersnom2 = scAjaxGetFieldText(nomeCampo_rp01refpersnom2);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maeemp_validate_rp01refpersnom2(var_rp01refpersnom2, var_script_case_init, do_ajax_form_maeemp_validate_rp01refpersnom2_cb);
  } // do_ajax_form_maeemp_validate_rp01refpersnom2

  function do_ajax_form_maeemp_validate_rp01refpersnom2_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "rp01refpersnom2";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maeemp_validate_rp01refpersnom2_cb

  // ---------- Validate rp01refpersparen2
  function do_ajax_form_maeemp_validate_rp01refpersparen2()
  {
    var nomeCampo_rp01refpersparen2 = "rp01refpersparen2";
    var var_rp01refpersparen2 = scAjaxGetFieldText(nomeCampo_rp01refpersparen2);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maeemp_validate_rp01refpersparen2(var_rp01refpersparen2, var_script_case_init, do_ajax_form_maeemp_validate_rp01refpersparen2_cb);
  } // do_ajax_form_maeemp_validate_rp01refpersparen2

  function do_ajax_form_maeemp_validate_rp01refpersparen2_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "rp01refpersparen2";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maeemp_validate_rp01refpersparen2_cb

  // ---------- Validate rp01refperstel2
  function do_ajax_form_maeemp_validate_rp01refperstel2()
  {
    var nomeCampo_rp01refperstel2 = "rp01refperstel2";
    var var_rp01refperstel2 = scAjaxGetFieldText(nomeCampo_rp01refperstel2);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maeemp_validate_rp01refperstel2(var_rp01refperstel2, var_script_case_init, do_ajax_form_maeemp_validate_rp01refperstel2_cb);
  } // do_ajax_form_maeemp_validate_rp01refperstel2

  function do_ajax_form_maeemp_validate_rp01refperstel2_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "rp01refperstel2";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maeemp_validate_rp01refperstel2_cb

  // ---------- Validate rp01tipovivienda
  function do_ajax_form_maeemp_validate_rp01tipovivienda()
  {
    var nomeCampo_rp01tipovivienda = "rp01tipovivienda";
    var var_rp01tipovivienda = scAjaxGetFieldText(nomeCampo_rp01tipovivienda);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maeemp_validate_rp01tipovivienda(var_rp01tipovivienda, var_script_case_init, do_ajax_form_maeemp_validate_rp01tipovivienda_cb);
  } // do_ajax_form_maeemp_validate_rp01tipovivienda

  function do_ajax_form_maeemp_validate_rp01tipovivienda_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "rp01tipovivienda";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maeemp_validate_rp01tipovivienda_cb

  // ---------- Validate rp01serviciosbasicos
  function do_ajax_form_maeemp_validate_rp01serviciosbasicos()
  {
    var nomeCampo_rp01serviciosbasicos = "rp01serviciosbasicos";
    var var_rp01serviciosbasicos = scAjaxGetFieldText(nomeCampo_rp01serviciosbasicos);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maeemp_validate_rp01serviciosbasicos(var_rp01serviciosbasicos, var_script_case_init, do_ajax_form_maeemp_validate_rp01serviciosbasicos_cb);
  } // do_ajax_form_maeemp_validate_rp01serviciosbasicos

  function do_ajax_form_maeemp_validate_rp01serviciosbasicos_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "rp01serviciosbasicos";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maeemp_validate_rp01serviciosbasicos_cb

  // ---------- Validate rp01viviendadetalle
  function do_ajax_form_maeemp_validate_rp01viviendadetalle()
  {
    var nomeCampo_rp01viviendadetalle = "rp01viviendadetalle";
    var var_rp01viviendadetalle = scAjaxGetFieldText(nomeCampo_rp01viviendadetalle);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maeemp_validate_rp01viviendadetalle(var_rp01viviendadetalle, var_script_case_init, do_ajax_form_maeemp_validate_rp01viviendadetalle_cb);
  } // do_ajax_form_maeemp_validate_rp01viviendadetalle

  function do_ajax_form_maeemp_validate_rp01viviendadetalle_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "rp01viviendadetalle";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maeemp_validate_rp01viviendadetalle_cb

  // ---------- Validate rp01dormitorios
  function do_ajax_form_maeemp_validate_rp01dormitorios()
  {
    var nomeCampo_rp01dormitorios = "rp01dormitorios";
    var var_rp01dormitorios = scAjaxGetFieldText(nomeCampo_rp01dormitorios);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maeemp_validate_rp01dormitorios(var_rp01dormitorios, var_script_case_init, do_ajax_form_maeemp_validate_rp01dormitorios_cb);
  } // do_ajax_form_maeemp_validate_rp01dormitorios

  function do_ajax_form_maeemp_validate_rp01dormitorios_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "rp01dormitorios";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maeemp_validate_rp01dormitorios_cb

  // ---------- Validate rp01sala
  function do_ajax_form_maeemp_validate_rp01sala()
  {
    var nomeCampo_rp01sala = "rp01sala";
    var var_rp01sala = scAjaxGetFieldText(nomeCampo_rp01sala);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maeemp_validate_rp01sala(var_rp01sala, var_script_case_init, do_ajax_form_maeemp_validate_rp01sala_cb);
  } // do_ajax_form_maeemp_validate_rp01sala

  function do_ajax_form_maeemp_validate_rp01sala_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "rp01sala";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maeemp_validate_rp01sala_cb

  // ---------- Validate rp01comedor
  function do_ajax_form_maeemp_validate_rp01comedor()
  {
    var nomeCampo_rp01comedor = "rp01comedor";
    var var_rp01comedor = scAjaxGetFieldText(nomeCampo_rp01comedor);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maeemp_validate_rp01comedor(var_rp01comedor, var_script_case_init, do_ajax_form_maeemp_validate_rp01comedor_cb);
  } // do_ajax_form_maeemp_validate_rp01comedor

  function do_ajax_form_maeemp_validate_rp01comedor_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "rp01comedor";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maeemp_validate_rp01comedor_cb

  // ---------- Validate rp01banos
  function do_ajax_form_maeemp_validate_rp01banos()
  {
    var nomeCampo_rp01banos = "rp01banos";
    var var_rp01banos = scAjaxGetFieldText(nomeCampo_rp01banos);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maeemp_validate_rp01banos(var_rp01banos, var_script_case_init, do_ajax_form_maeemp_validate_rp01banos_cb);
  } // do_ajax_form_maeemp_validate_rp01banos

  function do_ajax_form_maeemp_validate_rp01banos_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "rp01banos";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maeemp_validate_rp01banos_cb

  // ---------- Validate rp01estudiosrealizados
  function do_ajax_form_maeemp_validate_rp01estudiosrealizados()
  {
    var nomeCampo_rp01estudiosrealizados = "rp01estudiosrealizados";
    var var_rp01estudiosrealizados = scAjaxGetFieldText(nomeCampo_rp01estudiosrealizados);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maeemp_validate_rp01estudiosrealizados(var_rp01estudiosrealizados, var_script_case_init, do_ajax_form_maeemp_validate_rp01estudiosrealizados_cb);
  } // do_ajax_form_maeemp_validate_rp01estudiosrealizados

  function do_ajax_form_maeemp_validate_rp01estudiosrealizados_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "rp01estudiosrealizados";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maeemp_validate_rp01estudiosrealizados_cb

  // ---------- Validate rp01ruta1
  function do_ajax_form_maeemp_validate_rp01ruta1()
  {
    var nomeCampo_rp01ruta1 = "rp01ruta1";
    var var_rp01ruta1 = scAjaxGetFieldText(nomeCampo_rp01ruta1);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maeemp_validate_rp01ruta1(var_rp01ruta1, var_script_case_init, do_ajax_form_maeemp_validate_rp01ruta1_cb);
  } // do_ajax_form_maeemp_validate_rp01ruta1

  function do_ajax_form_maeemp_validate_rp01ruta1_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "rp01ruta1";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maeemp_validate_rp01ruta1_cb

  // ---------- Validate rp01ruta2
  function do_ajax_form_maeemp_validate_rp01ruta2()
  {
    var nomeCampo_rp01ruta2 = "rp01ruta2";
    var var_rp01ruta2 = scAjaxGetFieldText(nomeCampo_rp01ruta2);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maeemp_validate_rp01ruta2(var_rp01ruta2, var_script_case_init, do_ajax_form_maeemp_validate_rp01ruta2_cb);
  } // do_ajax_form_maeemp_validate_rp01ruta2

  function do_ajax_form_maeemp_validate_rp01ruta2_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "rp01ruta2";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maeemp_validate_rp01ruta2_cb

  // ---------- Validate rp01ruta3
  function do_ajax_form_maeemp_validate_rp01ruta3()
  {
    var nomeCampo_rp01ruta3 = "rp01ruta3";
    var var_rp01ruta3 = scAjaxGetFieldText(nomeCampo_rp01ruta3);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maeemp_validate_rp01ruta3(var_rp01ruta3, var_script_case_init, do_ajax_form_maeemp_validate_rp01ruta3_cb);
  } // do_ajax_form_maeemp_validate_rp01ruta3

  function do_ajax_form_maeemp_validate_rp01ruta3_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "rp01ruta3";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maeemp_validate_rp01ruta3_cb

  // ---------- Validate rp01actividadesextras
  function do_ajax_form_maeemp_validate_rp01actividadesextras()
  {
    var nomeCampo_rp01actividadesextras = "rp01actividadesextras";
    var var_rp01actividadesextras = scAjaxGetFieldText(nomeCampo_rp01actividadesextras);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maeemp_validate_rp01actividadesextras(var_rp01actividadesextras, var_script_case_init, do_ajax_form_maeemp_validate_rp01actividadesextras_cb);
  } // do_ajax_form_maeemp_validate_rp01actividadesextras

  function do_ajax_form_maeemp_validate_rp01actividadesextras_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "rp01actividadesextras";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maeemp_validate_rp01actividadesextras_cb
function scAjaxShowErrorDisplay(sErrorId, sErrorMsg) {
	if ("table" != sErrorId && !$("id_error_display_" + sErrorId + "_frame").hasClass('scFormToastDivFixed')) {
		scAjaxShowErrorDisplay_default(sErrorId, sErrorMsg);
	}
	else {
		scAjaxShowErrorDisplay_toast(sErrorId, sErrorMsg);
	}
} // scAjaxShowErrorDisplay

function scAjaxHideErrorDisplay(sErrorId, sErrorMsg) {
	if ("table" != sErrorId && !$("id_error_display_" + sErrorId + "_frame").hasClass('scFormToastDivFixed')) {
		scAjaxHideErrorDisplay_default(sErrorId, sErrorMsg);
	}
	else {
		scAjaxHideErrorDisplay_toast(sErrorId, sErrorMsg);
	}
} // scAjaxHideErrorDisplay

function scAjaxShowErrorDisplay_toast(sErrorId, sErrorMsg) {
	params = {type: 'error'};
	scJs_alert_sweetalert(sErrorMsg, function() { scAjaxHideErrorDisplay(sErrorId, sErrorMsg); }, scJs_sweetalert_params(params));
} // scAjaxShowErrorDisplay_toast

function scAjaxHideErrorDisplay_toast(sErrorId, bForce) {
	if (document.getElementById("id_error_display_" + sErrorId + "_frame")) {
		if (null == bForce) {
			bForce = true;
		}
		if (bForce) {
			var $oField = $('#id_sc_field_' + sErrorId);
			if (0 < $oField.length) {
				$oField.removeClass(sc_css_status);
			}
		}
	}
} // scAjaxHideErrorDisplay_toast

function scAjaxShowMessage(messageType) {
	scAjaxShowMessage_toast(true, messageType);
} // scAjaxShowMessage_toast

function scAjaxHideMessage() {
} // scAjaxHideMessage_toast

function scAjaxShowMessage_toast(isToast, messageType) {
	if (!oResp["msgDisplay"] || !oResp["msgDisplay"]["msgText"]) {
		return;
	}

	if (oResp["msgDisplay"]["toast"] || isToast) {
		_scAjaxShowMessageToast({title: scMsgDefTitle, message: oResp["msgDisplay"]["msgText"], isModal: false, timeout: sc_ajaxMsgTime, showButton: false, buttonLabel: "Ok", topPos: 0, leftPos: 0, width: 0, height: 0, redirUrl: "", redirTarget: "", redirParam: "", showClose: false, showBodyIcon: true, isToast: true, toastPos: "", type: messageType});
	}
	else {
		scJs_alert(oResp["msgDisplay"]["msgText"], scForm_cancel, {});
	}
} // scAjaxShowMessage_toast

function _scAjaxShowMessageToast(params) {
	var sweetAlertParams = {toast: true, showConfirmButton: false};

	if ("" != params["type"]) {
		sweetAlertParams["type"] = params["type"];
	}

	if ("" != params["title"]) {
		sweetAlertParams["title"] = scAjaxSpecCharParser(params["title"]);
	}

	if ("" != params["toastPos"]) {
		sweetAlertParams["position"] = params["toastPos"];
	}

	if (null == sweetAlertParams["position"]) {
		sweetAlertParams["position"] = "top-end";
	}

	if (null == sweetAlertParams["timer"]) {
		sweetAlertParams["timer"] = 3000;
	}

	scJs_alert_sweetalert(scAjaxSpecCharParser(params["message"]), scForm_cancel, scJs_sweetalert_params(sweetAlertParams));
} // _scAjaxShowMessageToast

function _scAjaxShowMessage(params) {
	if (params["isToast"]) {
		_scAjaxShowMessageToast(params);
	}
	else {
		if ("" != params["redirUrl"] && "" != params["redirTarget"]) {
            document.form_ajax_redir_2.action = params["redirUrl"];
            document.form_ajax_redir_2.target = params["redirTarget"];
            document.form_ajax_redir_2.nmgp_parms.value = params["redirParams"];
            document.form_ajax_redir_2.script_case_init.value = scMsgDefScInit;
			callbackOk = function() { document.form_ajax_redir_2.submit(); };
		}
		else if ("" != params["redirUrl"] && "" == params["redirTarget"]) {
            document.form_ajax_redir_1.action = params["redirUrl"];
            document.form_ajax_redir_1.nmgp_parms.value = params["redirParams"];
			callbackOk = function() { document.form_ajax_redir_1.submit(); };
		}
		else {
			callbackOk = scForm_cancel;
		}

		var alertParams = {title: params["title"]};
		if (0 < params["width"]) {
			alertParams["width"] = params["width"];
		}
		if (0 < params["timeout"]) {
			alertParams["timer"] = params["timeout"] * 1000;
		}
		if (!params["showButton"]) {
			alertParams["showConfirmButton"] = false;
		}
		if ("" != params["buttonLabel"]) {
			alertParams["confirmButtonText"] = params["buttonLabel"];
		}
		if ("" != params["type"]) {
			alertParams["type"] = params["type"];
		}

		scJs_alert_sweetalert(params["message"], callbackOk, scJs_sweetalert_params(alertParams));
	}
} // _scAjaxShowMessage

<?php
$confirmButtonClass = '';
$cancelButtonClass  = '';
$confirmButtonFA    = '';
$cancelButtonFA     = '';
$confirmButtonFAPos = '';
$cancelButtonFAPos  = '';
if (isset($this->arr_buttons['bsweetalert_ok']) && isset($this->arr_buttons['bsweetalert_ok']['style']) && '' != $this->arr_buttons['bsweetalert_ok']['style']) {
	$confirmButtonClass = 'scButton_' . $this->arr_buttons['bsweetalert_ok']['style'];
}
if (isset($this->arr_buttons['bsweetalert_cancel']) && isset($this->arr_buttons['bsweetalert_cancel']['style']) && '' != $this->arr_buttons['bsweetalert_cancel']['style']) {
	$cancelButtonClass = 'scButton_' . $this->arr_buttons['bsweetalert_cancel']['style'];
}
if (isset($this->arr_buttons['bsweetalert_ok']) && isset($this->arr_buttons['bsweetalert_ok']['fontawesomeicon']) && '' != $this->arr_buttons['bsweetalert_ok']['fontawesomeicon']) {
	$confirmButtonFA = $this->arr_buttons['bsweetalert_ok']['fontawesomeicon'];
}
if (isset($this->arr_buttons['bsweetalert_cancel']) && isset($this->arr_buttons['bsweetalert_cancel']['fontawesomeicon']) && '' != $this->arr_buttons['bsweetalert_cancel']['fontawesomeicon']) {
	$cancelButtonFA = $this->arr_buttons['bsweetalert_cancel']['fontawesomeicon'];
}
if (isset($this->arr_buttons['bsweetalert_ok']) && isset($this->arr_buttons['bsweetalert_ok']['display_position']) && 'img_right' != $this->arr_buttons['bsweetalert_ok']['display_position']) {
	$confirmButtonFAPos = 'text_right';
}
if (isset($this->arr_buttons['bsweetalert_cancel']) && isset($this->arr_buttons['bsweetalert_cancel']['display_position']) && 'img_right' != $this->arr_buttons['bsweetalert_cancel']['display_position']) {
	$cancelButtonFAPos = 'text_right';
}
?>
function scJs_alert(message, callbackOk, params) {
    message = message.replace(/<!--SC_NL-->/gi, "<br />");
	scJs_alert_sweetalert(message, callbackOk, scJs_sweetalert_params(params));
} // scJs_alert

function scJs_confirm(message, callbackOk, callbackCancel) {
	scJs_confirm_sweetalert(message, callbackOk, callbackCancel);
} // scJs_confirm

function scJs_alert_sweetalert(message, callbackOk, params) {
	var sweetAlertConfig;

	if (null == params) {
		params = {};
	}

	params['html'] = message;

	sweetAlertConfig = params;

	Swal.fire(sweetAlertConfig).then(function (result) {
		if (result.value) {
			if (typeof callbackOk == "function") {
				callbackOk();
			}
		}
		else if (result.dismiss == Swal.DismissReason.timer || result.dismiss == Swal.DismissReason.close) {
			Swal.close();
            $(".swal2-container.swal2-shown").remove();
		}
        else {
            console.log(result.dismiss);
        }
	});
} // scJs_alert_sweetalert

function scJs_confirm_sweetalert(message, callbackOk, callbackCancel) {
	var sweetAlertConfig, params = {};

	params['html'] = message;
	params['type'] = 'question';
	params['showCancelButton'] = true;

	sweetAlertConfig = scJs_sweetalert_params(params);

	Swal.fire(sweetAlertConfig).then(function (result) {
		if (result.value) {
			callbackOk();
		}
		else if (result.dismiss === Swal.DismissReason.backdrop || result.dismiss === Swal.DismissReason.cancel || result.dismiss === Swal.DismissReason.esc) {
			callbackCancel();
		}
	});
} // scJs_confirm_sweetalert

function scJs_sweetalert_params(params) {
	var parName, confirmText, confirmFA, confirmPos, cancelText, cancelFA, cancelPos, sweetAlertConfig;

	sweetAlertConfig = {
		customClass: {
			popup: 'scSweetAlertPopup',
			header: 'scSweetAlertHeader',
			content: 'scSweetAlertMessage',
			confirmButton: '<?php echo $confirmButtonClass; ?>',
			cancelButton: '<?php echo $cancelButtonClass; ?>'
		}
	};

	confirmText = '<?php echo isset($this->arr_buttons['bsweetalert_ok']['value']) ? $this->arr_buttons['bsweetalert_ok']['value'] : $this->Ini->Nm_lang['lang_btns_cfrm'] ?>';
	confirmFA = '<?php echo $confirmButtonFA ?>';
	confirmPos = '<?php echo $confirmButtonFAPos ?>';
	cancelText = '<?php echo isset($this->arr_buttons['bsweetalert_cancel']['value']) ? $this->arr_buttons['bsweetalert_cancel']['value'] : $this->Ini->Nm_lang['lang_btns_cncl'] ?>';
	cancelFA = '<?php echo $cancelButtonFA ?>';
	cancelPos = '<?php echo $cancelButtonFAPos ?>';

	for (parName in params) {
		if ('confirmButtonText' == parName) {
			confirmText = params[parName];
		}
		else if ('confirmButtonFA' == parName) {
			confirmFA = params[parName];
		}
		else if ('confirmButtonFAPos' == parName) {
			confirmPos = params[parName];
		}
		else if ('cancelButtonText' == parName) {
			cancelText = params[parName];
		}
		else if ('cancelButtonFA' == parName) {
			cancelFA = params[parName];
		}
		else if ('cancelButtonFAPos' == parName) {
			cancelPos = params[parName];
		}
		else {
			sweetAlertConfig[parName] = params[parName];
		}
	}

	if ('' != confirmFA) {
		if ('text_right' == confirmPos) {
			confirmText = '<i class="fas ' + confirmFA + '"></i> ' + confirmText;
		}
		else {
			confirmText += ' <i class="fas ' + confirmFA + '"></i>';
		}
	}
	if ('' != cancelFA) {
		if ('text_right' == cancelPos) {
			cancelText = '<i class="fas ' + cancelFA + '"></i> ' + cancelText;
		}
		else {
			cancelText += ' <i class="fas ' + cancelFA + '"></i>';
		}
	}

	sweetAlertConfig['confirmButtonText'] = confirmText;
	sweetAlertConfig['cancelButtonText'] = cancelText;

	if (sweetAlertConfig['toast']) {
		sweetAlertConfig['showConfirmButton'] = false;
		sweetAlertConfig['showCancelButton'] = false;
		sweetAlertConfig['customClass']['popup'] = 'scToastPopup';
		sweetAlertConfig['customClass']['header'] = 'scToastHeader';
		sweetAlertConfig['customClass']['content'] = 'scToastMessage';
		if (null == sweetAlertConfig['timer']) {
			sweetAlertConfig['timer'] = 3000;
		}
		if (null == sweetAlertConfig["position"]) {
			sweetAlertConfig["position"] = "top-end";
		}
	}

	return sweetAlertConfig;
} // scJs_sweetalert_params

  // ---------- Form
  function do_ajax_form_maeemp_submit_form()
  {
    if (scEventControl_active("")) {
      setTimeout(function() { do_ajax_form_maeemp_submit_form(); }, 500);
      return;
    }
    scAjaxHideMessage();
    var var_rp01noemp = scAjaxGetFieldText("rp01noemp");
    var var_rp01division = scAjaxGetFieldText("rp01division");
    var var_rp01depto = scAjaxGetFieldText("rp01depto");
    var var_rp01seccion = scAjaxGetFieldText("rp01seccion");
    var var_rp01noemp1 = scAjaxGetFieldText("rp01noemp1");
    var var_rp01nombreemp = scAjaxGetFieldText("rp01nombreemp");
    var var_rp01categoria = scAjaxGetFieldText("rp01categoria");
    var var_rp01turno = scAjaxGetFieldText("rp01turno");
    var var_rp01statusemp = scAjaxGetFieldText("rp01statusemp");
    var var_rp01fechastatus = scAjaxGetFieldText("rp01fechastatus");
    var var_rp01causaretiro = scAjaxGetFieldText("rp01causaretiro");
    var var_rp01direccion = scAjaxGetFieldText("rp01direccion");
    var var_rp01telefono = scAjaxGetFieldText("rp01telefono");
    var var_rp01lugarnacimiento = scAjaxGetFieldText("rp01lugarnacimiento");
    var var_rp01fechanacimiento = scAjaxGetFieldText("rp01fechanacimiento");
    var var_rp01nacionalidad = scAjaxGetFieldText("rp01nacionalidad");
    var var_rp01cedula = scAjaxGetFieldText("rp01cedula");
    var var_rp01noiess = scAjaxGetFieldText("rp01noiess");
    var var_rp01sexo = scAjaxGetFieldText("rp01sexo");
    var var_rp01nolibreta = scAjaxGetFieldText("rp01nolibreta");
    var var_rp01profesion = scAjaxGetFieldText("rp01profesion");
    var var_rp01fechaingreso = scAjaxGetFieldText("rp01fechaingreso");
    var var_rp01fechareingreso = scAjaxGetFieldText("rp01fechareingreso");
    var var_rp01cargo = scAjaxGetFieldText("rp01cargo");
    var var_rp01estadocivil = scAjaxGetFieldText("rp01estadocivil");
    var var_rp01rebajaxcasado = scAjaxGetFieldText("rp01rebajaxcasado");
    var var_rp01nombreconyuge = scAjaxGetFieldText("rp01nombreconyuge");
    var var_rp01nombrepadre = scAjaxGetFieldText("rp01nombrepadre");
    var var_rp01nombremadre = scAjaxGetFieldText("rp01nombremadre");
    var var_rp01nohijos = scAjaxGetFieldText("rp01nohijos");
    var var_rp01fechahijos0 = scAjaxGetFieldText("rp01fechahijos0");
    var var_rp01sexohijos0 = scAjaxGetFieldText("rp01sexohijos0");
    var var_rp01fechahijos1 = scAjaxGetFieldText("rp01fechahijos1");
    var var_rp01sexohijos1 = scAjaxGetFieldText("rp01sexohijos1");
    var var_rp01fechahijos2 = scAjaxGetFieldText("rp01fechahijos2");
    var var_rp01sexohijos2 = scAjaxGetFieldText("rp01sexohijos2");
    var var_rp01fechahijos3 = scAjaxGetFieldText("rp01fechahijos3");
    var var_rp01sexohijos3 = scAjaxGetFieldText("rp01sexohijos3");
    var var_rp01fechahijos4 = scAjaxGetFieldText("rp01fechahijos4");
    var var_rp01sexohijos4 = scAjaxGetFieldText("rp01sexohijos4");
    var var_rp01fechahijos5 = scAjaxGetFieldText("rp01fechahijos5");
    var var_rp01sexohijos5 = scAjaxGetFieldText("rp01sexohijos5");
    var var_rp01fechahijos6 = scAjaxGetFieldText("rp01fechahijos6");
    var var_rp01sexohijos6 = scAjaxGetFieldText("rp01sexohijos6");
    var var_rp01fechahijos7 = scAjaxGetFieldText("rp01fechahijos7");
    var var_rp01sexohijos7 = scAjaxGetFieldText("rp01sexohijos7");
    var var_rp01fechahijos8 = scAjaxGetFieldText("rp01fechahijos8");
    var var_rp01sexohijos8 = scAjaxGetFieldText("rp01sexohijos8");
    var var_rp01fechahijos9 = scAjaxGetFieldText("rp01fechahijos9");
    var var_rp01sexohijos9 = scAjaxGetFieldText("rp01sexohijos9");
    var var_rp01cargaspadres = scAjaxGetFieldText("rp01cargaspadres");
    var var_rp01otrascargas = scAjaxGetFieldText("rp01otrascargas");
    var var_rp01formapago = scAjaxGetFieldText("rp01formapago");
    var var_rp01nobancoemp = scAjaxGetFieldText("rp01nobancoemp");
    var var_rp01ctabancoemp = scAjaxGetFieldText("rp01ctabancoemp");
    var var_rp01tipoctabco = scAjaxGetFieldText("rp01tipoctabco");
    var var_rp01fechaultvacacion = scAjaxGetFieldText("rp01fechaultvacacion");
    var var_rp01aporte = scAjaxGetFieldText("rp01aporte");
    var var_rp01socio = scAjaxGetFieldText("rp01socio");
    var var_rp01transporte = scAjaxGetFieldText("rp01transporte");
    var var_rp01recibeporc = scAjaxGetFieldText("rp01recibeporc");
    var var_rp01sueldoanterior = scAjaxGetFieldText("rp01sueldoanterior");
    var var_rp01sueldosalario = scAjaxGetFieldText("rp01sueldosalario");
    var var_rp01fecmodsdosal = scAjaxGetFieldText("rp01fecmodsdosal");
    var var_rp01fecmodficha = scAjaxGetFieldText("rp01fecmodficha");
    var var_rp01faltasinjust = scAjaxGetFieldText("rp01faltasinjust");
    var var_rp01ingresos1er = scAjaxGetFieldText("rp01ingresos1er");
    var var_rp01basesocialvalor = scAjaxGetFieldText("rp01basesocialvalor");
    var var_rp01basesocialtiempo = scAjaxGetFieldText("rp01basesocialtiempo");
    var var_rp0114vopagoacum = scAjaxGetFieldText("rp0114vopagoacum");
    var var_rp0115vopagoacum = scAjaxGetFieldText("rp0115vopagoacum");
    var var_rp01cverrorliq = scAjaxGetFieldText("rp01cverrorliq");
    var var_rp01porcentliq = scAjaxGetFieldText("rp01porcentliq");
    var var_rp01tiposangre = scAjaxGetFieldText("rp01tiposangre");
    var var_rp01ingresos2do = scAjaxGetFieldText("rp01ingresos2do");
    var var_rp01provdiremp = scAjaxGetFieldText("rp01provdiremp");
    var var_rp01cantondiremp = scAjaxGetFieldText("rp01cantondiremp");
    var var_rp01ciudaddiremp = scAjaxGetFieldText("rp01ciudaddiremp");
    var var_rp01codocupacion = scAjaxGetFieldText("rp01codocupacion");
    var var_uid = scAjaxGetFieldText("uid");
    var var_block = scAjaxGetFieldText("block");
    var var_ultimoacceso = scAjaxGetFieldText("ultimoacceso");
    var var_rp01foto = scAjaxGetFieldText("rp01foto");
    var var_rp01ctacontable = scAjaxGetFieldText("rp01ctacontable");
    var var_rp01email = scAjaxGetFieldText("rp01email");
    var var_rp01passwd = scAjaxGetFieldText("rp01passwd");
    var var_rp01huella = scAjaxGetFieldText("rp01huella");
    var var_rp01recibefr = scAjaxGetFieldText("rp01recibefr");
    var var_rp01recibedt = scAjaxGetFieldText("rp01recibedt");
    var var_rp01recibedc = scAjaxGetFieldText("rp01recibedc");
    var var_rp01uid = scAjaxGetFieldText("rp01uid");
    var var_rp01fechauid = scAjaxGetFieldText("rp01fechauid");
    var var_rp01obs = scAjaxGetFieldText("rp01obs");
    var var_rp01cauliq = scAjaxGetFieldText("rp01cauliq");
    var var_rp01discapacidad = scAjaxGetFieldText("rp01discapacidad");
    var var_rp01conadis = scAjaxGetFieldText("rp01conadis");
    var var_rp01tpdiscapacidad = scAjaxGetFieldText("rp01tpdiscapacidad");
    var var_rp01prdiscapacidad = scAjaxGetFieldText("rp01prdiscapacidad");
    var var_rp01freserva = scAjaxGetFieldText("rp01freserva");
    var var_rp01codsectorial = scAjaxGetFieldText("rp01codsectorial");
    var var_anticipoporvalor = scAjaxGetFieldText("anticipoporvalor");
    var var_tipidret = scAjaxGetFieldText("tipidret");
    var var_residenciatrab = scAjaxGetFieldText("residenciatrab");
    var var_paisresidencia = scAjaxGetFieldText("paisresidencia");
    var var_aplicaconvenio = scAjaxGetFieldText("aplicaconvenio");
    var var_tipotrabajdiscap = scAjaxGetFieldText("tipotrabajdiscap");
    var var_porcentajediscap = scAjaxGetFieldText("porcentajediscap");
    var var_tipiddiscap = scAjaxGetFieldText("tipiddiscap");
    var var_iddiscap = scAjaxGetFieldText("iddiscap");
    var var_rp01varias_secciones = scAjaxGetFieldText("rp01varias_secciones");
    var var_rp01cc = scAjaxGetFieldText("rp01cc");
    var var_rp01observacion = scAjaxGetFieldText("rp01observacion");
    var var_rp01iessconyugue = scAjaxGetFieldText("rp01iessconyugue");
    var var_rp01tiporefrigerio = scAjaxGetFieldText("rp01tiporefrigerio");
    var var_idiomas = scAjaxGetFieldText("idiomas");
    var var_emergencias = scAjaxGetFieldText("emergencias");
    var var_rp01tipojornada = scAjaxGetFieldText("rp01tipojornada");
    var var_rp01numero_horas = scAjaxGetFieldText("rp01numero_horas");
    var var_rp01emailpersonal = scAjaxGetFieldText("rp01emailpersonal");
    var var_rp01supervisadopor = scAjaxGetFieldText("rp01supervisadopor");
    var var_rp01zonaderiesgo = scAjaxGetFieldText("rp01zonaderiesgo");
    var var_rp01refpersnom1 = scAjaxGetFieldText("rp01refpersnom1");
    var var_rp01refpersparen1 = scAjaxGetFieldText("rp01refpersparen1");
    var var_rp01refperstel1 = scAjaxGetFieldText("rp01refperstel1");
    var var_rp01refpersnom2 = scAjaxGetFieldText("rp01refpersnom2");
    var var_rp01refpersparen2 = scAjaxGetFieldText("rp01refpersparen2");
    var var_rp01refperstel2 = scAjaxGetFieldText("rp01refperstel2");
    var var_rp01tipovivienda = scAjaxGetFieldText("rp01tipovivienda");
    var var_rp01serviciosbasicos = scAjaxGetFieldText("rp01serviciosbasicos");
    var var_rp01viviendadetalle = scAjaxGetFieldText("rp01viviendadetalle");
    var var_rp01dormitorios = scAjaxGetFieldText("rp01dormitorios");
    var var_rp01sala = scAjaxGetFieldText("rp01sala");
    var var_rp01comedor = scAjaxGetFieldText("rp01comedor");
    var var_rp01banos = scAjaxGetFieldText("rp01banos");
    var var_rp01estudiosrealizados = scAjaxGetFieldText("rp01estudiosrealizados");
    var var_rp01ruta1 = scAjaxGetFieldText("rp01ruta1");
    var var_rp01ruta2 = scAjaxGetFieldText("rp01ruta2");
    var var_rp01ruta3 = scAjaxGetFieldText("rp01ruta3");
    var var_rp01actividadesextras = scAjaxGetFieldText("rp01actividadesextras");
    var var_nm_form_submit = document.F1.nm_form_submit.value;
    var var_nmgp_url_saida = document.F1.nmgp_url_saida.value;
    var var_nmgp_opcao = document.F1.nmgp_opcao.value;
    var var_nmgp_ancora = document.F1.nmgp_ancora.value;
    var var_nmgp_num_form = document.F1.nmgp_num_form.value;
    var var_nmgp_parms = document.F1.nmgp_parms.value;
    var var_script_case_init = document.F1.script_case_init.value;
    var var_csrf_token = scAjaxGetFieldText("csrf_token");
    scAjaxProcOn();
    x_ajax_form_maeemp_submit_form(var_rp01noemp, var_rp01division, var_rp01depto, var_rp01seccion, var_rp01noemp1, var_rp01nombreemp, var_rp01categoria, var_rp01turno, var_rp01statusemp, var_rp01fechastatus, var_rp01causaretiro, var_rp01direccion, var_rp01telefono, var_rp01lugarnacimiento, var_rp01fechanacimiento, var_rp01nacionalidad, var_rp01cedula, var_rp01noiess, var_rp01sexo, var_rp01nolibreta, var_rp01profesion, var_rp01fechaingreso, var_rp01fechareingreso, var_rp01cargo, var_rp01estadocivil, var_rp01rebajaxcasado, var_rp01nombreconyuge, var_rp01nombrepadre, var_rp01nombremadre, var_rp01nohijos, var_rp01fechahijos0, var_rp01sexohijos0, var_rp01fechahijos1, var_rp01sexohijos1, var_rp01fechahijos2, var_rp01sexohijos2, var_rp01fechahijos3, var_rp01sexohijos3, var_rp01fechahijos4, var_rp01sexohijos4, var_rp01fechahijos5, var_rp01sexohijos5, var_rp01fechahijos6, var_rp01sexohijos6, var_rp01fechahijos7, var_rp01sexohijos7, var_rp01fechahijos8, var_rp01sexohijos8, var_rp01fechahijos9, var_rp01sexohijos9, var_rp01cargaspadres, var_rp01otrascargas, var_rp01formapago, var_rp01nobancoemp, var_rp01ctabancoemp, var_rp01tipoctabco, var_rp01fechaultvacacion, var_rp01aporte, var_rp01socio, var_rp01transporte, var_rp01recibeporc, var_rp01sueldoanterior, var_rp01sueldosalario, var_rp01fecmodsdosal, var_rp01fecmodficha, var_rp01faltasinjust, var_rp01ingresos1er, var_rp01basesocialvalor, var_rp01basesocialtiempo, var_rp0114vopagoacum, var_rp0115vopagoacum, var_rp01cverrorliq, var_rp01porcentliq, var_rp01tiposangre, var_rp01ingresos2do, var_rp01provdiremp, var_rp01cantondiremp, var_rp01ciudaddiremp, var_rp01codocupacion, var_uid, var_block, var_ultimoacceso, var_rp01foto, var_rp01ctacontable, var_rp01email, var_rp01passwd, var_rp01huella, var_rp01recibefr, var_rp01recibedt, var_rp01recibedc, var_rp01uid, var_rp01fechauid, var_rp01obs, var_rp01cauliq, var_rp01discapacidad, var_rp01conadis, var_rp01tpdiscapacidad, var_rp01prdiscapacidad, var_rp01freserva, var_rp01codsectorial, var_anticipoporvalor, var_tipidret, var_residenciatrab, var_paisresidencia, var_aplicaconvenio, var_tipotrabajdiscap, var_porcentajediscap, var_tipiddiscap, var_iddiscap, var_rp01varias_secciones, var_rp01cc, var_rp01observacion, var_rp01iessconyugue, var_rp01tiporefrigerio, var_idiomas, var_emergencias, var_rp01tipojornada, var_rp01numero_horas, var_rp01emailpersonal, var_rp01supervisadopor, var_rp01zonaderiesgo, var_rp01refpersnom1, var_rp01refpersparen1, var_rp01refperstel1, var_rp01refpersnom2, var_rp01refpersparen2, var_rp01refperstel2, var_rp01tipovivienda, var_rp01serviciosbasicos, var_rp01viviendadetalle, var_rp01dormitorios, var_rp01sala, var_rp01comedor, var_rp01banos, var_rp01estudiosrealizados, var_rp01ruta1, var_rp01ruta2, var_rp01ruta3, var_rp01actividadesextras, var_nm_form_submit, var_nmgp_url_saida, var_nmgp_opcao, var_nmgp_ancora, var_nmgp_num_form, var_nmgp_parms, var_script_case_init, var_csrf_token, do_ajax_form_maeemp_submit_form_cb);
  } // do_ajax_form_maeemp_submit_form

  function do_ajax_form_maeemp_submit_form_cb(sResp)
  {
    scAjaxProcOff();
    oResp = scAjaxResponse(sResp);
    scAjaxUpdateErrors("valid");
    sAppErrors = scAjaxListErrors(true);
    if ("" == sAppErrors || "menu_link" == document.F1.nmgp_opcao.value)
    {
      $('.sc-js-ui-statusimg').css('display', 'none');
      scAjaxHideErrorDisplay("table");
    }
    else
    {
      scAjaxError_markList();
      scAjaxShowErrorDisplay("table", sAppErrors);
    }
    if (scAjaxIsOk())
    {
      scResetFormChanges();
      scAjaxShowMessage("success");
      scAjaxHideErrorDisplay("table");
      scAjaxHideErrorDisplay("rp01noemp");
      scAjaxHideErrorDisplay("rp01division");
      scAjaxHideErrorDisplay("rp01depto");
      scAjaxHideErrorDisplay("rp01seccion");
      scAjaxHideErrorDisplay("rp01noemp1");
      scAjaxHideErrorDisplay("rp01nombreemp");
      scAjaxHideErrorDisplay("rp01categoria");
      scAjaxHideErrorDisplay("rp01turno");
      scAjaxHideErrorDisplay("rp01statusemp");
      scAjaxHideErrorDisplay("rp01fechastatus");
      scAjaxHideErrorDisplay("rp01causaretiro");
      scAjaxHideErrorDisplay("rp01direccion");
      scAjaxHideErrorDisplay("rp01telefono");
      scAjaxHideErrorDisplay("rp01lugarnacimiento");
      scAjaxHideErrorDisplay("rp01fechanacimiento");
      scAjaxHideErrorDisplay("rp01nacionalidad");
      scAjaxHideErrorDisplay("rp01cedula");
      scAjaxHideErrorDisplay("rp01noiess");
      scAjaxHideErrorDisplay("rp01sexo");
      scAjaxHideErrorDisplay("rp01nolibreta");
      scAjaxHideErrorDisplay("rp01profesion");
      scAjaxHideErrorDisplay("rp01fechaingreso");
      scAjaxHideErrorDisplay("rp01fechareingreso");
      scAjaxHideErrorDisplay("rp01cargo");
      scAjaxHideErrorDisplay("rp01estadocivil");
      scAjaxHideErrorDisplay("rp01rebajaxcasado");
      scAjaxHideErrorDisplay("rp01nombreconyuge");
      scAjaxHideErrorDisplay("rp01nombrepadre");
      scAjaxHideErrorDisplay("rp01nombremadre");
      scAjaxHideErrorDisplay("rp01nohijos");
      scAjaxHideErrorDisplay("rp01fechahijos0");
      scAjaxHideErrorDisplay("rp01sexohijos0");
      scAjaxHideErrorDisplay("rp01fechahijos1");
      scAjaxHideErrorDisplay("rp01sexohijos1");
      scAjaxHideErrorDisplay("rp01fechahijos2");
      scAjaxHideErrorDisplay("rp01sexohijos2");
      scAjaxHideErrorDisplay("rp01fechahijos3");
      scAjaxHideErrorDisplay("rp01sexohijos3");
      scAjaxHideErrorDisplay("rp01fechahijos4");
      scAjaxHideErrorDisplay("rp01sexohijos4");
      scAjaxHideErrorDisplay("rp01fechahijos5");
      scAjaxHideErrorDisplay("rp01sexohijos5");
      scAjaxHideErrorDisplay("rp01fechahijos6");
      scAjaxHideErrorDisplay("rp01sexohijos6");
      scAjaxHideErrorDisplay("rp01fechahijos7");
      scAjaxHideErrorDisplay("rp01sexohijos7");
      scAjaxHideErrorDisplay("rp01fechahijos8");
      scAjaxHideErrorDisplay("rp01sexohijos8");
      scAjaxHideErrorDisplay("rp01fechahijos9");
      scAjaxHideErrorDisplay("rp01sexohijos9");
      scAjaxHideErrorDisplay("rp01cargaspadres");
      scAjaxHideErrorDisplay("rp01otrascargas");
      scAjaxHideErrorDisplay("rp01formapago");
      scAjaxHideErrorDisplay("rp01nobancoemp");
      scAjaxHideErrorDisplay("rp01ctabancoemp");
      scAjaxHideErrorDisplay("rp01tipoctabco");
      scAjaxHideErrorDisplay("rp01fechaultvacacion");
      scAjaxHideErrorDisplay("rp01aporte");
      scAjaxHideErrorDisplay("rp01socio");
      scAjaxHideErrorDisplay("rp01transporte");
      scAjaxHideErrorDisplay("rp01recibeporc");
      scAjaxHideErrorDisplay("rp01sueldoanterior");
      scAjaxHideErrorDisplay("rp01sueldosalario");
      scAjaxHideErrorDisplay("rp01fecmodsdosal");
      scAjaxHideErrorDisplay("rp01fecmodficha");
      scAjaxHideErrorDisplay("rp01faltasinjust");
      scAjaxHideErrorDisplay("rp01ingresos1er");
      scAjaxHideErrorDisplay("rp01basesocialvalor");
      scAjaxHideErrorDisplay("rp01basesocialtiempo");
      scAjaxHideErrorDisplay("rp0114vopagoacum");
      scAjaxHideErrorDisplay("rp0115vopagoacum");
      scAjaxHideErrorDisplay("rp01cverrorliq");
      scAjaxHideErrorDisplay("rp01porcentliq");
      scAjaxHideErrorDisplay("rp01tiposangre");
      scAjaxHideErrorDisplay("rp01ingresos2do");
      scAjaxHideErrorDisplay("rp01provdiremp");
      scAjaxHideErrorDisplay("rp01cantondiremp");
      scAjaxHideErrorDisplay("rp01ciudaddiremp");
      scAjaxHideErrorDisplay("rp01codocupacion");
      scAjaxHideErrorDisplay("uid");
      scAjaxHideErrorDisplay("block");
      scAjaxHideErrorDisplay("ultimoacceso");
      scAjaxHideErrorDisplay("rp01foto");
      scAjaxHideErrorDisplay("rp01ctacontable");
      scAjaxHideErrorDisplay("rp01email");
      scAjaxHideErrorDisplay("rp01passwd");
      scAjaxHideErrorDisplay("rp01huella");
      scAjaxHideErrorDisplay("rp01recibefr");
      scAjaxHideErrorDisplay("rp01recibedt");
      scAjaxHideErrorDisplay("rp01recibedc");
      scAjaxHideErrorDisplay("rp01uid");
      scAjaxHideErrorDisplay("rp01fechauid");
      scAjaxHideErrorDisplay("rp01obs");
      scAjaxHideErrorDisplay("rp01cauliq");
      scAjaxHideErrorDisplay("rp01discapacidad");
      scAjaxHideErrorDisplay("rp01conadis");
      scAjaxHideErrorDisplay("rp01tpdiscapacidad");
      scAjaxHideErrorDisplay("rp01prdiscapacidad");
      scAjaxHideErrorDisplay("rp01freserva");
      scAjaxHideErrorDisplay("rp01codsectorial");
      scAjaxHideErrorDisplay("anticipoporvalor");
      scAjaxHideErrorDisplay("tipidret");
      scAjaxHideErrorDisplay("residenciatrab");
      scAjaxHideErrorDisplay("paisresidencia");
      scAjaxHideErrorDisplay("aplicaconvenio");
      scAjaxHideErrorDisplay("tipotrabajdiscap");
      scAjaxHideErrorDisplay("porcentajediscap");
      scAjaxHideErrorDisplay("tipiddiscap");
      scAjaxHideErrorDisplay("iddiscap");
      scAjaxHideErrorDisplay("rp01varias_secciones");
      scAjaxHideErrorDisplay("rp01cc");
      scAjaxHideErrorDisplay("rp01observacion");
      scAjaxHideErrorDisplay("rp01iessconyugue");
      scAjaxHideErrorDisplay("rp01tiporefrigerio");
      scAjaxHideErrorDisplay("idiomas");
      scAjaxHideErrorDisplay("emergencias");
      scAjaxHideErrorDisplay("rp01tipojornada");
      scAjaxHideErrorDisplay("rp01numero_horas");
      scAjaxHideErrorDisplay("rp01emailpersonal");
      scAjaxHideErrorDisplay("rp01supervisadopor");
      scAjaxHideErrorDisplay("rp01zonaderiesgo");
      scAjaxHideErrorDisplay("rp01refpersnom1");
      scAjaxHideErrorDisplay("rp01refpersparen1");
      scAjaxHideErrorDisplay("rp01refperstel1");
      scAjaxHideErrorDisplay("rp01refpersnom2");
      scAjaxHideErrorDisplay("rp01refpersparen2");
      scAjaxHideErrorDisplay("rp01refperstel2");
      scAjaxHideErrorDisplay("rp01tipovivienda");
      scAjaxHideErrorDisplay("rp01serviciosbasicos");
      scAjaxHideErrorDisplay("rp01viviendadetalle");
      scAjaxHideErrorDisplay("rp01dormitorios");
      scAjaxHideErrorDisplay("rp01sala");
      scAjaxHideErrorDisplay("rp01comedor");
      scAjaxHideErrorDisplay("rp01banos");
      scAjaxHideErrorDisplay("rp01estudiosrealizados");
      scAjaxHideErrorDisplay("rp01ruta1");
      scAjaxHideErrorDisplay("rp01ruta2");
      scAjaxHideErrorDisplay("rp01ruta3");
      scAjaxHideErrorDisplay("rp01actividadesextras");
      scLigEditLookupCall();
<?php
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maeemp']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_maeemp']['dashboard_info']['under_dashboard']) {
?>
      var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_maeemp']['dashboard_info']['parent_widget']; ?>']");
      if (dbParentFrame && dbParentFrame[0] && dbParentFrame[0].contentWindow.nm_gp_move) {
        dbParentFrame[0].contentWindow.nm_gp_move("igual");
      }
<?php
}
?>
    }
    Nm_Proc_Atualiz = false;
    if (!scAjaxHasError())
    {
      scAjaxSetFields(false);
      scAjaxSetVariables();
      scAjaxSetMaster();
      if (scInlineFormSend())
      {
        self.parent.tb_remove();
        return;
      }
    }
    scAjaxShowDebug();
    scAjaxSetDisplay();
    scBtnDisabled();
    scBtnLabel();
    scAjaxSetLabel();
    scAjaxSetReadonly();
    scAjaxAlert(do_ajax_form_maeemp_submit_form_cb_after_alert);
  } // do_ajax_form_maeemp_submit_form_cb
  function do_ajax_form_maeemp_submit_form_cb_after_alert() {
    scAjaxMessage();
    scAjaxJavascript();
    scAjaxSetFocus();
    scAjaxRedir();
    if (hasJsFormOnload)
    {
      sc_form_onload();
    }
  } // do_ajax_form_maeemp_submit_form_cb_after_alert

  var scStatusDetail = {};

  function do_ajax_form_maeemp_navigate_form()
  {
    if (scFormHasChanged) {
      scJs_confirm('<?php echo html_entity_decode($this->Ini->Nm_lang['lang_reload_confirm']) ?>', perform_ajax_form_maeemp_navigate_form, function() {});
    } else {
      perform_ajax_form_maeemp_navigate_form();
    }
  }

  function perform_ajax_form_maeemp_navigate_form()
  {
    if (scRefreshTable())
    {
      return;
    }
    scAjaxHideMessage();
    scAjaxHideErrorDisplay("table");
    scAjaxHideErrorDisplay("rp01noemp");
    scAjaxHideErrorDisplay("rp01division");
    scAjaxHideErrorDisplay("rp01depto");
    scAjaxHideErrorDisplay("rp01seccion");
    scAjaxHideErrorDisplay("rp01noemp1");
    scAjaxHideErrorDisplay("rp01nombreemp");
    scAjaxHideErrorDisplay("rp01categoria");
    scAjaxHideErrorDisplay("rp01turno");
    scAjaxHideErrorDisplay("rp01statusemp");
    scAjaxHideErrorDisplay("rp01fechastatus");
    scAjaxHideErrorDisplay("rp01causaretiro");
    scAjaxHideErrorDisplay("rp01direccion");
    scAjaxHideErrorDisplay("rp01telefono");
    scAjaxHideErrorDisplay("rp01lugarnacimiento");
    scAjaxHideErrorDisplay("rp01fechanacimiento");
    scAjaxHideErrorDisplay("rp01nacionalidad");
    scAjaxHideErrorDisplay("rp01cedula");
    scAjaxHideErrorDisplay("rp01noiess");
    scAjaxHideErrorDisplay("rp01sexo");
    scAjaxHideErrorDisplay("rp01nolibreta");
    scAjaxHideErrorDisplay("rp01profesion");
    scAjaxHideErrorDisplay("rp01fechaingreso");
    scAjaxHideErrorDisplay("rp01fechareingreso");
    scAjaxHideErrorDisplay("rp01cargo");
    scAjaxHideErrorDisplay("rp01estadocivil");
    scAjaxHideErrorDisplay("rp01rebajaxcasado");
    scAjaxHideErrorDisplay("rp01nombreconyuge");
    scAjaxHideErrorDisplay("rp01nombrepadre");
    scAjaxHideErrorDisplay("rp01nombremadre");
    scAjaxHideErrorDisplay("rp01nohijos");
    scAjaxHideErrorDisplay("rp01fechahijos0");
    scAjaxHideErrorDisplay("rp01sexohijos0");
    scAjaxHideErrorDisplay("rp01fechahijos1");
    scAjaxHideErrorDisplay("rp01sexohijos1");
    scAjaxHideErrorDisplay("rp01fechahijos2");
    scAjaxHideErrorDisplay("rp01sexohijos2");
    scAjaxHideErrorDisplay("rp01fechahijos3");
    scAjaxHideErrorDisplay("rp01sexohijos3");
    scAjaxHideErrorDisplay("rp01fechahijos4");
    scAjaxHideErrorDisplay("rp01sexohijos4");
    scAjaxHideErrorDisplay("rp01fechahijos5");
    scAjaxHideErrorDisplay("rp01sexohijos5");
    scAjaxHideErrorDisplay("rp01fechahijos6");
    scAjaxHideErrorDisplay("rp01sexohijos6");
    scAjaxHideErrorDisplay("rp01fechahijos7");
    scAjaxHideErrorDisplay("rp01sexohijos7");
    scAjaxHideErrorDisplay("rp01fechahijos8");
    scAjaxHideErrorDisplay("rp01sexohijos8");
    scAjaxHideErrorDisplay("rp01fechahijos9");
    scAjaxHideErrorDisplay("rp01sexohijos9");
    scAjaxHideErrorDisplay("rp01cargaspadres");
    scAjaxHideErrorDisplay("rp01otrascargas");
    scAjaxHideErrorDisplay("rp01formapago");
    scAjaxHideErrorDisplay("rp01nobancoemp");
    scAjaxHideErrorDisplay("rp01ctabancoemp");
    scAjaxHideErrorDisplay("rp01tipoctabco");
    scAjaxHideErrorDisplay("rp01fechaultvacacion");
    scAjaxHideErrorDisplay("rp01aporte");
    scAjaxHideErrorDisplay("rp01socio");
    scAjaxHideErrorDisplay("rp01transporte");
    scAjaxHideErrorDisplay("rp01recibeporc");
    scAjaxHideErrorDisplay("rp01sueldoanterior");
    scAjaxHideErrorDisplay("rp01sueldosalario");
    scAjaxHideErrorDisplay("rp01fecmodsdosal");
    scAjaxHideErrorDisplay("rp01fecmodficha");
    scAjaxHideErrorDisplay("rp01faltasinjust");
    scAjaxHideErrorDisplay("rp01ingresos1er");
    scAjaxHideErrorDisplay("rp01basesocialvalor");
    scAjaxHideErrorDisplay("rp01basesocialtiempo");
    scAjaxHideErrorDisplay("rp0114vopagoacum");
    scAjaxHideErrorDisplay("rp0115vopagoacum");
    scAjaxHideErrorDisplay("rp01cverrorliq");
    scAjaxHideErrorDisplay("rp01porcentliq");
    scAjaxHideErrorDisplay("rp01tiposangre");
    scAjaxHideErrorDisplay("rp01ingresos2do");
    scAjaxHideErrorDisplay("rp01provdiremp");
    scAjaxHideErrorDisplay("rp01cantondiremp");
    scAjaxHideErrorDisplay("rp01ciudaddiremp");
    scAjaxHideErrorDisplay("rp01codocupacion");
    scAjaxHideErrorDisplay("uid");
    scAjaxHideErrorDisplay("block");
    scAjaxHideErrorDisplay("ultimoacceso");
    scAjaxHideErrorDisplay("rp01foto");
    scAjaxHideErrorDisplay("rp01ctacontable");
    scAjaxHideErrorDisplay("rp01email");
    scAjaxHideErrorDisplay("rp01passwd");
    scAjaxHideErrorDisplay("rp01huella");
    scAjaxHideErrorDisplay("rp01recibefr");
    scAjaxHideErrorDisplay("rp01recibedt");
    scAjaxHideErrorDisplay("rp01recibedc");
    scAjaxHideErrorDisplay("rp01uid");
    scAjaxHideErrorDisplay("rp01fechauid");
    scAjaxHideErrorDisplay("rp01obs");
    scAjaxHideErrorDisplay("rp01cauliq");
    scAjaxHideErrorDisplay("rp01discapacidad");
    scAjaxHideErrorDisplay("rp01conadis");
    scAjaxHideErrorDisplay("rp01tpdiscapacidad");
    scAjaxHideErrorDisplay("rp01prdiscapacidad");
    scAjaxHideErrorDisplay("rp01freserva");
    scAjaxHideErrorDisplay("rp01codsectorial");
    scAjaxHideErrorDisplay("anticipoporvalor");
    scAjaxHideErrorDisplay("tipidret");
    scAjaxHideErrorDisplay("residenciatrab");
    scAjaxHideErrorDisplay("paisresidencia");
    scAjaxHideErrorDisplay("aplicaconvenio");
    scAjaxHideErrorDisplay("tipotrabajdiscap");
    scAjaxHideErrorDisplay("porcentajediscap");
    scAjaxHideErrorDisplay("tipiddiscap");
    scAjaxHideErrorDisplay("iddiscap");
    scAjaxHideErrorDisplay("rp01varias_secciones");
    scAjaxHideErrorDisplay("rp01cc");
    scAjaxHideErrorDisplay("rp01observacion");
    scAjaxHideErrorDisplay("rp01iessconyugue");
    scAjaxHideErrorDisplay("rp01tiporefrigerio");
    scAjaxHideErrorDisplay("idiomas");
    scAjaxHideErrorDisplay("emergencias");
    scAjaxHideErrorDisplay("rp01tipojornada");
    scAjaxHideErrorDisplay("rp01numero_horas");
    scAjaxHideErrorDisplay("rp01emailpersonal");
    scAjaxHideErrorDisplay("rp01supervisadopor");
    scAjaxHideErrorDisplay("rp01zonaderiesgo");
    scAjaxHideErrorDisplay("rp01refpersnom1");
    scAjaxHideErrorDisplay("rp01refpersparen1");
    scAjaxHideErrorDisplay("rp01refperstel1");
    scAjaxHideErrorDisplay("rp01refpersnom2");
    scAjaxHideErrorDisplay("rp01refpersparen2");
    scAjaxHideErrorDisplay("rp01refperstel2");
    scAjaxHideErrorDisplay("rp01tipovivienda");
    scAjaxHideErrorDisplay("rp01serviciosbasicos");
    scAjaxHideErrorDisplay("rp01viviendadetalle");
    scAjaxHideErrorDisplay("rp01dormitorios");
    scAjaxHideErrorDisplay("rp01sala");
    scAjaxHideErrorDisplay("rp01comedor");
    scAjaxHideErrorDisplay("rp01banos");
    scAjaxHideErrorDisplay("rp01estudiosrealizados");
    scAjaxHideErrorDisplay("rp01ruta1");
    scAjaxHideErrorDisplay("rp01ruta2");
    scAjaxHideErrorDisplay("rp01ruta3");
    scAjaxHideErrorDisplay("rp01actividadesextras");
    var var_rp01noemp = document.F2.rp01noemp.value;
    var var_nm_form_submit = document.F2.nm_form_submit.value;
    var var_nmgp_opcao = document.F2.nmgp_opcao.value;
    var var_nmgp_ordem = document.F2.nmgp_ordem.value;
    var var_nmgp_fast_search = document.F2.nmgp_fast_search.value;
    var var_nmgp_cond_fast_search = document.F2.nmgp_cond_fast_search.value;
    var var_nmgp_arg_fast_search = document.F2.nmgp_arg_fast_search.value;
    var var_nmgp_arg_dyn_search = document.F2.nmgp_arg_dyn_search.value;
    var var_script_case_init = document.F2.script_case_init.value;
    scAjaxProcOn();
    x_ajax_form_maeemp_navigate_form(var_rp01noemp, var_nm_form_submit, var_nmgp_opcao, var_nmgp_ordem, var_nmgp_fast_search,  var_nmgp_cond_fast_search,  var_nmgp_arg_fast_search, var_nmgp_arg_dyn_search, var_script_case_init, do_ajax_form_maeemp_navigate_form_cb);
  } // do_ajax_form_maeemp_navigate_form

  var scMasterDetailParentIframe = "<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_maeemp']['dashboard_info']['parent_widget'] ?>";
  var scMasterDetailIframe = {};
<?php
foreach ($this->Ini->sc_lig_iframe as $tmp_i => $tmp_v)
{
?>
  scMasterDetailIframe["<?php echo $tmp_i; ?>"] = "<?php echo $tmp_v; ?>";
<?php
}
?>
  function do_ajax_form_maeemp_navigate_form_cb(sResp)
  {
    scAjaxProcOff();
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    if (oResp['empty_filter'] && oResp['empty_filter'] == "ok")
    {
        document.F5.nmgp_opcao.value = "inicio";
        document.F5.nmgp_parms.value = "";
        document.F5.submit();
    }
    if ("ERROR" == oResp.result)
    {
        scAjaxShowErrorDisplay("table", oResp.errList[0].msgText);
        scAjaxProcOff();
        return;
    }
    else if (oResp["navSummary"].reg_tot == 0)
    {
       scAjax_displayEmptyForm();
    }
    scAjaxClearErrors()
    scResetFormChanges()
    sc_mupload_ok = true;
    scAjaxSetFields(false);
    scAjaxSetVariables();
    document.F2.rp01noemp.value = scAjaxGetKeyValue("rp01noemp");
    scAjaxSetSummary();
    scAjaxSetNavpage();
    scAjaxShowDebug();
    scAjaxSetLabel(true);
    scAjaxSetReadonly(true);
    scAjaxSetMaster();
    scAjaxSetNavStatus("t");
    scAjaxSetNavStatus("b");
    scAjaxSetDisplay(true);
    scAjaxSetBtnVars();
    $('.sc-js-ui-statusimg').css('display', 'none');
    scAjaxAlert(do_ajax_form_maeemp_navigate_form_cb_after_alert);
  } // do_ajax_form_maeemp_navigate_form_cb
  function do_ajax_form_maeemp_navigate_form_cb_after_alert() {
    scAjaxMessage();
    scAjaxJavascript();
    scQuickSearchKeyUp('t', null);
    $('#SC_fast_search_t').blur();
    scAjaxSetFocus();
<?php
if ($this->Embutida_form)
{
?>
    do_ajax_form_maeemp_restore_buttons();
<?php
}
?>
    if (hasJsFormOnload)
    {
      sc_form_onload();
    }
  } // do_ajax_form_maeemp_navigate_form_cb_after_alert

  function sc_hide_form_maeemp_form()
  {
    for (var block_id in ajax_block_id) {
      $("#div_" + ajax_block_id[block_id]).hide();
    }
  } // sc_hide_form_maeemp_form


  function scAjaxDetailProc()
  {
    return true;
  } // scAjaxDetailProc


  var ajax_error_geral = "";

  var ajax_error_type = new Array("valid", "onblur", "onchange", "onclick", "onfocus");

  var ajax_field_list = new Array();
  var ajax_field_Dt_Hr = new Array();
  ajax_field_list[0] = "rp01noemp";
  ajax_field_list[1] = "rp01division";
  ajax_field_list[2] = "rp01depto";
  ajax_field_list[3] = "rp01seccion";
  ajax_field_list[4] = "rp01noemp1";
  ajax_field_list[5] = "rp01nombreemp";
  ajax_field_list[6] = "rp01categoria";
  ajax_field_list[7] = "rp01turno";
  ajax_field_list[8] = "rp01statusemp";
  ajax_field_list[9] = "rp01fechastatus";
  ajax_field_list[10] = "rp01causaretiro";
  ajax_field_list[11] = "rp01direccion";
  ajax_field_list[12] = "rp01telefono";
  ajax_field_list[13] = "rp01lugarnacimiento";
  ajax_field_list[14] = "rp01fechanacimiento";
  ajax_field_list[15] = "rp01nacionalidad";
  ajax_field_list[16] = "rp01cedula";
  ajax_field_list[17] = "rp01noiess";
  ajax_field_list[18] = "rp01sexo";
  ajax_field_list[19] = "rp01nolibreta";
  ajax_field_list[20] = "rp01profesion";
  ajax_field_list[21] = "rp01fechaingreso";
  ajax_field_list[22] = "rp01fechareingreso";
  ajax_field_list[23] = "rp01cargo";
  ajax_field_list[24] = "rp01estadocivil";
  ajax_field_list[25] = "rp01rebajaxcasado";
  ajax_field_list[26] = "rp01nombreconyuge";
  ajax_field_list[27] = "rp01nombrepadre";
  ajax_field_list[28] = "rp01nombremadre";
  ajax_field_list[29] = "rp01nohijos";
  ajax_field_list[30] = "rp01fechahijos0";
  ajax_field_list[31] = "rp01sexohijos0";
  ajax_field_list[32] = "rp01fechahijos1";
  ajax_field_list[33] = "rp01sexohijos1";
  ajax_field_list[34] = "rp01fechahijos2";
  ajax_field_list[35] = "rp01sexohijos2";
  ajax_field_list[36] = "rp01fechahijos3";
  ajax_field_list[37] = "rp01sexohijos3";
  ajax_field_list[38] = "rp01fechahijos4";
  ajax_field_list[39] = "rp01sexohijos4";
  ajax_field_list[40] = "rp01fechahijos5";
  ajax_field_list[41] = "rp01sexohijos5";
  ajax_field_list[42] = "rp01fechahijos6";
  ajax_field_list[43] = "rp01sexohijos6";
  ajax_field_list[44] = "rp01fechahijos7";
  ajax_field_list[45] = "rp01sexohijos7";
  ajax_field_list[46] = "rp01fechahijos8";
  ajax_field_list[47] = "rp01sexohijos8";
  ajax_field_list[48] = "rp01fechahijos9";
  ajax_field_list[49] = "rp01sexohijos9";
  ajax_field_list[50] = "rp01cargaspadres";
  ajax_field_list[51] = "rp01otrascargas";
  ajax_field_list[52] = "rp01formapago";
  ajax_field_list[53] = "rp01nobancoemp";
  ajax_field_list[54] = "rp01ctabancoemp";
  ajax_field_list[55] = "rp01tipoctabco";
  ajax_field_list[56] = "rp01fechaultvacacion";
  ajax_field_list[57] = "rp01aporte";
  ajax_field_list[58] = "rp01socio";
  ajax_field_list[59] = "rp01transporte";
  ajax_field_list[60] = "rp01recibeporc";
  ajax_field_list[61] = "rp01sueldoanterior";
  ajax_field_list[62] = "rp01sueldosalario";
  ajax_field_list[63] = "rp01fecmodsdosal";
  ajax_field_list[64] = "rp01fecmodficha";
  ajax_field_list[65] = "rp01faltasinjust";
  ajax_field_list[66] = "rp01ingresos1er";
  ajax_field_list[67] = "rp01basesocialvalor";
  ajax_field_list[68] = "rp01basesocialtiempo";
  ajax_field_list[69] = "rp0114vopagoacum";
  ajax_field_list[70] = "rp0115vopagoacum";
  ajax_field_list[71] = "rp01cverrorliq";
  ajax_field_list[72] = "rp01porcentliq";
  ajax_field_list[73] = "rp01tiposangre";
  ajax_field_list[74] = "rp01ingresos2do";
  ajax_field_list[75] = "rp01provdiremp";
  ajax_field_list[76] = "rp01cantondiremp";
  ajax_field_list[77] = "rp01ciudaddiremp";
  ajax_field_list[78] = "rp01codocupacion";
  ajax_field_list[79] = "uid";
  ajax_field_list[80] = "block";
  ajax_field_list[81] = "ultimoacceso";
  ajax_field_list[82] = "rp01foto";
  ajax_field_list[83] = "rp01ctacontable";
  ajax_field_list[84] = "rp01email";
  ajax_field_list[85] = "rp01passwd";
  ajax_field_list[86] = "rp01huella";
  ajax_field_list[87] = "rp01recibefr";
  ajax_field_list[88] = "rp01recibedt";
  ajax_field_list[89] = "rp01recibedc";
  ajax_field_list[90] = "rp01uid";
  ajax_field_list[91] = "rp01fechauid";
  ajax_field_list[92] = "rp01obs";
  ajax_field_list[93] = "rp01cauliq";
  ajax_field_list[94] = "rp01discapacidad";
  ajax_field_list[95] = "rp01conadis";
  ajax_field_list[96] = "rp01tpdiscapacidad";
  ajax_field_list[97] = "rp01prdiscapacidad";
  ajax_field_list[98] = "rp01freserva";
  ajax_field_list[99] = "rp01codsectorial";
  ajax_field_list[100] = "anticipoporvalor";
  ajax_field_list[101] = "tipidret";
  ajax_field_list[102] = "residenciatrab";
  ajax_field_list[103] = "paisresidencia";
  ajax_field_list[104] = "aplicaconvenio";
  ajax_field_list[105] = "tipotrabajdiscap";
  ajax_field_list[106] = "porcentajediscap";
  ajax_field_list[107] = "tipiddiscap";
  ajax_field_list[108] = "iddiscap";
  ajax_field_list[109] = "rp01varias_secciones";
  ajax_field_list[110] = "rp01cc";
  ajax_field_list[111] = "rp01observacion";
  ajax_field_list[112] = "rp01iessconyugue";
  ajax_field_list[113] = "rp01tiporefrigerio";
  ajax_field_list[114] = "idiomas";
  ajax_field_list[115] = "emergencias";
  ajax_field_list[116] = "rp01tipojornada";
  ajax_field_list[117] = "rp01numero_horas";
  ajax_field_list[118] = "rp01emailpersonal";
  ajax_field_list[119] = "rp01supervisadopor";
  ajax_field_list[120] = "rp01zonaderiesgo";
  ajax_field_list[121] = "rp01refpersnom1";
  ajax_field_list[122] = "rp01refpersparen1";
  ajax_field_list[123] = "rp01refperstel1";
  ajax_field_list[124] = "rp01refpersnom2";
  ajax_field_list[125] = "rp01refpersparen2";
  ajax_field_list[126] = "rp01refperstel2";
  ajax_field_list[127] = "rp01tipovivienda";
  ajax_field_list[128] = "rp01serviciosbasicos";
  ajax_field_list[129] = "rp01viviendadetalle";
  ajax_field_list[130] = "rp01dormitorios";
  ajax_field_list[131] = "rp01sala";
  ajax_field_list[132] = "rp01comedor";
  ajax_field_list[133] = "rp01banos";
  ajax_field_list[134] = "rp01estudiosrealizados";
  ajax_field_list[135] = "rp01ruta1";
  ajax_field_list[136] = "rp01ruta2";
  ajax_field_list[137] = "rp01ruta3";
  ajax_field_list[138] = "rp01actividadesextras";

  var ajax_block_list = new Array();
  ajax_block_list[0] = "0";

  var ajax_error_list = {
    "rp01noemp": {"label": "Rp 0 1noemp", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "rp01division": {"label": "Rp 0 1division", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "rp01depto": {"label": "Rp 0 1depto", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "rp01seccion": {"label": "Rp 0 1seccion", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "rp01noemp1": {"label": "Rp 0 1noemp 1", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "rp01nombreemp": {"label": "Rp 0 1nombreemp", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "rp01categoria": {"label": "Rp 0 1categoria", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "rp01turno": {"label": "Rp 0 1turno", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "rp01statusemp": {"label": "Rp 0 1statusemp", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "rp01fechastatus": {"label": "Rp 0 1fechastatus", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "rp01causaretiro": {"label": "Rp 0 1causaretiro", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "rp01direccion": {"label": "Rp 0 1direccion", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "rp01telefono": {"label": "Rp 0 1telefono", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "rp01lugarnacimiento": {"label": "Rp 0 1lugarnacimiento", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "rp01fechanacimiento": {"label": "Rp 0 1fechanacimiento", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "rp01nacionalidad": {"label": "Rp 0 1nacionalidad", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "rp01cedula": {"label": "Rp 0 1cedula", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "rp01noiess": {"label": "Rp 0 1noiess", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "rp01sexo": {"label": "Rp 0 1sexo", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "rp01nolibreta": {"label": "Rp 0 1nolibreta", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "rp01profesion": {"label": "Rp 0 1profesion", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "rp01fechaingreso": {"label": "Rp 0 1fechaingreso", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "rp01fechareingreso": {"label": "Rp 0 1fechareingreso", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "rp01cargo": {"label": "Rp 0 1cargo", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "rp01estadocivil": {"label": "Rp 0 1estadocivil", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "rp01rebajaxcasado": {"label": "Rp 0 1rebajaxcasado", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "rp01nombreconyuge": {"label": "Rp 0 1nombreconyuge", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "rp01nombrepadre": {"label": "Rp 0 1nombrepadre", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "rp01nombremadre": {"label": "Rp 0 1nombremadre", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "rp01nohijos": {"label": "Rp 0 1nohijos", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "rp01fechahijos0": {"label": "Rp 0 1fechahijos", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "rp01sexohijos0": {"label": "Rp 0 1sexohijos", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "rp01fechahijos1": {"label": "Rp 0 1fechahijos 1", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "rp01sexohijos1": {"label": "Rp 0 1sexohijos 1", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "rp01fechahijos2": {"label": "Rp 0 1fechahijos 2", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "rp01sexohijos2": {"label": "Rp 0 1sexohijos 2", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "rp01fechahijos3": {"label": "Rp 0 1fechahijos 3", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "rp01sexohijos3": {"label": "Rp 0 1sexohijos 3", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "rp01fechahijos4": {"label": "Rp 0 1fechahijos 4", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "rp01sexohijos4": {"label": "Rp 0 1sexohijos 4", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "rp01fechahijos5": {"label": "Rp 0 1fechahijos 5", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "rp01sexohijos5": {"label": "Rp 0 1sexohijos 5", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "rp01fechahijos6": {"label": "Rp 0 1fechahijos 6", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "rp01sexohijos6": {"label": "Rp 0 1sexohijos 6", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "rp01fechahijos7": {"label": "Rp 0 1fechahijos 7", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "rp01sexohijos7": {"label": "Rp 0 1sexohijos 7", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "rp01fechahijos8": {"label": "Rp 0 1fechahijos 8", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "rp01sexohijos8": {"label": "Rp 0 1sexohijos 8", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "rp01fechahijos9": {"label": "Rp 0 1fechahijos 9", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "rp01sexohijos9": {"label": "Rp 0 1sexohijos 9", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "rp01cargaspadres": {"label": "Rp 0 1cargaspadres", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "rp01otrascargas": {"label": "Rp 0 1otrascargas", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "rp01formapago": {"label": "Rp 0 1formapago", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "rp01nobancoemp": {"label": "Rp 0 1nobancoemp", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "rp01ctabancoemp": {"label": "Rp 0 1ctabancoemp", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "rp01tipoctabco": {"label": "Rp 0 1tipoctabco", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "rp01fechaultvacacion": {"label": "Rp 0 1fechaultvacacion", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "rp01aporte": {"label": "Rp 0 1aporte", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "rp01socio": {"label": "Rp 0 1socio", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "rp01transporte": {"label": "Rp 0 1transporte", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "rp01recibeporc": {"label": "Rp 0 1recibeporc", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "rp01sueldoanterior": {"label": "Rp 0 1sueldoanterior", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "rp01sueldosalario": {"label": "Rp 0 1sueldosalario", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "rp01fecmodsdosal": {"label": "Rp 0 1fecmodsdosal", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "rp01fecmodficha": {"label": "Rp 0 1fecmodficha", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "rp01faltasinjust": {"label": "Rp 0 1faltasinjust", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "rp01ingresos1er": {"label": "Rp 0 1ingresos 1er", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "rp01basesocialvalor": {"label": "Rp 0 1basesocialvalor", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "rp01basesocialtiempo": {"label": "Rp 0 1basesocialtiempo", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "rp0114vopagoacum": {"label": "Rp 011 4vopagoacum", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "rp0115vopagoacum": {"label": "Rp 011 5vopagoacum", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "rp01cverrorliq": {"label": "Rp 0 1cverrorliq", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "rp01porcentliq": {"label": "Rp 0 1porcentliq", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "rp01tiposangre": {"label": "Rp 0 1tiposangre", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "rp01ingresos2do": {"label": "Rp 0 1ingresos 2do", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "rp01provdiremp": {"label": "Rp 0 1provdiremp", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "rp01cantondiremp": {"label": "Rp 0 1cantondiremp", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "rp01ciudaddiremp": {"label": "Rp 0 1ciudaddiremp", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "rp01codocupacion": {"label": "Rp 0 1codocupacion", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "uid": {"label": "UID", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "block": {"label": "Block", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "ultimoacceso": {"label": "Ultimoacceso", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "rp01foto": {"label": "Rp 0 1foto", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "rp01ctacontable": {"label": "Rp 0 1ctacontable", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "rp01email": {"label": "Rp 0 1email", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "rp01passwd": {"label": "Rp 0 1passwd", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "rp01huella": {"label": "Rp 0 1huella", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "rp01recibefr": {"label": "Rp 0 1recibefr", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "rp01recibedt": {"label": "Rp 0 1recibedt", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "rp01recibedc": {"label": "Rp 0 1recibedc", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "rp01uid": {"label": "Rp 01UID", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "rp01fechauid": {"label": "Rp 0 1fecha UID", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "rp01obs": {"label": "Rp 0 1obs", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "rp01cauliq": {"label": "Rp 0 1cauliq", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "rp01discapacidad": {"label": "Rp 0 1discapacidad", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "rp01conadis": {"label": "Rp 0 1conadis", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "rp01tpdiscapacidad": {"label": "Rp 0 1tpdiscapacidad", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "rp01prdiscapacidad": {"label": "Rp 0 1prdiscapacidad", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "rp01freserva": {"label": "Rp 0 1freserva", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "rp01codsectorial": {"label": "Rp 0 1codsectorial", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "anticipoporvalor": {"label": "Anticipoporvalor", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "tipidret": {"label": "Tip Id Ret", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "residenciatrab": {"label": "Residencia Trab", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "paisresidencia": {"label": "Pais Residencia", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "aplicaconvenio": {"label": "Aplica Convenio", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "tipotrabajdiscap": {"label": "Tipo Trabaj Discap", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "porcentajediscap": {"label": "Porcentaje Discap", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "tipiddiscap": {"label": "Tip Id Discap", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "iddiscap": {"label": "Id Discap", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "rp01varias_secciones": {"label": "Rp 0 1varias Secciones", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "rp01cc": {"label": "Rp 0 1cc", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "rp01observacion": {"label": "Rp 0 1observacion", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "rp01iessconyugue": {"label": "Rp 0 1iessconyugue", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "rp01tiporefrigerio": {"label": "Rp 0 1tiporefrigerio", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "idiomas": {"label": "Idiomas", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "emergencias": {"label": "Emergencias", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "rp01tipojornada": {"label": "Rp 0 1tipojornada", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "rp01numero_horas": {"label": "Rp 0 1numero Horas", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "rp01emailpersonal": {"label": "Rp 0 1emailpersonal", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "rp01supervisadopor": {"label": "Rp 0 1supervisadopor", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "rp01zonaderiesgo": {"label": "Rp 0 1zonaderiesgo", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "rp01refpersnom1": {"label": "Rp 0 1refpersnom 1", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "rp01refpersparen1": {"label": "Rp 0 1refpersparen 1", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "rp01refperstel1": {"label": "Rp 0 1refperstel 1", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "rp01refpersnom2": {"label": "Rp 0 1refpersnom 2", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "rp01refpersparen2": {"label": "Rp 0 1refpersparen 2", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "rp01refperstel2": {"label": "Rp 0 1refperstel 2", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "rp01tipovivienda": {"label": "Rp 0 1tipovivienda", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "rp01serviciosbasicos": {"label": "Rp 0 1serviciosbasicos", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "rp01viviendadetalle": {"label": "Rp 0 1viviendadetalle", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "rp01dormitorios": {"label": "Rp 0 1dormitorios", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "rp01sala": {"label": "Rp 0 1sala", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "rp01comedor": {"label": "Rp 0 1comedor", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "rp01banos": {"label": "Rp 0 1banos", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "rp01estudiosrealizados": {"label": "Rp 0 1estudiosrealizados", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "rp01ruta1": {"label": "Rp 0 1ruta 1", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "rp01ruta2": {"label": "Rp 0 1ruta 2", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "rp01ruta3": {"label": "Rp 0 1ruta 3", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "rp01actividadesextras": {"label": "Rp 0 1actividadesextras", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5}
  };
  var ajax_error_timeout = 5;

  var ajax_block_id = {
    "0": "hidden_bloco_0"
  };

  var ajax_block_tab = {
    "hidden_bloco_0": ""
  };

  var ajax_field_mult = {
    "rp01noemp": new Array(),
    "rp01division": new Array(),
    "rp01depto": new Array(),
    "rp01seccion": new Array(),
    "rp01noemp1": new Array(),
    "rp01nombreemp": new Array(),
    "rp01categoria": new Array(),
    "rp01turno": new Array(),
    "rp01statusemp": new Array(),
    "rp01fechastatus": new Array(),
    "rp01causaretiro": new Array(),
    "rp01direccion": new Array(),
    "rp01telefono": new Array(),
    "rp01lugarnacimiento": new Array(),
    "rp01fechanacimiento": new Array(),
    "rp01nacionalidad": new Array(),
    "rp01cedula": new Array(),
    "rp01noiess": new Array(),
    "rp01sexo": new Array(),
    "rp01nolibreta": new Array(),
    "rp01profesion": new Array(),
    "rp01fechaingreso": new Array(),
    "rp01fechareingreso": new Array(),
    "rp01cargo": new Array(),
    "rp01estadocivil": new Array(),
    "rp01rebajaxcasado": new Array(),
    "rp01nombreconyuge": new Array(),
    "rp01nombrepadre": new Array(),
    "rp01nombremadre": new Array(),
    "rp01nohijos": new Array(),
    "rp01fechahijos0": new Array(),
    "rp01sexohijos0": new Array(),
    "rp01fechahijos1": new Array(),
    "rp01sexohijos1": new Array(),
    "rp01fechahijos2": new Array(),
    "rp01sexohijos2": new Array(),
    "rp01fechahijos3": new Array(),
    "rp01sexohijos3": new Array(),
    "rp01fechahijos4": new Array(),
    "rp01sexohijos4": new Array(),
    "rp01fechahijos5": new Array(),
    "rp01sexohijos5": new Array(),
    "rp01fechahijos6": new Array(),
    "rp01sexohijos6": new Array(),
    "rp01fechahijos7": new Array(),
    "rp01sexohijos7": new Array(),
    "rp01fechahijos8": new Array(),
    "rp01sexohijos8": new Array(),
    "rp01fechahijos9": new Array(),
    "rp01sexohijos9": new Array(),
    "rp01cargaspadres": new Array(),
    "rp01otrascargas": new Array(),
    "rp01formapago": new Array(),
    "rp01nobancoemp": new Array(),
    "rp01ctabancoemp": new Array(),
    "rp01tipoctabco": new Array(),
    "rp01fechaultvacacion": new Array(),
    "rp01aporte": new Array(),
    "rp01socio": new Array(),
    "rp01transporte": new Array(),
    "rp01recibeporc": new Array(),
    "rp01sueldoanterior": new Array(),
    "rp01sueldosalario": new Array(),
    "rp01fecmodsdosal": new Array(),
    "rp01fecmodficha": new Array(),
    "rp01faltasinjust": new Array(),
    "rp01ingresos1er": new Array(),
    "rp01basesocialvalor": new Array(),
    "rp01basesocialtiempo": new Array(),
    "rp0114vopagoacum": new Array(),
    "rp0115vopagoacum": new Array(),
    "rp01cverrorliq": new Array(),
    "rp01porcentliq": new Array(),
    "rp01tiposangre": new Array(),
    "rp01ingresos2do": new Array(),
    "rp01provdiremp": new Array(),
    "rp01cantondiremp": new Array(),
    "rp01ciudaddiremp": new Array(),
    "rp01codocupacion": new Array(),
    "uid": new Array(),
    "block": new Array(),
    "ultimoacceso": new Array(),
    "rp01foto": new Array(),
    "rp01ctacontable": new Array(),
    "rp01email": new Array(),
    "rp01passwd": new Array(),
    "rp01huella": new Array(),
    "rp01recibefr": new Array(),
    "rp01recibedt": new Array(),
    "rp01recibedc": new Array(),
    "rp01uid": new Array(),
    "rp01fechauid": new Array(),
    "rp01obs": new Array(),
    "rp01cauliq": new Array(),
    "rp01discapacidad": new Array(),
    "rp01conadis": new Array(),
    "rp01tpdiscapacidad": new Array(),
    "rp01prdiscapacidad": new Array(),
    "rp01freserva": new Array(),
    "rp01codsectorial": new Array(),
    "anticipoporvalor": new Array(),
    "tipidret": new Array(),
    "residenciatrab": new Array(),
    "paisresidencia": new Array(),
    "aplicaconvenio": new Array(),
    "tipotrabajdiscap": new Array(),
    "porcentajediscap": new Array(),
    "tipiddiscap": new Array(),
    "iddiscap": new Array(),
    "rp01varias_secciones": new Array(),
    "rp01cc": new Array(),
    "rp01observacion": new Array(),
    "rp01iessconyugue": new Array(),
    "rp01tiporefrigerio": new Array(),
    "idiomas": new Array(),
    "emergencias": new Array(),
    "rp01tipojornada": new Array(),
    "rp01numero_horas": new Array(),
    "rp01emailpersonal": new Array(),
    "rp01supervisadopor": new Array(),
    "rp01zonaderiesgo": new Array(),
    "rp01refpersnom1": new Array(),
    "rp01refpersparen1": new Array(),
    "rp01refperstel1": new Array(),
    "rp01refpersnom2": new Array(),
    "rp01refpersparen2": new Array(),
    "rp01refperstel2": new Array(),
    "rp01tipovivienda": new Array(),
    "rp01serviciosbasicos": new Array(),
    "rp01viviendadetalle": new Array(),
    "rp01dormitorios": new Array(),
    "rp01sala": new Array(),
    "rp01comedor": new Array(),
    "rp01banos": new Array(),
    "rp01estudiosrealizados": new Array(),
    "rp01ruta1": new Array(),
    "rp01ruta2": new Array(),
    "rp01ruta3": new Array(),
    "rp01actividadesextras": new Array()
  };
  ajax_field_mult["rp01noemp"][1] = "rp01noemp";
  ajax_field_mult["rp01division"][1] = "rp01division";
  ajax_field_mult["rp01depto"][1] = "rp01depto";
  ajax_field_mult["rp01seccion"][1] = "rp01seccion";
  ajax_field_mult["rp01noemp1"][1] = "rp01noemp1";
  ajax_field_mult["rp01nombreemp"][1] = "rp01nombreemp";
  ajax_field_mult["rp01categoria"][1] = "rp01categoria";
  ajax_field_mult["rp01turno"][1] = "rp01turno";
  ajax_field_mult["rp01statusemp"][1] = "rp01statusemp";
  ajax_field_mult["rp01fechastatus"][1] = "rp01fechastatus";
  ajax_field_mult["rp01causaretiro"][1] = "rp01causaretiro";
  ajax_field_mult["rp01direccion"][1] = "rp01direccion";
  ajax_field_mult["rp01telefono"][1] = "rp01telefono";
  ajax_field_mult["rp01lugarnacimiento"][1] = "rp01lugarnacimiento";
  ajax_field_mult["rp01fechanacimiento"][1] = "rp01fechanacimiento";
  ajax_field_mult["rp01nacionalidad"][1] = "rp01nacionalidad";
  ajax_field_mult["rp01cedula"][1] = "rp01cedula";
  ajax_field_mult["rp01noiess"][1] = "rp01noiess";
  ajax_field_mult["rp01sexo"][1] = "rp01sexo";
  ajax_field_mult["rp01nolibreta"][1] = "rp01nolibreta";
  ajax_field_mult["rp01profesion"][1] = "rp01profesion";
  ajax_field_mult["rp01fechaingreso"][1] = "rp01fechaingreso";
  ajax_field_mult["rp01fechareingreso"][1] = "rp01fechareingreso";
  ajax_field_mult["rp01cargo"][1] = "rp01cargo";
  ajax_field_mult["rp01estadocivil"][1] = "rp01estadocivil";
  ajax_field_mult["rp01rebajaxcasado"][1] = "rp01rebajaxcasado";
  ajax_field_mult["rp01nombreconyuge"][1] = "rp01nombreconyuge";
  ajax_field_mult["rp01nombrepadre"][1] = "rp01nombrepadre";
  ajax_field_mult["rp01nombremadre"][1] = "rp01nombremadre";
  ajax_field_mult["rp01nohijos"][1] = "rp01nohijos";
  ajax_field_mult["rp01fechahijos0"][1] = "rp01fechahijos0";
  ajax_field_mult["rp01sexohijos0"][1] = "rp01sexohijos0";
  ajax_field_mult["rp01fechahijos1"][1] = "rp01fechahijos1";
  ajax_field_mult["rp01sexohijos1"][1] = "rp01sexohijos1";
  ajax_field_mult["rp01fechahijos2"][1] = "rp01fechahijos2";
  ajax_field_mult["rp01sexohijos2"][1] = "rp01sexohijos2";
  ajax_field_mult["rp01fechahijos3"][1] = "rp01fechahijos3";
  ajax_field_mult["rp01sexohijos3"][1] = "rp01sexohijos3";
  ajax_field_mult["rp01fechahijos4"][1] = "rp01fechahijos4";
  ajax_field_mult["rp01sexohijos4"][1] = "rp01sexohijos4";
  ajax_field_mult["rp01fechahijos5"][1] = "rp01fechahijos5";
  ajax_field_mult["rp01sexohijos5"][1] = "rp01sexohijos5";
  ajax_field_mult["rp01fechahijos6"][1] = "rp01fechahijos6";
  ajax_field_mult["rp01sexohijos6"][1] = "rp01sexohijos6";
  ajax_field_mult["rp01fechahijos7"][1] = "rp01fechahijos7";
  ajax_field_mult["rp01sexohijos7"][1] = "rp01sexohijos7";
  ajax_field_mult["rp01fechahijos8"][1] = "rp01fechahijos8";
  ajax_field_mult["rp01sexohijos8"][1] = "rp01sexohijos8";
  ajax_field_mult["rp01fechahijos9"][1] = "rp01fechahijos9";
  ajax_field_mult["rp01sexohijos9"][1] = "rp01sexohijos9";
  ajax_field_mult["rp01cargaspadres"][1] = "rp01cargaspadres";
  ajax_field_mult["rp01otrascargas"][1] = "rp01otrascargas";
  ajax_field_mult["rp01formapago"][1] = "rp01formapago";
  ajax_field_mult["rp01nobancoemp"][1] = "rp01nobancoemp";
  ajax_field_mult["rp01ctabancoemp"][1] = "rp01ctabancoemp";
  ajax_field_mult["rp01tipoctabco"][1] = "rp01tipoctabco";
  ajax_field_mult["rp01fechaultvacacion"][1] = "rp01fechaultvacacion";
  ajax_field_mult["rp01aporte"][1] = "rp01aporte";
  ajax_field_mult["rp01socio"][1] = "rp01socio";
  ajax_field_mult["rp01transporte"][1] = "rp01transporte";
  ajax_field_mult["rp01recibeporc"][1] = "rp01recibeporc";
  ajax_field_mult["rp01sueldoanterior"][1] = "rp01sueldoanterior";
  ajax_field_mult["rp01sueldosalario"][1] = "rp01sueldosalario";
  ajax_field_mult["rp01fecmodsdosal"][1] = "rp01fecmodsdosal";
  ajax_field_mult["rp01fecmodficha"][1] = "rp01fecmodficha";
  ajax_field_mult["rp01faltasinjust"][1] = "rp01faltasinjust";
  ajax_field_mult["rp01ingresos1er"][1] = "rp01ingresos1er";
  ajax_field_mult["rp01basesocialvalor"][1] = "rp01basesocialvalor";
  ajax_field_mult["rp01basesocialtiempo"][1] = "rp01basesocialtiempo";
  ajax_field_mult["rp0114vopagoacum"][1] = "rp0114vopagoacum";
  ajax_field_mult["rp0115vopagoacum"][1] = "rp0115vopagoacum";
  ajax_field_mult["rp01cverrorliq"][1] = "rp01cverrorliq";
  ajax_field_mult["rp01porcentliq"][1] = "rp01porcentliq";
  ajax_field_mult["rp01tiposangre"][1] = "rp01tiposangre";
  ajax_field_mult["rp01ingresos2do"][1] = "rp01ingresos2do";
  ajax_field_mult["rp01provdiremp"][1] = "rp01provdiremp";
  ajax_field_mult["rp01cantondiremp"][1] = "rp01cantondiremp";
  ajax_field_mult["rp01ciudaddiremp"][1] = "rp01ciudaddiremp";
  ajax_field_mult["rp01codocupacion"][1] = "rp01codocupacion";
  ajax_field_mult["uid"][1] = "uid";
  ajax_field_mult["block"][1] = "block";
  ajax_field_mult["ultimoacceso"][1] = "ultimoacceso";
  ajax_field_mult["rp01foto"][1] = "rp01foto";
  ajax_field_mult["rp01ctacontable"][1] = "rp01ctacontable";
  ajax_field_mult["rp01email"][1] = "rp01email";
  ajax_field_mult["rp01passwd"][1] = "rp01passwd";
  ajax_field_mult["rp01huella"][1] = "rp01huella";
  ajax_field_mult["rp01recibefr"][1] = "rp01recibefr";
  ajax_field_mult["rp01recibedt"][1] = "rp01recibedt";
  ajax_field_mult["rp01recibedc"][1] = "rp01recibedc";
  ajax_field_mult["rp01uid"][1] = "rp01uid";
  ajax_field_mult["rp01fechauid"][1] = "rp01fechauid";
  ajax_field_mult["rp01obs"][1] = "rp01obs";
  ajax_field_mult["rp01cauliq"][1] = "rp01cauliq";
  ajax_field_mult["rp01discapacidad"][1] = "rp01discapacidad";
  ajax_field_mult["rp01conadis"][1] = "rp01conadis";
  ajax_field_mult["rp01tpdiscapacidad"][1] = "rp01tpdiscapacidad";
  ajax_field_mult["rp01prdiscapacidad"][1] = "rp01prdiscapacidad";
  ajax_field_mult["rp01freserva"][1] = "rp01freserva";
  ajax_field_mult["rp01codsectorial"][1] = "rp01codsectorial";
  ajax_field_mult["anticipoporvalor"][1] = "anticipoporvalor";
  ajax_field_mult["tipidret"][1] = "tipidret";
  ajax_field_mult["residenciatrab"][1] = "residenciatrab";
  ajax_field_mult["paisresidencia"][1] = "paisresidencia";
  ajax_field_mult["aplicaconvenio"][1] = "aplicaconvenio";
  ajax_field_mult["tipotrabajdiscap"][1] = "tipotrabajdiscap";
  ajax_field_mult["porcentajediscap"][1] = "porcentajediscap";
  ajax_field_mult["tipiddiscap"][1] = "tipiddiscap";
  ajax_field_mult["iddiscap"][1] = "iddiscap";
  ajax_field_mult["rp01varias_secciones"][1] = "rp01varias_secciones";
  ajax_field_mult["rp01cc"][1] = "rp01cc";
  ajax_field_mult["rp01observacion"][1] = "rp01observacion";
  ajax_field_mult["rp01iessconyugue"][1] = "rp01iessconyugue";
  ajax_field_mult["rp01tiporefrigerio"][1] = "rp01tiporefrigerio";
  ajax_field_mult["idiomas"][1] = "idiomas";
  ajax_field_mult["emergencias"][1] = "emergencias";
  ajax_field_mult["rp01tipojornada"][1] = "rp01tipojornada";
  ajax_field_mult["rp01numero_horas"][1] = "rp01numero_horas";
  ajax_field_mult["rp01emailpersonal"][1] = "rp01emailpersonal";
  ajax_field_mult["rp01supervisadopor"][1] = "rp01supervisadopor";
  ajax_field_mult["rp01zonaderiesgo"][1] = "rp01zonaderiesgo";
  ajax_field_mult["rp01refpersnom1"][1] = "rp01refpersnom1";
  ajax_field_mult["rp01refpersparen1"][1] = "rp01refpersparen1";
  ajax_field_mult["rp01refperstel1"][1] = "rp01refperstel1";
  ajax_field_mult["rp01refpersnom2"][1] = "rp01refpersnom2";
  ajax_field_mult["rp01refpersparen2"][1] = "rp01refpersparen2";
  ajax_field_mult["rp01refperstel2"][1] = "rp01refperstel2";
  ajax_field_mult["rp01tipovivienda"][1] = "rp01tipovivienda";
  ajax_field_mult["rp01serviciosbasicos"][1] = "rp01serviciosbasicos";
  ajax_field_mult["rp01viviendadetalle"][1] = "rp01viviendadetalle";
  ajax_field_mult["rp01dormitorios"][1] = "rp01dormitorios";
  ajax_field_mult["rp01sala"][1] = "rp01sala";
  ajax_field_mult["rp01comedor"][1] = "rp01comedor";
  ajax_field_mult["rp01banos"][1] = "rp01banos";
  ajax_field_mult["rp01estudiosrealizados"][1] = "rp01estudiosrealizados";
  ajax_field_mult["rp01ruta1"][1] = "rp01ruta1";
  ajax_field_mult["rp01ruta2"][1] = "rp01ruta2";
  ajax_field_mult["rp01ruta3"][1] = "rp01ruta3";
  ajax_field_mult["rp01actividadesextras"][1] = "rp01actividadesextras";

  var ajax_field_id = {
    "rp01noemp": new Array("hidden_field_label_rp01noemp", "hidden_field_data_rp01noemp"),
    "rp01division": new Array("hidden_field_label_rp01division", "hidden_field_data_rp01division"),
    "rp01depto": new Array("hidden_field_label_rp01depto", "hidden_field_data_rp01depto"),
    "rp01seccion": new Array("hidden_field_label_rp01seccion", "hidden_field_data_rp01seccion"),
    "rp01noemp1": new Array("hidden_field_label_rp01noemp1", "hidden_field_data_rp01noemp1"),
    "rp01nombreemp": new Array("hidden_field_label_rp01nombreemp", "hidden_field_data_rp01nombreemp"),
    "rp01categoria": new Array("hidden_field_label_rp01categoria", "hidden_field_data_rp01categoria"),
    "rp01turno": new Array("hidden_field_label_rp01turno", "hidden_field_data_rp01turno"),
    "rp01statusemp": new Array("hidden_field_label_rp01statusemp", "hidden_field_data_rp01statusemp"),
    "rp01fechastatus": new Array("hidden_field_label_rp01fechastatus", "hidden_field_data_rp01fechastatus"),
    "rp01causaretiro": new Array("hidden_field_label_rp01causaretiro", "hidden_field_data_rp01causaretiro"),
    "rp01direccion": new Array("hidden_field_label_rp01direccion", "hidden_field_data_rp01direccion"),
    "rp01telefono": new Array("hidden_field_label_rp01telefono", "hidden_field_data_rp01telefono"),
    "rp01lugarnacimiento": new Array("hidden_field_label_rp01lugarnacimiento", "hidden_field_data_rp01lugarnacimiento"),
    "rp01fechanacimiento": new Array("hidden_field_label_rp01fechanacimiento", "hidden_field_data_rp01fechanacimiento"),
    "rp01nacionalidad": new Array("hidden_field_label_rp01nacionalidad", "hidden_field_data_rp01nacionalidad"),
    "rp01cedula": new Array("hidden_field_label_rp01cedula", "hidden_field_data_rp01cedula"),
    "rp01noiess": new Array("hidden_field_label_rp01noiess", "hidden_field_data_rp01noiess"),
    "rp01sexo": new Array("hidden_field_label_rp01sexo", "hidden_field_data_rp01sexo"),
    "rp01nolibreta": new Array("hidden_field_label_rp01nolibreta", "hidden_field_data_rp01nolibreta"),
    "rp01profesion": new Array("hidden_field_label_rp01profesion", "hidden_field_data_rp01profesion"),
    "rp01fechaingreso": new Array("hidden_field_label_rp01fechaingreso", "hidden_field_data_rp01fechaingreso"),
    "rp01fechareingreso": new Array("hidden_field_label_rp01fechareingreso", "hidden_field_data_rp01fechareingreso"),
    "rp01cargo": new Array("hidden_field_label_rp01cargo", "hidden_field_data_rp01cargo"),
    "rp01estadocivil": new Array("hidden_field_label_rp01estadocivil", "hidden_field_data_rp01estadocivil"),
    "rp01rebajaxcasado": new Array("hidden_field_label_rp01rebajaxcasado", "hidden_field_data_rp01rebajaxcasado"),
    "rp01nombreconyuge": new Array("hidden_field_label_rp01nombreconyuge", "hidden_field_data_rp01nombreconyuge"),
    "rp01nombrepadre": new Array("hidden_field_label_rp01nombrepadre", "hidden_field_data_rp01nombrepadre"),
    "rp01nombremadre": new Array("hidden_field_label_rp01nombremadre", "hidden_field_data_rp01nombremadre"),
    "rp01nohijos": new Array("hidden_field_label_rp01nohijos", "hidden_field_data_rp01nohijos"),
    "rp01fechahijos0": new Array("hidden_field_label_rp01fechahijos0", "hidden_field_data_rp01fechahijos0"),
    "rp01sexohijos0": new Array("hidden_field_label_rp01sexohijos0", "hidden_field_data_rp01sexohijos0"),
    "rp01fechahijos1": new Array("hidden_field_label_rp01fechahijos1", "hidden_field_data_rp01fechahijos1"),
    "rp01sexohijos1": new Array("hidden_field_label_rp01sexohijos1", "hidden_field_data_rp01sexohijos1"),
    "rp01fechahijos2": new Array("hidden_field_label_rp01fechahijos2", "hidden_field_data_rp01fechahijos2"),
    "rp01sexohijos2": new Array("hidden_field_label_rp01sexohijos2", "hidden_field_data_rp01sexohijos2"),
    "rp01fechahijos3": new Array("hidden_field_label_rp01fechahijos3", "hidden_field_data_rp01fechahijos3"),
    "rp01sexohijos3": new Array("hidden_field_label_rp01sexohijos3", "hidden_field_data_rp01sexohijos3"),
    "rp01fechahijos4": new Array("hidden_field_label_rp01fechahijos4", "hidden_field_data_rp01fechahijos4"),
    "rp01sexohijos4": new Array("hidden_field_label_rp01sexohijos4", "hidden_field_data_rp01sexohijos4"),
    "rp01fechahijos5": new Array("hidden_field_label_rp01fechahijos5", "hidden_field_data_rp01fechahijos5"),
    "rp01sexohijos5": new Array("hidden_field_label_rp01sexohijos5", "hidden_field_data_rp01sexohijos5"),
    "rp01fechahijos6": new Array("hidden_field_label_rp01fechahijos6", "hidden_field_data_rp01fechahijos6"),
    "rp01sexohijos6": new Array("hidden_field_label_rp01sexohijos6", "hidden_field_data_rp01sexohijos6"),
    "rp01fechahijos7": new Array("hidden_field_label_rp01fechahijos7", "hidden_field_data_rp01fechahijos7"),
    "rp01sexohijos7": new Array("hidden_field_label_rp01sexohijos7", "hidden_field_data_rp01sexohijos7"),
    "rp01fechahijos8": new Array("hidden_field_label_rp01fechahijos8", "hidden_field_data_rp01fechahijos8"),
    "rp01sexohijos8": new Array("hidden_field_label_rp01sexohijos8", "hidden_field_data_rp01sexohijos8"),
    "rp01fechahijos9": new Array("hidden_field_label_rp01fechahijos9", "hidden_field_data_rp01fechahijos9"),
    "rp01sexohijos9": new Array("hidden_field_label_rp01sexohijos9", "hidden_field_data_rp01sexohijos9"),
    "rp01cargaspadres": new Array("hidden_field_label_rp01cargaspadres", "hidden_field_data_rp01cargaspadres"),
    "rp01otrascargas": new Array("hidden_field_label_rp01otrascargas", "hidden_field_data_rp01otrascargas"),
    "rp01formapago": new Array("hidden_field_label_rp01formapago", "hidden_field_data_rp01formapago"),
    "rp01nobancoemp": new Array("hidden_field_label_rp01nobancoemp", "hidden_field_data_rp01nobancoemp"),
    "rp01ctabancoemp": new Array("hidden_field_label_rp01ctabancoemp", "hidden_field_data_rp01ctabancoemp"),
    "rp01tipoctabco": new Array("hidden_field_label_rp01tipoctabco", "hidden_field_data_rp01tipoctabco"),
    "rp01fechaultvacacion": new Array("hidden_field_label_rp01fechaultvacacion", "hidden_field_data_rp01fechaultvacacion"),
    "rp01aporte": new Array("hidden_field_label_rp01aporte", "hidden_field_data_rp01aporte"),
    "rp01socio": new Array("hidden_field_label_rp01socio", "hidden_field_data_rp01socio"),
    "rp01transporte": new Array("hidden_field_label_rp01transporte", "hidden_field_data_rp01transporte"),
    "rp01recibeporc": new Array("hidden_field_label_rp01recibeporc", "hidden_field_data_rp01recibeporc"),
    "rp01sueldoanterior": new Array("hidden_field_label_rp01sueldoanterior", "hidden_field_data_rp01sueldoanterior"),
    "rp01sueldosalario": new Array("hidden_field_label_rp01sueldosalario", "hidden_field_data_rp01sueldosalario"),
    "rp01fecmodsdosal": new Array("hidden_field_label_rp01fecmodsdosal", "hidden_field_data_rp01fecmodsdosal"),
    "rp01fecmodficha": new Array("hidden_field_label_rp01fecmodficha", "hidden_field_data_rp01fecmodficha"),
    "rp01faltasinjust": new Array("hidden_field_label_rp01faltasinjust", "hidden_field_data_rp01faltasinjust"),
    "rp01ingresos1er": new Array("hidden_field_label_rp01ingresos1er", "hidden_field_data_rp01ingresos1er"),
    "rp01basesocialvalor": new Array("hidden_field_label_rp01basesocialvalor", "hidden_field_data_rp01basesocialvalor"),
    "rp01basesocialtiempo": new Array("hidden_field_label_rp01basesocialtiempo", "hidden_field_data_rp01basesocialtiempo"),
    "rp0114vopagoacum": new Array("hidden_field_label_rp0114vopagoacum", "hidden_field_data_rp0114vopagoacum"),
    "rp0115vopagoacum": new Array("hidden_field_label_rp0115vopagoacum", "hidden_field_data_rp0115vopagoacum"),
    "rp01cverrorliq": new Array("hidden_field_label_rp01cverrorliq", "hidden_field_data_rp01cverrorliq"),
    "rp01porcentliq": new Array("hidden_field_label_rp01porcentliq", "hidden_field_data_rp01porcentliq"),
    "rp01tiposangre": new Array("hidden_field_label_rp01tiposangre", "hidden_field_data_rp01tiposangre"),
    "rp01ingresos2do": new Array("hidden_field_label_rp01ingresos2do", "hidden_field_data_rp01ingresos2do"),
    "rp01provdiremp": new Array("hidden_field_label_rp01provdiremp", "hidden_field_data_rp01provdiremp"),
    "rp01cantondiremp": new Array("hidden_field_label_rp01cantondiremp", "hidden_field_data_rp01cantondiremp"),
    "rp01ciudaddiremp": new Array("hidden_field_label_rp01ciudaddiremp", "hidden_field_data_rp01ciudaddiremp"),
    "rp01codocupacion": new Array("hidden_field_label_rp01codocupacion", "hidden_field_data_rp01codocupacion"),
    "uid": new Array("hidden_field_label_uid", "hidden_field_data_uid"),
    "block": new Array("hidden_field_label_block", "hidden_field_data_block"),
    "ultimoacceso": new Array("hidden_field_label_ultimoacceso", "hidden_field_data_ultimoacceso"),
    "rp01foto": new Array("hidden_field_label_rp01foto", "hidden_field_data_rp01foto"),
    "rp01ctacontable": new Array("hidden_field_label_rp01ctacontable", "hidden_field_data_rp01ctacontable"),
    "rp01email": new Array("hidden_field_label_rp01email", "hidden_field_data_rp01email"),
    "rp01passwd": new Array("hidden_field_label_rp01passwd", "hidden_field_data_rp01passwd"),
    "rp01huella": new Array("hidden_field_label_rp01huella", "hidden_field_data_rp01huella"),
    "rp01recibefr": new Array("hidden_field_label_rp01recibefr", "hidden_field_data_rp01recibefr"),
    "rp01recibedt": new Array("hidden_field_label_rp01recibedt", "hidden_field_data_rp01recibedt"),
    "rp01recibedc": new Array("hidden_field_label_rp01recibedc", "hidden_field_data_rp01recibedc"),
    "rp01uid": new Array("hidden_field_label_rp01uid", "hidden_field_data_rp01uid"),
    "rp01fechauid": new Array("hidden_field_label_rp01fechauid", "hidden_field_data_rp01fechauid"),
    "rp01obs": new Array("hidden_field_label_rp01obs", "hidden_field_data_rp01obs"),
    "rp01cauliq": new Array("hidden_field_label_rp01cauliq", "hidden_field_data_rp01cauliq"),
    "rp01discapacidad": new Array("hidden_field_label_rp01discapacidad", "hidden_field_data_rp01discapacidad"),
    "rp01conadis": new Array("hidden_field_label_rp01conadis", "hidden_field_data_rp01conadis"),
    "rp01tpdiscapacidad": new Array("hidden_field_label_rp01tpdiscapacidad", "hidden_field_data_rp01tpdiscapacidad"),
    "rp01prdiscapacidad": new Array("hidden_field_label_rp01prdiscapacidad", "hidden_field_data_rp01prdiscapacidad"),
    "rp01freserva": new Array("hidden_field_label_rp01freserva", "hidden_field_data_rp01freserva"),
    "rp01codsectorial": new Array("hidden_field_label_rp01codsectorial", "hidden_field_data_rp01codsectorial"),
    "anticipoporvalor": new Array("hidden_field_label_anticipoporvalor", "hidden_field_data_anticipoporvalor"),
    "tipidret": new Array("hidden_field_label_tipidret", "hidden_field_data_tipidret"),
    "residenciatrab": new Array("hidden_field_label_residenciatrab", "hidden_field_data_residenciatrab"),
    "paisresidencia": new Array("hidden_field_label_paisresidencia", "hidden_field_data_paisresidencia"),
    "aplicaconvenio": new Array("hidden_field_label_aplicaconvenio", "hidden_field_data_aplicaconvenio"),
    "tipotrabajdiscap": new Array("hidden_field_label_tipotrabajdiscap", "hidden_field_data_tipotrabajdiscap"),
    "porcentajediscap": new Array("hidden_field_label_porcentajediscap", "hidden_field_data_porcentajediscap"),
    "tipiddiscap": new Array("hidden_field_label_tipiddiscap", "hidden_field_data_tipiddiscap"),
    "iddiscap": new Array("hidden_field_label_iddiscap", "hidden_field_data_iddiscap"),
    "rp01varias_secciones": new Array("hidden_field_label_rp01varias_secciones", "hidden_field_data_rp01varias_secciones"),
    "rp01cc": new Array("hidden_field_label_rp01cc", "hidden_field_data_rp01cc"),
    "rp01observacion": new Array("hidden_field_label_rp01observacion", "hidden_field_data_rp01observacion"),
    "rp01iessconyugue": new Array("hidden_field_label_rp01iessconyugue", "hidden_field_data_rp01iessconyugue"),
    "rp01tiporefrigerio": new Array("hidden_field_label_rp01tiporefrigerio", "hidden_field_data_rp01tiporefrigerio"),
    "idiomas": new Array("hidden_field_label_idiomas", "hidden_field_data_idiomas"),
    "emergencias": new Array("hidden_field_label_emergencias", "hidden_field_data_emergencias"),
    "rp01tipojornada": new Array("hidden_field_label_rp01tipojornada", "hidden_field_data_rp01tipojornada"),
    "rp01numero_horas": new Array("hidden_field_label_rp01numero_horas", "hidden_field_data_rp01numero_horas"),
    "rp01emailpersonal": new Array("hidden_field_label_rp01emailpersonal", "hidden_field_data_rp01emailpersonal"),
    "rp01supervisadopor": new Array("hidden_field_label_rp01supervisadopor", "hidden_field_data_rp01supervisadopor"),
    "rp01zonaderiesgo": new Array("hidden_field_label_rp01zonaderiesgo", "hidden_field_data_rp01zonaderiesgo"),
    "rp01refpersnom1": new Array("hidden_field_label_rp01refpersnom1", "hidden_field_data_rp01refpersnom1"),
    "rp01refpersparen1": new Array("hidden_field_label_rp01refpersparen1", "hidden_field_data_rp01refpersparen1"),
    "rp01refperstel1": new Array("hidden_field_label_rp01refperstel1", "hidden_field_data_rp01refperstel1"),
    "rp01refpersnom2": new Array("hidden_field_label_rp01refpersnom2", "hidden_field_data_rp01refpersnom2"),
    "rp01refpersparen2": new Array("hidden_field_label_rp01refpersparen2", "hidden_field_data_rp01refpersparen2"),
    "rp01refperstel2": new Array("hidden_field_label_rp01refperstel2", "hidden_field_data_rp01refperstel2"),
    "rp01tipovivienda": new Array("hidden_field_label_rp01tipovivienda", "hidden_field_data_rp01tipovivienda"),
    "rp01serviciosbasicos": new Array("hidden_field_label_rp01serviciosbasicos", "hidden_field_data_rp01serviciosbasicos"),
    "rp01viviendadetalle": new Array("hidden_field_label_rp01viviendadetalle", "hidden_field_data_rp01viviendadetalle"),
    "rp01dormitorios": new Array("hidden_field_label_rp01dormitorios", "hidden_field_data_rp01dormitorios"),
    "rp01sala": new Array("hidden_field_label_rp01sala", "hidden_field_data_rp01sala"),
    "rp01comedor": new Array("hidden_field_label_rp01comedor", "hidden_field_data_rp01comedor"),
    "rp01banos": new Array("hidden_field_label_rp01banos", "hidden_field_data_rp01banos"),
    "rp01estudiosrealizados": new Array("hidden_field_label_rp01estudiosrealizados", "hidden_field_data_rp01estudiosrealizados"),
    "rp01ruta1": new Array("hidden_field_label_rp01ruta1", "hidden_field_data_rp01ruta1"),
    "rp01ruta2": new Array("hidden_field_label_rp01ruta2", "hidden_field_data_rp01ruta2"),
    "rp01ruta3": new Array("hidden_field_label_rp01ruta3", "hidden_field_data_rp01ruta3"),
    "rp01actividadesextras": new Array("hidden_field_label_rp01actividadesextras", "hidden_field_data_rp01actividadesextras")
  };

  var ajax_read_only = {
    "rp01noemp": "on",
    "rp01division": "off",
    "rp01depto": "off",
    "rp01seccion": "off",
    "rp01noemp1": "off",
    "rp01nombreemp": "off",
    "rp01categoria": "off",
    "rp01turno": "off",
    "rp01statusemp": "off",
    "rp01fechastatus": "off",
    "rp01causaretiro": "off",
    "rp01direccion": "off",
    "rp01telefono": "off",
    "rp01lugarnacimiento": "off",
    "rp01fechanacimiento": "off",
    "rp01nacionalidad": "off",
    "rp01cedula": "off",
    "rp01noiess": "off",
    "rp01sexo": "off",
    "rp01nolibreta": "off",
    "rp01profesion": "off",
    "rp01fechaingreso": "off",
    "rp01fechareingreso": "off",
    "rp01cargo": "off",
    "rp01estadocivil": "off",
    "rp01rebajaxcasado": "off",
    "rp01nombreconyuge": "off",
    "rp01nombrepadre": "off",
    "rp01nombremadre": "off",
    "rp01nohijos": "off",
    "rp01fechahijos0": "off",
    "rp01sexohijos0": "off",
    "rp01fechahijos1": "off",
    "rp01sexohijos1": "off",
    "rp01fechahijos2": "off",
    "rp01sexohijos2": "off",
    "rp01fechahijos3": "off",
    "rp01sexohijos3": "off",
    "rp01fechahijos4": "off",
    "rp01sexohijos4": "off",
    "rp01fechahijos5": "off",
    "rp01sexohijos5": "off",
    "rp01fechahijos6": "off",
    "rp01sexohijos6": "off",
    "rp01fechahijos7": "off",
    "rp01sexohijos7": "off",
    "rp01fechahijos8": "off",
    "rp01sexohijos8": "off",
    "rp01fechahijos9": "off",
    "rp01sexohijos9": "off",
    "rp01cargaspadres": "off",
    "rp01otrascargas": "off",
    "rp01formapago": "off",
    "rp01nobancoemp": "off",
    "rp01ctabancoemp": "off",
    "rp01tipoctabco": "off",
    "rp01fechaultvacacion": "off",
    "rp01aporte": "off",
    "rp01socio": "off",
    "rp01transporte": "off",
    "rp01recibeporc": "off",
    "rp01sueldoanterior": "off",
    "rp01sueldosalario": "off",
    "rp01fecmodsdosal": "off",
    "rp01fecmodficha": "off",
    "rp01faltasinjust": "off",
    "rp01ingresos1er": "off",
    "rp01basesocialvalor": "off",
    "rp01basesocialtiempo": "off",
    "rp0114vopagoacum": "off",
    "rp0115vopagoacum": "off",
    "rp01cverrorliq": "off",
    "rp01porcentliq": "off",
    "rp01tiposangre": "off",
    "rp01ingresos2do": "off",
    "rp01provdiremp": "off",
    "rp01cantondiremp": "off",
    "rp01ciudaddiremp": "off",
    "rp01codocupacion": "off",
    "uid": "off",
    "block": "off",
    "ultimoacceso": "off",
    "rp01foto": "off",
    "rp01ctacontable": "off",
    "rp01email": "off",
    "rp01passwd": "off",
    "rp01huella": "off",
    "rp01recibefr": "off",
    "rp01recibedt": "off",
    "rp01recibedc": "off",
    "rp01uid": "off",
    "rp01fechauid": "off",
    "rp01obs": "off",
    "rp01cauliq": "off",
    "rp01discapacidad": "off",
    "rp01conadis": "off",
    "rp01tpdiscapacidad": "off",
    "rp01prdiscapacidad": "off",
    "rp01freserva": "off",
    "rp01codsectorial": "off",
    "anticipoporvalor": "off",
    "tipidret": "off",
    "residenciatrab": "off",
    "paisresidencia": "off",
    "aplicaconvenio": "off",
    "tipotrabajdiscap": "off",
    "porcentajediscap": "off",
    "tipiddiscap": "off",
    "iddiscap": "off",
    "rp01varias_secciones": "off",
    "rp01cc": "off",
    "rp01observacion": "off",
    "rp01iessconyugue": "off",
    "rp01tiporefrigerio": "off",
    "idiomas": "off",
    "emergencias": "off",
    "rp01tipojornada": "off",
    "rp01numero_horas": "off",
    "rp01emailpersonal": "off",
    "rp01supervisadopor": "off",
    "rp01zonaderiesgo": "off",
    "rp01refpersnom1": "off",
    "rp01refpersparen1": "off",
    "rp01refperstel1": "off",
    "rp01refpersnom2": "off",
    "rp01refpersparen2": "off",
    "rp01refperstel2": "off",
    "rp01tipovivienda": "off",
    "rp01serviciosbasicos": "off",
    "rp01viviendadetalle": "off",
    "rp01dormitorios": "off",
    "rp01sala": "off",
    "rp01comedor": "off",
    "rp01banos": "off",
    "rp01estudiosrealizados": "off",
    "rp01ruta1": "off",
    "rp01ruta2": "off",
    "rp01ruta3": "off",
    "rp01actividadesextras": "off"
  };
  var bRefreshTable = false;
  function scRefreshTable()
  {
    return false;
  }

  function scAjaxDetailValue(sIndex, sValue)
  {
    var aValue = new Array();
    aValue[0] = {"value" : sValue};
    if ("rp01noemp" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("rp01division" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("rp01depto" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("rp01seccion" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("rp01noemp1" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("rp01nombreemp" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("rp01categoria" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("rp01turno" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("rp01statusemp" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("rp01fechastatus" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("rp01causaretiro" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("rp01direccion" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("rp01telefono" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("rp01lugarnacimiento" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("rp01fechanacimiento" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("rp01nacionalidad" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("rp01cedula" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("rp01noiess" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("rp01sexo" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("rp01nolibreta" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("rp01profesion" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("rp01fechaingreso" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("rp01fechareingreso" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("rp01cargo" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("rp01estadocivil" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("rp01rebajaxcasado" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("rp01nombreconyuge" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("rp01nombrepadre" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("rp01nombremadre" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("rp01nohijos" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("rp01fechahijos0" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("rp01sexohijos0" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("rp01fechahijos1" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("rp01sexohijos1" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("rp01fechahijos2" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("rp01sexohijos2" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("rp01fechahijos3" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("rp01sexohijos3" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("rp01fechahijos4" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("rp01sexohijos4" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("rp01fechahijos5" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("rp01sexohijos5" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("rp01fechahijos6" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("rp01sexohijos6" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("rp01fechahijos7" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("rp01sexohijos7" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("rp01fechahijos8" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("rp01sexohijos8" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("rp01fechahijos9" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("rp01sexohijos9" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("rp01cargaspadres" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("rp01otrascargas" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("rp01formapago" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("rp01nobancoemp" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("rp01ctabancoemp" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("rp01tipoctabco" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("rp01fechaultvacacion" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("rp01aporte" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("rp01socio" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("rp01transporte" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("rp01recibeporc" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("rp01sueldoanterior" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("rp01sueldosalario" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("rp01fecmodsdosal" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("rp01fecmodficha" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("rp01faltasinjust" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("rp01ingresos1er" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("rp01basesocialvalor" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("rp01basesocialtiempo" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("rp0114vopagoacum" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("rp0115vopagoacum" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("rp01cverrorliq" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("rp01porcentliq" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("rp01tiposangre" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("rp01ingresos2do" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("rp01provdiremp" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("rp01cantondiremp" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("rp01ciudaddiremp" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("rp01codocupacion" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("uid" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("block" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("ultimoacceso" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("rp01foto" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("rp01ctacontable" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("rp01email" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("rp01passwd" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("rp01huella" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("rp01recibefr" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("rp01recibedt" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("rp01recibedc" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("rp01uid" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("rp01fechauid" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("rp01obs" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("rp01cauliq" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("rp01discapacidad" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("rp01conadis" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("rp01tpdiscapacidad" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("rp01prdiscapacidad" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("rp01freserva" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("rp01codsectorial" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("anticipoporvalor" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("tipidret" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("residenciatrab" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("paisresidencia" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("aplicaconvenio" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("tipotrabajdiscap" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("porcentajediscap" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("tipiddiscap" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("iddiscap" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("rp01varias_secciones" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("rp01cc" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("rp01observacion" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("rp01iessconyugue" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("rp01tiporefrigerio" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("idiomas" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("emergencias" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("rp01tipojornada" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("rp01numero_horas" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("rp01emailpersonal" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("rp01supervisadopor" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("rp01zonaderiesgo" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("rp01refpersnom1" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("rp01refpersparen1" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("rp01refperstel1" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("rp01refpersnom2" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("rp01refpersparen2" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("rp01refperstel2" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("rp01tipovivienda" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("rp01serviciosbasicos" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("rp01viviendadetalle" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("rp01dormitorios" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("rp01sala" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("rp01comedor" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("rp01banos" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("rp01estudiosrealizados" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("rp01ruta1" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("rp01ruta2" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("rp01ruta3" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("rp01actividadesextras" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    scAjaxSetFieldInnerHtml(sIndex, aValue);
  }
 </SCRIPT>
