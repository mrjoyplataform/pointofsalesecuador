
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
        if ("geral_form_maepro" == sTestField)
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
        sc_hide_form_maepro_form();
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

  // ---------- Validate codprod01
  function do_ajax_form_maepro_validate_codprod01()
  {
    var nomeCampo_codprod01 = "codprod01";
    var var_codprod01 = scAjaxGetFieldText(nomeCampo_codprod01);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maepro_validate_codprod01(var_codprod01, var_script_case_init, do_ajax_form_maepro_validate_codprod01_cb);
  } // do_ajax_form_maepro_validate_codprod01

  function do_ajax_form_maepro_validate_codprod01_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "codprod01";
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
  } // do_ajax_form_maepro_validate_codprod01_cb

  // ---------- Validate desprod01
  function do_ajax_form_maepro_validate_desprod01()
  {
    var nomeCampo_desprod01 = "desprod01";
    var var_desprod01 = scAjaxGetFieldText(nomeCampo_desprod01);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maepro_validate_desprod01(var_desprod01, var_script_case_init, do_ajax_form_maepro_validate_desprod01_cb);
  } // do_ajax_form_maepro_validate_desprod01

  function do_ajax_form_maepro_validate_desprod01_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "desprod01";
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
  } // do_ajax_form_maepro_validate_desprod01_cb

  // ---------- Validate cve101
  function do_ajax_form_maepro_validate_cve101()
  {
    var nomeCampo_cve101 = "cve101";
    var var_cve101 = scAjaxGetFieldText(nomeCampo_cve101);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maepro_validate_cve101(var_cve101, var_script_case_init, do_ajax_form_maepro_validate_cve101_cb);
  } // do_ajax_form_maepro_validate_cve101

  function do_ajax_form_maepro_validate_cve101_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "cve101";
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
  } // do_ajax_form_maepro_validate_cve101_cb

  // ---------- Validate cve201
  function do_ajax_form_maepro_validate_cve201()
  {
    var nomeCampo_cve201 = "cve201";
    var var_cve201 = scAjaxGetFieldText(nomeCampo_cve201);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maepro_validate_cve201(var_cve201, var_script_case_init, do_ajax_form_maepro_validate_cve201_cb);
  } // do_ajax_form_maepro_validate_cve201

  function do_ajax_form_maepro_validate_cve201_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "cve201";
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
  } // do_ajax_form_maepro_validate_cve201_cb

  // ---------- Validate unidmed01
  function do_ajax_form_maepro_validate_unidmed01()
  {
    var nomeCampo_unidmed01 = "unidmed01";
    var var_unidmed01 = scAjaxGetFieldText(nomeCampo_unidmed01);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maepro_validate_unidmed01(var_unidmed01, var_script_case_init, do_ajax_form_maepro_validate_unidmed01_cb);
  } // do_ajax_form_maepro_validate_unidmed01

  function do_ajax_form_maepro_validate_unidmed01_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "unidmed01";
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
  } // do_ajax_form_maepro_validate_unidmed01_cb

  // ---------- Validate cantmin01
  function do_ajax_form_maepro_validate_cantmin01()
  {
    var nomeCampo_cantmin01 = "cantmin01";
    var var_cantmin01 = scAjaxGetFieldText(nomeCampo_cantmin01);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maepro_validate_cantmin01(var_cantmin01, var_script_case_init, do_ajax_form_maepro_validate_cantmin01_cb);
  } // do_ajax_form_maepro_validate_cantmin01

  function do_ajax_form_maepro_validate_cantmin01_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "cantmin01";
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
  } // do_ajax_form_maepro_validate_cantmin01_cb

  // ---------- Validate cantact01
  function do_ajax_form_maepro_validate_cantact01()
  {
    var nomeCampo_cantact01 = "cantact01";
    var var_cantact01 = scAjaxGetFieldText(nomeCampo_cantact01);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maepro_validate_cantact01(var_cantact01, var_script_case_init, do_ajax_form_maepro_validate_cantact01_cb);
  } // do_ajax_form_maepro_validate_cantact01

  function do_ajax_form_maepro_validate_cantact01_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "cantact01";
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
  } // do_ajax_form_maepro_validate_cantact01_cb

  // ---------- Validate valact01
  function do_ajax_form_maepro_validate_valact01()
  {
    var nomeCampo_valact01 = "valact01";
    var var_valact01 = scAjaxGetFieldText(nomeCampo_valact01);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maepro_validate_valact01(var_valact01, var_script_case_init, do_ajax_form_maepro_validate_valact01_cb);
  } // do_ajax_form_maepro_validate_valact01

  function do_ajax_form_maepro_validate_valact01_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "valact01";
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
  } // do_ajax_form_maepro_validate_valact01_cb

  // ---------- Validate exipromo01
  function do_ajax_form_maepro_validate_exipromo01()
  {
    var nomeCampo_exipromo01 = "exipromo01";
    var var_exipromo01 = scAjaxGetFieldText(nomeCampo_exipromo01);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maepro_validate_exipromo01(var_exipromo01, var_script_case_init, do_ajax_form_maepro_validate_exipromo01_cb);
  } // do_ajax_form_maepro_validate_exipromo01

  function do_ajax_form_maepro_validate_exipromo01_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "exipromo01";
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
  } // do_ajax_form_maepro_validate_exipromo01_cb

  // ---------- Validate precuni01
  function do_ajax_form_maepro_validate_precuni01()
  {
    var nomeCampo_precuni01 = "precuni01";
    var var_precuni01 = scAjaxGetFieldText(nomeCampo_precuni01);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maepro_validate_precuni01(var_precuni01, var_script_case_init, do_ajax_form_maepro_validate_precuni01_cb);
  } // do_ajax_form_maepro_validate_precuni01

  function do_ajax_form_maepro_validate_precuni01_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "precuni01";
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
  } // do_ajax_form_maepro_validate_precuni01_cb

  // ---------- Validate pedpend01
  function do_ajax_form_maepro_validate_pedpend01()
  {
    var nomeCampo_pedpend01 = "pedpend01";
    var var_pedpend01 = scAjaxGetFieldText(nomeCampo_pedpend01);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maepro_validate_pedpend01(var_pedpend01, var_script_case_init, do_ajax_form_maepro_validate_pedpend01_cb);
  } // do_ajax_form_maepro_validate_pedpend01

  function do_ajax_form_maepro_validate_pedpend01_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "pedpend01";
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
  } // do_ajax_form_maepro_validate_pedpend01_cb

  // ---------- Validate orden01
  function do_ajax_form_maepro_validate_orden01()
  {
    var nomeCampo_orden01 = "orden01";
    var var_orden01 = scAjaxGetFieldText(nomeCampo_orden01);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maepro_validate_orden01(var_orden01, var_script_case_init, do_ajax_form_maepro_validate_orden01_cb);
  } // do_ajax_form_maepro_validate_orden01

  function do_ajax_form_maepro_validate_orden01_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "orden01";
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
  } // do_ajax_form_maepro_validate_orden01_cb

  // ---------- Validate refer01
  function do_ajax_form_maepro_validate_refer01()
  {
    var nomeCampo_refer01 = "refer01";
    var var_refer01 = scAjaxGetFieldText(nomeCampo_refer01);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maepro_validate_refer01(var_refer01, var_script_case_init, do_ajax_form_maepro_validate_refer01_cb);
  } // do_ajax_form_maepro_validate_refer01

  function do_ajax_form_maepro_validate_refer01_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "refer01";
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
  } // do_ajax_form_maepro_validate_refer01_cb

  // ---------- Validate canentm01
  function do_ajax_form_maepro_validate_canentm01()
  {
    var nomeCampo_canentm01 = "canentm01";
    var var_canentm01 = scAjaxGetFieldText(nomeCampo_canentm01);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maepro_validate_canentm01(var_canentm01, var_script_case_init, do_ajax_form_maepro_validate_canentm01_cb);
  } // do_ajax_form_maepro_validate_canentm01

  function do_ajax_form_maepro_validate_canentm01_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "canentm01";
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
  } // do_ajax_form_maepro_validate_canentm01_cb

  // ---------- Validate valentm01
  function do_ajax_form_maepro_validate_valentm01()
  {
    var nomeCampo_valentm01 = "valentm01";
    var var_valentm01 = scAjaxGetFieldText(nomeCampo_valentm01);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maepro_validate_valentm01(var_valentm01, var_script_case_init, do_ajax_form_maepro_validate_valentm01_cb);
  } // do_ajax_form_maepro_validate_valentm01

  function do_ajax_form_maepro_validate_valentm01_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "valentm01";
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
  } // do_ajax_form_maepro_validate_valentm01_cb

  // ---------- Validate cansalm01
  function do_ajax_form_maepro_validate_cansalm01()
  {
    var nomeCampo_cansalm01 = "cansalm01";
    var var_cansalm01 = scAjaxGetFieldText(nomeCampo_cansalm01);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maepro_validate_cansalm01(var_cansalm01, var_script_case_init, do_ajax_form_maepro_validate_cansalm01_cb);
  } // do_ajax_form_maepro_validate_cansalm01

  function do_ajax_form_maepro_validate_cansalm01_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "cansalm01";
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
  } // do_ajax_form_maepro_validate_cansalm01_cb

  // ---------- Validate valsalm01
  function do_ajax_form_maepro_validate_valsalm01()
  {
    var nomeCampo_valsalm01 = "valsalm01";
    var var_valsalm01 = scAjaxGetFieldText(nomeCampo_valsalm01);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maepro_validate_valsalm01(var_valsalm01, var_script_case_init, do_ajax_form_maepro_validate_valsalm01_cb);
  } // do_ajax_form_maepro_validate_valsalm01

  function do_ajax_form_maepro_validate_valsalm01_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "valsalm01";
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
  } // do_ajax_form_maepro_validate_valsalm01_cb

  // ---------- Validate canenta01
  function do_ajax_form_maepro_validate_canenta01()
  {
    var nomeCampo_canenta01 = "canenta01";
    var var_canenta01 = scAjaxGetFieldText(nomeCampo_canenta01);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maepro_validate_canenta01(var_canenta01, var_script_case_init, do_ajax_form_maepro_validate_canenta01_cb);
  } // do_ajax_form_maepro_validate_canenta01

  function do_ajax_form_maepro_validate_canenta01_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "canenta01";
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
  } // do_ajax_form_maepro_validate_canenta01_cb

  // ---------- Validate valenta01
  function do_ajax_form_maepro_validate_valenta01()
  {
    var nomeCampo_valenta01 = "valenta01";
    var var_valenta01 = scAjaxGetFieldText(nomeCampo_valenta01);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maepro_validate_valenta01(var_valenta01, var_script_case_init, do_ajax_form_maepro_validate_valenta01_cb);
  } // do_ajax_form_maepro_validate_valenta01

  function do_ajax_form_maepro_validate_valenta01_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "valenta01";
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
  } // do_ajax_form_maepro_validate_valenta01_cb

  // ---------- Validate cansala01
  function do_ajax_form_maepro_validate_cansala01()
  {
    var nomeCampo_cansala01 = "cansala01";
    var var_cansala01 = scAjaxGetFieldText(nomeCampo_cansala01);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maepro_validate_cansala01(var_cansala01, var_script_case_init, do_ajax_form_maepro_validate_cansala01_cb);
  } // do_ajax_form_maepro_validate_cansala01

  function do_ajax_form_maepro_validate_cansala01_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "cansala01";
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
  } // do_ajax_form_maepro_validate_cansala01_cb

  // ---------- Validate valsala01
  function do_ajax_form_maepro_validate_valsala01()
  {
    var nomeCampo_valsala01 = "valsala01";
    var var_valsala01 = scAjaxGetFieldText(nomeCampo_valsala01);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maepro_validate_valsala01(var_valsala01, var_script_case_init, do_ajax_form_maepro_validate_valsala01_cb);
  } // do_ajax_form_maepro_validate_valsala01

  function do_ajax_form_maepro_validate_valsala01_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "valsala01";
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
  } // do_ajax_form_maepro_validate_valsala01_cb

  // ---------- Validate fecape01
  function do_ajax_form_maepro_validate_fecape01()
  {
    var nomeCampo_fecape01 = "fecape01";
    var var_fecape01 = scAjaxGetFieldText(nomeCampo_fecape01);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maepro_validate_fecape01(var_fecape01, var_script_case_init, do_ajax_form_maepro_validate_fecape01_cb);
  } // do_ajax_form_maepro_validate_fecape01

  function do_ajax_form_maepro_validate_fecape01_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "fecape01";
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
  } // do_ajax_form_maepro_validate_fecape01_cb

  // ---------- Validate fecult01
  function do_ajax_form_maepro_validate_fecult01()
  {
    var nomeCampo_fecult01 = "fecult01";
    var var_fecult01 = scAjaxGetFieldText(nomeCampo_fecult01);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maepro_validate_fecult01(var_fecult01, var_script_case_init, do_ajax_form_maepro_validate_fecult01_cb);
  } // do_ajax_form_maepro_validate_fecult01

  function do_ajax_form_maepro_validate_fecult01_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "fecult01";
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
  } // do_ajax_form_maepro_validate_fecult01_cb

  // ---------- Validate fecvta01
  function do_ajax_form_maepro_validate_fecvta01()
  {
    var nomeCampo_fecvta01 = "fecvta01";
    var var_fecvta01 = scAjaxGetFieldText(nomeCampo_fecvta01);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maepro_validate_fecvta01(var_fecvta01, var_script_case_init, do_ajax_form_maepro_validate_fecvta01_cb);
  } // do_ajax_form_maepro_validate_fecvta01

  function do_ajax_form_maepro_validate_fecvta01_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "fecvta01";
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
  } // do_ajax_form_maepro_validate_fecvta01_cb

  // ---------- Validate ubic01
  function do_ajax_form_maepro_validate_ubic01()
  {
    var nomeCampo_ubic01 = "ubic01";
    var var_ubic01 = scAjaxGetFieldText(nomeCampo_ubic01);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maepro_validate_ubic01(var_ubic01, var_script_case_init, do_ajax_form_maepro_validate_ubic01_cb);
  } // do_ajax_form_maepro_validate_ubic01

  function do_ajax_form_maepro_validate_ubic01_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "ubic01";
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
  } // do_ajax_form_maepro_validate_ubic01_cb

  // ---------- Validate precvta01
  function do_ajax_form_maepro_validate_precvta01()
  {
    var nomeCampo_precvta01 = "precvta01";
    var var_precvta01 = scAjaxGetFieldText(nomeCampo_precvta01);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maepro_validate_precvta01(var_precvta01, var_script_case_init, do_ajax_form_maepro_validate_precvta01_cb);
  } // do_ajax_form_maepro_validate_precvta01

  function do_ajax_form_maepro_validate_precvta01_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "precvta01";
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
  } // do_ajax_form_maepro_validate_precvta01_cb

  // ---------- Validate descto101
  function do_ajax_form_maepro_validate_descto101()
  {
    var nomeCampo_descto101 = "descto101";
    var var_descto101 = scAjaxGetFieldText(nomeCampo_descto101);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maepro_validate_descto101(var_descto101, var_script_case_init, do_ajax_form_maepro_validate_descto101_cb);
  } // do_ajax_form_maepro_validate_descto101

  function do_ajax_form_maepro_validate_descto101_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "descto101";
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
  } // do_ajax_form_maepro_validate_descto101_cb

  // ---------- Validate precio201
  function do_ajax_form_maepro_validate_precio201()
  {
    var nomeCampo_precio201 = "precio201";
    var var_precio201 = scAjaxGetFieldText(nomeCampo_precio201);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maepro_validate_precio201(var_precio201, var_script_case_init, do_ajax_form_maepro_validate_precio201_cb);
  } // do_ajax_form_maepro_validate_precio201

  function do_ajax_form_maepro_validate_precio201_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "precio201";
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
  } // do_ajax_form_maepro_validate_precio201_cb

  // ---------- Validate descto201
  function do_ajax_form_maepro_validate_descto201()
  {
    var nomeCampo_descto201 = "descto201";
    var var_descto201 = scAjaxGetFieldText(nomeCampo_descto201);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maepro_validate_descto201(var_descto201, var_script_case_init, do_ajax_form_maepro_validate_descto201_cb);
  } // do_ajax_form_maepro_validate_descto201

  function do_ajax_form_maepro_validate_descto201_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "descto201";
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
  } // do_ajax_form_maepro_validate_descto201_cb

  // ---------- Validate precio301
  function do_ajax_form_maepro_validate_precio301()
  {
    var nomeCampo_precio301 = "precio301";
    var var_precio301 = scAjaxGetFieldText(nomeCampo_precio301);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maepro_validate_precio301(var_precio301, var_script_case_init, do_ajax_form_maepro_validate_precio301_cb);
  } // do_ajax_form_maepro_validate_precio301

  function do_ajax_form_maepro_validate_precio301_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "precio301";
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
  } // do_ajax_form_maepro_validate_precio301_cb

  // ---------- Validate descto301
  function do_ajax_form_maepro_validate_descto301()
  {
    var nomeCampo_descto301 = "descto301";
    var var_descto301 = scAjaxGetFieldText(nomeCampo_descto301);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maepro_validate_descto301(var_descto301, var_script_case_init, do_ajax_form_maepro_validate_descto301_cb);
  } // do_ajax_form_maepro_validate_descto301

  function do_ajax_form_maepro_validate_descto301_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "descto301";
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
  } // do_ajax_form_maepro_validate_descto301_cb

  // ---------- Validate canvtam01
  function do_ajax_form_maepro_validate_canvtam01()
  {
    var nomeCampo_canvtam01 = "canvtam01";
    var var_canvtam01 = scAjaxGetFieldText(nomeCampo_canvtam01);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maepro_validate_canvtam01(var_canvtam01, var_script_case_init, do_ajax_form_maepro_validate_canvtam01_cb);
  } // do_ajax_form_maepro_validate_canvtam01

  function do_ajax_form_maepro_validate_canvtam01_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "canvtam01";
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
  } // do_ajax_form_maepro_validate_canvtam01_cb

  // ---------- Validate valvtam01
  function do_ajax_form_maepro_validate_valvtam01()
  {
    var nomeCampo_valvtam01 = "valvtam01";
    var var_valvtam01 = scAjaxGetFieldText(nomeCampo_valvtam01);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maepro_validate_valvtam01(var_valvtam01, var_script_case_init, do_ajax_form_maepro_validate_valvtam01_cb);
  } // do_ajax_form_maepro_validate_valvtam01

  function do_ajax_form_maepro_validate_valvtam01_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "valvtam01";
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
  } // do_ajax_form_maepro_validate_valvtam01_cb

  // ---------- Validate cosvtam01
  function do_ajax_form_maepro_validate_cosvtam01()
  {
    var nomeCampo_cosvtam01 = "cosvtam01";
    var var_cosvtam01 = scAjaxGetFieldText(nomeCampo_cosvtam01);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maepro_validate_cosvtam01(var_cosvtam01, var_script_case_init, do_ajax_form_maepro_validate_cosvtam01_cb);
  } // do_ajax_form_maepro_validate_cosvtam01

  function do_ajax_form_maepro_validate_cosvtam01_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "cosvtam01";
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
  } // do_ajax_form_maepro_validate_cosvtam01_cb

  // ---------- Validate canvtaa01
  function do_ajax_form_maepro_validate_canvtaa01()
  {
    var nomeCampo_canvtaa01 = "canvtaa01";
    var var_canvtaa01 = scAjaxGetFieldText(nomeCampo_canvtaa01);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maepro_validate_canvtaa01(var_canvtaa01, var_script_case_init, do_ajax_form_maepro_validate_canvtaa01_cb);
  } // do_ajax_form_maepro_validate_canvtaa01

  function do_ajax_form_maepro_validate_canvtaa01_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "canvtaa01";
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
  } // do_ajax_form_maepro_validate_canvtaa01_cb

  // ---------- Validate valvtaa01
  function do_ajax_form_maepro_validate_valvtaa01()
  {
    var nomeCampo_valvtaa01 = "valvtaa01";
    var var_valvtaa01 = scAjaxGetFieldText(nomeCampo_valvtaa01);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maepro_validate_valvtaa01(var_valvtaa01, var_script_case_init, do_ajax_form_maepro_validate_valvtaa01_cb);
  } // do_ajax_form_maepro_validate_valvtaa01

  function do_ajax_form_maepro_validate_valvtaa01_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "valvtaa01";
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
  } // do_ajax_form_maepro_validate_valvtaa01_cb

  // ---------- Validate cosvtaa01
  function do_ajax_form_maepro_validate_cosvtaa01()
  {
    var nomeCampo_cosvtaa01 = "cosvtaa01";
    var var_cosvtaa01 = scAjaxGetFieldText(nomeCampo_cosvtaa01);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maepro_validate_cosvtaa01(var_cosvtaa01, var_script_case_init, do_ajax_form_maepro_validate_cosvtaa01_cb);
  } // do_ajax_form_maepro_validate_cosvtaa01

  function do_ajax_form_maepro_validate_cosvtaa01_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "cosvtaa01";
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
  } // do_ajax_form_maepro_validate_cosvtaa01_cb

  // ---------- Validate prod1alt01
  function do_ajax_form_maepro_validate_prod1alt01()
  {
    var nomeCampo_prod1alt01 = "prod1alt01";
    var var_prod1alt01 = scAjaxGetFieldText(nomeCampo_prod1alt01);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maepro_validate_prod1alt01(var_prod1alt01, var_script_case_init, do_ajax_form_maepro_validate_prod1alt01_cb);
  } // do_ajax_form_maepro_validate_prod1alt01

  function do_ajax_form_maepro_validate_prod1alt01_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "prod1alt01";
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
  } // do_ajax_form_maepro_validate_prod1alt01_cb

  // ---------- Validate prod2alt01
  function do_ajax_form_maepro_validate_prod2alt01()
  {
    var nomeCampo_prod2alt01 = "prod2alt01";
    var var_prod2alt01 = scAjaxGetFieldText(nomeCampo_prod2alt01);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maepro_validate_prod2alt01(var_prod2alt01, var_script_case_init, do_ajax_form_maepro_validate_prod2alt01_cb);
  } // do_ajax_form_maepro_validate_prod2alt01

  function do_ajax_form_maepro_validate_prod2alt01_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "prod2alt01";
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
  } // do_ajax_form_maepro_validate_prod2alt01_cb

  // ---------- Validate proved101
  function do_ajax_form_maepro_validate_proved101()
  {
    var nomeCampo_proved101 = "proved101";
    var var_proved101 = scAjaxGetFieldText(nomeCampo_proved101);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maepro_validate_proved101(var_proved101, var_script_case_init, do_ajax_form_maepro_validate_proved101_cb);
  } // do_ajax_form_maepro_validate_proved101

  function do_ajax_form_maepro_validate_proved101_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "proved101";
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
  } // do_ajax_form_maepro_validate_proved101_cb

  // ---------- Validate proved201
  function do_ajax_form_maepro_validate_proved201()
  {
    var nomeCampo_proved201 = "proved201";
    var var_proved201 = scAjaxGetFieldText(nomeCampo_proved201);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maepro_validate_proved201(var_proved201, var_script_case_init, do_ajax_form_maepro_validate_proved201_cb);
  } // do_ajax_form_maepro_validate_proved201

  function do_ajax_form_maepro_validate_proved201_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "proved201";
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
  } // do_ajax_form_maepro_validate_proved201_cb

  // ---------- Validate med101
  function do_ajax_form_maepro_validate_med101()
  {
    var nomeCampo_med101 = "med101";
    var var_med101 = scAjaxGetFieldText(nomeCampo_med101);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maepro_validate_med101(var_med101, var_script_case_init, do_ajax_form_maepro_validate_med101_cb);
  } // do_ajax_form_maepro_validate_med101

  function do_ajax_form_maepro_validate_med101_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "med101";
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
  } // do_ajax_form_maepro_validate_med101_cb

  // ---------- Validate med201
  function do_ajax_form_maepro_validate_med201()
  {
    var nomeCampo_med201 = "med201";
    var var_med201 = scAjaxGetFieldText(nomeCampo_med201);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maepro_validate_med201(var_med201, var_script_case_init, do_ajax_form_maepro_validate_med201_cb);
  } // do_ajax_form_maepro_validate_med201

  function do_ajax_form_maepro_validate_med201_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "med201";
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
  } // do_ajax_form_maepro_validate_med201_cb

  // ---------- Validate med301
  function do_ajax_form_maepro_validate_med301()
  {
    var nomeCampo_med301 = "med301";
    var var_med301 = scAjaxGetFieldText(nomeCampo_med301);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maepro_validate_med301(var_med301, var_script_case_init, do_ajax_form_maepro_validate_med301_cb);
  } // do_ajax_form_maepro_validate_med301

  function do_ajax_form_maepro_validate_med301_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "med301";
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
  } // do_ajax_form_maepro_validate_med301_cb

  // ---------- Validate factor01
  function do_ajax_form_maepro_validate_factor01()
  {
    var nomeCampo_factor01 = "factor01";
    var var_factor01 = scAjaxGetFieldText(nomeCampo_factor01);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maepro_validate_factor01(var_factor01, var_script_case_init, do_ajax_form_maepro_validate_factor01_cb);
  } // do_ajax_form_maepro_validate_factor01

  function do_ajax_form_maepro_validate_factor01_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "factor01";
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
  } // do_ajax_form_maepro_validate_factor01_cb

  // ---------- Validate cvserie01
  function do_ajax_form_maepro_validate_cvserie01()
  {
    var nomeCampo_cvserie01 = "cvserie01";
    var var_cvserie01 = scAjaxGetFieldText(nomeCampo_cvserie01);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maepro_validate_cvserie01(var_cvserie01, var_script_case_init, do_ajax_form_maepro_validate_cvserie01_cb);
  } // do_ajax_form_maepro_validate_cvserie01

  function do_ajax_form_maepro_validate_cvserie01_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "cvserie01";
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
  } // do_ajax_form_maepro_validate_cvserie01_cb

  // ---------- Validate ctain101
  function do_ajax_form_maepro_validate_ctain101()
  {
    var nomeCampo_ctain101 = "ctain101";
    var var_ctain101 = scAjaxGetFieldText(nomeCampo_ctain101);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maepro_validate_ctain101(var_ctain101, var_script_case_init, do_ajax_form_maepro_validate_ctain101_cb);
  } // do_ajax_form_maepro_validate_ctain101

  function do_ajax_form_maepro_validate_ctain101_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "ctain101";
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
  } // do_ajax_form_maepro_validate_ctain101_cb

  // ---------- Validate ctain201
  function do_ajax_form_maepro_validate_ctain201()
  {
    var nomeCampo_ctain201 = "ctain201";
    var var_ctain201 = scAjaxGetFieldText(nomeCampo_ctain201);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maepro_validate_ctain201(var_ctain201, var_script_case_init, do_ajax_form_maepro_validate_ctain201_cb);
  } // do_ajax_form_maepro_validate_ctain201

  function do_ajax_form_maepro_validate_ctain201_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "ctain201";
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
  } // do_ajax_form_maepro_validate_ctain201_cb

  // ---------- Validate ctain301
  function do_ajax_form_maepro_validate_ctain301()
  {
    var nomeCampo_ctain301 = "ctain301";
    var var_ctain301 = scAjaxGetFieldText(nomeCampo_ctain301);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maepro_validate_ctain301(var_ctain301, var_script_case_init, do_ajax_form_maepro_validate_ctain301_cb);
  } // do_ajax_form_maepro_validate_ctain301

  function do_ajax_form_maepro_validate_ctain301_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "ctain301";
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
  } // do_ajax_form_maepro_validate_ctain301_cb

  // ---------- Validate porciva01
  function do_ajax_form_maepro_validate_porciva01()
  {
    var nomeCampo_porciva01 = "porciva01";
    var var_porciva01 = scAjaxGetFieldText(nomeCampo_porciva01);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maepro_validate_porciva01(var_porciva01, var_script_case_init, do_ajax_form_maepro_validate_porciva01_cb);
  } // do_ajax_form_maepro_validate_porciva01

  function do_ajax_form_maepro_validate_porciva01_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "porciva01";
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
  } // do_ajax_form_maepro_validate_porciva01_cb

  // ---------- Validate prodsinsdo01
  function do_ajax_form_maepro_validate_prodsinsdo01()
  {
    var nomeCampo_prodsinsdo01 = "prodsinsdo01";
    var var_prodsinsdo01 = scAjaxGetFieldText(nomeCampo_prodsinsdo01);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maepro_validate_prodsinsdo01(var_prodsinsdo01, var_script_case_init, do_ajax_form_maepro_validate_prodsinsdo01_cb);
  } // do_ajax_form_maepro_validate_prodsinsdo01

  function do_ajax_form_maepro_validate_prodsinsdo01_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "prodsinsdo01";
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
  } // do_ajax_form_maepro_validate_prodsinsdo01_cb

  // ---------- Validate sinprec01
  function do_ajax_form_maepro_validate_sinprec01()
  {
    var nomeCampo_sinprec01 = "sinprec01";
    var var_sinprec01 = scAjaxGetFieldText(nomeCampo_sinprec01);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maepro_validate_sinprec01(var_sinprec01, var_script_case_init, do_ajax_form_maepro_validate_sinprec01_cb);
  } // do_ajax_form_maepro_validate_sinprec01

  function do_ajax_form_maepro_validate_sinprec01_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "sinprec01";
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
  } // do_ajax_form_maepro_validate_sinprec01_cb

  // ---------- Validate fotoprod01
  function do_ajax_form_maepro_validate_fotoprod01()
  {
    var nomeCampo_fotoprod01 = "fotoprod01";
    var var_fotoprod01 = scAjaxGetFieldText(nomeCampo_fotoprod01);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maepro_validate_fotoprod01(var_fotoprod01, var_script_case_init, do_ajax_form_maepro_validate_fotoprod01_cb);
  } // do_ajax_form_maepro_validate_fotoprod01

  function do_ajax_form_maepro_validate_fotoprod01_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "fotoprod01";
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
  } // do_ajax_form_maepro_validate_fotoprod01_cb

  // ---------- Validate detprod01
  function do_ajax_form_maepro_validate_detprod01()
  {
    var nomeCampo_detprod01 = "detprod01";
    var var_detprod01 = scAjaxGetFieldText(nomeCampo_detprod01);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maepro_validate_detprod01(var_detprod01, var_script_case_init, do_ajax_form_maepro_validate_detprod01_cb);
  } // do_ajax_form_maepro_validate_detprod01

  function do_ajax_form_maepro_validate_detprod01_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "detprod01";
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
  } // do_ajax_form_maepro_validate_detprod01_cb

  // ---------- Validate block
  function do_ajax_form_maepro_validate_block()
  {
    var nomeCampo_block = "block";
    var var_block = scAjaxGetFieldText(nomeCampo_block);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maepro_validate_block(var_block, var_script_case_init, do_ajax_form_maepro_validate_block_cb);
  } // do_ajax_form_maepro_validate_block

  function do_ajax_form_maepro_validate_block_cb(sResp)
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
  } // do_ajax_form_maepro_validate_block_cb

  // ---------- Validate uid
  function do_ajax_form_maepro_validate_uid()
  {
    var nomeCampo_uid = "uid";
    var var_uid = scAjaxGetFieldText(nomeCampo_uid);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maepro_validate_uid(var_uid, var_script_case_init, do_ajax_form_maepro_validate_uid_cb);
  } // do_ajax_form_maepro_validate_uid

  function do_ajax_form_maepro_validate_uid_cb(sResp)
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
  } // do_ajax_form_maepro_validate_uid_cb

  // ---------- Validate ultimoacceso
  function do_ajax_form_maepro_validate_ultimoacceso()
  {
    var nomeCampo_ultimoacceso = "ultimoacceso";
    var var_ultimoacceso = scAjaxGetFieldText(nomeCampo_ultimoacceso);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maepro_validate_ultimoacceso(var_ultimoacceso, var_script_case_init, do_ajax_form_maepro_validate_ultimoacceso_cb);
  } // do_ajax_form_maepro_validate_ultimoacceso

  function do_ajax_form_maepro_validate_ultimoacceso_cb(sResp)
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
  } // do_ajax_form_maepro_validate_ultimoacceso_cb

  // ---------- Validate idpro
  function do_ajax_form_maepro_validate_idpro()
  {
    var nomeCampo_idpro = "idpro";
    var var_idpro = scAjaxGetFieldHidden(nomeCampo_idpro);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maepro_validate_idpro(var_idpro, var_script_case_init, do_ajax_form_maepro_validate_idpro_cb);
  } // do_ajax_form_maepro_validate_idpro

  function do_ajax_form_maepro_validate_idpro_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "idpro";
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
  } // do_ajax_form_maepro_validate_idpro_cb

  // ---------- Validate catprod01
  function do_ajax_form_maepro_validate_catprod01()
  {
    var nomeCampo_catprod01 = "catprod01";
    var var_catprod01 = scAjaxGetFieldText(nomeCampo_catprod01);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maepro_validate_catprod01(var_catprod01, var_script_case_init, do_ajax_form_maepro_validate_catprod01_cb);
  } // do_ajax_form_maepro_validate_catprod01

  function do_ajax_form_maepro_validate_catprod01_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "catprod01";
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
  } // do_ajax_form_maepro_validate_catprod01_cb

  // ---------- Validate med401
  function do_ajax_form_maepro_validate_med401()
  {
    var nomeCampo_med401 = "med401";
    var var_med401 = scAjaxGetFieldText(nomeCampo_med401);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maepro_validate_med401(var_med401, var_script_case_init, do_ajax_form_maepro_validate_med401_cb);
  } // do_ajax_form_maepro_validate_med401

  function do_ajax_form_maepro_validate_med401_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "med401";
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
  } // do_ajax_form_maepro_validate_med401_cb

  // ---------- Validate med501
  function do_ajax_form_maepro_validate_med501()
  {
    var nomeCampo_med501 = "med501";
    var var_med501 = scAjaxGetFieldText(nomeCampo_med501);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maepro_validate_med501(var_med501, var_script_case_init, do_ajax_form_maepro_validate_med501_cb);
  } // do_ajax_form_maepro_validate_med501

  function do_ajax_form_maepro_validate_med501_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "med501";
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
  } // do_ajax_form_maepro_validate_med501_cb

  // ---------- Validate prodconmed01
  function do_ajax_form_maepro_validate_prodconmed01()
  {
    var nomeCampo_prodconmed01 = "prodconmed01";
    var var_prodconmed01 = scAjaxGetFieldText(nomeCampo_prodconmed01);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maepro_validate_prodconmed01(var_prodconmed01, var_script_case_init, do_ajax_form_maepro_validate_prodconmed01_cb);
  } // do_ajax_form_maepro_validate_prodconmed01

  function do_ajax_form_maepro_validate_prodconmed01_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "prodconmed01";
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
  } // do_ajax_form_maepro_validate_prodconmed01_cb

  // ---------- Validate factorpeso01
  function do_ajax_form_maepro_validate_factorpeso01()
  {
    var nomeCampo_factorpeso01 = "factorpeso01";
    var var_factorpeso01 = scAjaxGetFieldText(nomeCampo_factorpeso01);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maepro_validate_factorpeso01(var_factorpeso01, var_script_case_init, do_ajax_form_maepro_validate_factorpeso01_cb);
  } // do_ajax_form_maepro_validate_factorpeso01

  function do_ajax_form_maepro_validate_factorpeso01_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "factorpeso01";
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
  } // do_ajax_form_maepro_validate_factorpeso01_cb

  // ---------- Validate codbar01
  function do_ajax_form_maepro_validate_codbar01()
  {
    var nomeCampo_codbar01 = "codbar01";
    var var_codbar01 = scAjaxGetFieldText(nomeCampo_codbar01);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maepro_validate_codbar01(var_codbar01, var_script_case_init, do_ajax_form_maepro_validate_codbar01_cb);
  } // do_ajax_form_maepro_validate_codbar01

  function do_ajax_form_maepro_validate_codbar01_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "codbar01";
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
  } // do_ajax_form_maepro_validate_codbar01_cb

  // ---------- Validate unifrac01
  function do_ajax_form_maepro_validate_unifrac01()
  {
    var nomeCampo_unifrac01 = "unifrac01";
    var var_unifrac01 = scAjaxGetFieldText(nomeCampo_unifrac01);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maepro_validate_unifrac01(var_unifrac01, var_script_case_init, do_ajax_form_maepro_validate_unifrac01_cb);
  } // do_ajax_form_maepro_validate_unifrac01

  function do_ajax_form_maepro_validate_unifrac01_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "unifrac01";
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
  } // do_ajax_form_maepro_validate_unifrac01_cb

  // ---------- Validate calidad01
  function do_ajax_form_maepro_validate_calidad01()
  {
    var nomeCampo_calidad01 = "calidad01";
    var var_calidad01 = scAjaxGetFieldText(nomeCampo_calidad01);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maepro_validate_calidad01(var_calidad01, var_script_case_init, do_ajax_form_maepro_validate_calidad01_cb);
  } // do_ajax_form_maepro_validate_calidad01

  function do_ajax_form_maepro_validate_calidad01_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "calidad01";
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
  } // do_ajax_form_maepro_validate_calidad01_cb

  // ---------- Validate color01
  function do_ajax_form_maepro_validate_color01()
  {
    var nomeCampo_color01 = "color01";
    var var_color01 = scAjaxGetFieldText(nomeCampo_color01);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maepro_validate_color01(var_color01, var_script_case_init, do_ajax_form_maepro_validate_color01_cb);
  } // do_ajax_form_maepro_validate_color01

  function do_ajax_form_maepro_validate_color01_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "color01";
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
  } // do_ajax_form_maepro_validate_color01_cb

  // ---------- Validate material01
  function do_ajax_form_maepro_validate_material01()
  {
    var nomeCampo_material01 = "material01";
    var var_material01 = scAjaxGetFieldText(nomeCampo_material01);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maepro_validate_material01(var_material01, var_script_case_init, do_ajax_form_maepro_validate_material01_cb);
  } // do_ajax_form_maepro_validate_material01

  function do_ajax_form_maepro_validate_material01_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "material01";
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
  } // do_ajax_form_maepro_validate_material01_cb

  // ---------- Validate talla01
  function do_ajax_form_maepro_validate_talla01()
  {
    var nomeCampo_talla01 = "talla01";
    var var_talla01 = scAjaxGetFieldText(nomeCampo_talla01);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maepro_validate_talla01(var_talla01, var_script_case_init, do_ajax_form_maepro_validate_talla01_cb);
  } // do_ajax_form_maepro_validate_talla01

  function do_ajax_form_maepro_validate_talla01_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "talla01";
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
  } // do_ajax_form_maepro_validate_talla01_cb

  // ---------- Validate compuesto01
  function do_ajax_form_maepro_validate_compuesto01()
  {
    var nomeCampo_compuesto01 = "compuesto01";
    var var_compuesto01 = scAjaxGetFieldText(nomeCampo_compuesto01);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maepro_validate_compuesto01(var_compuesto01, var_script_case_init, do_ajax_form_maepro_validate_compuesto01_cb);
  } // do_ajax_form_maepro_validate_compuesto01

  function do_ajax_form_maepro_validate_compuesto01_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "compuesto01";
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
  } // do_ajax_form_maepro_validate_compuesto01_cb

  // ---------- Validate catalt01
  function do_ajax_form_maepro_validate_catalt01()
  {
    var nomeCampo_catalt01 = "catalt01";
    var var_catalt01 = scAjaxGetFieldText(nomeCampo_catalt01);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maepro_validate_catalt01(var_catalt01, var_script_case_init, do_ajax_form_maepro_validate_catalt01_cb);
  } // do_ajax_form_maepro_validate_catalt01

  function do_ajax_form_maepro_validate_catalt01_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "catalt01";
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
  } // do_ajax_form_maepro_validate_catalt01_cb

  // ---------- Validate precfob01
  function do_ajax_form_maepro_validate_precfob01()
  {
    var nomeCampo_precfob01 = "precfob01";
    var var_precfob01 = scAjaxGetFieldText(nomeCampo_precfob01);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maepro_validate_precfob01(var_precfob01, var_script_case_init, do_ajax_form_maepro_validate_precfob01_cb);
  } // do_ajax_form_maepro_validate_precfob01

  function do_ajax_form_maepro_validate_precfob01_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "precfob01";
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
  } // do_ajax_form_maepro_validate_precfob01_cb

  // ---------- Validate precio401
  function do_ajax_form_maepro_validate_precio401()
  {
    var nomeCampo_precio401 = "precio401";
    var var_precio401 = scAjaxGetFieldText(nomeCampo_precio401);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maepro_validate_precio401(var_precio401, var_script_case_init, do_ajax_form_maepro_validate_precio401_cb);
  } // do_ajax_form_maepro_validate_precio401

  function do_ajax_form_maepro_validate_precio401_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "precio401";
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
  } // do_ajax_form_maepro_validate_precio401_cb

  // ---------- Validate descto401
  function do_ajax_form_maepro_validate_descto401()
  {
    var nomeCampo_descto401 = "descto401";
    var var_descto401 = scAjaxGetFieldText(nomeCampo_descto401);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maepro_validate_descto401(var_descto401, var_script_case_init, do_ajax_form_maepro_validate_descto401_cb);
  } // do_ajax_form_maepro_validate_descto401

  function do_ajax_form_maepro_validate_descto401_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "descto401";
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
  } // do_ajax_form_maepro_validate_descto401_cb

  // ---------- Validate porigen01
  function do_ajax_form_maepro_validate_porigen01()
  {
    var nomeCampo_porigen01 = "porigen01";
    var var_porigen01 = scAjaxGetFieldText(nomeCampo_porigen01);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maepro_validate_porigen01(var_porigen01, var_script_case_init, do_ajax_form_maepro_validate_porigen01_cb);
  } // do_ajax_form_maepro_validate_porigen01

  function do_ajax_form_maepro_validate_porigen01_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "porigen01";
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
  } // do_ajax_form_maepro_validate_porigen01_cb

  // ---------- Validate rin01
  function do_ajax_form_maepro_validate_rin01()
  {
    var nomeCampo_rin01 = "rin01";
    var var_rin01 = scAjaxGetFieldText(nomeCampo_rin01);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maepro_validate_rin01(var_rin01, var_script_case_init, do_ajax_form_maepro_validate_rin01_cb);
  } // do_ajax_form_maepro_validate_rin01

  function do_ajax_form_maepro_validate_rin01_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "rin01";
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
  } // do_ajax_form_maepro_validate_rin01_cb

  // ---------- Validate marca01
  function do_ajax_form_maepro_validate_marca01()
  {
    var nomeCampo_marca01 = "marca01";
    var var_marca01 = scAjaxGetFieldText(nomeCampo_marca01);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maepro_validate_marca01(var_marca01, var_script_case_init, do_ajax_form_maepro_validate_marca01_cb);
  } // do_ajax_form_maepro_validate_marca01

  function do_ajax_form_maepro_validate_marca01_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "marca01";
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
  } // do_ajax_form_maepro_validate_marca01_cb

  // ---------- Validate alto01
  function do_ajax_form_maepro_validate_alto01()
  {
    var nomeCampo_alto01 = "alto01";
    var var_alto01 = scAjaxGetFieldText(nomeCampo_alto01);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maepro_validate_alto01(var_alto01, var_script_case_init, do_ajax_form_maepro_validate_alto01_cb);
  } // do_ajax_form_maepro_validate_alto01

  function do_ajax_form_maepro_validate_alto01_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "alto01";
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
  } // do_ajax_form_maepro_validate_alto01_cb

  // ---------- Validate ancho01
  function do_ajax_form_maepro_validate_ancho01()
  {
    var nomeCampo_ancho01 = "ancho01";
    var var_ancho01 = scAjaxGetFieldText(nomeCampo_ancho01);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maepro_validate_ancho01(var_ancho01, var_script_case_init, do_ajax_form_maepro_validate_ancho01_cb);
  } // do_ajax_form_maepro_validate_ancho01

  function do_ajax_form_maepro_validate_ancho01_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "ancho01";
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
  } // do_ajax_form_maepro_validate_ancho01_cb

  // ---------- Validate tipoletra01
  function do_ajax_form_maepro_validate_tipoletra01()
  {
    var nomeCampo_tipoletra01 = "tipoletra01";
    var var_tipoletra01 = scAjaxGetFieldText(nomeCampo_tipoletra01);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maepro_validate_tipoletra01(var_tipoletra01, var_script_case_init, do_ajax_form_maepro_validate_tipoletra01_cb);
  } // do_ajax_form_maepro_validate_tipoletra01

  function do_ajax_form_maepro_validate_tipoletra01_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "tipoletra01";
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
  } // do_ajax_form_maepro_validate_tipoletra01_cb

  // ---------- Validate indcarga01
  function do_ajax_form_maepro_validate_indcarga01()
  {
    var nomeCampo_indcarga01 = "indcarga01";
    var var_indcarga01 = scAjaxGetFieldText(nomeCampo_indcarga01);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maepro_validate_indcarga01(var_indcarga01, var_script_case_init, do_ajax_form_maepro_validate_indcarga01_cb);
  } // do_ajax_form_maepro_validate_indcarga01

  function do_ajax_form_maepro_validate_indcarga01_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "indcarga01";
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
  } // do_ajax_form_maepro_validate_indcarga01_cb

  // ---------- Validate indveloc01
  function do_ajax_form_maepro_validate_indveloc01()
  {
    var nomeCampo_indveloc01 = "indveloc01";
    var var_indveloc01 = scAjaxGetFieldText(nomeCampo_indveloc01);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maepro_validate_indveloc01(var_indveloc01, var_script_case_init, do_ajax_form_maepro_validate_indveloc01_cb);
  } // do_ajax_form_maepro_validate_indveloc01

  function do_ajax_form_maepro_validate_indveloc01_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "indveloc01";
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
  } // do_ajax_form_maepro_validate_indveloc01_cb

  // ---------- Validate pr01
  function do_ajax_form_maepro_validate_pr01()
  {
    var nomeCampo_pr01 = "pr01";
    var var_pr01 = scAjaxGetFieldText(nomeCampo_pr01);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maepro_validate_pr01(var_pr01, var_script_case_init, do_ajax_form_maepro_validate_pr01_cb);
  } // do_ajax_form_maepro_validate_pr01

  function do_ajax_form_maepro_validate_pr01_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "pr01";
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
  } // do_ajax_form_maepro_validate_pr01_cb

  // ---------- Validate dis01
  function do_ajax_form_maepro_validate_dis01()
  {
    var nomeCampo_dis01 = "dis01";
    var var_dis01 = scAjaxGetFieldText(nomeCampo_dis01);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maepro_validate_dis01(var_dis01, var_script_case_init, do_ajax_form_maepro_validate_dis01_cb);
  } // do_ajax_form_maepro_validate_dis01

  function do_ajax_form_maepro_validate_dis01_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "dis01";
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
  } // do_ajax_form_maepro_validate_dis01_cb

  // ---------- Validate tipocons01
  function do_ajax_form_maepro_validate_tipocons01()
  {
    var nomeCampo_tipocons01 = "tipocons01";
    var var_tipocons01 = scAjaxGetFieldText(nomeCampo_tipocons01);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maepro_validate_tipocons01(var_tipocons01, var_script_case_init, do_ajax_form_maepro_validate_tipocons01_cb);
  } // do_ajax_form_maepro_validate_tipocons01

  function do_ajax_form_maepro_validate_tipocons01_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "tipocons01";
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
  } // do_ajax_form_maepro_validate_tipocons01_cb

  // ---------- Validate precateg01
  function do_ajax_form_maepro_validate_precateg01()
  {
    var nomeCampo_precateg01 = "precateg01";
    var var_precateg01 = scAjaxGetFieldText(nomeCampo_precateg01);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maepro_validate_precateg01(var_precateg01, var_script_case_init, do_ajax_form_maepro_validate_precateg01_cb);
  } // do_ajax_form_maepro_validate_precateg01

  function do_ajax_form_maepro_validate_precateg01_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "precateg01";
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
  } // do_ajax_form_maepro_validate_precateg01_cb

  // ---------- Validate tipprod01
  function do_ajax_form_maepro_validate_tipprod01()
  {
    var nomeCampo_tipprod01 = "tipprod01";
    var var_tipprod01 = scAjaxGetFieldText(nomeCampo_tipprod01);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maepro_validate_tipprod01(var_tipprod01, var_script_case_init, do_ajax_form_maepro_validate_tipprod01_cb);
  } // do_ajax_form_maepro_validate_tipprod01

  function do_ajax_form_maepro_validate_tipprod01_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "tipprod01";
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
  } // do_ajax_form_maepro_validate_tipprod01_cb

  // ---------- Validate conversion01
  function do_ajax_form_maepro_validate_conversion01()
  {
    var nomeCampo_conversion01 = "conversion01";
    var var_conversion01 = scAjaxGetFieldText(nomeCampo_conversion01);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maepro_validate_conversion01(var_conversion01, var_script_case_init, do_ajax_form_maepro_validate_conversion01_cb);
  } // do_ajax_form_maepro_validate_conversion01

  function do_ajax_form_maepro_validate_conversion01_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "conversion01";
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
  } // do_ajax_form_maepro_validate_conversion01_cb

  // ---------- Validate valhom01
  function do_ajax_form_maepro_validate_valhom01()
  {
    var nomeCampo_valhom01 = "valhom01";
    var var_valhom01 = scAjaxGetFieldText(nomeCampo_valhom01);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maepro_validate_valhom01(var_valhom01, var_script_case_init, do_ajax_form_maepro_validate_valhom01_cb);
  } // do_ajax_form_maepro_validate_valhom01

  function do_ajax_form_maepro_validate_valhom01_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "valhom01";
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
  } // do_ajax_form_maepro_validate_valhom01_cb

  // ---------- Validate ctain401
  function do_ajax_form_maepro_validate_ctain401()
  {
    var nomeCampo_ctain401 = "ctain401";
    var var_ctain401 = scAjaxGetFieldText(nomeCampo_ctain401);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maepro_validate_ctain401(var_ctain401, var_script_case_init, do_ajax_form_maepro_validate_ctain401_cb);
  } // do_ajax_form_maepro_validate_ctain401

  function do_ajax_form_maepro_validate_ctain401_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "ctain401";
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
  } // do_ajax_form_maepro_validate_ctain401_cb

  // ---------- Validate valhom02
  function do_ajax_form_maepro_validate_valhom02()
  {
    var nomeCampo_valhom02 = "valhom02";
    var var_valhom02 = scAjaxGetFieldText(nomeCampo_valhom02);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maepro_validate_valhom02(var_valhom02, var_script_case_init, do_ajax_form_maepro_validate_valhom02_cb);
  } // do_ajax_form_maepro_validate_valhom02

  function do_ajax_form_maepro_validate_valhom02_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "valhom02";
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
  } // do_ajax_form_maepro_validate_valhom02_cb

  // ---------- Validate valhom03
  function do_ajax_form_maepro_validate_valhom03()
  {
    var nomeCampo_valhom03 = "valhom03";
    var var_valhom03 = scAjaxGetFieldText(nomeCampo_valhom03);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maepro_validate_valhom03(var_valhom03, var_script_case_init, do_ajax_form_maepro_validate_valhom03_cb);
  } // do_ajax_form_maepro_validate_valhom03

  function do_ajax_form_maepro_validate_valhom03_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "valhom03";
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
  } // do_ajax_form_maepro_validate_valhom03_cb

  // ---------- Validate valhom04
  function do_ajax_form_maepro_validate_valhom04()
  {
    var nomeCampo_valhom04 = "valhom04";
    var var_valhom04 = scAjaxGetFieldText(nomeCampo_valhom04);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maepro_validate_valhom04(var_valhom04, var_script_case_init, do_ajax_form_maepro_validate_valhom04_cb);
  } // do_ajax_form_maepro_validate_valhom04

  function do_ajax_form_maepro_validate_valhom04_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "valhom04";
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
  } // do_ajax_form_maepro_validate_valhom04_cb

  // ---------- Validate statuspro01
  function do_ajax_form_maepro_validate_statuspro01()
  {
    var nomeCampo_statuspro01 = "statuspro01";
    var var_statuspro01 = scAjaxGetFieldText(nomeCampo_statuspro01);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maepro_validate_statuspro01(var_statuspro01, var_script_case_init, do_ajax_form_maepro_validate_statuspro01_cb);
  } // do_ajax_form_maepro_validate_statuspro01

  function do_ajax_form_maepro_validate_statuspro01_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "statuspro01";
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
  } // do_ajax_form_maepro_validate_statuspro01_cb

  // ---------- Validate parara01
  function do_ajax_form_maepro_validate_parara01()
  {
    var nomeCampo_parara01 = "parara01";
    var var_parara01 = scAjaxGetFieldText(nomeCampo_parara01);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maepro_validate_parara01(var_parara01, var_script_case_init, do_ajax_form_maepro_validate_parara01_cb);
  } // do_ajax_form_maepro_validate_parara01

  function do_ajax_form_maepro_validate_parara01_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "parara01";
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
  } // do_ajax_form_maepro_validate_parara01_cb

  // ---------- Validate prodequiv01
  function do_ajax_form_maepro_validate_prodequiv01()
  {
    var nomeCampo_prodequiv01 = "prodequiv01";
    var var_prodequiv01 = scAjaxGetFieldText(nomeCampo_prodequiv01);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maepro_validate_prodequiv01(var_prodequiv01, var_script_case_init, do_ajax_form_maepro_validate_prodequiv01_cb);
  } // do_ajax_form_maepro_validate_prodequiv01

  function do_ajax_form_maepro_validate_prodequiv01_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "prodequiv01";
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
  } // do_ajax_form_maepro_validate_prodequiv01_cb

  // ---------- Validate regalia01
  function do_ajax_form_maepro_validate_regalia01()
  {
    var nomeCampo_regalia01 = "regalia01";
    var var_regalia01 = scAjaxGetFieldText(nomeCampo_regalia01);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maepro_validate_regalia01(var_regalia01, var_script_case_init, do_ajax_form_maepro_validate_regalia01_cb);
  } // do_ajax_form_maepro_validate_regalia01

  function do_ajax_form_maepro_validate_regalia01_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "regalia01";
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
  } // do_ajax_form_maepro_validate_regalia01_cb

  // ---------- Validate precio501
  function do_ajax_form_maepro_validate_precio501()
  {
    var nomeCampo_precio501 = "precio501";
    var var_precio501 = scAjaxGetFieldText(nomeCampo_precio501);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maepro_validate_precio501(var_precio501, var_script_case_init, do_ajax_form_maepro_validate_precio501_cb);
  } // do_ajax_form_maepro_validate_precio501

  function do_ajax_form_maepro_validate_precio501_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "precio501";
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
  } // do_ajax_form_maepro_validate_precio501_cb

  // ---------- Validate descto501
  function do_ajax_form_maepro_validate_descto501()
  {
    var nomeCampo_descto501 = "descto501";
    var var_descto501 = scAjaxGetFieldText(nomeCampo_descto501);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maepro_validate_descto501(var_descto501, var_script_case_init, do_ajax_form_maepro_validate_descto501_cb);
  } // do_ajax_form_maepro_validate_descto501

  function do_ajax_form_maepro_validate_descto501_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "descto501";
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
  } // do_ajax_form_maepro_validate_descto501_cb

  // ---------- Validate precio601
  function do_ajax_form_maepro_validate_precio601()
  {
    var nomeCampo_precio601 = "precio601";
    var var_precio601 = scAjaxGetFieldText(nomeCampo_precio601);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maepro_validate_precio601(var_precio601, var_script_case_init, do_ajax_form_maepro_validate_precio601_cb);
  } // do_ajax_form_maepro_validate_precio601

  function do_ajax_form_maepro_validate_precio601_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "precio601";
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
  } // do_ajax_form_maepro_validate_precio601_cb

  // ---------- Validate descto601
  function do_ajax_form_maepro_validate_descto601()
  {
    var nomeCampo_descto601 = "descto601";
    var var_descto601 = scAjaxGetFieldText(nomeCampo_descto601);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maepro_validate_descto601(var_descto601, var_script_case_init, do_ajax_form_maepro_validate_descto601_cb);
  } // do_ajax_form_maepro_validate_descto601

  function do_ajax_form_maepro_validate_descto601_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "descto601";
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
  } // do_ajax_form_maepro_validate_descto601_cb

  // ---------- Validate precio701
  function do_ajax_form_maepro_validate_precio701()
  {
    var nomeCampo_precio701 = "precio701";
    var var_precio701 = scAjaxGetFieldText(nomeCampo_precio701);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maepro_validate_precio701(var_precio701, var_script_case_init, do_ajax_form_maepro_validate_precio701_cb);
  } // do_ajax_form_maepro_validate_precio701

  function do_ajax_form_maepro_validate_precio701_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "precio701";
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
  } // do_ajax_form_maepro_validate_precio701_cb

  // ---------- Validate descto701
  function do_ajax_form_maepro_validate_descto701()
  {
    var nomeCampo_descto701 = "descto701";
    var var_descto701 = scAjaxGetFieldText(nomeCampo_descto701);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maepro_validate_descto701(var_descto701, var_script_case_init, do_ajax_form_maepro_validate_descto701_cb);
  } // do_ajax_form_maepro_validate_descto701

  function do_ajax_form_maepro_validate_descto701_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "descto701";
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
  } // do_ajax_form_maepro_validate_descto701_cb

  // ---------- Validate precio801
  function do_ajax_form_maepro_validate_precio801()
  {
    var nomeCampo_precio801 = "precio801";
    var var_precio801 = scAjaxGetFieldText(nomeCampo_precio801);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maepro_validate_precio801(var_precio801, var_script_case_init, do_ajax_form_maepro_validate_precio801_cb);
  } // do_ajax_form_maepro_validate_precio801

  function do_ajax_form_maepro_validate_precio801_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "precio801";
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
  } // do_ajax_form_maepro_validate_precio801_cb

  // ---------- Validate descto801
  function do_ajax_form_maepro_validate_descto801()
  {
    var nomeCampo_descto801 = "descto801";
    var var_descto801 = scAjaxGetFieldText(nomeCampo_descto801);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maepro_validate_descto801(var_descto801, var_script_case_init, do_ajax_form_maepro_validate_descto801_cb);
  } // do_ajax_form_maepro_validate_descto801

  function do_ajax_form_maepro_validate_descto801_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "descto801";
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
  } // do_ajax_form_maepro_validate_descto801_cb

  // ---------- Validate precio901
  function do_ajax_form_maepro_validate_precio901()
  {
    var nomeCampo_precio901 = "precio901";
    var var_precio901 = scAjaxGetFieldText(nomeCampo_precio901);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maepro_validate_precio901(var_precio901, var_script_case_init, do_ajax_form_maepro_validate_precio901_cb);
  } // do_ajax_form_maepro_validate_precio901

  function do_ajax_form_maepro_validate_precio901_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "precio901";
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
  } // do_ajax_form_maepro_validate_precio901_cb

  // ---------- Validate descto901
  function do_ajax_form_maepro_validate_descto901()
  {
    var nomeCampo_descto901 = "descto901";
    var var_descto901 = scAjaxGetFieldText(nomeCampo_descto901);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maepro_validate_descto901(var_descto901, var_script_case_init, do_ajax_form_maepro_validate_descto901_cb);
  } // do_ajax_form_maepro_validate_descto901

  function do_ajax_form_maepro_validate_descto901_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "descto901";
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
  } // do_ajax_form_maepro_validate_descto901_cb

  // ---------- Validate precio1001
  function do_ajax_form_maepro_validate_precio1001()
  {
    var nomeCampo_precio1001 = "precio1001";
    var var_precio1001 = scAjaxGetFieldText(nomeCampo_precio1001);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maepro_validate_precio1001(var_precio1001, var_script_case_init, do_ajax_form_maepro_validate_precio1001_cb);
  } // do_ajax_form_maepro_validate_precio1001

  function do_ajax_form_maepro_validate_precio1001_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "precio1001";
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
  } // do_ajax_form_maepro_validate_precio1001_cb

  // ---------- Validate descto1001
  function do_ajax_form_maepro_validate_descto1001()
  {
    var nomeCampo_descto1001 = "descto1001";
    var var_descto1001 = scAjaxGetFieldText(nomeCampo_descto1001);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maepro_validate_descto1001(var_descto1001, var_script_case_init, do_ajax_form_maepro_validate_descto1001_cb);
  } // do_ajax_form_maepro_validate_descto1001

  function do_ajax_form_maepro_validate_descto1001_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "descto1001";
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
  } // do_ajax_form_maepro_validate_descto1001_cb

  // ---------- Validate precio1101
  function do_ajax_form_maepro_validate_precio1101()
  {
    var nomeCampo_precio1101 = "precio1101";
    var var_precio1101 = scAjaxGetFieldText(nomeCampo_precio1101);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maepro_validate_precio1101(var_precio1101, var_script_case_init, do_ajax_form_maepro_validate_precio1101_cb);
  } // do_ajax_form_maepro_validate_precio1101

  function do_ajax_form_maepro_validate_precio1101_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "precio1101";
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
  } // do_ajax_form_maepro_validate_precio1101_cb

  // ---------- Validate descto1101
  function do_ajax_form_maepro_validate_descto1101()
  {
    var nomeCampo_descto1101 = "descto1101";
    var var_descto1101 = scAjaxGetFieldText(nomeCampo_descto1101);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maepro_validate_descto1101(var_descto1101, var_script_case_init, do_ajax_form_maepro_validate_descto1101_cb);
  } // do_ajax_form_maepro_validate_descto1101

  function do_ajax_form_maepro_validate_descto1101_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "descto1101";
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
  } // do_ajax_form_maepro_validate_descto1101_cb

  // ---------- Validate precio1201
  function do_ajax_form_maepro_validate_precio1201()
  {
    var nomeCampo_precio1201 = "precio1201";
    var var_precio1201 = scAjaxGetFieldText(nomeCampo_precio1201);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maepro_validate_precio1201(var_precio1201, var_script_case_init, do_ajax_form_maepro_validate_precio1201_cb);
  } // do_ajax_form_maepro_validate_precio1201

  function do_ajax_form_maepro_validate_precio1201_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "precio1201";
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
  } // do_ajax_form_maepro_validate_precio1201_cb

  // ---------- Validate descto1201
  function do_ajax_form_maepro_validate_descto1201()
  {
    var nomeCampo_descto1201 = "descto1201";
    var var_descto1201 = scAjaxGetFieldText(nomeCampo_descto1201);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maepro_validate_descto1201(var_descto1201, var_script_case_init, do_ajax_form_maepro_validate_descto1201_cb);
  } // do_ajax_form_maepro_validate_descto1201

  function do_ajax_form_maepro_validate_descto1201_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "descto1201";
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
  } // do_ajax_form_maepro_validate_descto1201_cb

  // ---------- Validate submarca01
  function do_ajax_form_maepro_validate_submarca01()
  {
    var nomeCampo_submarca01 = "submarca01";
    var var_submarca01 = scAjaxGetFieldText(nomeCampo_submarca01);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maepro_validate_submarca01(var_submarca01, var_script_case_init, do_ajax_form_maepro_validate_submarca01_cb);
  } // do_ajax_form_maepro_validate_submarca01

  function do_ajax_form_maepro_validate_submarca01_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "submarca01";
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
  } // do_ajax_form_maepro_validate_submarca01_cb

  // ---------- Validate modelo01
  function do_ajax_form_maepro_validate_modelo01()
  {
    var nomeCampo_modelo01 = "modelo01";
    var var_modelo01 = scAjaxGetFieldText(nomeCampo_modelo01);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maepro_validate_modelo01(var_modelo01, var_script_case_init, do_ajax_form_maepro_validate_modelo01_cb);
  } // do_ajax_form_maepro_validate_modelo01

  function do_ajax_form_maepro_validate_modelo01_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "modelo01";
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
  } // do_ajax_form_maepro_validate_modelo01_cb

  // ---------- Validate clasific01
  function do_ajax_form_maepro_validate_clasific01()
  {
    var nomeCampo_clasific01 = "clasific01";
    var var_clasific01 = scAjaxGetFieldText(nomeCampo_clasific01);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maepro_validate_clasific01(var_clasific01, var_script_case_init, do_ajax_form_maepro_validate_clasific01_cb);
  } // do_ajax_form_maepro_validate_clasific01

  function do_ajax_form_maepro_validate_clasific01_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "clasific01";
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
  } // do_ajax_form_maepro_validate_clasific01_cb

  // ---------- Validate codbarempaque01
  function do_ajax_form_maepro_validate_codbarempaque01()
  {
    var nomeCampo_codbarempaque01 = "codbarempaque01";
    var var_codbarempaque01 = scAjaxGetFieldText(nomeCampo_codbarempaque01);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maepro_validate_codbarempaque01(var_codbarempaque01, var_script_case_init, do_ajax_form_maepro_validate_codbarempaque01_cb);
  } // do_ajax_form_maepro_validate_codbarempaque01

  function do_ajax_form_maepro_validate_codbarempaque01_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "codbarempaque01";
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
  } // do_ajax_form_maepro_validate_codbarempaque01_cb

  // ---------- Validate unidadempaque01
  function do_ajax_form_maepro_validate_unidadempaque01()
  {
    var nomeCampo_unidadempaque01 = "unidadempaque01";
    var var_unidadempaque01 = scAjaxGetFieldText(nomeCampo_unidadempaque01);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maepro_validate_unidadempaque01(var_unidadempaque01, var_script_case_init, do_ajax_form_maepro_validate_unidadempaque01_cb);
  } // do_ajax_form_maepro_validate_unidadempaque01

  function do_ajax_form_maepro_validate_unidadempaque01_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "unidadempaque01";
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
  } // do_ajax_form_maepro_validate_unidadempaque01_cb

  // ---------- Validate dimensionempaque01
  function do_ajax_form_maepro_validate_dimensionempaque01()
  {
    var nomeCampo_dimensionempaque01 = "dimensionempaque01";
    var var_dimensionempaque01 = scAjaxGetFieldText(nomeCampo_dimensionempaque01);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maepro_validate_dimensionempaque01(var_dimensionempaque01, var_script_case_init, do_ajax_form_maepro_validate_dimensionempaque01_cb);
  } // do_ajax_form_maepro_validate_dimensionempaque01

  function do_ajax_form_maepro_validate_dimensionempaque01_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "dimensionempaque01";
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
  } // do_ajax_form_maepro_validate_dimensionempaque01_cb

  // ---------- Validate link01
  function do_ajax_form_maepro_validate_link01()
  {
    var nomeCampo_link01 = "link01";
    var var_link01 = scAjaxGetFieldText(nomeCampo_link01);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maepro_validate_link01(var_link01, var_script_case_init, do_ajax_form_maepro_validate_link01_cb);
  } // do_ajax_form_maepro_validate_link01

  function do_ajax_form_maepro_validate_link01_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "link01";
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
  } // do_ajax_form_maepro_validate_link01_cb

  // ---------- Validate desprod201
  function do_ajax_form_maepro_validate_desprod201()
  {
    var nomeCampo_desprod201 = "desprod201";
    var var_desprod201 = scAjaxGetFieldText(nomeCampo_desprod201);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maepro_validate_desprod201(var_desprod201, var_script_case_init, do_ajax_form_maepro_validate_desprod201_cb);
  } // do_ajax_form_maepro_validate_desprod201

  function do_ajax_form_maepro_validate_desprod201_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "desprod201";
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
  } // do_ajax_form_maepro_validate_desprod201_cb

  // ---------- Validate desprod301
  function do_ajax_form_maepro_validate_desprod301()
  {
    var nomeCampo_desprod301 = "desprod301";
    var var_desprod301 = scAjaxGetFieldText(nomeCampo_desprod301);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maepro_validate_desprod301(var_desprod301, var_script_case_init, do_ajax_form_maepro_validate_desprod301_cb);
  } // do_ajax_form_maepro_validate_desprod301

  function do_ajax_form_maepro_validate_desprod301_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "desprod301";
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
  } // do_ajax_form_maepro_validate_desprod301_cb

  // ---------- Validate coefprd01
  function do_ajax_form_maepro_validate_coefprd01()
  {
    var nomeCampo_coefprd01 = "coefprd01";
    var var_coefprd01 = scAjaxGetFieldText(nomeCampo_coefprd01);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maepro_validate_coefprd01(var_coefprd01, var_script_case_init, do_ajax_form_maepro_validate_coefprd01_cb);
  } // do_ajax_form_maepro_validate_coefprd01

  function do_ajax_form_maepro_validate_coefprd01_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "coefprd01";
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
  } // do_ajax_form_maepro_validate_coefprd01_cb

  // ---------- Validate infor01
  function do_ajax_form_maepro_validate_infor01()
  {
    var nomeCampo_infor01 = "infor01";
    var var_infor01 = scAjaxGetFieldText(nomeCampo_infor01);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maepro_validate_infor01(var_infor01, var_script_case_init, do_ajax_form_maepro_validate_infor01_cb);
  } // do_ajax_form_maepro_validate_infor01

  function do_ajax_form_maepro_validate_infor01_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "infor01";
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
  } // do_ajax_form_maepro_validate_infor01_cb

  // ---------- Validate infor03
  function do_ajax_form_maepro_validate_infor03()
  {
    var nomeCampo_infor03 = "infor03";
    var var_infor03 = scAjaxGetFieldText(nomeCampo_infor03);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maepro_validate_infor03(var_infor03, var_script_case_init, do_ajax_form_maepro_validate_infor03_cb);
  } // do_ajax_form_maepro_validate_infor03

  function do_ajax_form_maepro_validate_infor03_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "infor03";
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
  } // do_ajax_form_maepro_validate_infor03_cb

  // ---------- Validate infor05
  function do_ajax_form_maepro_validate_infor05()
  {
    var nomeCampo_infor05 = "infor05";
    var var_infor05 = scAjaxGetFieldText(nomeCampo_infor05);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maepro_validate_infor05(var_infor05, var_script_case_init, do_ajax_form_maepro_validate_infor05_cb);
  } // do_ajax_form_maepro_validate_infor05

  function do_ajax_form_maepro_validate_infor05_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "infor05";
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
  } // do_ajax_form_maepro_validate_infor05_cb

  // ---------- Validate infor07
  function do_ajax_form_maepro_validate_infor07()
  {
    var nomeCampo_infor07 = "infor07";
    var var_infor07 = scAjaxGetFieldText(nomeCampo_infor07);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maepro_validate_infor07(var_infor07, var_script_case_init, do_ajax_form_maepro_validate_infor07_cb);
  } // do_ajax_form_maepro_validate_infor07

  function do_ajax_form_maepro_validate_infor07_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "infor07";
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
  } // do_ajax_form_maepro_validate_infor07_cb

  // ---------- Validate porcenrenta
  function do_ajax_form_maepro_validate_porcenrenta()
  {
    var nomeCampo_porcenrenta = "porcenrenta";
    var var_porcenrenta = scAjaxGetFieldText(nomeCampo_porcenrenta);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maepro_validate_porcenrenta(var_porcenrenta, var_script_case_init, do_ajax_form_maepro_validate_porcenrenta_cb);
  } // do_ajax_form_maepro_validate_porcenrenta

  function do_ajax_form_maepro_validate_porcenrenta_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "porcenrenta";
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
  } // do_ajax_form_maepro_validate_porcenrenta_cb

  // ---------- Validate peso
  function do_ajax_form_maepro_validate_peso()
  {
    var nomeCampo_peso = "peso";
    var var_peso = scAjaxGetFieldText(nomeCampo_peso);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maepro_validate_peso(var_peso, var_script_case_init, do_ajax_form_maepro_validate_peso_cb);
  } // do_ajax_form_maepro_validate_peso

  function do_ajax_form_maepro_validate_peso_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "peso";
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
  } // do_ajax_form_maepro_validate_peso_cb

  // ---------- Validate consignado
  function do_ajax_form_maepro_validate_consignado()
  {
    var nomeCampo_consignado = "consignado";
    var var_consignado = scAjaxGetFieldText(nomeCampo_consignado);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maepro_validate_consignado(var_consignado, var_script_case_init, do_ajax_form_maepro_validate_consignado_cb);
  } // do_ajax_form_maepro_validate_consignado

  function do_ajax_form_maepro_validate_consignado_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "consignado";
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
  } // do_ajax_form_maepro_validate_consignado_cb

  // ---------- Validate cant_consignado
  function do_ajax_form_maepro_validate_cant_consignado()
  {
    var nomeCampo_cant_consignado = "cant_consignado";
    var var_cant_consignado = scAjaxGetFieldText(nomeCampo_cant_consignado);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maepro_validate_cant_consignado(var_cant_consignado, var_script_case_init, do_ajax_form_maepro_validate_cant_consignado_cb);
  } // do_ajax_form_maepro_validate_cant_consignado

  function do_ajax_form_maepro_validate_cant_consignado_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "cant_consignado";
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
  } // do_ajax_form_maepro_validate_cant_consignado_cb

  // ---------- Validate baseimpexe01
  function do_ajax_form_maepro_validate_baseimpexe01()
  {
    var nomeCampo_baseimpexe01 = "baseimpexe01";
    var var_baseimpexe01 = scAjaxGetFieldText(nomeCampo_baseimpexe01);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maepro_validate_baseimpexe01(var_baseimpexe01, var_script_case_init, do_ajax_form_maepro_validate_baseimpexe01_cb);
  } // do_ajax_form_maepro_validate_baseimpexe01

  function do_ajax_form_maepro_validate_baseimpexe01_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "baseimpexe01";
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
  } // do_ajax_form_maepro_validate_baseimpexe01_cb

  // ---------- Validate peso01
  function do_ajax_form_maepro_validate_peso01()
  {
    var nomeCampo_peso01 = "peso01";
    var var_peso01 = scAjaxGetFieldText(nomeCampo_peso01);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maepro_validate_peso01(var_peso01, var_script_case_init, do_ajax_form_maepro_validate_peso01_cb);
  } // do_ajax_form_maepro_validate_peso01

  function do_ajax_form_maepro_validate_peso01_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "peso01";
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
  } // do_ajax_form_maepro_validate_peso01_cb

  // ---------- Validate prodrel01
  function do_ajax_form_maepro_validate_prodrel01()
  {
    var nomeCampo_prodrel01 = "prodrel01";
    var var_prodrel01 = scAjaxGetFieldText(nomeCampo_prodrel01);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maepro_validate_prodrel01(var_prodrel01, var_script_case_init, do_ajax_form_maepro_validate_prodrel01_cb);
  } // do_ajax_form_maepro_validate_prodrel01

  function do_ajax_form_maepro_validate_prodrel01_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "prodrel01";
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
  } // do_ajax_form_maepro_validate_prodrel01_cb

  // ---------- Validate infor02
  function do_ajax_form_maepro_validate_infor02()
  {
    var nomeCampo_infor02 = "infor02";
    var var_infor02 = scAjaxGetFieldText(nomeCampo_infor02);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maepro_validate_infor02(var_infor02, var_script_case_init, do_ajax_form_maepro_validate_infor02_cb);
  } // do_ajax_form_maepro_validate_infor02

  function do_ajax_form_maepro_validate_infor02_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "infor02";
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
  } // do_ajax_form_maepro_validate_infor02_cb

  // ---------- Validate infor04
  function do_ajax_form_maepro_validate_infor04()
  {
    var nomeCampo_infor04 = "infor04";
    var var_infor04 = scAjaxGetFieldText(nomeCampo_infor04);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maepro_validate_infor04(var_infor04, var_script_case_init, do_ajax_form_maepro_validate_infor04_cb);
  } // do_ajax_form_maepro_validate_infor04

  function do_ajax_form_maepro_validate_infor04_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "infor04";
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
  } // do_ajax_form_maepro_validate_infor04_cb

  // ---------- Validate infor06
  function do_ajax_form_maepro_validate_infor06()
  {
    var nomeCampo_infor06 = "infor06";
    var var_infor06 = scAjaxGetFieldText(nomeCampo_infor06);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maepro_validate_infor06(var_infor06, var_script_case_init, do_ajax_form_maepro_validate_infor06_cb);
  } // do_ajax_form_maepro_validate_infor06

  function do_ajax_form_maepro_validate_infor06_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "infor06";
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
  } // do_ajax_form_maepro_validate_infor06_cb

  // ---------- Validate infor08
  function do_ajax_form_maepro_validate_infor08()
  {
    var nomeCampo_infor08 = "infor08";
    var var_infor08 = scAjaxGetFieldText(nomeCampo_infor08);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maepro_validate_infor08(var_infor08, var_script_case_init, do_ajax_form_maepro_validate_infor08_cb);
  } // do_ajax_form_maepro_validate_infor08

  function do_ajax_form_maepro_validate_infor08_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "infor08";
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
  } // do_ajax_form_maepro_validate_infor08_cb

  // ---------- Validate porcicevta01
  function do_ajax_form_maepro_validate_porcicevta01()
  {
    var nomeCampo_porcicevta01 = "porcicevta01";
    var var_porcicevta01 = scAjaxGetFieldText(nomeCampo_porcicevta01);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maepro_validate_porcicevta01(var_porcicevta01, var_script_case_init, do_ajax_form_maepro_validate_porcicevta01_cb);
  } // do_ajax_form_maepro_validate_porcicevta01

  function do_ajax_form_maepro_validate_porcicevta01_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "porcicevta01";
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
  } // do_ajax_form_maepro_validate_porcicevta01_cb

  // ---------- Validate porcicecpra01
  function do_ajax_form_maepro_validate_porcicecpra01()
  {
    var nomeCampo_porcicecpra01 = "porcicecpra01";
    var var_porcicecpra01 = scAjaxGetFieldText(nomeCampo_porcicecpra01);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maepro_validate_porcicecpra01(var_porcicecpra01, var_script_case_init, do_ajax_form_maepro_validate_porcicecpra01_cb);
  } // do_ajax_form_maepro_validate_porcicecpra01

  function do_ajax_form_maepro_validate_porcicecpra01_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "porcicecpra01";
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
  } // do_ajax_form_maepro_validate_porcicecpra01_cb

  // ---------- Validate porcptdaranc01
  function do_ajax_form_maepro_validate_porcptdaranc01()
  {
    var nomeCampo_porcptdaranc01 = "porcptdaranc01";
    var var_porcptdaranc01 = scAjaxGetFieldText(nomeCampo_porcptdaranc01);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maepro_validate_porcptdaranc01(var_porcptdaranc01, var_script_case_init, do_ajax_form_maepro_validate_porcptdaranc01_cb);
  } // do_ajax_form_maepro_validate_porcptdaranc01

  function do_ajax_form_maepro_validate_porcptdaranc01_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "porcptdaranc01";
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
  } // do_ajax_form_maepro_validate_porcptdaranc01_cb

  // ---------- Validate ordimp01
  function do_ajax_form_maepro_validate_ordimp01()
  {
    var nomeCampo_ordimp01 = "ordimp01";
    var var_ordimp01 = scAjaxGetFieldText(nomeCampo_ordimp01);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maepro_validate_ordimp01(var_ordimp01, var_script_case_init, do_ajax_form_maepro_validate_ordimp01_cb);
  } // do_ajax_form_maepro_validate_ordimp01

  function do_ajax_form_maepro_validate_ordimp01_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "ordimp01";
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
  } // do_ajax_form_maepro_validate_ordimp01_cb
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
  function do_ajax_form_maepro_submit_form()
  {
    if (scEventControl_active("")) {
      setTimeout(function() { do_ajax_form_maepro_submit_form(); }, 500);
      return;
    }
    scAjaxHideMessage();
    var var_codprod01 = scAjaxGetFieldText("codprod01");
    var var_desprod01 = scAjaxGetFieldText("desprod01");
    var var_cve101 = scAjaxGetFieldText("cve101");
    var var_cve201 = scAjaxGetFieldText("cve201");
    var var_unidmed01 = scAjaxGetFieldText("unidmed01");
    var var_cantmin01 = scAjaxGetFieldText("cantmin01");
    var var_cantact01 = scAjaxGetFieldText("cantact01");
    var var_valact01 = scAjaxGetFieldText("valact01");
    var var_exipromo01 = scAjaxGetFieldText("exipromo01");
    var var_precuni01 = scAjaxGetFieldText("precuni01");
    var var_pedpend01 = scAjaxGetFieldText("pedpend01");
    var var_orden01 = scAjaxGetFieldText("orden01");
    var var_refer01 = scAjaxGetFieldText("refer01");
    var var_canentm01 = scAjaxGetFieldText("canentm01");
    var var_valentm01 = scAjaxGetFieldText("valentm01");
    var var_cansalm01 = scAjaxGetFieldText("cansalm01");
    var var_valsalm01 = scAjaxGetFieldText("valsalm01");
    var var_canenta01 = scAjaxGetFieldText("canenta01");
    var var_valenta01 = scAjaxGetFieldText("valenta01");
    var var_cansala01 = scAjaxGetFieldText("cansala01");
    var var_valsala01 = scAjaxGetFieldText("valsala01");
    var var_fecape01 = scAjaxGetFieldText("fecape01");
    var var_fecult01 = scAjaxGetFieldText("fecult01");
    var var_fecvta01 = scAjaxGetFieldText("fecvta01");
    var var_ubic01 = scAjaxGetFieldText("ubic01");
    var var_precvta01 = scAjaxGetFieldText("precvta01");
    var var_descto101 = scAjaxGetFieldText("descto101");
    var var_precio201 = scAjaxGetFieldText("precio201");
    var var_descto201 = scAjaxGetFieldText("descto201");
    var var_precio301 = scAjaxGetFieldText("precio301");
    var var_descto301 = scAjaxGetFieldText("descto301");
    var var_canvtam01 = scAjaxGetFieldText("canvtam01");
    var var_valvtam01 = scAjaxGetFieldText("valvtam01");
    var var_cosvtam01 = scAjaxGetFieldText("cosvtam01");
    var var_canvtaa01 = scAjaxGetFieldText("canvtaa01");
    var var_valvtaa01 = scAjaxGetFieldText("valvtaa01");
    var var_cosvtaa01 = scAjaxGetFieldText("cosvtaa01");
    var var_prod1alt01 = scAjaxGetFieldText("prod1alt01");
    var var_prod2alt01 = scAjaxGetFieldText("prod2alt01");
    var var_proved101 = scAjaxGetFieldText("proved101");
    var var_proved201 = scAjaxGetFieldText("proved201");
    var var_med101 = scAjaxGetFieldText("med101");
    var var_med201 = scAjaxGetFieldText("med201");
    var var_med301 = scAjaxGetFieldText("med301");
    var var_factor01 = scAjaxGetFieldText("factor01");
    var var_cvserie01 = scAjaxGetFieldText("cvserie01");
    var var_ctain101 = scAjaxGetFieldText("ctain101");
    var var_ctain201 = scAjaxGetFieldText("ctain201");
    var var_ctain301 = scAjaxGetFieldText("ctain301");
    var var_porciva01 = scAjaxGetFieldText("porciva01");
    var var_prodsinsdo01 = scAjaxGetFieldText("prodsinsdo01");
    var var_sinprec01 = scAjaxGetFieldText("sinprec01");
    var var_fotoprod01 = scAjaxGetFieldText("fotoprod01");
    var var_detprod01 = scAjaxGetFieldText("detprod01");
    var var_block = scAjaxGetFieldText("block");
    var var_uid = scAjaxGetFieldText("uid");
    var var_ultimoacceso = scAjaxGetFieldText("ultimoacceso");
    var var_idpro = scAjaxGetFieldHidden("idpro");
    var var_catprod01 = scAjaxGetFieldText("catprod01");
    var var_med401 = scAjaxGetFieldText("med401");
    var var_med501 = scAjaxGetFieldText("med501");
    var var_prodconmed01 = scAjaxGetFieldText("prodconmed01");
    var var_factorpeso01 = scAjaxGetFieldText("factorpeso01");
    var var_codbar01 = scAjaxGetFieldText("codbar01");
    var var_unifrac01 = scAjaxGetFieldText("unifrac01");
    var var_calidad01 = scAjaxGetFieldText("calidad01");
    var var_color01 = scAjaxGetFieldText("color01");
    var var_material01 = scAjaxGetFieldText("material01");
    var var_talla01 = scAjaxGetFieldText("talla01");
    var var_compuesto01 = scAjaxGetFieldText("compuesto01");
    var var_catalt01 = scAjaxGetFieldText("catalt01");
    var var_precfob01 = scAjaxGetFieldText("precfob01");
    var var_precio401 = scAjaxGetFieldText("precio401");
    var var_descto401 = scAjaxGetFieldText("descto401");
    var var_porigen01 = scAjaxGetFieldText("porigen01");
    var var_rin01 = scAjaxGetFieldText("rin01");
    var var_marca01 = scAjaxGetFieldText("marca01");
    var var_alto01 = scAjaxGetFieldText("alto01");
    var var_ancho01 = scAjaxGetFieldText("ancho01");
    var var_tipoletra01 = scAjaxGetFieldText("tipoletra01");
    var var_indcarga01 = scAjaxGetFieldText("indcarga01");
    var var_indveloc01 = scAjaxGetFieldText("indveloc01");
    var var_pr01 = scAjaxGetFieldText("pr01");
    var var_dis01 = scAjaxGetFieldText("dis01");
    var var_tipocons01 = scAjaxGetFieldText("tipocons01");
    var var_precateg01 = scAjaxGetFieldText("precateg01");
    var var_tipprod01 = scAjaxGetFieldText("tipprod01");
    var var_conversion01 = scAjaxGetFieldText("conversion01");
    var var_valhom01 = scAjaxGetFieldText("valhom01");
    var var_ctain401 = scAjaxGetFieldText("ctain401");
    var var_valhom02 = scAjaxGetFieldText("valhom02");
    var var_valhom03 = scAjaxGetFieldText("valhom03");
    var var_valhom04 = scAjaxGetFieldText("valhom04");
    var var_statuspro01 = scAjaxGetFieldText("statuspro01");
    var var_parara01 = scAjaxGetFieldText("parara01");
    var var_prodequiv01 = scAjaxGetFieldText("prodequiv01");
    var var_regalia01 = scAjaxGetFieldText("regalia01");
    var var_precio501 = scAjaxGetFieldText("precio501");
    var var_descto501 = scAjaxGetFieldText("descto501");
    var var_precio601 = scAjaxGetFieldText("precio601");
    var var_descto601 = scAjaxGetFieldText("descto601");
    var var_precio701 = scAjaxGetFieldText("precio701");
    var var_descto701 = scAjaxGetFieldText("descto701");
    var var_precio801 = scAjaxGetFieldText("precio801");
    var var_descto801 = scAjaxGetFieldText("descto801");
    var var_precio901 = scAjaxGetFieldText("precio901");
    var var_descto901 = scAjaxGetFieldText("descto901");
    var var_precio1001 = scAjaxGetFieldText("precio1001");
    var var_descto1001 = scAjaxGetFieldText("descto1001");
    var var_precio1101 = scAjaxGetFieldText("precio1101");
    var var_descto1101 = scAjaxGetFieldText("descto1101");
    var var_precio1201 = scAjaxGetFieldText("precio1201");
    var var_descto1201 = scAjaxGetFieldText("descto1201");
    var var_submarca01 = scAjaxGetFieldText("submarca01");
    var var_modelo01 = scAjaxGetFieldText("modelo01");
    var var_clasific01 = scAjaxGetFieldText("clasific01");
    var var_codbarempaque01 = scAjaxGetFieldText("codbarempaque01");
    var var_unidadempaque01 = scAjaxGetFieldText("unidadempaque01");
    var var_dimensionempaque01 = scAjaxGetFieldText("dimensionempaque01");
    var var_link01 = scAjaxGetFieldText("link01");
    var var_desprod201 = scAjaxGetFieldText("desprod201");
    var var_desprod301 = scAjaxGetFieldText("desprod301");
    var var_coefprd01 = scAjaxGetFieldText("coefprd01");
    var var_infor01 = scAjaxGetFieldText("infor01");
    var var_infor03 = scAjaxGetFieldText("infor03");
    var var_infor05 = scAjaxGetFieldText("infor05");
    var var_infor07 = scAjaxGetFieldText("infor07");
    var var_porcenrenta = scAjaxGetFieldText("porcenrenta");
    var var_peso = scAjaxGetFieldText("peso");
    var var_consignado = scAjaxGetFieldText("consignado");
    var var_cant_consignado = scAjaxGetFieldText("cant_consignado");
    var var_baseimpexe01 = scAjaxGetFieldText("baseimpexe01");
    var var_peso01 = scAjaxGetFieldText("peso01");
    var var_prodrel01 = scAjaxGetFieldText("prodrel01");
    var var_infor02 = scAjaxGetFieldText("infor02");
    var var_infor04 = scAjaxGetFieldText("infor04");
    var var_infor06 = scAjaxGetFieldText("infor06");
    var var_infor08 = scAjaxGetFieldText("infor08");
    var var_porcicevta01 = scAjaxGetFieldText("porcicevta01");
    var var_porcicecpra01 = scAjaxGetFieldText("porcicecpra01");
    var var_porcptdaranc01 = scAjaxGetFieldText("porcptdaranc01");
    var var_ordimp01 = scAjaxGetFieldText("ordimp01");
    var var_nm_form_submit = document.F1.nm_form_submit.value;
    var var_nmgp_url_saida = document.F1.nmgp_url_saida.value;
    var var_nmgp_opcao = document.F1.nmgp_opcao.value;
    var var_nmgp_ancora = document.F1.nmgp_ancora.value;
    var var_nmgp_num_form = document.F1.nmgp_num_form.value;
    var var_nmgp_parms = document.F1.nmgp_parms.value;
    var var_script_case_init = document.F1.script_case_init.value;
    var var_csrf_token = scAjaxGetFieldText("csrf_token");
    scAjaxProcOn();
    x_ajax_form_maepro_submit_form(var_codprod01, var_desprod01, var_cve101, var_cve201, var_unidmed01, var_cantmin01, var_cantact01, var_valact01, var_exipromo01, var_precuni01, var_pedpend01, var_orden01, var_refer01, var_canentm01, var_valentm01, var_cansalm01, var_valsalm01, var_canenta01, var_valenta01, var_cansala01, var_valsala01, var_fecape01, var_fecult01, var_fecvta01, var_ubic01, var_precvta01, var_descto101, var_precio201, var_descto201, var_precio301, var_descto301, var_canvtam01, var_valvtam01, var_cosvtam01, var_canvtaa01, var_valvtaa01, var_cosvtaa01, var_prod1alt01, var_prod2alt01, var_proved101, var_proved201, var_med101, var_med201, var_med301, var_factor01, var_cvserie01, var_ctain101, var_ctain201, var_ctain301, var_porciva01, var_prodsinsdo01, var_sinprec01, var_fotoprod01, var_detprod01, var_block, var_uid, var_ultimoacceso, var_idpro, var_catprod01, var_med401, var_med501, var_prodconmed01, var_factorpeso01, var_codbar01, var_unifrac01, var_calidad01, var_color01, var_material01, var_talla01, var_compuesto01, var_catalt01, var_precfob01, var_precio401, var_descto401, var_porigen01, var_rin01, var_marca01, var_alto01, var_ancho01, var_tipoletra01, var_indcarga01, var_indveloc01, var_pr01, var_dis01, var_tipocons01, var_precateg01, var_tipprod01, var_conversion01, var_valhom01, var_ctain401, var_valhom02, var_valhom03, var_valhom04, var_statuspro01, var_parara01, var_prodequiv01, var_regalia01, var_precio501, var_descto501, var_precio601, var_descto601, var_precio701, var_descto701, var_precio801, var_descto801, var_precio901, var_descto901, var_precio1001, var_descto1001, var_precio1101, var_descto1101, var_precio1201, var_descto1201, var_submarca01, var_modelo01, var_clasific01, var_codbarempaque01, var_unidadempaque01, var_dimensionempaque01, var_link01, var_desprod201, var_desprod301, var_coefprd01, var_infor01, var_infor03, var_infor05, var_infor07, var_porcenrenta, var_peso, var_consignado, var_cant_consignado, var_baseimpexe01, var_peso01, var_prodrel01, var_infor02, var_infor04, var_infor06, var_infor08, var_porcicevta01, var_porcicecpra01, var_porcptdaranc01, var_ordimp01, var_nm_form_submit, var_nmgp_url_saida, var_nmgp_opcao, var_nmgp_ancora, var_nmgp_num_form, var_nmgp_parms, var_script_case_init, var_csrf_token, do_ajax_form_maepro_submit_form_cb);
  } // do_ajax_form_maepro_submit_form

  function do_ajax_form_maepro_submit_form_cb(sResp)
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
      scAjaxHideErrorDisplay("codprod01");
      scAjaxHideErrorDisplay("desprod01");
      scAjaxHideErrorDisplay("cve101");
      scAjaxHideErrorDisplay("cve201");
      scAjaxHideErrorDisplay("unidmed01");
      scAjaxHideErrorDisplay("cantmin01");
      scAjaxHideErrorDisplay("cantact01");
      scAjaxHideErrorDisplay("valact01");
      scAjaxHideErrorDisplay("exipromo01");
      scAjaxHideErrorDisplay("precuni01");
      scAjaxHideErrorDisplay("pedpend01");
      scAjaxHideErrorDisplay("orden01");
      scAjaxHideErrorDisplay("refer01");
      scAjaxHideErrorDisplay("canentm01");
      scAjaxHideErrorDisplay("valentm01");
      scAjaxHideErrorDisplay("cansalm01");
      scAjaxHideErrorDisplay("valsalm01");
      scAjaxHideErrorDisplay("canenta01");
      scAjaxHideErrorDisplay("valenta01");
      scAjaxHideErrorDisplay("cansala01");
      scAjaxHideErrorDisplay("valsala01");
      scAjaxHideErrorDisplay("fecape01");
      scAjaxHideErrorDisplay("fecult01");
      scAjaxHideErrorDisplay("fecvta01");
      scAjaxHideErrorDisplay("ubic01");
      scAjaxHideErrorDisplay("precvta01");
      scAjaxHideErrorDisplay("descto101");
      scAjaxHideErrorDisplay("precio201");
      scAjaxHideErrorDisplay("descto201");
      scAjaxHideErrorDisplay("precio301");
      scAjaxHideErrorDisplay("descto301");
      scAjaxHideErrorDisplay("canvtam01");
      scAjaxHideErrorDisplay("valvtam01");
      scAjaxHideErrorDisplay("cosvtam01");
      scAjaxHideErrorDisplay("canvtaa01");
      scAjaxHideErrorDisplay("valvtaa01");
      scAjaxHideErrorDisplay("cosvtaa01");
      scAjaxHideErrorDisplay("prod1alt01");
      scAjaxHideErrorDisplay("prod2alt01");
      scAjaxHideErrorDisplay("proved101");
      scAjaxHideErrorDisplay("proved201");
      scAjaxHideErrorDisplay("med101");
      scAjaxHideErrorDisplay("med201");
      scAjaxHideErrorDisplay("med301");
      scAjaxHideErrorDisplay("factor01");
      scAjaxHideErrorDisplay("cvserie01");
      scAjaxHideErrorDisplay("ctain101");
      scAjaxHideErrorDisplay("ctain201");
      scAjaxHideErrorDisplay("ctain301");
      scAjaxHideErrorDisplay("porciva01");
      scAjaxHideErrorDisplay("prodsinsdo01");
      scAjaxHideErrorDisplay("sinprec01");
      scAjaxHideErrorDisplay("fotoprod01");
      scAjaxHideErrorDisplay("detprod01");
      scAjaxHideErrorDisplay("block");
      scAjaxHideErrorDisplay("uid");
      scAjaxHideErrorDisplay("ultimoacceso");
      scAjaxHideErrorDisplay("idpro");
      scAjaxHideErrorDisplay("catprod01");
      scAjaxHideErrorDisplay("med401");
      scAjaxHideErrorDisplay("med501");
      scAjaxHideErrorDisplay("prodconmed01");
      scAjaxHideErrorDisplay("factorpeso01");
      scAjaxHideErrorDisplay("codbar01");
      scAjaxHideErrorDisplay("unifrac01");
      scAjaxHideErrorDisplay("calidad01");
      scAjaxHideErrorDisplay("color01");
      scAjaxHideErrorDisplay("material01");
      scAjaxHideErrorDisplay("talla01");
      scAjaxHideErrorDisplay("compuesto01");
      scAjaxHideErrorDisplay("catalt01");
      scAjaxHideErrorDisplay("precfob01");
      scAjaxHideErrorDisplay("precio401");
      scAjaxHideErrorDisplay("descto401");
      scAjaxHideErrorDisplay("porigen01");
      scAjaxHideErrorDisplay("rin01");
      scAjaxHideErrorDisplay("marca01");
      scAjaxHideErrorDisplay("alto01");
      scAjaxHideErrorDisplay("ancho01");
      scAjaxHideErrorDisplay("tipoletra01");
      scAjaxHideErrorDisplay("indcarga01");
      scAjaxHideErrorDisplay("indveloc01");
      scAjaxHideErrorDisplay("pr01");
      scAjaxHideErrorDisplay("dis01");
      scAjaxHideErrorDisplay("tipocons01");
      scAjaxHideErrorDisplay("precateg01");
      scAjaxHideErrorDisplay("tipprod01");
      scAjaxHideErrorDisplay("conversion01");
      scAjaxHideErrorDisplay("valhom01");
      scAjaxHideErrorDisplay("ctain401");
      scAjaxHideErrorDisplay("valhom02");
      scAjaxHideErrorDisplay("valhom03");
      scAjaxHideErrorDisplay("valhom04");
      scAjaxHideErrorDisplay("statuspro01");
      scAjaxHideErrorDisplay("parara01");
      scAjaxHideErrorDisplay("prodequiv01");
      scAjaxHideErrorDisplay("regalia01");
      scAjaxHideErrorDisplay("precio501");
      scAjaxHideErrorDisplay("descto501");
      scAjaxHideErrorDisplay("precio601");
      scAjaxHideErrorDisplay("descto601");
      scAjaxHideErrorDisplay("precio701");
      scAjaxHideErrorDisplay("descto701");
      scAjaxHideErrorDisplay("precio801");
      scAjaxHideErrorDisplay("descto801");
      scAjaxHideErrorDisplay("precio901");
      scAjaxHideErrorDisplay("descto901");
      scAjaxHideErrorDisplay("precio1001");
      scAjaxHideErrorDisplay("descto1001");
      scAjaxHideErrorDisplay("precio1101");
      scAjaxHideErrorDisplay("descto1101");
      scAjaxHideErrorDisplay("precio1201");
      scAjaxHideErrorDisplay("descto1201");
      scAjaxHideErrorDisplay("submarca01");
      scAjaxHideErrorDisplay("modelo01");
      scAjaxHideErrorDisplay("clasific01");
      scAjaxHideErrorDisplay("codbarempaque01");
      scAjaxHideErrorDisplay("unidadempaque01");
      scAjaxHideErrorDisplay("dimensionempaque01");
      scAjaxHideErrorDisplay("link01");
      scAjaxHideErrorDisplay("desprod201");
      scAjaxHideErrorDisplay("desprod301");
      scAjaxHideErrorDisplay("coefprd01");
      scAjaxHideErrorDisplay("infor01");
      scAjaxHideErrorDisplay("infor03");
      scAjaxHideErrorDisplay("infor05");
      scAjaxHideErrorDisplay("infor07");
      scAjaxHideErrorDisplay("porcenrenta");
      scAjaxHideErrorDisplay("peso");
      scAjaxHideErrorDisplay("consignado");
      scAjaxHideErrorDisplay("cant_consignado");
      scAjaxHideErrorDisplay("baseimpexe01");
      scAjaxHideErrorDisplay("peso01");
      scAjaxHideErrorDisplay("prodrel01");
      scAjaxHideErrorDisplay("infor02");
      scAjaxHideErrorDisplay("infor04");
      scAjaxHideErrorDisplay("infor06");
      scAjaxHideErrorDisplay("infor08");
      scAjaxHideErrorDisplay("porcicevta01");
      scAjaxHideErrorDisplay("porcicecpra01");
      scAjaxHideErrorDisplay("porcptdaranc01");
      scAjaxHideErrorDisplay("ordimp01");
      scLigEditLookupCall();
<?php
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['dashboard_info']['under_dashboard']) {
?>
      var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['dashboard_info']['parent_widget']; ?>']");
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
    scAjaxAlert(do_ajax_form_maepro_submit_form_cb_after_alert);
  } // do_ajax_form_maepro_submit_form_cb
  function do_ajax_form_maepro_submit_form_cb_after_alert() {
    scAjaxMessage();
    scAjaxJavascript();
    scAjaxSetFocus();
    scAjaxRedir();
    if (hasJsFormOnload)
    {
      sc_form_onload();
    }
  } // do_ajax_form_maepro_submit_form_cb_after_alert

  var scStatusDetail = {};

  function do_ajax_form_maepro_navigate_form()
  {
    if (scFormHasChanged) {
      scJs_confirm('<?php echo html_entity_decode($this->Ini->Nm_lang['lang_reload_confirm']) ?>', perform_ajax_form_maepro_navigate_form, function() {});
    } else {
      perform_ajax_form_maepro_navigate_form();
    }
  }

  function perform_ajax_form_maepro_navigate_form()
  {
    if (scRefreshTable())
    {
      return;
    }
    scAjaxHideMessage();
    scAjaxHideErrorDisplay("table");
    scAjaxHideErrorDisplay("codprod01");
    scAjaxHideErrorDisplay("desprod01");
    scAjaxHideErrorDisplay("cve101");
    scAjaxHideErrorDisplay("cve201");
    scAjaxHideErrorDisplay("unidmed01");
    scAjaxHideErrorDisplay("cantmin01");
    scAjaxHideErrorDisplay("cantact01");
    scAjaxHideErrorDisplay("valact01");
    scAjaxHideErrorDisplay("exipromo01");
    scAjaxHideErrorDisplay("precuni01");
    scAjaxHideErrorDisplay("pedpend01");
    scAjaxHideErrorDisplay("orden01");
    scAjaxHideErrorDisplay("refer01");
    scAjaxHideErrorDisplay("canentm01");
    scAjaxHideErrorDisplay("valentm01");
    scAjaxHideErrorDisplay("cansalm01");
    scAjaxHideErrorDisplay("valsalm01");
    scAjaxHideErrorDisplay("canenta01");
    scAjaxHideErrorDisplay("valenta01");
    scAjaxHideErrorDisplay("cansala01");
    scAjaxHideErrorDisplay("valsala01");
    scAjaxHideErrorDisplay("fecape01");
    scAjaxHideErrorDisplay("fecult01");
    scAjaxHideErrorDisplay("fecvta01");
    scAjaxHideErrorDisplay("ubic01");
    scAjaxHideErrorDisplay("precvta01");
    scAjaxHideErrorDisplay("descto101");
    scAjaxHideErrorDisplay("precio201");
    scAjaxHideErrorDisplay("descto201");
    scAjaxHideErrorDisplay("precio301");
    scAjaxHideErrorDisplay("descto301");
    scAjaxHideErrorDisplay("canvtam01");
    scAjaxHideErrorDisplay("valvtam01");
    scAjaxHideErrorDisplay("cosvtam01");
    scAjaxHideErrorDisplay("canvtaa01");
    scAjaxHideErrorDisplay("valvtaa01");
    scAjaxHideErrorDisplay("cosvtaa01");
    scAjaxHideErrorDisplay("prod1alt01");
    scAjaxHideErrorDisplay("prod2alt01");
    scAjaxHideErrorDisplay("proved101");
    scAjaxHideErrorDisplay("proved201");
    scAjaxHideErrorDisplay("med101");
    scAjaxHideErrorDisplay("med201");
    scAjaxHideErrorDisplay("med301");
    scAjaxHideErrorDisplay("factor01");
    scAjaxHideErrorDisplay("cvserie01");
    scAjaxHideErrorDisplay("ctain101");
    scAjaxHideErrorDisplay("ctain201");
    scAjaxHideErrorDisplay("ctain301");
    scAjaxHideErrorDisplay("porciva01");
    scAjaxHideErrorDisplay("prodsinsdo01");
    scAjaxHideErrorDisplay("sinprec01");
    scAjaxHideErrorDisplay("fotoprod01");
    scAjaxHideErrorDisplay("detprod01");
    scAjaxHideErrorDisplay("block");
    scAjaxHideErrorDisplay("uid");
    scAjaxHideErrorDisplay("ultimoacceso");
    scAjaxHideErrorDisplay("idpro");
    scAjaxHideErrorDisplay("catprod01");
    scAjaxHideErrorDisplay("med401");
    scAjaxHideErrorDisplay("med501");
    scAjaxHideErrorDisplay("prodconmed01");
    scAjaxHideErrorDisplay("factorpeso01");
    scAjaxHideErrorDisplay("codbar01");
    scAjaxHideErrorDisplay("unifrac01");
    scAjaxHideErrorDisplay("calidad01");
    scAjaxHideErrorDisplay("color01");
    scAjaxHideErrorDisplay("material01");
    scAjaxHideErrorDisplay("talla01");
    scAjaxHideErrorDisplay("compuesto01");
    scAjaxHideErrorDisplay("catalt01");
    scAjaxHideErrorDisplay("precfob01");
    scAjaxHideErrorDisplay("precio401");
    scAjaxHideErrorDisplay("descto401");
    scAjaxHideErrorDisplay("porigen01");
    scAjaxHideErrorDisplay("rin01");
    scAjaxHideErrorDisplay("marca01");
    scAjaxHideErrorDisplay("alto01");
    scAjaxHideErrorDisplay("ancho01");
    scAjaxHideErrorDisplay("tipoletra01");
    scAjaxHideErrorDisplay("indcarga01");
    scAjaxHideErrorDisplay("indveloc01");
    scAjaxHideErrorDisplay("pr01");
    scAjaxHideErrorDisplay("dis01");
    scAjaxHideErrorDisplay("tipocons01");
    scAjaxHideErrorDisplay("precateg01");
    scAjaxHideErrorDisplay("tipprod01");
    scAjaxHideErrorDisplay("conversion01");
    scAjaxHideErrorDisplay("valhom01");
    scAjaxHideErrorDisplay("ctain401");
    scAjaxHideErrorDisplay("valhom02");
    scAjaxHideErrorDisplay("valhom03");
    scAjaxHideErrorDisplay("valhom04");
    scAjaxHideErrorDisplay("statuspro01");
    scAjaxHideErrorDisplay("parara01");
    scAjaxHideErrorDisplay("prodequiv01");
    scAjaxHideErrorDisplay("regalia01");
    scAjaxHideErrorDisplay("precio501");
    scAjaxHideErrorDisplay("descto501");
    scAjaxHideErrorDisplay("precio601");
    scAjaxHideErrorDisplay("descto601");
    scAjaxHideErrorDisplay("precio701");
    scAjaxHideErrorDisplay("descto701");
    scAjaxHideErrorDisplay("precio801");
    scAjaxHideErrorDisplay("descto801");
    scAjaxHideErrorDisplay("precio901");
    scAjaxHideErrorDisplay("descto901");
    scAjaxHideErrorDisplay("precio1001");
    scAjaxHideErrorDisplay("descto1001");
    scAjaxHideErrorDisplay("precio1101");
    scAjaxHideErrorDisplay("descto1101");
    scAjaxHideErrorDisplay("precio1201");
    scAjaxHideErrorDisplay("descto1201");
    scAjaxHideErrorDisplay("submarca01");
    scAjaxHideErrorDisplay("modelo01");
    scAjaxHideErrorDisplay("clasific01");
    scAjaxHideErrorDisplay("codbarempaque01");
    scAjaxHideErrorDisplay("unidadempaque01");
    scAjaxHideErrorDisplay("dimensionempaque01");
    scAjaxHideErrorDisplay("link01");
    scAjaxHideErrorDisplay("desprod201");
    scAjaxHideErrorDisplay("desprod301");
    scAjaxHideErrorDisplay("coefprd01");
    scAjaxHideErrorDisplay("infor01");
    scAjaxHideErrorDisplay("infor03");
    scAjaxHideErrorDisplay("infor05");
    scAjaxHideErrorDisplay("infor07");
    scAjaxHideErrorDisplay("porcenrenta");
    scAjaxHideErrorDisplay("peso");
    scAjaxHideErrorDisplay("consignado");
    scAjaxHideErrorDisplay("cant_consignado");
    scAjaxHideErrorDisplay("baseimpexe01");
    scAjaxHideErrorDisplay("peso01");
    scAjaxHideErrorDisplay("prodrel01");
    scAjaxHideErrorDisplay("infor02");
    scAjaxHideErrorDisplay("infor04");
    scAjaxHideErrorDisplay("infor06");
    scAjaxHideErrorDisplay("infor08");
    scAjaxHideErrorDisplay("porcicevta01");
    scAjaxHideErrorDisplay("porcicecpra01");
    scAjaxHideErrorDisplay("porcptdaranc01");
    scAjaxHideErrorDisplay("ordimp01");
    var var_codprod01 = document.F2.codprod01.value;
    var var_nm_form_submit = document.F2.nm_form_submit.value;
    var var_nmgp_opcao = document.F2.nmgp_opcao.value;
    var var_nmgp_ordem = document.F2.nmgp_ordem.value;
    var var_nmgp_fast_search = document.F2.nmgp_fast_search.value;
    var var_nmgp_cond_fast_search = document.F2.nmgp_cond_fast_search.value;
    var var_nmgp_arg_fast_search = document.F2.nmgp_arg_fast_search.value;
    var var_nmgp_arg_dyn_search = document.F2.nmgp_arg_dyn_search.value;
    var var_script_case_init = document.F2.script_case_init.value;
    scAjaxProcOn();
    x_ajax_form_maepro_navigate_form(var_codprod01, var_nm_form_submit, var_nmgp_opcao, var_nmgp_ordem, var_nmgp_fast_search,  var_nmgp_cond_fast_search,  var_nmgp_arg_fast_search, var_nmgp_arg_dyn_search, var_script_case_init, do_ajax_form_maepro_navigate_form_cb);
  } // do_ajax_form_maepro_navigate_form

  var scMasterDetailParentIframe = "<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['dashboard_info']['parent_widget'] ?>";
  var scMasterDetailIframe = {};
<?php
foreach ($this->Ini->sc_lig_iframe as $tmp_i => $tmp_v)
{
?>
  scMasterDetailIframe["<?php echo $tmp_i; ?>"] = "<?php echo $tmp_v; ?>";
<?php
}
?>
  function do_ajax_form_maepro_navigate_form_cb(sResp)
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
    document.F2.codprod01.value = scAjaxGetKeyValue("codprod01");
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
    scAjaxAlert(do_ajax_form_maepro_navigate_form_cb_after_alert);
  } // do_ajax_form_maepro_navigate_form_cb
  function do_ajax_form_maepro_navigate_form_cb_after_alert() {
    scAjaxMessage();
    scAjaxJavascript();
    scQuickSearchKeyUp('t', null);
    $('#SC_fast_search_t').blur();
    scAjaxSetFocus();
<?php
if ($this->Embutida_form)
{
?>
    do_ajax_form_maepro_restore_buttons();
<?php
}
?>
    if (hasJsFormOnload)
    {
      sc_form_onload();
    }
  } // do_ajax_form_maepro_navigate_form_cb_after_alert

  function sc_hide_form_maepro_form()
  {
    for (var block_id in ajax_block_id) {
      $("#div_" + ajax_block_id[block_id]).hide();
    }
  } // sc_hide_form_maepro_form


  function scAjaxDetailProc()
  {
    return true;
  } // scAjaxDetailProc


  var ajax_error_geral = "";

  var ajax_error_type = new Array("valid", "onblur", "onchange", "onclick", "onfocus");

  var ajax_field_list = new Array();
  var ajax_field_Dt_Hr = new Array();
  ajax_field_list[0] = "codprod01";
  ajax_field_list[1] = "desprod01";
  ajax_field_list[2] = "cve101";
  ajax_field_list[3] = "cve201";
  ajax_field_list[4] = "unidmed01";
  ajax_field_list[5] = "cantmin01";
  ajax_field_list[6] = "cantact01";
  ajax_field_list[7] = "valact01";
  ajax_field_list[8] = "exipromo01";
  ajax_field_list[9] = "precuni01";
  ajax_field_list[10] = "pedpend01";
  ajax_field_list[11] = "orden01";
  ajax_field_list[12] = "refer01";
  ajax_field_list[13] = "canentm01";
  ajax_field_list[14] = "valentm01";
  ajax_field_list[15] = "cansalm01";
  ajax_field_list[16] = "valsalm01";
  ajax_field_list[17] = "canenta01";
  ajax_field_list[18] = "valenta01";
  ajax_field_list[19] = "cansala01";
  ajax_field_list[20] = "valsala01";
  ajax_field_list[21] = "fecape01";
  ajax_field_list[22] = "fecult01";
  ajax_field_list[23] = "fecvta01";
  ajax_field_list[24] = "ubic01";
  ajax_field_list[25] = "precvta01";
  ajax_field_list[26] = "descto101";
  ajax_field_list[27] = "precio201";
  ajax_field_list[28] = "descto201";
  ajax_field_list[29] = "precio301";
  ajax_field_list[30] = "descto301";
  ajax_field_list[31] = "canvtam01";
  ajax_field_list[32] = "valvtam01";
  ajax_field_list[33] = "cosvtam01";
  ajax_field_list[34] = "canvtaa01";
  ajax_field_list[35] = "valvtaa01";
  ajax_field_list[36] = "cosvtaa01";
  ajax_field_list[37] = "prod1alt01";
  ajax_field_list[38] = "prod2alt01";
  ajax_field_list[39] = "proved101";
  ajax_field_list[40] = "proved201";
  ajax_field_list[41] = "med101";
  ajax_field_list[42] = "med201";
  ajax_field_list[43] = "med301";
  ajax_field_list[44] = "factor01";
  ajax_field_list[45] = "cvserie01";
  ajax_field_list[46] = "ctain101";
  ajax_field_list[47] = "ctain201";
  ajax_field_list[48] = "ctain301";
  ajax_field_list[49] = "porciva01";
  ajax_field_list[50] = "prodsinsdo01";
  ajax_field_list[51] = "sinprec01";
  ajax_field_list[52] = "fotoprod01";
  ajax_field_list[53] = "detprod01";
  ajax_field_list[54] = "block";
  ajax_field_list[55] = "uid";
  ajax_field_list[56] = "ultimoacceso";
  ajax_field_list[57] = "idpro";
  ajax_field_list[58] = "catprod01";
  ajax_field_list[59] = "med401";
  ajax_field_list[60] = "med501";
  ajax_field_list[61] = "prodconmed01";
  ajax_field_list[62] = "factorpeso01";
  ajax_field_list[63] = "codbar01";
  ajax_field_list[64] = "unifrac01";
  ajax_field_list[65] = "calidad01";
  ajax_field_list[66] = "color01";
  ajax_field_list[67] = "material01";
  ajax_field_list[68] = "talla01";
  ajax_field_list[69] = "compuesto01";
  ajax_field_list[70] = "catalt01";
  ajax_field_list[71] = "precfob01";
  ajax_field_list[72] = "precio401";
  ajax_field_list[73] = "descto401";
  ajax_field_list[74] = "porigen01";
  ajax_field_list[75] = "rin01";
  ajax_field_list[76] = "marca01";
  ajax_field_list[77] = "alto01";
  ajax_field_list[78] = "ancho01";
  ajax_field_list[79] = "tipoletra01";
  ajax_field_list[80] = "indcarga01";
  ajax_field_list[81] = "indveloc01";
  ajax_field_list[82] = "pr01";
  ajax_field_list[83] = "dis01";
  ajax_field_list[84] = "tipocons01";
  ajax_field_list[85] = "precateg01";
  ajax_field_list[86] = "tipprod01";
  ajax_field_list[87] = "conversion01";
  ajax_field_list[88] = "valhom01";
  ajax_field_list[89] = "ctain401";
  ajax_field_list[90] = "valhom02";
  ajax_field_list[91] = "valhom03";
  ajax_field_list[92] = "valhom04";
  ajax_field_list[93] = "statuspro01";
  ajax_field_list[94] = "parara01";
  ajax_field_list[95] = "prodequiv01";
  ajax_field_list[96] = "regalia01";
  ajax_field_list[97] = "precio501";
  ajax_field_list[98] = "descto501";
  ajax_field_list[99] = "precio601";
  ajax_field_list[100] = "descto601";
  ajax_field_list[101] = "precio701";
  ajax_field_list[102] = "descto701";
  ajax_field_list[103] = "precio801";
  ajax_field_list[104] = "descto801";
  ajax_field_list[105] = "precio901";
  ajax_field_list[106] = "descto901";
  ajax_field_list[107] = "precio1001";
  ajax_field_list[108] = "descto1001";
  ajax_field_list[109] = "precio1101";
  ajax_field_list[110] = "descto1101";
  ajax_field_list[111] = "precio1201";
  ajax_field_list[112] = "descto1201";
  ajax_field_list[113] = "submarca01";
  ajax_field_list[114] = "modelo01";
  ajax_field_list[115] = "clasific01";
  ajax_field_list[116] = "codbarempaque01";
  ajax_field_list[117] = "unidadempaque01";
  ajax_field_list[118] = "dimensionempaque01";
  ajax_field_list[119] = "link01";
  ajax_field_list[120] = "desprod201";
  ajax_field_list[121] = "desprod301";
  ajax_field_list[122] = "coefprd01";
  ajax_field_list[123] = "infor01";
  ajax_field_list[124] = "infor03";
  ajax_field_list[125] = "infor05";
  ajax_field_list[126] = "infor07";
  ajax_field_list[127] = "porcenrenta";
  ajax_field_list[128] = "peso";
  ajax_field_list[129] = "consignado";
  ajax_field_list[130] = "cant_consignado";
  ajax_field_list[131] = "baseimpexe01";
  ajax_field_list[132] = "peso01";
  ajax_field_list[133] = "prodrel01";
  ajax_field_list[134] = "infor02";
  ajax_field_list[135] = "infor04";
  ajax_field_list[136] = "infor06";
  ajax_field_list[137] = "infor08";
  ajax_field_list[138] = "porcicevta01";
  ajax_field_list[139] = "porcicecpra01";
  ajax_field_list[140] = "porcptdaranc01";
  ajax_field_list[141] = "ordimp01";

  var ajax_block_list = new Array();
  ajax_block_list[0] = "0";

  var ajax_error_list = {
    "codprod01": {"label": "Codprod 01", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "desprod01": {"label": "Desprod 01", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "cve101": {"label": "Cve 101", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "cve201": {"label": "Cve 201", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "unidmed01": {"label": "Unidmed 01", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "cantmin01": {"label": "Cantmin 01", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "cantact01": {"label": "Cantact 01", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "valact01": {"label": "Valact 01", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "exipromo01": {"label": "Exipromo 01", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "precuni01": {"label": "Precuni 01", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "pedpend01": {"label": "Pedpend 01", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "orden01": {"label": "Orden 01", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "refer01": {"label": "Refer 01", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "canentm01": {"label": "Canentm 01", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "valentm01": {"label": "Valentm 01", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "cansalm01": {"label": "Cansalm 01", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "valsalm01": {"label": "Valsalm 01", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "canenta01": {"label": "Canenta 01", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "valenta01": {"label": "Valenta 01", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "cansala01": {"label": "Cansala 01", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "valsala01": {"label": "Valsala 01", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "fecape01": {"label": "Fecape 01", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "fecult01": {"label": "Fecult 01", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "fecvta01": {"label": "Fecvta 01", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "ubic01": {"label": "Ubic 01", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "precvta01": {"label": "Precvta 01", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "descto101": {"label": "Descto 101", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "precio201": {"label": "Precio 201", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "descto201": {"label": "Descto 201", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "precio301": {"label": "Precio 301", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "descto301": {"label": "Descto 301", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "canvtam01": {"label": "Canvtam 01", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "valvtam01": {"label": "Valvtam 01", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "cosvtam01": {"label": "Cosvtam 01", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "canvtaa01": {"label": "Canvtaa 01", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "valvtaa01": {"label": "Valvtaa 01", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "cosvtaa01": {"label": "Cosvtaa 01", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "prod1alt01": {"label": "Prod 1alt 01", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "prod2alt01": {"label": "Prod 2alt 01", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "proved101": {"label": "Proved 101", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "proved201": {"label": "Proved 201", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "med101": {"label": "Med 101", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "med201": {"label": "Med 201", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "med301": {"label": "Med 301", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "factor01": {"label": "Factor 01", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "cvserie01": {"label": "Cvserie 01", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "ctain101": {"label": "Ctain 101", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "ctain201": {"label": "Ctain 201", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "ctain301": {"label": "Ctain 301", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "porciva01": {"label": "Porciva 01", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "prodsinsdo01": {"label": "Prodsinsdo 01", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "sinprec01": {"label": "Sinprec 01", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "fotoprod01": {"label": "Fotoprod 01", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "detprod01": {"label": "Detprod 01", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "block": {"label": "Block", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "uid": {"label": "UID", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "ultimoacceso": {"label": "Ultimoacceso", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "idpro": {"label": "Idpro", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "catprod01": {"label": "Catprod 01", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "med401": {"label": "Med 401", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "med501": {"label": "Med 501", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "prodconmed01": {"label": "Prodconmed 01", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "factorpeso01": {"label": "Factorpeso 01", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "codbar01": {"label": "Codbar 01", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "unifrac01": {"label": "Unifrac 01", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "calidad01": {"label": "Calidad 01", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "color01": {"label": "Color 01", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "material01": {"label": "Material 01", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "talla01": {"label": "Talla 01", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "compuesto01": {"label": "Compuesto 01", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "catalt01": {"label": "Catalt 01", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "precfob01": {"label": "Precfob 01", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "precio401": {"label": "Precio 401", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "descto401": {"label": "Descto 401", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "porigen01": {"label": "Porigen 01", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "rin01": {"label": "Rin 01", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "marca01": {"label": "Marca 01", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "alto01": {"label": "Alto 01", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "ancho01": {"label": "Ancho 01", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "tipoletra01": {"label": "Tipoletra 01", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "indcarga01": {"label": "Indcarga 01", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "indveloc01": {"label": "Indveloc 01", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "pr01": {"label": "Pr 01", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "dis01": {"label": "Dis 01", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "tipocons01": {"label": "Tipocons 01", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "precateg01": {"label": "Precateg 01", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "tipprod01": {"label": "Tipprod 01", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "conversion01": {"label": "Conversion 01", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "valhom01": {"label": "Valhom 01", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "ctain401": {"label": "Ctain 401", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "valhom02": {"label": "Valhom 02", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "valhom03": {"label": "Valhom 03", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "valhom04": {"label": "Valhom 04", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "statuspro01": {"label": "Statuspro 01", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "parara01": {"label": "Parara 01", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "prodequiv01": {"label": "Prodequiv 01", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "regalia01": {"label": "Regalia 01", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "precio501": {"label": "Precio 501", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "descto501": {"label": "Descto 501", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "precio601": {"label": "Precio 601", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "descto601": {"label": "Descto 601", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "precio701": {"label": "Precio 701", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "descto701": {"label": "Descto 701", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "precio801": {"label": "Precio 801", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "descto801": {"label": "Descto 801", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "precio901": {"label": "Precio 901", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "descto901": {"label": "Descto 901", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "precio1001": {"label": "Precio 1001", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "descto1001": {"label": "Descto 1001", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "precio1101": {"label": "Precio 1101", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "descto1101": {"label": "Descto 1101", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "precio1201": {"label": "Precio 1201", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "descto1201": {"label": "Descto 1201", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "submarca01": {"label": "Submarca 01", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "modelo01": {"label": "Modelo 01", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "clasific01": {"label": "Clasific 01", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "codbarempaque01": {"label": "Codbarempaque 01", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "unidadempaque01": {"label": "Unidadempaque 01", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "dimensionempaque01": {"label": "Dimensionempaque 01", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "link01": {"label": "Link 01", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "desprod201": {"label": "Desprod 201", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "desprod301": {"label": "Desprod 301", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "coefprd01": {"label": "Coefprd 01", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "infor01": {"label": "Infor 01", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "infor03": {"label": "Infor 03", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "infor05": {"label": "Infor 05", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "infor07": {"label": "Infor 07", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "porcenrenta": {"label": "Porcenrenta", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "peso": {"label": "Peso", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "consignado": {"label": "Consignado", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "cant_consignado": {"label": "Cant Consignado", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "baseimpexe01": {"label": "Base Imp Exe 01", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "peso01": {"label": "Peso 01", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "prodrel01": {"label": "Prodrel 01", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "infor02": {"label": "Infor 02", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "infor04": {"label": "Infor 04", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "infor06": {"label": "Infor 06", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "infor08": {"label": "Infor 08", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "porcicevta01": {"label": "Porcicevta 01", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "porcicecpra01": {"label": "Porcicecpra 01", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "porcptdaranc01": {"label": "Porcptdaranc 01", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "ordimp01": {"label": "Ordimp 01", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5}
  };
  var ajax_error_timeout = 5;

  var ajax_block_id = {
    "0": "hidden_bloco_0"
  };

  var ajax_block_tab = {
    "hidden_bloco_0": ""
  };

  var ajax_field_mult = {
    "codprod01": new Array(),
    "desprod01": new Array(),
    "cve101": new Array(),
    "cve201": new Array(),
    "unidmed01": new Array(),
    "cantmin01": new Array(),
    "cantact01": new Array(),
    "valact01": new Array(),
    "exipromo01": new Array(),
    "precuni01": new Array(),
    "pedpend01": new Array(),
    "orden01": new Array(),
    "refer01": new Array(),
    "canentm01": new Array(),
    "valentm01": new Array(),
    "cansalm01": new Array(),
    "valsalm01": new Array(),
    "canenta01": new Array(),
    "valenta01": new Array(),
    "cansala01": new Array(),
    "valsala01": new Array(),
    "fecape01": new Array(),
    "fecult01": new Array(),
    "fecvta01": new Array(),
    "ubic01": new Array(),
    "precvta01": new Array(),
    "descto101": new Array(),
    "precio201": new Array(),
    "descto201": new Array(),
    "precio301": new Array(),
    "descto301": new Array(),
    "canvtam01": new Array(),
    "valvtam01": new Array(),
    "cosvtam01": new Array(),
    "canvtaa01": new Array(),
    "valvtaa01": new Array(),
    "cosvtaa01": new Array(),
    "prod1alt01": new Array(),
    "prod2alt01": new Array(),
    "proved101": new Array(),
    "proved201": new Array(),
    "med101": new Array(),
    "med201": new Array(),
    "med301": new Array(),
    "factor01": new Array(),
    "cvserie01": new Array(),
    "ctain101": new Array(),
    "ctain201": new Array(),
    "ctain301": new Array(),
    "porciva01": new Array(),
    "prodsinsdo01": new Array(),
    "sinprec01": new Array(),
    "fotoprod01": new Array(),
    "detprod01": new Array(),
    "block": new Array(),
    "uid": new Array(),
    "ultimoacceso": new Array(),
    "idpro": new Array(),
    "catprod01": new Array(),
    "med401": new Array(),
    "med501": new Array(),
    "prodconmed01": new Array(),
    "factorpeso01": new Array(),
    "codbar01": new Array(),
    "unifrac01": new Array(),
    "calidad01": new Array(),
    "color01": new Array(),
    "material01": new Array(),
    "talla01": new Array(),
    "compuesto01": new Array(),
    "catalt01": new Array(),
    "precfob01": new Array(),
    "precio401": new Array(),
    "descto401": new Array(),
    "porigen01": new Array(),
    "rin01": new Array(),
    "marca01": new Array(),
    "alto01": new Array(),
    "ancho01": new Array(),
    "tipoletra01": new Array(),
    "indcarga01": new Array(),
    "indveloc01": new Array(),
    "pr01": new Array(),
    "dis01": new Array(),
    "tipocons01": new Array(),
    "precateg01": new Array(),
    "tipprod01": new Array(),
    "conversion01": new Array(),
    "valhom01": new Array(),
    "ctain401": new Array(),
    "valhom02": new Array(),
    "valhom03": new Array(),
    "valhom04": new Array(),
    "statuspro01": new Array(),
    "parara01": new Array(),
    "prodequiv01": new Array(),
    "regalia01": new Array(),
    "precio501": new Array(),
    "descto501": new Array(),
    "precio601": new Array(),
    "descto601": new Array(),
    "precio701": new Array(),
    "descto701": new Array(),
    "precio801": new Array(),
    "descto801": new Array(),
    "precio901": new Array(),
    "descto901": new Array(),
    "precio1001": new Array(),
    "descto1001": new Array(),
    "precio1101": new Array(),
    "descto1101": new Array(),
    "precio1201": new Array(),
    "descto1201": new Array(),
    "submarca01": new Array(),
    "modelo01": new Array(),
    "clasific01": new Array(),
    "codbarempaque01": new Array(),
    "unidadempaque01": new Array(),
    "dimensionempaque01": new Array(),
    "link01": new Array(),
    "desprod201": new Array(),
    "desprod301": new Array(),
    "coefprd01": new Array(),
    "infor01": new Array(),
    "infor03": new Array(),
    "infor05": new Array(),
    "infor07": new Array(),
    "porcenrenta": new Array(),
    "peso": new Array(),
    "consignado": new Array(),
    "cant_consignado": new Array(),
    "baseimpexe01": new Array(),
    "peso01": new Array(),
    "prodrel01": new Array(),
    "infor02": new Array(),
    "infor04": new Array(),
    "infor06": new Array(),
    "infor08": new Array(),
    "porcicevta01": new Array(),
    "porcicecpra01": new Array(),
    "porcptdaranc01": new Array(),
    "ordimp01": new Array()
  };
  ajax_field_mult["codprod01"][1] = "codprod01";
  ajax_field_mult["desprod01"][1] = "desprod01";
  ajax_field_mult["cve101"][1] = "cve101";
  ajax_field_mult["cve201"][1] = "cve201";
  ajax_field_mult["unidmed01"][1] = "unidmed01";
  ajax_field_mult["cantmin01"][1] = "cantmin01";
  ajax_field_mult["cantact01"][1] = "cantact01";
  ajax_field_mult["valact01"][1] = "valact01";
  ajax_field_mult["exipromo01"][1] = "exipromo01";
  ajax_field_mult["precuni01"][1] = "precuni01";
  ajax_field_mult["pedpend01"][1] = "pedpend01";
  ajax_field_mult["orden01"][1] = "orden01";
  ajax_field_mult["refer01"][1] = "refer01";
  ajax_field_mult["canentm01"][1] = "canentm01";
  ajax_field_mult["valentm01"][1] = "valentm01";
  ajax_field_mult["cansalm01"][1] = "cansalm01";
  ajax_field_mult["valsalm01"][1] = "valsalm01";
  ajax_field_mult["canenta01"][1] = "canenta01";
  ajax_field_mult["valenta01"][1] = "valenta01";
  ajax_field_mult["cansala01"][1] = "cansala01";
  ajax_field_mult["valsala01"][1] = "valsala01";
  ajax_field_mult["fecape01"][1] = "fecape01";
  ajax_field_mult["fecult01"][1] = "fecult01";
  ajax_field_mult["fecvta01"][1] = "fecvta01";
  ajax_field_mult["ubic01"][1] = "ubic01";
  ajax_field_mult["precvta01"][1] = "precvta01";
  ajax_field_mult["descto101"][1] = "descto101";
  ajax_field_mult["precio201"][1] = "precio201";
  ajax_field_mult["descto201"][1] = "descto201";
  ajax_field_mult["precio301"][1] = "precio301";
  ajax_field_mult["descto301"][1] = "descto301";
  ajax_field_mult["canvtam01"][1] = "canvtam01";
  ajax_field_mult["valvtam01"][1] = "valvtam01";
  ajax_field_mult["cosvtam01"][1] = "cosvtam01";
  ajax_field_mult["canvtaa01"][1] = "canvtaa01";
  ajax_field_mult["valvtaa01"][1] = "valvtaa01";
  ajax_field_mult["cosvtaa01"][1] = "cosvtaa01";
  ajax_field_mult["prod1alt01"][1] = "prod1alt01";
  ajax_field_mult["prod2alt01"][1] = "prod2alt01";
  ajax_field_mult["proved101"][1] = "proved101";
  ajax_field_mult["proved201"][1] = "proved201";
  ajax_field_mult["med101"][1] = "med101";
  ajax_field_mult["med201"][1] = "med201";
  ajax_field_mult["med301"][1] = "med301";
  ajax_field_mult["factor01"][1] = "factor01";
  ajax_field_mult["cvserie01"][1] = "cvserie01";
  ajax_field_mult["ctain101"][1] = "ctain101";
  ajax_field_mult["ctain201"][1] = "ctain201";
  ajax_field_mult["ctain301"][1] = "ctain301";
  ajax_field_mult["porciva01"][1] = "porciva01";
  ajax_field_mult["prodsinsdo01"][1] = "prodsinsdo01";
  ajax_field_mult["sinprec01"][1] = "sinprec01";
  ajax_field_mult["fotoprod01"][1] = "fotoprod01";
  ajax_field_mult["detprod01"][1] = "detprod01";
  ajax_field_mult["block"][1] = "block";
  ajax_field_mult["uid"][1] = "uid";
  ajax_field_mult["ultimoacceso"][1] = "ultimoacceso";
  ajax_field_mult["idpro"][1] = "idpro";
  ajax_field_mult["catprod01"][1] = "catprod01";
  ajax_field_mult["med401"][1] = "med401";
  ajax_field_mult["med501"][1] = "med501";
  ajax_field_mult["prodconmed01"][1] = "prodconmed01";
  ajax_field_mult["factorpeso01"][1] = "factorpeso01";
  ajax_field_mult["codbar01"][1] = "codbar01";
  ajax_field_mult["unifrac01"][1] = "unifrac01";
  ajax_field_mult["calidad01"][1] = "calidad01";
  ajax_field_mult["color01"][1] = "color01";
  ajax_field_mult["material01"][1] = "material01";
  ajax_field_mult["talla01"][1] = "talla01";
  ajax_field_mult["compuesto01"][1] = "compuesto01";
  ajax_field_mult["catalt01"][1] = "catalt01";
  ajax_field_mult["precfob01"][1] = "precfob01";
  ajax_field_mult["precio401"][1] = "precio401";
  ajax_field_mult["descto401"][1] = "descto401";
  ajax_field_mult["porigen01"][1] = "porigen01";
  ajax_field_mult["rin01"][1] = "rin01";
  ajax_field_mult["marca01"][1] = "marca01";
  ajax_field_mult["alto01"][1] = "alto01";
  ajax_field_mult["ancho01"][1] = "ancho01";
  ajax_field_mult["tipoletra01"][1] = "tipoletra01";
  ajax_field_mult["indcarga01"][1] = "indcarga01";
  ajax_field_mult["indveloc01"][1] = "indveloc01";
  ajax_field_mult["pr01"][1] = "pr01";
  ajax_field_mult["dis01"][1] = "dis01";
  ajax_field_mult["tipocons01"][1] = "tipocons01";
  ajax_field_mult["precateg01"][1] = "precateg01";
  ajax_field_mult["tipprod01"][1] = "tipprod01";
  ajax_field_mult["conversion01"][1] = "conversion01";
  ajax_field_mult["valhom01"][1] = "valhom01";
  ajax_field_mult["ctain401"][1] = "ctain401";
  ajax_field_mult["valhom02"][1] = "valhom02";
  ajax_field_mult["valhom03"][1] = "valhom03";
  ajax_field_mult["valhom04"][1] = "valhom04";
  ajax_field_mult["statuspro01"][1] = "statuspro01";
  ajax_field_mult["parara01"][1] = "parara01";
  ajax_field_mult["prodequiv01"][1] = "prodequiv01";
  ajax_field_mult["regalia01"][1] = "regalia01";
  ajax_field_mult["precio501"][1] = "precio501";
  ajax_field_mult["descto501"][1] = "descto501";
  ajax_field_mult["precio601"][1] = "precio601";
  ajax_field_mult["descto601"][1] = "descto601";
  ajax_field_mult["precio701"][1] = "precio701";
  ajax_field_mult["descto701"][1] = "descto701";
  ajax_field_mult["precio801"][1] = "precio801";
  ajax_field_mult["descto801"][1] = "descto801";
  ajax_field_mult["precio901"][1] = "precio901";
  ajax_field_mult["descto901"][1] = "descto901";
  ajax_field_mult["precio1001"][1] = "precio1001";
  ajax_field_mult["descto1001"][1] = "descto1001";
  ajax_field_mult["precio1101"][1] = "precio1101";
  ajax_field_mult["descto1101"][1] = "descto1101";
  ajax_field_mult["precio1201"][1] = "precio1201";
  ajax_field_mult["descto1201"][1] = "descto1201";
  ajax_field_mult["submarca01"][1] = "submarca01";
  ajax_field_mult["modelo01"][1] = "modelo01";
  ajax_field_mult["clasific01"][1] = "clasific01";
  ajax_field_mult["codbarempaque01"][1] = "codbarempaque01";
  ajax_field_mult["unidadempaque01"][1] = "unidadempaque01";
  ajax_field_mult["dimensionempaque01"][1] = "dimensionempaque01";
  ajax_field_mult["link01"][1] = "link01";
  ajax_field_mult["desprod201"][1] = "desprod201";
  ajax_field_mult["desprod301"][1] = "desprod301";
  ajax_field_mult["coefprd01"][1] = "coefprd01";
  ajax_field_mult["infor01"][1] = "infor01";
  ajax_field_mult["infor03"][1] = "infor03";
  ajax_field_mult["infor05"][1] = "infor05";
  ajax_field_mult["infor07"][1] = "infor07";
  ajax_field_mult["porcenrenta"][1] = "porcenrenta";
  ajax_field_mult["peso"][1] = "peso";
  ajax_field_mult["consignado"][1] = "consignado";
  ajax_field_mult["cant_consignado"][1] = "cant_consignado";
  ajax_field_mult["baseimpexe01"][1] = "baseimpexe01";
  ajax_field_mult["peso01"][1] = "peso01";
  ajax_field_mult["prodrel01"][1] = "prodrel01";
  ajax_field_mult["infor02"][1] = "infor02";
  ajax_field_mult["infor04"][1] = "infor04";
  ajax_field_mult["infor06"][1] = "infor06";
  ajax_field_mult["infor08"][1] = "infor08";
  ajax_field_mult["porcicevta01"][1] = "porcicevta01";
  ajax_field_mult["porcicecpra01"][1] = "porcicecpra01";
  ajax_field_mult["porcptdaranc01"][1] = "porcptdaranc01";
  ajax_field_mult["ordimp01"][1] = "ordimp01";

  var ajax_field_id = {
    "codprod01": new Array("hidden_field_label_codprod01", "hidden_field_data_codprod01"),
    "desprod01": new Array("hidden_field_label_desprod01", "hidden_field_data_desprod01"),
    "cve101": new Array("hidden_field_label_cve101", "hidden_field_data_cve101"),
    "cve201": new Array("hidden_field_label_cve201", "hidden_field_data_cve201"),
    "unidmed01": new Array("hidden_field_label_unidmed01", "hidden_field_data_unidmed01"),
    "cantmin01": new Array("hidden_field_label_cantmin01", "hidden_field_data_cantmin01"),
    "cantact01": new Array("hidden_field_label_cantact01", "hidden_field_data_cantact01"),
    "valact01": new Array("hidden_field_label_valact01", "hidden_field_data_valact01"),
    "exipromo01": new Array("hidden_field_label_exipromo01", "hidden_field_data_exipromo01"),
    "precuni01": new Array("hidden_field_label_precuni01", "hidden_field_data_precuni01"),
    "pedpend01": new Array("hidden_field_label_pedpend01", "hidden_field_data_pedpend01"),
    "orden01": new Array("hidden_field_label_orden01", "hidden_field_data_orden01"),
    "refer01": new Array("hidden_field_label_refer01", "hidden_field_data_refer01"),
    "canentm01": new Array("hidden_field_label_canentm01", "hidden_field_data_canentm01"),
    "valentm01": new Array("hidden_field_label_valentm01", "hidden_field_data_valentm01"),
    "cansalm01": new Array("hidden_field_label_cansalm01", "hidden_field_data_cansalm01"),
    "valsalm01": new Array("hidden_field_label_valsalm01", "hidden_field_data_valsalm01"),
    "canenta01": new Array("hidden_field_label_canenta01", "hidden_field_data_canenta01"),
    "valenta01": new Array("hidden_field_label_valenta01", "hidden_field_data_valenta01"),
    "cansala01": new Array("hidden_field_label_cansala01", "hidden_field_data_cansala01"),
    "valsala01": new Array("hidden_field_label_valsala01", "hidden_field_data_valsala01"),
    "fecape01": new Array("hidden_field_label_fecape01", "hidden_field_data_fecape01"),
    "fecult01": new Array("hidden_field_label_fecult01", "hidden_field_data_fecult01"),
    "fecvta01": new Array("hidden_field_label_fecvta01", "hidden_field_data_fecvta01"),
    "ubic01": new Array("hidden_field_label_ubic01", "hidden_field_data_ubic01"),
    "precvta01": new Array("hidden_field_label_precvta01", "hidden_field_data_precvta01"),
    "descto101": new Array("hidden_field_label_descto101", "hidden_field_data_descto101"),
    "precio201": new Array("hidden_field_label_precio201", "hidden_field_data_precio201"),
    "descto201": new Array("hidden_field_label_descto201", "hidden_field_data_descto201"),
    "precio301": new Array("hidden_field_label_precio301", "hidden_field_data_precio301"),
    "descto301": new Array("hidden_field_label_descto301", "hidden_field_data_descto301"),
    "canvtam01": new Array("hidden_field_label_canvtam01", "hidden_field_data_canvtam01"),
    "valvtam01": new Array("hidden_field_label_valvtam01", "hidden_field_data_valvtam01"),
    "cosvtam01": new Array("hidden_field_label_cosvtam01", "hidden_field_data_cosvtam01"),
    "canvtaa01": new Array("hidden_field_label_canvtaa01", "hidden_field_data_canvtaa01"),
    "valvtaa01": new Array("hidden_field_label_valvtaa01", "hidden_field_data_valvtaa01"),
    "cosvtaa01": new Array("hidden_field_label_cosvtaa01", "hidden_field_data_cosvtaa01"),
    "prod1alt01": new Array("hidden_field_label_prod1alt01", "hidden_field_data_prod1alt01"),
    "prod2alt01": new Array("hidden_field_label_prod2alt01", "hidden_field_data_prod2alt01"),
    "proved101": new Array("hidden_field_label_proved101", "hidden_field_data_proved101"),
    "proved201": new Array("hidden_field_label_proved201", "hidden_field_data_proved201"),
    "med101": new Array("hidden_field_label_med101", "hidden_field_data_med101"),
    "med201": new Array("hidden_field_label_med201", "hidden_field_data_med201"),
    "med301": new Array("hidden_field_label_med301", "hidden_field_data_med301"),
    "factor01": new Array("hidden_field_label_factor01", "hidden_field_data_factor01"),
    "cvserie01": new Array("hidden_field_label_cvserie01", "hidden_field_data_cvserie01"),
    "ctain101": new Array("hidden_field_label_ctain101", "hidden_field_data_ctain101"),
    "ctain201": new Array("hidden_field_label_ctain201", "hidden_field_data_ctain201"),
    "ctain301": new Array("hidden_field_label_ctain301", "hidden_field_data_ctain301"),
    "porciva01": new Array("hidden_field_label_porciva01", "hidden_field_data_porciva01"),
    "prodsinsdo01": new Array("hidden_field_label_prodsinsdo01", "hidden_field_data_prodsinsdo01"),
    "sinprec01": new Array("hidden_field_label_sinprec01", "hidden_field_data_sinprec01"),
    "fotoprod01": new Array("hidden_field_label_fotoprod01", "hidden_field_data_fotoprod01"),
    "detprod01": new Array("hidden_field_label_detprod01", "hidden_field_data_detprod01"),
    "block": new Array("hidden_field_label_block", "hidden_field_data_block"),
    "uid": new Array("hidden_field_label_uid", "hidden_field_data_uid"),
    "ultimoacceso": new Array("hidden_field_label_ultimoacceso", "hidden_field_data_ultimoacceso"),
    "idpro": new Array("hidden_field_label_idpro", "hidden_field_data_idpro"),
    "catprod01": new Array("hidden_field_label_catprod01", "hidden_field_data_catprod01"),
    "med401": new Array("hidden_field_label_med401", "hidden_field_data_med401"),
    "med501": new Array("hidden_field_label_med501", "hidden_field_data_med501"),
    "prodconmed01": new Array("hidden_field_label_prodconmed01", "hidden_field_data_prodconmed01"),
    "factorpeso01": new Array("hidden_field_label_factorpeso01", "hidden_field_data_factorpeso01"),
    "codbar01": new Array("hidden_field_label_codbar01", "hidden_field_data_codbar01"),
    "unifrac01": new Array("hidden_field_label_unifrac01", "hidden_field_data_unifrac01"),
    "calidad01": new Array("hidden_field_label_calidad01", "hidden_field_data_calidad01"),
    "color01": new Array("hidden_field_label_color01", "hidden_field_data_color01"),
    "material01": new Array("hidden_field_label_material01", "hidden_field_data_material01"),
    "talla01": new Array("hidden_field_label_talla01", "hidden_field_data_talla01"),
    "compuesto01": new Array("hidden_field_label_compuesto01", "hidden_field_data_compuesto01"),
    "catalt01": new Array("hidden_field_label_catalt01", "hidden_field_data_catalt01"),
    "precfob01": new Array("hidden_field_label_precfob01", "hidden_field_data_precfob01"),
    "precio401": new Array("hidden_field_label_precio401", "hidden_field_data_precio401"),
    "descto401": new Array("hidden_field_label_descto401", "hidden_field_data_descto401"),
    "porigen01": new Array("hidden_field_label_porigen01", "hidden_field_data_porigen01"),
    "rin01": new Array("hidden_field_label_rin01", "hidden_field_data_rin01"),
    "marca01": new Array("hidden_field_label_marca01", "hidden_field_data_marca01"),
    "alto01": new Array("hidden_field_label_alto01", "hidden_field_data_alto01"),
    "ancho01": new Array("hidden_field_label_ancho01", "hidden_field_data_ancho01"),
    "tipoletra01": new Array("hidden_field_label_tipoletra01", "hidden_field_data_tipoletra01"),
    "indcarga01": new Array("hidden_field_label_indcarga01", "hidden_field_data_indcarga01"),
    "indveloc01": new Array("hidden_field_label_indveloc01", "hidden_field_data_indveloc01"),
    "pr01": new Array("hidden_field_label_pr01", "hidden_field_data_pr01"),
    "dis01": new Array("hidden_field_label_dis01", "hidden_field_data_dis01"),
    "tipocons01": new Array("hidden_field_label_tipocons01", "hidden_field_data_tipocons01"),
    "precateg01": new Array("hidden_field_label_precateg01", "hidden_field_data_precateg01"),
    "tipprod01": new Array("hidden_field_label_tipprod01", "hidden_field_data_tipprod01"),
    "conversion01": new Array("hidden_field_label_conversion01", "hidden_field_data_conversion01"),
    "valhom01": new Array("hidden_field_label_valhom01", "hidden_field_data_valhom01"),
    "ctain401": new Array("hidden_field_label_ctain401", "hidden_field_data_ctain401"),
    "valhom02": new Array("hidden_field_label_valhom02", "hidden_field_data_valhom02"),
    "valhom03": new Array("hidden_field_label_valhom03", "hidden_field_data_valhom03"),
    "valhom04": new Array("hidden_field_label_valhom04", "hidden_field_data_valhom04"),
    "statuspro01": new Array("hidden_field_label_statuspro01", "hidden_field_data_statuspro01"),
    "parara01": new Array("hidden_field_label_parara01", "hidden_field_data_parara01"),
    "prodequiv01": new Array("hidden_field_label_prodequiv01", "hidden_field_data_prodequiv01"),
    "regalia01": new Array("hidden_field_label_regalia01", "hidden_field_data_regalia01"),
    "precio501": new Array("hidden_field_label_precio501", "hidden_field_data_precio501"),
    "descto501": new Array("hidden_field_label_descto501", "hidden_field_data_descto501"),
    "precio601": new Array("hidden_field_label_precio601", "hidden_field_data_precio601"),
    "descto601": new Array("hidden_field_label_descto601", "hidden_field_data_descto601"),
    "precio701": new Array("hidden_field_label_precio701", "hidden_field_data_precio701"),
    "descto701": new Array("hidden_field_label_descto701", "hidden_field_data_descto701"),
    "precio801": new Array("hidden_field_label_precio801", "hidden_field_data_precio801"),
    "descto801": new Array("hidden_field_label_descto801", "hidden_field_data_descto801"),
    "precio901": new Array("hidden_field_label_precio901", "hidden_field_data_precio901"),
    "descto901": new Array("hidden_field_label_descto901", "hidden_field_data_descto901"),
    "precio1001": new Array("hidden_field_label_precio1001", "hidden_field_data_precio1001"),
    "descto1001": new Array("hidden_field_label_descto1001", "hidden_field_data_descto1001"),
    "precio1101": new Array("hidden_field_label_precio1101", "hidden_field_data_precio1101"),
    "descto1101": new Array("hidden_field_label_descto1101", "hidden_field_data_descto1101"),
    "precio1201": new Array("hidden_field_label_precio1201", "hidden_field_data_precio1201"),
    "descto1201": new Array("hidden_field_label_descto1201", "hidden_field_data_descto1201"),
    "submarca01": new Array("hidden_field_label_submarca01", "hidden_field_data_submarca01"),
    "modelo01": new Array("hidden_field_label_modelo01", "hidden_field_data_modelo01"),
    "clasific01": new Array("hidden_field_label_clasific01", "hidden_field_data_clasific01"),
    "codbarempaque01": new Array("hidden_field_label_codbarempaque01", "hidden_field_data_codbarempaque01"),
    "unidadempaque01": new Array("hidden_field_label_unidadempaque01", "hidden_field_data_unidadempaque01"),
    "dimensionempaque01": new Array("hidden_field_label_dimensionempaque01", "hidden_field_data_dimensionempaque01"),
    "link01": new Array("hidden_field_label_link01", "hidden_field_data_link01"),
    "desprod201": new Array("hidden_field_label_desprod201", "hidden_field_data_desprod201"),
    "desprod301": new Array("hidden_field_label_desprod301", "hidden_field_data_desprod301"),
    "coefprd01": new Array("hidden_field_label_coefprd01", "hidden_field_data_coefprd01"),
    "infor01": new Array("hidden_field_label_infor01", "hidden_field_data_infor01"),
    "infor03": new Array("hidden_field_label_infor03", "hidden_field_data_infor03"),
    "infor05": new Array("hidden_field_label_infor05", "hidden_field_data_infor05"),
    "infor07": new Array("hidden_field_label_infor07", "hidden_field_data_infor07"),
    "porcenrenta": new Array("hidden_field_label_porcenrenta", "hidden_field_data_porcenrenta"),
    "peso": new Array("hidden_field_label_peso", "hidden_field_data_peso"),
    "consignado": new Array("hidden_field_label_consignado", "hidden_field_data_consignado"),
    "cant_consignado": new Array("hidden_field_label_cant_consignado", "hidden_field_data_cant_consignado"),
    "baseimpexe01": new Array("hidden_field_label_baseimpexe01", "hidden_field_data_baseimpexe01"),
    "peso01": new Array("hidden_field_label_peso01", "hidden_field_data_peso01"),
    "prodrel01": new Array("hidden_field_label_prodrel01", "hidden_field_data_prodrel01"),
    "infor02": new Array("hidden_field_label_infor02", "hidden_field_data_infor02"),
    "infor04": new Array("hidden_field_label_infor04", "hidden_field_data_infor04"),
    "infor06": new Array("hidden_field_label_infor06", "hidden_field_data_infor06"),
    "infor08": new Array("hidden_field_label_infor08", "hidden_field_data_infor08"),
    "porcicevta01": new Array("hidden_field_label_porcicevta01", "hidden_field_data_porcicevta01"),
    "porcicecpra01": new Array("hidden_field_label_porcicecpra01", "hidden_field_data_porcicecpra01"),
    "porcptdaranc01": new Array("hidden_field_label_porcptdaranc01", "hidden_field_data_porcptdaranc01"),
    "ordimp01": new Array("hidden_field_label_ordimp01", "hidden_field_data_ordimp01")
  };

  var ajax_read_only = {
    "codprod01": "on",
    "desprod01": "off",
    "cve101": "off",
    "cve201": "off",
    "unidmed01": "off",
    "cantmin01": "off",
    "cantact01": "off",
    "valact01": "off",
    "exipromo01": "off",
    "precuni01": "off",
    "pedpend01": "off",
    "orden01": "off",
    "refer01": "off",
    "canentm01": "off",
    "valentm01": "off",
    "cansalm01": "off",
    "valsalm01": "off",
    "canenta01": "off",
    "valenta01": "off",
    "cansala01": "off",
    "valsala01": "off",
    "fecape01": "off",
    "fecult01": "off",
    "fecvta01": "off",
    "ubic01": "off",
    "precvta01": "off",
    "descto101": "off",
    "precio201": "off",
    "descto201": "off",
    "precio301": "off",
    "descto301": "off",
    "canvtam01": "off",
    "valvtam01": "off",
    "cosvtam01": "off",
    "canvtaa01": "off",
    "valvtaa01": "off",
    "cosvtaa01": "off",
    "prod1alt01": "off",
    "prod2alt01": "off",
    "proved101": "off",
    "proved201": "off",
    "med101": "off",
    "med201": "off",
    "med301": "off",
    "factor01": "off",
    "cvserie01": "off",
    "ctain101": "off",
    "ctain201": "off",
    "ctain301": "off",
    "porciva01": "off",
    "prodsinsdo01": "off",
    "sinprec01": "off",
    "fotoprod01": "off",
    "detprod01": "off",
    "block": "off",
    "uid": "off",
    "ultimoacceso": "off",
    "idpro": "off",
    "catprod01": "off",
    "med401": "off",
    "med501": "off",
    "prodconmed01": "off",
    "factorpeso01": "off",
    "codbar01": "off",
    "unifrac01": "off",
    "calidad01": "off",
    "color01": "off",
    "material01": "off",
    "talla01": "off",
    "compuesto01": "off",
    "catalt01": "off",
    "precfob01": "off",
    "precio401": "off",
    "descto401": "off",
    "porigen01": "off",
    "rin01": "off",
    "marca01": "off",
    "alto01": "off",
    "ancho01": "off",
    "tipoletra01": "off",
    "indcarga01": "off",
    "indveloc01": "off",
    "pr01": "off",
    "dis01": "off",
    "tipocons01": "off",
    "precateg01": "off",
    "tipprod01": "off",
    "conversion01": "off",
    "valhom01": "off",
    "ctain401": "off",
    "valhom02": "off",
    "valhom03": "off",
    "valhom04": "off",
    "statuspro01": "off",
    "parara01": "off",
    "prodequiv01": "off",
    "regalia01": "off",
    "precio501": "off",
    "descto501": "off",
    "precio601": "off",
    "descto601": "off",
    "precio701": "off",
    "descto701": "off",
    "precio801": "off",
    "descto801": "off",
    "precio901": "off",
    "descto901": "off",
    "precio1001": "off",
    "descto1001": "off",
    "precio1101": "off",
    "descto1101": "off",
    "precio1201": "off",
    "descto1201": "off",
    "submarca01": "off",
    "modelo01": "off",
    "clasific01": "off",
    "codbarempaque01": "off",
    "unidadempaque01": "off",
    "dimensionempaque01": "off",
    "link01": "off",
    "desprod201": "off",
    "desprod301": "off",
    "coefprd01": "off",
    "infor01": "off",
    "infor03": "off",
    "infor05": "off",
    "infor07": "off",
    "porcenrenta": "off",
    "peso": "off",
    "consignado": "off",
    "cant_consignado": "off",
    "baseimpexe01": "off",
    "peso01": "off",
    "prodrel01": "off",
    "infor02": "off",
    "infor04": "off",
    "infor06": "off",
    "infor08": "off",
    "porcicevta01": "off",
    "porcicecpra01": "off",
    "porcptdaranc01": "off",
    "ordimp01": "off"
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
    if ("codprod01" == sIndex)
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
    if ("desprod01" == sIndex)
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
    if ("cve101" == sIndex)
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
    if ("cve201" == sIndex)
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
    if ("unidmed01" == sIndex)
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
    if ("cantmin01" == sIndex)
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
    if ("cantact01" == sIndex)
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
    if ("valact01" == sIndex)
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
    if ("exipromo01" == sIndex)
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
    if ("precuni01" == sIndex)
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
    if ("pedpend01" == sIndex)
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
    if ("orden01" == sIndex)
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
    if ("refer01" == sIndex)
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
    if ("canentm01" == sIndex)
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
    if ("valentm01" == sIndex)
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
    if ("cansalm01" == sIndex)
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
    if ("valsalm01" == sIndex)
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
    if ("canenta01" == sIndex)
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
    if ("valenta01" == sIndex)
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
    if ("cansala01" == sIndex)
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
    if ("valsala01" == sIndex)
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
    if ("fecape01" == sIndex)
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
    if ("fecult01" == sIndex)
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
    if ("fecvta01" == sIndex)
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
    if ("ubic01" == sIndex)
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
    if ("precvta01" == sIndex)
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
    if ("descto101" == sIndex)
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
    if ("precio201" == sIndex)
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
    if ("descto201" == sIndex)
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
    if ("precio301" == sIndex)
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
    if ("descto301" == sIndex)
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
    if ("canvtam01" == sIndex)
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
    if ("valvtam01" == sIndex)
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
    if ("cosvtam01" == sIndex)
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
    if ("canvtaa01" == sIndex)
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
    if ("valvtaa01" == sIndex)
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
    if ("cosvtaa01" == sIndex)
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
    if ("prod1alt01" == sIndex)
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
    if ("prod2alt01" == sIndex)
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
    if ("proved101" == sIndex)
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
    if ("proved201" == sIndex)
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
    if ("med101" == sIndex)
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
    if ("med201" == sIndex)
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
    if ("med301" == sIndex)
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
    if ("factor01" == sIndex)
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
    if ("cvserie01" == sIndex)
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
    if ("ctain101" == sIndex)
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
    if ("ctain201" == sIndex)
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
    if ("ctain301" == sIndex)
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
    if ("porciva01" == sIndex)
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
    if ("prodsinsdo01" == sIndex)
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
    if ("sinprec01" == sIndex)
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
    if ("fotoprod01" == sIndex)
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
    if ("detprod01" == sIndex)
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
    if ("idpro" == sIndex)
    {
      scAjaxSetFieldLabel(sIndex, aValue);
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
    if ("catprod01" == sIndex)
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
    if ("med401" == sIndex)
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
    if ("med501" == sIndex)
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
    if ("prodconmed01" == sIndex)
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
    if ("factorpeso01" == sIndex)
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
    if ("codbar01" == sIndex)
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
    if ("unifrac01" == sIndex)
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
    if ("calidad01" == sIndex)
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
    if ("color01" == sIndex)
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
    if ("material01" == sIndex)
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
    if ("talla01" == sIndex)
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
    if ("compuesto01" == sIndex)
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
    if ("catalt01" == sIndex)
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
    if ("precfob01" == sIndex)
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
    if ("precio401" == sIndex)
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
    if ("descto401" == sIndex)
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
    if ("porigen01" == sIndex)
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
    if ("rin01" == sIndex)
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
    if ("marca01" == sIndex)
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
    if ("alto01" == sIndex)
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
    if ("ancho01" == sIndex)
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
    if ("tipoletra01" == sIndex)
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
    if ("indcarga01" == sIndex)
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
    if ("indveloc01" == sIndex)
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
    if ("pr01" == sIndex)
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
    if ("dis01" == sIndex)
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
    if ("tipocons01" == sIndex)
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
    if ("precateg01" == sIndex)
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
    if ("tipprod01" == sIndex)
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
    if ("conversion01" == sIndex)
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
    if ("valhom01" == sIndex)
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
    if ("ctain401" == sIndex)
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
    if ("valhom02" == sIndex)
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
    if ("valhom03" == sIndex)
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
    if ("valhom04" == sIndex)
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
    if ("statuspro01" == sIndex)
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
    if ("parara01" == sIndex)
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
    if ("prodequiv01" == sIndex)
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
    if ("regalia01" == sIndex)
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
    if ("precio501" == sIndex)
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
    if ("descto501" == sIndex)
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
    if ("precio601" == sIndex)
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
    if ("descto601" == sIndex)
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
    if ("precio701" == sIndex)
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
    if ("descto701" == sIndex)
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
    if ("precio801" == sIndex)
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
    if ("descto801" == sIndex)
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
    if ("precio901" == sIndex)
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
    if ("descto901" == sIndex)
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
    if ("precio1001" == sIndex)
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
    if ("descto1001" == sIndex)
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
    if ("precio1101" == sIndex)
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
    if ("descto1101" == sIndex)
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
    if ("precio1201" == sIndex)
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
    if ("descto1201" == sIndex)
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
    if ("submarca01" == sIndex)
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
    if ("modelo01" == sIndex)
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
    if ("clasific01" == sIndex)
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
    if ("codbarempaque01" == sIndex)
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
    if ("unidadempaque01" == sIndex)
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
    if ("dimensionempaque01" == sIndex)
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
    if ("link01" == sIndex)
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
    if ("desprod201" == sIndex)
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
    if ("desprod301" == sIndex)
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
    if ("coefprd01" == sIndex)
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
    if ("infor01" == sIndex)
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
    if ("infor03" == sIndex)
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
    if ("infor05" == sIndex)
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
    if ("infor07" == sIndex)
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
    if ("porcenrenta" == sIndex)
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
    if ("peso" == sIndex)
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
    if ("consignado" == sIndex)
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
    if ("cant_consignado" == sIndex)
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
    if ("baseimpexe01" == sIndex)
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
    if ("peso01" == sIndex)
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
    if ("prodrel01" == sIndex)
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
    if ("infor02" == sIndex)
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
    if ("infor04" == sIndex)
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
    if ("infor06" == sIndex)
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
    if ("infor08" == sIndex)
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
    if ("porcicevta01" == sIndex)
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
    if ("porcicecpra01" == sIndex)
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
    if ("porcptdaranc01" == sIndex)
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
    if ("ordimp01" == sIndex)
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
